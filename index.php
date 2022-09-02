<?php
 $dbhost = "localhost";
 $dbuser = "root";
 $dbpass = "";
 $dbname = "dts_bps";
 
 $connect = new mysqli($dbhost, $dbuser, $dbpass,$dbname);
 
 if ($connect->connect_error) {
 die("Connection failed: " . $connect->connect_error);
 }
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Tabel Survei</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <h1>Data Kegiatan</h1>
	<a href="tambah.php" class="btn btn-primary mb-4">+ Tambah Kegiatan</a>
	<br>
	<a href="ajax/surveitampil.html" class="btn btn-success mb-4">Lihat Status Pembayaran</a>
	<form action="" method="get">
        <div id="txtHint"><b>Data akan ditampilkan di sini.</b></div>
        <br>

        <select name="jenis_survei" id="jenis_survei"  style="width: 300px;" class="form-select form-select-sm" aria-label=".form-select-sm example">
            <option disabled selected>Berdasarkan Jenis Survei</option>
            <option value="0">Semua</option>
            <option value="1">Pertanian</option>
            <option value="2">Kependudukan</option>    
        </select>
         <br>
              
        <select name="sort" id="sort"  style="width: 300px;" class="form-select form-select-sm" aria-label=".form-select-sm example">
            <option disabled selected>Urutkan Berdasarkan</option>        
            <option value="1">Waktu Pembuatan</option>
            <option value="2">Nama Mitra</option>    
        </select>
         <br>
        <input type="submit" name="send" value="Send" class="btn btn-primary mb-4">
    </form>
        <table class="table table-striped" border="1">
            <tr>
                <th>Id</th>
                <th>Nama Mitra</th>
                <th>Nama Survei</th>
                <th>Jenis Survei</th>
                <th>Qty</th>
                <th>Status Pembayaran</th>
				<th>Waktu Pembuatan</th>
				<th>Action</th>
            </tr>
	
		<?php 
        // Tampilkan semua data
		if (!$connect) {
			die("Connection failed: " . mysqli_connect_error());
		}
		
		if (isset($_GET['status_pembayaran'])) {
			if ($_GET['status_pembayaran'] == 1) {
				$sql =  "SELECT * FROM kegiatan WHERE status_pembayaran = 'Sudah' ORDER BY id ASC";
			} else if($_GET['status_pembayaran'] == 2) {
				$sql =  "SELECT * FROM kegiatan WHERE status_pembayaran = 'Belum' ORDER BY id ASC";
			} else {
				$sql = "SELECT * FROM kegiatan";
			}
		} else {
			$sql = "SELECT * FROM kegiatan";
		}
		
		if (isset($_GET['jenis_survei'])) {
			if ($_GET['jenis_survei'] == 1) {
				$sql =  "SELECT * FROM kegiatan WHERE jenis_survei = 'Pertanian' ORDER BY id ASC";
			} else if($_GET['jenis_survei'] == 2) {
				$sql =  "SELECT * FROM kegiatan WHERE jenis_survei = 'Kependudukan' ORDER BY id ASC";
			} else {
				$sql = "SELECT * FROM kegiatan";
			}
		}
		
		if (isset($_GET['sort'])) {
			if ($_GET['sort'] == 1) {
				$sql =  "SELECT * FROM kegiatan ORDER by waktu_kegiatan ASC";
			} else if($_GET['sort'] == 2) {
				$sql =  "SELECT * FROM kegiatan ORDER by nama_mitra ASC";
			} else {
				$sql = "SELECT * FROM kegiatan";
			}
		}

		$result = mysqli_query($connect,$sql);
		$no = 1;
		while($d = mysqli_fetch_array($result)){
			?>
			<tr>
				<td><?php echo $no++; ?></td>
				<td><?php echo $d['nama_mitra']; ?></td>
				<td><?php echo $d['nama_survei']; ?></td>
				<td><?php echo $d['jenis_survei']; ?></td>
				<td><?php echo $d['qty']; ?></td>
				<td><?php echo $d['status_pembayaran']; ?></td>
				<td><?php echo $d['waktu_kegiatan']; ?></td>
				<td>
					<a href="edit.php?id=<?php echo $d['id']; ?>" class="btn btn-warning text-white mb-2">EDIT</a>
					<a href="hapus.php?id=<?php echo $d['id']; ?>" class="btn btn-danger mb-2">HAPUS</a>
				</td>
			</tr>
			<?php 
		}
		?>
        </table><br>
		<a href="berhasil_login.php" class="btn btn-primary mb-4"><- Kembali ke Halaman Utama</a>
    </div>
</body>

</html>
