-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-08-2024 a las 05:04:37
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
  `id` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `cedulajuridica` varchar(100) DEFAULT NULL,
  `correo` varchar(100) DEFAULT NULL,
  `telefono` varchar(100) DEFAULT NULL,
  `propietario` varchar(100) DEFAULT NULL,
  `estado` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tbescuelamusica`
--

INSERT INTO `tbescuelamusica` (`id`, `nombre`, `cedulajuridica`, `correo`, `telefono`, `propietario`, `estado`) VALUES
(1, 'John Doe', '123456789', 'john@example.com', '1234567890', 'John Doe', 1),
(3, 'Allan Robinsonn', '123456789', 'allan@allan.com', '1234567890', 'Apologix', 0),
(7, 'John Doe', '123456789', 'john@example.com', '1234567890', 'John Doe', 1),
(8, 'John Doe', '123456789', 'john@example.com', '1234567890', 'John Doe', 0),
(9, 'John Doe', '123456789', 'john@example.com', '1234567890', 'John Doe', 1),
(10, 'undefined', '', 'undefined', 'undefined', 'undefined', 1),
(11, 'undefined', '', 'undefined', 'undefined', 'undefined', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbescuelamusica`
--
ALTER TABLE `tbescuelamusica`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbescuelamusica`
--
ALTER TABLE `tbescuelamusica`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
