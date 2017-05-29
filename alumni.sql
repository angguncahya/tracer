-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 02 Mei 2017 pada 03.16
-- Versi Server: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `alumni`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `file_foto`
--

CREATE TABLE IF NOT EXISTS `file_foto` (
  `id_foto` int(6) NOT NULL,
  `id_pengguna` int(4) NOT NULL,
  `nama_file` varchar(30) NOT NULL,
  `tgl_foto` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `file_foto`
--

INSERT INTO `file_foto` (`id_foto`, `id_pengguna`, `nama_file`, `tgl_foto`) VALUES
(1, 2, 'tongsis.jpg', '2015-05-05'),
(2, 2, 'kerbau.jpg', '2015-05-22'),
(3, 2, 'sungai.jpg', '2015-05-22'),
(5, 2, 'Bestfriend.jpg', '2015-05-06'),
(6, 2, 'Tembak.jpg', '2015-05-15'),
(7, 1, 'Kuda Lumping.jpg', '2015-05-15'),
(9, 1, 'Simbah Uti.jpg', '2015-05-13'),
(10, 0, 'Simbah Lanang.jpg', '2015-05-06'),
(11, 0, 'Mbak Lena.jpg', '2015-05-06'),
(12, 0, 'Kesederhanaan.jpg', '2015-05-14'),
(13, 0, 'Perjuangan.jpg', '2015-05-14'),
(15, 1, 'Alam.jpg', '2015-05-14'),
(16, 1, 'Terasering.jpg', '2015-05-14'),
(34, 1, 'Indonesia.jpg', '2015-06-13'),
(35, 3, 'Emirates Std.jpg', '2015-06-13'),
(37, 2, 'hutan.jpg', '2015-06-13'),
(41, 17, 'photokaos.jpg', '2017-04-30');

-- --------------------------------------------------------

--
-- Struktur dari tabel `file_pengguna`
--

CREATE TABLE IF NOT EXISTS `file_pengguna` (
  `id_pengguna` int(4) NOT NULL,
  `nim` varchar(30) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `jenjang` varchar(50) NOT NULL,
  `fakultas` varchar(50) NOT NULL,
  `departemen` varchar(50) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(32) NOT NULL,
  `tempat_lhr` varchar(30) NOT NULL,
  `tgl_lhr` date NOT NULL,
  `alamat` varchar(150) NOT NULL,
  `kabupaten` varchar(30) NOT NULL,
  `provinsi` varchar(30) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `tgl_masuk` date NOT NULL,
  `tgl_lulus` date NOT NULL,
  `tgl_mulai_kerja` date NOT NULL,
  `posisi` varchar(30) NOT NULL,
  `gaji_pertama` varchar(15) NOT NULL,
  `nama_instansi` varchar(30) NOT NULL,
  `posisi_sekarang` varchar(30) NOT NULL,
  `nama_instansi_sekarang` varchar(50) NOT NULL,
  `alamat_instansi_sekarang` varchar(100) NOT NULL,
  `foto` varchar(60) NOT NULL,
  `level` int(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `file_pengguna`
--

INSERT INTO `file_pengguna` (`id_pengguna`, `nim`, `nama`, `jenjang`, `fakultas`, `departemen`, `email`, `password`, `tempat_lhr`, `tgl_lhr`, `alamat`, `kabupaten`, `provinsi`, `no_telp`, `no_hp`, `tgl_masuk`, `tgl_lulus`, `tgl_mulai_kerja`, `posisi`, `gaji_pertama`, `nama_instansi`, `posisi_sekarang`, `nama_instansi_sekarang`, `alamat_instansi_sekarang`, `foto`, `level`) VALUES
(1, '', 'admin', '', '', '', 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'grobogan', '1994-04-04', '', '', '', '0', '0', '0000-00-00', '0000-00-00', '0000-00-00', '', '', '0', '0', '', '', 'Kaos Mangrovication.jpg', 1),
(25, '24010312130123', 'Ulil Albab', 's1', 'fsm', 'Teknik Informatika', 'member@gmail.com', 'aa08769cdcb26674c6706093503ff0a3', 'grobogannnn', '1991-07-10', 'manggar', 'MAGELANG', 'JAWA TENGAH', '0875111', '821231543131641', '1970-01-01', '1970-01-01', '2017-05-18', 'manager', '100000', 'instansi', 'tidur', 'macul sawah', 'macul sawah kebun', '', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `file_foto`
--
ALTER TABLE `file_foto`
  ADD PRIMARY KEY (`id_foto`);

--
-- Indexes for table `file_pengguna`
--
ALTER TABLE `file_pengguna`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `file_foto`
--
ALTER TABLE `file_foto`
  MODIFY `id_foto` int(6) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT for table `file_pengguna`
--
ALTER TABLE `file_pengguna`
  MODIFY `id_pengguna` int(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=26;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
