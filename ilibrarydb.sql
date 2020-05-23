-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 23, 2020 at 11:11 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
(1, 1, 0),
(2, 1, 0),
(3, 1, 0),
(4, 2, 0),
(5, 2, 0),
(6, 3, 0),
(7, 3, 0),
(8, 4, 0),
(9, 4, 0),
(10, 4, 0),
(11, 5, 0),
(12, 5, 0),
(13, 5, 0),
(14, 5, 0);

-- --------------------------------------------------------

--
-- Table structure for table `book_type`
--

CREATE TABLE `book_type` (
  `book_type_id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `category` varchar(30) NOT NULL,
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

INSERT INTO `book_type` (`book_type_id`, `title`, `category`, `author`, `description`, `cost`, `location`, `quantity`, `cover_image`) VALUES
(1, 'Let Us C', 'Computer Science', 'Yashwant Kanetkar', 'C Language', 350, 'R1', 3, 'letusc.jpg'),
(2, 'Operating System Concepts', 'Computer Science', 'Avi Silberschatz, Peter Baer Galvin, Greg Gagne', 'Operation Systems', 500, 'R2', 2, 'os.jpg'),
(3, 'Database System Concepts', 'Computer Science', 'Abraham Silberschatz, Hank Korth, and S. Sudarshan', 'Database System Concepts is often called the sailboat book, because its cover has had sailboats since its first edition', 350, 'R3', 2, 'database1.jpg'),
(4, 'Data Warehousing Fundamentals', 'Computer Science', 'Paulraj Ponniah', 'Data warehousing has revolutionized the way businesses in a wide variety of industries perform analysis and make strategic decisions.', 300, 'R4', 3, 'dwdm.jpg'),
(5, 'Let Us Java', 'Computer Science', 'Yashwant Kanetkar', 'Basics of Java', 400, 'R8', 4, 'java.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`) VALUES
(1, 'Computer Science'),
(2, 'Physics');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(14) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `password` varchar(255) NOT NULL,
  `b_fk_1` int(11) DEFAULT NULL,
  `b_fk_2` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `created_at`, `password`, `b_fk_1`, `b_fk_2`) VALUES
(1, '2016BTECS00081', '2020-05-20 15:22:30', '$2y$10$CDs3tKwzUdnopjIMeN9aje9kqkXXDVrU2nEkxRs4K8Lp4k/C5SN0S', NULL, NULL),
(2, '2016BTECS00103', '2020-05-21 03:27:17', '$2y$10$0CLiOwHaiFaCeVKsSew9NeYUkkoTk2Sqa.pDtPvAgWJqUuOKf/Udq', NULL, NULL),
(3, '2016BTECS00063', '2020-05-22 02:07:27', '$2y$10$NaqfabCAAfAOivXa11bmaeAP2D3GQSH.TDfbYXUxUspa/PR8etnGy', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_history`
--

CREATE TABLE `user_history` (
  `history_id` int(11) NOT NULL,
  `username_fk` varchar(14) NOT NULL,
  `book_id_fk` int(11) NOT NULL,
  `date_of_issue` date NOT NULL DEFAULT current_timestamp(),
  `is_returned` tinyint(1) NOT NULL DEFAULT 0,
  `rating` int(11) DEFAULT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_history`
--

INSERT INTO `user_history` (`history_id`, `username_fk`, `book_id_fk`, `date_of_issue`, `is_returned`, `rating`, `time`) VALUES
(1, '2016BTECS00081', 4, '2020-05-21', 1, NULL, '2020-05-20 22:10:03'),
(2, '2016BTECS00081', 1, '2020-05-21', 1, NULL, '2020-05-20 22:11:18'),
(3, '2016BTECS00103', 1, '2020-05-21', 1, NULL, '2020-05-20 22:38:42'),
(4, '2016BTECS00063', 1, '2020-05-22', 1, NULL, '2020-05-21 20:38:21');

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
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`,`category_name`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `prn` (`username`) USING BTREE,
  ADD KEY `b_fk_1` (`b_fk_1`),
  ADD KEY `b_fk_2` (`b_fk_2`);

--
-- Indexes for table `user_history`
--
ALTER TABLE `user_history`
  ADD PRIMARY KEY (`history_id`),
  ADD KEY `prn_fk` (`username_fk`),
  ADD KEY `b_fk` (`book_id_fk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `book_type`
--
ALTER TABLE `book_type`
  MODIFY `book_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_history`
--
ALTER TABLE `user_history`
  MODIFY `history_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
  ADD CONSTRAINT `user_history_ibfk_2` FOREIGN KEY (`username_fk`) REFERENCES `users` (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
