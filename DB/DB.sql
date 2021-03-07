/*
SQLyog Ultimate v11.11 (64 bit)
MySQL - 5.7.31 : Database - prueba_ingreso
*********************************************************************
*/


/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`prueba_ingreso` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci */;

USE `prueba_ingreso`;

/*Table structure for table `failed_jobs` */

DROP TABLE IF EXISTS `failed_jobs`;

CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `failed_jobs` */

/*Table structure for table `marcas` */

DROP TABLE IF EXISTS `marcas`;

CREATE TABLE `marcas` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `nombre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `marcas_nombre_unique` (`nombre`),
  KEY `marcas_user_id_foreign` (`user_id`),
  CONSTRAINT `marcas_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `marcas` */

insert  into `marcas`(`id`,`user_id`,`nombre`,`descripcion`,`created_at`,`updated_at`,`deleted_at`) values (2,2,'Nisan','wwww','2021-03-07 19:34:13','2021-03-07 19:34:13',NULL),(3,2,'Mazda','otra descripción','2021-03-07 19:34:23','2021-03-07 19:34:39',NULL),(6,26,'Renault','Renault -descripcion','2021-03-07 20:52:53','2021-03-07 20:52:53',NULL),(7,26,'Nissan','Descripcion Nissan','2021-03-07 20:54:01','2021-03-07 20:54:01',NULL),(8,26,'Nisand','2eed','2021-03-07 21:04:43','2021-03-07 21:04:43',NULL);

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2014_10_12_200000_add_two_factor_columns_to_users_table',1),(4,'2019_08_19_000000_create_failed_jobs_table',1),(5,'2019_12_14_000001_create_personal_access_tokens_table',1),(6,'2021_02_09_004536_create_sessions_table',1),(7,'2021_02_09_010831_create_marcas_table',1),(8,'2021_02_09_124651_create__modelos_table',1),(9,'2021_03_07_180948_add_estado_to_users_table',2);

/*Table structure for table `modelos` */

DROP TABLE IF EXISTS `modelos`;

CREATE TABLE `modelos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `modelo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `marca_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `modelos_marca_id_foreign` (`marca_id`),
  CONSTRAINT `modelos_marca_id_foreign` FOREIGN KEY (`marca_id`) REFERENCES `marcas` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `modelos` */

insert  into `modelos`(`id`,`modelo`,`descripcion`,`marca_id`,`created_at`,`updated_at`,`deleted_at`) values (1,'Modelo 1990','Es negro y amarillo',2,'2021-03-07 20:05:32','2021-03-07 20:05:32',NULL),(2,'Modelo 199','es rojo',3,'2021-03-07 20:22:59','2021-03-07 20:22:59',NULL),(3,'Modelo 2020','Es eléctrico',2,'2021-03-07 20:46:03','2021-03-07 20:46:03',NULL),(4,'Modelo 1998','jkkbk',7,'2021-03-07 20:56:30','2021-03-07 20:56:30',NULL),(5,'Modelo 1980','fsfsdf',2,'2021-03-07 21:03:05','2021-03-07 21:03:05',NULL);

/*Table structure for table `password_resets` */

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `password_resets` */

/*Table structure for table `personal_access_tokens` */

DROP TABLE IF EXISTS `personal_access_tokens`;

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `personal_access_tokens` */

/*Table structure for table `sessions` */

DROP TABLE IF EXISTS `sessions`;

CREATE TABLE `sessions` (
  `id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `sessions` */

insert  into `sessions`(`id`,`user_id`,`ip_address`,`user_agent`,`payload`,`last_activity`) values ('49eDPfiBl0DiUTn4qU9DCaMw9vym2fl6zFTliO5Z',NULL,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.190 Safari/537.36','YToyOntzOjY6Il90b2tlbiI7czo0MDoiaVBxaWRvOU9QWDQxRGMydVpLa3JvRTgwMGR5ZUJ2SFgwdkdXcjRJayI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1615151055),('8xEp7iwx1yibUv26ro6pHdFl2ILkM7e0IOB1bh1p',2,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.190 Safari/537.36','YTo1OntzOjY6Il90b2tlbiI7czo0MDoiYldLM1RGM3NCU1NMakdDRUxWOGpmRVNJVzlQRUhLNmpNN0ZYZUN2MSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzU6Imh0dHA6Ly9wcnVlYmFpbmdyZXNvLnRlc3QvZGFzaGJvYXJkIjt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MjtzOjE3OiJwYXNzd29yZF9oYXNoX3dlYiI7czo2MDoiJDJ5JDEwJGY0bmFITDZjb1JvRTkwWVpOaDd4SWVtdVNVWmxwbW1USU1IRGZMNWtWNVNiTG9RWFFmcERxIjt9',1615151564);

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci,
  `roll` int(11) NOT NULL,
  `estado` int(11) NOT NULL DEFAULT '1',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint(20) unsigned DEFAULT NULL,
  `profile_photo_path` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`name`,`email`,`password`,`two_factor_secret`,`two_factor_recovery_codes`,`roll`,`estado`,`email_verified_at`,`remember_token`,`current_team_id`,`profile_photo_path`,`created_at`,`updated_at`) values (2,'Isaias j Balmaceda Prins','isaias.balmaceda@gmail.com','$2y$10$f4naHL6coRoE90YZNh7xIemuSUZlpmmTIMHDfL5kV5SbLoQXQfpDq',NULL,NULL,1,1,NULL,NULL,NULL,NULL,'2021-03-06 23:05:00','2021-03-07 18:27:21'),(14,'Isaias Balmaceda Prins','isaias3@gmail.com','$2y$10$wOoIMA0e9LHpcT.eqOnaf.4SDi5BpA0L1G75oaBUfA3T26BsQG5c2',NULL,NULL,0,1,NULL,NULL,NULL,NULL,'2021-03-07 16:18:10','2021-03-07 18:23:31'),(15,'Isaias Balmaceda Prins','isaias4@gmail.com','$2y$10$N5bmJaK9riWkAWCsw8HcYuwdM3.iQ0iczPh0pKjv44fuqleA6rbhK',NULL,NULL,1,1,NULL,NULL,NULL,NULL,'2021-03-07 16:18:26','2021-03-07 21:06:21'),(16,'Joel Balmaceda Prins','joel5@gmail.com','$2y$10$3cZ13D6K4JZRem1h0XgcWOWxIoN/iMTlQ0qeFXe/.xiJ0vSCa/QEy',NULL,NULL,1,1,NULL,NULL,NULL,NULL,'2021-03-07 16:34:55','2021-03-07 21:06:14'),(26,'admin','admin.dg@admin.com','$2y$10$oqhiYTd50owh.xQUg8jo/esYRZkMk3hS8sw3aC67EuYH5iqxqYZLe',NULL,NULL,0,1,NULL,NULL,NULL,NULL,'2021-03-07 18:38:23','2021-03-07 21:06:58');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
