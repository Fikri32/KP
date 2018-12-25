-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 25, 2018 at 11:56 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_managament`
--

-- --------------------------------------------------------

--
-- Table structure for table `alternative_steps`
--

CREATE TABLE `alternative_steps` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_project` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `alternative_tasks`
--

CREATE TABLE `alternative_tasks` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alt_steps` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `id` int(10) UNSIGNED NOT NULL,
  `company` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fax` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`id`, `company`, `name`, `address`, `email`, `phone`, `fax`) VALUES
(1, 'pome', 'Federal Reserve', 'Secil St', 'Feds@gov.com', '(998) 129-765', ''),
(2, 'pome', 'El murichi Inc', 'New ark st.', 'elmur@gmail.com', '(210) 775-990', NULL),
(4, 'pome', 'Mooray Studios INC', 'Jl.Mawar No.40 Bandung', 'MooraySteps@gmail.com', '081 221 456 656', '12-23443'),
(5, 'pome', 'Kunyuk', 'Jl.Bandros Tutung No.45 Banung', 'Kyuk@gmail.com', '082-123-222-453', NULL),
(6, 'lone wolf', 'Hadi Gunawan', 'Jl. Jalan sore No.666', 'hg@gmail.com', '0821212320', '(021)-8452'),
(7, 'Mobile Legends', 'Fredo', 'jl.jalan no 123', 'mobilelegend@mobile.com', '087987877', '(021)-649459');

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

CREATE TABLE `documents` (
  `id` int(10) UNSIGNED NOT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_document` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `attached_at` timestamp NULL DEFAULT NULL,
  `task` int(10) UNSIGNED NOT NULL,
  `alt_task` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `documents`
--

INSERT INTO `documents` (`id`, `url`, `nama_document`, `deskripsi`, `attached_at`, `task`, `alt_task`) VALUES
(1, 'xGXrMgmv3TX1tLIm.pdf', 'Code', 'Source Code', NULL, 13, NULL),
(2, 'yrtG4tqlHdQ6byVr.pdf', 'COde', 'sourcew', NULL, 13, NULL),
(3, 'Uyp3DDHbwp5lSR0u.pdf', 'jnfjhjj', 'ba tatatrnya', NULL, 16, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `fixed_pstruct`
--

CREATE TABLE `fixed_pstruct` (
  `id` int(10) NOT NULL,
  `id_project` int(10) UNSIGNED NOT NULL,
  `id_task` int(10) UNSIGNED NOT NULL,
  `id_step` int(10) UNSIGNED NOT NULL,
  `handler` int(10) UNSIGNED NOT NULL DEFAULT '401',
  `status` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `finish_date` date DEFAULT NULL,
  `deadline_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `Payment_id` int(12) UNSIGNED DEFAULT NULL,
  `notes` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT 'Belum Lunas',
  `due_date` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jenis_proyek`
--

CREATE TABLE `jenis_proyek` (
  `id` int(10) UNSIGNED NOT NULL,
  `jenis` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jenis_proyek`
--

INSERT INTO `jenis_proyek` (`id`, `jenis`) VALUES
(1, 'Kontruksi'),
(2, 'Manufaktur'),
(3, 'Penelitian Dan Pengembangan'),
(4, 'Pelayanan Manajemen'),
(5, 'Kapital'),
(6, 'Informatika(IT)');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2016_06_01_000001_create_oauth_auth_codes_table', 1),
(2, '2016_06_01_000002_create_oauth_access_tokens_table', 1),
(3, '2016_06_01_000003_create_oauth_refresh_tokens_table', 1),
(4, '2016_06_01_000004_create_oauth_clients_table', 1),
(5, '2016_06_01_000005_create_oauth_personal_access_clients_table', 1),
(18, '2014_10_12_000000_create_staff_table', 2),
(19, '2018_10_01_225653_create_projects_table', 2),
(20, '2018_10_02_230403_create_invoices_table', 2),
(21, '2018_10_03_230427_create_payments_table', 2),
(22, '2018_10_04_230754_create_types_table', 2),
(23, '2018_10_05_112600_create_steps_table', 2),
(24, '2018_10_06_113154_create_project_structures_table', 2),
(25, '2018_10_07_225925_create_settings_table', 2),
(26, '2018_10_08_225846_create_tasks_table', 2),
(27, '2018_10_08_230237_create_documents_table', 2),
(28, '2018_10_09_114106_create_project_type_table', 2),
(29, '2018_10_09_115229_create_project_structure_stuff_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `client_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_access_tokens`
--

INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
('12c14e0135a4cd213d2a6ea184388364d89a2f3dbb5435ea9812c8f4b4d231accc920db7f4013945', 52, 2, NULL, '[]', 0, '2018-10-16 01:15:19', '2018-10-16 01:15:19', '2019-10-16 08:15:19'),
('7fe3a81ffb07b136fd6265320a446766f9d71bc6fbc9db00730372592d789c96a65e6aeff9830f7b', 52, 2, NULL, '[]', 0, '2018-10-16 01:09:13', '2018-10-16 01:09:13', '2019-10-16 08:09:13'),
('c10d2380aa474c6ccb824898c4775073a84f6aa89207f23449159a9e3962a6f70a2c5eae48d9b14a', 52, 2, NULL, '[]', 0, '2018-10-04 14:55:55', '2018-10-04 14:55:55', '2019-10-04 21:55:55');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Laravel Personal Access Client', '5sqKXj6vaT5IRJUwRobuwnzb1vp49fmXiYQSGu8U', 'http://localhost', 1, 0, 0, '2018-10-04 14:13:49', '2018-10-04 14:13:49'),
(2, NULL, 'Laravel Password Grant Client', 'n9IKR8y61KuvibvJVSsvf8COfqvKKF2oBZPm9AMB', 'http://localhost', 0, 1, 0, '2018-10-04 14:13:49', '2018-10-04 14:13:49');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `client_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2018-10-04 14:13:49', '2018-10-04 14:13:49');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_refresh_tokens`
--

INSERT INTO `oauth_refresh_tokens` (`id`, `access_token_id`, `revoked`, `expires_at`) VALUES
('6e946790275315f0d454000c271389a0eef7ed78e9cf972965e8da646bd095f7f5cdca7befdc2d57', 'c10d2380aa474c6ccb824898c4775073a84f6aa89207f23449159a9e3962a6f70a2c5eae48d9b14a', 0, '2019-10-04 21:55:55'),
('81b5f2236bc2fa0d886a31e632e08a38a8cc5e24634d9ccbe02d998e38e12a8266e8eff586eff460', '7fe3a81ffb07b136fd6265320a446766f9d71bc6fbc9db00730372592d789c96a65e6aeff9830f7b', 0, '2019-10-16 08:09:13'),
('d5e75bc8604c4c5a649188a8ee3de23f3a2664aa69aae9c22256bf54d1a525933fcd09f2daaf1a73', '12c14e0135a4cd213d2a6ea184388364d89a2f3dbb5435ea9812c8f4b4d231accc920db7f4013945', 0, '2019-10-16 08:15:19');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(10) UNSIGNED NOT NULL,
  `project` int(12) UNSIGNED NOT NULL,
  `desc` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `paid_at` timestamp NULL DEFAULT NULL,
  `payment_amount` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `project`, `desc`, `paid_at`, `payment_amount`) VALUES
(1, 1, 'Anguran Pertama (Analisan Kasus)', '2018-11-04 17:00:00', 1500000),
(2, 1, 'Angsuran Ke-dua (Depeloving)', '2018-11-07 17:00:00', 7250000),
(3, 4, 'Ang-1', '2018-12-02 17:00:00', 1200000),
(4, 4, 'ang-2', '2018-12-04 17:00:00', 2562000),
(5, 7, 'Pembayaran KE 1', '2018-11-30 17:00:00', 120000),
(6, 7, 'Pembayaran KE 10', '2018-12-27 17:00:00', 120000);

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `id` int(10) UNSIGNED NOT NULL,
  `user` int(10) UNSIGNED DEFAULT NULL,
  `addres` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fax` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`id`, `user`, `addres`, `email`, `phone`, `fax`) VALUES
(5, 52, 'Jl.Pasir Kebul No.4', 'Jujunragan@gmail.cok', '0291242666', '890');

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `company_id` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `settings` int(10) UNSIGNED DEFAULT NULL,
  `client` int(10) UNSIGNED DEFAULT NULL,
  `deadline` date NOT NULL,
  `tanggal_mulai` date NOT NULL,
  `nama_project` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi_project` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`id`, `user_id`, `company_id`, `settings`, `client`, `deadline`, `tanggal_mulai`, `nama_project`, `deskripsi_project`, `created_at`, `updated_at`) VALUES
(1, 54, 'pome', 2, 1, '2018-11-30', '2018-11-19', 'Heat Seeker', 'aplikasi pendeteksi panas dan suhu', '2018-11-17 11:04:39', '2018-11-17 11:09:18'),
(2, 55, 'pome', 1, 1, '2018-12-31', '2018-12-02', 'Feds Online', 'Aplikasi manajemen keuangan negara dan bak', '2018-11-17 11:10:49', '2018-11-17 11:14:31'),
(4, 405, 'pome', 667, 1, '2018-12-26', '2018-12-19', 'test', 'masak', '2018-12-18 00:57:28', '2018-12-18 00:57:37'),
(5, 408, 'lone wolf', 666, 6, '2019-01-01', '2018-12-26', 'Aplikasi Jual-beli akik', 'batu akik ti garut', '2018-12-25 02:03:18', '2018-12-25 02:43:33'),
(7, 414, 'Mobile Legends', 669, 7, '2018-12-31', '2018-11-26', 'Aplikasi TokoTokoan', 'Ieu toko ibu', '2018-12-25 03:09:28', '2018-12-25 03:12:54');

-- --------------------------------------------------------

--
-- Table structure for table `project_structure_staff`
--

CREATE TABLE `project_structure_staff` (
  `id_project_structure` int(10) UNSIGNED NOT NULL,
  `staff` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `name`, `company`) VALUES
(1, 'Project R&D', 'pome'),
(2, 'IT', 'pome'),
(666, 'Setting tidak ada', ''),
(667, 'Kuliner', 'pome'),
(668, 'Teknologi informatika (TI)', 'lone wolf'),
(669, 'Waterfall', 'Mobile Legends');

-- --------------------------------------------------------

--
-- Table structure for table `steps`
--

CREATE TABLE `steps` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `setting_id` int(10) UNSIGNED NOT NULL,
  `leader` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `steps`
--

INSERT INTO `steps` (`id`, `name`, `setting_id`, `leader`) VALUES
(2, 'Analisa kebutuhan', 1, 61),
(4, 'Testing(QC)', 1, 54),
(6, 'Analisa', 2, 55),
(7, 'Desain', 2, 53),
(8, 'Development', 2, 61),
(9, 'Testing(QC)', 2, 62),
(10, 'Deployment', 2, 64),
(11, 'test', 667, 404),
(12, 'Analisa', 668, NULL),
(13, 'Development', 668, NULL),
(14, 'Deployement', 668, NULL),
(15, 'Analisa', 669, 416),
(16, 'Design', 669, 418),
(17, 'Coding', 669, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `struktur_organisasi`
--

CREATE TABLE `struktur_organisasi` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_kategory` int(10) UNSIGNED NOT NULL,
  `jabatan` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kd_jabatan` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `struktur_organisasi`
--

INSERT INTO `struktur_organisasi` (`id`, `id_kategory`, `jabatan`, `kd_jabatan`) VALUES
(1, 6, 'Manager Proyek', 'PM'),
(2, 6, 'Bendahara', 'BR'),
(3, 6, 'Sekretaris', 'SK'),
(4, 6, 'Analis', 'AL'),
(5, 6, 'Desain', 'DS'),
(6, 6, 'Programer', 'PR'),
(7, 6, 'QC(Tester)', 'QC'),
(8, 1, 'Manajer Proyek', 'PM_K'),
(9, 1, 'Site Manajer', 'PM_S'),
(10, 1, 'QC Supervisor', 'QCS'),
(11, 1, 'Kepala Administrasi', 'KA'),
(12, 1, 'Kepala Lapangan', 'KP'),
(13, 1, 'Kepala Logistik', 'KL'),
(14, 1, 'Kurir', 'KR'),
(15, 1, 'Kep. Pelaksana ME', 'KPME'),
(16, 1, 'Kep. Pelaksana Struktur', 'KPS'),
(17, 1, 'Kep. Pelaksana Arsitektur', 'KPA'),
(18, 1, 'Gd', 'Gd'),
(19, 1, 'Pelaksana ME', 'PME'),
(20, 1, 'Pelaksana Struktur', 'PS'),
(21, 1, 'Pelaksana Arsitektur', 'PA');

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Steps_id` int(10) UNSIGNED NOT NULL,
  `project` int(10) UNSIGNED NOT NULL,
  `handler` int(10) UNSIGNED DEFAULT NULL,
  `deadline` date DEFAULT NULL,
  `finished_at` date DEFAULT NULL,
  `status` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT 'Belum ditentukan'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `name`, `Steps_id`, `project`, `handler`, `deadline`, `finished_at`, `status`) VALUES
(1, 'Analisa PL & Data', 6, 1, 64, '2018-11-20', NULL, NULL),
(2, 'Desain ERD & SDLC', 6, 1, 53, '2018-11-21', NULL, NULL),
(3, 'Desain UI', 7, 1, 53, '2018-11-21', NULL, NULL),
(4, 'Desain UX', 7, 1, 402, '2018-11-22', NULL, NULL),
(5, 'Coding Web', 8, 1, 61, '2018-11-23', NULL, NULL),
(6, 'Black Box Testing', 9, 1, 61, '2018-11-26', NULL, NULL),
(7, 'Release App', 10, 1, 60, '2018-11-30', NULL, NULL),
(8, 'Analisa Lapangan', 2, 2, 64, '2018-11-21', NULL, NULL),
(9, 'Test Prodak', 4, 2, 64, NULL, NULL, NULL),
(10, 'Testing Produk', 4, 2, 404, '2018-12-03', NULL, NULL),
(11, 'Test Dimensi Produk', 4, 2, 61, NULL, NULL, NULL),
(13, '1541541541', 11, 4, 406, '2018-12-19', NULL, NULL),
(16, 'vmjvmvm', 15, 7, 420, '2018-12-26', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `profile` int(10) UNSIGNED DEFAULT NULL,
  `name` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nip` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tugas` int(10) UNSIGNED DEFAULT NULL,
  `password` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `api_token` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `SL` tinyint(1) DEFAULT NULL,
  `PM` varchar(1) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `profile`, `name`, `nip`, `email`, `image`, `tugas`, `password`, `api_token`, `company`, `role`, `SL`, `PM`, `remember_token`, `created_at`, `updated_at`) VALUES
(52, NULL, 'legend pome', NULL, 'legend@pome.com', 'E6BlbO24mnoQc27I.png', NULL, '$2y$10$jCYLKiWbocWVCwT6fLCsJ.Errt5HOuEWWCUFLQldeQd3/pa9eH4qK', '$2y$10$TDwB3SwaBNXavtKMT1n38esDROa3A54cqlbMd7S8m8CdQUhCsXiVi', 'pome', 'admin', NULL, NULL, 'PQpDJKBYUQzsi0U1J1u5CHc7a9rNQOMypc8LQoH2XNYi0VxmWdHGINwbSueC', '2018-10-04 10:48:50', '2018-11-03 06:26:48'),
(53, NULL, 'jhon lenon', '140297001', 'jhon@pome.com', 'ig8tcn0aE7Xe5AlW.jpg', 5, '$2y$10$OWPaBDamiXhR/X3aPoUb6uwwIxplest7XC0UX7nYrfHNg934jk30i', '$2y$10$j4h1EZIY9j1Drefsy2JAaOlEiLv4kF4a2GZ4tL5c/e54PpjRIrT4C', 'pome', 'employe', NULL, NULL, NULL, '2018-10-04 11:03:18', '2018-10-04 11:03:18'),
(54, NULL, 'lea Murchini', '140297002', 'lea@pome.com', 'fcmkKNoVXIRLAwQF.jpg', 1, '$2y$10$kIJA2duV9qDD978sDAAEk.9kXmc2ubY7GiWf03fHEBIuX6hv/6TG6', '$2y$10$xFb4rWmdgrAx5MdmcWhqduKgNq47SUESFVf3oFh8v8QRmGECAkyOC', 'pome', 'employe', NULL, NULL, 'mP2xSYRU5g7bgj1IGDP69YJ43ParfqeE5VqzgdDLOGJZ1WIQFIaFuOcXTFRP', '2018-10-04 11:07:39', '2018-10-04 11:07:39'),
(55, NULL, 'Andriana Lenny', '140297003', 'andrianalenny@pome.com', 'jRKYy44Dl0uKA7Pk.jpg', 4, '$2y$10$O4iVcuxlvAT1adZaXjeWM.Kv1OgOHcHrvRY1KVJzHpzSLMrs30mxG', '$2y$10$nP..nqq0.9KXlcOfdmzpx.qlSZ6bUBst7/5PqalDuiTbAaQwFlTHS', 'pome', 'employe', NULL, NULL, NULL, '2018-10-04 11:08:36', '2018-10-04 11:08:36'),
(60, NULL, 'Alex andria', '140297005', 'alexandria@pome.com', NULL, 4, '$2y$10$tbS43rZJ.3y4ulmllyKEE.mcYhGYxLh6/ibCas6cbdMiT2UCDl7Nm', '$2y$10$bmeuitUC7bn70q.rPV5iceWLRQ.3MHy9nsh.gTfgEbuyFKw1ydEq2', 'pome', 'employe', NULL, NULL, NULL, '2018-10-07 09:55:09', '2018-10-25 18:53:42'),
(61, NULL, 'indri Sofyanti', '140297006', 'indrisofyanti@pome.com', 'h5RthtbkhfHdmngE.jpg', 6, '$2y$10$kHbe2camLC2IXCVBMCPWZefgIscTM6uJHKw/T/QmHyv8CiOOtfFGO', '$2y$10$TzLpBPujbZQbzHoNWWA7oO191WTcoyWNMtyssRyhHIzmxFo6ByBjK', 'pome', 'employe', NULL, NULL, NULL, '2018-10-07 09:57:20', '2018-10-07 10:14:26'),
(62, NULL, 'Edward deltag', '140297007', 'edwardl@pome.com', 'nrfEXm2r3FvYlhvA.jpg', 7, '$2y$10$GhdqMT.Cj3vLhdvBKGkjLuZrsHbBybhMv.7L0R5oyGV4MnyMfC0Ou', '$2y$10$vrchz8TxDzqRaN9eXzJiYOJYsLIZwCUBedxYkX80bLlvL8L/kTsCe', 'pome', 'employe', NULL, NULL, NULL, '2018-10-15 22:06:15', '2018-10-15 22:06:42'),
(64, NULL, 'Evan Lion', '140297008', 'evanthelion@pome.com', 'ktYAFJCmpssuVQnn.jpg', 1, '$2y$10$3MHnr8Ofv6AmYT9k6rYL3.b/j8Nfw.1r8RUD1/yFfnKfHqvxLlNqa', '$2y$10$TSFN6pCicUSUHIEZzOkvPurM.Kd1PY8zMtasMXMJmb6h0lNFfAqTi', 'pome', 'employe', NULL, NULL, NULL, '2018-10-18 00:57:13', '2018-10-18 05:45:20'),
(401, NULL, 'belum di isi', NULL, 'null@null.fun', NULL, NULL, 'kingmesix', 'asdasdasd', 'asde', NULL, NULL, NULL, NULL, NULL, NULL),
(402, NULL, 'Nia Johansen', '101152410', 'niajohan@pome.com', '6dkb4MlrNXNv1v1j.jpg', 2, '$2y$10$cyqmMdhP8.wTjgeDZVg1u.bO8//aOZkdYV/OcT1Ai6C5EipWUd9VS', '$2y$10$XPVEaQGMDrPy3PULbqPHQeNpSzzxQ5uB3F1U7AvfBvAID7WkaIkG6', 'pome', 'employe', NULL, NULL, NULL, '2018-11-03 06:14:09', '2018-11-03 06:14:09'),
(404, NULL, 'Sammy Emanuel', '14029711', 'sammy@pome.com', 'cvG4cbCwsBDgG20K.jpg', 5, '$2y$10$8pWHvZkCXjx9QZJHv.BQk.i7bAuJyXkmgEqBcQeeSwvfan6506Vs2', '$2y$10$NTu96EOS2iySA40bncY9dOIgXzIsUHJV3STYJY1T2s3mUgNoU8r6C', 'pome', 'employe', NULL, NULL, 'o3vrEl8ScXmEMhhuwAy9Z8yqpeGgrUlwoGHYocuegYMdWm060NwsONXA9Cka', '2018-11-16 09:04:51', '2018-11-16 09:04:51'),
(405, NULL, 'bude umy', '140297100', 'bude@budeg.com', 'WqRQRz98Jl2QMSfY.png', 3, '$2y$10$9cw/8m4QWWJqHEf3a/sR3u4qtjsjo1Kk8sqmsu8LeKZh9YRiyHHVW', '$2y$10$KjUD/gL8.CEJlDnPl/UcXut3vPu9b.v6K77ncMXfBPbiYuaflWE9q', 'pome', 'employe', NULL, NULL, '2JLdcNBby4dkjJ2EBkZNx5CmXRhbSnWBvawklwsLyW6EGZt2deb3u7LUwK6c', '2018-12-18 00:56:59', '2018-12-18 00:56:59'),
(406, NULL, 'pak wawan', '140297101', 'wawan@wan.com', '', 13, '$2y$10$ef35l.6N7DvPSN5ivipBhuRLnh4pJlVV9Vn21IZcBE4CnX0w1hkAy', '$2y$10$uej9FlNwum2zHzVIbF.3P.6ZYkHnLXfW7Ix51fjucfiLZZ1wdfoem', 'pome', 'employe', NULL, NULL, 'AQiygd01EWj8yJ1OYOviQXthKdhYJD0kQSQ7JLLNFnF4ugKVhUDiyl0KHeoQ', '2018-12-18 01:09:17', '2018-12-18 01:09:17'),
(407, NULL, 'lone wolf', NULL, 'lonewolf@gmail.com', NULL, NULL, '$2y$10$ChnlZu/RMmdBnaQFBIlueeCE2.p2ArpxScu3/8NBnR106/6lPq61O', '$2y$10$O7hi5TNBvtES4Nt/dTgWHuqnTkT66ekyqGHXOOrxG9Zt.21fmqkai', 'lone wolf', 'admin', NULL, NULL, 'BlurMDT8uLhBqUtNgpiFm5piRVYOC9uI0OjndLKLUTQb9WP9lLgrmCr3nhh6', '2018-12-25 01:58:51', '2018-12-25 01:58:51'),
(408, NULL, 'Baba Yaga', '140297001', 'babayaga@gmail.com', 'c54DH2xaCUTHaK8u.jpg', 1, '$2y$10$BG9CZjrMjGbsQqMjcc6jA.9gZJwqLVLzwcaFxUrEvw94xfk31lQi6', '$2y$10$89qLjm8RQhHZXXRHy5zYausIIKIr/Y7W7XFJLxw.uKffK2jRjgFDO', 'lone wolf', 'employe', NULL, NULL, NULL, '2018-12-25 02:05:12', '2018-12-25 02:05:12'),
(410, NULL, 'Yule Man', '140297002', 'yule@gmail.com', 'W5WvVhAyGmpMWDGz.png', 6, '$2y$10$kMqwY5TygMI6K4w3QtJQPeFkSvGVAkQyr10wZs9oBGV3x5LzaCzs.', '$2y$10$AwY2ahFVMmLqvndBz.8xRes87mNItK3RsmpitBQAtxvo2ID3ci93S', 'lone wolf', 'employe', NULL, NULL, NULL, '2018-12-25 02:08:00', '2018-12-25 02:08:00'),
(412, NULL, 'scarlet king', '140297003', 'scarlet@gmail.com', 'JSBGuNOPJG8OCJfV.png', 4, '$2y$10$0K2nwYoPQearfYdA8T8UEuaXN4z9C61J3yu2RD6Jm8zPNmYkO/nNK', '$2y$10$HXrzuk2bvfsgXauysAL6veXbtjnn4lysDPXQuq6Oyml95.pw3HP3W', 'lone wolf', 'employe', NULL, NULL, NULL, '2018-12-25 02:09:17', '2018-12-25 02:09:17'),
(413, NULL, 'Freya', NULL, 'freya@mobile.com', NULL, NULL, '$2y$10$nwMfUcJG.RUboYWAOAJYcOMXNdiQ8u8udLjQPO60ksCE20eqdMPVC', '$2y$10$u3CK7eZfmdytnc2rw8wpSO7niSkWmE/hyBUvKpQof4YsTStzHE48C', 'Mobile Legends', 'admin', NULL, NULL, 'yM0Qwzswfi7QopctLu9qXSfglz5Z1SXB2g9FlrBsTmTf69LOZbi0VxTQQdw5', '2018-12-25 02:49:07', '2018-12-25 02:49:07'),
(414, NULL, 'Moskov', '10115212', 'moskov@mobile.com', 'EvNzA3SEMRWYmM6z.jpg', 6, '$2y$10$FkUIxQb7LoaHR7jOOrO64uFaePE5EOuNpvQj1TJMbSlgcjiffpB8W', '$2y$10$TthrYegoHV1igOkgYOInAegGwNTOtcaTpejiWEgaokY0LeexPGh3y', 'Mobile Legends', 'employe', NULL, NULL, '8iCni4hcaU30O0xZJPDOzL8qWQ2AHd1KWW88ExQjgyX5740SI1cXKhYe62Ti', '2018-12-25 02:51:58', '2018-12-25 03:01:58'),
(416, NULL, 'Bruno', '10115213', 'bruno@mobile.com', 'ekYAhrkoyiI5gN4v.jpg', 1, '$2y$10$2yAvrd3gx5CioAEAM.g8.eQPOAvxBZE/olSwRPKmcFMdxCYcCxeeu', '$2y$10$IoPZqrQF3Ekti7tHxnDlo.XZYNi1UkZjY2JVIy/14dzgAePIwbt.u', 'Mobile Legends', 'employe', NULL, NULL, 'ZlcfzbWIMCFyRUOhojfddUuuQJTOqfRmR2OId52CsitRhuBDC5NWNcduLZmK', '2018-12-25 02:54:13', '2018-12-25 02:54:13'),
(418, NULL, 'layla', '10115214', 'layla@mobile.com', '3zVrVDPSd65XaZg4.jpg', 7, '$2y$10$LmGoiD3/B8mCkaidgr05d.vtrioj24CT5UOkt9RsQr9iVaUeHDF62', '$2y$10$N4Cm1kvCN8dV75XjYBdwheJemgdwO6IuGPret/1H2TSsEnuGcM17q', 'Mobile Legends', 'employe', NULL, NULL, 'RCIEDDWvjbRidChyd2eNlwqwsHqHJzHoXUplCo8sqYpYfLoyqY9Ka11Jc3IF', '2018-12-25 02:54:56', '2018-12-25 02:54:56'),
(420, NULL, 'Claude', '10115215', 'claude@mobile.com', '8wHwFOZGlWsbGzaR.jpg', 6, '$2y$10$rLG2UFzyhNx9ayabdPx5neXvPfhrAQMuDCQZg6Se/E5fqNyBtVe0q', '$2y$10$gpLx8Di/K1VIq4ydVpBohOh28uOw2eIS0ednFEk2I6HeOiQ0pWUHG', 'Mobile Legends', 'employe', NULL, NULL, 'YRTNjyPD6JaVArLGh1p1lOrHKvSGRk6Sb2XUquiv4FFEWPwqGr1C3SP8PIlL', '2018-12-25 03:40:31', '2018-12-25 03:40:31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alternative_steps`
--
ALTER TABLE `alternative_steps`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_project` (`id_project`);

--
-- Indexes for table `alternative_tasks`
--
ALTER TABLE `alternative_tasks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `alt_steps` (`alt_steps`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `documents_task_foreign` (`task`),
  ADD KEY `alt_task` (`alt_task`);

--
-- Indexes for table `fixed_pstruct`
--
ALTER TABLE `fixed_pstruct`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_project` (`id_project`),
  ADD KEY `id_task` (`id_task`),
  ADD KEY `id_step` (`id_step`),
  ADD KEY `handler` (`handler`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD KEY `Payment_id` (`Payment_id`);

--
-- Indexes for table `jenis_proyek`
--
ALTER TABLE `jenis_proyek`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_personal_access_clients_client_id_index` (`client_id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `project` (`project`),
  ADD KEY `project_2` (`project`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user` (`user`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_company_code` (`company_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `settings` (`settings`),
  ADD KEY `client` (`client`);

--
-- Indexes for table `project_structure_staff`
--
ALTER TABLE `project_structure_staff`
  ADD PRIMARY KEY (`id_project_structure`,`staff`),
  ADD KEY `staff` (`staff`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `company` (`company`);

--
-- Indexes for table `steps`
--
ALTER TABLE `steps`
  ADD PRIMARY KEY (`id`),
  ADD KEY `setting_id` (`setting_id`),
  ADD KEY `leader` (`leader`);

--
-- Indexes for table `struktur_organisasi`
--
ALTER TABLE `struktur_organisasi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_kat` (`id_kategory`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `project` (`project`),
  ADD KEY `handler` (`handler`),
  ADD KEY `Steps_id` (`Steps_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `company_code` (`company`),
  ADD KEY `tugas` (`tugas`),
  ADD KEY `profile` (`profile`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alternative_steps`
--
ALTER TABLE `alternative_steps`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `alternative_tasks`
--
ALTER TABLE `alternative_tasks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `documents`
--
ALTER TABLE `documents`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `fixed_pstruct`
--
ALTER TABLE `fixed_pstruct`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jenis_proyek`
--
ALTER TABLE `jenis_proyek`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `profile`
--
ALTER TABLE `profile`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=670;

--
-- AUTO_INCREMENT for table `steps`
--
ALTER TABLE `steps`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `struktur_organisasi`
--
ALTER TABLE `struktur_organisasi`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=421;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `alternative_steps`
--
ALTER TABLE `alternative_steps`
  ADD CONSTRAINT `alternative_steps_ibfk_1` FOREIGN KEY (`id_project`) REFERENCES `project` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `alternative_tasks`
--
ALTER TABLE `alternative_tasks`
  ADD CONSTRAINT `alternative_tasks_ibfk_1` FOREIGN KEY (`alt_steps`) REFERENCES `alternative_steps` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `invoices`
--
ALTER TABLE `invoices`
  ADD CONSTRAINT `invoices_ibfk_2` FOREIGN KEY (`Payment_id`) REFERENCES `payments` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_ibfk_2` FOREIGN KEY (`project`) REFERENCES `project` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `profile`
--
ALTER TABLE `profile`
  ADD CONSTRAINT `profile_ibfk_1` FOREIGN KEY (`user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `project`
--
ALTER TABLE `project`
  ADD CONSTRAINT `project_ibfk_2` FOREIGN KEY (`settings`) REFERENCES `settings` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `project_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `project_ibfk_4` FOREIGN KEY (`client`) REFERENCES `client` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `project_structure_staff`
--
ALTER TABLE `project_structure_staff`
  ADD CONSTRAINT `project_structure_staff_ibfk_1` FOREIGN KEY (`staff`) REFERENCES `users` (`id`);

--
-- Constraints for table `steps`
--
ALTER TABLE `steps`
  ADD CONSTRAINT `steps_ibfk_2` FOREIGN KEY (`setting_id`) REFERENCES `settings` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `steps_ibfk_3` FOREIGN KEY (`leader`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `struktur_organisasi`
--
ALTER TABLE `struktur_organisasi`
  ADD CONSTRAINT `struktur_organisasi_ibfk_1` FOREIGN KEY (`id_kategory`) REFERENCES `jenis_proyek` (`id`);

--
-- Constraints for table `tasks`
--
ALTER TABLE `tasks`
  ADD CONSTRAINT `tasks_ibfk_3` FOREIGN KEY (`handler`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `tasks_ibfk_4` FOREIGN KEY (`project`) REFERENCES `project` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tasks_ibfk_5` FOREIGN KEY (`Steps_id`) REFERENCES `steps` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`tugas`) REFERENCES `struktur_organisasi` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
