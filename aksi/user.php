<?php
include '../config/config.php';
session_start();
if (isset($_POST['simpanuser'])) {
    $data = [
        'username' => $_POST['username'],
        'password' => $_POST['password'],
        'nm_pengguna' => $_POST['nm_pengguna'],
        'level' => $_POST['level'],
    ];
    // Insert satu data
    $process = InsertOnedata('user', $data);
    $_SESSION['message'] = 'Data User ' . $process['message'];
    $_SESSION['message_code'] =  $process['code'];
    header('Location: ' . $url . '/app/user/index.php');
    exit();
} elseif (isset($_POST['updateuser'])) {
    // Data yang ingin Execution
    $data = [
        'username' => $_POST['username'],
        'password' => $_POST['password'],
        'nm_pengguna' => $_POST['nm_pengguna'],
        'level' => $_POST['level'],
    ];
    // Update data berdasarkan
    $process = UpdateOneData('user', $data, ' WHERE id_user =' . $_POST['id_user'] . '');
    $_SESSION['message'] = 'Data User ' . $process['message'];
    $_SESSION['message_code'] =  $process['code'];
    header('Location: ' . $url . '/app/user/index.php');
    exit();
} elseif ($_GET['action'] == 'delete') {
    $process = DeleteOneData('user', 'WHERE id_user = ' . $_GET['id_user'] . '');
    $_SESSION['message'] = 'Data User ' . $process['message'];
    $_SESSION['message_code'] =  $process['code'];
    header('Location: ' . $url . '/app/user/index.php');
    exit();
}elseif (isset($_POST['daftaruser'])) {
    $data = [
        'username' => $_POST['username'],
        'password' => $_POST['password'],
        'nm_pengguna' => $_POST['nm_pengguna'],
        'level' => 'Orang Tua',
    ];
    // Insert satu data
    $process = InsertOnedata('user', $data);
    $_SESSION['message'] = 'Data User ' . $process['message'];
    $_SESSION['message_code'] =  $process['code'];
    header('Location: ' . $url . '/app/home/index.php#pendaftaran');
    exit();
}
