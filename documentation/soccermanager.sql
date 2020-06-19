-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 18. Jun 2020 um 16:39
-- Server-Version: 8.0.19
-- PHP-Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `soccermanager`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `matches`
--

CREATE TABLE `matches` (
  `match_guid` varchar(36) NOT NULL,
  `match_datetime` datetime NOT NULL,
  `match_team_guid` varchar(36) NOT NULL,
  `match_team_opponent` varchar(36) NOT NULL,
  `match_home_away` varchar(4) DEFAULT NULL,
  `match_team_score` int DEFAULT NULL,
  `match_opponent_score` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `player`
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
-- Tabellenstruktur für Tabelle `position`
--

CREATE TABLE `position` (
  `pos_guid` varchar(36) NOT NULL,
  `pos_shortcut` varchar(4) NOT NULL,
  `pos_desc` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Daten für Tabelle `position`
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
-- Tabellenstruktur für Tabelle `settings`
--

CREATE TABLE `settings` (
  `set_guid` varchar(36) NOT NULL,
  `set_team_guid` varchar(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


INSERT INTO `settings`(`set_guid`, `set_team_guid`) VALUES (uuid(),null);

--
-- Tabellenstruktur für Tabelle `team`
--

CREATE TABLE `team` (
  `team_guid` varchar(36) NOT NULL,
  `team_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


--
-- Tabellenstruktur für Tabelle `trainings`
--

CREATE TABLE `trainings` (
  `train_guid` varchar(36) NOT NULL,
  `train_datetime` datetime NOT NULL,
  `train_desc` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `train_team_guid` varchar(36) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `matches`
--
ALTER TABLE `matches`
  ADD PRIMARY KEY (`match_guid`),
  ADD KEY `match_team_guid` (`match_team_guid`);

--
-- Indizes für die Tabelle `player`
--
ALTER TABLE `player`
  ADD PRIMARY KEY (`plyr_guid`),
  ADD KEY `plyr_pos_id` (`plyr_pos_guid`),
  ADD KEY `plyr_team_guid` (`plyr_team_guid`);

--
-- Indizes für die Tabelle `position`
--
ALTER TABLE `position`
  ADD PRIMARY KEY (`pos_guid`);

--
-- Indizes für die Tabelle `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`set_guid`),
  ADD KEY `set_team_guid` (`set_team_guid`);

--
-- Indizes für die Tabelle `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`team_guid`);

--
-- Indizes für die Tabelle `trainings`
--
ALTER TABLE `trainings`
  ADD PRIMARY KEY (`train_guid`),
  ADD KEY `train_team_guid` (`train_team_guid`);

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `matches`
--
ALTER TABLE `matches`
  ADD CONSTRAINT `matches_ibfk_1` FOREIGN KEY (`match_team_guid`) REFERENCES `team` (`team_guid`) ON DELETE CASCADE ON UPDATE RESTRICT;

--
-- Constraints der Tabelle `player`
--
ALTER TABLE `player`
  ADD CONSTRAINT `player_ibfk_1` FOREIGN KEY (`plyr_pos_guid`) REFERENCES `position` (`pos_guid`) ON DELETE SET NULL ON UPDATE RESTRICT,
  ADD CONSTRAINT `player_ibfk_2` FOREIGN KEY (`plyr_team_guid`) REFERENCES `team` (`team_guid`) ON DELETE CASCADE ON UPDATE RESTRICT;

--
-- Constraints der Tabelle `trainings`
--
ALTER TABLE `trainings`
  ADD CONSTRAINT `trainings_ibfk_1` FOREIGN KEY (`train_team_guid`) REFERENCES `team` (`team_guid`) ON DELETE CASCADE ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
