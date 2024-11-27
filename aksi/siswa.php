<?php
include '../config/config.php';
session_start();
if (isset($_POST['simpansiswa'])) {
        $data = [
                'nis' => $_POST['nis'],
                'id_user' => $_POST['id_user'],
                'nm_siswa' => $_POST['nm_siswa'],
                'jk_siswa' => $_POST['jk_siswa'],
                'alamat_siswa' => $_POST['alamat_siswa'],
                'nm_orang_tua' => $_POST['nm_orang_tua'],
                'foto_siswa' => $_POST['foto_siswa'],
        ];
        // Insert satu data
        $process = InsertOnedata('siswa', $data);
        $_SESSION['message'] = 'Data Siswa ' . $process['message'];
        $_SESSION['message_code'] =  $process['code'];
        header('Location: ' . $url . '/app/siswa/index.php');
        exit();
} elseif (isset($_POST['updatesiswa'])) {
        // Data yang ingin Execution
        $data = [
                'nis' => $_POST['nis'],
                'id_user' => $_POST['id_user'],
                'nm_siswa' => $_POST['nm_siswa'],
                'jk_siswa' => $_POST['jk_siswa'],
                'alamat_siswa' => $_POST['alamat_siswa'],
                'nm_orang_tua' => $_POST['nm_orang_tua'],
                'foto_siswa' => $_POST['foto_siswa'],
        ];
        // Update data berdasarkan
        $process = UpdateOneData('siswa', $data, ' WHERE id_siswa =' . $_POST['id_siswa'] . '');
        $_SESSION['message'] = 'Data Siswa ' . $process['message'];
        $_SESSION['message_code'] =  $process['code'];
        header('Location: ' . $url . '/app/siswa/index.php');
        exit();
} elseif ($_GET['action'] == 'delete') {
        $process = DeleteOneData('siswa', 'WHERE id_siswa = ' . $_GET['id_siswa'] . '');
        $_SESSION['message'] = 'Data Siswa ' . $process['message'];
        $_SESSION['message_code'] =  $process['code'];
        header('Location: ' . $url . '/app/siswa/index.php');
        exit();
}
