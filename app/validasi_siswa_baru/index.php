<?php include_once '../template/header.php'; ?>
<?php include_once '../template/navbar.php'; ?>
<?php include_once '../template/sidebar.php'; ?>
<div class='content-wrapper'>
  <section class='content-header'>
    <h1>Validasi Siswa Baru page
    </h1>
    <ol class='breadcrumb'>
      <li><a href='#'><i class='fa fa-dashboard'></i> Index</a></li>
      <li class='active'>Validasi Siswa Baru page</li>
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
        <div class='box'>
          <div class='box-header'>
            <h3 class='box-title'>Data Pendaftaran Siswa</h3>
          </div>
          <div class='box-body'>
            <table id='example1' class='table table-bordered table-striped'>
              <thead>
                <tr>
                  <th>PERIODE</th>
                  <th>USER</th>
                  <th>TANGGAL DAFTAR</th>
                  <th>NAMA SISWA</th>
                  <th>JK SISWA</th>
                  <th>ALAMAT SISWA</th>
                  <th>NAMA WALI MURID</th>
                  <th>FOTO SISWA</th>
                  <th>STATUS</th>
                  <th>AKSI</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $pendaftaran_siswa = 'SELECT * FROM pendaftaran_siswa WHERE status_pendaftaran = "data di terima"';
                if($_SESSION['level'] == 'Orang Tua'){
                  $pendaftaran_siswa = 'SELECT * FROM pendaftaran_siswa WHERE status_pendaftaran = "data di terima" AND id_user = '.$_SESSION['id_user'].' ';
                }
                foreach (QueryManyData($pendaftaran_siswa) as $row) {
                  $periode = QueryOnedata("SELECT * FROM periode WHERE id_periode = " . $row['id_periode'] . "")->fetch_assoc();
                  $user = QueryOnedata("SELECT * FROM user WHERE id_user = " . $row['id_user'] . "")->fetch_assoc();
                ?>
                  <tr>
                    <td><?= $periode['nm_periode'] ?></td>
                    <td><?= $user['username'] ?></td>
                    <td><?= $row['tgl_daftar'] ?></td>
                    <td><?= $row['nm_siswa'] ?></td>
                    <td><?= $row['jk_siswa'] ?></td>
                    <td><?= $row['alamat_siswa'] ?></td>
                    <td><?= $row['nm_wali_murid'] ?></td>
                    <td> <img src="<?= $url . '/foto/siswa/' . $row['foto_siswa']; ?>" alt="" srcset="" style="width: 50px; height:50px;"> </td>
                    <td> <?= $row['status_pendaftaran'] ?></td>
                    <td>                   
                      <?php if($_SESSION['level'] == 'Seksi Tata Usaha') {
                        ?>
                          <a href='<?= $url ?>/aksi/validasi_siswa_baru.php?id_pendaftaran=<?= $row['id_pendaftaran'] ?>&action=validasi' class='btn bg-primary btn-flat btn-sm'><i class='fa fa-send'></i> VALIDASI</a>
                      <?php 
                      } ?>
                      <a href='<?= $url ?>/app/pendaftaran_siswa/detail.php?id_pendaftaran=<?= $row['id_pendaftaran'] ?>' class='btn bg-info btn-flat btn-sm'><i class='fa fa-eye'></i> detail</a>
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
          function ConfirmDelete(id, gambar) {
            let text = 'Apakah Anda Yakin Ingin Menghapus data!\n OK or Cancel.';
            if (confirm(text) == true) {
              text = 'You pressed OK!';
              window.location.href = '<?= $url ?>/aksi/pendaftaran_siswa.php?id_pendaftaran=' + id + '&action=delete&foto_siswa' + gambar
            }
          }
        </script>
      </div>
    </div>
</div>
<?php include_once '../template/footer.php'; ?>