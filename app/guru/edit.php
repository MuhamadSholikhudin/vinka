<?php
include_once '../template/header.php';
include_once '../template/navbar.php';
include_once '../template/sidebar.php';
$guru = QueryOnedata('SELECT * FROM guru WHERE id_guru = ' . $_GET['id_guru'] . '')->fetch_assoc();
?>
<div class='content-wrapper'>
  <section class='content-header'>
    <h1>Guru page</h1>
    <ol class='breadcrumb'>
      <li><a href='#'><i class='fa fa-dashboard'></i> Edit</a></li>
      <li class='active'>Guru page</li>
    </ol>
  </section>
  <section class='content'>
    <div class='row'>
      <div class='col-xs-12'>
        <div class='box box-info'>
          <div class='box-header with-border text-center'>
            <h3 class='box-title'>Form Edit Guru</h3>
          </div>
          <form action='<?= $url ?>/aksi/guru.php' method='post' enctype='multipart/form-data' class='form-horizontal'>
            <div class='box-body'>
              <div class='form-group' style='display:none;'>
                <label for='inputid_guru' class='col-sm-2 col-form-label'>Id_Guru</label>
                <div class='col-sm-10'>
                  <input type='number' class='form-control' id='inputid_guru' name='id_guru' value='<?= $guru['id_guru']; ?>' required>
                </div>
              </div>
              <div class='form-group'>
                <label for='inputnip' class='col-sm-2 col-form-label'>Nip</label>
                <div class='col-sm-10'>
                  <input type='text' class='form-control' id='inputnip' name='nip' value='<?= $guru['nip']; ?>' required>
                </div>
              </div>
              <div class='form-group'>
                <label for='inputid_user' class='col-sm-2 col-form-label'>Id User</label>
                <div class='col-sm-10'>
                  <select class='form-control' name='id_user' id='inputid_user'>
                    <?php
                    $users = QueryManyData('SELECT * FROM user');
                    foreach ($users  as  $row) {
                      if ($guru['id_user'] ==  $row['id_user']) { ?>
                        <option value='<?= $row['id_user'] ?>' selected><?= $row['nm_pengguna'] ?></option>
                      <?php } else { ?>
                        <option value='<?= $row['id_user'] ?>'><?= $row['nm_pengguna'] ?></option>
                    <?php
                      }
                    }
                    ?>
                  </select>
                </div>
              </div>
              <div class='form-group'>
                <label for='inputnm_guru' class='col-sm-2 col-form-label'>Nama Guru</label>
                <div class='col-sm-10'>
                  <input type='text' class='form-control' id='inputnm_guru' name='nm_guru' value='<?= $guru['nm_guru']; ?>' required>
                </div>
              </div>
              <div class='form-group'>
                <label for='inputno_guru' class='col-sm-2 col-form-label'>No Guru</label>
                <div class='col-sm-10'>
                  <input type='text' class='form-control' id='inputno_guru' name='no_guru' value='<?= $guru['no_guru']; ?>' required>
                </div>
              </div>
              <div class="form-group">
                <label for="inputjk_guru" class="col-sm-2 col-form-label">Jk Guru</label>
                <div class="col-sm-10">
                  <select class="form-control" name="jk_guru" id="inputjk_guru">
                    <?php
                    $jk_guru = ['Laki-Laki', 'Perempuan'];
                    foreach ($jk_guru    as $val) {
                      if ($val == $guru['jk_guru']) { ?>
                        <option value='<?= $val ?>' selected><?= $val ?></option>
                      <?php } else { ?>
                        <option value="<?= $val ?>"><?= $val ?></option>
                    <?php
                      }
                    }
                    ?>
                  </select>
                </div>
              </div>
              <div class='form-group'>
                <label for='inputalamat_guru' class='col-sm-2 col-form-label'>Alamat Guru</label>
                <div class='col-sm-10'>
                  <textarea class='form-control' id='inputalamat_guru' name='alamat_guru' required><?= $guru['alamat_guru'] ?></textarea>
                </div>
              </div>
              <div class='form-group'>
                <label for='inputfoto_guru' class='col-sm-2 col-form-label'>Foto Guru</label>
                <div class='col-sm-10'>
                  <img src="<?= $url."/foto/guru/". $guru['foto_guru']; ?>" alt="<?= $url."/foto/guru/". $guru['foto_guru']; ?>" width="100%">
                  <input type='file' class='form-control' id='inputfoto_guru' name='foto_guru' value='<?= $guru['foto_guru']; ?>'>
                  <input type='hidden' class='form-control' id='inputfoto_guru_old' name='foto_guru_old' value='<?= $guru['foto_guru']; ?>'>
                </div>
              </div>
            </div>
            <div class='box-footer'>
              <a href='<?= $url ?>/app/guru/index.php' class='btn btn-default btn-sm '>
                <i class='fa fa-reply'></i> kembali
              </a>
              <button type='submit' name='updateguru' value='updateguru' class='btn btn-info pull-right'>
                <i class='fa fa-save'></i> UPDATE
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
</div>
<?php include_once '../template/footer.php'; ?>