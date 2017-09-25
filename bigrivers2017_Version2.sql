-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 25 sep 2017 om 12:20
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
-- Tabelstructuur voor tabel `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `name` varchar(1024) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `roles`
--

INSERT INTO `roles` (`id`, `name`) VALUES
(1, 'programmeur'),
(2, 'beheerder'),
(3, 'gebruiker');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role_id` int(11) NOT NULL,
  `status` int(11) NOT NULL COMMENT 'If the user has 1 he is blocked and 0 stands for active'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `email`, `role_id`, `status`) VALUES
(1, 'admin', 'admin', 'localhost@admin.nl', 2, 0),
(2, 'justin125', 'Reken666', 'justin555@live.nl', 1, 0),
(3, 'testgebruiker', 'testgebruiker', 'testgebruiker@gmail.com', 3, 0);

-- --------------------------------------------------------

--
-- Stand-in structuur voor view `v_justinisirritant`
-- (Zie onder voor de actuele view)
--
CREATE TABLE `v_justinisirritant` (
`id` int(11)
,`username` varchar(255)
,`password` varchar(255)
,`email` varchar(255)
,`role_id` int(11)
,`status` int(11)
,`name` varchar(1024)
);

-- --------------------------------------------------------

--
-- Structuur voor de view `v_justinisirritant`
--
DROP TABLE IF EXISTS `v_justinisirritant`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_justinisirritant`  AS  select `user`.`id` AS `id`,`user`.`username` AS `username`,`user`.`password` AS `password`,`user`.`email` AS `email`,`user`.`role_id` AS `role_id`,`user`.`status` AS `status`,`r`.`name` AS `name` from (`user` left join `roles` `r` on((`user`.`role_id` = `r`.`id`))) order by `user`.`id` ;

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT voor een tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
