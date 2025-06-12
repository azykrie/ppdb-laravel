<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BiodataSiswa;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class BioDataController extends Controller
{

    protected $fileFields = [
        'foto_nilai_rapor',
        'foto_ijazah',
        'foto_formal',
    ];

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $biodataSiswa = Auth::user()->biodataSiswa;
        return view('user.biodata.index', compact('biodataSiswa'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // ... (kode create) ...
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (Auth::user()->biodataSiswa) {
            return redirect()->route('user.biodata.index')->with('error', 'Anda sudah mengisi biodata siswa. Gunakan fitur edit untuk mengubah.');
        }

        $validatedData = $request->validate([
            'nisn' => [
                'required',
                'string',
                'max:255',
                'unique:biodata_siswas,nisn',
            ],
            'nama_lengkap' => 'required|string|max:255',
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'agama' => 'required|string|max:255',
            'alamat' => 'required|string',
            'no_telepon' => 'nullable|string|max:20',
            'asal_sekolah' => 'required|string|max:255',
            'foto_nilai_rapor' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,pdf|max:2048',
            'foto_ijazah' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,pdf|max:2048',
            'foto_formal' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        foreach ($this->fileFields as $field) {
            if ($request->hasFile($field)) {
                if ($biodataSiswa->$field && Storage::disk('public')->exists($biodataSiswa->$field)) {
                    Storage::disk('public')->delete($biodataSiswa->$field);
                }
                $biodataSiswa->$field = $request->file($field)->store('biodata_dokumen', 'public');
            }
        }

        BiodataSiswa::create(array_merge($validatedData, [
            'user_id' => Auth::id(),
        ], $filePaths));

        return redirect()->route('user.biodata.index')->with('success', 'Biodata siswa berhasil disimpan!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        $biodataSiswa = Auth::user()->biodataSiswa;
        if (!$biodataSiswa) {
            return redirect()->route('user.biodata.create')->with('error', 'Anda belum mengisi biodata. Silakan isi terlebih dahulu.');
        }

        return view('user.biodata.edit', compact('biodataSiswa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $biodataSiswa = Auth::user()->biodataSiswa;

        if (!$biodataSiswa) {
            return redirect()->route('user.biodata.create')->with('error', 'Biodata tidak ditemukan untuk diperbarui.');
        }

        // --- Aturan Validasi ---
        $validatedData = $request->validate([
            'nisn' => [
                'required',
                'string',
                'max:255',
                'unique:biodata_siswas,nisn,' . $biodataSiswa->id,
            ],
            'nama_lengkap' => 'required|string|max:255',
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'agama' => 'required|string|max:255',
            'alamat' => 'required|string',
            'no_telepon' => 'nullable|string|max:20',
            'asal_sekolah' => 'required|string|max:255',
            'foto_nilai_rapor' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,pdf|max:2048',
            'foto_ijazah' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,pdf|max:2048',
            'foto_formal' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $filePaths = [];
        foreach ($this->fileFields as $field) {
            if ($request->hasFile($field)) {
                if ($biodataSiswa->$field && Storage::disk('public')->exists($biodataSiswa->$field)) {
                    Storage::disk('public')->delete($biodataSiswa->$field);
                }
                $biodataSiswa->$field = $request->file($field)->store('biodata_dokumen', 'public');
            }
        }

        // --- Perbarui Data di Database (Selain File) ---
        $biodataSiswa->fill($validatedData); // Mengisi semua data yang tervalidasi sekaligus

        // Logika untuk merubah status verifikasi menjadi pending
        $biodataSiswa->verification_status = 'pending';
        $biodataSiswa->verification_notes = null;
        $biodataSiswa->verified_by_user_id = null;
        $biodataSiswa->verified_at = null;

        $biodataSiswa->save();

        return redirect()->route('user.biodata.index')->with('success', 'Biodata siswa berhasil diperbarui! Mohon tunggu verifikasi ulang dari admin.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // ... (metode destroy jika ada) ...
    }
}