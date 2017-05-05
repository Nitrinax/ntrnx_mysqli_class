- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server Version:               5.7.15-log - MySQL Community Server (GPL)
-- Server Betriebssystem:        Win64
-- HeidiSQL Version:             9.4.0.5130
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Exportiere Datenbank Struktur für ntrnx_mysqli
CREATE DATABASE IF NOT EXISTS `ntrnx_mysqli` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci */;
USE `ntrnx_mysqli`;

-- Exportiere Struktur von Tabelle ntrnx_mysqli.example
CREATE TABLE IF NOT EXISTS `example` (
  `account_id` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created` timestamp NOT NULL,
  `updated` timestamp NOT NULL,
  PRIMARY KEY (`account_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- Exportiere Daten aus Tabelle ntrnx_mysqli.example: ~4 rows (ungefähr)
/*!40000 ALTER TABLE `example` DISABLE KEYS */;
INSERT INTO `example` (`account_id`, `name`, `created`, `updated`) VALUES
	('16016', 'example', '2016-11-08 15:00:18', '2016-11-08 15:00:19');
/*!40000 ALTER TABLE `example` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;

CREATE USER 'ntrnx_mysqli'@'localhost' IDENTIFIED BY 'ntrnx_mysqli';
GRANT SELECT, INSERT, DELETE, UPDATE  ON `ntrnx\_mysqli`.* TO 'ntrnx_mysqli'@'localhost';
ALTER USER 'ntrnx_mysqli'@'localhost' REQUIRE SSL;
FLUSH PRIVILEGES;