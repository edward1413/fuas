-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3307
-- Tiempo de generación: 16-04-2025 a las 06:43:36
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `fuas_csmcddj`
--
CREATE DATABASE IF NOT EXISTS `fuas_csmcddj` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `fuas_csmcddj`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lugar_atencion`
--

CREATE TABLE `lugar_atencion` (
  `id_lugar_atencion` int(11) NOT NULL,
  `describe_lugar_atencion` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `lugar_atencion`
--

INSERT INTO `lugar_atencion` (`id_lugar_atencion`, `describe_lugar_atencion`) VALUES
(1, 'INTRAMURAL'),
(2, 'EXTRAMURAL');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `maestro_paciente`
--

CREATE TABLE `maestro_paciente` (
  `id_paciente` bigint(20) NOT NULL,
  `id_tipo_documento_paciente` int(11) DEFAULT NULL,
  `numero_documento_paciente` varchar(20) DEFAULT NULL,
  `apellido_paterno_paciente` varchar(30) DEFAULT NULL,
  `apellido_materno_paciente` varchar(30) DEFAULT NULL,
  `nombres_paciente` varchar(50) DEFAULT NULL,
  `fecha_nacimiento_paciente` date DEFAULT NULL,
  `genero_paciente` char(1) DEFAULT NULL,
  `id_etnia` int(11) DEFAULT NULL,
  `historia_clinica` varchar(20) DEFAULT NULL,
  `ficha_familiar` varchar(20) DEFAULT NULL,
  `ubigeo_nacimiento` int(11) DEFAULT NULL,
  `ubigeo_reniec` int(11) DEFAULT NULL,
  `domicilio_reniec` varchar(255) DEFAULT NULL,
  `ubigeo_declarado` int(11) DEFAULT NULL,
  `domicilio_declarado` varchar(255) DEFAULT NULL,
  `referencia_domicilio` varchar(255) DEFAULT NULL,
  `id_pais` char(3) DEFAULT NULL,
  `id_establecimiento` int(11) DEFAULT NULL,
  `fecha_alta` date DEFAULT NULL,
  `fecha_modificacion` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `maestro_personal`
--

CREATE TABLE `maestro_personal` (
  `id_personal` bigint(20) NOT NULL,
  `id_tipo_documento_personal` int(3) DEFAULT NULL,
  `numero_documento_personal` char(10) DEFAULT NULL,
  `apellido_paterno_personal` varchar(30) DEFAULT NULL,
  `apellido_materno_personal` varchar(30) DEFAULT NULL,
  `nombres_personal` varchar(50) DEFAULT NULL,
  `fecha_nacimiento_personal` date DEFAULT NULL,
  `id_profesion` int(3) DEFAULT NULL,
  `colegiatura` char(10) DEFAULT NULL,
  `especialidad` char(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `maestro_personal`
--

INSERT INTO `maestro_personal` (`id_personal`, `id_tipo_documento_personal`, `numero_documento_personal`, `apellido_paterno_personal`, `apellido_materno_personal`, `nombres_personal`, `fecha_nacimiento_personal`, `id_profesion`, `colegiatura`, `especialidad`) VALUES
(1, 2, '73438638', 'SPARROW', 'DIAZ', 'KARLA ELVIRA GIULIANA', '1993-03-12', 8, '2354', NULL),
(2, 2, '40732604', 'CRESPIN', 'CHAVEZ', 'ESTEBAN SAMUEL', '1980-11-25', 8, '5221', ''),
(3, 2, '41449213', 'MENDOZA', 'MENDEZ', 'SELENE', '1982-07-07', 11, '', ''),
(4, 2, '41860860', 'ROJAS', 'CRUZ', 'DIANA BIANCA', '1983-07-15', 11, '', ''),
(5, 2, '42042034', 'LAZARO', 'LOYOLA', 'CELMIRA YADIRA', '1983-04-21', 1, '325', ''),
(6, 2, '43853759', 'FELIPE', 'FIGUEROA', 'LIZET YAQUELINE', '1986-08-02', 6, '154', ''),
(7, 2, '44201841', 'MILLA', 'RURUSH', 'IDA PATRICIA', '1984-11-10', 8, '235444', ''),
(8, 2, '44711960', 'ROBLES', 'CUBA', 'CLAUDIA FIORELLA', '1986-11-03', 1, '2112', ''),
(9, 2, '46119231', 'SANCHEZ', 'REYNALTE', 'MILAGROS ELIZABETH', '1989-10-18', 8, '2546', '512'),
(10, 2, '46793960', 'AVILA', 'GORDILLO', 'THALIA MELISSA', '1991-01-12', 8, '54412', ''),
(11, 2, '46781815', 'PAJUELO', 'NORIEGA', 'EVELYN MILAGROS', '1991-01-18', 8, '354', ''),
(12, 2, '47695567', 'MINCHOLA', 'CUBA', 'STEPHANNY VICTORIA', '1991-11-09', 8, '15423', '52114466'),
(13, 2, '70216529', 'MEDRANO', 'SAMAMES', 'ALEJANDRO DAGNE', '1996-12-04', 2, '15654', ''),
(14, 2, '71054341', 'PEÑA', 'MARIN', 'ESTEFANI ROCIO', '1991-02-23', 9, '854', ''),
(15, 2, '45033448', 'CHAVEZ', 'VASQUEZ', 'LIZBETH BEATRIZ', '1988-02-12', 6, '659', ''),
(16, 2, '46626964', 'GARAY', 'MUÑOZ', 'EBONY JERALDINE', '1990-11-03', 8, '154', ''),
(17, 2, '43282431', 'GOMEZ', 'COBIAN', 'CARLOS ALBERTO', '1985-10-02', 8, '3654', ''),
(18, 2, '32963011', 'PALACIOS', 'BRAVO', 'PATRICIA ELIZABETH', '1974-08-20', 6, '321', ''),
(19, 2, '46719379', 'WINDER', 'MARROQUIN', 'SARVIA AGAR', '1990-01-23', 6, '564', ''),
(20, 2, '47701679', 'SORIA', 'BOCANEGRA', 'CRISTY LILIANA VANESSA', '1993-02-12', 6, '899', '2541');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prestacion`
--

CREATE TABLE `prestacion` (
  `id_prestacion` int(11) NOT NULL,
  `codigo` int(3) NOT NULL,
  `descripcion` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `prestacion`
--

INSERT INTO `prestacion` (`id_prestacion`, `codigo`, `descripcion`) VALUES
(1, 1, 'Control de crecimiento y desarrollo en menores entre 0 - 4 años'),
(2, 2, 'Control del recién nacido con menos de 2,500 gr, prematuro, con secuelas al nacer'),
(3, 5, 'Consejería nutricional para niñas o niños en riesgo nutricional y desnutrición '),
(4, 7, 'Suplemento de micronutrientes '),
(5, 8, 'Profilaxis antiparasitaria'),
(6, 9, 'Atención prenatal'),
(7, 10, 'Atención del puerperio normal'),
(8, 11, 'Exámenes de laboratorio completo de la gestante'),
(9, 13, 'Exámenes de ecografía obstétrica'),
(10, 15, 'Diagnóstico del embarazo'),
(11, 16, 'Atención temprana para menores de 36 meses'),
(12, 17, 'Atención Integral del adolescente'),
(13, 18, 'Salud reproductiva (planificación familiar)'),
(14, 19, 'Detección trastorno agudeza visual y ceguera'),
(15, 20, 'Salud Bucal'),
(16, 21, 'Prevencion de caries'),
(17, 22, 'Detección de problemas en Salud Mental'),
(18, 23, 'Deteccion precoz de cancer de prostata (PSA)'),
(19, 24, 'Detección precoz de cáncer cérvico-uterino'),
(20, 25, 'Detección precoz de cancer de mama (Mamografía)'),
(21, 26, 'Tratamiento profiláctico para gestante positiva a prueba rápida/ELISA VIH'),
(22, 27, 'Tratamiento profilactico a niños expuestos al VIH'),
(23, 29, 'Tamizaje Neonatal'),
(24, 50, 'Atención inmediata del recién nacido normal'),
(25, 51, 'Internamiento del RN con patología no quirurgica'),
(26, 52, 'Internamiento con intervención quirúrgica del RN'),
(27, 53, 'Tratamiento de VIH-SIDA (0-19a)'),
(28, 54, 'Atención de parto vaginal'),
(29, 55, 'Cesárea'),
(30, 56, 'Consulta externa'),
(31, 57, 'Obturación y curación dental simple'),
(32, 58, 'Obturación y curación dental compuesta'),
(33, 59, 'Extracción dental (exodoncia)'),
(34, 60, 'Atención extramural urbana y periurbana (Visita domiciliaria)'),
(35, 61, 'Atención en tópico'),
(36, 62, 'Atención por emergencia'),
(37, 63, 'Atención por emergencia con observación'),
(38, 64, 'Intervención medico-quirúrgica ambulatoria'),
(39, 65, 'Internamiento en EESS sin intervención quirúrgica'),
(40, 66, 'Internamiento con intervención quirúrgica menor'),
(41, 67, 'Internamiento con intervención quirúrgica mayor'),
(42, 68, 'Internamiento con Estancia en la Unidad de Cuidados Intensivos (UCI)'),
(43, 69, 'Transfusión sanguínea o hemoderivados'),
(44, 70, 'Atención odontológica especializada'),
(45, 71, 'Apoyo al diagnóstico'),
(46, 74, 'Tratamiento de ITS en adolescentes, adultos y adultos mayores'),
(47, 75, 'Atención extramural rural (Visita domiciliaria)'),
(48, 111, 'Asignación por Alimentación'),
(49, 112, 'Sepelio para Óbito fetal (Muerte Intraútero)'),
(50, 113, 'Sepelio para Niñas/os'),
(51, 114, 'Sepelio para Adolescentes y Adultos'),
(52, 116, 'Sepelio para Recién Nacidos'),
(53, 117, 'Traslado de Emergencia'),
(54, 118, 'Control de crecimiento y desarrollo en menores entre 5 - 9 años'),
(55, 119, 'Control de crecimiento y desarrollo en entre de 10 - 11 años'),
(56, 200, 'Atención de rehabilitación'),
(57, 300, 'Telemedicina'),
(58, 900, 'Prótesis dental removible'),
(59, 901, 'Apoyo al Tratamiento'),
(60, 902, 'Atención Preconcepcional'),
(61, 903, 'Atención Integral de Salud del Adulto Mayor'),
(62, 904, 'Atención Integral de Salud del Joven y Adulto'),
(63, 906, 'Consulta externa por profesionales no médicos ni odontólogos'),
(64, 908, 'Atención domiciliaria'),
(65, 911, 'Instrucción de Higiene Oral y Asesoría nutricional para el control de enfermedades dentales');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesion`
--

CREATE TABLE `profesion` (
  `id_profesion` int(3) NOT NULL,
  `descripcion` varchar(25) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `profesion`
--

INSERT INTO `profesion` (`id_profesion`, `descripcion`) VALUES
(1, 'MEDICO'),
(2, 'FARMACEUTICO'),
(3, 'BIOLOGO'),
(4, 'OBSTETRIZ'),
(5, 'ENFERMERA'),
(6, 'ENFERMERA'),
(7, 'TRABAJADORA SOCIAL'),
(8, 'PSICOLOGA'),
(9, 'TECNOLOGO MEDICO'),
(10, 'NUTRICION'),
(11, 'TECNICO ENFERMERIA'),
(12, 'AUXILIAR ENFERMERIA'),
(13, 'OTRO');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `lugar_atencion`
--
ALTER TABLE `lugar_atencion`
  ADD PRIMARY KEY (`id_lugar_atencion`);

--
-- Indices de la tabla `maestro_paciente`
--
ALTER TABLE `maestro_paciente`
  ADD PRIMARY KEY (`id_paciente`),
  ADD KEY `idx_nombre_paciente` (`nombres_paciente`),
  ADD KEY `idx_apellido_paterno_paciente` (`apellido_paterno_paciente`),
  ADD KEY `idx_apellido_materno_paciente` (`apellido_materno_paciente`),
  ADD KEY `idx_documento_paciente` (`numero_documento_paciente`);

--
-- Indices de la tabla `maestro_personal`
--
ALTER TABLE `maestro_personal`
  ADD PRIMARY KEY (`id_personal`),
  ADD KEY `fk_profesion` (`id_profesion`);

--
-- Indices de la tabla `prestacion`
--
ALTER TABLE `prestacion`
  ADD PRIMARY KEY (`id_prestacion`);

--
-- Indices de la tabla `profesion`
--
ALTER TABLE `profesion`
  ADD PRIMARY KEY (`id_profesion`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `lugar_atencion`
--
ALTER TABLE `lugar_atencion`
  MODIFY `id_lugar_atencion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `maestro_personal`
--
ALTER TABLE `maestro_personal`
  MODIFY `id_personal` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT de la tabla `prestacion`
--
ALTER TABLE `prestacion`
  MODIFY `id_prestacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT de la tabla `profesion`
--
ALTER TABLE `profesion`
  MODIFY `id_profesion` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `maestro_personal`
--
ALTER TABLE `maestro_personal`
  ADD CONSTRAINT `fk_profesion` FOREIGN KEY (`id_profesion`) REFERENCES `profesion` (`id_profesion`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
