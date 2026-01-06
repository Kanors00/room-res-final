-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 06, 2026 at 10:00 AM
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
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `crud_db`
--

CREATE TABLE `crud_db` (
  `ID` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Age` int(50) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `ContactNum` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `crud_db`
--

INSERT INTO `crud_db` (`ID`, `Name`, `Age`, `Address`, `ContactNum`) VALUES
(50, 'Jemwil dela cruz', 30, 'qc', 9876),
(56, 'monkey d. luffy', 19, 'east blue', 89899),
(57, 'Jemwil dela cruz', 32, 'Quezon City, Metro Manila', 2147483647),
(58, 'Jemwil dela cruz', 21, 'pasong tamo', 65457688),
(59, 'Roronoa zoro', 21, 'east blue', 6787678),
(60, 'luffy ', 43, 'east blue', 134567),
(63, 'sanji', 19, 'west blue', 134567),
(64, 'kurohige', 19, 'west blue', 134567),
(65, 'luffy ', 19, 'west blue', 134567),
(66, 'Artchie Letrodo', 22, 'Litex ata', 988847477),
(68, 'Sakamoto', 33, 'Japan', 999188818),
(69, 'nami', 69, 'Arlong Park', 2147483647),
(70, 'jeffrey sumalinog', 33, 'Rizal', 2147483647),
(71, '', 19, '', 0),
(72, 'Jem Villacentino', 0, '', 0),
(73, 'JEM', 22, 'QC55', 1231231);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `crud_db`
--
ALTER TABLE `crud_db`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `crud_db`
--
ALTER TABLE `crud_db`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
