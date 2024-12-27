<?php include_once '../template/header.php'; ?>
<?php include_once '../template/navbar.php'; ?>
<?php include_once '../template/sidebar.php'; ?>
<div class='content-wrapper'>
  <section class='content-header'>
    <h1>Siswa page</h1>
    <ol class='breadcrumb'>
      <li><a href='#'><i class='fa fa-dashboard'></i> Edit</a></li>
      <li class='active'>Siswa page</li>
    </ol>
  </section>
  <section class='content'>
    <div class='row'>
      <div class='col-xs-12'>
      <div class='box box-info'>
        <div class='box-header with-border text-center'>
          <h3 class='box-title'>Form Tambah Siswa</h3>
        </div>
        <form action='<?= $url ?>/aksi/siswa.php' method='post' enctype='multipart/form-data' class='form-horizontal'>
          <div class='box-body'>
            <div class='form-group'>
              <label for='inputnis' class='col-sm-2 col-form-label'>NIS</label>
              <div class='col-sm-10'>
                <?php 
                $sql_search_no = "SELECT siswa.id_siswa FROM `siswa` JOIN user ON siswa.id_user =  user.id_user
                                  JOIN pendaftaran_siswa ON pendaftaran_siswa.id_user =  user.id_user
                                  WHERE YEAR(pendaftaran_siswa.tgl_daftar) = ".date('Y')." ORDER BY siswa.id_siswa DESC";
                $no_sql = QueryOnedata($sql_search_no);
                $no = $no_sql->num_rows +1;
                if($no > 9){
                  $no = "0".$no_sql->num_rows +1;
                }else if($no < 10){
                  $no = "00".$no_sql->num_rows +1;
                }
                ?>
                <input type='text' class='form-control' id='inputnis' name='nis' value="<?= date('Y').($no) ?>" required>
              </div>
            </div>
            <div class='form-group'>
              <label for='inputid_user' class='col-sm-2 col-form-label'>ID User (Orang Tua / Wali Murid)</label>
              <div class='col-sm-10'>
                <select class='form-control' name='id_user' id='inputid_user' required>
                  <option >PILIH</option>
                  <?php
                  $query_user = 'SELECT user.* FROM user  WHERE user.level = "Orang Tua"';
                  $user = QueryManyData($query_user);
                  foreach ($user as  $row) {
                  ?>
                    <option value='<?= $row['id_user'] ?>'><?= $row['nm_pengguna'] ?></option>
                  <?php
                  }
                  ?>
                </select>
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
            <div class='form-group'>
              <label for='inputfoto_siswa' class='col-sm-2 col-form-label'>Foto Siswa</label>
              <div class='col-sm-10'>
                <input type='file' class='form-control' id='inputfoto_siswa' name='foto_siswa' accept=".jpg, .jpeg, .png" required>
              </div>
            </div>
          </div>
          <div class='box-footer'>
            <a href='<?= $url ?>/app/siswa/index.php' class='btn btn-default btn-sm '>
              <i class='fa fa-reply'></i> kembali
            </a>
            <button type='submit' name='simpansiswa' value='simpansiswa' class='btn btn-info pull-right'>
              <i class='fa fa-save'></i> SIMPAN
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>    
</div>
<script>
  $('#inputid_user').on('change', function(){
    let inputValue = $(this).val(); // Ambil nilai input
      // AJAX Request
      $.ajax({
        url: '<?= $url ?>/aksi/ajax.php', // Ganti dengan URL file server Anda
        method: 'POST',
        data: { id_user: inputValue },
        success: function(response) {
         document.getElementById("inputid_user").value = response.id_user;
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