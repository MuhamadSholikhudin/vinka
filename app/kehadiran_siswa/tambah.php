<?php include_once '../template/header.php'; ?>
<?php include_once '../template/navbar.php'; ?>
<?php include_once '../template/sidebar.php'; ?>
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
      <div class='col-xs-6'>
        <div class='box box-info'>
          <div class='box-header with-border text-center'>
            <h3 class='box-title'>Form Tambah Kehadiran Siswa</h3>
          </div>
          <form action='<?= $url ?>/aksi/kehadiran_siswa.php' method='post' enctype='multipart/form-data' class='form-horizontal'>
            <div class='box-body'>
              <div class='form-group'>
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
                  if($_SESSION['level'] == 'Guru'){
                    $guru = QueryOnedata('SELECT * FROM guru WHERE id_user = '.$_SESSION['id_user'].'')->fetch_assoc();
                    $query_plotting = $query_plotting.' AND mapel.id_guru = '.$guru['id_guru'].'
                                      ';
                  }
                  ?>
                  <select class='form-control' name='id_plotting' id='inputid_plotting'>
                    <?php
                    foreach (QueryManyData($query_plotting) as  $row) {
                    ?>
                      <option value='<?= $row['id_plotting'] ?>'><?= $row['hari'] . " | " . $row['jam_awal'] . " | " . $row['jam_akhir'] . " | " . $row['nm_mapel'] . " | " . $row['nm_kelas'] . " | " . $row['nm_siswa'] ?></option>
                    <?php
                    }
                    ?>
                  </select>
                </div>
              </div>
              <div class='form-group'>
                <label for='inputtgl_kehadiran' class='col-sm-3 col-form-label'>Tanggal Kehadiran</label>
                <div class='col-sm-9'>
                  <input type='date' class='form-control' id='inputtgl_kehadiran' name='tgl_kehadiran' value="<?= date("Y-m-d") ?>" required>
                </div>
              </div>
              <div class="form-group">
                <label for="inputjenis_kehadiran" class="col-sm-3 col-form-label">Jenis Kehadiran</label>
                <div class="col-sm-9">
                  <select class="form-control" name="jenis_kehadiran" id="inputjenis_kehadiran">
                    <?php
                    $jenis_kehadiran = ['Masuk', 'Alfa', 'Izin'];
                    foreach ($jenis_kehadiran    as $val) { ?>
                      <option value="<?= $val ?>"><?= $val ?></option>
                    <?php
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
              <button type='submit' name='simpankehadiran_siswa' value='simpankehadiran_siswa' class='btn btn-info pull-right'>
                <i class='fa fa-save'></i> SIMPAN
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
</div>
<?php include_once '../template/footer.php'; ?>