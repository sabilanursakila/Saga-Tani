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

// Route untuk mengetes pengiriman data ke Firebase Realtime Database
Route::get('/tes-firebase', [FirebaseController::class, 'tesKirimData']);