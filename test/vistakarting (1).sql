-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 23 jan 2024 om 09:42
-- Serverversie: 10.4.32-MariaDB
-- PHP-versie: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vistakarting`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `gebruiker`
--

CREATE TABLE `gebruiker` (
  `UserID` int(11) NOT NULL,
  `Voornaam` varchar(50) NOT NULL,
  `Achternaam` varchar(20) NOT NULL,
  `Tussenvoegsel` varchar(20) DEFAULT NULL,
  `Email` varchar(255) NOT NULL,
  `Wachtwoord` varchar(255) NOT NULL,
  `Rol` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `gebruiker`
--

INSERT INTO `gebruiker` (`UserID`, `Voornaam`, `Achternaam`, `Tussenvoegsel`, `Email`, `Wachtwoord`, `Rol`) VALUES
(42, 'Steve', 'Donk', 'van', 'test2@gmail.com', '', '0'),
(43, 'Steve', 'Donk', 'van', 'test3@gmail.com', '', '0'),
(44, 'Steve', 'Donk', 'van', 'test4@gmail.com', '', '0'),
(45, 'Steve', 'Donk', 'van', 'test5@gmail.com', '', '0'),
(46, 'Steve', 'Donk', 'van', 'test6@gmail.com', '', '0'),
(47, 'Steve', 'Donk', 'van', 'test7@gmail.com', '', '0'),
(48, 'Steve', 'Donk', 'van', 'test8@gmail.com', '', '0'),
(49, 'Steve', 'Donk', 'van', 'test9@gmail.com', '', '0'),
(51, 'Steve', 'Donk', 'van', 'test11@gmail.com', '', '0'),
(52, 'Steve', 'Donk', 'van', 'test12@gmail.com', '', '0'),
(53, 'Steve', 'Donk', 'van', 'test13@gmail.com', '', '0'),
(54, 'Steve', 'Donk', 'van', 'test14@gmail.com', '', '0'),
(55, 'Steve', 'Donk', 'van', 'test15@gmail.com', '', '0'),
(56, 'Steve', 'Donk', 'van', 'test16@gmail.com', '', '0'),
(57, 'Steve', 'Donk', 'van', 'test17@gmail.com', '', '0'),
(58, 'Steve', 'Donk', 'van', 'test18@gmail.com', '', '0'),
(59, 'Steve', 'Donk', 'van', 'test19@gmail.com', '', '0'),
(60, 'Steve', 'Donk', 'van', 'test20@gmail.com', '', '0'),
(61, 'Steve', 'Donk', 'van', 'test21@gmail.com', '', '0'),
(62, 'Steve', 'Donk', 'van', 'test22@gmail.com', '', '0'),
(63, 'Steve', 'Donk', 'van', 'test23@gmail.com', '', '0'),
(70, 'Steve', 'Donk', 'van', 'test1@gmail.com', '', '0'),
(71, 'Steve', 'Donk', 'van', 'test24@gmail.com', '', '0'),
(73, 'Steve', 'Donk', 'van', 'test10@gmail.com', '', '0');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `poule`
--

CREATE TABLE `poule` (
  `PouleID` int(11) NOT NULL,
  `Speler1` int(11) DEFAULT NULL,
  `Speler2` int(11) DEFAULT NULL,
  `Speler3` int(11) DEFAULT NULL,
  `Speler4` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `poule`
--

INSERT INTO `poule` (`PouleID`, `Speler1`, `Speler2`, `Speler3`, `Speler4`) VALUES
(1, 60, 45, 62, 57),
(2, 42, 49, 53, 56),
(3, 52, 73, 58, 59),
(4, 47, 46, 51, 44),
(5, 70, 55, 61, 63),
(6, 48, 71, 43, 54);

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
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT voor een tabel `poule`
--
ALTER TABLE `poule`
  MODIFY `PouleID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
