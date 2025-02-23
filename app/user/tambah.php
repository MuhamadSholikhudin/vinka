<?php include_once '../template/header.php'; ?>
<?php include_once '../template/navbar.php'; ?>
<?php include_once '../template/sidebar.php'; ?>
<div class='content-wrapper'>
  <section class='content-header'>
    <h1>User page</h1>
    <ol class='breadcrumb'>
      <li><a href='#'><i class='fa fa-dashboard'></i> Edit</a></li>
      <li class='active'>User page</li>
    </ol>
  </section>
  <section class='content'>
    <div class='row'>
      <div class='col-xs-12'>
        <div class='box box-info'>
          <div class='box-header with-border text-center'>
            <h3 class='box-title'>Form Tambah User</h3>
          </div>
          <form action='<?= $url ?>/aksi/user.php' method='post' enctype='multipart/form-data' class='form-horizontal'>
            <div class='box-body'>
              <div class='form-group'>
                <label for='inputusername' class='col-sm-2 col-form-label'>Username</label>
                <div class='col-sm-10'>
                  <input type='text' class='form-control' id='inputusername' name='username' required>
                </div>
              </div>
              <div class='form-group'>
                <label for='inputpassword' class='col-sm-2 col-form-label'>Password</label>
                <div class='col-sm-10'>
                  <input type='text' class='form-control' id='inputpassword' name='password' required>
                </div>
              </div>
              <div class='form-group'>
                <label for='inputnm_pengguna' class='col-sm-2 col-form-label'>Nama Pengguna</label>
                <div class='col-sm-10'>
                  <input type='text' class='form-control' id='inputnm_pengguna' name='nm_pengguna' required>
                </div>
              </div>
              <div class="form-group">
                <label for="inputlevel" class="col-sm-2 col-form-label">Level</label>
                <div class="col-sm-10">
                  <select class="form-control" name="level" id="inputlevel">
                    <?php
                    $level = ['Kepala Sekolah', 'Seksi Tata Usaha', 'Seksi Kurikulum', 'Guru', 'Orang Tua'];
                    foreach ($level    as $val) { ?>
                      <option value="<?= $val ?>"><?= $val ?></option>
                    <?php
                    }
                    ?>
                  </select>
                </div>
              </div>
            </div>
            <div class='box-footer'>
              <a href='<?= $url ?>/app/user/index.php' class='btn btn-default btn-sm '>
                <i class='fa fa-reply'></i> kembali
              </a>
              <button type='submit' name='simpanuser' value='simpanuser' class='btn btn-info pull-right'>
                <i class='fa fa-save'></i> SIMPAN
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
</div>
<?php include_once '../template/footer.php'; ?>