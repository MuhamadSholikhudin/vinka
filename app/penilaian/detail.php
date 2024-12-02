<?php
include_once '../template/header.php';
include_once '../template/navbar.php';
include_once '../template/sidebar.php';
$penilaian = QueryOnedata('SELECT * FROM penilaian WHERE id_penilaian = ' . $_GET['id_penilaian'] . '')->fetch_assoc();
?>
<div class='content-wrapper'>
  <section class='content-header'>
    <h1>Penilaian page</h1>
    <ol class='breadcrumb'>
      <li><a href='#'><i class='fa fa-dashboard'></i> Detail</a></li>
      <li class='active'>Penilaian page</li>
    </ol>
  </section>
  <section class='content'>
    <div class='row'>
      <div class='col-xs-12'>
        <div class='box box-info'>
          <div class='box-header with-border text-center'>
            <h3 class='box-title'>Form Detail Penilaian</h3>
          </div>
          <form action='<?= $url ?>/aksi/penilaian.php' method='post' enctype='multipart/form-data' class='form-horizontal'>
            <div class='box-body'>
              <div class='form-group'>
              <div class='form-group' style='display:none;'>
                <label for='inputid_penilaian' class='col-sm-2 col-form-label'>Id_Kehadiran</label>
                <div class='col-sm-10'>
                  <input type='number' class='form-control' id='inputid_penilaian' name='id_penilaian' value='<?= $penilaian['id_penilaian']; ?>' required>
                </div>
              </div>
                <label for='inputid_plotting' class='col-sm-3 col-form-label'>Plotting Jadwal</label>
                <div class='col-sm-9'>
                  <?php
                  $query_plotting = 'SELECT plotting_jadwal.*, mapel.nm_mapel, kelas.nm_kelas, siswa.nm_siswa FROM plotting_jadwal
                                      LEFT JOIN mapel ON plotting_jadwal.id_mapel = mapel.id_mapel
                                      LEFT JOIN siswa ON plotting_jadwal.id_siswa = siswa.id_siswa
                                      LEFT JOIN kelas ON plotting_jadwal.id_kelas = kelas.id_kelas
                                      LEFT JOIN periode ON plotting_jadwal.id_periode = periode.id_periode
                                      WHERE periode.status_periode = "Aktif"
                                      ';
                  ?>
                  <select class='form-control' name='id_plotting' id='inputid_plotting'>
                    <?php
                    foreach (QueryManyData($query_plotting) as  $row) {
                      if($row['id_plotting'] == $penilaian['id_plotting']){
                    ?>
                      <option value='<?= $row['id_plotting'] ?>' selected ><?= $row['hari'] . " | " . $row['jam_awal'] . " | " . $row['jam_akhir'] . " | " . $row['nm_mapel'] . " | " . $row['nm_kelas'] . " | " . $row['nm_siswa'] ?></option>
                    <?php
                    }else{
                    ?>
                      <option value='<?= $row['id_plotting'] ?>'><?= $row['hari'] . " | " . $row['jam_awal'] . " | " . $row['jam_akhir'] . " | " . $row['nm_mapel'] . " | " . $row['nm_kelas'] . " | " . $row['nm_siswa'] ?></option>
                    <?php

                    }
                  }
                    ?>
                  </select>
                </div>
              </div>
              <div class='form-group'>
                <label for='inputjenis_penilaian' class='col-sm-3 col-form-label'>Jenis Penilaian</label>
                <div class='col-sm-9'>
                  <input type='text' class='form-control' id='inputjenis_penilaian' name='jenis_penilaian' value="<?= $penilaian['jenis_penilaian'] ?>" required>
                </div>
              </div>
              <div class="form-group">
                <label for="inputnilai" class="col-sm-3 col-form-label">Nilai</label>
                <div class="col-sm-9">
                  <input type='number' class='form-control' id='inputnilai' name='nilai' value="<?= $penilaian['nilai'] ?>" required>
                </div>
              </div>
              <div class="form-group">
                <label for="inputnilai_praktek" class="col-sm-3 col-form-label">Nilai Praktek</label>
                <div class="col-sm-9">
                  <input type='number' class='form-control' id='inputnilai_praktek' name='nilai_praktek' value="<?= $penilaian['nilai_praktek'] ?>" required>
                </div>
              </div>
            </div>
            <div class='box-footer'>
              <a href='<?= $url ?>/app/penilaian/index.php' class='btn btn-default btn-sm '>
                <i class='fa fa-reply'></i> kembali
              </a>
            </div>
          </form>
        </div>
      </div>
    </div>
</div>
<?php include_once '../template/footer.php'; ?>