<?php include_once '../template/header.php'; ?>
<?php include_once '../template/navbar.php'; ?>
<?php include_once '../template/sidebar.php'; ?>
<div class='content-wrapper'>
  <section class='content-header'>
    <h1>Guru page</h1>
    <ol class='breadcrumb'>
      <li><a href='#'><i class='fa fa-dashboard'></i> Edit</a></li>
      <li class='active'>Guru page</li>
    </ol>
  </section>
  <section class='content'>
    <div class='row'>
      <div class='col-xs-12'>
        <div class='box box-info'>
          <div class='box-header with-border text-center'>
            <h3 class='box-title'>Form Tambah Guru</h3>
          </div>
          <form action='<?= $url ?>/aksi/guru.php' method='post' enctype='multipart/form-data' class='form-horizontal'>
            <div class='box-body'>
              <div class='form-group'>
                <label for='inputnip' class='col-sm-2 col-form-label'>Nip</label>
                <div class='col-sm-10'>
                  <input type='text' class='form-control' id='inputnip' name='nip' required>
                </div>
              </div>
              <div class='form-group'>
                <label for='inputnm_guru' class='col-sm-2 col-form-label'>Nama Guru</label>
                <div class='col-sm-10'>
                  <input type='text' class='form-control' id='inputnm_guru' name='nm_guru' required>
                </div>
              </div>
              <div class='form-group'>
                <label for='inputid_user' class='col-sm-2 col-form-label'>ID User</label>
                <div class='col-sm-10'>
                  <?php ?>
                  <select class='form-control' name='id_user' id='inputid_user' required>
                    <?php
                    $user = QueryManyData('SELECT * FROM user WHERE level = "Guru" ');
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
                <label for='inputid_jenis_guru' class='col-sm-2 col-form-label'>Jenis Guru</label>
                <div class='col-sm-10'>
                  <?php ?>
                  <select class='form-control' name='id_jenis_guru' id='inputid_jenis_guru' required>
                    <?php
                    $guru = QueryManyData('SELECT * FROM jenis_guru ');
                    foreach ($guru as  $row) {
                    ?>
                      <option value='<?= $row['id_jenis_guru'] ?>'><?= $row['nm_jenis_guru'] ?></option>
                    <?php
                    }
                    ?>
                  </select>
                </div>
              </div>
              <div class='form-group'>
                <label for='inputno_guru' class='col-sm-2 col-form-label'>No Guru</label>
                <div class='col-sm-10'>
                  <input type='text' class='form-control' id='inputno_guru' name='no_guru' required>
                </div>
              </div>
              <div class="form-group">
                <label for="inputjk_guru" class="col-sm-2 col-form-label">Jenis kelamin Guru</label>
                <div class="col-sm-10">
                  <select class="form-control" name="jk_guru" id="inputjk_guru">
                    <?php
                    $jk_guru = ['Laki-Laki', 'Perempuan'];
                    foreach ($jk_guru    as $val) { ?>
                      <option value="<?= $val ?>"><?= $val ?></option>
                    <?php
                    }
                    ?>
                  </select>
                </div>
              </div>
              <div class='form-group'>
                <label for='inputalamat_guru' class='col-sm-2 col-form-label'>Alamat Guru</label>
                <div class='col-sm-10'>
                  <textarea class='form-control' id='inputalamat_guru' name='alamat_guru' required></textarea>
                </div>
              </div>
              <div class='form-group'>
                <label for='inputfoto_guru' class='col-sm-2 col-form-label'>Foto Guru</label>
                <div class='col-sm-10'>
                  <input type='file' class='form-control' id='inputfoto_guru' name='foto_guru' accept=".jpg, .png, .jpeg" required>
                </div>
              </div>
            </div>
            <div class='box-footer'>
              <a href='<?= $url ?>/app/guru/index.php' class='btn btn-default btn-sm '>
                <i class='fa fa-reply'></i> kembali
              </a>
              <button type='submit' name='simpanguru' value='simpanguru' class='btn btn-info pull-right'>
                <i class='fa fa-save'></i> SIMPAN
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
</div>
<?php include_once '../template/footer.php'; ?>