-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-05-2015 a las 00:04:40
-- Versión del servidor: 5.6.17
-- Versión de PHP: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `jer4505`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
  `id_menu` int(11) NOT NULL AUTO_INCREMENT,
  `menu` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `html` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id_menu`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `menu`
--

INSERT INTO `menu` (`id_menu`, `menu`, `html`) VALUES
(1, 'Inicio', 'inicio'),
(2, 'Ingreso de Datos 4505', 'pg_menu_resolucion_4505'),
(3, 'Formulario Resolución 4505', 'pg_formulario_4505'),
(4, 'Actualización Formulario 4505', 'pg_formulario_4505_actualizacion'),
(5, 'Exportar 4505', 'pg_exportar_4505');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rped`
--

CREATE TABLE IF NOT EXISTS `rped` (
  `TipoRegistroControl` int(1) NOT NULL,
  `CodigoEPSoDLS` varchar(6) COLLATE utf8_spanish_ci NOT NULL,
  `FechaInicialReporte` date NOT NULL,
  `FechaFinalReporte` date NOT NULL,
  `NumeroRegistros` int(8) NOT NULL,
  `TipoRegistroDetalle` int(11) NOT NULL,
  `ConsecutivoRegistro` int(11) NOT NULL AUTO_INCREMENT,
  `CodigoHabilitacion` varchar(12) COLLATE utf8_spanish_ci NOT NULL,
  `TipoIdUsuario` varchar(2) COLLATE utf8_spanish_ci NOT NULL,
  `NumeroIdUsuario` varchar(18) COLLATE utf8_spanish_ci NOT NULL,
  `Apellido1` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `Apellido2` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `Nombre1` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `Nombre2` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `FechaNacimiento` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `Sexo` varchar(1) COLLATE utf8_spanish_ci NOT NULL,
  `PertenenciaEtnica` varchar(2) COLLATE utf8_spanish_ci NOT NULL,
  `CodigoOcupacion` varchar(4) COLLATE utf8_spanish_ci NOT NULL,
  `CodigoNivelEducativo` varchar(2) COLLATE utf8_spanish_ci NOT NULL,
  `Gestacion` varchar(2) COLLATE utf8_spanish_ci NOT NULL,
  `SifilisGestacional` varchar(2) COLLATE utf8_spanish_ci NOT NULL,
  `HipertensionInducidaGestacion` varchar(2) COLLATE utf8_spanish_ci NOT NULL,
  `HipotiroidismoCongenito` varchar(2) COLLATE utf8_spanish_ci NOT NULL,
  `SintomaticoRespiratorio` varchar(2) COLLATE utf8_spanish_ci NOT NULL,
  `Tuberculosis` varchar(2) COLLATE utf8_spanish_ci NOT NULL,
  `Lepra` varchar(2) COLLATE utf8_spanish_ci NOT NULL,
  `ObesidadDesnutricion` varchar(2) COLLATE utf8_spanish_ci NOT NULL,
  `VictimaMaltrato` varchar(2) COLLATE utf8_spanish_ci NOT NULL,
  `VictimaViolenciaSexual` varchar(2) COLLATE utf8_spanish_ci NOT NULL,
  `InfeccionTrasmisionSexual` varchar(2) COLLATE utf8_spanish_ci NOT NULL,
  `EnfermedadMental` varchar(2) COLLATE utf8_spanish_ci NOT NULL,
  `CancerCervix` varchar(2) COLLATE utf8_spanish_ci NOT NULL,
  `CancerSeno` varchar(2) COLLATE utf8_spanish_ci NOT NULL,
  `FluorosisDental` varchar(2) COLLATE utf8_spanish_ci NOT NULL,
  `FechaPeso` date NOT NULL,
  `PesoKilogramos` decimal(10,0) NOT NULL,
  `FechaTalla` date NOT NULL,
  `TallaCentimetros` varchar(3) COLLATE utf8_spanish_ci NOT NULL,
  `FechaProbableParto` date NOT NULL,
  `EdadGestacional` varchar(3) COLLATE utf8_spanish_ci NOT NULL,
  `BCG` varchar(2) COLLATE utf8_spanish_ci NOT NULL,
  `HepatitisB` varchar(2) COLLATE utf8_spanish_ci NOT NULL,
  `Pentavalente` varchar(2) COLLATE utf8_spanish_ci NOT NULL,
  `Polio` varchar(2) COLLATE utf8_spanish_ci NOT NULL,
  `DPT` varchar(2) COLLATE utf8_spanish_ci NOT NULL,
  `Rotavirus` varchar(2) COLLATE utf8_spanish_ci NOT NULL,
  `Neumococo` varchar(2) COLLATE utf8_spanish_ci NOT NULL,
  `InfluenzaN` varchar(2) COLLATE utf8_spanish_ci NOT NULL,
  `FiebreAmarillaN1` varchar(2) COLLATE utf8_spanish_ci NOT NULL,
  `HepatitisA` varchar(2) COLLATE utf8_spanish_ci NOT NULL,
  `TripleViralN` varchar(2) COLLATE utf8_spanish_ci NOT NULL,
  `VPH` varchar(2) COLLATE utf8_spanish_ci NOT NULL,
  `TdTtMEF` varchar(2) COLLATE utf8_spanish_ci NOT NULL,
  `ControlPlacaBacteriana` varchar(2) COLLATE utf8_spanish_ci NOT NULL,
  `FechaAtencionParto` date NOT NULL,
  `FechaSalidaParto` date NOT NULL,
  `FechaConsejeriaLactanciaInput` date NOT NULL,
  `ControlRecienNacidoInput` date NOT NULL,
  `PlanificacionFamiliarPrimeraVezInput` date NOT NULL,
  `SuministroMetodoAnticonceptivo` varchar(2) COLLATE utf8_spanish_ci NOT NULL,
  `FechaSuministroMetodoAnticonceptivo` date NOT NULL,
  `ControlPrenatalPrimeraVezInput` date NOT NULL,
  `ControlPrenatal` varchar(3) COLLATE utf8_spanish_ci NOT NULL,
  `UltimoControlPrenatal` date NOT NULL,
  `SuministroAcidoFolico` varchar(2) COLLATE utf8_spanish_ci NOT NULL,
  `SuministroSulfatoFerroso` varchar(2) COLLATE utf8_spanish_ci NOT NULL,
  `SuministroCarbonatoCalcio` varchar(2) COLLATE utf8_spanish_ci NOT NULL,
  `ValoracionAgudezaVisualInput` date NOT NULL,
  `ConsultaOftalmologiaInput` date NOT NULL,
  `FechaDiagnosticoDesnutricion` date NOT NULL,
  `ConsultaMujerMenorVictimaInput` date NOT NULL,
  `ConsultaVictimaViolenciaSexualInput` date NOT NULL,
  `ConsultaNutricionInput` date NOT NULL,
  `ConsultaPsicologiaInput` date NOT NULL,
  `ConsultaCyDPrimeraVezInput` date NOT NULL,
  `SuministroSulfatoFerrosoMenor` varchar(2) COLLATE utf8_spanish_ci NOT NULL,
  `SuministroVitaminaAMenor` varchar(2) COLLATE utf8_spanish_ci NOT NULL,
  `ConsultaJovenPrimeraVezInput` date NOT NULL,
  `ConsultaAdultoPrimeraVezInput` date NOT NULL,
  `PreservativosITSInput` varchar(3) COLLATE utf8_spanish_ci NOT NULL,
  `AsesoriaPreElisaInput` date NOT NULL,
  `AsesoriaPostElisaInput` date NOT NULL,
  `PacienteEnfermedadMental` varchar(2) COLLATE utf8_spanish_ci NOT NULL,
  `FechaAntigenoHepatitisBGestantesInput` date NOT NULL,
  `ResultadoAntigenoHepatitisBGestantes` varchar(2) COLLATE utf8_spanish_ci NOT NULL,
  `FechaSerologiaSifilisInput` date NOT NULL,
  `ResultadoSerologiaSifilis` varchar(2) COLLATE utf8_spanish_ci NOT NULL,
  `FechaTomaElisaVIHInput` date NOT NULL,
  `ResultadoElisaVIH` varchar(2) COLLATE utf8_spanish_ci NOT NULL,
  `FechaTSHNeonatalInput` date NOT NULL,
  `ResultadoTSHNeonatal` varchar(2) COLLATE utf8_spanish_ci NOT NULL,
  `TamizajeCencerCU` varchar(2) COLLATE utf8_spanish_ci NOT NULL,
  `FechaCitologiaCUInput` date NOT NULL,
  `CitologiaCUResultados` varchar(3) COLLATE utf8_spanish_ci NOT NULL,
  `CalidadMuestraCitologia` varchar(3) COLLATE utf8_spanish_ci NOT NULL,
  `CodigoHabilitacionIPSTomaMuestra` varchar(12) COLLATE utf8_spanish_ci NOT NULL,
  `FechaColposcopiaInput` date NOT NULL,
  `CodigoHabilitacionTomaColposcopia` varchar(12) COLLATE utf8_spanish_ci NOT NULL,
  `FechaBiopsiaCervicalInput` date NOT NULL,
  `ResultadoBiopsiaCervical` varchar(3) COLLATE utf8_spanish_ci NOT NULL,
  `CodigoHabilitacionTomaBiopsia` varchar(12) COLLATE utf8_spanish_ci NOT NULL,
  `FechaMamografiaInput` date NOT NULL,
  `ResultadoMamografia` varchar(3) COLLATE utf8_spanish_ci NOT NULL,
  `CodigoHabilitacionTomaMamografia` varchar(12) COLLATE utf8_spanish_ci NOT NULL,
  `FechaBiopsiaSenoInput` date NOT NULL,
  `FechaResultadoBiopsiaSeno` date NOT NULL,
  `ResultadoBiopsiaSeno` varchar(3) COLLATE utf8_spanish_ci NOT NULL,
  `CodigoHabilitacionBiopsiaSeno` varchar(12) COLLATE utf8_spanish_ci NOT NULL,
  `FechaTomaHemoglobinaInput` date NOT NULL,
  `ResultadoHemoglobina` decimal(10,0) NOT NULL,
  `FechaTomaGlisemiaInput` date NOT NULL,
  `FechaTomaCreatininaInput` date NOT NULL,
  `ResultadoCreatinina` varchar(4) COLLATE utf8_spanish_ci NOT NULL,
  `FechaHemoglobinaGlicosiladaInput` date NOT NULL,
  `ResultadoHemoglobinaGlicosilada` varchar(4) COLLATE utf8_spanish_ci NOT NULL,
  `FechaTomaMicroalbuminuriaInput` date NOT NULL,
  `FechaTomaHDLInput` date NOT NULL,
  `FechaTomaBaciloscopiaInput` date NOT NULL,
  `ResultadoBaciloscopia` varchar(2) COLLATE utf8_spanish_ci NOT NULL,
  `TratamientoHipotiroidismoCongenito` varchar(2) COLLATE utf8_spanish_ci NOT NULL,
  `TratamientoSifilisGestacional` varchar(2) COLLATE utf8_spanish_ci NOT NULL,
  `TratamientoSifilisCongenita` varchar(2) COLLATE utf8_spanish_ci NOT NULL,
  `TratamientoLepra` varchar(2) COLLATE utf8_spanish_ci NOT NULL,
  `FechaTerLeishmaniasisInput` date NOT NULL,
  PRIMARY KEY (`ConsecutivoRegistro`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='REGISTRO DETALLE PROTECCION ESPECIFICA Y DETECCION TEMPRANA' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `id_perfil_usuario` int(11) NOT NULL,
  `nombre_usuario` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `login` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `correo` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `clave` varchar(6) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `id_perfil_usuario`, `nombre_usuario`, `login`, `correo`, `telefono`, `clave`) VALUES
(1, 1, 'Juan Fernando', 'epjuan', 'ep.juan@gmail.com', '313646436', '1232'),
(2, 1, 'Resolucion 4505', 'res', '', '', '4505');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
