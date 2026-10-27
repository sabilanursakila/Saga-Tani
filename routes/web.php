<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('beranda');

// Hanya untuk yang belum login
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'tampilLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'proses'])->name('login.proses');

    Route::get('/daftar', [AuthController::class, 'tampilDaftar'])->name('register');
    Route::post('/daftar', [AuthController::class, 'daftar'])->name('register.proses');
});

// Hanya untuk yang sudah login
Route::post('/logout', [AuthController::class, 'keluar'])
    ->middleware('auth')
    ->name('logout');

    use App\Http\Controllers\FirebaseController;

Route::get('/tes-firebase', [FirebaseController::class, 'tesKirimData']);