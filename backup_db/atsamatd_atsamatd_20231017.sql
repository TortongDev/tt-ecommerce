-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 17, 2023 at 09:28 AM
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
-- Table structure for table `kanji_banners`
--

CREATE TABLE `kanji_banners` (
  `banner_id` int(10) NOT NULL,
  `banner_topic` char(20) NOT NULL,
  `banner_status` int(11) NOT NULL DEFAULT 2,
  `banner_timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `picture` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `kanji_banners`
--

INSERT INTO `kanji_banners` (`banner_id`, `banner_topic`, `banner_status`, `banner_timestamp`, `picture`) VALUES
(6, 'B1', 1, '2023-09-21 05:59:27', '720.jpg'),
(15, 'sdasdsdas', 2, '2023-09-27 06:57:50', 'shopping_6775634.png');

-- --------------------------------------------------------

--
-- Table structure for table `kanji_orders`
--

CREATE TABLE `kanji_orders` (
  `PRM_ID` int(10) NOT NULL,
  `ORDER_ID` varchar(20) NOT NULL,
  `FIST_NAME` varchar(100) NOT NULL,
  `LAST_NAME` varchar(100) NOT NULL,
  `ORDER_TIMESTAMP` timestamp NOT NULL DEFAULT current_timestamp(),
  `ORDER_STATUS` int(2) NOT NULL DEFAULT 2,
  `JUNGWAT` varchar(100) NOT NULL,
  `AMPHOR` varchar(100) NOT NULL,
  `TUMBON` varchar(100) NOT NULL,
  `PROVINCE` varchar(20) NOT NULL,
  `ADDRESS_NUMBER` varchar(300) NOT NULL,
  `ADDRESS_MOO` varchar(300) NOT NULL,
  `TEL` varchar(20) NOT NULL,
  `USER_ID` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `kanji_orders`
--

INSERT INTO `kanji_orders` (`PRM_ID`, `ORDER_ID`, `FIST_NAME`, `LAST_NAME`, `ORDER_TIMESTAMP`, `ORDER_STATUS`, `JUNGWAT`, `AMPHOR`, `TUMBON`, `PROVINCE`, `ADDRESS_NUMBER`, `ADDRESS_MOO`, `TEL`, `USER_ID`) VALUES
(17, 'KANJI_1', 'มาวิน', 'เจนดี', '2023-10-17 06:28:11', 1, 'xxx', 'xxx', 'xxx', 'xxx', '10', '10', 'xxx', 1),
(18, 'KANJI_18', 'มิ้นนี่', 'เสลานัน', '2023-10-17 06:30:35', 2, 'ccc', 'ccc', 'ccc', 'ccc', 'ccc', 'ccc', 'ccccc', 1),
(19, 'KANJI_19', 'วนิสรา', 'มีนโยธา', '2023-10-17 07:24:34', 2, 'vvv', 'vvv', 'vvv', 'vvv', 'vvv', 'vvv', 'vvv', 1);

-- --------------------------------------------------------

--
-- Table structure for table `kanji_order_list`
--

CREATE TABLE `kanji_order_list` (
  `ORDER_LIST_ID` int(20) NOT NULL,
  `ORDER_ID` varchar(200) NOT NULL,
  `PRODUCT_NAME` varchar(300) NOT NULL,
  `PRODUCT_PRICE` varchar(100) NOT NULL,
  `PRODUCT_AMOUNT` varchar(100) NOT NULL,
  `PRODUCT_ID` int(11) NOT NULL,
  `PRODUCT_TIMESTAMP` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `kanji_order_list`
--

INSERT INTO `kanji_order_list` (`ORDER_LIST_ID`, `ORDER_ID`, `PRODUCT_NAME`, `PRODUCT_PRICE`, `PRODUCT_AMOUNT`, `PRODUCT_ID`, `PRODUCT_TIMESTAMP`) VALUES
(13, 'KANJI_1', 'Cos Lettuce or Romaine Lettuce (กรีนคอส)', '20', '1', 0, '2023-10-17 06:28:11'),
(14, 'KANJI_1', 'Green Oak Lettuce (กรีนโอ๊ค )', '110', '1', 0, '2023-10-17 06:28:11'),
(15, 'KANJI_18', 'MINI COS ORGANIC (มินิคอส ออร์แกนิค).', '90', '2', 0, '2023-10-17 06:30:35'),
(16, 'KANJI_19', 'Red Oak Lettuce (เรดโอ๊ค)', '150', '1', 0, '2023-10-17 07:24:34'),
(17, 'KANJI_19', 'Frillice Ice Berg Lettuce (ฟิลเลย์ไอซ์เบิร์ก)', '100', '1', 0, '2023-10-17 07:24:34');

-- --------------------------------------------------------

--
-- Table structure for table `kanji_partners`
--

CREATE TABLE `kanji_partners` (
  `partner_id` int(10) NOT NULL,
  `partner_member_id` varchar(10) NOT NULL,
  `partner_name` varchar(100) NOT NULL,
  `partner_detail` varchar(500) NOT NULL,
  `partner_status` char(1) NOT NULL DEFAULT current_timestamp(),
  `partner_img` varchar(255) NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `kanji_partners`
--

INSERT INTO `kanji_partners` (`partner_id`, `partner_member_id`, `partner_name`, `partner_detail`, `partner_status`, `partner_img`, `timestamp`) VALUES
(3, 'JJSHOP', 'ร้านJJSHOP', 'ร้านJJSHOP ขายผัก ขายปลา อุปกรณ์ตกปลา', '1', 'green-oak-1.jpg', '2023-09-18 13:08:36'),
(4, 'ASHOP', 'ร้านASHOP', 'ASHOP ขายผักสด ผลไม้สด', '2', 'original-1634632690275.jpg', '2023-09-18 13:08:36');

-- --------------------------------------------------------

--
-- Table structure for table `kanji_payment`
--

CREATE TABLE `kanji_payment` (
  `PAYMENT_ID` int(20) NOT NULL,
  `PAYMENT_NAME` varchar(100) NOT NULL,
  `PAYMENT_IMG` varchar(300) NOT NULL,
  `PAYMENT_USERNAME` varchar(100) NOT NULL,
  `PAYMENT_TIMESTAMP` timestamp NOT NULL DEFAULT current_timestamp(),
  `PAYMENT_PRICE` varchar(100) NOT NULL,
  `PAYMENT_ORDER_ID` varchar(20) NOT NULL,
  `AUTHEN_USER_ID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `kanji_payment`
--

INSERT INTO `kanji_payment` (`PAYMENT_ID`, `PAYMENT_NAME`, `PAYMENT_IMG`, `PAYMENT_USERNAME`, `PAYMENT_TIMESTAMP`, `PAYMENT_PRICE`, `PAYMENT_ORDER_ID`, `AUTHEN_USER_ID`) VALUES
(26, 'KANJI_16', '57123.jpg', 'admin', '2023-10-17 06:26:53', 'KANJI_16', 'KANJI_16', 1),
(27, 'มาวิน', 'Screenshot_2.png', 'admin', '2023-10-17 06:28:44', '100', 'KANJI_1', 1);

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
(5, 'KANJIID-02', 'อุปกรณ์ปลูกผัก', 'อุปกรณ์ปลูกผัก', '2023-09-08 03:57:11', '1'),
(7, 'KANJIID-15', 'พืช', 'พืชชนิดอื่นๆ ที่ต่างจากผัก', '2023-10-03 04:29:23', '1');

-- --------------------------------------------------------

--
-- Table structure for table `kanji_slide`
--

CREATE TABLE `kanji_slide` (
  `slide_id` int(11) NOT NULL,
  `slide_picture` varchar(255) NOT NULL,
  `slide_header` varchar(100) NOT NULL,
  `slide_content` varchar(255) NOT NULL,
  `slide_status` varchar(10) NOT NULL DEFAULT '2',
  `slide_timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `kanji_slide`
--

INSERT INTO `kanji_slide` (`slide_id`, `slide_picture`, `slide_header`, `slide_content`, `slide_status`, `slide_timestamp`) VALUES
(11, 'Fresh _ Healthy.jpg', 'slid2', 'slid2', '2', '2023-09-22 05:54:03'),
(13, 'green-oak-1.jpg', 'slide3', '', '2', '2023-09-22 06:37:59'),
(14, 'header-pic.jpg', 'โปรโมทสถานที่', '', '2', '2023-09-22 06:59:39'),
(20, 'Fresh _ Healthy (1400 x 300 px).jpg', 'Promote1', '', '2', '2023-10-05 06:13:43');

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
-- Indexes for table `kanji_orders`
--
ALTER TABLE `kanji_orders`
  ADD PRIMARY KEY (`PRM_ID`);

--
-- Indexes for table `kanji_order_list`
--
ALTER TABLE `kanji_order_list`
  ADD PRIMARY KEY (`ORDER_LIST_ID`);

--
-- Indexes for table `kanji_partners`
--
ALTER TABLE `kanji_partners`
  ADD PRIMARY KEY (`partner_id`);

--
-- Indexes for table `kanji_payment`
--
ALTER TABLE `kanji_payment`
  ADD PRIMARY KEY (`PAYMENT_ID`);
ALTER TABLE `kanji_payment` ADD FULLTEXT KEY `PAYMENT_ORDER_ID` (`PAYMENT_ORDER_ID`);

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
  MODIFY `banner_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `kanji_orders`
--
ALTER TABLE `kanji_orders`
  MODIFY `PRM_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `kanji_order_list`
--
ALTER TABLE `kanji_order_list`
  MODIFY `ORDER_LIST_ID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `kanji_partners`
--
ALTER TABLE `kanji_partners`
  MODIFY `partner_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `kanji_payment`
--
ALTER TABLE `kanji_payment`
  MODIFY `PAYMENT_ID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `kanji_products`
--
ALTER TABLE `kanji_products`
  MODIFY `product_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `kanji_product_type`
--
ALTER TABLE `kanji_product_type`
  MODIFY `type_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `kanji_slide`
--
ALTER TABLE `kanji_slide`
  MODIFY `slide_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
