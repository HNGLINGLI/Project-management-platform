-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 16, 2024 at 06:01 PM
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
-- Database: `project_tracking`
--

-- --------------------------------------------------------

--
-- Table structure for table `engineers`
--

CREATE TABLE `engineers` (
  `engineer_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `position` varchar(50) NOT NULL,
  `age` int(11) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `salary` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `engineers`
--

INSERT INTO `engineers` (`engineer_id`, `name`, `position`, `age`, `start_date`, `salary`) VALUES
(4, 'David', 'DevOps Engineer', 32, '2024-11-14', 82000.00),
(5, 'Eve', 'Frontend Developer', 27, '2023-01-19', 78000.00),
(6, 'Frank', 'Database Administrator', 42, '2018-09-30', 92000.00),
(7, 'Grace', 'Security Engineer', 37, '2020-02-15', 89000.00),
(8, 'Henry', 'Backend Developer', 30, '2021-08-23', 81000.00),
(9, 'Isabella', 'System Analyst', 34, '2022-04-05', 83000.00),
(10, 'Jack', 'Machine Learning Engineer', 31, '2019-10-10', 98000.00),
(48, 'test', 'test', 123, '2024-11-10', 123123.00),
(49, 'test1', 'test1', 13, '2024-11-10', 123.00),
(50, 'test2', 'test2', 15, '2024-11-12', 123.00),
(51, 'test3', 'test3', 18, '2024-11-20', 123.00);

-- --------------------------------------------------------

--
-- Table structure for table `meetings`
--

CREATE TABLE `meetings` (
  `meeting_id` int(11) NOT NULL,
  `customer_name` varchar(100) NOT NULL,
  `date` date DEFAULT NULL,
  `time` time DEFAULT NULL,
  `engineer_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `meetings`
--

INSERT INTO `meetings` (`meeting_id`, `customer_name`, `date`, `time`, `engineer_id`) VALUES
(1, 'test', '2024-11-15', '17:49:00', 7),
(2, 'test1', '2024-11-12', '17:49:00', 9),
(3, 'test', '2024-11-14', '19:49:00', 8),
(5, 'customer', '2024-11-19', '21:33:00', 6);

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `project_id` int(11) NOT NULL,
  `project_name` varchar(100) NOT NULL,
  `description` varchar(100) DEFAULT NULL,
  `phase` varchar(30) DEFAULT NULL,
  `status` varchar(30) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `deadline` date DEFAULT NULL,
  `notes` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`project_id`, `project_name`, `description`, `phase`, `status`, `start_date`, `deadline`, `notes`) VALUES
(2, 'RA1112', 'test1', 'In Progress', 'Minor adjustment needed', '2024-11-16', '2024-11-23', 'test');

-- --------------------------------------------------------

--
-- Table structure for table `project_engineers`
--

CREATE TABLE `project_engineers` (
  `project_id` int(11) NOT NULL,
  `engineer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `project_engineers`
--

INSERT INTO `project_engineers` (`project_id`, `engineer_id`) VALUES
(2, 5),
(2, 7);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `engineers`
--
ALTER TABLE `engineers`
  ADD PRIMARY KEY (`engineer_id`);

--
-- Indexes for table `meetings`
--
ALTER TABLE `meetings`
  ADD PRIMARY KEY (`meeting_id`),
  ADD KEY `engineer_id` (`engineer_id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`project_id`);

--
-- Indexes for table `project_engineers`
--
ALTER TABLE `project_engineers`
  ADD PRIMARY KEY (`project_id`,`engineer_id`),
  ADD KEY `engineer_id` (`engineer_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `engineers`
--
ALTER TABLE `engineers`
  MODIFY `engineer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `meetings`
--
ALTER TABLE `meetings`
  MODIFY `meeting_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `project_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `meetings`
--
ALTER TABLE `meetings`
  ADD CONSTRAINT `meetings_ibfk_1` FOREIGN KEY (`engineer_id`) REFERENCES `engineers` (`engineer_id`);

--
-- Constraints for table `project_engineers`
--
ALTER TABLE `project_engineers`
  ADD CONSTRAINT `project_engineers_ibfk_1` FOREIGN KEY (`project_id`) REFERENCES `projects` (`project_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `project_engineers_ibfk_2` FOREIGN KEY (`engineer_id`) REFERENCES `engineers` (`engineer_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
