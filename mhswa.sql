-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 08, 2022 at 03:03 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mhswa`
--

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(20) NOT NULL,
  `level` varchar(20) NOT NULL,
  `nim` varchar(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `ttl` varchar(50) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `gender` varchar(50) DEFAULT NULL,
  `agama` varchar(10) DEFAULT NULL,
  `fakultas` varchar(20) DEFAULT NULL,
  `prodi` varchar(50) DEFAULT NULL,
  `tahunmasuk` varchar(10) DEFAULT NULL,
  `tahunkeluar` varchar(10) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `level`, `nim`, `nama`, `ttl`, `alamat`, `gender`, `agama`, `fakultas`, `prodi`, `tahunmasuk`, `tahunkeluar`, `foto`) VALUES
(1, 'dhimas', 'dhimas123', 'mahasiswa', '20190140112', 'Dhimas Rizqi Akbar', 'Jakarta, 30 Juli 1998', 'Kasihan, Bantul', '', '', 'Teknik', 'Teknologi Informasi', '2017', '2021', NULL),
(2, 'fajar', 'fajar123', 'admin', '20190140113', 'Fajar Yosri', NULL, 'Gamping, Sleman', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'panjul', 'panjul123', 'mahasiswa', '20190140115', 'Zulva Maruf', 'Jakarta, 30 Juli 1992', 'Kasihan, Bantul', 'Laki-laki', 'Hindu', 'Teknik', 'Teknologi Informasi', '2017', '2021', NULL),
(4, 'ispan@mail.com', 'ispan123', 'mahasiswa', '20190140100', 'Muhammad Isfandiyar', 'Tangerang, 31 Juli 1998', 'Gamping', 'Laki-laki', 'Kristen', 'Teknik', 'Teknologi Informasi', '2017', '2021', NULL),
(6, 'rifqi@mail.com', 'rifqi123', 'mahasiswa', '1989093023', 'Rifqi Pora', 'Tangerang, 31 Juli 1998', 'Kasihan, Bantul', 'Laki-laki', 'Islam', 'Teknik', 'Teknologi Informasi', '2017', '2021', 'photo_2022-06-29_20-26-42.jpg'),
(7, 'caur', '12344321', 'mahasiswa', '20190140129', 'Caur', 'Tangerang, 31 Juli 1998', 'Kasihan, Bantul', 'Laki-laki', 'Islam', 'Teknik', 'Teknologi Informasi', '2017', '2021', 'photo_2022-06-29_20-26-42.jpg'),
(8, 'contoh', 'ispan123', 'mahasiswa', '20190140000', 'Aguero', 'Jakarta, 30 Juli 1998', 'Argentina', '', '', 'Teknik', 'Teknologi Informasi', '2017', '2021', '826-photo_2022-06-29_20-26-42.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `nim` (`nim`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
