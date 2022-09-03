-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 07-07-2022 a las 12:56:13
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bdch`
--
CREATE DATABASE IF NOT EXISTS `bdch` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci;
USE `bdch`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pages`
--

DROP TABLE IF EXISTS `pages`;
CREATE TABLE `pages` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) DEFAULT NULL,
  `titulo` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `page` varchar(60) CHARACTER SET utf8mb4 NOT NULL DEFAULT '#',
  `descripcion` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `icono` varchar(70) CHARACTER SET utf8mb4 NOT NULL,
  `activo` int(11) NOT NULL DEFAULT 1,
  `creado` datetime NOT NULL,
  `actualizado` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `pages`
--

INSERT INTO `pages` (`id`, `menu_id`, `titulo`, `page`, `descripcion`, `icono`, `activo`, `creado`, `actualizado`) VALUES
(2, NULL, 'Archivos maestros', '#', '', 'fa-solid fa-book', 1, '2022-04-19 23:20:11', '2022-04-19 17:21:35'),
(3, 2, 'Pacientes', 'pacientes', '', '', 1, '2022-05-07 02:27:04', '2022-05-06 20:27:25'),
(4, 2, 'Medicos', 'medicos', '', '', 1, '2022-05-07 02:48:05', '2022-05-06 20:50:59'),
(5, 2, 'Vacunas', 'vacunas', '', '', 1, '2022-05-07 02:48:05', '2022-05-06 20:50:59'),
(6, 2, 'Especialidades', 'especialidades', '', '', 1, '2022-05-07 02:48:05', '2022-05-06 20:50:59'),
(7, NULL, 'Consulta', 'consulta', 'Sección para insertar datos de la consulta realizada', 'fa-solid fa-stethoscope', 1, '2022-07-01 18:13:35', '2022-07-01 12:16:14'),
(8, NULL, 'Área Covid-19', 'hospitalizacion', 'Ingreso, chequeo diario y alta del paciente', 'fa-solid fa-virus-covid', 1, '2022-06-30 01:49:28', '2022-06-29 20:03:52'),
(9, NULL, 'Usuarios', 'users', '', 'fa-solid fa-users', 1, '2022-04-19 23:20:11', '2022-04-19 17:21:35');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisos`
--

DROP TABLE IF EXISTS `permisos`;
CREATE TABLE `permisos` (
  `id` int(11) NOT NULL,
  `id_rol` int(11) NOT NULL,
  `id_page` int(11) NOT NULL,
  `c` int(11) NOT NULL DEFAULT 0,
  `r` int(11) NOT NULL DEFAULT 0,
  `u` int(11) NOT NULL DEFAULT 0,
  `d` int(11) NOT NULL DEFAULT 0,
  `creado` datetime NOT NULL,
  `actualizado` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `permisos`
--

INSERT INTO `permisos` (`id`, `id_rol`, `id_page`, `c`, `r`, `u`, `d`, `creado`, `actualizado`) VALUES
(2, 1, 2, 1, 1, 1, 1, '2022-04-30 20:18:15', '2022-04-30 14:18:25'),
(3, 1, 3, 1, 1, 1, 1, '2022-05-01 16:10:24', '2022-05-01 10:10:56'),
(4, 1, 4, 1, 1, 1, 1, '2022-05-01 04:26:24', '2022-04-30 22:26:41'),
(5, 1, 5, 1, 1, 1, 1, '2022-05-01 16:11:58', '2022-05-01 10:13:24'),
(6, 1, 6, 1, 1, 1, 1, '2022-05-01 16:11:58', '2022-05-01 10:13:24'),
(7, 1, 7, 1, 1, 1, 1, '2022-05-01 16:11:58', '2022-05-01 10:13:24'),
(8, 1, 8, 1, 1, 1, 1, '2022-05-01 16:11:58', '2022-05-01 10:13:24'),
(9, 1, 9, 1, 1, 1, 1, '2022-06-30 02:10:29', '2022-06-29 20:11:02');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles` (
  `id_rol` int(11) NOT NULL,
  `nombre_rol` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `descripcion` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id_rol`, `nombre_rol`, `descripcion`, `status`) VALUES
(1, 'Administrador', '', 1),
(2, 'Secretari@', '', 1),
(3, 'website', '', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `TMBCH_CAM`
--

DROP TABLE IF EXISTS `TMBCH_CAM`;
CREATE TABLE `TMBCH_CAM` (
  `TMCAM_NC` int(11) NOT NULL,
  `TMCTO_NC` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `TMBCH_CAM`
--

INSERT INTO `TMBCH_CAM` (`TMCAM_NC`, `TMCTO_NC`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 2),
(6, 2),
(7, 2),
(8, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `TMBCH_CTO`
--

DROP TABLE IF EXISTS `TMBCH_CTO`;
CREATE TABLE `TMBCH_CTO` (
  `TMCTO_NC` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `TMBCH_CTO`
--

INSERT INTO `TMBCH_CTO` (`TMCTO_NC`) VALUES
(1),
(2),
(3),
(4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `TMBCH_EDO`
--

DROP TABLE IF EXISTS `TMBCH_EDO`;
CREATE TABLE `TMBCH_EDO` (
  `TMEDO_CE` int(11) NOT NULL,
  `TMEDO_NO` varchar(250) CHARACTER SET utf8 NOT NULL,
  `iso_3166-2` varchar(4) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `TMBCH_EDO`
--

INSERT INTO `TMBCH_EDO` (`TMEDO_CE`, `TMEDO_NO`, `iso_3166-2`) VALUES
(1, 'Amazonas', 'VE-X'),
(2, 'Anzoátegui', 'VE-B'),
(3, 'Apure', 'VE-C'),
(4, 'Aragua', 'VE-D'),
(5, 'Barinas', 'VE-E'),
(6, 'Bolívar', 'VE-F'),
(7, 'Carabobo', 'VE-G'),
(8, 'Cojedes', 'VE-H'),
(9, 'Delta Amacuro', 'VE-Y'),
(10, 'Falcón', 'VE-I'),
(11, 'Guárico', 'VE-J'),
(12, 'Lara', 'VE-K'),
(13, 'Mérida', 'VE-L'),
(14, 'Miranda', 'VE-M'),
(15, 'Monagas', 'VE-N'),
(16, 'Nueva Esparta', 'VE-O'),
(17, 'Portuguesa', 'VE-P'),
(18, 'Sucre', 'VE-R'),
(19, 'Táchira', 'VE-S'),
(20, 'Trujillo', 'VE-T'),
(21, 'La Guaira', 'VE-W'),
(22, 'Yaracuy', 'VE-U'),
(23, 'Zulia', 'VE-V'),
(24, 'Distrito Capital', 'VE-A'),
(25, 'Dependencias Federales', 'VE-Z');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `TMBCH_ESP`
--

DROP TABLE IF EXISTS `TMBCH_ESP`;
CREATE TABLE `TMBCH_ESP` (
  `TMESP_ID` int(11) NOT NULL,
  `TMESP_CE` varchar(7) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `TMESP_NO` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `TMESP_DE` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `TMBCH_ESP`
--

INSERT INTO `TMBCH_ESP` (`TMESP_ID`, `TMESP_CE`, `TMESP_NO`, `TMESP_DE`) VALUES
(1, 'HRR-MG1', 'Medico general', 'profesional de la medicina que cuenta con los conocimientos y las destrezas necesarias para diagnosticar y resolver con tratamiento medico'),
(5, 'HRR-MG2', 'Cardiologo', 'Revisa el corazao'),
(6, 'HRR-DFS', 'Oftamologo', 'Revista vista');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `TMBCH_MED`
--

DROP TABLE IF EXISTS `TMBCH_MED`;
CREATE TABLE `TMBCH_MED` (
  `TMMED_MID` int(11) NOT NULL,
  `TMMED_CI` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `TMMUN_CM` int(11) NOT NULL,
  `TMMED_DIR` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `TMMED_AP` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `TMMED_NO` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `TMMED_TF` varchar(12) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `TMESP_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `TMBCH_MED`
--

INSERT INTO `TMBCH_MED` (`TMMED_MID`, `TMMED_CI`, `TMMUN_CM`, `TMMED_DIR`, `TMMED_AP`, `TMMED_NO`, `TMMED_TF`, `TMESP_ID`) VALUES
(1, 'V-27394396', 6, 'Centro, carrera 8, entre calles 9 y 10', 'Saavedraa', 'kevin', '04165026559', 1),
(3, 'V-27364259', 2, 'Centro diagonal a al iglesia coromoto', 'Carmona', 'Maria Evita', '4265740027', 1),
(5, 'V-24589980', 6, 'Barrio obrero', 'Zambrano Prereiraa', 'Camilas', '04165895214', 5),
(6, 'V-27495433', 2, 'aadsfsad', 'Lius', 'Alejandro', '432423424', 1),
(7, 'V-32594658', 350, 'El abejal vereda 10 parte alta, sector la flores', 'Paredes Jacome', 'Orlando JosÃ©', '657857', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `TMBCH_MUN`
--

DROP TABLE IF EXISTS `TMBCH_MUN`;
CREATE TABLE `TMBCH_MUN` (
  `TMMUN_CM` int(11) NOT NULL,
  `TMEDO_CE` int(11) NOT NULL,
  `TMMUN_NO` varchar(100) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `TMBCH_MUN`
--

INSERT INTO `TMBCH_MUN` (`TMMUN_CM`, `TMEDO_CE`, `TMMUN_NO`) VALUES
(1, 1, 'Alto Orinoco'),
(2, 1, 'Atabapo'),
(3, 1, 'Atures'),
(4, 1, 'Autana'),
(5, 1, 'Manapiare'),
(6, 1, 'Maroa'),
(7, 1, 'Río Negro'),
(8, 2, 'Anaco'),
(9, 2, 'Aragua'),
(10, 2, 'Manuel Ezequiel Bruzual'),
(11, 2, 'Diego Bautista Urbaneja'),
(12, 2, 'Fernando Peñalver'),
(13, 2, 'Francisco Del Carmen Carvajal'),
(14, 2, 'General Sir Arthur McGregor'),
(15, 2, 'Guanta'),
(16, 2, 'Independencia'),
(17, 2, 'José Gregorio Monagas'),
(18, 2, 'Juan Antonio Sotillo'),
(19, 2, 'Juan Manuel Cajigal'),
(20, 2, 'Libertad'),
(21, 2, 'Francisco de Miranda'),
(22, 2, 'Pedro María Freites'),
(23, 2, 'Píritu'),
(24, 2, 'San José de Guanipa'),
(25, 2, 'San Juan de Capistrano'),
(26, 2, 'Santa Ana'),
(27, 2, 'Simón Bolívar'),
(28, 2, 'Simón Rodríguez'),
(29, 3, 'Achaguas'),
(30, 3, 'Biruaca'),
(31, 3, 'Muñóz'),
(32, 3, 'Páez'),
(33, 3, 'Pedro Camejo'),
(34, 3, 'Rómulo Gallegos'),
(35, 3, 'San Fernando'),
(36, 4, 'Atanasio Girardot'),
(37, 4, 'Bolívar'),
(38, 4, 'Camatagua'),
(39, 4, 'Francisco Linares Alcántara'),
(40, 4, 'José Ángel Lamas'),
(41, 4, 'José Félix Ribas'),
(42, 4, 'José Rafael Revenga'),
(43, 4, 'Libertador'),
(44, 4, 'Mario Briceño Iragorry'),
(45, 4, 'Ocumare de la Costa de Oro'),
(46, 4, 'San Casimiro'),
(47, 4, 'San Sebastián'),
(48, 4, 'Santiago Mariño'),
(49, 4, 'Santos Michelena'),
(50, 4, 'Sucre'),
(51, 4, 'Tovar'),
(52, 4, 'Urdaneta'),
(53, 4, 'Zamora'),
(54, 5, 'Alberto Arvelo Torrealba'),
(55, 5, 'Andrés Eloy Blanco'),
(56, 5, 'Antonio José de Sucre'),
(57, 5, 'Arismendi'),
(58, 5, 'Barinas'),
(59, 5, 'Bolívar'),
(60, 5, 'Cruz Paredes'),
(61, 5, 'Ezequiel Zamora'),
(62, 5, 'Obispos'),
(63, 5, 'Pedraza'),
(64, 5, 'Rojas'),
(65, 5, 'Sosa'),
(66, 6, 'Caroní'),
(67, 6, 'Cedeño'),
(68, 6, 'El Callao'),
(69, 6, 'Gran Sabana'),
(70, 6, 'Heres'),
(71, 6, 'Piar'),
(72, 6, 'Angostura (Raúl Leoni)'),
(73, 6, 'Roscio'),
(74, 6, 'Sifontes'),
(75, 6, 'Sucre'),
(76, 6, 'Padre Pedro Chien'),
(77, 7, 'Bejuma'),
(78, 7, 'Carlos Arvelo'),
(79, 7, 'Diego Ibarra'),
(80, 7, 'Guacara'),
(81, 7, 'Juan José Mora'),
(82, 7, 'Libertador'),
(83, 7, 'Los Guayos'),
(84, 7, 'Miranda'),
(85, 7, 'Montalbán'),
(86, 7, 'Naguanagua'),
(87, 7, 'Puerto Cabello'),
(88, 7, 'San Diego'),
(89, 7, 'San Joaquín'),
(90, 7, 'Valencia'),
(91, 8, 'Anzoátegui'),
(92, 8, 'Tinaquillo'),
(93, 8, 'Girardot'),
(94, 8, 'Lima Blanco'),
(95, 8, 'Pao de San Juan Bautista'),
(96, 8, 'Ricaurte'),
(97, 8, 'Rómulo Gallegos'),
(98, 8, 'San Carlos'),
(99, 8, 'Tinaco'),
(100, 9, 'Antonio Díaz'),
(101, 9, 'Casacoima'),
(102, 9, 'Pedernales'),
(103, 9, 'Tucupita'),
(104, 10, 'Acosta'),
(105, 10, 'Bolívar'),
(106, 10, 'Buchivacoa'),
(107, 10, 'Cacique Manaure'),
(108, 10, 'Carirubana'),
(109, 10, 'Colina'),
(110, 10, 'Dabajuro'),
(111, 10, 'Democracia'),
(112, 10, 'Falcón'),
(113, 10, 'Federación'),
(114, 10, 'Jacura'),
(115, 10, 'José Laurencio Silva'),
(116, 10, 'Los Taques'),
(117, 10, 'Mauroa'),
(118, 10, 'Miranda'),
(119, 10, 'Monseñor Iturriza'),
(120, 10, 'Palmasola'),
(121, 10, 'Petit'),
(122, 10, 'Píritu'),
(123, 10, 'San Francisco'),
(124, 10, 'Sucre'),
(125, 10, 'Tocópero'),
(126, 10, 'Unión'),
(127, 10, 'Urumaco'),
(128, 10, 'Zamora'),
(129, 11, 'Camaguán'),
(130, 11, 'Chaguaramas'),
(131, 11, 'El Socorro'),
(132, 11, 'José Félix Ribas'),
(133, 11, 'José Tadeo Monagas'),
(134, 11, 'Juan Germán Roscio'),
(135, 11, 'Julián Mellado'),
(136, 11, 'Las Mercedes'),
(137, 11, 'Leonardo Infante'),
(138, 11, 'Pedro Zaraza'),
(139, 11, 'Ortíz'),
(140, 11, 'San Gerónimo de Guayabal'),
(141, 11, 'San José de Guaribe'),
(142, 11, 'Santa María de Ipire'),
(143, 11, 'Sebastián Francisco de Miranda'),
(144, 12, 'Andrés Eloy Blanco'),
(145, 12, 'Crespo'),
(146, 12, 'Iribarren'),
(147, 12, 'Jiménez'),
(148, 12, 'Morán'),
(149, 12, 'Palavecino'),
(150, 12, 'Simón Planas'),
(151, 12, 'Torres'),
(152, 12, 'Urdaneta'),
(179, 13, 'Alberto Adriani'),
(180, 13, 'Andrés Bello'),
(181, 13, 'Antonio Pinto Salinas'),
(182, 13, 'Aricagua'),
(183, 13, 'Arzobispo Chacón'),
(184, 13, 'Campo Elías'),
(185, 13, 'Caracciolo Parra Olmedo'),
(186, 13, 'Cardenal Quintero'),
(187, 13, 'Guaraque'),
(188, 13, 'Julio César Salas'),
(189, 13, 'Justo Briceño'),
(190, 13, 'Libertador'),
(191, 13, 'Miranda'),
(192, 13, 'Obispo Ramos de Lora'),
(193, 13, 'Padre Noguera'),
(194, 13, 'Pueblo Llano'),
(195, 13, 'Rangel'),
(196, 13, 'Rivas Dávila'),
(197, 13, 'Santos Marquina'),
(198, 13, 'Sucre'),
(199, 13, 'Tovar'),
(200, 13, 'Tulio Febres Cordero'),
(201, 13, 'Zea'),
(223, 14, 'Acevedo'),
(224, 14, 'Andrés Bello'),
(225, 14, 'Baruta'),
(226, 14, 'Brión'),
(227, 14, 'Buroz'),
(228, 14, 'Carrizal'),
(229, 14, 'Chacao'),
(230, 14, 'Cristóbal Rojas'),
(231, 14, 'El Hatillo'),
(232, 14, 'Guaicaipuro'),
(233, 14, 'Independencia'),
(234, 14, 'Lander'),
(235, 14, 'Los Salias'),
(236, 14, 'Páez'),
(237, 14, 'Paz Castillo'),
(238, 14, 'Pedro Gual'),
(239, 14, 'Plaza'),
(240, 14, 'Simón Bolívar'),
(241, 14, 'Sucre'),
(242, 14, 'Urdaneta'),
(243, 14, 'Zamora'),
(258, 15, 'Acosta'),
(259, 15, 'Aguasay'),
(260, 15, 'Bolívar'),
(261, 15, 'Caripe'),
(262, 15, 'Cedeño'),
(263, 15, 'Ezequiel Zamora'),
(264, 15, 'Libertador'),
(265, 15, 'Maturín'),
(266, 15, 'Piar'),
(267, 15, 'Punceres'),
(268, 15, 'Santa Bárbara'),
(269, 15, 'Sotillo'),
(270, 15, 'Uracoa'),
(271, 16, 'Antolín del Campo'),
(272, 16, 'Arismendi'),
(273, 16, 'García'),
(274, 16, 'Gómez'),
(275, 16, 'Maneiro'),
(276, 16, 'Marcano'),
(277, 16, 'Mariño'),
(278, 16, 'Península de Macanao'),
(279, 16, 'Tubores'),
(280, 16, 'Villalba'),
(281, 16, 'Díaz'),
(282, 17, 'Agua Blanca'),
(283, 17, 'Araure'),
(284, 17, 'Esteller'),
(285, 17, 'Guanare'),
(286, 17, 'Guanarito'),
(287, 17, 'Monseñor José Vicente de Unda'),
(288, 17, 'Ospino'),
(289, 17, 'Páez'),
(290, 17, 'Papelón'),
(291, 17, 'San Genaro de Boconoíto'),
(292, 17, 'San Rafael de Onoto'),
(293, 17, 'Santa Rosalía'),
(294, 17, 'Sucre'),
(295, 17, 'Turén'),
(296, 18, 'Andrés Eloy Blanco'),
(297, 18, 'Andrés Mata'),
(298, 18, 'Arismendi'),
(299, 18, 'Benítez'),
(300, 18, 'Bermúdez'),
(301, 18, 'Bolívar'),
(302, 18, 'Cajigal'),
(303, 18, 'Cruz Salmerón Acosta'),
(304, 18, 'Libertador'),
(305, 18, 'Mariño'),
(306, 18, 'Mejía'),
(307, 18, 'Montes'),
(308, 18, 'Ribero'),
(309, 18, 'Sucre'),
(310, 18, 'Valdéz'),
(341, 19, 'Andrés Bello'),
(342, 19, 'Antonio Rómulo Costa'),
(343, 19, 'Ayacucho'),
(344, 19, 'Bolívar'),
(345, 19, 'Cárdenas'),
(346, 19, 'Córdoba'),
(347, 19, 'Fernández Feo'),
(348, 19, 'Francisco de Miranda'),
(349, 19, 'García de Hevia'),
(350, 19, 'Guásimos'),
(351, 19, 'Independencia'),
(352, 19, 'Jáuregui'),
(353, 19, 'José María Vargas'),
(354, 19, 'Junín'),
(355, 19, 'Libertad'),
(356, 19, 'Libertador'),
(357, 19, 'Lobatera'),
(358, 19, 'Michelena'),
(359, 19, 'Panamericano'),
(360, 19, 'Pedro María Ureña'),
(361, 19, 'Rafael Urdaneta'),
(362, 19, 'Samuel Darío Maldonado'),
(363, 19, 'San Cristóbal'),
(364, 19, 'Seboruco'),
(365, 19, 'Simón Rodríguez'),
(366, 19, 'Sucre'),
(367, 19, 'Torbes'),
(368, 19, 'Uribante'),
(369, 19, 'San Judas Tadeo'),
(370, 20, 'Andrés Bello'),
(371, 20, 'Boconó'),
(372, 20, 'Bolívar'),
(373, 20, 'Candelaria'),
(374, 20, 'Carache'),
(375, 20, 'Escuque'),
(376, 20, 'José Felipe Márquez Cañizalez'),
(377, 20, 'Juan Vicente Campos Elías'),
(378, 20, 'La Ceiba'),
(379, 20, 'Miranda'),
(380, 20, 'Monte Carmelo'),
(381, 20, 'Motatán'),
(382, 20, 'Pampán'),
(383, 20, 'Pampanito'),
(384, 20, 'Rafael Rangel'),
(385, 20, 'San Rafael de Carvajal'),
(386, 20, 'Sucre'),
(387, 20, 'Trujillo'),
(388, 20, 'Urdaneta'),
(389, 20, 'Valera'),
(390, 21, 'Vargas'),
(391, 22, 'Arístides Bastidas'),
(392, 22, 'Bolívar'),
(407, 22, 'Bruzual'),
(408, 22, 'Cocorote'),
(409, 22, 'Independencia'),
(410, 22, 'José Antonio Páez'),
(411, 22, 'La Trinidad'),
(412, 22, 'Manuel Monge'),
(413, 22, 'Nirgua'),
(414, 22, 'Peña'),
(415, 22, 'San Felipe'),
(416, 22, 'Sucre'),
(417, 22, 'Urachiche'),
(418, 22, 'José Joaquín Veroes'),
(441, 23, 'Almirante Padilla'),
(442, 23, 'Baralt'),
(443, 23, 'Cabimas'),
(444, 23, 'Catatumbo'),
(445, 23, 'Colón'),
(446, 23, 'Francisco Javier Pulgar'),
(447, 23, 'Páez'),
(448, 23, 'Jesús Enrique Losada'),
(449, 23, 'Jesús María Semprún'),
(450, 23, 'La Cañada de Urdaneta'),
(451, 23, 'Lagunillas'),
(452, 23, 'Machiques de Perijá'),
(453, 23, 'Mara'),
(454, 23, 'Maracaibo'),
(455, 23, 'Miranda'),
(456, 23, 'Rosario de Perijá'),
(457, 23, 'San Francisco'),
(458, 23, 'Santa Rita'),
(459, 23, 'Simón Bolívar'),
(460, 23, 'Sucre'),
(461, 23, 'Valmore Rodríguez'),
(462, 24, 'Libertador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `TMBCH_PAC`
--

DROP TABLE IF EXISTS `TMBCH_PAC`;
CREATE TABLE `TMBCH_PAC` (
  `TMPAC_PID` int(11) NOT NULL,
  `TMPAC_CI` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `TMMUN_CM` int(11) NOT NULL,
  `TMPAC_NO` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `TMPAC_AP` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `TMPAC_SX` enum('m','f') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `TMPAC_DIR` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `TMPAC_FN` date NOT NULL,
  `TMPAC_TF` varchar(12) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `TMBCH_PAC`
--

INSERT INTO `TMBCH_PAC` (`TMPAC_PID`, `TMPAC_CI`, `TMMUN_CM`, `TMPAC_NO`, `TMPAC_AP`, `TMPAC_SX`, `TMPAC_DIR`, `TMPAC_FN`, `TMPAC_TF`) VALUES
(2, '24896666', 6, 'Maria Antonieta', 'Sanchez', 'f', 'Capacho', '1998-04-17', '04248963333'),
(5, '27364259', 4, 'Camila ', 'Becerra', 'f', 'Barrio obrero', '2004-04-22', '04248965545'),
(7, '27394396', 2, 'Kevin Leonardo', 'Saavedra Carmona', 'm', 'Avenida principal', '2000-07-13', '04165026559'),
(35, '27456789', 6, 'John', 'Becerra', 'm', 'Barrio obrero', '1997-06-26', '04165026559'),
(51, '26548693', 370, 'Morbius', 'Michael', 'm', 'Centro, carrera 8, entre calles 9 y 10', '1980-06-18', '04165895214'),
(60, 'V-32594658', 1, 'Orlando José', 'Paredes Jacome', 'm', 'El abejal vereda 10 parte alta, sector la flores', '2007-12-08', '54564564'),
(61, 'V-27395367', 1, 'Fermina', 'Michael', 'f', 'Centro, carrera 8, entre calles 9 y 10', '1995-07-13', '0416-5026559'),
(62, 'V-26548693', 370, 'Morbius', 'Michael', 'm', 'Centro, carrera 8, entre calles 9 y 10', '1980-06-18', '0416-5895214'),
(63, '2244862', 85, 'William', 'Hopkins', 'm', 'sdfasf', '1998-08-19', '0414-8579632'),
(67, '22589368', 149, 'Orlando', 'Hopkins', 'm', 'sdafasfd', '1992-07-01', '0414-8965742'),
(89, '24896145', 29, 'asfsaf', 'asfasf', 'm', 'asfasef', '2004-06-10', '0414-8885552'),
(90, '2457896', 1, 'safdasf', 'asfsafd', 'm', 'asfasf', '1998-07-22', '0412-5577224');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `TMBCH_VAE`
--

DROP TABLE IF EXISTS `TMBCH_VAE`;
CREATE TABLE `TMBCH_VAE` (
  `TMVAE_CV` int(11) NOT NULL,
  `TMVAE_NO` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `TMVAE_DE` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `TMVAE_FE` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `TMBCH_VAE`
--

INSERT INTO `TMBCH_VAE` (`TMVAE_CV`, `TMVAE_NO`, `TMVAE_DE`, `TMVAE_FE`) VALUES
(41, 'Sputnik', 'Vacuna de origen ruso, se requieren 2 dosis.', '2021-08-20'),
(42, 'Moderna', 'Hecha por moderna, requiere 3 dosis', '2019-02-19'),
(44, 'Jhonson&amp;Jhonson', 'Elaborada por J&J, cantidad de dosis 1', '2021-06-16');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `TTBCH_ADP`
--

DROP TABLE IF EXISTS `TTBCH_ADP`;
CREATE TABLE `TTBCH_ADP` (
  `TTADP_FE` datetime NOT NULL,
  `TTADP_EST` text CHARACTER SET utf8mb4 NOT NULL,
  `TTHOS_CDH` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `TTBCH_CHD`
--

DROP TABLE IF EXISTS `TTBCH_CHD`;
CREATE TABLE `TTBCH_CHD` (
  `TTHOS_HC` time NOT NULL,
  `TTHOS_TA` int(11) NOT NULL,
  `TTHOS-TP` float NOT NULL,
  `TTHOS_OX` int(11) NOT NULL,
  `TTHOS_OB` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `TTHOS_CDH` int(11) NOT NULL,
  `TMMED_MID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `TTBCH_CON`
--

DROP TABLE IF EXISTS `TTBCH_CON`;
CREATE TABLE `TTBCH_CON` (
  `TTCON_CC` int(11) NOT NULL,
  `TMPAC_PID` int(11) NOT NULL,
  `TTCON_FE` datetime NOT NULL DEFAULT current_timestamp(),
  `TTCON_PC` enum('positivo','negativo') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `TTCON_TP` float NOT NULL,
  `TTCON_PE` float NOT NULL,
  `TTCON_SI` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `TTCON_DI` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `TTCON_TM` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `TMMED_MID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `TTBCH_CON`
--

INSERT INTO `TTBCH_CON` (`TTCON_CC`, `TMPAC_PID`, `TTCON_FE`, `TTCON_PC`, `TTCON_TP`, `TTCON_PE`, `TTCON_SI`, `TTCON_DI`, `TTCON_TM`, `TMMED_MID`) VALUES
(19, 2, '2022-07-03 18:40:57', 'positivo', 38, 66, 'Dolor de cabeza y diarrea', 'Tiene Covid', 'Cama reposo oxigeno y un unguento', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `TTBCH_HIFO`
--

DROP TABLE IF EXISTS `TTBCH_HIFO`;
CREATE TABLE `TTBCH_HIFO` (
  `TTHIFO_CDH` int(11) NOT NULL,
  `TTHIFO_FI` datetime NOT NULL DEFAULT current_timestamp(),
  `TTHIFO_NC` int(11) NOT NULL,
  `TMPAC_PID` int(11) NOT NULL,
  `TTHIFO_ST` enum('HOSPITALIZADO','DE ALTA') CHARACTER SET utf8mb4 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `TTBCH_HIFO`
--

INSERT INTO `TTBCH_HIFO` (`TTHIFO_CDH`, `TTHIFO_FI`, `TTHIFO_NC`, `TMPAC_PID`, `TTHIFO_ST`) VALUES
(6, '2022-07-06 17:23:26', 7, 7, 'HOSPITALIZADO'),
(7, '2022-07-07 05:49:25', 3, 5, 'HOSPITALIZADO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `TTBCH_VAP`
--

DROP TABLE IF EXISTS `TTBCH_VAP`;
CREATE TABLE `TTBCH_VAP` (
  `TTVAP_FA` date NOT NULL DEFAULT current_timestamp(),
  `TTVAP_ND` int(11) DEFAULT NULL,
  `TMVAE_CV` int(11) DEFAULT NULL,
  `TMPAC_PID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Disparadores `TTBCH_VAP`
--
DROP TRIGGER IF EXISTS `vacunaApl`;
DELIMITER $$
CREATE TRIGGER `vacunaApl` AFTER INSERT ON `TTBCH_VAP` FOR EACH ROW BEGIN
DECLARE idV int DEFAULT 0;
DECLARE uintV int DEFAULT 0;
SET @idV=new.TMVAE_CV;
UPDATE TTBCH_VSTK SET TTVST_VQT = TTVST_VQT-1 WHERE TMVAE_CV = @idV;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `TTBCH_VSTK`
--

DROP TABLE IF EXISTS `TTBCH_VSTK`;
CREATE TABLE `TTBCH_VSTK` (
  `TMVAE_CV` int(11) NOT NULL,
  `TTVST_VQT` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `TTBCH_VSTK`
--

INSERT INTO `TTBCH_VSTK` (`TMVAE_CV`, `TTVST_VQT`) VALUES
(44, 740),
(42, 800),
(41, 889);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `Id_rol` int(11) NOT NULL,
  `nombre` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `telefono` varchar(20) CHARACTER SET utf8mb4 NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `Id_rol`, `nombre`, `email`, `telefono`, `password`) VALUES
(11, 1, 'kevin', 'kevinsaavedra55@gmail.com', '04165026559', '9a76db68a30bebc9d0b74caff652000fb2aa9ea301f915388efb590035ab6404'),
(12, 2, 'Maria Evita', 'mariaevita06@gmail.com', '04265740027', '5260b47cf81aa8cf442431536dd516f05254d2be64e6037dd99c67c93e008c16'),
(13, 3, 'Oriany', 'oriany9570@gmail.com', '04265702722', 'a61d357b8275d2c738f9aa7c58e79316c8d82edc18044c09698ebbfaae5ac5e9'),
(14, 1, 'Admin', 'admin@admin.com', '04165026559', '41e5653fc7aeb894026d6bb7b2db7f65902b454945fa8fd65a6327047b5277fb'),
(15, 1, 'Orlando', 'tatoparedes0812@gmail.com', '0416852468', '15e2b0d3c33891ebb0f1ef609ec419420c20e320ce94c65fbc8c3312448eb225');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menu_submenu` (`menu_id`);

--
-- Indices de la tabla `permisos`
--
ALTER TABLE `permisos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_rol` (`id_rol`),
  ADD KEY `id_modulo` (`id_page`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id_rol`);

--
-- Indices de la tabla `TMBCH_CAM`
--
ALTER TABLE `TMBCH_CAM`
  ADD PRIMARY KEY (`TMCAM_NC`),
  ADD KEY `TMCTO-NC_idx` (`TMCTO_NC`);

--
-- Indices de la tabla `TMBCH_CTO`
--
ALTER TABLE `TMBCH_CTO`
  ADD PRIMARY KEY (`TMCTO_NC`);

--
-- Indices de la tabla `TMBCH_EDO`
--
ALTER TABLE `TMBCH_EDO`
  ADD PRIMARY KEY (`TMEDO_CE`);

--
-- Indices de la tabla `TMBCH_ESP`
--
ALTER TABLE `TMBCH_ESP`
  ADD PRIMARY KEY (`TMESP_ID`),
  ADD UNIQUE KEY `TMESP_CC` (`TMESP_CE`);

--
-- Indices de la tabla `TMBCH_MED`
--
ALTER TABLE `TMBCH_MED`
  ADD PRIMARY KEY (`TMMED_MID`),
  ADD UNIQUE KEY `TMMED_IC` (`TMMED_CI`),
  ADD UNIQUE KEY `TMMED_CI` (`TMMED_CI`),
  ADD UNIQUE KEY `TMMED_CI_2` (`TMMED_CI`),
  ADD KEY `TMESP-CE_idx` (`TMESP_ID`),
  ADD KEY `TMMUN-CM` (`TMMUN_CM`);

--
-- Indices de la tabla `TMBCH_MUN`
--
ALTER TABLE `TMBCH_MUN`
  ADD PRIMARY KEY (`TMMUN_CM`),
  ADD KEY `id_estado` (`TMEDO_CE`);

--
-- Indices de la tabla `TMBCH_PAC`
--
ALTER TABLE `TMBCH_PAC`
  ADD PRIMARY KEY (`TMPAC_PID`),
  ADD UNIQUE KEY `TMPAC_CI` (`TMPAC_CI`),
  ADD UNIQUE KEY `TMPAC_CI_2` (`TMPAC_CI`),
  ADD KEY `TMMUN-CM` (`TMMUN_CM`);

--
-- Indices de la tabla `TMBCH_VAE`
--
ALTER TABLE `TMBCH_VAE`
  ADD PRIMARY KEY (`TMVAE_CV`);

--
-- Indices de la tabla `TTBCH_ADP`
--
ALTER TABLE `TTBCH_ADP`
  ADD KEY `TTHOS_CH` (`TTHOS_CDH`);

--
-- Indices de la tabla `TTBCH_CHD`
--
ALTER TABLE `TTBCH_CHD`
  ADD KEY `TMMED-HCI_idx` (`TMMED_MID`),
  ADD KEY `TMMED_MID` (`TMMED_MID`),
  ADD KEY `TTHOS_CDH` (`TTHOS_CDH`);

--
-- Indices de la tabla `TTBCH_CON`
--
ALTER TABLE `TTBCH_CON`
  ADD PRIMARY KEY (`TTCON_CC`),
  ADD KEY `TMPAC-CI_idx` (`TMPAC_PID`),
  ADD KEY `TMMED-CCI_idx` (`TMMED_MID`),
  ADD KEY `TMMED_MID` (`TMMED_MID`);

--
-- Indices de la tabla `TTBCH_HIFO`
--
ALTER TABLE `TTBCH_HIFO`
  ADD PRIMARY KEY (`TTHIFO_CDH`),
  ADD KEY `TTCON_CC` (`TMPAC_PID`),
  ADD KEY `TTHOS_NC` (`TTHIFO_NC`);

--
-- Indices de la tabla `TTBCH_VAP`
--
ALTER TABLE `TTBCH_VAP`
  ADD KEY `TMVAE-CV_idx` (`TMVAE_CV`),
  ADD KEY `TMPAC-CI_idx` (`TMPAC_PID`);

--
-- Indices de la tabla `TTBCH_VSTK`
--
ALTER TABLE `TTBCH_VSTK`
  ADD KEY `VMVAE_CV` (`TMVAE_CV`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `Id_rol` (`Id_rol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `permisos`
--
ALTER TABLE `permisos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id_rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `TMBCH_CAM`
--
ALTER TABLE `TMBCH_CAM`
  MODIFY `TMCAM_NC` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `TMBCH_CTO`
--
ALTER TABLE `TMBCH_CTO`
  MODIFY `TMCTO_NC` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `TMBCH_EDO`
--
ALTER TABLE `TMBCH_EDO`
  MODIFY `TMEDO_CE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `TMBCH_ESP`
--
ALTER TABLE `TMBCH_ESP`
  MODIFY `TMESP_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `TMBCH_MED`
--
ALTER TABLE `TMBCH_MED`
  MODIFY `TMMED_MID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `TMBCH_MUN`
--
ALTER TABLE `TMBCH_MUN`
  MODIFY `TMMUN_CM` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=463;

--
-- AUTO_INCREMENT de la tabla `TMBCH_PAC`
--
ALTER TABLE `TMBCH_PAC`
  MODIFY `TMPAC_PID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT de la tabla `TMBCH_VAE`
--
ALTER TABLE `TMBCH_VAE`
  MODIFY `TMVAE_CV` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT de la tabla `TTBCH_CON`
--
ALTER TABLE `TTBCH_CON`
  MODIFY `TTCON_CC` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `TTBCH_HIFO`
--
ALTER TABLE `TTBCH_HIFO`
  MODIFY `TTHIFO_CDH` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `pages`
--
ALTER TABLE `pages`
  ADD CONSTRAINT `pages_ibfk_1` FOREIGN KEY (`menu_id`) REFERENCES `pages` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `permisos`
--
ALTER TABLE `permisos`
  ADD CONSTRAINT `permisos_ibfk_2` FOREIGN KEY (`id_rol`) REFERENCES `roles` (`id_rol`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `permisos_ibfk_3` FOREIGN KEY (`id_page`) REFERENCES `pages` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `TMBCH_CAM`
--
ALTER TABLE `TMBCH_CAM`
  ADD CONSTRAINT `TMBCH_CAM_ibfk_1` FOREIGN KEY (`TMCTO_NC`) REFERENCES `TMBCH_CTO` (`TMCTO_NC`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `TMBCH_MED`
--
ALTER TABLE `TMBCH_MED`
  ADD CONSTRAINT `TMBCH_MED_ibfk_3` FOREIGN KEY (`TMMUN_CM`) REFERENCES `TMBCH_MUN` (`TMMUN_CM`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `TMBCH_MED_ibfk_4` FOREIGN KEY (`TMESP_ID`) REFERENCES `TMBCH_ESP` (`TMESP_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `TMBCH_MUN`
--
ALTER TABLE `TMBCH_MUN`
  ADD CONSTRAINT `TMBCH_MUN_ibfk_1` FOREIGN KEY (`TMEDO_CE`) REFERENCES `TMBCH_EDO` (`TMEDO_CE`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `TMBCH_PAC`
--
ALTER TABLE `TMBCH_PAC`
  ADD CONSTRAINT `TMBCH_PAC_ibfk_1` FOREIGN KEY (`TMMUN_CM`) REFERENCES `TMBCH_MUN` (`TMMUN_CM`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `TTBCH_ADP`
--
ALTER TABLE `TTBCH_ADP`
  ADD CONSTRAINT `TTBCH_ADP_ibfk_1` FOREIGN KEY (`TTHOS_CDH`) REFERENCES `TTBCH_HIFO` (`TTHIFO_CDH`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `TTBCH_CHD`
--
ALTER TABLE `TTBCH_CHD`
  ADD CONSTRAINT `TTBCH_CHD_ibfk_1` FOREIGN KEY (`TTHOS_CDH`) REFERENCES `TTBCH_HIFO` (`TTHIFO_CDH`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `TTBCH_CHD_ibfk_2` FOREIGN KEY (`TMMED_MID`) REFERENCES `TMBCH_MED` (`TMMED_MID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `TTBCH_CON`
--
ALTER TABLE `TTBCH_CON`
  ADD CONSTRAINT `TTBCH_CON_ibfk_2` FOREIGN KEY (`TMMED_MID`) REFERENCES `TMBCH_MED` (`TMMED_MID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `TTBCH_CON_ibfk_3` FOREIGN KEY (`TMPAC_PID`) REFERENCES `TMBCH_PAC` (`TMPAC_PID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `TTBCH_HIFO`
--
ALTER TABLE `TTBCH_HIFO`
  ADD CONSTRAINT `TTBCH_HIFO_ibfk_2` FOREIGN KEY (`TTHIFO_NC`) REFERENCES `TMBCH_CAM` (`TMCAM_NC`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `TTBCH_HIFO_ibfk_3` FOREIGN KEY (`TMPAC_PID`) REFERENCES `TMBCH_PAC` (`TMPAC_PID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `TTBCH_VAP`
--
ALTER TABLE `TTBCH_VAP`
  ADD CONSTRAINT `TTBCH_VAP_ibfk_2` FOREIGN KEY (`TMVAE_CV`) REFERENCES `TMBCH_VAE` (`TMVAE_CV`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `TTBCH_VAP_ibfk_3` FOREIGN KEY (`TMPAC_PID`) REFERENCES `TMBCH_PAC` (`TMPAC_PID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `TTBCH_VSTK`
--
ALTER TABLE `TTBCH_VSTK`
  ADD CONSTRAINT `TTBCH_VSTK_ibfk_1` FOREIGN KEY (`TMVAE_CV`) REFERENCES `TMBCH_VAE` (`TMVAE_CV`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`Id_rol`) REFERENCES `roles` (`id_rol`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
