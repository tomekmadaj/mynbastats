-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Czas generowania: 13 Kwi 2022, 21:22
-- Wersja serwera: 10.4.21-MariaDB
-- Wersja PHP: 7.4.28

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
(6, '2022_03_08_131900_create_teams_table', 3),
(7, '2022_04_13_101654_create_players_table', 4),
(10, '2022_04_13_152651_change_primary_key_on_teams', 5),
(11, '2022_04_13_160941_add_firmary_and_foreign_key_to_players', 6);

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
-- Struktura tabeli dla tabeli `players`
--

CREATE TABLE `players` (
  `id` int(10) UNSIGNED NOT NULL,
  `personId` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `teamId` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `firstName` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lastName` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `temporaryDisplayName` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jersey` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `isActive` tinyint(1) DEFAULT NULL,
  `pos` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `heightFeet` double DEFAULT NULL,
  `heightInches` double DEFAULT NULL,
  `heightMeters` double DEFAULT NULL,
  `weightPounds` double DEFAULT NULL,
  `weightKilograms` double DEFAULT NULL,
  `dateOfBirthUTC` date DEFAULT NULL,
  `nbaDebutYear` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `yearsPro` int(11) DEFAULT NULL,
  `collegeName` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lastAffiliation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Zrzut danych tabeli `players`
--

INSERT INTO `players` (`id`, `personId`, `teamId`, `firstName`, `lastName`, `temporaryDisplayName`, `jersey`, `isActive`, `pos`, `heightFeet`, `heightInches`, `heightMeters`, `weightPounds`, `weightKilograms`, `dateOfBirthUTC`, `nbaDebutYear`, `yearsPro`, `collegeName`, `lastAffiliation`, `country`, `created_at`, `updated_at`) VALUES
(508, '1', '0', 'Kornet', 'Luke', NULL, '40', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', '', '', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(357, '101108', '1610612756', 'Chris', 'Paul', 'Paul, Chris', '3', 1, 'G', 6, 0, 1.83, 175, 79.4, '1985-05-06', '2005', 16, 'Wake Forest', 'Wake Forest/USA', 'USA', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(509, '101139', '0', 'CJ', 'Miles', NULL, '50', 0, '', NULL, NULL, NULL, NULL, NULL, '1987-03-18', '2005', NULL, 'No College', 'No College/USA', 'USA', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(489, '101150', '1610612737', 'Lou', 'Williams', 'Williams, Lou', '6', 1, 'G', 6, 2, 1.88, 175, 79.4, '1986-10-27', '2005', 16, 'South Gwinnett HS (GA)', 'South Gwinnett HS (GA)/USA', 'USA', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(510, '1626143', '0', 'Jahlil', 'Okafor', NULL, '14', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', '', '', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(242, '1626145', '1610612763', 'Tyus', 'Jones', 'Jones, Tyus', '21', 1, 'G', 6, 0, 1.83, 196, 88.9, '1996-05-10', '2015', 6, 'Duke', 'Duke/USA', 'USA', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(182, '1626149', '1610612766', 'Montrezl', 'Harrell', 'Harrell, Montrezl', '8', 1, 'F-C', 6, 7, 2.01, 240, 108.9, '1994-01-26', '2015', 6, 'Louisville', 'Louisville/USA', 'USA', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(500, '1626153', '1610612737', 'Delon', 'Wright', 'Wright, Delon', '0', 1, 'G', 6, 5, 1.96, 185, 83.9, '1992-04-26', '2015', 6, 'Utah', 'Utah/USA', 'USA', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(511, '1626155', '0', 'Sam', 'Dekker', NULL, '8', 0, '', NULL, NULL, NULL, NULL, NULL, '1994-05-06', '2015', NULL, 'Wisconsin', 'Wisconsin/USA', 'USA', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(401, '1626156', '1610612750', 'D\'Angelo', 'Russell', 'Russell, D\'Angelo', '0', 1, 'G', 6, 4, 1.93, 193, 87.5, '1996-02-23', '2015', 6, 'Ohio State', 'Ohio State/USA', 'USA', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(452, '1626157', '1610612750', 'Karl-Anthony', 'Towns', 'Towns, Karl-Anthony', '32', 1, 'C-F', 6, 11, 2.11, 248, 112.5, '1995-11-15', '2015', 6, 'Kentucky', 'Kentucky/USA', 'USA', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(204, '1626158', '1610612758', 'Richaun', 'Holmes', 'Holmes, Richaun', '22', 1, 'F', 6, 10, 2.08, 235, 106.6, '1993-10-15', '2015', 6, 'Bowling Green', 'Bowling Green/USA', 'USA', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(495, '1626159', '1610612757', 'Justise', 'Winslow', 'Winslow, Justise', '26', 1, 'F-G', 6, 6, 1.98, 222, 100.7, '1996-03-26', '2015', 6, 'Duke', 'Duke/USA', 'USA', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(512, '1626161', '0', 'Willie', 'Cauley-Stein', NULL, '00', 0, '', NULL, NULL, NULL, NULL, NULL, '1993-08-18', '2015', NULL, 'Kentucky', 'Kentucky/USA', 'USA', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(355, '1626162', '1610612766', 'Kelly', 'Oubre Jr.', 'Oubre Jr., Kelly', '12', 1, 'F-G', 6, 6, 1.98, 203, 92.1, '1995-12-09', '2015', 6, 'Kansas', 'Kansas/USA', 'USA', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(513, '1626163', '0', 'Frank', 'Kaminsky', NULL, '8', 0, '', NULL, NULL, NULL, NULL, NULL, '1993-04-04', '2015', NULL, 'Wisconsin', 'Wisconsin/USA', 'USA', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(53, '1626164', '1610612756', 'Devin', 'Booker', 'Booker, Devin', '1', 1, 'G', 6, 5, 1.96, 206, 93.4, '1996-10-30', '2015', 6, 'Kentucky', 'Kentucky/USA', 'USA', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(358, '1626166', '1610612756', 'Cameron', 'Payne', 'Payne, Cameron', '15', 1, 'G', 6, 1, 1.85, 183, 83, '1994-08-08', '2015', 6, 'Murray State', 'Murray State/USA', 'USA', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(456, '1626167', '1610612754', 'Myles', 'Turner', 'Turner, Myles', '33', 1, 'C-F', 6, 11, 2.11, 250, 113.4, '1996-03-24', '2015', 6, 'Texas-Austin', 'Texas-Austin/USA', 'USA', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(283, '1626168', '1610612758', 'Trey', 'Lyles', 'Lyles, Trey', '41', 1, 'F', 6, 9, 2.06, 234, 106.1, '1995-11-05', '2015', 6, 'Kentucky', 'Kentucky/Canada', 'Canada', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(235, '1626169', '1610612747', 'Stanley', 'Johnson', 'Johnson, Stanley', '14', 1, 'F-G', 6, 6, 1.98, 242, 109.8, '1996-05-29', '2015', 6, 'Arizona', 'Arizona/USA', 'USA', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(371, '1626171', '1610612749', 'Bobby', 'Portis', 'Portis, Bobby', '9', 1, 'F', 6, 10, 2.08, 250, 113.4, '1995-02-10', '2015', 6, 'Arkansas', 'Arkansas/USA', 'USA', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(275, '1626172', '1610612744', 'Kevon', 'Looney', 'Looney, Kevon', '5', 1, 'F', 6, 9, 2.06, 222, 100.7, '1996-02-06', '2015', 6, 'UCLA', 'UCLA/USA', 'USA', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(498, '1626174', '1610612745', 'Christian', 'Wood', 'Wood, Christian', '35', 1, 'F', 6, 9, 2.06, 214, 97.1, '1995-09-27', '2015', 5, 'UNLV', 'UNLV/USA', 'USA', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(399, '1626179', '1610612766', 'Terry', 'Rozier', 'Rozier, Terry', '3', 1, 'G', 6, 1, 1.85, 190, 86.2, '1994-03-17', '2015', 6, 'Louisville', 'Louisville/USA', 'USA', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(375, '1626181', '1610612746', 'Norman', 'Powell', 'Powell, Norman', '24', 1, 'G', 6, 3, 1.9, 215, 97.5, '1993-05-25', '2015', 6, 'UCLA', 'UCLA/USA', 'USA', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(514, '1626184', '0', 'Chasson', 'Randle', NULL, '4', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', '', '', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(515, '1626188', '0', 'Quinn', 'Cook', NULL, '8', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', '', '', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(103, '1626192', '1610612749', 'Pat', 'Connaughton', 'Connaughton, Pat', '24', 1, 'G', 6, 5, 1.96, 209, 94.8, '1993-01-06', '2015', 6, 'Notre Dame', 'Notre Dame/USA', 'USA', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(194, '1626195', '1610612740', 'Willy', 'Hernangomez', 'Hernangomez, Willy', '9', 1, 'C-F', 6, 11, 2.11, 250, 113.4, '1994-05-27', '2016', 5, 'Cajasol Sevilla', 'Cajasol Sevilla/Spain', 'Spain', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(390, '1626196', '1610612759', 'Josh', 'Richardson', 'Richardson, Josh', '7', 1, 'G', 6, 5, 1.96, 200, 90.7, '1993-09-15', '2015', 6, 'Tennessee', 'Tennessee/USA', 'USA', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(333, '1626204', '1610612740', 'Larry', 'Nance Jr.', 'Nance Jr., Larry', '22', 1, 'F-C', 6, 7, 2.01, 245, 111.1, '1993-01-01', '2015', 6, 'Wyoming', 'Wyoming/USA', 'USA', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(347, '1626220', '1610612762', 'Royce', 'O\'Neale', 'O\'Neale, Royce', '23', 1, 'F', 6, 5, 1.96, 226, 102.5, '1993-06-05', '2017', 4, 'Baylor', 'Baylor/USA', 'USA', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(354, '1626224', '1610612739', 'Cedi', 'Osman', 'Osman, Cedi', '16', 1, 'F', 6, 7, 2.01, 230, 104.3, '1995-04-08', '2017', 4, 'Anadolu Efes', 'Anadolu Efes/Turkey', 'Turkey', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(288, '1626246', '1610612742', 'Boban', 'Marjanovic', 'Marjanovic, Boban', '51', 1, 'C', 7, 3, 2.21, 290, 131.5, '1988-08-15', '2015', 6, 'Crvena zvezda', 'Crvena zvezda/Serbia', 'Serbia', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(415, '1627732', '1610612751', 'Ben', 'Simmons', 'Simmons, Ben', '10', 1, 'G-F', 6, 11, 2.11, 240, 108.9, '1996-07-20', '2017', 4, 'Louisiana State', 'Louisiana State/Australia', 'Australia', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(403, '1627734', '1610612758', 'Domantas', 'Sabonis', 'Sabonis, Domantas', '10', 1, 'F-C', 6, 11, 2.11, 240, 108.9, '1996-05-03', '2016', 5, 'Gonzaga', 'Gonzaga/Lithuania', 'Lithuania', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(38, '1627736', '1610612750', 'Malik', 'Beasley', 'Beasley, Malik', '5', 1, 'G', 6, 4, 1.93, 187, 84.8, '1996-11-26', '2016', 5, 'Florida State', 'Florida State/USA', 'USA', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(93, '1627737', '1610612742', 'Marquese', 'Chriss', 'Chriss, Marquese', '35', 1, 'F', 6, 9, 2.06, 240, 108.9, '1997-07-02', '2016', 5, 'Washington', 'Washington/USA', 'USA', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(516, '1627739', '0', 'Kris', 'Dunn', NULL, '18', 0, '', NULL, NULL, NULL, NULL, NULL, '1994-03-18', '2016', NULL, 'Providence', 'Providence/USA', 'USA', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(196, '1627741', '1610612754', 'Buddy', 'Hield', 'Hield, Buddy', '24', 1, 'G', 6, 4, 1.93, 220, 99.8, '1992-12-17', '2016', 5, 'Oklahoma', 'Oklahoma/Bahamas', 'Bahamas', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(219, '1627742', '1610612740', 'Brandon', 'Ingram', 'Ingram, Brandon', '14', 1, 'F', 6, 8, 2.03, 190, 86.2, '1997-09-02', '2016', 5, 'Duke', 'Duke/USA', 'USA', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(237, '1627745', '1610612758', 'Damian', 'Jones', 'Jones, Damian', '30', 1, 'C', 6, 11, 2.11, 245, 111.1, '1995-06-30', '2016', 5, 'Vanderbilt', 'Vanderbilt/USA', 'USA', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(269, '1627747', '1610612739', 'Caris', 'LeVert', 'LeVert, Caris', '3', 1, 'G', 6, 6, 1.98, 205, 93, '1994-08-25', '2016', 5, 'Michigan', 'Michigan/USA', 'USA', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(329, '1627749', '1610612759', 'Dejounte', 'Murray', 'Murray, Dejounte', '5', 1, 'G', 6, 4, 1.93, 180, 81.6, '1996-09-19', '2016', 4, 'Washington', 'Washington/USA', 'USA', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(330, '1627750', '1610612743', 'Jamal', 'Murray', 'Murray, Jamal', '27', 1, 'G', 6, 3, 1.9, 215, 97.5, '1997-02-23', '2016', 5, 'Kentucky', 'Kentucky/Canada', 'Canada', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(364, '1627751', '1610612759', 'Jakob', 'Poeltl', 'Poeltl, Jakob', '25', 1, 'C', 7, 1, 2.16, 245, 111.1, '1995-10-15', '2016', 5, 'Utah', 'Utah/Austria', 'Austria', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(378, '1627752', '1610612750', 'Taurean', 'Prince', 'Prince, Taurean', '12', 1, 'F', 6, 6, 1.98, 218, 98.9, '1994-03-22', '2016', 5, 'Baylor', 'Baylor/USA', 'USA', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(517, '1627756', '0', 'Denzel', 'Valentine', NULL, '15', 0, '', NULL, NULL, NULL, NULL, NULL, '1993-11-16', '2016', NULL, 'Michigan State', 'Michigan State/USA', 'USA', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(67, '1627759', '1610612738', 'Jaylen', 'Brown', 'Brown, Jaylen', '7', 1, 'G-F', 6, 6, 1.98, 223, 101.2, '1996-10-24', '2016', 5, 'California', 'California/USA', 'USA', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(518, '1627760', '0', 'Cat', 'Barber', NULL, '5', 0, '', NULL, NULL, NULL, NULL, NULL, '1994-07-25', '2021', NULL, 'North Carolina State', 'North Carolina State/USA', 'USA', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(519, '1627761', '0', 'DeAndre\'', 'Bembry', NULL, '95', 0, '', NULL, NULL, NULL, NULL, NULL, '1994-07-04', '2016', NULL, 'St. Joseph\'s (PA)', 'St. Joseph\'s (PA)/USA', 'USA', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(63, '1627763', '1610612754', 'Malcolm', 'Brogdon', 'Brogdon, Malcolm', '7', 1, 'G', 6, 5, 1.96, 229, 103.9, '1992-12-11', '2016', 5, 'Virginia', 'Virginia/USA', 'USA', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(520, '1627767', '0', 'Cheick', 'Diallo', NULL, '00', 0, '', NULL, NULL, NULL, NULL, NULL, '1996-09-13', '2016', NULL, 'Kansas', 'Kansas/Mali', 'Mali', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(264, '1627774', '1610612750', 'Jake', 'Layman', 'Layman, Jake', '10', 1, 'F', 6, 8, 2.03, 209, 94.8, '1994-03-07', '2016', 5, 'Maryland', 'Maryland/USA', 'USA', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(337, '1627777', '1610612755', 'Georges', 'Niang', 'Niang, Georges', '20', 1, 'F', 6, 7, 2.01, 230, 104.3, '1993-06-17', '2016', 5, 'Iowa State', 'Iowa State/USA', 'USA', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(360, '1627780', '1610612744', 'Gary', 'Payton II', 'Payton II, Gary', '0', 1, 'G', 6, 3, 1.9, 195, 88.5, '1992-12-01', '2016', 5, 'Oregon State', 'Oregon State/USA', 'USA', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(414, '1627783', '1610612761', 'Pascal', 'Siakam', 'Siakam, Pascal', '43', 1, 'F', 6, 8, 2.03, 230, 104.3, '1994-04-02', '2016', 5, 'New Mexico State', 'New Mexico State/Cameroon', 'Cameroon', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(253, '1627788', '1610612755', 'Furkan', 'Korkmaz', 'Korkmaz, Furkan', '30', 1, 'G-F', 6, 7, 2.01, 202, 91.6, '1997-07-24', '2017', 4, 'Anadolu Efes', 'Anadolu Efes/Turkey', 'Turkey', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(282, '1627789', '1610612737', 'Timothe', 'Luwawu-Cabarrot', 'Luwawu-Cabarrot, Timothe', '7', 1, 'G-F', 6, 7, 2.01, 215, 97.5, '1995-05-09', '2016', 5, 'Mega Basket', 'Mega Basket/France', 'France', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(265, '1627814', '1610612744', 'Damion', 'Lee', 'Lee, Damion', '1', 1, 'G-F', 6, 5, 1.96, 210, 95.3, '1992-10-21', '2017', 4, 'Drexel', 'Drexel/USA', 'USA', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(521, '1627822', '0', 'Petr', 'Cornelie', NULL, '21', 0, '', NULL, NULL, NULL, NULL, NULL, '1995-07-26', '2021', NULL, 'France', 'France/France', 'France', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(193, '1627823', '1610612762', 'Juancho', 'Hernangomez', 'Hernangomez, Juancho', '41', 1, 'F', 6, 9, 2.06, 214, 97.1, '1995-09-28', '2016', 5, 'Estudiantes', 'Estudiantes/Spain', 'Spain', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(507, '1627826', '1610612746', 'Ivica', 'Zubac', 'Zubac, Ivica', '40', 1, 'C', 7, 0, 2.13, 240, 108.9, '1997-03-18', '2016', 5, 'Mega Basket', 'Mega Basket/Croatia', 'Croatia', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(139, '1627827', '1610612742', 'Dorian', 'Finney-Smith', 'Finney-Smith, Dorian', '10', 1, 'F', 6, 7, 2.01, 220, 99.8, '1993-05-04', '2016', 5, 'Florida', 'Florida/USA', 'USA', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(459, '1627832', '1610612761', 'Fred', 'VanVleet', 'VanVleet, Fred', '23', 1, 'G', 6, 1, 1.85, 197, 89.4, '1994-02-25', '2016', 5, 'Wichita State', 'Wichita State/USA', 'USA', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(522, '1627846', '0', 'Abdel', 'Nader', NULL, '11', 0, '', NULL, NULL, NULL, NULL, NULL, '1993-09-25', '2017', NULL, 'Iowa State', 'Iowa State/Egypt', 'Egypt', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(17, '1627853', '1610612752', 'Ryan', 'Arcidiacono', 'Arcidiacono, Ryan', '51', 1, 'G', 6, 3, 1.9, 195, 88.5, '1994-03-26', '2017', 4, 'Villanova', 'Villanova/USA', 'USA', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(142, '1627854', '1610612743', 'Bryn', 'Forbes', 'Forbes, Bryn', '6', 1, 'G', 6, 2, 1.88, 205, 93, '1993-07-23', '2016', 5, 'Michigan State', 'Michigan State/USA', 'USA', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(208, '1627863', '1610612762', 'Danuel', 'House Jr.', 'House Jr., Danuel', '25', 1, 'F-G', 6, 6, 1.98, 220, 99.8, '1993-06-07', '2016', 5, 'Texas A&M', 'Texas A&M/USA', 'USA', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(243, '1627884', '1610612741', 'Derrick', 'Jones Jr.', 'Jones Jr., Derrick', '5', 1, 'F', 6, 6, 1.98, 210, 95.3, '1997-02-15', '2016', 5, 'UNLV', 'UNLV/USA', 'USA', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(90, '1627936', '1610612741', 'Alex', 'Caruso', 'Caruso, Alex', '6', 1, 'G', 6, 5, 1.96, 186, 84.4, '1994-02-28', '2017', 4, 'Texas A&M', 'Texas A&M/USA', 'USA', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(345, '1628021', '1610612745', 'David', 'Nwaba', 'Nwaba, David', '2', 1, 'G-F', 6, 5, 1.96, 219, 99.3, '1993-01-14', '2016', 5, 'Cal Poly', 'Cal Poly/USA', 'USA', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(523, '1628035', '0', 'Alfonzo', 'McKinnie', NULL, '28', 0, '', NULL, NULL, NULL, NULL, NULL, '1992-09-17', '2017', NULL, 'Wisc.-Green Bay', 'Wisconsin-Green Bay/USA', 'USA', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(503, '1628221', '1610612754', 'Gabe', 'York', 'York, Gabe', '', 1, 'G', 6, 3, 1.9, 190, 86.2, '1993-08-02', '2021', 0, 'Arizona', 'Arizona/USA', 'USA', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(524, '1628238', '0', 'Paris', 'Bass', NULL, '30', 0, '', NULL, NULL, NULL, NULL, NULL, '1995-08-29', '2021', NULL, 'Detroit Mercy', 'Detroit Mercy/USA', 'USA', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(147, '1628365', '1610612753', 'Markelle', 'Fultz', 'Fultz, Markelle', '20', 1, 'G', 6, 4, 1.93, 209, 94.8, '1998-05-29', '2017', 4, 'Washington', 'Washington/USA', 'USA', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(24, '1628366', '1610612741', 'Lonzo', 'Ball', 'Ball, Lonzo', '2', 1, 'G', 6, 6, 1.98, 190, 86.2, '1997-10-27', '2017', 4, 'UCLA', 'UCLA/USA', 'USA', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(224, '1628367', '1610612758', 'Josh', 'Jackson', 'Jackson, Josh', '55', 1, 'G-F', 6, 8, 2.03, 207, 93.9, '1997-02-10', '2017', 4, 'Kansas', 'Kansas/USA', 'USA', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(145, '1628368', '1610612758', 'De\'Aaron', 'Fox', 'Fox, De\'Aaron', '5', 1, 'G', 6, 3, 1.9, 185, 83.9, '1997-12-20', '2017', 4, 'Kentucky', 'Kentucky/USA', 'USA', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(434, '1628369', '1610612738', 'Jayson', 'Tatum', 'Tatum, Jayson', '0', 1, 'F-G', 6, 8, 2.03, 210, 95.3, '1998-03-03', '2017', 4, 'Duke', 'Duke/USA', 'USA', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(318, '1628370', '1610612747', 'Malik', 'Monk', 'Monk, Malik', '11', 1, 'G', 6, 3, 1.9, 200, 90.7, '1998-02-04', '2017', 4, 'Kentucky', 'Kentucky/USA', 'USA', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(221, '1628371', '1610612753', 'Jonathan', 'Isaac', 'Isaac, Jonathan', '1', 1, 'F', 6, 10, 2.08, 230, 104.3, '1997-10-03', '2017', 3, 'Florida State', 'Florida State/USA', 'USA', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(525, '1628372', '0', 'Dennis', 'Smith Jr.', NULL, '10', 0, '', NULL, NULL, NULL, NULL, NULL, '1997-11-25', '2017', NULL, 'North Carolina State', 'North Carolina State/USA', 'USA', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(342, '1628373', '1610612742', 'Frank', 'Ntilikina', 'Ntilikina, Frank', '21', 1, 'G', 6, 4, 1.93, 200, 90.7, '1998-07-28', '2017', 4, 'Strasbourg IG', 'Strasbourg IG/France', 'France', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(289, '1628374', '1610612739', 'Lauri', 'Markkanen', 'Markkanen, Lauri', '24', 1, 'F-C', 6, 11, 2.11, 240, 108.9, '1997-05-22', '2017', 4, 'Arizona', 'Arizona/Finland', 'Finland', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(316, '1628378', '1610612762', 'Donovan', 'Mitchell', 'Mitchell, Donovan', '45', 1, 'G', 6, 1, 1.85, 215, 97.5, '1996-09-07', '2017', 4, 'Louisville', 'Louisville/USA', 'USA', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(246, '1628379', '1610612746', 'Luke', 'Kennard', 'Kennard, Luke', '5', 1, 'G', 6, 5, 1.96, 206, 93.4, '1996-06-24', '2017', 4, 'Duke', 'Duke/USA', 'USA', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(101, '1628380', '1610612759', 'Zach', 'Collins', 'Collins, Zach', '23', 1, 'F-C', 6, 11, 2.11, 250, 113.4, '1997-11-19', '2017', 3, 'Gonzaga', 'Gonzaga/USA', 'USA', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(100, '1628381', '1610612737', 'John', 'Collins', 'Collins, John', '20', 1, 'F-C', 6, 9, 2.06, 226, 102.5, '1997-09-23', '2017', 4, 'Wake Forest', 'Wake Forest/USA', 'USA', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(526, '1628382', '0', 'Justin', 'Jackson', NULL, '45', 0, '', NULL, NULL, NULL, NULL, NULL, '1995-03-28', '2017', NULL, 'North Carolina', 'North Carolina/USA', 'USA', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(16, '1628384', '1610612761', 'OG', 'Anunoby', 'Anunoby, OG', '3', 1, 'F', 6, 7, 2.01, 232, 105.2, '1997-07-17', '2017', 4, 'Indiana', 'Indiana/United Kingdom', 'United Kingdom', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(527, '1628385', '0', 'Harry', 'Giles III', NULL, '16', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', '', '', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(9, '1628386', '1610612739', 'Jarrett', 'Allen', 'Allen, Jarrett', '31', 1, 'C', 6, 10, 2.08, 243, 110.2, '1998-04-21', '2017', 4, 'Texas-Austin', 'Texas-Austin/USA', 'USA', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(4, '1628389', '1610612748', 'Bam', 'Adebayo', 'Adebayo, Bam', '13', 1, 'C-F', 6, 9, 2.06, 255, 115.7, '1997-07-18', '2017', 4, 'Kentucky', 'Kentucky/USA', 'USA', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(528, '1628391', '0', 'D.J.', 'Wilson', NULL, '9', 0, '', NULL, NULL, NULL, NULL, NULL, '1996-02-19', '2017', NULL, 'Michigan', 'Michigan/USA', 'USA', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(187, '1628392', '1610612746', 'Isaiah', 'Hartenstein', 'Hartenstein, Isaiah', '55', 1, 'C-F', 7, 0, 2.13, 250, 113.4, '1998-05-05', '2018', 3, 'Zalgiris', 'Zalgiris/Germany', 'Germany', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(58, '1628396', '1610612741', 'Tony', 'Bradley', 'Bradley, Tony', '13', 1, 'C-F', 6, 10, 2.08, 248, 112.5, '1998-01-08', '2017', 4, 'North Carolina', 'North Carolina/USA', 'USA', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(258, '1628398', '1610612764', 'Kyle', 'Kuzma', 'Kuzma, Kyle', '33', 1, 'F', 6, 9, 2.06, 221, 100.2, '1995-07-24', '2017', 4, 'Utah', 'Utah/USA', 'USA', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(529, '1628400', '0', 'Semi', 'Ojeleye', NULL, '37', 0, '', NULL, NULL, NULL, NULL, NULL, '1994-12-05', '2017', NULL, 'Southern Methodist', 'Southern Methodist/USA', 'USA', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(480, '1628401', '1610612738', 'Derrick', 'White', 'White, Derrick', '9', 1, 'G', 6, 4, 1.93, 190, 86.2, '1994-07-02', '2017', 4, 'Colorado', 'Colorado/USA', 'USA', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(222, '1628402', '1610612765', 'Frank', 'Jackson', 'Jackson, Frank', '5', 1, 'G', 6, 3, 1.9, 205, 93, '1998-05-04', '2018', 3, 'Duke', 'Duke/USA', 'USA', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(186, '1628404', '1610612757', 'Josh', 'Hart', 'Hart, Josh', '11', 1, 'G', 6, 5, 1.96, 215, 97.5, '1995-03-06', '2017', 4, 'Villanova', 'Villanova/USA', 'USA', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(530, '1628407', '0', 'Dwayne', 'Bacon', NULL, '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', '', '', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(531, '1628410', '0', 'Edmond', 'Sumner', NULL, '5', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', '', '', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(532, '1628411', '0', 'Wes', 'Iwundu', NULL, '24', 0, '', NULL, NULL, NULL, NULL, NULL, '1994-12-20', '2017', NULL, 'Kansas State', 'Kansas State/USA', 'USA', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(65, '1628415', '1610612763', 'Dillon', 'Brooks', 'Brooks, Dillon', '24', 1, 'G-F', 6, 7, 2.01, 225, 102.1, '1996-01-22', '2017', 4, 'Oregon', 'Oregon/Canada', 'Canada', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(75, '1628418', '1610612764', 'Thomas', 'Bryant', 'Bryant, Thomas', '13', 1, 'C-F', 6, 10, 2.08, 248, 112.5, '1997-07-31', '2017', 4, 'Indiana', 'Indiana/USA', 'USA', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(325, '1628420', '1610612743', 'Monte', 'Morris', 'Morris, Monte', '11', 1, 'G', 6, 2, 1.88, 183, 83, '1995-06-27', '2017', 4, 'Iowa State', 'Iowa State/USA', 'USA', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(533, '1628422', '0', 'Damyean', 'Dotson', NULL, '21', 0, '', NULL, NULL, NULL, NULL, NULL, '1994-05-06', '2017', NULL, 'Houston', 'Houston/USA', 'USA', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(69, '1628425', '1610612742', 'Sterling', 'Brown', 'Brown, Sterling', '0', 1, 'G-F', 6, 5, 1.96, 219, 99.3, '1995-02-10', '2017', 4, 'Southern Methodist', 'Southern Methodist/USA', 'USA', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(84, '1628427', '1610612743', 'Vlatko', 'Cancar', 'Cancar, Vlatko', '31', 1, 'F', 6, 8, 2.03, 236, 107, '1997-04-10', '2019', 2, 'San Pablo Burgos', 'San Pablo Burgos/Slovenia', 'Slovenia', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(386, '1628432', '1610612743', 'Davon', 'Reed', 'Reed, Davon', '9', 1, 'G', 6, 5, 1.96, 206, 93.4, '1995-06-11', '2017', 2, 'Miami', 'Miami/USA', 'USA', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(254, '1628436', '1610612738', 'Luke', 'Kornet', 'Kornet, Luke', '40', 1, 'C-F', 7, 2, 2.18, 250, 113.4, '1995-07-15', '2017', 4, 'Vanderbilt', 'Vanderbilt/USA', 'USA', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(55, '1628449', '1610612761', 'Chris', 'Boucher', 'Boucher, Chris', '25', 1, 'F-C', 6, 9, 2.06, 200, 90.7, '1993-01-11', '2017', 4, 'Oregon', 'Oregon/Saint Lucia', 'Saint Lucia', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(438, '1628464', '1610612738', 'Daniel', 'Theis', 'Theis, Daniel', '27', 1, 'F-C', 6, 9, 2.06, 245, 111.1, '1992-04-04', '2017', 4, 'Brose Bamberg', 'Brose Bamberg/Germany', 'Germany', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(249, '1628467', '1610612742', 'Maxi', 'Kleber', 'Kleber, Maxi', '42', 1, 'F', 6, 10, 2.08, 240, 108.9, '1992-01-29', '2017', 4, 'Bayern Munich', 'Bayern Munich/Germany', 'Germany', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(108, '1628470', '1610612756', 'Torrey', 'Craig', 'Craig, Torrey', '0', 1, 'F', 6, 7, 2.01, 221, 100.2, '1990-12-19', '2017', 4, 'South Carolina Upstate', 'South Carolina Upstate/USA', 'USA', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(327, '1628539', '1610612748', 'Mychal', 'Mulder', 'Mulder, Mychal', '12', 1, 'G', 6, 3, 1.9, 195, 88.5, '1994-06-12', '2019', 2, 'Kentucky', 'Kentucky/Canada', 'Canada', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(534, '1628591', '0', 'Craig', 'Sword', NULL, '32', 0, '', NULL, NULL, NULL, NULL, NULL, '1994-01-16', '2021', NULL, 'Mississippi State', 'Mississippi State/USA', 'USA', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(535, '1628778', '0', 'Paul', 'Watson', NULL, '8', 0, '', NULL, NULL, NULL, NULL, NULL, '1994-12-30', '2019', NULL, 'Fresno State', 'Fresno State/USA', 'USA', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(8, '1628960', '1610612749', 'Grayson', 'Allen', 'Allen, Grayson', '7', 1, 'G', 6, 4, 1.93, 198, 89.8, '1995-10-08', '2018', 3, 'Duke', 'Duke/USA', 'USA', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(21, '1628962', '1610612762', 'Udoka', 'Azubuike', 'Azubuike, Udoka', '20', 1, 'C-F', 7, 0, 2.13, 270, 122.5, '1999-09-17', '2020', 1, 'Kansas', 'Kansas/Nigeria', 'Nigeria', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(22, '1628963', '1610612765', 'Marvin', 'Bagley III', 'Bagley III, Marvin', '35', 1, 'F', 6, 11, 2.11, 235, 106.6, '1999-03-14', '2018', 3, 'Duke', 'Duke/USA', 'USA', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(25, '1628964', '1610612753', 'Mo', 'Bamba', 'Bamba, Mo', '5', 1, 'C', 7, 0, 2.13, 231, 104.8, '1998-05-12', '2018', 3, 'Texas-Austin', 'Texas-Austin/USA', 'USA', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(33, '1628966', '1610612759', 'Keita', 'Bates-Diop', 'Bates-Diop, Keita', '31', 1, 'F', 6, 8, 2.03, 229, 103.9, '1996-01-23', '2018', 3, 'Ohio State', 'Ohio State/USA', 'USA', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(60, '1628969', '1610612756', 'Mikal', 'Bridges', 'Bridges, Mikal', '25', 1, 'F', 6, 6, 1.98, 209, 94.8, '1996-08-30', '2018', 3, 'Villanova', 'Villanova/USA', 'USA', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(61, '1628970', '1610612766', 'Miles', 'Bridges', 'Bridges, Miles', '0', 1, 'F', 6, 7, 2.01, 225, 102.1, '1998-03-21', '2018', 3, 'Michigan State', 'Michigan State/USA', 'USA', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(66, '1628971', '1610612751', 'Bruce', 'Brown', 'Brown, Bruce', '1', 1, 'G-F', 6, 4, 1.93, 202, 91.6, '1996-08-15', '2018', 3, 'Miami', 'Miami/USA', 'USA', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(73, '1628972', '1610612741', 'Troy', 'Brown Jr.', 'Brown Jr., Troy', '7', 1, 'G-F', 6, 6, 1.98, 215, 97.5, '1999-07-28', '2018', 3, 'Oregon', 'Oregon/USA', 'USA', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(74, '1628973', '1610612742', 'Jalen', 'Brunson', 'Brunson, Jalen', '13', 1, 'G', 6, 1, 1.85, 190, 86.2, '1996-08-31', '2018', 3, 'Villanova', 'Villanova/USA', 'USA', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(88, '1628975', '1610612749', 'Jevon', 'Carter', 'Carter, Jevon', '5', 1, 'G', 6, 1, 1.85, 200, 90.7, '1995-09-14', '2018', 3, 'West Virginia', 'West Virginia/USA', 'USA', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(89, '1628976', '1610612753', 'Wendell', 'Carter Jr.', 'Carter Jr., Wendell', '34', 1, 'C-F', 6, 10, 2.08, 270, 122.5, '1999-04-16', '2018', 3, 'Duke', 'Duke/USA', 'USA', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(119, '1628977', '1610612765', 'Hamidou', 'Diallo', 'Diallo, Hamidou', '6', 1, 'G', 6, 5, 1.96, 202, 91.6, '1998-07-31', '2018', 3, 'Kentucky', 'Kentucky/USA', 'USA', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(122, '1628978', '1610612758', 'Donte', 'DiVincenzo', 'DiVincenzo, Donte', '0', 1, 'G', 6, 4, 1.93, 203, 92.1, '1997-01-31', '2018', 3, 'Villanova', 'Villanova/USA', 'USA', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(138, '1628981', '1610612745', 'Bruno', 'Fernando', 'Fernando, Bruno', '20', 1, 'F-C', 6, 9, 2.06, 240, 108.9, '1998-08-15', '2019', 2, 'Maryland', 'Maryland/Angola', 'Angola', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(146, '1628982', '1610612760', 'Melvin', 'Frazier Jr.', 'Frazier Jr., Melvin', '6', 1, 'G-F', 6, 5, 1.96, 215, 97.5, '1996-08-30', '2018', 2, 'Tulane', 'Tulane/USA', 'USA', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(158, '1628983', '1610612760', 'Shai', 'Gilgeous-Alexander', 'Gilgeous-Alexander, Shai', '2', 1, 'G', 6, 6, 1.98, 180, 81.6, '1998-07-12', '2018', 3, 'Kentucky', 'Kentucky/Canada', 'Canada', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(164, '1628984', '1610612740', 'Devonte\'', 'Graham', 'Graham, Devonte\'', '4', 1, 'G', 6, 1, 1.85, 195, 88.5, '1995-02-22', '2018', 3, 'Kansas', 'Kansas/USA', 'USA', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(201, '1628988', '1610612756', 'Aaron', 'Holiday', 'Holiday, Aaron', '4', 1, 'G', 6, 0, 1.83, 185, 83.9, '1996-09-30', '2018', 3, 'UCLA', 'UCLA/USA', 'USA', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(211, '1628989', '1610612737', 'Kevin', 'Huerter', 'Huerter, Kevin', '3', 1, 'G-F', 6, 7, 2.01, 198, 89.8, '1998-08-27', '2018', 3, 'Maryland', 'Maryland/USA', 'USA', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(536, '1628990', '0', 'Chandler', 'Hutchison', NULL, '35', 0, '', NULL, NULL, NULL, NULL, NULL, '1996-04-26', '2018', NULL, 'Boise State', 'Boise State/USA', 'USA', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(226, '1628991', '1610612763', 'Jaren', 'Jackson Jr.', 'Jackson Jr., Jaren', '13', 1, 'F-C', 6, 11, 2.11, 242, 109.8, '1999-09-15', '2018', 3, 'Michigan State', 'Michigan State/USA', 'USA', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(251, '1628995', '1610612737', 'Kevin', 'Knox II', 'Knox II, Kevin', '5', 1, 'F', 6, 7, 2.01, 215, 97.5, '1999-08-11', '2018', 3, 'Kentucky', 'Kentucky/USA', 'USA', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(291, '1628997', '1610612748', 'Caleb', 'Martin', 'Martin, Caleb', '16', 1, 'F', 6, 5, 1.96, 205, 93, '1995-09-28', '2019', 2, 'Nevada-Reno', 'Nevada-Reno/USA', 'USA', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(292, '1628998', '1610612766', 'Cody', 'Martin', 'Martin, Cody', '11', 1, 'F', 6, 6, 1.98, 205, 93, '1995-09-28', '2019', 2, 'Nevada-Reno', 'Nevada-Reno/USA', 'USA', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(309, '1629001', '1610612763', 'De\'Anthony', 'Melton', 'Melton, De\'Anthony', '0', 1, 'G', 6, 2, 1.88, 200, 90.7, '1998-05-28', '2018', 3, 'Southern California', 'Southern California/USA', 'USA', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(310, '1629002', '1610612758', 'Chimezie', 'Metu', 'Metu, Chimezie', '7', 1, 'F-C', 6, 9, 2.06, 225, 102.1, '1997-03-22', '2018', 3, 'Southern California', 'Southern California/USA', 'USA', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(314, '1629003', '1610612755', 'Shake', 'Milton', 'Milton, Shake', '18', 1, 'G-F', 6, 5, 1.96, 205, 93, '1996-09-26', '2018', 3, 'Southern Methodist', 'Southern Methodist/USA', 'USA', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(332, '1629004', '1610612761', 'Svi', 'Mykhailiuk', 'Mykhailiuk, Svi', '14', 1, 'G-F', 6, 7, 2.01, 205, 93, '1997-06-10', '2018', 3, 'Kansas', 'Kansas/Ukraine', 'Ukraine', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(349, '1629006', '1610612750', 'Josh', 'Okogie', 'Okogie, Josh', '20', 1, 'G', 6, 4, 1.93, 213, 96.6, '1998-09-01', '2018', 3, 'Georgia Tech', 'Georgia Tech/Nigeria', 'Nigeria', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(369, '1629008', '1610612743', 'Michael', 'Porter Jr.', 'Porter Jr., Michael', '1', 1, 'F', 6, 10, 2.08, 218, 98.9, '1998-06-29', '2019', 2, 'Missouri', 'Missouri/USA', 'USA', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(393, '1629011', '1610612752', 'Mitchell', 'Robinson', 'Robinson, Mitchell', '23', 1, 'C-F', 7, 0, 2.13, 240, 108.9, '1998-04-01', '2018', 3, 'Western Kentucky', 'Western Kentucky/USA', 'USA', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(411, '1629012', '1610612739', 'Collin', 'Sexton', 'Sexton, Collin', '2', 1, 'G', 6, 1, 1.85, 190, 86.2, '1999-01-04', '2018', 3, 'Alabama', 'Alabama/USA', 'USA', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(412, '1629013', '1610612756', 'Landry', 'Shamet', 'Shamet, Landry', '14', 1, 'G', 6, 4, 1.93, 190, 86.2, '1997-03-13', '2018', 3, 'Wichita State', 'Wichita State/USA', 'USA', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(417, '1629014', '1610612757', 'Anfernee', 'Simons', 'Simons, Anfernee', '1', 1, 'G', 6, 3, 1.9, 181, 82.1, '1999-06-08', '2018', 3, 'Edgewater HS (FL)', 'Edgewater HS (FL)/USA', 'USA', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(453, '1629018', '1610612761', 'Gary', 'Trent Jr.', 'Trent Jr., Gary', '33', 1, 'G-F', 6, 5, 1.96, 209, 94.8, '1999-01-18', '2018', 3, 'Duke', 'Duke/USA', 'USA', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(458, '1629020', '1610612750', 'Jarred', 'Vanderbilt', 'Vanderbilt, Jarred', '8', 1, 'F', 6, 9, 2.06, 214, 97.1, '1999-04-03', '2018', 3, 'Kentucky', 'Kentucky/USA', 'USA', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(466, '1629021', '1610612753', 'Moritz', 'Wagner', 'Wagner, Moritz', '21', 1, 'F-C', 6, 11, 2.11, 245, 111.1, '1997-04-26', '2018', 3, 'Michigan', 'Michigan/Germany', 'Germany', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(469, '1629022', '1610612759', 'Lonnie', 'Walker IV', 'Walker IV, Lonnie', '1', 1, 'G-F', 6, 4, 1.93, 204, 92.5, '1998-12-14', '2018', 3, 'Miami', 'Miami/USA', 'USA', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(472, '1629023', '1610612766', 'P.J.', 'Washington', 'Washington, P.J.', '25', 1, 'F', 6, 7, 2.01, 230, 104.3, '1998-08-23', '2019', 2, 'Kentucky', 'Kentucky/USA', 'USA', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(488, '1629026', '1610612760', 'Kenrich', 'Williams', 'Williams, Kenrich', '34', 1, 'G-F', 6, 6, 1.98, 210, 95.3, '1994-12-02', '2018', 3, 'TCU', 'TCU/USA', 'USA', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(505, '1629027', '1610612737', 'Trae', 'Young', 'Young, Trae', '11', 1, 'G', 6, 1, 1.85, 164, 74.4, '1998-09-19', '2018', 3, 'Oklahoma', 'Oklahoma/USA', 'USA', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(20, '1629028', '1610612756', 'Deandre', 'Ayton', 'Ayton, Deandre', '22', 1, 'C', 6, 11, 2.11, 250, 113.4, '1998-07-23', '2018', 3, 'Arizona', 'Arizona/Bahamas', 'Bahamas', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(123, '1629029', '1610612742', 'Luka', 'Doncic', 'Doncic, Luka', '77', 1, 'F-G', 6, 7, 2.01, 230, 104.3, '1999-02-28', '2018', 3, 'Real Madrid', 'Real Madrid/Slovenia', 'Slovenia', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(362, '1629033', '1610612742', 'Theo', 'Pinson', 'Pinson, Theo', '1', 1, 'G-F', 6, 5, 1.96, 212, 96.2, '1995-11-05', '2018', 3, 'North Carolina', 'North Carolina/USA', 'USA', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(132, '1629035', '1610612765', 'Carsen', 'Edwards', 'Edwards, Carsen', '4', 1, 'G', 5, 11, 1.8, 200, 90.7, '1998-03-12', '2019', 2, 'Purdue', 'Purdue/USA', 'USA', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(43, '1629048', '1610612754', 'Goga', 'Bitadze', 'Bitadze, Goga', '88', 1, 'C-F', 7, 0, 2.13, 250, 113.4, '1999-07-20', '2019', 2, 'Mega Basket', 'Mega Basket/Georgia', 'Georgia', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(62, '1629052', '1610612754', 'Oshae', 'Brissett', 'Brissett, Oshae', '12', 1, 'F-G', 6, 7, 2.01, 210, 95.3, '1998-06-20', '2019', 2, 'Syracuse', 'Syracuse/Canada', 'Canada', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(116, '1629056', '1610612758', 'Terence', 'Davis', 'Davis, Terence', '3', 1, 'G', 6, 4, 1.93, 201, 91.2, '1997-05-16', '2019', 2, 'Mississippi', 'Mississippi/USA', 'USA', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(492, '1629057', '1610612738', 'Robert', 'Williams III', 'Williams III, Robert', '44', 1, 'C-F', 6, 9, 2.06, 237, 107.5, '1997-10-17', '2018', 3, 'Texas A&M', 'Texas A&M/USA', 'USA', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(175, '1629060', '1610612764', 'Rui', 'Hachimura', 'Hachimura, Rui', '8', 1, 'F', 6, 8, 2.03, 230, 104.3, '1998-02-08', '2019', 2, 'Gonzaga', 'Gonzaga/Japan', 'Japan', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(52, '1629067', '1610612761', 'Isaac', 'Bonga', 'Bonga, Isaac', '17', 1, 'G', 6, 8, 2.03, 180, 81.6, '1999-11-08', '2018', 3, 'Skyliners Frankfurt', 'Skyliners Frankfurt/Germany', 'Germany', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(104, '1629076', '1610612741', 'Tyler', 'Cook', 'Cook, Tyler', '25', 1, 'F', 6, 8, 2.03, 255, 115.7, '1997-09-23', '2019', 2, 'Iowa', 'Iowa/USA', 'USA', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(256, '1629083', '1610612766', 'Arnoldas', 'Kulboka', 'Kulboka, Arnoldas', '98', 1, 'F', 6, 10, 2.08, 209, 94.8, '1998-01-04', '2021', 0, 'Bilbao', 'Bilbao/Lithuania', 'Lithuania', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(537, '1629091', '0', 'Elijah', 'Bryant', NULL, '6', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', '', '', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(538, '1629103', '0', 'Kelan', 'Martin', NULL, '4', 0, '', NULL, NULL, NULL, NULL, NULL, '1995-08-03', '2019', NULL, 'Butler', 'Butler/USA', 'USA', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(95, '1629109', '1610612740', 'Gary', 'Clark', 'Clark, Gary', '12', 1, 'F', 6, 6, 1.98, 225, 102.1, '1994-11-16', '2018', 3, 'Cincinnati', 'Cincinnati/USA', 'USA', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(261, '1629111', '1610612759', 'Jock', 'Landale', 'Landale, Jock', '34', 1, 'C', 6, 11, 2.11, 255, 115.7, '1995-10-25', '2021', 0, '                                   ', 'Australia/Australia', 'Australia', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(148, '1629117', '1610612747', 'Wenyen', 'Gabriel', 'Gabriel, Wenyen', '35', 1, 'F', 6, 9, 2.06, 205, 93, '1997-03-26', '2019', 2, 'Kentucky', 'Kentucky/South Sudan', 'South Sudan', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(392, '1629130', '1610612748', 'Duncan', 'Robinson', 'Robinson, Duncan', '55', 1, 'F', 6, 7, 2.01, 215, 97.5, '1994-04-22', '2018', 3, 'Michigan', 'Michigan/USA', 'USA', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(343, '1629134', '1610612747', 'Kendrick', 'Nunn', 'Nunn, Kendrick', '12', 1, 'G', 6, 2, 1.88, 190, 86.2, '1995-08-03', '2019', 2, 'Oakland', 'Oakland/USA', 'USA', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(474, '1629139', '1610612761', 'Yuta', 'Watanabe', 'Watanabe, Yuta', '18', 1, 'G-F', 6, 9, 2.06, 215, 97.5, '1994-10-13', '2018', 3, 'George Washington', 'George Washington/Japan', 'Japan', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(539, '1629148', '0', 'Johnny', 'Hamilton', NULL, '24', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', '', '', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(307, '1629162', '1610612750', 'Jordan', 'McLaughlin', 'McLaughlin, Jordan', '6', 1, 'G', 5, 11, 1.8, 185, 83.9, '1996-04-09', '2019', 2, 'Southern California', 'Southern California/USA', 'USA', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(161, '1629164', '1610612739', 'Brandon', 'Goodwin', 'Goodwin, Brandon', '00', 1, 'G', 6, 0, 1.83, 180, 81.6, '1995-10-02', '2018', 3, 'Florida Gulf Coast', 'Florida Gulf Coast/USA', 'USA', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(92, '1629185', '1610612744', 'Chris', 'Chiozza', 'Chiozza, Chris', '2', 1, 'G', 5, 11, 1.8, 175, 79.4, '1995-11-21', '2018', 3, 'Florida', 'Florida/USA', 'USA', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(462, '1629216', '1610612748', 'Gabe', 'Vincent', 'Vincent, Gabe', '2', 1, 'G', 6, 3, 1.9, 200, 90.7, '1996-06-14', '2019', 2, 'California-Santa Barbara', 'California-Santa Barbara/USA', 'USA', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(540, '1629234', '0', 'Drew', 'Eubanks', NULL, '24', 0, '', NULL, NULL, NULL, NULL, NULL, '1997-02-01', '2018', NULL, 'Oregon State', 'Oregon State/USA', 'USA', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(451, '1629308', '1610612744', 'Juan', 'Toscano-Anderson', 'Toscano-Anderson, Juan', '95', 1, 'F', 6, 6, 1.98, 209, 94.8, '1993-04-10', '2019', 2, 'Marquette', 'Marquette/USA', 'USA', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(541, '1629309', '0', 'Trayvon', 'Palmer', NULL, '99', 0, '', NULL, NULL, NULL, NULL, NULL, '1994-11-13', '2021', NULL, 'Chicago State', 'Chicago State/USA', 'USA', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(197, '1629312', '1610612748', 'Haywood', 'Highsmith', 'Highsmith, Haywood', '24', 1, 'F', 6, 4, 1.93, 220, 99.8, '1996-12-09', '2018', 1, 'Wheeling Jesuit', 'Wheeling Jesuit/USA', 'USA', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(542, '1629460', '0', 'Justin', 'Tillman', NULL, '36', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', '', '', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(543, '1629598', '0', 'Chris', 'Clemons', NULL, '39', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', '', '', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(99, '1629599', '1610612746', 'Amir', 'Coffey', 'Coffey, Amir', '7', 1, 'G-F', 6, 7, 2.01, 210, 95.3, '1997-06-17', '2019', 2, 'Minnesota', 'Minnesota/USA', 'USA', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(544, '1629600', '0', 'Jarron', 'Cumberland', NULL, '34', 0, '', NULL, NULL, NULL, NULL, NULL, '1997-09-22', '2021', NULL, 'Cincinnati', 'Cincinnati/USA', 'USA', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(134, '1629604', '1610612757', 'CJ', 'Elleby', 'Elleby, CJ', '16', 1, 'F-G', 6, 6, 1.98, 200, 90.7, '2000-06-16', '2020', 1, 'Washington State', 'Washington State/USA', 'USA', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(545, '1629605', '0', 'Tacko', 'Fall', NULL, '99', 0, '', NULL, NULL, NULL, NULL, NULL, '1995-12-10', '2019', NULL, 'Central Florida', 'Central Florida/Senegal', 'Senegal', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(181, '1629607', '1610612740', 'Jared', 'Harper', 'Harper, Jared', '2', 1, 'G', 5, 10, 1.78, 175, 79.4, '1997-09-14', '2019', 2, 'Auburn', 'Auburn/USA', 'USA', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(286, '1629611', '1610612746', 'Terance', 'Mann', 'Mann, Terance', '14', 1, 'G-F', 6, 5, 1.96, 215, 97.5, '1996-10-18', '2019', 2, 'Florida State', 'Florida State/USA', 'USA', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(374, '1629619', '1610612755', 'Myles', 'Powell', 'Powell, Myles', '5', 1, 'G', 6, 2, 1.88, 195, 88.5, '1997-07-07', '2021', 0, 'Seton Hall', 'Seton Hall/USA', 'USA', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(431, '1629622', '1610612748', 'Max', 'Strus', 'Strus, Max', '31', 1, 'G-F', 6, 5, 1.96, 215, 97.5, '1996-03-28', '2019', 2, 'DePaul', 'DePaul/USA', 'USA', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(485, '1629623', '1610612749', 'Lindell', 'Wigginton', 'Wigginton, Lindell', '28', 1, 'G', 6, 1, 1.85, 189, 85.7, '1998-03-28', '2021', 0, 'Iowa State', 'Iowa State/Canada', 'Canada', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(50, '1629626', '1610612753', 'Bol', 'Bol', 'Bol, Bol', '10', 1, 'C-F', 7, 2, 2.18, 220, 99.8, '1999-11-16', '2019', 2, 'Oregon', 'Oregon/Sudan', 'Sudan', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(493, '1629627', '1610612740', 'Zion', 'Williamson', 'Williamson, Zion', '1', 1, 'F', 6, 6, 1.98, 284, 128.8, '2000-07-06', '2019', 2, 'Duke', 'Duke/USA', 'USA', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(30, '1629628', '1610612752', 'RJ', 'Barrett', 'Barrett, RJ', '9', 1, 'F-G', 6, 6, 1.98, 214, 97.1, '2000-06-14', '2019', 2, 'Duke', 'Duke/Canada', 'Canada', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(385, '1629629', '1610612752', 'Cam', 'Reddish', 'Reddish, Cam', '21', 1, 'F-G', 6, 8, 2.03, 217, 98.4, '1999-09-01', '2019', 2, 'Duke', 'Duke/USA', 'USA', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(322, '1629630', '1610612763', 'Ja', 'Morant', 'Morant, Ja', '12', 1, 'G', 6, 3, 1.9, 174, 78.9, '1999-08-10', '2019', 2, 'Murray State', 'Murray State/USA', 'USA', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(214, '1629631', '1610612737', 'De\'Andre', 'Hunter', 'Hunter, De\'Andre', '12', 1, 'F-G', 6, 8, 2.03, 221, 100.2, '1997-12-02', '2019', 2, 'Virginia', 'Virginia/USA', 'USA', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(479, '1629632', '1610612741', 'Coby', 'White', 'White, Coby', '0', 1, 'G', 6, 4, 1.93, 195, 88.5, '2000-02-16', '2019', 2, 'North Carolina', 'North Carolina/USA', 'USA', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(110, '1629633', '1610612763', 'Jarrett', 'Culver', 'Culver, Jarrett', '23', 1, 'G-F', 6, 6, 1.98, 195, 88.5, '1999-02-20', '2019', 2, 'Texas Tech', 'Texas Tech/USA', 'USA', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(96, '1629634', '1610612763', 'Brandon', 'Clarke', 'Clarke, Brandon', '15', 1, 'F', 6, 8, 2.03, 215, 97.5, '1996-09-19', '2019', 2, 'Gonzaga', 'Gonzaga/Canada', 'Canada', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(151, '1629636', '1610612739', 'Darius', 'Garland', 'Garland, Darius', '10', 1, 'G', 6, 1, 1.85, 192, 87.1, '2000-01-26', '2019', 2, 'Vanderbilt', 'Vanderbilt/USA', 'USA', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(190, '1629637', '1610612740', 'Jaxson', 'Hayes', 'Hayes, Jaxson', '10', 1, 'C-F', 6, 11, 2.11, 220, 99.8, '2000-05-23', '2019', 2, 'Texas-Austin', 'Texas-Austin/USA', 'USA', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(7, '1629638', '1610612762', 'Nickeil', 'Alexander-Walker', 'Alexander-Walker, Nickeil', '6', 1, 'G', 6, 5, 1.96, 205, 93, '1998-09-02', '2019', 2, 'Virginia Tech', 'Virginia Tech/Canada', 'Canada', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(195, '1629639', '1610612748', 'Tyler', 'Herro', 'Herro, Tyler', '14', 1, 'G', 6, 5, 1.96, 195, 88.5, '2000-01-20', '2019', 2, 'Kentucky', 'Kentucky/USA', 'USA', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(233, '1629640', '1610612759', 'Keldon', 'Johnson', 'Johnson, Keldon', '3', 1, 'F-G', 6, 6, 1.98, 220, 99.8, '1999-10-11', '2019', 2, 'Kentucky', 'Kentucky/USA', 'USA', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(262, '1629641', '1610612759', 'Romeo', 'Langford', 'Langford, Romeo', '35', 1, 'G-F', 6, 5, 1.96, 216, 98, '1999-10-25', '2019', 2, 'Indiana', 'Indiana/USA', 'USA', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(273, '1629642', '1610612757', 'Nassir', 'Little', 'Little, Nassir', '9', 1, 'F-G', 6, 5, 1.96, 220, 99.8, '2000-02-11', '2019', 2, 'North Carolina', 'North Carolina/USA', 'USA', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(348, '1629643', '1610612753', 'Chuma', 'Okeke', 'Okeke, Chuma', '3', 1, 'F', 6, 6, 1.98, 229, 103.9, '1998-08-18', '2020', 1, 'Auburn', 'Auburn/USA', 'USA', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(368, '1629645', '1610612745', 'Kevin', 'Porter Jr.', 'Porter Jr., Kevin', '3', 1, 'G-F', 6, 4, 1.93, 203, 92.1, '2000-05-04', '2019', 2, 'Southern California', 'Southern California/USA', 'USA', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(32, '1629646', '1610612755', 'Charles', 'Bassey', 'Bassey, Charles', '23', 1, 'C-F', 6, 9, 2.06, 230, 104.3, '2000-10-28', '2021', 0, 'Western Kentucky', 'Western Kentucky/Nigeria', 'Nigeria', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(36, '1629647', '1610612760', 'Darius', 'Bazley', 'Bazley, Darius', '7', 1, 'F', 6, 8, 2.03, 208, 94.3, '2000-06-12', '2019', 2, 'Princeton HS (OH)', 'Princeton HS (OH)/USA', 'USA', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(59, '1629649', '1610612753', 'Ignas', 'Brazdeikis', 'Brazdeikis, Ignas', '17', 1, 'F', 6, 6, 1.98, 221, 100.2, '1999-01-08', '2019', 2, 'Michigan', 'Michigan/Canada', 'Canada', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(68, '1629650', '1610612739', 'Moses', 'Brown', 'Brown, Moses', '6', 1, 'C', 7, 2, 2.18, 245, 111.1, '1999-10-13', '2019', 2, 'UCLA', 'UCLA/USA', 'USA', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(98, '1629651', '1610612751', 'Nic', 'Claxton', 'Claxton, Nic', '33', 1, 'F-C', 6, 11, 2.11, 215, 97.5, '1999-04-17', '2019', 2, 'Georgia', 'Georgia/USA', 'USA', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(124, '1629652', '1610612760', 'Luguentz', 'Dort', 'Dort, Luguentz', '5', 1, 'G', 6, 3, 1.9, 215, 97.5, '1999-04-19', '2019', 2, 'Arizona State', 'Arizona State/Canada', 'Canada', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(149, '1629655', '1610612764', 'Daniel', 'Gafford', 'Gafford, Daniel', '21', 1, 'F-C', 6, 9, 2.06, 234, 106.1, '1998-10-01', '2019', 2, 'Arkansas', 'Arkansas/USA', 'USA', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(174, '1629656', '1610612752', 'Quentin', 'Grimes', 'Grimes, Quentin', '6', 1, 'G', 6, 4, 1.93, 210, 95.3, '2000-05-08', '2021', 0, 'Houston', 'Houston/USA', 'USA', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(207, '1629659', '1610612747', 'Talen', 'Horton-Tucker', 'Horton-Tucker, Talen', '5', 1, 'G', 6, 4, 1.93, 234, 106.1, '2000-11-25', '2019', 2, 'Iowa State', 'Iowa State/USA', 'USA', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(228, '1629660', '1610612760', 'Ty', 'Jerome', 'Jerome, Ty', '16', 1, 'G-F', 6, 5, 1.96, 195, 88.5, '1997-07-08', '2019', 2, 'Virginia', 'Virginia/USA', 'USA', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(230, '1629661', '1610612756', 'Cameron', 'Johnson', 'Johnson, Cameron', '23', 1, 'F', 6, 8, 2.03, 210, 95.3, '1996-03-03', '2019', 2, 'North Carolina', 'North Carolina/USA', 'USA', '2022-04-13 11:13:24', '2022-04-13 11:13:24');
INSERT INTO `players` (`id`, `personId`, `teamId`, `firstName`, `lastName`, `temporaryDisplayName`, `jersey`, `isActive`, `pos`, `heightFeet`, `heightInches`, `heightMeters`, `weightPounds`, `weightKilograms`, `dateOfBirthUTC`, `nbaDebutYear`, `yearsPro`, `collegeName`, `lastAffiliation`, `country`, `created_at`, `updated_at`) VALUES
(303, '1629667', '1610612766', 'Jalen', 'McDaniels', 'McDaniels, Jalen', '6', 1, 'F-C', 6, 9, 2.06, 205, 93, '1998-01-31', '2019', 2, 'San Diego State', 'San Diego State/USA', 'USA', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(341, '1629669', '1610612750', 'Jaylen', 'Nowell', 'Nowell, Jaylen', '4', 1, 'G', 6, 4, 1.93, 201, 91.2, '1999-07-09', '2019', 2, 'Washington', 'Washington/USA', 'USA', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(346, '1629670', '1610612749', 'Jordan', 'Nwora', 'Nwora, Jordan', '13', 1, 'F', 6, 8, 2.03, 225, 102.1, '1998-09-09', '2020', 1, 'Louisville', 'Louisville/USA', 'USA', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(546, '1629671', '0', 'Miye', 'Oni', NULL, '18', 0, '', NULL, NULL, NULL, NULL, NULL, '1997-08-04', '2019', NULL, 'Yale', 'Yale/USA', 'USA', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(356, '1629672', '1610612762', 'Eric', 'Paschall', 'Paschall, Eric', '0', 1, 'F', 6, 6, 1.98, 255, 115.7, '1996-11-04', '2019', 2, 'Villanova', 'Villanova/USA', 'USA', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(367, '1629673', '1610612744', 'Jordan', 'Poole', 'Poole, Jordan', '3', 1, 'G', 6, 4, 1.93, 194, 88, '1999-06-19', '2019', 2, 'Michigan', 'Michigan/USA', 'USA', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(381, '1629674', '1610612758', 'Neemias', 'Queta', 'Queta, Neemias', '88', 1, 'C', 7, 0, 2.13, 248, 112.5, '1999-07-13', '2021', 0, 'Utah State', 'Utah State/Portugal', 'Portugal', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(388, '1629675', '1610612750', 'Naz', 'Reid', 'Reid, Naz', '11', 1, 'C-F', 6, 9, 2.06, 264, 119.8, '1999-08-26', '2019', 2, 'Louisiana State', 'Louisiana State/USA', 'USA', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(395, '1629676', '1610612760', 'Isaiah', 'Roby', 'Roby, Isaiah', '22', 1, 'F', 6, 8, 2.03, 230, 104.3, '1998-02-03', '2019', 2, 'Nebraska-Lincoln', 'Nebraska-Lincoln/USA', 'USA', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(547, '1629677', '0', 'Luka', 'Samanic', NULL, '91', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', '', '', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(407, '1629678', '1610612753', 'Admiral', 'Schofield', 'Schofield, Admiral', '25', 1, 'F', 6, 5, 1.96, 241, 109.3, '1997-03-30', '2019', 1, 'Tennessee', 'Tennessee/United Kingdom', 'United Kingdom', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(446, '1629680', '1610612755', 'Matisse', 'Thybulle', 'Thybulle, Matisse', '22', 1, 'G-F', 6, 5, 1.96, 201, 91.2, '1997-03-04', '2019', 2, 'Washington', 'Washington/USA', 'USA', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(447, '1629681', '1610612763', 'Killian', 'Tillie', 'Tillie, Killian', '35', 1, 'F-C', 6, 9, 2.06, 220, 99.8, '1998-03-05', '2020', 1, 'Gonzaga', 'Gonzaga/France', 'France', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(477, '1629683', '1610612744', 'Quinndary', 'Weatherspoon', 'Weatherspoon, Quinndary', '15', 1, 'G', 6, 3, 1.9, 205, 93, '1996-09-10', '2019', 2, 'Mississippi State', 'Mississippi State/USA', 'USA', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(487, '1629684', '1610612738', 'Grant', 'Williams', 'Williams, Grant', '12', 1, 'F', 6, 6, 1.98, 236, 107, '1998-11-30', '2019', 2, 'Tennessee', 'Tennessee/USA', 'USA', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(494, '1629685', '1610612739', 'Dylan', 'Windler', 'Windler, Dylan', '9', 1, 'G-F', 6, 6, 1.98, 196, 88.9, '1996-09-22', '2020', 1, 'Belmont', 'Belmont/USA', 'USA', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(278, '1629712', '1610612757', 'Didi', 'Louzada', 'Louzada, Didi', '35', 1, 'G', 6, 5, 1.96, 188, 85.3, '1999-07-02', '2020', 1, 'Sydney Kings', 'Sydney Kings/Brazil', 'Brazil', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(548, '1629713', '0', 'Justin', 'James', NULL, '21', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', '', '', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(64, '1629717', '1610612761', 'Armoni', 'Brooks', 'Brooks, Armoni', '1', 1, 'G', 6, 3, 1.9, 195, 88.5, '1998-06-05', '2020', 1, 'Houston', 'Houston/USA', 'USA', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(71, '1629718', '1610612755', 'Charlie', 'Brown Jr.', 'Brown Jr., Charlie', '16', 1, 'G', 6, 6, 1.98, 199, 90.3, '1997-02-02', '2019', 2, 'St. Joseph\'s (PA)', 'St. Joseph\'s (PA)/USA', 'USA', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(81, '1629719', '1610612759', 'Devontae', 'Cacok', 'Cacok, Devontae', '18', 1, 'F', 6, 7, 2.01, 240, 108.9, '1996-10-08', '2019', 2, 'North Carolina-Wilmington', 'North Carolina-Wilmington/USA', 'USA', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(252, '1629723', '1610612763', 'John', 'Konchar', 'Konchar, John', '46', 1, 'G', 6, 5, 1.96, 210, 95.3, '1996-03-22', '2019', 2, 'Indiana-Purdue Fort Wayne', 'Indiana-Purdue Fort Wayne/USA', 'USA', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(294, '1629726', '1610612745', 'Garrison', 'Mathews', 'Mathews, Garrison', '25', 1, 'G', 6, 5, 1.96, 215, 97.5, '1996-10-24', '2019', 2, 'Lipscomb', 'Lipscomb/USA', 'USA', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(455, '1629730', '1610612749', 'Rayjon', 'Tucker', 'Tucker, Rayjon', '59', 1, 'G', 6, 3, 1.9, 209, 94.8, '1997-09-24', '2019', 2, 'Arkansas-Little Rock', 'Arkansas-Little Rock/USA', 'USA', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(464, '1629731', '1610612739', 'Dean', 'Wade', 'Wade, Dean', '32', 1, 'F-C', 6, 9, 2.06, 228, 103.4, '1996-11-20', '2019', 2, 'Kansas State', 'Kansas State/USA', 'USA', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(442, '1629744', '1610612741', 'Matt', 'Thomas', 'Thomas, Matt', '21', 1, 'G', 6, 3, 1.9, 190, 86.2, '1994-08-04', '2019', 2, 'Iowa State', 'Iowa State/USA', 'USA', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(170, '1629750', '1610612741', 'Javonte', 'Green', 'Green, Javonte', '24', 1, 'G-F', 6, 5, 1.96, 205, 93, '1993-07-23', '2019', 2, 'Radford', 'Radford/USA', 'USA', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(323, '1629752', '1610612738', 'Juwan', 'Morgan', 'Morgan, Juwan', '16', 1, 'F', 6, 7, 2.01, 232, 105.2, '1997-04-17', '2019', 2, 'Indiana', 'Indiana/USA', 'USA', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(47, '1629833', '1610612757', 'Keljin', 'Blevins', 'Blevins, Keljin', '21', 1, 'G', 6, 4, 1.93, 200, 90.7, '1995-11-24', '2020', 1, 'Montana State', 'Montana State/USA', 'USA', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(549, '1629873', '0', 'Jaysean', 'Paige', NULL, '42', 0, '', NULL, NULL, NULL, NULL, NULL, '1994-07-30', '2021', NULL, 'West Virginia', 'West Virginia/USA', 'USA', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(321, '1629875', '1610612746', 'Xavier', 'Moon', 'Moon, Xavier', '15', 1, 'G', 6, 2, 1.88, 165, 74.8, '1995-01-02', '2021', 0, 'Morehead State', 'Morehead State/USA', 'USA', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(85, '1629962', '1610612753', 'Devin', 'Cannady', 'Cannady, Devin', '', 1, 'G', 6, 2, 1.88, 183, 83, '1996-05-21', '2020', 1, 'Princeton', 'Princeton/USA', 'USA', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(131, '1630162', '1610612750', 'Anthony', 'Edwards', 'Edwards, Anthony', '1', 1, 'G', 6, 4, 1.93, 225, 102.1, '2001-08-05', '2020', 1, 'Georgia', 'Georgia/USA', 'USA', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(23, '1630163', '1610612766', 'LaMelo', 'Ball', 'Ball, LaMelo', '2', 1, 'G', 6, 7, 2.01, 180, 81.6, '2001-08-22', '2020', 1, 'Illawarra', 'Illawarra/USA', 'USA', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(497, '1630164', '1610612744', 'James', 'Wiseman', 'Wiseman, James', '33', 1, 'C', 7, 0, 2.13, 240, 108.9, '2001-03-31', '2020', 1, 'Memphis', 'Memphis/USA', 'USA', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(191, '1630165', '1610612765', 'Killian', 'Hayes', 'Hayes, Killian', '7', 1, 'G', 6, 5, 1.96, 195, 88.5, '2001-07-27', '2020', 1, 'Ratiopharm Ulm', 'Ratiopharm Ulm/France', 'France', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(19, '1630166', '1610612764', 'Deni', 'Avdija', 'Avdija, Deni', '9', 1, 'F', 6, 9, 2.06, 210, 95.3, '2001-01-03', '2020', 1, 'Maccabi Tel Aviv', 'Maccabi Tel Aviv/Israel', 'Israel', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(450, '1630167', '1610612752', 'Obi', 'Toppin', 'Toppin, Obi', '1', 1, 'F', 6, 9, 2.06, 220, 99.8, '1998-03-04', '2020', 1, 'Dayton', 'Dayton/USA', 'USA', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(350, '1630168', '1610612737', 'Onyeka', 'Okongwu', 'Okongwu, Onyeka', '17', 1, 'F-C', 6, 8, 2.03, 240, 108.9, '2000-12-11', '2020', 1, 'Southern California', 'Southern California/USA', 'USA', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(176, '1630169', '1610612754', 'Tyrese', 'Haliburton', 'Haliburton, Tyrese', '0', 1, 'G', 6, 5, 1.96, 185, 83.9, '2000-02-29', '2020', 1, 'Iowa State', 'Iowa State/USA', 'USA', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(460, '1630170', '1610612759', 'Devin', 'Vassell', 'Vassell, Devin', '24', 1, 'G-F', 6, 5, 1.96, 200, 90.7, '2000-08-23', '2020', 1, 'Florida State', 'Florida State/USA', 'USA', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(351, '1630171', '1610612739', 'Isaac', 'Okoro', 'Okoro, Isaac', '35', 1, 'F-G', 6, 5, 1.96, 225, 102.1, '2001-01-26', '2020', 1, 'Auburn', 'Auburn/USA', 'USA', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(490, '1630172', '1610612741', 'Patrick', 'Williams', 'Williams, Patrick', '44', 1, 'F', 6, 7, 2.01, 215, 97.5, '2001-08-26', '2020', 1, 'Florida State', 'Florida State/USA', 'USA', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(2, '1630173', '1610612761', 'Precious', 'Achiuwa', 'Achiuwa, Precious', '5', 1, 'F', 6, 8, 2.03, 225, 102.1, '1999-09-19', '2020', 1, 'Memphis', 'Memphis/Nigeria', 'Nigeria', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(335, '1630174', '1610612738', 'Aaron', 'Nesmith', 'Nesmith, Aaron', '26', 1, 'G-F', 6, 5, 1.96, 215, 97.5, '1999-10-16', '2020', 1, 'Vanderbilt', 'Vanderbilt/USA', 'USA', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(15, '1630175', '1610612753', 'Cole', 'Anthony', 'Anthony, Cole', '50', 1, 'G', 6, 3, 1.9, 185, 83.9, '2000-05-15', '2020', 1, 'North Carolina', 'North Carolina/USA', 'USA', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(87, '1630176', '1610612764', 'Vernon', 'Carey Jr.', 'Carey Jr., Vernon', '22', 1, 'F-C', 6, 9, 2.06, 270, 122.5, '2001-02-25', '2020', 1, 'Duke', 'Duke/USA', 'USA', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(284, '1630177', '1610612760', 'Theo', 'Maledon', 'Maledon, Theo', '11', 1, 'G', 6, 4, 1.93, 175, 79.4, '2001-06-12', '2020', 1, 'Asvel', 'Asvel/France', 'France', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(296, '1630178', '1610612755', 'Tyrese', 'Maxey', 'Maxey, Tyrese', '0', 1, 'G', 6, 2, 1.88, 200, 90.7, '2000-11-04', '2020', 1, 'Kentucky', 'Kentucky/USA', 'USA', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(437, '1630179', '1610612763', 'Tyrell', 'Terry', 'Terry, Tyrell', '3', 1, 'G', 6, 2, 1.88, 160, 72.6, '2000-09-28', '2020', 1, 'Stanford', 'Stanford/USA', 'USA', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(41, '1630180', '1610612765', 'Saddiq', 'Bey', 'Bey, Saddiq', '41', 1, 'F', 6, 7, 2.01, 215, 97.5, '1999-04-09', '2020', 1, 'Villanova', 'Villanova/USA', 'USA', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(177, '1630181', '1610612753', 'R.J.', 'Hampton', 'Hampton, R.J.', '13', 1, 'G', 6, 4, 1.93, 175, 79.4, '2001-02-07', '2020', 1, 'New Zealand Breakers', 'New Zealand Breakers/USA', 'USA', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(172, '1630182', '1610612742', 'Josh', 'Green', 'Green, Josh', '8', 1, 'G', 6, 5, 1.96, 200, 90.7, '2000-11-16', '2020', 1, 'Arizona', 'Arizona/Australia', 'Australia', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(302, '1630183', '1610612750', 'Jaden', 'McDaniels', 'McDaniels, Jaden', '3', 1, 'F', 6, 9, 2.06, 185, 83.9, '2000-09-29', '2020', 1, 'Washington', 'Washington/USA', 'USA', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(271, '1630184', '1610612740', 'Kira', 'Lewis Jr.', 'Lewis Jr., Kira', '13', 1, 'G', 6, 1, 1.85, 170, 77.1, '2001-04-06', '2020', 1, 'Alabama', 'Alabama/USA', 'USA', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(422, '1630188', '1610612754', 'Jalen', 'Smith', 'Smith, Jalen', '25', 1, 'F-C', 6, 10, 2.08, 215, 97.5, '2000-03-16', '2020', 1, 'Maryland', 'Maryland/USA', 'USA', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(212, '1630190', '1610612757', 'Elijah', 'Hughes', 'Hughes, Elijah', '19', 1, 'G', 6, 5, 1.96, 215, 97.5, '1998-03-10', '2020', 1, 'Syracuse', 'Syracuse/USA', 'USA', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(430, '1630191', '1610612765', 'Isaiah', 'Stewart', 'Stewart, Isaiah', '28', 1, 'F-C', 6, 8, 2.03, 250, 113.4, '2001-05-22', '2020', 1, 'Washington', 'Washington/USA', 'USA', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(339, '1630192', '1610612743', 'Zeke', 'Nnaji', 'Nnaji, Zeke', '22', 1, 'F-C', 6, 9, 2.06, 240, 108.9, '2001-01-09', '2020', 1, 'Arizona', 'Arizona/USA', 'USA', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(382, '1630193', '1610612752', 'Immanuel', 'Quickley', 'Quickley, Immanuel', '5', 1, 'G', 6, 3, 1.9, 190, 86.2, '1999-06-17', '2020', 1, 'Kentucky', 'Kentucky/USA', 'USA', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(387, '1630194', '1610612755', 'Paul', 'Reed', 'Reed, Paul', '44', 1, 'F', 6, 9, 2.06, 210, 95.3, '1999-06-14', '2020', 1, 'DePaul', 'DePaul/USA', 'USA', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(51, '1630195', '1610612750', 'Leandro', 'Bolmaro', 'Bolmaro, Leandro', '9', 1, 'F', 6, 6, 1.98, 200, 90.7, '2000-09-11', '2021', 0, 'FC Barcelona', 'FC Barcelona/Argentina', 'Argentina', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(365, '1630197', '1610612760', 'Aleksej', 'Pokusevski', 'Pokusevski, Aleksej', '17', 1, 'F', 7, 0, 2.13, 190, 86.2, '2001-12-26', '2020', 1, 'Olympiacos', 'Olympiacos/Serbia', 'Serbia', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(229, '1630198', '1610612755', 'Isaiah', 'Joe', 'Joe, Isaiah', '7', 1, 'G', 6, 4, 1.93, 165, 74.8, '1999-07-02', '2020', 1, 'Arkansas', 'Arkansas/USA', 'USA', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(241, '1630200', '1610612759', 'Tre', 'Jones', 'Jones, Tre', '33', 1, 'G', 6, 1, 1.85, 185, 83.9, '2000-01-08', '2020', 1, 'Duke', 'Duke/USA', 'USA', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(141, '1630201', '1610612761', 'Malachi', 'Flynn', 'Flynn, Malachi', '22', 1, 'G', 6, 1, 1.85, 175, 79.4, '1998-05-09', '2020', 1, 'San Diego State', 'San Diego State/USA', 'USA', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(379, '1630202', '1610612738', 'Payton', 'Pritchard', 'Pritchard, Payton', '11', 1, 'G', 6, 1, 1.85, 195, 88.5, '1998-01-28', '2020', 1, 'Oregon', 'Oregon/USA', 'USA', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(428, '1630205', '1610612739', 'Lamar', 'Stevens', 'Stevens, Lamar', '8', 1, 'F', 6, 6, 1.98, 230, 104.3, '1997-07-09', '2020', 1, 'Penn State', 'Penn State/USA', 'USA', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(409, '1630206', '1610612746', 'Jay', 'Scrubb', 'Scrubb, Jay', '0', 1, 'G', 6, 5, 1.96, 220, 99.8, '2000-09-01', '2020', 1, 'John A. Logan', 'John A. Logan/USA', 'USA', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(200, '1630207', '1610612754', 'Nate', 'Hinton', 'Hinton, Nate', '14', 1, 'G-F', 6, 5, 1.96, 210, 95.3, '1999-06-08', '2020', 1, 'Houston', 'Houston/USA', 'USA', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(389, '1630208', '1610612766', 'Nick', 'Richards', 'Richards, Nick', '14', 1, 'C', 7, 0, 2.13, 245, 111.1, '1997-11-29', '2020', 1, 'Kentucky', 'Kentucky/Jamaica', 'Jamaica', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(506, '1630209', '1610612748', 'Omer', 'Yurtseven', 'Yurtseven, Omer', '77', 1, 'C', 6, 11, 2.11, 275, 124.7, '1998-06-19', '2021', 0, 'Georgetown', 'Georgetown/Turkey', 'Turkey', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(210, '1630210', '1610612743', 'Markus', 'Howard', 'Howard, Markus', '00', 1, 'G', 5, 10, 1.78, 175, 79.4, '1999-03-03', '2020', 1, 'Marquette', 'Marquette/USA', 'USA', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(448, '1630214', '1610612763', 'Xavier', 'Tillman', 'Tillman, Xavier', '2', 1, 'F', 6, 8, 2.03, 245, 111.1, '1999-01-12', '2020', 1, 'Michigan State', 'Michigan State/USA', 'USA', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(79, '1630215', '1610612762', 'Jared', 'Butler', 'Butler, Jared', '13', 1, 'G', 6, 3, 1.9, 193, 87.5, '2000-08-25', '2021', 0, 'Baylor', 'Baylor/USA', 'USA', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(496, '1630216', '1610612764', 'Cassius', 'Winston', 'Winston, Cassius', '5', 1, 'G', 6, 1, 1.85, 185, 83.9, '1998-02-28', '2020', 1, 'Michigan State', 'Michigan State/USA', 'USA', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(26, '1630217', '1610612763', 'Desmond', 'Bane', 'Bane, Desmond', '22', 1, 'G', 6, 5, 1.96, 215, 97.5, '1998-06-25', '2020', 1, 'TCU', 'TCU/USA', 'USA', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(499, '1630218', '1610612759', 'Robert', 'Woodard II', 'Woodard II, Robert', '28', 1, 'F', 6, 6, 1.98, 235, 106.6, '1999-09-22', '2020', 1, 'Mississippi State', 'Mississippi State/USA', 'USA', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(297, '1630219', '1610612737', 'Skylar', 'Mays', 'Mays, Skylar', '4', 1, 'G', 6, 4, 1.93, 205, 93, '1997-09-05', '2020', 1, 'Louisiana State', 'Louisiana State/USA', 'USA', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(240, '1630222', '1610612747', 'Mason', 'Jones', 'Jones, Mason', '40', 1, 'G', 6, 4, 1.93, 200, 90.7, '1998-07-21', '2020', 1, 'Arkansas', 'Arkansas/USA', 'USA', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(168, '1630224', '1610612745', 'Jalen', 'Green', 'Green, Jalen', '0', 1, 'G', 6, 4, 1.93, 186, 84.4, '2002-02-09', '2021', 0, 'NBA G League Ignite', 'NBA G League Ignite/USA', 'USA', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(449, '1630225', '1610612764', 'Isaiah', 'Todd', 'Todd, Isaiah', '14', 1, 'F', 6, 9, 2.06, 219, 99.3, '2001-10-17', '2021', 0, 'NBA G League Ignite', 'NBA G League Ignite/USA', 'USA', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(338, '1630227', '1610612745', 'Daishen', 'Nix', 'Nix, Daishen', '15', 1, 'G', 6, 4, 1.93, 226, 102.5, '2002-02-13', '2021', 0, 'NBA G League Ignite', 'NBA G League Ignite/USA', 'USA', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(257, '1630228', '1610612744', 'Jonathan', 'Kuminga', 'Kuminga, Jonathan', '00', 1, 'F', 6, 7, 2.01, 225, 102.1, '2002-10-06', '2021', 0, 'NBA G League Ignite', 'NBA G League Ignite/DRC', 'DRC', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(290, '1630230', '1610612740', 'Naji', 'Marshall', 'Marshall, Naji', '8', 1, 'F', 6, 7, 2.01, 220, 99.8, '1998-01-24', '2020', 1, 'Xavier', 'Xavier/USA', 'USA', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(293, '1630231', '1610612745', 'Kenyon', 'Martin Jr.', 'Martin Jr., Kenyon', '6', 1, 'F', 6, 5, 1.96, 215, 97.5, '2001-01-06', '2020', 1, 'IMG Academy (FL)', 'IMG Academy (FL)/USA', 'USA', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(250, '1630233', '1610612750', 'Nathan', 'Knight', 'Knight, Nathan', '13', 1, 'F-C', 6, 10, 2.08, 253, 114.8, '1997-09-20', '2020', 1, 'William & Mary', 'William & Mary/USA', 'USA', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(143, '1630235', '1610612762', 'Trent', 'Forrest', 'Forrest, Trent', '3', 1, 'G', 6, 4, 1.93, 210, 95.3, '1998-06-12', '2020', 1, 'Florida State', 'Florida State/USA', 'USA', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(259, '1630237', '1610612745', 'Anthony', 'Lamb', 'Lamb, Anthony', '33', 1, 'F', 6, 6, 1.98, 227, 103, '1998-01-20', '2020', 1, 'Vermont', 'Vermont/USA', 'USA', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(140, '1630238', '1610612738', 'Malik', 'Fitts', 'Fitts, Malik', '8', 1, 'F', 6, 5, 1.96, 230, 104.3, '1997-07-04', '2020', 1, 'St. Mary\'s College', 'St. Mary\'s College/USA', 'USA', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(266, '1630240', '1610612765', 'Saben', 'Lee', 'Lee, Saben', '38', 1, 'G', 6, 2, 1.88, 183, 83, '1999-06-23', '2020', 1, 'Vanderbilt', 'Vanderbilt/USA', 'USA', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(380, '1630243', '1610612745', 'Trevelin', 'Queen', 'Queen, Trevelin', '21', 1, 'G', 6, 6, 1.98, 190, 86.2, '1997-02-25', '2021', 0, 'New Mexico State', 'New Mexico State/USA', 'USA', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(125, '1630245', '1610612741', 'Ayo', 'Dosunmu', 'Dosunmu, Ayo', '12', 1, 'G', 6, 4, 1.93, 200, 90.7, '2000-01-17', '2021', 0, 'Illinois', 'Illinois/USA', 'USA', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(255, '1630249', '1610612760', 'Vit', 'Krejci', 'Krejci, Vit', '27', 1, 'G', 6, 8, 2.03, 195, 88.5, '2000-06-19', '2021', 0, 'Zaragoza', 'Zaragoza/Czech Republic', 'Czech Republic', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(416, '1630250', '1610612741', 'Marko', 'Simonovic', 'Simonovic, Marko', '19', 1, 'C', 6, 11, 2.11, 220, 99.8, '1999-10-15', '2021', 0, 'Mega Basket', 'Mega Basket/Montenegro', 'Montenegro', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(433, '1630256', '1610612745', 'Jae\'Sean', 'Tate', 'Tate, Jae\'Sean', '8', 1, 'F', 6, 4, 1.93, 230, 104.3, '1995-10-28', '2020', 1, 'Ohio State', 'Ohio State/USA', 'USA', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(159, '1630264', '1610612764', 'Anthony', 'Gill', 'Gill, Anthony', '16', 1, 'F', 6, 7, 2.01, 230, 104.3, '1992-10-17', '2020', 1, 'Virginia', 'Virginia/USA', 'USA', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(83, '1630267', '1610612743', 'Facundo', 'Campazzo', 'Campazzo, Facundo', '7', 1, 'G', 5, 10, 1.78, 195, 88.5, '1991-03-23', '2020', 1, 'Murcia', 'Murcia/Argentina', 'Argentina', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(423, '1630270', '1610612762', 'Xavier', 'Sneed', 'Sneed, Xavier', '19', 1, 'F', 6, 5, 1.96, 215, 97.5, '1997-12-21', '2021', 0, 'Kansas State', 'Kansas State/USA', 'USA', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(439, '1630271', '1610612738', 'Brodric', 'Thomas', 'Thomas, Brodric', '97', 1, 'G', 6, 5, 1.96, 185, 83.9, '1997-01-28', '2020', 1, 'Truman State', 'Truman State/USA', 'USA', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(550, '1630286', '0', 'Trevon', 'Scott', NULL, '15', 0, '', NULL, NULL, NULL, NULL, NULL, '1996-11-25', '2021', NULL, 'Cincinnati', 'Cincinnati/USA', 'USA', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(247, '1630296', '1610612765', 'Braxton', 'Key', 'Key, Braxton', '17', 1, 'F', 6, 8, 2.03, 225, 102.1, '1997-02-14', '2021', 0, 'Virginia', 'Virginia/USA', 'USA', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(486, '1630314', '1610612757', 'Brandon', 'Williams', 'Williams, Brandon', '8', 1, 'G', 6, 2, 1.88, 190, 86.2, '1999-11-22', '2021', 0, 'Arizona', 'Arizona/USA', 'USA', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(475, '1630322', '1610612760', 'Lindy', 'Waters III', 'Waters III, Lindy', '12', 1, 'F', 6, 6, 1.98, 215, 97.5, '1997-07-28', '2021', 0, 'Oklahoma State', 'Oklahoma State/USA', 'USA', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(402, '1630346', '1610612738', 'Matt', 'Ryan', 'Ryan, Matt', '', 1, 'F', 6, 7, 2.01, 215, 97.5, '1997-04-17', '2021', 0, 'Tennessee-Chattanooga', 'Tennessee-Chattanooga/USA', 'USA', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(551, '1630466', '0', 'Gabriel', 'Deck', NULL, '6', 0, '', NULL, NULL, NULL, NULL, NULL, '1995-02-08', '2020', NULL, '                                   ', 'Real Madrid/Argentina', 'Argentina', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(461, '1630492', '1610612749', 'Luca', 'Vildoza', 'Vildoza, Luca', '6', 1, 'G', 6, 3, 1.9, 190, 86.2, '1995-08-11', '', 0, 'Baskonia', 'Baskonia/Argentina', 'Argentina', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(231, '1630525', '1610612761', 'David', 'Johnson', 'Johnson, David', '13', 1, 'G', 6, 4, 1.93, 203, 92.1, '2001-02-26', '2021', 0, 'Louisville', 'Louisville/USA', 'USA', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(394, '1630526', '1610612760', 'Jeremiah', 'Robinson-Earl', 'Robinson-Earl, Jeremiah', '50', 1, 'F', 6, 8, 2.03, 242, 109.8, '2000-11-03', '2021', 0, 'Villanova', 'Villanova/USA', 'USA', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(54, '1630527', '1610612746', 'Brandon', 'Boston Jr.', 'Boston Jr., Brandon', '4', 1, 'G', 6, 6, 1.98, 188, 85.3, '2001-11-28', '2021', 0, 'Kentucky', 'Kentucky/USA', 'USA', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(94, '1630528', '1610612745', 'Josh', 'Christopher', 'Christopher, Josh', '9', 1, 'G', 6, 3, 1.9, 215, 97.5, '2001-12-08', '2021', 0, 'Arizona State', 'Arizona State/USA', 'USA', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(238, '1630529', '1610612740', 'Herbert', 'Jones', 'Jones, Herbert', '5', 1, 'F', 6, 7, 2.01, 206, 93.4, '1998-10-06', '2021', 0, 'Alabama', 'Alabama/USA', 'USA', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(328, '1630530', '1610612740', 'Trey', 'Murphy III', 'Murphy III, Trey', '25', 1, 'F', 6, 8, 2.03, 206, 93.4, '2000-06-18', '2021', 0, 'Virginia', 'Virginia/USA', 'USA', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(425, '1630531', '1610612755', 'Jaden', 'Springer', 'Springer, Jaden', '11', 1, 'G', 6, 4, 1.93, 202, 91.6, '2002-09-25', '2021', 0, 'Tennessee', 'Tennessee/USA', 'USA', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(465, '1630532', '1610612753', 'Franz', 'Wagner', 'Wagner, Franz', '22', 1, 'F', 6, 10, 2.08, 220, 99.8, '2001-08-27', '2021', 0, 'Michigan', 'Michigan/Germany', 'Germany', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(491, '1630533', '1610612763', 'Ziaire', 'Williams', 'Williams, Ziaire', '8', 1, 'F', 6, 9, 2.06, 185, 83.9, '2001-09-12', '2021', 0, 'Stanford', 'Stanford/USA', 'USA', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(70, '1630535', '1610612757', 'Greg', 'Brown III', 'Brown III, Greg', '4', 1, 'F', 6, 7, 2.01, 206, 93.4, '2001-09-01', '2021', 0, 'Texas-Austin', 'Texas-Austin/USA', 'USA', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(105, '1630536', '1610612737', 'Sharife', 'Cooper', 'Cooper, Sharife', '2', 1, 'G', 6, 1, 1.85, 176, 79.8, '2001-06-11', '2021', 0, 'Auburn', 'Auburn/USA', 'USA', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(128, '1630537', '1610612754', 'Chris', 'Duarte', 'Duarte, Chris', '3', 1, 'G', 6, 5, 1.96, 190, 86.2, '1997-06-13', '2021', 0, 'Oregon', 'Oregon/Dominican Republic', 'Dominican Republic', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(215, '1630538', '1610612743', 'Bones', 'Hyland', 'Hyland, Bones', '3', 1, 'G', 6, 2, 1.88, 169, 76.7, '2000-09-14', '2021', 0, 'Virginia Commonwealth', 'Virginia Commonwealth/USA', 'USA', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(239, '1630539', '1610612766', 'Kai', 'Jones', 'Jones, Kai', '23', 1, 'C-F', 6, 10, 2.08, 221, 100.2, '2001-01-19', '2021', 0, 'Texas-Austin', 'Texas-Austin/Bahamas', 'Bahamas', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(298, '1630540', '1610612752', 'Miles', 'McBride', 'McBride, Miles', '2', 1, 'G', 6, 1, 1.85, 195, 88.5, '2000-09-08', '2021', 0, 'West Virginia', 'West Virginia/USA', 'USA', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(320, '1630541', '1610612744', 'Moses', 'Moody', 'Moody, Moses', '4', 1, 'G', 6, 5, 1.96, 211, 95.7, '2002-05-31', '2021', 0, 'Arkansas', 'Arkansas/USA', 'USA', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(223, '1630543', '1610612754', 'Isaiah', 'Jackson', 'Jackson, Isaiah', '23', 1, 'F', 6, 10, 2.08, 205, 93, '2002-01-10', '2021', 0, 'Kentucky', 'Kentucky/USA', 'USA', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(287, '1630544', '1610612760', 'Tre', 'Mann', 'Mann, Tre', '23', 1, 'G', 6, 3, 1.9, 178, 80.7, '2001-02-03', '2021', 0, 'Florida', 'Florida/USA', 'USA', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(56, '1630547', '1610612766', 'James', 'Bouknight', 'Bouknight, James', '5', 1, 'G', 6, 4, 1.93, 190, 86.2, '2000-09-18', '2021', 0, 'Connecticut', 'Connecticut/USA', 'USA', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(413, '1630549', '1610612751', 'Day\'Ron', 'Sharpe', 'Sharpe, Day\'Ron', '20', 1, 'F', 6, 9, 2.06, 265, 120.2, '2001-11-06', '2021', 0, 'North Carolina', 'North Carolina/USA', 'USA', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(445, '1630550', '1610612766', 'JT', 'Thor', 'Thor, JT', '21', 1, 'F', 6, 9, 2.06, 203, 92.1, '2002-08-26', '2021', 0, 'Auburn', 'Auburn/USA', 'USA', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(91, '1630551', '1610612761', 'Justin', 'Champagnie', 'Champagnie, Justin', '11', 1, 'G-F', 6, 6, 1.98, 206, 93.4, '2001-06-29', '2021', 0, 'Pittsburgh', 'Pittsburgh/USA', 'USA', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(232, '1630552', '1610612737', 'Jalen', 'Johnson', 'Johnson, Jalen', '1', 1, 'F', 6, 8, 2.03, 219, 99.3, '2001-12-18', '2021', 0, 'Duke', 'Duke/USA', 'USA', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(234, '1630553', '1610612757', 'Keon', 'Johnson', 'Johnson, Keon', '6', 1, 'G', 6, 4, 1.93, 185, 83.9, '2002-03-10', '2021', 0, 'Tennessee', 'Tennessee/USA', 'USA', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(376, '1630554', '1610612746', 'Jason', 'Preston', 'Preston, Jason', '17', 1, 'G', 6, 3, 1.9, 181, 82.1, '1999-08-10', '', 0, 'Ohio', 'Ohio/USA', 'USA', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(133, '1630556', '1610612751', 'Kessler', 'Edwards', 'Edwards, Kessler', '14', 1, 'F', 6, 7, 2.01, 203, 92.1, '2000-08-09', '2021', 0, 'Pepperdine', 'Pepperdine/USA', 'USA', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(248, '1630557', '1610612764', 'Corey', 'Kispert', 'Kispert, Corey', '24', 1, 'F', 6, 6, 1.98, 224, 101.6, '1999-03-03', '2021', 0, 'Gonzaga', 'Gonzaga/USA', 'USA', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(315, '1630558', '1610612758', 'Davion', 'Mitchell', 'Mitchell, Davion', '15', 1, 'G', 6, 0, 1.83, 202, 91.6, '1998-09-05', '2021', 0, 'Baylor', 'Baylor/USA', 'USA', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(384, '1630559', '1610612747', 'Austin', 'Reaves', 'Reaves, Austin', '15', 1, 'G', 6, 5, 1.96, 197, 89.4, '1998-05-29', '2021', 0, 'Oklahoma', 'Oklahoma/USA', 'USA', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(440, '1630560', '1610612751', 'Cam', 'Thomas', 'Thomas, Cam', '24', 1, 'G', 6, 3, 1.9, 210, 95.3, '2001-10-13', '2021', 0, 'Louisiana State', 'Louisiana State/Japan', 'Japan', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(129, '1630561', '1610612751', 'David', 'Duke Jr.', 'Duke Jr., David', '6', 1, 'G', 6, 4, 1.93, 204, 92.5, '1999-10-13', '2021', 0, 'Providence', 'Providence/USA', 'USA', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(377, '1630563', '1610612759', 'Joshua', 'Primo', 'Primo, Joshua', '11', 1, 'G', 6, 4, 1.93, 189, 85.7, '2002-12-24', '2021', 0, 'Alabama', 'Alabama/Canada', 'Canada', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(29, '1630567', '1610612761', 'Scottie', 'Barnes', 'Barnes, Scottie', '4', 1, 'F', 6, 7, 2.01, 225, 102.1, '2001-08-01', '2021', 0, 'Florida State', 'Florida State/USA', 'USA', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(153, '1630568', '1610612765', 'Luka', 'Garza', 'Garza, Luka', '55', 1, 'C', 6, 10, 2.08, 243, 110.2, '1998-12-27', '2021', 0, 'Iowa', 'Iowa/USA', 'USA', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(476, '1630570', '1610612757', 'Trendon', 'Watford', 'Watford, Trendon', '2', 1, 'F', 6, 8, 2.03, 237, 107.5, '2000-11-09', '2021', 0, 'Louisiana State', 'Louisiana State/USA', 'USA', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(285, '1630572', '1610612749', 'Sandro', 'Mamukelashvili', 'Mamukelashvili, Sandro', '54', 1, 'F-C', 6, 9, 2.06, 240, 108.9, '1999-05-23', '2021', 0, 'Seton Hall', 'Seton Hall/Georgia', 'Georgia', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(189, '1630573', '1610612738', 'Sam', 'Hauser', 'Hauser, Sam', '30', 1, 'F', 6, 7, 2.01, 217, 98.4, '1997-12-08', '2021', 0, 'Virginia', 'Virginia/USA', 'USA', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(270, '1630575', '1610612766', 'Scottie', 'Lewis', 'Lewis, Scottie', '16', 1, 'G', 6, 5, 1.96, 185, 83.9, '2000-03-12', '2021', 0, 'Florida', 'Florida/USA', 'USA', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(410, '1630578', '1610612745', 'Alperen', 'Sengun', 'Sengun, Alperen', '28', 1, 'C', 6, 10, 2.08, 243, 110.2, '2002-07-25', '2021', 0, 'Besiktas', 'Besiktas/Turkey', 'Turkey', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(418, '1630579', '1610612752', 'Jericho', 'Sims', 'Sims, Jericho', '45', 1, 'C', 6, 9, 2.06, 250, 113.4, '1998-10-20', '2021', 0, 'Texas-Austin', 'Texas-Austin/USA', 'USA', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(482, '1630580', '1610612759', 'Joe', 'Wieskamp', 'Wieskamp, Joe', '15', 1, 'G-F', 6, 6, 1.98, 205, 93, '1999-08-23', '2021', 0, 'Iowa', 'Iowa/USA', 'USA', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(157, '1630581', '1610612760', 'Josh', 'Giddey', 'Giddey, Josh', '3', 1, 'G', 6, 8, 2.03, 205, 93, '2002-10-10', '2021', 0, 'NBA Global Academy', 'NBA Global Academy/Australia', 'Australia', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(366, '1630582', '1610612763', 'Yves', 'Pons', 'Pons, Yves', '5', 1, 'F', 6, 5, 1.96, 206, 93.4, '1999-05-07', '2021', 0, 'Tennessee', 'Tennessee/France', 'France', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(5, '1630583', '1610612763', 'Santi', 'Aldama', 'Aldama, Santi', '7', 1, 'F-C', 6, 11, 2.11, 215, 97.5, '2001-01-10', '2021', 0, 'Loyola-Maryland', 'Loyola-Maryland/Spain', 'Spain', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(152, '1630586', '1610612745', 'Usman', 'Garuba', 'Garuba, Usman', '16', 1, 'F', 6, 8, 2.03, 229, 103.9, '2002-03-09', '2021', 0, 'Real Madrid', 'Real Madrid/Spain', 'Spain', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(274, '1630587', '1610612765', 'Isaiah', 'Livers', 'Livers, Isaiah', '12', 1, 'F', 6, 6, 1.98, 232, 105.2, '1998-07-28', '2021', 0, 'Michigan', 'Michigan/USA', 'USA', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(501, '1630589', '1610612742', 'Moses', 'Wright', 'Wright, Moses', '5', 1, 'F', 6, 8, 2.03, 226, 102.5, '1998-12-23', '2021', 0, 'Georgia Tech', 'Georgia Tech/USA', 'USA', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(432, '1630591', '1610612753', 'Jalen', 'Suggs', 'Suggs, Jalen', '4', 1, 'G', 6, 5, 1.96, 205, 93, '2001-06-03', '2021', 0, 'Gonzaga', 'Gonzaga/USA', 'USA', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(502, '1630593', '1610612750', 'McKinley', 'Wright IV', 'Wright IV, McKinley', '25', 1, 'G', 5, 11, 1.8, 192, 87.1, '1998-10-25', '2021', 0, 'Colorado', 'Colorado/USA', 'USA', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(111, '1630595', '1610612765', 'Cade', 'Cunningham', 'Cunningham, Cade', '2', 1, 'G', 6, 6, 1.98, 220, 99.8, '2001-09-25', '2021', 0, 'Oklahoma State', 'Oklahoma State/USA', 'USA', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(317, '1630596', '1610612739', 'Evan', 'Mobley', 'Mobley, Evan', '4', 1, 'C', 6, 11, 2.11, 215, 97.5, '2001-06-18', '2021', 0, 'Southern California', 'Southern California/USA', 'USA', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(429, '1630597', '1610612759', 'DJ', 'Stewart', 'Stewart, DJ', '18', 1, 'G', 6, 5, 1.96, 205, 93, '1999-07-28', '', 0, 'Mississippi State', 'Mississippi State/USA', 'USA', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(483, '1630598', '1610612760', 'Aaron', 'Wiggins', 'Wiggins, Aaron', '21', 1, 'G', 6, 4, 1.93, 190, 86.2, '1999-01-02', '2021', 0, 'Maryland', 'Maryland/USA', 'USA', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(72, '1630602', '1610612737', 'Chaundee', 'Brown Jr.', 'Brown Jr., Chaundee', '38', 1, 'F', 6, 5, 1.96, 215, 97.5, '1998-12-04', '2021', 0, 'Michigan', 'Michigan/USA', 'USA', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(419, '1630606', '1610612748', 'Javonte', 'Smart', 'Smart, Javonte', '15', 1, 'G', 6, 4, 1.93, 205, 93, '1999-06-03', '2021', 0, 'Louisiana State', 'Louisiana State/USA', 'USA', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(334, '1630612', '1610612739', 'RJ', 'Nembhard Jr.', 'Nembhard Jr., RJ', '5', 1, 'G', 6, 4, 1.93, 200, 90.7, '1999-03-22', '2021', 0, 'TCU', 'TCU/USA', 'USA', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(473, '1630613', '1610612754', 'Duane', 'Washington Jr.', 'Washington Jr., Duane', '4', 1, 'G', 6, 3, 1.9, 197, 89.4, '2000-03-24', '2021', 0, 'Ohio State', 'Ohio State/Germany', 'Germany', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(213, '1630624', '1610612752', 'Feron', 'Hunt', 'Hunt, Feron', '11', 1, 'F', 6, 8, 2.03, 195, 88.5, '1999-07-05', '2021', 0, 'Southern Methodist', 'Southern Methodist/USA', 'USA', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(27, '1630625', '1610612761', 'Dalano', 'Banton', 'Banton, Dalano', '45', 1, 'F', 6, 7, 2.01, 204, 92.5, '1999-11-07', '2021', 0, 'Nebraska', 'Nebraska/Canada', 'Canada', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(10, '1630631', '1610612740', 'Jose', 'Alvarado', 'Alvarado, Jose', '15', 1, 'G', 6, 0, 1.83, 179, 81.2, '1998-04-12', '2021', 0, 'Georgia Tech', 'Georgia Tech/USA', 'USA', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(299, '1630644', '1610612747', 'Mac', 'McClung', 'McClung, Mac', '00', 1, 'G', 6, 2, 1.88, 185, 83.9, '1999-01-06', '2021', 0, 'Texas Tech', 'Texas Tech/USA', 'USA', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(406, '1630648', '1610612764', 'Jordan', 'Schakel', 'Schakel, Jordan', '20', 1, 'G', 6, 6, 1.98, 200, 90.7, '1998-06-13', '2021', 0, 'San Diego State', 'San Diego State/USA', 'USA', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(435, '1630678', '1610612754', 'Terry', 'Taylor', 'Taylor, Terry', '32', 1, 'F', 6, 5, 1.96, 230, 104.3, '1999-09-23', '2021', 0, 'Austin Peay', 'Austin Peay/USA', 'USA', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(467, '1630688', '1610612756', 'Ish', 'Wainright', 'Wainright, Ish', '12', 1, 'F', 6, 5, 1.96, 250, 113.4, '1994-09-12', '2021', 0, 'Baylor', 'Baylor/USA', 'USA', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(361, '1630691', '1610612765', 'Jamorko', 'Pickett', 'Pickett, Jamorko', '24', 1, 'F', 6, 9, 2.06, 206, 93.4, '1997-12-24', '2021', 0, 'Georgetown', 'Georgetown/USA', 'USA', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(552, '1630692', '0', 'Jordan', 'Goodwin', NULL, '7', 0, '', NULL, NULL, NULL, NULL, NULL, '1998-10-23', '2021', NULL, 'St. Louis', 'St. Louis/USA', 'USA', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(553, '1630693', '0', 'Jaime', 'Echenique', NULL, '12', 0, '', NULL, NULL, NULL, NULL, NULL, '1997-04-27', '2021', NULL, 'Wichita State', 'Wichita State/Colombia', 'Colombia', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(554, '1630695', '0', 'Micah', 'Potter', NULL, '19', 0, '', NULL, NULL, NULL, NULL, NULL, '1998-04-06', '2021', NULL, 'Wisconsin', 'Wisconsin/USA', 'USA', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(555, '1630696', '0', 'Dru', 'Smith', NULL, '12', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', '', '', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(556, '1630698', '0', 'Kevin', 'Pangos', NULL, '6', 0, '', NULL, NULL, NULL, NULL, NULL, '1993-01-26', '2021', NULL, 'Gonzaga', 'Gonzaga/Canada', 'Canada', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(557, '1630699', '0', 'MarJon', 'Beauchamp', NULL, '14', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', '', '', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(558, '1630700', '0', 'Dyson', 'Daniels', NULL, '3', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', '', '', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(559, '1630702', '0', 'Jaden', 'Hardy', NULL, '1', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', '', '', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(560, '1630703', '0', 'Scoot', 'Henderson', NULL, '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', '', '', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(561, '1630707', '0', 'Malik', 'Ellison', NULL, '28', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', '', '', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(562, '1630758', '0', 'Aleem', 'Ford', NULL, '11', 0, '', NULL, NULL, NULL, NULL, NULL, '1997-12-22', '2021', NULL, 'Wisconsin', 'Wisconsin/USA', 'USA', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(563, '1630777', '0', 'Jeremiah', 'Tilmon', NULL, '23', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', '', '', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(564, '1630787', '0', 'Cameron', 'McGriff', NULL, '8', 0, '', NULL, NULL, NULL, NULL, NULL, '1997-09-30', '2021', NULL, 'Oklahoma State', 'Oklahoma State/USA', 'USA', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(565, '1630791', '0', 'James', 'Banks III', NULL, '24', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', '', '', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(199, '1630792', '1610612741', 'Malcolm', 'Hill', 'Hill, Malcolm', '14', 1, 'F', 6, 6, 1.98, 220, 99.8, '1995-10-26', '2021', 0, 'Illinois', 'Illinois/USA', 'USA', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(566, '1630793', '0', 'Giorgi', 'Bezhanishvili', NULL, '17', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', '', '', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(567, '1630801', '0', 'Ibi', 'Watson-Boye', NULL, '16', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', '', '', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(568, '1630835', '0', 'L.J.', 'Figueroa', NULL, '25', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', '', '', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(569, '1630837', '0', 'Marcus', 'Foster', NULL, '00', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', '', '', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(570, '1630844', '0', 'Troy', 'Baxter Jr.', NULL, '99', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', '', '', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(571, '1630846', '0', 'Olivier', 'Sarr', NULL, '30', 0, '', NULL, NULL, NULL, NULL, NULL, '1999-02-20', '2021', NULL, 'Kentucky', 'Kentucky/France', 'France', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(281, '1630994', '1610612756', 'Gabriel', 'Lundberg', 'Lundberg, Gabriel', '19', 1, 'G', 6, 4, 1.93, 203, 92.1, '1994-12-04', '2021', 0, '                                   ', '', 'Denmark', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(6, '200746', '1610612751', 'LaMarcus', 'Aldridge', 'Aldridge, LaMarcus', '21', 1, 'C-F', 6, 11, 2.11, 250, 113.4, '1985-07-19', '2006', 15, 'Texas-Austin', 'Texas-Austin/USA', 'USA', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(154, '200752', '1610612762', 'Rudy', 'Gay', 'Gay, Rudy', '8', 1, 'F-G', 6, 8, 2.03, 250, 113.4, '1986-08-17', '2006', 15, 'Connecticut', 'Connecticut/USA', 'USA', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(396, '200765', '1610612739', 'Rajon', 'Rondo', 'Rondo, Rajon', '1', 1, 'G', 6, 1, 1.85, 180, 81.6, '1986-02-22', '2006', 15, 'Kentucky', 'Kentucky/USA', 'USA', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(280, '200768', '1610612748', 'Kyle', 'Lowry', 'Lowry, Kyle', '7', 1, 'G', 6, 0, 1.83, 196, 88.9, '1986-03-25', '2006', 15, 'Villanova', 'Villanova/USA', 'USA', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(454, '200782', '1610612748', 'P.J.', 'Tucker', 'Tucker, P.J.', '17', 1, 'F', 6, 5, 1.96, 245, 111.1, '1985-05-05', '2006', 10, 'Texas-Austin', 'Texas-Austin/USA', 'USA', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(313, '200794', '1610612755', 'Paul', 'Millsap', 'Millsap, Paul', '8', 1, 'F', 6, 7, 2.01, 257, 116.6, '1985-02-10', '2006', 15, 'Louisiana Tech', 'Louisiana Tech/USA', 'USA', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(130, '201142', '1610612751', 'Kevin', 'Durant', 'Durant, Kevin', '7', 1, 'F', 6, 10, 2.08, 240, 108.9, '1988-09-29', '2007', 13, 'Texas-Austin', 'Texas-Austin/USA', 'USA', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(206, '201143', '1610612738', 'Al', 'Horford', 'Horford, Al', '42', 1, 'C-F', 6, 9, 2.06, 240, 108.9, '1986-06-03', '2007', 14, 'Florida', 'Florida/Dominican Republic', 'Dominican Republic', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(102, '201144', '1610612762', 'Mike', 'Conley', 'Conley, Mike', '11', 1, 'G', 6, 1, 1.85, 175, 79.4, '1987-10-11', '2007', 14, 'Ohio State', 'Ohio State/USA', 'USA', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(171, '201145', '1610612743', 'Jeff', 'Green', 'Green, Jeff', '32', 1, 'F', 6, 8, 2.03, 235, 106.6, '1986-08-28', '2007', 13, 'Georgetown', 'Georgetown/USA', 'USA', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(504, '201152', '1610612761', 'Thaddeus', 'Young', 'Young, Thaddeus', '21', 1, 'F', 6, 8, 2.03, 235, 106.6, '1988-06-21', '2007', 14, 'Georgia Tech', 'Georgia Tech/USA', 'USA', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(572, '201229', '0', 'Anthony', 'Tolliver', NULL, '43', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', '', '', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(397, '201565', '1610612752', 'Derrick', 'Rose', 'Rose, Derrick', '4', 1, 'G', 6, 2, 1.88, 200, 90.7, '1988-10-04', '2008', 12, 'Memphis', 'Memphis/USA', 'USA', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(478, '201566', '1610612747', 'Russell', 'Westbrook', 'Westbrook, Russell', '0', 1, 'G', 6, 3, 1.9, 200, 90.7, '1988-11-12', '2008', 13, 'UCLA', 'UCLA/USA', 'USA', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(279, '201567', '1610612739', 'Kevin', 'Love', 'Love, Kevin', '0', 1, 'F-C', 6, 8, 2.03, 251, 113.9, '1988-09-07', '2008', 13, 'UCLA', 'UCLA/USA', 'USA', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(150, '201568', '1610612737', 'Danilo', 'Gallinari', 'Gallinari, Danilo', '8', 1, 'F', 6, 10, 2.08, 236, 107, '1988-08-08', '2008', 12, 'Olimpia Milano', 'Olimpia Milano/Italy', 'Italy', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(163, '201569', '1610612745', 'Eric', 'Gordon', 'Gordon, Eric', '10', 1, 'G', 6, 3, 1.9, 215, 97.5, '1988-12-25', '2008', 13, 'Indiana', 'Indiana/USA', 'USA', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(18, '201571', '1610612747', 'D.J.', 'Augustin', 'Augustin, D.J.', '4', 1, 'G', 5, 11, 1.8, 183, 83, '1987-11-10', '2008', 13, 'Texas-Austin', 'Texas-Austin/USA', 'USA', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(276, '201572', '1610612749', 'Brook', 'Lopez', 'Lopez, Brook', '11', 1, 'C', 7, 0, 2.13, 282, 127.9, '1988-04-01', '2008', 13, 'Stanford', 'Stanford/USA', 'USA', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(277, '201577', '1610612753', 'Robin', 'Lopez', 'Lopez, Robin', '33', 1, 'C', 7, 0, 2.13, 281, 127.5, '1988-04-01', '2008', 13, 'Stanford', 'Stanford/USA', 'USA', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(305, '201580', '1610612756', 'JaVale', 'McGee', 'McGee, JaVale', '00', 1, 'C-F', 7, 0, 2.13, 270, 122.5, '1988-01-19', '2008', 13, 'Nevada-Reno', 'Nevada-Reno/USA', 'USA', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(216, '201586', '1610612749', 'Serge', 'Ibaka', 'Ibaka, Serge', '25', 1, 'F', 6, 10, 2.08, 235, 106.6, '1989-09-18', '2009', 12, 'Ricoh Manresa', 'Ricoh Manresa/Republic of the Congo', 'Republic of the Congo', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(34, '201587', '1610612746', 'Nicolas', 'Batum', 'Batum, Nicolas', '33', 1, 'G-F', 6, 8, 2.03, 230, 104.3, '1988-12-14', '2008', 13, 'Le Mans', 'Le Mans/France', 'France', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(198, '201588', '1610612749', 'George', 'Hill', 'Hill, George', '3', 1, 'G', 6, 4, 1.93, 188, 85.3, '1986-05-04', '2008', 13, 'Indiana-Purdue Indianapolis', 'Indiana-Purdue Indianapolis/USA', 'USA', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(573, '201596', '0', 'Mario', 'Chalmers', NULL, '15', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', '', '', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(244, '201599', '1610612755', 'DeAndre', 'Jordan', 'Jordan, DeAndre', '9', 1, 'C', 6, 11, 2.11, 265, 120.2, '1988-07-21', '2008', 13, 'Texas A&M', 'Texas A&M/USA', 'USA', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(126, '201609', '1610612751', 'Goran', 'Dragic', 'Dragic, Goran', '9', 1, 'G', 6, 3, 1.9, 190, 86.2, '1986-05-06', '2008', 13, 'Union Olimpija', 'Union Olimpija/Slovenia', 'Slovenia', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(173, '201933', '1610612751', 'Blake', 'Griffin', 'Griffin, Blake', '2', 1, 'F', 6, 9, 2.06, 250, 113.4, '1989-03-16', '2010', 11, 'Oklahoma', 'Oklahoma/USA', 'USA', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(179, '201935', '1610612755', 'James', 'Harden', 'Harden, James', '1', 1, 'G', 6, 5, 1.96, 220, 99.8, '1989-08-26', '2009', 12, 'Arizona State', 'Arizona State/USA', 'USA', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(400, '201937', '1610612754', 'Ricky', 'Rubio', 'Rubio, Ricky', '99', 1, 'G', 6, 2, 1.88, 190, 86.2, '1990-10-21', '2011', 10, 'FC Barcelona', 'FC Barcelona/Spain', 'Spain', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(113, '201939', '1610612744', 'Stephen', 'Curry', 'Curry, Stephen', '30', 1, 'G', 6, 2, 1.88, 185, 83.9, '1988-03-14', '2009', 12, 'Davidson', 'Davidson/USA', 'USA', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(118, '201942', '1610612741', 'DeMar', 'DeRozan', 'DeRozan, DeMar', '11', 1, 'G-F', 6, 6, 1.98, 220, 99.8, '1989-08-07', '2009', 12, 'Southern California', 'Southern California/USA', 'USA', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(574, '201949', '0', 'James', 'Johnson', NULL, '16', 0, '', NULL, NULL, NULL, NULL, NULL, '1987-02-20', '2009', NULL, 'Wake Forest', 'Wake Forest/USA', 'USA', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(202, '201950', '1610612749', 'Jrue', 'Holiday', 'Holiday, Jrue', '21', 1, 'G', 6, 3, 1.9, 205, 93, '1990-06-12', '2009', 12, 'UCLA', 'UCLA/USA', 'USA', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(575, '201954', '0', 'Darren', 'Collison', NULL, '21', 0, '', NULL, NULL, NULL, NULL, NULL, '1987-08-23', '2009', NULL, 'UCLA', 'UCLA/USA', 'USA', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(156, '201959', '1610612752', 'Taj', 'Gibson', 'Gibson, Taj', '67', 1, 'F', 6, 9, 2.06, 232, 105.2, '1985-06-24', '2009', 12, 'Southern California', 'Southern California/USA', 'USA', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(135, '201961', '1610612747', 'Wayne', 'Ellington', 'Ellington, Wayne', '2', 1, 'G', 6, 4, 1.93, 207, 93.9, '1987-11-29', '2009', 12, 'North Carolina', 'North Carolina/USA', 'USA', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(40, '201976', '1610612750', 'Patrick', 'Beverley', 'Beverley, Patrick', '22', 1, 'G', 6, 1, 1.85, 180, 81.6, '1988-07-12', '2012', 9, 'Arkansas', 'Arkansas/USA', 'USA', '2022-04-13 11:13:24', '2022-04-13 11:13:24');
INSERT INTO `players` (`id`, `personId`, `teamId`, `firstName`, `lastName`, `temporaryDisplayName`, `jersey`, `isActive`, `pos`, `heightFeet`, `heightInches`, `heightMeters`, `weightPounds`, `weightKilograms`, `dateOfBirthUTC`, `nbaDebutYear`, `yearsPro`, `collegeName`, `lastAffiliation`, `country`, `created_at`, `updated_at`) VALUES
(166, '201980', '1610612755', 'Danny', 'Green', 'Green, Danny', '14', 1, 'G', 6, 6, 1.98, 215, 97.5, '1987-06-22', '2009', 12, 'North Carolina', 'North Carolina/USA', 'USA', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(312, '201988', '1610612751', 'Patty', 'Mills', 'Mills, Patty', '8', 1, 'G', 6, 0, 1.83, 180, 81.6, '1988-08-11', '2009', 12, 'St.Mary\'s College of California', 'St.Mary\'s College of California/Australia', 'Australia', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(436, '202066', '1610612740', 'Garrett', 'Temple', 'Temple, Garrett', '41', 1, 'G-F', 6, 5, 1.96, 195, 88.5, '1986-05-08', '2009', 11, 'Louisiana State', 'Louisiana State/USA', 'USA', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(295, '202083', '1610612749', 'Wesley', 'Matthews', 'Matthews, Wesley', '23', 1, 'G', 6, 4, 1.93, 220, 99.8, '1986-10-14', '2009', 12, 'Marquette', 'Marquette/USA', 'USA', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(470, '202322', '1610612745', 'John', 'Wall', 'Wall, John', '1', 1, 'G', 6, 3, 1.9, 210, 95.3, '1990-09-06', '2010', 10, 'Kentucky', 'Kentucky/USA', 'USA', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(137, '202324', '1610612760', 'Derrick', 'Favors', 'Favors, Derrick', '15', 1, 'F', 6, 9, 2.06, 265, 120.2, '1991-07-15', '2010', 11, 'Georgia Tech', 'Georgia Tech/USA', 'USA', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(106, '202326', '1610612743', 'DeMarcus', 'Cousins', 'Cousins, DeMarcus', '4', 1, 'C', 6, 10, 2.08, 270, 122.5, '1990-08-13', '2010', 10, 'Kentucky', 'Kentucky/USA', 'USA', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(319, '202328', '1610612750', 'Greg', 'Monroe', 'Monroe, Greg', '15', 1, 'F-C', 6, 10, 2.08, 250, 113.4, '1990-06-04', '2010', 9, 'Georgetown', 'Georgetown/USA', 'USA', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(576, '202329', '0', 'Al-Farouq', 'Aminu', NULL, '72', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', '', '', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(192, '202330', '1610612766', 'Gordon', 'Hayward', 'Hayward, Gordon', '20', 1, 'F', 6, 7, 2.01, 225, 102.1, '1990-03-23', '2010', 11, 'Butler', 'Butler/USA', 'USA', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(155, '202331', '1610612746', 'Paul', 'George', 'George, Paul', '13', 1, 'F', 6, 8, 2.03, 220, 99.8, '1990-05-02', '2010', 11, 'Fresno State', 'Fresno State/USA', 'USA', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(115, '202334', '1610612739', 'Ed', 'Davis', 'Davis, Ed', '21', 1, 'C-F', 6, 9, 2.06, 218, 98.9, '1989-06-05', '2010', 11, 'North Carolina', 'North Carolina/USA', 'USA', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(577, '202335', '0', 'Patrick', 'Patterson', NULL, '54', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', '', '', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(46, '202339', '1610612757', 'Eric', 'Bledsoe', 'Bledsoe, Eric', '5', 1, 'G', 6, 1, 1.85, 214, 97.1, '1989-12-09', '2010', 11, 'Kentucky', 'Kentucky/USA', 'USA', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(57, '202340', '1610612747', 'Avery', 'Bradley', 'Bradley, Avery', '20', 1, 'G', 6, 3, 1.9, 180, 81.6, '1990-11-26', '2010', 11, 'Texas-Austin', 'Texas-Austin/USA', 'USA', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(481, '202355', '1610612762', 'Hassan', 'Whiteside', 'Whiteside, Hassan', '21', 1, 'C', 7, 0, 2.13, 265, 120.2, '1989-06-13', '2010', 9, 'Marshall', 'Marshall/USA', 'USA', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(45, '202357', '1610612744', 'Nemanja', 'Bjelica', 'Bjelica, Nemanja', '8', 1, 'F', 6, 9, 2.06, 234, 106.1, '1988-05-09', '2015', 6, 'Fenerbahce', 'Fenerbahce/Serbia', 'Serbia', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(427, '202362', '1610612754', 'Lance', 'Stephenson', 'Stephenson, Lance', '6', 1, 'F', 6, 5, 1.96, 210, 95.3, '1990-09-05', '2010', 9, 'Cincinnati', 'Cincinnati/USA', 'USA', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(421, '202397', '1610612764', 'Ish', 'Smith', 'Smith, Ish', '4', 1, 'G', 6, 0, 1.83, 175, 79.4, '1988-07-05', '2010', 11, 'Wake Forest', 'Wake Forest/USA', 'USA', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(220, '202681', '1610612751', 'Kyrie', 'Irving', 'Irving, Kyrie', '11', 1, 'G', 6, 2, 1.88, 195, 88.5, '1992-03-23', '2011', 10, 'Duke', 'Duke/Australia', 'Australia', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(578, '202683', '0', 'Enes', 'Freedom', NULL, '13', 0, '', NULL, NULL, NULL, NULL, NULL, '1992-05-20', '2011', NULL, '                                   ', 'Fenerbahce/Turkey', 'Turkey', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(444, '202684', '1610612741', 'Tristan', 'Thompson', 'Thompson, Tristan', '3', 1, 'C-F', 6, 9, 2.06, 254, 115.2, '1991-03-13', '2011', 10, 'Texas-Austin', 'Texas-Austin/Canada', 'Canada', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(457, '202685', '1610612740', 'Jonas', 'Valanciunas', 'Valanciunas, Jonas', '17', 1, 'C', 6, 11, 2.11, 265, 120.2, '1992-05-06', '2012', 9, 'Lietuvos rytas Vilnius', 'Lietuvos rytas Vilnius/Lithuania', 'Lithuania', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(44, '202687', '1610612756', 'Bismack', 'Biyombo', 'Biyombo, Bismack', '18', 1, 'C', 6, 8, 2.03, 255, 115.7, '1992-08-28', '2011', 10, 'Baloncesto Fuenlabrada', 'Baloncesto Fuenlabrada/DRC', 'DRC', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(468, '202689', '1610612752', 'Kemba', 'Walker', 'Walker, Kemba', '8', 1, 'G', 6, 0, 1.83, 184, 83.5, '1990-05-08', '2011', 10, 'Connecticut', 'Connecticut/USA', 'USA', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(443, '202691', '1610612744', 'Klay', 'Thompson', 'Thompson, Klay', '11', 1, 'G', 6, 6, 1.98, 220, 99.8, '1990-02-08', '2011', 8, 'Washington State', 'Washington State/USA', 'USA', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(78, '202692', '1610612752', 'Alec', 'Burks', 'Burks, Alec', '18', 1, 'G', 6, 6, 1.98, 214, 97.1, '1991-07-20', '2011', 10, 'Colorado', 'Colorado/USA', 'USA', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(324, '202693', '1610612748', 'Markieff', 'Morris', 'Morris, Markieff', '8', 1, 'F', 6, 9, 2.06, 245, 111.1, '1989-09-02', '2011', 10, 'Kansas', 'Kansas/USA', 'USA', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(326, '202694', '1610612746', 'Marcus', 'Morris Sr.', 'Morris Sr., Marcus', '8', 1, 'F', 6, 8, 2.03, 218, 98.9, '1989-09-02', '2011', 10, 'Kansas', 'Kansas/USA', 'USA', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(268, '202695', '1610612746', 'Kawhi', 'Leonard', 'Leonard, Kawhi', '2', 1, 'F', 6, 7, 2.01, 225, 102.1, '1991-06-29', '2011', 10, 'San Diego State', 'San Diego State/USA', 'USA', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(463, '202696', '1610612741', 'Nikola', 'Vucevic', 'Vucevic, Nikola', '9', 1, 'C', 6, 10, 2.08, 260, 117.9, '1990-10-24', '2011', 10, 'Southern California', 'Southern California/Montenegro', 'Montenegro', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(185, '202699', '1610612755', 'Tobias', 'Harris', 'Harris, Tobias', '12', 1, 'F', 6, 7, 2.01, 226, 102.5, '1992-07-15', '2011', 10, 'Tennessee', 'Tennessee/USA', 'USA', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(225, '202704', '1610612746', 'Reggie', 'Jackson', 'Jackson, Reggie', '1', 1, 'G', 6, 2, 1.88, 208, 94.3, '1990-04-16', '2011', 10, 'Boston College', 'Boston College/USA', 'USA', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(245, '202709', '1610612765', 'Cory', 'Joseph', 'Joseph, Cory', '18', 1, 'G', 6, 3, 1.9, 200, 90.7, '1991-08-20', '2011', 10, 'Texas-Austin', 'Texas-Austin/Canada', 'Canada', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(80, '202710', '1610612748', 'Jimmy', 'Butler', 'Butler, Jimmy', '22', 1, 'F', 6, 7, 2.01, 230, 104.3, '1989-09-14', '2011', 10, 'Marquette', 'Marquette/USA', 'USA', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(49, '202711', '1610612762', 'Bojan', 'Bogdanovic', 'Bogdanovic, Bojan', '44', 1, 'F', 6, 7, 2.01, 226, 102.5, '1989-04-18', '2014', 7, 'Fenerbahce', 'Fenerbahce/Croatia', 'Croatia', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(39, '202722', '1610612742', 'Davis', 'Bertans', 'Bertans, Davis', '44', 1, 'F', 6, 10, 2.08, 225, 102.1, '1992-11-12', '2016', 5, 'Baskonia', 'Baskonia/Latvia', 'Latvia', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(441, '202738', '1610612766', 'Isaiah', 'Thomas', 'Thomas, Isaiah', '4', 1, 'G', 5, 9, 1.75, 185, 83.9, '1989-02-07', '2011', 10, 'Washington', 'Washington/USA', 'USA', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(579, '202954', '0', 'Brad', 'Wanamaker', NULL, '22', 0, '', NULL, NULL, NULL, NULL, NULL, '1989-07-25', '2018', NULL, 'Pittsburgh', 'Pittsburgh/USA', 'USA', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(114, '203076', '1610612747', 'Anthony', 'Davis', 'Davis, Anthony', '3', 1, 'F-C', 6, 10, 2.08, 253, 114.8, '1993-03-11', '2012', 9, 'Kentucky', 'Kentucky/USA', 'USA', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(37, '203078', '1610612764', 'Bradley', 'Beal', 'Beal, Bradley', '3', 1, 'G', 6, 4, 1.93, 207, 93.9, '1993-06-28', '2012', 9, 'Florida', 'Florida/USA', 'USA', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(272, '203081', '1610612757', 'Damian', 'Lillard', 'Lillard, Damian', '0', 1, 'G', 6, 2, 1.88, 195, 88.5, '1990-07-15', '2012', 9, 'Weber State', 'Weber State/USA', 'USA', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(398, '203082', '1610612753', 'Terrence', 'Ross', 'Ross, Terrence', '31', 1, 'G-F', 6, 6, 1.98, 206, 93.4, '1991-02-05', '2012', 9, 'Washington', 'Washington/USA', 'USA', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(127, '203083', '1610612751', 'Andre', 'Drummond', 'Drummond, Andre', '0', 1, 'C', 6, 10, 2.08, 279, 126.6, '1993-08-10', '2012', 9, 'Connecticut', 'Connecticut/USA', 'USA', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(28, '203084', '1610612758', 'Harrison', 'Barnes', 'Barnes, Harrison', '40', 1, 'F', 6, 8, 2.03, 225, 102.1, '1992-05-30', '2012', 9, 'North Carolina', 'North Carolina/USA', 'USA', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(391, '203085', '1610612743', 'Austin', 'Rivers', 'Rivers, Austin', '25', 1, 'G', 6, 4, 1.93, 200, 90.7, '1992-08-01', '2012', 9, 'Duke', 'Duke/USA', 'USA', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(260, '203087', '1610612758', 'Jeremy', 'Lamb', 'Lamb, Jeremy', '26', 1, 'G-F', 6, 5, 1.96, 180, 81.6, '1992-05-30', '2012', 9, 'Connecticut', 'Connecticut/USA', 'USA', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(180, '203090', '1610612758', 'Maurice', 'Harkless', 'Harkless, Maurice', '8', 1, 'F-G', 6, 7, 2.01, 220, 99.8, '1993-05-11', '2012', 9, 'St. John\'s', 'St. John\'s/USA', 'USA', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(144, '203095', '1610612752', 'Evan', 'Fournier', 'Fournier, Evan', '13', 1, 'G-F', 6, 6, 1.98, 205, 93, '1992-10-29', '2012', 9, 'Poitiers Basket 86', 'Poitiers Basket 86/France', 'France', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(580, '203099', '0', 'Jared', 'Cunningham', NULL, '14', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', '', '', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(405, '203107', '1610612764', 'Tomas', 'Satoransky', 'Satoransky, Tomas', '31', 1, 'G', 6, 7, 2.01, 210, 95.3, '1991-10-30', '2016', 5, 'FC Barcelona', 'FC Barcelona/Czech Republic', 'Czech Republic', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(109, '203109', '1610612756', 'Jae', 'Crowder', 'Crowder, Jae', '99', 1, 'F', 6, 6, 1.98, 235, 106.6, '1990-07-06', '2012', 9, 'Marquette', 'Marquette/USA', 'USA', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(167, '203110', '1610612744', 'Draymond', 'Green', 'Green, Draymond', '23', 1, 'F', 6, 6, 1.98, 230, 104.3, '1990-03-04', '2012', 9, 'Michigan State', 'Michigan State/USA', 'USA', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(311, '203114', '1610612749', 'Khris', 'Middleton', 'Middleton, Khris', '22', 1, 'F', 6, 7, 2.01, 222, 100.7, '1991-08-12', '2012', 9, 'Texas A&M', 'Texas A&M/USA', 'USA', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(31, '203115', '1610612743', 'Will', 'Barton', 'Barton, Will', '5', 1, 'G', 6, 5, 1.96, 181, 82.1, '1991-01-06', '2012', 9, 'Memphis', 'Memphis/USA', 'USA', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(35, '203145', '1610612747', 'Kent', 'Bazemore', 'Bazemore, Kent', '9', 1, 'G-F', 6, 4, 1.93, 195, 88.5, '1989-07-01', '2012', 9, 'Old Dominion', 'Old Dominion/USA', 'USA', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(203, '203200', '1610612758', 'Justin', 'Holiday', 'Holiday, Justin', '9', 1, 'F-G', 6, 6, 1.98, 180, 81.6, '1989-04-05', '2012', 8, 'Washington', 'Washington/USA', 'USA', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(169, '203210', '1610612743', 'JaMychal', 'Green', 'Green, JaMychal', '0', 1, 'F-C', 6, 8, 2.03, 227, 103, '1990-06-21', '2014', 7, 'Alabama', 'Alabama/USA', 'USA', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(340, '203457', '1610612752', 'Nerlens', 'Noel', 'Noel, Nerlens', '3', 1, 'C-F', 6, 11, 2.11, 220, 99.8, '1994-04-10', '2014', 7, 'Kentucky', 'Kentucky/USA', 'USA', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(267, '203458', '1610612758', 'Alex', 'Len', 'Len, Alex', '25', 1, 'C', 7, 0, 2.13, 250, 113.4, '1993-06-16', '2013', 8, 'Maryland', 'Maryland/Ukraine', 'Ukraine', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(308, '203463', '1610612757', 'Ben', 'McLemore', 'McLemore, Ben', '23', 1, 'G', 6, 3, 1.9, 195, 88.5, '1993-02-11', '2013', 8, 'Kansas', 'Kansas/USA', 'USA', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(300, '203468', '1610612740', 'CJ', 'McCollum', 'McCollum, CJ', '3', 1, 'G', 6, 3, 1.9, 190, 86.2, '1991-09-19', '2013', 8, 'Lehigh', 'Lehigh/USA', 'USA', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(581, '203469', '0', 'Cody', 'Zeller', NULL, '40', 0, '', NULL, NULL, NULL, NULL, NULL, '1992-10-05', '2013', NULL, 'Indiana', 'Indiana/USA', 'USA', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(408, '203471', '1610612745', 'Dennis', 'Schroder', 'Schroder, Dennis', '17', 1, 'G', 6, 1, 1.85, 172, 78, '1993-09-15', '2013', 8, 'Braunschweig', 'Braunschweig/Germany', 'Germany', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(117, '203473', '1610612748', 'Dewayne', 'Dedmon', 'Dedmon, Dewayne', '21', 1, 'C', 7, 0, 2.13, 245, 111.1, '1989-08-12', '2013', 8, 'Southern California', 'Southern California/USA', 'USA', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(120, '203476', '1610612737', 'Gorgui', 'Dieng', 'Dieng, Gorgui', '10', 1, 'C', 6, 10, 2.08, 248, 112.5, '1990-01-18', '2013', 8, 'Louisville', 'Louisville/Senegal', 'Senegal', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(353, '203482', '1610612765', 'Kelly', 'Olynyk', 'Olynyk, Kelly', '13', 1, 'F-C', 6, 11, 2.11, 240, 108.9, '1991-04-19', '2013', 8, 'Gonzaga', 'Gonzaga/Canada', 'Canada', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(82, '203484', '1610612764', 'Kentavious', 'Caldwell-Pope', 'Caldwell-Pope, Kentavious', '1', 1, 'G', 6, 5, 1.96, 204, 92.5, '1993-02-18', '2013', 8, 'Georgia', 'Georgia/USA', 'USA', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(363, '203486', '1610612766', 'Mason', 'Plumlee', 'Plumlee, Mason', '24', 1, 'F-C', 6, 11, 2.11, 254, 115.2, '1990-03-05', '2013', 8, 'Duke', 'Duke/USA', 'USA', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(582, '203487', '0', 'Michael', 'Carter-Williams', NULL, '7', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', '', '', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(331, '203488', '1610612760', 'Mike', 'Muscala', 'Muscala, Mike', '33', 1, 'F-C', 6, 10, 2.08, 240, 108.9, '1991-07-01', '2013', 8, 'Bucknell', 'Bucknell/USA', 'USA', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(370, '203490', '1610612744', 'Otto', 'Porter Jr.', 'Porter Jr., Otto', '32', 1, 'F', 6, 8, 2.03, 198, 89.8, '1993-06-03', '2013', 8, 'Georgetown', 'Georgetown/USA', 'USA', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(76, '203493', '1610612742', 'Reggie', 'Bullock', 'Bullock, Reggie', '25', 1, 'G-F', 6, 6, 1.98, 205, 93, '1991-03-16', '2013', 8, 'North Carolina', 'North Carolina/USA', 'USA', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(107, '203496', '1610612746', 'Robert', 'Covington', 'Covington, Robert', '23', 1, 'F', 6, 7, 2.01, 209, 94.8, '1990-12-14', '2013', 8, 'Tennessee State', 'Tennessee State/USA', 'USA', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(160, '203497', '1610612762', 'Rudy', 'Gobert', 'Gobert, Rudy', '27', 1, 'C', 7, 1, 2.16, 258, 117, '1992-06-26', '2013', 8, 'Cholet', 'Cholet/France', 'France', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(3, '203500', '1610612763', 'Steven', 'Adams', 'Adams, Steven', '4', 1, 'C', 6, 11, 2.11, 265, 120.2, '1993-07-20', '2013', 8, 'Pittsburgh', 'Pittsburgh/New Zealand', 'New Zealand', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(178, '203501', '1610612742', 'Tim', 'Hardaway Jr.', 'Hardaway Jr., Tim', '11', 1, 'G-F', 6, 5, 1.96, 205, 93, '1992-03-16', '2013', 8, 'Michigan', 'Michigan/USA', 'USA', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(424, '203503', '1610612740', 'Tony', 'Snell', 'Snell, Tony', '21', 1, 'G', 6, 6, 1.98, 213, 96.6, '1991-11-10', '2013', 8, 'New Mexico', 'New Mexico/USA', 'USA', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(77, '203504', '1610612742', 'Trey', 'Burke', 'Burke, Trey', '3', 1, 'G', 6, 0, 1.83, 185, 83.9, '1992-11-12', '2013', 8, 'Michigan', 'Michigan/USA', 'USA', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(352, '203506', '1610612748', 'Victor', 'Oladipo', 'Oladipo, Victor', '4', 1, 'G', 6, 4, 1.93, 213, 96.6, '1992-05-04', '2013', 8, 'Indiana', 'Indiana/USA', 'USA', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(12, '203507', '1610612749', 'Giannis', 'Antetokounmpo', 'Antetokounmpo, Giannis', '34', 1, 'F', 6, 11, 2.11, 242, 109.8, '1994-12-06', '2013', 8, 'Filathlitikos', 'Filathlitikos/Greece', 'Greece', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(583, '203516', '0', 'James', 'Ennis III', NULL, '10', 0, '', NULL, NULL, NULL, NULL, NULL, '1990-07-01', '2014', NULL, 'Cal State-Long Beach', 'California State-Long Beach/USA', 'USA', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(584, '203524', '0', 'Solomon', 'Hill', NULL, '99', 0, '', NULL, NULL, NULL, NULL, NULL, '1991-03-18', '2013', NULL, 'Arizona', 'Arizona/USA', 'USA', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(336, '203526', '1610612764', 'Raul', 'Neto', 'Neto, Raul', '19', 1, 'G', 6, 2, 1.88, 180, 81.6, '1992-05-19', '2015', 6, 'Murcia', 'Murcia/Brazil', 'Brazil', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(112, '203552', '1610612751', 'Seth', 'Curry', 'Curry, Seth', '30', 1, 'G', 6, 2, 1.88, 185, 83.9, '1990-08-23', '2013', 7, 'Duke', 'Duke/USA', 'USA', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(306, '203585', '1610612765', 'Rodney', 'McGruder', 'McGruder, Rodney', '17', 1, 'G', 6, 4, 1.93, 205, 93, '1991-07-29', '2016', 5, 'Kansas State', 'Kansas State/USA', 'USA', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(13, '203648', '1610612749', 'Thanasis', 'Antetokounmpo', 'Antetokounmpo, Thanasis', '43', 1, 'F', 6, 6, 1.98, 219, 99.3, '1992-07-18', '2015', 3, 'Panathinaikos', 'Panathinaikos/Greece', 'Greece', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(585, '203658', '0', 'Norvel', 'Pelle', NULL, '5', 0, '', NULL, NULL, NULL, NULL, NULL, '1993-02-03', '2019', NULL, 'Iona', 'Iona/USA', 'USA', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(586, '203816', '0', 'Scotty', 'Hopson', NULL, '55', 0, '', NULL, NULL, NULL, NULL, NULL, '1989-08-08', '2013', NULL, 'Tennessee', 'Tennessee/USA', 'USA', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(263, '203897', '1610612741', 'Zach', 'LaVine', 'LaVine, Zach', '8', 1, 'G-F', 6, 5, 1.96, 200, 90.7, '1995-03-10', '2014', 7, 'UCLA', 'UCLA/USA', 'USA', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(359, '203901', '1610612756', 'Elfrid', 'Payton', 'Payton, Elfrid', '2', 1, 'G', 6, 3, 1.9, 195, 88.5, '1994-02-22', '2014', 7, 'Louisana-Lafayette', 'Louisana-Lafayette/USA', 'USA', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(97, '203903', '1610612762', 'Jordan', 'Clarkson', 'Clarkson, Jordan', '00', 1, 'G', 6, 4, 1.93, 194, 88, '1992-06-07', '2014', 7, 'Missouri', 'Missouri/USA', 'USA', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(183, '203914', '1610612753', 'Gary', 'Harris', 'Harris, Gary', '14', 1, 'G', 6, 4, 1.93, 210, 95.3, '1994-09-14', '2014', 7, 'Michigan State', 'Michigan State/USA', 'USA', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(121, '203915', '1610612742', 'Spencer', 'Dinwiddie', 'Dinwiddie, Spencer', '26', 1, 'G', 6, 6, 1.98, 215, 97.5, '1993-04-06', '2014', 7, 'Colorado', 'Colorado/USA', 'USA', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(426, '203917', '1610612738', 'Nik', 'Stauskas', 'Stauskas, Nik', '13', 1, 'G', 6, 6, 1.98, 207, 93.9, '1993-10-07', '2014', 5, 'Michigan', 'Michigan/Canada', 'Canada', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(205, '203918', '1610612746', 'Rodney', 'Hood', 'Hood, Rodney', '22', 1, 'G-F', 6, 8, 2.03, 208, 94.3, '1992-10-20', '2014', 7, 'Duke', 'Duke/USA', 'USA', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(42, '203920', '1610612761', 'Khem', 'Birch', 'Birch, Khem', '24', 1, 'C', 6, 9, 2.06, 233, 105.7, '1992-09-28', '2017', 4, 'UNLV', 'UNLV/Canada', 'Canada', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(165, '203924', '1610612765', 'Jerami', 'Grant', 'Grant, Jerami', '9', 1, 'F', 6, 8, 2.03, 210, 95.3, '1994-03-12', '2014', 7, 'Syracuse', 'Syracuse/USA', 'USA', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(184, '203925', '1610612751', 'Joe', 'Harris', 'Harris, Joe', '12', 1, 'G-F', 6, 6, 1.98, 220, 99.8, '1991-09-06', '2014', 7, 'Virginia', 'Virginia/USA', 'USA', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(304, '203926', '1610612759', 'Doug', 'McDermott', 'McDermott, Doug', '17', 1, 'F', 6, 7, 2.01, 225, 102.1, '1992-01-03', '2014', 7, 'Creighton', 'Creighton/USA', 'USA', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(162, '203932', '1610612743', 'Aaron', 'Gordon', 'Gordon, Aaron', '50', 1, 'F', 6, 8, 2.03, 235, 106.6, '1995-09-16', '2014', 7, 'Arizona', 'Arizona/USA', 'USA', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(471, '203933', '1610612754', 'T.J.', 'Warren', 'Warren, T.J.', '1', 1, 'F', 6, 8, 2.03, 220, 99.8, '1993-09-05', '2014', 7, 'North Carolina State', 'North Carolina State/USA', 'USA', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(420, '203935', '1610612738', 'Marcus', 'Smart', 'Smart, Marcus', '36', 1, 'G', 6, 4, 1.93, 220, 99.8, '1994-03-06', '2014', 7, 'Oklahoma State', 'Oklahoma State/USA', 'USA', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(11, '203937', '1610612763', 'Kyle', 'Anderson', 'Anderson, Kyle', '1', 1, 'F-G', 6, 9, 2.06, 230, 104.3, '1993-09-20', '2014', 7, 'UCLA', 'UCLA/USA', 'USA', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(373, '203939', '1610612742', 'Dwight', 'Powell', 'Powell, Dwight', '7', 1, 'F-C', 6, 10, 2.08, 240, 108.9, '1991-07-20', '2014', 7, 'Stanford', 'Stanford/Canada', 'Canada', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(383, '203944', '1610612752', 'Julius', 'Randle', 'Randle, Julius', '30', 1, 'F-C', 6, 8, 2.03, 250, 113.4, '1994-11-29', '2014', 7, 'Kentucky', 'Kentucky/USA', 'USA', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(587, '203948', '0', 'Johnny', 'O\'Bryant III', NULL, '97', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', '', '', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(484, '203952', '1610612744', 'Andrew', 'Wiggins', 'Wiggins, Andrew', '22', 1, 'F', 6, 7, 2.01, 197, 89.4, '1995-02-23', '2014', 7, 'Kansas', 'Kansas/Canada', 'Canada', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(588, '203953', '0', 'Jabari', 'Parker', NULL, '20', 0, '', NULL, NULL, NULL, NULL, NULL, '1995-03-15', '2014', NULL, 'Duke', 'Duke/USA', 'USA', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(136, '203954', '1610612755', 'Joel', 'Embiid', 'Embiid, Joel', '21', 1, 'C-F', 7, 0, 2.13, 280, 127, '1994-03-16', '2016', 5, 'Kansas', 'Kansas/Cameroon', 'Cameroon', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(589, '203957', '0', 'Dante', 'Exum', NULL, '5', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', '', '', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(404, '203967', '1610612756', 'Dario', 'Saric', 'Saric, Dario', '20', 1, 'F-C', 6, 10, 2.08, 225, 102.1, '1994-04-08', '2016', 5, 'Anadolu Efes', 'Anadolu Efes/Croatia', 'Croatia', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(86, '203991', '1610612737', 'Clint', 'Capela', 'Capela, Clint', '15', 1, 'C', 6, 10, 2.08, 256, 116.1, '1994-05-18', '2014', 7, 'Elan Chalon', 'Elan Chalon/Switzerland', 'Switzerland', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(48, '203992', '1610612737', 'Bogdan', 'Bogdanovic', 'Bogdanovic, Bogdan', '13', 1, 'G', 6, 6, 1.98, 225, 102.1, '1992-08-18', '2017', 4, 'Fenerbahce', 'Fenerbahce/Serbia', 'Serbia', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(344, '203994', '1610612757', 'Jusuf', 'Nurkic', 'Nurkic, Jusuf', '27', 1, 'C', 6, 11, 2.11, 290, 131.5, '1994-08-23', '2014', 7, 'Cedevita', 'Cedevita/Bosnia and Herzegovina', 'Bosnia and Herzegovina', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(236, '203999', '1610612743', 'Nikola', 'Jokic', 'Jokic, Nikola', '15', 1, 'C', 6, 11, 2.11, 284, 128.8, '1995-02-19', '2015', 6, 'Mega Basket', 'Mega Basket/Serbia', 'Serbia', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(372, '204001', '1610612764', 'Kristaps', 'Porzingis', 'Porzingis, Kristaps', '6', 1, 'F-C', 7, 3, 2.21, 240, 108.9, '1995-08-02', '2015', 5, 'Cajasol Sevilla', 'Cajasol Sevilla/Latvia', 'Latvia', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(590, '204020', '0', 'Tyler', 'Johnson', NULL, '28', 0, '', NULL, NULL, NULL, NULL, NULL, '1992-05-07', '2014', NULL, 'Fresno State', 'Fresno State/USA', 'USA', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(591, '204025', '0', 'Tim', 'Frazier', NULL, '12', 0, '', NULL, NULL, NULL, NULL, NULL, '1990-11-01', '2014', NULL, 'Penn State', 'Penn State/USA', 'USA', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(218, '204060', '1610612757', 'Joe', 'Ingles', 'Ingles, Joe', '00', 1, 'F-G', 6, 8, 2.03, 220, 99.8, '1987-10-02', '2014', 7, 'Maccabi Tel Aviv', 'Maccabi Tel Aviv/Australia', 'Australia', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(301, '204456', '1610612754', 'T.J.', 'McConnell', 'McConnell, T.J.', '9', 1, 'G', 6, 1, 1.85, 190, 86.2, '1992-03-25', '2015', 6, 'Arizona', 'Arizona/USA', 'USA', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(592, '2207', '0', 'Joe', 'Johnson', NULL, '55', 0, '', NULL, NULL, NULL, NULL, NULL, '1981-06-29', '2001', NULL, 'Arkansas', 'Arkansas/USA', 'USA', '2022-04-13 11:13:25', '2022-04-13 11:13:25'),
(227, '2544', '1610612747', 'LeBron', 'James', 'James, LeBron', '6', 1, 'F', 6, 9, 2.06, 250, 113.4, '1984-12-30', '2003', 18, 'St. Vincent-St. Mary HS (OH)', 'St. Vincent-St. Mary HS (OH)/USA', 'USA', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(14, '2546', '1610612747', 'Carmelo', 'Anthony', 'Anthony, Carmelo', '7', 1, 'F', 6, 7, 2.01, 238, 108, '1984-05-29', '2003', 18, 'Syracuse', 'Syracuse/USA', 'USA', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(188, '2617', '1610612748', 'Udonis', 'Haslem', 'Haslem, Udonis', '40', 1, 'F', 6, 8, 2.03, 235, 106.6, '1980-06-09', '2003', 18, 'Florida', 'Florida/USA', 'USA', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(209, '2730', '1610612747', 'Dwight', 'Howard', 'Howard, Dwight', '39', 1, 'C-F', 6, 10, 2.08, 265, 120.2, '1985-12-08', '2004', 17, 'SW Atlanta Christian Academy (GA)', 'SW Atlanta Christian Academy (GA)/USA', 'USA', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(217, '2738', '1610612744', 'Andre', 'Iguodala', 'Iguodala, Andre', '9', 1, 'G-F', 6, 6, 1.98, 215, 97.5, '1984-01-28', '2004', 17, 'Arizona', 'Arizona/USA', 'USA', '2022-04-13 11:13:24', '2022-04-13 11:13:24'),
(1, '2772', '0', 'Trevor', 'Ariza', NULL, '1', 0, '', NULL, NULL, NULL, NULL, NULL, '1985-06-30', '2004', NULL, 'UCLA', 'UCLA/USA', 'USA', '2022-04-13 11:12:38', '2022-04-13 11:12:38');

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
('Jt9D19aFhuCXcjwRoDA37ZnTXSEEkfxHDpEblTCP', NULL, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/15.4 Safari/605.1.15', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiU1VkdjhpclY2YXpka0RLa09tcjNMVXFsb0RYRkhQZ0tZdDBZNnRyQiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6MzoidXJsIjthOjE6e3M6ODoiaW50ZW5kZWQiO3M6MzI6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9tZS9wcm9maWxlIjt9fQ==', 1649876956);

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
  `id` int(10) UNSIGNED NOT NULL,
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
(0, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL),
(1, '1610612737', 'Atlanta Hawks', 'Hawks', 'hawks', 'Atlanta', 'Atlanta', 'ATL', 'Atlanta', 'East', 'Southeast', 0, 1, '2022-03-08 13:44:41', '2022-03-08 13:44:41'),
(2, '1610612738', 'Boston Celtics', 'Celtics', 'celtics', 'Boston', 'Boston', 'BOS', 'Boston', 'East', 'Atlantic', 0, 1, '2022-03-08 13:44:41', '2022-03-08 13:44:41'),
(6, '1610612739', 'Cleveland Cavaliers', 'Cavaliers', 'cavaliers', 'Cleveland', 'Cleveland', 'CLE', 'Cleveland', 'East', 'Central', 0, 1, '2022-03-08 13:44:41', '2022-03-08 13:44:41'),
(19, '1610612740', 'New Orleans Pelicans', 'Pelicans', 'pelicans', 'New Orleans', 'New Orleans', 'NOP', 'New Orleans', 'West', 'Southwest', 0, 1, '2022-03-08 13:44:42', '2022-03-08 13:44:42'),
(5, '1610612741', 'Chicago Bulls', 'Bulls', 'bulls', 'Chicago', 'Chicago', 'CHI', 'Chicago', 'East', 'Central', 0, 1, '2022-03-08 13:44:41', '2022-03-08 13:44:41'),
(7, '1610612742', 'Dallas Mavericks', 'Mavericks', 'mavericks', 'Dallas', 'Dallas', 'DAL', 'Dallas', 'West', 'Southwest', 0, 1, '2022-03-08 13:44:41', '2022-03-08 13:44:41'),
(8, '1610612743', 'Denver Nuggets', 'Nuggets', 'nuggets', 'Denver', 'Denver', 'DEN', 'Denver', 'West', 'Northwest', 0, 1, '2022-03-08 13:44:42', '2022-03-08 13:44:42'),
(10, '1610612744', 'Golden State Warriors', 'Warriors', 'warriors', 'Golden State', 'Golden State', 'GSW', 'Golden State', 'West', 'Pacific', 0, 1, '2022-03-08 13:44:42', '2022-03-08 13:44:42'),
(11, '1610612745', 'Houston Rockets', 'Rockets', 'rockets', 'Houston', 'Houston', 'HOU', 'Houston', 'West', 'Southwest', 0, 1, '2022-03-08 13:44:42', '2022-03-08 13:44:42'),
(13, '1610612746', 'LA Clippers', 'Clippers', 'clippers', 'LA Clippers', 'LA Clippers', 'LAC', 'LA', 'West', 'Pacific', 0, 1, '2022-03-08 13:44:42', '2022-03-08 13:44:42'),
(14, '1610612747', 'Los Angeles Lakers', 'Lakers', 'lakers', 'Los Angeles Lakers', 'L.A. Lakers', 'LAL', 'Los Angeles', 'West', 'Pacific', 0, 1, '2022-03-08 13:44:42', '2022-03-08 13:44:42'),
(16, '1610612748', 'Miami Heat', 'Heat', 'heat', 'Miami', 'Miami', 'MIA', 'Miami', 'East', 'Southeast', 0, 1, '2022-03-08 13:44:42', '2022-03-08 13:44:42'),
(17, '1610612749', 'Milwaukee Bucks', 'Bucks', 'bucks', 'Milwaukee', 'Milwaukee', 'MIL', 'Milwaukee', 'East', 'Central', 0, 1, '2022-03-08 13:44:42', '2022-03-08 13:44:42'),
(18, '1610612750', 'Minnesota Timberwolves', 'Timberwolves', 'timberwolves', 'Minnesota', 'Minnesota', 'MIN', 'Minnesota', 'West', 'Northwest', 0, 1, '2022-03-08 13:44:42', '2022-03-08 13:44:42'),
(3, '1610612751', 'Brooklyn Nets', 'Nets', 'nets', 'Brooklyn', 'Brooklyn', 'BKN', 'Brooklyn', 'East', 'Atlantic', 0, 1, '2022-03-08 13:44:41', '2022-03-08 13:44:41'),
(20, '1610612752', 'New York Knicks', 'Knicks', 'knicks', 'New York', 'New York', 'NYK', 'New York', 'East', 'Atlantic', 0, 1, '2022-03-08 13:44:42', '2022-03-08 13:44:42'),
(22, '1610612753', 'Orlando Magic', 'Magic', 'magic', 'Orlando', 'Orlando', 'ORL', 'Orlando', 'East', 'Southeast', 0, 1, '2022-03-08 13:44:42', '2022-03-08 13:44:42'),
(12, '1610612754', 'Indiana Pacers', 'Pacers', 'pacers', 'Indiana', 'Indiana', 'IND', 'Indiana', 'East', 'Central', 0, 1, '2022-03-08 13:44:42', '2022-03-08 13:44:42'),
(23, '1610612755', 'Philadelphia 76ers', '76ers', 'sixers', 'Philadelphia', 'Philadelphia', 'PHI', 'Philadelphia', 'East', 'Atlantic', 0, 1, '2022-03-08 13:44:42', '2022-03-08 13:44:42'),
(24, '1610612756', 'Phoenix Suns', 'Suns', 'suns', 'Phoenix', 'Phoenix', 'PHX', 'Phoenix', 'West', 'Pacific', 0, 1, '2022-03-08 13:44:42', '2022-03-08 13:44:42'),
(25, '1610612757', 'Portland Trail Blazers', 'Trail Blazers', 'blazers', 'Portland', 'Portland', 'POR', 'Portland', 'West', 'Northwest', 0, 1, '2022-03-08 13:44:42', '2022-03-08 13:44:42'),
(26, '1610612758', 'Sacramento Kings', 'Kings', 'kings', 'Sacramento', 'Sacramento', 'SAC', 'Sacramento', 'West', 'Pacific', 0, 1, '2022-03-08 13:44:42', '2022-03-08 13:44:42'),
(27, '1610612759', 'San Antonio Spurs', 'Spurs', 'spurs', 'San Antonio', 'San Antonio', 'SAS', 'San Antonio', 'West', 'Southwest', 0, 1, '2022-03-08 13:44:42', '2022-03-08 13:44:42'),
(21, '1610612760', 'Oklahoma City Thunder', 'Thunder', 'thunder', 'Oklahoma City', 'Oklahoma City', 'OKC', 'Oklahoma City', 'West', 'Northwest', 0, 1, '2022-03-08 13:44:42', '2022-03-08 13:44:42'),
(30, '1610612761', 'Toronto Raptors', 'Raptors', 'raptors', 'Toronto', 'Toronto', 'TOR', 'Toronto', 'East', 'Atlantic', 0, 1, '2022-03-08 13:44:42', '2022-03-08 13:44:42'),
(31, '1610612762', 'Utah Jazz', 'Jazz', 'jazz', 'Utah', 'Utah', 'UTA', 'Utah', 'West', 'Northwest', 0, 1, '2022-03-08 13:44:42', '2022-03-08 13:44:42'),
(15, '1610612763', 'Memphis Grizzlies', 'Grizzlies', 'grizzlies', 'Memphis', 'Memphis', 'MEM', 'Memphis', 'West', 'Southwest', 0, 1, '2022-03-08 13:44:42', '2022-03-08 13:44:42'),
(34, '1610612764', 'Washington Wizards', 'Wizards', 'wizards', 'Washington', 'Washington', 'WAS', 'Washington', 'East', 'Southeast', 0, 1, '2022-03-08 13:44:42', '2022-03-08 13:44:42'),
(9, '1610612765', 'Detroit Pistons', 'Pistons', 'pistons', 'Detroit', 'Detroit', 'DET', 'Detroit', 'East', 'Central', 0, 1, '2022-03-08 13:44:42', '2022-03-08 13:44:42'),
(4, '1610612766', 'Charlotte Hornets', 'Hornets', 'hornets', 'Charlotte', 'Charlotte', 'CHA', 'Charlotte', 'East', 'Southeast', 0, 1, '2022-03-08 13:44:41', '2022-03-08 13:44:41'),
(28, '1610616833', 'Team Team Durant', 'Team Durant', 'team_durant', 'Team', 'Team Durant', 'DRT', 'Team', 'East', 'East', 1, 0, '2022-03-08 13:44:42', '2022-03-08 13:44:42'),
(29, '1610616834', 'Team LeBron', 'Team LeBron', 'team_lebron', 'Team', 'Team LeBron', 'LBN', 'Team', 'West', 'West', 1, 0, '2022-03-08 13:44:42', '2022-03-08 13:44:42'),
(33, '1710612762', 'Utah White', 'Jazz', 'utah_white', 'Utah', 'Utah White', 'UTW', 'Utah', 'West', 'Northwest', 0, 0, '2022-03-08 13:44:42', '2022-03-08 13:44:42'),
(32, '1810612762', 'Utah Blue', 'Jazz', 'utah_blue', 'Utah', 'Utah Blue', 'UTB', 'Utah', 'West', 'Northwest', 0, 0, '2022-03-08 13:44:42', '2022-03-08 13:44:42');

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
(2, 'admin', 'admin@admin.com', NULL, '$2y$10$7nBgdnHwvTuZA41Po7i1huciD7GNWSI6wMvmMOhcGwWroFlg8WndW', NULL, '2022-03-07 15:36:03', '2022-03-07 15:36:03'),
(3, 'medini', 'medini@wielki.pl', NULL, '$2y$10$9xJx4yamJf83ntu5x.iqSOzdWwNWVGi25bLXK7tpf3X0Jt7N7ZIR6', NULL, '2022-04-12 11:43:04', '2022-04-12 11:43:04');

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
-- Indeksy dla tabeli `players`
--
ALTER TABLE `players`
  ADD PRIMARY KEY (`personId`),
  ADD KEY `players_teamid_foreign` (`teamId`);

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
  ADD PRIMARY KEY (`teamId`);

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

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
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `players`
--
ALTER TABLE `players`
  ADD CONSTRAINT `players_teamid_foreign` FOREIGN KEY (`teamId`) REFERENCES `teams` (`teamId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
