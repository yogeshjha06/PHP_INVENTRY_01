-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 11, 2022 at 10:19 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nimo`
--

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `id` int(10) NOT NULL,
  `brand` varchar(30) NOT NULL,
  `uid` int(10) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`id`, `brand`, `uid`, `date`, `time`) VALUES
(2, 'yogesh jha', 1, '2009-10-22', '10:25:38'),
(3, 'usha jha', 1, '2009-10-22', '10:26:20'),
(4, 'modi', 2, '2009-10-22', '11:39:35'),
(5, 'yogi', 2, '2009-10-22', '11:39:47'),
(6, 'amit sha', 2, '2009-10-22', '11:39:54'),
(8, 'P.JHA', 1, '2010-10-22', '09:59:20'),
(9, 'modi', 3, '2010-10-22', '09:04:16'),
(11, 'yogesh', 3, '2010-10-22', '09:05:21');

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `id` int(20) NOT NULL,
  `client` varchar(30) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `uid` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`id`, `client`, `date`, `time`, `uid`) VALUES
(2, 'Adani', '2009-10-22', '11:26:47', 1),
(3, 'Adani', '2009-10-22', '11:40:28', 2),
(4, 'Ambani', '2009-10-22', '11:40:30', 2),
(5, 'Ambani', '2010-10-22', '10:00:06', 1),
(6, 'Adani', '2010-10-22', '09:06:43', 3),
(7, 'Ambani', '2010-10-22', '09:06:45', 3);

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `id` int(10) NOT NULL,
  `brand` varchar(30) NOT NULL,
  `item` varchar(30) NOT NULL,
  `amount` int(20) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `uid` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`id`, `brand`, `item`, `amount`, `date`, `time`, `uid`) VALUES
(1, 'yogesh jha', 'ball', 2, '2009-10-22', '10:30:17', 1),
(3, 'usha jha', 'bulldozer', 22, '2009-10-22', '10:30:54', 1),
(4, 'yogi', 'bulldozer', 22, '2009-10-22', '11:40:02', 2),
(5, 'modi', 'petrol', 2, '2009-10-22', '11:40:19', 2),
(6, 'P.JHA', 'ball', 2, '2010-10-22', '09:59:42', 1),
(8, 'yogesh', 'car', 22, '2010-10-22', '09:06:21', 3),
(9, 'yogesh', 'bulldozer', 2, '2010-10-22', '09:07:00', 3),
(10, 'yogesh', 'ball', 2, '2010-10-22', '09:07:07', 3);

-- --------------------------------------------------------

--
-- Table structure for table `msg`
--

CREATE TABLE `msg` (
  `id` int(20) NOT NULL,
  `msg` varchar(50) NOT NULL,
  `uid` int(10) NOT NULL,
  `email` varchar(20) NOT NULL,
  `sm` varchar(20) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `msg`
--

INSERT INTO `msg` (`id`, `msg`, `uid`, `email`, `sm`, `date`, `time`) VALUES
(6, 'hi modi g', 2, 'ykj', 'pmo', '2010-10-22', '10:07:07'),
(7, 'fine yogesh ', 1, 'pmo', 'ykj', '2010-10-22', '10:07:57'),
(8, 'hi yogesh kese ho', 3, 'ykj', 'jitu@gmail.com', '2010-10-22', '09:08:34'),
(9, 'im fine', 1, 'jitu@gmail.com', 'ykj', '2010-10-22', '09:09:33');

-- --------------------------------------------------------

--
-- Table structure for table `pur`
--

CREATE TABLE `pur` (
  `id` int(10) NOT NULL,
  `brand` varchar(30) NOT NULL,
  `item` varchar(30) NOT NULL,
  `pamount` int(20) NOT NULL,
  `uid` int(20) NOT NULL,
  `cid` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pur`
--

INSERT INTO `pur` (`id`, `brand`, `item`, `pamount`, `uid`, `cid`, `date`, `time`) VALUES
(2, 'usha jha', 'ball', 2, 1, 'Adani', '2009-10-22', '11:32:59'),
(3, 'amit sha', 'bulldozer', 22, 2, 'Ambani', '2009-10-22', '11:40:41'),
(4, 'yogesh jha', 'ball', 55, 1, 'Adani', '2010-10-22', '10:00:12'),
(5, 'yogesh jha', 'ball', 22, 1, 'Ambani', '2010-10-22', '10:00:17'),
(6, 'modi', 'car', 2, 3, 'Ambani', '2010-10-22', '09:07:31');

-- --------------------------------------------------------

--
-- Table structure for table `sale`
--

CREATE TABLE `sale` (
  `id` int(20) NOT NULL,
  `brand` varchar(30) NOT NULL,
  `item` varchar(30) NOT NULL,
  `amount` int(20) NOT NULL,
  `uid` int(20) NOT NULL,
  `cid` varchar(20) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sale`
--

INSERT INTO `sale` (`id`, `brand`, `item`, `amount`, `uid`, `cid`, `date`, `time`) VALUES
(2, 'yogesh jha', 'ball', 22, 1, 'Adani', '2009-10-22', '11:36:04'),
(3, 'yogi', 'petrol', 22, 2, 'Adani', '2009-10-22', '11:40:47'),
(4, 'P.JHA', 'ball', 2, 1, 'Ambani', '2010-10-22', '10:00:40'),
(5, 'yogesh', 'bulldozer', 2, 3, 'Ambani', '2010-10-22', '09:07:50');

-- --------------------------------------------------------

--
-- Table structure for table `signup`
--

CREATE TABLE `signup` (
  `id` int(10) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `number` int(20) NOT NULL,
  `sex` varchar(20) NOT NULL,
  `pwd` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `signup`
--

INSERT INTO `signup` (`id`, `name`, `email`, `number`, `sex`, `pwd`) VALUES
(1, 'yogesh', 'ykj', 2147483647, 'Female', '123'),
(2, 'ram', 'pmo', 4769358, 'Female', '12'),
(3, 'jitu', 'jitu@gmail.com', 4769358, 'Female', '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `msg`
--
ALTER TABLE `msg`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pur`
--
ALTER TABLE `pur`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sale`
--
ALTER TABLE `sale`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `signup`
--
ALTER TABLE `signup`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `msg`
--
ALTER TABLE `msg`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `pur`
--
ALTER TABLE `pur`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sale`
--
ALTER TABLE `sale`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `signup`
--
ALTER TABLE `signup`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
