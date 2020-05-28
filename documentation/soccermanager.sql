-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 28, 2020 at 07:52 AM
-- Server version: 8.0.19
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `soccermanager`
--

-- --------------------------------------------------------

--
-- Table structure for table `player`
--

CREATE TABLE `player` (
  `plyr_guid` varchar(36) NOT NULL,
  `plyr_firstname` varchar(50) NOT NULL,
  `plyr_lastname` varchar(50) NOT NULL,
  `plyr_trikotnr` varchar(8) DEFAULT NULL,
  `plyr_birthdate` date DEFAULT NULL,
  `plyr_team_guid` varchar(36) NOT NULL,
  `plyr_pos_guid` varchar(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `player`
--

INSERT INTO `player` (`plyr_guid`, `plyr_firstname`, `plyr_lastname`, `plyr_trikotnr`, `plyr_birthdate`, `plyr_team_guid`, `plyr_pos_guid`) VALUES
('01db224d-9c10-11ea-bd25-50465de98e48', 'Robert', 'Lewandowski', '9', NULL, '1bbe8c38-9c16-11ea-bd25-50465de98e48', NULL),
('5E74E225-FF9A-4275-AB87-28EDFDF59481', 'c', 'c', NULL, NULL, '0534007c-9c16-11ea-bd25-50465de98e48', NULL),
('60148552-0933-4ED5-9894-3BE4DFD317DD', 'david', 'mair', '5', NULL, '1bbe8c38-9c16-11ea-bd25-50465de98e48', NULL),
('6E321BC4-CD6A-4DEA-B5D8-CEFFCB8A9825', 'a', 'a', NULL, NULL, '0534007c-9c16-11ea-bd25-50465de98e48', NULL),
('8a03f993-9b4d-11ea-9916-50465de98e48', 'Leo', 'Messi', '10', '1980-01-01', '1bbe8c38-9c16-11ea-bd25-50465de98e48', NULL),
('92974f29-9b5d-11ea-af95-50465de98e48', 'Cristiano', 'Ronaldo', '7', '1990-01-01', '0534007c-9c16-11ea-bd25-50465de98e48', NULL),
('9C00479A-F2B4-4430-AB0E-3EE1ABB23D22', 'b', 'b', NULL, NULL, '0534007c-9c16-11ea-bd25-50465de98e48', NULL),
('b47261ee-9b49-11ea-9916-50465de98e48', 'Daniel', 'Messner', '11', '1998-08-05', '0534007c-9c16-11ea-bd25-50465de98e48', NULL),
('BC06D5B1-1CE6-410E-AFD1-A7B3ED18E47C', 'd', 'd', NULL, NULL, '0534007c-9c16-11ea-bd25-50465de98e48', NULL),
('bd59ab3c-9b49-11ea-9916-50465de98e48', 'Manuel', 'Messner', '1', '1998-08-05', '0534007c-9c16-11ea-bd25-50465de98e48', NULL),
('E3C6299C-FE49-4C9A-8ED7-E3863830074F', 'Mohamed', 'Salah', '11', '1990-05-01', '0534007c-9c16-11ea-bd25-50465de98e48', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `position`
--

CREATE TABLE `position` (
  `pos_guid` varchar(36) NOT NULL,
  `pos_shortcut` varchar(4) NOT NULL,
  `pos_desc` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `position`
--

INSERT INTO `position` (`pos_guid`, `pos_shortcut`, `pos_desc`) VALUES
('893ad9d4-a0b7-11ea-b7f2-50465de98e48', 'GK', 'Goalkeeper'),
('893b05de-a0b7-11ea-b7f2-50465de98e48', 'RB', 'Right Back'),
('893b0772-a0b7-11ea-b7f2-50465de98e48', 'CB', 'Center Back'),
('893b085d-a0b7-11ea-b7f2-50465de98e48', 'LB', 'Left Back'),
('893b1d87-a0b7-11ea-b7f2-50465de98e48', 'RWB', 'Right Wing Back'),
('893b1fce-a0b7-11ea-b7f2-50465de98e48', 'LWB', 'Left Wing Back'),
('893b217d-a0b7-11ea-b7f2-50465de98e48', 'CDM', 'Center Defensive Midfielder'),
('893b2287-a0b7-11ea-b7f2-50465de98e48', 'CM', 'Center Midfielder'),
('893b234e-a0b7-11ea-b7f2-50465de98e48', 'CAM', 'Center Attacking Midfielder'),
('893b2481-a0b7-11ea-b7f2-50465de98e48', 'RM', 'Right Midfielder'),
('893b2551-a0b7-11ea-b7f2-50465de98e48', 'LM', 'Left Midfielder'),
('893b2608-a0b7-11ea-b7f2-50465de98e48', 'RW', 'Right Wing'),
('893b26ff-a0b7-11ea-b7f2-50465de98e48', 'LW', 'Left Wing'),
('893b27c4-a0b7-11ea-b7f2-50465de98e48', 'CF', 'Center Forward'),
('893b2876-a0b7-11ea-b7f2-50465de98e48', 'ST', 'Striker');

-- --------------------------------------------------------

--
-- Table structure for table `season`
--

CREATE TABLE `season` (
  `sea_guid` varchar(36) NOT NULL,
  `sea_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `season`
--

INSERT INTO `season` (`sea_guid`, `sea_name`) VALUES
('e0e09b89-9c15-11ea-bd25-50465de98e48', '2019/20');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `set_guid` varchar(36) NOT NULL,
  `set_team_guid` varchar(36) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`set_guid`, `set_team_guid`) VALUES
('7f4d1c3d-a0b4-11ea-b7f2-50465de98e48', '0534007c-9c16-11ea-bd25-50465de98e48');

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE `team` (
  `team_guid` varchar(36) NOT NULL,
  `team_name` varchar(100) NOT NULL,
  `team_sea_guid` varchar(36) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `team`
--

INSERT INTO `team` (`team_guid`, `team_name`, `team_sea_guid`) VALUES
('0534007c-9c16-11ea-bd25-50465de98e48', 'ASV Stegen', 'e0e09b89-9c15-11ea-bd25-50465de98e48'),
('1bbe8c38-9c16-11ea-bd25-50465de98e48', 'ASV Dietenheim Aufhofen', 'e0e09b89-9c15-11ea-bd25-50465de98e48');

-- --------------------------------------------------------

--
-- Table structure for table `trainings`
--

CREATE TABLE `trainings` (
  `train_guid` varchar(36) NOT NULL,
  `train_datetime` datetime NOT NULL,
  `train_desc` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `train_team_guid` varchar(36) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `trainings`
--

INSERT INTO `trainings` (`train_guid`, `train_datetime`, `train_desc`, `train_team_guid`) VALUES
('0b50bc43-9e6e-11ea-98fd-50465de98e48', '2020-06-15 19:00:00', 'Ausdauer', '0534007c-9c16-11ea-bd25-50465de98e48'),
('83a6606c-9cd5-11ea-895d-50465de98e48', '2020-05-30 19:00:00', 'Kraft', '0534007c-9c16-11ea-bd25-50465de98e48'),
('b42682a5-9e8c-11ea-98fd-50465de98e48', '2020-05-24 18:00:00', 'Montagtraining', '0534007c-9c16-11ea-bd25-50465de98e48'),
('ccac8c13-9cd2-11ea-895d-50465de98e48', '2020-05-30 18:00:00', 'Ausdauertraining', '1bbe8c38-9c16-11ea-bd25-50465de98e48');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `player`
--
ALTER TABLE `player`
  ADD PRIMARY KEY (`plyr_guid`),
  ADD KEY `plyr_pos_id` (`plyr_pos_guid`),
  ADD KEY `plyr_team_guid` (`plyr_team_guid`);

--
-- Indexes for table `position`
--
ALTER TABLE `position`
  ADD PRIMARY KEY (`pos_guid`);

--
-- Indexes for table `season`
--
ALTER TABLE `season`
  ADD PRIMARY KEY (`sea_guid`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`set_guid`),
  ADD KEY `set_team_guid` (`set_team_guid`);

--
-- Indexes for table `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`team_guid`),
  ADD KEY `team_sea_guid` (`team_sea_guid`);

--
-- Indexes for table `trainings`
--
ALTER TABLE `trainings`
  ADD PRIMARY KEY (`train_guid`),
  ADD KEY `train_team_guid` (`train_team_guid`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `player`
--
ALTER TABLE `player`
  ADD CONSTRAINT `player_ibfk_1` FOREIGN KEY (`plyr_pos_guid`) REFERENCES `position` (`pos_guid`) ON DELETE SET NULL ON UPDATE RESTRICT,
  ADD CONSTRAINT `player_ibfk_2` FOREIGN KEY (`plyr_team_guid`) REFERENCES `team` (`team_guid`) ON DELETE CASCADE ON UPDATE RESTRICT;

--
-- Constraints for table `team`
--
ALTER TABLE `team`
  ADD CONSTRAINT `team_ibfk_1` FOREIGN KEY (`team_sea_guid`) REFERENCES `season` (`sea_guid`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `trainings`
--
ALTER TABLE `trainings`
  ADD CONSTRAINT `trainings_ibfk_1` FOREIGN KEY (`train_team_guid`) REFERENCES `team` (`team_guid`) ON DELETE CASCADE ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
