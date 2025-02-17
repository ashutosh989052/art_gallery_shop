-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 17, 2025 at 11:52 PM
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
-- Table structure for table `admin_users`
--

CREATE TABLE `admin_users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_users`
--

INSERT INTO `admin_users` (`id`, `email`, `password`, `name`) VALUES
(1, 'ashu989052@gmail.com', 'Ashu@123', 'ashu'),
(4, 'piyushmanoorkarcoc@gmail.com', 'Ashu@123', 'Piyush');

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
  `selected_post_office` varchar(60) DEFAULT NULL,
  `district` varchar(100) NOT NULL,
  `pincode` varchar(10) NOT NULL,
  `order_details` text NOT NULL,
  `total_amount` decimal(10,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `name`, `email`, `mobile`, `address`, `area`, `selected_post_office`, `district`, `pincode`, `order_details`, `total_amount`, `created_at`, `user_id`) VALUES
(109, 'Piyush Manoorkar', 'ashu989052@gmail.com', '9890525854', 'Chintamani Apartment Chaitanya Nagar', 'Ashoknagar (Nanded)', '', 'Nanded', '431605', '[{\"item_name\":\"Product2\",\"quantity\":\"1\",\"price\":\"48.85\",\"total\":48.85},{\"item_name\":\"Product11\",\"quantity\":\"1\",\"price\":\"69.48\",\"total\":69.48}]', 118.33, '2024-06-04 17:38:56', 10),
(110, 'Ashutosh Kalyankar', 'ashu989052@gmail.com', '9890525854', 'Nanded', 'Taroda BK', '', 'Nanded', '431605', '[{\"item_name\":\"Product2\",\"quantity\":\"6\",\"price\":\"48.85\",\"total\":293.1}]', 293.10, '2024-06-07 09:04:31', 0),
(111, 'ashutosh', 'ashu989052@gmail.com', '9897632124', 'ashu', 'Pimpalgaon', NULL, 'Nanded', '431605', '[{\"item_name\":\"Product19\",\"quantity\":\"1\",\"price\":\"45.23\",\"total\":45.22999999999999687361196265555918216705322265625}]', 45.23, '2025-02-13 01:23:59', 0),
(112, 'Ashutosh ', 'ashu989052@gmail.com', '9856789123', 'Taroda BK NANDED', 'Chaitanynagar Nanded ', NULL, 'Nanded', '431605', '[{\"item_name\":\"Product2\",\"quantity\":\"1\",\"price\":\"48.85\",\"total\":48.85000000000000142108547152020037174224853515625}]', 48.85, '2025-02-13 09:15:20', 0),
(113, 'ashutosh', 'ashu989052@gmail.com', '9897632124', 'ashu', 'Chaitanynagar Nanded ', NULL, 'Nanded', '431605', '[{\"item_name\":\"Product1\",\"quantity\":\"1\",\"price\":\"22.74\",\"total\":22.739999999999998436805981327779591083526611328125}]', 22.74, '2025-02-13 10:19:01', 10),
(114, 'Jibraeel Shaikh', 'devilcloset007@gmail.com', '7517296433', 'Ramanand Nagar Pachora', 'Pachora', NULL, 'Jalgaon', '424201', '[{\"item_name\":\"Product1\",\"quantity\":\"1\",\"price\":\"22.74\",\"total\":22.739999999999998436805981327779591083526611328125},{\"item_name\":\"Product 20\",\"quantity\":\"1\",\"price\":\"30.22\",\"total\":30.219999999999998863131622783839702606201171875},{\"item_name\":\"Product19\",\"quantity\":\"1\",\"price\":\"45.23\",\"total\":45.22999999999999687361196265555918216705322265625},{\"item_name\":\"Product4\",\"quantity\":\"1\",\"price\":\"53.46\",\"total\":53.46000000000000085265128291212022304534912109375},{\"item_name\":\"Product5\",\"quantity\":\"1\",\"price\":\"59.32\",\"total\":59.32000000000000028421709430404007434844970703125},{\"item_name\":\"New painting\",\"quantity\":\"1\",\"price\":\"20.00\",\"total\":20},{\"item_name\":\"Product2\",\"quantity\":\"31\",\"price\":\"48.85\",\"total\":1514.350000000000136424205265939235687255859375}]', 1745.32, '2025-02-13 15:12:20', 13),
(115, 'Varsha Kalyankar', 'ashu989052@gmail.com', '9309530158', 'Chintamani apartment', 'Kothrud', NULL, 'Pune', '411038', '[{\"item_name\":\"Product16\",\"quantity\":\"1\",\"price\":\"88.23\",\"total\":88.2300000000000039790393202565610408782958984375}]', 88.23, '2025-02-14 19:14:43', 10);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `image`, `description`) VALUES
(1, 'Product1', 22.74, 'img1.jpg', 'Abstract 1 Product 1'),
(2, 'Product2', 48.85, 'img2.jpg', 'Abstract 2 Product 2'),
(3, 'Product3', 86.00, 'img3.jpg', 'Abstract 3 Product 3'),
(4, 'Product4', 53.46, 'img4.jpg', 'Abstract 4 Product 4'),
(5, 'Product5', 59.32, 'img5.jpg', 'Abstract 5 Product 5'),
(6, 'Product6', 46.21, 'img6.jpg', 'Abstract 6 Product 6'),
(7, 'Product7', 33.08, 'img7.jpg', 'Abstract 7 Product 7'),
(8, 'Product8', 80.00, 'img8.jpg', 'Abstract 8 Product 8'),
(9, 'Product9', 54.59, 'img9.jpg', 'Abstract 9 Product 9'),
(10, 'Product10', 22.65, 'img10.jpg', 'Abstract 10 Product 10'),
(11, 'Product11', 69.48, 'img11.jpg', 'Abstract 11 Product 11'),
(12, 'Product12', 70.23, 'img12.jpg', 'Abstract 12 Product 12'),
(13, 'Product13', 90.23, 'img13.jpg', 'Abstract 13 Product 13'),
(14, 'Product14', 54.23, 'img14.jpg', 'Abstract 14 Product 14'),
(15, 'Product15', 45.23, 'img15.jpg', 'Abstract 15 Product 15'),
(16, 'Product16', 88.23, 'img16.jpg', 'Abstract 16 Product 16'),
(17, 'Product17', 50.23, 'img17.jpg', 'Abstract 17 Product 17	'),
(18, 'Product18', 92.23, 'img18.jpg', 'Abstract 18 Product 18	'),
(19, 'Product19', 45.23, 'img19.jpg', 'Abstract 19 Product 19'),
(20, 'Product 20', 30.22, 'img20.jpg', 'Product 20 Abstract 20'),
(32, 'New Product', 60.30, 'pexels-steve-4371628.jpg', 'Best painting ever.'),
(33, 'New Product', 60.30, 'pexels-steve-4371628.jpg', 'Best painting ever.');

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
(10, 'Ashutosh Kalyankar', 'ashu989052@gmail.com', 'Ashu@123', '9890525854'),
(11, 'ashutosh', 'ashutoshkalyankar06@gmail.com', 'Ashu@123', '9420447538'),
(12, 'shraddha', 'ashutoshalyankar09@gmail.com', 'Ashu@123', '9309530158'),
(13, 'Jibraeel Shaikh', 'devilcloset007@gmail.com', 'Shaikh@12', '7517296433');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_users`
--
ALTER TABLE `admin_users`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `admin_users`
--
ALTER TABLE `admin_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
