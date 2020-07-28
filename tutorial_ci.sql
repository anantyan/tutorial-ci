-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 28, 2020 at 04:17 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.3.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tutorial_ci`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_account`
--

CREATE TABLE `tbl_account` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `level_user` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_account`
--

INSERT INTO `tbl_account` (`id`, `username`, `password`, `email`, `level_user`) VALUES
(1, 'admin', 'admin', 'admin@email.com', 1),
(2, 'member', 'member', 'member@email.com', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mahasiswa`
--

CREATE TABLE `tbl_mahasiswa` (
  `id` int(11) NOT NULL,
  `nim` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jurusan` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `no_telp` varchar(255) NOT NULL,
  `photo` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_mahasiswa`
--

INSERT INTO `tbl_mahasiswa` (`id`, `nim`, `nama`, `jurusan`, `alamat`, `email`, `no_telp`, `photo`) VALUES
(20, 191013, 'Cristiano Ronaldo', 'Teknik Informatika', 'Porto', 'ronaldo@email.com', '628123456789', '{\"name\":\"http:\\/\\/localhost\\/tutorial-ci\\/assets\\/photo\\/cb0379a5aad5c4df615417281c00c91e.png\",\"mime\":\"image\\/png\",\"blob\":\"C:\\/xampp\\/htdocs\\/tutorial-ci\\/assets\\/photo\\/cb0379a5aad5c4df615417281c00c91e.png\"}'),
(21, 191012, 'James Junior', 'Sistem Informasi', 'California', 'james@email.com', '628123456789', '{\"name\":\"http:\\/\\/localhost\\/tutorial-ci\\/assets\\/photo\\/9156df64aeeb95db900eb6139abeba29.jpg\",\"mime\":\"image\\/jpeg\",\"blob\":\"C:\\/xampp\\/htdocs\\/tutorial-ci\\/assets\\/photo\\/9156df64aeeb95db900eb6139abeba29.jpg\"}'),
(22, 191011, 'Arya Rezza Anantya', 'Teknik Informatika', 'Banjarnegara', 'arya@email.com', '628123456789', '{\"name\":\"http:\\/\\/localhost\\/tutorial-ci\\/assets\\/photo\\/089b0b55413fe7e66dda547744e76e3e.jpg\",\"mime\":\"image\\/jpeg\",\"blob\":\"C:\\/xampp\\/htdocs\\/tutorial-ci\\/assets\\/photo\\/089b0b55413fe7e66dda547744e76e3e.jpg\"}');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_upload`
--

CREATE TABLE `tbl_upload` (
  `ini_id` int(11) NOT NULL,
  `ini_foto` varchar(255) NOT NULL,
  `ini_deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_account`
--
ALTER TABLE `tbl_account`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_mahasiswa`
--
ALTER TABLE `tbl_mahasiswa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_upload`
--
ALTER TABLE `tbl_upload`
  ADD PRIMARY KEY (`ini_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_account`
--
ALTER TABLE `tbl_account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_mahasiswa`
--
ALTER TABLE `tbl_mahasiswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tbl_upload`
--
ALTER TABLE `tbl_upload`
  MODIFY `ini_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
