-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: dbpistongps.crg0q1tctueu.us-east-2.rds.amazonaws.com:3306
-- Generation Time: Oct 09, 2019 at 07:03 AM
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
-- Table structure for table `tc_groups`
--

CREATE TABLE IF NOT EXISTS `dbpistongps`.`tc_groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL,
  `groupid` int(11) DEFAULT NULL,
  `attributes` varchar(4000) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_groups_groupid` (`groupid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tc_groups`
--
ALTER TABLE `dbpistongps`.`tc_groups`
  ADD CONSTRAINT `fk_groups_groupid` FOREIGN KEY (`groupid`) REFERENCES `dbpistongps`.`tc_groups` (`id`) ON DELETE SET NULL;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
