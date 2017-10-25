-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.1.21-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win32
-- HeidiSQL Version:             9.4.0.5174
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for bigrivers2017
CREATE DATABASE IF NOT EXISTS `bigrivers2017` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `bigrivers2017`;

-- Dumping structure for table bigrivers2017.news
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
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

-- Dumping data for table bigrivers2017.news: ~2 rows (approximately)
/*!40000 ALTER TABLE `news` DISABLE KEYS */;
INSERT INTO `news` (`id`, `title`, `slug`, `text`, `creator`, `creation_date`, `status`) VALUES
	(0, 'artikel1', 'artikel1', 'dit is een test artikel', 'test', '2017-10-25 09:31:50', 'actief'),
	(28, 'artikel2', 'artikel2', 'Some text dynamically set.', 'test2', '2017-10-25 09:32:16', 'actief');
/*!40000 ALTER TABLE `news` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
