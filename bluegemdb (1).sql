-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 15-06-2018 a las 20:34:58
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
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `juego`
--

INSERT INTO `juego` (`idjuego`, `nombrejuego`, `precioNormal`, `precioInternet`, `idEmpresa`, `linkfoto`, `idgenero`, `idplataforma`, `stock`) VALUES
(1, 'Bloodborne', 32990, 16000, 1, 'dHoCgDZYySA7Nvh4.jpg', 2, 1, 5),
(2, 'Dark Souls Remastered', 32990, 32990, 1, 'akSf8BgvYc1wsnmu.jpg', 2, 1, 5),
(3, 'Dark Souls 3', 32990, 32990, 1, 'AKsx2EWo6eiwJNQV.jpg', 2, 1, 5),
(4, 'Crash Bandicoot N Sane Triology', 28000, 20000, 3, '25YUZSbC89NIfdML.png', 1, 1, 5),
(5, 'The Legend Of Zelda - Breath Of The Wild', 39000, 35000, 4, 'z6JWFUYvPy81C79b.jpg', 2, 4, 5);

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
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `login`
--

INSERT INTO `login` (`idlogin`, `user`, `pass`, `id_perfil`) VALUES
(1, 'Admin', 'Darkzero25', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfil`
--

DROP TABLE IF EXISTS `perfil`;
CREATE TABLE IF NOT EXISTS `perfil` (
  `idperfil` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(50) NOT NULL,
  PRIMARY KEY (`idperfil`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `perfil`
--

INSERT INTO `perfil` (`idperfil`, `descripcion`) VALUES
(1, 'Admin');

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
