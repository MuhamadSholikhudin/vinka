<?php include_once '../template/header.php'; ?>
<?php include_once '../template/navbar.php'; ?>
<?php include_once '../template/sidebar.php';
$periode = QueryOnedata('SELECT * FROM periode WHERE id_periode = ' . $_GET['id_periode'] . '')->fetch_assoc();
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
                <h3 class="box-title">Periode <?= $periode['nm_periode'] ?> </h3>
            </div>
            <div class="box-body">
                <?php 
                $kelas = "SELECT * FROM  kelas ORDER BY id_kelas ASC";
                if($_SESSION['level'] == 'Orang Tua'){
                    $siswa = QueryOnedata("SELECT * FROM siswa WHERE id_user = ".$_SESSION['id_user']."")->fetch_assoc();
                    $plot = QueryOnedata("SELECT * FROM plotting_jadwal WHERE id_periode = ".$_GET['id_periode']." AND id_siswa = ".$siswa['id_siswa']." GROUP BY id_kelas")->fetch_assoc();
                    $kelas = "SELECT * FROM  kelas WHERE id_kelas = ".$plot['id_kelas']." ORDER BY id_kelas ASC";                        
                }
                foreach (QueryManyData($kelas) as $row) {
                    $guru = QueryOnedata('SELECT * FROM guru WHERE id_guru = ' . $row['id_guru'] . '')->fetch_assoc();
                ?>
                    <div class="row">
                        <div class="col-xs-6">
                            <a href="<?= $url ?>/app/kehadiran_siswa/kelas.php?id_periode=<?= $_GET['id_periode'] ?>&id_kelas=<?= $row['id_kelas'] ?>" class="btn btn-block btn-social btn-bitbucket">
                                <i class="fa fa-flickr"></i> Kelas <?= $row['nm_kelas'] ?>, Wali kelas <?= $guru['nm_guru'] ?>
                            </a>
                        </div>
                    </div>
                    <br>
                <?php } ?>
                <a href='<?= $url ?>/app/kehadiran_siswa/index.php' class='btn btn-default btn-sm '>
                    <i class='fa fa-reply'></i> kembali
                </a><!-- /.box-body -->
            </div>
        </div>
</div>
<?php include_once '../template/footer.php'; ?>