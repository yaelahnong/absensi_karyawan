-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 12, 2020 at 04:26 PM
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
(38, '19:00:00', '22:00:00', 'lemburrrrrrrrrrrrrr', 'rejected', NULL, '2020-12-08', 41, '2020-12-07 19:29:20', '2020-12-07 19:29:20'),
(39, '19:00:00', '22:00:00', 'Lemburrrrrrrrrrrrrrrr', 'rejected', NULL, '2020-12-08', 32, '2020-12-08 11:05:12', '2020-12-08 11:05:12'),
(43, '19:00:00', '20:00:00', 'Lemburrrrrrrrr', 'rejected', NULL, '2020-12-09', 41, '2020-12-08 20:43:36', '2020-12-08 20:43:36'),
(45, '19:00:00', '21:00:00', 'Bug Fixing', 'approved', NULL, '2020-12-11', 50, '2020-12-11 07:22:57', '2020-12-11 07:22:57'),
(60, '19:00:00', '22:00:00', 'bug fixing', 'pending', NULL, '2020-12-12', 32, '2020-12-11 19:26:07', '2020-12-11 19:26:07'),
(61, '19:00:00', '22:00:00', 'Bug Fixing', 'rejected', 'Besok libur', '2020-12-12', 50, '2020-12-12 09:38:39', '2020-12-12 09:38:39');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `overtime`
--
ALTER TABLE `overtime`
  ADD PRIMARY KEY (`id_overtime`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `overtime`
--
ALTER TABLE `overtime`
  MODIFY `id_overtime` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
