<?php
include '../config/config.php';
session_start();
if (isset($_POST['simpanpenilaian'])) {
        $data = [
                'id_plotting' => $_POST['id_plotting'],
                'jenis_penilaian' => $_POST['jenis_penilaian'],
                'nilai' => $_POST['nilai'],
                'nilai_praktek' => $_POST['nilai_praktek'],
        ];
        // Insert satu data
        $process = InsertOnedata('penilaian', $data);
        $_SESSION['message'] = 'Data Penilaian Siswa ' . $process['message'];
        $_SESSION['message_code'] =  $process['code'];
        header('Location: ' . $url . '/app/penilaian/index.php');
        exit();
} elseif (isset($_POST['updatepenilaian'])) {
        // Data yang ingin Execution
        $data = [
                'id_plotting' => $_POST['id_plotting'],
                'jenis_penilaian' => $_POST['jenis_penilaian'],
                'nilai' => $_POST['nilai'],
                'nilai_praktek' => $_POST['nilai_praktek'],
        ];
        // Update data berdasarkan
        $process = UpdateOneData('penilaian', $data, ' WHERE id_penilaian =' . $_POST['id_penilaian'] . '');
        $_SESSION['message'] = 'Data Penilaian Siswa ' . $process['message'];
        $_SESSION['message_code'] =  $process['code'];
        header('Location: ' . $url . '/app/penilaian/index.php');
        exit();
} elseif ($_GET['action'] == 'delete') {
        $process = DeleteOneData('penilaian', 'WHERE id_penilaian = ' . $_GET['id_penilaian'] . '');
        $_SESSION['message'] = 'Data Penilaian Siswa ' . $process['message'];
        $_SESSION['message_code'] =  $process['code'];
        header('Location: ' . $url . '/app/penilaian/index.php');
        exit();
}
