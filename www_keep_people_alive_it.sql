-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Giu 21, 2024 alle 17:20
-- Versione del server: 10.4.25-MariaDB
-- Versione PHP: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `www_keep_people_alive_it`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `amministrazione`
--

CREATE TABLE `amministrazione` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `mail_ricevute`
--

CREATE TABLE `mail_ricevute` (
  `id` int(10) UNSIGNED NOT NULL,
  `nome` varchar(255) NOT NULL,
  `cognome` varchar(255) NOT NULL,
  `indirizzo` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `messaggio` longtext NOT NULL,
  `stato_revisione` enum('visto','in elaborazione','scartato') NOT NULL,
  `id_utente` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `mail_ricevute`
--

INSERT INTO `mail_ricevute` (`id`, `nome`, `cognome`, `indirizzo`, `email`, `messaggio`, `stato_revisione`, `id_utente`) VALUES
(3, 'Pugliesi', 'Chapaguru', 'Via dei sassi 369/58', 'stage@nur.srl', 'Ciao questa e una mail di prova', 'visto', 0),
(4, 'Pugliesi', 'Chapaguru', 'Via dei sassi 369/58', 'stage@nur.srl', 'test', 'visto', 0);

-- --------------------------------------------------------

--
-- Struttura della tabella `newsletter`
--

CREATE TABLE `newsletter` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `stato` enum('Annulato','Abbonato') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `amministrazione`
--
ALTER TABLE `amministrazione`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `mail_ricevute`
--
ALTER TABLE `mail_ricevute`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_mail_ricevute` (`id_utente`);

--
-- Indici per le tabelle `newsletter`
--
ALTER TABLE `newsletter`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `amministrazione`
--
ALTER TABLE `amministrazione`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `mail_ricevute`
--
ALTER TABLE `mail_ricevute`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT per la tabella `newsletter`
--
ALTER TABLE `newsletter`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
