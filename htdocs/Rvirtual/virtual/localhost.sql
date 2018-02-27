-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 26, 2018 at 04:23 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `codeit`
--
CREATE DATABASE IF NOT EXISTS `codeit` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `codeit`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `aid` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`aid`, `username`, `email`, `password`) VALUES
(1, 'rohan', 'rohan@123', 'pass');

-- --------------------------------------------------------

--
-- Table structure for table `codedb`
--

CREATE TABLE `codedb` (
  `id` int(11) NOT NULL,
  `code` varchar(1000) NOT NULL,
  `code1` text NOT NULL,
  `pbName` varchar(255) NOT NULL,
  `pbStat` text NOT NULL,
  `ips1` text NOT NULL,
  `expop1` text NOT NULL,
  `expop2` text NOT NULL,
  `expop3` text NOT NULL,
  `expop4` text NOT NULL,
  `ips2` text NOT NULL,
  `ips3` text NOT NULL,
  `ips4` text NOT NULL,
  `diff` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `codedb`
--

INSERT INTO `codedb` (`id`, `code`, `code1`, `pbName`, `pbStat`, `ips1`, `expop1`, `expop2`, `expop3`, `expop4`, `ips2`, `ips3`, `ips4`, `diff`) VALUES
(18, '#include<stdio.h>\r\nvoid add();\r\nint a=10,b=10,c=10;\r\nvoid main()\r\n{\r\n    add();\r\n}\r\n    ', 'void add()\r\n{\r\n    scanf(\"%d\",&a);\r\n    printf(\"%d\",a+b);\r\n}\r\n    ', 'kjhnjk', 'nmnm', '10', '20', '59', '-38', '-4343222', '49', '-48', '-4343232', 100);

-- --------------------------------------------------------

--
-- Table structure for table `userdata`
--

CREATE TABLE `userdata` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `qid` int(11) NOT NULL,
  `solved` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userdata`
--

INSERT INTO `userdata` (`id`, `uid`, `qid`, `solved`) VALUES
(7, 30, 18, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `uid` int(11) NOT NULL,
  `uname` varchar(255) NOT NULL,
  `uemail` varchar(255) NOT NULL,
  `upass` varchar(255) NOT NULL,
  `done` int(3) NOT NULL,
  `points` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `uname`, `uemail`, `upass`, `done`, `points`) VALUES
(28, 'rohan ', 'rohanabk123@hotmail.com', 'rohanabk', 1, 25),
(29, 'newuser user', 'newuser@12', 'newuser12', 1, 50),
(30, 'rohan', 'rohan@123', 'rohan12345', 1, 125);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`aid`),
  ADD UNIQUE KEY `aid` (`aid`);

--
-- Indexes for table `codedb`
--
ALTER TABLE `codedb`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `userdata`
--
ALTER TABLE `userdata`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uid`),
  ADD UNIQUE KEY `id` (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `aid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `codedb`
--
ALTER TABLE `codedb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `userdata`
--
ALTER TABLE `userdata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
