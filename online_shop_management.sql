-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 24, 2023 at 07:32 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `online_shop_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `product_id`, `name`, `email`, `phone`, `address`, `username`, `password`, `created_at`, `updated_at`) VALUES
(1, 1, 'Leon', 'leon@gmail.com', '01774382608', 'Bashundhara', 'leon', '12345', '2023-02-12 09:19:11', '2023-02-13 00:05:09'),
(2, 2, 'Ahasanul Islam', 'ahasanul@gmail.com', '01774382608', 'Sylhet', 'ahasanul', '12345', '2023-02-12 09:19:11', '2023-02-13 23:34:17'),
(3, NULL, 'Eiman', 'eiman@gmail.com', '01991248551', 'Chittagong', 'eiman', '12345', '2023-02-13 01:54:33', '2023-02-13 01:54:33'),
(4, NULL, 'Mohin', 'mohin@gmail.com', '01886699757', 'Chittagong', 'mohin', '12345', '2023-02-13 01:54:33', '2023-02-13 01:54:33'),
(5, NULL, 'Md. Emon', 'emon@gmail.com', '01991248551', 'Bogura', 'emon', '12345', '2023-02-19 05:21:33', '2023-02-19 05:21:33'),
(6, NULL, 'Saikot', 'saikot@gmail.com', '01886699757', 'Vola', 'saikot', '12345', '2023-02-19 05:32:33', '2023-02-19 05:32:33');

-- --------------------------------------------------------

--
-- Table structure for table `customer_products`
--

CREATE TABLE `customer_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customer_products`
--

INSERT INTO `customer_products` (`id`, `customer_id`, `product_id`, `created_at`, `updated_at`) VALUES
(15, 1, 11, '2023-02-15 06:38:23', '2023-02-15 06:38:23'),
(18, 3, 11, '2023-02-15 23:08:44', '2023-02-15 23:08:44'),
(19, 2, 12, '2023-02-15 23:10:26', '2023-02-15 23:10:26'),
(21, 2, 10, '2023-02-15 23:22:11', '2023-02-15 23:22:11'),
(28, 4, 9, '2023-02-19 02:01:48', '2023-02-19 02:01:48'),
(29, 2, 9, '2023-02-19 03:55:38', '2023-02-19 03:55:38'),
(31, 5, 14, '2023-02-19 05:22:01', '2023-02-19 05:22:01'),
(32, 6, 10, '2023-02-19 05:32:57', '2023-02-19 05:32:57'),
(34, 3, 9, '2023-02-20 02:06:49', '2023-02-20 02:06:49'),
(35, 3, 10, '2023-02-20 04:57:57', '2023-02-20 04:57:57'),
(36, 2, 14, '2023-02-20 05:12:29', '2023-02-20 05:12:29');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `image`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(2, '202302150937orange.jpg', NULL, NULL, '2023-02-15 03:37:59', '2023-02-15 03:37:59'),
(3, '202302150942banana.jpg', NULL, NULL, '2023-02-15 03:42:42', '2023-02-15 03:42:42'),
(4, '202302150948eggs.webp', NULL, NULL, '2023-02-15 03:48:29', '2023-02-15 03:48:29');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(2, '2023_02_08_125059_create_customer_lists_table', 1),
(3, '2023_02_09_082322_create_users_table', 2),
(4, '2023_02_09_093554_create_customers_table', 3),
(5, '2023_02_09_094157_add_username_to_customer_lists', 4),
(6, '2023_02_09_094440_add_password_to_customer_lists', 5),
(7, '2023_02_09_122124_create_productlists_table', 6),
(8, '2023_02_12_060939_add_productlist_id_to_customer_list', 7),
(9, '2023_02_12_062234_create_customer_products_table', 8),
(10, '2023_02_12_085909_create_customerlists_table', 9),
(11, '2023_02_12_091606_create_customers_table', 10),
(12, '2023_02_12_091701_create_products_table', 10),
(13, '2023_02_12_092724_create_customer_products_table', 11),
(14, '2023_02_12_094031_customer__product', 12),
(15, '2023_02_12_094731_customer_product', 13),
(16, '2023_02_13_053052_create_customer_products_table', 14),
(17, '2023_02_15_090743_create_images_table', 15),
(18, '2023_02_15_100008_add_image_to_products', 16),
(19, '2023_02_19_094448_add_buy_amount_to_customer_products', 17);

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `quantity`, `created_at`, `updated_at`, `image`) VALUES
(9, 'Mango', '150', '100', '2023-02-15 04:11:03', '2023-02-15 04:55:16', 'mango.jpg'),
(10, 'Pen', '5', '50', '2023-02-15 04:44:26', '2023-02-15 04:44:26', 'pen.jpg'),
(11, 'Fish', '500', '50', '2023-02-15 05:06:33', '2023-02-15 05:07:06', 'fish.jfif'),
(12, 'Banana', '30', '200', '2023-02-15 23:09:33', '2023-02-15 23:11:50', 'banana.jpg'),
(13, 'Egg', '150', '100', '2023-02-15 23:52:23', '2023-02-16 00:53:23', 'egg.jpg'),
(14, 'Poteto', '30', '500', '2023-02-16 00:50:43', '2023-02-16 00:53:31', 'poteto.webp');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `username`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Leon', 'leon@gmail.com', '01774382608', 'admin', '12345', '2023-02-09 08:25:14', '2023-02-09 08:25:14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_products`
--
ALTER TABLE `customer_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `customer_products`
--
ALTER TABLE `customer_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
