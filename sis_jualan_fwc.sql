-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 19, 2025 at 12:54 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sis_jualan_fwc`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `idAdmin` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `kataLaluan` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`idAdmin`, `nama`, `kataLaluan`) VALUES
(1, 'Kamarul', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `jenama`
--

CREATE TABLE `jenama` (
  `idJenama` int(11) NOT NULL,
  `jenama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jenama`
--

INSERT INTO `jenama` (`idJenama`, `jenama`) VALUES
(1, 'Vitamix'),
(2, 'Tefal'),
(3, 'Toshiba'),
(4, 'Panasonic'),
(19, 'Breveille');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE `pembelian` (
  `idPembelian` int(11) NOT NULL,
  `idPengguna` varchar(255) NOT NULL,
  `idProduk` int(11) NOT NULL,
  `tarikh` date NOT NULL,
  `masa` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pembelian`
--

INSERT INTO `pembelian` (`idPembelian`, `idPengguna`, `idProduk`, `tarikh`, `masa`) VALUES
(1, 'ali_09', 1, '2022-09-02', '09:32:00'),
(2, 'ali_09', 2, '2022-09-03', '11:29:00'),
(3, 'siti_05', 3, '2022-09-03', '20:15:00'),
(28, 'Foo', 3, '2023-07-10', '17:18:37'),
(29, 'ahmad_98', 2, '2023-07-10', '17:25:22'),
(30, 'Foo', 2, '2023-07-10', '18:06:32'),
(31, 'Foo', 20, '2023-07-10', '18:06:38'),
(32, 'ahmad_98', 5, '2023-07-11', '20:03:49');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `idPengguna` varchar(100) NOT NULL,
  `kataLaluan` varchar(10) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `noTelefon` char(11) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`idPengguna`, `kataLaluan`, `nama`, `noTelefon`, `email`) VALUES
('ahmad_98', 'ahmad98', 'Ahmad Abu Bakar', '01412345677', 'ahmad98@gmail.com'),
('ali_09', 'ali09', 'Ali', '0129876543', 'ali09@gmail.com'),
('Foo', 'abc12345', 'Meowwww', '012675388', 'hahahah@gmail.com'),
('Lakshna', 'laksummmmm', 'LakshanaPriya', '01729888334', 'laksshana@gmail.com'),
('siti_05', 'siti05', 'Siti', '0164445444', 'siti05@yahoo.com'),
('ssssssssssssss', 'ssSsssssss', 'ssssssssssssss', '20209130930', 'kakjkjkjkj@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `idProduk` int(11) NOT NULL,
  `namaProduk` varchar(255) DEFAULT NULL,
  `idJenama` int(11) DEFAULT NULL,
  `kapasiti` decimal(5,2) DEFAULT NULL,
  `jenisBekas` varchar(255) DEFAULT NULL,
  `hargaProduk` double(6,2) DEFAULT NULL,
  `gambar` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`idProduk`, `namaProduk`, `idJenama`, `kapasiti`, `jenisBekas`, `hargaProduk`, `gambar`) VALUES
(1, 'Vitamix5300', 1, 2.00, 'plastik', 2782.50, 'vitamix5300.jpg'),
(2, 'Tefal Blenderforce BL307', 2, 1.75, 'plastik', 105.00, 'Tefal_Blenderforce_BL307.jpg'),
(3, 'Toshiba blender', 3, 1.50, 'plastik', 110.00, 'Toshiba_blender.png'),
(4, 'Panasonic MX-MG5351', 4, 2.00, 'kaca', 309.00, 'Panasonic_MX-MG5351.png'),
(5, 'Tefal Blenderforce BL3171', 2, 1.75, 'kaca', 197.00, 'Tefal_Blenderforce_BL3171.jpg'),
(20, 'Breville the Fresh and Furious', 19, 1.50, 'tritan', 1299.00, 'Breville_the_Fresh_and_Furious.jpeg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`idAdmin`);

--
-- Indexes for table `jenama`
--
ALTER TABLE `jenama`
  ADD PRIMARY KEY (`idJenama`);

--
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`idPembelian`),
  ADD KEY `fk_pembelian_pengguna` (`idPengguna`),
  ADD KEY `fk_pembelian_produk` (`idProduk`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`idPengguna`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`idProduk`),
  ADD KEY `fk_produk_jenama` (`idJenama`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `idAdmin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `jenama`
--
ALTER TABLE `jenama`
  MODIFY `idJenama` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `idPembelian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `idProduk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD CONSTRAINT `fk_pembelian_pengguna` FOREIGN KEY (`idPengguna`) REFERENCES `pengguna` (`idPengguna`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_pembelian_produk` FOREIGN KEY (`idProduk`) REFERENCES `produk` (`idProduk`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `produk`
--
ALTER TABLE `produk`
  ADD CONSTRAINT `fk_produk_jenama` FOREIGN KEY (`idJenama`) REFERENCES `jenama` (`idJenama`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
