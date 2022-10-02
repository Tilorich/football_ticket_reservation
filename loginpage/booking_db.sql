-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 21, 2020 at 02:34 PM
-- Server version: 10.1.8-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `booking_db`
--
CREATE DATABASE IF NOT EXISTS `booking_db` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `booking_db`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `fullname` varchar(40) DEFAULT NULL,
  `contact` varchar(30) DEFAULT NULL,
  `email` varchar(140) DEFAULT NULL,
  `username` varchar(70) DEFAULT NULL,
  `password` varchar(130) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `fullname`, `contact`, `email`, `username`, `password`) VALUES
(1, 'Richard Mba', '08152644505', 'mbarichard18@yahoo.com', 'admin', 'america0442');

-- --------------------------------------------------------

--
-- Table structure for table `available_class`
--

CREATE TABLE `available_class` (
  `class_id` varchar(120) NOT NULL,
  `class_name` varchar(80) NOT NULL,
  `class_capacity` smallint(6) NOT NULL DEFAULT '0',
  `class_price` double NOT NULL DEFAULT '10',
  `description` longtext
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `booking_details`
--

CREATE TABLE `booking_details` (
  `order_ref` varchar(255) NOT NULL,
  `fullname` varchar(120) NOT NULL,
  `contact` varchar(40) DEFAULT NULL,
  `gender` varchar(40) DEFAULT NULL,
  `class_reserved` varchar(255) NOT NULL,
  `destination` varchar(180) NOT NULL,
  `seats_reserved` varchar(50) NOT NULL DEFAULT '1',
  `date_reserved` varchar(50) DEFAULT NULL,
  `transaction_id` varchar(190) NOT NULL,
  `account` varchar(130) NOT NULL,
  `amount` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `booking_details`
--

INSERT INTO `booking_details` (`order_ref`, `fullname`, `contact`, `gender`, `class_reserved`, `destination`, `seats_reserved`, `date_reserved`, `transaction_id`, `account`, `amount`) VALUES
('RS41O20E18C', 'Richard Mba', 'mbarichard18@gmail.com', 'MALE', 'Middle Class Travel', 'NSUKKA to LAGOS', '2', 'March 04, 2020', '2526226', 'ACCESS_BANK', '52.03'),
('CO99S74E14B', 'Nwaogu Williams', 'nwaoguwilliams@gmail.com', 'MALE', 'High Class Travel', 'NSUKKA to ABUJA', '1', 'March 02, 2020', '9898', 'DIAMOND_BANK', '52.03'),
('BR58S76A21E', 'Chidubem Mba', 'dubem@gmail.com', 'FEMALE', 'Lower Class Travel', 'ENUGU to LAGOS', '1', 'March 02, 2020', '111', 'KEYSTONE_BANK', '52.03'),
('EA29R32S70C', 'Chisom Nnaji', 'elizabeth@gmail.com', 'FEMALE', 'Middle Class Travel', 'LAGOS to ABUJA', '1', 'March 03, 2020', '11', 'ACCESS_BANK', '52.03'),
('CS27E31O63R', 'LOGARTS HOTEL', 'emperorcuzzy6@gmail.com', 'FEMALE', 'Middle Class Travel', 'LAGOS to ABUJA', '1', 'March 04, 2020', '123', 'EQUITY_BANK', '52.03'),
('RO85T62B49E', 'Onah Paschal', 'papassi@gmail.com', 'MALE', 'First Row', 'Ifeanyi Ubah Stadium', '1', 'March 02, 2020', '122', 'FIRST_BANK', '52.03'),
('BA29E76T81S', 'Ojukwu Francis Uchenna', 'francis@gmail.com', 'MALE', 'Second Row', 'Stamford Bridge', '1', 'March 03, 2020', '8532', 'FIRST_BANK', '1,500.00');

-- --------------------------------------------------------

--
-- Table structure for table `tickets_generated`
--

CREATE TABLE `tickets_generated` (
  `ticket_ref` varchar(120) NOT NULL,
  `order_ref` varchar(120) NOT NULL,
  `travel_class` varchar(255) NOT NULL,
  `date_processed` datetime DEFAULT NULL,
  `destination` varchar(120) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `amount` double DEFAULT '0',
  `payment_via` varchar(180) DEFAULT NULL,
  `transaction_id` varchar(210) NOT NULL,
  `status` varchar(80) DEFAULT 'unused'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`amount`, `payment_via`, `transaction_id`, `status`) VALUES
(7500, 'INTER', 'LORSO93045KWE', 'used');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`fullname`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `available_class`
--
ALTER TABLE `available_class`
  ADD PRIMARY KEY (`class_id`,`class_name`),
  ADD UNIQUE KEY `class_name` (`class_name`);

--
-- Indexes for table `booking_details`
--
ALTER TABLE `booking_details`
  ADD PRIMARY KEY (`order_ref`),
  ADD KEY `available_classbooking_details` (`class_reserved`),
  ADD KEY `transaction_id` (`transaction_id`);

--
-- Indexes for table `tickets_generated`
--
ALTER TABLE `tickets_generated`
  ADD PRIMARY KEY (`ticket_ref`),
  ADD KEY `available_classtickets_generated` (`travel_class`),
  ADD KEY `booking_detailstickets_generated` (`order_ref`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`transaction_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
