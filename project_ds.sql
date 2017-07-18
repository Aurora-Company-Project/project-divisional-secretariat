-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 18, 2017 at 07:27 AM
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
-- Table structure for table `assesment_tax_bills`
--

CREATE TABLE `assesment_tax_bills` (
  `bill_no` int(10) UNSIGNED NOT NULL,
  `id` varchar(8) NOT NULL,
  `date_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `payement` double NOT NULL,
  `bill_state` varchar(10) NOT NULL DEFAULT 'Issued'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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

--
-- Dumping data for table `assesment_tax_detail`
--

INSERT INTO `assesment_tax_detail` (`id`, `ward_no`, `lane`, `side`, `assesment_no`, `owner_name`, `address`, `property_detail`, `asset_value`, `annual_tax`, `arrears`, `current_bal`) VALUES
('27VRL10', 27, 'VR', 'L', 10, 'Mevan', 'No. 65,\r\nGampaha', 'asdfgh', 1000000, 10000, 70000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `policies`
--

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
-- Table structure for table `shop_rental_bills`
--

CREATE TABLE `shop_rental_bills` (
  `bill_no` int(10) UNSIGNED NOT NULL,
  `customer_id` int(2) NOT NULL,
  `date_time` datetime NOT NULL,
  `payment` double NOT NULL,
  `bill_state` varchar(10) NOT NULL DEFAULT 'Issued'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
  `monthly_rental` double NOT NULL DEFAULT '0',
  `arrears` double NOT NULL DEFAULT '0',
  `fines` double NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shop_rental_detail`
--

INSERT INTO `shop_rental_detail` (`id`, `owner_name`, `owner_address`, `shop_address`, `tender_value`, `monthly_rental`, `arrears`, `fines`) VALUES
(10, 'Mevan', 'No. 75, Gampaha', 'No. 80, Bemmulla.', 1000000, 1000, 7000, 0);

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
  `pwd` varchar(40) NOT NULL,
  `access_level` varchar(60) NOT NULL DEFAULT 'Officer',
  `account_state` int(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_accounts`
--

INSERT INTO `user_accounts` (`user_id`, `user_name`, `first_name`, `last_name`, `email`, `emp_id`, `pwd`, `access_level`, `account_state`) VALUES
(1, 'admin', 'First', 'Last', 'abc@gmail.com', 1, 'admin', 'Admin', 1),
(8, 'officer', 'Second', 'Third', 'oficer@123', 10, 'SHA(qwert)', 'Officer', 1),
(9, 'asd', 'ajda', 'asdkj', 'm@123', 111, '$1$JE1.eA2.$Wvsi4dhme39oaWXXJeExW1', 'Officer', 0),
(10, 'zxc', 'asda', 'sasd', '100@123', 14, '19b58543c85b97c5498edfd89c11c3aa8cb5fe51', 'Officer', 0),
(11, 'mevan', 'First', 'Last', '100@123', 100, 'f10e2821bbbea527ea02200352313bc059445190', 'Officer', 0),
(12, 'asd123', 'asda', 'adas', '123@123', 12, 'f10e2821bbbea527ea02200352313bc059445190', 'Officer', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assesment_tax_bills`
--
ALTER TABLE `assesment_tax_bills`
  ADD PRIMARY KEY (`bill_no`);

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
-- Indexes for table `shop_rental_bills`
--
ALTER TABLE `shop_rental_bills`
  ADD PRIMARY KEY (`bill_no`);

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
-- AUTO_INCREMENT for table `assesment_tax_bills`
--
ALTER TABLE `assesment_tax_bills`
  MODIFY `bill_no` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `shop_rental_bills`
--
ALTER TABLE `shop_rental_bills`
  MODIFY `bill_no` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user_accounts`
--
ALTER TABLE `user_accounts`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
DELIMITER $$
--
-- Events
--
CREATE DEFINER=`root`@`localhost` EVENT `update_arrears_assesment_tax` ON SCHEDULE EVERY 1 YEAR STARTS '2017-07-16 00:00:00' ON COMPLETION NOT PRESERVE ENABLE DO UPDATE assesment_tax_detail SET arrears = arrears + current_bal$$

CREATE DEFINER=`root`@`localhost` EVENT `update_current_balance_assesment_tax` ON SCHEDULE EVERY 1 QUARTER STARTS '2017-07-01 00:00:00' ON COMPLETION NOT PRESERVE ENABLE DO UPDATE assesment_tax_detail SET current_bal = current_bal + (annual_tax/4)$$

CREATE DEFINER=`root`@`localhost` EVENT `update_arrears_shop_rental` ON SCHEDULE EVERY 1 MONTH STARTS '2017-07-11 00:00:00' ON COMPLETION NOT PRESERVE ENABLE DO UPDATE shop_rental_detail SET arrears = arrears + monthly_rental$$

CREATE DEFINER=`root`@`localhost` EVENT `update_fines_shop_rental` ON SCHEDULE EVERY 1 MONTH STARTS '2017-07-11 00:00:00' ON COMPLETION NOT PRESERVE ENABLE DO UPDATE shop_rental_detail
SET fines = fines + monthly_rental *(SELECT shop_rental_fine_rate FROM policies WHERE id=1)/100 WHERE arrears>0$$

DELIMITER ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
