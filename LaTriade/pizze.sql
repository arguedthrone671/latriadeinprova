-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Set 06, 2023 alle 11:34
-- Versione del server: 10.4.28-MariaDB
-- Versione PHP: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `latriade`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `pizze`
--

CREATE TABLE `pizze` (
  `id` int(15) NOT NULL,
  `title` varchar(255) NOT NULL,
  `ingredients` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `pizze`
--

INSERT INTO `pizze` (`id`, `title`, `ingredients`, `photo`) VALUES
(1, 'Margherita', 'Salsa di pomodoro e fior di latte', 'margherita.jpg'),
(2, 'Crostino', 'Mozzarella e prosciutto cotto DOP', 'margherita.jpg'),
(3, 'Boscaiola', 'Mozzarella, funghi  e salsiccia', 'boscaiola.jpg'),
(4, 'Special', 'Roba dello chef', 'special.jpg');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `pizze`
--
ALTER TABLE `pizze`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `pizze`
--
ALTER TABLE `pizze`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
