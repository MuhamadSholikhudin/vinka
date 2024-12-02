<?php
include_once '../template/header.php';
include_once '../template/navbar.php';
include_once '../template/sidebar.php';
$siswa = QueryOnedata('SELECT * FROM siswa WHERE id_siswa = ' . $_GET['id_siswa'] . '')->fetch_assoc();
?>
<div class='content-wrapper'>
  <section class='content-header'>
    <h1>Siswa page</h1>
    <ol class='breadcrumb'>
      <li><a href='#'><i class='fa fa-dashboard'></i> Edit</a></li>
      <li class='active'>Siswa page</li>
    </ol>
  </section>
  <section class='content'>
    <div class='row'>
      <div class='col-xs-12'>
        <div class='box box-info'>
          <div class='box-header with-border text-center'>
            <h3 class='box-title'>Form Edit Siswa</h3>
          </div>
          <form action='<?= $url ?>/aksi/siswa.php' method='post' enctype='multipart/form-data' class='form-horizontal'>
            <div class='box-body'>
              <div class='form-group' style='display:none;'>
                <label for='inputid_siswa' class='col-sm-2 col-form-label'>Id_Siswa</label>
                <div class='col-sm-10'>
                  <input type='number' class='form-control' id='inputid_siswa' name='id_siswa' value='<?= $siswa['id_siswa']; ?>' required>
                </div>
              </div>
              <div class='form-group'>
                <label for='inputnis' class='col-sm-2 col-form-label'>Nis</label>
                <div class='col-sm-10'>
                  <input type='text' class='form-control' id='inputnis' name='nis' value='<?= $siswa['nis']; ?>' required>
                </div>
              </div>
              <div class='form-group'>
                <label for='inputid_user' class='col-sm-2 col-form-label'>ID User</label>
                <div class='col-sm-10'>
                  <input type='hidden' class='form-control' id='inputid_user' name='id_user' value='<?= $siswa['id_user']; ?>' required>
                  <?php
                  $user = QueryOnedata('SELECT * FROM user WHERE id_user = '.$siswa['id_user'].'')->fetch_assoc()
                  ?>
                  <input type='text' class='form-control' id='inputid_user' value='<?= $user['username']." | ".$user['nm_pengguna'] ?>' readonly>
                </div>
              </div>
              <div class='form-group'>
                <label for='inputnm_siswa' class='col-sm-2 col-form-label'>Nm Siswa</label>
                <div class='col-sm-10'>
                  <input type='text' class='form-control' id='inputnm_siswa' name='nm_siswa' value='<?= $siswa['nm_siswa']; ?>' required>
                </div>
              </div>
              <div class="form-group">
                <label for="inputjk_siswa" class="col-sm-2 col-form-label">Jk Siswa</label>
                <div class="col-sm-10">
                  <select class="form-control" name="jk_siswa" id="inputjk_siswa">
                    <?php
                    $jk_siswa = ['Laki-Laki', 'Perempuan'];
                    foreach ($jk_siswa    as $val) {
                      if ($val == $siswa['jk_siswa']) { ?>
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
                  <textarea class='form-control' id='inputalamat_siswa' name='alamat_siswa' required><?= $siswa['alamat_siswa'] ?></textarea>
                </div>
              </div>
              <div class='form-group'>
                <label for='inputnm_orang_tua' class='col-sm-2 col-form-label'>Nm Orang Tua</label>
                <div class='col-sm-10'>
                  <input type='text' class='form-control' id='inputnm_orang_tua' name='nm_orang_tua' value='<?= $siswa['nm_orang_tua']; ?>' required>
                </div>
              </div>
              <div class='form-group'>
                <label for='inputfoto_siswa' class='col-sm-2 col-form-label'>Foto Siswa</label>
                <div class='col-sm-10'>
                  <iframe src="<?= $url . '/foto/siswa/' . $siswa['foto_siswa']; ?>" frameborder="0" style="width:100%; height:100%;"></iframe>
                  <input type='file' class='form-control' id='inputfoto_siswa' name='foto_siswa' accept=".jpg, .jpeg, .png">
                  <input type='hidden' class='form-control' id='inputfoto_siswa_old' name='foto_siswa_old' value='<?= $siswa['foto_siswa']; ?>' required>                
                </div>
              </div>
            </div>
            <div class='box-footer'>
              <a href='<?= $url ?>/app/siswa/index.php' class='btn btn-default btn-sm '>
                <i class='fa fa-reply'></i> kembali
              </a>
              <button type='submit' name='updatesiswa' value='updatesiswa' class='btn btn-info pull-right'>
                <i class='fa fa-save'></i> UPDATE
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
</div>
<?php include_once '../template/footer.php'; ?>