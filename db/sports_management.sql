-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 09, 2025 at 02:00 AM
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
(27, 'Jedan', 'A', 'Esteron', 'male', 18, 167.00, 54.00, 19.36, '09888888888', 'None'),
(28, 'Sharlene ', 'S', 'Flaviano', 'female', 17, 155.00, 62.00, 25.81, '0906837106', 'pike'),
(29, 'Justin', 'M', 'Arroyo', 'male', 19, 167.00, 57.00, 20.44, '0936363263', 'Tumataba na'),
(33, 'Aron', 'D', 'Esteron', 'male', 17, 0.00, 0.00, 0.00, '0906837106', 'None'),
(35, 'Satoru', 'M', 'Gojo', 'male', 18, 0.00, 0.00, 0.00, '09367957034', 'hati katawan'),
(36, 'Randy', 'B', 'Arroyo', 'male', 16, 168.00, 59.00, 20.90, '09396765352', 'None'),
(37, 'MA Concepcion', '.', 'Arroyo', 'female', 17, 165.00, 55.00, 20.20, '0935252525252', 'Mataba'),
(38, 'Albert', 'D', 'Alias', 'male', 16, 0.00, 0.00, 0.00, '09367957034', 'None');

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
  `requirements_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `submitted`
--

INSERT INTO `submitted` (`requirements_id`) VALUES
(27),
(28),
(29),
(33),
(35),
(36);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `requirements`
--
ALTER TABLE `requirements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `sports`
--
ALTER TABLE `sports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `submitted`
--
ALTER TABLE `submitted`
  MODIFY `requirements_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Constraints for dumped tables
--

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
