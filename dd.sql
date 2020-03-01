-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 23, 2019 at 01:35 PM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dd`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(20) NOT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`) VALUES
(1, 'Starters'),
(2, 'Main Course'),
(3, 'Drinks'),
(4, 'Dessert');

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE IF NOT EXISTS `client` (
  `client_id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `client_name` varchar(30) NOT NULL,
  `address` longtext,
  `city` varchar(20) DEFAULT NULL,
  `state` varchar(20) DEFAULT NULL,
  `pin` varchar(6) DEFAULT NULL,
  `contact` bigint(20) NOT NULL,
  PRIMARY KEY (`client_id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`client_id`, `email`, `password`, `client_name`, `address`, `city`, `state`, `pin`, `contact`) VALUES
(5, 'dhanusha@gmail.com', '123', 'Dhanusha', '104, Falon Heights', 'Mumbai', 'Maharashtra', '857878', 9876543210),
(8, 'utcvqukjnp@iuwejd.wegyh', '123', 'yebhjas', NULL, NULL, NULL, NULL, 5555555555),
(9, 'ygeh@fjj.iwhd', '654', 'ousej', NULL, NULL, NULL, NULL, 6549873210),
(10, 'baby@gmail.com', '789', 'Divya Bhatnagar', NULL, NULL, NULL, NULL, 8291468607),
(11, 'deepakrishnan84@gmail.com', '1234', 'deepa', NULL, NULL, NULL, NULL, 9773423043);

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

DROP TABLE IF EXISTS `order_details`;
CREATE TABLE IF NOT EXISTS `order_details` (
  `order_id` varchar(10) NOT NULL,
  `client_id` int(11) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `payment_mode` varchar(20) DEFAULT NULL,
  `payment_status` varchar(20) DEFAULT NULL,
  `date_time` datetime DEFAULT CURRENT_TIMESTAMP,
  `shipping_address` varchar(20) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `state` varchar(20) DEFAULT NULL,
  `pin` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`order_id`, `client_id`, `total`, `payment_mode`, `payment_status`, `date_time`, `shipping_address`, `city`, `state`, `pin`) VALUES
('ORDS1375', 5, 550, 'NB', 'TXN_SUCCESS', '2019-10-15 12:18:28', '104, Falon Heights', 'Mumbai', 'Maharashtra', '857878'),
('ORDS14739', 5, 1000, 'NB', 'TXN_SUCCESS', '2019-10-15 12:21:44', '104, Falon Heights', 'Mumbai', 'Maharashtra', '857878'),
('ORDS23766', 10, 320, 'DC', 'TXN_SUCCESS', '2019-10-09 17:48:35', '105, Gokuldham CHS', 'Mumbai', 'Maharashtra', '897456'),
('ORDS24483', 5, 800, 'NB', 'TXN_SUCCESS', '2019-10-09 09:27:44', '104, Falon Heights', 'Mumbai', 'Maharashtra', '857878'),
('ORDS29775', 5, 810, 'NB', 'TXN_SUCCESS', '2019-10-09 16:04:11', '104, Falon Heights', 'Mumbai', 'Maharashtra', '857878'),
('ORDS36560', 10, 4170, 'NB', 'TXN_SUCCESS', '2019-10-09 18:51:53', '105, Gokuldham CHS', 'Mumbai', 'Maharashtra', '897456'),
('ORDS45213', 5, 1720, 'NB', 'TXN_SUCCESS', '2019-10-09 18:15:59', '104, Falon Heights', 'Mumbai', 'Maharashtra', '857878'),
('ORDS49591', 5, 800, 'NB', 'TXN_FAILURE', '2019-10-09 09:13:06', '104, Falon Heights', 'Mumbai', 'Maharashtra', '857878'),
('ORDS65166', 5, 800, 'NB', 'TXN_SUCCESS', '2019-10-09 09:06:39', '104, Falon Heights', 'Mumbai', 'Maharashtra', '857878'),
('ORDS65783', 5, 800, 'NB', 'TXN_SUCCESS', '2019-10-09 14:52:25', '104, Falon Heights', 'Mumbai', 'Maharashtra', '857878'),
('ORDS73174', 10, 670, 'NB', 'TXN_SUCCESS', '2019-10-09 17:42:22', '105, Gokuldham CHS', 'Mumbai', 'Maharashtra', '897456'),
('ORDS78806', 5, 1000, 'NB', 'TXN_SUCCESS', '2019-10-09 13:02:55', '104, Falon Heights', 'Mumbai', 'Maharashtra', '857878'),
('ORDS81917', 5, 1000, 'NB', 'TXN_SUCCESS', '2019-10-09 12:45:53', '104, Falon Heights', 'Mumbai', 'Maharashtra', '857878'),
('ORDS95930', 11, 250, 'NB', 'TXN_SUCCESS', '2019-10-15 12:48:13', '123', 'mumn', 'maha', 'jkkl');

-- --------------------------------------------------------

--
-- Table structure for table `order_product`
--

DROP TABLE IF EXISTS `order_product`;
CREATE TABLE IF NOT EXISTS `order_product` (
  `order_id` varchar(20) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_product`
--

INSERT INTO `order_product` (`order_id`, `product_id`, `quantity`) VALUES
('ORDS75723', 8, 1),
('ORDS75723', 10, 1),
('ORDS81917', 10, 1),
('ORDS81917', 13, 1),
('ORDS78806', 10, 1),
('ORDS78806', 13, 1),
('ORDS65783', 8, 1),
('ORDS65783', 10, 1),
('ORDS29775', 13, 1),
('ORDS29775', 24, 3),
('ORDS41837', 21, 1),
('ORDS41837', 22, 1),
('ORDS73174', 21, 1),
('ORDS73174', 22, 1),
('ORDS23766', 18, 1),
('ORDS45213', 18, 1),
('ORDS45213', 9, 1),
('ORDS45213', 10, 1),
('ORDS45213', 12, 1),
('ORDS36560', 18, 1),
('ORDS36560', 12, 7),
('ORDS37881', 8, 1),
('ORDS37881', 9, 1),
('ORDS1375', 8, 1),
('ORDS1375', 9, 1),
('ORDS14739', 10, 1),
('ORDS14739', 13, 1),
('ORDS95930', 14, 1);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(50) NOT NULL,
  `description` mediumtext NOT NULL,
  `price` int(10) UNSIGNED NOT NULL,
  `type` varchar(10) NOT NULL,
  `photo` longtext,
  `category_id` int(11) NOT NULL,
  PRIMARY KEY (`product_id`),
  KEY `category_id` (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `description`, `price`, `type`, `photo`, `category_id`) VALUES
(8, 'Makhni Paneer Biryani', 'Layered with rice and doused in a creamy gravy', 250, 'veg', '../product_img/download1.webp', 2),
(9, 'Hot Yellow Curry with Vegetables', 'Ambrosial Thai yellow curry, flavoured with galangal and lemongrass', 300, 'veg', '../product_img/thai-curry-625_625x350_81467969171.jpg', 2),
(10, 'Pommes Gratin', 'Loaded with cream and flavoured with thyme, our rich potato gratin is sure to satisfy any palate', 550, 'veg', '../product_img/potato-baked-625_625x350_61441180367.webp', 2),
(11, 'Vegetarian Burritos', 'Packed with kidney beans and a cheesy mix, just serve the tortillas with a sensational salsa', 500, 'veg', '../product_img/burritos-625_625x350_71441185303.jpg', 2),
(12, 'Penne A La Vodka', 'Irresistible flavour and a splash of vodka', 550, 'veg', '../product_img/pasta-625_625x350_71467969221.webp', 2),
(13, 'Vegetarian Khow Suey', 'Coconut-y Burmese delicacy one-pot meal with fried garlic, onion, peanuts', 450, 'veg', '../product_img/khow-suey-625_625x379_41467969260.webp', 2),
(14, 'Zucchini and Cream Cheese Rolls', 'Thin and crisp Zucchini slices stuffed with carrots, celery, cream and oodles of cheese', 250, 'veg', '../product_img/zucchini-and-cream-cheese-rolls_620x333_61513082476.jpg', 1),
(15, 'Honey Chilli Potatoes', 'Chinese starters', 150, 'veg', '../product_img/honey-chilli-potatoes_620x330_51511868642.jpg', 1),
(16, 'Grilled Vegetables with Feta Bruschetta', 'Italian starter with grilled vegetables and feta cheese topped on crisp bread', 320, 'veg', '../product_img/bruschetta_625x350_71506417841.jpg', 1),
(17, 'Broccoli & potato croquettes', 'Crunchy croquettes are both a stealthy way to get more vegetables', 250, 'veg', '../product_img/broccoli-and-potato-croquettes.jpg', 1),
(18, 'Honeyed winter salad', 'Bring summer to winter with this fresh salad', 320, 'veg', '../product_img/recipe-image-legacy-id--441463_11.jpg', 1),
(19, 'Sagey Gin Gimlet', 'gin gimlet is made with sage-infused simple syrup and muddled fresh sage', 350, 'veg', '../product_img/7071436.jpg', 3),
(20, 'Aperol Spritz', 'Gets a bad rap for being bitter and basic', 340, 'veg', '../product_img/9-aperol-1560986460.jpg', 3),
(21, 'Espresso Martini', 'Coffee and booze in one drink', 350, 'veg', '../product_img/7-esspreso-1560986547.jpg', 3),
(22, 'Daiquiri', 'Citrusy marriage of rum and lime', 320, 'veg', '../product_img/4-daq-1560987254.jpg', 3),
(23, 'Negroni', 'Sweet, sun-kissed, and refreshing', 450, 'veg', '../product_img/2-negroni-1560987294.jpg', 3),
(24, 'Chocolate Dream', 'Rich, decadent brownie layered with chocolate mousse and whipped cream', 120, 'veg', '../product_img/5cdae4cf93a15227da609f12.jpg', 4),
(25, 'Buttermilk Pie', 'Creamy Buttermilk Pie with a custard filling, flaky crust, and sliced strawberry topping', 150, 'veg', '../product_img/5cdaeffa93a1522a4b701c95.jpg', 4),
(26, 'DIY Churro Sundae', 'Build-Your-Own Churro Sundae with variety of sauces', 450, 'veg', '../product_img/5cdae7ab93a15239e22249d3.jpg', 4),
(27, 'Salted Caramel Cookie Skillet', 'Salted caramel cookie loaded with white chocolate, almond toffee, and pretzel chunks', 190, 'veg', '../product_img/5cdb1b7793a15238dc3b77c3.jpg', 4),
(28, 'Oreo Madness', 'Cookies and cream ice cream sandwiched between Oreo cookie crumbles', 210, 'veg', '../product_img/5cdada1193a15225cf1164a4.jpg', 4),
(29, 'Cherry Squares', 'Sumptuous layered bar cookie is iced with cherry frosting', 150, 'veg', '../product_img/561e63011400002200c79e4a.jpeg', 4);

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

DROP TABLE IF EXISTS `review`;
CREATE TABLE IF NOT EXISTS `review` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `email` varchar(60) NOT NULL,
  `review` longtext NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`ID`, `name`, `email`, `review`) VALUES
(1, 'aarti', 'aarti@gmail.com', 'Nice Food');

-- --------------------------------------------------------

--
-- Table structure for table `table_booking`
--

DROP TABLE IF EXISTS `table_booking`;
CREATE TABLE IF NOT EXISTS `table_booking` (
  `booking_id` int(10) NOT NULL AUTO_INCREMENT,
  `customer_name` varchar(30) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `contact` bigint(20) UNSIGNED DEFAULT NULL,
  `guests` int(10) UNSIGNED DEFAULT NULL,
  `date` date DEFAULT NULL,
  `time` time DEFAULT NULL,
  `booking_datetime` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`booking_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `table_booking`
--

INSERT INTO `table_booking` (`booking_id`, `customer_name`, `email`, `contact`, `guests`, `date`, `time`, `booking_datetime`) VALUES
(1, 'Dhanusha', 'dhanusha@gmail.com', 9876543210, 1, '2019-10-03', '17:00:00', '2019-10-03 18:28:50'),
(2, 'shilpa', 'hdnj@fhbcj.eruj', 7894561230, 1, '2019-10-17', '17:00:00', '2019-10-05 17:58:46'),
(3, 'gigi', 'g@g.c', 9876543210, 1, '2019-10-24', '17:00:00', '2019-10-05 18:02:16'),
(4, 'rftghjk', 'sdf@dsfg.sdf', 3456789345, 1, '2019-10-10', '17:00:00', '2019-10-08 14:18:11'),
(5, 'Dhanusha', 'dhanusha1@gmail.com', 9638527410, 1, '2019-10-24', '17:03:00', '2019-10-09 07:08:06'),
(6, 'Yash', 'yash@gmail.com', 7418529630, 1, '2019-10-31', '21:00:00', '2019-10-09 07:10:20'),
(7, 'Kinjal', 'kinjal@gmail.com', 8527419630, 1, '2019-10-22', '15:00:00', '2019-10-09 07:11:13'),
(8, 'Divya BHatnagar', 'bhatnagardivya@gmail.com', 987654321, 4, '2019-10-25', '15:00:00', '2019-10-15 06:43:05');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `category_id` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
