-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 09, 2019 at 04:57 PM
-- Server version: 5.7.24
-- PHP Version: 7.0.33

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
(17, '46.10292000', '19.66310000', 'http://www.samopivo.rs', 'Samo pivo22', 'Najbolji lokal sa craft pivom u Subotici', 'Beograd', '1547313220_resize.jpg'),
(27, '46.09838900', '19.66251900', 'https://www.facebook.com/pages/category/Local-Business/Liverpool-Pub-286559730301/', 'Liverpool', 'English pub', 'Subotica', '1547461759_resize.jpg'),
(28, '46.10069000', '19.66367000', 'https://www.facebook.com/hausbrandtcaffesubotica/', 'Hausbrandt Caffe', 'Nije loše...', 'Subotica', '1547461767_resize.jpg'),
(29, '46.10272000', '19.66711000', 'https://www.facebook.com/pages/M%C3%BCnchen-Bavarska-Pivnica/511576082225998', 'München Bavarska Pivnica', 'Ne može bolje...', 'Subotica', '1547461775_resize.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

DROP TABLE IF EXISTS `blog`;
CREATE TABLE IF NOT EXISTS `blog` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `content` longtext NOT NULL,
  `date` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB AUTO_INCREMENT=92 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cart_order`
--

INSERT INTO `cart_order` (`id_cart_order`, `id_user`, `date_time`, `order_text`, `total_price`, `status`, `order_number`) VALUES
(77, 16, '2019-01-22 23:10:14', '1. <strong>Kompas</strong> 2 x 120 RSD =<strong>240 RSD </strong><br />\n .<br /><strong>Ukupno:</strong> 240 RSD <br /><strong>Datum porudžbine:</strong> 2019-01-22 23:10:14 <br />', 240, 'Delivered', '2019012268F0'),
(78, 17, '2019-01-22 23:10:58', '1. <strong>Lav</strong> 10 x 50 RSD =<strong>500 RSD </strong><br />\n .<br /><strong>Ukupno:</strong> 500 RSD <br /><strong>Datum porudžbine:</strong> 2019-01-22 23:10:58 <br />', 500, 'Delivered', '20190122DDE2'),
(79, 16, '2019-03-05 21:39:23', '1. <strong>Budwaiser</strong> 1 x 100 RSD =<strong>100 RSD </strong><br />\n .<br /><strong>Ukupno:</strong> 100 RSD <br /><strong>Datum porudžbine:</strong> 2019-03-05 21:39:23 <br />', 100, 'Delivered', '201903058C26'),
(80, 16, '2019-03-05 21:42:34', '1. <strong>Bunt99</strong> 3 x 150 RSD =<strong>450 RSD </strong><br />\n .<br /><strong>Ukupno:</strong> 450 RSD <br /><strong>Datum porudžbine:</strong> 2019-03-05 21:42:34 <br />', 450, 'Delivered', '20190305DF60'),
(81, 16, '2019-03-09 09:08:24', '1. <strong>Kabinet</strong> 2 x 150 RSD =<strong>300 RSD </strong><br />\n .<br /><strong>Ukupno:</strong> 300 RSD <br /><strong>Datum porudžbine:</strong> 2019-03-09 09:08:24 <br />', 300, 'Ordered', '20190309F37D'),
(82, 16, '2019-03-09 09:08:50', '1. <strong>Kas</strong> 2 x 140 RSD =<strong>280 RSD </strong><br />\n .<br /><strong>Ukupno:</strong> 280 RSD <br /><strong>Datum porudžbine:</strong> 2019-03-09 09:08:50 <br />', 280, 'Ordered', '201903094F28'),
(83, 16, '2019-03-09 10:30:33', '1. <strong>Kabinet</strong> 3 x 150 RSD =<strong>450 RSD </strong><br />\n .<br /><strong>Ukupno:</strong> 450 RSD <br /><strong>Datum porudžbine:</strong> 2019-03-09 10:30:33 <br />', 450, 'Delivered', '20190309671F'),
(84, 16, '2019-03-10 11:45:37', '1. <strong>Kas</strong> 3 x 140 RSD =<strong>420 RSD </strong><br />\n .<br /><strong>Ukupno:</strong> 420 RSD <br /><strong>Datum porudžbine:</strong> 2019-03-10 11:45:37 <br />', 420, 'Ordered', '201903109273'),
(85, 16, '2019-03-10 11:46:04', '1. <strong>Kabinet</strong> 2 x 150 RSD =<strong>300 RSD </strong><br />\n .<br /><strong>Ukupno:</strong> 300 RSD <br /><strong>Datum porudžbine:</strong> 2019-03-10 11:46:04 <br />', 300, 'Ordered', '201903109E5F'),
(86, 16, '2019-03-10 11:46:25', '1. <strong>Kabinet</strong> 3 x 150 RSD =<strong>450 RSD </strong><br />\n .<br /><strong>Ukupno:</strong> 450 RSD <br /><strong>Datum porudžbine:</strong> 2019-03-10 11:46:25 <br />', 450, 'Delivered', '201903108F35'),
(87, 19, '2019-09-02 09:37:05', '1. <strong>Kas</strong> 1 x 140 RSD =<strong>140 RSD </strong><br />\n .<br /><strong>Ukupno:</strong> 140 RSD <br /><strong>Datum porudžbine:</strong> 2019-09-02 09:37:05 <br />', 140, 'Delivered', '20190902666E'),
(88, 19, '2019-09-03 15:45:46', '1. <strong>test</strong> 1 x 23 RSD =<strong>23 RSD </strong><br />\n .<br /><strong>Ukupno:</strong> 23 RSD <br /><strong>Datum porudžbine:</strong> 2019-09-03 15:45:46 <br />', 23, 'Ordered', '201909036895'),
(89, 19, '2019-09-09 08:54:26', '1. <strong>asdasdad</strong> 1 x 23 RSD =<strong>23 RSD </strong><br />\n .<br /><strong>Ukupno:</strong> 23 RSD <br /><strong>Datum porudžbine:</strong> 2019-09-09 08:54:26 <br />', 23, 'Ordered', '2019090999C1'),
(90, 19, '2019-09-09 09:19:02', '1. <strong>Test</strong> 2 x 2032 RSD =<strong>4064 RSD </strong><br />\n .<br /><strong>Ukupno:</strong> 4064 RSD <br /><strong>Datum porudžbine:</strong> 2019-09-09 09:19:02 <br />', 4064, 'Ordered', '201909095D60'),
(91, 19, '2019-09-09 16:37:30', '1. <strong>asdasdad</strong> 1 x 23 RSD =<strong>23 RSD </strong><br />\n .<br /><strong>Ukupno:</strong> 23 RSD <br /><strong>Datum porudžbine:</strong> 2019-09-09 16:37:30 <br />', 23, 'Ordered', '20190909FE82');

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
) ENGINE=InnoDB AUTO_INCREMENT=84 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cart_order_item`
--

INSERT INTO `cart_order_item` (`id_car_order_item`, `id_cart_order`, `id_product`, `amount`) VALUES
(69, 77, 15, 2),
(71, 79, 10, 1),
(72, 80, 18, 3),
(73, 81, 17, 2),
(74, 82, 16, 2),
(75, 83, 17, 3),
(76, 84, 16, 3),
(77, 85, 17, 2),
(78, 86, 17, 3),
(79, 87, 16, 1),
(80, 88, 21, 1),
(81, 89, 19, 1),
(82, 90, 20, 2),
(83, 91, 19, 1);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `id_category` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  PRIMARY KEY (`id_category`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id_category`, `name`, `image`) VALUES
(1, 'Indian Pale Ape', ''),
(2, 'American Pale Ale', ''),
(3, 'Saison', ''),
(4, 'Imperial', '');

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
  `origin` int(255) DEFAULT NULL,
  `brewed` varchar(255) DEFAULT NULL,
  `ABV` int(11) DEFAULT NULL,
  `IBU` int(11) DEFAULT NULL,
  `cal` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_product`),
  KEY `id_category` (`id_category`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id_product`, `id_category`, `name`, `description`, `image`, `price`, `origin`, `brewed`, `ABV`, `IBU`, `cal`) VALUES
(10, 1, 'Budwaiser', 'Bud', '1546798955_resize.png', 100, NULL, '', NULL, NULL, 0),
(11, 1, 'Zaječarsko', 'zaječarac', '1546798982_resize.jpg', 90, NULL, '', NULL, NULL, 0),
(12, 1, 'Heineken', 'heinken', '1546799010_resize.jpg', 100, NULL, '', NULL, NULL, 0),
(13, 1, 'Tuborg', 'stay green', '1546799032_resize.png', 110, NULL, '', NULL, NULL, 0),
(14, 2, 'NikolaCar', 'kraft pivo', '1547104890_resize.jpg', 120, NULL, '', NULL, NULL, 0),
(15, 2, 'Kompas', 'kraft pivo', '1547104917_resize.jpg', 120, NULL, '', NULL, NULL, 0),
(16, 2, 'Kas', 'kraft pivo', '1547104941_resize.jpg', 140, NULL, '', NULL, NULL, 0),
(17, 2, 'Kabinet', 'kraft pivo', '1547104964_resize.jpg', 150, NULL, '', NULL, NULL, 0),
(18, 2, 'Bunt99', 'kraft pivo', '1547104992_resize.jpg', 150, NULL, '', NULL, NULL, 0),
(19, 2, 'asdasdad', 'description', '1567431124_resize.png', 23, NULL, '', NULL, NULL, 0),
(20, 4, 'Test', 'Test', '1567524374_resize.png', 2032, NULL, '', NULL, NULL, 0),
(21, 3, 'test', 'test', '1567524409_resize.jpg', 23, NULL, '', NULL, NULL, 0),
(22, 4, 'asdasd', 'asasdasdasd', '1567526217_resize.png', 213, NULL, NULL, NULL, NULL, NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `firstname`, `lastname`, `username`, `password`, `email`, `salt`, `joined`, `photo`, `group`) VALUES
(16, 'Petar', 'Petrovic222', 'Petar', '56fa00fce0a0f25646597b3b67618fb7bc81cb4dd60001a2b5e8288acb9b04a4', 'petarsamja@gmail.com', '4b54f3845a8ffdc285703ac69748835d', '2019-01-22 13:14:56', 'wallhaven-743688.jpg', 2),
(17, 'Mladen', 'Camprag', 'mladen', '56fa00fce0a0f25646597b3b67618fb7bc81cb4dd60001a2b5e8288acb9b04a4', 'mladen@gmail.com', '4b54f3845a8ffdc285703ac69748835d', '2019-01-22 14:41:41', 'user.png', 1),
(19, 'Daniel', 'Singler', 'Sikta', '56fa00fce0a0f25646597b3b67618fb7bc81cb4dd60001a2b5e8288acb9b04a4', 'iamsingler@gmail.com', '4b54f3845a8ffdc285703ac69748835d', '2019-09-02 09:33:14', 'avatar.png', 2);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
