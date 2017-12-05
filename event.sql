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

-- Dumping structure for table bigrivers2017.event
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
  `ticket` int(11) DEFAULT '0',
  `price` decimal(10,2) DEFAULT '0.00',
  `status` enum('actief','nonactief') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table bigrivers2017.event: ~2 rows (approximately)
/*!40000 ALTER TABLE `event` DISABLE KEYS */;
INSERT INTO `event` (`id`, `name`, `description`, `youtube`, `facebook`, `twitter`, `starttime`, `endtime`, `creator`, `ticket`, `price`, `status`) VALUES
	(3, '12', '<p>12</p>', 1, 1, 1, '2017-12-22 12:12:00', '2017-12-22 12:12:00', 'admin', NULL, NULL, 'actief'),
	(5, '12', '<p>1</p>', NULL, NULL, NULL, '2017-12-02 22:02:00', '2017-12-30 22:21:00', 'admin', 1, NULL, 'actief'),
	(6, '112', '<p>1212</p>', NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'admin', NULL, 0.00, 'actief');
/*!40000 ALTER TABLE `event` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
