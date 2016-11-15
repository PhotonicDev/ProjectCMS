-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 12, 2016 at 12:23 PM
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
(5, 'admin', '$2y$10$BaHvGa6UtFyItNev2a28IOSDuuuBQmIKcLWA5TZlBh94SH3rfSyo6', 'dovydastt@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `company_desc`
--

CREATE TABLE `company_desc` (
  `Description` varchar(255) NOT NULL,
  `pictures` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company_desc`
--

INSERT INTO `company_desc` (`Description`, `pictures`, `title`, `id`) VALUES
('This is Description', 'user_images/dcuk-logo.png', 'This is title', 1);

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
(15, 'admin', '$2y$10$rpZZ68k21ZVeD7/EtNCkcOICWkC3M47oj9IhrSaAu8bpkl6Nhf9lK', 'admin@admin.com', 'gfdsgfdshgggf', 'ffgfdgfsd', 'gdshgdshgdsgfds', '1982-05-25', '4 1', '');

-- --------------------------------------------------------

--
-- Table structure for table `daily_product`
--

CREATE TABLE `daily_product` (
  `date` timestamp NOT NULL,
  `Product_ID` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `newspage`
--

CREATE TABLE `newspage` (
  `Page_ID` int(11) NOT NULL,
  `Image` varchar(255) NOT NULL,
  `Description` text NOT NULL,
  `DATE` timestamp NOT NULL,
  `Header` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `newspage`
--

INSERT INTO `newspage` (`Page_ID`, `Image`, `Description`, `DATE`, `Header`) VALUES
(1, 'gravity.jpg', 'Gravitational waves are \'ripples\' in the fabric of space-time caused by some of the most violent and energetic processes in the Universe. Albert Einstein predicted the existence of gravitational waves in 1916 in his general theory of relativity.', '2016-11-10 22:50:11', 'Gravity still undefined...'),
(2, 'home.jpg', 'But while those dreams haven\'t materialised just yet, it hasn’t stopped visionaries from imagining what a human colony on the red planet might look like in the future.', '2016-11-10 22:51:13', 'Our new home?'),
(3, 'quasars.jpg', 'Shining so brightly that they eclipse the ancient galaxies that contain them, quasars are distant objects powered by black holes a billion times as massive as our sun. These powerful dynamos have fascinated astronomers since their discovery half a century ago.', '2016-11-10 22:52:13', 'Quasars are cool!');

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
  `category` varchar(20) NOT NULL,
  `images` varchar(255) NOT NULL,
  `stock` int(255) NOT NULL,
  `tags` varchar(50) NOT NULL,
  `manufacture` varchar(100) NOT NULL,
  `views` int(15) DEFAULT NULL,
  `upVote` int(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`Product_ID`, `name`, `price`, `description`, `color`, `size`, `category`, `images`, `stock`, `tags`, `manufacture`, `views`, `upVote`) VALUES
(1, '     Blue duck', 6.99, '     description of blue duck', '     bluee', '     SM small', '     small blue     ', 'user_images/duck_blue.png', 888, '   blue-sm             ', '     china', 135, 3),
(2, '  Blue duck', 6.99, '  description of blue duck', '  blue', ' SM small', '  small blue        ', 'user_images/duck_blue.png', 106, '  blue-sm        ', '  china', 101, 8),
(3, 'Green duck', 15.99, 'awesome duck description', 'green', 'Big XXL', 'Green ducks   ', 'user_images/duck_green.png', 123, 'awesome duck   ', 'germany', 20, 3),
(4, ' Purple duck', 6.99, ' description of purple duck', ' purple', ' SM small', ' small pruple ', 'user_images/duck_purple.png', 13, ' purple-sm ', ' china', 3, 2),
(5, 'Purple duck', 6.99, 'description of purple duck', 'purple', 'SM small', 'small pruple', 'user_images/duck_purple.png', 12, 'purple-sm', 'china', 3, 0),
(6, '  Green duck', 15.99, '  awesome duck description', '  green', '  Big XXL', '  Green ducks  ', 'user_images/duck_green.png', 4, '  awesome duck  ', '  china', 3, 0),
(7, '  Yellow duck', 14.99, '  awesome duck description', '  yellow', '  Big XXL', '  Yellow ducks  ', 'user_images/duck_yellow.png', 56, '  awesome duck  ', '  china', 1, 0),
(8, ' Yellow duck', 7.55, ' awesome duck description', ' yellow', ' Big XXL', ' Yellow ducks ', 'user_images/duck_yellow.png', 56, ' awesome duck ', ' china', 2, 1),
(14, ' NiceDuck', 45.99, 'Very nice but expensive duck', 'colorful', 'Tiny', 'none', 'user_images/duck_blue.png', 68, 'none', 'Portugal', 1, 0),
(15, ' Duckuyyy', 5.99, 'something awesome', 'yellow', 'big', 'asdas', 'user_images/duck_yellow.png', 455, 'sdsds', 'denmark', 0, 0);

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
  `Product_ID` int(20) NOT NULL,
  `Likes` int(15) NOT NULL,
  `Comments` text NOT NULL,
  `name` varchar(50) NOT NULL,
  `comment_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `social_pages`
--

INSERT INTO `social_pages` (`Product_ID`, `Likes`, `Comments`, `name`, `comment_id`) VALUES
(1, 0, ' whats up ', 'Nerijus', 1),
(1, 0, ' whats up ', 'Nerijus', 2),
(15, 0, ' gdsagds ', 'd', 3),
(15, 0, ' gdsagds ', 'd', 4),
(15, 0, ' dd ', 'd', 5),
(1, 0, ' gfasgfas ', 'gfadsgfa', 6),
(1, 0, ' bla\r\n ', 'nerijus', 7);

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
-- Indexes for table `search_history`
--
ALTER TABLE `search_history`
  ADD KEY `Product_ID` (`Product_ID`);

--
-- Indexes for table `social_pages`
--
ALTER TABLE `social_pages`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `Product_ID` (`Product_ID`);

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
  MODIFY `admin_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
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
  MODIFY `customer_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `newspage`
--
ALTER TABLE `newspage`
  MODIFY `Page_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `Order_No` int(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `Product_ID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `social_pages`
--
ALTER TABLE `social_pages`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
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
-- Constraints for table `daily_product`
--
ALTER TABLE `daily_product`
  ADD CONSTRAINT `daily_product_ibfk_1` FOREIGN KEY (`Product_ID`) REFERENCES `products` (`Product_ID`);

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
-- Constraints for table `social_pages`
--
ALTER TABLE `social_pages`
  ADD CONSTRAINT `social_pages_ibfk_1` FOREIGN KEY (`Product_ID`) REFERENCES `products` (`Product_ID`);

--
-- Constraints for table `sold_products`
--
ALTER TABLE `sold_products`
  ADD CONSTRAINT `sold_products_ibfk_1` FOREIGN KEY (`Product_ID`) REFERENCES `products` (`Product_ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;