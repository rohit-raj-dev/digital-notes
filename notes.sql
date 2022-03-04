-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 04, 2022 at 04:22 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `notes`
--

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

CREATE TABLE `notes` (
  `s.no.` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `date/time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notes`
--

INSERT INTO `notes` (`s.no.`, `title`, `description`, `date/time`) VALUES
(2, 'hi', 'rohit lodhi124', '2022-03-02 10:13:39'),
(59, 'hi', 'roshni', '2022-03-03 11:12:29'),
(62, '', '', '2022-03-03 11:13:17'),
(63, '', '', '2022-03-03 11:13:18'),
(64, '', '', '2022-03-03 11:13:21'),
(65, '', '', '2022-03-03 11:13:21'),
(66, '', '', '2022-03-03 11:13:22'),
(67, '', '', '2022-03-03 11:13:22'),
(68, '', '', '2022-03-03 11:13:22'),
(69, '', '', '2022-03-03 11:13:22'),
(70, '', '', '2022-03-03 11:13:22'),
(71, '', '', '2022-03-03 11:13:22'),
(72, '', '', '2022-03-03 11:13:23'),
(73, '', '', '2022-03-03 11:13:23'),
(74, '', '', '2022-03-03 11:13:23'),
(75, '', '', '2022-03-03 11:13:23'),
(76, 'hyfh', 'hjhgjh', '2022-03-03 21:17:50'),
(77, 'hyfh', 'hjhgjh', '2022-03-03 21:18:01'),
(78, 'hyfh', 'hjhgjh', '2022-03-03 21:18:16'),
(79, '', '', '2022-03-03 21:18:27'),
(80, '', '', '2022-03-03 21:27:57'),
(81, '', '', '2022-03-03 21:28:34'),
(82, 'hjnhf', 'hgjhfhjfffjnhfjfjhhfjnhjhjhfjfgh', '2022-03-03 21:28:48'),
(83, 'hjnhf', 'hgjhfhjfffjnhfjfjhhfjnhjhjhfjfgh', '2022-03-03 21:29:31'),
(84, 'hjnhf', 'hgjhfhjfffjnhfjfjhhfjnhjhjhfjfgh', '2022-03-03 21:29:39'),
(85, 'hjnhf', 'hgjhfhjfffjnhfjfjhhfjnhjhjhfjfgh', '2022-03-03 21:39:00'),
(86, 'hjnhf', 'hgjhfhjfffjnhfjfjhhfjnhjhjhfjfgh', '2022-03-03 21:46:29'),
(87, 'fghjhjh', 'hjfhj', '2022-03-03 22:17:55'),
(88, 'fghjhjh', 'hjfhj', '2022-03-03 22:20:49'),
(89, 'fghjhjh', 'hjfhj', '2022-03-03 22:28:07'),
(90, 'fghjhjh', 'hjfhj', '2022-03-03 22:29:55'),
(91, 'fghjhjh', 'hjfhj', '2022-03-03 22:33:20'),
(92, 'fghjhjh', 'hjfhj', '2022-03-03 22:34:43'),
(93, 'fghjhjh', 'hjfhj', '2022-03-03 22:42:45'),
(94, 'fghjhjh', 'hjfhj', '2022-03-03 22:49:13'),
(95, 'fghjhjh', 'hjfhj', '2022-03-03 22:51:17'),
(96, 'fghjhjh', 'hjfhj', '2022-03-03 22:53:20'),
(97, 'fghjhjh', 'hjfhj', '2022-03-03 22:55:05'),
(98, 'fghjhjh', 'hjfhj', '2022-03-03 22:59:49'),
(99, 'fghjhjh', 'hjfhj', '2022-03-03 23:15:54'),
(100, 'hi', '', '2022-03-03 23:44:18'),
(101, 'hi', '', '2022-03-03 23:52:08'),
(102, 'hello', 'everyone', '2022-03-03 23:52:23'),
(103, '8978', '8980890ho', '2022-03-04 00:19:32');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`s.no.`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `notes`
--
ALTER TABLE `notes`
  MODIFY `s.no.` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
