<?php
include '../config/config.php';
session_start();

if (isset($_POST['UPDATE_SIKAP_SOSIAL']) || isset($_POST['UPDATE_SIKAP_SPIRITUAL'])) {
    $check_sikap_sosial = "SELECT * FROM rapot WHERE id_periode = " . $_POST['id_periode'] . " AND id_siswa = " . $_POST['id_siswa'] . " AND jenis = '".$_POST['jenis']."' ";
    if (QueryOnedata($check_sikap_sosial)->num_rows > 0) { // Jika ada maka update data
        // Data yang ingin Execution
        $data = [
            'id_periode' => $_POST['id_periode'],
            'jenis' => $_POST['jenis'],
            'deskripsi' => $_POST['deskripsi'],
            'value' => $_POST['value'],
            'id_siswa' => $_POST['id_siswa'],
        ];
        $where = " WHERE id_periode = " . $_POST['id_periode'] . " AND id_siswa = " . $_POST['id_siswa'] . " AND jenis = '".$_POST['jenis']."'";
        // Update data berdasarkan
        $process = UpdateOneData('rapot', $data, $where);
        $_SESSION['message'] = 'Data Rapot Siswa ' . $process['message'];
        $_SESSION['message_code'] =  $process['code'];
        header('Location: ' . $url . '/app/anak-didik/lihat.php?id_siswa=' . $_POST['id_siswa']);
        exit();
    } else { // jika tidak ada maka insert data
        // Data yang ingin Execution
        $data = [
            'id_periode' => $_POST['id_periode'],
            'jenis' => $_POST['jenis'],
            'deskripsi' => $_POST['deskripsi'],
            'value' => $_POST['value'],
            'id_siswa' => $_POST['id_siswa'],
        ];
        // Update data berdasarkan
        $process = InsertOnedata('rapot', $data);
        $_SESSION['message'] = 'Data Rapot Siswa ' . $process['message'];
        $_SESSION['message_code'] =  $process['code'];
        header('Location: ' . $url . '/app/anak-didik/lihat.php?id_siswa=' . $_POST['id_siswa']);
        exit();
    }
}elseif (isset($_POST['UPDATE_catatan_wali_kelas']) ) {
    $check_sikap_sosial = "SELECT * FROM rapot WHERE id_periode = " . $_POST['id_periode'] . " AND id_siswa = " . $_POST['id_siswa'] . " AND jenis = '".$_POST['jenis']."' ";
    if (QueryOnedata($check_sikap_sosial)->num_rows > 0) { // Jika ada maka update data
        // Data yang ingin Execution
        $data = [
            'id_periode' => $_POST['id_periode'],
            'jenis' => $_POST['jenis'],
            'deskripsi' => $_POST['deskripsi'],
            'id_siswa' => $_POST['id_siswa'],
        ];
        $where = " WHERE id_periode = " . $_POST['id_periode'] . " AND id_siswa = " . $_POST['id_siswa'] . " AND jenis = '".$_POST['jenis']."'";
        // Update data berdasarkan
        $process = UpdateOneData('rapot', $data, $where);
        $_SESSION['message'] = 'Data Rapot Siswa ' . $process['message'];
        $_SESSION['message_code'] =  $process['code'];
        header('Location: ' . $url . '/app/anak-didik/lihat.php?id_siswa=' . $_POST['id_siswa']);
        exit();
    } else { // jika tidak ada maka insert data
        // Data yang ingin Execution
        $data = [
            'id_periode' => $_POST['id_periode'],
            'jenis' => $_POST['jenis'],
            'deskripsi' => $_POST['deskripsi'],
            'id_siswa' => $_POST['id_siswa'],
        ];
        // Update data berdasarkan
        $process = InsertOnedata('rapot', $data);
        $_SESSION['message'] = 'Data Rapot Siswa ' . $process['message'];
        $_SESSION['message_code'] =  $process['code'];
        header('Location: ' . $url . '/app/anak-didik/lihat.php?id_siswa=' . $_POST['id_siswa']);
        exit();
    }

}
