<?php include_once '../template/header.php'; ?>
<?php include_once '../template/navbar.php'; ?>
<?php include_once '../template/sidebar.php'; ?>
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
                        <h3 class='box-title'>Daftar Data Periode Raport</h3>
                    </div>
                    <div class='box-body'>
                        <table id='example1' class='table table-bordered table-striped'>
                            <thead>
                                <tr>
                                    <th>NAMA PERIODE</th>
                                    <th>STATUS PERIODE</th>
                                    <th>AKSI</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $periode = 'SELECT * FROM periode';
                                foreach (QueryManyData($periode) as $row) {
                                ?>
                                    <tr>
                                        <td><?= $row['nm_periode'] ?></td>
                                        <td><?= $row['status_periode'] ?></td>
                                        <td>
                                            <a href='<?= $url ?>/app/raport/kelas.php?id_periode=<?= $row['id_periode'] ?>' class='btn bg-info btn-flat btn-sm'><i class='fa fa-eye'></i> lihat</a>
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