<?php
include '../config/config.php';
session_start();
$url_wa = 'https://console.zenziva.net/wareguler/api/sendWA/';
$userkey = '9b85e05d0de7';
$passkey = '83f0dd70ecb6c588f2ab2cc3';
if (isset($_POST['simpanpendaftaran_siswa'])) {

        $ekstensi_diperbolehkan = array('png', 'jpg', 'jpeg');
        $nama_file = $_FILES['foto_siswa']['name'];
        $x = explode('.', $nama_file);
        $ekstensi = strtolower(end($x));
        $ukuran   = $_FILES['foto_siswa']['size'];
        $file_tmp = $_FILES['foto_siswa']['tmp_name'];

        if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
                if ($ukuran < 2088140) {
                        $nama_file = $YMDhis . $_FILES['foto_siswa']['name'];
                        $upload_foto_siswa = move_uploaded_file($file_tmp, $lokasi_foto . "/siswa/" . $nama_file);
                        if ($upload_foto_siswa) {                              
                                $data = [
                                        'id_periode' => $_POST['id_periode'],
                                        'id_user' => $_POST['id_user'],
                                        'tgl_daftar' => $_POST['tgl_daftar'],
                                        'nm_siswa' => $_POST['nm_siswa'],
                                        'jk_siswa' => $_POST['jk_siswa'],
                                        'alamat_siswa' => $_POST['alamat_siswa'],
                                        'asal_sekolah' => $_POST['asal_sekolah'],
                                        'nm_orang_tua' => $_POST['nm_orang_tua'],
                                        'nm_wali_murid' => $_POST['nm_wali_murid'],
                                        'no_hp_orang_tua' => $_POST['no_hp_orang_tua'],
                                        'foto_siswa' => $nama_file,
                                ];
                                // Insert satu data
                                $process = InsertOnedata('pendaftaran_siswa', $data);
                                $_SESSION['message'] = 'Data Pendaftaran Siswa ' . $process['message'];
                                $_SESSION['message_code'] =  $process['code'];
                        } else {
                                $process['message'] = 'UPLOAD FOTO TIDAK BERHASIL';
                                $_SESSION['message_code'] =  400;
                        }
                } else {
                        $process['message'] = 'UKURAN FILE TERLALU BESAR';
                        $_SESSION['message_code'] =  400;
                }
        } else {
                $process['message'] = 'EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN';
                $_SESSION['message_code'] =  400;
        }

        header('Location: ' . $url . '/app/pendaftaran_siswa/index.php');
        exit();
} elseif (isset($_POST['updatependaftaran_siswa'])) {
        $nama_file = $_POST['foto_siswa_old'];
        if (isset($_FILES['foto_siswa'])) {
                $ekstensi_diperbolehkan = array('png', 'jpg', 'jpeg');
                $nama_file = $_FILES['foto_siswa']['name'];
                $x = explode('.', $nama_file);
                $ekstensi = strtolower(end($x));
                $ukuran    = $_FILES['foto_siswa']['size'];
                $file_tmp = $_FILES['foto_siswa']['tmp_name'];

                if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
                        if ($ukuran < 2088140) {
                                $nama_file = $YMDhis . $_FILES['foto_siswa']['name'];
                                unlink($lokasi_foto . "/foto_siswa/" .  $_POST['foto_siswa_old']);
                                $upload_guru =  move_uploaded_file($file_tmp, $lokasi_foto . "/foto_siswa/" . $nama_file);
                        } else {
                                $nama_file = $_POST['foto_siswa_old'];
                        }
                } else {
                        $nama_file = $_POST['foto_siswa_old'];
                }
        }

        // Data yang ingin Execution
        $data = [
                'id_periode' => $_POST['id_periode'],
                'id_user' => $_POST['id_user'],
                'tgl_daftar' => $_POST['tgl_daftar'],
                'nm_siswa' => $_POST['nm_siswa'],
                'jk_siswa' => $_POST['jk_siswa'],
                'alamat_siswa' => $_POST['alamat_siswa'],
                'asal_sekolah' => $_POST['asal_sekolah'],
                'nm_orang_tua' => $_POST['nm_orang_tua'],
                'nm_wali_murid' => $_POST['nm_wali_murid'],
                'no_hp_orang_tua' => $_POST['no_hp_orang_tua'],
                'foto_siswa' => $nama_file,
        ];
        // Update data berdasarkan
        $process = UpdateOneData('pendaftaran_siswa', $data, ' WHERE id_pendaftaran =' . $_POST['id_pendaftaran'] . '');
        $_SESSION['message'] = 'Data Pendaftaran Siswa ' . $process['message'];
        $_SESSION['message_code'] =  $process['code'];
        header('Location: ' . $url . '/app/pendaftaran_siswa/index.php');
        exit();
} elseif ($_GET['action'] == 'belum lengkap') {
        // Data yang ingin Execution
        $data = [
                'status_pendaftaran' => $_GET['action'],
        ];

        $pendaftaran_siswa = QueryOnedata('SELECT * FROM pendaftaran_siswa WHERE id_pendaftaran = ' . $_GET['id_pendaftaran'] . '')->fetch_assoc();
        $dataX = [];        
        array_push($dataX, $pendaftaran_siswa);
        $message = "Pengumuman Penerimaan Siswa Baru MI AL-Hidayah Pati Puri \n
Pendaftaran siswa baru atas Nama ".$dataX[0]['nm_siswa']." di MI Al-Hidayah telah Belum Lengkap.\n
Silakan melakukan lengkapi data anda : .\n
".$_GET['alasan']."
Terima kasih atas partisipasinya. Segera lengkapi data anda sebelum pendaftaran di tutup.\n

Jika ada penyesuaian lain yang diinginkan, silakan beri tahu!";
        $satu = zen($url_wa, $userkey, $passkey, '0' . $dataX[0]['no_hp_orang_tua'], $message);

        // Update data berdasarkan
        $process = UpdateOneData('pendaftaran_siswa', $data, ' WHERE id_pendaftaran =' . $_GET['id_pendaftaran'] . '');
        $_SESSION['message'] = 'Data Pendaftaran Siswa belum lengkap. Isi data sesuai dengan data diri yang benar';
        $_SESSION['message_code'] =  $process['code'];
        header('Location: ' . $url . '/app/pendaftaran_siswa/index.php');
        exit();
} elseif ($_GET['action'] == 'tidak menerima') {
        // Data yang ingin Execution
        $data = [
                'status_pendaftaran' => $_GET['action'],
        ];
        $pendaftaran_siswa = QueryOnedata('SELECT * FROM pendaftaran_siswa WHERE id_pendaftaran = ' . $_GET['id_pendaftaran'] . '')->fetch_assoc();
        $data = [];        
        array_push($data, $pendaftaran_siswa);
        $message = "Pengumuman Penerimaan Siswa Baru MI AL-Hidayah Pati Puri \n
Pendaftaran siswa baru atas Nama ".$data[0]['nm_siswa']." di MI Al-Hidayah telah Tidak Menerima.\n
Karena ".$_GET['alasan']." \n
Terima kasih atas partisipasinya anda.";
        $satu = zen($url_wa, $userkey, $passkey, '0' . $data[0]['no_hp_orang_tua'], $message);

        // Update data berdasarkan
        $process = UpdateOneData('pendaftaran_siswa', $data, ' WHERE id_pendaftaran =' . $_GET['id_pendaftaran'] . '');
        $_SESSION['message'] = 'Data Pendaftaran Siswa belum lengkap. Isi data sesuai dengan data diri yang benar';
        $_SESSION['message_code'] =  $process['code'];
        header('Location: ' . $url . '/app/pendaftaran_siswa/index.php');
        exit();

} elseif ($_GET['action'] == 'data di terima') {
        // Data yang ingin Execution
        $data = [
                'status_pendaftaran' => $_GET['action'],
        ];

        $pendaftaran_siswa = QueryOnedata('SELECT * FROM pendaftaran_siswa WHERE id_pendaftaran = ' . $_GET['id_pendaftaran'] . '')->fetch_assoc();
        $data = [];        
        array_push($data, $pendaftaran_siswa);
        $message = "Pengumuman Penerimaan Siswa Baru \n
Selamat! Pendaftaran siswa baru atas Nama ".$data[0]['nm_siswa']." di MI Al-Hidayah telah DITERIMA.\n
Silakan melakukan registrasi ulang di sekolah dengan menemui Seksi Tata Usaha.\n

Terima kasih dan kami tunggu kehadirannya.\n

Jika ada penyesuaian lain yang diinginkan, silakan beri tahu!";
        $satu = zen($url_wa, $userkey, $passkey, '0' . $data[0]['no_hp_orang_tua'], $message);

        // Update data berdasarkan
        $process = UpdateOneData('pendaftaran_siswa', $data, ' WHERE id_pendaftaran =' . $_GET['id_pendaftaran'] . '');
        $_SESSION['message'] = 'Data Pendaftaran Siswa sudah valid data siswa dapat ditambahkan !';
        $_SESSION['message_code'] =  $process['code'];
        header('Location: ' . $url . '/app/pendaftaran_siswa/index.php');

} elseif ($_GET['action'] == 'kirim') {
        // Data yang ingin Execution
        $data = [
                'status_pendaftaran' => $_GET['action'],
        ];
        // Update data berdasarkan
        $process = UpdateOneData('pendaftaran_siswa', $data, ' WHERE id_pendaftaran =' . $_GET['id_pendaftaran'] . '');
        $_SESSION['message'] = 'Data Pendaftaran Siswa dikirim Menunggu Validasi dari Tata Usaha Sekolah';
        $_SESSION['message_code'] =  $process['code'];
        header('Location: ' . $url . '/app/pendaftaran_siswa/index.php');
        exit();
} elseif ($_GET['action'] == 'delete') {
        unlink($lokasi_foto . "/foto_siswa/" .  $_GET['foto_siswa']);
        $process = DeleteOneData('pendaftaran_siswa', 'WHERE id_pendaftaran = ' . $_GET['id_pendaftaran'] . '');
        $_SESSION['message'] = 'Data Pendaftaran Siswa ' . $process['message'];
        $_SESSION['message_code'] =  $process['code'];
        header('Location: ' . $url . '/app/pendaftaran_siswa/index.php');
        exit();
}
