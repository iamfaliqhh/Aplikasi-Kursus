-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 08, 2023 at 03:49 AM
-- Server version: 8.0.33
-- PHP Version: 8.1.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kursus`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_kegiatan`
--

CREATE TABLE `jadwal_kegiatan` (
  `id` bigint UNSIGNED NOT NULL,
  `id_kegiatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_kegiatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kegiatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_mulai` date NOT NULL,
  `tgl_akhir` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jadwal_kegiatan`
--

INSERT INTO `jadwal_kegiatan` (`id`, `id_kegiatan`, `nama_kegiatan`, `jenis_kegiatan`, `tgl_mulai`, `tgl_akhir`, `created_at`, `updated_at`) VALUES
(1, 'JDW00001', 'Gelombang 1 | REGULER', 'Pendaftaran', '2023-07-07', '2023-08-06', NULL, NULL),
(2, 'JDW00002', '| BEASISWA PRESTASI', 'Pendaftaran', '2023-07-07', '2023-07-27', NULL, NULL),
(3, 'JDW00003', 'Gelombang 2', 'REGULER', '2023-08-07', '2023-09-05', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_12_13_143924_create_profile_users_table', 1),
(6, '2022_12_13_144132_create_jadwal_kegiatans_table', 1),
(7, '2022_12_14_131321_create_social_accounts_table', 1),
(8, '2022_12_14_143829_create_program_studis_table', 1),
(9, '2022_12_14_143946_create_sekolahs_table', 1),
(10, '2022_12_14_144008_create_timelines_table', 1),
(11, '2022_12_14_144036_create_pendaftarans_table', 1),
(12, '2022_12_14_144051_create_pembayarans_table', 1),
(13, '2022_12_14_144114_create_pengumuman_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id` bigint UNSIGNED NOT NULL,
  `id_pembayaran` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bukti_pembayaran` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `verifikasi` tinyint(1) NOT NULL,
  `total_bayar` int DEFAULT NULL,
  `jatuh_tempo` date DEFAULT NULL,
  `tgl_pembayaran` date DEFAULT NULL,
  `id_pendaftaran` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id`, `id_pembayaran`, `bukti_pembayaran`, `status`, `verifikasi`, `total_bayar`, `jatuh_tempo`, `tgl_pembayaran`, `id_pendaftaran`, `created_at`, `updated_at`) VALUES
(1, 'PEMPSB00001', 'data pendaftar/20230100001/Prestasi1673879039-Formulir Pendaftaran-Cupiditate ex amet (1).pdf', 'Dibayar', 1, 150000, '2023-07-09', '2023-07-08', 1, '2023-07-07 16:26:08', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pendaftaran`
--

CREATE TABLE `pendaftaran` (
  `id` bigint UNSIGNED NOT NULL,
  `id_pendaftaran` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `nisn` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nik` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_siswa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pas_foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tempat_lahir` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `agama` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provinsi_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kabupaten_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kecamatan_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kelurahan_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tahun_masuk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pil1` bigint UNSIGNED DEFAULT NULL,
  `pil2` bigint UNSIGNED DEFAULT NULL,
  `nama_ayah` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_ibu` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pekerjaan_ayah` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pekerjaan_ibu` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pendidikan_ayah` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pendidikan_ibu` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nohp_ayah` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nohp_ibu` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `penghasilan_ayah` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `penghasilan_ibu` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `berkas_ortu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sekolah` bigint UNSIGNED NOT NULL,
  `smt1` double NOT NULL,
  `smt2` double NOT NULL,
  `smt3` double NOT NULL,
  `smt4` double NOT NULL,
  `smt5` double NOT NULL,
  `smt6` double DEFAULT NULL,
  `berkas_siswa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prestasi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_pendaftaran` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_pendaftaran` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pendaftaran`
--

INSERT INTO `pendaftaran` (`id`, `id_pendaftaran`, `user_id`, `nisn`, `nik`, `nama_siswa`, `jenis_kelamin`, `pas_foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `email`, `hp`, `alamat`, `provinsi_id`, `kabupaten_id`, `kecamatan_id`, `kelurahan_id`, `tahun_masuk`, `pil1`, `pil2`, `nama_ayah`, `nama_ibu`, `pekerjaan_ayah`, `pekerjaan_ibu`, `pendidikan_ayah`, `pendidikan_ibu`, `nohp_ayah`, `nohp_ibu`, `penghasilan_ayah`, `penghasilan_ibu`, `berkas_ortu`, `sekolah`, `smt1`, `smt2`, `smt3`, `smt4`, `smt5`, `smt6`, `berkas_siswa`, `prestasi`, `status_pendaftaran`, `tgl_pendaftaran`, `created_at`, `updated_at`) VALUES
(1, '20230100001', 3, '92348927348', '72619873972094293', 'Inayah Fauziah', 'Perempuan', 'data pendaftar/20230100001/Pasfoto1673879039-WhatsApp Image 2023-01-05 at 14.13.39.jpeg', 'Purwakarta', '2023-07-07', 'Islam', 'emailinay@gmail.com', '238742342340', 'data pendaftar alamat', NULL, NULL, NULL, NULL, '2023', 1, 2, 'data pendaftar nama_ayah', 'data pendaftar nama_ibu', 'data pendaftar pekerjaan_ayah', 'data pendaftar pekerjaan_ibu', 'data pendaftar pendidikan_ayah', 'data pendaftar pendidikan_ibu', 'data pendaftar nohp_ayah', 'data pendaftar nohp_ibu', 'data pendaftar penghasilan_ayah', 'data pendaftar penghasilan_ibu', 'data pendaftar/20230100001/BerkasOrtu1673879039-Formulir Pendaftaran-Cupiditate ex amet.pdf', 1, 99, 92, 93, 94, 95, 96, 'data pendaftar/20230100001/BerkasSiswa1673879039-Formulir Pendaftaran-Cupiditate ex amet (1).pdf', 'path_prestasi', 'Selesai', '2023-07-07 23:26:08', '2023-07-07 16:26:08', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pengumuman`
--

CREATE TABLE `pengumuman` (
  `id` bigint UNSIGNED NOT NULL,
  `id_pengumuman` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_pendaftaran` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hasil_seleksi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kursus_penerima` bigint UNSIGNED DEFAULT NULL,
  `nilai_interview` int DEFAULT NULL,
  `nilai_test` int DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pengumuman`
--

INSERT INTO `pengumuman` (`id`, `id_pengumuman`, `id_pendaftaran`, `user_id`, `hasil_seleksi`, `kursus_penerima`, `nilai_interview`, `nilai_test`, `status`, `created_at`, `updated_at`) VALUES
(1, 'PENGSB00001', '1', '2', 'LULUS', 1, 100, 100, 0, '2023-07-07 16:26:08', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `profile_user`
--

CREATE TABLE `profile_user` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tempat_lahir` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_hp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `whatsapp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `profile_user`
--

INSERT INTO `profile_user` (`id`, `user_id`, `nama`, `email`, `foto`, `tempat_lahir`, `tanggal_lahir`, `gender`, `no_hp`, `alamat`, `instagram`, `whatsapp`, `created_at`, `updated_at`) VALUES
(1, 1, 'Iam Admin', 'admin@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-07-07 16:26:08', NULL),
(2, 2, 'Iam Admin', 'admin@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-07-07 16:26:08', NULL),
(3, 3, 'Iam User', 'user@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-07-07 16:26:08', NULL),
(4, 4, 'Abii Hutabarat', 'abiihutabarat29@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-07-07 16:26:08', NULL),
(5, 5, 'Jasmine Mutiara Bintang', 'jasminemutiara@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-07-07 16:26:08', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `program_kursus`
--

CREATE TABLE `program_kursus` (
  `id` bigint UNSIGNED NOT NULL,
  `id_kursus` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_kursus` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenjang_kursus` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foto_kursus` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pengajar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jam` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hari` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contoh_game` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `harga_kursus` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `program_kursus`
--

INSERT INTO `program_kursus` (`id`, `id_kursus`, `nama_kursus`, `jenjang_kursus`, `foto_kursus`, `pengajar`, `jam`, `hari`, `contoh_game`, `harga_kursus`, `created_at`, `updated_at`) VALUES
(1, 'KRS001', 'PUZZLE GAME', 'Program 1', 'foto kursus/kursus1672487749-puzzle.jpg', 'Syahfrial', '08.00 - 10.00', 'selasa', NULL, 'Rp 150.000 / bulan', '2023-07-07 16:26:08', NULL),
(2, 'KRS002', 'FIGHTING GAME', 'Program 2', 'foto kursus/kursus1672488285-fighting.jpg', 'Rina', '09.00 - 12.00', 'rabu', NULL, 'Rp 150.000 / bulan', '2023-07-07 16:26:08', NULL),
(3, 'KRS003', 'SPORT GAME', 'Program 3', 'foto kursus/kursus1672488306-sport.jpg', 'Prida Yanti', '09.00 - 13.00', 'jumat', NULL, 'Rp 150.000 / bulan', '2023-07-07 16:26:08', NULL),
(4, 'KRS004', 'EDUCATION GAME', 'Program 4', 'foto kursus/kursus1672488321-education.jpg', 'Karisa', '12.00 - 14.00', 'rabu', NULL, 'Rp 150.000 / bulan', '2023-07-07 16:26:08', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sekolah`
--

CREATE TABLE `sekolah` (
  `id` bigint UNSIGNED NOT NULL,
  `NPSN` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_sekolah` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kota` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sekolah`
--

INSERT INTO `sekolah` (`id`, `NPSN`, `nama_sekolah`, `alamat`, `kota`, `created_at`, `updated_at`) VALUES
(1, '2303241', 'SMAN 3 Purwakarta 1', 'Purwakarta', 'Purwakarta', '2023-07-07 16:26:08', '2023-07-07 16:38:26');

-- --------------------------------------------------------

--
-- Table structure for table `social_accounts`
--

CREATE TABLE `social_accounts` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint NOT NULL,
  `provider_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `provider_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `timeline`
--

CREATE TABLE `timeline` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pesan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_update` date NOT NULL DEFAULT '2023-07-07',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `timeline`
--

INSERT INTO `timeline` (`id`, `user_id`, `status`, `pesan`, `tgl_update`, `created_at`, `updated_at`) VALUES
(1, '1', 'Bergabung', 'Membuat Akun baru', '2023-07-07', '2023-07-07 16:26:08', NULL),
(2, '2', 'Bergabung', 'Membuat Akun baru', '2023-07-07', '2023-07-07 16:26:08', NULL),
(3, '3', 'Bergabung', 'Membuat Akun baru', '2023-07-07', '2023-07-07 16:26:08', NULL),
(4, '4', 'Bergabung', 'Membuat Akun baru', '2023-07-07', '2023-07-07 16:26:08', NULL),
(5, '5', 'Bergabung', 'Membuat Akun baru', '2023-07-07', '2023-07-07 16:26:08', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Iam Admin', 'admin@gmail.com', '2023-07-07 16:26:08', '$2y$10$2Z01hQjV0dU2EeUnEmCyWeUJES/JrChfuXmVrk9PzzHozO01gmW9S', 'Administrator', NULL, '2023-07-07 16:26:08', '2023-07-07 16:26:08'),
(2, 'Iam Admin 2', 'admin2@gmail.com', '2023-07-07 16:26:08', '$2y$10$dXhiCBQUUrmPBSrxn5e1SOLW7RdkHMNNpUzWIrHihlTWZqkHe2djW', 'Administrator', NULL, '2023-07-07 16:26:08', '2023-07-07 16:26:08'),
(3, 'Iam User', 'user@gmail.com', '2023-07-07 16:26:08', '$2y$10$m5GTJKXdoEId0JgyzCzqp.X7i7YLEdTvZc7Leg25Pe8yV0fLL7MlS', 'Calon Peserta', NULL, '2023-07-07 16:26:08', '2023-07-07 16:26:08'),
(4, 'Abii Hutabarat', 'abiihutabarat29@gmail.com', '2023-07-07 16:26:08', '$2y$10$Orq0QJZlMquHGGcBUlCMOecqxHIEJ6uNPw3qj0tJyNK0aFtnCS4Uq', 'Calon Peserta', NULL, '2023-07-07 16:26:08', '2023-07-07 16:26:08'),
(5, 'Jasmine Mutiara Bintang', 'jasminemutiara@gmail.com', '2023-07-07 16:26:08', '$2y$10$izXLkeJnCyZXgwYkQtaTdOOgTOqjDo1m//pal1XF56tk0wQYKCyyu', 'Calon Peserta', NULL, '2023-07-07 16:26:08', '2023-07-07 16:26:08');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jadwal_kegiatan`
--
ALTER TABLE `jadwal_kegiatan`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `jadwal_kegiatan_id_kegiatan_unique` (`id_kegiatan`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pembayaran_id_pembayaran_unique` (`id_pembayaran`),
  ADD KEY `pembayaran_id_pendaftaran_foreign` (`id_pendaftaran`);

--
-- Indexes for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pendaftaran_id_pendaftaran_unique` (`id_pendaftaran`),
  ADD KEY `pendaftaran_user_id_foreign` (`user_id`),
  ADD KEY `pendaftaran_pil1_foreign` (`pil1`),
  ADD KEY `pendaftaran_pil2_foreign` (`pil2`),
  ADD KEY `pendaftaran_sekolah_foreign` (`sekolah`);

--
-- Indexes for table `pengumuman`
--
ALTER TABLE `pengumuman`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pengumuman_id_pengumuman_unique` (`id_pengumuman`),
  ADD KEY `pengumuman_kursus_penerima_foreign` (`kursus_penerima`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `profile_user`
--
ALTER TABLE `profile_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `profile_user_user_id_unique` (`user_id`);

--
-- Indexes for table `program_kursus`
--
ALTER TABLE `program_kursus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sekolah`
--
ALTER TABLE `sekolah`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sekolah_npsn_unique` (`NPSN`);

--
-- Indexes for table `social_accounts`
--
ALTER TABLE `social_accounts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `social_accounts_provider_id_unique` (`provider_id`);

--
-- Indexes for table `timeline`
--
ALTER TABLE `timeline`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jadwal_kegiatan`
--
ALTER TABLE `jadwal_kegiatan`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pengumuman`
--
ALTER TABLE `pengumuman`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `profile_user`
--
ALTER TABLE `profile_user`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `program_kursus`
--
ALTER TABLE `program_kursus`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sekolah`
--
ALTER TABLE `sekolah`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `social_accounts`
--
ALTER TABLE `social_accounts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `timeline`
--
ALTER TABLE `timeline`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `pembayaran_id_pendaftaran_foreign` FOREIGN KEY (`id_pendaftaran`) REFERENCES `pendaftaran` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD CONSTRAINT `pendaftaran_pil1_foreign` FOREIGN KEY (`pil1`) REFERENCES `program_kursus` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pendaftaran_pil2_foreign` FOREIGN KEY (`pil2`) REFERENCES `program_kursus` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pendaftaran_sekolah_foreign` FOREIGN KEY (`sekolah`) REFERENCES `sekolah` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pendaftaran_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pengumuman`
--
ALTER TABLE `pengumuman`
  ADD CONSTRAINT `pengumuman_kursus_penerima_foreign` FOREIGN KEY (`kursus_penerima`) REFERENCES `program_kursus` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `profile_user`
--
ALTER TABLE `profile_user`
  ADD CONSTRAINT `profile_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
