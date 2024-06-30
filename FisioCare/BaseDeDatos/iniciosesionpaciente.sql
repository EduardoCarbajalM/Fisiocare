-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-12-2023 a las 05:54:12
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
-- Base de datos: `iniciosesionpaciente`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datospaciente`
--

CREATE TABLE `datospaciente` (
  `fecha_inicio` date DEFAULT NULL,
  `fecha_siguiente` date DEFAULT NULL,
  `datos_tratamiento` varchar(200) DEFAULT NULL,
  `realizado` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `datospaciente`
--

INSERT INTO `datospaciente` (`fecha_inicio`, `fecha_siguiente`, `datos_tratamiento`, `realizado`) VALUES
('2023-11-29', '2023-11-30', 'prueba', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `doctores`
--

CREATE TABLE `doctores` (
  `id_user` int(11) NOT NULL,
  `nombre_user` varchar(10) NOT NULL,
  `contrasena_user` varchar(25) NOT NULL,
  `correo_user` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `doctores`
--

INSERT INTO `doctores` (`id_user`, `nombre_user`, `contrasena_user`, `correo_user`) VALUES
(1, 'eduardo', '123', 'eduardomenzoda@gmail.com'),
(2, 'Eduardo Ca', '12345', 'eduardomenzoda@gmail.com'),
(3, 'Jessy', '123', 'jessy@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_user` int(9) NOT NULL,
  `nombre_user` varchar(10) NOT NULL,
  `contrasena_user` varchar(25) NOT NULL,
  `correo_user` varchar(25) NOT NULL,
  `fecha_inicio` date DEFAULT NULL,
  `fecha_siguiente` date DEFAULT NULL,
  `datos_tratamiento` varchar(200) DEFAULT NULL,
  `realizado` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_user`, `nombre_user`, `contrasena_user`, `correo_user`, `fecha_inicio`, `fecha_siguiente`, `datos_tratamiento`, `realizado`) VALUES
(1, 'Daniel', '123', 'dankielssj@gmail.com', '2023-12-10', '2023-12-17', 'El paciente deberá realizar un tratamiento del tipo..', 1),
(2, 'dankielssj', '123', 'dankielssj@gmail.com', NULL, NULL, NULL, NULL),
(9, 'Alecita', '123', 'alecitarn@gmail.com', '2023-12-06', '2023-12-14', 'Medicina:  \r\n\r\nParacetamol 1 cucharada 2 días\r\nSinbicor 5 días 10g\r\nAmpicilina 2 días 5g\r\nPentoxicilina capsulas por 4 dias', 1),
(10, 'Yolanda', '123', 'yolandarazo@gmail.com', '2023-12-06', '2023-12-15', 'Medicina:\r\n\r\nParacetamol 2 cucharadas por dos dias', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `doctores`
--
ALTER TABLE `doctores`
  ADD PRIMARY KEY (`id_user`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `doctores`
--
ALTER TABLE `doctores`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_user` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
