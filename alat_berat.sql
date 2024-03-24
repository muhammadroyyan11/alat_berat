-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 24, 2024 at 06:08 AM
-- Server version: 8.0.30
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `alat_berat`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int NOT NULL,
  `nama_admin` varchar(120) COLLATE utf8mb4_general_ci NOT NULL,
  `username` varchar(120) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(120) COLLATE utf8mb4_general_ci NOT NULL,
  `is_manager` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama_admin`, `username`, `password`, `is_manager`) VALUES
(1, 'Baso Irfandi', 'admin', '5f4dcc3b5aa765d61d8327deb882cf99', 0),
(2, 'Manager', 'manager', '5f4dcc3b5aa765d61d8327deb882cf99', 1);

-- --------------------------------------------------------

--
-- Table structure for table `alat_berat`
--

CREATE TABLE `alat_berat` (
  `id_alat_berat` int NOT NULL,
  `kode_type` varchar(120) COLLATE utf8mb4_general_ci NOT NULL,
  `merk` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `stok` int NOT NULL,
  `status` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `harga` int NOT NULL,
  `denda` int NOT NULL,
  `operator` int NOT NULL,
  `BBM` int NOT NULL,
  `gambar` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `alat_berat`
--

INSERT INTO `alat_berat` (`id_alat_berat`, `kode_type`, `merk`, `stok`, `status`, `harga`, `denda`, `operator`, `BBM`, `gambar`) VALUES
(19, 'CRANE', 'BRAGG', 2, '0', 3550000, 1250000, 1, 1, 'cropped-crane1.jpg'),
(20, 'EXCAVATOR', 'Komatsu PC200', 0, '0', 4500000, 1250000, 1, 1, 'qq.jpg'),
(21, 'EXCAVATOR', 'kobelco', 2, '0', 4500000, 1250000, 1, 1, 'Excavator-Kobelco-SK200-8-2012-KRS-1-23902192.jpg'),
(22, 'EXCAVATOR', 'Hitachi', 19, '1', 4550000, 1250000, 1, 0, 'Excavator-Hitachi-ZX200-2015-Sn-4-1701202.jpeg'),
(23, 'Bulldozer', 'POWER PLUS', 0, '1', 5500000, 1250000, 1, 1, 'unnamed.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id_customer` int NOT NULL,
  `nama` varchar(120) COLLATE utf8mb4_general_ci NOT NULL,
  `username` varchar(120) COLLATE utf8mb4_general_ci NOT NULL,
  `alamat` varchar(120) COLLATE utf8mb4_general_ci NOT NULL,
  `gender` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `no_telpon` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `no_ktp` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(120) COLLATE utf8mb4_general_ci NOT NULL,
  `role_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id_customer`, `nama`, `username`, `alamat`, `gender`, `no_telpon`, `no_ktp`, `password`, `role_id`) VALUES
(3, 'Baso Irfandi', 'customer', 'mentaras', 'Laki-Laki', '085856463433', '035181129895562', '91ec1f9324753048c0096d036a694f86', 0),
(4, 'zulfikar', 'ndrew', 'Gresik', 'Laki-Laki', '548456151', '05489456484', 'e10adc3949ba59abbe56e057f20f883e', 0),
(5, 'agis', 'agis', 'Gresik', 'Laki-Laki', '548456151', '05489456484', 'e2fc714c4727ee9395f324cd2e7f331f', 2),
(6, 'syafik', 'syafik mion', 'Gresik', 'Laki-laki', '085856463433', '0848455657894644', 'd190e277ccbef91e6905d1e48d261127', 1),
(7, 'agus', 'agus', 'asadd', 'Laki-Laki', '5489498', '488949', 'fdf169558242ee051cca1479770ebac3', 2),
(8, 'adi', 'adi', 'iidsidg', 'Perempuan', '599959595959', '9562626595959', '202cb962ac59075b964b07152d234b70', 2);

-- --------------------------------------------------------

--
-- Table structure for table `sewa`
--

CREATE TABLE `sewa` (
  `id_sewa` int NOT NULL,
  `id_customer` int NOT NULL,
  `tanggal_sewa` date NOT NULL,
  `tanggal_kembali` date NOT NULL,
  `tanggal_pengembalia` date NOT NULL,
  `status_sewa` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `status_pengembalian` varchar(50) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_sewa` int NOT NULL,
  `id_customer` int NOT NULL,
  `id_alat_berat` int NOT NULL,
  `tanggal_sewa` date NOT NULL,
  `tanggal_kembali` date NOT NULL,
  `stok_sewa` int NOT NULL,
  `harga` varchar(120) COLLATE utf8mb4_general_ci NOT NULL,
  `denda` varchar(120) COLLATE utf8mb4_general_ci NOT NULL,
  `total_denda` varchar(120) COLLATE utf8mb4_general_ci NOT NULL,
  `tanggal_pengembalian` date NOT NULL,
  `status_pengembalian` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `status_sewa` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `bukti_pembayaran` varchar(120) COLLATE utf8mb4_general_ci NOT NULL,
  `status_pembayaran` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_sewa`, `id_customer`, `id_alat_berat`, `tanggal_sewa`, `tanggal_kembali`, `stok_sewa`, `harga`, `denda`, `total_denda`, `tanggal_pengembalian`, `status_pengembalian`, `status_sewa`, `bukti_pembayaran`, `status_pembayaran`) VALUES
(2, 0, 1, '2021-07-16', '2021-07-17', 0, '0', '1000000', '', '0000-00-00', 'Belum Kembali', 'Belum Selesai', '', 0),
(3, 0, 1, '2021-07-16', '2021-07-16', 0, '0', '1000000', '', '0000-00-00', 'Belum Kembali', 'Belum Selesai', '', 0),
(4, 7, 1, '2021-07-15', '2021-07-17', 0, '3540000', '1000000', '15000000', '2021-08-01', 'Belum Kembali', 'selesai', '410-1165-1-PB2.pdf', 1),
(7, 8, 1, '2021-07-17', '2021-07-18', 0, '3540000', '1000000', '6000000', '2021-07-24', 'Kembali', 'selesai', '258766-penerapan-metode-topsis-untuk-sistem-pen-6b02ca71.pdf', 1),
(14, 7, 21, '2024-03-08', '2024-03-08', 0, '4500000', '1250000', '0', '0000-00-00', 'Belum Kembali', 'Belum Selesai', '', 0),
(15, 7, 19, '2024-03-08', '2024-03-15', 0, '3550000', '1250000', '0', '0000-00-00', 'Belum Kembali', 'Belum Selesai', 'Image20240226111100.jpg', 0),
(16, 7, 22, '2024-03-18', '2024-03-20', 0, '4550000', '1250000', '0', '0000-00-00', 'Belum Kembali', 'Belum Selesai', '', 0),
(18, 7, 22, '2024-03-18', '2024-03-20', 1, '9100000', '1250000', '0', '0000-00-00', 'Belum Kembali', 'selesai', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

CREATE TABLE `type` (
  `id_type` int NOT NULL,
  `kode_type` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `nama_type` varchar(20) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `type`
--

INSERT INTO `type` (`id_type`, `kode_type`, `nama_type`) VALUES
(1, 'CRANE', 'mobile cranee'),
(3, 'EXCAVATOR', 'bego'),
(5, 'Bulldozer', 'DOZER'),
(6, 'EXCAVATOR', 'bego'),
(7, 'KD0001', 'Kode 1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `alat_berat`
--
ALTER TABLE `alat_berat`
  ADD PRIMARY KEY (`id_alat_berat`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id_customer`);

--
-- Indexes for table `sewa`
--
ALTER TABLE `sewa`
  ADD PRIMARY KEY (`id_sewa`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_sewa`);

--
-- Indexes for table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`id_type`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `alat_berat`
--
ALTER TABLE `alat_berat`
  MODIFY `id_alat_berat` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id_customer` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `sewa`
--
ALTER TABLE `sewa`
  MODIFY `id_sewa` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_sewa` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `type`
--
ALTER TABLE `type`
  MODIFY `id_type` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
