-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-05-2015 a las 05:55:40
-- Versión del servidor: 5.5.39
-- Versión de PHP: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `detodo`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actividad`
--

CREATE TABLE IF NOT EXISTS `actividad` (
`idactividad` int(10) unsigned NOT NULL,
  `usuario_idusuario` int(10) unsigned NOT NULL,
  `archivo_codigo_idcodigo` int(10) unsigned NOT NULL,
  `archivo_usuario_idusuario` int(10) unsigned NOT NULL,
  `archivo_idarchivo` int(10) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `archivo`
--

CREATE TABLE IF NOT EXISTS `archivo` (
`idarchivo` int(10) unsigned NOT NULL,
  `usuario_idusuario` int(10) unsigned NOT NULL,
  `codigo_idcodigo` int(10) unsigned NOT NULL,
  `nombre` varchar(30) DEFAULT NULL,
  `descripcion` varchar(30) DEFAULT NULL,
  `creaFecha` date DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;

--
-- Volcado de datos para la tabla `archivo`
--

INSERT INTO `archivo` (`idarchivo`, `usuario_idusuario`, `codigo_idcodigo`, `nombre`, `descripcion`, `creaFecha`) VALUES
(7, 1, 1, 'Recuerdo', 'subidas/tk_1.jpg', '2015-05-05'),
(21, 1, 2, 'Destino2', 'subidas/tk_3.jpeg', '2015-05-20'),
(23, 1, 1, 'Destino 3', 'subidas/tk_2.jpeg', '2015-05-22'),
(26, 1, 1, 'Naruto', 'subidas/tk_4.jpeg', '2015-05-08'),
(28, 1, 1, 'Bleach', 'subidas/tk_5.jpeg', '2015-05-22'),
(29, 1, 1, 'FMA', 'subidas/tk_6.jpeg', '2015-05-21'),
(30, 4, 1, 'Bleach', 'subidas/tk_5.jpeg', '2015-05-21'),
(31, 4, 1, 'Ruby', 'subidas/RoR.jpeg', '2015-05-15'),
(32, 1, 1, 'DeathNote', 'subidas/tk_7.jpeg', '2015-05-01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `codigo`
--

CREATE TABLE IF NOT EXISTS `codigo` (
`idcodigo` int(10) unsigned NOT NULL,
  `codigo` varchar(30) DEFAULT NULL,
  `descripcion` varchar(30) DEFAULT NULL,
  `creaFecha` date NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `codigo`
--

INSERT INTO `codigo` (`idcodigo`, `codigo`, `descripcion`, `creaFecha`) VALUES
(1, 'tipoArchivo', 'imagen', '2015-04-18'),
(2, 'tipoArchivo', 'archivo comprimido(RAR)', '2015-04-18'),
(3, 'tipoArchivo', 'archivo Zipiado(ZIP)', '2015-04-18'),
(4, 'tipoSolicitud', 'Solicitud de Inscripcion', '2015-04-18'),
(5, 'tipoPost', 'Informacion', '2015-04-19'),
(6, 'tipoPost', 'Entretenimiento', '2015-04-19'),
(7, 'tipoPost', 'Deporte', '2015-04-19');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compartir`
--

CREATE TABLE IF NOT EXISTS `compartir` (
`idcompartir` int(10) unsigned NOT NULL,
  `usuario_idusuario` int(10) unsigned NOT NULL,
  `post_codigo_idcodigo` int(10) unsigned NOT NULL,
  `post_usuario_idusuario` int(10) unsigned NOT NULL,
  `post_idpost` int(10) unsigned NOT NULL,
  `archivo_codigo_idcodigo` int(10) unsigned NOT NULL,
  `archivo_usuario_idusuario` int(10) unsigned NOT NULL,
  `archivo_idarchivo` int(10) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `conversacion`
--

CREATE TABLE IF NOT EXISTS `conversacion` (
`idCon` int(11) NOT NULL,
  `mensaje` varchar(500) DEFAULT NULL,
  `idUsuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `enlace`
--

CREATE TABLE IF NOT EXISTS `enlace` (
`idenlace` int(10) unsigned NOT NULL,
  `usuario_idusuario` int(10) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `liker`
--

CREATE TABLE IF NOT EXISTS `liker` (
`idLike` int(11) NOT NULL,
  `flgLike` bit(1) DEFAULT NULL,
  `idarchivo` int(11) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Volcado de datos para la tabla `liker`
--

INSERT INTO `liker` (`idLike`, `flgLike`, `idarchivo`) VALUES
(1, b'1', 7),
(2, b'1', 7),
(3, b'1', 7),
(4, b'1', 7),
(5, b'1', 7),
(6, b'1', 7),
(7, b'1', 7),
(8, b'1', 7),
(9, b'1', 7),
(10, b'1', 7),
(11, b'1', 7),
(24, b'1', 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `post`
--

CREATE TABLE IF NOT EXISTS `post` (
`idpost` int(10) unsigned NOT NULL,
  `usuario_idusuario` int(10) unsigned NOT NULL,
  `descripcion` varchar(200) DEFAULT NULL,
  `flgpost` bit(1) DEFAULT NULL,
  `idArchivo` int(11) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Volcado de datos para la tabla `post`
--

INSERT INTO `post` (`idpost`, `usuario_idusuario`, `descripcion`, `flgpost`, `idArchivo`) VALUES
(1, 1, 'Hola', b'1', 7),
(2, 1, 'Como Estas', b'1', 7),
(3, 1, 'Que tal', b'1', 7),
(6, 1, 'Buenas Imagenes', b'1', 7),
(12, 1, 'Esa es una buena imagen', b'1', 7),
(13, 1, 'Buena Imagen', b'1', 7),
(14, 1, 'Genial Imagen', b'1', 7),
(15, 1, 'Genial Imagen', b'1', 23),
(16, 2, 'jhajajajajajjaja\r\n', b'1', 7),
(17, 2, 'quququuquq', b'1', 7),
(18, 1, 'Ese es un buen Ichigo', b'1', 28),
(19, 1, 'Buena Imagen', b'1', 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitudes`
--

CREATE TABLE IF NOT EXISTS `solicitudes` (
`idsolicitudes` int(10) unsigned NOT NULL,
  `usuario_idusuario` int(10) unsigned NOT NULL,
  `idtiposolicitud` int(10) unsigned DEFAULT NULL,
  `flgstatus` bit(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
`idusuario` int(10) unsigned NOT NULL,
  `nombre` varchar(30) DEFAULT NULL,
  `apepat` varchar(30) DEFAULT NULL,
  `apemat` varchar(30) DEFAULT NULL,
  `edad` int(10) unsigned DEFAULT NULL,
  `nickname` varchar(30) DEFAULT NULL,
  `contrasenia` varchar(30) DEFAULT NULL,
  `flgstatus` bit(1) DEFAULT NULL,
  `direccion` varchar(30) DEFAULT NULL,
  `flgActivo` bit(1) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idusuario`, `nombre`, `apepat`, `apemat`, `edad`, `nickname`, `contrasenia`, `flgstatus`, `direccion`, `flgActivo`) VALUES
(1, 'johan', 'Cañari', 'Huamani', 21, 'johan', '123456', b'1', '1', b'1'),
(2, 'joel', 'Espinoza', 'Huamani', 25, 'joel', '123456', b'1', '1', b'1'),
(3, 'ana', 'Suarez', 'Peña', 25, 'ana', '123456', b'1', 'Villa Maria del Triunfo', NULL),
(4, 'Fernando', 'Rodriguez', 'Espino', 26, 'Fernando', '123456', b'1', 'Villa Maria del Triunfo', b'0'),
(5, 'frits', 'Inca ', 'Damian', 30, 'padre', '123456', b'1', 'San Bartolo', b'0'),
(6, 'Juan', 'Perez', 'casa', 21, 'Juan', '123456', b'1', 'Villa Maria del Triunfo', NULL),
(7, 'Joel Yener', 'Espinoza ', 'Huamani', 25, 'joel', '123456', b'1', 'Villa El Salvador', NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `actividad`
--
ALTER TABLE `actividad`
 ADD PRIMARY KEY (`idactividad`,`usuario_idusuario`,`archivo_codigo_idcodigo`,`archivo_usuario_idusuario`,`archivo_idarchivo`), ADD KEY `actividad_FKIndex1` (`usuario_idusuario`), ADD KEY `actividad_FKIndex2` (`archivo_idarchivo`,`archivo_usuario_idusuario`,`archivo_codigo_idcodigo`);

--
-- Indices de la tabla `archivo`
--
ALTER TABLE `archivo`
 ADD PRIMARY KEY (`idarchivo`,`usuario_idusuario`,`codigo_idcodigo`), ADD KEY `archivo_FKIndex1` (`usuario_idusuario`), ADD KEY `archivo_FKIndex2` (`codigo_idcodigo`);

--
-- Indices de la tabla `codigo`
--
ALTER TABLE `codigo`
 ADD PRIMARY KEY (`idcodigo`);

--
-- Indices de la tabla `compartir`
--
ALTER TABLE `compartir`
 ADD PRIMARY KEY (`idcompartir`,`usuario_idusuario`,`post_codigo_idcodigo`,`post_usuario_idusuario`,`post_idpost`,`archivo_codigo_idcodigo`,`archivo_usuario_idusuario`,`archivo_idarchivo`), ADD KEY `compartir_FKIndex1` (`usuario_idusuario`), ADD KEY `compartir_FKIndex2` (`post_idpost`,`post_usuario_idusuario`,`post_codigo_idcodigo`), ADD KEY `compartir_FKIndex3` (`archivo_idarchivo`,`archivo_usuario_idusuario`,`archivo_codigo_idcodigo`);

--
-- Indices de la tabla `conversacion`
--
ALTER TABLE `conversacion`
 ADD PRIMARY KEY (`idCon`);

--
-- Indices de la tabla `enlace`
--
ALTER TABLE `enlace`
 ADD PRIMARY KEY (`idenlace`,`usuario_idusuario`), ADD KEY `enlace_FKIndex1` (`usuario_idusuario`);

--
-- Indices de la tabla `liker`
--
ALTER TABLE `liker`
 ADD PRIMARY KEY (`idLike`);

--
-- Indices de la tabla `post`
--
ALTER TABLE `post`
 ADD PRIMARY KEY (`idpost`,`usuario_idusuario`), ADD KEY `post_FKIndex1` (`usuario_idusuario`);

--
-- Indices de la tabla `solicitudes`
--
ALTER TABLE `solicitudes`
 ADD PRIMARY KEY (`idsolicitudes`,`usuario_idusuario`), ADD KEY `solicitudes_FKIndex1` (`usuario_idusuario`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
 ADD PRIMARY KEY (`idusuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `actividad`
--
ALTER TABLE `actividad`
MODIFY `idactividad` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `archivo`
--
ALTER TABLE `archivo`
MODIFY `idarchivo` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT de la tabla `codigo`
--
ALTER TABLE `codigo`
MODIFY `idcodigo` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `compartir`
--
ALTER TABLE `compartir`
MODIFY `idcompartir` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `conversacion`
--
ALTER TABLE `conversacion`
MODIFY `idCon` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `enlace`
--
ALTER TABLE `enlace`
MODIFY `idenlace` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `liker`
--
ALTER TABLE `liker`
MODIFY `idLike` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT de la tabla `post`
--
ALTER TABLE `post`
MODIFY `idpost` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT de la tabla `solicitudes`
--
ALTER TABLE `solicitudes`
MODIFY `idsolicitudes` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
MODIFY `idusuario` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
