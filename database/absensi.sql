-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 19, 2020 at 10:22 AM
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
(1, '08:24:09', '19:28:42', '', '2020-10-28', 35, '2020-11-03 08:27:32', NULL),
(2, '08:27:46', '19:29:22', '', '2020-10-28', 38, '2020-11-17 17:00:00', NULL),
(3, '08:30:09', '19:30:09', '', '2020-10-28', 33, '2020-11-17 17:00:00', NULL),
(4, '09:01:55', '19:30:55', '', '2020-10-28', 37, '2020-11-17 17:00:00', NULL),
(5, NULL, NULL, 'izin', '2020-10-29', 35, '2020-10-28 23:00:00', NULL),
(6, NULL, NULL, 'alpa', '2020-10-29', 33, '2020-10-29 00:00:00', NULL),
(7, '07:22:00', '19:12:05', '', '2020-10-29', 38, '2020-10-28 17:00:00', NULL),
(8, '07:51:09', '19:08:26', '', '2020-10-29', 37, '2020-10-28 17:00:00', NULL),
(9, '07:41:30', '19:31:15', '', '2020-10-30', 35, '2020-10-29 17:00:00', NULL),
(10, '07:53:26', '11:12:05', '', '2020-10-30', 37, '2020-10-29 17:00:00', NULL),
(11, NULL, NULL, 'izin', '2020-11-30', 38, '2020-10-29 17:00:00', NULL);

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
(3, 'Manage Service Providerssss', '2020-11-09 18:42:12', '2020-11-18 09:38:33');

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
(1, '08:00:00', '19:00:00', '2020-11-09 18:35:29', NULL);

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
  `jenis_kelamin` enum('laki-laki','perempuan') NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(20) NOT NULL,
  `status` text NOT NULL,
  `id_akses` int(10) DEFAULT NULL,
  `id_department` int(10) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nip`, `nama`, `email`, `password`, `api_token`, `jenis_kelamin`, `alamat`, `no_telp`, `status`, `id_akses`, `id_department`, `created_at`, `updated_at`) VALUES
(33, '26789135787129', 'pupu oktavia', 'pupuoktaviaa@gmail.com', '$2y$10$9BJNQfswUf/w6uycVBk3Tu2rGGY7CGvKgm9NV6C8hRolMzUDzWnQu', NULL, 'perempuan', 'kp cicadas 02 rt3 rw2', '0896712541', 'Student high', 2, 3, '2020-11-17 07:43:34', '2020-11-17 08:58:55'),
(35, '200310032021061001', 'Marino Imola', 'marinoimola@gmail.com', '$2y$10$iJflnTAy5KXd.Hx8C4SDp.iNqRQiptnh0qQeOI28mwvFasybDLGCK', '46b15325e7fddf0d570d90d3d73950f4286070e3', 'laki-laki', 'Jl.Cijahe no.1 rt02/rw01 kec.Bogor Barat kel.Curug Mekar Bogor 16113', '081284855532', 'Pelajar', 4, 1, '2020-11-17 08:49:14', '2020-11-19 07:56:26'),
(37, '465765876465', 'Haikal Damar', 'haikaldamar23@gmail.com', '$2y$10$H5y0rAYFnY4r.WYLP7buFO.9esYB1XHRzpaRztopOE13Wa6ooX7fa', NULL, 'laki-laki', 'BTN Purwasari Regency blok B no 48 rt/rw 004/006 kecamatan cicurug kab.sukabumi ', '085722737371', 'Laku keras ', 4, 3, '2020-11-17 09:00:17', '2020-11-18 03:16:26'),
(38, '2003090306', 'Rima Lestari', 'lrima989@gmail.com', '$2y$10$nffu.zmSfMIQLEFJFuXJiOZfRu7b5JYuBfGrYLNGD7jv5bDkDNT7y', NULL, 'perempuan', 'jln simpang tiga', '089614224096', 'Jomblo', 3, 2, '2020-11-17 09:04:42', NULL);

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
  MODIFY `id_absen` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

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
  MODIFY `id_user` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
