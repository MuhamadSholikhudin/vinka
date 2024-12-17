<?php include_once '../template/header.php'; ?>
<?php include_once '../template/navbar.php'; ?>
<?php include_once '../template/sidebar.php'; ?>
<div class='content-wrapper'>
    <section class='content-header'>
        <h1>Pendaftaran Siswa page</h1>
        <ol class='breadcrumb'>
            <li><a href='#'><i class='fa fa-dashboard'></i> Edit</a></li>
            <li class='active'>Pendaftaran Siswa page</li>
        </ol>
    </section>
    <section class='content'>
        <div class='row'>
            <div class='col-xs-12'>
                <div class='box box-info'>
                    <div class='box-header with-border text-center'>
                        <h3 class='box-title'>Form Pendaftaran Siswa Baru </br> Tahun Pelajaran <?= date('Y') ?> / <?= (date('Y') + 1) ?></h3>
                    </div>
                    <form action='<?= $url ?>/aksi/pendaftaran_siswa.php' method='post' enctype='multipart/form-data' class='form-horizontal'>
                        <div class='box-body'>
                            <div class='form-group'>
                                <label for='inputid_periode' class='col-sm-2 col-form-label'>Periode</label>
                                <div class='col-sm-10'>
                                    <?php ?>
                                    <select class='form-control' name='id_periode' id='inputid_periode'>
                                        <?php
                                        $periode = QueryManyData('SELECT * FROM periode');
                                        foreach ($periode as  $row) {
                                        ?>
                                            <option value='<?= $row['id_periode'] ?>'>[<?= $row['nm_periode'] ?> - <?= $row['status_periode'] ?>]</option><?php
                                                                                                                                                        }
                                                                                                                                                            ?>
                                    </select>
                                </div>
                            </div>
                            <div class='form-group'>
                                <label for='inputid_user' class='col-sm-2 col-form-label'>ID user / Orang Tua / Wali Murid</label>
                                <div class='col-sm-10'>
                                    <?php ?>
                                    <select class='form-control' name='id_user' id='inputid_user'>
                                        <?php
                                        $user_query = 'SELECT * FROM user';
                                        if ($_SESSION['level'] == 'Orang Tua') {
                                            $user_query = 'SELECT * FROM user WHERE id_user = ' . $_SESSION['id_user'] . '';
                                        }
                                        $user = QueryManyData($user_query);
                                        foreach ($user as  $row) {
                                        ?>
                                            <option value='<?= $row['id_user'] ?>'> [<?= $row['nm_pengguna'] ?> - <?= $row['level'] ?>]</option><?php
                                                                                                                                            }
                                                                                                                                                ?>
                                    </select>
                                </div>
                            </div>
                            <div class='form-group'>
                                <label for='inputtgl_daftar' class='col-sm-2 col-form-label'>Tanggal Daftar</label>
                                <div class='col-sm-10'>
                                    <input type='date' class='form-control' id='inputtgl_daftar' name='tgl_daftar' value="<?= date('Y-m-d') ?>" required>
                                </div>
                            </div>
                            <div class='form-group'>
                                <label for='inputnm_siswa' class='col-sm-2 col-form-label'>Nama Siswa</label>
                                <div class='col-sm-10'>
                                    <input type='text' class='form-control' id='inputnm_siswa' name='nm_siswa' required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputjk_siswa" class="col-sm-2 col-form-label">Jenis Kelamin Siswa</label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="jk_siswa" id="inputjk_siswa">
                                        <?php
                                        $jk_siswa = ['Laki-Laki', 'Perempuan'];
                                        foreach ($jk_siswa    as $val) { ?>
                                            <option value="<?= $val ?>"><?= $val ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class='form-group'>
                                <label for='inputalamat_siswa' class='col-sm-2 col-form-label'>Alamat Siswa</label>
                                <div class='col-sm-10'>
                                    <textarea class='form-control' id='inputalamat_siswa' name='alamat_siswa' required></textarea>
                                </div>
                            </div>
                            <div class='form-group'>
                                <label for='inputnm_orang_tua' class='col-sm-2 col-form-label'>Nama Orang Tua</label>
                                <div class='col-sm-10'>
                                    <input type='text' class='form-control' id='inputnm_orang_tua' name='nm_orang_tua' value='<?php if ($_SESSION['level'] == 'Orang Tua') {
                                                                                                                                    echo $_SESSION['username'];
                                                                                                                                } ?>' required>
                                </div>
                            </div>
                            <div class='form-group'>
                                <label for='inputno_hp_orang_tua' class='col-sm-2 col-form-label'>No HP Orang Tua</label>
                                <div class='col-sm-10'>
                                    <div class="input-group">
                                        <span class="input-group-addon">+62</span>
                                        <input type="text" class='form-control' id='inputno_hp_orang_tua' name='no_hp_orang_tua' placeholder="897558xxxx" required>
                                    </div>
                                </div>
                            </div>
                            <div class='form-group'>
                                <label for='inputfoto_siswa' class='col-sm-2 col-form-label'>Foto Siswa</label>
                                <div class='col-sm-10'>
                                    <input type='file' class='form-control' id='inputfoto_siswa' name='foto_siswa' required>
                                </div>
                            </div>
                        </div>
                        <div class='box-footer'>
                            <a href='<?= $url ?>/app/pendaftaran_siswa/index.php' class='btn btn-default btn-sm '>
                                <i class='fa fa-reply'></i> kembali
                            </a>
                            <button type='submit' name='simpanpendaftaran_siswa' value='simpanpendaftaran_siswa' class='btn btn-info pull-right'>
                                <i class='fa fa-save'></i> SIMPAN
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
</div>
<?php include_once '../template/footer.php'; ?>