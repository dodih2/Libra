-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 25, 2017 at 04:58 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `libra_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `id_buku` int(11) NOT NULL,
  `judul_buku` varchar(50) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `id_penerbit` int(11) NOT NULL,
  `id_penulis` int(11) NOT NULL,
  `tahun_terbit` year(4) NOT NULL,
  `deskripsi` varchar(225) NOT NULL,
  `ebook` varchar(50) NOT NULL,
  `cover` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id_buku`, `judul_buku`, `id_kategori`, `id_penerbit`, `id_penulis`, `tahun_terbit`, `deskripsi`, `ebook`, `cover`) VALUES
(76, 'hgjhgjg', 17, 3, 1, 1905, 'jvjhgj', 'Latar Belakang.docx', 'lg1.jpg'),
(77, 'hkk', 2, 3, 1, 1902, 'G', 'cdinteraktif.pdf', 'DN.jpg'),
(78, 'ETET', 2, 3, 1, 1903, 'AA', 'Daftar Riwayat Hidup Lili.docx', 'lg.jpg'),
(79, 'ETETE', 2, 4, 2, 1902, 'R', 'collide.docx', 'attachment_76121078.jpg'),
(80, 'WRRR', 2, 3, 1, 0000, 'DGDGD', 'collide.docx', 'DN.jpg'),
(81, 'FHHHF', 2, 3, 1, 1902, 'adad', 'cdinteraktif.pdf', 'DN.jpg'),
(82, 'adadd', 2, 4, 2, 0000, 'add', 'cdinteraktif.pdf', 'DN.jpg'),
(83, 'asdad', 2, 3, 2, 1904, 'adad', 'Daftar Riwayat Hidup Lili.docx', 'attachment_76121078.jpg'),
(84, 'sdaddad', 2, 3, 1, 1902, 's', 'cdinteraktif.pdf', 'attachment_76121078.jpg'),
(85, 'jl', 2, 4, 1, 0000, 'dad', 'Jadwal SMT Ganjil 2016-2017 VERSI 4.pdf', 'DN.jpg'),
(86, 'j', 2, 3, 1, 0000, 'ad', 'cdinteraktif.pdf', 'attachment_76121078.jpg'),
(87, 'sfsfkj', 2, 3, 1, 1904, 'sfjsfjk', 'Jadwal SMT Ganjil 2016-2017 VERSI 4.pdf', 'attachment_76121078.jpg'),
(88, 'uoiu', 17, 4, 2, 1901, 'add', 'Daftar Riwayat Hidup Lili.docx', 'DN.jpg'),
(89, 'adkdjh', 17, 4, 2, 1901, 'ad', 'collide.docx', 'lg1.jpg'),
(90, 'aaa', 17, 3, 1, 1912, 'add', 'collide.docx', 'attachment_76121078.jpg'),
(91, 'sfsf', 2, 3, 1, 1901, 'fsff', 'Daftar Riwayat Hidup Lili.docx', 'DN.jpg'),
(92, 'hjkh', 17, 3, 2, 1902, 'fsf', 'Jadwal SMT Ganjil 2016-2017 VERSI 4.pdf', 'lg1.jpg'),
(93, 'oaduoad', 17, 3, 1, 1902, 'kamu', 'collide.docx', 'DN.jpg'),
(94, 'kamu', 2, 3, 1, 0000, 'kamu', 'Daftar Riwayat Hidup Lili.docx', 'DN.jpg'),
(95, 'saya', 17, 4, 2, 1903, 'lhjadajdad\r\ndaldjladaadaddad\r\naakdjadald\r\n', 'cdinteraktif.pdf', 'DN.jpg'),
(96, 'jlslf', 17, 4, 2, 1907, 'sfskfsfhskf', 'collide.docx', 'DN.jpg'),
(97, 'SETELAH HUJAN REDA', 22, 9, 9, 2014, 'Novel Boy Chandra @dsuperboy', 'BOY CHANDRA - Setelah Hujan Reda.pdf', 'Screenshot_2.png'),
(98, 'Data Analysis with MICROSOFT EXCEL', 23, 5, 8, 2004, 'BERK AND CAREY', '99-data-analysis-with-microsoft-excel-updated-for-', 'Screenshot_1.png'),
(99, 'MATEMATIKA', 23, 8, 3, 2014, 'MATEMATIKA SMA/SMK/MA/Sederajat KELAS X SEMESTER I', 'buku-pegangan-siswa-matematika-sma-kelas-10-semest', 'Screenshot_2.png'),
(100, 'COST ACCOUNTING', 18, 9, 1, 2000, 'COST ACCOUNTING \r\nCarles T Horngen | Srikant M. Datar | Madhav Rajan', 'ebook akuntansi biaya.pdf', 'Screenshot_3.png'),
(101, 'DASAR DASAR JARINGAN KOMPUTER', 23, 9, 3, 2012, 'DASAR DASAR JARINGAN KOMPUTER\r\nBY: ANDI MICRO', 'Ebook Teknisi Jaringan Komputer Lengkap.pdf', 'Screenshot_4.png'),
(102, 'MATEMATIKA DISKRIT', 23, 8, 6, 2008, 'MATEMATIKA DISKRIT\r\nBy: Samuel Wibisono', 'e-book-matematika-diskrit.pdf', 'Screenshot_5.png'),
(103, 'ADVANCE GRAMMAR IN USE', 23, 8, 3, 1999, 'ADVANCE GRAMMAR IN USE\r\nBy: Martin Hewings', 'english-advanced-grammar-in-use.pdf', 'Screenshot_6.png'),
(104, 'KAMUS BAHASA INDONESIA', 23, 9, 3, 2008, 'KAMUS BAHASA INDONESIA', 'Kamus_Bahasa_Indonesia_2008.pdf', 'Screenshot_1.png'),
(105, 'FISIKA', 23, 8, 6, 2009, 'FISIKA Untuk SMA dan MA Kelas XII\r\nBy: Sri Handayani  |  Ari Damari', 'kelas_3_sma_fisika.pdf', 'Screenshot_3.png'),
(106, 'IPA Terpadu ', 23, 8, 6, 2008, 'IPA Terpadu Untuk SMP/MTs Kelas VII', 'Kelas7_IPA_Terpadu_VII_175.pdf', 'Screenshot_4.png'),
(107, 'PENGELOLAAN SUMBERDAYA HUTAN DI ERA DESENTRALISASI', 21, 5, 4, 2009, 'PENGELOLAAN SUMBERDAYA HUTAN DI ERA DESENTRALISASI', 'Pengelolaan_sumberdaya_hutan_di_era_desentralisasi', 'Screenshot_5.png'),
(108, 'DILAN', 22, 6, 4, 1991, 'Dia adalah Dialnku Tahun 1992 \r\nBy: Pidi Baiq', 'Pidi Baiq - Dilan 2.pdf', 'Screenshot_6.png'),
(109, 'GEOGRAFI', 23, 6, 3, 2009, 'GEOGRAFI Untuk Siswa SMA/MA Kelas XI IPS', 'sandra-yosepana-xi.pdf', 'Screenshot_8.png'),
(110, 'CURAHAN HATI SEORANG ISTRI', 22, 10, 10, 2007, 'KAREN AKU CEMBURU\r\nBy: Asma Nadia, dkk.', 'an-karena-aku-cemburu.pdf', 'Screenshot_9.png'),
(111, 'AISYAH PUTRI', 22, 10, 10, 2008, 'AISYAH PUTRI || CHAT FOR A DATE\r\nBy: Asma Nadia', 'Asma Nadia - Aisyah Putri Chat for A Date(1).pdf', 'Screenshot_10.png'),
(112, 'rembulan dimata ibu', 22, 11, 10, 2000, 'REMBULAN DIMATA IBU\r\nBy: Asma Nadia', 'Asma Nadia - Rembulan di Mata Ibu.pdf', 'Screenshot_11.png'),
(113, 'dia dalam mimpi-mimpi rani', 22, 11, 10, 2000, 'DIA DALAM MIMPI-MIMPI RANI\r\nBy: Asma Nadia', 'Asma Nadia - Dia Dalam Mimpi-Mimpi Rani.pdf', 'Screenshot_12.png'),
(114, 'untukmu aku ada', 22, 11, 10, 2004, 'UNTUKMU AKU ADA\r\nBy: Asma Nadia', 'asma nadia-untukmu-aku-ada.pdf', 'Screenshot_13.png'),
(115, 'kangen', 22, 10, 10, 2009, 'KANGEN \r\nBy: Asma Nadia', 'asma-nadia-kangen.pdf', 'Screenshot_14.png'),
(116, 'catatan hati seorang istri ', 22, 10, 10, 2007, 'CATATAN HSTI SEORANG ISTRI \r\nBy: Asma Nadia ', 'Catatan Hati SeorangIstri Asma Nadia.pdf', 'Screenshot_15.png'),
(117, 'DIARY DOA AISYAH PUTRI', 22, 10, 10, 2009, 'DIARY DOA AISYAH PUTRI\r\nBy: Asma Nadia | Biru Laut | Taufan E. Prast', 'diary doa aisyah putri.pdf', 'Screenshot_16.png'),
(118, 'DILAN I', 22, 12, 11, 1991, 'DILAN I\r\nDIA ADALAH DILANKU TAHUN 1991\r\nBy: Pidi Baiq', 'DILAN 1 (shabrinabachtiar).pdf', 'Screenshot_17.png'),
(119, 'DILAN II', 22, 12, 11, 1991, 'DILAN II\r\nDIA ADALAH DILANKU TAHUN 1991\r\nBy: Pidi Baiq', 'DILAN 2 (shabrinabachtiar).pdf', 'Screenshot_6.png'),
(120, 'DILAN III', 22, 12, 11, 2015, 'DILAN III\r\nSUARA DARI DILAN\r\nBy: Pidi Baiq', 'DILAN 3 (shabrinabachtiar).pdf', 'Screenshot_19.png'),
(121, 'AISYAH PUTRI', 22, 10, 10, 2009, 'AISYAH PUTRI\r\nHidayah Buat Sang Bodyguard\r\nBy: Asma Nadia', 'hidayah-sang-bodyguard.pdf', 'Screenshot_20.png'),
(122, 'MUHASABAH CINTA SEORANG ISTRI', 22, 10, 10, 2009, 'MUHASABAH CINTA SEORANG ISTRI\r\nBy: Asma Nadia, dkk.', 'muhasabah cinta seorang istri.pdf', 'Screenshot_21.png'),
(123, 'BABAD TANAH DJAWI ', 24, 8, 5, 1925, 'BABAD TANAH DJAWI', 'babad-tanah-djawi fix.pdf', 'Screenshot_1.png'),
(124, 'BENCANA UMMAT ISLAM DI INDONESIA', 24, 7, 6, 1998, 'BENCANA UMMAT ISLAM DI INDONESIA TAHUN 1980-2000', 'bencana-ummat-islam-indonesia-tahun-1980-2000 fix.', 'Screenshot_2.png'),
(125, 'POLITIK NATSIR  ', 24, 8, 5, 1908, 'POLITIK NATSIR  ', 'biografi-m-natsir fix.pdf', 'Screenshot_3.png'),
(126, 'CATATAN HITAM LIMA PRESIDEN', 24, 5, 5, 1997, 'CATATAN HITAM LIMA PRESIDEN', 'catatanhitamlimapresidenindonesia fix.pdf', 'Screenshot_4.png'),
(127, 'DAUR ULANG MILITAN DI INDONESIA', 24, 7, 4, 2006, 'DAUR ULANG MILITAN DI INDONESIA', 'cycl_militants_indon_darul_islam__austr_embassy_bo', 'Screenshot_6.png'),
(128, 'HIKAJAT TANAH HINIDA', 24, 7, 6, 0000, 'HIKAJAT TANAH HINIDA', 'hikayat-tanah-hindia fix.pdf', 'Screenshot_8.png'),
(129, 'KUMPULAN MUTIARA AMANAT BUNG KARNO', 24, 6, 4, 1960, 'KUMPULAN MUTIARA AMANAT BUNG KARNO', 'kata-mutiara-bung-karno fix.pdf', 'Screenshot_9.png'),
(130, 'PEMBANGKITAN KEMBALI PEMUDA INDONESIA 1908-2008', 24, 5, 4, 1908, 'PEMBANGKITAN KEMBALI PEMUDA INDONESIA 1908-2008', 'kebangkitan-pemuda fix.pdf', 'Screenshot_10.png');

-- --------------------------------------------------------

--
-- Table structure for table `detail`
--

CREATE TABLE `detail` (
  `id_detail` int(11) NOT NULL,
  `id_buku` int(11) NOT NULL,
  `waktu` time NOT NULL,
  `tanggal` date NOT NULL,
  `id_download` int(11) NOT NULL,
  `gambar` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `download`
--

CREATE TABLE `download` (
  `id_download` int(11) NOT NULL,
  `waktu_download` time NOT NULL,
  `tanggal_download` date NOT NULL,
  `id_buku` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(15) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(17, 'Agama'),
(2, 'Umum'),
(18, 'Ekonomi'),
(20, 'Bisnis'),
(21, 'Sosial'),
(22, 'Novel'),
(23, 'Pelajaran'),
(24, 'Sejarah');

-- --------------------------------------------------------

--
-- Table structure for table `penerbit`
--

CREATE TABLE `penerbit` (
  `id_penerbit` int(11) NOT NULL,
  `nama_penerbit` varchar(25) NOT NULL,
  `alamat_penerbit` varchar(225) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penerbit`
--

INSERT INTO `penerbit` (`id_penerbit`, `nama_penerbit`, `alamat_penerbit`) VALUES
(3, 'PT. Sinar Buku hh', 'aldjalddad'),
(4, 'PT. Suka Nulis', 'jdladjlad'),
(5, 'ggj', 'gjh'),
(6, 'hkj', 'hui'),
(7, 'gg', 'jjhgjg'),
(8, 'hg', 'gjg'),
(9, 'PT. Transmedia', 'PT. Transmedia'),
(10, 'PT. Lingkar Pena Kreative', 'PT. Lingkar Pena Kreative '),
(11, 'Asma Nadia', 'Asma Nadia'),
(12, 'PT. MIZAN PUSTAKA', 'PT. MIZAN PUSTAKA');

-- --------------------------------------------------------

--
-- Table structure for table `penulis`
--

CREATE TABLE `penulis` (
  `id_penulis` int(11) NOT NULL,
  `nama_penulis` varchar(25) NOT NULL,
  `alamat_penulis` varchar(225) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penulis`
--

INSERT INTO `penulis` (`id_penulis`, `nama_penulis`, `alamat_penulis`) VALUES
(1, 'Bagus Nulise', 'jadal'),
(2, 'Mantabz!', 'Jadi kih'),
(3, 'hkhhk', 'hkh'),
(4, 'hkkk', 'hkhk'),
(5, 'jhgjh', 'jjgjj'),
(6, 'bjhg', 'gjhgg'),
(8, 'Berk And Carey', 'Berk And Carey'),
(9, 'Boy Chandra', 'Boy Chandra'),
(10, 'Asma Nadia', 'Asma Nadia, dkk.'),
(11, 'Pidi Baiq', 'Pidi Baiq');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id_post` int(11) NOT NULL,
  `id_detail` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` char(15) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `alamat` varchar(225) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` varchar(20) NOT NULL,
  `blokir` enum('Y','N') NOT NULL DEFAULT 'N',
  `no_hp` varchar(15) NOT NULL,
  `email` varchar(25) NOT NULL,
  `id_session` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `nama`, `alamat`, `password`, `level`, `blokir`, `no_hp`, `email`, `id_session`) VALUES
(43, 'admin', 'admin', '', '21232f297a57a5a743894a0e4a801fc3', 'admin', 'N', '089876675456', 'admin', '21232f297a57a5a743894a0e4a801fc3'),
(57, 'user', 'user', '', 'ee11cbb19052e40b07aac0ca060c23ee', 'user', 'N', '089876321654', 'user', 'ee11cbb19052e40b07aac0ca060c23ee');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id_buku`);

--
-- Indexes for table `detail`
--
ALTER TABLE `detail`
  ADD PRIMARY KEY (`id_detail`);

--
-- Indexes for table `download`
--
ALTER TABLE `download`
  ADD PRIMARY KEY (`id_download`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `penerbit`
--
ALTER TABLE `penerbit`
  ADD PRIMARY KEY (`id_penerbit`);

--
-- Indexes for table `penulis`
--
ALTER TABLE `penulis`
  ADD PRIMARY KEY (`id_penulis`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id_post`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `id_buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=136;

--
-- AUTO_INCREMENT for table `detail`
--
ALTER TABLE `detail`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `download`
--
ALTER TABLE `download`
  MODIFY `id_download` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `penerbit`
--
ALTER TABLE `penerbit`
  MODIFY `id_penerbit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `penulis`
--
ALTER TABLE `penulis`
  MODIFY `id_penulis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id_post` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
