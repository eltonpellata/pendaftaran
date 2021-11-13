-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 13, 2021 at 11:44 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mambon`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_pendaftaran`
--

CREATE TABLE `tb_pendaftaran` (
  `id` int(11) NOT NULL,
  `nama` varchar(250) NOT NULL,
  `jenisk` varchar(100) NOT NULL,
  `tajaran` varchar(250) NOT NULL,
  `asekolah` varchar(300) NOT NULL,
  `tlahir` varchar(100) NOT NULL,
  `tglahir` date NOT NULL,
  `agama` varchar(250) NOT NULL,
  `alengkap` varchar(300) NOT NULL,
  `upakte` varchar(200) NOT NULL,
  `upkk` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pendaftaran`
--

INSERT INTO `tb_pendaftaran` (`id`, `nama`, `jenisk`, `tajaran`, `asekolah`, `tlahir`, `tglahir`, `agama`, `alengkap`, `upakte`, `upkk`) VALUES
(14, 'elton.pellata', 'laki-laki', '2020', 'mana saja', 'bitung', '2021-11-18', 'Prostestan', 'lata', '34.jpg', '35.jpg'),
(15, 'wia', 'laki-laki', '2019', 'sdsads', 'sadasd', '2021-11-16', 'Islam', 'sadas', '2.jpg', '35.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_pendaftaran`
--
ALTER TABLE `tb_pendaftaran`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_pendaftaran`
--
ALTER TABLE `tb_pendaftaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
