-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 20, 2020 at 11:47 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ilibrarydb`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `book_id` int(11) NOT NULL,
  `book_type_fk` int(11) NOT NULL,
  `is_issued` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`book_id`, `book_type_fk`, `is_issued`) VALUES
(1, 1, 1),
(2, 1, 0),
(3, 1, 0),
(4, 2, 1),
(5, 2, 0),
(6, 3, 0),
(7, 3, 0),
(8, 4, 0),
(9, 4, 0),
(10, 4, 0);

-- --------------------------------------------------------

--
-- Table structure for table `book_type`
--

CREATE TABLE `book_type` (
  `book_type_id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `author` varchar(200) NOT NULL,
  `description` varchar(400) DEFAULT NULL,
  `cost` int(11) DEFAULT NULL,
  `location` varchar(20) NOT NULL,
  `quantity` int(11) DEFAULT NULL,
  `cover_image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `book_type`
--

INSERT INTO `book_type` (`book_type_id`, `title`, `author`, `description`, `cost`, `location`, `quantity`, `cover_image`) VALUES
(1, 'Let Us C', 'Yashwant Kanetkar', 'C Language', 350, '1', 2, 'letusc.jpg'),
(2, 'Operating System Concepts', 'Avi Silberschatz, Peter Baer Galvin, Greg Gagne', 'Operation Systems', 500, '2', 1, 'os.jpg'),
(3, 'Database System Concepts', 'Abraham Silberschatz, Hank Korth, and S. Sudarshan', 'Database System Concepts is often called the sailboat book, because its cover has had sailboats since its first edition', 350, '3', 2, 'database.jpg'),
(4, 'Data Warehousing Fundamentals', 'Paulraj Ponniah', 'Data warehousing has revolutionized the way businesses in a wide variety of industries perform analysis and make strategic decisions.', 300, '2', 3, 'dwdm.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `prn` varchar(14) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `b_fk_1` int(11) DEFAULT NULL,
  `b_fk_2` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`prn`, `name`, `b_fk_1`, `b_fk_2`) VALUES
('1', 'Ritik', NULL, NULL),
('2', 'Abhinav', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_history`
--

CREATE TABLE `user_history` (
  `history_id` int(11) NOT NULL,
  `prn_fk` varchar(14) NOT NULL,
  `book_id_fk` int(11) NOT NULL,
  `rating` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_history`
--

INSERT INTO `user_history` (`history_id`, `prn_fk`, `book_id_fk`, `rating`) VALUES
(1, '1', 1, NULL),
(2, '1', 4, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`book_id`),
  ADD KEY `bt_fk` (`book_type_fk`);

--
-- Indexes for table `book_type`
--
ALTER TABLE `book_type`
  ADD PRIMARY KEY (`book_type_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`prn`),
  ADD KEY `b_fk_1` (`b_fk_1`),
  ADD KEY `b_fk_2` (`b_fk_2`);

--
-- Indexes for table `user_history`
--
ALTER TABLE `user_history`
  ADD PRIMARY KEY (`history_id`),
  ADD KEY `prn_fk` (`prn_fk`),
  ADD KEY `b_fk` (`book_id_fk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `book_type`
--
ALTER TABLE `book_type`
  MODIFY `book_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_history`
--
ALTER TABLE `user_history`
  MODIFY `history_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `books_ibfk_1` FOREIGN KEY (`book_type_fk`) REFERENCES `book_type` (`book_type_id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`b_fk_1`) REFERENCES `books` (`book_id`),
  ADD CONSTRAINT `users_ibfk_2` FOREIGN KEY (`b_fk_2`) REFERENCES `books` (`book_id`);

--
-- Constraints for table `user_history`
--
ALTER TABLE `user_history`
  ADD CONSTRAINT `user_history_ibfk_1` FOREIGN KEY (`book_id_fk`) REFERENCES `books` (`book_id`),
  ADD CONSTRAINT `user_history_ibfk_2` FOREIGN KEY (`prn_fk`) REFERENCES `users` (`prn`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
