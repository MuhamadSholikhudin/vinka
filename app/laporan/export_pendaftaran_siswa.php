<?php
include '../../config/config.php';
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <title>Export Data Excel Data Laporan Pendaftaran Siswa</title>
</head>

<body>
    <style type="text/css">
        body {
            font-family: sans-serif;
        }

        table {
            margin: 20px auto;
            border-collapse: collapse;
        }

        table th,
        table td {
            border: 1px solid #3c3c3c;
            padding: 3px 8px;

        }

        a {
            background: blue;
            color: #fff;
            padding: 8px 10px;
            text-decoration: none;
            border-radius: 2px;
        }
    </style>
    <?php
    header("Content-type: application/vnd-ms-excel");
    header("Content-Disposition: attachment; filename=Laporan data Pendaftaran Siswa.xls");
    if (isset($_GET['jenis_filter'])) {
        if ($_GET['jenis_filter'] == 'tanggal') {
            $query_filter = "SELECT * FROM pendaftaran_siswa WHERE tgl_daftar BETWEEN  '" . $_GET["dari_tanggal"] . "' AND '" . $_GET["sampai_tanggal"] . "'";
            $label = "Data Pendaftaran Siswa</br> dari Tanggal " . $_GET["dari_tanggal"] . " Sampai Tanggal " . $_GET["sampai_tanggal"] . "</br> MI AL-HIDAYAH PURI PATI";
        } else if ($_GET['jenis_filter'] == 'bulan') {
            $query_filter = "SELECT * FROM pendaftaran_siswa WHERE MONTH(tgl_daftar) = '" . $_GET["bulan"] . "' AND YEAR(tgl_daftar) ='" . $_GET["tahun"] . "'";
            $label = "Data Pendaftaran Siswa</br> Bulan " . $_GET["bulan"] . " Tahun " . $_GET["tahun"] . "</br> MI AL-HIDAYAH PURI PATI";
        } else if ($_GET['jenis_filter'] == 'tahun') {
            $query_filter = "SELECT * FROM pendaftaran_siswa WHERE  YEAR(tgl_daftar) ='" . $_GET["tahun"] . "'";
            $label = "Data Pendaftaran Siswa</br> Tahun " . $_GET["tahun"] . "</br> MI AL-HIDAYAH PURI PATI";
        }
    }
    ?>
    <center>
        <h1>Export <?= $label ?></h1>
    </center>
    <table border="1">
        <tr class='text-center'>
        <tr>
            <th>PERIODE</th>
            <th>USER</th>
            <th>TANGGAL DAFTAR</th>
            <th>NAMA SISWA</th>
            <th>JK SISWA</th>
            <th>ALAMAT SISWA</th>
            <th>NAMA ORANG TUA</th>
            <th>FOTO SISWA</th>
            <th>STATUS</th>
        </tr>
        <?php
        foreach (QueryManyData($query_filter) as $row) {
            $periode = QueryOnedata("SELECT * FROM periode WHERE id_periode = " . $row['id_periode'] . "")->fetch_assoc();
            $user = QueryOnedata("SELECT * FROM user WHERE id_user = " . $row['id_user'] . "")->fetch_assoc();
        ?>
            <tr>
                <td><?= $periode['nm_periode'] ?></td>
                <td><?= $user['username'] ?></td>
                <td><?= $row['tgl_daftar'] ?></td>
                <td><?= $row['nm_siswa'] ?></td>
                <td><?= $row['jk_siswa'] ?></td>
                <td><?= $row['alamat_siswa'] ?></td>
                <td><?= $row['nm_orang_tua'] ?></td>
                <td> <img src="<?= $url . '/foto/siswa/' . $row['foto_siswa']; ?>" alt="" srcset="" style="width: 50px; height:50px;"> </td>
                <td>
                    <?= $row['status_pendaftaran'] ?>
                </td>
            </tr>
        <?php } ?>
    </table>
</body>

</html>