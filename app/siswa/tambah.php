<?php include_once '../template/header.php'; ?>
<?php include_once '../template/navbar.php'; ?>
<?php include_once '../template/sidebar.php'; ?>
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
          <h3 class='box-title'>Form Tambah Siswa</h3>
        </div>
        <form action='<?= $url ?>/aksi/siswa.php' method='post' enctype='multipart/form-data' class='form-horizontal'>
          <div class='box-body'>
            <div class='form-group'>
              <label for='inputnis' class='col-sm-2 col-form-label'>NIS</label>
              <div class='col-sm-10'>
                <input type='text' class='form-control' id='inputnis' name='nis' required>
              </div>
            </div>
            <div class='form-group'>
              <label for='inputid_user' class='col-sm-2 col-form-label'>ID User</label>
              <div class='col-sm-10'>
                <select class='form-control' name='id_user' id='inputid_user' required>
                    <?php
                    $user = QueryManyData('SELECT * FROM user WHERE level = "Orang Tua" ');
                    foreach ($user as  $row) {
                    ?>
                      <option value='<?= $row['id_user'] ?>'><?= $row['nm_pengguna'] ?></option>
                    <?php
                    }
                    ?>
                  </select>
              </div>
            </div>
            <div class='form-group'>
              <label for='inputnm_siswa' class='col-sm-2 col-form-label'>Nama Siswa</label>
              <div class='col-sm-10'>
                <input type='text' class='form-control' id='inputnm_siswa' name='nm_siswa' required>
              </div>
            </div>
            <div class="form-group">
              <label for="inputjk_siswa" class="col-sm-2 col-form-label">Jenis Kelamin</label>
              <div class="col-sm-10">
                <select class="form-control" name="jk_siswa" id="inputjk_siswa">
                    <?php
                    $jk_siswa =['Laki-Laki','Perempuan'];  
                    foreach($jk_siswa    as $val){ ?>  
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
                <textarea  class='form-control' id='inputalamat_siswa' name='alamat_siswa' required></textarea>
              </div>
            </div>
            <div class='form-group'>
              <label for='inputnm_orang_tua' class='col-sm-2 col-form-label'>Nm Orang Tua</label>
              <div class='col-sm-10'>
                <input type='text' class='form-control' id='inputnm_orang_tua' name='nm_orang_tua' required>
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
            <a href='<?= $url ?>/app/siswa/index.php' class='btn btn-default btn-sm '>
              <i class='fa fa-reply'></i> kembali
            </a>
            <button type='submit' name='simpansiswa' value='simpansiswa' class='btn btn-info pull-right'>
              <i class='fa fa-save'></i> SIMPAN
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>    
</div>
<?php include_once '../template/footer.php'; ?>