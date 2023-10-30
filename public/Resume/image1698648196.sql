-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 27, 2023 at 06:13 AM
-- Server version: 10.5.22-MariaDB
-- PHP Version: 8.1.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sdsjewel_puneicai`
--

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `firm_name` varchar(255) DEFAULT NULL,
  `contact_person_name` varchar(255) DEFAULT NULL,
  `contact_person_number` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `pincode` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `company_email` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`id`, `firm_name`, `contact_person_name`, `contact_person_number`, `address`, `pincode`, `created_at`, `updated_at`, `company_email`) VALUES
(2, 'sam', 'Rahul', '8734331123', 'pune', '411022', '2023-09-23 05:58:09', '2023-09-23 05:58:09', NULL),
(3, 'sam', 'Rahul', '8734331123', 'Nashik', '411022', '2023-09-23 05:58:15', '2023-09-23 06:55:18', NULL),
(4, 'Vaishnavi Jadhav', 'Rahul', '8734331123', 'Baramati', '411022', '2023-09-23 05:58:22', '2023-09-27 06:46:56', NULL),
(7, 'Harshali', 'Rahul', '8734331123', 'pune', '411022', '2023-09-29 12:22:06', '2023-09-29 12:22:06', NULL),
(8, 'Sainath', 'Rahul', '8734331123', 'Market Yard Pune', '411022', '2023-09-29 12:46:26', '2023-10-03 12:30:16', 'sainath@gmail.com'),
(9, 'Sangram Ghadge', 'Harshali', '7038725228', 'pune', '411022', '2023-09-29 13:08:33', '2023-09-29 13:08:33', NULL),
(10, 'Neuromonk', 'akshay', '8203322211', 'pune', '411033', '2023-10-02 05:13:37', '2023-10-02 05:17:13', 'sourabh@gmail.com'),
(11, 'sam', 'Rahul', '8734331123', 'pune', '411022', '2023-10-03 09:01:11', '2023-10-03 09:01:11', 'sam@gmail.com'),
(12, NULL, NULL, NULL, NULL, '415311', '2023-10-19 12:49:12', '2023-10-19 12:49:12', NULL),
(13, 'Rohit', 'Rohit Sawant', '9172268905', 'Pune', '415311', '2023-10-19 12:51:28', '2023-10-19 12:51:28', NULL),
(14, 'Rohit', 'Rohit Sawant', '9172268905', 'Pune', '415311', '2023-10-19 12:52:00', '2023-10-19 12:52:00', NULL),
(15, 'rohit', 'sawantdshdvb', NULL, 'Market Yard Pune Maharashtra', '415913', '2023-10-19 13:29:58', '2023-10-19 13:29:58', NULL),
(16, 'Vaishnavi J', 'Vaishnavi S', '9172668905', 'Market Yard Pune Maharashtra', '415311', '2023-10-19 13:41:33', '2023-10-19 13:41:33', NULL),
(17, NULL, NULL, NULL, NULL, NULL, '2023-10-20 09:07:33', '2023-10-20 09:07:33', NULL),
(18, 'ABC', 'abc Cba', '9456135487', 'Vzhzbznnan', '123456', '2023-10-20 09:12:43', '2023-10-20 09:12:43', NULL),
(19, 'CA Icai', 'ICAI', '8976543212', 'Pune', '987654', '2023-10-23 05:59:00', '2023-10-23 05:59:00', NULL),
(20, NULL, NULL, NULL, NULL, NULL, '2023-10-23 13:09:17', '2023-10-23 13:09:17', NULL),
(21, 'Ca Name', 'Sourabh', '9172268905', 'Market Yard Pune Maharashtra', '415311', '2023-10-25 13:09:24', '2023-10-25 13:09:24', NULL),
(22, 'demo', 'demo11', '9172268905', 'Mahalakshami MarketYard Pune', '345677', '2023-10-27 05:22:04', '2023-10-27 05:22:04', 'companydemo@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
