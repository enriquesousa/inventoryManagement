-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 07, 2024 at 10:52 AM
-- Server version: 10.11.6-MariaDB-0+deb12u1
-- PHP Version: 8.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventory`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Computadoras', 1, 1, NULL, '2024-03-05 15:00:52', NULL),
(2, 'Fotografía', 1, 1, NULL, '2024-03-05 15:01:08', NULL),
(3, 'Cemento', 1, 1, NULL, '2024-03-05 15:01:14', NULL),
(5, 'Televisiones', 1, 1, NULL, '2024-03-06 04:04:02', NULL),
(6, 'Teléfono Inteligente', 1, 1, NULL, '2024-03-06 04:04:31', NULL),
(7, 'Acero', 1, 1, NULL, '2024-03-06 04:04:54', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `customer_image` varchar(255) DEFAULT NULL,
  `mobile_no` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `customer_image`, `mobile_no`, `email`, `address`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Alexandro Kuhic', 'upload/customer_images/1792616658976687.jpg', '(405) 567-3575', 'fitap@mailinator.com', '3868 Nc 27 W Lillington, North Carolina(NC), 27546', 1, 1, 1, '2024-03-04 17:14:26', '2024-03-06 03:36:35'),
(2, 'Chandler Roberson', 'upload/customer_images/1792619813188577.jpg', '(951) 301-3601', 'xohus@mailinator.com', '1331 Payne Rd Rentz, Georgia(GA), 31075', 1, 1, 1, '2024-03-04 17:31:13', '2024-03-06 03:36:09'),
(3, 'Bevis Flowers', 'upload/customer_images/1792619342931056.jpg', '(478) 984-1191', 'viguza@mailinator.com', '1331 Payne Rd Rentz, Georgia(GA), 31075', 1, 1, 1, '2024-03-04 17:57:06', '2024-03-06 03:35:48'),
(4, 'John White', 'upload/customer_images/1792619368279354.jpg', '(906) 249-5146', 'pozybylu@mailinator.com', '423 Quarry Rd Marquette, Michigan(MI), 49855', 1, 1, 1, '2024-03-04 17:57:30', '2024-03-06 03:35:24'),
(8, 'Arthur Riley', 'upload/customer_images/1792746246376608.jpg', '(410) 835-2259', 'sakivo@mailinator.com', '423 Quarry Rd Marquette, Michigan(MI), 49855', 1, 1, NULL, '2024-03-06 03:34:11', NULL),
(9, 'Jeremy Curry', 'upload/customer_images/1792746466421824.jpg', '(302) 535-8365', 'jelakiti@mailinator.com', '69 Jeffrey Dr Magnolia, Delaware(DE), 19962', 1, 1, NULL, '2024-03-06 03:37:40', NULL),
(10, 'Grant Whitfield', 'upload/customer_images/1792746547533931.jpg', '(410) 835-2259', 'soni@mailinator.com', '36405 Old Ocean City Rd #14 Willards, Maryland(MD), 21874', 1, 1, 1, '2024-03-06 03:38:42', '2024-03-06 03:38:58'),
(11, 'Kimberly Taylor', 'upload/customer_images/1792746610754363.jpg', '(410) 835-2259', 'hudosyb@mailinator.com', '36405 Old Ocean City Rd #14 Willards, Maryland(MD), 21874', 1, 1, NULL, '2024-03-06 03:39:58', NULL),
(12, 'Buffy Collier', 'upload/customer_images/1792746666762974.jpg', '(910) 893-4045', 'jefoninebi@mailinator.com', '3868 Nc 27 W Lillington, North Carolina(NC), 27546', 1, 1, NULL, '2024-03-06 03:40:51', NULL),
(13, 'Stephanie Blanchard', 'upload/customer_images/1792746728360670.jpg', '(410) 835-2259', 'ponini@mailinator.com', '36405 Old Ocean City Rd #14 Willards, Maryland(MD), 21874', 1, 1, NULL, '2024-03-06 03:41:50', NULL);

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
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_03_02_103306_create_suppliers_table', 2),
(6, '2024_03_04_060414_create_customers_table', 3),
(7, '2024_03_04_152545_create_units_table', 4),
(8, '2024_03_05_053956_create_categories_table', 5),
(9, '2024_03_05_100633_create_products_table', 6),
(10, '2024_03_06_063425_create_purchases_table', 7);

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
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `unit_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `quantity` double NOT NULL DEFAULT 0,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `supplier_id`, `unit_id`, `category_id`, `name`, `quantity`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(4, 10, 5, 7, 'Lámina Acanalada R-100/35', 0, 1, 1, NULL, '2024-03-06 04:09:29', NULL),
(5, 10, 5, 7, 'Lámina antiderrapante fundida calibre 1/4\"', 0, 1, 1, NULL, '2024-03-06 04:10:10', NULL),
(6, 10, 5, 7, 'Lámina galvanizada y pintada', 0, 1, 1, NULL, '2024-03-06 04:10:57', NULL),
(7, 17, 5, 6, 'Smartphone Samsung Galaxy A24 128 GB Negro Desbloqueado', 0, 1, 1, NULL, '2024-03-06 04:12:44', NULL),
(8, 15, 5, 6, 'Smartphone Samsung Galaxy A05 Plateado 64GB Desbloqueado', 0, 1, 1, NULL, '2024-03-06 04:13:21', NULL),
(9, 17, 5, 6, 'Celular SAMSUNG Galaxy A15 4G 6GB 128GB 6.5\" FHD+ 90 Hz 50MP Blue Black', 0, 1, 1, NULL, '2024-03-06 04:13:52', NULL),
(10, 16, 5, 5, 'TV Samsung 75 Pulgadas 4K Ultra HD Smart TV LED UN75CU7000FXZX', 0, 1, 1, 1, '2024-03-06 04:14:41', '2024-03-06 17:25:18'),
(11, 14, 5, 5, 'TV Hisense 50 Pulgadas Ultra HD 4K 50A65KV', 0, 1, 1, NULL, '2024-03-06 04:15:09', NULL),
(12, 13, 5, 5, 'TV LG 65 pulgadas 4K Ultra HD Smart TV LED 65UR7800PSB', 0, 1, 1, NULL, '2024-03-06 04:15:39', NULL),
(13, 12, 1, 3, 'CEMENTO PORTLAND GRIS 50 KG', 0, 1, 1, NULL, '2024-03-06 04:22:33', NULL),
(14, 12, 1, 3, 'CEMENTO IMPERCEM GRIS CEMEX 50 KG', 0, 1, 1, NULL, '2024-03-06 04:23:20', NULL),
(15, 12, 1, 3, 'CEMENTO PORTLAND BLANCO 50 KG', 0, 1, 1, NULL, '2024-03-06 04:23:55', NULL),
(16, 11, 5, 2, 'Cámara Mirrorless Canon EOS R50 RF-S 18-45mm F4.5-6.3 IS STM', 0, 1, 1, NULL, '2024-03-06 04:25:26', NULL),
(17, 11, 5, 2, 'Cámara Fotográfica Canon EOS Rebel T7 más Lente EF-S18-55mm', 0, 1, 1, NULL, '2024-03-06 04:25:53', NULL),
(18, 11, 5, 2, 'Cámara Instantánea FUJIFILM INSTAX MINI 12 Rosa (Blossom Pink) instax mini 12', 0, 1, 1, NULL, '2024-03-06 04:26:23', NULL),
(19, 16, 5, 1, 'MacBook Air Apple MGN63LA/A M1 8GB RAM 256GB SSD', 0, 1, 1, NULL, '2024-03-06 04:27:12', NULL),
(20, 16, 5, 1, 'Laptop HP 15-fd0000la Intel Core i3 8 Núcleos 8GB RAM 512GB SSD Azul', 0, 1, 1, NULL, '2024-03-06 04:27:53', NULL),
(21, 16, 5, 1, 'Laptop Lenovo IdeaPad IP Slim3 15AMN8 R5 8 GB RAM 512 GB SSD Azul', 0, 1, 1, NULL, '2024-03-06 04:28:23', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `purchases`
--

CREATE TABLE `purchases` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `purchase_no` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `buying_qty` double NOT NULL,
  `unit_price` double NOT NULL,
  `buying_price` double NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0=Pending, 1=Approved',
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `mobile_no` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `name`, `mobile_no`, `email`, `address`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(8, 'VavElpida', '(630) 257-8189', 'vavelpida@gmail.com', '721 Warner Ave Lemont, Illinois(IL), 60439', 1, 1, NULL, '2024-03-05 21:26:37', NULL),
(9, 'Earnings Erika', '(515) 795-2193', 'zogywu@mailinator.com', '304 N Locust St #15 Madrid, Iowa(IA), 50156', 1, 1, NULL, '2024-03-06 03:58:24', NULL),
(10, 'Atlas Jordi', '(410) 647-1324', 'deturoryca@mailinator.com', '561 Sunset Knoll Rd Pasadena, Maryland(MD), 21122', 1, 1, NULL, '2024-03-06 03:58:57', NULL),
(11, 'Jeanne Metro', '(361) 226-1706', 'danefexax@mailinator.com', '206 W Lott Ave Aransas Pass, Texas(TX), 78336', 1, 1, NULL, '2024-03-06 03:59:40', NULL),
(12, 'Cameron Depot', '(515) 832-1953', 'cameron_venue@gmail.com', '206 W Lott Ave Aransas Pass, Texas(TX), 78336', 1, 1, 1, '2024-03-06 04:00:22', '2024-03-06 04:24:22'),
(13, 'Marinda Thread', '(803) 232-1906', 'marinda_thread@theard.com', '4 Lombardy St Warrenville, South Carolina(SC), 29851', 1, 1, NULL, '2024-03-06 04:00:55', NULL),
(14, 'Love Cassesso', '(407) 884-8771', 'love_cassesso@love.com', '752 Parkside Pointe Blvd Apopka, Florida(FL), 32712', 1, 1, NULL, '2024-03-06 04:01:19', NULL),
(15, 'Cup Kasper', '(818) 754-8930', 'cup_kasper@gmail.com', '3930 Laurel Canyon Blvd Studio City, California(CA), 91604', 1, 1, NULL, '2024-03-06 04:01:48', NULL),
(16, 'Fieldswop', '(302) 535-8365', 'fieldswop@wop.com', '69 Jeffrey Dr Magnolia, Delaware(DE), 19962', 1, 1, NULL, '2024-03-06 04:02:13', NULL),
(17, 'ErEckwortzel', '(910) 893-4045', 'erEckwortzel@gmail.com', '69 Jeffrey Dr Magnolia, Delaware(DE), 19962', 1, 1, NULL, '2024-03-06 04:02:40', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`id`, `name`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Kg', 1, 1, 1, '2024-03-05 00:06:48', '2024-03-05 00:19:17'),
(2, 'Gr', 1, 1, 1, '2024-03-05 00:06:58', '2024-03-05 00:19:13'),
(3, 'Litros', 1, 1, 1, '2024-03-05 00:07:26', '2024-03-05 00:19:21'),
(5, 'Piezas', 1, 1, NULL, '2024-03-05 19:41:05', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `profile_image` varchar(255) DEFAULT NULL,
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

INSERT INTO `users` (`id`, `name`, `username`, `profile_image`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Enrique', 'Enrique', '20240213172015.jpg', 'enrique.sousa@gmail.com', '2024-02-12 10:49:20', '$2y$12$tGrSLmZBWexHYoFQgy/Ddu8JB5GytYgQn2GEYYazAvOTb9wHLzpiS', 'yXv9olD70vgduP6eQSCrnlpNcfpTjzWgQt2xrPFy7XV9ttgcEeCExyvZdTXQ', '2024-02-12 06:25:21', '2024-02-14 18:06:55'),
(2, 'Demo', 'demo', NULL, 'demo@gmail.com', NULL, '$2y$12$rT8WD7pnIOP3GgHQd1ZOmOA8aVqYHr1xcVWJX78wIPPHOOUjMb6PC', NULL, '2024-02-12 08:17:39', '2024-02-12 08:17:39'),
(3, 'Demo2', 'demo2', NULL, 'demo2@gmail.com', '2024-02-12 11:28:59', '$2y$12$Q12xGpPypCNeLTz/snaZW.I/hj8BS9KnV/vaJEQx4NRJB0AgTwq9q', NULL, '2024-02-12 11:28:47', '2024-02-12 11:28:59'),
(4, 'Test Nombre', 'test', NULL, 'test@gmail.com', '2024-02-13 05:11:28', '$2y$12$AzePxfA7NjLXSlYbJwUBc.Tgpbyz0i6o2Qi3XKbg1/HU7BnNmXNlG', 'VoAveRkAr3KBhpMl4Pl8C7chJEaMuTWemZPAiJ4qgb69Q9nkT1WvHS1P2Xkq', '2024-02-13 05:10:41', '2024-02-13 05:11:28');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

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
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `purchases`
--
ALTER TABLE `purchases`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
