-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-11-2017 a las 20:40:44
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
(1, 2, '2017-07-13', 'Publicaciones'),
(2, 4, '2017-07-13', 'Publicaciones');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `amigos`
--

CREATE TABLE `amigos` (
  `id_ami` int(11) NOT NULL,
  `de` int(11) NOT NULL,
  `para` int(11) NOT NULL,
  `fecha` datetime NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `amigos`
--

INSERT INTO `amigos` (`id_ami`, `de`, `para`, `fecha`, `estado`) VALUES
(46, 2, 1, '2017-07-13 18:18:51', 0),
(49, 3, 1, '2017-07-13 18:37:35', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `chats`
--

CREATE TABLE `chats` (
  `id_cha` int(11) NOT NULL,
  `id_cch` int(11) NOT NULL,
  `de` int(11) NOT NULL,
  `para` int(11) NOT NULL,
  `mensaje` varchar(500) NOT NULL,
  `fecha` datetime NOT NULL,
  `leido` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `chats`
--

INSERT INTO `chats` (`id_cha`, `id_cch`, `de`, `para`, `mensaje`, `fecha`, `leido`) VALUES
(15, 1, 1, 4, 'Hola', '2017-07-21 19:33:57', 1),
(16, 1, 1, 4, 'Hola de nuevo', '2017-07-21 19:34:44', 1),
(17, 1, 1, 4, 'que tal?', '2017-07-21 19:36:02', 1),
(18, 2, 1, 2, 'Que tal andres?', '2017-07-21 19:36:30', 1),
(19, 3, 1, 3, 'Hola carlos que tal?', '2017-07-21 19:42:23', 1),
(20, 3, 3, 1, 'Hola tuntoriales un gusto conocerte', '2017-07-21 19:42:50', 1),
(21, 3, 3, 1, 'Subve mas videos porfavor', '2017-07-21 19:43:17', 1),
(22, 3, 1, 3, 'Buenas', '2017-07-21 19:50:03', 1),
(23, 3, 1, 3, 'Sic laro subire mas videos', '2017-07-21 19:50:25', 1),
(24, 3, 3, 1, 'Chao', '2017-07-21 19:51:34', 1),
(25, 2, 2, 1, 'Hola amigo andres porque no me respondes', '2017-07-21 20:00:11', 1),
(26, 3, 3, 1, 'Hola', '2017-07-21 20:10:00', 1),
(27, 3, 1, 3, 'Hola carlos', '2017-07-21 20:10:33', 1),
(28, 3, 1, 3, 'Hola carlos', '2017-07-21 20:14:40', 1),
(29, 1, 1, 4, 'Hola bro que tal?', '2017-10-28 10:18:55', 1),
(30, 1, 4, 1, 'Hola bien y tu', '2017-10-28 10:19:58', 0);

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
(1, 2, 'Great post!', '2017-07-13 16:58:29', 1),
(2, 1, 'Bonito paisaje :D', '2017-07-13 17:20:58', 2),
(3, 4, 'Lindas casas ', '2017-07-13 17:21:27', 2),
(4, 4, 'Si', '2017-07-13 17:21:53', 1),
(5, 1, 'Thanks :D', '2017-07-13 17:22:11', 1),
(6, 1, 'Nice', '2017-07-13 17:25:01', 3),
(7, 3, 'Que tal tuntoriales', '2017-07-13 18:37:55', 1),
(8, 1, 'Probando esto', '2017-08-11 13:01:54', 4),
(9, 1, 'fgf', '2017-08-11 13:10:50', 3),
(10, 1, 'sfsd', '2017-08-11 13:11:06', 4),
(11, 1, 'fdfs', '2017-08-11 13:15:06', 4),
(12, 1, 'fdfssgrs', '2017-08-11 13:15:08', 4),
(13, 1, 'ddfd', '2017-08-11 13:16:16', 4),
(14, 1, 'fghfdh', '2017-08-11 13:20:34', 4),
(15, 1, 'jaja', '2017-08-11 13:21:04', 4),
(16, 0, '1dfdf', '2017-08-11 13:22:38', 4),
(17, 1, 'que tal', '2017-08-11 13:25:13', 3),
(18, 1, 'aaa', '2017-08-11 13:28:32', 4),
(19, 1, 'dfd', '2017-08-11 13:30:46', 4),
(20, 1, 'a', '2017-08-11 13:30:51', 3),
(21, 1, 'a', '2017-08-11 13:31:30', 4),
(22, 1, 'sadas', '2017-08-11 13:31:52', 4),
(23, 1, 'e', '2017-08-11 13:33:32', 4),
(24, 1, 'que tal', '2017-08-11 13:33:47', 4),
(25, 1, 'amigos', '2017-08-11 13:33:50', 4),
(26, 1, 'ya', '2017-09-25 08:42:35', 4),
(27, 1, 'yaps', '2017-09-25 08:42:36', 4),
(28, 1, 'Hola tuntoriales', '2017-10-23 14:39:05', 4),
(29, 1, 'hola', '2017-10-23 14:46:07', 4),
(30, 3, 'Hola que tal tunto', '2017-10-23 14:46:47', 4),
(31, 1, 'hola', '2017-10-23 14:51:14', 4),
(32, 1, 'hola', '2017-10-28 10:18:15', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `c_chats`
--

CREATE TABLE `c_chats` (
  `id_cch` int(11) NOT NULL,
  `de` int(11) NOT NULL,
  `para` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `c_chats`
--

INSERT INTO `c_chats` (`id_cch`, `de`, `para`) VALUES
(1, 1, 4),
(2, 1, 2),
(3, 1, 3);

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
(1, 2, '2017-07-13', '2417BADC5A9B7.jpg', 1, 2),
(2, 4, '2017-07-13', '31DDCCA2FA986.jpg', 2, 3);

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
(1, 2, 1, '2017-07-13 16:51:34'),
(2, 2, 2, '2017-07-13 17:20:08'),
(3, 1, 2, '2017-07-13 17:20:51'),
(4, 4, 2, '2017-07-13 17:21:20'),
(5, 1, 1, '2017-07-13 17:22:19'),
(6, 4, 3, '2017-07-13 17:24:48'),
(9, 1, 3, '2017-07-21 14:50:50');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notificaciones`
--

CREATE TABLE `notificaciones` (
  `id_not` int(11) NOT NULL,
  `user1` int(11) NOT NULL,
  `user2` int(11) NOT NULL,
  `tipo` varchar(100) NOT NULL,
  `leido` int(11) NOT NULL,
  `fecha` datetime NOT NULL,
  `id_pub` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `notificaciones`
--

INSERT INTO `notificaciones` (`id_not`, `user1`, `user2`, `tipo`, `leido`, `fecha`, `id_pub`) VALUES
(4, 1, 1, 'ha comentado', 0, '2017-10-23 14:51:14', 4),
(5, 1, 4, 'ha comentado', 0, '2017-10-28 10:18:15', 3);

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
(1, 1, '2017-07-13 16:47:39', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 0, 0, 1, 2),
(2, 2, '2017-07-13 17:20:05', 'Disfrutando', 1, 1, 1, 3),
(3, 4, '2017-07-13 17:24:44', 'Breakfast :D', 2, 2, 1, 2),
(4, 1, '2017-08-11 13:00:47', 'Probando esto ', 0, 0, 1, 0);

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
  `verificado` int(11) NOT NULL DEFAULT '0',
  `privada` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_use`, `nombre`, `usuario`, `contrasena`, `nacimiento`, `avatar`, `email`, `sexo`, `fecha_reg`, `verificado`, `privada`) VALUES
(1, 'Tuntoriales', 'tuntoriales', '4d186321c1a7f0f354b297e8914ab240', '1992-06-25', '1.jpg', 'tunto@tunto.com', 'H', '2017-06-02 16:48:47', 1, 1),
(2, 'AndrÃ©s Gutierrez', 'andres.gutierrez', '4d186321c1a7f0f354b297e8914ab240', '0000-00-00', '2.jpg', 'andres@andres.com', 'H', '2017-06-02 16:59:10', 0, 0),
(3, 'Carlos Benjumea', 'carlos', '4d186321c1a7f0f354b297e8914ab240', '0000-00-00', '3.jpg', 'carlos@carlos.com', 'H', '2017-06-02 16:59:46', 0, 1),
(4, 'Mario Gaviria', 'mariogav', '4d186321c1a7f0f354b297e8914ab240', '0000-00-00', '4.jpg', 'mario@mario.com', 'H', '2017-06-02 17:01:58', 0, 0),
(5, 'nuevousuario', 'nuevousuario', '4d186321c1a7f0f354b297e8914ab240', '0000-00-00', 'defect.jpg', 'nuevo@n.com', '', '2017-06-04 14:22:04', 0, 0),
(6, 'Tuntos', 'tunto', '4d186321c1a7f0f354b297e8914ab240', '0000-00-00', 'defect.jpg', 'tunto2@tunto.com', '', '2017-06-24 19:33:06', 0, 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `albumes`
--
ALTER TABLE `albumes`
  ADD PRIMARY KEY (`id_alb`);

--
-- Indices de la tabla `amigos`
--
ALTER TABLE `amigos`
  ADD PRIMARY KEY (`id_ami`);

--
-- Indices de la tabla `chats`
--
ALTER TABLE `chats`
  ADD PRIMARY KEY (`id_cha`);

--
-- Indices de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`id_com`);

--
-- Indices de la tabla `c_chats`
--
ALTER TABLE `c_chats`
  ADD PRIMARY KEY (`id_cch`);

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
-- Indices de la tabla `notificaciones`
--
ALTER TABLE `notificaciones`
  ADD PRIMARY KEY (`id_not`);

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
  MODIFY `id_alb` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `amigos`
--
ALTER TABLE `amigos`
  MODIFY `id_ami` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
--
-- AUTO_INCREMENT de la tabla `chats`
--
ALTER TABLE `chats`
  MODIFY `id_cha` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `id_com` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT de la tabla `c_chats`
--
ALTER TABLE `c_chats`
  MODIFY `id_cch` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `fotos`
--
ALTER TABLE `fotos`
  MODIFY `id_fot` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `likes`
--
ALTER TABLE `likes`
  MODIFY `id_lik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `notificaciones`
--
ALTER TABLE `notificaciones`
  MODIFY `id_not` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `publicaciones`
--
ALTER TABLE `publicaciones`
  MODIFY `id_pub` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_use` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
