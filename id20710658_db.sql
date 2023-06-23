-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 23, 2023 at 05:07 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id20710658_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `demotable`
--

CREATE TABLE `demotable` (
  `Id` int(11) NOT NULL,
  `UserLogoutTime` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `demotable`
--

INSERT INTO `demotable` (`Id`, `UserLogoutTime`) VALUES
(1, '09:45 PM');

-- --------------------------------------------------------

--
-- Table structure for table `user1`
--

CREATE TABLE `user1` (
  `id` int(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email2` varchar(50) DEFAULT NULL,
  `mobileno` int(10) DEFAULT NULL,
  `mobileno2` int(10) DEFAULT NULL,
  `masjidname` varchar(250) NOT NULL,
  `address` varchar(250) NOT NULL,
  `city` varchar(50) NOT NULL,
  `zipcode` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `addresslink` varchar(250) NOT NULL,
  `fajr` varchar(50) DEFAULT NULL,
  `zohar` varchar(200) DEFAULT NULL,
  `asr` varchar(200) DEFAULT NULL,
  `maghrib` varchar(200) DEFAULT NULL,
  `isha` varchar(200) DEFAULT NULL,
  `juma` varchar(200) DEFAULT NULL,
  `forladies` varchar(50) NOT NULL,
  `timestamp` time DEFAULT NULL,
  `reset_token` varchar(250) DEFAULT NULL,
  `reset_expiry` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user1`
--

INSERT INTO `user1` (`id`, `username`, `email`, `password`, `email2`, `mobileno`, `mobileno2`, `masjidname`, `address`, `city`, `zipcode`, `state`, `addresslink`, `fajr`, `zohar`, `asr`, `maghrib`, `isha`, `juma`, `forladies`, `timestamp`, `reset_token`, `reset_expiry`) VALUES
(2, 'ahbabmasjid', 'ahbabmasjid@gmail.com', '1', NULL, NULL, NULL, 'Masjid Ahbab Colony', 'Ahbab colony, near Pension Nagar', 'Nagpur', '440013', 'Maharashtra', 'https://goo.gl/maps/2g2QYKZYxGAsbNHC7', '00:00:00', '01:30 AM', '05:15 AM', '06:50 AM', '08:30 AM', '01:30 AM', 'No', '01:25:21', NULL, ''),
(3, 'salafiah', 'salafiah@gmail.com', '1', NULL, NULL, NULL, 'Darul Uloom Salafiah Masjid', 'In front of Suri Lawn, New Ahbab Colony', 'Nagpur', '440013', 'Maharashtra', 'https://goo.gl/maps/5i6GKtiQHmuYR41z5', '00:00:00', '01:10 PM', '04:15 PM', '06:45 PM', '08:30 PM', '01:10 PM', 'Yes', '03:34:17', NULL, ''),
(4, 'madina', 'madina@gmail.com', '1', NULL, NULL, NULL, 'Madina Masjid', 'Anant Nagar', 'Nagpur', '440013', 'Maharashtra', 'https://goo.gl/maps/pCuyCoMfdk5ryvMu6', '00:00:00', '01:30 PM', '05:00 PM', '06:45 PM', '08:15 PM', '01:30 PM', 'No', '03:34:17', NULL, ''),
(5, 'sadarjamamasjid', 'sadar@gmail.com', '1', NULL, NULL, NULL, 'Sadar Jama Masjid', 'Opp-Karachi Shopping Centre, Sadar Bazar Main Rd, Sadar', 'Nagpur', '440001', 'Maharashtra', 'https://goo.gl/maps/xgvmM4TdgK3eLFjZ7', '00:00:00', '01:15 PM', '05:00 PM', '06:45 PM', '08:15 PM', '01:45 PM', 'No', '03:34:17', NULL, ''),
(6, 'walidain', 'mad.hammer09@gmail.com', '2', NULL, NULL, NULL, 'Masjid-e-Walidain Muslims Masjid', 'Behind Shyam lawn, Mear Rathore Layout', 'Nagpur', '440013', 'Maharashtra', 'https://goo.gl/maps/96B3z5W1WqzrkWAH8', NULL, NULL, NULL, NULL, NULL, NULL, 'Yes', '00:06:35', 'fz8vzGjrTLMkjhxBHHITr0vg3F1xMfV7', '2023-06-14 21:35:45'),
(8, 'check1', 'saifurrahmansheikh7@gmail.com', '3', '', 1234567890, 2147483647, 'checkname', 'check address', 'Mumbai', '440000', 'Maharashtra', 'linkkkkkk', '05:30:00', '01:30 PM', '05:00 PM', '07:00 PM', '08:45 PM', '01:15 PM', 'No', '17:33:31', 'rpCCC7T1ENrjG88jK1g58hTJY7BxwEHi', '2023-06-14 18:28:33'),
(9, 'Check2', 'Checking@gmail.com', '1', 'Checking2@gmail.com', 1111111111, 0, 'Check2Masjid', 'Adddddd', 'N', 'N', 'N', 'N', '00:00:00', '12:00 PM', '12:00 PM', '12:00 PM', '01:00 PM', '02:00 PM', 'N', '04:13:13', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `demotable`
--
ALTER TABLE `demotable`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `user1`
--
ALTER TABLE `user1`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `demotable`
--
ALTER TABLE `demotable`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user1`
--
ALTER TABLE `user1`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
