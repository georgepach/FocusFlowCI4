<?php

namespace App\Controllers;

class Coba extends BaseController
{
    public function index(): string
    {
        return('testing');
    }

    public function about($nama)
    {
        echo "Halo, nama saya $nama";
    }
    
}
