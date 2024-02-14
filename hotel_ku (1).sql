-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 06, 2024 at 06:09 PM
-- Server version: 8.0.30
-- PHP Version: 8.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotel_ku`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_fasilitas_kamar`
--

CREATE TABLE `tb_fasilitas_kamar` (
  `id` int NOT NULL,
  `id_kamar` int NOT NULL,
  `fasilitas` varchar(100) NOT NULL,
  `gambar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_fasilitas_kamar`
--

INSERT INTO `tb_fasilitas_kamar` (`id`, `id_kamar`, `fasilitas`, `gambar`) VALUES
(27, 39, 'test', 'image/test20240204013201pm.jpg'),
(29, 44, 'test', 'image/test20240205112748pm.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_fasilitas_umum`
--

CREATE TABLE `tb_fasilitas_umum` (
  `id` int NOT NULL,
  `nama_fasilitas` varchar(50) NOT NULL,
  `keterangan` text NOT NULL,
  `gambar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_fasilitas_umum`
--

INSERT INTO `tb_fasilitas_umum` (`id`, `nama_fasilitas`, `keterangan`, `gambar`) VALUES
(2, 'Kolam Renang VIP', 'Berada pada lantai 5 dengan luas 500m persegi', 'image/LapanganBadminton20220313101526pm.jpeg'),
(3, 'Tempat Santai', 'Berada pada Lantai 12 menghadap Sunrise', 'image/TempatSantai20220313101501pm.jpg'),
(10, 'Kolam Berenang', 'VIP', 'image/LapanganTennis20240205114200pm.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kamar`
--

CREATE TABLE `tb_kamar` (
  `id_kamar` int NOT NULL,
  `nama_kamar` varchar(50) NOT NULL,
  `total_kamar` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_kamar`
--

INSERT INTO `tb_kamar` (`id_kamar`, `nama_kamar`, `total_kamar`) VALUES
(39, 'vivi', 4),
(44, 'Royals', 5),
(45, 'gong', 3),
(46, 'junior', 10);

-- --------------------------------------------------------

--
-- Table structure for table `tb_pelanggan`
--

CREATE TABLE `tb_pelanggan` (
  `id` int NOT NULL,
  `nama_pemesan` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `hp` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `nama_tamu` varchar(50) NOT NULL,
  `tgl_pesan` datetime NOT NULL,
  `checkin` date NOT NULL,
  `checkout` date NOT NULL,
  `jml_kamar` int NOT NULL,
  `status` enum('0','1') NOT NULL,
  `id_kamar` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_pelanggan`
--

INSERT INTO `tb_pelanggan` (`id`, `nama_pemesan`, `email`, `hp`, `nama_tamu`, `tgl_pesan`, `checkin`, `checkout`, `jml_kamar`, `status`, `id_kamar`) VALUES
(113, 'dimas', 'dimasyoloyolo@gmail.com', '98765279', 'dimas ', '2024-02-05 00:00:00', '2024-02-05', '2024-02-08', 2, '1', 44),
(114, 'nano', 'nano@example.com', '67675576432', 'nano', '2024-02-05 15:14:45', '2024-02-05', '2024-02-08', 1, '0', 39),
(115, 'agouuy', 'agoy@example.com', '828278762672', 'yoga', '2024-02-05 15:27:08', '2024-02-18', '2024-02-25', 3, '0', 44),
(116, 'gus', 'gus@example.com', '34365654545', 'gus', '2024-02-05 15:34:02', '2024-02-05', '2024-02-21', 2, '0', 44),
(117, 'dir', 'dir@example.com', '4343522331131', 'dir', '2024-02-05 15:37:40', '2024-02-07', '2024-02-11', 4, '0', 46),
(118, 'han', 'han@example.com', '09999999', 'han', '2024-02-05 15:39:03', '2024-02-05', '2024-02-21', 1, '0', 45),
(119, 'a', 'a@e', '333', 'a', '2024-02-05 15:40:25', '2024-02-04', '2024-02-14', 4, '0', 46),
(120, 'c', 'c@c', '4444', 'c', '2024-02-05 15:41:58', '2024-02-05', '2024-02-11', 3, '0', 45),
(121, 'z', 'z@z', '33322222111', 'zzzzz', '2024-02-05 22:48:28', '2024-02-05', '2024-02-06', 4, '1', 45),
(122, 'farhan', 'farhan@example.com', '44444444', 'farhan', '2024-02-07 00:29:10', '2024-02-07', '2024-02-14', 1, '0', 44),
(123, 'gusba', 'gusba@example.com', '6655655656565', 'gusba', '2024-02-07 00:33:00', '2024-02-08', '2024-02-16', 4, '0', 45);

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `tipe` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id`, `username`, `password`, `tipe`) VALUES
(1, 'admin', '123', 'admin'),
(2, 'resepsionis', '321', 'resepsionis');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_fasilitas_kamar`
--
ALTER TABLE `tb_fasilitas_kamar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_fasilitas_umum`
--
ALTER TABLE `tb_fasilitas_umum`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_kamar`
--
ALTER TABLE `tb_kamar`
  ADD PRIMARY KEY (`id_kamar`);

--
-- Indexes for table `tb_pelanggan`
--
ALTER TABLE `tb_pelanggan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_fasilitas_kamar`
--
ALTER TABLE `tb_fasilitas_kamar`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `tb_fasilitas_umum`
--
ALTER TABLE `tb_fasilitas_umum`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tb_kamar`
--
ALTER TABLE `tb_kamar`
  MODIFY `id_kamar` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `tb_pelanggan`
--
ALTER TABLE `tb_pelanggan`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
