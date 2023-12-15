-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 15, 2023 at 03:59 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dating_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `friend_match_list`
--

CREATE TABLE `friend_match_list` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `friend_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `friend_match_list`
--

INSERT INTO `friend_match_list` (`id`, `user_id`, `friend_id`) VALUES
(3, 28, 29),
(4, 29, 28),
(5, 28, 29),
(6, 30, 28),
(7, 28, 30),
(8, 30, 28),
(9, 29, 29),
(10, 29, 29),
(11, 28, 28),
(12, 28, 28),
(13, 28, 31),
(14, 31, 28),
(15, 28, 31),
(17, 35, 28),
(18, 28, 33),
(19, 33, 28),
(20, 28, 33),
(21, 28, 34),
(22, 28, 32),
(23, 36, 32),
(24, 32, 36),
(25, 36, 32);

-- --------------------------------------------------------

--
-- Table structure for table `liked_users`
--

CREATE TABLE `liked_users` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `liked_user_id` int(11) NOT NULL,
  `status` enum('liked','matched') DEFAULT 'liked'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `liked_users`
--

INSERT INTO `liked_users` (`id`, `user_id`, `liked_user_id`, `status`) VALUES
(1, 29, 28, 'liked'),
(2, 28, 29, 'matched'),
(4, 30, 28, 'liked'),
(5, 28, 30, 'matched'),
(6, 29, 29, 'matched'),
(7, 28, 28, 'matched'),
(8, 28, 31, 'liked'),
(9, 31, 28, 'matched'),
(11, 35, 28, 'liked'),
(12, 28, 33, 'liked'),
(13, 33, 28, 'matched'),
(14, 28, 34, 'liked'),
(15, 28, 32, 'liked'),
(16, 36, 32, 'liked'),
(17, 32, 36, 'matched');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `senderId` int(11) DEFAULT NULL,
  `receiverId` int(11) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `senderId`, `receiverId`, `message`, `timestamp`) VALUES
(1, 28, 29, 'hi', '2023-12-14 14:19:01'),
(2, 28, 31, 'dfs', '2023-12-14 14:19:10'),
(3, 28, 29, 'hi', '2023-12-14 14:21:01'),
(4, 28, 29, 'sdf', '2023-12-14 14:26:22'),
(5, 28, 29, 'd', '2023-12-14 14:27:32'),
(6, 28, 29, 'dfs', '2023-12-14 14:28:26'),
(7, 28, 29, 'dsf', '2023-12-14 14:28:57'),
(8, 28, 29, 'sdf', '2023-12-14 14:29:18'),
(9, 28, 29, 'df', '2023-12-14 14:32:45'),
(10, 28, 29, 'elka', '2023-12-14 14:34:48'),
(11, 29, 28, 'hola', '2023-12-14 14:35:26'),
(12, 29, 29, 'hola', '2023-12-14 14:35:41'),
(13, 29, 29, 'sdf', '2023-12-14 14:36:03'),
(14, 29, 29, 'sf', '2023-12-14 14:36:26'),
(15, 29, 28, 'sdf', '2023-12-14 14:36:40'),
(16, 29, 28, 'kiss', '2023-12-14 14:38:57'),
(17, 29, 28, 'sd', '2023-12-14 14:42:38'),
(18, 29, 28, 'dsf', '2023-12-14 14:55:09'),
(19, 29, 32, 'hi', '2023-12-14 15:17:13'),
(20, 28, 33, 'hi', '2023-12-14 16:35:35'),
(21, 33, 28, 'hi', '2023-12-14 16:36:28'),
(22, 33, 33, 'hello', '2023-12-14 16:36:40'),
(23, 33, 28, 'how are you?', '2023-12-14 16:37:04'),
(24, 33, 33, 'oh i\'m okay', '2023-12-14 16:37:15'),
(25, 33, 28, 'sino ka?', '2023-12-14 16:37:39'),
(26, 33, 28, 's', '2023-12-14 16:37:58'),
(27, 29, 28, 'hi', '2023-12-14 17:07:34'),
(28, 29, 30, 'dsf', '2023-12-14 17:25:06'),
(29, 29, 30, 'd', '2023-12-14 17:25:10'),
(30, 28, 30, 'hi', '2023-12-15 00:00:31'),
(31, 28, 29, 'hello', '2023-12-15 00:02:55'),
(32, 28, 29, 'how are you?', '2023-12-15 00:35:49'),
(33, 28, 30, 'hi', '2023-12-15 01:19:18'),
(34, 30, 28, 'hello', '2023-12-15 01:20:13'),
(35, 36, 32, 'hi po', '2023-12-15 01:24:29'),
(36, 32, 36, 'ulo mo', '2023-12-15 01:25:22'),
(37, 36, 28, 'd', '2023-12-15 01:27:17'),
(38, 28, 29, 'hi', '2023-12-15 02:06:59'),
(39, 29, 28, 'manifesting 5.0', '2023-12-15 02:07:37');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `pp` varchar(255) NOT NULL DEFAULT 'default-pp.png',
  `gender` varchar(10) DEFAULT NULL,
  `status` varchar(10) DEFAULT 'offline',
  `last_activity` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `age`, `address`, `username`, `password`, `pp`, `gender`, `status`, `last_activity`) VALUES
(28, 'Elka La-as', 22, 'Tantangan', 'elka', '$2y$10$hq5HB23j.DGeXydjZgKyZeza.797lLKqfi4OVGuNp4BFUKvfyOIEK', 'elka65734af7e396f3.98642131.jpg', 'female', 'offline', '2023-12-15 02:10:42'),
(29, 'Roemar', 22, 'Tantangan', 'rj', '$2y$10$JwRw3a4JEJZUNDPkcQcLsu.eCemPtZ4kKkPRA1sRjGqEZdjJGdnxe', 'rj65734b1a840e45.49290716.jpg', 'male', 'offline', '2023-12-15 02:07:56'),
(30, 'Jayvee ', 21, 'Polomolok', 'jay', '$2y$10$gUmIBPL3I0fTnaM5Eso.G.MBx0Gs7Q4nt651m7g1PEOi2npLt2j16', 'jay65750255516695.11711680.jpg', 'male', 'offline', '2023-12-15 01:20:17'),
(31, 'Mark James', 21, 'Marbel', 'mark', '$2y$10$mQSiF4XmJuqwfMyz8apysOAewgWNtPqXDmXbSs3BwcTo/SwbwLAc2', 'mark65799fefd32319.07115108.jpg', 'male', 'offline', '2023-12-13 14:35:25'),
(32, 'Nyko lopez', 22, 'tupi', 'nyko', '$2y$10$VxSBH1NEOvobtprCeXbLvOsuJBA7Y/iyO4N4v0WFgTo4s2HzpPoY6', 'nyko6579a623949e08.06214431.jpg', 'male', 'online', '2023-12-15 01:26:14'),
(33, 'Johnrey', 23, 'Polomolok', 'john', '$2y$10$3.lXTrSAM9BrtFVH2yNfmeXKXeYcvtWukcqRonf1KVfHv.2OrMtmu', 'john6579a64327e3f3.28044186.jpg', 'male', 'online', '2023-12-14 17:00:34'),
(34, 'Roel', 22, 'Polonuling', 'roel', '$2y$10$9w31tOVggdBYWem9wh37aeu0VKNvLtmvLiRkwFYmxl0Pwg045YXVa', 'roel6579a666d62f40.09568741.jpg', 'male', 'active', '2023-12-13 12:41:10'),
(35, 'Hernie', 18, 'Tupi', 'her', '$2y$10$RgNljR/o/vLKVBy.aUP7ie8msdrPDd1o1anCEbv6Gz45xYdR/F04i', 'her6579aa2a50b938.59988998.jpg', 'male', 'offline', '2023-12-13 13:01:21'),
(36, 'Krizelle', 21, 'tupi', 'kriz', '$2y$10$jzvF36MmK9iw/lnhNL/pKu4YDViQ0A8r7XXhYD5UsIDTxMEbyGKcu', 'kriz657baab4adfc33.82077074.jpg', 'female', 'offline', '2023-12-15 01:28:33'),
(37, 'Hernie 1', 5, 'tupi', 'her', '$2y$10$cP8rMEqhQbuLkARl5lqWAOWs32dKW1CZkrfqO1F2FBdUV/VivG.WK', 'her657bb47d2b8b35.37679500.jpg', 'female', 'active', '2023-12-15 02:05:49');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `friend_match_list`
--
ALTER TABLE `friend_match_list`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user` (`user_id`),
  ADD KEY `fk_friend` (`friend_id`);

--
-- Indexes for table `liked_users`
--
ALTER TABLE `liked_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_like` (`user_id`,`liked_user_id`),
  ADD KEY `liked_user_id` (`liked_user_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
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
-- AUTO_INCREMENT for table `friend_match_list`
--
ALTER TABLE `friend_match_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `liked_users`
--
ALTER TABLE `liked_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `friend_match_list`
--
ALTER TABLE `friend_match_list`
  ADD CONSTRAINT `fk_friend` FOREIGN KEY (`friend_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `fk_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `liked_users`
--
ALTER TABLE `liked_users`
  ADD CONSTRAINT `liked_users_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `liked_users_ibfk_2` FOREIGN KEY (`liked_user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
