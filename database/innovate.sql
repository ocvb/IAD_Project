-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 23, 2022 at 05:52 AM
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
-- Database: `innovate`
--

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `course_id` int(255) NOT NULL,
  `course_name` varchar(250) NOT NULL,
  `price` decimal(65,2) NOT NULL,
  `description` varchar(255) NOT NULL,
  `course_duration` int(8) NOT NULL,
  `seats` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course_id`, `course_name`, `price`, `description`, `course_duration`, `seats`) VALUES
(1, 'AdobePhotoshop', '449.99', 'Adobe Photoshop is an extremely powerful application that\'s used by many professional photographers and designers. You can use Photoshop for almost any kind of image editing, such as touching up photos, creating high-quality graphics, and much, much more.', 3, 10),
(2, 'Creating website\r\nwith HTML5', '399.99', 'with melted cheese, baby gem salad,beef tomato,red onions,gherkin', 2, 2),
(3, 'Adobe InDesgin', '299.99', 'Adobe InDesign is a desktop publishing software application produced by Adobe Systems. It \r\ncan be used to create works such as posters, flyers, brochures, magazines, newspapers, \r\npresentations, books and eBooks.', 3, 3),
(4, 'Swift programming\r\n', '699.99', 'Swift is a powerful and intuitive programming language for macOS, iOS, watchOS and \r\ntvOS. Writing Swift code is interactive and fun, the syntax is concise yet expressive, and \r\nSwift includes modern features developers love.', 4, 3);

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `regid` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `course` int(18) NOT NULL,
  `email` varchar(255) NOT NULL,
  `hp_no` int(8) NOT NULL,
  `reg_date` datetime DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `administrator` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`regid`, `name`, `course`, `email`, `hp_no`, `reg_date`, `password`, `administrator`) VALUES
(1, 'john', 0, 'awefwune@gmail.com', 2132132, NULL, 'c13367945d5d4c91047b3b50234aa7ab', NULL),
(2, 'Admin', 0, 'admin@admin.com', 0, NULL, '81dc9bdb52d04dc20036dbd8313ed055', 'yes'),
(3, 'awfjiawen', 0, 'awenfio@gmail.com', 21378213, NULL, '21232f297a57a5a743894a0e4a801fc3', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_info`
--

CREATE TABLE `order_info` (
  `orderid` int(255) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
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
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`regid`);

--
-- Indexes for table `order_info`
--
ALTER TABLE `order_info`
  ADD PRIMARY KEY (`orderid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `course_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `regid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `order_info`
--
ALTER TABLE `order_info`
  MODIFY `orderid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98913;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
