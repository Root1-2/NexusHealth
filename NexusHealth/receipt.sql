-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 27, 2024 at 01:05 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nexushealth`
--

-- --------------------------------------------------------

--
-- Table structure for table `receipt`
--

CREATE TABLE `receipt` (
  `orderID` int(255) NOT NULL,
  `orderBuyer` varchar(255) NOT NULL,
  `items` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `receipt`
--

INSERT INTO `receipt` (`orderID`, `orderBuyer`, `items`) VALUES
(1, 'admin', ' [{\"medName\":\"Cevion\",\"medPrice\":72,\"quantity\":1},{\"medName\":\"U\",\"medPrice\":50,\"quantity\":1}]'),
(3, 'admin', ' [{\"medName\":\"Cevion\",\"medPrice\":72,\"quantity\":1},{\"medName\":\"U\",\"medPrice\":50,\"quantity\":1}]'),
(4, 'admin', ' [{\"medName\":\"Cevion\",\"medPrice\":72,\"quantity\":1},{\"medName\":\"U\",\"medPrice\":50,\"quantity\":1}]'),
(5, 'admin', ' [{\"medName\":\"Napa\",\"medPrice\":10,\"quantity\":3}]'),
(6, 'abd123', ' [{\"medName\":\"Napa\",\"medPrice\":10,\"quantity\":3}]'),
(7, 'abd123', ' [{\"medName\":\"Napa\",\"medPrice\":10,\"quantity\":3}]'),
(8, 'abd123', ' [{\"medName\":\"Napa\",\"medPrice\":10,\"quantity\":3}]'),
(9, 'abd123', ' [{\"medName\":\"Ceevit\",\"medPrice\":10,\"quantity\":6}]'),
(10, 'admin', ' [{\"medName\":\"U\",\"medPrice\":50,\"quantity\":2}]');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `receipt`
--
ALTER TABLE `receipt`
  ADD PRIMARY KEY (`orderID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `receipt`
--
ALTER TABLE `receipt`
  MODIFY `orderID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
