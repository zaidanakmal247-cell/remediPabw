-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 23 Okt 2026 pada 06.54
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_agrivision`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `deteksi_hama`
--

CREATE TABLE `deteksi_hama` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `lokasi` varchar(255) NOT NULL,
  `nama_tanaman` varchar(255) NOT NULL,
  `jenis_hama` varchar(255) NOT NULL,
  `confidence_score` int(11) NOT NULL,
  `tingkat_kerusakan` double NOT NULL,
  `status_deteksi` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `deteksi_hama`
--

INSERT INTO `deteksi_hama` (`id`, `lokasi`, `nama_tanaman`, `jenis_hama`, `confidence_score`, `tingkat_kerusakan`, `status_deteksi`, `created_at`, `updated_at`) VALUES
(1, 'Tarogong Kaler', 'Jagung', 'Wereng Cokelat', 68, 34.7, 'Indikasi Hama', '2026-10-04 07:07:08', '2026-10-04 07:07:08'),
(2, 'Tarogong Kaler', 'Cabai', 'Ulat Grayak', 41, 23, 'Tidak Pasti', '2026-10-14 02:39:19', '2026-10-14 02:39:19'),
(3, 'Tarogong Kaler', 'Cabai', 'Wereng Cokelat', 66, 39.1, 'Indikasi Hama', '2026-10-01 06:14:09', '2026-10-01 06:14:09'),
(4, 'Garut Kota', 'Padi', 'Kutu Daun', 79, 28.6, 'Indikasi Hama', '2026-10-21 16:25:18', '2026-10-21 16:25:18'),
(5, 'Samarang', 'Cabai', 'Wereng Cokelat', 94, 11.6, 'Hama Terkonfirmasi', '2026-10-20 18:52:53', '2026-10-20 18:52:53'),
(6, 'Garut Kota', 'Cabai', 'Ulat Grayak', 99, 52, 'Hama Terkonfirmasi', '2026-10-19 18:09:03', '2026-10-19 18:09:03'),
(7, 'Garut Kota', 'Cabai', 'Kutu Daun', 44, 64.4, 'Tidak Pasti', '2026-10-22 15:36:09', '2026-10-22 15:36:09'),
(8, 'Samarang', 'Padi', 'Wereng Cokelat', 78, 70.5, 'Indikasi Hama', '2026-10-16 16:51:14', '2026-10-16 16:51:14'),
(9, 'Garut Kota', 'Jagung', 'Wereng Cokelat', 48, 21.5, 'Tidak Pasti', '2026-10-17 06:11:10', '2026-10-17 06:11:10'),
(10, 'Samarang', 'Jagung', 'Kutu Daun', 99, 66.4, 'Hama Terkonfirmasi', '2026-10-09 21:49:04', '2026-10-09 21:49:04'),
(11, 'Garut Kota', 'Cabai', 'Ulat Grayak', 75, 11.2, 'Indikasi Hama', '2026-10-14 01:52:52', '2026-10-14 01:52:52'),
(12, 'Samarang', 'Padi', 'Wereng Cokelat', 67, 58.3, 'Indikasi Hama', '2026-10-21 05:35:02', '2026-10-21 05:35:02'),
(13, 'Garut Kota', 'Jagung', 'Kutu Daun', 39, 11.8, 'Tidak Pasti', '2026-10-19 05:30:42', '2026-10-19 05:30:42'),
(14, 'Garut Kota', 'Jagung', 'Ulat Grayak', 53, 55.9, 'Indikasi Hama', '2026-10-02 10:39:53', '2026-10-02 10:39:53'),
(15, 'Tarogong Kaler', 'Jagung', 'Kutu Daun', 38, 63.7, 'Tidak Pasti', '2026-10-03 18:19:14', '2026-10-03 18:19:14'),
(16, 'Garut Kota', 'Cabai', 'Kutu Daun', 38, 71.7, 'Tidak Pasti', '2026-09-24 11:58:53', '2026-09-24 11:58:53'),
(17, 'Samarang', 'Padi', 'Ulat Grayak', 47, 65.6, 'Tidak Pasti', '2026-10-04 01:10:06', '2026-10-04 01:10:06'),
(18, 'Samarang', 'Padi', 'Kutu Daun', 94, 33.7, 'Hama Terkonfirmasi', '2026-10-18 19:38:34', '2026-10-18 19:38:34'),
(19, 'Samarang', 'Cabai', 'Ulat Grayak', 90, 51.5, 'Hama Terkonfirmasi', '2026-10-20 10:04:16', '2026-10-20 10:04:16'),
(20, 'Garut Kota', 'Padi', 'Ulat Grayak', 35, 73.7, 'Tidak Pasti', '2026-10-18 02:49:59', '2026-10-18 02:49:59'),
(21, 'Garut Kota', 'Jagung', 'Kutu Daun', 80, 49.3, 'Indikasi Hama', '2026-10-22 18:38:12', '2026-10-22 18:38:12'),
(22, 'Tarogong Kaler', 'Cabai', 'Wereng Cokelat', 20, 85.8, 'Tidak Pasti', '2026-10-22 18:40:11', '2026-10-22 18:40:11');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
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
-- Struktur dari tabel `jobs`
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
-- Struktur dari tabel `job_batches`
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
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2026_01_01_000000_create_deteksi_hama_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `sessions`
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
-- Dumping data untuk tabel `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('gxXipv1xm4RfHNGgVMrNtcqx1ndUjaD4spmKJlHC', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/155.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiOG5NY1hsRkdHRUlDNVM4akFKTlJSQklCODBnenhHdThqRmRqcDNuQSI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6Mjk6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9yaXdheWF0IjtzOjU6InJvdXRlIjtzOjc6InJpd2F5YXQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1792719616),
('nwzRwpmFGb3K41AlqAkflFIOe0eD2Fc9kXRmLwCx', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/155.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiNjhsOTVOQ0dCbUt4SFhac056NDhkVmU1ME1mUW0xVlhuZ2NOaTFhMSI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6Mjk6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9yaXdheWF0IjtzOjU6InJvdXRlIjtzOjc6InJpd2F5YXQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1792731268);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_expiration_index` (`expiration`);

--
-- Indeks untuk tabel `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_locks_expiration_index` (`expiration`);

--
-- Indeks untuk tabel `deteksi_hama`
--
ALTER TABLE `deteksi_hama`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indeks untuk tabel `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `deteksi_hama`
--
ALTER TABLE `deteksi_hama`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
