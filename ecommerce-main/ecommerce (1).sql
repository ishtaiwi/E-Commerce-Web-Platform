-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 27, 2023 at 07:31 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `user_id` int(50) NOT NULL,
  `product_id` int(50) NOT NULL,
  `quantity` int(5) NOT NULL,
  `id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`user_id`, `product_id`, `quantity`, `id`) VALUES
(6, 28, 3, 1),
(6, 15, 2, 2),
(11, 15, 1, 56),
(11, 12, 1, 59),
(11, 3, 1, 60),
(11, 3, 1, 61);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `CategoryID` int(11) NOT NULL,
  `CategoryName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`CategoryID`, `CategoryName`) VALUES
(1, 'Shirts'),
(2, 'Pants'),
(3, 'Shoes'),
(4, 'Accessories');

-- --------------------------------------------------------

--
-- Table structure for table `orderdetails`
--

CREATE TABLE `orderdetails` (
  `OrderDetailID` int(11) NOT NULL,
  `OrderID` int(11) DEFAULT NULL,
  `ProductID` int(11) DEFAULT NULL,
  `Quantity` int(11) DEFAULT NULL,
  `Subtotal` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orderdetails`
--

INSERT INTO `orderdetails` (`OrderDetailID`, `OrderID`, `ProductID`, `Quantity`, `Subtotal`) VALUES
(8, 1, 15, 1, 150.99),
(9, 1, 12, 1, 150.99),
(10, 2, 15, 1, 150.99),
(11, 2, 12, 1, 150.99),
(12, 2, 3, 1, 150.99),
(13, 2, 3, 1, 150.99);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `OrderID` int(11) NOT NULL,
  `UserID` int(11) DEFAULT NULL,
  `OrderDate` date DEFAULT NULL,
  `TotalAmount` decimal(10,2) DEFAULT NULL,
  `payment` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`OrderID`, `UserID`, `OrderDate`, `TotalAmount`, `payment`) VALUES
(1, 11, '2023-12-27', 301.98, 0),
(2, 11, '2023-12-27', 603.96, 0);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `prod_id` int(50) NOT NULL,
  `prod_barcode` varchar(20) NOT NULL,
  `prod_name` varchar(90) NOT NULL,
  `prod_des` varchar(70) NOT NULL,
  `prod_price` decimal(50,2) NOT NULL,
  `prod_image` text NOT NULL,
  `quantity` int(20) DEFAULT NULL,
  `section` char(1) DEFAULT NULL,
  `cat_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`prod_id`, `prod_barcode`, `prod_name`, `prod_des`, `prod_price`, `prod_image`, `quantity`, `section`, `cat_id`) VALUES
(3, '9877856', 'adidas', 'Astronaut T-shirt', 150.99, 'img/products/f1.jpg', 14, 'f', 1),
(12, '9877810', 'adidas', 'Cartoon Astronaut T-shirt', 150.99, 'img/products/f2.jpg', 12, 'f', 1),
(15, '9877811', 'adidas', 'Cartoon Astronaut T-shirt', 150.99, 'img/products/f3.jpg', 12, 'f', 1),
(16, '9877812', 'adidas', 'Cartoon Astronaut T-shirt', 150.99, 'img/products/f4.jpg', 12, 'f', 1),
(17, '9877813', 'adidas', 'Cartoon Astronaut T-shirt', 150.99, 'img/products/f5.jpg', 12, 'f', 1),
(18, '9877814', 'adidas', 'Cartoon Astronaut T-shirt', 150.99, 'img/products/f6.jpg', 12, 'f', 1),
(19, '9877815', 'adidas', 'Cartoon Astronaut T-shirt', 150.99, 'img/products/f7.jpg', NULL, 'f', 1),
(20, '9877816', 'adidas', 'Cartoon Astronaut T-shirt', 150.99, 'img/products/n1.jpg', NULL, 'n', 1),
(21, '9877817', 'adidas', 'Cartoon Astronaut T-shirt', 150.99, 'img/products/n2.jpg', NULL, 'n', 1),
(22, '9877818', 'adidas', 'Cartoon Astronaut T-shirt', 150.99, 'img/products/n3.jpg', 12, 'n', 1),
(23, '9877819', 'adidas', 'Cartoon Astronaut T-shirt', 150.99, 'img/products/n4.jpg', NULL, 'n', 1),
(24, '9877820', 'adidas', 'Cartoon Astronaut T-shirt', 150.99, 'img/products/n5.jpg', NULL, 'n', 1),
(25, '9877821', 'adidas', 'Cartoon Astronaut T-shirt', 150.99, 'img/products/n6.jpg', NULL, 'n', 1),
(26, '987781220', 'adidas', 'Cartoon Astronaut T-shirt', 150.99, 'img/products/n7.jpg', NULL, 'n', 1),
(27, '98778230', 'adidas', 'Cartoon Astronaut T-shirt', 150.99, 'img/products/n8.jpg', NULL, 'n', 1),
(28, '05546235', 'adidas', 'Cartoon Astronaut T-shirt', 120.00, 'img/products/n1.jpg', NULL, 'f', 1);

-- --------------------------------------------------------

--
-- Table structure for table `prod_size`
--

CREATE TABLE `prod_size` (
  `prod_id` int(11) NOT NULL,
  `size_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `size`
--

CREATE TABLE `size` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_name` varchar(50) NOT NULL,
  `email` varchar(120) NOT NULL,
  `user_id` int(30) NOT NULL,
  `user_pass` varchar(64) NOT NULL,
  `user_bd` date NOT NULL,
  `user_type` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_name`, `email`, `user_id`, `user_pass`, `user_bd`, `user_type`) VALUES
('lk', 'jjn@jl.com', 1, '12', '0000-00-00', 0),
('ghk', 'fdf@kh.com', 6, '$2y$10$s.I96fEFQ5XhtTv/Uvtw9eyFaBizmkIMAL5FDuIZIm.zhiDO/KuBG', '2023-12-05', 0),
('saif', 'ed@d.com', 7, '*4D0DD2673C1DE57138354E81A957460B774C4BC2', '2023-12-19', 1),
('dese', 'cc@cc.com', 8, '$2y$10$rtbrkhaYcNInQ2oyiDZlfeQ4mYXVEEPtS2yvqMAex2/lYM55eg6/q', '2023-11-28', 1),
('Sag', 'Dd@ss.com', 9, '$2y$10$TtLeNIjBJHfDSSlutEbR5eDys9kpZ/ScHXsoMS0f0PM4TQ0PIfQgK', '2023-12-12', 0),
('kk', 'sshayep@gmail.com', 11, '$2y$10$1P6U963fzVffvV1GS6vXzeaMhmqHFdqmChJFq.kaQBQnaMoUdLW1S', '2023-12-05', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`CategoryID`);

--
-- Indexes for table `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD PRIMARY KEY (`OrderDetailID`),
  ADD KEY `orderfk` (`OrderID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`OrderID`),
  ADD KEY `userfk` (`UserID`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`prod_id`),
  ADD UNIQUE KEY `un` (`prod_barcode`),
  ADD KEY `catfk` (`cat_id`);

--
-- Indexes for table `prod_size`
--
ALTER TABLE `prod_size`
  ADD KEY `prodfk` (`prod_id`),
  ADD KEY `sizefk` (`size_id`);

--
-- Indexes for table `size`
--
ALTER TABLE `size`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `j` (`user_name`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `CategoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `orderdetails`
--
ALTER TABLE `orderdetails`
  MODIFY `OrderDetailID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `OrderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `prod_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `size`
--
ALTER TABLE `size`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`prod_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD CONSTRAINT `orderfk` FOREIGN KEY (`OrderID`) REFERENCES `orders` (`OrderID`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `userfk` FOREIGN KEY (`UserID`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `catfk` FOREIGN KEY (`cat_id`) REFERENCES `categories` (`CategoryID`) ON DELETE SET NULL ON UPDATE NO ACTION;

--
-- Constraints for table `prod_size`
--
ALTER TABLE `prod_size`
  ADD CONSTRAINT `prodfk` FOREIGN KEY (`prod_id`) REFERENCES `products` (`prod_id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `sizefk` FOREIGN KEY (`size_id`) REFERENCES `size` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
