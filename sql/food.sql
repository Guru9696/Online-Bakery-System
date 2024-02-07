-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 25, 2023 at 06:05 PM
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
-- Database: `food`
--

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `name` varchar(25) NOT NULL,
  `price` int(11) NOT NULL,
  `photo` varchar(25) NOT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT 0,
  `stock` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `name`, `price`, `photo`, `deleted`, `stock`) VALUES
(1, 'Bread', 30, 'images/bread.jpg', 0, 1),
(2, 'Rusk', 20, 'images/rusk.png', 0, 5),
(3, 'Cookie', 65, 'images/cookie.jpg', 1, 0),
(4, 'Pastry', 10, 'images/pastry.jpg', 1, 0),
(5, 'Buns', 30, 'images/buns.jpg', 0, 17),
(11, 'Cake', 150, 'images/cake.jpg', 0, 11),
(28, 'Item 8', 87, 'images/biscuit.jpg', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `address` varchar(300) NOT NULL,
  `description` varchar(300) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `payment_type` varchar(16) NOT NULL DEFAULT 'Wallet',
  `total` int(11) NOT NULL,
  `status` varchar(25) NOT NULL DEFAULT 'Yet to be delivered',
  `deleted` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customer_id`, `address`, `description`, `date`, `payment_type`, `total`, `status`, `deleted`) VALUES
(1, 2, 'Address 2', 'Sample Description 1', '2023-10-22 17:32:41', 'Wallet', 150, 'Delivered', 0),
(2, 2, 'New address 2', '', '2023-10-22 17:32:41', 'Wallet', 130, 'Cancelled by Customer', 1),
(3, 3, 'Address 3', 'Sample Description 2', '2023-10-22 17:32:41', 'Cash On Delivery', 130, 'Yet to be delivered', 0),
(4, 3, 'Address 3', '', '2023-10-22 17:32:41', 'Cash On Delivery', 130, 'Cancelled by Customer', 1),
(5, 3, 'New Address 3', '', '2023-10-22 17:32:41', 'Wallet', 285, 'Paused', 0),
(6, 3, 'New Address 3', '', '2023-10-22 17:32:41', 'Wallet', 325, 'Cancelled by Customer', 1),
(7, 6, 'Hadapsar, Pune', '', '2023-10-24 16:58:16', 'Cash On Delivery', 230, 'Yet to be delivered', 0),
(8, 6, 'Hadapsar, Pune', '', '2023-10-24 18:26:44', 'Cash On Delivery', 230, 'Yet to be delivered', 0),
(9, 4, 'Mumbai', '', '2023-10-24 18:32:20', 'Cash On Delivery', 230, 'Yet to be delivered', 0);

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `item_id`, `quantity`, `price`) VALUES
(1, 1, 2, 2, 90),
(2, 1, 3, 3, 60),
(3, 2, 2, 2, 90),
(4, 2, 3, 2, 40),
(5, 3, 2, 2, 90),
(6, 3, 3, 2, 40),
(7, 4, 2, 2, 90),
(8, 4, 3, 2, 40),
(9, 5, 2, 5, 225),
(10, 5, 3, 2, 40),
(11, 5, 5, 1, 20),
(12, 6, 2, 5, 225),
(13, 6, 3, 3, 60),
(14, 6, 5, 2, 40),
(15, 7, 1, 1, 30),
(16, 7, 5, 1, 30),
(17, 7, 11, 1, 150),
(18, 7, 2, 1, 20),
(19, 8, 1, 1, 30),
(20, 8, 5, 1, 30),
(21, 8, 11, 1, 150),
(22, 8, 2, 1, 20),
(23, 9, 1, 1, 30),
(24, 9, 5, 1, 30),
(25, 9, 11, 1, 150),
(26, 9, 2, 1, 20);

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `id` int(11) NOT NULL,
  `poster_id` int(11) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `description` varchar(3000) NOT NULL,
  `status` varchar(8) NOT NULL DEFAULT 'Open',
  `type` varchar(30) NOT NULL DEFAULT 'Others',
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `deleted` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ticket_details`
--

CREATE TABLE `ticket_details` (
  `id` int(11) NOT NULL,
  `ticket_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `role` varchar(15) NOT NULL DEFAULT 'Customer',
  `name` varchar(15) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(16) NOT NULL,
  `email` varchar(35) DEFAULT NULL,
  `address` varchar(300) DEFAULT NULL,
  `contact` bigint(11) NOT NULL,
  `verified` tinyint(1) NOT NULL DEFAULT 0,
  `deleted` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role`, `name`, `username`, `password`, `email`, `address`, `contact`, `verified`, `deleted`) VALUES
(1, 'Administrator', 'Admin 1', 'root', 'toor', '', 'Address 1', 9898000000, 1, 0),
(2, 'Customer', 'Customer 1', 'user1', 'pass1', 'mail2@example.com', 'Address 2', 9898000001, 1, 0),
(3, 'Customer', 'Customer 2', 'user2', 'pass2', 'mail3@example.com', 'Address 3', 9898000002, 1, 0),
(4, 'Customer', 'Customer 3', 'user3', 'pass3', '', '', 9898000003, 0, 0),
(5, 'Customer', 'Customer 4', 'user4', 'pass4', '', '', 9898000004, 0, 1),
(6, 'Customer', 'Vijay Kumar', 'vk123', '12345', 'vijaykumar@demo.com', 'Hadapsar, Pune', 9876543210, 1, 0),
(7, 'Customer', 'Manoj Kumar', 'mk123', '12345', NULL, NULL, 9638527410, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `wallet`
--

CREATE TABLE `wallet` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `wallet`
--

INSERT INTO `wallet` (`id`, `customer_id`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5),
(6, 6),
(7, 7);

-- --------------------------------------------------------

--
-- Table structure for table `wallet_details`
--

CREATE TABLE `wallet_details` (
  `id` int(11) NOT NULL,
  `wallet_id` int(11) NOT NULL,
  `number` varchar(16) NOT NULL,
  `cvv` int(3) NOT NULL,
  `balance` int(11) NOT NULL DEFAULT 2000
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `wallet_details`
--

INSERT INTO `wallet_details` (`id`, `wallet_id`, `number`, `cvv`, `balance`) VALUES
(1, 1, '6155247490533921', 983, 3430),
(2, 2, '1887587142382050', 772, 1850),
(3, 3, '4595809639046830', 532, 1585),
(4, 4, '5475856443351234', 521, 2000),
(5, 5, '9076633115663264', 229, 2000),
(6, 6, '4552498376585625', 561, 2000),
(7, 7, '1673182377421785', 598, 2000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `item_id` (`item_id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `poster_id` (`poster_id`);

--
-- Indexes for table `ticket_details`
--
ALTER TABLE `ticket_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ticket_id` (`ticket_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `wallet`
--
ALTER TABLE `wallet`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `customer_id` (`customer_id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `wallet_details`
--
ALTER TABLE `wallet_details`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `wallet_id` (`wallet_id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ticket_details`
--
ALTER TABLE `ticket_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `wallet`
--
ALTER TABLE `wallet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `wallet_details`
--
ALTER TABLE `wallet_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`),
  ADD CONSTRAINT `order_details_ibfk_2` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`);

--
-- Constraints for table `tickets`
--
ALTER TABLE `tickets`
  ADD CONSTRAINT `tickets_ibfk_1` FOREIGN KEY (`poster_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `ticket_details`
--
ALTER TABLE `ticket_details`
  ADD CONSTRAINT `ticket_details_ibfk_1` FOREIGN KEY (`ticket_id`) REFERENCES `tickets` (`id`),
  ADD CONSTRAINT `ticket_details_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `wallet`
--
ALTER TABLE `wallet`
  ADD CONSTRAINT `wallet_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `wallet_details`
--
ALTER TABLE `wallet_details`
  ADD CONSTRAINT `wallet_details_ibfk_1` FOREIGN KEY (`wallet_id`) REFERENCES `wallet` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
