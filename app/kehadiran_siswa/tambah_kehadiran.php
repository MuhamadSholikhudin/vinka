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
                <form action='<?= $url ?>/aksi/kehadiran_siswa.php' method='post' enctype='multipart/form-data' class='form-horizontal'>
                <table class="table">
                    <thead>
                        <tr class="text-center">
                            <th class="text-center">NO</th>
                            <th class="text-center">NAMA SISWA</th>
                            <th class="text-center">KEHADIRAN</th>
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
                        }
                        $no = 1;
                        foreach (QueryManyData($query_mapel) as $row) {
                            $siswa = QueryOnedata("SELECT * FROM siswa WHERE id_siswa = " . $row['id_siswa'] . " ")->fetch_assoc();
                        ?>                        
                            <tr>
                                <td>
                                    <?= $no++ ?>
                                    <?php 
                                    $id_penilaian = 0;
                                    ?>
                                    <input class="form-control" style="display: none;" type="number" name="id_penilaian[]" value="<?= $id_penilaian ?>" min="0" max="100" id="">
                                    <input class="form-control" style="display: none;" type="number" name="id_periode[]" value="<?= $_GET['id_periode'] ?>" min="0" max="100" id="">
                                    <input class="form-control" style="display: none;" type="number" name="id_kelas[]" value="<?= $_GET['id_kelas'] ?>" min="0" max="100" id="">
                                    <input class="form-control" style="display: none;" type="number" name="id_mapel[]" value="<?= $_GET['id_mapel'] ?>" min="0" max="100" id="">
                                    <input class="form-control" style="display: none;" type="number" name="id_siswa[]" value="<?= $row['id_siswa'] ?>" min="0" max="100" id="">
                                    <input class="form-control" style="display: none;" type="number" name="id_plotting[]" value="<?= $row['id_plotting'] ?>" min="0" max="100" id="">
                                </td>
                                <td><?= $siswa['nm_siswa'] ?></td>
                                <td>   
                                    <span>
                                        <input type="radio" name="jenis_kehadiran_<?= $row['id_plotting'] ?>[]" class="form-centrol" checked="checked" value="Masuk" id=""> Masuk &nbsp; 
                                    </span>
                                    <span>
                                        <input type="radio" name="jenis_kehadiran_<?= $row['id_plotting'] ?>[]" class="form-centrol" value="Izin" id=""> Izin &nbsp;
                                    </span>
                                    <span>
                                        <input type="radio" name="jenis_kehadiran_<?= $row['id_plotting'] ?>[]" class="form-centrol" value="Sakit" id=""> Sakit &nbsp;
                                    </span>
                                    <span>
                                        <input type="radio" name="jenis_kehadiran_<?= $row['id_plotting'] ?>[]" class="form-centrol" value="Alfa" id=""> Alfa &nbsp;
                                    </span>
                                 </td>
                            </tr>                                    
                        <?php
                        }
                        ?>
                        <tr style="background-color: blueviolet;">                      
                            <td style="color:white; text-align:center;">
                                Tanggal
                            </td>
                            <td> <input type="date" name="tanggal" class="form-control" id="" value="<?= date('Y-m-d') ?>"> </td>
                            <td class="text-center">
                                <button type="submit" class="btn btn-sm btn-block btn-success" name="TAMBAH_DATA_KEHADIRAN_SISWA" value="TAMBAH_DATA_KEHADIRAN_SISWA"> <i class="fa fa-save"></i> Simpan</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
                </form>
                <br>
                <a href='<?= $url ?>/app/kehadiran_siswa/kelas.php?id_periode=<?= $_GET['id_periode'] ?>&id_kelas=<?= $_GET['id_kelas'] ?>' class='btn btn-default btn-sm '>
                    <i class='fa fa-reply'></i> kembali
                </a><!-- /.box-body -->
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