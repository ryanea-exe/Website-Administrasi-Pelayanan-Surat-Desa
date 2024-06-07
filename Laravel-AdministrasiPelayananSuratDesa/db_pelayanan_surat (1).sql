-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 10 Okt 2023 pada 04.19
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_pelayanan_surat`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `kk`
--

CREATE TABLE `kk` (
  `id_kk` int(10) NOT NULL,
  `foto_kk` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_kk` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_kepala_kk` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rt` int(2) NOT NULL,
  `rw` int(2) NOT NULL,
  `dusun` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desa` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kecamatan` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kabupaten` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `provinsi` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kk`
--

INSERT INTO `kk` (`id_kk`, `foto_kk`, `no_kk`, `nama_kepala_kk`, `rt`, `rw`, `dusun`, `desa`, `kecamatan`, `kabupaten`, `provinsi`, `created_at`, `updated_at`) VALUES
(1, '', '3502150811210001', 'Parno', 2, 1, 'Krajan', 'Kalimalang', 'Sukorejo', 'Ponorogo', 'Jawa Timur', NULL, NULL),
(2, '', '3502151011220003', 'Gabrielle', 1, 2, 'Sragi Lor', 'Kalimalang', 'Sukorejo', 'Ponorogo', 'Jawa Timur', NULL, NULL),
(3, '', '3502156829466901', 'Riyadi', 1, 3, 'Krajan', 'Kalimalang', 'Sukorejo', 'Ponorogo', 'Jawa Timur', NULL, NULL),
(4, '', '3502152132142502', 'Muhammad Firman Ardiansyah', 3, 2, 'Krajan', 'Kalimalang', 'Sukorejo', 'Ponorogo', 'Jawa Timur', NULL, NULL),
(5, '', '3502158347108603', 'Mujiono', 1, 1, 'Sragi Lor', 'Kalimalang', 'Sukorejo', 'Ponorogo', 'Jawa Timur', NULL, NULL),
(6, '', '3502158351945804', 'Nyoto', 2, 2, 'Sragi Lor', 'Kalimalang', 'Sukorejo', 'Ponorogo', 'Jawa Timur', NULL, NULL),
(7, '', '3502150127452905', 'Suyitno', 2, 2, 'Krajan', 'Kalimalang', 'Sukorejo', 'Ponorogo', 'Jawa Timur', NULL, NULL),
(8, '', '3502158103659206', 'Eko Purwadi', 2, 1, 'Sragi Lor', 'Kalimalang', 'Sukorejo', 'Ponorogo', 'Jawa Timur', NULL, NULL),
(9, '', '3502151634082607', 'Sutrisno', 3, 2, 'Sragi Lor', 'Kalimalang', 'Sukorejo', 'Ponorogo', 'Jawa Timur', NULL, NULL),
(10, '', '35021561389008', 'Suharmanto', 2, 1, 'Krajan', 'Kalimalang', 'Sukorejo', 'Ponorogo', 'Jawa Timur', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2018_06_17_070037_create_anggotas_table', 1),
(3, '2018_06_17_130244_create_bukus_table', 1),
(4, '2018_06_18_014155_create_transaksis_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `penduduk`
--

CREATE TABLE `penduduk` (
  `id_penduduk` int(10) NOT NULL,
  `foto_ktp` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nik` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_kkk` int(10) NOT NULL,
  `nama_lengkap` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempat_lahir` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` enum('Laki-Laki','Perempuan') COLLATE utf8mb4_unicode_ci NOT NULL,
  `agama` enum('Islam','Kristen','Katholik','Hindu','Budha','Konghucu','Atheis') COLLATE utf8mb4_unicode_ci NOT NULL,
  `pendidikan` enum('SD/Sederajat','SMP/Sederajat','SMA/Sederajat','Sarjana') COLLATE utf8mb4_unicode_ci NOT NULL,
  `pekerjaan` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('Belum Kawin','Kawin','Cerai Hidup','Cerai Mati') COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_keluarga` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `golongan_darah` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kewarganegaraan` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_ayah` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_ibu` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_hp` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `penduduk`
--

INSERT INTO `penduduk` (`id_penduduk`, `foto_ktp`, `nik`, `id_kkk`, `nama_lengkap`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `agama`, `pendidikan`, `pekerjaan`, `status`, `status_keluarga`, `golongan_darah`, `kewarganegaraan`, `nama_ayah`, `nama_ibu`, `email`, `no_hp`, `created_at`, `updated_at`) VALUES
(8, '', '3502150712050002', 1, 'Gabriel Nur Slamet', 'Nganjuk', '2005-12-07', 'Laki-Laki', 'Islam', 'SMA/Sederajat', 'Pelajar', 'Belum Kawin', 'Anak', 'O+', 'Indonesia', 'Parno', 'Sumini', 'xyzeaeee123@gmail.com', '6289027496294', NULL, NULL),
(9, '', '3502157245890101', 3, 'Riyadi', 'Ponorogo', '2023-09-18', 'Laki-Laki', 'Islam', 'SMA/Sederajat', 'Perangkat Desa', 'Kawin', 'Kepala Keluarga', '-', '-', '-', '-', '-', '-', NULL, NULL),
(10, '', '3502151234567802', 4, 'Muhammad Firman Ardiansyah', 'Ponorogo', '2023-09-18', 'Laki-Laki', 'Islam', 'Sarjana', 'Perangkat Desa', 'Kawin', 'Kepala Keluarga', '-', '-', '-', '-', '-', '-', NULL, NULL),
(11, '', '3502159163091703', 5, 'Mujiono', 'Ponorogo', '2023-09-18', 'Laki-Laki', 'Islam', 'SMA/Sederajat', 'Perangkat Desa', 'Kawin', 'Kepala Keluarga', '-', '-', '-', '-', '-', '-', NULL, NULL),
(12, '', '3502158164824104', 6, 'Nyoto', 'Ponorogo', '2023-09-18', 'Laki-Laki', 'Islam', 'SMA/Sederajat', 'Perangkat Desa', 'Kawin', 'Kepala Keluarga', '-', '-', '-', '-', '-', '-', NULL, NULL),
(13, '', '3502150135813605', 7, 'Suyitno', 'Ponorogo', '2023-09-18', 'Laki-Laki', 'Islam', 'SMA/Sederajat', 'Perangkat Desa', 'Kawin', 'Kepala Keluarga', '-', '-', '-', '-', '-', '-', NULL, NULL),
(14, '', '3502150154789106', 8, 'Eko Purwadi', 'Ponorogo', '2023-09-18', 'Laki-Laki', 'Islam', 'SMA/Sederajat', 'Perangkat Desa', 'Kawin', 'Kepala Keluarga', '-', '-', '-', '-', '-', '-', NULL, NULL),
(15, '', '3502150014579907', 9, 'Henny Wahyu Purwaningsih', 'Ponorogo', '2023-09-18', 'Laki-Laki', 'Islam', 'Sarjana', 'Perangkat Desa', 'Kawin', 'Istri', '-', '-', '-', '-', '-', '-', NULL, NULL),
(16, '', '3502159102378908', 10, 'Suharmanto', 'Ponorogo', '2023-09-18', 'Laki-Laki', 'Islam', 'SMA/Sederajat', 'Perangkat Desa', 'Kawin', 'Kepala Keluarga', '-', '-', '-', '-', '-', '-', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `sk_kelahiran`
--

CREATE TABLE `sk_kelahiran` (
  `id_kelahiran` int(10) NOT NULL,
  `foto_surat_dokter` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nomor_surat` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_bayi` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempat_lahir` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_lahir` datetime NOT NULL,
  `jenis_kelamin` enum('laki-laki','perempuan') COLLATE utf8mb4_unicode_ci NOT NULL,
  `berat` float NOT NULL,
  `nama_ayah` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_ibu` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_pelapor` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pembuat_surat` int(10) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `sk_kelahiran`
--

INSERT INTO `sk_kelahiran` (`id_kelahiran`, `foto_surat_dokter`, `nomor_surat`, `nama_bayi`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `berat`, `nama_ayah`, `nama_ibu`, `alamat`, `nama_pelapor`, `pembuat_surat`, `created_at`, `updated_at`) VALUES
(1, '', '01/SKL/DS/SM/I/2023', 'Salshabila Adriani', 'Ponorogo', '2023-09-13 00:00:00', 'perempuan', 3.26, 'Gabrielle', 'Caroline', 'Kalimalang Sukorejo Ponorogo', 'Gabrielle', 2, '2023-09-12 20:50:24', '2023-09-12 20:50:24');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sk_kematian`
--

CREATE TABLE `sk_kematian` (
  `id_kematian` int(10) NOT NULL,
  `nik` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_lengkap` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `umur` int(3) NOT NULL,
  `tanggal_meninggal` datetime NOT NULL,
  `tempat_meninggal` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempat_makam` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `penyebab_meninggal` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pembuat_surat` int(10) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `sk_kematian`
--

INSERT INTO `sk_kematian` (`id_kematian`, `nik`, `nama_lengkap`, `umur`, `tanggal_meninggal`, `tempat_meninggal`, `tempat_makam`, `penyebab_meninggal`, `pembuat_surat`, `created_at`, `updated_at`) VALUES
(1, '3502150712050002', 'Gabriel Nur Slamet', 12, '2023-08-23 05:20:12', 'Kalimalang Sukorejo Ponorogo', 'Kalimalang Sukorejo Ponorogo', 'Sakit', 2, '2023-08-22 20:58:16', '2023-08-22 20:58:16');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `nik` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `level` enum('admin','user') COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `nik`, `name`, `username`, `email`, `password`, `gambar`, `level`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, '3502157245890101', 'Riyadi - Kepala Desa', 'admin01', 'kepaladesa01@gmail.com', '$2y$10$PCLwHXSOeoi0smBX/KbKtOzkSXYtNHqpqBTZKvfDyy7RKHsO/FvlS', NULL, 'admin', 'eGQ3LXre6acEUhWfEgf4m3B5ByiYw8TC1bONG3juDxL9dzKDPuidz2U6gxHC', '2023-08-08 20:16:20', '2023-09-18 04:09:20'),
(2, '3502151234567802', 'M. Firman A. - Sekretaris Desa', 'admin02', 'sekretarisdesa01@gmail.com', '$2y$10$PCLwHXSOeoi0smBX/KbKtOzkSXYtNHqpqBTZKvfDyy7RKHsO/FvlS', NULL, 'admin', '', '2023-08-08 20:16:20', '2023-09-18 04:12:03'),
(3, '3502159163091703', 'Mujiono - Kasie', 'user01', 'kasie01@gmail.com', '$2y$10$8cPs8kmqR1T.fzixiYD9gOCqKr8mPgrjfjBUzdwz5bEDb982zSzzG', NULL, 'user', 'eGQ3LXre6acEUhWfEgf4m3B5ByiYw8TC1bONG3juDxL9dzKDPuidz2U6gxHC', '2023-09-18 04:07:50', '2023-09-18 04:13:58'),
(4, '3502158164824104', 'Nyoto - Kasie', 'user02', 'kasie02@gmail.com', '$2y$10$8cPs8kmqR1T.fzixiYD9gOCqKr8mPgrjfjBUzdwz5bEDb982zSzzG', NULL, 'user', NULL, '2023-09-18 04:13:42', '2023-09-18 04:13:42'),
(5, '3502150135813605', 'Suyitno - Kasie', 'user03', 'kasie03@gmail.com', '$2y$10$8cPs8kmqR1T.fzixiYD9gOCqKr8mPgrjfjBUzdwz5bEDb982zSzzG', NULL, 'user', NULL, '2023-09-18 04:15:06', '2023-09-18 04:15:06'),
(6, '3502150154789106', 'Eko Purwadi - Kaur', 'user04', 'kaur01@gmail.com', '$2y$10$8cPs8kmqR1T.fzixiYD9gOCqKr8mPgrjfjBUzdwz5bEDb982zSzzG', NULL, 'user', NULL, '2023-09-18 11:05:02', '2023-09-18 11:05:02'),
(7, '3502150014579907', 'Heni Wahyu P. - Kaur', 'user05', 'kaur02@gmail.com', '$2y$10$8cPs8kmqR1T.fzixiYD9gOCqKr8mPgrjfjBUzdwz5bEDb982zSzzG', NULL, 'user', NULL, '2023-09-18 11:05:58', '2023-09-18 11:08:15'),
(8, '3502159102378908', 'Suharmanto - Kaur', 'user06', 'kaur03@gmail.com', '$2y$10$8cPs8kmqR1T.fzixiYD9gOCqKr8mPgrjfjBUzdwz5bEDb982zSzzG', NULL, 'user', NULL, '2023-09-18 11:15:09', '2023-09-18 11:15:09');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `kk`
--
ALTER TABLE `kk`
  ADD PRIMARY KEY (`id_kk`),
  ADD UNIQUE KEY `no_kk_unique` (`no_kk`) USING BTREE;

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `penduduk`
--
ALTER TABLE `penduduk`
  ADD PRIMARY KEY (`id_penduduk`),
  ADD UNIQUE KEY `nik_unique` (`nik`) USING BTREE,
  ADD KEY `id_kkk_index` (`id_kkk`) USING BTREE;

--
-- Indeks untuk tabel `sk_kelahiran`
--
ALTER TABLE `sk_kelahiran`
  ADD PRIMARY KEY (`id_kelahiran`),
  ADD KEY `pembuat_surat_index` (`pembuat_surat`) USING BTREE;

--
-- Indeks untuk tabel `sk_kematian`
--
ALTER TABLE `sk_kematian`
  ADD PRIMARY KEY (`id_kematian`),
  ADD UNIQUE KEY `nik_unique` (`nik`) USING BTREE,
  ADD KEY `pembuat_surat_index` (`pembuat_surat`) USING BTREE;

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nik_unique` (`nik`) USING BTREE,
  ADD KEY `username_index` (`username`) USING BTREE;

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `kk`
--
ALTER TABLE `kk`
  MODIFY `id_kk` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `penduduk`
--
ALTER TABLE `penduduk`
  MODIFY `id_penduduk` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `sk_kelahiran`
--
ALTER TABLE `sk_kelahiran`
  MODIFY `id_kelahiran` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `sk_kematian`
--
ALTER TABLE `sk_kematian`
  MODIFY `id_kematian` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `penduduk`
--
ALTER TABLE `penduduk`
  ADD CONSTRAINT `penduduk_no_kk_foreign` FOREIGN KEY (`id_kkk`) REFERENCES `kk` (`id_kk`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `sk_kelahiran`
--
ALTER TABLE `sk_kelahiran`
  ADD CONSTRAINT `kelahiran_pembuat_surat_foreign` FOREIGN KEY (`pembuat_surat`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `sk_kematian`
--
ALTER TABLE `sk_kematian`
  ADD CONSTRAINT `kematian_nik_foreign` FOREIGN KEY (`nik`) REFERENCES `penduduk` (`nik`) ON DELETE CASCADE,
  ADD CONSTRAINT `kematian_pembuat_surat_foreign` FOREIGN KEY (`pembuat_surat`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_nik_foreign` FOREIGN KEY (`nik`) REFERENCES `penduduk` (`nik`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
