<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Tabel Kegiatan</title>
    <style>
    /* ==== GLOBAL STYLE ==== */
    body {
        background-color: #F8F8F8;
    }

    div.container {
        width: 960px;
        padding: 10px 50px 50px;
        background-color: white;
        margin: 20px auto;

        box-shadow: 1px 0px 10px, -1px 0px 10px;
    }

    h1 {
        text-align: center;
        font-family: Cambria, "Times New Roman", serif;
        clear: both;
    }

    /* ====== TABLE ====== */
    table {
        border-collapse: collapse;
        border-spacing: 0;
        border: 1px black solid;
        width: 100%
    }

    th,
    td {
        padding: 8px 15px;
        border: 1px black solid;
    }

    tr:nth-child(2n+3) {
        background-color: #F2F2F2;
    }
    </style>
</head>

<body>
    <div class="container">
        <h1>Data Kegiatan</h1>
        <table border="1">
            <tr>
                <th>Id</th>
                <th>Nama Mitra</th>
                <th>Nama Survei</th>
                <th>Jenis Survei</th>
                <th>Qty</th>
                <th>Status Pembayaran</th>
            </tr>
            <?php
        foreach ($isiTabelSurvei as $kegiatan) {
            echo "<tr>";
            echo "<td>$kegiatan[id]</td>";
            echo "<td>$kegiatan[nama_mitra]</td>";
            echo "<td>$kegiatan[nama_survei]</td>";
            echo "<td>$kegiatan[jenis_survei]</td>";
            echo "<td>$kegiatan[qty]</td>";
            echo "<td>$kegiatan[status_pembayaran]</td>";
            echo "</tr>";
        }
        ?>

        </table>
    </div>
</body>

</html>