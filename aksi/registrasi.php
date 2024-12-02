<?php
include '../config/config.php';
session_start();
if (isset($_POST['daftaruser'])) {

    //cek apakah ada user yang sama 
    $cek_user = QueryOnedata('SELECT * FROM user WHERE username = "'.$_POST['username'].'" ');

    if($cek_user->num_rows > 0){
        $_SESSION['message'] = 'Data User Gagal di buat karena user tidak dapat di daftarkan';
        $_SESSION['message_code'] =  400;
        $_SESSION['data'] =  [$_POST['username'], $_POST['nm_pengguna']];
        header('Location: ' . $url . '/app/home/index.php#pendaftaran');
        exit();
    }

    if($_POST['password1'] != $_POST['password2']){
        $_SESSION['message'] = 'Data User Gagal di buat karena password tidak sama';
        $_SESSION['message_code'] =  400;
        $_SESSION['data'] =  [$_POST['username'], $_POST['nm_pengguna']];
        header('Location: ' . $url . '/app/home/index.php#pendaftaran');
        exit();
    }

    $data = [
        'username' => $_POST['username'],
        'password' => $_POST['password1'],
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
