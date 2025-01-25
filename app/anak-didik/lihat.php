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
        <?php if (isset($_SESSION['message'])) {
            if ($_SESSION['message_code'] == 200) {
        ?>
                <div class='alert alert-info alert-dismissable'>
                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
                    <h4>
                        <i class='icon fa fa-check-circle'></i> Success!
                    </h4>
                    <?= $_SESSION['message'] ?>
                </div>
            <?php
            } else {
            ?>
                <div class='alert alert-danger alert-dismissable'>
                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
                    <h4><i class='icon fa fa-ban'></i> Error!</h4>
                    <?= $_SESSION['message'] ?>
                </div>
        <?php
            }
            unset($_SESSION['message']);
            unset($_SESSION['message_code']);
        } ?>
        <div class='row'>
            <div class='col-xs-12'>
                <div class="row">
                    <div class="col-lg-3">
                        <?php
                        $siswa = QueryOnedata("SELECT * FROM siswa WHERE id_siswa = " . $_GET['id_siswa'] . "")->fetch_assoc();
                        $pendaftaran = QueryOnedata("SELECT * FROM pendaftaran_siswa WHERE id_user = " . $siswa['id_user'] . "")->fetch_assoc();
                        $periode_sekarang = QueryOnedata("SELECT * FROM periode ORDER BY id_periode DESC")->fetch_assoc();
                        ?>
                        <div class="box box-primary">
                            <div class="box-body box-profile">
                                <img class="profile-user-img img-responsive img-circle" src="<?= $url . '/foto/siswa/' . $siswa['foto_siswa']; ?>" alt="User profile picture">
                                <h3 class="profile-username text-center"><?= $siswa['nm_siswa'] ?></h3>
                                <p class="text-muted text-center">Kelas <?= $akses_wali_kelas[1]['nm_kelas'] ?></p>
                                <ul class="list-group list-group-unbordered">
                                    <li class="list-group-item">
                                        <p><b>NIS</b> <a class="pull-right"><?= $siswa['nis'] ?></a></p>
                                        <p><b>TTL</b> <a class="pull-right"><?= $pendaftaran['tempat_lahir'] ?>, <?= $pendaftaran['tanggal_lahir'] ?></a></p>
                                        <p><b>Jenis Kelamin</b> <a class="pull-right"><?= $pendaftaran['jk_siswa'] ?></a></p>
                                        <p><b>Agama</b> <a class="pull-right"><?= $pendaftaran['agama'] ?></a></p>
                                        <p><b>Asal Sekolah</b> <a class="pull-right"><?= $pendaftaran['asal_sekolah'] ?></a></p>
                                    </li>
                                </ul>
                                <!-- <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a> -->
                            </div>
                            <!-- /.box-body -->
                        </div>
                        <a href='<?= $url ?>/app/anak-didik/index.php' class='btn btn-default btn-sm '>
                            <i class='fa fa-reply'></i> kembali
                        </a>
                    </div>
                    <div class="col-lg-9">
                        <div class="box box-primary">
                            <div class='box-header with-border text-center'>
                                <h3 class='box-title'>Penilaian Siswa</h3>
                            </div>
                            <div class="box-body">
                                <table class="table">
                                    <thead>
                                        <tr class="text-center">
                                            <th class="text-center" rowspan="2">NO</th>
                                            <th class="text-center" rowspan="2">Mapel</th>
                                            <th class="text-center" colspan="2">TUGAS</th>
                                            <th class="text-center" colspan="2">UH</th>
                                            <th class="text-center" colspan="2">UTS</th>
                                            <th class="text-center" colspan="2">UAS</th>
                                            <th class="text-center" colspan="2">RATA - RATA </th>
                                        </tr>
                                        <tr>
                                            <th>Tertulis</th>
                                            <th>Praktek</th>
                                            <th>Tertulis</th>
                                            <th>Praktek</th>
                                            <th>Tertulis</th>
                                            <th>Praktek</th>
                                            <th>Tertulis</th>
                                            <th>Praktek</th>
                                            <th>Tertulis</th>
                                            <th>Praktek</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $mapel_periode = "SELECT mapel.* FROM plotting_jadwal RIGHT JOIN mapel ON plotting_jadwal.id_mapel = mapel.id_mapel WHERE plotting_jadwal.id_periode = " . $periode_sekarang['id_periode'] . " AND plotting_jadwal.id_siswa = " . $siswa['id_siswa'] . " GROUP BY mapel.id_mapel";
                                        $no = 1;
                                        foreach (QueryManyData($mapel_periode) as $row) {
                                        ?>
                                            <tr>
                                                <td><?= $no++ ?></td>
                                                <td><?= $row['nm_mapel'] ?></td>
                                                <td>
                                                    <?php
                                                    $tugas = 0;
                                                    $tugas_praktek = 0;
                                                    $query_tugas = "SELECT penilaian.id_penilaian, penilaian.nilai, penilaian.nilai_praktek, penilaian.id_plotting FROM penilaian 
                                                    LEFT JOIN plotting_jadwal ON penilaian.id_plotting = plotting_jadwal.id_plotting
                                                    WHERE plotting_jadwal.id_periode = " . $periode_sekarang['id_periode'] . " 
                                                        AND plotting_jadwal.id_kelas = " . $akses_wali_kelas[1]['id_kelas'] . " 
                                                        AND plotting_jadwal.id_mapel = " . $row['id_mapel'] . " 
                                                        AND plotting_jadwal.id_siswa = " . $siswa['id_siswa'] . " 
                                                        AND penilaian.jenis_penilaian = 'tugas' 
                                                        ";
                                                    $plotting = "SELECT id_plotting FROM plotting_jadwal WHERE id_siswa = " . $siswa['id_siswa'] . " AND id_periode = " . $periode_sekarang['id_periode'] . " AND id_mapel =  " . $row['id_mapel'] . "";
                                                    $check_penilaian_tugas = "SELECT * FROM penilaian WHERE id_plotting = " . QueryOnedata($plotting)->fetch_assoc()['id_plotting'] . " AND jenis_penilaian = 'tugas' ";
                                                    if (QueryOnedata($check_penilaian_tugas)->num_rows > 0) {
                                                        $tugas = QueryOnedata($check_penilaian_tugas)->fetch_assoc()['nilai'];
                                                        $tugas_praktek = QueryOnedata($check_penilaian_tugas)->fetch_assoc()['nilai_praktek'];
                                                    }
                                                    ?>
                                                    <?= $tugas ?>
                                                </td>
                                                <td>
                                                    <?= $tugas_praktek ?>
                                                </td>
                                                <td>
                                                    <?php
                                                    $uh = 0;
                                                    $uh_praktek = 0;
                                                    $check_penilaian_uh = "SELECT * FROM penilaian WHERE id_plotting = " . QueryOnedata($plotting)->fetch_assoc()['id_plotting'] . " AND jenis_penilaian = 'uh' ";
                                                    if (QueryOnedata($check_penilaian_uh)->num_rows > 0) {
                                                        $uh = QueryOnedata($check_penilaian_uh)->fetch_assoc()['nilai'];
                                                        $uh_praktek = QueryOnedata($check_penilaian_uh)->fetch_assoc()['nilai_praktek'];
                                                    }
                                                    ?>
                                                    <?= $uh ?>
                                                </td>
                                                <td>
                                                    <?= $uh_praktek ?>
                                                </td>
                                                <td>
                                                    <?php
                                                    $uts = 0;
                                                    $uts_praktek = 0;
                                                    $check_penilaian_uts = "SELECT * FROM penilaian WHERE id_plotting = " . QueryOnedata($plotting)->fetch_assoc()['id_plotting'] . " AND jenis_penilaian = 'uts' ";
                                                    if (QueryOnedata($check_penilaian_uts)->num_rows > 0) {
                                                        $uts = QueryOnedata($check_penilaian_uts)->fetch_assoc()['nilai'];
                                                        $uts_praktek = QueryOnedata($check_penilaian_uts)->fetch_assoc()['nilai_praktek'];
                                                    }
                                                    ?>
                                                    <?= $uts ?>
                                                </td>
                                                <td>
                                                    <?= $uts_praktek ?>
                                                </td>
                                                <td>
                                                    <?php
                                                    $uas = 0;
                                                    $uas_praktek = 0;
                                                    $check_penilaian_uas = "SELECT * FROM penilaian WHERE id_plotting = " . QueryOnedata($plotting)->fetch_assoc()['id_plotting'] . " AND jenis_penilaian = 'uas' ";
                                                    if (QueryOnedata($check_penilaian_uas)->num_rows > 0) {
                                                        $uas = QueryOnedata($check_penilaian_uas)->fetch_assoc()['nilai'];
                                                        $uas_praktek = QueryOnedata($check_penilaian_uas)->fetch_assoc()['nilai_praktek'];
                                                    }
                                                    ?>
                                                    <?= $uas ?>
                                                </td>
                                                <td>
                                                    <?= $uas_praktek ?>
                                                </td>
                                                <td style="text-align:center;">
                                                    <?php
                                                    // Rata- Rata
                                                    echo round(QueryOnedata("SELECT AVG(nilai) as rata_rata FROM penilaian WHERE id_plotting = " . QueryOnedata($plotting)->fetch_assoc()['id_plotting'] . "")->fetch_assoc()['rata_rata']);
                                                    echo " </td><td>";
                                                    echo round(QueryOnedata("SELECT AVG(nilai_praktek) as rata_rata FROM penilaian WHERE id_plotting = " . QueryOnedata($plotting)->fetch_assoc()['id_plotting'] . "")->fetch_assoc()['rata_rata']);
                                                    ?>
                                                </td>
                                            </tr>
                                        <?php
                                        }
                                        ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="box box-primary">
                            <div class='box-header with-border text-center'>
                                <h4>A. SIKAP SPIRITUAL</h4>
                            </div>
                            <div class="box-body">
                                <h4>SIKAP SPIRITUAL</h4>
                                <form action="<?= $url ?>/aksi/rapot.php" method="POST" enctype="multipart/form-data">
                                    <table border="1px solid black;" style="width: 100%; text-align:center;">
                                        <tbody>
                                            <tr>
                                                <td style="width: 150px;">Predikat</td>
                                                <td> DESKRIPSI</td>
                                                <td style="width: 50px; "> AKSI</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <?php
                                                    $check_sikap_spiritual = "SELECT * FROM rapot WHERE id_periode = " . $periode_sekarang['id_periode'] . " AND id_siswa = " . $_GET['id_siswa'] . " AND jenis = 'SIKAP SPIRITUAL' ";
                                                    ?>
                                                    <?php
                                                    if (QueryOnedata($check_sikap_spiritual)->num_rows > 0) { // Jika ada maka update data
                                                    ?>
                                                        <input id="" class="form-control" name="value" value="<?= QueryOnedata($check_sikap_spiritual)->fetch_assoc()['value'] ?>">

                                                    <?php
                                                    } else {
                                                    ?>
                                                        <input id="" class="form-control" name="value" value="SANGAT BAIK">
                                                    <?php
                                                    }
                                                    ?>
                                                    <input id="" style="display:none;" class="form-control" name="id_periode" value="<?= $periode_sekarang['id_periode'] ?>">
                                                    <input id="" style="display:none;" class="form-control" name="id_siswa" value="<?= $_GET['id_siswa'] ?>">
                                                    <input id="" style="display:none;" class="form-control" name="jenis" value="sikap spiritual">
                                                </td>
                                                <td>
                                                    <?php
                                                    if (QueryOnedata($check_sikap_spiritual)->num_rows > 0) { // Jika ada maka update data
                                                    ?>
                                                        <textarea name="deskripsi" id="" style="width:100%;" class="form-control"><?= QueryOnedata($check_sikap_spiritual)->fetch_assoc()['deskripsi'] ?></textarea>
                                                    <?php
                                                    } else {
                                                    ?>
                                                        <textarea name="deskripsi" id="" style="width:100%;" class="form-control"></textarea>
                                                    <?php
                                                    }
                                                    ?>
                                                </td>
                                                <td style="padding:3px;">
                                                    <button type="submit" name="UPDATE_SIKAP_SPIRITUAL" value="UPDATE_SIKAP_SPIRITUAL" class="btn btn-sm btn-success">
                                                        <i class='fa fa-edit'></i> Update
                                                    </button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </form>
                                <h4>SIKAP SOSIAL</h4>
                                <form action="<?= $url ?>/aksi/rapot.php" method="POST" enctype="multipart/form-data">
                                    <table border="1px solid black;" style="width: 100%; text-align:center;">
                                        <tbody>
                                            <tr>
                                                <td style="width: 150px;">Predikat</td>
                                                <td> DESKRIPSI</td>
                                                <td style="width: 50px;"> AKSI</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <?php
                                                    $check_sikap_sosial = "SELECT * FROM rapot WHERE id_periode = " . $periode_sekarang['id_periode'] . " AND id_siswa = " . $_GET['id_siswa'] . " AND jenis = 'SIKAP SOSIAL' ";
                                                    if (QueryOnedata($check_sikap_sosial)->num_rows > 0) { // Jika ada maka update data
                                                    ?>
                                                        <input id="" class="form-control" name="value" value="<?= QueryOnedata($check_sikap_sosial)->fetch_assoc()['value'] ?>">
                                                    <?php
                                                    } else {
                                                    ?>
                                                        <input id="" class="form-control" name="value" value="">
                                                    <?php
                                                    }
                                                    ?>
                                                    <input id="" style="display:none;" class="form-control" name="id_periode" value="<?= $periode_sekarang['id_periode'] ?>">
                                                    <input id="" style="display:none;" class="form-control" name="id_siswa" value="<?= $_GET['id_siswa'] ?>">
                                                    <input id="" style="display:none;" class="form-control" name="jenis" value="sikap sosial">
                                                </td>
                                                <td>
                                                    <?php
                                                    if (QueryOnedata($check_sikap_sosial)->num_rows > 0) { // Jika ada maka update data
                                                    ?>
                                                        <textarea name="deskripsi" id="" style="width:100%;" class="form-control"><?= QueryOnedata($check_sikap_sosial)->fetch_assoc()['deskripsi'] ?></textarea>
                                                    <?php
                                                    } else {
                                                    ?>
                                                        <textarea name="deskripsi" id="" style="width:100%;" class="form-control"></textarea>
                                                    <?php
                                                    }
                                                    ?>
                                                </td>
                                                <td style="padding:3px;">
                                                    <button type="submit" name="UPDATE_SIKAP_SOSIAL" value="UPDATE_SIKAP_SOSIAL" class="btn btn-sm btn-success">
                                                        <i class='fa fa-edit'></i> Update
                                                    </button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </form>

                            </div>
                        </div>

                        <div class="box box-primary">
                            <div class='box-header with-border text-center'>
                                <h4>EKSTRA KULIKULER</h4>
                            </div>
                            <div class="box-body">
                            <form action="<?= $url ?>/aksi/rapot.php" method="POST" enctype="multipart/form-data">
                            <table border="1px solid black;" style="width: 100%; text-align:center;">                                    
                                    <tbody>
                                        <tr style="text-align: center;">
                                            <td>No</td>
                                            <td>Kegiatan Ekstrakulikuler</td>
                                            <td>Nilai</td>
                                            <td>Keterangan</td>
                                            <td>AKSI</td>
                                        </tr>

                                        <tr style="text-align: center;">
                                            <td>1
                                                <input id="" style="display:none;" class="form-control" name="id_periode" value="<?= $periode_sekarang['id_periode'] ?>">
                                                <input id="" style="display:none;" class="form-control" name="id_siswa" value="<?= $_GET['id_siswa'] ?>">
                                                <input id="" style="display:none;" class="form-control" name="jenis" value="ektrakulikuler">
                                            </td>
                                            <?php
                                            $check_ektrakulikuler = "SELECT * FROM rapot WHERE id_periode = " . $periode_sekarang['id_periode'] . " AND id_siswa = " . $_GET['id_siswa'] . " AND jenis = 'ektrakulikuler' ";
                                            if (QueryOnedata($check_ektrakulikuler)->num_rows > 0) { // Jika ada maka update data
                                            ?>                                              
                                                <td><input id="" class="form-control" name="pengetahuan" value="<?= QueryOnedata($check_ektrakulikuler)->fetch_assoc()['pengetahuan'] ?>"></td>
                                                <td><input id="" class="form-control" name="value" value="<?= QueryOnedata($check_ektrakulikuler)->fetch_assoc()['value'] ?>"></td>
                                                <td><textarea name="deskripsi" id="" style="width:100%;" class="form-control"><?= QueryOnedata($check_ektrakulikuler)->fetch_assoc()['deskripsi'] ?></textarea></td>
                                            <?php
                                            } else {
                                            ?>
                                                <td><input id="" class="form-control" name="value" value=""></td>
                                                <td><input id="" class="form-control" name="deskripsi" value=""></td>
                                                <td><textarea name="deskripsi" id="" style="width:100%;" class="form-control"></textarea></td>                                           
                                                 <?php
                                            }
                                            ?>
                                            <td style="padding:3px;">
                                                <button type="submit" name="ektrakulikuler" value="ektrakulikuler" class="btn btn-sm btn-success">
                                                    <i class='fa fa-edit'></i> Update
                                                </button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </form>
                            </div>
                        </div>
                        <div class="box box-primary">
                            <div class='box-header with-border text-center'>
                                <h4>PRESTASI</h4>
                            </div>
                            <div class="box-body">
                            <form action="<?= $url ?>/aksi/rapot.php" method="POST" enctype="multipart/form-data">
                            <table border="1px solid black;" style="width: 100%; text-align:center;">                                    
                                    <tbody>
                                        <tr style="text-align: center;">
                                            <td>No</td>
                                            <td>Jenis Prestasi</td>
                                            <td>Keterangan</td>
                                        </tr>

                                        <tr style="text-align: center;">
                                            <td>1
                                                <input id="" style="display:none;" class="form-control" name="id_periode" value="<?= $periode_sekarang['id_periode'] ?>">
                                                <input id="" style="display:none;" class="form-control" name="id_siswa" value="<?= $_GET['id_siswa'] ?>">
                                                <input id="" style="display:none;" class="form-control" name="jenis" value="prestasi">
                                            </td>
                                            <?php
                                            $check_prestasi = "SELECT * FROM rapot WHERE id_periode = " . $periode_sekarang['id_periode'] . " AND id_siswa = " . $_GET['id_siswa'] . " AND jenis = 'prestasi' ";
                                            if (QueryOnedata($check_prestasi)->num_rows > 0) { // Jika ada maka update data
                                            ?>                                              
                                                <td><input id="" class="form-control" name="value" value="<?= QueryOnedata($check_prestasi)->fetch_assoc()['value'] ?>"></td>
                                                <td><textarea name="deskripsi" id="" style="width:100%;" class="form-control"><?= QueryOnedata($check_prestasi)->fetch_assoc()['deskripsi'] ?></textarea></td>
                                            <?php
                                            } else {
                                            ?>
                                                <td><input id="" class="form-control" name="value" value=""></td>
                                                <td><textarea name="deskripsi" id="" style="width:100%;" class="form-control"></textarea></td>                                           
                                                 <?php
                                            }
                                            ?>
                                            <td style="padding:3px;">
                                                <button type="submit" name="prestasi" value="prestasi" class="btn btn-sm btn-success">
                                                    <i class='fa fa-edit'></i> Update
                                                </button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </form>
                            </div>
                        </div>

                        <div class="box box-primary">
                            <div class='box-header with-border text-center'>
                                <h4>CATATAN WALI KELAS</h4>
                            </div>
                            <div class="box-body">
                                <form action="<?= $url ?>/aksi/rapot.php" method="POST" enctype="multipart/form-data">
                                    <table border="1px solid black;" style="width: 100%; text-align:center;">
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <input id="" style="display:none;" class="form-control" name="id_periode" value="<?= $periode_sekarang['id_periode'] ?>">
                                                    <input id="" style="display:none;" class="form-control" name="id_siswa" value="<?= $_GET['id_siswa'] ?>">
                                                    <input id="" style="display:none;" class="form-control" name="jenis" value="catatan wali kelas">
                                                    <?php
                                                    $check_catatan_wali_kelas = "SELECT * FROM rapot WHERE id_periode = " . $periode_sekarang['id_periode'] . " AND id_siswa = " . $_GET['id_siswa'] . " AND jenis = 'catatan wali kelas' ";
                                                    if (QueryOnedata($check_catatan_wali_kelas)->num_rows > 0) { // Jika ada maka update data
                                                    ?>
                                                        <textarea name="deskripsi" id="" style="width:100%;" class="form-control"><?= QueryOnedata($check_catatan_wali_kelas)->fetch_assoc()['deskripsi'] ?></textarea>
                                                    <?php
                                                    } else {
                                                    ?>
                                                        <textarea name="deskripsi" id="" style="width:100%;" class="form-control"></textarea>

                                                    <?php
                                                    }
                                                    ?>
                                                </td>
                                                <td style="width: 50px; padding:3px;">
                                                    <button type="submit" name="UPDATE_catatan_wali_kelas" value="UPDATE_catatan_wali_kelas" class="btn btn-sm btn-success">
                                                        <i class='fa fa-edit'></i> Update
                                                    </button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- </div> -->
            </div>
        </div>
</div>
<?php include_once '../template/footer.php'; ?>