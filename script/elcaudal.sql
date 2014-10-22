-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-10-2014 a las 01:21:53
-- Versión del servidor: 5.6.16
-- Versión de PHP: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `elcaudal`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `anuncios`
--

CREATE TABLE IF NOT EXISTS `anuncios` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(128) COLLATE utf8_bin DEFAULT NULL,
  `cuerpo` text COLLATE utf8_bin,
  `fecha_publicacion` datetime DEFAULT NULL,
  `fecha_vigencia` datetime DEFAULT NULL,
  `longitud` float DEFAULT NULL,
  `latitud` float DEFAULT NULL,
  `id_users` int(10) NOT NULL,
  `id_imagenes_anuncios` int(10) NOT NULL,
  `id_categoria_anuncios` int(10) NOT NULL,
  `id_sector_anuncios` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_users` (`id_users`),
  KEY `id_imagenes_anuncios` (`id_imagenes_anuncios`),
  KEY `id_categoria_anuncios` (`id_categoria_anuncios`),
  KEY `id_sector_anuncios` (`id_sector_anuncios`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria_anuncios`
--

CREATE TABLE IF NOT EXISTS `categoria_anuncios` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(128) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria_noticias`
--

CREATE TABLE IF NOT EXISTS `categoria_noticias` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(128) COLLATE utf8_bin DEFAULT NULL,
  `codigo` varchar(128) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria_publicidad`
--

CREATE TABLE IF NOT EXISTS `categoria_publicidad` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(128) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagenes_anuncios`
--

CREATE TABLE IF NOT EXISTS `imagenes_anuncios` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(128) COLLATE utf8_bin DEFAULT NULL,
  `url` TEXT CHARACTER SET ascii,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagenes_noticias`
--

CREATE TABLE IF NOT EXISTS `imagenes_noticias` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(128) COLLATE utf8_bin DEFAULT NULL,
  `url` TEXT CHARACTER SET ascii,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noticias`
--

CREATE TABLE IF NOT EXISTS `noticias` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(128) COLLATE utf8_bin DEFAULT NULL,
  `cuerpo` text COLLATE utf8_bin,
  `fecha_publicacion` datetime DEFAULT NULL,
  `estado` int(2) NOT NULL,
  `id_users` int(10) NOT NULL,
  `id_imagenes_noticias` int(10) NOT NULL,
  `id_tags_noticias` int(10) NOT NULL,
  `id_categoria_noticias` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_users` (`id_users`),
  KEY `id_imagenes_noticias` (`id_imagenes_noticias`),
  KEY `id_tags_noticias` (`id_tags_noticias`),
  KEY `id_categoria_noticias` (`id_categoria_noticias`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pais`
--

CREATE TABLE IF NOT EXISTS `pais` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(128) COLLATE utf8_bin DEFAULT NULL,
  `codigo` varchar(128) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `pais`
--

INSERT INTO `pais` (`id`, `nombre`, `codigo`) VALUES
(1, 'chile', '1234');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `publicidad`
--

CREATE TABLE IF NOT EXISTS `publicidad` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(128) COLLATE utf8_bin DEFAULT NULL,
  `fecha_publicacion` datetime DEFAULT NULL,
  `fecha_vigencia` datetime DEFAULT NULL,
  `url` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `id_users` int(10) NOT NULL,
  `id_categoria_publicidad` int(10) NOT NULL,
  `id_tamanio_publicidad` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_uusers` (`id_users`),
  KEY `id_categoria_publicidad` (`id_categoria_publicidad`),
  KEY `id_tamanio_publicidad` (`id_tamanio_publicidad`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(128) COLLATE utf8_bin DEFAULT NULL,
  `codigo` varchar(128) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `nombre`, `codigo`) VALUES
(1, 'admin', '1234');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sector_anuncios`
--

CREATE TABLE IF NOT EXISTS `sector_anuncios` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(128) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=14 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tags_noticias`
--

CREATE TABLE IF NOT EXISTS `tags_noticias` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(128) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tamanio_publicidad`
--

CREATE TABLE IF NOT EXISTS `tamanio_publicidad` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `tamaño` varchar(128) COLLATE utf8_bin DEFAULT NULL,
  `costo` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(128) COLLATE utf8_bin DEFAULT NULL,
  `apellido_pat` varchar(128) COLLATE utf8_bin DEFAULT NULL,
  `apellido_mat` varchar(128) COLLATE utf8_bin DEFAULT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `rut` varchar(13) COLLATE utf8_bin DEFAULT NULL,
  `username` varchar(128) COLLATE utf8_bin DEFAULT NULL,
  `password` varchar(128) COLLATE utf8_bin DEFAULT NULL,
  `fecha_ingreso` datetime DEFAULT NULL,
  `image` TEXT CHARACTER SET ascii,
  `id_roles` int(10) DEFAULT NULL,
  `id_pais` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_rol` (`id_roles`),
  KEY `id_pais` (`id_pais`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `nombre`, `apellido_pat`, `apellido_mat`, `fecha_nacimiento`, `rut`, `username`, `password`, `fecha_ingreso`, `id_roles`, `id_pais`) VALUES
(1, 'francisco', 'barra', 'sepulveda', '2014-10-15', '180701370', 'admin', '1234567', '2014-10-15 00:00:00', 1, 1);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `anuncios`
--
ALTER TABLE `anuncios`
  ADD CONSTRAINT `anuncios_ibfk_1` FOREIGN KEY (`id_users`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `anuncios_ibfk_2` FOREIGN KEY (`id_imagenes_anuncios`) REFERENCES `imagenes_anuncios` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `anuncios_ibfk_3` FOREIGN KEY (`id_sector_anuncios`) REFERENCES `sector_anuncios` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `anuncios_ibfk_4` FOREIGN KEY (`id_categoria_anuncios`) REFERENCES `categoria_anuncios` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `noticias`
--
ALTER TABLE `noticias`
  ADD CONSTRAINT `noticias_ibfk_1` FOREIGN KEY (`id_users`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `noticias_ibfk_2` FOREIGN KEY (`id_imagenes_noticias`) REFERENCES `imagenes_noticias` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `noticias_ibfk_3` FOREIGN KEY (`id_tags_noticias`) REFERENCES `tags_noticias` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `noticias_ibfk_4` FOREIGN KEY (`id_categoria_noticias`) REFERENCES `categoria_noticias` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `publicidad`
--
ALTER TABLE `publicidad`
  ADD CONSTRAINT `publicidad_ibfk_1` FOREIGN KEY (`id_users`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `publicidad_ibfk_2` FOREIGN KEY (`id_categoria_publicidad`) REFERENCES `categoria_publicidad` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `publicidad_ibfk_3` FOREIGN KEY (`id_tamanio_publicidad`) REFERENCES `tamanio_publicidad` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`id_roles`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `users_ibfk_2` FOREIGN KEY (`id_pais`) REFERENCES `pais` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
