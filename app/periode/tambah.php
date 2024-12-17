<?php include_once '../template/header.php'; ?>
<?php include_once '../template/navbar.php'; ?>
<?php include_once '../template/sidebar.php'; ?>
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
          <h3 class='box-title'>Form Tambah Periode</h3>
        </div>
        <form action='<?= $url ?>/aksi/periode.php' method='post' enctype='multipart/form-data' class='form-horizontal'>
          <div class='box-body'>
             <div class='form-group'>
                    <label for='inputnm_periode' class='col-sm-2 col-form-label'>Nama Periode</label>
                    <div class='col-sm-10'>
                        <input type='text' class='form-control' id='inputnm_periode' name='nm_periode' required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputstatus_periode" class="col-sm-2 col-form-label">Status Periode</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="status_periode" id="inputstatus_periode">
                            <?php
                           $status_periode =['Aktif','Non Aktif'];  
                            foreach($status_periode    as $val){ ?>  
                                <option value="<?= $val ?>"><?= $val ?></option>
                            <?php
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
          <button type='submit' name='simpanperiode' value='simpanperiode' class='btn btn-info pull-right'>
              <i class='fa fa-save'></i> SIMPAN
          </button>
          </div>
        </form>
      </div>
    </div>
  </div>    
</div>
<?php include_once '../template/footer.php'; ?>