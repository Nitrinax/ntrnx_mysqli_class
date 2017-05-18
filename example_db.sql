-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server Version:               5.7.17-log - MySQL Community Server (GPL)
-- Server Betriebssystem:        Win64
-- HeidiSQL Version:             9.4.0.5170
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Exportiere Datenbank Struktur für ntrnx_mysqli_class_test
CREATE DATABASE IF NOT EXISTS `ntrnx_mysqli_class_test` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci */;
USE `ntrnx_mysqli_class_test`;

-- Exportiere Struktur von Tabelle ntrnx_mysqli_class_test.test
CREATE TABLE IF NOT EXISTS `test` (
  `name` char(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `salary` char(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `test` char(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `example` char(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Exportiere Daten aus Tabelle ntrnx_mysqli_class_test.test: ~8 rows (ungefähr)
/*!40000 ALTER TABLE `test` DISABLE KEYS */;
INSERT INTO `test` (`name`, `salary`, `test`, `example`) VALUES
	('master', 'obi', 'wan', 'kenobi'),
	('ben', 'kenobi', NULL, NULL),
	('master', 'eder', NULL, NULL),
	('master', 'of', 'desaster', NULL),
	('aaa', 'bbb', 'ccc', 'ddd'),
	('aaa', 'bbb', 'ccc', 'ddd'),
	('aaa', 'bbb', 'ccc', 'ddd');
/*!40000 ALTER TABLE `test` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
