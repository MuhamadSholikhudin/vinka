<?php include_once '../template/header.php'; ?>
<?php include_once '../template/navbar.php'; ?>
<?php include_once '../template/sidebar.php';
$periode = QueryOnedata('SELECT * FROM periode WHERE id_periode = ' . $_GET['id_periode'] . '')->fetch_assoc();
$kelas = QueryOnedata('SELECT * FROM kelas WHERE id_kelas = ' . $_GET['id_kelas'] . '')->fetch_assoc();
$guru = QueryOnedata('SELECT * FROM guru WHERE id_guru = ' . $kelas['id_guru'] . '')->fetch_assoc();
?>
<div class='content-wrapper'>
    <section class='content-header'>
        <h1>Siswa page
        </h1>
        <ol class='breadcrumb'>
            <li><a href='#'><i class='fa fa-dashboard'></i> Index</a></li>
            <li class='active'>Siswa page</li>
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
                <h3 class="box-title">PERIODE <?= $periode['nm_periode'] ?> KELAS <?= $kelas['nm_kelas'] ?> Wali Kelas <?= $guru['nm_guru'] ?> </h3> &nbsp; &nbsp; &nbsp;
                <a target="_blank" href='<?= $url ?>/app/siswa/cetak.php?id_periode=<?= $_GET['id_periode'] ?>&id_kelas=<?= $_GET['id_kelas'] ?>' class='btn btn-warning btn-sm '>
                    <i class='fa fa-print'></i> cetak
                </a><!-- /.box-body -->
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
                <table id="example1" class="table">
                    <thead>
                        <tr>
                            <th>NIS</th>
                            <th>ID USER</th>
                            <th>NM SISWA</th>
                            <th>JK SISWA</th>
                            <th>ALAMAT SISWA</th>
                            <th>NM ORANG TUA</th>
                            <th>FOTO SISWA</th>
                            <!-- <th>AKSI</th> -->
                        </tr>
                    </thead>
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
                                <td>
                                    <img src="<?= $url . '/foto/siswa/' . $row['foto_siswa']; ?>" alt="" srcset="" style="width: 50px; height:50px;">
                                </td>
                                <!-- <td>
                                    <a href='<?= $url ?>/app/siswa/edit.php?id_siswa=<?= $row['id_siswa'] ?>' class='btn bg-olive btn-flat btn-sm'><i class='fa fa-edit'></i> edit</a>
                                    <button onclick='ConfirmDelete(<?= $row['id_siswa'] ?>)' class='btn bg-maroon btn-flat btn-sm'>
                                        <i class='fas fa-trash'></i>
                                        hapus
                                    </button>
                                </td> -->
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
                <br>
                <a href='<?= $url ?>/app/siswa/periode.php?id_periode=<?= $_GET['id_periode'] ?>' class='btn btn-default btn-sm '>
                    <i class='fa fa-reply'></i> kembali
                </a><!-- /.box-body -->
            </div>
        </div>
    </section>
</div>
<?php include_once '../template/footer.php'; ?>