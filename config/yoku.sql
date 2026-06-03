-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 03-06-2026 a las 19:50:57
-- Versión del servidor: 8.2.0
-- Versión de PHP: 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `yoku`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrito_personalizados`
--

DROP TABLE IF EXISTS `carrito_personalizados`;
CREATE TABLE IF NOT EXISTS `carrito_personalizados` (
  `id` int NOT NULL AUTO_INCREMENT,
  `usuario_id` int NOT NULL,
  `diseno_id` int NOT NULL,
  `cantidad` int DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `usuario_id` (`usuario_id`),
  KEY `diseno_id` (`diseno_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contactos`
--

DROP TABLE IF EXISTS `contactos`;
CREATE TABLE IF NOT EXISTS `contactos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellido` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mensaje` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `disenos`
--

DROP TABLE IF EXISTS `disenos`;
CREATE TABLE IF NOT EXISTS `disenos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `usuario_id` int NOT NULL,
  `producto_id` int DEFAULT NULL,
  `imagen` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `texto_personalizado` text COLLATE utf8mb4_unicode_ci,
  `color_texto` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `imagen_x` int DEFAULT '0',
  `imagen_y` int DEFAULT '0',
  `texto_x` int DEFAULT '0',
  `texto_y` int DEFAULT '0',
  `ancho_imagen` int DEFAULT '150',
  `fecha_creacion` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `usuario_id` (`usuario_id`),
  KEY `producto_id` (`producto_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lista_deseos`
--

DROP TABLE IF EXISTS `lista_deseos`;
CREATE TABLE IF NOT EXISTS `lista_deseos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `usuario_id` int NOT NULL,
  `producto_id` int NOT NULL,
  `creado_en` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `usuario_id` (`usuario_id`,`producto_id`),
  KEY `fk_deseos_producto` (`producto_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `lista_deseos`
--

INSERT INTO `lista_deseos` (`id`, `usuario_id`, `producto_id`, `creado_en`) VALUES
(1, 2, 3, '2026-06-03 18:44:10');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

DROP TABLE IF EXISTS `pedidos`;
CREATE TABLE IF NOT EXISTS `pedidos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `usuario_id` int NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `estado` enum('pendiente','pagado','enviado','entregado','cancelado') COLLATE utf8mb4_unicode_ci DEFAULT 'pendiente',
  `direccion_envio` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `recibo_pdf` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_pedidos_usuario` (`usuario_id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `pedidos`
--

INSERT INTO `pedidos` (`id`, `usuario_id`, `total`, `estado`, `direccion_envio`, `fecha`, `recibo_pdf`) VALUES
(1, 2, 0.00, 'pagado', 'Pendiente de configurar', '2026-06-03 18:44:16', NULL),
(2, 2, 0.00, 'pagado', 'Pendiente de configurar', '2026-06-03 18:53:38', NULL),
(3, 2, 0.00, 'pagado', 'Pendiente de configurar', '2026-06-03 19:00:38', NULL),
(4, 2, 0.00, 'pagado', 'Pendiente de configurar', '2026-06-03 19:03:33', NULL),
(5, 2, 0.00, 'pagado', 'Pendiente de configurar', '2026-06-03 19:06:20', NULL),
(6, 2, 0.00, 'pagado', 'Pendiente de configurar', '2026-06-03 19:10:52', NULL),
(7, 2, 14.99, 'pagado', 'Pendiente de configurar', '2026-06-03 19:19:01', NULL),
(8, 2, 14.99, 'pagado', 'Pendiente de configurar', '2026-06-03 19:19:45', NULL),
(9, 2, 14.99, 'pagado', 'Pendiente de configurar', '2026-06-03 19:23:00', 'uploads/recibos/pedido_9.pdf'),
(10, 2, 39.99, 'pagado', 'Pendiente de configurar', '2026-06-03 19:24:08', 'uploads/recibos/pedido_10.pdf'),
(11, 2, 39.99, 'pagado', 'Pendiente de configurar', '2026-06-03 19:36:04', 'uploads/recibos/pedido_11.pdf');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido_productos`
--

DROP TABLE IF EXISTS `pedido_productos`;
CREATE TABLE IF NOT EXISTS `pedido_productos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `pedido_id` int NOT NULL,
  `producto_id` int NOT NULL,
  `cantidad` int NOT NULL DEFAULT '1',
  `precio_unitario` decimal(10,2) NOT NULL,
  `talla` enum('S','M','L','XL') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `texto_personalizado` text COLLATE utf8mb4_unicode_ci,
  `imagen_personalizada` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_pp_pedido` (`pedido_id`),
  KEY `fk_pp_producto` (`producto_id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `pedido_productos`
--

INSERT INTO `pedido_productos` (`id`, `pedido_id`, `producto_id`, `cantidad`, `precio_unitario`, `talla`, `color`, `texto_personalizado`, `imagen_personalizada`) VALUES
(1, 2, 2, 1, 39.99, NULL, NULL, NULL, NULL),
(2, 2, 1, 1, 19.99, NULL, NULL, NULL, NULL),
(3, 2, 3, 1, 14.99, NULL, NULL, NULL, NULL),
(4, 7, 3, 1, 14.99, NULL, NULL, NULL, NULL),
(5, 8, 3, 1, 14.99, NULL, NULL, NULL, NULL),
(6, 9, 3, 1, 14.99, NULL, NULL, NULL, NULL),
(7, 10, 2, 1, 39.99, NULL, NULL, NULL, NULL),
(8, 11, 2, 1, 39.99, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

DROP TABLE IF EXISTS `productos`;
CREATE TABLE IF NOT EXISTS `productos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` text COLLATE utf8mb4_unicode_ci,
  `precio` decimal(10,2) NOT NULL,
  `imagen` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `categoria` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stock` int DEFAULT '0',
  `activo` tinyint(1) DEFAULT '1',
  `permite_personalizacion` tinyint(1) DEFAULT '0',
  `permite_imagen` tinyint(1) DEFAULT '0',
  `creado_en` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `descripcion`, `precio`, `imagen`, `categoria`, `stock`, `activo`, `permite_personalizacion`, `permite_imagen`, `creado_en`) VALUES
(1, 'Camiseta Básica Blanca', 'Camiseta de algodón personalizable', 19.99, 'camiseta-blanca.jpg', 'Hombre', 100, 1, 1, 1, '2026-06-03 18:43:18'),
(2, 'Sudadera Negra', 'Sudadera premium', 39.99, 'sudadera-negra.jpg', 'Mujer', 50, 1, 1, 1, '2026-06-03 18:43:18'),
(3, 'Bufanda Yoku', 'Budanda oficial Yoku', 14.99, 'bufanda-beige.jpg', 'Accesorio', 75, 1, 0, 0, '2026-06-03 18:43:18'),
(4, 'Diseño personalizado', 'Producto personalizado por el usuario', 19.99, 'camiseta-basica.jpg', 'personalizado', 9999, 1, 0, 0, '2026-06-03 18:47:17');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rol` enum('usuario','trabajador','admin') COLLATE utf8mb4_unicode_ci DEFAULT 'usuario',
  `activo` tinyint(1) DEFAULT '1',
  `creado_en` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `email`, `password`, `rol`, `activo`, `creado_en`) VALUES
(1, 'Administrador', 'admin@yoku.com', '$2y$10$1rNf0N5wP4J1Q4vK0d0lY.4nZL2i4xK1N7oGv8j8W9wY9vG4f0v0K', 'admin', 1, '2026-06-03 18:43:18'),
(2, 'Pepe', 'pepe@pepe.com', '$2y$10$B81wBiI8kg4.j7o2wxvDQe0C1B..l9AgVrJQLWgw4X01NxzVsYxqi', 'usuario', 1, '2026-06-03 18:43:59');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
