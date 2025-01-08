<?php include_once '../template/header.php'; ?>
<?php include_once '../template/navbar.php'; ?>
<?php include_once '../template/sidebar.php'; ?>
<div class='content-wrapper'>
  <section class='content-header'>
    <h1>Kelulusan page
    </h1>
    <ol class='breadcrumb'>
      <li><a href='#'><i class='fa fa-dashboard'></i> Index</a></li>
      <li class='active'>Kelulusan page</li>
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
    <div class="box box-danger">
      <div class="box-header with-border">
        <h3 class="box-title">Periode Semester</h3>
      </div>

      <div class="box-body">
        <?php foreach (QueryManyData("SELECT * FROM  periode ORDER BY id_periode DESC") as $row) { ?>
          <div class="row">
            <div class="col-xs-6">
              <a href="<?= $url ?>/app/kelulusan/periode.php?id_periode=<?= $row['id_periode'] ?>" class="btn btn-block btn-social btn-bitbucket">
                <i class="fa fa-flickr"></i> <?= $row['nm_periode'] ?>
              </a>
            </div>
          <?php } ?>

          </div>
      </div><!-- /.box-body -->
    </div>
</div>
<?php include_once '../template/footer.php'; ?>