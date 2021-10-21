-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.7.24 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             10.3.0.5771
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for demo
DROP DATABASE IF EXISTS `demo`;
CREATE DATABASE IF NOT EXISTS `demo` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `demo`;

-- Dumping structure for table demo.members
DROP TABLE IF EXISTS `members`;
CREATE TABLE IF NOT EXISTS `members` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) NOT NULL DEFAULT '0',
  `last_name` varchar(255) NOT NULL DEFAULT '0',
  `email` varchar(255) NOT NULL DEFAULT '0',
  `password` varchar(255) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Dumping data for table demo.members: ~5 rows (approximately)
/*!40000 ALTER TABLE `members` DISABLE KEYS */;
INSERT INTO `members` (`id`, `first_name`, `last_name`, `email`, `password`, `created_at`, `updated_at`) VALUES
	(2, 'muhammad', 'zayaan', 'zayaan@example.com', '$2y$04$t7Mp2Lxwxh3xpjkbI49pCu4269Wz8rhvDtFbbJJQ4.6V5SmUSYjeS', '2021-02-05 16:45:33', '2021-02-05 16:45:33'),
	(3, 'muhammad', 'zayaan', 'zayaan@example.com', '$2y$04$MiPuZJMuwzwEKxjqkMtF3O8ysIgeGx/ldo5CZMR/fqAn8zmNUo4U2', '2021-02-05 16:46:09', '2021-02-05 16:46:09'),
	(5, 'ahsan', 'zameer', 'ahsan@example.com', '$2y$04$AINjWMW4HWKPPErbSrQxyOyyfh8QkQSH3S4sEBE8nA5Qh0.cIS0Am', '2021-02-05 16:49:27', '2021-02-05 16:49:27'),
	(6, 'muhammad', 'ali', 'ali@example.com', '$2y$04$eHVKFNfLy6vtZg0HIt/dv.idTuLhkBGmLl.oK3lLxI6fKWb22TIYi', '2021-02-05 17:23:21', '2021-02-05 17:23:21');
/*!40000 ALTER TABLE `members` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
