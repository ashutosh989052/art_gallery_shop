-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 22, 2024 at 10:00 PM
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
  `selected_post_office` varchar(22) NOT NULL,
  `district` varchar(100) NOT NULL,
  `pincode` varchar(10) NOT NULL,
  `order_details` text NOT NULL,
  `total_amount` decimal(10,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `name`, `email`, `mobile`, `address`, `area`, `selected_post_office`, `district`, `pincode`, `order_details`, `total_amount`, `created_at`) VALUES
(69, 'Ashutosh Kalyankar', 'ashu989052@gmail.com', '9890525854', 'hgfdsawertyuicvbnm', 'Ashoknagar (Nanded)', '', 'Nanded', '431605', '[{\"item_name\":\"Product3\",\"quantity\":\"1\",\"price\":\"86.00\",\"total\":86},{\"item_name\":\"Product14\",\"quantity\":\"1\",\"price\":\"54.23\",\"total\":54.23}]', 140.23, '2024-05-09 18:17:56'),
(70, 'Ashutosh Deshmukh', 'ashu989052@gmail.com', '9309530158', 'mgm college nanded', 'Ashoknagar (Nanded)', '', 'Nanded', '431605', '[{\"item_name\":\"Product3\",\"quantity\":\"1\",\"price\":\"86.00\",\"total\":86}]', 86.00, '2024-05-10 08:23:49'),
(71, 'Ashutosh Deshmukh', 'ashu989052@gmail.com', '9309530158', 'mgm college nanded', 'Asrjan', '', 'Nanded', '431606', '[{\"item_name\":\"Product3\",\"quantity\":\"1\",\"price\":\"86.00\",\"total\":86}]', 86.00, '2024-05-10 08:24:13'),
(72, 'Ashutosh Deshmukh', 'ashu989052@gmail.com', '9309530158', 'Chintamani Apartment Chaitanya Nagar', 'Asrjan', 'SRTMU Nanded', 'Nanded', '431606', '[{\"item_name\":\"Product3\",\"quantity\":\"1\",\"price\":\"86.00\",\"total\":86},{\"item_name\":\"Product3\",\"quantity\":\"1\",\"price\":\"86.00\",\"total\":86}]', 172.00, '2024-05-11 03:44:47'),
(73, 'Ashutosh Deshmukh', 'ashu989052@gmail.com', '9309530158', 'Chintamani Apartment Chaitanya Nagar', 'Ashoknagar (Nanded)', 'Nerli', 'Nanded', '431605', '[{\"item_name\":\"Product3\",\"quantity\":\"1\",\"price\":\"86.00\",\"total\":86},{\"item_name\":\"Product3\",\"quantity\":\"1\",\"price\":\"86.00\",\"total\":86}]', 172.00, '2024-05-11 03:50:13'),
(74, 'Ashutosh vankati kalyankar', 'ashu989052@gmail.com', '9309530158', 'Chintamani Apartment Chaitanya Nagar', 'Ashoknagar (Nanded)', 'Pimpalgaon', 'Nanded', '431605', '[{\"item_name\":\"Product2\",\"quantity\":\"3\",\"price\":\"48.85\",\"total\":146.55},{\"item_name\":\"Product18\",\"quantity\":\"4\",\"price\":\"92.23\",\"total\":368.92}]', 515.47, '2024-05-11 07:24:19'),
(75, 'Ashutosh vankati kalyankar', 'ashu989052@gmail.com', '9309530158', 'Chintamani Apartment Chaitanya Nagar', 'Ashoknagar (Nanded)', 'Pimpalgaon', 'Nanded', '431605', '[{\"item_name\":\"Product2\",\"quantity\":\"3\",\"price\":\"48.85\",\"total\":146.55},{\"item_name\":\"Product18\",\"quantity\":\"4\",\"price\":\"92.23\",\"total\":368.92}]', 515.47, '2024-05-11 07:25:12'),
(76, 'Ashutosh Kalyankar', 'ashu989052@gmail.com', '9890525854', 'sakjjskdahfjakhfkjlahsfkj', 'Ashoknagar (Nanded)', 'Nerli', 'Nanded', '431605', '[{\"item_name\":\"Product1\",\"quantity\":\"1\",\"price\":\"22.74\",\"total\":22.74},{\"item_name\":\"Product2\",\"quantity\":\"5\",\"price\":\"48.85\",\"total\":244.25},{\"item_name\":\"Product11\",\"quantity\":\"4\",\"price\":\"69.48\",\"total\":277.92}]', 544.91, '2024-05-11 10:58:32'),
(77, 'Ashutosh Kalyankar', 'ashu989052@gmail.com', '9890525854', 'asdfghjkqwertyui', 'Ashoknagar (Nanded)', 'Ashoknagar (Nanded)', 'Nanded', '431605', '[{\"item_name\":\"Product2\",\"quantity\":\"1\",\"price\":\"48.85\",\"total\":48.85}]', 48.85, '2024-05-11 11:04:45'),
(78, 'Ashutosh Kalyankar', 'ashu989052@gmail.com', '9890525854', 'asdfghjkqwertyui', 'Ashoknagar (Nanded)', 'Ashoknagar (Nanded)', 'Nanded', '431605', '[{\"item_name\":\"Product2\",\"quantity\":\"1\",\"price\":\"48.85\",\"total\":48.85}]', 48.85, '2024-05-11 11:05:13'),
(79, 'Ashutosh Kalyankar', 'ashu989052@gmail.com', '9890525854', 'asdfghjkqwertyui', 'Ashoknagar (Nanded)', 'Pimpalgaon', 'Nanded', '431605', '[{\"item_name\":\"Product2\",\"quantity\":\"1\",\"price\":\"48.85\",\"total\":48.85}]', 48.85, '2024-05-11 11:06:05'),
(80, 'Ashutosh vankati kalyankar', 'ashu989052@gmail.com', '9309530158', 'Chintamani Apartment Chaitanya Nagar', 'Ashoknagar (Nanded)', 'Nerli', 'Nanded', '431605', '[{\"item_name\":\"Product2\",\"quantity\":\"3\",\"price\":\"48.85\",\"total\":146.55},{\"item_name\":\"Product18\",\"quantity\":\"4\",\"price\":\"92.23\",\"total\":368.92}]', 515.47, '2024-05-11 11:09:53'),
(81, 'Ashutosh vankati kalyankar', 'ashu989052@gmail.com', '9309530158', 'Chintamani Apartment Chaitanya Nagar', 'Itwara Nanded', '', 'Nanded', '431604', '[{\"item_name\":\"Product2\",\"quantity\":\"3\",\"price\":\"48.85\",\"total\":146.55},{\"item_name\":\"Product18\",\"quantity\":\"4\",\"price\":\"92.23\",\"total\":368.92}]', 515.47, '2024-05-11 11:13:43'),
(82, 'Ashutosh Kalyankar', 'ashu989052@gmail.com', '9890525854', 'asdfghwert', '', '', 'Nanded', '431605', '[{\"item_name\":\"Product1\",\"quantity\":\"1\",\"price\":\"22.74\",\"total\":22.74},{\"item_name\":\"Product2\",\"quantity\":\"1\",\"price\":\"48.85\",\"total\":48.85}]', 71.59, '2024-05-11 11:21:33'),
(83, 'Ashutosh vankati kalyankar', 'ashu989052@gmail.com', '9309530158', 'asdfghjkqwerty', 'Itwara Nanded', '', 'Nanded', '431604', '[{\"item_name\":\"Product2\",\"quantity\":\"1\",\"price\":\"48.85\",\"total\":48.85}]', 48.85, '2024-05-14 07:52:13'),
(84, 'Ashutosh vankati kalyankar', 'ashu989052@gmail.com', '9309530158', 'asdfghj', 'Pimpalgaon', '', 'Nanded', '431605', '[{\"item_name\":\"Product1\",\"quantity\":\"1\",\"price\":\"22.74\",\"total\":22.74}]', 22.74, '2024-05-14 07:53:22'),
(85, 'Prathsm', 'ashu989052@gmail.com', '9604030767', 'Chaitanya Nagar', 'Chaitanynagar Nanded ', '', 'Nanded', '431605', '[{\"item_name\":\"Product1\",\"quantity\":\"5\",\"price\":\"22.74\",\"total\":113.69999999999999}]', 113.70, '2024-05-21 16:03:01'),
(86, 'Ashutosh Kalyankar', 'ashu989052@gmail.com', '9890525854', 'asdfghujkil', 'Chaitanynagar Nanded ', '', 'Nanded', '431605', '[{\"item_name\":\"Product19\",\"quantity\":\"1\",\"price\":\"45.23\",\"total\":45.23}]', 45.23, '2024-05-22 19:53:27');

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
(11, 'Product11', 69.48, 'img11.jpg'),
(12, 'Product12', 70.23, 'img12.jpg'),
(13, 'Product13', 90.23, 'img13.jpg'),
(14, 'Product14', 54.23, 'img14.jpg'),
(15, 'Product15', 45.23, 'img15.jpg'),
(16, 'Product16', 88.23, 'img16.jpg'),
(17, 'Product17', 50.23, 'img17.jpg'),
(18, 'Product18', 92.23, 'img18.jpg'),
(19, 'Product19', 45.23, 'img19.jpg');

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
(10, 'Ashutosh', 'ashu989052@gmail.com', 'Ashu@123', '9890525854'),
(11, 'ashutosh', 'ashutoshkalyankar06@gmail.com', 'Ashu@123', '9420447538');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
