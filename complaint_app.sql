-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 11 Des 2019 pada 07.47
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `complaint_app`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nama_user` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `nama_user`, `username`, `password`) VALUES
(1, 'Sonny Is Isnain Romadhoni', 'sonnyisisnainromadhoni', 'sonnyynnos'),
(2, 'Daffa Malik Fadlurrahman', 'daffamalikfadlurrahman', 'daffaaffad'),
(3, 'Dini Amelia Yusup', 'diniameliayusup', 'diniinid');

-- --------------------------------------------------------

--
-- Struktur dari tabel `divisi`
--

CREATE TABLE `divisi` (
  `id_divisi` int(11) NOT NULL,
  `nama_divisi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `divisi`
--

INSERT INTO `divisi` (`id_divisi`, `nama_divisi`) VALUES
(1, 'Tata Usaha'),
(2, 'Cleaning Service'),
(3, 'Kesiswaan'),
(4, 'SAPRA'),
(5, 'Perpustakaan'),
(6, 'HUBIN'),
(7, 'LAB'),
(8, 'Kurikulum');

-- --------------------------------------------------------

--
-- Struktur dari tabel `keluhan`
--

CREATE TABLE `keluhan` (
  `no_keluhan` int(8) NOT NULL,
  `nisn` int(8) NOT NULL,
  `pelapor` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `divisi` varchar(50) NOT NULL,
  `isi_keluhan` text NOT NULL,
  `tgl_keluhan` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `hari` int(11) NOT NULL,
  `status` varchar(20) NOT NULL,
  `feedback_1` int(1) NOT NULL,
  `feedback_2` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `keluhan`
--

INSERT INTO `keluhan` (`no_keluhan`, `nisn`, `pelapor`, `email`, `divisi`, `isi_keluhan`, `tgl_keluhan`, `hari`, `status`, `feedback_1`, `feedback_2`) VALUES
(18070416, 20167213, 'lutfi guntur', 'lufiguntur@gmail.com', 'Tata Usaha', 'mmaf admin rekening pembayaraan sekolah saya eror, tolong di perbaiki rekening saya', '2019-11-18 06:44:04', 0, 'Baru', 0, 0),
(18071797, 20177315, 'anjar setiawan', 'anjar098@gmail.com', 'SAPRA', 'AC di kelas saya 12 tel 3 bocor, tolong di perbaiki', '2019-11-18 06:40:17', 0, 'Baru', 0, 0),
(18073998, 20192354, 'farelando', 'farelan@gail.com', 'Tata Usaha', 'rekening saya tidak bisa digunakan untuk pembayaran sekolah', '2019-11-18 06:52:39', 0, 'Baru', 0, 0),
(18075277, 20187416, 'yurika liandra', 'yurika23@gmail.com', 'LAB', 'di lab sisco komputer nya rusak pak bluescreen tidak bisa di gunakan, tolong di perbaiki ', '2019-11-18 06:55:52', 0, 'Baru', 0, 0),
(18075348, 20182316, 'farisdika', 'farisdika@gmail.com', 'SAPRA', 'di kelas saya kekurangan bangku dan meja tolong di tambahkan meja dan bangku di kelas saya', '2019-11-18 06:46:53', 0, 'Baru', 0, 0),
(20101598, 20202020, 'Tester', 'isnainromadoni@gmail.com', 'SAPRA', 'tester', '2019-11-20 09:14:09', 12, 'Selesai', 1, 1),
(22093799, 40404040, 'Sonny Is Isnain Romadhoni', 'isnainromadoni@gmail.com', 'SAPRA', 'Meja rusak', '2019-11-22 08:21:47', 7, 'Selesai', 1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `teknisi`
--

CREATE TABLE `teknisi` (
  `id_teknisi` int(11) NOT NULL,
  `nama_user` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `divisi` varchar(50) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `teknisi`
--

INSERT INTO `teknisi` (`id_teknisi`, `nama_user`, `username`, `password`, `divisi`, `status`) VALUES
(1, 'Fauzi Ramadhan', 'diniameliayusup', 'fauzi', 'Tata Usaha', 1),
(2, 'Nur Fadli', 'sonnyisisnainromadhoni ', 'sonnyynnos', 'LAB', 1),
(3, 'Rahmat Malik', 'daffamalikfadlurrahman ', 'daffaaffad', 'SAPRA', 1),
(4, 'Hermawan', 'hermawan', '123', 'Cleaning Service', 1),
(5, 'aqila rahmati', 'aqila', 'aqila', 'Perpustakaan', 1),
(6, 'alif dermawan', 'alif', 'alif', 'Kesiswaan', 1),
(7, 'hendrawan', 'hendra', 'hendra', 'Kurikulum', 1),
(8, 'aditia siregar', 'adit', 'adit', 'HUBIN', 1),
(9, 'ratih', 'ratih', 'ratih', 'Perpustakaan', 1),
(10, 'farah', 'farah', 'farah', 'Tata Usaha', 1),
(11, 'rayn', 'rayn', 'rayn', 'Cleaning Service', 1),
(12, 'indahwati', 'indah', 'indah', 'Kesiswaan', 1),
(13, 'riani ningsih', 'riani', 'riani', 'HUBIN', 1),
(14, 'riski saputra', 'riski', 'riski', 'LAB', 1),
(15, 'duwi indriani', 'duwi', 'duwi', 'Kurikulum', 1),
(16, 'hendriwan', 'hendri', 'hendri', 'SAPRA', 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `divisi`
--
ALTER TABLE `divisi`
  ADD PRIMARY KEY (`id_divisi`);

--
-- Indeks untuk tabel `keluhan`
--
ALTER TABLE `keluhan`
  ADD PRIMARY KEY (`no_keluhan`);

--
-- Indeks untuk tabel `teknisi`
--
ALTER TABLE `teknisi`
  ADD PRIMARY KEY (`id_teknisi`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `divisi`
--
ALTER TABLE `divisi`
  MODIFY `id_divisi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `teknisi`
--
ALTER TABLE `teknisi`
  MODIFY `id_teknisi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
