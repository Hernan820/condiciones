-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-02-2023 a las 05:01:36
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `condiciones`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bancos`
--

CREATE TABLE `bancos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre_banco` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `bancos`
--

INSERT INTO `bancos` (`id`, `nombre_banco`, `created_at`, `updated_at`) VALUES
(1, 'Nationwide', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `capturas`
--

CREATE TABLE `capturas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ruta_captura` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre_categoria` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `nombre_categoria`, `created_at`, `updated_at`) VALUES
(1, 'Personales', NULL, NULL),
(2, 'Trabajo', NULL, NULL),
(3, 'Listing broker', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre_cliente` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telefono` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `correo` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `direccion` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `direcionalternativa` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `socials_number` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tipe_client` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `nombre_cliente`, `telefono`, `correo`, `direccion`, `direcionalternativa`, `status`, `socials_number`, `tipe_client`, `created_at`, `updated_at`) VALUES
(1, 'Meridio', '(789) 789-7897', '', '', '', 'Tax ID', '65465646', '1', '2023-02-16 01:31:18', '2023-02-16 02:20:31'),
(2, 'Maximo', '(878) 979-8789', '', '', '', 'social', '', '0', '2023-02-16 01:31:18', '2023-02-16 01:31:18'),
(3, 'Alejandro', '(456) 489-7878', '', '', '', 'social', '', '1', '2023-02-16 01:44:12', '2023-02-16 01:44:12'),
(4, 'Fernandes', '(798) 787-9878', '', '', '', 'social', '', '0', '2023-02-16 01:44:12', '2023-02-16 01:44:12'),
(5, 'Hernan', '(546) 789-7879', '', '', '', 'Tax ID', '', '0', '2023-02-16 01:44:12', '2023-02-17 21:07:45'),
(6, 'hhhhhh', '(785) 789-7897', '', '', '', 'social', '', '1', '2023-02-16 01:45:29', '2023-02-16 01:45:29'),
(7, 'Jerson', '(455) 456-4564', '', '', '', 'social', '', '0', '2023-02-16 01:45:29', '2023-02-16 01:45:29'),
(8, 'Mariebl', '(448) 789-7897', '', '', '', 'social', '', '0', '2023-02-16 01:45:29', '2023-02-16 01:45:29'),
(9, 'Jhonason', '(546) 498-7498', '', '', '', 'social', '', '0', '2023-02-16 01:45:29', '2023-02-16 01:45:29');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes_registros`
--

CREATE TABLE `clientes_registros` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_cliente` bigint(20) UNSIGNED NOT NULL,
  `id_registro` bigint(20) UNSIGNED NOT NULL,
  `titular` int(11) DEFAULT NULL,
  `estado_clienteregistro` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `clientes_registros`
--

INSERT INTO `clientes_registros` (`id`, `id_cliente`, `id_registro`, `titular`, `estado_clienteregistro`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 1, '2023-02-16 01:31:18', '2023-02-16 01:31:18'),
(2, 2, 1, 0, 1, '2023-02-16 01:31:18', '2023-02-16 01:31:18'),
(3, 3, 2, 1, 1, '2023-02-16 01:44:12', '2023-02-16 01:44:12'),
(4, 4, 2, 0, 1, '2023-02-16 01:44:12', '2023-02-16 01:44:12'),
(5, 5, 2, 0, 1, '2023-02-16 01:44:12', '2023-02-16 01:44:12'),
(6, 6, 3, 1, 1, '2023-02-16 01:45:29', '2023-02-16 01:45:29'),
(7, 7, 3, 0, 1, '2023-02-16 01:45:29', '2023-02-16 01:45:29'),
(8, 8, 3, 0, 1, '2023-02-16 01:45:29', '2023-02-16 01:45:29'),
(9, 9, 3, 0, 1, '2023-02-16 01:45:29', '2023-02-16 01:45:29');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `companias`
--

CREATE TABLE `companias` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telefono` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `webSite` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estado_compania` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `companias`
--

INSERT INTO `companias` (`id`, `nombre`, `telefono`, `logo`, `webSite`, `estado_compania`, `created_at`, `updated_at`) VALUES
(1, 'Contigo Mortgage', '(631) 778-4562', NULL, NULL, NULL, NULL, NULL),
(4, 'dffgdsfsd', '(453) 456-4354', 'OUVC4xkjXtZYsEr8xlUocJ5kioLYzRycu0Km0SJN.png', 'gfdgfdgdfgdfgfd', '1', '2023-02-16 09:00:32', '2023-02-16 09:00:32');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `condiciones`
--

CREATE TABLE `condiciones` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `descripcion` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_registro` bigint(20) UNSIGNED NOT NULL,
  `estado` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_estado` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuestionarios`
--

CREATE TABLE `cuestionarios` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fecha` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `detalle` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `flag` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `cuestionarios`
--

INSERT INTO `cuestionarios` (`id`, `nombre`, `fecha`, `detalle`, `flag`, `created_at`, `updated_at`) VALUES
(1, 'Questionnaire1003', NULL, 'este cuestionario lo respondera el cliente', NULL, NULL, NULL),
(2, 'TRID', NULL, 'lo respondera el usuario del sistema', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuestionario_clientes`
--

CREATE TABLE `cuestionario_clientes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_cliente` bigint(20) UNSIGNED NOT NULL,
  `id_cuestionario` bigint(20) UNSIGNED NOT NULL,
  `checkcuestionario` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estado` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `cuestionario_clientes`
--

INSERT INTO `cuestionario_clientes` (`id`, `id_cliente`, `id_cuestionario`, `checkcuestionario`, `estado`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '1', NULL, '2023-02-16 01:31:18', '2023-02-16 01:31:18'),
(2, 1, 2, '1', NULL, '2023-02-16 01:31:18', '2023-02-16 01:31:18'),
(3, 2, 1, '1', NULL, '2023-02-16 01:31:18', '2023-02-16 01:31:18'),
(4, 2, 2, '1', NULL, '2023-02-16 01:31:18', '2023-02-16 01:31:18'),
(5, 3, 1, '1', NULL, '2023-02-16 01:44:12', '2023-02-16 01:44:12'),
(6, 3, 2, '1', NULL, '2023-02-16 01:44:12', '2023-02-16 01:44:12'),
(7, 4, 1, '1', NULL, '2023-02-16 01:44:12', '2023-02-16 01:44:12'),
(8, 4, 2, '1', NULL, '2023-02-16 01:44:12', '2023-02-16 01:44:12'),
(9, 5, 1, '1', NULL, '2023-02-16 01:44:12', '2023-02-16 01:44:12'),
(10, 5, 2, '1', NULL, '2023-02-16 01:44:12', '2023-02-16 01:44:12'),
(11, 6, 1, '1', NULL, '2023-02-16 01:45:29', '2023-02-16 01:45:29'),
(12, 6, 2, '1', NULL, '2023-02-16 01:45:29', '2023-02-16 01:45:29'),
(13, 7, 1, '1', NULL, '2023-02-16 01:45:29', '2023-02-16 01:45:29'),
(14, 7, 2, '1', NULL, '2023-02-16 01:45:29', '2023-02-16 01:45:29'),
(15, 8, 1, '1', NULL, '2023-02-16 01:45:29', '2023-02-16 01:45:29'),
(16, 8, 2, '1', NULL, '2023-02-16 01:45:29', '2023-02-16 01:45:29'),
(17, 9, 1, '1', NULL, '2023-02-16 01:45:29', '2023-02-16 01:45:29'),
(18, 9, 2, '1', NULL, '2023-02-16 01:45:29', '2023-02-16 01:45:29');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_documentos`
--

CREATE TABLE `detalle_documentos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_registro` bigint(20) UNSIGNED NOT NULL,
  `id_documento` bigint(20) UNSIGNED NOT NULL,
  `chekc_documento` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `detalle_documentos`
--

INSERT INTO `detalle_documentos` (`id`, `id_registro`, `id_documento`, `chekc_documento`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '1', '2023-02-16 00:14:06', '2023-02-16 23:07:11'),
(2, 1, 2, '1', '2023-02-16 00:14:06', '2023-02-16 00:14:06'),
(3, 1, 3, '1', '2023-02-16 00:14:06', '2023-02-16 00:14:06'),
(4, 1, 4, '1', '2023-02-16 00:14:06', '2023-02-16 02:21:08'),
(5, 1, 6, '1', '2023-02-16 00:14:06', '2023-02-16 00:14:06'),
(6, 1, 10, '1', '2023-02-16 00:14:06', '2023-02-16 00:14:06'),
(7, 2, 1, '1', '2023-02-16 01:09:39', '2023-02-16 01:09:39'),
(8, 2, 2, '1', '2023-02-16 01:09:39', '2023-02-16 01:09:39'),
(9, 2, 3, '1', '2023-02-16 01:09:39', '2023-02-16 01:09:39'),
(10, 2, 4, '1', '2023-02-16 01:09:39', '2023-02-16 01:09:39'),
(11, 2, 6, '1', '2023-02-16 01:09:39', '2023-02-16 01:09:39'),
(12, 2, 10, '1', '2023-02-16 01:09:39', '2023-02-17 03:16:38'),
(13, 1, 1, '1', '2023-02-16 01:31:18', '2023-02-16 23:07:13'),
(14, 1, 2, '1', '2023-02-16 01:31:18', '2023-02-16 01:31:18'),
(15, 1, 3, '1', '2023-02-16 01:31:18', '2023-02-16 01:31:18'),
(16, 1, 4, '1', '2023-02-16 01:31:18', '2023-02-16 01:31:18'),
(17, 1, 6, '1', '2023-02-16 01:31:18', '2023-02-16 23:07:09'),
(18, 1, 10, '1', '2023-02-16 01:31:18', '2023-02-16 02:21:06'),
(19, 2, 1, '1', '2023-02-16 01:44:12', '2023-02-16 01:44:12'),
(20, 2, 2, '1', '2023-02-16 01:44:12', '2023-02-16 01:44:12'),
(21, 2, 3, '0', '2023-02-16 01:44:12', '2023-02-16 01:44:12'),
(22, 2, 4, '1', '2023-02-16 01:44:12', '2023-02-16 01:44:12'),
(23, 2, 6, '1', '2023-02-16 01:44:12', '2023-02-16 01:44:12'),
(24, 2, 10, '1', '2023-02-16 01:44:12', '2023-02-16 01:44:12'),
(25, 3, 1, '1', '2023-02-16 01:45:29', '2023-02-16 01:45:29'),
(26, 3, 2, '1', '2023-02-16 01:45:29', '2023-02-16 01:45:29'),
(27, 3, 3, '1', '2023-02-16 01:45:29', '2023-02-16 01:45:29'),
(28, 3, 4, '1', '2023-02-16 01:45:29', '2023-02-16 01:45:29'),
(29, 3, 6, '1', '2023-02-16 01:45:29', '2023-02-16 01:45:29'),
(30, 3, 10, '1', '2023-02-16 01:45:29', '2023-02-16 03:13:25');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `documentos`
--

CREATE TABLE `documentos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre_doc` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estado_doc` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `documentos`
--

INSERT INTO `documentos` (`id`, `nombre_doc`, `estado_doc`, `created_at`, `updated_at`) VALUES
(1, 'SSN4343', 1, NULL, '2023-01-28 01:48:39'),
(2, 'Taxes 2020', 1, NULL, NULL),
(3, 'Taxes 2021', 1, NULL, NULL),
(4, 'Bank Statements', 1, NULL, NULL),
(5, 'ID', 0, NULL, '2023-01-28 01:14:48'),
(6, 'Pay Stubs', 1, NULL, NULL),
(7, 'Nuevo', 0, '2023-01-28 01:03:10', '2023-01-28 01:14:40'),
(8, 'ADD', 0, '2023-01-28 01:14:54', '2023-01-28 01:49:12'),
(9, 'ADD', 0, '2023-01-28 01:49:18', '2023-02-02 21:04:36'),
(10, 'ADD', 1, '2023-02-02 21:05:08', '2023-02-02 21:05:08');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estados`
--

CREATE TABLE `estados` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `estado` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `estados`
--

INSERT INTO `estados` (`id`, `estado`, `created_at`, `updated_at`) VALUES
(1, 'ACTIVOS', NULL, NULL),
(2, 'DAÑADOS', NULL, NULL),
(3, 'CANCELADOS', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `etapas`
--

CREATE TABLE `etapas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre_etapa` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `etapas`
--

INSERT INTO `etapas` (`id`, `nombre_etapa`, `created_at`, `updated_at`) VALUES
(1, 'files actives', NULL, NULL),
(2, 'files openig', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2023_01_17_231032_create_clientes_table', 1),
(2, '2023_01_18_161907_create_categorias_table', 2),
(3, '2023_01_17_231203_create_cuestionarios_table', 3),
(4, '2023_01_18_161930_create_cuestionario_clientes_table', 4),
(5, '2023_01_18_161649_create_preguntas_table', 5),
(6, '2023_01_18_161951_create_respuesta_clientes_table', 6),
(7, '2023_01_18_162137_create_documentos_table', 7),
(16, '2023_01_19_145500_create_companias_table', 12),
(21, '2023_01_22_160822_create_prestamos_table', 17),
(35, '2023_02_02_192903_create_etapas_table', 18),
(36, '2023_01_15_175229_create_registros_table', 19),
(37, '2023_01_15_175117_create_condiciones_table', 20),
(38, '2023_01_15_174730_create_seguimientos_table', 21),
(39, '2023_01_18_175428_create_detalle_documentos_table', 22),
(40, '2023_01_27_221640_create_clientes_registros_table', 23),
(41, '2023_02_02_192456_create_notas_table', 24),
(43, '2023_02_08_223904_create_nota_registros_table', 25);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(4, 'App/Model/User', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notas`
--

CREATE TABLE `notas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nota` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nombre_usuario` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_registro` bigint(20) UNSIGNED NOT NULL,
  `id_usuario` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nota_registros`
--

CREATE TABLE `nota_registros` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nota_registro` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nombre_usuario` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fecha` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hora` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_registro` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `nota_registros`
--

INSERT INTO `nota_registros` (`id`, `nota_registro`, `nombre_usuario`, `fecha`, `hora`, `id_registro`, `created_at`, `updated_at`) VALUES
(1, 'no puedo hacer nada por el momento', 'Felipe Hernandez', '2023-02-09', '15:16:22', 2, '2023-02-09 21:16:22', '2023-02-09 21:16:22'),
(2, 'Dijo que llamara durante el dia pra entragar todo', 'Felipe Hernandez', '2023-02-09', '09:18:49', 2, '2023-02-09 15:18:49', '2023-02-09 15:18:49'),
(3, 'solo falta un documento', 'Felipe Hernandez', '2023-02-09', '09:20:53', 2, '2023-02-09 15:20:53', '2023-02-09 15:20:53'),
(4, 'nada', 'Felipe Hernandez', '2023-02-10', '11:46:17', 1, '2023-02-10 17:46:17', '2023-02-10 17:46:17'),
(5, 'Ya actualice los demas docuemntos solo espero la aprobacion', 'Felipe Hernandez', '2023-02-14', '09:21:56', 2, '2023-02-14 15:21:56', '2023-02-14 15:21:56'),
(6, 'Que ondas probando nota', 'Felipe Hernandez', '2023-02-14', '09:34:35', 2, '2023-02-14 15:34:35', '2023-02-14 15:34:35'),
(7, 'kjhgkghkgjhkgjhk', 'Felipe Hernandez', '2023-02-14', '09:36:03', 2, '2023-02-14 15:36:03', '2023-02-14 15:36:03'),
(8, 'Maria', 'Felipe Hernandez', '2023-02-14', '09:36:47', 2, '2023-02-14 15:36:47', '2023-02-14 15:36:47'),
(9, 'prueba de nota', 'Felipe Hernandez', '2023-02-14', '09:45:44', 2, '2023-02-14 15:45:44', '2023-02-14 15:45:44'),
(10, 'ya funicona todo esto', 'Felipe Hernandez', '2023-02-15', '14:20:58', 1, '2023-02-15 20:20:58', '2023-02-15 20:20:58');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `preguntas`
--

CREATE TABLE `preguntas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `titulo_pregunta` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estado` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_cuestionario` bigint(20) UNSIGNED NOT NULL,
  `id_categoria` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `preguntas`
--

INSERT INTO `preguntas` (`id`, `titulo_pregunta`, `estado`, `id_cuestionario`, `id_categoria`, `created_at`, `updated_at`) VALUES
(1, 'Cuantos son los integrantes de tu familia?', '1', 2, 1, NULL, NULL),
(2, 'Cuantos años tienes?', '1', 2, 1, NULL, NULL),
(3, 'Continuas estudiando actualmente?', '1', 2, 1, NULL, NULL),
(4, 'Donde trabajas?', '1', 2, 2, NULL, NULL),
(5, 'Cuantos tiempos llevas en en tu actual trabajo?', '1', 2, 2, NULL, NULL),
(6, 'Record del cliente?', '1', 1, 3, NULL, NULL),
(7, 'etapa del cliente?', '1', 1, 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prestamos`
--

CREATE TABLE `prestamos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre_prestamo` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estado_prestamo` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `prestamos`
--

INSERT INTO `prestamos` (`id`, `nombre_prestamo`, `estado_prestamo`, `created_at`, `updated_at`) VALUES
(1, 'FHA', '1', NULL, NULL),
(2, 'Conventional', '1', NULL, NULL),
(3, 'Hard Money', '1', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registros`
--

CREATE TABLE `registros` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fecha_recepcion` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fecha_firma` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dowpayment` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `precio_casa` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estado` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `drive` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `num_prestamo` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `direccion_casa` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `notas` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `procesador` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telefono_precesador` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Appraisal` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `motivo` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_prestamo` bigint(20) UNSIGNED NOT NULL,
  `id_banco` bigint(20) UNSIGNED NOT NULL,
  `id_usuario` bigint(20) UNSIGNED NOT NULL,
  `id_compania` bigint(20) UNSIGNED NOT NULL,
  `id_estado` bigint(20) UNSIGNED NOT NULL,
  `id_etapa` bigint(20) UNSIGNED NOT NULL,
  `estado_registro` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `registros`
--

INSERT INTO `registros` (`id`, `fecha_recepcion`, `fecha_firma`, `dowpayment`, `precio_casa`, `estado`, `drive`, `num_prestamo`, `direccion_casa`, `notas`, `procesador`, `telefono_precesador`, `Appraisal`, `motivo`, `id_prestamo`, `id_banco`, `id_usuario`, `id_compania`, `id_estado`, `id_etapa`, `estado_registro`, `created_at`, `updated_at`) VALUES
(1, '02/16/2023 4:24 PM', '02/23/2023', '', '2023-02-19T18:53', 'Dakota del Norte', '', NULL, '', 'fsdfdsf', '', '', NULL, NULL, 1, 1, 1, 1, 1, 1, '1', '2023-02-16 01:31:18', '2023-02-20 08:13:58'),
(2, 'undefined', 'undefined', '44%', '4retrwerwe', 'Connecticut', 'ijiojoi', NULL, '54354', '', 'ghghj', '(342) 434-3243', NULL, NULL, 1, 1, 1, 1, 2, 1, '1', '2023-02-16 01:44:12', '2023-02-20 02:49:20'),
(3, '02/18/2023 1:45 PM', '02/07/2023', '', '', 'Dakota del Sur', '', NULL, '', 'GFDGFDG', '', '', NULL, NULL, 1, 1, 1, 1, 1, 2, '1', '2023-02-16 01:45:29', '2023-02-16 03:18:05');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `respuesta_clientes`
--

CREATE TABLE `respuesta_clientes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_cuestionario_clientes` bigint(20) UNSIGNED NOT NULL,
  `id_pregunta` bigint(20) UNSIGNED NOT NULL,
  `respuesta` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `respuesta_clientes`
--

INSERT INTO `respuesta_clientes` (`id`, `id_cuestionario_clientes`, `id_pregunta`, `respuesta`, `created_at`, `updated_at`) VALUES
(1, 1, 6, '', '2023-02-16 01:31:18', '2023-02-16 02:20:00'),
(2, 1, 7, 'lejos', '2023-02-16 01:31:18', '2023-02-16 02:13:01'),
(3, 2, 1, '', '2023-02-16 01:31:18', '2023-02-16 01:31:18'),
(4, 2, 2, '34', '2023-02-16 01:31:18', '2023-02-16 02:13:27'),
(5, 2, 3, '', '2023-02-16 01:31:18', '2023-02-16 01:31:18'),
(6, 2, 4, '', '2023-02-16 01:31:18', '2023-02-16 01:31:18'),
(7, 2, 5, '', '2023-02-16 01:31:18', '2023-02-16 01:31:18'),
(8, 3, 6, 'qwwq', '2023-02-16 01:31:18', '2023-02-16 02:07:47'),
(9, 3, 7, 'avanzado', '2023-02-16 01:31:18', '2023-02-16 02:13:12'),
(10, 4, 1, '', '2023-02-16 01:31:18', '2023-02-16 01:31:18'),
(11, 4, 2, '27', '2023-02-16 01:31:18', '2023-02-16 02:13:33'),
(12, 4, 3, '', '2023-02-16 01:31:18', '2023-02-16 01:31:18'),
(13, 4, 4, '', '2023-02-16 01:31:18', '2023-02-16 01:31:18'),
(14, 4, 5, '', '2023-02-16 01:31:18', '2023-02-16 01:31:18'),
(15, 5, 6, '', '2023-02-16 01:44:12', '2023-02-16 01:44:12'),
(16, 5, 7, '', '2023-02-16 01:44:12', '2023-02-16 01:44:12'),
(17, 6, 1, '', '2023-02-16 01:44:12', '2023-02-16 01:44:12'),
(18, 6, 2, '', '2023-02-16 01:44:12', '2023-02-16 01:44:12'),
(19, 6, 3, '', '2023-02-16 01:44:12', '2023-02-16 01:44:12'),
(20, 6, 4, '', '2023-02-16 01:44:12', '2023-02-16 01:44:12'),
(21, 6, 5, '', '2023-02-16 01:44:12', '2023-02-16 01:44:12'),
(22, 7, 6, '', '2023-02-16 01:44:12', '2023-02-16 01:44:12'),
(23, 7, 7, '', '2023-02-16 01:44:12', '2023-02-16 01:44:12'),
(24, 8, 1, '', '2023-02-16 01:44:12', '2023-02-16 01:44:12'),
(25, 8, 2, '', '2023-02-16 01:44:12', '2023-02-16 01:44:12'),
(26, 8, 3, '', '2023-02-16 01:44:12', '2023-02-16 01:44:12'),
(27, 8, 4, '', '2023-02-16 01:44:12', '2023-02-16 01:44:12'),
(28, 8, 5, '', '2023-02-16 01:44:12', '2023-02-16 01:44:12'),
(29, 9, 6, '', '2023-02-16 01:44:12', '2023-02-16 01:44:12'),
(30, 9, 7, '', '2023-02-16 01:44:12', '2023-02-16 01:44:12'),
(31, 10, 1, '', '2023-02-16 01:44:12', '2023-02-16 01:44:12'),
(32, 10, 2, '', '2023-02-16 01:44:12', '2023-02-16 01:44:12'),
(33, 10, 3, '', '2023-02-16 01:44:12', '2023-02-16 01:44:12'),
(34, 10, 4, '', '2023-02-16 01:44:12', '2023-02-16 01:44:12'),
(35, 10, 5, '', '2023-02-16 01:44:12', '2023-02-16 01:44:12'),
(36, 11, 6, 'QQQQ', '2023-02-16 01:45:29', '2023-02-16 03:07:19'),
(37, 11, 7, '', '2023-02-16 01:45:29', '2023-02-16 01:45:29'),
(38, 12, 1, '', '2023-02-16 01:45:29', '2023-02-16 01:45:29'),
(39, 12, 2, '', '2023-02-16 01:45:29', '2023-02-16 01:45:29'),
(40, 12, 3, '', '2023-02-16 01:45:29', '2023-02-16 01:45:29'),
(41, 12, 4, '', '2023-02-16 01:45:29', '2023-02-16 01:45:29'),
(42, 12, 5, '', '2023-02-16 01:45:29', '2023-02-16 01:45:29'),
(43, 13, 6, 'EEEE', '2023-02-16 01:45:29', '2023-02-16 03:07:24'),
(44, 13, 7, '', '2023-02-16 01:45:29', '2023-02-16 01:45:29'),
(45, 14, 1, '', '2023-02-16 01:45:29', '2023-02-16 01:45:29'),
(46, 14, 2, '', '2023-02-16 01:45:29', '2023-02-16 01:45:29'),
(47, 14, 3, '', '2023-02-16 01:45:29', '2023-02-16 01:45:29'),
(48, 14, 4, '', '2023-02-16 01:45:29', '2023-02-16 01:45:29'),
(49, 14, 5, '', '2023-02-16 01:45:29', '2023-02-16 01:45:29'),
(50, 15, 6, 'EE', '2023-02-16 01:45:29', '2023-02-16 03:07:27'),
(51, 15, 7, '', '2023-02-16 01:45:29', '2023-02-16 01:45:29'),
(52, 16, 1, '', '2023-02-16 01:45:29', '2023-02-16 01:45:29'),
(53, 16, 2, '', '2023-02-16 01:45:29', '2023-02-16 01:45:29'),
(54, 16, 3, '', '2023-02-16 01:45:29', '2023-02-16 01:45:29'),
(55, 16, 4, '', '2023-02-16 01:45:29', '2023-02-16 01:45:29'),
(56, 16, 5, '', '2023-02-16 01:45:29', '2023-02-16 01:45:29'),
(57, 17, 6, 'BVB', '2023-02-16 01:45:29', '2023-02-16 03:07:31'),
(58, 17, 7, '', '2023-02-16 01:45:29', '2023-02-16 01:45:29'),
(59, 18, 1, '', '2023-02-16 01:45:29', '2023-02-16 01:45:29'),
(60, 18, 2, '', '2023-02-16 01:45:29', '2023-02-16 01:45:29'),
(61, 18, 3, '', '2023-02-16 01:45:29', '2023-02-16 01:45:29'),
(62, 18, 4, '', '2023-02-16 01:45:29', '2023-02-16 01:45:29'),
(63, 18, 5, '', '2023-02-16 01:45:29', '2023-02-16 01:45:29');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'file_processor', 'web', NULL, NULL),
(2, 'oppening', 'web', NULL, NULL),
(3, 'junior_processor', 'web', NULL, NULL),
(4, 'Admin', 'web', NULL, NULL),
(5, 'master', 'web', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seguimientos`
--

CREATE TABLE `seguimientos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nota_seguimiento` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_captura` bigint(20) UNSIGNED NOT NULL,
  `id_condicion` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado_user` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `estado_user`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Felipe Hernandez', 'felipe@gmail.com', NULL, '$2y$10$xTG81lXM9gBjl58WFQNJDeWHmGNhzNQhOkp0yQ9JrwhKtzGc1bE5S', '1', NULL, '2023-01-15 21:00:22', '2023-01-15 21:00:22');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `bancos`
--
ALTER TABLE `bancos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `capturas`
--
ALTER TABLE `capturas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `clientes_registros`
--
ALTER TABLE `clientes_registros`
  ADD PRIMARY KEY (`id`),
  ADD KEY `clientes_registros_id_cliente_foreign` (`id_cliente`),
  ADD KEY `clientes_registros_id_registro_foreign` (`id_registro`);

--
-- Indices de la tabla `companias`
--
ALTER TABLE `companias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `condiciones`
--
ALTER TABLE `condiciones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `condiciones_id_registro_foreign` (`id_registro`),
  ADD KEY `condiciones_id_estado_foreign` (`id_estado`);

--
-- Indices de la tabla `cuestionarios`
--
ALTER TABLE `cuestionarios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cuestionario_clientes`
--
ALTER TABLE `cuestionario_clientes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cuestionario_clientes_id_cliente_foreign` (`id_cliente`),
  ADD KEY `cuestionario_clientes_id_cuestionario_foreign` (`id_cuestionario`);

--
-- Indices de la tabla `detalle_documentos`
--
ALTER TABLE `detalle_documentos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `detalle_documentos_id_registro_foreign` (`id_registro`),
  ADD KEY `detalle_documentos_id_documento_foreign` (`id_documento`);

--
-- Indices de la tabla `documentos`
--
ALTER TABLE `documentos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `estados`
--
ALTER TABLE `estados`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `etapas`
--
ALTER TABLE `etapas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indices de la tabla `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indices de la tabla `notas`
--
ALTER TABLE `notas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notas_id_registro_foreign` (`id_registro`),
  ADD KEY `notas_id_usuario_foreign` (`id_usuario`);

--
-- Indices de la tabla `nota_registros`
--
ALTER TABLE `nota_registros`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nota_registros_id_registro_foreign` (`id_registro`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indices de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indices de la tabla `preguntas`
--
ALTER TABLE `preguntas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `preguntas_id_cuestionario_foreign` (`id_cuestionario`),
  ADD KEY `preguntas_id_categoria_foreign` (`id_categoria`);

--
-- Indices de la tabla `prestamos`
--
ALTER TABLE `prestamos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `registros`
--
ALTER TABLE `registros`
  ADD PRIMARY KEY (`id`),
  ADD KEY `registros_id_prestamo_foreign` (`id_prestamo`),
  ADD KEY `registros_id_banco_foreign` (`id_banco`),
  ADD KEY `registros_id_usuario_foreign` (`id_usuario`),
  ADD KEY `registros_id_compania_foreign` (`id_compania`),
  ADD KEY `registros_id_estado_foreign` (`id_estado`),
  ADD KEY `registros_id_etapa_foreign` (`id_etapa`);

--
-- Indices de la tabla `respuesta_clientes`
--
ALTER TABLE `respuesta_clientes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `respuesta_clientes_id_cuestionario_clientes_foreign` (`id_cuestionario_clientes`),
  ADD KEY `respuesta_clientes_id_pregunta_foreign` (`id_pregunta`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indices de la tabla `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indices de la tabla `seguimientos`
--
ALTER TABLE `seguimientos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `seguimientos_id_captura_foreign` (`id_captura`),
  ADD KEY `seguimientos_id_condicion_foreign` (`id_condicion`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `bancos`
--
ALTER TABLE `bancos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `capturas`
--
ALTER TABLE `capturas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `clientes_registros`
--
ALTER TABLE `clientes_registros`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `companias`
--
ALTER TABLE `companias`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `condiciones`
--
ALTER TABLE `condiciones`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cuestionarios`
--
ALTER TABLE `cuestionarios`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `cuestionario_clientes`
--
ALTER TABLE `cuestionario_clientes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `detalle_documentos`
--
ALTER TABLE `detalle_documentos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de la tabla `documentos`
--
ALTER TABLE `documentos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `estados`
--
ALTER TABLE `estados`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `etapas`
--
ALTER TABLE `etapas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT de la tabla `notas`
--
ALTER TABLE `notas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `nota_registros`
--
ALTER TABLE `nota_registros`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `preguntas`
--
ALTER TABLE `preguntas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `prestamos`
--
ALTER TABLE `prestamos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `registros`
--
ALTER TABLE `registros`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `respuesta_clientes`
--
ALTER TABLE `respuesta_clientes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `seguimientos`
--
ALTER TABLE `seguimientos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `clientes_registros`
--
ALTER TABLE `clientes_registros`
  ADD CONSTRAINT `clientes_registros_id_cliente_foreign` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id`),
  ADD CONSTRAINT `clientes_registros_id_registro_foreign` FOREIGN KEY (`id_registro`) REFERENCES `registros` (`id`);

--
-- Filtros para la tabla `condiciones`
--
ALTER TABLE `condiciones`
  ADD CONSTRAINT `condiciones_id_estado_foreign` FOREIGN KEY (`id_estado`) REFERENCES `estados` (`id`),
  ADD CONSTRAINT `condiciones_id_registro_foreign` FOREIGN KEY (`id_registro`) REFERENCES `registros` (`id`);

--
-- Filtros para la tabla `cuestionario_clientes`
--
ALTER TABLE `cuestionario_clientes`
  ADD CONSTRAINT `cuestionario_clientes_id_cliente_foreign` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id`),
  ADD CONSTRAINT `cuestionario_clientes_id_cuestionario_foreign` FOREIGN KEY (`id_cuestionario`) REFERENCES `cuestionarios` (`id`);

--
-- Filtros para la tabla `detalle_documentos`
--
ALTER TABLE `detalle_documentos`
  ADD CONSTRAINT `detalle_documentos_id_documento_foreign` FOREIGN KEY (`id_documento`) REFERENCES `documentos` (`id`),
  ADD CONSTRAINT `detalle_documentos_id_registro_foreign` FOREIGN KEY (`id_registro`) REFERENCES `registros` (`id`);

--
-- Filtros para la tabla `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `notas`
--
ALTER TABLE `notas`
  ADD CONSTRAINT `notas_id_registro_foreign` FOREIGN KEY (`id_registro`) REFERENCES `registros` (`id`),
  ADD CONSTRAINT `notas_id_usuario_foreign` FOREIGN KEY (`id_usuario`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `nota_registros`
--
ALTER TABLE `nota_registros`
  ADD CONSTRAINT `nota_registros_id_registro_foreign` FOREIGN KEY (`id_registro`) REFERENCES `registros` (`id`);

--
-- Filtros para la tabla `preguntas`
--
ALTER TABLE `preguntas`
  ADD CONSTRAINT `preguntas_id_categoria_foreign` FOREIGN KEY (`id_categoria`) REFERENCES `categorias` (`id`),
  ADD CONSTRAINT `preguntas_id_cuestionario_foreign` FOREIGN KEY (`id_cuestionario`) REFERENCES `cuestionarios` (`id`);

--
-- Filtros para la tabla `registros`
--
ALTER TABLE `registros`
  ADD CONSTRAINT `registros_id_banco_foreign` FOREIGN KEY (`id_banco`) REFERENCES `bancos` (`id`),
  ADD CONSTRAINT `registros_id_compania_foreign` FOREIGN KEY (`id_compania`) REFERENCES `companias` (`id`),
  ADD CONSTRAINT `registros_id_estado_foreign` FOREIGN KEY (`id_estado`) REFERENCES `estados` (`id`),
  ADD CONSTRAINT `registros_id_etapa_foreign` FOREIGN KEY (`id_etapa`) REFERENCES `etapas` (`id`),
  ADD CONSTRAINT `registros_id_prestamo_foreign` FOREIGN KEY (`id_prestamo`) REFERENCES `prestamos` (`id`),
  ADD CONSTRAINT `registros_id_usuario_foreign` FOREIGN KEY (`id_usuario`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `respuesta_clientes`
--
ALTER TABLE `respuesta_clientes`
  ADD CONSTRAINT `respuesta_clientes_id_cuestionario_clientes_foreign` FOREIGN KEY (`id_cuestionario_clientes`) REFERENCES `cuestionario_clientes` (`id`),
  ADD CONSTRAINT `respuesta_clientes_id_pregunta_foreign` FOREIGN KEY (`id_pregunta`) REFERENCES `preguntas` (`id`);

--
-- Filtros para la tabla `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `seguimientos`
--
ALTER TABLE `seguimientos`
  ADD CONSTRAINT `seguimientos_id_captura_foreign` FOREIGN KEY (`id_captura`) REFERENCES `capturas` (`id`),
  ADD CONSTRAINT `seguimientos_id_condicion_foreign` FOREIGN KEY (`id_condicion`) REFERENCES `condiciones` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
