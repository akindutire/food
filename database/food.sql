-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 11, 2018 at 08:18 AM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `food`
--

-- --------------------------------------------------------

--
-- Table structure for table `cat`
--

CREATE TABLE `cat` (
  `id` int(11) NOT NULL,
  `cat` text NOT NULL,
  `products` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cat`
--

INSERT INTO `cat` (`id`, `cat`, `products`) VALUES
(1, 'Snacks', 0),
(3, 'Pizza', 0),
(4, 'African Dishes', 0),
(5, 'Thai Foods', 0);

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `id` int(11) NOT NULL,
  `cname` text NOT NULL,
  `addr` text NOT NULL,
  `tel` text NOT NULL,
  `city` text NOT NULL,
  `sex` text NOT NULL,
  `explore_id` int(11) NOT NULL,
  `date` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`id`, `cname`, `addr`, `tel`, `city`, `sex`, `explore_id`, `date`) VALUES
(1, 'Akin', '98 Ile', '08107926083', 'Ak', 'Male', 598110, '1478757067'),
(2, 'Temitope', '34 IMADE, OWO', '08107926083', 'OWO,ONDO ', 'Male', 481911, '1478768601'),
(3, 'Temitope', '34 IMADE, OWO', '08107926083', 'OWO,ONDO ', 'Male', 307115, '1478769393'),
(4, 'Temitope', '34 IMADE, OWO', '08107926083', 'OWO,ONDO ', 'Male', 45881, '1478770926'),
(5, 'Temitope', '34 IMADE, OWO', '08107926083', 'OWO,ONDO ', 'Male', 60403, '1478771620'),
(6, 'Akin', '34 IMADE, OWO', '08107926083', 'OWO,ONDO ', 'Male', 67503, '1479031680');

-- --------------------------------------------------------

--
-- Table structure for table `mycart`
--

CREATE TABLE `mycart` (
  `id` int(11) NOT NULL,
  `explore_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `date` varchar(50) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mycart`
--

INSERT INTO `mycart` (`id`, `explore_id`, `product_id`, `qty`, `date`, `status`) VALUES
(1, 60403, 2, 1, '1478771260', 2),
(2, 60403, 13, 1, '1478771263', 2),
(3, 67503, 13, 1, '1479031665', 1),
(4, 67503, 15, 1, '1479031667', 1);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `trans_type` text NOT NULL,
  `amt_credited` int(11) NOT NULL,
  `delivery_man_id` int(11) NOT NULL,
  `trans_time` text NOT NULL,
  `manual_discount` int(11) NOT NULL,
  `client_fname` text NOT NULL,
  `addr` text NOT NULL,
  `city` text NOT NULL,
  `tel` varchar(15) NOT NULL,
  `trans_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `trans_type`, `amt_credited`, `delivery_man_id`, `trans_time`, `manual_discount`, `client_fname`, `addr`, `city`, `tel`, `trans_id`) VALUES
(1, 'Cash', 680, 2, '1478771650', 10, 'Temitope', '34 IMADE, OWO', 'OWO,ONDO ', '08107926083', 60403);

-- --------------------------------------------------------

--
-- Table structure for table `performancetab`
--

CREATE TABLE `performancetab` (
  `id` int(11) NOT NULL,
  `ifr` text NOT NULL,
  `tg` text NOT NULL,
  `st` int(11) NOT NULL,
  `lm` varchar(78) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `performancetab`
--

INSERT INTO `performancetab` (`id`, `ifr`, `tg`, `st`, `lm`) VALUES
(1, '1459450098', '1485892098', 1, '1479032280');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `product_name` text NOT NULL,
  `qty` int(11) NOT NULL,
  `uprice` int(11) NOT NULL,
  `cprice` int(11) NOT NULL,
  `discount` int(11) NOT NULL,
  `pimg` text NOT NULL,
  `date` text NOT NULL,
  `des` text NOT NULL,
  `qty_update` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `cat_id`, `product_name`, `qty`, `uprice`, `cprice`, `discount`, `pimg`, `date`, `des`, `qty_update`) VALUES
(1, 1, 'Sharwama', 13, 450, 0, 0, '1444017091images (29).jpg', 'Mon, Oct 2015: 05:51:49 am', '', 13),
(2, 1, 'Indiania Snack', 29, 400, 0, 10, '1444017132images (30).jpg', 'Mon, Oct 2015: 05:52:38 am', 'Jggjk', 34),
(3, 1, 'Yii Drash Pie', 31, 400, 0, 10, '1444017175download.jpg', 'Mon, Oct 2015: 05:53:14 am', 'Jggjk', 40),
(4, 3, 'Lahma Bi Ajeen', 11, 450, 0, 0, '1478753330lahma bi ajeen.jpg', 'Thu, Nov 2016: 05:49:33 am', '', 11),
(5, 3, 'Calzone', 10, 450, 0, 0, '1478753387th (2).jpg', 'Thu, Nov 2016: 05:49:58 am', '', 10),
(6, 3, 'Depo Jeen', 10, 450, 0, 0, '1478753435th (1).jpg', 'Thu, Nov 2016: 05:50:37 am', '', 10),
(7, 3, 'Chizza', 5, 450, 0, 0, '1478753451th.jpg', 'Thu, Nov 2016: 05:50:53 am', '', 10),
(8, 5, 'Chipon', 12, 200, 0, 0, '1478755247th (4).jpg', 'Thu, Nov 2016: 06:21:11 am', '', 13),
(9, 5, 'Thai Pie', 13, 160, 0, 0, '1478755281th (5).jpg', 'Thu, Nov 2016: 06:21:37 am', '', 13),
(10, 5, 'Thai Goat Meat', 10, 340, 0, 0, '1478755310th (7).jpg', 'Thu, Nov 2016: 06:22:12 am', '', 13),
(11, 5, 'Chin-in', 33, 70, 0, 0, '1478755426th (6).jpg', 'Thu, Nov 2016: 06:24:10 am', '', 34),
(12, 4, 'Ofada Rice', 23, 250, 0, 0, '1478755697th (13).jpg', 'Thu, Nov 2016: 06:28:45 am', '', 24),
(13, 4, 'Semo', 21, 300, 0, 0, '1478755745th (14).jpg', 'Thu, Nov 2016: 06:29:40 am', '', 24),
(14, 4, 'Goat Meat', 21, 150, 0, 0, '1478755807th (12).jpg', 'Thu, Nov 2016: 06:30:23 am', '', 24),
(15, 4, 'Afro Pizza', 23, 400, 0, 0, '1478755847th (11).jpg', 'Thu, Nov 2016: 06:31:03 am', '', 24);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `role` text NOT NULL,
  `name` text NOT NULL,
  `mat` text NOT NULL,
  `password` text NOT NULL,
  `pix` text NOT NULL,
  `sex` text NOT NULL,
  `bk` varchar(2) NOT NULL,
  `dpt` text NOT NULL,
  `extrights` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role`, `name`, `mat`, `password`, `pix`, `sex`, `bk`, `dpt`, `extrights`) VALUES
(1, 'Stock Man', 'Akinsuyi Allison Wilson', 'temitopedaniyan@gmail.com', 'c1116337aa7c3c3cbc2f631332dfe6d70152b759', '1274882akinsuyi.jpg', 'Male', '0', '', 1),
(2, 'Delivery Man', 'Delivery I', 'delivery1@food.com', 'c1116337aa7c3c3cbc2f631332dfe6d70152b759', '1274882akinsuyi.jpg', 'Male', '0', '', 1),
(3, 'Delivery Man', 'Delivery II', 'delivery2@food.com', 'c1116337aa7c3c3cbc2f631332dfe6d70152b759', '1274882akinsuyi.jpg', 'Male', '0', '', 1),
(4, 'Delivery Man', 'Delivery III', 'delivery3@food.com', 'c1116337aa7c3c3cbc2f631332dfe6d70152b759', '1274882akinsuyi.jpg', 'Male', '0', '', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cat`
--
ALTER TABLE `cat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mycart`
--
ALTER TABLE `mycart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `performancetab`
--
ALTER TABLE `performancetab`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cat`
--
ALTER TABLE `cat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `mycart`
--
ALTER TABLE `mycart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `performancetab`
--
ALTER TABLE `performancetab`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
