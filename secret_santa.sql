-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 18, 2025 at 03:55 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `secret_santa`
--

-- --------------------------------------------------------

--
-- Table structure for table `assignments`
--

CREATE TABLE `assignments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` bigint(20) UNSIGNED NOT NULL,
  `secret_child_id` bigint(20) UNSIGNED NOT NULL,
  `year` year(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `name`, `email`, `created_at`, `updated_at`) VALUES
(31, 'Hamish Murray', 'hamish.murray@acme.com', '2025-03-18 08:52:19', '2025-03-18 08:52:19'),
(32, 'Layla Graham', 'layla.graham@acme.com', '2025-03-18 08:52:19', '2025-03-18 08:52:19'),
(33, 'Matthew King', 'matthew.king@acme.com', '2025-03-18 08:52:19', '2025-03-18 08:52:19'),
(34, 'Benjamin Collins', 'benjamin.collins@acme.com', '2025-03-18 08:52:19', '2025-03-18 08:52:19'),
(35, 'Isabella Scott', 'isabella.scott@acme.com', '2025-03-18 08:52:19', '2025-03-18 08:52:19'),
(36, 'Charlie Ross', 'charlie.ross@acme.com', '2025-03-18 08:52:19', '2025-03-18 08:52:19'),
(37, 'Hamish Murray', 'hamish.murray.sr@acme.com', '2025-03-18 08:52:19', '2025-03-18 08:52:19'),
(38, 'Piper Stewart', 'piper.stewart@acme.com', '2025-03-18 08:52:19', '2025-03-18 08:52:19'),
(39, 'Spencer Allen', 'spencer.allen@acme.com', '2025-03-18 08:52:19', '2025-03-18 08:52:19'),
(40, 'Charlie Wright', 'charlie.wright@acme.com', '2025-03-18 08:52:19', '2025-03-18 08:52:19'),
(41, 'Hamish Murray', 'hamish.murray.jr@acme.com', '2025-03-18 08:52:19', '2025-03-18 08:52:19'),
(42, 'Charlie Ross', 'charlie.ross.jr@acme.com', '2025-03-18 08:52:20', '2025-03-18 08:52:20'),
(43, 'Ethan Murray', 'ethan.murray@acme.com', '2025-03-18 08:52:20', '2025-03-18 08:52:20'),
(44, 'Matthew King', 'matthew.king.jr@acme.com', '2025-03-18 08:52:20', '2025-03-18 08:52:20'),
(45, 'Mark Lawrence', 'mark.lawrence@acme.com', '2025-03-18 08:52:20', '2025-03-18 08:52:20');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
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
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
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
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
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
(19, '0001_01_01_000000_create_users_table', 1),
(20, '0001_01_01_000001_create_cache_table', 1),
(21, '0001_01_01_000002_create_jobs_table', 1),
(22, '2025_03_18_062201_create_employees_table', 1),
(23, '2025_03_18_062202_create_assignments_table', 1),
(24, '2025_03_18_064421_create_previous_year_assignments_table', 1);

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
-- Table structure for table `previous_year_assignments`
--

CREATE TABLE `previous_year_assignments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_name` varchar(255) DEFAULT NULL,
  `employee_emailid` varchar(255) NOT NULL,
  `secret_child_name` varchar(255) DEFAULT NULL,
  `secret_child_emailid` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `previous_year_assignments`
--

INSERT INTO `previous_year_assignments` (`id`, `employee_name`, `employee_emailid`, `secret_child_name`, `secret_child_emailid`, `created_at`, `updated_at`) VALUES
(1, 'Hamish Murray', 'hamish.murray@acme.com', 'Benjamin Collins', 'benjamin.collins@acme.com', '2025-03-18 08:52:04', '2025-03-18 08:52:04'),
(2, 'Layla Graham', 'layla.graham@acme.com', 'Piper Stewart', 'piper.stewart@acme.com', '2025-03-18 08:52:04', '2025-03-18 08:52:04'),
(3, 'Matthew King', 'matthew.king@acme.com', 'Spencer Allen', 'spencer.allen@acme.com', '2025-03-18 08:52:05', '2025-03-18 08:52:05'),
(4, 'Benjamin Collins', 'benjamin.collins@acme.com', 'Ethan Murray', 'ethan.murray@acme.com', '2025-03-18 08:52:05', '2025-03-18 08:52:05'),
(5, 'Isabella Scott', 'isabella.scott@acme.com', 'Layla Graham', 'layla.graham@acme.com', '2025-03-18 08:52:05', '2025-03-18 08:52:05'),
(6, 'Charlie Ross', 'charlie.ross@acme.com', 'Mark Lawrence', 'mark.lawrence@acme.com', '2025-03-18 08:52:05', '2025-03-18 08:52:05'),
(7, 'Hamish Murray', 'hamish.murray.sr@acme.com', 'Hamish Murray', 'hamish.murray.jr@acme.com', '2025-03-18 08:52:05', '2025-03-18 08:52:05'),
(8, 'Piper Stewart', 'piper.stewart@acme.com', 'Charlie Ross', 'charlie.ross.jr@acme.com', '2025-03-18 08:52:05', '2025-03-18 08:52:05'),
(9, 'Spencer Allen', 'spencer.allen@acme.com', 'Charlie Wright', 'charlie.wright@acme.com', '2025-03-18 08:52:05', '2025-03-18 08:52:05'),
(10, 'Charlie Wright', 'charlie.wright@acme.com', 'Hamish Murray', 'hamish.murray@acme.com', '2025-03-18 08:52:05', '2025-03-18 08:52:05'),
(11, 'Hamish Murray', 'hamish.murray.jr@acme.com', 'Charlie Ross', 'charlie.ross@acme.com', '2025-03-18 08:52:06', '2025-03-18 08:52:06'),
(12, 'Charlie Ross', 'charlie.ross.jr@acme.com', 'Matthew King', 'matthew.king@acme.com', '2025-03-18 08:52:06', '2025-03-18 08:52:06'),
(13, 'Ethan Murray', 'ethan.murray@acme.com', 'Matthew King', 'matthew.king.jr@acme.com', '2025-03-18 08:52:06', '2025-03-18 08:52:06'),
(14, 'Matthew King', 'matthew.king.jr@acme.com', 'Hamish Murray', 'hamish.murray.sr@acme.com', '2025-03-18 08:52:06', '2025-03-18 08:52:06'),
(15, 'Mark Lawrence', 'mark.lawrence@acme.com', 'Isabella Scott', 'isabella.scott@acme.com', '2025-03-18 08:52:06', '2025-03-18 08:52:06');

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
('FNd0i6OsyFtcbCFe3eYQHR3rRakqXVxW8fqUJxos', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoic2dPeDE5bDRZdUZDSzJiSEZ4dlk4SXJSUkNVTDVMTk85bnRYbW93cSI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjMzOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvYXNzaWdubWVudHMiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO30=', 1742309476);

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
(1, 'nandhini', 'nandhinimurugan310@gmail.com', NULL, '$2y$12$NQh.Ua5GbmBKG/1PZSq6QuJy6.jUJAl6ePFH.lPdDWhoqWBJk5ncC', NULL, '2025-03-18 06:55:34', '2025-03-18 06:55:34');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assignments`
--
ALTER TABLE `assignments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `assignments_employee_id_foreign` (`employee_id`),
  ADD KEY `assignments_secret_child_id_foreign` (`secret_child_id`);

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
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `employees_email_unique` (`email`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `previous_year_assignments`
--
ALTER TABLE `previous_year_assignments`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `previous_year_assignments_employee_emailid_unique` (`employee_emailid`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

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
-- AUTO_INCREMENT for table `assignments`
--
ALTER TABLE `assignments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `previous_year_assignments`
--
ALTER TABLE `previous_year_assignments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `assignments`
--
ALTER TABLE `assignments`
  ADD CONSTRAINT `assignments_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `assignments_secret_child_id_foreign` FOREIGN KEY (`secret_child_id`) REFERENCES `employees` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
