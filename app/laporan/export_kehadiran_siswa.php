<?php
include '../../config/config.php';
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <title>Export Data Excel Data Laporan Kehadiran Siswa</title>
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
    header("Content-Disposition: attachment; filename=Laporan data Kehadiran Siswa.xls");
    if (isset($_GET['jenis_filter'])) {
        if ($_GET['jenis_filter'] == 'tanggal') {
            $query_filter = "SELECT * FROM kehadiran_siswa WHERE tgl_kehadiran BETWEEN  '" . $_GET["dari_tanggal"] . "' AND '" . $_GET["sampai_tanggal"] . "'";
            $label = "Data Kehadiran Siswa</br> dari Tanggal " . $_GET["dari_tanggal"] . " Sampai Tanggal " . $_GET["sampai_tanggal"] . "</br> MI AL-HIDAYAH PURI PATI";
        } else if ($_GET['jenis_filter'] == 'bulan') {
            $query_filter = "SELECT * FROM kehadiran_siswa WHERE MONTH(tgl_kehadiran) = '" . $_GET["bulan"] . "' AND YEAR(tgl_kehadiran) ='" . $_GET["tahun"] . "'";
            $label = "Data Kehadiran Siswa</br> Bulan " . $_GET["bulan"] . " Tahun " . $_GET["tahun"] . "</br> MI AL-HIDAYAH PURI PATI";
        } else if ($_GET['jenis_filter'] == 'tahun') {
            $query_filter = "SELECT * FROM kehadiran_siswa WHERE  YEAR(tgl_kehadiran) ='" . $_GET["tahun"] . "'";
            $label = "Data Kehadiran Siswa</br> Tahun " . $_GET["tahun"] . "</br> MI AL-HIDAYAH PURI PATI";
        }
    }
    ?>
    <center>
        <h1>Export <?= $label ?></h1>
    </center>
    <table border="1">
        <tr class='text-center'>
        <tr>
            <th>ID PLOTTING</th>
            <th>TGL KEHADIRAN</th>
            <th>JENIS KEHADIRAN</th>
        </tr>
        <?php
        foreach (QueryManyData('SELECT * FROM kehadiran_siswa') as $row) {
        ?>
            <tr>
                <td>
                    <?php
                    $query_plotting = 'SELECT plotting_jadwal.*, mapel.nm_mapel, kelas.nm_kelas, siswa.nm_siswa FROM plotting_jadwal
                    LEFT JOIN mapel ON plotting_jadwal.id_mapel = mapel.id_mapel
                    LEFT JOIN siswa ON plotting_jadwal.id_siswa = siswa.id_siswa
                    LEFT JOIN kelas ON plotting_jadwal.id_kelas = kelas.id_kelas
                    LEFT JOIN periode ON plotting_jadwal.id_periode = periode.id_periode
                    WHERE plotting_jadwal.id_plotting = ' . $row['id_plotting'] . '
                    ';
                    $plotting = QueryOnedata($query_plotting)->fetch_assoc();
                    ?>
                    <?= $plotting['hari'] . " | " . $plotting['jam_awal'] . " | " . $plotting['jam_akhir'] . " | " . $plotting['nm_mapel'] . " | " . $plotting['nm_kelas'] . " | " . $plotting['nm_siswa'] ?>
                </td>
                <td><?= $row['tgl_kehadiran'] ?></td>
                <td><?= $row['jenis_kehadiran'] ?></td>
            </tr>
        <?php
        }
        ?>
    </table>
</body>

</html>