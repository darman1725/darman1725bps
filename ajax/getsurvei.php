<!DOCTYPE html>
<html>

<head>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        table,
        td,
        th {
            border: 1px solid black;
            padding: 5px;
        }

        th {
            text-align: left;
        }
    </style>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <?php
    $q = ($_GET['q']);

    $con = mysqli_connect('localhost', 'root', '');
    if (!$con) {
        die('Could not connect: ' . mysqli_error($con));
    }

    mysqli_select_db($con, "dts_bps");
    if($q==0)
    $sql = "SELECT * FROM kegiatan";
    else
    $sql = "SELECT * FROM kegiatan WHERE status_pembayaran = '" .$q. "'";
    $result = mysqli_query($con, $sql);
    $no = 1;
    // echo $sql;
    // echo $q;

    echo "<table class=table table-striped border=1>
    <tr>
    <th>No</th>
    <th>Nama Mitra</th>
    <th>Nama Survei</th>
    <th>Jenis Survei</th>
    <th>Qty</th>
    <th>Status Pembayaran</th>
    </tr>";

    while ($row = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td>" . $no++ . "</td>";
        echo "<td>" . $row['nama_mitra'] . "</td>";
        echo "<td>" . $row['nama_survei'] . "</td>";
        echo "<td>" . $row['jenis_survei'] . "</td>";
        echo "<td>" . $row['qty'] . "</td>";
        echo "<td>" . $row['status_pembayaran'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
    mysqli_close($con);
    ?>
</body>

</html>
