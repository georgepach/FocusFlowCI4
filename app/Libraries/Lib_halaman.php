<?php
namespace App\Libraries;

class Lib_halaman{
    function info($parameter){
        return "Ditulis dalam kategori: <b>" .$parameter['kategori']. "</b> dengan penulis: <b>" .$parameter['scanner']. "</b>";
    }
}