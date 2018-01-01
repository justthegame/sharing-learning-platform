-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 01, 2018 at 02:13 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `news`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `remark` text COLLATE utf8mb4_unicode_ci,
  `user_record` int(10) UNSIGNED NOT NULL,
  `user_modified` int(10) UNSIGNED DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `title`, `content`, `remark`, `user_record`, `user_modified`, `status`, `category_id`, `created_at`, `updated_at`) VALUES
(2, 'Coba title', 'ini content admin', NULL, 1, NULL, 'In Review', 1, '2017-12-25 06:41:25', '2017-12-25 06:41:25'),
(3, 'Coba title', 'ini yang kedua kalinya', NULL, 2, NULL, 'In Review', 1, '2017-12-25 07:00:09', '2017-12-25 07:00:09'),
(4, 'Coba title', 'ini yang kedua kalinya', NULL, 3, NULL, 'In Review', 1, '2017-12-25 07:03:55', '2017-12-25 07:03:55'),
(5, 'Coba title', 'ini keempat kalinnya', NULL, 2, 2, 'In Review', 1, '2017-12-25 07:16:24', '2017-12-27 07:45:22'),
(6, 'Coba title 2', 'ini baru 2', NULL, 3, 3, 'In Review', 1, '2017-12-26 03:44:07', '2017-12-27 07:43:18'),
(7, 'aaaa', 'Because of its distributed nature and built in cryptographic security it can act as a third party, capable of arbitrating trustlessly, and without interference from outside parties. Through the use of cryptocurrencies decisions made by software can have financial consequences for people, organisations or even other software.\r\n\r\nThis provides developers with new ways to enable interactions between parties across the Internet. While I explain the subtleties of the development of decentralized-apps I will give use cases and try my best to explain the importance of each one.', NULL, 3, 1, 'Approved', 1, '2017-12-26 03:49:17', '2017-12-28 00:06:03'),
(8, 'Coba title', 'coba post', NULL, 2, NULL, 'In Review', 1, '2017-12-26 07:49:41', '2017-12-26 07:49:41'),
(9, 'Coba title', 'coba post', NULL, 3, NULL, 'In Review', 1, '2017-12-26 07:49:56', '2017-12-26 07:49:56'),
(10, 'a', 'aaaaaaaaa', NULL, 2, NULL, 'In Review', 1, '2017-12-26 08:03:45', '2017-12-26 08:03:45'),
(11, 'abc', 'abc', NULL, 3, NULL, 'In Review', 1, '2017-12-26 08:06:02', '2017-12-26 08:06:02'),
(12, 'Iki life', 'Iki isie life', NULL, 3, NULL, 'In Review', 2, '2017-12-27 08:11:06', '2017-12-27 08:11:06'),
(13, 'Iki life', 'Iki isie life', NULL, 2, NULL, 'In Review', 2, '2017-12-27 08:11:25', '2017-12-27 08:11:25'),
(14, 'Endless Roller', 'qweqweqweqweqweqw', NULL, 2, NULL, 'In Review', 2, '2017-12-27 08:12:04', '2017-12-27 08:12:04'),
(15, 'abc', 'abc', NULL, 3, NULL, 'In Review', 1, '2017-12-27 08:12:45', '2017-12-27 08:12:45'),
(16, 'Endless Roller', 'erwqe rqwer qwer qwe rqwer qw', NULL, 2, NULL, 'In Review', 2, '2017-12-27 08:13:18', '2017-12-27 08:13:18'),
(17, 'Coba title', 'wer qwer wqer qwerqwerq', NULL, 2, NULL, 'In Review', 2, '2017-12-27 08:14:07', '2017-12-27 08:14:07'),
(18, 'Coba title', 'r qwerqwerqwe rqwer qw', NULL, 2, NULL, 'In Review', 2, '2017-12-27 08:14:27', '2017-12-27 08:14:27'),
(19, 'aaaa', '123123 sdfas', NULL, 3, 2, 'In Review', 1, '2017-12-27 08:16:00', '2017-12-27 08:17:29'),
(20, 'abc', 'abc', NULL, 3, 1, 'Approved', 1, '2017-12-27 08:17:30', '2017-12-28 00:05:53'),
(21, 'Telek', 'nelek guys', NULL, 2, 1, 'Approved', 2, '2017-12-27 08:18:08', '2017-12-28 00:05:01'),
(22, 'abc', 'abc', NULL, 3, 3, 'In Review', 1, '2017-12-30 01:27:41', '2017-12-30 01:45:37'),
(23, '123', '123', NULL, 1, NULL, 'In Review', 1, '2017-12-30 07:49:08', '2017-12-30 07:49:08'),
(24, 'Coba title', '123', NULL, 1, NULL, 'In Review', 1, '2017-12-30 07:56:56', '2017-12-30 07:56:56'),
(25, 'Coba title', '123', NULL, 1, NULL, 'In Review', 1, '2017-12-30 07:57:31', '2017-12-30 07:57:31'),
(26, 'Coba title', '123123123123123', NULL, 1, NULL, 'In Review', 1, '2017-12-30 07:59:24', '2017-12-30 07:59:24'),
(27, 'mabok', '123', NULL, 2, NULL, 'In Review', 1, '2017-12-31 23:46:00', '2017-12-31 23:46:00'),
(29, 'zxczxcz', 'zxczxcz', 'zxczxczc', 1, 1, '1', 2, NULL, NULL),
(30, 'zxczxcz', 'zxczxcz', 'zxczxczc', 1, 1, '1', 2, NULL, NULL),
(31, 'asdasdadad', 'asdasdas', 'asdsadasdas', 1, NULL, '1', 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'News', '2017-12-26 16:00:00', '2017-12-26 16:00:00'),
(2, 'Life', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2017_12_22_061104_create_categories_table', 1),
(4, '2017_12_22_071220_create_articles_table', 1),
(5, '2017_12_22_071707_create_pictures_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pictures`
--

CREATE TABLE `pictures` (
  `id` int(10) UNSIGNED NOT NULL,
  `link` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remark` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_record` int(10) UNSIGNED NOT NULL,
  `user_modified` int(10) UNSIGNED DEFAULT NULL,
  `article_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pictures`
--

INSERT INTO `pictures` (`id`, `link`, `remark`, `user_record`, `user_modified`, `article_id`, `created_at`, `updated_at`) VALUES
(2, 'uploads/2/6\\5a4236077d0124.PNG', NULL, 2, NULL, 6, '2017-12-26 03:44:07', '2017-12-26 03:44:07'),
(3, 'uploads/2/7\\5a42373df29d111.PNG', NULL, 2, NULL, 7, '2017-12-26 03:49:17', '2017-12-26 03:49:17'),
(4, 'uploads/2/7\\5a42373e227dd13.PNG', NULL, 2, NULL, 7, '2017-12-26 03:49:18', '2017-12-26 03:49:18'),
(5, 'uploads/2/8\\5a426f95728931.PNG', NULL, 2, NULL, 8, '2017-12-26 07:49:41', '2017-12-26 07:49:41'),
(6, 'uploads/2/8\\5a426f9586bcc2.PNG', NULL, 2, NULL, 8, '2017-12-26 07:49:41', '2017-12-26 07:49:41'),
(7, 'uploads/2/9\\5a426fa4eb5571.PNG', NULL, 2, NULL, 9, '2017-12-26 07:49:56', '2017-12-26 07:49:56'),
(8, 'uploads/2/9\\5a426fa503acb2.PNG', NULL, 2, NULL, 9, '2017-12-26 07:49:57', '2017-12-26 07:49:57'),
(9, 'uploads/2/10\\5a4272e16648b1472958684364.jpg', NULL, 2, NULL, 10, '2017-12-26 08:03:45', '2017-12-26 08:03:45'),
(10, 'uploads/2/6\\5a423607743d99.PNG', NULL, 3, NULL, 11, '2017-12-26 08:06:02', '2017-12-26 08:06:02'),
(11, 'uploads/2/7\\5a42373df29d111.PNG', NULL, 3, NULL, 11, '2017-12-26 08:06:02', '2017-12-26 08:06:02'),
(12, 'uploads/3/6\\5a43bf96c5ae8getbook_raw.PNG', NULL, 3, NULL, 6, '2017-12-27 07:43:18', '2017-12-27 07:43:18'),
(14, 'uploads/2/5\\5a43c0129451a31b.PNG', NULL, 2, NULL, 5, '2017-12-27 07:45:22', '2017-12-27 07:45:22'),
(15, 'uploads/2/5\\5a43c0208632e4.PNG', NULL, 2, NULL, 5, '2017-12-27 07:45:36', '2017-12-27 07:45:36'),
(16, 'uploads/2/5\\5a43c0209442b13.PNG', NULL, 2, NULL, 5, '2017-12-27 07:45:36', '2017-12-27 07:45:36'),
(17, 'uploads/2/12\\5a43c61a599cb31b.PNG', NULL, 2, NULL, 12, '2017-12-27 08:11:06', '2017-12-27 08:11:06'),
(18, 'uploads/2/12\\5a43c61a6bb594.PNG', NULL, 2, NULL, 12, '2017-12-27 08:11:06', '2017-12-27 08:11:06'),
(19, 'uploads/2/13\\5a43c62d47a2a31b.PNG', NULL, 2, NULL, 13, '2017-12-27 08:11:25', '2017-12-27 08:11:25'),
(20, 'uploads/2/13\\5a43c62d4e2174.PNG', NULL, 2, NULL, 13, '2017-12-27 08:11:25', '2017-12-27 08:11:25'),
(21, 'uploads/2/14\\5a43c6545b6ca17.PNG', NULL, 2, NULL, 14, '2017-12-27 08:12:04', '2017-12-27 08:12:04'),
(22, 'uploads/3/15\\5a43c67d44619getuser_raw.PNG', NULL, 3, NULL, 15, '2017-12-27 08:12:45', '2017-12-27 08:12:45'),
(23, 'uploads/2/16\\5a43c69e93ad71.PNG', NULL, 2, NULL, 16, '2017-12-27 08:13:18', '2017-12-27 08:13:18'),
(24, 'uploads/2/18\\5a43c6e30a48d11.PNG', NULL, 2, NULL, 18, '2017-12-27 08:14:27', '2017-12-27 08:14:27'),
(25, 'uploads/2/18\\5a43c6e31c64214.PNG', NULL, 2, NULL, 18, '2017-12-27 08:14:27', '2017-12-27 08:14:27'),
(26, 'uploads/2/19\\5a43c740f156f17.PNG', NULL, 2, NULL, 19, '2017-12-27 08:16:00', '2017-12-27 08:16:00'),
(27, 'uploads/2/19\\5a43c74108ba24.PNG', NULL, 2, NULL, 19, '2017-12-27 08:16:01', '2017-12-27 08:16:01'),
(28, 'uploads/3/20\\5a43c79b03b90getuser_raw.PNG', NULL, 3, NULL, 20, '2017-12-27 08:17:31', '2017-12-27 08:17:31'),
(29, 'uploads/3/20\\5a43c79b15582getbook_raw.PNG', NULL, 3, NULL, 20, '2017-12-27 08:17:31', '2017-12-27 08:17:31'),
(30, 'uploads/2/21\\5a43c7c0d7b6631a.PNG', NULL, 2, NULL, 21, '2017-12-27 08:18:08', '2017-12-27 08:18:08'),
(31, 'uploads/2/27\\5a49e7388b58e5a49e73824009Capture.PNG', NULL, 2, NULL, 27, '2017-12-31 23:46:00', '2017-12-31 23:46:00'),
(32, 'uploads/2/27\\5a49e738adf1b5a49e738246f41472958684364.jpg', NULL, 2, NULL, 27, '2017-12-31 23:46:00', '2017-12-31 23:46:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `articles_category_id_foreign` (`category_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `pictures`
--
ALTER TABLE `pictures`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pictures_article_id_foreign` (`article_id`);

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
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pictures`
--
ALTER TABLE `pictures`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `articles_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `pictures`
--
ALTER TABLE `pictures`
  ADD CONSTRAINT `pictures_article_id_foreign` FOREIGN KEY (`article_id`) REFERENCES `articles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
