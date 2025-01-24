<?php include_once '../template/header.php'; ?>
<?php include_once '../template/navbar.php'; ?>
<?php include_once '../template/sidebar.php'; ?>
<div class='content-wrapper'>
  <section class='content-header'>
    <h1>Dahboard page
    </h1>
    <ol class='breadcrumb'>
      <li><a href='#'><i class='fa fa-dashboard'></i> Index</a></li>
      <li class='active'>Dahboard page</li>
    </ol>
  </section>
  <section class='content'>

    <?php if ($_SESSION['level'] == 'Kepala Sekolah') { ?>
      <div class="col-lg-2 col-xs-6">
        <div class="small-box bg-yellow">
          <div class="inner">
            <h3><?= QueryOnedata("SELECT * FROM user")->num_rows ?></h3>
            <p>User</p>
          </div>
          <div class="icon">
            <i class="ion ion-person"></i>
          </div>
          <a href="http://localhost/vinka/app/user/index.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>

      <div class="col-lg-2 col-xs-6">
        <div class="small-box bg-yellow">
          <div class="inner">
            <h3><?= QueryOnedata("SELECT * FROM siswa WHERE status = 'aktif' ")->num_rows ?></h3>
            <p>Siswa Aktif</p>
          </div>
          <div class="icon">
            <i class="ion ion-person"></i>
          </div>
          <a href="http://localhost/vinka/app/user/index.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>

      <div class="col-lg-2 col-xs-6">
        <div class="small-box bg-yellow">
          <div class="inner">
            <h3><?= QueryOnedata("SELECT * FROM siswa WHERE status = 'lulus'")->num_rows ?></h3>
            <p>Siswa Lulus</p>
          </div>
          <div class="icon">
            <i class="ion ion-person"></i>
          </div>
          <a href="http://localhost/vinka/app/siswa/index.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>

      <div class="col-lg-2 col-xs-6">
        <div class="small-box bg-yellow">
          <div class="inner">
            <h3><?= QueryOnedata("SELECT * FROM kelas ")->num_rows ?></h3>
            <p>Kelas</p>
          </div>
          <div class="icon">
            <i class="ion ion-person"></i>
          </div>
          <a href="http://localhost/vinka/app/kelas/index.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>

      <div class="col-lg-2 col-xs-6">
        <div class="small-box bg-yellow">
          <div class="inner">
            <h3><?= QueryOnedata("SELECT * FROM pendaftaran_siswa ")->num_rows ?></h3>
            <p>Pendaftaran</p>
          </div>
          <div class="icon">
            <i class="ion ion-person"></i>
          </div>
          <a href="http://localhost/vinka/app/pendaftaran_siswa/index.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>

      <div class="col-lg-2 col-xs-6">
        <div class="small-box bg-yellow">
          <div class="inner">
            <h3><?= QueryOnedata("SELECT * FROM informasi_sekolah ")->num_rows ?></h3>
            <p>Informasi Sekolah</p>
          </div>
          <div class="icon">
            <i class="ion ion-person"></i>
          </div>
          <a href="http://localhost/vinka/app/informasi_sekolah/index.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <div class="col-lg-2 col-xs-6">
        <div class="small-box bg-yellow">
          <div class="inner">
            <h3><?= QueryOnedata("SELECT * FROM guru ")->num_rows ?></h3>
            <p>Guru</p>
          </div>
          <div class="icon">
            <i class="ion ion-person"></i>
          </div>
          <a href="http://localhost/vinka/app/guru/index.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
    <?php } ?>

    <?php if ($_SESSION['level'] == 'Seksi Kurikulum') { ?>
      <div class="col-lg-2 col-xs-6">
        <div class="small-box bg-yellow">
          <div class="inner">
            <h3><?= QueryOnedata("SELECT * FROM periode")->num_rows ?></h3>
            <p>Periode</p>
          </div>
          <div class="icon">
            <i class="ion ion-person"></i>
          </div>
          <a href="http://localhost/vinka/app/periode/index.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <div class="col-lg-2 col-xs-6">
        <div class="small-box bg-yellow">
          <div class="inner">
            <h3><?= QueryOnedata("SELECT * FROM periode")->num_rows ?></h3>
            <p>Periode</p>
          </div>
          <div class="icon">
            <i class="ion ion-person"></i>
          </div>
          <a href="http://localhost/vinka/app/periode/index.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <div class="col-lg-2 col-xs-6">
        <div class="small-box bg-yellow">
          <div class="inner">
            <h3><?= QueryOnedata("SELECT * FROM guru")->num_rows ?></h3>
            <p>Guru</p>
          </div>
          <div class="icon">
            <i class="ion ion-person"></i>
          </div>
          <a href="http://localhost/vinka/app/guru/index.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <div class="col-lg-2 col-xs-6">
        <div class="small-box bg-yellow">
          <div class="inner">
            <h3><?= QueryOnedata("SELECT * FROM siswa")->num_rows ?></h3>
            <p>Siswa</p>
          </div>
          <div class="icon">
            <i class="ion ion-person"></i>
          </div>
          <a href="http://localhost/vinka/app/siswa/index.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <div class="col-lg-2 col-xs-6">
        <div class="small-box bg-yellow">
          <div class="inner">
            <h3><?= QueryOnedata("SELECT * FROM mapel")->num_rows ?></h3>
            <p>Mapel</p>
          </div>
          <div class="icon">
            <i class="ion ion-person"></i>
          </div>
          <a href="http://localhost/vinka/app/mapel/index.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <div class="col-lg-2 col-xs-6">
        <div class="small-box bg-yellow">
          <div class="inner">
            <h3><?= QueryOnedata("SELECT * FROM kelulusan")->num_rows ?></h3>
            <p>Kelulusan</p>
          </div>
          <div class="icon">
            <i class="ion ion-person"></i>
          </div>
          <a href="http://localhost/vinka/app/kelulusan/index.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
    <?php } ?>


    <?php if ($_SESSION['level'] == 'Seksi Tata Usaha') { ?>
      <div class="col-lg-2 col-xs-6">
        <div class="small-box bg-yellow">
          <div class="inner">
            <h3><?= QueryOnedata("SELECT * FROM pendaftaran_siswa")->num_rows ?></h3>
            <p>Pendaftar</p>
          </div>
          <div class="icon">
            <i class="ion ion-person"></i>
          </div>
          <a href="http://localhost/vinka/app/pendaftaran_siswa/index.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <div class="col-lg-2 col-xs-6">
        <div class="small-box bg-yellow">
          <div class="inner">
            <h3><?= QueryOnedata("SELECT * FROM pendaftaran_siswa WHERE status_pendaftaran = 'data di terima' ")->num_rows ?></h3>
            <p>Pendaftar di terima</p>
          </div>
          <div class="icon">
            <i class="ion ion-person"></i>
          </div>
          <a href="http://localhost/vinka/app/pendaftaran_siswa/index.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
    <?php } ?>


    <?php if ($_SESSION['level'] == 'Guru') { ?>
      <?php if (QueryOnedata("SELECT * FROM guru WHERE id_user = " . $_SESSION['id_user'] . "")->num_rows > 0) {
      ?>
        <div class="col-lg-2 col-xs-6">
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><?= QueryOnedata("SELECT * FROM mapel WHERE id_guru = " . QueryOnedata("SELECT * FROM guru WHERE id_user = " . $_SESSION['id_user'] . "")->fetch_assoc()['id_guru'] . "")->num_rows ?></h3>
              <p>Mapel di ajar</p>
            </div>
            <div class="icon">
              <i class="ion ion-person"></i>
            </div>
            <a href="http://localhost/vinka/app/penilaian/index.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
      <?php
      } ?>
    <?php } ?>


  </section>
</div>
<?php include_once '../template/footer.php'; ?>