<?php

use App\Http\Controllers\Admin\BerhasilDafatarUlangController;
use App\Http\Controllers\Admin\CalonSiswaController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DataSiswaController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\PortalPendafataranController;
use App\Http\Controllers\User\BioDataController;
use App\Http\Controllers\User\DaftarUlangController;
use App\Http\Controllers\User\DashboardController as UserDashboardController;
use App\Http\Controllers\User\KalenderController;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return redirect()->route('portal-pendaftaran.index');
});


Route::get('/portal-pendaftaran', [PortalPendafataranController::class, 'index'])->name('portal-pendaftaran.index');
Route::get('login', [LoginController::class, 'index'])->name('login.index');
Route::post('login', [LoginController::class, 'login'])->name('login');
Route::post('logout', [LoginController::class, 'logout'])->name('logout');



Route::get('register', [RegisterController::class, 'index'])->name('register.index');
Route::post('register', [RegisterController::class, 'store'])->name('register.store');


Route::prefix('admin')->name('admin.')->group(function () {

    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

    Route::prefix('calon-siswa')->name('calon-siswa.')->group(function () {
        Route::get('/', [CalonSiswaController::class, 'index'])->name('index');
        Route::get('/{biodataSiswa}', [CalonSiswaController::class, 'show'])->name('show');
        Route::put('/{biodataSiswa}', [CalonSiswaController::class, 'update'])->name('update');
    });

    Route::prefix('berhasil-daftar-ulang')->name('berhasil-daftar-ulang.')->group(function () {
        Route::get('/', [BerhasilDafatarUlangController::class, 'index'])->name('index');
    });

    Route::prefix('data-siswa')->name('data-siswa.')->group(function () {
        Route::get('/', [DataSiswaController::class, 'index'])->name('index');
    });

    Route::prefix('user')->name('user.')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('index');
    });
});


Route::prefix('user')->name('user.')->group(function () {

    Route::get('dashboard', [UserDashboardController::class, 'index'])->name('dashboard.index');

    Route::prefix('biodata')->name('biodata.')->group(function () {
        Route::get('/', [BioDataController::class, 'index'])->name('index');
        Route::get('/create', [BioDataController::class, 'create'])->name('create');
        Route::post('/', [BioDataController::class, 'store'])->name('store');
        Route::get('/{biodataSiswa}/edit', [BioDataController::class, 'edit'])->name('edit');
        Route::put('/{biodataSiswa}', [BioDataController::class, 'update'])->name('update');
    });

    Route::prefix('daftar-ulang')->name('daftar-ulang.')->group(function () {
        Route::get('/', [DaftarUlangController::class, 'index'])->name('index');
        Route::get('/pembayaran', [DaftarUlangController::class, 'pembayaran'])->name('pembayaran');
        Route::get('/success/{id}', [DaftarUlangController::class, 'success'])->name('success');
    });

    Route::prefix('kalender')->name('kalender.')->group(function () {
        Route::get('/', [KalenderController::class, 'index'])->name('index');
    });
});
