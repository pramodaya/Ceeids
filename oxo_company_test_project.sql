-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 20, 2019 at 05:15 AM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

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
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(5) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`) VALUES
(1, 'Call', '2018-10-15 06:03:04'),
(2, 'Email', '2018-10-15 06:03:04'),
(3, 'Mail', '2018-10-15 06:03:15'),
(4, 'Other', '2018-10-15 06:03:15');

-- --------------------------------------------------------

--
-- Table structure for table `coordinator`
--

CREATE TABLE `coordinator` (
  `uid` int(5) UNSIGNED NOT NULL,
  `sid` int(5) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `coordinator`
--

INSERT INTO `coordinator` (`uid`, `sid`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `designation`
--

CREATE TABLE `designation` (
  `did` int(5) UNSIGNED NOT NULL,
  `designation` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `designation`
--

INSERT INTO `designation` (`did`, `designation`) VALUES
(1, 'Editor');

-- --------------------------------------------------------

--
-- Table structure for table `designationreq`
--

CREATE TABLE `designationreq` (
  `drid` int(5) UNSIGNED NOT NULL,
  `designation` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `designationreq`
--

INSERT INTO `designationreq` (`drid`, `designation`) VALUES
(1, 'Head Prefect'),
(2, 'Head Prefect');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(5) UNSIGNED NOT NULL,
  `sid` int(5) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `body` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `startTime` time NOT NULL,
  `endTime` time NOT NULL,
  `slug` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `sid`, `title`, `body`, `date`, `startTime`, `endTime`, `slug`) VALUES
(1, 1, 'School Day-2018', '<p>organized by teacher\'s guild</p>', '2018-03-08', '09:00:00', '11:00:00', 'School-Day-2018');

-- --------------------------------------------------------

--
-- Table structure for table `event_student`
--

CREATE TABLE `event_student` (
  `evtid` int(5) UNSIGNED NOT NULL,
  `schoolName` varchar(100) NOT NULL,
  `cid` int(5) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `event_student_list`
--

CREATE TABLE `event_student_list` (
  `event_id` int(5) UNSIGNED NOT NULL,
  `org_id` int(5) UNSIGNED NOT NULL,
  `school` varchar(100) NOT NULL,
  `cid` int(5) UNSIGNED NOT NULL,
  `flag` int(2) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `event_student_list`
--

INSERT INTO `event_student_list` (`event_id`, `org_id`, `school`, `cid`, `flag`) VALUES
(4, 1, 'Royal College', 1, 1),
(3, 1, 'Royal College', 2, 1),
(5, 1, 'Mahanama College', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `flags`
--

CREATE TABLE `flags` (
  `flag_id` int(2) UNSIGNED NOT NULL,
  `flag` int(2) UNSIGNED NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `flags`
--

INSERT INTO `flags` (`flag_id`, `flag`, `status`) VALUES
(1, 0, 'Deleted'),
(2, 1, 'Available');

-- --------------------------------------------------------

--
-- Table structure for table `messages_to_admin`
--

CREATE TABLE `messages_to_admin` (
  `msg_id` int(255) NOT NULL,
  `sent_by` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `file_name` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messages_to_admin`
--

INSERT INTO `messages_to_admin` (`msg_id`, `sent_by`, `title`, `description`, `file_name`) VALUES
(4, 'School Admin', 'AIBS Work Shop', 'This is the student Final Report of Workshop.', 'Test.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `version` bigint(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`version`) VALUES
(14);

-- --------------------------------------------------------

--
-- Table structure for table `organizational_event`
--

CREATE TABLE `organizational_event` (
  `org_id` int(5) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `date` date DEFAULT NULL,
  `time` time NOT NULL,
  `venue` varchar(100) DEFAULT NULL,
  `flag` int(2) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `organizational_event`
--

INSERT INTO `organizational_event` (`org_id`, `name`, `description`, `date`, `time`, `venue`, `flag`) VALUES
(1, 'Edex Workshop', 'All the Students are Welcome here.', '2018-10-18', '07:03:00', 'BMICH', 1);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `lid` int(5) UNSIGNED NOT NULL,
  `cid` int(5) UNSIGNED NOT NULL,
  `uid` int(5) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `slug` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `category_id` int(100) NOT NULL,
  `body` text,
  `post_image` varchar(100) NOT NULL,
  `flag` int(2) NOT NULL DEFAULT '1',
  `edited` int(2) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`lid`, `cid`, `uid`, `title`, `slug`, `date`, `time`, `category_id`, `body`, `post_image`, `flag`, `edited`) VALUES
(1, 3, 1, 'log', 'log', '2018-10-09', '12:35:00', 1, '<p>called and responded</p>', '', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `schoolcontacts`
--

CREATE TABLE `schoolcontacts` (
  `cid` int(5) UNSIGNED NOT NULL,
  `sid` int(5) UNSIGNED NOT NULL,
  `did` int(5) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `firstName` varchar(100) NOT NULL,
  `lastName` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` int(10) DEFAULT NULL,
  `mobileOptional` int(10) DEFAULT NULL,
  `residenceNo` int(10) DEFAULT NULL,
  `residenceNoOptional` int(10) DEFAULT NULL,
  `nic` varchar(100) DEFAULT NULL,
  `passportNo` varchar(100) DEFAULT NULL,
  `address1` varchar(100) DEFAULT NULL,
  `address2` varchar(100) DEFAULT NULL,
  `address3` varchar(100) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `district` varchar(100) DEFAULT NULL,
  `alYear` varchar(100) DEFAULT NULL,
  `alStream` varchar(100) DEFAULT NULL,
  `flag` int(2) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `schoolcontacts`
--

INSERT INTO `schoolcontacts` (`cid`, `sid`, `did`, `title`, `firstName`, `lastName`, `email`, `mobile`, `mobileOptional`, `residenceNo`, `residenceNoOptional`, `nic`, `passportNo`, `address1`, `address2`, `address3`, `city`, `district`, `alYear`, `alStream`, `flag`) VALUES
(1, 1, 4, 'Mr', 'Kasup', 'Wijayardhane', 'kasup@gmail.com', 382233678, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1),
(2, 1, 4, 'Mrs', 'Amali', 'Liyanage', 'amali@gmail.com', 112345665, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1),
(3, 1, 1, 'mr', 'jaya', 'jaya', 'pramodayajayalath@gmail.com', 717354656, 717354656, 2147483647, 2147483647, '9876787678', '', 'pitipana', 'awdasd', 'maharagama', 'colombo', 'colombo', '2019', 'Maths', 1),
(4, 1, 1, 'mr', 'dsdf', 'dsfds', 'sdfs@gmail.com', 727898765, 0, 349898787, 0, '', '', 'NO 30', 'Vajira Road', 'Colombo 7', 'Kurunegala', 'Batticaloa', '2017', 'sdfdsf', 1);

-- --------------------------------------------------------

--
-- Table structure for table `schooldetails`
--

CREATE TABLE `schooldetails` (
  `sid` int(5) UNSIGNED NOT NULL,
  `schoolName` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `contactNumber` varchar(100) NOT NULL,
  `contactNumberOptional` varchar(100) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `emailOptional` varchar(100) DEFAULT NULL,
  `schoolImg` varchar(100) NOT NULL,
  `flag` int(2) NOT NULL DEFAULT '1',
  `assigned` int(1) NOT NULL DEFAULT '0',
  `schoolAdmin` int(1) NOT NULL DEFAULT '0',
  `orgType` varchar(100) DEFAULT NULL,
  `schoolType1` varchar(100) DEFAULT NULL,
  `schoolType2` varchar(100) DEFAULT NULL,
  `schoolType3` varchar(100) DEFAULT '0',
  `schoolType4` varchar(100) DEFAULT '0',
  `school1002` varchar(100) DEFAULT NULL,
  `mediumOfStudies` varchar(100) DEFAULT NULL,
  `academicProgression` varchar(100) DEFAULT NULL,
  `province` varchar(100) DEFAULT NULL,
  `district` varchar(100) DEFAULT NULL,
  `zone` varchar(100) DEFAULT NULL,
  `division` varchar(100) DEFAULT NULL,
  `address1` varchar(100) DEFAULT NULL,
  `address2` varchar(100) DEFAULT NULL,
  `address3` varchar(100) DEFAULT NULL,
  `addressCity` varchar(100) DEFAULT NULL,
  `fax` varchar(100) DEFAULT NULL,
  `faxOptional` varchar(100) DEFAULT NULL,
  `webUrl` varchar(100) DEFAULT NULL,
  `webUrlOptional` varchar(100) DEFAULT NULL,
  `typeOfOLs` varchar(100) DEFAULT NULL,
  `typeOfALs` varchar(100) DEFAULT NULL,
  `totalNumberOfStudents` varchar(100) DEFAULT NULL,
  `totalNumberOfTeachers` varchar(100) DEFAULT NULL,
  `localBioSinhala` varchar(100) DEFAULT NULL,
  `localBioEnglish` varchar(100) DEFAULT NULL,
  `localBioTamil` varchar(100) DEFAULT NULL,
  `localPhysicalSinhala` varchar(100) DEFAULT NULL,
  `localPhysicalEnglish` varchar(100) DEFAULT NULL,
  `localPhysicalTamil` varchar(100) DEFAULT NULL,
  `localCommerceSinhala` varchar(100) DEFAULT NULL,
  `localCommerceEnglish` varchar(100) DEFAULT NULL,
  `localCommerceTamil` varchar(100) DEFAULT NULL,
  `localArtsSinhala` varchar(100) DEFAULT NULL,
  `localArtsEnglish` varchar(100) DEFAULT NULL,
  `localArtsTamil` varchar(100) DEFAULT NULL,
  `localTechSinhala` varchar(100) DEFAULT NULL,
  `localTechEnglish` varchar(100) DEFAULT NULL,
  `localTechTamil` varchar(100) DEFAULT NULL,
  `londonBioEng` varchar(100) DEFAULT NULL,
  `londonPhysicalEng` varchar(100) DEFAULT NULL,
  `londonCommerceEng` varchar(100) DEFAULT NULL,
  `londonArtsEng` varchar(100) DEFAULT NULL,
  `londonTechEng` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `schooldetails`
--

INSERT INTO `schooldetails` (`sid`, `schoolName`, `city`, `contactNumber`, `contactNumberOptional`, `email`, `emailOptional`, `schoolImg`, `flag`, `assigned`, `schoolAdmin`, `orgType`, `schoolType1`, `schoolType2`, `schoolType3`, `schoolType4`, `school1002`, `mediumOfStudies`, `academicProgression`, `province`, `district`, `zone`, `division`, `address1`, `address2`, `address3`, `addressCity`, `fax`, `faxOptional`, `webUrl`, `webUrlOptional`, `typeOfOLs`, `typeOfALs`, `totalNumberOfStudents`, `totalNumberOfTeachers`, `localBioSinhala`, `localBioEnglish`, `localBioTamil`, `localPhysicalSinhala`, `localPhysicalEnglish`, `localPhysicalTamil`, `localCommerceSinhala`, `localCommerceEnglish`, `localCommerceTamil`, `localArtsSinhala`, `localArtsEnglish`, `localArtsTamil`, `localTechSinhala`, `localTechEnglish`, `localTechTamil`, `londonBioEng`, `londonPhysicalEng`, `londonCommerceEng`, `londonArtsEng`, `londonTechEng`) VALUES
(4, 'Visakha Vidyalaya', 'Colombo', '0112456365', NULL, 'vv@gmail.com', NULL, 'school.png', 1, 0, 0, 'School', 'public', 'Girls', 'National', '1AB', 'Yes', 'Sinhala English ', 'Up to A/L', 'western', 'Colombo', 'Colombo', 'Colombo Central', 'no 20', 'wajira road', 'Colombo 05', 'Colombo', '0112365698', NULL, 'www.visakhavidyalaya.lk', NULL, 'Local O/L  ', 'Local A/L  ', '8000', '600', '20', '200', '0', '200', '20', '20', '0220', '200', '200', '200', '200', '20', '020', '20', '0', '', '', '', NULL, ''),
(1, 'rock', 'sdf', '1', '', 'dsfds@gmail.com', NULL, 'a.jpg', 1, 0, 0, 'Select Organizational Type...', 'Select...', 'Select...', 'Select...', 'Select...', 'Is this 1002 School', '  ', NULL, 'Select Province...', 'Select District...', 'Select Zone...', 'Select Division...', 'sdfsd', 'sdfs', 'sdfs', '', 'None', 'None', 'None', NULL, '  ', '  ', '', '', '', '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(3, 'sdfs', 'sdfsd', '3', '', 'sfsd@gmail.com', NULL, '', 1, 0, 0, 'Select Organizational Type...', 'Select...', 'Select...', 'Select...', 'Select...', 'Is this 1002 School', '  ', NULL, 'Select Province...', 'Select District...', 'Select Zone...', 'Select Division...', 'sdfs', 'sdfsd', 'sdfd', '', 'None', 'None', 'None', NULL, '  ', '  ', '', '', '', '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(5) UNSIGNED NOT NULL,
  `userName` varchar(100) NOT NULL,
  `uid` int(5) UNSIGNED NOT NULL,
  `password` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `userName`, `uid`, `password`, `type`) VALUES
(1, 'admin', 1, '123', 'Admin'),
(2, 'schooladmin1', 2, '123', 'School Admin'),
(3, 'coordinator1', 3, '123', 'Coordinator');

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
  `imgUrl` varchar(100) NOT NULL,
  `contactNumber` varchar(100) NOT NULL,
  `flag` int(2) NOT NULL DEFAULT '1',
  `signInTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `signOutTime` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `userdetails`
--

INSERT INTO `userdetails` (`uid`, `email`, `userType`, `firstName`, `lastName`, `imgUrl`, `contactNumber`, `flag`, `signInTime`, `signOutTime`) VALUES
(1, 'kasunprageethdissanayake@gmail.com', 'Admin', 'Kasun', 'Dissanayake', 'da_vinci_s_wings_by_lostview-d99fmnp.jpg', '0711625552', 1, '2018-10-10 00:42:12', NULL),
(2, 'pramodaya@gmail.com', 'School Admin', 'Pramodaya', 'Jayalath', 'user.jpg', '0757721908', 1, '2018-10-14 02:25:50', NULL),
(3, 'thanushi@gmail.com', 'Coordinator', 'Thanushi ', 'Aluthge', 'user.jpg', '0773422345', 1, '2018-10-14 03:14:19', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sid` (`sid`);

--
-- Indexes for table `event_student`
--
ALTER TABLE `event_student`
  ADD PRIMARY KEY (`evtid`),
  ADD KEY `cid` (`cid`);

--
-- Indexes for table `event_student_list`
--
ALTER TABLE `event_student_list`
  ADD PRIMARY KEY (`event_id`),
  ADD KEY `cid` (`cid`),
  ADD KEY `org_id` (`org_id`);

--
-- Indexes for table `flags`
--
ALTER TABLE `flags`
  ADD PRIMARY KEY (`flag_id`);

--
-- Indexes for table `messages_to_admin`
--
ALTER TABLE `messages_to_admin`
  ADD PRIMARY KEY (`msg_id`);

--
-- Indexes for table `organizational_event`
--
ALTER TABLE `organizational_event`
  ADD PRIMARY KEY (`org_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`lid`),
  ADD KEY `cid` (`cid`),
  ADD KEY `uid` (`uid`);

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
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `designation`
--
ALTER TABLE `designation`
  MODIFY `did` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `designationreq`
--
ALTER TABLE `designationreq`
  MODIFY `drid` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `event_student`
--
ALTER TABLE `event_student`
  MODIFY `evtid` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `event_student_list`
--
ALTER TABLE `event_student_list`
  MODIFY `event_id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `flags`
--
ALTER TABLE `flags`
  MODIFY `flag_id` int(2) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `messages_to_admin`
--
ALTER TABLE `messages_to_admin`
  MODIFY `msg_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `organizational_event`
--
ALTER TABLE `organizational_event`
  MODIFY `org_id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `lid` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `schoolcontacts`
--
ALTER TABLE `schoolcontacts`
  MODIFY `cid` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `schooldetails`
--
ALTER TABLE `schooldetails`
  MODIFY `sid` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `userdetails`
--
ALTER TABLE `userdetails`
  MODIFY `uid` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
