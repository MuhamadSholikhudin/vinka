<?php
include_once '../template/header.php';
include_once '../template/navbar.php';
include_once '../template/sidebar.php';
$pendaftaran_siswa = QueryOnedata('SELECT * FROM pendaftaran_siswa WHERE id_pendaftaran = ' . $_GET['id_pendaftaran'] . '')->fetch_assoc();
?>
<div class='content-wrapper'>
  <section class='content-header'>
    <h1>Pendaftaran_Siswa page</h1>
    <ol class='breadcrumb'>
      <li><a href='#'><i class='fa fa-dashboard'></i> Edit</a></li>
      <li class='active'>Pendaftaran_Siswa page</li>
    </ol>
  </section>
  <section class='content'>
    <div class='row'>
      <div class='col-xs-12'>
        <div class='box box-info'>
          <div class='box-header with-border text-center'>
            <h3 class='box-title'>Form Edit Pendaftaran Siswa</h3>
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
                <label for='inputtgl_daftar' class='col-sm-2 col-form-label'>Tanggal Daftar</label>
                <div class='col-sm-10'>
                  <input type='date' class='form-control' id='inputtgl_daftar' name='tgl_daftar' value='<?= $pendaftaran_siswa['tgl_daftar']; ?>' required>
                </div>
              </div>
              <div class='form-group'>
                <label for='inputnm_siswa' class='col-sm-2 col-form-label'>Nama Siswa</label>
                <div class='col-sm-10'>
                  <input type='text' class='form-control' id='inputnm_siswa' name='nm_siswa' value='<?= $pendaftaran_siswa['nm_siswa']; ?>' required>
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
                <label for='inputalamat_siswa' class='col-sm-2 col-form-label'>Alamat Siswa</label>
                <div class='col-sm-10'>
                  <textarea class='form-control' id='inputalamat_siswa' name='alamat_siswa' required><?= $pendaftaran_siswa['alamat_siswa'] ?></textarea>
                </div>
              </div>
              <div class='form-group'>
                <label for='inputfoto_siswa' class='col-sm-2 col-form-label'>Foto Siswa</label>
                <div class='col-sm-10'>
                  <input type='file' class='form-control' id='inputfoto_siswa' name='foto_siswa'  >
                  <input type='text' class='form-control' id='inputfoto_siswa_old' name='foto_siswa_old' value='<?= $pendaftaran_siswa['foto_siswa']; ?>' >
                </div>
              </div>
              <div class='form-group'>
                <label for='inputasal_sekolah' class='col-sm-2 col-form-label'>Asal Sekolah</label>
                <div class='col-sm-10'>
                  <input type='text' class='form-control' id='inputasal_sekolah' name='asal_sekolah' placeholder="Contoh : TK Kemala Siwi" value='<?= $pendaftaran_siswa['asal_sekolah']; ?>' required>
                </div>
              </div>
              <div class='form-group'>
                <label for='inputnm_orang_tua' class='col-sm-2 col-form-label'>Nama Orang Tua</label>
                <div class='col-sm-10'>
                  <input type='text' class='form-control' id='inputnm_orang_tua' name='nm_orang_tua' value='<?= $pendaftaran_siswa['nm_orang_tua']; ?>' required>
                </div>
              </div>
              <div class='form-group'>
                <label for='inputnm_wali_murid' class='col-sm-2 col-form-label'>Nama Wali Murid</label>
                <div class='col-sm-10'>
                  <input type='text' class='form-control' id='inputnm_wali_murid' name='nm_wali_murid' value='<?= $pendaftaran_siswa['nm_wali_murid']; ?>' required>
                </div>
              </div>
              <div class='form-group'>
                <label for='inputno_hp_orang_tua' class='col-sm-2 col-form-label'>No HP Wali Murid</label>
                <div class='col-sm-10'>
                  <div class="input-group">
                    <span class="input-group-addon">+62</span>
                    <input type="text" class='form-control' id='inputno_hp_orang_tua' name='no_hp_orang_tua' placeholder="897558xxxx" value='<?= $pendaftaran_siswa['no_hp_orang_tua']; ?>' required>
                  </div>
                </div>
              </div>

              <div class='form-group'>
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
            </div>
            <div class='box-footer'>
              <a href='<?= $url ?>/app/pendaftaran_siswa/index.php' class='btn btn-default btn-sm '>
                <i class='fa fa-reply'></i> kembali
              </a>
              <button type='submit' name='updatependaftaran_siswa' value='updatependaftaran_siswa' class='btn btn-info pull-right'>
                <i class='fa fa-save'></i> UPDATE
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
</div>
<?php include_once '../template/footer.php'; ?>