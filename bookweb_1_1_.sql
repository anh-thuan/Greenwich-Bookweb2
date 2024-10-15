-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 15, 2024 at 09:56 AM
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
-- Database: `bookweb(1.1)`
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

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('05a72b0d331578adb097efcd34bfd6fb', 'i:2;', 1728315327),
('05a72b0d331578adb097efcd34bfd6fb:timer', 'i:1728315327;', 1728315327),
('1eb149468c58772ef900523ba66b6506', 'i:1;', 1728313538),
('1eb149468c58772ef900523ba66b6506:timer', 'i:1728313538;', 1728313538),
('23e577431aec81696b53f5fe0f6f86c9', 'i:1;', 1728926919),
('23e577431aec81696b53f5fe0f6f86c9:timer', 'i:1728926919;', 1728926919),
('2881ca3e5af7d4dcc263f3bef63932e0', 'i:1;', 1728401009),
('2881ca3e5af7d4dcc263f3bef63932e0:timer', 'i:1728401009;', 1728401009),
('74a518190bc5a0449515d53c9f6f0eac', 'i:1;', 1728926796),
('74a518190bc5a0449515d53c9f6f0eac:timer', 'i:1728926796;', 1728926796),
('7a8992e495981bf8fdd114ef2a1c4f8f', 'i:1;', 1728319536),
('7a8992e495981bf8fdd114ef2a1c4f8f:timer', 'i:1728319536;', 1728319536),
('80b4ad891e35bc3bed386e96a95c231c', 'i:1;', 1728927121),
('80b4ad891e35bc3bed386e96a95c231c:timer', 'i:1728927121;', 1728927121),
('8e611f59918f7c8686f9c6096a5f4c27', 'i:1;', 1728455108),
('8e611f59918f7c8686f9c6096a5f4c27:timer', 'i:1728455108;', 1728455108),
('9e41d0d189f0788803d849e255718cc8', 'i:1;', 1728927066),
('9e41d0d189f0788803d849e255718cc8:timer', 'i:1728927066;', 1728927066),
('a128c6a40c26273f8066c62edac9be7b', 'i:3;', 1728319901),
('a128c6a40c26273f8066c62edac9be7b:timer', 'i:1728319901;', 1728319901),
('anhphat@gmail.com|127.0.0.1', 'i:2;', 1728315327),
('anhphat@gmail.com|127.0.0.1:timer', 'i:1728315327;', 1728315327),
('anhthuan@gmail.com|127.0.0.1', 'i:3;', 1728319901),
('anhthuan@gmail.com|127.0.0.1:timer', 'i:1728319901;', 1728319901),
('d215a7e7cf0d3b7c62d89b6908bb0611', 'i:1;', 1728455154),
('d215a7e7cf0d3b7c62d89b6908bb0611:timer', 'i:1728455154;', 1728455154),
('e87a2d831a059798570806f163880f7d', 'i:1;', 1728926174),
('e87a2d831a059798570806f163880f7d:timer', 'i:1728926174;', 1728926174);

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
-- Table structure for table `contributions`
--

CREATE TABLE `contributions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `faculty_id` bigint(20) UNSIGNED DEFAULT NULL,
  `semester_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `upload_file` text NOT NULL,
  `upload_image` text NOT NULL,
  `thumbnail` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'pending',
  `popular` enum('1','0') DEFAULT '0',
  `comment` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contributions`
--

INSERT INTO `contributions` (`id`, `user_id`, `faculty_id`, `semester_id`, `name`, `content`, `upload_file`, `upload_image`, `thumbnail`, `status`, `popular`, `comment`, `created_at`, `updated_at`, `deleted_at`) VALUES
(20, 577694, 1, 1, 'Secure HealthCare', 'This is secure healthcare', 'uploads/file/word9.docx', 'C:\\xampp\\tmp\\php675.tmp', 'uploads/image/image9.jpg', 'approved', '1', 'Very Good !!!', '2024-10-14 10:26:39', '2024-10-14 10:30:22', NULL),
(21, 577694, 1, 1, 'Data + Design', 'This is Data + Design', 'uploads/file/data+design.docx', 'C:\\xampp\\tmp\\php8471.tmp', 'uploads/image/image1.jpg', 'approved', '1', 'Excellent !!!', '2024-10-14 10:27:12', '2024-10-14 10:30:35', NULL),
(22, 782767, 2, 1, 'Shades of Digital Marketing', 'This is Digital marketing', 'uploads/file/50 Shades of Digital Marketing.docx', 'C:\\xampp\\tmp\\php5B65.tmp', 'uploads/image/image16.jpg', 'approved', '0', 'Very good !', '2024-10-14 10:29:12', '2024-10-14 10:44:12', NULL),
(23, 782767, 2, 1, 'Understanding marketing', 'How to understand about it', 'uploads/file/Diginal marketing.docx', 'C:\\xampp\\tmp\\phpD059.tmp', 'uploads/image/img18.jpg', 'approved', '0', 'Ok !!!', '2024-10-14 10:29:42', '2024-10-14 10:33:06', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `faculties`
--

CREATE TABLE `faculties` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `semester_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faculties`
--

INSERT INTO `faculties` (`id`, `name`, `description`, `semester_id`, `created_at`, `updated_at`) VALUES
(1, 'TECHNOLOGY', NULL, 1, '2024-10-05 09:11:52', '2024-10-05 09:11:52'),
(2, 'MARKETING', NULL, 1, '2024-10-05 21:29:48', '2024-10-05 21:29:48');

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
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_10_05_023059_add_two_factor_columns_to_users_table', 1),
(5, '2024_10_05_023132_create_personal_access_tokens_table', 1),
(6, '2024_10_05_034806_create_permissions_table', 1),
(7, '2024_10_05_035047_create_roles_table', 1),
(8, '2024_10_05_035229_create_role_permission', 1),
(9, '2024_10_05_101410_create_semesters_table', 1),
(10, '2024_10_05_103436_create_faculties_table', 1),
(11, '2024_10_05_145511_create_contributions_table', 1),
(12, '2024_10_06_134441_add_soft_delete_to_contributions', 2);

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
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `slug`, `description`, `created_at`, `updated_at`) VALUES
(1, 'User', 'user/list', NULL, '2024-10-07 08:44:06', '2024-10-07 08:44:06'),
(2, 'User', 'user/add', NULL, '2024-10-07 08:44:14', '2024-10-07 08:44:14'),
(3, 'User', 'user/edit', NULL, '2024-10-07 08:44:24', '2024-10-07 08:44:24'),
(4, 'User', 'user/delete', NULL, '2024-10-07 08:44:32', '2024-10-07 08:44:32'),
(5, 'Permission', 'permission/add', NULL, '2024-10-07 08:45:20', '2024-10-07 08:45:20'),
(6, 'Permission', 'permission/edit', NULL, '2024-10-07 08:45:36', '2024-10-07 08:45:36'),
(7, 'Permission', 'permission/delete', NULL, '2024-10-07 08:45:48', '2024-10-07 08:45:48'),
(8, 'Role', 'role/list', NULL, '2024-10-07 08:45:56', '2024-10-07 08:45:56'),
(9, 'Role', 'role/add', NULL, '2024-10-07 08:46:07', '2024-10-07 08:46:07'),
(10, 'Role', 'role/edit', NULL, '2024-10-07 08:46:16', '2024-10-07 08:46:16'),
(11, 'Role', 'role/delete', NULL, '2024-10-07 08:46:24', '2024-10-07 08:46:24'),
(12, 'Semester', 'semester/add', NULL, '2024-10-07 09:02:12', '2024-10-07 09:02:12'),
(13, 'Semester', 'semester/edit', NULL, '2024-10-07 09:02:22', '2024-10-07 09:02:22'),
(14, 'Semester', 'semester/delete', NULL, '2024-10-07 09:02:43', '2024-10-07 09:02:43'),
(15, 'Faculty', 'faculty/list', NULL, '2024-10-07 09:10:36', '2024-10-07 09:10:36'),
(16, 'Faculty', 'faculty/add', NULL, '2024-10-07 09:10:44', '2024-10-07 09:10:44'),
(17, 'Faculty', 'faculty/edit', NULL, '2024-10-07 09:10:53', '2024-10-07 09:10:53'),
(18, 'Faculty', 'faculty/delete', NULL, '2024-10-07 09:11:08', '2024-10-07 09:11:08'),
(19, 'CoordinatorPost', 'post/list', NULL, '2024-10-07 09:19:57', '2024-10-07 09:19:57'),
(20, 'CoordinatorPost', 'post/edit', NULL, '2024-10-07 09:20:12', '2024-10-07 09:20:20'),
(21, 'ManagementList', 'allpost/list', NULL, '2024-10-07 09:27:48', '2024-10-07 09:27:48'),
(22, 'StudentContribution', 'contribution/list', NULL, '2024-10-07 09:37:30', '2024-10-07 09:37:30'),
(23, 'StudentContribution', 'contribution/add', NULL, '2024-10-07 09:37:40', '2024-10-07 09:37:40'),
(24, 'StudentContribution', 'contribution/edit', NULL, '2024-10-07 09:37:50', '2024-10-07 09:37:50'),
(25, 'StudentContribution', 'contribution/delete', NULL, '2024-10-07 09:37:59', '2024-10-07 09:37:59'),
(26, 'StudentHistory', 'contribution/historylist', NULL, '2024-10-07 10:00:16', '2024-10-07 10:02:46');

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
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `code`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'AD', 'ADMIN', NULL, '2024-10-05 09:08:33', '2024-10-05 09:08:33'),
(2, 'CO', 'COORDINATOR', NULL, '2024-10-05 09:08:44', '2024-10-05 09:08:44'),
(3, 'MA', 'MANAGER', NULL, '2024-10-05 09:08:52', '2024-10-05 09:08:52'),
(4, 'STU', 'STUDENT', NULL, '2024-10-05 09:09:00', '2024-10-05 09:09:00');

-- --------------------------------------------------------

--
-- Table structure for table `role_permission`
--

CREATE TABLE `role_permission` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_permission`
--

INSERT INTO `role_permission` (`id`, `role_id`, `permission_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL),
(2, 1, 2, NULL, NULL),
(3, 1, 3, NULL, NULL),
(4, 1, 4, NULL, NULL),
(5, 1, 5, NULL, NULL),
(6, 1, 6, NULL, NULL),
(7, 1, 7, NULL, NULL),
(8, 1, 8, NULL, NULL),
(9, 1, 9, NULL, NULL),
(10, 1, 10, NULL, NULL),
(11, 1, 11, NULL, NULL),
(12, 1, 12, NULL, NULL),
(13, 1, 13, NULL, NULL),
(14, 1, 14, NULL, NULL),
(15, 1, 15, NULL, NULL),
(16, 1, 16, NULL, NULL),
(17, 1, 17, NULL, NULL),
(18, 1, 18, NULL, NULL),
(19, 2, 19, NULL, NULL),
(20, 2, 20, NULL, NULL),
(21, 2, 21, NULL, NULL),
(22, 3, 21, NULL, NULL),
(23, 4, 21, NULL, NULL),
(24, 4, 22, NULL, NULL),
(25, 4, 23, NULL, NULL),
(26, 4, 24, NULL, NULL),
(27, 4, 25, NULL, NULL),
(28, 4, 26, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `semesters`
--

CREATE TABLE `semesters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `semesters`
--

INSERT INTO `semesters` (`id`, `name`, `description`, `start_date`, `end_date`, `created_at`, `updated_at`) VALUES
(1, 'SUMMER 2024', NULL, '2024-10-11', '2024-10-25', '2024-10-05 16:10:47', '2024-10-05 16:10:47');

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
('1nDxDwsdH42waAVMTUXWNfvjO89WAtzap4et0RLD', NULL, '127.0.0.1', 'Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 10.0; WOW64; Trident/7.0; .NET4.0C; .NET4.0E; .NET CLR 2.0.50727; .NET CLR 3.0.30729; .NET CLR 3.5.30729;  QIHU 360EE)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiQXNJT1ZCMDlOclJ6ZVV2VVlqOExsOE5hc2g4MlYzSEZoVHFlaHBzdyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1728926000),
('o1OMMu0hFkuwsoSdQKz0UYEOBJupJXFtq3f4ilzb', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/129.0.0.0 Safari/537.36 Edg/129.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiYmxkeGlPakxQZU81UG1TbTVxVEZIaFQxd0lPRDI0OVJpTHh1ZVowViI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fX0=', 1728927968);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED DEFAULT NULL,
  `faculty_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `phone` int(10) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `two_factor_secret` text DEFAULT NULL,
  `two_factor_recovery_codes` text DEFAULT NULL,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `faculty_id`, `name`, `phone`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(35218, 3, NULL, 'anhthinh', 809043112, 'anhthinh@gmail.com', NULL, '$2y$12$3UrYekuM0KD6qnXcbga2sOr81au8LV7GH43RXu6hBE2POeK7/.G52', NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-14 10:23:47', '2024-10-14 10:23:47'),
(297668, 2, 2, 'anhtri', 789009809, 'anhtri@gmail.com', NULL, '$2y$12$nmKjJzzTnCWXopaxphuFxeFpTmTnEavIkzV2vB2W/TgwUtwz3tsmS', NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-14 10:21:13', '2024-10-14 10:21:13'),
(316907, 1, NULL, 'anhthuan', 897890890, 'Anhthuan12345@gmail.com', NULL, '$2y$12$ifyVHifbEogJIlrATBpQ/uVs7jkrBnfVyj4X.BY1gW7rZjAMNUvEe', NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-05 09:07:31', '2024-10-14 10:20:03'),
(543848, 2, 1, 'anhquan', 897089008, 'anhquan@gmail.com', NULL, '$2y$12$eyoBd8I0.PKTIie5BLTQk.PYLxW8dtId0ojeqwM/QjY18Q72tY2nu', NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-14 10:20:45', '2024-10-14 10:20:45'),
(577694, 4, 1, 'anhkiet', 567890132, 'anhkiet@gmailcom', NULL, '$2y$12$B0qTIhP7kD1J5QYAPKXiGuaE9LqXI43C0QkTavVPfZVcN1C2cJj92', NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-14 10:21:54', '2024-10-14 10:21:54'),
(782767, 4, 2, 'anhtai', 687908900, 'anhtai@gmail.com', NULL, '$2y$12$ggKRDsQYlNSiDWcjLR8.tOEZwWR7.svkKQnm469KhoeIbEJRnTEnS', NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-14 10:23:08', '2024-10-14 10:23:08');

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
-- Indexes for table `contributions`
--
ALTER TABLE `contributions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contributions_user_id_foreign` (`user_id`),
  ADD KEY `contributions_faculty_id_foreign` (`faculty_id`),
  ADD KEY `contributions_semester_id_foreign` (`semester_id`);

--
-- Indexes for table `faculties`
--
ALTER TABLE `faculties`
  ADD PRIMARY KEY (`id`),
  ADD KEY `faculties_semester_id_foreign` (`semester_id`);

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
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_permission`
--
ALTER TABLE `role_permission`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_permission_role_id_foreign` (`role_id`),
  ADD KEY `role_permission_permission_id_foreign` (`permission_id`);

--
-- Indexes for table `semesters`
--
ALTER TABLE `semesters`
  ADD PRIMARY KEY (`id`);

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
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `role_id` (`role_id`),
  ADD KEY `faculty_id` (`faculty_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contributions`
--
ALTER TABLE `contributions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `faculties`
--
ALTER TABLE `faculties`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `role_permission`
--
ALTER TABLE `role_permission`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `semesters`
--
ALTER TABLE `semesters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=990473;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `contributions`
--
ALTER TABLE `contributions`
  ADD CONSTRAINT `contributions_faculty_id_foreign` FOREIGN KEY (`faculty_id`) REFERENCES `faculties` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `contributions_semester_id_foreign` FOREIGN KEY (`semester_id`) REFERENCES `semesters` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `contributions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `faculties`
--
ALTER TABLE `faculties`
  ADD CONSTRAINT `faculties_semester_id_foreign` FOREIGN KEY (`semester_id`) REFERENCES `semesters` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_permission`
--
ALTER TABLE `role_permission`
  ADD CONSTRAINT `role_permission_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_permission_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`),
  ADD CONSTRAINT `users_ibfk_2` FOREIGN KEY (`faculty_id`) REFERENCES `faculties` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
