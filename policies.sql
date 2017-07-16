-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 16, 2017 at 09:10 AM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_ds`
--

-- --------------------------------------------------------

--
-- Table structure for table `policies`
--

DROP TABLE IF EXISTS `policies`;
CREATE TABLE `policies` (
  `id` int(2) NOT NULL,
  `secretary_of_the_pradeshiya_saba` varchar(45) NOT NULL,
  `gazette_no` varchar(45) NOT NULL,
  `gazette_date` date NOT NULL,
  `assesment_tax_rate` float NOT NULL,
  `discount_for_full_annual_payment` float NOT NULL,
  `discount_for_full_quater_payment` float NOT NULL,
  `shop_rental_fine_rate` float NOT NULL,
  `year` int(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `policies`
--

INSERT INTO `policies` (`id`, `secretary_of_the_pradeshiya_saba`, `gazette_no`, `gazette_date`, `assesment_tax_rate`, `discount_for_full_annual_payment`, `discount_for_full_quater_payment`, `shop_rental_fine_rate`, `year`) VALUES
(1, 'K.A Upul Ranjith', '453/6', '1987-05-12', 1, 2, 4, 7, 10);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `policies`
--
ALTER TABLE `policies`
  ADD PRIMARY KEY (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
