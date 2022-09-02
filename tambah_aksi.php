<?php
include 'koneksi.php';

    //cek button    
    if ($_POST['Submit'] == "Submit") {
    $nama_mitra    = $_POST['nama_mitra'];
    $nama_survei   = $_POST['nama_survei'];
    $jenis_survei    = $_POST['jenis_survei'];
    $qty    = $_POST['qty'];
    $status_pembayaran    = $_POST['status_pembayaran'];
    $val="&nama_mitra=$nama_mitra
    &nama_survei=$nama_survei
    &jenis_survei=$jenis_survei
    &qty=$qty
    &status_pembayaran=$status_pembayaran";

    //validasi data yang kosong
    if (empty($_POST['nama_mitra'])||
    empty($_POST['nama_survei'])||
    empty($_POST['jenis_survei'])||
    empty($_POST['qty'])||
    empty($_POST['status_pembayaran'])) {
    echo "Data harap dilengkapi";
    }
    else{
        include "koneksi.php";

        // menginput data ke database
        mysqli_query($koneksi,"INSERT INTO kegiatan(
        nama_mitra,
        nama_survei,
        jenis_survei,
        qty,
        status_pembayaran) VALUES(
        '$nama_mitra',
        '$nama_survei',
        '$jenis_survei',
        '$qty',
        '$status_pembayaran')");

    // mengalihkan halaman kembali ke index.php
    header("location:index.php");
    }

}
?>