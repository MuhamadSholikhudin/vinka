<?php include_once '../template/header.php'; ?>
<?php include_once '../template/navbar.php'; ?>
<?php include_once '../template/sidebar.php'; ?>
<div class='content-wrapper'>
  <section class='content-header'>
    <h1>Pendaftaran Siswa page
    </h1>
    <ol class='breadcrumb'>
      <li><a href='#'><i class='fa fa-dashboard'></i> Index</a></li>
      <li class='active'>Pendaftaran Siswa page</li>
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
    <?php if ($_SESSION['level'] == 'Orang Tua') {
      $chek_pendaftaran = QueryOnedata('SELECT * FROM pendaftaran_siswa WHERE id_user = ' . $_SESSION['id_user'] . '');
      if ($chek_pendaftaran->num_rows <= 1) {
    ?>
        <a class='btn btn-social-icon btn-info' data-toggle='tooltip' data-placement='top' title='Tambah data pendaftaran_siswa' href='<?= $url ?>/app/pendaftaran_siswa/tambah.php'><i class='fa fa-plus'></i></a>
      <?php }
    } else { ?>
      <a class='btn btn-social-icon btn-info' data-toggle='tooltip' data-placement='top' title='Tambah data pendaftaran_siswa' href='<?= $url ?>/app/pendaftaran_siswa/tambah.php'><i class='fa fa-plus'></i></a>
    <?php } ?>
    <div class='row'>
      <div class='col-xs-12'>
        <div class='box'>
          <div class='box-header'>
            <h3 class='box-title'>Data Pendaftaran Siswa</h3>
          </div>
          <div class='box-body'>
            <table id='example1' class='table table-bordered table-striped'>
              <thead>
                <tr>
                  <th>PERIODE</th>
                  <th>USER</th>
                  <th>TANGGAL DAFTAR</th>
                  <th>NAMA SISWA</th>
                  <th>JK SISWA</th>
                  <th>ALAMAT SISWA</th>
                  <th>NAMA WALI MURID</th>
                  <th>FOTO SISWA</th>
                  <th>STATUS</th>
                  <th>BERKAS</th>
                  <th>AKSI</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $pendaftaran_siswa = 'SELECT * FROM pendaftaran_siswa';
                if ($_SESSION['level'] == 'Orang Tua') {
                  $pendaftaran_siswa = 'SELECT * FROM pendaftaran_siswa WHERE id_user = ' . $_SESSION['id_user'] . ' ';
                } else if ($_SESSION['level'] == 'Seksi Tata Usaha') {
                  $pendaftaran_siswa = 'SELECT * FROM pendaftaran_siswa WHERE status_pendaftaran = "kirim" OR status_pendaftaran = "data di terima" ';
                }
                foreach (QueryManyData($pendaftaran_siswa) as $row) {
                  $periode = QueryOnedata("SELECT * FROM periode WHERE id_periode = " . $row['id_periode'] . "")->fetch_assoc();
                  $user = QueryOnedata("SELECT * FROM user WHERE id_user = " . $row['id_user'] . "")->fetch_assoc();
                ?>
                  <tr>
                    <td><?= $periode['nm_periode'] ?></td>
                    <td><?= $user['username'] ?></td>
                    <td><?= $row['tgl_daftar'] ?></td>
                    <td><?= $row['nm_siswa'] ?></td>
                    <td><?= $row['jk_siswa'] ?></td>
                    <td><?= $row['alamat_siswa'] ?></td>
                    <td><?= $row['nm_wali_murid'] ?></td>
                    <td> <img src="<?= $url . '/foto/foto_siswa/' . $row['foto_siswa']; ?>" alt="" srcset="" style="width: 50px; height:50px;"> </td>
                    <td>
                      <?= $row['status_pendaftaran'] ?>
                    </td>
                    <td>
                      <?php
                      $check_berkas = QueryOnedata('SELECT * FROM berkas_pendaftaran WHERE id_pendaftaran = ' . $row['id_pendaftaran'] . '');
                      if ($check_berkas->num_rows > 0) { // Jika Sudah Upload Berkas 
                      ?>
                        <a href='<?= $url ?>/app/pendaftaran_siswa/upload_berkas_edit.php?id_pendaftaran=<?= $row['id_pendaftaran'] ?>' class='btn bg-olive btn-flat btn-sm'><i class='fa fa-edit'></i> edit</a>
                      <?php } else {  //Jika belum upload berkas 
                      ?>
                        <a href='<?= $url ?>/app/pendaftaran_siswa/upload_berkas.php?id_pendaftaran=<?= $row['id_pendaftaran'] ?>' class='btn bg-info btn-flat btn-sm'><i class='fa fa-plus'></i> upload</a>
                      <?php } ?>
                    </td>
                    <td>
                      <?php
                      if ($_SESSION['level'] == 'Orang Tua') {
                        if ($row['status_pendaftaran'] == 'belum lengkap' || $row['status_pendaftaran'] == '' || $row['status_pendaftaran'] == NULL) {
                      ?>
                          <a href='<?= $url ?>/aksi/pendaftaran_siswa.php?id_pendaftaran=<?= $row['id_pendaftaran'] ?>&action=kirim' class='btn bg-success btn-flat btn-sm'><i class='fa fa-arrow-circle-o-right'></i> Kirim</a>
                          <a href='<?= $url ?>/app/pendaftaran_siswa/edit.php?id_pendaftaran=<?= $row['id_pendaftaran'] ?>' class='btn bg-olive btn-flat btn-sm'><i class='fa fa-edit'></i> edit</a>
                          <button onclick="ConfirmDelete(<?= $row['id_pendaftaran'] ?>, '<?= $row['foto_siswa'] ?>')" class='btn bg-maroon btn-flat btn-sm'>
                            <i class='fas fa-trash'></i>
                            hapus
                          </button>
                        <?php
                        } else if ($row['status_pendaftaran'] == 'kirim') {
                        ?>
                          <a href='<?= $url ?>/aksi/pendaftaran_siswa.php?id_pendaftaran=<?= $row['id_pendaftaran'] ?>&action=belum lengkap' class='btn bg-success btn-flat btn-sm'><i class='fa fa-arrow-circle-o-left'></i> Tarik dan lengkapi data</a>
                        <?php
                        } else if ($row['status_pendaftaran'] == 'data diterima') {
                        ?>
                          <a href='£' class='btn bg-success btn-flat btn-sm'><i class='fa fa-check'></i> VALID</a>
                        <?php
                        }
                      } else if ($_SESSION['level'] == 'Seksi Tata Usaha') {
                        ?>
                        <button type="button" class="btn bg-grey btn-flat btn-sm" data-toggle="modal" onClick="Siswa(<?= $row['id_pendaftaran'] ?>, '<?= $row['nm_siswa'] ?>');" data-target="#modal-tidak-terima">
                          Validasi
                        </button>
                        <!-- <a href='<?= $url ?>/aksi/pendaftaran_siswa.php?id_pendaftaran=<?= $row['id_pendaftaran'] ?>&action=data di terima' class='btn bg-primary btn-flat btn-sm'><i class='fa fa-check'></i> Terima Data Pendaftaran</a> -->
                        <!-- <a href='<?= $url ?>/aksi/pendaftaran_siswa.php?id_pendaftaran=<?= $row['id_pendaftaran'] ?>&action=belum lengkap' class='btn bg-success btn-flat btn-sm'><i class='fa fa-arrow-circle-o-left'></i> Lengkapi data</a> -->
                      <?php
                      }
                      ?>
                      <a href='<?= $url ?>/app/pendaftaran_siswa/detail.php?id_pendaftaran=<?= $row['id_pendaftaran'] ?>' class='btn bg-info btn-flat btn-sm'><i class='fa fa-eye'></i> detail</a>
                    </td>
                  </tr>
                <?php
                }
                ?>
              </tbody>
            </table>
            <script>
              function Siswa(id, nm_pendaftar){
                document.getElementById('nm_pendaftar').textContent = nm_pendaftar;
                document.getElementById('calon_siswa_1').textContent = nm_pendaftar;
                document.getElementById('calon_siswa_2').textContent = nm_pendaftar;
                document.getElementById('calon_siswa_3').textContent = nm_pendaftar;

                document.getElementById('id_pendaftaran').value = id;
              }
              
            function myFunction(val) {
              // alert("The input value has changed. The new value is: " + val);
                var alasan =  document.getElementById('alasan').value;
                document.getElementById('output_alasan_1').textContent = alasan;
                document.getElementById('output_alasan_2').textContent = alasan;
                document.getElementById('output_alasan_3').textContent = alasan;

                if(val == "belum lengkap"){
                  document.getElementById('belum_lengkap').style.display = "";
                  document.getElementById('tidak_menerima').style.display = "none";
                  document.getElementById('data_di_terima').style.display = "none";

                }else if(val == "tidak menerima"){
                  document.getElementById('belum_lengkap').style.display = "none";
                  document.getElementById('tidak_menerima').style.display = "";
                  document.getElementById('data_di_terima').style.display = "none";
                }else if(val == "data di terima"){
                  document.getElementById('belum_lengkap').style.display = "none";
                  document.getElementById('tidak_menerima').style.display = "none";
                  document.getElementById('data_di_terima').style.display = "";
                }
            }
            function textchange(val) {
              // alert("The input value has changed. The new value is: " + val);
                var alasan =  document.getElementById('alasan').value;
                document.getElementById('output_alasan_1').textContent = alasan;
                document.getElementById('output_alasan_2').textContent = alasan;
                document.getElementById('output_alasan_3').textContent = alasan;                
            }

            </script>
            <div class="modal fade in" id="modal-tidak-terima">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span></button>
                    <h4 class="modal-title">Form Validasi  Pendaftaran <span id="nm_pendaftar"></span></h4>
                  </div>
                  <form action="<?= $url ?>/aksi/pendaftaran_siswa.php" method="get">
                  <div class="modal-body">
                    <div class='box-body'>
                      <div class='form-group row'>
                        <label for='inputaction' class='col-sm-3 col-form-label'>Status Pendaftaran</label>
                        <div class='col-sm-9'>
                          <select class="form-control" name="action" id="action" onclick="myFunction(this.value)">
                            <option value="belum lengkap">Belum Lengkap</option>
                            <option value="tidak menerima">Tidak Menerima</option>
                            <option value="data di terima">Data di Terima</option>
                          </select>
                        </div>
                      </div>
                      <div class='form-group row'>
                      <label for='inputaction' class='col-sm-3 col-form-label'>Pesan Notifikasi WA</label>
                      <div class='col-sm-9'>
                        <p id="belum_lengkap" style="display: none;">
                          Pengumuman Penerimaan Siswa Baru MI AL-Hidayah Pati Puri <br>
                          Pendaftaran siswa baru atas Nama <b><span id="calon_siswa_1">CALON SISWA</span></b> di MI Al-Hidayah telah Belum Lengkap.<br>
                          Silakan melakukan lengkapi data anda : <br>
                          <b><span id="output_alasan_1">alasan</span></b> <br>
                          Terima kasih atas partisipasinya. Segera lengkapi data anda sebelum pendaftaran di tutup.<br>
                        </p>

                        <p id="tidak_menerima" style="display: none;">
                          Pengumuman Penerimaan Siswa Baru MI AL-Hidayah Pati Puri <br>
                          Pendaftaran siswa baru atas Nama <b><span id="calon_siswa_2">CALON SISWA</span></b> di MI Al-Hidayah tidak dapat menerima pendafataran.<br>
                          dengan alasan : <br>
                          <b><span id="output_alasan_2">alasan</span></b> <br>
                          Terima kasih atas partisipasinya anda.<br>
                        </p>
                        <p id="data_di_terima" style="display: none;">
                            Pengumuman Penerimaan Siswa Baru MI AL-Hidayah Pati Puri <br>
                            Selamat! Pendaftaran siswa baru atas Nama <b><span id="calon_siswa_3">CALON SISWA</span></b> di MI Al-Hidayah telah DITERIMA.<br>
                            Silakan melakukan registrasi ulang di sekolah dengan menemui Seksi Tata Usaha <br>
                            <b><span id="output_alasan_3">alasan</span></b> <br>
                            Terima kasih dan kami tunggu kehadirannyaa.<br>
                        </p>
                      </div>
                      </div>
                      <div class='form-group row'>
                        <label for='inputalasan' class='col-sm-3 col-form-label'>Alasan</label>
                        <div class='col-sm-9'>
                          <textarea class="form-control" name="alasan" id="alasan" onkeydown="textchange(this.value)" onkeyup="textchange(this.value)"></textarea>
                          <input type="number" name="id_pendaftaran" id="id_pendaftaran" style="display : none;" >
                        </div>
                      </div>
                    </div>  
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-grey"> <i class="fas fa-save"></i> Proses</button>
                  </div>
                  </form>
                </div>
                <!-- /.modal-content -->
              </div>
              <!-- /.modal-dialog -->
            </div>
          </div>
        </div>
        <script>
          function ConfirmDelete(id, gambar) {
            let text = 'Apakah Anda Yakin Ingin Menghapus data!\n OK or Cancel.';
            if (confirm(text) == true) {
              text = 'You pressed OK!';
              window.location.href = '<?= $url ?>/aksi/pendaftaran_siswa.php?id_pendaftaran=' + id + '&action=delete&foto_siswa' + gambar
            }
          }
        </script>
      </div>
    </div>
</div>
<?php include_once '../template/footer.php'; ?>