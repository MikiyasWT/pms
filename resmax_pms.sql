-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 30, 2022 at 08:26 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

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
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_type` varchar(30) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `role_status` enum('active','deactive') DEFAULT 'active',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------
--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role_type`, `created_at`, `role_status`) VALUES
(1, 'HR Manager', '2022-11-28 09:50:27', 'deactivated'),
(2, 'Admin', '2022-11-28 10:28:42', 'active'),
(3, 'superadmin', '2022-11-28 02:21:12', 'active'),
(4, 'user', '2022-11-29 07:40:24', 'active');

-- --------------------------------------------------------
--
--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(11) NOT NULL AUTO_INCREMENT,
  `full_name` varchar(255) NOT NULL,
  `phone_num` bigint(11) DEFAULT NULL,
  `gender` enum('male','female') DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(200) NOT NULL,
  `role` int(11) NOT NULL,
  `register_date` datetime DEFAULT current_timestamp(),
  `user_status` enum('active','deactive') DEFAULT 'active',
  PRIMARY KEY (`id`),
  KEY `role` (`role`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


INSERT INTO `users` (`id`, `full_name`, `phone_num`, `gender`, `dob`, `email`, `password`, `role`, `register_date`, `user_status`) VALUES
(1, 'Mikiyas Wendmneh Teshome', 0, '', NULL, 'mikiyas@resmax.com', 'YXdlcHowOHk0NkF0QXYzbzAvR1F6dz09', 1, '2022-11-15 00:00:00', '0'),
(2, 'Natty man', 0, '', NULL, 'natty20@gmail.com', 'YXdlcHowOHk0NkF0QXYzbzAvR1F6dz09', 1, '2022-11-15 00:00:00', '0'),
(3, 'Mekbib Kassahun', 0, '', NULL, 'mekbib@resmax.com', 'MHRWaG93Qm1hek5oNkpzaCtpYWJlZz09', 1, '2022-11-16 00:00:00', '0'),
(4, 'Robel Hailu', 0, '', NULL, 'robel@resmax.com', 'YXdlcHowOHk0NkF0QXYzbzAvR1F6dz09', 1, '2022-11-16 00:00:00', '0'),
(5, 'leul man', 0, '', NULL, 'leul@resmx.com', 'YXdlcHowOHk0NkF0QXYzbzAvR1F6dz09', 1, '2022-11-16 00:00:00', '0'),
(6, 'Bisrat Getachew Worku', 0, '', NULL, 'bsrat@laterite.com', 'MHRWaG93Qm1hek5oNkpzaCtpYWJlZz09', 1, '2022-11-16 00:00:00', '0'),
(8, 'yonas gebreyes', 0, '', NULL, 'yonas@gmail.com', 'MHRWaG93Qm1hek5oNkpzaCtpYWJlZz09', 1, '2022-11-16 00:00:00', '0'),
(9, 'Bethel Yohannes', 0, '', NULL, 'bethel@resmax.com', 'MHRWaG93Qm1hek5oNkpzaCtpYWJlZz09', 1, '2022-11-16 00:00:00', '0'),
(10, 'Bamlak Desalegn', 0, '', NULL, 'bamlak@resmax.com', 'eHJaSkJ3VEdvQkkxdFNMdUd3OGJOQT09', 1, '2022-11-16 00:00:00', '0'),
(11, 'Meti Garomsa', 0, '', NULL, 'meti@resmax.com', 'eHJaSkJ3VEdvQkkxdFNMdUd3OGJOQT09', 1, '2022-11-16 00:00:00', '0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `role_const_rk` FOREIGN KEY (`role`) REFERENCES `roles` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
