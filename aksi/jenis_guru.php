<?php
include '../config/config.php';
session_start();
if (isset($_POST['simpanjenis_guru'])) {
        $data = [
                'nm_jenis_guru' => $_POST['nm_jenis_guru'],
        ];
        // Insert satu data
        $process = InsertOnedata('jenis_guru', $data);
        $_SESSION['message'] = 'Data Jenis Guru ' . $process['message'];
        $_SESSION['message_code'] =  $process['code'];
        header('Location: ' . $url . '/app/jenis_guru/index.php');
        exit();
} elseif (isset($_POST['updatejenis_guru'])) {
        // Data yang ingin Execution
        $data = [
                'nm_jenis_guru' => $_POST['nm_jenis_guru'],
        ];
        // Update data berdasarkan
        $process = UpdateOneData('jenis_guru', $data, ' WHERE id_jenis_guru =' . $_POST['id_jenis_guru'] . '');
        $_SESSION['message'] = 'Data Jenis Guru ' . $process['message'];
        $_SESSION['message_code'] =  $process['code'];
        header('Location: ' . $url . '/app/jenis_guru/index.php');
        exit();
} elseif ($_GET['action'] == 'delete') {
        $process = DeleteOneData('jenis_guru', 'WHERE id_jenis_guru = ' . $_GET['id_jenis_guru'] . '');
        $_SESSION['message'] = 'Data Jenis Guru ' . $process['message'];
        $_SESSION['message_code'] =  $process['code'];
        header('Location: ' . $url . '/app/jenis_guru/index.php');
        exit();
}
