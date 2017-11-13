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

-- Dumping structure for table bigrivers2017.image_resize_log
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
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table bigrivers2017.image_resize_log: 2 rows
/*!40000 ALTER TABLE `image_resize_log` DISABLE KEYS */;
INSERT INTO `image_resize_log` (`id`, `datetime`, `ip_adres_aanvrager`, `orginal_filename`, `orginal_KB`, `width`, `height`, `resize_necessary`, `cached_filename`, `cached_KB`) VALUES
	(1, '2017-10-09 12:02:32', '192.168.1.10', 'image1.png', 10, 640, 200, 0, 'image1.png', 10),
	(2, '2017-10-09 15:41:23', '87.243.12.109', 'test.png', 100, 1024, 720, 1, 'test_cached.png', 25);
/*!40000 ALTER TABLE `image_resize_log` ENABLE KEYS */;

-- Dumping structure for table bigrivers2017.news
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
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=latin1;

-- Dumping data for table bigrivers2017.news: ~2 rows (approximately)
/*!40000 ALTER TABLE `news` DISABLE KEYS */;
INSERT INTO `news` (`id`, `title`, `slug`, `text`, `creator`, `creation_date`, `status`) VALUES
	(29, 'test434324234', 'test434324234', 'Some text dynamically set.', 'admin', '2017-11-01 10:07:12', 'inactief'),
	(30, 'adsasdsadasd', 'adsasdsadasd', 'Some text dynamically set.', 'admin', '2017-10-25 09:50:39', 'actief'),
	(47, 'asdasdsadasdewqeqw', 'asdasdsadasdewqeqw', 'Some text dynamically set.', 'admin', '2017-11-01 10:12:24', 'inactief');
/*!40000 ALTER TABLE `news` ENABLE KEYS */;

-- Dumping structure for table bigrivers2017.roles
CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(1024) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table bigrivers2017.roles: 3 rows
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` (`id`, `name`) VALUES
	(1, 'programmeur'),
	(2, 'beheerder'),
	(3, 'gebruiker');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;

-- Dumping structure for table bigrivers2017.user
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role_id` int(11) NOT NULL,
  `status` int(11) NOT NULL COMMENT 'If the user has 1 he is blocked and 0 stands for active',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Dumping data for table bigrivers2017.user: 4 rows
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`id`, `username`, `password`, `email`, `role_id`, `status`) VALUES
	(1, 'admin', 'admin', 'localhost@admin.nl', 2, 0),
	(2, 'pieter', 'pieter', 'justin555@live.nl', 1, 0),
	(3, 'testgebruiker', 'testgebruiker', 'testgebruiker@gmail.com', 3, 0),
	(4, 'test123', 'test123', 'test123@testmail.com', 1, 0);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

-- Dumping structure for view bigrivers2017.v_userrole
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `v_userrole` (
	`id` INT(11) NOT NULL,
	`username` VARCHAR(255) NOT NULL COLLATE 'latin1_swedish_ci',
	`password` VARCHAR(255) NOT NULL COLLATE 'latin1_swedish_ci',
	`email` VARCHAR(255) NOT NULL COLLATE 'latin1_swedish_ci',
	`role_id` INT(11) NOT NULL,
	`status` INT(11) NOT NULL COMMENT 'If the user has 1 he is blocked and 0 stands for active',
	`name` VARCHAR(1024) NULL COLLATE 'latin1_swedish_ci'
) ENGINE=MyISAM;

-- Dumping structure for table bigrivers2017.widget
CREATE TABLE IF NOT EXISTS `widget` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) DEFAULT NULL,
  `image` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `active` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

-- Dumping data for table bigrivers2017.widget: 12 rows
/*!40000 ALTER TABLE `widget` DISABLE KEYS */;
INSERT INTO `widget` (`id`, `title`, `image`, `created`, `modified`, `active`) VALUES
	(1, 'Big Rivers 2017 was weer geweldig! ', 1, '2017-10-25 13:47:20', '2018-10-25 13:50:23', 1),
	(2, 'Big Rivers 2017 was weer top!', 2, '2017-10-25 13:47:20', '2018-10-25 13:50:23', 1),
	(3, 'Big Rivers 2017 was weer top!', 2, '2017-10-25 13:47:20', '2018-10-25 13:50:23', 1),
	(4, 'Big Rivers 2017 was weer top!', 2, '2017-10-25 13:47:20', '2018-10-25 13:50:23', 1),
	(5, 'Big Rivers 2017 was weer top!', 2, '2017-10-25 13:47:20', '2018-10-25 13:50:23', 0),
	(6, 'Big Rivers 2017 was weer top!', 2, '2017-10-25 13:47:20', '2018-10-25 13:50:23', 1),
	(7, 'Big Rivers 2017 was weer top!', 2, '2017-10-25 13:47:20', '2018-10-25 13:50:23', 1),
	(8, 'Big Rivers 2017 was weer top!', 2, '2017-10-25 13:47:20', '2018-10-25 13:50:23', 1),
	(9, 'Big Rivers 2017 was weer top!', 2, '2017-10-25 13:47:20', '2018-10-25 13:50:23', 1),
	(10, 'Big Rivers 2017 was weer top!', 2, '2017-10-25 13:47:20', '2018-10-25 13:50:23', 1),
	(11, 'Big Rivers 2017 was weer top!', 2, '2017-10-25 13:47:20', '2018-10-25 13:50:23', 1),
	(12, 'Big Rivers 2017 was weer top!', 2, '2017-10-25 13:47:20', '2018-10-25 13:50:23', 1);
/*!40000 ALTER TABLE `widget` ENABLE KEYS */;

-- Dumping structure for view bigrivers2017.v_userrole
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `v_userrole`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_userrole` AS select `user`.`id` AS `id`,`user`.`username` AS `username`,`user`.`password` AS `password`,`user`.`email` AS `email`,`user`.`role_id` AS `role_id`,`user`.`status` AS `status`,`r`.`name` AS `name` from (`user` left join `roles` `r` on((`user`.`role_id` = `r`.`id`))) order by `user`.`id` ;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
