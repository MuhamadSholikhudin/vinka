<?php include_once '../template/header.php'; ?>
<?php include_once '../template/navbar.php'; ?>
<?php include_once '../template/sidebar.php'; ?>
<div class='content-wrapper'>
  <section class='content-header'>
    <h1>Broadcast page
    </h1>
    <ol class='breadcrumb'>
      <li><a href='#'><i class='fa fa-dashboard'></i> Index</a></li>
      <li class='active'>Broadcast page</li>
    </ol>
  </section>
  <section class='content'>
    <?php if (isset($_SESSION['message'])) {
      if ($_SESSION['message_code'] == 200) {
    ?>
        <div class='alert alert-info alert-dismissable'>
          <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
          <h4>
            <i class='icon fa fa-check-circle'></i> Success!
          </h4>
          <?= $_SESSION['message'] ?>
        </div>
      <?php
      } else {
      ?>
        <div class='alert alert-danger alert-dismissable'>
          <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
          <h4><i class='icon fa fa-ban'></i> Error!</h4>
          <?= $_SESSION['message'] ?>
        </div>
    <?php
      }
      unset($_SESSION['message']);
      unset($_SESSION['message_code']);
    } ?>
    <div class='row'>
      <div class='col-xs-12'>
        <div class='box box-info'>
          <div class='box-header with-border text-center'>
            <h3 class='box-title'>Pengumuman ke Semua Wali Murid Yang Siswa Masih Aktif</h3>
          </div>
          <form action='<?= $url ?>/aksi/broadcast.php' method='post' enctype='multipart/form-data' class='form-horizontal'>
            <div class='box-body'>

              <div class='form-group'>
                <label for='inputalamat_guru' class='col-sm-2 col-form-label'>Pesan Pengumuman</label>
                <div class='col-sm-10'>
                  <textarea class='form-control' id='inputalamat_guru' name='broadcast' required></textarea>
                </div>
              </div>

            </div>
            <div class='box-footer'>
              <button type='submit' name='POST_broadcast' value='POST_broadcast' class='btn btn-info pull-right'>
                <i class='fa fa-save'></i> SIMPAN
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
</div>
<?php include_once '../template/footer.php'; ?>