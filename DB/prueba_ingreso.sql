-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 10-02-2021 a las 13:08:55
-- Versión del servidor: 5.7.31
-- Versión de PHP: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `prueba_ingreso`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2021_02_09_004536_create_sessions_table', 1),
(7, '2021_02_09_010831_create_plans_table', 1),
(8, '2021_02_09_124651_create__user_plans_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

DROP TABLE IF EXISTS `persona`;
CREATE TABLE IF NOT EXISTS `persona` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `tipo_identificacion` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `identificacion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombres` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellidos` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `genero` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefono` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pais` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ciudad` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `direccion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `correo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`id`, `tipo_identificacion`, `identificacion`, `nombres`, `apellidos`, `genero`, `telefono`, `pais`, `ciudad`, `direccion`, `correo`, `created_at`, `updated_at`) VALUES
(23, 'CC', '7777', 'Alavaro', 'Hurtado', 'H', '3183979388', 'CO', 'CAR', 'Urbanización Huella de Juan Pablo segundo Mz p lote 2', 'hurtado@gmail.com', '2021-02-09 22:04:17', '2021-02-09 22:04:17'),
(24, 'CC', '789744', 'Isaias', 'Balmaceda Prins', 'H', '3183979388', 'CO', 'CAR', 'Urbanización Huella de Juan Pablo segundo Mz p lote 2', 'isaias.balmaceda@gmail.com', '2021-02-09 22:52:58', '2021-02-09 22:52:58'),
(25, 'CC', '789744', 'Isaias', 'Balmaceda Prins', 'H', '3183979388', 'CO', 'CAR', 'Urbanización Huella de Juan Pablo segundo Mz p lote 2', 'isaias.balmaceda@gmail.com', '2021-02-10 12:48:00', '2021-02-10 12:48:00'),
(26, 'CC', '789744', 'Isaias', 'Balmaceda Prins', 'H', '3183979388', 'CO', 'CAR', 'Urbanización Huella de Juan Pablo segundo Mz p lote 2', 'isaias.balmaceda@gmail.com', '2021-02-10 13:06:13', '2021-02-10 13:06:13');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `plans`
--

DROP TABLE IF EXISTS `plans`;
CREATE TABLE IF NOT EXISTS `plans` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `precio1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `precio2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `precio3` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `plans_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `plans`
--

INSERT INTO `plans` (`id`, `name`, `description`, `precio1`, `precio2`, `precio3`, `created_at`, `updated_at`) VALUES
(1, '1 Mes', 'Edición epaper por 30 días \r\nTarjeta de Beneficios Club Vital \r\nHasta 3 sesiones simultaneas \r\nNewlestter exclusivos\r\nNota: no incluye la edición impresa', '13.300', '14.500', '443', '2021-02-09 21:37:12', '2021-01-29 17:49:34'),
(2, '6 Meses', 'Edición epaper por 180 días \r\nTarjeta de Beneficios Club Vital \r\nHasta 3 sesiones simultaneas \r\nNewlestter exclusivos\r\nNota: no incluye la edición impresa', '72.900', '79.500', '405', '2021-02-09 21:37:12', '2021-01-29 17:49:34'),
(3, '12 Meses', 'Edición epaper por 362 días \r\nTarjeta de Beneficios Club Vital \r\nHasta 3 sesiones simultaneas \r\nNewlestter exclusivos\r\nOfertas, promociones e invitaciones personalizadas para eventos  \r\nNota: no incluye la edición impresa', '114.150', '124.500', '317', '2021-02-09 21:37:12', '2021-01-29 17:49:34');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sessions`
--

DROP TABLE IF EXISTS `sessions`;
CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('k7yv6SOygB46LmfZHY6Xc2kyALTbdlUsF0ESzxjw', 14, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.150 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiYklvMExQSFdFSVphTWxYTDhkR1h0TjlXaVJiNE9hWWpMM0xTV0FINSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDA6Imh0dHA6Ly9wcnVlYmFpbmdyZXNvLnRlc3QvcGxhbmVzL3VzdWFyaW8iO31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxNDtzOjE3OiJwYXNzd29yZF9oYXNoX3dlYiI7czo2MDoiJDJ5JDEwJDlJWG15dW8wMlpra1hiMnBMZVdENE8vdzNlcHpHNWhvRGJtM0NFLzdJUzA5aFNjLmxiT3hTIjtzOjIxOiJwYXNzd29yZF9oYXNoX3NhbmN0dW0iO3M6NjA6IiQyeSQxMCQ5SVhteXVvMDJaa2tYYjJwTGVXRDRPL3czZXB6RzVob0RibTNDRS83SVMwOWhTYy5sYk94UyI7fQ==', 1612912928),
('9rS88XtLbemr8KtWxHGePso7ENke6HZVsmPgv99S', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.150 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiS3V5aWRuOHhud1BVT1FiNVpsRHVXVllWUk45MHJ0TjNTczdJNzNDRSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzQ6Imh0dHA6Ly9wcnVlYmFpbmdyZXNvLnRlc3QvcmVnaXN0ZXIiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1612962374);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_persona` bigint(20) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `id_persona`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(13, 23, 'Alavaro', 'hurtado@gmail.com', NULL, '$2y$10$rr50a90uK5xx2oufOAgZ1.UO/ihwrya2bhx9N.4hBkhiBGtxEJBy.', NULL, NULL, NULL, NULL, NULL, '2021-02-10 03:04:17', '2021-02-10 03:04:17'),
(14, 24, 'Isaias', 'isaias.balmaceda@gmail.com', NULL, '$2y$10$9IXmyuo02ZkkXb2pLeWD4O/w3epzG5hoDbm3CE/7IS09hSc.lbOxS', NULL, NULL, NULL, NULL, NULL, '2021-02-10 03:52:58', '2021-02-10 03:52:58');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_plans`
--

DROP TABLE IF EXISTS `user_plans`;
CREATE TABLE IF NOT EXISTS `user_plans` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `plan_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_plans_user_id_foreign` (`user_id`),
  KEY `user_plans_plan_id_foreign` (`plan_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `user_plans`
--

INSERT INTO `user_plans` (`id`, `user_id`, `plan_id`, `created_at`, `updated_at`) VALUES
(1, 14, 1, '2021-02-10 04:03:48', '2021-02-10 04:03:48'),
(2, 14, 2, '2021-02-10 04:03:55', '2021-02-10 04:03:55'),
(3, 14, 1, '2021-02-10 04:04:07', '2021-02-10 04:04:07'),
(4, 14, 2, '2021-02-10 04:08:27', '2021-02-10 04:08:27'),
(5, 14, 1, '2021-02-10 04:13:39', '2021-02-10 04:13:39'),
(6, 14, 2, '2021-02-10 04:15:34', '2021-02-10 04:15:34'),
(7, 14, 1, '2021-02-10 04:16:37', '2021-02-10 04:16:37'),
(8, 14, 1, '2021-02-10 04:16:58', '2021-02-10 04:16:58'),
(9, 14, 1, '2021-02-10 04:18:28', '2021-02-10 04:18:28'),
(10, 14, 1, '2021-02-10 04:22:08', '2021-02-10 04:22:08');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `user_plans`
--
ALTER TABLE `user_plans`
  ADD CONSTRAINT `user_plans_plan_id_foreign` FOREIGN KEY (`plan_id`) REFERENCES `plans` (`id`),
  ADD CONSTRAINT `user_plans_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
