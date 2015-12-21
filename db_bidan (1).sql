-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 09, 2015 at 10:58 PM
-- Server version: 5.1.41
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_bidan`
--

-- --------------------------------------------------------

--
-- Table structure for table `anggota`
--

CREATE TABLE IF NOT EXISTS `anggota` (
  `nomor` bigint(20) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pass` int(50) NOT NULL,
  `status` int(50) NOT NULL,
  `aktif` int(50) NOT NULL,
  PRIMARY KEY (`nomor`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `anggota`
--

INSERT INTO `anggota` (`nomor`, `nama`, `email`, `pass`, `status`, `aktif`) VALUES
(5, 'admin', 'ilham@yahoo.com', 1234, 1, 0),
(9, 'joko', 'joko@gmail.com', 1234, 2, 0),
(10, 'joko1', 'joko@gmail.com', 1234, 3, 0),
(11, 'joko2', 'joko@gmail.com', 1234, 4, 0);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `username` varchar(50) NOT NULL,
  `password` varchar(10) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
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
-- Table structure for table `tabel_anak`
--

CREATE TABLE IF NOT EXISTS `tabel_anak` (
  `id_anak` int(11) NOT NULL AUTO_INCREMENT,
  `nama_anak` varchar(20) NOT NULL,
  `ttl` date NOT NULL,
  `jenis_kelamin` varchar(10) NOT NULL,
  `gol_darah` varchar(2) NOT NULL,
  `agama` varchar(10) NOT NULL,
  `id_ayah` int(11) NOT NULL,
  `id_ibu` int(11) NOT NULL,
  PRIMARY KEY (`id_anak`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tabel_anak`
--


-- --------------------------------------------------------

--
-- Table structure for table `tabel_ayah`
--

CREATE TABLE IF NOT EXISTS `tabel_ayah` (
  `id_ayah` int(11) NOT NULL AUTO_INCREMENT,
  `nama_ayah` varchar(20) NOT NULL,
  `ttl` date NOT NULL,
  `alamat` text NOT NULL,
  `id_pendidikan` int(11) NOT NULL,
  `pekerjaan` varchar(20) NOT NULL,
  `gol_darah` varchar(2) NOT NULL,
  `agama` varchar(10) NOT NULL,
  `id_ibu` int(11) NOT NULL,
  PRIMARY KEY (`id_ayah`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tabel_ayah`
--


-- --------------------------------------------------------

--
-- Table structure for table `tabel_ibu`
--

CREATE TABLE IF NOT EXISTS `tabel_ibu` (
  `id_ibu` int(11) NOT NULL AUTO_INCREMENT,
  `nama_ibu` varchar(50) NOT NULL,
  `ttl` date NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `id_pendidikan` int(11) NOT NULL,
  `pekerjaan` varchar(20) NOT NULL,
  `gol_darah` varchar(2) NOT NULL,
  `agama` varchar(10) NOT NULL,
  `id_ayah` int(11) NOT NULL,
  PRIMARY KEY (`id_ibu`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tabel_ibu`
--


-- --------------------------------------------------------

--
-- Table structure for table `tabel_imunisasi`
--

CREATE TABLE IF NOT EXISTS `tabel_imunisasi` (
  `id_kartu` int(11) NOT NULL,
  `id_imunisasi` int(11) NOT NULL AUTO_INCREMENT,
  `id_kia` int(11) NOT NULL,
  `id_anak` int(11) NOT NULL,
  `id_ibu` int(11) NOT NULL,
  `tanggal_imunisasi` date NOT NULL,
  `id_jenis_imunisasi` int(11) NOT NULL,
  PRIMARY KEY (`id_imunisasi`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tabel_imunisasi`
--


-- --------------------------------------------------------

--
-- Table structure for table `tabel_jenis_imunisasi`
--

CREATE TABLE IF NOT EXISTS `tabel_jenis_imunisasi` (
  `id_jenis_imunisasi` int(11) NOT NULL AUTO_INCREMENT,
  `nama_jenis_imunisasi` varchar(20) NOT NULL,
  PRIMARY KEY (`id_jenis_imunisasi`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tabel_jenis_imunisasi`
--


-- --------------------------------------------------------

--
-- Table structure for table `tabel_jenis_kb`
--

CREATE TABLE IF NOT EXISTS `tabel_jenis_kb` (
  `id_jenis_kb` int(11) NOT NULL,
  `nama_jenis_kb` varchar(20) NOT NULL,
  PRIMARY KEY (`id_jenis_kb`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_jenis_kb`
--


-- --------------------------------------------------------

--
-- Table structure for table `tabel_kartu_anggota`
--

CREATE TABLE IF NOT EXISTS `tabel_kartu_anggota` (
  `id_kartu` int(11) NOT NULL AUTO_INCREMENT,
  `jenis_periksa` varchar(20) NOT NULL,
  PRIMARY KEY (`id_kartu`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tabel_kartu_anggota`
--


-- --------------------------------------------------------

--
-- Table structure for table `tabel_kb`
--

CREATE TABLE IF NOT EXISTS `tabel_kb` (
  `id_kartu` int(11) NOT NULL,
  `id_ibu` int(11) NOT NULL,
  `id_ayah` int(11) NOT NULL,
  `tanggla_kb` date NOT NULL,
  `id_jenis_kb` int(11) NOT NULL,
  `ket` int(50) NOT NULL,
  PRIMARY KEY (`id_kartu`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_kb`
--


-- --------------------------------------------------------

--
-- Table structure for table `tabel_kia`
--

CREATE TABLE IF NOT EXISTS `tabel_kia` (
  `id_kia` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kia` varchar(20) NOT NULL,
  PRIMARY KEY (`id_kia`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tabel_kia`
--


-- --------------------------------------------------------

--
-- Table structure for table `tabel_melahirkan`
--

CREATE TABLE IF NOT EXISTS `tabel_melahirkan` (
  `id_kartu` int(11) NOT NULL,
  `id_kia` int(11) NOT NULL,
  `id_melahirkan` int(11) NOT NULL AUTO_INCREMENT,
  `id_ibu` int(11) NOT NULL,
  `id_ayah` int(11) NOT NULL,
  `id_anak` int(11) NOT NULL,
  `tanggal_melahirkan` date NOT NULL,
  `ket` varchar(50) NOT NULL,
  PRIMARY KEY (`id_melahirkan`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tabel_melahirkan`
--


-- --------------------------------------------------------

--
-- Table structure for table `tabel_pendidikan`
--

CREATE TABLE IF NOT EXISTS `tabel_pendidikan` (
  `id_pendidikan` int(11) NOT NULL AUTO_INCREMENT,
  `nama_pendidikan` varchar(20) NOT NULL,
  PRIMARY KEY (`id_pendidikan`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tabel_pendidikan`
--


-- --------------------------------------------------------

--
-- Table structure for table `tabel_periksa_ibu_hamil`
--

CREATE TABLE IF NOT EXISTS `tabel_periksa_ibu_hamil` (
  `id_kartu` int(11) NOT NULL,
  `id_kia` int(11) NOT NULL,
  `id_periksa` int(11) NOT NULL AUTO_INCREMENT,
  `id_ibu` int(11) NOT NULL,
  `id_ayah` int(11) NOT NULL,
  `Tanggal_periksa` date NOT NULL,
  `Ket` varchar(50) NOT NULL,
  PRIMARY KEY (`id_periksa`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tabel_periksa_ibu_hamil`
--


-- --------------------------------------------------------

--
-- Table structure for table `tabel_umum`
--

CREATE TABLE IF NOT EXISTS `tabel_umum` (
  `id_kartu` int(11) NOT NULL,
  `id_umum` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(20) NOT NULL,
  `umur` int(11) NOT NULL,
  `jenis_kelamin` varchar(10) NOT NULL,
  `alamat` text NOT NULL,
  `ket` varchar(50) NOT NULL,
  PRIMARY KEY (`id_umum`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tabel_umum`
--


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
