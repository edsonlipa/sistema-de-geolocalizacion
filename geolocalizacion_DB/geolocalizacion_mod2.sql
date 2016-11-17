-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 15-11-2016 a las 00:05:12
-- Versión del servidor: 5.5.24-log
-- Versión de PHP: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
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

--
-- Volcado de datos para la tabla `auto`
--

INSERT INTO `auto` (`placa`, `codicono`, `color`, `foto`, `marca`) VALUES
('asd', 1, 'asd', '/ficheros/undefined', 'asd'),
('HQ7-85P', 1, 'plata', 'nissan.jpg', 'Nissan'),
('kdj-asd', 1, 'verde', '/ficheros/undefined', 'Honda'),
('V6A-477', 1, 'plata', '''hola''', 'hyundai'),
('VGE-DD7', 1, 'verde', 'tu puedes todo.jpg', 'bmw');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `conduce`
--

INSERT INTO `conduce` (`id`, `licencia`, `placa`) VALUES
(1, 'H48611309', 'V6A-477');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `icono`
--

CREATE TABLE IF NOT EXISTS `icono` (
  `codicono` int(11) NOT NULL AUTO_INCREMENT,
  `desicono` varchar(255) NOT NULL,
  `imagen` varchar(255) NOT NULL,
  PRIMARY KEY (`codicono`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `icono`
--

INSERT INTO `icono` (`codicono`, `desicono`, `imagen`) VALUES
(1, 'este es el icono general si no agregar uno personalizado', '''icono.ico''');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `lugar`
--

INSERT INTO `lugar` (`id`, `nomLugar`, `latitud`, `longitud`, `codLugar`) VALUES
(1, 'Estación Goyeneche, Arequipa', '-16.4026179', '-71.529429', 'Estación Goyeneche, Arequipa'),
(2, 'Victor Lira 222, Arequipa', '-16.404865', '-71.532315', 'Victor Lira 222, Arequipa'),
(3, 'Calle Colón 203, Arequipa', '-16.3989892', '-71.5314871', 'Calle Colón 203, Arequipa');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE IF NOT EXISTS `persona` (
  `licencia` varchar(9) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `apellido` varchar(255) NOT NULL,
  `celular` varchar(9) NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  PRIMARY KEY (`licencia`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`licencia`, `nombre`, `apellido`, `celular`, `direccion`, `email`, `foto`) VALUES
('H48611309', 'edson', 'lipa', '943771077', 'Arias Aragues mariano melgar #809', 'edson@hotmail.com', 'yo.jpg'),
('H9456213', 'juan', 'perez', '856547423', 'av. puno', 'juan@hotmail.com', '731.jpg'),
('Q6543239', 'Dens', 'Li', '987654321', 'Selva Alegre #500', 'de@gmail.com', 'victor.jpg'),
('Q72468156', 'Victor', 'Lipa', '987654321', 'Selva Ale', 'victor@gmail.com', 'victor.jpg'),
('Q72548996', 'Milagros', 'Valdivia', '985632145', 'Cerro colorado', 'mili@gmail.com', 'tu puedes todo.jpg'),
('Q85741132', 'ruth', 'huillca', '654654654', 'Cerro col', 'ruht@gmail.com', 'ruth.jpg'),
('q98653214', 'gaby', 'rojas castro', '943652148', 'por ahi', 'gaby.co@gmail.com', 'tu puedes todo.jpg'),
('Q98785412', 'rosa', 'lipa', '94652315', 'en mi cas', 'rosa@gmail.com', '3ER.PUESTO PAISAJE IMPRESIONISTA_VERGARAY HUISA_MARCO ANTONIO_AREQUIPA.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `propietario`
--

CREATE TABLE IF NOT EXISTS `propietario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `licencia` varchar(255) NOT NULL,
  `placa` varchar(7) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `licencia` (`licencia`),
  KEY `placa` (`placa`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `propietario`
--

INSERT INTO `propietario` (`id`, `licencia`, `placa`) VALUES
(1, 'H48611309', 'V6A-477');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `trakeo`
--

INSERT INTO `trakeo` (`codigo`, `placa`, `codLugar`, `fecha`, `hora`, `velocidad`) VALUES
(1, 'V6A-477', 1, '2016-07-22', '10:00:00', '15'),
(2, 'V6A-477', 2, '2016-07-22', '11:00:00', '15'),
(3, 'V6A-477', 3, '2016-07-22', '12:00:00', '15');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombres` varchar(255) NOT NULL,
  `usuario` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `pregunta` varchar(255) NOT NULL,
  `respuesta` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `tipo` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombres`, `usuario`, `password`, `pregunta`, `respuesta`, `email`, `tipo`) VALUES
(1, 'Victor Lipa', 'victor123', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'hola', 'mundo', 'edsongmail', 'usuario estandar'),
(2, 'edson lipa', 'edson123', '7c4a8d09ca3762af61e59520943dc26494f8941b', '', '', '', 'administrador'),
(5, 'mili', 'mili123', '7c4a8d09ca3762af61e59520943dc26494f8941b', '', '', '', 'administrador'),
(6, 'ruth', 'ruth123', '7c4a8d09ca3762af61e59520943dc26494f8941b', '', '', '', 'usuario estandar'),
(17, 'pe', 'pe11', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Nombre del Cantante o grupo favorito?', 'coldplay', 'pe@gmail', 'usuario estandar'),
(19, 'amiru', 'amiru123', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Nombre de tu enamorad@?', 'eli', 'amiru@gmail', 'usuario estandar');

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
