<?php
include '../config/config.php';
session_start();
if (isset($_POST['simpankelas'])) {
        $data = [
                'id_guru' => $_POST['id_guru'],
                'nm_kelas' => $_POST['nm_kelas'],
                'tingkatan' => $_POST['tingkatan'],
        ];
        // Insert satu data
        $process = InsertOnedata('kelas', $data);
        $_SESSION['message'] = 'Data Kelas ' . $process['message'];
        $_SESSION['message_code'] =  $process['code'];
        header('Location: ' . $url . '/app/kelsas/index.php');
        exit();
} elseif (isset($_POST['updatekelas'])) {
        // Data yang ingin Execution
        $data = [
                'id_guru' => $_POST['id_guru'],
                'nm_kelas' => $_POST['nm_kelas'],
                'tingkatan' => $_POST['tingkatan'],
        ];
        // Update data berdasarkan
        $process = UpdateOneData('kelas', $data, ' WHERE id_kelas =' . $_POST['id_kelas'] . '');
        $_SESSION['message'] = 'Data Kelas ' . $process['message'];
        $_SESSION['message_code'] =  $process['code'];
        header('Location: ' . $url . '/app/kelas/index.php');
        exit();
} elseif ($_GET['action'] == 'delete') {
        $process = DeleteOneData('kelas', 'WHERE id_kelas = ' . $_GET['id_kelas'] . '');
        $_SESSION['message'] = 'Data Kelas ' . $process['message'];
        $_SESSION['message_code'] =  $process['code'];
        header('Location: ' . $url . '/app/kelas/index.php');
        exit();
}
