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
$sql = "INSERT INTO user(
    username,
    password,
    role) VALUES 
    ('userAdmin',MD5('userAdmin123'),'Admin'),
    ('userSurvei',MD5('userSurvei123'),'User')";

if ($koneksi->query($sql) === TRUE) {
    echo "<br>Data Kegiatan berhasil diinputkan";
}
else{
    echo "<br>Data gagal masuk: " .$sql. "<br>". $koneksi->error;
}

$koneksi->close();
?>