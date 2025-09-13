-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         8.4.3 - MySQL Community Server - GPL
-- SO del servidor:              Win64
-- HeidiSQL Versión:             12.8.0.6908
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Volcando estructura de base de datos para pura_alegria_db
CREATE DATABASE IF NOT EXISTS `pura_alegria_db` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `pura_alegria_db`;

-- Volcando estructura para tabla pura_alegria_db.activities
CREATE TABLE IF NOT EXISTS `activities` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `category` varchar(50) NOT NULL,
  `description` text,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla pura_alegria_db.activities: ~3 rows (aproximadamente)
INSERT INTO `activities` (`id`, `name`, `category`, `description`, `created_at`, `updated_at`) VALUES
	(1, 'Cambio de pañal', 'Higiene', '', '2025-09-07 21:44:38', '2025-09-08 19:08:25'),
	(2, 'Almuerzo', 'Alimentación', 'Comida', '2025-09-07 21:46:12', '2025-09-08 19:08:27'),
	(3, 'Descanso', 'Sueño', '', '2025-09-08 19:07:54', '2025-09-08 19:08:30');

-- Volcando estructura para tabla pura_alegria_db.infants
CREATE TABLE IF NOT EXISTS `infants` (
  `id` int NOT NULL AUTO_INCREMENT,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `gender` enum('M','F') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT 'M' COMMENT 'M = Male, F = Female',
  `tutor_id` int NOT NULL,
  `picture` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `tutor_id` (`tutor_id`),
  CONSTRAINT `infants_ibfk_1` FOREIGN KEY (`tutor_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla pura_alegria_db.infants: ~2 rows (aproximadamente)
INSERT INTO `infants` (`id`, `first_name`, `last_name`, `birth_date`, `gender`, `tutor_id`, `picture`, `created_at`, `updated_at`) VALUES
	(1, 'Maicol', 'Santana', '2003-12-10', 'M', 5, 'infant/7372.jpg', '2025-09-08 12:34:30', '2025-09-09 16:57:39'),
	(2, 'Luna', 'Santana', '2006-12-10', 'F', 2, 'infant/ed69.jpg', '2025-09-08 12:47:57', '2025-09-09 17:01:52');

-- Volcando estructura para tabla pura_alegria_db.infant_activity_logs
CREATE TABLE IF NOT EXISTS `infant_activity_logs` (
  `id` int NOT NULL AUTO_INCREMENT,
  `infant_id` int NOT NULL,
  `caregiver_id` int NOT NULL,
  `activity_id` int NOT NULL,
  `notes` text,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `infant_id` (`infant_id`),
  KEY `caregiver_id` (`caregiver_id`),
  KEY `activity_id` (`activity_id`),
  CONSTRAINT `infant_activity_logs_ibfk_1` FOREIGN KEY (`infant_id`) REFERENCES `infants` (`id`) ON DELETE CASCADE,
  CONSTRAINT `infant_activity_logs_ibfk_2` FOREIGN KEY (`caregiver_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  CONSTRAINT `infant_activity_logs_ibfk_3` FOREIGN KEY (`activity_id`) REFERENCES `activities` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla pura_alegria_db.infant_activity_logs: ~2 rows (aproximadamente)
INSERT INTO `infant_activity_logs` (`id`, `infant_id`, `caregiver_id`, `activity_id`, `notes`, `created_at`, `updated_at`) VALUES
	(2, 1, 3, 1, NULL, '2025-09-09 13:49:10', '2025-09-09 17:49:10'),
	(3, 2, 4, 2, 'Almuerzo a las 9:50AM', '2025-09-09 10:53:30', '2025-09-09 14:53:30');

-- Volcando estructura para tabla pura_alegria_db.infant_caregivers
CREATE TABLE IF NOT EXISTS `infant_caregivers` (
  `id` int NOT NULL AUTO_INCREMENT,
  `infant_id` int NOT NULL,
  `caregiver_id` int NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique_assignment` (`infant_id`,`caregiver_id`),
  KEY `caregiver_id` (`caregiver_id`),
  CONSTRAINT `infant_caregivers_ibfk_1` FOREIGN KEY (`infant_id`) REFERENCES `infants` (`id`) ON DELETE CASCADE,
  CONSTRAINT `infant_caregivers_ibfk_2` FOREIGN KEY (`caregiver_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla pura_alegria_db.infant_caregivers: ~2 rows (aproximadamente)
INSERT INTO `infant_caregivers` (`id`, `infant_id`, `caregiver_id`, `created_at`, `updated_at`) VALUES
	(1, 2, 4, '2025-09-08 17:55:17', '2025-09-08 23:08:09'),
	(5, 2, 3, '2025-09-09 10:25:01', '2025-09-09 14:25:01');

-- Volcando estructura para tabla pura_alegria_db.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `country` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `city` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `phone` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `picture` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `status` tinyint NOT NULL DEFAULT '1',
  `user_level` int DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  KEY `user_level` (`user_level`),
  CONSTRAINT `users_ibfk_1` FOREIGN KEY (`user_level`) REFERENCES `user_groups` (`group_level`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla pura_alegria_db.users: ~5 rows (aproximadamente)
INSERT INTO `users` (`id`, `first_name`, `last_name`, `username`, `email`, `country`, `city`, `address`, `phone`, `password`, `picture`, `status`, `user_level`, `last_login`, `created_at`, `updated_at`) VALUES
	(1, 'Arturo', 'Santana', 'santana', 'santana.inffo@gmail.com', 'República Dominicana', 'Cotui', 'Avenidad Maria Trinidad Sanchez', '+1 (809)-451-1877', '$2y$10$wPGoGyNBOPqxRA4pywoEAuL7pvDf1nqzK5FMnM9Zo08fuxmMdpCkG', 'user/4f2c.jpg', 1, 1, '2025-09-09 23:18:29', '2025-08-21 15:18:53', '2025-09-09 23:18:29'),
	(2, 'Padre t1', 'last', 'tutor', 'tutor@mail.com', 'República Dominicana', 'Olimpico', 'Avenidad Maria Trinidad Sanchez', '+1 (888) 111-2222', '$2y$10$Vowa647cbJN6WjNSJ1ucA.BmI6PBmFJjYwHdap1jrnUiHZJYskp6.', 'user/9d53.jpg', 1, 3, '2025-09-09 23:18:08', '2025-09-08 15:55:14', '2025-09-09 23:18:08'),
	(3, 'Cuidadora 1', 'Last', 'caregiver1', '', NULL, NULL, NULL, '', '$2y$10$ItRyI6bbOMR5Hue7mQcZnesfOJuZ6gLmvxWQaX/CHymZIHTXmMcaS', 'user/22ec.jpg', 1, 2, '2025-09-09 18:45:54', '2025-09-08 21:35:35', '2025-09-09 18:45:54'),
	(4, 'Cuidadora 2', 'Last', 'caregiver2', '', NULL, NULL, NULL, '', '$2y$10$idq8xsGn0lzZjex7FO96Hu1Z3GaWxiHifIpd8wlmBeWTYR1Yx6MsK', 'user/c38e.jpg', 1, 2, '2025-09-09 14:51:46', '2025-09-08 21:36:02', '2025-09-09 14:51:46'),
	(5, 'Padre t2', 'Last', 'tutor2', 'tutor@mail.com', 'República Dominicana', 'Cotui', 'Avenidad Maria Trinidad Sanchez', '+1 (888) 111-2222', '$2y$10$Vowa647cbJN6WjNSJ1ucA.BmI6PBmFJjYwHdap1jrnUiHZJYskp6.', 'user/e04f.jpg', 1, 3, '2025-09-09 17:45:51', '2025-09-09 17:45:40', '2025-09-09 17:47:26');

-- Volcando estructura para tabla pura_alegria_db.user_groups
CREATE TABLE IF NOT EXISTS `user_groups` (
  `id` int NOT NULL AUTO_INCREMENT,
  `group_name` varchar(50) NOT NULL,
  `group_level` int NOT NULL,
  `group_status` tinyint NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `group_name` (`group_name`),
  UNIQUE KEY `group_level` (`group_level`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla pura_alegria_db.user_groups: ~3 rows (aproximadamente)
INSERT INTO `user_groups` (`id`, `group_name`, `group_level`, `group_status`, `created_at`, `updated_at`) VALUES
	(1, 'Admin', 1, 1, '2025-08-21 15:11:33', '2025-08-21 15:11:33'),
	(2, 'Cuidadora', 2, 1, '2025-08-21 15:12:06', '2025-08-21 15:12:06'),
	(3, 'Tutor', 3, 1, '2025-08-21 15:12:25', '2025-08-21 15:12:25');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
