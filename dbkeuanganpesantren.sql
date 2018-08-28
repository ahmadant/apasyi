-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 28, 2018 at 08:50 AM
-- Server version: 5.7.23-0ubuntu0.16.04.1
-- PHP Version: 7.0.30-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbkeuanganpesantren`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `idadmin` int(5) NOT NULL,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(32) DEFAULT NULL,
  `namalengkap` varchar(40) DEFAULT NULL,
  `jk` enum('L','P') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`idadmin`, `username`, `password`, `namalengkap`, `jk`) VALUES
(1, 'admin', 'admin', 'Admin Jaler', 'L'),
(3, 'adminah', 'adminah', 'Adminah Estri', 'P');

-- --------------------------------------------------------

--
-- Table structure for table `kamar`
--

CREATE TABLE `kamar` (
  `kamar` varchar(20) NOT NULL,
  `idustadz` int(5) DEFAULT NULL,
  `kategori` enum('L','P') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kamar`
--

INSERT INTO `kamar` (`kamar`, `idustadz`, `kategori`) VALUES
('A-1', 1, 'L'),
('A-2', 2, 'L'),
('A-3', 3, 'L');

-- --------------------------------------------------------

--
-- Table structure for table `santri`
--

CREATE TABLE `santri` (
  `nis` varchar(10) NOT NULL,
  `namasantri` varchar(50) DEFAULT NULL,
  `jk` enum('L','P') NOT NULL,
  `kamar` varchar(20) DEFAULT NULL,
  `tahunajaran` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `santri`
--

INSERT INTO `santri` (`nis`, `namasantri`, `jk`, `kamar`, `tahunajaran`) VALUES
('2808180001', 'Reva Pahlevi', 'L', 'A-1', '2017/2018'),
('2808180002', 'Agil Bagaskara', 'L', 'A-1', '2017/2018'),
('2808180003', 'Gilang Persada', 'L', 'A-1', '2017/2018'),
('2808180004', 'M. Nur Chandra  ', 'L', 'A-2', '2017/2018'),
('2808180005', 'Roni Deandra', 'L', 'A-2', '2017/2018'),
('2808180006', 'Irham Laksono', 'L', 'A-2', '2017/2018');

-- --------------------------------------------------------

--
-- Table structure for table `semester`
--

CREATE TABLE `semester` (
  `idsmt` int(100) NOT NULL,
  `nis` varchar(10) NOT NULL,
  `jatuhtempo` date NOT NULL,
  `bulan` varchar(20) NOT NULL,
  `nobayar` varchar(10) DEFAULT NULL,
  `tglbayar` date DEFAULT NULL,
  `ket` varchar(50) DEFAULT 'BELUM',
  `idadmin` int(5) DEFAULT NULL,
  `jumlah` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `semester`
--

INSERT INTO `semester` (`idsmt`, `nis`, `jatuhtempo`, `bulan`, `nobayar`, `tglbayar`, `ket`, `idadmin`, `jumlah`) VALUES
(1, '2808180001', '2018-05-01', 'Mei 2018', NULL, NULL, 'BELUM', NULL, 500000),
(2, '2808180001', '2018-11-01', 'November 2018', NULL, NULL, 'BELUM', NULL, 500000),
(3, '2808180002', '2018-05-01', 'Mei 2018', NULL, NULL, 'BELUM', NULL, 500000),
(4, '2808180002', '2018-11-01', 'November 2018', NULL, NULL, 'BELUM', NULL, 500000),
(5, '2808180003', '2018-05-01', 'Mei 2018', NULL, NULL, 'BELUM', NULL, 500000),
(6, '2808180003', '2018-11-01', 'November 2018', NULL, NULL, 'BELUM', NULL, 500000),
(7, '2808180004', '2018-05-01', 'Mei 2018', NULL, NULL, 'BELUM', NULL, 500000),
(8, '2808180004', '2018-11-01', 'November 2018', NULL, NULL, 'BELUM', NULL, 500000),
(9, '2808180005', '2018-05-01', 'Mei 2018', NULL, NULL, 'BELUM', NULL, 500000),
(10, '2808180005', '2018-11-01', 'November 2018', NULL, NULL, 'BELUM', NULL, 500000),
(11, '2808180006', '2018-05-01', 'Mei 2018', NULL, NULL, 'BELUM', NULL, 500000),
(12, '2808180006', '2018-11-01', 'November 2018', NULL, NULL, 'BELUM', NULL, 500000);

-- --------------------------------------------------------

--
-- Table structure for table `syahriyah`
--

CREATE TABLE `syahriyah` (
  `idsyahriyah` int(100) NOT NULL,
  `nis` varchar(10) NOT NULL,
  `jatuhtempo` date NOT NULL,
  `bulan` varchar(20) NOT NULL,
  `nobayar` varchar(10) DEFAULT NULL,
  `tglbayar` date DEFAULT NULL,
  `ket` varchar(50) NOT NULL DEFAULT 'BELUM',
  `idadmin` int(5) DEFAULT NULL,
  `jumlah` int(20) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `syahriyah`
--

INSERT INTO `syahriyah` (`idsyahriyah`, `nis`, `jatuhtempo`, `bulan`, `nobayar`, `tglbayar`, `ket`, `idadmin`, `jumlah`, `status`) VALUES
(1, '2808180001', '2018-09-28', 'September 2018', NULL, NULL, 'BELUM', NULL, 170000, 0),
(2, '2808180001', '2018-10-28', 'Oktober 2018', NULL, NULL, 'BELUM', NULL, 170000, 0),
(3, '2808180001', '2018-11-28', 'November 2018', NULL, NULL, 'BELUM', NULL, 170000, 0),
(4, '2808180001', '2018-12-28', 'Desember 2018', NULL, NULL, 'BELUM', NULL, 170000, 0),
(5, '2808180001', '2019-01-28', 'Januari 2019', NULL, NULL, 'BELUM', NULL, 170000, 0),
(6, '2808180001', '2019-02-28', 'Februari 2019', NULL, NULL, 'BELUM', NULL, 170000, 0),
(7, '2808180001', '2019-03-28', 'Maret 2019', NULL, NULL, 'BELUM', NULL, 170000, 0),
(8, '2808180001', '2019-04-28', 'April 2019', NULL, NULL, 'BELUM', NULL, 170000, 0),
(9, '2808180001', '2019-05-28', 'Mei 2019', NULL, NULL, 'BELUM', NULL, 170000, 0),
(10, '2808180001', '2019-06-28', 'Juni 2019', NULL, NULL, 'BELUM', NULL, 170000, 0),
(11, '2808180001', '2019-07-28', 'Juli 2019', NULL, NULL, 'BELUM', NULL, 170000, 0),
(12, '2808180001', '2019-08-28', 'Agustus 2019', NULL, NULL, 'BELUM', NULL, 170000, 0),
(13, '2808180002', '2018-09-28', 'September 2018', NULL, NULL, 'BELUM', NULL, 170000, 0),
(14, '2808180002', '2018-10-28', 'Oktober 2018', NULL, NULL, 'BELUM', NULL, 170000, 0),
(15, '2808180002', '2018-11-28', 'November 2018', NULL, NULL, 'BELUM', NULL, 170000, 0),
(16, '2808180002', '2018-12-28', 'Desember 2018', NULL, NULL, 'BELUM', NULL, 170000, 0),
(17, '2808180002', '2019-01-28', 'Januari 2019', NULL, NULL, 'BELUM', NULL, 170000, 0),
(18, '2808180002', '2019-02-28', 'Februari 2019', NULL, NULL, 'BELUM', NULL, 170000, 0),
(19, '2808180002', '2019-03-28', 'Maret 2019', NULL, NULL, 'BELUM', NULL, 170000, 0),
(20, '2808180002', '2019-04-28', 'April 2019', NULL, NULL, 'BELUM', NULL, 170000, 0),
(21, '2808180002', '2019-05-28', 'Mei 2019', NULL, NULL, 'BELUM', NULL, 170000, 0),
(22, '2808180002', '2019-06-28', 'Juni 2019', NULL, NULL, 'BELUM', NULL, 170000, 0),
(23, '2808180002', '2019-07-28', 'Juli 2019', NULL, NULL, 'BELUM', NULL, 170000, 0),
(24, '2808180002', '2019-08-28', 'Agustus 2019', NULL, NULL, 'BELUM', NULL, 170000, 0),
(25, '2808180003', '2018-09-28', 'September 2018', NULL, NULL, 'BELUM', NULL, 170000, 0),
(26, '2808180003', '2018-10-28', 'Oktober 2018', NULL, NULL, 'BELUM', NULL, 170000, 0),
(27, '2808180003', '2018-11-28', 'November 2018', NULL, NULL, 'BELUM', NULL, 170000, 0),
(28, '2808180003', '2018-12-28', 'Desember 2018', NULL, NULL, 'BELUM', NULL, 170000, 0),
(29, '2808180003', '2019-01-28', 'Januari 2019', NULL, NULL, 'BELUM', NULL, 170000, 0),
(30, '2808180003', '2019-02-28', 'Februari 2019', NULL, NULL, 'BELUM', NULL, 170000, 0),
(31, '2808180003', '2019-03-28', 'Maret 2019', NULL, NULL, 'BELUM', NULL, 170000, 0),
(32, '2808180003', '2019-04-28', 'April 2019', NULL, NULL, 'BELUM', NULL, 170000, 0),
(33, '2808180003', '2019-05-28', 'Mei 2019', NULL, NULL, 'BELUM', NULL, 170000, 0),
(34, '2808180003', '2019-06-28', 'Juni 2019', NULL, NULL, 'BELUM', NULL, 170000, 0),
(35, '2808180003', '2019-07-28', 'Juli 2019', NULL, NULL, 'BELUM', NULL, 170000, 0),
(36, '2808180003', '2019-08-28', 'Agustus 2019', NULL, NULL, 'BELUM', NULL, 170000, 0),
(37, '2808180004', '2018-09-28', 'September 2018', NULL, NULL, 'BELUM', NULL, 170000, 0),
(38, '2808180004', '2018-10-28', 'Oktober 2018', NULL, NULL, 'BELUM', NULL, 170000, 0),
(39, '2808180004', '2018-11-28', 'November 2018', NULL, NULL, 'BELUM', NULL, 170000, 0),
(40, '2808180004', '2018-12-28', 'Desember 2018', NULL, NULL, 'BELUM', NULL, 170000, 0),
(41, '2808180004', '2019-01-28', 'Januari 2019', NULL, NULL, 'BELUM', NULL, 170000, 0),
(42, '2808180004', '2019-02-28', 'Februari 2019', NULL, NULL, 'BELUM', NULL, 170000, 0),
(43, '2808180004', '2019-03-28', 'Maret 2019', NULL, NULL, 'BELUM', NULL, 170000, 0),
(44, '2808180004', '2019-04-28', 'April 2019', NULL, NULL, 'BELUM', NULL, 170000, 0),
(45, '2808180004', '2019-05-28', 'Mei 2019', NULL, NULL, 'BELUM', NULL, 170000, 0),
(46, '2808180004', '2019-06-28', 'Juni 2019', NULL, NULL, 'BELUM', NULL, 170000, 0),
(47, '2808180004', '2019-07-28', 'Juli 2019', NULL, NULL, 'BELUM', NULL, 170000, 0),
(48, '2808180004', '2019-08-28', 'Agustus 2019', NULL, NULL, 'BELUM', NULL, 170000, 0),
(49, '2808180005', '2018-09-28', 'September 2018', NULL, NULL, 'BELUM', NULL, 170000, 0),
(50, '2808180005', '2018-10-28', 'Oktober 2018', NULL, NULL, 'BELUM', NULL, 170000, 0),
(51, '2808180005', '2018-11-28', 'November 2018', NULL, NULL, 'BELUM', NULL, 170000, 0),
(52, '2808180005', '2018-12-28', 'Desember 2018', NULL, NULL, 'BELUM', NULL, 170000, 0),
(53, '2808180005', '2019-01-28', 'Januari 2019', NULL, NULL, 'BELUM', NULL, 170000, 0),
(54, '2808180005', '2019-02-28', 'Februari 2019', NULL, NULL, 'BELUM', NULL, 170000, 0),
(55, '2808180005', '2019-03-28', 'Maret 2019', NULL, NULL, 'BELUM', NULL, 170000, 0),
(56, '2808180005', '2019-04-28', 'April 2019', NULL, NULL, 'BELUM', NULL, 170000, 0),
(57, '2808180005', '2019-05-28', 'Mei 2019', NULL, NULL, 'BELUM', NULL, 170000, 0),
(58, '2808180005', '2019-06-28', 'Juni 2019', NULL, NULL, 'BELUM', NULL, 170000, 0),
(59, '2808180005', '2019-07-28', 'Juli 2019', NULL, NULL, 'BELUM', NULL, 170000, 0),
(60, '2808180005', '2019-08-28', 'Agustus 2019', NULL, NULL, 'BELUM', NULL, 170000, 0),
(61, '2808180006', '2018-09-28', 'September 2018', NULL, NULL, 'BELUM', NULL, 170000, 0),
(62, '2808180006', '2018-10-28', 'Oktober 2018', NULL, NULL, 'BELUM', NULL, 170000, 0),
(63, '2808180006', '2018-11-28', 'November 2018', NULL, NULL, 'BELUM', NULL, 170000, 0),
(64, '2808180006', '2018-12-28', 'Desember 2018', NULL, NULL, 'BELUM', NULL, 170000, 0),
(65, '2808180006', '2019-01-28', 'Januari 2019', NULL, NULL, 'BELUM', NULL, 170000, 0),
(66, '2808180006', '2019-02-28', 'Februari 2019', NULL, NULL, 'BELUM', NULL, 170000, 0),
(67, '2808180006', '2019-03-28', 'Maret 2019', NULL, NULL, 'BELUM', NULL, 170000, 0),
(68, '2808180006', '2019-04-28', 'April 2019', NULL, NULL, 'BELUM', NULL, 170000, 0),
(69, '2808180006', '2019-05-28', 'Mei 2019', NULL, NULL, 'BELUM', NULL, 170000, 0),
(70, '2808180006', '2019-06-28', 'Juni 2019', NULL, NULL, 'BELUM', NULL, 170000, 0),
(71, '2808180006', '2019-07-28', 'Juli 2019', NULL, NULL, 'BELUM', NULL, 170000, 0),
(72, '2808180006', '2019-08-28', 'Agustus 2019', NULL, NULL, 'BELUM', NULL, 170000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `ustadz`
--

CREATE TABLE `ustadz` (
  `idustadz` int(5) NOT NULL,
  `namaustadz` varchar(50) DEFAULT NULL,
  `bidang` varchar(20) DEFAULT NULL,
  `jk` enum('L','P') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ustadz`
--

INSERT INTO `ustadz` (`idustadz`, `namaustadz`, `bidang`, `jk`) VALUES
(1, 'rahmad', 'tajwid', 'L'),
(2, 'anto', 'fiqih', 'L'),
(3, 'ahmad', 'tauhid', 'L');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`idadmin`);

--
-- Indexes for table `kamar`
--
ALTER TABLE `kamar`
  ADD PRIMARY KEY (`kamar`);

--
-- Indexes for table `santri`
--
ALTER TABLE `santri`
  ADD PRIMARY KEY (`nis`);

--
-- Indexes for table `semester`
--
ALTER TABLE `semester`
  ADD PRIMARY KEY (`idsmt`),
  ADD KEY `fok_nis` (`nis`);

--
-- Indexes for table `syahriyah`
--
ALTER TABLE `syahriyah`
  ADD PRIMARY KEY (`idsyahriyah`),
  ADD KEY `fk_nis` (`nis`);

--
-- Indexes for table `ustadz`
--
ALTER TABLE `ustadz`
  ADD PRIMARY KEY (`idustadz`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `idadmin` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `semester`
--
ALTER TABLE `semester`
  MODIFY `idsmt` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `syahriyah`
--
ALTER TABLE `syahriyah`
  MODIFY `idsyahriyah` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;
--
-- AUTO_INCREMENT for table `ustadz`
--
ALTER TABLE `ustadz`
  MODIFY `idustadz` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `semester`
--
ALTER TABLE `semester`
  ADD CONSTRAINT `fok_nis` FOREIGN KEY (`nis`) REFERENCES `santri` (`nis`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `syahriyah`
--
ALTER TABLE `syahriyah`
  ADD CONSTRAINT `fk_nis` FOREIGN KEY (`nis`) REFERENCES `santri` (`nis`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
