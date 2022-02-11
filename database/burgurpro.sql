-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 11, 2022 at 12:59 PM
-- Server version: 5.7.24
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `burgurpro`
--

-- --------------------------------------------------------

--
-- Table structure for table `burgers`
--

CREATE TABLE `burgers` (
  `burger_id` int(255) NOT NULL,
  `burger_name` varchar(250) NOT NULL,
  `price` decimal(65,2) NOT NULL,
  `description` varchar(250) NOT NULL,
  `popularity` int(8) NOT NULL,
  `availability` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `burgers`
--

INSERT INTO `burgers` (`burger_id`, `burger_name`, `price`, `description`, `popularity`, `availability`) VALUES
(1, 'Classic Burger', '8.70', 'with baby gem salad, beef tomato, red onions, gherkin.', 5, 10),
(2, 'Beef Burgers', '11.00', 'with melted cheese, baby gem salad,beef tomato,red onions,gherkin', 5, 10),
(3, 'Turkey Burgers', '10.00', 'with melted cheese, crispy bacon and onion rings,baby gem salad\r\n', 5, 10),
(4, 'Butterfly  \r\nChicken Burger\r\n', '15.00', 'with cranberry sauce and brie cheese\r\n', 5, 10);

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `ID` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` int(8) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `administrator` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`ID`, `name`, `phone`, `email`, `address`, `password`, `administrator`) VALUES
(1, 'john', 2132132, 'awefwune@gmail.com', NULL, 'c13367945d5d4c91047b3b50234aa7ab', NULL),
(2, 'Admin', 0, 'admin@admin.com', NULL, '21232f297a57a5a743894a0e4a801fc3', 'yes'),
(3, 'awfjiawen', 21378213, 'awenfio@gmail.com', NULL, '21232f297a57a5a743894a0e4a801fc3', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_info`
--

CREATE TABLE `order_info` (
  `orderid` int(255) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_info`
--

INSERT INTO `order_info` (`orderid`, `customer_name`, `email`, `date`) VALUES
(98912, 'steve', 'awefwune@gmail.com', '2022-02-11 11:13:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `burgers`
--
ALTER TABLE `burgers`
  ADD PRIMARY KEY (`burger_id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `order_info`
--
ALTER TABLE `order_info`
  ADD PRIMARY KEY (`orderid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `burgers`
--
ALTER TABLE `burgers`
  MODIFY `burger_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `order_info`
--
ALTER TABLE `order_info`
  MODIFY `orderid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98913;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
