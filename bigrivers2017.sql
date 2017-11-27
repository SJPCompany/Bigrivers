-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 27 nov 2017 om 09:06
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
-- Tabelstructuur voor tabel `artists`
--

CREATE TABLE `artists` (
  `id` int(11) NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `description` text,
  `website` varchar(300) DEFAULT NULL,
  `youtube` varchar(300) DEFAULT NULL,
  `facebook` varchar(300) DEFAULT NULL,
  `twitter` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `artists`
--

INSERT INTO `artists` (`id`, `name`, `description`, `website`, `youtube`, `facebook`, `twitter`) VALUES
(4, '4', '4', '4', '4', '4', '4'),
(6, '9', '9', '9', '9', '9', '9'),
(7, '10', '0', '0', '00', '0', '0');

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
(9, 'kraaltjes.png', 88, 497),
(10, 'bg.png', 1374, 394),
(12, 'test.png', 800, 494),
(13, 'artisthover.png', 40, 40),
(14, 'profile_image.png', 640, 640);

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
(2, 3, 5, 'img/cached/3-beer.png-200x200.png'),
(3, 3, 6, 'img/cached/3-beer.png-400x400.png'),
(4, 3, 7, 'img/cached/3-beer.png-200x100.png'),
(5, 4, 7, 'img/cached/4-peanuts.png-200x100.png'),
(6, 1, 7, 'img/cached/1-br18.png-200x100.png'),
(7, 9, 8, 'img/cached/9-kraaltjes.png-100x380.png'),
(8, 7, 9, 'img/cached/7-browntexture.jpg-700x560.jpg'),
(9, 8, 10, 'img/cached/8-ductape.png-400x288.png'),
(10, 2, 11, 'img/cached/2-header.png-2024x228.png'),
(11, 10, 12, 'img/cached/10-bg.png-1024x700.png'),
(12, 6, 5, 'img/cached/6-coaster.png-200x200.png'),
(13, 3, 13, 'img/cached/3-beer.png-50x50.png'),
(14, 12, 14, 'img/cached/12-test.png-300x300.png'),
(15, 5, 15, 'img/cached/5-polaroid.png-446x499.png'),
(16, 14, 13, 'img/cached/14-profile_image.png-50x50.png'),
(17, 14, 16, 'img/cached/14-profile_image.png-150x150.png'),
(18, 10, 17, 'img/cached/10-bg.png-1024x600.png'),
(19, 10, 18, 'img/cached/10-bg.png-800x600.png'),
(20, 10, 19, 'img/cached/10-bg.png-800x400.png'),
(21, 10, 20, 'img/cached/10-bg.png-900x600.png'),
(22, 10, 21, 'img/cached/10-bg.png-1024x200.png'),
(23, 10, 22, 'img/cached/10-bg.png-1024x400.png');

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
-- Tabelstructuur voor tabel `podia`
--

CREATE TABLE `podia` (
  `id` int(11) NOT NULL,
  `podianame` varchar(100) NOT NULL,
  `street` varchar(150) NOT NULL,
  `housenumber` int(11) NOT NULL,
  `zip` varchar(8) NOT NULL,
  `city` varchar(100) NOT NULL,
  `status` enum('actief','nonactief') NOT NULL
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
(8, 'custom', 100, 380, NULL),
(7, 'custom', 200, 100, NULL),
(6, 'custom', 400, 400, NULL),
(5, 'custom', 200, 200, NULL),
(9, 'custom', 700, 560, NULL),
(10, 'custom', 400, 288, NULL),
(11, 'custom', 2024, 228, NULL),
(12, 'custom', 1024, 700, NULL),
(13, 'custom', 50, 50, NULL),
(14, 'custom', 300, 300, NULL),
(15, 'custom', 446, 499, NULL),
(16, 'custom', 150, 150, NULL),
(17, 'custom', 1024, 600, NULL),
(18, 'custom', 800, 600, NULL),
(19, 'custom', 800, 400, NULL),
(20, 'custom', 900, 600, NULL),
(21, 'custom', 1024, 200, NULL),
(22, 'custom', 1024, 400, NULL);

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
(9, 'test2', '$2y$08$e0Y9g871nqrnwl.kb6Q5AOtjyIfipx/K4hBPLx2OqHzdIBjsfVlJK', 'test123@testmail.com', 1, 0),
(10, 'test3', '$2y$08$x2xw5by05hGExE2m0iDgs.wj0FbbMoRP/cU5HUiEg.gUPJYrU7VgW', '213213@ewqe', 1, 0),
(11, 'test', '$2y$08$CU0LDI2te3VImQw2DoaxneDj4x.43zkZ2qBqTSPPcKf365F456Je.', 'test123@testmail.com', 1, 0),
(12, 'admin', '$2y$08$dTBFkh/8omoU2IPBYvE77.q3KQBgCHezZhX1xs3E61AT86bQh5iZO', 'admin@test', 1, 0);

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
  `title` varchar(50) DEFAULT NULL,
  `image` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `link` varchar(1024) NOT NULL,
  `active` int(11) DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `widget`
--

INSERT INTO `widget` (`id`, `title`, `image`, `created`, `modified`, `link`, `active`) VALUES
(1, 'Big Rivers 2017 was weer geweldig! ', 1, '2017-10-25 13:47:20', '2018-10-25 13:50:23', '', 1),
(2, 'Big Rivers 2017 was weer top!', 2, '2017-10-25 13:47:20', '2018-10-25 13:50:23', '', 1),
(3, 'Big Rivers 2017 was weer top!', 2, '2017-10-25 13:47:20', '2018-10-25 13:50:23', '', 1),
(4, 'Big Rivers 2017 was weer top!', 2, '2017-10-25 13:47:20', '2018-10-25 13:50:23', '', 1),
(5, 'Big Rivers 2017 was weer top!', 2, '2017-10-25 13:47:20', '2018-10-25 13:50:23', '', 0),
(6, 'Big Rivers 2017 was weer top!', 2, '2017-10-25 13:47:20', '2018-10-25 13:50:23', '', 1),
(7, 'Big Rivers 2017 was weer top!', 2, '2017-10-25 13:47:20', '2018-10-25 13:50:23', '', 1),
(8, 'Big Rivers 2017 was weer top!', 2, '2017-10-25 13:47:20', '2018-10-25 13:50:23', '', 1),
(9, 'Big Rivers 2017 was weer top!', 2, '2017-10-25 13:47:20', '2018-10-25 13:50:23', '', 1),
(10, 'Big Rivers 2017 was weer top!', 2, '2017-10-25 13:47:20', '2018-10-25 13:50:23', '', 1),
(11, 'Big Rivers 2017 was weer top!', 2, '2017-10-25 13:47:20', '2018-10-25 13:50:23', '', 1);

-- --------------------------------------------------------

--
-- Structuur voor de view `v_userrole`
--
DROP TABLE IF EXISTS `v_userrole`;

CREATE ALGORITHM=UNDEFINED DEFINER=`br17_user`@`localhost` SQL SECURITY DEFINER VIEW `v_userrole`  AS  select `user`.`id` AS `id`,`user`.`username` AS `username`,`user`.`password` AS `password`,`user`.`email` AS `email`,`user`.`role_id` AS `role_id`,`user`.`status` AS `status`,`r`.`name` AS `name` from (`user` left join `roles` `r` on((`user`.`role_id` = `r`.`id`))) order by `user`.`id` ;

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `artists`
--
ALTER TABLE `artists`
  ADD PRIMARY KEY (`id`);

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
-- Indexen voor tabel `podia`
--
ALTER TABLE `podia`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT voor een tabel `artists`
--
ALTER TABLE `artists`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT voor een tabel `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
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
-- AUTO_INCREMENT voor een tabel `podia`
--
ALTER TABLE `podia`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT voor een tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT voor een tabel `widget`
--
ALTER TABLE `widget`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
