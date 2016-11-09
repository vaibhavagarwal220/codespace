-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 10, 2016 at 12:11 AM
-- Server version: 5.6.14
-- PHP Version: 5.5.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `fname`, `srname`, `pword`, `username`, `email`, `imgln`) VALUES
(1, 'Vaibhav', 'Agarwal', '71709241b5cb11e8ed8809b26a7d73d3', 'vaibhav', 'vaibhavagarwl220@s', 'imgprof/IMG_20150615_134817.jpg');

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
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`),
  UNIQUE KEY `id` (`id`),
  UNIQUE KEY `cid` (`cid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3244 ;

--
-- Dumping data for table `contests`
--

INSERT INTO `contests` (`id`, `cid`, `name`, `stime`, `etime`, `sdate`, `edate`) VALUES
(3239, 'scnd', 'second', '10:27:57', '10:29:50', '2016-10-07', '2016-10-07'),
(3241, 'thrd', 'third', '15:10:57', '15:30:50', '2016-10-10', '2016-12-10'),
(3242, 'frst', 'First by CodeSPACE', '03:27:39', '12:50:40', '2016-11-10', '2016-11-20'),
(3243, 'frth', 'CODEsPaCe', '22:25:50', '22:25:50', '2016-11-10', '2016-11-20');

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
  KEY `qid` (`qid`),
  KEY `cid` (`cid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `keptin`
--

INSERT INTO `keptin` (`id`, `cid`, `score`, `qid`) VALUES
(7, 'thrd', 1000, 'TEST'),
(11, 'thrd', 100, 'TEST1'),
(12, 'frst', 100, 'TEST2'),
(13, 'frth', 100, 'TEST3');

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
  PRIMARY KEY (`id`),
  UNIQUE KEY `qid` (`qid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `qid`, `qname`, `inpln`, `outln`, `qln`, `tl`, `pbau`, `pbte`, `dadd`, `editorial`) VALUES
(6, 'TEST', 'Life, the Universe, and Everything', 'adminaccess/input/TESTtxt', 'adminaccess/output/TESTtxt', 'adminaccess/questions/TESTtxt', 2, '', '', '2016-11-09 23:07:09', ''),
(16, 'TEST1', 'NA', 'adminaccess/input/TEST1txt', 'adminaccess/output/TEST1txt', 'adminaccess/questions/TEST1txt', 1, '', '', '2016-11-10 03:52:57', ''),
(17, 'TEST2', 'NA', 'adminaccess/input/TEST2txt', 'adminaccess/output/TEST2txt', 'adminaccess/questions/TEST2txt', 1, '', '', '2016-11-10 04:02:17', ''),
(18, 'TEST3', 'NA', 'adminaccess/input/TEST3txt', 'adminaccess/output/TEST3txt', 'adminaccess/questions/TEST3txt', 2, '', '', '2016-11-10 04:13:47', '');

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
  PRIMARY KEY (`id`),
  KEY `qid` (`qid`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=40 ;

--
-- Dumping data for table `submissions`
--

INSERT INTO `submissions` (`id`, `result`, `qid`, `user_id`, `subln`, `time`) VALUES
(37, 'AC', 'TEST', 10, 'adminaccess/codes/3.c', '2016-11-09 18:25:55'),
(38, 'WA', 'TEST2', 10, 'adminaccess/codes/3.c', '2016-11-09 18:25:55'),
(39, 'AC', 'TEST2', 10, 'adminaccess/codes/3.c', '2016-11-09 18:25:55');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `user_in`
--

INSERT INTO `user_in` (`id`, `fname`, `srname`, `pword`, `username`, `email`, `phone`, `score`, `imgln`) VALUES
(10, 'Vaibhav', 'Agarwal', '71709241b5cb11e8ed8809b26a7d73d3', 'vaibhav', 'vaibhavagarwl220@s', '979622232323', 1000, 'imgprof/IMG_20150615_134817.jpg'),
(11, 'Vaibhav', 'Agarwal', '71709241b5cb11e8ed8809b26a7d73d3', 'vaibhav220', 'vaibhavagarwal220@gmail.com', '9736260564', 1000, 'imgprof/IMG_20150615_153827.jpg'),
(12, 'deepanshu', 'tyagi', '71709241b5cb11e8ed8809b26a7d73d3', 'deepanshu', 'vaibhav@sjabs', '6889996595', 1000, 'imgprof/images.jpg'),
(13, 'Kushagra', 'Singhal', 'a152e841783914146e4bcd4f39100686', 'kushagra', 'vaibhavagarwal220@gmail.com', '988989', 5000, 'imgprof/IMG_20150615_110529.jpg');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `keptin`
--
ALTER TABLE `keptin`
  ADD CONSTRAINT `keptin_ibfk_1` FOREIGN KEY (`qid`) REFERENCES `questions` (`qid`),
  ADD CONSTRAINT `keptin_ibfk_2` FOREIGN KEY (`cid`) REFERENCES `contests` (`cid`);

--
-- Constraints for table `submissions`
--
ALTER TABLE `submissions`
  ADD CONSTRAINT `submissions_ibfk_1` FOREIGN KEY (`qid`) REFERENCES `questions` (`qid`),
  ADD CONSTRAINT `submissions_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user_in` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
