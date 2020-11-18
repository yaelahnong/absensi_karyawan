-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 29, 2020 at 01:18 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

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
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `absen`
--

INSERT INTO `absen` (`id_absen`, `tanggal`) VALUES
(1, '2020-10-28');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(10) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `photo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `photo`) VALUES
(4, 'admin', '$2y$10$niVNX94hzD0sS2KwF.HrTuvFG7/JIA3PYoOmDnu32HGIhSzfg2rgC', 'user-1.jpg'),
(10, 'yaelahnong', '$2y$10$yJ6F.Hp3M13LnjeVIscFr.fEYd3xPOqbxgh1hMRQ2ojymxBvZL/Tq', 'ino.jpg'),
(11, 'olaola', '$2y$10$d0Mat5.JnFSyX.APv/azz.QLVMe7KV/rkJVs7HTOudXA.47JsxSpm', 'IMG_1089.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `akses`
--

CREATE TABLE `akses` (
  `id_akses` int(10) NOT NULL,
  `ket_akses` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `akses`
--

INSERT INTO `akses` (`id_akses`, `ket_akses`) VALUES
(0, 'Super Admin'),
(1, 'Admin'),
(2, 'User');

-- --------------------------------------------------------

--
-- Table structure for table `detailabsen`
--

CREATE TABLE `detailabsen` (
  `id_detail` int(10) NOT NULL,
  `jam_masuk` time NOT NULL,
  `jam_keluar` time NOT NULL,
  `keterangan` text NOT NULL,
  `id_user` int(10) NOT NULL,
  `id_absen` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detailabsen`
--

INSERT INTO `detailabsen` (`id_detail`, `jam_masuk`, `jam_keluar`, `keterangan`, `id_user`, `id_absen`) VALUES
(1, '08:24:09', '18:21:42', '', 27, 1);

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `id_jabatan` int(10) NOT NULL,
  `jabatan` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`id_jabatan`, `jabatan`) VALUES
(1, 'Employee'),
(2, 'Project Manager'),
(3, 'Lead Department');

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `id_schedule` int(10) NOT NULL,
  `jam_masuk` time NOT NULL,
  `jam_keluar` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `jenis_kelamin` enum('laki-laki','perempuan') NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(20) NOT NULL,
  `status` text NOT NULL,
  `tanggal_masuk` date NOT NULL,
  `id_akses` int(10) NOT NULL,
  `id_jabatan` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nip`, `nama`, `email`, `password`, `jenis_kelamin`, `alamat`, `no_telp`, `status`, `tanggal_masuk`, `id_akses`, `id_jabatan`) VALUES
(27, '200310032021061001', 'Marino Imola', 'marinoimola@gmail.com', '$2y$10$.mrl7EDGINkIncRHMVqKi.Znk59Ybr/LBG8YrO/Kkl47ikAyQYuMG', 'laki-laki', 'Jl.Cijahe no.1 rt02/rw01 kel.Curug Mekar kec.Bogor Barat Bogor 16113 Jawa Barat', '081284855532', 'Pelajar', '2020-10-20', 2, 3),
(28, '20030903', 'Rima Lestari', 'lrima98@gmail.com', '$2y$10$MBawtmx2NBgQeVyjwLN7L.zs1gzONxciYFQaBhhDZL5MhqOpXJJDi', 'perempuan', 'jalan simpang tiga dramaga', '089614224096', 'pelajar', '2019-01-09', 2, 2),
(29, '200306102021061001', 'Haikal Damar', 'haikaldamar@localhost.com', '$2y$10$Cv72Vyhsta3rej.lN2o1huo8kXgRps8raRdb6BF1mTu7irul7SEDm', 'laki-laki', 'Cicurug', '08122273123', 'Pelajar', '2020-10-20', 2, 1),
(31, '200302012021062001', 'Pupu Oktavia', 'pupuoctavia@localhost.com', '$2y$10$qeE7uG6ZGtsr5ruMXZlOt.nTVZXL85.DZiph.r.JGO.u0tSMiC7yu', 'laki-laki', 'Rumahku istanaku', '082312421412', 'Pelajar', '2020-10-20', 2, 1);

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
-- Indexes for table `detailabsen`
--
ALTER TABLE `detailabsen`
  ADD PRIMARY KEY (`id_detail`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

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
  MODIFY `id_absen` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `detailabsen`
--
ALTER TABLE `detailabsen`
  MODIFY `id_detail` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `id_schedule` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
