-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- ホスト: 127.0.0.1
-- 生成日時: 2023-10-11 11:46:20
-- サーバのバージョン： 10.4.28-MariaDB
-- PHP のバージョン: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `invoicemanager`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `companies`
--

CREATE TABLE `companies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `phone` varchar(191) NOT NULL,
  `fax` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `address1` varchar(191) NOT NULL,
  `address2` varchar(191) NOT NULL,
  `profile` text NOT NULL,
  `logo_img_path` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- テーブルの構造 `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `company` varchar(191) NOT NULL,
  `address` varchar(191) NOT NULL,
  `phone` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- テーブルのデータのダンプ `customers`
--

INSERT INTO `customers` (`id`, `name`, `email`, `company`, `address`, `phone`, `created_at`, `updated_at`, `user_id`) VALUES
(1, 'Yoshihiko Sakuragi', 'naoh421+nfs@gmail.com', 'Nippon Food Supplies', '165 Kewdale Rd, Kewdale WA 6105, Australia', '08-9353-6444', '2022-07-05 17:05:09', '2022-07-11 07:43:15', '1'),
(2, 'Takato Yoshida', 'naoh421_nao@gmail.com', 'Nao Japanese Restaurant', '45 test street', '08 5555 5555', '2022-07-11 07:44:08', '2022-07-11 07:44:08', '3'),
(3, 'John Lennon', 'naoh421+john@gmail.com', 'Beatles', '1 Abby Road', '012-325-854', '2023-03-01 07:40:17', '2023-03-01 07:40:17', '1');

-- --------------------------------------------------------

--
-- テーブルの構造 `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- テーブルの構造 `invoices`
--

CREATE TABLE `invoices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_name` varchar(191) NOT NULL,
  `customer_mail` varchar(191) NOT NULL,
  `company` varchar(191) NOT NULL,
  `address` varchar(191) NOT NULL,
  `item` varchar(191) NOT NULL,
  `product_name` varchar(191) NOT NULL,
  `price` varchar(191) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total` varchar(191) NOT NULL,
  `payment` varchar(191) NOT NULL,
  `due` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- テーブルのデータのダンプ `invoices`
--

INSERT INTO `invoices` (`id`, `customer_name`, `customer_mail`, `company`, `address`, `item`, `product_name`, `price`, `quantity`, `total`, `payment`, `due`, `created_at`, `updated_at`, `user_id`) VALUES
(1, 'Yoshihiko Sakuragi', 'naoh421+nfs@gmail.com', 'Nippon Food Supplies', '165 Kewdale Rd, Kewdale WA 6105, Australia', 'Web', 'Web Management', '270', 1, '270', '0', '270', '2022-07-05 17:30:51', '2022-07-05 17:30:51', '1'),
(13, 'Takato Yoshida', 'naoh421_nao@gmail.com', 'Nao Japanese Restaurant', '45 test street', 'Web', 'Web Management', '60', 1, '60', '0', '60', '2022-08-01 01:48:47', '2022-08-01 01:48:47', '3'),
(14, 'Yoshihiko Sakuragi', 'naoh421+nfs@gmail.com', 'Nippon Food Supplies', '165 Kewdale Rd, Kewdale WA 6105, Australia', 'Web', 'Web Management', '270', 1, '270', '0', '270', '2023-02-24 07:35:57', '2023-02-24 07:35:57', '1'),
(15, 'John Lennon', 'naoh421+john@gmail.com', 'Beatles', '1 Abby Road', 'Web', 'Web Management', '150', 1, '150', '0', '150', '2023-03-01 07:45:25', '2023-03-01 07:45:25', '1');

-- --------------------------------------------------------

--
-- テーブルの構造 `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- テーブルのデータのダンプ `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_03_13_091736_create_products_table', 1),
(5, '2021_03_17_052722_create_customers_table', 1),
(6, '2021_03_17_053202_create_orders_table', 1),
(7, '2021_03_17_053807_create_invoices_table', 1),
(8, '2022_08_03_144208_create_companies_table', 2),
(9, '2023_02_28_153250_add_user_id_to_customer_table', 3),
(10, '2023_03_01_155632_add_user_id_to_invoice_table', 4),
(11, '2023_03_02_133142_add_user_id_to_product_table', 5),
(12, '2023_03_02_161917_add_user_id_to_order_table', 6);

-- --------------------------------------------------------

--
-- テーブルの構造 `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(191) NOT NULL,
  `product_code` varchar(191) NOT NULL,
  `product_name` varchar(191) NOT NULL,
  `quantity` int(11) NOT NULL,
  `order_status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- テーブルのデータのダンプ `orders`
--

INSERT INTO `orders` (`id`, `email`, `product_code`, `product_name`, `quantity`, `order_status`, `created_at`, `updated_at`, `user_id`) VALUES
(1, 'naoh421+nfs@gmail.com', 'Web001', 'Web Management', 1, 1, '2022-07-05 17:30:51', '2023-02-24 07:35:57', '1'),
(2, 'naoh421_nao@gmail.com', 'Web001', 'Web Management', 1, 1, '2022-07-11 07:44:44', '2022-08-01 01:48:47', '2'),
(3, 'naoh421_nao@gmail.com', 'Web001', 'Web Management', 1, 1, '2022-07-11 07:49:22', '2022-08-01 01:48:47', '2'),
(4, 'naoh421_nao@gmail.com', 'Web001', 'Web Management', 1, 1, '2022-07-11 17:43:35', '2022-08-01 01:48:47', '2'),
(5, 'naoh421_nao@gmail.com', 'Web001', 'Web Management', 1, 1, '2022-07-11 17:51:46', '2022-08-01 01:48:47', '2'),
(6, 'naoh421+nfs@gmail.com', 'Web001', 'Web Management', 1, 1, '2022-07-31 07:51:13', '2023-02-24 07:35:57', '1'),
(7, 'naoh421+nfs@gmail.com', 'Web001', 'Web Management', 1, 1, '2022-07-31 07:54:50', '2023-02-24 07:35:57', '1'),
(8, 'naoh421+nfs@gmail.com', 'Web001', 'Web Management', 1, 1, '2022-07-31 07:57:12', '2023-02-24 07:35:57', '1'),
(9, 'naoh421+nfs@gmail.com', 'Web001', 'Web Management', 1, 1, '2022-08-01 01:32:35', '2023-02-24 07:35:57', '1'),
(10, 'naoh421_nao@gmail.com', 'Web001', 'Web Management', 1, 1, '2022-08-01 01:33:59', '2022-08-01 01:48:47', '2'),
(11, 'naoh421_nao@gmail.com', 'Web001', 'Web Management', 1, 1, '2022-08-01 01:48:47', '2022-08-01 01:48:47', '2'),
(12, 'naoh421+nfs@gmail.com', 'Web001', 'Web Management', 1, 1, '2023-02-24 07:35:57', '2023-02-24 07:35:57', '1'),
(13, 'Lennon', 'Web001', 'Web Management', 1, 1, '2023-03-01 07:45:25', '2023-03-01 07:45:25', '1');

-- --------------------------------------------------------

--
-- テーブルの構造 `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) NOT NULL,
  `token` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- テーブルの構造 `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_code` varchar(191) NOT NULL,
  `name` varchar(191) NOT NULL,
  `category` varchar(191) NOT NULL,
  `stock` int(11) NOT NULL,
  `unit_price` varchar(191) NOT NULL,
  `sales_unit_price` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- テーブルのデータのダンプ `products`
--

INSERT INTO `products` (`id`, `product_code`, `name`, `category`, `stock`, `unit_price`, `sales_unit_price`, `created_at`, `updated_at`, `user_id`) VALUES
(1, 'Web001', 'Web Management', 'Web', 97, '100', '270', '2022-07-05 17:30:07', '2022-07-05 17:30:07', '1'),
(2, 'Web002', 'Snall Management', 'Web', 100, '150', '180', '2023-03-02 05:46:17', '2023-03-02 05:46:17', '1'),
(3, 'PC001', 'PC Repair', 'PC', 100, '0', '90', '2023-08-31 02:35:48', '2023-08-31 02:35:48', '1');

-- --------------------------------------------------------

--
-- テーブルの構造 `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- テーブルのデータのダンプ `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Masa', 'accounts@dflat.com.au', NULL, '$2y$10$KXQhBp2yQQW8TmfCVe6W2uE7L8y.auBu.OIJWYJhdLO1eeBbKxRHi', NULL, '2022-07-05 16:33:35', '2022-07-05 16:33:35'),
(2, 'Test Gmail', 'masahiro.natori421@gmail.com', NULL, '$2y$10$CUy3/7xMmoepfPU5QFn08uljC5g71iyEug7ZMojSeFDA7/5OsrIiO', NULL, '2022-08-01 06:06:12', '2022-08-01 06:06:12'),
(3, 'Masa Test', 'masa.naoh421@gmail.com', NULL, '$2y$10$HzUDrx9divK57J6iBdfgqOhMG5PdprYwH5RPLSm9QroT.ldjdBiJO', NULL, '2023-02-25 09:10:39', '2023-02-25 09:10:39');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `customers_email_unique` (`email`);

--
-- テーブルのインデックス `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- テーブルのインデックス `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- テーブルのインデックス `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_product_code_unique` (`product_code`);

--
-- テーブルのインデックス `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `companies`
--
ALTER TABLE `companies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- テーブルの AUTO_INCREMENT `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- テーブルの AUTO_INCREMENT `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- テーブルの AUTO_INCREMENT `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- テーブルの AUTO_INCREMENT `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- テーブルの AUTO_INCREMENT `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- テーブルの AUTO_INCREMENT `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- テーブルの AUTO_INCREMENT `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
