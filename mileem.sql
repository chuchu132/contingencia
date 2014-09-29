-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 28-09-2014 a las 21:21:28
-- Versión del servidor: 5.5.38
-- Versión de PHP: 5.4.30-2+deb.sury.org~precise+1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
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
(1, 'Alquiler', '2014-09-25 01:27:30', '2014-09-25 01:27:30'),
(2, 'Venta', '2014-09-25 01:27:36', '2014-09-25 01:27:36'),
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
  `availability` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `neighborhood_id` (`neighborhood_id`),
  KEY `operation_type_id` (`operation_type_id`),
  KEY `property_type_id` (`property_type_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `publications`
--

INSERT INTO `publications` (`id`, `street`, `st_number`, `neighborhood_id`, `covered_area`, `total_area`, `rooms`, `expenses`, `age`, `brand_new`, `price`, `currency`, `balcony`, `bathrooms`, `dining_room`, `ensuite_bedroom`, `storage`, `garage`, `studio`, `kitchen`, `service_unit`, `hall`, `frontgarden`, `backyard`, `laundry`, `lounge`, `living_room`, `terrace`, `mains_water`, `drains`, `cable`, `gas`, `internet`, `pavement`, `publication_date`, `publication_type`, `status`, `video`, `images_url`, `created`, `updated`, `operation_type_id`, `property_type_id`, `user_id`, `end_date`, `description`, `availability`) VALUES
(1, 'Av Diaz Velez', 3790, 2, 30, 35, 1, 800, 5, 0, 2000, 'ARS', 1, 1, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 1, 0, 1, 1, 1, 1, 1, 1, '2014-09-28 00:00:00', 1, 2, '', '["files\\/96df72290f54511ba31ce5fe4f5e26009ebc4b78.jpg","files\\/4b26605a1e2ac0b4dc968b64d9425f166c4525bc.jpg"]', '2014-09-28 19:46:14', '2014-09-28 19:46:14', 1, 4, 5, '2014-10-28 00:00:00', 'Departamento de CategorÃ­a, orientaciÃ³n Norte. Excelente zona. 2 cuadras subte A, 3 cuadras de subte B. ', ''),
(2, 'Tinogasta', 5600, 44, 200, 250, 5, 0, 0, 1, 120000, 'USD', 1, 2, 1, 1, 0, 1, 1, 1, 0, 0, 1, 1, 0, 1, 0, 1, 1, 1, 1, 1, 1, 1, '2014-09-28 00:00:00', 2, 2, '', '["files\\/1c5f283877ca99b25250e139d61059d13074830c.jpg","files\\/0f72dd79ee9e4d0f30dbada476ba79a98a50ee99.jpg","files\\/79a00a8df0e8a3020057a6cc66df6898f7c6ac27.jpg"]', '2014-09-28 19:48:30', '2014-09-28 19:48:30', 2, 1, 5, '2014-10-28 00:00:00', 'Excelente casa en barrio residencial. Lote propio. A estrenar', ''),
(3, 'Av Luis Maria Campos', 800, 5, 60, 70, 1, 1000, 5, 0, 5000, 'ARS', 1, 1, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 0, 0, 1, 1, 1, 1, 1, 1, 1, 1, '2014-09-28 00:00:00', 3, 2, 'https://www.youtube.com/watch?v=_uK3GcN-qXw', '["files\\/ef522736def4d28b487b41683ef5b12982911fab.jpg","files\\/773b080ea75000ffc2cd1caea0bd7991f1cdddcb.jpg","files\\/d5774633d32d37d1cda229a4f1808bccc84ea313.jpg","files\\/f1bb6d5898f3099964fb005e508f695245558ac7.jpg","files\\/26dae16c419f6f994b08e6d2bd437f05b219465e.jpg"]', '2014-09-28 19:51:56', '2014-09-28 19:51:56', 3, 4, 5, '2014-10-28 00:00:00', 'Excelente departamento en zona norte. Edificio con piscina y amenities.', ''),
(4, 'Arcos', 4500, 21, 200, 250, 6, 0, 2, 0, 80000, 'ARS', 1, 3, 1, 1, 0, 1, 1, 1, 1, 0, 1, 1, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2014-09-28 00:00:00', 3, 2, 'https://www.youtube.com/watch?v=THXFZyVsK2E', '["files\\/d801e5c7da41d53e040184ece6a7badae50a6099.jpg","files\\/6302aced966db1ea4893b857e552e29023c6571b.jpg","files\\/9acd1aa12e9cad96adfed959f17685db04e92bf1.jpg"]', '2014-09-28 19:56:19', '2014-09-28 19:57:21', 4, 1, 5, '2014-10-28 00:00:00', 'Alquiler de tiempos compartidos. ', '01-10-2014 hasta 30-05-2015'),
(5, 'Cuba', 4700, 5, 60, 75, 1, 700, 6, 0, 4700, 'ARS', 1, 1, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 1, 0, 1, 1, 1, 1, 1, 1, '2014-09-28 00:00:00', 1, 2, '', '["files\\/1a807f252bb10b4c0ff336905ffe29ca243bcb86.jpg","files\\/49150f8e6f76116fe83175877713ea2960adb663.jpg","files\\/5c76982d0e2052ec55800ba869ce559d08445282.jpg"]', '2014-09-28 20:00:51', '2014-09-28 20:00:51', 3, 4, 5, '2014-10-28 00:00:00', 'Departamento en alquiler temporal, excelente zona. Amoblado.', ''),
(6, 'Grecia', 4300, 5, 60, 70, 1, 890, 2, 0, 6000, 'ARS', 1, 1, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 1, 0, 1, 1, 1, 1, 1, 1, '2014-09-28 00:00:00', 2, 2, '', '["files\\/6c3a8d115f90391babe574108b9eaed1ce399957.jpg","files\\/5ea778a33bf79d19c88ac7fd9a8cd3df7802f789.jpg","files\\/93d245c327e8b7030d2546028600bd3fd5d1ba81.jpg"]', '2014-09-28 20:11:43', '2014-09-28 20:11:43', 3, 4, 5, '2014-10-28 00:00:00', 'Excelente depto para alquiler temporario', ''),
(7, 'Deheza', 1500, 5, 60, 68, 1, 500, 4, 0, 6100, 'ARS', 1, 1, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 1, 0, 1, 1, 1, 1, 1, 1, '2014-09-28 00:00:00', 3, 2, 'https://www.youtube.com/watch?v=LloxkfD9QNQ', '["files\\/ee990bcc06c464c7499f02a71afe39fb14c0bb45.jpg","files\\/2f4ec74a9a50170e83824e0fcbdbd3053bb921d3.jpg","files\\/07c6fc0bc54c092bad9d6eee1e860fa7d5ad275f.jpg","files\\/3dc540c8f0d49d07ddb01e300aec4c3507d33ddd.jpg","files\\/96df72290f54511ba31ce5fe4f5e26009ebc4b78.jpg"]', '2014-09-28 20:21:24', '2014-09-28 20:21:59', 3, 4, 5, '2014-10-28 00:00:00', 'Departamento en alquiler temporario. Excelente zona. Edificio con ameninites.', '');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `name`, `tel_part`, `mobile`, `created`, `updated`) VALUES
(2, 'chuchu132@gmail.com', '677b7ca0580d075c0f0236665c0064a1a73e2915', 'Ale Barbieri', '11-6224-3188', '11-6224-3187', '2014-09-25 19:46:04', '2014-09-27 16:53:41'),
(3, 'ale@abarbieri.com.ar', '4bab6cdec78bdefa87086c64b171eb1575f283d2', 'Ale2 Barbieri', '12-123213-123', '123-12321-3-213', '2014-09-26 14:16:43', '2014-09-26 14:16:43'),
(4, 'alejandrodaraio@gmail.com', '24f8e09d47802a034efb64f41bb54cb70ef8db79', 'Alejandro', '99991234', '155112345678', '2014-09-28 17:11:10', '2014-09-28 17:42:46'),
(5, 'liz.smocovich@gmail.com', '1d591b0147b3508cc83be6c0e4f3a6960db6d146', 'Liz Smocovich', '48653118', '1130672233', '2014-09-28 17:14:59', '2014-09-28 17:14:59');

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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
