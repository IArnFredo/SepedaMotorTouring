-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 01, 2021 at 05:35 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sepeda_motor_touring`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', '$2y$10$mvPhdMFQ4Wc1u0eIBT7.See85bqEsJN6JhWSAPg0nuxB9Y0Dy97om');

-- --------------------------------------------------------

--
-- Table structure for table `listmotor`
--

CREATE TABLE `listmotor` (
  `id` varchar(50) NOT NULL,
  `merk_motor` varchar(50) NOT NULL,
  `tipe_motor` varchar(100) NOT NULL,
  `range_harga` int(50) NOT NULL,
  `harga` varchar(50) NOT NULL,
  `tipe_ban` int(50) NOT NULL,
  `kapasitas_bensin` varchar(50) NOT NULL,
  `keiritan_bensin` varchar(50) NOT NULL,
  `pemakaian_bensin` varchar(100) NOT NULL,
  `ergonomis` varchar(50) NOT NULL,
  `mesin` varchar(50) NOT NULL,
  `mesin_cc` varchar(50) NOT NULL,
  `suku_cadang` varchar(50) NOT NULL,
  `service_center` varchar(50) NOT NULL,
  `photomotor` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `listmotor`
--

INSERT INTO `listmotor` (`id`, `merk_motor`, `tipe_motor`, `range_harga`, `harga`, `tipe_ban`, `kapasitas_bensin`, `keiritan_bensin`, `pemakaian_bensin`, `ergonomis`, `mesin`, `mesin_cc`, `suku_cadang`, `service_center`, `photomotor`) VALUES
('619d8c356b016', 'Honda', 'New Mega Pro FI', 1, '22130000', 4, '12,3 Liter', '4', '46,2 km/liter', '4', '77', '149,5 cc', '4', '4', '/storage/New Mega Pro FI/New Mega Pro FI.jpg'),
('619d95f2cd9a8', 'Honda', 'New CB150R StreetFire', 1, '29862000', 4, '12 Liter', '4', '46 km/liter.', '3', '75', '149.16 cc', '4', '4', '/storage/New CB150R StreetFire/New CB150R StreetFire.jpg'),
('619e4768c9ceb', 'Kawasaki', 'W175TR', 1, '29900000', 4, '13.5 Liter', '3', '38 km/liter.', '3', '65', '177 cc', '2', '3', '/storage/W175TR/W175TR.jpg'),
('619e48b53afff', 'Yamaha', 'All New Vixion', 1, '28195000', 4, '12 Liter', '3', '41,6 km/liter', '4', '78', '155,1 cc', '4', '4', '/storage/All New Vixion/All New Vixion.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `listpengguna`
--

CREATE TABLE `listpengguna` (
  `id` int(60) NOT NULL,
  `id_motor` varchar(100) NOT NULL,
  `nama_depan` varchar(50) NOT NULL,
  `nama_belakang` varchar(50) DEFAULT NULL,
  `merk_motor` varchar(100) NOT NULL,
  `tipe_motor` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `listpengguna`
--

INSERT INTO `listpengguna` (`id`, `id_motor`, `nama_depan`, `nama_belakang`, `merk_motor`, `tipe_motor`) VALUES
(1, '619e48b53afff', 'Julius', 'Alfredo', 'Yamaha', 'All New Vixion'),
(2, '619e48b53afff', 'Neldy', 'Wijaya', 'Yamaha', 'All New Vixion');

-- --------------------------------------------------------

--
-- Table structure for table `range_harga`
--

CREATE TABLE `range_harga` (
  `id` int(11) NOT NULL,
  `range_harga` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `range_harga`
--

INSERT INTO `range_harga` (`id`, `range_harga`) VALUES
(1, '15 - 30 Jt'),
(2, '30 - 45 Jt'),
(3, '45 - 60 Jt'),
(4, '60 - 75 Jt'),
(5, '75 - 100 Jt');

-- --------------------------------------------------------

--
-- Table structure for table `tipe_ban`
--

CREATE TABLE `tipe_ban` (
  `id` int(11) NOT NULL,
  `tipe_ban` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tipe_ban`
--

INSERT INTO `tipe_ban` (`id`, `tipe_ban`) VALUES
(1, 'Ban Sport Touring'),
(2, 'Ban Touring'),
(3, 'Ban Offroad'),
(4, 'Ban Cruiser');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `listmotor`
--
ALTER TABLE `listmotor`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tipe_ban` (`tipe_ban`),
  ADD KEY `range_harga` (`range_harga`);

--
-- Indexes for table `listpengguna`
--
ALTER TABLE `listpengguna`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_motor` (`id_motor`);

--
-- Indexes for table `range_harga`
--
ALTER TABLE `range_harga`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tipe_ban`
--
ALTER TABLE `tipe_ban`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `listpengguna`
--
ALTER TABLE `listpengguna`
  MODIFY `id` int(60) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `range_harga`
--
ALTER TABLE `range_harga`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tipe_ban`
--
ALTER TABLE `tipe_ban`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `listmotor`
--
ALTER TABLE `listmotor`
  ADD CONSTRAINT `range_harga` FOREIGN KEY (`range_harga`) REFERENCES `range_harga` (`id`),
  ADD CONSTRAINT `tipe_ban` FOREIGN KEY (`tipe_ban`) REFERENCES `tipe_ban` (`id`);

--
-- Constraints for table `listpengguna`
--
ALTER TABLE `listpengguna`
  ADD CONSTRAINT `id_motor` FOREIGN KEY (`id_motor`) REFERENCES `listmotor` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
