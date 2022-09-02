<!DOCTYPE html>
<html>
<style>
input[type=text],
select {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

input[type=number],
select {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

input[type=submit] {
    width: 100%;
    background-color: #6c5ce7;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

input[type=submit]:hover {
    background-color: #6c5ce7;
}

div {
    border-radius: 5px;
    background-color: #f2f2f2;
    padding: 20px;
}
</style>

    <head>
        <link rel="stylesheet" type="text/css" href="style.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>

<body>

<?php
    require_once 'koneksi_survei.php';
    if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $q = $conn->query("SELECT * FROM kegiatan WHERE id = '$id'");
    foreach ($q as $dt) :
?>
    <div>
    <form action="update.php" method="post">
            <td><input type="hidden" name="id" value="<?= $dt['id'] ?>"></td>
            <h3>Form Edit Data Kegiatan</h3><br>

            <label >Nama Mitra</label>
            <td><input type="text" name="nama_mitra" value="<?= $dt['nama_mitra'] ?>"></td>
            
            <label >Nama Survei</label>
            <input type="text" name="nama_survei" value="<?= $dt['nama_survei'] ?>"></td>
           
            <label >Jenis Survei</label>
            <select  name="jenis_survei" value="<?= $dt['jenis_survei'] ?>">
                    <option selected disabled>Pilih Jenis Survei</option>
                    <option value="Pertanian">Pertanian</option>
                    <option value="Kependudukan">Kependudukan</option>
            </select>

            <label>Qty</label>
            <input type="text" name="qty" value="<?= $dt['qty'] ?>"></td>
           
            <label>Status Pembayaran</label>
            <select  name="status_pembayaran"  value="<?= $dt['status_pembayaran'] ?>">
                    <option selected disabled>Pilih Status Pembayaran</option>
                    <option value="Sudah">Sudah</option>
                    <option value="Belum">Belum</option>
            </select>
           
            <input type="submit" name="submit" value="Ubah Data">
             <a href="index.php" class="btn btn-secondary mb-4">Kembali</a>
    </form>
    </div>
    </body>

</html>
    <?php
    endforeach;
}

