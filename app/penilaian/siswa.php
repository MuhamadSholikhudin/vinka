<?php include_once '../template/header.php'; ?>
<?php include_once '../template/navbar.php'; ?>
<?php include_once '../template/sidebar.php';
$periode = QueryOnedata('SELECT * FROM periode WHERE id_periode = ' . $_GET['id_periode'] . '')->fetch_assoc();
$kelas = QueryOnedata('SELECT * FROM kelas WHERE id_kelas = ' . $_GET['id_kelas'] . '')->fetch_assoc();
$mapel = QueryOnedata('SELECT * FROM mapel WHERE id_mapel = ' . $_GET['id_mapel'] . '')->fetch_assoc();
$guru = QueryOnedata('SELECT * FROM guru WHERE id_guru = ' . $kelas['id_guru'] . '')->fetch_assoc();
?>
<div class='content-wrapper'>
    <section class='content-header'>
        <h1>Penilaian page
        </h1>
        <ol class='breadcrumb'>
            <li><a href='#'><i class='fa fa-dashboard'></i> Index</a></li>
            <li class='active'>Penilaian page</li>
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

        <div class="box box-danger">
            <div class="box-header with-border">
                <h3 class="box-title">Periode <?= $periode['nm_periode'] ?> Kelas <?= $kelas['nm_kelas'] ?> Wali Kelas <?= $guru['nm_guru'] ?> Mata Pelajaran <?= $mapel['nm_mapel'] ?></h3>
            </div>
            <div class="box-body">
                <style>
                    table,
                    thead,
                    body,
                    tr,
                    th,
                    td {
                        border: 1px solid black;
                        /* padding: 5px; */

                    }
                </style>
                <table class="table">
                    <thead>
                        <tr class="text-center">
                            <th class="text-center" rowspan="2">NO</th>
                            <th class="text-center" rowspan="2">SISWA</th>
                            <th class="text-center" colspan="2">TUGAS</th>
                            <th class="text-center" colspan="2">UH</th>
                            <th class="text-center" colspan="2">UTS</th>
                            <th class="text-center" colspan="2">UAS</th>
                            <th class="text-center" colspan="2">RATA - RATA </th>
                            <?php if ($_SESSION['level'] != 'Orang Tua') { ?>
                                <th class="text-center" rowspan="2">ACTION</th>
                                <th class="text-center" rowspan="2">DESKRIPSI</th>
                            <?php } ?>
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
                        $query_mapel = "SELECT * FROM mapel";
                        if ($_SESSION['level'] == 'Guru') {
                            $gurux = QueryOnedata("SELECT * FROM guru WHERE id_user = " . $_SESSION['id_user'] . " ")->fetch_assoc();
                            $query_mapel = "SELECT plotting_jadwal.id_plotting, plotting_jadwal.id_siswa, mapel.nm_mapel, mapel.id_mapel FROM plotting_jadwal
                            JOIN mapel ON plotting_jadwal.id_mapel = mapel.id_mapel 
                            WHERE plotting_jadwal.id_periode = " . $_GET['id_periode'] . " 
                            AND plotting_jadwal.id_kelas = " . $kelas['id_kelas'] . " 
                            AND mapel.id_guru = " . $gurux['id_guru'] . "  
                            GROUP BY plotting_jadwal.id_siswa 
                            ";
                        } else if ($_SESSION['level'] == 'Orang Tua') {
                            $siswa = QueryOnedata("SELECT * FROM siswa WHERE id_user = " . $_SESSION['id_user'] . " ")->fetch_assoc();
                            $query_mapel = "SELECT plotting_jadwal.id_plotting, plotting_jadwal.id_siswa, mapel.nm_mapel, mapel.id_mapel FROM plotting_jadwal
                            JOIN mapel ON plotting_jadwal.id_mapel = mapel.id_mapel 
                            WHERE plotting_jadwal.id_periode = " . $_GET['id_periode'] . " 
                            AND plotting_jadwal.id_kelas = " . $kelas['id_kelas'] . " 
                            AND plotting_jadwal.id_siswa = " . $siswa['id_siswa'] . "  
                            GROUP BY plotting_jadwal.id_siswa 
                            ";
                        }
                        $no = 1;
                        foreach (QueryManyData($query_mapel) as $row) {
                            $siswa = QueryOnedata("SELECT * FROM siswa WHERE id_siswa = " . $row['id_siswa'] . " ")->fetch_assoc();
                        ?>
                            <tr>
                                <td>
                                    <form action="<?= $url ?>/aksi/penilaian.php" method="POST" enctype="multipart/form-data">
                                        <?= $no++ ?>
                                        <?php
                                        $id_penilaian = 0;
                                        ?>
                                        <input class="form-control" style="display: none;" type="number" name="id_penilaian[]" value="<?= $id_penilaian ?>" min="0" max="100" id="">
                                        <input class="form-control" style="display: none;" type="number" name="id_periode[]" value="<?= $_GET['id_periode'] ?>" min="0" max="100" id="">
                                        <input class="form-control" style="display: none;" type="number" name="id_kelas[]" value="<?= $_GET['id_kelas'] ?>" min="0" max="100" id="">
                                        <input class="form-control" style="display: none;" type="number" name="id_mapel[]" value="<?= $_GET['id_mapel'] ?>" min="0" max="100" id="">
                                        <input class="form-control" style="display: none;" type="number" name="id_siswa[]" value="<?= $row['id_siswa'] ?>" min="0" max="100" id="">
                                </td>
                                <td><?= $siswa['nm_siswa'] ?>
                                </td>
                                <td>
                                    <?php
                                    $tugas = 0;
                                    $tugas_praktek = 0;
                                    $query_tugas = "SELECT penilaian.id_penilaian, penilaian.nilai, penilaian.nilai_praktek, penilaian.id_plotting FROM penilaian 
                                     LEFT JOIN plotting_jadwal ON penilaian.id_plotting = plotting_jadwal.id_plotting
                                     WHERE plotting_jadwal.id_periode = " . $_GET['id_periode'] . " 
                                        AND plotting_jadwal.id_kelas = " . $kelas['id_kelas'] . " 
                                        AND plotting_jadwal.id_mapel = " . $row['id_mapel'] . " 
                                        AND plotting_jadwal.id_siswa = " . $row['id_siswa'] . " 
                                        AND penilaian.jenis_penilaian = 'tugas' 
                                        ";
                                    $plotting = "SELECT id_plotting FROM plotting_jadwal WHERE id_siswa = " . $row['id_siswa'] . " AND id_kelas = " . $kelas['id_kelas'] . " AND id_periode = " . $_GET['id_periode'] . " ";
                                    $check_penilaian_tugas = "SELECT * FROM penilaian WHERE id_plotting = " . QueryOnedata($plotting)->fetch_assoc()['id_plotting'] . " AND jenis_penilaian = 'tugas' ";
                                    if (QueryOnedata($check_penilaian_tugas)->num_rows > 0) {
                                        $tugas = QueryOnedata($check_penilaian_tugas)->fetch_assoc()['nilai'];
                                        $tugas_praktek = QueryOnedata($check_penilaian_tugas)->fetch_assoc()['nilai_praktek'];
                                    }
                                    ?>
                                    <input type="number" name="tugas[]" value="<?= $tugas ?>" min="0" max="100" id="" style="width:50px;">
                                </td>
                                <td>
                                    <input type="number" name="tugas_praktek[]" value="<?= $tugas_praktek ?>" min="0" max="100" id="" style="width:50px;">
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
                                    <input display="width:50px;" type="number" name="uh[]" value="<?= $uh ?>" min="0" max="100" id="">
                                </td>
                                <td>
                                    <input display="width:50px;" type="number" name="uh_praktek[]" value="<?= $uh_praktek ?>" min="0" max="100" id="">
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
                                    <input display="width:50px;" type="number" name="uts[]" value="<?= $uts ?>" min="0" max="100" id="">
                                </td>
                                <td>
                                    <input display="width:50px;" type="number" name="uts_praktek[]" value="<?= $uts_praktek ?>" min="0" max="100" id="">
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
                                    <input display="width:50px;" type="number" name="uas[]" value="<?= $uas ?>" min="0" max="100" id="">
                                </td>
                                <td>
                                    <input display="width:50px;" type="number" name="uas_praktek[]" value="<?= $uas_praktek ?>" min="0" max="100" id="">
                                </td>
                                <td style="text-align:center;">
                                    <?php
                                    // Rata- Rata
                                    echo round(QueryOnedata("SELECT AVG(nilai) as rata_rata FROM penilaian WHERE id_plotting = " . QueryOnedata($plotting)->fetch_assoc()['id_plotting'] . "")->fetch_assoc()['rata_rata']);
                                    echo " </td><td>";
                                    echo round(QueryOnedata("SELECT AVG(nilai_praktek) as rata_rata FROM penilaian WHERE id_plotting = " . QueryOnedata($plotting)->fetch_assoc()['id_plotting'] . "")->fetch_assoc()['rata_rata']);
                                    ?>
                                </td>
                                <?php if ($_SESSION['level'] != 'Orang Tua') { ?>
                                    <td>
                                        <button type="submit" name="UPDATE_PENILAIAN_DATA" value="UPDATE_PENILAIAN_DATA" class="btn btn-sm btn-success">
                                            <i class='fa fa-edit'></i> Update
                                        </button>
                                        </form>
                                    </td>
                                    <td>
                                        <button  class="btn btn-sm btn-primary" onclick="OpenRapot(<?= $siswa['id_siswa'] ?>, <?= $mapel['id_mapel'] ?>, <?= $periode['id_periode'] ?>, '<?= $siswa['nm_siswa'] ?>')"  data-toggle='modal' data-target='#DetailRapot'>
                                            <i class='fa fa-edit'></i> Deskripsi
                                        </button>
                                    </td>
                                <?php } ?>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
                <br>
                <a href='<?= $url ?>/app/penilaian/periode.php?id_periode=<?= $_GET['id_periode'] ?>&id_kelas=<?= $_GET['id_kelas'] ?>' class='btn btn-default btn-sm '>
                    <i class='fa fa-reply'></i> kembali
                </a><!-- /.box-body -->
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="DetailRapot" tabindex="-1" role="dialog" aria-labelledby="DetailRapotLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="DetailRapotLabel">Update Deskripsi Penilian Mapel <?= $mapel['nm_mapel'] ?>  Siswa <span id="nm_siswa"></span> </span></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="<?= $url ?>/aksi/rapot.php" method="PUT" enctype="multipart/form-data">
                        <div class="modal-body" id="modal">
                            <table class="table" >
                                <tbody >
                                    <tr >
                                        <td>Pengetahuan </td>
                                        <td>Ketrampilan </td>
                                    </tr>
                                    <tr>
                                        <td> <input type="text" class="form-control" id="pengetahuan" > </td>
                                        <td> <input type="text" class="form-control" id="ketrampilan" > </td>
                                    </tr>
                                </tbody>
                            </table>
                            
                        
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" name="deskripsi_pengetahun_dan_ketrapilan" value="deskripsi_pengetahun_dan_ketrapilan" class="btn btn-primary">Proses</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <script>
            function AddModal(hari, jamL, jamR) {
                document.getElementById("hariX").textContent = hari;
                document.getElementById("jamX").textContent = jamL;
                document.getElementById("hariI").value = hari;
                document.getElementById("jam_awalI").value = jamL;
                document.getElementById("jam_akhirI").value = jamR;
            }

            function OpenRapot(id_siswa, id_mapel, id_periode, nm_siswa) {
                document.getElementById("nm_siswa").textContent = nm_siswa;
                dataX = {
                    id_siswa: id_siswa,
                    id_mapel: id_mapel,
                    id_periode: id_periode,
                    id_mapel: id_mapel,
                    jenis : 'deskripsi_pengetahun_dan_ketrapilan'
                };
                $.ajax({
                    url: '<?= $url ?>/aksi/ajax.php', // Ganti dengan URL file server Anda
                    method: 'POST',
                    data: dataX,
                    success: function(response) {
                        console.log(response);
                    },
                    error: function(xhr, status, error) {
                        alert("Terjadi kesalahan: " + error);
                    }
                });
            }

            function HapusPlot(id) {
                let text = 'Apakah Anda Yakin Ingin Menghapus data!\n OK or Cancel.';
                if (confirm(text) == true) {
                    text = 'You pressed OK!';
                    //   window.location.href = '<?= $url ?>/aksi/penilaian.php?action=delete&id_plotting=' + id + '';
                }
            }
        </script>

    </section>
</div>
<?php include_once '../template/footer.php'; ?>