-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 15, 2022 at 12:09 PM
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

--
-- Dumping data for table `master_clients`
--

INSERT INTO `master_clients` (`id`, `created`, `created_by`, `modified`, `modified_by`, `name`, `address`, `city`, `state`, `country`, `type`, `email`, `phone`, `fax`, `contact_person`, `contact_person_number`, `contact_person_email`, `comments`, `status`, `deleted`) VALUES
(1, '2022-12-09 02:38:31', 10, '2022-12-15 12:04:46', 10, 'Naida', 'Pastor Square adis ketema', 'Addis Abeba', 'Addis Abeba', 'Ethiopia', 1, 'bamlakdesalgn@gmail.com', 923974523, 1597530512, 'Natnael', 928187484, 'natnael@resmax.com', 'Test Commnets or comment', 'active', '0'),
(2, '2022-12-09 02:40:09', 10, '2022-12-12 10:35:09', 10, 'Alem Demoz', 'Pastor Square adis ketema', 'Addis Abeba', 'Addis Abeba', 'Ethiopia', 1, 'bamlakdesalgn@gmail.com', 923974523, 1597530512, 'Natnael', 928187484, 'natnael@resmax.com', NULL, 'active', '0'),
(3, '2022-12-09 02:42:29', 10, NULL, NULL, 'Bamlak Desalgn', 'Pastor Square adis ketema', 'Addis Abeba', 'Addis Abeba', 'Ethiopia', 2, 'bamlak@resmax.com', 923974523, 1597530512, 'Natnael', 928187484, 'natnael@resmax.com', NULL, 'active', '0'),
(4, '2022-12-09 02:43:29', 10, NULL, NULL, 'Test name', 'Pastor Square adis ketema', 'Addis Abeba', 'Amhara', 'Ethiopia', 1, '1235@gmail.com', 900979899, 1597530512, 'Natnael', 928187484, 'natnael@resmax.com', NULL, 'active', '0'),
(5, '2022-12-13 02:23:25', 10, NULL, NULL, 'Raja', 'pastor squre 122', 'Addis Abeba', 'Addis Abeba', 'Ethiopia', 2, 'raja@gmil.com', 945874445, 1597535165, 'Elsa', 945477845, 'elsa@gmail.com', NULL, 'active', '0'),
(6, '2022-12-14 09:31:24', 10, NULL, NULL, 'Chastity Shaw', 'At harum occaecat ut', 'Nisi', 'Velit dolor explicab', 'In', 2, 'cofosapece@mailinator.com', 1739319165, 1909571320, 'Austin Mckee', 1605314652, 'mapa@mailinator.com', NULL, 'active', '0'),
(7, '2022-12-14 10:26:44', 10, NULL, NULL, 'Catila ford', 'Tempor qui labore vo', 'Qui necessitatibus m', 'Ullamco vel mollitia', 'Est', 1, 'lukazy@mailinator.com', 1391562865, 1289681196, 'Raymond Moran', 1896607261, 'dekuk@mailinator.com', NULL, 'active', '0'),
(8, '2022-12-14 12:40:45', 10, NULL, NULL, 'Berk Joyner', 'Non doloribus quos o', 'Labore illum nostru', 'Eaque et ut alias vo', 'Quae', 1, 'govujeda@mailinator.com', 1453335535, 1473199275, 'Pamela Richardson', 1234912715, 'gaxa@mailinator.com', NULL, 'active', '0'),
(9, '2022-12-14 12:41:05', 10, NULL, NULL, 'Yoko Fernandez', 'Laborum Magna quasi', 'Ullamco et non molli', 'Rerum non odio ea is', 'Possimus', 2, 'zedupy@mailinator.com', 1683713355, 1387727572, 'Salvador Poole', 1872665154, 'lalefexif@mailinator.com', NULL, 'active', '0'),
(10, '2022-12-14 12:42:46', 10, NULL, NULL, 'Remedios Delaney', 'Est sunt dolorum qua', 'Reiciendis ut non cu', 'Eveniet cupidatat i', 'Possimu', 1, 'gelyhedigi@mailinator.com', 1983462595, 1946647141, 'Ronan Haynes', 1749108400, 'pijek@mailinator.com', NULL, 'active', '0'),
(11, '2022-12-14 12:51:04', 10, NULL, NULL, 'Astra Sexton', 'Et ea est officiis', 'Reprehenderit est d', 'Ut quis ea est corru', 'Suscipit', 2, 'lelypop@mailinator.com', 1237394253, 1444424188, 'Martina Guerrero', 1645801639, 'qymywuto@mailinator.com', NULL, 'active', '0'),
(12, '2022-12-14 12:57:55', 10, NULL, NULL, 'Wing Mcdaniel', 'Totam velit quis lab', 'Quo sequi beatae dic', 'Doloremque in expedi', 'laboriosam', 2, 'zyxipas@mailinator.com', 1422974586, 1856236351, 'Lisandra Mendoza', 1969736650, 'cilox@mailinator.com', NULL, 'active', '0'),
(13, '2022-12-14 12:59:38', 10, NULL, NULL, 'Bamlak Desalgen', 'Pastor Square', 'Addis Ababa', 'Addis Ababa', 'Ethiopia', 2, 'bamlakdesalgn@gmail.com', 923974523, 923974523, 'Bamlak', 923974523, 'bamlakdesalgn@gmail.com', NULL, 'active', '0'),
(14, '2022-12-14 12:59:59', 10, NULL, NULL, 'Amery Andrews', 'Laboris delectus no', 'Sint ipsa omnis qui', 'Dolore pariatur Cul', 'Recusandae', 1, 'tysacyru@mailinator.com', 1459739313, 1368233266, 'Teegan Pace', 1482265605, 'pexifij@mailinator.com', NULL, 'active', '0'),
(15, '2022-12-14 01:03:23', 10, NULL, NULL, 'Benedict Herrera', 'Quia velit in nobis', 'Quo est in reprehend', 'Voluptatibus molesti', 'Tempora', 2, 'xikuno@mailinator.com', 1205997134, 1774252903, 'Mannix Walton', 1178258325, 'ryjykiwibo@mailinator.com', NULL, 'active', '0'),
(16, '2022-12-14 01:04:44', 10, NULL, NULL, 'Petra Morse', 'Eiusmod cupiditate v', 'Ea fugit ipsum ali', 'Laborum In et moles', 'Incididunt', 2, 'dolu@mailinator.com', 1602564579, 1528698418, 'Elmo Brooks', 1468331129, 'lyhuwe@mailinator.com', NULL, 'active', '0'),
(17, '2022-12-14 01:05:25', 10, '2022-12-15 10:10:17', 10, 'Jameson Cooper', 'Minima esse ex iure', 'Laudantium quisquam', 'Voluptatibus commodo', 'Minima', 1, 'vaxiwoquz@mailinator.com', 1359179662, 1994112162, 'Brock Burks', 1234392591, 'qirihywa@mailinator.com', NULL, 'active', '0'),
(18, '2022-12-14 02:34:26', 10, '2022-12-15 11:58:46', 10, 'Serina Alston', 'Natus rerum sit est', 'Maxime voluptatem et', 'Veritatis praesentiu', 'deleniti', 1, 'veputifywo@mailinator.com', 1613219303, 1591237557, 'Cameran Shaw', 1735589561, 'hiricy@mailinator.com', NULL, 'active', '0'),
(19, '2022-12-14 02:36:46', 10, NULL, NULL, 'Marsden Horton', 'Expedita praesentium', 'Exercitationem offic', 'Est exercitation er', 'Culpa', 1, 'caxigygomo@mailinator.com', 1155171539, 1538898982, 'Conan Meyer', 1234671517, 'riwoga@mailinator.com', NULL, 'active', '0'),
(20, '2022-12-14 02:39:41', 10, NULL, NULL, 'Aristotle May', 'Elit neque nihil om', 'Enim architecto pari', 'Quia perspiciatis n', 'Laboriosam', 2, 'lizu@mailinator.com', 1535737900, 1815306998, 'Plato Benjamin', 1929793191, 'zatemuki@mailinator.com', NULL, 'active', '0'),
(21, '2022-12-14 02:40:59', 10, NULL, NULL, 'Naida Willis', 'A enim dignissimos q', 'Magni ut voluptas no', 'Exercitationem accus', 'Aliquam', 1, 'dalekyv@mailinator.com', 1341214562, 1875598799, 'Vernon Burch', 1371568371, 'wicaluje@mailinator.com', NULL, 'active', '0'),
(22, '2022-12-14 02:46:13', 10, NULL, NULL, 'Janna Gates', 'Nam facere elit bea', 'Explicabo Dolorem i', 'Nesciunt labore des', 'Labore', 2, 'fexax@mailinator.com', 1159426691, 1575969977, 'Renee Guthrie', 1185896259, 'fexocag@mailinator.com', NULL, 'active', '0'),
(23, '2022-12-14 02:48:58', 10, NULL, NULL, 'Galvin Le', 'Mollitia debitis exp', 'Voluptas minima plac', 'Irure', 'Quia', 2, 'hibopariz@mailinator.com', 1166219743, 1264883588, 'Kevyn Austin', 1603956202, 'fubafa@mailinator.com', NULL, 'active', '0'),
(24, '2022-12-15 10:13:22', 10, NULL, NULL, 'Dominic Clark', 'Non quia eius non om', 'Magnam expedita quia', 'Eiusmod facere autem', 'Adipisicing', 2, 'duru@mailinator.com', 1913588748, 1588722530, 'Serina Joseph', 1902735174, 'xafog@mailinator.com', NULL, 'active', '0'),
(25, '2022-12-15 10:16:24', 10, NULL, NULL, 'Mikayla Shepard', 'Ut voluptate aliqua', 'Reiciendis dolor qui', 'Ipsa nihil sunt des', 'Vero', 2, 'gadyhexywe@mailinator.com', 1556651225, 1719288405, 'Madeson Gallegos', 1301191802, 'kidehe@mailinator.com', NULL, 'active', '0'),
(26, '2022-12-15 12:08:23', 10, NULL, NULL, 'Kiona Patel', 'Sunt in et quam offi', 'Odit nostrud magni l', 'Exercitation dolorem', 'Quas', 1, 'goma@mailinator.com', 1289673891, 1279635844, 'Kylan Stevenson', 1392914370, 'covi@mailinator.com', 'Laborum doloribus ut', 'active', '0');

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

--
-- Dumping data for table `tbl_projects`
--

INSERT INTO `tbl_projects` (`id`, `created`, `created_by`, `modified`, `modified_by`, `client`, `title`, `project_category`, `description`, `start_date`, `end_date`, `status`, `deleted`) VALUES
(1, '2022-12-13 02:29:29', 10, '2022-12-13 16:29:29', NULL, 2, 'Test Project', 1, NULL, '2022-12-13', '2022-12-06', 'active', '0');

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
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `master_clients`
--
ALTER TABLE `master_clients`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `master_client_types`
--
ALTER TABLE `master_client_types`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_projects`
--
ALTER TABLE `tbl_projects`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
-- Constraints for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD CONSTRAINT `role_const_rk` FOREIGN KEY (`role`) REFERENCES `tbl_roles` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
