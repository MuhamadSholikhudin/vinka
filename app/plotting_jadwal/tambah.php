<?php include_once '../template/header.php'; ?>
<?php include_once '../template/navbar.php'; ?>
<?php include_once '../template/sidebar.php'; ?>
<div class='content-wrapper'>
    <section class='content-header'>
        <h1>Plotting Jadwal page</h1>
        <ol class='breadcrumb'>
            <li><a href='#'><i class='fa fa-dashboard'></i> Edit</a></li>
            <li class='active'>Plotting Jadwal page</li>
        </ol>
    </section>
    <section class='content'>
        <div class='row'>
            <div class='col-xs-12'>
                <div class='box box-info'>
                    <div class='box-header with-border text-center'>
                        <h3 class='box-title'>Form Tambah Plotting Jadwal</h3>
                    </div>
                    <form action='<?= $url ?>/aksi/plotting_jadwal.php' method='post' enctype='multipart/form-data' class='form-horizontal'>
                        <div class='box-body'>
                            <div class='form-group'>
                                <label for='inputid_siswa' class='col-sm-2 col-form-label'>Siswa</label>
                                <div class='col-sm-10'>
                                    <?php ?>
                                    <select class='form-control' name='id_siswa' id='inputid_siswa'>
                                        <?php
                                        $siswa = QueryManyData('SELECT * FROM siswa');
                                        foreach ($siswa as  $row) {
                                        ?>
                                            <option value='<?= $row['id_siswa'] ?>'><?= $row['nis'] ?> | <?= $row['nm_siswa'] ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class='form-group'>
                                <label for='inputid_kelas' class='col-sm-2 col-form-label'>Kelas</label>
                                <div class='col-sm-10'>
                                    <?php ?>
                                    <select class='form-control' name='id_kelas' id='inputid_kelas'>
                                        <?php
                                        $kelas = QueryManyData('SELECT * FROM kelas');
                                        foreach ($kelas as  $row) {
                                        ?>
                                            <option value='<?= $row['id_kelas'] ?>'>Kelas <?= $row['nm_kelas'] ?> | Tingkatan <?= $row['tingkatan'] ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class='form-group'>
                                <label for='inputid_mapel' class='col-sm-2 col-form-label'>Mapel</label>
                                <div class='col-sm-10'>
                                    <?php ?>
                                    <select class='form-control' name='id_mapel' id='inputid_mapel'>
                                        <?php
                                        $mapel = QueryManyData('SELECT * FROM mapel JOIN guru ON mapel.id_guru = guru.id_guru ');
                                        foreach ($mapel as  $row) {
                                        ?>
                                            <option value='<?= $row['id_mapel'] ?>'><?= $row['nm_mapel'] ?> | <?= $row['nm_guru'] ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class='form-group'>
                                <label for='inputid_periode' class='col-sm-2 col-form-label'>Periode</label>
                                <div class='col-sm-10'>
                                    <?php ?>
                                    <select class='form-control' name='id_periode' id='inputid_periode'>
                                        <?php
                                        $periode = QueryManyData('SELECT * FROM periode');
                                        foreach ($periode as  $row) {
                                        ?>
                                            <option value='<?= $row['id_periode'] ?>'><?= $row['nm_periode'] ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class='form-group'>
                                <label for='inputhari' class='col-sm-2 col-form-label'>Hari</label>
                                <div class='col-sm-10'>
                                    <input type='text' class='form-control' id='inputhari' name='hari' required>
                                </div>
                            </div>
                            <div class='form-group'>
                                <label for='inputjam_awal' class='col-sm-2 col-form-label'>Jam Awal</label>
                                <div class='col-sm-10'>
                                    <input type='time' class='form-control' id='inputjam_awal' name='jam_awal' required>
                                </div>
                            </div>
                            <div class='form-group'>
                                <label for='inputjam_akhir' class='col-sm-2 col-form-label'>Jam Akhir</label>
                                <div class='col-sm-10'>
                                    <input type='time' class='form-control' id='inputjam_akhir' name='jam_akhir' required>
                                </div>
                            </div>
                        </div>
                        <div class='box-footer'>
                            <a href='<?= $url ?>/app/plotting_jadwal/index.php' class='btn btn-default btn-sm '>
                                <i class='fa fa-reply'></i> kembali
                            </a>
                            <button type='submit' name='simpanplotting_jadwal' value='simpanplotting_jadwal' class='btn btn-info pull-right'>
                                <i class='fa fa-save'></i> SIMPAN
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
</div>
<?php include_once '../template/footer.php'; ?>