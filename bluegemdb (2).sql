-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 25-06-2018 a las 18:30:58
-- Versión del servidor: 5.7.19
-- Versión de PHP: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bluegemdb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carritotemp`
--

DROP TABLE IF EXISTS `carritotemp`;
CREATE TABLE IF NOT EXISTS `carritotemp` (
  `idcartemp` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_juego` varchar(50) NOT NULL,
  `precio` int(50) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `codigoventa` int(11) NOT NULL,
  PRIMARY KEY (`idcartemp`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `carritotemp`
--

INSERT INTO `carritotemp` (`idcartemp`, `nombre_juego`, `precio`, `id_cliente`, `codigoventa`) VALUES
(12, 'Dark Souls 3', 20000, 2, 13);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa`
--

DROP TABLE IF EXISTS `empresa`;
CREATE TABLE IF NOT EXISTS `empresa` (
  `idempresa` int(11) NOT NULL AUTO_INCREMENT,
  `des_emp` varchar(60) NOT NULL,
  PRIMARY KEY (`idempresa`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `empresa`
--

INSERT INTO `empresa` (`idempresa`, `des_emp`) VALUES
(1, 'From Software'),
(2, 'Bethesda'),
(3, 'Activision'),
(4, 'Square Enix'),
(6, 'Nintendo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `genero`
--

DROP TABLE IF EXISTS `genero`;
CREATE TABLE IF NOT EXISTS `genero` (
  `idgenero` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(50) NOT NULL,
  PRIMARY KEY (`idgenero`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `genero`
--

INSERT INTO `genero` (`idgenero`, `descripcion`) VALUES
(1, 'Accion'),
(2, 'RPG'),
(3, 'Guerra'),
(6, 'Deportes'),
(7, 'MMORPG');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `juego`
--

DROP TABLE IF EXISTS `juego`;
CREATE TABLE IF NOT EXISTS `juego` (
  `idjuego` int(11) NOT NULL AUTO_INCREMENT,
  `nombrejuego` varchar(60) NOT NULL,
  `precioNormal` int(11) NOT NULL,
  `precioInternet` int(11) NOT NULL,
  `idEmpresa` int(60) NOT NULL,
  `linkfoto` varchar(120) NOT NULL,
  `idgenero` int(11) NOT NULL,
  `idplataforma` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  PRIMARY KEY (`idjuego`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `juego`
--

INSERT INTO `juego` (`idjuego`, `nombrejuego`, `precioNormal`, `precioInternet`, `idEmpresa`, `linkfoto`, `idgenero`, `idplataforma`, `stock`) VALUES
(1, 'Bloodborne', 32990, 16000, 1, 'eLUJSfwWRpvcACX2.jpg', 1, 1, 5),
(9, 'Dark Souls Remastered', 32990, 32990, 1, 'YeyWrfAmg81j0owR.jpg', 1, 1, 5),
(10, 'Crash Bandicoot N Sane Triology', 20000, 16000, 3, 'isSt6YCd1hgKfmkz.png', 1, 1, 5),
(11, 'Dark Souls 3', 32990, 20000, 1, 'YvKxBsa5uL07QHiy.jpg', 1, 1, 5),
(12, 'The Legend Of Zelda - Breath Of The Wild', 32990, 20000, 1, '1ZIcpOGHrA3xnfJo.jpg', 1, 1, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `login`
--

DROP TABLE IF EXISTS `login`;
CREATE TABLE IF NOT EXISTS `login` (
  `idlogin` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `id_perfil` int(11) NOT NULL,
  PRIMARY KEY (`idlogin`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `login`
--

INSERT INTO `login` (`idlogin`, `user`, `pass`, `id_perfil`) VALUES
(1, 'Admin', 'Darkzero25', 1),
(2, 'Cliente', '123', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfil`
--

DROP TABLE IF EXISTS `perfil`;
CREATE TABLE IF NOT EXISTS `perfil` (
  `idperfil` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(50) NOT NULL,
  PRIMARY KEY (`idperfil`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `perfil`
--

INSERT INTO `perfil` (`idperfil`, `descripcion`) VALUES
(1, 'Admin'),
(2, 'Cliente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `plataforma`
--

DROP TABLE IF EXISTS `plataforma`;
CREATE TABLE IF NOT EXISTS `plataforma` (
  `idplataforma` int(11) NOT NULL AUTO_INCREMENT,
  `des_plat` varchar(50) NOT NULL,
  PRIMARY KEY (`idplataforma`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `plataforma`
--

INSERT INTO `plataforma` (`idplataforma`, `des_plat`) VALUES
(1, 'Playstation 4'),
(2, 'Xbox One'),
(4, 'Nintendo Switch'),
(5, 'PSP');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

DROP TABLE IF EXISTS `ventas`;
CREATE TABLE IF NOT EXISTS `ventas` (
  `idventas` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_producto` varchar(50) NOT NULL,
  `precio` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `codigoventa` int(11) NOT NULL,
  PRIMARY KEY (`idventas`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`idventas`, `nombre_producto`, `precio`, `id_cliente`, `codigoventa`) VALUES
(1, 'Dark Souls Remastered', 32990, 2, 1),
(2, 'Dark Souls 3', 20000, 2, 2),
(3, 'Crash Bandicoot N Sane Triology', 16000, 2, 2),
(4, 'The Legend Of Zelda - Breath Of The Wild', 20000, 2, 3),
(5, 'Dark Souls 3', 20000, 2, 4),
(6, 'Crash Bandicoot N Sane Triology', 16000, 2, 4),
(7, 'Dark Souls Remastered', 32990, 2, 5),
(8, 'Dark Souls 3', 20000, 2, 6),
(9, 'Dark Souls 3', 20000, 2, 7),
(10, 'Crash Bandicoot N Sane Triology', 16000, 2, 8),
(11, 'The Legend Of Zelda - Breath Of The Wild', 20000, 2, 9),
(12, 'The Legend Of Zelda - Breath Of The Wild', 20000, 2, 10),
(13, 'Dark Souls 3', 20000, 2, 11),
(14, 'The Legend Of Zelda - Breath Of The Wild', 20000, 2, 12);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
