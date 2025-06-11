<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BiodataSiswa;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class CalonSiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $biodataSiswas = BiodataSiswa::with('user')->orderBy('created_at', 'desc')->paginate(10);
        return view('admin.calon-siswa.index', compact('biodataSiswas'));
    }


    public function show(string $id)
    {
        $biodataSiswa = BiodataSiswa::with('user', 'verifiedBy')->findOrFail($id);
        return view('admin.calon-siswa.show', compact('biodataSiswa'));
    }


    /**
     * Update the specified resource in storage.
     */
public function update(Request $request, BiodataSiswa $biodataSiswa)
    {
        $request->validate([
            'verification_status' => 'required|in:pending,verified,rejected',
            'verification_notes' => 'nullable|string|max:500',
        ]);

        $biodataSiswa->verification_status = $request->verification_status;
        $biodataSiswa->verification_notes = $request->verification_notes;

        if ($request->verification_status !== 'pending') {
            $biodataSiswa->verified_by_user_id = Auth::id();
            $biodataSiswa->verified_at = Carbon::now();
        }
        
        $biodataSiswa->save();

        return redirect()->route('admin.calon-siswa.index')->with('success', 'Status biodata siswa berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
