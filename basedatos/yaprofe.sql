-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 25-07-2019 a las 07:35:26
-- Versión del servidor: 10.1.36-MariaDB
-- Versión de PHP: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `yaprofe`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignatura`
--

CREATE TABLE `asignatura` (
  `id` int(11) NOT NULL,
  `name` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `asignatura`
--

INSERT INTO `asignatura` (`id`, `name`) VALUES
(1, 'Matemáticas'),
(2, 'Lenguaje'),
(3, 'Historia'),
(4, 'Química'),
(5, 'Biología'),
(6, 'Programación'),
(7, 'Comercio'),
(8, 'Deportes');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modalidad`
--

CREATE TABLE `modalidad` (
  `id` int(11) NOT NULL,
  `name` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `modalidad`
--

INSERT INTO `modalidad` (`id`, `name`) VALUES
(1, 'Presencial'),
(2, 'Online');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `niveleducacional`
--

CREATE TABLE `niveleducacional` (
  `id` int(11) NOT NULL,
  `name` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `niveleducacional`
--

INSERT INTO `niveleducacional` (`id`, `name`) VALUES
(1, 'Enseñanza básica'),
(2, 'Enseñanza Media'),
(3, 'Pre Universitario'),
(4, 'Enseñanza Superior');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `lastname` varchar(120) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `ciudad` varchar(60) DEFAULT NULL,
  `telefono` varchar(30) DEFAULT NULL,
  `descripcion` varchar(500) DEFAULT NULL,
  `precio` int(20) DEFAULT NULL,
  `id_modalidad` int(11) DEFAULT NULL,
  `id_niveleducacional` int(11) DEFAULT NULL,
  `id_asignatura` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `lastname`, `email`, `password`, `ciudad`, `telefono`, `descripcion`, `precio`, `id_modalidad`, `id_niveleducacional`, `id_asignatura`) VALUES
(10, 'Fabian', 'Cardenas', 'fabi2@gmail.com', '$2y$10$ok9WLx2zkYB8yKXJrGsqKuDtbtw0RPZ0vzmlaMD1QukIfj5OCwtw6', 'Yungay', '981767673', 'Soy estudiante de la gloriosa UBB y puedo ayudarte con clases de química ;)', 12500, 1, 1, 4),
(13, 'Jorge', 'Baeza', 'jorge@gmail.com', '$2y$10$XbX/mjQopRlFMxGt5DoL0.0OWUcZYdlzHMN9MCmBgTG75c2DVeSba', 'San Ignacio', '919283797', 'Soy egresado de historia, así que ya sabes cómo puedo ayudarte. Contactame.', 7000, 1, 1, 3),
(14, 'Abraham', 'Briones', 'abraham@gmail.com', '$2y$10$qMKyrEmJ07ywaGZvQELgqOXoNCevGWX7kRvZCQJ8XIjtyCWqLphqq', 'Bulnes', '900098787', 'Soy futuro dueño de Xiaomi, así­ que trabajen conmigo, puedo ayudarles con las ciencias empresariales en general.', 5000, 1, 3, 7),
(15, 'Monito', 'Vidal', 'monito@gmail.com', '$2y$10$xlCUCV6IHsWN5/2jYSqt2uSKc4.m473k8TCN0Q2z8cdXYH1u0rNPq', 'Santiago', '900000000', 'Soy hijo del King Arthur, te ayudo a editar vÃ­deos y jugar a la pelota.', 100000, 1, 1, 8),
(19, 'Lionel', 'Messi', 'messi@gmail.com', '$2y$10$C.y5GMrDtQ6XuYw/YgZZbOIGgWozBSj5y4qXlHOXqwDxfaZ2986G6', 'Barcelona', '123456789', 'Ya no juego casi', 990000, 1, 3, 8);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `asignatura`
--
ALTER TABLE `asignatura`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `modalidad`
--
ALTER TABLE `modalidad`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `niveleducacional`
--
ALTER TABLE `niveleducacional`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_modalidad` (`id_modalidad`),
  ADD KEY `id_niveleducacional` (`id_niveleducacional`),
  ADD KEY `id_asignatura` (`id_asignatura`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `asignatura`
--
ALTER TABLE `asignatura`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `modalidad`
--
ALTER TABLE `modalidad`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `niveleducacional`
--
ALTER TABLE `niveleducacional`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`id_modalidad`) REFERENCES `modalidad` (`id`),
  ADD CONSTRAINT `users_ibfk_2` FOREIGN KEY (`id_niveleducacional`) REFERENCES `niveleducacional` (`id`),
  ADD CONSTRAINT `users_ibfk_3` FOREIGN KEY (`id_asignatura`) REFERENCES `asignatura` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
