-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 14, 2017 at 12:03 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `oj`
--
CREATE DATABASE IF NOT EXISTS `oj` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `oj`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(10) NOT NULL,
  `fname` varchar(30) NOT NULL,
  `srname` varchar(30) NOT NULL,
  `pword` varchar(32) NOT NULL,
  `username` varchar(40) NOT NULL,
  `email` varchar(200) NOT NULL,
  `imgln` varchar(10000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `fname`, `srname`, `pword`, `username`, `email`, `imgln`) VALUES
(1, 'Vaibhav', 'Agarwal', '71709241b5cb11e8ed8809b26a7d73d3', 'vaibhav', 'vaibhavagarwl220@s', 'imgprof/IMG_20150615_134817.jpg'),
(2, 'ADMIN', 'ACCOUNT', '71709241b5cb11e8ed8809b26a7d73d3', 'adminac', 'admin@codespace.com', 'imgprof/icon.png');

-- --------------------------------------------------------

--
-- Table structure for table `cboard`
--

CREATE TABLE `cboard` (
  `id` int(10) NOT NULL,
  `cid` varchar(20) NOT NULL,
  `uid` int(5) NOT NULL,
  `score` int(10) NOT NULL DEFAULT '0',
  `sttime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `contests`
--

CREATE TABLE `contests` (
  `id` int(11) NOT NULL,
  `cid` varchar(20) NOT NULL,
  `name` varchar(200) NOT NULL,
  `stime` time NOT NULL,
  `etime` time NOT NULL,
  `sdate` date NOT NULL,
  `edate` date NOT NULL,
  `noti` int(5) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contests`
--

INSERT INTO `contests` (`id`, `cid`, `name`, `stime`, `etime`, `sdate`, `edate`, `noti`) VALUES
(3245, 'nov2016', 'Nov Long challenge 2016', '00:00:01', '23:59:59', '2016-11-01', '2016-11-10', 0),
(3246, 'utkarsh2016', 'Utkarsh 2016', '21:00:00', '23:59:59', '2016-11-15', '2016-11-15', 0),
(3247, 'novquicktest', 'Nov Quick Test ', '14:37:00', '17:00:00', '2016-11-19', '2016-11-19', 1),
(3248, 'nov tea time ', 'nov 2016 tea time', '17:00:00', '20:00:00', '2016-11-28', '2016-11-28', 0),
(3249, 'codemarathon2016', 'Code marathon 2016', '00:00:00', '23:58:59', '2016-11-19', '2016-11-19', 0);

-- --------------------------------------------------------

--
-- Table structure for table `keptin`
--

CREATE TABLE `keptin` (
  `id` int(11) NOT NULL,
  `cid` varchar(20) NOT NULL,
  `score` int(11) NOT NULL,
  `qid` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `keptin`
--

INSERT INTO `keptin` (`id`, `cid`, `score`, `qid`) VALUES
(13, 'novquicktest', 100, 'LUE'),
(14, 'novquicktest', 100, 'INTEST'),
(24, 'codemarathon2016', 100, 'klp'),
(25, 'codemarathon2016', 100, 'das'),
(26, 'codemarathon2016', 100, 'lf');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `qid` varchar(100) NOT NULL,
  `qname` varchar(200) NOT NULL,
  `inpln` varchar(1000) NOT NULL,
  `outln` varchar(1000) NOT NULL,
  `qln` varchar(1000) NOT NULL,
  `tl` int(11) NOT NULL,
  `pbau` varchar(50) NOT NULL,
  `pbte` varchar(50) NOT NULL,
  `dadd` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `editorial` varchar(2000) NOT NULL,
  `cid` varchar(50) NOT NULL DEFAULT 'CodeSpace'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `qid`, `qname`, `inpln`, `outln`, `qln`, `tl`, `pbau`, `pbte`, `dadd`, `editorial`, `cid`) VALUES
(22, 'LUE', 'Life , Universe And Everything', 'adminaccess/input/lueinp.txt', 'adminaccess/output/lueout.txt', 'adminaccess/questions/LUEtxt', 1, '', '', '2016-11-18 23:08:28', '', 'novquicktest'),
(23, 'INTEST', 'Enormous Input Test', 'adminaccess/input/intestinp.txt', 'adminaccess/output/intestout.txt', 'adminaccess/questions/INTESTtxt', 8, '', '', '2016-11-19 00:24:02', '', 'novquicktest'),
(24, 'das', 'Detamos And His Students ', 'adminaccess/input/dasinp.txt', 'adminaccess/output/dasout.txt', 'adminaccess/questions/dastxt', 1, '', '', '2016-11-19 00:47:42', '', 'codemarathon2016'),
(25, 'atn', 'Add Two Numbers ', 'adminaccess/input/atninp.txt', 'adminaccess/output/atnout.txt', 'adminaccess/questions/atntxt', 1, '', '', '2016-11-19 01:30:51', '', 'nov2016'),
(26, 'klp', 'key and lost password ', 'adminaccess/input/klpinp.txt', 'adminaccess/output/klpout.txt', 'adminaccess/questions/klptxt', 1, '', '', '2016-11-19 02:11:01', '', 'codemarathon2016'),
(27, 'sod', 'Sum Of Digits ', 'adminaccess/input/sodinp.txt', 'adminaccess/output/sodout.txt', 'adminaccess/questions/sodtxt', 1, '', '', '2016-11-19 11:46:05', '', 'CodeSpace'),
(28, 'lf', 'Lucky Four', 'adminaccess/input/lfinp.txt', 'adminaccess/output/lfnout.txt', 'adminaccess/questions/lftxt', 1, '', '', '2016-11-19 12:03:36', '', 'codemarathon2016'),
(29, 'inaug', 'Inaugrataion', 'adminaccess/input/lfinp.txt', 'adminaccess/output/lfnout.txt', 'adminaccess/questions/inaugtxt', 1, '', '', '2016-11-19 12:37:17', '', 'CodeSpace');

-- --------------------------------------------------------

--
-- Table structure for table `submissions`
--

CREATE TABLE `submissions` (
  `id` int(11) NOT NULL,
  `result` varchar(10) NOT NULL,
  `qid` varchar(100) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `subln` varchar(1000) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `lang` varchar(10) NOT NULL DEFAULT 'C'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `submissions`
--

INSERT INTO `submissions` (`id`, `result`, `qid`, `user_id`, `subln`, `time`, `lang`) VALUES
(48, 'AC', 'atn', 10, 'adminaccess/codes/atn101.c', '2016-11-18 20:01:28', 'c'),
(55, 'CE', 'atn', 10, 'adminaccess/codes/atn108.c', '2016-11-19 04:59:58', 'C'),
(56, 'AC', 'atn', 10, 'adminaccess/codes/atn109.c', '2016-11-19 05:06:57', 'C'),
(59, 'AC', 'das', 10, 'adminaccess/codes/das104.c', '2016-11-19 06:04:57', 'C'),
(60, 'CE', 'sod', 13, 'adminaccess/codes/sod135.c', '2016-11-19 06:16:26', 'C'),
(61, 'AC', 'sod', 13, 'adminaccess/codes/sod136.cpp', '2016-11-19 06:16:48', 'C++'),
(62, 'AC', 'lf', 13, 'adminaccess/codes/lf137.cpp', '2016-11-19 06:34:38', 'C++'),
(63, 'TLE', 'lf', 13, 'adminaccess/codes/lf138.cpp', '2016-11-19 06:35:11', 'C++'),
(64, 'WA', 'lf', 10, 'adminaccess/codes/lf109.cpp', '2016-11-19 06:36:15', 'C++'),
(65, 'AC', 'lf', 10, 'adminaccess/codes/lf1010.cpp', '2016-11-19 06:36:28', 'C++'),
(66, 'WA', 'inaug', 10, 'adminaccess/codes/inaug1011.c', '2016-11-19 07:08:31', 'C'),
(67, 'AC', 'inaug', 10, 'adminaccess/codes/inaug1012.c', '2016-11-19 07:09:49', 'C'),
(68, 'CE', 'inaug', 13, 'adminaccess/codes/inaug1313.cpp', '2016-11-19 07:16:20', 'C++'),
(69, 'RE', 'klp', 13, 'adminaccess/codes/klp1314.cpp', '2016-11-19 07:21:20', 'C++'),
(70, 'RE', 'klp', 13, 'adminaccess/codes/klp1315.cpp', '2016-11-19 07:21:36', 'C++'),
(71, 'AC', 'das', 13, 'adminaccess/codes/das1316.c', '2016-11-19 07:22:16', 'C'),
(72, 'CE', 'lf', 13, 'adminaccess/codes/lf1317.c', '2016-11-19 07:23:52', 'C'),
(73, 'AC', 'lf', 13, 'adminaccess/codes/lf1318.cpp', '2016-11-19 07:24:01', 'C++'),
(74, 'CE', 'klp', 13, 'adminaccess/codes/klp1319.c', '2016-11-19 07:26:06', 'C'),
(75, 'RE', 'klp', 13, 'adminaccess/codes/klp1320.cpp', '2016-11-19 07:27:17', 'C++'),
(76, 'AC', 'atn', 13, 'adminaccess/codes/atn1321.c', '2016-11-19 07:44:05', 'C'),
(77, 'TLE', 'atn', 13, 'adminaccess/codes/atn1322.c', '2016-11-19 07:44:31', 'C'),
(78, 'CE', 'atn', 13, 'adminaccess/codes/atn1323.c', '2016-11-19 07:44:44', 'C'),
(79, 'AC', 'atn', 13, 'adminaccess/codes/atn1324.c', '2016-11-19 07:45:03', 'C'),
(80, 'AC', 'das', 13, 'adminaccess/codes/das1325.c', '2016-11-19 07:46:43', 'C'),
(81, 'AC', 'das', 13, 'adminaccess/codes/das1326.c', '2016-11-19 09:01:38', 'C'),
(82, 'TLE', 'das', 13, 'adminaccess/codes/das1327.c', '2016-11-19 09:02:00', 'C'),
(83, 'AC', 'atn', 10, 'adminaccess/codes/atn1028.c', '2016-11-21 10:21:23', 'C'),
(84, 'CE', 'atn', 10, 'adminaccess/codes/atn1029.c', '2017-06-14 10:01:14', 'C'),
(85, 'TLE', 'atn', 10, 'adminaccess/codes/atn1030.c', '2017-06-14 10:01:25', 'C');

-- --------------------------------------------------------

--
-- Table structure for table `user_in`
--

CREATE TABLE `user_in` (
  `id` int(10) NOT NULL,
  `fname` varchar(30) NOT NULL,
  `srname` varchar(30) NOT NULL,
  `pword` varchar(32) NOT NULL,
  `username` varchar(40) NOT NULL,
  `email` varchar(200) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `score` double NOT NULL,
  `imgln` varchar(10000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_in`
--

INSERT INTO `user_in` (`id`, `fname`, `srname`, `pword`, `username`, `email`, `phone`, `score`, `imgln`) VALUES
(10, 'Vaibhav', 'Agarwal', '71709241b5cb11e8ed8809b26a7d73d3', 'vaibhav', 'vaibhavagarwl220@s', '979622232323', 1200, 'imgprof/IMG_20150615_121432.jpg'),
(12, 'deepanshu', 'tyagi', '71709241b5cb11e8ed8809b26a7d73d3', 'deepanshu', 'vaibhav@sjabs', '6889996595', 0, 'imgprof/images.jpg'),
(13, 'Kushagra', 'Singhal', 'a152e841783914146e4bcd4f39100686', 'kushagra', 'vaibhavagarwal220@gmail.com', '988989', 2300, 'imgprof/IMG_20150615_110529.jpg'),
(15, 'Adnaan', 'Nazir', 'c68ca11a748de32a3c7d0189133027f3', 'Adnaan', 'kushagra.s.888@gmail.com', '7807054936', 1000, 'imgprof/Cubes-Wallpapers.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cboard`
--
ALTER TABLE `cboard`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cboard_ibfk_1` (`cid`),
  ADD KEY `cboard_ibfk_2` (`uid`);

--
-- Indexes for table `contests`
--
ALTER TABLE `contests`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `cid` (`cid`);

--
-- Indexes for table `keptin`
--
ALTER TABLE `keptin`
  ADD PRIMARY KEY (`id`),
  ADD KEY `keptin_ibfk_1` (`qid`),
  ADD KEY `keptin_ibfk_2` (`cid`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `qid` (`qid`);

--
-- Indexes for table `submissions`
--
ALTER TABLE `submissions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `submissions_ibfk_1` (`qid`),
  ADD KEY `submissions_ibfk_2` (`user_id`);

--
-- Indexes for table `user_in`
--
ALTER TABLE `user_in`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `cboard`
--
ALTER TABLE `cboard`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `contests`
--
ALTER TABLE `contests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3250;
--
-- AUTO_INCREMENT for table `keptin`
--
ALTER TABLE `keptin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `submissions`
--
ALTER TABLE `submissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;
--
-- AUTO_INCREMENT for table `user_in`
--
ALTER TABLE `user_in`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `cboard`
--
ALTER TABLE `cboard`
  ADD CONSTRAINT `cboard_ibfk_1` FOREIGN KEY (`cid`) REFERENCES `contests` (`cid`) ON DELETE CASCADE,
  ADD CONSTRAINT `cboard_ibfk_2` FOREIGN KEY (`uid`) REFERENCES `user_in` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `keptin`
--
ALTER TABLE `keptin`
  ADD CONSTRAINT `keptin_ibfk_1` FOREIGN KEY (`qid`) REFERENCES `questions` (`qid`) ON DELETE CASCADE,
  ADD CONSTRAINT `keptin_ibfk_2` FOREIGN KEY (`cid`) REFERENCES `contests` (`cid`) ON DELETE CASCADE;

--
-- Constraints for table `submissions`
--
ALTER TABLE `submissions`
  ADD CONSTRAINT `submissions_ibfk_1` FOREIGN KEY (`qid`) REFERENCES `questions` (`qid`) ON DELETE CASCADE,
  ADD CONSTRAINT `submissions_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user_in` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
