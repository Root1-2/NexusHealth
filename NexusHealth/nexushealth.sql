-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 08, 2023 at 08:44 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

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
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `id` int(255) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `userName` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `pNumber` varchar(255) NOT NULL,
  `dob` varchar(255) NOT NULL,
  `weight` varchar(255) NOT NULL,
  `height` varchar(255) NOT NULL,
  `sex` varchar(255) NOT NULL,
  `bloodGroup` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `verifytoken` varchar(255) NOT NULL,
  `verifystatus` int(255) NOT NULL DEFAULT 0 COMMENT '0 = No\r\n1 = Yes',
  `profilepic` varchar(255) NOT NULL DEFAULT '../ProfilePictures/Default.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`id`, `firstName`, `lastName`, `userName`, `email`, `pass`, `pNumber`, `dob`, `weight`, `height`, `sex`, `bloodGroup`, `address`, `city`, `verifytoken`, `verifystatus`, `profilepic`) VALUES
(1, 'Abdullah Al', 'Masrur', 'abd123', 'abdullahalmasrur8@gmail.com', '#12345Abd', '01621030725', '2000-05-29', '51kg', '511', 'Male', 'AB+', 'Sylhet, Bangladesh', 'Sylhet', '859c0deca36fdfcb7819abdf79a0ae3d', 0, '../ProfilePictures/Default.jpg'),
(2, 'Jafrul Haque', 'rafi', 'rafi123', 'jafrulhaque99@gmail.com', '#12345Rafi', '01797224414', '1999-09-10', '63kg', '56', 'Male', 'A+', 'Sylhet, Bangladesh', 'Sylhet', '78b0da8a5363ca3e7915cdfd80cb56d6', 1, '../ProfilePictures/Default.jpg'),
(3, 'Test', 'Test', 'test123', 'test4@gmail.com', 'Test123#', '01621030725', '2023-07-26', '70kg', '56', 'Male', 'AB+', 'Sylhet', 'Sylhet', 'bc6ac2f5db788cd92cfc1db9f4ee9ebe', 0, '../ProfilePictures/Default.jpg'),
(4, 'Abdullah Al', 'Masrur', 'abd1234', 'cse_2012020255@lus.ac.bd', '#12345Abd', '01621030725', '2000-05-29', '51kg', '4 2', 'Male', 'AB+', 'Sylhet, Bangladesh', 'Sylhet', '9e4977b9f16e87b3d29cd371dcc87c67', 0, '../ProfilePictures/Default.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
