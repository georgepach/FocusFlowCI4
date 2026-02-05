<?php

namespace App\Controllers\Admin;

class Coba extends BaseController
{
    public function index()
    {
        return view('siswa');
    }

    public function siswa_detail($kelas)
    {
        // Data 'ipa' dari URL masuk ke variabel $kelas
        echo "<h1>Saya merupakan kelas $kelas</h1>";
        $this->validasi();
    }

    protected function validasi()
    {
        echo "saya adalah fungsi protected untuk validasi";
    }
}