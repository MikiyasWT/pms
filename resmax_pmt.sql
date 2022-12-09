-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 09, 2022 at 03:18 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `resmax_pmt`
--

-- --------------------------------------------------------

--
-- Table structure for table `master_categories`
--

CREATE TABLE `master_categories` (
  `id` bigint(11) NOT NULL,
  `categories` int(11) NOT NULL,
  `status` enum('active','deactive') NOT NULL DEFAULT 'active',
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `deleted` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `master_clients`
--

CREATE TABLE `master_clients` (
  `id` bigint(11) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `created_by` bigint(11) NOT NULL,
  `modified` datetime DEFAULT NULL,
  `modified_by` bigint(11) DEFAULT NULL,
  `name` varchar(50) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `state` varchar(50) DEFAULT NULL,
  `country` varchar(50) DEFAULT NULL,
  `type` varchar(10) NOT NULL,
  `email` varchar(155) NOT NULL,
  `phone` int(11) NOT NULL,
  `fax` int(11) DEFAULT NULL,
  `contact_person` varchar(50) NOT NULL,
  `contact_person_number` int(11) NOT NULL,
  `contact_person_email` varchar(155) NOT NULL,
  `comments` varchar(500) DEFAULT NULL,
  `status` enum('active','deactive') NOT NULL DEFAULT 'active',
  `deleted` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `master_clients`
--

INSERT INTO `master_clients` (`id`, `created`, `created_by`, `modified`, `modified_by`, `name`, `address`, `city`, `state`, `country`, `type`, `email`, `phone`, `fax`, `contact_person`, `contact_person_number`, `contact_person_email`, `comments`, `status`, `deleted`) VALUES
(1, '2022-12-09 02:38:31', 10, NULL, NULL, 'Fidel programming', 'Pastor Square adis ketema', 'Addis Abeba', 'Addis Abeba', 'Ethiopia', '2', 'bamlakdesalgn@gmail.com', 923974523, 1597530512, 'Natnael', 928187484, 'natnael@resmax.com', NULL, 'active', '0'),
(2, '2022-12-09 02:40:09', 10, NULL, NULL, 'Fidel programming', 'Pastor Square adis ketema', 'Addis Abeba', 'Addis Abeba', 'Ethiopia', '2', 'bamlakdesalgn@gmail.com', 923974523, 1597530512, 'Natnael', 928187484, 'natnael@resmax.com', NULL, 'active', '0'),
(3, '2022-12-09 02:42:29', 10, NULL, NULL, 'Bamlak Desalgn', 'Pastor Square adis ketema', 'Addis Abeba', 'Addis Abeba', 'Ethiopia', '2', 'bamlak@resmax.com', 923974523, 1597530512, 'Natnael', 928187484, 'natnael@resmax.com', NULL, 'active', '0'),
(4, '2022-12-09 02:43:29', 10, NULL, NULL, 'Bamlak Desalgn', 'Pastor Square adis ketema', 'Addis Abeba', 'Amhara', 'Ethiopia', '1', '1235@gmail.com', 900979899, 1597530512, 'Natnael', 928187484, 'natnael@resmax.com', NULL, 'active', '0');

-- --------------------------------------------------------

--
-- Table structure for table `master_client_types`
--

CREATE TABLE `master_client_types` (
  `id` bigint(11) NOT NULL,
  `client_type` varchar(50) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `status` enum('active','deactive') NOT NULL DEFAULT 'active',
  `deleted` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `master_client_types`
--

INSERT INTO `master_client_types` (`id`, `client_type`, `created`, `status`, `deleted`) VALUES
(1, 'Project menber', '2022-12-09 12:13:57', 'active', '0'),
(2, 'Project Manager', '2022-12-09 01:30:25', 'active', '0');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_projects`
--

CREATE TABLE `tbl_projects` (
  `id` bigint(11) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `created_by` bigint(11) NOT NULL,
  `modified` datetime DEFAULT current_timestamp(),
  `modified_by` bigint(11) DEFAULT NULL,
  `client` bigint(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `project_category` bigint(11) NOT NULL,
  `description` varchar(500) DEFAULT NULL,
  `start_date` date NOT NULL DEFAULT current_timestamp(),
  `end_date` date NOT NULL,
  `status` enum('active','deactive') NOT NULL DEFAULT 'active',
  `deleted` enum('1','0') DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_roles`
--

CREATE TABLE `tbl_roles` (
  `id` int(11) NOT NULL,
  `role_type` varchar(30) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `role_status` enum('active','deactive') DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_roles`
--

INSERT INTO `tbl_roles` (`id`, `role_type`, `created_at`, `role_status`) VALUES
(1, 'HR Manager', '2022-11-28 09:50:27', 'active'),
(2, 'Admin', '2022-11-28 10:28:42', 'active'),
(3, 'superadmin', '2022-11-28 02:21:12', 'active'),
(4, 'user', '2022-11-29 07:40:24', 'deactive');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id` bigint(11) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `phone_num` bigint(11) DEFAULT NULL,
  `gender` enum('male','female') DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(200) NOT NULL,
  `role` int(11) NOT NULL,
  `register_date` datetime DEFAULT current_timestamp(),
  `user_status` enum('active','deactive') DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `full_name`, `phone_num`, `gender`, `dob`, `email`, `password`, `role`, `register_date`, `user_status`) VALUES
(1, 'Mikiyas Wendmneh Teshome', 900979899, 'male', '2012-02-07', 'mikiyas@resmax.com', 'YXdlcHowOHk0NkF0QXYzbzAvR1F6dz09', 1, '2022-11-15 00:00:00', 'active'),
(2, 'Natty man', 0, '', NULL, 'natty20@gmail.com', 'YXdlcHowOHk0NkF0QXYzbzAvR1F6dz09', 1, '2022-11-15 00:00:00', 'active'),
(3, 'Mekbib Kassahun', 0, '', NULL, 'mekbib@resmax.com', 'MHRWaG93Qm1hek5oNkpzaCtpYWJlZz09', 1, '2022-11-16 00:00:00', 'active'),
(4, 'Robel Hailu', 0, '', NULL, 'robel@resmax.com', 'YXdlcHowOHk0NkF0QXYzbzAvR1F6dz09', 1, '2022-11-16 00:00:00', 'active'),
(5, 'leul man', 0, '', NULL, 'leul@resmx.com', 'YXdlcHowOHk0NkF0QXYzbzAvR1F6dz09', 1, '2022-11-16 00:00:00', 'active'),
(6, 'Bisrat Getachew Worku', 0, '', NULL, 'bsrat@laterite.com', 'MHRWaG93Qm1hek5oNkpzaCtpYWJlZz09', 1, '2022-11-16 00:00:00', 'active'),
(8, 'yonas gebreyes', 0, '', NULL, 'yonas@gmail.com', 'MHRWaG93Qm1hek5oNkpzaCtpYWJlZz09', 1, '2022-11-16 00:00:00', 'active'),
(9, 'Bethel Yohannes', 0, '', NULL, 'bethel@resmax.com', 'MHRWaG93Qm1hek5oNkpzaCtpYWJlZz09', 1, '2022-11-16 00:00:00', 'active'),
(10, 'Bamlak Desalegn', 0, '', NULL, 'bamlak@resmax.com', 'eHJaSkJ3VEdvQkkxdFNMdUd3OGJOQT09', 1, '2022-11-16 00:00:00', 'active'),
(11, 'Meti Garomsa', 0, '', NULL, 'meti@resmax.com', 'eHJaSkJ3VEdvQkkxdFNMdUd3OGJOQT09', 1, '2022-11-16 00:00:00', 'deactive');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `master_categories`
--
ALTER TABLE `master_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_clients`
--
ALTER TABLE `master_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fkr_created_by_master` (`created_by`),
  ADD KEY `fkr_modified_by_master` (`modified_by`),
  ADD KEY `city` (`city`,`state`,`country`);

--
-- Indexes for table `master_client_types`
--
ALTER TABLE `master_client_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_projects`
--
ALTER TABLE `tbl_projects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fkr_created_by` (`created_by`),
  ADD KEY `fkr_modified_by` (`modified_by`),
  ADD KEY `fkr_maste_client` (`client`),
  ADD KEY `project_category` (`project_category`,`status`);

--
-- Indexes for table `tbl_roles`
--
ALTER TABLE `tbl_roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role` (`role`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `master_categories`
--
ALTER TABLE `master_categories`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `master_clients`
--
ALTER TABLE `master_clients`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `master_client_types`
--
ALTER TABLE `master_client_types`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_projects`
--
ALTER TABLE `tbl_projects`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_roles`
--
ALTER TABLE `tbl_roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `master_clients`
--
ALTER TABLE `master_clients`
  ADD CONSTRAINT `fkr_created_by_master` FOREIGN KEY (`created_by`) REFERENCES `tbl_users` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fkr_modified_by_master` FOREIGN KEY (`modified_by`) REFERENCES `tbl_users` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `tbl_projects`
--
ALTER TABLE `tbl_projects`
  ADD CONSTRAINT `fkr_categories` FOREIGN KEY (`project_category`) REFERENCES `master_categories` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fkr_created_by` FOREIGN KEY (`created_by`) REFERENCES `tbl_users` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fkr_maste_client` FOREIGN KEY (`client`) REFERENCES `master_clients` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fkr_modified_by` FOREIGN KEY (`modified_by`) REFERENCES `tbl_users` (`id`) ON DELETE NO ACTION;

--
-- Constraints for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD CONSTRAINT `role_const_rk` FOREIGN KEY (`role`) REFERENCES `tbl_roles` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
