<?php include_once '../template/header.php'; ?>
<?php include_once '../template/navbar.php'; ?>
<?php include_once '../template/sidebar.php'; ?>
<div class='content-wrapper'>
  <section class='content-header'>
    <h1>Berkas Pendaftaran page</h1>
    <ol class='breadcrumb'>
      <li><a href='#'><i class='fa fa-dashboard'></i> Edit</a></li>
      <li class='active'>Berkas Pendaftaran page</li>
    </ol>
  </section>
  <section class='content'>
    <div class='row'>
      <div class='col-xs-12'>
        <div class='box box-info'>
          <div class='box-header with-border text-center'>
            <h3 class='box-title'>Form Tambah Berkas Pendaftaran</h3>
          </div>
          <form action='<?= $url ?>/aksi/berkas_pendaftaran.php' method='post' enctype='multipart/form-data' class='form-horizontal'>
            <div class='box-body'>
              <div class='form-group' style="display: none;">
                <label for='inputid_pendaftaran' class='col-sm-2 col-form-label '>Pendaftaran</label>
                <div class='col-sm-10'>
                  <input type="text" name="id_pendaftaran" class="form-control" value="<?= $_GET['id_pendaftaran'] ?>" required>
                </div>
              </div>
              <div class='form-group'>
                <label for='inputnm_berkas' class='col-sm-2 col-form-label'>Nama Berkas</label>
                <div class='col-sm-10'>
                  <textarea class='form-control' id='inputnm_berkas' name='nm_berkas' required></textarea>
                </div>
              </div>
              <div class='form-group'>
                <label for='inputfile_berkas' class='col-sm-2 col-form-label'>File Berkas</label>
                <div class='col-sm-10'>
                  <input type='file' class='form-control' id='inputfile_berkas' name='file_berkas' accept=".pdf" required>
                </div>
              </div>
            </div>
            <div class='box-footer'>
              <a href='<?= $url ?>/app/pendaftaran_siswa/index.php' class='btn btn-default btn-sm '>
                <i class='fa fa-reply'></i> kembali
              </a>
              <button type='submit' name='simpanberkas_pendaftaran' value='simpanberkas_pendaftaran' class='btn btn-info pull-right'>
                <i class='fa fa-save'></i> SIMPAN
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
</div>
<?php include_once '../template/footer.php'; ?>