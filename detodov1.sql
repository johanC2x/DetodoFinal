-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-04-2015 a las 08:09:28
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
  `descripcion` varchar(30) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;

--
-- Volcado de datos para la tabla `archivo`
--

INSERT INTO `archivo` (`idarchivo`, `usuario_idusuario`, `codigo_idcodigo`, `nombre`, `descripcion`) VALUES
(7, 1, 1, 'Recuerdo', 'subidas/tk_1.jpg'),
(21, 1, 2, 'Destino2', 'subidas/tk_3.jpeg'),
(23, 1, 1, 'Destino 3', 'subidas/tk_2.jpeg'),
(26, 1, 1, 'Naruto', 'subidas/tk_4.jpeg'),
(28, 1, 1, 'Bleach', 'subidas/tk_5.jpeg'),
(29, 1, 1, 'FMA', 'subidas/tk_6.jpeg');

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
-- Estructura de tabla para la tabla `enlace`
--

CREATE TABLE IF NOT EXISTS `enlace` (
`idenlace` int(10) unsigned NOT NULL,
  `usuario_idusuario` int(10) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `post`
--

CREATE TABLE IF NOT EXISTS `post` (
`idpost` int(10) unsigned NOT NULL,
  `usuario_idusuario` int(10) unsigned NOT NULL,
  `codigo_idcodigo` int(10) unsigned NOT NULL,
  `titulo` varchar(30) DEFAULT NULL,
  `descripcion` varchar(30) DEFAULT NULL,
  `flgpost` bit(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
  `direccion` varchar(30) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idusuario`, `nombre`, `apepat`, `apemat`, `edad`, `nickname`, `contrasenia`, `flgstatus`, `direccion`) VALUES
(1, 'johan', 'Cañari', 'Huamani', 21, 'johan', '123456', b'1', '1'),
(2, 'joel', 'Espinoza', 'Huamani', 25, 'joel', '123456', b'1', '1'),
(3, 'ana', 'Suarez', 'Peña', 25, 'ana', '123456', b'1', 'Villa Maria del Triunfo'),
(4, 'Fernando', 'Rodriguez', 'Espino', 26, 'Fernando', '123456', b'1', 'Villa Maria del Triunfo');

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
-- Indices de la tabla `enlace`
--
ALTER TABLE `enlace`
 ADD PRIMARY KEY (`idenlace`,`usuario_idusuario`), ADD KEY `enlace_FKIndex1` (`usuario_idusuario`);

--
-- Indices de la tabla `post`
--
ALTER TABLE `post`
 ADD PRIMARY KEY (`idpost`,`usuario_idusuario`,`codigo_idcodigo`), ADD KEY `post_FKIndex1` (`usuario_idusuario`), ADD KEY `post_FKIndex2` (`codigo_idcodigo`);

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
MODIFY `idarchivo` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=30;
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
-- AUTO_INCREMENT de la tabla `enlace`
--
ALTER TABLE `enlace`
MODIFY `idenlace` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `post`
--
ALTER TABLE `post`
MODIFY `idpost` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `solicitudes`
--
ALTER TABLE `solicitudes`
MODIFY `idsolicitudes` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
MODIFY `idusuario` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
