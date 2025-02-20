-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 20, 2025 at 01:19 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pixel_positions`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employers`
--

CREATE TABLE `employers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employers`
--

INSERT INTO `employers` (`id`, `user_id`, `name`, `logo`, `created_at`, `updated_at`) VALUES
(1, 2, 'Keeling, Cummerata and Ernser', 'https://via.placeholder.com/640x480.png/0033bb?text=aperiam', '2025-02-19 10:56:00', '2025-02-19 10:56:00'),
(2, 3, 'Hansen, Mitchell and O\'Reilly', 'https://via.placeholder.com/640x480.png/007711?text=nesciunt', '2025-02-19 10:56:00', '2025-02-19 10:56:00'),
(3, 4, 'Mante-Wehner', 'https://via.placeholder.com/640x480.png/00aadd?text=error', '2025-02-19 10:56:00', '2025-02-19 10:56:00'),
(4, 5, 'Marquardt, Fritsch and Olson', 'https://via.placeholder.com/640x480.png/00dd33?text=laborum', '2025-02-19 10:56:00', '2025-02-19 10:56:00'),
(5, 6, 'Kunze, Simonis and Renner', 'https://via.placeholder.com/640x480.png/0099dd?text=consectetur', '2025-02-19 10:56:00', '2025-02-19 10:56:00'),
(6, 7, 'Kub, Orn and Dare', 'https://via.placeholder.com/640x480.png/00aa77?text=neque', '2025-02-19 10:56:00', '2025-02-19 10:56:00'),
(7, 8, 'Ritchie, Berge and Feest', 'https://via.placeholder.com/640x480.png/004455?text=et', '2025-02-19 10:56:00', '2025-02-19 10:56:00'),
(8, 9, 'Friesen, King and Trantow', 'https://via.placeholder.com/640x480.png/008888?text=corrupti', '2025-02-19 10:56:00', '2025-02-19 10:56:00'),
(9, 10, 'King-Klein', 'https://via.placeholder.com/640x480.png/00bb66?text=praesentium', '2025-02-19 10:56:00', '2025-02-19 10:56:00'),
(10, 11, 'Harris-Koch', 'https://via.placeholder.com/640x480.png/00dd77?text=quia', '2025-02-19 10:56:00', '2025-02-19 10:56:00'),
(11, 12, 'Kshlerin-Toy', 'https://via.placeholder.com/640x480.png/0044aa?text=consectetur', '2025-02-19 10:56:00', '2025-02-19 10:56:00'),
(12, 13, 'Carter-Braun', 'https://via.placeholder.com/640x480.png/009999?text=voluptatibus', '2025-02-19 10:56:00', '2025-02-19 10:56:00'),
(13, 14, 'Walsh-McLaughlin', 'https://via.placeholder.com/640x480.png/008877?text=iste', '2025-02-19 10:56:00', '2025-02-19 10:56:00'),
(14, 15, 'Rath, Osinski and Veum', 'https://via.placeholder.com/640x480.png/002266?text=excepturi', '2025-02-19 10:56:00', '2025-02-19 10:56:00'),
(15, 16, 'DuBuque-Hackett', 'https://via.placeholder.com/640x480.png/00eecc?text=assumenda', '2025-02-19 10:56:00', '2025-02-19 10:56:00'),
(16, 17, 'Walsh-Prosacco', 'https://via.placeholder.com/640x480.png/003344?text=ipsam', '2025-02-19 10:56:00', '2025-02-19 10:56:00'),
(17, 18, 'Boehm-Gleason', 'https://via.placeholder.com/640x480.png/00ee88?text=laboriosam', '2025-02-19 10:56:00', '2025-02-19 10:56:00'),
(18, 19, 'Johnston-Emmerich', 'https://via.placeholder.com/640x480.png/00cc66?text=dolores', '2025-02-19 10:56:00', '2025-02-19 10:56:00'),
(19, 20, 'Mueller Ltd', 'https://via.placeholder.com/640x480.png/001188?text=voluptatem', '2025-02-19 10:56:00', '2025-02-19 10:56:00'),
(20, 21, 'Schaefer Ltd', 'https://via.placeholder.com/640x480.png/00ccff?text=sit', '2025-02-19 10:56:00', '2025-02-19 10:56:00'),
(21, 22, 'prosen', 'logos/rS3yWqaNBQ6xaq9XrUdosoGy0084Tn3O1NxHKSkJ.png', '2025-02-19 11:26:44', '2025-02-19 11:26:44');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employer_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `salary` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `schedule` varchar(255) NOT NULL DEFAULT 'Full Time',
  `url` varchar(255) NOT NULL,
  `featured` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `employer_id`, `title`, `salary`, `location`, `schedule`, `url`, `featured`, `created_at`, `updated_at`) VALUES
(1, 1, 'Clinical Laboratory Technician', '$150,000 USD', 'Remote', 'Full Time', 'https://www.lehner.biz/nisi-sed-earum-rerum-ratione', 0, '2025-02-19 10:56:00', '2025-02-19 10:56:00'),
(2, 2, 'Food Tobacco Roasting', '$150,000 USD', 'Remote', 'Part Time', 'http://www.koss.com/ut-architecto-temporibus-non-possimus.html', 1, '2025-02-19 10:56:00', '2025-02-19 10:56:00'),
(3, 3, 'Personal Care Worker', '$50,000 USD', 'Remote', 'Full Time', 'http://www.botsford.org/id-aliquam-et-cupiditate-quo-vel-quis-cupiditate', 0, '2025-02-19 10:56:00', '2025-02-19 10:56:00'),
(4, 4, 'Legal Support Worker', '$150,000 USD', 'Remote', 'Part Time', 'https://www.oreilly.net/et-officia-ex-eaque-voluptate-esse-tenetur-unde', 1, '2025-02-19 10:56:00', '2025-02-19 10:56:00'),
(5, 5, 'Electrical and Electronic Inspector and Tester', '$90,000 USD', 'Remote', 'Full Time', 'http://www.cruickshank.com/ut-voluptatem-in-architecto-non-exercitationem', 0, '2025-02-19 10:56:00', '2025-02-19 10:56:00'),
(6, 6, 'Hazardous Materials Removal Worker', '$90,000 USD', 'Remote', 'Part Time', 'http://roob.com/', 1, '2025-02-19 10:56:00', '2025-02-19 10:56:00'),
(7, 7, 'Insurance Policy Processing Clerk', '$90,000 USD', 'Remote', 'Full Time', 'http://haag.com/', 0, '2025-02-19 10:56:00', '2025-02-19 10:56:00'),
(8, 8, 'Engineering Technician', '$150,000 USD', 'Remote', 'Part Time', 'http://www.buckridge.com/provident-nulla-est-ut-modi-perspiciatis-quia', 1, '2025-02-19 10:56:00', '2025-02-19 10:56:00'),
(9, 9, 'Pile-Driver Operator', '$50,000 USD', 'Remote', 'Full Time', 'https://www.bode.info/impedit-et-voluptas-non-adipisci-a-soluta-laboriosam-est', 0, '2025-02-19 10:56:00', '2025-02-19 10:56:00'),
(10, 10, 'Physical Therapist Assistant', '$50,000 USD', 'Remote', 'Part Time', 'http://torp.info/et-voluptatem-asperiores-totam-rerum-nam-officia-praesentium', 1, '2025-02-19 10:56:00', '2025-02-19 10:56:00'),
(11, 11, 'Therapist', '$90,000 USD', 'Remote', 'Full Time', 'http://turcotte.com/', 0, '2025-02-19 10:56:00', '2025-02-19 10:56:00'),
(12, 12, 'Physician', '$50,000 USD', 'Remote', 'Part Time', 'http://www.simonis.com/rerum-ad-sed-reprehenderit-odit-vel.html', 1, '2025-02-19 10:56:00', '2025-02-19 10:56:00'),
(13, 13, 'Movie Director oR Theatre Director', '$150,000 USD', 'Remote', 'Full Time', 'http://www.marvin.com/aliquam-ut-quia-quisquam-deleniti-consequatur-quos', 0, '2025-02-19 10:56:00', '2025-02-19 10:56:00'),
(14, 14, 'Securities Sales Agent', '$150,000 USD', 'Remote', 'Part Time', 'http://lowe.com/mollitia-et-similique-quod-libero-rerum-rerum-minus.html', 1, '2025-02-19 10:56:00', '2025-02-19 10:56:00'),
(15, 15, 'Precision Lens Grinders and Polisher', '$50,000 USD', 'Remote', 'Full Time', 'http://www.muller.com/', 0, '2025-02-19 10:56:00', '2025-02-19 10:56:00'),
(16, 16, 'Electronic Drafter', '$90,000 USD', 'Remote', 'Part Time', 'https://wintheiser.info/omnis-voluptatum-velit-omnis-ab-consequatur-doloremque.html', 1, '2025-02-19 10:56:00', '2025-02-19 10:56:00'),
(17, 17, 'Electric Motor Repairer', '$150,000 USD', 'Remote', 'Full Time', 'https://www.spencer.info/adipisci-consequatur-ipsam-nulla-aperiam-ducimus-quia-sit', 0, '2025-02-19 10:56:00', '2025-02-19 10:56:00'),
(18, 18, 'Commercial and Industrial Designer', '$150,000 USD', 'Remote', 'Part Time', 'http://www.hirthe.com/placeat-dolorem-quasi-aut-distinctio-nobis', 1, '2025-02-19 10:56:00', '2025-02-19 10:56:00'),
(19, 19, 'Internist', '$50,000 USD', 'Remote', 'Full Time', 'https://www.harris.org/aut-molestiae-blanditiis-aperiam', 0, '2025-02-19 10:56:00', '2025-02-19 10:56:00'),
(20, 20, 'Urban Planner', '$150,000 USD', 'Remote', 'Part Time', 'http://hane.com/pariatur-laudantium-eum-quia-est-nisi-dolor.html', 1, '2025-02-19 10:56:00', '2025-02-19 10:56:00'),
(21, 21, 'Developer', '100000', 'Rajshahi', 'Full Time', 'https://bd.linkedin.com/in/prosenjit-kumar-615342266?trk=people-guest_people_search-card', 0, '2025-02-20 06:16:40', '2025-02-20 06:16:40');

-- --------------------------------------------------------

--
-- Table structure for table `job_tag`
--

CREATE TABLE `job_tag` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `job_id` bigint(20) UNSIGNED NOT NULL,
  `tag_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `job_tag`
--

INSERT INTO `job_tag` (`id`, `job_id`, `tag_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL),
(2, 1, 2, NULL, NULL),
(3, 1, 3, NULL, NULL),
(4, 2, 1, NULL, NULL),
(5, 2, 2, NULL, NULL),
(6, 2, 3, NULL, NULL),
(7, 3, 1, NULL, NULL),
(8, 3, 2, NULL, NULL),
(9, 3, 3, NULL, NULL),
(10, 4, 1, NULL, NULL),
(11, 4, 2, NULL, NULL),
(12, 4, 3, NULL, NULL),
(13, 5, 1, NULL, NULL),
(14, 5, 2, NULL, NULL),
(15, 5, 3, NULL, NULL),
(16, 6, 1, NULL, NULL),
(17, 6, 2, NULL, NULL),
(18, 6, 3, NULL, NULL),
(19, 7, 1, NULL, NULL),
(20, 7, 2, NULL, NULL),
(21, 7, 3, NULL, NULL),
(22, 8, 1, NULL, NULL),
(23, 8, 2, NULL, NULL),
(24, 8, 3, NULL, NULL),
(25, 9, 1, NULL, NULL),
(26, 9, 2, NULL, NULL),
(27, 9, 3, NULL, NULL),
(28, 10, 1, NULL, NULL),
(29, 10, 2, NULL, NULL),
(30, 10, 3, NULL, NULL),
(31, 11, 1, NULL, NULL),
(32, 11, 2, NULL, NULL),
(33, 11, 3, NULL, NULL),
(34, 12, 1, NULL, NULL),
(35, 12, 2, NULL, NULL),
(36, 12, 3, NULL, NULL),
(37, 13, 1, NULL, NULL),
(38, 13, 2, NULL, NULL),
(39, 13, 3, NULL, NULL),
(40, 14, 1, NULL, NULL),
(41, 14, 2, NULL, NULL),
(42, 14, 3, NULL, NULL),
(43, 15, 1, NULL, NULL),
(44, 15, 2, NULL, NULL),
(45, 15, 3, NULL, NULL),
(46, 16, 1, NULL, NULL),
(47, 16, 2, NULL, NULL),
(48, 16, 3, NULL, NULL),
(49, 17, 1, NULL, NULL),
(50, 17, 2, NULL, NULL),
(51, 17, 3, NULL, NULL),
(52, 18, 1, NULL, NULL),
(53, 18, 2, NULL, NULL),
(54, 18, 3, NULL, NULL),
(55, 19, 1, NULL, NULL),
(56, 19, 2, NULL, NULL),
(57, 19, 3, NULL, NULL),
(58, 20, 1, NULL, NULL),
(59, 20, 2, NULL, NULL),
(60, 20, 3, NULL, NULL),
(61, 21, 4, NULL, NULL),
(62, 21, 5, NULL, NULL),
(63, 21, 6, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_queued_jobs_table', 1),
(4, '2025_02_19_153248_create_employers_table', 1),
(5, '2025_02_19_154907_create_jobs_table', 1),
(6, '2025_02_19_161656_create_tags_table', 1),
(7, '2025_02_19_162126_create_job_tag_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `queued_failed_jobs`
--

CREATE TABLE `queued_failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `queued_jobs`
--

CREATE TABLE `queued_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `queued_job_batches`
--

CREATE TABLE `queued_job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('14g0MPhuNGJtn8tpxZdF3EUaCL9AJokzJwjp5DyE', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoielYyaHh2OGp5ZEpJYzVmbmZDa2dHWXBFS0k4bkxPY0xUSWtMelBlOCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1740053865);

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'quisquam', '2025-02-19 10:56:00', '2025-02-19 10:56:00'),
(2, 'voluptatem', '2025-02-19 10:56:00', '2025-02-19 10:56:00'),
(3, 'quis', '2025-02-19 10:56:00', '2025-02-19 10:56:00'),
(4, 'laravel', '2025-02-20 06:16:40', '2025-02-20 06:16:40'),
(5, ' php', '2025-02-20 06:16:40', '2025-02-20 06:16:40'),
(6, ' mysql', '2025-02-20 06:16:40', '2025-02-20 06:16:40');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Test User', 'test@example.com', '2025-02-19 10:56:00', '$2y$12$gGmnqgdpNE5KzoAkpG3eseazLXQXL6iwCDxISAqTaka2E1NBBof9C', 'hRZPqB3OUE', '2025-02-19 10:56:00', '2025-02-19 10:56:00'),
(2, 'Tre Conn', 'boyd58@example.com', '2025-02-19 10:56:00', '$2y$12$gGmnqgdpNE5KzoAkpG3eseazLXQXL6iwCDxISAqTaka2E1NBBof9C', 'r9JjMq7jDM', '2025-02-19 10:56:00', '2025-02-19 10:56:00'),
(3, 'Dr. Dorcas Effertz', 'wkoelpin@example.com', '2025-02-19 10:56:00', '$2y$12$gGmnqgdpNE5KzoAkpG3eseazLXQXL6iwCDxISAqTaka2E1NBBof9C', 'yRINY02VAh', '2025-02-19 10:56:00', '2025-02-19 10:56:00'),
(4, 'Dr. Daron Pacocha', 'camron.shanahan@example.org', '2025-02-19 10:56:00', '$2y$12$gGmnqgdpNE5KzoAkpG3eseazLXQXL6iwCDxISAqTaka2E1NBBof9C', 'qdvsgwDCjm', '2025-02-19 10:56:00', '2025-02-19 10:56:00'),
(5, 'Ronny Dicki', 'welch.bethel@example.com', '2025-02-19 10:56:00', '$2y$12$gGmnqgdpNE5KzoAkpG3eseazLXQXL6iwCDxISAqTaka2E1NBBof9C', 'VJTDYOReL5', '2025-02-19 10:56:00', '2025-02-19 10:56:00'),
(6, 'Wallace Considine Jr.', 'ahmed76@example.net', '2025-02-19 10:56:00', '$2y$12$gGmnqgdpNE5KzoAkpG3eseazLXQXL6iwCDxISAqTaka2E1NBBof9C', 'nhGppyHfbV', '2025-02-19 10:56:00', '2025-02-19 10:56:00'),
(7, 'Luna Mante Jr.', 'enid.littel@example.org', '2025-02-19 10:56:00', '$2y$12$gGmnqgdpNE5KzoAkpG3eseazLXQXL6iwCDxISAqTaka2E1NBBof9C', 'cNHkC48Y7z', '2025-02-19 10:56:00', '2025-02-19 10:56:00'),
(8, 'Dr. Gianni Runte IV', 'estell53@example.net', '2025-02-19 10:56:00', '$2y$12$gGmnqgdpNE5KzoAkpG3eseazLXQXL6iwCDxISAqTaka2E1NBBof9C', 'J87ZK7Adn2', '2025-02-19 10:56:00', '2025-02-19 10:56:00'),
(9, 'Madisen Borer', 'harold13@example.org', '2025-02-19 10:56:00', '$2y$12$gGmnqgdpNE5KzoAkpG3eseazLXQXL6iwCDxISAqTaka2E1NBBof9C', 'k3h6723hFy', '2025-02-19 10:56:00', '2025-02-19 10:56:00'),
(10, 'Laron Mann DDS', 'esimonis@example.net', '2025-02-19 10:56:00', '$2y$12$gGmnqgdpNE5KzoAkpG3eseazLXQXL6iwCDxISAqTaka2E1NBBof9C', 'NDmSVM2yWf', '2025-02-19 10:56:00', '2025-02-19 10:56:00'),
(11, 'Johnathan Kunde Jr.', 'jacobson.johathan@example.org', '2025-02-19 10:56:00', '$2y$12$gGmnqgdpNE5KzoAkpG3eseazLXQXL6iwCDxISAqTaka2E1NBBof9C', 'nUUjJPQr1M', '2025-02-19 10:56:00', '2025-02-19 10:56:00'),
(12, 'Mr. Larue Hagenes', 'larissa55@example.net', '2025-02-19 10:56:00', '$2y$12$gGmnqgdpNE5KzoAkpG3eseazLXQXL6iwCDxISAqTaka2E1NBBof9C', 'nhZJNvdtg7', '2025-02-19 10:56:00', '2025-02-19 10:56:00'),
(13, 'Cody Kuhlman', 'lane.lynch@example.com', '2025-02-19 10:56:00', '$2y$12$gGmnqgdpNE5KzoAkpG3eseazLXQXL6iwCDxISAqTaka2E1NBBof9C', 'pWsUSivvk8', '2025-02-19 10:56:00', '2025-02-19 10:56:00'),
(14, 'Aron Altenwerth', 'kenneth25@example.com', '2025-02-19 10:56:00', '$2y$12$gGmnqgdpNE5KzoAkpG3eseazLXQXL6iwCDxISAqTaka2E1NBBof9C', 'D5nwu6625V', '2025-02-19 10:56:00', '2025-02-19 10:56:00'),
(15, 'Alva Spinka MD', 'jace69@example.org', '2025-02-19 10:56:00', '$2y$12$gGmnqgdpNE5KzoAkpG3eseazLXQXL6iwCDxISAqTaka2E1NBBof9C', 'a5FWwynkQs', '2025-02-19 10:56:00', '2025-02-19 10:56:00'),
(16, 'Mrs. Marguerite Heathcote IV', 'iflatley@example.net', '2025-02-19 10:56:00', '$2y$12$gGmnqgdpNE5KzoAkpG3eseazLXQXL6iwCDxISAqTaka2E1NBBof9C', 'npZ6DSrivU', '2025-02-19 10:56:00', '2025-02-19 10:56:00'),
(17, 'Michele Schuppe', 'mhowe@example.com', '2025-02-19 10:56:00', '$2y$12$gGmnqgdpNE5KzoAkpG3eseazLXQXL6iwCDxISAqTaka2E1NBBof9C', '5TFcPToMkC', '2025-02-19 10:56:00', '2025-02-19 10:56:00'),
(18, 'Elvie Herman', 'archibald13@example.net', '2025-02-19 10:56:00', '$2y$12$gGmnqgdpNE5KzoAkpG3eseazLXQXL6iwCDxISAqTaka2E1NBBof9C', 'KyEgMK66IE', '2025-02-19 10:56:00', '2025-02-19 10:56:00'),
(19, 'Ethel Gottlieb', 'lang.walton@example.org', '2025-02-19 10:56:00', '$2y$12$gGmnqgdpNE5KzoAkpG3eseazLXQXL6iwCDxISAqTaka2E1NBBof9C', 'pjWqLoTIr8', '2025-02-19 10:56:00', '2025-02-19 10:56:00'),
(20, 'Claudie Dibbert', 'hane.hollie@example.com', '2025-02-19 10:56:00', '$2y$12$gGmnqgdpNE5KzoAkpG3eseazLXQXL6iwCDxISAqTaka2E1NBBof9C', 'j8LJPiPPyR', '2025-02-19 10:56:00', '2025-02-19 10:56:00'),
(21, 'Grady Konopelski DVM', 'imani75@example.com', '2025-02-19 10:56:00', '$2y$12$gGmnqgdpNE5KzoAkpG3eseazLXQXL6iwCDxISAqTaka2E1NBBof9C', '7NYLNY5cJF', '2025-02-19 10:56:00', '2025-02-19 10:56:00'),
(22, 'Prosenjit Mondol', 'prosenjit1156@gmail.com', NULL, '$2y$12$RhYG/REvRJyt8.55D/g88u4OKMsKiQqTHTZd1SOAyLjOyYN7w0QfO', NULL, '2025-02-19 11:26:44', '2025-02-19 11:26:44');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `employers`
--
ALTER TABLE `employers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_employer_id_foreign` (`employer_id`);

--
-- Indexes for table `job_tag`
--
ALTER TABLE `job_tag`
  ADD PRIMARY KEY (`id`),
  ADD KEY `job_tag_job_id_foreign` (`job_id`),
  ADD KEY `job_tag_tag_id_foreign` (`tag_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `queued_failed_jobs`
--
ALTER TABLE `queued_failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `queued_failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `queued_jobs`
--
ALTER TABLE `queued_jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `queued_jobs_queue_index` (`queue`);

--
-- Indexes for table `queued_job_batches`
--
ALTER TABLE `queued_job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tags_name_unique` (`name`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employers`
--
ALTER TABLE `employers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `job_tag`
--
ALTER TABLE `job_tag`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `queued_failed_jobs`
--
ALTER TABLE `queued_failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `queued_jobs`
--
ALTER TABLE `queued_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `jobs`
--
ALTER TABLE `jobs`
  ADD CONSTRAINT `jobs_employer_id_foreign` FOREIGN KEY (`employer_id`) REFERENCES `employers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `job_tag`
--
ALTER TABLE `job_tag`
  ADD CONSTRAINT `job_tag_job_id_foreign` FOREIGN KEY (`job_id`) REFERENCES `jobs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `job_tag_tag_id_foreign` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
