-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 05, 2024 at 11:54 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projectpenjualan`
--

-- --------------------------------------------------------

--
-- Table structure for table `contactus`
--

CREATE TABLE `contactus` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `pesan` text NOT NULL,
  `pesananUserID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contactus`
--

INSERT INTO `contactus` (`id`, `nama`, `email`, `phone`, `pesan`, `pesananUserID`) VALUES
(16, 'mikachan', 'erikxzc@gmail.com', '085857619010', 'dsfdfds', 71);

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id` int(11) NOT NULL,
  `namaPelanggan` varchar(255) NOT NULL,
  `alamatPelanggan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id`, `namaPelanggan`, `alamatPelanggan`) VALUES
(1, 'sudo', 'sudo'),
(2, 'mudama', 'badung bali'),
(3, 'sim2', 'tokyo japan'),
(4, 'erik2', 'bali denpasar indonesia'),
(5, 'abiyoga', 'denpasar dekat tiara kode pos 80118');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id` int(11) NOT NULL,
  `metodePembayaran` varchar(255) NOT NULL,
  `jumlahPembayaran` decimal(10,2) NOT NULL,
  `pesanan_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id`, `metodePembayaran`, `jumlahPembayaran`, `pesanan_id`) VALUES
(27, 'gopay', 100000.00, 9635),
(28, 'gopay', 750000.00, 9636),
(29, 'ovo', 750000.00, 9637),
(30, 'shopeepay', 100000.00, 9638),
(31, 'mandiri', 228000.00, 9639),
(32, 'shopeepay', 2600000.00, 9640);

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id` int(11) NOT NULL,
  `namaPengguna` varchar(255) NOT NULL,
  `kataSandi` varchar(255) NOT NULL,
  `pelanggan_id` int(11) DEFAULT NULL,
  `role` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id`, `namaPengguna`, `kataSandi`, `pelanggan_id`, `role`) VALUES
(29, 'sudo', '$2y$10$5uDTkn1g6Rev7.NRzX0Ite85QBKqB4BPeVXHrwyhyKT0cfQyEpUiq', 1, 'user'),
(30, 'mudama', '$2y$10$r93vdptmZRrq0OcDiNst2e2.zDHfj5QsCXo3cd5M.CpOV5miuVLFS', 2, 'user'),
(31, 'sim2', '$2y$10$2PKLOO8A.KxOH5T.aRFsz.sSwxMqfGYQ4rs2UMZAUsqaQC0Cu.xNe', 3, 'admin'),
(32, 'erik2', '$2y$10$SFH9cC.70bFcctMWdBjhc.vNVl9pXBWW74PIxKH1YmaRvCcnZU/zi', 4, 'user'),
(33, 'abiyoga', '$2y$10$XJdojx3KiY/wJ8NdKSDFieVTDNKN/fcGG5T1AkmxqONb0SaP0SEWG', 5, 'user');

-- --------------------------------------------------------

--
-- Table structure for table `pengiriman`
--

CREATE TABLE `pengiriman` (
  `id` int(11) NOT NULL,
  `metodePengiriman` varchar(255) NOT NULL,
  `statusPengiriman` varchar(255) NOT NULL,
  `tanggalKirim` date NOT NULL,
  `pesanan_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pengiriman`
--

INSERT INTO `pengiriman` (`id`, `metodePengiriman`, `statusPengiriman`, `tanggalKirim`, `pesanan_id`) VALUES
(27, 'j&amp;t express', 'Dikirim', '2024-06-04', 9635),
(28, 'j&amp;t express', 'Dikirim', '2024-06-04', 9636),
(29, 'j&amp;t express', 'Dikirim', '2024-06-04', 9637),
(30, 'grab express', 'Dikirim', '2024-06-04', 9638),
(31, 'gojek instant courier', 'Pending', '2024-06-04', 9639),
(32, 'grab express', 'Dikirim', '2024-06-05', 9640);

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `id` int(11) NOT NULL,
  `pelanggan_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`id`, `pelanggan_id`) VALUES
(9635, 4),
(9636, 4),
(9637, 4),
(9639, 4),
(9640, 4),
(9638, 5);

-- --------------------------------------------------------

--
-- Table structure for table `pesananuser`
--

CREATE TABLE `pesananuser` (
  `id` int(11) NOT NULL,
  `alamatUser` varchar(255) NOT NULL,
  `namaBarang` varchar(255) NOT NULL,
  `jenisBarang` varchar(255) NOT NULL,
  `jumlahBarang` varchar(255) NOT NULL,
  `pesanan_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pesananuser`
--

INSERT INTO `pesananuser` (`id`, `alamatUser`, `namaBarang`, `jenisBarang`, `jumlahBarang`, `pesanan_id`) VALUES
(71, 'bali denpasar indonesia', 'chicken nugget fiesta 500 GR', '', '1', 9635),
(72, 'perumahan graha parta lestari blok j no4', 'teh sosro 250 ml', '', '1', 9636),
(73, 'perumahan graha parta lestari blok j no4', 'Beras', '', '1', 9636),
(74, 'jalan gunung patas no 4', 'teh sosro 250 ml', '', '1', 9637),
(75, 'jalan gunung patas no 4', 'Beras', '', '1', 9637),
(76, 'jalan tiara no 4', 'chicken nugget fiesta 500 GR', '', '1', 9638),
(77, 'dekat stikom tunggu di depan bogaloka', 'teh sosro 250 ml', '', '4', 9639),
(78, 'dekat stikom tunggu di depan bogaloka', 'chicken nugget fiesta 500 GR', '', '2', 9639),
(79, 'dekat stikom tunggu di depan bogaloka', 'teh botol 500 ml v2', '', '1', 9639),
(80, 'banjar pitik pemogan', 'Beras', '', '4', 9640),
(81, 'banjar pitik pemogan', 'teh sosro 250 ml', '', '2', 9640),
(82, 'banjar pitik pemogan', 'chicken nugget fiesta 500 GR', '', '1', 9640);

-- --------------------------------------------------------

--
-- Table structure for table `stockbarang`
--

CREATE TABLE `stockbarang` (
  `id` int(11) NOT NULL,
  `namaBarang` varchar(255) NOT NULL,
  `jenisBarang` varchar(255) NOT NULL,
  `jumlahBarang` varchar(255) NOT NULL,
  `harga` float NOT NULL,
  `gambar` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `stockbarang`
--

INSERT INTO `stockbarang` (`id`, `namaBarang`, `jenisBarang`, `jumlahBarang`, `harga`, `gambar`) VALUES
(8, 'Beras', 'Makanan', '10', 500000, 'beras.jpg'),
(20, 'teh sosro 250 ml', 'Minuman', '50', 5500, 'tehbotol350ml-removebg-preview.png'),
(25, 'chicken nugget fiesta 500 GR', 'Frozen food', '30', 100000, 'Daging.jpg'),
(27, 'teh botol 500 ml v2', 'Minuman', '80', 6000, 'tehbotol350ml-removebg-preview.png'),
(43, 'teh sosro 250 ml', 'Minuman', '12', 250000, '665d4642b2ec3.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contactus`
--
ALTER TABLE `contactus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pesananUserID` (`pesananUserID`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pesanan_id` (`pesanan_id`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pelanggan_id` (`pelanggan_id`);

--
-- Indexes for table `pengiriman`
--
ALTER TABLE `pengiriman`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pesanan_id` (`pesanan_id`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pelanggan_id` (`pelanggan_id`);

--
-- Indexes for table `pesananuser`
--
ALTER TABLE `pesananuser`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pesanan_id` (`pesanan_id`);

--
-- Indexes for table `stockbarang`
--
ALTER TABLE `stockbarang`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contactus`
--
ALTER TABLE `contactus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `pengiriman`
--
ALTER TABLE `pengiriman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9641;

--
-- AUTO_INCREMENT for table `pesananuser`
--
ALTER TABLE `pesananuser`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `stockbarang`
--
ALTER TABLE `stockbarang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `contactus`
--
ALTER TABLE `contactus`
  ADD CONSTRAINT `contactus_ibfk_1` FOREIGN KEY (`pesananUserID`) REFERENCES `pesananuser` (`id`);

--
-- Constraints for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `pembayaran_ibfk_1` FOREIGN KEY (`pesanan_id`) REFERENCES `pesanan` (`id`);

--
-- Constraints for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD CONSTRAINT `pengguna_ibfk_1` FOREIGN KEY (`pelanggan_id`) REFERENCES `pelanggan` (`id`);

--
-- Constraints for table `pengiriman`
--
ALTER TABLE `pengiriman`
  ADD CONSTRAINT `pengiriman_ibfk_1` FOREIGN KEY (`pesanan_id`) REFERENCES `pesanan` (`id`);

--
-- Constraints for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD CONSTRAINT `pesanan_ibfk_1` FOREIGN KEY (`pelanggan_id`) REFERENCES `pelanggan` (`id`);

--
-- Constraints for table `pesananuser`
--
ALTER TABLE `pesananuser`
  ADD CONSTRAINT `pesananuser_ibfk_2` FOREIGN KEY (`pesanan_id`) REFERENCES `pesanan` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
