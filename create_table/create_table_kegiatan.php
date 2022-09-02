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

// Perintah SQL untuk membuat tabel
$sql = "CREATE TABLE kegiatan (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nama_mitra VARCHAR(50),
    nama_survei VARCHAR(50),
    jenis_survei VARCHAR (30),
    qty INT(11),
    status_pembayaran enum('Sudah','Belum') default 'Sudah',
    waktu_kegiatan TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP)";

if ($koneksi->query($sql) === TRUE) {
    echo "<br>Tabel kegiatan berhasil dibuat";
}
else{
    echo "<br>Tabel kegiatan dibuat: " .$koneksi->error;
}

$koneksi->close();
?>