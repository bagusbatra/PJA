-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 18, 2024 at 04:15 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pja`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `produk_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp(),
  `additional_options` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `produk_id`, `quantity`, `date_added`, `additional_options`, `created_at`, `updated_at`) VALUES
(1, 2, 19770117, 8, '2024-03-16 03:17:50', NULL, '2024-03-15 20:17:50', '2024-03-15 21:49:12'),
(3, 2, 11, 28, '2024-03-17 03:40:14', NULL, '2024-03-16 20:40:14', '2024-03-17 05:22:15'),
(4, 1, 11, 2, '2024-03-17 03:44:25', NULL, '2024-03-16 20:44:25', '2024-03-16 23:45:47');

-- --------------------------------------------------------

--
-- Table structure for table `detailuser`
--

CREATE TABLE `detailuser` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `nama_pemesan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_instansi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telepon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_pos` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `detailuser`
--

INSERT INTO `detailuser` (`id`, `user_id`, `nama_pemesan`, `nama_instansi`, `email`, `telepon`, `alamat`, `kode_pos`, `created_at`, `updated_at`) VALUES
(60, 2, 'qqqqqqqqqqqqqqqqqqq', 'qqqqqqqqqqqqqqqqqqqqqq', 'hamedayani@gmail.com', '088228272679', 'Dsn. Cangkringan Ds. Kedung Sugo RT3 RW3', '61264', '2024-03-17 08:13:30', '2024-03-17 08:13:30'),
(61, 2, 'abv', 'a', 'admin@riaspedia.com', '088228272679', 'Dsn. Cangkringan Ds. Kedung Sugo RT3 RW3', '61264', '2024-03-17 08:21:54', '2024-03-17 08:21:54'),
(62, 2, 'abv', 'a', 'admin@riaspedia.com', '088228272679', 'Dsn. Cangkringan Ds. Kedung Sugo RT3 RW3', '61264', '2024-03-17 08:27:25', '2024-03-17 08:27:25'),
(63, 2, 'abv', 'a', 'admin@riaspedia.com', '088228272679', 'Dsn. Cangkringan Ds. Kedung Sugo RT3 RW3', '61264', '2024-03-17 08:28:09', '2024-03-17 08:28:09'),
(64, 2, 'abv', 'a', 'admin@riaspedia.com', '088228272679', 'Dsn. Cangkringan Ds. Kedung Sugo RT3 RW3', '61264', '2024-03-17 08:28:24', '2024-03-17 08:28:24'),
(65, 2, 'abv', 'a', 'admin@riaspedia.com', '088228272679', 'Dsn. Cangkringan Ds. Kedung Sugo RT3 RW3', '61264', '2024-03-17 08:29:08', '2024-03-17 08:29:08'),
(66, 2, 'abv', 'a', 'admin@riaspedia.com', '088228272679', 'Dsn. Cangkringan Ds. Kedung Sugo RT3 RW3', '61264', '2024-03-17 08:29:21', '2024-03-17 08:29:21'),
(67, 2, 'abv', 'a', 'admin@riaspedia.com', '088228272679', 'Dsn. Cangkringan Ds. Kedung Sugo RT3 RW3', '61264', '2024-03-17 08:30:57', '2024-03-17 08:30:57');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(4, '2024_02_26_020555_create_produk_table', 1),
(5, '2024_03_04_133845_create_users_table', 1),
(6, '2024_03_15_061450_create_cart_table', 1),
(7, '2024_03_17_033746_create_order_table', 2),
(8, '2024_03_17_043123_create_detailuser_table', 3),
(9, '2024_03_17_053840_create_detail_users_table', 4),
(10, '2024_03_17_134302_create_quotation_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_produk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipe_produk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(12,2) DEFAULT NULL,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `upload_pdf` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id`, `nama_produk`, `tipe_produk`, `price`, `gambar`, `keterangan`, `upload_pdf`, `created_at`, `updated_at`) VALUES
(11, 'qw', 'ss', '2000000.00', 'uploads/gambar/ly8aFzthebygIX4gGILHstHX0lUfSqMp5X2SQHno.jpg', 'qq', 'uploads/pdf/K3e24wtQEOtaz3RbU00yraNEPBRMou2mu4FEJUlR.pdf', '2024-03-16 20:40:02', '2024-03-16 20:40:02'),
(12345, 'abC', 'Saa', '450.00', 'uploads/gambar/4nlo6ZWql46AU8GGA8hsnQWanBoFqMGFRAZbj7M5.jpg', 'u', 'uploads/pdf/M7jgMlmTfUPWcSdy3Dz1TEAn5hV6gSMrO5d7QvyX.pdf', '2024-03-16 20:43:44', '2024-03-16 20:43:44'),
(19770117, 'aa', 'bb', '2000000.00', 'uploads/gambar/8zKuDqK6q3NlZRziWgk5Gkd6PbcQhYgmQBR6tze4.jpg', 'qw', 'uploads/pdf/cWd53tMllUaRdOqsxQMLS9dY64Q7GhLrRh4Es0Zo.pdf', '2024-03-15 20:15:44', '2024-03-15 20:16:24');

-- --------------------------------------------------------

--
-- Table structure for table `quotation`
--

CREATE TABLE `quotation` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `quotation`
--

INSERT INTO `quotation` (`id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 2, '2024-03-17 08:28:50', '2024-03-17 08:28:50'),
(2, 2, '2024-03-17 08:29:00', '2024-03-17 08:29:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('administrator','user') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `role`, `password`, `remember_token`, `created_at`, `updated_at`, `email_verified_at`) VALUES
(1, 'bagus', 'bagus@gmail.com', 'user', '$2y$12$vd1C1Yubdz1Jm//8v9vfBeWuVyLQn9iNXuSPN7aENEKoOtUCaBURW', NULL, '2024-03-15 20:16:51', '2024-03-15 20:16:51', NULL),
(2, 'hamed', 'hamedayani@gmail.com', 'user', '$2y$12$PesBOmQ3GFTbgy9oUXcyJ.SYV89N2S133hPZ/hjWPtsjSOyoswt7a', NULL, '2024-03-15 20:17:32', '2024-03-15 20:17:32', NULL),
(3, 'admin', 'admin@gmail.com', 'user', '$2y$12$2RFhqy600AORKYWIoxZ9xOR1jmeqsOFlfGATjiDvS.oKfl8z5/I1W', NULL, '2024-03-16 22:41:32', '2024-03-16 22:41:32', NULL),
(4, 'adi', 'adi@gmail.com', 'user', '$2y$12$waxqZqi7.aR2jvSPD6jOZ.DO2glZv0ibNa2We7GsOuH9IB/HS6RSK', NULL, '2024-03-16 22:42:13', '2024-03-16 22:42:13', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cart_user_id_foreign` (`user_id`),
  ADD KEY `cart_produk_id_foreign` (`produk_id`);

--
-- Indexes for table `detailuser`
--
ALTER TABLE `detailuser`
  ADD PRIMARY KEY (`id`),
  ADD KEY `detailuser_user_id_foreign` (`user_id`);

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
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quotation`
--
ALTER TABLE `quotation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `quotation_user_id_foreign` (`user_id`);

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
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `detailuser`
--
ALTER TABLE `detailuser`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19770118;

--
-- AUTO_INCREMENT for table `quotation`
--
ALTER TABLE `quotation`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_produk_id_foreign` FOREIGN KEY (`produk_id`) REFERENCES `produk` (`id`),
  ADD CONSTRAINT `cart_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `detailuser`
--
ALTER TABLE `detailuser`
  ADD CONSTRAINT `detailuser_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `quotation`
--
ALTER TABLE `quotation`
  ADD CONSTRAINT `quotation_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
