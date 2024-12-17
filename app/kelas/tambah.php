<?php include_once '../template/header.php'; ?>
<?php include_once '../template/navbar.php'; ?>
<?php include_once '../template/sidebar.php'; ?>
<div class='content-wrapper'>
  <section class='content-header'>
    <h1>Kelas page</h1>
    <ol class='breadcrumb'>
      <li><a href='#'><i class='fa fa-dashboard'></i> Edit</a></li>
      <li class='active'>Kelas page</li>
    </ol>
  </section>
  <section class='content'>
    <div class='row'>
      <div class='col-xs-12'>
        <div class='box box-info'>
          <div class='box-header with-border text-center'>
            <h3 class='box-title'>Form Tambah Kelas</h3>
          </div>
          <form action='<?= $url ?>/aksi/kelas.php' method='post' enctype='multipart/form-data' class='form-horizontal'>
            <div class='box-body'>
              <div class='form-group'>
                <label for='inputid_guru' class='col-sm-2 col-form-label'>Guru (Wali kelas)</label>
                <div class='col-sm-10'>
                  <?php ?>
                  <select class='form-control' name='id_guru' id='inputid_guru'>
                    <?php
                    $guru = QueryManyData('SELECT * FROM guru');
                    foreach ($guru as  $row) {
                    ?>
                      <option value='<?= $row['id_guru'] ?>'> <?= $row['nip'] ?> | <?= $row['nm_guru'] ?></option>
                    <?php
                    }
                    ?>
                  </select>
                </div>
              </div>
              <div class='form-group'>
                <label for='inputnm_kelas' class='col-sm-2 col-form-label'>Nama Kelas</label>
                <div class='col-sm-10'>
                  <input type='text' class='form-control' id='inputnm_kelas' name='nm_kelas' required>
                </div>
              </div>
              <div class='form-group'>
                <label for='inputtingkatan' class='col-sm-2 col-form-label'>Tingkatan</label>
                <div class='col-sm-10'>
                  <input type='number' class='form-control' id='inputtingkatan' name='tingkatan' required>
                </div>
              </div>
            </div>
            <div class='box-footer'>
              <a href='<?= $url ?>/app/kelas/index.php' class='btn btn-default btn-sm '>
                <i class='fa fa-reply'></i> kembali
              </a>
              <button type='submit' name='simpankelas' value='simpankelas' class='btn btn-info pull-right'>
                <i class='fa fa-save'></i> SIMPAN
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
</div>
<?php include_once '../template/footer.php'; ?>