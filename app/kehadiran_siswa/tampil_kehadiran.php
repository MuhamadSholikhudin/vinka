<?php 
include_once '../template/header.php'; 
include_once '../template/navbar.php'; 
include_once '../template/sidebar.php';
$periode = QueryOnedata('SELECT * FROM periode WHERE id_periode = ' . $_GET['id_periode'] . '')->fetch_assoc();
$kelas = QueryOnedata('SELECT * FROM kelas WHERE id_kelas = ' . $_GET['id_kelas'] . '')->fetch_assoc();
$mapel = QueryOnedata('SELECT * FROM mapel WHERE id_mapel = ' . $_GET['id_mapel'] . '')->fetch_assoc();
$guru = QueryOnedata('SELECT * FROM guru WHERE id_guru = ' . $kelas['id_guru'] . '')->fetch_assoc();
?>
<div class='content-wrapper'>
    <section class='content-header'>
        <h1>Tambah Kehadiran page
        </h1>
        <ol class='breadcrumb'>
            <li><a href='#'><i class='fa fa-dashboard'></i> Index</a></li>
            <li class='active'>Kehadiran page</li>
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
                <div class='box box-info'>
                    <div class='box-header with-border text-center'>
                        <h3 class='box-title'>TAMPILKAN DATA KEHADIRAN SISWA</h3>
                    </div>
                    <form action='<?= $url ?>/app/kehadiran_siswa/tampil_kehadiran.php' method='GET' enctype='multipart/form-data' class='form-horizontal'>
                        <div class='box-body'>
                            <div class='form-group'>
                                <label for='inputdari_tanggal' class='col-sm-2 col-form-label'>Bulan</label>
                                <div class='col-sm-2'>
                                    <select name="bulan" id="bulan" class="form-control">
                                        <?php for ($i = 1; $i <= 12; $i++) {
                                            if(isset($_GET['bulan'])){
                                                if($_GET['bulan'] == $i){
                                                ?><option value="<?= $i ?>" selected><?= $i ?></option><?php
                                                }else{
                                                    ?><option value="<?= $i ?>"><?= $i ?></option><?php
                                                }
                                            }else{
                                            ?><option value="<?= $i ?>"><?= $i ?></option>
                                        <?php }
                                        } ?>
                                    </select>
                                </div>                           
                                <label for='inputsampai_tanggal' class='col-sm-2 col-form-label'>Tahun</label>
                                <div class='col-sm-3'>
                                    <select name="tahun" id="tahun" class="form-control">
                                        <?php
                                        $year_now = date('Y');
                                        $year_start = $year_now - 10;
                                        for ($i = $year_now; $i >= $year_start; $i--) {
                                            if(isset($_GET['tahun'])){
                                                if($_GET['tahun'] == $i){
                                                    ?>
                                                    <option value="<?= $i ?>" selected><?= $i ?></option>
                                                <?php
                                                }else{
                                                    ?>
                                                    <option value="<?= $i ?>"><?= $i ?></option>
                                                <?php
                                                }
                                            }else{
                                        ?>
                                            <option value="<?= $i ?>"><?= $i ?></option>
                                        <?php
                                        }
                                     } ?>
                                    </select>
                                </div>
                                <div class='col-sm-3'>
                                    <button type='submit' class='btn btn-info pull-right'>
                                        <i class='fa fa-search'></i> TAMPILKAN
                                    </button>
                                </div>
                            </div>
                            <div class='form-group' style="display: none;">
                                <label for='inputjenis_filter' class='col-sm-5 col-form-label'>Jenis Filter</label>
                                <div class='col-sm-7'>
                                    <input type='text' class='form-control' id='inputjenis_filter' name='tampil' value="tampil" required>
                                    <input type='text' class='form-control' id='inputjenis_filter' name='id_periode' value="<?=$_GET['id_periode'] ?>" required>
                                    <input type='text' class='form-control' id='inputjenis_filter' name='id_kelas' value="<?=$_GET['id_kelas'] ?>" required>
                                    <input type='text' class='form-control' id='inputjenis_filter' name='id_mapel' value="<?=$_GET['id_mapel'] ?>" required>
                                </div>
                            </div>
                        </div>
                        
                    </form>
                </div>
                <style>
                    table,
                    thead,
                    body,
                    tr,
                    th,
                    td {
                        border: 1px solid black;
                    }
                </style>
                <?php 
                if(isset($_GET['tampil'])){
                    // Contoh penggunaan
                    $tahun = $_GET['tahun'];
                    $bulan = $_GET['bulan']; // Januari
                    // Fungsi untuk menampilkan semua tanggal dalam satu bulan
                        // Tentukan tanggal awal bulan
                        $tanggalAwal = new DateTime("$tahun-$bulan-01");
                        // Tentukan tanggal akhir bulan
                        $tanggalAkhir = new DateTime("$tahun-$bulan-01");
                        $tanggalAkhir->modify('last day of this month');
                        // Iterasi dari tanggal awal sampai akhir
                        $months = new DatePeriod($tanggalAwal, new DateInterval('P1D'), $tanggalAkhir->modify('+1 day'));                       
                ?>
                <table class="table">
                    <thead>
                        <tr class="text-center">
                            <th class="text-center">NO</th>
                            <th class="text-center">NAMA SISWA</th>
                            <?php 
                                foreach ($months as $tanggal) {
                                    echo "<th class='text-center'>".$tanggal->format('d') . "</th>";
                                }
                            ?>                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $query_mapel = "SELECT * FROM mapel";
                        if ($_SESSION['level'] == 'Kepala Sekolah') {
                            $query_mapel = "SELECT plotting_jadwal.id_plotting, plotting_jadwal.id_siswa, mapel.nm_mapel, mapel.id_mapel FROM plotting_jadwal
                            JOIN mapel ON plotting_jadwal.id_mapel = mapel.id_mapel 
                            WHERE plotting_jadwal.id_periode = " . $_GET['id_periode'] . " 
                            AND plotting_jadwal.id_kelas = " . $kelas['id_kelas'] . " 
                            GROUP BY plotting_jadwal.id_siswa 
                            ";
                        }else if ($_SESSION['level'] == 'Guru') {
                            $gurux = QueryOnedata("SELECT * FROM guru WHERE id_user = " . $_SESSION['id_user'] . " ")->fetch_assoc();
                            $query_mapel = "SELECT plotting_jadwal.id_plotting, plotting_jadwal.id_siswa, mapel.nm_mapel, mapel.id_mapel FROM plotting_jadwal
                            JOIN mapel ON plotting_jadwal.id_mapel = mapel.id_mapel 
                            WHERE plotting_jadwal.id_periode = " . $_GET['id_periode'] . " 
                            AND plotting_jadwal.id_kelas = " . $kelas['id_kelas'] . " 
                            AND mapel.id_guru = " . $gurux['id_guru'] . "  
                            GROUP BY plotting_jadwal.id_siswa 
                            ";
                        } else  if($_SESSION['level'] == 'Orang Tua'){
                            $siswax = QueryOnedata("SELECT * FROM siswa WHERE id_user = " . $_SESSION['id_user'] . " ")->fetch_assoc();
                            $query_mapel = "SELECT plotting_jadwal.id_plotting, plotting_jadwal.id_siswa, mapel.nm_mapel, mapel.id_mapel FROM plotting_jadwal
                            JOIN mapel ON plotting_jadwal.id_mapel = mapel.id_mapel 
                            WHERE plotting_jadwal.id_periode = " . $_GET['id_periode'] . " 
                            AND plotting_jadwal.id_kelas = " . $kelas['id_kelas'] . " 
                            AND plotting_jadwal.id_siswa = " . $siswax['id_siswa'] . "  
                            GROUP BY plotting_jadwal.id_siswa 
                            ";
                        }
                        $no = 1;
                        foreach (QueryManyData($query_mapel) as $row) {
                            $query_siswa = "SELECT * FROM siswa WHERE id_siswa = " . $row['id_siswa'] . " ";
                            $siswa = QueryOnedata($query_siswa)->fetch_assoc();
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
                                <td><?= $siswa['nm_siswa'] ?></td>   
                                <?php 
                                foreach ($months as $tanggal) {
                                    $check_kehadiran = QueryOnedata("SELECT * FROM kehadiran_siswa WHERE id_plotting = ".$row['id_plotting'] ." AND tgl_kehadiran = '".$tanggal->format('Y-m-d') . "' ");
                                    if( $check_kehadiran->num_rows > 0){
                                        echo "<td>".$check_kehadiran->fetch_assoc()['jenis_kehadiran']. "</td>";
                                    }else{
                                        echo "<td></td>";
                                    }
                                }
                                ?>                              
                            </tr>                                    
                        <?php
                        }
                        ?>                        
                    </tbody>
                </table>
                <?php 
                } ?>
                <br>
                <a href='<?= $url ?>/app/kehadiran_siswa/kelas.php?id_periode=<?= $_GET['id_periode'] ?>&id_kelas=<?= $_GET['id_kelas'] ?>' class='btn btn-default btn-sm '>
                    <i class='fa fa-reply'></i> kembali
                </a><!-- /.box-body -->
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="AddJadwal" tabindex="-1" role="dialog" aria-labelledby="AddJadwalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="AddJadwalLabel">Tambah Jadwal <span id="hariX"></span> <span id="jamX"></span></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="<?= $url ?>/aksi/penilaian.php" method="post" enctype="multipart/form-data">
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="inputmapel" class="col-sm-3 col-form-label">Mata Pelajaran</label>
                                <div class="col-sm-9">
                                    <select class="form-control" name="id_mapel" id="inputmapel">
                                        <?php
                                        $mapel = QueryManyData("SELECT * FROM mapel");
                                        foreach ($mapel  as $val) { ?>
                                            <option value="<?= $val['id_mapel'] ?>"><?= $val['nm_mapel'] ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <br>
                            <br>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>add</th>
                                        <th>NIS</th>
                                        <th>Data Siswa</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach (QueryManyData("SELECT * FROM siswa WHERE status = 'aktif'") as $row) { ?>
                                        <tr>
                                            <td><input type="checkbox" name="id_siswa[]" value="<?= $row['id_siswa'] ?>" id=""></td>
                                            <td><?= $row['nis'] ?> </td>
                                            <td> <?= $row['nm_siswa'] ?> </td>
                                        </tr>
                                    <?php
                                    } ?>
                                </tbody>
                            </table>
                            <div style="display: none;">
                                <input type="text" name="id_kelas" value="<?= $_GET['id_kelas'] ?>" class="form-control">
                                <input type="text" name="id_periode" value="<?= $_GET['id_periode'] ?>" class="form-control">
                                <input type="text" name="hari" id="hariI" class="form-control">
                                <input type="time" name="jam_awal" id="jam_awalI" class="form-control">
                                <input type="time" name="jam_akhir" id="jam_akhirI" class="form-control">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" name="BTN_POST_ADD_PLOTTING" value="BTN_POST_ADD_PLOTTING" class="btn btn-primary">Proses</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="DetailJadwal" tabindex="-1" role="dialog" aria-labelledby="DetailJadwalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="DetailJadwalLabel">Detail Jadwal <span id="hariX"></span> <span id="jamX"></span></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="<?= $url ?>/aksi/penilaian.php" method="PUT" enctype="multipart/form-data">
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="inputmapel" class="col-sm-3 col-form-label">Mata Pelajaran</label>
                                <div class="col-sm-9">
                                    <select class="form-control" name="id_mapel" id="inputmapel">
                                    </select>
                                </div>
                            </div>
                            <br>
                            <br>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>NIS</th>
                                        <th>Data Siswa</th>
                                        <th>delete</th>
                                    </tr>
                                </thead>
                                <tbody id="bodydetailjadwal">
                                </tbody>
                            </table>
                            <div style="display: none;">
                                <input type="text" name="id_kelas" value="<?= $_GET['id_kelas'] ?>" class="form-control">
                                <input type="text" name="id_periode" value="<?= $_GET['id_periode'] ?>" class="form-control">
                                <input type="text" name="hari" id="hariI" class="form-control">
                                <input type="time" name="jam_awal" id="jam_awalI" class="form-control">
                                <input type="time" name="jam_akhir" id="jam_akhirI" class="form-control">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" name="BTN_POST_ADD_PLOTTING" value="BTN_POST_ADD_PLOTTING" class="btn btn-primary">Proses</button>
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

            function DetailModal(hari, jamL, id_mapel, id_periode, id_kelas) {
                dataX = {
                    detail_jadwal: "searc_jadwal",
                    hari: hari,
                    jam_awal: jamL,
                    id_mapel: id_mapel,
                    id_periode: id_periode,
                    id_kelas: id_kelas,
                };
                $.ajax({
                    url: '<?= $url ?>/aksi/ajax.php', // Ganti dengan URL file server Anda
                    method: 'POST',
                    data: dataX,
                    success: function(response) {
                        var trBody = "";
                        if (response.code == 200) {
                            for (let yt = 0; yt < response.data.length; yt++) {
                                trBody += `<tr><td>` + response.data[yt].nis + `</td><td>` + response.data[yt].nm_siswa + `</td> <td> <button class="btn btn-danger" onClick="HapusPlot(` + response.data[yt].id_plotting + `);" >Hapus</button> </td> </tr>`;
                            }
                        }
                        document.getElementById("bodydetailjadwal").innerHTML = trBody;
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