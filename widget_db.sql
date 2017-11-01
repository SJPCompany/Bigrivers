-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server versie:                5.7.14 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Versie:              9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Structuur van  tabel bigrivers2017.widget wordt geschreven
CREATE TABLE IF NOT EXISTS `widget` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `image` int(11) DEFAULT NULL,
  `created` datetime DEFAULT CURRENT_TIMESTAMP,
  `modified` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `link` varchar(50) NOT NULL,
  `active` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;

-- Dumpen data van tabel bigrivers2017.widget: 10 rows
/*!40000 ALTER TABLE `widget` DISABLE KEYS */;
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
/*!40000 ALTER TABLE `widget` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
