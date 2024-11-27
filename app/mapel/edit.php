<?php 
include_once '../template/header.php';
include_once '../template/navbar.php'; 
include_once '../template/sidebar.php';
$mapel = QueryOnedata('SELECT * FROM mapel WHERE id_mapel = ' . $_GET['id_mapel'] . '')->fetch_assoc();
 ?>
<div class='content-wrapper'>
  <section class='content-header'>
    <h1>Mapel page</h1>
    <ol class='breadcrumb'>
      <li><a href='#'><i class='fa fa-dashboard'></i> Edit</a></li>
      <li class='active'>Mapel page</li>
    </ol>
  </section>
<section class='content'>
    <div class='row'>
      <div class='col-xs-12'>
      <div class='box box-info'>
        <div class='box-header with-border text-center'>
          <h3 class='box-title'>Form Edit Mapel</h3>
        </div>
        <form action='<?= $url ?>/aksi/mapel.php' method='post' enctype='multipart/form-data' class='form-horizontal'>
          <div class='box-body'>
                <div class='form-group' style='display:none;' >
                    <label for='inputid_mapel' class='col-sm-2 col-form-label'>Id_Mapel</label>
                    <div class='col-sm-10'>
                        <input type='number' class='form-control' id='inputid_mapel' name='id_mapel' value='<?= $mapel['id_mapel']; ?>'  required>
                    </div>
                  </div>
                <div class='form-group'>
                    <label for='inputid_guru' class='col-sm-2 col-form-label'>Id Guru</label>
                    <div class='col-sm-10'>                         
                        <select class='form-control' name='id_guru' id='inputid_guru'>
                       <?php
                           $gurus = QueryManyData('SELECT * FROM guru'); 
                             foreach($gurus  as  $row) {
                             if($mapel['id_guru'] ==  $row['id_guru']       ){ ?>
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
                    <label for='inputnm_mape' class='col-sm-2 col-form-label'>Nm Mape</label>
                    <div class='col-sm-10'>
                        <input type='text' class='form-control' id='inputnm_mape' name='nm_mape' value='<?= $mapel['nm_mape']; ?>'  required>
                    </div>
                  </div>
           </div>
          <div class='box-footer'>
            <a href='<?= $url ?>/app/mapel/index.php' class='btn btn-default btn-sm '>
                 <i class='fa fa-reply'></i> kembali
              </a>
              <button type='submit' name='updatemapel' value='updatemapel' class='btn btn-info pull-right'>
                   <i class='fa fa-save'></i> UPDATE
              </button>
          </div>
        </form>
      </div>
    </div>
  </div>    
</div>
<?php include_once '../template/footer.php'; ?>