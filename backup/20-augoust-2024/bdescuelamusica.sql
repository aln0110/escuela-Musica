-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-08-2024 a las 01:21:34
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bdescuelamusica`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbescuelamusica`
--

CREATE TABLE `tbescuelamusica` (
  `idescuelamusica` int(11) NOT NULL,
  `nombreescuelamusica` varchar(100) DEFAULT NULL,
  `cedulajuridicaescuelamusica` varchar(100) DEFAULT NULL,
  `correoescuelamusica` varchar(100) DEFAULT NULL,
  `telefonoescuelamusica` varchar(100) DEFAULT NULL,
  `estadoescuelamusica` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tbescuelamusica`
--

INSERT INTO `tbescuelamusica` (`idescuelamusica`, `nombreescuelamusica`, `cedulajuridicaescuelamusica`, `correoescuelamusica`, `telefonoescuelamusica`, `estadoescuelamusica`) VALUES
(1, 'John Doe', '123456789', 'john@example.com', '1234567890', 1),
(3, 'Allan Robinsonn', '123456789', 'allan@allan.com', '1234567890', 0),
(7, 'John Doe', '123456789', 'john@example.com', '1234567890', 1),
(8, 'John Doe', '123456789', 'john@example.com', '1234567890', 0),
(17, 'hi2', 'hi', 'hi', ' hi3', 0),
(18, '1', '1', '1', '1', 1),
(19, '1', '1', '1', '1', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbjunta`
--

CREATE TABLE `tbjunta` (
  `idjunta` int(11) NOT NULL,
  `nombrejunta` varchar(100) DEFAULT NULL,
  `cedulajunta` varchar(100) DEFAULT NULL,
  `juntapuesto` varchar(100) DEFAULT NULL,
  `fechainiciojunta` date DEFAULT NULL,
  `fechafinaljunta` date DEFAULT NULL,
  `juntaactivo` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tbjunta`
--

INSERT INTO `tbjunta` (`idjunta`, `nombrejunta`, `cedulajunta`, `juntapuesto`, `fechainiciojunta`, `fechafinaljunta`, `juntaactivo`) VALUES
(1, 'Allan', '118070920', 'Presidente', '2024-08-18', '2024-08-24', 1),
(2, 'juan2', '1234', 'juan', '2024-08-17', '2024-08-07', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbescuelamusica`
--
ALTER TABLE `tbescuelamusica`
  ADD PRIMARY KEY (`idescuelamusica`);

--
-- Indices de la tabla `tbjunta`
--
ALTER TABLE `tbjunta`
  ADD PRIMARY KEY (`idjunta`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbescuelamusica`
--
ALTER TABLE `tbescuelamusica`
  MODIFY `idescuelamusica` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `tbjunta`
--
ALTER TABLE `tbjunta`
  MODIFY `idjunta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
