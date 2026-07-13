-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 09, 2024 at 07:39 AM
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
-- Database: `ecomplaint`
--

-- --------------------------------------------------------

--
-- Table structure for table `complaint_detail`
--

CREATE TABLE `complaint_detail` (
  `complaint_id` int(20) NOT NULL,
  `complaint` varchar(220) NOT NULL,
  `username` varchar(220) NOT NULL,
  `city` varchar(20) NOT NULL,
  `photo` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `complaint_detail`
--

INSERT INTO `complaint_detail` (`complaint_id`, `complaint`, `username`, `city`, `photo`) VALUES
(1, 'Hello', 'Kalathiya Kirtan ', 'Ahmedbad', '');

-- --------------------------------------------------------

--
-- Table structure for table `officer_detail`
--

CREATE TABLE `officer_detail` (
  `uid` int(100) NOT NULL,
  `fullname` varchar(120) NOT NULL,
  `email` varchar(20) NOT NULL,
  `branch` varchar(20) NOT NULL,
  `position` varchar(10) NOT NULL,
  `joining_date` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `officer_detail`
--

INSERT INTO `officer_detail` (`uid`, `fullname`, `email`, `branch`, `position`, `joining_date`) VALUES
(11, 'Manish', 'manish123@gmail.com', 'Bhavnagar', 'Officer', '2024-02-09'),
(12, 'Kirtan Kalathiya', 'kirtan.glsbca20@gmai', 'Botad', 'Water Offi', '2024-02-09');

-- --------------------------------------------------------

--
-- Table structure for table `user_master`
--

CREATE TABLE `user_master` (
  `uid` int(20) NOT NULL COMMENT 'This will store\r\nuser id.',
  `fullname` varchar(120) NOT NULL COMMENT 'This will store\r\nuser full name.',
  `email` varchar(120) NOT NULL COMMENT 'This will store\r\nuser email.',
  `pwd` varchar(220) NOT NULL COMMENT 'This will store\r\nuser\r\npassword.',
  `user_level` int(10) NOT NULL COMMENT 'This will store\r\nuser level.This will store\r\nuser level.This will store\r\nuser level.1 - admin,0 - Employe)',
  `branch` varchar(60) NOT NULL COMMENT 'This will store\r\nbranch of\r\nuser.',
  `position` varchar(30) NOT NULL COMMENT 'This will store\r\nuser position.',
  `photo` varchar(220) NOT NULL COMMENT 'This will store\r\nuser photo.',
  `joining_date` date NOT NULL COMMENT 'This will store\r\nuser joining\r\ndate.',
  `dt` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT 'This will store\r\ncreated date',
  `modt` datetime NOT NULL COMMENT 'This will store\r\nlast modified\r\ndate'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_master`
--

INSERT INTO `user_master` (`uid`, `fullname`, `email`, `pwd`, `user_level`, `branch`, `position`, `photo`, `joining_date`, `dt`, `modt`) VALUES
(22, 'Jack', 'admin@demo.com', '9e285ef5f34736cb0c949511d94046d3', 0, 'Ahmedbad', '', '1707384782.jpg', '2024-02-10', '2024-02-08 17:07:51', '2022-08-31 12:29:01'),
(23, 'Kalathiya Kirtan ', 'kalathiyakirtan118@gmail.com', 'e7c6274a16b207ddd8906b19ef1339f8', 1, 'Ahmedbad', 'Employee', '1681909459.png', '2023-03-01', '2023-04-19 13:04:18', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `complaint_detail`
--
ALTER TABLE `complaint_detail`
  ADD PRIMARY KEY (`complaint_id`),
  ADD KEY `hardware_id` (`complaint_id`);

--
-- Indexes for table `officer_detail`
--
ALTER TABLE `officer_detail`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `user_master`
--
ALTER TABLE `user_master`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `complaint_detail`
--
ALTER TABLE `complaint_detail`
  MODIFY `complaint_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `officer_detail`
--
ALTER TABLE `officer_detail`
  MODIFY `uid` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user_master`
--
ALTER TABLE `user_master`
  MODIFY `uid` int(20) NOT NULL AUTO_INCREMENT COMMENT 'This will store\r\nuser id.', AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
