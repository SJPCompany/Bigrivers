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

-- Structuur van  tabel bigrivers2017.images wordt geschreven
CREATE TABLE IF NOT EXISTS `images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(1024) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Dumpen data van tabel bigrivers2017.images: 6 rows
/*!40000 ALTER TABLE `images` DISABLE KEYS */;
INSERT INTO `images` (`id`, `name`) VALUES
	(1, 'br18.png'),
	(3, 'beer.png'),
	(2, 'header.png'),
	(4, 'peanuts.png'),
	(5, 'polaroid.png'),
	(6, 'coaster.png');
/*!40000 ALTER TABLE `images` ENABLE KEYS */;

-- Structuur van  tabel bigrivers2017.image_sizes wordt geschreven
CREATE TABLE IF NOT EXISTS `image_sizes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image_id` int(11) NOT NULL,
  `size_id` int(11) NOT NULL,
  `file_path` varchar(1024) NOT NULL DEFAULT 'img/',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- Dumpen data van tabel bigrivers2017.image_sizes: 10 rows
/*!40000 ALTER TABLE `image_sizes` DISABLE KEYS */;
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
	(10, 1, 1, 'img/coaster.png');
/*!40000 ALTER TABLE `image_sizes` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
