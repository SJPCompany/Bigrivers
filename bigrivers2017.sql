-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Machine: 127.0.0.1
-- Gegenereerd op: 14 nov 2017 om 11:05
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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Gegevens worden geëxporteerd voor tabel `image_resize_log`
--

INSERT INTO `image_resize_log` (`id`, `datetime`, `ip_adres_aanvrager`, `orginal_filename`, `orginal_KB`, `width`, `height`, `resize_necessary`, `cached_filename`, `cached_KB`) VALUES
(1, '2017-10-09 10:02:32', '192.168.1.10', 'image1.png', 10, 640, 200, 0, 'image1.png', 10),
(2, '2017-10-09 13:41:23', '87.243.12.109', 'test.png', 100, 1024, 720, 1, 'test_cached.png', 25);

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
  `status` enum('actief','inactief') NOT NULL DEFAULT 'actief',
  PRIMARY KEY (`id`),
  UNIQUE KEY `title` (`title`),
  KEY `slug` (`slug`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=48 ;

--
-- Gegevens worden geëxporteerd voor tabel `news`
--

INSERT INTO `news` (`id`, `title`, `slug`, `text`, `creator`, `creation_date`, `status`) VALUES
(29, 'test434324234', 'test434324234', 'Some text dynamically set.', 'admin', '2017-11-01 09:07:12', 'inactief'),
(30, 'adsasdsadasd', 'adsasdsadasd', 'Some text dynamically set.', 'admin', '2017-10-25 07:50:39', 'actief'),
(47, 'asdasdsadasdewqeqw', 'asdasdsadasdewqeqw', 'Some text dynamically set.', 'admin', '2017-11-01 09:12:24', 'inactief');

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Gegevens worden geëxporteerd voor tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `email`, `role_id`, `status`) VALUES
(1, 'admin', 'admin', 'localhost@admin.nl', 2, 0),
(2, 'pieter', 'pieter', 'justin555@live.nl', 1, 0),
(3, 'testgebruiker', 'testgebruiker', 'testgebruiker@gmail.com', 3, 0),
(4, 'test123', 'test123', 'test123@testmail.com', 1, 0);

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
  `title` varchar(50) DEFAULT NULL,
  `image` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `intern_URL` varchar(250) DEFAULT NULL,
  `extern_URL` varchar(250) DEFAULT NULL,
  `document_URL` varchar(250) DEFAULT NULL,
  `active` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Gegevens worden geëxporteerd voor tabel `widget`
--

INSERT INTO `widget` (`id`, `title`, `image`, `created`, `modified`, `intern_URL`, `extern_URL`, `document_URL`, `active`) VALUES
(1, 'Big Rivers 2017 was weer geweldig! ', 1, '2017-10-25 13:47:20', '2018-10-25 13:50:23', 'http://www.bigrivers.nl/Home/Events/17', 'https://indebuurt.nl/dordrecht/nieuws/big-rivers-2017-in-dordrecht-dit-is-het-programma~31150/', 'https://www.festivalinfo.nl/festival/23361/Big_Rivers_Festival/2017/', 1),
(2, 'Big Rivers 2017 was weer top!', 2, '2017-10-25 13:47:20', '2018-10-25 13:50:23', '', '', '', 1),
(3, 'Big Rivers 2017 was weer top!', 2, '2017-10-25 13:47:20', '2018-10-25 13:50:23', '', '', '', 1),
(4, 'Big Rivers 2017 was weer top!', 2, '2017-10-25 13:47:20', '2018-10-25 13:50:23', '', '', '', 1),
(5, 'Big Rivers 2017 was weer top!', 2, '2017-10-25 13:47:20', '2018-10-25 13:50:23', '', '', '', 0),
(6, 'Big Rivers 2017 was weer top!', 2, '2017-10-25 13:47:20', '2018-10-25 13:50:23', '', '', '', 1),
(7, 'Big Rivers 2017 was weer top!', 2, '2017-10-25 13:47:20', '2018-10-25 13:50:23', '', '', '', 1),
(8, 'Big Rivers 2017 was weer top!', 2, '2017-10-25 13:47:20', '2018-10-25 13:50:23', '', '', '', 1),
(9, 'Big Rivers 2017 was weer top!', 2, '2017-10-25 13:47:20', '2018-10-25 13:50:23', '', '', '', 1),
(10, 'Big Rivers 2017 was weer top!', 2, '2017-10-25 13:47:20', '2018-10-25 13:50:23', '', '', '', 1),
(11, 'Big Rivers 2017 was weer top!', 2, '2017-10-25 13:47:20', '2018-10-25 13:50:23', '', '', '', 1);

-- --------------------------------------------------------

--
-- Structuur voor de view `v_userrole`
--
DROP TABLE IF EXISTS `v_userrole`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_userrole` AS select `user`.`id` AS `id`,`user`.`username` AS `username`,`user`.`password` AS `password`,`user`.`email` AS `email`,`user`.`role_id` AS `role_id`,`user`.`status` AS `status`,`r`.`name` AS `name` from (`user` left join `roles` `r` on((`user`.`role_id` = `r`.`id`))) order by `user`.`id`;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
