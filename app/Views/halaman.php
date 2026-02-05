    <h1>
        <?php echo $judul_halaman?>
    </h1>
    <?php echo view_cell("\App\Controllers\Halaman::info", ['kategori'=>'Berita', 'scanner'=>'Sugiono'])?>
    <div><?php echo $isi_halaman?></div>
    <div>
        <ul>
            <?php foreach($gerakan5m as $k => $v){
                    echo"<li>$v</li>";
                }
            ?>
        </ul>
    </div>
