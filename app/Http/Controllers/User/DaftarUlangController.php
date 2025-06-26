<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Pembayaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Midtrans\Config;
use Midtrans\Snap;


class DaftarUlangController extends Controller
{
    /**
     * Tampilkan halaman daftar ulang
     */
    public function index($id = null)
    {
        $user = Auth::user();
        $biodataSiswa = $user->biodataSiswa;

        if (!$biodataSiswa) {
            return redirect()->route('user.biodata.create')
                ->with('error', 'Silakan lengkapi biodata terlebih dahulu.');
        }

        // Cari pembayaran terbaru dan status-nya
        $pembayaran = $biodataSiswa->pembayarans()
            ->where('status', 'berhasil')
            ->latest()
            ->first();

        if ($pembayaran) {
            return view('user.daftar-ulang.index', compact('biodataSiswa', 'pembayaran'));
        }

        // Jika tidak ditemukan pembayaran berhasil, arahkan ke halaman pembayaran
        return redirect()->route('user.daftar-ulang.pembayaran');
    }

    public function pembayaran()
    {
        $user = Auth::user();
        $biodata = $user->biodataSiswa;

        if (!$biodata) {
            return redirect()->route('user.biodata.create')->with('error', 'Silakan lengkapi biodata terlebih dahulu.');
        }

        // Cek apakah sudah ada pembayaran yang masih aktif
        $pembayaran = $biodata->pembayarans()
            ->whereIn('status', ['menunggu', 'berhasil'])
            ->latest()
            ->first();

        if ($pembayaran) {
            // Jika sudah ada pembayaran valid, gunakan snapToken yang ada
            return view('user.daftar-ulang.pembayaran', [
                'biodataSiswa' => $biodata,
                'snapToken' => $pembayaran->snap_token,
                'pembayaran' => $pembayaran,
            ]);
        }

        // Buat transaksi baru
        $orderId = 'DU-' . $biodata->id . '-' . time();
        $amount = 200000;

        \Midtrans\Config::$serverKey = config('midtrans.server_key');
        \Midtrans\Config::$isProduction = false;
        \Midtrans\Config::$isSanitized = true;
        \Midtrans\Config::$is3ds = true;

        $params = [
            'transaction_details' => [
                'order_id' => $orderId,
                'gross_amount' => $amount,
            ],
            'customer_details' => [
                'first_name' => $user->name,
                'email' => $user->email,
            ],
            'callbacks' => [
                'finish' => route('user.daftar-ulang.success', $biodata->id),
            ]
        ];

        $snapToken = \Midtrans\Snap::getSnapToken($params);

        $pembayaran = Pembayaran::create([
            'biodata_siswa_id' => $biodata->id,
            'order_id' => $orderId,
            'price' => $amount,
            'status' => 'menunggu',
            'snap_token' => $snapToken,
        ]);

        return view('user.daftar-ulang.pembayaran', [
            'biodataSiswa' => $biodata,
            'snapToken' => $snapToken,
            'pembayaran' => $pembayaran,
        ]);
    }


    public function callback(Request $request)
    {
        $serverKey = config('midtrans.server_key');
        $signatureKey = $request->signature_key;
        $expectedSignature = hash('sha512', $request->order_id . $request->status_code . $request->gross_amount . $serverKey);

        if ($signatureKey !== $expectedSignature) {
            return response()->json(['message' => 'Signature tidak valid'], 403);
        }

        $pembayaran = Pembayaran::where('order_id', $request->order_id)->first();

        if (!$pembayaran) {
            return response()->json(['message' => 'Pembayaran tidak ditemukan'], 404);
        }

        $status = $request->transaction_status;

        if (in_array($status, ['settlement', 'capture'])) {
            $pembayaran->update([
                'status' => 'berhasil',
                'paid_at' => now(),
                'raw_response' => json_encode($request->all()),
            ]);
        } elseif ($status === 'pending') {
            $pembayaran->update(['status' => 'menunggu']);
        } else {
            $pembayaran->update(['status' => 'gagal']);
        }

        return response()->json(['message' => 'OK']);
    }

    public function success($id)
    {
        $user = Auth::user();
        $biodata = $user->biodataSiswa;
        $pembayaran = $biodata->pembayarans()->where('id', $id)->first();

        return view('user.daftar-ulang.success', compact('biodata', 'pembayaran'));
    }
}
