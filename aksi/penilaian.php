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
} elseif (isset($_POST['broadcastpenilaian_wali_murid'])) {
        $query_mapel = "SELECT * FROM mapel";
        if ($_SESSION['level'] == 'Guru') {
                $gurux = QueryOnedata("SELECT * FROM guru WHERE id_user = " . $_SESSION['id_user'] . " ")->fetch_assoc();
                $query_mapel = "SELECT  plotting_jadwal.id_plotting, plotting_jadwal.id_siswa, mapel.nm_mapel, mapel.id_mapel FROM plotting_jadwal
                JOIN mapel ON plotting_jadwal.id_mapel = mapel.id_mapel 
                WHERE plotting_jadwal.id_periode = " . $_POST['id_periode'] . " 
                AND plotting_jadwal.id_kelas = " . $_POST['id_kelas'] . " 
                AND mapel.id_guru = " . $gurux['id_guru'] . "  
                GROUP BY plotting_jadwal.id_siswa 
        ";
        }

        foreach (QueryManyData($query_mapel) as $row) {
                $periode = QueryOnedata('SELECT * FROM periode WHERE id_periode = ' . $_POST['id_periode'] . '')->fetch_assoc();
                $kelas = QueryOnedata('SELECT * FROM kelas WHERE id_kelas = ' . $_POST['id_kelas'] . '')->fetch_assoc();
                $mapel = QueryOnedata('SELECT * FROM mapel WHERE id_mapel = ' . $_POST['id_mapel'] . '')->fetch_assoc();
                $guru = QueryOnedata('SELECT * FROM guru WHERE id_guru = ' . $kelas['id_guru'] . '')->fetch_assoc();

                $siswa = QueryOnedata("SELECT pendaftaran_siswa.no_dapat_dihubungi , siswa.id_siswa,  siswa.nm_siswa FROM pendaftaran_siswa LEFT JOIN siswa ON pendaftaran_siswa.id_user = siswa.id_user WHERE id_siswa = " . $row['id_siswa'] . " ")->fetch_assoc();

                $tugas = 0;
                $tugas_praktek = 0;
                $query_tugas = "SELECT penilaian.id_penilaian, penilaian.nilai, penilaian.nilai_praktek, penilaian.id_plotting FROM penilaian 
                                LEFT JOIN plotting_jadwal ON penilaian.id_plotting = plotting_jadwal.id_plotting
                                WHERE plotting_jadwal.id_periode = " . $_POST['id_periode'] . " 
                                AND plotting_jadwal.id_kelas = " . $_POST['id_kelas'] . " 
                                AND plotting_jadwal.id_mapel = " . $row['id_mapel'] . " 
                                AND plotting_jadwal.id_siswa = " . $row['id_siswa'] . " 
                                AND penilaian.jenis_penilaian = 'tugas' 
            ";
                $plotting = "SELECT id_plotting FROM plotting_jadwal WHERE id_siswa = " . $row['id_siswa'] . " AND id_kelas = " . $_POST['id_kelas'] . " AND id_periode = " . $_POST['id_periode'] . " ";
                $check_penilaian_tugas = "SELECT * FROM penilaian WHERE id_plotting = " . QueryOnedata($plotting)->fetch_assoc()['id_plotting'] . " AND jenis_penilaian = 'tugas' ";
                if (QueryOnedata($check_penilaian_tugas)->num_rows > 0) {
                        $tugas = QueryOnedata($check_penilaian_tugas)->fetch_assoc()['nilai'];
                        $tugas_praktek = QueryOnedata($check_penilaian_tugas)->fetch_assoc()['nilai_praktek'];
                }

                $uh = 0;
                $uh_praktek = 0;
                $check_penilaian_uh = "SELECT * FROM penilaian WHERE id_plotting = " . QueryOnedata($plotting)->fetch_assoc()['id_plotting'] . " AND jenis_penilaian = 'uh' ";
                if (QueryOnedata($check_penilaian_uh)->num_rows > 0) {
                        $uh = QueryOnedata($check_penilaian_uh)->fetch_assoc()['nilai'];
                        $uh_praktek = QueryOnedata($check_penilaian_uh)->fetch_assoc()['nilai_praktek'];
                }

                $uts = 0;
                $uts_praktek = 0;
                $check_penilaian_uts = "SELECT * FROM penilaian WHERE id_plotting = " . QueryOnedata($plotting)->fetch_assoc()['id_plotting'] . " AND jenis_penilaian = 'uts' ";
                if (QueryOnedata($check_penilaian_uts)->num_rows > 0) {
                        $uts = QueryOnedata($check_penilaian_uts)->fetch_assoc()['nilai'];
                        $uts_praktek = QueryOnedata($check_penilaian_uts)->fetch_assoc()['nilai_praktek'];
                }

                $uas = 0;
                $uas_praktek = 0;
                $check_penilaian_uas = "SELECT * FROM penilaian WHERE id_plotting = " . QueryOnedata($plotting)->fetch_assoc()['id_plotting'] . " AND jenis_penilaian = 'uas' ";
                if (QueryOnedata($check_penilaian_uas)->num_rows > 0) {
                        $uas = QueryOnedata($check_penilaian_uas)->fetch_assoc()['nilai'];
                        $uas_praktek = QueryOnedata($check_penilaian_uas)->fetch_assoc()['nilai_praktek'];
                }


                $kalimat = "Halo Wali Murid " . $siswa['nm_siswa'] . " \n";
                $message = $kalimat . "\n" . "Berikut Nilai dari siswa " . $siswa['nm_siswa'] . "\n periode : " . $periode['nm_periode'] . "\n
                TUGAS : " . $tugas . "\n
                UH : " . $uh . "\n
                UTS : " . $uts . "\n
                UAS : " . $uas . "\n
                " . date('Y-m-d h:i:s');

                zen($url_wa, $userkey, $passkey, '0' . $siswa['no_dapat_dihubungi'], $message);
        }

        $_SESSION['message'] = 'Data Penilaian Siswa Berhasil di Kirim';
        $_SESSION['message_code'] =  200;
        header('Location: ' . $url . '/app/penilaian/siswa.php?id_periode=' . $_POST['id_periode'] . '&id_kelas=' . $_POST['id_kelas'] . '&id_mapel=' . $_POST['id_mapel'] . '');
        exit();
} elseif (isset($_POST['broadcastpenilaian_wali_kelas'])) {
        var_dump($_POST);
        die();
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
        $check_penilaian_tugas = "SELECT * FROM penilaian WHERE id_plotting = " . QueryOnedata($plotting)->fetch_assoc()['id_plotting'] . " AND jenis_penilaian = 'tugas' ";
        if (QueryOnedata($check_penilaian_tugas)->num_rows > 0) { //Jika Sudah ada nilainya maka update data
                // Data yang ingin Execution
                $data = [
                        'id_plotting' => QueryOnedata($plotting)->fetch_assoc()['id_plotting'],
                        'jenis_penilaian' => 'tugas',
                        'nilai' => $_POST['tugas'][0],
                        'nilai' => $_POST['tugas'][0],
                        'nilai_praktek' => $_POST['tugas_praktek'][0],
                ];
                // Update data berdasarkan
                $process = UpdateOneData('penilaian', $data, ' WHERE id_penilaian =' . QueryOnedata($check_penilaian_tugas)->fetch_assoc()['id_penilaian'] . '');
        } else { // Jika elum ada nilai tugas maka di tambahkan
                $data = [
                        'id_plotting' => QueryOnedata($plotting)->fetch_assoc()['id_plotting'],
                        'jenis_penilaian' => 'tugas',
                        'nilai' => $_POST['tugas'][0],
                        'nilai_praktek' => $_POST['tugas_praktek'][0],
                ];
                // Insert satu data
                $process = InsertOnedata('penilaian', $data);
        }

        $check_penilaian_uh = "SELECT * FROM penilaian WHERE id_plotting = " . QueryOnedata($plotting)->fetch_assoc()['id_plotting'] . " AND jenis_penilaian = 'uh' ";
        if (QueryOnedata($check_penilaian_uh)->num_rows > 0) { //Jika Sudah ada nilainya maka update data
                // Data yang ingin Execution
                $data = [
                        'id_plotting' => QueryOnedata($plotting)->fetch_assoc()['id_plotting'],
                        'jenis_penilaian' => 'uh',
                        'nilai' => $_POST['uh'][0],
                        'nilai_praktek' => $_POST['uh_praktek'][0],
                ];
                // Update data berdasarkan
                $process = UpdateOneData('penilaian', $data, ' WHERE id_penilaian =' . QueryOnedata($check_penilaian_uh)->fetch_assoc()['id_penilaian'] . '');
        } else { // Jika elum ada nilai uh maka di tambahkan
                $data = [
                        'id_plotting' => QueryOnedata($plotting)->fetch_assoc()['id_plotting'],
                        'jenis_penilaian' => 'uh',
                        'nilai' => $_POST['uh'][0],
                        'nilai_praktek' => $_POST['uh_praktek'][0],
                ];
                // Insert satu data
                $process = InsertOnedata('penilaian', $data);
        }
        $check_penilaian_uts = "SELECT * FROM penilaian WHERE id_plotting = " . QueryOnedata($plotting)->fetch_assoc()['id_plotting'] . " AND jenis_penilaian = 'uts' ";
        if (QueryOnedata($check_penilaian_uts)->num_rows > 0) { //Jika Sudah ada nilainya maka update data
                // Data yang ingin Execution
                $data = [
                        'id_plotting' => QueryOnedata($plotting)->fetch_assoc()['id_plotting'],
                        'jenis_penilaian' => 'uts',
                        'nilai' => $_POST['uts'][0],
                        'nilai_praktek' => $_POST['uts_praktek'][0],
                ];
                // Update data berdasarkan
                $process = UpdateOneData('penilaian', $data, ' WHERE id_penilaian =' . QueryOnedata($check_penilaian_uts)->fetch_assoc()['id_penilaian'] . '');
        } else { // Jika elum ada nilai uts maka di tambahkan
                $data = [
                        'id_plotting' => QueryOnedata($plotting)->fetch_assoc()['id_plotting'],
                        'jenis_penilaian' => 'uts',
                        'nilai' => $_POST['uts'][0],
                        'nilai_praktek' => $_POST['uts_praktek'][0],
                ];
                // Insert satu data
                $process = InsertOnedata('penilaian', $data);
        }
        $check_penilaian_uas = "SELECT * FROM penilaian WHERE id_plotting = " . QueryOnedata($plotting)->fetch_assoc()['id_plotting'] . " AND jenis_penilaian = 'uas' ";
        if (QueryOnedata($check_penilaian_uas)->num_rows > 0) { //Jika Sudah ada nilainya maka update data
                // Data yang ingin Execution
                $data = [
                        'id_plotting' => QueryOnedata($plotting)->fetch_assoc()['id_plotting'],
                        'jenis_penilaian' => 'uas',
                        'nilai' => $_POST['uas'][0],
                        'nilai_praktek' => $_POST['uas_praktek'][0],
                ];
                // Update data berdasarkan
                $process = UpdateOneData('penilaian', $data, ' WHERE id_penilaian =' . QueryOnedata($check_penilaian_uas)->fetch_assoc()['id_penilaian'] . '');
        } else { // Jika elum ada nilai uas maka di tambahkan
                $data = [
                        'id_plotting' => QueryOnedata($plotting)->fetch_assoc()['id_plotting'],
                        'jenis_penilaian' => 'uas',
                        'nilai' => $_POST['uas'][0],
                        'nilai_praktek' => $_POST['uas_praktek'][0],
                ];
                // Insert satu data
                $process = InsertOnedata('penilaian', $data);
        }

        $_SESSION['message'] = 'Data Penilaian Siswa ' . $process['message'];
        $_SESSION['message_code'] =  $process['code'];
        header('Location: ' . $url . '/app/penilaian/siswa.php?id_periode=' . $_POST['id_periode'][0] . '&id_kelas=' . $_POST['id_kelas'][0] . '&id_mapel=' . $_POST['id_mapel'][0] . '');
        exit();
} elseif ($_GET['action'] == 'delete') {
        $process = DeleteOneData('penilaian', 'WHERE id_penilaian = ' . $_GET['id_penilaian'] . '');
        $_SESSION['message'] = 'Data Penilaian Siswa ' . $process['message'];
        $_SESSION['message_code'] =  $process['code'];
        header('Location: ' . $url . '/app/penilaian/index.php');
        exit();
}
