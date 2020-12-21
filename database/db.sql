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

CREATE DATABASE participate;
USE participate;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

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
