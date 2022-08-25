-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 24 Agu 2022 pada 21.31
-- Versi server: 10.4.21-MariaDB
-- Versi PHP: 7.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `balita`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `databalita`
--

CREATE TABLE `databalita` (
  `id_balita` int(50) NOT NULL,
  `NIK` int(50) NOT NULL,
  `nama_balita` varchar(25) NOT NULL,
  `tempat_lahir` varchar(25) NOT NULL,
  `jenis_kelamin` varchar(25) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `ortu` varchar(25) NOT NULL,
  `periode` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `databalita`
--

INSERT INTO `databalita` (`id_balita`, `NIK`, `nama_balita`, `tempat_lahir`, `jenis_kelamin`, `alamat`, `ortu`, `periode`) VALUES
(0, 23545311, 'rizky ade s', 'nganjuk', 'laki-laki', 'patianrowo', 'Saiful anam ', 0),
(1, 1402022501, 'salma', 'sukabumi', 'perempuan', 'palabuhanratu', 'beti', 0),
(2, 1402022507, 'ade rizky ', 'nganjuk', 'laki - laki', 'patianrowo ', 'eny ', 0),
(3, 1402022508, 'adit', 'lampung', 'laki-laki', 'lampung tengah', 'khaerudin', 0),
(4, 1402022511, 'Nanda', 'Kediri', 'laki-laki', 'Pare', 'Saiful anam ', 0),
(5, 1402022512, 'Ratna', 'Malang', 'perempuan', 'jl A yani no 10', 'Mamik', 0),
(6, 1402022513, 'Agna zaki', 'Madiun', 'laki-laki', 'Jl. srigadis no 08', 'Arief bayu', 0),
(7, 1402022514, 'Wafi', 'Kediri', 'laki-laki', 'Jl sudirman no 09', 'Saiful ', 0),
(8, 1402022515, 'Salwa belva', 'Surabaya', 'perempuan', 'Jl. soetomo gubeng', 'Iik Handayani', 0),
(9, 1402022516, 'Chesa Bhirawa', 'Jakarta Timur', 'perempuan', 'Jl. gede jatinegara', 'Tiah ', 0),
(10, 1402022522, 'rafi', 'Bogor', 'laki-laki', 'bogor tengah', 'rafi ahmad', 0),
(11, 2147483647, 'Zaky hanif', 'Pekanbaru', 'laki-laki', 'jl sudirman', 'Ferdy S', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `hasil_gizi`
--

CREATE TABLE `hasil_gizi` (
  `NIK` int(50) NOT NULL,
  `umur` int(50) NOT NULL,
  `berat_badan` int(50) NOT NULL,
  `tinggi_badan` int(50) NOT NULL,
  `tgl_pengukuran` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `hasil_gizi`
--

INSERT INTO `hasil_gizi` (`NIK`, `umur`, `berat_badan`, `tinggi_badan`, `tgl_pengukuran`) VALUES
(1402022501, 15, 11, 85, '2022-08-23'),
(1402022501, 16, 13, 85, '2022-08-31'),
(1402022501, 17, 18, 85, '2022-09-01'),
(23545311, 11, 15, 80, '2022-08-24'),
(23545311, 11, 15, 80, '2022-08-24'),
(23545311, 12, 15, 85, '2023-01-24'),
(23545311, 15, 18, 80, '2022-08-24'),
(23545311, 16, 18, 85, '2023-01-24'),
(23545311, 15, 18, 80, '2022-08-24'),
(23545311, 16, 18, 85, '2023-01-24');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `jabatan` enum('admin','ketua') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama`, `username`, `password`, `jabatan`) VALUES
(1, 'ade', 'ade24', '123', 'admin'),
(2, 'rizky', 'rizky24', '123', 'ketua');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `databalita`
--
ALTER TABLE `databalita`
  ADD PRIMARY KEY (`NIK`),
  ADD UNIQUE KEY `id_balita` (`id_balita`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
