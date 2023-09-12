-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 11, 2023 at 09:07 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `iteac`
--

-- --------------------------------------------------------

--
-- Table structure for table `apptitute`
--

CREATE TABLE `apptitute` (
  `id` int(11) NOT NULL,
  `percentage` float DEFAULT NULL,
  `score` int(11) DEFAULT NULL,
  `rollno` varchar(50) DEFAULT NULL,
  `timetaken` varchar(50) DEFAULT NULL,
  `finished` varchar(10) DEFAULT NULL,
  `reloaded` varchar(100) DEFAULT NULL,
  `rank` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `apptitute`
--

INSERT INTO `apptitute` (`id`, `percentage`, `score`, `rollno`, `timetaken`, `finished`, `reloaded`, `rank`) VALUES
(1, 38.1, 8, '2021pecit220', '09 : 18', 'done', 'not done', 2),
(2, 42.86, 9, '2021pecit223', '08 : 48', 'done', 'not done', 1),
(3, 38.1, 8, '2021pecit221', '09 : 15', 'done', 'not done', 3),
(4, 14.29, 3, '2021pecit212', '09 : 36', 'done', 'not done', 6),
(5, 23.81, 5, '2021pecit111', '09 : 47', 'done', 'not done', 5),
(6, 38.1, 8, '2021pecit006', '09 : 25', 'done', 'not done', 4);

-- --------------------------------------------------------

--
-- Table structure for table `quiz`
--

CREATE TABLE `quiz` (
  `id` int(11) NOT NULL,
  `percentage` float DEFAULT NULL,
  `score` int(11) DEFAULT NULL,
  `rollno` varchar(50) DEFAULT NULL,
  `timetaken` varchar(50) DEFAULT NULL,
  `finished` varchar(10) DEFAULT NULL,
  `reloaded` varchar(100) DEFAULT NULL,
  `rank` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `quiz`
--

INSERT INTO `quiz` (`id`, `percentage`, `score`, `rollno`, `timetaken`, `finished`, `reloaded`, `rank`) VALUES
(1, 42.86, 9, '2021pecit220', '09 : 10', 'done', 'not done', 1),
(2, 33.33, 7, '2021pecit223', '09 : 21', 'done', 'not done', 2),
(3, 23.81, 5, '2021pecit221', '09 : 30', 'done', 'not done', 4),
(4, 0, 0, '2021pecit212', '09 : 58', 'done', 'done', 0),
(5, 14.29, 3, '2021pecit111', '09 : 43', 'done', 'not done', 5),
(6, 33.33, 7, '2021pecit006', '09 : 23', 'done', 'not done', 3);

-- --------------------------------------------------------

--
-- Table structure for table `ranktable`
--

CREATE TABLE `ranktable` (
  `rollno` varchar(100) DEFAULT NULL,
  `overall_score` decimal(10,2) DEFAULT NULL,
  `overall_percentage` decimal(5,2) DEFAULT NULL,
  `overall_time_taken` int(11) DEFAULT NULL,
  `overall_rank` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reasoning`
--

CREATE TABLE `reasoning` (
  `id` int(11) NOT NULL,
  `percentage` float DEFAULT NULL,
  `score` int(11) DEFAULT NULL,
  `rollno` varchar(50) DEFAULT NULL,
  `timetaken` varchar(50) DEFAULT NULL,
  `finished` varchar(10) DEFAULT NULL,
  `reloaded` varchar(100) DEFAULT NULL,
  `rank` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reasoning`
--

INSERT INTO `reasoning` (`id`, `percentage`, `score`, `rollno`, `timetaken`, `finished`, `reloaded`, `rank`) VALUES
(1, 42.86, 9, '2021pecit220', '08 : 35', 'done', 'not done', 2),
(2, 38.1, 8, '2021pecit223', '09 : 16', 'done', 'not done', 3),
(3, 61.9, 13, '2021pecit221', '07 : 38', 'done', 'not done', 1),
(4, 9.52, 2, '2021pecit212', '09 : 53', 'done', 'not done', 6),
(5, 19.05, 4, '2021pecit111', '09 : 42', 'done', 'not done', 5),
(6, 38.1, 8, '2021pecit006', '09 : 10', 'done', 'not done', 4);

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `rollno` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `accept` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`id`, `name`, `rollno`, `email`, `password`, `accept`) VALUES
(1, 'VINOTH S', '2021pecit223', '2021pecit223@gmail.com', '$2y$10$1bmjUXSJeeFBsKGPn8vIjO3qh25qxZbZh1yEWmX30QUU9VCEHjXYi', 'done'),
(2, 'subramaniyan', '2021pecit220', 'vinothg0618@gmail.com', '$2y$10$FNfOh2.A9CaYys5.X5Jn4ur.AT6jGP4Ao2pVKhjEqJqQvnO692Wvu', 'done'),
(3, 'SUJITHA P', '2021pecit221', 'sujithadhanalakshmi5@gmail.com', '$2y$10$w/pqdis5Ee0hb8Pfx6cfg.bjLhDrzFi6kBuq0u788bMwy95QzMUJe', 'done'),
(4, 'Vinoth', '2021pecit212', 'vinothg0618@gmail.com', '$2y$10$X804J0vJG7nBIU1fevIz3ObMp1Lj7YzeGZomiTdBKDYtYT9Hw6lSK', 'done'),
(5, 'subramaniyan', '2021pecit111', 'vinothg0618@gmail.com', '$2y$10$26xK9cP/xid8kiu8dZBIte.UB09kMnu2h8DlEHgJxJOAP0t2m2GkG', 'done'),
(6, 'Bharathi', '2021pecit006', 'vinothg0618@gmail.com', '$2y$10$FsZNydg1pVAxCaamYHWfzO3QosfDtqm3TQ.zs9UgSshl8Yk/svpha', 'done');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `apptitute`
--
ALTER TABLE `apptitute`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quiz`
--
ALTER TABLE `quiz`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reasoning`
--
ALTER TABLE `reasoning`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `apptitute`
--
ALTER TABLE `apptitute`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `quiz`
--
ALTER TABLE `quiz`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `reasoning`
--
ALTER TABLE `reasoning`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
