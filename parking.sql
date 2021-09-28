-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-11-2019 a las 21:07:15
-- Versión del servidor: 10.4.6-MariaDB
-- Versión de PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `parking`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE `administrador` (
  `id_administrador` int(11) NOT NULL,
  `nombre` varchar(20) DEFAULT NULL,
  `apellido` varchar(30) DEFAULT NULL,
  `telefono` int(11) DEFAULT NULL,
  `direccion` varchar(25) DEFAULT NULL,
  `turno` int(11) DEFAULT NULL,
  `usuario` varchar(20) NOT NULL,
  `contra` varchar(10) NOT NULL,
  `estado` varchar(1) NOT NULL DEFAULT 'A'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ano_vehiculos`
--

CREATE TABLE `ano_vehiculos` (
  `id_ano` int(11) NOT NULL,
  `ano` varchar(10) NOT NULL,
  `estado` varchar(1) NOT NULL DEFAULT 'A'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ano_vehiculos`
--

INSERT INTO `ano_vehiculos` (`id_ano`, `ano`, `estado`) VALUES
(1, '2019', 'A'),
(2, '2020', 'A'),
(3, '2018', 'A'),
(4, '2017', 'A'),
(5, '2016', 'A'),
(6, '2015', 'A'),
(7, '2014', 'A'),
(8, '2013', 'A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id_cliente` int(11) NOT NULL,
  `nombre` varchar(20) DEFAULT NULL,
  `apellido` varchar(30) DEFAULT NULL,
  `telefono` varchar(12) DEFAULT NULL,
  `correo` varchar(35) DEFAULT NULL,
  `contra` varchar(20) NOT NULL,
  `estado` varchar(1) NOT NULL DEFAULT 'A'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facturacion`
--

CREATE TABLE `facturacion` (
  `id_factura` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `matricula` varchar(15) NOT NULL,
  `cuota` int(11) NOT NULL DEFAULT 200,
  `fecha` date NOT NULL,
  `estado` varchar(1) NOT NULL DEFAULT 'A'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marcas_vehiculos`
--

CREATE TABLE `marcas_vehiculos` (
  `id_marca` int(11) NOT NULL,
  `marca` varchar(20) NOT NULL,
  `estado` varchar(1) NOT NULL DEFAULT 'A'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `marcas_vehiculos`
--

INSERT INTO `marcas_vehiculos` (`id_marca`, `marca`, `estado`) VALUES
(1, 'Toyota', 'A'),
(2, 'Honda', 'A'),
(3, 'tesla', 'A'),
(4, 'Lamborghini', 'A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modelo_vehiculos`
--

CREATE TABLE `modelo_vehiculos` (
  `id_modelo` int(11) NOT NULL,
  `modelo` varchar(20) NOT NULL,
  `estado` varchar(1) NOT NULL DEFAULT 'A'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `modelo_vehiculos`
--

INSERT INTO `modelo_vehiculos` (`id_modelo`, `modelo`, `estado`) VALUES
(1, 'Takoma', 'A'),
(2, 'model s', 'A'),
(3, 'model x', 'A'),
(4, 'Land cruiser prado', 'A'),
(5, 'cr-v', 'A'),
(6, 'civic', 'A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pago`
--

CREATE TABLE `pago` (
  `id_pago` varchar(15) DEFAULT NULL,
  `forma_de_pago` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `parqueo`
--

CREATE TABLE `parqueo` (
  `id_parqueo` int(11) NOT NULL,
  `id_piso` int(11) NOT NULL,
  `parqueo` varchar(10) NOT NULL,
  `matricula` varchar(20) DEFAULT NULL,
  `estado` varchar(1) DEFAULT 'A'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `parqueo`
--

INSERT INTO `parqueo` (`id_parqueo`, `id_piso`, `parqueo`, `matricula`, `estado`) VALUES
(1, 1, '1', NULL, 'I'),
(3, 1, '2', NULL, 'I'),
(4, 1, '3', NULL, 'I'),
(5, 1, '4', NULL, 'I'),
(6, 1, '5', NULL, 'I'),
(7, 1, '7', NULL, 'I'),
(8, 1, '8', NULL, 'A'),
(9, 2, '1', 'juan', 'I'),
(10, 2, '2', '300', 'I'),
(11, 2, '3', '20190014', 'I'),
(12, 2, '4', NULL, 'A'),
(13, 2, '5', NULL, 'A'),
(14, 2, '6', NULL, 'A'),
(15, 2, '7', NULL, 'A'),
(16, 2, '8', NULL, 'A'),
(17, 1, '9', NULL, 'A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `piso`
--

CREATE TABLE `piso` (
  `id_piso` int(11) NOT NULL,
  `piso` varchar(10) NOT NULL,
  `estado` varchar(1) DEFAULT 'A'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `piso`
--

INSERT INTO `piso` (`id_piso`, `piso`, `estado`) VALUES
(1, '1', 'A'),
(2, '2', 'A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_vehiculos`
--

CREATE TABLE `tipo_vehiculos` (
  `id_tipo` int(11) NOT NULL,
  `tipo` varchar(20) NOT NULL,
  `estado` varchar(1) NOT NULL DEFAULT 'A'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipo_vehiculos`
--

INSERT INTO `tipo_vehiculos` (`id_tipo`, `tipo`, `estado`) VALUES
(1, 'Camioneta', 'A'),
(2, 'Carro', 'A'),
(3, 'Jeepeta', 'A'),
(4, 'Guagua', 'A'),
(5, 'Super autos', 'A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehiculos`
--

CREATE TABLE `vehiculos` (
  `id_vehiculo` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `matricula` varchar(15) DEFAULT NULL,
  `tipo` varchar(15) DEFAULT NULL,
  `modelo` varchar(20) DEFAULT NULL,
  `marca` varchar(15) DEFAULT NULL,
  `ano` varchar(10) NOT NULL,
  `estado` varchar(1) NOT NULL DEFAULT 'A'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`id_administrador`),
  ADD UNIQUE KEY `usuario` (`usuario`);

--
-- Indices de la tabla `ano_vehiculos`
--
ALTER TABLE `ano_vehiculos`
  ADD PRIMARY KEY (`id_ano`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id_cliente`),
  ADD UNIQUE KEY `correo` (`correo`);

--
-- Indices de la tabla `facturacion`
--
ALTER TABLE `facturacion`
  ADD PRIMARY KEY (`id_factura`);

--
-- Indices de la tabla `marcas_vehiculos`
--
ALTER TABLE `marcas_vehiculos`
  ADD PRIMARY KEY (`id_marca`);

--
-- Indices de la tabla `modelo_vehiculos`
--
ALTER TABLE `modelo_vehiculos`
  ADD PRIMARY KEY (`id_modelo`);

--
-- Indices de la tabla `parqueo`
--
ALTER TABLE `parqueo`
  ADD PRIMARY KEY (`id_parqueo`),
  ADD UNIQUE KEY `matricula` (`matricula`),
  ADD KEY `id_piso` (`id_piso`);

--
-- Indices de la tabla `piso`
--
ALTER TABLE `piso`
  ADD PRIMARY KEY (`id_piso`);

--
-- Indices de la tabla `tipo_vehiculos`
--
ALTER TABLE `tipo_vehiculos`
  ADD PRIMARY KEY (`id_tipo`);

--
-- Indices de la tabla `vehiculos`
--
ALTER TABLE `vehiculos`
  ADD PRIMARY KEY (`id_vehiculo`),
  ADD KEY `id_cliente` (`id_cliente`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administrador`
--
ALTER TABLE `administrador`
  MODIFY `id_administrador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `ano_vehiculos`
--
ALTER TABLE `ano_vehiculos`
  MODIFY `id_ano` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `facturacion`
--
ALTER TABLE `facturacion`
  MODIFY `id_factura` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `marcas_vehiculos`
--
ALTER TABLE `marcas_vehiculos`
  MODIFY `id_marca` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `modelo_vehiculos`
--
ALTER TABLE `modelo_vehiculos`
  MODIFY `id_modelo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `parqueo`
--
ALTER TABLE `parqueo`
  MODIFY `id_parqueo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `piso`
--
ALTER TABLE `piso`
  MODIFY `id_piso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tipo_vehiculos`
--
ALTER TABLE `tipo_vehiculos`
  MODIFY `id_tipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `vehiculos`
--
ALTER TABLE `vehiculos`
  MODIFY `id_vehiculo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `parqueo`
--
ALTER TABLE `parqueo`
  ADD CONSTRAINT `parqueo_ibfk_1` FOREIGN KEY (`id_piso`) REFERENCES `piso` (`id_piso`);

--
-- Filtros para la tabla `vehiculos`
--
ALTER TABLE `vehiculos`
  ADD CONSTRAINT `vehiculos_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id_cliente`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
