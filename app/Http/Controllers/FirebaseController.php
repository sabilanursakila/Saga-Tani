<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class FirebaseController extends Controller
{
    public function tesKirimData()
    {
        // Ambil URL Database dari file .env
        $databaseUrl = env('FIREBASE_DATABASE_URL');

        // Data simulasi dari alat IoT pengusir tikus
        $dataSensor = [
            'status_alat' => 'aktif',
            'tikus_terdeteksi' => 1,
            'waktu' => date('Y-m-d H:i:s'),
            'pesan' => 'Sensor mendeteksi pergerakan hama!'
        ];

        // Mengirim data menggunakan HTTP PUT ke Realtime Database
        $response = Http::put("{$databaseUrl}/log_sensor/node_01.json", $dataSensor);

        if ($response->successful()) {
            return response()->json([
                'status' => 'sukses',
                'message' => 'Data berhasil dikirim ke Firebase via REST API!',
                'data' => $dataSensor
            ]);
        } else {
            return response()->json([
                'status' => 'gagal',
                'error' => $response->body()
            ], 500);
        }
    }
}