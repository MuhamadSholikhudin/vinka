<?php include_once '../template/header.php'; ?>
<?php include_once '../template/navbar.php'; ?>
<?php include_once '../template/sidebar.php'; ?>
<div class='content-wrapper'>
  <section class='content-header'>
    <h1>Penilaian page
    </h1>
    <ol class='breadcrumb'>
      <li><a href='#'><i class='fa fa-dashboard'></i> Index</a></li>
      <li class='active'>Penilaian page</li>
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
    <a class='btn btn-social-icon btn-info' data-toggle='tooltip' data-placement='top' title='Tambah data penilaian' href='<?= $url ?>/app/penilaian/tambah.php'><i class='fa fa-plus'></i></a>
    <div class='row'>
      <div class='col-xs-12'>
        <div class='box'>
          <div class='box-header'>
            <h3 class='box-title'>Data Penilaian</h3>
          </div>
          <div class='box-body'>
            <table id='example1' class='table table-bordered table-striped'>
              <thead>
                <tr>
                  <th>SISWA</th>
                  <th>PLOTTING</th>
                  <th>JENIS PENILAIAN</th>
                  <th>NILAI</th>
                  <th>NILAI PRAKTEK</th>
                  <th>AKSI</th>
                </tr>
              </thead>
              <tbody>
                <?php
                foreach (QueryManyData('SELECT * FROM penilaian') as $row) {
                ?>
                  <tr>
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
                    <td><?= $plotting['nm_siswa'] ?></td>
                    <td>
                      <?= $plotting['hari'] . " | " . $plotting['jam_awal'] . " | " . $plotting['jam_akhir'] . " | " . $plotting['nm_mapel'] . " | " . $plotting['nm_kelas']  ?>
                    </td>
                    <td><?= $row['jenis_penilaian'] ?></td>
                    <td><?= $row['nilai'] ?></td>
                    <td><?= $row['nilai_praktek'] ?></td>
                    <td>
                    <?php if ($_SESSION['level'] == 'Orang Tua') { ?>
                      <a href='<?= $url ?>/app/penilaian/detail.php?id_penilaian=<?= $row['id_penilaian'] ?>' class='btn bg-info btn-flat btn-sm'><i class='fa fa-eye'></i> detail</a>
                      <?php }else{ ?>

                      <a href='<?= $url ?>/app/penilaian/edit.php?id_penilaian=<?= $row['id_penilaian'] ?>' class='btn bg-olive btn-flat btn-sm'><i class='fa fa-edit'></i> edit</a>
                      <button onclick='ConfirmDelete(<?= $row['id_kehadiran_siswa'] ?>)' class='btn bg-maroon btn-flat btn-sm'>
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
              window.location.href = '<?= $url ?>/aksi/kelas.php?id_kelas=' + id + '&action=delete'
            }
          }
        </script>
      </div>
    </div>
</div>
<?php include_once '../template/footer.php'; ?>