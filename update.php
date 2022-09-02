<?php
require_once 'koneksi_survei.php';
if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $nama_mitra    = $_POST['nama_mitra'];
    $nama_survei   = $_POST['nama_survei'];
    $jenis_survei    = $_POST['jenis_survei'];
    $qty    = $_POST['qty'];
    $status_pembayaran    = $_POST['status_pembayaran'];

    $q = $conn->query("UPDATE kegiatan SET
    nama_mitra='$nama_mitra', 
    nama_survei='$nama_survei', 
    jenis_survei='$jenis_survei',
    qty='$qty',
    status_pembayaran='$status_pembayaran' 
    WHERE id='$id'");

    if ($q) {
        // pesan jika data berubah
        echo "<script>alert('Data Kegiatan berhasil diubah'); window.location.href='index.php'</script>";
    } else {
        // pesan jika data gagal diubah
        echo "<script>alert('Data Kegiatan gagal diubah'); window.location.href='index.php'</script>";
    }
    } else {
    header('Location: index.php');
}