<?php
include_once '../template/header.php';
include_once '../template/navbar.php';
include_once '../template/sidebar.php';
$pendaftaran_siswa = QueryOnedata('SELECT * FROM pendaftaran_siswa WHERE id_pendaftaran = ' . $_GET['id_pendaftaran'] . '')->fetch_assoc();
?>
<div class='content-wrapper'>
  <section class='content-header'>
    <h1>Pendaftaran Siswa page</h1>
    <ol class='breadcrumb'>
      <li><a href='#'><i class='fa fa-dashboard'></i> Detail</a></li>
      <li class='active'>Pendaftaran Siswa page</li>
    </ol>
  </section>
  <section class='content'>
    <div class='row'>
      <div class='col-xs-12'>
        <div class='box box-info'>
          <div class='box-header with-border text-center'>
            <h3 class='box-title'>Detail Pendaftaran Siswa</h3>
          </div>
          <form action='<?= $url ?>/aksi/pendaftaran_siswa.php' method='post' enctype='multipart/form-data' class='form-horizontal'>
            <div class='box-body'>
              <div class='form-group' style='display:none;'>
                <label for='inputid_pendaftaran' class='col-sm-2 col-form-label'>Id_Pendaftaran</label>
                <div class='col-sm-10'>
                  <input type='number' class='form-control' id='inputid_pendaftaran' name='id_pendaftaran' value='<?= $pendaftaran_siswa['id_pendaftaran']; ?>' required>
                </div>
              </div>
              <div class='form-group'>
                <label for='inputid_periode' class='col-sm-2 col-form-label'>Periode</label>
                <div class='col-sm-10'>
                  <select class='form-control' name='id_periode' id='inputid_periode'>
                    <?php
                    $periodes = QueryManyData('SELECT * FROM periode');
                    foreach ($periodes  as  $row) {
                      if ($pendaftaran_siswa['id_periode'] ==  $row['id_periode']) { ?>
                        <option value='<?= $row['id_periode'] ?>' selected>[<?= $row['nm_periode'] ?> - <?= $row['status_periode'] ?>]</option>
                      <?php } else { ?>
                        <option value='<?= $row['id_periode'] ?>'>[<?= $row['nm_periode'] ?> - <?= $row['status_periode'] ?>]</option>
                    <?php
                      }
                    }
                    ?>
                  </select>
                </div>
              </div>
              <div class='form-group'>
                <label for='inputid_user' class='col-sm-2 col-form-label'>User / Orang Tua / Wali Murid</label>
                <div class='col-sm-10'>
                  <select class='form-control' name='id_user' id='inputid_user'>
                    <?php
                    $users_query = 'SELECT * FROM user';
                    if ($_SESSION['level'] == 'Orang Tua') {
                      $users_query = 'SELECT * FROM user WHERE id_user = ' . $_SESSION['id_user'] . ' ';
                    }
                    $users = QueryManyData($users_query);
                    foreach ($users  as  $row) {
                      if ($pendaftaran_siswa['id_user'] ==  $row['id_user']) { ?>
                        <option value='<?= $row['id_user'] ?>' selected>[<?= $row['nm_pengguna'] ?> - <?= $row['level'] ?>]</option>
                      <?php } else { ?>
                        <option value='<?= $row['id_user'] ?>'>[<?= $row['nm_pengguna'] ?> - <?= $row['level'] ?>]</option>
                    <?php
                      }
                    }
                    ?>
                  </select>
                </div>
              </div>
              <div class='form-group'>
                <label for='inputtgl_daftar' class='col-sm-2 col-form-label'>Tanggal Daftar</label>
                <div class='col-sm-10'>
                  <input type='date' class='form-control' id='inputtgl_daftar' name='tgl_daftar' value='<?= $pendaftaran_siswa['tgl_daftar']; ?>' required>
                </div>
              </div>
              <hr>
              <h4 class="text-center">Data Siswa</h4>
              <div class='form-group'>
                <label for='inputnm_siswa' class='col-sm-2 col-form-label'>Nama Siswa</label>
                <div class='col-sm-10'>
                  <input type='text' class='form-control' id='inputnm_siswa' name='nm_siswa' value='<?= $pendaftaran_siswa['nm_siswa']; ?>' required>
                </div>
              </div>
              <div class='form-group'>
                <label for='inputtempat_lahir' class='col-sm-2 col-form-label'>Tempat Lahir</label>
                <div class='col-sm-4'>
                  <input type='text' class='form-control' id='inputtempat_lahir' name='tempat_lahir' value='<?= $pendaftaran_siswa['tempat_lahir']; ?>' required>
                </div>
                <label for='inputtanggal_lahir' class='col-sm-2 col-form-label'>Tempat Lahir</label>
                <div class='col-sm-4'>
                  <input type='date' class='form-control' id='inputtanggal_lahir' name='tanggal_lahir' value='<?= $pendaftaran_siswa['tanggal_lahir']; ?>' required>
                </div>
              </div>
              <div class="form-group">
                <label for="inputjk_siswa" class="col-sm-2 col-form-label">Jenis Kelamin Siswa</label>
                <div class="col-sm-10">
                  <select class="form-control" name="jk_siswa" id="inputjk_siswa">
                    <?php
                    $jk_siswa = ['Laki-Laki', 'Perempuan'];
                    foreach ($jk_siswa    as $val) {
                      if ($val == $pendaftaran_siswa['jk_siswa']) { ?>
                        <option value='<?= $val ?>' selected><?= $val ?></option>
                      <?php } else { ?>
                        <option value="<?= $val ?>"><?= $val ?></option>
                    <?php
                      }
                    }
                    ?>
                  </select>
                </div>
              </div>
              <div class='form-group'>
                <label for='inputagama' class='col-sm-2 col-form-label'>Agama</label>
                <div class='col-sm-10'>
                  <input type='text' class='form-control' id='inputagama' name='agama' value='<?= $pendaftaran_siswa['agama']; ?>' required>
                </div>
              </div>
              <div class='form-group'>
                <label for='inputalamat_siswa' class='col-sm-2 col-form-label'>Alamat Siswa</label>
                <div class='col-sm-10'>
                  <textarea class='form-control' id='inputalamat_siswa' name='alamat_siswa' required><?= $pendaftaran_siswa['alamat_siswa'] ?></textarea>
                </div>
              </div>
              <div class='form-group'>
                <label for='inputfoto_siswa' class='col-sm-2 col-form-label'>Foto Siswa</label>
                <div class='col-sm-10'>
                  <input type='file' class='form-control' id='inputfoto_siswa' name='foto_siswa'>
                  <input type='text' class='form-control' style="display: none;" id='inputfoto_siswa_old' name='foto_siswa_old' value='<?= $pendaftaran_siswa['foto_siswa']; ?>'>
                </div>
              </div>
              <div class='form-group'>
                <label for='inputasal_sekolah' class='col-sm-2 col-form-label'>Asal Sekolah</label>
                <div class='col-sm-10'>
                  <input type='text' class='form-control' id='inputasal_sekolah' name='asal_sekolah' placeholder="Contoh : TK Kemala Siwi" value='<?= $pendaftaran_siswa['asal_sekolah']; ?>' required>
                </div>
              </div>

              <div class="form-group">
                <label for="inputtinggal_bersama" class="col-sm-2 col-form-label">Tinggal Bersama</label>
                <div class="col-sm-4">
                  <select class="form-control" name="tinggal_bersama" id="inputtinggal_bersama">
                    <?php
                    $tinggal_bersama = ['wali murid', 'orang tua', 'ayah', 'ibu'];
                    foreach ($tinggal_bersama as $val) { 
                      if ($val == $pendaftaran_siswa['tinggal_bersama']) { ?>
                        <option value='<?= $val ?>' selected><?= $val ?></option>
                      <?php } else { ?>
                        <option value="<?= $val ?>"><?= $val ?></option>
                    <?php
                      }
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
                  <input type='text' class='form-control' id='inputnm_wali_murid' name='nm_wali_murid' value='<?= $pendaftaran_siswa['nm_wali_murid']; ?>' >
                </div>
              </div>
              <div class='form-group'>
                <label for='inputtempat_lahir_wali' class='col-sm-2 col-form-label'>Tempat Lahir</label>
                <div class='col-sm-4'>
                  <input type='text' class='form-control' id='inputtempat_lahir_wali' name='tempat_lahir_wali_murid' value='<?= $pendaftaran_siswa['tempat_lahir_wali_murid']; ?>' >
                </div>
                <label for='inputtanggal_lahir_wali' class='col-sm-2 col-form-label'>Tempat Lahir</label>
                <div class='col-sm-4'>
                  <input type='date' class='form-control' id='inputtanggal_lahir_wali' name='tanggal_lahir_wali_murid' value='<?= $pendaftaran_siswa['tanggal_lahir_wali_murid']; ?>' >
                </div>
              </div>

              <div class="form-group">
                <label for="inputpendidikan_wali_murid" class="col-sm-2 col-form-label">Pendidikan Wali Murid</label>
                <div class="col-sm-4">
                  <select class="form-control" name="pendidikan_wali_murid" id="inputpendidikan_wali_murid">
                    <?php
                    $pendidikan_wali_murid = ['SD', 'SMP', 'SMA', 'S1', 'S2', 'S3'];
                    foreach ($pendidikan_wali_murid    as $val) {
                      if ($val == $pendaftaran_siswa['pendidikan_wali_murid']) { ?>
                        <option value='<?= $val ?>' selected><?= $val ?></option>
                      <?php } else { ?>
                        <option value="<?= $val ?>"><?= $val ?></option>
                    <?php
                      }
                    }
                    ?>
                  </select>
                </div>
                <label for='inputpekerjaan_wali_murid' class='col-sm-2 col-form-label'>Pekerjaan Wali Murid</label>
                <div class='col-sm-4'>
                  <input type='text' class='form-control' id='inputpekerjaan_wali_murid' name='pekerjaan_wali_murid' value='<?= $pendaftaran_siswa['pekerjaan_wali_murid']; ?>' >
                </div>
              </div>

              <div class='form-group'>
                <label for='inputalamat_wali_murid' class='col-sm-2 col-form-label'>Alamat Wali Murid</label>
                <div class='col-sm-10'>
                  <textarea class='form-control' id='inputalamat_wali_murid' name='alamat_wali_murid' ><?= $pendaftaran_siswa['alamat_wali_murid'] ?></textarea>
                </div>
              </div>

              <div class='form-group'>
                <label for='inputno_dapat_dihubungi' class='col-sm-2 col-form-label'>No HP Wali Murid</label>
                <div class='col-sm-10'>
                  <div class="input-group">
                    <span class="input-group-addon">+62</span>
                    <input type="text" class='form-control' id='inputno_dapat_dihubungi' name='no_dapat_dihubungi' placeholder="897558xxxx" value='<?= $pendaftaran_siswa['no_dapat_dihubungi']; ?>' >
                  </div>
                </div>
              </div>

              <hr>
              <h4 class="text-center">Data Orang Tua</h4>

              <div class='form-group'>
                <label for='inputnm_ayah' class='col-sm-2 col-form-label'>Nama Ayah</label>
                <div class='col-sm-10'>
                  <input type='text' class='form-control' id='inputnm_ayah' name='nm_ayah' value='<?= $pendaftaran_siswa['nm_ayah']; ?>' >
                </div>
              </div>

              <div class='form-group'>
                <label for='inputtempat_lahir_ayah' class='col-sm-2 col-form-label'>Tempat Lahir</label>
                <div class='col-sm-4'>
                  <input type='text' class='form-control' id='inputtempat_lahir_ayah' name='tempat_lahir_ayah' value='<?= $pendaftaran_siswa['tempat_lahir_ayah']; ?>' >
                </div>
                <label for='inputtanggal_lahir_ayah' class='col-sm-2 col-form-label'>Tempat Lahir</label>
                <div class='col-sm-4'>
                  <input type='date' class='form-control' id='inputtanggal_lahir_ayah' name='tanggal_lahir_ayah' value='<?= $pendaftaran_siswa['tanggal_lahir_ayah']; ?>' >
                </div>
              </div>

              <div class="form-group">
                <label for="inputpendidikan_ayah" class="col-sm-2 col-form-label">Pendidikan Ayah</label>
                <div class="col-sm-4">
                  <select class="form-control" name="pendidikan_ayah" id="inputpendidikan_ayah">
                    <?php
                    $pendidikan_ayah = ['SD', 'SMP', 'SMA', 'S1', 'S2', 'S3'];
                    foreach ($pendidikan_ayah    as $val) {
                      if ($val == $pendaftaran_siswa['pendidikan_ayah']) { ?>
                        <option value='<?= $val ?>' selected><?= $val ?></option>
                      <?php } else { ?>
                        <option value="<?= $val ?>"><?= $val ?></option>
                    <?php
                      }
                    }
                    ?>
                  </select>
                </div>
              </div>
              <div class='form-group'>
                <label for='inputalamat_ayah' class='col-sm-2 col-form-label'>Alamat Ayah</label>
                <div class='col-sm-10'>
                  <textarea class='form-control' id='inputalamat_ayah' name='alamat_ayah' ><?= $pendaftaran_siswa['alamat_ayah'] ?></textarea>
                </div>
              </div>


              <div class='form-group'>
                <label for='inputnm_ibu' class='col-sm-2 col-form-label'>Nama Ibu</label>
                <div class='col-sm-10'>
                  <input type='text' class='form-control' id='inputnm_ibu' name='nm_ibu' value='<?= $pendaftaran_siswa['nm_ibu']; ?>' >
                </div>
              </div>

              <div class='form-group'>
                <label for='inputtempat_lahir_ibu' class='col-sm-2 col-form-label'>Tempat Lahir</label>
                <div class='col-sm-4'>
                  <input type='text' class='form-control' id='inputtempat_lahir_ibu' name='tempat_lahir_ibu' value='<?= $pendaftaran_siswa['tempat_lahir_ibu']; ?>' >
                </div>
                <label for='inputtanggal_lahir_ibu' class='col-sm-2 col-form-label'>Tempat Lahir</label>
                <div class='col-sm-4'>
                  <input type='date' class='form-control' id='inputtanggal_lahir_ibu' name='tanggal_lahir_ibu' value='<?= $pendaftaran_siswa['tanggal_lahir_ibu']; ?>' >
                </div>
              </div>
              <div class="form-group">
                <label for="inputpendidikan_ibu" class="col-sm-2 col-form-label">Pendidikan Ibu</label>
                <div class="col-sm-4">
                  <select class="form-control" name="pendidikan_ibu" id="inputpendidikan_ibu">
                    <?php
                    $pendidikan_ibu = ['SD', 'SMP', 'SMA', 'S1', 'S2', 'S3'];
                    foreach ($pendidikan_ibu    as $val) {
                      if ($val == $pendaftaran_siswa['pendidikan_ibu']) { ?>
                        <option value='<?= $val ?>' selected><?= $val ?></option>
                      <?php } else { ?>
                        <option value="<?= $val ?>"><?= $val ?></option>
                    <?php
                      }
                    }
                    ?>
                  </select>
                </div>
              </div>
              <div class='form-group'>
                <label for='inputalamat_ibu' class='col-sm-2 col-form-label'>Alamat Ibu</label>
                <div class='col-sm-10'>
                  <textarea class='form-control' id='inputalamat_ibu' name='alamat_ibu' ><?= $pendaftaran_siswa['alamat_ibu'] ?></textarea>
                </div>
              </div>
              <div class='form-group' style="display: none;">
                <label for='inputid_user' class='col-sm-2 col-form-label'>User Wali Murid</label>
                <div class='col-sm-10'>
                  <select class='form-control' name='id_user' id='inputid_user'>
                    <?php
                    $users = QueryManyData('SELECT * FROM user');
                    foreach ($users  as  $row) {
                      if ($pendaftaran_siswa['id_user'] ==  $row['id_user']) { ?>
                        <option value='<?= $row['id_user'] ?>' selected>[<?= $row['nm_pengguna'] ?> - <?= $row['level'] ?>]</option>
                      <?php } else { ?>
                        <option value='<?= $row['id_user'] ?>'>[<?= $row['nm_pengguna'] ?> - <?= $row['level'] ?>]</option>
                    <?php
                      }
                    }
                    ?>
                  </select>
                </div>
              </div>
              <?php
              $query_berkas = "SELECT * FROM berkas_pendaftaran where id_pendaftaran = '" . $pendaftaran_siswa['id_pendaftaran'] . "' ";
              foreach (QueryManyData($query_berkas) as $row) {
              ?>
                <div class='form-group'>
                  <label for='inputfile_berkas' class='col-sm-2 col-form-label'>File <?= $row['nm_berkas']; ?></label>
                  <div class='col-sm-10'>
                    <iframe src="<?= $url . '/foto/berkas_pendaftaran/' . $row['file_berkas']; ?>" frameborder="0" style="width:100%; height:600px;"></iframe>
                  </div>
                </div>
                <hr>
              <?php
              }
              ?>
            </div>

            <div class='box-footer'>
              <a href='<?= $url ?>/app/pendaftaran_siswa/index.php' class='btn btn-default btn-sm '>
                <i class='fa fa-reply'></i> kembali
              </a>

            </div>
          </form>
        </div>
      </div>
    </div>
</div>
<?php include_once '../template/footer.php'; ?>