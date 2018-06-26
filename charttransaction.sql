-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 26, 2018 at 08:42 AM
-- Server version: 5.6.39
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fidem_transactionschart`
--

-- --------------------------------------------------------

--
-- Table structure for table `charts`
--

CREATE TABLE `charts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `charts`
--

INSERT INTO `charts` (`id`, `user_id`, `title`, `created_at`, `updated_at`) VALUES
(2, 0, 'Fidem22', '2018-06-21 16:33:41', '2018-06-22 17:41:54'),
(8, 0, 'new chart', '2018-06-21 14:54:11', '2018-06-21 14:54:11'),
(9, 0, 'testing', '2018-06-22 14:40:58', '2018-06-22 14:40:58'),
(10, 0, 'test 5', '2018-06-25 13:51:12', '2018-06-25 13:51:12'),
(11, 2, 'testsssssq', '2018-06-26 06:11:22', '2018-06-26 06:30:44');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(11) NOT NULL,
  `chart_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `description` varchar(255) NOT NULL,
  `price` double NOT NULL,
  `type` int(11) NOT NULL,
  `date` date NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `chart_id`, `user_id`, `description`, `price`, `type`, `date`, `created_at`, `updated_at`) VALUES
(5, 2, 0, 'asdas', 42, 0, '2018-01-05', '2018-06-21 14:51:08', '2018-06-22 14:42:33'),
(6, 2, 0, 'asdas', 4234234, 0, '2018-01-10', '2018-06-21 14:51:21', '2018-06-21 14:51:21'),
(7, 2, 0, 'sdf', 12123, 0, '2018-01-16', '2018-06-21 14:53:43', '2018-06-21 14:53:43'),
(8, 2, 0, 'asdasd', 32423, 1, '2018-01-01', '2018-06-21 14:49:51', '2018-06-21 15:06:43'),
(9, 2, 0, 'asdas', 423423, 1, '2018-01-05', '2018-06-21 14:51:08', '2018-06-21 14:51:08'),
(10, 2, 0, 'asdas', 423423, 1, '2018-01-10', '2018-06-21 14:51:21', '2018-06-21 14:51:21'),
(11, 2, 0, 'sdf', 121225, 1, '2018-01-16', '2018-06-21 14:53:43', '2018-06-21 14:53:43'),
(12, 2, 0, 'asdas copy', 4234234, 0, '2018-01-11', '2018-06-21 14:51:21', '2018-06-21 14:51:21'),
(13, 9, 0, 'description by Jesse', 5, 0, '2018-06-22', '2018-06-22 14:41:46', '2018-06-22 14:41:46'),
(14, 2, 0, 'qwerty', 1, 0, '2018-06-22', '2018-06-22 17:43:47', '2018-06-22 17:43:47'),
(16, 11, 2, 'sdfsdfsdfsdf', 222222, 0, '2018-01-01', '2018-06-26 06:35:17', '2018-06-26 06:35:17');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'vigenshakaryan', 'vigenshakaryan@gmail.com', '$2y$10$o1uMU9LizfAZHiTwJxKYP.k2FHo2t0sNV5gnexsbbb8TFGDWJgq56', 'uVS25W79EZ3ktNx1jHYtQQs6VLryoP9eFY4VfdeKmo5MBawZbYJFzf41qAuR', '2018-06-21 07:31:26', '2018-06-21 07:31:26'),
(2, 'John', 'johndoe@gmail.com', '$2y$10$bq8hMNEEgEum1ZPtjPB2PevJKG5kGNUqHYFcUbUsBGxhrmqvGF66S', '5hyEA7sRlyjXYuJJviFTQBXay4s9FPebqKbPP4xW6cTmCH8tmUlB6vLQhyzZ', '2018-06-21 11:05:00', '2018-06-21 11:05:00'),
(3, 'test', 'test@gmail.com', '$2y$10$MxgDenggs1oc2VSevN/5neavB/tPbFUAyHYcWUKmDlyfYeVKKPMMK', '4L9SW6AkX4jb2kabpzaqenCsqIdxrSurWNqwfNFINQQM2veQsULIQAUThHc8', '2018-06-26 04:05:31', '2018-06-26 04:05:31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `charts`
--
ALTER TABLE `charts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `chart_id` (`chart_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `charts`
--
ALTER TABLE `charts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
