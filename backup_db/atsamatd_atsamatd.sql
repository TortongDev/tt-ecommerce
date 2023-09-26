-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 22, 2023 at 09:21 PM
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
-- Table structure for table `authen_admin`
--

CREATE TABLE `authen_admin` (
  `authen_user_id` int(10) NOT NULL,
  `authen_username` varchar(225) COLLATE utf8_unicode_ci NOT NULL,
  `authen_password` varchar(225) COLLATE utf8_unicode_ci NOT NULL,
  `authen_status` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
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
-- Table structure for table `kanji_banners`
--

CREATE TABLE `kanji_banners` (
  `banner_id` int(10) NOT NULL,
  `banner_topic` char(20) COLLATE utf8_unicode_ci NOT NULL,
  `banner_status` int(11) NOT NULL DEFAULT 2,
  `banner_timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `picture` varchar(225) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `kanji_banners`
--

INSERT INTO `kanji_banners` (`banner_id`, `banner_topic`, `banner_status`, `banner_timestamp`, `picture`) VALUES
(6, 'B1', 2, '2023-09-21 05:59:27', 'Fresh _ Healthy.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `kanji_partners`
--

CREATE TABLE `kanji_partners` (
  `partner_id` int(10) NOT NULL,
  `partner_member_id` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `partner_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `partner_detail` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `partner_status` char(1) COLLATE utf8_unicode_ci NOT NULL DEFAULT current_timestamp(),
  `partner_img` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `kanji_partners`
--

INSERT INTO `kanji_partners` (`partner_id`, `partner_member_id`, `partner_name`, `partner_detail`, `partner_status`, `partner_img`, `timestamp`) VALUES
(3, 'JJSHOP', 'ร้านJJSHOP', 'ร้านJJSHOP ขายผัก ขายปลา อุปกรณ์ตกปลา', '1', 'green-oak-1.jpg', '2023-09-18 13:08:36'),
(4, 'ASHOP', 'ร้านASHOP', 'ASHOP ขายผักสด ผลไม้สด', '1', 'original-1634632690275.jpg', '2023-09-18 13:08:36'),
(17, 'PARTNER-90', 'ssssss', 'sss', '1', 'uploads/e3.png', '2023-09-20 01:48:06'),
(18, 'PARTNER-75', 'ssss', 's', '1', 'uploads/e1.png', '2023-09-20 01:55:15'),
(19, 'PARTNER-26', 'ssss', 's', '1', 'uploads/e1.png', '2023-09-20 02:10:51'),
(20, 'PARTNER-11', 'ssss', 's', '1', 'uploads/e1.png', '2023-09-20 02:10:51'),
(21, 'PARTNER-70', 'ssss', 's', '1', 'uploads/e1.png', '2023-09-20 02:11:13'),
(22, 'PARTNER-46', 'ssss', 's', '1', 'uploads/', '2023-09-20 02:13:29'),
(23, 'PARTNER-26', 'ssssss', 'sss', '1', 'uploads/e3.png', '2023-09-20 02:13:47');

-- --------------------------------------------------------

--
-- Table structure for table `kanji_products`
--

CREATE TABLE `kanji_products` (
  `product_id` int(10) NOT NULL,
  `product_member_id` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `product_name` varchar(225) COLLATE utf8_unicode_ci NOT NULL,
  `product_price` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `product_amount` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `product_type_name` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `product_shop_name` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `product_type_id` int(10) NOT NULL,
  `product_user_id` int(10) NOT NULL,
  `product_status` int(10) NOT NULL DEFAULT 1,
  `product_timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `product_img` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `product_detail` text COLLATE utf8_unicode_ci NOT NULL,
  `product_sub_detail` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `comment_id` int(10) NOT NULL,
  `review_id` int(10) NOT NULL,
  `product_shop_id` int(10) NOT NULL,
  `option_price` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `option_amount` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `kanji_products`
--

INSERT INTO `kanji_products` (`product_id`, `product_member_id`, `product_name`, `product_price`, `product_amount`, `product_type_name`, `product_shop_name`, `product_type_id`, `product_user_id`, `product_status`, `product_timestamp`, `product_img`, `product_detail`, `product_sub_detail`, `comment_id`, `review_id`, `product_shop_id`, `option_price`, `option_amount`) VALUES
(8, 'PROKJ-', 'Cos Lettuce or Romaine Lettuce (กรีนคอส)', '20', '20', 'ผัก', '', 0, 1, 1, '2023-09-08 04:48:39', 'uploads/Cos-Lettuce.jpg', 'ผักสลัดคอส (Cos Lettuce) หรือผักกาดโรเมน (Romaine Lettuce) จุดเด่นคือความกรอบ ใบเรียวยาวสีเขียวตลอดทั้งใบ ไม่มีกลิ่นเหม็นเขียว นิยมรับ', 'ผักสลัดคอส (Cos Lettuce) หรือผักกาดโรเมน (Romaine Lettuce) จุดเด่นคือความกรอบ ใบเรียวยาวสีเขียวตลอดทั้งใบ ไม่มีกลิ่นเหม็นเขียว นิยมรับทาน', 0, 0, 0, 'กรัม', 'กรัม'),
(9, 'PROKJ-', 'ssss', '12', '12', 'ผัก', '', 0, 1, 1, '2023-09-08 07:56:09', 'uploads/Frillice_Ice_Berg.jpg', 'sdsdsdsdsds', 'sss', 0, 0, 0, 'กรัม', 'กรัม'),
(10, 'PROKJ-', 'Frillice Ice Berg Lettuce (ฟิลเลย์ไอซ์เบิร์ก)', '100', '100', 'ผัก', '', 0, 2, 1, '2023-09-12 04:05:10', 'uploads/Frillice_Ice_Berg.jpg', 'ฟิลเลย์ไอซ์เบิร์ก (Frillice Ice Berg Lettuce) คือ ผักสลัดชนิดหนึ่ง ใบมีสีเขียวอ่อนถึงสีเขียวเข้ม เรียวยาวเป็นทรงพุ่ม ปลายdddddd', 'ฟิลเลย์ไอซ์เบิร์ก (Frillice Ice Berg Lettuce) คือ ผักสลัดชนิดหนึ่ง ใบมีสีเขียวอ่อนถึงสีเขียวเข้ม เรียวยาวเป็นทรงพุ่ม ปลายdddddd', 0, 0, 0, 'กิโลกรัม', 'กรัม'),
(11, 'PROKJ-', 'Green Oak Lettuce (กรีนโอ๊ค )', '110', '100', 'ผัก', '', 0, 2, 1, '2023-09-12 04:06:12', 'uploads/green-oak-1.jpg', 'Green Oak Lettuce (กรีนโอ๊ค ) · ช่วยในเรื่องของระบบการย่อยอาหาร · วิตามินบีสูง · วิตามินซีสูง · ไฟเบอร์สูงช่วยเบาเทาอาการท้องผูก · บำรุงสายตา · บำรุงเส้นผมsss', 'Green Oak Lettuce (กรีนโอ๊ค ) · ช่วยในเรื่องของระบบการย่อยอาหาร · วิตามินบีสูง · วิตามินซีสูง · ไฟเบอร์สูงช่วยเบาเทาอาการท้องผูก · บำรุงสายตา · บำรุงเส้นผม\r\ndddddd', 0, 0, 0, 'กิโลกรัม', 'กรัม'),
(12, 'PROKJ-', 'Green Oak Lettuce (กรีนโอ๊ค )', '110', '100', 'ผัก', '', 0, 2, 1, '2023-09-12 04:07:11', 'uploads/green-oak-1.jpg', 'Green Oak Lettuce (กรีนโอ๊ค ) · ช่วยในเรื่องของระบบการย่อยอาหาร · วิตามินบีสูง · วิตามินซีสูง · ไฟเบอร์สูงช่วยเบาเทาอาการท้องผูก · บำรุงสายตา · บำรุงเส้นผมsss', 'Green Oak Lettuce (กรีนโอ๊ค ) · ช่วยในเรื่องของระบบการย่อยอาหาร · วิตามินบีสูง · วิตามินซีสูง · ไฟเบอร์สูงช่วยเบาเทาอาการท้องผูก · บำรุงสายตา · บำรุงเส้นผม\r\ndddddd', 0, 0, 0, 'กิโลกรัม', 'กรัม'),
(13, 'PROKJ-', 'MINI COS ORGANIC (มินิคอส ออร์แกนิค).', '90', '100', 'ผัก', '', 0, 2, 1, '2023-09-12 04:07:33', 'uploads/MG_0293-Selected.jpg', 'MINI COS ORGANIC ราคากิโลกรัมละ 100 บาท. กากใยสูงช่วยในเรื่องของระบบขับถ่าย มีโพรแทสเซียม และกรดโฟเลตสูง มีสารต้านอนุมูลอิสระเพื่อช่วยลดความเสื่อมของจอประสาทตาในผู้สูงอายุ', 'MINI COS ORGANIC ราคากิโลกรัมละ 100 บาท. กากใยสูงช่วยในเรื่องของระบบขับถ่าย มีโพรแทสเซียม และกรดโฟเลตสูง มีสารต้านอนุมูลอิสระเพื่อช่วยลดความเสื่อมของจอประสาทตาในผู้สูงอายุ', 0, 0, 0, 'กิโลกรัม', 'กรัม'),
(14, 'PROKJ-', 'MINI COS ORGANIC (มินิคอส ออร์แกนิค).', '90', '100', 'ผัก', '', 0, 2, 1, '2023-09-12 04:07:57', 'uploads/MG_0293-Selected.jpg', 'MINI COS ORGANIC ราคากิโลกรัมละ 100 บาท. กากใยสูงช่วยในเรื่องของระบบขับถ่าย มีโพรแทสเซียม และกรดโฟเลตสูง มีสารต้านอนุมูลอิสระเพื่อช่วยลดความเสื่อมของจอประสาทตาในผู้สูงอายุ', 'MINI COS ORGANIC ราคากิโลกรัมละ 100 บาท. กากใยสูงช่วยในเรื่องของระบบขับถ่าย มีโพรแทสเซียม และกรดโฟเลตสูง มีสารต้านอนุมูลอิสระเพื่อช่วยลดความเสื่อมของจอประสาทตาในผู้สูงอายุ', 0, 0, 0, 'กิโลกรัม', 'กรัม'),
(15, 'PROKJ-', 'ผักชี (ชื่อวิทยาศาสตร์: Coriandrum sativum)', '40', '100', 'ผัก', '', 0, 2, 1, '2023-09-12 04:08:25', 'uploads/original-1634632690275.jpg', 'ผักชีเป็นผักที่ปลูกง่าย และไม่ค่อยพบโรคหรือแมลงศัตรูพืชมากนัก เนื่องจากมีกลิ่นน้ำมันหอมระเหยที่ช่วยไล่แมลงได้ มีหลักฐานการปลูกในประเทศอียิปต์นานกว่า 3500 ปี.', 'ผักชีเป็นผักที่ปลูกง่าย และไม่ค่อยพบโรคหรือแมลงศัตรูพืชมากนัก เนื่องจากมีกลิ่นน้ำมันหอมระเหยที่ช่วยไล่แมลงได้ มีหลักฐานการปลูกในประเทศอียิปต์นานกว่า 3500 ปี.', 0, 0, 0, 'กิโลกรัม', 'กรัม'),
(16, 'PROKJ-', 'Red Oak Lettuce (เรดโอ๊ค)', '150', '120', 'ผัก', '', 0, 2, 1, '2023-09-12 04:08:58', 'uploads/เรดโอ๊ค.jpg', 'เป็นผักสลัดใบ ปลายใบหยิกเป็นแฉกชัดเจนกว่ากรีนโอ๊ค ใบสีแดงเข้มถึงน้ำตาลแดง ก้านสีเขียว เป็นผักสลัดใบชนิดที่เป็นที่นิยมมากที่สุดชนิดหนึ่ง.', 'เป็นผักสลัดใบ ปลายใบหยิกเป็นแฉกชัดเจนกว่ากรีนโอ๊ค ใบสีแดงเข้มถึงน้ำตาลแดง ก้านสีเขียว เป็นผักสลัดใบชนิดที่เป็นที่นิยมมากที่สุดชนิดหนึ่ง.', 0, 0, 0, 'กิโลกรัม', 'กรัม'),
(17, 'PROKJ-', 'Red Oak Lettuce (เรดโอ๊ค)', '150', '120', 'ผัก', '', 0, 2, 1, '2023-09-12 04:09:22', 'uploads/เรดโอ๊ค.jpg', 'เป็นผักสลัดใบ ปลายใบหยิกเป็นแฉกชัดเจนกว่ากรีนโอ๊ค ใบสีแดงเข้มถึงน้ำตาลแดง ก้านสีเขียว เป็นผักสลัดใบชนิดที่เป็นที่นิยมมากที่สุดชนิดหนึ่ง.', 'เป็นผักสลัดใบ ปลายใบหยิกเป็นแฉกชัดเจนกว่ากรีนโอ๊ค ใบสีแดงเข้มถึงน้ำตาลแดง ก้านสีเขียว เป็นผักสลัดใบชนิดที่เป็นที่นิยมมากที่สุดชนิดหนึ่ง.', 0, 0, 0, 'กิโลกรัม', 'กรัม');

-- --------------------------------------------------------

--
-- Table structure for table `kanji_product_type`
--

CREATE TABLE `kanji_product_type` (
  `type_id` int(10) NOT NULL,
  `product_type_id` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `product_type_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `product_type_detail` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `sys_timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `product_type_status` char(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `kanji_product_type`
--

INSERT INTO `kanji_product_type` (`type_id`, `product_type_id`, `product_type_name`, `product_type_detail`, `sys_timestamp`, `product_type_status`) VALUES
(4, 'KANJIID-00', 'ผัก', 'ผัก พืชสวนครัว ผักสด', '2023-09-08 03:56:39', '1'),
(5, 'KANJIID-02', 'อุปกรณ์ปลูกผัก', 'อุปกรณ์ปลูกผัก', '2023-09-08 03:57:11', '1');

-- --------------------------------------------------------

--
-- Table structure for table `kanji_slide`
--

CREATE TABLE `kanji_slide` (
  `slide_id` int(11) NOT NULL,
  `slide_picture` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slide_header` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `slide_content` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slide_status` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT '2',
  `slide_timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `kanji_slide`
--

INSERT INTO `kanji_slide` (`slide_id`, `slide_picture`, `slide_header`, `slide_content`, `slide_status`, `slide_timestamp`) VALUES
(2, '7400.jpg', '', '', '1', '2023-09-21 07:52:29'),
(3, 'shopping_6775634.png', '', '', '1', '2023-09-21 07:55:26');

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
-- Indexes for table `kanji_banners`
--
ALTER TABLE `kanji_banners`
  ADD PRIMARY KEY (`banner_id`);

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
-- Indexes for table `kanji_slide`
--
ALTER TABLE `kanji_slide`
  ADD PRIMARY KEY (`slide_id`);

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
-- AUTO_INCREMENT for table `kanji_banners`
--
ALTER TABLE `kanji_banners`
  MODIFY `banner_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `kanji_partners`
--
ALTER TABLE `kanji_partners`
  MODIFY `partner_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `kanji_products`
--
ALTER TABLE `kanji_products`
  MODIFY `product_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `kanji_product_type`
--
ALTER TABLE `kanji_product_type`
  MODIFY `type_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `kanji_slide`
--
ALTER TABLE `kanji_slide`
  MODIFY `slide_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
