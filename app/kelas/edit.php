<?php 
include_once '../template/header.php';
include_once '../template/navbar.php'; 
include_once '../template/sidebar.php';
$kelas = QueryOnedata('SELECT * FROM kelas WHERE id_kelas = ' . $_GET['id_kelas'] . '')->fetch_assoc();
 ?>
<div class='content-wrapper'>
  <section class='content-header'>
    <h1>Kelas page</h1>
    <ol class='breadcrumb'>
      <li><a href='#'><i class='fa fa-dashboard'></i> Edit</a></li>
      <li class='active'>Kelas page</li>
    </ol>
  </section>
<section class='content'>
    <div class='row'>
      <div class='col-xs-12'>
      <div class='box box-info'>
        <div class='box-header with-border text-center'>
          <h3 class='box-title'>Form Edit Kelas</h3>
        </div>
        <form action='<?= $url ?>/aksi/kelas.php' method='post' enctype='multipart/form-data' class='form-horizontal'>
          <div class='box-body'>
                <div class='form-group' style='display:none;' >
                    <label for='inputid_kelas' class='col-sm-2 col-form-label'>Id_Kelas</label>
                    <div class='col-sm-10'>
                        <input type='number' class='form-control' id='inputid_kelas' name='id_kelas' value='<?= $kelas['id_kelas']; ?>'  required>
                    </div>
                  </div>
                <div class='form-group'>
                    <label for='inputid_guru' class='col-sm-2 col-form-label'>Id Guru</label>
                    <div class='col-sm-10'>                         
                        <select class='form-control' name='id_guru' id='inputid_guru'>
                       <?php
                           $gurus = QueryManyData('SELECT * FROM guru'); 
                             foreach($gurus  as  $row) {
                             if($kelas['id_guru'] ==  $row['id_guru']       ){ ?>
                              <option value='<?= $row['id_guru'] ?>' selected><?= $row['id_guru'] ?></option>
                            <?php }else{ ?>
                              <option value='<?= $row['id_guru'] ?>'><?= $row['id_guru'] ?></option>
                           <?php
                               }
                            }
                            ?>
                        </select>                        
                    </div>
                </div>
                <div class='form-group' >
                    <label for='inputnm_kelas' class='col-sm-2 col-form-label'>Nm Kelas</label>
                    <div class='col-sm-10'>
                        <input type='text' class='form-control' id='inputnm_kelas' name='nm_kelas' value='<?= $kelas['nm_kelas']; ?>'  required>
                    </div>
                  </div>
                <div class='form-group' >
                    <label for='inputtingkatan' class='col-sm-2 col-form-label'>Tingkatan</label>
                    <div class='col-sm-10'>
                        <input type='number' class='form-control' id='inputtingkatan' name='tingkatan' value='<?= $kelas['tingkatan']; ?>'  required>
                    </div>
                  </div>
           </div>
          <div class='box-footer'>
            <a href='<?= $url ?>/app/kelas/index.php' class='btn btn-default btn-sm '>
                 <i class='fa fa-reply'></i> kembali
              </a>
              <button type='submit' name='updatekelas' value='updatekelas' class='btn btn-info pull-right'>
                   <i class='fa fa-save'></i> UPDATE
              </button>
          </div>
        </form>
      </div>
    </div>
  </div>    
</div>
<?php include_once '../template/footer.php'; ?>