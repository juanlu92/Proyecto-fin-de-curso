-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-06-2016 a las 17:59:01
-- Versión del servidor: 10.1.13-MariaDB
-- Versión de PHP: 5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyecto`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Casas`
--
CREATE DATABASE Proyecto;
USE Proyecto;
CREATE TABLE `Casas` (
  `idCasa` int(11) NOT NULL,
  `nombre` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `Casas`
--

INSERT INTO `Casas` (`idCasa`, `nombre`) VALUES
(1, 'Casa de la playa'),
(2, 'Casa de marruecos'),
(3, 'Mansión');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Componentes`
--

CREATE TABLE `Componentes` (
  `idComponente` int(11) NOT NULL,
  `estado` tinyint(1) DEFAULT NULL,
  `tipo` varchar(255) DEFAULT NULL,
  `privilegios` set('1','2','3','4','5','6','7') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `Componentes`
--

INSERT INTO `Componentes` (`idComponente`, `estado`, `tipo`, `privilegios`) VALUES
(1, 0, 'led', '2'),
(2, 0, 'ventilador', '5'),
(3, 0, 'motor', '7');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Habitaciones`
--

CREATE TABLE `Habitaciones` (
  `idHabitacion` int(11) NOT NULL,
  `nombre` varchar(60) DEFAULT NULL,
  `idCasa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `Habitaciones`
--

INSERT INTO `Habitaciones` (`idHabitacion`, `nombre`, `idCasa`) VALUES
(1, 'Salón', 1),
(2, 'Desván', 1),
(3, 'Salita', 2),
(4, 'Dormitorio', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Pertenece`
--

CREATE TABLE `Pertenece` (
  `idHabitacion` int(11) NOT NULL,
  `idComponente` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `privilegios` set('1','2','3','4','5','6','7') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `Pertenece`
--

INSERT INTO `Pertenece` (`idHabitacion`, `idComponente`, `idUsuario`, `privilegios`) VALUES
(1, 1, 1, '7'),
(1, 2, 1, '7'),
(1, 3, 1, '7'),
(4, 1, 2, '5'),
(4, 2, 2, '5'),
(4, 3, 2, '5');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Poseen`
--

CREATE TABLE `Poseen` (
  `idUsuario` int(11) NOT NULL,
  `idCasa` int(11) NOT NULL,
  `fechaCompra` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `Poseen`
--

INSERT INTO `Poseen` (`idUsuario`, `idCasa`, `fechaCompra`) VALUES
(1, 1, '2016-06-17'),
(1, 2, '2015-12-31'),
(2, 3, '2016-03-03');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Usuarios`
--

CREATE TABLE `Usuarios` (
  `idUsuario` int(11) NOT NULL,
  `esAdmin` tinyint(1) DEFAULT NULL,
  `nombre` varchar(60) DEFAULT NULL,
  `primerApellido` varchar(60) DEFAULT NULL,
  `segundoApellido` varchar(60) DEFAULT NULL,
  `estado` tinyint(1) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(512) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `Usuarios`
--

INSERT INTO `Usuarios` (`idUsuario`, `esAdmin`, `nombre`, `primerApellido`, `segundoApellido`, `estado`, `email`, `password`) VALUES
(1, 1, 'Domingo Javier', 'Botello', 'García', 0, 'domijavier95@gmail.com', '3627909a29c31381a071ec27f7c9ca97726182aed29a7ddd2e54353322cfb30abb9e3a6df2ac2c20fe23436311d678564d0c8d305930575f60e2d3d048184d79'),
(2, 1, 'Juan Luis', 'García', 'Guerrero', 0, 'juanluis@gmail.com', '3627909a29c31381a071ec27f7c9ca97726182aed29a7ddd2e54353322cfb30abb9e3a6df2ac2c20fe23436311d678564d0c8d305930575f60e2d3d048184d79'),
(3, 0, 'Sergio', 'Pichoto', 'Martín', 1, 'sergio@gmail.com', '3627909a29c31381a071ec27f7c9ca97726182aed29a7ddd2e54353322cfb30abb9e3a6df2ac2c20fe23436311d678564d0c8d305930575f60e2d3d048184d79');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `Casas`
--
ALTER TABLE `Casas`
  ADD PRIMARY KEY (`idCasa`);

--
-- Indices de la tabla `Componentes`
--
ALTER TABLE `Componentes`
  ADD PRIMARY KEY (`idComponente`);

--
-- Indices de la tabla `Habitaciones`
--
ALTER TABLE `Habitaciones`
  ADD PRIMARY KEY (`idHabitacion`),
  ADD KEY `idCasa` (`idCasa`);

--
-- Indices de la tabla `Pertenece`
--
ALTER TABLE `Pertenece`
  ADD KEY `idHabitacion` (`idHabitacion`),
  ADD KEY `idComponente` (`idComponente`),
  ADD KEY `idUsuario` (`idUsuario`);

--
-- Indices de la tabla `Poseen`
--
ALTER TABLE `Poseen`
  ADD KEY `idUsuario` (`idUsuario`),
  ADD KEY `idCasa` (`idCasa`);

--
-- Indices de la tabla `Usuarios`
--
ALTER TABLE `Usuarios`
  ADD PRIMARY KEY (`idUsuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `Casas`
--
ALTER TABLE `Casas`
  MODIFY `idCasa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `Componentes`
--
ALTER TABLE `Componentes`
  MODIFY `idComponente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `Habitaciones`
--
ALTER TABLE `Habitaciones`
  MODIFY `idHabitacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `Usuarios`
--
ALTER TABLE `Usuarios`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `Habitaciones`
--
ALTER TABLE `Habitaciones`
  ADD CONSTRAINT `Habitaciones_ibfk_1` FOREIGN KEY (`idCasa`) REFERENCES `Casas` (`idCasa`);

--
-- Filtros para la tabla `Pertenece`
--
ALTER TABLE `Pertenece`
  ADD CONSTRAINT `Pertenece_ibfk_1` FOREIGN KEY (`idHabitacion`) REFERENCES `Habitaciones` (`idHabitacion`),
  ADD CONSTRAINT `Pertenece_ibfk_2` FOREIGN KEY (`idComponente`) REFERENCES `Componentes` (`idComponente`),
  ADD CONSTRAINT `Pertenece_ibfk_3` FOREIGN KEY (`idUsuario`) REFERENCES `Usuarios` (`idUsuario`);

--
-- Filtros para la tabla `Poseen`
--
ALTER TABLE `Poseen`
  ADD CONSTRAINT `Poseen_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `Usuarios` (`idUsuario`),
  ADD CONSTRAINT `Poseen_ibfk_2` FOREIGN KEY (`idCasa`) REFERENCES `Casas` (`idCasa`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
