<?php include_once '../template/header.php'; ?>
<?php include_once '../template/navbar.php'; ?>
<?php include_once '../template/sidebar.php'; ?>
<div class='content-wrapper'>
    <section class='content-header'>
        <h1>Laporan Kehadiran Siswa
        </h1>
        <ol class='breadcrumb'>
            <li><a href='#'><i class='fa fa-dashboard'></i> Kehadiran Siswa</a></li>
            <li class='active'>Laporan page</li>
        </ol>
    </section>
    <section class='content'>

        <div class='row'>
            <div class='col-xs-4'>
                <div class='box box-info'>
                    <div class='box-header with-border text-center'>
                        <h3 class='box-title'>CARI DATA DENGAN RANGE TANGGAL</h3>
                    </div>
                    <form action='<?= $url ?>/app/laporan/laporan_kehadiran_siswa.php' method='GET' enctype='multipart/form-data' class='form-horizontal'>
                        <div class='box-body'>
                            <div class='form-group'>
                                <label for='inputdari_tanggal' class='col-sm-5 col-form-label'>Dari Tanggal</label>
                                <div class='col-sm-7'>
                                    <input type='date' class='form-control' id='inputdari_tanggal' name='dari_tanggal' value="<?= date("Y-m-d") ?>" required>
                                </div>
                            </div>
                            <div class='form-group'>
                                <label for='inputsampai_tanggal' class='col-sm-5 col-form-label'>Sampai Tanggal</label>
                                <div class='col-sm-7'>
                                    <input type='date' class='form-control' id='inputsampai_tanggal' name='sampai_tanggal' value="<?= date("Y-m-d") ?>" required>
                                </div>
                            </div>
                            <div class='form-group' style="display: none;">
                                <label for='inputjenis_filter' class='col-sm-5 col-form-label'>Jenis Filter</label>
                                <div class='col-sm-7'>
                                    <input type='text' class='form-control' id='inputjenis_filter' name='jenis_filter' value="tanggal" required>
                                </div>
                            </div>
                        </div>
                        <div class='box-footer'>
                            <button type='submit' name='tampil_laporan_kehadiran_siswa' value='tampil_laporan_kehadiran_siswa' class='btn btn-info pull-right'>
                                <i class='fa fa-search'></i> TAMPILKAN
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <div class='col-xs-4'>
                <div class='box box-info'>
                    <div class='box-header with-border text-center'>
                        <h3 class='box-title'>CARI DATA DENGAN BULAN</h3>
                    </div>
                    <form action='<?= $url ?>/app/laporan/laporan_kehadiran_siswa.php' method='GET' enctype='multipart/form-data' class='form-horizontal'>
                        <div class='box-body'>
                            <div class='form-group'>
                                <label for='inputdari_tanggal' class='col-sm-5 col-form-label'>Bulan</label>
                                <div class='col-sm-7'>
                                    <select name="bulan" id="bulan" class="form-control">
                                        <?php for ($i = 1; $i <= 12; $i++) {
                                            if (strlen($i) == 1) {
                                        ?>
                                                <option value="<?= "0" . $i ?>"><?= "0" . $i ?></option>
                                            <?php
                                            } else {
                                            ?>
                                                <option value="<?= $i ?>"><?= $i ?></option>
                                        <?php
                                            }
                                        } ?>
                                    </select>
                                </div>
                            </div>
                            <div class='form-group'>
                                <label for='inputsampai_tanggal' class='col-sm-5 col-form-label'>Tahun</label>
                                <div class='col-sm-7'>
                                    <select name="tahun" id="tahun" class="form-control">
                                        <?php
                                        $year_now = date('Y');
                                        $year_start = $year_now - 10;
                                        for ($i = $year_now; $i >= $year_start; $i--) {
                                        ?>
                                            <option value="<?= $i ?>"><?= $i ?></option>
                                        <?php
                                        } ?>
                                    </select>
                                </div>
                            </div>
                            <div class='form-group' style="display: none;">
                                <label for='inputjenis_filter' class='col-sm-5 col-form-label'>Jenis Filter</label>
                                <div class='col-sm-7'>
                                    <input type='text' class='form-control' id='inputjenis_filter' name='jenis_filter' value="bulan" required>
                                </div>
                            </div>
                        </div>
                        <div class='box-footer'>
                            <button type='submit' name='tampil_laporan_kehadiran_siswa' value='tampil_laporan_kehadiran_siswa' class='btn btn-info pull-right'>
                                <i class='fa fa-search'></i> TAMPILKAN
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <div class='col-xs-4'>
                <div class='box box-info'>
                    <div class='box-header with-border text-center'>
                        <h3 class='box-title'>CARI DATA DENGAN TAHUN</h3>
                    </div>
                    <form action='<?= $url ?>/app/laporan/laporan_kehadiran_siswa.php' method='GET' enctype='multipart/form-data' class='form-horizontal'>
                        <div class='box-body'>
                            <div class='form-group'>
                                <label for='inputsampai_tanggal' class='col-sm-5 col-form-label'>Tahun</label>
                                <div class='col-sm-7'>
                                    <select name="tahun" id="tahun" class="form-control">
                                        <?php
                                        $year_now = date('Y');
                                        $year_start = $year_now - 10;
                                        for ($i = $year_now; $i >= $year_start; $i--) {
                                        ?>
                                            <option value="<?= $i ?>"><?= $i ?></option>
                                        <?php
                                        } ?>
                                    </select>
                                </div>
                            </div>
                            <div class='form-group' style="display: none;">
                                <label for='inputjenis_filter' class='col-sm-5 col-form-label'>Jenis Filter</label>
                                <div class='col-sm-7'>
                                    <input type='text' class='form-control' id='inputjenis_filter' name='jenis_filter' value="tahun" required>
                                </div>
                            </div>
                        </div>
                        <div class='box-footer'>
                            <button type='submit' name='tampil_laporan_kehadiran_siswa' value='tampil_laporan_kehadiran_siswa' class='btn btn-info pull-right'>
                                <i class='fa fa-search'></i> TAMPILKAN
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <?php
        if (isset($_GET['jenis_filter'])) {
            if ($_GET['jenis_filter'] == 'tanggal') {
                $query_filter = "SELECT * FROM kehadiran_siswa WHERE tgl_kehadiran BETWEEN  '" . $_GET["dari_tanggal"] . "' AND '" . $_GET["sampai_tanggal"] . "'";
                $label = "Data Kehadiran Siswa</br> dari Tanggal " . $_GET["dari_tanggal"] . " Sampai Tanggal " . $_GET["sampai_tanggal"] . "</br> MI AL-HIDAYAH PURI PATI";
                $getExport = "&dari_tanggal=" . $_GET["dari_tanggal"] . "&sampai_tanggal=" . $_GET["sampai_tanggal"] . "";
            } else if ($_GET['jenis_filter'] == 'bulan') {
                $query_filter = "SELECT * FROM kehadiran_siswa WHERE MONTH(tgl_kehadiran) = '" . $_GET["bulan"] . "' AND YEAR(tgl_kehadiran) ='" . $_GET["tahun"] . "'";
                $label = "Data Kehadiran Siswa</br> Bulan " . $_GET["bulan"] . " Tahun " . $_GET["tahun"] . "</br> MI AL-HIDAYAH PURI PATI";
                $getExport = "&bulan=" . $_GET["bulan"] . "&tahun=" . $_GET["tahun"] . "";
            } else if ($_GET['jenis_filter'] == 'tahun') {
                $query_filter = "SELECT * FROM kehadiran_siswa WHERE  YEAR(tgl_kehadiran) ='" . $_GET["tahun"] . "'";
                $label = "Data Kehadiran Siswa</br> Tahun " . $_GET["tahun"] . "</br> MI AL-HIDAYAH PURI PATI";
                $getExport = "&tahun=" . $_GET["tahun"] . "";
            }
        ?>
            <a href="<?= $url ?>/app/laporan/export_kehadiran_siswa.php?jenis_filter=<?= $_GET["jenis_filter"] . $getExport ?>" class='btn btn-success btn-sm'>
                <i class='fa fa-file-excel'></i> Excel
            </a>
            <br>
            <div class='box box-info'>
                <div class='box-header' style="text-align: center;">
                    <h3 class='box-title' style="text-align: center;"><?= $label ?></h3>
                </div>
                <div class='box-body'>
                    <table id="example" class='table '>
                        <thead>
                            <tr>
                                <th>ID PLOTTING</th>
                                <th>TGL KEHADIRAN</th>
                                <th>JENIS KEHADIRAN</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach (QueryManyData('SELECT * FROM kehadiran_siswa') as $row) {
                            ?>
                                <tr>
                                    <td>
                                        <?php
                                        $query_plotting = 'SELECT plotting_jadwal.*, mapel.nm_mapel, kelas.nm_kelas, siswa.nm_siswa FROM plotting_jadwal
                                                        LEFT JOIN mapel ON plotting_jadwal.id_mapel = mapel.id_mapel
                                                        LEFT JOIN siswa ON plotting_jadwal.id_siswa = siswa.id_siswa
                                                        LEFT JOIN kelas ON plotting_jadwal.id_kelas = kelas.id_kelas
                                                        LEFT JOIN periode ON plotting_jadwal.id_periode = periode.id_periode
                                                        WHERE plotting_jadwal.id_plotting = ' . $row['id_plotting'] . '
                                                        ';
                                        $plotting = QueryOnedata($query_plotting)->fetch_assoc();
                                        ?>
                                        <?= $plotting['hari'] . " | " . $plotting['jam_awal'] . " | " . $plotting['jam_akhir'] . " | " . $plotting['nm_mapel'] . " | " . $plotting['nm_kelas'] . " | " . $plotting['nm_siswa'] ?>
                                    </td>
                                    <td><?= $row['tgl_kehadiran'] ?></td>
                                    <td><?= $row['jenis_kehadiran'] ?></td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        <?php
        }
        ?>
    </section>
</div>
<?php include_once '../template/footer.php'; ?>