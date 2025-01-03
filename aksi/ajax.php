<?php
include '../config/config.php';
session_start();
// Periksa apakah request menggunakan metode POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if(isset($_POST['detail_jadwal'])){

        $query_jadwal = "SELECT plotting_jadwal.id_plotting, siswa.nm_siswa, siswa.nis FROM plotting_jadwal JOIN siswa ON plotting_jadwal.id_siswa = siswa.id_siswa WHERE plotting_jadwal.hari = '".$_POST['hari']."'  AND plotting_jadwal.jam_awal = '".$_POST['jam_awal']."'  AND plotting_jadwal.id_mapel = ".$_POST['id_mapel']." AND plotting_jadwal.id_periode = ".$_POST['id_periode']." AND plotting_jadwal.id_kelas = ".$_POST['id_kelas']."";
        $data = [];
        $code = 200;
        foreach(QueryManyData($query_jadwal) as $row){
            array_push($data, $row);
        }
        if($data == []){
            $code = 400;
        }
        $output = [
            "code" => $code,
            "data" => $data,
        ];
        header('Content-Type: application/json'); // Tentukan tipe konten sebagai JSON

        echo json_encode($output);
        // echo json_encode($query_jadwal);
    }else{
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
    }

} else {
    // Jika bukan metode POST, kirim pesan error
    echo "Metode request tidak valid!";
}
?>