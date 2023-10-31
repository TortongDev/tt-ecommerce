-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 31, 2023 at 09:55 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `atsamatd_atsamatd`
--

-- --------------------------------------------------------

--
-- Table structure for table `authen_users`
--

CREATE TABLE `authen_users` (
  `authen_user_id` int(10) NOT NULL,
  `authen_username` varchar(225) NOT NULL,
  `authen_password` varchar(225) NOT NULL,
  `authen_status` varchar(10) NOT NULL DEFAULT '1',
  `authen_timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `per_firstname` varchar(225) NOT NULL,
  `per_lastname` varchar(225) NOT NULL,
  `per_email` varchar(225) NOT NULL,
  `per_phone_number` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `authen_users`
--
ALTER TABLE `authen_users`
  ADD PRIMARY KEY (`authen_user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `authen_users`
--
ALTER TABLE `authen_users`
  MODIFY `authen_user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
