<?php
// Buat koneksi dengan database mysql
function buatKoneksi(){
    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "";
    $dbname = "dts_bps";
    return mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
}

// Ambil tabel kegiatan
function getTableSurvei(){
    $link = buatKoneksi();
    $query = "SELECT * FROM kegiatan";
    $result = mysqli_query($link, $query);


// Ambil semua isi tabel ke dalam bentuk array 2 Dimensi
$hasil = mysqli_fetch_all($result, MYSQLI_ASSOC);
return $hasil;
}

echo "<pre>";
print_r(getTableSurvei());
echo "</pre>";