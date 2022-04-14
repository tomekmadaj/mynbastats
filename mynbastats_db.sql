-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 11 Kwi 2022, 16:56
-- Wersja serwera: 10.4.21-MariaDB
-- Wersja PHP: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `mynbastats_db`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Zrzut danych tabeli `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_03_07_141107_create_sessions_table', 2),
(6, '2022_03_08_131900_create_teams_table', 3);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Zrzut danych tabeli `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('8pFbmYJRJDt6rKKyWhdWOrCPHbXVEsAMjTyZtHuc', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:97.0) Gecko/20100101 Firefox/97.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiYkpBSjZUdVc0OEpXMGdTbWw5SjBkWUJ3R244eGwxSXdkeXVwQk5jWCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1646726841),
('SN2EOYQh6WIzx5bsFnvdHcfKUmDYU0AtCXK7lHCb', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:97.0) Gecko/20100101 Firefox/97.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiUEE4a0ZMVmw0N2pUSk5RRTQyMnpONE1iMWZZN0RlMnBrcm5Ic0lYUiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzA6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9uYmFTdGF0cyI7fXM6MzoidXJsIjthOjE6e3M6ODoiaW50ZW5kZWQiO3M6MzI6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9tZS9wcm9maWxlIjt9fQ==', 1646692611);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `takatam`
--

CREATE TABLE `takatam` (
  `id` int(11) NOT NULL COMMENT 'Primary Key',
  `create_time` datetime DEFAULT NULL COMMENT 'Create Time',
  `update_time` datetime DEFAULT NULL COMMENT 'Update Time'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `teams`
--

CREATE TABLE `teams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `teamId` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fullName` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nickname` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `urlName` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `altCityName` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `teamShortName` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tricode` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `confName` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `divName` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `isAllStar` tinyint(1) NOT NULL,
  `isNBAFranchise` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Zrzut danych tabeli `teams`
--

INSERT INTO `teams` (`id`, `teamId`, `fullName`, `nickname`, `urlName`, `altCityName`, `teamShortName`, `tricode`, `city`, `confName`, `divName`, `isAllStar`, `isNBAFranchise`, `created_at`, `updated_at`) VALUES
(1, '1610612737', 'Atlanta Hawks', 'Hawks', 'hawks', 'Atlanta', 'Atlanta', 'ATL', 'Atlanta', 'East', 'Southeast', 0, 1, '2022-03-08 13:44:41', '2022-03-08 13:44:41'),
(2, '1610612738', 'Boston Celtics', 'Celtics', 'celtics', 'Boston', 'Boston', 'BOS', 'Boston', 'East', 'Atlantic', 0, 1, '2022-03-08 13:44:41', '2022-03-08 13:44:41'),
(3, '1610612751', 'Brooklyn Nets', 'Nets', 'nets', 'Brooklyn', 'Brooklyn', 'BKN', 'Brooklyn', 'East', 'Atlantic', 0, 1, '2022-03-08 13:44:41', '2022-03-08 13:44:41'),
(4, '1610612766', 'Charlotte Hornets', 'Hornets', 'hornets', 'Charlotte', 'Charlotte', 'CHA', 'Charlotte', 'East', 'Southeast', 0, 1, '2022-03-08 13:44:41', '2022-03-08 13:44:41'),
(5, '1610612741', 'Chicago Bulls', 'Bulls', 'bulls', 'Chicago', 'Chicago', 'CHI', 'Chicago', 'East', 'Central', 0, 1, '2022-03-08 13:44:41', '2022-03-08 13:44:41'),
(6, '1610612739', 'Cleveland Cavaliers', 'Cavaliers', 'cavaliers', 'Cleveland', 'Cleveland', 'CLE', 'Cleveland', 'East', 'Central', 0, 1, '2022-03-08 13:44:41', '2022-03-08 13:44:41'),
(7, '1610612742', 'Dallas Mavericks', 'Mavericks', 'mavericks', 'Dallas', 'Dallas', 'DAL', 'Dallas', 'West', 'Southwest', 0, 1, '2022-03-08 13:44:41', '2022-03-08 13:44:41'),
(8, '1610612743', 'Denver Nuggets', 'Nuggets', 'nuggets', 'Denver', 'Denver', 'DEN', 'Denver', 'West', 'Northwest', 0, 1, '2022-03-08 13:44:42', '2022-03-08 13:44:42'),
(9, '1610612765', 'Detroit Pistons', 'Pistons', 'pistons', 'Detroit', 'Detroit', 'DET', 'Detroit', 'East', 'Central', 0, 1, '2022-03-08 13:44:42', '2022-03-08 13:44:42'),
(10, '1610612744', 'Golden State Warriors', 'Warriors', 'warriors', 'Golden State', 'Golden State', 'GSW', 'Golden State', 'West', 'Pacific', 0, 1, '2022-03-08 13:44:42', '2022-03-08 13:44:42'),
(11, '1610612745', 'Houston Rockets', 'Rockets', 'rockets', 'Houston', 'Houston', 'HOU', 'Houston', 'West', 'Southwest', 0, 1, '2022-03-08 13:44:42', '2022-03-08 13:44:42'),
(12, '1610612754', 'Indiana Pacers', 'Pacers', 'pacers', 'Indiana', 'Indiana', 'IND', 'Indiana', 'East', 'Central', 0, 1, '2022-03-08 13:44:42', '2022-03-08 13:44:42'),
(13, '1610612746', 'LA Clippers', 'Clippers', 'clippers', 'LA Clippers', 'LA Clippers', 'LAC', 'LA', 'West', 'Pacific', 0, 1, '2022-03-08 13:44:42', '2022-03-08 13:44:42'),
(14, '1610612747', 'Los Angeles Lakers', 'Lakers', 'lakers', 'Los Angeles Lakers', 'L.A. Lakers', 'LAL', 'Los Angeles', 'West', 'Pacific', 0, 1, '2022-03-08 13:44:42', '2022-03-08 13:44:42'),
(15, '1610612763', 'Memphis Grizzlies', 'Grizzlies', 'grizzlies', 'Memphis', 'Memphis', 'MEM', 'Memphis', 'West', 'Southwest', 0, 1, '2022-03-08 13:44:42', '2022-03-08 13:44:42'),
(16, '1610612748', 'Miami Heat', 'Heat', 'heat', 'Miami', 'Miami', 'MIA', 'Miami', 'East', 'Southeast', 0, 1, '2022-03-08 13:44:42', '2022-03-08 13:44:42'),
(17, '1610612749', 'Milwaukee Bucks', 'Bucks', 'bucks', 'Milwaukee', 'Milwaukee', 'MIL', 'Milwaukee', 'East', 'Central', 0, 1, '2022-03-08 13:44:42', '2022-03-08 13:44:42'),
(18, '1610612750', 'Minnesota Timberwolves', 'Timberwolves', 'timberwolves', 'Minnesota', 'Minnesota', 'MIN', 'Minnesota', 'West', 'Northwest', 0, 1, '2022-03-08 13:44:42', '2022-03-08 13:44:42'),
(19, '1610612740', 'New Orleans Pelicans', 'Pelicans', 'pelicans', 'New Orleans', 'New Orleans', 'NOP', 'New Orleans', 'West', 'Southwest', 0, 1, '2022-03-08 13:44:42', '2022-03-08 13:44:42'),
(20, '1610612752', 'New York Knicks', 'Knicks', 'knicks', 'New York', 'New York', 'NYK', 'New York', 'East', 'Atlantic', 0, 1, '2022-03-08 13:44:42', '2022-03-08 13:44:42'),
(21, '1610612760', 'Oklahoma City Thunder', 'Thunder', 'thunder', 'Oklahoma City', 'Oklahoma City', 'OKC', 'Oklahoma City', 'West', 'Northwest', 0, 1, '2022-03-08 13:44:42', '2022-03-08 13:44:42'),
(22, '1610612753', 'Orlando Magic', 'Magic', 'magic', 'Orlando', 'Orlando', 'ORL', 'Orlando', 'East', 'Southeast', 0, 1, '2022-03-08 13:44:42', '2022-03-08 13:44:42'),
(23, '1610612755', 'Philadelphia 76ers', '76ers', 'sixers', 'Philadelphia', 'Philadelphia', 'PHI', 'Philadelphia', 'East', 'Atlantic', 0, 1, '2022-03-08 13:44:42', '2022-03-08 13:44:42'),
(24, '1610612756', 'Phoenix Suns', 'Suns', 'suns', 'Phoenix', 'Phoenix', 'PHX', 'Phoenix', 'West', 'Pacific', 0, 1, '2022-03-08 13:44:42', '2022-03-08 13:44:42'),
(25, '1610612757', 'Portland Trail Blazers', 'Trail Blazers', 'blazers', 'Portland', 'Portland', 'POR', 'Portland', 'West', 'Northwest', 0, 1, '2022-03-08 13:44:42', '2022-03-08 13:44:42'),
(26, '1610612758', 'Sacramento Kings', 'Kings', 'kings', 'Sacramento', 'Sacramento', 'SAC', 'Sacramento', 'West', 'Pacific', 0, 1, '2022-03-08 13:44:42', '2022-03-08 13:44:42'),
(27, '1610612759', 'San Antonio Spurs', 'Spurs', 'spurs', 'San Antonio', 'San Antonio', 'SAS', 'San Antonio', 'West', 'Southwest', 0, 1, '2022-03-08 13:44:42', '2022-03-08 13:44:42'),
(28, '1610616833', 'Team Team Durant', 'Team Durant', 'team_durant', 'Team', 'Team Durant', 'DRT', 'Team', 'East', 'East', 1, 0, '2022-03-08 13:44:42', '2022-03-08 13:44:42'),
(29, '1610616834', 'Team LeBron', 'Team LeBron', 'team_lebron', 'Team', 'Team LeBron', 'LBN', 'Team', 'West', 'West', 1, 0, '2022-03-08 13:44:42', '2022-03-08 13:44:42'),
(30, '1610612761', 'Toronto Raptors', 'Raptors', 'raptors', 'Toronto', 'Toronto', 'TOR', 'Toronto', 'East', 'Atlantic', 0, 1, '2022-03-08 13:44:42', '2022-03-08 13:44:42'),
(31, '1610612762', 'Utah Jazz', 'Jazz', 'jazz', 'Utah', 'Utah', 'UTA', 'Utah', 'West', 'Northwest', 0, 1, '2022-03-08 13:44:42', '2022-03-08 13:44:42'),
(32, '1810612762', 'Utah Blue', 'Jazz', 'utah_blue', 'Utah', 'Utah Blue', 'UTB', 'Utah', 'West', 'Northwest', 0, 0, '2022-03-08 13:44:42', '2022-03-08 13:44:42'),
(33, '1710612762', 'Utah White', 'Jazz', 'utah_white', 'Utah', 'Utah White', 'UTW', 'Utah', 'West', 'Northwest', 0, 0, '2022-03-08 13:44:42', '2022-03-08 13:44:42'),
(34, '1610612764', 'Washington Wizards', 'Wizards', 'wizards', 'Washington', 'Washington', 'WAS', 'Washington', 'East', 'Southeast', 0, 1, '2022-03-08 13:44:42', '2022-03-08 13:44:42');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'tomek', 'admin@admin.pl', NULL, '$2y$10$2P8KNoetKXjzVIvvvzXqcuUhdvPHR.Ux7uLd7KDiVD7Sj7MzPlZIC', NULL, '2022-03-07 15:11:19', '2022-03-07 15:11:19'),
(2, 'admin', 'admin@admin.com', NULL, '$2y$10$7nBgdnHwvTuZA41Po7i1huciD7GNWSI6wMvmMOhcGwWroFlg8WndW', NULL, '2022-03-07 15:36:03', '2022-03-07 15:36:03');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeksy dla tabeli `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeksy dla tabeli `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indeksy dla tabeli `takatam`
--
ALTER TABLE `takatam`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT dla tabeli `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `takatam`
--
ALTER TABLE `takatam`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Primary Key';

--
-- AUTO_INCREMENT dla tabeli `teams`
--
ALTER TABLE `teams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
