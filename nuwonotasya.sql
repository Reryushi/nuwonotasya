-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 10 Agu 2020 pada 07.23
-- Versi server: 10.4.13-MariaDB
-- Versi PHP: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `coba`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `events`
--

CREATE TABLE `events` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `venue` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `capacity` int(11) NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `events`
--

INSERT INTO `events` (`id`, `name`, `image`, `date`, `venue`, `price`, `capacity`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Holi 2018', '1.jpg', '2018-05-18', 'Hotel Garden Area', 2500, 550, 'Albatross Concert and Holi Celebration 2018. Enjoy with live music and tank wash after holi.', 1, '2020-07-01 23:05:15', NULL),
(2, 'Food Festa', '2.jpg', '2018-04-18', 'Hotel Garden Area', 3500, 350, 'Cultural Performance with food testing sessions.', 1, '2020-07-01 23:05:15', NULL),
(3, 'South Asian Youth Summit', '3.jpg', '2018-04-20', 'Leonat Conference Hall', 0, 250, 'Discussion of youth involvement in protection of cultural heritage.', 1, '2020-07-01 23:05:15', NULL),
(4, 'Regional Minority Society Conference', '4.jpg', '2018-04-15', 'Darfurd Conference Hall', 0, 100, 'Leaders of minority society discuss the involvement in politics.', 1, '2020-07-01 23:05:15', NULL),
(5, 'Bankers Society Annual Summit', '5.jpg', '2018-04-10', 'Kafe Conference Hall', 5400, 60, 'Talks by industry veterans on Central Bank limits on foreign loans.', 1, '2020-07-01 23:05:15', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `events2`
--

CREATE TABLE `events2` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `extra_bed` int(5) DEFAULT NULL,
  `room_cost` int(30) DEFAULT NULL,
  `status` char(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_time` datetime NOT NULL,
  `end_time` datetime NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `room_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `events2`
--

INSERT INTO `events2` (`id`, `title`, `extra_bed`, `room_cost`, `status`, `start_time`, `end_time`, `description`, `created_at`, `updated_at`, `deleted_at`, `room_id`, `user_id`) VALUES
(32, '1', NULL, 300000, NULL, '2020-07-24 20:50:00', '2020-07-24 20:50:00', '1', '2020-07-24 06:53:48', '2020-07-24 06:53:48', NULL, 3, 2),
(33, '2', NULL, 300000, NULL, '2020-07-24 20:50:00', '2020-07-24 20:50:00', '2', '2020-07-24 06:54:00', '2020-07-24 06:54:00', NULL, 1, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `event_bookings`
--

CREATE TABLE `event_bookings` (
  `id` int(10) UNSIGNED NOT NULL,
  `number_of_tickets` int(11) NOT NULL,
  `total_cost` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `payment` tinyint(1) NOT NULL DEFAULT 0,
  `user_id` int(10) UNSIGNED NOT NULL,
  `event_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `facilities`
--

CREATE TABLE `facilities` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `facilities`
--

INSERT INTO `facilities` (`id`, `name`, `icon`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Air Conditioner', 'air_conditioner.png', 1, '2020-07-01 23:05:15', NULL),
(2, 'Anytime HotWater', 'hotwater.png', 1, NULL, NULL),
(3, 'Parking', 'parking.png', 1, '2020-07-01 23:05:15', NULL),
(4, 'Television', 'television.png', 1, '2020-07-01 23:05:15', NULL),
(5, 'Wifi', 'wifi.png', 1, '2020-07-01 23:05:15', NULL),
(6, 'Fan', 'fan.png', 1, '2020-08-10 04:52:57', '2020-08-10 04:52:57');

-- --------------------------------------------------------

--
-- Struktur dari tabel `facility_room_type`
--

CREATE TABLE `facility_room_type` (
  `facility_id` int(10) UNSIGNED NOT NULL,
  `room_type_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `facility_room_type`
--

INSERT INTO `facility_room_type` (`facility_id`, `room_type_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2020-07-01 23:05:15', NULL),
(3, 1, '2020-07-01 23:05:15', NULL),
(4, 1, '2020-07-01 23:05:15', NULL),
(5, 1, '2020-07-01 23:05:15', NULL),
(1, 2, '2020-07-01 23:05:15', NULL),
(3, 2, '2020-07-01 23:05:15', NULL),
(3, 3, '2020-07-01 23:05:15', NULL),
(5, 3, '2020-07-01 23:05:15', NULL),
(2, 1, NULL, NULL),
(6, 3, '2020-08-09 21:53:44', '2020-08-09 21:53:44'),
(5, 2, '2020-08-09 21:59:01', '2020-08-09 21:59:01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `foods`
--

CREATE TABLE `foods` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` enum('Appetizer','Soup','Salad','Main Course','Dessert') COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `description` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `foods`
--

INSERT INTO `foods` (`id`, `name`, `type`, `image`, `price`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Sizzling Gambas', 'Appetizer', '15.jpg', '630.00', 'Sizzling gambas is made with a combination of shrimp and vegetables.', 1, '2020-07-01 23:05:15', NULL),
(2, 'Calamares', 'Appetizer', 'calamares.jpg', '630.00', 'Calamares is the Filipino version of the Mediterranean breaded fried squid dish, Calamari.', 1, '2020-07-01 23:05:15', NULL),
(3, 'Tinolang Manok', 'Soup', 'tinolang_manok.jpg', '530.00', 'Tinola in Tagalog or Visayan, is a soup-based dish served as an main dish in the Philippines.', 1, '2020-07-01 23:05:15', NULL),
(4, 'Chicken Sotanghon Soup', 'Soup', 'chicken_sotanghon_soup.jpg', '410.00', 'Chicken Sotanghon Soup is a soup made with bite-sized chicken, cellophane noodles and vegetables.', 1, '2020-07-01 23:05:15', NULL),
(5, 'Mixed Green Salad', 'Salad', 'mixed_green_salad.jpg', '370.00', 'Garlic, crushed red pepper flakes season the light vinaigrette that dresses this refreshing salad.', 1, '2020-07-01 23:05:15', NULL),
(6, 'Chef\'s Salad', 'Salad', 'chef_salad.jpg', '400.00', 'Chef salad is an American salad consisting of eggs, meat, chicken, tomatoes, cucumbers and cheese.', 1, '2020-07-01 23:05:15', NULL),
(7, 'Beefsteak Tagalog', 'Main Course', 'beefsteak_tagalog.jpg', '650.00', 'Beefsteak Tagalog is a dish of pieces of salted and peppered sirloin.', 1, '2020-07-01 23:05:15', NULL),
(8, 'Cordon Bleu', 'Main Course', 'cordon_bleu.jpg', '630.00', 'A cordon bleu is a dish of meat wrapped around cheese, then breaded and pan-fried or deep-fried.', 1, '2020-07-01 23:05:15', NULL),
(9, 'Chicken Pork Adobo', 'Main Course', 'chicken_pork_adobo.jpg', '630.00', 'Chicken Pork Adobo is a version of classic Filipino stew combining chicken pieces and pork cubes.', 1, '2020-07-01 23:05:15', NULL),
(10, 'Grilled Squid', 'Main Course', 'grilled_squid.jpg', '550.00', 'The simple grilled squid recipe uses a fantastic cumin marinade for a Middle Eastern twist.', 1, '2020-07-01 23:05:15', NULL),
(11, 'Fresh Fruit Platter', 'Dessert', 'fresh_fruit_platter.jpg', '300.00', 'It is a base of ripe, colorful, sliced melons and pineapples.', 1, '2020-07-01 23:05:15', NULL),
(12, 'Banana Split', 'Dessert', 'banana_split.jpg', '360.00', 'A banana split is an ice cream-based dessert.', 1, '2020-07-01 23:05:15', NULL),
(13, 'Chocolate Vanilla Sundae', 'Dessert', 'chocolate_vanilla_sundae.jpeg', '200.00', 'This is a rich sundae made with brownies, vanilla ice cream, chocolate syrup, and whipped cream.', 1, '2020-07-01 23:05:15', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `images`
--

CREATE TABLE `images` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `caption` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_primary` tinyint(1) NOT NULL DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `room_type_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `images`
--

INSERT INTO `images` (`id`, `name`, `caption`, `is_primary`, `status`, `room_type_id`, `created_at`, `updated_at`) VALUES
(1, 'kanjeng.jpg', 'VIP', 1, 1, 1, '2020-07-01 23:05:15', '2020-08-09 22:17:11'),
(4, 'kyai.jpg', 'DELUXE', 1, 1, 2, '2020-07-01 23:05:15', '2020-08-09 21:42:36'),
(33, 'adien.jpg', 'STANDAR', 1, 1, 3, '2020-08-07 22:14:19', '2020-08-09 21:42:47');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_03_29_024654_create_slider_table', 1),
(4, '2018_03_29_024713_create_facilities_table', 1),
(5, '2018_03_29_024753_create_room_types_table', 1),
(6, '2018_03_29_024939_create_facility_room_type_table', 1),
(7, '2018_03_29_025055_create_images_table', 1),
(8, '2018_03_29_025121_create_rooms_table', 1),
(9, '2018_03_29_025157_create_room_bookings_table', 1),
(10, '2018_03_29_025158_create_reviews_table', 1),
(11, '2018_03_29_031146_create_foods_table', 1),
(12, '2018_03_29_031207_create_food_orders_table', 1),
(13, '2018_04_07_022022_create_events_table', 1),
(14, '2018_04_08_025158_create_event_bookings_table', 1),
(15, '2018_05_06_035355_create_pages_table', 1),
(16, '2018_05_06_050318_create_subscribers_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pages`
--

CREATE TABLE `pages` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url_title` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pages`
--

INSERT INTO `pages` (`id`, `title`, `url_title`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'About', 'about', 'Nuwono Tasya Guesthouse merupakan sebuah tempat penginapan, dengan mengedepankan budaya adat lampung, yang menjadikannya daya tarik tersendiri. Lokasi dari Nuwono Tasya Guesthouse sendiri juga dapat dibilang cukup strategis. Sistem kepegawaian di Nuwono Tasya juga bersifat half-family, dimana semua pegawai atau karyawan disini dianggap keluarga, tetapi masih dengan profesionalitas kerja masing masing', 1, '2020-07-01 23:05:15', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `reviews`
--

CREATE TABLE `reviews` (
  `id` int(10) UNSIGNED NOT NULL,
  `review` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rating` enum('0','1','2','3','4','5') COLLATE utf8mb4_unicode_ci NOT NULL,
  `approval_status` enum('pending','approved','rejected') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `room_booking_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `rooms`
--

CREATE TABLE `rooms` (
  `id` int(10) UNSIGNED NOT NULL,
  `room_number` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `available` tinyint(1) NOT NULL DEFAULT 1,
  `status` text COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Available',
  `room_type_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `capacity` char(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `rooms`
--

INSERT INTO `rooms` (`id`, `room_number`, `description`, `available`, `status`, `room_type_id`, `created_at`, `updated_at`, `capacity`, `deleted_at`) VALUES
(1, '1', '', 1, 'Available', 1, '2020-07-01 23:05:15', '2020-07-01 23:05:15', 'VIP', NULL),
(2, '2', '', 1, 'Available', 1, '2020-07-01 23:05:15', '2020-07-01 23:05:15', 'VIP', NULL),
(3, '3', '', 1, 'Available', 1, '2020-07-01 23:05:15', '2020-07-01 23:05:15', 'VIP', NULL),
(4, '4', '', 1, 'Available', 2, '2020-07-01 23:05:15', '2020-07-01 23:05:15', 'DELUXE', NULL),
(5, '5', '', 0, 'Available', 2, '2020-07-01 23:05:15', '2020-07-01 23:05:15', 'DELUXE', NULL),
(6, '6', '', 1, 'Available', 2, '2020-07-01 23:05:15', '2020-07-01 23:05:15', 'DELUXE', NULL),
(7, '7', '', 0, 'Available', 2, '2020-07-01 23:05:15', '2020-07-01 23:05:15', 'DELUXE', NULL),
(8, '8', '', 1, 'Available', 2, '2020-07-01 23:05:15', '2020-07-01 23:05:15', 'DELUXE', NULL),
(9, '9', '', 0, 'Available', 2, '2020-07-01 23:05:15', '2020-07-01 23:05:15', 'DELUXE', NULL),
(10, '10', '', 1, 'Available', 2, '2020-07-01 23:05:15', '2020-07-01 23:05:15', 'DELUXE', NULL),
(11, '11', '', 0, 'Available', 2, '2020-07-01 23:05:15', '2020-07-01 23:05:15', 'DELUXE', NULL),
(12, '12', '', 0, 'Available', 3, '2020-07-01 23:05:15', '2020-07-01 23:05:15', 'STANDAR', NULL),
(13, '13', '', 1, 'Available', 3, '2020-07-01 23:05:15', '2020-07-01 23:05:15', 'STANDAR', NULL),
(14, '14', '', 1, 'Available', 3, '2020-07-01 23:05:15', '2020-07-01 23:05:15', 'STANDAR', NULL),
(15, '15', '', 1, 'Available', 3, '2020-07-01 23:05:15', '2020-07-01 23:05:15', 'STANDAR', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `room_bookings`
--

CREATE TABLE `room_bookings` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `room_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `start_time` datetime NOT NULL,
  `end_time` datetime DEFAULT NULL,
  `extra_bed` int(20) DEFAULT 0,
  `room_cost` int(11) NOT NULL,
  `status` enum('pending','checked_in','checked_out','cancelled') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `payment` tinyint(1) DEFAULT 0,
  `bukti` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `room_bookings`
--

INSERT INTO `room_bookings` (`id`, `title`, `room_id`, `user_id`, `start_time`, `end_time`, `extra_bed`, `room_cost`, `status`, `payment`, `bukti`, `created_at`, `updated_at`, `deleted_at`) VALUES
(110, 'VIP (Kanjeng)', 1, 1, '2020-08-08 00:00:00', '2020-08-09 00:00:00', NULL, 300000, 'pending', 0, NULL, '2020-08-07 22:01:53', '2020-08-07 22:01:53', NULL),
(111, 'DELUXE (Kyai)', 4, 1, '2020-08-08 00:00:00', '2020-08-09 00:00:00', NULL, 160000, 'pending', 0, NULL, '2020-08-07 22:02:06', '2020-08-07 22:02:06', NULL),
(112, 'VIP (Kanjeng)', 2, 1, '2020-08-08 00:00:00', '2020-08-12 00:00:00', NULL, 1200000, 'pending', 0, NULL, '2020-08-07 22:02:21', '2020-08-07 22:02:21', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `room_types`
--

CREATE TABLE `room_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cost_per_day` int(11) NOT NULL,
  `extra_bed` int(2) DEFAULT NULL,
  `discount_percentage` int(11) NOT NULL DEFAULT 0,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `room_types`
--

INSERT INTO `room_types` (`id`, `name`, `cost_per_day`, `extra_bed`, `discount_percentage`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'VIP (Kanjeng)', 300000, 2, 0, 'KANJENG', 1, '2020-07-01 23:05:14', '2020-07-01 23:05:14'),
(2, 'DELUXE (Kyai)', 160000, 1, 0, 'KIAY', 1, '2020-07-01 23:05:14', '2020-07-01 23:05:14'),
(3, 'STANDAR (Adien)', 125000, 1, 0, 'ADIEN', 1, '2020-07-01 23:05:14', '2020-07-01 23:05:14');

-- --------------------------------------------------------

--
-- Struktur dari tabel `slider`
--

CREATE TABLE `slider` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `small_title` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `big_title` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link_text` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `slider`
--

INSERT INTO `slider` (`id`, `name`, `small_title`, `big_title`, `description`, `link`, `link_text`, `status`, `created_at`, `updated_at`) VALUES
(1, 'BG_nuwono.jpg', 'Pemandangan Taman yang Indah', 'Garden', NULL, NULL, 'Book Now', 1, '2020-07-01 23:05:14', '2020-08-02 20:26:47');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nik` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` enum('male','female','others') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` enum('admin','user') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `nik`, `gender`, `phone`, `email`, `password`, `role`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'Sistem', 'others', '07834542', 'admin@mail.com', '$2y$10$yMGYfcY0rG.6u8/Drez5/uQ0Gtx.VfloEXBdApGP5Xb..pot8JHCO', 'admin', 1, 'cZkOq1nHbZKp2n0Efx28x4Vlu2WkmxKXf5HB7wJdtwwbcUPByS05JcwMPR7G', '2020-07-12 03:08:38', '2020-07-12 03:08:38'),
(2, 'Alingga', 'Maheswara', 'male', '9866893439', 'alingga@mail.com', '$2y$10$UPwKWivl/BeeMmTBw8ds8Oc3LZA5oP.bpjRouxDjd2lKbWy0v1sRu', 'user', 1, 'mGwYgZYV42lTFUixfsJjF4iF0pD3XylpYcQua7CcnzRLEHdJcE2v0sDOiyGh', '2020-07-01 23:05:14', '2020-07-12 04:00:01'),
(3, 'Assyanggi Okta', 'Harahap', 'male', NULL, 'assyanggi@gmail.com', '$2y$10$BM6xxX1qhdq9GiyG8Qy.lOy8FQh.WjbrIFWutxTRMsI.UcorIQv3W', 'user', 1, 'bxpLh1j51wQizGYWlLrhKsuPtdyaMmOBGleOcPwnIYo81dB4VEz5HZCgz6Nm', '2020-07-09 00:45:56', '2020-07-09 00:45:56'),
(122, 'tester', '0975667', 'male', '0976567', 'tester@mail.com', '$2y$10$sjOWHE2IvT3GqIAOfeeGzeHKChbEpD2OAieIH2k7zoYzZnNLWei3e', 'user', 1, '44oftGpOUhrGF6wZmJzNeCrtKmoJ8DDwhH8DFA9eKtvLkVDeL8ls0s7dveAU', '2020-08-02 23:25:54', '2020-08-02 23:25:54');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `events_name_unique` (`name`);

--
-- Indeks untuk tabel `events2`
--
ALTER TABLE `events2`
  ADD PRIMARY KEY (`id`),
  ADD KEY `eventsrooms_room_id_foreign` (`room_id`),
  ADD KEY `eventsrooms_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `event_bookings`
--
ALTER TABLE `event_bookings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `event_bookings_user_id_index` (`user_id`),
  ADD KEY `event_bookings_event_id_index` (`event_id`);

--
-- Indeks untuk tabel `facilities`
--
ALTER TABLE `facilities`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `facilities_name_unique` (`name`);

--
-- Indeks untuk tabel `facility_room_type`
--
ALTER TABLE `facility_room_type`
  ADD KEY `facility_room_type_facility_id_index` (`facility_id`),
  ADD KEY `facility_room_type_room_type_id_index` (`room_type_id`);

--
-- Indeks untuk tabel `foods`
--
ALTER TABLE `foods`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `images_room_type_id_index` (`room_type_id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reviews_room_booking_id_index` (`room_booking_id`);

--
-- Indeks untuk tabel `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `rooms_room_number_unique` (`room_number`),
  ADD KEY `rooms_room_type_id_index` (`room_type_id`);

--
-- Indeks untuk tabel `room_bookings`
--
ALTER TABLE `room_bookings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `room_bookings_room_id_index` (`room_id`),
  ADD KEY `room_bookings_user_id_index` (`user_id`);

--
-- Indeks untuk tabel `room_types`
--
ALTER TABLE `room_types`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `room_types_name_unique` (`name`);

--
-- Indeks untuk tabel `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nik` (`nik`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `events`
--
ALTER TABLE `events`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `events2`
--
ALTER TABLE `events2`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT untuk tabel `event_bookings`
--
ALTER TABLE `event_bookings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `facilities`
--
ALTER TABLE `facilities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

--
-- AUTO_INCREMENT untuk tabel `foods`
--
ALTER TABLE `foods`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `images`
--
ALTER TABLE `images`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;

--
-- AUTO_INCREMENT untuk tabel `room_bookings`
--
ALTER TABLE `room_bookings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- AUTO_INCREMENT untuk tabel `room_types`
--
ALTER TABLE `room_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `events2`
--
ALTER TABLE `events2`
  ADD CONSTRAINT `eventsrooms_room_id_foreign` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `eventsrooms_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `event_bookings`
--
ALTER TABLE `event_bookings`
  ADD CONSTRAINT `event_bookings_event_id_foreign` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `event_bookings_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `facility_room_type`
--
ALTER TABLE `facility_room_type`
  ADD CONSTRAINT `facility_room_type_facility_id_foreign` FOREIGN KEY (`facility_id`) REFERENCES `facilities` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `facility_room_type_room_type_id_foreign` FOREIGN KEY (`room_type_id`) REFERENCES `room_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `images_room_type_id_foreign` FOREIGN KEY (`room_type_id`) REFERENCES `room_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_room_booking_id_foreign` FOREIGN KEY (`room_booking_id`) REFERENCES `room_bookings` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `rooms`
--
ALTER TABLE `rooms`
  ADD CONSTRAINT `rooms_room_type_id_foreign` FOREIGN KEY (`room_type_id`) REFERENCES `room_types` (`id`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `room_bookings`
--
ALTER TABLE `room_bookings`
  ADD CONSTRAINT `room_bookings_room_id_foreign` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `room_bookings_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
