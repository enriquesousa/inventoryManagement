-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 15, 2024 at 08:46 AM
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
(15, 'Ancle Jhony', NULL, '(910) 893-4029', 'anclejhony@gmail.com', NULL, 1, NULL, NULL, '2024-03-13 16:12:24', '2024-03-13 16:12:24'),
(16, 'Test', NULL, '(910) 893-4055', 'test@test.com', NULL, 1, NULL, NULL, '2024-03-14 01:56:38', '2024-03-14 01:56:38');

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
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `invoice_no` varchar(255) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `description` text DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0=Pending, 1=Approved',
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`id`, `invoice_no`, `date`, `description`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(8, '0001', '2024-03-13', 'Computadoras -  MacBook... , Fotografía -  Cámara ... ,', 0, 1, NULL, '2024-03-13 16:12:24', '2024-03-13 16:12:24'),
(9, '0002', '2024-03-13', 'Televisiones -  TV Sams... , Teléfono Inteligente - Seleccio... , Teléfono Inteligente -  Smartph... ,', 0, 1, NULL, '2024-03-13 16:16:21', '2024-03-13 16:16:21'),
(10, '0003', '2024-03-13', 'Teléfono Inteligente -  Smartph... , Teléfono Inteligente -  Celular... ,', 0, 1, NULL, '2024-03-14 01:05:48', '2024-03-14 01:05:48'),
(11, '0004', '2024-03-13', 'Cemento -  CEMENTO... , Cemento -  CEMENTO... , Cemento -  CEMENTO... ,', 0, 1, NULL, '2024-03-14 01:51:38', '2024-03-14 01:51:38');

-- --------------------------------------------------------

--
-- Table structure for table `invoice_details`
--

CREATE TABLE `invoice_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` date DEFAULT NULL,
  `invoice_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `selling_qty` double DEFAULT NULL,
  `unit_price` double DEFAULT NULL,
  `selling_price` double DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `invoice_details`
--

INSERT INTO `invoice_details` (`id`, `date`, `invoice_id`, `category_id`, `product_id`, `selling_qty`, `unit_price`, `selling_price`, `status`, `created_at`, `updated_at`) VALUES
(1, '2024-03-12', 1, 3, 13, 3, 400, 1200, 1, '2024-03-13 03:11:35', '2024-03-13 03:11:35'),
(2, '2024-03-12', 1, 3, 14, 4, 500, 2000, 1, '2024-03-13 03:11:35', '2024-03-13 03:11:35'),
(3, '2024-03-12', 1, 3, 15, 5, 650, 3250, 1, '2024-03-13 03:11:35', '2024-03-13 03:11:35'),
(4, '2024-03-12', 2, 1, 19, 2, 500, 1000, 1, '2024-03-13 03:20:22', '2024-03-13 03:20:22'),
(5, '2024-03-12', 3, 5, 10, 1, 15600, 15600, 1, '2024-03-13 03:27:25', '2024-03-13 03:27:25'),
(6, '2024-03-13', 4, 2, 16, 2, 15200, 30400, 1, '2024-03-13 15:06:28', '2024-03-13 15:06:28'),
(7, '2024-03-13', 4, 2, 17, 1, 16422, 16422, 1, '2024-03-13 15:06:28', '2024-03-13 15:06:28'),
(8, '2024-03-13', 5, 5, 11, 1, 19600, 19600, 1, '2024-03-13 15:33:36', '2024-03-13 15:33:36'),
(9, '2024-03-13', 6, 1, 19, 1, 15789, 15789, 1, '2024-03-13 15:58:22', '2024-03-13 15:58:22'),
(10, '2024-03-13', 6, 2, 16, 2, 8560, 17120, 1, '2024-03-13 15:58:22', '2024-03-13 15:58:22'),
(11, '2024-03-13', 7, 1, 19, 1, 14800, 14800, 1, '2024-03-13 16:05:34', '2024-03-13 16:05:34'),
(12, '2024-03-13', 7, 2, 17, 1, 15800, 15800, 1, '2024-03-13 16:05:34', '2024-03-13 16:05:34'),
(13, '2024-03-13', 8, 1, 19, 1, 15800, 15800, 1, '2024-03-13 16:12:24', '2024-03-13 16:12:24'),
(14, '2024-03-13', 8, 2, 17, 1, 8500, 8500, 1, '2024-03-13 16:12:24', '2024-03-13 16:12:24'),
(15, '2024-03-13', 9, 5, 10, 1, 12600, 12600, 1, '2024-03-13 16:16:21', '2024-03-13 16:16:21'),
(16, '2024-03-13', 9, 6, 8, 2, 6500, 13000, 1, '2024-03-13 16:16:21', '2024-03-13 16:16:21'),
(17, '2024-03-13', 10, 6, 7, 2, 4600, 9200, 1, '2024-03-14 01:05:48', '2024-03-14 01:05:48'),
(18, '2024-03-13', 10, 6, 9, 2, 3600, 7200, 1, '2024-03-14 01:05:48', '2024-03-14 01:05:48'),
(19, '2024-03-13', 11, 3, 13, 5, 450, 2250, 1, '2024-03-14 01:51:38', '2024-03-14 01:51:38'),
(20, '2024-03-13', 11, 3, 14, 3, 500, 1500, 1, '2024-03-14 01:51:38', '2024-03-14 01:51:38'),
(21, '2024-03-13', 11, 3, 15, 2, 600, 1200, 1, '2024-03-14 01:51:38', '2024-03-14 01:51:38');

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
(10, '2024_03_06_063425_create_purchases_table', 7),
(11, '2024_03_10_100222_create_invoices_table', 8),
(12, '2024_03_10_100440_create_invoice_details_table', 8),
(13, '2024_03_10_100602_create_payments_table', 8),
(14, '2024_03_10_100709_create_payment_details_table', 8);

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
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `invoice_id` int(11) DEFAULT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `paid_status` varchar(51) DEFAULT NULL,
  `paid_amount` double DEFAULT NULL,
  `due_amount` double DEFAULT NULL,
  `total_amount` double DEFAULT NULL,
  `discount_amount` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `invoice_id`, `customer_id`, `paid_status`, `paid_amount`, `due_amount`, `total_amount`, `discount_amount`, `created_at`, `updated_at`) VALUES
(8, 8, 15, 'partial_paid', 23000, 700, 23700, 600, '2024-03-13 16:12:24', '2024-03-13 16:12:24'),
(9, 9, 1, 'partial_paid', 24500, 500, 25000, 600, '2024-03-13 16:16:21', '2024-03-13 16:16:21'),
(10, 10, 11, 'partial_paid', 15000, 900, 15900, 500, '2024-03-14 01:05:48', '2024-03-14 01:05:48'),
(11, 11, 4, 'partial_paid', 4000, 850, 4850, 100, '2024-03-14 01:51:38', '2024-03-14 01:51:38');

-- --------------------------------------------------------

--
-- Table structure for table `payment_details`
--

CREATE TABLE `payment_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `invoice_id` int(11) DEFAULT NULL,
  `current_paid_amount` double DEFAULT NULL,
  `date` date DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payment_details`
--

INSERT INTO `payment_details` (`id`, `invoice_id`, `current_paid_amount`, `date`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 1, 6000, '2024-03-12', NULL, '2024-03-13 03:11:35', '2024-03-13 03:11:35'),
(2, 2, 500, '2024-03-12', NULL, '2024-03-13 03:20:22', '2024-03-13 03:20:22'),
(3, 3, 15000, '2024-03-12', NULL, '2024-03-13 03:27:25', '2024-03-13 03:27:25'),
(4, 4, 40000, '2024-03-13', NULL, '2024-03-13 15:06:28', '2024-03-13 15:06:28'),
(5, 5, 19300, '2024-03-13', NULL, '2024-03-13 15:33:36', '2024-03-13 15:33:36'),
(6, 6, 32409, '2024-03-13', NULL, '2024-03-13 15:58:22', '2024-03-13 15:58:22'),
(7, 7, NULL, '2024-03-13', NULL, '2024-03-13 16:05:34', '2024-03-13 16:05:34'),
(8, 8, 23000, '2024-03-13', NULL, '2024-03-13 16:12:24', '2024-03-13 16:12:24'),
(9, 9, 24500, '2024-03-13', NULL, '2024-03-13 16:16:21', '2024-03-13 16:16:21'),
(10, 10, 15000, '2024-03-13', NULL, '2024-03-14 01:05:48', '2024-03-14 01:05:48'),
(11, 11, 4000, '2024-03-13', NULL, '2024-03-14 01:51:38', '2024-03-14 01:51:38');

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
(4, 10, 5, 7, 'Lámina Acanalada R-100/35', 10, 1, 1, NULL, '2024-03-06 04:09:29', '2024-03-11 20:38:16'),
(5, 10, 5, 7, 'Lámina antiderrapante fundida calibre 1/4\"', 10, 1, 1, NULL, '2024-03-06 04:10:10', '2024-03-11 20:38:14'),
(6, 10, 5, 7, 'Lámina galvanizada y pintada', 10, 1, 1, NULL, '2024-03-06 04:10:57', '2024-03-11 20:38:12'),
(7, 17, 5, 6, 'Smartphone Samsung Galaxy A24 128 GB Negro Desbloqueado', 8, 1, 1, NULL, '2024-03-06 04:12:44', '2024-03-11 20:16:38'),
(8, 15, 5, 6, 'Smartphone Samsung Galaxy A05 Plateado 64GB Desbloqueado', 5, 1, 1, NULL, '2024-03-06 04:13:21', '2024-03-11 21:06:03'),
(9, 17, 5, 6, 'Celular SAMSUNG Galaxy A15 4G 6GB 128GB 6.5\" FHD+ 90 Hz 50MP Blue Black', 8, 1, 1, NULL, '2024-03-06 04:13:52', '2024-03-11 20:16:35'),
(10, 16, 5, 5, 'TV Samsung 75 Pulgadas 4K Ultra HD Smart TV LED UN75CU7000FXZX', 10, 1, 1, 1, '2024-03-06 04:14:41', '2024-03-11 20:39:25'),
(11, 14, 5, 5, 'TV Hisense 50 Pulgadas Ultra HD 4K 50A65KV', 5, 1, 1, NULL, '2024-03-06 04:15:09', '2024-03-11 15:49:35'),
(12, 13, 5, 5, 'TV LG 65 pulgadas 4K Ultra HD Smart TV LED 65UR7800PSB', 10, 1, 1, NULL, '2024-03-06 04:15:39', '2024-03-11 20:44:27'),
(13, 12, 1, 3, 'CEMENTO PORTLAND GRIS 50 KG', 20, 1, 1, NULL, '2024-03-06 04:22:33', '2024-03-11 21:06:01'),
(14, 12, 1, 3, 'CEMENTO IMPERCEM GRIS CEMEX 50 KG', 12, 1, 1, NULL, '2024-03-06 04:23:20', '2024-03-11 21:05:59'),
(15, 12, 1, 3, 'CEMENTO PORTLAND BLANCO 50 KG', 0, 1, 1, NULL, '2024-03-06 04:23:55', '2024-03-11 21:05:57'),
(16, 11, 5, 2, 'Cámara Mirrorless Canon EOS R50 RF-S 18-45mm F4.5-6.3 IS STM', 10, 1, 1, NULL, '2024-03-06 04:25:26', '2024-03-11 21:05:55'),
(17, 11, 5, 2, 'Cámara Fotográfica Canon EOS Rebel T7 más Lente EF-S18-55mm', 8, 1, 1, NULL, '2024-03-06 04:25:53', '2024-03-11 21:05:53'),
(18, 11, 5, 2, 'Cámara Instantánea FUJIFILM INSTAX MINI 12 Rosa (Blossom Pink) instax mini 12', 15, 1, 1, NULL, '2024-03-06 04:26:23', '2024-03-11 21:05:51'),
(19, 16, 5, 1, 'MacBook Air Apple MGN63LA/A M1 8GB RAM 256GB SSD', 13, 1, 1, NULL, '2024-03-06 04:27:12', '2024-03-11 21:09:14'),
(20, 16, 5, 1, 'Laptop HP 15-fd0000la Intel Core i3 8 Núcleos 8GB RAM 512GB SSD Azul', 15, 1, 1, NULL, '2024-03-06 04:27:53', '2024-03-11 21:09:12'),
(21, 16, 5, 1, 'Laptop Lenovo IdeaPad IP Slim3 15AMN8 R5 8 GB RAM 512 GB SSD Azul', 15, 1, 1, NULL, '2024-03-06 04:28:23', '2024-03-11 21:09:10'),
(22, 8, 5, 2, 'Cámara Instantánea FUJIFILM INSTAX MINI 12 Rosa (Blossom Pink) instax mini 12', 11, 1, 1, NULL, '2024-03-08 19:43:07', '2024-03-11 15:47:19'),
(23, 8, 5, 5, 'TV LG 65 pulgadas 4K Ultra HD Smart TV LED 65UR7800PSB', 10, 1, 1, NULL, '2024-03-08 19:43:55', '2024-03-11 21:09:16'),
(24, 8, 5, 6, 'Celular SAMSUNG Galaxy A15 4G 6GB 128GB 6.5\" FHD+ 90 Hz 50MP Blue Black', 5, 1, 1, NULL, '2024-03-08 19:44:50', '2024-03-11 20:16:43'),
(25, 8, 5, 6, 'Smartphone Samsung Galaxy A05', 8, 1, 1, 1, '2024-03-08 19:45:19', '2024-03-11 20:16:41');

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

--
-- Dumping data for table `purchases`
--

INSERT INTO `purchases` (`id`, `supplier_id`, `category_id`, `product_id`, `purchase_no`, `date`, `description`, `buying_qty`, `unit_price`, `buying_price`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(4, 16, 1, 19, 'ES-4656', '2024-03-06', NULL, 1, 45, 45, 1, 1, NULL, '2024-03-08 02:38:21', '2024-03-11 15:49:43'),
(5, 16, 1, 19, 'ES-4656', '2024-03-06', NULL, 2, 50, 100, 1, 1, NULL, '2024-03-08 02:38:21', '2024-03-11 20:16:45'),
(6, 12, 3, 13, 'ES-2389', '2024-03-08', 'Cemento por kilo', 10, 450, 4500, 1, 1, NULL, '2024-03-08 18:45:25', '2024-03-08 18:51:24'),
(7, 14, 5, 11, 'ES-T5676', '2024-03-08', 'TV', 5, 15478, 77390, 1, 1, NULL, '2024-03-08 19:40:02', '2024-03-11 15:49:35'),
(8, 8, 2, 22, 'ES-8978987', '2024-03-08', NULL, 5, 8566, 42830, 1, 1, NULL, '2024-03-08 19:47:27', '2024-03-08 19:48:01'),
(9, 8, 2, 22, 'ES-2375', '2024-03-11', 'Camara', 6, 4500, 27000, 1, 1, NULL, '2024-03-11 15:46:33', '2024-03-11 15:47:19'),
(10, 8, 6, 24, 'ES-12789', '2024-03-11', 'Smart Phone', 5, 3450, 17250, 1, 1, NULL, '2024-03-11 20:05:45', '2024-03-11 20:16:43'),
(11, 8, 6, 25, 'ES-12789', '2024-03-11', 'Smart Phone', 8, 4320, 34560, 1, 1, NULL, '2024-03-11 20:05:45', '2024-03-11 20:16:41'),
(12, 17, 6, 7, 'ES-R562', '2024-03-11', 'Telefono', 8, 6700, 53600, 1, 1, NULL, '2024-03-11 20:07:14', '2024-03-11 20:16:38'),
(13, 17, 6, 9, 'ES-R562', '2024-03-11', 'Teléfono Inteligente', 8, 8500, 68000, 1, 1, NULL, '2024-03-11 20:07:14', '2024-03-11 20:16:35'),
(14, 10, 7, 4, 'C-5677', '2024-03-11', 'Productos de Acero', 10, 450, 4500, 1, 1, NULL, '2024-03-11 20:38:02', '2024-03-11 20:38:16'),
(15, 10, 7, 5, 'C-5677', '2024-03-11', 'Productos de Acero', 10, 500, 5000, 1, 1, NULL, '2024-03-11 20:38:02', '2024-03-11 20:38:14'),
(16, 10, 7, 6, 'C-5677', '2024-03-11', 'Productos de Acero', 10, 600, 6000, 1, 1, NULL, '2024-03-11 20:38:02', '2024-03-11 20:38:12'),
(17, 16, 5, 10, 'C-5677', '2024-03-11', 'TV', 10, 6800, 68000, 1, 1, NULL, '2024-03-11 20:39:06', '2024-03-11 20:39:25'),
(18, 13, 5, 12, 'C-5677', '2024-03-11', 'TV', 10, 8000, 80000, 1, 1, NULL, '2024-03-11 20:40:12', '2024-03-11 20:44:27'),
(19, 15, 6, 8, 'C-5677', '2024-03-11', 'Smartphone', 5, 3600, 18000, 1, 1, NULL, '2024-03-11 21:01:22', '2024-03-11 21:06:03'),
(20, 12, 3, 13, 'C-5677', '2024-03-11', 'Cemento Mejor Calidad', 10, 480, 4800, 1, 1, NULL, '2024-03-11 21:02:56', '2024-03-11 21:06:01'),
(21, 12, 3, 14, 'C-5677', '2024-03-11', 'Cemento Mejor Calidad', 12, 490, 5880, 1, 1, NULL, '2024-03-11 21:02:56', '2024-03-11 21:05:59'),
(22, 12, 3, 15, 'C-5677', '2024-03-11', 'Cemento Mejor Calidad', 15, 500, 7500, 1, 1, NULL, '2024-03-11 21:02:56', '2024-03-11 21:05:57'),
(23, 11, 2, 16, 'C-5677', '2024-03-11', 'Las Mejores Camaras Digitales', 10, 4500, 45000, 1, 1, NULL, '2024-03-11 21:05:40', '2024-03-11 21:05:55'),
(24, 11, 2, 17, 'C-5677', '2024-03-11', 'Las Mejores Camaras Digitales', 8, 5000, 40000, 1, 1, NULL, '2024-03-11 21:05:40', '2024-03-11 21:05:53'),
(25, 11, 2, 18, 'C-5677', '2024-03-11', 'Las Mejores Camaras Digitales', 15, 8500, 127500, 1, 1, NULL, '2024-03-11 21:05:40', '2024-03-11 21:05:51'),
(26, 8, 5, 23, 'C-5677', '2024-03-11', 'Las Mejores TV Digitales', 10, 164589, 1645890, 1, 1, NULL, '2024-03-11 21:07:24', '2024-03-11 21:09:16'),
(27, 16, 1, 19, 'C-5677', '2024-03-11', 'Las Mejores Laptops del Mercado', 10, 22450, 224500, 1, 1, NULL, '2024-03-11 21:09:04', '2024-03-11 21:09:14'),
(28, 16, 1, 20, 'C-5677', '2024-03-11', 'Las Mejores Laptops del Mercado', 15, 19500, 292500, 1, 1, NULL, '2024-03-11 21:09:04', '2024-03-11 21:09:12'),
(29, 16, 1, 21, 'C-5677', '2024-03-11', 'Las Mejores Laptops del Mercado', 15, 18456, 276840, 1, 1, NULL, '2024-03-11 21:09:04', '2024-03-11 21:09:10');

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
(1, 'Enrique', 'Enrique', '20240213172015.jpg', 'enrique.sousa@gmail.com', '2024-02-12 10:49:20', '$2y$12$tGrSLmZBWexHYoFQgy/Ddu8JB5GytYgQn2GEYYazAvOTb9wHLzpiS', 'a2fQThUoGtkw3FfnfSSfch75eDTYBxXChArslmfdQ8RWFJbfMCinpcoCwaDn', '2024-02-12 06:25:21', '2024-02-14 18:06:55'),
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
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoice_details`
--
ALTER TABLE `invoice_details`
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
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_details`
--
ALTER TABLE `payment_details`
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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `invoice_details`
--
ALTER TABLE `invoice_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `payment_details`
--
ALTER TABLE `payment_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `purchases`
--
ALTER TABLE `purchases`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

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
