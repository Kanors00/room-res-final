-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 06, 2026 at 09:59 AM
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
-- Database: `user_admin`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `role` varchar(20) DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `full_name`, `username`, `email`, `password_hash`, `created_at`, `role`) VALUES
(5, 'jemwil dc', 'jemwil', 'jem@gmail.com', '$2y$10$yqdcCPcGU4K9FpSxUnC8XuyKD/M9VU6MWGdhEbUQ6H/7spNQPmbpK', '2025-11-11 00:48:34', 'admin'),
(16, 'Jem DC', 'Jems', 'jemwil@gmail.com', '$2y$10$ZPQ4Cn0FDG3Re9sLdFI.Ke7HfwCzff8q0Z.h/kAQNi2JbIUxpNm0i', '2025-12-02 09:25:50', 'user'),
(17, 'sample1', 'sample1', 'sample@gmail.com', '$2y$10$kDzsk7xY6QpUvDZZeYNL4OCxOcLEGFLZgcjBmVt6a/OwnxAM9F2YG', '2025-12-02 09:27:50', 'user'),
(18, 'sample3', 'sample3', 'sample3@gmail.com', '$2y$10$zrfPoEIGhsMK21y/xFTY2.SguDIZkGXaMAu9ldr.cJC4TPGg4BBUe', '2025-12-17 01:53:39', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
