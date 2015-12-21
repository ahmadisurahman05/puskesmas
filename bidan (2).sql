-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 09, 2015 at 10:57 PM
-- Server version: 5.1.41
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bidan`
--

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
('admin', '1234', 3),
('bidan erna', '1234', 1);

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `tabel_anak`
--

INSERT INTO `tabel_anak` (`id_anak`, `nama_anak`, `ttl`, `jenis_kelamin`, `gol_darah`, `agama`, `id_ayah`, `id_ibu`) VALUES
(20, 'nining', '2015-01-12', 'P', 'B', 'Islam', 25, 34),
(19, 'suahani', '2015-01-12', 'L', 'AB', 'Budha', 23, 32),
(17, 'rizki', '2015-01-10', 'L', 'B', 'Protestan', 19, 28);

-- --------------------------------------------------------

--
-- Table structure for table `tabel_ayah`
--

CREATE TABLE IF NOT EXISTS `tabel_ayah` (
  `id_ayah` int(11) NOT NULL AUTO_INCREMENT,
  `nama_ayah` varchar(50) NOT NULL,
  `ttl` date NOT NULL,
  `alamat` text NOT NULL,
  `id_pendidikan` int(11) NOT NULL,
  `pekerjaan` varchar(20) NOT NULL,
  `gol_darah` varchar(2) NOT NULL,
  `agama` varchar(10) NOT NULL,
  `id_ibu` int(11) NOT NULL,
  PRIMARY KEY (`id_ayah`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `tabel_ayah`
--

INSERT INTO `tabel_ayah` (`id_ayah`, `nama_ayah`, `ttl`, `alamat`, `id_pendidikan`, `pekerjaan`, `gol_darah`, `agama`, `id_ibu`) VALUES
(17, 'ari', '1983-05-02', 'sariasih', 8, 'Polisi', 'AB', 'Protestan', 26),
(16, 'wano', '1989-04-11', 'sarijadi', 10, 'Pegawai wiraswasta', 'A', 'Katolik', 25),
(15, 'yanto', '1989-06-07', 'cijerokaso', 9, 'wiraswasta', 'A', 'Islam', 24),
(18, 'wawan', '1983-06-15', 'Bandung', 8, 'TNI', 'B', 'Protestan', 27),
(19, 'dono', '1977-12-13', 'sentraduta', 6, 'Pegawai wiraswasta', 'O', 'Budha', 28),
(20, 'Ayah', '1989-06-22', 'braga', 2, 'Pengusaha', 'AB', 'Hindu', 29),
(21, 'Abdulhadi', '1995-09-04', 'cijerokaso 2', 10, 'Programing', 'A', 'Islam', 30),
(22, 'caci', '1982-07-13', 'garut', 8, 'wiraswasta', 'AB', 'Islam', 31),
(23, 'singgih', '1982-06-17', 'cikambing', 8, 'wirausaha', 'O', 'Budha', 32),
(24, 'pompom', '1976-09-14', 'palembang', 10, 'TNI', 'O', 'Islam', 33),
(25, 'nanang', '1976-05-18', 'sukabumi', 7, 'wirausaha', 'AB', 'Islam', 34);

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
  PRIMARY KEY (`id_ibu`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=35 ;

--
-- Dumping data for table `tabel_ibu`
--

INSERT INTO `tabel_ibu` (`id_ibu`, `nama_ibu`, `ttl`, `alamat`, `id_pendidikan`, `pekerjaan`, `gol_darah`, `agama`) VALUES
(32, 'sugihani', '1982-07-06', 'cikambing', 7, 'wirausaha', 'O', 'Budha'),
(31, 'cucu', '1981-02-26', 'garut', 8, 'wirausaha', 'AB', 'Islam'),
(29, 'Ibu', '1977-02-13', 'braga', 8, 'Pegawai wiraswasta', 'O', 'Hindu'),
(30, 'Hany', '1995-04-14', 'cijerokaso 2', 6, 'Pengusaha', 'O', 'Islam'),
(25, 'Susi', '1988-07-20', 'sarijadi', 8, 'PNS', 'AB', 'Katolik'),
(26, 'ira', '1983-05-02', 'sariasih', 8, 'Polisi', 'AB', 'Protestan'),
(27, 'Wati', '1988-06-13', 'Bandung', 10, 'PNS', 'O', 'Budha'),
(28, 'devi', '1978-06-06', 'sentraduta', 7, 'ibu rumah tangga', 'B', 'Budha'),
(33, 'desi', '1982-06-16', 'palembang', 7, 'PNS', 'B', 'Islam'),
(34, 'nunung', '1982-12-07', 'sukabumi', 8, 'wirausaha', 'B', 'Islam');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_imunisasi`
--

CREATE TABLE IF NOT EXISTS `tabel_imunisasi` (
  `id_imunisasi` int(11) NOT NULL AUTO_INCREMENT,
  `id_anak` int(11) NOT NULL,
  `umur_anak` int(4) NOT NULL,
  `id_ibu` int(11) NOT NULL,
  `tanggal_imunisasi` date NOT NULL,
  `id_jenis_imunisasi` int(11) NOT NULL,
  PRIMARY KEY (`id_imunisasi`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `tabel_imunisasi`
--

INSERT INTO `tabel_imunisasi` (`id_imunisasi`, `id_anak`, `umur_anak`, `id_ibu`, `tanggal_imunisasi`, `id_jenis_imunisasi`) VALUES
(10, 20, 2, 34, '2015-01-12', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tabel_jenis_imunisasi`
--

CREATE TABLE IF NOT EXISTS `tabel_jenis_imunisasi` (
  `id_jenis_imunisasi` int(11) NOT NULL AUTO_INCREMENT,
  `nama_jenis_imunisasi` varchar(20) NOT NULL,
  PRIMARY KEY (`id_jenis_imunisasi`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `tabel_jenis_imunisasi`
--

INSERT INTO `tabel_jenis_imunisasi` (`id_jenis_imunisasi`, `nama_jenis_imunisasi`) VALUES
(1, 'BCG 1'),
(2, 'BCG 2'),
(3, 'BCG 3'),
(4, 'BCG 4'),
(5, 'Polio 1'),
(6, 'Polio 2'),
(7, 'Polio 3'),
(8, 'Polio4'),
(9, 'Hepatitis B 1'),
(10, 'Hepatitis B 2'),
(11, 'Hepatitis B 3'),
(12, 'Hepatitis B 4'),
(13, 'Campak');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_jenis_kb`
--

CREATE TABLE IF NOT EXISTS `tabel_jenis_kb` (
  `id_jenis_kb` int(11) NOT NULL AUTO_INCREMENT,
  `nama_jenis_kb` varchar(20) NOT NULL,
  PRIMARY KEY (`id_jenis_kb`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tabel_jenis_kb`
--

INSERT INTO `tabel_jenis_kb` (`id_jenis_kb`, `nama_jenis_kb`) VALUES
(1, 'Suntik 1 Bulan'),
(2, 'Suntik 3 Bulan'),
(3, 'IUD'),
(4, 'Implan '),
(5, 'Pil');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_kb`
--

CREATE TABLE IF NOT EXISTS `tabel_kb` (
  `id_KB` int(11) NOT NULL AUTO_INCREMENT,
  `id_ibu` int(11) NOT NULL,
  `id_ayah` int(11) NOT NULL,
  `tanggla_kb` date NOT NULL,
  `id_jenis_kb` int(11) NOT NULL,
  `ket` varchar(50) NOT NULL,
  PRIMARY KEY (`id_KB`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `tabel_kb`
--

INSERT INTO `tabel_kb` (`id_KB`, `id_ibu`, `id_ayah`, `tanggla_kb`, `id_jenis_kb`, `ket`) VALUES
(12, 26, 17, '2015-01-10', 2, 'April cek ulang'),
(13, 27, 18, '2015-01-12', 3, 'cek 4 tahun kedepan'),
(14, 33, 24, '2015-01-12', 5, 'pil setelah habis cek kembali');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_melahirkan`
--

CREATE TABLE IF NOT EXISTS `tabel_melahirkan` (
  `id_melahirkan` int(11) NOT NULL AUTO_INCREMENT,
  `id_ibu` int(11) NOT NULL,
  `id_ayah` int(11) NOT NULL,
  `id_anak` int(11) NOT NULL,
  `tanggal_melahirkan` date NOT NULL,
  `ket` varchar(50) NOT NULL,
  PRIMARY KEY (`id_melahirkan`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tabel_melahirkan`
--

INSERT INTO `tabel_melahirkan` (`id_melahirkan`, `id_ibu`, `id_ayah`, `id_anak`, `tanggal_melahirkan`, `ket`) VALUES
(3, 28, 19, 17, '2015-01-10', 'Kelahiran normal'),
(4, 25, 16, 18, '2015-01-12', 'persalinan normal'),
(5, 32, 23, 19, '2015-01-12', 'persalinana normal anak normal');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_pendidikan`
--

CREATE TABLE IF NOT EXISTS `tabel_pendidikan` (
  `id_pendidikan` int(11) NOT NULL AUTO_INCREMENT,
  `nama_pendidikan` varchar(20) NOT NULL,
  PRIMARY KEY (`id_pendidikan`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `tabel_pendidikan`
--

INSERT INTO `tabel_pendidikan` (`id_pendidikan`, `nama_pendidikan`) VALUES
(1, 'SD'),
(2, 'SMP'),
(3, 'SMA'),
(4, 'D1'),
(5, 'D2'),
(6, 'D3'),
(7, 'D4'),
(8, 'S1'),
(9, 'S2'),
(10, 'S3');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_periksa_ibu_hamil`
--

CREATE TABLE IF NOT EXISTS `tabel_periksa_ibu_hamil` (
  `id_periksa` int(11) NOT NULL AUTO_INCREMENT,
  `id_ibu` int(11) NOT NULL,
  `id_ayah` int(11) NOT NULL,
  `Tanggal_periksa` date NOT NULL,
  `Ket` varchar(50) NOT NULL,
  PRIMARY KEY (`id_periksa`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `tabel_periksa_ibu_hamil`
--

INSERT INTO `tabel_periksa_ibu_hamil` (`id_periksa`, `id_ibu`, `id_ayah`, `Tanggal_periksa`, `Ket`) VALUES
(7, 30, 21, '2015-01-10', '3 bulan kandungan'),
(8, 31, 22, '2015-01-12', 'cek 2bulan kehamilan'),
(9, 30, 21, '2015-01-13', 'cek 3bulan uda keluaran');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_umum`
--

CREATE TABLE IF NOT EXISTS `tabel_umum` (
  `id_umum` int(11) NOT NULL AUTO_INCREMENT,
  `jenis_penyakit` varchar(100) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `umur` int(11) NOT NULL,
  `jenis_kelamin` varchar(10) NOT NULL,
  `tanggal_periksa` date NOT NULL,
  `alamat` text NOT NULL,
  `ket` text NOT NULL,
  PRIMARY KEY (`id_umum`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tabel_umum`
--

INSERT INTO `tabel_umum` (`id_umum`, `jenis_penyakit`, `nama`, `umur`, `jenis_kelamin`, `tanggal_periksa`, `alamat`, `ket`) VALUES
(4, 'bisul', 'yanti', 18, 'P', '2015-01-10', 'bandung', 'bisul 2 bln kedpn cek ulang'),
(5, 'Mata ikan', 'Dulhad', 21, 'L', '2015-01-12', 'Garut', 'Op Kecil angkat mata ikan');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
