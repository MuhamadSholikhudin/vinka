<?php 
include_once '../template/header.php';
include_once '../template/navbar.php'; 
include_once '../template/sidebar.php';
$periode = QueryOnedata('SELECT * FROM periode WHERE id_periode = ' . $_GET['id_periode'] . '')->fetch_assoc();
 ?>
<div class='content-wrapper'>
  <section class='content-header'>
    <h1>Periode page</h1>
    <ol class='breadcrumb'>
      <li><a href='#'><i class='fa fa-dashboard'></i> Edit</a></li>
      <li class='active'>Periode page</li>
    </ol>
  </section>
<section class='content'>
    <div class='row'>
      <div class='col-xs-12'>
      <div class='box box-info'>
        <div class='box-header with-border text-center'>
          <h3 class='box-title'>Form Edit Periode</h3>
        </div>
        <form action='<?= $url ?>/aksi/periode.php' method='post' enctype='multipart/form-data' class='form-horizontal'>
          <div class='box-body'>
                <div class='form-group' style='display:none;' >
                    <label for='inputid_periode' class='col-sm-2 col-form-label'>Id_Periode</label>
                    <div class='col-sm-10'>
                        <input type='number' class='form-control' id='inputid_periode' name='id_periode' value='<?= $periode['id_periode']; ?>'  required>
                    </div>
                  </div>
                <div class='form-group' >
                    <label for='inputnm_periode' class='col-sm-2 col-form-label'>Nm Periode</label>
                    <div class='col-sm-10'>
                        <input type='text' class='form-control' id='inputnm_periode' name='nm_periode' value='<?= $periode['nm_periode']; ?>'  required>
                    </div>
                  </div>
                <div class="form-group">
                    <label for="inputstatus_periode" class="col-sm-2 col-form-label">Status Periode</label>
                    <div class="col-sm-10">                        
                        <select class="form-control" name="status_periode" id="inputstatus_periode">
                            <?php
                           $status_periode =['Aktif','Non Aktif'];  
                            foreach($status_periode    as $val){
                              if($val == $periode['status_periode']){ ?>
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
            <a href='<?= $url ?>/app/periode/index.php' class='btn btn-default btn-sm '>
                 <i class='fa fa-reply'></i> kembali
              </a>
              <button type='submit' name='updateperiode' value='updateperiode' class='btn btn-info pull-right'>
                   <i class='fa fa-save'></i> UPDATE
              </button>
          </div>
        </form>
      </div>
    </div>
  </div>    
</div>
<?php include_once '../template/footer.php'; ?>