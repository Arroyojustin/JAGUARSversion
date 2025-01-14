-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 14, 2025 at 04:05 AM
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
(46, 'Lebron', 'J', 'James', '', 16, 0.00, 0.00, 0.00, '0952355221', 'none', '2025-01-11 07:31:50', 'approved'),
(60, 'Albert', 'D', 'Alias', '', 16, 0.00, 0.00, 0.00, '09314141324', 'none', '2025-01-13 15:26:48', 'approved'),
(62, 'son', 'D', 'goku', '', 16, 0.00, 0.00, 0.00, '09778768755', 'none', '2025-01-14 00:17:16', 'approved'),
(65, 'Nahoya', 'T', 'Kawata', '', 16, 0.00, 0.00, 0.00, '0948872522', 'none', '2025-01-14 00:31:38', 'approved');

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

--
-- Dumping data for table `coaches`
--

INSERT INTO `coaches` (`id`, `name`, `gender`, `sports_id`, `qr_code`, `user_id`) VALUES
(1, 'bryan custodio', 'male', 16, NULL, 22),
(2, 'Lucas Pablo', 'male', 16, NULL, 23),
(3, 'Steve Kerr', 'male', 16, NULL, 26),
(4, 'Tania hernandez', 'female', 17, NULL, 29);

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
(37, 'MA Concepcion', '.', 'Arroyo', 'female', 17, 165.00, 55.00, 20.20, '0935252525252', 'Mataba', 'pending'),
(40, 'Stephen', 'W', 'Curry', 'male', 16, 0.00, 0.00, 0.00, '09369007677', 'wala lang', 'pending'),
(41, 'Kyrie', 'D', 'Irving', 'male', 19, 0.00, 0.00, 0.00, '0906837106', 'None', 'pending'),
(44, 'Justin', 'M', 'Arroyo', 'male', 16, 0.00, 0.00, 0.00, '09068377106', 'None', 'pending'),
(45, 'Bryan', 'g', 'Custodio', 'male', 16, 0.00, 0.00, 0.00, '09068377106', 'None', 'pending'),
(46, 'Lebron', 'J', 'James', 'male', 16, 0.00, 0.00, 0.00, '0952355221', 'none', 'pending'),
(47, 'Tom ', '&', 'Jerry', 'male', 16, 0.00, 0.00, 0.00, '09588732525', 'none', 'pending'),
(48, 'Aron Cyrus', 'D', 'Esteron', 'male', 17, 0.00, 0.00, 0.00, '098777625765', 'none', 'pending'),
(49, 'Jedan Voltaire', 'A', 'Esteron', 'male', 18, 0.00, 0.00, 0.00, '0944363637', 'none', 'pending'),
(50, 'Mark Dave', 'A', 'Antonio', 'male', 18, 0.00, 0.00, 0.00, '09651446321', 'none', 'pending'),
(51, 'Alan ', 'D', 'Walker', 'male', 19, 0.00, 0.00, 0.00, '0921435566', 'nonee', 'pending'),
(52, 'Welcome ', 'S', 'Back', 'male', 18, 0.00, 0.00, 0.00, '09435543654', 'None', 'pending'),
(53, 'pepsi ', 'V', 'paloma', 'female', 17, 0.00, 0.00, 0.00, '094353252', 'none', 'pending'),
(54, 'Iron', 'R', 'Man', 'male', 19, 0.00, 0.00, 0.00, '0945474776', 'patay na', 'pending'),
(55, 'Mountain', 'S', 'Dew', 'male', 18, 0.00, 0.00, 0.00, '09444444444', 'matamis', 'pending'),
(57, 'Wardell', 'C', 'Gomez', 'male', 16, 0.00, 0.00, 0.00, '0982342114132', 'None', 'pending'),
(58, 'Archie ', 'A', 'Nicer', 'male', 16, 0.00, 0.00, 0.00, '09887378623', 'none', 'pending'),
(59, 'Catrina', 'A', 'Lumor', 'female', 18, 0.00, 0.00, 0.00, '0938763876', 'None', 'pending'),
(60, 'Albert', 'D', 'Alias', 'male', 16, 0.00, 0.00, 0.00, '09314141324', 'none', 'pending'),
(61, 'Jenith ', 'A', 'Diniega', 'female', 17, 0.00, 0.00, 0.00, '092342545', 'none', 'pending'),
(62, 'son', 'D', 'goku', 'male', 16, 0.00, 0.00, 0.00, '09778768755', 'none', 'pending'),
(63, 'Hanamichi', 'S', 'Sakuragi', 'male', 16, 0.00, 0.00, 0.00, '098768232', 'none', 'pending'),
(64, 'Kaide', 'A', 'Rukawa', 'male', 16, 0.00, 0.00, 0.00, '09876557657', 'none', 'pending'),
(65, 'Nahoya', 'T', 'Kawata', 'male', 16, 0.00, 0.00, 0.00, '0948872522', 'none', 'pending');

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
(22, 'custodio', 'bryan', 'g', NULL, NULL, NULL, NULL, NULL, '0936907677', 'bryshiee@edu.ph', '$2y$10$65weft7stoBv.QS.g2X1BObiA6vAw8nWYwq0FOabGtODX/tTRTzTq', 'coach', 'male', NULL, NULL, 16),
(23, 'Pablo', 'Lucas', 'F', NULL, NULL, NULL, NULL, NULL, '0988888888', 'lucs@edu.ph', '$2y$10$Ig3AXiBsW1sgvah56by5oOTK1C2eqH/vd1m6fGM2fBVLd/BnSskEG', 'coach', 'male', NULL, NULL, 16),
(25, 'Esteron', 'Aron', 'D', NULL, NULL, NULL, NULL, NULL, '097264872622', 'aron@edu.ph', '$2y$10$I1mP8ux7UvH1drW0x4ZL1uiZPOdA5qP/9m7L6/hI7Nd1CmMybi0Se', 'coordinator', 'male', 'single', NULL, NULL),
(26, 'Kerr', 'Steve', 'S', NULL, NULL, NULL, NULL, NULL, '09422323233', 'gsw@edu.ph', '$2y$10$tUtrjvtw6GaZoM0..qZfU.A0W2I47pdBldq59w/ODKob2Qb1UBPTa', 'coach', 'male', NULL, NULL, 16),
(29, 'hernandez', 'Tania', 'A', NULL, NULL, NULL, NULL, NULL, '092323232323', 'taniii@edu.ph', '$2y$10$ghJdZAjoPAKAVsDd6C51feo2oEoF7Q9vNvdgFmGNkkWHnlQICfUz6', 'coach', 'female', NULL, NULL, 17),
(38, 'Curry', 'Stephen', NULL, '1-210134', NULL, NULL, NULL, NULL, NULL, '1-210134@edu.ph', '$2y$10$1ZfZLlwR8g/1/KN2ocsVJO0nljqNLbwgDXpTJsGp.3nQvBG0VQ8di', 'student', NULL, NULL, NULL, 16),
(39, 'Arroyo', 'MA Concepcion', NULL, '1-210136', NULL, NULL, NULL, NULL, NULL, '1-210136@edu.ph', '$2y$10$LYOWb.hhCHbffogD4A7sIejVrEDR.qYOHqNPTlD5t.vzQ5040iVYW', 'student', NULL, NULL, NULL, 17);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `coaches`
--
ALTER TABLE `coaches`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `requirements`
--
ALTER TABLE `requirements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `sports`
--
ALTER TABLE `sports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

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
