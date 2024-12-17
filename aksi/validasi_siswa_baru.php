<?php 
include '../config/config.php';
session_start();
$url_wa = 'https://console.zenziva.net/wareguler/api/sendWA/';
$userkey = '9b85e05d0de7';
$passkey = '83f0dd70ecb6c588f2ab2cc3';

if (isset($_GET['action'])) {
    if($_GET['action'] == 'validasi'){
        // kirim WA ke pada nohomer HP orang tuas
        $pendaftaran_siswa = QueryOnedata('SELECT * FROM pendaftaran_siswa WHERE id_pendaftaran = ' . $_GET['id_pendaftaran'] . '')->fetch_assoc();
        $data = [];        
        array_push($data, $pendaftaran_siswa);
        $message = "Pengumuman Penerimaan Siswa Baru \n
Selamat! Pendaftaran siswa baru atas Nama ".$data[0]['nm_siswa']." di MI Al-Hidayah telah DITERIMA.\n
Silakan melakukan registrasi ulang di sekolah dengan menemui Seksi Tata Usaha.\n

Terima kasih dan kami tunggu kehadirannya.\n

Jika ada penyesuaian lain yang diinginkan, silakan beri tahu!";
        $satu = zen($url_wa, $userkey, $passkey, '0' . $data[0]['no_hp_orang_tua'], $message);

        $_SESSION['message'] = 'Data pesan VALIDASI BERHASIL di kirimkan';
        $_SESSION['message_code'] =  200;
        header('Location: ' . $url . '/app/validasi_siswa_baru/index.php');
    }
}
