-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 19, 2020 at 04:39 PM
-- Server version: 5.7.24
-- PHP Version: 7.3.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sidangskut`
--

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_mhs` int(11) NOT NULL,
  `nama_mhs` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nim` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_prodi` bigint(20) UNSIGNED NOT NULL,
  `judul_idn` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `judul_eng` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dosbing` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nomerhp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_acc_dosbing` date NOT NULL,
  `id_status` bigint(20) UNSIGNED NOT NULL,
  `file_cover_ta` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`id`, `id_mhs`, `nama_mhs`, `email`, `nim`, `id_prodi`, `judul_idn`, `judul_eng`, `dosbing`, `nomerhp`, `tgl_acc_dosbing`, `id_status`, `file_cover_ta`, `created_at`, `updated_at`) VALUES
(1, 1, 'mardek', 'mardek@gamil.co', '91823091', 4, 'rung gawe huhu', 'iki yo durung', 'sopoya', '088190921', '2020-07-15', 1, 'onnnooo', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mahasiswa_id_prodi_foreign` (`id_prodi`),
  ADD KEY `mahasiswa_id_status_foreign` (`id_status`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD CONSTRAINT `mahasiswa_id_prodi_foreign` FOREIGN KEY (`id_prodi`) REFERENCES `prodis` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `mahasiswa_id_status_foreign` FOREIGN KEY (`id_status`) REFERENCES `status` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
