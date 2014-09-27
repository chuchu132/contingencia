-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 27-09-2014 a las 18:41:09
-- Versión del servidor: 5.5.38-0ubuntu0.14.04.1
-- Versión de PHP: 5.5.9-1ubuntu4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `mileem`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cities`
--

CREATE TABLE IF NOT EXISTS `cities` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `cities`
--

INSERT INTO `cities` (`id`, `name`, `created`, `updated`) VALUES
(1, 'Capital Federal', '2014-09-25 00:51:57', '2014-09-25 00:51:57');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `currency_convertor`
--

CREATE TABLE IF NOT EXISTS `currency_convertor` (
  `code` varchar(3) NOT NULL,
  `factor` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `currency_convertor`
--

INSERT INTO `currency_convertor` (`code`, `factor`) VALUES
('ARS', 1),
('USD', 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `neighborhoods`
--

CREATE TABLE IF NOT EXISTS `neighborhoods` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `city_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `city_id` (`city_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=49 ;

--
-- Volcado de datos para la tabla `neighborhoods`
--

INSERT INTO `neighborhoods` (`id`, `name`, `created`, `updated`, `city_id`) VALUES
(1, 'AgronomÃ­a', '2014-09-25 01:13:33', '2014-09-25 01:36:42', 1),
(2, 'Almagro', '2014-09-25 01:13:33', '2014-09-25 01:13:33', 1),
(3, 'Balvanera', '2014-09-25 01:13:33', '2014-09-25 01:13:33', 1),
(4, 'Barracas', '2014-09-25 01:13:33', '2014-09-25 01:13:33', 1),
(5, 'Belgrano', '2014-09-25 01:13:33', '2014-09-25 01:13:33', 1),
(6, 'Boedo', '2014-09-25 01:13:33', '2014-09-25 01:13:33', 1),
(7, 'Caballito', '2014-09-25 01:13:33', '2014-09-25 01:13:33', 1),
(8, 'Chacarita', '2014-09-25 01:13:33', '2014-09-25 01:13:33', 1),
(9, 'Coghlan', '2014-09-25 01:13:33', '2014-09-25 01:13:33', 1),
(10, 'Colegiales', '2014-09-25 01:13:33', '2014-09-25 01:13:33', 1),
(11, 'ConstituciÃ³n', '2014-09-25 01:13:33', '2014-09-25 01:37:02', 1),
(12, 'Flores', '2014-09-25 01:13:33', '2014-09-25 01:13:33', 1),
(13, 'Floresta', '2014-09-25 01:13:33', '2014-09-25 01:13:33', 1),
(14, 'La Boca', '2014-09-25 01:13:33', '2014-09-25 01:13:33', 1),
(15, 'La Paternal', '2014-09-25 01:13:33', '2014-09-25 01:13:33', 1),
(16, 'Liniers', '2014-09-25 01:13:33', '2014-09-25 01:13:33', 1),
(17, 'Mataderos', '2014-09-25 01:13:33', '2014-09-25 01:13:33', 1),
(18, 'Monte Castro', '2014-09-25 01:13:33', '2014-09-25 01:13:33', 1),
(19, 'Monserrat', '2014-09-25 01:13:33', '2014-09-25 01:13:33', 1),
(20, 'Nueva Pompeya', '2014-09-25 01:13:33', '2014-09-25 01:13:33', 1),
(21, 'NÃºÃ±ez', '2014-09-25 01:13:33', '2014-09-25 01:37:21', 1),
(22, 'Palermo', '2014-09-25 01:13:33', '2014-09-25 01:13:33', 1),
(23, 'Parque Avellaneda', '2014-09-25 01:13:33', '2014-09-25 01:13:33', 1),
(24, 'Parque Chacabuco', '2014-09-25 01:13:33', '2014-09-25 01:13:33', 1),
(25, 'Parque Chas', '2014-09-25 01:13:33', '2014-09-25 01:13:33', 1),
(26, 'Parque Patricios', '2014-09-25 01:13:33', '2014-09-25 01:13:33', 1),
(27, 'Puerto Madero', '2014-09-25 01:13:33', '2014-09-25 01:13:33', 1),
(28, 'Recoleta', '2014-09-25 01:13:33', '2014-09-25 01:13:33', 1),
(29, 'Retiro', '2014-09-25 01:13:33', '2014-09-25 01:13:33', 1),
(30, 'Saavedra', '2014-09-25 01:13:33', '2014-09-25 01:13:33', 1),
(31, 'San CristÃ³bal', '2014-09-25 01:13:33', '2014-09-25 01:37:39', 1),
(32, 'San NicolÃ¡s', '2014-09-25 01:13:33', '2014-09-25 01:37:55', 1),
(33, 'San Telmo', '2014-09-25 01:13:33', '2014-09-25 01:13:33', 1),
(34, 'VÃ©lez SÃ¡rsfield', '2014-09-25 01:13:33', '2014-09-25 01:39:28', 1),
(35, 'Versalles', '2014-09-25 01:13:33', '2014-09-25 01:13:33', 1),
(36, 'Villa Crespo', '2014-09-25 01:13:33', '2014-09-25 01:13:33', 1),
(37, 'Villa del Parque', '2014-09-25 01:13:33', '2014-09-25 01:13:33', 1),
(38, 'Villa Devoto', '2014-09-25 01:13:33', '2014-09-25 01:13:33', 1),
(39, 'Villa General Mitre', '2014-09-25 01:13:33', '2014-09-25 01:13:33', 1),
(40, 'Villa Lugano', '2014-09-25 01:13:33', '2014-09-25 01:13:33', 1),
(41, 'Villa Luro', '2014-09-25 01:13:33', '2014-09-25 01:13:33', 1),
(42, 'Villa OrtÃºzar', '2014-09-25 01:13:33', '2014-09-25 01:42:38', 1),
(43, 'Villa Pueyrredon', '2014-09-25 01:13:33', '2014-09-25 01:13:33', 1),
(44, 'Villa Real', '2014-09-25 01:13:33', '2014-09-25 01:13:33', 1),
(45, 'Villa Riachuelo', '2014-09-25 01:13:33', '2014-09-25 01:13:33', 1),
(46, 'Villa Santa Rita', '2014-09-25 01:13:33', '2014-09-25 01:13:33', 1),
(47, 'Villa Soldati', '2014-09-25 01:13:33', '2014-09-25 01:13:33', 1),
(48, 'Villa Urquiza', '2014-09-25 01:13:33', '2014-09-25 01:13:33', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `neighborhood_limit_with_neighborhoods`
--

CREATE TABLE IF NOT EXISTS `neighborhood_limit_with_neighborhoods` (
  `neighborhood_id` int(11) NOT NULL,
  `neighborhood2_id` int(11) NOT NULL,
  KEY `neighborhood_id` (`neighborhood_id`),
  KEY `neighborhood2_id` (`neighborhood2_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `operation_type`
--

CREATE TABLE IF NOT EXISTS `operation_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `operation_type`
--

INSERT INTO `operation_type` (`id`, `name`, `created`, `updated`) VALUES
(1, 'Venta', '2014-09-25 01:27:30', '2014-09-25 01:27:30'),
(2, 'Alquiler', '2014-09-25 01:27:36', '2014-09-25 01:27:36'),
(3, 'Alquiler Temporario', '2014-09-25 01:28:02', '2014-09-25 01:28:02'),
(4, 'Tiempo Compartido', '2014-09-25 01:28:12', '2014-09-25 01:28:12');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `property_types`
--

CREATE TABLE IF NOT EXISTS `property_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `category` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- Volcado de datos para la tabla `property_types`
--

INSERT INTO `property_types` (`id`, `name`, `category`, `created`, `updated`) VALUES
(1, 'Casa', 1, '2014-09-25 01:26:12', '2014-09-25 01:26:12'),
(2, 'PH', 1, '2014-09-25 01:26:12', '2014-09-25 01:26:12'),
(3, 'Barrio Cerrado', 1, '2014-09-25 01:26:12', '2014-09-25 01:26:12'),
(4, 'Departamento', 2, '2014-09-25 01:26:12', '2014-09-25 01:26:12'),
(5, 'Departamento Compartido', 2, '2014-09-25 01:26:12', '2014-09-25 01:26:12'),
(6, 'Oficina', 2, '2014-09-25 01:26:13', '2014-09-25 01:26:13'),
(7, 'Consultorio', 2, '2014-09-25 01:26:13', '2014-09-25 01:26:13'),
(8, 'Quinta', 3, '2014-09-25 01:26:13', '2014-09-25 01:26:13'),
(9, 'Terreno', 3, '2014-09-25 01:26:13', '2014-09-25 01:26:13'),
(10, 'Campo', 3, '2014-09-25 01:26:13', '2014-09-25 01:26:13'),
(11, 'GalpÃ³n', 3, '2014-09-25 01:26:13', '2014-09-25 21:32:07'),
(12, 'Local', 4, '2014-09-25 01:26:13', '2014-09-25 01:26:13'),
(13, 'Hotel', 5, '2014-09-25 01:26:13', '2014-09-25 01:26:13'),
(14, 'Edificio', 5, '2014-09-25 01:26:13', '2014-09-25 01:26:13'),
(15, 'Cochera', 6, '2014-09-25 01:26:13', '2014-09-25 01:26:13');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `publications`
--

CREATE TABLE IF NOT EXISTS `publications` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `street` varchar(300) NOT NULL,
  `st_number` int(11) NOT NULL,
  `neighborhood_id` int(11) NOT NULL,
  `covered_area` int(11) DEFAULT NULL,
  `total_area` int(11) DEFAULT NULL,
  `rooms` int(11) DEFAULT NULL,
  `expenses` int(11) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `brand_new` tinyint(1) NOT NULL,
  `price` int(11) NOT NULL,
  `currency` varchar(3) NOT NULL,
  `balcony` tinyint(1) NOT NULL,
  `bathrooms` int(11) DEFAULT NULL,
  `dining_room` tinyint(1) NOT NULL,
  `ensuite_bedroom` tinyint(1) NOT NULL,
  `storage` tinyint(1) NOT NULL,
  `garage` tinyint(1) NOT NULL,
  `studio` tinyint(1) NOT NULL,
  `kitchen` tinyint(1) NOT NULL,
  `service_unit` tinyint(1) NOT NULL,
  `hall` tinyint(1) NOT NULL,
  `frontgarden` tinyint(1) NOT NULL,
  `backyard` tinyint(1) NOT NULL,
  `laundry` tinyint(1) NOT NULL,
  `lounge` tinyint(1) NOT NULL,
  `living_room` tinyint(1) NOT NULL,
  `terrace` tinyint(1) NOT NULL,
  `mains_water` tinyint(1) NOT NULL,
  `drains` tinyint(1) NOT NULL,
  `cable` tinyint(1) NOT NULL,
  `gas` tinyint(1) NOT NULL,
  `internet` tinyint(1) NOT NULL,
  `pavement` tinyint(1) NOT NULL,
  `publication_date` datetime NOT NULL,
  `publication_type` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `video` varchar(300) NOT NULL,
  `images_url` text NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `operation_type_id` int(11) NOT NULL,
  `property_type_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `end_date` datetime NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `neighborhood_id` (`neighborhood_id`),
  KEY `operation_type_id` (`operation_type_id`),
  KEY `property_type_id` (`property_type_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=22 ;

--
-- Volcado de datos para la tabla `publications`
--

INSERT INTO `publications` (`id`, `street`, `st_number`, `neighborhood_id`, `covered_area`, `total_area`, `rooms`, `expenses`, `age`, `brand_new`, `price`, `currency`, `balcony`, `bathrooms`, `dining_room`, `ensuite_bedroom`, `storage`, `garage`, `studio`, `kitchen`, `service_unit`, `hall`, `frontgarden`, `backyard`, `laundry`, `lounge`, `living_room`, `terrace`, `mains_water`, `drains`, `cable`, `gas`, `internet`, `pavement`, `publication_date`, `publication_type`, `status`, `video`, `images_url`, `created`, `updated`, `operation_type_id`, `property_type_id`, `user_id`, `end_date`, `description`) VALUES
(3, 'asd', 1, 1, 12, 123, 1, 123, 1, 0, 12, 'ars', 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2014-09-26 18:57:45', 1, 3, '', '[]', '2014-09-25 23:04:30', '2014-09-26 23:26:45', 1, 1, 2, '2014-10-26 00:00:00', ''),
(6, 'Dr E Finochieto', 850, 1, 12, 123, 1, 123, 1, 0, 12, 'ars', 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2014-09-26 18:57:45', 1, 2, '', '[]', '2014-09-25 23:04:30', '2014-09-27 13:12:16', 1, 1, 2, '2014-10-26 00:00:00', ''),
(8, 'ddsd', 34, 1, 234, 34, 34, 34, 34, 0, 234524, 'ARS', 0, 34, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2014-09-26 18:57:45', 1, 2, '', '', '2014-09-26 18:24:38', '2014-09-27 13:16:01', 1, 1, 2, '2014-10-26 00:00:00', ''),
(9, 'asd', 23, 1, 34, 34, NULL, 342, NULL, 0, 234324, 'ARS', 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2014-09-26 18:57:45', 1, 2, '', '', '2014-09-26 18:31:21', '2014-09-27 13:03:01', 1, 1, 2, '2014-10-26 00:00:00', ''),
(10, 'Montes de Oca', 200, 4, 32, 32, 2, NULL, 1, 0, 90000, 'ARS', 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2014-09-26 18:57:45', 1, 2, '', '', '2014-09-26 18:39:47', '2014-09-26 23:24:58', 1, 1, 2, '2014-10-26 00:00:00', ''),
(11, 'asdad', 6456, 1, 46, 65, 56, 65, 5, 0, 546546, 'USD', 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2014-09-26 18:57:45', 1, 2, '', '[]', '2014-09-26 18:50:39', '2014-09-26 23:26:35', 1, 1, 2, '2014-10-26 00:00:00', ''),
(12, 'qweqwe', 12, 1, 23, 23, 5, 123, 23, 0, 12321, 'ARS', 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2014-09-27 00:00:00', 1, 2, '', '[]', '2014-09-27 10:52:45', '2014-09-27 13:53:57', 1, 1, 2, '2014-10-27 00:00:00', ''),
(13, 'asdasd', 23, 1, 23, 32, 23, 23, 23, 0, 23, 'ARS', 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2014-09-27 00:00:00', 1, 2, '', '[]', '2014-09-27 11:00:24', '2014-09-27 11:00:24', 1, 1, 2, '2014-10-27 00:00:00', ''),
(14, 'sdf', 10, 1, 54, 54, 3, 555, 4, 0, 54, 'ARS', 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2014-09-27 00:00:00', 1, 3, '', '[]', '2014-09-27 11:10:19', '2014-09-27 13:11:52', 1, 1, 2, '2014-10-27 00:00:00', ''),
(15, 'sadasds', 56, 1, 675, 675, 6, 76, 76, 0, 67, 'ARS', 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2014-09-27 00:00:00', 1, 2, '', '[]', '2014-09-27 12:31:07', '2014-09-27 12:31:07', 1, 1, 2, '2014-10-27 00:00:00', ''),
(16, 'asdasd', 234, 1, 34, 34, 3, 34, 34, 0, 34, 'ARS', 0, 3, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2014-09-27 00:00:00', 1, 2, '', '[]', '2014-09-27 12:32:20', '2014-09-27 12:32:20', 1, 1, 2, '2014-10-27 00:00:00', ''),
(17, 'sadas', 34, 1, 34, 34, 34, 34, 34, 0, 134, 'USD', 0, 34, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2014-09-27 00:00:00', 1, 2, '', '["files\\/06c0a2559fdf171f737e2857e3e2f009c9f8f1ba.jpg"]', '2014-09-27 12:41:14', '2014-09-27 12:41:14', 1, 1, 2, '2014-10-27 00:00:00', ''),
(18, 'sadas', 34, 1, 34, 34, 34, 34, 34, 0, 134, 'USD', 0, 34, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2014-09-27 00:00:00', 1, 2, '', '["files\\/06c0a2559fdf171f737e2857e3e2f009c9f8f1ba.jpg"]', '2014-09-27 12:41:23', '2014-09-27 12:41:23', 1, 1, 2, '2014-10-27 00:00:00', ''),
(19, 'Av la Plata', 2541, 1, 56, 56, NULL, 0, 1, 0, 6709, 'USD', 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2014-09-27 00:00:00', 3, 2, 'https://www.youtube.com/watch?v=Z7PG_twJ0P0', '["files\\/.jpg","files\\/.jpg","files\\/.jpg"]', '2014-09-27 17:13:13', '2014-09-27 17:13:13', 1, 15, 2, '2014-10-27 00:00:00', ''),
(20, 'asdsad', 54, 1, 45, 45, NULL, 45, 45, 0, 345, 'ARS', 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2014-09-27 00:00:00', 3, 2, '', '["files\\/06c0a2559fdf171f737e2857e3e2f009c9f8f1ba.jpg","files\\/cea7809915b3c578843cd9a509d5cf28f1154706.jpg","files\\/40ebf0b3ca967c5d3f3ed508aa1257e1a2980a93.jpg"]', '2014-09-27 17:26:38', '2014-09-27 17:26:38', 1, 15, 2, '2014-10-27 00:00:00', ''),
(21, 'asdasdsadasdsa a adsadasd ', 2342, 1, 45, 45, NULL, 45, 0, 1, 45, 'ARS', 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2014-09-27 00:00:00', 1, 2, '', '[]', '2014-09-27 18:07:46', '2014-09-27 18:07:46', 1, 15, 2, '2014-10-27 00:00:00', 'descripcion sarasassa \r\nmas cosas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `name` varchar(250) NOT NULL,
  `tel_part` varchar(50) NOT NULL,
  `mobile` varchar(50) NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `name`, `tel_part`, `mobile`, `created`, `updated`) VALUES
(2, 'chuchu132@gmail.com', '677b7ca0580d075c0f0236665c0064a1a73e2915', 'Ale Barbieri', '11-6224-3188', '11-6224-3187', '2014-09-25 19:46:04', '2014-09-27 16:53:41'),
(3, 'ale@abarbieri.com.ar', '4bab6cdec78bdefa87086c64b171eb1575f283d2', 'Ale2 Barbieri', '12-123213-123', '123-12321-3-213', '2014-09-26 14:16:43', '2014-09-26 14:16:43');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `neighborhoods`
--
ALTER TABLE `neighborhoods`
  ADD CONSTRAINT `neighborhoods_ibfk_1` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `neighborhood_limit_with_neighborhoods`
--
ALTER TABLE `neighborhood_limit_with_neighborhoods`
  ADD CONSTRAINT `neighborhood_limit_with_neighborhoods_ibfk_1` FOREIGN KEY (`neighborhood_id`) REFERENCES `neighborhoods` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `neighborhood_limit_with_neighborhoods_ibfk_2` FOREIGN KEY (`neighborhood2_id`) REFERENCES `neighborhoods` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `publications`
--
ALTER TABLE `publications`
  ADD CONSTRAINT `publications_ibfk_1` FOREIGN KEY (`neighborhood_id`) REFERENCES `neighborhoods` (`id`),
  ADD CONSTRAINT `publications_ibfk_2` FOREIGN KEY (`operation_type_id`) REFERENCES `operation_type` (`id`),
  ADD CONSTRAINT `publications_ibfk_3` FOREIGN KEY (`property_type_id`) REFERENCES `property_types` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
