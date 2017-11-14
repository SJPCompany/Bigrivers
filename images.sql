-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 14 nov 2017 om 11:48
-- Serverversie: 5.7.14
-- PHP-versie: 7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bigrivers2017`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `name` varchar(1024) NOT NULL,
  `orginal_width` int(11) NOT NULL,
  `orginal_height` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `images`
--

INSERT INTO `images` (`id`, `name`, `orginal_width`, `orginal_height`) VALUES
(1, 'br18.png', 0, 0),
(3, 'beer.png', 0, 0),
(2, 'header.png', 0, 0),
(4, 'peanuts.png', 0, 0),
(5, 'polaroid.png', 0, 0),
(6, 'coaster.png', 0, 0),
(7, 'browntexture.jpg', 0, 0),
(8, 'ductape.png', 0, 0),
(9, 'kraaltjes.png', 0, 0),
(10, 'bg.png', 0, 0),
(11, 'test.png', 0, 0);

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
