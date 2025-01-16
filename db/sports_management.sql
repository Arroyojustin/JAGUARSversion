-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 16, 2025 at 03:22 AM
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
  `approved_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `coaches`
--

CREATE TABLE `coaches` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `gender` enum('male','female','other') NOT NULL,
  `sports_id` int(11) NOT NULL,
  `qr_code` varchar(255) DEFAULT NULL,
  `user_id` int(11) NOT NULL
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
  `health_protocol` text DEFAULT NULL,
  `status` enum('pending','approved','rejected') DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `requirements`
--

INSERT INTO `requirements` (`id`, `first_name`, `middle_initial`, `last_name`, `gender`, `sport_id`, `height`, `weight`, `bmi`, `phone_number`, `health_protocol`, `status`) VALUES
(80, 'George', 'D', 'Balauag', 'male', 18, 0.00, 0.00, 0.00, '0987876612', 'none', 'pending');

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
(55, 'Payos', 'John Paul ', 'R', '1-210134', 0.00, 0.00, 0.00, NULL, '09987876833', '1-210134@edu.ph', '$2y$10$8qmOXHqriaQ1CsNWHxlwwO5cYcmqVklHu6.ipbMZfDL8GCSwfDH9a', 'student', 'male', NULL, NULL, 16),
(56, 'Custodio', 'Bryan', 'G', '1-210136', 0.00, 0.00, 0.00, NULL, '09888888888', '1-210136@edu.ph', '$2y$10$kR0qcZU3cmmG0TVQ1ehrquy4C505Be1wdL0yG7gtRdR2Wxox3/huC', 'student', 'male', NULL, NULL, 16);

--
-- Triggers `users`
--
DELIMITER $$
CREATE TRIGGER `after_user_insert_coach` AFTER INSERT ON `users` FOR EACH ROW BEGIN
    IF NEW.user_type = 'coach' THEN
        INSERT INTO coaches (user_id, name, gender, sports_id) 
        VALUES (NEW.id, CONCAT(NEW.firstname, ' ', NEW.lastname), NEW.gender, NEW.sports_id);
    END IF;
END
$$
DELIMITER ;

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `coaches`
--
ALTER TABLE `coaches`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `requirements`
--
ALTER TABLE `requirements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `sports`
--
ALTER TABLE `sports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `approvals`
--
ALTER TABLE `approvals`
  ADD CONSTRAINT `fk_approvals_sport_id` FOREIGN KEY (`sport_id`) REFERENCES `sports` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `coaches`
--
ALTER TABLE `coaches`
  ADD CONSTRAINT `coaches_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

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
