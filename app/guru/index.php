<?php include_once '../template/header.php'; ?>
<?php include_once '../template/navbar.php'; ?>
<?php include_once '../template/sidebar.php'; ?>
<div class='content-wrapper'>
  <section class='content-header'>
    <h1>Guru page
    </h1>
    <ol class='breadcrumb'>
      <li><a href='#'><i class='fa fa-dashboard'></i> Index</a></li>
      <li class='active'>Guru page</li>
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
    <a class='btn btn-social-icon btn-info btn-sm' data-toggle='tooltip' data-placement='top' title='Tambah data guru' href='<?= $url ?>/app/guru/tambah.php'><i class='fa fa-plus'></i></a>
    <div class='row'>
      <div class='col-xs-12'>
        <div class='box'>
          <div class='box-header'>
            <h3 class='box-title'>Data Guru</h3>
          </div>
          <div class='box-body'>
            <table id='example1' class='table table-bordered table-striped'>
              <thead>
                <tr>
                       <th>NIP</th>
                       <th>ID USER</th>
                       <th>NAMA GURU</th>
                       <th>NO GURU</th>
                       <th>JENIS KELAMIN</th>
                       <th>ALAMAT GURU</th>
                       <th>FOTO GURU</th>
                       <th>AKSI</th>
                  </tr>
                </thead>
                <tbody>
                    <?php
                    foreach (QueryManyData('SELECT * FROM guru') as $row) {
                    ?>
                      <tr>
                        <td><?= $row['nip'] ?></td>
                        <td><?= $row['id_user'] ?></td>
                        <td><?= $row['nm_guru'] ?></td>
                        <td><?= $row['no_guru'] ?></td>
                        <td><?= $row['jk_guru'] ?></td>
                        <td><?= $row['alamat_guru'] ?></td>
                        <td><img src="<?= $url . "/foto/guru/" . $row['foto_guru'] ?> ?>" alt="" width="50" height="50"></td>
                        <td>
                          <a href='<?= $url ?>/app/guru/edit.php?id_guru=<?= $row['id_guru'] ?>' class='btn bg-olive btn-flat btn-xs'><i class='fa fa-edit'></i> edit</a>
                          <button onclick="ConfirmDelete(<?= $row['id_guru'] ?>)" class='btn bg-maroon btn-flat btn-xs'>
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
                window.location.href = '<?= $url ?>/aksi/guru.php?id_guru='+id+'&action=delete'
           } 
        }
    </script>
     </div>
    </div>    
</div>
<?php include_once '../template/footer.php'; ?>