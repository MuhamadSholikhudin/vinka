<?php include_once '../template/header.php'; ?>
<?php include_once '../template/navbar.php'; ?>
<?php include_once '../template/sidebar.php'; ?>
<div class='content-wrapper'>
  <section class='content-header'>
    <h1>Kehadiran_Siswa page</h1>
    <ol class='breadcrumb'>
      <li><a href='#'><i class='fa fa-dashboard'></i> Edit</a></li>
      <li class='active'>Kehadiran_Siswa page</li>
    </ol>
  </section>
  <section class='content'>
    <div class='row'>
      <div class='col-xs-12'>
        <div class='box box-info'>
          <div class='box-header with-border text-center'>
            <h3 class='box-title'>Form Tambah Kehadiran Siswa</h3>
          </div>
          <form action='<?= $url ?>/aksi/kehadiran_siswa.php' method='post' enctype='multipart/form-data' class='form-horizontal'>
            <div class='box-body'>
              <div class='form-group'>
                <label for='inputid_plotting' class='col-sm-2 col-form-label'>Id Plotting</label>
                <div class='col-sm-10'>
                  <?php ?>
                  <select class='form-control' name='id_plotting' id='inputid_plotting'>
                    <?php
                    $plotting = QueryManyData('SELECT * FROM plotting_jadwal');
                    foreach ($plotting as  $row) {
                    ?>
                      <option value='<?= $row['id_plotting'] ?>'><?= $row['id_plotting'] ?></option>
                    <?php
                    }
                    ?>
                  </select>
                </div>
              </div>
              <div class='form-group'>
                <label for='inputtgl_kehadiran' class='col-sm-2 col-form-label'>Tgl Kehadiran</label>
                <div class='col-sm-10'>
                  <input type='date' class='form-control' id='inputtgl_kehadiran' name='tgl_kehadiran' required>
                </div>
              </div>
              <div class="form-group">
                <label for="inputjenis_kehadiran" class="col-sm-2 col-form-label">Jenis_Kehadiran</label>
                <div class="col-sm-10">
                  <select class="form-control" name="jenis_kehadiran" id="inputjenis_kehadiran">
                    <?php
                    $jenis_kehadiran = ['Masuk', 'Alfa', 'Izin'];
                    foreach ($jenis_kehadiran    as $val) { ?>
                      <option value="<?= $val ?>"><?= $val ?></option>
                    <?php
                    }
                    ?>
                  </select>
                </div>
              </div>
            </div>
            <div class='box-footer'>
              <a href='<?= $url ?>/app/kehadiran_siswa/index.php' class='btn btn-default btn-sm '>
                <i class='fa fa-reply'></i> kembali
              </a>
              <button type='submit' name='simpankehadiran_siswa' value='simpankehadiran_siswa' class='btn btn-info pull-right'>
                <i class='fa fa-save'></i> SIMPAN
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
</div>
<?php include_once '../template/footer.php'; ?>