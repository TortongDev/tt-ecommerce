-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 27, 2023 at 09:28 AM
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
  `option_amount` varchar(10) NOT NULL,
  `STATUS_SELLER` int(11) DEFAULT 0,
  `product_star` char(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `kanji_products`
--

INSERT INTO `kanji_products` (`product_id`, `product_member_id`, `product_name`, `product_price`, `product_amount`, `product_type_name`, `product_shop_name`, `product_type_id`, `product_user_id`, `product_status`, `product_timestamp`, `product_img`, `product_detail`, `product_sub_detail`, `comment_id`, `review_id`, `product_shop_id`, `option_price`, `option_amount`, `STATUS_SELLER`, `product_star`) VALUES
(8, 'PROKJ-', 'Cos Lettuce or Romaine Lettuce (กรีนคอส)', '20', '20', 'ผัก', '', 0, 1, 1, '2023-09-08 04:48:39', 'uploads/Cos-Lettuce.jpg', 'ผักสลัดคอส (Cos Lettuce) หรือผักกาดโรเมน (Romaine Lettuce) จุดเด่นคือความกรอบ ใบเรียวยาวสีเขียวตลอดทั้งใบ ไม่มีกลิ่นเหม็นเขียว นิยมรับ', 'ผักสลัดคอส (Cos Lettuce) หรือผักกาดโรเมน (Romaine Lettuce) จุดเด่นคือความกรอบ ใบเรียวยาวสีเขียวตลอดทั้งใบ ไม่มีกลิ่นเหม็นเขียว นิยมรับทาน', 0, 0, 0, 'กรัม', 'กรัม', 1, '5'),
(9, 'PROKJ-', 'ssss', '12', '12', 'ผัก', '', 0, 1, 1, '2023-09-08 07:56:09', 'uploads/Frillice_Ice_Berg.jpg', 'sdsdsdsdsds', 'sss', 0, 0, 0, 'กรัม', 'กรัม', 1, '1'),
(10, 'PROKJ-', 'Frillice Ice Berg Lettuce (ฟิลเลย์ไอซ์เบิร์ก)', '100', '100', 'ผัก', '', 0, 2, 1, '2023-09-12 04:05:10', 'uploads/Frillice_Ice_Berg.jpg', 'ฟิลเลย์ไอซ์เบิร์ก (Frillice Ice Berg Lettuce) คือ ผักสลัดชนิดหนึ่ง ใบมีสีเขียวอ่อนถึงสีเขียวเข้ม เรียวยาวเป็นทรงพุ่ม ปลายdddddd', 'ฟิลเลย์ไอซ์เบิร์ก (Frillice Ice Berg Lettuce) คือ ผักสลัดชนิดหนึ่ง ใบมีสีเขียวอ่อนถึงสีเขียวเข้ม เรียวยาวเป็นทรงพุ่ม ปลายdddddd', 0, 0, 0, 'กิโลกรัม', 'กรัม', 0, '2'),
(11, 'PROKJ-', 'Green Oak Lettuce (กรีนโอ๊ค )', '110', '100', 'ผัก', '', 0, 2, 1, '2023-09-12 04:06:12', 'uploads/green-oak-1.jpg', 'Green Oak Lettuce (กรีนโอ๊ค ) · ช่วยในเรื่องของระบบการย่อยอาหาร · วิตามินบีสูง · วิตามินซีสูง · ไฟเบอร์สูงช่วยเบาเทาอาการท้องผูก · บำรุงสายตา · บำรุงเส้นผมsss', 'Green Oak Lettuce (กรีนโอ๊ค ) · ช่วยในเรื่องของระบบการย่อยอาหาร · วิตามินบีสูง · วิตามินซีสูง · ไฟเบอร์สูงช่วยเบาเทาอาการท้องผูก · บำรุงสายตา · บำรุงเส้นผม\r\ndddddd', 0, 0, 0, 'กิโลกรัม', 'กรัม', 0, '2'),
(12, 'PROKJ-', 'Green Oak Lettuce (กรีนโอ๊ค )', '110', '100', 'ผัก', '', 0, 2, 1, '2023-09-12 04:07:11', 'uploads/green-oak-1.jpg', 'Green Oak Lettuce (กรีนโอ๊ค ) · ช่วยในเรื่องของระบบการย่อยอาหาร · วิตามินบีสูง · วิตามินซีสูง · ไฟเบอร์สูงช่วยเบาเทาอาการท้องผูก · บำรุงสายตา · บำรุงเส้นผมsss', 'Green Oak Lettuce (กรีนโอ๊ค ) · ช่วยในเรื่องของระบบการย่อยอาหาร · วิตามินบีสูง · วิตามินซีสูง · ไฟเบอร์สูงช่วยเบาเทาอาการท้องผูก · บำรุงสายตา · บำรุงเส้นผม\r\ndddddd', 0, 0, 0, 'กิโลกรัม', 'กรัม', 0, '5'),
(13, 'PROKJ-', 'MINI COS ORGANIC (มินิคอส ออร์แกนิค).', '90', '100', 'ผัก', '', 0, 2, 1, '2023-09-12 04:07:33', 'uploads/MG_0293-Selected.jpg', 'MINI COS ORGANIC ราคากิโลกรัมละ 100 บาท. กากใยสูงช่วยในเรื่องของระบบขับถ่าย มีโพรแทสเซียม และกรดโฟเลตสูง มีสารต้านอนุมูลอิสระเพื่อช่วยลดความเสื่อมของจอประสาทตาในผู้สูงอายุ', 'MINI COS ORGANIC ราคากิโลกรัมละ 100 บาท. กากใยสูงช่วยในเรื่องของระบบขับถ่าย มีโพรแทสเซียม และกรดโฟเลตสูง มีสารต้านอนุมูลอิสระเพื่อช่วยลดความเสื่อมของจอประสาทตาในผู้สูงอายุ', 0, 0, 0, 'กิโลกรัม', 'กรัม', 0, '5'),
(14, 'PROKJ-', 'MINI COS ORGANIC (มินิคอส ออร์แกนิค).', '90', '100', 'ผัก', '', 0, 2, 1, '2023-09-12 04:07:57', 'uploads/MG_0293-Selected.jpg', 'MINI COS ORGANIC ราคากิโลกรัมละ 100 บาท. กากใยสูงช่วยในเรื่องของระบบขับถ่าย มีโพรแทสเซียม และกรดโฟเลตสูง มีสารต้านอนุมูลอิสระเพื่อช่วยลดความเสื่อมของจอประสาทตาในผู้สูงอายุ', 'MINI COS ORGANIC ราคากิโลกรัมละ 100 บาท. กากใยสูงช่วยในเรื่องของระบบขับถ่าย มีโพรแทสเซียม และกรดโฟเลตสูง มีสารต้านอนุมูลอิสระเพื่อช่วยลดความเสื่อมของจอประสาทตาในผู้สูงอายุ', 0, 0, 0, 'กิโลกรัม', 'กรัม', 0, '5'),
(15, 'PROKJ-', 'ผักชี (ชื่อวิทยาศาสตร์: Coriandrum sativum)', '40', '100', 'ผัก', '', 0, 2, 1, '2023-09-12 04:08:25', 'uploads/original-1634632690275.jpg', 'ผักชีเป็นผักที่ปลูกง่าย และไม่ค่อยพบโรคหรือแมลงศัตรูพืชมากนัก เนื่องจากมีกลิ่นน้ำมันหอมระเหยที่ช่วยไล่แมลงได้ มีหลักฐานการปลูกในประเทศอียิปต์นานกว่า 3500 ปี.', 'ผักชีเป็นผักที่ปลูกง่าย และไม่ค่อยพบโรคหรือแมลงศัตรูพืชมากนัก เนื่องจากมีกลิ่นน้ำมันหอมระเหยที่ช่วยไล่แมลงได้ มีหลักฐานการปลูกในประเทศอียิปต์นานกว่า 3500 ปี.', 0, 0, 0, 'กิโลกรัม', 'กรัม', 0, '4'),
(16, 'PROKJ-', 'Red Oak Lettuce (เรดโอ๊ค)', '150', '120', 'ผัก', '', 0, 2, 1, '2023-09-12 04:08:58', 'uploads/เรดโอ๊ค.jpg', 'เป็นผักสลัดใบ ปลายใบหยิกเป็นแฉกชัดเจนกว่ากรีนโอ๊ค ใบสีแดงเข้มถึงน้ำตาลแดง ก้านสีเขียว เป็นผักสลัดใบชนิดที่เป็นที่นิยมมากที่สุดชนิดหนึ่ง.', 'เป็นผักสลัดใบ ปลายใบหยิกเป็นแฉกชัดเจนกว่ากรีนโอ๊ค ใบสีแดงเข้มถึงน้ำตาลแดง ก้านสีเขียว เป็นผักสลัดใบชนิดที่เป็นที่นิยมมากที่สุดชนิดหนึ่ง.', 0, 0, 0, 'กิโลกรัม', 'กรัม', 0, '3'),
(17, 'PROKJ-', 'Red Oak Lettuce (เรดโอ๊ค)', '150', '120', 'ผัก', '', 0, 2, 1, '2023-09-12 04:09:22', 'uploads/เรดโอ๊ค.jpg', 'เป็นผักสลัดใบ ปลายใบหยิกเป็นแฉกชัดเจนกว่ากรีนโอ๊ค ใบสีแดงเข้มถึงน้ำตาลแดง ก้านสีเขียว เป็นผักสลัดใบชนิดที่เป็นที่นิยมมากที่สุดชนิดหนึ่ง.', 'เป็นผักสลัดใบ ปลายใบหยิกเป็นแฉกชัดเจนกว่ากรีนโอ๊ค ใบสีแดงเข้มถึงน้ำตาลแดง ก้านสีเขียว เป็นผักสลัดใบชนิดที่เป็นที่นิยมมากที่สุดชนิดหนึ่ง.', 0, 0, 0, 'กิโลกรัม', 'กรัม', 0, '4'),
(24, 'PROKJ-', '1', '11', '1', 'ผัก', '', 0, 2, 1, '2023-10-27 03:19:44', './uploads/', '1', '1', 0, 0, 0, 'กรัม', 'กรัม', 0, '3'),
(25, 'PROKJ-', '1', '1', '1', 'อุปกรณ์ปลูกผัก', '', 0, 2, 1, '2023-10-27 03:20:12', './uploads/', '1', '1', 0, 0, 0, 'กรัม', 'กรัม', 0, '1'),
(26, 'PROKJ-', '1', '1', '1', 'อุปกรณ์ปลูกผัก', 'ร้านJJSHOP', 0, 2, 1, '2023-10-27 03:20:43', './uploads/', '1', '1', 0, 0, 0, 'กรัม', 'กรัม', 0, '2'),
(27, 'PROKJ-', 'sss', '1', '11', 'ผัก', 'ร้านJJSHOP', 0, 2, 1, '2023-10-27 03:48:27', './uploads/', '1', '1', 0, 0, 0, 'กรัม', 'กรัม', 0, '4');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kanji_products`
--
ALTER TABLE `kanji_products`
  ADD PRIMARY KEY (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kanji_products`
--
ALTER TABLE `kanji_products`
  MODIFY `product_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
