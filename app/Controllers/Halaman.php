<?php

namespace App\Controllers;

// Pastikan meng-extend BaseController seperti di Controller lainnya
class Halaman extends BaseController 
{
    public function index()
    {
        // Memanggil file app/Views/halaman.php
        $data['title'] = "Tetap waspada";
        $data['judul_halaman'] = "Tetap waspada 2";
        $data['isi_halaman'] = "Bhapp";
                $data['gerakan5m'] = ['Memakai masketr', 'me', 'mi', 'ma', 'mo'];
        echo view("header", $data);
        echo view('halaman', $data);
        echo view("footer", $data);
    }

    public function info()
    {
        return "Ditulis di kategori: <b>Berita</b>, Penulis <b>Sugondo</b>";
    }
}