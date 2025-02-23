<?php include_once '../template/header.php'; ?>
<?php include_once '../template/navbar.php'; ?>
<?php include_once '../template/sidebar.php';
$periode = QueryOnedata('SELECT * FROM periode WHERE id_periode = ' . $_GET['id_periode'] . '')->fetch_assoc();
$kelas = QueryOnedata('SELECT * FROM kelas WHERE id_kelas = ' . $_GET['id_kelas'] . '')->fetch_assoc();
$guru = QueryOnedata('SELECT * FROM guru WHERE id_guru = ' . $kelas['id_guru'] . '')->fetch_assoc();
?>
<div class='content-wrapper'>
    <section class='content-header'>
        <h1>Plotting Jadwal page
        </h1>
        <ol class='breadcrumb'>
            <li><a href='#'><i class='fa fa-dashboard'></i> Index</a></li>
            <li class='active'>Plotting Jadwal page</li>
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
                <h3 class="box-title">Periode <?= $periode['nm_periode'] ?> Kelas <?= $kelas['nm_kelas'] ?> Wali Kelas <?= $guru['nm_guru'] ?> </h3>       &nbsp; &nbsp; &nbsp;          
                <a target="_blank" href='<?= $url ?>/app/plotting_jadwal/cetak.php?id_periode=<?= $_GET['id_periode'] ?>&id_kelas=<?= $_GET['id_kelas'] ?>' class='btn btn-warning btn-sm '>
                    <i class='fa fa-print'></i> cetak
                </a><!-- /.box-body -->
            </div>
            <div class="box-body">
                <?php
                $hari = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
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
                            <th class='text-center'>Waktu</th>
                            <?php // Contoh penggunaan
                            foreach ($hari as $h) {
                                echo "<th class='text-center'>" . $h . "</th>";
                            }
                            ?>
                        </tr>
                    <tbody>
                        <?php // Contoh penggunaan
                        for ($j = 0; $j < count($jams); $j++) {
                            echo "<tr><td class='text-center'>" . $jams[$j] . "</td>";
                            foreach ($hari as $h) {
                                $query_jadwal = "SELECT * FROM plotting_jadwal WHERE hari = '" . $h . "' AND jam_awal = '" . $jams[$j] . ":00' AND id_periode = " . $_GET['id_periode'] . " AND id_kelas = " . $_GET['id_kelas'] . " ";
                                $check_jadwal = QueryOnedata($query_jadwal);
                                if ($check_jadwal->num_rows < 1) {
                                    echo "<td class='text-center'><button class='btn bg-info btn-flat margin'  data-toggle='modal' data-target='#AddJadwal' onClick='AddModal(`" . $h . "`, `" . $jams[$j] . ":00`,`";
                                    if (($j + 8) >= 10) {
                                        echo ($j + 8) . ":00:00`)' > Tambah</button></td>";
                                    } else {
                                        echo  "0" . ($j + 8) . ":00:00`)' > Tambah</button></td>";
                                    }
                                } else {
                                    $mapel = QueryOnedata("SELECT * FROM mapel WHERE id_mapel = " . $check_jadwal->fetch_assoc()['id_mapel'] . "")->fetch_assoc();
                                    echo "<td class='text-center'><button class='btn bg-purple btn-flat margin' data-toggle='modal' data-target='#DetailJadwal' onClick='DetailModal(`" . $h . "`, `" . $jams[$j] . ":00`, `" . $jams[($j+1)] . ":00`, " . $mapel['id_mapel'] . ", " . $_GET['id_periode'] . ", " . $_GET['id_kelas'] . ")'> " . $mapel['nm_mapel'] . "</button></td>";
                                }
                            }
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                    </thead>
                </table>
                <br>
                <a href='<?= $url ?>/app/plotting_jadwal/periode.php?id_periode=<?= $_GET['id_periode'] ?>' class='btn btn-default btn-sm '>
                    <i class='fa fa-reply'></i> kembali
                </a><!-- /.box-body -->
            </div>
        </div>
        <!-- Modal AddJadwal -->
        <div class="modal fade" id="AddJadwal" tabindex="-1" role="dialog" aria-labelledby="AddJadwalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="AddJadwalLabel">Tambah Jadwal <span id="hariX"></span> <span id="jamX"></span></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="<?= $url ?>/aksi/plotting_jadwal.php" method="post" enctype="multipart/form-data">
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

        <!-- Modal DetailJadwal -->
        <div class="modal fade" id="DetailJadwal" tabindex="-1" role="dialog" aria-labelledby="DetailJadwalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="DetailJadwalLabel">Detail Jadwal <span id="hariXE"></span> <span id="jamXE"></span></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="<?= $url ?>/aksi/plotting_jadwal.php" method="POST" enctype="multipart/form-data">
                        <div class="modal-body">
                            <div class="form-group mb-3">
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
                            <div class="form-group">
                                <p style="height: 20px;"></p>
                            </div>
                            <div class="form-group">
                                <label for="inputsiswa" class="col-sm-3 col-form-label">Siswa</label>
                                <div class="col-sm-7">
                                <select class="form-control" style="width: 100%;" name="id_siswa" id="inputsiswa">
                                    <?php
                                        $siswa = QueryManyData("SELECT * FROM siswa WHERE status = 'aktif' ");
                                        foreach ($siswa  as $val) { ?>
                                            <option value="<?= $val['id_siswa'] ?>"><?= $val['nm_siswa'] ?></option>
                                        <?php
                                        }
                                    ?>
                                </select>
                                </div>
                                <div class="col-sm-2">
                                    <span class="btn btn-primary btn-sm" onclick="AddTR()"> <i class="fa fa-plus"></i> Tambah</span>
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
                                <input type="text" name="hari" id="hariIE" class="form-control">
                                <input type="time" name="jam_awal" id="jam_awalIE" class="form-control">
                                <input type="time" name="jam_akhir" id="jam_akhirIE" class="form-control">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" name="BTN_POST_UPDATE_PLOTTING" value="BTN_POST_UPDATE_PLOTTING" class="btn btn-success"> <i class="fa fa-edit"></i> Update</button>
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

            function DetailModal(hari, jamL, jamR, id_mapel, id_periode, id_kelas) {
                document.getElementById("hariXE").textContent = hari;
                document.getElementById("jamXE").textContent = jamL;
                document.getElementById("hariIE").value = hari;
                document.getElementById("jam_awalIE").value = jamL;
                document.getElementById("jam_akhirIE").value = jamR;
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
                                trBody += `<tr id="removetr`+response.data[yt].id_plotting+`"><td>`+response.data[yt].nis+` <input style="display: none;" name="id_siswa[]"  value="`+response.data[yt].id_siswa+`"/></td><td>`+response.data[yt].nm_siswa+`</td> <td> <span class="btn btn-danger btn-sm" onClick="HapusPlot(`+response.data[yt].id_plotting+`);" >Hapus</span> </td> </tr>`;
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
            let elementtr = document.getElementById("removetr"+id);
            
            $.ajax({
                url: '<?= $url ?>/aksi/ajax.php', // Ganti dengan URL file server Anda
                method: 'POST',
                data: { id_plotting: id },
                success: function(response) {
                    alert(response[1]);
                    if(response[0] == 200){
                        elementtr.remove();
                    }
                },
                error: function(xhr, status, error) {
                    alert("Terjadi kesalahan: " + error);
                }
            });
          }
          function AddTR(){             
            let id_siswa =  document.getElementById("inputsiswa").value;            
            $.ajax({
                url: '<?= $url ?>/aksi/ajax.php', // Ganti dengan URL file server Anda
                method: 'POST',
                data: { id_siswa: id_siswa },
                success: function(response) {
                    let tbody = document.getElementById("bodydetailjadwal");
                    let newrow =  document.createElement("tr"); 
                    newrow.id = "removetr"+response.id_siswa+response.nis;
                    let cell1 =  document.createElement("td");
                    let cell2 =  document.createElement("td");
                    let cell3 =  document.createElement("td");
                    cell1.innerHTML = response.nis+'<input style="display:none;" name="id_siswa[]" value="'+response.id_siswa+'"/>';
                    cell2.textContent = response.nm_siswa;
                    cell3.innerHTML = '<span class="btn btn-danger btn-sm" onClick="HapusPlot('+response.id_siswa+response.nis+');" >Hapus</span> ';
                    newrow.appendChild(cell1);
                    newrow.appendChild(cell2);
                    newrow.appendChild(cell3);
                    tbody.appendChild(newrow);
                },
                error: function(xhr, status, error) {
                    alert("Terjadi kesalahan: " + error);
                }
            });
          }
        </script>
    </section>
</div>
<?php include_once '../template/footer.php'; ?>