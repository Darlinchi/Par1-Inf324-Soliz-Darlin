-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3308
-- Tiempo de generación: 04-10-2024 a las 17:30:44
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bddarlin`
--
CREATE DATABASE IF NOT EXISTS `bddarlin` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `bddarlin`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `catastro`
--
-- Creación: 03-10-2024 a las 02:11:38
--

CREATE TABLE `catastro` (
  `id_catastro` int(11) NOT NULL,
  `distrito` varchar(100) DEFAULT NULL,
  `zona` varchar(100) DEFAULT NULL,
  `xini` decimal(10,2) DEFAULT NULL,
  `yini` decimal(10,2) DEFAULT NULL,
  `xfin` decimal(10,2) DEFAULT NULL,
  `yfin` decimal(10,2) DEFAULT NULL,
  `superficie` decimal(10,2) DEFAULT NULL,
  `ci` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `catastro`
--

INSERT INTO `catastro` (`id_catastro`, `distrito`, `zona`, `xini`, `yini`, `xfin`, `yfin`, `superficie`, `ci`) VALUES
(10001, 'Distrito 4', 'Miraflores', 0.00, 0.00, 10.00, 10.00, 100.00, 1111111),
(10002, 'Distrito 9', 'Achachicala', 0.00, 11.00, 10.00, 21.00, 90.00, 4444444),
(10006, 'Distrito 1', 'San Antonio', 22.00, 0.00, 32.00, 10.00, 120.00, 1010101),
(10007, 'Distrito 5', 'Valle de la Luna', 0.00, 33.00, 10.00, 43.00, 190.00, 1818181),
(10008, 'Distrito 5', 'Cotahuma', 11.00, 33.00, 21.00, 43.00, 170.00, 1111111),
(10009, 'Distrito 5', 'San Miguel', 22.00, 33.00, 32.00, 43.00, 210.00, 2222222),
(10011, 'Distrito 8', 'La Palca', 11.00, 66.00, 21.00, 76.00, 180.00, 1010101),
(10012, 'Distrito 8', 'El Alto', 22.00, 66.00, 32.00, 76.00, 210.00, 1212121),
(20002, 'Distrito 4', 'Sopocachi', 11.00, 0.00, 21.00, 10.00, 120.00, 2222222),
(20003, 'Distrito 9', 'Pampahasi', 11.00, 11.00, 21.00, 21.00, 110.00, 5555555),
(20004, 'Distrito 2', 'El Tejar', 0.00, 11.00, 10.00, 21.00, 90.00, 1212121),
(20005, 'Distrito 2', 'Villa Victoria', 11.00, 11.00, 21.00, 21.00, 95.00, 1313131),
(20006, 'Distrito 2', 'Pura Pura', 22.00, 11.00, 32.00, 21.00, 130.00, 1414141),
(20007, 'Distrito 6', 'Alto Tacagua', 0.00, 44.00, 10.00, 54.00, 160.00, 3333333),
(20008, 'Distrito 6', 'Villa Salomé', 11.00, 44.00, 21.00, 54.00, 140.00, 4444444),
(20009, 'Distrito 6', 'Alto Obrajes', 22.00, 44.00, 32.00, 54.00, 180.00, 5555555),
(20010, 'Distrito 10', 'Villa Ingenio', 0.00, 77.00, 10.00, 87.00, 150.00, 1313131),
(20011, 'Distrito 10', 'Ciudadela Ferroviaria', 11.00, 77.00, 21.00, 87.00, 190.00, 1414141),
(20012, 'Distrito 10', 'San Juan de Dios', 22.00, 77.00, 32.00, 87.00, 180.00, 1515151),
(30001, 'Distrito 4', 'San Jorge', 22.00, 0.00, 32.00, 10.00, 140.00, 3333333),
(30002, 'Distrito 9', 'Villa Fátima', 22.00, 11.00, 32.00, 21.00, 130.00, 1111111),
(30003, 'Distrito 3', 'Central', 0.00, 22.00, 10.00, 32.00, 120.00, 1515151),
(30004, 'Distrito 3', 'San Juan', 11.00, 22.00, 21.00, 32.00, 150.00, 1616161),
(30005, 'Distrito 3', 'San Sebastián', 22.00, 22.00, 32.00, 32.00, 180.00, 1717171),
(30006, 'Distrito 7', 'Gran Poder', 0.00, 55.00, 10.00, 65.00, 200.00, 6666666),
(30007, 'Distrito 7', 'Ciudad Satélite', 11.00, 55.00, 21.00, 65.00, 230.00, 7777777),
(30008, 'Distrito 7', 'San Pedro', 22.00, 55.00, 32.00, 65.00, 220.00, 8888888);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `distritos_zonas`
--
-- Creación: 04-10-2024 a las 06:32:16
--

CREATE TABLE `distritos_zonas` (
  `id_dz` int(11) NOT NULL,
  `distrito` varchar(255) DEFAULT NULL,
  `zona` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `distritos_zonas`
--

INSERT INTO `distritos_zonas` (`id_dz`, `distrito`, `zona`) VALUES
(1, 'Distrito 1', 'San Pedro'),
(2, 'Distrito 1', 'La Llamita'),
(3, 'Distrito 1', 'San Antonio'),
(4, 'Distrito 2', 'El Tejar'),
(5, 'Distrito 2', 'Villa Victoria'),
(6, 'Distrito 2', 'Pura Pura'),
(7, 'Distrito 3', 'Central'),
(8, 'Distrito 3', 'San Juan'),
(9, 'Distrito 3', 'San Sebastián'),
(10, 'Distrito 4', 'Miraflores'),
(11, 'Distrito 4', 'Sopocachi'),
(12, 'Distrito 4', 'San Jorge'),
(13, 'Distrito 5', 'Valle de la Luna'),
(14, 'Distrito 5', 'Cotahuma'),
(15, 'Distrito 5', 'San Miguel'),
(16, 'Distrito 6', 'Alto Tacagua'),
(17, 'Distrito 6', 'Villa Salomé'),
(18, 'Distrito 6', 'Alto Obrajes'),
(19, 'Distrito 7', 'Gran Poder'),
(20, 'Distrito 7', 'Ciudad Satélite'),
(21, 'Distrito 7', 'San Pedro'),
(22, 'Distrito 8', 'Llojeta'),
(23, 'Distrito 8', 'La Palca'),
(24, 'Distrito 8', 'El Alto'),
(25, 'Distrito 9', 'Achachicala'),
(26, 'Distrito 9', 'Pampahasi'),
(27, 'Distrito 9', 'Villa Fátima'),
(28, 'Distrito 10', 'Villa Ingenio'),
(29, 'Distrito 10', 'Ciudadela Ferroviaria'),
(30, 'Distrito 10', 'San Juan de Dios');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--
-- Creación: 02-10-2024 a las 23:36:08
--

CREATE TABLE `persona` (
  `ci` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `paterno` varchar(100) DEFAULT NULL,
  `materno` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`ci`, `nombre`, `paterno`, `materno`) VALUES
(0, 'Administrador', 'Administrador', 'Administrador'),
(1010101, 'Miriam', 'Flores', 'Gutiérrez'),
(1111111, 'Carlos', 'Martínez', 'Salazar'),
(1212121, 'Jorge', 'Vargas', 'Pérez'),
(1313131, 'Laura', 'Gonzales', 'Suárez'),
(1414141, 'Pedro', 'Choque', 'Limachi'),
(1515151, 'Luisa', 'Fernández', 'Rodríguez'),
(1616161, 'Analia', 'López', 'Mendoza'),
(1717171, 'Hugo', 'Rivera', 'Cruz'),
(1818181, 'Rosa', 'Mendoza', 'Villca'),
(2222222, 'Sofía', 'Pérez', 'Ramírez'),
(3333333, 'Alejandro', 'Gutiérrez', 'Cruz'),
(4444444, 'Valentina', 'Rojas', 'Ahumada'),
(5555555, 'Fernando', 'Alvarez', 'Montoya'),
(6666666, 'Isabel', 'Torres', 'Serrano'),
(7777777, 'Diego', 'Cano', 'Mena'),
(8888888, 'Andrea', 'Quispe', 'Guzmán');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--
-- Creación: 04-10-2024 a las 02:20:31
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `ci` int(11) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('administrador','cliente') DEFAULT 'cliente'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `username`, `ci`, `password`, `role`) VALUES
(9, 'adminhamlp', 0, 'admin123456', 'administrador'),
(10, 'Carlos', 1111111, 'carlos321', 'cliente'),
(11, 'Sofia', 2222222, 'sofia321', 'cliente'),
(12, 'Alejandro', 3333333, 'alejandro123', 'cliente'),
(13, 'Valentina', 4444444, 'valentina321', 'cliente'),
(14, 'Fernando', 5555555, 'fernando123', 'cliente'),
(15, 'Isabel', 6666666, 'isabel321', 'cliente'),
(16, 'Diego', 7777777, 'diego123', 'cliente');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `catastro`
--
ALTER TABLE `catastro`
  ADD PRIMARY KEY (`id_catastro`),
  ADD KEY `fk_ci` (`ci`);

--
-- Indices de la tabla `distritos_zonas`
--
ALTER TABLE `distritos_zonas`
  ADD PRIMARY KEY (`id_dz`);

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`ci`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk1_ci` (`ci`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `distritos_zonas`
--
ALTER TABLE `distritos_zonas`
  MODIFY `id_dz` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `catastro`
--
ALTER TABLE `catastro`
  ADD CONSTRAINT `fk_ci` FOREIGN KEY (`ci`) REFERENCES `persona` (`ci`);

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk1_ci` FOREIGN KEY (`ci`) REFERENCES `persona` (`ci`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
