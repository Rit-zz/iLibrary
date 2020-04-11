-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 09, 2020 at 09:36 AM
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

ALTER TABLE `book_type`
  ADD PRIMARY KEY (`book_type_id`);
COMMIT;
--
-- Indexes for dumped tables
--
ALTER TABLE `book_type`
  MODIFY `book_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- Indexes for table `book_type`
--


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
INSERT INTO `book_type` (`title`, `author`, `description`, `cost`, `location`, `quantity`, `cover_image`) VALUES
('Database System Concepts', 'Abraham Silberschatz, Hank Korth, and S. Sudarshan', 'Database System Concepts is often called the sailboat book, because its cover has had sailboats since its first edition', 350, '3', 2, 'database.jpg'),
('Data Warehousing Fundamentals', 'Paulraj Ponniah', 'Data warehousing has revolutionized the way businesses in a wide variety of industries perform analysis and make strategic decisions.', 300, '2', 3, 'dwdm.jpg');
