-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 11 Jan 2023 pada 07.20
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_sewa_alat_berat`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nama_admin` varchar(120) NOT NULL,
  `username` varchar(120) NOT NULL,
  `password` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `nama_admin`, `username`, `password`) VALUES
(1, 'Baso Irfandi', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `alat_berat`
--

CREATE TABLE `alat_berat` (
  `id_alat_berat` int(11) NOT NULL,
  `kode_type` varchar(120) NOT NULL,
  `merk` varchar(20) NOT NULL,
  `status` varchar(50) NOT NULL,
  `harga` int(11) NOT NULL,
  `denda` int(11) NOT NULL,
  `operator` int(11) NOT NULL,
  `BBM` int(11) NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `alat_berat`
--

INSERT INTO `alat_berat` (`id_alat_berat`, `kode_type`, `merk`, `status`, `harga`, `denda`, `operator`, `BBM`, `gambar`) VALUES
(19, 'CRANE', 'BRAGG', '1', 3550000, 1250000, 1, 1, 'cropped-crane1.jpg'),
(20, 'EXCAVATOR', 'Komatsu PC200', '1', 4500000, 1250000, 1, 1, 'qq.jpg'),
(21, 'EXCAVATOR', 'kobelco', '1', 4500000, 1250000, 1, 1, 'Excavator-Kobelco-SK200-8-2012-KRS-1-23902192.jpg'),
(22, 'EXCAVATOR', 'Hitachi', '1', 4550000, 1250000, 1, 0, 'Excavator-Hitachi-ZX200-2015-Sn-4-1701202.jpeg'),
(23, 'Bulldozer', 'POWER PLUS', '1', 5500000, 1250000, 1, 1, 'unnamed.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `customer`
--

CREATE TABLE `customer` (
  `id_customer` int(11) NOT NULL,
  `nama` varchar(120) NOT NULL,
  `username` varchar(120) NOT NULL,
  `alamat` varchar(120) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `no_telpon` varchar(20) NOT NULL,
  `no_ktp` varchar(50) NOT NULL,
  `password` varchar(120) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `customer`
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
-- Struktur dari tabel `sewa`
--

CREATE TABLE `sewa` (
  `id_sewa` int(11) NOT NULL,
  `id_customer` int(11) NOT NULL,
  `tanggal_sewa` date NOT NULL,
  `tanggal_kembali` date NOT NULL,
  `tanggal_pengembalia` date NOT NULL,
  `status_sewa` varchar(50) NOT NULL,
  `status_pengembalian` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id_sewa` int(11) NOT NULL,
  `id_customer` int(11) NOT NULL,
  `id_alat_berat` int(11) NOT NULL,
  `tanggal_sewa` date NOT NULL,
  `tanggal_kembali` date NOT NULL,
  `harga` varchar(120) NOT NULL,
  `denda` varchar(120) NOT NULL,
  `total_denda` varchar(120) NOT NULL,
  `tanggal_pengembalian` date NOT NULL,
  `status_pengembalian` varchar(50) DEFAULT NULL,
  `status_sewa` varchar(50) NOT NULL,
  `bukti_pembayaran` varchar(120) NOT NULL,
  `status_pembayaran` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id_sewa`, `id_customer`, `id_alat_berat`, `tanggal_sewa`, `tanggal_kembali`, `harga`, `denda`, `total_denda`, `tanggal_pengembalian`, `status_pengembalian`, `status_sewa`, `bukti_pembayaran`, `status_pembayaran`) VALUES
(2, 0, 1, '2021-07-16', '2021-07-17', '0', '1000000', '', '0000-00-00', 'Belum Kembali', 'Belum Selesai', '', 0),
(3, 0, 1, '2021-07-16', '2021-07-16', '0', '1000000', '', '0000-00-00', 'Belum Kembali', 'Belum Selesai', '', 0),
(4, 7, 1, '2021-07-15', '2021-07-17', '3540000', '1000000', '15000000', '2021-08-01', 'Belum Kembali', 'selesai', '410-1165-1-PB2.pdf', 1),
(7, 8, 1, '2021-07-17', '2021-07-18', '3540000', '1000000', '6000000', '2021-07-24', 'Kembali', 'selesai', '258766-penerapan-metode-topsis-untuk-sistem-pen-6b02ca71.pdf', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `type`
--

CREATE TABLE `type` (
  `id_type` int(11) NOT NULL,
  `kode_type` varchar(10) NOT NULL,
  `nama_type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `type`
--

INSERT INTO `type` (`id_type`, `kode_type`, `nama_type`) VALUES
(1, 'CRANE', 'mobile crane'),
(3, 'EXCAVATOR', 'bego'),
(5, 'Bulldozer', 'DOZER'),
(6, 'EXCAVATOR', 'bego');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `alat_berat`
--
ALTER TABLE `alat_berat`
  ADD PRIMARY KEY (`id_alat_berat`);

--
-- Indeks untuk tabel `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id_customer`);

--
-- Indeks untuk tabel `sewa`
--
ALTER TABLE `sewa`
  ADD PRIMARY KEY (`id_sewa`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_sewa`);

--
-- Indeks untuk tabel `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`id_type`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `alat_berat`
--
ALTER TABLE `alat_berat`
  MODIFY `id_alat_berat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `customer`
--
ALTER TABLE `customer`
  MODIFY `id_customer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `sewa`
--
ALTER TABLE `sewa`
  MODIFY `id_sewa` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_sewa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `type`
--
ALTER TABLE `type`
  MODIFY `id_type` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
