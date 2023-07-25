-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 12 Nov 2021 pada 13.28
-- Versi server: 10.4.6-MariaDB
-- Versi PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `skripsi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbjurusan`
--

CREATE TABLE `tbjurusan` (
  `id_jurusan` int(11) NOT NULL,
  `jurusan` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbjurusan`
--

INSERT INTO `tbjurusan` (`id_jurusan`, `jurusan`) VALUES
(1, 'Teknik Industri'),
(2, 'Teknik Informatika'),
(3, 'Desain Komunikasi Visual'),
(8, 'Bisnis Digital');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbkampus`
--

CREATE TABLE `tbkampus` (
  `id_kampus` int(11) NOT NULL,
  `kampus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbkampus`
--

INSERT INTO `tbkampus` (`id_kampus`, `kampus`) VALUES
(1, 1),
(2, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbkelas`
--

CREATE TABLE `tbkelas` (
  `id_kelas` int(11) NOT NULL,
  `kelas` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbkelas`
--

INSERT INTO `tbkelas` (`id_kelas`, `kelas`) VALUES
(1, 'TI K 16 A'),
(2, 'TI K 16 B'),
(3, 'TI K 17 A'),
(4, 'TI K 17 B'),
(5, 'TI K 18 A'),
(6, 'TI K 18 B'),
(7, 'TI K 18 C'),
(8, 'TI K 19 A'),
(9, 'TI K 19 B'),
(10, 'TI K 19 C'),
(11, 'TI RM 16 A'),
(12, 'TI RM 16 B'),
(13, 'TI RM 16 C'),
(14, 'TI RM 17 A'),
(15, 'TI RM 17 B'),
(16, 'TI RM 17 C'),
(17, 'TI RM 18 A'),
(18, 'TI RM 18 B'),
(19, 'TI RM 18 C'),
(20, 'TI RM 18 D'),
(21, 'TI RM 19 A'),
(22, 'TI RM 19 B'),
(23, 'TI RM 19 C'),
(24, 'TI RP 16 A'),
(25, 'TI RP 16 B'),
(26, 'TI RP 17 A'),
(27, 'TI RP 17 B'),
(28, 'TI RP 17 C'),
(29, 'TI RP 18 A'),
(30, 'TI RP 18 B'),
(31, 'TI RP 18 C'),
(32, 'TI RP 18 D'),
(33, 'TI RP 18 E'),
(34, 'TI RP 19 A'),
(35, 'TI RP 19 B'),
(36, 'TI RP 19 C'),
(37, 'TI RP 19 D'),
(38, 'TI RP 19 E'),
(39, 'TIF K 16 A'),
(40, 'TIF K 16 B'),
(41, 'TIF K 17 A'),
(42, 'TIF K 17 CRE.INF.DEV'),
(43, 'TIF K 18 A'),
(44, 'TIF K 18 B'),
(45, 'TIF K 19 A'),
(46, 'TIF K 19 B'),
(47, 'TIF RM 16 COMP & N.SEC'),
(48, 'TIF RM 16 A'),
(49, 'TIF RM 16 B'),
(50, 'TIF RM 17 A COMP & N.SEC'),
(51, 'TIF RM 17 B COMP & N.SEC'),
(52, 'TIF RM 17 A CRE.INF.DEV'),
(53, 'TIF RM 17 B CRE.INF.DEV'),
(54, 'TIF RM 17 C CRE.INF.DEV'),
(55, 'TIF RM 18 A'),
(56, 'TIF RM 18 B'),
(57, 'TIF RM 18 C'),
(58, 'TIF RM 19 A'),
(59, 'TIF RM 19 B'),
(60, 'TIF RP 16 A'),
(61, 'TIF RP 16 B'),
(62, 'TIF RP 16 C'),
(63, 'TIF RP 17 A COMP & N.SEC'),
(64, 'TIF RP 17 B COMP & N.SEC'),
(65, 'TIF RP 17 A CRE.INF.DEV'),
(66, 'TIF RP 17 B CRE.INF.DEV'),
(67, 'TIF RP 17 C CRE.INF.DEV'),
(68, 'TIF RP 18 A'),
(69, 'TIF RP 18 B'),
(70, 'TIF RP 18 C'),
(71, 'TIF RP 18 D'),
(72, 'TIF RP 18 E'),
(73, 'TIF RP 19 A'),
(74, 'TIF RP 19 B'),
(75, 'TIF RP 19 C'),
(76, 'TIF RP 19 D'),
(77, 'TIF RP 19 E'),
(78, 'DKV K 17 A'),
(79, 'DKV K 17 B'),
(80, 'DKV K 18 A'),
(81, 'DKV K 19 A'),
(82, 'DKV K 19 B'),
(83, 'DKV RM 17 A'),
(84, 'DKV RM 18 A'),
(85, 'DKV RM 19 A'),
(86, 'DKV RM 19 B'),
(87, 'DKV RP 17 A'),
(88, 'DKV RP 17 B'),
(89, 'DKV RP 18 A'),
(90, 'DKV RP 18 B'),
(91, 'DKV RP 18 C'),
(92, 'DKV RP 19 A'),
(93, 'DKV RP 19 B');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tborganisasi`
--

CREATE TABLE `tborganisasi` (
  `id_organisasi` int(11) NOT NULL,
  `organisasi` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tborganisasi`
--

INSERT INTO `tborganisasi` (`id_organisasi`, `organisasi`) VALUES
(1, 'BEM (Badan Eksekutif Mahasiswa)'),
(2, 'DPM (Dewan Perwakilan Mahasiswa)'),
(3, 'HMTI (Himpunan Mahasiswa Teknik Industri)'),
(4, 'HIMATIF (Himpunan Mahasiswa Teknik Informatika)'),
(5, 'HMDKV (Himpunan Mahasiswa Desain Komunikasi Visual)');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbpinjam`
--

CREATE TABLE `tbpinjam` (
  `id_pinjam` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_ruangan` int(11) NOT NULL,
  `id_kampus` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `jabatan` varchar(128) NOT NULL,
  `tgl_pengajuan` date NOT NULL,
  `tgl1` date NOT NULL,
  `tgl2` date NOT NULL,
  `mulai` time NOT NULL,
  `selesai` time NOT NULL,
  `keperluan` varchar(128) NOT NULL,
  `status` int(11) NOT NULL,
  `acc_kmhs` int(11) DEFAULT NULL,
  `acc_akdmk` int(11) DEFAULT NULL,
  `acc_k_aset` int(11) NOT NULL,
  `acc_wk2` int(11) NOT NULL,
  `alasan` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbpinjam`
--

INSERT INTO `tbpinjam` (`id_pinjam`, `id_user`, `id_ruangan`, `id_kampus`, `nama`, `jabatan`, `tgl_pengajuan`, `tgl1`, `tgl2`, `mulai`, `selesai`, `keperluan`, `status`, `acc_kmhs`, `acc_akdmk`, `acc_k_aset`, `acc_wk2`, `alasan`) VALUES
(2, 5, 8, 1, 'Hena Sulaeman', 'Dosen', '2021-04-12', '2021-04-12', '2021-04-12', '18:30:00', '20:00:00', 'Bimbingan Skripsi', 1, 1, 1, 1, 1, ''),
(3, 6, 33, 2, 'Rahmat Purwanto', 'Mahasiswa', '2021-04-13', '2021-04-14', '2021-04-14', '14:00:00', '15:00:00', 'Kerja Kelompok', 1, 1, 1, 1, 1, ''),
(15, 6, 11, 1, 'Rahmat Purwanto', 'Mahasiswa', '2021-05-02', '2021-05-02', '2021-05-02', '13:18:00', '13:20:00', 'fesda', 1, 1, 1, 1, 1, ''),
(16, 5, 13, 1, 'Hena Sulaeman', 'dosen', '2021-05-02', '2021-05-02', '2021-05-02', '14:12:00', '14:13:00', 'aDASsas', 1, 1, 1, 1, 1, ''),
(59, 6, 11, 1, 'Rahmat Purwanto', 'Mahasiswa', '2021-07-19', '2021-07-19', '2021-07-19', '20:06:00', '21:06:00', 'bdviclzxbvzci', 1, 1, 1, 1, 1, ''),
(84, 7, 39, 2, 'Rohendi', 'Mahasiswa', '2021-07-21', '2021-07-21', '2021-07-21', '19:50:00', '20:50:00', 'a', 1, 1, 1, 1, 1, ''),
(85, 7, 40, 2, 'Rohendi', 'Mahasiswa', '2021-07-21', '2021-07-21', '2021-07-21', '19:52:00', '20:52:00', 'wde', 1, 1, 1, 1, 1, ''),
(86, 6, 11, 1, 'Rahmat Purwanto', 'Mahasiswa', '2021-07-21', '2021-07-21', '2021-07-21', '21:53:00', '22:53:00', 'sg', 1, 1, 1, 1, 1, ''),
(91, 6, 8, 1, 'Rahmat Purwanto', 'Mahasiswa', '2021-07-31', '2021-07-31', '2021-07-31', '20:26:00', '21:26:00', 'h', 1, 1, 1, 1, 1, ''),
(92, 5, 1, 1, 'Hena Sulaeman', 'Dosen', '2021-08-01', '2021-08-01', '2021-08-01', '20:56:00', '21:56:00', 'a', 1, 1, 1, 1, 1, ''),
(93, 5, 27, 2, 'Hena Sulaeman', 'Dosen', '2021-08-01', '2021-08-01', '2021-08-01', '21:33:00', '22:33:00', 's', 1, 1, 1, 1, 1, ''),
(94, 7, 1, 1, 'Rohendi', 'Mahasiswa', '2021-08-02', '2021-08-02', '2021-08-02', '20:42:00', '20:46:00', 'a', 1, 1, 1, 1, 1, ''),
(95, 6, 7, 1, 'Rahmat Purwanto', 'Mahasiswa', '2021-08-02', '2021-08-02', '2021-08-02', '21:29:00', '21:35:00', 'f', 1, 1, 1, 1, 1, ''),
(96, 6, 27, 2, 'Rahmat Purwanto', 'Mahasiswa', '2021-08-02', '2021-08-02', '2021-08-02', '21:50:00', '21:55:00', 's', 1, 1, 1, 1, 1, ''),
(99, 4, 4, 1, 'Indra Julias Pradana', 'Kemahasiswaan', '2021-08-04', '2021-08-04', '2021-08-04', '11:13:00', '11:17:00', 'd', 1, 1, 1, 1, 1, ''),
(100, 4, 46, 1, 'Indra Julias Pradana', 'Kemahasiswaan', '2021-08-04', '2021-08-04', '2021-08-04', '11:30:00', '11:40:00', 'rapat', 1, 1, 1, 1, 1, ''),
(104, 5, 3, 1, 'Hena Sulaeman', 'Dosen', '2021-08-04', '2021-08-04', '2021-08-04', '21:08:00', '21:11:00', 's', 1, 1, 1, 1, 1, ''),
(105, 5, 5, 1, 'Hena Sulaeman', 'Dosen', '2021-08-04', '2021-08-04', '2021-08-04', '21:15:00', '21:20:00', 'h', 1, 1, 1, 1, 1, ''),
(106, 6, 9, 1, 'Rahmat Purwanto', 'Mahasiswa', '2021-08-04', '2021-08-04', '2021-08-04', '21:27:00', '21:35:00', 'fe', 1, 1, 1, 1, 1, ''),
(107, 7, 46, 1, 'Rohendi', 'Sekertaris', '2021-08-04', '2021-08-04', '2021-08-04', '21:40:00', '21:45:00', 'Rapat BEM', 1, 1, 1, 1, 1, ''),
(108, 6, 7, 1, 'Rahmat Purwanto', 'Mahasiswa', '2021-08-04', '2021-08-04', '2021-08-04', '21:45:00', '21:50:00', 'csfd', 1, 1, 1, 1, 1, ''),
(109, 5, 2, 1, 'Hena Sulaeman', 'Dosen', '2021-08-04', '2021-08-04', '2021-08-04', '22:00:00', '22:05:00', 'fg', 1, 1, 1, 1, 1, ''),
(110, 5, 10, 1, 'Hena Sulaeman', 'Dosen', '2021-08-04', '2021-08-04', '2021-08-04', '22:03:00', '22:07:00', 's', 1, 1, 1, 1, 1, ''),
(111, 6, 46, 1, 'Rahmat Purwanto', 'Mahasiswa', '2021-08-04', '2021-08-04', '2021-08-04', '22:10:00', '22:15:00', 'g', 1, 1, 1, 1, 1, ''),
(112, 5, 46, 1, 'Hena Sulaeman', 'Dosen', '2021-08-04', '2021-08-04', '2021-08-04', '22:20:00', '22:25:00', 'dfg', 1, 1, 1, 1, 1, ''),
(113, 7, 12, 1, 'Rohendi', 'Mahasiswa', '2021-08-04', '2021-08-04', '2021-08-04', '22:35:00', '22:40:00', 'r', 1, 1, 1, 1, 1, ''),
(114, 5, 46, 1, 'Hena Sulaeman', 'Dosen', '2021-08-04', '2021-08-04', '2021-08-04', '22:47:00', '22:52:00', 'rte', 1, 1, 1, 1, 1, ''),
(115, 6, 4, 1, 'Rahmat Purwanto', 'Mahasiswa', '2021-08-05', '2021-08-05', '2021-08-05', '12:53:00', '12:57:00', 'h', 1, 1, 1, 1, 1, ''),
(116, 4, 46, 1, 'Indra Julias Pradana', 'Kemahasiswaan', '2021-08-05', '2021-08-05', '2021-08-05', '13:05:00', '13:10:00', 'Rapat', 1, 1, 1, 1, 1, ''),
(117, 7, 16, 1, 'Rohendi', 'Mahasiswa', '2021-08-05', '2021-08-05', '2021-08-05', '13:07:00', '13:13:00', 'gffg', 1, 1, 1, 1, 1, ''),
(118, 5, 6, 1, 'Hena Sulaeman', 'Dosen', '2021-08-05', '2021-08-05', '2021-08-05', '20:05:00', '20:10:00', 'o', 1, 1, 1, 1, 1, ''),
(119, 6, 8, 1, 'Rahmat Purwanto', 'Mahasiswa', '2021-08-05', '2021-08-05', '2021-08-05', '20:08:00', '20:13:00', 'nhg', 1, 1, 1, 1, 1, ''),
(120, 4, 46, 1, 'Indra Julias Pradana', 'Kemahasiswaan', '2021-08-05', '2021-08-05', '2021-08-05', '20:10:00', '20:15:00', 'lkl', 1, 1, 1, 1, 1, ''),
(121, 7, 25, 1, 'Rohendi', 'Mahasiswa', '2021-08-05', '2021-08-05', '2021-08-05', '20:20:00', '20:30:00', 'fjufghf', 1, 1, 1, 1, 1, ''),
(122, 5, 46, 1, 'Hena Sulaeman', 'Dosen', '2021-08-05', '2021-08-05', '2021-08-05', '20:25:00', '20:35:00', 'sdfsdf', 1, 1, 1, 1, 1, ''),
(123, 6, 9, 1, 'Rahmat Purwanto', 'Mahasiswa', '2021-08-05', '2021-08-05', '2021-08-05', '20:50:00', '21:00:00', 'dfgg', 1, 1, 1, 1, 1, ''),
(124, 4, 46, 1, 'Indra Julias Pradana', 'Kemahasiswaan', '2021-08-05', '2021-08-05', '2021-08-05', '20:54:00', '21:02:00', 'dfg', 1, 1, 1, 1, 1, ''),
(125, 6, 20, 1, 'Rahmat Purwanto', 'Mahasiswa', '2021-08-06', '2021-08-06', '2021-08-06', '15:05:00', '15:15:00', 'afgdf', 1, 1, 1, 1, 1, ''),
(126, 5, 46, 1, 'Hena Sulaeman', 'Dosen', '2021-08-06', '2021-08-06', '2021-08-06', '15:08:00', '15:18:00', 'ljofho', 1, 1, 1, 1, 1, ''),
(127, 6, 19, 1, 'Rahmat Purwanto', 'Mahasiswa', '2021-08-06', '2021-08-06', '2021-08-06', '16:10:00', '16:20:00', 'gfdgdf', 1, 1, 1, 1, 1, ''),
(128, 5, 46, 1, 'Hena Sulaeman', 'Dosen', '2021-08-06', '2021-08-06', '2021-08-06', '16:15:00', '16:25:00', 'fdggg', 1, 1, 1, 1, 1, ''),
(129, 5, 46, 1, 'Hena Sulaeman', 'Dosen', '2021-08-06', '2021-08-06', '2021-08-06', '16:30:00', '16:35:00', 'fsgsdfsf', 1, 1, 1, 1, 1, ''),
(130, 7, 12, 1, 'Rohendi', 'Mahasiswa', '2021-08-06', '2021-08-06', '2021-08-06', '17:15:00', '17:20:00', 'kjh', 1, 1, 1, 1, 1, ''),
(131, 7, 46, 1, 'Rohendi', 'Mahasiswa', '2021-08-06', '2021-08-06', '2021-08-06', '17:25:00', '17:30:00', 'gdfd', 1, 1, 1, 1, 1, ''),
(132, 7, 18, 1, 'Rohendi', 'Mahasiswa', '2021-08-06', '2021-08-06', '2021-08-06', '20:55:00', '21:00:00', 'sfgdgf', 1, 1, 1, 1, 1, ''),
(133, 7, 46, 1, 'Rohendi', 'Mahasiswa', '2021-08-06', '2021-08-06', '2021-08-06', '21:00:00', '21:05:00', 'sfgdgf', 1, 1, 1, 1, 1, ''),
(134, 7, 46, 1, 'Rohendi', 'Mahasiswa', '2021-08-06', '2021-08-06', '2021-08-06', '21:10:00', '21:20:00', 'adasasad', 1, 1, 1, 1, 1, ''),
(135, 7, 46, 1, 'Rohendi', 'Mahasiswa', '2021-08-06', '2021-08-06', '2021-08-06', '21:40:00', '21:45:00', 'fagsdf', 1, 1, 1, 1, 1, ''),
(136, 5, 12, 1, 'Hena Sulaeman', 'Dosen', '2021-08-07', '2021-08-07', '2021-08-07', '18:35:00', '18:40:00', 'fdgd', 1, 1, 1, 1, 1, ''),
(137, 4, 46, 1, 'Indra Julias Pradana', 'Kemahasiswaan', '2021-08-07', '2021-08-07', '2021-08-07', '18:45:00', '18:50:00', 'fhgdvc', 1, 1, 1, 1, 1, ''),
(138, 6, 13, 1, 'Rahmat Purwanto', 'Mahasiswa', '2021-08-07', '2021-08-07', '2021-08-07', '20:40:00', '20:45:00', 'ffsd', 1, 1, 1, 1, 1, ''),
(139, 4, 46, 1, 'Indra Julias Pradana', 'Kemahasiswaan', '2021-08-07', '2021-08-07', '2021-08-07', '20:43:00', '20:49:00', 'sdfdsf', 1, 1, 1, 1, 1, ''),
(140, 4, 46, 1, 'Indra Julias Pradana', 'Kemahasiswaan', '2021-08-07', '2021-08-07', '2021-08-07', '20:55:00', '21:00:00', 'sac', 1, 1, 1, 1, 1, ''),
(141, 4, 46, 1, 'Indra Julias Pradana', 'Kemahasiswaan', '2021-08-07', '2021-08-07', '2021-08-07', '21:15:00', '21:30:00', 'sdfsdf', 1, 1, 1, 1, 1, ''),
(142, 7, 14, 1, 'Rohendi', 'Mahasiswa', '2021-08-07', '2021-08-07', '2021-08-07', '21:40:00', '21:45:00', 'zxcx', 1, 1, 1, 1, 1, ''),
(143, 4, 46, 1, 'Indra Julias Pradana', 'Kemahasiswaan', '2021-08-07', '2021-08-07', '2021-08-07', '21:50:00', '22:00:00', 'dsfs', 1, 1, 1, 1, 1, ''),
(144, 5, 46, 1, 'Hena Sulaeman', 'Dosen', '2021-08-07', '2021-08-07', '2021-08-07', '23:49:00', '23:56:00', 'sa', 1, 1, 1, 1, 1, ''),
(145, 6, 1, 1, 'Rahmat Purwanto', 'Mahasiswa', '2021-08-07', '2021-08-08', '2021-08-08', '00:05:00', '00:10:00', 'adsd', 1, 1, 1, 1, 1, ''),
(146, 4, 46, 1, 'Indra Julias Pradana', 'Kemahasiswaan', '2021-08-07', '2021-08-08', '2021-08-08', '00:27:00', '00:33:00', 'ds', 1, 1, 1, 1, 1, ''),
(147, 4, 43, 1, 'Indra Julias Pradana', 'Kemahasiswaan', '2021-08-08', '2021-08-08', '2021-08-08', '20:10:00', '20:15:00', 'dff', 1, 1, 1, 1, 1, ''),
(148, 4, 43, 1, 'Indra Julias Pradana', 'Kemahasiswaan', '2021-08-08', '2021-08-08', '2021-08-08', '20:20:00', '20:30:00', 'asdasa', 1, 1, 1, 1, 1, ''),
(149, 6, 1, 1, 'Rahmat Purwanto', 'Mahasiswa', '2021-08-08', '2021-08-08', '2021-08-08', '20:50:00', '21:00:00', 'DASD', 1, 1, 1, 1, 1, ''),
(150, 7, 3, 1, 'Rohendi', 'Mahasiswa', '2021-08-08', '2021-08-08', '2021-08-08', '21:05:00', '21:10:00', 'dfxfd', 1, 1, 1, 1, 1, ''),
(151, 6, 5, 1, 'Rahmat Purwanto', 'Mahasiswa', '2021-08-08', '2021-08-08', '2021-08-08', '21:20:00', '21:25:00', 'xasfgre', 1, 1, 1, 1, 1, ''),
(152, 4, 43, 1, 'Indra Julias Pradana', 'Kemahasiswaan', '2021-08-08', '2021-08-08', '2021-08-08', '23:20:00', '23:25:00', 'wd', 1, 1, 1, 1, 1, ''),
(154, 6, 28, 2, 'Rahmat Purwanto', 'Mahasiswa', '2021-08-08', '2021-08-08', '2021-08-08', '23:50:00', '23:55:00', 'g', 1, 1, 1, 1, 1, ''),
(155, 6, 29, 2, 'Rahmat Purwanto', 'Mahasiswa', '2021-08-08', '2021-08-09', '2021-08-09', '00:30:00', '00:35:00', 's', 1, 1, 1, 1, 1, ''),
(156, 6, 2, 1, 'Rahmat Purwanto', 'Mahasiswa', '2021-08-13', '2021-08-13', '2021-08-13', '14:30:00', '14:35:00', 'fsdgsdf', 1, 1, 1, 1, 1, ''),
(157, 7, 4, 1, 'Rohendi', 'Mahasiswa', '2021-08-13', '2021-08-13', '2021-08-13', '14:40:00', '14:45:00', 'dfg', 1, 1, 1, 1, 1, ''),
(158, 5, 5, 1, 'Hena Sulaeman', 'Dosen', '2021-08-13', '2021-08-13', '2021-08-13', '14:55:00', '15:00:00', 'zsd', 1, 1, 1, 1, 1, ''),
(159, 6, 1, 1, 'Rahmat Purwanto', 'Mahasiswa', '2021-08-13', '2021-08-13', '2021-08-13', '20:25:00', '20:30:00', 'sdf', 1, 1, 1, 1, 1, ''),
(160, 6, 1, 1, 'Rahmat Purwanto', 'Mahasiswa', '2021-10-01', '2021-10-01', '2021-10-01', '10:12:00', '10:15:00', 'JKJM', 1, 1, 1, 1, 1, ''),
(161, 6, 1, 1, 'Rahmat Purwanto', 'Mahasiswa', '2021-10-01', '2021-10-01', '2021-10-01', '21:15:00', '21:20:00', 'F', 1, 1, 1, 1, 1, ''),
(162, 5, 1, 1, 'Hena Sulaeman', 'Dosen', '2021-10-01', '2021-10-01', '2021-10-01', '21:30:00', '21:35:00', 'd', 1, 1, 1, 1, 1, ''),
(163, 7, 4, 1, 'Rohendi', 'Mahasiswa', '2021-10-01', '2021-10-01', '2021-10-01', '21:45:00', '21:50:00', 'sds', 1, 1, 1, 1, 1, ''),
(164, 7, 7, 1, 'Rohendi', 'Mahasiswa', '2021-10-01', '2021-10-01', '2021-10-01', '21:55:00', '22:00:00', 'sfw', 1, 1, 1, 1, 1, ''),
(165, 6, 5, 1, 'Rahmat Purwanto', 'Mahasiswa', '2021-10-01', '2021-10-02', '2021-10-02', '00:35:00', '00:40:00', 'HJ', 1, 1, 1, 1, 1, ''),
(166, 6, 5, 1, 'Rahmat Purwanto', 'Mahasiswa', '2021-10-10', '2021-10-10', '2021-10-10', '11:09:00', '11:13:00', 'sds', 1, 1, 1, 1, 1, ''),
(167, 6, 4, 1, 'Rahmat Purwanto', 'Mahasiswa', '2021-10-11', '2021-10-11', '2021-10-11', '20:18:00', '20:23:00', 'sgrd', 1, 1, 1, 1, 1, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbrekap`
--

CREATE TABLE `tbrekap` (
  `id_rekap` int(11) NOT NULL,
  `id_pinjam` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_ruangan` int(11) NOT NULL,
  `id_kampus` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `jabatan` varchar(128) NOT NULL,
  `tgl_pengajuan` date NOT NULL,
  `tgl1` date NOT NULL,
  `tgl2` date NOT NULL,
  `mulai` time NOT NULL,
  `selesai` time NOT NULL,
  `keperluan` varchar(128) NOT NULL,
  `alasan` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbrekap`
--

INSERT INTO `tbrekap` (`id_rekap`, `id_pinjam`, `id_user`, `id_ruangan`, `id_kampus`, `nama`, `jabatan`, `tgl_pengajuan`, `tgl1`, `tgl2`, `mulai`, `selesai`, `keperluan`, `alasan`) VALUES
(2, 1, 6, 14, 1, 'Rahmat Purwanto', 'Mahasiswa', '2021-04-11', '2021-04-12', '2021-04-12', '09:00:00', '11:00:00', 'Bimbingan', ''),
(3, 2, 5, 8, 1, 'Hena Sulaeman', 'Dosen', '2021-04-12', '2021-04-12', '2021-04-12', '18:30:00', '20:00:00', 'Bimbingan Skripsi', ''),
(4, 3, 6, 33, 2, 'Rahmat Purwanto', 'Mahasiswa', '2021-04-13', '2021-04-14', '2021-04-14', '14:00:00', '15:00:00', 'Kerja Kelompok', ''),
(5, 15, 6, 11, 1, 'Rahmat Purwanto', 'Mahasiswa', '2021-05-02', '2021-05-02', '2021-05-02', '13:18:00', '13:20:00', 'fesda', ''),
(6, 16, 5, 13, 1, 'Hena Sulaeman', 'dosen', '2021-05-02', '2021-05-02', '2021-05-02', '14:12:00', '14:13:00', 'aDASsas', ''),
(7, 21, 5, 9, 1, 'Hena Sulaeman', 'Dosen', '2021-05-03', '2021-05-03', '2021-05-03', '14:47:00', '14:49:00', 'asaas', ''),
(8, 23, 6, 10, 1, 'Rahmat Purwanto', 'Mahasiswa', '2021-07-10', '2021-07-10', '2021-07-10', '15:02:00', '16:03:00', 'werwsegfesf', ''),
(9, 59, 6, 11, 1, 'Rahmat Purwanto', 'Mahasiswa', '2021-07-19', '2021-07-19', '2021-07-19', '20:06:00', '21:06:00', 'bdviclzxbvzci', ''),
(10, 84, 7, 39, 2, 'Rohendi', 'Mahasiswa', '2021-07-21', '2021-07-21', '2021-07-21', '19:50:00', '20:50:00', 'a', ''),
(11, 85, 7, 40, 2, 'Rohendi', 'Mahasiswa', '2021-07-21', '2021-07-21', '2021-07-21', '19:52:00', '20:52:00', 'wde', ''),
(12, 86, 6, 11, 1, 'Rahmat Purwanto', 'Mahasiswa', '2021-07-21', '2021-07-21', '2021-07-21', '21:53:00', '22:53:00', 'sg', ''),
(13, 91, 6, 8, 1, 'Rahmat Purwanto', 'Mahasiswa', '2021-07-31', '2021-07-31', '2021-07-31', '20:26:00', '21:26:00', 'h', ''),
(14, 92, 5, 1, 1, 'Hena Sulaeman', 'Dosen', '2021-08-01', '2021-08-01', '2021-08-01', '20:56:00', '21:56:00', 'a', ''),
(15, 93, 5, 27, 2, 'Hena Sulaeman', 'Dosen', '2021-08-01', '2021-08-01', '2021-08-01', '21:33:00', '22:33:00', 's', ''),
(16, 94, 7, 1, 1, 'Rohendi', 'Mahasiswa', '2021-08-02', '2021-08-02', '2021-08-02', '20:42:00', '20:46:00', 'a', ''),
(17, 95, 6, 7, 1, 'Rahmat Purwanto', 'Mahasiswa', '2021-08-02', '2021-08-02', '2021-08-02', '21:29:00', '21:35:00', 'f', ''),
(18, 96, 6, 27, 2, 'Rahmat Purwanto', 'Mahasiswa', '2021-08-02', '2021-08-02', '2021-08-02', '21:50:00', '21:55:00', 's', ''),
(19, 99, 4, 4, 1, 'Indra Julias Pradana', 'Kemahasiswaan', '2021-08-04', '2021-08-04', '2021-08-04', '11:13:00', '11:17:00', 'd', ''),
(20, 100, 4, 46, 1, 'Indra Julias Pradana', 'Kemahasiswaan', '2021-08-04', '2021-08-04', '2021-08-04', '11:30:00', '11:40:00', 'rapat', ''),
(21, 104, 5, 3, 1, 'Hena Sulaeman', 'Dosen', '2021-08-04', '2021-08-04', '2021-08-04', '21:08:00', '21:11:00', 's', ''),
(22, 105, 5, 5, 1, 'Hena Sulaeman', 'Dosen', '2021-08-04', '2021-08-04', '2021-08-04', '21:15:00', '21:20:00', 'h', ''),
(23, 106, 6, 9, 1, 'Rahmat Purwanto', 'Mahasiswa', '2021-08-04', '2021-08-04', '2021-08-04', '21:27:00', '21:35:00', 'fe', ''),
(24, 107, 7, 46, 1, 'Rohendi', 'Sekertaris', '2021-08-04', '2021-08-04', '2021-08-04', '21:40:00', '21:45:00', 'Rapat BEM', ''),
(25, 108, 6, 7, 1, 'Rahmat Purwanto', 'Mahasiswa', '2021-08-04', '2021-08-04', '2021-08-04', '21:45:00', '21:50:00', 'csfd', ''),
(26, 109, 5, 2, 1, 'Hena Sulaeman', 'Dosen', '2021-08-04', '2021-08-04', '2021-08-04', '22:00:00', '22:05:00', 'fg', ''),
(27, 110, 5, 10, 1, 'Hena Sulaeman', 'Dosen', '2021-08-04', '2021-08-04', '2021-08-04', '22:03:00', '22:07:00', 's', ''),
(28, 111, 6, 46, 1, 'Rahmat Purwanto', 'Mahasiswa', '2021-08-04', '2021-08-04', '2021-08-04', '22:10:00', '22:15:00', 'g', ''),
(29, 112, 5, 46, 1, 'Hena Sulaeman', 'Dosen', '2021-08-04', '2021-08-04', '2021-08-04', '22:20:00', '22:25:00', 'dfg', ''),
(30, 113, 7, 12, 1, 'Rohendi', 'Mahasiswa', '2021-08-04', '2021-08-04', '2021-08-04', '22:35:00', '22:40:00', 'r', ''),
(31, 114, 5, 46, 1, 'Hena Sulaeman', 'Dosen', '2021-08-04', '2021-08-04', '2021-08-04', '22:47:00', '22:52:00', 'rte', ''),
(32, 115, 6, 4, 1, 'Rahmat Purwanto', 'Mahasiswa', '2021-08-05', '2021-08-05', '2021-08-05', '12:53:00', '12:57:00', 'h', ''),
(33, 116, 4, 46, 1, 'Indra Julias Pradana', 'Kemahasiswaan', '2021-08-05', '2021-08-05', '2021-08-05', '13:05:00', '13:10:00', 'Rapat', ''),
(34, 117, 7, 16, 1, 'Rohendi', 'Mahasiswa', '2021-08-05', '2021-08-05', '2021-08-05', '13:07:00', '13:13:00', 'gffg', ''),
(35, 118, 5, 6, 1, 'Hena Sulaeman', 'Dosen', '2021-08-05', '2021-08-05', '2021-08-05', '20:05:00', '20:10:00', 'o', ''),
(36, 119, 6, 8, 1, 'Rahmat Purwanto', 'Mahasiswa', '2021-08-05', '2021-08-05', '2021-08-05', '20:08:00', '20:13:00', 'nhg', ''),
(37, 120, 4, 46, 1, 'Indra Julias Pradana', 'Kemahasiswaan', '2021-08-05', '2021-08-05', '2021-08-05', '20:10:00', '20:15:00', 'lkl', ''),
(38, 121, 7, 25, 1, 'Rohendi', 'Mahasiswa', '2021-08-05', '2021-08-05', '2021-08-05', '20:20:00', '20:30:00', 'fjufghf', ''),
(39, 122, 5, 46, 1, 'Hena Sulaeman', 'Dosen', '2021-08-05', '2021-08-05', '2021-08-05', '20:25:00', '20:35:00', 'sdfsdf', ''),
(40, 123, 6, 9, 1, 'Rahmat Purwanto', 'Mahasiswa', '2021-08-05', '2021-08-05', '2021-08-05', '20:50:00', '21:00:00', 'dfgg', ''),
(41, 124, 4, 46, 1, 'Indra Julias Pradana', 'Kemahasiswaan', '2021-08-05', '2021-08-05', '2021-08-05', '20:54:00', '21:02:00', 'dfg', ''),
(42, 125, 6, 20, 1, 'Rahmat Purwanto', 'Mahasiswa', '2021-08-06', '2021-08-06', '2021-08-06', '15:05:00', '15:15:00', 'afgdf', ''),
(43, 126, 5, 46, 1, 'Hena Sulaeman', 'Dosen', '2021-08-06', '2021-08-06', '2021-08-06', '15:08:00', '15:18:00', 'ljofho', ''),
(44, 127, 6, 19, 1, 'Rahmat Purwanto', 'Mahasiswa', '2021-08-06', '2021-08-06', '2021-08-06', '16:10:00', '16:20:00', 'gfdgdf', ''),
(45, 128, 5, 46, 1, 'Hena Sulaeman', 'Dosen', '2021-08-06', '2021-08-06', '2021-08-06', '16:15:00', '16:25:00', 'fdggg', ''),
(46, 129, 5, 46, 1, 'Hena Sulaeman', 'Dosen', '2021-08-06', '2021-08-06', '2021-08-06', '16:30:00', '16:35:00', 'fsgsdfsf', ''),
(47, 130, 7, 12, 1, 'Rohendi', 'Mahasiswa', '2021-08-06', '2021-08-06', '2021-08-06', '17:15:00', '17:20:00', 'kjh', ''),
(48, 131, 7, 46, 1, 'Rohendi', 'Mahasiswa', '2021-08-06', '2021-08-06', '2021-08-06', '17:25:00', '17:30:00', 'gdfd', ''),
(49, 132, 7, 18, 1, 'Rohendi', 'Mahasiswa', '2021-08-06', '2021-08-06', '2021-08-06', '20:55:00', '21:00:00', 'sfgdgf', ''),
(50, 133, 7, 46, 1, 'Rohendi', 'Mahasiswa', '2021-08-06', '2021-08-06', '2021-08-06', '21:00:00', '21:05:00', 'sfgdgf', ''),
(51, 134, 7, 46, 1, 'Rohendi', 'Mahasiswa', '2021-08-06', '2021-08-06', '2021-08-06', '21:10:00', '21:20:00', 'adasasad', ''),
(52, 135, 7, 46, 1, 'Rohendi', 'Mahasiswa', '2021-08-06', '2021-08-06', '2021-08-06', '21:40:00', '21:45:00', 'fagsdf', ''),
(53, 136, 5, 12, 1, 'Hena Sulaeman', 'Dosen', '2021-08-07', '2021-08-07', '2021-08-07', '18:35:00', '18:40:00', 'fdgd', ''),
(54, 137, 4, 46, 1, 'Indra Julias Pradana', 'Kemahasiswaan', '2021-08-07', '2021-08-07', '2021-08-07', '18:45:00', '18:50:00', 'fhgdvc', ''),
(55, 138, 6, 13, 1, 'Rahmat Purwanto', 'Mahasiswa', '2021-08-07', '2021-08-07', '2021-08-07', '20:40:00', '20:45:00', 'ffsd', ''),
(56, 139, 4, 46, 1, 'Indra Julias Pradana', 'Kemahasiswaan', '2021-08-07', '2021-08-07', '2021-08-07', '20:43:00', '20:49:00', 'sdfdsf', ''),
(57, 140, 4, 46, 1, 'Indra Julias Pradana', 'Kemahasiswaan', '2021-08-07', '2021-08-07', '2021-08-07', '20:55:00', '21:00:00', 'sac', ''),
(58, 141, 4, 46, 1, 'Indra Julias Pradana', 'Kemahasiswaan', '2021-08-07', '2021-08-07', '2021-08-07', '21:15:00', '21:30:00', 'sdfsdf', ''),
(59, 142, 7, 14, 1, 'Rohendi', 'Mahasiswa', '2021-08-07', '2021-08-07', '2021-08-07', '21:40:00', '21:45:00', 'zxcx', ''),
(60, 143, 4, 46, 1, 'Indra Julias Pradana', 'Kemahasiswaan', '2021-08-07', '2021-08-07', '2021-08-07', '21:50:00', '22:00:00', 'dsfs', ''),
(61, 144, 5, 46, 1, 'Hena Sulaeman', 'Dosen', '2021-08-07', '2021-08-07', '2021-08-07', '23:49:00', '23:56:00', 'sa', ''),
(62, 145, 6, 1, 1, 'Rahmat Purwanto', 'Mahasiswa', '2021-08-07', '2021-08-08', '2021-08-08', '00:05:00', '00:10:00', 'adsd', ''),
(63, 146, 4, 46, 1, 'Indra Julias Pradana', 'Kemahasiswaan', '2021-08-07', '2021-08-08', '2021-08-08', '00:27:00', '00:33:00', 'ds', ''),
(64, 147, 4, 43, 1, 'Indra Julias Pradana', 'Kemahasiswaan', '2021-08-08', '2021-08-08', '2021-08-08', '20:10:00', '20:15:00', 'dff', ''),
(65, 148, 4, 43, 1, 'Indra Julias Pradana', 'Kemahasiswaan', '2021-08-08', '2021-08-08', '2021-08-08', '20:20:00', '20:30:00', 'asdasa', ''),
(66, 149, 6, 1, 1, 'Rahmat Purwanto', 'Mahasiswa', '2021-08-08', '2021-08-08', '2021-08-08', '20:50:00', '21:00:00', 'DASD', ''),
(67, 150, 7, 3, 1, 'Rohendi', 'Mahasiswa', '2021-08-08', '2021-08-08', '2021-08-08', '21:05:00', '21:10:00', 'dfxfd', ''),
(68, 151, 6, 5, 1, 'Rahmat Purwanto', 'Mahasiswa', '2021-08-08', '2021-08-08', '2021-08-08', '21:20:00', '21:25:00', 'xasfgre', ''),
(69, 152, 4, 43, 1, 'Indra Julias Pradana', 'Kemahasiswaan', '2021-08-08', '2021-08-08', '2021-08-08', '23:20:00', '23:25:00', 'wd', ''),
(70, 154, 6, 28, 2, 'Rahmat Purwanto', 'Mahasiswa', '2021-08-08', '2021-08-08', '2021-08-08', '23:50:00', '23:55:00', 'g', ''),
(71, 155, 6, 29, 2, 'Rahmat Purwanto', 'Mahasiswa', '2021-08-08', '2021-08-09', '2021-08-09', '00:30:00', '00:35:00', 's', ''),
(72, 156, 6, 2, 1, 'Rahmat Purwanto', 'Mahasiswa', '2021-08-13', '2021-08-13', '2021-08-13', '14:30:00', '14:35:00', 'fsdgsdf', ''),
(73, 157, 7, 4, 1, 'Rohendi', 'Mahasiswa', '2021-08-13', '2021-08-13', '2021-08-13', '14:40:00', '14:45:00', 'dfg', ''),
(74, 158, 5, 5, 1, 'Hena Sulaeman', 'Dosen', '2021-08-13', '2021-08-13', '2021-08-13', '14:55:00', '15:00:00', 'zsd', ''),
(75, 159, 6, 1, 1, 'Rahmat Purwanto', 'Mahasiswa', '2021-08-13', '2021-08-13', '2021-08-13', '20:25:00', '20:30:00', 'sdf', ''),
(76, 160, 6, 1, 1, 'Rahmat Purwanto', 'Mahasiswa', '2021-10-01', '2021-10-01', '2021-10-01', '10:12:00', '10:15:00', 'JKJM', ''),
(77, 161, 6, 1, 1, 'Rahmat Purwanto', 'Mahasiswa', '2021-10-01', '2021-10-01', '2021-10-01', '21:15:00', '21:20:00', 'F', ''),
(78, 162, 5, 1, 1, 'Hena Sulaeman', 'Dosen', '2021-10-01', '2021-10-01', '2021-10-01', '21:30:00', '21:35:00', 'd', ''),
(79, 163, 7, 4, 1, 'Rohendi', 'Mahasiswa', '2021-10-01', '2021-10-01', '2021-10-01', '21:45:00', '21:50:00', 'sds', ''),
(80, 164, 7, 7, 1, 'Rohendi', 'Mahasiswa', '2021-10-01', '2021-10-01', '2021-10-01', '21:55:00', '22:00:00', 'sfw', ''),
(81, 165, 6, 5, 1, 'Rahmat Purwanto', 'Mahasiswa', '2021-10-01', '2021-10-02', '2021-10-02', '00:35:00', '00:40:00', 'HJ', ''),
(82, 166, 6, 5, 1, 'Rahmat Purwanto', 'Mahasiswa', '2021-10-10', '2021-10-10', '2021-10-10', '11:09:00', '11:13:00', 'sds', ''),
(83, 167, 6, 4, 1, 'Rahmat Purwanto', 'Mahasiswa', '2021-10-11', '2021-10-11', '2021-10-11', '20:18:00', '20:23:00', 'sgrd', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbrole`
--

CREATE TABLE `tbrole` (
  `role_id` int(11) NOT NULL,
  `role` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbrole`
--

INSERT INTO `tbrole` (`role_id`, `role`) VALUES
(1, 'Superadmin'),
(2, 'Admin1'),
(3, 'Admin2'),
(4, 'Kemahasiswaan'),
(5, 'Koordinator aset'),
(6, 'Wakil ketua 2'),
(7, 'Dosen'),
(8, 'Mahasiswa');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbruangan`
--

CREATE TABLE `tbruangan` (
  `id_ruangan` int(11) NOT NULL,
  `ruangan` varchar(50) NOT NULL,
  `id_kampus` int(11) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbruangan`
--

INSERT INTO `tbruangan` (`id_ruangan`, `ruangan`, `id_kampus`, `status`) VALUES
(1, '1.1', 1, 0),
(2, '1.2', 1, 0),
(3, '1.3', 1, 0),
(4, '1.4', 1, 0),
(5, '1.5', 1, 0),
(6, '2.1', 1, 0),
(7, '2.2', 1, 0),
(8, '2.3', 1, 0),
(9, '2.4', 1, 0),
(10, '2.5', 1, 0),
(11, '2.6', 1, 0),
(12, '2.7', 1, 0),
(13, '2.8', 1, 0),
(14, '2.9', 1, 0),
(15, '3.1', 1, 0),
(16, '3.2', 1, 0),
(17, '3.3', 1, 0),
(18, '3.4', 1, 0),
(19, '3.5', 1, 0),
(20, '3.6', 1, 0),
(21, '4.1', 1, 0),
(22, '4.2', 1, 0),
(23, '4.3', 1, 0),
(24, '4.4', 1, 0),
(25, '4.5', 1, 0),
(26, '4.6', 1, 0),
(27, '1.1', 2, 0),
(28, '1.2', 2, 0),
(29, '1.3', 2, 0),
(30, '1.4', 2, 0),
(31, '1.5', 2, 0),
(32, '1.6', 2, 0),
(33, '1.7', 2, 0),
(34, '2.1', 2, 0),
(35, '2.2', 2, 0),
(36, '2.3', 2, 0),
(37, '2.4', 2, 0),
(38, '2.5', 2, 0),
(39, '2.6', 2, 0),
(40, '2.7', 2, 0),
(41, '2.8', 2, 0),
(42, '2.9', 2, 0),
(43, 'Ruangan Aula', 1, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbuser`
--

CREATE TABLE `tbuser` (
  `id_user` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role_id` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbuser`
--

INSERT INTO `tbuser` (`id_user`, `username`, `nama`, `password`, `role_id`) VALUES
(1, '12345', 'Syifa Nur Fauziah', '$2y$10$cbBSIqPctWqOUUCIZNxzoOqb9AzJqwDRzQWf.6vmtZu0IOecWP.nK', 1),
(2, '123456', 'Gugun Gunawan', '$2y$10$RgbCiFO1t914..BFE7Oovu1AnHnCHJbVhPWHNPDe/c/W.FCs8Tfk2', 2),
(3, '1234567', 'Sela Oktaviani', '$2y$10$kCAGyeWsoJzHq1a1WEb5aOscXweMaC.HgyoUx1CJ6dPSOyRBKsMfG', 3),
(4, '4567', 'Indra Julias Pradana', '$2y$10$HLBCn7xPUy4kakw08JLbBekNZL47pVmYo4fdLk4UnSqYrUEKW64wK', 4),
(5, '8910', 'Hena Sulaeman', '$2y$10$7ouDMchVWM0FFMx9MIrrduS2J1EpzUPdh9BSkL8kC68obZOnKk7HC', 7),
(6, '16111238', 'Rahmat Purwanto', '$2y$10$gjrrBiGGv/0G.CJXuRBDiuOnBe6ns5jKTvbDb5CWiCCFtI2uQ3mwq', 8),
(7, '16111252', 'Rohendi', '$2y$10$del0VNbwv0O2sseANDGoGOrde0z8bCTLlYfTpSThz21C9..d8/pUy', 8),
(8, '16111300', 'Agus Suhendar', '$2y$10$2YDjbj/yqw.CrmB/AAi.V.nKqdRWp77sJr.uwCISqBgPp/1LLnV2y', 8),
(10, '1011', 'Yudi Guntara', '$2y$10$cMZmjDGYwPTbT2zuGucyaO5SbKGAmAEEf.e1okoVqe2diyAE5DAPW', 5),
(11, '1112', 'Agus Rahmat Hermawanto', '$2y$10$8j.PxJEAL7wO3rCQxg9u/efnzPcD3gb1aLVs5YVTvPYsGaDFLZ7YO', 6);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbjurusan`
--
ALTER TABLE `tbjurusan`
  ADD PRIMARY KEY (`id_jurusan`);

--
-- Indeks untuk tabel `tbkampus`
--
ALTER TABLE `tbkampus`
  ADD PRIMARY KEY (`id_kampus`);

--
-- Indeks untuk tabel `tbkelas`
--
ALTER TABLE `tbkelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indeks untuk tabel `tborganisasi`
--
ALTER TABLE `tborganisasi`
  ADD PRIMARY KEY (`id_organisasi`);

--
-- Indeks untuk tabel `tbpinjam`
--
ALTER TABLE `tbpinjam`
  ADD PRIMARY KEY (`id_pinjam`);

--
-- Indeks untuk tabel `tbrekap`
--
ALTER TABLE `tbrekap`
  ADD PRIMARY KEY (`id_rekap`);

--
-- Indeks untuk tabel `tbrole`
--
ALTER TABLE `tbrole`
  ADD PRIMARY KEY (`role_id`);

--
-- Indeks untuk tabel `tbruangan`
--
ALTER TABLE `tbruangan`
  ADD PRIMARY KEY (`id_ruangan`);

--
-- Indeks untuk tabel `tbuser`
--
ALTER TABLE `tbuser`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbjurusan`
--
ALTER TABLE `tbjurusan`
  MODIFY `id_jurusan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `tbkampus`
--
ALTER TABLE `tbkampus`
  MODIFY `id_kampus` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tbkelas`
--
ALTER TABLE `tbkelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- AUTO_INCREMENT untuk tabel `tborganisasi`
--
ALTER TABLE `tborganisasi`
  MODIFY `id_organisasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `tbpinjam`
--
ALTER TABLE `tbpinjam`
  MODIFY `id_pinjam` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=168;

--
-- AUTO_INCREMENT untuk tabel `tbrekap`
--
ALTER TABLE `tbrekap`
  MODIFY `id_rekap` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT untuk tabel `tbrole`
--
ALTER TABLE `tbrole`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `tbruangan`
--
ALTER TABLE `tbruangan`
  MODIFY `id_ruangan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT untuk tabel `tbuser`
--
ALTER TABLE `tbuser`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
