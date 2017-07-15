-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 15, 2017 at 04:58 PM
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
-- Table structure for table `assesment_tax_detail`
--

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

-- --------------------------------------------------------

--
-- Table structure for table `policies`
--

CREATE TABLE `policies` (
  `id` int(11) NOT NULL,
  `secretary_of_the_pradeshiya_saba` varchar(45) NOT NULL,
  `gazette_no` varchar(45) NOT NULL,
  `gazette_date` date NOT NULL,
  `assesment_tax_rate` varchar(45) NOT NULL,
  `discount_for_full_annual_payment` varchar(45) NOT NULL,
  `discount_for_full_quater_payment` varchar(45) NOT NULL,
  `shop_rental_fine_rate` varchar(45) NOT NULL,
  `year` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `policies`
--

INSERT INTO `policies` (`id`, `secretary_of_the_pradeshiya_saba`, `gazette_no`, `gazette_date`, `assesment_tax_rate`, `discount_for_full_annual_payment`, `discount_for_full_quater_payment`, `shop_rental_fine_rate`, `year`) VALUES
(1, 'K.A Upul Ranjith', '453/6', '1987-05-12', '7%', '10%', '5%', '10%', 10);

-- --------------------------------------------------------

--
-- Table structure for table `shop_rental_detail`
--

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
