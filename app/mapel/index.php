<?php include_once '../template/header.php'; ?>
<?php include_once '../template/navbar.php'; ?>
<?php include_once '../template/sidebar.php'; ?>
<div class='content-wrapper'>
  <section class='content-header'>
    <h1>Mapel page
    </h1>
    <ol class='breadcrumb'>
      <li><a href='#'><i class='fa fa-dashboard'></i> Index</a></li>
      <li class='active'>Mapel page</li>
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
    <a class='btn btn-social-icon btn-info' data-toggle='tooltip' data-placement='top' title='Tambah data mapel' href='<?= $url ?>/app/mapel/tambah.php'><i class='fa fa-plus'></i></a>
    <div class='row'>
      <div class='col-xs-12'>
        <div class='box'>
          <div class='box-header'>
            <h3 class='box-title'>Data Mapel</h3>
          </div>
          <div class='box-body'>
            <table id='example1' class='table table-bordered table-striped'>
              <thead>
                <tr>
                       <th>ID GURU</th>
                       <th>NM MAPE</th>
                       <th>AKSI</th>
                  </tr>
                </thead>
                <tbody>
                    <?php
                    foreach (QueryManyData('SELECT * FROM mapel') as $row) {
                    ?>
                        <tr>
                       <td><?= $row['id_guru'] ?></td>
                       <td><?= $row['nm_mape'] ?></td>
                       <td>
                              <a href='<?= $url ?>/app/mapel/edit.php?id_mapel=<?= $row['id_mapel'] ?>' class='btn bg-olive btn-flat btn-sm'><i class='fa fa-edit'></i> edit</a>
                              <button onclick='ConfirmDelete(<?= $row['id_mapel'] ?>)' class='btn bg-maroon btn-flat btn-sm'>
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
                window.location.href = '<?= $url ?>/aksi/mapel.php?id_mapel='+id+'&action=delete'
           } 
        }
    </script>
     </div>
    </div>    
</div>
<?php include_once '../template/footer.php'; ?>