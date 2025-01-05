<?php
include '../config/config.php';
session_start();
if (isset($_POST['simpanpenilaian'])) {
        $data = [
                'id_plotting' => $_POST['id_plotting'],
                'jenis_penilaian' => $_POST['jenis_penilaian'],
                'nilai' => $_POST['nilai'],
                'nilai_praktek' => $_POST['nilai_praktek'],
        ];
        // Insert satu data
        $process = InsertOnedata('penilaian', $data);
        $_SESSION['message'] = 'Data Penilaian Siswa ' . $process['message'];
        $_SESSION['message_code'] =  $process['code'];
        header('Location: ' . $url . '/app/penilaian/index.php');
        exit();
} elseif (isset($_POST['updatepenilaian'])) {
        // Data yang ingin Execution
        $data = [
                'id_plotting' => $_POST['id_plotting'],
                'jenis_penilaian' => $_POST['jenis_penilaian'],
                'nilai' => $_POST['nilai'],
                'nilai_praktek' => $_POST['nilai_praktek'],
        ];
        // Update data berdasarkan
        $process = UpdateOneData('penilaian', $data, ' WHERE id_penilaian =' . $_POST['id_penilaian'] . '');
        $_SESSION['message'] = 'Data Penilaian Siswa ' . $process['message'];
        $_SESSION['message_code'] =  $process['code'];
        header('Location: ' . $url . '/app/penilaian/index.php');
        exit();
} elseif (isset($_POST['UPDATE_PENILAIAN_DATA'])) {
        $plotting = "SELECT id_plotting FROM plotting_jadwal WHERE id_siswa = " . $_POST['id_siswa'][0] . " AND id_kelas = " . $_POST['id_kelas'][0] . " AND id_periode = " . $_POST['id_periode'][0] . " ";
        $check_penilaian_tugas = "SELECT * FROM penilaian WHERE id_plotting = ".QueryOnedata($plotting)->fetch_assoc()['id_plotting']." AND jenis_penilaian = 'tugas' ";
        if(QueryOnedata($check_penilaian_tugas)->num_rows > 0){ //Jika Sudah ada nilainya maka update data
                // Data yang ingin Execution
                $data = [
                        'id_plotting' => QueryOnedata($plotting)->fetch_assoc()['id_plotting'],
                        'jenis_penilaian' => 'tugas',
                        'nilai' => $_POST['tugas'][0],
                        'nilai_praktek' => 0,
                ];
                // Update data berdasarkan
                $process = UpdateOneData('penilaian', $data, ' WHERE id_penilaian =' . QueryOnedata($check_penilaian_tugas)->fetch_assoc()['id_penilaian'] . '');
        }else{ // Jika elum ada nilai tugas maka di tambahkan
                $data = [
                        'id_plotting' => QueryOnedata($plotting)->fetch_assoc()['id_plotting'],
                        'jenis_penilaian' => 'tugas',
                        'nilai' => $_POST['tugas'][0],
                        'nilai_praktek' => 0,
                ];
                // Insert satu data
                $process = InsertOnedata('penilaian', $data);
        }

        $check_penilaian_uh = "SELECT * FROM penilaian WHERE id_plotting = ".QueryOnedata($plotting)->fetch_assoc()['id_plotting']." AND jenis_penilaian = 'uh' ";
        if(QueryOnedata($check_penilaian_uh)->num_rows > 0){ //Jika Sudah ada nilainya maka update data
                // Data yang ingin Execution
                $data = [
                        'id_plotting' => QueryOnedata($plotting)->fetch_assoc()['id_plotting'],
                        'jenis_penilaian' => 'uh',
                        'nilai' => $_POST['uh'][0],
                        'nilai_praktek' => 0,
                ];
                // Update data berdasarkan
                $process = UpdateOneData('penilaian', $data, ' WHERE id_penilaian =' . QueryOnedata($check_penilaian_uh)->fetch_assoc()['id_penilaian'] . '');
        }else{ // Jika elum ada nilai uh maka di tambahkan
                $data = [
                        'id_plotting' => QueryOnedata($plotting)->fetch_assoc()['id_plotting'],
                        'jenis_penilaian' => 'uh',
                        'nilai' => $_POST['uh'][0],
                        'nilai_praktek' => 0,
                ];
                // Insert satu data
                $process = InsertOnedata('penilaian', $data);
        }
        $check_penilaian_uts = "SELECT * FROM penilaian WHERE id_plotting = ".QueryOnedata($plotting)->fetch_assoc()['id_plotting']." AND jenis_penilaian = 'uts' ";
        if(QueryOnedata($check_penilaian_uts)->num_rows > 0){ //Jika Sudah ada nilainya maka update data
                // Data yang ingin Execution
                $data = [
                        'id_plotting' => QueryOnedata($plotting)->fetch_assoc()['id_plotting'],
                        'jenis_penilaian' => 'uts',
                        'nilai' => $_POST['uts'][0],
                        'nilai_praktek' => 0,
                ];
                // Update data berdasarkan
                $process = UpdateOneData('penilaian', $data, ' WHERE id_penilaian =' . QueryOnedata($check_penilaian_uts)->fetch_assoc()['id_penilaian'] . '');
        }else{ // Jika elum ada nilai uts maka di tambahkan
                $data = [
                        'id_plotting' => QueryOnedata($plotting)->fetch_assoc()['id_plotting'],
                        'jenis_penilaian' => 'uts',
                        'nilai' => $_POST['uts'][0],
                        'nilai_praktek' => 0,
                ];
                // Insert satu data
                $process = InsertOnedata('penilaian', $data);
        }
        $check_penilaian_uas = "SELECT * FROM penilaian WHERE id_plotting = ".QueryOnedata($plotting)->fetch_assoc()['id_plotting']." AND jenis_penilaian = 'uas' ";
        if(QueryOnedata($check_penilaian_uas)->num_rows > 0){ //Jika Sudah ada nilainya maka update data
                // Data yang ingin Execution
                $data = [
                        'id_plotting' => QueryOnedata($plotting)->fetch_assoc()['id_plotting'],
                        'jenis_penilaian' => 'uas',
                        'nilai' => $_POST['uas'][0],
                        'nilai_praktek' => 0,
                ];
                // Update data berdasarkan
                $process = UpdateOneData('penilaian', $data, ' WHERE id_penilaian =' . QueryOnedata($check_penilaian_uas)->fetch_assoc()['id_penilaian'] . '');
        }else{ // Jika elum ada nilai uas maka di tambahkan
                $data = [
                        'id_plotting' => QueryOnedata($plotting)->fetch_assoc()['id_plotting'],
                        'jenis_penilaian' => 'uas',
                        'nilai' => $_POST['uas'][0],
                        'nilai_praktek' => 0,
                ];
                // Insert satu data
                $process = InsertOnedata('penilaian', $data);
        }

        $_SESSION['message'] = 'Data Penilaian Siswa ' . $process['message'];
        $_SESSION['message_code'] =  $process['code'];
        header('Location: ' . $url . '/app/penilaian/siswa.php?id_periode='.$_POST['id_periode'][0].'&id_kelas='.$_POST['id_kelas'][0].'&id_mapel='.$_POST['id_mapel'][0].'');
        exit();
} elseif ($_GET['action'] == 'delete') {
        $process = DeleteOneData('penilaian', 'WHERE id_penilaian = ' . $_GET['id_penilaian'] . '');
        $_SESSION['message'] = 'Data Penilaian Siswa ' . $process['message'];
        $_SESSION['message_code'] =  $process['code'];
        header('Location: ' . $url . '/app/penilaian/index.php');
        exit();
}
