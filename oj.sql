-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 19, 2016 at 02:16 AM
-- Server version: 5.6.14
-- PHP Version: 5.5.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `oj`
--
CREATE DATABASE IF NOT EXISTS `oj` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `oj`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `fname` varchar(30) NOT NULL,
  `srname` varchar(30) NOT NULL,
  `pword` varchar(32) NOT NULL,
  `username` varchar(40) NOT NULL,
  `email` varchar(200) NOT NULL,
  `imgln` varchar(10000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

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

CREATE TABLE IF NOT EXISTS `cboard` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `cid` varchar(20) NOT NULL,
  `uid` int(5) NOT NULL,
  `score` int(10) NOT NULL DEFAULT '0',
  `sttime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `cboard_ibfk_1` (`cid`),
  KEY `cboard_ibfk_2` (`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `contests`
--

CREATE TABLE IF NOT EXISTS `contests` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cid` varchar(20) NOT NULL,
  `name` varchar(200) NOT NULL,
  `stime` time NOT NULL,
  `etime` time NOT NULL,
  `sdate` date NOT NULL,
  `edate` date NOT NULL,
  `noti` int(5) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`),
  UNIQUE KEY `id` (`id`),
  UNIQUE KEY `cid` (`cid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3250 ;

--
-- Dumping data for table `contests`
--

INSERT INTO `contests` (`id`, `cid`, `name`, `stime`, `etime`, `sdate`, `edate`, `noti`) VALUES
(3245, 'nov2016', 'Nov Long challenge 2016', '00:00:01', '23:59:59', '2016-11-01', '2016-11-10', 0),
(3246, 'utkarsh2016', 'Utkarsh 2016', '21:00:00', '23:59:59', '2016-11-15', '2016-11-15', 0),
(3247, 'novquicktest', 'Nov Quick Test ', '14:00:00', '17:00:00', '2016-11-17', '2016-11-19', 0),
(3248, 'nov tea time ', 'nov 2016 tea time', '17:00:00', '20:00:00', '2016-11-28', '2016-11-28', 0),
(3249, 'codemarathon2016', 'Code marathon 2016', '00:00:00', '23:58:59', '2016-11-19', '2016-11-19', 0);

-- --------------------------------------------------------

--
-- Table structure for table `keptin`
--

CREATE TABLE IF NOT EXISTS `keptin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cid` varchar(20) NOT NULL,
  `score` int(11) NOT NULL,
  `qid` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `keptin_ibfk_1` (`qid`),
  KEY `keptin_ibfk_2` (`cid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `keptin`
--

INSERT INTO `keptin` (`id`, `cid`, `score`, `qid`) VALUES
(13, 'novquicktest', 100, 'LUE'),
(14, 'novquicktest', 100, 'INTEST'),
(15, 'codemarathon2016', 100, 'das');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE IF NOT EXISTS `questions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `cid` varchar(50) NOT NULL DEFAULT 'CodeSpace',
  PRIMARY KEY (`id`),
  UNIQUE KEY `qid` (`qid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `qid`, `qname`, `inpln`, `outln`, `qln`, `tl`, `pbau`, `pbte`, `dadd`, `editorial`, `cid`) VALUES
(22, 'LUE', 'Life , Universe And Everything', 'adminaccess/input/lueinp.txt', 'adminaccess/output/lueout.txt', 'adminaccess/questions/LUEtxt', 1, '', '', '2016-11-18 23:08:28', '', 'novquicktest'),
(23, 'INTEST', 'Enormous Input Test', 'adminaccess/input/intestinp.txt', 'adminaccess/output/intestout.txt', 'adminaccess/questions/INTESTtxt', 8, '', '', '2016-11-19 00:24:02', '', 'novquicktest'),
(24, 'das', 'Detamos And His Students ', 'adminaccess/input/dasinp.txt', 'adminaccess/output/dasout.txt', 'adminaccess/questions/dastxt', 1, '', '', '2016-11-19 00:47:42', '', 'codemarathon2016');

-- --------------------------------------------------------

--
-- Table structure for table `submissions`
--

CREATE TABLE IF NOT EXISTS `submissions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `result` varchar(10) NOT NULL,
  `qid` varchar(100) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `subln` varchar(1000) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `lang` varchar(10) NOT NULL DEFAULT 'C',
  PRIMARY KEY (`id`),
  KEY `submissions_ibfk_1` (`qid`),
  KEY `submissions_ibfk_2` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=125 ;

-- --------------------------------------------------------

--
-- Table structure for table `user_in`
--

CREATE TABLE IF NOT EXISTS `user_in` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `fname` varchar(30) NOT NULL,
  `srname` varchar(30) NOT NULL,
  `pword` varchar(32) NOT NULL,
  `username` varchar(40) NOT NULL,
  `email` varchar(200) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `score` double NOT NULL,
  `imgln` varchar(10000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `user_in`
--

INSERT INTO `user_in` (`id`, `fname`, `srname`, `pword`, `username`, `email`, `phone`, `score`, `imgln`) VALUES
(10, 'Vaibhav', 'Agarwal', '71709241b5cb11e8ed8809b26a7d73d3', 'vaibhav', 'vaibhavagarwl220@s', '979622232323', 1000, 'imgprof/IMG_20150615_121432.jpg'),
(11, 'Vaibhav', 'Agarwal', '71709241b5cb11e8ed8809b26a7d73d3', 'vaibhav220', 'vaibhavagarwal220@gmail.com', '9736260564', 1000, 'imgprof/IMG_20150615_153827.jpg'),
(12, 'deepanshu', 'tyagi', '71709241b5cb11e8ed8809b26a7d73d3', 'deepanshu', 'vaibhav@sjabs', '6889996595', 1000, 'imgprof/images.jpg'),
(13, 'Kushagra', 'Singhal', 'a152e841783914146e4bcd4f39100686', 'kushagra', 'vaibhavagarwal220@gmail.com', '988989', 5000, 'imgprof/IMG_20150615_110529.jpg'),
(14, 'Deepanshu', 'Tyagi', '71709241b5cb11e8ed8809b26a7d73d3', 'detamos', 'detamos@webmail.com', '7877878989', 1000, 'imgprof/14890433_213305072427997_2909354464321348656_o.jpg');

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
