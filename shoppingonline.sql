-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 08, 2020 at 11:28 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shoppingonline`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblcategories`
--

CREATE TABLE `tblcategories` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(250) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblcategories`
--

INSERT INTO `tblcategories` (`cat_id`, `cat_name`) VALUES
(8, 'iPhone'),
(6, 'Mac'),
(7, 'iPad'),
(9, 'Accessories'),
(10, 'TV');

-- --------------------------------------------------------

--
-- Table structure for table `tblcustomers`
--

CREATE TABLE `tblcustomers` (
  `cus_id` int(11) NOT NULL,
  `cus_firstname` varchar(250) NOT NULL,
  `cus_lastname` varchar(250) NOT NULL,
  `cus_email` varchar(250) NOT NULL,
  `cus_password` varchar(250) NOT NULL,
  `cus_status` int(11) NOT NULL,
  `cus_phonenumber` varchar(100) NOT NULL,
  `cus_nation` varchar(50) NOT NULL,
  `cus_address` text NOT NULL,
  `cus_otp` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblcustomers`
--

INSERT INTO `tblcustomers` (`cus_id`, `cus_firstname`, `cus_lastname`, `cus_email`, `cus_password`, `cus_status`, `cus_phonenumber`, `cus_nation`, `cus_address`, `cus_otp`) VALUES
(8, 'Chau', 'Nguyen', 'minhchaumcpro@gmail.com', 'bf35ce3a6581459a3cb2c4e21776bfb81abe71dafbc097cc498598b71bde06d998064bbdd930c53a', 1, '0346652725', 'Viet Nam', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tblproducts`
--

CREATE TABLE `tblproducts` (
  `pro_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `pro_name` varchar(250) NOT NULL,
  `pro_price` int(11) NOT NULL,
  `pro_img` varchar(250) NOT NULL,
  `pro_quantity` int(11) NOT NULL,
  `pro_time` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblproducts`
--

INSERT INTO `tblproducts` (`pro_id`, `cat_id`, `pro_name`, `pro_price`, `pro_img`, `pro_quantity`, `pro_time`) VALUES
(74, 9, 'Airpods 2', 200, '../.././img/1591586241_1588269203_AIRPOD-2-2-600x600.jpg', 1000, '2020-06-08'),
(73, 8, 'iPhone 6S Plus', 300, '../.././img/1591586158_1588348369_1588254570_1587294285_iphone-6-32gb-gold-hh-600x600-600x600-600x600.jpg', 100, '2020-06-08'),
(69, 6, 'Macbook Air 2019', 1500, '../.././img/1591555829_637207313358320269_macbook-air-2020-gold-2.png', 100, '2020-06-07'),
(71, 8, 'iPhone 8', 500, '../.././img/1591586116_1588854787_1587111590_iphone-8-64gb-hh-600x600.jpg', 100, '2020-06-08'),
(72, 8, 'iPhone XS Max', 1000, '../.././img/1591586138_1588858889_1587198890_iphone-xs-gold-600x600.jpg', 200, '2020-06-08'),
(66, 7, 'iPad 10.2', 2000, '../.././img/1591584038_ipad.png', 100, '2020-06-08'),
(70, 8, 'iPhone 11 Pro Max', 2000, '../.././img/1591586098_1588333345_1588254533_1587294030_spacegray1-1.png', 100, '2020-06-08'),
(68, 6, 'Macbook Pro 2019', 2500, '../.././img/1591555629_1591555584_1588959833_1587399611_636948951401239496_macbook-pro-13-touch-bar-2019-bac-1.png', 100, '2020-06-07'),
(65, 6, 'iMac 2019', 1000, '../.././img/1591555163_1588258256_imac-27-cto-hero-201903.jpg', 200, '2020-06-07');

-- --------------------------------------------------------

--
-- Table structure for table `tbltransaction`
--

CREATE TABLE `tbltransaction` (
  `trans_id` varchar(250) NOT NULL,
  `cus_id` int(11) NOT NULL,
  `trans_product` varchar(1000) NOT NULL,
  `trans_amount` int(11) NOT NULL,
  `trans_currency` varchar(50) NOT NULL,
  `trans_status` varchar(50) NOT NULL,
  `trans_createdate` timestamp NOT NULL DEFAULT current_timestamp(),
  `trans_address` varchar(250) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbltransaction`
--

INSERT INTO `tbltransaction` (`trans_id`, `cus_id`, `trans_product`, `trans_amount`, `trans_currency`, `trans_status`, `trans_createdate`, `trans_address`) VALUES
('ch_1GeGoFIv4nXquLZnPgsZrsgZ', 3, '1 x iPhone XS Max $1000\r\n1 x iPhone 7 $1000\r\n', 2000, 'usd', 'succeeded', '2020-05-02 08:35:16', 'so nha 15 ngo 142 Nguyen Ngoc Nai phuong Khuong Mai quan Thanh Xuan Ha Noi'),
('ch_1GeGoFIv4nXquLZnPgsZrsgZ', 3, '1 x iPhone XS Max     $1000<br>1 x iPhone 7      $1000<br>', 2000, 'usd', 'succeeded', '2020-05-02 08:34:56', 'so nha 15 ngo 142 Nguyen Ngoc Nai phuong Khuong Mai quan Thanh Xuan Ha Noi'),
('ch_1GeGkiIv4nXquLZnKDLfhNtn', 3, '1 x iPhone XS Max$1000\r\n', 1000, 'usd', 'succeeded', '2020-05-02 08:31:42', 'so nha 15 ngo 142 Nguyen Ngoc Nai phuong Khuong Mai quan Thanh Xuan Ha Noi'),
('ch_1GeGPFIv4nXquLZnPJVdxjQg', 1, '4 x iPhone XS Max<br>2 x iPhone 7 <br>', 6000, 'usd', 'succeeded', '2020-05-02 08:09:06', 'so nha 15 ngo 142 Nguyen Ngoc Nai phuong Khuong Mai quan Thanh Xuan Ha Noi'),
('ch_1GeGqwIv4nXquLZnGCWn6I15', 3, '1 x iPhone XS Max $1000<br>1 x iPhone 7  $1000<br>1 x iPhone 11 Pro Max $1000<br>', 3000, 'usd', 'succeeded', '2020-05-02 08:37:43', 'so nha 15 ngo 142 Nguyen Ngoc Nai phuong Khuong Mai quan Thanh Xuan Ha Noi'),
('ch_1GeGrpIv4nXquLZnpbUtSgY6', 3, '1 x iPhone XS Max $1000<br>1 x iPhone 7  $1000<br>1 x iPhone 11 Pro Max $1000<br>', 3000, 'usd', 'succeeded', '2020-05-02 08:38:38', 'so nha 15 ngo 142 Nguyen Ngoc Nai phuong Khuong Mai quan Thanh Xuan Ha Noi'),
('ch_1GeGtfIv4nXquLZnEeJAwKkp', 3, '1 x iPhone XS Max $1000<br>1 x iPhone 7  $1000<br>4 x iPhone 11 Pro Max $4000<br>', 6000, 'usd', 'succeeded', '2020-05-02 08:40:31', 'so nha 15 ngo 142 Nguyen Ngoc Nai phuong Khuong Mai quan Thanh Xuan Ha Noi'),
('ch_1GeIDIIv4nXquLZnGoetZUMx', 1, '1 x iPhone XS Max $1000<br>', 1000, 'usd', 'succeeded', '2020-05-02 10:04:53', 'so nha 15 ngo 142 Nguyen Ngoc Nai phuong Khuong Mai quan Thanh Xuan Ha Noi'),
('ch_1GfU6SIv4nXquLZn3KV2CR6I', 1, '', 4000, 'usd', 'succeeded', '2020-05-05 16:58:45', 'so nha 15 ngo 142 Nguyen Ngoc Nai phuong Khuong Mai quan Thanh Xuan Ha Noi'),
('ch_1GfU8cIv4nXquLZnqCMS4Dns', 1, '', 1000, 'usd', 'succeeded', '2020-05-05 17:00:59', 'so nha 15 ngo 142 Nguyen Ngoc Nai phuong Khuong Mai quan Thanh Xuan Ha Noi'),
('ch_1GfU9PIv4nXquLZnQmojmrqn', 1, '1 x iPhone 6S $1000<br>', 1000, 'usd', 'succeeded', '2020-05-05 17:01:48', 'so nha 15 ngo 142 Nguyen Ngoc Nai phuong Khuong Mai quan Thanh Xuan Ha Noi'),
('ch_1GfVIWIv4nXquLZnrz7CMA9a', 4, '1 x Airpods 2 $300<br>1 x iPhone 7  $1000<br>', 1300, 'usd', 'succeeded', '2020-05-05 18:15:16', '69 Vu Trong Phung quan Thanh Xuan Ha Noi'),
('ch_1GfVWeIv4nXquLZn9dFlftlp', 1, '1 x iPhone XS Max $1000<br>7 x Airpods 2 $2100<br>', 3100, 'usd', 'succeeded', '2020-05-05 18:29:52', 'The Gioi Ao Tinh Yeu That'),
('ch_1GfoyUIv4nXquLZne5sVjx3n', 1, '2 x iPad 10.2 $4000<br>4 x iPhone 6S $4000<br>2 x iPhone 11 Pro Max $6000<br>1 x Samsung Galaxy S10 $1000<br>1 x iPhone XS Max $1000<br>', 16000, 'usd', 'succeeded', '2020-05-06 15:15:57', 'so nha 15 ngo 142 Nguyen Ngoc Nai phuong Khuong Mai quan Thanh Xuan Ha Noi'),
('ch_1GiGICIv4nXquLZnfCxfRRR9', 1, '3 x iPad 10.2 $3000<br>1 x iPhone 7S $1000<br>', 4000, 'usd', 'succeeded', '2020-05-13 08:50:21', 'so nha 15 ngo 142 Nguyen Ngoc Nai phuong Khuong Mai quan Thanh Xuan Ha Noi'),
('ch_1GiGPMIv4nXquLZndojbBHjs', 5, '1 x Airpods Pro $200<br>', 200, 'usd', 'succeeded', '2020-05-13 08:57:45', 'KDT Royal City'),
('ch_1GiOHjIv4nXquLZnr9k9y93P', 1, '4 x iPod Touch Gen 7 $2000<br>', 2000, 'usd', 'succeeded', '2020-05-13 17:22:24', ''),
('ch_1GiOJpIv4nXquLZnHHnQhVdD', 1, '1 x iPad 10.2 $1000<br>', 1000, 'usd', 'succeeded', '2020-05-13 17:24:34', 'so nha 15 ngo 142 Nguyen Ngoc Nai phuong Khuong Mai quan Thanh Xuan Ha Noi'),
('ch_1GrWzzIv4nXquLZnJpbIb9aI', 1, '4 x Macbook Pro 2019 $10000<br>', 10000, 'usd', 'succeeded', '2020-06-07 22:29:52', 'so nha 15 ngo 142 Nguyen Ngoc Nai phuong Khuong Mai quan Thanh Xuan Ha Noi'),
('ch_1GrX0jIv4nXquLZnJ91dFJbD', 1, '4 x Macbook Pro 2019 $10000<br>', 10000, 'usd', 'succeeded', '2020-06-07 22:30:38', 'so nha 15 ngo 142 Nguyen Ngoc Nai phuong Khuong Mai quan Thanh Xuan Ha Noi'),
('ch_1GrX1FIv4nXquLZnDdqziOvk', 1, '4 x Macbook Pro 2019 $10000<br>', 10000, 'usd', 'succeeded', '2020-06-07 22:31:10', 'so nha 15 ngo 142 Nguyen Ngoc Nai phuong Khuong Mai quan Thanh Xuan Ha Noi'),
('ch_1GrX83Iv4nXquLZnwa1i09Bt', 1, '1 x iMac 2019 $1000<br>', 1000, 'usd', 'succeeded', '2020-06-07 22:38:12', 'so nha 15 ngo 142 Nguyen Ngoc Nai phuong Khuong Mai quan Thanh Xuan Ha Noi'),
('ch_1GrX8vIv4nXquLZnpjRrHTM2', 1, '1 x iMac 2019 $1000<br>', 1000, 'usd', 'succeeded', '2020-06-07 22:39:06', 'so nha 15 ngo 142 Nguyen Ngoc Nai phuong Khuong Mai quan Thanh Xuan Ha Noi'),
('ch_1GrXADIv4nXquLZnsYaWpQNI', 1, '1 x iMac 2019 $1000<br>', 1000, 'usd', 'succeeded', '2020-06-07 22:40:26', 'so nha 15 ngo 142 Nguyen Ngoc Nai phuong Khuong Mai quan Thanh Xuan Ha Noi'),
('ch_1GrkqVIv4nXquLZnuaX5Ivuv', 1, '3 x Airpods 2 $600<br>', 600, 'usd', 'succeeded', '2020-06-08 13:17:00', 'so nha 15 ngo 142 Nguyen Ngoc Nai phuong Khuong Mai quan Thanh Xuan Ha Noi'),
('ch_1Gs7FGIv4nXquLZnawxX2RD3', 1, '3 x Macbook Air 2019 $4500<br>1 x iPhone 11 Pro Max $2000<br>', 6500, 'usd', 'succeeded', '2020-06-09 13:12:02', 'so nha 15 ngo 142 Nguyen Ngoc Nai phuong Khuong Mai quan Thanh Xuan Ha Noi'),
('ch_1Gs7FIIv4nXquLZnP7xv8h0p', 1, '3 x Macbook Air 2019 $4500<br>1 x iPhone 11 Pro Max $2000<br>', 650000, 'usd', 'succeeded', '2020-06-09 13:12:04', 'so nha 15 ngo 142 Nguyen Ngoc Nai phuong Khuong Mai quan Thanh Xuan Ha Noi'),
('ch_1GsKvuIv4nXquLZn470UTN92', 1, '3 x iPhone XS Max $3000<br>', 3000, 'usd', 'succeeded', '2020-06-10 03:48:58', 'so nha 15 ngo 142 Nguyen Ngoc Nai phuong Khuong Mai quan Thanh Xuan Ha Noi'),
('ch_1GsLZ1Iv4nXquLZnYxdnV7Ow', 1, '3 x iPad 10.2 $6000<br>', 6000, 'usd', 'succeeded', '2020-06-10 04:29:23', 'so nha 15 ngo 142 Nguyen Ngoc Nai phuong Khuong Mai quan Thanh Xuan Ha Noi'),
('ch_1GsLjRIv4nXquLZnhI7IT7CK', 8, '1 x iMac 2019 $1000<br>2 x iPhone 11 Pro Max $4000<br>', 5000, 'usd', 'succeeded', '2020-06-10 04:40:08', 'so nha 15 ngo 142 Nguyen Ngoc Nai phuong Khuong Mai quan Thanh Xuan Ha Noi');

-- --------------------------------------------------------

--
-- Table structure for table `tblusers`
--

CREATE TABLE `tblusers` (
  `user_ID` int(11) NOT NULL,
  `user_name` varchar(250) NOT NULL,
  `user_email` varchar(250) NOT NULL,
  `user_password` varchar(250) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblusers`
--

INSERT INTO `tblusers` (`user_ID`, `user_name`, `user_email`, `user_password`) VALUES
(1, 'Chau', 'minhchaumcpro@gmail.com', 'bf35ce3a6581459a3cb2c4e21776bfb81abe71dafbc097cc498598b71bde06d998064bbdd930c53a');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblcategories`
--
ALTER TABLE `tblcategories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `tblcustomers`
--
ALTER TABLE `tblcustomers`
  ADD PRIMARY KEY (`cus_id`);

--
-- Indexes for table `tblproducts`
--
ALTER TABLE `tblproducts`
  ADD PRIMARY KEY (`pro_id`);

--
-- Indexes for table `tblusers`
--
ALTER TABLE `tblusers`
  ADD PRIMARY KEY (`user_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblcategories`
--
ALTER TABLE `tblcategories`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tblcustomers`
--
ALTER TABLE `tblcustomers`
  MODIFY `cus_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tblproducts`
--
ALTER TABLE `tblproducts`
  MODIFY `pro_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `tblusers`
--
ALTER TABLE `tblusers`
  MODIFY `user_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
