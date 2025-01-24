<?php include_once '../template/header.php'; ?>
<?php include_once '../template/navbar.php'; ?>
<?php include_once '../template/sidebar.php'; ?>
<?php 
    $periode = QueryOnedata("SELECT * FROM periode WHERE id_periode = ".$_GET['id_periode']."")->fetch_assoc();
?>

<div class='content-wrapper'>
    <section class='content-header'>
        <h1>Raport page
        </h1>
        <ol class='breadcrumb'>
            <li><a href='#'><i class='fa fa-dashboard'></i> Index</a></li>
            <li class='active'>Raport page</li>
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
        <div class='row'>
            <div class='col-xs-12'>
                <div class='box'>
                    <div class='box-header'>
                        <h3 class='box-title'>Daftar Data Raport <?= $periode['nm_periode'] ?></h3>
                    </div>
                    <div class='box-body'>
                        <table id='example1' class='table table-bordered table-striped'>
                            <thead>
                                <tr>
                                    <th>NO</th>
                                    <th>KELAS</th>
                                    <th>TINGKATAN</th>
                                    <th>WALI KELAS</th>
                                    <th>AKSI</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $kelas = "SELECT * FROM  kelas ORDER BY id_kelas ASC";
                                if($_SESSION['level'] == 'Orang Tua'){
                                    $siswa = QueryOnedata("SELECT * FROM siswa WHERE id_user = ".$_SESSION['id_user']."")->fetch_assoc();
                                    $plot = QueryOnedata("SELECT * FROM plotting_jadwal WHERE id_periode = ".$_GET['id_periode']." AND id_siswa = ".$siswa['id_siswa']." GROUP BY id_kelas")->fetch_assoc();
                                    $kelas = "SELECT * FROM  kelas WHERE id_kelas = ".$plot['id_kelas']." ORDER BY id_kelas ASC";                        
                                }
                                $no = 1;
                                foreach (QueryManyData($kelas) as $row) {
                                    $guru = QueryOnedata("SELECT * FROM guru WHERE id_guru = ".$row['id_guru']."")->fetch_assoc();
                                ?>
                                    <tr>
                                        <td><?=  $no++ ?></td>
                                        <td><?= $row['nm_kelas'] ?></td>
                                        <td><?= $row['tingkatan'] ?></td>
                                        <td>
                                            <?= $guru['nm_guru'] ?>
                                        </td>
                                        <td>
                                            <a href='<?= $url ?>/app/raport/siswa.php?&id_kelas=<?= $row['id_kelas'] ?>&id_periode=<?= $_GET['id_periode'] ?>' class='btn bg-info btn-flat btn-sm'><i class='fa fa-eye'></i> lihat</a>
                                        </td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <script>
                    function ConfirmDelete(id) {
                        let text = 'Apakah Anda Yakin Ingin Menghapus data!\n OK or Cancel.';
                        if (confirm(text) == true) {
                            text = 'You pressed OK!';
                            window.location.href = '<?= $url ?>/aksi/periode.php?id_periode=' + id + '&action=delete'
                        }
                    }
                </script>
            </div>
        </div>
</div>
<?php include_once '../template/footer.php'; ?>