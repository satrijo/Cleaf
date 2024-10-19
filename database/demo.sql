-- Adminer 4.8.1 MySQL 9.0.1 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `contents`;
CREATE TABLE `contents` (
  `id` int NOT NULL AUTO_INCREMENT,
  `page_id` int NOT NULL,
  `title` text NOT NULL,
  `url` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `page_id` (`page_id`),
  CONSTRAINT `contents_ibfk_1` FOREIGN KEY (`page_id`) REFERENCES `pages` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `contents` (`id`, `page_id`, `title`, `url`, `created_at`) VALUES
(1,	18,	'Personal Blog',	'https://satrio.dev/',	'2024-10-19 07:12:11'),
(2,	18,	'Linkedin',	'https://inasiam.bmkg.go.id',	'2024-10-19 07:19:17'),
(3,	19,	'Tokopedia',	'https://tokopedia.com/tokohapedia',	'2024-10-19 07:22:46'),
(4,	19,	'Shopee',	'https://shopee.com',	'2024-10-19 07:22:59'),
(5,	19,	'Blibli',	'https://blibli.com',	'2024-10-19 07:23:38'),
(6,	19,	'Lazada',	'https://lazada.com',	'2024-10-19 07:23:56');

DROP TABLE IF EXISTS `pages`;
CREATE TABLE `pages` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `user_id` int NOT NULL,
  `slug` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `slug` (`slug`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `pages_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `pages` (`id`, `title`, `description`, `user_id`, `slug`, `created_at`) VALUES
(18,	'Riyo Wicaksono',	'I am a Full-Stack Engineer at Badan Meteorologi Klimatologi dan Geofisika (BMKG), the national meteorological agency of Indonesia, where I have been developing and deploying web applications for three years. I have a Bachelor of Applied Science in Meteorology and certifications in web development and UX design from reputable online platforms.',	1,	'satriyo',	'2024-10-19 04:58:55'),
(19,	'Tokohapedia',	'Tokohapedia merupakan tempat penjualan handphone dengan harga bersaing dan garansi resmi dari masing - masing brand. Kami menawarkan berbagai bonus jika jumlah belanja anda lebih dari 2 juta rupiah.',	1,	'tokohapedia',	'2024-10-19 07:22:26');

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `users` (`id`, `name`, `email`, `password`, `is_admin`, `created_at`) VALUES
(1,	'Satriyo Unggul Wicaksono',	'admin@admin.com',	'$2y$10$qQ2jOzSjpwHqbNTD7NVaCO57Yd75HIcqHw5z4UyET25/s5ILNc2ve',	1,	'2024-10-19 03:56:21');

-- 2024-10-19 07:46:35