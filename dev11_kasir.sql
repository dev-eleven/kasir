-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 23, 2018 at 11:56 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 5.6.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dev11_kasir`
--

-- --------------------------------------------------------

--
-- Table structure for table `inventories`
--

CREATE TABLE `inventories` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `unit_type` varchar(50) NOT NULL,
  `price` int(11) NOT NULL,
  `status` enum('1','2','3','4','5','6') NOT NULL COMMENT 'Masuk,Keluar,Pinjam,Kembali,Rusak,Hilang',
  `comment` text NOT NULL,
  `date_in` date DEFAULT NULL,
  `date_out` date DEFAULT NULL,
  `date_lent` date DEFAULT NULL,
  `date_back` date DEFAULT NULL,
  `date_broken` date DEFAULT NULL,
  `date_lost` date DEFAULT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inventories`
--

INSERT INTO `inventories` (`id`, `product_id`, `quantity`, `unit_type`, `price`, `status`, `comment`, `date_in`, `date_out`, `date_lent`, `date_back`, `date_broken`, `date_lost`, `created`, `modified`) VALUES
(1, 7, 10, 'Cups', 5000, '1', 'Tambah', '2018-07-24', NULL, NULL, NULL, NULL, NULL, '2018-07-07 22:24:08', '2018-07-07 22:24:08'),
(14, 15, 10, 'Cups', 5000, '1', 'Tambah', '2018-07-05', NULL, NULL, NULL, NULL, NULL, '2018-07-07 22:25:22', '2018-07-07 22:25:22'),
(15, 15, 10, 'Cups', 5000, '2', 'Terjual', '0000-00-00', '2018-07-05', NULL, NULL, NULL, NULL, '2018-07-07 22:26:12', '2018-07-07 22:26:12'),
(16, 7, 10, 'Cups', 5000, '2', 'Terjual', NULL, '2018-07-05', NULL, NULL, NULL, NULL, '2018-07-07 22:26:51', '2018-07-07 22:26:51'),
(19, 15, 2, 'Cups', 5000, '3', '', NULL, NULL, '2018-07-07', NULL, NULL, NULL, '2018-07-07 23:23:51', '2018-07-07 23:23:51'),
(20, 15, 2, 'Cups', 5000, '4', '', NULL, NULL, NULL, '2018-07-08', NULL, NULL, '2018-07-07 23:25:12', '2018-07-07 23:25:12'),
(21, 7, 10, 'Units', 5000, '5', 'rusak', NULL, NULL, NULL, NULL, '2018-07-06', NULL, '2018-07-08 00:10:17', '2018-07-08 00:10:17'),
(22, 7, 10, 'Units', 5000, '6', 'rusak', NULL, NULL, NULL, NULL, NULL, '2018-07-06', '2018-07-08 00:11:13', '2018-07-08 00:11:13');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `created` datetime DEFAULT CURRENT_TIMESTAMP,
  `modified` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `name`, `address`, `created`, `modified`) VALUES
(1, 'shabil', 'sukun', '2018-07-10 10:49:43', '2018-07-10 10:49:43');

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `price` int(11) NOT NULL,
  `type` enum('1','2','3') NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `product_id`, `title`, `price`, `type`, `created`, `modified`) VALUES
(1, 7, 'Indomie Goreng Sepesial', 3000, '3', '2018-07-06 19:49:23', '2018-07-06 19:49:23'),
(3, 15, 'Tea Hangat', 2000, '1', '2018-07-06 20:35:46', '2018-07-06 20:35:46');

-- --------------------------------------------------------

--
-- Table structure for table `ordered_list`
--

CREATE TABLE `ordered_list` (
  `id` int(10) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `transaction_code` int(4) NOT NULL,
  `total_price` int(11) NOT NULL,
  `quantity` int(10) NOT NULL,
  `order_status` enum('1','2') NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ordered_list`
--

INSERT INTO `ordered_list` (`id`, `menu_id`, `transaction_code`, `total_price`, `quantity`, `order_status`, `created`) VALUES
(1, 1, 2385, 3000, 1, '2', '2018-07-20 21:29:55'),
(2, 3, 2385, 2000, 1, '2', '2018-07-20 21:30:03'),
(3, 3, 1136, 4000, 2, '2', '2018-07-22 16:24:19'),
(7, 3, 3252, 4000, 2, '2', '2018-07-22 17:27:05'),
(10, 1, 9115, 6000, 2, '1', '2018-07-22 18:04:52'),
(11, 1, 1646, 6000, 2, '2', '2018-07-22 18:06:14'),
(12, 1, 3704, 6000, 2, '2', '2018-07-22 23:22:52'),
(14, 1, 3704, 9000, 3, '2', '2018-07-23 00:03:07');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) NOT NULL,
  `supplier_id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `stock` int(11) NOT NULL,
  `type` enum('1','2','3') NOT NULL,
  `created` datetime DEFAULT CURRENT_TIMESTAMP,
  `modified` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `supplier_id`, `name`, `stock`, `type`, `created`, `modified`) VALUES
(7, 1, 'Indomie Goreng', 30, '2', '2018-07-06 10:33:35', '2018-07-06 10:33:35'),
(15, 2, 'Green Tea', 50, '1', '2018-07-06 17:55:49', '2018-07-06 17:55:49');

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` int(10) NOT NULL,
  `person_name` varchar(255) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `created` datetime DEFAULT CURRENT_TIMESTAMP,
  `modified` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `person_name`, `company_name`, `address`, `email`, `phone`, `created`, `modified`) VALUES
(1, 'Shabil', 'Dev11', 'Sukun', 'Shabil@gmail.com', '081123456789', '2018-07-04 00:00:00', '2018-07-04 00:00:00'),
(2, 'Khusnul', 'Dev11', 'Klayatan', 'Khusnul@gmail.com', '081123456789', '2018-07-05 09:13:25', '2018-07-05 09:13:25'),
(3, 'Sugeng', 'Dev11', 'Sukun', 'Sugeng@gmail.com', '081123456789', '2018-07-05 09:15:31', '2018-07-05 09:15:31'),
(4, 'Firman', 'Dev11', 'Tebo', 'Firman@gmail.com', '081123456789', '2018-07-05 09:15:31', '2018-07-05 09:15:31');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(10) NOT NULL,
  `user_id` int(10) DEFAULT NULL,
  `member_id` int(11) DEFAULT NULL,
  `code` int(4) NOT NULL,
  `created` datetime DEFAULT CURRENT_TIMESTAMP,
  `modified` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `user_id`, `member_id`, `code`, `created`, `modified`) VALUES
(1, 1, NULL, 2385, '2018-07-20 21:29:49', '2018-07-20 21:29:49'),
(2, 1, 1, 1136, '2018-07-22 16:24:11', '2018-07-22 16:24:11'),
(4, 1, NULL, 1646, '2018-07-22 16:28:03', '2018-07-22 16:28:03'),
(5, 1, NULL, 3252, '2018-07-22 16:30:05', '2018-07-22 16:30:05'),
(6, 1, NULL, 9115, '2018-07-22 17:29:11', '2018-07-22 17:29:11'),
(7, 1, NULL, 3704, '2018-07-22 23:09:49', '2018-07-22 23:09:49');

-- --------------------------------------------------------

--
-- Table structure for table `transaction_incomes`
--

CREATE TABLE `transaction_incomes` (
  `id` int(11) NOT NULL,
  `transaction_code` int(11) NOT NULL,
  `income` int(11) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaction_incomes`
--

INSERT INTO `transaction_incomes` (`id`, `transaction_code`, `income`, `created`) VALUES
(1, 2385, 5000, '2018-07-20 21:29:50'),
(2, 1136, 4000, '2018-07-22 16:24:11'),
(4, 1646, 6000, '2018-07-22 16:28:03'),
(5, 3252, 4000, '2018-07-22 16:30:05'),
(6, 9115, 6000, '2018-07-22 17:29:11'),
(7, 3704, 15000, '2018-07-22 23:09:49');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(225) NOT NULL,
  `level` enum('1','2','3') DEFAULT NULL,
  `created` datetime DEFAULT CURRENT_TIMESTAMP,
  `modified` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `level`, `created`, `modified`) VALUES
(1, 'admin@admin.com', '21232f297a57a5a743894a0e4a801fc3', '1', '2018-07-04 00:00:00', '2018-07-04 00:00:00'),
(3, 'kasir@kasir.com', 'c7911af3adbd12a035b289556d96470a', '2', '2018-07-04 22:11:48', '2018-07-04 22:11:48');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `inventories`
--
ALTER TABLE `inventories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `inventories_product` (`product_id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`),
  ADD KEY `name` (`name`),
  ADD KEY `name_2` (`name`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menus1` (`product_id`);

--
-- Indexes for table `ordered_list`
--
ALTER TABLE `ordered_list`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order1` (`menu_id`),
  ADD KEY `transaction_kode` (`transaction_code`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `name` (`name`),
  ADD KEY `suplier_key` (`supplier_id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `company_name` (`company_name`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code` (`code`),
  ADD KEY `transaction2_key` (`user_id`),
  ADD KEY `kode` (`code`),
  ADD KEY `transaction_key` (`member_id`);

--
-- Indexes for table `transaction_incomes`
--
ALTER TABLE `transaction_incomes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transaction_income1` (`transaction_code`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `inventories`
--
ALTER TABLE `inventories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ordered_list`
--
ALTER TABLE `ordered_list`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `transaction_incomes`
--
ALTER TABLE `transaction_incomes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `inventories`
--
ALTER TABLE `inventories`
  ADD CONSTRAINT `inventories_product` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `menus`
--
ALTER TABLE `menus`
  ADD CONSTRAINT `menus1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `ordered_list`
--
ALTER TABLE `ordered_list`
  ADD CONSTRAINT `order1` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `order2` FOREIGN KEY (`transaction_code`) REFERENCES `transactions` (`code`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `suplier_key` FOREIGN KEY (`supplier_id`) REFERENCES `suppliers` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transaction1_key` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `transaction_key` FOREIGN KEY (`member_id`) REFERENCES `members` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `transaction_incomes`
--
ALTER TABLE `transaction_incomes`
  ADD CONSTRAINT `transaction_income1` FOREIGN KEY (`transaction_code`) REFERENCES `transactions` (`code`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
