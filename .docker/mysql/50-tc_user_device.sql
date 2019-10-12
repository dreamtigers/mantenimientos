-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: dbpistongps.crg0q1tctueu.us-east-2.rds.amazonaws.com:3306
-- Generation Time: Oct 11, 2019 at 11:21 PM
-- Server version: 5.6.41-log
-- PHP Version: 7.2.22-1+ubuntu18.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbpistongps`
--

-- --------------------------------------------------------

--
-- Table structure for table `tc_user_device`
--

CREATE TABLE IF NOT EXISTS `dbpistongps`.`tc_user_device` (
  `userid` int(11) NOT NULL,
  `deviceid` int(11) NOT NULL,
  KEY `fk_user_device_deviceid` (`deviceid`),
  KEY `fk_user_device_userid` (`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tc_user_device`
--
ALTER TABLE `dbpistongps`.`tc_user_device`
  ADD CONSTRAINT `fk_user_device_deviceid` FOREIGN KEY (`deviceid`) REFERENCES `dbpistongps`.`tc_devices` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_user_device_userid` FOREIGN KEY (`userid`) REFERENCES `dbpistongps`.`tc_users` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
