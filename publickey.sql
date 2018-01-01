-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 01, 2018 at 06:08 PM
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
-- Database: `publickey`
--

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
(1, '2017_12_21_141804_create_publickey_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `publickey`
--

CREATE TABLE `publickey` (
  `user` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `publicKey` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `publickey`
--

INSERT INTO `publickey` (`user`, `publicKey`, `created_at`, `updated_at`) VALUES
('1', 'LS0tLS1CRUdJTiBQVUJMSUMgS0VZLS0tLS0KTUV3d0RRWUpLb1pJaHZjTkFRRUJCUUFET3dBd09BSXhBTldnZlpIem9ueVcrdm1RMDBUVVdteDB4Mm5aaHN4MworQTJqK2dGZHcybHhWdFNMV0lSVjFyblY0cHdnUGJ5WVNRSURBUUFCCi0tLS0tRU5EIFBVQkxJQyBLRVktLS0tLQo=', '2017-12-22 23:04:06', '2017-12-30 06:11:05'),
('2', 'LS0tLS1CRUdJTiBQVUJMSUMgS0VZLS0tLS0KTUV3d0RRWUpLb1pJaHZjTkFRRUJCUUFET3dBd09BSXhBS3prUFI4RldRWGVURENSam96bU5YZUlOcE90L29nYQoydzVGLzN6eXNQeklWcnJmN3lVU1ROYlZ1NG5zZnlMbGd3SURBUUFCCi0tLS0tRU5EIFBVQkxJQyBLRVktLS0tLQo=', '2017-12-23 00:37:33', '2017-12-27 23:21:03'),
('3', 'LS0tLS1CRUdJTiBQVUJMSUMgS0VZLS0tLS0KTUV3d0RRWUpLb1pJaHZjTkFRRUJCUUFET3dBd09BSXhBSzNZR1VZb3pxZkQ4YzZhM1JOTllxS2oyTWVuaUZpUwpEVEt0NlAxR0FWQnp4bG53WFB2bzQwUmJIZGZjekVrQTFRSURBUUFCCi0tLS0tRU5EIFBVQkxJQyBLRVktLS0tLQo=', '2017-12-25 00:58:24', '2017-12-28 01:35:13'),
('4', 'LS0tLS1CRUdJTiBQVUJMSUMgS0VZLS0tLS0KTUZ3d0RRWUpLb1pJaHZjTkFRRUJCUUFEU3dBd1NBSkJBS3NJMTc3bzZZdTRUSThOQmdrc1Q4QVFKdGFpcFNNaAphVlkzbmo2RzJwajNLMlFoamJ1SCtpWEFZVFRqWkZ0bzl6ZENyMTdYYlYrekFlNWFnT285UGNrQ0F3RUFBUT09Ci0tLS0tRU5EIFBVQkxJQyBLRVktLS0tLQo=', '2017-12-27 05:39:01', '2017-12-30 01:57:26'),
('5', 'LS0tLS1CRUdJTiBQVUJMSUMgS0VZLS0tLS0KTUV3d0RRWUpLb1pJaHZjTkFRRUJCUUFET3dBd09BSXhBS1lBZm9VZHNXajlTNlNCd2FHOU0zVGV2TU9uRmJCRApOZlJ3MGwwM0dhMVdWNVhwU0VmTmEvV25rT3JyVWtpazN3SURBUUFCCi0tLS0tRU5EIFBVQkxJQyBLRVktLS0tLQo=', '2017-12-27 23:18:06', '2017-12-27 23:18:06');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `publickey`
--
ALTER TABLE `publickey`
  ADD PRIMARY KEY (`user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
