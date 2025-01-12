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
    <h3>DATA SISWA MI-ALHIDAYAH PATI</h3>
    <h3 class="box-title">PERIODE <?= $periode['nm_periode'] ?> KELAS <?= $kelas['nm_kelas'] ?> </h3> &nbsp; &nbsp; &nbsp;

    <div class="batas-table">
        <table class="table">
            <thead>
                <thead>
                    <tr>
                        <th>NIS</th>
                        <th>ID USER</th>
                        <th>NM SISWA</th>
                        <th>JK SISWA</th>
                        <th>ALAMAT SISWA</th>
                        <th>NM ORANG TUA</th>
                        <th>FOTO SISWA</th>
                    </tr>
                <tbody>
                    <?php
                    foreach (QueryManyData('SELECT siswa.* FROM siswa JOIN plotting_jadwal ON siswa.id_siswa = plotting_jadwal.id_siswa WHERE plotting_jadwal.id_kelas = "' . $_GET['id_kelas'] . '" AND plotting_jadwal.id_periode ="' . $_GET['id_periode'] . '" ') as $row) {
                    ?>
                        <tr>
                            <td><?= $row['nis'] ?></td>
                            <td>
                                <?php
                                $user = QueryOnedata('SELECT * FROM user WHERE id_user = ' . $row['id_user'] . '')->fetch_assoc();
                                ?>
                                <?= $user['username'] . " | " . $user['nm_pengguna'] ?>
                            </td>
                            <td><?= $row['nm_siswa'] ?></td>
                            <td><?= $row['jk_siswa'] ?></td>
                            <td><?= $row['alamat_siswa'] ?></td>
                            <td><?= $row['nm_orang_tua'] ?></td>
                            <td><img src="<?= $url . '/foto/siswa/' . $row['foto_siswa']; ?>" alt="" srcset="" style="width: 50px; height:50px;"></td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </thead>
        </table>
        
        <p>
            WALI KELAS        <?= $guru['nm_guru'] ?> 
        </p>
    </div>
    <script>
        window.print();
    </script>
</body>

</html>