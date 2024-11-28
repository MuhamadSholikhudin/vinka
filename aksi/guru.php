<?php
include '../config/config.php';
session_start();
if (isset($_POST['simpanguru'])) {
        $ekstensi_diperbolehkan = array('png', 'jpg');
        $nama_file = $_FILES['foto_guru']['name'];
        $x = explode('.', $nama_file);
        $ekstensi = strtolower(end($x));
        $ukuran   = $_FILES['foto_guru']['size'];
        $file_tmp = $_FILES['foto_guru']['tmp_name'];       
        if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
                if ($ukuran < 1044070) {
                        $nama_file = $YMDhis. $_FILES['foto_guru']['name'];
                        $upload_guru = move_uploaded_file($file_tmp, $lokasi_foto."/guru/" . $nama_file);          
                        if ($upload_guru) {
                                // Data yang ingin Execution
                                $data = [
                                        'nip' => $_POST['nip'],
                                        'id_user' => $_POST['id_user'],
                                        'nm_guru' => $_POST['nm_guru'],
                                        'no_guru' => $_POST['no_guru'],
                                        'jk_guru' => $_POST['jk_guru'],
                                        'alamat_guru' => $_POST['alamat_guru'],
                                        'foto_guru' => $nama_file,
                                ];
                                // Insert satu data
                                $process = InsertOnedata('guru', $data);
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
        $_SESSION['message'] = 'Data Guru ' . $process['message'];
        $_SESSION['message_code'] =  $process['code'];
        header('Location: ' . $url . '/app/guru/index.php');
        exit();
} elseif (isset($_POST['updateguru'])) {
        $nama_file = $_POST['foto_guru_old'];
        if (isset($_FILES['foto_guru'])) {
            $ekstensi_diperbolehkan = array('png', 'jpg', 'jpeg');
            $nama_file = $_FILES['foto_guru']['name'];
            $x = explode('.', $nama_file);
            $ekstensi = strtolower(end($x));
            $ukuran    = $_FILES['foto_guru']['size'];
            $file_tmp = $_FILES['foto_guru']['tmp_name'];
    
            if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
                if ($ukuran < 1044070) {
                    $nama_file = $YMDhis. $_FILES['foto_guru']['name'];
                    unlink($lokasi_foto ."/guru/".  $_POST['foto_guru_old']);
                    $upload_guru =  move_uploaded_file($file_tmp, $lokasi_foto ."/guru/". $nama_file);
                } else {
                    $nama_file = $_POST['foto_guru_old'];
                }
            } else {
                $nama_file = $_POST['foto_guru_old'];
            }
        }

        // Data yang ingin Execution
        $data = [
                'nip' => $_POST['nip'],
                'id_user' => $_POST['id_user'],
                'nm_guru' => $_POST['nm_guru'],
                'no_guru' => $_POST['no_guru'],
                'jk_guru' => $_POST['jk_guru'],
                'alamat_guru' => $_POST['alamat_guru'],
                'foto_guru' => $nama_file,
        ];
        // Update data berdasarkan
        $process = UpdateOneData('guru', $data, ' WHERE id_guru =' . $_POST['id_guru'] . '');
        $_SESSION['message'] = 'Data Guru ' . $process['message'];
        $_SESSION['message_code'] =  $process['code'];
        header('Location: ' . $url . '/app/guru/index.php');
        exit();
} elseif ($_GET['action'] == 'delete') {
        $process = DeleteOneData('guru', 'WHERE id_guru = ' . $_GET['id_guru'] . '');
        $_SESSION['message'] = 'Data Guru ' . $process['message'];
        $_SESSION['message_code'] =  $process['code'];
        header('Location: ' . $url . '/app/guru/index.php');
        exit();
}
