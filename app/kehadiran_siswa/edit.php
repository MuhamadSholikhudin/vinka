<?php 
include_once '../template/header.php';
include_once '../template/navbar.php'; 
include_once '../template/sidebar.php';
$kehadiran_siswa = QueryOnedata('SELECT * FROM kehadiran_siswa WHERE id_kehadiran = ' . $_GET['id_kehadiran'] . '')->fetch_assoc();
 ?>
<div class='content-wrapper'>
  <section class='content-header'>
    <h1>Kehadiran Siswa page</h1>
    <ol class='breadcrumb'>
      <li><a href='#'><i class='fa fa-dashboard'></i> Edit</a></li>
      <li class='active'>Kehadiran Siswa page</li>
    </ol>
  </section>
<section class='content'>
    <div class='row'>
      <div class='col-xs-12'>
      <div class='box box-info'>
        <div class='box-header with-border text-center'>
          <h3 class='box-title'>Form Edit Kehadiran Siswa</h3>
        </div>
        <form action='<?= $url ?>/aksi/kehadiran_siswa.php' method='post' enctype='multipart/form-data' class='form-horizontal'>
          <div class='box-body'>
                <div class='form-group' style='display:none;' >
                    <label for='inputid_kehadiran' class='col-sm-2 col-form-label'>Id_Kehadiran</label>
                    <div class='col-sm-10'>
                        <input type='number' class='form-control' id='inputid_kehadiran' name='id_kehadiran' value='<?= $kehadiran_siswa['id_kehadiran']; ?>'  required>
                    </div>
                  </div>
                <div class='form-group'>
                    <label for='inputid_plotting' class='col-sm-2 col-form-label'>Id Plotting</label>
                    <div class='col-sm-10'>                         
                        <select class='form-control' name='id_plotting' id='inputid_plotting'>
                       <?php
                           $plottings = QueryManyData('SELECT * FROM plotting'); 
                             foreach($plottings  as  $row) {
                             if($kehadiran_siswa['id_plotting'] ==  $row['id_plotting']       ){ ?>
                              <option value='<?= $row['id_plotting'] ?>' selected><?= $row['id_plotting'] ?></option>
                            <?php }else{ ?>
                              <option value='<?= $row['id_plotting'] ?>'><?= $row['id_plotting'] ?></option>
                           <?php
                               }
                            }
                            ?>
                        </select>                        
                    </div>
                </div>
                <div class='form-group' >
                    <label for='inputtgl_kehadiran' class='col-sm-2 col-form-label'>Tgl Kehadiran</label>
                    <div class='col-sm-10'>
                        <input type='date' class='form-control' id='inputtgl_kehadiran' name='tgl_kehadiran' value='<?= $kehadiran_siswa['tgl_kehadiran']; ?>'  required>
                    </div>
                  </div>
                <div class="form-group">
                    <label for="inputjenis_kehadiran" class="col-sm-2 col-form-label">Jenis Kehadiran</label>
                    <div class="col-sm-10">                        
                        <select class="form-control" name="jenis_kehadiran" id="inputjenis_kehadiran">
                            <?php
                           $jenis_kehadiran =['Masuk','Alfa','Izin'];  
                            foreach($jenis_kehadiran    as $val){
                              if($val == $kehadiran_siswa['jenis_kehadiran']){ ?>
                                 <option value='<?= $val ?>' selected><?= $val ?></option>
                              <?php }else{ ?>
                                <option value="<?= $val ?>"><?= $val ?></option>
                            <?php
                                }
                            }
                            ?>
                        </select>                        
                    </div>
                </div>
           </div>
          <div class='box-footer'>
            <a href='<?= $url ?>/app/kehadiran_siswa/index.php' class='btn btn-default btn-sm '>
                 <i class='fa fa-reply'></i> kembali
              </a>
              <button type='submit' name='updatekehadiran_siswa' value='updatekehadiran_siswa' class='btn btn-info pull-right'>
                   <i class='fa fa-save'></i> UPDATE
              </button>
          </div>
        </form>
      </div>
    </div>
  </div>    
</div>
<?php include_once '../template/footer.php'; ?>