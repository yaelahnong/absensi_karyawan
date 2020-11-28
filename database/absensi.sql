-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 28, 2020 at 11:48 PM
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
  `keterangan` text DEFAULT NULL,
  `tanggal` date NOT NULL,
  `id_user` int(10) NOT NULL,
  `koordinat` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `absen`
--

INSERT INTO `absen` (`id_absen`, `jam_masuk`, `jam_keluar`, `keterangan`, `tanggal`, `id_user`, `koordinat`, `created_at`, `updated_at`) VALUES
(1, '08:24:09', '19:28:42', '', '2020-10-28', 32, '', '2020-11-03 08:27:32', NULL),
(2, '08:27:46', '19:29:22', '', '2020-10-28', 39, '', '2020-11-17 17:00:00', NULL),
(3, '08:30:09', '19:30:09', '', '2020-10-28', 40, '', '2020-11-17 17:00:00', NULL),
(4, '09:01:55', '19:30:55', '', '2020-10-28', 41, '', '2020-11-17 17:00:00', NULL),
(5, NULL, NULL, 'izin', '2020-10-29', 32, '', '2020-10-28 23:00:00', NULL),
(6, NULL, NULL, 'alpa', '2020-10-29', 39, '', '2020-10-29 00:00:00', NULL),
(7, '07:22:00', '19:12:05', '', '2020-10-29', 40, '', '2020-10-28 17:00:00', NULL),
(8, '07:51:09', '19:08:26', '', '2020-10-29', 41, '', '2020-10-28 17:00:00', NULL),
(9, '07:41:30', '19:31:15', '', '2020-10-30', 32, '', '2020-10-29 17:00:00', NULL),
(10, '07:53:26', '11:12:05', '', '2020-10-30', 39, '', '2020-10-29 17:00:00', NULL),
(11, NULL, NULL, 'izin', '2020-11-30', 40, '', '2020-10-29 17:00:00', NULL),
(12, '09:09:00', '18:07:00', '', '2020-12-09', 32, '', NULL, NULL),
(13, '07:09:00', '14:00:00', '', '2020-12-17', 39, '', NULL, NULL),
(14, '08:08:00', '19:03:00', '', '2020-12-08', 40, '', NULL, NULL),
(15, '09:13:00', '19:03:00', '', '2020-11-08', 41, '', NULL, NULL),
(16, '09:13:00', '11:12:05', '', '2020-11-16', 39, '', NULL, NULL),
(17, '09:13:00', '24:08:00', '', '2020-11-08', 40, '', NULL, NULL),
(20, '08:25:00', NULL, NULL, '2020-11-24', 39, '', '2020-11-23 23:01:22', '2020-11-23 23:01:22'),
(21, '08:25:00', NULL, NULL, '2020-11-24', 40, '', '2020-11-23 23:22:05', '2020-11-23 23:22:05'),
(22, '08:25:00', NULL, NULL, '2020-11-24', 41, '', '2020-11-23 23:23:54', '2020-11-23 23:23:54'),
(23, '08:25:00', NULL, NULL, '2020-11-24', 41, '', '2020-11-23 23:25:16', '2020-11-23 23:25:16'),
(24, '08:25:00', NULL, NULL, '2020-11-24', 41, '', '2020-11-23 23:25:24', '2020-11-23 23:25:24'),
(25, '08:25:00', NULL, NULL, '2020-11-24', 41, '', '2020-11-23 23:29:30', '2020-11-23 23:29:30'),
(26, '07:25:00', '15:00:00', NULL, '2020-11-24', 32, '-6.5646262, 106.7667172', '2020-11-24 00:29:48', '2020-11-24 00:39:17'),
(27, '08:00:00', '15:00:00', NULL, '2020-11-24', 41, '-6.5646262, 106.7667172', '2020-11-24 12:26:29', '2020-11-24 12:26:57'),
(28, '07:25:00', NULL, NULL, '2020-11-24', 41, '-6.5646262, 106.7667172', '2020-11-24 18:26:48', '2020-11-24 18:26:48'),
(29, '07:25:00', NULL, NULL, '2020-11-24', 41, '-6.5646262, 106.7667172', '2020-11-24 20:59:57', '2020-11-24 20:59:57'),
(30, '07:25:00', NULL, NULL, '2020-11-24', 41, '-6.5646262, 106.7667172', '2020-11-24 21:30:20', '2020-11-24 21:30:20'),
(31, '09:42:00', NULL, NULL, '2020-11-25', 32, '-6.5646262, 106.7667172', '2020-11-24 21:39:14', '2020-11-24 21:39:14'),
(32, '07:25:00', NULL, NULL, '2020-11-24', 41, '-6.5646262, 106.7667172', '2020-11-24 21:40:44', '2020-11-24 21:40:44'),
(33, '04:54:46', NULL, NULL, '2020-11-25', 32, '-6.5646262, 106.7667172', '2020-11-24 21:55:09', '2020-11-24 21:55:09'),
(34, '05:01:01', NULL, NULL, '2020-11-25', 32, ', ', '2020-11-24 22:01:22', '2020-11-24 22:01:22'),
(35, '04:07:40', NULL, NULL, '2020-11-25', 32, ', ', '2020-11-25 09:08:02', '2020-11-25 09:08:02'),
(36, '04:26:02', NULL, NULL, '2020-11-25', 32, ', ', '2020-11-25 09:26:28', '2020-11-25 09:26:28'),
(37, '04:32:36', NULL, NULL, '2020-11-25', 32, ', ', '2020-11-25 09:32:57', '2020-11-25 09:32:57'),
(38, '04:36:59', NULL, NULL, '2020-11-25', 32, ', ', '2020-11-25 09:37:42', '2020-11-25 09:37:42'),
(39, '05:23:15', NULL, NULL, '2020-11-25', 32, '-6.5646278, 106.7667145', '2020-11-25 10:23:35', '2020-11-25 10:23:35'),
(40, '05:32:26', NULL, NULL, '2020-11-25', 32, '-6.5646267, 106.7667171', '2020-11-25 10:37:20', '2020-11-25 10:37:20'),
(41, '17:41:00', NULL, NULL, '2020-11-25', 32, '-6.5646252, 106.7667117', '2020-11-25 10:41:29', '2020-11-25 10:41:29'),
(42, '17:54:55', NULL, NULL, '2020-11-25', 32, '-6.5647517, 106.7667489', '2020-11-25 10:55:28', '2020-11-25 10:55:28'),
(43, '18:01:13', NULL, NULL, '2020-11-25', 32, '-6.564626, 106.766713', '2020-11-25 11:03:32', '2020-11-25 11:03:32'),
(44, '18:14:02', NULL, NULL, '2020-11-25', 32, '-6.5646276, 106.7667138', '2020-11-25 11:14:20', '2020-11-25 11:14:20'),
(45, '18:17:04', NULL, NULL, '2020-11-25', 32, '-6.5646264, 106.7667138', '2020-11-25 11:17:21', '2020-11-25 11:17:21'),
(46, '18:21:42', NULL, NULL, '2020-11-25', 32, '-6.5646242, 106.7667148', '2020-11-25 11:22:16', '2020-11-25 11:22:16'),
(47, '18:25:28', '20:05:00', NULL, '2020-11-25', 32, '-6.5646262, 106.7667133', '2020-11-25 11:26:30', '2020-11-25 11:29:58'),
(48, '18:31:43', NULL, NULL, '2020-11-25', 32, '-6.5646238, 106.7667131', '2020-11-25 11:32:06', '2020-11-25 11:32:06'),
(49, '18:34:23', '18:34:23', NULL, '2020-11-25', 32, '-6.5646279, 106.7667159', '2020-11-25 11:34:43', '2020-11-25 11:34:54'),
(50, '20:21:59', '20:21:59', NULL, '2020-11-26', 32, '-6.5647517, 106.7667489', '2020-11-26 13:22:24', '2020-11-26 13:22:32'),
(51, '23:58:16', '23:58:17', NULL, '2020-11-27', 32, '-6.5646247, 106.7667162', '2020-11-27 17:00:17', '2020-11-27 17:00:21'),
(52, '05:42:04', '05:43:39', NULL, '2020-11-29', 32, '-6.5646266, 106.7667171', '2020-11-28 22:43:38', '2020-11-28 22:43:54');

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
-- Table structure for table `cuti`
--

CREATE TABLE `cuti` (
  `id_cuti` int(10) NOT NULL,
  `tanggal_mulai` date NOT NULL,
  `tanggal_selesai` date NOT NULL,
  `ket_cuti` text NOT NULL,
  `status` enum('pending','approved','rejected') NOT NULL,
  `id_user` int(10) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cuti`
--

INSERT INTO `cuti` (`id_cuti`, `tanggal_mulai`, `tanggal_selesai`, `ket_cuti`, `status`, `id_user`, `created_at`, `updated_at`) VALUES
(1, '2020-12-30', '2020-12-02', 'Annual Leave', 'pending', 41, NULL, NULL),
(2, '2020-11-28', '2020-11-29', 'Uji Sertifikasi', 'rejected', 41, '2020-11-26 21:48:20', '2020-11-26 21:48:20'),
(3, '2020-11-28', '2020-11-29', 'Uji Sertifikasi', 'pending', 32, '2020-11-26 22:21:27', '2020-11-26 22:21:27'),
(5, '2020-11-28', '2020-11-29', 'Uji Sertifikasi', 'approved', 32, '2020-11-27 14:09:08', '2020-11-27 14:09:08'),
(6, '2020-11-28', '2020-12-01', 'Liburan Keluarga', 'approved', 41, '2020-11-27 14:31:25', '2020-11-27 14:31:25'),
(7, '2020-11-27', '2020-11-30', 'Pulang Kampung', 'approved', 41, '2020-11-27 16:10:34', '2020-11-27 16:10:34'),
(8, '2020-11-28', '2020-11-27', 'liburan', 'approved', 32, '2020-11-27 16:24:35', '2020-11-27 16:24:35'),
(9, '2016-11-29', '2020-11-30', 'holiday', 'rejected', 41, '2020-11-28 14:55:41', '2020-11-28 14:55:41'),
(10, '2020-11-29', '2020-12-30', 'Annual Leave', 'approved', 41, '2020-11-28 15:02:00', '2020-11-28 15:02:00'),
(11, '2020-12-29', '2020-12-31', 'Annual Leave', 'approved', 41, '2020-11-28 15:38:54', '2020-11-28 15:38:54'),
(12, '2020-12-11', '2020-11-15', 'Pulang Kampung', 'pending', 41, '2020-11-28 15:58:52', '2020-11-28 15:58:52'),
(13, '2020-11-29', '2020-11-30', 'liburan', 'approved', 41, '2020-11-28 21:05:56', '2020-11-28 21:05:56');

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
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `id_location` int(10) NOT NULL,
  `coordinate` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`id_location`, `coordinate`) VALUES
(1, '-6.564593110012669,106.76674343803992');

-- --------------------------------------------------------

--
-- Table structure for table `overtime`
--

CREATE TABLE `overtime` (
  `id_overtime` int(10) NOT NULL,
  `jam_mulai` time NOT NULL,
  `jam_selesai` time NOT NULL,
  `ket_overtime` text NOT NULL,
  `id_absen` int(10) DEFAULT NULL,
  `status` enum('pending','approved','rejected') NOT NULL,
  `tanggal` date NOT NULL,
  `id_user` int(10) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `overtime`
--

INSERT INTO `overtime` (`id_overtime`, `jam_mulai`, `jam_selesai`, `ket_overtime`, `id_absen`, `status`, `tanggal`, `id_user`, `created_at`, `updated_at`) VALUES
(1, '19:00:00', '23:00:00', 'Bug Fixing', 1, 'approved', '2020-11-25', 32, '2020-11-09 18:39:08', NULL),
(2, '20:00:00', '23:00:00', 'Bug Fixing', NULL, 'rejected', '2020-11-26', 32, '2020-11-26 14:25:23', '2020-11-26 14:25:23'),
(3, '20:00:00', '23:00:00', 'Bug Fixing', NULL, 'approved', '2020-11-28', 41, '2020-11-26 21:21:47', '2020-11-26 21:21:47'),
(4, '20:00:00', '23:00:00', 'Bug Fixing', NULL, 'approved', '2020-11-28', 41, '2020-11-26 21:22:49', '2020-11-26 21:22:49'),
(5, '07:00:43', '01:00:43', 'Begadank', NULL, 'pending', '2018-11-29', 32, '2020-11-26 21:23:59', '2020-11-26 21:23:59'),
(6, '08:00:44', '11:30:44', 'Debugging', NULL, 'pending', '2020-11-30', 32, '2020-11-26 21:38:40', '2020-11-26 21:38:40'),
(7, '08:00:56', '12:30:56', 'ngerjain projek', NULL, 'pending', '2020-11-29', 32, '2020-11-27 16:25:45', '2020-11-27 16:25:45'),
(8, '08:00:57', '12:00:57', 'Adding new feature', NULL, 'approved', '2020-11-29', 41, '2020-11-28 15:09:55', '2020-11-28 15:09:55'),
(9, '08:00:39', '11:40:39', 'adding new menu', NULL, 'approved', '2020-12-01', 41, '2020-11-28 15:37:16', '2020-11-28 15:37:16'),
(10, '09:00:58', '12:00:58', 'adding new features', NULL, 'rejected', '2020-12-12', 41, '2020-11-28 15:57:44', '2020-11-28 15:57:44'),
(11, '09:00:20', '12:00:20', 'Layouting', NULL, 'approved', '2020-11-29', 32, '2020-11-28 18:11:31', '2020-11-28 18:11:31'),
(12, '12:00:51', '06:00:51', 'nginep', NULL, 'approved', '2020-11-30', 41, '2020-11-28 20:26:26', '2020-11-28 20:26:26');

-- --------------------------------------------------------

--
-- Table structure for table `qrcode`
--

CREATE TABLE `qrcode` (
  `id_qrcode` int(10) NOT NULL,
  `png` text NOT NULL,
  `svg` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `qrcode`
--

INSERT INTO `qrcode` (`id_qrcode`, `png`, `svg`) VALUES
(1, '5394901298a4e6116c3c8fe2644d235b.png', '5394901298a4e6116c3c8fe2644d235b.svg');

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
  `kota` text NOT NULL,
  `provinsi` text NOT NULL,
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

INSERT INTO `user` (`id_user`, `nip`, `nama`, `email`, `password`, `api_token`, `reset_password_token`, `reset_password_expires`, `jenis_kelamin`, `alamat`, `kota`, `provinsi`, `no_telp`, `status`, `foto`, `id_akses`, `id_department`, `created_at`, `updated_at`) VALUES
(32, '200310032021061456', 'Marino Imola', 'marinoimola@gmail.com', '$2y$10$drSkrLMBY9C1hAk8otQCw.rU//O.dP9PKYRMZQo3IpxS0Dp8vyOYy', '6fd52fa8248997d07821e99ec93544564e78760c', 'eyJpdiI6InVCTGFnb1N0Rmt0Z2tCc2gxT01WTkE9PSIsInZhbHVlIjoiQXltKzFNWndvTXVjNkRDV2dURGN0UT09IiwibWFjIjoiZjJmZWJiYzFlZDYzMjZlMDVlYTRjNmE0MzcwMTVhN2FiNGE4NTJjNTU1OTBiZWZlODEyZmY1MzVhY2IyY2M3MiJ9', '2020-11-23 20:43:34', 'laki-laki', 'Jl.Cijahe no.1 rt02/rw01 kel.Curug Mekar kec.Bogor Barat 16113', 'Bogor', 'Jawa Barat', '081284855532', 'Student', 'ino.jpg', 2, 1, '2020-11-03 02:14:48', '2020-11-28 22:28:47'),
(39, '2003090603', 'Rima Lestari', 'lrima989@gmail.com', '$2y$10$fytcNBcfpbC3AO3Ej9W/o.08sIl9Q4zlts6Fso5nwq1fx1OM20L0W', NULL, NULL, NULL, 'perempuan', 'Jln.simpang tiga', 'Bogor', 'Jawa Barat', '089614224096', 'Jomblo', 'lumen-1-logo.png', 2, 1, '2020-11-19 03:45:15', '2020-11-23 12:53:40'),
(40, '12365478909282', 'Pupu Oktavia', 'oktaviapupu@gmail.com', '$2y$10$gacKVZ28SBqo25lo.4DrXOBPkH6.PE1d9hXctTEscZu84dhuHb9pi', '3dfa53c8a0a847d40fd6456563bbd6dddcffb4d1', 'eyJpdiI6IlVvdmNIZzd6U3l5VUJTcHprQ3BVTVE9PSIsInZhbHVlIjoiZkplNzdIWW1nbGVlcSt3aGpVQzZOUT09IiwibWFjIjoiYWU3OTMwYmJhYzdlZWY4NTVkMDI3YTIyZGY1YTBjNzI1MGRjOGI0Zjc1OGQwYzBhMzM0MzgzZjY3YWQ2MThlZCJ9', '2020-11-19 19:43:04', 'perempuan', 'Jln. Cicadas 02 RT/RW 003/002 kecamatan ciampea 116620', 'Bogor', 'Jawa Barat', '08958000000', 'Mau Nikah', '', 3, 3, '2020-11-19 03:46:34', '2020-11-19 12:10:13'),
(41, '12039137131236123', 'Haikal Damar', 'haikaldamar23@gmail.com', '$2y$10$h5uTtKW.bX9j.jBzQBcXpOfKTTPpSY0Kxx.sMFW4XZiBdYKF6SqXm', '017d75c0350b8c550fd8158fc9f857149dbc29e6', NULL, NULL, 'laki-laki', 'BTN Purwasari Regency Blok B no 48 RT/RW 004/006 Desa Purwasari Kec.Cicurug', 'Sukabumi ', 'Jawa Barat', '085722737371', 'laku keras', 'damar.jpg', 2, 1, '2020-11-19 03:50:24', '2020-11-27 14:09:26');

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_checkin`
-- (See below for the actual view)
--
CREATE TABLE `v_checkin` (
`id_absen` int(10)
,`jam_masuk` time
,`tanggal` date
,`id_user` int(10)
,`status` int(1)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_checkout`
-- (See below for the actual view)
--
CREATE TABLE `v_checkout` (
`id_absen` int(10)
,`jam_keluar` time
,`tanggal` date
,`id_user` int(10)
,`status` int(1)
);

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
-- Stand-in structure for view `v_leave`
-- (See below for the actual view)
--
CREATE TABLE `v_leave` (
`id_cuti` int(10)
,`start_day` varchar(2)
,`start_month` varchar(3)
,`end_day` varchar(2)
,`end_month` varchar(3)
,`ket_cuti` text
,`status` enum('pending','approved','rejected')
,`id_user` int(10)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_overtime`
-- (See below for the actual view)
--
CREATE TABLE `v_overtime` (
`id_overtime` int(10)
,`jam_mulai` varchar(10)
,`jam_selesai` varchar(10)
,`ket_overtime` text
,`day` varchar(2)
,`month` varchar(3)
,`status` enum('pending','approved','rejected')
,`id_user` int(10)
);

-- --------------------------------------------------------

--
-- Structure for view `v_checkin`
--
DROP TABLE IF EXISTS `v_checkin`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_checkin`  AS  select `absen`.`id_absen` AS `id_absen`,`absen`.`jam_masuk` AS `jam_masuk`,`absen`.`tanggal` AS `tanggal`,`absen`.`id_user` AS `id_user`,timediff(`absen`.`jam_masuk`,`schedule`.`jam_masuk`) > 0 AS `status` from (`absen` join `schedule`) where `absen`.`tanggal` = curdate() ;

-- --------------------------------------------------------

--
-- Structure for view `v_checkout`
--
DROP TABLE IF EXISTS `v_checkout`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_checkout`  AS  select `absen`.`id_absen` AS `id_absen`,`absen`.`jam_keluar` AS `jam_keluar`,`absen`.`tanggal` AS `tanggal`,`absen`.`id_user` AS `id_user`,timediff(`absen`.`jam_keluar`,`schedule`.`jam_keluar`) < 0 AS `status` from (`absen` join `schedule`) where `absen`.`tanggal` = curdate() and `absen`.`jam_keluar` > 0 ;

-- --------------------------------------------------------

--
-- Structure for view `v_late`
--
DROP TABLE IF EXISTS `v_late`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_late`  AS  select `absen`.`jam_masuk` AS `datang`,`schedule`.`jam_masuk` AS `jadwal`,timediff(`absen`.`jam_masuk`,`schedule`.`jam_masuk`) > 0 AS `cek` from (`absen` join `schedule`) ;

-- --------------------------------------------------------

--
-- Structure for view `v_leave`
--
DROP TABLE IF EXISTS `v_leave`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_leave`  AS  select `cuti`.`id_cuti` AS `id_cuti`,date_format(`cuti`.`tanggal_mulai`,'%d') AS `start_day`,substr(date_format(`cuti`.`tanggal_mulai`,'%M'),1,3) AS `start_month`,date_format(`cuti`.`tanggal_selesai`,'%d') AS `end_day`,substr(date_format(`cuti`.`tanggal_selesai`,'%M'),1,3) AS `end_month`,`cuti`.`ket_cuti` AS `ket_cuti`,`cuti`.`status` AS `status`,`user`.`id_user` AS `id_user` from (`cuti` join `user`) where `user`.`id_user` = `cuti`.`id_user` order by `cuti`.`id_cuti` desc ;

-- --------------------------------------------------------

--
-- Structure for view `v_overtime`
--
DROP TABLE IF EXISTS `v_overtime`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_overtime`  AS  select `overtime`.`id_overtime` AS `id_overtime`,date_format(`overtime`.`jam_mulai`,'%H:%i') AS `jam_mulai`,date_format(`overtime`.`jam_selesai`,'%H:%i') AS `jam_selesai`,`overtime`.`ket_overtime` AS `ket_overtime`,date_format(`overtime`.`tanggal`,'%d') AS `day`,substr(date_format(`overtime`.`tanggal`,'%M'),1,3) AS `month`,`overtime`.`status` AS `status`,`user`.`id_user` AS `id_user` from (`user` join `overtime`) where `user`.`id_user` = `overtime`.`id_user` order by `overtime`.`id_overtime` desc ;

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
-- Indexes for table `cuti`
--
ALTER TABLE `cuti`
  ADD PRIMARY KEY (`id_cuti`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id_department`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`id_location`);

--
-- Indexes for table `overtime`
--
ALTER TABLE `overtime`
  ADD PRIMARY KEY (`id_overtime`);

--
-- Indexes for table `qrcode`
--
ALTER TABLE `qrcode`
  ADD PRIMARY KEY (`id_qrcode`);

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
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `cuti`
--
ALTER TABLE `cuti`
  MODIFY `id_cuti` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id_department` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `overtime`
--
ALTER TABLE `overtime`
  MODIFY `id_overtime` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `qrcode`
--
ALTER TABLE `qrcode`
  MODIFY `id_qrcode` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
