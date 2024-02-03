-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 03, 2024 at 08:54 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel`
--

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
-- Table structure for table `jadwal_kegiatan`
--

CREATE TABLE `jadwal_kegiatan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_kegiatan` varchar(255) NOT NULL,
  `nama_kegiatan` varchar(255) NOT NULL,
  `jenis_kegiatan` varchar(255) NOT NULL,
  `tgl_mulai` date NOT NULL,
  `tgl_akhir` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jadwal_kegiatan`
--

INSERT INTO `jadwal_kegiatan` (`id`, `id_kegiatan`, `nama_kegiatan`, `jenis_kegiatan`, `tgl_mulai`, `tgl_akhir`, `created_at`, `updated_at`) VALUES
(1, 'JDW00001', 'Gelombang 1 | REGULER', 'Pendaftaran', '2024-01-29', '2024-02-28', NULL, NULL),
(2, 'JDW00002', '| BEASISWA PRESTASI', 'Pendaftaran', '2024-01-29', '2024-02-18', NULL, NULL),
(3, 'JDW00003', 'Gelombang 2', 'REGULER', '2024-02-29', '2024-03-29', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `mereks`
--

CREATE TABLE `mereks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mereks`
--

INSERT INTO `mereks` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Toyota', '2024-01-29 19:40:59', '2024-01-29 19:40:59'),
(2, 'Nissan', '2024-01-29 19:40:59', '2024-01-29 19:40:59');

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
(13, '2022_12_14_144114_create_pengumuman_table', 1),
(14, '2022_12_14_144114_create_warranty_table', 1),
(15, '2024_01_25_065326_merk_tipe_mobil_table', 1),
(16, '2024_01_31_072241_window_films', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_pembayaran` varchar(255) NOT NULL,
  `bukti_pembayaran` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL,
  `verifikasi` tinyint(1) NOT NULL,
  `total_bayar` int(11) DEFAULT NULL,
  `jatuh_tempo` date DEFAULT NULL,
  `tgl_pembayaran` date DEFAULT NULL,
  `id_pendaftaran` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id`, `id_pembayaran`, `bukti_pembayaran`, `status`, `verifikasi`, `total_bayar`, `jatuh_tempo`, `tgl_pembayaran`, `id_pendaftaran`, `created_at`, `updated_at`) VALUES
(1, 'PEMPSB00001', 'data pendaftar/20230100001/Prestasi1673879039-Formulir Pendaftaran-Cupiditate ex amet (1).pdf', 'Dibayar', 1, 150000, '2024-01-31', '2024-01-30', 1, '2024-01-29 02:00:55', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pendaftaran`
--

CREATE TABLE `pendaftaran` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_pendaftaran` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `nisn` varchar(255) NOT NULL,
  `nik` varchar(255) NOT NULL,
  `nama_siswa` varchar(255) NOT NULL,
  `jenis_kelamin` varchar(255) NOT NULL,
  `pas_foto` varchar(255) DEFAULT NULL,
  `tempat_lahir` varchar(255) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `agama` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `hp` varchar(255) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `provinsi_id` varchar(255) DEFAULT NULL,
  `kabupaten_id` varchar(255) DEFAULT NULL,
  `kecamatan_id` varchar(255) DEFAULT NULL,
  `kelurahan_id` varchar(255) DEFAULT NULL,
  `tahun_masuk` varchar(255) NOT NULL,
  `pil1` bigint(20) UNSIGNED DEFAULT NULL,
  `pil2` bigint(20) UNSIGNED DEFAULT NULL,
  `nama_ayah` varchar(255) DEFAULT NULL,
  `nama_ibu` varchar(255) DEFAULT NULL,
  `pekerjaan_ayah` varchar(255) DEFAULT NULL,
  `pekerjaan_ibu` varchar(255) DEFAULT NULL,
  `pendidikan_ayah` varchar(255) DEFAULT NULL,
  `pendidikan_ibu` varchar(255) DEFAULT NULL,
  `nohp_ayah` varchar(255) DEFAULT NULL,
  `nohp_ibu` varchar(255) DEFAULT NULL,
  `penghasilan_ayah` varchar(255) DEFAULT NULL,
  `penghasilan_ibu` varchar(255) DEFAULT NULL,
  `berkas_ortu` varchar(255) NOT NULL,
  `sekolah` bigint(20) UNSIGNED NOT NULL,
  `smt1` double NOT NULL,
  `smt2` double NOT NULL,
  `smt3` double NOT NULL,
  `smt4` double NOT NULL,
  `smt5` double NOT NULL,
  `smt6` double DEFAULT NULL,
  `berkas_siswa` varchar(255) NOT NULL,
  `prestasi` varchar(255) DEFAULT NULL,
  `status_pendaftaran` varchar(255) NOT NULL,
  `tgl_pendaftaran` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pendaftaran`
--

INSERT INTO `pendaftaran` (`id`, `id_pendaftaran`, `user_id`, `nisn`, `nik`, `nama_siswa`, `jenis_kelamin`, `pas_foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `email`, `hp`, `alamat`, `provinsi_id`, `kabupaten_id`, `kecamatan_id`, `kelurahan_id`, `tahun_masuk`, `pil1`, `pil2`, `nama_ayah`, `nama_ibu`, `pekerjaan_ayah`, `pekerjaan_ibu`, `pendidikan_ayah`, `pendidikan_ibu`, `nohp_ayah`, `nohp_ibu`, `penghasilan_ayah`, `penghasilan_ibu`, `berkas_ortu`, `sekolah`, `smt1`, `smt2`, `smt3`, `smt4`, `smt5`, `smt6`, `berkas_siswa`, `prestasi`, `status_pendaftaran`, `tgl_pendaftaran`, `created_at`, `updated_at`) VALUES
(1, '20230100001', 3, '92348927348', '72619873972094293', 'Inayah Fauziah', 'Perempuan', 'data pendaftar/20230100001/Pasfoto1673879039-WhatsApp Image 2023-01-05 at 14.13.39.jpeg', 'Purwakarta', '2024-01-29', 'Islam', 'emailinay@gmail.com', '238742342340', 'data pendaftar alamat', NULL, NULL, NULL, NULL, '2023', 1, 2, 'data pendaftar nama_ayah', 'data pendaftar nama_ibu', 'data pendaftar pekerjaan_ayah', 'data pendaftar pekerjaan_ibu', 'data pendaftar pendidikan_ayah', 'data pendaftar pendidikan_ibu', 'data pendaftar nohp_ayah', 'data pendaftar nohp_ibu', 'data pendaftar penghasilan_ayah', 'data pendaftar penghasilan_ibu', 'data pendaftar/20230100001/BerkasOrtu1673879039-Formulir Pendaftaran-Cupiditate ex amet.pdf', 1, 99, 92, 93, 94, 95, 96, 'data pendaftar/20230100001/BerkasSiswa1673879039-Formulir Pendaftaran-Cupiditate ex amet (1).pdf', 'path_prestasi', 'Terverifikasi', '2024-01-29 09:00:55', '2024-01-29 02:00:55', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pengumuman`
--

CREATE TABLE `pengumuman` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_pengumuman` varchar(255) NOT NULL,
  `id_pendaftaran` varchar(255) NOT NULL,
  `user_id` varchar(255) DEFAULT NULL,
  `hasil_seleksi` varchar(255) DEFAULT NULL,
  `kursus_penerima` bigint(20) UNSIGNED DEFAULT NULL,
  `nilai_interview` int(11) DEFAULT NULL,
  `nilai_test` int(11) DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pengumuman`
--

INSERT INTO `pengumuman` (`id`, `id_pengumuman`, `id_pendaftaran`, `user_id`, `hasil_seleksi`, `kursus_penerima`, `nilai_interview`, `nilai_test`, `status`, `created_at`, `updated_at`) VALUES
(1, 'PENGSB00001', '1', '2', 'LULUS', 1, 100, 100, 0, '2024-01-29 02:00:55', NULL);

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_produk` varchar(255) NOT NULL,
  `nama_produk` varchar(255) NOT NULL,
  `foto_produk` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id`, `id_produk`, `nama_produk`, `foto_produk`, `created_at`, `updated_at`) VALUES
(1, 'STLTH001', 'Black Mamba', 'foto kursus/kursus1672487749-puzzle.jpg', '2024-01-29 02:00:55', NULL),
(2, 'STLTH002', 'Smoky Black', 'foto kursus/kursus1672488285-fighting.jpg', '2024-01-29 02:00:55', NULL),
(3, 'STLTH003', 'Jet Black', 'foto kursus/kursus1672488306-sport.jpg', '2024-01-29 02:00:55', NULL),
(4, 'STLTH004', 'Midnight Hollow', 'foto kursus/kursus1672488321-education.jpg', '2024-01-29 02:00:55', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `profile_user`
--

CREATE TABLE `profile_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `tempat_lahir` varchar(255) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `no_hp` varchar(255) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `whatsapp` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `profile_user`
--

INSERT INTO `profile_user` (`id`, `user_id`, `nama`, `email`, `foto`, `tempat_lahir`, `tanggal_lahir`, `gender`, `no_hp`, `alamat`, `instagram`, `whatsapp`, `created_at`, `updated_at`) VALUES
(1, 1, 'Iam Admin', 'admin@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-29 02:00:55', NULL),
(2, 2, 'Iam Admin', 'admin@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-29 02:00:55', NULL),
(3, 3, 'Iam User', 'user@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-29 02:00:55', NULL),
(4, 4, 'Abii Hutabarat', 'abiihutabarat29@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-29 02:00:55', NULL),
(5, 5, 'Jasmine Mutiara Bintang', 'jasminemutiara@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-29 02:00:55', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sekolah`
--

CREATE TABLE `sekolah` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `NPSN` varchar(255) NOT NULL,
  `nama_sekolah` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `kota` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sekolah`
--

INSERT INTO `sekolah` (`id`, `NPSN`, `nama_sekolah`, `alamat`, `kota`, `created_at`, `updated_at`) VALUES
(1, '2303241', 'SMAN 3 Purwakarta', 'Purwakarta', 'Purwakarta', '2024-01-29 02:00:55', '2024-01-29 02:00:55');

-- --------------------------------------------------------

--
-- Table structure for table `social_accounts`
--

CREATE TABLE `social_accounts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `provider_id` varchar(255) NOT NULL,
  `provider_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `timeline`
--

CREATE TABLE `timeline` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `pesan` varchar(255) NOT NULL,
  `tgl_update` date NOT NULL DEFAULT '2024-01-29',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `timeline`
--

INSERT INTO `timeline` (`id`, `user_id`, `status`, `pesan`, `tgl_update`, `created_at`, `updated_at`) VALUES
(1, '1', 'Bergabung', 'Membuat Akun baru', '2024-01-29', '2024-01-29 02:00:55', NULL),
(2, '2', 'Bergabung', 'Membuat Akun baru', '2024-01-29', '2024-01-29 02:00:55', NULL),
(3, '3', 'Bergabung', 'Membuat Akun baru', '2024-01-29', '2024-01-29 02:00:55', NULL),
(4, '4', 'Bergabung', 'Membuat Akun baru', '2024-01-29', '2024-01-29 02:00:55', NULL),
(5, '5', 'Bergabung', 'Membuat Akun baru', '2024-01-29', '2024-01-29 02:00:55', NULL),
(6, '1', 'Pendaftaran', 'Melakukan perubahan verifikasi pendaftaran 20230100001 (Belum Terverifikasi)', '2024-01-29', NULL, NULL),
(7, '1', 'Pendaftaran', 'Melakukan verifikasi pendaftaran 20230100001', '2024-01-29', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tipes`
--

CREATE TABLE `tipes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `merek_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tipes`
--

INSERT INTO `tipes` (`id`, `merek_id`, `name`, `created_at`, `updated_at`) VALUES
(1, 1, 'Avanza', '2024-01-29 19:40:59', '2024-01-29 19:40:59'),
(2, 1, 'Agya', '2024-01-29 19:40:59', '2024-01-29 19:40:59'),
(3, 1, 'Calya', '2024-01-29 19:40:59', '2024-01-29 19:40:59'),
(4, 1, 'Camry', '2024-01-29 19:40:59', '2024-01-29 19:40:59'),
(5, 1, 'Corolla Altis', '2024-01-29 19:40:59', '2024-01-29 19:40:59'),
(6, 1, 'Fortuner', '2024-01-29 19:40:59', '2024-01-29 19:40:59'),
(7, 1, 'Innova', '2024-01-29 19:40:59', '2024-01-29 19:40:59'),
(8, 1, 'Kijang Innova', '2024-01-29 19:40:59', '2024-01-29 19:40:59'),
(9, 1, 'Kijang Innova Reborn', '2024-01-29 19:40:59', '2024-01-29 19:40:59'),
(10, 1, 'Kijang Innova Venturer', '2024-01-29 19:40:59', '2024-01-29 19:40:59'),
(11, 1, 'Kijang Innova Venturer Touring Sport', '2024-01-29 19:40:59', '2024-01-29 19:40:59'),
(12, 1, 'Kijang Innova Venturer Touring Sport Diesel', '2024-01-29 19:40:59', '2024-01-29 19:40:59'),
(13, 1, 'Kijang Innova Venturer Diesel', '2024-01-29 19:40:59', '2024-01-29 19:40:59'),
(14, 1, 'Kijang Innova Diesel', '2024-01-29 19:40:59', '2024-01-29 19:40:59'),
(15, 1, 'Kijang Innova Diesel Reborn', '2024-01-29 19:40:59', '2024-01-29 19:40:59'),
(16, 1, 'Kijang Innova Diesel Venturer', '2024-01-29 19:40:59', '2024-01-29 19:40:59'),
(17, 1, 'Kijang Innova Diesel Venturer Touring Sport', '2024-01-29 19:40:59', '2024-01-29 19:40:59'),
(18, 2, 'GTR Nismo', '2024-01-29 19:40:59', '2024-01-29 19:40:59'),
(19, 2, 'GTR', '2024-01-29 19:40:59', '2024-01-29 19:40:59'),
(20, 2, 'GTR Premium', '2024-01-29 19:40:59', '2024-01-29 19:40:59'),
(21, 2, 'GTR Track Edition', '2024-01-29 19:40:59', '2024-01-29 19:40:59'),
(22, 2, 'GTR Black Edition', '2024-01-29 19:40:59', '2024-01-29 19:40:59'),
(23, 2, 'GTR Pure Edition', '2024-01-29 19:40:59', '2024-01-29 19:40:59'),
(24, 2, 'GTR Premium Edition', '2024-01-29 19:40:59', '2024-01-29 19:40:59'),
(25, 2, 'GTR Track Edition Engineered By Nismo', '2024-01-29 19:40:59', '2024-01-29 19:40:59'),
(26, 2, 'GTR Nismo Engineered By Nismo', '2024-01-29 19:40:59', '2024-01-29 19:40:59'),
(27, 2, 'GTR Nismo N Attack Package', '2024-01-29 19:40:59', '2024-01-29 19:40:59'),
(28, 2, 'GTR Nismo N Attack Package Engineered By Nismo', '2024-01-29 19:40:59', '2024-01-29 19:40:59'),
(29, 2, 'GTR Nismo N Attack Package Track Edition', '2024-01-29 19:40:59', '2024-01-29 19:40:59'),
(30, 2, 'GTR Nismo N Attack Package Track Edition Engineered By Nismo', '2024-01-29 19:40:59', '2024-01-29 19:40:59');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', '2024-01-29 02:00:55', '$2y$10$xaDxUXTboL.7dr855eM/0eObB7BSSIisg3sSWg3vNLBsbBsVCR93a', 'Administrator', NULL, '2024-01-29 02:00:55', '2024-01-29 02:00:55'),
(2, 'Iam Admin 2', 'admin2@gmail.com', '2024-01-29 02:00:55', '$2y$10$s7e0Lqo6P04oQfA0un9feOlqGoScv3/68sm.4ngJhkq/Xj1Hh1Unq', 'Administrator', NULL, '2024-01-29 02:00:55', '2024-01-29 02:00:55'),
(3, 'Iam User', 'user@gmail.com', '2024-01-29 02:00:55', '$2y$10$qcXzgcp1upMc9eY7F/YWcuD/ZjN7y8Tf4RrfamjUxcBy4DslDWMBK', 'Calon Peserta', NULL, '2024-01-29 02:00:55', '2024-01-29 02:00:55'),
(4, 'Abii Hutabarat', 'abiihutabarat29@gmail.com', '2024-01-29 02:00:55', '$2y$10$LUXM18ACdO3bl0ZiZMTKRuXenN/lNACxkP2HuJGSrD0a1ujMPyLQ2', 'Calon Peserta', NULL, '2024-01-29 02:00:55', '2024-01-29 02:00:55'),
(5, 'Jasmine Mutiara Bintang', 'jasminemutiara@gmail.com', '2024-01-29 02:00:55', '$2y$10$6wl95W8QMFGuz6/uN1oGFuEMm4RAIFwA6M5LokgdC5SI.UHmJ3GJ6', 'Calon Peserta', NULL, '2024-01-29 02:00:55', '2024-01-29 02:00:55');

-- --------------------------------------------------------

--
-- Table structure for table `warranty`
--

CREATE TABLE `warranty` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'unclaimed',
  `nama` varchar(255) DEFAULT NULL,
  `tanggal` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `handphone` varchar(255) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `merek` varchar(255) DEFAULT NULL,
  `tipe` varchar(255) DEFAULT NULL,
  `front_window` varchar(255) DEFAULT NULL,
  `side_window` varchar(255) DEFAULT NULL,
  `back_window` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `warranty`
--

INSERT INTO `warranty` (`id`, `code`, `status`, `nama`, `tanggal`, `email`, `handphone`, `alamat`, `merek`, `tipe`, `front_window`, `side_window`, `back_window`, `created_at`, `updated_at`) VALUES
(1, 'EwEkCc1zKb', 'pending', 'Muhammad Faliqh', '2004-03-16', 'faliqhyoon@outlook.com', '081934022750', 'Jakarta', NULL, '1', NULL, NULL, NULL, NULL, '2024-01-29 19:52:45'),
(2, 'xVFseVNYZM', 'claimed', 'test', '2024-01-08', 'faliqhyoon@outlook.com', '081934022750', 'Jakarta', NULL, '28', NULL, NULL, NULL, NULL, '2024-01-29 21:18:35'),
(3, 'GLJ96ufrv8', 'unclaimed', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 'qyxKnNQfX4', 'unclaimed', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 's5w0a2w0Y9', 'unclaimed', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, 'EIVPIDonDI', 'unclaimed', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 'fRdmHx7ULr', 'unclaimed', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, 'a4Az29540K', 'unclaimed', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, 'qnmZsRyuz4', 'unclaimed', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(10, 'OfhUN9uWsB', 'unclaimed', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(11, 'gVTQyQv4Xh', 'unclaimed', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(12, 'cxf1PUCEE0', 'unclaimed', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(13, '9hNN8GnyzR', 'unclaimed', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(14, 'fZyMnSf510', 'unclaimed', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(15, '7UWIV4r6Np', 'unclaimed', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(16, 'yl4vGgbphY', 'unclaimed', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(17, 'cXXW1fO9FW', 'unclaimed', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(18, 'guGymCWxkL', 'unclaimed', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(19, '9wY1NwsdqA', 'unclaimed', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(20, 'nZtgeP05BL', 'unclaimed', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `window_films`
--

CREATE TABLE `window_films` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `window_films`
--

INSERT INTO `window_films` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Black Mamba', NULL, NULL),
(2, 'Midnight Blues', NULL, NULL);

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
-- Indexes for table `mereks`
--
ALTER TABLE `mereks`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profile_user`
--
ALTER TABLE `profile_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `profile_user_user_id_unique` (`user_id`);

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
-- Indexes for table `tipes`
--
ALTER TABLE `tipes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `warranty`
--
ALTER TABLE `warranty`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `warranty_code_unique` (`code`);

--
-- Indexes for table `window_films`
--
ALTER TABLE `window_films`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jadwal_kegiatan`
--
ALTER TABLE `jadwal_kegiatan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `mereks`
--
ALTER TABLE `mereks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pengumuman`
--
ALTER TABLE `pengumuman`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `profile_user`
--
ALTER TABLE `profile_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sekolah`
--
ALTER TABLE `sekolah`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `social_accounts`
--
ALTER TABLE `social_accounts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `timeline`
--
ALTER TABLE `timeline`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tipes`
--
ALTER TABLE `tipes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `warranty`
--
ALTER TABLE `warranty`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `window_films`
--
ALTER TABLE `window_films`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
  ADD CONSTRAINT `pendaftaran_pil1_foreign` FOREIGN KEY (`pil1`) REFERENCES `produk` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pendaftaran_pil2_foreign` FOREIGN KEY (`pil2`) REFERENCES `produk` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pendaftaran_sekolah_foreign` FOREIGN KEY (`sekolah`) REFERENCES `sekolah` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pendaftaran_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pengumuman`
--
ALTER TABLE `pengumuman`
  ADD CONSTRAINT `pengumuman_kursus_penerima_foreign` FOREIGN KEY (`kursus_penerima`) REFERENCES `produk` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `profile_user`
--
ALTER TABLE `profile_user`
  ADD CONSTRAINT `profile_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
