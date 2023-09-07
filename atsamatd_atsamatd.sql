-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 07, 2023 at 03:26 PM
-- Server version: 10.5.17-MariaDB
-- PHP Version: 8.0.30

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
  `authen_username` varchar(225) COLLATE utf8_unicode_ci NOT NULL,
  `authen_password` varchar(225) COLLATE utf8_unicode_ci NOT NULL,
  `authen_status` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
  `authen_timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `authen_users`
--

INSERT INTO `authen_users` (`authen_user_id`, `authen_username`, `authen_password`, `authen_status`, `authen_timestamp`) VALUES
(1, 'admin', '123456', '1', '2023-09-06 03:54:36');

-- --------------------------------------------------------

--
-- Table structure for table `kanji_products`
--

CREATE TABLE `kanji_products` (
  `product_id` int(10) NOT NULL,
  `product_name` varchar(225) COLLATE utf8_unicode_ci NOT NULL,
  `product_price` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `product_amount` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `product_user_id` int(10) NOT NULL,
  `product_status` int(10) NOT NULL DEFAULT 1,
  `product_timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `product_img` int(11) NOT NULL,
  `product_detail` text COLLATE utf8_unicode_ci NOT NULL,
  `product_sub_detail` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `comment_id` int(10) NOT NULL,
  `review_id` int(10) NOT NULL
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
-- Indexes for table `kanji_products`
--
ALTER TABLE `kanji_products`
  ADD PRIMARY KEY (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `authen_users`
--
ALTER TABLE `authen_users`
  MODIFY `authen_user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `kanji_products`
--
ALTER TABLE `kanji_products`
  MODIFY `product_id` int(10) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
