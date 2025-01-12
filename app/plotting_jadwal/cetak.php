<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    include '../../config/config.php';
    $periode = QueryOnedata('SELECT * FROM periode WHERE id_periode = ' . $_GET['id_periode'] . '')->fetch_assoc();
    $kelas = QueryOnedata('SELECT * FROM kelas WHERE id_kelas = ' . $_GET['id_kelas'] . '')->fetch_assoc();
    $guru = QueryOnedata('SELECT * FROM guru WHERE id_guru = ' . $kelas['id_guru'] . '')->fetch_assoc();
    ?>
    <style>
        table,
        thead,
        tr,
        th,
        td {
            border: 1px solid black;
            padding: 5px;
            text-align: center;

        }

        table {
            width: 100%;

        }

        h3 {
            text-align: center;
        }
    </style>
    <h3>Jadwal Pelajaran </h3>
    <h3 class="box-title">Periode <?= $periode['nm_periode'] ?> Kelas <?= $kelas['nm_kelas'] ?> Wali Kelas <?= $guru['nm_guru'] ?> </h3>
    <?php
    $hari = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
    $jams = ['07:00', '08:00', '09:00',  '10:00', '11:00', '12:00'];
    ?>

    <div class="batas-table">
        <table class="table">
            <thead>
                <tr>
                    <th class='text-center'>Waktu</th>
                    <?php                // Contoh penggunaan
                    foreach ($hari as $h) {
                        echo "<th class='text-center'>" . $h . "</th>";
                    }
                    ?>
                </tr>
            <tbody>
                <?php                // Contoh penggunaan
                for ($j = 0; $j < count($jams); $j++) {
                    echo "<tr><td class='text-center'>" . $jams[$j] . "</td>";
                    foreach ($hari as $h) {
                        $query_jadwal = "SELECT * FROM plotting_jadwal WHERE hari = '" . $h . "' AND jam_awal = '" . $jams[$j] . ":00' AND id_periode = " . $_GET['id_periode'] . " AND id_kelas = " . $_GET['id_kelas'] . " ";
                        $check_jadwal = QueryOnedata($query_jadwal);
                        if ($check_jadwal->num_rows < 1) {
                            echo "<td class='text-center'></td>";
                        } else {
                            $mapel = QueryOnedata("SELECT * FROM mapel WHERE id_mapel = " . $check_jadwal->fetch_assoc()['id_mapel'] . "")->fetch_assoc();
                            echo "<td class='text-center'> " . $mapel['nm_mapel'] . "</td>";
                        }
                    }
                    echo "</tr>";
                }
                ?>
            </tbody>
            </thead>
        </table>
    </div>
    <script>
        window.print();
    </script>
</body>

</html>