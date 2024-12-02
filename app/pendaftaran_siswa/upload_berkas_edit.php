<?php
include_once '../template/header.php';
include_once '../template/navbar.php';
include_once '../template/sidebar.php';
$berkas_pendaftaran = QueryOnedata('SELECT * FROM berkas_pendaftaran WHERE id_berkas = ' . $_GET['id_berkas'] . '')->fetch_assoc();
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
              <div class='form-group' style='display:none;'>
                <label for='inputid_berkas' class='col-sm-2 col-form-label'>Id_Berkas</label>
                <div class='col-sm-10'>
                  <input type='number' class='form-control' id='inputid_berkas' name='id_berkas' value='<?= $berkas_pendaftaran['id_berkas']; ?>' required>
                </div>
              </div>
              <div class='form-group' style='display:none;'>
                <label for='inputid_pendaftaran' class='col-sm-2 col-form-label'>Id Pendaftaran</label>
                <div class='col-sm-10'>
                  <select class='form-control' name='id_pendaftaran' id='inputid_pendaftaran'>
                    <?php
                    $pendaftarans = QueryManyData('SELECT * FROM pendaftaran_siswa');
                    foreach ($pendaftarans  as  $row) {
                      if ($berkas_pendaftaran['id_pendaftaran'] ==  $row['id_pendaftaran']) {
                    ?>
                        <option value='<?= $row['id_pendaftaran'] ?>' selected><?= $row['id_pendaftaran'] ?></option>
                      <?php } else { ?>
                        <option value='<?= $row['id_pendaftaran'] ?>'><?= $row['id_pendaftaran'] ?></option>
                    <?php
                      }
                    }
                    ?>
                  </select>
                </div>
              </div>
              <div class='form-group'>
                <label for='inputnm_berkas' class='col-sm-2 col-form-label'>Nama Berkas</label>
                <div class='col-sm-10'>
                  <textarea class='form-control' id='inputnm_berkas' name='nm_berkas' required><?= $berkas_pendaftaran['nm_berkas'] ?></textarea>
                </div>
              </div>
              <div class='form-group'>
                <label for='inputfile_berkas' class='col-sm-2 col-form-label'>File Berkas</label>
                <div class='col-sm-10'>
                  <iframe src="<?= $url . '/foto/berkas_pendaftaran/' . $berkas_pendaftaran['file_berkas']; ?>" frameborder="0" style="width:100%;"></iframe>
                  <input type='file' class='form-control' id='inputfile_berkas' name='file_berkas' accept=".pdf">
                  <input type='hidden' class='form-control' id='inputfile_berkas_old' name='file_berkas_old' value='<?= $berkas_pendaftaran['file_berkas']; ?>' required>
                </div>
              </div>
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