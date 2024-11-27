<?php
include_once '../template/header.php';
include_once '../template/navbar.php';
include_once '../template/sidebar.php';
$jenis_guru = QueryOnedata('SELECT * FROM jenis_guru WHERE id_jenis_guru = ' . $_GET['id_jenis_guru'] . '')->fetch_assoc();
?>
<div class='content-wrapper'>
  <section class='content-header'>
    <h1>Jenis Guru page</h1>
    <ol class='breadcrumb'>
      <li><a href='#'><i class='fa fa-dashboard'></i> Edit</a></li>
      <li class='active'>Jenis Guru page</li>
    </ol>
  </section>
  <section class='content'>
    <div class='row'>
      <div class='col-xs-12'>
        <div class='box box-info'>
          <div class='box-header with-border text-center'>
            <h3 class='box-title'>Form Edit Jenis Guru</h3>
          </div>
          <form action='<?= $url ?>/aksi/jenis_guru.php' method='post' enctype='multipart/form-data' class='form-horizontal'>
            <div class='box-body'>
              <div class='form-group' style='display:none;'>
                <label for='inputid_jenis_guru' class='col-sm-2 col-form-label'>Id Jenis Guru</label>
                <div class='col-sm-10'>
                  <input type='number' class='form-control' id='inputid_jenis_guru' name='id_jenis_guru' value='<?= $jenis_guru['id_jenis_guru']; ?>' required>
                </div>
              </div>
              <div class='form-group'>
                <label for='inputnm_jenis_guru' class='col-sm-2 col-form-label'>Nama Jenis Guru</label>
                <div class='col-sm-10'>
                  <input type='text' class='form-control' id='inputnm_jenis_guru' name='nm_jenis_guru' value='<?= $jenis_guru['nm_jenis_guru']; ?>' required>
                </div>
              </div>
            </div>
            <div class='box-footer'>
              <a href='<?= $url ?>/app/jenis_guru/index.php' class='btn btn-default btn-sm '>
                <i class='fa fa-reply'></i> kembali
              </a>
              <button type='submit' name='updatejenis_guru' value='updatejenis_guru' class='btn btn-info pull-right'>
                <i class='fa fa-save'></i> UPDATE
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
</div>
<?php include_once '../template/footer.php'; ?>