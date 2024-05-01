-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 01, 2024 at 04:46 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `adilahhijab`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminn`
--

CREATE TABLE `adminn` (
  `admin_id` int(3) UNSIGNED ZEROFILL NOT NULL COMMENT 'รหัสพนักงาน',
  `first_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'ชื่อ',
  `last_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'นามสกุล',
  `number_address` int(5) NOT NULL COMMENT 'เลขที่',
  `moo_address` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'หมู่',
  `district_address` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'ตำบล',
  `amphoe_address` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'อำเภอ',
  `province_address` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'จังหวัด',
  `postalcode` int(7) NOT NULL COMMENT 'รหัสไปรษณีย์',
  `telaphone` int(10) NOT NULL COMMENT 'เบอร์โทรศัพท์',
  `admin_email` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'อีเมล',
  `username_admin` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'ชื่อผู้ใช้งาน',
  `admin_password` varchar(128) COLLATE utf8_unicode_ci NOT NULL COMMENT 'รหัสผ่าน'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `adminn`
--

INSERT INTO `adminn` (`admin_id`, `first_name`, `last_name`, `number_address`, `moo_address`, `district_address`, `amphoe_address`, `province_address`, `postalcode`, `telaphone`, `admin_email`, `username_admin`, `admin_password`) VALUES
(001, 'อาดีละห์', 'เบ็ญอะห์หมัด', 102, 'สิโรรส', 'สะเตง', 'เมือง', 'ยะลา', 95000, 822612339, 'adilah.h@gmail.com', 'adilah', '1111111111'),
(002, 'ยัสมิน', 'ปูเต๊ะ', 59, '1', 'พร่อน', 'เมือง', 'ยะลา', 95160, 625852392, 'yasmin.p@gmail.com', 'admin', '1234'),
(003, 'ซูรีนา', 'กาซอ', 21, '1', 'ท่าเรือ', 'โคกโพธิ์', 'ปัตตานี', 95120, 0, '', 'surina', '6a761223ff9d566b5a334fa16d5576bd788c5286b70ded518b4a3bb66d7e0db50e7b17e75fdd1694b71a46d60285eb2beab27b27d3cbc4f2ce65d9a838fb3810');

-- --------------------------------------------------------

--
-- Table structure for table `autocomplete`
--

CREATE TABLE `autocomplete` (
  `id` int(11) NOT NULL,
  `term` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=tis620;

--
-- Dumping data for table `autocomplete`
--

INSERT INTO `autocomplete` (`id`, `term`) VALUES
(1, 'Abba'),
(2, 'The Strokes'),
(3, 'Talking Heads'),
(4, 'The Clash'),
(5, 'Madonna'),
(6, 'Arctic Monkeys'),
(7, 'David Byrne'),
(8, 'The White Stripes'),
(9, 'The Doors'),
(10, 'Jimi Hendrix'),
(11, 'The Rolling Stones'),
(12, 'The Pharcyde'),
(13, 'Muse'),
(14, 'Massive Attack'),
(15, 'O\'reilly'),
(16, 'Backpacker');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `images_id` int(11) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `uploaded_on` datetime NOT NULL,
  `status` enum('1','0') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `orderID` int(5) UNSIGNED ZEROFILL NOT NULL COMMENT 'เลขที่ใบสั่งซื้อ',
  `first_name` varchar(30) COLLATE utf8_unicode_ci NOT NULL COMMENT 'ชื่อ',
  `last_name` varchar(30) COLLATE utf8_unicode_ci NOT NULL COMMENT 'นามสกุล',
  `number_address` int(3) NOT NULL COMMENT 'เลขที่',
  `moo_address` int(3) NOT NULL COMMENT 'หมู่',
  `district_address` varchar(30) COLLATE utf8_unicode_ci NOT NULL COMMENT 'ตำบล',
  `amphoe_address` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'อำเภอ',
  `province_address` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'จังหวัด',
  `postalcode` int(10) NOT NULL COMMENT 'รหัสไปรษณีย์',
  `user_telephone` int(10) NOT NULL COMMENT 'เบอร์โทรศัพท์',
  `user_name` varchar(30) COLLATE utf8_unicode_ci NOT NULL COMMENT 'ชื่อลูกค้า',
  `total_price` float NOT NULL COMMENT 'ราคารวม',
  `product_size` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'ไซต์',
  `order_status` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'สถานะการสั่งซื้อ',
  `reg_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT 'วันที่สั่งซื้อ',
  `dateMonth` varchar(30) COLLATE utf8_unicode_ci NOT NULL COMMENT 'เดือน'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`orderID`, `first_name`, `last_name`, `number_address`, `moo_address`, `district_address`, `amphoe_address`, `province_address`, `postalcode`, `user_telephone`, `user_name`, `total_price`, `product_size`, `order_status`, `reg_date`, `dateMonth`) VALUES
(00019, 'มีมี่', 'มาเรีย', 46, 4, 'ท่าเรือ', 'โคกโพธิ์', 'ยะลา', 98678, 628799998, 'maria', 5900, '', '2', '2024-04-04 20:12:46', 'January'),
(00023, 'เอเรีย', 'ห้าก้าว', 23, 3, 'สะเตง', 'เมือง', 'ยะลา', 95000, 828868103, 'aria', 490, '', '1', '2024-04-04 18:24:47', 'January'),
(00026, 'มีมี่', 'มาเรีย', 46, 4, 'ท่าเรือ', 'โคกโพธิ์', 'ยะลา', 98678, 628799998, 'maria', 590, '', '1', '2024-04-04 18:24:38', 'January'),
(00027, 'เอเรีย', 'ห้าก้าว', 23, 3, 'สะเตง', 'เมือง', 'ยะลา', 95000, 828868103, 'aria', 590, '', '1', '2024-04-04 18:24:35', 'January'),
(00028, 'มีมี่', 'มาเรีย', 46, 4, 'ท่าเรือ', 'โคกโพธิ์', 'ยะลา', 98678, 628799998, 'maria', 490, '', '1', '2024-04-04 18:24:33', 'January'),
(00029, 'เอเรีย', 'ห้าก้าว', 23, 3, 'สะเตง', 'เมือง', 'ยะลา', 95000, 828868103, 'aria', 790, '', '0', '2024-04-04 18:22:44', 'February'),
(00030, 'มีมี่', 'มาเรีย', 46, 4, 'ท่าเรือ', 'โคกโพธิ์', 'ยะลา', 98678, 628799998, 'maria', 790, '', '1', '2024-04-04 18:24:30', 'January'),
(00031, 'มีมี่', 'มาเรีย', 46, 4, 'ท่าเรือ', 'โคกโพธิ์', 'ยะลา', 98678, 628799998, 'maria', 790, '', '1', '2024-04-04 18:24:27', 'January'),
(00032, 'มีมี่', 'มาเรีย', 46, 4, 'ท่าเรือ', 'โคกโพธิ์', 'ยะลา', 98678, 628799998, 'maria', 490, '', '1', '2024-04-04 18:24:25', 'January'),
(00033, 'มีมี่', 'มาเรีย', 46, 4, 'ท่าเรือ', 'โคกโพธิ์', 'ยะลา', 98678, 628799998, 'maria', 790, '', '1', '2024-04-04 18:24:22', 'January'),
(00034, 'เอเรีย', 'ห้าก้าว', 23, 3, 'สะเตง', 'เมือง', 'ยะลา', 95000, 828868103, 'aria', 590, '', '2', '2024-04-04 18:23:08', 'February'),
(00035, 'เอเรีย', 'ห้าก้าว', 23, 3, 'สะเตง', 'เมือง', 'ยะลา', 95000, 828868103, 'aria', 590, '', '1', '2024-04-04 18:24:19', 'January'),
(00036, 'ยัสมิน', 'ปูเต๊ะ', 331, 2, 'พร่อน', 'เมือง', 'ยะลา', 95169, 625852392, 'yqsm1n', 490, '', '1', '2024-04-04 18:24:16', 'January'),
(00037, 'ยัสมิน', 'ปูเต๊ะ', 331, 2, 'พร่อน', 'เมือง', 'ยะลา', 95169, 625852392, 'yqsm1n', 490, '', '1', '2024-04-04 18:24:13', 'January'),
(00038, 'นารีรัตน์', 'อาแด', 34, 2, 'สะเตง', 'เมือง', 'ยะลา', 95000, 988887651, 'nareerat', 590, '', '1', '2024-04-04 18:24:10', 'January'),
(00039, 'นารีรัตน์', 'อาแด', 34, 2, 'สะเตง', 'เมือง', 'ยะลา', 95000, 988887651, 'nareerat', 790, '', '1', '2024-04-04 18:24:07', 'January'),
(00040, 'นารีรัตน์', 'อาแด', 34, 2, 'สะเตง', 'เมือง', 'ยะลา', 95000, 988887651, 'nareerat', 490, '', '0', '2024-04-04 18:23:05', 'February'),
(00041, 'นารีรัตน์', 'อาแด', 34, 2, 'สะเตง', 'เมือง', 'ยะลา', 95000, 988887651, 'nareerat', 590, '', '1', '2024-04-04 18:24:05', 'January'),
(00042, 'นารีรัตน์', 'อาแด', 34, 2, 'สะเตง', 'เมือง', 'ยะลา', 95000, 988887651, 'nareerat', 790, '', '1', '2024-04-04 18:24:03', 'January'),
(00043, 'ยัสมิน', 'ปูเต๊ะ', 331, 2, 'พร่อน', 'เมือง', 'ยะลา', 95169, 625852392, 'yqsm1n', 490, '', '1', '2024-04-04 18:24:00', 'January'),
(00044, 'มีมี่', 'มาเรีย', 46, 4, 'ท่าเรือ', 'โคกโพธิ์', 'ยะลา', 98678, 628799998, 'maria', 590, '', '1', '2024-04-04 18:23:56', 'January'),
(00045, 'มีมี่', 'มาเรีย', 46, 4, 'ท่าเรือ', 'โคกโพธิ์', 'ยะลา', 98678, 628799998, 'maria', 590, '', '0', '2024-04-04 18:22:41', 'February'),
(00046, 'ยัสมิน', 'ปูเต๊ะ', 331, 2, 'พร่อน', 'เมือง', 'ยะลา', 95169, 625852392, 'yqsm1n', 590, '', '2', '2024-04-04 18:23:03', 'February'),
(00047, 'ยัสมิน', 'ปูเต๊ะ', 331, 2, 'พร่อน', 'เมือง', 'ยะลา', 95169, 625852392, 'yqsm1n', 790, '', '1', '2024-04-04 18:23:53', 'January'),
(00048, 'นารีรัตน์', 'อาแด', 34, 2, 'สะเตง', 'เมือง', 'ยะลา', 95000, 988887651, 'nareerat', 590, '', '2', '2024-04-04 18:22:47', 'February'),
(00049, 'นารีรัตน์', 'อาแด', 34, 2, 'สะเตง', 'เมือง', 'ยะลา', 95000, 988887651, 'nareerat', 490, '', '1', '2024-04-04 18:23:45', 'January'),
(00050, 'ยัสมิน', 'ปูเต๊ะ', 331, 2, 'พร่อน', 'เมือง', 'ยะลา', 95169, 625852392, 'yqsm1n', 790, '', '0', '2024-04-04 18:22:38', 'February'),
(00051, 'นารีรัตน์', 'อาแด', 34, 2, 'สะเตง', 'เมือง', 'ยะลา', 95000, 988887651, 'nareerat', 590, '', '0', '2024-04-04 18:22:57', 'February'),
(00052, 'ยัสมิน', 'ปูเต๊ะ', 331, 2, 'พร่อน', 'เมือง', 'ยะลา', 95169, 625852392, 'yqsm1n', 590, '', '0', '2024-04-04 18:23:01', 'February'),
(00053, 'เอเรีย', 'ห้าก้าว', 23, 3, 'สะเตง', 'เมือง', 'ยะลา', 95000, 828868103, 'aria', 1180, '', '2', '2024-04-04 18:22:50', 'February'),
(00054, 'นารีรัตน์', 'อาแด', 34, 2, 'สะเตง', 'เมือง', 'ยะลา', 95000, 988887651, 'nareerat', 790, '', '2', '2024-04-04 18:22:54', 'February'),
(00055, 'นารีรัตน์', 'อาแด', 34, 2, 'สะเตง', 'เมือง', 'ยะลา', 95000, 988887651, 'nareerat', 790, '', '1', '2024-04-04 18:22:36', 'February'),
(00056, 'เอเรีย', 'ห้าก้าว', 23, 3, 'สะเตง', 'เมือง', 'ยะลา', 95000, 828868103, 'aria', 790, '', '1', '2024-04-04 18:22:32', 'February'),
(00057, 'เอเรีย', 'ห้าก้าว', 23, 3, 'สะเตง', 'เมือง', 'ยะลา', 95000, 828868103, 'aria', 790, '', '1', '2024-04-04 18:22:30', 'February'),
(00058, 'เอเรีย', 'ห้าก้าว', 23, 3, 'สะเตง', 'เมือง', 'ยะลา', 95000, 828868103, 'aria', 1180, '', '1', '2024-04-04 18:22:22', 'February'),
(00059, 'เอเรีย', 'ห้าก้าว', 23, 3, 'สะเตง', 'เมือง', 'ยะลา', 95000, 828868103, 'aria', 3050, '', '1', '2024-04-04 18:21:43', 'March'),
(00060, 'เอเรีย', 'ห้าก้าว', 23, 3, 'สะเตง', 'เมือง', 'ยะลา', 95000, 828868103, 'aria', 490, '', '1', '2024-04-04 18:21:39', 'March'),
(00061, 'เอเรีย', 'ห้าก้าว', 23, 3, 'สะเตง', 'เมือง', 'ยะลา', 95000, 828868103, 'aria', 790, '', '1', '2024-04-04 18:21:36', 'March'),
(00062, 'มีมี่', 'มาเรีย', 46, 4, 'ท่าเรือ', 'โคกโพธิ์', 'ยะลา', 98678, 628799998, 'maria', 790, '', '1', '2024-04-04 18:21:33', 'March'),
(00063, 'มีมี่', 'มาเรีย', 46, 4, 'ท่าเรือ', 'โคกโพธิ์', 'ยะลา', 98678, 628799998, 'maria', 590, '', '1', '2024-04-04 18:21:30', 'March'),
(00064, 'มีมี่', 'มาเรีย', 46, 4, 'ท่าเรือ', 'โคกโพธิ์', 'ยะลา', 98678, 628799998, 'maria', 790, '', '1', '2024-04-04 18:21:27', 'March'),
(00065, 'มีมี่', 'มาเรีย', 46, 4, 'ท่าเรือ', 'โคกโพธิ์', 'ยะลา', 98678, 628799998, 'maria', 790, '', '1', '2024-04-04 18:21:24', 'March'),
(00066, 'มีมี่', 'มาเรีย', 46, 4, 'ท่าเรือ', 'โคกโพธิ์', 'ยะลา', 98678, 628799998, 'maria', 790, '', '1', '2024-04-04 18:21:22', 'March'),
(00067, 'มีมี่', 'มาเรีย', 46, 4, 'ท่าเรือ', 'โคกโพธิ์', 'ยะลา', 98678, 628799998, 'maria', 1580, '', '1', '2024-04-04 18:21:19', 'March'),
(00068, 'มีมี่', 'มาเรีย', 46, 4, 'ท่าเรือ', 'โคกโพธิ์', 'ยะลา', 98678, 628799998, 'maria', 790, '', '1', '2024-04-04 18:21:15', 'March'),
(00069, 'นารีรัตน์', 'อาแด', 34, 2, 'สะเตง', 'เมือง', 'ยะลา', 95000, 988887651, 'nareerat', 1980, '', '1', '2024-04-04 18:21:12', 'March'),
(00070, 'นารีรัตน์', 'อาแด', 34, 2, 'สะเตง', 'เมือง', 'ยะลา', 95000, 988887651, 'nareerat', 490, '', '1', '2024-04-04 18:21:09', 'March'),
(00071, 'นารีรัตน์', 'อาแด', 34, 2, 'สะเตง', 'เมือง', 'ยะลา', 95000, 988887651, 'nareerat', 3430, '', '1', '2024-04-04 18:21:06', 'March'),
(00072, 'นารีรัตน์', 'อาแด', 34, 2, 'สะเตง', 'เมือง', 'ยะลา', 95000, 988887651, 'nareerat', 490, '', '1', '2024-04-04 18:21:02', 'March'),
(00073, 'นารีรัตน์', 'อาแด', 34, 2, 'สะเตง', 'เมือง', 'ยะลา', 95000, 988887651, 'nareerat', 490, '', '1', '2024-04-04 18:21:00', 'March'),
(00074, 'นารีรัตน์', 'อาแด', 34, 2, 'สะเตง', 'เมือง', 'ยะลา', 95000, 988887651, 'nareerat', 490, '', '1', '2024-04-04 18:20:57', 'March'),
(00075, 'นารีรัตน์', 'อาแด', 34, 2, 'สะเตง', 'เมือง', 'ยะลา', 95000, 988887651, 'nareerat', 490, '', '1', '2024-04-04 18:20:54', 'March'),
(00076, 'นารีรัตน์', 'อาแด', 34, 2, 'สะเตง', 'เมือง', 'ยะลา', 95000, 988887651, 'nareerat', 490, '', '1', '2024-04-04 18:20:51', 'March'),
(00077, 'นารีรัตน์', 'อาแด', 34, 2, 'สะเตง', 'เมือง', 'ยะลา', 95000, 988887651, 'nareerat', 490, '', '1', '2024-04-04 18:20:49', 'March'),
(00078, 'นารีรัตน์', 'อาแด', 34, 2, 'สะเตง', 'เมือง', 'ยะลา', 95000, 988887651, 'nareerat', 980, '', '1', '2024-04-04 18:20:45', 'March'),
(00079, 'นารีรัตน์', 'อาแด', 34, 2, 'สะเตง', 'เมือง', 'ยะลา', 95000, 988887651, 'nareerat', 490, '', '1', '2024-04-04 18:20:42', 'March'),
(00080, 'นารีรัตน์', 'อาแด', 34, 2, 'สะเตง', 'เมือง', 'ยะลา', 95000, 988887651, 'nareerat', 490, '', '1', '2024-04-04 18:20:40', 'March'),
(00081, 'นารีรัตน์', 'อาแด', 34, 2, 'สะเตง', 'เมือง', 'ยะลา', 95000, 988887651, 'nareerat', 490, '', '1', '2024-04-04 18:20:37', 'March'),
(00082, 'นารีรัตน์', 'อาแด', 34, 2, 'สะเตง', 'เมือง', 'ยะลา', 95000, 988887651, 'nareerat', 490, '', '1', '2024-04-04 18:20:34', 'March'),
(00083, 'นารีรัตน์', 'อาแด', 34, 2, 'สะเตง', 'เมือง', 'ยะลา', 95000, 988887651, 'nareerat', 980, '', '1', '2024-04-04 18:20:30', 'March'),
(00084, 'นารีรัตน์', 'อาแด', 34, 2, 'สะเตง', 'เมือง', 'ยะลา', 95000, 988887651, 'nareerat', 490, '', '1', '2024-04-04 18:20:25', 'March'),
(00085, 'นารีรัตน์', 'อาแด', 34, 2, 'สะเตง', 'เมือง', 'ยะลา', 95000, 988887651, 'nareerat', 490, '', '1', '2024-04-04 18:20:22', 'March'),
(00086, 'นารีรัตน์', 'อาแด', 34, 2, 'สะเตง', 'เมือง', 'ยะลา', 95000, 988887651, 'nareerat', 490, '', '1', '2024-04-04 18:19:59', 'March'),
(00087, 'นารีรัตน์', 'อาแด', 34, 2, 'สะเตง', 'เมือง', 'ยะลา', 95000, 988887651, 'nareerat', 490, '', '1', '2024-04-04 18:20:20', 'March'),
(00088, 'นารีรัตน์', 'อาแด', 34, 2, 'สะเตง', 'เมือง', 'ยะลา', 95000, 988887651, 'nareerat', 490, '', '1', '2024-04-04 18:20:17', 'March'),
(00089, 'มีมี่', 'มาเรีย', 46, 4, 'ท่าเรือ', 'โคกโพธิ์', 'ยะลา', 98678, 628799998, 'maria', 590, '', '1', '2024-04-04 18:20:14', 'March'),
(00090, 'มีมี่', 'มาเรีย', 46, 4, 'ท่าเรือ', 'โคกโพธิ์', 'ยะลา', 98678, 628799998, 'maria', 590, '', '1', '2024-04-04 18:20:11', 'March'),
(00091, 'มีมี่', 'มาเรีย', 46, 4, 'ท่าเรือ', 'โคกโพธิ์', 'ยะลา', 98678, 628799998, 'maria', 590, '', '1', '2024-04-04 18:20:08', 'March'),
(00092, 'มีมี่', 'มาเรีย', 46, 4, 'ท่าเรือ', 'โคกโพธิ์', 'ยะลา', 98678, 628799998, 'maria', 590, '', '2', '2024-04-04 18:20:05', 'March'),
(00093, 'นารีรัตน์', 'อาแด', 34, 2, 'สะเตง', 'เมือง', 'ยะลา', 95000, 988887651, 'nareerat', 1180, '', '1', '2024-04-04 18:20:02', 'March'),
(00094, 'นารีรัตน์', 'อาแด', 34, 2, 'สะเตง', 'เมือง', 'ยะลา', 95000, 988887651, 'nareerat', 4130, '', '1', '2024-04-04 18:19:56', 'March'),
(00095, 'มีมี่', 'มาเรีย', 46, 4, 'ท่าเรือ', 'โคกโพธิ์', 'ยะลา', 98678, 628799998, 'maria', 590, '', '1', '2024-04-04 18:19:53', 'March'),
(00096, 'ยัสมิน', 'ปูเต๊ะ', 331, 2, 'พร่อน', 'เมือง', 'ยะลา', 95169, 625852392, 'yqsm1n', 490, '', '1', '2024-04-04 18:19:50', 'March'),
(00097, 'ยัสมิน', 'ปูเต๊ะ', 331, 2, 'พร่อน', 'เมือง', 'ยะลา', 95169, 625852392, 'yqsm1n', 990, '', '1', '2024-04-04 18:19:47', 'March'),
(00098, 'ยัสมิน', 'ปูเต๊ะ', 331, 2, 'พร่อน', 'เมือง', 'ยะลา', 95169, 625852392, 'yqsm1n', 490, '', '1', '2024-04-04 18:19:37', 'March'),
(00099, 'ยัสมิน', 'ปูเต๊ะ', 331, 2, 'พร่อน', 'เมือง', 'ยะลา', 95169, 625852392, 'yqsm1n', 490, '', '1', '2024-04-04 18:18:46', 'April'),
(00100, 'ยัสมิน', 'ปูเต๊ะ', 331, 2, 'พร่อน', 'เมือง', 'ยะลา', 95169, 625852392, 'yqsm1n', 590, '', '1', '2024-04-04 18:18:42', 'April'),
(00102, 'ยัสมิน', 'ปูเต๊ะ', 331, 2, 'พร่อน', 'เมือง', 'ยะลา', 95169, 625852392, 'yqsm1n', 990, '', '1', '2024-04-04 18:18:38', 'April'),
(00110, '', '', 0, 0, '', '', '', 0, 0, '', 0, '', '', '2024-04-04 18:18:35', 'April'),
(00111, 'ยัสมิน', 'ปูเต๊ะ', 331, 2, 'พร่อน', 'เมือง', 'ยะลา', 95169, 625852392, 'yqsm1n', 490, '', '1', '2024-04-04 18:18:32', 'April'),
(00113, '', '', 0, 0, '', '', '', 0, 0, '', 0, '', '', '2024-04-04 18:18:28', 'April'),
(00114, 'นารีรัตน์', 'อาแด', 34, 2, 'สะเตง', 'เมือง', 'ยะลา', 95000, 988887651, 'nareerat', 490, '', '1', '2024-04-04 18:18:25', 'April'),
(00115, 'นารีรัตน์', 'อาแด', 34, 2, 'สะเตง', 'เมือง', 'ยะลา', 95000, 988887651, 'nareerat', 590, '', '1', '2024-04-04 18:18:22', 'April'),
(00116, 'นารีรัตน์', 'อาแด', 34, 2, 'สะเตง', 'เมือง', 'ยะลา', 95000, 988887651, 'nareerat', 590, '', '1', '2024-04-04 18:18:19', 'April'),
(00118, 'นารีรัตน์', 'อาแด', 34, 2, 'สะเตง', 'เมือง', 'ยะลา', 95000, 988887651, 'nareerat', 2950, '', '1', '2024-04-04 18:18:16', 'April'),
(00119, 'นารีรัตน์', 'อาแด', 34, 2, 'สะเตง', 'เมือง', 'ยะลา', 95000, 988887651, 'nareerat', 490, '', '1', '2024-04-04 18:18:12', 'April'),
(00120, 'ยัสมิน', 'ปูเต๊ะ', 331, 2, 'พร่อน', 'เมือง', 'ยะลา', 95169, 625852392, 'yqsm1n', 490, '', '1', '2024-04-04 18:18:08', 'April'),
(00121, 'ยัสมิน', 'ปูเต๊ะ', 331, 2, 'พร่อน', 'เมือง', 'ยะลา', 95169, 625852392, 'yqsm1n', 2360, '', '1', '2024-04-04 18:11:09', 'April'),
(00122, 'ยัสมิน', 'ปูเต๊ะ', 331, 2, 'พร่อน', 'เมือง', 'ยะลา', 95169, 625852392, 'yqsm1n', 1080, '', '1', '2024-04-04 18:11:02', 'April'),
(00123, 'ยัสมิน', 'ปูเต๊ะ', 331, 2, 'พร่อน', 'เมือง', 'ยะลา', 95169, 625852392, 'yqsm1n', 590, '', '1', '2024-04-04 18:10:59', 'April'),
(00124, '', '', 0, 0, '', '', '', 0, 0, 'yqsm1n', 990, '', '1', '2024-04-04 18:10:55', 'April'),
(00125, 'ยัสมิน', 'ปูเต๊ะ', 331, 2, 'พร่อน', 'เมือง', 'ยะลา', 0, 625852392, 'yqsm1n', 590, '', '1', '2024-04-04 18:10:52', 'April'),
(00126, 'ยัสมิน', 'ปูเต๊ะ', 331, 2, 'พร่อน', 'เมือง', 'ยะลา', 95169, 625852392, 'yqsm1n', 590, '', '1', '2024-04-04 18:10:49', 'April'),
(00127, 'ยัสมิน', 'ปูเต๊ะ', 331, 2, 'พร่อน', 'เมือง', 'ยะลา', 95169, 625852392, 'yqsm1n', 590, '', '2', '2024-04-04 18:10:40', 'April'),
(00128, 'ยัสมิน', 'ปูเต๊ะ', 331, 2, 'พร่อน', 'เมือง', 'ยะลา', 95169, 625852392, 'yqsm1n', 3150, '', '2', '2024-04-04 18:10:45', 'April'),
(00129, 'ยัสมิน', 'ปูเต๊ะ', 331, 2, 'พร่อน', 'เมือง', 'ยะลา', 95169, 625852392, 'yqsm1n', 1470, '', '1', '2024-04-04 18:10:37', 'April'),
(00130, 'ยัสมิน', 'ปูเต๊ะ', 331, 2, 'พร่อน', 'เมือง', 'ยะลา', 95169, 625852392, 'yqsm1n', 590, '', '1', '2024-04-04 18:10:33', 'April'),
(00131, 'ยัสมิน', 'ปูเต๊ะ', 331, 2, 'พร่อน', 'เมือง', 'ยะลา', 95169, 625852392, 'yqsm1n', 990, '', '1', '2024-04-04 17:31:40', 'April'),
(00132, 'ยัสมิน', 'ปูเต๊ะ', 331, 2, 'พร่อน', 'เมือง', 'ยะลา', 95169, 625852392, 'yqsm1n', 490, '', '1', '2024-04-04 17:37:44', 'April'),
(00133, 'ยัสมิน', 'ปูเต๊ะ', 331, 2, 'พร่อน', 'เมือง', 'ยะลา', 95169, 625852392, 'yqsm1n', 490, '', '1', '2024-04-04 17:40:18', 'April'),
(00134, 'ยัสมิน', 'ปูเต๊ะ', 331, 2, 'พร่อน', 'เมือง', 'ยะลา', 95169, 625852392, 'yqsm1n', 1480, '', '1', '2024-04-04 22:20:50', 'April'),
(00135, 'ยัสมิน', 'ปูเต๊ะ', 331, 2, 'พร่อน', 'เมือง', 'ยะลา', 95169, 625852392, 'yqsm1n', 3430, '', '1', '2024-04-07 17:25:30', 'April'),
(00136, 'นารีรัตน์', 'อาแด', 34, 2, 'สะเตง', 'เมือง', 'ยะลา', 95000, 988887651, 'nareerat', 490, '', '1', '2024-04-09 03:26:28', ''),
(00137, 'นารีรัตน์', 'อาแด', 34, 2, 'สะเตง', 'เมือง', 'ยะลา', 95000, 988887651, 'nareerat', 490, '', '1', '2024-04-09 03:29:20', ''),
(00138, 'นารีรัตน์', 'อาแด', 34, 2, 'สะเตง', 'เมือง', 'ยะลา', 95000, 988887651, 'nareerat', 990, '', '1', '2024-04-09 03:31:04', ''),
(00139, 'นารีรัตน์', 'อาแด', 34, 2, 'สะเตง', 'เมือง', 'ยะลา', 95000, 988887651, 'nareerat', 990, '', '1', '2024-04-09 03:32:54', ''),
(00140, 'นารีรัตน์', 'อาแด', 34, 2, 'สะเตง', 'เมือง', 'ยะลา', 95000, 988887651, 'nareerat', 990, '', '1', '2024-04-09 03:35:14', ''),
(00141, 'นารีรัตน์', 'อาแด', 34, 2, 'สะเตง', 'เมือง', 'ยะลา', 95000, 988887651, 'nareerat', 2170, '', '1', '2024-04-09 04:23:15', '');

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `id` int(11) NOT NULL COMMENT 'ลำดับที่',
  `orderID` int(5) UNSIGNED ZEROFILL NOT NULL COMMENT 'เลขที่ใบสั่งซื้อ',
  `product_id` int(3) UNSIGNED ZEROFILL NOT NULL COMMENT 'รหัสสินค้า',
  `product_price` float NOT NULL COMMENT 'ราคาสินค้า',
  `orderQty` int(11) NOT NULL COMMENT 'จำนวนที่สั่งซื้อ',
  `Total` float NOT NULL COMMENT 'ราคารวม'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`id`, `orderID`, `product_id`, `product_price`, `orderQty`, `Total`) VALUES
(1, 00000, 053, 590, 1, 0),
(2, 00000, 073, 590, 1, 0),
(3, 00000, 072, 790, 1, 0),
(4, 00000, 073, 590, 1, 0),
(5, 00000, 072, 790, 1, 0),
(6, 00051, 073, 590, 1, 590),
(7, 00052, 073, 590, 1, 590),
(8, 00053, 073, 590, 1, 590),
(9, 00053, 053, 590, 1, 590),
(10, 00054, 072, 790, 1, 790),
(11, 00055, 072, 790, 1, 790),
(12, 00056, 072, 790, 1, 790),
(13, 00057, 072, 790, 1, 790),
(14, 00058, 073, 590, 2, 1180),
(15, 00059, 049, 490, 1, 490),
(16, 00059, 053, 590, 2, 1180),
(17, 00059, 073, 590, 1, 590),
(18, 00059, 072, 790, 1, 790),
(19, 00060, 049, 490, 1, 490),
(20, 00061, 072, 790, 1, 790),
(21, 00062, 072, 790, 1, 790),
(22, 00063, 073, 590, 1, 590),
(23, 00064, 072, 790, 1, 790),
(24, 00065, 072, 790, 1, 790),
(25, 00066, 072, 790, 1, 790),
(26, 00067, 072, 790, 2, 1580),
(27, 00068, 072, 790, 1, 790),
(28, 00069, 082, 990, 2, 1980),
(29, 00070, 083, 490, 1, 490),
(30, 00071, 083, 490, 6, 2940),
(31, 00071, 085, 490, 1, 490),
(32, 00072, 083, 490, 1, 490),
(33, 00073, 083, 490, 1, 490),
(34, 00074, 085, 490, 1, 490),
(35, 00075, 083, 490, 1, 490),
(36, 00076, 083, 490, 1, 490),
(37, 00077, 085, 490, 1, 490),
(38, 00078, 083, 490, 2, 980),
(39, 00079, 083, 490, 1, 490),
(40, 00080, 083, 490, 1, 490),
(41, 00081, 083, 490, 1, 490),
(42, 00082, 083, 490, 1, 490),
(43, 00083, 083, 490, 2, 980),
(44, 00084, 083, 490, 1, 490),
(45, 00085, 083, 490, 1, 490),
(46, 00086, 083, 490, 1, 490),
(47, 00087, 083, 490, 1, 490),
(48, 00088, 083, 490, 1, 490),
(49, 00089, 086, 590, 1, 590),
(50, 00090, 086, 590, 1, 590),
(51, 00091, 086, 590, 1, 590),
(52, 00092, 086, 590, 1, 590),
(53, 00093, 086, 590, 2, 1180),
(54, 00094, 086, 590, 7, 4130),
(55, 00095, 086, 590, 1, 590),
(56, 00096, 085, 490, 1, 490),
(57, 00097, 082, 990, 1, 990),
(58, 00098, 083, 490, 1, 490),
(59, 00099, 086, 590, 1, 590),
(60, 00099, 085, 490, 1, 490),
(61, 00100, 086, 590, 1, 590),
(62, 00102, 082, 990, 1, 990),
(63, 00111, 083, 490, 1, 490),
(64, 00114, 085, 490, 1, 490),
(65, 00115, 086, 590, 1, 590),
(66, 00116, 086, 590, 1, 590),
(67, 00117, 086, 590, 1, 590),
(68, 00118, 086, 590, 5, 2950),
(69, 00119, 085, 490, 1, 490),
(70, 00120, 083, 490, 1, 490),
(71, 00121, 086, 590, 4, 2360),
(72, 00122, 083, 490, 1, 490),
(73, 00122, 086, 590, 1, 590),
(74, 00123, 086, 590, 1, 590),
(75, 00124, 082, 990, 1, 990),
(76, 00125, 086, 590, 1, 590),
(77, 00126, 086, 590, 1, 590),
(78, 00127, 086, 590, 1, 590),
(79, 00128, 083, 490, 2, 980),
(80, 00128, 082, 990, 1, 990),
(81, 00128, 086, 590, 2, 1180),
(82, 00129, 083, 490, 3, 1470),
(83, 00130, 086, 590, 1, 590),
(84, 00131, 082, 990, 1, 990),
(85, 00132, 085, 490, 1, 490),
(86, 00133, 085, 490, 1, 490),
(87, 00134, 083, 490, 1, 490),
(88, 00134, 082, 990, 1, 990),
(89, 00135, 083, 490, 3, 1470),
(90, 00135, 085, 490, 4, 1960),
(91, 00140, 082, 990, 1, 990),
(92, 00141, 086, 590, 2, 1180),
(93, 00141, 082, 990, 1, 990);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `orderID` int(5) UNSIGNED ZEROFILL NOT NULL COMMENT 'เลขที่ใบสั่งซื้อ',
  `pay_money` double NOT NULL COMMENT 'จำนวนเงินที่โอน',
  `pay_date` int(11) NOT NULL COMMENT 'วันที่ชำระเงิน',
  `pay_time` int(11) NOT NULL COMMENT 'เวลาชำระเงิน',
  `pay_image` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT 'หลักฐานการชำระเงิน'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(4) UNSIGNED ZEROFILL NOT NULL COMMENT 'รหัสสินค้า',
  `type_id` int(2) NOT NULL COMMENT 'รหัสประเภทสินค้า',
  `product_name` varchar(199) COLLATE utf8_unicode_ci NOT NULL COMMENT 'ชื่อสินค้า',
  `product_size` varchar(99) COLLATE utf8_unicode_ci NOT NULL COMMENT 'ขนาดสินค้า',
  `product_detail` varchar(199) COLLATE utf8_unicode_ci NOT NULL COMMENT 'รายละเอียดสินค้า',
  `product_color` varchar(30) COLLATE utf8_unicode_ci NOT NULL COMMENT 'สีสินค้า',
  `cost_price` int(5) NOT NULL COMMENT 'ราคาต้นทุน',
  `product_price` float NOT NULL COMMENT 'ราคาสินค้า',
  `product_img` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'รูปภาพสินค้า',
  `product_img2` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'รูปภาพ2',
  `product_img3` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'รูปภาพ3',
  `size_s` int(5) NOT NULL COMMENT 'จำนวนไซต์S',
  `size_m` int(5) NOT NULL COMMENT 'จำนวนไซต์M',
  `size_L` int(5) NOT NULL COMMENT 'จำนวนไซต์L',
  `size_XL` int(5) NOT NULL COMMENT 'จำนวนไซต์XL',
  `over_size` int(5) NOT NULL COMMENT 'จำนวนOVER SIZE'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `type_id`, `product_name`, `product_size`, `product_detail`, `product_color`, `cost_price`, `product_price`, `product_img`, `product_img2`, `product_img3`, `size_s`, `size_m`, `size_L`, `size_XL`, `over_size`) VALUES
(0082, 12, 'Aliz Collection', '', 'ชุดเดรส ผ้าชีฟอง ซับในทั้งชุด ระบายไหล่ ผ้าพริ้ว', 'สีเขียวขี้ม้า', 600, 990, 'product_660c91835a1b1.jpg', 'product_660c91835a6b1.jpg', 'product_660c91835aafc.jpg', 30, 10, 10, 10, 10),
(0083, 12, 'Mada Collection', '', 'ชุดเดรสทรงเบลล่า ดีเทลแขนพอง ผ้าชีฟองซับในทั้งตัว', 'เขียว', 290, 490, 'product_660c93c695163.jpg', 'product_660c93c695b7c.jpg', 'product_660c93c696537.jpg', 10, 10, 10, 10, 10),
(0085, 12, 'Nalinfa Collection', '', 'ผ้าชีฟองซับในทั้งชุด ดีเทลจีบเอว ผ้าพริ้วไม่ร้อน', 'สีดำ', 300, 490, 'product_660c95996be41.jpg', 'product_660c95996c2ba.jpg', 'product_660c95996c6c9.jpg', 20, 10, 10, 10, 10),
(0086, 2, 'FARAH COLLECTION', '', 'ชุดเซ็ทกระโปรง ผ้าสลาฟ ไม่ต้องรีด', 'สีฟ้าน้ำทะเล', 300, 590, 'product_660cfa507b454.jpg', 'product_660cfa507bd43.jpg', 'product_660cfa507c0c4.jpg', 10, 10, 10, 10, 10);

-- --------------------------------------------------------

--
-- Table structure for table `product_size`
--

CREATE TABLE `product_size` (
  `size_id` int(3) UNSIGNED ZEROFILL NOT NULL COMMENT 'รหัสไซต์สินค้า',
  `size_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'ชื่อไซต์สินค้า',
  `size_detail` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'รายละเอียดไซต์สินค้า'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product_size`
--

INSERT INTO `product_size` (`size_id`, `size_name`, `size_detail`) VALUES
(001, 'S', 'อก 32-34 เอว 30 ยาว 53'),
(002, 'M', 'อก 36-38 เอว 32 ยาว 54'),
(003, 'L', 'อก 38-42 เอว 35 ยาว 55'),
(004, 'XL', 'อก 42-44 เอว 38 ยาว 57'),
(005, 'Over size', 'อก 70 ความยาวเสื้อ 25-30 เอวกระโปรงยางยืด 28-38 ความยาวกระโปรง 39');

-- --------------------------------------------------------

--
-- Table structure for table `product_stock`
--

CREATE TABLE `product_stock` (
  `Stock_id` int(5) NOT NULL COMMENT 'รหัสสต๊อกสินค้า',
  `date_stock` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT 'วันที่เพิ่มสต๊อกสินค้า',
  `type_id` int(3) NOT NULL COMMENT 'รหัสประเภทสินค้า',
  `product_id` int(5) NOT NULL COMMENT 'รหัสสินค้า',
  `product_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'ชื่อสินค้า',
  `product_detail` varchar(99) COLLATE utf8_unicode_ci NOT NULL COMMENT 'รายละเอียดสินค้า',
  `product_color` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'สีสินค้า',
  `size_s` int(5) NOT NULL COMMENT 'จำนวนไซต์S',
  `size_m` int(5) NOT NULL COMMENT 'จำนวนไซต์M',
  `size_L` int(5) NOT NULL COMMENT 'จำนวนไซต์L',
  `size_XL` int(5) NOT NULL COMMENT 'จำนวนไซต์XL',
  `over_size` int(5) NOT NULL COMMENT 'จำนวนOVER SIZE'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product_stock`
--

INSERT INTO `product_stock` (`Stock_id`, `date_stock`, `type_id`, `product_id`, `product_name`, `product_detail`, `product_color`, `size_s`, `size_m`, `size_L`, `size_XL`, `over_size`) VALUES
(1, '0000-00-00 00:00:00', 2, 0, 'ROSE COLLECTION', 'ชุดเซ็ทกระโปรง', 'สีเหลืองมะนาว', 11, 0, 0, 0, 0),
(2, '2024-03-27 17:00:00', 6, 0, 'NADA COLLECTION', 'ชุดเซ็ทกระโปรง', 'แดง', 30, 0, 0, 0, 0),
(3, '2024-04-02 17:00:00', 12, 0, 'Aliz Collection', 'ชุดเดรส ผ้าชีฟอง ซับในทั้งชุด ระบายไหล่ ผ้าพริ้ว', 'สีเขียวขี้ม้า', 10, 0, 0, 0, 0),
(4, '2024-04-02 17:00:00', 12, 0, 'Mada Collection', 'ชุดเดรสทรงเบลล่า ดีเทลแขนพอง ผ้าชีฟองซับในทั้งตัว', 'เขียว', 5, 0, 0, 0, 0),
(5, '2024-04-02 17:00:00', 12, 0, 'Nalinfa Collection', 'ชุดเดรสทรงเบลล่า ดีเทลจีบเอว ผ้าชีฟองซับในทั้งตัว ผ้าพริ้วไม่ร้อน อำพรางหุ่นได้ดี', 'สีดำ', 20, 0, 0, 0, 0),
(6, '2024-04-02 17:00:00', 12, 0, 'Nalinfa Collection', 'ชุดเดรส ผ้าชีฟองซับในทั้งชุด ดีเทลจีบเอว ผ้าพริ้วไม่ร้อน', 'สีดำ', 20, 0, 0, 0, 0),
(7, '2024-04-02 17:00:00', 2, 0, 'FARAH COLLECTION', 'ชุดเซ็ทกระโปรง ผ้าสลาฟ ไม่ต้องรีด', 'สีฟ้าน้ำทะเล', 10, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `product_type`
--

CREATE TABLE `product_type` (
  `type_id` int(3) UNSIGNED ZEROFILL NOT NULL COMMENT 'รหัสประเภทสินค้า',
  `type_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'ชื่อประเภทสินค้า'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product_type`
--

INSERT INTO `product_type` (`type_id`, `type_name`) VALUES
(002, 'ชุดเซ็ท'),
(003, 'ผ้าคลุมหัว/ฮีญาบ'),
(004, 'เสื้อแฟชั่น'),
(006, 'รองเท้า'),
(012, 'ชุดเดรส');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_marks`
--

CREATE TABLE `tbl_marks` (
  `student_id` int(10) UNSIGNED NOT NULL,
  `student_name` varchar(35) NOT NULL,
  `marks` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_marks`
--

INSERT INTO `tbl_marks` (`student_id`, `student_name`, `marks`) VALUES
(1, 'John', 39),
(2, 'Mary ', 46),
(3, 'Maya', 65),
(4, 'Rahul', 90),
(5, 'Priya', 75);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(6) UNSIGNED ZEROFILL NOT NULL COMMENT 'รหัสผู้ใช้งานระบบ',
  `first_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'ชื่อผู้ใช้งาน',
  `last_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'นามสกุล',
  `number_address` int(5) NOT NULL COMMENT 'เลขที่',
  `moo_address` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'หมู่',
  `district_address` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'ตำบล/แขวง',
  `amphoe_address` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'อำเภอ',
  `province_address` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'จังหวัด',
  `postalcode` int(7) NOT NULL COMMENT 'รหัสไปรษณีย์',
  `user_telephone` int(10) NOT NULL COMMENT 'เบอร์โทรศัพท์',
  `user_email` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'อีเมล',
  `user_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'ชื่อผู้ใช้งาน',
  `user_password` varchar(128) COLLATE utf8_unicode_ci NOT NULL COMMENT 'รหัสผ่าน'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `first_name`, `last_name`, `number_address`, `moo_address`, `district_address`, `amphoe_address`, `province_address`, `postalcode`, `user_telephone`, `user_email`, `user_name`, `user_password`) VALUES
(000030, 'มีมี่', 'มาเรีย', 46, '4', 'ท่าเรือ', 'โคกโพธิ์', 'ยะลา', 98678, 628799998, 'mimi@gmail.com', 'maria', '6a761223ff9d566b5a334fa16d5576bd788c5286b70ded518b4a3bb66d7e0db50e7b17e75fdd1694b71a46d60285eb2beab27b27d3cbc4f2ce65d9a838fb3810'),
(000031, 'ยัสมิน', 'ปูเต๊ะ', 331, '2', 'พร่อน', 'เมือง', 'ยะลา', 95169, 625852392, 'yasmin600618@gmail.com', 'yqsm1n', '6bc74676849f5a6eb19f7ac09ffef7e78fd75f92646b5edf4600baf7a6ea0ed91ff044cd6ba2805287bd5278bcd857aa1d6631b06862a60eaeea7a5d4bf1c59a'),
(000032, 'ซูรีนา', 'กาซอ', 34, '6', 'ท่าเรือ', 'โคกโพธิ์', 'ปัตตานี', 95160, 628799998, 'na@gmail.com', 'surina', 'c9e9ca76e5f69955b433a710993927e836dbf70fe4f88bfb3032ef9cf72b38a44e5bb59ee3f2b4c122adcc42ee6268de152a62bdaf42718da7925605c02fcdf1'),
(000033, 'นารีรัตน์', 'อาแด', 34, '2', 'สะเตง', 'เมือง', 'ยะลา', 95000, 988887651, 'nari@gmail.com', 'nareerat', 'c9e9ca76e5f69955b433a710993927e836dbf70fe4f88bfb3032ef9cf72b38a44e5bb59ee3f2b4c122adcc42ee6268de152a62bdaf42718da7925605c02fcdf1'),
(000034, 'ยัสมิน', 'ปูเต๊ะ', 59, '1', 'พร่อน', 'เมือง', 'ยะลา', 95160, 625852392, 'yasmin600618@gmail.com', 'yasmin', '7d59108361c6c587b91c2b024ea74cc88f4ac12609f5d77a778fcd439e7d15288139fd60fb5c47a60115c03efbb830686ae4be9fbd236aae6d064f789501df97'),
(000035, 'เอเรีย', 'ห้าก้าว', 23, '3', 'สะเตง', 'เมือง', 'ยะลา', 95000, 828868103, 'aria_5@gmail.com', 'aria', '7d59108361c6c587b91c2b024ea74cc88f4ac12609f5d77a778fcd439e7d15288139fd60fb5c47a60115c03efbb830686ae4be9fbd236aae6d064f789501df97');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminn`
--
ALTER TABLE `adminn`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `autocomplete`
--
ALTER TABLE `autocomplete`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`images_id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`orderID`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`orderID`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `product_size`
--
ALTER TABLE `product_size`
  ADD PRIMARY KEY (`size_id`);

--
-- Indexes for table `product_stock`
--
ALTER TABLE `product_stock`
  ADD PRIMARY KEY (`Stock_id`);

--
-- Indexes for table `product_type`
--
ALTER TABLE `product_type`
  ADD PRIMARY KEY (`type_id`);

--
-- Indexes for table `tbl_marks`
--
ALTER TABLE `tbl_marks`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adminn`
--
ALTER TABLE `adminn`
  MODIFY `admin_id` int(3) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT COMMENT 'รหัสพนักงาน', AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `autocomplete`
--
ALTER TABLE `autocomplete`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `images_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `orderID` int(5) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT COMMENT 'เลขที่ใบสั่งซื้อ', AUTO_INCREMENT=142;

--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ลำดับที่', AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `orderID` int(5) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT COMMENT 'เลขที่ใบสั่งซื้อ';

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(4) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT COMMENT 'รหัสสินค้า', AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `product_size`
--
ALTER TABLE `product_size`
  MODIFY `size_id` int(3) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT COMMENT 'รหัสไซต์สินค้า', AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `product_stock`
--
ALTER TABLE `product_stock`
  MODIFY `Stock_id` int(5) NOT NULL AUTO_INCREMENT COMMENT 'รหัสสต๊อกสินค้า', AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `product_type`
--
ALTER TABLE `product_type`
  MODIFY `type_id` int(3) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT COMMENT 'รหัสประเภทสินค้า', AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbl_marks`
--
ALTER TABLE `tbl_marks`
  MODIFY `student_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(6) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT COMMENT 'รหัสผู้ใช้งานระบบ', AUTO_INCREMENT=36;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
