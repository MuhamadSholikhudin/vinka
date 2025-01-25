<?php
include '../config/config.php';
session_start();
$url_wa = 'https://console.zenziva.net/wareguler/api/sendWA/';
$userkey = '9b85e05d0de7';
$passkey = '83f0dd70ecb6c588f2ab2cc3';

if (isset($_POST['POST_broadcast'])) {

    $siswa = "SELECT pendaftaran_siswa.* FROM siswa LEFT JOIN pendaftaran_siswa ON siswa.id_user = pendaftaran_siswa.id_user  WHERE siswa.status = 'aktif'   ";
    foreach (QueryManyData($siswa) as $row) {
        $kalimat = "Halo Wali Murid " . $row['nm_siswa'] . " \n";
        $message = $kalimat . $_POST['broadcast']."\n".date('Y-m-d h:i:s');
        $satu = zen($url_wa, $userkey, $passkey, '0' . $row['no_dapat_dihubungi'], $message);
    }

    $_SESSION['message'] = 'Pengumuman telah berhasil di share ke Wali Murid';
    $_SESSION['message_code'] =  200;
    header('Location: ' . $url . '/app/broadcast/index.php');
    exit();
}
