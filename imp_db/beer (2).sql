-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 23, 2019 at 09:32 PM
-- Server version: 5.7.23
-- PHP Version: 5.6.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `beer`
--

-- --------------------------------------------------------

--
-- Table structure for table `beer_locations`
--

DROP TABLE IF EXISTS `beer_locations`;
CREATE TABLE IF NOT EXISTS `beer_locations` (
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
(17, '46.10292000', '19.66310000', 'http://www.samopivo.rs', 'Samo pivo', 'Najbolji lokal sa craft pivom u Subotici', 'Beograd', '1547313220_resize.jpg'),
(27, '46.09838900', '19.66251900', 'https://www.facebook.com/pages/category/Local-Business/Liverpool-Pub-286559730301/', 'Liverpool', 'English pub', 'Subotica', '1547461759_resize.jpg'),
(28, '46.10069000', '19.66367000', 'https://www.facebook.com/hausbrandtcaffesubotica/', 'Hausbrandt Caffe', 'Nije loše...', 'Subotica', '1547461767_resize.jpg'),
(29, '46.10272000', '19.66711000', 'https://www.facebook.com/pages/M%C3%BCnchen-Bavarska-Pivnica/511576082225998', 'München Bavarska Pivnica', 'Ne može bolje...', 'Subotica', '1547461775_resize.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `cart_order`
--

DROP TABLE IF EXISTS `cart_order`;
CREATE TABLE IF NOT EXISTS `cart_order` (
  `id_cart_order` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `date_time` datetime NOT NULL,
  `order_text` text,
  `total_price` float DEFAULT NULL,
  `status` enum('Ordered','In Progress','Delivered','') NOT NULL,
  `order_number` varchar(255) NOT NULL,
  PRIMARY KEY (`id_cart_order`),
  KEY `id_user` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=79 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cart_order`
--

INSERT INTO `cart_order` (`id_cart_order`, `id_user`, `date_time`, `order_text`, `total_price`, `status`, `order_number`) VALUES
(77, 16, '2019-01-22 23:10:14', '1. <strong>Kompas</strong> 2 x 120 RSD =<strong>240 RSD </strong><br />\n .<br /><strong>Ukupno:</strong> 240 RSD <br /><strong>Datum porudžbine:</strong> 2019-01-22 23:10:14 <br />', 240, 'Ordered', '2019012268F0'),
(78, 17, '2019-01-22 23:10:58', '1. <strong>Lav</strong> 10 x 50 RSD =<strong>500 RSD </strong><br />\n .<br /><strong>Ukupno:</strong> 500 RSD <br /><strong>Datum porudžbine:</strong> 2019-01-22 23:10:58 <br />', 500, 'Delivered', '20190122DDE2');

-- --------------------------------------------------------

--
-- Table structure for table `cart_order_item`
--

DROP TABLE IF EXISTS `cart_order_item`;
CREATE TABLE IF NOT EXISTS `cart_order_item` (
  `id_car_order_item` int(11) NOT NULL AUTO_INCREMENT,
  `id_cart_order` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `amount` smallint(6) NOT NULL,
  PRIMARY KEY (`id_car_order_item`),
  KEY `id_cart_order` (`id_cart_order`),
  KEY `id_product` (`id_product`)
) ENGINE=InnoDB AUTO_INCREMENT=71 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cart_order_item`
--

INSERT INTO `cart_order_item` (`id_car_order_item`, `id_cart_order`, `id_product`, `amount`) VALUES
(69, 77, 15, 2),
(70, 78, 9, 10);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `id_category` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id_category`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

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

DROP TABLE IF EXISTS `favorite_locations`;
CREATE TABLE IF NOT EXISTS `favorite_locations` (
  `id_favorite` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_location` int(11) NOT NULL,
  PRIMARY KEY (`id_favorite`),
  KEY `FK_id_user` (`id_user`),
  KEY `FK_id_location` (`id_location`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

DROP TABLE IF EXISTS `groups`;
CREATE TABLE IF NOT EXISTS `groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `permissions` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

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

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `id_product` int(11) NOT NULL AUTO_INCREMENT,
  `id_category` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `price` float NOT NULL,
  PRIMARY KEY (`id_product`),
  KEY `id_category` (`id_category`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

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

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(64) NOT NULL,
  `email` varchar(150) NOT NULL,
  `salt` varchar(32) NOT NULL,
  `joined` datetime NOT NULL,
  `photo` varchar(255) NOT NULL DEFAULT 'user.png',
  `group` int(11) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `firstname`, `lastname`, `username`, `password`, `email`, `salt`, `joined`, `photo`, `group`) VALUES
(16, 'Daniel', 'Singler', 'Daniel', '56fa00fce0a0f25646597b3b67618fb7bc81cb4dd60001a2b5e8288acb9b04a4', 'iamsingler@gmail.com', '4b54f3845a8ffdc285703ac69748835d', '2019-01-22 13:14:56', '33640196.jpg', 2),
(17, 'Mladen', 'Camprag', 'mladen', '56fa00fce0a0f25646597b3b67618fb7bc81cb4dd60001a2b5e8288acb9b04a4', 'mladen@gmail.com', '4b54f3845a8ffdc285703ac69748835d', '2019-01-22 14:41:41', 'user.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users_data`
--

DROP TABLE IF EXISTS `users_data`;
CREATE TABLE IF NOT EXISTS `users_data` (
  `id_user_data` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `address` varchar(255) NOT NULL DEFAULT '',
  `photo` varchar(255) NOT NULL DEFAULT '',
  `cover` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id_user_data`),
  KEY `id_user` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users_sessions`
--

DROP TABLE IF EXISTS `users_sessions`;
CREATE TABLE IF NOT EXISTS `users_sessions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `hash` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart_order`
--
ALTER TABLE `cart_order`
  ADD CONSTRAINT `FK_id_user_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cart_order_item`
--
ALTER TABLE `cart_order_item`
  ADD CONSTRAINT `FK_id_product` FOREIGN KEY (`id_product`) REFERENCES `product` (`id_product`) ON DELETE CASCADE ON UPDATE CASCADE,
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
