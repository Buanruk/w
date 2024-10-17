-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 28, 2024 at 11:36 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shoponline2`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `ad_id` int(4) UNSIGNED ZEROFILL NOT NULL COMMENT 'รหัสแอดมิน',
  `ad_name` varchar(200) NOT NULL COMMENT 'ชื่อแอดมิน',
  `ad_user` varchar(50) NOT NULL COMMENT 'ชื่อผู้ใช้',
  `ad_pass` varchar(50) NOT NULL COMMENT 'รหัสผ่าน'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ad_id`, `ad_name`, `ad_user`, `ad_pass`) VALUES
(1010, 'จิรโชค', 'jira', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `o_id` int(7) UNSIGNED ZEROFILL NOT NULL COMMENT 'รหัสคำสั่งซื้อ',
  `o_total` int(7) NOT NULL COMMENT 'คำสั่งซื้อทั้งหมด',
  `o_date` datetime NOT NULL COMMENT 'เวลาสั่งซื้อ',
  `mem_id` int(7) NOT NULL COMMENT 'รหัสลูกค้า',
  `mem_name` varchar(50) NOT NULL COMMENT 'ชื่อลูกค้า',
  `address` text NOT NULL COMMENT 'ที่อยู่'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`o_id`, `o_total`, `o_date`, `mem_id`, `mem_name`, `address`) VALUES
(0000001, 3685, '2017-11-14 12:56:27', 1001, 'วรุฬภรณ์ ใจเมือง', 'มหาสารคาม');

-- --------------------------------------------------------

--
-- Table structure for table `orders_detail`
--

CREATE TABLE `orders_detail` (
  `o_detail_id` int(6) NOT NULL COMMENT 'รหัสรายละเอียดคำสั่งซื้อ',
  `o_id` int(7) UNSIGNED ZEROFILL NOT NULL COMMENT 'รหัสคำสั่งซื้อ',
  `pro_id` int(4) UNSIGNED ZEROFILL NOT NULL COMMENT 'รหัสสินค้า',
  `item` int(7) NOT NULL COMMENT 'รายการ'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `orders_detail`
--

INSERT INTO `orders_detail` (`o_detail_id`, `o_id`, `pro_id`, `item`) VALUES
(1, 0000001, 7002, 2);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `pro_id` int(4) UNSIGNED ZEROFILL NOT NULL COMMENT 'รหัสสินค้า',
  `pro_name` varchar(200) NOT NULL COMMENT 'ชื่อสินค้า',
  `pro_detail` text NOT NULL COMMENT 'รายละเอียดสินค้า',
  `pro_price` float NOT NULL COMMENT 'ราคาสินค้า',
  `pro_picture` varchar(200) NOT NULL COMMENT 'รูปสินค้า',
  `pro_type` int(3) UNSIGNED ZEROFILL NOT NULL COMMENT 'ประเภทสินค้า'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`pro_id`, `pro_name`, `pro_detail`, `pro_price`, `pro_picture`, `pro_type`) VALUES
(2001, 'เสื้อยืดคอกลมตัวการ์ตูนหมวกแดง (สีชมพู) ', 'ผ้า cotton แท้ 100% งานเกรดพรีเมี่ยม เป็นตัวการ์ตูนแบบเย็บ ไม่ใช่ตัวการ์ตูนแบบสกรีน', 199, 'IMG_5824.jpg', 002),
(7002, 'กระโปรง', 'หญิง', 271, '2.jpg', 007);

-- --------------------------------------------------------

--
-- Table structure for table `product_type`
--

CREATE TABLE `product_type` (
  `pt_id` int(3) NOT NULL COMMENT 'รหัสประเภทสินค้า',
  `pt_name` varchar(200) NOT NULL COMMENT 'ชื่อประเภทสินค้า'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `product_type`
--

INSERT INTO `product_type` (`pt_id`, `pt_name`) VALUES
(1, 'ฮู้ดดี้'),
(2, 'เสื้อเชิ้ต'),
(3, 'สเวตเตอร์'),
(4, 'เดรส'),
(5, 'กางเกงขายาว'),
(6, 'กางเกงขาสั้น'),
(7, 'กระโปรง');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `u_id` int(11) NOT NULL,
  `u_name` varchar(200) NOT NULL,
  `u_username` varchar(50) NOT NULL,
  `u_password` varchar(255) NOT NULL,
  `u_email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`u_id`, `u_name`, `u_username`, `u_password`, `u_email`) VALUES
(1, 'warun', 'warun', '$2y$10$8tpDBI2lEtvgvqtCkN1DYuMR/KIHTgRuo8ltpTeyPg5bPoCcsD/TW', 'warun@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ad_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`o_id`);

--
-- Indexes for table `orders_detail`
--
ALTER TABLE `orders_detail`
  ADD PRIMARY KEY (`o_detail_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`pro_id`);

--
-- Indexes for table `product_type`
--
ALTER TABLE `product_type`
  ADD PRIMARY KEY (`pt_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`u_id`),
  ADD UNIQUE KEY `username` (`u_username`),
  ADD UNIQUE KEY `email` (`u_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `ad_id` int(4) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT COMMENT 'รหัสแอดมิน', AUTO_INCREMENT=1011;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `o_id` int(7) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT COMMENT 'รหัสคำสั่งซื้อ', AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `orders_detail`
--
ALTER TABLE `orders_detail`
  MODIFY `o_detail_id` int(6) NOT NULL AUTO_INCREMENT COMMENT 'รหัสรายละเอียดคำสั่งซื้อ', AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
