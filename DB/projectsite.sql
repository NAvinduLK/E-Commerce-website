-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 28, 2021 at 07:39 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projectsite`
--
CREATE DATABASE IF NOT EXISTS `projectsite` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `projectsite`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `A_ID` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `admin_userName` varchar(100) NOT NULL,
  `admin_password` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`A_ID`, `name`, `admin_userName`, `admin_password`) VALUES
(1, 'Isuru Pradeep', 'Isuru', 'isuru123');

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `ID` int(11) NOT NULL,
  `item_name` varchar(100) NOT NULL,
  `brand_name` varchar(100) NOT NULL,
  `ram` int(11) NOT NULL,
  `storage` int(11) NOT NULL,
  `battery` varchar(100) NOT NULL,
  `display` varchar(100) NOT NULL,
  `price` double NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`ID`, `item_name`, `brand_name`, `ram`, `storage`, `battery`, `display`, `price`, `image`) VALUES
(1, 'iPhone 13 Pro Max', 'Apple', 8, 512, '4000mAh', '6 inch', 500000, 'iphone13promax.png'),
(2, 'iPhone 13 Pro', 'Apple', 8, 256, '4000mAh', '5.6 inch', 450000, 'iphone13pro.png'),
(3, 'iPhone 13 mini', 'Apple', 6, 128, '3500mAh', '5 inch', 250000, 'iphone13mini.png'),
(4, 'Samsung S21 Ultra', 'Samsung', 12, 512, '5000mAh', '6.3 inch', 255000, 'samsungs21ultra.png'),
(5, 'Redmi 9', 'Redmi', 4, 64, '5020mah', '6 inch', 32000, 'redmi9.png'),
(29, 'Samsung Galaxy ZFold 3', 'Samsung', 8, 256, '6000mAh', '8.5 inch', 450000, 'ZFold3_Carousel_MainSingleKVDT-765x465.jpg'),
(34, 'Poco Phone M3', 'Poco', 4, 128, '6000mAh', '6.53 inch', 450000, 'Xiaomi-Poco-M3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `username` varchar(150) NOT NULL,
  `address` varchar(150) NOT NULL,
  `phone` int(11) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(150) NOT NULL,
  `propic` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `username`, `address`, `phone`, `email`, `password`, `propic`) VALUES
(11, 'Navindu', 'Matara', 712196347, 'navindu99v@gmail.com', '2020', '1616489011428-01.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`A_ID`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `A_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
