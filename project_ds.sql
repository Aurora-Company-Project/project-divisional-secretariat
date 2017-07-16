-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 16, 2017 at 09:05 AM
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
CREATE DATABASE IF NOT EXISTS `project_ds` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `project_ds`;

-- --------------------------------------------------------

--
-- Table structure for table `assesment_tax_detail`
--

DROP TABLE IF EXISTS `assesment_tax_detail`;
CREATE TABLE `assesment_tax_detail` (
  `id` varchar(25) NOT NULL,
  `ward_no` int(2) NOT NULL,
  `lane` varchar(4) DEFAULT NULL,
  `side` varchar(1) NOT NULL,
  `assesment_no` int(2) NOT NULL,
  `owner_name` varchar(150) NOT NULL,
  `address` varchar(250) NOT NULL,
  `property_detail` varchar(300) DEFAULT NULL,
  `asset_value` double NOT NULL,
  `annual_tax` double NOT NULL,
  `arrears` double NOT NULL DEFAULT '0',
  `current_bal` double DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assesment_tax_detail`
--

INSERT INTO `assesment_tax_detail` (`id`, `ward_no`, `lane`, `side`, `assesment_no`, `owner_name`, `address`, `property_detail`, `asset_value`, `annual_tax`, `arrears`, `current_bal`) VALUES
('28MURL6', 28, 'MUR', 'R', 6, 'ryuty', 'hj', 'tj', 56, 1, 56, 2),
('26NR3', 26, 'NR', 'R', 3, 'hhgfh', 'gfdgfh', 'ghg', 2356, 1, 23, 5),
('27NRL8', 27, 'NR', 'L', 8, 'hggfh', 'gfh', 'ghjj', 10, 1, 78, 6),
('25VRL10', 25, 'VR', 'R', 10, 'nb', 'fdh', 'dfbhg', 100, 1, 12, 78);

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

-- --------------------------------------------------------

--
-- Table structure for table `shop_rental_detail`
--

DROP TABLE IF EXISTS `shop_rental_detail`;
CREATE TABLE `shop_rental_detail` (
  `id` int(2) NOT NULL,
  `owner_name` varchar(100) NOT NULL,
  `owner_address` varchar(200) NOT NULL,
  `shop_address` varchar(200) NOT NULL,
  `tender_value` double NOT NULL DEFAULT '0',
  `annual_tax_val` double NOT NULL DEFAULT '0',
  `arrears` double NOT NULL DEFAULT '0',
  `fines` double NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_accounts`
--

DROP TABLE IF EXISTS `user_accounts`;
CREATE TABLE `user_accounts` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(100) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `pwd` varchar(100) NOT NULL,
  `access_level` varchar(60) NOT NULL DEFAULT 'Officer'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_accounts`
--

INSERT INTO `user_accounts` (`user_id`, `user_name`, `first_name`, `last_name`, `email`, `emp_id`, `pwd`, `access_level`) VALUES
(1, 'admin', 'First', 'Last', 'abc@gmail.com', 1, 'admin', 'Admin'),
(2, 'mkaru', 'Mevan', 'Karunanayake', 'mevan@abc.com', 23, '12345', 'Officer'),
(4, 'qwer', 'mas', 'karun', 'm@123', 114, '1234', 'Officer'),
(5, 'adka', 'sdasd', 'asq', 'm@123', 2134, '123', 'Officer'),
(6, 'qwqq', 'asd', 'qw', 'm@123', 1121, '123', 'Officer'),
(7, 'qwer43', 'Mevan', 'Karunanayake', 'm@123', 123, '123', 'Officer');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assesment_tax_detail`
--
ALTER TABLE `assesment_tax_detail`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `address` (`address`);

--
-- Indexes for table `policies`
--
ALTER TABLE `policies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shop_rental_detail`
--
ALTER TABLE `shop_rental_detail`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `shop_address` (`shop_address`);

--
-- Indexes for table `user_accounts`
--
ALTER TABLE `user_accounts`
  ADD PRIMARY KEY (`user_name`),
  ADD UNIQUE KEY `emp_id` (`emp_id`),
  ADD UNIQUE KEY `user_name` (`user_name`),
  ADD UNIQUE KEY `user_id` (`user_id`),
  ADD KEY `user_name_2` (`user_name`),
  ADD KEY `user_name_3` (`user_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user_accounts`
--
ALTER TABLE `user_accounts`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
