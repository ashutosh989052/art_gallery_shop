-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 07, 2024 at 03:58 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `art_gallery_shop_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `address` varchar(255) NOT NULL,
  `area` varchar(22) NOT NULL,
  `district` varchar(100) NOT NULL,
  `pincode` varchar(10) NOT NULL,
  `order_details` text NOT NULL,
  `total_amount` decimal(10,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `name`, `email`, `mobile`, `address`, `area`, `district`, `pincode`, `order_details`, `total_amount`, `created_at`) VALUES
(15, 'Ashutosh', 'ashu@gmail.com', '9890525854', 'Ashu chintamni appartment', 'Ashoknagar (Nanded)', 'Nanded', '431605', '[{\"item_name\":\"Product2\",\"quantity\":\"1\",\"price\":\"48.85\",\"total\":48.85},{\"item_name\":\"Product1\",\"quantity\":\"1\",\"price\":\"22.74\",\"total\":22.74},{\"item_name\":\"Product10\",\"quantity\":\"1\",\"price\":\"22.65\",\"total\":22.65}]', 94.24, '2024-05-02 06:00:53'),
(16, 'Ashutosh', 'ashu@gmail.com', '9890525854', '303, chintamani appartment shiv vijay colony ', 'Ashoknagar (Nanded)', 'Nanded', '431605', '[{\"item_name\":\"Product2\",\"quantity\":\"1\",\"price\":\"48.85\",\"total\":48.85},{\"item_name\":\"Product10\",\"quantity\":\"1\",\"price\":\"22.65\",\"total\":22.65}]', 71.50, '2024-05-02 06:21:36'),
(17, 'Ashu', 'ashu@gmail.com', '9856789123', 'Nanded appartment namaste namaste ', 'Bhusari Colony', 'Pune', '411038', '[{\"item_name\":\"Product1\",\"quantity\":\"1\",\"price\":\"22.74\",\"total\":22.74}]', 22.74, '2024-05-02 09:56:30'),
(18, 'Ashutosh Kalyankar', 'ashu@gmail.com', '9890525854', '303, chintamani appartment shiv vijay colony chaitany nagar ', 'Ashoknagar (Nanded)', 'Nanded', '431605', '[{\"item_name\":\"Product3\",\"quantity\":\"1\",\"price\":\"86.00\",\"total\":86}]', 86.00, '2024-05-02 13:26:36'),
(19, 'Piyush Manoorkar', 'ashu@gmail.com', '9890525854', 'Chintamani Apartment Chaitanya Nagar', 'Ashoknagar (Nanded)', 'Nanded', '431605', '[{\"item_name\":\"Product10\",\"quantity\":\"1\",\"price\":\"22.65\",\"total\":22.65},{\"item_name\":\"Product9\",\"quantity\":\"1\",\"price\":\"54.59\",\"total\":54.59},{\"item_name\":\"Product6\",\"quantity\":\"1\",\"price\":\"46.21\",\"total\":46.21}]', 123.45, '2024-05-02 21:02:57'),
(20, 'Piyush Manoorkar', 'ashu@gmail.com', '9890525854', 'mokate nagar, kothrud, pune', 'Ashoknagar (Nanded)', 'Nanded', '431605', '[{\"item_name\":\"Product2\",\"quantity\":\"1\",\"price\":\"48.85\",\"total\":48.85},{\"item_name\":\"Product5\",\"quantity\":\"1\",\"price\":\"59.32\",\"total\":59.32}]', 108.17, '2024-05-02 21:04:57'),
(21, 'Piyush Manoorkar', 'ashu@gmail.com', '9890525854', 'Shiv vijay colony', 'Ashoknagar (Nanded)', 'Nanded', '431605', '[{\"item_name\":\"Product2\",\"quantity\":\"1\",\"price\":\"48.85\",\"total\":48.85}]', 48.85, '2024-05-02 21:06:04'),
(22, 'Ashutosh vankati kalyankar', 'ashu@gmail.com', '9309530158', 'Chintamani Apartment Chaitanya Nagar', 'Ashoknagar (Nanded)', 'Nanded', '431605', '[{\"item_name\":\"Product2\",\"quantity\":\"1\",\"price\":\"48.85\",\"total\":48.85},{\"item_name\":\"Product7\",\"quantity\":\"5\",\"price\":\"33.08\",\"total\":165.39999999999998},{\"item_name\":\"Product9\",\"quantity\":\"5\",\"price\":\"54.59\",\"total\":272.95000000000005}]', 487.20, '2024-05-02 21:14:45'),
(23, 'Ashutosh vankati kalyankar', 'ashu@gmail.com', '9309530158', 'Chintamani Apartment Chaitanya Nagar', 'Ashoknagar (Nanded)', 'Nanded', '431605', '[{\"item_name\":\"Product3\",\"quantity\":\"1\",\"price\":\"86.00\",\"total\":86}]', 86.00, '2024-05-02 21:16:59'),
(24, 'Ashutosh vankati kalyankar', 'ashu@gmail.com', '9309530158', 'Chintamani Apartment Chaitanya Nagar', 'Babhali', 'Hingoli', '431702', '[{\"item_name\":\"Product3\",\"quantity\":\"1\",\"price\":\"86.00\",\"total\":86}]', 86.00, '2024-05-02 21:17:42'),
(25, 'Ashutosh vankati kalyankar', 'shivani@gmail.com', '9309530158', 'Chintamani Apartment Chaitanya Nagar', 'Babhali', 'Hingoli', '431702', '[{\"item_name\":\"Product2\",\"quantity\":\"1\",\"price\":\"48.85\",\"total\":48.85},{\"item_name\":\"Product2\",\"quantity\":\"1\",\"price\":\"48.85\",\"total\":48.85}]', 97.70, '2024-05-02 22:41:04'),
(26, 'Ashutosh vankati kalyankar', 'shivani@gmail.com', '9309530158', 'Chintamani Apartment Chaitanya Nagar', 'Babhali', 'Hingoli', '431702', '[{\"item_name\":\"Product2\",\"quantity\":\"1\",\"price\":\"48.85\",\"total\":48.85},{\"item_name\":\"Product2\",\"quantity\":\"1\",\"price\":\"48.85\",\"total\":48.85}]', 97.70, '2024-05-02 22:41:06'),
(27, 'Ashutosh Kalyankar', 'ashu989052@gmail.com', '9890525854', '303, chintamani appartment nanded', 'Ashoknagar (Nanded)', 'Nanded', '431605', '[{\"item_name\":\"Product2\",\"quantity\":\"1\",\"price\":\"48.85\",\"total\":48.85},{\"item_name\":\"Product3\",\"quantity\":\"1\",\"price\":\"86.00\",\"total\":86},{\"item_name\":\"Product11\",\"quantity\":\"1\",\"price\":\"69.48\",\"total\":69.48}]', 204.33, '2024-05-07 00:39:10'),
(28, 'Ashutosh Kalyankar', 'ashu989052@gmail.com', '9890525854', '303, chintamani appartment', 'Ashoknagar (Nanded)', 'Nanded', '431605', '[{\"item_name\":\"Product2\",\"quantity\":\"1\",\"price\":\"48.85\",\"total\":48.85},{\"item_name\":\"Product3\",\"quantity\":\"1\",\"price\":\"86.00\",\"total\":86},{\"item_name\":\"Product11\",\"quantity\":\"1\",\"price\":\"69.48\",\"total\":69.48},{\"item_name\":\"Product2\",\"quantity\":\"1\",\"price\":\"48.85\",\"total\":48.85},{\"item_name\":\"Product9\",\"quantity\":\"1\",\"price\":\"54.59\",\"total\":54.59},{\"item_name\":\"Product11\",\"quantity\":\"1\",\"price\":\"69.48\",\"total\":69.48}]', 377.25, '2024-05-07 00:45:20'),
(29, 'Ashutosh Kalyankar', 'ashu989052@gmail.com', '9890525854', '303, chintamani appartment', 'Ashoknagar (Nanded)', 'Nanded', '431605', '[{\"item_name\":\"Product2\",\"quantity\":\"1\",\"price\":\"48.85\",\"total\":48.85},{\"item_name\":\"Product3\",\"quantity\":\"1\",\"price\":\"86.00\",\"total\":86},{\"item_name\":\"Product11\",\"quantity\":\"1\",\"price\":\"69.48\",\"total\":69.48},{\"item_name\":\"Product2\",\"quantity\":\"1\",\"price\":\"48.85\",\"total\":48.85},{\"item_name\":\"Product9\",\"quantity\":\"1\",\"price\":\"54.59\",\"total\":54.59},{\"item_name\":\"Product11\",\"quantity\":\"1\",\"price\":\"69.48\",\"total\":69.48},{\"item_name\":\"Product2\",\"quantity\":\"1\",\"price\":\"48.85\",\"total\":48.85},{\"item_name\":\"Product1\",\"quantity\":\"1\",\"price\":\"22.74\",\"total\":22.74},{\"item_name\":\"Product10\",\"quantity\":\"3\",\"price\":\"22.65\",\"total\":67.94999999999999}]', 516.79, '2024-05-07 00:49:50'),
(30, 'Ashutosh Kalyankar', 'ashu989052@gmail.com', '9890525854', '303, chintamani appartment', 'Asrjan', 'Nanded', '431606', '[{\"item_name\":\"Product2\",\"quantity\":\"1\",\"price\":\"48.85\",\"total\":48.85},{\"item_name\":\"Product3\",\"quantity\":\"1\",\"price\":\"86.00\",\"total\":86},{\"item_name\":\"Product11\",\"quantity\":\"1\",\"price\":\"69.48\",\"total\":69.48},{\"item_name\":\"Product2\",\"quantity\":\"1\",\"price\":\"48.85\",\"total\":48.85},{\"item_name\":\"Product9\",\"quantity\":\"1\",\"price\":\"54.59\",\"total\":54.59},{\"item_name\":\"Product11\",\"quantity\":\"1\",\"price\":\"69.48\",\"total\":69.48},{\"item_name\":\"Product2\",\"quantity\":\"1\",\"price\":\"48.85\",\"total\":48.85},{\"item_name\":\"Product1\",\"quantity\":\"1\",\"price\":\"22.74\",\"total\":22.74},{\"item_name\":\"Product10\",\"quantity\":\"3\",\"price\":\"22.65\",\"total\":67.94999999999999}]', 516.79, '2024-05-07 00:52:18'),
(31, 'Ashutosh Kalyankar', 'ashu989052@gmail.com', '9890525854', '303, chintamani appartment', 'Barbada', 'Nanded', '431602', '[{\"item_name\":\"Product2\",\"quantity\":\"1\",\"price\":\"48.85\",\"total\":48.85},{\"item_name\":\"Product3\",\"quantity\":\"1\",\"price\":\"86.00\",\"total\":86},{\"item_name\":\"Product11\",\"quantity\":\"1\",\"price\":\"69.48\",\"total\":69.48},{\"item_name\":\"Product2\",\"quantity\":\"1\",\"price\":\"48.85\",\"total\":48.85},{\"item_name\":\"Product9\",\"quantity\":\"1\",\"price\":\"54.59\",\"total\":54.59},{\"item_name\":\"Product11\",\"quantity\":\"1\",\"price\":\"69.48\",\"total\":69.48},{\"item_name\":\"Product2\",\"quantity\":\"1\",\"price\":\"48.85\",\"total\":48.85},{\"item_name\":\"Product1\",\"quantity\":\"1\",\"price\":\"22.74\",\"total\":22.74},{\"item_name\":\"Product10\",\"quantity\":\"3\",\"price\":\"22.65\",\"total\":67.94999999999999}]', 516.79, '2024-05-07 00:53:46'),
(32, 'Ashutosh Kalyankar', 'ashu989052@gmail.com', '9890525854', '303, chintamani appartment', 'Ashoknagar (Nanded)', 'Nanded', '431605', '[{\"item_name\":\"Product2\",\"quantity\":\"1\",\"price\":\"48.85\",\"total\":48.85},{\"item_name\":\"Product3\",\"quantity\":\"1\",\"price\":\"86.00\",\"total\":86},{\"item_name\":\"Product11\",\"quantity\":\"1\",\"price\":\"69.48\",\"total\":69.48},{\"item_name\":\"Product2\",\"quantity\":\"1\",\"price\":\"48.85\",\"total\":48.85},{\"item_name\":\"Product9\",\"quantity\":\"1\",\"price\":\"54.59\",\"total\":54.59},{\"item_name\":\"Product11\",\"quantity\":\"1\",\"price\":\"69.48\",\"total\":69.48},{\"item_name\":\"Product2\",\"quantity\":\"1\",\"price\":\"48.85\",\"total\":48.85},{\"item_name\":\"Product1\",\"quantity\":\"1\",\"price\":\"22.74\",\"total\":22.74},{\"item_name\":\"Product10\",\"quantity\":\"3\",\"price\":\"22.65\",\"total\":67.94999999999999}]', 516.79, '2024-05-07 00:54:29'),
(33, 'Ashutosh Kalyankar', 'ashu989052@gmail.com', '9890525854', '303, chintamani appartment', 'Asrjan', 'Nanded', '431606', '[{\"item_name\":\"Product2\",\"quantity\":\"1\",\"price\":\"48.85\",\"total\":48.85},{\"item_name\":\"Product3\",\"quantity\":\"1\",\"price\":\"86.00\",\"total\":86},{\"item_name\":\"Product11\",\"quantity\":\"1\",\"price\":\"69.48\",\"total\":69.48},{\"item_name\":\"Product2\",\"quantity\":\"1\",\"price\":\"48.85\",\"total\":48.85},{\"item_name\":\"Product9\",\"quantity\":\"1\",\"price\":\"54.59\",\"total\":54.59},{\"item_name\":\"Product11\",\"quantity\":\"1\",\"price\":\"69.48\",\"total\":69.48},{\"item_name\":\"Product2\",\"quantity\":\"1\",\"price\":\"48.85\",\"total\":48.85},{\"item_name\":\"Product1\",\"quantity\":\"1\",\"price\":\"22.74\",\"total\":22.74},{\"item_name\":\"Product10\",\"quantity\":\"3\",\"price\":\"22.65\",\"total\":67.94999999999999}]', 516.79, '2024-05-07 01:04:36'),
(34, 'Ashutosh Kalyankar', 'ashu989052@gmail.com', '9890525854', '303, chintamani appartment', 'Ashoknagar (Nanded)', 'Nanded', '431605', '[{\"item_name\":\"Product2\",\"quantity\":\"1\",\"price\":\"48.85\",\"total\":48.85},{\"item_name\":\"Product3\",\"quantity\":\"1\",\"price\":\"86.00\",\"total\":86},{\"item_name\":\"Product11\",\"quantity\":\"1\",\"price\":\"69.48\",\"total\":69.48},{\"item_name\":\"Product2\",\"quantity\":\"1\",\"price\":\"48.85\",\"total\":48.85},{\"item_name\":\"Product9\",\"quantity\":\"1\",\"price\":\"54.59\",\"total\":54.59},{\"item_name\":\"Product11\",\"quantity\":\"1\",\"price\":\"69.48\",\"total\":69.48},{\"item_name\":\"Product2\",\"quantity\":\"1\",\"price\":\"48.85\",\"total\":48.85},{\"item_name\":\"Product1\",\"quantity\":\"1\",\"price\":\"22.74\",\"total\":22.74},{\"item_name\":\"Product10\",\"quantity\":\"3\",\"price\":\"22.65\",\"total\":67.94999999999999}]', 516.79, '2024-05-07 01:07:50'),
(35, 'Ashutosh Kalyankar', 'ashu989052@gmail.com', '9890525854', '303, chintamani appartment', 'Asrjan', 'Nanded', '431606', '[{\"item_name\":\"Product2\",\"quantity\":\"1\",\"price\":\"48.85\",\"total\":48.85},{\"item_name\":\"Product3\",\"quantity\":\"1\",\"price\":\"86.00\",\"total\":86},{\"item_name\":\"Product11\",\"quantity\":\"1\",\"price\":\"69.48\",\"total\":69.48},{\"item_name\":\"Product2\",\"quantity\":\"1\",\"price\":\"48.85\",\"total\":48.85},{\"item_name\":\"Product9\",\"quantity\":\"1\",\"price\":\"54.59\",\"total\":54.59},{\"item_name\":\"Product11\",\"quantity\":\"1\",\"price\":\"69.48\",\"total\":69.48},{\"item_name\":\"Product2\",\"quantity\":\"1\",\"price\":\"48.85\",\"total\":48.85},{\"item_name\":\"Product1\",\"quantity\":\"1\",\"price\":\"22.74\",\"total\":22.74},{\"item_name\":\"Product10\",\"quantity\":\"3\",\"price\":\"22.65\",\"total\":67.94999999999999}]', 516.79, '2024-05-07 01:09:43'),
(36, 'Ashutosh Kalyankar', 'ashu989052@gmail.com', '9890525854', '303, chintamani appartment', 'Chauphala', 'Nanded', '431604', '[{\"item_name\":\"Product2\",\"quantity\":\"1\",\"price\":\"48.85\",\"total\":48.85},{\"item_name\":\"Product3\",\"quantity\":\"1\",\"price\":\"86.00\",\"total\":86},{\"item_name\":\"Product11\",\"quantity\":\"1\",\"price\":\"69.48\",\"total\":69.48},{\"item_name\":\"Product2\",\"quantity\":\"1\",\"price\":\"48.85\",\"total\":48.85},{\"item_name\":\"Product9\",\"quantity\":\"1\",\"price\":\"54.59\",\"total\":54.59},{\"item_name\":\"Product11\",\"quantity\":\"1\",\"price\":\"69.48\",\"total\":69.48},{\"item_name\":\"Product2\",\"quantity\":\"1\",\"price\":\"48.85\",\"total\":48.85},{\"item_name\":\"Product1\",\"quantity\":\"1\",\"price\":\"22.74\",\"total\":22.74},{\"item_name\":\"Product10\",\"quantity\":\"3\",\"price\":\"22.65\",\"total\":67.94999999999999}]', 516.79, '2024-05-07 01:10:20'),
(37, 'Ashutosh Kalyankar', 'ashu989052@gmail.com', '9890525854', '303, chintamani appartment', 'Ashoknagar (Nanded)', 'Nanded', '431605', '[{\"item_name\":\"Product2\",\"quantity\":\"1\",\"price\":\"48.85\",\"total\":48.85},{\"item_name\":\"Product3\",\"quantity\":\"1\",\"price\":\"86.00\",\"total\":86},{\"item_name\":\"Product11\",\"quantity\":\"1\",\"price\":\"69.48\",\"total\":69.48},{\"item_name\":\"Product2\",\"quantity\":\"1\",\"price\":\"48.85\",\"total\":48.85},{\"item_name\":\"Product9\",\"quantity\":\"1\",\"price\":\"54.59\",\"total\":54.59},{\"item_name\":\"Product11\",\"quantity\":\"1\",\"price\":\"69.48\",\"total\":69.48},{\"item_name\":\"Product2\",\"quantity\":\"1\",\"price\":\"48.85\",\"total\":48.85},{\"item_name\":\"Product1\",\"quantity\":\"1\",\"price\":\"22.74\",\"total\":22.74},{\"item_name\":\"Product10\",\"quantity\":\"3\",\"price\":\"22.65\",\"total\":67.94999999999999}]', 516.79, '2024-05-07 01:12:43'),
(38, 'Ashutosh Kalyankar', 'ashu989052@gmail.com', '9890525854', '303, chintamani appartment', 'Millgate Nanded', 'Nanded', '431601', '[{\"item_name\":\"Product2\",\"quantity\":\"1\",\"price\":\"48.85\",\"total\":48.85},{\"item_name\":\"Product3\",\"quantity\":\"1\",\"price\":\"86.00\",\"total\":86},{\"item_name\":\"Product11\",\"quantity\":\"1\",\"price\":\"69.48\",\"total\":69.48},{\"item_name\":\"Product2\",\"quantity\":\"1\",\"price\":\"48.85\",\"total\":48.85},{\"item_name\":\"Product9\",\"quantity\":\"1\",\"price\":\"54.59\",\"total\":54.59},{\"item_name\":\"Product11\",\"quantity\":\"1\",\"price\":\"69.48\",\"total\":69.48},{\"item_name\":\"Product2\",\"quantity\":\"1\",\"price\":\"48.85\",\"total\":48.85},{\"item_name\":\"Product1\",\"quantity\":\"1\",\"price\":\"22.74\",\"total\":22.74},{\"item_name\":\"Product10\",\"quantity\":\"3\",\"price\":\"22.65\",\"total\":67.94999999999999}]', 516.79, '2024-05-07 01:13:50'),
(39, 'Ashutosh Kalyankar', 'ashu989052@gmail.com', '9890525854', '303, chintamani appartment', 'Ashoknagar (Nanded)', 'Nanded', '431605', '[{\"item_name\":\"Product2\",\"quantity\":\"1\",\"price\":\"48.85\",\"total\":48.85},{\"item_name\":\"Product3\",\"quantity\":\"1\",\"price\":\"86.00\",\"total\":86},{\"item_name\":\"Product11\",\"quantity\":\"1\",\"price\":\"69.48\",\"total\":69.48},{\"item_name\":\"Product2\",\"quantity\":\"1\",\"price\":\"48.85\",\"total\":48.85},{\"item_name\":\"Product9\",\"quantity\":\"1\",\"price\":\"54.59\",\"total\":54.59},{\"item_name\":\"Product11\",\"quantity\":\"1\",\"price\":\"69.48\",\"total\":69.48},{\"item_name\":\"Product2\",\"quantity\":\"1\",\"price\":\"48.85\",\"total\":48.85},{\"item_name\":\"Product1\",\"quantity\":\"1\",\"price\":\"22.74\",\"total\":22.74},{\"item_name\":\"Product10\",\"quantity\":\"3\",\"price\":\"22.65\",\"total\":67.94999999999999}]', 516.79, '2024-05-07 01:14:34'),
(40, 'Ashutosh Kalyankar', 'ashu989052@gmail.com', '9890525854', '303, chintamani appartment', 'Ashoknagar (Nanded)', 'Nanded', '431605', '[{\"item_name\":\"Product2\",\"quantity\":\"4\",\"price\":\"48.85\",\"total\":195.4},{\"item_name\":\"Product10\",\"quantity\":\"4\",\"price\":\"22.65\",\"total\":90.6},{\"item_name\":\"Product9\",\"quantity\":\"4\",\"price\":\"54.59\",\"total\":218.36}]', 504.36, '2024-05-07 01:16:59'),
(41, 'Ashutosh Kalyankar', 'ashu989052@gmail.com', '9890525854', '303, chintamani appartment', 'Barbada', 'Nanded', '431602', '[{\"item_name\":\"Product2\",\"quantity\":\"4\",\"price\":\"48.85\",\"total\":195.4},{\"item_name\":\"Product10\",\"quantity\":\"4\",\"price\":\"22.65\",\"total\":90.6},{\"item_name\":\"Product9\",\"quantity\":\"4\",\"price\":\"54.59\",\"total\":218.36}]', 504.36, '2024-05-07 01:18:06'),
(42, 'Ashutosh Kalyankar', 'ashu989052@gmail.com', '9890525854', '303, chintamani appartment', 'Ashoknagar (Nanded)', 'Nanded', '431605', '[{\"item_name\":\"Product2\",\"quantity\":\"4\",\"price\":\"48.85\",\"total\":195.4},{\"item_name\":\"Product10\",\"quantity\":\"4\",\"price\":\"22.65\",\"total\":90.6},{\"item_name\":\"Product9\",\"quantity\":\"4\",\"price\":\"54.59\",\"total\":218.36}]', 504.36, '2024-05-07 01:20:27'),
(43, 'Ashutosh Kalyankar', 'ashu989052@gmail.com', '9890525854', '303, chintamani appartment', 'Chauphala', 'Nanded', '431604', '[{\"item_name\":\"Product2\",\"quantity\":\"4\",\"price\":\"48.85\",\"total\":195.4},{\"item_name\":\"Product10\",\"quantity\":\"4\",\"price\":\"22.65\",\"total\":90.6},{\"item_name\":\"Product9\",\"quantity\":\"4\",\"price\":\"54.59\",\"total\":218.36}]', 504.36, '2024-05-07 01:22:46'),
(44, 'Ashutosh Kalyankar', 'ashu989052@gmail.com', '9890525854', '303, chintamani appartment', 'Ashoknagar (Nanded)', 'Nanded', '431605', '[{\"item_name\":\"Product2\",\"quantity\":\"4\",\"price\":\"48.85\",\"total\":195.4},{\"item_name\":\"Product10\",\"quantity\":\"4\",\"price\":\"22.65\",\"total\":90.6},{\"item_name\":\"Product9\",\"quantity\":\"4\",\"price\":\"54.59\",\"total\":218.36}]', 504.36, '2024-05-07 01:28:44'),
(45, 'Ashutosh Kalyankar', 'ashu989052@gmail.com', '9890525854', '303, chintamani appartment', 'Barbada', 'Nanded', '431602', '[{\"item_name\":\"Product2\",\"quantity\":\"4\",\"price\":\"48.85\",\"total\":195.4},{\"item_name\":\"Product10\",\"quantity\":\"4\",\"price\":\"22.65\",\"total\":90.6},{\"item_name\":\"Product9\",\"quantity\":\"4\",\"price\":\"54.59\",\"total\":218.36}]', 504.36, '2024-05-07 01:29:23'),
(46, 'Ashutosh Kalyankar', 'ashu989052@gmail.com', '9890525854', '303, chintamani appartment', 'Chauphala', 'Nanded', '431604', '[{\"item_name\":\"Product2\",\"quantity\":\"4\",\"price\":\"48.85\",\"total\":195.4},{\"item_name\":\"Product10\",\"quantity\":\"4\",\"price\":\"22.65\",\"total\":90.6},{\"item_name\":\"Product9\",\"quantity\":\"4\",\"price\":\"54.59\",\"total\":218.36}]', 504.36, '2024-05-07 01:30:43'),
(47, 'Ashutosh Kalyankar', 'ashu989052@gmail.com', '9890525854', '303, chintamani appartment', 'Ashoknagar (Nanded)', 'Nanded', '431605', '[{\"item_name\":\"Product2\",\"quantity\":\"4\",\"price\":\"48.85\",\"total\":195.4},{\"item_name\":\"Product10\",\"quantity\":\"4\",\"price\":\"22.65\",\"total\":90.6},{\"item_name\":\"Product9\",\"quantity\":\"4\",\"price\":\"54.59\",\"total\":218.36}]', 504.36, '2024-05-07 01:32:29'),
(48, 'Ashutosh Kalyankar', 'ashu989052@gmail.com', '9890525854', '303, chintamani appartment', 'Cidco Nanded', 'Nanded', '431603', '[{\"item_name\":\"Product2\",\"quantity\":\"4\",\"price\":\"48.85\",\"total\":195.4},{\"item_name\":\"Product10\",\"quantity\":\"4\",\"price\":\"22.65\",\"total\":90.6},{\"item_name\":\"Product9\",\"quantity\":\"4\",\"price\":\"54.59\",\"total\":218.36}]', 504.36, '2024-05-07 01:34:46'),
(49, 'Ashutosh Kalyankar', 'ashu989052@gmail.com', '9890525854', '303, chintamani appartment', 'Barbada', 'Nanded', '431602', '[{\"item_name\":\"Product2\",\"quantity\":\"4\",\"price\":\"48.85\",\"total\":195.4},{\"item_name\":\"Product10\",\"quantity\":\"4\",\"price\":\"22.65\",\"total\":90.6},{\"item_name\":\"Product9\",\"quantity\":\"4\",\"price\":\"54.59\",\"total\":218.36}]', 504.36, '2024-05-07 01:35:46'),
(50, 'Ashutosh Kalyankar', 'ashu989052@gmail.com', '9890525854', '303, chintamani appartment', 'Chauphala', 'Nanded', '431604', '[{\"item_name\":\"Product2\",\"quantity\":\"4\",\"price\":\"48.85\",\"total\":195.4},{\"item_name\":\"Product10\",\"quantity\":\"4\",\"price\":\"22.65\",\"total\":90.6},{\"item_name\":\"Product9\",\"quantity\":\"4\",\"price\":\"54.59\",\"total\":218.36}]', 504.36, '2024-05-07 01:36:59'),
(51, 'Ashutosh Kalyankar', 'ashu989052@gmail.com', '9890525854', '303, chintamani appartment', 'Cidco Nanded', 'Nanded', '431603', '[{\"item_name\":\"Product2\",\"quantity\":\"4\",\"price\":\"48.85\",\"total\":195.4},{\"item_name\":\"Product10\",\"quantity\":\"4\",\"price\":\"22.65\",\"total\":90.6},{\"item_name\":\"Product9\",\"quantity\":\"4\",\"price\":\"54.59\",\"total\":218.36}]', 504.36, '2024-05-07 01:48:03'),
(52, 'Ashutosh Kalyankar', 'ashu989052@gmail.com', '9890525854', '303, chintamani appartment', 'Barbada', 'Nanded', '431602', '[{\"item_name\":\"Product2\",\"quantity\":\"4\",\"price\":\"48.85\",\"total\":195.4},{\"item_name\":\"Product10\",\"quantity\":\"4\",\"price\":\"22.65\",\"total\":90.6},{\"item_name\":\"Product9\",\"quantity\":\"4\",\"price\":\"54.59\",\"total\":218.36}]', 504.36, '2024-05-07 01:48:51'),
(53, 'Ashutosh Kalyankar', 'ashu989052@gmail.com', '9890525854', '303, chintamani appartment', 'Cidco Nanded', 'Nanded', '431603', '[{\"item_name\":\"Product2\",\"quantity\":\"4\",\"price\":\"48.85\",\"total\":195.4},{\"item_name\":\"Product10\",\"quantity\":\"4\",\"price\":\"22.65\",\"total\":90.6},{\"item_name\":\"Product9\",\"quantity\":\"4\",\"price\":\"54.59\",\"total\":218.36}]', 504.36, '2024-05-07 01:52:13'),
(54, 'Ashutosh Kalyankar', 'ashu989052@gmail.com', '9890525854', '303, chintamani appartment', 'Ashoknagar (Nanded)', 'Nanded', '431605', '[{\"item_name\":\"Product2\",\"quantity\":\"4\",\"price\":\"48.85\",\"total\":195.4},{\"item_name\":\"Product10\",\"quantity\":\"4\",\"price\":\"22.65\",\"total\":90.6},{\"item_name\":\"Product9\",\"quantity\":\"4\",\"price\":\"54.59\",\"total\":218.36}]', 504.36, '2024-05-07 01:53:34'),
(55, 'Ashutosh Kalyankar', 'ashu989052@gmail.com', '9890525854', '303, chintamani appartment', 'Millgate Nanded', 'Nanded', '431601', '[{\"item_name\":\"Product2\",\"quantity\":\"4\",\"price\":\"48.85\",\"total\":195.4},{\"item_name\":\"Product10\",\"quantity\":\"4\",\"price\":\"22.65\",\"total\":90.6},{\"item_name\":\"Product9\",\"quantity\":\"4\",\"price\":\"54.59\",\"total\":218.36}]', 504.36, '2024-05-07 01:54:28'),
(56, 'Ashutosh Kalyankar', 'ashu989052@gmail.com', '9890525854', '303 appartmenr', 'Ashoknagar (Nanded)', 'Nanded', '431605', '[{\"item_name\":\"Product2\",\"quantity\":\"4\",\"price\":\"48.85\",\"total\":195.4},{\"item_name\":\"Product10\",\"quantity\":\"4\",\"price\":\"22.65\",\"total\":90.6},{\"item_name\":\"Product9\",\"quantity\":\"4\",\"price\":\"54.59\",\"total\":218.36},{\"item_name\":\"Product7\",\"quantity\":\"1\",\"price\":\"33.08\",\"total\":33.08}]', 537.44, '2024-05-07 01:56:45');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `image`) VALUES
(1, 'Product1', 22.74, 'img1.jpg'),
(2, 'Product2', 48.85, 'img2.jpg'),
(3, 'Product3', 86.00, 'img3.jpg'),
(4, 'Product4', 53.46, 'img4.jpg'),
(5, 'Product5', 59.32, 'img5.jpg'),
(6, 'Product6', 46.21, 'img6.jpg'),
(7, 'Product7', 33.08, 'img7.jpg'),
(8, 'Product8', 76.76, 'img8.jpg'),
(9, 'Product9', 54.59, 'img9.jpg'),
(10, 'Product10', 22.65, 'img10.jpg'),
(11, 'Product11', 69.48, 'img11.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `contact` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `contact`) VALUES
(7, 'ashu', 'ashu@gmail.com', 'Ashu@123', '9309530158'),
(8, 'Shivani Kalyankar', 'shivani@gmail.com', 'Ashu@123', '8308229657'),
(9, 'Ashu', 'piyushmanoorkarcoc@gmail.com', 'Ashu@123', '8234567890'),
(10, 'Ashutosh', 'ashu989052@gmail.com', 'Ashu@123', '9890525854');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
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
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
