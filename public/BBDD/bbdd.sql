-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         10.1.36-MariaDB - mariadb.org binary distribution
-- SO del servidor:              Win32
-- HeidiSQL Versión:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Volcando estructura de base de datos para virtualmarket
CREATE DATABASE IF NOT EXISTS `virtualmarket` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci */;
USE `virtualmarket`;

-- Volcando estructura para tabla virtualmarket.carro
CREATE TABLE IF NOT EXISTS `carro` (
  `idCarro` int(11) NOT NULL,
  `lineaCarro` int(11) NOT NULL,
  `dniCliente` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `idProducto` int(11) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  PRIMARY KEY (`idCarro`,`lineaCarro`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla virtualmarket.carro: ~53 rows (aproximadamente)
/*!40000 ALTER TABLE `carro` DISABLE KEYS */;
INSERT INTO `carro` (`idCarro`, `lineaCarro`, `dniCliente`, `idProducto`, `cantidad`) VALUES
	(1, 1, '', 1, 0),
	(1, 2, '', 2, 0),
	(2, 1, '', 1, 2),
	(2, 2, '', 4, 1),
	(2, 3, '', 9, 4),
	(3, 1, '', 2, 3),
	(3, 4, '', 1, 1),
	(4, 1, '', 4, 1),
	(5, 1, '', 3, 3),
	(5, 5, '', 1, 5),
	(8, 1, '', 1, 1),
	(8, 2, '', 1, 1),
	(8, 3, '', 1, 1),
	(8, 4, '', 1, 1),
	(8, 5, '', 1, 1),
	(8, 6, '', 1, 1),
	(8, 7, '', 1, 1),
	(8, 8, '', 1, 1),
	(8, 9, '', 1, 1),
	(8, 10, '', 1, 1),
	(8, 11, '', 1, 1),
	(8, 12, '', 1, 1),
	(8, 13, '', 1, 1),
	(8, 14, '', 1, 1),
	(8, 15, '', 1, 1),
	(8, 16, '', 1, 1),
	(8, 17, '', 1, 1),
	(8, 18, '', 1, 1),
	(8, 19, '', 1, 1),
	(8, 20, '', 1, 1),
	(8, 21, '', 1, 1),
	(9, 1, '', 1, 1),
	(9, 2, '', 1, 1),
	(10, 1, '', 1, 1),
	(10, 2, '', 1, 1),
	(11, 1, '', 1, 1),
	(11, 2, '', 1, 1),
	(11, 3, '', 1, 1),
	(12, 6, '', 3, 1),
	(12, 7, '', 3, 1),
	(12, 8, '', 1, 1),
	(13, 1, '', 4, 1),
	(14, 1, '', 4, 1),
	(15, 2, '', 4, 1),
	(15, 4, '', 4, 1),
	(15, 5, '', 4, 1),
	(16, 1, '', 3, 1),
	(16, 2, '', 3, 1),
	(17, 1, '', 1, 1),
	(17, 2, '', 1, 1),
	(19, 1, '', 1, 2),
	(20, 1, '', 1, 1),
	(20, 2, '', 1, 1);
/*!40000 ALTER TABLE `carro` ENABLE KEYS */;

-- Volcando estructura para tabla virtualmarket.clientes
CREATE TABLE IF NOT EXISTS `clientes` (
  `dniCliente` varchar(9) COLLATE utf8_unicode_ci NOT NULL,
  `admin` tinyblob NOT NULL,
  `nombre` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `direccion` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(75) COLLATE utf8_unicode_ci NOT NULL,
  `pwd` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`dniCliente`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla virtualmarket.clientes: ~8 rows (aproximadamente)
/*!40000 ALTER TABLE `clientes` DISABLE KEYS */;
INSERT INTO `clientes` (`dniCliente`, `admin`, `nombre`, `direccion`, `email`, `pwd`) VALUES
	('1111', _binary 0x30, 'Maky', 'conselleria', 'cliente@gmail.com', '$2y$10$F2uy/TgOAQV3W2T7DzJYVugoU2V7lQLErdGwwkgCFV7BLhZxg8RYq'),
	('11111111', _binary 0x31, 'antonios', 'C/ valeras 22', 'antonio@midominio.es', '2117'),
	('1234', _binary 0x31, 'Profesor', 'conselleria', 'conselleria@gmail.com', '$2y$10$16d9yM1/9QhwVPNr5etahuK./xRtPbY03wg6fOjsgY0LRxxloJwwa'),
	('12345678', _binary 0x30, 'isabel', 'C/ Virgen del Puerto 3', 'isabel@midominio.es', '777777'),
	('2117', _binary 0x31, 'Diego', 'maximiliano', 'dimoal@gmail.com', '$2y$10$/z0Qb6Tz11DkxakPRtyqRuLzU2h9NNi/i5hE0idX38LfRIPp6U0qu'),
	('22222222', _binary 0x30, 'maria', 'C/ Moreras 12', 'maria@midominio.es', '222222'),
	('44444444', _binary 0x30, 'marta', 'C/ Valeras 4', 'marta@midominio.es', '444444'),
	('55555555', _binary 0x30, 'juan', 'Plaza Miguel de Unamuno', 'juan@midominio.es', '555555');
/*!40000 ALTER TABLE `clientes` ENABLE KEYS */;

-- Volcando estructura para tabla virtualmarket.lineaspedidos
CREATE TABLE IF NOT EXISTS `lineaspedidos` (
  `idPedido` int(4) NOT NULL,
  `nlinea` int(2) NOT NULL,
  `idProducto` int(6) DEFAULT NULL,
  `cantidad` int(3) NOT NULL,
  PRIMARY KEY (`idPedido`,`nlinea`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla virtualmarket.lineaspedidos: ~7 rows (aproximadamente)
/*!40000 ALTER TABLE `lineaspedidos` DISABLE KEYS */;
INSERT INTO `lineaspedidos` (`idPedido`, `nlinea`, `idProducto`, `cantidad`) VALUES
	(1, 1, 3, 11),
	(2, 1, 4, 111),
	(2, 3, 1, 11),
	(3, 2, 3, 1),
	(3, 3, 4, 11),
	(4, 1, 4, 11),
	(4, 3, 6, 1);
/*!40000 ALTER TABLE `lineaspedidos` ENABLE KEYS */;

-- Volcando estructura para tabla virtualmarket.pedidos
CREATE TABLE IF NOT EXISTS `pedidos` (
  `idPedido` int(4) NOT NULL,
  `fecha` date NOT NULL,
  `dirEntrega` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `nTarjeta` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `matriculaRepartidor` varchar(8) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dniCliente` varchar(9) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`idPedido`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla virtualmarket.pedidos: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `pedidos` DISABLE KEYS */;
INSERT INTO `pedidos` (`idPedido`, `fecha`, `dirEntrega`, `nTarjeta`, `matriculaRepartidor`, `dniCliente`) VALUES
	(1, '2020-02-12', '222', '01111', '0111', '1111'),
	(2, '2020-02-12', 'sasd1111', '011', '0111', '12345678'),
	(3, '2020-02-12', 'sasd1111', '011', '011', '1111'),
	(4, '2020-02-06', 'sasd111', '0111222', '0111', '12345678');
/*!40000 ALTER TABLE `pedidos` ENABLE KEYS */;

-- Volcando estructura para tabla virtualmarket.productos
CREATE TABLE IF NOT EXISTS `productos` (
  `idProducto` int(6) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` varchar(20000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `foto` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `marca` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `categoria` enum('pantalon','zapatilla','camiseta') COLLATE utf8_unicode_ci DEFAULT NULL,
  `unidades` int(5) NOT NULL,
  `precio` int(4) DEFAULT NULL,
  PRIMARY KEY (`idProducto`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla virtualmarket.productos: ~7 rows (aproximadamente)
/*!40000 ALTER TABLE `productos` DISABLE KEYS */;
INSERT INTO `productos` (`idProducto`, `nombre`, `descripcion`, `foto`, `marca`, `categoria`, `unidades`, `precio`) VALUES
	(1, 'Columbia Sportswear', 'descricion 1', 'ColumbiaSportswear.jpg', 'Columbia', 'camiseta', 100, 80),
	(3, 'KK Signature Stripe Tee', NULL, 'KarlKani.jpg', 'Karl Kani', 'camiseta', 100, 35),
	(4, 'KK College Sweatpants', NULL, 'KKCollegeSweatpants.jpg', 'Karl Kani', 'pantalon', 100, 70),
	(5, 'KK Denim Baggy', NULL, 'KKDenimBaggy.jpg', 'Karl Kani', 'pantalon', 100, 80),
	(6, 'Box Logo', NULL, 'BoxLogo.jpg', 'Snipes', 'camiseta', 100, 20),
	(8, 'NSW Subset tee', NULL, 'NSWsubset.jpg', 'Nike', 'camiseta', 100, 40),
	(9, 'Basketballschuh Air Force 1', NULL, 'Basketballschuch.jpg', 'Nike', 'zapatilla', 100, 100);
/*!40000 ALTER TABLE `productos` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
