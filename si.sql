-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 23, 2021 at 02:37 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `si`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(10) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `nama`) VALUES
(1, 'admin', '123', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_sampah`
--

CREATE TABLE `jenis_sampah` (
  `id_jenis` int(11) NOT NULL,
  `nama_jenis` varchar(20) NOT NULL,
  `id_kategori` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jenis_sampah`
--

INSERT INTO `jenis_sampah` (`id_jenis`, `nama_jenis`, `id_kategori`) VALUES
(1, 'Daun', 1),
(2, 'Plastik', 2);

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Organik'),
(2, 'Anorganik');

-- --------------------------------------------------------

--
-- Table structure for table `lokasi`
--

CREATE TABLE `lokasi` (
  `id_lokasi` int(11) NOT NULL,
  `nama_lokasi` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lokasi`
--

INSERT INTO `lokasi` (`id_lokasi`, `nama_lokasi`) VALUES
(1, 'Rektorat'),
(3, 'Gedung A');

-- --------------------------------------------------------

--
-- Table structure for table `penyimpanan`
--

CREATE TABLE `penyimpanan` (
  `id_penyimpanan` int(10) NOT NULL,
  `id_jenis` int(10) NOT NULL,
  `jumlah_simpan` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `setor_sampah`
--

CREATE TABLE `setor_sampah` (
  `id_setor` int(10) NOT NULL,
  `tgl_setor` date NOT NULL,
  `id_jenis` int(10) NOT NULL,
  `berat_hasil` int(10) NOT NULL,
  `id_lokasi` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `setor_sampah`
--

INSERT INTO `setor_sampah` (`id_setor`, `tgl_setor`, `id_jenis`, `berat_hasil`, `id_lokasi`) VALUES
(15, '2020-12-05', 1, 5, 1),
(19, '2020-12-09', 1, 2, 1),
(21, '2020-12-09', 2, 2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tempat_penghasil`
--

CREATE TABLE `tempat_penghasil` (
  `id_penghasil` int(11) NOT NULL,
  `id_lokasi` int(11) NOT NULL,
  `id_jenis` int(11) NOT NULL,
  `jumlah_sampah` int(11) NOT NULL,
  `bulan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tempat_penghasil`
--

INSERT INTO `tempat_penghasil` (`id_penghasil`, `id_lokasi`, `id_jenis`, `jumlah_sampah`, `bulan`) VALUES
(1, 1, 1, 7, 12),
(3, 3, 2, 2, 12);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jenis_sampah`
--
ALTER TABLE `jenis_sampah`
  ADD PRIMARY KEY (`id_jenis`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `lokasi`
--
ALTER TABLE `lokasi`
  ADD PRIMARY KEY (`id_lokasi`);

--
-- Indexes for table `penyimpanan`
--
ALTER TABLE `penyimpanan`
  ADD PRIMARY KEY (`id_penyimpanan`),
  ADD KEY `id_jenis` (`id_jenis`);

--
-- Indexes for table `setor_sampah`
--
ALTER TABLE `setor_sampah`
  ADD PRIMARY KEY (`id_setor`),
  ADD KEY `id_jenis` (`id_jenis`),
  ADD KEY `id_lokasi` (`id_lokasi`);

--
-- Indexes for table `tempat_penghasil`
--
ALTER TABLE `tempat_penghasil`
  ADD PRIMARY KEY (`id_penghasil`),
  ADD KEY `id_lokasi` (`id_lokasi`),
  ADD KEY `id_kategori` (`id_jenis`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `jenis_sampah`
--
ALTER TABLE `jenis_sampah`
  MODIFY `id_jenis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `lokasi`
--
ALTER TABLE `lokasi`
  MODIFY `id_lokasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `penyimpanan`
--
ALTER TABLE `penyimpanan`
  MODIFY `id_penyimpanan` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `setor_sampah`
--
ALTER TABLE `setor_sampah`
  MODIFY `id_setor` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tempat_penghasil`
--
ALTER TABLE `tempat_penghasil`
  MODIFY `id_penghasil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `jenis_sampah`
--
ALTER TABLE `jenis_sampah`
  ADD CONSTRAINT `jenis_sampah_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`);

--
-- Constraints for table `penyimpanan`
--
ALTER TABLE `penyimpanan`
  ADD CONSTRAINT `penyimpanan_ibfk_1` FOREIGN KEY (`id_jenis`) REFERENCES `jenis_sampah` (`id_jenis`);

--
-- Constraints for table `setor_sampah`
--
ALTER TABLE `setor_sampah`
  ADD CONSTRAINT `setor_sampah_ibfk_1` FOREIGN KEY (`id_jenis`) REFERENCES `jenis_sampah` (`id_jenis`),
  ADD CONSTRAINT `setor_sampah_ibfk_2` FOREIGN KEY (`id_lokasi`) REFERENCES `lokasi` (`id_lokasi`);

--
-- Constraints for table `tempat_penghasil`
--
ALTER TABLE `tempat_penghasil`
  ADD CONSTRAINT `tempat_penghasil_ibfk_1` FOREIGN KEY (`id_jenis`) REFERENCES `jenis_sampah` (`id_jenis`),
  ADD CONSTRAINT `tempat_penghasil_ibfk_2` FOREIGN KEY (`id_lokasi`) REFERENCES `lokasi` (`id_lokasi`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
