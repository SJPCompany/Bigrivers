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

-- Dumping structure for table bigrivers2017.user
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role_id` int(11) NOT NULL,
  `status` int(11) NOT NULL COMMENT 'If the user has 1 he is blocked and 0 stands for active',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

-- Dumping data for table bigrivers2017.user: 4 rows
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`id`, `username`, `password`, `email`, `role_id`, `status`) VALUES
	(9, 'test2', '$2y$08$e0Y9g871nqrnwl.kb6Q5AOtjyIfipx/K4hBPLx2OqHzdIBjsfVlJK', 'test123@testmail.com', 1, 0),
	(10, 'test3', '$2y$08$x2xw5by05hGExE2m0iDgs.wj0FbbMoRP/cU5HUiEg.gUPJYrU7VgW', '213213@ewqe', 1, 0),
	(11, 'test', '$2y$08$CU0LDI2te3VImQw2DoaxneDj4x.43zkZ2qBqTSPPcKf365F456Je.', 'test123@testmail.com', 1, 0),
	(12, 'admin', '$2y$08$GWsVT1CsCfmDXksHY6JF6.09DaqWzcTJ5HY35t1BQZrScLjC5DFVS', 'admin@test', 1, 0);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
