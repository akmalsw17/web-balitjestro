-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 26, 2018 at 10:57 AM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_bibitjeruk`
--

-- --------------------------------------------------------

--
-- Table structure for table `bibit`
--

CREATE TABLE `bibit` (
  `nomer` int(255) NOT NULL,
  `kode_blok` int(255) NOT NULL,
  `jumlah` int(50) NOT NULL,
  `tanggal` date NOT NULL,
  `fase` varchar(225) NOT NULL,
  `varietas` varchar(225) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `data_individu`
--

CREATE TABLE `data_individu` (
  `idgen` int(11) NOT NULL,
  `idpegawai` int(11) NOT NULL,
  `id_jam` int(11) NOT NULL,
  `id_hari` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_individu`
--

INSERT INTO `data_individu` (`idgen`, `idpegawai`, `id_jam`, `id_hari`) VALUES
(1, 1, 7, 6),
(1, 2, 3, 2),
(1, 3, 5, 1),
(1, 4, 5, 4),
(1, 5, 8, 5),
(1, 6, 4, 4),
(1, 7, 3, 4),
(1, 8, 7, 4),
(1, 9, 1, 4),
(1, 10, 7, 3),
(2, 1, 2, 1),
(2, 2, 5, 2),
(2, 3, 5, 1),
(2, 4, 7, 5),
(2, 5, 2, 5),
(2, 6, 6, 1),
(2, 7, 6, 5),
(2, 8, 4, 2),
(2, 9, 1, 6),
(2, 10, 4, 3),
(3, 1, 8, 5),
(3, 2, 6, 5),
(3, 3, 7, 6),
(3, 4, 8, 6),
(3, 5, 5, 4),
(3, 6, 8, 2),
(3, 7, 1, 5),
(3, 8, 3, 3),
(3, 9, 3, 6),
(3, 10, 2, 1),
(4, 1, 2, 1),
(4, 2, 5, 2),
(4, 3, 5, 1),
(4, 4, 7, 5),
(4, 5, 2, 5),
(4, 6, 6, 1),
(4, 7, 7, 6),
(4, 8, 7, 5),
(4, 9, 3, 3),
(4, 10, 7, 3);

-- --------------------------------------------------------

--
-- Table structure for table `fasebibit`
--

CREATE TABLE `fasebibit` (
  `kode_blok` int(11) NOT NULL,
  `fase1` date NOT NULL,
  `fase2` date NOT NULL,
  `fase3` date NOT NULL,
  `fase4` date NOT NULL,
  `fase5` date NOT NULL,
  `fase6` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `fitness`
--

CREATE TABLE `fitness` (
  `nilai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fitness`
--

INSERT INTO `fitness` (`nilai`) VALUES
(1000),
(1000),
(1000),
(1000),
(1000),
(1000),
(1000),
(1000),
(1000),
(24),
(24),
(24),
(1000),
(1000),
(1000),
(1000),
(1000),
(24),
(24),
(24),
(1000),
(1000),
(24),
(24),
(1000),
(1000),
(24),
(24),
(1000),
(1000),
(1000),
(1000),
(1000),
(1000),
(1000),
(24);

-- --------------------------------------------------------

--
-- Table structure for table `hari`
--

CREATE TABLE `hari` (
  `id_hari` int(11) NOT NULL,
  `nama_hari` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hari`
--

INSERT INTO `hari` (`id_hari`, `nama_hari`) VALUES
(1, 'Senin'),
(2, 'Selasa'),
(3, 'Rabu'),
(4, 'Kamis'),
(5, 'Jumat'),
(6, 'Sabtu');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `id_jadwal` int(11) NOT NULL,
  `id_karyawan` int(11) NOT NULL,
  `id_hari` int(11) NOT NULL,
  `id_shift` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_karyawan`
--

CREATE TABLE `jadwal_karyawan` (
  `id_jadwal_karyawan` int(11) NOT NULL,
  `id_karyawan` int(11) NOT NULL,
  `id_hari` int(11) NOT NULL,
  `id_jam` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jadwal_karyawan`
--

INSERT INTO `jadwal_karyawan` (`id_jadwal_karyawan`, `id_karyawan`, `id_hari`, `id_jam`) VALUES
(1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_pegawai`
--

CREATE TABLE `jadwal_pegawai` (
  `id_jadwal_karyawan` int(11) NOT NULL,
  `id_karyawan` int(11) NOT NULL,
  `id_hari` int(11) NOT NULL,
  `id_jam` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jadwal_pegawai`
--

INSERT INTO `jadwal_pegawai` (`id_jadwal_karyawan`, `id_karyawan`, `id_hari`, `id_jam`) VALUES
(1, 0, 0, 1),
(2, 0, 0, 2),
(3, 2, 1, 1),
(4, 2, 1, 2),
(5, 1, 2, 1),
(6, 1, 2, 2),
(7, 1, 2, 3),
(8, 1, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `jam`
--

CREATE TABLE `jam` (
  `id_jam` int(11) NOT NULL,
  `range_jam` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jam`
--

INSERT INTO `jam` (`id_jam`, `range_jam`) VALUES
(1, '07.30-08.30'),
(2, '08.30-09.30'),
(3, '09.30-10.30'),
(4, '10.30-11.30'),
(5, '11.30-12.30'),
(6, '12.30-13.30'),
(7, '13.30-14.30'),
(8, '14.30-15.30');

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `id_karyawan` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`id_karyawan`, `nama`) VALUES
(1, 'Lutfi'),
(2, 'Sogiono'),
(3, 'Nadi'),
(4, 'Wawan'),
(5, 'Purwantono'),
(6, 'Sugiono Ss'),
(7, 'Imam'),
(8, 'Wiwik'),
(9, 'Rukemi'),
(10, 'Sutiani');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `jenis` varchar(255) NOT NULL,
  `user` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(225) NOT NULL,
  `jenis_kelamin` varchar(225) NOT NULL,
  `tanggal_lahir` varchar(225) NOT NULL,
  `jabatan` varchar(225) NOT NULL,
  `email` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bibit`
--
ALTER TABLE `bibit`
  ADD PRIMARY KEY (`nomer`);

--
-- Indexes for table `hari`
--
ALTER TABLE `hari`
  ADD PRIMARY KEY (`id_hari`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id_jadwal`);

--
-- Indexes for table `jadwal_karyawan`
--
ALTER TABLE `jadwal_karyawan`
  ADD PRIMARY KEY (`id_jadwal_karyawan`);

--
-- Indexes for table `jadwal_pegawai`
--
ALTER TABLE `jadwal_pegawai`
  ADD PRIMARY KEY (`id_jadwal_karyawan`);

--
-- Indexes for table `jam`
--
ALTER TABLE `jam`
  ADD PRIMARY KEY (`id_jam`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id_karyawan`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bibit`
--
ALTER TABLE `bibit`
  MODIFY `nomer` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hari`
--
ALTER TABLE `hari`
  MODIFY `id_hari` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jadwal_karyawan`
--
ALTER TABLE `jadwal_karyawan`
  MODIFY `id_jadwal_karyawan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `jadwal_pegawai`
--
ALTER TABLE `jadwal_pegawai`
  MODIFY `id_jadwal_karyawan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `jam`
--
ALTER TABLE `jam`
  MODIFY `id_jam` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id_karyawan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
