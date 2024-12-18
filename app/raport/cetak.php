<?php include_once '../template/header.php'; ?>
<?php include_once '../template/navbar.php'; ?>
<?php include_once '../template/sidebar.php'; ?>
<?php
$periode = QueryOnedata("SELECT * FROM periode WHERE id_periode = " . $_GET['id_periode'] . "")->fetch_assoc();
$kelas = QueryOnedata("SELECT * FROM kelas WHERE id_kelas = " . $_GET['id_kelas'] . "")->fetch_assoc();
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
            <div class='col-xs-12' >
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
            </div>
        </div>
</div>
<?php include_once '../template/footer.php'; ?>