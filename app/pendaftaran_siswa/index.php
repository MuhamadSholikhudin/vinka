<?php include_once '../template/header.php'; ?>
<?php include_once '../template/navbar.php'; ?>
<?php include_once '../template/sidebar.php'; ?>
<div class='content-wrapper'>
  <section class='content-header'>
    <h1>Pendaftaran_Siswa page
    </h1>
    <ol class='breadcrumb'>
      <li><a href='#'><i class='fa fa-dashboard'></i> Index</a></li>
      <li class='active'>Pendaftaran Siswa page</li>
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
    <a class='btn btn-social-icon btn-info' data-toggle='tooltip' data-placement='top' title='Tambah data pendaftaran_siswa' href='<?= $url ?>/app/pendaftaran_siswa/tambah.php'><i class='fa fa-plus'></i></a>
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
                  <th>NAMA ORANG TUA</th>
                  <th>FOTO SISWA</th>
                  <th>AKSI</th>
                </tr>
                </thead>
                <tbody>
                    <?php
                    foreach (QueryManyData('SELECT * FROM pendaftaran_siswa') as $row) {
                      $periode = QueryOnedata("SELECT * FROM periode WHERE id_periode = ".$row['id_periode']."")->fetch_assoc();
                      $user = QueryOnedata("SELECT * FROM user WHERE id_user = ".$row['id_user']."")->fetch_assoc();
                    ?>
                        <tr>
                       <td><?= $periode['nm_periode'] ?></td>
                       <td><?= $user['username'] ?></td>
                       <td><?= $row['tgl_daftar'] ?></td>
                       <td><?= $row['nm_siswa'] ?></td>
                       <td><?= $row['jk_siswa'] ?></td>
                       <td><?= $row['alamat_siswa'] ?></td>
                       <td><?= $row['nm_orang_tua'] ?></td>
                       <td> <img src="<?= $url.'/foto/foto_siswa/'.$row['foto_siswa']; ?>" alt="" srcset="" style="width: 50px; height:50px;"> </td>
                       <td>
                              <a href='<?= $url ?>/app/pendaftaran_siswa/edit.php?id_pendaftaran=<?= $row['id_pendaftaran'] ?>' class='btn bg-olive btn-flat btn-sm'><i class='fa fa-edit'></i> edit</a>
                              <button onclick="ConfirmDelete(<?= $row['id_pendaftaran'] ?>, '<?= $row['foto_siswa'] ?>')" class='btn bg-maroon btn-flat btn-sm'>
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
        function ConfirmDelete(id, gambar) {
            let text = 'Apakah Anda Yakin Ingin Menghapus data!\n OK or Cancel.';
            if (confirm(text) == true) {
                text = 'You pressed OK!';
                window.location.href = '<?= $url ?>/aksi/pendaftaran_siswa.php?id_pendaftaran='+id+'&action=delete&foto_siswa'+gambar
           } 
        }
    </script>
     </div>
    </div>    
</div>
<?php include_once '../template/footer.php'; ?>