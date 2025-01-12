-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 12, 2025 at 07:32 AM
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
-- Database: `sports_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `approvals`
--

CREATE TABLE `approvals` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `middle_initial` char(1) DEFAULT NULL,
  `last_name` varchar(255) NOT NULL,
  `gender` enum('male','female') NOT NULL,
  `sport_id` int(11) NOT NULL,
  `height` decimal(5,2) NOT NULL,
  `weight` decimal(5,2) NOT NULL,
  `bmi` decimal(5,2) NOT NULL,
  `phone_number` varchar(15) NOT NULL,
  `health_protocol` text DEFAULT NULL,
  `approved_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` enum('approved','rejected') NOT NULL DEFAULT 'approved'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `approvals`
--

INSERT INTO `approvals` (`id`, `first_name`, `middle_initial`, `last_name`, `gender`, `sport_id`, `height`, `weight`, `bmi`, `phone_number`, `health_protocol`, `approved_at`, `status`) VALUES
(37, 'MA Concepcion', '.', 'Arroyo', '', 17, 165.00, 55.00, 20.20, '0935252525252', 'Mataba', '2025-01-10 05:47:52', 'approved'),
(40, 'Stephen', 'W', 'Curry', '', 16, 0.00, 0.00, 0.00, '09369007677', 'wala lang', '2025-01-10 01:08:41', 'approved'),
(41, 'Kyrie', 'D', 'Irving', '', 19, 0.00, 0.00, 0.00, '0906837106', 'None', '2025-01-10 00:31:36', 'approved'),
(44, 'Justin', 'M', 'Arroyo', '', 16, 0.00, 0.00, 0.00, '09068377106', 'None', '2025-01-10 05:47:32', 'approved'),
(45, 'Bryan', 'g', 'Custodio', '', 16, 0.00, 0.00, 0.00, '09068377106', 'None', '2025-01-11 03:24:28', 'approved'),
(46, 'Lebron', 'J', 'James', '', 16, 0.00, 0.00, 0.00, '0952355221', 'none', '2025-01-11 07:31:50', 'approved'),
(47, 'Tom ', '&', 'Jerry', '', 16, 0.00, 0.00, 0.00, '09588732525', 'none', '2025-01-11 07:31:54', 'approved'),
(48, 'Aron Cyrus', 'D', 'Esteron', '', 17, 0.00, 0.00, 0.00, '098777625765', 'none', '2025-01-11 08:24:02', 'approved'),
(49, 'Jedan Voltaire', 'A', 'Esteron', '', 18, 0.00, 0.00, 0.00, '0944363637', 'none', '2025-01-11 11:24:01', 'approved'),
(50, 'Mark Dave', 'A', 'Antonio', '', 18, 0.00, 0.00, 0.00, '09651446321', 'none', '2025-01-11 11:24:05', 'approved');

-- --------------------------------------------------------

--
-- Table structure for table `coaches`
--

CREATE TABLE `coaches` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `gender` enum('male','female','other') NOT NULL,
  `sports_id` int(11) NOT NULL,
  `qr_code` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `requirements`
--

CREATE TABLE `requirements` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `middle_initial` char(1) DEFAULT NULL,
  `last_name` varchar(255) NOT NULL,
  `gender` enum('male','female') NOT NULL,
  `sport_id` int(11) NOT NULL,
  `height` decimal(5,2) NOT NULL,
  `weight` decimal(5,2) NOT NULL,
  `bmi` decimal(5,2) NOT NULL,
  `phone_number` varchar(15) NOT NULL,
  `health_protocol` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `requirements`
--

INSERT INTO `requirements` (`id`, `first_name`, `middle_initial`, `last_name`, `gender`, `sport_id`, `height`, `weight`, `bmi`, `phone_number`, `health_protocol`) VALUES
(37, 'MA Concepcion', '.', 'Arroyo', 'female', 17, 165.00, 55.00, 20.20, '0935252525252', 'Mataba'),
(40, 'Stephen', 'W', 'Curry', 'male', 16, 0.00, 0.00, 0.00, '09369007677', 'wala lang'),
(41, 'Kyrie', 'D', 'Irving', 'male', 19, 0.00, 0.00, 0.00, '0906837106', 'None'),
(44, 'Justin', 'M', 'Arroyo', 'male', 16, 0.00, 0.00, 0.00, '09068377106', 'None'),
(45, 'Bryan', 'g', 'Custodio', 'male', 16, 0.00, 0.00, 0.00, '09068377106', 'None'),
(46, 'Lebron', 'J', 'James', 'male', 16, 0.00, 0.00, 0.00, '0952355221', 'none'),
(47, 'Tom ', '&', 'Jerry', 'male', 16, 0.00, 0.00, 0.00, '09588732525', 'none'),
(48, 'Aron Cyrus', 'D', 'Esteron', 'male', 17, 0.00, 0.00, 0.00, '098777625765', 'none'),
(49, 'Jedan Voltaire', 'A', 'Esteron', 'male', 18, 0.00, 0.00, 0.00, '0944363637', 'none'),
(50, 'Mark Dave', 'A', 'Antonio', 'male', 18, 0.00, 0.00, 0.00, '09651446321', 'none');

-- --------------------------------------------------------

--
-- Table structure for table `sports`
--

CREATE TABLE `sports` (
  `id` int(11) NOT NULL,
  `sport_name` varchar(255) NOT NULL,
  `positions` text NOT NULL,
  `logo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sports`
--

INSERT INTO `sports` (`id`, `sport_name`, `positions`, `logo`) VALUES
(16, 'Basketball', 'Point Guard, Shooting Guard, Small Forward, Power Forward, Center', 'Uploads/RAWR.png'),
(17, 'volleyball', 'Outside Hitter, Opposite, Setter, Middle Blocker, Libero, Defensive Specialist, Serving Specialist', 'Uploads/RAWR.png'),
(18, 'Mobile Legends', 'Marksman, Mage, Assassin, Fighter, Support, Tank', 'Uploads/Logo es.png'),
(19, 'Sepak Takraw', 'Tekong, Feeder, Server, Spiker', 'Uploads/compressed_sepak-takraw copy.png');

-- --------------------------------------------------------

--
-- Table structure for table `submitted`
--

CREATE TABLE `submitted` (
  `requirements_id` int(11) NOT NULL,
  `status` enum('pending','approved','rejected') DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `submitted`
--

INSERT INTO `submitted` (`requirements_id`, `status`) VALUES
(37, 'approved'),
(40, 'approved'),
(41, 'approved'),
(44, 'approved'),
(45, 'approved'),
(46, 'approved'),
(47, 'approved'),
(48, 'approved'),
(49, 'approved'),
(50, 'approved');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `middle_initial` char(1) DEFAULT NULL,
  `student_no` varchar(50) DEFAULT NULL,
  `weight` decimal(5,2) DEFAULT NULL,
  `height` decimal(5,2) DEFAULT NULL,
  `bmi` decimal(4,2) DEFAULT NULL,
  `bloodtype` enum('A','B','AB','O') DEFAULT NULL,
  `phone_no` varchar(15) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_type` enum('admin','coordinator','student','coach') NOT NULL DEFAULT 'student',
  `gender` enum('male','female','other') DEFAULT NULL,
  `civil_status` enum('single','married','divorced','widowed') DEFAULT NULL,
  `profile_photo` varchar(255) DEFAULT NULL,
  `sports_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `lastname`, `firstname`, `middle_initial`, `student_no`, `weight`, `height`, `bmi`, `bloodtype`, `phone_no`, `email`, `password`, `user_type`, `gender`, `civil_status`, `profile_photo`, `sports_id`) VALUES
(1, 'Lleve', 'Shelalin', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'admin@edu.ph', '$2y$10$2ey6fmYSA4xnxIPVp2qRG.Gqt1k1BdGNF7fvBR1835GpQfSSABtVq', 'admin', 'female', 'married', NULL, NULL),
(7, 'Perez', 'Jerome', '', NULL, NULL, NULL, NULL, NULL, '', 'coor@edu.ph', '$2y$10$zpyfExl.dISoTv65SkzIzOgQsxw/ON3YgLwjnwRB3osJcuhe3yE6u', 'coordinator', 'male', 'single', NULL, NULL),
(22, 'custodio', 'bryan', 'g', NULL, NULL, NULL, NULL, NULL, '0936907677', 'bryshiee@edu.ph', '$2y$10$65weft7stoBv.QS.g2X1BObiA6vAw8nWYwq0FOabGtODX/tTRTzTq', 'coach', 'male', NULL, NULL, 16),
(23, 'Pablo', 'Lucas', 'F', NULL, NULL, NULL, NULL, NULL, '0988888888', 'lucs@edu.ph', '$2y$10$Ig3AXiBsW1sgvah56by5oOTK1C2eqH/vd1m6fGM2fBVLd/BnSskEG', 'coach', 'male', NULL, NULL, 16),
(25, 'Esteron', 'Aron', 'D', NULL, NULL, NULL, NULL, NULL, '097264872622', 'aron@edu.ph', '$2y$10$I1mP8ux7UvH1drW0x4ZL1uiZPOdA5qP/9m7L6/hI7Nd1CmMybi0Se', 'coordinator', 'male', 'single', NULL, NULL),
(26, 'Kerr', 'Steve', 'S', NULL, NULL, NULL, NULL, NULL, '09422323233', 'gsw@edu.ph', '$2y$10$tUtrjvtw6GaZoM0..qZfU.A0W2I47pdBldq59w/ODKob2Qb1UBPTa', 'coach', 'male', NULL, NULL, 16);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `approvals`
--
ALTER TABLE `approvals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_approvals_sport_id` (`sport_id`);

--
-- Indexes for table `coaches`
--
ALTER TABLE `coaches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `requirements`
--
ALTER TABLE `requirements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sports`
--
ALTER TABLE `sports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `submitted`
--
ALTER TABLE `submitted`
  ADD PRIMARY KEY (`requirements_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_sports_id` (`sports_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `approvals`
--
ALTER TABLE `approvals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `coaches`
--
ALTER TABLE `coaches`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `requirements`
--
ALTER TABLE `requirements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `sports`
--
ALTER TABLE `sports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `submitted`
--
ALTER TABLE `submitted`
  MODIFY `requirements_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `approvals`
--
ALTER TABLE `approvals`
  ADD CONSTRAINT `approvals_ibfk_1` FOREIGN KEY (`id`) REFERENCES `submitted` (`requirements_id`),
  ADD CONSTRAINT `fk_approvals_sport_id` FOREIGN KEY (`sport_id`) REFERENCES `sports` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `submitted`
--
ALTER TABLE `submitted`
  ADD CONSTRAINT `fk_requirements_id` FOREIGN KEY (`requirements_id`) REFERENCES `requirements` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_sports` FOREIGN KEY (`sports_id`) REFERENCES `sports` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_sports_id` FOREIGN KEY (`sports_id`) REFERENCES `sports` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`sports_id`) REFERENCES `sports` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
