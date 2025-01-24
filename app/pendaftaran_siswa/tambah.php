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
                                            <option value='<?= $row['id_periode'] ?>'>[<?= $row['nm_periode'] ?> - <?= $row['status_periode'] ?>]</option>
                                        <?php
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
                            <hr>
                            <h4 class="text-center">Data Siswa</h4>

                            <div class='form-group'>
                                <label for='inputnm_siswa' class='col-sm-2 col-form-label'>Nama Siswa</label>
                                <div class='col-sm-10'>
                                    <input type='text' class='form-control' id='inputnm_siswa' name='nm_siswa' required>
                                </div>
                            </div>
                            <div class='form-group'>
                                <label for='inputtempat_lahir' class='col-sm-2 col-form-label'>Tempat Lahir</label>
                                <div class='col-sm-4'>
                                    <input type='text' class='form-control' id='inputtempat_lahir' name='tempat_lahir' required>
                                </div>
                                <label for='inputtanggal_lahir' class='col-sm-2 col-form-label'>Tempat Lahir</label>
                                <div class='col-sm-4'>
                                    <input type='date' class='form-control' id='inputtanggal_lahir' name='tanggal_lahir' required>
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
                                <label for='inputagama' class='col-sm-2 col-form-label'>Agama</label>
                                <div class='col-sm-10'>
                                    <input type='text' class='form-control' id='inputagama' name='agama' required>
                                </div>
                            </div>
                            <div class='form-group'>
                                <label for='inputalamat_siswa' class='col-sm-2 col-form-label'>Alamat Siswa</label>
                                <div class='col-sm-10'>
                                    <textarea class='form-control' id='inputalamat_siswa' name='alamat_siswa' required></textarea>
                                </div>
                            </div>
                            <div class='form-group'>
                                <label for='inputfoto_siswa' class='col-sm-2 col-form-label'>Foto Siswa</label>
                                <div class='col-sm-10'>
                                    <input type='file' class='form-control' id='inputfoto_siswa' name='foto_siswa' required>
                                </div>
                            </div>
                            <div class='form-group'>
                                <label for='inputasal_sekolah' class='col-sm-2 col-form-label'>Asal Sekolah</label>
                                <div class='col-sm-10'>
                                    <input type='text' class='form-control' id='inputasal_sekolah' name='asal_sekolah' placeholder="Contoh : TK Kemala Siwi" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputtinggal_bersama" class="col-sm-2 col-form-label">Tinggal Bersama</label>
                                <div class="col-sm-4">
                                    <select class="form-control" name="tinggal_bersama" id="inputtinggal_bersama">
                                        <?php
                                        $tinggal_bersama = ['wali murid','orang tua','ayah','ibu'];
                                        foreach ($tinggal_bersama as $val) { ?>
                                                <option value="<?= $val ?>"><?= $val ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>

                            <hr>
                            <h4 class="text-center">Data Wali Murid</h4>
                            <div class='form-group'>
                                <label for='inputnm_wali_murid' class='col-sm-2 col-form-label'>Nama Wali Murid</label>
                                <div class='col-sm-10'>
                                    <input type='text' class='form-control' id='inputnm_wali_murid' name='nm_wali_murid' value='<?php if ($_SESSION['level'] == 'Orang Tua') {
                                                                                                                                    echo $_SESSION['username'];
                                                                                                                                } ?>' required>
                                </div>
                            </div>
                            <div class='form-group'>
                                <label for='inputtempat_lahir_wali' class='col-sm-2 col-form-label'>Tempat Lahir</label>
                                <div class='col-sm-4'>
                                    <input type='text' class='form-control' id='inputtempat_lahir_wali' name='tempat_lahir_wali_murid'>
                                </div>
                                <label for='inputtanggal_lahir_wali' class='col-sm-2 col-form-label'>Tempat Lahir</label>
                                <div class='col-sm-4'>
                                    <input type='date' class='form-control' id='inputtanggal_lahir_wali' name='tanggal_lahir_wali_murid'>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputpendidikan_wali_murid" class="col-sm-2 col-form-label">Pendidikan Wali Murid</label>
                                <div class="col-sm-4">
                                    <select class="form-control" name="pendidikan_wali_murid" id="inputpendidikan_wali_murid">
                                        <?php
                                        $pendidikan_wali_murid = ['SD', 'SMP', 'SMA', 'S1', 'S2', 'S3'];
                                        foreach ($pendidikan_wali_murid    as $val) { ?>
                                            <option value="<?= $val ?>"><?= $val ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <label for='inputpekerjaan_wali_murid' class='col-sm-2 col-form-label'>Pekerjaan Wali Murid</label>
                                <div class='col-sm-4'>
                                    <input type='text' class='form-control' id='inputpekerjaan_wali_murid' name='pekerjaan_wali_murid'>
                                </div>
                            </div>

                            <div class='form-group'>
                                <label for='inputalamat_wali_murid' class='col-sm-2 col-form-label'>Alamat Wali Murid</label>
                                <div class='col-sm-10'>
                                    <textarea class='form-control' id='inputalamat_wali_murid' name='alamat_wali_murid' required></textarea>
                                </div>
                            </div>
                            <div class='form-group'>
                                <label for='inputno_dapat_dihubungi' class='col-sm-2 col-form-label'>No Yang Dapat di Hubungi</label>
                                <div class='col-sm-10'>
                                    <div class="input-group">
                                        <span class="input-group-addon">+62</span>
                                        <input type="text" class='form-control' id='inputno_dapat_dihubungi' name='no_dapat_dihubungi' placeholder="897558xxxx" required>
                                    </div>
                                </div>
                            </div>


                            <hr>
                            <h4 class="text-center">Data Orang Tua</h4>

                            <div class='form-group'>
                                <label for='inputnm_ayah' class='col-sm-2 col-form-label'>Nama Ayah</label>
                                <div class='col-sm-10'>
                                    <input type='text' class='form-control' id='inputnm_ayah' name='nm_ayah'  required>
                                </div>
                            </div>

                            <div class='form-group'>
                                <label for='inputtempat_lahir_ayah' class='col-sm-2 col-form-label'>Tempat Lahir</label>
                                <div class='col-sm-4'>
                                    <input type='text' class='form-control' id='inputtempat_lahir_ayah' name='tempat_lahir_ayah'  required>
                                </div>
                                <label for='inputtanggal_lahir_ayah' class='col-sm-2 col-form-label'>Tempat Lahir</label>
                                <div class='col-sm-4'>
                                    <input type='date' class='form-control' id='inputtanggal_lahir_ayah' name='tanggal_lahir_ayah'  required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputpendidikan_ayah" class="col-sm-2 col-form-label">Pendidikan Ayah</label>
                                <div class="col-sm-4">
                                    <select class="form-control" name="pendidikan_ayah" id="inputpendidikan_ayah">
                                        <?php
                                        $pendidikan_ayah = ['SD', 'SMP', 'SMA', 'S1', 'S2', 'S3'];
                                        foreach ($pendidikan_ayah    as $val) {?>
                                                <option value="<?= $val ?>"><?= $val ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class='form-group'>
                                <label for='inputalamat_ayah' class='col-sm-2 col-form-label'>Alamat Ayah</label>
                                <div class='col-sm-10'>
                                    <textarea class='form-control' id='inputalamat_ayah' name='alamat_ayah' required></textarea>
                                </div>
                            </div>


                            <div class='form-group'>
                                <label for='inputnm_ibu' class='col-sm-2 col-form-label'>Nama Ibu</label>
                                <div class='col-sm-10'>
                                    <input type='text' class='form-control' id='inputnm_ibu' name='nm_ibu' >
                                </div>
                            </div>

                            <div class='form-group'>
                                <label for='inputtempat_lahir_ibu' class='col-sm-2 col-form-label'>Tempat Lahir</label>
                                <div class='col-sm-4'>
                                    <input type='text' class='form-control' id='inputtempat_lahir_ibu' name='tempat_lahir_ibu' >
                                </div>
                                <label for='inputtanggal_lahir_ibu' class='col-sm-2 col-form-label'>Tempat Lahir</label>
                                <div class='col-sm-4'>
                                    <input type='date' class='form-control' id='inputtanggal_lahir_ibu' name='tanggal_lahir_ibu' >
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputpendidikan_ibu" class="col-sm-2 col-form-label">Pendidikan Ibu</label>
                                <div class="col-sm-4">
                                    <select class="form-control" name="pendidikan_ibu" id="inputpendidikan_ibu">
                                        <?php
                                        $pendidikan_ibu = ['SD', 'SMP', 'SMA', 'S1', 'S2', 'S3'];
                                        foreach ($pendidikan_ibu as $val) { ?>
                                                <option value="<?= $val ?>"><?= $val ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class='form-group'>
                                <label for='inputalamat_ibu' class='col-sm-2 col-form-label'>Alamat Ibu</label>
                                <div class='col-sm-10'>
                                    <textarea class='form-control' id='inputalamat_ibu' name='alamat_ibu' required></textarea>
                                </div>
                            </div>
                            <div class='form-group' style="display: none;">
                                <label for='inputid_user' class='col-sm-2 col-form-label'>User Wali</label>
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
                                            <option value='<?= $row['id_user'] ?>'> [<?= $row['nm_pengguna'] ?> - <?= $row['level'] ?>]</option>
                                        <?php
                                        }
                                        ?>
                                    </select>
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