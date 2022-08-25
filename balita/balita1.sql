-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 23 Agu 2022 pada 10.16
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
  `umur` int(25) NOT NULL,
  `berat_badan` int(25) NOT NULL,
  `tinggi_badan` int(25) NOT NULL,
  `tgl_pengukuran` date NOT NULL DEFAULT '2002-09-24',
  `periode` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `databalita`
--

INSERT INTO `databalita` (`id_balita`, `NIK`, `nama_balita`, `tempat_lahir`, `jenis_kelamin`, `alamat`, `ortu`, `umur`, `berat_badan`, `tinggi_badan`, `tgl_pengukuran`, `periode`) VALUES
(1, 1402022501, 'salma', 'sukabumi', 'perempuan', 'palabuhanratu', 'beti', 3, 100, 80, '2022-05-24', 0),
(2, 1402022507, 'ade rizky ', 'nganjuk', 'laki - laki', 'patianrowo ', 'eny ', 25, 12, 85, '2022-05-12', 0),
(3, 1402022508, 'adit', 'lampung', 'laki-laki', 'lampung tengah', 'khaerudin', 16, 15, 80, '2002-09-21', 0),
(4, 1402022511, 'Nanda', 'Kediri', 'laki-laki', 'Pare', 'Saiful anam ', 15, 12, 77, '2002-09-24', 0),
(5, 1402022512, 'Ratna', 'Malang', 'perempuan', 'jl A yani no 10', 'Mamik', 23, 8, 80, '2002-09-24', 0),
(6, 1402022513, 'Agna zaki', 'Madiun', 'laki-laki', 'Jl. srigadis no 08', 'Arief bayu', 47, 12, 77, '2002-09-24', 0),
(7, 1402022514, 'Wafi', 'Kediri', 'laki-laki', 'Jl sudirman no 09', 'Saiful ', 25, 15, 78, '2002-09-24', 0),
(8, 1402022515, 'Salwa belva', 'Surabaya', 'perempuan', 'Jl. soetomo gubeng', 'Iik Handayani', 30, 15, 89, '2002-09-24', 0),
(9, 1402022516, 'Chesa Bhirawa', 'Jakarta Timur', 'perempuan', 'Jl. gede jatinegara', 'Tiah ', 16, 14, 80, '2002-09-24', 0),
(10, 1402022522, 'rafi', 'Bogor', 'laki-laki', 'bogor tengah', 'rafi ahmad', 20, 18, 90, '2002-09-24', 0),
(11, 2147483647, 'Zaky hanif', 'Pekanbaru', 'laki-laki', 'jl sudirman', 'Ferdy S', 31, 20, 70, '2002-09-24', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `hasil_gizi`
--

CREATE TABLE `hasil_gizi` (
  `NIK` int(50) NOT NULL,
  `berat_badan` int(50) NOT NULL,
  `tinggi_badan` int(50) NOT NULL,
  `umur` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
