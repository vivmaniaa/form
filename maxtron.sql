-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 21, 2017 at 08:56 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `maxtron`
--

-- --------------------------------------------------------

--
-- Table structure for table `catagories`
--

CREATE TABLE `catagories` (
  `serial` int(11) NOT NULL,
  `catagory` varchar(255) NOT NULL,
  `sub_catagory` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `catagories`
--

INSERT INTO `catagories` (`serial`, `catagory`, `sub_catagory`) VALUES
(1, 'clothes', 'trouser'),
(2, 'accessories', 'sunglasses'),
(3, 'clothes', 'shirt'),
(4, 'accessories', 'belt'),
(5, 'clothes', 'sweater'),
(6, 'accessories', 'hanky');

-- --------------------------------------------------------

--
-- Table structure for table `e_kart`
--

CREATE TABLE `e_kart` (
  `id` int(11) NOT NULL,
  `catagory` varchar(255) NOT NULL,
  `sub_catagory` varchar(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_amount` int(11) NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `total_amount` int(11) NOT NULL,
  `product_type` varchar(255) NOT NULL,
  `product_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `e_kart`
--

INSERT INTO `e_kart` (`id`, `catagory`, `sub_catagory`, `product_name`, `product_amount`, `product_quantity`, `total_amount`, `product_type`, `product_status`) VALUES
(7, 'clothes', 'shirt', 'arrow', 1500, 1, 1500, 'sale,old', 'Deactive');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `catagories`
--
ALTER TABLE `catagories`
  ADD PRIMARY KEY (`serial`);

--
-- Indexes for table `e_kart`
--
ALTER TABLE `e_kart`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `catagories`
--
ALTER TABLE `catagories`
  MODIFY `serial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `e_kart`
--
ALTER TABLE `e_kart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
