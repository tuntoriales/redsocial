-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-07-2017 a las 22:48:39
-- Versión del servidor: 10.1.19-MariaDB
-- Versión de PHP: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `redsocial`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `albumes`
--

CREATE TABLE `albumes` (
  `id_alb` int(11) NOT NULL,
  `usuario` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `nombre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `albumes`
--

INSERT INTO `albumes` (`id_alb`, `usuario`, `fecha`, `nombre`) VALUES
(7, 1, '2017-06-24', 'Publicaciones');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE `comentarios` (
  `id_com` int(11) NOT NULL,
  `usuario` int(11) NOT NULL,
  `comentario` text NOT NULL,
  `fecha` datetime NOT NULL,
  `publicacion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `comentarios`
--

INSERT INTO `comentarios` (`id_com`, `usuario`, `comentario`, `fecha`, `publicacion`) VALUES
(90, 1, 'Hola que gran post', '2017-06-24 19:41:23', 89),
(91, 1, 'Hola de nuevo', '2017-06-24 19:41:46', 89),
(92, 1, 'Hahahajaksa', '2017-06-24 19:41:52', 90),
(93, 1, 'Hola', '2017-06-24 19:43:31', 89),
(94, 1, 'Esto es de mentiras', '2017-06-24 19:44:46', 90),
(95, 3, 'Que bonita foto', '2017-06-24 19:48:36', 91),
(96, 3, 'jaja', '2017-06-24 19:48:42', 90),
(97, 3, 'je', '2017-06-24 23:57:33', 89),
(98, 1, 'Prueba', '2017-06-30 21:39:24', 91);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fotos`
--

CREATE TABLE `fotos` (
  `id_fot` int(11) NOT NULL,
  `usuario` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `ruta` varchar(200) NOT NULL,
  `album` int(11) NOT NULL,
  `publicacion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `fotos`
--

INSERT INTO `fotos` (`id_fot`, `usuario`, `fecha`, `ruta`, `album`, `publicacion`) VALUES
(20, 1, '2017-06-24', '9181175B91F8B3.jpg', 7, 91);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `likes`
--

CREATE TABLE `likes` (
  `id_lik` int(11) NOT NULL,
  `usuario` int(11) NOT NULL,
  `post` int(11) NOT NULL,
  `fecha` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `likes`
--

INSERT INTO `likes` (`id_lik`, `usuario`, `post`, `fecha`) VALUES
(13, 1, 90, '2017-07-01 00:18:05'),
(14, 1, 91, '2017-07-01 00:18:07');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `publicaciones`
--

CREATE TABLE `publicaciones` (
  `id_pub` int(11) NOT NULL,
  `usuario` int(11) NOT NULL,
  `fecha` datetime NOT NULL,
  `contenido` text NOT NULL,
  `imagen` int(11) NOT NULL,
  `album` int(11) NOT NULL,
  `comentarios` int(11) NOT NULL,
  `likes` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `publicaciones`
--

INSERT INTO `publicaciones` (`id_pub`, `usuario`, `fecha`, `contenido`, `imagen`, `album`, `comentarios`, `likes`) VALUES
(89, 1, '2017-06-24 19:40:28', 'Hola', 0, 0, 1, 0),
(90, 1, '2017-06-24 19:41:40', 'Otra publicacion', 0, 0, 1, 10),
(91, 1, '2017-06-24 19:48:23', 'Publicar', 20, 7, 1, 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_use` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `usuario` varchar(100) NOT NULL,
  `contrasena` varchar(100) NOT NULL,
  `nacimiento` date NOT NULL,
  `avatar` varchar(200) NOT NULL,
  `email` varchar(100) NOT NULL,
  `sexo` varchar(100) NOT NULL,
  `fecha_reg` datetime NOT NULL,
  `verificado` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_use`, `nombre`, `usuario`, `contrasena`, `nacimiento`, `avatar`, `email`, `sexo`, `fecha_reg`, `verificado`) VALUES
(1, 'Tuntoriales', 'tuntoriales', '4d186321c1a7f0f354b297e8914ab240', '1992-06-25', '1.jpg', 'tunto@tunto.com', 'H', '2017-06-02 16:48:47', 1),
(2, 'AndrÃ©s Gutierrez', 'andres.gutierrez', '4d186321c1a7f0f354b297e8914ab240', '0000-00-00', 'defect.jpg', 'andres@andres.com', '', '2017-06-02 16:59:10', 0),
(3, 'Carlos Benjumea', 'carlos', '4d186321c1a7f0f354b297e8914ab240', '0000-00-00', '3.jpg', 'carlos@carlos.com', 'H', '2017-06-02 16:59:46', 0),
(4, 'Mario Gaviria', 'mariogav', '4d186321c1a7f0f354b297e8914ab240', '0000-00-00', 'defect.jpg', 'mario@mario.com', '', '2017-06-02 17:01:58', 0),
(5, 'nuevousuario', 'nuevousuario', '4d186321c1a7f0f354b297e8914ab240', '0000-00-00', 'defect.jpg', 'nuevo@n.com', '', '2017-06-04 14:22:04', 0),
(6, 'Tuntos', 'tunto', '4d186321c1a7f0f354b297e8914ab240', '0000-00-00', 'defect.jpg', 'tunto2@tunto.com', '', '2017-06-24 19:33:06', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `albumes`
--
ALTER TABLE `albumes`
  ADD PRIMARY KEY (`id_alb`);

--
-- Indices de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`id_com`);

--
-- Indices de la tabla `fotos`
--
ALTER TABLE `fotos`
  ADD PRIMARY KEY (`id_fot`);

--
-- Indices de la tabla `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id_lik`);

--
-- Indices de la tabla `publicaciones`
--
ALTER TABLE `publicaciones`
  ADD PRIMARY KEY (`id_pub`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_use`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `albumes`
--
ALTER TABLE `albumes`
  MODIFY `id_alb` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `id_com` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;
--
-- AUTO_INCREMENT de la tabla `fotos`
--
ALTER TABLE `fotos`
  MODIFY `id_fot` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT de la tabla `likes`
--
ALTER TABLE `likes`
  MODIFY `id_lik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT de la tabla `publicaciones`
--
ALTER TABLE `publicaciones`
  MODIFY `id_pub` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_use` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
