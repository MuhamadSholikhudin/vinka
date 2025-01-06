<?php
include '../config/config.php';
session_start();
if (isset($_POST['simpankehadiran_siswa'])) {
        $data = [
                'id_plotting' => $_POST['id_plotting'],
                'tgl_kehadiran' => $_POST['tgl_kehadiran'],
                'jenis_kehadiran' => $_POST['jenis_kehadiran'],
        ];
        // Insert satu data
        $process = InsertOnedata('kehadiran_siswa', $data);
        $_SESSION['message'] = 'Data Kehadiran Siswa ' . $process['message'];
        $_SESSION['message_code'] =  $process['code'];
        header('Location: ' . $url . '/app/kehadiran_siswa/index.php');
        exit();
} elseif (isset($_POST['updatekehadiran_siswa'])) {
        // Data yang ingin Execution
        $data = [
                'id_plotting' => $_POST['id_plotting'],
                'tgl_kehadiran' => $_POST['tgl_kehadiran'],
                'jenis_kehadiran' => $_POST['jenis_kehadiran'],
        ];
        // Update data berdasarkan
        $process = UpdateOneData('kehadiran_siswa', $data, ' WHERE id_kehadiran =' . $_POST['id_kehadiran'] . '');
        $_SESSION['message'] = 'Data Kehadiran Siswa ' . $process['message'];
        $_SESSION['message_code'] =  $process['code'];
        header('Location: ' . $url . '/app/kehadiran_siswa/index.php');
        exit();
} elseif (isset($_POST['TAMBAH_DATA_KEHADIRAN_SISWA'])) {
        for($m = 0 ; $m < count($_POST["id_plotting"]); $m++){
                $data = [
                        'id_plotting' => $_POST['id_plotting'][$m],
                        'tgl_kehadiran' => $_POST['tanggal'],
                        'jenis_kehadiran' => $_POST['jenis_kehadiran_'.$_POST["id_plotting"][$m]],
                ];
                $process = InsertOnedata('kehadiran_siswa', $data);
        }
        $_SESSION['message'] = 'Data Kehadiran Siswa ' . $process['message'];
        $_SESSION['message_code'] =  $process['code'];
        header('Location: ' . $url . '/app/kehadiran_siswa/index.php');
        exit();       
} elseif ($_GET['action'] == 'delete') {
        $process = DeleteOneData('kehadiran_siswa', 'WHERE id_kehadiran = ' . $_GET['id_kehadiran'] . '');
        $_SESSION['message'] = 'Data Kehadiran Siswa ' . $process['message'];
        $_SESSION['message_code'] =  $process['code'];
        header('Location: ' . $url . '/app/kehadiran_siswa/index.php');
        exit();
}
