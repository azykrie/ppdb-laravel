<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\User\DashboardController as UserDashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\PortalPendafataranController;
use App\Http\Controllers\User\BioDataController;
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

});


Route::prefix('user')->name('user.')->group(function () {
    Route::get('dashboard', [UserDashboardController::class, 'index'])->name('dashboard.index');
    Route::get('biodata', [BioDataController::class, 'index'])->name('biodata.index');
});