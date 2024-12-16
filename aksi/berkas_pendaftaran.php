<?php
include '../config/config.php';
session_start();
if (isset($_POST['simpanberkas_pendaftaran'])) {
        for($lop = 0; $lop < count($_POST['nm_berkas']) ; $lop++){
                $ekstensi_diperbolehkan = array('pdf');
                $nama_file = $_FILES['file_berkas']['name'][$lop];
                $x = explode('.', $nama_file);
                $ekstensi = strtolower(end($x));
                $ukuran   = $_FILES['file_berkas']['size'][$lop];
                $file_tmp = $_FILES['file_berkas']['tmp_name'][$lop];      
                if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
                        if ($ukuran < 10088140) {
                                $nama_file = $YMDhis . $_FILES['file_berkas']['name'][$lop];
                                $upload_file_berkas = move_uploaded_file($file_tmp, $lokasi_foto . "/berkas_pendaftaran/" . $nama_file);
                                if ($upload_file_berkas) {                                 
                                        $data = [
                                                'id_pendaftaran' => $_POST['id_pendaftaran'],
                                                'nm_berkas' => $_POST['nm_berkas'][$lop],
                                                'file_berkas' => $nama_file,
                                        ];
                                        // Insert satu data
                                        $process = InsertOnedata('berkas_pendaftaran', $data);
                                        $_SESSION['message'] = 'Data Berkas Pendaftaran ' . $process['message'];
                                        $_SESSION['message_code'] =  $process['code'];
                                } else {
                                        $process['message'] = 'UPLOAD FILE TIDAK BERHASIL';
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
        }

        header('Location: ' . $url . '/app/pendaftaran_siswa/index.php');
        exit();
} elseif (isset($_POST['updateberkas_pendaftaran'])) {

        for($lop = 0; $lop < count($_POST['nm_berkas']) ; $lop++){
                $nama_file = $_POST['file_berkas_old'][$lop];
                if (isset($_FILES['file_berkas_'.$_POST['id_berkas'][$lop]])) { 
                        $ekstensi_diperbolehkan = array('pdf');
                        $nama_file = $_FILES['file_berkas_'.$_POST['id_berkas'][$lop]]['name'];                        
                        $x = explode('.', $nama_file);
                        $ekstensi = strtolower(end($x));
                        $ukuran    = $_FILES['file_berkas_'.$_POST['id_berkas'][$lop]]['size'];
                        $file_tmp = $_FILES['file_berkas_'.$_POST['id_berkas'][$lop]]['tmp_name'];

                        if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
                                if ($ukuran < 2088140) {
                                        $nama_file = $YMDhis . $_FILES['file_berkas_'.$_POST['id_berkas'][$lop]]['name'];
                                        unlink($lokasi_foto . "/berkas_pendaftaran/" .  $_POST['file_berkas_old'][$lop]);
                                        $upload_guru =  move_uploaded_file($file_tmp, $lokasi_foto . "/berkas_pendaftaran/" . $nama_file);
                                } else {
                                        $nama_file = $_POST['file_berkas_old'][$lop];
                                }
                        } else {
                                $nama_file = $_POST['file_berkas_old'][$lop];
                        }
                }
                // Data yang ingin Execution
                $data = [
                        'id_berkas' => $_POST['id_berkas'][$lop],
                        'nm_berkas' => $_POST['nm_berkas'][$lop],
                        'file_berkas' => $nama_file,
                ];
                // Update data berdasarkan
                $process = UpdateOneData('berkas_pendaftaran', $data, ' WHERE id_berkas =' . $_POST['id_berkas'][$lop] . '');
        }
        $_SESSION['message'] = 'Data Berkas Pendaftaran ' . $process['message'];
        $_SESSION['message_code'] =  $process['code'];
        header('Location: ' . $url . '/app/pendaftaran_siswa/index.php');
        exit();
} elseif ($_GET['action'] == 'delete') {
        $process = DeleteOneData('berkas_pendaftaran', 'WHERE id_berkas = ' . $_GET['id_berkas'] . '');
        $_SESSION['message'] = 'Data Berkas Pendaftaran ' . $process['message'];
        $_SESSION['message_code'] =  $process['code'];
        header('Location: ' . $url . '/app/berkas_pendaftaran/index.php');
        exit();
}
