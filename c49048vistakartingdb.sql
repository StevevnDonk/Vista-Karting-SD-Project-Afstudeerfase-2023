-- phpMyAdmin SQL Dump
-- version 4.4.15.10
-- https://www.phpmyadmin.net
--
-- Host: localhost
-- Gegenereerd op: 30 jan 2024 om 12:51
-- Serverversie: 8.0.36
-- PHP-versie: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `c49048vistakartingdb`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `gebruiker`
--

CREATE TABLE IF NOT EXISTS `gebruiker` (
  `UserID` int NOT NULL,
  `Voornaam` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `Achternaam` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `Tussenvoegsel` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `Wachtwoord` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `Rol` varchar(20) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=80 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `gebruiker`
--

INSERT INTO `gebruiker` (`UserID`, `Voornaam`, `Achternaam`, `Tussenvoegsel`, `Email`, `Wachtwoord`, `Rol`) VALUES
(0, 'Vista', 'Karting', NULL, 'vista-karting@gmail.com', 'f73469606ce56d1532604acfaae48abd102a89359fac5a39c7a6c953d07bbae98a7d25450c30f276dfa9098747bb308e11d613013523c3713097e1d3f6d23f2e', '1'),
(101, 'Ricky', 'Dupuits', '', 'rickyd.dupuits@gmail.com', '', '0'),
(102, 'Rickyy', 'Dupuits', '', 'rickyd.dupuitsadsaf@gmail.com', '', '0'),
(103, 'Test', 'Dupuits', '', 'rickyd.asdsad@gmail.com', '', '0'),
(104, 'Testen', 'dshhdhd', '', 'rickyasdasdd.dupuits@gmail.com', '', '0');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `poule`
--

CREATE TABLE IF NOT EXISTS `poule` (
  `PouleID` int NOT NULL,
  `Speler1` int DEFAULT NULL,
  `Speler2` int DEFAULT NULL,
  `Speler3` int DEFAULT NULL,
  `Speler4` int DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `poule`
--

INSERT INTO `poule` (`PouleID`, `Speler1`, `Speler2`, `Speler3`, `Speler4`) VALUES
(1, NULL, NULL, NULL, NULL),
(2, 102, NULL, NULL, NULL),
(3, NULL, NULL, 104, NULL),
(4, NULL, 103, NULL, NULL),
(5, NULL, NULL, 101, NULL),
(6, NULL, NULL, NULL, NULL);

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `gebruiker`
--
ALTER TABLE `gebruiker`
  ADD PRIMARY KEY (`UserID`);

--
-- Indexen voor tabel `poule`
--
ALTER TABLE `poule`
  ADD PRIMARY KEY (`PouleID`),
  ADD KEY `Speler1` (`Speler1`),
  ADD KEY `Speler2` (`Speler2`),
  ADD KEY `Speler3` (`Speler3`),
  ADD KEY `Speler4` (`Speler4`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `gebruiker`
--
ALTER TABLE `gebruiker`
  MODIFY `UserID` int NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=105;
--
-- AUTO_INCREMENT voor een tabel `poule`
--
ALTER TABLE `poule`
  MODIFY `PouleID` int NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `poule`
--
ALTER TABLE `poule`
  ADD CONSTRAINT `poule_ibfk_1` FOREIGN KEY (`Speler1`) REFERENCES `gebruiker` (`UserID`) ON DELETE SET NULL,
  ADD CONSTRAINT `poule_ibfk_2` FOREIGN KEY (`Speler2`) REFERENCES `gebruiker` (`UserID`) ON DELETE SET NULL,
  ADD CONSTRAINT `poule_ibfk_3` FOREIGN KEY (`Speler3`) REFERENCES `gebruiker` (`UserID`) ON DELETE SET NULL,
  ADD CONSTRAINT `poule_ibfk_4` FOREIGN KEY (`Speler4`) REFERENCES `gebruiker` (`UserID`) ON DELETE SET NULL;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
