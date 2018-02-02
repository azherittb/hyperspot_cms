-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 24, 2018 at 07:29 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hyperspot`
--

-- --------------------------------------------------------

--
-- Table structure for table `beacons`
--

CREATE TABLE `beacons` (
  `slno` bigint(20) NOT NULL,
  `uuid` varchar(100) NOT NULL,
  `identifier` varchar(128) NOT NULL,
  `major` int(11) DEFAULT NULL,
  `monor` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `push_log`
--

CREATE TABLE `push_log` (
  `slno` bigint(100) NOT NULL,
  `offer_id` bigint(20) NOT NULL,
  `user_id` varchar(100) DEFAULT NULL,
  `dev_id` varchar(100) DEFAULT NULL,
  `datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `push_log`
--

INSERT INTO `push_log` (`slno`, `offer_id`, `user_id`, `dev_id`, `datetime`, `status`) VALUES
(1, 1, '1234', 'dev9886724989', '2018-01-24 00:07:47', 'sent'),
(2, 1, '1234', 'dev9886724989', '2018-01-24 00:12:22', 'sent'),
(3, 1, '1234', 'dev9886724989', '2018-01-24 00:15:54', 'sent'),
(4, 1, '1234', 'dev9886724989', '2018-01-24 00:22:22', 'sent'),
(5, 1, '1234', 'dev9886724989', '2018-01-24 00:25:28', 'sent'),
(6, 1, '1234', 'dev9886724989', '2018-01-24 01:25:18', 'sent'),
(7, 1, '1234', 'dev9886724989', '2018-01-24 01:39:50', 'sent'),
(8, 1, '1234', 'dev9886724989', '2018-01-24 01:40:59', 'sent'),
(9, 1, '1234', 'dev9886724989', '2018-01-24 01:47:11', 'sent'),
(10, 1, '1234', 'dev9886724989', '2018-01-24 01:48:53', 'sent'),
(11, 1, '1234', 'dev9886724989', '2018-01-24 01:50:35', 'sent'),
(12, 1, '1234', 'dev9886724989', '2018-01-24 01:55:55', 'sent'),
(13, 1, '1234', 'dev9886724989', '2018-01-24 01:59:01', 'sent');

-- --------------------------------------------------------

--
-- Table structure for table `push_offers`
--

CREATE TABLE `push_offers` (
  `slno` bigint(20) NOT NULL,
  `region` varchar(50) NOT NULL,
  `event` varchar(25) DEFAULT NULL,
  `message` varchar(128) NOT NULL,
  `title` varchar(100) NOT NULL,
  `subtitle` varchar(100) DEFAULT NULL,
  `date_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `push_offers`
--

INSERT INTO `push_offers` (`slno`, `region`, `event`, `message`, `title`, `subtitle`, `date_time`) VALUES
(1, 'BlueBerry - Bar', 'enter', 'BlueBerry Bar offers a vintage drink at happy hours from 7 PM - 9 PM', 'Welcome to BlueBerry - Bar', NULL, '2018-01-23 23:45:25'),
(2, 'Icycool - Lobby', 'enter', 'Ritz Carlton welcomes you to Venetian Village', 'Welcome to Icycool - Lobby', NULL, '2018-01-23 23:45:25'),
(3, 'Mint - Restaurant', 'enter', 'Restaurant offers a special cuisine at 20% off today', 'Welcome to Mint - Restaurant', NULL, '2018-01-23 23:45:25'),
(4, 'Beetroot - Bar', 'enter', 'Beetroot - Bar', 'Welcome to Beetroot - Bar', NULL, '2018-01-23 23:45:25'),
(5, 'Candy - Lobby', 'enter', 'Ritz Carlton welcomes you to Venetian Village', 'Welcome to Candy - Lobby', NULL, '2018-01-23 23:45:25'),
(6, 'Lemon - Restaurant', 'enter', 'Restaurant offers a special cuisine at 20% off today', 'Welcome to Lemon - Restaurant', NULL, '2018-01-23 23:45:25');

-- --------------------------------------------------------

--
-- Table structure for table `push_registration`
--

CREATE TABLE `push_registration` (
  `slno` bigint(30) UNSIGNED NOT NULL,
  `user_id` bigint(30) UNSIGNED NOT NULL,
  `dev_id` varchar(50) NOT NULL,
  `token` varchar(500) NOT NULL,
  `date_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `push_registration`
--

INSERT INTO `push_registration` (`slno`, `user_id`, `dev_id`, `token`, `date_time`) VALUES
(1, 1234, 'dev9886724989', 'e2dkcQjKduo:APA91bEojV6MBr0kZeVwzxfqPXQysRNRAxyP_H5QCjxQEE0zm8fF2n814VYfR515SWmM0zyzJ3EUmSprCPOuqef_rk6facew0blxxDIhC1xTt6WDT16GsgpZcqXajBYyWWgfOhWYD_Wj', '2018-01-23 11:43:45'),
(2, 1234, 'dev19886724989', 'asdfjksadflksdfjlxe8ladsk_asdkfasdfjasdfkjsadfj', '2018-01-23 11:49:46');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `beacons`
--
ALTER TABLE `beacons`
  ADD PRIMARY KEY (`slno`);

--
-- Indexes for table `push_log`
--
ALTER TABLE `push_log`
  ADD PRIMARY KEY (`slno`);

--
-- Indexes for table `push_offers`
--
ALTER TABLE `push_offers`
  ADD PRIMARY KEY (`slno`);

--
-- Indexes for table `push_registration`
--
ALTER TABLE `push_registration`
  ADD PRIMARY KEY (`slno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `beacons`
--
ALTER TABLE `beacons`
  MODIFY `slno` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `push_log`
--
ALTER TABLE `push_log`
  MODIFY `slno` bigint(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `push_offers`
--
ALTER TABLE `push_offers`
  MODIFY `slno` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `push_registration`
--
ALTER TABLE `push_registration`
  MODIFY `slno` bigint(30) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
