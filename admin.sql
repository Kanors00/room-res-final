-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 06, 2026 at 10:01 AM
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
-- Database: `admin`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_board`
--

CREATE TABLE `admin_board` (
  `Admin User ID` bigint(20) NOT NULL,
  `Password` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `BookID` bigint(20) NOT NULL,
  `Title` varchar(255) NOT NULL,
  `Author` varchar(255) NOT NULL,
  `Category` varchar(255) NOT NULL,
  `Count` int(11) NOT NULL DEFAULT 0,
  `Remaining` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`BookID`, `Title`, `Author`, `Category`, `Count`, `Remaining`) VALUES
(1011, 'The Great Gatsby', 'F. Scott Fitzgerald', 'Fiction', 0, 0),
(1012, 'A Brief History of Time', 'Stephen Hawking', 'Science', 0, 0),
(1013, 'To Kill a Mockingbird', 'Harper Lee', 'Fiction', 0, 0),
(1014, 'Clean Code', 'Robert C. Martin', 'Programming', 0, 0),
(1015, 'Becoming', 'Michelle Obama', 'Biography', 0, 0),
(1016, 'The Art of War', 'Sun Tzu', 'Philosophy', 0, 0),
(1017, 'The Pragmatic Programmer', 'Andrew Hunt', 'Programming', 0, 0),
(1018, 'Sapiens: A Brief History of Humankind', 'Yuval Noah Harari', 'History', 0, 0),
(1019, 'The Catcher in the Rye', 'J.D. Salinger', 'Fiction', 0, 0),
(1020, 'The Lean Startup', 'Eric Ries', 'Business', 0, 0),
(1021, 'The Great Gatsby', 'F. Scott Fitzgerald', 'Fiction', 0, 0),
(1022, 'A Brief History of Time', 'Stephen Hawking', 'Science', 0, 0),
(1023, 'To Kill a Mockingbird', 'Harper Lee', 'Fiction', 0, 0),
(1024, 'Clean Code', 'Robert C. Martin', 'Programming', 0, 0),
(1025, 'Becoming', 'Michelle Obama', 'Biography', 0, 0),
(1026, 'The Art of War', 'Sun Tzu', 'Philosophy', 0, 0),
(1027, 'The Pragmatic Programmer', 'Andrew Hunt', 'Programming', 0, 0),
(1028, 'Sapiens: A Brief History of Humankind', 'Yuval Noah Harari', 'History', 0, 0),
(1029, 'The Catcher in the Rye', 'J.D. Salinger', 'Fiction', 0, 0),
(1030, 'The Lean Startup', 'Eric Ries', 'Business', 0, 0),
(1031, 'The Great Gatsby', 'F. Scott Fitzgerald', 'Fiction', 0, 0),
(1032, 'A Brief History of Time', 'Stephen Hawking', 'Science', 0, 0),
(1033, 'To Kill a Mockingbird', 'Harper Lee', 'Fiction', 0, 0),
(1034, 'Clean Code', 'Robert C. Martin', 'Programming', 0, 0),
(1035, 'Becoming', 'Michelle Obama', 'Biography', 0, 0),
(1036, 'The Art of War', 'Sun Tzu', 'Philosophy', 0, 0),
(1037, 'The Pragmatic Programmer', 'Andrew Hunt', 'Programming', 0, 0),
(1038, 'Sapiens: A Brief History of Humankind', 'Yuval Noah Harari', 'History', 0, 0),
(1039, 'The Catcher in the Rye', 'J.D. Salinger', 'Fiction', 0, 0),
(1040, 'The Lean Startup', 'Eric Ries', 'Business', 0, 0),
(1041, 'The Great Gatsby', 'F. Scott Fitzgerald', 'Fiction', 0, 0),
(1042, 'A Brief History of Time', 'Stephen Hawking', 'Science', 0, 0),
(1043, 'To Kill a Mockingbird', 'Harper Lee', 'Fiction', 0, 0),
(1044, 'Clean Code', 'Robert C. Martin', 'Programming', 0, 0),
(1045, 'Becoming', 'Michelle Obama', 'Biography', 0, 0),
(1046, 'The Art of War', 'Sun Tzu', 'Philosophy', 0, 0),
(1047, 'The Pragmatic Programmer', 'Andrew Hunt', 'Programming', 0, 0),
(1048, 'Sapiens: A Brief History of Humankind', 'Yuval Noah Harari', 'History', 0, 0),
(1049, 'The Catcher in the Rye', 'J.D. Salinger', 'Fiction', 0, 0),
(1050, 'The Lean Startup', 'Eric Ries', 'Business', 0, 0),
(1051, 'The Great Gatsby', 'F. Scott Fitzgerald', 'Fiction', 0, 0),
(1052, 'A Brief History of Time', 'Stephen Hawking', 'Science', 0, 0),
(1053, 'To Kill a Mockingbird', 'Harper Lee', 'Fiction', 0, 0),
(1054, 'Clean Code', 'Robert C. Martin', 'Programming', 0, 0),
(1055, 'Becoming', 'Michelle Obama', 'Biography', 0, 0),
(1056, 'The Art of War', 'Sun Tzu', 'Philosophy', 0, 0),
(1057, 'The Pragmatic Programmer', 'Andrew Hunt', 'Programming', 0, 0),
(1058, 'Sapiens: A Brief History of Humankind', 'Yuval Noah Harari', 'History', 0, 0),
(1059, 'The Catcher in the Rye', 'J.D. Salinger', 'Fiction', 0, 0),
(1060, 'The Lean Startup', 'Eric Ries', 'Business', 0, 0),
(1061, 'The Great Gatsby', 'F. Scott Fitzgerald', 'Fiction', 0, 0),
(1062, 'A Brief History of Time', 'Stephen Hawking', 'Science', 0, 0),
(1063, 'To Kill a Mockingbird', 'Harper Lee', 'Fiction', 0, 0),
(1064, 'Clean Code', 'Robert C. Martin', 'Programming', 0, 0),
(1065, 'Becoming', 'Michelle Obama', 'Biography', 0, 0),
(1066, 'The Art of War', 'Sun Tzu', 'Philosophy', 0, 0),
(1067, 'The Pragmatic Programmer', 'Andrew Hunt', 'Programming', 0, 0),
(1068, 'Sapiens: A Brief History of Humankind', 'Yuval Noah Harari', 'History', 0, 0),
(1069, 'The Catcher in the Rye', 'J.D. Salinger', 'Fiction', 0, 0),
(1070, 'The Lean Startup', 'Eric Ries', 'Business', 0, 0),
(1071, 'The Alchemist', 'Paulo Coelho', 'Fiction', 0, 0),
(1072, 'Thinking, Fast and Slow', 'Daniel Kahneman', 'Psychology', 0, 0),
(1073, 'The Mythical Man-Month', 'Frederick P. Brooks Jr.', 'Technology', 0, 0),
(1074, 'Educated', 'Tara Westover', 'Memoir', 0, 0),
(1075, 'The Design of Everyday Things', 'Don Norman', 'Design', 0, 0),
(1076, 'Atomic Habits', 'James Clear', 'Self-help', 0, 0),
(1077, 'The Intelligent Investor', 'Benjamin Graham', 'Finance', 0, 0),
(1078, 'The Subtle Art of Not Giving a F*ck', 'Mark Manson', 'Self-help', 0, 0),
(1079, 'Deep Work', 'Cal Newport', 'Productivity', 0, 0),
(1080, 'The Code Book', 'Simon Singh', 'Cryptography', 0, 0),
(1081, 'The Alchemist', 'Paulo Coelho', 'Fiction', 0, 0),
(1082, 'Thinking, Fast and Slow', 'Daniel Kahneman', 'Psychology', 0, 0),
(1083, 'The Mythical Man-Month', 'Frederick P. Brooks Jr.', 'Technology', 0, 0),
(1084, 'Educated', 'Tara Westover', 'Memoir', 0, 0),
(1085, 'The Design of Everyday Things', 'Don Norman', 'Design', 0, 0),
(1086, 'Atomic Habits', 'James Clear', 'Self-help', 0, 0),
(1087, 'The Intelligent Investor', 'Benjamin Graham', 'Finance', 0, 0),
(1088, 'The Subtle Art of Not Giving a F*ck', 'Mark Manson', 'Self-help', 0, 0),
(1089, 'Deep Work', 'Cal Newport', 'Productivity', 0, 0),
(1090, 'The Code Book', 'Simon Singh', 'Cryptography', 0, 0),
(1091, 'The Alchemist', 'Paulo Coelho', 'Fiction', 0, 0),
(1092, 'Thinking, Fast and Slow', 'Daniel Kahneman', 'Psychology', 0, 0),
(1093, 'The Mythical Man-Month', 'Frederick P. Brooks Jr.', 'Technology', 0, 0),
(1094, 'Educated', 'Tara Westover', 'Memoir', 0, 0),
(1095, 'The Design of Everyday Things', 'Don Norman', 'Design', 0, 0),
(1096, 'Atomic Habits', 'James Clear', 'Self-help', 0, 0),
(1097, 'The Intelligent Investor', 'Benjamin Graham', 'Finance', 0, 0),
(1098, 'The Subtle Art of Not Giving a F*ck', 'Mark Manson', 'Self-help', 0, 0),
(1099, 'Deep Work', 'Cal Newport', 'Productivity', 0, 0),
(1100, 'The Code Book', 'Simon Singh', 'Cryptography', 0, 0),
(1101, 'The Alchemist', 'Paulo Coelho', 'Fiction', 0, 0),
(1102, 'Thinking, Fast and Slow', 'Daniel Kahneman', 'Psychology', 0, 0),
(1103, 'The Mythical Man-Month', 'Frederick P. Brooks Jr.', 'Technology', 0, 0),
(1104, 'Educated', 'Tara Westover', 'Memoir', 0, 0),
(1105, 'The Design of Everyday Things', 'Don Norman', 'Design', 0, 0),
(1106, 'Atomic Habits', 'James Clear', 'Self-help', 0, 0),
(1107, 'The Intelligent Investor', 'Benjamin Graham', 'Finance', 0, 0),
(1108, 'The Subtle Art of Not Giving a F*ck', 'Mark Manson', 'Self-help', 0, 0),
(1109, 'Deep Work', 'Cal Newport', 'Productivity', 0, 0),
(1110, 'The Code Book', 'Simon Singh', 'Cryptography', 0, 0),
(1111, 'The Alchemist', 'Paulo Coelho', 'Fiction', 0, 0),
(1112, 'Thinking, Fast and Slow', 'Daniel Kahneman', 'Psychology', 0, 0),
(1113, 'The Mythical Man-Month', 'Frederick P. Brooks Jr.', 'Technology', 0, 0),
(1114, 'Educated', 'Tara Westover', 'Memoir', 0, 0),
(1115, 'The Design of Everyday Things', 'Don Norman', 'Design', 0, 0),
(1116, 'Atomic Habits', 'James Clear', 'Self-help', 0, 0),
(1117, 'The Intelligent Investor', 'Benjamin Graham', 'Finance', 0, 0),
(1118, 'The Subtle Art of Not Giving a F*ck', 'Mark Manson', 'Self-help', 0, 0),
(1119, 'Deep Work', 'Cal Newport', 'Productivity', 0, 0),
(1120, 'The Code Book', 'Simon Singh', 'Cryptography', 0, 0),
(1121, 'The Alchemist', 'Paulo Coelho', 'Fiction', 0, 0),
(1122, 'Thinking, Fast and Slow', 'Daniel Kahneman', 'Psychology', 0, 0),
(1123, 'The Mythical Man-Month', 'Frederick P. Brooks Jr.', 'Technology', 0, 0),
(1124, 'Educated', 'Tara Westover', 'Memoir', 0, 0),
(1125, 'The Design of Everyday Things', 'Don Norman', 'Design', 0, 0),
(1126, 'Atomic Habits', 'James Clear', 'Self-help', 0, 0),
(1127, 'The Intelligent Investor', 'Benjamin Graham', 'Finance', 0, 0),
(1128, 'The Subtle Art of Not Giving a F*ck', 'Mark Manson', 'Self-help', 0, 0),
(1129, 'Deep Work', 'Cal Newport', 'Productivity', 0, 0),
(1130, 'The Code Book', 'Simon Singh', 'Cryptography', 0, 0),
(1131, 'The Alchemist', 'Paulo Coelho', 'Fiction', 0, 0),
(1132, 'Thinking, Fast and Slow', 'Daniel Kahneman', 'Psychology', 0, 0),
(1133, 'The Mythical Man-Month', 'Frederick P. Brooks Jr.', 'Technology', 0, 0),
(1134, 'Educated', 'Tara Westover', 'Memoir', 0, 0),
(1135, 'The Design of Everyday Things', 'Don Norman', 'Design', 102, 0),
(1136, 'Atomic Habits', 'James Clear', 'Self-help', 20, 1),
(1137, 'The Intelligent Investor', 'Benjamin Graham', 'Finance', 5, 3),
(1138, 'The Subtle Art of Not Giving a F*ck', 'Mark Manson', 'Self-help', 20, 10);

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `booked_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`id`, `room_id`, `booked_date`) VALUES
(1, 1, '2025-10-10'),
(2, 1, '2025-10-15'),
(3, 1, '2025-10-20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_board`
--
ALTER TABLE `admin_board`
  ADD PRIMARY KEY (`Admin User ID`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`BookID`) USING BTREE;

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `BookID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1141;

--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
