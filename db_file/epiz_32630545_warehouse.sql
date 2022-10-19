-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql201.epizy.com
-- Generation Time: Oct 19, 2022 at 03:01 AM
-- Server version: 10.3.27-MariaDB
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `epiz_32630545_warehouse`
--

-- --------------------------------------------------------

--
-- Table structure for table `color`
--

CREATE TABLE `color` (
  `color_id` int(11) NOT NULL,
  `color_name` varchar(50) COLLATE utf8_bin NOT NULL,
  `state` tinyint(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `color`
--

INSERT INTO `color` (`color_id`, `color_name`, `state`) VALUES
(4, 'Gray', 1),
(5, 'Red', 1),
(7, 'Rose Gold', 1),
(8, 'Navy blue', 1),
(9, 'White', 1),
(10, 'Cream', 1),
(11, 'Green', 1),
(12, 'Orange', 1),
(13, 'Pink', 1),
(14, 'Black', 1),
(15, 'á€á€›á€™á€ºá€¸á€¸', 1),
(16, 'Gold', 1),
(17, 'Black gray', 1),
(18, 'Black gold', 1),
(19, 'Teal', 1);

-- --------------------------------------------------------

--
-- Table structure for table `order_item`
--

CREATE TABLE `order_item` (
  `o_id` int(40) NOT NULL,
  `order_code` int(50) NOT NULL,
  `o_item` varchar(100) COLLATE utf8_bin NOT NULL,
  `o_qty` int(50) NOT NULL,
  `o_price` int(100) NOT NULL,
  `o_qty_price` int(100) NOT NULL,
  `subtotal_price` int(100) NOT NULL,
  `discount` int(50) DEFAULT NULL,
  `delivery` int(50) DEFAULT NULL,
  `total_price` int(100) DEFAULT NULL,
  `customer` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `payment` varchar(30) COLLATE utf8_bin DEFAULT NULL,
  `address` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `o_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `order_item`
--

INSERT INTO `order_item` (`o_id`, `order_code`, `o_item`, `o_qty`, `o_price`, `o_qty_price`, `subtotal_price`, `discount`, `delivery`, `total_price`, `customer`, `payment`, `address`, `o_date`) VALUES
(56, 9111841, '28', 1, 160000, 160000, 160000, 0, 3000, 163000, 'Ko Ye Lwin Aung', 'KBZ', 'á€á€¬á€á€»á€®á€œá€­á€á€º', '2022-09-21'),
(59, 9082629, '38', 1, 340000, 340000, 340000, 0, 0, 340000, 'á€™á€®á€™á€®', 'None', 'á€žá€™á€­á€¯á€„á€ºá€¸', '2022-09-22'),
(62, 9081305, '41', 1, 340000, 340000, 340000, 0, 0, 340000, 'Home buyer', 'Cash', 'None', '2022-09-23'),
(63, 9041948, '48', 1, 350000, 350000, 350000, 0, 0, 350000, 'Anna Hseng', 'Cash', 'Home', '2022-09-29'),
(65, 10062426, '52', 1, 185000, 185000, 465000, 65000, 0, 400000, 'Ma thandamyo', 'cash', 'home', '2022-10-03'),
(66, 10062426, '51', 1, 155000, 155000, 465000, 65000, 0, 400000, 'Ma thandamyo', 'cash', 'home', '2022-10-03'),
(67, 10062426, '50', 1, 125000, 125000, 465000, 65000, 0, 400000, 'Ma thandamyo', 'cash', 'home', '2022-10-03'),
(68, 10031554, '37', 1, 360000, 360000, 360000, 0, 0, 360000, 'Home', 'Cash', 'Home', '2022-10-06'),
(69, 10033556, '38', 1, 340000, 340000, 340000, 0, 0, 340000, 'home', 'cash', 'home', '2022-10-06'),
(70, 10105409, '47', 1, 350000, 350000, 350000, 0, 0, 350000, 'Delivery', 'Delivery', 'Delivery', '2022-10-12');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `p_id` int(11) NOT NULL,
  `p_name` varchar(50) COLLATE utf8_bin NOT NULL,
  `p_supplier` int(10) NOT NULL,
  `p_stock` int(30) NOT NULL,
  `p_s_price` int(30) NOT NULL,
  `p_o_price` int(30) NOT NULL,
  `Total` int(40) NOT NULL,
  `p_siz` int(11) NOT NULL,
  `p_col` int(11) NOT NULL,
  `p_date` date NOT NULL DEFAULT current_timestamp(),
  `p_img` varchar(100) COLLATE utf8_bin NOT NULL,
  `p_state` tinyint(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`p_id`, `p_name`, `p_supplier`, `p_stock`, `p_s_price`, `p_o_price`, `Total`, `p_siz`, `p_col`, `p_date`, `p_img`, `p_state`) VALUES
(24, 'Aluminium', 2, 1, 10, 160000, 160000, 8, 7, '2022-09-20', 'IMG-97b0ea7a87edfeb663d8f6a82db5affa-V.jpg', 1),
(25, 'Aluminium', 2, 1, 100, 190000, 190000, 7, 7, '2022-09-20', 'IMG-97b0ea7a87edfeb663d8f6a82db5affa-V.jpg', 1),
(26, 'Aluminium', 2, 1, 100, 160000, 160000, 8, 5, '2022-09-20', 'IMG-97b0ea7a87edfeb663d8f6a82db5affa-V.jpg', 1),
(27, 'Aluminium', 2, 1, 100, 190000, 190000, 7, 5, '2022-09-20', 'IMG-97b0ea7a87edfeb663d8f6a82db5affa-V.jpg', 1),
(28, 'Aluminium', 2, 0, 100, 160000, 0, 8, 9, '2022-09-20', 'IMG-97b0ea7a87edfeb663d8f6a82db5affa-V.jpg', 1),
(29, 'Delsey', 2, 1, 100, 155000, 155000, 8, 11, '2022-09-20', 'IMG-366a612029646fbe578ef4c8c28e5a11-V.jpg', 1),
(30, 'Delsey', 2, 1, 100, 180000, 180000, 7, 11, '2022-09-20', 'IMG-366a612029646fbe578ef4c8c28e5a11-V.jpg', 1),
(31, 'Olympic', 2, 1, 100, 100000, 100000, 7, 5, '2022-09-20', 'IMG-15c4c6ae8f6dc413d29fa80c92e8a880-V.jpg', 1),
(32, 'Olympic', 2, 1, 100, 100000, 100000, 7, 8, '2022-09-20', 'IMG-66bd257a2ba786c78131444519ee01b9-V.jpg', 1),
(33, 'Olympic', 2, 1, 100, 100000, 100000, 7, 14, '2022-09-20', 'IMG-afa0be6877163259030e779895950645-V.jpg', 1),
(34, 'Olympic', 2, 1, 100, 100000, 100000, 7, 15, '2022-09-20', 'IMG-924c8c2ceb75d131514465ceca169243-V.jpg', 1),
(35, 'Margarinetaville', 2, 1, 100, 240000, 240000, 6, 12, '2022-09-20', 'IMG-7cc706aecdc06705a507262c1919f854-V.jpg', 1),
(36, 'Stimnite', 2, 1, 100, 360000, 360000, 6, 14, '2022-09-20', 'IMG-c7885abad8c43611ff25f6ca5786fa1b-V.jpg', 1),
(37, 'Stimnite', 2, 1, 100, 360000, 360000, 6, 9, '2022-09-20', 'IMG-db65434b175e89018c6fa1fdccf24fed-V.jpg', 1),
(38, 'Ifly', 2, 1, 100, 340000, 340000, 6, 13, '2022-09-20', 'IMG-fba21ab759821b5f9dbbec8d1afa38af-V.jpg', 1),
(39, 'It', 2, 1, 100, 340000, 340000, 6, 10, '2022-09-20', 'IMG-f36fa4af0e41665168412b6e96377551-V.jpg', 1),
(40, 'It', 2, 1, 100, 340000, 340000, 6, 4, '2022-09-20', 'IMG-4c5f33d886b627474a09e22a0c01ec22-V.jpg', 1),
(41, 'Small slanting', 2, 0, 100, 340000, 0, 6, 12, '2022-09-20', 'IMG-c5a0bce9d4cdfb5bc5237a632d4314b5-V.jpg', 1),
(42, 'Batolon', 2, 1, 100, 340000, 340000, 6, 9, '2022-09-20', 'IMG-8d6c1ddadd1d00d967ddefabd5ed6a08-V.jpg', 1),
(43, 'Batolon', 2, 1, 100, 340000, 340000, 6, 13, '2022-09-20', 'IMG-d27cc93a0519eebf9bad2d74ccf056b3-V.jpg', 1),
(44, 'Seanshowá€œá€€á€ºá€žá€®á€¸', 2, 2, 100, 280000, 560000, 6, 16, '2022-09-20', 'IMG-3b753582ffcf99e34d359b38226e6ba9-V.jpg', 1),
(45, 'Reaction-034', 2, 1, 100, 350000, 350000, 6, 8, '2022-09-20', 'IMG-e12c3b0199dd4934fa87e94e6315dccd-V.jpg', 1),
(46, 'Reaction-034', 2, 1, 100, 350000, 350000, 6, 14, '2022-09-20', 'IMG-7eececfb7428c486f5f98ee82417fd9a-V.jpg', 1),
(47, 'Reaction-017', 2, 0, 100, 350000, 0, 6, 4, '2022-09-20', 'IMG-3bf8c59e2fe7ee465a4083bc2fbb48a0-V.jpg', 1),
(48, 'Reaction-017', 2, 0, 100, 350000, 0, 6, 14, '2022-09-20', 'IMG-2a55dffada8951634356521d24b8510d-V.jpg', 1),
(49, 'Yc eason', 2, 1, 100, 155000, 155000, 8, 7, '2022-09-20', 'IMG-0c9e8f8fb7fd90a910e493ba875ebbf3-V.jpg', 1),
(50, 'Yc eason', 2, 1, 100, 125000, 125000, 9, 8, '2022-09-20', 'IMG-bca86fb787fdeaa98e51755d40ff60ae-V.jpg', 1),
(51, 'Yc eason', 2, 1, 100, 155000, 155000, 8, 8, '2022-09-20', 'IMG-bca86fb787fdeaa98e51755d40ff60ae-V.jpg', 1),
(52, 'Yc eason', 2, 1, 100, 185000, 185000, 7, 8, '2022-09-20', 'IMG-bca86fb787fdeaa98e51755d40ff60ae-V.jpg', 1),
(53, 'Yc eason', 2, 1, 100, 125000, 125000, 9, 17, '2022-09-20', 'Screenshot_20220830_165404_com.android.chrome.jpg', 1),
(54, 'Yc eason', 2, 1, 100, 155000, 155000, 8, 17, '2022-09-20', 'Screenshot_20220912_153618_com.android.chrome.jpg', 1),
(56, 'Yc eason', 2, 1, 100, 400000, 400000, 6, 5, '2022-09-20', 'IMG-bca86fb787fdeaa98e51755d40ff60ae-V.jpg', 1),
(57, 'Yc eason', 2, 1, 100, 400000, 400000, 6, 18, '2022-09-20', 'IMG-10df97e578adf34f08830833d4baaa8a-V.jpg', 1),
(58, 'Yc eason', 2, 1, 100, 185000, 185000, 7, 17, '2022-09-20', 'Screenshot_20220830_165404_com.android.chrome.jpg', 1),
(59, 'Seanshowá€œá€€á€ºá€žá€®á€¸', 2, 1, 100, 280000, 280000, 6, 19, '2022-10-03', '289482889_4948907661902307_5567545754722496667_n.jpg', 1),
(60, 'Seanshow', 2, 1, 100, 340000, 340000, 6, 19, '2022-10-03', 'viber_image_2022-10-02_21-27-51-628.jpg', 1),
(61, 'Solo Bag', 2, 14, 100, 30000, 420000, 7, 19, '2022-10-04', 'viber_image_2022-10-03_16-30-12-680.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `receive`
--

CREATE TABLE `receive` (
  `r_id` int(11) NOT NULL,
  `r_name` varchar(50) COLLATE utf8_bin NOT NULL,
  `r_supplier` int(30) NOT NULL,
  `r_color` int(30) NOT NULL,
  `r_size` int(30) NOT NULL,
  `r_date` date NOT NULL DEFAULT current_timestamp(),
  `r_qty` varchar(50) COLLATE utf8_bin NOT NULL,
  `r_img` varchar(100) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `receive`
--

INSERT INTO `receive` (`r_id`, `r_name`, `r_supplier`, `r_color`, `r_size`, `r_date`, `r_qty`, `r_img`) VALUES
(3, 'reaction', 2, 4, 5, '2022-09-16', '1', 'Screenshot 2022-09-15 125949.png'),
(4, 'reac', 2, 6, 5, '2022-09-16', '1', 'Screenshot 2022-09-15 125949.png'),
(5, 'reation', 2, 6, 5, '2022-08-15', '5', 'Screenshot 2022-09-15 125949.png'),
(7, 'asdfsd', 2, 6, 3, '2022-10-16', '7', 'Screenshot 2022-09-15 125949.png'),
(39, 'Aluminium', 2, 7, 8, '2022-09-20', '1', 'IMG-97b0ea7a87edfeb663d8f6a82db5affa-V.jpg'),
(40, 'Aluminium', 2, 7, 7, '2022-09-20', '1', 'IMG-97b0ea7a87edfeb663d8f6a82db5affa-V.jpg'),
(41, 'Aluminium', 2, 5, 8, '2022-09-20', '1', 'IMG-97b0ea7a87edfeb663d8f6a82db5affa-V.jpg'),
(42, 'Aluminium', 2, 5, 7, '2022-09-20', '1', 'IMG-97b0ea7a87edfeb663d8f6a82db5affa-V.jpg'),
(43, 'Aluminium', 2, 9, 8, '2022-09-20', '1', 'IMG-97b0ea7a87edfeb663d8f6a82db5affa-V.jpg'),
(44, 'Delsey', 2, 11, 8, '2022-09-20', '1', 'IMG-366a612029646fbe578ef4c8c28e5a11-V.jpg'),
(45, 'Delsey', 2, 11, 7, '2022-09-20', '1', 'IMG-366a612029646fbe578ef4c8c28e5a11-V.jpg'),
(46, 'Olympic', 2, 5, 7, '2022-09-20', '1', 'IMG-15c4c6ae8f6dc413d29fa80c92e8a880-V.jpg'),
(47, 'Olympic', 2, 8, 7, '2022-09-20', '1', 'IMG-66bd257a2ba786c78131444519ee01b9-V.jpg'),
(48, 'Olympic', 2, 14, 7, '2022-09-20', '1', 'IMG-afa0be6877163259030e779895950645-V.jpg'),
(49, 'Olympic', 2, 15, 7, '2022-09-20', '1', 'IMG-924c8c2ceb75d131514465ceca169243-V.jpg'),
(50, 'Margarinetaville', 2, 12, 6, '2022-09-20', '1', 'IMG-7cc706aecdc06705a507262c1919f854-V.jpg'),
(51, 'Stimnite', 2, 14, 6, '2022-09-20', '1', 'IMG-c7885abad8c43611ff25f6ca5786fa1b-V.jpg'),
(52, 'Stimnite', 2, 9, 6, '2022-09-20', '1', 'IMG-db65434b175e89018c6fa1fdccf24fed-V.jpg'),
(53, 'Ifly', 2, 13, 6, '2022-09-20', '1', 'IMG-fba21ab759821b5f9dbbec8d1afa38af-V.jpg'),
(54, 'Ifly', 2, 13, 6, '2022-09-20', '1', 'IMG-fba21ab759821b5f9dbbec8d1afa38af-V.jpg'),
(55, 'It', 2, 10, 6, '2022-09-20', '1', 'IMG-f36fa4af0e41665168412b6e96377551-V.jpg'),
(56, 'It', 2, 4, 6, '2022-09-20', '1', 'IMG-4c5f33d886b627474a09e22a0c01ec22-V.jpg'),
(57, 'Small slanting', 2, 12, 6, '2022-09-20', '1', 'IMG-c5a0bce9d4cdfb5bc5237a632d4314b5-V.jpg'),
(58, 'Batolon', 2, 9, 6, '2022-09-20', '1', 'IMG-8d6c1ddadd1d00d967ddefabd5ed6a08-V.jpg'),
(59, 'Batolon', 2, 13, 6, '2022-09-20', '1', 'IMG-d27cc93a0519eebf9bad2d74ccf056b3-V.jpg'),
(60, 'Seanshowá€œá€€á€ºá€žá€®á€¸', 2, 16, 6, '2022-09-20', '1', 'IMG-3b753582ffcf99e34d359b38226e6ba9-V.jpg'),
(61, 'Reaction-034', 2, 8, 6, '2022-09-20', '1', 'IMG-e12c3b0199dd4934fa87e94e6315dccd-V.jpg'),
(62, 'Reaction-034', 2, 14, 6, '2022-09-20', '1', 'IMG-7eececfb7428c486f5f98ee82417fd9a-V.jpg'),
(63, 'Reaction-017', 2, 4, 6, '2022-09-20', '1', 'IMG-3bf8c59e2fe7ee465a4083bc2fbb48a0-V.jpg'),
(64, 'Reaction-017', 2, 14, 6, '2022-09-20', '1', 'IMG-2a55dffada8951634356521d24b8510d-V.jpg'),
(65, 'Yc eason', 2, 7, 8, '2022-09-20', '1', 'IMG-0c9e8f8fb7fd90a910e493ba875ebbf3-V.jpg'),
(66, 'Yc eason', 2, 8, 9, '2022-09-20', '1', 'IMG-bca86fb787fdeaa98e51755d40ff60ae-V.jpg'),
(67, 'Yc eason', 2, 8, 8, '2022-09-20', '1', 'IMG-bca86fb787fdeaa98e51755d40ff60ae-V.jpg'),
(68, 'Yc eason', 2, 8, 7, '2022-09-20', '1', 'IMG-bca86fb787fdeaa98e51755d40ff60ae-V.jpg'),
(69, 'Yc eason', 2, 17, 9, '2022-09-20', '1', 'Screenshot_20220830_165404_com.android.chrome.jpg'),
(70, 'Yc eason', 2, 17, 8, '2022-09-20', '1', 'Screenshot_20220912_153618_com.android.chrome.jpg'),
(71, 'Yc eason', 2, 17, 7, '2022-09-20', '1', 'Screenshot_20220912_153618_com.android.chrome.jpg'),
(72, 'Yc eason', 2, 17, 9, '2022-09-20', '1', 'Screenshot_20220830_165404_com.android.chrome.jpg'),
(73, 'Yc eason', 2, 17, 8, '2022-09-20', '1', 'Screenshot_20220912_153618_com.android.chrome.jpg'),
(74, 'Yc eason', 2, 17, 7, '2022-09-20', '1', 'Screenshot_20220912_153618_com.android.chrome.jpg'),
(75, 'Yc eason', 2, 5, 6, '2022-09-20', '1', 'IMG-bca86fb787fdeaa98e51755d40ff60ae-V.jpg'),
(76, 'Yc eason', 2, 18, 6, '2022-09-20', '1', 'IMG-10df97e578adf34f08830833d4baaa8a-V.jpg'),
(77, 'Yc eason', 2, 17, 7, '2022-09-21', '1', 'Screenshot_20220830_165404_com.android.chrome.jpg'),
(79, 'Seanshowá€œá€€á€ºá€žá€®á€¸', 2, 16, 6, '2022-10-03', '1', 'IMG-3b753582ffcf99e34d359b38226e6ba9-V.jpg'),
(80, 'Seanshowá€œá€€á€ºá€žá€®á€¸', 2, 19, 6, '2022-10-03', '1', '289482889_4948907661902307_5567545754722496667_n.jpg'),
(81, 'Seanshow', 2, 19, 6, '2022-10-03', '1', 'viber_image_2022-10-02_21-27-51-628.jpg'),
(82, 'Solo Bag', 2, 19, 7, '2022-10-04', '14', 'viber_image_2022-10-03_16-30-12-680.jpg'),
(83, 'Ifly', 2, 13, 6, '2022-10-12', '1', 'IMG-fba21ab759821b5f9dbbec8d1afa38af-V.jpg'),
(84, 'Stimnite', 2, 9, 6, '2022-10-12', '1', 'IMG-db65434b175e89018c6fa1fdccf24fed-V.jpg'),
(85, 'Yc eason', 2, 8, 9, '2022-10-12', '1', 'IMG-bca86fb787fdeaa98e51755d40ff60ae-V.jpg'),
(86, 'Yc eason', 2, 8, 8, '2022-10-12', '1', 'IMG-bca86fb787fdeaa98e51755d40ff60ae-V.jpg'),
(87, 'Yc eason', 2, 8, 7, '2022-10-12', '1', 'IMG-bca86fb787fdeaa98e51755d40ff60ae-V.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `size`
--

CREATE TABLE `size` (
  `size_id` int(11) NOT NULL,
  `size_name` varchar(50) COLLATE utf8_bin NOT NULL,
  `state` tinyint(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `size`
--

INSERT INTO `size` (`size_id`, `size_name`, `state`) VALUES
(6, '20\"24\"28\"', 1),
(7, '28\"', 1),
(8, '24\"', 1),
(9, '20\"', 1);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `s_id` int(11) NOT NULL,
  `s_name` varchar(50) COLLATE utf8_bin NOT NULL,
  `s_balance` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`s_id`, `s_name`, `s_balance`) VALUES
(2, 'yejie', 0),
(5, 'azanko', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_bin NOT NULL,
  `balance` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `balance`) VALUES
(1, 'azanko', 3083000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `color`
--
ALTER TABLE `color`
  ADD PRIMARY KEY (`color_id`);

--
-- Indexes for table `order_item`
--
ALTER TABLE `order_item`
  ADD PRIMARY KEY (`o_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `receive`
--
ALTER TABLE `receive`
  ADD PRIMARY KEY (`r_id`);

--
-- Indexes for table `size`
--
ALTER TABLE `size`
  ADD PRIMARY KEY (`size_id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`s_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `color`
--
ALTER TABLE `color`
  MODIFY `color_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `order_item`
--
ALTER TABLE `order_item`
  MODIFY `o_id` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `receive`
--
ALTER TABLE `receive`
  MODIFY `r_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `size`
--
ALTER TABLE `size`
  MODIFY `size_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
