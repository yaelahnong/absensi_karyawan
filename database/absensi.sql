-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 23, 2020 at 04:40 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `absensi`
--

-- --------------------------------------------------------

--
-- Table structure for table `absen`
--

CREATE TABLE `absen` (
  `id_absen` int(10) NOT NULL,
  `jam_masuk` time DEFAULT NULL,
  `jam_keluar` time DEFAULT NULL,
  `keterangan` text NOT NULL,
  `tanggal` date NOT NULL,
  `id_user` int(10) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `absen`
--

INSERT INTO `absen` (`id_absen`, `jam_masuk`, `jam_keluar`, `keterangan`, `tanggal`, `id_user`, `created_at`, `updated_at`) VALUES
(1, '08:24:09', '19:28:42', '', '2020-10-28', 32, '2020-11-03 08:27:32', NULL),
(2, '08:27:46', '19:29:22', '', '2020-10-28', 39, '2020-11-17 17:00:00', NULL),
(3, '08:30:09', '19:30:09', '', '2020-10-28', 40, '2020-11-17 17:00:00', NULL),
(4, '09:01:55', '19:30:55', '', '2020-10-28', 41, '2020-11-17 17:00:00', NULL),
(5, NULL, NULL, 'izin', '2020-10-29', 32, '2020-10-28 23:00:00', NULL),
(6, NULL, NULL, 'alpa', '2020-10-29', 39, '2020-10-29 00:00:00', NULL),
(7, '07:22:00', '19:12:05', '', '2020-10-29', 40, '2020-10-28 17:00:00', NULL),
(8, '07:51:09', '19:08:26', '', '2020-10-29', 41, '2020-10-28 17:00:00', NULL),
(9, '07:41:30', '19:31:15', '', '2020-10-30', 32, '2020-10-29 17:00:00', NULL),
(10, '07:53:26', '11:12:05', '', '2020-10-30', 39, '2020-10-29 17:00:00', NULL),
(11, NULL, NULL, 'izin', '2020-11-30', 40, '2020-10-29 17:00:00', NULL),
(12, '09:09:00', '18:07:00', '', '2020-12-09', 32, NULL, NULL),
(13, '07:09:00', '14:00:00', '', '2020-12-17', 39, NULL, NULL),
(14, '08:08:00', '19:03:00', '', '2020-12-08', 40, NULL, NULL),
(15, '09:13:00', '19:03:00', '', '2020-11-08', 41, NULL, NULL),
(16, '09:13:00', '11:12:05', '', '2020-11-16', 39, NULL, NULL),
(17, '09:13:00', '24:08:00', '', '2020-11-08', 40, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(10) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `photo` text NOT NULL,
  `id_akses` int(10) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama`, `username`, `password`, `photo`, `id_akses`, `created_at`, `updated_at`) VALUES
(20, 'Administrator', 'admin', '$2y$10$atJfVZK/hDkvAwh3Xm31a.op1RRKlsKe6OWvZMjCVoBWvmFGnEK8a', 'IMG_1089.jpg', 0, '2020-11-09 11:10:37', NULL),
(21, 'Marino Imola', 'yaelahnong', '$2y$10$E3HaN2qQhmDnrRLAPNKqHudskW70n7mwiVWmBg0oXEzf0GJXV1LKq', 'ino.jpg', 1, '2020-11-09 11:28:38', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `akses`
--

CREATE TABLE `akses` (
  `id_akses` int(10) NOT NULL,
  `ket_akses` varchar(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `akses`
--

INSERT INTO `akses` (`id_akses`, `ket_akses`, `created_at`, `updated_at`) VALUES
(0, 'Super Admin', '2020-11-09 18:40:47', NULL),
(1, 'Admin', '2020-11-09 18:40:56', NULL),
(2, 'Lead Department', '2020-11-09 18:41:05', NULL),
(3, 'Project Manager', '2020-11-09 18:41:13', NULL),
(4, 'Employee', '2020-11-12 08:04:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id_department` int(10) NOT NULL,
  `ket_department` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id_department`, `ket_department`, `created_at`, `updated_at`) VALUES
(1, 'Software Developement', '2020-11-09 18:41:57', NULL),
(2, 'Digital Marketing', '2020-11-09 18:42:04', NULL),
(3, 'Manage Service Provider', '2020-11-09 18:42:12', '2020-11-19 04:45:01');

-- --------------------------------------------------------

--
-- Table structure for table `overtime`
--

CREATE TABLE `overtime` (
  `id_overtime` int(10) NOT NULL,
  `jam_mulai` time NOT NULL,
  `jam_selesai` time NOT NULL,
  `ket_overtime` text NOT NULL,
  `id_absen` int(10) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `overtime`
--

INSERT INTO `overtime` (`id_overtime`, `jam_mulai`, `jam_selesai`, `ket_overtime`, `id_absen`, `created_at`, `updated_at`) VALUES
(1, '19:00:00', '23:00:00', 'BugFixing', 1, '2020-11-09 18:39:08', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `id_schedule` int(10) NOT NULL,
  `jam_masuk` time NOT NULL,
  `jam_keluar` time NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`id_schedule`, `jam_masuk`, `jam_keluar`, `created_at`, `updated_at`) VALUES
(1, '08:00:00', '19:00:00', '2020-11-09 18:35:29', '2020-11-19 04:02:05');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(10) NOT NULL,
  `nip` varchar(20) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `api_token` varchar(255) DEFAULT NULL,
  `reset_password_token` varchar(255) DEFAULT NULL,
  `reset_password_expires` datetime DEFAULT NULL,
  `jenis_kelamin` enum('laki-laki','perempuan') NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(20) NOT NULL,
  `status` text NOT NULL,
  `foto` text DEFAULT NULL,
  `id_akses` int(10) DEFAULT NULL,
  `id_department` int(10) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nip`, `nama`, `email`, `password`, `api_token`, `reset_password_token`, `reset_password_expires`, `jenis_kelamin`, `alamat`, `no_telp`, `status`, `foto`, `id_akses`, `id_department`, `created_at`, `updated_at`) VALUES
(32, '200310032021061456', 'Marino Imola', 'marinoimola@gmail.com', '$2y$10$lkKmA.H2SZk4fJEb.4mf0esmo1v9E62kaYCsQ.yrHUHkAwcNtpSfy', '97e114cc120952965b1e617db2e1b8babf3b375b', 'eyJpdiI6ImorVzBRL0pZNmVZMUVmcEhXTEs4WWc9PSIsInZhbHVlIjoiRFErdkRmZFYzc0duUXNaY05OV0haQT09IiwibWFjIjoiMmY4MGIzZjA3YWFjNjk1OTU4M2JlYTI4ZDIyYjY0Yjk0YWJiNDQwODE0OTY0YjZjMjhlYzY5Y2ZmMzk0MTk5YyJ9', '2020-11-23 03:02:22', 'laki-laki', 'Jl.Cijahe no.1 rt02/rw01 kel.Curug Mekar kec.Bogor Barat Bogor 16113', '081284855532', 'Student', 'ino.jpg', 2, 1, '2020-11-03 02:14:48', '2020-11-22 21:08:25'),
(39, '2003090603', 'Rima Lestari', 'lrima989@gmail.com', '$2y$10$fytcNBcfpbC3AO3Ej9W/o.08sIl9Q4zlts6Fso5nwq1fx1OM20L0W', NULL, NULL, NULL, 'perempuan', 'Jln.simpang tiga', '089614224096', 'Jomblo', '', 2, 1, '2020-11-19 03:45:15', NULL),
(40, '12365478909282', 'Pupu Oktavia', 'oktaviapupu@gmail.com', '$2y$10$gacKVZ28SBqo25lo.4DrXOBPkH6.PE1d9hXctTEscZu84dhuHb9pi', '3dfa53c8a0a847d40fd6456563bbd6dddcffb4d1', 'eyJpdiI6IlVvdmNIZzd6U3l5VUJTcHprQ3BVTVE9PSIsInZhbHVlIjoiZkplNzdIWW1nbGVlcSt3aGpVQzZOUT09IiwibWFjIjoiYWU3OTMwYmJhYzdlZWY4NTVkMDI3YTIyZGY1YTBjNzI1MGRjOGI0Zjc1OGQwYzBhMzM0MzgzZjY3YWQ2MThlZCJ9', '2020-11-19 19:43:04', 'perempuan', 'Jln. Cicadas 02 RT/RW 003/002 kecamatan ciampea kabupaten bogor 116620', '08958000000', 'Mau Nikah', '', 3, 3, '2020-11-19 03:46:34', '2020-11-19 12:10:13'),
(41, '12039137131236123', 'Haikal Damar', 'haikaldamar23@gmail.com', '$2y$10$h5uTtKW.bX9j.jBzQBcXpOfKTTPpSY0Kxx.sMFW4XZiBdYKF6SqXm', 'fd6ab7dc98779dd2a1b9f656bab13ef7fa744dc4', NULL, NULL, 'laki-laki', 'BTN Purwasari Regency Blok B no 48 RT/RW 004/006 Desa Purwasari Kec.Cicurug Kab.Sukabumi ', '085722737371', 'laku keras', 'damar.jpg', 2, 1, '2020-11-19 03:50:24', '2020-11-21 09:01:32');

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_late`
-- (See below for the actual view)
--
CREATE TABLE `v_late` (
`datang` time
,`jadwal` time
,`cek` int(1)
);

-- --------------------------------------------------------

--
-- Structure for view `v_late`
--
DROP TABLE IF EXISTS `v_late`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_late`  AS  select `absen`.`jam_masuk` AS `datang`,`schedule`.`jam_masuk` AS `jadwal`,timediff(`absen`.`jam_masuk`,`schedule`.`jam_masuk`) > 0 AS `cek` from (`absen` join `schedule`) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absen`
--
ALTER TABLE `absen`
  ADD PRIMARY KEY (`id_absen`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `akses`
--
ALTER TABLE `akses`
  ADD PRIMARY KEY (`id_akses`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id_department`);

--
-- Indexes for table `overtime`
--
ALTER TABLE `overtime`
  ADD PRIMARY KEY (`id_overtime`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`id_schedule`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absen`
--
ALTER TABLE `absen`
  MODIFY `id_absen` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id_department` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `overtime`
--
ALTER TABLE `overtime`
  MODIFY `id_overtime` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `id_schedule` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
