<?php
include '../config/config.php';
session_start();
if (isset($_POST['simpanperiode'])) {
        $data = [
                'nm_periode' => $_POST['nm_periode'],
                'status_periode' => $_POST['status_periode'],
        ];
        // Insert satu data
        $process = InsertOnedata('periode', $data);
        $_SESSION['message'] = 'Data Periode ' . $process['message'];
        $_SESSION['message_code'] =  $process['code'];
        header('Location: ' . $url . '/app/periode/index.php');
        exit();
} elseif (isset($_POST['updateperiode'])) {
        // Data yang ingin Execution
        $data = [
                'nm_periode' => $_POST['nm_periode'],
                'status_periode' => $_POST['status_periode'],
        ];
        // Update data berdasarkan
        $process = UpdateOneData('periode', $data, ' WHERE id_periode =' . $_POST['id_periode'] . '');
        $_SESSION['message'] = 'Data Periode ' . $process['message'];
        $_SESSION['message_code'] =  $process['code'];
        header('Location: ' . $url . '/app/periode/index.php');
        exit();
} elseif ($_GET['action'] == 'delete') {
        $process = DeleteOneData('periode', 'WHERE id_periode = ' . $_GET['id_periode'] . '');
        $_SESSION['message'] = 'Data Periode ' . $process['message'];
        $_SESSION['message_code'] =  $process['code'];
        header('Location: ' . $url . '/app/periode/index.php');
        exit();
}
