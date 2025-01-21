-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 19, 2025 at 06:31 PM
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

--
-- Dumping data for table `coaches`
--

INSERT INTO `coaches` (`id`, `name`, `gender`, `sports_id`, `qr_code`, `user_id`) VALUES
(10, 'Lucas Pablo', 'male', 16, NULL, 77);

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
(19, 'Sepak Takraw', 'Tekong, Feeder, Server, Spiker', 'Uploads/compressed_sepak-takraw copy.png'),
(35, 'Karate', '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `training`
--

CREATE TABLE `training` (
  `TrainingID` int(11) NOT NULL,
  `Date` date NOT NULL,
  `Time` time NOT NULL,
  `Location` varchar(255) NOT NULL,
  `Status` enum('Approved','Rejected','Pending') NOT NULL,
  `created_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `training`
--

INSERT INTO `training` (`TrainingID`, `Date`, `Time`, `Location`, `Status`, `created_by`) VALUES
(1, '2025-01-22', '16:38:00', 'Golden City Club House', 'Pending', 0);

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
(56, 'Custodio', 'Bryan', 'G', '1-210136', 0.00, 0.00, 0.00, NULL, '09888888888', '1-210136@edu.ph', '$2y$10$kR0qcZU3cmmG0TVQ1ehrquy4C505Be1wdL0yG7gtRdR2Wxox3/huC', 'student', 'male', NULL, NULL, 16),
(57, 'Arroyo', 'Randy', 'B', '1-131413', 0.00, 0.00, 0.00, NULL, '0906837106', '1-210137@edu.ph', '$2y$10$Vm7M9rfUwJfxNsRWARuFdud1SbGuoAn4Cfxl/vYyXaL47.DOQ/wJu', 'student', 'male', NULL, NULL, 16),
(58, 'Graham', 'Lucas', 'G', '1-231414', 0.00, 0.00, 0.00, NULL, '09068377106', '1-210138@edu.ph', '$2y$10$TpnzzpRtPJ3BsS6O9mXsB.wjXnkvAXntImqgQVo5rorUvvzMWCto2', 'student', 'male', NULL, NULL, 16),
(59, 'sfsfas', 'uyiyuk', 'q', '1-234242', 0.00, 0.00, 0.00, NULL, '09361133235', '1-210139@edu.ph', '$2y$10$lRE8XYmlGKzK/g5JtWXF7.Tph6knDYMOVYCwXMHhX8hnH7w.GsXya', 'student', 'male', NULL, NULL, 16),
(60, 'timberlake', 'Justin', 'E', '1-23131', 0.00, 0.00, 0.00, NULL, '09068377106', '213123@edu.ph', '$2y$10$9IS7Rc.gUTEMgs/Tkchg0ueZ0lZVfCb6Qv6E3gG6KsSuVgHMds99C', 'student', 'male', NULL, NULL, 16),
(61, 'wefgaseaw', 'aefewfaewg', 'a', '1-231241', 0.00, 0.00, 0.00, NULL, '09068377106', '3e3qdrfw@edu.ph', '$2y$10$eu6UTjhHKgdo//9wAHiRxeQIiFGocPfCMIs7fQ514LT61iQuDuEOy', 'student', 'male', NULL, NULL, 17),
(62, 'Balauag', 'George', 'D', '1-231311', 0.00, 0.00, 0.00, NULL, '0987876612', 'swfwrr22@edu.ph', '$2y$10$H9MNfgd5kOlT/aJFxznUNe.YVJA48PxKsrLORqKn7wvt9BLerbBU2', 'student', 'male', NULL, NULL, 18),
(63, 'gers', 'nigga', 'r', '1-231412', 0.00, 0.00, 0.00, NULL, '09361133235', '2312314s@edu.ph', '$2y$10$lotXOXlprlZ0aoGynb7tSOWNPw.K2zPex8LaBF5jfWhkpJWdF9oSq', 'student', 'male', NULL, NULL, 19),
(64, 'Curry', 'Stephen', 'q', '1-214131', 0.00, 0.00, 0.00, NULL, '09361133235', 'qedqawq2e@edu.ph', '$2y$10$SBFyAGTBvY95gIDjeeldVOQgDgA9a3wTZxAAgkILIZfPVIv9Oy53G', 'student', 'male', NULL, NULL, 16),
(65, 'Curry', 'Stephen', 'q', '1-214131', 0.00, 0.00, 0.00, NULL, '09361133235', 'qedqawq2e@edu.ph', '$2y$10$UzPxSYqrujmH8a/JmZdUouPo0cu1JOZkQzFE5Z70.Wh8qmwQy4BHy', 'student', 'male', NULL, NULL, 16),
(66, 'jordan', 'michael ', 'E', '1-214131', 0.00, 0.00, 0.00, NULL, '0906837106', 'qedqawq2e@edu.ph', '$2y$10$CFYqyhATgjrIeyLrn6b7Tef7e7YLmke2DDcuhDLU6IjU4bIP0vZBO', 'student', 'male', NULL, NULL, 16),
(67, 'Esteron', 'jedan', 'A', '1-214131', 0.00, 0.00, 0.00, NULL, '0906837106', 'qedqawq2e@edu.ph', '$2y$10$HS4ypYx4ZiJc2HTFK2w5XuxxnautZTJTgJem6VWdDdo7M6.Kx0X8O', 'student', 'male', NULL, NULL, 16),
(68, 'Antonio', 'dave', 'A', '1-214131', 0.00, 0.00, 0.00, NULL, '09367957034', 'qedqawq2e@edu.ph', '$2y$10$ioxoQdXOdkexbpE4UFn98OdGzBVcx2cCa6/3Q3HMLgg9nPGeoQKYm', 'student', 'male', NULL, NULL, 16),
(70, 'Gojo', 'satoru', 'J', '1-214131', 0.00, 0.00, 0.00, NULL, '09369007677', 'qedqawq2e@edu.ph', '$2y$10$FJuIk2zinSxEQwfwttope.Eo58itwYpAIhpw5If3ZwnRD2uR6yxcG', 'student', 'male', NULL, NULL, 16),
(71, 'ka girl', 'lupaypay', 'b', '1-231445', 0.00, 0.00, 0.00, NULL, '0906837106', 'huehq8yygwub@edu.ph', '$2y$10$ehe4er13V5xTbh4VzpqSm.Hx3DXHlynGJjFz8e/I24QZoSzGG71cK', 'student', 'male', NULL, NULL, 18),
(77, 'Pablo', 'Lucas', 'M', NULL, NULL, NULL, NULL, NULL, '09367957034', 'Lucs@gmail.com', '$2y$10$vhTXkQuyBVH3CqhlpW1iSejq.G0mq7TQDarJEA4Ppa8Mw7Bpxas1u', 'coach', 'male', NULL, NULL, 16);

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
-- Indexes for table `training`
--
ALTER TABLE `training`
  ADD PRIMARY KEY (`TrainingID`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT for table `coaches`
--
ALTER TABLE `coaches`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `requirements`
--
ALTER TABLE `requirements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT for table `sports`
--
ALTER TABLE `sports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `training`
--
ALTER TABLE `training`
  MODIFY `TrainingID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

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
