-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 03, 2022 at 02:56 PM
-- Server version: 8.0.28
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `oj`
--

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `brand_id` int NOT NULL,
  `brand_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`brand_id`, `brand_name`) VALUES
(1, 'Nike'),
(2, 'Adidas'),
(3, 'Puma'),
(4, 'Air Jordan Nike');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `category_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `category_type`) VALUES
(1, 'player issue', 'unisex'),
(2, 'fans issue', 'unisex');

-- --------------------------------------------------------

--
-- Table structure for table `jersey`
--

CREATE TABLE `jersey` (
  `jersey_id` int NOT NULL,
  `brand_id` int NOT NULL,
  `category_id` int NOT NULL,
  `jersey_price` int DEFAULT NULL,
  `jersey_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `jersey_size` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `jersey_image` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `jersey`
--

INSERT INTO `jersey` (`jersey_id`, `brand_id`, `category_id`, `jersey_price`, `jersey_name`, `jersey_size`, `jersey_image`, `created_at`, `updated_at`) VALUES
(1001, 1, 1, 50, 'Liverpool Training Kit', 'S', 'product-1.jpg', NULL, '0000-00-00 00:00:00'),
(1002, 2, 1, 50, 'Japan Home Kit', 'S', 'product-2.jpg', NULL, '0000-00-00 00:00:00'),
(1003, 2, 1, 50, 'Flamengo Pink Edition', 'S', 'product-3.jpg', NULL, '0000-00-00 00:00:00'),
(1004, 1, 1, 50, 'Chelsea Training Kit', 'S', 'product-4.jpg', NULL, '0000-00-00 00:00:00'),
(1005, 1, 1, 50, 'Inter Milan Away Kit', 'S', 'product-5.jpg', NULL, '0000-00-00 00:00:00'),
(1006, 1, 1, 50, 'Inter Milan Home Kit', 'S', 'product-6.jpg', NULL, '0000-00-00 00:00:00'),
(1007, 2, 1, 50, 'Man United Third Kit', 'S', 'product-7.jpg', NULL, '0000-00-00 00:00:00'),
(1008, 1, 1, 30, 'PSG Away Kit', 'S', 'product-8.jpg', NULL, '0000-00-00 00:00:00'),
(1009, 4, 1, 50, 'PSG Third Kit', 'S', 'product-9.jpg', NULL, '0000-00-00 00:00:00'),
(1010, 3, 1, 50, 'Man City Home Kit', 'S', 'product-10.jpg', NULL, '0000-00-00 00:00:00'),
(1011, 2, 1, 55, 'Real Madrid Away Kit', 'S', 'product-11.jpg', NULL, '0000-00-00 00:00:00'),
(1012, 2, 1, 75, 'Juventus Away Kit', 'S', 'product-12.jpg', NULL, '0000-00-00 00:00:00'),
(1013, 1, 2, 40, 'Liverpool Training Kit', 'S', 'product-1.jpg', NULL, '0000-00-00 00:00:00'),
(1014, 2, 2, 40, 'Japan Home Kit', 'S', 'product-2.jpg', NULL, '0000-00-00 00:00:00'),
(1015, 2, 2, 40, 'Flamengo Pink Edition\r\n', 'S', 'product-3.jpg', NULL, '0000-00-00 00:00:00'),
(1016, 1, 2, 40, 'Chelsea Training Kit', 'S', 'product-4.jpg', NULL, '0000-00-00 00:00:00'),
(1017, 1, 2, 40, 'Inter Milan Away Kit', 'S', 'product-5.jpg', NULL, '0000-00-00 00:00:00'),
(1018, 1, 2, 40, 'Inter Milan Home Kit', 'S', 'product-6.jpg', NULL, '0000-00-00 00:00:00'),
(1019, 2, 2, 40, 'Man United Third Kit', 'S', 'product-7.jpg', NULL, '0000-00-00 00:00:00'),
(1024, 1, 2, 50, 'Liverpool Training Kit', 'S', '', '2022-07-03 04:27:02', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orders_id` int NOT NULL,
  `user_id` int DEFAULT NULL,
  `orders_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int NOT NULL,
  `jersey_id` int DEFAULT NULL,
  `orders_id` int DEFAULT NULL,
  `quantity` int DEFAULT NULL,
  `total_price` decimal(5,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` int NOT NULL,
  `orders_id` int DEFAULT NULL,
  `payment_status` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `role_id` int NOT NULL,
  `role_tittle` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`role_id`, `role_tittle`) VALUES
(2, 'admin'),
(3, 'customer');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int NOT NULL,
  `role_id` int DEFAULT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_contact` int NOT NULL,
  `user_address` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_email` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `role_id`, `user_name`, `user_contact`, `user_address`, `user_password`, `user_email`) VALUES
(8, 3, 'syidy', 129887689, 'kuantan,pahang', '1234', 'syidy@gmail.com'),
(9, 3, 'faris', 145678914, 'raub', '1234', 'faris@gmail.com'),
(10, 3, 'aqilnazli', 1139387199, 'klang,selamgor', '1234', 'aqilnazli050@gmail.com'),
(12, 2, 'admin123', 0, '', 'admin', 'admin@gmail.com'),
(13, 3, 'faiz', 125689876, 'kl', '1234', 'faiz@gmail.com'),
(14, 3, 'hasbi', 122301164, 'kuantan', 'hasbi', 'hasbiarman@gmail.com'),
(1001, 2, 'ADMIN2', 0, '', 'ADMIN2', NULL),
(1002, 3, 'admin', 1234, 'kl', 'admin', 'admin@oj.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `jersey`
--
ALTER TABLE `jersey`
  ADD PRIMARY KEY (`jersey_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orders_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`),
  ADD KEY `orders_id` (`orders_id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jersey`
--
ALTER TABLE `jersey`
  MODIFY `jersey_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1025;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1003;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`orders_id`) REFERENCES `orders` (`orders_id`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `role` (`role_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
