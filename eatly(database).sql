-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 11, 2025 at 06:02 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eatly`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('saatku@gmail|127.0.0.1', 'i:1;', 1753964431),
('saatku@gmail|127.0.0.1:timer', 'i:1753964431;', 1753964431);

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
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
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id_menu` int(11) UNSIGNED NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `nama_menu` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `is_today` tinyint(1) NOT NULL DEFAULT 0,
  `is_today_set_at` timestamp NULL DEFAULT NULL,
  `kalori` int(11) NOT NULL,
  `protein` int(11) NOT NULL,
  `lemak` int(11) NOT NULL,
  `id_preferensi_rasa` int(11) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id_menu`, `gambar`, `nama_menu`, `deskripsi`, `is_today`, `is_today_set_at`, `kalori`, `protein`, `lemak`, `id_preferensi_rasa`, `created_at`, `updated_at`) VALUES
(13, 'menus/687d942a4bf2f.jpg', 'Nasi Ayam Teriyaki', 'Menu ini jadi favorit para profesional karena praktis, lezat, dan tetap sehat. Potongan ayam yang dimasak dengan saus teriyaki khas Jepang kaya rasa namun rendah lemak, cocok untuk kamu yang aktif dan ingin tetap fit. Kandungan proteinnya mendukung regenerasi otot setelah duduk lama bekerja. Menariknya, ‘teriyaki’ berasal dari kata Jepang yang berarti “kilau bakar”, menggambarkan tampilannya yang menggoda.', 1, '2025-07-27 02:19:01', 430, 25, 10, 2, '2025-07-21 01:12:29', '2025-07-27 02:19:01'),
(14, 'menus/687d9695bf18e.jpg', 'Salad Tuna', 'Buat kamu yang ingin tetap ringan tapi tetap bertenaga, Salad Tuna adalah jawabannya. Kombinasi tuna yang tinggi omega-3 dan sayuran segar memberi efek kenyang tanpa ngantuk, cocok untuk makan siang produktif. Studi menunjukkan bahwa konsumsi tuna secara rutin bisa bantu menjaga fokus dan daya ingat — pas banget buat kamu yang sering multitasking.', 1, '2025-07-27 02:19:01', 310, 20, 5, 10, '2025-07-21 01:12:29', '2025-07-27 02:19:01'),
(15, 'menus/687d96b7a0f26.jpg', 'Sup Iga Sayur', 'Setelah hari kerja yang padat atau rapat berjam-jam, Sup Iga Sayur jadi comfort food yang menenangkan. Kaya kolagen dan zat besi, menu ini bantu regenerasi sel dan tingkatkan daya tahan tubuh. Daging iganya empuk, kuahnya hangat, dan sayurnya penuh nutrisi — cocok untuk recharge fisik maupun mental.', 1, '2025-07-27 02:19:01', 510, 22, 18, 4, '2025-07-21 01:12:29', '2025-07-27 02:19:01'),
(16, 'menus/687d96d2a7656.jpeg', 'Sayur Asem', 'Ini bukan sekadar sayur bening — Sayur Asem punya rasa segar yang menstimulasi selera setelah duduk di ruang AC seharian. Kandungan serat tinggi dari sayurannya bantu metabolisme kamu tetap aktif. Plus, rasa asam alami dipercaya dapat membantu mengontrol gula darah dan kolesterol. Enak, sehat, dan bikin mood naik.', 1, '2025-07-27 02:19:01', 220, 6, 3, 5, '2025-07-21 01:12:29', '2025-07-27 02:19:01'),
(17, 'menus/687d96ecbf601.jpeg', 'Sate Ayam', 'Bila kamu ingin rasa yang familiar tapi tetap bergizi, Sate Ayam adalah pilihan aman. Dibakar tanpa minyak berlebih dan disajikan dengan saus kacang penuh protein nabati, menu ini cocok untuk kamu yang ingin makan enak tanpa rasa bersalah. Tahu nggak? Saus kacang ternyata mengandung magnesium yang bantu kurangi stres.', 1, '2025-07-27 02:19:01', 480, 27, 21, 4, '2025-07-21 01:12:29', '2025-07-27 02:19:01'),
(18, 'menus/687d970431c6f.jpg', 'Gado-Gado', 'Buat kamu yang kerja nonstop di depan layar, Gado-Gado bisa bantu jaga stamina harian. Isinya lengkap: sayur, telur, tahu, tempe, dan saus kacang yang creamy. Kandungan antioksidannya tinggi dan cocok buat kamu yang ingin tetap kenyang tanpa berat di perut. Faktanya, pola makan berbasis tumbuhan juga terbukti bisa meningkatkan mood kerja.', 1, '2025-07-27 02:19:01', 400, 14, 16, 2, '2025-07-21 01:12:29', '2025-07-27 02:19:01'),
(19, 'menus/687d97191a5e7.jpeg', 'Opor Ayam', 'Siapapun butuh menu comfort sesekali, dan Opor Ayam bisa kasih itu tanpa bikin kamu merasa terlalu bersalah. Meski bersantan, menu ini tetap seimbang kalau dimakan dengan porsi tepat. Ayamnya tinggi protein, dan rempah-rempahnya seperti serai dan kunyit bantu jaga daya tahan tubuh — cocok untuk kamu yang sering lembur atau kerja intens.', 1, '2025-07-27 02:19:01', 520, 23, 24, 9, '2025-07-21 01:12:29', '2025-07-27 02:19:01'),
(20, 'menus/687d972b52f6c.jpeg', 'Rendang Daging', 'Rendang bukan cuma ikon kuliner, tapi juga powerhouse nutrisi kalau dikonsumsi dengan bijak. Daging sapinya penuh protein dan zat besi, cocok buat kamu yang banyak berpikir atau sering kelelahan. Rempah-rempahnya mengandung antiinflamasi alami — penting untuk kamu yang duduk terlalu lama dan rawan pegal.', 1, '2025-07-27 02:19:01', 600, 30, 35, 8, '2025-07-21 01:12:29', '2025-07-27 02:19:01'),
(21, 'menus/687d973f77a26.jpeg', 'Ayam Geprek', 'Siapa bilang makanan sehat nggak bisa pedas dan menggoda? Ayam Geprek hadir buat kamu yang butuh boost mood lewat rasa pedas. Walau tampilannya menggoda, daging ayamnya tetap jadi sumber protein utama. Menariknya, capsaicin dari cabai bisa meningkatkan metabolisme dan bahkan bantu pembakaran kalori pasca makan.', 1, '2025-07-27 02:19:01', 550, 28, 20, 3, '2025-07-21 01:12:29', '2025-07-27 02:19:01'),
(22, 'menus/687d9775b8ad8.jpeg', 'Bubur Ayam', 'Di tengah pagi sibuk atau saat perut lagi sensitif, Bubur Ayam jadi solusi terbaik. Teksturnya lembut, mudah dicerna, dan tetap mengenyangkan berkat topping ayam, telur, dan bawang goreng. Cocok banget buat kamu yang butuh sarapan cepat tapi tetap bergizi. Faktanya, bubur adalah comfort food universal yang bantu kurangi stres dan kecemasan.', 1, '2025-07-27 02:19:01', 350, 12, 8, 1, '2025-07-21 01:12:29', '2025-07-27 02:19:01');

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
(1, '0001_01_01_000001_create_cache_table', 1),
(2, '0001_01_01_000002_create_jobs_table', 1),
(3, '2025_07_16_030448_create_users_table', 1),
(4, '2025_07_16_030504_create_preferensi_rasa_table', 1),
(5, '2025_07_16_030515_create_menus_table', 1),
(6, '2025_07_16_030523_create_preferensi_rasa_user_table', 1),
(7, '2025_07_16_030532_create_rekomendasis_table', 1),
(8, '2025_07_16_032742_create_sessions_table', 2),
(9, '2025_07_16_033422_add_role_to_users_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `preferensi_rasa`
--

CREATE TABLE `preferensi_rasa` (
  `id_preferensi_rasa` int(11) UNSIGNED NOT NULL,
  `nama_rasa` varchar(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `preferensi_rasa`
--

INSERT INTO `preferensi_rasa` (`id_preferensi_rasa`, `nama_rasa`, `created_at`, `updated_at`) VALUES
(1, 'Asin', '2025-07-18 14:32:55', NULL),
(2, 'Manis', '2025-07-18 14:33:00', NULL),
(3, 'Pedas', '2025-07-21 01:09:26', NULL),
(4, 'Gurih', '2025-07-21 01:09:26', NULL),
(5, 'Asam', '2025-07-21 01:09:26', NULL),
(6, 'Pahit', '2025-07-21 01:09:26', NULL),
(7, 'Tawar', '2025-07-21 01:09:26', NULL),
(8, 'Rempah', '2025-07-21 01:09:26', NULL),
(9, 'Santan', '2025-07-21 01:09:26', NULL),
(10, 'Segar', '2025-07-21 01:09:26', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `preferensi_rasa_user`
--

CREATE TABLE `preferensi_rasa_user` (
  `id_preferensi_rasa_user` int(11) UNSIGNED NOT NULL,
  `id_user` int(11) UNSIGNED NOT NULL,
  `id_preferensi_rasa` int(11) UNSIGNED NOT NULL,
  `nilai_konversi` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `preferensi_rasa_user`
--

INSERT INTO `preferensi_rasa_user` (`id_preferensi_rasa_user`, `id_user`, `id_preferensi_rasa`, `nilai_konversi`, `created_at`, `updated_at`) VALUES
(20, 5, 7, 4, '2025-07-21 03:25:10', '2025-07-21 03:25:10'),
(21, 5, 8, 3, '2025-07-21 03:25:10', '2025-07-21 03:25:10'),
(22, 5, 10, 2, '2025-07-21 03:25:10', '2025-07-21 03:25:10'),
(28, 10, 9, 2, '2025-07-21 03:35:36', '2025-07-24 08:29:33'),
(30, 12, 3, 4, '2025-07-21 03:38:37', '2025-07-21 03:38:37'),
(31, 12, 8, 3, '2025-07-21 03:38:37', '2025-07-21 03:38:37'),
(32, 12, 9, 2, '2025-07-21 03:38:37', '2025-07-21 03:38:37'),
(34, 10, 4, 4, '2025-07-21 03:39:53', '2025-07-24 08:29:33'),
(35, 10, 7, 3, '2025-07-24 08:28:21', '2025-07-24 08:29:33');

-- --------------------------------------------------------

--
-- Table structure for table `rekomendasis`
--

CREATE TABLE `rekomendasis` (
  `id_rekomendasi` int(11) UNSIGNED NOT NULL,
  `id_user` int(11) UNSIGNED NOT NULL,
  `id_menu` int(11) UNSIGNED NOT NULL,
  `skor` double NOT NULL,
  `tanggal` date NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rekomendasis`
--

INSERT INTO `rekomendasis` (`id_rekomendasi`, `id_user`, `id_menu`, `skor`, `tanggal`, `created_at`, `updated_at`) VALUES
(379344, 12, 21, 0.875, '2025-08-27', '2025-08-27 05:06:52', '2025-08-27 05:06:52'),
(437087, 12, 20, 0.95, '2025-08-27', '2025-08-27 05:06:52', '2025-08-27 05:06:52'),
(889332, 12, 19, 0.9, '2025-08-27', '2025-08-27 05:06:52', '2025-08-27 05:06:52');

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

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('AikOD5cFQbWiYi2wMTSllP2McAO8bymgASDcBbwD', 5, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiQ0Y1czNvM0NoNTRVN1BSclFKVU9CRk4wVUloY05xazJUcWlZN2pINCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzQ6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC91c2VyL3Byb2ZpbGUiO31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aTo1O3M6NDoiYXV0aCI7YToxOntzOjIxOiJwYXNzd29yZF9jb25maXJtZWRfYXQiO2k6MTc1Nzg1NTM0Njt9fQ==', 1757855354),
('Be6OKiUti1H3aAxt8aws45ElmKWexBjYHD4sPsfG', 12, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiQ0JORVhHQk56eEFKQUU0TXpxUGVIVnh5a3hiTlVZY3pVcmg1RzdzMSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzg6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC91c2VyL3Jla29tZW5kYXNpIjt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTI7czo0OiJhdXRoIjthOjE6e3M6MjE6InBhc3N3b3JkX2NvbmZpcm1lZF9hdCI7aToxNzU2MjcxMTYyO319', 1756271295),
('hPSQ8RjLfbj4s0lb8fRaXD9XJ4Tt5qDDBmvXO0X9', 532470, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiYzJlNkhyMEoyQ2FjVDVrWnVvUk82VWt3MldWRnFSZEhIM3BrMlh0RCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6NTMyNDcwO3M6NDoiYXV0aCI7YToxOntzOjIxOiJwYXNzd29yZF9jb25maXJtZWRfYXQiO2k6MTc1NDQ4ODQ0MTt9czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzg6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC91c2VyL3Jla29tZW5kYXNpIjt9fQ==', 1754489991),
('LDBvOsiJ6DHAjymU7WadB3rSciBDPA98QdE0aNuB', 12, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiV1E2eDFPM3ZjMEh3M3FzcHVWYWJsU0x4OWFqZUJSZHNlUWt6YXhyTSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzQ6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC91c2VyL3Byb2ZpbGUiO31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxMjtzOjQ6ImF1dGgiO2E6MTp7czoyMToicGFzc3dvcmRfY29uZmlybWVkX2F0IjtpOjE3NTYyODkxNTc7fX0=', 1756289266),
('r0lmxwlUu2cSh0jNINc9WKwhYFEFAwNMELTT4ccm', 12, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiOElpVWY5aGw5NEJuR3VpWmNCRlUzY2dsRU02SkoyWkU0Y0FCUHdVciI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzY6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC91c2VyL2Rhc2hib2FyZCI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjEyO3M6NDoiYXV0aCI7YToxOntzOjIxOiJwYXNzd29yZF9jb25maXJtZWRfYXQiO2k6MTc1NzkyMjQ2NTt9fQ==', 1757922466);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) UNSIGNED NOT NULL,
  `role` tinyint(4) NOT NULL DEFAULT 1,
  `foto` varchar(100) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `berat_badan` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `role`, `foto`, `nama`, `berat_badan`, `email`, `password`, `created_at`, `updated_at`) VALUES
(2, 0, '', 'admin', 50, 'admin@gmail.com', '$2y$12$CyoJa./nH.hGPLKSgXi0OerAdtTugs.AO4iZxZkiPOEL19CcqQZh.', NULL, NULL),
(5, 1, 'users/1753805123_user_1144760.png', 'kenzo', 50, 'kenzo@gmail.com', '$2y$12$hs8A2qDQVQIRXmNi9pGne.7SDEKKFWCwKUwBYm1PDFOXQ2XnMr7qG', '2025-07-17 21:16:13', '2025-07-29 16:05:23'),
(6, 1, '', 'Madinnah', 50, 'micah@gmail.com', '$2y$12$3AamM8zaQaCnaBrgzHwb2.ek3iavDgvxH9qgV9dPrZv3P968Onyiq', '2025-07-17 21:18:18', '2025-07-18 07:08:51'),
(7, 1, '', 'honne', 50, 'honne@gmail.com', '$2y$12$D4JUZK/Pe1Be9PdaOzuMR.7Zp5EHabXnPJPK9m7eSjRJe7rt6B0u.', '2025-07-17 21:19:08', '2025-07-17 21:19:08'),
(10, 1, 'users/1753066114_tuna salad.jpg', 'daniel', 50, 'daniel@gmail.com', '$2y$12$u/iPKWtdsAWz.4wJU4BN.eWICbavzXGYNIqehGRVUU4tZnODOMvk2', '2025-07-19 06:51:10', '2025-07-24 08:29:33'),
(12, 1, 'users/1752933570_images.jpeg', 'kevin', 60, 'kevin@gmail.com', '$2y$12$0.jQvSZ4laEiBoo7gF/wDeyvYv5LVepR0dEMOsWwJQO7fAfqXswrC', '2025-07-19 06:59:30', '2025-07-21 03:38:37');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

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
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id_menu`),
  ADD KEY `menus_preferensi_rasa_id_foreign` (`id_preferensi_rasa`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `preferensi_rasa`
--
ALTER TABLE `preferensi_rasa`
  ADD PRIMARY KEY (`id_preferensi_rasa`);

--
-- Indexes for table `preferensi_rasa_user`
--
ALTER TABLE `preferensi_rasa_user`
  ADD PRIMARY KEY (`id_preferensi_rasa_user`),
  ADD UNIQUE KEY `preferensi_rasa_user_user_id_preferensi_rasa_id_unique` (`id_user`,`id_preferensi_rasa`),
  ADD KEY `preferensi_rasa_user_preferensi_rasa_id_foreign` (`id_preferensi_rasa`);

--
-- Indexes for table `rekomendasis`
--
ALTER TABLE `rekomendasis`
  ADD PRIMARY KEY (`id_rekomendasi`),
  ADD KEY `rekomendasis_user_id_foreign` (`id_user`),
  ADD KEY `rekomendasis_menu_id_foreign` (`id_menu`);

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
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `users_username_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

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
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `menus`
--
ALTER TABLE `menus`
  ADD CONSTRAINT `menus_preferensi_rasa_id_foreign` FOREIGN KEY (`id_preferensi_rasa`) REFERENCES `preferensi_rasa` (`id_preferensi_rasa`) ON DELETE CASCADE;

--
-- Constraints for table `preferensi_rasa_user`
--
ALTER TABLE `preferensi_rasa_user`
  ADD CONSTRAINT `preferensi_rasa_user_preferensi_rasa_id_foreign` FOREIGN KEY (`id_preferensi_rasa`) REFERENCES `preferensi_rasa` (`id_preferensi_rasa`) ON DELETE CASCADE,
  ADD CONSTRAINT `preferensi_rasa_user_user_id_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE;

--
-- Constraints for table `rekomendasis`
--
ALTER TABLE `rekomendasis`
  ADD CONSTRAINT `rekomendasis_menu_id_foreign` FOREIGN KEY (`id_menu`) REFERENCES `menus` (`id_menu`) ON DELETE CASCADE,
  ADD CONSTRAINT `rekomendasis_user_id_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
