-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 26, 2021 at 01:35 PM
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
-- Database: `recipes`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `UserName` varchar(250) NOT NULL,
  `Email` varchar(250) NOT NULL,
  `Password` varchar(275) NOT NULL,
  `role_id` int(11) DEFAULT NULL,
  `Profile` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `UserName`, `Email`, `Password`, `role_id`, `Profile`) VALUES
(1, 'Admin', 'admin@admin.com', '$2y$10$Zyj4UmwEUrGwsPIEP1mE/erQpZB0CIjqRX2RaVp9fOzrjUw5Glyci', 1, NULL),
(44, 'Yamik Gandhi', 'yamikgandhi@gmail.com', '$2y$10$P59KYkjV9fuJJN6O6.n7he7uigWEGBujwR5E/i9Dcxv/5Tyw5p0UO', 2, 'image/Yamik.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(11) NOT NULL,
  `category_name` varchar(100) NOT NULL,
  `category_image` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `category_name`, `category_image`) VALUES
(7, 'Maxican-Food', 'image/Yamik.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

CREATE TABLE `food` (
  `Food_id` int(11) NOT NULL,
  `Chef_id` int(11) NOT NULL,
  `Cat_id` int(11) NOT NULL,
  `Food_Name` varchar(150) NOT NULL,
  `Food_Image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `ingredant_type`
--

CREATE TABLE `ingredant_type` (
  `type_id` int(11) NOT NULL,
  `type_name` varchar(100) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ingredant_type`
--

INSERT INTO `ingredant_type` (`type_id`, `type_name`, `id`) VALUES
(3, 'Spices', 44),
(4, 'Rices', 44);

-- --------------------------------------------------------

--
-- Table structure for table `ingremant`
--

CREATE TABLE `ingremant` (
  `Ing_id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `Food_id` int(11) NOT NULL,
  `ing_name` varchar(100) NOT NULL,
  `qty` varchar(75) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `process`
--

CREATE TABLE `process` (
  `Food_id` int(11) NOT NULL,
  `Process_id` int(11) NOT NULL,
  `Process` varchar(1500) NOT NULL,
  `Total_Time` varchar(75) NOT NULL,
  `Link` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`role_id`, `role_name`) VALUES
(1, 'Admin'),
(2, 'Chef');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admin_ibfk_1` (`role_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`Food_id`),
  ADD KEY `food_ibfk_1` (`Cat_id`),
  ADD KEY `food_ibfk_2` (`Chef_id`);

--
-- Indexes for table `ingredant_type`
--
ALTER TABLE `ingredant_type`
  ADD PRIMARY KEY (`type_id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `ingremant`
--
ALTER TABLE `ingremant`
  ADD PRIMARY KEY (`Ing_id`),
  ADD KEY `ingremant_ibfk_2` (`Food_id`),
  ADD KEY `ingremant_ibfk_1` (`type_id`);

--
-- Indexes for table `process`
--
ALTER TABLE `process`
  ADD PRIMARY KEY (`Process_id`),
  ADD KEY `process_ibfk_1` (`Food_id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `food`
--
ALTER TABLE `food`
  MODIFY `Food_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `ingredant_type`
--
ALTER TABLE `ingredant_type`
  MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `ingremant`
--
ALTER TABLE `ingremant`
  MODIFY `Ing_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `process`
--
ALTER TABLE `process`
  MODIFY `Process_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `role` (`role_id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `food`
--
ALTER TABLE `food`
  ADD CONSTRAINT `food_ibfk_1` FOREIGN KEY (`Cat_id`) REFERENCES `category` (`cat_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `food_ibfk_2` FOREIGN KEY (`Chef_id`) REFERENCES `admin` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ingredant_type`
--
ALTER TABLE `ingredant_type`
  ADD CONSTRAINT `id` FOREIGN KEY (`id`) REFERENCES `admin` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ingremant`
--
ALTER TABLE `ingremant`
  ADD CONSTRAINT `ingremant_ibfk_1` FOREIGN KEY (`type_id`) REFERENCES `ingredant_type` (`type_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ingremant_ibfk_2` FOREIGN KEY (`Food_id`) REFERENCES `food` (`Food_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `process`
--
ALTER TABLE `process`
  ADD CONSTRAINT `process_ibfk_1` FOREIGN KEY (`Food_id`) REFERENCES `food` (`Food_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
