-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 05, 2026 at 09:17 AM
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
-- Database: `miniproject1`
--

-- --------------------------------------------------------

--
-- Table structure for table `marks`
--

CREATE TABLE `marks` (
  `id` int(10) NOT NULL,
  `name` varchar(20) NOT NULL,
  `marks` int(4) NOT NULL,
  `subject` varchar(20) NOT NULL,
  `IC` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `marks`
--

INSERT INTO `marks` (`id`, `name`, `marks`, `subject`, `IC`) VALUES
(1, 'Ali', 97, 'Python', '012378945671'),
(2, 'Adam', 45, 'Full Stack', '012345678910'),
(3, 'Adil', 66, 'Java', '060705070397');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userid` int(11) NOT NULL,
  `email` text NOT NULL,
  `password` varchar(255) NOT NULL,
  `ic` varchar(12) NOT NULL,
  `program` varchar(10) NOT NULL,
  `name` text NOT NULL,
  `profile_pic` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userid`, `email`, `password`, `ic`, `program`, `name`, `profile_pic`) VALUES
(1, 'testuser@gmail.com', '$2y$10$JB19cWmiBANKaI57Hytp6eycHUj9RewPvuyks43y3vZAZ68b1PJfm', '012345678911', 'DIT', 'Test user\r\n', NULL),
(2, 'test@gmail.com', '$2y$10$JB19cWmiBANKaI57Hytp6eycHUj9RewPvuyks43y3vZAZ68b1PJfm', '0123456789', 'DDE', 'User2', NULL),
(3, 'ali@gmail.com', '$2y$10$JB19cWmiBANKaI57Hytp6eycHUj9RewPvuyks43y3vZAZ68b1PJfm', '050809073967', 'DKM', 'Ali', NULL),
(4, 'chinzihuai@gmail.com', '$2y$10$ZTh/1Gj38qqQOizCHSFka.4VLYKds.w/.RbE8L4y8Al3dfmDymOQi', '060705070397', 'DIT', 'Chin Zi Huai', 'profile_4_6ac34dd71eb9d0.09596456.png'),
(5, 'test1@gmail.com', '$2y$10$L0SzBPHsBqTqDsVHhuCE/uLqHp2l39yMUW8ZIQLuGFfzK8Yory11K', '111', '111', 'test', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `marks`
--
ALTER TABLE `marks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `marks`
--
ALTER TABLE `marks`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
