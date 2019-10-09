-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: dbpistongps.crg0q1tctueu.us-east-2.rds.amazonaws.com:3306
-- Generation Time: Oct 09, 2019 at 07:10 AM
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
-- Table structure for table `tc_maintenances`
--

CREATE TABLE IF NOT EXISTS `dbpistongps`.`tc_maintenances` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(4000) NOT NULL,
  `type` varchar(128) NOT NULL,
  `start` double NOT NULL DEFAULT '0',
  `period` double NOT NULL DEFAULT '0',
  `attributes` varchar(4000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
