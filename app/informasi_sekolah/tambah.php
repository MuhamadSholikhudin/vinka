<?php include_once '../template/header.php'; ?>
<?php include_once '../template/navbar.php'; ?>
<?php include_once '../template/sidebar.php'; ?>
<div class='content-wrapper'>
  <section class='content-header'>
    <h1>Informasi Sekolah page</h1>
    <ol class='breadcrumb'>
      <li><a href='#'><i class='fa fa-dashboard'></i> Edit</a></li>
      <li class='active'>Informasi Sekolah page</li>
    </ol>
  </section>
  <section class='content'>
    <div class='row'>
      <div class='col-xs-12'>
        <div class='box box-info'>
          <div class='box-header with-border text-center'>
            <h3 class='box-title'>Form Tambah Informasi Sekolah</h3>
          </div>
          <form action='<?= $url ?>/aksi/informasi_sekolah.php' method='post' enctype='multipart/form-data' class='form-horizontal'>
            <div class='box-body'>
              <div class='form-group'>
                <label for='inputjudul_informasi' class='col-sm-2 col-form-label'>Judul Informasi</label>
                <div class='col-sm-10'>
                  <input type='text' class='form-control' id='inputjudul_informasi' name='judul_informasi' required>
                </div>
              </div>
              <div class='form-group'>
                <label for='inputket_informasi' class='col-sm-2 col-form-label'>Keterangan Informasi</label>
                <div class='col-sm-10'>
                  <textarea class='form-control' id='inputket_informasi' name='ket_informasi' required></textarea>
                </div>
              </div>
              <div class='form-group'>
                <label for='inputgambar_informasi' class='col-sm-2 col-form-label'>Gambar Informasi</label>
                <div class='col-sm-10'>
                  <input type='file' class='form-control' id='inputgambar_informasi' name='gambar_informasi' required>
                </div>
              </div>
              <div class='form-group'>
                <label for='inputtgl_post_informasi' class='col-sm-2 col-form-label'>Tanggal Post Informasi</label>
                <div class='col-sm-10'>
                  <input type='date' class='form-control' id='inputtgl_post_informasi' name='tgl_post_informasi' required>
                </div>
              </div>
            </div>
            <div class='box-footer'>
              <a href='<?= $url ?>/app/informasi_sekolah/index.php' class='btn btn-default btn-sm '>
                <i class='fa fa-reply'></i> kembali
              </a>
              <button type='submit' name='simpaninformasi_sekolah' value='simpaninformasi_sekolah' class='btn btn-info pull-right'>
                <i class='fa fa-save'></i> SIMPAN
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
</div>
<?php include_once '../template/footer.php'; ?>