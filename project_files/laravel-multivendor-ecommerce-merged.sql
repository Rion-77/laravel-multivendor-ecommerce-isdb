-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 17, 2026 at 06:25 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel-multivendor-ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Easy', '2026-01-05 09:00:00', '2026-01-05 09:00:00'),
(2, 'Aarong', '2026-01-05 09:00:00', '2026-01-05 09:00:00'),
(3, 'Apex', '2026-01-05 09:00:00', '2026-01-05 09:00:00'),
(4, 'Richman', '2026-01-05 09:00:00', '2026-01-05 09:00:00'),
(5, 'Cats Eye', '2026-01-05 09:00:00', '2026-01-05 09:00:00'),
(6, 'Yellow', '2026-01-05 09:00:00', '2026-01-05 09:00:00'),
(7, 'Lee Cooper', '2026-01-05 09:00:00', '2026-01-05 09:00:00'),
(8, 'Sailor', '2026-01-05 09:00:00', '2026-01-05 09:00:00'),
(9, 'Dorjibari', '2026-01-05 09:00:00', '2026-01-05 09:00:00'),
(10, 'Ecstasy', '2026-01-05 09:00:00', '2026-01-05 09:00:00'),
(11, 'Kay Kraft', '2026-01-05 09:00:00', '2026-01-05 09:00:00'),
(12, 'Le Reve', '2026-01-05 09:00:00', '2026-01-05 09:00:00'),
(13, 'Bata', '2026-01-05 09:00:00', '2026-01-05 09:00:00'),
(14, 'Lotto', '2026-01-05 09:00:00', '2026-01-05 09:00:00'),
(15, 'American Tourister', '2026-01-05 09:00:00', '2026-01-05 09:00:00'),
(16, 'Casio', '2026-01-05 09:00:00', '2026-01-05 09:00:00'),
(17, 'Titan', '2026-01-05 09:00:00', '2026-01-05 09:00:00'),
(18, 'Citizen', '2026-01-05 09:00:00', '2026-01-05 09:00:00'),
(19, 'Samsung', '2026-01-05 09:00:00', '2026-01-05 09:00:00'),
(20, 'Xiaomi', '2026-01-05 09:00:00', '2026-01-05 09:00:00'),
(21, 'Realme', '2026-01-05 09:00:00', '2026-01-05 09:00:00'),
(22, 'Infinix', '2026-01-05 09:00:00', '2026-01-05 09:00:00'),
(23, 'Tecno', '2026-01-05 09:00:00', '2026-01-05 09:00:00'),
(24, 'Anker', '2026-01-05 09:00:00', '2026-01-05 09:00:00'),
(25, 'JBL', '2026-01-05 09:00:00', '2026-01-05 09:00:00'),
(26, 'Havit', '2026-01-05 09:00:00', '2026-01-05 09:00:00'),
(27, 'Baseus', '2026-01-05 09:00:00', '2026-01-05 09:00:00'),
(28, 'Walton', '2026-01-05 09:00:00', '2026-01-05 09:00:00'),
(29, 'Minister', '2026-01-05 09:00:00', '2026-01-05 09:00:00'),
(30, 'Singer', '2026-01-05 09:00:00', '2026-01-05 09:00:00'),
(31, 'Vision', '2026-01-05 09:00:00', '2026-01-05 09:00:00'),
(32, 'Jamuna', '2026-01-05 09:00:00', '2026-01-05 09:00:00'),
(33, 'Philips', '2026-01-05 09:00:00', '2026-01-05 09:00:00'),
(34, 'RFL', '2026-01-05 09:00:00', '2026-01-05 09:00:00'),
(35, 'Prestige', '2026-01-05 09:00:00', '2026-01-05 09:00:00'),
(36, 'Pigeon', '2026-01-05 09:00:00', '2026-01-05 09:00:00'),
(37, 'Hatil', '2026-01-05 09:00:00', '2026-01-05 09:00:00'),
(38, 'Otobi', '2026-01-05 09:00:00', '2026-01-05 09:00:00'),
(39, 'Teer', '2026-01-05 09:00:00', '2026-01-05 09:00:00'),
(40, 'Radhuni', '2026-01-05 09:00:00', '2026-01-05 09:00:00'),
(41, 'ACI Pure', '2026-01-05 09:00:00', '2026-01-05 09:00:00'),
(42, 'Fresh', '2026-01-05 09:00:00', '2026-01-05 09:00:00'),
(43, 'Ispahani', '2026-01-05 09:00:00', '2026-01-05 09:00:00'),
(44, 'Pran', '2026-01-05 09:00:00', '2026-01-05 09:00:00'),
(45, 'Ruchi', '2026-01-05 09:00:00', '2026-01-05 09:00:00'),
(46, 'Olympic', '2026-01-05 09:00:00', '2026-01-05 09:00:00'),
(47, 'Lux', '2026-01-05 09:00:00', '2026-01-05 09:00:00'),
(48, 'Sunsilk', '2026-01-05 09:00:00', '2026-01-05 09:00:00'),
(49, 'Nivea', '2026-01-05 09:00:00', '2026-01-05 09:00:00'),
(50, 'Himalaya', '2026-01-05 09:00:00', '2026-01-05 09:00:00'),
(51, 'Kookaburra', '2026-01-05 09:00:00', '2026-01-05 09:00:00'),
(52, 'Adidas', '2026-01-05 09:00:00', '2026-01-05 09:00:00'),
(53, 'Yonex', '2026-01-05 09:00:00', '2026-01-05 09:00:00'),
(54, 'Nike', '2026-01-05 09:00:00', '2026-01-05 09:00:00'),
(55, 'Rang Bangladesh', '2026-01-05 09:00:00', '2026-01-05 09:00:00'),
(56, 'Vivo', '2026-01-05 09:00:00', '2026-01-05 09:00:00'),
(57, 'Oppo', '2026-01-05 09:00:00', '2026-01-05 09:00:00'),
(58, 'Apple', '2026-01-05 09:00:00', '2026-01-05 09:00:00'),
(59, 'Remax', '2026-01-05 09:00:00', '2026-01-05 09:00:00'),
(60, 'Rupchanda', '2026-01-05 09:00:00', '2026-01-05 09:00:00'),
(61, 'Pusti', '2026-01-05 09:00:00', '2026-01-05 09:00:00'),
(62, 'Tetley', '2026-01-05 09:00:00', '2026-01-05 09:00:00'),
(63, 'Nescafe', '2026-01-05 09:00:00', '2026-01-05 09:00:00'),
(64, 'Marks', '2026-01-05 09:00:00', '2026-01-05 09:00:00'),
(65, 'Dano', '2026-01-05 09:00:00', '2026-01-05 09:00:00'),
(66, 'Milk Vita', '2026-01-05 09:00:00', '2026-01-05 09:00:00'),
(67, 'Aarong Dairy', '2026-01-05 09:00:00', '2026-01-05 09:00:00'),
(68, 'Cocola', '2026-01-05 09:00:00', '2026-01-05 09:00:00'),
(69, 'Bombay Sweets', '2026-01-05 09:00:00', '2026-01-05 09:00:00'),
(70, 'Regal', '2026-01-05 09:00:00', '2026-01-05 09:00:00'),
(71, 'Partex', '2026-01-05 09:00:00', '2026-01-05 09:00:00'),
(72, 'HP', '2026-01-05 09:00:00', '2026-01-05 09:00:00'),
(73, 'Dell', '2026-01-05 09:00:00', '2026-01-05 09:00:00'),
(74, 'Lenovo', '2026-01-05 09:00:00', '2026-01-05 09:00:00'),
(75, 'Asus', '2026-01-05 09:00:00', '2026-01-05 09:00:00'),
(76, 'Acer', '2026-01-05 09:00:00', '2026-01-05 09:00:00'),
(77, 'Logitech', '2026-01-05 09:00:00', '2026-01-05 09:00:00'),
(78, 'A4Tech', '2026-01-05 09:00:00', '2026-01-05 09:00:00'),
(79, 'TP-Link', '2026-01-05 09:00:00', '2026-01-05 09:00:00'),
(80, 'Kingston', '2026-01-05 09:00:00', '2026-01-05 09:00:00'),
(81, 'SanDisk', '2026-01-05 09:00:00', '2026-01-05 09:00:00'),
(82, 'Lifebuoy', '2026-01-05 09:00:00', '2026-01-05 09:00:00'),
(83, 'Parachute', '2026-01-05 09:00:00', '2026-01-05 09:00:00'),
(84, 'Pond\'s', '2026-01-05 09:00:00', '2026-01-05 09:00:00'),
(85, 'Vaseline', '2026-01-05 09:00:00', '2026-01-05 09:00:00'),
(86, 'Keya', '2026-01-05 09:00:00', '2026-01-05 09:00:00'),
(87, 'Savlon', '2026-01-05 09:00:00', '2026-01-05 09:00:00'),
(88, 'Meril', '2026-01-05 09:00:00', '2026-01-05 09:00:00'),
(89, 'Colgate', '2026-01-05 09:00:00', '2026-01-05 09:00:00'),
(90, 'Garnier', '2026-01-05 09:00:00', '2026-01-05 09:00:00'),
(91, 'Dove', '2026-01-05 09:00:00', '2026-01-05 09:00:00'),
(92, 'Pampers', '2026-01-05 09:00:00', '2026-01-05 09:00:00'),
(93, 'Huggies', '2026-01-05 09:00:00', '2026-01-05 09:00:00'),
(94, 'Johnson\'s', '2026-01-05 09:00:00', '2026-01-05 09:00:00'),
(95, 'Nestle', '2026-01-05 09:00:00', '2026-01-05 09:00:00'),
(96, 'LEGO', '2026-01-05 09:00:00', '2026-01-05 09:00:00'),
(97, 'Mattel', '2026-01-05 09:00:00', '2026-01-05 09:00:00'),
(98, 'Anyaprokash', '2026-01-05 09:00:00', '2026-01-05 09:00:00'),
(99, 'Sheba Prokashoni', '2026-01-05 09:00:00', '2026-01-05 09:00:00'),
(100, 'Matador', '2026-01-05 09:00:00', '2026-01-05 09:00:00'),
(101, 'Faber-Castell', '2026-01-05 09:00:00', '2026-01-05 09:00:00'),
(102, 'Pentel', '2026-01-05 09:00:00', '2026-01-05 09:00:00'),
(103, 'Double A', '2026-01-05 09:00:00', '2026-01-05 09:00:00'),
(104, 'Camlin', '2026-01-05 09:00:00', '2026-01-05 09:00:00'),
(105, 'Parker', '2026-01-05 09:00:00', '2026-01-05 09:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Men\'s Fashion', 'mens-fashion', '2026-01-05 09:00:00', '2026-01-05 09:00:00'),
(2, 'Women\'s Fashion', 'womens-fashion', '2026-01-05 09:00:00', '2026-01-05 09:00:00'),
(3, 'Footwear', 'footwear', '2026-01-05 09:00:00', '2026-01-05 09:00:00'),
(4, 'Kids & Baby', 'kids-baby', '2026-01-05 09:00:00', '2026-01-05 09:00:00'),
(5, 'Bags & Accessories', 'bags-accessories', '2026-01-05 09:00:00', '2026-01-05 09:00:00'),
(6, 'Watches', 'watches', '2026-01-05 09:00:00', '2026-01-05 09:00:00'),
(7, 'Mobile Phones & Tablets', 'mobile-phones-tablets', '2026-01-05 09:00:00', '2026-01-05 09:00:00'),
(8, 'Laptops & Computers', 'laptops-computers', '2026-01-05 09:00:00', '2026-01-05 09:00:00'),
(9, 'Electronics & Gadgets', 'electronics-gadgets', '2026-01-05 09:00:00', '2026-01-05 09:00:00'),
(10, 'Home Appliances', 'home-appliances', '2026-01-05 09:00:00', '2026-01-05 09:00:00'),
(11, 'Kitchen & Dining', 'kitchen-dining', '2026-01-05 09:00:00', '2026-01-05 09:00:00'),
(12, 'Home & Living', 'home-living', '2026-01-05 09:00:00', '2026-01-05 09:00:00'),
(13, 'Grocery & Staples', 'grocery-staples', '2026-01-05 09:00:00', '2026-01-05 09:00:00'),
(14, 'Snacks & Beverages', 'snacks-beverages', '2026-01-05 09:00:00', '2026-01-05 09:00:00'),
(15, 'Health & Beauty', 'health-beauty', '2026-01-05 09:00:00', '2026-01-05 09:00:00'),
(16, 'Books & Stationery', 'books-stationery', '2026-01-05 09:00:00', '2026-01-05 09:00:00'),
(17, 'Sports & Fitness', 'sports-fitness', '2026-01-05 09:00:00', '2026-01-05 09:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` varchar(255) NOT NULL,
  `queue` varchar(255) NOT NULL,
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
  `attempts` smallint(5) UNSIGNED NOT NULL,
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
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) DEFAULT NULL,
  `collection_name` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `mime_type` varchar(255) DEFAULT NULL,
  `disk` varchar(255) NOT NULL,
  `conversions_disk` varchar(255) DEFAULT NULL,
  `size` bigint(20) UNSIGNED NOT NULL,
  `manipulations` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`manipulations`)),
  `custom_properties` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`custom_properties`)),
  `generated_conversions` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`generated_conversions`)),
  `responsive_images` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`responsive_images`)),
  `order_column` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`id`, `model_type`, `model_id`, `uuid`, `collection_name`, `name`, `file_name`, `mime_type`, `disk`, `conversions_disk`, `size`, `manipulations`, `custom_properties`, `generated_conversions`, `responsive_images`, `order_column`, `created_at`, `updated_at`) VALUES
(6, 'App\\Models\\Product', 227, '6930ff43-59d3-483a-846b-f266742a988c', 'product_image', 'images', 'images.jpg', 'image/jpeg', 'public', 'public', 19904, '[]', '[]', '{\"webp\":true,\"thumbnail\":true}', '[]', 1, '2026-09-21 09:45:07', '2026-09-21 09:45:07'),
(7, 'App\\Models\\Product', 226, 'f802cdbe-8f49-469d-b50e-ff9e51cb1105', 'product_image', 'images (1)', 'images-(1).jpg', 'image/jpeg', 'public', 'public', 18920, '[]', '[]', '{\"webp\":true,\"thumbnail\":true}', '[]', 1, '2026-09-21 09:45:58', '2026-09-21 09:45:58'),
(8, 'App\\Models\\Product', 223, 'c4089e81-c214-4c14-a07c-5febe69046a4', 'product_image', 'images (2)', 'images-(2).jpg', 'image/jpeg', 'public', 'public', 14123, '[]', '[]', '{\"webp\":true,\"thumbnail\":true}', '[]', 1, '2026-09-21 09:46:37', '2026-09-21 09:46:37'),
(9, 'App\\Models\\Product', 222, '1daef4ec-f1c0-49d4-8f82-9f7b35fa3388', 'product_image', 'images (3)', 'images-(3).jpg', 'image/jpeg', 'public', 'public', 7724, '[]', '[]', '{\"webp\":true,\"thumbnail\":true}', '[]', 1, '2026-09-21 09:47:01', '2026-09-21 09:47:01'),
(10, 'App\\Models\\Product', 219, '87c5170f-ae98-4252-859d-0558df3fb358', 'product_image', 'TMSS-BAG-36-600x900-1-300x450', 'TMSS-BAG-36-600x900-1-300x450.jpg', 'image/jpeg', 'public', 'public', 14754, '[]', '[]', '{\"webp\":true,\"thumbnail\":true}', '[]', 1, '2026-09-21 09:47:41', '2026-09-21 09:47:41'),
(11, 'App\\Models\\Product', 218, 'b1a89d5b-3464-46b0-b167-799c70e925fd', 'product_image', 'havit-gamenote-h2042d-rgb-wired-black-gaming-51728733828', 'havit-gamenote-h2042d-rgb-wired-black-gaming-51728733828.webp', 'image/webp', 'public', 'public', 58288, '[]', '[]', '{\"webp\":true,\"thumbnail\":true}', '[]', 1, '2026-09-21 09:48:06', '2026-09-21 09:48:06'),
(12, 'App\\Models\\Product', 217, '03d903f8-e4a3-46fc-8673-973817c4e95f', 'product_image', '65fa9646d61902ef23078e6e_Olympic-Energy-Plus-Biscuits-626gm_1', '65fa9646d61902ef23078e6e_Olympic-Energy-Plus-Biscuits-626gm_1.webp', 'image/webp', 'public', 'public', 55028, '[]', '[]', '{\"webp\":true,\"thumbnail\":true}', '[]', 1, '2026-09-21 09:48:34', '2026-09-21 09:48:34'),
(13, 'App\\Models\\Product', 212, '4d91fbe0-3e2a-4001-b7fd-638f3feb2898', 'product_image', 'teer-fortified-soyabean-oil-5-ltr', 'teer-fortified-soyabean-oil-5-ltr.jpg', 'image/jpeg', 'public', 'public', 54722, '[]', '[]', '{\"webp\":true,\"thumbnail\":true}', '[]', 1, '2026-09-21 09:49:00', '2026-09-21 09:49:00'),
(14, 'App\\Models\\Product', 210, '49d95ef4-ce03-47d1-ac37-32013fdddf01', 'product_image', 'images (4)', 'images-(4).jpg', 'image/jpeg', 'public', 'public', 18174, '[]', '[]', '{\"webp\":true,\"thumbnail\":true}', '[]', 1, '2026-09-21 09:49:32', '2026-09-21 09:49:32'),
(15, 'App\\Models\\Product', 209, '5c165b84-9194-4555-9f1e-e3cd3e71e1e0', 'product_image', '1735196118044387', '1735196118044387.jpg', 'image/jpeg', 'public', 'public', 30928, '[]', '[]', '{\"webp\":true,\"thumbnail\":true}', '[]', 1, '2026-09-21 09:50:00', '2026-09-21 09:50:01'),
(16, 'App\\Models\\Product', 206, 'fcf33a4e-ae6a-4f16-8279-c3a238f8b833', 'product_image', 'images (5)', 'images-(5).jpg', 'image/jpeg', 'public', 'public', 7507, '[]', '[]', '{\"webp\":true,\"thumbnail\":true}', '[]', 1, '2026-09-21 09:50:43', '2026-09-21 09:50:43'),
(17, 'App\\Models\\Product', 205, 'fbd18f14-88f8-433e-a6de-3cbe0ff849ee', 'product_image', 'S4dbe8899e033479a83eada875439be26S', 'S4dbe8899e033479a83eada875439be26S.jpg', 'image/jpeg', 'public', 'public', 12928, '[]', '[]', '{\"webp\":true,\"thumbnail\":true}', '[]', 1, '2026-09-21 09:51:19', '2026-09-21 09:51:19'),
(18, 'App\\Models\\Product', 204, '7f2d4dfb-5bb7-4090-ac4d-1cb155c642f1', 'product_image', 'images (6)', 'images-(6).jpg', 'image/jpeg', 'public', 'public', 8500, '[]', '[]', '{\"webp\":true,\"thumbnail\":true}', '[]', 1, '2026-09-21 09:52:17', '2026-09-21 09:52:18'),
(19, 'App\\Models\\Product', 203, '095dff19-304b-4197-ba46-cd9f710aca37', 'product_image', 'images (7)', 'images-(7).jpg', 'image/jpeg', 'public', 'public', 26365, '[]', '[]', '{\"webp\":true,\"thumbnail\":true}', '[]', 1, '2026-09-21 09:53:26', '2026-09-21 09:53:26'),
(20, 'App\\Models\\Product', 201, 'f7dde61c-d8d8-47c1-8701-daa47ff5390e', 'product_image', '26552a570fba0b4dc87e13fb649ec36a', '26552a570fba0b4dc87e13fb649ec36a.jpg', 'image/jpeg', 'public', 'public', 43453, '[]', '[]', '{\"webp\":true,\"thumbnail\":true}', '[]', 1, '2026-09-21 09:53:55', '2026-09-21 09:53:55'),
(21, 'App\\Models\\Product', 225, '4a65cd86-8307-4af4-bc5a-285efd75d593', 'product_image', 'images (8)', 'images-(8).jpg', 'image/jpeg', 'public', 'public', 23554, '[]', '[]', '{\"webp\":true,\"thumbnail\":true}', '[]', 1, '2026-09-21 09:57:17', '2026-09-21 09:57:18'),
(22, 'App\\Models\\Product', 224, 'bdd5327d-d1bb-4180-b646-0f86d8745d23', 'product_image', 'teer-fortified-soyabean-oil-1-ltr', 'teer-fortified-soyabean-oil-1-ltr.jpg', 'image/jpeg', 'public', 'public', 39658, '[]', '[]', '{\"webp\":true,\"thumbnail\":true}', '[]', 1, '2026-09-21 09:57:46', '2026-09-21 09:57:46'),
(23, 'App\\Models\\Product', 221, '84492e5b-5e5c-485f-b90d-5987129de2f7', 'product_image', 'images (9)', 'images-(9).jpg', 'image/jpeg', 'public', 'public', 45771, '[]', '[]', '{\"webp\":true,\"thumbnail\":true}', '[]', 1, '2026-09-21 09:58:18', '2026-09-21 09:58:18'),
(24, 'App\\Models\\Product', 220, 'fd5375ac-c031-4fdf-bf0d-8314d790e3d9', 'product_image', 'images (10)', 'images-(10).jpg', 'image/jpeg', 'public', 'public', 25121, '[]', '[]', '{\"webp\":true,\"thumbnail\":true}', '[]', 1, '2026-09-21 09:58:43', '2026-09-21 09:58:44'),
(25, 'App\\Models\\Product', 216, 'd7c96b09-27e1-473d-aa0d-24cd8479db03', 'product_image', 'images (11)', 'images-(11).jpg', 'image/jpeg', 'public', 'public', 10390, '[]', '[]', '{\"webp\":true,\"thumbnail\":true}', '[]', 1, '2026-09-21 09:59:25', '2026-09-21 09:59:25'),
(26, 'App\\Models\\Product', 215, 'c07c5ee8-9cf5-4224-94cb-da9dab0b69d0', 'product_image', 'savlon-250-ml-1649314189777', 'savlon-250-ml-1649314189777.webp', 'image/webp', 'public', 'public', 21582, '[]', '[]', '{\"webp\":true,\"thumbnail\":true}', '[]', 1, '2026-09-21 09:59:59', '2026-09-21 09:59:59'),
(27, 'App\\Models\\Product', 213, '8539248e-eb06-4694-aebe-0ea75702eb28', 'product_image', 'images (12)', 'images-(12).jpg', 'image/jpeg', 'public', 'public', 16893, '[]', '[]', '{\"webp\":true,\"thumbnail\":true}', '[]', 1, '2026-09-21 10:02:35', '2026-09-21 10:02:35'),
(28, 'App\\Models\\Product', 211, '4c5256cc-6f83-4d5d-ac6b-3d26367bd9e5', 'product_image', '3cce5d0fe4fe29e7165197eb2b485320.jpg_960x960q80.jpg_', '3cce5d0fe4fe29e7165197eb2b485320.jpg_960x960q80.jpg_.webp', 'image/webp', 'public', 'public', 24638, '[]', '[]', '{\"webp\":true,\"thumbnail\":true}', '[]', 1, '2026-09-21 10:10:07', '2026-09-21 10:10:07'),
(29, 'App\\Models\\Product', 208, '7f6eda00-0100-498f-9e5f-b0431890f37b', 'product_image', 'hp-deskjet-ink-advantage-2338-all-in-one-printer', 'hp-deskjet-ink-advantage-2338-all-in-one-printer.jpg', 'image/jpeg', 'public', 'public', 45571, '[]', '[]', '{\"webp\":true,\"thumbnail\":true}', '[]', 1, '2026-09-21 10:10:42', '2026-09-21 10:10:43'),
(30, 'App\\Models\\Product', 207, '1d54348d-d12f-4e73-af3d-1356ec7629f4', 'product_image', '71ErgfoQ7VL._AC_UF894,1000_QL80_', '71ErgfoQ7VL._AC_UF894,1000_QL80_.jpg', 'image/jpeg', 'public', 'public', 75649, '[]', '[]', '{\"webp\":true,\"thumbnail\":true}', '[]', 1, '2026-09-21 10:11:21', '2026-09-21 10:11:22'),
(31, 'App\\Models\\Product', 202, '8d41131a-f90d-4e02-8479-156aaf422ecc', 'product_image', 'image', 'image.png', 'image/png', 'public', 'public', 618904, '[]', '[]', '{\"webp\":true,\"thumbnail\":true}', '[]', 1, '2026-09-21 10:12:19', '2026-09-21 10:12:19'),
(32, 'App\\Models\\Product', 200, '3c3bf893-c581-49f5-a84f-a88f32ec171a', 'product_image', 'image', 'image.png', 'image/png', 'public', 'public', 1884628, '[]', '[]', '{\"webp\":true,\"thumbnail\":true}', '[]', 1, '2026-09-21 10:12:53', '2026-09-21 10:12:54'),
(33, 'App\\Models\\Product', 199, '7524875e-10b8-4c9a-a064-a1084c400c01', 'product_image', 'aab8115f-f4c2-4a8b-afdf-43442a5c066a', 'aab8115f-f4c2-4a8b-afdf-43442a5c066a.jpg', 'image/jpeg', 'public', 'public', 933973, '[]', '[]', '{\"webp\":true,\"thumbnail\":true}', '[]', 1, '2026-09-21 10:13:58', '2026-09-21 10:13:59'),
(34, 'App\\Models\\Product', 198, '432d1663-6175-43c6-acb5-ade4d180cf70', 'product_image', '9b577cda6c61b5e3fb837261ffb996f1', '9b577cda6c61b5e3fb837261ffb996f1.jpg', 'image/jpeg', 'public', 'public', 870296, '[]', '[]', '{\"webp\":true,\"thumbnail\":true}', '[]', 1, '2026-09-21 10:14:27', '2026-09-21 10:14:28'),
(35, 'App\\Models\\Vendor', 5, '48a3b935-0418-41db-ac94-aa7bb5dca4a8', 'shop_logo', 'images (13)', 'images-(13).jpg', 'image/jpeg', 'public', 'public', 33790, '[]', '[]', '{\"logo\":true}', '[]', 1, '2026-09-21 10:17:06', '2026-09-21 10:17:07'),
(36, 'App\\Models\\Product', 229, 'ea2fe3a5-8447-4096-995c-09f6e01a7eae', 'product_image', 'Laptop-Bag-Backpack_Original', 'Laptop-Bag-Backpack_Original.jpg', 'image/jpeg', 'public', 'public', 53935, '[]', '[]', '{\"webp\":true,\"thumbnail\":true}', '[]', 1, '2026-09-21 13:29:53', '2026-09-21 13:29:53'),
(37, 'App\\Models\\Product', 230, '2b75cab3-e418-48c7-a2bc-f9d117b520cc', 'product_image', 'package-1052370_640', 'package-1052370_640.jpg', 'image/jpeg', 'public', 'public', 47458, '[]', '[]', '{\"webp\":true,\"thumbnail\":true}', '[]', 1, '2026-09-21 14:06:40', '2026-09-21 14:06:41');

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
(4, '2026_09_08_132216_create_roles_table', 1),
(5, '2026_09_10_155301_create_media_table', 1),
(6, '2026_09_14_120605_create_products_table', 1),
(7, '2026_09_14_120636_create_categories_table', 1),
(8, '2026_09_14_120648_create_brands_table', 1),
(9, '2026_09_17_133622_create_vendors_table', 1),
(10, '2026_09_29_102643_create_orders_table', 1),
(11, '2026_09_29_141706_create_order_items_table', 1),
(12, '2026_10_01_114702_create_order_statuses_table', 1),
(13, '2026_10_09_164643_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `guest_name` varchar(255) DEFAULT NULL,
  `guest_email` varchar(255) DEFAULT NULL,
  `guest_phone` varchar(255) DEFAULT NULL,
  `order_number` varchar(255) NOT NULL,
  `shipping_address_id` bigint(20) DEFAULT NULL,
  `shipping_recipient_name` varchar(255) NOT NULL,
  `shipping_phone` varchar(255) NOT NULL,
  `shipping_address_line` varchar(255) NOT NULL,
  `shipping_district` varchar(255) DEFAULT NULL,
  `subtotal_amount` decimal(8,2) NOT NULL,
  `shipping_fee` decimal(8,2) NOT NULL,
  `total_amount` decimal(8,2) NOT NULL,
  `order_status_id` bigint(20) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(10) UNSIGNED NOT NULL,
  `unit_price` decimal(12,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_statuses`
--

CREATE TABLE `order_statuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_statuses`
--

INSERT INTO `order_statuses` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Pending', '2026-10-17 11:28:34', '2026-10-17 11:28:34'),
(2, 'Confirmed', '2026-10-17 11:28:34', '2026-10-17 11:28:34'),
(3, 'Packed', '2026-10-17 11:28:35', '2026-10-17 11:28:35'),
(4, 'Shipped', '2026-10-17 11:28:35', '2026-10-17 11:28:35'),
(5, 'Delivered', '2026-10-17 11:28:35', '2026-10-17 11:28:35'),
(6, 'Cancelled', '2026-10-17 11:28:35', '2026-10-17 11:28:35'),
(7, 'Retun Requested', '2026-10-17 11:28:35', '2026-10-17 11:28:35'),
(8, 'Returned', '2026-10-17 11:28:35', '2026-10-17 11:28:35');

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
  `name` text NOT NULL,
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
  `vendor_id` bigint(20) NOT NULL,
  `category_id` bigint(20) NOT NULL,
  `brand_id` bigint(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `base_price` decimal(8,2) NOT NULL,
  `offer_price` decimal(8,2) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'pending_review',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `vendor_id`, `category_id`, `brand_id`, `name`, `slug`, `description`, `base_price`, `offer_price`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 1, 'Easy Women\'s Straight Fit Jeans - Light Wash', 'easy-womens-straight-fit-jeans-light-wash', 'Stretch denim jeans with high rise and straight leg. Available in sizes 26 to 34.', 2290.00, 1950.00, 'active', '2026-01-24 16:00:56', '2026-01-24 16:00:56'),
(2, 2, 9, 24, 'Anker Soundcore Life Q30 Noise Cancelling Headphones', 'anker-soundcore-life-q30-noise-cancelling-headphones', 'Hybrid active noise cancelling headphones with up to 40 hours playtime and Hi-Res audio.', 9990.00, 8990.00, 'active', '2026-02-02 09:49:32', '2026-02-04 16:49:32'),
(3, 3, 14, 69, 'Bombay Sweets Lachcha Semai 500g', 'bombay-sweets-lachcha-semai-500g', 'Fine vermicelli for making semai and jorda, especially popular during Eid.', 130.00, 130.00, 'active', '2026-02-06 19:44:20', '2026-02-06 19:44:20'),
(4, 1, 2, 10, 'Ecstasy Women\'s Printed Lawn Three-Piece', 'ecstasy-womens-printed-lawn-three-piece', 'Soft lawn kameez, salwar and dupatta with digital floral print. Unstitched.', 3250.00, 3250.00, 'active', '2026-02-09 23:12:34', '2026-02-09 23:12:34'),
(5, 3, 13, 65, 'Dano Full Cream Milk Powder 1kg', 'dano-full-cream-milk-powder-1kg', 'Instant milk powder fortified with vitamins and minerals.', 840.00, 800.00, 'active', '2026-02-10 09:43:42', '2026-03-03 13:43:42'),
(6, 3, 13, 40, 'Radhuni Meat Masala 100g', 'radhuni-meat-masala-100g', 'Ready-to-use spice blend for beef, mutton and chicken curries.', 75.00, 75.00, 'out_of_stock', '2026-02-12 21:33:27', '2026-03-01 07:33:27'),
(7, 3, 14, 45, 'Ruchi Chanachur Original 350g', 'ruchi-chanachur-original-350g', 'Classic crunchy chanachur with peanuts and lentils.', 110.00, 110.00, 'active', '2026-02-13 21:55:29', '2026-02-13 21:55:29'),
(8, 1, 2, 12, 'Le Reve Women\'s Formal Blazer - Navy', 'le-reve-womens-formal-blazer-navy', 'Tailored single-breasted blazer with structured shoulders and lined interior.', 4250.00, 3400.00, 'active', '2026-02-14 21:05:02', '2026-03-11 11:05:02'),
(9, 1, 2, 10, 'Ecstasy Chiffon Hijab Scarf - Pack of 3', 'ecstasy-chiffon-hijab-scarf-pack-of-3', 'Lightweight chiffon hijab scarves in three complementary shades. Wrinkle-resistant.', 990.00, 790.00, 'active', '2026-02-16 15:40:53', '2026-03-05 06:40:53'),
(10, 1, 2, 2, 'Aarong Rajshahi Silk Saree - Maroon', 'aarong-rajshahi-silk-saree-maroon', 'Lustrous Rajshahi silk saree with a self-woven border. Light to drape and easy to maintain.', 7800.00, 7020.00, 'active', '2026-02-17 22:27:50', '2026-02-18 12:27:50'),
(11, 1, 2, 10, 'Ecstasy Embroidered Kurti - Peach', 'ecstasy-embroidered-kurti-peach', 'Peach cotton kurti with thread embroidery on the neckline. Straight cut with side slits.', 2190.00, 1750.00, 'active', '2026-02-19 21:13:53', '2026-02-20 14:13:53'),
(12, 3, 13, 44, 'Pran Aromatic Chinigura Rice 2kg', 'pran-aromatic-chinigura-rice-2kg', 'Aromatic small-grain rice perfect for polao and special occasions.', 340.00, 340.00, 'active', '2026-02-23 10:38:11', '2026-02-23 10:38:11'),
(13, 1, 2, 6, 'Yellow Women\'s Denim Jacket - Light Wash', 'yellow-womens-denim-jacket-light-wash', 'Classic cropped denim jacket with button front and two chest pockets.', 2790.00, 2230.00, 'active', '2026-03-01 11:40:48', '2026-03-01 11:40:48'),
(14, 2, 9, 26, 'Havit TWS Earbuds with Charging Case', 'havit-tws-earbuds-with-charging-case', 'Bluetooth 5.1 earbuds with touch control and a compact charging case.', 1750.00, 1580.00, 'active', '2026-03-03 14:27:44', '2026-03-11 18:27:44'),
(15, 5, 13, 43, 'Ispahani Mirzapore Best Leaf Tea 400g', 'ispahani-mirzapore-best-leaf-tea-400g', 'Strong, well-rounded black tea from Bangladesh tea gardens. A morning favourite in millions of homes.', 250.00, 250.00, 'active', '2026-03-06 16:54:07', '2026-03-11 09:54:07'),
(16, 3, 13, 63, 'Nescafe Classic Instant Coffee 100g Jar', 'nescafe-classic-instant-coffee-100g-jar', 'Rich, aromatic 100% pure instant coffee. Just add hot water.', 590.00, 590.00, 'active', '2026-03-06 19:45:31', '2026-03-06 19:45:31'),
(17, 2, 7, 21, 'Realme 12 5G (8GB/128GB) - Twilight Purple', 'realme-12-5g-8gb-128gb-twilight-purple', '6.72-inch 120Hz display, 108MP camera and 45W charging.', 28990.00, 26650.00, 'active', '2026-03-07 18:07:22', '2026-03-13 10:07:22'),
(18, 4, 3, 3, 'Apex Boys\' School Shoes - Black', 'apex-boys-school-shoes-black', 'Hard-wearing black school shoes with a reinforced toe cap.', 1350.00, 1350.00, 'inactive', '2026-03-09 10:16:52', '2026-03-22 17:16:52'),
(19, 4, 3, 3, 'Apex Men\'s Suede Loafers - Tan', 'apex-mens-suede-loafers-tan', 'Slip-on suede loafers with a flexible sole and comfortable lining.', 2990.00, 2540.00, 'inactive', '2026-03-09 10:37:52', '2026-03-09 10:37:52'),
(20, 5, 5, 15, 'American Tourister 24-inch Hard-shell Trolley Case - Navy', 'american-tourister-24-inch-hard-shell-trolley-case-navy', 'Lightweight polypropylene trolley with 4 spinner wheels, TSA-style lock and expandable interior.', 10900.00, 9810.00, 'active', '2026-03-11 17:28:23', '2026-03-31 08:28:23'),
(21, 5, 13, 41, 'ACI Pure Chinigura Aromatic Rice 5kg', 'aci-pure-chinigura-aromatic-rice-5kg', 'Fragrant short-grain chinigura rice, ideal for polao, biryani and khichuri.', 720.00, 700.00, 'active', '2026-03-17 15:25:40', '2026-04-08 01:25:40'),
(22, 5, 1, 4, 'Richman Slim Fit Stretch Denim Jeans - Dark Blue', 'richman-slim-fit-stretch-denim-jeans-dark-blue', 'Dark wash stretch denim with a slim fit through the leg. Five-pocket design and reinforced stitching.', 2690.00, 2150.00, 'active', '2026-03-18 20:44:02', '2026-03-28 05:44:02'),
(23, 2, 7, 20, 'Xiaomi Redmi A3 (3GB/64GB) - Olive Green', 'xiaomi-redmi-a3-3gb-64gb-olive-green', 'Entry-level phone with 6.71-inch 90Hz display and 5000mAh battery.', 9990.00, 9190.00, 'active', '2026-03-18 21:50:36', '2026-04-18 06:50:36'),
(24, 5, 11, 34, 'RFL Airtight Food Container Set of 6', 'rfl-airtight-food-container-set-of-6', 'BPA-free airtight containers in assorted sizes. Stackable for a tidy pantry.', 1250.00, 1000.00, 'active', '2026-03-19 20:20:04', '2026-03-19 20:20:04'),
(25, 5, 2, 2, 'Aarong Tangail Cotton Saree - Green Block Print', 'aarong-tangail-cotton-saree-green-block-print', 'Lightweight Tangail cotton saree with hand block print border. Comfortable for daily wear in humid weather.', 3200.00, 3200.00, 'active', '2026-03-20 16:00:56', '2026-03-20 16:00:56'),
(26, 3, 14, 44, 'Pran Mojo Cola Drink 2L', 'pran-mojo-cola-drink-2l', 'Refreshing cola drink in a family size 2 litre bottle.', 90.00, 90.00, 'active', '2026-03-20 17:06:06', '2026-03-20 17:06:06'),
(27, 5, 15, 48, 'Sunsilk Black Shine Shampoo 340ml', 'sunsilk-black-shine-shampoo-340ml', 'Nourishing shampoo with amla and argan oil for shiny black hair.', 420.00, 380.00, 'active', '2026-03-23 21:10:07', '2026-04-09 10:10:07'),
(28, 4, 3, 13, 'Bata Women\'s Slip-on Sandals - Pink', 'bata-womens-slip-on-sandals-pink', 'Soft slip-on sandals with a padded strap, light on the feet.', 1199.00, 1020.00, 'inactive', '2026-03-24 09:11:11', '2026-04-03 04:11:11'),
(29, 5, 1, 5, 'Cats Eye Men\'s Polo T-Shirt - Charcoal', 'cats-eye-mens-polo-t-shirt-charcoal', 'Pique cotton polo with a ribbed collar and two-button placket. Breathable and easy to wash.', 990.00, 990.00, 'active', '2026-03-24 22:59:03', '2026-04-06 23:59:03'),
(30, 2, 7, 19, 'Samsung Galaxy M14 5G (4GB/128GB)', 'samsung-galaxy-m14-5g-4gb-128gb', '6000mAh battery, 6.6-inch 90Hz display and 50MP triple camera.', 18990.00, 17470.00, 'active', '2026-03-26 10:05:01', '2026-03-26 10:05:01'),
(31, 5, 11, 36, 'Pigeon Stainless Steel Pressure Cooker 5L', 'pigeon-stainless-steel-pressure-cooker-5l', 'Heavy-gauge stainless steel pressure cooker with safety valve and induction-friendly base.', 2950.00, 2360.00, 'active', '2026-03-27 15:38:31', '2026-04-19 20:38:31'),
(32, 5, 3, 13, 'Bata Comfit Men\'s Leather Sandal - Brown', 'bata-comfit-mens-leather-sandal-brown', 'Open-toe leather sandal with adjustable velcro straps and a shock-absorbing sole.', 1899.00, 1899.00, 'active', '2026-03-29 23:13:40', '2026-03-29 23:13:40'),
(33, 3, 13, 42, 'Fresh Premium Miniket Rice 5kg', 'fresh-premium-miniket-rice-5kg', 'Polished miniket rice with slender grains that cook fluffy and separate.', 390.00, 390.00, 'active', '2026-03-30 08:50:33', '2026-04-10 01:50:33'),
(34, 6, 12, 71, 'Partex Ergonomic Mesh Office Chair', 'partex-ergonomic-mesh-office-chair', 'Height-adjustable chair with lumbar support and breathable mesh back.', 7950.00, 7950.00, 'active', '2026-03-30 10:42:09', '2026-03-30 10:42:09'),
(35, 5, 12, 38, 'Otobi Double Bed with Storage - Teak Finish', 'otobi-double-bed-with-storage-teak-finish', 'Sturdy double bed with hydraulic underbed storage and a padded headboard.', 38500.00, 38500.00, 'out_of_stock', '2026-04-01 10:16:56', '2026-04-01 10:16:56'),
(36, 5, 7, 21, 'Realme C63 (6GB/128GB) - Leather Blue', 'realme-c63-6gb-128gb-leather-blue', 'Slim vegan-leather back, 6.74-inch 90Hz screen and 45W SUPERVOOC fast charging.', 15490.00, 13940.00, 'active', '2026-04-02 22:22:20', '2026-04-02 22:22:20'),
(37, 5, 6, 18, 'Citizen Quartz Analog Watch - Silver Steel', 'citizen-quartz-analog-watch-silver-steel', 'Stainless steel quartz watch with 50m water resistance and a clean white dial.', 9500.00, 9020.00, 'active', '2026-04-03 12:28:41', '2026-04-27 00:28:41'),
(38, 5, 6, 16, 'Casio Enticer Men\'s Analog Watch - Black Dial', 'casio-enticer-mens-analog-watch-black-dial', 'Classic analog watch with stainless steel case, date window and water resistance.', 4950.00, 4460.00, 'active', '2026-04-03 16:13:12', '2026-04-21 21:13:12'),
(39, 2, 7, 19, 'Samsung Galaxy A35 5G (8GB/128GB) - Awesome Navy', 'samsung-galaxy-a35-5g-8gb-128gb-awesome-navy', '6.6-inch Super AMOLED 120Hz display, 50MP OIS camera and IP67 water resistance.', 42500.00, 41190.00, 'active', '2026-04-04 23:04:42', '2026-04-04 23:04:42'),
(40, 3, 13, 62, 'Tetley Black Tea Bags 25 pcs', 'tetley-black-tea-bags-25-pcs', 'Quick brewing tea bags with a bold flavour.', 130.00, 125.00, 'active', '2026-04-05 18:25:04', '2026-04-05 18:25:04'),
(41, 5, 11, 35, 'Prestige Non-stick Fry Pan 24cm', 'prestige-non-stick-fry-pan-24cm', 'Scratch-resistant non-stick coating with cool-touch handle. Works on gas stoves.', 1690.00, 1520.00, 'active', '2026-04-07 20:12:40', '2026-04-24 16:12:40'),
(42, 5, 10, 29, 'Minister Electric Rice Cooker 1.8L', 'minister-electric-rice-cooker-1-8l', 'Non-stick inner pot, keep-warm function and steam tray. Cooks rice for 6 to 8 people.', 2650.00, 2520.00, 'active', '2026-04-08 10:48:49', '2026-04-14 10:48:49'),
(43, 1, 2, 12, 'Le Reve Women\'s Ankle-length Cotton Skirt - Olive', 'le-reve-womens-ankle-length-cotton-skirt-olive', 'Flared cotton skirt with elastic waistband and side pockets.', 1690.00, 1440.00, 'active', '2026-04-08 20:53:07', '2026-05-05 16:53:07'),
(44, 5, 2, 11, 'Kay Kraft Embroidered Cotton Kameez - Ivory', 'kay-kraft-embroidered-cotton-kameez-ivory', 'Ivory cotton kameez with hand embroidery on the yoke and sleeves. Made by artisans in rural Bangladesh.', 2400.00, 1920.00, 'active', '2026-04-09 14:55:11', '2026-04-09 14:55:11'),
(45, 6, 12, 11, 'Kay Kraft Bamboo Wall Hanging Decor', 'kay-kraft-bamboo-wall-hanging-decor', 'Handmade bamboo and cane wall hanging that adds warmth to any room.', 890.00, 800.00, 'active', '2026-04-10 10:00:03', '2026-04-10 10:00:03'),
(46, 3, 13, 60, 'Rupchanda Soyabean Oil 5L', 'rupchanda-soyabean-oil-5l', 'Light and clear soyabean oil, ideal for frying and curries. Big 5 litre jar.', 890.00, 865.00, 'active', '2026-04-10 19:18:46', '2026-05-10 21:18:46'),
(47, 5, 7, 22, 'Infinix Hot 40i (8GB/256GB) - Palm Blue', 'infinix-hot-40i-8gb-256gb-palm-blue', '6.56-inch 90Hz display, 8GB RAM with 256GB storage and a fingerprint sensor.', 14990.00, 14990.00, 'active', '2026-04-13 14:47:45', '2026-04-16 06:47:45'),
(48, 6, 12, 70, 'Regal Wooden Shoe Rack 4-Tier', 'regal-wooden-shoe-rack-4-tier', 'Sturdy four-tier shoe rack that holds up to 12 pairs.', 3450.00, 3100.00, 'active', '2026-04-14 09:39:09', '2026-05-09 09:39:09'),
(49, 4, 3, 3, 'Apex Men\'s Leather Oxford Shoes - Brown', 'apex-mens-leather-oxford-shoes-brown', 'Classic brown oxford shoes in genuine leather with a cushioned insole.', 3590.00, 3230.00, 'inactive', '2026-04-15 09:29:06', '2026-04-15 09:29:06'),
(50, 7, 8, 80, 'Kingston A400 480GB SATA SSD', 'kingston-a400-480gb-sata-ssd', 'Boost old laptops with fast boot times and reliable performance. 3 year warranty.', 4450.00, 4090.00, 'active', '2026-04-15 23:59:46', '2026-04-21 16:59:46'),
(51, 6, 12, 38, 'Otobi 6-Seater Dining Table Set', 'otobi-6-seater-dining-table-set', 'Dining table with six upholstered chairs and a glossy tabletop.', 58000.00, 58000.00, 'active', '2026-04-16 17:31:48', '2026-05-04 03:31:48'),
(52, 7, 8, 77, 'Logitech K380 Multi-Device Bluetooth Keyboard', 'logitech-k380-multi-device-bluetooth-keyboard', 'Compact keyboard that pairs with up to three devices and switches with one key.', 3250.00, 3090.00, 'active', '2026-04-16 22:13:49', '2026-04-16 22:13:49'),
(53, 5, 7, 20, 'Xiaomi Redmi 13C (4GB/128GB) - Midnight Black', 'xiaomi-redmi-13c-4gb-128gb-midnight-black', '6.74-inch 90Hz display, 50MP camera and 5000mAh battery in a budget-friendly package.', 12990.00, 11690.00, 'rejected', '2026-04-17 18:16:41', '2026-05-16 01:16:41'),
(54, 2, 9, 27, 'Baseus 20W USB-C Fast Charger', 'baseus-20w-usb-c-fast-charger', 'Compact PD fast charger, compatible with most Android phones and iPhones.', 1090.00, 870.00, 'active', '2026-04-18 15:38:13', '2026-04-18 15:38:13'),
(55, 5, 9, 25, 'JBL Go 3 Portable Bluetooth Speaker', 'jbl-go-3-portable-bluetooth-speaker', 'Pocket-size waterproof speaker with punchy JBL sound and 5 hours of playtime.', 3990.00, 3190.00, 'active', '2026-04-19 12:02:38', '2026-05-18 01:02:38'),
(56, 5, 10, 30, 'Singer 56-inch Ceiling Fan - White', 'singer-56-inch-ceiling-fan-white', 'Energy saving copper motor fan with three blades and smooth low-noise operation.', 3950.00, 3630.00, 'active', '2026-04-20 17:05:41', '2026-04-20 17:05:41'),
(57, 5, 9, 27, 'Baseus 65W GaN Fast Charger with Type-C Cable', 'baseus-65w-gan-fast-charger-with-type-c-cable', 'Compact 65W charger that can power a laptop, tablet and phone with two USB-C ports and one USB-A.', 3250.00, 2920.00, 'active', '2026-04-23 09:30:04', '2026-05-17 05:30:04'),
(58, 6, 11, 36, 'Pigeon Non-stick Cookware Set 3 pcs', 'pigeon-non-stick-cookware-set-3-pcs', 'Fry pan, kadai and tawa set with non-stick coating and induction-compatible base.', 3250.00, 3250.00, 'active', '2026-04-23 14:48:27', '2026-05-15 01:48:27'),
(59, 3, 13, 68, 'Cocola Instant Noodles Masala 8-pack', 'cocola-instant-noodles-masala-8-pack', 'Instant masala noodles cooked in three minutes.', 125.00, 120.00, 'active', '2026-04-24 17:25:15', '2026-05-03 02:25:15'),
(60, 6, 12, 33, 'Philips 18W Round LED Panel Light', 'philips-18w-round-led-panel-light', 'Slim recessed panel light with even glare-free illumination.', 1250.00, 1060.00, 'active', '2026-04-25 09:01:08', '2026-04-29 10:01:08'),
(61, 3, 13, 41, 'ACI Pure Iodized Salt 1kg', 'aci-pure-iodized-salt-1kg', 'Vacuum-evaporated iodized salt packed to stay free-flowing.', 48.00, 48.00, 'active', '2026-04-25 21:05:02', '2026-04-25 21:05:02'),
(62, 7, 8, 72, 'HP 15s Core i5 12th Gen Laptop (8GB/512GB SSD)', 'hp-15s-core-i5-12th-gen-laptop-8gb-512gb-ssd', '15.6-inch FHD anti-glare display, Intel Core i5-1235U and Windows 11. 2 year warranty.', 62500.00, 60590.00, 'out_of_stock', '2026-04-27 13:58:50', '2026-04-27 13:58:50'),
(63, 7, 8, 76, 'Acer Aspire 5 Ryzen 5 Laptop (8GB/512GB SSD)', 'acer-aspire-5-ryzen-5-laptop-8gb-512gb-ssd', 'Metal-look chassis, 15.6-inch FHD IPS display and backlit keyboard.', 58500.00, 56690.00, 'active', '2026-04-27 16:08:35', '2026-04-27 16:08:35'),
(64, 7, 8, 77, 'Logitech M331 Silent Wireless Mouse', 'logitech-m331-silent-wireless-mouse', '90% quieter clicks, 2.4GHz wireless and a 24-month battery life.', 1350.00, 1350.00, 'active', '2026-04-29 09:03:03', '2026-05-14 10:03:03'),
(65, 5, 15, 50, 'Himalaya Purifying Neem Face Wash 150ml', 'himalaya-purifying-neem-face-wash-150ml', 'Soap-free neem and turmeric face wash that helps keep pimples away.', 275.00, 275.00, 'active', '2026-04-30 10:41:37', '2026-04-30 10:41:37'),
(66, 2, 7, 58, 'Apple iPhone 13 (128GB) - Midnight', 'apple-iphone-13-128gb-midnight', 'A15 Bionic chip, dual 12MP cameras and Super Retina XDR display.', 78000.00, 78000.00, 'active', '2026-04-30 12:12:36', '2026-04-30 12:12:36'),
(67, 5, 3, 3, 'Apex Women\'s Block Heel Sandals - Beige', 'apex-womens-block-heel-sandals-beige', 'Comfortable 2-inch block heel sandals with an adjustable ankle strap and padded footbed.', 1890.00, 1890.00, 'active', '2026-04-30 14:39:32', '2026-05-01 03:39:32'),
(68, 8, 15, 90, 'Garnier Men Acno Fight Face Wash 100ml', 'garnier-men-acno-fight-face-wash-100ml', 'Anti-pimple face wash with salicylic acid and lemon extract.', 320.00, 270.00, 'inactive', '2026-05-01 09:08:33', '2026-05-01 09:08:33'),
(69, 1, 2, 6, 'Yellow Women\'s Straight Palazzo Pants - Black', 'yellow-womens-straight-palazzo-pants-black', 'Wide-leg palazzo with an elastic waist and breathable viscose blend.', 1190.00, 950.00, 'active', '2026-05-01 10:50:27', '2026-05-01 15:50:27'),
(70, 5, 1, 2, 'Aarong Men\'s Fatua - Maroon', 'aarong-mens-fatua-maroon', 'Short-length cotton fatua with side pockets and a comfortable regular fit for everyday wear.', 1950.00, 1760.00, 'out_of_stock', '2026-05-03 09:11:26', '2026-05-03 09:11:26'),
(71, 4, 3, 14, 'Lotto Kids Running Shoes - Blue', 'lotto-kids-running-shoes-blue', 'Lightweight kids running shoes with a cushioned sole.', 1890.00, 1510.00, 'inactive', '2026-05-03 14:44:55', '2026-05-29 20:44:55'),
(72, 7, 8, 26, 'Havit Laptop Cooling Pad with Dual Fans', 'havit-laptop-cooling-pad-with-dual-fans', 'Adjustable stand with two quiet fans to keep your laptop cool during long sessions.', 1650.00, 1570.00, 'active', '2026-05-04 09:53:15', '2026-05-18 11:53:15'),
(73, 5, 1, 1, 'Easy Men\'s Regular Fit Formal Shirt - Sky Blue', 'easy-mens-regular-fit-formal-shirt-sky-blue', 'Full sleeve cotton-blend formal shirt with a spread collar. Easy-care fabric that stays crisp through a long office day.', 1650.00, 1650.00, 'inactive', '2026-05-04 11:56:18', '2026-06-01 12:56:18'),
(74, 2, 7, 57, 'Oppo A18 (4GB/128GB) - Glowing Black', 'oppo-a18-4gb-128gb-glowing-black', 'Compact 6.56-inch 90Hz display with a side fingerprint sensor and large battery.', 15490.00, 13940.00, 'active', '2026-05-07 13:46:08', '2026-05-07 13:46:08'),
(75, 5, 9, 24, 'Anker PowerCore 10000mAh Power Bank', 'anker-powercore-10000mah-power-bank', 'Compact 10000mAh power bank with fast charging for phones and small devices. 18-month warranty.', 3650.00, 2920.00, 'active', '2026-05-07 23:28:13', '2026-05-10 06:28:13'),
(76, 7, 8, 78, 'A4Tech Wired Keyboard and Mouse Combo', 'a4tech-wired-keyboard-and-mouse-combo', 'Spill-resistant USB keyboard with matching optical mouse. Bangla layout printed.', 850.00, 780.00, 'active', '2026-05-10 21:11:44', '2026-06-07 03:11:44'),
(77, 5, 1, 8, 'Sailor Men\'s Graphic Round Neck T-Shirt', 'sailor-mens-graphic-round-neck-t-shirt', 'Half sleeve cotton t-shirt with a screen-printed graphic. Soft hand feel and a relaxed fit.', 650.00, 585.00, 'active', '2026-05-10 21:47:15', '2026-06-01 04:47:15'),
(78, 6, 11, 35, 'Prestige Aluminium Kadai 28cm', 'prestige-aluminium-kadai-28cm', 'Thick-base aluminium kadai for even heating, ideal for bhuna and frying.', 1450.00, 1300.00, 'active', '2026-05-14 11:29:57', '2026-06-01 02:29:57'),
(79, 9, 4, 1, 'Easy Kids Cotton Pajama Set - Pack of 2', 'easy-kids-cotton-pajama-set-pack-of-2', 'Two comfortable cotton pajama sets for kids in assorted prints.', 950.00, 760.00, 'active', '2026-05-14 15:02:53', '2026-05-14 15:02:53'),
(80, 1, 2, 55, 'Rang Bangladesh Block Print Salwar Kameez Set', 'rang-bangladesh-block-print-salwar-kameez-set', 'Stitched three-piece set with block-printed kameez and plain cotton salwar.', 3450.00, 3450.00, 'active', '2026-05-18 16:06:19', '2026-05-18 16:06:19'),
(81, 1, 2, 11, 'Kay Kraft Hand-embroidered Nakshi Kameez - Black', 'kay-kraft-hand-embroidered-nakshi-kameez-black', 'Black kameez decorated with hand-done nakshi embroidery. Each piece is slightly unique.', 3750.00, 3380.00, 'active', '2026-05-19 09:30:16', '2026-06-15 17:30:16'),
(82, 5, 2, 6, 'Yellow Women\'s Kurti - Mustard', 'yellow-womens-kurti-mustard', 'Straight-cut cotton kurti with a round neck and three-quarter sleeves. Easy to style with leggings or palazzo.', 1590.00, 1190.00, 'active', '2026-05-19 20:37:17', '2026-05-19 20:37:17'),
(83, 8, 15, 49, 'Nivea Men Oil Control Face Wash 100ml', 'nivea-men-oil-control-face-wash-100ml', 'Face wash with activated charcoal to keep oily skin fresh.', 390.00, 390.00, 'inactive', '2026-05-20 17:28:15', '2026-05-20 17:28:15'),
(84, 3, 13, 43, 'Ispahani Mirzapore Best Leaf Tea 200g', 'ispahani-mirzapore-best-leaf-tea-200g', 'Well-balanced black tea with a rich colour and bright liquor.', 128.00, 128.00, 'active', '2026-05-21 17:59:00', '2026-05-21 17:59:00'),
(85, 6, 12, 37, 'Hatil 3-Seater Fabric Sofa - Grey', 'hatil-3-seater-fabric-sofa-grey', 'Comfortable 3-seater sofa with soft fabric upholstery and high-density foam.', 46500.00, 39490.00, 'active', '2026-05-25 11:45:14', '2026-05-26 17:45:14'),
(86, 5, 13, 40, 'Radhuni Turmeric Powder 200g', 'radhuni-turmeric-powder-200g', 'Pure ground turmeric with rich colour and aroma. Sealed pack keeps spices fresh.', 110.00, 105.00, 'active', '2026-05-25 16:46:48', '2026-05-25 16:46:48'),
(87, 7, 8, 81, 'SanDisk Cruzer Blade 64GB USB Flash Drive', 'sandisk-cruzer-blade-64gb-usb-flash-drive', 'Compact USB 2.0 flash drive with a retractable design.', 750.00, 710.00, 'active', '2026-05-26 13:55:13', '2026-06-15 20:55:13'),
(88, 5, 7, 19, 'Samsung Galaxy A15 (6GB/128GB) - Blue Black', 'samsung-galaxy-a15-6gb-128gb-blue-black', '6.5-inch Super AMOLED display, 50MP triple camera and 5000mAh battery. Official warranty.', 23500.00, 22300.00, 'active', '2026-05-28 15:53:06', '2026-06-22 11:53:06'),
(89, 8, 15, 85, 'Vaseline Intensive Care Body Lotion 400ml', 'vaseline-intensive-care-body-lotion-400ml', 'Deep moisture body lotion for dry skin, absorbs quickly.', 520.00, 440.00, 'inactive', '2026-05-30 16:27:39', '2026-05-30 16:27:39'),
(90, 7, 8, 72, 'HP 14 Ryzen 5 Laptop (8GB/512GB SSD)', 'hp-14-ryzen-5-laptop-8gb-512gb-ssd', 'Slim 14-inch laptop with Ryzen 5 processor and fast NVMe SSD.', 54900.00, 52190.00, 'active', '2026-05-31 12:16:18', '2026-06-16 00:16:18'),
(91, 8, 15, 86, 'Keya Lemon Beauty Soap 100g', 'keya-lemon-beauty-soap-100g', 'Refreshing lemon beauty soap made in Bangladesh.', 45.00, 43.00, 'inactive', '2026-05-31 21:55:08', '2026-06-17 21:55:08'),
(92, 9, 4, 95, 'Nestle Cerelac Wheat and Milk 400g (Stage 1)', 'nestle-cerelac-wheat-and-milk-400g-stage-1', 'Iron-fortified infant cereal for babies from 6 months, made with wheat and milk.', 590.00, 500.00, 'active', '2026-06-02 18:22:14', '2026-06-02 18:22:14'),
(93, 2, 9, 59, 'Remax 10000mAh Slim Power Bank', 'remax-10000mah-slim-power-bank', 'Slim pocket power bank with dual USB output and LED indicator.', 2150.00, 1940.00, 'active', '2026-06-03 21:23:10', '2026-06-03 21:23:10'),
(94, 4, 5, 13, 'Bata Men\'s Leather Belt - Black', 'bata-mens-leather-belt-black', 'Genuine leather belt with a polished pin buckle.', 890.00, 755.00, 'inactive', '2026-06-05 18:54:11', '2026-06-05 18:54:11'),
(95, 5, 2, 2, 'Aarong Dhakai Jamdani Saree - Red and Gold', 'aarong-dhakai-jamdani-saree-red-and-gold', 'Traditional Dhakai jamdani woven on the loom with gold motifs across the body and a rich pallu. Blouse piece included.', 8900.00, 7560.00, 'active', '2026-06-08 12:48:50', '2026-06-08 12:48:50'),
(96, 2, 7, 20, 'Xiaomi Redmi Note 13 (6GB/128GB) - Ice Blue', 'xiaomi-redmi-note-13-6gb-128gb-ice-blue', '6.67-inch AMOLED display, 108MP main camera and 33W fast charging.', 24990.00, 24250.00, 'active', '2026-06-08 15:22:46', '2026-07-08 06:22:46'),
(97, 5, 3, 13, 'Bata Men\'s Casual Sneakers - White', 'bata-mens-casual-sneakers-white', 'Lightweight canvas-upper sneakers with a flexible rubber sole for daily wear.', 2499.00, 2000.00, 'active', '2026-06-08 16:47:39', '2026-06-14 22:47:39'),
(98, 7, 8, 79, 'TP-Link Archer C6 AC1200 Dual-Band Wi-Fi Router', 'tp-link-archer-c6-ac1200-dual-band-wi-fi-router', 'Dual-band Wi-Fi with four antennas and Gigabit ports. Easy setup with the Tether app.', 3650.00, 3540.00, 'active', '2026-06-08 16:58:52', '2026-07-03 03:58:52'),
(99, 7, 8, 75, 'Asus Vivobook 15 Core i5 Laptop (16GB/512GB SSD)', 'asus-vivobook-15-core-i5-laptop-16gb-512gb-ssd', '16GB RAM for multitasking, 15.6-inch FHD display and fingerprint sensor.', 68900.00, 68900.00, 'active', '2026-06-09 13:27:44', '2026-06-20 13:27:44'),
(100, 5, 3, 2, 'Aarong Handmade Leather Kolhapuri Chappal - Tan', 'aarong-handmade-leather-kolhapuri-chappal-tan', 'Hand-stitched leather chappal with a flat sole and traditional toe loop. Softens with wear.', 1650.00, 1400.00, 'active', '2026-06-09 17:23:54', '2026-06-24 23:23:54'),
(101, 6, 12, 33, 'Philips 9W LED Bulb - Pack of 3', 'philips-9w-led-bulb-pack-of-3', 'Energy-saving cool daylight bulbs with a long rated life.', 550.00, 470.00, 'active', '2026-06-09 20:50:14', '2026-06-23 12:50:14'),
(102, 10, 16, 98, 'Nondito Noroke - Humayun Ahmed', 'nondito-noroke-humayun-ahmed', 'A Bangla novel by Humayun Ahmed that remains a bestseller at book fairs. Paperback edition.', 300.00, 270.00, 'active', '2026-06-11 13:05:26', '2026-06-11 13:05:26'),
(103, 9, 4, 94, 'Johnson\'s Baby Shampoo 500ml', 'johnsons-baby-shampoo-500ml', 'Tear-free formula that is gentle on baby\'s hair and eyes.', 470.00, 425.00, 'out_of_stock', '2026-06-11 13:09:58', '2026-06-11 13:09:58'),
(104, 5, 1, 1, 'Easy Men\'s Slim Fit Casual Shirt - Navy Check', 'easy-mens-slim-fit-casual-shirt-navy-check', 'Soft cotton casual shirt with a small check pattern and button-down collar. Pairs well with jeans or chinos.', 1450.00, 1020.00, 'inactive', '2026-06-13 16:07:21', '2026-06-13 16:07:21'),
(105, 5, 17, 53, 'Yonex Muscle Power 29 Badminton Racket', 'yonex-muscle-power-29-badminton-racket', 'Lightweight aluminium racket with a full-length graphite shaft. Comes with a protective cover.', 2650.00, 2250.00, 'out_of_stock', '2026-06-14 09:41:40', '2026-07-11 00:41:40'),
(106, 1, 2, 2, 'Aarong Cotton Block Print Saree - Indigo', 'aarong-cotton-block-print-saree-indigo', 'Indigo cotton saree with hand block prints, popular for office and Pohela Boishakh outfits.', 2950.00, 2210.00, 'out_of_stock', '2026-06-15 16:29:13', '2026-07-06 19:29:13'),
(107, 1, 2, 6, 'Yellow Cotton Long Kurti with Dupatta - Teal', 'yellow-cotton-long-kurti-with-dupatta-teal', 'Long teal kurti with a printed cotton dupatta. Comfortable all-day fit.', 2450.00, 2080.00, 'active', '2026-06-15 22:20:47', '2026-07-02 15:20:47'),
(108, 8, 15, 50, 'Himalaya Nourishing Skin Cream 150ml', 'himalaya-nourishing-skin-cream-150ml', 'Everyday cream with aloe vera and Indian kariyat for soft skin.', 250.00, 225.00, 'inactive', '2026-06-16 10:37:51', '2026-07-07 02:37:51'),
(109, 7, 8, 81, 'SanDisk Extreme 1TB Portable SSD', 'sandisk-extreme-1tb-portable-ssd', 'Up to 1050MB/s transfer speeds, shock resistance and IP55 rating.', 12900.00, 12510.00, 'active', '2026-06-16 12:35:48', '2026-06-16 12:35:48'),
(110, 1, 2, 2, 'Aarong Katan Saree - Bottle Green', 'aarong-katan-saree-bottle-green', 'Katan weave saree with gold-tone motifs on the pallu. Comes with an unstitched blouse piece.', 9400.00, 9400.00, 'active', '2026-06-18 13:39:20', '2026-06-18 13:39:20'),
(111, 10, 16, 16, 'Casio FX-991EX Classwiz Scientific Calculator', 'casio-fx-991ex-classwiz-scientific-calculator', '552 functions with a high-resolution display. Popular for HSC and admission tests.', 3150.00, 3150.00, 'active', '2026-06-19 08:53:53', '2026-06-19 08:53:53'),
(112, 5, 4, 1, 'Easy Kids Denim Shorts - Boys', 'easy-kids-denim-shorts-boys', 'Soft washed denim shorts with an elastic adjustable waist for active kids.', 890.00, 710.00, 'active', '2026-06-21 14:53:39', '2026-06-26 06:53:39'),
(113, 2, 9, 20, 'Xiaomi Portable Bluetooth Speaker 16W', 'xiaomi-portable-bluetooth-speaker-16w', '16W stereo sound with IPX7 waterproofing and 13 hours playtime.', 3250.00, 3090.00, 'active', '2026-06-22 17:08:39', '2026-06-22 17:08:39'),
(114, 10, 16, 103, 'Double A A4 Copy Paper 80gsm - 500 Sheets', 'double-a-a4-copy-paper-80gsm-500-sheets', 'Premium copy paper for printers and photocopiers with minimal jamming.', 620.00, 560.00, 'out_of_stock', '2026-06-23 19:22:18', '2026-06-23 19:22:18'),
(115, 3, 13, 64, 'Marks Full Cream Milk Powder 1kg', 'marks-full-cream-milk-powder-1kg', 'Full cream milk powder made from fresh milk for tea, coffee and desserts.', 690.00, 690.00, 'active', '2026-06-24 08:26:11', '2026-06-24 08:26:11'),
(116, 7, 8, 74, 'Lenovo IdeaPad Slim 3 Core i3 Laptop (8GB/256GB SSD)', 'lenovo-ideapad-slim-3-core-i3-laptop-8gb-256gb-ssd', 'Lightweight everyday laptop with a 15.6-inch FHD display and long battery life.', 46500.00, 42790.00, 'active', '2026-06-25 08:35:19', '2026-07-17 02:35:19'),
(117, 1, 2, 2, 'Aarong Jamdani Saree - Peacock Blue with Silver Border', 'aarong-jamdani-saree-peacock-blue-with-silver-border', 'Handwoven jamdani in deep peacock blue with silver zari border. A wedding-season showpiece.', 12500.00, 9380.00, 'out_of_stock', '2026-06-25 08:41:08', '2026-06-25 08:41:08'),
(118, 8, 15, 91, 'Dove Intense Repair Shampoo 340ml', 'dove-intense-repair-shampoo-340ml', 'Repairs damaged hair with keratin actives and nourishing serum.', 540.00, 515.00, 'inactive', '2026-06-25 11:36:06', '2026-06-25 11:36:06'),
(119, 5, 3, 14, 'Lotto Men\'s Running Shoes - Grey and Blue', 'lotto-mens-running-shoes-grey-and-blue', 'Breathable mesh running shoes with a cushioned midsole and non-slip outsole.', 3490.00, 2620.00, 'active', '2026-06-25 14:17:46', '2026-06-28 08:17:46'),
(120, 5, 10, 28, 'Walton 2-Door Frost-Free Refrigerator 313L', 'walton-2-door-frost-free-refrigerator-313l', 'Inverter compressor, frost-free cooling and toughened glass shelves. Comes with 10-year compressor warranty.', 52900.00, 47590.00, 'active', '2026-06-26 23:52:26', '2026-06-26 23:52:26'),
(121, 2, 9, 20, 'Xiaomi Smart Band 8 - Black', 'xiaomi-smart-band-8-black', '1.62-inch AMOLED fitness band with 150+ sports modes and 16-day battery life.', 4250.00, 3610.00, 'rejected', '2026-06-27 09:48:46', '2026-07-06 01:48:46'),
(122, 3, 14, 44, 'Pran Potata Potato Crackers 6-pack', 'pran-potata-potato-crackers-6-pack', 'Crunchy salted potato crackers in convenient snack packs.', 60.00, 57.00, 'active', '2026-06-29 21:17:01', '2026-07-28 14:17:01'),
(123, 10, 16, 101, 'Faber-Castell Colour Pencils - 24 Shades', 'faber-castell-colour-pencils-24-shades', 'Vibrant, break-resistant colour pencils in a tin box.', 690.00, 690.00, 'inactive', '2026-07-01 09:15:59', '2026-07-01 09:15:59'),
(124, 8, 15, 83, 'Parachute Pure Coconut Oil 500ml', 'parachute-pure-coconut-oil-500ml', '100% pure coconut oil for hair and skin. Sealed in a leak-proof bottle.', 290.00, 290.00, 'inactive', '2026-07-03 11:15:35', '2026-07-26 22:15:35'),
(125, 6, 11, 34, 'RFL Cooler Ice Box 20L', 'rfl-cooler-ice-box-20l', 'Insulated ice box that keeps food and drinks cold for picnics and travel.', 1850.00, 1480.00, 'active', '2026-07-03 17:18:42', '2026-07-03 17:18:42'),
(126, 2, 7, 20, 'Xiaomi Redmi Pad SE (4GB/128GB) - Graphite Gray', 'xiaomi-redmi-pad-se-4gb-128gb-graphite-gray', '11-inch 90Hz display, Snapdragon processor and 8000mAh battery.', 24500.00, 22550.00, 'active', '2026-07-03 17:37:16', '2026-07-21 23:37:16'),
(127, 10, 16, 105, 'Parker Vector Standard Fountain Pen - Blue', 'parker-vector-standard-fountain-pen-blue', 'Stainless steel fountain pen with a medium nib. Ideal as a gift.', 1650.00, 1650.00, 'active', '2026-07-03 19:40:52', '2026-07-22 09:40:52'),
(128, 6, 11, 34, 'RFL Melamine Dinner Set 32-Piece', 'rfl-melamine-dinner-set-32-piece', 'Elegant melamine dinner set for 8 people including bowls, plates and dessert dishes.', 3650.00, 3650.00, 'active', '2026-07-03 22:16:32', '2026-07-25 17:16:32'),
(129, 9, 4, 94, 'Johnson\'s Baby Powder 400g', 'johnsons-baby-powder-400g', 'Keeps baby\'s skin dry and comfortable, with a light fragrance.', 380.00, 305.00, 'active', '2026-07-06 13:01:53', '2026-07-27 02:01:53'),
(130, 10, 16, 100, 'Matador Whiteboard Marker Set - 4 Colours', 'matador-whiteboard-marker-set-4-colours', 'Dry-erase markers with a bullet tip, easy to wipe off.', 220.00, 210.00, 'active', '2026-07-07 15:56:17', '2026-08-04 02:56:17'),
(131, 5, 10, 32, 'Jamuna Electric Kettle 1.8L Stainless Steel', 'jamuna-electric-kettle-1-8l-stainless-steel', 'Auto shut-off kettle with concealed heating element and a cool-touch handle.', 1450.00, 1230.00, 'active', '2026-07-08 19:22:23', '2026-07-18 06:22:23'),
(132, 5, 14, 45, 'Ruchi Jhal Muri Chanachur 400g', 'ruchi-jhal-muri-chanachur-400g', 'Spicy crunchy chanachur mix, perfect with puffed rice or on its own.', 110.00, 110.00, 'rejected', '2026-07-09 14:45:01', '2026-07-09 14:45:01'),
(133, 5, 6, 17, 'Titan Neo Slim Men\'s Watch - Brown Leather Strap', 'titan-neo-slim-mens-watch-brown-leather-strap', 'Slim analog dress watch with mineral glass and genuine leather strap.', 6995.00, 5600.00, 'out_of_stock', '2026-07-09 15:22:41', '2026-08-04 01:22:41'),
(134, 3, 13, 40, 'Radhuni Coriander Powder 200g', 'radhuni-coriander-powder-200g', 'Freshly ground coriander powder with a warm citrusy aroma.', 90.00, 90.00, 'active', '2026-07-10 14:31:07', '2026-07-20 08:31:07'),
(135, 8, 15, 88, 'Meril Baby Lotion 200ml', 'meril-baby-lotion-200ml', 'Gentle baby lotion with milk protein for delicate skin.', 210.00, 180.00, 'inactive', '2026-07-10 20:26:12', '2026-07-29 09:26:12'),
(136, 6, 11, 31, 'Vision Induction Cooker 2000W', 'vision-induction-cooker-2000w', 'Touch panel induction cooker with 8 power levels and auto shut-off.', 3890.00, 3890.00, 'active', '2026-07-11 09:06:06', '2026-08-03 23:06:06'),
(137, 9, 4, 97, 'Hot Wheels 5-Car Gift Pack', 'hot-wheels-5-car-gift-pack', 'Five die-cast cars in assorted designs. Ages 3+.', 1190.00, 1190.00, 'active', '2026-07-11 17:57:05', '2026-07-12 21:57:05'),
(138, 7, 8, 79, 'TP-Link TL-WR840N 300Mbps Wireless Router', 'tp-link-tl-wr840n-300mbps-wireless-router', 'Budget Wi-Fi router for small homes with two external antennas.', 1250.00, 1210.00, 'active', '2026-07-12 20:38:24', '2026-08-02 08:38:24'),
(139, 3, 13, 40, 'Radhuni Chili Powder 200g', 'radhuni-chili-powder-200g', 'Bright red chili powder ground from carefully selected chilies.', 125.00, 125.00, 'active', '2026-07-15 12:43:24', '2026-07-15 12:43:24'),
(140, 9, 4, 2, 'Aarong Kids Panjabi Set - Maroon (7-8 Years)', 'aarong-kids-panjabi-set-maroon-7-8-years', 'Maroon cotton panjabi with pajama for boys, ideal for Eid and weddings.', 1850.00, 1660.00, 'active', '2026-07-16 13:11:44', '2026-07-25 13:11:44'),
(141, 8, 15, 89, 'Colgate MaxFresh Toothpaste 200g', 'colgate-maxfresh-toothpaste-200g', 'Cooling crystals for long-lasting fresh breath.', 210.00, 200.00, 'inactive', '2026-07-17 19:58:19', '2026-08-10 19:58:19'),
(142, 6, 11, 34, 'RFL Plastic Water Jug 2L - Set of 4', 'rfl-plastic-water-jug-2l-set-of-4', 'Food-grade plastic jugs with lids. Suitable for water, juice and lassi.', 890.00, 710.00, 'active', '2026-07-18 12:44:04', '2026-07-19 03:44:04'),
(143, 10, 16, 102, 'Pentel Highlighter Set - Pack of 5', 'pentel-highlighter-set-pack-of-5', 'Fluorescent highlighters with a chisel tip for study notes.', 420.00, 420.00, 'active', '2026-07-20 14:05:58', '2026-08-18 17:05:58'),
(144, 5, 12, 2, 'Aarong Nakshi Kantha Bedspread - Queen Size', 'aarong-nakshi-kantha-bedspread-queen-size', 'Hand-stitched nakshi kantha bedspread with traditional motifs, made by rural women artisans.', 6500.00, 5520.00, 'rejected', '2026-07-20 23:56:59', '2026-07-20 23:56:59'),
(145, 4, 3, 14, 'Lotto Men\'s Slides - Black and Red', 'lotto-mens-slides-black-and-red', 'Soft EVA slides with a contoured footbed. Good after a workout or at home.', 990.00, 840.00, 'inactive', '2026-07-24 22:51:22', '2026-07-29 08:51:22'),
(146, 3, 13, 44, 'Pran Mustard Oil 1L', 'pran-mustard-oil-1l', 'Pure kachi ghani mustard oil with a strong pungent aroma.', 235.00, 235.00, 'active', '2026-07-25 11:54:31', '2026-07-25 11:54:31'),
(147, 2, 9, 59, 'Remax Fast Charging Cable 1m - Type-C', 'remax-fast-charging-cable-1m-type-c', 'Braided nylon Type-C cable with 3A fast charging support.', 350.00, 330.00, 'active', '2026-07-25 18:14:46', '2026-07-30 23:14:46'),
(148, 3, 13, 67, 'Aarong Dairy Sweet Yogurt 500g', 'aarong-dairy-sweet-yogurt-500g', 'Creamy set sweet yogurt in an earthen-style pot. Best served chilled.', 140.00, 140.00, 'active', '2026-07-26 20:29:14', '2026-08-13 11:29:14'),
(149, 2, 9, 25, 'JBL Tune 510BT Wireless On-ear Headphones', 'jbl-tune-510bt-wireless-on-ear-headphones', 'Pure Bass sound, 40 hours battery and multipoint connection.', 4890.00, 4400.00, 'active', '2026-07-28 13:20:05', '2026-07-28 13:20:05'),
(150, 5, 12, 37, 'Hatil Wooden Bookshelf - 5 Tier', 'hatil-wooden-bookshelf-5-tier', 'Engineered wood bookshelf with a walnut finish and adjustable feet. Assembly service available.', 9800.00, 8820.00, 'active', '2026-07-28 22:20:15', '2026-08-23 13:20:15'),
(151, 5, 15, 47, 'Lux Soft Touch Beauty Soap 100g', 'lux-soft-touch-beauty-soap-100g', 'Creamy beauty soap with silk extract and a floral fragrance.', 60.00, 51.00, 'rejected', '2026-07-30 19:12:07', '2026-07-30 19:12:07'),
(152, 7, 8, 73, 'Dell Inspiron 15 Core i5 Laptop (8GB/512GB SSD)', 'dell-inspiron-15-core-i5-laptop-8gb-512gb-ssd', '15.6-inch FHD 120Hz display with a full-size keyboard and numeric keypad.', 66500.00, 63190.00, 'active', '2026-07-31 11:03:52', '2026-08-07 18:03:52'),
(153, 4, 3, 3, 'Apex Women\'s Wedge Sandal - Gold', 'apex-womens-wedge-sandal-gold', 'Gold wedge sandals with a cushioned heel and adjustable buckle.', 1990.00, 1490.00, 'inactive', '2026-08-01 18:55:28', '2026-08-09 01:55:28'),
(154, 3, 13, 66, 'Milk Vita Pasteurized Liquid Milk 1L', 'milk-vita-pasteurized-liquid-milk-1l', 'Fresh pasteurized liquid milk from Bangladeshi dairy farmers. Keep refrigerated.', 90.00, 90.00, 'active', '2026-08-03 21:24:37', '2026-08-03 21:24:37'),
(155, 9, 4, 96, 'LEGO Classic Medium Creative Brick Box', 'lego-classic-medium-creative-brick-box', '484 colourful bricks for open-ended building and imaginative play. Ages 4+.', 4890.00, 4160.00, 'active', '2026-08-06 09:05:03', '2026-08-06 09:05:03'),
(156, 4, 3, 13, 'Bata Men\'s Sports Sneakers - Blue', 'bata-mens-sports-sneakers-blue', 'Breathable sports sneakers with a flexible outsole for daily use.', 2890.00, 2460.00, 'inactive', '2026-08-07 12:44:36', '2026-08-27 03:44:36'),
(157, 1, 2, 11, 'Kay Kraft Kantha Stitch Shawl - Mustard', 'kay-kraft-kantha-stitch-shawl-mustard', 'Hand-stitched kantha shawl for winter evenings, lightly padded and easy to fold.', 3200.00, 2880.00, 'active', '2026-08-07 16:30:29', '2026-08-07 16:30:29'),
(158, 3, 13, 61, 'Pusti Soyabean Oil 2L', 'pusti-soyabean-oil-2l', 'Vitamin A fortified soyabean oil with a neutral taste.', 360.00, 340.00, 'active', '2026-08-08 15:08:44', '2026-08-17 07:08:44'),
(159, 2, 6, 21, 'Realme Watch 3 Smartwatch - Black', 'realme-watch-3-smartwatch-black', '1.8-inch display, Bluetooth calling and SpO2 monitoring.', 4990.00, 4990.00, 'active', '2026-08-10 12:38:00', '2026-08-31 06:38:00'),
(160, 5, 9, 20, 'Xiaomi Redmi Buds 4 Active True Wireless Earbuds', 'xiaomi-redmi-buds-4-active-true-wireless-earbuds', 'Bluetooth 5.3 earbuds with 12mm drivers, 28 hours total battery and IPX4 splash resistance.', 2350.00, 2350.00, 'active', '2026-08-10 15:51:22', '2026-08-10 15:51:22'),
(161, 9, 4, 6, 'Yellow Girls Floral Frock', 'yellow-girls-floral-frock', 'Cotton frock with a flared skirt and small floral print.', 1190.00, 1010.00, 'active', '2026-08-11 09:41:15', '2026-08-25 05:41:15'),
(162, 4, 5, 2, 'Aarong Jute Handbag with Leather Handle', 'aarong-jute-handbag-with-leather-handle', 'Natural jute handbag with leather handles and a zippered inner pocket.', 1650.00, 1320.00, 'inactive', '2026-08-11 16:43:02', '2026-08-11 16:43:02'),
(163, 6, 12, 37, 'Hatil Wooden Coffee Table - Walnut', 'hatil-wooden-coffee-table-walnut', 'Solid engineered wood coffee table with a lower shelf for magazines.', 8900.00, 7560.00, 'active', '2026-08-12 18:44:33', '2026-08-21 11:44:33'),
(164, 5, 1, 2, 'Aarong Cotton Panjabi for Men - Off White', 'aarong-cotton-panjabi-for-men-off-white', 'Handcrafted cotton panjabi with fine embroidery along the placket. A classic pick for Eid and Friday prayers.', 2850.00, 2140.00, 'active', '2026-08-13 13:02:01', '2026-09-10 02:02:01'),
(165, 8, 15, 48, 'Sunsilk Soft & Smooth Shampoo 650ml', 'sunsilk-soft-smooth-shampoo-650ml', 'Argan oil shampoo that leaves hair smooth and manageable.', 620.00, 620.00, 'inactive', '2026-08-13 16:44:18', '2026-08-19 17:44:18'),
(166, 4, 3, 2, 'Aarong Leather Nagra Shoes - Tan', 'aarong-leather-nagra-shoes-tan', 'Hand-crafted leather nagra with traditional pointed toe and embroidered upper.', 2250.00, 1910.00, 'inactive', '2026-08-13 17:39:42', '2026-08-13 17:39:42'),
(167, 10, 16, 101, 'Faber-Castell Classic Pencil - Pack of 12', 'faber-castell-classic-pencil-pack-of-12', 'HB graphite pencils with sturdy leads and a smooth finish.', 240.00, 215.00, 'active', '2026-08-13 23:46:18', '2026-08-13 23:46:18'),
(168, 6, 12, 11, 'Kay Kraft Hand-painted Jute Floor Mat', 'kay-kraft-hand-painted-jute-floor-mat', 'Durable jute floor mat with hand-painted borders. Easy to clean.', 1250.00, 1000.00, 'active', '2026-08-14 13:58:34', '2026-08-19 09:58:34'),
(169, 10, 16, 98, 'Deyal - Humayun Ahmed', 'deyal-humayun-ahmed', 'A popular Bangla novel by Humayun Ahmed. Paperback edition.', 340.00, 340.00, 'active', '2026-08-16 10:47:42', '2026-09-04 15:47:42'),
(170, 5, 12, 33, 'Philips Rechargeable LED Table Lamp', 'philips-rechargeable-led-table-lamp', 'Eye-care LED lamp with three brightness levels and a built-in rechargeable battery.', 1890.00, 1700.00, 'active', '2026-08-17 12:13:26', '2026-08-17 12:13:26'),
(171, 10, 16, 100, 'Matador Ball Pen Blue - Pack of 20', 'matador-ball-pen-blue-pack-of-20', 'Smooth writing 0.7mm ball pens with a comfortable grip.', 200.00, 190.00, 'out_of_stock', '2026-08-17 14:42:41', '2026-08-18 16:42:41'),
(172, 4, 3, 13, 'Bata Girls\' Mary Jane School Shoes - Black', 'bata-girls-mary-jane-school-shoes-black', 'Black Mary Jane style school shoes with a hook-and-loop strap.', 1499.00, 1350.00, 'inactive', '2026-08-18 10:18:17', '2026-08-24 21:18:17'),
(173, 10, 16, 99, 'Masud Rana: Dhongsho Pahar - Qazi Anwar Hussain', 'masud-rana-dhongsho-pahar-qazi-anwar-hussain', 'The first title of the classic Bangla spy thriller series. Pocket paperback.', 180.00, 180.00, 'inactive', '2026-08-20 20:31:31', '2026-08-20 20:31:31'),
(174, 5, 6, 16, 'Casio Women\'s Analog Watch - Rose Gold', 'casio-womens-analog-watch-rose-gold', 'Elegant rose gold tone bracelet watch with a small dial for women.', 5200.00, 4160.00, 'active', '2026-08-20 21:12:25', '2026-09-10 10:12:25'),
(175, 4, 3, 3, 'Apex Women\'s Ballet Flats - Black', 'apex-womens-ballet-flats-black', 'Everyday ballet flats with a padded footbed and non-slip sole.', 1490.00, 1120.00, 'inactive', '2026-08-21 12:00:05', '2026-08-21 12:00:05'),
(176, 4, 5, 15, 'American Tourister 20-inch Cabin Trolley - Navy', 'american-tourister-20-inch-cabin-trolley-navy', 'Cabin-size hard-shell trolley with spinner wheels and a built-in combination lock.', 8990.00, 7640.00, 'inactive', '2026-08-21 14:18:34', '2026-08-21 14:18:34'),
(177, 9, 4, 6, 'Yellow Boys Graphic T-Shirt', 'yellow-boys-graphic-t-shirt', 'Soft cotton crew neck tee with a fun print. Machine washable.', 690.00, 690.00, 'active', '2026-08-21 20:33:54', '2026-08-24 08:33:54'),
(178, 8, 15, 47, 'Lux Velvet Touch Beauty Soap 150g', 'lux-velvet-touch-beauty-soap-150g', 'Creamy soap with jasmine and almond oil for soft skin.', 78.00, 74.00, 'inactive', '2026-08-21 22:15:59', '2026-09-16 18:15:59'),
(179, 2, 7, 19, 'Samsung Galaxy Tab A9 (4GB/64GB) - Graphite', 'samsung-galaxy-tab-a9-4gb-64gb-graphite', '8.7-inch tablet with a metal body and quad speakers for streaming and reading.', 22900.00, 21050.00, 'active', '2026-08-22 11:37:51', '2026-08-22 11:37:51'),
(180, 9, 4, 93, 'Huggies Wonder Pants Large 48 pcs', 'huggies-wonder-pants-large-48-pcs', 'Pull-up style diapers with a stretchy waist and leak protection.', 1690.00, 1350.00, 'active', '2026-08-22 19:02:56', '2026-09-11 05:02:56'),
(181, 5, 13, 42, 'Fresh Refined Sugar 1kg', 'fresh-refined-sugar-1kg', 'Free-flowing refined white sugar packed under hygienic conditions.', 140.00, 135.00, 'active', '2026-08-23 20:36:37', '2026-09-03 15:36:37'),
(182, 10, 16, 104, 'Camlin Geometry Box Set', 'camlin-geometry-box-set', 'Complete geometry box with compass, dividers, protractor and set squares.', 240.00, 230.00, 'rejected', '2026-08-25 22:40:22', '2026-09-05 00:40:22'),
(183, 8, 15, 82, 'Lifebuoy Total 10 Hand Wash Refill 200ml', 'lifebuoy-total-10-hand-wash-refill-200ml', 'Germ protection hand wash refill. Kills 99.9% of germs.', 95.00, 95.00, 'inactive', '2026-08-26 18:23:14', '2026-09-03 14:23:14'),
(184, 5, 1, 6, 'Yellow Men\'s Chino Pants - Khaki', 'yellow-mens-chino-pants-khaki', 'Cotton twill chinos with a tapered fit and stretch waist. Smart enough for the office, relaxed enough for weekends.', 2290.00, 2060.00, 'active', '2026-08-26 20:15:13', '2026-08-26 20:15:13'),
(185, 2, 9, 19, 'Samsung 25W Super Fast Charger with Cable', 'samsung-25w-super-fast-charger-with-cable', 'Original Samsung 25W travel adapter with a Type-C cable.', 1450.00, 1380.00, 'active', '2026-08-27 09:55:40', '2026-08-27 09:55:40'),
(186, 5, 3, 3, 'Apex Men\'s Leather Formal Shoes - Black', 'apex-mens-leather-formal-shoes-black', 'Genuine leather lace-up formal shoes with cushioned insole and durable TPR sole.', 3290.00, 2960.00, 'active', '2026-08-27 15:00:56', '2026-09-06 04:00:56'),
(187, 10, 16, 100, 'Matador Exercise Khata 200 Pages - Pack of 5', 'matador-exercise-khata-200-pages-pack-of-5', 'Ruled exercise books with strong binding and quality paper.', 425.00, 380.00, 'active', '2026-08-27 16:07:33', '2026-08-27 16:07:33'),
(188, 5, 2, 12, 'Le Reve Women\'s Cotton Salwar Kameez Set - Teal', 'le-reve-womens-cotton-salwar-kameez-set-teal', 'Stitched three-piece set with printed kameez, plain salwar and matching dupatta. Available in multiple sizes.', 3100.00, 2640.00, 'active', '2026-08-29 12:04:19', '2026-09-03 03:04:19'),
(189, 9, 4, 97, 'Barbie Fashionistas Doll', 'barbie-fashionistas-doll', 'Fashion doll with stylish outfit and accessories. Ages 3+.', 1890.00, 1890.00, 'out_of_stock', '2026-08-29 13:44:50', '2026-08-29 13:44:50'),
(190, 1, 2, 10, 'Ecstasy Georgette Party Saree - Wine', 'ecstasy-georgette-party-saree-wine', 'Flowy georgette saree with sequin work on the border. Ideal for parties and receptions.', 3900.00, 2920.00, 'active', '2026-08-30 19:46:32', '2026-08-30 19:46:32'),
(191, 6, 12, 2, 'Aarong Nakshi Kantha Bedcover - King Size', 'aarong-nakshi-kantha-bedcover-king-size', 'Hand-stitched nakshi kantha bedcover in traditional patterns. Reversible.', 7900.00, 7900.00, 'rejected', '2026-08-31 10:29:09', '2026-09-20 22:00:00'),
(192, 1, 2, 1, 'Easy Women\'s Casual Top - Floral Print', 'easy-womens-casual-top-floral-print', 'Short sleeve viscose top with a relaxed fit and small floral print.', 1290.00, 1030.00, 'active', '2026-09-01 15:38:30', '2026-09-01 15:38:30'),
(193, 6, 12, 2, 'Aarong Handloom Cotton Bedsheet Set - Double', 'aarong-handloom-cotton-bedsheet-set-double', 'Breathable handloom cotton bedsheet with two pillow covers.', 2850.00, 2560.00, 'active', '2026-09-01 15:49:02', '2026-09-01 15:49:02'),
(194, 2, 9, 24, 'Anker 20000mAh 22.5W Power Bank', 'anker-20000mah-22-5w-power-bank', 'High capacity power bank with fast charging and two output ports.', 5750.00, 4890.00, 'active', '2026-09-01 16:14:30', '2026-09-02 04:14:30'),
(195, 8, 15, 84, 'Pond\'s Bright Beauty Face Wash 100g', 'ponds-bright-beauty-face-wash-100g', 'Face wash with vitamin B3 for a brighter, clearer look.', 240.00, 215.00, 'inactive', '2026-09-01 21:17:07', '2026-09-20 22:00:00'),
(196, 5, 17, 51, 'Kookaburra Kahuna Cricket Bat - Size 6', 'kookaburra-kahuna-cricket-bat-size-6', 'Kashmir-style willow bat with a full profile and comfortable rubber grip, suitable for club and tennis-ball cricket.', 7900.00, 7110.00, 'out_of_stock', '2026-09-02 09:02:05', '2026-09-15 20:02:05'),
(197, 5, 14, 44, 'Pran Frooto Mango Fruit Drink 1L', 'pran-frooto-mango-fruit-drink-1l', 'Ready-to-drink mango fruit drink made with real mango pulp. Serve chilled.', 85.00, 78.00, 'active', '2026-09-04 13:34:00', '2026-09-04 13:34:00'),
(198, 5, 12, 2, 'Aarong Cotton Bedsheet Set with 2 Pillow Covers - Double', 'aarong-cotton-bedsheet-set-with-2-pillow-covers-double', 'Pure cotton bedsheet in a bold block print. Colours stay bright after repeated washing.', 3250.00, 2600.00, 'active', '2026-09-05 16:03:02', '2026-09-06 10:03:02'),
(199, 5, 5, 3, 'Apex Genuine Leather Men&amp;#039;s Wallet - Black', 'apex-genuine-leather-men-amp-039-s-wallet-black', 'Bi-fold leather wallet with 6 card slots, coin pocket and two note compartments.', 1050.00, 890.00, 'active', '2026-09-06 10:27:06', '2026-09-21 10:13:58'),
(200, 5, 2, 10, 'Ecstasy Women&#039;s Three-Piece Unstitched Set - Floral Print', 'ecstasy-women-039-s-three-piece-unstitched-set-floral-print', 'Printed cotton kameez piece with matching salwar and chiffon dupatta. Unstitched, ready for your tailor.', 2850.00, 2280.00, 'active', '2026-09-06 12:18:44', '2026-09-21 10:12:53'),
(201, 5, 15, 49, 'Nivea Soft Light Moisturising Cream 300ml', 'nivea-soft-light-moisturising-cream-300ml', 'Non-greasy cream with jojoba oil and vitamin E for face, hands and body.', 690.00, 620.00, 'active', '2026-09-06 19:00:59', '2026-09-21 10:07:23'),
(202, 3, 13, 41, 'ACI Pure Atta 2kg', 'aci-pure-atta-2kg', 'Whole wheat flour, finely milled for soft roti and paratha.', 118.00, 115.00, 'active', '2026-09-06 19:13:39', '2026-09-20 22:00:00'),
(203, 5, 17, 52, 'Adidas Starlancer Football - Size 5', 'adidas-starlancer-football-size-5', 'Machine-stitched football with a durable TPU cover and a butyl bladder for long air retention.', 2450.00, 2200.00, 'rejected', '2026-09-07 10:53:29', '2026-09-21 10:07:14'),
(204, 5, 5, 2, 'Aarong Leather Laptop Backpack - Brown', 'aarong-leather-laptop-backpack-brown', 'Genuine leather backpack with padded compartment for 15-inch laptops and two front pockets.', 3850.00, 2890.00, 'active', '2026-09-07 13:34:37', '2026-09-21 10:07:04'),
(205, 5, 10, 31, 'Vision 3-in-1 Blender 500W', 'vision-3-in-1-blender-500w', 'Blender, grinder and chopper in one. Stainless steel blades with two speed settings and pulse.', 3490.00, 3489.00, 'out_of_stock', '2026-09-07 16:17:02', '2026-09-21 10:06:52'),
(206, 5, 1, 9, 'Dorjibari Men&amp;#039;s Fitted Panjabi - Sky Blue', 'dorjibari-men-amp-039-s-fitted-panjabi-sky-blue', 'Slim fit cotton panjabi with contrast piping on the collar and cuffs. Comes with pajama string closure.', 2450.00, 2200.00, 'active', '2026-09-07 17:25:45', '2026-09-21 10:06:42'),
(207, 10, 16, 102, 'Pentel Energel Gel Pen 0.7mm - Pack of 3', 'pentel-energel-gel-pen-0-7mm-pack-of-3', 'Quick-drying gel ink pens for smudge-free writing.', 480.00, 479.00, 'active', '2026-09-07 17:54:17', '2026-09-21 10:11:21'),
(208, 7, 8, 72, 'HP DeskJet Ink Advantage 2338 All-in-One Printer', 'hp-deskjet-ink-advantage-2338-all-in-one-printer', 'Print, scan and copy at home with an affordable ink cartridge system.', 9500.00, 8740.00, 'pending_review', '2026-09-07 20:19:23', '2026-09-20 22:00:00'),
(209, 5, 10, 33, 'Philips Steam Iron 1400W', 'philips-steam-iron-1400w', 'Non-stick soleplate with variable steam control, spray function and anti-drip design.', 2890.00, 2750.00, 'draft', '2026-09-08 18:13:10', '2026-09-21 10:06:27'),
(210, 5, 7, 23, 'Tecno Spark 20 (8GB/128GB) - Gravity Black', 'tecno-spark-20-8gb-128gb-gravity-black', '6.6-inch 90Hz display, 50MP main camera and 18W fast charging.', 15990.00, 15510.00, 'active', '2026-09-09 14:10:10', '2026-09-21 10:06:19'),
(211, 9, 4, 92, 'Pampers Baby Dry Diapers Medium 58 pcs', 'pampers-baby-dry-diapers-medium-58-pcs', 'Up to 12 hours of dryness with three absorbing channels and a soft cover.', 1850.00, 1849.00, 'active', '2026-09-09 18:09:45', '2026-09-21 10:10:07'),
(212, 5, 13, 39, 'Teer Soyabean Oil 5L', 'teer-soyabean-oil-5l', 'Refined and fortified soyabean oil for everyday cooking. Bangladesh&amp;#039;s most recognised cooking oil brand.', 885.00, 884.00, 'active', '2026-09-10 08:12:28', '2026-09-21 10:06:09'),
(213, 2, 7, 56, 'Vivo Y28 (6GB/128GB) - Crystal Purple', 'vivo-y28-6gb-128gb-crystal-purple', '6.56-inch display, 50MP camera and 5000mAh battery with 15W charging.', 20990.00, 19310.00, 'pending_review', '2026-09-10 20:32:04', '2026-09-16 04:32:04'),
(214, 1, 2, 55, 'Rang Bangladesh Handloom Cotton Saree - Mustard', 'rang-bangladesh-handloom-cotton-saree-mustard', 'Mustard handloom saree with contrast border and a soft texture that improves with washing.', 2650.00, 2120.00, 'active', '2026-09-10 22:21:21', '2026-09-21 10:01:53'),
(215, 8, 15, 87, 'Savlon Antiseptic Liquid 250ml', 'savlon-antiseptic-liquid-250ml', 'Trusted antiseptic liquid for cuts, scrapes and household cleaning.', 190.00, 189.00, 'inactive', '2026-09-10 22:25:47', '2026-09-21 09:59:59'),
(216, 2, 9, 27, 'Baseus Magnetic Wireless Charger 15W', 'baseus-magnetic-wireless-charger-15w', 'MagSafe-compatible wireless charger with a non-slip pad.', 2450.00, 2200.00, 'active', '2026-09-11 20:44:58', '2026-09-21 10:01:48'),
(217, 5, 14, 46, 'Olympic Energy Plus Biscuit Family Pack', 'olympic-energy-plus-biscuit-family-pack', 'Crisp wheat biscuits for tea time, packed in a family-size box.', 150.00, 140.00, 'draft', '2026-09-11 22:27:39', '2026-09-21 10:01:41'),
(218, 5, 9, 26, 'Havit Wired Over-ear Headphones with Mic', 'havit-wired-over-ear-headphones-with-mic', 'Padded ear cups, in-line microphone and 3.5mm jack. Good for online classes and calls.', 1450.00, 1300.00, 'active', '2026-09-12 20:30:09', '2026-09-21 10:01:36'),
(219, 5, 5, 11, 'Kay Kraft Hand-painted Jute Tote Bag', 'kay-kraft-hand-painted-jute-tote-bag', 'Eco-friendly jute shopping tote with hand-painted floral design and a cotton-lined interior.', 950.00, 760.00, 'inactive', '2026-09-13 15:34:49', '2026-09-21 10:01:29'),
(220, 3, 14, 46, 'Olympic Nutty Biscuit 12-pack', 'olympic-nutty-biscuit-12-pack', 'Crunchy peanut flavoured biscuits, great with tea.', 130.00, 120.00, 'active', '2026-09-15 10:47:33', '2026-09-20 22:00:00'),
(221, 6, 12, 2, 'Aarong Terracotta Flower Vase - Set of 2', 'aarong-terracotta-flower-vase-set-of-2', 'Hand-moulded terracotta vases with a natural earthy finish.', 1350.00, 1220.00, 'out_of_stock', '2026-09-15 22:35:13', '2026-09-21 10:01:18'),
(222, 5, 17, 54, 'Nike Dri-FIT Men&amp;#039;s Training T-Shirt - Black', 'nike-dri-fit-men-amp-039-s-training-t-shirt-black', 'Sweat-wicking Dri-FIT fabric with a relaxed cut for gym, run or football practice.', 3250.00, 2600.00, 'rejected', '2026-09-17 22:53:34', '2026-09-21 10:01:09'),
(223, 5, 4, 2, 'Aarong Kids Panjabi Set - Sky Blue (5-6 Years)', 'aarong-kids-panjabi-set-sky-blue-5-6-years', 'Cotton panjabi and pajama set for boys with light embroidery. A festive favourite for Eid.', 1650.00, 1649.00, 'active', '2026-09-18 08:36:04', '2026-09-21 10:01:02'),
(224, 3, 13, 39, 'Teer Soyabean Oil 1L', 'teer-soyabean-oil-1l', 'Refined fortified soyabean oil in a 1 litre bottle for daily cooking.', 185.00, 184.00, 'active', '2026-09-19 11:11:38', '2026-09-21 09:57:46'),
(225, 1, 2, 11, 'Kay Kraft Cotton Dupatta with Tassels - Red', 'kay-kraft-cotton-dupatta-with-tassels-red', 'Soft red cotton dupatta with woven border and tassel ends.', 1150.00, 1149.00, 'out_of_stock', '2026-09-20 10:08:57', '2026-09-21 09:57:17'),
(226, 5, 11, 34, 'RFL Melamine Dinner Set 24-Piece', 'rfl-melamine-dinner-set-24-piece', 'Durable melamine plates, bowls and side dishes with a floral border. Microwave-safe for reheating only.', 2850.00, 2849.00, 'draft', '2026-09-20 11:01:14', '2026-09-21 09:55:56'),
(227, 5, 1, 7, 'Lee Cooper Men Straight Fit Jeans - Black', 'lee-cooper-men-straight-fit-jeans-black', 'Straight fit black denim with a mid rise and durable metal buttons. Colour-fast fabric.', 3290.00, 2630.00, 'active', '2026-09-20 15:22:19', '2026-09-21 10:09:11'),
(229, 5, 12, 34, 'Quon Wells', 'quon-wells', 'Eum fugit et tempor', 374.00, 370.00, 'pending_review', '2026-09-21 13:29:53', '2026-09-21 13:29:53'),
(230, 5, 5, 68, 'Maggie Gonzalez', 'maggie-gonzalez', 'Vel earum voluptatem', 581.00, 500.00, 'active', '2026-09-21 14:06:40', '2026-09-21 14:06:59');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', '2026-09-20 22:18:04', '2026-09-20 22:18:04'),
(2, 'Moderator', '2026-09-20 22:18:04', '2026-09-20 22:18:04'),
(3, 'Vendor', '2026-09-20 22:18:04', '2026-09-20 22:18:04'),
(4, 'Customer', '2026-09-20 22:18:04', '2026-09-20 22:18:04');

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

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `role_id` bigint(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `profile_image` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `role_id`, `email`, `phone`, `password`, `profile_image`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 1, 'admin@example.com', '(323) 731-4032', '$2y$12$75CvHttXfIrDEQEDGqfBneU1ZYBXwfI3T3gFTjaN4q0CT1PCclTLW', NULL, NULL, NULL, '2026-10-17 11:28:31', '2026-10-17 11:28:31'),
(2, 'moderator', 2, 'moderator@example.com', '+1.678.896.7979', '$2y$12$gOZC5PFl4xiuG0cTq9chLOpLSMPqtfpK/iVQJm4sfuDQTZkoF/nWq', NULL, NULL, NULL, '2026-10-17 11:28:31', '2026-10-17 11:28:31'),
(3, 'vendor', 3, 'vendor@example.com', '+1-458-827-4388', '$2y$12$7GiO7bBZSez/gyMpK5W7H.XiSR2e2c5efNxHs.d3dWxG3n.7O3m/W', NULL, NULL, NULL, '2026-10-17 11:28:31', '2026-10-17 11:28:31'),
(4, 'Sohel Rana', 2, 'sohel.rana@example.com', '+8801930310265', '$2y$12$p.bnxX71MOH2.WWESmQaEOt3JAxlXh8ej8oxmDT.LsF6LkeOOD7aW', NULL, NULL, NULL, '2026-01-09 10:30:12', '2026-01-09 10:30:12'),
(5, 'Arif Hossain', 4, 'arif.hossain@example.com', '+8801855154169', '$2y$12$p.bnxX71MOH2.WWESmQaEOt3JAxlXh8ej8oxmDT.LsF6LkeOOD7aW', NULL, NULL, NULL, '2026-04-15 08:59:33', '2026-04-15 08:59:33'),
(6, 'Tasnim Sultana', 4, 'tasnim.sultana@example.com', '+8801908836478', '$2y$12$p.bnxX71MOH2.WWESmQaEOt3JAxlXh8ej8oxmDT.LsF6LkeOOD7aW', NULL, NULL, NULL, '2026-04-19 11:09:40', '2026-04-19 11:09:40'),
(7, 'Mahmudul Hasan', 4, 'mahmudul.hasan@example.com', '+8801720960439', '$2y$12$p.bnxX71MOH2.WWESmQaEOt3JAxlXh8ej8oxmDT.LsF6LkeOOD7aW', NULL, NULL, NULL, '2026-09-13 18:43:48', '2026-09-13 18:43:48'),
(8, 'Farhana Rahman', 3, 'farhana.rahman@example.com', '+8801799732920', '$2y$12$p.bnxX71MOH2.WWESmQaEOt3JAxlXh8ej8oxmDT.LsF6LkeOOD7aW', NULL, NULL, NULL, '2026-01-07 06:20:36', '2026-01-07 06:20:36'),
(9, 'Sadia Afrin', 4, 'sadia.afrin@example.com', '+8801756603307', '$2y$12$p.bnxX71MOH2.WWESmQaEOt3JAxlXh8ej8oxmDT.LsF6LkeOOD7aW', NULL, NULL, NULL, '2026-03-26 22:56:34', '2026-03-26 22:56:34'),
(10, 'Tanvir Ahmed', 3, 'tanvir.ahmed@example.com', '+8801809743620', '$2y$12$p.bnxX71MOH2.WWESmQaEOt3JAxlXh8ej8oxmDT.LsF6LkeOOD7aW', NULL, NULL, NULL, '2026-01-20 12:05:12', '2026-01-20 12:05:12'),
(11, 'Rakibul Islam', 4, 'rakibul.islam@example.com', '+8801600278326', '$2y$12$p.bnxX71MOH2.WWESmQaEOt3JAxlXh8ej8oxmDT.LsF6LkeOOD7aW', NULL, NULL, NULL, '2026-04-14 13:45:21', '2026-04-14 13:45:21'),
(12, 'Nabila Chowdhury', 4, 'nabila.chowdhury@example.com', '+8801415286946', '$2y$12$p.bnxX71MOH2.WWESmQaEOt3JAxlXh8ej8oxmDT.LsF6LkeOOD7aW', NULL, NULL, NULL, '2026-03-25 23:53:07', '2026-03-25 23:53:07'),
(13, 'Md. Abdul Karim', 3, 'abdul.karim@example.com', '+8801902309251', '$2y$12$p.bnxX71MOH2.WWESmQaEOt3JAxlXh8ej8oxmDT.LsF6LkeOOD7aW', NULL, NULL, NULL, '2026-01-29 08:48:55', '2026-01-29 08:48:55'),
(14, 'Sourav Saha', 4, 'sourav.saha@example.com', '+8801577984131', '$2y$12$p.bnxX71MOH2.WWESmQaEOt3JAxlXh8ej8oxmDT.LsF6LkeOOD7aW', NULL, NULL, NULL, '2026-08-27 13:56:32', '2026-08-27 13:56:32'),
(15, 'Shamim Hossain', 3, 'shamim.hossain@example.com', '+8801767284843', '$2y$12$p.bnxX71MOH2.WWESmQaEOt3JAxlXh8ej8oxmDT.LsF6LkeOOD7aW', NULL, NULL, NULL, '2026-02-10 08:31:09', '2026-02-10 08:31:09'),
(16, 'Nusrat Jahan', 3, 'nusrat.jahan@example.com', '+8801807284975', '$2y$12$p.bnxX71MOH2.WWESmQaEOt3JAxlXh8ej8oxmDT.LsF6LkeOOD7aW', NULL, NULL, NULL, '2026-03-17 14:40:27', '2026-03-17 14:40:27'),
(17, 'Mim Akter', 4, 'mim.akter@example.com', '+8801990102883', '$2y$12$p.bnxX71MOH2.WWESmQaEOt3JAxlXh8ej8oxmDT.LsF6LkeOOD7aW', NULL, NULL, NULL, '2026-03-12 20:59:46', '2026-03-12 20:59:46'),
(18, 'Mahfuzur Rahman', 3, 'mahfuzur.rahman@example.com', '+8801606449720', '$2y$12$p.bnxX71MOH2.WWESmQaEOt3JAxlXh8ej8oxmDT.LsF6LkeOOD7aW', NULL, NULL, NULL, '2026-04-01 10:12:44', '2026-04-01 10:12:44'),
(19, 'Anisur Rahman', 4, 'anisur.rahman@example.com', '+8801360173497', '$2y$12$p.bnxX71MOH2.WWESmQaEOt3JAxlXh8ej8oxmDT.LsF6LkeOOD7aW', NULL, NULL, NULL, '2026-05-08 18:13:27', '2026-05-08 18:13:27'),
(20, 'Jannatul Ferdous', 4, 'jannatul.ferdous@example.com', '+8801862765668', '$2y$12$p.bnxX71MOH2.WWESmQaEOt3JAxlXh8ej8oxmDT.LsF6LkeOOD7aW', NULL, NULL, NULL, '2026-06-01 22:42:11', '2026-06-01 22:42:11'),
(21, 'Tuhin Mia', 4, 'tuhin.mia@example.com', '+8801726681594', '$2y$12$p.bnxX71MOH2.WWESmQaEOt3JAxlXh8ej8oxmDT.LsF6LkeOOD7aW', NULL, NULL, NULL, '2026-03-06 15:16:05', '2026-03-06 15:16:05'),
(22, 'Shirin Akter', 3, 'shirin.akter@example.com', '+8801997533888', '$2y$12$p.bnxX71MOH2.WWESmQaEOt3JAxlXh8ej8oxmDT.LsF6LkeOOD7aW', NULL, NULL, NULL, '2026-04-19 07:03:18', '2026-04-19 07:03:18'),
(23, 'Sumaiya Islam', 3, 'sumaiya.islam@example.com', '+8801718010104', '$2y$12$p.bnxX71MOH2.WWESmQaEOt3JAxlXh8ej8oxmDT.LsF6LkeOOD7aW', NULL, NULL, NULL, '2026-05-03 10:27:50', '2026-05-03 10:27:50'),
(24, 'Priya Barua', 4, 'priya.barua@example.com', '+8801978927242', '$2y$12$p.bnxX71MOH2.WWESmQaEOt3JAxlXh8ej8oxmDT.LsF6LkeOOD7aW', NULL, NULL, NULL, '2026-04-01 19:13:09', '2026-04-01 19:13:09'),
(25, 'Sabbir Ahmed', 4, 'sabbir.ahmed@example.com', '+8801320456659', '$2y$12$p.bnxX71MOH2.WWESmQaEOt3JAxlXh8ej8oxmDT.LsF6LkeOOD7aW', NULL, NULL, NULL, '2026-06-13 15:34:58', '2026-06-13 15:34:58'),
(26, 'Lamia Tabassum', 4, 'lamia.tabassum@example.com', '+8801967804394', '$2y$12$p.bnxX71MOH2.WWESmQaEOt3JAxlXh8ej8oxmDT.LsF6LkeOOD7aW', NULL, NULL, NULL, '2026-09-16 15:26:17', '2026-09-16 15:26:17'),
(27, 'Nazmul Huda', 4, 'nazmul.huda@example.com', '+8801716139023', '$2y$12$p.bnxX71MOH2.WWESmQaEOt3JAxlXh8ej8oxmDT.LsF6LkeOOD7aW', NULL, NULL, NULL, '2026-07-05 10:30:31', '2026-07-05 10:30:31'),
(28, 'Abu Sayeed Chowdhury', 3, 'abu.sayeed@example.com', '+8801379999918', '$2y$12$p.bnxX71MOH2.WWESmQaEOt3JAxlXh8ej8oxmDT.LsF6LkeOOD7aW', NULL, NULL, NULL, '2026-05-25 09:36:05', '2026-05-25 09:36:05'),
(29, 'Ishrat Jahan', 4, 'ishrat.jahan@example.com', '+8801436812635', '$2y$12$p.bnxX71MOH2.WWESmQaEOt3JAxlXh8ej8oxmDT.LsF6LkeOOD7aW', NULL, NULL, NULL, '2026-04-10 13:01:39', '2026-04-10 13:01:39'),
(30, 'Kamrul Islam', 4, 'kamrul.islam@example.com', '+8801819232001', '$2y$12$p.bnxX71MOH2.WWESmQaEOt3JAxlXh8ej8oxmDT.LsF6LkeOOD7aW', NULL, NULL, NULL, '2026-03-30 12:02:49', '2026-03-30 12:02:49');

-- --------------------------------------------------------

--
-- Table structure for table `vendors`
--

CREATE TABLE `vendors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `shop_name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `commission_rate` decimal(10,2) NOT NULL DEFAULT 10.00,
  `status` varchar(255) NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vendors`
--

INSERT INTO `vendors` (`id`, `user_id`, `shop_name`, `slug`, `description`, `commission_rate`, `status`, `created_at`, `updated_at`) VALUES
(1, 8, 'Rupkotha Fashion House', 'rupkotha-fashion-house', 'Curated collection of Bangladesh\'s favourite saree, three-piece and kurti brands for weddings, Eid and everyday wear. Based in Dhanmondi, Dhaka, with home delivery across the country.', 12.00, 'active', '2026-01-14 11:20:36', '2026-01-14 11:20:36'),
(2, 10, 'Tech Bazar BD', 'tech-bazar-bd', 'Authorized reseller of smartphones, tablets and mobile accessories with official warranty. Showroom at Multiplan Center, New Elephant Road, with delivery all over Bangladesh.', 8.00, 'active', '2026-01-22 15:05:12', '2026-01-22 15:05:12'),
(3, 13, 'Bhorer Bazar', 'bhorer-bazar', 'Fresh groceries, cooking essentials and daily staples delivered from our Mirpur warehouse. Trusted local brands at fair prices with same-day delivery inside Dhaka.', 6.50, 'active', '2026-02-03 09:48:55', '2026-02-03 09:48:55'),
(4, 15, 'Padma Footwear & Bags', 'padma-footwear-bags', 'Family footwear and travel bags from popular local and international brands. Showroom in Agrabad, Chattogram, serving customers since 2019.', 10.00, 'suspended', '2026-02-18 13:31:09', '2026-02-18 13:31:09'),
(5, 3, 'Sonar Tori Mega Store', 'sonar-tori-mega-store', 'One-stop lifestyle store for fashion, mobile phones, electronics, home appliances and daily needs. Genuine products from trusted Bangladeshi and international brands, easy 7-day returns and nationwide delivery.', 10.00, 'active', '2026-03-02 10:15:00', '2026-03-02 10:15:00'),
(6, 16, 'Nakshi Home & Living', 'nakshi-home-living', 'Handcrafted decor, furniture and kitchenware inspired by Bangladeshi tradition. Workshop and showroom in Narayanganj with delivery to all major cities.', 12.50, 'active', '2026-03-19 16:40:27', '2026-03-19 16:40:27'),
(7, 18, 'Byte Zone Computers', 'byte-zone-computers', 'Laptops, desktop accessories and networking gear with brand warranty. Shop at BCS Computer City, Agargaon, Dhaka. EMI available on selected cards.', 7.50, 'active', '2026-04-05 12:12:44', '2026-04-05 12:12:44'),
(8, 22, 'Sundori Beauty Corner', 'sundori-beauty-corner', 'Skin care, hair care and personal care essentials from trusted brands. Store in Sector 7, Uttara, Dhaka.', 15.00, 'inactive', '2026-04-21 10:03:18', '2026-04-21 10:03:18'),
(9, 23, 'Chotto Bondhu Kids Store', 'chotto-bondhu-kids-store', 'Baby care, toys and kids\' clothing for ages 0 to 12. Store in Bashundhara R/A, Dhaka, with cash on delivery available.', 10.00, 'active', '2026-05-11 14:27:50', '2026-05-11 14:27:50'),
(10, 28, 'Puthi Ghar Books & Stationery', 'puthi-ghar-books-stationery', 'Bangla and English books, school supplies and office stationery. Serving students and offices from Nilkhet, Dhaka, with nationwide courier delivery.', 9.00, 'active', '2026-06-02 11:36:05', '2026-06-02 11:36:05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_expiration_index` (`expiration`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_locks_expiration_index` (`expiration`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`),
  ADD KEY `failed_jobs_connection_queue_failed_at_index` (`connection`,`queue`,`failed_at`);

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
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `media_uuid_unique` (`uuid`),
  ADD KEY `media_model_type_model_id_index` (`model_type`,`model_id`),
  ADD KEY `media_order_column_index` (`order_column`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `orders_order_number_unique` (`order_number`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_statuses`
--
ALTER TABLE `order_statuses`
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
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`),
  ADD KEY `personal_access_tokens_expires_at_index` (`expires_at`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
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
  ADD UNIQUE KEY `users_phone_unique` (`phone`);

--
-- Indexes for table `vendors`
--
ALTER TABLE `vendors`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

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
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_statuses`
--
ALTER TABLE `order_statuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=231;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `vendors`
--
ALTER TABLE `vendors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
