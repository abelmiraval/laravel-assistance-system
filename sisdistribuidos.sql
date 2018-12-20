-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:33065
-- Tiempo de generación: 20-12-2018 a las 18:06:27
-- Versión del servidor: 10.1.21-MariaDB
-- Versión de PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sisdistribuidos`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_calculator_dif_hours` (IN `idemployee` INT, IN `hour_entry` TIME, IN `hour_departure` TIME, IN `day` VARCHAR(9))  NO SQL
SELECT ADDTIME(TIMEDIFF(hour_entry,sch.hour_entry),TIMEDIFf(sch.hour_departure,hour_departure)) as hour_not_worked 


			FROM attendances att
			JOIN employees emp 
			on emp.id=att.idemployee
			JOIN charges cha
			on cha.id=emp.idcharge
			JOIN schedules sch 
			on sch.idcharge=cha.id
			WHERE emp.id=idemployee AND  sch.day=day AND sch.state='1' AND att.state='1'$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `attendances`
--

CREATE TABLE `attendances` (
  `id` int(10) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `hour_entry` time NOT NULL,
  `hour_departure` time DEFAULT NULL,
  `hour_not_worked` time DEFAULT NULL,
  `idemployee` int(10) UNSIGNED NOT NULL,
  `state` varchar(1) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `attendances`
--

INSERT INTO `attendances` (`id`, `date`, `hour_entry`, `hour_departure`, `hour_not_worked`, `idemployee`, `state`, `created_at`, `updated_at`) VALUES
(1, '2017-12-04', '08:00:00', '20:00:00', '01:00:00', 1, '1', '2017-12-05 00:50:36', '2017-12-05 02:28:25'),
(2, '2017-12-05', '09:00:00', '20:00:00', '01:00:00', 1, '1', '2017-12-05 01:07:33', '2017-12-05 02:28:32'),
(3, '2017-12-06', '08:00:00', '17:00:00', '02:00:00', 1, '1', '2017-12-06 19:00:03', '2017-12-06 19:00:20'),
(4, '2018-12-20', '02:00:00', NULL, NULL, 1, '1', '2018-12-20 22:04:45', '2018-12-20 22:04:45');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `charges`
--

CREATE TABLE `charges` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `charges`
--

INSERT INTO `charges` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Limpieza', 'Son los encargados de mantener la limpieza adecuada dentro y fuera de la empresa', '2017-12-05 00:45:26', '2017-12-05 00:45:26');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `employees`
--

CREATE TABLE `employees` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `surname_paternal` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `surname_maternal` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dni` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `idcharge` int(10) UNSIGNED NOT NULL,
  `state` varchar(1) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `employees`
--

INSERT INTO `employees` (`id`, `name`, `surname_paternal`, `surname_maternal`, `dni`, `idcharge`, `state`, `created_at`, `updated_at`) VALUES
(1, 'Sofia', 'Morales', 'Retis', '123', 1, '1', '2017-12-05 00:47:44', '2017-12-05 02:53:25'),
(2, 'Andy', 'Namoc ', 'Rodriguez', '1234', 1, '1', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2017_10_19_204215_create_charges_table', 1),
(4, '2017_10_22_170838_create_schedules_table', 1),
(5, '2017_10_27_122937_create_employees_table', 1),
(6, '2017_10_27_172152_create_attendances_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `schedules`
--

CREATE TABLE `schedules` (
  `id` int(10) UNSIGNED NOT NULL,
  `day` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `hour_entry` time NOT NULL,
  `hour_departure` time NOT NULL,
  `idcharge` int(10) UNSIGNED NOT NULL,
  `state` varchar(1) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `schedules`
--

INSERT INTO `schedules` (`id`, `day`, `hour_entry`, `hour_departure`, `idcharge`, `state`, `created_at`, `updated_at`) VALUES
(1, 'Lunes', '08:00:00', '21:00:00', 1, '1', '2017-12-05 00:45:44', '2017-12-05 00:45:44'),
(2, 'Martes', '08:00:00', '20:00:00', 1, '1', '2017-12-05 00:45:56', '2017-12-05 00:45:56'),
(3, 'Miercoles', '08:00:00', '19:00:00', 1, '1', '2017-12-05 00:46:10', '2017-12-05 00:46:10'),
(4, 'Jueves', '08:00:00', '18:00:00', 1, '1', '2017-12-05 00:46:23', '2017-12-05 00:46:23'),
(5, 'Viernes', '08:00:00', '18:00:00', 1, '1', '2017-12-05 00:46:38', '2017-12-05 00:46:38'),
(6, 'Sabado', '09:00:00', '18:00:00', 1, '1', '2017-12-05 00:47:02', '2017-12-05 00:47:02'),
(7, 'Domingo', '09:00:00', '14:00:00', 1, '1', '2017-12-05 00:47:20', '2017-12-05 00:47:20');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Abel Saul Miraval Gomez', 'abel.miraval@unas.edu.pe', '$2y$10$bOR2PbN0q9kMTSH5lCn09eNjFfOaEDhTO3XfAuhcPGMXtf59RgFEK', NULL, '2017-12-05 00:24:04', '2017-12-05 00:24:04');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `attendances`
--
ALTER TABLE `attendances`
  ADD PRIMARY KEY (`id`),
  ADD KEY `attendances_idemployee_foreign` (`idemployee`);

--
-- Indices de la tabla `charges`
--
ALTER TABLE `charges`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employees_idcharge_foreign` (`idcharge`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `schedules`
--
ALTER TABLE `schedules`
  ADD PRIMARY KEY (`id`),
  ADD KEY `schedules_idcharge_foreign` (`idcharge`);

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
-- AUTO_INCREMENT de la tabla `attendances`
--
ALTER TABLE `attendances`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `charges`
--
ALTER TABLE `charges`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `schedules`
--
ALTER TABLE `schedules`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `attendances`
--
ALTER TABLE `attendances`
  ADD CONSTRAINT `attendances_idemployee_foreign` FOREIGN KEY (`idemployee`) REFERENCES `employees` (`id`);

--
-- Filtros para la tabla `employees`
--
ALTER TABLE `employees`
  ADD CONSTRAINT `employees_idcharge_foreign` FOREIGN KEY (`idcharge`) REFERENCES `charges` (`id`);

--
-- Filtros para la tabla `schedules`
--
ALTER TABLE `schedules`
  ADD CONSTRAINT `schedules_idcharge_foreign` FOREIGN KEY (`idcharge`) REFERENCES `charges` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
