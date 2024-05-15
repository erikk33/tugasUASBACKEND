-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 16, 2024 at 01:15 AM
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
(1, 'ewrfw', 'rwrw', 'yhtfytr', 'rerewrrwerewrewr', NULL),
(2, 'Putu Erik Cahyadi', 'erikxzc@gmail.com', 'ewrwr', '085857619010', NULL),
(3, 'testubgcho', 'erikxzc@gmail.com', 'fsrf', '085857619010', NULL),
(4, 'Putu Erik Cahyadi', 'erikxzc@gmail.com', 'rewrew', '085857619010', NULL),
(5, 'kawakami', 'imass@gmail.com', 'testring saja', '085857619010', NULL),
(6, 'dimas', 'doukana@gmail.com', 'tdds', '43432', NULL),
(7, 'Putu Erik Cahyadi', 'erikxzc@gmail.com', 'FSFSF', '085857619010', NULL),
(8, 'fdsfs', 'fsfs@gmail.com', 'tretre', '45435345', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `kategoribarang`
--

CREATE TABLE `kategoribarang` (
  `id` int(11) NOT NULL,
  `namaKategori` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id` int(11) NOT NULL,
  `namaPelanggan` varchar(255) NOT NULL,
  `alamatPelanggan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id` int(11) NOT NULL,
  `namaPengguna` varchar(255) NOT NULL,
  `kataSandi` varchar(255) NOT NULL,
  `pelanggan_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id`, `namaPengguna`, `kataSandi`, `pelanggan_id`) VALUES
(3, 'testinga', '$2y$10$BjdRWfFE7mWtAuhjUrKwFebjXXra07Dv8EY4HBz2sLdPuGqkjHakS', NULL),
(4, 'choitocha', '$2y$10$NBLq2fe4G0TEyR7yZn.pmOAy/wj/CTZb.g8dNE6eagIHpCfnOjv82', NULL),
(5, 'nonochan', '$2y$10$w79/f1tx.ovjaQGZ/xO9JebB1jCAdxYJhlpETNB9V4nUtwlXzl9.2', NULL),
(6, 'nanochanmo', '$2y$10$LlLyl7W6br.sDMKp1x0Jx.mBFu7d5BA9RMxEHzzgR51Y0oFyiag9a', NULL),
(7, 'erikkukawakami', '$2y$10$iHUXOt/9JM3D90Y8PrJDteeQm4vX8yW95dZuEUDbPPvDUTgJFq992', NULL),
(8, 'dimaskawakami', '$2y$10$Zterj4wU5qNiEwPe/3dEMu1q6xJF.tHMy6LQagURET06Vmu3v307m', NULL);

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

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `id` int(11) NOT NULL,
  `pelanggan_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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

-- --------------------------------------------------------

--
-- Table structure for table `stockbarang`
--

CREATE TABLE `stockbarang` (
  `id` int(11) NOT NULL,
  `namaBarang` varchar(255) NOT NULL,
  `jenisBarang` varchar(255) NOT NULL,
  `jumlahBarang` varchar(255) NOT NULL,
  `kategori_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
-- Indexes for table `kategoribarang`
--
ALTER TABLE `kategoribarang`
  ADD PRIMARY KEY (`id`);

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `kategori_id` (`kategori_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contactus`
--
ALTER TABLE `contactus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `kategoribarang`
--
ALTER TABLE `kategoribarang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `pengiriman`
--
ALTER TABLE `pengiriman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pesananuser`
--
ALTER TABLE `pesananuser`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `stockbarang`
--
ALTER TABLE `stockbarang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

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
  ADD CONSTRAINT `pesananuser_ibfk_1` FOREIGN KEY (`id`) REFERENCES `stockbarang` (`id`),
  ADD CONSTRAINT `pesananuser_ibfk_2` FOREIGN KEY (`pesanan_id`) REFERENCES `pesanan` (`id`);

--
-- Constraints for table `stockbarang`
--
ALTER TABLE `stockbarang`
  ADD CONSTRAINT `stockbarang_ibfk_1` FOREIGN KEY (`kategori_id`) REFERENCES `kategoribarang` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
