<?php
include '../config/config.php';
session_start();
if (isset($_POST['simpanmapel'])) {
        $data = [
                'id_guru' => $_POST['id_guru'],
                'nm_mape' => $_POST['nm_mape'],
        ];
        // Insert satu data
        $process = InsertOnedata('mapel', $data);
        $_SESSION['message'] = 'Data Mapel ' . $process['message'];
        $_SESSION['message_code'] =  $process['code'];
        header('Location: ' . $url . '/app/mapel/index.php');
        exit();
} elseif (isset($_POST['updatemapel'])) {
        // Data yang ingin Execution
        $data = [
                'id_guru' => $_POST['id_guru'],
                'nm_mape' => $_POST['nm_mape'],
        ];
        // Update data berdasarkan
        $process = UpdateOneData('mapel', $data, ' WHERE id_mapel =' . $_POST['id_mapel'] . '');
        $_SESSION['message'] = 'Data Mapel ' . $process['message'];
        $_SESSION['message_code'] =  $process['code'];
        header('Location: ' . $url . '/app/mapel/index.php');
        exit();
} elseif ($_GET['action'] == 'delete') {
        $process = DeleteOneData('mapel', 'WHERE id_mapel = ' . $_GET['id_mapel'] . '');
        $_SESSION['message'] = 'Data Mapel ' . $process['message'];
        $_SESSION['message_code'] =  $process['code'];
        header('Location: ' . $url . '/app/mapel/index.php');
        exit();
}
