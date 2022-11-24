-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 19, 2022 at 11:28 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `resmax_pms`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `role` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(200) NOT NULL,
  `register_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `full_name`, `user_name`, `role`, `email`, `password`, `register_date`) VALUES
(1, 'Mikiyas Wendmneh Teshome', 'Mikiyaswt', 1, 'mikiyas@resmax.com', 'YXdlcHowOHk0NkF0QXYzbzAvR1F6dz09', '2022-11-15'),
(2, 'Natty man', 'nattyResmax', 1, 'natty20@gmail.com', 'YXdlcHowOHk0NkF0QXYzbzAvR1F6dz09', '2022-11-15'),
(3, 'Mekbib Kassahun', 'jayjay', 1, 'mekbib@resmax.com', 'MHRWaG93Qm1hek5oNkpzaCtpYWJlZz09', '2022-11-16'),
(4, 'Robel Hailu', 'Roba28', 1, 'robel@resmax.com', 'YXdlcHowOHk0NkF0QXYzbzAvR1F6dz09', '2022-11-16'),
(5, 'leul man', 'leulx', 1, 'leul@resmx.com', 'YXdlcHowOHk0NkF0QXYzbzAvR1F6dz09', '2022-11-16'),
(6, 'Bisrat Getachew Worku', 'bsrat', 1, 'bsrat@laterite.com', 'MHRWaG93Qm1hek5oNkpzaCtpYWJlZz09', '2022-11-16'),
(8, 'yonas gebreyes', 'yg', 1, 'yonas@gmail.com', 'MHRWaG93Qm1hek5oNkpzaCtpYWJlZz09', '2022-11-16'),
(9, 'Bethel Yohannes', 'betty', 1, 'bethel@resmax.com', 'MHRWaG93Qm1hek5oNkpzaCtpYWJlZz09', '2022-11-16'),
(10, 'Bamlak Desalegn', 'Bamlak', 1, 'bamlak@resmax.com', 'eHJaSkJ3VEdvQkkxdFNMdUd3OGJOQT09', '2022-11-16'),
(11, 'Meti Garomsa', 'MetiG', 1, 'meti@resmax.com', 'eHJaSkJ3VEdvQkkxdFNMdUd3OGJOQT09', '2022-11-16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_name` (`user_name`),
  ADD UNIQUE KEY `user_name_2` (`user_name`),
  ADD KEY `role` (`role`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
