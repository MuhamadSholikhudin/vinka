<?php include_once '../template/header.php'; ?>
<?php include_once '../template/navbar.php'; ?>
<?php include_once '../template/sidebar.php'; ?>
<div class='content-wrapper'>
  <section class='content-header'>
    <h1>Kehadiran Siswa page
    </h1>
    <ol class='breadcrumb'>
      <li><a href='#'><i class='fa fa-dashboard'></i> Index</a></li>
      <li class='active'>Kehadiran Siswa page</li>
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
              <a href="<?= $url ?>/app/kehadiran_siswa/periode.php?id_periode=<?= $row['id_periode'] ?>" class="btn btn-block btn-social btn-bitbucket">
                <i class="fa fa-flickr"></i> <?= $row['nm_periode'] ?>
              </a>
            </div>
          <?php } ?>

          </div>
      </div><!-- /.box-body -->
    </div>
    <?php
    /*
    <a class='btn btn-social-icon btn-info' data-toggle='tooltip' data-placement='top' title='Tambah data kehadiran_siswa' href='<?= $url ?>/app/kehadiran_siswa/tambah.php'><i class='fa fa-plus'></i></a>
    <div class='row'>
      <div class='col-xs-12'>
        <div class='box'>
          <div class='box-header'>
            <h3 class='box-title'>Data Kehadiran Siswa</h3>
          </div>
          <div class='box-body'>
            <table id='example1' class='table table-bordered table-striped'>
              <thead>
                <tr>
                  <th>ID PLOTTING</th>
                  <th>TGL KEHADIRAN</th>
                  <th>JENIS KEHADIRAN</th>
                  <th>AKSI</th>
                </tr>
              </thead>
              <tbody>
                <?php
                foreach (QueryManyData('SELECT * FROM kehadiran_siswa') as $row) {
                ?>
                  <tr>
                    <td>
                      <?php
                      $query_plotting = 'SELECT plotting_jadwal.*, mapel.nm_mapel, kelas.nm_kelas, siswa.nm_siswa FROM plotting_jadwal
                    LEFT JOIN mapel ON plotting_jadwal.id_mapel = mapel.id_mapel
                    LEFT JOIN siswa ON plotting_jadwal.id_siswa = siswa.id_siswa
                    LEFT JOIN kelas ON plotting_jadwal.id_kelas = kelas.id_kelas
                    LEFT JOIN periode ON plotting_jadwal.id_periode = periode.id_periode
                    WHERE plotting_jadwal.id_plotting = ' . $row['id_plotting'] . '
                    ';
                      $plotting = QueryOnedata($query_plotting)->fetch_assoc();
                      ?>
                      <?= $plotting['hari'] . " | " . $plotting['jam_awal'] . " | " . $plotting['jam_akhir'] . " | " . $plotting['nm_mapel'] . " | " . $plotting['nm_kelas'] . " | " . $plotting['nm_siswa'] ?>
                    </td>
                    <td><?= $row['tgl_kehadiran'] ?></td>
                    <td><?= $row['jenis_kehadiran'] ?></td>
                    <td>
                      <?php if ($_SESSION['level'] == 'Orang Tua') { ?>
                        <a href='<?= $url ?>/app/kehadiran_siswa/detail.php?id_kehadiran=<?= $row['id_kehadiran'] ?>' class='btn bg-info btn-flat btn-sm'><i class='fa fa-eye'></i> detail</a>
                      <?php } else { ?>
                        <a href='<?= $url ?>/app/kehadiran_siswa/edit.php?id_kehadiran=<?= $row['id_kehadiran'] ?>' class='btn bg-olive btn-flat btn-sm'><i class='fa fa-edit'></i> edit</a>
                        <button onclick='ConfirmDelete(<?= $row['id_kehadiran'] ?>)' class='btn bg-maroon btn-flat btn-sm'>
                          <i class='fas fa-trash'></i>
                          hapus
                        </button>
                      <?php } ?>

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
              window.location.href = '<?= $url ?>/aksi/kehadiran_siswa.php?id_kehadiran =' + id + '&action=delete'
            }
          }
        </script>
      </div>
    </div>
    */ ?>
</div>
<?php include_once '../template/footer.php'; ?>