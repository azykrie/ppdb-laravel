<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\BiodataSiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class BioDataController extends Controller
{
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
        return view('user.biodata.create');
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


        $fotoNilaiRaporPath = null;
        if ($request->hasFile('foto_nilai_rapor')) {
            $fotoNilaiRaporPath = $request->file('foto_nilai_rapor')->store('public/biodata_dokumen');
            $fotoNilaiRaporPath = str_replace('public/', '', $fotoNilaiRaporPath); // Hapus 'public/' untuk disimpan di DB
        }

        $fotoIjazahPath = null;
        if ($request->hasFile('foto_ijazah')) {
            $fotoIjazahPath = $request->file('foto_ijazah')->store('public/biodata_dokumen');
            $fotoIjazahPath = str_replace('public/', '', $fotoIjazahPath);
        }

        $fotoFormalPath = null;
        if ($request->hasFile('foto_formal')) {
            $fotoFormalPath = $request->file('foto_formal')->store('public/biodata_dokumen');
            $fotoFormalPath = str_replace('public/', '', $fotoFormalPath);
        }

        BiodataSiswa::create([
            'user_id' => Auth::id(),
            'nisn' => $validatedData['nisn'],
            'nama_lengkap' => $validatedData['nama_lengkap'],
            'tempat_lahir' => $validatedData['tempat_lahir'],
            'tanggal_lahir' => $validatedData['tanggal_lahir'],
            'jenis_kelamin' => $validatedData['jenis_kelamin'],
            'agama' => $validatedData['agama'],
            'alamat' => $validatedData['alamat'],
            'no_telepon' => $validatedData['no_telepon'],
            'asal_sekolah' => $validatedData['asal_sekolah'],
            'foto_nilai_rapor' => $fotoNilaiRaporPath,
            'foto_ijazah' => $fotoIjazahPath,
            'foto_formal' => $fotoFormalPath,
        ]);

        return redirect()->route('user.biodata.index')->with('success', 'Biodata siswa berhasil disimpan!');

    }


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
            // NISN perlu pengecualian untuk unique rule agar tidak error saat update record sendiri
            'nisn' => [
                'required',
                'string',
                'max:255',
                'unique:biodata_siswas,nisn,' . $biodataSiswa->id, // Pengecualian ID biodata saat ini
            ],
            'nama_lengkap' => 'required|string|max:255',
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'agama' => 'required|string|max:255',
            'alamat' => 'required|string',
            'no_telepon' => 'nullable|string|max:20',
            'asal_sekolah' => 'required|string|max:255',
            // File bersifat opsional karena mungkin tidak diupdate
            'foto_nilai_rapor' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,pdf|max:2048',
            'foto_ijazah' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,pdf|max:2048',
            'foto_formal' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $this->uploadAndReplaceFile($request, $biodataSiswa, 'foto_nilai_rapor');
        $this->uploadAndReplaceFile($request, $biodataSiswa, 'foto_ijazah');
        $this->uploadAndReplaceFile($request, $biodataSiswa, 'foto_formal');

        $biodataSiswa->nisn = $validatedData['nisn'];
        $biodataSiswa->nama_lengkap = $validatedData['nama_lengkap'];
        $biodataSiswa->tempat_lahir = $validatedData['tempat_lahir'];
        $biodataSiswa->tanggal_lahir = $validatedData['tanggal_lahir'];
        $biodataSiswa->jenis_kelamin = $validatedData['jenis_kelamin'];
        $biodataSiswa->agama = $validatedData['agama'];
        $biodataSiswa->alamat = $validatedData['alamat'];
        $biodataSiswa->no_telepon = $validatedData['no_telepon'];
        $biodataSiswa->asal_sekolah = $validatedData['asal_sekolah'];

        $biodataSiswa->verification_status = 'pending';
        $biodataSiswa->verification_notes = null;
        $biodataSiswa->verified_by_user_id = null;
        $biodataSiswa->verified_at = null;

        $biodataSiswa->save();

        return redirect()->route('user.biodata.index')->with('success', 'Biodata siswa berhasil diperbarui!');
    }


    /**
     * Handle file upload and replace the old file if a new one is uploaded.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\BiodataSiswa $biodataSiswa
     * @param string $field
     * @return void
     */
    protected function uploadAndReplaceFile(Request $request, $biodataSiswa, $field)
    {
        if ($request->hasFile($field)) {
            // Delete old file if exists
            if ($biodataSiswa->$field) {
                $oldFilePath = storage_path('app/public/' . $biodataSiswa->$field);
                if (file_exists($oldFilePath)) {
                    @unlink($oldFilePath);
                }
            }
            // Store new file
            $newFilePath = $request->file($field)->store('public/biodata_dokumen');
            $biodataSiswa->$field = str_replace('public/', '', $newFilePath);
        }
    }
}
