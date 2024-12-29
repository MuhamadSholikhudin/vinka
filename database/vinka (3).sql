-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 29, 2024 at 11:12 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vinka`
--

-- --------------------------------------------------------

--
-- Table structure for table `berkas_pendaftaran`
--

CREATE TABLE `berkas_pendaftaran` (
  `id_berkas` int(11) NOT NULL,
  `id_pendaftaran` int(11) DEFAULT NULL,
  `nm_berkas` text DEFAULT NULL,
  `file_berkas` blob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `berkas_pendaftaran`
--

INSERT INTO `berkas_pendaftaran` (`id_berkas`, `id_pendaftaran`, `nm_berkas`, `file_berkas`) VALUES
(1, 1, 'Akte Kelahiran', 0x32303234313231373130303632364c61796f7574204b616d61722e64726177696f2e706466),
(2, 1, 'Kartu Keluarga', 0x32303234313231373130303632363236312d41727469636c6520546578742d313134312d312d31302d32303139303332322e706466),
(3, 2, 'Akte Kelahiran', 0x32303234313232373131313735304c61796f7574204b616d61722e64726177696f2e706466),
(4, 2, 'Kartu Keluarga', 0x32303234313232373131313735304c61796f7574204b616d61722e64726177696f2e706466),
(5, 3, 'Akte Kelahiran', 0x32303234313232373131313831314c61796f7574204b616d61722e64726177696f2e706466),
(6, 3, 'Kartu Keluarga', 0x32303234313232373131313831314c61796f7574204b616d61722e64726177696f2e706466),
(7, 4, 'Akte Kelahiran', 0x32303234313232373131313832354c61796f7574204b616d61722e64726177696f2e706466),
(8, 4, 'Kartu Keluarga', 0x32303234313232373131313832354c61796f7574204b616d61722e64726177696f2e706466),
(9, 5, 'Akte Kelahiran', 0x32303234313232373131313834314c61796f7574204b616d61722e64726177696f2e706466),
(10, 5, 'Kartu Keluarga', 0x32303234313232373131313834314c61796f7574204b616d61722e64726177696f2e706466),
(11, 6, 'Akte Kelahiran', 0x32303234313232373131313835354c61796f7574204b616d61722e64726177696f2e706466),
(12, 6, 'Kartu Keluarga', 0x32303234313232373131313835354c61796f7574204b616d61722e64726177696f2e706466);

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `id_guru` int(11) NOT NULL,
  `nip` varchar(50) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `nm_guru` varchar(50) DEFAULT NULL,
  `no_guru` varchar(50) DEFAULT NULL,
  `jk_guru` enum('Laki-Laki','Perempuan') DEFAULT NULL,
  `alamat_guru` text DEFAULT NULL,
  `foto_guru` blob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`id_guru`, `nip`, `id_user`, `nm_guru`, `no_guru`, `jk_guru`, `alamat_guru`, `foto_guru`) VALUES
(1, '123456789', 6, 'AGUS', '081234567890', 'Laki-Laki', 'Jl. Merdeka No. 1', 0x666f746f312e6a7067),
(2, '987654321', 7, 'Agus Prasetyo', '081298765432', 'Laki-Laki', 'Jl. Kartini No. 5', 0x666f746f322e6a7067),
(3, '112233445', 8, 'Siti Marlina', '081223344556', 'Perempuan', 'Jl. Sudirman No. 12', 0x666f746f332e6a7067),
(4, '556677889', 9, 'Dedi Susanto', '081255667788', 'Laki-Laki', 'Jl. Diponegoro No. 9', 0x666f746f342e6a7067),
(5, '334455667', 10, 'Nurul Hidayati', '081334455667', 'Perempuan', 'Jl. Thamrin No. 3', 0x666f746f352e6a7067),
(6, '132332332', 11, 'Bambang Wahyudi', '895413553543', 'Laki-Laki', '-', 0x3230323431323238303531363330617661746172352e706e67),
(7, '123456789', 12, 'Fitri Lestari', '81234567890', 'Perempuan', 'Jl. Merdeka No. 1', 0x666f746f312e6a7067),
(8, '987654321', 13, 'Arif Hidayat', '81298765432', 'Laki-Laki', 'Jl. Kartini No. 5', 0x666f746f322e6a7067),
(9, '112233445', 14, 'Lina Kusuma', '81223344556', 'Perempuan', 'Jl. Sudirman No. 12', 0x666f746f332e6a7067),
(10, '112233446', 15, 'Hendri Setiawan', '81223344556', 'Laki-Laki', 'Jl. Sudirman No. 12', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `informasi_sekolah`
--

CREATE TABLE `informasi_sekolah` (
  `id_informasi` int(11) NOT NULL,
  `judul_informasi` varchar(225) DEFAULT NULL,
  `ket_informasi` text DEFAULT NULL,
  `gambar_informasi` blob DEFAULT NULL,
  `tgl_post_informasi` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `informasi_sekolah`
--

INSERT INTO `informasi_sekolah` (`id_informasi`, `judul_informasi`, `ket_informasi`, `gambar_informasi`, `tgl_post_informasi`) VALUES
(1, 'Sosialisasi Pendaftaran Siswa Baru MI Al-Hidayah Tahun Pelajaran 2024/2025', 'Dalam rangka penerimaan siswa baru di MI Al-Hidayah untuk Tahun Pelajaran 2024/2025, kami mengundang para calon wali murid untuk mengikuti sosialisasi pendaftaran siswa baru.\r\n\r\nKegiatan sosialisasi ini akan membahas:\r\n\r\nPersyaratan pendaftaran siswa baru.\r\nAlur pendaftaran dan tahapan seleksi.\r\nJadwal pendaftaran dan pengumuman hasil.\r\nProsedur registrasi ulang bagi siswa yang dinyatakan diterima.\r\nInformasi terkait kegiatan belajar mengajar di MI Al-Hidayah.\r\nWaktu dan Tempat Sosialisasi:\r\n\r\nHari/Tanggal: [Isi sesuai jadwal]\r\nWaktu: [Isi sesuai waktu acara]\r\nTempat: [Lokasi sosialisasi, misalnya Aula MI Al-Hidayah]\r\nDiharapkan kepada seluruh calon wali murid untuk hadir tepat waktu guna mendapatkan informasi yang lengkap dan jelas.\r\n\r\nInformasi lebih lanjut dapat menghubungi:\r\nSeksi Tata Usaha MI Al-Hidayah\r\nKontak: [Nomor Telepon/WhatsApp]', 0x32303234313231373039303230327777772e706e67, '2024-12-18');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_guru`
--

CREATE TABLE `jenis_guru` (
  `id_jenis_guru` int(11) NOT NULL,
  `nm_jenis_guru` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jenis_guru`
--

INSERT INTO `jenis_guru` (`id_jenis_guru`, `nm_jenis_guru`) VALUES
(3, 'HONORER'),
(4, 'PNS');

-- --------------------------------------------------------

--
-- Table structure for table `kehadiran_siswa`
--

CREATE TABLE `kehadiran_siswa` (
  `id_kehadiran` int(11) NOT NULL,
  `id_plotting` int(50) DEFAULT NULL,
  `tgl_kehadiran` date DEFAULT NULL,
  `jenis_kehadiran` enum('Masuk','Alfa','Izin') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kehadiran_siswa`
--

INSERT INTO `kehadiran_siswa` (`id_kehadiran`, `id_plotting`, `tgl_kehadiran`, `jenis_kehadiran`) VALUES
(1, 1, '2024-12-17', 'Masuk');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int(11) NOT NULL,
  `id_guru` int(11) DEFAULT NULL,
  `nm_kelas` varchar(50) DEFAULT NULL,
  `tingkatan` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `id_guru`, `nm_kelas`, `tingkatan`) VALUES
(3, 1, '1', 1),
(4, 2, '2', 2),
(5, 3, '3', 3),
(6, 4, '4', 4),
(7, 5, '5', 5),
(8, 6, '6', 6);

-- --------------------------------------------------------

--
-- Table structure for table `mapel`
--

CREATE TABLE `mapel` (
  `id_mapel` int(11) NOT NULL,
  `id_guru` int(11) DEFAULT NULL,
  `nm_mapel` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mapel`
--

INSERT INTO `mapel` (`id_mapel`, `id_guru`, `nm_mapel`) VALUES
(1, 1, 'Matematika'),
(2, 2, 'Bahasa Indonesia'),
(3, 3, 'Bahasa Inggris'),
(4, 4, 'Ilmu Pengetahuan Alam (IPA)'),
(5, 5, 'Ilmu Pengetahuan Sosial (IPS)'),
(6, 6, 'Pendidikan Agama'),
(7, 7, 'Pendidikan Kewarganegaraan (PKn)'),
(8, 8, 'Seni Budaya dan Keterampilan'),
(9, 9, 'Pendidikan Jasmani dan Kesehatan'),
(10, 10, 'Muatan Lokal');

-- --------------------------------------------------------

--
-- Table structure for table `pendaftaran_siswa`
--

CREATE TABLE `pendaftaran_siswa` (
  `id_pendaftaran` int(11) NOT NULL,
  `id_periode` int(50) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `tgl_daftar` date DEFAULT NULL,
  `nm_siswa` varchar(50) DEFAULT NULL,
  `jk_siswa` enum('Laki-Laki','Perempuan') DEFAULT NULL,
  `alamat_siswa` text DEFAULT NULL,
  `nm_orang_tua` varchar(50) DEFAULT NULL,
  `no_hp_orang_tua` varchar(15) DEFAULT NULL,
  `foto_siswa` blob DEFAULT NULL,
  `status_pendaftaran` varchar(100) DEFAULT NULL,
  `asal_sekolah` text DEFAULT NULL,
  `nm_wali_murid` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pendaftaran_siswa`
--

INSERT INTO `pendaftaran_siswa` (`id_pendaftaran`, `id_periode`, `id_user`, `tgl_daftar`, `nm_siswa`, `jk_siswa`, `alamat_siswa`, `nm_orang_tua`, `no_hp_orang_tua`, `foto_siswa`, `status_pendaftaran`, `asal_sekolah`, `nm_wali_murid`) VALUES
(1, 1, 4, '2024-12-17', 'Saifudin Andro', 'Laki-Laki', 'Pati Puri', 'Andro', '895413553643', 0x5b424c4f42202d20323420425d, 'data di terima', 'TK AL-HIKMAH PATI', NULL),
(2, 1, 17, '2024-12-18', 'Dimas Hendra', 'Laki-Laki', 'Jalan Raya', 'Hendra', '895413553643', 0x5b424c4f42202d20323420425d, 'data di terima', 'TK AL-HIKMAH PATI', NULL),
(3, 1, 18, '2024-12-18', 'Fitri Lestari', 'Perempuan', 'Sawojajar', 'Lestari', '895413553643', 0x5b424c4f42202d20323420425d, 'data di terima', 'TK AL-HIKMAH PATI', NULL),
(4, 1, 19, '2024-12-19', 'Budi Santoso', 'Laki-Laki', 'Kalipuro', 'Santoso', '895413553643', 0x5b424c4f42202d20323420425d, 'data di terima', 'TK AL-HIKMAH PATI', NULL),
(5, 1, 20, '2024-12-20', 'Rina Wulandari', 'Perempuan', 'Mojokerto', 'Wulandari', '895413553643', 0x5b424c4f42202d20323420425d, 'data di terima', 'TK AL-HIKMAH PATI', NULL),
(6, 1, 21, '2024-12-21', 'Agus Prasetyo', 'Laki-Laki', 'Sumber Rejo', 'Prasetyo', '895413553643', 0x5b424c4f42202d20323420425d, 'data di terima', 'TK AL-HIKMAH PATI', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `penilaian`
--

CREATE TABLE `penilaian` (
  `id_penilaian` int(11) NOT NULL,
  `id_plotting` int(11) DEFAULT NULL,
  `jenis_penilaian` varchar(100) DEFAULT NULL,
  `nilai` int(11) DEFAULT NULL,
  `nilai_praktek` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `periode`
--

CREATE TABLE `periode` (
  `id_periode` int(11) NOT NULL,
  `nm_periode` varchar(50) DEFAULT NULL,
  `status_periode` enum('Aktif','Non Aktif') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `periode`
--

INSERT INTO `periode` (`id_periode`, `nm_periode`, `status_periode`) VALUES
(1, 'SEMESTER GASAL 2024', 'Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `plotting_jadwal`
--

CREATE TABLE `plotting_jadwal` (
  `id_plotting` int(11) NOT NULL,
  `id_siswa` int(11) DEFAULT NULL,
  `id_kelas` int(11) DEFAULT NULL,
  `id_mapel` int(11) DEFAULT NULL,
  `id_periode` int(11) DEFAULT NULL,
  `hari` varchar(10) DEFAULT NULL,
  `jam_awal` time DEFAULT NULL,
  `jam_akhir` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `plotting_jadwal`
--

INSERT INTO `plotting_jadwal` (`id_plotting`, `id_siswa`, `id_kelas`, `id_mapel`, `id_periode`, `hari`, `jam_awal`, `jam_akhir`) VALUES
(2, 4, 3, 1, 1, 'Senin', '07:00:00', '08:00:00'),
(3, 5, 3, 1, 1, 'Senin', '07:00:00', '08:00:00'),
(4, 6, 3, 1, 1, 'Senin', '07:00:00', '08:00:00'),
(5, 7, 3, 1, 1, 'Senin', '07:00:00', '08:00:00'),
(6, 8, 3, 1, 1, 'Senin', '07:00:00', '08:00:00'),
(7, 9, 3, 1, 1, 'Senin', '07:00:00', '08:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id_siswa` int(11) NOT NULL,
  `nis` varchar(50) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `nm_siswa` varchar(50) DEFAULT NULL,
  `jk_siswa` enum('Laki-Laki','Perempuan') DEFAULT NULL,
  `alamat_siswa` text DEFAULT NULL,
  `nm_orang_tua` varchar(50) DEFAULT NULL,
  `foto_siswa` blob DEFAULT NULL,
  `status` enum('aktif','tidak aktif') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id_siswa`, `nis`, `id_user`, `nm_siswa`, `jk_siswa`, `alamat_siswa`, `nm_orang_tua`, `foto_siswa`, `status`) VALUES
(4, '2024001', 4, 'Saifudin Andro', 'Laki-Laki', 'Pati Puri', 'Andro', 0x323032343132323830343534303975736572312d313238783132382e6a7067, 'aktif'),
(5, '2024002', 17, 'Dimas Hendra', 'Laki-Laki', 'Jalan Raya', 'Hendra', 0x323032343132323830343537303775736572382d313238783132382e6a7067, 'aktif'),
(6, '2024003', 18, 'Fitri Lestari', 'Perempuan', 'Sawojajar', 'Lestari', 0x323032343132323830343537323175736572332d313238783132382e6a7067, 'aktif'),
(7, '2024004', 19, 'Budi Santoso', 'Laki-Laki', 'Kalipuro', 'Santoso', 0x3230323431323238303530343333617661746172352e706e67, 'aktif'),
(8, '2024005', 20, 'Rina Wulandari', 'Perempuan', 'Mojokerto', 'Wulandari', 0x3230323431323238303530343437617661746172322e706e67, 'aktif'),
(9, '2024006', 21, 'Agus Prasetyo', 'Laki-Laki', 'Sumber Rejo', 'Prasetyo', 0x3230323431323238303530343539617661746172332e706e67, 'aktif');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `nm_pengguna` varchar(50) DEFAULT NULL,
  `level` enum('Kepala Sekolah','Seksi Tata Usaha','Seksi Kurikulum','Guru','Orang Tua') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `nm_pengguna`, `level`) VALUES
(1, 'vinka', 'vinka', 'vinka', 'Kepala Sekolah'),
(2, 'bagas', 'bagas', 'bagas', 'Seksi Kurikulum'),
(4, 'andro', 'andro', 'andro', 'Orang Tua'),
(5, 'umar', 'umar', 'Umar', 'Seksi Tata Usaha'),
(6, 'agus', '1', 'AGUS', 'Guru'),
(7, 'agus_prasetyo', '1', 'Agus Prasetyo', 'Guru'),
(8, 'siti_marlina', '1', 'Siti Marlina', 'Guru'),
(9, 'dedi_susanto', '1', 'Dedi Susanto', 'Guru'),
(10, 'nurul_hidayati', '1', 'Nurul Hidayati', 'Guru'),
(11, 'bambang_wahyudi', '1', 'Bambang Wahyudi', 'Guru'),
(12, 'fitri_lestari', '1', 'Fitri Lestari', 'Guru'),
(13, 'arif_hidayat', '1', 'Arif Hidayat', 'Guru'),
(14, 'lina_kusuma', '1', 'Lina Kusuma', 'Guru'),
(15, 'hendri_setiawan', '1', 'Hendri Setiawan', 'Guru'),
(16, 'rina_purnama', '1', 'Rina Purnama', 'Guru'),
(17, 'rina_mardiana', 'password2', 'Rina Mardiana', 'Orang Tua'),
(18, 'budi_hartono', 'password3', 'Budi Hartono', 'Orang Tua'),
(19, 'lilis_sari', 'password4', 'Lilis Sari', 'Orang Tua'),
(20, 'agus_kurniawan', 'password5', 'Agus Kurniawan', 'Orang Tua'),
(21, 'andi_susanto', 'password1', 'Andi Susanto', 'Orang Tua');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `berkas_pendaftaran`
--
ALTER TABLE `berkas_pendaftaran`
  ADD PRIMARY KEY (`id_berkas`);

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`id_guru`);

--
-- Indexes for table `informasi_sekolah`
--
ALTER TABLE `informasi_sekolah`
  ADD PRIMARY KEY (`id_informasi`);

--
-- Indexes for table `jenis_guru`
--
ALTER TABLE `jenis_guru`
  ADD PRIMARY KEY (`id_jenis_guru`);

--
-- Indexes for table `kehadiran_siswa`
--
ALTER TABLE `kehadiran_siswa`
  ADD PRIMARY KEY (`id_kehadiran`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `mapel`
--
ALTER TABLE `mapel`
  ADD PRIMARY KEY (`id_mapel`);

--
-- Indexes for table `pendaftaran_siswa`
--
ALTER TABLE `pendaftaran_siswa`
  ADD PRIMARY KEY (`id_pendaftaran`);

--
-- Indexes for table `penilaian`
--
ALTER TABLE `penilaian`
  ADD PRIMARY KEY (`id_penilaian`);

--
-- Indexes for table `periode`
--
ALTER TABLE `periode`
  ADD PRIMARY KEY (`id_periode`);

--
-- Indexes for table `plotting_jadwal`
--
ALTER TABLE `plotting_jadwal`
  ADD PRIMARY KEY (`id_plotting`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id_siswa`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `berkas_pendaftaran`
--
ALTER TABLE `berkas_pendaftaran`
  MODIFY `id_berkas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `guru`
--
ALTER TABLE `guru`
  MODIFY `id_guru` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `informasi_sekolah`
--
ALTER TABLE `informasi_sekolah`
  MODIFY `id_informasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `jenis_guru`
--
ALTER TABLE `jenis_guru`
  MODIFY `id_jenis_guru` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `kehadiran_siswa`
--
ALTER TABLE `kehadiran_siswa`
  MODIFY `id_kehadiran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `mapel`
--
ALTER TABLE `mapel`
  MODIFY `id_mapel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `pendaftaran_siswa`
--
ALTER TABLE `pendaftaran_siswa`
  MODIFY `id_pendaftaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `penilaian`
--
ALTER TABLE `penilaian`
  MODIFY `id_penilaian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `periode`
--
ALTER TABLE `periode`
  MODIFY `id_periode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `plotting_jadwal`
--
ALTER TABLE `plotting_jadwal`
  MODIFY `id_plotting` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
