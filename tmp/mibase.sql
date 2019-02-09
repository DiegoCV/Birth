-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-09-2018 a las 09:54:18
-- Versión del servidor: 10.1.28-MariaDB
-- Versión de PHP: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `miBase`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentario`
--

CREATE TABLE `comentario` (
  `comentario_id` int(11) NOT NULL,
  `comentario_autor` varchar(20) NOT NULL,
  `comentario_email` varchar(255) NOT NULL,
  `comentario_contenido` text NOT NULL,
  `comentario_create_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `entrada_entrada_id` int(11) NOT NULL,
  `comentario_padre` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entrada`
--

CREATE TABLE `entrada` (
  `entrada_id` int(11) NOT NULL,
  `entrada_titulo` varchar(45) DEFAULT NULL,
  `entrada_contenido` longtext,
  `entrada_enlace` varchar(45) DEFAULT NULL,
  `entrada_autor` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagen`
--

CREATE TABLE `imagen` (
  `imagen_id` int(11) NOT NULL,
  `imagen` mediumblob,
  `imagen_tipo` varchar(30) DEFAULT NULL,
  `entrada_entrada_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tag`
--

CREATE TABLE `tag` (
  `tag_id` int(11) NOT NULL,
  `tag_nombre` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tag_has_entrada`
--

CREATE TABLE `tag_has_entrada` (
  `tag_tag_id` int(11) NOT NULL,
  `entrada_entrada_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `timestamps`
--

CREATE TABLE `timestamps` (
  `entrada_entrada_id` int(11) NOT NULL,
  `create_time` datetime DEFAULT CURRENT_TIMESTAMP,
  `update_time` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `username` varchar(16) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(32) NOT NULL,
  `create_time` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `comentario`
--
ALTER TABLE `comentario`
  ADD PRIMARY KEY (`comentario_id`),
  ADD KEY `fk_comentario_entrada1_idx` (`entrada_entrada_id`),
  ADD KEY `fk_comentario_comentario1_idx` (`comentario_padre`);

--
-- Indices de la tabla `entrada`
--
ALTER TABLE `entrada`
  ADD PRIMARY KEY (`entrada_id`),
  ADD UNIQUE KEY `entrada_enlace_UNIQUE` (`entrada_enlace`),
  ADD KEY `fk_entrada_user1_idx` (`entrada_autor`);

--
-- Indices de la tabla `imagen`
--
ALTER TABLE `imagen`
  ADD PRIMARY KEY (`imagen_id`,`entrada_entrada_id`),
  ADD KEY `fk_imagen_entrada1_idx` (`entrada_entrada_id`);

--
-- Indices de la tabla `tag`
--
ALTER TABLE `tag`
  ADD PRIMARY KEY (`tag_id`),
  ADD UNIQUE KEY `tag_nombre_UNIQUE` (`tag_nombre`);

--
-- Indices de la tabla `tag_has_entrada`
--
ALTER TABLE `tag_has_entrada`
  ADD PRIMARY KEY (`tag_tag_id`,`entrada_entrada_id`),
  ADD KEY `fk_tag_has_entrada_entrada1_idx` (`entrada_entrada_id`),
  ADD KEY `fk_tag_has_entrada_tag1_idx` (`tag_tag_id`);

--
-- Indices de la tabla `timestamps`
--
ALTER TABLE `timestamps`
  ADD PRIMARY KEY (`entrada_entrada_id`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `comentario`
--
ALTER TABLE `comentario`
  MODIFY `comentario_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `entrada`
--
ALTER TABLE `entrada`
  MODIFY `entrada_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `imagen`
--
ALTER TABLE `imagen`
  MODIFY `imagen_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tag`
--
ALTER TABLE `tag`
  MODIFY `tag_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comentario`
--
ALTER TABLE `comentario`
  ADD CONSTRAINT `fk_comentario_comentario1` FOREIGN KEY (`comentario_padre`) REFERENCES `comentario` (`comentario_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_comentario_entrada1` FOREIGN KEY (`entrada_entrada_id`) REFERENCES `entrada` (`entrada_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `entrada`
--
ALTER TABLE `entrada`
  ADD CONSTRAINT `fk_entrada_user1` FOREIGN KEY (`entrada_autor`) REFERENCES `user` (`username`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `imagen`
--
ALTER TABLE `imagen`
  ADD CONSTRAINT `fk_imagen_entrada1` FOREIGN KEY (`entrada_entrada_id`) REFERENCES `entrada` (`entrada_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tag_has_entrada`
--
ALTER TABLE `tag_has_entrada`
  ADD CONSTRAINT `fk_tag_has_entrada_entrada1` FOREIGN KEY (`entrada_entrada_id`) REFERENCES `entrada` (`entrada_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tag_has_entrada_tag1` FOREIGN KEY (`tag_tag_id`) REFERENCES `tag` (`tag_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `timestamps`
--
ALTER TABLE `timestamps`
  ADD CONSTRAINT `fk_timestamps_entrada1` FOREIGN KEY (`entrada_entrada_id`) REFERENCES `entrada` (`entrada_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
