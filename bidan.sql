-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 03 Jan 2015 pada 17.41
-- Versi Server: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bidan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `anggota`
--

CREATE TABLE IF NOT EXISTS `anggota` (
`nomor` bigint(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pass` int(50) NOT NULL,
  `status` int(50) NOT NULL,
  `aktif` int(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `anggota`
--

INSERT INTO `anggota` (`nomor`, `nama`, `email`, `pass`, `status`, `aktif`) VALUES
(5, 'admin', 'ilham@yahoo.com', 1234, 1, 0),
(9, 'joko', 'joko@gmail.com', 1234, 2, 0),
(10, 'joko1', 'joko@gmail.com', 1234, 3, 0),
(11, 'joko2', 'joko@gmail.com', 1234, 4, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `username` varchar(50) NOT NULL,
  `password` varchar(10) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `login`
--

INSERT INTO `login` (`username`, `password`, `status`) VALUES
('bidan', '1234', 1),
('puskesmas', '1234', 2),
('admin', '1234', 0),
('admin', '1234', 0),
('Puskesmas', '1234', 0),
('admin', '1234', 0),
('Puskesmas', '1234', 0),
('admin', '1234', 0),
('Puskesmas', '1234', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_anak`
--

CREATE TABLE IF NOT EXISTS `tabel_anak` (
`id_anak` int(11) NOT NULL,
  `nama_anak` varchar(20) NOT NULL,
  `ttl` date NOT NULL,
  `jenis_kelamin` varchar(10) NOT NULL,
  `gol_darah` varchar(2) NOT NULL,
  `agama` varchar(10) NOT NULL,
  `id_ayah` int(11) NOT NULL,
  `id_ibu` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_ayah`
--

CREATE TABLE IF NOT EXISTS `tabel_ayah` (
`id_ayah` int(11) NOT NULL,
  `nama_ayah` varchar(20) NOT NULL,
  `ttl` date NOT NULL,
  `alamat` text NOT NULL,
  `id_pendidikan` int(11) NOT NULL,
  `pekerjaan` varchar(20) NOT NULL,
  `gol_darah` varchar(2) NOT NULL,
  `agama` varchar(10) NOT NULL,
  `id_ibu` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_ibu`
--

CREATE TABLE IF NOT EXISTS `tabel_ibu` (
`id_ibu` int(11) NOT NULL,
  `nama_ibu` varchar(50) NOT NULL,
  `ttl` date NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `id_pendidikan` int(11) NOT NULL,
  `pekerjaan` varchar(20) NOT NULL,
  `gol_darah` varchar(2) NOT NULL,
  `agama` varchar(10) NOT NULL,
  `id_ayah` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_imunisasi`
--

CREATE TABLE IF NOT EXISTS `tabel_imunisasi` (
  `id_kartu` int(11) NOT NULL,
`id_imunisasi` int(11) NOT NULL,
  `id_kia` int(11) NOT NULL,
  `id_anak` int(11) NOT NULL,
  `id_ibu` int(11) NOT NULL,
  `tanggal_imunisasi` date NOT NULL,
  `id_jenis_imunisasi` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_jenis_imunisasi`
--

CREATE TABLE IF NOT EXISTS `tabel_jenis_imunisasi` (
`id_jenis_imunisasi` int(11) NOT NULL,
  `nama_jenis_imunisasi` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_jenis_kb`
--

CREATE TABLE IF NOT EXISTS `tabel_jenis_kb` (
  `id_jenis_kb` int(11) NOT NULL,
  `nama_jenis_kb` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_kartu_anggota`
--

CREATE TABLE IF NOT EXISTS `tabel_kartu_anggota` (
`id_kartu` int(11) NOT NULL,
  `jenis_periksa` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_kb`
--

CREATE TABLE IF NOT EXISTS `tabel_kb` (
  `id_kartu` int(11) NOT NULL,
  `id_ibu` int(11) NOT NULL,
  `id_ayah` int(11) NOT NULL,
  `tanggla_kb` date NOT NULL,
  `id_jenis_kb` int(11) NOT NULL,
  `ket` int(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_kia`
--

CREATE TABLE IF NOT EXISTS `tabel_kia` (
`id_kia` int(11) NOT NULL,
  `nama_kia` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_melahirkan`
--

CREATE TABLE IF NOT EXISTS `tabel_melahirkan` (
  `id_kartu` int(11) NOT NULL,
  `id_kia` int(11) NOT NULL,
`id_melahirkan` int(11) NOT NULL,
  `id_ibu` int(11) NOT NULL,
  `id_ayah` int(11) NOT NULL,
  `id_anak` int(11) NOT NULL,
  `tanggal_melahirkan` date NOT NULL,
  `ket` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_pendidikan`
--

CREATE TABLE IF NOT EXISTS `tabel_pendidikan` (
`id_pendidikan` int(11) NOT NULL,
  `nama_pendidikan` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_periksa_ibu_hamil`
--

CREATE TABLE IF NOT EXISTS `tabel_periksa_ibu_hamil` (
  `id_kartu` int(11) NOT NULL,
  `id_kia` int(11) NOT NULL,
`id_periksa` int(11) NOT NULL,
  `id_ibu` int(11) NOT NULL,
  `id_ayah` int(11) NOT NULL,
  `Tanggal_periksa` date NOT NULL,
  `Ket` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_umum`
--

CREATE TABLE IF NOT EXISTS `tabel_umum` (
  `id_kartu` int(11) NOT NULL,
`id_umum` int(11) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `umur` int(11) NOT NULL,
  `jenis_kelamin` varchar(10) NOT NULL,
  `alamat` text NOT NULL,
  `ket` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anggota`
--
ALTER TABLE `anggota`
 ADD PRIMARY KEY (`nomor`);

--
-- Indexes for table `tabel_anak`
--
ALTER TABLE `tabel_anak`
 ADD PRIMARY KEY (`id_anak`);

--
-- Indexes for table `tabel_ayah`
--
ALTER TABLE `tabel_ayah`
 ADD PRIMARY KEY (`id_ayah`);

--
-- Indexes for table `tabel_ibu`
--
ALTER TABLE `tabel_ibu`
 ADD PRIMARY KEY (`id_ibu`);

--
-- Indexes for table `tabel_imunisasi`
--
ALTER TABLE `tabel_imunisasi`
 ADD PRIMARY KEY (`id_imunisasi`);

--
-- Indexes for table `tabel_jenis_imunisasi`
--
ALTER TABLE `tabel_jenis_imunisasi`
 ADD PRIMARY KEY (`id_jenis_imunisasi`);

--
-- Indexes for table `tabel_jenis_kb`
--
ALTER TABLE `tabel_jenis_kb`
 ADD PRIMARY KEY (`id_jenis_kb`);

--
-- Indexes for table `tabel_kartu_anggota`
--
ALTER TABLE `tabel_kartu_anggota`
 ADD PRIMARY KEY (`id_kartu`);

--
-- Indexes for table `tabel_kb`
--
ALTER TABLE `tabel_kb`
 ADD PRIMARY KEY (`id_kartu`);

--
-- Indexes for table `tabel_kia`
--
ALTER TABLE `tabel_kia`
 ADD PRIMARY KEY (`id_kia`);

--
-- Indexes for table `tabel_melahirkan`
--
ALTER TABLE `tabel_melahirkan`
 ADD PRIMARY KEY (`id_melahirkan`);

--
-- Indexes for table `tabel_pendidikan`
--
ALTER TABLE `tabel_pendidikan`
 ADD PRIMARY KEY (`id_pendidikan`);

--
-- Indexes for table `tabel_periksa_ibu_hamil`
--
ALTER TABLE `tabel_periksa_ibu_hamil`
 ADD PRIMARY KEY (`id_periksa`);

--
-- Indexes for table `tabel_umum`
--
ALTER TABLE `tabel_umum`
 ADD PRIMARY KEY (`id_umum`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anggota`
--
ALTER TABLE `anggota`
MODIFY `nomor` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `tabel_anak`
--
ALTER TABLE `tabel_anak`
MODIFY `id_anak` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tabel_ayah`
--
ALTER TABLE `tabel_ayah`
MODIFY `id_ayah` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tabel_ibu`
--
ALTER TABLE `tabel_ibu`
MODIFY `id_ibu` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tabel_imunisasi`
--
ALTER TABLE `tabel_imunisasi`
MODIFY `id_imunisasi` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tabel_jenis_imunisasi`
--
ALTER TABLE `tabel_jenis_imunisasi`
MODIFY `id_jenis_imunisasi` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tabel_kartu_anggota`
--
ALTER TABLE `tabel_kartu_anggota`
MODIFY `id_kartu` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tabel_kia`
--
ALTER TABLE `tabel_kia`
MODIFY `id_kia` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tabel_melahirkan`
--
ALTER TABLE `tabel_melahirkan`
MODIFY `id_melahirkan` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tabel_pendidikan`
--
ALTER TABLE `tabel_pendidikan`
MODIFY `id_pendidikan` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tabel_periksa_ibu_hamil`
--
ALTER TABLE `tabel_periksa_ibu_hamil`
MODIFY `id_periksa` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tabel_umum`
--
ALTER TABLE `tabel_umum`
MODIFY `id_umum` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
