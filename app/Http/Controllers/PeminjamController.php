<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PeminjamController extends Controller
{
    public function LihatDataPeminjam()
    {
        $peminjam = [
            'Ichsanul',
            'Dwi',
            'Prayitno'
        ];
        return view('peminjams/lihat_data_peminjam' , compact('peminjam'));
    }
}
