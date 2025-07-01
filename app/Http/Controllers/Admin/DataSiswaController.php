<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pembayaran;
use Illuminate\Http\Request;

class DataSiswaController extends Controller
{
    public function index()
    {

        $dataSiswa = Pembayaran::with('biodataSiswa') // jika ingin nama dan jurusan juga
            ->where('status', 'berhasil')
            ->get();
        return view('admin.data-siswa.index', compact('dataSiswa'));
    }
}
