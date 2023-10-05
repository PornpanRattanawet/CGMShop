-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 25, 2023 at 07:04 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shoping`
--

-- --------------------------------------------------------

--
-- Table structure for table `sp_product`
--

CREATE TABLE `sp_product` (
  `id` int(11) NOT NULL,
  `name` text DEFAULT NULL,
  `img` text DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `type` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `sp_product`
--

INSERT INTO `sp_product` (`id`, `name`, `img`, `price`, `description`, `type`) VALUES
(1, 'Bed 01', 'Bed1.png', 10000, NULL, 'bedroom'),
(2, 'Bed 02', 'Bed2.png', 13500, NULL, 'bedroom'),
(3, 'Bed 03', 'Bed3.png', 22000, NULL, 'bedroom'),
(4, 'Storage 1 (Black)', 'storage (1).png', 3390, NULL, 'Lockers'),
(5, 'Storage 1 (White)', 'storage (2).png', 3390, NULL, 'Lockers'),
(6, 'Lockers 1 (Wood)', 'storage (3).png', 4190, NULL, 'Lockers');

-- --------------------------------------------------------

--
-- Table structure for table `sp_transaction`
--

CREATE TABLE `sp_transaction` (
  `id` int(11) NOT NULL,
  `transid` text DEFAULT NULL,
  `orderlist` text DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `shipping` int(11) DEFAULT NULL,
  `vat` int(11) DEFAULT NULL,
  `netamount` int(11) DEFAULT NULL,
  `operation` text DEFAULT NULL,
  `mil` bigint(20) DEFAULT NULL,
  `updated_at` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `sp_transaction`
--

INSERT INTO `sp_transaction` (`id`, `transid`, `orderlist`, `amount`, `shipping`, `vat`, `netamount`, `operation`, `mil`, `updated_at`) VALUES
(1, '1653723836661', '[{\"index\":\"2\",\"id\":\"1\",\"name\":\"Nike\",\"price\":\"1\",\"img\":\"1653718795081.jpg\",\"count\":\"4\"}]', 28000, 28060, 1964, 30024, 'PENDING', 1653723836000, '2022-05-28 02:43:56pm'),
(2, '1653723949893', '[{\"index\":\"0\",\"id\":\"3\",\"name\":\"Adidas shoe\",\"price\":\"1\",\"img\":\"1653718816063.jpg\",\"count\":\"2\"}]', 90000, 90060, 6304, 96364, 'PENDING', 1653723949000, '2022-05-28 02:45:49pm'),
(3, '1653724115073', '[{\"index\":\"1\",\"id\":\"2\",\"name\":\"Adidas shirt\",\"price\":\"1500\",\"img\":\"1653718808515.jpg\",\"count\":\"1\"}]', 1500, 1560, 109, 1669, 'PENDING', 1653724115000, '2022-05-28 02:48:35pm'),
(4, '1653724247660', '[{\"index\":\"2\",\"id\":\"1\",\"name\":\"Nike\",\"price\":\"7000\",\"img\":\"1653718795081.jpg\",\"count\":\"1\"}]', 7000, 7060, 494, 7554, 'PENDING', 1653724247000, '2022-05-28 02:50:47pm'),
(5, '1653724305688', '[{\"index\":\"2\",\"id\":\"1\",\"name\":\"Nike\",\"price\":\"7000\",\"img\":\"1653718795081.jpg\",\"count\":\"1\"}]', 7000, 7060, 494, 7554, 'PENDING', 1653724305000, '2022-05-28 02:51:45pm'),
(6, '1653724342456', '[{\"index\":\"1\",\"id\":\"2\",\"name\":\"Adidas shirt\",\"price\":\"1500\",\"img\":\"1653718808515.jpg\",\"count\":\"2\"}]', 3000, 3060, 214, 3274, 'PENDING', 1653724342000, '2022-05-28 02:52:22pm'),
(7, '1653724849489', '[{\"index\":\"1\",\"id\":\"2\",\"name\":\"Adidas shirt\",\"price\":\"1500\",\"img\":\"1653718808515.jpg\",\"count\":\"1\"}]', 1500, 1560, 109, 1669, 'PENDING', 1653724849000, '2022-05-28 03:00:49pm'),
(8, '1679651090699', '[{\"index\":\"2\",\"id\":\"1\",\"name\":\"Nike\",\"price\":\"7000\",\"img\":\"1653718795081.jpg\",\"count\":\"3\"}]', 21000, 21060, 1474, 22534, 'PENDING', 1679651090000, '2023-03-24 04:44:50pm'),
(9, '1679652872205', '[{\"index\":\"0\",\"id\":\"4\",\"name\":\"Bed Type 02\",\"price\":\"390\",\"img\":\"02 (2).png\",\"count\":\"1\"}]', 390, 450, 32, 482, 'PENDING', 1679652872000, '2023-03-24 05:14:32pm'),
(10, '1679715705568', '[{\"index\":\"1\",\"id\":\"5\",\"name\":\"Storage 1 (White)\",\"price\":\"3390\",\"img\":\"storage (2).png\",\"count\":\"4\"},{\"index\":\"3\",\"id\":\"3\",\"name\":\"Bed 03\",\"price\":\"22000\",\"img\":\"Bed3.png\",\"count\":\"3\"}]', 79560, 79620, 5573, 85193, 'PENDING', 1679715705000, '2023-03-25 10:41:45am');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sp_product`
--
ALTER TABLE `sp_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sp_transaction`
--
ALTER TABLE `sp_transaction`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sp_product`
--
ALTER TABLE `sp_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sp_transaction`
--
ALTER TABLE `sp_transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
