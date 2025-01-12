<?php
include '../config/config.php';
session_start();
if (isset($_POST['simpansiswa'])) {
        $ekstensi_diperbolehkan = array('png', 'jpg');
        $nama_file = $_FILES['foto_siswa']['name'];
        $x = explode('.', $nama_file);
        $ekstensi = strtolower(end($x));
        $ukuran   = $_FILES['foto_siswa']['size'];
        $file_tmp = $_FILES['foto_siswa']['tmp_name'];       
        if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
                if ($ukuran < 10440700) {
                        $nama_file = $YMDhis. $_FILES['foto_siswa']['name'];
                        $upload_guru = move_uploaded_file($file_tmp, $lokasi_foto."/siswa/" . $nama_file);          
                        if ($upload_guru) {
                                // Data yang ingin Execution
                                $data = [
                                        'nis' => $_POST['nis'],
                                        'id_user' => $_POST['id_user'],
                                        'nm_siswa' => $_POST['nm_siswa'],
                                        'jk_siswa' => $_POST['jk_siswa'],
                                        'alamat_siswa' => $_POST['alamat_siswa'],
                                        'nm_orang_tua' => $_POST['nm_orang_tua'],
                                        'foto_siswa' => $nama_file,
                                ];
                                // Insert satu data
                                $process = InsertOnedata('siswa', $data);
                        } else {
                                $process['message'] = 'UPLOAD FOTO TIDAK BERHASIL';
                                $process['code'] = 400;
                        }
                } else {
                        $process['message'] = 'UKURAN FILE TERLALU BESAR';
                        $process['code'] = 400;
                }
        } else {
                $process['message'] = 'EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN';
                $process['code'] = 400;
        }
        $_SESSION['message'] = 'Data Siswa ' . $process['message'];
        $_SESSION['message_code'] =  $process['code'];
        header('Location: ' . $url . '/app/siswa/index.php');
        exit();
} elseif (isset($_POST['updatesiswa'])) {

        $nama_file = $_POST['foto_siswa_old'];
        if (isset($_FILES['foto_siswa'])) {
            $ekstensi_diperbolehkan = array('png', 'jpg', 'jpeg');
            $nama_file = $_FILES['foto_siswa']['name'];
            $x = explode('.', $nama_file);
            $ekstensi = strtolower(end($x));
            $ukuran    = $_FILES['foto_siswa']['size'];
            $file_tmp = $_FILES['foto_siswa']['tmp_name'];
    
            if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
                if ($ukuran < 10440700) {
                    $nama_file = $YMDhis. $_FILES['foto_siswa']['name'];
                    unlink($lokasi_foto ."/siswa/".  $_POST['foto_siswa_old']);
                    $upload_guru =  move_uploaded_file($file_tmp, $lokasi_foto ."/siswa/". $nama_file);
                } else {
                    $nama_file = $_POST['foto_siswa_old'];
                }
            } else {
                $nama_file = $_POST['foto_siswa_old'];
            }
        }

        // Data yang ingin Execution
        $data = [
                'nis' => $_POST['nis'],
                'id_user' => $_POST['id_user'],
                'nm_siswa' => $_POST['nm_siswa'],
                'jk_siswa' => $_POST['jk_siswa'],
                'alamat_siswa' => $_POST['alamat_siswa'],
                'nm_orang_tua' => $_POST['nm_orang_tua'],
                'foto_siswa' => $nama_file,
        ];
        // Update data berdasarkan
        $process = UpdateOneData('siswa', $data, ' WHERE id_siswa =' . $_POST['id_siswa'] . '');
        $_SESSION['message'] = 'Data Siswa ' . $process['message'];
        $_SESSION['message_code'] =  $process['code'];
        header('Location: ' . $url . '/app/siswa/index.php');
        exit();
} elseif ($_GET['action'] == 'delete') {

        $check_kelulusan = QueryOneData("SELECT * FROM kelulusan WHERE id_siswa = ".$_GET[id_siswa']."");
        if($check_kelulusan->num_rows > 0) {
            $_SESSION['message'] = 'Data Siswa Masih terhubung dengan data kelulusan';
            $_SESSION['message_code'] =  400;
            header('Location: ' . $url . '/app/siswa/index.php');
            exit();
        }
        $check_plotting = QueryOneData("SELECT * FROM plotting_jadwal WHERE id_siswa = ".$_GET[id_siswa']."");
        if($check_plotting->num_rows > 0) {
            $_SESSION['message'] = 'Data Siswa Masih terhubung dengan data Plotting Jadwal';
            $_SESSION['message_code'] =  400;
            header('Location: ' . $url . '/app/siswa/index.php');
            exit();
        }
        $process = DeleteOneData('siswa', 'WHERE id_siswa = ' . $_GET['id_siswa'] . '');
        $_SESSION['message'] = 'Data Siswa ' . $process['message'];
        $_SESSION['message_code'] =  $process['code'];
        header('Location: ' . $url . '/app/siswa/index.php');
        exit();
}
