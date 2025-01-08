<?php include_once '../template/header.php'; ?>
<?php include_once '../template/navbar.php'; ?>
<?php include_once '../template/sidebar.php';
$periode = QueryOnedata('SELECT * FROM periode WHERE id_periode = ' . $_GET['id_periode'] . '')->fetch_assoc();
$kelas = QueryOnedata('SELECT * FROM kelas WHERE id_kelas = ' . $_GET['id_kelas'] . '')->fetch_assoc();
$guru = QueryOnedata('SELECT * FROM guru WHERE id_guru = ' . $kelas['id_guru'] . '')->fetch_assoc();
?>
<div class='content-wrapper'>
    <section class='content-header'>
        <h1>Kehadiran page
        </h1>
        <ol class='breadcrumb'>
            <li><a href='#'><i class='fa fa-dashboard'></i> Index</a></li>
            <li class='active'>Kehadiran page</li>
        </ol>
    </section>
    <section class='content'>
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

        <div class="box box-danger">
            <div class="box-header with-border">
                <h3 class="box-title">Periode <?= $periode['nm_periode'] ?> Kelas <?= $kelas['nm_kelas'] ?> Wali Kelas <?= $guru['nm_guru'] ?> </h3>
            </div>
            <div class="box-body">
                <style>
                    table,
                    thead,
                    body,
                    tr,
                    th,
                    td {
                        border: 1px solid black;
                    }
                </style>
                <table class="table">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>MAPEL</th>
                            <th>JUMLAH SISWA</th>
                            <th>ACTION</th>
                        </tr>
                    </thead>
                    <body>
                        <?php 
                        $query_mapel = "SELECT * FROM mapel";
                        if($_SESSION['level'] == 'Guru'){
                            $guru = QueryOnedata("SELECT * FROM guru WHERE id_user = ".$_SESSION['id_user']." ")->fetch_assoc();
                            $query_mapel = "SELECT mapel.id_mapel, mapel.nm_mapel FROM plotting_jadwal
                            JOIN mapel ON plotting_jadwal.id_mapel = mapel.id_mapel 
                            WHERE plotting_jadwal.id_periode = ".$_GET['id_periode']." 
                            AND plotting_jadwal.id_kelas = ".$kelas['id_kelas']." 
                            AND mapel.id_guru = ".$guru['id_guru']."  GROUP BY mapel.id_mapel";                        
                        }else  if($_SESSION['level'] == 'Orang Tua'){
                            $siswa = QueryOnedata("SELECT * FROM siswa WHERE id_user = ".$_SESSION['id_user']." ")->fetch_assoc();
                            $query_mapel = "SELECT mapel.id_mapel, mapel.nm_mapel FROM plotting_jadwal
                            JOIN mapel ON plotting_jadwal.id_mapel = mapel.id_mapel 
                            WHERE plotting_jadwal.id_periode = ".$_GET['id_periode']." 
                            AND plotting_jadwal.id_kelas = ".$kelas['id_kelas']." 
                            AND plotting_jadwal.id_siswa = ".$siswa['id_siswa']."  GROUP BY mapel.id_mapel";
                        }
                        $no = 1;
                        foreach(QueryManyData($query_mapel) as $row){
                            if ($_SESSION['level'] == 'Guru') {
                                $gurux = QueryOnedata("SELECT * FROM guru WHERE id_user = " . $_SESSION['id_user'] . " ")->fetch_assoc();
                                $query_mapel = "SELECT plotting_jadwal.id_plotting, plotting_jadwal.id_siswa, mapel.nm_mapel, mapel.id_mapel FROM plotting_jadwal
                                JOIN mapel ON plotting_jadwal.id_mapel = mapel.id_mapel 
                                WHERE plotting_jadwal.id_periode = " . $_GET['id_periode'] . " 
                                AND plotting_jadwal.id_kelas = " . $kelas['id_kelas'] . " 
                                AND mapel.id_guru = " . $gurux['id_guru'] . "  
                                GROUP BY plotting_jadwal.id_siswa 
                                ";
                            }
                        ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $row['nm_mapel'] ?></td>
                            <td><?= QueryOnedata($query_mapel)->num_rows ?></td>
                            <td>
                                <?php if($_SESSION['level'] == 'Guru'){ ?>
                                <a href='<?= $url ?>/app/kehadiran_siswa/tambah_kehadiran.php?id_periode=<?= $_GET['id_periode'] ?>&id_kelas=<?= $_GET['id_kelas'] ?>&id_mapel=<?=  $row['id_mapel'] ?>' class='btn btn-primary btn-sm '>
                                    <i class='fa fa-plus'></i> Tambah
                                </a>
                                <?php } ?>
                                &nbsp;
                                <a href='<?= $url ?>/app/kehadiran_siswa/tampil_kehadiran.php?id_periode=<?= $_GET['id_periode'] ?>&id_kelas=<?= $_GET['id_kelas'] ?>&id_mapel=<?=  $row['id_mapel'] ?>' class='btn btn-info btn-sm '>
                                    <i class='fa fa-eye'></i> Tampil
                                </a>
                            </td>
                        </tr>
                        <?php 
                        }
                        ?>
                    </body>
                </table>
                <br>
                <a href='<?= $url ?>/app/kehadiran_siswa/periode.php?id_periode=<?= $_GET['id_periode'] ?>&id_kelas=<?= $_GET['id_kelas'] ?>' class='btn btn-default btn-sm '>
                    <i class='fa fa-reply'></i> kembali
                </a><!-- /.box-body -->
            </div>
        </div>
    </section>
</div>
<?php include_once '../template/footer.php'; ?>