<?php include_once '../template/header.php'; ?>
<?php include_once '../template/navbar.php'; ?>
<?php include_once '../template/sidebar.php'; ?>
<div class='content-wrapper'>
  <section class='content-header'>
    <h1>Kelas page
    </h1>
    <ol class='breadcrumb'>
      <li><a href='#'><i class='fa fa-dashboard'></i> Index</a></li>
      <li class='active'>Kelas page</li>
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
    <a class='btn btn-social-icon btn-info' data-toggle='tooltip' data-placement='top' title='Tambah data kelas' href='<?= $url ?>/app/kelas/tambah.php'><i class='fa fa-plus'></i></a>
    <div class='row'>
      <div class='col-xs-12'>
        <div class='box'>
          <div class='box-header'>
            <h3 class='box-title'>Data Kelas</h3>
          </div>
          <div class='box-body'>
            <table id='example1' class='table table-bordered table-striped'>
              <thead>
                <tr>
                  <th>NO</th>
                  <th>GURU</th>
                  <th>NAMA KELAS</th>
                  <th>TINGKATAN</th>
                  <th>JUMLAH SISWA</th>
                  <th>AKSI</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $NO = 1;
                foreach (QueryManyData('SELECT * FROM kelas') as $row) {
                ?>
                  <tr>
                    <td><?= $NO++ ?></td>
                    <td>
                      <?php
                      $guru = QueryOnedata('SELECT * FROM guru WHERE guru.id_guru = ' . $row['id_guru'] . ' ')->fetch_assoc();
                      ?>
                      <?= $guru['nip'] . " | " . $guru['nm_guru'] ?></td>
                    <td><?= $row['nm_kelas'] ?></td>
                    <td><?= $row['tingkatan'] ?></td>
                    <td>
                      <?php 
                        // Menampilkan jumlah siswa yang aktif pada periode tertentu
                        $periode_aktif = QueryOnedata("SELECT * FROM periode WHERE status_periode = 'Aktif' ")->fetch_assoc();

                        echo $plotting = QueryOnedata("SELECT * FROM plotting_jadwal WHERE id_periode = ".$periode_aktif['id_periode']." AND id_kelas =".$row['id_kelas']." ")->num_rows;
                      ?>
                    </td>
                    <td>
                      <a href='<?= $url ?>/app/kelas/edit.php?id_kelas=<?= $row['id_kelas'] ?>' class='btn bg-olive btn-flat btn-sm'><i class='fa fa-edit'></i> edit</a>
                      <button onclick='ConfirmDelete(<?= $row['id_kelas'] ?>)' class='btn bg-maroon btn-flat btn-sm'>
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
              window.location.href = '<?= $url ?>/aksi/kelas.php?id_kelas=' + id + '&action=delete'
            }
          }
        </script>
      </div>
    </div>
</div>
<?php include_once '../template/footer.php'; ?>