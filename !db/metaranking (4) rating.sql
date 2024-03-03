SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

CREATE TABLE IF NOT EXISTS `mood` (
  `id` int(11) NOT NULL,
  `label` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

INSERT INTO `mood` (`id`, `label`, `created_at`, `updated_at`) VALUES
(1, 'like', '2024-02-28 04:27:04', '2024-02-28 04:27:04')
 ON DUPLICATE KEY UPDATE `id` = `id`;

CREATE TABLE IF NOT EXISTS `tag` (
  `id` int(11) NOT NULL,
  `label` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

INSERT INTO `tag` (`id`, `label`, `created_at`, `updated_at`) VALUES
(2, 'test', '2024-02-28 03:58:47', '2024-02-28 03:58:47'),
(4, 'test2', '2024-02-28 04:27:21', '2024-02-28 04:27:21')
 ON DUPLICATE KEY UPDATE `id` = `id`;

CREATE TABLE IF NOT EXISTS `tag_assoc` (
  `id` int(11) NOT NULL,
  `tag1_id` int(11) NOT NULL,
  `tag2_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

INSERT INTO `tag_assoc` (`id`, `tag1_id`, `tag2_id`, `created_at`, `updated_at`) VALUES
(1, 2, 4, '2024-02-28 04:38:56', '2024-02-28 04:38:56')
 ON DUPLICATE KEY UPDATE `id` = `id`;

CREATE TABLE IF NOT EXISTS `vote` (
  `id` int(11) NOT NULL,
  `tag_assoc_id` int(11) NOT NULL,
  `mood_id` int(11) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

INSERT INTO `vote` (`id`, `tag_assoc_id`, `mood_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, '2024-02-28 04:40:09', '2024-02-28 04:40:09')
 ON DUPLICATE KEY UPDATE `id` = `id`;

ALTER TABLE `mood`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `tag`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `tag_assoc`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tag2_id` (`tag2_id`),
  ADD KEY `tag1_id` (`tag1_id`);

ALTER TABLE `vote`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mood_id_idx` (`mood_id`),
  ADD KEY `tag_assoc_id_idx` (`tag_assoc_id`),
  ADD KEY `user_id` (`user_id`);

ALTER TABLE `mood`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

ALTER TABLE `tag`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

ALTER TABLE `tag_assoc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

ALTER TABLE `vote`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

ALTER TABLE `tag_assoc`
  ADD CONSTRAINT `tag_assoc_ibfk_1` FOREIGN KEY (`tag1_id`) REFERENCES `tag` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE `vote`
  ADD CONSTRAINT `mood_id` FOREIGN KEY (`mood_id`) REFERENCES `mood` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `tag_assoc_id` FOREIGN KEY (`tag_assoc_id`) REFERENCES `tag_assoc` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
