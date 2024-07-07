-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 18 Jun 2024 pada 14.13
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
-- Database: `tugas_pemweb1`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `akun`
--

CREATE TABLE `akun` (
  `id` int(11) NOT NULL,
  `username` char(10) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `akun`
--

INSERT INTO `akun` (`id`, `username`, `password`) VALUES
(1, '2203040001', 'admin'),
(2, '2203040002', 'admin'),
(3, '2203040003', 'admin'),
(4, '2203040004', 'admin'),
(5, '2203040005', 'admin'),
(6, '2203040006', 'admin'),
(7, '2203040007', 'admin'),
(8, '2203040008', 'admin'),
(9, '2203040009', 'admin'),
(10, '2203040010', 'admin'),
(11, '2203040011', 'admin'),
(12, '2203040012', 'admin'),
(28, '2203040039', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `akun2`
--

CREATE TABLE `akun2` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `akun2`
--

INSERT INTO `akun2` (`id`, `username`, `password`) VALUES
(4, 'bayu', '123'),
(5, 'oniel', '123'),
(8, 'admin', '123'),
(9, 'freya', '123'),
(10, 'ella', '123'),
(11, 'hazard', '123'),
(12, 'ambatron', '123'),
(13, 'ashel', '123'),
(14, 'kante', '123');

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE `siswa` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `jenis_kelamin` enum('L','P') DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `kelas` enum('IPA','IPS','BAHASA') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`id`, `nama`, `tanggal_lahir`, `jenis_kelamin`, `email`, `kelas`) VALUES
(4, 'Bayu Aji Nugroho', '2004-01-07', 'L', 'bayuaji@twentySix.co.id', 'IPA'),
(5, 'Cornelia Syafa Vanisa &lt;3', '2002-07-26', 'P', 'oniel@twentySix.co.id', 'IPA'),
(8, 'admin Default', '2024-07-09', 'L', 'adminDefault@twentySix.co.id', 'IPS'),
(9, 'Freyanashifa Jayawardana', '2006-02-13', 'P', 'freya@twentySix.co.id', 'IPA'),
(10, 'Gabriela Abigail ', '2006-08-07', 'P', 'ella@twentySix.co.id', 'BAHASA'),
(11, 'Eden Hazard', '1991-01-07', 'L', 'hazard@twentySix.co.id', 'IPS'),
(12, 'Ambatron', '2024-02-29', 'L', 'ambatron123@twentySix.co.id', 'BAHASA'),
(13, 'Adzana Shaliha', '2005-01-08', 'P', 'ashel@twentySix.co.id', 'BAHASA'),
(14, 'N&#039;Golo Kanté', '1991-03-29', 'L', 'kante@twentySix.co.id', 'IPA');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `akun2`
--
ALTER TABLE `akun2`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `akun`
--
ALTER TABLE `akun`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT untuk tabel `akun2`
--
ALTER TABLE `akun2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
