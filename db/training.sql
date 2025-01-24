-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 24, 2025 at 06:19 AM
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
-- Table structure for table `training`
--

CREATE TABLE `training` (
  `TrainingID` int(11) NOT NULL,
  `Date` date NOT NULL,
  `Time` time NOT NULL,
  `Title` varchar(255) NOT NULL,
  `Location` varchar(255) NOT NULL,
  `Status` enum('Approved','Rejected','Pending') NOT NULL,
  `created_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `training`
--

INSERT INTO `training` (`TrainingID`, `Date`, `Time`, `Title`, `Location`, `Status`, `created_by`) VALUES
(20, '2025-01-24', '08:00:00', 'Day 1', 'Golden City Club House', 'Pending', 77),
(21, '2025-01-27', '08:15:00', 'Day 2', 'sa bahay lng lolo', 'Pending', 77),
(22, '2025-01-25', '17:16:00', 'Day 4', 'Jan lng sa kabila', 'Pending', 77);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `training`
--
ALTER TABLE `training`
  ADD PRIMARY KEY (`TrainingID`),
  ADD KEY `fk_training_created_by` (`created_by`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `training`
--
ALTER TABLE `training`
  MODIFY `TrainingID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `training`
--
ALTER TABLE `training`
  ADD CONSTRAINT `fk_training_created_by` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
