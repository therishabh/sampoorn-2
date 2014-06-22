-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 03, 2013 at 11:35 AM
-- Server version: 5.5.24-log
-- PHP Version: 5.3.13

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
-- Table structure for table `brand`
--

CREATE TABLE IF NOT EXISTS `brand` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `brand` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`id`, `brand`, `status`) VALUES
(1, 'Arrow', 1),
(2, 'BlackBerry', 1),
(3, 'versace', 1),
(4, 'zodiac', 1),
(5, 'AllenSolly', 1),
(6, 'Levis', 1);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category`, `status`) VALUES
(1, 'Misc', 1),
(2, 'Pajama', 1),
(3, 'T-Shirt', 1),
(4, 'Kurta', 1),
(5, 'Kamiz', 1),
(6, 'New Pants', 1),
(7, 'Fancy Shirts', 1),
(8, 'hello zed', 1);

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
  `price` int(11) NOT NULL,
  `brand` varchar(255) NOT NULL,
  `color` varchar(255) NOT NULL,
  `size` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `category`, `product_name`, `qty`, `price`, `brand`, `color`, `size`, `type`, `status`) VALUES
(1, 'Pajama', 'xyz', 200, 122, 'Arrow', 'White', '42', 'M', 1),
(2, 'Misc', 'Trousers', 60, 399, 'BlackBerry', 'Green', '38', 'M', 1),
(3, 'Misc', 'abcd', 10, 100, 'zodiac', 'Yellow', '42', 'M', 1),
(4, 'Pajama', 'abc', 20, 200, 'Arrow', 'White', '38', 'F', 1),
(5, 'Pajama', 'Lee511', 6, 299, 'BlackBerry', 'Red', '40', 'M', 1),
(6, 'Pajama', 'hello', 10, 599, 'Arrow', 'Orange', '42', 'F', 0),
(7, 'Misc', 'omega', 7, 1000, 'BlackBerry', 'Orange', 'XL', 'M', 1),
(8, 'Misc', 'bellbottom', 6, 109, 'BlackBerry', 'Purple', 'M', 'M', 0);

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
