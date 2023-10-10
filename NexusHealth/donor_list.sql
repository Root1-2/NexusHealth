-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 10, 2023 at 05:12 PM
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
-- Table structure for table `donor_list`
--

CREATE TABLE `donor_list` (
  `id` int(255) NOT NULL,
  `Name` varchar(25) DEFAULT NULL,
  `BloodGroup` varchar(255) DEFAULT NULL,
  `Phone number` varchar(15) DEFAULT NULL,
  `Address` varchar(48) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `donor_list`
--

INSERT INTO `donor_list` (`id`, `Name`, `BloodGroup`, `Phone number`, `Address`) VALUES
(1, 'Mahbub Khandakar', 'B+', '01872210075', 'PathanTula , Sylhet'),
(2, 'md abdus salam shanto', 'O+', '01715930563', '27/1 Chowkidekhi, sylhet , Bangladesh'),
(3, 'Syed Tanzim Ahmed', 'A-', '01745583607', NULL),
(4, 'Tasnim Tabassum Fahrin', 'O+', '01739735343', 'Housing state Len 2'),
(5, 'Arifun Nobi Chowdhury', 'O+', '01612314455', 'Sagor -04 Sagor digir par'),
(6, 'Md Ashraf Ahmed', 'O+', '01719569951', 'Shajalal Uposhahar. Road:03, block E house no:67'),
(7, 'Radwan Rahman', 'O+', '01612082965', 'Prottoy-91/B,Doptoripara,Raynagor,Sylhet'),
(8, 'Mahira mahjabin nowme', 'O+', '01704047150', '27/3 Jalalabad,sylhet'),
(9, 'SB JOYNUR', 'O+', '01842484854', 'Sylhet Sadar'),
(10, 'Rajon Talukdar', 'B+', '+8801641-215140', 'Chowkidekhi, Sylhet'),
(11, 'Israth Chowdhury', 'O+', '01775396511', 'Dariapara,Sylhet'),
(12, 'Jahidul Alam Khan Shaon', 'O+', '01611485253', 'Bondor Bazar, Sylhet.'),
(13, 'Nushrath Momita Hussain', 'B+', '01741444961', 'Baluchor , Sylhet'),
(14, 'Tushar Sinha', 'A+', '01789450891', 'Noyabazar, Baluchor'),
(15, 'Fatheha ahmed.', 'B+', '01784424597', 'shahporan.'),
(16, 'Meraj Tahmed', 'B+', '01641213930', 'Shibgonj,sylhet'),
(17, 'Abdur Rahman Rifat', 'A+', '01872545145', NULL),
(18, 'Arup Saha', 'O+', '01703889336', 'Shibganj, sylhet'),
(19, 'Jawda Anan', 'B+', '01716965371', 'Kharadipara anando-38 korimullah house sylhet'),
(20, 'Abhishek Chowdhury', 'A+', '01842376477', '84/A Evergreen Roynogor,Bangladesh'),
(21, 'Argho Bhowmick', 'AB+', '01843341056', 'Kalibari,Modina Market, sylhet.'),
(22, 'Himel kor', 'B+', '01736218074', 'Rikaibibazar,sylhet\n\n'),
(23, 'Eyamin Ahmed Eyahan', 'B+', '+8801722131973', 'Sylhet,Nayashork'),
(24, 'Nazmul Hasan mahady', 'AB+', '+8801875228972', 'Bateshwar,jalalabad,Sylhet'),
(25, 'Jahed Hasan', 'A+', '01772762638', 'Focus 264 north baluchor, al islah'),
(26, 'Joynal Abedin Quraishi', 'B+', '01772280698', 'Shemoli, Mejortila'),
(27, 'Robin Chowdhury', 'B+', '01747275224', 'Bangladesh'),
(28, 'ABDUN NUR', 'B+', '01903049583', 'majortila\nNurpur'),
(29, 'Samapti', 'O+', '01727236608', 'Akhaliya sylhet'),
(30, 'Borna Bhowmik', 'B+', '01765422841', 'Subidbazar, Sylhet'),
(31, 'Puspo Gondha Paul', 'O+', '01624285553', 'Bahar das para, Khadim nagar, Sylhet'),
(32, 'Amit Chandra Joy', 'B+', '01640464080', 'Sylhet'),
(33, 'Sahnaj Sharmin Surovi', 'O+', '01763456204', 'Railway staff quater 31T/A sylhet'),
(34, 'Turjya Bhattacharjee', 'AB+', '01761522881', 'Modina market'),
(35, 'Muhiminul Islam Chowdhury', 'O+', '01726332440', 'Subidbazar,\nSylhet'),
(36, 'Lingkon Paul', 'A+', NULL, NULL),
(37, 'Haffatun Jannat Shifa', 'A+', '01625562448', 'Chalibandar'),
(38, 'Pallab Bagchi', 'O+', '01586085208', 'Tilaghor'),
(39, 'Azizul Haque', 'A-', '01717297784', 'Mirboxtula'),
(40, 'Md. Yasin Ahmed Mahi', 'B+', '+8801784305336', 'South Surma, Sylhet, Bangladesh.'),
(41, 'Md Sumon Hossain Khan', 'AB+', '01646819343', 'House no. 1, Road no. 1, Arambag, Sylhet'),
(42, 'Niyaz Ahmad Khan', 'A+', '01787617564', 'North Baluchor, Sylhet.'),
(43, 'Md Abdur Rahman Salman', 'B+', '01999007169', 'Moglabazar, South Surma, Sylhet'),
(44, 'KORON CHOWDHURY', 'O+', '01753916614', 'Korerpara, Pathantula, Sylhet.'),
(45, 'Azuad Islam Ruhan', 'A+', '01647637157', 'Pirer bazar, Sadar,Sylhet.'),
(46, 'Moumita Roy', 'O+', '01706367397', 'Shubanighat, Sylhet'),
(47, 'Nazmul islam', 'O+', '01858299766', 'Biswanath Sylhet'),
(48, 'Imran', 'O+', '01725113449', 'Boteshwar Bazar,Sylhet'),
(49, 'Prohor Paul', 'B+', '01757028666', 'Machudighir par, Mirzajangal Road'),
(50, 'Avijit Deb Turjo', 'O+', '01756923736', 'Bagbari, Sylhet'),
(51, 'Tasnim Tisha', 'O+', '01816510391', 'Shahporan'),
(52, 'Fahim Sawkat', 'AB+', '01725938558', 'Baluchar, sylhet'),
(53, 'Sumaiya Islam Sumi', 'B+', '01328342309', 'Lamabazar, Sylhet'),
(54, 'Nur a jannat shuchi', 'A+', '01708391808', 'Sylhet Cantonment,Sylhet'),
(55, 'Enamul Haque', 'A+', '01704483069', 'Mirabazar,Sylhet'),
(56, 'Jarin Akther Salvi', 'O+', '01540-084774', 'Tilagor'),
(57, 'Mahera Moshika Chowdhury', 'O+', '01832989442', 'Fulbari,golapgonj,sylhet'),
(58, 'Momtaj Rahman Mim', 'B+', '01837168460', 'Modhusohid medical road'),
(59, 'Marufa Akter Humayra', 'B+', '1319388733', 'Patanthula'),
(60, 'Arpi Akter', 'B+', '01307424622', 'Botessor sylhet'),
(61, 'Adnan', 'O+', '01724926802', 'Tilagor Mirapara'),
(62, 'Tashfia Hussain', 'O+', '01855770941', 'Shabok-86, Raynogor, Dorjipara, Sylhet.'),
(63, 'Shotarupa deb nath shruti', 'O+', '01304760841', '16no.Rongdhonu,chowkideki, Sylhet');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `donor_list`
--
ALTER TABLE `donor_list`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `donor_list`
--
ALTER TABLE `donor_list`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
