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
-- Database: `room_reservation`
--

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_company` varchar(100) DEFAULT NULL,
  `user_contact` varchar(20) DEFAULT NULL,
  `user_email` varchar(100) DEFAULT NULL,
  `booking_date` date NOT NULL,
  `guest_count` int(11) NOT NULL,
  `payment_status` varchar(25) NOT NULL DEFAULT 'pending',
  `payment_requested` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `receipt_path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`id`, `room_id`, `user_name`, `user_company`, `user_contact`, `user_email`, `booking_date`, `guest_count`, `payment_status`, `payment_requested`, `created_at`, `receipt_path`) VALUES
(64, 0, 'sample2', 'sample2', '09177171717', 'sample@gmail.com', '2025-12-23', 25, 'paid', 1, '2025-12-15 02:34:27', 'uploads/receipts/1765850913_room5.jpg'),
(65, 0, 'asdasd', 'asdasd', '09818273665', 'sample@gmail.com', '2025-12-26', 11, 'paid', 1, '2025-12-16 08:34:56', 'uploads/receipts/1765874249_receipt-template-us-band-blue-750px.png'),
(68, 0, 'sample3', 'sample', '09761376263', 'sample3@gmail.com', '2025-12-31', 20, 'paid', 1, '2025-12-17 05:24:57', 'uploads/receipts/1765949146_receipt-template-us-band-blue-750px.png');

-- --------------------------------------------------------

--
-- Table structure for table `reservations_log`
--

CREATE TABLE `reservations_log` (
  `user_id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `user_company` varchar(55) NOT NULL,
  `capacity` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reservations_log`
--

INSERT INTO `reservations_log` (`user_id`, `room_id`, `user_company`, `capacity`, `date`) VALUES
(12345, 12345, '', 0, '2025-12-25');

-- --------------------------------------------------------

--
-- Table structure for table `room_details`
--

CREATE TABLE `room_details` (
  `room_id` int(11) NOT NULL,
  `room_name` varchar(55) NOT NULL,
  `capacity` int(11) NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `receipt_path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `room_details`
--

INSERT INTO `room_details` (`room_id`, `room_name`, `capacity`, `image_path`, `receipt_path`) VALUES
(23464, 'sample2', 82, '/room-res/uploads/1764205196_room3.jpg', ''),
(23465, 'sample3', 45, '/room-res/uploads/1764205607_room2.webp', ''),
(23466, 'sample4', 29, '/room-res/uploads/1764572031_room5.jpg', ''),
(23467, 'room46', 30, '/room-res/uploads/1765753860_room4.jpg', ''),
(23468, 'rommmmm', 11, '/room-res/uploads/1765864492_room3.jpg', ''),
(23469, 'bvnv', 22, '/room-res/uploads/1765950621_room3.avif', '');

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE `user_details` (
  `user_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `user_contact` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`user_id`, `name`, `user_contact`, `user_email`) VALUES
(12342, 'Jem', 'KMD', 'OJT'),
(12344, 'Chits', 'KMD', ''),
(12345, 'Sir John', 'KMD', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `room_id` (`room_id`,`booking_date`),
  ADD UNIQUE KEY `room_id_2` (`room_id`,`booking_date`);

--
-- Indexes for table `room_details`
--
ALTER TABLE `room_details`
  ADD UNIQUE KEY `room_id` (`room_id`),
  ADD UNIQUE KEY `room_id_2` (`room_id`);

--
-- Indexes for table `user_details`
--
ALTER TABLE `user_details`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `room_details`
--
ALTER TABLE `room_details`
  MODIFY `room_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23470;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
