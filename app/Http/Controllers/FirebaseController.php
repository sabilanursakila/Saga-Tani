<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kreait\Laravel\Firebase\Facades\Firebase;

class FirebaseController extends Controller
{
    public function tesKirimData()
    {
        // Menghubungkan ke Realtime Database
        $database = Firebase::database();

        // Data simulasi dari alat IoT pengusir tikus
        $dataSensor = [
            'status_alat' => 'aktif',
            'tikus_terdeteksi' => 1,
            'waktu' => date('Y-m-d H:i:s'),
            'pesan' => 'Sensor mendeteksi pergerakan hama!'
        ];

        // Mengirim data ke node 'log_sensor' di Firebase
        $database->getReference('log_sensor/node_01')->update($dataSensor);

        return response()->json([
            'status' => 'sukses',
            'message' => 'Data berhasil dikirim ke Firebase Realtime Database!',
            'data' => $dataSensor
        ]);
    }
}