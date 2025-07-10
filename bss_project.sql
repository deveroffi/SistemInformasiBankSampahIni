-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 24 Bulan Mei 2024 pada 05.30
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
-- Database: `bss_project`
--

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
-- Struktur dari tabel `harga_sampah`
--

CREATE TABLE `harga_sampah` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode` varchar(100) NOT NULL,
  `jenis_sampah` varchar(255) NOT NULL,
  `harga` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `harga_sampah`
--

INSERT INTO `harga_sampah` (`id`, `kode`, `jenis_sampah`, `harga`, `created_at`, `updated_at`) VALUES
(40, 'A1', 'Kardus Bagus', '1000', '2024-05-04 02:05:02', '2024-05-04 02:05:02'),
(41, 'A2', 'Kardus Jelek', '900', '2024-05-04 02:05:02', '2024-05-04 02:05:02'),
(42, 'A3', 'Koran', '2800', '2024-05-04 02:05:02', '2024-05-04 02:05:02'),
(43, 'A4', 'HVS', '1600', '2024-05-04 02:05:02', '2024-05-04 02:05:02'),
(44, 'A5', 'Buram', '800', '2024-05-04 02:05:02', '2024-05-04 02:05:02'),
(45, 'A6', 'Majalah', '600', '2024-05-04 02:05:02', '2024-05-04 02:05:02'),
(46, 'A7', 'Sak Semen', '800', '2024-05-04 02:05:02', '2024-05-04 02:05:02'),
(47, 'A8', 'Duplek', '200', '2024-05-04 02:05:02', '2024-05-04 02:05:02'),
(48, 'B1', 'Botol PET Bening Bersih', '2500', '2024-05-04 02:05:02', '2024-05-04 02:05:02'),
(49, 'B2', 'Botol PET Biru Muda Bersih', '2000', '2024-05-04 02:05:02', '2024-05-04 02:05:02'),
(50, 'B3', 'Botol PET Warna Bersih', '1100', '2024-05-04 02:05:02', '2024-05-04 02:05:02'),
(51, 'B4', 'Botol PET Kotor', '800', '2024-05-04 02:05:02', '2024-05-04 02:05:02'),
(52, 'B6', 'Botol PET Jelek/Minyak', '50', '2024-05-04 02:05:02', '2024-05-04 02:05:02'),
(53, 'C1', 'Tutup Botol Minuman', '1200', '2024-05-04 02:05:02', '2024-05-04 02:05:02'),
(54, 'C2', 'Tutup Galon', '1900', '2024-05-04 02:05:02', '2024-05-04 02:05:02'),
(55, 'C3', 'Tutup Campur', '300', '2024-05-04 02:05:02', '2024-05-04 02:05:02'),
(56, 'E1', 'Gelas PI Bening Bersih', '3000', '2024-05-04 02:05:02', '2024-05-04 02:05:02'),
(57, 'E2', 'Gelas PI Bening Kotor', '1200', '2024-05-04 02:05:02', '2024-05-04 02:05:02'),
(58, 'E3', 'Gelas PI Sablon & Sedotan', '1300', '2024-05-04 02:05:02', '2024-05-04 02:05:02'),
(59, 'G1', 'Galon Utuh (Aqua /Club /Bahan Sejenis)', '3100', '2024-05-04 02:05:02', '2024-05-04 02:05:02'),
(60, 'G2', 'CD', '3100', '2024-05-04 02:05:02', '2024-05-04 02:05:02'),
(61, 'H1', 'Bak/Emberan Fix', '1400', '2024-05-04 02:05:02', '2024-05-04 02:05:02'),
(62, 'H2', 'Bak Hitam', '400', '2024-05-04 02:05:02', '2024-05-04 02:05:02'),
(63, 'H3', 'Kertas', '50', '2024-05-04 02:05:02', '2024-05-04 02:05:02'),
(64, 'H4', 'Bak Campur (Bak Keras)', '300', '2024-05-04 02:05:02', '2024-05-04 02:05:02'),
(65, 'I1', 'Plastik Bening', '500', '2024-05-04 02:05:02', '2024-05-04 02:05:02'),
(66, 'I2', 'Kresek', '100', '2024-05-04 02:05:02', '2024-05-04 02:05:02'),
(67, 'I3', 'Sablon Tipis', '100', '2024-05-04 02:05:02', '2024-05-04 02:05:02'),
(68, 'I4', 'Sachet/Kemasan Metalis', '50', '2024-05-04 02:05:02', '2024-05-04 02:05:02'),
(69, 'I5', 'Karung Kecil/Rusak', '200', '2024-05-04 02:05:02', '2024-05-04 02:05:02'),
(70, 'I6', 'Sablon Tebal', '250', '2024-05-04 02:05:02', '2024-05-04 02:05:02'),
(71, 'I7', 'Lembaran Campur', '50', '2024-05-04 02:05:02', '2024-05-04 02:05:02'),
(72, 'J1', 'Botol Sirup Bagus', '80', '2024-05-04 02:05:02', '2024-05-04 02:05:02'),
(73, 'J2', 'Botol Kecap/Saos Besar', '200', '2024-05-04 02:05:02', '2024-05-04 02:05:02'),
(74, 'J3', 'Botol Bensin Besar', '700', '2024-05-04 02:05:02', '2024-05-04 02:05:02'),
(75, 'J4', 'Botol Bir Bintang Besar', '400', '2024-05-04 02:05:02', '2024-05-04 02:05:02'),
(76, 'J5', 'Botol/Beling Warna', '50', '2024-05-04 02:05:02', '2024-05-04 02:05:02'),
(77, 'J6', 'Botol/Beling Putih', '80', '2024-05-04 02:05:02', '2024-05-04 02:05:02');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jarak`
--

CREATE TABLE `jarak` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pesan_nasabah_id` bigint(20) UNSIGNED NOT NULL,
  `jarak_km` double(8,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `locations`
--

CREATE TABLE `locations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `latitude` double NOT NULL,
  `longitude` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `lokasi_penjemputan`
--

CREATE TABLE `lokasi_penjemputan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `no_reff` bigint(20) UNSIGNED NOT NULL,
  `status` varchar(100) DEFAULT NULL,
  `lokasi` varchar(255) NOT NULL,
  `jarak` varchar(100) DEFAULT NULL,
  `latitude` decimal(10,8) DEFAULT NULL,
  `longitude` decimal(11,8) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `lokasi_penjemputan`
--

INSERT INTO `lokasi_penjemputan` (`id`, `no_reff`, `status`, `lokasi`, `jarak`, `latitude`, `longitude`, `created_at`, `updated_at`) VALUES
(41, 12247, 'disetujui', 'Jl. Nginden Semolo No.45, Menur Pumpungan, Kec. Sukolilo, Surabaya, Jawa Timur 60118', '4360.0476149243', -7.29930621, 112.76680206, '2024-04-29 19:40:03', '2024-05-21 19:29:59'),
(42, 12248, 'selesai', 'Jl. Pumpungan IV No.58, Menur Pumpungan, Kec. Sukolilo, Surabaya, Jawa Timur 60118', '4176.7279614746', -7.29784620, 112.76354063, '2024-04-29 19:49:24', '2024-05-12 06:52:26'),
(46, 12252, 'selesai', 'Jl. Ahmad Yani No.73, Margorejo, Kec. Wonocolo, Surabaya, Jawa Timur 60238', '791.76440464013', -7.31520008, 112.73606168, '2024-04-29 21:28:28', '2024-05-04 06:04:21'),
(47, 12253, 'disetujui', 'PQJM+528, Mulyorejo, Kec. Mulyorejo, Surabaya, Jawa Timur 60115', '7904.1628678656', -7.26937465, 112.78266393, '2024-04-29 21:42:46', '2024-05-10 22:03:19'),
(48, 12254, 'selesai', 'Jl. Airlangga No.4 - 6, Airlangga, Kec. Gubeng, Surabaya, Jawa Timur 60115', '6390.8916111504', -7.26995869, 112.75887776, '2024-04-29 21:43:44', '2024-05-05 05:12:40'),
(49, 12255, 'selesai', 'Jl. Margorejo Indah Utara No.97-99, Sidosermo, Kec. Wonocolo, Surabaya, Jawa Timur 60238', '1798.0195668694', -7.31585760, 112.74970169, '2024-04-29 21:50:10', '2024-05-05 05:03:27'),
(50, 12256, 'selesai', 'Jl. Setail No.1, Darmo, Kec. Wonokromo, Surabaya, Jawa Timur 60241', '2931.4747580556', NULL, NULL, '2024-04-29 21:55:09', '2024-04-30 00:37:15'),
(51, 12257, 'selesai', 'Jl. Raya Jemursari No.51-57, Jemur Wonosari, Kec. Wonocolo, Surabaya, Jawa Timur 60237', '551.03101613852', -7.32243021, 112.73969220, '2024-04-29 21:57:23', '2024-05-13 01:53:32'),
(53, 12259, 'selesai', 'Jl. Jenderal Basuki Rachmat No.8-12, Kedungdoro, Kec. Tegalsari, Surabaya, Jawa Timur 60261', '6686.9926097693', -7.26219801, 112.73889371, '2024-04-29 23:17:48', '2024-05-12 22:50:21'),
(54, 12260, 'selesai', 'Jl. Bogowonto No.30, Darmo, Kec. Wonokromo, Surabaya, Jawa Timur 60241', '3722.2167139653', -7.28874522, 112.73331515, '2024-04-29 23:38:25', '2024-05-04 23:17:22'),
(55, 12261, 'selesai', 'Jl. Tenggilis Utara No.14, Tenggilis Mejoyo, Kec. Tenggilis Mejoyo, Surabaya, Jawa Timur 60292', '4228.8133732982', -7.30533568, 112.76907248, '2024-04-30 23:06:53', '2024-05-03 23:44:00'),
(57, 12263, 'selesai', 'Jl. Semolowaru No.77, Semolowaru, Kec. Sukolilo, Surabaya, Jawa Timur 60119', '5168.1670610924', -7.30004114, 112.77589738, '2024-05-01 02:02:20', '2024-05-05 05:04:48'),
(58, 12264, 'selesai', 'Jl. Nginden Semolo No.48, RT.003/RW.02, Nginden Jangkungan, Kec. Sukolilo, Surabaya, Jawa Timur 60118', '4740.203656027', -7.29821386, 112.77023760, '2024-05-01 20:21:57', '2024-05-05 05:03:36'),
(60, 12266, 'disetujui', 'Jl. Masjid Al-AkbarTimur No.1, Pagesangan, Kec. Jambangan, Surabaya, Jawa Timur 60274', '2678.8028134435', -7.33625086, 112.71497738, '2024-05-04 05:07:45', '2024-05-18 20:55:40'),
(61, 12267, 'disetujui', 'Jl. Barata Jaya XIX No.1, Baratajaya, Kec. Gubeng, Surabaya, Jawa Timur 60284', '3787.5205000098', -7.29909785, 112.75994479, '2024-05-04 22:26:27', '2024-05-04 22:28:17'),
(62, 12268, 'disetujui', 'Jl. Gadung No.1, Jagir, Kec. Wonokromo, Surabaya, Jawa Timur 60244', '1597.7707811023', -7.30799059, 112.73691074, '2024-05-06 19:55:17', '2024-05-19 05:09:16'),
(63, 12269, 'disetujui', 'PQ46+7P6, Jl. Bratang Binangun, Baratajaya, Kec. Gubeng, Surabaya, Jawa Timur 60284', '4042.8860464849', -7.29613152, 112.76026318, '2024-05-06 19:58:14', '2024-05-19 05:14:20'),
(64, 12270, 'selesai', 'Jl. Dr. Ir. H. Soekarno, Tambak, Gn. Anyar, Kec. Gn. Anyar, Surabaya, Jawa Timur 60294', '5698.3322157827', -7.33840573, 112.78371598, '2024-05-10 21:44:49', '2024-05-17 01:19:52'),
(65, 12271, 'disetujui', 'Jl. Diponegoro No.1-B, Darmo, Kec. Wonokromo, Surabaya, Jawa Timur 60241', '2983.7590339848', -7.29559857, 112.73831567, '2024-05-13 01:51:52', '2024-05-13 01:53:04'),
(66, 12272, 'selesai', 'Jl. Raya Mlirip No.33, RT.02/RW.10, Mlirip, Kec. Jetis, Kabupaten Mojokerto, Jawa Timur 61352', '33518.280455898', -7.44406557, 112.45669561, '2024-05-14 02:08:25', '2024-05-18 21:34:11'),
(67, 12273, 'selesai', 'Jl. Raya Nginden No.35-37, Nginden Jangkungan, Kec. Sukolilo, Surabaya, Jawa Timur 60118', '3939.9176638205', -7.30342670, 112.76500381, '2024-05-17 01:22:49', '2024-05-17 01:26:54'),
(68, 12274, 'selesai', 'PP2V+VR7, Jl. Ngagel Kebonsari, Ngagelrejo, Kec. Wonokromo, Surabaya, Jawa Timur 60245', '2942.8416280272', -7.29776366, 112.74496855, '2024-05-17 01:57:58', '2024-05-17 02:00:20'),
(72, 12279, 'selesai', 'MP78+C2 Pagesangan, Surabaya, Jawa Timur', '2676.7817458434', -7.33627788, 112.71501958, '2024-05-18 21:12:15', '2024-05-18 21:13:42'),
(73, 12280, 'belum disetujui', 'MPXR+M4R, Jl. Jagir Wonokromo, Jagir, Kec. Wonokromo, Surabaya, Jawa Timur 60244', NULL, NULL, NULL, '2024-05-19 20:24:31', '2024-05-19 20:24:31');

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
(11, '2024_03_08_135206_create_pesan_nasabah_table', 1),
(12, '2014_10_12_000000_create_users_table', 2),
(13, '2014_10_12_100000_create_password_reset_tokens_table', 2),
(14, '2019_08_19_000000_create_failed_jobs_table', 2),
(15, '2019_12_14_000001_create_personal_access_tokens_table', 2),
(16, '2024_02_17_035020_create_locations_table', 2),
(17, '2024_03_08_154609_create_pesan_nasabah_table', 3),
(26, '2024_03_10_051712_create_lokasi_penjemputan_table', 4),
(27, '2024_05_03_081407_create_notifikasi_table', 5),
(28, '2024_05_04_072258_create_harga_sampah_table', 6);

-- --------------------------------------------------------

--
-- Struktur dari tabel `notifikasi`
--

CREATE TABLE `notifikasi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `no_reff` bigint(20) UNSIGNED NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Struktur dari tabel `personal_access_tokens`
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
-- Struktur dari tabel `pesan_nasabah`
--

CREATE TABLE `pesan_nasabah` (
  `no_reff` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `jenis_sampah` varchar(255) NOT NULL,
  `berat_sampah` decimal(8,2) NOT NULL,
  `tanggal_pengumpulan` date NOT NULL,
  `lokasi_maps` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pesan_nasabah`
--

INSERT INTO `pesan_nasabah` (`no_reff`, `user_id`, `jenis_sampah`, `berat_sampah`, `tanggal_pengumpulan`, `lokasi_maps`, `created_at`, `updated_at`) VALUES
(12247, 3, 'Kertas', 1.00, '2024-04-30', 'Jl. Nginden Semolo No.45, Menur Pumpungan, Kec. Sukolilo, Surabaya, Jawa Timur 60118', '2024-04-29 19:40:03', '2024-04-29 19:40:03'),
(12248, 3, 'Kertas', 1.00, '2024-04-30', 'Jl. Pumpungan IV No.58, Menur Pumpungan, Kec. Sukolilo, Surabaya, Jawa Timur 60118', '2024-04-29 19:49:24', '2024-04-29 19:49:24'),
(12252, 3, 'Kardus Bagus', 1.00, '2024-04-30', 'Jl. Ahmad Yani No.73, Margorejo, Kec. Wonocolo, Surabaya, Jawa Timur 60238', '2024-04-29 21:28:28', '2024-04-29 21:28:28'),
(12253, 6, 'Kardus Jelek', 1.00, '2024-04-30', 'PQJM+528, Mulyorejo, Kec. Mulyorejo, Surabaya, Jawa Timur 60115', '2024-04-29 21:42:46', '2024-04-29 21:42:46'),
(12254, 6, 'Tutup Galon', 1.00, '2024-04-30', 'Jl. Airlangga No.4 - 6, Airlangga, Kec. Gubeng, Surabaya, Jawa Timur 60115', '2024-04-29 21:43:44', '2024-04-29 21:43:44'),
(12255, 3, 'Tutup Campur', 1.00, '2024-04-30', 'Jl. Margorejo Indah Utara No.97-99, Sidosermo, Kec. Wonocolo, Surabaya, Jawa Timur 60238', '2024-04-29 21:50:10', '2024-04-29 21:50:29'),
(12256, 3, 'Kardus Bagus', 1.00, '2024-04-30', 'Jl. Setail No.1, Darmo, Kec. Wonokromo, Surabaya, Jawa Timur 60241', '2024-04-29 21:55:09', '2024-04-29 21:55:09'),
(12257, 3, 'Kardus Bagus', 1.00, '2024-04-30', 'Jl. Raya Jemursari No.51-57, Jemur Wonosari, Kec. Wonocolo, Surabaya, Jawa Timur 60237', '2024-04-29 21:57:23', '2024-04-29 21:57:23'),
(12259, 10, 'Kardus Jelek', 1.00, '2024-04-30', 'Jl. Jenderal Basuki Rachmat No.8-12, Kedungdoro, Kec. Tegalsari, Surabaya, Jawa Timur 60261', '2024-04-29 23:17:48', '2024-04-29 23:17:48'),
(12260, 9, 'Duplek', 1.00, '2024-05-01', 'Jl. Bogowonto No.30, Darmo, Kec. Wonokromo, Surabaya, Jawa Timur 60241', '2024-04-29 23:38:25', '2024-04-29 23:38:25'),
(12261, 6, 'Tutup Galon', 1.00, '2024-05-08', 'Jl. Tenggilis Utara No.14, Tenggilis Mejoyo, Kec. Tenggilis Mejoyo, Surabaya, Jawa Timur 60292', '2024-04-30 23:06:53', '2024-04-30 23:06:53'),
(12263, 3, 'Botol Bensin Besar', 1.00, '2024-06-05', 'Jl. Semolowaru No.77, Semolowaru, Kec. Sukolilo, Surabaya, Jawa Timur 60119', '2024-05-01 02:02:20', '2024-05-01 02:02:20'),
(12264, 6, 'Botol Sirup Bagus', 1.00, '2024-06-08', 'Jl. Nginden Semolo No.48, RT.003/RW.02, Nginden Jangkungan, Kec. Sukolilo, Surabaya, Jawa Timur 60118', '2024-05-01 20:21:57', '2024-05-01 20:21:57'),
(12266, 3, 'Galon Utuh (Aqua / Club /Bahan Sejenis)', 1.00, '2024-05-04', 'Jl. Masjid Al-AkbarTimur No.1, Pagesangan, Kec. Jambangan, Surabaya, Jawa Timur 60274', '2024-05-04 05:07:45', '2024-05-04 05:07:45'),
(12267, 3, 'Galon Utuh (Aqua / Club /Bahan Sejenis)', 1.00, '2024-05-05', 'Jl. Barata Jaya XIX No.1, Baratajaya, Kec. Gubeng, Surabaya, Jawa Timur 60284', '2024-05-04 22:26:27', '2024-05-04 22:26:27'),
(12268, 3, 'Kardus Jelek', 1.00, '2024-05-07', 'Jl. Raya Manyar No.53d, Menur Pumpungan, Kec. Sukolilo, Surabaya, Jawa Timur 60284', '2024-05-06 19:55:17', '2024-05-06 19:55:17'),
(12269, 3, 'CD', 1.00, '2024-05-07', 'PQ46+7P6, Jl. Bratang Binangun, Baratajaya, Kec. Gubeng, Surabaya, Jawa Timur 60284', '2024-05-06 19:58:14', '2024-05-06 19:58:14'),
(12270, 3, 'Buram', 1.00, '2024-05-11', 'Jl. Dr. Ir. H. Soekarno, Tambak, Gn. Anyar, Kec. Gn. Anyar, Surabaya, Jawa Timur 60294', '2024-05-10 21:44:49', '2024-05-10 21:49:56'),
(12271, 3, 'Bak/Emberan Fix', 1.00, '2024-05-20', 'Jl. Diponegoro No.1-B, Darmo, Kec. Wonokromo, Surabaya, Jawa Timur 60241', '2024-05-13 01:51:52', '2024-05-19 20:20:19'),
(12272, 3, 'Bak/Emberan Fix', 1.00, '2024-05-14', 'Jl. Raya Mlirip No.33, RT.02/RW.10, Mlirip, Kec. Jetis, Kabupaten Mojokerto, Jawa Timur 61352', '2024-05-14 02:08:25', '2024-05-14 02:08:25'),
(12273, 6, 'CD', 1.00, '2024-05-17', 'Jl. Raya Nginden No.35-37, Nginden Jangkungan, Kec. Sukolilo, Surabaya, Jawa Timur 60118', '2024-05-17 01:22:49', '2024-05-17 01:22:49'),
(12274, 11, 'Galon Utuh (Aqua /Club /Bahan Sejenis)', 1.00, '2024-05-17', 'PP2V+VR7, Jl. Ngagel Kebonsari, Ngagelrejo, Kec. Wonokromo, Surabaya, Jawa Timur 60245', '2024-05-17 01:57:58', '2024-05-17 02:05:09'),
(12279, 6, 'Bak Hitam', 1.00, '2024-05-19', 'MP78+C2 Pagesangan, Surabaya, Jawa Timur', '2024-05-18 21:12:15', '2024-05-18 21:12:15'),
(12280, 3, 'Botol Sirup Bagus', 1.00, '2024-05-20', 'MPXR+M4R, Jl. Jagir Wonokromo, Jagir, Kec. Wonokromo, Surabaya, Jawa Timur 60244', '2024-05-19 20:24:31', '2024-05-19 20:24:31');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `foto_profil` text DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `telepon` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `saldo` bigint(100) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `foto_profil`, `name`, `email`, `password`, `telepon`, `alamat`, `role`, `saldo`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, '1716346903_bss.png', 'Admin BSS', 'admin@gmail.com', '$2y$12$HBdt6efjtyyu9iAIZG5V7.g2lSiu92FWwmZb2z8e8yvrmRAHlkUw.', '+62 811-3060-117', 'Jl. Ahmad Yani, Kecamatan Wonocolo No. 117', 'admin', 0, NULL, NULL, '2024-03-08 08:26:28', '2024-05-21 20:01:43'),
(3, '1715588944_tes.jpg', 'Roffi Muhamad', 'asrofi@gmail.com', '$2y$12$eU1FVjVJ049IXD7FKEEDRegTEAtQdxMbMj31us1O02v/7sdXXkLxG', '0988766655545', 'Jln Hasanuddin Dsn Jabon Mliriprowo RT19/06 Tarik- Sidoarjo', 'user', 6300, NULL, NULL, '2024-03-08 08:26:56', '2024-05-21 19:33:44'),
(6, '1715934196_20240313_011735.jpg', 'Annisa Fitri Muhamad', 'annisa@gmail.com', '$2y$12$fPimBKwc15U1OX8QsiwhkuF252wEFsDzLpnL8ZSIZf7XZuo.Hb77.', '098098800909', 'Jl. Semolowaru Tengah I No.6 RW.8, Semolowaru, Kec. Sukolilo, Surabaya, Jawa Timur 60119, Indonesia', 'user', 7380, NULL, NULL, '2024-03-08 10:37:21', '2024-05-18 21:25:13'),
(9, NULL, 'Marcello Tahitoe', 'tahitoe@gmail.com', '$2y$12$1t5h9kLC7SQ87WIW5YrSQuiygrkHhXyjZRvaoZreFkq28S5Boj14e', '099887766555', 'jakarta pusat menteng', 'user', 200, NULL, NULL, '2024-03-08 20:35:33', '2024-05-12 08:39:18'),
(10, NULL, 'Rony Parulian', 'parulian@gmail.com', '$2y$12$toyEjfxO4mbYJhPy5ec4q.TAm9dFKBoXejPanDxYWDv1kT/H33e2i', '099887766555', 'Jl. Semolowaru No.45, Menur Pumpungan, Kec. Sukolilo, Surabaya, Jawa Timur 60118', 'user', 900, NULL, NULL, '2024-03-18 13:45:02', '2024-05-12 23:02:51'),
(11, NULL, 'Salma Salsabil', 'salsabil@gmail.com', '$2y$12$FYq/rvIMdsu9GQII51VsSeKwYMaOSfizOYfUTByPVSrSsOXvHfpX2', '08113060117', 'Jl. Ahmad Yani, Kecamatan Wonocolo No. 117', 'user', 3100, NULL, NULL, '2024-03-18 13:46:42', '2024-05-17 02:06:22');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `harga_sampah`
--
ALTER TABLE `harga_sampah`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `jenis_sampah` (`jenis_sampah`);

--
-- Indeks untuk tabel `jarak`
--
ALTER TABLE `jarak`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `lokasi_penjemputan`
--
ALTER TABLE `lokasi_penjemputan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lokasi_penjemputan_no_reff_foreign` (`no_reff`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `notifikasi`
--
ALTER TABLE `notifikasi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifikasi_no_reff_foreign` (`no_reff`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `pesan_nasabah`
--
ALTER TABLE `pesan_nasabah`
  ADD PRIMARY KEY (`no_reff`),
  ADD KEY `sampahs_user_id_foreign` (`user_id`);

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
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `harga_sampah`
--
ALTER TABLE `harga_sampah`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT untuk tabel `jarak`
--
ALTER TABLE `jarak`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `locations`
--
ALTER TABLE `locations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `lokasi_penjemputan`
--
ALTER TABLE `lokasi_penjemputan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT untuk tabel `notifikasi`
--
ALTER TABLE `notifikasi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pesan_nasabah`
--
ALTER TABLE `pesan_nasabah`
  MODIFY `no_reff` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12281;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `lokasi_penjemputan`
--
ALTER TABLE `lokasi_penjemputan`
  ADD CONSTRAINT `lokasi_penjemputan_no_reff_foreign` FOREIGN KEY (`no_reff`) REFERENCES `pesan_nasabah` (`no_reff`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `notifikasi`
--
ALTER TABLE `notifikasi`
  ADD CONSTRAINT `notifikasi_no_reff_foreign` FOREIGN KEY (`no_reff`) REFERENCES `lokasi_penjemputan` (`no_reff`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pesan_nasabah`
--
ALTER TABLE `pesan_nasabah`
  ADD CONSTRAINT `sampahs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
