-- phpMyAdmin SQL Dump
-- version 5.2.1deb3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 03, 2025 at 01:55 AM
-- Server version: 10.11.13-MariaDB-0ubuntu0.24.04.1
-- PHP Version: 8.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ITWS2110-Fall2025-siongd-Quiz2`
--

-- --------------------------------------------------------

--
-- Table structure for table `projectMembership`
--

CREATE TABLE `projectMembership` (
  `projectId` int(11) DEFAULT NULL,
  `memberId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `projectMembership`
--

INSERT INTO `projectMembership` (`projectId`, `memberId`) VALUES
(3, 1),
(3, 10),
(3, 4),
(3, 12),
(1, 1),
(1, 6),
(1, 10),
(1, 8),
(2, 11),
(2, 8),
(2, 3),
(2, 4),
(4, 5),
(4, 1),
(4, 2),
(4, 7);

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `projectId` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`projectId`, `name`, `description`) VALUES
(1, 'Panera project', 'Make new website for panera'),
(2, 'RPI Project', 'Very interesting project at RPI'),
(3, 'Project 1', 'Group project for NASA'),
(4, 'Dunkin Donuts project', 'Important Dunkin Donuts project');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userId` int(11) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `nickName` varchar(255) NOT NULL,
  `password_hash` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userId`, `firstName`, `lastName`, `nickName`, `password_hash`) VALUES
(1, 'Dana', 'Siong Sin', 'Dana', '$2y$10$q7C7yWhBCdZGfu1rkhi4feXovl4y57jRWYsSg0yS1er7Me7uBZA.y'),
(2, 'Elizabeth', 'Lottinger', 'Lizzie', '$2y$10$tp6McELqXPYejaAi8wS2xO0Yz9cfVmpoAAyW.f.OOOazs5Cvdo6gu'),
(3, 'Melany', 'Suditu', 'Mel', '$2y$10$q/DKDpB3sL6V4ncnP/D5aefumr2KiLFZpLXxIzRcSNFHA3AUT9z0y'),
(4, 'Ritika', 'Brahmadesam', 'Tika', '$2y$10$kXmzvcKTg.zj41i1lEzMSuB8SQ0zGy6P5pTof3/7lOfE5wUicioni'),
(5, 'Aysenur', 'Pamucku', 'Aysenur', '$2y$10$tUnRhhJQLhrJ9penqi43N.3UajBhsE.flubX9DjLZ1PuZAcJMsbxy'),
(6, 'Hazel', 'Yu', 'Hazel', '$2y$10$2ZXFR4Hnef8b17GQb22pEOBRk/gaW87caZmdvxT27yr4in4jFEUnu'),
(7, 'Grace', 'Fong', 'Grace', '$2y$10$TtdIAbiKaxLtfMb2duJRR.t.Q/2LwJNbsWIEk11ASmgFXO9NnVVU6'),
(8, 'Karly', 'Chan', 'Karly', '$2y$10$fZPYA3lrqCG3nXHHhk2Ea.TxuHjqBlkbZswYsAuB1y0lD.qaNjl1q'),
(9, 'Allison', 'Gorelik', 'Allison', '$2y$10$sCPClqlwGtdKGmLeNtCuaeYw66js7sHSE1NRfdPgICULIjmTv7RHO'),
(10, 'Karlina', 'Jiminez', 'Lina', '$2y$10$vLieZ2tnP0WFX80vGsHatuEeXq0prPLsO3yWPR3LP4d3TwHjuYK6i'),
(11, 'Hannah', 'Leung', 'Hannah', '$2y$10$Hvw6jh2WyCP5rFTFm08z3uPpOtu4ae1bGrtCO5DBgR3FpzOHwBp0e'),
(12, 'Viane', 'Matz', 'Viane', '$2y$10$IGO.r445yMIkGRhf.68Z8OdD2Tx6ch9p/vqF3fdQV7enUYgN6hJrm');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `projectMembership`
--
ALTER TABLE `projectMembership`
  ADD KEY `projectId` (`projectId`),
  ADD KEY `memberId` (`memberId`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`projectId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userId`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `projectMembership`
--
ALTER TABLE `projectMembership`
  ADD CONSTRAINT `projectMembership_ibfk_1` FOREIGN KEY (`projectId`) REFERENCES `projects` (`projectId`),
  ADD CONSTRAINT `projectMembership_ibfk_2` FOREIGN KEY (`memberId`) REFERENCES `users` (`userId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
