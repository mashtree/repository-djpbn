-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 16, 2015 at 12:49 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `repository`
--

-- --------------------------------------------------------

--
-- Table structure for table `author`
--

CREATE TABLE IF NOT EXISTS `author` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `authorname` varchar(100) NOT NULL,
  `nip` varchar(18) NOT NULL,
  `authorid` varchar(50) DEFAULT NULL,
  `birthplace` varchar(50) DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `phone` varchar(50) NOT NULL,
  `address` text,
  `office` text NOT NULL,
  `about` text,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='tabel data pengarang, pencipta karya pada repository' AUTO_INCREMENT=2 ;

--
-- Dumping data for table `author`
--

INSERT INTO `author` (`id`, `authorname`, `nip`, `authorid`, `birthplace`, `birthdate`, `phone`, `address`, `office`, `about`, `created_at`, `updated_at`) VALUES
(1, 'Abd. Gafur', '195703031984031001', NULL, NULL, NULL, '0859687657', 'banjarmasin', 'banjarmasin', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `author_katalog`
--

CREATE TABLE IF NOT EXISTS `author_katalog` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idkatalog` int(11) NOT NULL,
  `author` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='tabel transaksi pengarang, pencipta karya pada repository' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `categoryname` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='tabel referensi kategori' AUTO_INCREMENT=6 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `categoryname`, `created_at`, `updated_at`) VALUES
(1, 'kajian', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'jurnal', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'artikel', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'infografis', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'video', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `index`
--

CREATE TABLE IF NOT EXISTS `index` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `keyword` varchar(255) NOT NULL,
  `freq` int(11) NOT NULL DEFAULT '1',
  `idkatalog` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='index kata atau kumpulan kata atau kalimat untuk memudahkan pencarian' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `katalog`
--

CREATE TABLE IF NOT EXISTS `katalog` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL DEFAULT 'no title',
  `category` int(11) NOT NULL DEFAULT '1',
  `summary` text NOT NULL,
  `filesize` int(11) NOT NULL DEFAULT '0',
  `filetype` int(11) NOT NULL DEFAULT '1',
  `release` varchar(50) DEFAULT NULL,
  `numpage` smallint(6) DEFAULT NULL,
  `ISBN` varchar(50) DEFAULT NULL,
  `file` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='tabel data katalog repository, seperti buku, kajian, video, infografis dll' AUTO_INCREMENT=2 ;

--
-- Dumping data for table `katalog`
--

INSERT INTO `katalog` (`id`, `title`, `category`, `summary`, `filesize`, `filetype`, `release`, `numpage`, `ISBN`, `file`, `created_at`, `updated_at`) VALUES
(1, 'ANALISIS PENGARUH KOMPETENSI TERHADAP KINERJA PEGAWAI DENGAN\r\nKARAKTERISTIK MULTIGENERASI SEBAGAI VARIABEL MODERASI', 1, 'Dewasa ini, multigenerasi telah menjadi sebuah isu yang muncul hampir di setiap\r\norganisasi yang telah berdiri sejak lama, tak terkecuali pada organisasi Direktorat\r\nJenderal Perbendaharaan. Adanya beberapa generasi usia di dalam dunia kerja\r\nmembuat lingkungan kerja menjadi lebih kompleks karena individu dengan rentang\r\nusia yang lebar akan memiliki cara berpikir, kebiasaan, sikap, tata nilai dan gaya\r\nhidup yang berbeda. Proses transformasi Ditjen Perbendaharaan yang sedemikian\r\ncepat mengharuskan setiap pegawai dari semua kelompok generasi meng-upgrade\r\npengetahuan dan meningkatkan kompetensinya. Dengan kompetensi yang tinggi,\r\nmaka akan berdampak secara langsung terhadap kinerja individu sehingga mampu\r\nmemberikan kontribusi maksimal pada organisasi. Penelitian ini bertujuan menguji\r\npengaruh kompetensi terhadap kinerja pegawai dengan karakteristik multigenerasi\r\nsebagai variable pemoderasi. Penelitian ini adalah penelitian korelasional dengan\r\nmetode campuran antara kuantitatif dan kualitatif. Teknik pengambilan sampel\r\nadalah total sampling dengan populasi keseluruhan pelaksana di lingkup Kanwil\r\nDitjen Perbendaharaan Provinsi Kalimantan Selatan. Sedangkan teknik analisis\r\ndata menggunakan analisis deskripsi dan pengujian hipotesis menggunakan analisis\r\nregresi linier berganda. Hasil penelitian menunjukkan bahwa variable karakter\r\nmultigenerasi tidak memoderasi pada pengaruh variable kompetensi terhadap\r\nkinerja. Selain itu, komposisi generasi, secara umum tidak terlalu berpengaruh\r\nterhadap kinerja unit organisasi.', 9218, 1, '2014', 53, NULL, 'Kajian SDM Kalsel', '0000-00-00 00:00:00', '2015-04-14 13:18:28');

-- --------------------------------------------------------

--
-- Table structure for table `katalog_tags`
--

CREATE TABLE IF NOT EXISTS `katalog_tags` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_katalog` int(11) NOT NULL,
  `id_tag` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `publisher`
--

CREATE TABLE IF NOT EXISTS `publisher` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `publishername` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `phone` varchar(50) NOT NULL,
  `email` varchar(30) NOT NULL,
  `created_ad` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE IF NOT EXISTS `tags` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tag` varchar(50) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `remembered_token` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
