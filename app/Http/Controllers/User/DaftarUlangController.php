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
    public function index()
    {
        $user = Auth::user();
        $biodataSiswa = $user->biodataSiswa;

        if (!$biodataSiswa) {
            return redirect()->route('user.biodata.create')
                ->with('error', 'Silakan lengkapi biodata terlebih dahulu.');
        }

        $pembayaran = $biodataSiswa->pembayarans()->latest()->first();

        if ($pembayaran && $pembayaran->status === 'berhasil') {
            return view('user.daftar-ulang.index', compact('biodataSiswa', 'pembayaran'));
        }

        return redirect()->route('user.daftar-ulang.pembayaran');
    }

    public function pembayaran()
    {
        $user = Auth::user();
        $biodata = $user->biodataSiswa;

        if (!$biodata) {
            return redirect()->route('user.biodata.create')->with('error', 'Silakan lengkapi biodata terlebih dahulu.');
        }

        // Buat order ID unik
        $orderId = 'DU-' . $biodata->id . '-' . time();
        $amount = 200000;

        // Konfigurasi Midtrans
        \Midtrans\Config::$serverKey = config('midtrans.server_key');
        \Midtrans\Config::$isProduction = false;
        \Midtrans\Config::$isSanitized = true;
        \Midtrans\Config::$is3ds = true;

        // Parameter transaksi
        $params = [
            'transaction_details' => [
                'order_id' => $orderId,
                'gross_amount' => $amount,
            ],
            'customer_details' => [
                'first_name' => $user->name,
                'email' => $user->email,
            ]
        ];

        // Ambil snap token dari Midtrans
        $snapToken = \Midtrans\Snap::getSnapToken($params);

        // Simpan ke database
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

}
