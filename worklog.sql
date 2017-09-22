-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 23, 2017 at 12:52 AM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `worklog`
--

-- --------------------------------------------------------

--
-- Table structure for table `mylog`
--

CREATE TABLE `mylog` (
  `id` int(11) NOT NULL,
  `ip` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `user_type` enum('USER','ADMIN') COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `fullname` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `action` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `mylog`
--

INSERT INTO `mylog` (`id`, `ip`, `created`, `user_type`, `username`, `fullname`, `action`, `user_id`) VALUES
(1, '::1', '2017-09-22 02:47:20', 'ADMIN', 'admin', 'อิสระ จำกัดชน', 'Login success', 1),
(2, '::1', '2017-09-22 02:48:45', 'USER', 'benext', 'Unknow', 'Wrong username!', 0),
(3, '::1', '2017-09-22 02:49:04', 'USER', 'admin', 'Unknow', 'Wrong password!', 0),
(4, '::1', '2017-09-22 02:49:19', 'ADMIN', 'admin', 'อิสระ จำกัดชน', 'Login success', 1),
(5, '::1', '2017-09-22 19:22:26', 'USER', 'admin', 'Unknow', 'Wrong password!', 0),
(6, '::1', '2017-09-22 19:22:34', 'ADMIN', 'admin', 'อิสระ จำกัดชน', 'Login success', 1),
(7, '::1', '2017-09-22 20:13:06', 'USER', 'benext', 'Unknow', 'Wrong username!', 0),
(8, '::1', '2017-09-22 20:13:11', 'USER', 'aaaaa', 'Unknow', 'Wrong username!', 0),
(9, '::1', '2017-09-22 20:13:14', 'USER', 'test', 'Unknow', 'Wrong username!', 0),
(10, '::1', '2017-09-22 20:13:17', 'USER', 'xxxxxxxxx', 'Unknow', 'Wrong username!', 0),
(11, '::1', '2017-09-22 20:13:21', 'USER', 'xxxxxxxxx', 'Unknow', 'Wrong username!', 0),
(12, '::1', '2017-09-22 20:13:26', 'USER', 'admin', 'Unknow', 'Wrong password!', 0),
(13, '::1', '2017-09-22 20:13:30', 'USER', 'admin', 'Unknow', 'Wrong password!', 0),
(14, '::1', '2017-09-22 20:13:35', 'ADMIN', 'admin', 'อิสระ จำกัดชน', 'Login success', 1),
(15, '::1', '2017-09-22 22:08:05', 'USER', 'demo', 'ชุมพร อำไพวงศ์', 'Login success', 2),
(16, '::1', '2017-09-22 22:08:25', 'USER', 'demo', 'ชุมพร อำไพวงศ์', 'Login success', 2),
(17, '::1', '2017-09-22 22:12:48', 'ADMIN', 'admin', 'อิสระ จำกัดชน', 'Login success', 1),
(18, '::1', '2017-09-23 00:43:16', 'USER', 'demo', 'ชุมพร อำไพวงศ์', 'Login success', 2),
(19, '::1', '2017-09-23 00:44:12', 'USER', 'tawatsak', 'สมชาย จันดี', 'Login success', 3);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `user_type` enum('USER','ADMIN') COLLATE utf8_unicode_ci NOT NULL,
  `fullname` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `state` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `user_type`, `fullname`, `state`) VALUES
(1, 'admin', '113aa6fc188342330df5cfe7736f0d55b520c8b4', 'ADMIN', 'อิสระ จำกัดชน', 1),
(2, 'demo', '88c0c28f6d16bede814fdf7a53cbd874010da554', 'USER', 'ชุมพร อำไพวงศ์', 1),
(3, 'tawatsak', 'd928f96586b3412e1351c3d877e08c3b2c1dcea2', 'USER', 'สมชาย จันดี', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mylog`
--
ALTER TABLE `mylog`
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
-- AUTO_INCREMENT for table `mylog`
--
ALTER TABLE `mylog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
