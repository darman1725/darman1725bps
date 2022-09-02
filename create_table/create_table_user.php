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
$sql = "CREATE TABLE user (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(100),
    password VARCHAR(100),
    role enum('Admin','User') default 'User')";

if ($koneksi->query($sql) === TRUE) {
    echo "<br>Tabel User berhasil dibuat";
}
else{
    echo "<br>Tabel User dibuat: " .$koneksi->error;
}

$koneksi->close();
?>