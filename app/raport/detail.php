<?php include_once '../template/header.php'; ?>
<?php include_once '../template/navbar.php'; ?>
<?php include_once '../template/sidebar.php'; ?>
<?php
$periode = QueryOnedata("SELECT * FROM periode WHERE id_periode = " . $_GET['id_periode'] . "")->fetch_assoc();
$kelas = QueryOnedata("SELECT * FROM kelas JOIN guru ON kelas.id_guru = guru.id_guru WHERE kelas.id_kelas = " . $_GET['id_kelas'] . "")->fetch_assoc();
$siswa = QueryOnedata("SELECT * FROM siswa WHERE id_siswa = " . $_GET['id_siswa'] . "")->fetch_assoc();
$smt = explode(" ", $periode['nm_periode']);
?>

<div class='content-wrapper'>
    <section class='content-header'>
        <h1>Raport page
            <?php
            ?>
        </h1>
        <ol class='breadcrumb'>
            <li><a href='#'><i class='fa fa-dashboard'></i> Index</a></li>
            <li class='active'>Raport page</li>
        </ol>
    </section>
    <div style="height: 50px; padding:10px;">
        <a target="_blank" href='<?= $url ?>/app/raport/cetak.php?id_periode=<?= $_GET['id_periode'] ?>&id_kelas=<?= $_GET['id_kelas'] ?>&id_siswa=<?= $_GET['id_siswa'] ?>' class='btn bg-warning btn-flat btn-sm'><i class='fa fa-print'></i> Print</a>
    </div>
    <section class='content' style="background-color: white;">
        <?php if (isset($_SESSION['message'])) {
            if ($_SESSION['message_code'] == 200) {
        ?>
                <div class='alert alert-info alert-dismissable'>
                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
                    <h4>
                        <i class='icon fa fa-check-circle'></i> Success!
                    </h4>
                    <?= $_SESSION['message'] ?>
                </div>
            <?php
            } else {
            ?>
                <div class='alert alert-danger alert-dismissable'>
                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
                    <h4><i class='icon fa fa-ban'></i> Error!</h4>
                    <?= $_SESSION['message'] ?>
                </div>
        <?php
            }
            unset($_SESSION['message']);
            unset($_SESSION['message_code']);
        } ?>
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

                <style>
                    .headerX {
                        text-align: center;
                        font-family: Arial, sans-serif;
                        margin: 20px auto;
                    }

                    .headerX img {
                        float: left;
                        width: 80px;
                        height: auto;
                        margin-right: 15px;
                    }

                    .headerX h1 {
                        margin: 0;
                        font-size: 20px;
                        font-weight: bold;
                    }

                    .headerX h2 {
                        margin: 0;
                        font-size: 18px;
                        text-transform: uppercase;
                    }

                    .headerX p {
                        margin: 5px 0 0 0;
                        font-size: 14px;
                        font-style: italic;
                    }

                    .containerX {
                        display: flex;
                        align-items: center;
                        justify-content: center;
                    }
                </style>
                <div class="container">
                    <div class="headerX">
                        <img src="http://localhost/vinka/assets/dist/img/logo-alhidayah.png" alt="Logo KemenagX">
                        <h1>KEMENTERIAN AGAMA REPUBLIK INDONESIA</h1>
                        <h2>MIS AL HIDAYAH</h2>
                        <p>TAMAN PAHLAWAN</p>
                        <p>Kecamatan Pati, Kabupaten Pati - Jawa Tengah</p>
                    </div>
                </div>

                <?php /*

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
                */ ?>
                <hr>
                <table style="text-align: left; border:none;">
                    <tbody>
                        <tr>
                            <td style="text-align: left; border:none;">NAMA</td>
                            <td style="text-align: left; border:none;">: <?= $siswa['nm_siswa'] ?></td>
                            <td style="text-align: left; border:none;">Madrasah</td>
                            <td style="text-align: left; border:none;">: MIS ALHIDAYAH</td>
                        </tr>
                        <tr>
                            <td style="text-align: left; border:none;">NIS</td>
                            <td style="text-align: left; border:none;">: <?= $siswa['nis'] ?></td>
                            <td style="text-align: left; border:none;">Semester</td>
                            <td style="text-align: left; border:none;">: <?= $smt[1] ?></td>
                        </tr>
                        <tr>
                            <td style="text-align: left; border:none;">KELAS</td>
                            <td style="text-align: left; border:none;">: <?= $kelas['nm_kelas'] ?></td>
                            <td style="text-align: left; border:none;">Tahun Pelajaran</td>
                            <td style="text-align: left; border:none;">: <?= $smt[2] ?></td>
                        </tr>
                    </tbody>
                </table>
                <hr>

                <h2 style="text-align: center;"> CAPAIAN HASIL BELAJAR</h2>

                <h4>A. SIKAP SPIRITUAL</h4>
                <h4>SIKAP SPIRITUAL</h4>
                <table>
                    <tbody>
                        <tr>
                            <td style="width: 150px;">Predikat</td>
                            <td> DESKRIPSI</td>
                        </tr>
                        <tr>
                            <?php
                            $check_sikap_spiritual = "SELECT * FROM rapot WHERE id_periode = " . $_GET['id_periode'] . " AND id_siswa = " . $_GET['id_siswa'] . " AND jenis = 'sikap spiritual' ";
                            ?>
                            <?php
                            $value_sikap_spiritual = "";
                            $deskripsi_sikap_spiritual = "";
                            if (QueryOnedata($check_sikap_spiritual)->num_rows > 0) {
                                $value_sikap_spiritual .= QueryOnedata($check_sikap_spiritual)->fetch_assoc()['value'];
                                $deskripsi_sikap_spiritual .= QueryOnedata($check_sikap_spiritual)->fetch_assoc()['deskripsi'];
                            }
                            ?>
                            <td><?= $value_sikap_spiritual ?></td>
                            <td style="text-align: left;"><?= $deskripsi_sikap_spiritual ?></td>
                        </tr>
                    </tbody>
                </table>
                <h4>SIKAP SOSIAL</h4>
                <table>
                    <tbody>
                        <tr>
                            <td style="width: 150px;">Predikat</td>
                            <td> DESKRIPSI</td>
                        </tr>
                        <tr>
                        <?php
                            $check_sikap_sosial = "SELECT * FROM rapot WHERE id_periode = " . $_GET['id_periode'] . " AND id_siswa = " . $_GET['id_siswa'] . " AND jenis = 'sikap sosial' ";
                            ?>
                            <?php
                            $value_sikap_sosial = "";
                            $deskripsi_sikap_sosial = "";
                            if (QueryOnedata($check_sikap_sosial)->num_rows > 0) {
                                $value_sikap_sosial .= QueryOnedata($check_sikap_sosial)->fetch_assoc()['value'];
                                $deskripsi_sikap_sosial .= QueryOnedata($check_sikap_sosial)->fetch_assoc()['deskripsi'];
                            }
                            ?>
                            <td><?= $value_sikap_sosial ?></td>
                            <td style="text-align: left;"><?= $deskripsi_sikap_sosial ?></td>
                        </tr>
                    </tbody>
                </table>
                <hr>
                <table style="text-align: left; border:none;">
                    <tbody>
                        <tr>
                            <td style="text-align: left; border:none;">NAMA</td>
                            <td style="text-align: left; border:none;">: <?= $siswa['nm_siswa'] ?></td>
                            <td style="text-align: left; border:none;">Madrasah</td>
                            <td style="text-align: left; border:none;">: MIS ALHIDAYAH</td>
                        </tr>
                        <tr>
                            <td style="text-align: left; border:none;">NIS</td>
                            <td style="text-align: left; border:none;">: <?= $siswa['nis'] ?></td>
                            <td style="text-align: left; border:none;">Semester</td>
                            <td style="text-align: left; border:none;">: <?= $smt[1] ?></td>
                        </tr>
                        <tr>
                            <td style="text-align: left; border:none;">KELAS</td>
                            <td style="text-align: left; border:none;">: <?= $kelas['nm_kelas'] ?></td>
                            <td style="text-align: left; border:none;">Tahun Pelajaran</td>
                            <td style="text-align: left; border:none;">: <?= $smt[2] ?></td>
                        </tr>
                    </tbody>
                </table>
                <hr>
                <div style="height: 30px;"></div>
                <h4>B. PENGETAHUAN DAN KETRAMPILAN</h4>
                <table>
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>NAMA MATA PELAJARAN</th>
                            <th>NILAI</th>
                            <th>PREDIKAT</th>
                            <th>NILAI PRAKTEK</th>
                            <th>PREDIKAT</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        //menampilkan data plotting jadwal berdasarkan siswa kelas dan periode group by
                        $plotting = "SELECT * FROM plotting_jadwal WHERE id_siswa = " . $_GET['id_siswa'] . " AND id_kelas = " . $_GET['id_kelas'] . " AND id_periode = " . $_GET['id_periode'] . " GROUP BY id_mapel";
                        //menampilkan data plotting jadwal berdasarkan siswa kelas dan periode
                        $no = 0;
                        $jumlah_nilai = 0;
                        $jumlah_praktek = 0;
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
                                <td>
                                    <?php
                                    $data_nilai = [];
                                    $penilaian = QueryOnedata("SELECT * FROM penilaian WHERE id_plotting = " . $plot['id_plotting'] . "");
                                    if ($penilaian->num_rows > 0) {
                                        array_push($data_nilai, QueryOnedata("SELECT AVG(nilai) AS nilai, AVG(nilai_praktek) AS nilai_praktek  FROM penilaian WHERE id_plotting = " . $plot['id_plotting'] . "")->fetch_assoc());
                                    }
                                    ?>
                                    <?php
                                    if ($data_nilai != []) {
                                        echo  round($data_nilai[0]['nilai'], 2);
                                        $jumlah_nilai += round($data_nilai[0]['nilai'], 2);
                                    }
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    if ($data_nilai != []) {
                                        echo getPredikat(round($data_nilai[0]['nilai'], 2));
                                    }
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    if ($data_nilai != []) {
                                        echo (round($data_nilai[0]['nilai_praktek'], 2));
                                        $jumlah_praktek += round($data_nilai[0]['nilai_praktek'], 2);
                                    }
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    if ($data_nilai != []) {
                                        echo getPredikat(round($data_nilai[0]['nilai_praktek'], 2));
                                    }
                                    ?>
                            </tr>
                        <?php
                        }
                        ?>
                        <tr>
                            <td colspan="2">JUMLAH</td>
                            <td><?= $jumlah_nilai ?></td>
                            <td></td>
                            <td><?= $jumlah_praktek ?></td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>

                <div style="height: 20px;"></div>

                <div style="width: 50%;">
                    <table>
                        <tr>
                            <th rowspan="2">KKM</th>
                            <th colspan="4">Predikat</th>
                        </tr>
                        <tr>
                            <th>D</th>
                            <th>C</th>
                            <th>B</th>
                            <th>A</th>
                        </tr>
                        <tr>
                            <td>75</td>
                            <td>0 - 74</td>
                            <td>75 - 82</td>
                            <td>83 - 91</td>
                            <td>92 - 100</td>
                        </tr>
                    </table>
                </div>

                <div style="height: 30px;"></div>


                <hr>
                <table style="text-align: left; border:none;">
                    <tbody>
                        <tr>
                            <td style="text-align: left; border:none;">NAMA</td>
                            <td style="text-align: left; border:none;">: <?= $siswa['nm_siswa'] ?></td>
                            <td style="text-align: left; border:none;">Madrasah</td>
                            <td style="text-align: left; border:none;">: MIS ALHIDAYAH</td>
                        </tr>
                        <tr>
                            <td style="text-align: left; border:none;">NIS</td>
                            <td style="text-align: left; border:none;">: <?= $siswa['nis'] ?></td>
                            <td style="text-align: left; border:none;">Semester</td>
                            <td style="text-align: left; border:none;">: <?= $smt[1] ?></td>
                        </tr>
                        <tr>
                            <td style="text-align: left; border:none;">KELAS</td>
                            <td style="text-align: left; border:none;">: <?= $kelas['nm_kelas'] ?></td>
                            <td style="text-align: left; border:none;">Tahun Pelajaran</td>
                            <td style="text-align: left; border:none;">: <?= $smt[2] ?></td>
                        </tr>
                    </tbody>
                </table>
                <hr>
                <h4>DESKRIPSI PENGETAHUAN DAN KETRAMPILAN</h4>
                <table>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Mata Pelajaran</th>
                            <th>Pengetahuan</th>
                            <th>Ketrampilan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no_rapot = 1;
                        $rapot = "SELECT * FROM rapot WHERE id_periode = ".$_GET['id_periode']."  AND id_siswa = ".$_GET['id_siswa']." AND jenis = 'deskripsi pengetahun dan ketrampilan'";
                        foreach(QueryManyData($rapot) as $row){
                        ?>
                        <tr>
                            <td><?= $no_rapot++ ?></td>
                            <td>
                                <?php
                                $mapel = QueryOnedata("SELECT * FROM mapel WHERE id_mapel = ".$row['value']."")->fetch_assoc();
                                echo $mapel['nm_mapel'] ?>
                                </td>
                            <td><?=  $row['pengetahuan'] ?></td>
                            <td><?=  $row['ketrampilan'] ?></td>
                        </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>

                <h4>C .EKSTRA KULIKULER</h4>
                <table>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kegiatan Ekstrakulikuler</th>
                            <th>Nilai</th>
                            <th>Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>                       
                        <tr>                        
                        <?php
                        $check_ektrakulikuler = "SELECT * FROM rapot WHERE id_periode = " . $_GET['id_periode'] . " AND id_siswa = " . $_GET['id_siswa'] . " AND jenis = 'ektrakulikuler' ";
                        if (QueryOnedata($check_ektrakulikuler)->num_rows > 0) { // Jika ada maka update data
                        ?>
                            <td>1</td>
                            <td><?= QueryOnedata($check_ektrakulikuler)->fetch_assoc()['pengetahuan'] ?></td>
                            <td><?= QueryOnedata($check_ektrakulikuler)->fetch_assoc()['value'] ?></td>
                            <td><?= QueryOnedata($check_ektrakulikuler)->fetch_assoc()['deskripsi'] ?></td>

                            <?php
                        } else {
                        ?>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        <?php
                        }
                        ?> 
                        </tr>
                    </tbody>
                </table>
                <h4>D .PRESTASI</h4>
                <table>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Jenis Prestasi</th>
                            <th>Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>                       
                        <tr>
                        
                        <?php
                        $check_prestasi = "SELECT * FROM rapot WHERE id_periode = " . $_GET['id_periode'] . " AND id_siswa = " . $_GET['id_siswa'] . " AND jenis = 'prestasi' ";
                        if (QueryOnedata($check_prestasi)->num_rows > 0) { // Jika ada maka update data
                        ?>
                            <td>1</td>
                            <td><?= QueryOnedata($check_prestasi)->fetch_assoc()['value'] ?></td>
                            <td><?= QueryOnedata($check_prestasi)->fetch_assoc()['deskripsi'] ?></td>

                            <?php
                        } else {
                        ?>
                            <td></td>
                            <td></td>
                            <td></td>
                        <?php
                        }
                        ?> 
                        </tr>
                    </tbody>
                </table>

                <h4>E. Ketidakhadiran</h4>
                <table>
                    <tbody>
                        <tr>
                            <td>NO</td>
                            <td>Ketidakhadiran</td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <?php
                            $kehadiran_sakit_query = "SELECT COUNT(kehadiran_siswa.id_kehadiran) as sakit FROM  kehadiran_siswa 
                                    JOIN plotting_jadwal ON kehadiran_siswa.id_plotting = plotting_jadwal.id_plotting 
                                    WHERE plotting_jadwal.id_siswa = " . $_GET['id_siswa'] . " AND plotting_jadwal.id_kelas = " . $_GET['id_kelas'] . " AND plotting_jadwal.id_periode = " . $_GET['id_periode'] . " AND kehadiran_siswa.jenis_kehadiran = 'Sakit' ";
                            ?>
                            <td style="text-align: left;">&nbsp;1. Sakit : <?php if (QueryOnedata($kehadiran_sakit_query)->num_rows > 0) {
                                                                                echo QueryOnedata($kehadiran_sakit_query)->fetch_assoc()['sakit'];
                                                                            }  ?></td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <?php
                            $kehadiran_izin_query = "SELECT COUNT(kehadiran_siswa.id_kehadiran) as izin FROM  kehadiran_siswa 
                                    JOIN plotting_jadwal ON kehadiran_siswa.id_plotting = plotting_jadwal.id_plotting 
                                    WHERE plotting_jadwal.id_siswa = " . $_GET['id_siswa'] . " AND plotting_jadwal.id_kelas = " . $_GET['id_kelas'] . " AND plotting_jadwal.id_periode = " . $_GET['id_periode'] . " AND kehadiran_siswa.jenis_kehadiran = 'Izin' ";
                            ?>
                            <td style="text-align: left;">&nbsp;2. Izin : <?php if (QueryOnedata($kehadiran_izin_query)->num_rows > 0) {
                                                                                echo QueryOnedata($kehadiran_izin_query)->fetch_assoc()['izin'];
                                                                            }  ?></td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <?php
                            $kehadiran_alfa_query = "SELECT COUNT(kehadiran_siswa.id_kehadiran) as alfa FROM  kehadiran_siswa 
                                    JOIN plotting_jadwal ON kehadiran_siswa.id_plotting = plotting_jadwal.id_plotting 
                                    WHERE plotting_jadwal.id_siswa = " . $_GET['id_siswa'] . " AND plotting_jadwal.id_kelas = " . $_GET['id_kelas'] . " AND plotting_jadwal.id_periode = " . $_GET['id_periode'] . " AND kehadiran_siswa.jenis_kehadiran = 'Alfa' ";
                            ?>
                            <td style="text-align: left;">&nbsp;3. Tanpa Keterangan : <?php if (QueryOnedata($kehadiran_alfa_query)->num_rows > 0) {
                                                                                            echo QueryOnedata($kehadiran_alfa_query)->fetch_assoc()['alfa'];
                                                                                        }  ?></td>
                        </tr>
                    </tbody>
                </table>

                <div style="height: 30px;"></div>
                <h4>F. Catatan Wali Kelas</h4>

                <table>
                    <tr>
                        <?php
                        $check_catatan_wali_kelas = "SELECT * FROM rapot WHERE id_periode = " . $_GET['id_periode'] . " AND id_siswa = " . $_GET['id_siswa'] . " AND jenis = 'catatan wali kelas' ";
                        if (QueryOnedata($check_catatan_wali_kelas)->num_rows > 0) { // Jika ada maka update data
                        ?>
                            <td style="height: 60px; text-align:left;"><?= QueryOnedata($check_catatan_wali_kelas)->fetch_assoc()['deskripsi'] ?></td>
                            <?php
                        } else {
                        ?>
                            <td style="height: 60px;"></td>
                        <?php
                        }
                        ?>                        
                    </tr>
                </table>
                <div style="height: 30px;"></div>
                <h4>G. Tanggapan Orang Tua</h4>

                <table>
                    <tr>
                        <td style="height: 60px;"></td>
                    </tr>
                </table>
                <div style="height: 30px;"></div>
                <table>
                    <tr>
                        <td style="height: 30px; text-align:left;">Keterangan kelulusan : LULUS</td>
                    </tr>
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

                <table style="text-align: left; border:none;">
                    <tbody>
                        <tr>
                            <td style="text-align: center; border:none;">Mengetahui</td>
                        </tr>
                        <tr>
                            <td style="text-align: center; border:none;">Kepala Sekolah</td>
                        </tr>
                        <tr>
                            <td style="text-align: center; border:none;">
                                <p>&nbsp;</p>
                            </td>

                        </tr>
                        <tr>
                            <td style="text-align: center; border:none;">
                                <p>&nbsp;</p>
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align: center; border:none;">
                                <p>&nbsp;</p>
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align: center; border:none;">Vinka&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        </tr>
                        <tr>
                            <td style="text-align: center; border:none;">NIP : 1001154555</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
</div>
<?php include_once '../template/footer.php'; ?>