<?php
include '../config/config.php';
session_start();
if (isset($_POST['simpanplotting_jadwal'])) {
        $data = [
                'id_siswa' => $_POST['id_siswa'],
                'id_kelas' => $_POST['id_kelas'],
                'id_mapel' => $_POST['id_mapel'],
                'id_periode' => $_POST['id_periode'],
                'hari' => $_POST['hari'],
                'jam_awal' => $_POST['jam_awal'],
                'jam_akhir' => $_POST['jam_akhir'],
        ];
        // Insert satu data
        $process = InsertOnedata('plotting_jadwal', $data);
        $_SESSION['message'] = 'Data Plotting Jadwal ' . $process['message'];
        $_SESSION['message_code'] =  $process['code'];
        header('Location: ' . $url . '/app/plotting_jadwal/index.php');
        exit();
} elseif (isset($_POST['BTN_POST_ADD_PLOTTING'])) {
        for($r = 0 ; $r < count($_POST['id_siswa']); $r++){                
                $data = [
                        'id_siswa' => $_POST['id_siswa'][$r],
                        'id_kelas' => $_POST['id_kelas'],
                        'id_mapel' => $_POST['id_mapel'],
                        'id_periode' => $_POST['id_periode'],
                        'hari' => $_POST['hari'],
                        'jam_awal' => $_POST['jam_awal'],
                        'jam_akhir' => $_POST['jam_akhir'],
                ];
                // Insert satu data
                $process = InsertOnedata('plotting_jadwal', $data);
        }
        $_SESSION['message'] = 'Data Plotting Jadwal ' . $process['message'];
        $_SESSION['message_code'] =  $process['code'];
        header('Location: ' . $url . '/app/plotting_jadwal/kelas.php?id_periode='.$_POST['id_periode'].'&id_kelas='.$_POST['id_kelas'].'');
        exit();
} elseif (isset($_POST['BTN_POST_UPDATE_PLOTTING'])) {
        for($r = 0 ; $r < count($_POST['id_siswa']); $r++){        
                $check_plotting = "SELECT * FROM plotting_jadwal 
                WHERE id_siswa = ". $_POST['id_siswa'][$r]." 
                AND id_kelas = ".$_POST['id_kelas']."
                AND id_periode = ".$_POST['id_periode']."
                AND hari = '".$_POST['hari']."'
                AND jam_awal = '".$_POST['jam_awal']." '
                AND jam_akhir = '".$_POST['jam_akhir']."'";                   
                if(QueryOnedata($check_plotting)->num_rows < 1 ){
                        $data = [
                                'id_siswa' => $_POST['id_siswa'][$r],
                                'id_kelas' => $_POST['id_kelas'],
                                'id_mapel' => $_POST['id_mapel'],
                                'id_periode' => $_POST['id_periode'],
                                'hari' => $_POST['hari'],
                                'jam_awal' => $_POST['jam_awal'],
                                'jam_akhir' => $_POST['jam_akhir'],
                        ];
                        // Insert satu data
                        $process = InsertOnedata('plotting_jadwal', $data);
                }
        }
        $_SESSION['message'] = 'Data Plotting Jadwal ' . $process['message'];
        $_SESSION['message_code'] =  $process['code'];
        header('Location: ' . $url . '/app/plotting_jadwal/kelas.php?id_periode='.$_POST['id_periode'].'&id_kelas='.$_POST['id_kelas'].'');
        exit();
       
} elseif (isset($_POST['updateplotting_jadwal'])) {
        // Data yang ingin Execution
        $data = [
                'id_siswa' => $_POST['id_siswa'],
                'id_kelas' => $_POST['id_kelas'],
                'id_mapel' => $_POST['id_mapel'],
                'id_periode' => $_POST['id_periode'],
                'hari' => $_POST['hari'],
                'jam_awal' => $_POST['jam_awal'],
                'jam_akhir' => $_POST['jam_akhir'],
        ];
        // Update data berdasarkan
        $process = UpdateOneData('plotting_jadwal', $data, ' WHERE id_plotting =' . $_POST['id_plotting'] . '');
        $_SESSION['message'] = 'Data Plotting Jadwal ' . $process['message'];
        $_SESSION['message_code'] =  $process['code'];
        header('Location: ' . $url . '/app/plotting_jadwal/index.php');
        exit();
} elseif (isset($_GET['action'])) {
        $process = DeleteOneData('plotting_jadwal', 'WHERE id_plotting = ' . $_GET['id_plotting'] . '');
        $_SESSION['message'] = 'Data Plotting Jadwal ' . $process['message'];
        $_SESSION['message_code'] =  $process['code'];
        header('Location: ' . $url . '/app/plotting_jadwal/kelas.php?id_periode=' . $_GET['id_periode'] . '&id_kelas=' . $_GET['id_kelas'] . '');
        exit();
}
