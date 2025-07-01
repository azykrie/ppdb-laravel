<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pembayaran;
use Illuminate\Http\Request;

class BerhasilDafatarUlangController extends Controller
{
    public function index()
    {
        $daftarUlangList = Pembayaran::all();
        return view('admin.berhasil-daftar-ulang.index', compact('daftarUlangList'));
    }
}
