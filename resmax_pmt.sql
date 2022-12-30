-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 29, 2022 at 10:41 AM
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
  `categories` varchar(50) NOT NULL,
  `status` enum('active','deactive') NOT NULL DEFAULT 'active',
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `deleted` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `master_categories`
--

INSERT INTO `master_categories` (`id`, `categories`, `status`, `created`, `deleted`) VALUES
(1, 'Web app', 'active', '2022-12-13 16:26:05', '0');

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
  `type` bigint(11) NOT NULL,
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
(1, 'ICT', '2022-12-09 12:13:57', 'active', '0'),
(2, 'Project Manager', '2022-12-09 01:30:25', 'active', '0');

-- --------------------------------------------------------

--
-- Table structure for table `master_status`
--

CREATE TABLE `master_status` (
  `id` int(11) NOT NULL,
  `m_status` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `deleted` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `master_status`
--

INSERT INTO `master_status` (`id`, `m_status`, `created_at`, `deleted`) VALUES
(1, 'Inactive', '2022-12-20 11:09:25', '0'),
(2, 'Active', '2022-12-20 11:09:25', '0'),
(3, 'Running', '2022-12-20 11:10:16', '0'),
(4, 'Completed', '2022-12-20 11:10:16', '0'),
(5, 'Pending', '2022-12-20 11:10:16', '0'),
(6, 'Rejected', '2022-12-20 11:10:16', '0'),
(7, 'Approved', '2022-12-20 11:10:16', '0'),
(8, 'Confirmed', '2022-12-20 11:10:24', '0');

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
(4, 'user', '2022-11-29 07:40:24', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tasks`
--

CREATE TABLE `tbl_tasks` (
  `task_id` bigint(11) NOT NULL,
  `task_created_by` bigint(11) NOT NULL,
  `task_created` datetime NOT NULL DEFAULT current_timestamp(),
  `task_modified` datetime DEFAULT current_timestamp(),
  `task_modified_by` bigint(11) DEFAULT NULL,
  `task_project` bigint(11) NOT NULL,
  `task_title` varchar(500) NOT NULL,
  `task_description` varchar(1000) NOT NULL,
  `task_duration` varchar(50) NOT NULL,
  `task_start_day` datetime NOT NULL,
  `task_end_day` datetime NOT NULL,
  `task_resources` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`task_resources`)),
  `task_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_tasks`
--

INSERT INTO `tbl_tasks` (`task_id`, `task_created_by`, `task_created`, `task_modified`, `task_modified_by`, `task_project`, `task_title`, `task_description`, `task_duration`, `task_start_day`, `task_end_day`, `task_resources`, `task_status`) VALUES
(1, 10, '2022-12-26 11:16:31', '2022-12-29 09:55:28', 10, 1, 'Illo archi', 'Quaerat doloremque a', '2022-12-26 11:16:31', '2022-12-21 00:00:00', '2022-12-31 15:22:00', '{\"res\":[\"uploads\\\\resources\\\\1672054813pd.jpg\",\"uploads\\\\resources\\\\1672054813productdev.jpg\"]}', 1),
(2, 10, '2022-12-29 07:48:20', NULL, NULL, 1, 'Minim et nulla archi', 'Laborum aut deserunt', '0 days, 15 Hours', '2022-12-30 22:31:00', '2022-12-31 01:48:00', '[\"uploads\\\\resources\\\\1.jpeg\",\"uploads\\\\resources\\\\a.png\"]', 2);

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
(8, 'Meghan Austin', 1799493151, 'male', '1999-01-01', 'zylofozaji@mailinator.com', 'MHRWaG93Qm1hek5oNkpzaCtpYWJlZz09', 1, '2022-11-16 00:00:00', 'deactive'),
(9, 'Belet Mclean', 1879871963, 'male', '1976-05-10', 'lohimuh@mailinator.com', 'MHRWaG93Qm1hek5oNkpzaCtpYWJlZz09', 2, '2022-11-16 00:00:00', 'deactive'),
(10, 'Bamlak Desalegn', 1203722439, 'male', '2022-12-15', 'bamlak@resmax.com', 'eHJaSkJ3VEdvQkkxdFNMdUd3OGJOQT09', 1, '2022-11-16 00:00:00', 'active'),
(11, 'Silas Vega', 1951392660, 'male', '2011-02-23', 'jubi@mailinator.com', 'eHJaSkJ3VEdvQkkxdFNMdUd3OGJOQT09', 2, '2022-11-16 00:00:00', 'active');

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
  ADD KEY `city` (`city`,`state`,`country`),
  ADD KEY `fkr_maste_client_type` (`type`);

--
-- Indexes for table `master_client_types`
--
ALTER TABLE `master_client_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_status`
--
ALTER TABLE `master_status`
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
-- Indexes for table `tbl_tasks`
--
ALTER TABLE `tbl_tasks`
  ADD PRIMARY KEY (`task_id`),
  ADD KEY `frk_created_by` (`task_created_by`),
  ADD KEY `frk_modified_by` (`task_modified_by`),
  ADD KEY `frk_project` (`task_project`),
  ADD KEY `frk_task_status` (`task_status`);

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
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `master_clients`
--
ALTER TABLE `master_clients`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `master_client_types`
--
ALTER TABLE `master_client_types`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `master_status`
--
ALTER TABLE `master_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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
-- AUTO_INCREMENT for table `tbl_tasks`
--
ALTER TABLE `tbl_tasks`
  MODIFY `task_id` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
  ADD CONSTRAINT `fkr_maste_client_type` FOREIGN KEY (`type`) REFERENCES `master_client_types` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
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
-- Constraints for table `tbl_tasks`
--
ALTER TABLE `tbl_tasks`
  ADD CONSTRAINT `frk_created_by` FOREIGN KEY (`task_created_by`) REFERENCES `tbl_users` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `frk_modified_by` FOREIGN KEY (`task_modified_by`) REFERENCES `tbl_users` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `frk_project` FOREIGN KEY (`task_project`) REFERENCES `tbl_projects` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `frk_task_status` FOREIGN KEY (`task_status`) REFERENCES `master_status` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD CONSTRAINT `role_const_rk` FOREIGN KEY (`role`) REFERENCES `tbl_roles` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
