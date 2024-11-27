<?php
include '../config/config.php';
session_start();
if (isset($_POST['simpaninformasi_sekolah'])) {

        $ekstensi_diperbolehkan = array('png', 'jpg', 'jpeg');
        $nama_file = $_FILES['gambar_informasi']['name'];
        $x = explode('.', $nama_file);
        $ekstensi = strtolower(end($x));
        $ukuran   = $_FILES['gambar_informasi']['size'];
        $file_tmp = $_FILES['gambar_informasi']['tmp_name'];

        if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
                if ($ukuran < 2088140) {
                        $nama_file = $YMDhis . $_FILES['gambar_informasi']['name'];
                        $upload_gambar_informasi = move_uploaded_file($file_tmp, $lokasi_foto . "/gambar_informasi/" . $nama_file);
                        if ($upload_gambar_informasi) {
                                $data = [
                                        'judul_informasi' => $_POST['judul_informasi'],
                                        'ket_informasi' => $_POST['ket_informasi'],
                                        'gambar_informasi' => $nama_file,
                                        'tgl_post_informasi' => $_POST['tgl_post_informasi'],
                                ];
                                // Insert satu data
                                $process = InsertOnedata('informasi_sekolah', $data);
                                $_SESSION['message'] = 'Data Informasi Sekolah ' . $process['message'];
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

        header('Location: ' . $url . '/app/informasi_sekolah/index.php');
        exit();
} elseif (isset($_POST['updateinformasi_sekolah'])) {
        $nama_file = $_POST['gambar_informasi_old'];
        if (isset($_FILES['gambar_informasi'])) {
                $ekstensi_diperbolehkan = array('png', 'jpg', 'jpeg');
                $nama_file = $_FILES['gambar_informasi']['name'];
                $x = explode('.', $nama_file);
                $ekstensi = strtolower(end($x));
                $ukuran    = $_FILES['gambar_informasi']['size'];
                $file_tmp = $_FILES['gambar_informasi']['tmp_name'];

                if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
                        if ($ukuran < 2088140) {
                                $nama_file = $YMDhis . $_FILES['gambar_informasi']['name'];
                                unlink($lokasi_foto . "/gambar_informasi/" .  $_POST['gambar_informasi_old']);
                                $upload_guru =  move_uploaded_file($file_tmp, $lokasi_foto . "/gambar_informasi/" . $nama_file);
                        } else {
                                $nama_file = $_POST['gambar_informasi_old'];
                        }
                } else {
                        $nama_file = $_POST['gambar_informasi_old'];
                }
        }

        // Data yang ingin Execution
        $data = [
                'judul_informasi' => $_POST['judul_informasi'],
                'ket_informasi' => $_POST['ket_informasi'],
                'gambar_informasi' => $nama_file,
                'tgl_post_informasi' => $_POST['tgl_post_informasi'],
        ];
        // Update data berdasarkan
        $process = UpdateOneData('informasi_sekolah', $data, ' WHERE id_informasi =' . $_POST['id_informasi'] . '');
        $_SESSION['message'] = 'Data Informasi Sekolah ' . $process['message'];
        $_SESSION['message_code'] =  $process['code'];
        header('Location: ' . $url . '/app/informasi_sekolah/index.php');
        exit();
} elseif ($_GET['action'] == 'delete') {
        unlink($lokasi_foto . "/gambar_informasi/" .  $_GET['gambar_informasi']);
        $process = DeleteOneData('informasi_sekolah', 'WHERE id_informasi = ' . $_GET['id_informasi'] . '');
        $_SESSION['message'] = 'Data Informasi Sekolah ' . $process['message'];
        $_SESSION['message_code'] =  $process['code'];
        header('Location: ' . $url . '/app/informasi_sekolah/index.php');
        exit();
}
