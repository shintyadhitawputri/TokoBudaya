-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 19, 2023 at 08:44 PM
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
-- Database: `toko_budaya`
--

-- --------------------------------------------------------

--
-- Table structure for table `akun`
--

CREATE TABLE `akun` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `hp` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`id`, `nama`, `email`, `alamat`, `hp`) VALUES
(1, 'Rafani Bardatus ', 'rafanisalsa1235@gmail.com', 'Jalan Mastrip Perumnas Blok C - 15, RT 05 / RW 04', '0813-1343-6773');

-- --------------------------------------------------------

--
-- Table structure for table `daftar`
--

CREATE TABLE `daftar` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `nik` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `daftar`
--

INSERT INTO `daftar` (`id`, `username`, `nik`, `password`) VALUES
(1, 'biiww', '716253', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `nama`) VALUES
(1, 'Kain'),
(2, 'Aksesoris'),
(3, 'Pakaian Pria'),
(4, 'Pakaian Wanita'),
(5, 'Tas'),
(6, 'Alas Kaki'),
(7, 'Hobi'),
(8, 'Perlengkapan Rumah'),
(9, 'Souvenir'),
(10, 'Ukiran'),
(11, 'Alat Musik');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `toko` varchar(100) NOT NULL,
  `harga` int(11) NOT NULL,
  `lokasi` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `img1` varchar(100) NOT NULL,
  `img2` varchar(100) NOT NULL,
  `img3` varchar(100) NOT NULL,
  `img4` varchar(100) NOT NULL,
  `kategori_id` int(100) NOT NULL,
  `provinsi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id`, `nama`, `toko`, `harga`, `lokasi`, `deskripsi`, `img1`, `img2`, `img3`, `img4`, `kategori_id`, `provinsi`) VALUES
(1, 'Kain Batik', 'Batik Bordir', 200000, 'Pekalongan', '', 'gambar1.jpg', '', '', '', 1, 'jawaTimur'),
(2, 'Tas Rambat Rotan Dayak', 'Tas Keren', 55000, 'Palangka Raya', '', 'gambar7.jpg', '', '', '', 5, 'kalimantanTengah'),
(3, 'Wayang', 'Toko Wayang', 120000, 'Magelang', '', 'gambar3.jpg', '', '', '', 9, 'jawaTengah'),
(4, 'Gerabah', 'Toko Gerabahbah', 70000, 'Batu', '', 'gambar2.jpg', '', '', '', 8, 'jawaTimur'),
(5, 'Kipas Tangan', 'Toko Cantik Kipas', 35000, 'Malang', '', 'gambar5.jpeg', '', '', '', 2, 'jawaTengah'),
(6, 'Toples Keramik', 'Keramik Cantik', 35000, 'Magelang', '', 'gambar6.jpg', '', '', '', 10, 'jawaTengah'),
(7, 'Tas Manik', 'Manik-Manik Bina', 35000, 'Balikpapan', '', 'gambar8.jpg', '', '', '', 5, 'kalimantanTimur');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `daftar`
--
ALTER TABLE `daftar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `akun`
--
ALTER TABLE `akun`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `daftar`
--
ALTER TABLE `daftar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
