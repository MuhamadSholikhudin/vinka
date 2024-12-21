<?php
include_once '../template/header.php';
include_once '../template/navbar.php';
include_once '../template/sidebar.php';
// $berkas_pendaftaran = QueryOnedata('SELECT * FROM berkas_pendaftaran WHERE id_berkas = ' . $_GET['id_berkas'] . '')->fetch_assoc();
?>
<div class='content-wrapper'>
  <section class='content-header'>
    <h1>Berkas_Pendaftaran page</h1>
    <ol class='breadcrumb'>
      <li><a href='#'><i class='fa fa-dashboard'></i> Edit</a></li>
      <li class='active'>Berkas_Pendaftaran page</li>
    </ol>
  </section>
  <section class='content'>
    <div class='row'>
      <div class='col-xs-12'>
        <div class='box box-info'>
          <div class='box-header with-border text-center'>
            <h3 class='box-title'>Form Edit Berkas Pendaftaran</h3>
          </div>
          <form action='<?= $url ?>/aksi/berkas_pendaftaran.php' method='post' enctype='multipart/form-data' class='form-horizontal'>
            <div class='box-body'>
              <?php 
              $query_berkas = "SELECT * FROM berkas_pendaftaran where id_pendaftaran = '". $_GET['id_pendaftaran'] ."' "; 
              foreach(QueryManyData($query_berkas)as $row){
              ?>
              <div class='form-group' style='display:none;'>
                <label for='inputnm_berkas' class='col-sm-4 col-form-label'>Nama Berkas</label>
                <div class='col-sm-8'>
                  <input type='text' class='form-control' id='inputid_berkas' name='id_berkas[]' value="<?= $row['id_berkas'] ?>" required>
                  <input type='text' class='form-control' id='inputnm_berkas'  name='nm_berkas[]' value="<?= $row['nm_berkas'] ?>" required>
                  <input type='text' class='form-control' id='inputfile_berkas_old' name='file_berkas_old[]' value="<?= $row['file_berkas'] ?>" required>
                </div>
              </div>
              <div class='form-group'>
                <label for='inputfile_berkas' class='col-sm-4 col-form-label'>File Berkas <?= $row['nm_berkas'] ?> (.pdf)</label>
                <div class='col-sm-8'>
                  <input type='file' class='form-control' id='inputfile_berkas' name='file_berkas_<?= $row['id_berkas'] ?>' accept=".pdf" >
                </div>
              </div>
              <div class='form-group' >
                    <label for='inputfile_berkas' class='col-sm-4 col-form-label'>File Berkas</label>
                    <div class='col-sm-8'>
                        <iframe src="<?= $url.'/foto/berkas_pendaftaran/'.$row['file_berkas']; ?>" frameborder="0" style="width:100%; height:600px;"></iframe>
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
              <button type='submit' name='updateberkas_pendaftaran' value='updateberkas_pendaftaran' class='btn btn-info pull-right'>
                <i class='fa fa-save'></i> UPDATE
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
</div>
<?php include_once '../template/footer.php'; ?>