<?php include_once '../template/header.php'; ?>
<?php include_once '../template/navbar.php'; ?>
<?php include_once '../template/sidebar.php';
$periode = QueryOnedata('SELECT * FROM periode WHERE id_periode = ' . $_GET['id_periode'] . '')->fetch_assoc();
?>
<div class='content-wrapper'>
    <section class='content-header'>
        <h1>kelulusan page
        </h1>
        <ol class='breadcrumb'>
            <li><a href='#'><i class='fa fa-dashboard'></i> Index</a></li>
            <li class='active'>kelulusan page</li>
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
        <a class='btn btn-social-icon btn-info btn-sm' data-toggle='tooltip' data-placement='top' title='Tambah data kelulusan' href='<?= $url ?>/app/kelulusan/tambah.php?id_periode=<?= $_GET['id_periode'] ?>'><i class='fa fa-plus'></i></a>
        <div class='row'>
            <div class='col-xs-12'>
                <div class='box'>
                    <div class='box-header'>
                        <h3 class='box-title'>Data Siswa</h3>
                    </div>
                    <div class='box-body'>
                        <table id='example1' class='table table-bordered table-striped'>
                            <thead>
                                <tr>
                                    <th>NIS</th>
                                    <th>ID USER</th>
                                    <th>NM SISWA</th>
                                    <th>JK SISWA</th>
                                    <th>ALAMAT SISWA</th>
                                    <th>NM ORANG TUA</th>
                                    <th>FOTO SISWA</th>
                                    <th>AKSI</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $kelulusan = 'SELECT siswa.* FROM siswa LEFT JOIN kelulusan ON siswa.id_siswa = kelulusan.id_siswa WHERE kelulusan.id_periode = '.$_GET['id_periode'].'';
                                foreach (QueryManyData($kelulusan) as $row) {
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
                                        <td>
                                            <button onclick='ConfirmDelete(<?= $row['id_siswa'] ?>)' class='btn bg-maroon btn-flat btn-sm'>
                                                <i class='fas fa-trash'></i>
                                                hapus
                                            </button>
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
                            window.location.href = '<?= $url ?>/aksi/kelulusan.php?id_siswa=' + id + '&action=delete'
                        }
                    }
                </script>
            </div>
        </div>


</div>
<?php include_once '../template/footer.php'; ?>