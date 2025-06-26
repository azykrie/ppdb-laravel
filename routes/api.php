<?php

use App\Http\Controllers\User\DaftarUlangController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('user/daftar-ulang/midtrans-callback', [DaftarUlangController::class, 'callback']);