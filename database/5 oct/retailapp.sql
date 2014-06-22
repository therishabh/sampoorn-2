-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 04, 2013 at 09:48 PM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `retailapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

CREATE TABLE IF NOT EXISTS `bill` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bill_number` varchar(255) NOT NULL,
  `customer_id` varchar(255) NOT NULL,
  `product_id` varchar(255) NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `discount_per_item` varchar(255) NOT NULL,
  `discount_amount_per_item` varchar(255) NOT NULL,
  `amount_per_item` varchar(255) NOT NULL,
  `total_item` varchar(255) NOT NULL,
  `sub_total` varchar(255) NOT NULL,
  `main_discount` varchar(255) NOT NULL,
  `grand_total` varchar(255) NOT NULL,
  `pay` varchar(255) NOT NULL,
  `due` varchar(255) NOT NULL,
  `created_date` datetime NOT NULL,
  `status` tinyint(2) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=51 ;

--
-- Dumping data for table `bill`
--

INSERT INTO `bill` (`id`, `bill_number`, `customer_id`, `product_id`, `quantity`, `discount_per_item`, `discount_amount_per_item`, `amount_per_item`, `total_item`, `sub_total`, `main_discount`, `grand_total`, `pay`, `due`, `created_date`, `status`) VALUES
(1, 'AWC_1', '2', '*2*/*8*/*6*', '*2*/*12*/*3*', '1.8/10.5/5', '14.36/137.34/89.85', '783.64/1170.66/1707.15', '17', '3661.45', '5.6', '3456.00', '3000', '456.00', '2013-09-28 23:24:57', 1),
(2, 'AWC_2', '3', '*3*/*2*/*1*', '*7*/*1*/*1*', '15/0/0', '105.00/0.00/0.00', '595.00/399.00/122.00', '9', '1116.00', '12', '982.00', '1000', '0.00', '2013-09-28 23:28:44', 1),
(3, 'AWC_3', '4', '*8*/*6*', '*1*/*3*', '0/0', '0.00/0.00', '109.00/1797.00', '4', '1906.00', '12', '1677.00', '1000', '677.00', '2013-09-28 23:30:48', 1),
(4, 'AWC_4', '5', '*8*', '*2*', '0', '0.00', '218.00', '2', '218.00', '0', '218.00', '1000', '0.00', '2013-09-28 23:32:27', 1),
(5, 'AWC_5', '6', '*3*/*5*/*2*', '*3*/*8*/*2*', '10/3/2.8', '30.00/71.76/22.34', '270.00/2320.24/775.66', '13', '3365.90', '10.9', '2999.00', '0', '2999.00', '2013-09-28 23:37:12', 1),
(6, 'AWC_6', '3', '*4*', '*1*', '0', '0.00', '200.00', '1', '200.00', '20', '160.00', '100', '60.00', '2013-09-29 11:48:45', 1),
(7, 'AWC_7', '7', '*2*/*3*', '*2*/*5*', '10/13', '79.80/65.00', '718.20/435.00', '7', '1153.20', '12.9', '1004.00', '1000', '4.00', '2013-09-29 12:43:42', 1),
(8, 'AWC_8', '8', '*5*/*1*', '*15*/*10*', '2/0', '89.70/0.00', '4395.30/1220.00', '25', '5615.30', '10.5', '5026.00', '6000', '0.00', '2013-09-29 12:45:52', 1),
(9, 'AWC_9', '9', '*2*/*3*', '*2*/*10*', '15/5', '119.70/50.00', '678.30/950.00', '12', '1628.30', '10', '1465.00', '1000', '465.00', '2013-09-29 14:47:36', 1),
(10, 'AWC_10', '9', '*3*/*1*/*5*', '*3*/*5*/*1*', '2.6/2.8/5.1', '7.80/17.08/15.25', '292.20/592.92/283.75', '9', '1168.87', '10', '1052.00', '1000', '52.00', '2013-09-29 16:24:49', 1),
(11, 'AWC_11', '1', '*1*/*2*', '*1*/*1*', '0/0', '0.00/0.00', '122.00/399.00', '2', '521.00', '0', '521.00', '1000', '0.00', '2013-09-29 16:51:01', 1),
(23, 'AWC_23', '1', '*1*/*2*', '*5*/*6*', '1.8/5.6', '10.98/134.06', '599.02/2259.94', '11', '2858.96', '5', '2716.00', '0', '2716.00', '2013-09-29 18:23:45', 1),
(24, 'AWC_24', '1', '*1*', '*5*', '0', '0.00', '610.00', '5', '610.00', '5', '580.00', '150', '430.00', '2013-09-29 18:25:03', 1),
(25, 'AWC_25', '1', '*2*/*3*/*4*', '*1*/*1*/*1*', '0/3/0', '0.00/3.00/0.00', '399.00/97.00/200.00', '3', '696.00', '2', '682.00', '150', '532.00', '2013-09-29 18:28:22', 1),
(26, 'AWC_26', '10', '*5*/*3*', '*1*/*2*', '25/10.85', '74.75/21.70', '224.25/178.30', '3', '402.55', '10.8.', '359.00', '1000', '0.00', '2013-09-29 18:31:17', 1),
(27, 'AWC_27', '12', '*3*/*4*/*3*', '*5*/*8*/*2*', '15/0/5', '75.00/0.00/10.00', '425.00/1600.00/190.00', '15', '2215.00', '5.6', '2091.00', '2000', '91.00', '2013-10-02 13:01:55', 1),
(28, 'AWC_28', '13', '*3*/*4*/*1*', '*5*/*3*/*50*', '5/3/2', '25.00/18.00/122.00', '475.00/582.00/5978.00', '58', '7035.00', '10.6', '6289.00', '5000', '1289.00', '2013-10-02 13:05:42', 1),
(29, 'AWC_29', '13', '*8*/*6*', '*15*/*3*', '5/0', '81.75/0.00', '1553.25/1797.00', '18', '3350.25', '12.6', '2928.00', '1000', '1928.00', '2013-10-02 13:09:23', 1),
(30, 'AWC_30', '13', '*8*/*6*', '*15*/*3*', '5/0', '81.75/0.00', '1553.25/1797.00', '18', '3350.25', '12.6', '2928.00', '1000', '1928.00', '2013-10-02 13:12:52', 1),
(31, 'AWC_31', '3', '*5*/*6*', '*3*/*2*', '1.6/0', '14.35/0.00', '882.65/1198.00', '5', '2080.65', '2', '2039.00', '2000', '39.00', '2013-10-03 19:30:56', 1),
(32, 'AWC_32', '14', '*2*/*3*', '*15*/*5*', '15/5', '897.75/25.00', '5087.25/475.00', '20', '5562.25', '15.5', '4700.00', '5000', '0.00', '2013-10-03 20:08:56', 1),
(33, 'AWC_33', '14', '*8*/*3*', '*5*/*4*', '2/2', '10.90/8.00', '534.10/392.00', '9', '926.10', '14.5', '792.00', '500', '292.00', '2013-10-03 20:11:58', 1),
(34, 'AWC_34', '15', '*1*/*2*', '*3*/*5*', '5/5', '18.30/99.75', '347.70/1895.25', '8', '2242.95', '10.5', '2007.00', '2000', '7.00', '2013-10-03 20:17:46', 1),
(35, 'AWC_35', '16', '*6*/*5*', '*4*/*3*', '1/0', '23.96/0.00', '2372.04/897.00', '7', '3269.04', '10.6', '2923.00', '3000', '0.00', '2013-10-03 20:21:48', 1),
(36, 'AWC_36', '17', '*5*', '*1*', '2', '5.98', '293.02', '1', '293.02', '2', '287.00', '300', '0.00', '2013-10-03 21:10:06', 1),
(37, 'AWC_37', '1', '*1*/*2*', '*2*/*3*', '3/2', '7.32/23.94', '236.68/1173.06', '5', '1409.74', '5', '1339.00', '1000', '339.00', '2013-10-03 21:13:28', 1),
(38, 'AWC_38', '19', '*1*/*2*', '*2*/*3*', '3/2', '7.32/23.94', '236.68/1173.06', '5', '1409.74', '5', '1339.00', '1000', '339.00', '2013-10-03 21:50:09', 1),
(40, 'AWC_40', '4', '*1*/*2*', '*2*/*3*', '3/2', '7.32/23.94', '236.68/1173.06', '5', '1409.74', '5', '1339.00', '1000', '339.00', '2013-10-03 21:52:18', 1),
(41, 'AWC_41', '3', '*5*/*2*/*5*', '*3*/*2*/*1*', '2.5/1.5/3', '22.43/11.97/8.97', '874.57/786.03/290.03', '6', '1950.63', '0.6', '1939.00', '2000', '0.00', '2013-10-03 21:57:51', 1),
(42, 'AWC_42', '1', '*1*/*6*', '*3*/*1*', '6.6/0', '24.16/0.00', '341.84/599.00', '4', '940.84', '6.66', '878.00', '300', '578.00', '2013-10-03 22:12:38', 1),
(43, 'AWC_43', '10', '*8*/*6*', '*2*/*1*', '3/2', '6.54/11.98', '211.46/587.02', '3', '798.48', '5', '759.00', '1000', '0.00', '2013-10-03 22:32:56', 1),
(44, 'AWC_44', '19', '*4*/*3*', '*3*/*2*', '2.6/3.6', '15.60/7.20', '584.40/192.80', '5', '777.20', '3.6', '749.00', '1000', '0.00', '2013-10-03 22:37:33', 1),
(45, 'AWC_45', '19', '*5*/*6*', '*3*/*1*', '5.6/2.6', '50.23/15.57', '846.77/583.43', '4', '1430.20', '3.6', '1379.00', '1500', '0.00', '2013-10-03 22:38:38', 1),
(46, 'AWC_46', '15', '*7*/*3*', '*2*/*2*', '10.6/3.6', '212.00/7.20', '1788.00/192.80', '4', '1980.80', '0.6', '1969.00', '1500', '469.00', '2013-10-03 22:42:07', 1),
(47, 'AWC_47', '1', '*3*/*5*', '*3*/*2*', '12/5', '36.00/29.90', '264.00/568.10', '5', '832.10', '0', '832.00', '500', '332.00', '2013-10-04 05:49:15', 1),
(48, 'AWC_48', '1', '*1*', '*1*', '0', '0.00', '122.00', '1', '122.00', '0', '122.00', '0', '122.00', '2013-10-04 05:50:21', 1),
(49, 'AWC_49', '20', '*10*/*5*/*1*', '*5*/*3*/*5*', '3.9/8.6/2.9', '73.13/77.14/17.83', '1801.87/819.86/597.17', '13', '3218.90', '10.6', '2878.00', '2000', '878.00', '2013-10-05 00:48:23', 1),
(50, 'AWC_50', '20', '*8*/*9*', '*2*/*4*', '0.9/0', '1.96/0.00', '216.04/2608.00', '6', '2824.04', '5.78', '2661.00', '3000', '0.00', '2013-10-05 00:50:24', 1);

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE IF NOT EXISTS `brand` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `brand` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`id`, `brand`, `status`) VALUES
(1, 'Misc', 1),
(2, 'BlackBerrey', 1),
(3, 'versace', 1),
(4, 'zodiac', 1),
(5, 'AllenSolly', 1),
(6, 'Levis', 1),
(7, 'Lee', 1),
(8, 'Ralph Lauren', 1),
(9, 'Nike', 1),
(10, 'Armani ( emporio & giorgio)', 1),
(11, 'Lacoste', 1),
(12, 'Gucci', 1),
(13, 'abercrombie & fitch ', 1),
(14, 'Louis Vuitton', 1),
(15, 'Hugo Boss', 1),
(16, 'sleepwell', 1);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category`, `status`) VALUES
(1, 'Misc', 1),
(2, 'Pajama', 1),
(3, 'Kurta', 1),
(4, 'Kamiz', 1),
(5, 'Tiger', 1),
(6, 'Fancy Shirts', 1),
(7, 'nightwear', 1),
(8, 'swimwear', 1),
(9, 'top', 1),
(10, 'Mapleton Dress', 1),
(11, 'Authentic V-Neck Tee ', 1),
(12, 'Fort Hamilton Jacket ', 1),
(13, 'Arrows Stormy', 1),
(14, 'bed sheets', 1);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `phone_no` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `bill_no` varchar(255) NOT NULL,
  `due` varchar(255) NOT NULL,
  `total_due` varchar(255) NOT NULL,
  `paid_due` varchar(255) NOT NULL,
  `total_paid_due` varchar(255) NOT NULL,
  `paid_due_date` varchar(2000) NOT NULL,
  `created_date` datetime NOT NULL,
  `status` tinyint(2) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `name`, `phone_no`, `email`, `address`, `bill_no`, `due`, `total_due`, `paid_due`, `total_paid_due`, `paid_due_date`, `created_date`, `status`) VALUES
(1, 'Misc', '0000000000', 'Misc', 'Misc', 'AWC_11/AWC_23/AWC_24/AWC_25/AWC_42/AWC_37/AWC_47/AWC_48', '0.00/2716.00/430.00/532.00/578.00/339.00/332.00/122.00', '5049.00', '500.00/95.00/600.00/400.00', '1595.00', '2013-10-04 04:05:25/2013-10-04 04:05:58/2013-10-04 04:06:37/2013-10-04 04:52:00', '2013-09-28 21:30:18', 1),
(2, 'Rohan Garg', '9654564497', 'rohan@gmail.com', '-', 'AWC_1', '456.00', '456.00', '', '0', '', '2013-09-28 23:24:57', 1),
(3, 'Rishabh Agrawal', '8010979311', 'rishabh@yahoo.com', 'Lucknow', 'AWC_2/AWC_6/AWC_31/AWC_41', '0.00/60.00/39.00/0.00', '99.00', '50.00', '50.00', '2013-10-04 04:46:42', '2013-09-28 23:28:44', 1),
(4, 'Rishabh Mittal', '8011999666', 'rishabh@outlook.com', 'Sitapur', 'AWC_3/AWC_40', '677.00/339.00', '1016.00', '500.00', '500.00', '2013-10-04 04:09:02', '2013-09-28 23:30:48', 1),
(5, 'Sohan Gupta', '9864949849', 'sohan@gmail.com', '-', 'AWC_4', '0.00', '0.00', '', '0', '', '2013-09-28 23:32:27', 1),
(6, 'Gungun Tayal', '8010979794', '', '', 'AWC_5', '2999.00', '2999.00', '', '0', '', '2013-09-28 23:37:12', 1),
(7, 'Sachin Yadav', '9874555828', '', '', 'AWC_7', '4.00', '4.00', '2.00', '2.00', '2013-10-04 04:44:27', '2013-09-29 12:43:42', 1),
(8, 'Mayank Agrawal', '9874569778', 'mayank@yahoo.com', '', 'AWC_8', '0.00', '0.00', '', '0', '', '2013-09-29 12:45:52', 1),
(9, 'Gungun Garg', '8015564944', '', '', 'AWC_9/AWC_10', '465.00/52.00', '517.00', '200.00', '200.00', '2013-10-04 04:43:42', '2013-09-29 14:47:36', 1),
(10, 'Rishabh Agrawal', '9877784548', 'rishabh@gmail.com', 'check', 'AWC_26/AWC_43', '0.00/0.00', '0.00', '', '0', '', '2013-09-29 18:31:17', 1),
(12, 'Azeem Khan', '9879999887', 'azeemkhan@kasovious.com', 'Delhi India', 'AWC_27', '91.00', '91.00', '', '0', '', '2013-10-02 13:01:55', 1),
(13, 'Hello', '9888888888', 'hello@gmail.com', '', 'AWC_28/AWC_29/AWC_30', '1289.00/1928.00/1928.00', '5145.00', '', '0', '', '2013-10-02 13:05:42', 1),
(14, 'Rishabh Agrawal', '9555801040', 'rishabh@kasovious', 'Delhi', 'AWC_32/AWC_33', '0.00/292.00', '292.00', '', '0', '', '2013-10-03 20:08:56', 1),
(15, 'Karan Magan', '8010979312', 'karan@yahoo.com', 'Bhopal', 'AWC_34/AWC_46', '7.00/469.00', '476.00', '100.00/100.00', '200.00', '2013-10-04 04:00:05/2013-10-04 04:41:12', '2013-10-03 20:17:46', 1),
(16, 'Karan Magan', '8010979355', 'contact@karan.com', '-', 'AWC_35', '0.00', '0.00', '', '0', '', '2013-10-03 20:21:48', 1),
(17, 'Rishabh Mittal', '8010979666', 'rishabh@gmail.com', 'Sitapur', 'AWC_36', '0.00', '0.00', '', '0', '', '2013-10-03 21:10:06', 1),
(18, 'Rakesh Mittal', '8010979688', 'rishabh@gmail.com', 'Sitapur', 'AWC_37', '339.00', '339.00', '', '', '', '2013-10-03 21:13:28', 0),
(19, 'Rishabh Mittal', '8010979663', 'rishabh@contact.com', 'Maholi', 'AWC_38/AWC_44/AWC_45', '339.00/0.00/0.00', '339.00', '100.00/200.00', '300.00', '2013-10-04 04:41:20/2013-10-04 04:51:33', '2013-10-03 21:50:09', 1),
(20, 'Tiger Tayal', '9899979745', 'tiger@yahoo.com', 'Shamli', 'AWC_49/AWC_50', '878.00/0.00', '878.00', '500.00/78.00', '578.00', '2013-10-05 00:58:08/2013-10-05 01:02:38', '2013-10-05 00:48:23', 1);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `sid` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'true',
  PRIMARY KEY (`sid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`sid`, `username`, `password`, `status`) VALUES
(1, 'admin', 'admin', 'true'),
(2, 'test', 'test', 'true');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(255) NOT NULL DEFAULT 'misc',
  `product_name` varchar(255) NOT NULL,
  `qty` int(11) NOT NULL,
  `sell_qty` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `brand` varchar(255) NOT NULL,
  `color` varchar(255) NOT NULL,
  `size` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `category`, `product_name`, `qty`, `sell_qty`, `price`, `brand`, `color`, `size`, `type`, `status`) VALUES
(1, '8', 'shirt', 210, 9, 123, '8', 'Gray', '42', 'M', 1),
(2, '4', 'Trousers', 60, 2, 399, '2', 'Green', '38', 'M', 1),
(3, '5', 'abcd', 23, 7, 100, '1', 'Yellow', '42', 'M', 1),
(4, '7', 'tshirt', 24, 3, 200, '6', 'White', '38', 'F', 1),
(5, '2', 'Lee511', 12, 12, 299, '5', 'Red', '40', 'F', 1),
(6, '6', 'hello', 12, 3, 599, '4', 'Orange', '42', 'M', 1),
(7, '4', 'omega', 7, 2, 1000, '9', 'Orange', 'XL', 'M', 1),
(8, '12', 'bellbottom', 47, 4, 109, '3', 'Purple', 'M', 'M', 1),
(9, '13', 'Shirt', 500, 4, 652, '6', 'Black', '35', 'M', 1),
(10, '14', 'green bed', 500, 5, 375, '16', 'mixed', '', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sam`
--

CREATE TABLE IF NOT EXISTS `sam` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `command` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `sam`
--

INSERT INTO `sam` (`id`, `command`, `address`, `status`) VALUES
(1, 'Home Page', 'index.php', 1),
(2, 'dashboard', 'dashboard.php', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
