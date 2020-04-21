-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 27 Lis 2019, 22:47
-- Wersja serwera: 10.4.8-MariaDB
-- Wersja PHP: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `ksiegarnia`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `ksiegarnia`
--

CREATE TABLE `ksiegarnia` (
  `id` int(11) NOT NULL,
  `autor` varchar(50) COLLATE utf8_bin NOT NULL,
  `tytul` varchar(100) COLLATE utf8_bin NOT NULL,
  `cena` decimal(3,0) NOT NULL,
  `gatunek` varchar(15) COLLATE utf8_bin NOT NULL,
  `isbn` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Zrzut danych tabeli `ksiegarnia`
--

INSERT INTO `ksiegarnia` (`id`, `autor`, `tytul`, `cena`, `gatunek`, `isbn`) VALUES
(1, 'Anna Parkowska', 'Na szczycie', '23', 'komedia', 1125111188),
(2, 'Anna Parkowska', 'Czesc 2', '30', 'komedia', 111110000),
(3, 'Jozef Czajnik', 'W ogniu namietnosci', '10', 'przygodowy', 22222222),
(4, 'Antoni Pociag', 'Piekne czasy', '8', 'sensacja', 3333333);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `ksiegarnia`
--
ALTER TABLE `ksiegarnia`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `ksiegarnia`
--
ALTER TABLE `ksiegarnia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
