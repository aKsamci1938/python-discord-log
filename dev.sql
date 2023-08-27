-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1:3306
-- Üretim Zamanı: 27 Ağu 2023, 18:27:40
-- Sunucu sürümü: 8.0.31
-- PHP Sürümü: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `dev`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `discord_logs`
--

DROP TABLE IF EXISTS `discord_logs`;
CREATE TABLE IF NOT EXISTS `discord_logs` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` varchar(255) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_discriminator` varchar(255) NOT NULL,
  `user_avatar` varchar(255) NOT NULL,
  `message_content` varchar(255) NOT NULL,
  `message_channel_id` varchar(255) NOT NULL,
  `message_channel_name` varchar(255) NOT NULL,
  `message_guild_id` varchar(255) NOT NULL,
  `message_guild_name` varchar(255) NOT NULL,
  `message_timestamp` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Tablo döküm verisi `discord_logs`
--

INSERT INTO `discord_logs` (`id`, `user_id`, `user_name`, `user_discriminator`, `user_avatar`, `message_content`, `message_channel_id`, `message_channel_name`, `message_guild_id`, `message_guild_name`, `message_timestamp`) VALUES
(9, '331837264432988160', 'aksamci', '0', 'https://cdn.discordapp.com/avatars/331837264432988160/60d1d35e03e8aff5afa8666477e87726.png?size=1024', 'selam', '1143433282663489539', 'sohbet', '1143433282004975657', 'aksamci.dev - fast, reliable, quality service', '2023-08-23 12:10:28'),
(10, '331837264432988160', 'aksamci', '0', 'https://cdn.discordapp.com/avatars/331837264432988160/60d1d35e03e8aff5afa8666477e87726.png?size=1024', 's', '1143433282663489539', 'sohbet', '1143433282004975657', 'aksamci.dev - fast, reliable, quality service', '2023-08-23 12:12:35'),
(11, '331837264432988160', 'aksamci', '0', 'https://cdn.discordapp.com/avatars/331837264432988160/60d1d35e03e8aff5afa8666477e87726.png?size=1024', 'salam', '1143433282445381686', 'showroom', '1143433282004975657', 'aksamci.dev - fast, reliable, quality service', '2023-08-24 10:48:10'),
(12, '331837264432988160', 'aksamci', '0', 'https://cdn.discordapp.com/avatars/331837264432988160/60d1d35e03e8aff5afa8666477e87726.png?size=1024', 'sucuk', '1143433282663489539', 'sohbet', '1143433282004975657', 'aksamci.dev - fast, reliable, quality service', '2023-08-24 16:45:13'),
(13, '331837264432988160', 'aksamci', '0', 'https://cdn.discordapp.com/avatars/331837264432988160/60d1d35e03e8aff5afa8666477e87726.png?size=1024', 'denemedenemedenemedenemedenemedenemedenemedenemedenemedenemedenemedenemedenemedenemedenemedenemedenemedenemedenemedenemedenemedenemedenemedenemedenemedenemedenemedenemedenemedenemedenemedenemedenemedenemedenemedenemedenemedenemedenemedenemedenemedenemeden', '1143433282663489539', 'sohbet', '1143433282004975657', 'aksamci.dev - fast, reliable, quality service', '2023-08-24 19:55:56');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `userlist`
--

DROP TABLE IF EXISTS `userlist`;
CREATE TABLE IF NOT EXISTS `userlist` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `profile_image` varchar(255) NOT NULL,
  `user_id` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Tablo döküm verisi `userlist`
--

INSERT INTO `userlist` (`id`, `username`, `profile_image`, `user_id`) VALUES
(1, 'vegasx.', '1037066126095560714', 0);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'aksamci', '3131');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
