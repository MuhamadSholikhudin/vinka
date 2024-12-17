<?php
include '../config/config.php';
session_start();
// Periksa apakah request menggunakan metode POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ambil data dari input AJAX
    $id_user = isset($_POST['id_user']) ? $_POST['id_user'] : '';

    // Lakukan validasi atau proses data
    if (!empty($id_user)) {
        // Contoh: Formatkan respons
        $response = "Data yang diterima: " . htmlspecialchars($id_user);

        $pendaftaran_siswa = QueryOnedata('SELECT * FROM pendaftaran_siswa WHERE id_user = ' . $id_user . '')->fetch_assoc();
        // Kirim respons kembali ke AJAX
         $response = $pendaftaran_siswa;
        // echo 1;
        header('Content-Type: application/json'); // Tentukan tipe konten sebagai JSON
        echo json_encode($response);
    } else {
        echo "Input tidak boleh kosong!";
    }
} else {
    // Jika bukan metode POST, kirim pesan error
    echo "Metode request tidak valid!";
}
?>