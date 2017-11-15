-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 15 nov 2017 om 08:50
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
(1, 'br18.png', 401, 262),
(3, 'beer.png', 150, 150),
(2, 'header.png', 2238, 194),
(4, 'peanuts.png', 180, 180),
(5, 'polaroid.png', 375, 446),
(6, 'coaster.png', 300, 300),
(7, 'browntexture.jpg', 800, 600),
(8, 'ductape.png', 1626, 255),
(9, 'kraaltjes.png', 0, 0),
(10, 'bg.png', 0, 0),
(11, 'test.png', 0, 0);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `image_resize_log`
--

CREATE TABLE `image_resize_log` (
  `id` int(11) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `ip_adres_aanvrager` varchar(1024) NOT NULL,
  `orginal_filename` varchar(1024) NOT NULL,
  `orginal_KB` int(11) NOT NULL,
  `width` int(11) NOT NULL,
  `height` int(11) NOT NULL,
  `resize_necessary` int(11) NOT NULL COMMENT '0 is for not and 1 for yes',
  `cached_filename` varchar(1024) NOT NULL,
  `cached_KB` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `image_resize_log`
--

INSERT INTO `image_resize_log` (`id`, `datetime`, `ip_adres_aanvrager`, `orginal_filename`, `orginal_KB`, `width`, `height`, `resize_necessary`, `cached_filename`, `cached_KB`) VALUES
(1, '2017-10-10 10:02:22', '192.168.1.10', 'image1.png', 10, 640, 200, 0, 'image1.png', 10),
(2, '2017-10-10 10:02:33', '87.243.12.109', 'test.png', 100, 1024, 720, 1, 'test_cached.png', 25),
(3, '2017-10-10 11:21:59', '192.168.254.243', 'br15.jpg', 24, 200, 150, 0, 'br15.jpg', 24);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `image_sizes`
--

CREATE TABLE `image_sizes` (
  `id` int(11) NOT NULL,
  `image_id` int(11) NOT NULL,
  `size_id` int(11) NOT NULL,
  `file_path` varchar(1024) NOT NULL DEFAULT 'img/'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `image_sizes`
--

INSERT INTO `image_sizes` (`id`, `image_id`, `size_id`, `file_path`) VALUES
(1, 1, 1, 'img/br18.png'),
(3, 1, 1, 'img/beer.png'),
(2, 2, 2, 'img/header.png'),
(4, 1, 1, 'img/peanuts.png'),
(5, 1, 1, 'img/polaroid.png'),
(6, 3, 12, 'img/beer.png'),
(7, 4, 12, 'img/peanuts.png'),
(8, 1, 12, 'img/br18.png'),
(9, 5, 12, 'img/polaroid.png'),
(10, 1, 1, 'img/coaster.png'),
(11, 3, 275, 'img/beer.png'),
(12, 4, 275, 'img/peanuts.png'),
(13, 1, 275, 'img/br18.png'),
(14, 5, 275, 'img/polaroid.png'),
(15, 7, 275, 'img/browntexture.jpg'),
(16, 8, 275, 'img/ductape.png'),
(17, 9, 275, 'img/kraaltjes.png'),
(18, 2, 276, 'img/header.png'),
(19, 2, 277, 'img/header.png'),
(20, 10, 277, 'img/bg.png'),
(21, 6, 278, 'img/coaster.png'),
(22, 11, 278, 'img/test.png'),
(23, 1, 273, 'img/br18.png');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `title` varchar(300) NOT NULL,
  `slug` varchar(128) NOT NULL,
  `text` text NOT NULL,
  `creator` varchar(100) NOT NULL,
  `creation_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` enum('actief','nonactief') NOT NULL DEFAULT 'actief'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
-- Tabelstructuur voor tabel `sizes`
--

CREATE TABLE `sizes` (
  `id` int(11) NOT NULL,
  `name` varchar(1024) NOT NULL,
  `width` int(11) NOT NULL,
  `height` int(11) NOT NULL,
  `max_size` varchar(1024) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `sizes`
--

INSERT INTO `sizes` (`id`, `name`, `width`, `height`, `max_size`) VALUES
(1, 'thumb', 100, 100, ''),
(2, 'big', 1024, 720, ''),
(3, 'medium', 600, 200, ''),
(275, 'çustom', 200, 100, ''),
(274, 'çustom', 300, 150, ''),
(273, 'çustom', 200, 150, ''),
(276, 'çustom', 1080, 720, NULL),
(277, 'çustom', 1024, 700, NULL),
(278, 'çustom', 200, 200, NULL);

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
(2, 'justin125', 'Dropzone8', 'justin555@live.nl', 1, 0),
(3, 'testgebruiker', 'testgebruiker', 'testgebruiker@gmail.com', 3, 0),
(4, 'John124', 'John124', 'John@live.com', 3, 0),
(5, 'Test', 'Test', 'Test@Test.nl', 1, 0),
(6, 'Geen idee', 'test1', 'test1@test1.nl', 1, 0),
(7, 'test2', 'test2', 'test2@test2.co', 1, 0),
(8, 'Test', 'TEST', 'BR@bigrivers.nl', 1, 0);

-- --------------------------------------------------------

--
-- Stand-in structuur voor view `v_userrole`
-- (Zie onder voor de actuele view)
--
CREATE TABLE `v_userrole` (
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
-- Tabelstructuur voor tabel `widget`
--

CREATE TABLE `widget` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `image` int(11) DEFAULT NULL,
  `created` datetime DEFAULT CURRENT_TIMESTAMP,
  `modified` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `link` varchar(50) NOT NULL,
  `active` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `widget`
--

INSERT INTO `widget` (`id`, `title`, `image`, `created`, `modified`, `link`, `active`) VALUES
(1, 'Big Rivers 2017 was weer geweldig! ', 1, '2017-10-25 13:47:20', '2018-10-25 13:50:23', '', 1),
(2, 'Foto\'s 2017', 2, '2017-10-25 13:47:20', '2018-10-25 13:50:23', '', 1),
(3, 'Video\'s 2017', 2, '2017-10-25 13:47:20', '2018-10-25 13:50:23', '', 1),
(4, 'Big Rivers TV: Let\'s go green!', 2, '2017-10-25 13:47:20', '2018-10-25 13:50:23', '', 1),
(5, 'Algemene informatie en faq', 2, '2017-10-25 13:47:20', '2018-10-25 13:50:23', '', 1),
(6, 'Foto\'s big rivers 2017 indoor', 2, '2017-10-25 13:47:20', '2018-10-25 13:50:23', '', 1),
(7, 'Image_Carousel', 2, '2017-10-25 13:47:20', '2018-10-25 13:50:23', '', 1),
(8, 'Wall of fame', 2, '2017-10-25 13:47:20', '2018-10-25 13:50:23', '', 1),
(36, 'NEE', NULL, '2017-11-01 11:04:26', '2017-11-01 11:04:26', '', 0),
(35, 'JA', NULL, '2017-11-01 11:04:18', '2017-11-01 11:04:18', '', 1);

-- --------------------------------------------------------

--
-- Structuur voor de view `v_userrole`
--
DROP TABLE IF EXISTS `v_userrole`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_userrole`  AS  select `user`.`id` AS `id`,`user`.`username` AS `username`,`user`.`password` AS `password`,`user`.`email` AS `email`,`user`.`role_id` AS `role_id`,`user`.`status` AS `status`,`r`.`name` AS `name` from (`user` left join `roles` `r` on((`user`.`role_id` = `r`.`id`))) order by `user`.`id` ;

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `image_resize_log`
--
ALTER TABLE `image_resize_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `image_sizes`
--
ALTER TABLE `image_sizes`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `title` (`title`),
  ADD KEY `slug` (`slug`);

--
-- Indexen voor tabel `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `sizes`
--
ALTER TABLE `sizes`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `widget`
--
ALTER TABLE `widget`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT voor een tabel `image_resize_log`
--
ALTER TABLE `image_resize_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT voor een tabel `image_sizes`
--
ALTER TABLE `image_sizes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT voor een tabel `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT voor een tabel `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT voor een tabel `sizes`
--
ALTER TABLE `sizes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=279;
--
-- AUTO_INCREMENT voor een tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT voor een tabel `widget`
--
ALTER TABLE `widget`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
