-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 08, 2022 at 09:58 PM
-- Server version: 10.3.31-MariaDB-0+deb10u1
-- PHP Version: 7.3.31-1~deb10u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `extshane`
--

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `message_id` mediumint(8) UNSIGNED NOT NULL,
  `uid` mediumint(8) UNSIGNED NOT NULL,
  `message` mediumtext CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `time` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`message_id`, `uid`, `message`, `time`) VALUES
(1, 2, 'testing chat on test account', 1670034444),
(2, 1, 'testing chat on personal account', 1670034463),
(3, 1, 'spam for scroll bar test thing', 1670037233),
(4, 1, 'l', 1670037237),
(5, 1, 'll', 1670037238),
(6, 1, 'lll', 1670037238),
(7, 1, 'llll', 1670037238),
(8, 1, 'lllll', 1670037238),
(9, 1, 'lllll', 1670037239),
(10, 1, 'lllllll', 1670037240),
(11, 1, 'lllllll', 1670037240),
(12, 1, 'lllllll', 1670037240),
(13, 1, 'autoscroll test', 1670037600),
(14, 1, 'autoscroll test', 1670037664),
(15, 1, 'test2', 1670038015),
(16, 1, 'autoscroll test 3', 1670038102),
(17, 1, 'autoscroll test 4', 1670038108),
(18, 4, 'deleted user chat test 1', 1670102380);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `uid` int(11) NOT NULL,
  `username` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `email` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `phone` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `admin` int(255) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `username`, `password`, `email`, `phone`, `admin`) VALUES
(1, 'shane', '12122004', 'shane.fay@edu.hel.fi', 'not rn', 1),
(2, 'test', 'test', 'test', 'no', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`message_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `message_id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
