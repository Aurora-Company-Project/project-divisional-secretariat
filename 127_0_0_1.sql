-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 02, 2017 at 09:16 PM
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
CREATE DATABASE IF NOT EXISTS `project_ds` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `project_ds`;

-- --------------------------------------------------------

--
-- Table structure for table `assesment_tax_detail`
--

DROP TABLE IF EXISTS `assesment_tax_detail`;
CREATE TABLE `assesment_tax_detail` (
  `id` varchar(25) NOT NULL,
  `name` varchar(150) NOT NULL,
  `address` varchar(250) NOT NULL,
  `email` varchar(60) DEFAULT NULL,
  `asset_value` double NOT NULL,
  `annual_tax` double NOT NULL,
  `arrears` double NOT NULL DEFAULT '0',
  `account_state` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_accounts`
--

DROP TABLE IF EXISTS `user_accounts`;
CREATE TABLE `user_accounts` (
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

INSERT INTO `user_accounts` (`user_name`, `first_name`, `last_name`, `email`, `emp_id`, `pwd`, `access_level`) VALUES
('admin', 'First', 'Last', 'abc@gmail.com', 1, 'admin', 'Admin'),
('mkaru', 'Mevan', 'Karunanayake', 'mevan@abc.com', 23, '12345', 'Officer'),
('mevan2', 'Mevan', 'Karun', 'mevan@123', 34, 'qwer', 'Officer'),
('qwer', 'mas', 'karun', 'm@123', 114, '1234', 'Officer'),
('adka', 'sdasd', 'asq', 'm@123', 2134, '123', 'Officer'),
('qwqq', 'asd', 'qw', 'm@123', 1121, '123', 'Officer'),
('qwer43', 'Mevan', 'Karunanayake', 'm@123', 123, '123', 'Officer');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user_accounts`
--
ALTER TABLE `user_accounts`
  ADD PRIMARY KEY (`user_name`),
  ADD UNIQUE KEY `emp_id` (`emp_id`),
  ADD UNIQUE KEY `user_name` (`user_name`),
  ADD KEY `user_name_2` (`user_name`),
  ADD KEY `user_name_3` (`user_name`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
