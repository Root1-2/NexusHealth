-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 08, 2024 at 02:01 PM
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
-- Table structure for table `medcorner`
--

CREATE TABLE `medcorner` (
  `id` int(255) NOT NULL,
  `medname` varchar(255) NOT NULL,
  `medgroup` varchar(255) NOT NULL,
  `medcategory` varchar(255) NOT NULL,
  `medcompany` varchar(255) NOT NULL,
  `medprice` varchar(255) NOT NULL,
  `medpic` varchar(255) NOT NULL DEFAULT '../Medphotos/default.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `medcorner`
--

INSERT INTO `medcorner` (`id`, `medname`, `medgroup`, `medcategory`, `medcompany`, `medprice`, `medpic`) VALUES
(1, 'Napa', 'Paracetamol', 'OTC Medicine', 'Beximco Pharmaceuticals Ltd.', '10', '../Medphotos/napa.jpg'),
(2, 'Ceevit', 'vitamin c', 'OTC Medicine', 'Square Pharmaceuticals Ltd.', '10', '../Medphotos/ceevit.jpg\r\n'),
(3, 'U & ME Long Love Condoms\r\n', 'Condom\r\n', 'Sexual Wellness', 'Social Marketing Company', '50', '../Medphotos/u&me.png'),
(4, 'Cevion 1000 mg', 'vitamin c', 'OTC Medicine', 'Healthcare Pharmaceuticals Ltd.', '72', '../MedPhotos/cevion.png'),
(5, 'Freedom Heavy Flow Wings16 Pads', 'Sanitary Napkin', 'Women choice', 'ACI Limited', '190', '../MedPhotos/Freedom Heavy Flow Wings16 Pads.png'),
(6, 'NovoFine Needle3 ml', 'Pen Needle', 'Diabetic Care', 'Mundipharma (BD) Pvt. Ltd.', '12.50', '../MedPhotos/NovoFine Needle3 ml.png'),
(7, 'NeoCare Baby Wipes120', 'Wipes', 'Baby Care', 'Incepta Pharmaceuticals Ltd.', '223.25', '../MedPhotos/NeoCare Baby Wipes120.png'),
(8, 'Orostar Plus250 ml', 'Mouthwash', 'Dental Care', 'Square Pharmaceuticals Ltd.', '135.00', '../MedPhotos/Orostar Plus250 ml.png'),
(9, 'Hexisol250 ml', 'Hand Rub', 'Personal Care', 'ACI Limited', '126.00', '../MedPhotos/Hexisol250 ml.png'),
(10, 'ThermometerDigital', 'Digital', 'Devices', 'Mundipharma (BD) Pvt. Ltd.', '185.50', '../MedPhotos/ThermometerDigital.png'),
(11, 'Sergel 20 mg', 'Capsule', 'Prescription Medicine', 'Healthcare Pharmacuticals Ltd.', '6.30', '../MedPhotos/Sergel 20 mg.png'),
(12, 'Fexo', 'Tablet', 'Prescription Medicine', 'Square Pharmaceuticals Ltd.', '12', '../MedPhotos/Fexo.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `medcorner`
--
ALTER TABLE `medcorner`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `medcorner`
--
ALTER TABLE `medcorner`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
