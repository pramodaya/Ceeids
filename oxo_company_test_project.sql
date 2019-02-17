-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 19, 2018 at 05:37 AM
-- Server version: 5.7.14
-- PHP Version: 7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `oxo_company_test_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `calllog`
--

CREATE TABLE `calllog` (
  `lid` int(5) UNSIGNED NOT NULL,
  `cid` int(5) UNSIGNED NOT NULL,
  `uid` int(5) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `contactType` varchar(100) NOT NULL,
  `description` text,
  `flag` int(2) NOT NULL DEFAULT '1',
  `edited` int(2) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `coordinator`
--

CREATE TABLE `coordinator` (
  `uid` int(5) UNSIGNED NOT NULL,
  `sid` int(5) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `designation`
--

CREATE TABLE `designation` (
  `did` int(5) UNSIGNED NOT NULL,
  `designation` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `designationreq`
--

CREATE TABLE `designationreq` (
  `drid` int(5) UNSIGNED NOT NULL,
  `designation` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `version` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`version`) VALUES
(9);

-- --------------------------------------------------------

--
-- Table structure for table `schoolcontacts`
--

CREATE TABLE `schoolcontacts` (
  `cid` int(5) UNSIGNED NOT NULL,
  `sid` int(5) UNSIGNED NOT NULL,
  `did` int(5) UNSIGNED NOT NULL,
  `fullName` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contactNumber` int(10) NOT NULL,
  `flag` int(2) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `schooldetails`
--

CREATE TABLE `schooldetails` (
  `sid` int(5) UNSIGNED NOT NULL,
  `schoolName` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `flag` int(2) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `schooldetails`
--

INSERT INTO `schooldetails` (`sid`, `schoolName`, `address`, `flag`) VALUES
(1, 'royal college', '46/B abc road colombo', 1);

-- --------------------------------------------------------

--
-- Table structure for table `studentdetails`
--

CREATE TABLE `studentdetails` (
  `cid` int(5) UNSIGNED NOT NULL,
  `dateOfBirth` date NOT NULL,
  `alevelYear` int(4) NOT NULL,
  `flag` int(2) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(100) NOT NULL,
  `uid` int(5) UNSIGNED NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `uid`, `password`) VALUES
(2, 'stone', 1, '123');

-- --------------------------------------------------------

--
-- Table structure for table `userdetails`
--

CREATE TABLE `userdetails` (
  `uid` int(5) UNSIGNED NOT NULL,
  `email` text,
  `userType` varchar(100) NOT NULL,
  `firstName` varchar(100) NOT NULL,
  `lastName` varchar(100) NOT NULL,
  `flag` int(2) NOT NULL DEFAULT '1',
  `signInTime` timestamp NOT NULL,
  `signOutTime` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `userdetails`
--

INSERT INTO `userdetails` (`uid`, `email`, `userType`, `firstName`, `lastName`, `flag`, `signInTime`, `signOutTime`) VALUES
(1, 'sdfsd', 'sdf', 'sdf', 'sdfs', 1, '2018-09-18 07:06:02', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `calllog`
--
ALTER TABLE `calllog`
  ADD PRIMARY KEY (`lid`),
  ADD KEY `cid` (`cid`),
  ADD KEY `uid` (`uid`);

--
-- Indexes for table `coordinator`
--
ALTER TABLE `coordinator`
  ADD KEY `uid` (`uid`),
  ADD KEY `sid` (`sid`);

--
-- Indexes for table `designation`
--
ALTER TABLE `designation`
  ADD PRIMARY KEY (`did`);

--
-- Indexes for table `designationreq`
--
ALTER TABLE `designationreq`
  ADD PRIMARY KEY (`drid`);

--
-- Indexes for table `schoolcontacts`
--
ALTER TABLE `schoolcontacts`
  ADD PRIMARY KEY (`cid`),
  ADD KEY `sid` (`sid`),
  ADD KEY `did` (`did`);

--
-- Indexes for table `schooldetails`
--
ALTER TABLE `schooldetails`
  ADD PRIMARY KEY (`sid`);

--
-- Indexes for table `studentdetails`
--
ALTER TABLE `studentdetails`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `uid` (`uid`);

--
-- Indexes for table `userdetails`
--
ALTER TABLE `userdetails`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `calllog`
--
ALTER TABLE `calllog`
  MODIFY `lid` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `designation`
--
ALTER TABLE `designation`
  MODIFY `did` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `designationreq`
--
ALTER TABLE `designationreq`
  MODIFY `drid` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `schoolcontacts`
--
ALTER TABLE `schoolcontacts`
  MODIFY `cid` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `schooldetails`
--
ALTER TABLE `schooldetails`
  MODIFY `sid` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `studentdetails`
--
ALTER TABLE `studentdetails`
  MODIFY `cid` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `userdetails`
--
ALTER TABLE `userdetails`
  MODIFY `uid` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `calllog`
--
ALTER TABLE `calllog`
  ADD CONSTRAINT `calllog_ibfk_1` FOREIGN KEY (`cid`) REFERENCES `schoolcontacts` (`cid`) ON UPDATE CASCADE,
  ADD CONSTRAINT `calllog_ibfk_2` FOREIGN KEY (`uid`) REFERENCES `userdetails` (`uid`) ON UPDATE CASCADE;

--
-- Constraints for table `coordinator`
--
ALTER TABLE `coordinator`
  ADD CONSTRAINT `coordinator_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `userdetails` (`uid`) ON UPDATE CASCADE,
  ADD CONSTRAINT `coordinator_ibfk_2` FOREIGN KEY (`sid`) REFERENCES `schooldetails` (`sid`) ON UPDATE CASCADE;

--
-- Constraints for table `schoolcontacts`
--
ALTER TABLE `schoolcontacts`
  ADD CONSTRAINT `schoolcontacts_ibfk_1` FOREIGN KEY (`sid`) REFERENCES `schooldetails` (`sid`) ON UPDATE CASCADE,
  ADD CONSTRAINT `schoolcontacts_ibfk_2` FOREIGN KEY (`did`) REFERENCES `designation` (`did`) ON UPDATE CASCADE;

--
-- Constraints for table `studentdetails`
--
ALTER TABLE `studentdetails`
  ADD CONSTRAINT `studentdetails_ibfk_1` FOREIGN KEY (`cid`) REFERENCES `schoolcontacts` (`sid`) ON UPDATE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `userdetails` (`uid`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
