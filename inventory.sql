-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 30, 2022 at 03:20 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventory`
--

-- --------------------------------------------------------

--
-- Table structure for table `assets`
--

CREATE TABLE `assets` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `igr_number` varchar(225) NOT NULL,
  `igr_date` varchar(225) NOT NULL,
  `asset_name` varchar(225) NOT NULL,
  `asset_type` int(11) NOT NULL,
  `asset_category` int(11) NOT NULL,
  `item_type` varchar(11) DEFAULT NULL,
  `item_size` int(11) DEFAULT NULL,
  `qty` int(11) NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `active_status` int(11) NOT NULL DEFAULT 1,
  `delete_status` int(11) NOT NULL DEFAULT 0,
  `time_created` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `assets`
--

INSERT INTO `assets` (`id`, `user_id`, `igr_number`, `igr_date`, `asset_name`, `asset_type`, `asset_category`, `item_type`, `item_size`, `qty`, `parent_id`, `active_status`, `delete_status`, `time_created`) VALUES
(27, 3, 'IT-2022-06-01', '30-6-2022', 'SERVER', 1, 0, NULL, NULL, 0, NULL, 1, 0, '1664191588'),
(28, 3, 'IT-2022-06-01', '30-6-2022', 'RAM', 2, 19, '3', 4, 0, 27, 1, 0, '1664191588'),
(29, 3, 'IT-2022-06-01', '30-6-2022', 'ROM', 2, 20, 'HDD', 500, 0, 27, 1, 0, '1664191588'),
(30, 3, 'IT-2022-06-01', '30-6-2022', 'LED', 2, 4, NULL, 22, 0, NULL, 1, 0, '1664191672'),
(31, 3, 'IT-2022-06-01', '30-6-2022', 'LASERJET PRINTER', 2, 1, NULL, NULL, 0, NULL, 1, 0, '1664191729'),
(32, 3, 'IT-2022-06-01', '30-6-2022', 'TONOR', 2, 2, NULL, NULL, 0, 31, 1, 0, '1664191729'),
(33, 3, 'IT-2022-06-01', '30-6-2022', 'KEYBOARD', 2, 6, 'WIRED', NULL, 0, NULL, 1, 0, '1664193173'),
(34, 3, 'IT-2022-06-01', '30-6-2022', 'MOUSE', 2, 7, 'WIRED', NULL, 0, NULL, 1, 0, '1664193220'),
(35, 3, 'IT-2022-06-01', '30-6-2022', 'DESKTOP', 1, 0, NULL, NULL, 0, NULL, 1, 0, '1664193657'),
(36, 3, 'IT-2022-06-01', '30-6-2022', 'RAM', 2, 19, '3', 4, 0, 35, 1, 0, '1664193657'),
(37, 3, 'IT-2022-06-01', '30-6-2022', 'ROM', 2, 20, 'HDD', 500, 0, 35, 1, 0, '1664193657'),
(38, 3, 'IT-2022-06-01', '30-6-2022', 'LED', 2, 4, NULL, 19, 0, NULL, 1, 0, '1664193951'),
(39, 3, 'IT-2022-06-01', '30-6-2022', 'POWER CABLE', 2, 5, 'POWER', NULL, 0, NULL, 1, 0, '1664194042'),
(40, 3, 'IT-2022-06-01', '30-6-2022', 'SERVER', 1, 0, NULL, NULL, 0, NULL, 1, 0, '1664194337'),
(52, 3, 'IT-2022-06-01', '30-6-2022', 'SERVER', 1, 0, NULL, NULL, 0, NULL, 1, 0, '1664195201'),
(53, 3, 'IT-2022-06-01', '30-6-2022', 'RAM', 2, 19, '3', 8, 0, 52, 1, 0, '1664195201'),
(54, 3, 'IT-2022-06-01', '30-6-2022', 'ROM', 2, 20, 'HDD', 300, 0, 52, 1, 0, '1664195201'),
(55, 3, 'IT-2022-06-01', '30-6-2022', 'SERVER', 1, 0, NULL, NULL, 0, NULL, 1, 0, '1664195500'),
(56, 3, 'IT-2022-06-01', '30-6-2022', 'RAM', 2, 19, '3', 4, 0, 55, 1, 0, '1664195500'),
(57, 3, 'IT-2022-06-01', '30-6-2022', 'ROM', 2, 20, 'HDD', 300, 0, 55, 1, 0, '1664195500'),
(58, 3, 'IT-2022-06-01', '30-6-2022', 'DESKTOP', 1, 0, NULL, NULL, 0, NULL, 1, 0, '1664195859'),
(59, 3, 'IT-2022-06-01', '30-6-2022', 'RAM', 2, 19, '1', 2, 0, 58, 1, 0, '1664195859'),
(60, 3, 'IT-2022-06-01', '30-6-2022', 'ROM', 2, 20, 'HDD', 512, 0, 58, 1, 0, '1664195859'),
(61, 3, 'IT-2022-06-01', '30-6-2022', 'LED', 2, 4, NULL, 19, 0, NULL, 1, 0, '1664195956'),
(62, 3, 'IT-2022-06-01', '30-6-2022', 'DESKTOP', 1, 0, NULL, NULL, 0, NULL, 1, 0, '1664196146'),
(63, 3, 'IT-2022-06-01', '30-6-2022', 'RAM', 2, 19, '1', 4, 0, 62, 1, 0, '1664196146'),
(64, 3, 'IT-2022-06-01', '30-6-2022', 'ROM', 2, 20, 'HDD', 500, 0, 62, 1, 0, '1664196146'),
(65, 3, 'IT-2022-06-01', '30-6-2022', 'LED', 2, 4, NULL, 19, 0, NULL, 1, 0, '1664196230'),
(66, 3, 'IT-2022-06-01', '30-6-2022', 'DESKTOP', 1, 0, NULL, NULL, 0, NULL, 1, 0, '1664196438'),
(67, 3, 'IT-2022-06-01', '30-6-2022', 'RAM', 2, 19, '2', 2, 0, 66, 1, 0, '1664196438'),
(68, 3, 'IT-2022-06-01', '30-6-2022', 'ROM', 2, 20, 'HDD', 100, 0, 66, 1, 0, '1664196438'),
(69, 3, 'IT-2022-06-01', '30-6-2022', 'LED', 2, 4, NULL, 19, 0, NULL, 1, 0, '1664196492'),
(70, 3, 'IT-2022-06-01', '30-6-2022', 'DESKTOP', 1, 0, NULL, NULL, 0, NULL, 1, 0, '1664196656'),
(71, 3, 'IT-2022-06-01', '30-6-2022', 'RAM', 2, 19, '1', 1, 0, 70, 1, 0, '1664196656'),
(72, 3, 'IT-2022-06-01', '30-6-2022', 'ROM', 2, 20, 'HDD', 50, 0, 70, 1, 0, '1664196656'),
(73, 3, 'IT-2022-06-01', '30-6-2022', 'LED', 2, 4, NULL, 19, 0, NULL, 1, 0, '1664196709'),
(74, 3, 'IT-2022-06-01', '30-6-2022', 'LASERJET PRINTER', 2, 1, NULL, NULL, 0, NULL, 1, 0, '1664196748'),
(75, 3, 'IT-2022-06-01', '30-6-2022', 'TONOR', 2, 2, NULL, NULL, 0, 74, 1, 0, '1664196748'),
(76, 3, 'IT-2022-06-01', '30-6-2022', 'DESKTOP', 1, 0, NULL, NULL, 0, NULL, 1, 0, '1664196978'),
(77, 3, 'IT-2022-06-01', '30-6-2022', 'RAM', 2, 19, '2', 2, 0, 76, 1, 0, '1664196978'),
(78, 3, 'IT-2022-06-01', '30-6-2022', 'ROM', 2, 20, 'HDD', 100, 0, 76, 1, 0, '1664196978'),
(79, 3, 'IT-2022-06-01', '30-6-2022', 'LED', 2, 4, NULL, 19, 0, NULL, 1, 0, '1664197039'),
(80, 3, 'IT-2022-06-01', '30-6-2022', 'DESKTOP', 1, 0, NULL, NULL, 0, NULL, 1, 0, '1664197291'),
(81, 3, 'IT-2022-06-01', '30-6-2022', 'RAM', 2, 19, '1', 1, 0, 80, 1, 0, '1664197291'),
(82, 3, 'IT-2022-06-01', '30-6-2022', 'ROM', 2, 20, 'HDD', 150, 0, 80, 1, 0, '1664197291'),
(83, 3, 'IT-2022-06-01', '30-6-2022', 'LED', 2, 4, NULL, 19, 0, NULL, 1, 0, '1664197377'),
(84, 3, 'IT-2022-06-01', '30-6-2022', 'DESKTOP', 1, 0, NULL, NULL, 0, NULL, 1, 0, '1664197723'),
(85, 3, 'IT-2022-06-01', '30-6-2022', 'RAM', 2, 19, '3', 4, 0, 84, 1, 0, '1664197723'),
(86, 3, 'IT-2022-06-01', '30-6-2022', 'ROM', 2, 20, 'HDD', 300, 0, 84, 1, 0, '1664197723'),
(87, 3, 'IT-2022-06-01', '30-6-2022', 'LED', 2, 4, NULL, 17, 0, NULL, 1, 0, '1664197864'),
(88, 3, 'IT-2022-06-01', '30-6-2022', 'LASERJET PRINTER', 2, 1, NULL, NULL, 0, NULL, 1, 0, '1664197968'),
(89, 3, 'IT-2022-06-01', '30-6-2022', 'TONOR', 2, 2, NULL, NULL, 0, 88, 1, 0, '1664197968'),
(90, 3, 'IT-2022-06-01', '30-6-2022', 'DESKTOP', 1, 0, NULL, NULL, 0, NULL, 1, 0, '1664253667'),
(91, 3, 'IT-2022-06-01', '30-6-2022', 'RAM', 2, 19, '1', 1, 0, 90, 1, 0, '1664253667'),
(92, 3, 'IT-2022-06-01', '30-6-2022', 'ROM', 2, 20, 'HDD', 160, 0, 90, 1, 0, '1664253667'),
(93, 3, 'IT-2022-06-01', '30-6-2022', 'LED', 2, 4, NULL, 19, 0, NULL, 1, 0, '1664253726'),
(94, 3, 'IT-2022-06-01', '30-6-2022', 'LASERJET PRINTER', 2, 1, NULL, NULL, 0, NULL, 1, 0, '1664253760'),
(95, 3, 'IT-2022-06-01', '30-6-2022', 'TONOR', 2, 2, NULL, NULL, 0, 94, 1, 0, '1664253760'),
(96, 3, 'IT-2022-06-01', '30-6-2022', 'DESKTOP', 1, 0, NULL, NULL, 0, NULL, 1, 0, '1664254065'),
(97, 3, 'IT-2022-06-01', '30-6-2022', 'RAM', 2, 19, '2', 4, 0, 96, 1, 0, '1664254065'),
(98, 3, 'IT-2022-06-01', '30-6-2022', 'ROM', 2, 20, 'HDD', 50, 0, 96, 1, 0, '1664254065'),
(99, 3, 'IT-2022-06-01', '30-6-2022', 'LED', 2, 4, NULL, 19, 0, NULL, 1, 0, '1664254142'),
(100, 3, 'IT-2022-06-01', '30-6-2022', 'LASERJET PRINTER', 2, 1, NULL, NULL, 0, NULL, 1, 0, '1664254203'),
(101, 3, 'IT-2022-06-01', '30-6-2022', 'TONOR', 2, 2, NULL, NULL, 0, 100, 1, 0, '1664254203'),
(102, 3, 'IT-2022-06-01', '30-6-2022', 'DESKTOP', 1, 0, NULL, NULL, 0, NULL, 1, 0, '1664254880'),
(103, 3, 'IT-2022-06-01', '30-6-2022', 'RAM', 2, 19, '3', 4, 0, 102, 1, 0, '1664254880'),
(104, 3, 'IT-2022-06-01', '30-6-2022', 'ROM', 2, 20, 'HDD', 500, 0, 102, 1, 0, '1664254880'),
(105, 3, 'IT-2022-06-01', '30-6-2022', 'LED', 2, 4, NULL, 19, 0, NULL, 1, 0, '1664254923'),
(106, 3, 'IT-2022-06-01', '30-6-2022', 'DESKTOP', 1, 0, NULL, NULL, 0, NULL, 1, 0, '1664255048'),
(107, 3, 'IT-2022-06-01', '30-6-2022', 'RAM', 2, 19, '3', 4, 0, 106, 1, 0, '1664255048'),
(108, 3, 'IT-2022-06-01', '30-6-2022', 'ROM', 2, 20, 'HDD', 500, 0, 106, 1, 0, '1664255048'),
(109, 3, 'IT-2022-06-01', '30-6-2022', 'LED', 2, 4, NULL, 19, 0, NULL, 1, 0, '1664255836'),
(110, 3, 'IT-2022-06-01', '30-6-2022', 'DESKTOP', 1, 0, NULL, NULL, 0, NULL, 1, 0, '1664255967'),
(111, 3, 'IT-2022-06-01', '30-6-2022', 'RAM', 2, 19, '1', 1, 0, 110, 1, 0, '1664255967'),
(112, 3, 'IT-2022-06-01', '30-6-2022', 'ROM', 2, 20, 'HDD', 20, 0, 110, 1, 0, '1664255967'),
(113, 3, 'IT-2022-06-01', '30-6-2022', 'MONITER', 2, 4, NULL, 17, 0, NULL, 1, 0, '1664256021'),
(114, 3, 'IT-2022-06-01', '30-6-2022', 'DESKTOP', 1, 0, NULL, NULL, 0, NULL, 1, 0, '1664256150'),
(115, 3, 'IT-2022-06-01', '30-6-2022', 'RAM', 2, 19, '3', 4, 0, 114, 1, 0, '1664256150'),
(116, 3, 'IT-2022-06-01', '30-6-2022', 'ROM', 2, 20, 'HDD', 500, 0, 114, 1, 0, '1664256150'),
(117, 3, 'IT-2022-06-01', '30-6-2022', 'LED', 2, 4, NULL, 19, 0, NULL, 1, 0, '1664256191'),
(118, 3, 'IT-2022-06-01', '30-6-2022', 'LASERJET PRINTER', 2, 1, NULL, NULL, 0, NULL, 1, 0, '1664256243'),
(119, 3, 'IT-2022-06-01', '30-6-2022', 'TONOR', 2, 2, NULL, NULL, 0, 118, 1, 0, '1664256243'),
(120, 3, 'IT-2022-06-01', '30-6-2022', 'DESKTOP', 1, 0, NULL, NULL, 0, NULL, 1, 0, '1664256486'),
(121, 3, 'IT-2022-06-01', '30-6-2022', 'RAM', 2, 19, '2', 2, 0, 120, 1, 0, '1664256486'),
(122, 3, 'IT-2022-06-01', '30-6-2022', 'ROM', 2, 20, 'HDD', 150, 0, 120, 1, 0, '1664256486'),
(123, 3, 'IT-2022-06-01', '30-6-2022', 'LED', 2, 4, NULL, 19, 0, NULL, 1, 0, '1664256545'),
(124, 3, 'IT-2022-06-01', '30-6-2022', 'DESKTOP', 1, 0, NULL, NULL, 0, NULL, 1, 0, '1664256742'),
(125, 3, 'IT-2022-06-01', '30-6-2022', 'RAM', 2, 19, '3', 4, 0, 124, 1, 0, '1664256742'),
(126, 3, 'IT-2022-06-01', '30-6-2022', 'ROM', 2, 20, 'HDD', 500, 0, 124, 1, 0, '1664256742'),
(127, 3, 'IT-2022-06-01', '30-6-2022', 'LED', 2, 4, NULL, 19, 0, NULL, 1, 0, '1664256914'),
(128, 3, 'IT-2022-06-01', '30-6-2022', 'DESKTOP', 1, 0, NULL, NULL, 0, NULL, 1, 0, '1664257104'),
(129, 3, 'IT-2022-06-01', '30-6-2022', 'RAM', 2, 19, '2', 2, 0, 128, 1, 0, '1664257104'),
(130, 3, 'IT-2022-06-01', '30-6-2022', 'ROM', 2, 20, 'HDD', 150, 0, 128, 1, 0, '1664257104'),
(131, 3, 'IT-2022-06-01', '30-6-2022', 'LED', 2, 4, NULL, 19, 0, NULL, 1, 0, '1664257135'),
(132, 3, 'IT-2022-06-01', '30-6-2022', 'LASERJET PRINTER', 2, 1, NULL, NULL, 0, NULL, 1, 0, '1664257197'),
(133, 3, 'IT-2022-06-01', '30-6-2022', 'TONOR', 2, 2, NULL, NULL, 0, 132, 1, 0, '1664257197'),
(134, 3, 'IT-2022-06-01', '30-6-2022', 'DESKTOP', 1, 0, NULL, NULL, 0, NULL, 1, 0, '1664257435'),
(135, 3, 'IT-2022-06-01', '30-6-2022', 'RAM', 2, 19, '3', 4, 0, 134, 1, 0, '1664257435'),
(136, 3, 'IT-2022-06-01', '30-6-2022', 'ROM', 2, 20, 'HDD', 500, 0, 134, 1, 0, '1664257435'),
(137, 3, 'IT-2022-06-01', '30-6-2022', 'LED', 2, 4, NULL, 19, 0, NULL, 1, 0, '1664257472'),
(138, 3, 'IT-2022-06-01', '30-6-2022', 'LASERJET PRINTER', 2, 1, NULL, NULL, 0, NULL, 1, 0, '1664257515'),
(139, 3, 'IT-2022-06-01', '30-6-2022', 'TONOR', 2, 2, NULL, NULL, 0, 138, 1, 0, '1664257515'),
(140, 3, 'IT-2022-06-01', '30-6-2022', 'DESKTOP', 1, 0, NULL, NULL, 0, NULL, 1, 0, '1664257660'),
(141, 3, 'IT-2022-06-01', '30-6-2022', 'RAM', 2, 19, '1', 2, 0, 140, 1, 0, '1664257660'),
(142, 3, 'IT-2022-06-01', '30-6-2022', 'ROM', 2, 20, 'HDD', 80, 0, 140, 1, 0, '1664257660'),
(143, 3, 'IT-2022-06-01', '30-6-2022', 'LED', 2, 4, NULL, 19, 0, NULL, 1, 0, '1664257690'),
(144, 3, 'IT-2022-06-01', '30-6-2022', 'DESKTOP', 1, 0, NULL, NULL, 0, NULL, 1, 0, '1664258341'),
(145, 3, 'IT-2022-06-01', '30-6-2022', 'RAM', 2, 19, '2', 2, 0, 144, 1, 0, '1664258341'),
(146, 3, 'IT-2022-06-01', '30-6-2022', 'ROM', 2, 20, 'HDD', 200, 0, 144, 1, 0, '1664258341'),
(147, 3, 'IT-2022-06-01', '30-6-2022', 'LED', 2, 4, NULL, 19, 0, NULL, 1, 0, '1664258366'),
(148, 3, 'IT-2022-06-01', '30-6-2022', 'LASERJET PRINTER', 2, 1, NULL, NULL, 0, NULL, 1, 0, '1664258392'),
(149, 3, 'IT-2022-06-01', '30-6-2022', 'TONOR', 2, 2, NULL, NULL, 0, 148, 1, 0, '1664258392'),
(150, 3, 'IT-2022-06-01', '30-6-2022', 'DESKTOP', 1, 0, NULL, NULL, 0, NULL, 1, 0, '1664258593'),
(151, 3, 'IT-2022-06-01', '30-6-2022', 'RAM', 2, 19, '1', 2, 0, 150, 1, 0, '1664258593'),
(152, 3, 'IT-2022-06-01', '30-6-2022', 'ROM', 2, 20, 'HDD', 50, 0, 150, 1, 0, '1664258593'),
(153, 3, 'IT-2022-06-01', '30-6-2022', 'LED', 2, 4, NULL, 19, 0, NULL, 1, 0, '1664258635'),
(154, 3, 'IT-2022-06-01', '30-6-2022', 'DESKTOP', 1, 0, NULL, NULL, 0, NULL, 1, 0, '1664258861'),
(155, 3, 'IT-2022-06-01', '30-6-2022', 'RAM', 2, 19, '3', 4, 0, 154, 1, 0, '1664258861'),
(156, 3, 'IT-2022-06-01', '30-6-2022', 'ROM', 2, 20, 'HDD', 500, 0, 154, 1, 0, '1664258861'),
(157, 3, 'IT-2022-06-01', '30-6-2022', 'LED', 2, 4, NULL, 19, 0, NULL, 1, 0, '1664258892'),
(158, 3, 'IT-2022-06-01', '30-6-2022', 'LASERJET PRINTER', 2, 1, NULL, NULL, 0, NULL, 1, 0, '1664258935'),
(159, 3, 'IT-2022-06-01', '30-6-2022', 'TONOR', 2, 2, NULL, NULL, 0, 158, 1, 0, '1664258935'),
(160, 3, 'IT-2022-06-01', '30-6-2022', 'DESKTOP', 1, 0, NULL, NULL, 0, NULL, 1, 0, '1664259338'),
(161, 3, 'IT-2022-06-01', '30-6-2022', 'RAM', 2, 19, '1', 2, 0, 160, 1, 0, '1664259338'),
(162, 3, 'IT-2022-06-01', '30-6-2022', 'ROM', 2, 20, 'HDD', 150, 0, 160, 1, 0, '1664259338'),
(163, 3, 'IT-2022-06-01', '30-6-2022', 'LED', 2, 4, NULL, 19, 0, NULL, 1, 0, '1664259368'),
(164, 3, 'IT-2022-06-01', '30-6-2022', 'LASERJET PRINTER', 2, 1, NULL, NULL, 0, NULL, 1, 0, '1664259403'),
(165, 3, 'IT-2022-06-01', '30-6-2022', 'TONOR', 2, 2, NULL, NULL, 0, 164, 1, 0, '1664259403'),
(166, 3, 'IT-2022-06-01', '30-6-2022', 'DESKTOP', 1, 0, NULL, NULL, 0, NULL, 1, 0, '1664259512'),
(167, 3, 'IT-2022-06-01', '30-6-2022', 'RAM', 2, 19, '1', 3, 0, 166, 1, 0, '1664259512'),
(168, 3, 'IT-2022-06-01', '30-6-2022', 'ROM', 2, 20, 'HDD', 50, 0, 166, 1, 0, '1664259512'),
(169, 3, 'IT-2022-06-01', '30-6-2022', 'LED', 2, 4, NULL, 19, 0, NULL, 1, 0, '1664259575'),
(170, 3, 'IT-2022-06-01', '30-6-2022', 'DESKTOP', 1, 0, NULL, NULL, 0, NULL, 1, 0, '1664259743'),
(171, 3, 'IT-2022-06-01', '30-6-2022', 'RAM', 2, 19, '2', 2, 0, 170, 1, 0, '1664259743'),
(172, 3, 'IT-2022-06-01', '30-6-2022', 'ROM', 2, 20, 'HDD', 200, 0, 170, 1, 0, '1664259743'),
(173, 3, 'IT-2022-06-01', '30-6-2022', 'LED', 2, 4, NULL, 19, 0, NULL, 1, 0, '1664259766'),
(174, 3, 'IT-2022-06-01', '30-6-2022', 'LASERJET PRINTER', 2, 1, NULL, NULL, 0, NULL, 1, 0, '1664259792'),
(175, 3, 'IT-2022-06-01', '30-6-2022', 'TONOR', 2, 2, NULL, NULL, 0, 174, 1, 0, '1664259792'),
(176, 3, 'IT-2022-06-01', '30-6-2022', 'DESKTOP', 1, 0, NULL, NULL, 0, NULL, 1, 0, '1664259906'),
(177, 3, 'IT-2022-06-01', '30-6-2022', 'RAM', 2, 19, '2', 4, 0, 176, 1, 0, '1664259906'),
(178, 3, 'IT-2022-06-01', '30-6-2022', 'ROM', 2, 20, 'HDD', 150, 0, 176, 1, 0, '1664259906'),
(179, 3, 'IT-2022-06-01', '30-6-2022', 'LED', 2, 4, NULL, 19, 0, NULL, 1, 0, '1664260086'),
(222, 3, 'IT-2022-06-01', '30-6-2022', 'DESKTOP', 1, 0, NULL, NULL, 0, NULL, 1, 0, '1664279357'),
(223, 3, 'IT-2022-06-01', '30-6-2022', 'RAM', 2, 19, '1', 2, 0, 222, 1, 0, '1664279357'),
(224, 3, 'IT-2022-06-01', '30-6-2022', 'ROM', 2, 20, 'HDD', 70, 0, 222, 1, 0, '1664279357'),
(225, 3, 'IT-2022-06-01', '30-6-2022', 'MONITER', 2, 4, NULL, 19, 0, NULL, 1, 0, '1664279393'),
(226, 3, 'IT-2022-06-01', '30-6-2022', 'DESKTOP', 1, 0, NULL, NULL, 0, NULL, 1, 0, '1664279494'),
(227, 3, 'IT-2022-06-01', '30-6-2022', 'RAM', 2, 19, '2', 2, 0, 226, 1, 0, '1664279494'),
(228, 3, 'IT-2022-06-01', '30-6-2022', 'ROM', 2, 20, 'HDD', 150, 0, 226, 1, 0, '1664279494'),
(229, 3, 'IT-2022-06-01', '30-6-2022', 'MONITER', 2, 4, NULL, 19, 0, NULL, 1, 0, '1664279532'),
(230, 3, 'IT-2022-06-01', '30-6-2022', 'LASERJET PRINTER', 2, 1, NULL, NULL, 0, NULL, 1, 0, '1664279555'),
(231, 3, 'IT-2022-06-01', '30-6-2022', 'TONOR', 2, 2, NULL, NULL, 0, 230, 1, 0, '1664279555'),
(232, 3, 'IT-2022-06-01', '30-6-2022', 'DESKTOP', 1, 0, NULL, NULL, 0, NULL, 1, 0, '1664279661'),
(233, 3, 'IT-2022-06-01', '30-6-2022', 'RAM', 2, 19, '2', 2, 0, 232, 1, 0, '1664279661'),
(234, 3, 'IT-2022-06-01', '30-6-2022', 'ROM', 2, 20, 'HDD', 160, 0, 232, 1, 0, '1664279661'),
(235, 3, 'IT-2022-06-01', '30-6-2022', 'MONITER', 2, 4, NULL, 17, 0, NULL, 1, 0, '1664279690'),
(236, 3, 'IT-2022-06-01', '30-6-2022', 'LASERJET PRINTER', 2, 1, NULL, NULL, 0, NULL, 1, 0, '1664279721'),
(237, 3, 'IT-2022-06-01', '30-6-2022', 'TONOR', 2, 2, NULL, NULL, 0, 236, 1, 0, '1664279721'),
(238, 3, 'IT-2022-06-01', '30-6-2022', 'DESKTOP', 1, 0, NULL, NULL, 0, NULL, 1, 0, '1664279823'),
(239, 3, 'IT-2022-06-01', '30-6-2022', 'RAM', 2, 19, '2', 1, 0, 238, 1, 0, '1664279823'),
(240, 3, 'IT-2022-06-01', '30-6-2022', 'ROM', 2, 20, 'HDD', 80, 0, 238, 1, 0, '1664279823'),
(241, 3, 'IT-2022-06-01', '30-6-2022', 'MONITER', 2, 4, NULL, 19, 0, NULL, 1, 0, '1664279862'),
(242, 3, 'IT-2022-06-01', '30-6-2022', 'LASERJET PRINTER', 2, 1, NULL, NULL, 0, NULL, 1, 0, '1664279894'),
(243, 3, 'IT-2022-06-01', '30-6-2022', 'TONOR', 2, 2, NULL, NULL, 0, 242, 1, 0, '1664279894'),
(244, 3, 'IT-2022-06-01', '30-6-2022', 'DESKTOP', 1, 0, NULL, NULL, 0, NULL, 1, 0, '1664280005'),
(245, 3, 'IT-2022-06-01', '30-6-2022', 'RAM', 2, 19, '2', 2, 0, 244, 1, 0, '1664280005'),
(246, 3, 'IT-2022-06-01', '30-6-2022', 'ROM', 2, 20, 'HDD', 150, 0, 244, 1, 0, '1664280005'),
(247, 3, 'IT-2022-06-01', '30-6-2022', 'LED', 2, 4, NULL, 19, 0, NULL, 1, 0, '1664280052'),
(248, 3, 'IT-2022-06-01', '30-6-2022', 'DESKTOP', 1, 0, NULL, NULL, 0, NULL, 1, 0, '1664280324'),
(249, 3, 'IT-2022-06-01', '30-6-2022', 'RAM', 2, 19, '1', 1, 0, 248, 1, 0, '1664280324'),
(250, 3, 'IT-2022-06-01', '30-6-2022', 'ROM', 2, 20, 'HDD', 150, 0, 248, 1, 0, '1664280324'),
(251, 3, 'IT-2022-06-01', '30-6-2022', 'MONITER', 2, 4, NULL, 19, 0, NULL, 1, 0, '1664280380'),
(252, 3, 'IT-2022-06-01', '30-6-2022', 'LASERJET PRINTER', 2, 1, NULL, NULL, 0, NULL, 1, 0, '1664280403'),
(253, 3, 'IT-2022-06-01', '30-6-2022', 'TONOR', 2, 2, NULL, NULL, 0, 252, 1, 0, '1664280403'),
(254, 4, 'IT-2022-06-01', '30-6-2022', 'DESKTOP', 1, 0, NULL, NULL, 0, NULL, 1, 0, '1664536466'),
(255, 4, 'IT-2022-06-01', '30-6-2022', 'RAM', 2, 19, '2', 2, 0, 254, 1, 0, '1664536466'),
(256, 4, 'IT-2022-06-01', '30-6-2022', 'ROM', 2, 20, 'HDD', 150, 0, 254, 1, 0, '1664536466'),
(257, 4, 'IT-2022-06-01', '30-6-2022', 'CABLE', 2, 5, 'VGA', NULL, 0, NULL, 1, 0, '1664536466'),
(258, 4, 'IT-2022-06-01', '30-6-2022', 'CABLE', 2, 5, 'POWER', NULL, 0, NULL, 1, 0, '1664536466'),
(259, 4, 'IT-2022-06-01', '30-6-2022', 'MONITOR', 2, 4, NULL, 17, 0, NULL, 1, 0, '1664536466'),
(260, 4, 'IT-2022-06-01', '30-6-2022', 'KEYBOARD', 2, 6, 'Wired', NULL, 0, NULL, 1, 0, '1664536466'),
(261, 4, 'IT-2022-06-01', '30-6-2022', 'MOUSE', 2, 7, 'Wired', NULL, 0, NULL, 1, 0, '1664536466'),
(262, 4, 'IT-2022-06-01', '30-6-2022', 'DESKTOP', 1, 0, NULL, NULL, 0, NULL, 1, 0, '1664539140'),
(263, 4, 'IT-2022-06-01', '30-6-2022', 'RAM', 2, 19, '2', 1, 0, 262, 1, 0, '1664539140'),
(264, 4, 'IT-2022-06-01', '30-6-2022', 'ROM', 2, 20, 'HDD', 120, 0, 262, 1, 0, '1664539140'),
(265, 4, 'IT-2022-06-01', '30-6-2022', 'CABLE', 2, 5, 'VGA', NULL, 0, NULL, 1, 0, '1664539140'),
(266, 4, 'IT-2022-06-01', '30-6-2022', 'CABLE', 2, 5, 'POWER', NULL, 0, NULL, 1, 0, '1664539140'),
(267, 4, 'IT-2022-06-01', '30-6-2022', 'LED', 2, 4, NULL, 19, 0, NULL, 1, 0, '1664539140'),
(268, 4, 'IT-2022-06-01', '30-6-2022', 'Keyboard', 2, 6, 'Wired', NULL, 0, NULL, 1, 0, '1664539140'),
(269, 4, 'IT-2022-06-01', '30-6-2022', 'MOUSE', 2, 7, 'Wired', NULL, 0, NULL, 1, 0, '1664539140'),
(270, 4, 'IT-2022-06-01', '30-6-2022', 'LASERJET PRINTER', 2, 1, NULL, NULL, 0, NULL, 1, 0, '1664539281'),
(271, 4, 'IT-2022-06-01', '30-6-2022', 'TONOR', 2, 2, NULL, NULL, 0, 270, 1, 0, '1664539281'),
(272, 4, 'IT-2022-06-01', '30-6-2022', 'CABLE', 2, 5, 'PRINTER', NULL, 0, NULL, 1, 0, '1664539281'),
(273, 4, 'IT-2022-06-01', '30-6-2022', 'CABLE', 2, 5, 'POWER', NULL, 0, NULL, 1, 0, '1664539281'),
(274, 4, 'NRTC-2022-01', '30-6-2022', 'DESKTOP', 1, 0, NULL, NULL, 1, NULL, 1, 0, '1664540916'),
(275, 4, 'NRTC-2022-01', '30-6-2022', 'RAM', 2, 19, '3', 2, 1, 274, 1, 0, '1664540916'),
(276, 4, 'NRTC-2022-01', '30-6-2022', 'ROM', 2, 20, 'HDD', 500, 1, 274, 1, 0, '1664540916'),
(277, 4, 'NRTC-2022-01', '30-6-2022', 'DESKTOP', 1, 0, NULL, NULL, 1, NULL, 1, 0, '1664541087'),
(278, 4, 'NRTC-2022-01', '30-6-2022', 'RAM', 2, 19, '3', 2, 1, 277, 1, 0, '1664541087'),
(279, 4, 'NRTC-2022-01', '30-6-2022', 'ROM', 2, 20, 'HDD', 500, 1, 277, 1, 0, '1664541087'),
(280, 4, 'NRTC-2022-01', '30-6-2022', 'DESKTOP', 1, 0, NULL, NULL, 1, NULL, 1, 0, '1664541308'),
(281, 4, 'NRTC-2022-01', '30-6-2022', 'RAM', 2, 19, '3', 2, 1, 280, 1, 0, '1664541308'),
(282, 4, 'NRTC-2022-01', '30-6-2022', 'ROM', 2, 20, 'HDD', 500, 1, 280, 1, 0, '1664541308'),
(283, 4, 'NRTC-2022-01', '30-6-2022', 'DESKTOP', 1, 0, NULL, NULL, 1, NULL, 1, 0, '1664542069'),
(284, 4, 'NRTC-2022-01', '30-6-2022', 'RAM', 2, 19, '3', 2, 1, 283, 1, 0, '1664542069'),
(285, 4, 'NRTC-2022-01', '30-6-2022', 'ROM', 2, 20, 'HDD', 500, 1, 283, 1, 0, '1664542069'),
(286, 4, 'NRTC-2022-01', '30-6-2022', 'DESKTOP', 1, 0, NULL, NULL, 1, NULL, 1, 0, '1664542158'),
(287, 4, 'NRTC-2022-01', '30-6-2022', 'RAM', 2, 19, '3', 2, 1, 286, 1, 0, '1664542158'),
(288, 4, 'NRTC-2022-01', '30-6-2022', 'ROM', 2, 20, 'HDD', 500, 1, 286, 1, 0, '1664542158'),
(289, 4, 'NRTC-2022-01', '30-6-2022', 'DESKTOP', 1, 0, NULL, NULL, 1, NULL, 1, 0, '1664542235'),
(290, 4, 'NRTC-2022-01', '30-6-2022', 'RAM', 2, 19, '3', 4, 1, 289, 1, 0, '1664542235'),
(291, 4, 'NRTC-2022-01', '30-6-2022', 'ROM', 2, 20, 'HDD', 500, 1, 289, 1, 0, '1664542235'),
(292, 4, 'NRTC-2022-02', '2-9-2022', 'DESKTOP', 1, 0, NULL, NULL, 1, NULL, 1, 0, '1664543675'),
(293, 4, 'NRTC-2022-02', '2-9-2022', 'RAM', 2, 19, '3', 2, 1, 292, 1, 0, '1664543675'),
(294, 4, 'NRTC-2022-02', '2-9-2022', 'ROM', 2, 20, 'HDD', 500, 1, 292, 1, 0, '1664543675'),
(295, 4, 'NRTC-2022-02', '2-9-2022', 'DESKTOP', 1, 0, NULL, NULL, 1, NULL, 1, 0, '1664543751'),
(296, 4, 'NRTC-2022-02', '2-9-2022', 'RAM', 2, 19, '3', 2, 1, 295, 1, 0, '1664543751'),
(297, 4, 'NRTC-2022-02', '2-9-2022', 'ROM', 2, 20, 'HDD', 500, 1, 295, 1, 0, '1664543751'),
(298, 4, 'NRTC-2022-02', '2-9-2022', 'DESKTOP', 1, 0, NULL, NULL, 1, NULL, 1, 0, '1664543820'),
(299, 4, 'NRTC-2022-02', '2-9-2022', 'RAM', 2, 19, '3', 2, 1, 298, 1, 0, '1664543820'),
(300, 4, 'NRTC-2022-02', '2-9-2022', 'ROM', 2, 20, 'HDD', 500, 1, 298, 1, 0, '1664543820'),
(301, 4, 'NRTC-2022-02', '2-9-2022', 'DESKTOP', 1, 0, NULL, NULL, 1, NULL, 1, 0, '1664543918'),
(302, 4, 'NRTC-2022-02', '2-9-2022', 'RAM', 2, 19, '3', 2, 1, 301, 1, 0, '1664543918'),
(303, 4, 'NRTC-2022-02', '2-9-2022', 'ROM', 2, 20, 'HDD', 500, 1, 301, 1, 0, '1664543918');

-- --------------------------------------------------------

--
-- Table structure for table `asset_meta`
--

CREATE TABLE `asset_meta` (
  `id` int(11) NOT NULL,
  `asset_id` int(11) NOT NULL,
  `meta_key` varchar(225) NOT NULL,
  `meta_value` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `asset_meta`
--

INSERT INTO `asset_meta` (`id`, `asset_id`, `meta_key`, `meta_value`) VALUES
(52, 27, 'brand_name', 'DELL'),
(53, 27, 'serial_number', 'T16504FR1G25'),
(54, 27, 'model_number', 'DEFAULT'),
(55, 27, 'processor_detail', 'XEON'),
(56, 27, 'power_supply', '1'),
(57, 30, 'brand_name', 'SAMSUNG'),
(58, 30, 'serial_number', '04J4HCLHA01559Y'),
(59, 30, 'model_number', 'DEFAULT'),
(60, 31, 'brand_name', 'HP'),
(61, 31, 'serial_number', 'DEFAULT'),
(62, 31, 'model_number', 'HP LASERJET1320'),
(63, 32, 'brand_name', 'HP'),
(64, 32, 'serial_number', 'DEFAULT'),
(65, 32, 'model_number', 'HP LASERJET1320'),
(66, 33, 'brand_name', 'DEFAULT'),
(67, 33, 'serial_number', 'DEFAULT'),
(68, 33, 'model_number', 'DEFAULT'),
(69, 34, 'brand_name', 'DEFAULT'),
(70, 34, 'serial_number', 'DEFAULT'),
(71, 34, 'model_number', 'DEFAULT'),
(72, 35, 'brand_name', 'DELL'),
(73, 35, 'serial_number', '62LZF25'),
(74, 35, 'model_number', '3010'),
(75, 35, 'processor_detail', 'CORE I5'),
(76, 35, 'power_supply', '1'),
(77, 38, 'brand_name', 'DELL'),
(78, 38, 'serial_number', 'CN-07.....CPGM'),
(79, 38, 'model_number', 'DEFAULT'),
(80, 40, 'brand_name', 'DELL'),
(81, 40, 'serial_number', 'JG00271'),
(82, 40, 'model_number', '710  '),
(83, 40, 'processor_detail', 'XEON'),
(84, 40, 'power_supply', '2'),
(100, 52, 'brand_name', 'DELL'),
(101, 52, 'serial_number', 'JG00271'),
(102, 52, 'model_number', '710'),
(103, 52, 'processor_detail', 'XEON'),
(104, 52, 'power_supply', '2'),
(105, 55, 'brand_name', 'DELL'),
(106, 55, 'serial_number', 'T420-JG00271'),
(107, 55, 'model_number', '710'),
(108, 55, 'processor_detail', 'XEON'),
(109, 55, 'power_supply', '2'),
(110, 58, 'brand_name', 'DELL'),
(111, 58, 'serial_number', 'TH-O4N-B921'),
(112, 58, 'model_number', 'DEFAULT'),
(113, 58, 'processor_detail', 'PENTIUM 4'),
(114, 58, 'power_supply', '1'),
(115, 61, 'brand_name', 'IBM'),
(116, 61, 'serial_number', '66-BFDF7'),
(117, 61, 'model_number', 'DEFAULT'),
(118, 62, 'brand_name', 'IBM'),
(119, 62, 'serial_number', 'DEFAULT'),
(120, 62, 'model_number', 'DEFAULT'),
(121, 62, 'processor_detail', 'PENTIUM 4'),
(122, 62, 'power_supply', '1'),
(123, 65, 'brand_name', 'IBM'),
(124, 65, 'serial_number', '66-BGNKO'),
(125, 65, 'model_number', 'DEFAULT'),
(126, 66, 'brand_name', 'DELL'),
(127, 66, 'serial_number', '0014-6293'),
(128, 66, 'model_number', 'DEFAULT'),
(129, 66, 'processor_detail', 'CORE 2DUO'),
(130, 66, 'power_supply', '1'),
(131, 69, 'brand_name', 'DELL'),
(132, 69, 'serial_number', 'CN-04-CKCM'),
(133, 69, 'model_number', 'DEFAULT'),
(134, 70, 'brand_name', 'DELL'),
(135, 70, 'serial_number', '0004-4254'),
(136, 70, 'model_number', 'DEFAULT'),
(137, 70, 'processor_detail', 'PENTIUM 4'),
(138, 70, 'power_supply', '1'),
(139, 73, 'brand_name', 'IBM'),
(140, 73, 'serial_number', '1S49-0388'),
(141, 73, 'model_number', 'DEFAULT'),
(142, 74, 'brand_name', 'HP'),
(143, 74, 'serial_number', 'DEFAULT'),
(144, 74, 'model_number', 'LASERJET 1200'),
(145, 75, 'brand_name', 'HP'),
(146, 75, 'serial_number', 'DEFAULT'),
(147, 75, 'model_number', 'LASERJET 1200'),
(148, 76, 'brand_name', 'DELL'),
(149, 76, 'serial_number', 'DMOCLN1'),
(150, 76, 'model_number', 'DEFAULT'),
(151, 76, 'processor_detail', 'CORE 2 DUO'),
(152, 76, 'power_supply', '1'),
(153, 79, 'brand_name', 'DELL'),
(154, 79, 'serial_number', 'CN-04-CKKM'),
(155, 79, 'model_number', 'DEFAULT'),
(156, 80, 'brand_name', 'DELL'),
(157, 80, 'serial_number', '0004-3378'),
(158, 80, 'model_number', 'DEFAULT'),
(159, 80, 'processor_detail', 'PENTIUM 4'),
(160, 80, 'power_supply', '1'),
(161, 83, 'brand_name', 'HP'),
(162, 83, 'serial_number', 'CNK8-OLV9'),
(163, 83, 'model_number', 'DEFAULT'),
(164, 84, 'brand_name', 'DELL'),
(165, 84, 'serial_number', '221ZF25'),
(166, 84, 'model_number', 'DEFAULT'),
(167, 84, 'processor_detail', 'CORE I5'),
(168, 84, 'power_supply', '1'),
(169, 87, 'brand_name', 'DELL'),
(170, 87, 'serial_number', 'CNOR-3HGS'),
(171, 87, 'model_number', 'DEFAULT'),
(172, 88, 'brand_name', 'HP '),
(173, 88, 'serial_number', 'DEFAULT'),
(174, 88, 'model_number', ' LASERJET P2015'),
(175, 89, 'brand_name', 'HP '),
(176, 89, 'serial_number', 'DEFAULT'),
(177, 89, 'model_number', ' LASERJET P2015'),
(178, 90, 'brand_name', 'DEFAULT'),
(179, 90, 'serial_number', 'DEFAULT'),
(180, 90, 'model_number', 'P 4'),
(181, 90, 'processor_detail', 'PENTIUM 4'),
(182, 90, 'power_supply', '1'),
(183, 93, 'brand_name', 'PHILIPS'),
(184, 93, 'serial_number', 'CXOO-4151'),
(185, 93, 'model_number', 'DEFAULT'),
(186, 94, 'brand_name', 'HP'),
(187, 94, 'serial_number', 'DEFAULT'),
(188, 94, 'model_number', 'HP LASERJET 1300'),
(189, 95, 'brand_name', 'HP'),
(190, 95, 'serial_number', 'DEFAULT'),
(191, 95, 'model_number', 'HP LASERJET 1300'),
(192, 96, 'brand_name', 'DELL'),
(193, 96, 'serial_number', 'CNW73M1'),
(194, 96, 'model_number', 'DEFAULT'),
(195, 96, 'processor_detail', 'CORE 2 DUO'),
(196, 96, 'power_supply', '1'),
(197, 99, 'brand_name', 'HP'),
(198, 99, 'serial_number', 'CNC8-OOSR'),
(199, 99, 'model_number', 'DEFAULT'),
(200, 100, 'brand_name', 'HP'),
(201, 100, 'serial_number', 'DEFAULT'),
(202, 100, 'model_number', 'HP LASERJET 1320'),
(203, 101, 'brand_name', 'HP'),
(204, 101, 'serial_number', 'DEFAULT'),
(205, 101, 'model_number', 'HP LASERJET 1320'),
(206, 102, 'brand_name', 'DELL'),
(207, 102, 'serial_number', '11LZF208'),
(208, 102, 'model_number', 'DEFAULT'),
(209, 102, 'processor_detail', 'CORE I5'),
(210, 102, 'power_supply', '1'),
(211, 105, 'brand_name', 'DELL'),
(212, 105, 'serial_number', 'CNOM-A833'),
(213, 105, 'model_number', 'DEFAULT'),
(214, 106, 'brand_name', 'DELL'),
(215, 106, 'serial_number', '7845-ABCF'),
(216, 106, 'model_number', 'DEFAULT'),
(217, 106, 'processor_detail', 'CORE I5'),
(218, 106, 'power_supply', '1'),
(219, 109, 'brand_name', 'DELL'),
(220, 109, 'serial_number', 'CNO4-CFLM'),
(221, 109, 'model_number', 'DEFAULT'),
(222, 110, 'brand_name', 'INTEL INSIDE'),
(223, 110, 'serial_number', 'DEFAULT'),
(224, 110, 'model_number', 'P 4'),
(225, 110, 'processor_detail', 'PENTIUM 4'),
(226, 110, 'power_supply', '1'),
(227, 113, 'brand_name', 'IBM'),
(228, 113, 'serial_number', '66BJ-TK7'),
(229, 113, 'model_number', 'DEFAULT'),
(230, 114, 'brand_name', 'DELL'),
(231, 114, 'serial_number', '7845-C8E9'),
(232, 114, 'model_number', 'DEFAULT'),
(233, 114, 'processor_detail', 'CORE I5'),
(234, 114, 'power_supply', '1'),
(235, 117, 'brand_name', 'DELL'),
(236, 117, 'serial_number', 'CN07-CC2M'),
(237, 117, 'model_number', 'DEFAULT'),
(238, 118, 'brand_name', 'HP'),
(239, 118, 'serial_number', 'DEFAULT'),
(240, 118, 'model_number', 'HP LASERJET 3015'),
(241, 119, 'brand_name', 'HP'),
(242, 119, 'serial_number', 'DEFAULT'),
(243, 119, 'model_number', 'HP LASERJET 3015'),
(244, 120, 'brand_name', 'DELL'),
(245, 120, 'serial_number', '7T82325'),
(246, 120, 'model_number', 'DEFAULT'),
(247, 120, 'processor_detail', 'CORE 2 DUO'),
(248, 120, 'power_supply', '1 '),
(249, 123, 'brand_name', 'VIEW SONIC'),
(250, 123, 'serial_number', 'PSXO-C738'),
(251, 123, 'model_number', 'DEFAULT'),
(252, 124, 'brand_name', 'DELL'),
(253, 124, 'serial_number', '7845CDSF'),
(254, 124, 'model_number', 'DEFAULT'),
(255, 124, 'processor_detail', 'CORE I5'),
(256, 124, 'power_supply', '1'),
(257, 127, 'brand_name', 'IBM'),
(258, 127, 'serial_number', '66BFFN3'),
(259, 127, 'model_number', 'DEFAULT'),
(260, 128, 'brand_name', 'DELL'),
(261, 128, 'serial_number', 'JNW132S'),
(262, 128, 'model_number', 'DEFAULT'),
(263, 128, 'processor_detail', 'CORE 2 DUO'),
(264, 128, 'power_supply', '1'),
(265, 131, 'brand_name', 'DELL'),
(266, 131, 'serial_number', 'CNO4-CK9M'),
(267, 131, 'model_number', 'DEFAULT'),
(268, 132, 'brand_name', 'HP'),
(269, 132, 'serial_number', 'DEFAULT'),
(270, 132, 'model_number', 'HP LASERJET 1320'),
(271, 133, 'brand_name', 'HP'),
(272, 133, 'serial_number', 'DEFAULT'),
(273, 133, 'model_number', 'HP LASERJET 1320'),
(274, 134, 'brand_name', 'DELL'),
(275, 134, 'serial_number', '7845AB3C'),
(276, 134, 'model_number', 'DEFAULT'),
(277, 134, 'processor_detail', 'CORE I5'),
(278, 134, 'power_supply', '1'),
(279, 137, 'brand_name', 'DELL'),
(280, 137, 'serial_number', 'CN09-OFFP'),
(281, 137, 'model_number', 'DEFAULT'),
(282, 138, 'brand_name', 'HP'),
(283, 138, 'serial_number', 'DEFAULT'),
(284, 138, 'model_number', 'HP LASERJET 400'),
(285, 139, 'brand_name', 'HP'),
(286, 139, 'serial_number', 'DEFAULT'),
(287, 139, 'model_number', 'HP LASERJET 400'),
(288, 140, 'brand_name', 'DELL'),
(289, 140, 'serial_number', 'CC83L81'),
(290, 140, 'model_number', 'DEFAULT'),
(291, 140, 'processor_detail', 'PENTIUM 4'),
(292, 140, 'power_supply', '1'),
(293, 143, 'brand_name', 'DELL'),
(294, 143, 'serial_number', 'CNOS-CBBG'),
(295, 143, 'model_number', 'DEFAULT'),
(296, 144, 'brand_name', 'DELL'),
(297, 144, 'serial_number', 'DEFAULT'),
(298, 144, 'model_number', 'DEFAULT'),
(299, 144, 'processor_detail', 'CORE 2 DUO'),
(300, 144, 'power_supply', '1'),
(301, 147, 'brand_name', 'DELL'),
(302, 147, 'serial_number', 'CNOC-CC2V'),
(303, 147, 'model_number', 'DEFAULT'),
(304, 148, 'brand_name', 'HP'),
(305, 148, 'serial_number', 'DEFAULT'),
(306, 148, 'model_number', 'DEFAULT'),
(307, 149, 'brand_name', 'HP'),
(308, 149, 'serial_number', 'DEFAULT'),
(309, 149, 'model_number', 'DEFAULT'),
(310, 150, 'brand_name', 'CTI VISION'),
(311, 150, 'serial_number', 'JCTI-YISION'),
(312, 150, 'model_number', 'DEFAULT'),
(313, 150, 'processor_detail', 'PENTIUM 4'),
(314, 150, 'power_supply', '1'),
(315, 153, 'brand_name', 'PHILIPS'),
(316, 153, 'serial_number', 'CXOO-4483'),
(317, 153, 'model_number', 'DEFAULT'),
(318, 154, 'brand_name', 'DELL'),
(319, 154, 'serial_number', '2621-8644'),
(320, 154, 'model_number', 'DEFAULT'),
(321, 154, 'processor_detail', 'CORE I5'),
(322, 154, 'power_supply', '1 '),
(323, 157, 'brand_name', 'DELL'),
(324, 157, 'serial_number', 'CNOP-88US'),
(325, 157, 'model_number', 'DEFAULT'),
(326, 158, 'brand_name', 'HP'),
(327, 158, 'serial_number', 'DEFAULT'),
(328, 158, 'model_number', 'HP LASERJET 1200'),
(329, 159, 'brand_name', 'HP'),
(330, 159, 'serial_number', 'DEFAULT'),
(331, 159, 'model_number', 'HP LASERJET 1200'),
(332, 160, 'brand_name', 'DELL'),
(333, 160, 'serial_number', '0594-1123'),
(334, 160, 'model_number', 'DEFAULT'),
(335, 160, 'processor_detail', 'PENTIUM 4'),
(336, 160, 'power_supply', '1'),
(337, 163, 'brand_name', 'DELL'),
(338, 163, 'serial_number', 'CNOY-00JT'),
(339, 163, 'model_number', 'DEFAULT'),
(340, 164, 'brand_name', 'HP'),
(341, 164, 'serial_number', 'DEFAULT'),
(342, 164, 'model_number', 'HP LASERJET 1200'),
(343, 165, 'brand_name', 'HP'),
(344, 165, 'serial_number', 'DEFAULT'),
(345, 165, 'model_number', 'HP LASERJET 1200'),
(346, 166, 'brand_name', 'DEFAULT'),
(347, 166, 'serial_number', 'DEFAULT'),
(348, 166, 'model_number', 'DEFAULT'),
(349, 166, 'processor_detail', 'PENTIUM 4'),
(350, 166, 'power_supply', '1'),
(351, 169, 'brand_name', 'PHILIPS'),
(352, 169, 'serial_number', 'CXOO-4165'),
(353, 169, 'model_number', 'DEFAULT'),
(354, 170, 'brand_name', 'HP'),
(355, 170, 'serial_number', 'MXL9-16GV'),
(356, 170, 'model_number', 'DEFAULT'),
(357, 170, 'processor_detail', 'CORE 2 DUO'),
(358, 170, 'power_supply', '1'),
(359, 173, 'brand_name', 'DELL'),
(360, 173, 'serial_number', 'CNOF-5EKS'),
(361, 173, 'model_number', 'DEFAULT'),
(362, 174, 'brand_name', 'HP'),
(363, 174, 'serial_number', 'DEFAULT'),
(364, 174, 'model_number', 'HP LASERJET 1300'),
(365, 175, 'brand_name', 'HP'),
(366, 175, 'serial_number', 'DEFAULT'),
(367, 175, 'model_number', 'HP LASERJET 1300'),
(368, 176, 'brand_name', 'DELL'),
(369, 176, 'serial_number', 'EMPB-1982'),
(370, 176, 'model_number', 'DEFAULT'),
(371, 176, 'processor_detail', 'CORE 2 DUO'),
(372, 176, 'power_supply', '1'),
(373, 179, 'brand_name', 'DELL'),
(374, 179, 'serial_number', 'CNO2-ACVZ'),
(375, 179, 'model_number', 'DEFAULT'),
(470, 222, 'brand_name', 'DELL'),
(471, 222, 'serial_number', '1T7R691'),
(472, 222, 'model_number', 'DEFAULT'),
(473, 222, 'processor_detail', 'PENTIUM 4'),
(474, 222, 'power_supply', '1'),
(475, 225, 'brand_name', 'DELL'),
(476, 225, 'serial_number', 'CN01-L4JZ'),
(477, 225, 'model_number', 'DEFAULT'),
(478, 226, 'brand_name', 'DELL'),
(479, 226, 'serial_number', 'JH8232S'),
(480, 226, 'model_number', 'DEFAULT'),
(481, 226, 'processor_detail', 'CORE 2 DUO'),
(482, 226, 'power_supply', '1'),
(483, 229, 'brand_name', 'DELL'),
(484, 229, 'serial_number', 'MX45-C195'),
(485, 229, 'model_number', 'DEFAULT'),
(486, 230, 'brand_name', 'HP'),
(487, 230, 'serial_number', 'DEFAULT'),
(488, 230, 'model_number', 'HP LASERJET 1300'),
(489, 231, 'brand_name', 'HP'),
(490, 231, 'serial_number', 'DEFAULT'),
(491, 231, 'model_number', 'HP LASERJET 1300'),
(492, 232, 'brand_name', 'DELL'),
(493, 232, 'serial_number', 'DEFAULT'),
(494, 232, 'model_number', 'DEFAULT'),
(495, 232, 'processor_detail', 'CORE 2 DUO'),
(496, 232, 'power_supply', '1'),
(497, 235, 'brand_name', 'AKHTER'),
(498, 235, 'serial_number', 'DEFAULT'),
(499, 235, 'model_number', 'DEFAULT'),
(500, 236, 'brand_name', 'HP'),
(501, 236, 'serial_number', 'DEFAULT'),
(502, 236, 'model_number', 'HP LASERJET 1200'),
(503, 237, 'brand_name', 'HP'),
(504, 237, 'serial_number', 'DEFAULT'),
(505, 237, 'model_number', 'HP LASERJET 1200'),
(506, 238, 'brand_name', 'DELL'),
(507, 238, 'serial_number', '52091PXP2J'),
(508, 238, 'model_number', 'DEFAULT'),
(509, 238, 'processor_detail', 'CORE 2 DUO'),
(510, 238, 'power_supply', '1'),
(511, 241, 'brand_name', 'DELL'),
(512, 241, 'serial_number', 'DEFAULT'),
(513, 241, 'model_number', 'DEFAULT'),
(514, 242, 'brand_name', 'HP'),
(515, 242, 'serial_number', 'DEFAULT'),
(516, 242, 'model_number', 'HP LASERJET 1300'),
(517, 243, 'brand_name', 'HP'),
(518, 243, 'serial_number', 'DEFAULT'),
(519, 243, 'model_number', 'HP LASERJET 1300'),
(520, 244, 'brand_name', 'DELL'),
(521, 244, 'serial_number', 'JQS-5528'),
(522, 244, 'model_number', 'DEFAULT'),
(523, 244, 'processor_detail', 'CORE 2 DUO'),
(524, 244, 'power_supply', '1'),
(525, 247, 'brand_name', 'DELL'),
(526, 247, 'serial_number', 'CN04-C5TM'),
(527, 247, 'model_number', 'DEFAULT'),
(528, 248, 'brand_name', 'UN BRANDED'),
(529, 248, 'serial_number', 'DEFAULT'),
(530, 248, 'model_number', 'DEFAULT'),
(531, 248, 'processor_detail', 'PENTIUM 4'),
(532, 248, 'power_supply', '1'),
(533, 251, 'brand_name', 'PHILIPS'),
(534, 251, 'serial_number', 'DEFAULT'),
(535, 251, 'model_number', 'DEFAULT'),
(536, 252, 'brand_name', 'HP'),
(537, 252, 'serial_number', 'DEFAULT'),
(538, 252, 'model_number', 'HP LASERJET 1300'),
(539, 253, 'brand_name', 'HP'),
(540, 253, 'serial_number', 'DEFAULT'),
(541, 253, 'model_number', 'HP LASERJET 1300'),
(542, 254, 'brand_name', 'DELL'),
(543, 254, 'serial_number', '9WG232S'),
(544, 254, 'model_number', 'DEFAULT'),
(545, 254, 'processor_detail', 'CORE 2 DUO'),
(546, 254, 'power_supply', '1'),
(547, 259, 'brand_name', 'PHILIPS MONITOR'),
(548, 259, 'serial_number', 'DEFAULT'),
(549, 259, 'model_number', 'DEFAULT'),
(550, 260, 'brand_name', 'DEFAULT'),
(551, 260, 'serial_number', 'DEFAULT'),
(552, 260, 'model_number', 'DEFAULT'),
(553, 261, 'brand_name', 'DEFAULT'),
(554, 261, 'serial_number', 'DEFAULT'),
(555, 261, 'model_number', 'DEFAULT'),
(556, 262, 'brand_name', 'NON-BRANDED'),
(557, 262, 'serial_number', 'DEFAULT'),
(558, 262, 'model_number', 'DEFAULT'),
(559, 262, 'processor_detail', 'P4'),
(560, 262, 'power_supply', '1'),
(561, 267, 'brand_name', 'DELL'),
(562, 267, 'serial_number', 'DEFAULT'),
(563, 267, 'model_number', 'DEFAULT'),
(564, 268, 'brand_name', 'DEFAULT'),
(565, 268, 'serial_number', 'DEFAULT'),
(566, 268, 'model_number', 'DEFAULT'),
(567, 269, 'brand_name', 'DEFAULT'),
(568, 269, 'serial_number', 'DEFAULT'),
(569, 269, 'model_number', 'DEFAULT'),
(570, 270, 'brand_name', 'HP'),
(571, 270, 'serial_number', 'DEFAULT'),
(572, 270, 'model_number', 'HP LASERJET 1200'),
(573, 271, 'brand_name', 'HP'),
(574, 271, 'serial_number', 'DEFAULT'),
(575, 271, 'model_number', 'HP LASERJET 1200'),
(576, 274, 'brand_name', 'HP'),
(577, 274, 'serial_number', 'SGH124TQ95'),
(578, 274, 'model_number', 'HP COMPAQ  6200 PRO'),
(579, 274, 'processor_detail', 'CORE I3'),
(580, 274, 'power_supply', '1'),
(581, 277, 'brand_name', 'HP'),
(582, 277, 'serial_number', 'SGH142SW22'),
(583, 277, 'model_number', 'HP COMPAQ 6200 PRO'),
(584, 277, 'processor_detail', 'CORE I3'),
(585, 277, 'power_supply', '1'),
(586, 280, 'brand_name', 'HP'),
(587, 280, 'serial_number', 'SGH142SW1J'),
(588, 280, 'model_number', 'HP COMPAQ 6200 PRO'),
(589, 280, 'processor_detail', 'CORE I3'),
(590, 280, 'power_supply', '1'),
(591, 283, 'brand_name', 'HP'),
(592, 283, 'serial_number', 'SGH121RBRL'),
(593, 283, 'model_number', 'HP COMPAQ 6200 PRO'),
(594, 283, 'processor_detail', 'CORE I3'),
(595, 283, 'power_supply', '1'),
(596, 286, 'brand_name', 'HP'),
(597, 286, 'serial_number', 'SGH121RBS2'),
(598, 286, 'model_number', 'HP COMPAQ 6200 PRO'),
(599, 286, 'processor_detail', 'CORE I3 '),
(600, 286, 'power_supply', '1'),
(601, 289, 'brand_name', 'HP'),
(602, 289, 'serial_number', 'SGH143TL3T'),
(603, 289, 'model_number', 'HP COMPAQ 6200 PRO'),
(604, 289, 'processor_detail', 'CORE I3'),
(605, 289, 'power_supply', '1'),
(606, 292, 'brand_name', 'HP'),
(607, 292, 'serial_number', 'SGH142SW1M'),
(608, 292, 'model_number', 'HP COMPAQ 6200 PRO'),
(609, 292, 'processor_detail', 'CORE I3'),
(610, 292, 'power_supply', '1'),
(611, 295, 'brand_name', 'HP'),
(612, 295, 'serial_number', 'SGH221SCJ6'),
(613, 295, 'model_number', 'HP COMPAQ 6200 PRO'),
(614, 295, 'processor_detail', 'CORE I3 '),
(615, 295, 'power_supply', '1'),
(616, 298, 'brand_name', 'HP'),
(617, 298, 'serial_number', 'SGH143TL41'),
(618, 298, 'model_number', 'HP COMPAQ 6200 PRO'),
(619, 298, 'processor_detail', 'CORE I3'),
(620, 298, 'power_supply', '1'),
(621, 301, 'brand_name', 'HP'),
(622, 301, 'serial_number', 'SGH242R5GN'),
(623, 301, 'model_number', 'HP PRO 3330 MICRO TOWER'),
(624, 301, 'processor_detail', 'CORE I3'),
(625, 301, 'power_supply', '1');

-- --------------------------------------------------------

--
-- Table structure for table `defect_assets`
--

CREATE TABLE `defect_assets` (
  `id` int(11) NOT NULL,
  `voucher_number` varchar(225) NOT NULL,
  `people_id` int(11) NOT NULL,
  `asset_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `active_status` int(11) NOT NULL DEFAULT 1,
  `delete_status` int(11) NOT NULL DEFAULT 0,
  `time_created` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` int(11) NOT NULL,
  `department_name` varchar(225) NOT NULL,
  `department_slug` varchar(225) NOT NULL,
  `location_id` int(11) NOT NULL,
  `active_status` int(11) NOT NULL DEFAULT 1,
  `delete_status` int(11) NOT NULL DEFAULT 0,
  `time_created` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `department_name`, `department_slug`, `location_id`, `active_status`, `delete_status`, `time_created`) VALUES
(1, 'Information Technology', '', 1, 1, 0, '1663218041'),
(2, 'Finance', '', 1, 1, 0, '1663218096'),
(3, 'Marketing', '', 1, 1, 0, '1663218261'),
(4, 'Audit', '', 1, 1, 0, '1663218363'),
(5, 'Procurement', '', 1, 1, 0, '1663223668'),
(6, 'Internal Audit', '', 1, 1, 0, '1664190488'),
(7, 'R&D', '', 1, 1, 0, '1664190655'),
(8, 'HR&A', '', 1, 1, 0, '1664191022'),
(9, 'MD Office ', '', 1, 1, 0, '1664192454'),
(10, 'Production', '', 1, 1, 0, '1664192625'),
(11, 'Recovery Section', '', 1, 1, 0, '1664192782'),
(12, 'Legal Cell', '', 1, 1, 0, '1664280496'),
(13, 'PPB', '', 1, 1, 0, '1664527685'),
(14, 'Stores', '', 1, 1, 0, '1664533621'),
(15, 'QAD', '', 1, 1, 0, '1664536032');

-- --------------------------------------------------------

--
-- Table structure for table `deploy_assets`
--

CREATE TABLE `deploy_assets` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `voucher_number` varchar(225) NOT NULL,
  `voucher_date` varchar(225) NOT NULL,
  `deploy_to` int(11) NOT NULL,
  `people_id` int(11) NOT NULL,
  `department_id` int(11) NOT NULL,
  `asset_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `active_status` int(11) NOT NULL DEFAULT 1,
  `delete_status` int(11) NOT NULL DEFAULT 0,
  `time_created` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `deploy_assets`
--

INSERT INTO `deploy_assets` (`id`, `user_id`, `voucher_number`, `voucher_date`, `deploy_to`, `people_id`, `department_id`, `asset_id`, `qty`, `parent_id`, `active_status`, `delete_status`, `time_created`) VALUES
(43, 3, 'IT-2022-0001', '30-6-2022', 1, 6, 1, 27, 1, NULL, 1, 0, '1664191803'),
(44, 3, 'IT-2022-0001', '30-6-2022', 1, 6, 1, 28, 1, 43, 1, 0, '1664191803'),
(45, 3, 'IT-2022-0001', '30-6-2022', 1, 6, 1, 29, 1, 43, 1, 0, '1664191803'),
(46, 3, 'IT-2022-0001', '30-6-2022', 1, 6, 1, 30, 1, NULL, 1, 0, '1664191803'),
(47, 3, 'IT-2022-0001', '30-6-2022', 1, 6, 1, 31, 1, NULL, 1, 0, '1664191803'),
(48, 3, 'IT-2022-0001', '30-6-2022', 1, 6, 1, 32, 1, 47, 1, 0, '1664191803'),
(49, 3, 'IT-2022-0001', '30-6-2022', 1, 6, 1, 33, 1, NULL, 1, 0, '1664193279'),
(50, 3, 'IT-2022-0001', '30-6-2022', 1, 6, 1, 34, 1, NULL, 1, 0, '1664193279'),
(51, 3, 'IT-2022-0002', '30-6-2022', 1, 7, 1, 33, 1, NULL, 1, 0, '1664194131'),
(52, 3, 'IT-2022-0002', '30-6-2022', 1, 7, 1, 34, 1, NULL, 1, 0, '1664194131'),
(53, 3, 'IT-2022-0002', '30-6-2022', 1, 7, 1, 35, 1, NULL, 1, 0, '1664194131'),
(54, 3, 'IT-2022-0002', '30-6-2022', 1, 7, 1, 36, 1, 53, 1, 0, '1664194131'),
(55, 3, 'IT-2022-0002', '30-6-2022', 1, 7, 1, 37, 1, 53, 1, 0, '1664194131'),
(56, 3, 'IT-2022-0002', '30-6-2022', 1, 7, 1, 38, 1, NULL, 1, 0, '1664194131'),
(57, 3, 'IT-2022-0002', '30-6-2022', 1, 7, 1, 39, 2, NULL, 1, 0, '1664194131'),
(58, 3, 'IT-2022-0003', '30-6-2022', 2, 1, 1, 39, 2, NULL, 1, 0, '1664194500'),
(59, 3, 'IT-2022-0003', '30-6-2022', 2, 1, 1, 40, 1, NULL, 1, 0, '1664194500'),
(62, 3, 'IT-2022-0003', '30-6-2022', 2, 1, 1, 39, 2, NULL, 1, 0, '1664195407'),
(63, 3, 'IT-2022-0003', '30-6-2022', 2, 1, 1, 52, 1, NULL, 1, 0, '1664195407'),
(64, 3, 'IT-2022-0003', '30-6-2022', 2, 1, 1, 53, 4, 63, 1, 0, '1664195407'),
(65, 3, 'IT-2022-0003', '30-6-2022', 2, 1, 1, 54, 6, 63, 1, 0, '1664195407'),
(66, 3, 'IT-2022-0003', '30-6-2022', 2, 1, 1, 39, 2, NULL, 1, 0, '1664195546'),
(67, 3, 'IT-2022-0003', '30-6-2022', 2, 1, 1, 55, 1, NULL, 1, 0, '1664195546'),
(68, 3, 'IT-2022-0003', '30-6-2022', 2, 1, 1, 56, 1, 67, 1, 0, '1664195546'),
(69, 3, 'IT-2022-0003', '30-6-2022', 2, 1, 1, 57, 6, 67, 1, 0, '1664195546'),
(70, 3, 'IT-2022-0004', '30-6-2022', 1, 8, 6, 33, 1, NULL, 1, 0, '1664196040'),
(71, 3, 'IT-2022-0004', '30-6-2022', 1, 8, 6, 34, 1, NULL, 1, 0, '1664196040'),
(72, 3, 'IT-2022-0004', '30-6-2022', 1, 8, 6, 39, 2, NULL, 1, 0, '1664196040'),
(73, 3, 'IT-2022-0004', '30-6-2022', 1, 8, 6, 58, 1, NULL, 1, 0, '1664196040'),
(74, 3, 'IT-2022-0004', '30-6-2022', 1, 8, 6, 59, 1, 73, 1, 0, '1664196040'),
(75, 3, 'IT-2022-0004', '30-6-2022', 1, 8, 6, 60, 1, 73, 1, 0, '1664196040'),
(76, 3, 'IT-2022-0004', '30-6-2022', 1, 8, 6, 61, 1, NULL, 1, 0, '1664196040'),
(77, 3, 'IT-2022-0005', '30-6-2022', 1, 9, 6, 33, 1, NULL, 1, 0, '1664196319'),
(78, 3, 'IT-2022-0005', '30-6-2022', 1, 9, 6, 34, 1, NULL, 1, 0, '1664196319'),
(79, 3, 'IT-2022-0005', '30-6-2022', 1, 9, 6, 39, 2, NULL, 1, 0, '1664196319'),
(80, 3, 'IT-2022-0005', '30-6-2022', 1, 9, 6, 62, 1, NULL, 1, 0, '1664196319'),
(81, 3, 'IT-2022-0005', '30-6-2022', 1, 9, 6, 63, 1, 80, 1, 0, '1664196319'),
(82, 3, 'IT-2022-0005', '30-6-2022', 1, 9, 6, 64, 1, 80, 1, 0, '1664196319'),
(83, 3, 'IT-2022-0005', '30-6-2022', 1, 9, 6, 65, 1, NULL, 1, 0, '1664196319'),
(84, 3, 'IT-2022-0006', '30-6-2022', 1, 10, 7, 33, 1, NULL, 1, 0, '1664196568'),
(85, 3, 'IT-2022-0006', '30-6-2022', 1, 10, 7, 34, 1, NULL, 1, 0, '1664196568'),
(86, 3, 'IT-2022-0006', '30-6-2022', 1, 10, 7, 39, 2, NULL, 1, 0, '1664196568'),
(87, 3, 'IT-2022-0006', '30-6-2022', 1, 10, 7, 66, 1, NULL, 1, 0, '1664196568'),
(88, 3, 'IT-2022-0006', '30-6-2022', 1, 10, 7, 67, 1, 87, 1, 0, '1664196568'),
(89, 3, 'IT-2022-0006', '30-6-2022', 1, 10, 7, 68, 1, 87, 1, 0, '1664196568'),
(90, 3, 'IT-2022-0006', '30-6-2022', 1, 10, 7, 69, 1, NULL, 1, 0, '1664196568'),
(91, 3, 'IT-2022-0007', '30-6-2022', 1, 11, 7, 33, 1, NULL, 1, 0, '1664196812'),
(92, 3, 'IT-2022-0007', '30-6-2022', 1, 11, 7, 34, 1, NULL, 1, 0, '1664196812'),
(93, 3, 'IT-2022-0007', '30-6-2022', 1, 11, 7, 39, 3, NULL, 1, 0, '1664196812'),
(94, 3, 'IT-2022-0007', '30-6-2022', 1, 11, 7, 70, 1, NULL, 1, 0, '1664196812'),
(95, 3, 'IT-2022-0007', '30-6-2022', 1, 11, 7, 71, 1, 94, 1, 0, '1664196812'),
(96, 3, 'IT-2022-0007', '30-6-2022', 1, 11, 7, 72, 1, 94, 1, 0, '1664196812'),
(97, 3, 'IT-2022-0007', '30-6-2022', 1, 11, 7, 73, 1, NULL, 1, 0, '1664196812'),
(98, 3, 'IT-2022-0007', '30-6-2022', 1, 11, 7, 74, 1, NULL, 1, 0, '1664196812'),
(99, 3, 'IT-2022-0007', '30-6-2022', 1, 11, 7, 75, 1, 98, 1, 0, '1664196812'),
(100, 3, 'IT-2022-0008', '30-6-2022', 1, 12, 7, 33, 1, NULL, 1, 0, '1664197170'),
(101, 3, 'IT-2022-0008', '30-6-2022', 1, 12, 7, 34, 1, NULL, 1, 0, '1664197170'),
(102, 3, 'IT-2022-0008', '30-6-2022', 1, 12, 7, 39, 2, NULL, 1, 0, '1664197170'),
(103, 3, 'IT-2022-0008', '30-6-2022', 1, 12, 7, 76, 1, NULL, 1, 0, '1664197170'),
(104, 3, 'IT-2022-0008', '30-6-2022', 1, 12, 7, 77, 1, 103, 1, 0, '1664197170'),
(105, 3, 'IT-2022-0008', '30-6-2022', 1, 12, 7, 78, 1, 103, 1, 0, '1664197170'),
(106, 3, 'IT-2022-0008', '30-6-2022', 1, 12, 7, 79, 1, NULL, 1, 0, '1664197170'),
(107, 3, 'IT-2022-0009', '30-6-2022', 1, 13, 7, 33, 1, NULL, 1, 0, '1664197508'),
(108, 3, 'IT-2022-0009', '30-6-2022', 1, 13, 7, 34, 1, NULL, 1, 0, '1664197508'),
(109, 3, 'IT-2022-0009', '30-6-2022', 1, 13, 7, 39, 2, NULL, 1, 0, '1664197508'),
(110, 3, 'IT-2022-0009', '30-6-2022', 1, 13, 7, 80, 1, NULL, 1, 0, '1664197508'),
(111, 3, 'IT-2022-0009', '30-6-2022', 1, 13, 7, 81, 1, 110, 1, 0, '1664197508'),
(112, 3, 'IT-2022-0009', '30-6-2022', 1, 13, 7, 82, 1, 110, 1, 0, '1664197508'),
(113, 3, 'IT-2022-0009', '30-6-2022', 1, 13, 7, 83, 1, NULL, 1, 0, '1664197508'),
(114, 3, 'IT-2022-0010', '30-6-2022', 1, 14, 8, 33, 1, NULL, 1, 0, '1664198054'),
(115, 3, 'IT-2022-0010', '30-6-2022', 1, 14, 8, 34, 1, NULL, 1, 0, '1664198054'),
(116, 3, 'IT-2022-0010', '30-6-2022', 1, 14, 8, 39, 3, NULL, 1, 0, '1664198054'),
(117, 3, 'IT-2022-0010', '30-6-2022', 1, 14, 8, 84, 1, NULL, 1, 0, '1664198054'),
(118, 3, 'IT-2022-0010', '30-6-2022', 1, 14, 8, 85, 1, 117, 1, 0, '1664198054'),
(119, 3, 'IT-2022-0010', '30-6-2022', 1, 14, 8, 86, 1, 117, 1, 0, '1664198054'),
(120, 3, 'IT-2022-0010', '30-6-2022', 1, 14, 8, 87, 1, NULL, 1, 0, '1664198054'),
(121, 3, 'IT-2022-0010', '30-6-2022', 1, 14, 8, 88, 1, NULL, 1, 0, '1664198054'),
(122, 3, 'IT-2022-0010', '30-6-2022', 1, 14, 8, 89, 1, 121, 1, 0, '1664198054'),
(123, 3, 'IT-2022-0011', '30-6-2022', 1, 15, 8, 33, 1, NULL, 1, 0, '1664253917'),
(124, 3, 'IT-2022-0011', '30-6-2022', 1, 15, 8, 34, 1, NULL, 1, 0, '1664253917'),
(125, 3, 'IT-2022-0011', '30-6-2022', 1, 15, 8, 39, 3, NULL, 1, 0, '1664253917'),
(126, 3, 'IT-2022-0011', '30-6-2022', 1, 15, 8, 90, 1, NULL, 1, 0, '1664253917'),
(127, 3, 'IT-2022-0011', '30-6-2022', 1, 15, 8, 91, 1, 126, 1, 0, '1664253917'),
(128, 3, 'IT-2022-0011', '30-6-2022', 1, 15, 8, 92, 1, 126, 1, 0, '1664253917'),
(129, 3, 'IT-2022-0011', '30-6-2022', 1, 15, 8, 93, 1, NULL, 1, 0, '1664253917'),
(130, 3, 'IT-2022-0011', '30-6-2022', 1, 15, 8, 94, 1, NULL, 1, 0, '1664253917'),
(131, 3, 'IT-2022-0011', '30-6-2022', 1, 15, 8, 95, 1, 130, 1, 0, '1664253917'),
(132, 3, 'IT-2022-0012', '30-6-2022', 1, 16, 8, 33, 1, NULL, 1, 0, '1664254272'),
(133, 3, 'IT-2022-0012', '30-6-2022', 1, 16, 8, 34, 1, NULL, 1, 0, '1664254272'),
(134, 3, 'IT-2022-0012', '30-6-2022', 1, 16, 8, 39, 3, NULL, 1, 0, '1664254272'),
(135, 3, 'IT-2022-0012', '30-6-2022', 1, 16, 8, 96, 1, NULL, 1, 0, '1664254272'),
(136, 3, 'IT-2022-0012', '30-6-2022', 1, 16, 8, 97, 1, 135, 1, 0, '1664254272'),
(137, 3, 'IT-2022-0012', '30-6-2022', 1, 16, 8, 98, 1, 135, 1, 0, '1664254272'),
(138, 3, 'IT-2022-0012', '30-6-2022', 1, 16, 8, 99, 1, NULL, 1, 0, '1664254272'),
(139, 3, 'IT-2022-0012', '30-6-2022', 1, 16, 8, 100, 1, NULL, 1, 0, '1664254272'),
(140, 3, 'IT-2022-0012', '30-6-2022', 1, 16, 8, 101, 1, 139, 1, 0, '1664254272'),
(141, 3, 'IT-2022-0013', '30-6-2022', 1, 18, 2, 33, 1, NULL, 1, 0, '1664254988'),
(142, 3, 'IT-2022-0013', '30-6-2022', 1, 18, 2, 34, 1, NULL, 1, 0, '1664254988'),
(143, 3, 'IT-2022-0013', '30-6-2022', 1, 18, 2, 39, 2, NULL, 1, 0, '1664254988'),
(144, 3, 'IT-2022-0013', '30-6-2022', 1, 18, 2, 102, 1, NULL, 1, 0, '1664254988'),
(145, 3, 'IT-2022-0013', '30-6-2022', 1, 18, 2, 103, 1, 144, 1, 0, '1664254988'),
(146, 3, 'IT-2022-0013', '30-6-2022', 1, 18, 2, 104, 1, 144, 1, 0, '1664254988'),
(147, 3, 'IT-2022-0013', '30-6-2022', 1, 18, 2, 105, 1, NULL, 1, 0, '1664254988'),
(148, 3, 'IT-2022-0014', '30-6-2022', 1, 19, 2, 33, 1, NULL, 1, 0, '1664255896'),
(149, 3, 'IT-2022-0014', '30-6-2022', 1, 19, 2, 34, 1, NULL, 1, 0, '1664255896'),
(150, 3, 'IT-2022-0014', '30-6-2022', 1, 19, 2, 39, 2, NULL, 1, 0, '1664255896'),
(151, 3, 'IT-2022-0014', '30-6-2022', 1, 19, 2, 106, 1, NULL, 1, 0, '1664255896'),
(152, 3, 'IT-2022-0014', '30-6-2022', 1, 19, 2, 107, 1, 151, 1, 0, '1664255896'),
(153, 3, 'IT-2022-0014', '30-6-2022', 1, 19, 2, 108, 1, 151, 1, 0, '1664255896'),
(154, 3, 'IT-2022-0014', '30-6-2022', 1, 19, 2, 109, 1, NULL, 1, 0, '1664255896'),
(155, 3, 'IT-2022-0015', '30-6-2022', 1, 17, 2, 33, 1, NULL, 1, 0, '1664256086'),
(156, 3, 'IT-2022-0015', '30-6-2022', 1, 17, 2, 34, 1, NULL, 1, 0, '1664256086'),
(157, 3, 'IT-2022-0015', '30-6-2022', 1, 17, 2, 39, 2, NULL, 1, 0, '1664256086'),
(158, 3, 'IT-2022-0015', '30-6-2022', 1, 17, 2, 110, 1, NULL, 1, 0, '1664256086'),
(159, 3, 'IT-2022-0015', '30-6-2022', 1, 17, 2, 111, 1, 158, 1, 0, '1664256086'),
(160, 3, 'IT-2022-0015', '30-6-2022', 1, 17, 2, 112, 1, 158, 1, 0, '1664256086'),
(161, 3, 'IT-2022-0015', '30-6-2022', 1, 17, 2, 113, 1, NULL, 1, 0, '1664256086'),
(162, 3, 'IT-2022-0016', '30-6-2022', 1, 20, 2, 33, 1, NULL, 1, 0, '1664256288'),
(163, 3, 'IT-2022-0016', '30-6-2022', 1, 20, 2, 34, 1, NULL, 1, 0, '1664256288'),
(164, 3, 'IT-2022-0016', '30-6-2022', 1, 20, 2, 39, 3, NULL, 1, 0, '1664256288'),
(165, 3, 'IT-2022-0016', '30-6-2022', 1, 20, 2, 114, 1, NULL, 1, 0, '1664256288'),
(166, 3, 'IT-2022-0016', '30-6-2022', 1, 20, 2, 115, 1, 165, 1, 0, '1664256288'),
(167, 3, 'IT-2022-0016', '30-6-2022', 1, 20, 2, 116, 1, 165, 1, 0, '1664256288'),
(168, 3, 'IT-2022-0016', '30-6-2022', 1, 20, 2, 117, 1, NULL, 1, 0, '1664256288'),
(169, 3, 'IT-2022-0016', '30-6-2022', 1, 20, 2, 118, 1, NULL, 1, 0, '1664256288'),
(170, 3, 'IT-2022-0016', '30-6-2022', 1, 20, 2, 119, 1, 169, 1, 0, '1664256288'),
(171, 3, 'IT-2022-0017', '30-6-2022', 1, 21, 2, 33, 1, NULL, 1, 0, '1664256596'),
(172, 3, 'IT-2022-0017', '30-6-2022', 1, 21, 2, 34, 1, NULL, 1, 0, '1664256596'),
(173, 3, 'IT-2022-0017', '30-6-2022', 1, 21, 2, 39, 2, NULL, 1, 0, '1664256596'),
(174, 3, 'IT-2022-0017', '30-6-2022', 1, 21, 2, 120, 1, NULL, 1, 0, '1664256596'),
(175, 3, 'IT-2022-0017', '30-6-2022', 1, 21, 2, 121, 1, 174, 1, 0, '1664256596'),
(176, 3, 'IT-2022-0017', '30-6-2022', 1, 21, 2, 122, 1, 174, 1, 0, '1664256596'),
(177, 3, 'IT-2022-0017', '30-6-2022', 1, 21, 2, 123, 1, NULL, 1, 0, '1664256596'),
(178, 3, 'IT-2022-0018', '30-6-2022', 1, 22, 2, 33, 1, NULL, 1, 0, '1664256954'),
(179, 3, 'IT-2022-0018', '30-6-2022', 1, 22, 2, 34, 1, NULL, 1, 0, '1664256954'),
(180, 3, 'IT-2022-0018', '30-6-2022', 1, 22, 2, 39, 2, NULL, 1, 0, '1664256954'),
(181, 3, 'IT-2022-0018', '30-6-2022', 1, 22, 2, 124, 1, NULL, 1, 0, '1664256954'),
(182, 3, 'IT-2022-0018', '30-6-2022', 1, 22, 2, 125, 1, 181, 1, 0, '1664256954'),
(183, 3, 'IT-2022-0018', '30-6-2022', 1, 22, 2, 126, 1, 181, 1, 0, '1664256954'),
(184, 3, 'IT-2022-0018', '30-6-2022', 1, 22, 2, 127, 1, NULL, 1, 0, '1664256954'),
(185, 3, 'IT-2022-0019', '30-6-2022', 1, 23, 2, 33, 1, NULL, 1, 0, '1664257234'),
(186, 3, 'IT-2022-0019', '30-6-2022', 1, 23, 2, 34, 1, NULL, 1, 0, '1664257234'),
(187, 3, 'IT-2022-0019', '30-6-2022', 1, 23, 2, 39, 3, NULL, 1, 0, '1664257234'),
(188, 3, 'IT-2022-0019', '30-6-2022', 1, 23, 2, 128, 1, NULL, 1, 0, '1664257234'),
(189, 3, 'IT-2022-0019', '30-6-2022', 1, 23, 2, 129, 1, 188, 1, 0, '1664257234'),
(190, 3, 'IT-2022-0019', '30-6-2022', 1, 23, 2, 130, 1, 188, 1, 0, '1664257234'),
(191, 3, 'IT-2022-0019', '30-6-2022', 1, 23, 2, 131, 1, NULL, 1, 0, '1664257234'),
(192, 3, 'IT-2022-0019', '30-6-2022', 1, 23, 2, 132, 1, NULL, 1, 0, '1664257234'),
(193, 3, 'IT-2022-0019', '30-6-2022', 1, 23, 2, 133, 1, 192, 1, 0, '1664257234'),
(194, 3, 'IT-2022-0020', '30-6-2022', 1, 24, 2, 33, 1, NULL, 1, 0, '1664257566'),
(195, 3, 'IT-2022-0020', '30-6-2022', 1, 24, 2, 34, 1, NULL, 1, 0, '1664257566'),
(196, 3, 'IT-2022-0020', '30-6-2022', 1, 24, 2, 39, 3, NULL, 1, 0, '1664257566'),
(197, 3, 'IT-2022-0020', '30-6-2022', 1, 24, 2, 134, 1, NULL, 1, 0, '1664257566'),
(198, 3, 'IT-2022-0020', '30-6-2022', 1, 24, 2, 135, 1, 197, 1, 0, '1664257566'),
(199, 3, 'IT-2022-0020', '30-6-2022', 1, 24, 2, 136, 1, 197, 1, 0, '1664257566'),
(200, 3, 'IT-2022-0020', '30-6-2022', 1, 24, 2, 137, 1, NULL, 1, 0, '1664257566'),
(201, 3, 'IT-2022-0020', '30-6-2022', 1, 24, 2, 138, 1, NULL, 1, 0, '1664257566'),
(202, 3, 'IT-2022-0020', '30-6-2022', 1, 24, 2, 139, 1, 201, 1, 0, '1664257566'),
(203, 3, 'IT-2022-0021', '30-6-2022', 1, 25, 2, 33, 1, NULL, 1, 0, '1664257739'),
(204, 3, 'IT-2022-0021', '30-6-2022', 1, 25, 2, 34, 1, NULL, 1, 0, '1664257739'),
(205, 3, 'IT-2022-0021', '30-6-2022', 1, 25, 2, 39, 2, NULL, 1, 0, '1664257739'),
(206, 3, 'IT-2022-0021', '30-6-2022', 1, 25, 2, 140, 1, NULL, 1, 0, '1664257739'),
(207, 3, 'IT-2022-0021', '30-6-2022', 1, 25, 2, 141, 1, 206, 1, 0, '1664257739'),
(208, 3, 'IT-2022-0021', '30-6-2022', 1, 25, 2, 142, 1, 206, 1, 0, '1664257739'),
(209, 3, 'IT-2022-0021', '30-6-2022', 1, 25, 2, 143, 1, NULL, 1, 0, '1664257739'),
(210, 3, 'IT-2022-0022', '30-6-2022', 1, 26, 9, 33, 1, NULL, 1, 0, '1664258440'),
(211, 3, 'IT-2022-0022', '30-6-2022', 1, 26, 9, 34, 1, NULL, 1, 0, '1664258440'),
(212, 3, 'IT-2022-0022', '30-6-2022', 1, 26, 9, 39, 3, NULL, 1, 0, '1664258440'),
(213, 3, 'IT-2022-0022', '30-6-2022', 1, 26, 9, 144, 1, NULL, 1, 0, '1664258440'),
(214, 3, 'IT-2022-0022', '30-6-2022', 1, 26, 9, 145, 1, 213, 1, 0, '1664258440'),
(215, 3, 'IT-2022-0022', '30-6-2022', 1, 26, 9, 146, 1, 213, 1, 0, '1664258440'),
(216, 3, 'IT-2022-0022', '30-6-2022', 1, 26, 9, 147, 1, NULL, 1, 0, '1664258440'),
(217, 3, 'IT-2022-0022', '30-6-2022', 1, 26, 9, 148, 1, NULL, 1, 0, '1664258440'),
(218, 3, 'IT-2022-0022', '30-6-2022', 1, 26, 9, 149, 1, 217, 1, 0, '1664258440'),
(219, 3, 'IT-2022-0023', '30-6-2022', 1, 27, 9, 33, 1, NULL, 1, 0, '1664258682'),
(220, 3, 'IT-2022-0023', '30-6-2022', 1, 27, 9, 34, 1, NULL, 1, 0, '1664258682'),
(221, 3, 'IT-2022-0023', '30-6-2022', 1, 27, 9, 39, 2, NULL, 1, 0, '1664258682'),
(222, 3, 'IT-2022-0023', '30-6-2022', 1, 27, 9, 150, 1, NULL, 1, 0, '1664258682'),
(223, 3, 'IT-2022-0023', '30-6-2022', 1, 27, 9, 151, 1, 222, 1, 0, '1664258682'),
(224, 3, 'IT-2022-0023', '30-6-2022', 1, 27, 9, 152, 1, 222, 1, 0, '1664258682'),
(225, 3, 'IT-2022-0023', '30-6-2022', 1, 27, 9, 153, 1, NULL, 1, 0, '1664258682'),
(235, 3, 'IT-2022-0024', '30-6-2022', 1, 28, 10, 33, 1, NULL, 1, 0, '1664259253'),
(236, 3, 'IT-2022-0024', '30-6-2022', 1, 28, 10, 34, 1, NULL, 1, 0, '1664259253'),
(237, 3, 'IT-2022-0024', '30-6-2022', 1, 28, 10, 39, 3, NULL, 1, 0, '1664259253'),
(238, 3, 'IT-2022-0024', '30-6-2022', 1, 28, 10, 154, 1, NULL, 1, 0, '1664259253'),
(239, 3, 'IT-2022-0024', '30-6-2022', 1, 28, 10, 155, 1, 238, 1, 0, '1664259253'),
(240, 3, 'IT-2022-0024', '30-6-2022', 1, 28, 10, 156, 1, 238, 1, 0, '1664259253'),
(241, 3, 'IT-2022-0024', '30-6-2022', 1, 28, 10, 157, 1, NULL, 1, 0, '1664259253'),
(242, 3, 'IT-2022-0024', '30-6-2022', 1, 28, 10, 158, 1, NULL, 1, 0, '1664259253'),
(243, 3, 'IT-2022-0024', '30-6-2022', 1, 28, 10, 159, 1, 242, 1, 0, '1664259253'),
(244, 3, 'IT-2022-0025', '30-6-2022', 1, 29, 5, 33, 1, NULL, 1, 0, '1664259444'),
(245, 3, 'IT-2022-0025', '30-6-2022', 1, 29, 5, 34, 1, NULL, 1, 0, '1664259444'),
(246, 3, 'IT-2022-0025', '30-6-2022', 1, 29, 5, 39, 3, NULL, 1, 0, '1664259444'),
(247, 3, 'IT-2022-0025', '30-6-2022', 1, 29, 5, 160, 1, NULL, 1, 0, '1664259444'),
(248, 3, 'IT-2022-0025', '30-6-2022', 1, 29, 5, 161, 1, 247, 1, 0, '1664259444'),
(249, 3, 'IT-2022-0025', '30-6-2022', 1, 29, 5, 162, 1, 247, 1, 0, '1664259444'),
(250, 3, 'IT-2022-0025', '30-6-2022', 1, 29, 5, 163, 1, NULL, 1, 0, '1664259444'),
(251, 3, 'IT-2022-0025', '30-6-2022', 1, 29, 5, 164, 1, NULL, 1, 0, '1664259444'),
(252, 3, 'IT-2022-0025', '30-6-2022', 1, 29, 5, 165, 1, 251, 1, 0, '1664259444'),
(253, 3, 'IT-2022-0026', '30-6-2022', 1, 30, 5, 33, 1, NULL, 1, 0, '1664259625'),
(254, 3, 'IT-2022-0026', '30-6-2022', 1, 30, 5, 34, 1, NULL, 1, 0, '1664259625'),
(255, 3, 'IT-2022-0026', '30-6-2022', 1, 30, 5, 39, 2, NULL, 1, 0, '1664259625'),
(256, 3, 'IT-2022-0026', '30-6-2022', 1, 30, 5, 166, 1, NULL, 1, 0, '1664259625'),
(257, 3, 'IT-2022-0026', '30-6-2022', 1, 30, 5, 167, 1, 256, 1, 0, '1664259625'),
(258, 3, 'IT-2022-0026', '30-6-2022', 1, 30, 5, 168, 1, 256, 1, 0, '1664259625'),
(259, 3, 'IT-2022-0026', '30-6-2022', 1, 30, 5, 169, 1, NULL, 1, 0, '1664259625'),
(260, 3, 'IT-2022-0027', '30-6-2022', 1, 31, 5, 33, 1, NULL, 1, 0, '1664259837'),
(261, 3, 'IT-2022-0027', '30-6-2022', 1, 31, 5, 34, 1, NULL, 1, 0, '1664259837'),
(262, 3, 'IT-2022-0027', '30-6-2022', 1, 31, 5, 39, 3, NULL, 1, 0, '1664259837'),
(263, 3, 'IT-2022-0027', '30-6-2022', 1, 31, 5, 170, 1, NULL, 1, 0, '1664259837'),
(264, 3, 'IT-2022-0027', '30-6-2022', 1, 31, 5, 171, 1, 263, 1, 0, '1664259837'),
(265, 3, 'IT-2022-0027', '30-6-2022', 1, 31, 5, 172, 1, 263, 1, 0, '1664259837'),
(266, 3, 'IT-2022-0027', '30-6-2022', 1, 31, 5, 173, 1, NULL, 1, 0, '1664259837'),
(267, 3, 'IT-2022-0027', '30-6-2022', 1, 31, 5, 174, 1, NULL, 1, 0, '1664259837'),
(268, 3, 'IT-2022-0027', '30-6-2022', 1, 31, 5, 175, 1, 267, 1, 0, '1664259837'),
(269, 3, 'IT-2022-0028', '30-6-2022', 1, 32, 5, 33, 1, NULL, 1, 0, '1664260129'),
(270, 3, 'IT-2022-0028', '30-6-2022', 1, 32, 5, 34, 1, NULL, 1, 0, '1664260129'),
(271, 3, 'IT-2022-0028', '30-6-2022', 1, 32, 5, 39, 2, NULL, 1, 0, '1664260129'),
(272, 3, 'IT-2022-0028', '30-6-2022', 1, 32, 5, 176, 1, NULL, 1, 0, '1664260129'),
(273, 3, 'IT-2022-0028', '30-6-2022', 1, 32, 5, 177, 1, 272, 1, 0, '1664260129'),
(274, 3, 'IT-2022-0028', '30-6-2022', 1, 32, 5, 178, 1, 272, 1, 0, '1664260129'),
(275, 3, 'IT-2022-0028', '30-6-2022', 1, 32, 5, 179, 1, NULL, 1, 0, '1664260129'),
(323, 3, 'IT-2022-0029', '30-6-2022', 1, 33, 5, 33, 1, NULL, 1, 0, '1664279436'),
(324, 3, 'IT-2022-0029', '30-6-2022', 1, 33, 5, 34, 1, NULL, 1, 0, '1664279436'),
(325, 3, 'IT-2022-0029', '30-6-2022', 1, 33, 5, 39, 2, NULL, 1, 0, '1664279436'),
(326, 3, 'IT-2022-0029', '30-6-2022', 1, 33, 5, 222, 1, NULL, 1, 0, '1664279436'),
(327, 3, 'IT-2022-0029', '30-6-2022', 1, 33, 5, 223, 1, 326, 1, 0, '1664279436'),
(328, 3, 'IT-2022-0029', '30-6-2022', 1, 33, 5, 224, 1, 326, 1, 0, '1664279436'),
(329, 3, 'IT-2022-0029', '30-6-2022', 1, 33, 5, 225, 1, NULL, 1, 0, '1664279436'),
(330, 3, 'IT-2022-0030', '30-6-2022', 1, 34, 5, 33, 1, NULL, 1, 0, '1664279593'),
(331, 3, 'IT-2022-0030', '30-6-2022', 1, 34, 5, 34, 1, NULL, 1, 0, '1664279593'),
(332, 3, 'IT-2022-0030', '30-6-2022', 1, 34, 5, 39, 3, NULL, 1, 0, '1664279593'),
(333, 3, 'IT-2022-0030', '30-6-2022', 1, 34, 5, 226, 1, NULL, 1, 0, '1664279593'),
(334, 3, 'IT-2022-0030', '30-6-2022', 1, 34, 5, 227, 1, 333, 1, 0, '1664279593'),
(335, 3, 'IT-2022-0030', '30-6-2022', 1, 34, 5, 228, 1, 333, 1, 0, '1664279593'),
(336, 3, 'IT-2022-0030', '30-6-2022', 1, 34, 5, 229, 1, NULL, 1, 0, '1664279593'),
(337, 3, 'IT-2022-0030', '30-6-2022', 1, 34, 5, 230, 1, NULL, 1, 0, '1664279593'),
(338, 3, 'IT-2022-0030', '30-6-2022', 1, 34, 5, 231, 1, 337, 1, 0, '1664279593'),
(339, 3, 'IT-2022-0031', '30-6-2022', 1, 36, 11, 33, 1, NULL, 1, 0, '1664279769'),
(340, 3, 'IT-2022-0031', '30-6-2022', 1, 36, 11, 34, 1, NULL, 1, 0, '1664279769'),
(341, 3, 'IT-2022-0031', '30-6-2022', 1, 36, 11, 39, 3, NULL, 1, 0, '1664279769'),
(345, 3, 'IT-2022-0031', '30-6-2022', 1, 36, 11, 235, 1, NULL, 1, 0, '1664279769'),
(346, 3, 'IT-2022-0031', '30-6-2022', 1, 36, 11, 236, 1, NULL, 1, 0, '1664279769'),
(347, 3, 'IT-2022-0031', '30-6-2022', 1, 36, 11, 237, 1, 346, 1, 0, '1664279769'),
(348, 3, 'IT-2022-0032', '30-6-2022', 1, 35, 3, 33, 1, NULL, 1, 0, '1664279955'),
(349, 3, 'IT-2022-0032', '30-6-2022', 1, 35, 3, 34, 1, NULL, 1, 0, '1664279955'),
(350, 3, 'IT-2022-0032', '30-6-2022', 1, 35, 3, 39, 3, NULL, 1, 0, '1664279955'),
(351, 3, 'IT-2022-0032', '30-6-2022', 1, 35, 3, 238, 1, NULL, 1, 0, '1664279955'),
(352, 3, 'IT-2022-0032', '30-6-2022', 1, 35, 3, 239, 1, 351, 1, 0, '1664279955'),
(353, 3, 'IT-2022-0032', '30-6-2022', 1, 35, 3, 240, 1, 351, 1, 0, '1664279955'),
(354, 3, 'IT-2022-0032', '30-6-2022', 1, 35, 3, 241, 1, NULL, 1, 0, '1664279955'),
(355, 3, 'IT-2022-0032', '30-6-2022', 1, 35, 3, 242, 1, NULL, 1, 0, '1664279955'),
(356, 3, 'IT-2022-0032', '30-6-2022', 1, 35, 3, 243, 1, 355, 1, 0, '1664279955'),
(357, 3, 'IT-2022-0033', '30-6-2022', 1, 38, 11, 33, 1, NULL, 1, 0, '1664280089'),
(358, 3, 'IT-2022-0033', '30-6-2022', 1, 38, 11, 34, 1, NULL, 1, 0, '1664280089'),
(359, 3, 'IT-2022-0033', '30-6-2022', 1, 38, 11, 39, 2, NULL, 1, 0, '1664280089'),
(360, 3, 'IT-2022-0033', '30-6-2022', 1, 38, 11, 244, 1, NULL, 1, 0, '1664280089'),
(361, 3, 'IT-2022-0033', '30-6-2022', 1, 38, 11, 245, 1, 360, 1, 0, '1664280089'),
(362, 3, 'IT-2022-0033', '30-6-2022', 1, 38, 11, 246, 1, 360, 1, 0, '1664280089'),
(363, 3, 'IT-2022-0033', '30-6-2022', 1, 38, 11, 247, 1, NULL, 1, 0, '1664280089'),
(364, 3, 'IT-2022-0034', '30-6-2022', 1, 39, 12, 33, 1, NULL, 1, 0, '1664280560'),
(365, 3, 'IT-2022-0034', '30-6-2022', 1, 39, 12, 34, 1, NULL, 1, 0, '1664280560'),
(366, 3, 'IT-2022-0034', '30-6-2022', 1, 39, 12, 39, 3, NULL, 1, 0, '1664280560'),
(367, 3, 'IT-2022-0034', '30-6-2022', 1, 39, 12, 248, 1, NULL, 1, 0, '1664280560'),
(368, 3, 'IT-2022-0034', '30-6-2022', 1, 39, 12, 249, 1, 367, 1, 0, '1664280560'),
(369, 3, 'IT-2022-0034', '30-6-2022', 1, 39, 12, 250, 1, 367, 1, 0, '1664280560'),
(370, 3, 'IT-2022-0034', '30-6-2022', 1, 39, 12, 251, 1, NULL, 1, 0, '1664280560'),
(371, 3, 'IT-2022-0034', '30-6-2022', 1, 39, 12, 252, 1, NULL, 1, 0, '1664280560'),
(372, 3, 'IT-2022-0034', '30-6-2022', 1, 39, 12, 253, 1, 371, 1, 0, '1664280560'),
(378, 4, 'IT-2022-0035', '30-6-2022', 1, 43, 14, 254, 1, NULL, 1, 0, '1664538967'),
(379, 4, 'IT-2022-0035', '30-6-2022', 1, 43, 14, 255, 1, 378, 1, 0, '1664538967'),
(380, 4, 'IT-2022-0035', '30-6-2022', 1, 43, 14, 256, 1, 378, 1, 0, '1664538967'),
(381, 4, 'IT-2022-0035', '30-6-2022', 1, 43, 14, 257, 1, NULL, 1, 0, '1664538967'),
(382, 4, 'IT-2022-0035', '30-6-2022', 1, 43, 14, 258, 2, NULL, 1, 0, '1664538967'),
(383, 4, 'IT-2022-0035', '30-6-2022', 1, 43, 14, 259, 1, NULL, 1, 0, '1664538967'),
(384, 4, 'IT-2022-0035', '30-6-2022', 1, 43, 14, 260, 1, NULL, 1, 0, '1664538967'),
(385, 4, 'IT-2022-0035', '30-6-2022', 1, 43, 14, 261, 1, NULL, 1, 0, '1664538967'),
(386, 4, 'IT-2022-0035', '30-6-2022', 1, 43, 14, 270, 1, NULL, 1, 0, '1664539388'),
(387, 4, 'IT-2022-0035', '30-6-2022', 1, 43, 14, 271, 1, 386, 1, 0, '1664539388'),
(388, 4, 'IT-2022-0035', '30-6-2022', 1, 43, 14, 272, 1, NULL, 1, 0, '1664539388'),
(389, 4, 'IT-2022-0035', '30-6-2022', 1, 43, 14, 273, 1, NULL, 1, 0, '1664539388'),
(390, 4, 'IT-2022-0036', '30-6-2022', 1, 44, 15, 262, 1, NULL, 1, 0, '1664540275'),
(391, 4, 'IT-2022-0036', '30-6-2022', 1, 44, 15, 263, 1, 390, 1, 0, '1664540275'),
(392, 4, 'IT-2022-0036', '30-6-2022', 1, 44, 15, 264, 1, 390, 1, 0, '1664540275'),
(393, 4, 'IT-2022-0036', '30-6-2022', 1, 44, 15, 265, 1, NULL, 1, 0, '1664540275'),
(394, 4, 'IT-2022-0036', '30-6-2022', 1, 44, 15, 266, 2, NULL, 1, 0, '1664540275'),
(395, 4, 'IT-2022-0036', '30-6-2022', 1, 44, 15, 267, 1, NULL, 1, 0, '1664540275'),
(396, 4, 'IT-2022-0036', '30-6-2022', 1, 44, 15, 268, 1, NULL, 1, 0, '1664540275'),
(397, 4, 'IT-2022-0036', '30-6-2022', 1, 44, 15, 269, 1, NULL, 1, 0, '1664540275'),
(398, 3, 'IT-2022-0031', '30-6-2022', 1, 36, 11, 232, 1, NULL, 1, 0, '1664541375'),
(399, 3, 'IT-2022-0031', '30-6-2022', 1, 36, 11, 233, 1, 398, 1, 0, '1664541375'),
(400, 3, 'IT-2022-0031', '30-6-2022', 1, 36, 11, 234, 1, 398, 1, 0, '1664541375');

-- --------------------------------------------------------

--
-- Table structure for table `faulty_assets`
--

CREATE TABLE `faulty_assets` (
  `id` int(11) NOT NULL,
  `voucher_number` varchar(225) NOT NULL,
  `people_id` int(11) NOT NULL,
  `asset_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `active_status` int(11) NOT NULL,
  `delete_status` int(11) NOT NULL,
  `time_created` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `id` int(11) NOT NULL,
  `location_name` varchar(225) NOT NULL,
  `location_address` varchar(225) NOT NULL,
  `location_city` varchar(225) NOT NULL,
  `active_status` int(11) NOT NULL DEFAULT 1,
  `delete_status` int(11) NOT NULL DEFAULT 0,
  `time_created` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `location_name`, `location_address`, `location_city`, `active_status`, `delete_status`, `time_created`) VALUES
(1, 'TIP Main Branch', 'Khanpur Road Haripur', 'Haripur', 1, 0, '1663066592'),
(2, 'Islamabad Branch', 'Islamabad', 'Islamabad', 1, 0, '1663067705'),
(3, 'Lahore Branch', 'Lahore', 'Lahore', 1, 0, '1663067742'),
(4, 'Karachi Branch', 'Karachi', 'Karachi', 1, 0, '1663067767');

-- --------------------------------------------------------

--
-- Table structure for table `peoples`
--

CREATE TABLE `peoples` (
  `id` int(11) NOT NULL,
  `people_id` varchar(225) NOT NULL,
  `people_name` varchar(225) NOT NULL,
  `designation` varchar(225) NOT NULL,
  `department_id` int(11) NOT NULL,
  `active_status` int(11) NOT NULL DEFAULT 1,
  `delete_status` int(11) NOT NULL DEFAULT 0,
  `time_created` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `peoples`
--

INSERT INTO `peoples` (`id`, `people_id`, `people_name`, `designation`, `department_id`, `active_status`, `delete_status`, `time_created`) VALUES
(1, '04-283', 'Fahad Yousaf', 'Cheif Information Officer', 1, 1, 0, '1663223344'),
(2, '', 'Nasir Razzaq', 'Chief Finance Officer', 2, 1, 0, '1663223538'),
(3, '', 'Waqar Hassan', 'Chief Internal Audit', 4, 1, 0, '1663223597'),
(4, '', 'Amar Ali Khan', 'Head of Department', 5, 1, 0, '1663223682'),
(6, '10045', 'Muhammad Iqbal', 'Deputy  Manager', 1, 1, 0, '1664190109'),
(7, '10048', 'Saleem Khan ', 'Deputy  Manager', 1, 1, 0, '1664190137'),
(8, '30007', 'Mushtaq Ahmed', 'Associate Engineer', 6, 1, 0, '1664190505'),
(9, '30023', 'Muhammad Tariq ', 'Associate Engineer', 6, 1, 0, '1664190586'),
(10, '30208', 'Zahid Gull Khan', 'Associate Engineer', 7, 1, 0, '1664190672'),
(11, '30202', 'Naseer Ahmed', 'Associate Engineer', 7, 1, 0, '1664190696'),
(12, '30045', 'Sohail Imdad', 'Associate Engineer', 7, 1, 0, '1664190712'),
(13, '20154', 'Kamran Rashid', 'Executive', 7, 1, 0, '1664190930'),
(14, '10257', 'Zamurad Khan', 'Senior Executive', 8, 1, 0, '1664191077'),
(15, '30025', 'Muhammad Ali Baig', 'Associate Engineer', 12, 1, 0, '1664191134'),
(16, '20165', 'Muhammad Naeem Malik', 'Associate Engineer', 8, 1, 0, '1664191235'),
(17, '20164', 'Khalid Mehmood', 'Associate Engineer', 2, 1, 0, '1664192224'),
(18, '30087', 'Muhammad Jamil', 'Accountant', 2, 1, 0, '1664192250'),
(19, '30089', 'Tariq Jhangir ', 'Accountant', 2, 1, 0, '1664192278'),
(20, '30084', 'Qayum Nawaz ', 'senior Accountant', 2, 1, 0, '1664192306'),
(21, '20172', 'Muhammad Feroz', 'Associate Engineer', 2, 1, 0, '1664192330'),
(22, 'ES-1', 'Said Afsar', 'Accountant', 2, 1, 0, '1664192346'),
(23, 'ES-2', 'Mumtaz ', 'Senior Accountant', 2, 1, 0, '1664192369'),
(24, 'ES-3', 'Sheraz Mehmood ', 'Accountant', 2, 1, 0, '1664192391'),
(25, 'ES-4', 'Arshad Khan', 'Accountant', 2, 1, 0, '1664192403'),
(26, '30044', 'Kamran  Fakhar', 'Associate Engineer', 9, 1, 0, '1664192468'),
(27, '30513', 'Iftikhar Ahmed', 'Associate Engineer', 9, 1, 0, '1664192495'),
(28, '10034', 'Iftikhar Ahmed', 'Deputy  Manager', 10, 1, 0, '1664192515'),
(29, '20158', 'Muhammad Ramzan', 'Executive', 13, 1, 0, '1664192649'),
(30, '30009', 'Iftikhar Ahmed', 'Associate Engineer', 10, 1, 0, '1664192666'),
(31, '30010', 'Taj Muhammad', 'Associate Engineer', 5, 1, 0, '1664192688'),
(32, '30313', 'Tahir Jan', 'Associate Engineer', 5, 1, 0, '1664192698'),
(33, '30006', 'Abdul Hameed', 'Associate Engineer', 5, 1, 0, '1664192720'),
(34, '20162', 'Khalid Mehmood Abbasi', 'Executive', 5, 1, 0, '1664192739'),
(35, '80172', 'Muhammad Waseem ', 'Deputy  Manager', 3, 1, 0, '1664192805'),
(36, '30113', 'Bakhsheesh Ellahi', 'Technical Assistant', 11, 1, 0, '1664272392'),
(37, '', 'Waseem ', 'Deputy  Manager', 11, 1, 1, '1664272444'),
(38, '40301', 'Atif Ali', 'Executive', 11, 1, 0, '1664272518'),
(39, '30097', 'Zafar Mehmood', 'Senior Assistant', 12, 1, 0, '1664280526'),
(43, '30069', 'Muhammad Waseem Khan', 'Associate Engineer', 14, 1, 0, '1664538890'),
(44, '30177', 'Muhammad Waseem', 'Associate Engineer', 15, 1, 0, '1664539536');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_login` varchar(225) NOT NULL,
  `user_pass` varchar(225) NOT NULL,
  `display_name` varchar(225) NOT NULL,
  `role` int(11) NOT NULL DEFAULT 1,
  `type` int(11) NOT NULL DEFAULT 1,
  `login_status` int(11) NOT NULL,
  `active_status` int(11) NOT NULL DEFAULT 1,
  `delete_status` int(11) NOT NULL DEFAULT 0,
  `time_created` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_login`, `user_pass`, `display_name`, `role`, `type`, `login_status`, `active_status`, `delete_status`, `time_created`) VALUES
(1, 'admin', 'admin', 'Admin', 0, 0, 1, 1, 0, '1663042790'),
(2, 'muhammadsaifullahasif', 'saifi', 'Muhammad Saifullah Asif', 0, 0, 1, 1, 0, '1663233747'),
(3, 'zain', 'zain', 'Zain', 1, 1, 1, 1, 0, '1663236322'),
(4, 'arsalan', 'arsalan', 'Arsalan', 1, 1, 0, 1, 0, '1664533553');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assets`
--
ALTER TABLE `assets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `asset_meta`
--
ALTER TABLE `asset_meta`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `defect_assets`
--
ALTER TABLE `defect_assets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deploy_assets`
--
ALTER TABLE `deploy_assets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faulty_assets`
--
ALTER TABLE `faulty_assets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `peoples`
--
ALTER TABLE `peoples`
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
-- AUTO_INCREMENT for table `assets`
--
ALTER TABLE `assets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=304;

--
-- AUTO_INCREMENT for table `asset_meta`
--
ALTER TABLE `asset_meta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=626;

--
-- AUTO_INCREMENT for table `defect_assets`
--
ALTER TABLE `defect_assets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `deploy_assets`
--
ALTER TABLE `deploy_assets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=401;

--
-- AUTO_INCREMENT for table `faulty_assets`
--
ALTER TABLE `faulty_assets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `peoples`
--
ALTER TABLE `peoples`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
