-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 08, 2024 at 06:19 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wongnok_recipes`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `acc_id` int(11) NOT NULL,
  `acc_user` varchar(20) NOT NULL,
  `acc_pass` varchar(20) NOT NULL,
  `acc_name` varchar(30) NOT NULL,
  `acc_lastname` varchar(30) NOT NULL,
  `acc_address` varchar(40) NOT NULL,
  `acc_type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`acc_id`, `acc_user`, `acc_pass`, `acc_name`, `acc_lastname`, `acc_address`, `acc_type`) VALUES
(1, 'admin', '1234', 'Thanakrit', 'Pimnoi', 'spg@pea.co.th', 1),
(2, 'thakrit', '1234', 'Nipaporn', 'Jin', 'napaporn@pea.co.th', 1);

-- --------------------------------------------------------

--
-- Table structure for table `foodrecipes`
--

CREATE TABLE `foodrecipes` (
  `food_id` int(11) NOT NULL,
  `food_name` varchar(50) NOT NULL,
  `food_img` text NOT NULL,
  `food_mat` varchar(300) NOT NULL,
  `food_step` varchar(300) NOT NULL,
  `food_time` int(2) NOT NULL,
  `food_level` varchar(10) NOT NULL,
  `food_category` int(1) NOT NULL,
  `food_by` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `foodrecipes`
--

INSERT INTO `foodrecipes` (`food_id`, `food_name`, `food_img`, `food_mat`, `food_step`, `food_time`, `food_level`, `food_category`, `food_by`) VALUES
(6, 'ไข่เจียว', 'img_6613ca2cb78bb.jpg', '1.น้ำมัน\r\n2.ไข่เจียว\r\n3.ผงปรุงรส\r\n4.ซอสภูเขาทอง (ฝาเขียว)', '1.ตั้งน้ำมันให้ร้อนค่อนเดือด\r\n2.ตีไข่ให้ไข่แดงกับไข่ขาวเข้ากันดี \r\n3.นำเครื่องปรุงรสที่เตรียมไว้ใส่ในไข่ตามชอบ\r\n4.เมื่อน้ำมันเดือดแล้วให้นำไข่ที่ตีจนเข้ากันแล้วเทลงในกระทะ\r\n5.สังเกตุสีของไข่ให้สุกเท่ากันท', 1, '1', 2, 'Thanakrit'),
(7, 'เฟรนฟรายมันฝรั่งสด', 'img_6613fb8f28ce9.png', '1.มันฝรั่งสด\r\n2.น้ำมันพืชสำหรับทอด\r\n3.เกลือ', '1.นำมันฝรั่งมาปอกเปลือก \r\n2.หั่นเป็นเส้นๆ จากนั้นนำไปล้างน้ำให้ยางออก ล้าง2รอบแล้วใช้ผ้าขาวบางซับ หรือพักไว้ให้สะเด็ดน้ำ \r\n3.พอมันฝรั่งแห้งสะเด็ดน้ำแล้วนำไปทอดในน้ำมันร้อนๆให้พอสุก ตักขึ้นพักไว้ให้เย็น \r\n4.พอสุก ตักขึ้นพักไว้ให้เย็น ใส่กล่องปิดฝาแล้วนำไปแช่ในตู้เย็นประมาณ 1-2ชั่วโมง\r\nเคล็ดลับ: การเอ', 3, '2', 1, 'Thanakrit'),
(8, 'บัวลอยเสียบไม้', 'img_6613fee00a4e0.png', '1.แป้งข้าวเจ้า 1 ถ้วย\r\n2.แป้งข้าวเหนียว 1 ถ้วย\r\n3.มันม่วงบด 50 กรัม\r\n4.ฟักทองบด 50 กรัม\r\n5.น้ำใบเตย 50 มิลลิลิตร\r\n6.น้ำเปล่า (แป้งมันม่วง) 50 มิลลิลิตร\r\n7.น้ำเปล่า (แป้งฟักทอง) 50 มิลลิลิตร\r\n8.หัวกะทิ 500 มิลลิลิตร\r\n9.น้ำตาลทราย ½ ถ้วย\r\n10.เกลือ ½ ช้อนชา\r\n11.งาขาว และงาดำ ตามชอบ\r\n12.น้ำตาลแดง ตามชอบ', '1.ทำน้ำราด : นำหม้อขึ้นตั้งไฟปานกลาง เทหัวกะทิลงไป ตามด้วยน้ำตาลทราย และเกลือ คนให้เข้ากัน และต้มจนเดือด \r\n2.ทำแป้ง : แบ่งแป้งข้าวเหนียว และแป้งข้าวเจ้า เป็นสามส่วนเท่า ๆ กัน (ส่วนละ ⅓ ถ้วย)\r\nถ้วยแรกใส่มันม่วงบด และน้ำเปล่า (แป้งมันม่วง) นวดให้เข้ากันจนแป้งไม่ติดมือ\r\nถ้วยที่สองใส่ฟักทองบด และน้ำเปล่', 2, '3', 3, 'Nipaporn'),
(9, 'ไข่เจียว', 'img_6613ca2cb78bb.jpg', '1.น้ำมัน\r\n2.ไข่เจียว\r\n3.ผงปรุงรส\r\n4.ซอสภูเขาทอง (ฝาเขียว)', '1.ตั้งน้ำมันให้ร้อนค่อนเดือด\r\n2.ตีไข่ให้ไข่แดงกับไข่ขาวเข้ากันดี \r\n3.นำเครื่องปรุงรสที่เตรียมไว้ใส่ในไข่ตามชอบ\r\n4.เมื่อน้ำมันเดือดแล้วให้นำไข่ที่ตีจนเข้ากันแล้วเทลงในกระทะ\r\n5.สังเกตุสีของไข่ให้สุกเท่ากันท', 1, '1', 2, 'Thanakrit'),
(10, 'เฟรนฟรายมันฝรั่งสด', 'img_6613fb8f28ce9.png', '1.มันฝรั่งสด\r\n2.น้ำมันพืชสำหรับทอด\r\n3.เกลือ', '1.นำมันฝรั่งมาปอกเปลือก \r\n2.หั่นเป็นเส้นๆ จากนั้นนำไปล้างน้ำให้ยางออก ล้าง2รอบแล้วใช้ผ้าขาวบางซับ หรือพักไว้ให้สะเด็ดน้ำ \r\n3.พอมันฝรั่งแห้งสะเด็ดน้ำแล้วนำไปทอดในน้ำมันร้อนๆให้พอสุก ตักขึ้นพักไว้ให้เย็น \r\n4.พอสุก ตักขึ้นพักไว้ให้เย็น ใส่กล่องปิดฝาแล้วนำไปแช่ในตู้เย็นประมาณ 1-2ชั่วโมง\r\nเคล็ดลับ: การเอ', 3, '2', 1, 'Thanakrit'),
(11, 'บัวลอยเสียบไม้', 'img_6613fee00a4e0.png', '1.แป้งข้าวเจ้า 1 ถ้วย\r\n2.แป้งข้าวเหนียว 1 ถ้วย\r\n3.มันม่วงบด 50 กรัม\r\n4.ฟักทองบด 50 กรัม\r\n5.น้ำใบเตย 50 มิลลิลิตร\r\n6.น้ำเปล่า (แป้งมันม่วง) 50 มิลลิลิตร\r\n7.น้ำเปล่า (แป้งฟักทอง) 50 มิลลิลิตร\r\n8.หัวกะทิ 500 มิลลิลิตร\r\n9.น้ำตาลทราย ½ ถ้วย\r\n10.เกลือ ½ ช้อนชา\r\n11.งาขาว และงาดำ ตามชอบ\r\n12.น้ำตาลแดง ตามชอบ', '1.ทำน้ำราด : นำหม้อขึ้นตั้งไฟปานกลาง เทหัวกะทิลงไป ตามด้วยน้ำตาลทราย และเกลือ คนให้เข้ากัน และต้มจนเดือด \r\n2.ทำแป้ง : แบ่งแป้งข้าวเหนียว และแป้งข้าวเจ้า เป็นสามส่วนเท่า ๆ กัน (ส่วนละ ⅓ ถ้วย)\r\nถ้วยแรกใส่มันม่วงบด และน้ำเปล่า (แป้งมันม่วง) นวดให้เข้ากันจนแป้งไม่ติดมือ\r\nถ้วยที่สองใส่ฟักทองบด และน้ำเปล่', 2, '3', 3, 'Nipaporn');

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `rat_id` int(11) NOT NULL,
  `rat_score` int(11) NOT NULL,
  `rat_id_food` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`acc_id`);

--
-- Indexes for table `foodrecipes`
--
ALTER TABLE `foodrecipes`
  ADD PRIMARY KEY (`food_id`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`rat_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `acc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `foodrecipes`
--
ALTER TABLE `foodrecipes`
  MODIFY `food_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `rat_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
