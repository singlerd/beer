-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 22, 2019 at 12:29 PM
-- Server version: 10.2.17-MariaDB
-- PHP Version: 7.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id8527650_beer`
--
CREATE DATABASE IF NOT EXISTS `id8527650_beer` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `id8527650_beer`;

-- --------------------------------------------------------

--
-- Table structure for table `beer_locations`
--

CREATE TABLE `beer_locations` (
  `id` int(11) NOT NULL,
  `lat` decimal(10,8) NOT NULL,
  `lng` decimal(10,8) NOT NULL,
  `website_link` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pub_name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `city_address` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `pub_image` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `beer_locations`
--

INSERT INTO `beer_locations` (`id`, `lat`, `lng`, `website_link`, `pub_name`, `description`, `city_address`, `pub_image`) VALUES
(17, 46.10292000, 19.66310000, 'http://www.samopivo.rs', 'Samo pivo', 'Najbolji lokal sa craft pivom u Subotici', 'Beograd', '1547313220_resize.jpg'),
(27, 46.09838900, 19.66251900, 'https://www.facebook.com/pages/category/Local-Business/Liverpool-Pub-286559730301/', 'Liverpool', 'English pub', 'Subotica', '1547461759_resize.jpg'),
(28, 46.10069000, 19.66367000, 'https://www.facebook.com/hausbrandtcaffesubotica/', 'Hausbrandt Caffe', 'Nije loše...', 'Subotica', '1547461767_resize.jpg'),
(29, 46.10272000, 19.66711000, 'https://www.facebook.com/pages/M%C3%BCnchen-Bavarska-Pivnica/511576082225998', 'München Bavarska Pivnica', 'Ne može bolje...', 'Subotica', '1547461775_resize.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `cart_order`
--

CREATE TABLE `cart_order` (
  `id_cart_order` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `date_time` datetime NOT NULL,
  `order_text` text DEFAULT NULL,
  `total_price` float DEFAULT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cart_order`
--

INSERT INTO `cart_order` (`id_cart_order`, `id_user`, `date_time`, `order_text`, `total_price`, `status`) VALUES
(27, 1, '2019-01-04 19:57:27', '1. <strong>Bunt99</strong> 3 pieces x 180 eur =<strong>540 eur </strong><br />\n .<br />2. <strong>Bunt99 </strong> 1 pieces x 140 eur =<strong>140 eur </strong><br />\n .<br />3. <strong>Laško</strong> 2 pieces x 80 eur =<strong>160 eur </strong><br />\n .<br /><br />\nTotal price: 840 eur<br />\n<br />\nDate of order: 2019-01-04 19:57:27<br />\n', 840, 'ordered'),
(28, 1, '2019-01-04 19:57:28', '1. <strong>Bunt99</strong> 3 pieces x 180 eur =<strong>540 eur </strong><br />\n .<br />2. <strong>Bunt99 </strong> 1 pieces x 140 eur =<strong>140 eur </strong><br />\n .<br />3. <strong>Laško</strong> 2 pieces x 80 eur =<strong>160 eur </strong><br />\n .<br /><br />\nTotal price: 840 eur<br />\n<br />\nDate of order: 2019-01-04 19:57:28<br />\n', 840, 'ordered'),
(29, 1, '2019-01-04 20:00:04', '1. <strong>Bunt99</strong> 3 pieces x 180 eur =<strong>540 eur </strong><br />\n .<br />2. <strong>Bunt99 </strong> 1 pieces x 140 eur =<strong>140 eur </strong><br />\n .<br />3. <strong>Laško</strong> 2 pieces x 80 eur =<strong>160 eur </strong><br />\n .<br /><br />\nTotal price: 840 eur<br />\n<br />\nDate of order: 2019-01-04 20:00:04<br />\n', 840, 'ordered'),
(30, 1, '2019-01-04 20:00:49', '1. <strong>Bunt99</strong> 1 pieces x 180 eur =<strong>180 eur </strong><br />\n .<br /><br />\nTotal price: 180 eur<br />\n<br />\nDate of order: 2019-01-04 20:00:49<br />\n', 180, 'ordered'),
(31, 1, '2019-01-04 20:15:11', '1. <strong>Bunt99</strong> 1 pieces x 180 eur =<strong>180 eur </strong><br />\n .<br /><br />\nTotal price: 180 eur<br />\n<br />\nDate of order: 2019-01-04 20:15:11<br />\n', 180, 'ordered'),
(32, 1, '2019-01-04 20:16:22', '1. <strong>Bunt99</strong> 1 pieces x 180 eur =<strong>180 eur </strong><br />\n .<br /><br />\nTotal price: 180 eur<br />\n<br />\nDate of order: 2019-01-04 20:16:22<br />\n', 180, 'ordered'),
(33, 1, '2019-01-04 20:16:59', '1. <strong>Laško</strong> 2 pieces x 80 eur =<strong>160 eur </strong><br />\n .<br /><br />\nTotal price: 160 eur<br />\n<br />\nDate of order: 2019-01-04 20:16:59<br />\n', 160, 'ordered'),
(34, 1, '2019-01-04 20:30:32', '1. <strong>Bunt99</strong> 1 pieces x 180 eur =<strong>180 eur </strong><br />\n .<br /><br />\nTotal price: 180 eur<br />\n<br />\nDate of order: 2019-01-04 20:30:32<br />\n', 180, 'ordered'),
(35, 1, '2019-01-04 20:31:53', '1. <strong>Bunt99</strong> 2 pieces x 160 eur =<strong>320 eur </strong><br />\n .<br /><br />\nTotal price: 320 eur<br />\n<br />\nDate of order: 2019-01-04 20:31:53<br />\n', 320, 'ordered'),
(36, 1, '2019-01-05 16:26:58', '1. <strong>Bunt99</strong> 1 pieces x 180 eur =<strong>180 eur </strong><br />\n .<br /><br />\nTotal price: 180 eur<br />\n<br />\nDate of order: 2019-01-05 16:26:58<br />\n', 180, 'ordered'),
(37, 1, '2019-01-05 16:27:33', '1. <strong>Bunt99</strong> 1 pieces x 180 eur =<strong>180 eur </strong><br />\n .<br /><br />\nTotal price: 180 eur<br />\n<br />\nDate of order: 2019-01-05 16:27:33<br />\n', 180, 'ordered'),
(38, 9, '2019-01-05 17:04:08', '1. <strong>Bunt99</strong> 1 pieces x 180 eur =<strong>180 eur </strong><br />\n .<br /><br />\nTotal price: 180 eur<br />\n<br />\nDate of order: 2019-01-05 17:04:08<br />\n', 180, 'ordered'),
(39, 9, '2019-01-05 17:05:58', '1. <strong>Bunt99</strong> 1 pieces x 180 eur =<strong>180 eur </strong><br />\n .<br /><br />\nTotal price: 180 eur<br />\n<br />\nDate of order: 2019-01-05 17:05:58<br />\n', 180, 'ordered'),
(40, 9, '2019-01-05 17:06:33', '1. <strong>Bunt99</strong> 1 pieces x 180 eur =<strong>180 eur </strong><br />\n .<br /><br />\nTotal price: 180 eur<br />\n<br />\nDate of order: 2019-01-05 17:06:33<br />\n', 180, 'ordered'),
(41, 9, '2019-01-05 17:08:16', '1. <strong>Bunt99</strong> 1 pieces x 180 eur =<strong>180 eur </strong><br />\n .<br /><br />\nTotal price: 180 eur<br />\n<br />\nDate of order: 2019-01-05 17:08:16<br />\n', 180, 'ordered'),
(42, 9, '2019-01-05 17:08:32', '1. <strong>Bunt99</strong> 1 pieces x 180 eur =<strong>180 eur </strong><br />\n .<br /><br />\nTotal price: 180 eur<br />\n<br />\nDate of order: 2019-01-05 17:08:32<br />\n', 180, 'ordered'),
(43, 9, '2019-01-05 17:13:47', '1. <strong>Laško</strong> 1 pieces x 80 eur =<strong>80 eur </strong><br />\n .<br /><br />\nTotal price: 80 eur<br />\n<br />\nDate of order: 2019-01-05 17:13:47<br />\n', 80, 'ordered'),
(44, 9, '2019-01-06 16:23:48', '1. <strong>Bunt99</strong> 1 pieces x 180 eur =<strong>180 eur </strong><br />\n .<br /><br />\nTotal price: 180 eur<br />\n<br />\nDate of order: 2019-01-06 16:23:48<br />\n', 180, 'ordered'),
(45, 9, '2019-01-06 18:35:53', '1. <strong>Heineken</strong> 1 pieces x 100 RSD =<strong>100 RSD </strong><br />\n .<br /><br />\n <strong>Ukupno: 100 RSD</strong><br />\n<br />\nDatum kupovine: 2019-01-06 18:35:53<br />\n', 100, 'ordered'),
(46, 9, '2019-01-06 18:37:08', '1. <strong>Budwaiser</strong> 2  x 100 RSD =<strong>200 RSD </strong><br />\n .<br /><br />\n <strong>Ukupno: 200 RSD</strong><br />\n<br />\nDatum kupovine: 2019-01-06 18:37:08<br />\n', 200, 'ordered'),
(47, 9, '2019-01-06 18:39:12', NULL, NULL, 'ordered'),
(48, 9, '2019-01-06 18:39:59', NULL, NULL, 'ordered'),
(49, 9, '2019-01-06 18:40:09', NULL, NULL, 'ordered'),
(50, 9, '2019-01-06 18:40:47', NULL, NULL, 'ordered'),
(51, 9, '2019-01-06 18:41:06', '1. <strong>Heineken</strong> 3  x 100 RSD =<strong>300 RSD </strong><br />\n .<br /><br />\n <strong>Ukupno: 300 RSD</strong><br />\n<br />\n<br />\n Datum kupovine: 2019-01-06 18:41:06<br />\n', 300, 'ordered'),
(52, 9, '2019-01-08 14:24:03', '1. <strong>Budwaiser</strong> 1  x 100 RSD =<strong>100 RSD </strong><br />\n .<br /><br />\n <strong>Ukupno: 100 RSD</strong><br />\n<br />\n<br />\n Datum kupovine: 2019-01-08 14:24:03<br />\n', 100, 'ordered'),
(53, 9, '2019-01-10 07:12:19', '1. <strong>Budwaiser</strong> 1  x 100 RSD =<strong>100 RSD </strong><br />\n .<br /><br />\n <strong>Ukupno: 100 RSD</strong><br />\n<br />\n<br />\n Datum kupovine: 2019-01-10 07:12:19<br />\n', 100, 'ordered'),
(54, 9, '2019-01-10 07:56:09', '1. <strong>Zaječarsko</strong> 2  x 90 RSD =<strong>180 RSD </strong><br />\n .<br />2. <strong>Tuborg</strong> 2  x 110 RSD =<strong>220 RSD </strong><br />\n .<br />3. <strong>Bunt99</strong> 1  x 150 RSD =<strong>150 RSD </strong><br />\n .<br /><br />\n <strong>Ukupno: 550 RSD</strong><br />\n<br />\n<br />\n Datum kupovine: 2019-01-10 07:56:09<br />\n', 550, 'ordered'),
(55, 9, '2019-01-20 19:54:29', '1. <strong>Kabinet</strong> 4 pieces x 150 eur =<strong>600 eur </strong><br />\n .<br /><br />\nTotal price: 600 eur<br />\n<br />\nDate of order: 2019-01-20 19:54:29<br />\n', 600, 'ordered'),
(56, 9, '2019-01-20 20:23:03', '1. <strong>Kabinet</strong> 2 pieces x 150 eur =<strong>300 eur </strong><br />\n .<br /><br />\nTotal price: 300 eur<br />\n<br />\nDate of order: 2019-01-20 20:23:03<br />\n', 300, 'ordered'),
(57, 9, '2019-01-20 20:28:13', '1. <strong>Lav</strong> 1 x 50 RSD =<strong>50 RSD </strong><br />\n .<br /><br />\nTotal price: 50 eur<br />\n<br />\nDate of order: 2019-01-20 20:28:13<br />\n', 50, 'ordered'),
(58, 9, '2019-01-20 20:29:29', '1. <strong>NikolaCar</strong> 2 x 120 RSD =<strong>240 RSD </strong><br />\n .<br /><br />\n Ukupno: 240 RSD<br />\n<br />\nDatum porudžbine: 2019-01-20 20:29:29<br />\n', 240, 'ordered'),
(59, 9, '2019-01-20 20:30:10', '1. <strong>Kabinet</strong> 1 x 150 RSD =<strong>150 RSD </strong><br />\n .<br /><br />\n Ukupno: 150 RSD<br />\n<br />\n<br />\nDatum porudžbine: 2019-01-20 20:30:10<br />\n', 150, 'ordered'),
(60, 9, '2019-01-20 20:31:36', '1. <strong>Kabinet</strong> 2 x 150 RSD =<strong>300 RSD </strong><br />\n .<br />Ukupno: 300 RSD <br />Datum porudžbine: 2019-01-20 20:31:36 <br />', 300, 'ordered'),
(61, 9, '2019-01-20 20:32:51', '1. <strong>Kabinet</strong> 3 x 150 RSD =<strong>450 RSD </strong><br />\n .<br /><strong>Ukupno:</strong> 450 RSD <br /><strong>Datum porudžbine:</strong> 2019-01-20 20:32:51 <br />', 450, 'ordered'),
(62, 9, '2019-01-20 20:34:04', '1. <strong>Kabinet</strong> 5 x 150 RSD =<strong>750 RSD </strong><br />\n .<br />2. <strong>Lav</strong> 50 x 50 RSD =<strong>2500 RSD </strong><br />\n .<br />3. <strong>Kas</strong> 5 x 140 RSD =<strong>700 RSD </strong><br />\n .<br /><strong>Ukupno:</strong> 3950 RSD <br /><strong>Datum porudžbine:</strong> 2019-01-20 20:34:04 <br />', 3950, 'ordered'),
(63, 9, '2019-01-20 20:34:50', NULL, NULL, 'ordered'),
(64, 9, '2019-01-20 20:35:05', '1. <strong>Kabinet</strong> 2 x 150 RSD =<strong>300 RSD </strong><br />\n .<br /><strong>Ukupno:</strong> 300 RSD <br /><strong>Datum porudžbine:</strong> 2019-01-20 20:35:05 <br />', 300, 'ordered'),
(65, 9, '2019-01-20 20:55:05', '1. <strong>Kabinet</strong> 1 x 150 RSD =<strong>150 RSD </strong><br />\n .<br /><strong>Ukupno:</strong> 150 RSD <br /><strong>Datum porudžbine:</strong> 2019-01-20 20:55:05 <br />', 150, 'ordered'),
(66, 9, '2019-01-20 21:01:51', '1. <strong>Kas</strong> 1 x 140 RSD =<strong>140 RSD </strong><br />\n .<br /><strong>Ukupno:</strong> 140 RSD <br /><strong>Datum porudžbine:</strong> 2019-01-20 21:01:51 <br />', 140, 'ordered'),
(67, 9, '2019-01-20 21:02:15', '1. <strong>Kabinet</strong> 1 x 150 RSD =<strong>150 RSD </strong><br />\n .<br /><strong>Ukupno:</strong> 150 RSD <br /><strong>Datum porudžbine:</strong> 2019-01-20 21:02:15 <br />', 150, 'ordered'),
(68, 9, '2019-01-20 23:09:46', '1. <strong>Kompas</strong> 1 x 120 RSD =<strong>120 RSD </strong><br />\n .<br /><strong>Ukupno:</strong> 120 RSD <br /><strong>Datum porudžbine:</strong> 2019-01-20 23:09:46 <br />', 120, 'ordered'),
(69, 9, '2019-01-21 13:44:06', '1. <strong>Kabinet</strong> 1 x 150 RSD =<strong>150 RSD </strong><br />\n .<br /><strong>Ukupno:</strong> 150 RSD <br /><strong>Datum porudžbine:</strong> 2019-01-21 13:44:06 <br />', 150, 'ordered'),
(70, 9, '2019-01-21 15:37:18', '1. <strong>Kabinet</strong> 25 x 150 RSD =<strong>3750 RSD </strong><br />\n .<br /><strong>Ukupno:</strong> 3750 RSD <br /><strong>Datum porudžbine:</strong> 2019-01-21 15:37:18 <br />', 3750, 'ordered');

-- --------------------------------------------------------

--
-- Table structure for table `cart_order_item`
--

CREATE TABLE `cart_order_item` (
  `id_car_order_item` int(11) NOT NULL,
  `id_cart_order` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `amount` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cart_order_item`
--

INSERT INTO `cart_order_item` (`id_car_order_item`, `id_cart_order`, `id_product`, `amount`) VALUES
(7, 27, 4, 3),
(8, 27, 6, 1),
(9, 27, 2, 2),
(10, 28, 4, 3),
(11, 28, 6, 1),
(12, 28, 2, 2),
(13, 29, 4, 3),
(14, 29, 6, 1),
(15, 29, 2, 2),
(16, 30, 4, 1),
(17, 31, 4, 1),
(18, 32, 4, 1),
(19, 33, 2, 2),
(20, 34, 4, 1),
(21, 35, 7, 2),
(22, 36, 4, 1),
(23, 37, 4, 1),
(24, 38, 4, 1),
(25, 39, 4, 1),
(26, 40, 4, 1),
(27, 41, 4, 1),
(28, 42, 4, 1),
(29, 43, 2, 1),
(30, 44, 4, 1),
(31, 45, 12, 1),
(32, 46, 10, 2),
(33, 47, 12, 1),
(34, 48, 12, 1),
(35, 49, 12, 2),
(36, 50, 12, 2),
(37, 51, 12, 3),
(38, 52, 10, 1),
(39, 53, 10, 1),
(40, 54, 11, 2),
(41, 54, 13, 2),
(42, 54, 18, 1),
(43, 55, 17, 4),
(44, 56, 17, 2),
(45, 57, 9, 1),
(46, 58, 14, 2),
(47, 59, 17, 1),
(48, 60, 17, 2),
(49, 61, 17, 3),
(50, 62, 17, 5),
(51, 62, 9, 50),
(52, 62, 16, 5),
(53, 63, 17, 2),
(54, 64, 17, 2),
(55, 65, 17, 1),
(56, 66, 16, 1),
(57, 67, 17, 1),
(58, 68, 15, 1),
(59, 69, 17, 1),
(60, 70, 17, 25);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id_category` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id_category`, `name`) VALUES
(1, 'Lager Piva'),
(2, 'Kraft Piva');

-- --------------------------------------------------------

--
-- Table structure for table `favorite_locations`
--

CREATE TABLE `favorite_locations` (
  `id_favorite` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_location` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `permissions` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `permissions`) VALUES
(1, 'Standard user', ''),
(2, 'Administrator', '{\r\n\"admin\": 1,\r\n\"moderator\":1\r\n}');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id_product` int(11) NOT NULL,
  `id_category` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id_product`, `id_category`, `name`, `description`, `image`, `price`) VALUES
(9, 1, 'Lav', 'lav', '1546798923_resize.jpg', 50),
(10, 1, 'Budwaiser', 'Bud', '1546798955_resize.png', 100),
(11, 1, 'Zaječarsko', 'zaječarac', '1546798982_resize.jpg', 90),
(12, 1, 'Heineken', 'heinken', '1546799010_resize.jpg', 100),
(13, 1, 'Tuborg', 'stay green', '1546799032_resize.png', 110),
(14, 2, 'NikolaCar', 'kraft pivo', '1547104890_resize.jpg', 120),
(15, 2, 'Kompas', 'kraft pivo', '1547104917_resize.jpg', 120),
(16, 2, 'Kas', 'kraft pivo', '1547104941_resize.jpg', 140),
(17, 2, 'Kabinet', 'kraft pivo', '1547104964_resize.jpg', 150),
(18, 2, 'Bunt99', 'kraft pivo', '1547104992_resize.jpg', 150);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `firstname` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(64) NOT NULL,
  `email` varchar(150) NOT NULL,
  `salt` varchar(32) NOT NULL,
  `joined` datetime NOT NULL,
  `group` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users_data`
--

CREATE TABLE `users_data` (
  `id_user_data` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `address` varchar(255) NOT NULL DEFAULT '',
  `photo` varchar(255) NOT NULL DEFAULT '',
  `cover` varchar(255) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users_sessions`
--

CREATE TABLE `users_sessions` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `hash` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `beer_locations`
--
ALTER TABLE `beer_locations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart_order`
--
ALTER TABLE `cart_order`
  ADD PRIMARY KEY (`id_cart_order`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `cart_order_item`
--
ALTER TABLE `cart_order_item`
  ADD PRIMARY KEY (`id_car_order_item`),
  ADD KEY `id_cart_order` (`id_cart_order`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id_category`);

--
-- Indexes for table `favorite_locations`
--
ALTER TABLE `favorite_locations`
  ADD PRIMARY KEY (`id_favorite`),
  ADD KEY `FK_id_user` (`id_user`),
  ADD KEY `FK_id_location` (`id_location`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id_product`),
  ADD KEY `id_category` (`id_category`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `users_data`
--
ALTER TABLE `users_data`
  ADD PRIMARY KEY (`id_user_data`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `users_sessions`
--
ALTER TABLE `users_sessions`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `beer_locations`
--
ALTER TABLE `beer_locations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `cart_order`
--
ALTER TABLE `cart_order`
  MODIFY `id_cart_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `cart_order_item`
--
ALTER TABLE `cart_order_item`
  MODIFY `id_car_order_item` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id_category` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id_product` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users_data`
--
ALTER TABLE `users_data`
  MODIFY `id_user_data` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users_sessions`
--
ALTER TABLE `users_sessions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart_order_item`
--
ALTER TABLE `cart_order_item`
  ADD CONSTRAINT `cart_order_item_ibfk_1` FOREIGN KEY (`id_cart_order`) REFERENCES `cart_order` (`id_cart_order`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `fk-id_category` FOREIGN KEY (`id_category`) REFERENCES `category` (`id_category`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users_data`
--
ALTER TABLE `users_data`
  ADD CONSTRAINT `fk_id_user` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
