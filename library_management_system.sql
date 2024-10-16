-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 16, 2024 at 06:14 PM
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
-- Database: `library_management_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `books_movies`
--

CREATE TABLE `books_movies` (
  `serial_no` int(6) UNSIGNED NOT NULL,
  `type` enum('book','movie') NOT NULL,
  `name` varchar(100) NOT NULL,
  `author_name` varchar(100) DEFAULT NULL,
  `category` varchar(50) DEFAULT NULL,
  `procurement_date` date NOT NULL,
  `quantity` int(3) NOT NULL,
  `status` enum('available','borrowed','lost') DEFAULT 'available'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `books_movies`
--

INSERT INTO `books_movies` (`serial_no`, `type`, `name`, `author_name`, `category`, `procurement_date`, `quantity`, `status`) VALUES
(1, 'book', 'rich dad poor dad', NULL, NULL, '1010-10-10', 1, 'available');

-- --------------------------------------------------------

--
-- Table structure for table `master_list_books`
--

CREATE TABLE `master_list_books` (
  `serial_no` int(6) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `author_name` varchar(100) NOT NULL,
  `category` varchar(50) NOT NULL,
  `status` enum('available','borrowed','lost') DEFAULT 'available',
  `cost` decimal(10,2) NOT NULL,
  `procurement_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` int(6) UNSIGNED NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `contact_name` varchar(50) NOT NULL,
  `contact_address` varchar(100) NOT NULL,
  `aadhar_card_no` varchar(20) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `membership_type` enum('six_months','one_year','two_year') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `first_name`, `last_name`, `contact_name`, `contact_address`, `aadhar_card_no`, `start_date`, `end_date`, `membership_type`) VALUES
(1, 'bipin', 'chand', '23456923', 'a;osdhgoa8s', '12345667890', '1010-10-10', '1010-11-01', 'one_year');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(6) UNSIGNED NOT NULL,
  `code_no_from` int(6) NOT NULL,
  `code_no_to` int(6) NOT NULL,
  `category` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(6) UNSIGNED NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `role` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`) VALUES
(1, 'piyush', 'piyush', 'admin'),
(2, 'harsh', '1234', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books_movies`
--
ALTER TABLE `books_movies`
  ADD PRIMARY KEY (`serial_no`);

--
-- Indexes for table `master_list_books`
--
ALTER TABLE `master_list_books`
  ADD PRIMARY KEY (`serial_no`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
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
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books_movies`
--
ALTER TABLE `books_movies`
  MODIFY `serial_no` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `master_list_books`
--
ALTER TABLE `master_list_books`
  MODIFY `serial_no` int(6) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
