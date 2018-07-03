-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-07-2018 a las 00:19:47
-- Versión del servidor: 10.1.33-MariaDB
-- Versión de PHP: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `lonco`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_checklist`
--

CREATE TABLE `tbl_checklist` (
  `idCheckList` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_checklist`
--

INSERT INTO `tbl_checklist` (`idCheckList`, `nombre`) VALUES
(1, 'Checklist inicial');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_cliente`
--

CREATE TABLE `tbl_cliente` (
  `idCliente` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_cl_section`
--

CREATE TABLE `tbl_cl_section` (
  `idSeccion` int(11) NOT NULL,
  `idCheckList` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `Orden` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_cl_section`
--

INSERT INTO `tbl_cl_section` (`idSeccion`, `idCheckList`, `nombre`, `Orden`) VALUES
(1, 1, 'Requerimientos de Definición', 1),
(2, 1, 'Requerimientos de Planificación', 2),
(3, 1, 'Del Cliente:', 3),
(4, 1, 'Requerimientos de RR.HH', 4),
(5, 1, 'Del Contrato', 5),
(6, 1, 'De Proveedores o Subcontratistas', 6),
(7, 1, 'Requerimientos Financieros', 7),
(8, 1, 'Del Proyecto o Servicio', 8),
(9, 1, 'Del equipo de proyecto o servicio:', 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_cl_s_pregunta`
--

CREATE TABLE `tbl_cl_s_pregunta` (
  `idPregunta` int(11) NOT NULL,
  `idSeccion` int(11) NOT NULL,
  `nombre` text NOT NULL,
  `orden` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_cl_s_pregunta`
--

INSERT INTO `tbl_cl_s_pregunta` (`idPregunta`, `idSeccion`, `nombre`, `orden`) VALUES
(1, 1, 'Están definidos los objetivos del Proyecto?', 1),
(2, 1, 'Están definidos claramente los alcances y limitaciones del proyecto?', 2),
(3, 1, 'Están definidas a acordadas con el cliente las fecha de inicio y termino del proyecto?', 3),
(4, 1, 'Esta definida y acordada con el cliente la metodología a utilizar durante el proyecto?', 4),
(5, 1, 'Están definidos y acordados con la alta Gcia. los riesgos Asociados al proyecto?', 5),
(6, 1, 'Está establecido y acordado el nuevo Base Line de Costos de Ejecución?', 6),
(7, 1, 'Están claramente definidos la frecuencia y los parámetros de control del proyecto y  acordados con la PMO?', 7),
(8, 2, 'Está elaborada y acordada la carta Gantt?', 1),
(9, 2, 'Están definidos los hitos de control del proyecto?', 2),
(10, 2, 'Están definidos los entregables del proyecto y acordados con el Cliente?', 3),
(11, 2, 'Esta documentada la Aceptación formal del plan por todos los involucrados en el proyecto?', 4),
(12, 2, 'Se realizo la citación para el Kick Off?', 5),
(13, 3, 'Es la primera vez que se trabaja con este cliente?', 1),
(14, 3, 'Han existido problemas en algún proyecto anterior con este cliente? o es un cliente de naturaleza problemática, intrínsecos a su sector o al tipo de negocio?', 2),
(15, 3, 'El cliente puede sufrir cambios organizativos o tecnológicos durante el desarrollo del proyecto?', 3),
(16, 3, 'Se trata de un proyecto o servicio crítico para el cliente? o un retraso en la planificación puede afectar de forma critica a su negocio?', 4),
(17, 3, 'Tiene el cliente experiencia en contratación de proyectos o servicios de IT', 5),
(18, 3, 'Tenemos clara la organización interna del cliente, y están identificados los interlocutores con los que nos vamos a relacionar? Son los adecuados?', 6),
(19, 3, 'Para la realización de nuestro proyecto o servicio deberemos interrelacionarnos con otros proveedores del cliente, bien sea para integrar componentes de ellos, o enviarles los nuestros para que ellos los integren, o desarrollar partes en común?', 7),
(20, 4, 'Esta todo el personal ya contratado?', 1),
(21, 4, 'Si se requieren nuevas contrataciones, se informo a RR.HH?', 2),
(22, 4, 'Están definidas (si son requeridas) las subcontrataciones por servicio?', 3),
(23, 4, 'Se requiere capacitación adicional ?', 4),
(24, 4, 'Si lo anterior es afirmativo, esta coordinada?', 5),
(25, 4, 'Esta definido el Personigrama?', 6),
(26, 4, 'Se informo a la PMO el Personigrama definido?', 7),
(27, 5, 'Esta la oferta formalmente aceptada y el contrato, si procede, firmado?', 1),
(28, 5, 'Se contempla algún tipo de Penalizaciones en el contrato? o hay algún tipo de condiciones contractuales no habituales?', 2),
(29, 5, 'Hay alguna duda respecto a si el alcance definido en el contrato refleja plenamente las expectativas reales del cliente sobre el proyecto o servicio?', 3),
(30, 5, 'Están todos los requerimientos y entregables claramente definidos e identificados en la oferta o en el contrato?\nLos SLAs han sido revisados, son asumibles y contemplados por todos los departamentos y proveedores implicados?', 4),
(31, 6, 'Hay partes críticas del proyecto que dependen de un subcontratista?', 1),
(32, 6, 'Están definidos los Proveedores y/ Contratistas? ', 2),
(33, 6, 'Si esto es Afirmativo, estos se encuentran homologados?', 3),
(34, 6, 'Hay alternativas viables en caso de que el subcontratista no cumpla sus compromisos en la forma y tiempo planificados?', 4),
(35, 6, 'Están formalmente cerrados los contratos con los subcontratistas, y cubren adecuadamente nuestras obligaciones con el cliente?', 5),
(36, 7, 'Esta levantado el caso de negocio de ejecución?', 1),
(37, 7, 'Se requiere Factoring, u otro instrumento?', 2),
(38, 7, 'Es necesario algún método de financiamiento externo del proyecto?', 3),
(39, 7, 'Están definidos los hitos de Facturación del proyecto?', 4),
(40, 7, 'Esta confirmado el Flujo de Caja del Proyecto?', 5),
(41, 8, 'Es la primera vez que se realiza un proyecto en este entorno de negocio?', 1),
(42, 8, 'Es la primera vez que se realiza un proyecto con esta tecnología?', 2),
(43, 8, 'Tiene el objeto del contrato una dificultad especialmente remarcable?', 3),
(44, 9, 'Hay el suficiente conocimiento del entorno de Aplicativo y Tecnológico por parte del personal asignado? Es suficiente su número y estará disponible en los plazos previstos?', 1),
(45, 9, 'Están disponibles todos los equipamientos, comunicaciones e infraestructuras necesarias?', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_garantia`
--

CREATE TABLE `tbl_garantia` (
  `idGarantia` int(11) NOT NULL,
  `idProyecto` int(11) NOT NULL,
  `fechaReserva` date NOT NULL,
  `monto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_gasto`
--

CREATE TABLE `tbl_gasto` (
  `idGasto` int(11) NOT NULL,
  `idProyecto` int(11) NOT NULL,
  `estado` int(11) NOT NULL,
  `descripcion` text NOT NULL,
  `idCategoria` int(11) NOT NULL,
  `coste` int(11) NOT NULL,
  `unidad` int(11) NOT NULL,
  `fecha` datetime NOT NULL,
  `costeTotal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_log`
--

CREATE TABLE `tbl_log` (
  `idLog` int(11) NOT NULL,
  `fecha` datetime NOT NULL,
  `accion` varchar(12) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `descripcion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_parametro`
--

CREATE TABLE `tbl_parametro` (
  `idParametro` int(11) NOT NULL,
  `tipo` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `habilitado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_perfil`
--

CREATE TABLE `tbl_perfil` (
  `idPerfil` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `habilitado` int(11) NOT NULL DEFAULT '1',
  `eliminado` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_perfil`
--

INSERT INTO `tbl_perfil` (`idPerfil`, `nombre`, `habilitado`, `eliminado`) VALUES
(1, 'Admin', 1, 0),
(2, 'Viewer', 1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_planning`
--

CREATE TABLE `tbl_planning` (
  `idPlanning` int(11) NOT NULL,
  `idProyecto` int(11) NOT NULL,
  `mesagno` varchar(6) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `tipo` int(11) NOT NULL,
  `previstas` int(11) NOT NULL,
  `realizadas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_ppo`
--

CREATE TABLE `tbl_ppo` (
  `idPPO` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `descripcion` text NOT NULL,
  `param1` int(11) NOT NULL,
  `param2` int(11) NOT NULL,
  `param3` int(11) NOT NULL,
  `orden` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_proyecto`
--

CREATE TABLE `tbl_proyecto` (
  `idProyecto` int(11) NOT NULL,
  `idCliente` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `cc` varchar(20) NOT NULL,
  `gerente` varchar(50) NOT NULL,
  `jefe` varchar(50) NOT NULL,
  `plazo` int(11) NOT NULL,
  `fechaInicio` date NOT NULL,
  `fechaTermino` date NOT NULL,
  `estadoCHK` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_proyecto`
--

INSERT INTO `tbl_proyecto` (`idProyecto`, `idCliente`, `nombre`, `cc`, `gerente`, `jefe`, `plazo`, `fechaInicio`, `fechaTermino`, `estadoCHK`) VALUES
(1, 0, '', '', '', '', 0, '0000-00-00', '0000-00-00', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_proyecto_ppo`
--

CREATE TABLE `tbl_proyecto_ppo` (
  `idProyecto` int(11) NOT NULL,
  `idPPO` int(11) NOT NULL,
  `monto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_proy_respuesta`
--

CREATE TABLE `tbl_proy_respuesta` (
  `idProyecto` int(11) NOT NULL,
  `idPregunta` int(11) NOT NULL,
  `respuesta` text NOT NULL,
  `comentario` text NOT NULL,
  `fecha` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_proy_respuesta`
--

INSERT INTO `tbl_proy_respuesta` (`idProyecto`, `idPregunta`, `respuesta`, `comentario`, `fecha`) VALUES
(1, 1, '', '', '0000-00-00 00:00:00'),
(1, 2, '', '', '0000-00-00 00:00:00'),
(1, 3, '', '', '0000-00-00 00:00:00'),
(1, 4, 'SI', 'respondida', '2018-07-01 23:34:00'),
(1, 5, '', '', '0000-00-00 00:00:00'),
(1, 6, '', '', '0000-00-00 00:00:00'),
(1, 7, '', '', '0000-00-00 00:00:00'),
(1, 8, '', '', '0000-00-00 00:00:00'),
(1, 9, 'NO', 'qwe', '2018-07-01 23:34:00'),
(1, 10, '', '', '0000-00-00 00:00:00'),
(1, 11, '', '', '0000-00-00 00:00:00'),
(1, 12, '', '', '0000-00-00 00:00:00'),
(1, 13, '', '', '0000-00-00 00:00:00'),
(1, 14, '', '', '0000-00-00 00:00:00'),
(1, 15, '', '', '0000-00-00 00:00:00'),
(1, 16, '', '', '0000-00-00 00:00:00'),
(1, 17, '', '', '0000-00-00 00:00:00'),
(1, 18, '', '', '0000-00-00 00:00:00'),
(1, 19, '', '', '0000-00-00 00:00:00'),
(1, 20, '', '', '0000-00-00 00:00:00'),
(1, 21, '', '', '0000-00-00 00:00:00'),
(1, 22, '', '', '0000-00-00 00:00:00'),
(1, 23, '', '', '0000-00-00 00:00:00'),
(1, 24, '', '', '0000-00-00 00:00:00'),
(1, 25, '', '', '0000-00-00 00:00:00'),
(1, 26, '', '', '0000-00-00 00:00:00'),
(1, 27, '', '', '0000-00-00 00:00:00'),
(1, 28, '', '', '0000-00-00 00:00:00'),
(1, 29, '', '', '0000-00-00 00:00:00'),
(1, 30, '', '', '0000-00-00 00:00:00'),
(1, 31, '', '', '0000-00-00 00:00:00'),
(1, 32, '', '', '0000-00-00 00:00:00'),
(1, 33, '', '', '0000-00-00 00:00:00'),
(1, 34, '', '', '0000-00-00 00:00:00'),
(1, 35, '', '', '0000-00-00 00:00:00'),
(1, 36, '', '', '0000-00-00 00:00:00'),
(1, 37, '', '', '0000-00-00 00:00:00'),
(1, 38, '', '', '0000-00-00 00:00:00'),
(1, 39, '', '', '0000-00-00 00:00:00'),
(1, 40, '', '', '0000-00-00 00:00:00'),
(1, 41, '', '', '0000-00-00 00:00:00'),
(1, 42, '', '', '0000-00-00 00:00:00'),
(1, 43, '', '', '0000-00-00 00:00:00'),
(1, 44, '', '', '0000-00-00 00:00:00'),
(1, 45, '', '', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_subriesgo`
--

CREATE TABLE `tbl_subriesgo` (
  `idSubRiesgo` int(11) NOT NULL,
  `idTipoRiesgo` int(11) NOT NULL,
  `descripcion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_tiporiesgo`
--

CREATE TABLE `tbl_tiporiesgo` (
  `idTipoRiesgo` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `habilitado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_usuario`
--

CREATE TABLE `tbl_usuario` (
  `mail` varchar(50) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `paterno` varchar(50) NOT NULL,
  `materno` varchar(50) NOT NULL,
  `idPerfil` int(11) NOT NULL,
  `tipo` varchar(1) NOT NULL,
  `password` varchar(80) NOT NULL,
  `habilitado` int(11) NOT NULL,
  `eliminado` int(11) NOT NULL,
  `valorHH` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_usuario`
--

INSERT INTO `tbl_usuario` (`mail`, `nombre`, `paterno`, `materno`, `idPerfil`, `tipo`, `password`, `habilitado`, `eliminado`, `valorHH`) VALUES
('rodrigo.amigo@connectis-gs.cl', 'Rodrigo', 'Amigo', 'MuÃ±oz', 1, 'P', '$2y$10$wTnYsQFzZfOyK6uPW/gp4eOLcYtfcly0uVg1WaYY7U3uw7CoiQLIO', 1, 0, 1000);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbl_checklist`
--
ALTER TABLE `tbl_checklist`
  ADD PRIMARY KEY (`idCheckList`);

--
-- Indices de la tabla `tbl_cliente`
--
ALTER TABLE `tbl_cliente`
  ADD PRIMARY KEY (`idCliente`);

--
-- Indices de la tabla `tbl_cl_section`
--
ALTER TABLE `tbl_cl_section`
  ADD PRIMARY KEY (`idSeccion`);

--
-- Indices de la tabla `tbl_cl_s_pregunta`
--
ALTER TABLE `tbl_cl_s_pregunta`
  ADD PRIMARY KEY (`idPregunta`);

--
-- Indices de la tabla `tbl_garantia`
--
ALTER TABLE `tbl_garantia`
  ADD PRIMARY KEY (`idGarantia`);

--
-- Indices de la tabla `tbl_gasto`
--
ALTER TABLE `tbl_gasto`
  ADD PRIMARY KEY (`idGasto`);

--
-- Indices de la tabla `tbl_log`
--
ALTER TABLE `tbl_log`
  ADD PRIMARY KEY (`idLog`);

--
-- Indices de la tabla `tbl_parametro`
--
ALTER TABLE `tbl_parametro`
  ADD PRIMARY KEY (`idParametro`);

--
-- Indices de la tabla `tbl_perfil`
--
ALTER TABLE `tbl_perfil`
  ADD PRIMARY KEY (`idPerfil`);

--
-- Indices de la tabla `tbl_planning`
--
ALTER TABLE `tbl_planning`
  ADD PRIMARY KEY (`idPlanning`);

--
-- Indices de la tabla `tbl_ppo`
--
ALTER TABLE `tbl_ppo`
  ADD PRIMARY KEY (`idPPO`);

--
-- Indices de la tabla `tbl_proyecto`
--
ALTER TABLE `tbl_proyecto`
  ADD PRIMARY KEY (`idProyecto`);

--
-- Indices de la tabla `tbl_subriesgo`
--
ALTER TABLE `tbl_subriesgo`
  ADD PRIMARY KEY (`idSubRiesgo`);

--
-- Indices de la tabla `tbl_tiporiesgo`
--
ALTER TABLE `tbl_tiporiesgo`
  ADD PRIMARY KEY (`idTipoRiesgo`);

--
-- Indices de la tabla `tbl_usuario`
--
ALTER TABLE `tbl_usuario`
  ADD PRIMARY KEY (`mail`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbl_checklist`
--
ALTER TABLE `tbl_checklist`
  MODIFY `idCheckList` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `tbl_cliente`
--
ALTER TABLE `tbl_cliente`
  MODIFY `idCliente` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbl_cl_section`
--
ALTER TABLE `tbl_cl_section`
  MODIFY `idSeccion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `tbl_cl_s_pregunta`
--
ALTER TABLE `tbl_cl_s_pregunta`
  MODIFY `idPregunta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT de la tabla `tbl_garantia`
--
ALTER TABLE `tbl_garantia`
  MODIFY `idGarantia` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbl_gasto`
--
ALTER TABLE `tbl_gasto`
  MODIFY `idGasto` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbl_log`
--
ALTER TABLE `tbl_log`
  MODIFY `idLog` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `tbl_parametro`
--
ALTER TABLE `tbl_parametro`
  MODIFY `idParametro` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbl_perfil`
--
ALTER TABLE `tbl_perfil`
  MODIFY `idPerfil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tbl_planning`
--
ALTER TABLE `tbl_planning`
  MODIFY `idPlanning` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbl_ppo`
--
ALTER TABLE `tbl_ppo`
  MODIFY `idPPO` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbl_proyecto`
--
ALTER TABLE `tbl_proyecto`
  MODIFY `idProyecto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `tbl_subriesgo`
--
ALTER TABLE `tbl_subriesgo`
  MODIFY `idSubRiesgo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbl_tiporiesgo`
--
ALTER TABLE `tbl_tiporiesgo`
  MODIFY `idTipoRiesgo` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
