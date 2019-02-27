-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 27, 2019 at 04:26 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wpu`
--

-- --------------------------------------------------------

--
-- Table structure for table `data1`
--

CREATE TABLE `data1` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `nisn` char(12) NOT NULL,
  `email` varchar(50) NOT NULL,
  `jurusan` varchar(50) NOT NULL,
  `gambar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data1`
--

INSERT INTO `data1` (`id`, `nama`, `nisn`, `email`, `jurusan`, `gambar`) VALUES
(1, 'Lukman Hakqim', '000000000000', 'lukman.ha.com', 'Rekayasa Perangkat Lunak', '1.jpg'),
(3, 'Lukman dot ha', '123456789012', 'lukmanhakqim1@gmail.com', 'Programmer', '5c6e9dad6ccad.jpg'),
(4, 'Lukman dot ha', '123456789009', 'lukmanhakqim1@gmail.com', 'RPL', '5c7601b000e21.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users1`
--

CREATE TABLE `users1` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users1`
--

INSERT INTO `users1` (`id`, `username`, `password`) VALUES
(2, 'admin', '$2y$10$EpL0JbqgjsfS1HF4TOXWheKWqblMVCY0RFvcmBPBHRC4ebJCnYM6W');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data1`
--
ALTER TABLE `data1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users1`
--
ALTER TABLE `users1`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data1`
--
ALTER TABLE `data1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users1`
--
ALTER TABLE `users1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
