-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 19. Dez 2020 um 13:47
-- Server-Version: 10.4.11-MariaDB
-- PHP-Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `participate`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `contributions`
--

CREATE TABLE `contributions` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `annotation` text DEFAULT NULL,
  `valoration` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `contributions`
--

INSERT INTO `contributions` (`id`, `student_id`, `annotation`, `valoration`, `created_at`, `updated_at`) VALUES
(3, 11, 'Very good comment', 4, '2020-07-01 08:30:06', '2020-07-01 08:30:06'),
(4, 11, 'Average', 8, '2020-07-01 08:32:19', '2020-07-01 08:32:19'),
(5, 5, 'Excellent', 10, '2020-07-01 08:32:19', '2020-07-01 08:32:19');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `students`
--

INSERT INTO `students` (`id`, `name`, `last_name`, `email`, `created_at`, `updated_at`) VALUES
(1, 'Juan', 'Henao', 'juanhenao10@gmail.com', '2020-06-30 09:40:46', '2020-06-30 09:40:57'),
(2, 'Josef', 'Carlos', 'jose@local.de', '2020-06-30 15:04:32', '2020-10-26 10:06:07'),
(3, 'Jose', 'Carlos', 'jose2@local.de', '2020-06-30 15:04:52', '2020-06-30 15:04:52'),
(4, 'Marco', 'Cruz', 'cruz@local.de', '2020-06-30 16:56:33', '2020-06-30 16:56:33'),
(5, 'David', 'Hernandez', 'herna@local.de', '2020-06-30 16:58:44', '2020-06-30 16:58:44'),
(6, 'Daniel', 'Lacotoure', 'lacouture@local.de', '2020-06-30 17:14:10', '2020-06-30 17:14:10'),

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `contributions`
--
ALTER TABLE `contributions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contributions_students_id_fk` (`student_id`);

--
-- Indizes für die Tabelle `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `students_email_uindex` (`email`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `contributions`
--
ALTER TABLE `contributions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT für Tabelle `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `contributions`
--
ALTER TABLE `contributions`
  ADD CONSTRAINT `contributions_students_id_fk` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
