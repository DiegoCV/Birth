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
-- Base de datos: `blog`
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

--
-- Volcado de datos para la tabla `entrada`
--

INSERT INTO `entrada` (`entrada_id`, `entrada_titulo`, `entrada_contenido`, `entrada_enlace`, `entrada_autor`) VALUES
(1, 'Estaciones climaticas', 'Las estaciones son los periodos del año en los que las condiciones climáticas imperantes se mantienen, en una determinada región, dentro de un cierto rango. Estos periodos son normalmente cuatro y duran aproximadamente tres meses y se denominan: primavera, verano, otoño e invierno. Las estaciones se deben a la inclinación del eje de giro de la Tierra respecto al plano de su órbita respecto al sol, que hace que algunas regiones reciban distinta cantidad de luz solar según la época del año, debido a la duración del día y con distinta intensidad según la inclinación del sol sobre el horizonte (ya que la luz debe atravesar más o menos la atmósfera).\r\n\r\nEn las regiones ecuatoriales de la Tierra (donde pasa el paralelo 0°) las estaciones son sólo dos: la estación seca y la estación lluviosa; ya que en ellas varía drásticamente el régimen de lluvias, pero no varía mucho la temperatura. A partir del paralelo 7° se observan los cuatro cambios estacionarios claramente.\r\n\r\nDependiendo de la latitud y de la altura, los cambios meteorológicos a lo largo del año pueden ser mínimos, como en las zonas tropicales bajas, o máximos, como en las zonas de latitudes medias las cuatro estaciones son primavera, verano, otoño e invierno. En estas zonas se pueden distinguir periodos, que llamamos estaciones, con características más o menos parecidas, que afectan a los seres vivos. En general, se habla de cuatro estaciones: primavera, verano, otoño e invierno, aunque hay zonas de la Tierra donde sólo existen dos, la húmeda y la seca (zonas monzónicas etc.).', 'clima', 'DiegoCV'),
(2, 'Michael Jackson', 'Michael Joseph Jackson1​ (Gary, Indiana, 29 de agosto de 1958-Los Ángeles, California, 25 de junio de 2009) fue un cantante, compositor, productor discográfico, bailarín, actor y filántropo estadounidense.2​3​4​ Conocido como el «Rey del Pop»,5​ sus contribuciones y reconocimiento en la historia de la música y el baile, así como su publicitada vida personal, lo convirtieron en una figura internacional en la cultura popular durante más de cuatro décadas. Es reconocido como la estrella de música pop más exitosa en el mundo.6​ Sin embargo, su música incluyó una amplia acepción de subgéneros como el rhythm and blues (soul y funk), rock, disco y dance.6​\r\n\r\nComenzó su carrera artística a mediados de los años 1960 en la agrupación musical The Jackson 5, en la cual publicó, junto con algunos de sus hermanos, diez álbumes hasta 1975. En 1971 inició su carrera como solista, aunque siguió perteneciendo al grupo. A principios de la década de 1980, Jackson se convirtió en una figura dominante en la música popular. Sus vídeos musicales, entre los que se destacan «Beat It», «Billie Jean» y «Thriller», de su álbum de 1982 Thriller, son acreditados como una ruptura de las barreras raciales y la transformación del medio en una forma de arte y herramienta promocional. La popularidad de estos ayudó a llevar a la cadena televisiva MTV a la fama. El álbum Bad (1987) produjo el número uno de los sencillos «I Just Can\'t Stop Loving You», «Bad», «The Way You Make Me Feel», «Man in the Mirror» y «Dirty Diana» en el Billboard Hot 100, por lo que se convirtió en el primer álbum en tener cinco sencillos número uno en ese ranking. Continuó innovando con vídeos como «Black or White» y «Scream» a lo largo de la década de 1990, y forjó una reputación como artista solista en varias giras. A través de sus presentaciones en escena y en vídeo, Jackson popularizó una serie de técnicas de danza complicadas, como el robot y el moonwalk, a las que dio el nombre. Su sonido y estilo distintivos han influido en numerosos artistas de diversos géneros musicales.', 'reypop', 'DiegoCV'),
(3, 'fsfd', 'dfsdf', '1', 'DiegoCV'),
(4, 'fsfd', 'dfsdf', '2', 'DiegoCV'),
(5, 'dsfs', 'dfasf', '6', 'DiegoCV');

--
-- Disparadores `entrada`
--
DELIMITER $$
CREATE TRIGGER `entrada_AFTER_INSERT` AFTER INSERT ON `entrada` FOR EACH ROW BEGIN
insert into `timestamps`(`entrada_entrada_id`) 
values (NEW.entrada_id);
END
$$
DELIMITER ;

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
-- Volcado de datos para la tabla `timestamps`
--

INSERT INTO `timestamps` (`entrada_entrada_id`, `create_time`, `update_time`) VALUES
(1, '2018-09-13 21:02:06', '2018-09-13 21:02:06'),
(2, '2018-09-13 21:02:23', '2018-09-13 21:02:23'),
(3, '2018-09-13 21:02:23', '2018-09-13 21:02:23'),
(4, '2018-09-13 21:02:34', '2018-09-13 21:02:34'),
(5, '2018-09-13 21:02:34', '2018-09-13 21:02:34');

-- --------------------------------------------------------

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
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`username`, `email`, `password`, `create_time`) VALUES
('DiegoCV', 'skdiego@diego.com', 'd', '2018-08-20 15:47:02');

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
