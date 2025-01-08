<?php
include '../config/config.php';
session_start();
if (isset($_POST['simpankelulusan'])) {
        $data = [
                'id_siswa' => $_POST['id_siswa'],
                'id_periode' => $_POST['id_periode'],
        ];
        // Insert satu data
        $process = InsertOnedata('kelulusan', $data);
        // Data yang ingin Execution
        $data = [
                'status' => 'tidak aktif',
        ];
        // Update data berdasarkan
        $process = UpdateOneData('siswa', $data, ' WHERE id_siswa =' . $_POST['id_siswa'] . '');
        $_SESSION['message'] = 'Data Kelas ' . $process['message'];
        $_SESSION['message_code'] =  $process['code'];
        header('Location: ' . $url . '/app/kelulusan/periode.php?id_periode='.$_POST['id_periode']);
        exit();
} elseif (isset($_POST['updatekelulusan'])) {
        // Data yang ingin Execution
        $data = [
                'id_siswa' => $_POST['id_siswa'],
                'id_periode' => $_POST['id_periode'],
        ];
        // Update data berdasarkan
        $process = UpdateOneData('kelulusan', $data, ' WHERE id_kelulusan =' . $_POST['id_kelulusan'] . '');
        $_SESSION['message'] = 'Data Kelas ' . $process['message'];
        $_SESSION['message_code'] =  $process['code'];
        header('Location: ' . $url . '/app/kelulusan/periode.php');
        exit();
} elseif ($_GET['action'] == 'delete') {
        $process = DeleteOneData('kelulusan', 'WHERE id_siswa = ' . $_GET['id_siswa'] . '');
        $data = [
                'status' => 'aktif',
        ];
        // Update data berdasarkan
        $process = UpdateOneData('siswa', $data, ' WHERE id_siswa =' . $_GET['id_siswa'] . '');

        $_SESSION['message'] = 'Data Kelas ' . $process['message'];
        $_SESSION['message_code'] =  $process['code'];
        header('Location: ' . $url . '/app/kelulusan/periode.php');
        exit();
}
