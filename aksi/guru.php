<?php
include '../config/config.php';
session_start();
if (isset($_POST['simpanguru'])) {
        $data = [
                'nip' => $_POST['nip'],
                'id_user' => $_POST['id_user'],
                'nm_guru' => $_POST['nm_guru'],
                'no_guru' => $_POST['no_guru'],
                'jk_guru' => $_POST['jk_guru'],
                'alamat_guru' => $_POST['alamat_guru'],
                'foto_guru' => $_POST['foto_guru'],
        ];
        // Insert satu data
        $process = InsertOnedata('guru', $data);
        $_SESSION['message'] = 'Data Guru ' . $process['message'];
        $_SESSION['message_code'] =  $process['code'];
        header('Location: ' . $url . '/app/guru/index.php');
        exit();
} elseif (isset($_POST['updateguru'])) {
        // Data yang ingin Execution
        $data = [
                'nip' => $_POST['nip'],
                'id_user' => $_POST['id_user'],
                'nm_guru' => $_POST['nm_guru'],
                'no_guru' => $_POST['no_guru'],
                'jk_guru' => $_POST['jk_guru'],
                'alamat_guru' => $_POST['alamat_guru'],
                'foto_guru' => $_POST['foto_guru'],
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
