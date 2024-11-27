<?php
include '../config/config.php';
session_start();
if (isset($_POST['simpanberkas_pendaftaran'])) {
        $data = [
                'id_pendaftaran' => $_POST['id_pendaftaran'],
                'nm_berkas' => $_POST['nm_berkas'],
                'file_berkas' => $_POST['file_berkas'],
        ];
        // Insert satu data
        $process = InsertOnedata('berkas_pendaftaran', $data);
        $_SESSION['message'] = 'Data Berkas Pendaftaran ' . $process['message'];
        $_SESSION['message_code'] =  $process['code'];
        header('Location: ' . $url . '/app/berkas_pendaftaran/index.php');
        exit();
} elseif (isset($_POST['updateberkas_pendaftaran'])) {
        // Data yang ingin Execution
        $data = [
                'id_pendaftaran' => $_POST['id_pendaftaran'],
                'nm_berkas' => $_POST['nm_berkas'],
                'file_berkas' => $_POST['file_berkas'],
        ];
        // Update data berdasarkan
        $process = UpdateOneData('berkas_pendaftaran', $data, ' WHERE id_berkas =' . $_POST['id_berkas'] . '');
        $_SESSION['message'] = 'Data Berkas Pendaftaran ' . $process['message'];
        $_SESSION['message_code'] =  $process['code'];
        header('Location: ' . $url . '/app/berkas_pendaftaran/index.php');
        exit();
} elseif ($_GET['action'] == 'delete') {
        $process = DeleteOneData('berkas_pendaftaran', 'WHERE id_berkas = ' . $_GET['id_berkas'] . '');
        $_SESSION['message'] = 'Data Berkas Pendaftaran ' . $process['message'];
        $_SESSION['message_code'] =  $process['code'];
        header('Location: ' . $url . '/app/berkas_pendaftaran/index.php');
        exit();
}
