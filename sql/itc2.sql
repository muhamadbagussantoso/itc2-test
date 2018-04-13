-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 13, 2018 at 11:45 AM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `itc2`
--

-- --------------------------------------------------------

--
-- Table structure for table `courier_charges`
--

CREATE TABLE `courier_charges` (
  `id` int(11) NOT NULL,
  `name` varchar(225) NOT NULL,
  `charge` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courier_charges`
--

INSERT INTO `courier_charges` (`id`, `name`, `charge`) VALUES
(1, '0 to 200mg', 5),
(1, '0 to 200mg', 5),
(2, '0 to 200mg', 10),
(3, '0 to 200mg', 15);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(225) NOT NULL,
  `price` int(11) NOT NULL,
  `weight` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `weight`) VALUES
(1, 'Item1', 10, 200),
(2, 'Item2', 100, 20),
(3, 'Item3', 30, 300),
(4, 'Item4', 20, 500),
(5, 'Item5', 30, 250),
(6, 'Item6', 40, 10),
(7, 'Item7', 200, 10),
(8, 'Item8', 120, 500),
(9, 'Item9', 130, 790),
(10, 'Item10', 20, 100),
(11, 'Item11', 10, 340),
(12, 'Item12', 4, 800),
(13, 'Item13', 5, 200),
(14, 'Item14', 240, 20),
(15, 'Item15', 123, 700),
(16, 'Item16', 245, 10),
(17, 'Item17', 230, 20),
(18, 'Item18', 110, 200),
(19, 'Item19', 45, 200),
(20, 'Item20', 67, 20),
(21, 'Item21', 88, 300),
(22, 'Item22', 10, 500),
(23, 'Item23', 17, 250),
(24, 'Item24', 19, 10),
(25, 'Item25', 89, 10),
(26, 'Item26', 45, 500),
(27, 'Item27', 99, 790),
(28, 'Item28', 125, 100),
(29, 'Item29', 198, 340),
(30, 'Item30', 220, 800),
(31, 'Item31', 240, 200),
(32, 'Item32', 230, 20),
(33, 'Item33', 190, 700),
(34, 'Item34', 45, 10),
(35, 'Item35', 12, 20),
(36, 'Item36', 5, 200),
(37, 'Item37', 2, 200),
(38, 'Item38', 90, 20),
(39, 'Item39', 12, 300),
(40, 'Item40', 167, 500),
(41, 'Item41', 12, 250),
(42, 'Item42', 8, 10),
(43, 'Item43', 2, 10),
(44, 'Item44', 9, 500),
(45, 'Item45', 210, 790),
(46, 'Item46', 167, 100),
(47, 'Item47', 23, 340),
(48, 'Item48', 190, 800),
(49, 'Item49', 199, 200),
(50, 'Item50', 12, 20);

-- --------------------------------------------------------

--
-- Table structure for table `transaction_products`
--

CREATE TABLE `transaction_products` (
  `id` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `name` varchar(225) NOT NULL,
  `price` int(11) NOT NULL,
  `weight` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
