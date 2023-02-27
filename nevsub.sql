-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 09. Feb 2023 um 17:53
-- Server-Version: 10.4.27-MariaDB
-- PHP-Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `nevsub`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `projekte`
--

CREATE TABLE `projekte` (
  `id` int(11) NOT NULL,
  `projektname` varchar(255) NOT NULL,
  `projektart` varchar(255) NOT NULL,
  `projektbeschreibung` text NOT NULL,
  `fertigstellung` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `projekte`
--

INSERT INTO `projekte` (`id`, `projektname`, `projektart`, `projektbeschreibung`, `fertigstellung`) VALUES
(1, 'SPIEKIETZ', 'Spielplatz', 'Sichere und geeignete Spielräume für Kinder, mit Klettergerüsten, Rutschen, Tischtennis- , Fußball- und Basketballplätzen.', '01.01.2024'),
(2, 'SCHOOL4ALL', 'Bildungsstätten', 'Erstellung von Bildungsstätten für Jugendliche, sowie Erwachsene in den Entwicklungsländern.', '01.06.2023'),
(3, 'BRUNAF', 'Brunnen', 'Errichtung von Brunnen in kleineren Dörfern oder Gemeinden der Entwicklungsländern.', '01.10.2023'),
(4, 'WAISENKIND', 'Häuser für Waisenkinder', 'Aufbau von Häusern für Waisenkinder. Diese werden dort betreut und ernährt. Sie sollen dort außerdem eine gute Bildung genießen können.', '01.03.2024'),
(5, 'NATUREWILD', 'Opfer der Naturkatastrophen', 'Die Spenden werden verwendet um den betroffen Opfern einer Naturkatastrophe genügend Lebensmittel, sowie pharmazeutische Produkte zur Verfügung zu stellen. Ebenso werden Klamotten von diesen Spenden bereitgestellt.', '01.04.2023');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `unterstuetzer`
--

CREATE TABLE `unterstuetzer` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `vorname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `unterstuetzer`
--

INSERT INTO `unterstuetzer` (`id`, `name`, `vorname`, `email`, `password`) VALUES
(5, 'Dettmann', 'Leonard', 'leonard.dettmann@gmail.com', '123456789');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `projekte`
--
ALTER TABLE `projekte`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `unterstuetzer`
--
ALTER TABLE `unterstuetzer`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `projekte`
--
ALTER TABLE `projekte`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT für Tabelle `unterstuetzer`
--
ALTER TABLE `unterstuetzer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
