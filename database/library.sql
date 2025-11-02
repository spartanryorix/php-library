-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 02, 2025 at 02:24 PM
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
-- Database: `library`
--

-- --------------------------------------------------------

--
-- Table structure for table `account_info`
--

CREATE TABLE `account_info` (
  `id` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `account_info`
--

INSERT INTO `account_info` (`id`, `username`, `email`, `password`, `role`) VALUES
(4, 'rakeeb', 'abcd123@gmail.com', '$2y$10$pibuz7V5w9zgr/xqtgqBDeigID9Y8SvdxJNO71BDIWae68YWpErXC', 'customer'),
(6, 'ryrawwrix', '2878abdulrakeeb@gmail.com', '$2y$10$ARRtaxY7nxkNs6zNHTfy/.L0pq2ur9lMsJ7VxpWCtd9geaVQ6bUKK', 'admin'),
(8, 'rakyrake', 'krk123@gmail.com', '$2y$10$w3uGo6ZehzfTNJ.jYPukJuU1chyQ2gdWyIXZ8KPwwNX6zK1FarP32', 'customer'),
(10, 'kingrake', 'kingrake123@gmail.com', '$2y$10$d8UTh1KNZ5UHp/8HGqsH/OjwEdnAhksSqeIr4KUA.8Z2EiAeJ3PB2', 'customer'),
(11, 'Abdul Rakeeb', 'som12@gmail.com', '$2y$10$wKGXGEzwnxhe0uC1cFfX7O2CNBtSKx5iPgxfdmG7eGRU5G//fPCHG', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `book_name` varchar(255) NOT NULL,
  `author_name` varchar(255) NOT NULL,
  `release_date` date NOT NULL,
  `genre` varchar(255) NOT NULL,
  `added_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `book_name`, `author_name`, `release_date`, `genre`, `added_by`) VALUES
(11, 'To Kill a Mockingbird', 'Harper Lee', '1960-06-11', 'Fiction', NULL),
(12, '1984', 'George Orwell', '1949-05-08', 'Dystopian', NULL),
(13, 'Pride and Prejudice', 'Jane Austen', '1813-01-28', 'Romance', NULL),
(14, 'The Great Gatsby', 'F. Scott Fitzgerald', '1925-04-10', 'Fiction', NULL),
(15, 'The Hobbit', 'J.R.R. Tolkien', '1937-09-21', 'Fantasy', NULL),
(16, 'The Catcher in the Rye', 'J.D. Salinger', '1951-07-16', 'Fiction', NULL),
(17, 'The Kite Runner', 'Khaled Hosseini', '2003-05-29', 'Drama', NULL),
(18, 'The Silent Patient', 'Alex Michaelides', '2019-02-05', 'Psychological Thriller', 4);

-- --------------------------------------------------------

--
-- Table structure for table `borrowing`
--

CREATE TABLE `borrowing` (
  `id` int(10) NOT NULL,
  `book_id` int(10) NOT NULL,
  `member_id` int(10) NOT NULL,
  `borrowed_at` datetime NOT NULL DEFAULT current_timestamp(),
  `return_date` datetime(6) DEFAULT NULL,
  `returned_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `borrowing`
--

INSERT INTO `borrowing` (`id`, `book_id`, `member_id`, `borrowed_at`, `return_date`, `returned_at`) VALUES
(20, 14, 6, '2025-03-27 16:41:02', '2025-03-28 12:00:00.000000', '2025-03-27 16:42:49'),
(21, 15, 6, '2025-03-27 16:43:15', '2025-03-28 12:00:00.000000', '2025-11-02 13:13:39'),
(22, 14, 6, '2025-03-27 16:59:44', '2025-03-27 17:00:00.000000', '2025-03-27 17:00:06');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `transaction_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `issue_date` datetime NOT NULL,
  `return_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account_info`
--
ALTER TABLE `account_info`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user` (`added_by`);

--
-- Indexes for table `borrowing`
--
ALTER TABLE `borrowing`
  ADD PRIMARY KEY (`id`),
  ADD KEY `books_table` (`book_id`),
  ADD KEY `members_table` (`member_id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`transaction_id`),
  ADD KEY `book_id` (`book_id`),
  ADD KEY `member_id` (`member_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account_info`
--
ALTER TABLE `account_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `borrowing`
--
ALTER TABLE `borrowing`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `fk_user` FOREIGN KEY (`added_by`) REFERENCES `account_info` (`id`);

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_ibfk_1` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`),
  ADD CONSTRAINT `transactions_ibfk_2` FOREIGN KEY (`member_id`) REFERENCES `members` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
