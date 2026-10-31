<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FirebaseController;

// Laluan untuk Halaman Utama (Beranda)
Route::get('/', function () {
    return view('welcome');
});

// Laluan untuk Halaman Tentang Kami
Route::get('/tentang', function () {
    return view('tentang');
});

// Laluan untuk Halaman Fitur Utama
Route::get('/fitur', function () {
    return view('fitur');
});

// Route untuk mengetes pengiriman data ke Firebase Realtime Database
Route::get('/tes-firebase', [FirebaseController::class, 'tesKirimData']);

// Laluan untuk Halaman Riwayat Aktivitas (Menggunakan data statis sementara)
Route::get('/riwayat-aktivitas', function () {
    return view('riwayat-aktivitas');
});