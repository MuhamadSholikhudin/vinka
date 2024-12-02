<?php 
include_once '../template/header.php';
include_once '../template/navbar.php'; 
include_once '../template/sidebar.php';
$plotting_jadwal = QueryOnedata('SELECT * FROM plotting_jadwal WHERE id_plotting = ' . $_GET['id_plotting'] . '')->fetch_assoc();
 ?>
<div class='content-wrapper'>
  <section class='content-header'>
    <h1>Plotting_Jadwal page</h1>
    <ol class='breadcrumb'>
      <li><a href='#'><i class='fa fa-dashboard'></i> Edit</a></li>
      <li class='active'>Plotting_Jadwal page</li>
    </ol>
  </section>
<section class='content'>
    <div class='row'>
      <div class='col-xs-12'>
      <div class='box box-info'>
        <div class='box-header with-border text-center'>
          <h3 class='box-title'>Form Edit Plotting Jadwal</h3>
        </div>
        <form action='<?= $url ?>/aksi/plotting_jadwal.php' method='post' enctype='multipart/form-data' class='form-horizontal'>
          <div class='box-body'>
                <div class='form-group' style='display:none;' >
                    <label for='inputid_plotting' class='col-sm-2 col-form-label'>Id_Plotting</label>
                    <div class='col-sm-10'>
                        <input type='number' class='form-control' id='inputid_plotting' name='id_plotting' value='<?= $plotting_jadwal['id_plotting']; ?>'  required>
                    </div>
                  </div>
                <div class='form-group'>
                    <label for='inputid_siswa' class='col-sm-2 col-form-label'>Id Siswa</label>
                    <div class='col-sm-10'>                         
                        <select class='form-control' name='id_siswa' id='inputid_siswa'>
                       <?php
                           $siswas = QueryManyData('SELECT * FROM siswa'); 
                             foreach($siswas  as  $row) {
                             if($plotting_jadwal['id_siswa'] ==  $row['id_siswa']       ){ ?>
                              <option value='<?= $row['id_siswa'] ?>' selected><?= $row['nis'] ?> | <?= $row['nm_siswa'] ?></option>
                            <?php }else{ ?>
                              <option value='<?= $row['id_siswa'] ?>' ><?= $row['nis'] ?> | <?= $row['nm_siswa'] ?></option>
                           <?php
                               }
                            }
                            ?>
                        </select>                        
                    </div>
                </div>
                <div class='form-group'>
                    <label for='inputid_kelas' class='col-sm-2 col-form-label'>Id Kelas</label>
                    <div class='col-sm-10'>                         
                        <select class='form-control' name='id_kelas' id='inputid_kelas'>
                       <?php
                           $kelass = QueryManyData('SELECT * FROM kelas'); 
                             foreach($kelass  as  $row) {
                             if($plotting_jadwal['id_kelas'] ==  $row['id_kelas']       ){ ?>
                              <option value='<?= $row['id_kelas'] ?>' required>Kelas <?= $row['nm_kelas'] ?> | Tingkatan <?= $row['tingkatan'] ?></option>
                            <?php }else{ ?>
                              <option value='<?= $row['id_kelas'] ?>'>Kelas <?= $row['nm_kelas'] ?> | Tingkatan <?= $row['tingkatan'] ?></option>
                           <?php
                               }
                            }
                            ?>
                        </select>                        
                    </div>
                </div>
                <div class='form-group'>
                    <label for='inputid_mapel' class='col-sm-2 col-form-label'>Mapel</label>
                    <div class='col-sm-10'>                         
                        <select class='form-control' name='id_mapel' id='inputid_mapel'>
                       <?php
                           $mapels = QueryManyData('SELECT * FROM mapel'); 
                             foreach($mapels  as  $row) {
                             if($plotting_jadwal['id_mapel'] ==  $row['id_mapel']       ){ ?>
                              <option value='<?= $row['id_mapel'] ?>' selected><?= $row['nm_mapel'] ?> | <?= $row['nm_guru'] ?></option>
                            <?php }else{ ?>
                                <option value='<?= $row['id_mapel'] ?>' ><?= $row['nm_mapel'] ?> | <?= $row['nm_guru'] ?></option>
                           <?php
                               }
                            }
                            ?>
                        </select>                        
                    </div>
                </div>
                <div class='form-group'>
                    <label for='inputid_periode' class='col-sm-2 col-form-label'>Periode</label>
                    <div class='col-sm-10'>                         
                        <select class='form-control' name='id_periode' id='inputid_periode'>
                       <?php
                           $periodes = QueryManyData('SELECT * FROM periode'); 
                             foreach($periodes  as  $row) {
                             if($plotting_jadwal['id_periode'] ==  $row['id_periode']       ){ ?>
                              <option value='<?= $row['id_periode'] ?>' selected><?= $row['nm_periode'] ?></option>
                            <?php }else{ ?>
                              <option value='<?= $row['id_periode'] ?>'><?= $row['nm_periode'] ?></option>
                           <?php
                               }
                            }
                            ?>
                        </select>                        
                    </div>
                </div>
                <div class='form-group' >
                    <label for='inputhari' class='col-sm-2 col-form-label'>Hari</label>
                    <div class='col-sm-10'>
                        <input type='text' class='form-control' id='inputhari' name='hari' value='<?= $plotting_jadwal['hari']; ?>'  required>
                    </div>
                  </div>
                <div class='form-group' >
                    <label for='inputjam_awal' class='col-sm-2 col-form-label'>Jam Awal</label>
                    <div class='col-sm-10'>
                        <input type='time' class='form-control' id='inputjam_awal' name='jam_awal' value='<?= $plotting_jadwal['jam_awal']; ?>'  required>
                    </div>
                  </div>
                <div class='form-group' >
                    <label for='inputjam_akhir' class='col-sm-2 col-form-label'>Jam Akhir</label>
                    <div class='col-sm-10'>
                        <input type='time' class='form-control' id='inputjam_akhir' name='jam_akhir' value='<?= $plotting_jadwal['jam_akhir']; ?>'  required>
                    </div>
                  </div>
           </div>
          <div class='box-footer'>
            <a href='<?= $url ?>/app/plotting_jadwal/index.php' class='btn btn-default btn-sm '>
                 <i class='fa fa-reply'></i> kembali
              </a>
              <button type='submit' name='updateplotting_jadwal' value='updateplotting_jadwal' class='btn btn-info pull-right'>
                   <i class='fa fa-save'></i> UPDATE
              </button>
          </div>
        </form>
      </div>
    </div>
  </div>    
</div>
<?php include_once '../template/footer.php'; ?>