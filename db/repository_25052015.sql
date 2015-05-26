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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COMMENT='tabel data pengarang, pencipta karya pada repository';

-- Dumping data for table repository.author: ~2 rows (approximately)
/*!40000 ALTER TABLE `author` DISABLE KEYS */;
INSERT INTO `author` (`id`, `authorname`, `nip`, `authorid`, `phone`, `birthplace`, `birthdate`, `address`, `office`, `foto`, `about`, `created_at`, `updated_at`) VALUES
	(1, 'Abd. Gafur', '195703031984031001', NULL, '0859687657', 'banjarmasin', '0000-00-00', 'banjarmasin', 'banjarmasin', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(2, 'paiman subejo', '198205152001121001', NULL, '080808089', 'sukoharjo', '1982-05-15', 'sukoharjo', 'Sekretariat Ditjen Perbendaharaan', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00');
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COMMENT='tabel transaksi pengarang, pencipta karya pada repository';

-- Dumping data for table repository.author_katalog: ~2 rows (approximately)
/*!40000 ALTER TABLE `author_katalog` DISABLE KEYS */;
INSERT INTO `author_katalog` (`id`, `idkatalog`, `author`, `created_at`, `updated_at`) VALUES
	(1, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(2, 1, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00');
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table repository.comment: ~3 rows (approximately)
/*!40000 ALTER TABLE `comment` DISABLE KEYS */;
INSERT INTO `comment` (`id`, `name`, `comment`, `id_obj`, `cat_comment`, `created_at`, `updated_at`) VALUES
	(1, 'Marwanto', 'Luar Biasa!!!', 1, 1, '2015-05-24 21:50:43', '2015-05-24 21:50:43'),
	(2, 'Muhammad Arif', 'Siapa dulu dong gurunya :D!', 1, 1, '2015-05-24 21:51:30', '2015-05-24 21:51:30'),
	(3, 'Ahmad Nurholis', 'Selalu out of the box! rock!', 1, 2, '2015-05-24 21:52:06', '2015-05-24 21:52:24');
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
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COMMENT='tabel data katalog repository, seperti buku, kajian, video, infografis dll';

-- Dumping data for table repository.katalog: ~1 rows (approximately)
/*!40000 ALTER TABLE `katalog` DISABLE KEYS */;
INSERT INTO `katalog` (`id`, `title`, `category`, `summary`, `filesize`, `filetype`, `release`, `numpage`, `ISBN`, `file`, `publisher`, `img`, `like`, `created_at`, `updated_at`) VALUES
	(1, 'ANALISIS PENGARUH KOMPETENSI TERHADAP KINERJA PEGAWAI DENGAN\r\nKARAKTERISTIK MULTIGENERASI SEBAGAI VARIABEL MODERASI', 1, 'Dewasa ini, multigenerasi telah menjadi sebuah isu yang muncul hampir di setiap\r\norganisasi yang telah berdiri sejak lama, tak terkecuali pada organisasi Direktorat\r\nJenderal Perbendaharaan. Adanya beberapa generasi usia di dalam dunia kerja\r\nmembuat lingkungan kerja menjadi lebih kompleks karena individu dengan rentang\r\nusia yang lebar akan memiliki cara berpikir, kebiasaan, sikap, tata nilai dan gaya\r\nhidup yang berbeda. Proses transformasi Ditjen Perbendaharaan yang sedemikian\r\ncepat mengharuskan setiap pegawai dari semua kelompok generasi meng-upgrade\r\npengetahuan dan meningkatkan kompetensinya. Dengan kompetensi yang tinggi,\r\nmaka akan berdampak secara langsung terhadap kinerja individu sehingga mampu\r\nmemberikan kontribusi maksimal pada organisasi. Penelitian ini bertujuan menguji\r\npengaruh kompetensi terhadap kinerja pegawai dengan karakteristik multigenerasi\r\nsebagai variable pemoderasi. Penelitian ini adalah penelitian korelasional dengan\r\nmetode campuran antara kuantitatif dan kualitatif. Teknik pengambilan sampel\r\nadalah total sampling dengan populasi keseluruhan pelaksana di lingkup Kanwil\r\nDitjen Perbendaharaan Provinsi Kalimantan Selatan. Sedangkan teknik analisis\r\ndata menggunakan analisis deskripsi dan pengujian hipotesis menggunakan analisis\r\nregresi linier berganda. Hasil penelitian menunjukkan bahwa variable karakter\r\nmultigenerasi tidak memoderasi pada pengaruh variable kompetensi terhadap\r\nkinerja. Selain itu, komposisi generasi, secara umum tidak terlalu berpengaruh\r\nterhadap kinerja unit organisasi.', 9218, 1, '2014', 53, NULL, 'Kajian SDM Kalsel.pdf', 1, '4musim.jpg', 6, '0000-00-00 00:00:00', '2015-05-24 15:16:49');
/*!40000 ALTER TABLE `katalog` ENABLE KEYS */;


-- Dumping structure for table repository.katalog_tags
DROP TABLE IF EXISTS `katalog_tags`;
CREATE TABLE IF NOT EXISTS `katalog_tags` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_katalog` int(11) NOT NULL,
  `id_tag` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table repository.katalog_tags: ~0 rows (approximately)
/*!40000 ALTER TABLE `katalog_tags` DISABLE KEYS */;
/*!40000 ALTER TABLE `katalog_tags` ENABLE KEYS */;


-- Dumping structure for table repository.publisher
DROP TABLE IF EXISTS `publisher`;
CREATE TABLE IF NOT EXISTS `publisher` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `publishername` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `phone` varchar(50) NOT NULL,
  `email` varchar(30) NOT NULL,
  `created_ad` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table repository.publisher: ~0 rows (approximately)
/*!40000 ALTER TABLE `publisher` DISABLE KEYS */;
/*!40000 ALTER TABLE `publisher` ENABLE KEYS */;


-- Dumping structure for table repository.tags
DROP TABLE IF EXISTS `tags`;
CREATE TABLE IF NOT EXISTS `tags` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tag` varchar(50) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table repository.tags: ~0 rows (approximately)
/*!40000 ALTER TABLE `tags` DISABLE KEYS */;
/*!40000 ALTER TABLE `tags` ENABLE KEYS */;


-- Dumping structure for table repository.users
DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `remember_token` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table repository.users: ~1 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `username`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'admin', '$2y$10$/k91IEdiOFhcyJGABp1E8OIe1jKUvOBUfCe3bBI2p1brO3Lzs98BS', 'irQlCapr1IGwa4j93FHzO6csGMA9JAWwZBqcbfWx88vFL65Cw2tZfgJlFnOb', '0000-00-00 00:00:00', '2015-05-24 15:16:55');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
