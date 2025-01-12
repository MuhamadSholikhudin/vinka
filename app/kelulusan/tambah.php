<?php include_once '../template/header.php'; ?>
<?php include_once '../template/navbar.php'; ?>
<?php include_once '../template/sidebar.php'; ?>
<?php 
  $periode = QueryOnedata("SELECT * FROM periode WHERE id_periode = ".$_GET['id_periode']."")->fetch_assoc();
?>
<div class='content-wrapper'>
  <section class='content-header'>
    <h1>Kelulusan Siswa page</h1>
    <ol class='breadcrumb'>
      <li><a href='#'><i class='fa fa-dashboard'></i> Edit</a></li>
      <li class='active'>Kelulusan Siswa page</li>
    </ol>
  </section>
  <section class='content'>
    <div class='row'>
      <div class='col-xs-12'>
      <div class='box box-info'>
        <div class='box-header with-border text-center'>
          <h3 class='box-title'>Form Tambah Kelulusan Siswa Periode <?= $periode['nm_periode'] ?></h3>
        </div>
        <form action='<?= $url ?>/aksi/kelulusan.php' method='post' enctype='multipart/form-data' class='form-horizontal'>
          <div class='box-body'>
            <div class='form-group'>
              <label for='inputid_siswa' class='col-sm-2 col-form-label'>ID Siswa</label>
              <div class='col-sm-10'>
                <select class='form-control' name='id_siswa' id='inputid_siswa' required>
                  <option >PILIH</option>
                  <?php
                  $sis = 'SELECT * FROM siswa  WHERE status = "aktif" ORDER BY id_siswa ASC';
                  $siswa = QueryManyData($sis);
                  foreach ($siswa as  $row) {
                      ?>
                      <option value='<?= $row['id_siswa'] ?>'><?= $row['nis'] ?> | <?= $row['nm_siswa'] ?></option>
                    <?php
                  }
                  ?>
                </select>
                <input type='text' class='form-control' id='id_periode' style="display: none;" name='id_periode' value="<?= $_GET['id_periode'] ?>" required>
              </div>
            </div>
            <div class='form-group'>
              <label for='inputnm_siswa' class='col-sm-2 col-form-label'>Nama Siswa</label>
              <div class='col-sm-10'>
                <input type='text' class='form-control' id='inputnm_siswa' name='nm_siswa' required>
              </div>
            </div>
            <div class="form-group">
              <label for="inputjk_siswa" class="col-sm-2 col-form-label">Jenis Kelamin</label>
              <div class="col-sm-10">
                <select class="form-control" name="jk_siswa" id="inputjk_siswa">
                    <?php
                    $jk_siswa =['Laki-Laki','Perempuan'];  
                    foreach($jk_siswa    as $val){ ?>  
                        <option value="<?= $val ?>"><?= $val ?></option>
                    <?php
                    }
                    ?>
                </select>                        
              </div>
            </div>

            <div class='form-group'>
              <label for='inputalamat_siswa' class='col-sm-2 col-form-label'>Alamat Siswa</label>
              <div class='col-sm-10'>
                <textarea  class='form-control' id='inputalamat_siswa' name='alamat_siswa' required></textarea>
              </div>
            </div>
            <div class='form-group'>
              <label for='inputnm_orang_tua' class='col-sm-2 col-form-label'>Nama Orang Tua</label>
              <div class='col-sm-10'>
                <input type='text' class='form-control' id='inputnm_orang_tua' name='nm_orang_tua' required>
              </div>
            </div>
          </div>
          <div class='box-footer'>
            <a href='<?= $url ?>/app/kelulusan/index.php' class='btn btn-default btn-sm '>
              <i class='fa fa-reply'></i> kembali
            </a>
            <button type='submit' name='simpankelulusan' value='simpankelulusan' class='btn btn-info pull-right'>
              <i class='fa fa-save'></i> SIMPAN
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>    
</div>
<script>
  $('#inputid_siswa').on('change', function(){
    let inputValue = $(this).val(); // Ambil nilai input
      // AJAX Request
      $.ajax({
        url: '<?= $url ?>/aksi/ajax.php', // Ganti dengan URL file server Anda
        method: 'POST',
        data: { id_siswa: inputValue },
        success: function(response) {
         document.getElementById("inputid_siswa").value = response.id_siswa;
         document.getElementById("inputnm_siswa").value = response.nm_siswa;
         document.getElementById("inputjk_siswa").value = response.jk_siswa;
         document.getElementById("inputalamat_siswa").value = response.alamat_siswa;
         document.getElementById("inputnm_orang_tua").value = response.nm_orang_tua;
         document.getElementById("inputfoto_siswa").value = response.foto_siswa;
        },
        error: function(xhr, status, error) {
          alert("Terjadi kesalahan: " + error);
        }
      });
  });
</script>
<?php include_once '../template/footer.php'; ?>