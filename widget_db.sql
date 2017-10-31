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
  `title` varchar(50) DEFAULT NULL,
  `image` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

-- Dumpen data van tabel bigrivers2017.widget: 1 rows
/*!40000 ALTER TABLE `widget` DISABLE KEYS */;
INSERT INTO `widget` (`id`, `title`, `image`, `created`, `modified`) VALUES
	(1, 'Big Rivers 2017 was weer geweldig! ', 1, '2017-10-25 13:47:20', '2018-10-25 13:50:23'),
	(2, 'Big Rivers 2017 was weer top!', 2, '2017-10-25 13:47:20', '2018-10-25 13:50:23'),
	(3, 'Big Rivers 2017 was weer top!', 2, '2017-10-25 13:47:20', '2018-10-25 13:50:23'),
	(4, 'Big Rivers 2017 was weer top!', 2, '2017-10-25 13:47:20', '2018-10-25 13:50:23'),
	(5, 'Big Rivers 2017 was weer top!', 2, '2017-10-25 13:47:20', '2018-10-25 13:50:23'),
	(6, 'Big Rivers 2017 was weer top!', 2, '2017-10-25 13:47:20', '2018-10-25 13:50:23'),
	(7, 'Big Rivers 2017 was weer top!', 2, '2017-10-25 13:47:20', '2018-10-25 13:50:23'),
	(8, 'Big Rivers 2017 was weer top!', 2, '2017-10-25 13:47:20', '2018-10-25 13:50:23'),
	(9, 'Big Rivers 2017 was weer top!', 2, '2017-10-25 13:47:20', '2018-10-25 13:50:23'),
	(10, 'Big Rivers 2017 was weer top!', 2, '2017-10-25 13:47:20', '2018-10-25 13:50:23'),
	(11, 'Big Rivers 2017 was weer top!', 2, '2017-10-25 13:47:20', '2018-10-25 13:50:23'),
	(12, 'Big Rivers 2017 was weer top!', 2, '2017-10-25 13:47:20', '2018-10-25 13:50:23');
/*!40000 ALTER TABLE `widget` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
