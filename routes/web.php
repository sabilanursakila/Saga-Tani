<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FirebaseController;

// Untuk Halaman Utama (Beranda)
Route::get('/', function () {
    return view('welcome');
});

// Untuk Halaman Tentang Kami
Route::get('/tentang', function () {
    return view('tentang');
});

// Untuk Halaman Fitur Utama
Route::get('/fitur', function () {
    return view('fitur');
});

// Route untuk mengetes pengiriman data ke Firebase Realtime Database
Route::get('/tes-firebase', [FirebaseController::class, 'tesKirimData']);

// Untuk Halaman Riwayat Aktivitas (Menggunakan data statis sementara)
Route::get('/riwayat-aktivitas', function () {
    return view('riwayat-aktivitas');
});