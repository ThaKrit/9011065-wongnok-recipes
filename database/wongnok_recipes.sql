-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 10, 2024 at 06:54 PM
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
(2, 'thakrit', '1234', 'Nipaporn', 'Jin', 'napaporn@pea.co.th', 1),
(3, 'user', '1234', 'spg', 'c3', 'nafa@pea.co.th', 1);

-- --------------------------------------------------------

--
-- Table structure for table `foodrecipes`
--

CREATE TABLE `foodrecipes` (
  `food_id` int(11) NOT NULL,
  `food_name` varchar(50) NOT NULL,
  `food_img` text NOT NULL,
  `food_mat` varchar(500) NOT NULL,
  `food_step` varchar(500) NOT NULL,
  `food_time` int(2) NOT NULL,
  `food_level` varchar(10) NOT NULL,
  `food_category` int(1) NOT NULL,
  `food_by` varchar(20) NOT NULL,
  `food_avg` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `foodrecipes`
--

INSERT INTO `foodrecipes` (`food_id`, `food_name`, `food_img`, `food_mat`, `food_step`, `food_time`, `food_level`, `food_category`, `food_by`, `food_avg`) VALUES
(6, 'ไข่เจียว', 'img_6613ca2cb78bb.jpg', '1.น้ำมัน\r\n2.ไข่เจียว\r\n3.ผงปรุงรส\r\n4.ซอสภูเขาทอง (ฝาเขียว)', '1.ตั้งน้ำมันให้ร้อนค่อนเดือด\r\n2.ตีไข่ให้ไข่แดงกับไข่ขาวเข้ากันดี \r\n3.นำเครื่องปรุงรสที่เตรียมไว้ใส่ในไข่ตามชอบ\r\n4.เมื่อน้ำมันเดือดแล้วให้นำไข่ที่ตีจนเข้ากันแล้วเทลงในกระทะ\r\n5.สังเกตุสีของไข่ให้สุกเท่ากันท', 1, '1', 2, 'Thanakrit', 4),
(7, 'เฟรนฟรายมันฝรั่งสด', 'img_6613fb8f28ce9.png', '1.มันฝรั่งสด\r\n2.น้ำมันพืชสำหรับทอด\r\n3.เกลือ', '1.นำมันฝรั่งมาปอกเปลือก \r\n2.หั่นเป็นเส้นๆ จากนั้นนำไปล้างน้ำให้ยางออก ล้าง2รอบแล้วใช้ผ้าขาวบางซับ หรือพักไว้ให้สะเด็ดน้ำ \r\n3.พอมันฝรั่งแห้งสะเด็ดน้ำแล้วนำไปทอดในน้ำมันร้อนๆให้พอสุก ตักขึ้นพักไว้ให้เย็น \r\n4.พอสุก ตักขึ้นพักไว้ให้เย็น ใส่กล่องปิดฝาแล้วนำไปแช่ในตู้เย็นประมาณ 1-2ชั่วโมง\r\nเคล็ดลับ: การเอ', 3, '2', 1, 'Thanakrit', 5),
(8, 'บัวลอยเสียบไม้', 'img_6613fee00a4e0.png', '1.แป้งข้าวเจ้า 1 ถ้วย\r\n2.แป้งข้าวเหนียว 1 ถ้วย\r\n3.มันม่วงบด 50 กรัม\r\n4.ฟักทองบด 50 กรัม\r\n5.น้ำใบเตย 50 มิลลิลิตร\r\n6.น้ำเปล่า (แป้งมันม่วง) 50 มิลลิลิตร\r\n7.น้ำเปล่า (แป้งฟักทอง) 50 มิลลิลิตร\r\n8.หัวกะทิ 500 มิลลิลิตร\r\n9.น้ำตาลทราย ½ ถ้วย\r\n10.เกลือ ½ ช้อนชา\r\n11.งาขาว และงาดำ ตามชอบ\r\n12.น้ำตาลแดง ตามชอบ', '1.ทำน้ำราด : นำหม้อขึ้นตั้งไฟปานกลาง เทหัวกะทิลงไป ตามด้วยน้ำตาลทราย และเกลือ คนให้เข้ากัน และต้มจนเดือด \r\n2.ทำแป้ง : แบ่งแป้งข้าวเหนียว และแป้งข้าวเจ้า เป็นสามส่วนเท่า ๆ กัน (ส่วนละ ⅓ ถ้วย)\r\nถ้วยแรกใส่มันม่วงบด และน้ำเปล่า (แป้งมันม่วง) นวดให้เข้ากันจนแป้งไม่ติดมือ\r\nถ้วยที่สองใส่ฟักทองบด และน้ำเปล่', 2, '3', 3, 'Nipaporn', 5),
(9, 'กะเพราหมูสับ', 'img_6614d33744798.jpg', '1.พริกแดง 15 เม็ด\r\n2.กระเทียม 1 กำมือ \r\n3.หมูบดลวก 250 กรัม\r\n4.พริกไทย 1/2 ช้อนชา\r\n5.ใบกะเพรา 1 กำมือ\r\n6.น้ำตาลทราย 1 ช้อนโต๊ะ\r\n7.ซอสปรุงรส 1 ช้อนโต๊ะ\r\n8.ผงปรุงรส 1 ช้อนชา\r\n9.ซอสหอยนางรม 1 ช้อนโต๊ะ\r\n10.ซีอิ๊วดำ 1 ช้อนชา\r\n11.น้ำมันพืช 2 ช้อนโต๊ะ', '1.โขลกพริกกับกระเทียมพอละเอียด เตรียมไว้\r\n2.หมักหมูบด โดยใส่ผงปรุงรสและน้ำตาลทรายลงไปเล็กน้อย จากนั้นนำไปลวกจนสุก ตักขึ้นสะเด็ดน้ำ พักไว้จนแห้ง\r\n3.ตั้งกระทะใส่น้ำมันลงไปเล็กน้อย พอน้ำมันร้อนใส่พริกกระเทียมโขลกลงไป เติมน้ำเล็กน้อย ผัดให้เข้ากัน ระวังไหม้ด้วย\r\n4.ใส่พริกไทยป่น ตามด้วยหมูบดลวกปรุงรส ผัดให้เข้ากันสักครู่\r\n5.ปรุงรสด้วยผงปรุงรส ซอสปรุงรส น้ำตาลทราย ซอสหอยนางรม และซีอิ๊วดำเล็กน้อย ผัดคลุกเคล้าให้เข้ากัน \r\n6.ขั้นตอนสุดท้าย ใส่ใบกะเพราลงไปผัดสักครู่ ปิดไฟ', 2, '2', 2, 'Thanakrit', 2),
(10, 'กล้วยบวชชี', 'img_6614d3aa78985.jpg', '1.กล้วยน้ำว้า (สุกหรือห่ามตามชอบ)\r\n2.กะทิกล่อง 500 มิลลิลิตร\r\n3.น้ำตาลปี๊บ 80 กรัม\r\n4.น้ำตาลทราย 80 กรัม\r\n5.เกลือ 1/2 ช้อนชา\r\n6.ใบเตย 5 ใบ', '1.ปอกกล้วย หั่นชิ้นตามชอบ แล้วนำไปล้างในน้ำเปล่าผสมเกลือเพื่อไม่ให้กล้วยดำ \r\n2.นำไปนึ่งประมาณ 30 นาที หรือจนสุก เพื่อเวลาต้มจะได้ไม่เละและไม่ฝาด\r\n3.ตั้งน้ำกะทิใช้ไฟปานกลางค่อนไปอ่อน ใส่น้ำตาลปี๊บ น้ำตาลทราย เกลือ และใบเตย คนให้ทุกอย่างละลาย ใส่กล้วยนึ่งลงไป รอจนเดือด ปิดไฟ', 3, '2', 3, 'Thanakrit', 1),
(11, 'เทมปุระเห็ด', 'img_6614d5197f0f2.jpg', '1.แป้งข้าวโพด 200 กรัม\r\n2.เกลือป่น\r\n3.พริกไทยป่น\r\n4.น้ำเย็นจัด 250 มิลลิลิตร\r\n5.น้ำมันพืช สำหรับทอด\r\n6.เห็ดหอมสด ผ่าครึ่ง 50 กรัม\r\n7.เห็ดเข็มทอง 50 กรัม\r\n8.เห็ดออรินจิ ผ่าครึ่งตามยาว 50 กรัม\r\n9.เห็ดนางรม 50 กรัม\r\n10.เห็ดโคนญี่ปุ่น 50 กรัม\r\n11.เกล็ดขนมปัง 200 กรัม\r\n12.ซอสพริกสูตรเจ', '1.ละลายแป้งข้าวโพด เกลือป่น และพริกไทยป่นกับน้ำเย็นจัดเข้าด้วยกัน เตรียมไว้\r\n2. เทน้ำมันลงในกระทะ นำขึ้นตั้งไฟจนร้อน\r\n3. ชุบเห็ดที่เตรียมไว้ลงในส่วนผสมแป้ง คลุกกับเกล็ดขนมปัง นำลงทอดในน้ำมันร้อนจนเห็ดสุกเหลืองกรอบ ตักขึ้นสะเด็ดน้ำมัน จัดใส่จานเสิร์ฟกับซอสพริก', 2, '1', 1, 'Nipaporn', 4);

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `rat_score` int(11) NOT NULL,
  `rat_comment` varchar(100) NOT NULL,
  `rat_id_food` int(11) NOT NULL,
  `rat_by` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`rat_score`, `rat_comment`, `rat_id_food`, `rat_by`) VALUES
(4, 'สูตรนี้อร่อยมากครับ', 11, 'spg'),
(5, 'เยี่ยมเลยครับ', 8, 'spg'),
(2, 'ทำยากไปนิด', 9, 'spg'),
(3, 'เยี่ยม', 6, 'spg'),
(1, 'ทำยาก', 10, 'spg'),
(5, 'อร่อยครับ', 7, 'spg'),
(5, 'สูตรนี้อร่อยมากค่ะ', 6, 'Nipaporn');

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `acc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `foodrecipes`
--
ALTER TABLE `foodrecipes`
  MODIFY `food_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
