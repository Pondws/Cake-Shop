-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 03, 2024 at 08:59 PM
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
-- Database: `dbcakeaaa`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `quantity` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` int(7) UNSIGNED ZEROFILL NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `total_products` varchar(255) NOT NULL,
  `total_price` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `firstname`, `lastname`, `email`, `address`, `phone`, `total_products`, `total_price`) VALUES
(0000012, 'วัชรมัย', 'ศรีสกุล', 'watcharamai13@gmail.com', 'asdsaasd', '0809622087', 'cake2 (1), cake1 (1)', '350'),
(0000013, 'วัชรมัย', 'ศรีสกุล', 'watcharamai13@gmail.com', 'dsaads', '0809622087', 'cake2 (1), cake1 (1)', '350'),
(0000014, 'วัชรมัย', 'ศรีสกุล', 'watcharamai13@gmail.com', 'dasdasasd', '0809622087', 'cake2 (1), cake1 (1)', '350'),
(0000015, 'วัชรมัย', 'ศรีสกุล', 'watcharamai13@gmail.com', '1231232141', '0809622087', 'cake2 (1), cake1 (1)', '350'),
(0000016, 'John', 'Doe', 'John@dsads.com', '12/414 dsfefe sadsadas dsadasda', '0293141617', 'cake2 (1), cake3 (1), cake5 (1), น้ำองุ่น (1), cake4 (1)', '975');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(3) UNSIGNED ZEROFILL NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `detail` text NOT NULL,
  `price` float(8,2) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `detail`, `price`, `image`) VALUES
(009, 'น้ำองุ่น', 'น้ำองุ่นรสชาติแท้จากองุ่นสดคัดพิเศษ', 100.00, 'P005.jpeg'),
(011, 'cake1', 'เนื้อแป้งนุ่มละมุน อบสุกด้วยความพิถีพิถัน', 150.00, 'P007.jpg'),
(013, 'cake2', 'สูตรเค้กโฮมเมดรสเลิศพร้อมวัตถุดิบคุณภาพ', 200.00, 'P003.jpg'),
(014, 'cake3', 'เค้กสดชื่นเต็มไปด้วยผลไม้สดคละรส', 125.00, 'P002.jpg'),
(015, 'cake4', 'อร่อยเข้มข้นกับเค้กเนื้อแน่นละมุนละลายปนผลไม้รสเลิศ', 500.00, 'P004.jpg'),
(017, 'cake5', 'เค้กสดใหม่วันต่อวันรังสรรค์ด้วยผลไม้นานาชนิด', 50.00, 'P008.jpg'),
(018, 'cake6', 'เค้กผลไม้แสนอร่อยพร้อมมอบประสบการณ์รสชาติใหม่ๆ', 75.00, 'P009.jpg'),
(019, 'cake7', 'ความสดใหม่ของผลไม้ตัดกับความหวานกำลังดีของเค้ก', 350.00, 'P003.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(6) UNSIGNED ZEROFILL NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `telephone` int(10) DEFAULT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `userlevel` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `firstname`, `lastname`, `telephone`, `username`, `password`, `userlevel`) VALUES
(000012, 'pond', 'admin', 809622081, 'pond', '81dc9bdb52d04dc20036dbd8313ed055', 'a'),
(000015, 'bas1234', 'bas', 809323232, 'bas', '81dc9bdb52d04dc20036dbd8313ed055', 'm'),
(000027, 'วัชรdsadsasads', 'ศรีสกุล', 11211, 'test', '81dc9bdb52d04dc20036dbd8313ed055', 'm'),
(000036, 'admin', '1', 0, 'admin1', '81dc9bdb52d04dc20036dbd8313ed055', 'a'),
(000037, 'สมหมาย', 'สมควร', 213145, 'som', '81dc9bdb52d04dc20036dbd8313ed055', 'm');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(7) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(3) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(6) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
