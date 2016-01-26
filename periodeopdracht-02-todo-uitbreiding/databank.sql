-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Machine: localhost
-- Genereertijd: 26 jan 2016 om 23:33
-- Serverversie: 5.5.46-0ubuntu0.14.04.2
-- PHP-versie: 5.5.9-1ubuntu4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Databank: `laraveltodo`
--
CREATE DATABASE IF NOT EXISTS `laraveltodo` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `laraveltodo`;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Gegevens worden uitgevoerd voor tabel `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2016_01_26_160220_create_todos_table', 1);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `todos`
--

CREATE TABLE IF NOT EXISTS `todos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `done` tinyint(1) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `todos_user_id_foreign` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Gegevens worden uitgevoerd voor tabel `todos`
--

INSERT INTO `todos` (`id`, `user_id`, `name`, `done`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 'ToDo1', 0, NULL, '2016-01-26 21:29:53', '2016-01-26 21:29:53'),
(2, 1, 'ToDo2', 0, NULL, '2016-01-26 21:29:58', '2016-01-26 21:29:58'),
(3, 1, 'ToDo3', 0, NULL, '2016-01-26 21:30:02', '2016-01-26 21:30:02');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Gegevens worden uitgevoerd voor tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Siebe Vanden Eynden', 'siebe@hotmail.be', '$2y$10$WvbhY.CyVbRsf7WUJFy.reVO6ShkGgIRw6CkJZMSuEJxRXS2yPYN6', 'SSeda1uNESkrDrj9b4ePYfrtmBx8aXJHDoMrQlkBhrQPIZ61k6TmjoQ2nyt5', NULL, '2016-01-26 21:29:35', '2016-01-26 21:31:02');

--
-- Beperkingen voor gedumpte tabellen
--

--
-- Beperkingen voor tabel `todos`
--
ALTER TABLE `todos`
  ADD CONSTRAINT `todos_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
