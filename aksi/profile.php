<?php
include '../config/config.php';
session_start();
if (isset($_POST['updateprofile'])) {
    // Data yang ingin Execution
    $data = [
        'username' => $_POST['username'],
        'password' => $_POST['password'],
        'nm_pengguna' => $_POST['nm_pengguna'],
        'level' => $_POST['level'],
    ];
    $_SESSION['username'] = $_POST['username'];
    $_SESSION['nm_pengguna'] = $_POST['nm_pengguna'];
    // Update data berdasarkan
    $process = UpdateOneData('user', $data, ' WHERE id_user =' . $_POST['id_user'] . '');
    $_SESSION['message'] = 'Data User ' . $process['message'];
    $_SESSION['message_code'] =  $process['code'];
    header('Location: ' . $url . '/app/profile/index.php');
    exit();
} 