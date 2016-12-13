-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 13, 2016 at 02:59 AM
-- Server version: 5.7.11
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `customer_id` int(20) NOT NULL,
  `Country` varchar(100) NOT NULL,
  `City` varchar(100) NOT NULL,
  `zip_code` int(10) NOT NULL,
  `street` int(150) NOT NULL,
  `house_no` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `name`, `password`, `email`) VALUES
(5, 'admin', '$2y$10$BaHvGa6UtFyItNev2a28IOSDuuuBQmIKcLWA5TZlBh94SH3rfSyo6', 'dovydastt@gmail.com'),
(6, 'asd', 'asd123', 'asd@asd.asdw');

-- --------------------------------------------------------

--
-- Table structure for table `company_desc`
--

CREATE TABLE `company_desc` (
  `Description` varchar(255) NOT NULL,
  `pictures` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `id` int(11) NOT NULL,
  `alt` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company_desc`
--

INSERT INTO `company_desc` (`Description`, `pictures`, `title`, `id`, `alt`) VALUES
('This is Description', 'user_images/dcuk-logo.png', 'This is title', 1, 'This is Description');

-- --------------------------------------------------------

--
-- Table structure for table `contact_info`
--

CREATE TABLE `contact_info` (
  `Street` varchar(255) NOT NULL,
  `Phone` varchar(50) NOT NULL,
  `email` varchar(150) NOT NULL,
  `description` varchar(255) NOT NULL,
  `zipcode` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `country` varchar(100) NOT NULL,
  `monday` varchar(15) NOT NULL,
  `tuesday` varchar(15) NOT NULL,
  `wednesday` varchar(15) NOT NULL,
  `thursday` varchar(15) NOT NULL,
  `friday` varchar(15) NOT NULL,
  `saturday` varchar(15) NOT NULL,
  `sunday` varchar(15) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact_info`
--

INSERT INTO `contact_info` (`Street`, `Phone`, `email`, `description`, `zipcode`, `city`, `country`, `monday`, `tuesday`, `wednesday`, `thursday`, `friday`, `saturday`, `sunday`, `id`) VALUES
('Thulevej 50', '+45 50 22 77 37', 'awesomeducks@gmail.com', 'text text text text', '6715', 'Esbjerg N', 'Denmark', '08:00 - 18:00', '08:00 - 18:00', '08:00 - 18:00', '08:00 - 18:00', '09:00 - 15:00', '10:00 - 13:00', '11:00 - 13:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer_id` int(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `firstName` varchar(50) DEFAULT NULL,
  `lastName` varchar(50) DEFAULT NULL,
  `Address` varchar(200) DEFAULT NULL,
  `birth` date DEFAULT NULL,
  `basket` text,
  `up_votes` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `name`, `password`, `email`, `firstName`, `lastName`, `Address`, `birth`, `basket`, `up_votes`) VALUES
(13, 'wentox', '$2y$10$.1sBIZ9VxOppK34yIkibDe5LZiwomJ.EGe/ZQ6t6G32wf2yQYWFU6', 'dovydastt@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL),
(14, 'anonim', '$2y$10$VioSrbFLAsnpAvn2G9xsBuKXgm.U5HVyKbZhNK7919ernqFLuhwIW', 'dsd@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL),
(15, 'admin', '$2y$10$UpBjkOC5Fv9Dg4Pasxm44.ccATpnKYRD4Qykij3l29r2ET55gUDDG', 'admin@admin.com', 'gfdsgfdshgggf', 'ffgfdgfsd', 'gdshgdshgdsgfds', '1982-05-25', '1', '4'),
(16, 'adminas', 'adminas', 'adminas@adminas.com', NULL, NULL, NULL, NULL, NULL, NULL),
(17, 'adminasas', 'adminasas', 'adminas@adminas.as', NULL, NULL, NULL, NULL, NULL, NULL),
(18, 'adminaitis', 'adminas', 'adminaitis@adminas.com', NULL, NULL, NULL, NULL, NULL, NULL),
(19, 'bfdsfds', '$2y$10$Y031l/gAxqGSqBPEOgEGU.QbGrSpGrnpw2swQIjcsiiT18RKonhkS', 'gfdsgf@hdgshgsd.com', NULL, NULL, NULL, NULL, NULL, NULL),
(20, 'naujas', '$2y$10$vygU.xJIqf1Y.UT1VtRzbe7u77qLS6pjqGrmYnIYxkOdyHKaEjPVK', 'naujas@naujas.naujas', NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `daily_product`
--

CREATE TABLE `daily_product` (
  `date` timestamp NOT NULL,
  `Product_ID` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `daily_product`
--

INSERT INTO `daily_product` (`date`, `Product_ID`) VALUES
('2016-11-15 13:19:40', 1),
('2016-11-15 13:19:51', 2),
('2016-11-15 13:19:57', 3),
('2016-11-15 13:20:02', 4),
('2016-11-15 13:20:08', 5);

-- --------------------------------------------------------

--
-- Table structure for table `newspage`
--

CREATE TABLE `newspage` (
  `Page_ID` int(11) NOT NULL,
  `Image` varchar(255) NOT NULL,
  `Description` text NOT NULL,
  `DATE` timestamp NOT NULL,
  `Header` varchar(255) DEFAULT NULL,
  `alt` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `newspage`
--

INSERT INTO `newspage` (`Page_ID`, `Image`, `Description`, `DATE`, `Header`, `alt`) VALUES
(1, 'web_images/gravity.jpg', 'Gravitational waves are \'ripples\' in the fabric of space-time caufgrsagfdsased by some of the most violent anfdsfdsad energetic processes in the Universe. Albert Einstein prhgfdshgdsedicted the existence of gravitational waves in 1916 in his general theory of relativity.<> \' """"', '2016-11-10 22:50:11', 'Gravity still undefined...', 'Gravity still undefined...'),
(2, 'web_images/home.jpg', 'But while those dreams haven\'t materialised just yet, it hasn\'t stopped visionaries from imagining what a human colony on the red planet might look like in the future.fdsafdsa', '2016-11-10 22:51:13', 'Our new home?', 'Our new home?'),
(3, 'web_images/quasars.jpg', 'Shining so brightly that they eclipse the ancient galaxies that contain them, quasars are distant objects powered by black holes a billion times as massive as our sun. These powerful dynamos have fascinated asgfsagfdatronomers since their discovery half a century ago.', '2016-11-10 22:52:13', 'Quasars are cool!', 'Quasars are cool!');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `Order_No` int(20) NOT NULL,
  `BoughtID` int(20) NOT NULL,
  `Date` timestamp NOT NULL,
  `customer_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `Product_ID` int(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `price` float NOT NULL,
  `description` varchar(255) NOT NULL,
  `color` varchar(20) NOT NULL,
  `size` varchar(15) NOT NULL,
  `material` varchar(20) NOT NULL,
  `images` varchar(255) NOT NULL,
  `stock` int(255) NOT NULL,
  `tags` varchar(50) NOT NULL,
  `manufacture` varchar(100) NOT NULL,
  `views` int(15) DEFAULT NULL,
  `upVote` int(15) DEFAULT NULL,
  `alt` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`Product_ID`, `name`, `price`, `description`, `color`, `size`, `material`, `images`, `stock`, `tags`, `manufacture`, `views`, `upVote`, `alt`) VALUES
(1, 'Blue duck', 6.99, 'Description of blue duck', 'Blue', 'S', 'rubber', 'user_images/duck_blue.png', 888, 'small china rubber rare blue', 'China', 312, 27, ''),
(2, 'Blue duck', 6.99, 'Description of blue duck', 'Blue', 'SM', 'Iron', 'user_images/duck_blue.png', 106, 'blue iron china sm', 'China', 337, 13, ''),
(3, 'Green duck', 15.99, 'awesome duck description', 'Green', 'XXL', 'Pvc', 'user_images/duck_green.png', 123, 'germany pvc green xxl', 'Germany', 81, 9, ''),
(5, 'Purple duck', 6.99, 'description of purple duck', 'purple', 'SM small', 'small pruple', 'user_images/duck_purple.png', 12, 'purple-sm', 'china', 28, 0, 'Purple duck'),
(6, 'Green duck', 15.99, 'awesome duck description', 'green', 'XXL', 'rubber', 'user_images/duck_green.png', 4, 'rubber xxl china green', 'china', 18, 2, ''),
(7, 'Yellow duck', 14.99, 'awesome duck description', 'yellow', 'Big XXL', 'wood', 'user_images/duck_yellow.png', 56, 'wood xxl yellow china', 'china', 20, 2, ''),
(8, 'Yellow duck', 7.55, 'awesome duck description', 'yellow', 'XXL', 'plastic', 'user_images/duck_yellow.png', 56, 'xxl china yellow plastic', 'china', 12, 2, ''),
(14, 'NiceDuck', 45.99, 'Very nice but expensive duck', 'colorful', 'XS', 'saphire', 'user_images/duck_blue.png', 68, 'rare saphire xs portugal', 'Portugal', 4, 0, ''),
(15, 'Duckuyyy', 5.99, 'something awesome', 'yellow', 'L', 'valerian', 'user_images/duck_yellow.png', 455, 'l valerian denmark yellow', 'Denmark', 13, 0, ''),
(16, 'Psy Duck', 99.99, 'Psycho duck from pokemon.', 'yellow', 'L', 'cobalt', 'user_images/duck_yellow.png', 2, 'special psy pokemon duck yellow limited edition', 'Japan', 4, 0, ''),
(17, 'Polymorph duck', 26, 'polymorph', 'red', 'XS', 'demaskus', 'user_images/duck_purple.png', 5, 'rare poly morph duck red', 'China', 6, 0, ''),
(18, 'Giarados duck', 999.99, 'Evolved from magickarp', 'water blue', 'XL', 'Meat', 'user_images/duck_blue.png', 99, 'pokemon giarados blue water Ash magickarp', 'Ash', 4, 1, ''),
(19, 'Bulbasourus', 99, 'Not a first choice', 'green', 'S', 'meat', 'user_images/duck_green.png', 45, 'leaf green grass pokemon never gets old', 'america', 3, 0, ''),
(20, 'Sick duck', 995, 'Something is wrong with this one', 'Violet', 'M', ' meat', 'user_images/duck_purple.png', 78, 'vodka sick duck hangover', 'Russia', 4, 0, ''),
(21, 'Ordinary duck', 45, ' Very first choice of any collector', 'Yellow', 'M', ' Iron', 'user_images/duck_yellow.png', 23, 'ordinary common first collecting casual', 'Denmark', 4, 1, ''),
(22, 'Blet duck', 100000000, 'blet duck awesome', 'crimson', 'XXXL', 'iron', 'user_images/duck_blue.png', 99, 'crimson duck awesome blet xxxl', 'china ', 0, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `product_order`
--

CREATE TABLE `product_order` (
  `category` varchar(50) DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `num_products` int(5) DEFAULT NULL,
  `related tags` text
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_order`
--

INSERT INTO `product_order` (`category`, `category_id`, `num_products`, `related tags`) VALUES
('Color', 1, NULL, 'red green blue yellow brown black gray purple white'),
('Material', 2, NULL, 'Metal Wood Rubber'),
('Price', 3, NULL, 'cheap rare unique'),
('Size', 4, NULL, 'XS S M L XL'),
('Special', 5, NULL, NULL),
('Country', 6, NULL, 'China Denmark America Russia Canada'),
('Manufacturer', 7, NULL, 'DuckCo Rubder Duckfab'),
('In stock', 8, NULL, NULL),
('Year', 9, NULL, '2000 2001 2002 2003 2004 2005 2006 2007 2008 2009 2010 2011 2012 2013 2014 2015 2016'),
('Popularity', 10, NULL, NULL),
('Top', 11, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `search_history`
--

CREATE TABLE `search_history` (
  `Product_ID` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `social_pages`
--

CREATE TABLE `social_pages` (
  `Likes` int(15) NOT NULL,
  `Comments` text NOT NULL,
  `name` varchar(50) NOT NULL,
  `comment_id` int(11) NOT NULL,
  `Product_ID` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `social_pages`
--

INSERT INTO `social_pages` (`Likes`, `Comments`, `name`, `comment_id`, `Product_ID`) VALUES
(1, ' whats up ', 'Nerijus', 1, 1),
(1, ' whats up ', 'Nerijus', 2, 1),
(0, ' gdsagds ', 'd', 3, 1),
(1, ' gdsagds ', 'd', 4, 1),
(1, ' dd ', 'd', 5, 1),
(1, ' gfasgfas ', 'gfadsgfa', 6, 1),
(0, ' bla\r\n ', 'nerijus', 7, 1),
(7, 'bum\r\n', 'admin', 9, 2),
(2, 'gfdsfds', 'admin', 10, 2),
(1, 'shazam\r\n', 'admin', 11, 8),
(0, 'gfdsgfdsgfdgfdsgfsd', 'admin', 12, 1),
(0, 'gfdsgfdsgfdgfdsgfsd', 'admin', 13, 1),
(0, 'gfdsgfdsgfdgfdsgfsd', 'admin', 14, 1),
(0, 'gfdsgfdsgfdgfdsgfsd', 'admin', 15, 1),
(0, 'whatever\r\n\r\n', 'admin', 16, 4),
(0, 'whatever\r\n\r\n', 'admin', 17, 4),
(0, 'whatever\r\n', 'admin', 18, 3),
(0, 'whatever\r\n', 'admin', 19, 3);

-- --------------------------------------------------------

--
-- Table structure for table `sold_products`
--

CREATE TABLE `sold_products` (
  `BoughtID` int(20) NOT NULL,
  `Product_ID` int(20) NOT NULL,
  `Qty` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `temp_user`
--

CREATE TABLE `temp_user` (
  `name` varchar(50) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `basket` text,
  `up_votes` text
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `company_desc`
--
ALTER TABLE `company_desc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_info`
--
ALTER TABLE `contact_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `daily_product`
--
ALTER TABLE `daily_product`
  ADD KEY `Product_ID` (`Product_ID`);

--
-- Indexes for table `newspage`
--
ALTER TABLE `newspage`
  ADD PRIMARY KEY (`Page_ID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`Order_No`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `BoughtID` (`BoughtID`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`Product_ID`);

--
-- Indexes for table `product_order`
--
ALTER TABLE `product_order`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `search_history`
--
ALTER TABLE `search_history`
  ADD KEY `Product_ID` (`Product_ID`);

--
-- Indexes for table `social_pages`
--
ALTER TABLE `social_pages`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `sold_products`
--
ALTER TABLE `sold_products`
  ADD PRIMARY KEY (`BoughtID`),
  ADD KEY `Product_ID` (`Product_ID`);

--
-- Indexes for table `temp_user`
--
ALTER TABLE `temp_user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `company_desc`
--
ALTER TABLE `company_desc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `contact_info`
--
ALTER TABLE `contact_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `newspage`
--
ALTER TABLE `newspage`
  MODIFY `Page_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `Order_No` int(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `Product_ID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `product_order`
--
ALTER TABLE `product_order`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `social_pages`
--
ALTER TABLE `social_pages`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `sold_products`
--
ALTER TABLE `sold_products`
  MODIFY `BoughtID` int(20) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `address`
--
ALTER TABLE `address`
  ADD CONSTRAINT `address_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`customer_id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`customer_id`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`BoughtID`) REFERENCES `sold_products` (`BoughtID`);

--
-- Constraints for table `search_history`
--
ALTER TABLE `search_history`
  ADD CONSTRAINT `search_history_ibfk_1` FOREIGN KEY (`Product_ID`) REFERENCES `products` (`Product_ID`);

--
-- Constraints for table `sold_products`
--
ALTER TABLE `sold_products`
  ADD CONSTRAINT `sold_products_ibfk_1` FOREIGN KEY (`Product_ID`) REFERENCES `products` (`Product_ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
