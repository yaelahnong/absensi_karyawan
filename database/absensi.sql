-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 13, 2020 at 02:05 PM
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
(5, NULL, '09:24:57', 'izin', '2020-10-29', 32, '', '2020-10-28 23:00:00', '2020-12-11 02:24:57'),
(6, NULL, '09:24:57', 'alpa', '2020-10-29', 39, '', '2020-10-29 00:00:00', '2020-12-11 02:24:57'),
(7, '07:22:00', '19:12:05', '', '2020-10-29', 40, '', '2020-10-28 17:00:00', NULL),
(8, '07:51:09', '19:08:26', '', '2020-10-29', 41, '', '2020-10-28 17:00:00', NULL),
(9, '07:41:30', '19:31:15', '', '2020-10-30', 32, '', '2020-10-29 17:00:00', NULL),
(10, '07:53:26', '11:12:05', '', '2020-10-30', 39, '', '2020-10-29 17:00:00', NULL),
(13, '07:09:00', '14:00:00', '', '2020-12-17', 39, '', NULL, NULL),
(14, '08:08:00', '19:03:00', '', '2020-12-08', 40, '', NULL, NULL),
(15, '09:13:00', '19:03:00', '', '2020-11-08', 41, '', NULL, NULL),
(16, '09:13:00', '11:12:05', '', '2020-11-16', 39, '', NULL, NULL),
(17, '09:13:00', '24:08:00', '', '2020-11-08', 40, '', NULL, NULL),
(20, '08:25:00', '09:24:57', NULL, '2020-11-24', 39, '', '2020-11-23 23:01:22', '2020-12-11 02:24:57'),
(21, '08:25:00', '00:00:00', NULL, '2020-11-24', 40, '', '2020-11-23 23:22:05', '2020-12-11 17:00:00'),
(22, '08:25:00', '00:00:00', NULL, '2020-11-24', 41, '', '2020-11-23 23:23:54', '2020-12-11 17:00:00'),
(23, '08:25:00', '09:24:57', NULL, '2020-11-24', 41, '', '2020-11-23 23:25:16', '2020-12-11 02:24:57'),
(24, '08:25:00', '09:24:57', NULL, '2020-11-24', 41, '', '2020-11-23 23:25:24', '2020-12-11 02:24:57'),
(25, '08:25:00', '09:24:57', NULL, '2020-11-24', 41, '', '2020-11-23 23:29:30', '2020-12-11 02:24:57'),
(26, '07:25:00', '15:00:00', NULL, '2020-12-10', 32, '-6.5646262, 106.7667172', '2020-11-24 00:29:48', '2020-11-24 00:39:17'),
(27, '08:00:00', '15:00:00', NULL, '2020-11-24', 41, '-6.5646262, 106.7667172', '2020-11-24 12:26:29', '2020-11-24 12:26:57'),
(28, '07:25:00', '09:24:57', NULL, '2020-11-24', 41, '-6.5646262, 106.7667172', '2020-11-24 18:26:48', '2020-12-11 02:24:57'),
(29, '07:25:00', '09:24:57', NULL, '2020-11-24', 41, '-6.5646262, 106.7667172', '2020-11-24 20:59:57', '2020-12-11 02:24:57'),
(30, '07:25:00', '09:24:57', NULL, '2020-11-24', 41, '-6.5646262, 106.7667172', '2020-11-24 21:30:20', '2020-12-11 02:24:57'),
(31, '09:42:00', '09:24:57', NULL, '2020-11-25', 32, '-6.5646262, 106.7667172', '2020-11-24 21:39:14', '2020-12-11 02:24:57'),
(32, '07:25:00', '09:24:57', NULL, '2020-11-24', 41, '-6.5646262, 106.7667172', '2020-11-24 21:40:44', '2020-12-11 02:24:57'),
(33, '04:54:46', '09:24:57', NULL, '2020-11-25', 32, '-6.5646262, 106.7667172', '2020-11-24 21:55:09', '2020-12-11 02:24:57'),
(34, '05:01:01', '09:24:57', NULL, '2020-11-25', 32, ', ', '2020-11-24 22:01:22', '2020-12-11 02:24:57'),
(35, '04:07:40', '09:24:57', NULL, '2020-11-25', 32, ', ', '2020-11-25 09:08:02', '2020-12-11 02:24:57'),
(36, '04:26:02', '09:24:57', NULL, '2020-11-25', 32, ', ', '2020-11-25 09:26:28', '2020-12-11 02:24:57'),
(37, '04:32:36', '09:24:57', NULL, '2020-11-25', 32, ', ', '2020-11-25 09:32:57', '2020-12-11 02:24:57'),
(38, '04:36:59', '09:24:57', NULL, '2020-11-25', 32, ', ', '2020-11-25 09:37:42', '2020-12-11 02:24:57'),
(39, '05:23:15', '09:24:57', NULL, '2020-11-25', 32, '-6.5646278, 106.7667145', '2020-11-25 10:23:35', '2020-12-11 02:24:57'),
(40, '05:32:26', '09:24:57', NULL, '2020-11-25', 32, '-6.5646267, 106.7667171', '2020-11-25 10:37:20', '2020-12-11 02:24:57'),
(41, '17:41:00', '09:24:57', NULL, '2020-11-25', 32, '-6.5646252, 106.7667117', '2020-11-25 10:41:29', '2020-12-11 02:24:57'),
(42, '17:54:55', '09:24:57', NULL, '2020-11-25', 32, '-6.5647517, 106.7667489', '2020-11-25 10:55:28', '2020-12-11 02:24:57'),
(43, '18:01:13', '09:24:57', NULL, '2020-11-25', 32, '-6.564626, 106.766713', '2020-11-25 11:03:32', '2020-12-11 02:24:57'),
(44, '18:14:02', '09:24:57', NULL, '2020-11-25', 32, '-6.5646276, 106.7667138', '2020-11-25 11:14:20', '2020-12-11 02:24:57'),
(45, '18:17:04', '09:24:57', NULL, '2020-11-25', 32, '-6.5646264, 106.7667138', '2020-11-25 11:17:21', '2020-12-11 02:24:57'),
(46, '18:21:42', '09:24:57', NULL, '2020-11-25', 32, '-6.5646242, 106.7667148', '2020-11-25 11:22:16', '2020-12-11 02:24:57'),
(47, '18:25:28', '20:05:00', NULL, '2020-11-25', 32, '-6.5646262, 106.7667133', '2020-11-25 11:26:30', '2020-11-25 11:29:58'),
(48, '18:31:43', '09:24:57', NULL, '2020-11-25', 32, '-6.5646238, 106.7667131', '2020-11-25 11:32:06', '2020-12-11 02:24:57'),
(49, '18:34:23', '18:34:23', NULL, '2020-11-25', 32, '-6.5646279, 106.7667159', '2020-11-25 11:34:43', '2020-11-25 11:34:54'),
(50, '20:21:59', '20:21:59', NULL, '2020-11-26', 32, '-6.5647517, 106.7667489', '2020-11-26 13:22:24', '2020-11-26 13:22:32'),
(51, '23:58:16', '23:58:17', NULL, '2020-11-27', 32, '-6.5646247, 106.7667162', '2020-11-27 17:00:17', '2020-11-27 17:00:21'),
(52, '19:11:57', '19:12:10', NULL, '2020-11-29', 32, '-6.5650482, 106.7630886', '2020-11-29 12:11:57', '2020-11-29 12:12:10'),
(54, '16:50:34', '16:50:45', NULL, '2020-11-30', 41, '-6.5646237, 106.7667125', '2020-11-30 09:50:34', '2020-11-30 09:50:45'),
(55, '18:19:29', '18:19:38', NULL, '2020-11-30', 39, '-6.5646284, 106.7667158', '2020-11-30 11:19:29', '2020-11-30 11:19:38'),
(56, '18:20:25', '18:59:59', NULL, '2020-11-30', 40, '-6.5646235, 106.7667118', '2020-11-30 11:20:25', '2020-11-30 11:59:59'),
(57, '20:53:25', '20:53:33', NULL, '2020-11-30', 32, '-6.5646284, 106.7667158', '2020-11-30 13:53:25', '2020-11-30 13:53:33'),
(58, '19:37:52', '19:38:06', NULL, '2020-12-03', 32, '-6.5646285, 106.7667151', '2020-12-03 12:37:52', '2020-12-03 12:38:06'),
(59, '14:55:25', '14:55:31', NULL, '2020-12-09', 32, '-6.5646356, 106.7667236', '2020-12-09 14:55:25', '2020-12-09 14:55:31'),
(60, '08:23:40', '14:58:03', NULL, '2020-12-10', 41, '-6.5646231, 106.7667118', '2020-12-09 14:57:40', '2020-12-09 14:58:03'),
(61, '23:45:40', '00:00:00', NULL, '2020-12-11', 32, '-6.5646284, 106.7667143', '2020-12-11 16:45:40', '2020-12-11 17:00:00'),
(62, '22:34:51', '00:00:00', NULL, '2020-12-12', 32, '-6.5647028, 106.7667855', '2020-12-12 15:34:51', '2020-12-12 17:00:00'),
(63, '16:58:35', '16:58:49', NULL, '2020-12-13', 41, '-6.5646284, 106.7667136', '2020-12-13 09:58:35', '2020-12-13 09:58:49');

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
(20, 'Administrator', 'admin', '$2y$10$atJfVZK/hDkvAwh3Xm31a.op1RRKlsKe6OWvZMjCVoBWvmFGnEK8a', 'IMG_1089.jpg', 0, '2020-11-09 11:10:37', '2020-12-13 13:00:15'),
(21, 'Marino Imola', 'yaelahnong', '$2y$10$E3HaN2qQhmDnrRLAPNKqHudskW70n7mwiVWmBg0oXEzf0GJXV1LKq', 'ino.jpg', 1, '2020-11-09 11:28:38', NULL),
(22, 'Marino Imola', 'inoo0001', '$2y$10$nqGJXUIaxiE9kqlTmE8FXe2fmyYG27NcGPkcPinVkY7Q.WA/nAm1S', '244551.jpg', 2, '2020-12-03 13:56:23', NULL),
(23, 'Marino Imola', 'inoo0002', '$2y$10$.pEuO67HJ.vNIsLoaScEuOalogNZSjP2NrKYY01FWY7WwTVH16Rjq', 'user-1.jpg', 3, '2020-12-03 13:57:02', NULL);

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
  `kategori` enum('izin','sakit') DEFAULT NULL,
  `ket_cuti` text NOT NULL,
  `foto` text DEFAULT NULL,
  `status` enum('pending','approved','rejected') NOT NULL,
  `pesan` text DEFAULT NULL,
  `id_user` int(10) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cuti`
--

INSERT INTO `cuti` (`id_cuti`, `tanggal_mulai`, `tanggal_selesai`, `kategori`, `ket_cuti`, `foto`, `status`, `pesan`, `id_user`, `created_at`, `updated_at`) VALUES
(55, '2021-01-23', '2021-01-24', 'sakit', 'Sick Leave', '5fd48af368f28.png', 'rejected', 'Please send a valid image', 41, '2020-12-12 09:18:43', '2020-12-12 09:18:43'),
(57, '2020-12-20', '2020-12-21', 'sakit', 'Sick Leave', '5fd4900944c05.png', 'rejected', 'Surat keterangan sakit kamu tidak valid', 50, '2020-12-12 09:40:25', '2020-12-12 09:40:25'),
(59, '2020-12-17', '2020-12-18', 'sakit', 'Sick Leave', '5fd492f5e8347.png', 'rejected', 'Please send a valid image', 32, '2020-12-12 09:52:53', '2020-12-12 09:52:53');

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
(1, 'Software Development', '2020-11-09 18:41:57', '2020-12-12 19:18:41'),
(2, 'Digital Marketing', '2020-11-09 18:42:04', NULL),
(3, 'Manage Service Provider', '2020-11-09 18:42:12', '2020-11-19 04:45:01');

-- --------------------------------------------------------

--
-- Table structure for table `hak_akses`
--

CREATE TABLE `hak_akses` (
  `id_hak_akses` int(10) NOT NULL,
  `deskripsi` text NOT NULL,
  `id_akses` int(10) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hak_akses`
--

INSERT INTO `hak_akses` (`id_hak_akses`, `deskripsi`, `id_akses`, `created_at`, `updated_at`) VALUES
(2, 'dashboard', 0, '2020-12-07 17:00:00', NULL),
(12, 'user_list', 0, '2020-12-08 02:25:33', NULL),
(16, 'settings', 0, '2020-12-08 03:16:55', NULL),
(17, 'transaction', 0, '2020-12-08 03:21:11', NULL),
(18, 'master', 0, '2020-12-08 03:21:30', NULL),
(19, 'user_management', 0, '2020-12-07 17:00:00', NULL),
(20, 'user_level', 0, '2020-12-07 17:00:00', NULL),
(23, 'overtime', 0, '2020-12-08 04:04:19', NULL),
(24, 'leave', 0, '2020-12-08 04:04:34', NULL),
(26, 'address', 0, '2020-12-08 04:05:29', NULL),
(27, 'schedule', 0, '2020-12-08 04:05:51', NULL),
(44, 'overtime_reject', 0, '2020-12-08 08:48:44', NULL),
(45, 'overtime_edit', 0, '2020-12-08 09:25:28', NULL),
(47, 'overtime_approve', 0, '2020-12-08 09:45:00', NULL),
(49, 'leave_reject', 0, '2020-12-08 19:20:17', NULL),
(50, 'leave_approve', 0, '2020-12-08 19:26:34', NULL),
(51, 'attendance', 0, '2020-12-08 19:30:54', NULL),
(52, 'schedule_edit', 0, '2020-12-08 19:43:31', NULL),
(57, 'user_description', 0, '2020-12-08 23:57:33', NULL),
(58, 'user_description_add', 0, '2020-12-08 23:57:48', NULL),
(59, 'user_description_edit', 0, '2020-12-08 23:58:10', NULL),
(60, 'user_description_delete', 0, '2020-12-08 23:58:21', NULL),
(63, 'overtime_approve', 3, '2020-12-09 01:20:42', NULL),
(64, 'overtime_edit', 3, '2020-12-09 02:04:53', NULL),
(65, 'overtime_approve', 2, '2020-12-09 02:08:53', NULL),
(66, 'overtime_reject', 2, '2020-12-09 02:09:12', NULL),
(67, 'overtime', 2, '2020-12-09 02:18:22', NULL),
(68, 'dashboard', 2, '2020-12-09 02:18:37', NULL),
(69, 'transaction', 2, '2020-12-09 02:21:39', NULL),
(70, 'overtime', 3, '2020-12-09 02:24:20', NULL),
(71, 'transaction', 3, '2020-12-09 02:24:31', NULL),
(72, 'attendance', 3, '2020-12-09 02:25:26', NULL),
(73, 'leave_reject', 2, '2020-12-09 02:28:10', NULL),
(74, 'leave_approve', 2, '2020-12-09 02:28:47', NULL),
(75, 'leave', 2, '2020-12-09 02:29:15', NULL),
(76, 'attendance', 2, '2020-12-09 02:31:50', NULL),
(77, 'leave', 3, '2020-12-09 02:35:06', NULL),
(78, 'leave_approve', 3, '2020-12-09 02:35:17', NULL),
(86, 'attendance', 1, '2020-12-09 02:40:26', NULL),
(87, 'overtime', 1, '2020-12-09 02:40:40', NULL),
(88, 'transaction', 1, '2020-12-09 02:55:53', NULL),
(89, 'leave', 1, '2020-12-09 02:56:38', NULL),
(90, 'dashboard', 3, '2020-12-09 03:05:06', NULL),
(91, 'leave_reject', 3, '2020-12-09 03:08:19', NULL),
(92, 'employee', 0, '2020-12-09 05:26:59', NULL),
(96, 'dashboard', 1, '2020-12-09 07:40:35', NULL),
(97, 'employee', 1, '2020-12-09 07:40:42', NULL),
(99, 'employee_list', 1, '2020-12-09 07:45:57', NULL),
(100, 'employee_add', 1, '2020-12-09 07:51:29', NULL),
(101, 'employee_edit', 1, '2020-12-09 07:51:36', NULL),
(102, 'employee_delete', 1, '2020-12-09 07:51:46', NULL),
(103, 'employee_list', 0, '2020-12-09 07:56:22', NULL),
(104, 'employee_add', 0, '2020-12-09 07:56:45', NULL),
(105, 'employee_edit', 0, '2020-12-09 07:56:51', NULL),
(106, 'employee_delete', 0, '2020-12-09 07:56:56', NULL),
(110, 'user_add', 0, '2020-12-09 12:21:43', NULL),
(111, 'user_edit', 0, '2020-12-09 12:21:51', NULL),
(112, 'user_delete', 0, '2020-12-09 12:21:56', NULL),
(113, 'department', 0, '2020-12-09 18:30:11', NULL),
(114, 'department_add', 0, '2020-12-09 18:30:16', NULL),
(115, 'department_edit', 0, '2020-12-09 18:30:21', NULL),
(116, 'department_delete', 0, '2020-12-09 18:30:26', NULL),
(117, 'user_management', 1, '2020-12-10 05:03:46', NULL),
(118, 'user_list', 1, '2020-12-10 05:03:56', NULL),
(119, 'user_add', 1, '2020-12-10 05:04:03', NULL),
(120, 'user_edit', 1, '2020-12-10 05:04:09', NULL),
(121, 'user_delete', 1, '2020-12-10 05:04:17', NULL);

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
  `status` enum('pending','approved','rejected') NOT NULL,
  `pesan` text DEFAULT NULL,
  `tanggal` date NOT NULL,
  `id_user` int(10) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `overtime`
--

INSERT INTO `overtime` (`id_overtime`, `jam_mulai`, `jam_selesai`, `ket_overtime`, `status`, `pesan`, `tanggal`, `id_user`, `created_at`, `updated_at`) VALUES
(61, '19:00:00', '22:00:00', 'Bug Fixing', 'rejected', 'Besok libur', '2020-12-12', 50, '2020-12-12 09:38:39', '2020-12-12 09:38:39');

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
(32, '200310032021061456', 'Marino Imola', 'marinoimola@gmail.com', '$2y$10$Hk3tPyRIcM1Z8p90NNIXsOyMD8YSYdjJrAoJgoIeDEodgCd3XIISS', '1a18efc8d1388cd27e4e35be8e68e8728567ea2c', 'eyJpdiI6IlhCcEZMUUQzSjFvb2RFMkZVNWZINUE9PSIsInZhbHVlIjoiQ3FOUUtsZklVUFJvTmxpbThhSE5jUT09IiwibWFjIjoiZTk5Y2EyZmYyYzQzMmQ2YTRkNzUzZjc3YzEyN2FjNTYyZDExNjBhMTE4ZDYzMzUyZmZkODAxN2FjYzIyYjE4ZCJ9', '2020-12-12 23:49:05', 'laki-laki', 'Jl.Cijahe no.1 rt02/rw01 kel.Curug Mekar kec.Bogor Barat 16113', 'Bogor', 'Jawa Barat', '081284855532', 'Student', 'ino-small.jpg', 2, 1, '2020-11-03 02:14:48', '2020-12-13 09:48:25'),
(39, '2003090603', 'Rima Lestari', 'lrima989@gmail.com', '$2y$10$fytcNBcfpbC3AO3Ej9W/o.08sIl9Q4zlts6Fso5nwq1fx1OM20L0W', 'f29e54e46be348a60362c4649d5c6003c578915c', NULL, NULL, 'perempuan', 'Jln.simpang tiga', 'Bogor', 'Jawa Barat', '089614224096', 'Jomblo', 'ola-small.jpg', 2, 1, '2020-11-19 03:45:15', '2020-11-30 11:10:23'),
(40, '12365478909282', 'Pupu Oktavia', 'oktaviapupu@gmail.com', '$2y$10$nIYlB09krRDhRRU7zPTwouX2.99/gX4KlANHaaVPsaIa8F98KJjyy', '30ca92f240287da23b7c15ae630853257a768d88', 'eyJpdiI6InpacS9qazluWmVOVk5neVZ6WDhsM2c9PSIsInZhbHVlIjoibWVkcEY0Lzl4U1VPYkJUczJnV0NUQT09IiwibWFjIjoiOGE0YjEwMjU3MDYxOTQ5ZmRiYTAzZmRmNjFkNDRmOTIyYzAyNTE5YmJlNzMyY2M5ZjUzZDZiZTA5NzMwZDliZCJ9', '2020-11-30 19:04:56', 'perempuan', 'Jln. Cicadas 02 RT/RW 003/002 kecamatan ciampea 116620', 'Bogor', 'Jawa Barat', '08958000000', 'Mau Nikah', 'pupu-small.jpg', 3, 3, '2020-11-19 03:46:34', '2020-12-03 14:40:30'),
(41, '12039137131236123', 'Haikal Damar', 'haikaldamar23@gmail.com', '$2y$10$h5uTtKW.bX9j.jBzQBcXpOfKTTPpSY0Kxx.sMFW4XZiBdYKF6SqXm', 'e71b239d0af8ebfae04abb37abcef34292b0ab8b', NULL, NULL, 'laki-laki', 'BTN Purwasari Regency Blok B no 48 RT/RW 004/006 Desa Purwasari Kec.Cicurug', 'Sukabumi ', 'Jawa Barat', '085722737371', 'Karyawan ', '117385958_319405572441325_6641847657301553257_n-small.jpg', 2, 1, '2020-11-19 03:50:24', '2020-12-13 10:15:35'),
(50, '200108012021061001', 'Adam Reyhan Mahessa Tabary', 'adam.reyhan.mt@gmail.com', '$2y$10$IpAJPu4gq0OZflwxWkDv5O7LNvyrbhW6s7xL/AjA7oZT.3yW/MjZK', '6114ea643bb799bdfcfa96954958a1ed0ae1a353', NULL, NULL, 'laki-laki', 'Cibungbulang', 'Bogor', 'Jawa Barat', '087882286867', 'Jomblo', '244551.jpg', 4, 2, '2020-12-11 17:04:00', '2020-12-13 12:58:31');

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
-- Indexes for table `hak_akses`
--
ALTER TABLE `hak_akses`
  ADD PRIMARY KEY (`id_hak_akses`);

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
  MODIFY `id_admin` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `cuti`
--
ALTER TABLE `cuti`
  MODIFY `id_cuti` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id_department` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `hak_akses`
--
ALTER TABLE `hak_akses`
  MODIFY `id_hak_akses` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;

--
-- AUTO_INCREMENT for table `overtime`
--
ALTER TABLE `overtime`
  MODIFY `id_overtime` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

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
  MODIFY `id_user` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
