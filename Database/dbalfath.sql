-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 21, 2020 at 02:30 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.3.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbalfath`
--

-- --------------------------------------------------------

--
-- Table structure for table `asetkendaraan`
--

CREATE TABLE `asetkendaraan` (
  `IdKendaraan` smallint(6) NOT NULL,
  `NamaKendaraan` varchar(20) DEFAULT NULL,
  `JenisKendaraan` varchar(15) DEFAULT NULL,
  `NomorPolisi` varchar(13) DEFAULT NULL,
  `TanggalBeli` date DEFAULT NULL,
  `JumlahKursi` smallint(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `barangkirim`
--

CREATE TABLE `barangkirim` (
  `IdBarang` int(11) NOT NULL,
  `NamaPenerima` varchar(25) DEFAULT NULL,
  `AlamatPenerima` varchar(50) DEFAULT NULL,
  `KotaPenerima` varchar(20) DEFAULT NULL,
  `PropinsiPenerima` varchar(20) DEFAULT NULL,
  `KodePosPenerima` char(5) DEFAULT NULL,
  `KelurahanPenerima` varchar(15) DEFAULT NULL,
  `KecamatanPenerima` varchar(15) DEFAULT NULL,
  `KontakPenerima` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `datapelanggantravel`
--

CREATE TABLE `datapelanggantravel` (
  `IdP` int(11) NOT NULL,
  `IdTrantravel` int(11) NOT NULL,
  `HargaTiket` int(11) DEFAULT NULL,
  `KotaTujuanPelanggan` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `IdK` int(11) NOT NULL,
  `Id` int(11) DEFAULT NULL,
  `NamaK` varchar(25) DEFAULT NULL,
  `KotaK` varchar(20) DEFAULT NULL,
  `PropinsiK` varchar(25) DEFAULT NULL,
  `TglLahirK` date DEFAULT NULL,
  `KotaLahirK` varchar(20) DEFAULT NULL,
  `NoTelpK` varchar(20) DEFAULT NULL,
  `StatusK` tinyint(4) DEFAULT NULL,
  `AlamatK` varchar(50) DEFAULT NULL,
  `EmailK` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`IdK`, `Id`, `NamaK`, `KotaK`, `PropinsiK`, `TglLahirK`, `KotaLahirK`, `NoTelpK`, `StatusK`, `AlamatK`, `EmailK`) VALUES
(1, 1, 'Alfian Danny Armanta', 'Surabaya', 'Jawa Timur', '1995-05-13', 'Surabaya', '085733296961', 1, 'Jl. Kedung Anyar Gang 2 No 42', 'alfiandannyarmanta@hotmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `IdKategori` int(11) NOT NULL,
  `NamaKategori` varchar(30) DEFAULT NULL,
  `StatusKategori` smallint(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`IdKategori`, `NamaKategori`, `StatusKategori`) VALUES
(1, 'Pendidikan', 1),
(2, 'Promo', 2),
(3, 'ini kategori baru tambah 4', 1),
(4, 'ini gaplek', 1),
(5, 'ini kategori baru tambah 4', 1),
(6, 'ini tidak aktif', 2),
(7, 'asdasdasd', 1),
(8, '<?php?>', 1),
(9, 'Lalalalala', 2),
(10, 'coba session', 1),
(11, 'asdasdasd', 1),
(12, 'jajajajaja', 2),
(13, 'naisdnia we', 1),
(14, 'fade in', 1),
(15, 'asdas', 1),
(16, 'asdasdasdqwe', 1),
(17, 'qweqwe', 1),
(18, 'Kategori Baru', 1),
(19, 'huhjbiug', 1),
(20, 'asdasdasd', 1),
(21, 'asdasdasd', 1),
(22, 'Kategori Baru', 1),
(23, '&amp;lt;?php?&amp;gt;', 1);

-- --------------------------------------------------------

--
-- Table structure for table `komentarberita`
--

CREATE TABLE `komentarberita` (
  `IdKomentar` smallint(6) NOT NULL,
  `IdBerita` int(11) DEFAULT NULL,
  `IdP` int(11) DEFAULT NULL,
  `IsiKomentar` varchar(200) DEFAULT NULL,
  `StatusKomentar` smallint(6) DEFAULT NULL,
  `TanggalKomentar` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `kontenberita`
--

CREATE TABLE `kontenberita` (
  `IdBerita` int(11) NOT NULL,
  `IdKategori` int(11) DEFAULT NULL,
  `Id` int(11) DEFAULT NULL,
  `Judul` varchar(30) DEFAULT NULL,
  `Isi` varchar(1500) DEFAULT NULL,
  `Gambar` varchar(60) DEFAULT NULL,
  `TanggalRilis` date DEFAULT NULL,
  `TanggalKadaluarsa` date DEFAULT NULL,
  `StatusBerita` smallint(6) DEFAULT NULL,
  `WaktuRilis` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kontenberita`
--

INSERT INTO `kontenberita` (`IdBerita`, `IdKategori`, `Id`, `Judul`, `Isi`, `Gambar`, `TanggalRilis`, `TanggalKadaluarsa`, `StatusBerita`, `WaktuRilis`) VALUES
(1, NULL, 2, NULL, NULL, NULL, NULL, NULL, 2, NULL),
(2, NULL, 2, NULL, NULL, NULL, NULL, NULL, 2, NULL),
(3, 1, 2, 'coba iput bereita bare', NULL, NULL, '2020-02-12', '2020-02-13', 1, '21:39:00'),
(4, NULL, NULL, 'asdasdasdasd', NULL, NULL, '0000-00-00', '0000-00-00', 1, '11:33:00'),
(5, NULL, NULL, 'JHudul Barhuit', NULL, NULL, '2020-02-15', '2020-02-23', 1, '11:34:00'),
(6, NULL, NULL, 'JHudul Barhuit', NULL, NULL, '2020-02-14', '2020-02-25', 1, '13:05:00'),
(7, NULL, NULL, '<?/s/d/asd', NULL, NULL, '0000-00-00', '0000-00-00', 2, '19:08:00'),
(8, NULL, NULL, '&gt;?&amp;gt;?&amp;gt;?&amp;gt', NULL, NULL, '0000-00-00', '0000-00-00', 2, '19:41:00'),
(9, NULL, NULL, 'JHudul Barhuit', NULL, NULL, '0000-00-00', '0000-00-00', 2, '19:43:00');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `IdP` int(11) NOT NULL,
  `Id` int(11) DEFAULT NULL,
  `NamaP` varchar(25) DEFAULT NULL,
  `AlamatP` varchar(50) DEFAULT NULL,
  `KotaP` varchar(20) DEFAULT NULL,
  `PropinsiP` varchar(25) DEFAULT NULL,
  `TglLahirP` date DEFAULT NULL,
  `KotaLahirP` varchar(20) DEFAULT NULL,
  `NoTelpP` varchar(20) DEFAULT NULL,
  `EmailP` varchar(40) DEFAULT NULL,
  `StatusP` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `roleuser`
--

CREATE TABLE `roleuser` (
  `IdRole` smallint(6) NOT NULL,
  `NamaRole` varchar(20) DEFAULT NULL,
  `Keterangan` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `roleuser`
--

INSERT INTO `roleuser` (`IdRole`, `NamaRole`, `Keterangan`) VALUES
(1, 'Administrator', 'Administrator Web'),
(2, 'Author', 'Author Frontend');

-- --------------------------------------------------------

--
-- Table structure for table `transaksipengiriman`
--

CREATE TABLE `transaksipengiriman` (
  `IdTranpengiriman` int(11) NOT NULL,
  `IdK` int(11) DEFAULT NULL,
  `IdBarang` int(11) DEFAULT NULL,
  `IdP` int(11) DEFAULT NULL,
  `IdTrayek` int(11) DEFAULT NULL,
  `TanggalPengiriman` date DEFAULT NULL,
  `StatusPengiriman` tinyint(4) DEFAULT NULL,
  `NamaBarang` varchar(30) DEFAULT NULL,
  `JenisBarang` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `transaksirental`
--

CREATE TABLE `transaksirental` (
  `IdTranrental` int(11) NOT NULL,
  `IdKendaraan` smallint(6) DEFAULT NULL,
  `IdK` int(11) DEFAULT NULL,
  `IdP` int(11) DEFAULT NULL,
  `RentalBerangkat` datetime DEFAULT NULL,
  `RentalKembali` datetime DEFAULT NULL,
  `RuteTujuan` varchar(70) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `transaksitravel`
--

CREATE TABLE `transaksitravel` (
  `IdTrantravel` int(11) NOT NULL,
  `IdK` int(11) DEFAULT NULL,
  `IdKendaraan` smallint(6) DEFAULT NULL,
  `IdTrayek` int(11) DEFAULT NULL,
  `JumlahPenumpang` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `trayek`
--

CREATE TABLE `trayek` (
  `IdTrayek` int(11) NOT NULL,
  `KotaTujuan` varchar(20) DEFAULT NULL,
  `KotaAsal` varchar(20) DEFAULT NULL,
  `DetilTrayek` varchar(70) DEFAULT NULL,
  `JadwalBerangkat` datetime DEFAULT NULL,
  `JadwalTiba` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `Id` int(11) NOT NULL,
  `IdRole` smallint(6) DEFAULT NULL,
  `Username` varchar(30) DEFAULT NULL,
  `Password` varchar(30) DEFAULT NULL,
  `TanggalDaftar` date DEFAULT NULL,
  `StatusUser` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`Id`, `IdRole`, `Username`, `Password`, `TanggalDaftar`, `StatusUser`) VALUES
(1, 1, 'Admin', 'Admin', '2020-02-01', 1),
(2, 2, 'Author', 'Author', '2020-02-02', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `asetkendaraan`
--
ALTER TABLE `asetkendaraan`
  ADD PRIMARY KEY (`IdKendaraan`);

--
-- Indexes for table `barangkirim`
--
ALTER TABLE `barangkirim`
  ADD PRIMARY KEY (`IdBarang`);

--
-- Indexes for table `datapelanggantravel`
--
ALTER TABLE `datapelanggantravel`
  ADD PRIMARY KEY (`IdTrantravel`),
  ADD KEY `FK_Relationship7` (`IdP`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`IdK`),
  ADD KEY `FK_Relationship2` (`Id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`IdKategori`);

--
-- Indexes for table `komentarberita`
--
ALTER TABLE `komentarberita`
  ADD PRIMARY KEY (`IdKomentar`),
  ADD KEY `FK_Relationship18` (`IdBerita`),
  ADD KEY `FK_Relationship19` (`IdP`);

--
-- Indexes for table `kontenberita`
--
ALTER TABLE `kontenberita`
  ADD PRIMARY KEY (`IdBerita`),
  ADD KEY `FK_Relationship4` (`IdKategori`),
  ADD KEY `FK_Relationship5` (`Id`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`IdP`),
  ADD KEY `FK_Relationship3` (`Id`);

--
-- Indexes for table `roleuser`
--
ALTER TABLE `roleuser`
  ADD PRIMARY KEY (`IdRole`);

--
-- Indexes for table `transaksipengiriman`
--
ALTER TABLE `transaksipengiriman`
  ADD PRIMARY KEY (`IdTranpengiriman`),
  ADD KEY `FK_Relationship11` (`IdBarang`),
  ADD KEY `FK_Relationship12` (`IdTrayek`),
  ADD KEY `FK_Relationship13` (`IdP`),
  ADD KEY `FK_Relationship14` (`IdK`);

--
-- Indexes for table `transaksirental`
--
ALTER TABLE `transaksirental`
  ADD PRIMARY KEY (`IdTranrental`),
  ADD KEY `FK_Relationship15` (`IdKendaraan`),
  ADD KEY `FK_Relationship16` (`IdK`),
  ADD KEY `FK_Relationship17` (`IdP`);

--
-- Indexes for table `transaksitravel`
--
ALTER TABLE `transaksitravel`
  ADD PRIMARY KEY (`IdTrantravel`),
  ADD KEY `FK_Relationship10` (`IdKendaraan`),
  ADD KEY `FK_Relationship6` (`IdK`),
  ADD KEY `FK_Relationship9` (`IdTrayek`);

--
-- Indexes for table `trayek`
--
ALTER TABLE `trayek`
  ADD PRIMARY KEY (`IdTrayek`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `FK_Relationship1` (`IdRole`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `datapelanggantravel`
--
ALTER TABLE `datapelanggantravel`
  ADD CONSTRAINT `FK_Relationship7` FOREIGN KEY (`IdP`) REFERENCES `pelanggan` (`IdP`),
  ADD CONSTRAINT `FK_Relationship8` FOREIGN KEY (`IdTrantravel`) REFERENCES `transaksitravel` (`IdTrantravel`);

--
-- Constraints for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD CONSTRAINT `FK_Relationship2` FOREIGN KEY (`Id`) REFERENCES `user` (`Id`);

--
-- Constraints for table `komentarberita`
--
ALTER TABLE `komentarberita`
  ADD CONSTRAINT `FK_Relationship18` FOREIGN KEY (`IdBerita`) REFERENCES `kontenberita` (`IdBerita`),
  ADD CONSTRAINT `FK_Relationship19` FOREIGN KEY (`IdP`) REFERENCES `pelanggan` (`IdP`);

--
-- Constraints for table `kontenberita`
--
ALTER TABLE `kontenberita`
  ADD CONSTRAINT `FK_Relationship4` FOREIGN KEY (`IdKategori`) REFERENCES `kategori` (`IdKategori`),
  ADD CONSTRAINT `FK_Relationship5` FOREIGN KEY (`Id`) REFERENCES `user` (`Id`);

--
-- Constraints for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD CONSTRAINT `FK_Relationship3` FOREIGN KEY (`Id`) REFERENCES `user` (`Id`);

--
-- Constraints for table `transaksipengiriman`
--
ALTER TABLE `transaksipengiriman`
  ADD CONSTRAINT `FK_Relationship11` FOREIGN KEY (`IdBarang`) REFERENCES `barangkirim` (`IdBarang`),
  ADD CONSTRAINT `FK_Relationship12` FOREIGN KEY (`IdTrayek`) REFERENCES `trayek` (`IdTrayek`),
  ADD CONSTRAINT `FK_Relationship13` FOREIGN KEY (`IdP`) REFERENCES `pelanggan` (`IdP`),
  ADD CONSTRAINT `FK_Relationship14` FOREIGN KEY (`IdK`) REFERENCES `karyawan` (`IdK`);

--
-- Constraints for table `transaksirental`
--
ALTER TABLE `transaksirental`
  ADD CONSTRAINT `FK_Relationship15` FOREIGN KEY (`IdKendaraan`) REFERENCES `asetkendaraan` (`IdKendaraan`),
  ADD CONSTRAINT `FK_Relationship16` FOREIGN KEY (`IdK`) REFERENCES `karyawan` (`IdK`),
  ADD CONSTRAINT `FK_Relationship17` FOREIGN KEY (`IdP`) REFERENCES `pelanggan` (`IdP`);

--
-- Constraints for table `transaksitravel`
--
ALTER TABLE `transaksitravel`
  ADD CONSTRAINT `FK_Relationship10` FOREIGN KEY (`IdKendaraan`) REFERENCES `asetkendaraan` (`IdKendaraan`),
  ADD CONSTRAINT `FK_Relationship6` FOREIGN KEY (`IdK`) REFERENCES `karyawan` (`IdK`),
  ADD CONSTRAINT `FK_Relationship9` FOREIGN KEY (`IdTrayek`) REFERENCES `trayek` (`IdTrayek`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `FK_Relationship1` FOREIGN KEY (`IdRole`) REFERENCES `roleuser` (`IdRole`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
