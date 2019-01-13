-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 02 Sep 2018 pada 03.34
-- Versi server: 10.1.31-MariaDB
-- Versi PHP: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jemputernak`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nama_admin` varchar(100) NOT NULL,
  `telepon_admin` varchar(255) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `nama_admin`, `telepon_admin`, `username`, `password`) VALUES
(1, '-', '', 'admin', 'admin123'),
(4, 'Muhammad Yasin Deru', '081568742135', 'yasin', 'yasin123'),
(5, 'Aditya Putra Irawan', '081260176831', 'adit', 'adit123'),
(6, 'Amalia Citra', '085789530002', 'citra', 'citra123');

-- --------------------------------------------------------

--
-- Struktur dari tabel `desa`
--

CREATE TABLE `desa` (
  `id_desa` int(11) NOT NULL,
  `id_gunung` int(11) NOT NULL,
  `desa` varchar(255) NOT NULL,
  `jarak` varchar(255) NOT NULL,
  `biaya` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `desa`
--

INSERT INTO `desa` (`id_desa`, `id_gunung`, `desa`, `jarak`, `biaya`) VALUES
(1, 1, 'Umbulharjo', '3500', '50000'),
(2, 1, 'Hargobinangun', '3800', '60000'),
(3, 1, 'Kepuharjo', '7700', '70000'),
(4, 1, 'Glagaharjo', '9000', '80000'),
(5, 1, 'Purwobinangun', '9200', '90000'),
(6, 1, 'Girikerto', '9400', '100000'),
(7, 1, 'Wonokerto', '11100', '110000'),
(8, 1, 'Gilimanuk', '4600', '120000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `gunung`
--

CREATE TABLE `gunung` (
  `id_gunung` int(11) NOT NULL,
  `gunung` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `gunung`
--

INSERT INTO `gunung` (`id_gunung`, `gunung`) VALUES
(1, 'Gunung Merapi'),
(2, 'Gunung Agung'),
(3, 'Gunung Krakatau'),
(4, 'Gunung Sinabung'),
(5, 'Gunung Tambora'),
(6, 'Gunung Kelud'),
(7, 'Gunung Rinjani'),
(8, 'Gunung Bromo');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jemput`
--

CREATE TABLE `jemput` (
  `id_jemput` int(11) NOT NULL,
  `nik` varchar(255) NOT NULL,
  `telepon` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `sapi` int(11) NOT NULL,
  `kambing` int(11) NOT NULL,
  `unggas` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `id_gunung` int(11) NOT NULL,
  `id_desa` int(11) NOT NULL,
  `alamat_detail` varchar(255) NOT NULL,
  `lokasi_tujuan` varchar(255) NOT NULL,
  `harga` int(20) NOT NULL,
  `id_admin` int(11) NOT NULL,
  `id_status` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jemput`
--

INSERT INTO `jemput` (`id_jemput`, `nik`, `telepon`, `nama`, `sapi`, `kambing`, `unggas`, `jumlah`, `foto`, `id_gunung`, `id_desa`, `alamat_detail`, `lokasi_tujuan`, `harga`, `id_admin`, `id_status`, `time`) VALUES
(16, '1603022207980002', '082177329234', 'Aditya Putra Irawan', 99, 109, 12, 220, 'kambing.jpg', 1, 7, 'Disana sini yang penting ada kamu disana mas', 'asdasdasd', 5160000, 5, 3, '2018-09-02 01:08:24'),
(17, '1601368416480003', '081260176831', 'Shella Eka Nadya Putri', 7, 5, 90, 102, 'ternaksaya.jpg', 1, 6, 'Aku disini tanpa kamu disisi ku adalah hal hampa mas', 'asdasdasda', 770000, 1, 1, '2018-09-02 00:05:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `status`
--

CREATE TABLE `status` (
  `id_status` int(11) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `status`
--

INSERT INTO `status` (`id_status`, `status`) VALUES
(1, 'Menunggu'),
(2, 'Penjemputan'),
(3, 'Selesai');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `desa`
--
ALTER TABLE `desa`
  ADD PRIMARY KEY (`id_desa`),
  ADD KEY `id_gunung` (`id_gunung`);

--
-- Indeks untuk tabel `gunung`
--
ALTER TABLE `gunung`
  ADD PRIMARY KEY (`id_gunung`);

--
-- Indeks untuk tabel `jemput`
--
ALTER TABLE `jemput`
  ADD PRIMARY KEY (`id_jemput`),
  ADD KEY `id_desa` (`id_desa`),
  ADD KEY `id_gunung` (`id_gunung`),
  ADD KEY `id_admin` (`id_admin`),
  ADD KEY `id_status` (`id_status`);

--
-- Indeks untuk tabel `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id_status`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `desa`
--
ALTER TABLE `desa`
  MODIFY `id_desa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `gunung`
--
ALTER TABLE `gunung`
  MODIFY `id_gunung` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `jemput`
--
ALTER TABLE `jemput`
  MODIFY `id_jemput` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `desa`
--
ALTER TABLE `desa`
  ADD CONSTRAINT `desa_ibfk_1` FOREIGN KEY (`id_gunung`) REFERENCES `gunung` (`id_gunung`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `jemput`
--
ALTER TABLE `jemput`
  ADD CONSTRAINT `jemput_ibfk_1` FOREIGN KEY (`id_gunung`) REFERENCES `gunung` (`id_gunung`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `jemput_ibfk_2` FOREIGN KEY (`id_desa`) REFERENCES `desa` (`id_desa`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `jemput_ibfk_3` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id_admin`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `jemput_ibfk_4` FOREIGN KEY (`id_status`) REFERENCES `status` (`id_status`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
