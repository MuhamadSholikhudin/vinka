<?php include_once '../template/header.php'; ?>
<?php include_once '../template/navbar.php'; ?>
<?php include_once '../template/sidebar.php';
$periode = QueryOnedata('SELECT * FROM periode WHERE id_periode = ' . $_GET['id_periode'] . '')->fetch_assoc();
$kelas = QueryOnedata('SELECT * FROM kelas WHERE id_kelas = ' . $_GET['id_kelas'] . '')->fetch_assoc();
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
                <h3 class="box-title">Periode <?= $periode['nm_periode'] ?> Kelas <?= $kelas['nm_kelas'] ?> Wali Kelas <?= $guru['nm_guru'] ?> </h3>
            </div>
            <div class="box-body">
                <?php
                $hari = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'];
                $jams = ['07:00', '08:00', '09:00',  '10:00', '11:00', '12:00'];
                ?>
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
                        <tr>
                            <th>NO</th>
                            <th>MAPEL</th>

                            <th>TUGAS</th>
                            <th>UH</th>
                            <th>UTS</th>
                            <th>UAS</th>
                            <th>RATA - RATA</th>

                            <th>ACTION</th>
                        </tr>
                    </thead>
                    <body>
                        <?php 
                        $query_mapel = "SELECT * FROM mapel";
                        if($_SESSION['level'] == 'Guru'){
                            $gurux = QueryOnedata("SELECT * FROM guru WHERE id_user = ".$_SESSION['id_user']." ")->fetch_assoc();
                            $query_mapel = "SELECT plotting_jadwal.id_siswa, mapel.nm_mapel FROM plotting_jadwal
                            JOIN mapel ON plotting_jadwal.id_mapel = mapel.id_mapel 
                            WHERE plotting_jadwal.id_periode = ".$_GET['id_periode']." 
                            AND plotting_jadwal.id_kelas = ".$kelas['id_kelas']." 
                            AND mapel.id_guru = ".$gurux['id_guru']."  
                            GROUP BY plotting_jadwal.id_siswa";
                        }else{

                        }
                        $no = 1;
                        foreach(QueryManyData($query_mapel) as $row){
                            $siswa = QueryOnedata("SELECT * FROM siswa WHERE id_siswa = ".$row['id_siswa']." ")->fetch_assoc();
                        ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $siswa['nm_siswa'] ?></td>

                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>

                        </tr>
                        <?php 
                        }
                        ?>
                    </body>
                </table>

                <br>
                <a href='<?= $url ?>/app/penilaian/periode.php?id_periode=<?= $_GET['id_periode'] ?>&id_kelas=<?= $_GET['id_kelas'] ?>' class='btn btn-default btn-sm '>
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
                                        <?php
                                       
                                        ?>
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
                        if(response.code == 200 ){         
                            for(let yt = 0; yt < response.data.length; yt ++){
                                trBody += `<tr><td>`+response.data[yt].nis+`</td><td>`+response.data[yt].nm_siswa+`</td> <td> <button class="btn btn-danger" onClick="HapusPlot(`+response.data[yt].id_plotting+`);" >Hapus</button> </td> </tr>`;
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