-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 04, 2020 at 08:53 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spk`
--

-- --------------------------------------------------------

--
-- Table structure for table `alternatif`
--

CREATE TABLE `alternatif` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `alternatif`
--

INSERT INTO `alternatif` (`id`, `nama`) VALUES
(1, 'Xiaomi Blackshark'),
(2, 'Xiaomi Mi'),
(3, 'Xiaomi Mi Lite'),
(5, 'Xiaomi Pocophone'),
(7, 'Xiaomi Redme');

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id`, `nama`) VALUES
(2, 'Xiaomi Blackshark'),
(3, 'Xiaomi Mi'),
(4, 'Xiaomi Mi Lite'),
(5, 'Xiaomi Redme'),
(6, 'Xiaomi Pocophone');

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE `kriteria` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`id`, `nama`) VALUES
(1, 'Kamera'),
(2, 'Harga'),
(3, 'Prosessor'),
(4, 'RAM'),
(5, 'Graphic Card');

-- --------------------------------------------------------

--
-- Table structure for table `nilai_alternatif_k1`
--

CREATE TABLE `nilai_alternatif_k1` (
  `id` int(11) NOT NULL,
  `nilai` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nilai_alternatif_k1`
--

INSERT INTO `nilai_alternatif_k1` (`id`, `nilai`) VALUES
(1, 9),
(2, 9),
(3, 9),
(4, 9),
(5, 9),
(6, 9),
(7, 9),
(8, 9),
(9, 9),
(10, 9);

-- --------------------------------------------------------

--
-- Table structure for table `nilai_alternatif_k2`
--

CREATE TABLE `nilai_alternatif_k2` (
  `id` int(11) NOT NULL,
  `nilai` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nilai_alternatif_k2`
--

INSERT INTO `nilai_alternatif_k2` (`id`, `nilai`) VALUES
(1, 9),
(2, 9),
(3, 9),
(4, 9),
(5, 9),
(6, 9),
(7, 9),
(8, 9),
(9, 9),
(10, 9);

-- --------------------------------------------------------

--
-- Table structure for table `nilai_alternatif_k3`
--

CREATE TABLE `nilai_alternatif_k3` (
  `id` int(11) NOT NULL,
  `nilai` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nilai_alternatif_k3`
--

INSERT INTO `nilai_alternatif_k3` (`id`, `nilai`) VALUES
(1, 9),
(2, 9),
(3, 9),
(4, 9),
(5, 9),
(6, 9),
(7, 9),
(8, 9),
(9, 9),
(10, 9);

-- --------------------------------------------------------

--
-- Table structure for table `nilai_alternatif_k4`
--

CREATE TABLE `nilai_alternatif_k4` (
  `id` int(11) NOT NULL,
  `nilai` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nilai_alternatif_k4`
--

INSERT INTO `nilai_alternatif_k4` (`id`, `nilai`) VALUES
(1, 9),
(2, 9),
(3, 9),
(4, 9),
(5, 9),
(6, 9),
(7, 9),
(8, 9),
(9, 9),
(10, 9);

-- --------------------------------------------------------

--
-- Table structure for table `nilai_alternatif_k5`
--

CREATE TABLE `nilai_alternatif_k5` (
  `id` int(11) NOT NULL,
  `nilai` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nilai_alternatif_k5`
--

INSERT INTO `nilai_alternatif_k5` (`id`, `nilai`) VALUES
(1, 9),
(2, 9),
(3, 9),
(4, 9),
(5, 9),
(6, 9),
(7, 9),
(8, 9),
(9, 9),
(10, 9);

-- --------------------------------------------------------

--
-- Table structure for table `nilai_k1_bobot`
--

CREATE TABLE `nilai_k1_bobot` (
  `id` int(11) NOT NULL,
  `bobot` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nilai_k1_bobot`
--

INSERT INTO `nilai_k1_bobot` (`id`, `bobot`) VALUES
(1, 0.519),
(2, 0.241),
(3, 0.1406),
(4, 0.0744),
(5, 0.0248);

-- --------------------------------------------------------

--
-- Table structure for table `nilai_k2_bobot`
--

CREATE TABLE `nilai_k2_bobot` (
  `id` int(11) NOT NULL,
  `bobot` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nilai_k2_bobot`
--

INSERT INTO `nilai_k2_bobot` (`id`, `bobot`) VALUES
(1, 0.519),
(2, 0.241),
(3, 0.1406),
(4, 0.0744),
(5, 0.0248);

-- --------------------------------------------------------

--
-- Table structure for table `nilai_k3_bobot`
--

CREATE TABLE `nilai_k3_bobot` (
  `id` int(11) NOT NULL,
  `bobot` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nilai_k3_bobot`
--

INSERT INTO `nilai_k3_bobot` (`id`, `bobot`) VALUES
(1, 0.519),
(2, 0.241),
(3, 0.1406),
(4, 0.0744),
(5, 0.0248);

-- --------------------------------------------------------

--
-- Table structure for table `nilai_k4_bobot`
--

CREATE TABLE `nilai_k4_bobot` (
  `id` int(11) NOT NULL,
  `bobot` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nilai_k4_bobot`
--

INSERT INTO `nilai_k4_bobot` (`id`, `bobot`) VALUES
(1, 0.519),
(2, 0.241),
(3, 0.1406),
(4, 0.0744),
(5, 0.0248);

-- --------------------------------------------------------

--
-- Table structure for table `nilai_k5_bobot`
--

CREATE TABLE `nilai_k5_bobot` (
  `id` int(11) NOT NULL,
  `bobot` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nilai_k5_bobot`
--

INSERT INTO `nilai_k5_bobot` (`id`, `bobot`) VALUES
(1, 0.519),
(2, 0.241),
(3, 0.1406),
(4, 0.0744),
(5, 0.0248);

-- --------------------------------------------------------

--
-- Table structure for table `nilai_kriteria`
--

CREATE TABLE `nilai_kriteria` (
  `id` int(11) NOT NULL,
  `nilai` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nilai_kriteria`
--

INSERT INTO `nilai_kriteria` (`id`, `nilai`) VALUES
(1, 9),
(2, 3),
(3, 3),
(4, 9),
(5, 9),
(6, 9),
(7, 9),
(8, 9),
(9, 9),
(10, 9);

-- --------------------------------------------------------

--
-- Table structure for table `nilai_kriteria_bobot`
--

CREATE TABLE `nilai_kriteria_bobot` (
  `id` int(11) NOT NULL,
  `bobot` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nilai_kriteria_bobot`
--

INSERT INTO `nilai_kriteria_bobot` (`id`, `bobot`) VALUES
(1, 0.4012),
(2, 0.2974),
(3, 0.1826),
(4, 0.0968),
(5, 0.022);

-- --------------------------------------------------------

--
-- Table structure for table `nilai_preferensi`
--

CREATE TABLE `nilai_preferensi` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `nilai` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nilai_preferensi`
--

INSERT INTO `nilai_preferensi` (`id`, `nama`, `nilai`) VALUES
(1, '1 - Sama penting dengan', 1),
(2, '2 - Mendekati sedikit lebih penting dari', 2),
(3, '3 - Sedikit lebih penting dari', 3),
(4, '4 - Mendekati lebih penting dari', 4),
(5, '5 - Lebih Penting dari', 5),
(6, '6 - Mendekati sangat penting dari', 6),
(7, '7 - Sangat penting dari', 7),
(8, '8 - Mendekati mutlak dari', 8),
(9, '9 - Sangat mutlak dari', 9),
(10, '0.5 - bagi mendekati sedikit lebih penting dari', 0.5),
(11, '0.333 - 1 bagi sedikit lebih penting dari', 0.333),
(12, '0.25 - 1 bagi mendekati lebih penting dari', 0.25),
(13, '0.2 - 1 bagi lebih penting dari', 0.2),
(14, '0.167 - 1 bagi mendekati sangat penting dari ', 0.167),
(15, '0.143 - 1 bagi sangat penting dari', 0.143),
(16, '0.125 - 1 bagi mendekati mutlak dari ', 0.125),
(17, '0.1 - 1 bagi mutlak sangat penting dari ', 0.1);

-- --------------------------------------------------------

--
-- Table structure for table `ranking`
--

CREATE TABLE `ranking` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `nilai` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ranking`
--

INSERT INTO `ranking` (`id`, `nama`, `nilai`) VALUES
(1, 'Xiaomi Blackshark', 0.519),
(2, 'Xiaomi Mi', 0.241),
(3, 'Xiaomi Mi Lite', 0.1406),
(4, 'Xiaomi Pocophone', 0.0744),
(5, 'Xiaomi Redme', 0.0248);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alternatif`
--
ALTER TABLE `alternatif`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nilai_alternatif_k1`
--
ALTER TABLE `nilai_alternatif_k1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nilai_alternatif_k2`
--
ALTER TABLE `nilai_alternatif_k2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nilai_alternatif_k3`
--
ALTER TABLE `nilai_alternatif_k3`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nilai_alternatif_k4`
--
ALTER TABLE `nilai_alternatif_k4`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nilai_alternatif_k5`
--
ALTER TABLE `nilai_alternatif_k5`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nilai_k1_bobot`
--
ALTER TABLE `nilai_k1_bobot`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nilai_k2_bobot`
--
ALTER TABLE `nilai_k2_bobot`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nilai_k3_bobot`
--
ALTER TABLE `nilai_k3_bobot`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nilai_k4_bobot`
--
ALTER TABLE `nilai_k4_bobot`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nilai_k5_bobot`
--
ALTER TABLE `nilai_k5_bobot`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nilai_kriteria`
--
ALTER TABLE `nilai_kriteria`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nilai_kriteria_bobot`
--
ALTER TABLE `nilai_kriteria_bobot`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nilai_preferensi`
--
ALTER TABLE `nilai_preferensi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ranking`
--
ALTER TABLE `ranking`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alternatif`
--
ALTER TABLE `alternatif`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `nilai_kriteria`
--
ALTER TABLE `nilai_kriteria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `nilai_preferensi`
--
ALTER TABLE `nilai_preferensi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
