-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 08, 2018 at 10:23 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `lonco`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_checklist`
--

CREATE TABLE IF NOT EXISTS `tbl_checklist` (
  `idCheckList` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `eliminado` int(11) NOT NULL,
  PRIMARY KEY (`idCheckList`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_checklist`
--

INSERT INTO `tbl_checklist` (`idCheckList`, `nombre`, `eliminado`) VALUES
(1, 'Checklist inicial', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cliente`
--

CREATE TABLE IF NOT EXISTS `tbl_cliente` (
  `idCliente` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `eliminado` int(11) NOT NULL,
  PRIMARY KEY (`idCliente`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_cliente`
--

INSERT INTO `tbl_cliente` (`idCliente`, `nombre`, `eliminado`) VALUES
(1, 'cliente1', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cl_section`
--

CREATE TABLE IF NOT EXISTS `tbl_cl_section` (
  `idSeccion` int(11) NOT NULL AUTO_INCREMENT,
  `idCheckList` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `Orden` int(11) NOT NULL,
  `eliminado` int(11) NOT NULL,
  PRIMARY KEY (`idSeccion`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `tbl_cl_section`
--

INSERT INTO `tbl_cl_section` (`idSeccion`, `idCheckList`, `nombre`, `Orden`, `eliminado`) VALUES
(1, 1, 'Requerimientos de Definición', 1, 0),
(2, 1, 'Requerimientos de Planificación', 2, 0),
(3, 1, 'Del Cliente:', 3, 0),
(4, 1, 'Requerimientos de RR.HH', 4, 0),
(5, 1, 'Del Contrato', 5, 0),
(6, 1, 'De Proveedores o Subcontratistas', 6, 0),
(7, 1, 'Requerimientos Financieros', 7, 0),
(8, 1, 'Del Proyecto o Servicio', 8, 0),
(9, 1, 'Del equipo de proyecto o servicio:', 9, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cl_s_pregunta`
--

CREATE TABLE IF NOT EXISTS `tbl_cl_s_pregunta` (
  `idPregunta` int(11) NOT NULL AUTO_INCREMENT,
  `idSeccion` int(11) NOT NULL,
  `nombre` text NOT NULL,
  `orden` int(11) NOT NULL,
  `eliminado` int(11) NOT NULL,
  PRIMARY KEY (`idPregunta`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=46 ;

--
-- Dumping data for table `tbl_cl_s_pregunta`
--

INSERT INTO `tbl_cl_s_pregunta` (`idPregunta`, `idSeccion`, `nombre`, `orden`, `eliminado`) VALUES
(1, 1, 'Están definidos los objetivos del Proyecto?', 1, 0),
(2, 1, 'Están definidos claramente los alcances y limitaciones del proyecto?', 2, 0),
(3, 1, 'Están definidas a acordadas con el cliente las fecha de inicio y termino del proyecto?', 3, 0),
(4, 1, 'Esta definida y acordada con el cliente la metodología a utilizar durante el proyecto?', 4, 0),
(5, 1, 'Están definidos y acordados con la alta Gcia. los riesgos Asociados al proyecto?', 5, 0),
(6, 1, 'Está establecido y acordado el nuevo Base Line de Costos de Ejecución?', 6, 0),
(7, 1, 'Están claramente definidos la frecuencia y los parámetros de control del proyecto y  acordados con la PMO?', 7, 0),
(8, 2, 'Está elaborada y acordada la carta Gantt?', 1, 0),
(9, 2, 'Están definidos los hitos de control del proyecto?', 2, 0),
(10, 2, 'Están definidos los entregables del proyecto y acordados con el Cliente?', 3, 0),
(11, 2, 'Esta documentada la Aceptación formal del plan por todos los involucrados en el proyecto?', 4, 0),
(12, 2, 'Se realizo la citación para el Kick Off?', 5, 0),
(13, 3, 'Es la primera vez que se trabaja con este cliente?', 1, 0),
(14, 3, 'Han existido problemas en algún proyecto anterior con este cliente? o es un cliente de naturaleza problemática, intrínsecos a su sector o al tipo de negocio?', 2, 0),
(15, 3, 'El cliente puede sufrir cambios organizativos o tecnológicos durante el desarrollo del proyecto?', 3, 0),
(16, 3, 'Se trata de un proyecto o servicio crítico para el cliente? o un retraso en la planificación puede afectar de forma critica a su negocio?', 4, 0),
(17, 3, 'Tiene el cliente experiencia en contratación de proyectos o servicios de IT', 5, 0),
(18, 3, 'Tenemos clara la organización interna del cliente, y están identificados los interlocutores con los que nos vamos a relacionar? Son los adecuados?', 6, 0),
(19, 3, 'Para la realización de nuestro proyecto o servicio deberemos interrelacionarnos con otros proveedores del cliente, bien sea para integrar componentes de ellos, o enviarles los nuestros para que ellos los integren, o desarrollar partes en común?', 7, 0),
(20, 4, 'Esta todo el personal ya contratado?', 1, 0),
(21, 4, 'Si se requieren nuevas contrataciones, se informo a RR.HH?', 2, 0),
(22, 4, 'Están definidas (si son requeridas) las subcontrataciones por servicio?', 3, 0),
(23, 4, 'Se requiere capacitación adicional ?', 4, 0),
(24, 4, 'Si lo anterior es afirmativo, esta coordinada?', 5, 0),
(25, 4, 'Esta definido el Personigrama?', 6, 0),
(26, 4, 'Se informo a la PMO el Personigrama definido?', 7, 0),
(27, 5, 'Esta la oferta formalmente aceptada y el contrato, si procede, firmado?', 1, 0),
(28, 5, 'Se contempla algún tipo de Penalizaciones en el contrato? o hay algún tipo de condiciones contractuales no habituales?', 2, 0),
(29, 5, 'Hay alguna duda respecto a si el alcance definido en el contrato refleja plenamente las expectativas reales del cliente sobre el proyecto o servicio?', 3, 0),
(30, 5, 'Están todos los requerimientos y entregables claramente definidos e identificados en la oferta o en el contrato?\nLos SLAs han sido revisados, son asumibles y contemplados por todos los departamentos y proveedores implicados?', 4, 0),
(31, 6, 'Hay partes críticas del proyecto que dependen de un subcontratista?', 1, 0),
(32, 6, 'Están definidos los Proveedores y/ Contratistas? ', 2, 0),
(33, 6, 'Si esto es Afirmativo, estos se encuentran homologados?', 3, 0),
(34, 6, 'Hay alternativas viables en caso de que el subcontratista no cumpla sus compromisos en la forma y tiempo planificados?', 4, 0),
(35, 6, 'Están formalmente cerrados los contratos con los subcontratistas, y cubren adecuadamente nuestras obligaciones con el cliente?', 5, 0),
(36, 7, 'Esta levantado el caso de negocio de ejecución?', 1, 0),
(37, 7, 'Se requiere Factoring, u otro instrumento?', 2, 0),
(38, 7, 'Es necesario algún método de financiamiento externo del proyecto?', 3, 0),
(39, 7, 'Están definidos los hitos de Facturación del proyecto?', 4, 0),
(40, 7, 'Esta confirmado el Flujo de Caja del Proyecto?', 5, 0),
(41, 8, 'Es la primera vez que se realiza un proyecto en este entorno de negocio?', 1, 0),
(42, 8, 'Es la primera vez que se realiza un proyecto con esta tecnología?', 2, 0),
(43, 8, 'Tiene el objeto del contrato una dificultad especialmente remarcable?', 3, 0),
(44, 9, 'Hay el suficiente conocimiento del entorno de Aplicativo y Tecnológico por parte del personal asignado? Es suficiente su número y estará disponible en los plazos previstos?', 1, 0),
(45, 9, 'Están disponibles todos los equipamientos, comunicaciones e infraestructuras necesarias?', 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_garantia`
--

CREATE TABLE IF NOT EXISTS `tbl_garantia` (
  `idGarantia` int(11) NOT NULL AUTO_INCREMENT,
  `idProyecto` int(11) NOT NULL,
  `fechaReserva` date NOT NULL,
  `monto` int(11) NOT NULL,
  PRIMARY KEY (`idGarantia`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_gasto`
--

CREATE TABLE IF NOT EXISTS `tbl_gasto` (
  `idGasto` int(11) NOT NULL AUTO_INCREMENT,
  `idProyecto` int(11) NOT NULL,
  `estado` int(11) NOT NULL,
  `descripcion` text NOT NULL,
  `idCategoria` int(11) NOT NULL,
  `coste` int(11) NOT NULL,
  `unidad` int(11) NOT NULL,
  `fecha` datetime NOT NULL,
  `costeTotal` int(11) NOT NULL,
  PRIMARY KEY (`idGasto`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_log`
--

CREATE TABLE IF NOT EXISTS `tbl_log` (
  `idLog` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` datetime NOT NULL,
  `accion` varchar(12) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `descripcion` text NOT NULL,
  PRIMARY KEY (`idLog`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `tbl_log`
--

INSERT INTO `tbl_log` (`idLog`, `fecha`, `accion`, `usuario`, `descripcion`) VALUES
(9, '2018-07-06 23:18:53', 'LOGIN', 'rodrigo.amigo@connectis-gs.cl', 'login OK de rodrigo.amigo@connectis-gs.cl'),
(10, '2018-07-06 23:20:35', 'LOGIN', 'rodrigo.amigo@connectis-gs.cl', 'login OK de rodrigo.amigo@connectis-gs.cl'),
(11, '2018-07-06 23:21:04', 'LOGINNOK', '$txtUser', '$description'),
(12, '2018-07-06 23:21:10', 'LOGIN', 'rodrigo.amigo@connectis-gs.cl', 'login OK de rodrigo.amigo@connectis-gs.cl'),
(13, '2018-07-07 00:35:18', 'DELETE', 'rodrigo.amigo@connectis-gs.cl', 'Eliminacion de proyecto '),
(14, '2018-07-07 00:35:32', 'DELETE', 'rodrigo.amigo@connectis-gs.cl', 'Eliminacion de proyecto '),
(15, '2018-07-07 00:35:51', 'DELETE', 'rodrigo.amigo@connectis-gs.cl', 'Eliminacion de proyecto 1'),
(16, '2018-07-07 00:36:32', 'DELETE', 'rodrigo.amigo@connectis-gs.cl', 'Eliminacion de proyecto id 1'),
(17, '2018-07-07 15:37:42', 'INSERT', 'rodrigo.amigo@connectis-gs.cl', 'Creacion de proyecto proyecto2'),
(18, '2018-07-07 15:39:19', 'INSERT', 'rodrigo.amigo@connectis-gs.cl', 'Creacion de proyecto proyecto2'),
(19, '2018-07-07 15:46:38', 'INSERT', 'rodrigo.amigo@connectis-gs.cl', 'Creacion de proyecto proyecto2'),
(20, '2018-07-07 15:46:54', 'INSERT', 'rodrigo.amigo@connectis-gs.cl', 'Creacion de proyecto proyecto2'),
(21, '2018-07-07 15:47:12', 'INSERT', 'rodrigo.amigo@connectis-gs.cl', 'Creacion de proyecto proyecto2'),
(22, '2018-07-07 15:47:53', 'INSERT', 'rodrigo.amigo@connectis-gs.cl', 'Creacion de proyecto proyecto2'),
(23, '2018-07-07 15:54:59', 'INSERT', 'rodrigo.amigo@connectis-gs.cl', 'Creacion de proyecto Proyecto nuevo'),
(24, '2018-07-07 22:58:08', 'UPDATE', 'rodrigo.amigo@connectis-gs.cl', '  Actualizado el proyecto proyecto UNO'),
(25, '2018-07-07 22:58:28', 'UPDATE', 'rodrigo.amigo@connectis-gs.cl', '  Actualizado el proyecto proyecto UNO');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_parametro`
--

CREATE TABLE IF NOT EXISTS `tbl_parametro` (
  `idParametro` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `habilitado` int(11) NOT NULL,
  PRIMARY KEY (`idParametro`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_perfil`
--

CREATE TABLE IF NOT EXISTS `tbl_perfil` (
  `idPerfil` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(20) NOT NULL,
  `habilitado` int(11) NOT NULL DEFAULT '1',
  `eliminado` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`idPerfil`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_perfil`
--

INSERT INTO `tbl_perfil` (`idPerfil`, `nombre`, `habilitado`, `eliminado`) VALUES
(1, 'Admin', 1, 0),
(2, 'Viewer', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_planning`
--

CREATE TABLE IF NOT EXISTS `tbl_planning` (
  `idPlanning` int(11) NOT NULL AUTO_INCREMENT,
  `idProyecto` int(11) NOT NULL,
  `mesagno` varchar(6) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `tipo` int(11) NOT NULL,
  `previstas` int(11) NOT NULL,
  `realizadas` int(11) NOT NULL,
  PRIMARY KEY (`idPlanning`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ppo`
--

CREATE TABLE IF NOT EXISTS `tbl_ppo` (
  `idPPO` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `descripcion` text NOT NULL,
  `param1` int(11) NOT NULL,
  `param2` int(11) NOT NULL,
  `param3` int(11) NOT NULL,
  `orden` int(11) NOT NULL,
  PRIMARY KEY (`idPPO`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_proyecto`
--

CREATE TABLE IF NOT EXISTS `tbl_proyecto` (
  `idProyecto` int(11) NOT NULL AUTO_INCREMENT,
  `idCliente` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `cc` varchar(20) NOT NULL,
  `gerente` varchar(50) NOT NULL,
  `jefe` varchar(50) NOT NULL,
  `plazo` int(11) NOT NULL,
  `fechaInicio` date NOT NULL,
  `fechaTermino` date NOT NULL,
  `estadoCHK` int(11) NOT NULL,
  `eliminado` int(11) NOT NULL,
  PRIMARY KEY (`idProyecto`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tbl_proyecto`
--

INSERT INTO `tbl_proyecto` (`idProyecto`, `idCliente`, `nombre`, `cc`, `gerente`, `jefe`, `plazo`, `fechaInicio`, `fechaTermino`, `estadoCHK`, `eliminado`) VALUES
(1, 1, 'proyecto UNO', 'doce', 'rodrigo.amigo@connectis-gs.cl', 'rodrigo.amigo@connectis-gs.cl', 12, '2018-05-27', '2018-07-31', 0, 0),
(5, 1, 'Proyecto nuevo', 'cc1', 'rodrigo.amigo@connectis-gs.cl', 'rodrigo.amigo@connectis-gs.cl', 12, '2018-04-30', '2018-08-10', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_proyecto_ppo`
--

CREATE TABLE IF NOT EXISTS `tbl_proyecto_ppo` (
  `idProyecto` int(11) NOT NULL,
  `idPPO` int(11) NOT NULL,
  `monto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_proy_respuesta`
--

CREATE TABLE IF NOT EXISTS `tbl_proy_respuesta` (
  `idProyecto` int(11) NOT NULL,
  `idPregunta` int(11) NOT NULL,
  `respuesta` text NOT NULL,
  `comentario` text NOT NULL,
  `fecha` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_proy_respuesta`
--

INSERT INTO `tbl_proy_respuesta` (`idProyecto`, `idPregunta`, `respuesta`, `comentario`, `fecha`) VALUES
(1, 1, '', '', '0000-00-00 00:00:00'),
(1, 2, 'SI', 'lalalal', '2018-07-07 22:58:43'),
(1, 3, 'NO', 'no', '2018-07-07 22:58:43'),
(1, 4, 'SI', 'respondida', '2018-07-07 22:58:43'),
(1, 5, '', '', '0000-00-00 00:00:00'),
(1, 6, '', '', '0000-00-00 00:00:00'),
(1, 7, '', '', '0000-00-00 00:00:00'),
(1, 8, '', '', '0000-00-00 00:00:00'),
(1, 9, 'NO', 'qwe', '2018-07-07 22:58:43'),
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
(1, 45, '', '', '0000-00-00 00:00:00'),
(5, 1, '', '', '0000-00-00 00:00:00'),
(5, 2, '', '', '0000-00-00 00:00:00'),
(5, 3, '', '', '0000-00-00 00:00:00'),
(5, 4, '', '', '0000-00-00 00:00:00'),
(5, 5, '', '', '0000-00-00 00:00:00'),
(5, 6, '', '', '0000-00-00 00:00:00'),
(5, 7, '', '', '0000-00-00 00:00:00'),
(5, 8, '', '', '0000-00-00 00:00:00'),
(5, 9, '', '', '0000-00-00 00:00:00'),
(5, 10, '', '', '0000-00-00 00:00:00'),
(5, 11, '', '', '0000-00-00 00:00:00'),
(5, 12, '', '', '0000-00-00 00:00:00'),
(5, 13, '', '', '0000-00-00 00:00:00'),
(5, 14, '', '', '0000-00-00 00:00:00'),
(5, 15, '', '', '0000-00-00 00:00:00'),
(5, 16, '', '', '0000-00-00 00:00:00'),
(5, 17, '', '', '0000-00-00 00:00:00'),
(5, 18, '', '', '0000-00-00 00:00:00'),
(5, 19, '', '', '0000-00-00 00:00:00'),
(5, 20, '', '', '0000-00-00 00:00:00'),
(5, 21, '', '', '0000-00-00 00:00:00'),
(5, 22, '', '', '0000-00-00 00:00:00'),
(5, 23, '', '', '0000-00-00 00:00:00'),
(5, 24, '', '', '0000-00-00 00:00:00'),
(5, 25, '', '', '0000-00-00 00:00:00'),
(5, 26, '', '', '0000-00-00 00:00:00'),
(5, 27, '', '', '0000-00-00 00:00:00'),
(5, 28, '', '', '0000-00-00 00:00:00'),
(5, 29, '', '', '0000-00-00 00:00:00'),
(5, 30, '', '', '0000-00-00 00:00:00'),
(5, 31, '', '', '0000-00-00 00:00:00'),
(5, 32, '', '', '0000-00-00 00:00:00'),
(5, 33, '', '', '0000-00-00 00:00:00'),
(5, 34, '', '', '0000-00-00 00:00:00'),
(5, 35, '', '', '0000-00-00 00:00:00'),
(5, 36, '', '', '0000-00-00 00:00:00'),
(5, 37, '', '', '0000-00-00 00:00:00'),
(5, 38, '', '', '0000-00-00 00:00:00'),
(5, 39, '', '', '0000-00-00 00:00:00'),
(5, 40, '', '', '0000-00-00 00:00:00'),
(5, 41, '', '', '0000-00-00 00:00:00'),
(5, 42, '', '', '0000-00-00 00:00:00'),
(5, 43, '', '', '0000-00-00 00:00:00'),
(5, 44, '', '', '0000-00-00 00:00:00'),
(5, 45, '', '', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subriesgo`
--

CREATE TABLE IF NOT EXISTS `tbl_subriesgo` (
  `idSubRiesgo` int(11) NOT NULL AUTO_INCREMENT,
  `idTipoRiesgo` int(11) NOT NULL,
  `descripcion` text NOT NULL,
  PRIMARY KEY (`idSubRiesgo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tiporiesgo`
--

CREATE TABLE IF NOT EXISTS `tbl_tiporiesgo` (
  `idTipoRiesgo` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `habilitado` int(11) NOT NULL,
  PRIMARY KEY (`idTipoRiesgo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_usuario`
--

CREATE TABLE IF NOT EXISTS `tbl_usuario` (
  `mail` varchar(50) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `paterno` varchar(50) NOT NULL,
  `materno` varchar(50) NOT NULL,
  `idPerfil` int(11) NOT NULL,
  `tipo` varchar(1) NOT NULL,
  `password` varchar(80) NOT NULL,
  `habilitado` int(11) NOT NULL,
  `eliminado` int(11) NOT NULL,
  `valorHH` int(11) NOT NULL,
  PRIMARY KEY (`mail`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_usuario`
--

INSERT INTO `tbl_usuario` (`mail`, `nombre`, `paterno`, `materno`, `idPerfil`, `tipo`, `password`, `habilitado`, `eliminado`, `valorHH`) VALUES
('rodrigo.amigo@connectis-gs.cl', 'Rodrigo', 'Amigo', 'MuÃ±oz', 1, 'P', '$2y$10$wTnYsQFzZfOyK6uPW/gp4eOLcYtfcly0uVg1WaYY7U3uw7CoiQLIO', 1, 0, 1000);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
