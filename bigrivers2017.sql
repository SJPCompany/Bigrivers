-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Machine: 127.0.0.1
-- Gegenereerd op: 06 dec 2017 om 09:22
-- Serverversie: 5.6.17
-- PHP-versie: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Databank: `bigrivers2017`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `artists`
--

CREATE TABLE IF NOT EXISTS `artists` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) DEFAULT NULL,
  `description` text,
  `website` varchar(300) DEFAULT NULL,
  `youtube` varchar(300) DEFAULT NULL,
  `facebook` varchar(300) DEFAULT NULL,
  `twitter` varchar(300) DEFAULT NULL,
  `podia_id` int(11) DEFAULT NULL,
  `day` varchar(10) DEFAULT NULL,
  `start_performance` time(6) DEFAULT NULL,
  `end_performance` time(6) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Gegevens worden geëxporteerd voor tabel `artists`
--

INSERT INTO `artists` (`id`, `name`, `description`, `website`, `youtube`, `facebook`, `twitter`, `podia_id`, `day`, `start_performance`, `end_performance`) VALUES
(2, '1', '1', '1', '1', '1', '1', NULL, NULL, NULL, NULL),
(3, '4', '4', '4', '4', '4', '4', NULL, NULL, NULL, NULL),
(4, '4', '4', '4', '4', '4', '4', NULL, NULL, NULL, NULL),
(5, '10', '<p>54321</p>', '9', '8', '7', '6', NULL, 'friday', '20:00:00.000000', '22:00:00.000000');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `event`
--

CREATE TABLE IF NOT EXISTS `event` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `description` varchar(50) NOT NULL,
  `youtube` int(11) DEFAULT '0' COMMENT '1 = actief 0= niet actief',
  `facebook` int(11) DEFAULT '0' COMMENT '1 = actief 0= niet actief',
  `twitter` int(11) DEFAULT '0' COMMENT '1 = actief 0= niet actief',
  `starttime` datetime NOT NULL,
  `endtime` datetime NOT NULL,
  `creator` varchar(50) NOT NULL,
  `ticket` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL DEFAULT '0.00',
  `status` enum('actief','nonactief') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Gegevens worden geëxporteerd voor tabel `event`
--

INSERT INTO `event` (`id`, `name`, `description`, `youtube`, `facebook`, `twitter`, `starttime`, `endtime`, `creator`, `ticket`, `price`, `status`) VALUES
(2, '', '12', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '12', 1, '12.50', 'actief');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `images`
--

CREATE TABLE IF NOT EXISTS `images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(1024) NOT NULL,
  `orginal_width` int(11) NOT NULL,
  `orginal_height` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

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

CREATE TABLE IF NOT EXISTS `image_resize_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `ip_adres_aanvrager` varchar(1024) NOT NULL,
  `orginal_filename` varchar(1024) NOT NULL,
  `orginal_KB` int(11) NOT NULL,
  `width` int(11) NOT NULL,
  `height` int(11) NOT NULL,
  `resize_necessary` int(11) NOT NULL COMMENT '0 is for not and 1 for yes',
  `cached_filename` varchar(1024) NOT NULL,
  `cached_KB` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

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

CREATE TABLE IF NOT EXISTS `image_sizes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image_id` int(11) NOT NULL,
  `size_id` int(11) NOT NULL,
  `file_path` varchar(1024) NOT NULL DEFAULT 'img/',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

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
(23, 1, 273, 'img/br18.png'),
(24, 9, 279, 'img/cached/9-kraaltjes.png-100x380.png'),
(25, 2, 280, 'img/cached/2-header.png-2024x228.png'),
(26, 7, 281, 'img/cached/7-browntexture.jpg-700x560.jpg'),
(27, 8, 282, 'img/cached/8-ductape.png-400x288.png'),
(28, 5, 283, 'img/cached/5-polaroid.png-446x499.png'),
(29, 11, 284, 'img/cached/11-test.png-300x300.png'),
(30, 10, 285, 'img/cached/10-bg.png-1024x600.png');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(300) NOT NULL,
  `slug` varchar(128) NOT NULL,
  `text` text NOT NULL,
  `creator` varchar(100) NOT NULL,
  `creation_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` enum('actief','nonactief') NOT NULL DEFAULT 'actief',
  PRIMARY KEY (`id`),
  UNIQUE KEY `title` (`title`),
  KEY `slug` (`slug`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `podia`
--

CREATE TABLE IF NOT EXISTS `podia` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `podianame` varchar(100) NOT NULL,
  `street` varchar(150) NOT NULL,
  `housenumber` int(11) NOT NULL,
  `zip` varchar(8) NOT NULL,
  `city` varchar(100) NOT NULL,
  `status` enum('actief','nonactief') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(1024) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

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

CREATE TABLE IF NOT EXISTS `sizes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(1024) NOT NULL,
  `width` int(11) NOT NULL,
  `height` int(11) NOT NULL,
  `max_size` varchar(1024) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=286 ;

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
(278, 'çustom', 200, 200, NULL),
(279, 'custom', 100, 380, NULL),
(280, 'custom', 2024, 228, NULL),
(281, 'custom', 700, 560, NULL),
(282, 'custom', 400, 288, NULL),
(283, 'custom', 446, 499, NULL),
(284, 'custom', 300, 300, NULL),
(285, 'custom', 1024, 600, NULL);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role_id` int(11) NOT NULL,
  `status` int(11) NOT NULL COMMENT 'If the user has 1 he is blocked and 0 stands for active',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

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
(8, 'Test', 'TEST', 'BR@bigrivers.nl', 1, 0),
(9, 'test2', '$2y$08$e0Y9g871nqrnwl.kb6Q5AOtjyIfipx/K4hBPLx2OqHzdIBjsfVlJK', 'test123@testmail.com', 1, 0),
(10, 'test3', '$2y$08$x2xw5by05hGExE2m0iDgs.wj0FbbMoRP/cU5HUiEg.gUPJYrU7VgW', '213213@ewqe', 1, 0),
(11, 'test', '$2y$08$CU0LDI2te3VImQw2DoaxneDj4x.43zkZ2qBqTSPPcKf365F456Je.', 'test123@testmail.com', 1, 0),
(12, 'admin', '$2y$08$GWsVT1CsCfmDXksHY6JF6.09DaqWzcTJ5HY35t1BQZrScLjC5DFVS', 'admin@test', 1, 0);

-- --------------------------------------------------------

--
-- Stand-in structuur voor view `v_userrole`
--
CREATE TABLE IF NOT EXISTS `v_userrole` (
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

CREATE TABLE IF NOT EXISTS `widget` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `image` int(11) DEFAULT NULL,
  `created` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `modified` datetime DEFAULT NULL,
  `link` varchar(50) NOT NULL,
  `active` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=37 ;

--
-- Gegevens worden geëxporteerd voor tabel `widget`
--

INSERT INTO `widget` (`id`, `title`, `image`, `created`, `modified`, `link`, `active`) VALUES
(1, 'Big Rivers 2017 was weer geweldig! ', 1, '2017-12-05 10:30:14', '2018-10-25 13:50:23', 'http://localhost/bigrivers2017/application/uploads', 1),
(2, '1', 2, '2017-11-29 08:30:08', '2018-10-25 13:50:23', '1', 0),
(3, '1', 2, '2017-11-29 08:30:08', '2018-10-25 13:50:23', '1', 0),
(4, '1', 2, '2017-11-29 08:30:08', '2018-10-25 13:50:23', '1', 0),
(5, '1', 2, '2017-11-29 08:30:08', '2018-10-25 13:50:23', '1', 0),
(6, '1', 2, '2017-11-29 08:30:08', '2018-10-25 13:50:23', '1', 0),
(7, '1', 2, '2017-11-29 08:30:08', '2018-10-25 13:50:23', '1', 0),
(8, '1', 2, '2017-11-29 08:30:08', '2018-10-25 13:50:23', '1', 0),
(36, '1', NULL, '2017-11-29 08:30:08', '2017-11-01 11:04:26', '1', 0),
(35, '1', NULL, '2017-11-29 08:30:08', '2017-11-01 11:04:18', '1', 0);

-- --------------------------------------------------------

--
-- Structuur voor de view `v_userrole`
--
DROP TABLE IF EXISTS `v_userrole`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_userrole` AS select `user`.`id` AS `id`,`user`.`username` AS `username`,`user`.`password` AS `password`,`user`.`email` AS `email`,`user`.`role_id` AS `role_id`,`user`.`status` AS `status`,`r`.`name` AS `name` from (`user` left join `roles` `r` on((`user`.`role_id` = `r`.`id`))) order by `user`.`id`;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
