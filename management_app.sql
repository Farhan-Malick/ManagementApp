-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 01, 2024 at 09:10 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `management_app`
--

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Tariq', '2024-04-10 23:41:33', '2024-04-10 23:41:33'),
(2, 'Tariq 2nd Payment', '2024-04-10 23:55:27', '2024-04-10 23:55:27'),
(3, 'Muhammad Ghamedi', '2024-04-11 06:53:31', '2024-04-11 06:53:31'),
(4, 'Student', '2024-04-11 07:11:22', '2024-04-11 07:11:22'),
(5, 'Tariq 13 April', '2024-04-20 17:01:01', '2024-04-20 17:01:01'),
(6, 'Arbi 15 April', '2024-04-20 17:08:35', '2024-04-20 17:08:35'),
(7, 'Tariq 18 April', '2024-04-20 17:14:10', '2024-04-20 17:14:10'),
(8, 'Tariq 19 April', '2024-04-20 17:19:31', '2024-04-20 17:19:31'),
(9, 'Tariq 20 April', '2024-04-20 17:26:53', '2024-04-20 17:26:53'),
(10, 'Arbi 22 April', '2024-04-23 17:17:34', '2024-04-23 17:17:34'),
(11, 'Arbi 23 April', '2024-04-23 17:25:38', '2024-04-23 17:25:38'),
(12, 'Rafay 28 April', '2024-04-28 18:17:44', '2024-04-28 18:17:44');

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `transaction_id` bigint(20) UNSIGNED NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `category` varchar(255) DEFAULT NULL,
  `new_field` varchar(255) DEFAULT NULL,
  `description` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`id`, `transaction_id`, `amount`, `category`, `new_field`, `description`, `date`, `created_at`, `updated_at`) VALUES
(6, 1, 3000.00, 'Miscellaneous', NULL, 'Pizza', '2024-04-07', '2024-04-11 01:54:59', '2024-04-11 01:54:59');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2023_12_11_230936_create_tasks_table', 1),
(7, '2024_04_08_013355_add_google_id_to_users_table', 2),
(11, '2024_04_11_015732_create_clients_table', 3),
(12, '2024_04_11_015737_create_transactions_table', 3),
(13, '2024_04_11_020753_create_expenses_table', 3),
(15, '2024_05_01_030344_add_new_field_to_expenses', 4);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `task_name` varchar(255) DEFAULT NULL,
  `platform` varchar(255) DEFAULT NULL,
  `budget` decimal(8,2) DEFAULT NULL,
  `advance_payment` decimal(8,2) DEFAULT NULL,
  `assign_to` varchar(255) DEFAULT NULL,
  `dev_amount` decimal(8,2) DEFAULT NULL,
  `advance_payment_to_dev` decimal(8,2) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `deadline` date DEFAULT NULL,
  `description` text DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `task_name`, `platform`, `budget`, `advance_payment`, `assign_to`, `dev_amount`, `advance_payment_to_dev`, `start_date`, `end_date`, `deadline`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Sagar Malhotra (8848166) || A3', 'Asp.NET', 8000.00, 8000.00, 'Farhan', 0.00, 0.00, '2024-03-27', '2024-03-28', '2024-03-28', 'asd', 'Completed', '2024-04-02 20:11:58', '2024-04-07 23:25:37'),
(2, 'Belna Babu Peter (8867054) || A3', 'Asp.NET', 8000.00, 8000.00, 'Babar', 0.00, 0.00, NULL, NULL, NULL, 'ashd', 'Completed', '2024-04-02 20:13:04', '2024-04-07 23:26:01'),
(3, 'Gurrishabjit Singh (8822368) || A3', 'Asp.NET', 8000.00, 8000.00, 'Ahmed', 0.00, 0.00, NULL, NULL, NULL, NULL, 'Completed', '2024-04-02 15:14:17', '2024-04-07 18:26:29'),
(4, 'Bhuva Meet (8874754) || A3', 'Asp.NET', 8000.00, 8000.00, 'Waqas', 0.00, 0.00, NULL, NULL, NULL, NULL, 'Completed', '2024-04-02 15:15:25', '2024-04-07 18:26:42'),
(5, 'Mariya Suresh (8867314) || A3', 'Asp.NET', 8000.00, 8000.00, 'Majid', 0.00, 0.00, NULL, NULL, NULL, NULL, 'Completed', '2024-04-02 20:16:51', '2024-04-07 23:27:02'),
(6, 'Nifty Notes', 'React', 10000.00, 10000.00, 'Farhan', 0.00, 0.00, NULL, NULL, NULL, NULL, 'Completed', '2024-04-02 20:17:29', '2024-04-02 20:17:29'),
(7, 'Angular.Net (Pantronus)', 'Asp.NET', 10000.00, 10000.00, 'Farhan', 0.00, 0.00, NULL, NULL, NULL, NULL, 'Completed', '2024-04-02 20:18:16', '2024-04-02 20:18:16'),
(8, 'React Visual Assignment', 'React', 10000.00, 10000.00, 'Rohail', 0.00, 0.00, NULL, NULL, NULL, NULL, 'Completed', '2024-04-02 20:19:20', '2024-04-07 23:27:16'),
(9, 'Howdy Donor', 'PHP', 12000.00, 12000.00, 'Farhan', 0.00, 0.00, NULL, NULL, NULL, NULL, 'Completed', '2024-04-02 20:21:20', '2024-04-07 23:25:23'),
(10, 'Grocery Store', 'Asp.NET', 15000.00, 15000.00, 'Babar', 5000.00, 5000.00, '2024-04-02', '2024-04-05', '2024-04-08', NULL, 'Completed', '2024-04-02 20:22:33', '2024-04-19 09:12:37'),
(11, 'Flower Store', 'Asp.NET', 15000.00, 15000.00, 'Waqas BR', 5000.00, 5000.00, '2024-04-05', '2024-04-08', '2024-04-08', NULL, 'Completed', '2024-04-05 18:52:03', '2024-04-19 09:13:00'),
(12, 'Howdy Donors Sprint 4', 'PHP', 5000.00, 5000.00, 'Farhan', 0.00, 0.00, '2024-04-09', '2024-04-09', '2024-04-12', NULL, 'Completed', '2024-04-08 20:42:12', '2024-04-17 21:50:57'),
(13, 'Data Visualization || 1', 'React', 7000.00, 7000.00, 'Rohail', 0.00, 0.00, '2024-04-11', '2024-04-17', '2024-04-17', NULL, 'In Progress', '2024-04-10 19:49:59', '2024-04-17 21:51:20'),
(14, 'Portfolio website', 'React', 10000.00, 5000.00, 'Mubashir', 0.00, 0.00, '2024-04-15', '2024-04-16', '2024-04-17', 'asd', 'Completed', '2024-04-15 14:59:33', '2024-04-20 15:44:16'),
(15, 'Data Visualization || 2', 'React', 10000.00, 5000.00, 'Farhan', 0.00, 0.00, '2024-04-15', '2024-04-17', '2024-04-17', NULL, 'Completed', '2024-04-15 15:00:39', '2024-04-19 09:11:45'),
(16, 'Data Visualization || 3', 'React', 10000.00, 5000.00, 'Farhan', 0.00, 0.00, '2024-04-15', '2024-04-18', '2024-04-18', NULL, 'Completed', '2024-04-15 15:01:47', '2024-04-19 09:11:27'),
(17, 'Mariya Suresh (8867314) || A2', 'React', 10000.00, 10000.00, 'Farhan', 0.00, 0.00, '2024-04-18', '2024-04-18', '2024-04-18', NULL, 'Completed', '2024-04-17 20:47:24', '2024-04-17 21:38:39'),
(18, 'Athira Radhakrishnan ( 8867982 )', 'Asp.NET', 8000.00, 5000.00, 'Farhan', 0.00, 0.00, '2024-04-20', '2024-04-20', '2024-04-20', 'asd', 'Completed', '2024-04-20 15:45:45', '2024-04-20 15:45:45');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `client_id`, `amount`, `date`, `created_at`, `updated_at`) VALUES
(1, 1, 32000.00, '2024-04-07', '2024-04-10 23:41:46', '2024-04-10 23:41:46'),
(2, 2, 20000.00, '2024-04-11', '2024-04-10 23:55:44', '2024-04-10 23:55:44'),
(3, 3, 21648.00, '2024-04-10', '2024-04-11 06:54:11', '2024-04-11 06:54:11'),
(4, 4, 10000.00, '2024-04-10', '2024-04-11 07:11:32', '2024-04-11 07:11:32'),
(5, 5, 20000.00, '2024-04-13', '2024-04-20 17:01:16', '2024-04-20 17:01:16'),
(6, 6, 29600.00, '2024-04-15', '2024-04-20 17:08:57', '2024-04-20 17:08:57'),
(7, 7, 10000.00, '2024-04-18', '2024-04-20 17:14:25', '2024-04-20 17:14:25'),
(8, 8, 10000.00, '2024-04-19', '2024-04-20 17:20:06', '2024-04-20 17:20:06'),
(9, 9, 10000.00, '2024-04-20', '2024-04-20 17:27:24', '2024-04-20 17:27:24'),
(10, 10, 14393.00, '2024-04-22', '2024-04-23 17:18:10', '2024-04-23 17:18:10'),
(11, 11, 15590.00, '2024-04-23', '2024-04-23 17:26:04', '2024-04-23 17:26:04'),
(12, 12, 16800.00, '2024-04-28', '2024-04-28 18:18:04', '2024-04-28 18:18:04');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `google_id` varchar(255) DEFAULT NULL,
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

INSERT INTO `users` (`id`, `google_id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(11, NULL, 'Muhammad Farhan Malik', 'farhan.malicck@gmail.com', NULL, '$2y$12$Enr6htHI4QmHrVsAuQ.kY.XRo2qIRsE.UVuUKEqYMXx3yTFiWw6pm', NULL, '2024-04-07 23:19:30', '2024-04-07 23:19:30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `expenses_transaction_id_foreign` (`transaction_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transactions_client_id_foreign` (`client_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_google_id_unique` (`google_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `expenses`
--
ALTER TABLE `expenses`
  ADD CONSTRAINT `expenses_transaction_id_foreign` FOREIGN KEY (`transaction_id`) REFERENCES `transactions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
