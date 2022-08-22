-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 27, 2022 at 12:51 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `breed`
--

CREATE TABLE `breed` (
  `id` int(50) NOT NULL,
  `animal` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `breed`
--

INSERT INTO `breed` (`id`, `animal`, `name`) VALUES
(5, 'cow', 'Holestin'),
(6, 'Sheep', 'Merino'),
(7, 'dog', 'labradour');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(50) NOT NULL,
  `customername` varchar(50) NOT NULL,
  `customerpass` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `customername`, `customerpass`) VALUES
(1, 'customer', 'customer');

-- --------------------------------------------------------

--
-- Table structure for table `pigs`
--

CREATE TABLE `pigs` (
  `animalno` varchar(50) NOT NULL,
  `animalname` varchar(50) NOT NULL,
  `breed_id` int(50) NOT NULL,
  `weight` int(50) NOT NULL,
  `img` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `arrived` varchar(50) NOT NULL,
  `remark` text NOT NULL,
  `health_status` varchar(50) NOT NULL,
  `id` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pigs`
--

INSERT INTO `pigs` (`animalno`, `animalname`, `breed_id`, `weight`, `img`, `gender`, `arrived`, `remark`, `health_status`, `id`) VALUES
('ani-fms-3309', 'Cow', 5, 75, 'uploadfolder/pexels-omar-ramadan-6584814.jpg', 'male', '2022-03-02', 'cow', 'active', 6);

-- --------------------------------------------------------

--
-- Table structure for table `quarantine`
--

CREATE TABLE `quarantine` (
  `id` int(50) NOT NULL,
  `animal_no` varchar(50) NOT NULL,
  `date_q` varchar(50) NOT NULL,
  `reason` text NOT NULL,
  `breed` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `quarantine`
--

INSERT INTO `quarantine` (`id`, `animal_no`, `date_q`, `reason`, `breed`) VALUES
(0, 'ani-fms-3309', '2022-03-27', 'fever', 'Holestin');

-- --------------------------------------------------------

--
-- Table structure for table `selling`
--

CREATE TABLE `selling` (
  `id` int(11) NOT NULL,
  `animalno` varchar(50) NOT NULL,
  `animalname` varchar(50) NOT NULL,
  `breed` varchar(50) NOT NULL,
  `weight` int(50) NOT NULL,
  `price` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `selling`
--

INSERT INTO `selling` (`id`, `animalno`, `animalname`, `breed`, `weight`, `price`) VALUES
(12, 'ani-fms-3309', 'Cow', 'Holestin', 75, 5673);

-- --------------------------------------------------------

--
-- Table structure for table `sold_animal`
--

CREATE TABLE `sold_animal` (
  `customer_name` varchar(50) NOT NULL,
  `animal_no` varchar(50) NOT NULL,
  `animal_name` varchar(50) NOT NULL,
  `price` int(50) NOT NULL,
  `id` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sold_animal`
--

INSERT INTO `sold_animal` (`customer_name`, `animal_no`, `animal_name`, `price`, `id`) VALUES
('customer', 'ani-fms-285', 'zvg', 3255, 1),
('customer', 'ani-fms-3309', 'Cow', 50000, 2),
('customer', 'ani-fms-5190', 'cow', 45000, 3),
('customer', 'ani-fms-5190', 'cow', 20000, 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `breed`
--
ALTER TABLE `breed`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `name` (`name`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`,`customername`) USING BTREE;

--
-- Indexes for table `pigs`
--
ALTER TABLE `pigs`
  ADD PRIMARY KEY (`id`,`animalno`) USING BTREE,
  ADD KEY `breed_id` (`breed_id`),
  ADD KEY `animalname` (`animalname`),
  ADD KEY `animalname_2` (`animalname`),
  ADD KEY `weight` (`weight`);

--
-- Indexes for table `quarantine`
--
ALTER TABLE `quarantine`
  ADD PRIMARY KEY (`animal_no`,`id`) USING BTREE,
  ADD KEY `breed` (`breed`),
  ADD KEY `animal_no` (`animal_no`);

--
-- Indexes for table `selling`
--
ALTER TABLE `selling`
  ADD PRIMARY KEY (`id`),
  ADD KEY `animalno` (`animalno`),
  ADD KEY `weight` (`weight`),
  ADD KEY `animalname` (`animalname`),
  ADD KEY `price` (`price`),
  ADD KEY `breed` (`breed`);

--
-- Indexes for table `sold_animal`
--
ALTER TABLE `sold_animal`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `breed`
--
ALTER TABLE `breed`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pigs`
--
ALTER TABLE `pigs`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `selling`
--
ALTER TABLE `selling`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `sold_animal`
--
ALTER TABLE `sold_animal`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pigs`
--
ALTER TABLE `pigs`
  ADD CONSTRAINT `pigs_ibfk_1` FOREIGN KEY (`breed_id`) REFERENCES `breed` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `selling`
--
ALTER TABLE `selling`
  ADD CONSTRAINT `selling_ibfk_2` FOREIGN KEY (`animalname`) REFERENCES `pigs` (`animalname`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `selling_ibfk_3` FOREIGN KEY (`weight`) REFERENCES `pigs` (`weight`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `selling_ibfk_4` FOREIGN KEY (`breed`) REFERENCES `breed` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
