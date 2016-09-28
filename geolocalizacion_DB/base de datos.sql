-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-07-2016 a las 22:11:31
-- Versión del servidor: 5.6.17
-- Versión de PHP: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `geolocalizacion`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `auto`
--

CREATE TABLE IF NOT EXISTS `auto` (
  `placa` varchar(7) NOT NULL,
  `codicono` int(11) NOT NULL,
  `color` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `marca` varchar(255) NOT NULL,
  PRIMARY KEY (`placa`),
  KEY `codicono` (`codicono`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `conduce`
--

CREATE TABLE IF NOT EXISTS `conduce` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `licencia` varchar(255) NOT NULL,
  `placa` varchar(7) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `licencia` (`licencia`),
  KEY `placa` (`placa`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `icono`
--

CREATE TABLE IF NOT EXISTS `icono` (
  `codicono` int(11) NOT NULL AUTO_INCREMENT,
  `desicono` varchar(255) NOT NULL,
  `imagen` varchar(255) NOT NULL,
  PRIMARY KEY (`codicono`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lugar`
--

CREATE TABLE IF NOT EXISTS `lugar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nomLugar` varchar(255) NOT NULL,
  `latitud` varchar(255) NOT NULL,
  `longitud` varchar(255) NOT NULL,
  `codLugar` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE IF NOT EXISTS `persona` (
  `licencia` varchar(9) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `apellido` varchar(255) NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `celular` varchar(9) NOT NULL,
  `email` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  PRIMARY KEY (`licencia`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`licencia`, `nombre`, `apellido`, `direccion`, `celular`, `email`, `foto`) VALUES
('H48611309', 'edson', 'lipa', 'arias araguez #809 mariano melgar', '48611309', 'edson@hotmail.com', '''yo.jpg'''),
('Q72468156', 'Victor', 'Lipa', '987654321', 'Selva Ale', 'victor@gmail.com', 'victor.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trakeo`
--

CREATE TABLE IF NOT EXISTS `trakeo` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `placa` varchar(7) NOT NULL,
  `codLugar` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `velocidad` varchar(255) NOT NULL,
  PRIMARY KEY (`codigo`),
  KEY `codLugar` (`codLugar`),
  KEY `placa` (`placa`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombres` varchar(255) NOT NULL,
  `usuario` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `tipo` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombres`, `usuario`, `password`, `tipo`) VALUES
(1, 'Victor Lipa', 'victor123', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'usuario estandar');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `auto`
--
ALTER TABLE `auto`
  ADD CONSTRAINT `auto_ibfk_1` FOREIGN KEY (`codicono`) REFERENCES `icono` (`codicono`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `conduce`
--
ALTER TABLE `conduce`
  ADD CONSTRAINT `conduce_ibfk_1` FOREIGN KEY (`licencia`) REFERENCES `persona` (`licencia`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `conduce_ibfk_2` FOREIGN KEY (`placa`) REFERENCES `auto` (`placa`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `trakeo`
--
ALTER TABLE `trakeo`
  ADD CONSTRAINT `trakeo_ibfk_1` FOREIGN KEY (`codLugar`) REFERENCES `lugar` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `trakeo_ibfk_2` FOREIGN KEY (`placa`) REFERENCES `auto` (`placa`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
