<?php include_once '../template/header.php'; ?>
<?php include_once '../template/navbar.php'; ?>
<?php include_once '../template/sidebar.php'; ?>
<div class='content-wrapper'>
  <section class='content-header'>
    <h1>Berkas Pendaftaran page
    </h1>
    <ol class='breadcrumb'>
      <li><a href='#'><i class='fa fa-dashboard'></i> Index</a></li>
      <li class='active'>Berkas Pendaftaran page</li>
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
    <a class='btn btn-social-icon btn-info' data-toggle='tooltip' data-placement='top' title='Tambah data berkas_pendaftaran' href='<?= $url ?>/app/berkas_pendaftaran/tambah.php'><i class='fa fa-plus'></i></a>
    <div class='row'>
      <div class='col-xs-12'>
        <div class='box'>
          <div class='box-header'>
            <h3 class='box-title'>Data Berkas Pendaftaran</h3>
          </div>
          <div class='box-body'>
            <table id='example1' class='table table-bordered table-striped'>
              <thead>
                <tr>
                  <th>ID PENDAFTARAN</th>
                  <th>NAMA BERKAS</th>
                  <th>FILE BERKAS</th>
                  <th>AKSI</th>
                </tr>
              </thead>
              <tbody>
                <?php
                foreach (QueryManyData('SELECT * FROM berkas_pendaftaran') as $row) {
                ?>
                  <tr>
                    <td><?= $row['id_pendaftaran'] ?></td>
                    <td><?= $row['nm_berkas'] ?></td>
                    <td><?= $row['file_berkas'] ?></td>
                    <td>
                      <a href='<?= $url ?>/app/berkas_pendaftaran/edit.php?id_berkas_pendaftaran=<?= $row['id_berkas_pendaftaran'] ?>' class='btn bg-olive btn-flat btn-sm'><i class='fa fa-edit'></i> edit</a>
                      <button onclick='ConfirmDelete(<?= $row['id_berkas_pendaftaran'] ?>)' class='btn bg-maroon btn-flat btn-sm'>
                        <i class='fas fa-trash'></i>
                        hapus
                      </button>
                    </td>
                  </tr>
                <?php
                }
                ?>
              </tbody>
            </table>
          </div>
        </div>
        <script>
          function ConfirmDelete(id) {
            let text = 'Apakah Anda Yakin Ingin Menghapus data!\n OK or Cancel.';
            if (confirm(text) == true) {
              text = 'You pressed OK!';
              window.location.href = '<?= $url ?>/aksi/berkas_pendaftaran.php?id_berkas_pendaftaran=' + id + '&action=delete'
            }
          }
        </script>
      </div>
    </div>
</div>
<?php include_once '../template/footer.php'; ?>