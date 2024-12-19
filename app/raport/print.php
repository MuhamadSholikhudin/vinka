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
    $periode = QueryOnedata("SELECT * FROM periode WHERE id_periode = " . $_GET['id_periode'] . "")->fetch_assoc();
    $kelas = QueryOnedata("SELECT * FROM kelas JOIN guru ON kelas.id_guru = guru.id_guru WHERE kelas.id_kelas = " . $_GET['id_kelas'] . "")->fetch_assoc();
    $siswa = QueryOnedata("SELECT * FROM siswa WHERE id_siswa = " . $_GET['id_siswa'] . "")->fetch_assoc();
    $smt = explode(" ", $periode['nm_periode']);
    ?>
    <section class='content' style="background-color: white;">

        <div class='row'>
            <div class='col-xs-12'>
                <style>
                    table {
                        width: 100%;
                    }

                    table,
                    th,
                    td {
                        border: 1px solid black;
                        text-align: center;
                    }
                </style>

                <table style="text-align: left; border:none;">
                    <tbody>
                        <tr>
                            <td style="text-align: left; border:none;">Nama Peserta Didik</td>
                            <td style="text-align: left; border:none;">: <?= $siswa['nm_siswa'] ?></td>
                            <td style="text-align: left; border:none;">Kelas</td>
                            <td style="text-align: left; border:none;">: <?= $kelas['nm_kelas'] ?></td>
                        </tr>
                        <tr>
                            <td style="text-align: left; border:none;">Nomer Induk</td>
                            <td style="text-align: left; border:none;">: <?= $siswa['nis'] ?></td>
                            <td style="text-align: left; border:none;">Semester</td>
                            <td style="text-align: left; border:none;">: <?= $smt[1] ?></td>
                        </tr>
                        <tr>
                            <td style="text-align: left; border:none;">Nama Sekolah</td>
                            <td style="text-align: left; border:none;">: MI ALHIDAYAH</td>
                            <td style="text-align: left; border:none;">Tahun Pelajaran</td>
                            <td style="text-align: left; border:none;">: <?= $smt[2] ?></td>
                        </tr>
                        <tr>
                            <td style="text-align: left; border:none;">Alamat Sekolah</td>
                            <td style="text-align: left; border:none;" colspan="3">: Jl. Taman Pahlawan, Puri, Kec. Pati, Kabupaten Pati, Jawa Tengah 59113.</td>
                        </tr>
                    </tbody>
                </table>

                <div style="height: 30px;"></div>

                <table>
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>NAMA MATA PELAJARAN</th>
                            <th>KKM</th>
                            <th>NILAI</th>
                            <th>HURUF</th>
                            <th>NILAI PRAKTEK</th>
                            <th>HURUF</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        //menampilkan data plotting jadwal berdasarkan siswa kelas dan periode group by
                        $plotting = "SELECT * FROM plotting_jadwal WHERE id_siswa = " . $_GET['id_siswa'] . " AND id_kelas = " . $_GET['id_kelas'] . " AND id_periode = " . $_GET['id_periode'] . " GROUP BY id_mapel";
                        //menampilkan data plotting jadwal berdasarkan siswa kelas dan periode
                        $no = 0;
                        foreach (QueryManyData($plotting) as $plot) {
                            $no++;
                        ?>
                            <tr>
                                <td><?= $no ?></td>
                                <td>
                                    <?php
                                    $mapel = QueryOnedata("SELECT * FROM mapel WHERE id_mapel = " . $plot['id_mapel'] . "")->fetch_assoc();
                                    ?>
                                    <?= $mapel['nm_mapel']; ?>
                                </td>
                                <td></td>
                                <td>
                                    <?php
                                    $penilaian = QueryOnedata("SELECT * FROM penilaian WHERE id_plotting = " . $plot['id_plotting'] . "")->fetch_assoc();
                                    ?>
                                    <?= $penilaian['nilai']; ?>
                                </td>
                                <td>
                                    <?= penyebut($penilaian['nilai']); ?>

                                </td>
                                <td><?= $penilaian['nilai_praktek']; ?></td>
                                <td><?= penyebut($penilaian['nilai_praktek']); ?></td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>

                <div style="height: 30px;"></div>
                <table>
                    <tbody>
                        <tr>
                            <td>NO</td>
                            <td>AKHLAK DAN KEPRIBADIAN</td>
                            <td>KETIDAKHADIRAN</td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>
                                <?php
                                $kehadiran_sakit_query = "SELECT COUNT(kehadiran_siswa.id_kehadiran) as sakit FROM  kehadiran_siswa 
                                    JOIN plotting_jadwal ON kehadiran_siswa.id_plotting = plotting_jadwal.id_plotting 
                                    WHERE plotting_jadwal.id_siswa = " . $_GET['id_siswa'] . " AND plotting_jadwal.id_kelas = " . $_GET['id_kelas'] . " AND plotting_jadwal.id_periode = " . $_GET['id_periode'] . " AND kehadiran_siswa.jenis_kehadiran = 'Sakit' ";
                                $kehadiran_sakit = QueryOnedata($kehadiran_sakit_query)->fetch_assoc();
                                ?>
                            </td>
                            <td style="text-align: left;">&nbsp;1. Sakit : <?= $kehadiran_sakit['sakit'] ?></td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>
                                <?php
                                $kehadiran_izin_query = "SELECT COUNT(kehadiran_siswa.id_kehadiran) as izin FROM  kehadiran_siswa 
                                    JOIN plotting_jadwal ON kehadiran_siswa.id_plotting = plotting_jadwal.id_plotting 
                                    WHERE plotting_jadwal.id_siswa = " . $_GET['id_siswa'] . " AND plotting_jadwal.id_kelas = " . $_GET['id_kelas'] . " AND plotting_jadwal.id_periode = " . $_GET['id_periode'] . " AND kehadiran_siswa.jenis_kehadiran = 'Izin' ";
                                $kehadiran_izin = QueryOnedata($kehadiran_izin_query)->fetch_assoc();
                                ?>
                            </td>
                            <td style="text-align: left;">&nbsp;2. Izin : <?= $kehadiran_sakit['sakit'] ?></td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>
                                <?php
                                $kehadiran_alfa_query = "SELECT COUNT(kehadiran_siswa.id_kehadiran) as alfa FROM  kehadiran_siswa 
                                    JOIN plotting_jadwal ON kehadiran_siswa.id_plotting = plotting_jadwal.id_plotting 
                                    WHERE plotting_jadwal.id_siswa = " . $_GET['id_siswa'] . " AND plotting_jadwal.id_kelas = " . $_GET['id_kelas'] . " AND plotting_jadwal.id_periode = " . $_GET['id_periode'] . " AND kehadiran_siswa.jenis_kehadiran = 'Alfa' ";
                                $kehadiran_alfa = QueryOnedata($kehadiran_alfa_query)->fetch_assoc();
                                ?>
                            </td>
                            <td style="text-align: left;">&nbsp;3. Tanpa Keterangan : <?= $kehadiran_alfa['alfa'] ?></td>
                        </tr>
                    </tbody>
                </table>
                <div style="height: 30px;"></div>


                <table style="text-align: left; border:none;">
                    <tbody>
                        <tr>
                            <td style="text-align: center; border:none;">Mengetahui</td>
                            <td style="text-align: left; border:none;"></td>
                            <td style="text-align: left; border:none;">Wali Kelas</td>
                        </tr>
                        <tr>
                            <td style="text-align: center; border:none;">Orang Tua / Wali Murid</td>
                            <td style="text-align: left; border:none;"></td>
                            <td style="text-align: left; border:none;"></td>
                        </tr>
                        <tr>
                            <td style="height: 70px; border:none;"></td>
                            <td style="text-align: left; border:none;"></td>
                            <td style="text-align: left; border:none;"></td>
                        </tr>
                        <tr>
                            <td style="text-align: center; border:none;">(<?= $siswa['nm_orang_tua'] ?>)</td>
                            <td style="text-align: left; border:none;"></td>
                            <td style="text-align: left ; border:none;"><?= $kelas['nm_guru'] ?> <br> NIP : <?= $kelas['nip'] ?> </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <script>
            window.print();
        </script>
</body>

</html>