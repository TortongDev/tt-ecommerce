-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 11, 2023 at 05:11 AM
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
-- Table structure for table `authen_admin`
--

CREATE TABLE `authen_admin` (
  `authen_user_id` int(10) NOT NULL,
  `authen_username` varchar(225) NOT NULL,
  `authen_password` varchar(225) NOT NULL,
  `authen_status` varchar(10) NOT NULL DEFAULT '1',
  `authen_timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `authen_admin`
--

INSERT INTO `authen_admin` (`authen_user_id`, `authen_username`, `authen_password`, `authen_status`, `authen_timestamp`) VALUES
(2, 'admin', '1234', '1', '2023-09-08 06:48:01');

-- --------------------------------------------------------

--
-- Table structure for table `authen_users`
--

CREATE TABLE `authen_users` (
  `authen_user_id` int(10) NOT NULL,
  `authen_username` varchar(225) NOT NULL,
  `authen_password` varchar(225) NOT NULL,
  `authen_status` varchar(10) NOT NULL DEFAULT '1',
  `authen_timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `authen_users`
--

INSERT INTO `authen_users` (`authen_user_id`, `authen_username`, `authen_password`, `authen_status`, `authen_timestamp`) VALUES
(1, 'admin', '123456', '1', '2023-09-06 03:54:36');

-- --------------------------------------------------------

--
-- Table structure for table `kanji_partners`
--

CREATE TABLE `kanji_partners` (
  `partner_id` int(10) NOT NULL,
  `partner_member_id` varchar(10) NOT NULL,
  `partner_name` varchar(100) NOT NULL,
  `partner_detail` varchar(500) NOT NULL,
  `partner_status` char(1) NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `kanji_partners`
--

INSERT INTO `kanji_partners` (`partner_id`, `partner_member_id`, `partner_name`, `partner_detail`, `partner_status`) VALUES
(3, 'JJSHOP', 'ร้านJJSHOP', 'ร้านJJSHOP ขายผัก ขายปลา อุปกรณ์ตกปลา', '1'),
(4, 'ASHOP', 'ร้านASHOP', 'ASHOP ขายผักสด ผลไม้สด', '1');

-- --------------------------------------------------------

--
-- Table structure for table `kanji_products`
--

CREATE TABLE `kanji_products` (
  `product_id` int(10) NOT NULL,
  `product_member_id` varchar(10) NOT NULL,
  `product_name` varchar(225) NOT NULL,
  `product_price` varchar(20) NOT NULL,
  `product_amount` varchar(20) NOT NULL,
  `product_type_name` varchar(80) NOT NULL,
  `product_shop_name` varchar(80) NOT NULL,
  `product_type_id` int(10) NOT NULL,
  `product_user_id` int(10) NOT NULL,
  `product_status` int(10) NOT NULL DEFAULT 1,
  `product_timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `product_img` varchar(300) NOT NULL,
  `product_detail` text NOT NULL,
  `product_sub_detail` varchar(500) NOT NULL,
  `comment_id` int(10) NOT NULL,
  `review_id` int(10) NOT NULL,
  `product_shop_id` int(10) NOT NULL,
  `option_price` varchar(10) NOT NULL,
  `option_amount` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `kanji_products`
--

INSERT INTO `kanji_products` (`product_id`, `product_member_id`, `product_name`, `product_price`, `product_amount`, `product_type_name`, `product_shop_name`, `product_type_id`, `product_user_id`, `product_status`, `product_timestamp`, `product_img`, `product_detail`, `product_sub_detail`, `comment_id`, `review_id`, `product_shop_id`, `option_price`, `option_amount`) VALUES
(8, 'PROKJ-', 'Cos Lettuce or Romaine Lettuce (กรีนคอส)', '20', '20', 'ผัก', '', 0, 1, 1, '2023-09-08 04:48:39', 'uploads/Cos-Lettuce.jpg', 'ผักสลัดคอส (Cos Lettuce) หรือผักกาดโรเมน (Romaine Lettuce) จุดเด่นคือความกรอบ ใบเรียวยาวสีเขียวตลอดทั้งใบ ไม่มีกลิ่นเหม็นเขียว นิยมรับ', 'ผักสลัดคอส (Cos Lettuce) หรือผักกาดโรเมน (Romaine Lettuce) จุดเด่นคือความกรอบ ใบเรียวยาวสีเขียวตลอดทั้งใบ ไม่มีกลิ่นเหม็นเขียว นิยมรับทาน', 0, 0, 0, 'กรัม', 'กรัม'),
(9, 'PROKJ-', 'ssss', '12', '12', 'ผัก', '', 0, 1, 1, '2023-09-08 07:56:09', 'uploads/Frillice_Ice_Berg.jpg', 'sdsdsdsdsds', 'sss', 0, 0, 0, 'กรัม', 'กรัม');

-- --------------------------------------------------------

--
-- Table structure for table `kanji_product_type`
--

CREATE TABLE `kanji_product_type` (
  `type_id` int(10) NOT NULL,
  `product_type_id` varchar(10) NOT NULL,
  `product_type_name` varchar(100) NOT NULL,
  `product_type_detail` varchar(500) NOT NULL,
  `sys_timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `product_type_status` char(10) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `kanji_product_type`
--

INSERT INTO `kanji_product_type` (`type_id`, `product_type_id`, `product_type_name`, `product_type_detail`, `sys_timestamp`, `product_type_status`) VALUES
(4, 'KANJIID-00', 'ผัก', 'ผัก พืชสวนครัว ผักสด', '2023-09-08 03:56:39', '1'),
(5, 'KANJIID-02', 'อุปกรณ์ปลูกผัก', 'อุปกรณ์ปลูกผัก', '2023-09-08 03:57:11', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `authen_admin`
--
ALTER TABLE `authen_admin`
  ADD PRIMARY KEY (`authen_user_id`);

--
-- Indexes for table `authen_users`
--
ALTER TABLE `authen_users`
  ADD PRIMARY KEY (`authen_user_id`);

--
-- Indexes for table `kanji_partners`
--
ALTER TABLE `kanji_partners`
  ADD PRIMARY KEY (`partner_id`);

--
-- Indexes for table `kanji_products`
--
ALTER TABLE `kanji_products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `kanji_product_type`
--
ALTER TABLE `kanji_product_type`
  ADD PRIMARY KEY (`type_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `authen_admin`
--
ALTER TABLE `authen_admin`
  MODIFY `authen_user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `authen_users`
--
ALTER TABLE `authen_users`
  MODIFY `authen_user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `kanji_partners`
--
ALTER TABLE `kanji_partners`
  MODIFY `partner_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `kanji_products`
--
ALTER TABLE `kanji_products`
  MODIFY `product_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `kanji_product_type`
--
ALTER TABLE `kanji_product_type`
  MODIFY `type_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
