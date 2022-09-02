<?php 
$koneksi = mysqli_connect("localhost","root","","dts_bps");
 
// Memeriksa koneksi
if (mysqli_connect_errno()){
	echo "Koneksi database gagal : " . mysqli_connect_error();
}
 
?>