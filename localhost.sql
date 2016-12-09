-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 08, 2016 at 05:16 PM
-- Server version: 5.5.52-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `optometry`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE IF NOT EXISTS `appointment` (
  `locationid` int(5) NOT NULL,
  `employeeid` int(5) NOT NULL,
  `patientid` int(5) NOT NULL,
  `starttime` datetime NOT NULL,
  `endtime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`locationid`, `employeeid`, `patientid`, `starttime`, `endtime`) VALUES
(10, 2, 15, '2016-12-06 13:00:00', '2016-11-30 14:00:00'),
(10, 2, 18, '2016-11-30 10:30:00', '2016-11-30 11:00:00'),
(12, 1, 2, '2016-11-30 14:25:00', '2016-11-30 15:00:00'),
(12, 1, 3, '2016-12-08 12:30:00', '0000-00-00 00:00:00'),
(12, 2, 6, '2016-11-30 16:00:00', '2016-11-30 17:00:00'),
(12, 3, 6, '2016-11-30 10:00:00', '2016-11-30 11:00:00'),
(8, 3, 15, '2016-12-01 08:00:00', '2016-11-30 09:00:00'),
(8, 3, 15, '2016-12-20 10:00:00', '2016-11-30 10:30:00'),
(7, 16, 15, '2016-12-07 12:00:00', '2016-12-07 12:30:00'),
(7, 16, 15, '2016-11-30 09:00:00', '2016-11-30 10:00:00'),
(17, 4, 3, '2016-11-30 08:00:00', '2016-12-30 12:31:00'),
(13, 5, 1, '2016-11-30 09:38:00', '2016-11-30 13:48:00'),
(18, 1, 10, '2016-11-30 06:41:00', '2016-11-30 14:55:00'),
(20, 1, 8, '2016-11-30 10:46:00', '2016-11-30 14:22:00'),
(16, 2, 13, '2016-11-30 10:47:00', '2016-11-30 16:16:00'),
(12, 9, 18, '2016-11-30 13:57:00', '2016-11-30 13:42:00'),
(21, 4, 19, '2016-11-30 11:36:00', '2016-11-30 11:50:00'),
(11, 2, 12, '2016-11-30 12:42:00', '2016-11-30 16:35:00'),
(18, 2, 13, '2016-11-30 06:46:00', '2016-11-30 14:53:00'),
(1, 1123, 132, '2016-11-30 14:22:00', '2016-11-30 14:22:00');

-- --------------------------------------------------------

--
-- Table structure for table `contactlens`
--

CREATE TABLE IF NOT EXISTS `contactlens` (
  `clensid` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(15) NOT NULL,
  `basecurve` text NOT NULL,
  `diameter` decimal(4,1) NOT NULL,
  `sphere` decimal(5,0) NOT NULL,
  `manufacturerid` int(5) NOT NULL,
  PRIMARY KEY (`clensid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=38 ;

--
-- Dumping data for table `contactlens`
--

INSERT INTO `contactlens` (`clensid`, `name`, `basecurve`, `diameter`, `sphere`, `manufacturerid`) VALUES
(4, 'Acuvue', '-1.5', '14.5', '8', 456),
(5, 'Crystal Clear', '+3.5', '15.0', '7', 126),
(7, 'Air Optix', '+8.5', '13.8', '7', 125),
(8, 'Biofinity', '-6.3', '15.3', '9', 984),
(9, 'Dailies', '+7.5', '12.7', '7', 321),
(11, 'AcuvuePlus', '-8.5', '13.0', '6', 456),
(12, 'AcuvuePlus', '-8.5', '13.0', '6', 456),
(13, 'AcuvuePlus', '-8.5', '13.0', '6', 456),
(14, 'AcuvuePlus', '-8.5', '13.0', '6', 456),
(15, 'AcuvuePlus', '-8.5', '13.0', '6', 456),
(16, 'AcuvuePlus', '-8.5', '13.0', '6', 456),
(17, 'AcuvuePlus', '-8.5', '13.0', '6', 456),
(18, 'AcuvuePlus', '-8.5', '13.0', '6', 456),
(19, 'AcuvuePlus', '-8.5', '13.0', '6', 456),
(20, 'AcuvuePlus', '-8.5', '13.0', '6', 456),
(21, 'AcuvuePlus', '-8.5', '13.0', '6', 456),
(22, 'AcuvuePlus', '-8.5', '13.0', '6', 456),
(23, 'AcuvuePlus', '-8.5', '13.0', '6', 456),
(24, 'AcuvuePlus', '-8.5', '13.0', '6', 456),
(25, 'AcuvuePlus', '-8.5', '13.0', '9', 456),
(26, 'AirOptixPlus', '-6.5', '13.0', '11', 456),
(27, 'Crystallus', '-6.5', '13.0', '9', 456),
(28, 'CrystalPlus', '-7.5', '12.0', '9', 456),
(29, 'AcuvuePlus', '-2.5', '12.0', '8', 456),
(30, 'AcuvuePlus', '-1.5', '13.0', '6', 456),
(31, 'AcuvuePlus', '-2.5', '13.0', '9', 128),
(32, 'AirOptixPlus', '-6.0', '13.0', '11', 456),
(33, 'Crystallus', '-6.0', '13.0', '9', 456),
(34, 'CrystalPlus', '-3.5', '12.0', '9', 456),
(35, 'AcuvuePlus', '-0.5', '12.0', '8', 456),
(36, 'Some Lens', '8', '16.0', '-3', 128),
(37, 'haley', '12', '12.0', '364', 23432);

-- --------------------------------------------------------

--
-- Table structure for table `eye`
--

CREATE TABLE IF NOT EXISTS `eye` (
  `ID #` int(11) NOT NULL AUTO_INCREMENT,
  `patientid` int(5) NOT NULL,
  `side` varchar(1) NOT NULL,
  `color` varchar(10) NOT NULL,
  `prescriptionid` int(10) DEFAULT NULL,
  PRIMARY KEY (`ID #`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=80 ;

--
-- Dumping data for table `eye`
--

INSERT INTO `eye` (`ID #`, `patientid`, `side`, `color`, `prescriptionid`) VALUES
(2, 6, 'R', 'Hazel', 14),
(3, 6, 'L', 'Hazel', 14),
(4, 5, 'R', 'Blue', 5),
(5, 5, 'L', 'Blue', 5),
(6, 3, 'R', 'Green', 5),
(7, 3, 'L', 'Green', 5),
(8, 7, 'L', 'Blue', 11),
(9, 7, 'R', 'Blue', 11),
(10, 8, 'L', 'Black', 6),
(11, 8, 'R', 'Black', 6),
(12, 9, 'L', 'White', 14),
(13, 9, 'R', 'White', 14),
(14, 10, 'L', 'Red', 11),
(15, 10, 'R', 'Red', 11),
(16, 11, 'L', 'Green', 13),
(17, 11, 'R', 'Green', 14),
(18, 12, 'L', 'Yellow', 13),
(19, 12, 'R', 'Yellow', 11),
(20, 13, 'L', 'Blue', 12),
(21, 13, 'R', 'Blue', 12),
(22, 14, 'L', 'Brown', 13),
(23, 14, 'R', 'Brown', 13),
(24, 15, 'L', 'Brown', 5),
(25, 15, 'R', 'Brown', 5),
(26, 16, 'L', 'Pink', 12),
(27, 16, 'L', 'Pink', 12),
(28, 6, 'R', 'Hazel', 14),
(29, 6, 'L', 'Hazel', 14),
(30, 5, 'R', 'Blue', 5),
(31, 5, 'L', 'Blue', 5),
(32, 3, 'R', 'Green', 5),
(33, 3, 'L', 'Green', 5),
(34, 7, 'L', 'Blue', 11),
(35, 7, 'R', 'Blue', 11),
(36, 8, 'L', 'Black', 6),
(37, 8, 'R', 'Black', 6),
(38, 9, 'L', 'White', 14),
(39, 9, 'R', 'White', 14),
(40, 10, 'L', 'Red', 11),
(41, 10, 'R', 'Red', 11),
(42, 11, 'L', 'Green', 13),
(43, 11, 'R', 'Green', 14),
(44, 12, 'L', 'Yellow', 13),
(45, 12, 'R', 'Yellow', 11),
(46, 13, 'L', 'Blue', 12),
(47, 13, 'R', 'Blue', 12),
(48, 14, 'L', 'Brown', 13),
(49, 14, 'R', 'Brown', 13),
(50, 15, 'L', 'Brown', 5),
(51, 15, 'R', 'Brown', 5),
(52, 16, 'L', 'Pink', 12),
(53, 16, 'L', 'Pink', 12),
(54, 17, 'R', 'Hazel', 14),
(55, 17, 'L', 'Hazel', 14),
(56, 18, 'R', 'Blue', 5),
(57, 18, 'L', 'Blue', 5),
(58, 20, 'R', 'Green', 5),
(59, 20, 'L', 'Green', 5),
(60, 21, 'L', 'Blue', 11),
(61, 21, 'R', 'Blue', 11),
(62, 22, 'L', 'Black', 6),
(63, 22, 'R', 'Black', 6),
(64, 23, 'L', 'White', 14),
(65, 23, 'R', 'White', 14),
(66, 24, 'L', 'Red', 11),
(67, 24, 'R', 'Red', 11),
(68, 25, 'L', 'Green', 13),
(69, 25, 'R', 'Green', 14),
(70, 26, 'L', 'Yellow', 13),
(71, 26, 'R', 'Yellow', 11),
(72, 27, 'L', 'Blue', 12),
(73, 27, 'R', 'Blue', 12),
(74, 28, 'L', 'Brown', 13),
(75, 28, 'R', 'Brown', 13),
(76, 29, 'L', 'Brown', 5),
(77, 29, 'R', 'Brown', 5),
(78, 30, 'L', 'Pink', 12),
(79, 30, 'L', 'Pink', 12);

-- --------------------------------------------------------

--
-- Table structure for table `glasseslens`
--

CREATE TABLE IF NOT EXISTS `glasseslens` (
  `glensid` int(5) NOT NULL AUTO_INCREMENT,
  `sphere` decimal(6,0) NOT NULL,
  `basecurve` decimal(6,0) NOT NULL,
  `manufid` int(5) NOT NULL,
  PRIMARY KEY (`glensid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `glasseslens`
--

INSERT INTO `glasseslens` (`glensid`, `sphere`, `basecurve`, `manufid`) VALUES
(1, '-4', '9', 345),
(2, '2', '5', 168),
(3, '-1', '6', 168),
(4, '-1', '2', 345),
(5, '-2', '5', 168),
(6, '-3', '6', 128),
(7, '6', '-9', 456),
(8, '9', '-9', 456),
(9, '11', '-7', 456),
(10, '9', '-7', 456),
(11, '9', '-8', 456),
(12, '8', '-3', 456),
(13, '6', '-2', 456),
(14, '9', '-3', 128),
(15, '11', '-6', 456),
(16, '9', '-6', 456),
(17, '9', '-4', 456),
(18, '8', '-1', 456),
(19, '6', '-3', 128);

-- --------------------------------------------------------

--
-- Table structure for table `manufacturer`
--

CREATE TABLE IF NOT EXISTS `manufacturer` (
  `manufid` int(5) NOT NULL AUTO_INCREMENT,
  `name` varchar(15) NOT NULL,
  `address` varchar(50) NOT NULL,
  PRIMARY KEY (`manufid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `manufacturer`
--

INSERT INTO `manufacturer` (`manufid`, `name`, `address`) VALUES
(1, 'Valeant Pharmac', '383 SQL Road'),
(2, 'Bausch & Lomb', '383 SQL Road'),
(3, 'Novartis', '383 SQL Road'),
(4, 'Alcon', '383 SQL Road'),
(5, 'Johnson & Johns', '383 SQL Road'),
(6, 'CooperVision', '383 SQL Road'),
(7, 'The Cooper Comp', '383 SQL Road');

-- --------------------------------------------------------

--
-- Table structure for table `office`
--

CREATE TABLE IF NOT EXISTS `office` (
  `officeid` int(5) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `address` varchar(50) NOT NULL,
  `phone` int(11) NOT NULL,
  PRIMARY KEY (`officeid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `office`
--

INSERT INTO `office` (`officeid`, `name`, `address`, `phone`) VALUES
(1, 'Dr. T. Caywood and Dr. R. Winw', '29 West Delaware Ave.', 2147483647),
(3, 'Dr. T. Caywood and Dr. R. Winw', '639 Locust St.', 2147483647),
(4, 'Traer G. Caywood, OD', '214 Cobblestone Street ', 2147483647),
(5, 'Utah Valley Optometric Center', '2 Walnutwood Street ', 2147483647),
(6, 'Utah Valley Optometric Physici', '33 Rosewood Street ', 2147483647),
(7, 'Blaine F. Bird, OD', '49 Pawnee Ave. ', 2147483647),
(8, 'Dr. Frank A Siddoway, OD PC', '88 Brickyard Dr.', 2147483647),
(9, 'C.L.R. Vision, PC - Drs Rigtru', '8959 Sulphur Springs Dr.', 2147483647),
(10, 'Todd J. Lewis, OD', '768 East Creekside Street ', 2147483647),
(11, 'Eye Clinic & Contact Lens Cent', '759 El Dorado Lane', 2147483647);

-- --------------------------------------------------------

--
-- Table structure for table `optometrist`
--

CREATE TABLE IF NOT EXISTS `optometrist` (
  `employeeid` int(5) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `title` varchar(30) NOT NULL,
  PRIMARY KEY (`employeeid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `optometrist`
--

INSERT INTO `optometrist` (`employeeid`, `name`, `password`, `title`) VALUES
(1, 'Dallin', 'strongpassword', 'doctor'),
(2, 'Haley', 'strongpassword', 'doctor');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE IF NOT EXISTS `order` (
  `orderid` int(5) NOT NULL AUTO_INCREMENT,
  `clensid` int(5) DEFAULT NULL,
  `glensid` int(5) DEFAULT NULL,
  `price` decimal(6,0) NOT NULL,
  `quantity` int(6) NOT NULL,
  `received` tinyint(1) NOT NULL,
  PRIMARY KEY (`orderid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`orderid`, `clensid`, `glensid`, `price`, `quantity`, `received`) VALUES
(1, 8, NULL, '1000', 200, 1),
(2, 9, NULL, '1000', 200, 1),
(3, 14, NULL, '1100', 200, 1),
(4, 14, NULL, '1050', 200, 1),
(5, NULL, 13, '900', 200, 1),
(6, NULL, 14, '1300', 200, 0),
(7, NULL, 14, '1300', 200, 0),
(8, NULL, 15, '1800', 200, 1),
(9, 15, NULL, '1000', 200, 1),
(10, 6, NULL, '1100', 200, 1),
(11, 6, NULL, '950', 200, 0);

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE IF NOT EXISTS `patient` (
  `patientid` int(5) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `prescriptionid1` int(5) DEFAULT NULL,
  `prescriptionid2` int(5) DEFAULT NULL,
  `phone1` varchar(11) NOT NULL,
  `phone2` varchar(11) DEFAULT NULL,
  `housenumber` varchar(6) NOT NULL,
  `street` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `state` varchar(2) NOT NULL,
  `zipcode` int(5) NOT NULL,
  PRIMARY KEY (`patientid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`patientid`, `name`, `prescriptionid1`, `prescriptionid2`, `phone1`, `phone2`, `housenumber`, `street`, `city`, `state`, `zipcode`) VALUES
(5, 'Dallin', NULL, NULL, '8016362851', NULL, '532', 'West', 'Provo', 'UT', 84604),
(6, 'Haley', NULL, NULL, '5598015543', NULL, '194', 'Walnut Street', 'Antartica', 'CA', 95663),
(12, 'Amanda', 11, 11, '1234567891', NULL, '12', 'Avocado', 'Provo', 'UT', 81604),
(13, 'Jeremy', 5, 5, '1234567891', NULL, '21', 'Avocado', 'Provo', 'UT', 81604),
(14, 'Chris', 6, 6, '1234567891', NULL, '12', 'Avocado', 'Provo', 'UT', 81604),
(15, 'Harrison', 12, 12, '1234567891', NULL, '18', 'Avocado', 'Provo', 'UT', 81604),
(16, 'Jesse', 11, 11, '1234567891', NULL, '1', 'Avocado', 'Provo', 'UT', 81604),
(17, 'Kevin', 13, 13, '1234567891', NULL, '119', 'Avocado', 'Provo', 'UT', 81604),
(18, 'Rebecca', 14, 14, '1234567891', NULL, '112', 'Avocado', 'Provo', 'UT', 81604),
(20, 'Talon', 5, 5, '9200202262', NULL, '83', 'Candy Ln', 'Provo', 'UT', 84606),
(21, 'Nathan', 5, 5, '9200202262', NULL, '84', 'Candy Ln', 'Provo', 'UT', 84606),
(22, 'Devan', 6, 6, '9200202262', NULL, '85', 'Candy Ln', 'Provo', 'UT', 84606),
(23, 'Steven', 11, 11, '9200202262', NULL, '86', 'Candy Ln', 'Provo', 'UT', 84606),
(24, 'Kade', 12, 12, '9200202262', NULL, '87', 'Candy Ln', 'Provo', 'UT', 84606),
(25, 'Jorge', 13, 13, '9200202262', NULL, '88', 'Candy Ln', 'Provo', 'UT', 84606),
(26, 'Mitchell', 6, 6, '9200202262', NULL, '89', 'Candy Ln', 'Provo', 'UT', 84606),
(27, 'Andy', 5, 5, '9200202262', NULL, '90', 'Candy Ln', 'Provo', 'UT', 84606),
(28, 'Andrew', 14, 14, '9200202262', NULL, '91', 'Candy Ln', 'Provo', 'UT', 84606),
(29, 'Marisa', 6, 6, '9200202262', NULL, '92', 'Candy Ln', 'Provo', 'UT', 84606),
(30, 'Peter', 12, 12, '9200202262', NULL, '93', 'Candy Ln', 'Provo', 'UT', 84606);

-- --------------------------------------------------------

--
-- Table structure for table `prescription`
--

CREATE TABLE IF NOT EXISTS `prescription` (
  `prescriptionid` int(5) NOT NULL AUTO_INCREMENT,
  `optometristid` int(5) NOT NULL,
  `clensid` int(5) DEFAULT NULL,
  `glensid` int(5) DEFAULT NULL,
  PRIMARY KEY (`prescriptionid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `prescription`
--

INSERT INTO `prescription` (`prescriptionid`, `optometristid`, `clensid`, `glensid`) VALUES
(5, 1, 4, 2),
(6, 2, 4, 4),
(11, 1, 2, 2),
(12, 1, 4, 4),
(13, 2, 3, 3),
(14, 2, 5, 1);
--
-- Database: `phpmyadmin`
--

-- --------------------------------------------------------

--
-- Table structure for table `pma_bookmark`
--

CREATE TABLE IF NOT EXISTS `pma_bookmark` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dbase` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `user` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `label` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `query` text COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Bookmarks' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `pma_column_info`
--

CREATE TABLE IF NOT EXISTS `pma_column_info` (
  `id` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `column_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `comment` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `mimetype` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `transformation` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `transformation_options` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `db_name` (`db_name`,`table_name`,`column_name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Column information for phpMyAdmin' AUTO_INCREMENT=54 ;

--
-- Dumping data for table `pma_column_info`
--

INSERT INTO `pma_column_info` (`id`, `db_name`, `table_name`, `column_name`, `comment`, `mimetype`, `transformation`, `transformation_options`) VALUES
(1, 'optometry', 'patient', 'pid', '', '', '_', ''),
(2, 'optometry', 'patient', 'name', '', '', '_', ''),
(3, 'optometry', 'patient', 'phone1', '', '', '_', ''),
(4, 'optometry', 'patient', 'phone2', '', '', '_', ''),
(5, 'optometry', 'patient', 'housenumber', '', '', '_', ''),
(6, 'optometry', 'patient', 'street', '', '', '_', ''),
(7, 'optometry', 'patient', 'city', '', '', '_', ''),
(8, 'optometry', 'patient', 'state', '', '', '_', ''),
(9, 'optometry', 'patient', 'zipcode', '', '', '_', ''),
(10, 'optometry', 'eye', 'patientid', '', '', '_', ''),
(11, 'optometry', 'eye', 'side', '', '', '_', ''),
(12, 'optometry', 'eye', 'color', '', '', '_', ''),
(13, 'optometry', 'eye', 'prescriptionid', '', '', '_', ''),
(14, 'optometry', 'patient', 'patientid', '', '', '_', ''),
(15, 'optometry', 'contactlens', 'clensid', '', '', '_', ''),
(16, 'optometry', 'contactlens', 'name', '', '', '_', ''),
(17, 'optometry', 'contactlens', 'basecurve', '', '', '_', ''),
(18, 'optometry', 'contactlens', 'diameter', '', '', '_', ''),
(19, 'optometry', 'contactlens', 'sphere', '', '', '_', ''),
(20, 'optometry', 'contactlens', 'manufacturerid', '', '', '_', ''),
(21, 'optometry', 'manufacturer', 'manufid', '', '', '_', ''),
(22, 'optometry', 'manufacturer', 'name', '', '', '_', ''),
(23, 'optometry', 'manufacturer', 'address', '', '', '_', ''),
(24, 'optometry', 'order', 'orderid', '', '', '_', ''),
(25, 'optometry', 'order', 'clensid', '', '', '_', ''),
(26, 'optometry', 'order', 'glensid', '', '', '_', ''),
(27, 'optometry', 'order', 'price', '', '', '_', ''),
(28, 'optometry', 'order', 'quantity', '', '', '_', ''),
(29, 'optometry', 'order', 'received', '', '', '_', ''),
(30, 'optometry', 'glasseslens', 'glensid', '', '', '_', ''),
(31, 'optometry', 'glasseslens', 'sphere', '', '', '_', ''),
(32, 'optometry', 'glasseslens', 'basecurve', '', '', '_', ''),
(33, 'optometry', 'glasseslens', 'manufid', '', '', '_', ''),
(34, 'optometry', 'optometrist', 'employeeid', '', '', '_', ''),
(35, 'optometry', 'optometrist', 'name', '', '', '_', ''),
(36, 'optometry', 'optometrist', 'title', '', '', '_', ''),
(37, 'optometry', 'prescription', 'prescriptionid', '', '', '_', ''),
(38, 'optometry', 'prescription', 'optometristid', '', '', '_', ''),
(39, 'optometry', 'prescription', 'clensid', '', '', '_', ''),
(40, 'optometry', 'prescription', 'glensid', '', '', '_', ''),
(41, 'optometry', 'patient', 'prescriptionid1', '', '', '_', ''),
(42, 'optometry', 'patient', 'prescriptionid2', '', '', '_', ''),
(43, 'optometry', 'office', 'officeid', '', '', '_', ''),
(44, 'optometry', 'office', 'name', '', '', '_', ''),
(45, 'optometry', 'office', 'address', '', '', '_', ''),
(46, 'optometry', 'office', 'phone', '', '', '_', ''),
(47, 'optometry', 'appointment', 'locationid', '', '', '_', ''),
(48, 'optometry', 'appointment', 'employeeid', '', '', '_', ''),
(49, 'optometry', 'appointment', 'patientid', '', '', '_', ''),
(50, 'optometry', 'appointment', 'starttime', '', '', '_', ''),
(51, 'optometry', 'appointment', 'endtime', '', '', '_', ''),
(52, 'optometry', 'optometrist', 'password', '', '', '_', ''),
(53, 'optometry', 'eye', 'ID #', '', '', '_', '');

-- --------------------------------------------------------

--
-- Table structure for table `pma_designer_coords`
--

CREATE TABLE IF NOT EXISTS `pma_designer_coords` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `x` int(11) DEFAULT NULL,
  `y` int(11) DEFAULT NULL,
  `v` tinyint(4) DEFAULT NULL,
  `h` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`db_name`,`table_name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table coordinates for Designer';

-- --------------------------------------------------------

--
-- Table structure for table `pma_history`
--

CREATE TABLE IF NOT EXISTS `pma_history` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `timevalue` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `sqlquery` text COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`),
  KEY `username` (`username`,`db`,`table`,`timevalue`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='SQL history for phpMyAdmin' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `pma_pdf_pages`
--

CREATE TABLE IF NOT EXISTS `pma_pdf_pages` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `page_nr` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `page_descr` varchar(50) CHARACTER SET utf8 NOT NULL DEFAULT '',
  PRIMARY KEY (`page_nr`),
  KEY `db_name` (`db_name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='PDF relation pages for phpMyAdmin' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `pma_recent`
--

CREATE TABLE IF NOT EXISTS `pma_recent` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `tables` text COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Recently accessed tables';

--
-- Dumping data for table `pma_recent`
--

INSERT INTO `pma_recent` (`username`, `tables`) VALUES
('root', '[{"db":"optometry","table":"patient"},{"db":"optometry","table":"glasseslens"},{"db":"optometry","table":"prescription"},{"db":"optometry","table":"eye"},{"db":"optometry","table":"order"},{"db":"optometry","table":"optometrist"},{"db":"optometry","table":"office"},{"db":"optometry","table":"manufacturer"},{"db":"optometry","table":"contactlens"},{"db":"optometry","table":"appointment"}]'),
('webuser', '[{"db":"testme","table":"people"}]');

-- --------------------------------------------------------

--
-- Table structure for table `pma_relation`
--

CREATE TABLE IF NOT EXISTS `pma_relation` (
  `master_db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `master_table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `master_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  PRIMARY KEY (`master_db`,`master_table`,`master_field`),
  KEY `foreign_field` (`foreign_db`,`foreign_table`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Relation table';

-- --------------------------------------------------------

--
-- Table structure for table `pma_table_coords`
--

CREATE TABLE IF NOT EXISTS `pma_table_coords` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `pdf_page_number` int(11) NOT NULL DEFAULT '0',
  `x` float unsigned NOT NULL DEFAULT '0',
  `y` float unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`db_name`,`table_name`,`pdf_page_number`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table coordinates for phpMyAdmin PDF output';

-- --------------------------------------------------------

--
-- Table structure for table `pma_table_info`
--

CREATE TABLE IF NOT EXISTS `pma_table_info` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `display_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  PRIMARY KEY (`db_name`,`table_name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma_table_uiprefs`
--

CREATE TABLE IF NOT EXISTS `pma_table_uiprefs` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `prefs` text COLLATE utf8_bin NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`username`,`db_name`,`table_name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Tables'' UI preferences';

--
-- Dumping data for table `pma_table_uiprefs`
--

INSERT INTO `pma_table_uiprefs` (`username`, `db_name`, `table_name`, `prefs`, `last_update`) VALUES
('root', 'optometry', 'eye', '{"sorted_col":"`eye`.`patientid` ASC"}', '2016-11-30 20:31:02');

-- --------------------------------------------------------

--
-- Table structure for table `pma_tracking`
--

CREATE TABLE IF NOT EXISTS `pma_tracking` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `version` int(10) unsigned NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  `schema_snapshot` text COLLATE utf8_bin NOT NULL,
  `schema_sql` text COLLATE utf8_bin,
  `data_sql` longtext COLLATE utf8_bin,
  `tracking` set('UPDATE','REPLACE','INSERT','DELETE','TRUNCATE','CREATE DATABASE','ALTER DATABASE','DROP DATABASE','CREATE TABLE','ALTER TABLE','RENAME TABLE','DROP TABLE','CREATE INDEX','DROP INDEX','CREATE VIEW','ALTER VIEW','DROP VIEW') COLLATE utf8_bin DEFAULT NULL,
  `tracking_active` int(1) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`db_name`,`table_name`,`version`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin ROW_FORMAT=COMPACT COMMENT='Database changes tracking for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma_userconfig`
--

CREATE TABLE IF NOT EXISTS `pma_userconfig` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `timevalue` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `config_data` text COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User preferences storage for phpMyAdmin';

--
-- Dumping data for table `pma_userconfig`
--

INSERT INTO `pma_userconfig` (`username`, `timevalue`, `config_data`) VALUES
('root', '2016-11-29 17:34:40', '{"ThemeDefault":"pmahomme"}');
--
-- Database: `testme`
--

-- --------------------------------------------------------

--
-- Table structure for table `people`
--

CREATE TABLE IF NOT EXISTS `people` (
  `userid` int(4) unsigned NOT NULL,
  `fname` text NOT NULL,
  `lname` text NOT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `people`
--

INSERT INTO `people` (`userid`, `fname`, `lname`) VALUES
(0, 'haley', 'dennis'),
(1, 'dallin', 'warne');
--
-- Database: `webuser`
--

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
