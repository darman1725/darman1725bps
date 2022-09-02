<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dts_bps";

// Membuat koneksi
$koneksi = new mysqli($servername, $username, $password, $dbname);

// Melakukan check koneksi
if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}

// Perintah SQL untuk menginputkan data
$sql = "INSERT INTO kegiatan(
    nama_mitra,
    nama_survei,
    jenis_survei,
    qty,
    status_pembayaran) VALUES 
    ('Wildan Sakti','Survei AB','Pertanian','1','Sudah'),
    ('Darman Nicholas','Survei AC','Kependudukan','2','Belum'),
    ('Fajar Joni','Survei AD','Pertanian','1','Sudah'),
    ('Sutiyem Rahmanda','Survei AB','Kependudukan','4','Belum'),
    ('Pokina Anindhita','Survei AC','Kependudukan','2','Belum')";

if ($koneksi->query($sql) === TRUE) {
    echo "<br>Data Kegiatan berhasil diinputkan";
}
else{
    echo "<br>Data gagal masuk: " .$sql. "<br>". $koneksi->error;
}

$koneksi->close();
?>