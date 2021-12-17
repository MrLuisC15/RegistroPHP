-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         10.4.22-MariaDB - mariadb.org binary distribution
-- SO del servidor:              Win64
-- HeidiSQL Versión:             11.3.0.6295
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Volcando estructura de base de datos para minijuegos
CREATE DATABASE IF NOT EXISTS `minijuegos` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `minijuegos`;

-- Volcando estructura para tabla minijuegos.juegos
CREATE TABLE IF NOT EXISTS `juegos` (
  `idJuego` tinyint(4) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(20) NOT NULL,
  `direccion` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`idJuego`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla minijuegos.juegos: ~5 rows (aproximadamente)
/*!40000 ALTER TABLE `juegos` DISABLE KEYS */;
INSERT INTO `juegos` (`idJuego`, `nombre`, `direccion`) VALUES
	(1, 'Mendeleiev', NULL),
	(2, 'Flashcards', NULL),
	(3, 'Reciclaje', NULL),
	(4, 'Múltiplos', NULL),
	(5, 'Liga Deportiva', NULL);
/*!40000 ALTER TABLE `juegos` ENABLE KEYS */;

-- Volcando estructura para tabla minijuegos.preferencias
CREATE TABLE IF NOT EXISTS `preferencias` (
  `idUsuario` tinyint(4) NOT NULL,
  `idJuego` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla minijuegos.preferencias: ~5 rows (aproximadamente)
/*!40000 ALTER TABLE `preferencias` DISABLE KEYS */;
INSERT INTO `preferencias` (`idUsuario`, `idJuego`) VALUES
	(1, 1),
	(1, 3),
	(1, 4),
	(4, 3),
	(4, 4);
/*!40000 ALTER TABLE `preferencias` ENABLE KEYS */;

-- Volcando estructura para tabla minijuegos.usuarios
CREATE TABLE IF NOT EXISTS `usuarios` (
  `idUsuario` tinyint(4) NOT NULL AUTO_INCREMENT,
  `correo` varchar(40) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `contrasena` varchar(40) NOT NULL,
  `tipo` char(1) DEFAULT 'U',
  PRIMARY KEY (`idUsuario`),
  UNIQUE KEY `correo` (`correo`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla minijuegos.usuarios: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` (`idUsuario`, `correo`, `nombre`, `contrasena`, `tipo`) VALUES
	(1, 'asda@asa.es', 'asdadas', 'asdadsad', 'U'),
	(2, 'Correo@correo.ge', 'Un nombre', 'asdadsa', 'U'),
	(4, 'Correo@correo.gee', 'asd', 'adfasda', 'U');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
