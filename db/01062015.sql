-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.6.17 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             9.1.0.4867
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping database structure for repository
DROP DATABASE IF EXISTS `repository`;
CREATE DATABASE IF NOT EXISTS `repository` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `repository`;


-- Dumping structure for table repository.author
DROP TABLE IF EXISTS `author`;
CREATE TABLE IF NOT EXISTS `author` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `authorname` varchar(100) NOT NULL,
  `nip` varchar(18) NOT NULL,
  `authorid` varchar(50) DEFAULT NULL,
  `phone` varchar(50) NOT NULL,
  `birthplace` varchar(50) NOT NULL,
  `birthdate` date NOT NULL,
  `address` text,
  `office` text NOT NULL,
  `foto` varchar(50) DEFAULT NULL,
  `about` text,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 COMMENT='tabel data pengarang, pencipta karya pada repository';

-- Dumping data for table repository.author: ~4 rows (approximately)
/*!40000 ALTER TABLE `author` DISABLE KEYS */;
INSERT INTO `author` (`id`, `authorname`, `nip`, `authorid`, `phone`, `birthplace`, `birthdate`, `address`, `office`, `foto`, `about`, `created_at`, `updated_at`) VALUES
	(1, 'Abd. Gafur', '195703031984031001', NULL, '0859687657', 'banjarmasin', '0000-00-00', 'banjarmasin', 'banjarmasin', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(2, 'paiman subejo', '198205152001121001', NULL, '080808089', 'sukoharjo', '1982-05-15', 'sukoharjo', 'Sekretariat Ditjen Perbendaharaan', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(3, 'Sukarman', '198205122002121001', '0907879870', '08999999', 'malang', '2009-02-04', 'xasxas', 'xsaxsa', 'foto_31244.jpg', 'xsaxsa', '2015-05-25 14:17:35', '2015-05-25 14:17:35');
/*!40000 ALTER TABLE `author` ENABLE KEYS */;


-- Dumping structure for table repository.author_katalog
DROP TABLE IF EXISTS `author_katalog`;
CREATE TABLE IF NOT EXISTS `author_katalog` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idkatalog` int(11) NOT NULL,
  `author` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1 COMMENT='tabel transaksi pengarang, pencipta karya pada repository';

-- Dumping data for table repository.author_katalog: ~18 rows (approximately)
/*!40000 ALTER TABLE `author_katalog` DISABLE KEYS */;
INSERT INTO `author_katalog` (`id`, `idkatalog`, `author`, `created_at`, `updated_at`) VALUES
	(1, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(2, 1, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(3, 8, 1, '2015-05-30 00:36:37', '2015-05-30 00:36:37'),
	(4, 9, 2, '2015-05-30 00:46:09', '2015-05-30 00:46:09'),
	(5, 10, 2, '2015-05-30 00:46:50', '2015-05-30 00:46:50'),
	(6, 11, 2, '2015-05-30 00:48:01', '2015-05-30 00:48:01'),
	(7, 12, 2, '2015-05-30 00:49:04', '2015-05-30 00:49:04'),
	(8, 13, 2, '2015-05-30 00:49:48', '2015-05-30 00:49:48'),
	(9, 14, 2, '2015-05-30 00:50:30', '2015-05-30 00:50:30'),
	(10, 15, 3, '2015-05-30 00:51:12', '2015-05-30 00:51:12'),
	(11, 16, 2, '2015-05-30 00:51:50', '2015-05-30 00:51:50'),
	(12, 17, 1, '2015-05-30 00:53:05', '2015-05-30 00:53:05'),
	(13, 18, 2, '2015-05-30 00:53:34', '2015-05-30 00:53:34'),
	(14, 19, 1, '2015-05-30 00:54:05', '2015-05-30 00:54:05'),
	(15, 20, 1, '2015-05-30 00:54:31', '2015-05-30 00:54:31'),
	(16, 21, 2, '2015-05-30 01:00:46', '2015-05-30 01:00:46'),
	(17, 22, 2, '2015-05-30 01:02:15', '2015-05-30 01:02:15'),
	(18, 23, 2, '2015-05-30 01:04:17', '2015-05-30 01:04:17');
/*!40000 ALTER TABLE `author_katalog` ENABLE KEYS */;


-- Dumping structure for table repository.category
DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `categoryname` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1 COMMENT='tabel referensi kategori';

-- Dumping data for table repository.category: ~5 rows (approximately)
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` (`id`, `categoryname`, `created_at`, `updated_at`) VALUES
	(1, 'kajian', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(2, 'jurnal', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(3, 'artikel', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(4, 'infografis', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(5, 'video', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
/*!40000 ALTER TABLE `category` ENABLE KEYS */;


-- Dumping structure for table repository.comment
DROP TABLE IF EXISTS `comment`;
CREATE TABLE IF NOT EXISTS `comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `comment` text,
  `id_obj` int(11) DEFAULT NULL,
  `cat_comment` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Dumping data for table repository.comment: ~4 rows (approximately)
/*!40000 ALTER TABLE `comment` DISABLE KEYS */;
INSERT INTO `comment` (`id`, `name`, `comment`, `id_obj`, `cat_comment`, `created_at`, `updated_at`) VALUES
	(1, 'Marwanto', 'Luar Biasa!!!', 1, 1, '2015-05-24 21:50:43', '2015-05-24 21:50:43'),
	(2, 'Muhammad Arif', 'Siapa dulu dong gurunya :D!', 1, 1, '2015-05-24 21:51:30', '2015-05-24 21:51:30'),
	(3, 'Ahmad Nurholis', 'Selalu out of the box! rock!', 1, 2, '2015-05-24 21:52:06', '2015-05-24 21:52:24'),
	(5, 'Teguh Dwi Nugroho', 'Ini Gafur yang mana ya?', 1, 2, '2015-05-31 14:10:48', '2015-05-31 14:10:48');
/*!40000 ALTER TABLE `comment` ENABLE KEYS */;


-- Dumping structure for table repository.index
DROP TABLE IF EXISTS `index`;
CREATE TABLE IF NOT EXISTS `index` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `keyword` varchar(255) NOT NULL,
  `freq` int(11) NOT NULL DEFAULT '1',
  `idkatalog` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='index kata atau kumpulan kata atau kalimat untuk memudahkan pencarian';

-- Dumping data for table repository.index: ~0 rows (approximately)
/*!40000 ALTER TABLE `index` DISABLE KEYS */;
/*!40000 ALTER TABLE `index` ENABLE KEYS */;


-- Dumping structure for table repository.katalog
DROP TABLE IF EXISTS `katalog`;
CREATE TABLE IF NOT EXISTS `katalog` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL DEFAULT 'no title',
  `category` int(11) NOT NULL DEFAULT '1',
  `summary` text NOT NULL,
  `filesize` int(11) DEFAULT '0',
  `filetype` int(11) DEFAULT '1',
  `release` varchar(50) NOT NULL,
  `numpage` smallint(6) DEFAULT NULL,
  `ISBN` varchar(50) DEFAULT NULL,
  `file` varchar(50) DEFAULT NULL,
  `publisher` int(11) DEFAULT NULL,
  `img` varchar(100) DEFAULT NULL,
  `like` smallint(6) DEFAULT '0',
  `view` int(11) DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1 COMMENT='tabel data katalog repository, seperti buku, kajian, video, infografis dll';

-- Dumping data for table repository.katalog: ~22 rows (approximately)
/*!40000 ALTER TABLE `katalog` DISABLE KEYS */;
INSERT INTO `katalog` (`id`, `title`, `category`, `summary`, `filesize`, `filetype`, `release`, `numpage`, `ISBN`, `file`, `publisher`, `img`, `like`, `view`, `created_at`, `updated_at`) VALUES
	(1, 'ANALISIS PENGARUH KOMPETENSI TERHADAP KINERJA PEGAWAI DENGAN\r\nKARAKTERISTIK MULTIGENERASI SEBAGAI VARIABEL MODERASI', 1, 'Dewasa ini, multigenerasi telah menjadi sebuah isu yang muncul hampir di setiap\r\norganisasi yang telah berdiri sejak lama, tak terkecuali pada organisasi Direktorat\r\nJenderal Perbendaharaan. Adanya beberapa generasi usia di dalam dunia kerja\r\nmembuat lingkungan kerja menjadi lebih kompleks karena individu dengan rentang\r\nusia yang lebar akan memiliki cara berpikir, kebiasaan, sikap, tata nilai dan gaya\r\nhidup yang berbeda. Proses transformasi Ditjen Perbendaharaan yang sedemikian\r\ncepat mengharuskan setiap pegawai dari semua kelompok generasi meng-upgrade\r\npengetahuan dan meningkatkan kompetensinya. Dengan kompetensi yang tinggi,\r\nmaka akan berdampak secara langsung terhadap kinerja individu sehingga mampu\r\nmemberikan kontribusi maksimal pada organisasi. Penelitian ini bertujuan menguji\r\npengaruh kompetensi terhadap kinerja pegawai dengan karakteristik multigenerasi\r\nsebagai variable pemoderasi. Penelitian ini adalah penelitian korelasional dengan\r\nmetode campuran antara kuantitatif dan kualitatif. Teknik pengambilan sampel\r\nadalah total sampling dengan populasi keseluruhan pelaksana di lingkup Kanwil\r\nDitjen Perbendaharaan Provinsi Kalimantan Selatan. Sedangkan teknik analisis\r\ndata menggunakan analisis deskripsi dan pengujian hipotesis menggunakan analisis\r\nregresi linier berganda. Hasil penelitian menunjukkan bahwa variable karakter\r\nmultigenerasi tidak memoderasi pada pengaruh variable kompetensi terhadap\r\nkinerja. Selain itu, komposisi generasi, secara umum tidak terlalu berpengaruh\r\nterhadap kinerja unit organisasi.', 9218, 1, '2014', 53, NULL, 'Kajian SDM Kalsel.pdf', NULL, '4musim.jpg', 2, 1, '0000-00-00 00:00:00', '2015-05-31 14:16:03'),
	(2, 'ANALISIS PENGARUH KOMPETENSI TERHADAP KINERJA PEGAWAI DENGAN\r\nKARAKTERISTIK MULTIGENERASI SEBAGAI VARIABEL MODERASI', 2, 'Dewasa ini, multigenerasi telah menjadi sebuah isu yang muncul hampir di setiap\r\norganisasi yang telah berdiri sejak lama, tak terkecuali pada organisasi Direktorat\r\nJenderal Perbendaharaan. Adanya beberapa generasi usia di dalam dunia kerja\r\nmembuat lingkungan kerja menjadi lebih kompleks karena individu dengan rentang\r\nusia yang lebar akan memiliki cara berpikir, kebiasaan, sikap, tata nilai dan gaya\r\nhidup yang berbeda. Proses transformasi Ditjen Perbendaharaan yang sedemikian\r\ncepat mengharuskan setiap pegawai dari semua kelompok generasi meng-upgrade\r\npengetahuan dan meningkatkan kompetensinya. Dengan kompetensi yang tinggi,\r\nmaka akan berdampak secara langsung terhadap kinerja individu sehingga mampu\r\nmemberikan kontribusi maksimal pada organisasi. Penelitian ini bertujuan menguji\r\npengaruh kompetensi terhadap kinerja pegawai dengan karakteristik multigenerasi\r\nsebagai variable pemoderasi. Penelitian ini adalah penelitian korelasional dengan\r\nmetode campuran antara kuantitatif dan kualitatif. Teknik pengambilan sampel\r\nadalah total sampling dengan populasi keseluruhan pelaksana di lingkup Kanwil\r\nDitjen Perbendaharaan Provinsi Kalimantan Selatan. Sedangkan teknik analisis\r\ndata menggunakan analisis deskripsi dan pengujian hipotesis menggunakan analisis\r\nregresi linier berganda. Hasil penelitian menunjukkan bahwa variable karakter\r\nmultigenerasi tidak memoderasi pada pengaruh variable kompetensi terhadap\r\nkinerja. Selain itu, komposisi generasi, secara umum tidak terlalu berpengaruh\r\nterhadap kinerja unit organisasi.', 9218, 1, '2014', 53, NULL, 'Kajian SDM Kalsel.pdf', NULL, '4musim.jpg', 13, 0, '0000-00-00 00:00:00', '2015-05-27 23:32:22'),
	(3, 'ANALISIS PENGARUH KOMPETENSI TERHADAP KINERJA PEGAWAI DENGAN\r\nKARAKTERISTIK MULTIGENERASI SEBAGAI VARIABEL MODERASI', 3, 'Dewasa ini, multigenerasi telah menjadi sebuah isu yang muncul hampir di setiap\r\norganisasi yang telah berdiri sejak lama, tak terkecuali pada organisasi Direktorat\r\nJenderal Perbendaharaan. Adanya beberapa generasi usia di dalam dunia kerja\r\nmembuat lingkungan kerja menjadi lebih kompleks karena individu dengan rentang\r\nusia yang lebar akan memiliki cara berpikir, kebiasaan, sikap, tata nilai dan gaya\r\nhidup yang berbeda. Proses transformasi Ditjen Perbendaharaan yang sedemikian\r\ncepat mengharuskan setiap pegawai dari semua kelompok generasi meng-upgrade\r\npengetahuan dan meningkatkan kompetensinya. Dengan kompetensi yang tinggi,\r\nmaka akan berdampak secara langsung terhadap kinerja individu sehingga mampu\r\nmemberikan kontribusi maksimal pada organisasi. Penelitian ini bertujuan menguji\r\npengaruh kompetensi terhadap kinerja pegawai dengan karakteristik multigenerasi\r\nsebagai variable pemoderasi. Penelitian ini adalah penelitian korelasional dengan\r\nmetode campuran antara kuantitatif dan kualitatif. Teknik pengambilan sampel\r\nadalah total sampling dengan populasi keseluruhan pelaksana di lingkup Kanwil\r\nDitjen Perbendaharaan Provinsi Kalimantan Selatan. Sedangkan teknik analisis\r\ndata menggunakan analisis deskripsi dan pengujian hipotesis menggunakan analisis\r\nregresi linier berganda. Hasil penelitian menunjukkan bahwa variable karakter\r\nmultigenerasi tidak memoderasi pada pengaruh variable kompetensi terhadap\r\nkinerja. Selain itu, komposisi generasi, secara umum tidak terlalu berpengaruh\r\nterhadap kinerja unit organisasi.', 9218, 1, '2014', 53, NULL, 'Kajian SDM Kalsel.pdf', NULL, '4musim.jpg', 13, 0, '0000-00-00 00:00:00', '2015-05-27 23:32:22'),
	(4, 'ANALISIS PENGARUH KOMPETENSI TERHADAP KINERJA PEGAWAI DENGAN\r\nKARAKTERISTIK MULTIGENERASI SEBAGAI VARIABEL MODERASI', 4, 'Dewasa ini, multigenerasi telah menjadi sebuah isu yang muncul hampir di setiap\r\norganisasi yang telah berdiri sejak lama, tak terkecuali pada organisasi Direktorat\r\nJenderal Perbendaharaan. Adanya beberapa generasi usia di dalam dunia kerja\r\nmembuat lingkungan kerja menjadi lebih kompleks karena individu dengan rentang\r\nusia yang lebar akan memiliki cara berpikir, kebiasaan, sikap, tata nilai dan gaya\r\nhidup yang berbeda. Proses transformasi Ditjen Perbendaharaan yang sedemikian\r\ncepat mengharuskan setiap pegawai dari semua kelompok generasi meng-upgrade\r\npengetahuan dan meningkatkan kompetensinya. Dengan kompetensi yang tinggi,\r\nmaka akan berdampak secara langsung terhadap kinerja individu sehingga mampu\r\nmemberikan kontribusi maksimal pada organisasi. Penelitian ini bertujuan menguji\r\npengaruh kompetensi terhadap kinerja pegawai dengan karakteristik multigenerasi\r\nsebagai variable pemoderasi. Penelitian ini adalah penelitian korelasional dengan\r\nmetode campuran antara kuantitatif dan kualitatif. Teknik pengambilan sampel\r\nadalah total sampling dengan populasi keseluruhan pelaksana di lingkup Kanwil\r\nDitjen Perbendaharaan Provinsi Kalimantan Selatan. Sedangkan teknik analisis\r\ndata menggunakan analisis deskripsi dan pengujian hipotesis menggunakan analisis\r\nregresi linier berganda. Hasil penelitian menunjukkan bahwa variable karakter\r\nmultigenerasi tidak memoderasi pada pengaruh variable kompetensi terhadap\r\nkinerja. Selain itu, komposisi generasi, secara umum tidak terlalu berpengaruh\r\nterhadap kinerja unit organisasi.', 9218, 1, '2014', 53, NULL, 'Kajian SDM Kalsel.pdf', NULL, '4musim.jpg', 13, 0, '0000-00-00 00:00:00', '2015-05-27 23:32:22'),
	(5, 'ANALISIS PENGARUH KOMPETENSI TERHADAP KINERJA PEGAWAI DENGAN\r\nKARAKTERISTIK MULTIGENERASI SEBAGAI VARIABEL MODERASI', 5, 'Dewasa ini, multigenerasi telah menjadi sebuah isu yang muncul hampir di setiap\r\norganisasi yang telah berdiri sejak lama, tak terkecuali pada organisasi Direktorat\r\nJenderal Perbendaharaan. Adanya beberapa generasi usia di dalam dunia kerja\r\nmembuat lingkungan kerja menjadi lebih kompleks karena individu dengan rentang\r\nusia yang lebar akan memiliki cara berpikir, kebiasaan, sikap, tata nilai dan gaya\r\nhidup yang berbeda. Proses transformasi Ditjen Perbendaharaan yang sedemikian\r\ncepat mengharuskan setiap pegawai dari semua kelompok generasi meng-upgrade\r\npengetahuan dan meningkatkan kompetensinya. Dengan kompetensi yang tinggi,\r\nmaka akan berdampak secara langsung terhadap kinerja individu sehingga mampu\r\nmemberikan kontribusi maksimal pada organisasi. Penelitian ini bertujuan menguji\r\npengaruh kompetensi terhadap kinerja pegawai dengan karakteristik multigenerasi\r\nsebagai variable pemoderasi. Penelitian ini adalah penelitian korelasional dengan\r\nmetode campuran antara kuantitatif dan kualitatif. Teknik pengambilan sampel\r\nadalah total sampling dengan populasi keseluruhan pelaksana di lingkup Kanwil\r\nDitjen Perbendaharaan Provinsi Kalimantan Selatan. Sedangkan teknik analisis\r\ndata menggunakan analisis deskripsi dan pengujian hipotesis menggunakan analisis\r\nregresi linier berganda. Hasil penelitian menunjukkan bahwa variable karakter\r\nmultigenerasi tidak memoderasi pada pengaruh variable kompetensi terhadap\r\nkinerja. Selain itu, komposisi generasi, secara umum tidak terlalu berpengaruh\r\nterhadap kinerja unit organisasi.', 9218, 1, '2014', 53, NULL, 'Bower.mp4', NULL, '4musim.jpg', 13, 2, '0000-00-00 00:00:00', '2015-05-31 14:16:52'),
	(7, 'ANALISIS PENGARUH KOMPETENSI TERHADAP KINERJA PEGAWAI DENGAN\r\nKARAKTERISTIK MULTIGENERASI SEBAGAI VARIABEL MODERASI', 5, 'Dewasa ini, multigenerasi telah menjadi sebuah isu yang muncul hampir di setiap\r\norganisasi yang telah berdiri sejak lama, tak terkecuali pada organisasi Direktorat\r\nJenderal Perbendaharaan. Adanya beberapa generasi usia di dalam dunia kerja\r\nmembuat lingkungan kerja menjadi lebih kompleks karena individu dengan rentang\r\nusia yang lebar akan memiliki cara berpikir, kebiasaan, sikap, tata nilai dan gaya\r\nhidup yang berbeda. Proses transformasi Ditjen Perbendaharaan yang sedemikian\r\ncepat mengharuskan setiap pegawai dari semua kelompok generasi meng-upgrade\r\npengetahuan dan meningkatkan kompetensinya. Dengan kompetensi yang tinggi,\r\nmaka akan berdampak secara langsung terhadap kinerja individu sehingga mampu\r\nmemberikan kontribusi maksimal pada organisasi. Penelitian ini bertujuan menguji\r\npengaruh kompetensi terhadap kinerja pegawai dengan karakteristik multigenerasi\r\nsebagai variable pemoderasi. Penelitian ini adalah penelitian korelasional dengan\r\nmetode campuran antara kuantitatif dan kualitatif. Teknik pengambilan sampel\r\nadalah total sampling dengan populasi keseluruhan pelaksana di lingkup Kanwil\r\nDitjen Perbendaharaan Provinsi Kalimantan Selatan. Sedangkan teknik analisis\r\ndata menggunakan analisis deskripsi dan pengujian hipotesis menggunakan analisis\r\nregresi linier berganda. Hasil penelitian menunjukkan bahwa variable karakter\r\nmultigenerasi tidak memoderasi pada pengaruh variable kompetensi terhadap\r\nkinerja. Selain itu, komposisi generasi, secara umum tidak terlalu berpengaruh\r\nterhadap kinerja unit organisasi.', 9218, 1, '2014', 53, NULL, 'https://www.youtube.com/embed/JAUoeqvedMo', NULL, '4musim.jpg', 13, 0, '0000-00-00 00:00:00', '2015-05-27 23:32:23'),
	(8, 'tes artikel', 3, '<p>sfsaavtvet dvet cr crere</p>', 0, 1, '2015', NULL, NULL, NULL, NULL, NULL, 0, 0, '2015-05-30 00:36:37', '2015-05-30 00:36:37'),
	(9, 'dasdasd', 3, '<p>dsadsdsdsads</p>', 0, 1, '2015', NULL, NULL, NULL, NULL, NULL, 0, 0, '2015-05-30 00:46:09', '2015-05-30 00:46:09'),
	(10, 'dasdsad', 3, '<p>dsadsadsadas</p>', 0, 1, '2015', NULL, NULL, NULL, NULL, NULL, 0, 0, '2015-05-30 00:46:50', '2015-05-30 00:46:50'),
	(11, 'dasdasd', 3, '<p>dsadasdsa</p>', 0, 1, '2015', NULL, NULL, NULL, NULL, NULL, 0, 0, '2015-05-30 00:48:01', '2015-05-30 00:48:01'),
	(12, 'dsadas', 3, '<p>dasdsadas</p>', 0, 1, '2015', NULL, NULL, NULL, NULL, NULL, 0, 0, '2015-05-30 00:49:04', '2015-05-30 00:49:04'),
	(13, 'fsafsf', 3, '<p>fsfsdfsdfsd</p>', 0, 1, '2015', NULL, NULL, NULL, NULL, NULL, 0, 0, '2015-05-30 00:49:48', '2015-05-30 00:49:48'),
	(14, 'aDAD', 3, '<p>CSACSACS</p>', 0, 1, '2015', NULL, NULL, NULL, NULL, NULL, 0, 0, '2015-05-30 00:50:30', '2015-05-30 00:50:30'),
	(15, 'fafsaf', 3, '<p>asfsafsfsfsa</p>', 0, 1, '2015', NULL, NULL, NULL, NULL, NULL, 0, 0, '2015-05-30 00:51:12', '2015-05-30 00:51:12'),
	(16, 'dasdasdas', 3, '<p>xcasxsaxsaxsa</p>', 0, 1, '2015', NULL, NULL, NULL, NULL, NULL, 0, 0, '2015-05-30 00:51:50', '2015-05-30 00:51:50'),
	(17, 'saSDa', 3, '<p>sASasa</p>', 0, 1, '2015', NULL, NULL, NULL, NULL, NULL, 0, 0, '2015-05-30 00:53:05', '2015-05-30 00:53:05'),
	(18, 'XAXASXAS', 3, '<p>dasdasdas</p>', 0, 1, '2015', NULL, NULL, NULL, NULL, NULL, 0, 0, '2015-05-30 00:53:34', '2015-05-30 00:53:34'),
	(19, 'saDSA', 3, '<p>CASDFSADSA</p>', 0, 1, '2015', NULL, NULL, NULL, NULL, NULL, 0, 0, '2015-05-30 00:54:05', '2015-05-30 00:54:05'),
	(20, 'sadas', 3, '<p>sdfdsfsdf</p>', 0, 1, '2015', NULL, NULL, NULL, NULL, NULL, 0, 0, '2015-05-30 00:54:30', '2015-05-30 00:54:30'),
	(21, 'sdadas', 3, '<p>csdcsdds</p>', 0, 1, '2015', NULL, NULL, NULL, NULL, NULL, 0, 0, '2015-05-30 01:00:46', '2015-05-30 01:00:46'),
	(22, 'tes tag baru', 3, '<p>xasxsaxasxsax</p>', 0, 1, '2015', NULL, NULL, NULL, NULL, NULL, 0, 0, '2015-05-30 01:02:15', '2015-05-30 01:02:15'),
	(23, 'tes tag baru keduax', 3, '<p>xcasxsaxsasx</p>', 0, 1, '2015', NULL, NULL, NULL, NULL, NULL, 0, 0, '2015-05-30 01:04:17', '2015-05-30 01:04:17');
/*!40000 ALTER TABLE `katalog` ENABLE KEYS */;


-- Dumping structure for table repository.katalog_tags
DROP TABLE IF EXISTS `katalog_tags`;
CREATE TABLE IF NOT EXISTS `katalog_tags` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idkatalog` int(11) NOT NULL,
  `idtag` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- Dumping data for table repository.katalog_tags: ~9 rows (approximately)
/*!40000 ALTER TABLE `katalog_tags` DISABLE KEYS */;
INSERT INTO `katalog_tags` (`id`, `idkatalog`, `idtag`, `created_at`, `updated_at`) VALUES
	(1, 11, 0, '2015-05-30 00:48:01', '2015-05-30 00:48:01'),
	(2, 12, 0, '2015-05-30 00:49:04', '2015-05-30 00:49:04'),
	(3, 21, 5, '2015-05-30 01:00:46', '2015-05-30 01:00:46'),
	(4, 22, 0, '2015-05-30 01:02:15', '2015-05-30 01:02:15'),
	(5, 22, 0, '2015-05-30 01:02:15', '2015-05-30 01:02:15'),
	(6, 22, 6, '2015-05-30 01:02:15', '2015-05-30 01:02:15'),
	(7, 23, 1, '2015-05-30 01:04:17', '2015-05-30 01:04:17'),
	(8, 23, 2, '2015-05-30 01:04:17', '2015-05-30 01:04:17'),
	(9, 23, 7, '2015-05-30 01:04:17', '2015-05-30 01:04:17');
/*!40000 ALTER TABLE `katalog_tags` ENABLE KEYS */;


-- Dumping structure for table repository.like
DROP TABLE IF EXISTS `like`;
CREATE TABLE IF NOT EXISTS `like` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idkatalog` int(11) DEFAULT '0',
  `iduser` int(11) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

-- Dumping data for table repository.like: ~0 rows (approximately)
/*!40000 ALTER TABLE `like` DISABLE KEYS */;
INSERT INTO `like` (`id`, `idkatalog`, `iduser`, `created_at`, `updated_at`) VALUES
	(20, 1, 1, '2015-05-28 00:19:46', '2015-05-28 00:19:46');
/*!40000 ALTER TABLE `like` ENABLE KEYS */;


-- Dumping structure for table repository.publisher
DROP TABLE IF EXISTS `publisher`;
CREATE TABLE IF NOT EXISTS `publisher` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `publishername` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `phone` varchar(50) NOT NULL,
  `email` varchar(30) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Dumping data for table repository.publisher: ~2 rows (approximately)
/*!40000 ALTER TABLE `publisher` DISABLE KEYS */;
INSERT INTO `publisher` (`id`, `publishername`, `address`, `phone`, `email`, `created_at`, `updated_at`) VALUES
	(4, 'dsadssqqqqqqqqqqq', ' axs d fdfvcfdvfd', '0980999', 'mail@mail.com', '2015-05-28 14:41:06', '2015-05-28 14:48:26');
/*!40000 ALTER TABLE `publisher` ENABLE KEYS */;


-- Dumping structure for table repository.quote
DROP TABLE IF EXISTS `quote`;
CREATE TABLE IF NOT EXISTS `quote` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `quote` varchar(255) NOT NULL DEFAULT '0',
  `date` date DEFAULT '0000-00-00',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table repository.quote: ~2 rows (approximately)
/*!40000 ALTER TABLE `quote` DISABLE KEYS */;
INSERT INTO `quote` (`id`, `quote`, `date`, `created_at`, `updated_at`) VALUES
	(1, 'Menulislah!', '0000-00-00', '2015-05-27 12:54:22', '2015-05-27 12:54:22'),
	(2, 'Menulis dari bisa menulis sampai tidak bisa menulis', '1982-06-07', '2015-05-27 16:16:04', '2015-05-28 14:37:04');
/*!40000 ALTER TABLE `quote` ENABLE KEYS */;


-- Dumping structure for table repository.tags
DROP TABLE IF EXISTS `tags`;
CREATE TABLE IF NOT EXISTS `tags` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tag` varchar(50) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- Dumping data for table repository.tags: ~7 rows (approximately)
/*!40000 ALTER TABLE `tags` DISABLE KEYS */;
INSERT INTO `tags` (`id`, `tag`, `created_at`, `updated_at`) VALUES
	(1, 'kinerja', '0000-00-00 00:00:00', '2015-05-29 19:37:16'),
	(2, 'mutasi', '0000-00-00 00:00:00', '2015-05-29 19:37:28'),
	(3, 'hukuman', '0000-00-00 00:00:00', '2015-05-29 19:37:38'),
	(4, 'pensiun', '0000-00-00 00:00:00', '2015-05-29 19:37:53'),
	(5, 'aduan', '2015-05-30 01:00:46', '2015-05-30 01:00:46'),
	(6, 'rakor', '2015-05-30 01:02:15', '2015-05-30 01:02:15'),
	(7, 'tukin', '2015-05-30 01:04:17', '2015-05-30 01:04:17');
/*!40000 ALTER TABLE `tags` ENABLE KEYS */;


-- Dumping structure for table repository.users
DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `remember_token` varchar(255) NOT NULL,
  `idauthor` smallint(6) DEFAULT NULL,
  `role` smallint(6) NOT NULL DEFAULT '3',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table repository.users: ~0 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `username`, `password`, `remember_token`, `idauthor`, `role`, `created_at`, `updated_at`) VALUES
	(1, 'admin', '$2y$10$/k91IEdiOFhcyJGABp1E8OIe1jKUvOBUfCe3bBI2p1brO3Lzs98BS', 'rkZMznYNoejFheOkXGn9LizjdZrZdhg19xFbvUf0jMV1bkWPmWLURkmtSqgw', NULL, 1, '0000-00-00 00:00:00', '2015-05-28 15:09:05');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
