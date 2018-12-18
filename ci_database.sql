-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 17 Des 2018 pada 14.47
-- Versi Server: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ci_database`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `akun_admin`
--

CREATE TABLE `akun_admin` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `akun_admin`
--

INSERT INTO `akun_admin` (`id`, `username`, `password`) VALUES
(1, 'admin', '827ccb0eea8a706c4c34a16891f84e7b');

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth`
--

CREATE TABLE `auth` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `waktu` date NOT NULL,
  `status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `auth`
--

INSERT INTO `auth` (`id`, `email`, `password`, `token`, `waktu`, `status`) VALUES
(1, 'nur.aminnudin@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'd3ec1aee9e735fd773894c73509f2231', '2018-11-13', 'aktif'),
(3, 'irbimaulana11@gmail.com', '25d55ad283aa400af464c76d713c07ad', '8803256508adc05fcdb4fcf1df08f18a', '2018-11-23', 'Belum Aktif'),
(5, 'syahrezaxm3@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'b7ef1fc785fdee95d40b7fcca82241fd', '2018-11-24', 'Belum Aktif'),
(7, 'yonatanbima66@gmail.com', 'd2d1b7b32896259928b7cc1dea0eeb13', '5d7287769b2a3862c654c75f04e8582c', '2018-11-27', 'Belum Aktif'),
(9, 'junkfoodtegal@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'e1f7b6a012e354dfe194d9d30ba55de4', '2018-11-28', 'aktif'),
(10, 'noob@gmail.com', '25d55ad283aa400af464c76d713c07ad', '3701e7c9e76fe7a6abfe14498d742259', '2018-12-04', 'Belum Aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `berkas`
--

CREATE TABLE `berkas` (
  `id` int(11) NOT NULL,
  `email` varchar(60) NOT NULL,
  `nisn` varchar(10) NOT NULL,
  `asal_sekolah` varchar(60) NOT NULL,
  `kk` varchar(50) NOT NULL,
  `ijasah` varchar(50) NOT NULL,
  `skhu` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `biodata`
--

CREATE TABLE `biodata` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(60) NOT NULL,
  `gender` varchar(1) NOT NULL,
  `nisn` varchar(10) NOT NULL,
  `tempat_lahir` varchar(20) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `biodata`
--

INSERT INTO `biodata` (`id`, `nama`, `email`, `gender`, `nisn`, `tempat_lahir`, `tgl_lahir`, `alamat`) VALUES
(1, 'Amin Nudin', 'nur.aminnudin@gmail.com', 'L', '24', 'sdf', '0000-00-00', 'Tegal');

-- --------------------------------------------------------

--
-- Struktur dari tabel `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `subjek` varchar(40) NOT NULL,
  `pesan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `contact`
--

INSERT INTO `contact` (`id`, `nama`, `email`, `subjek`, `pesan`) VALUES
(1, 'amin nudin', 'nur.aminnudin@gmail.com', 'Complain', 'jgfjmhv  mhghgncg ghcfc'),
(2, 'ggwp nudin', 'noob@gmail.com', 'Complain', 'asdfasd asdgasf adsg'),
(3, 'dendi nudin', 'aminousgg@gmail.com', 'Complain', 'fxfgx nvcghcfg jfghcgf'),
(4, 'Si bla', 'reqtear@gmail.com', 'Complain', 'uasdfjb sadhfbjasdfb sakdhmfba');

-- --------------------------------------------------------

--
-- Struktur dari tabel `event`
--

CREATE TABLE `event` (
  `id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `penyelenggara` varchar(50) NOT NULL,
  `nama_event` varchar(50) NOT NULL,
  `tempat` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `event`
--

INSERT INTO `event` (`id`, `tanggal`, `penyelenggara`, `nama_event`, `tempat`) VALUES
(6, '2018-11-22', 'Pre', 'event1', 'Sekolah'),
(7, '2018-11-23', 'Pre', 'event2', 'Sekolah'),
(8, '2018-11-27', 'Pre3', 'event3', 'Sekolah3');

-- --------------------------------------------------------

--
-- Struktur dari tabel `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `gambar` varchar(50) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `isi` varchar(200) NOT NULL,
  `sumber` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `news`
--

INSERT INTO `news` (`id`, `tanggal`, `gambar`, `judul`, `isi`, `sumber`) VALUES
(29, '2018-12-03', 'basket.jpg', 'Juara 1 Turnamen Basket', 'Tampil memukau team basket kita', 'lokal'),
(30, '2018-12-04', 'olimpiade.jpg', 'Juara 1 Olimpiade', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry', 'lokal'),
(31, '2018-11-30', 'paskib.jpg', 'Paskib Kita Juarai Lomba PPB', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry', 'lokal'),
(32, '2018-11-26', 'silat.jpg', 'Juarai Pencak Silat', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry', 'lokal');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pendaftaran`
--

CREATE TABLE `pendaftaran` (
  `id` int(11) NOT NULL,
  `nama` varchar(60) NOT NULL,
  `gender` varchar(1) NOT NULL,
  `tempat_lahir` varchar(10) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `asal_sekolah` varchar(25) NOT NULL,
  `tahun_lulus` int(4) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(255) NOT NULL,
  `kode_daftar` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pendaftaran`
--

INSERT INTO `pendaftaran` (`id`, `nama`, `gender`, `tempat_lahir`, `tgl_lahir`, `alamat`, `asal_sekolah`, `tahun_lulus`, `username`, `password`, `kode_daftar`) VALUES
(9, 'Nur Amin Nudin', 'L', 'Tegal', '2018-07-02', 'asdgfadf afas', 'ewfsafa', 2015, 'nuraminnudin76', '827ccb0eea8a706c4c34a16891f84e7b', 1134),
(10, 'Nur Amin Nudin', 'L', 'ddsf', '2018-06-25', 'dfgsfdb dsgv', 'asdfasd', 2015, 'nuraminnudin31', '827ccb0eea8a706c4c34a16891f84e7b', 9732),
(13, 'Jablud haha', 'L', 'Semarang', '1999-05-04', 'fsdgsdfg fdgsdfg', 'dasgdfg dfg', 2015, 'jabludhaha49', '827ccb0eea8a706c4c34a16891f84e7b', 7493),
(14, 'Jablud h bro', 'L', 'Demak', '1998-05-11', 'asdfkjasdb asdkjfbasjkbf', 'asdf', 2015, 'jabludhbro89', '827ccb0eea8a706c4c34a16891f84e7b', 5362),
(15, 'Si Bla', 'P', 'Tegal', '2004-07-05', 'sa asvdsv asdvgs ', 'SD', 2015, 'sibla10', '827ccb0eea8a706c4c34a16891f84e7b', 6172),
(16, 'Nanda Nur Aida', 'P', 'Surabaya', '2000-05-10', 'Jl Sriwijaya', 'Smp 34 Surabaya', 2016, 'nandanuraida20', '827ccb0eea8a706c4c34a16891f84e7b', 4894),
(17, 'Supri', 'L', 'Brebes', '2001-05-07', 'Jl Manggis', 'Smp 15  Brebes', 2017, 'supri75', '827ccb0eea8a706c4c34a16891f84e7b', 4159),
(18, 'Si blu', 'L', 'Kupang', '2002-05-07', 'Kota Kupang', 'Smp 22 Kupang', 2016, 'siblu49', '827ccb0eea8a706c4c34a16891f84e7b', 5527),
(19, 'Badud Sri', 'P', 'Medan', '2000-07-04', 'Sri langka', 'Smp Srilangka', 2015, 'badudsri96', '827ccb0eea8a706c4c34a16891f84e7b', 8185),
(21, 'akjsf', 'L', 'kasj,f', '2018-09-05', 'alsdfnnl', 'lajksn', 2015, 'akjsf93', '827ccb0eea8a706c4c34a16891f84e7b', 7623),
(22, 'uuuiiij', 'L', 'fghj', '0000-00-00', 'chghvhh', 'gdd', 2017, 'uuuiiij61', '827ccb0eea8a706c4c34a16891f84e7b', 3568);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun_admin`
--
ALTER TABLE `akun_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth`
--
ALTER TABLE `auth`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `berkas`
--
ALTER TABLE `berkas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `biodata`
--
ALTER TABLE `biodata`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `akun_admin`
--
ALTER TABLE `akun_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `auth`
--
ALTER TABLE `auth`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `berkas`
--
ALTER TABLE `berkas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `biodata`
--
ALTER TABLE `biodata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
