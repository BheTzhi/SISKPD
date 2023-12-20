-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql109.byetcluster.com
-- Generation Time: Oct 24, 2023 at 03:10 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `siskpd2`
--

-- --------------------------------------------------------

--
-- Table structure for table `background`
--

CREATE TABLE `background` (
  `id` int(11) NOT NULL,
  `background` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `background`
--

INSERT INTO `background` (`id`, `background`) VALUES
(1, 'info'),
(2, 'success'),
(3, 'warning'),
(4, 'danger'),
(5, 'primary');

-- --------------------------------------------------------

--
-- Table structure for table `kegiatan`
--

CREATE TABLE `kegiatan` (
  `id_kegiatan` varchar(11) NOT NULL,
  `namakegiatan` varchar(255) NOT NULL,
  `kodeprogram` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kegiatan`
--

INSERT INTO `kegiatan` (`id_kegiatan`, `namakegiatan`, `kodeprogram`) VALUES
('0001', 'Kegiatan Program Adnimistrasi Perkantoran', '02'),
('0002', 'Pembangunan Jalan Tol', '01');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id_pengguna` int(11) NOT NULL,
  `namapengguna` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `jk` varchar(255) NOT NULL,
  `tempatlahir` varchar(255) NOT NULL,
  `tgllahir` date NOT NULL,
  `notelp` varchar(15) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `kodeskpd` varchar(255) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id_pengguna`, `namapengguna`, `foto`, `jk`, `tempatlahir`, `tgllahir`, `notelp`, `alamat`, `username`, `password`, `kodeskpd`, `role_id`) VALUES
(1, 'Fitradya ika wahyudi', 'fotofitra.jpg', 'p', 'Bondowoso', '2002-07-14', '085236503099', 'Bondowoso', 'fitra', '72253b91e92fa9253a97960eb5fcf0e3', '0102001', 1);

-- --------------------------------------------------------

--
-- Table structure for table `program`
--

CREATE TABLE `program` (
  `kodeprogram` varchar(5) NOT NULL,
  `namaprogram` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `program`
--

INSERT INTO `program` (`kodeprogram`, `namaprogram`) VALUES
('01', 'Pembangunan'),
('02', 'Program Administrasi Perkantoran'),
('03', 'Program Perbankan'),
('04', 'Program Sosialisasi dan Implementasi');

-- --------------------------------------------------------

--
-- Table structure for table `realisasi`
--

CREATE TABLE `realisasi` (
  `id_realisasi` varchar(255) NOT NULL,
  `tglrealisasi` varchar(255) NOT NULL,
  `kodeskpd` varchar(255) NOT NULL,
  `kodepengguna` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `realisasi`
--

INSERT INTO `realisasi` (`id_realisasi`, `tglrealisasi`, `kodeskpd`, `kodepengguna`, `keterangan`) VALUES
('001', '2022-07-08', '0102001', '1', 'Belanja'),
('002', '2022-07-12', '0102001', '1', 'Belanja'),
('003', '2022-12-30', '0102002', '1', 'Belanja');

-- --------------------------------------------------------

--
-- Table structure for table `realisasi_detail`
--

CREATE TABLE `realisasi_detail` (
  `koderealisasi` varchar(255) NOT NULL,
  `koderka` varchar(255) NOT NULL,
  `jumlahrealisasi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `realisasi_detail`
--

INSERT INTO `realisasi_detail` (`koderealisasi`, `koderka`, `jumlahrealisasi`) VALUES
('001', '001', '10000000'),
('002', '001', '15000000'),
('003', '002', '5000000');

-- --------------------------------------------------------

--
-- Table structure for table `rka`
--

CREATE TABLE `rka` (
  `koderka` varchar(225) NOT NULL,
  `kodeskpd` varchar(255) NOT NULL,
  `totalrka` varchar(255) NOT NULL,
  `tglpengesahanrka` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rka`
--

INSERT INTO `rka` (`koderka`, `kodeskpd`, `totalrka`, `tglpengesahanrka`) VALUES
('001', '0102001', '500000000', '2022-07-05'),
('002', '0102002', '250000000', '2022-12-22');

-- --------------------------------------------------------

--
-- Table structure for table `rkadetail`
--

CREATE TABLE `rkadetail` (
  `koderkadetail` int(11) NOT NULL,
  `koderka` varchar(255) NOT NULL,
  `Id_kegiatan` varchar(255) NOT NULL,
  `kodeuraian` varchar(255) NOT NULL,
  `jumlahrka` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rkadetail`
--

INSERT INTO `rkadetail` (`koderkadetail`, `koderka`, `Id_kegiatan`, `kodeuraian`, `jumlahrka`) VALUES
(1, '001', '0001', '116', '25000000'),
(2, '001', '0002', '112', '300000000'),
(4, '002', '0002', '116', '50000000'),
(6, '002', '0001', '116', '10000000'),
(7, '001', '0001', '111', '1500000');

-- --------------------------------------------------------

--
-- Table structure for table `skpd`
--

CREATE TABLE `skpd` (
  `kodeskpd` varchar(255) NOT NULL,
  `namaskpd` varchar(255) NOT NULL,
  `alamatskpd` varchar(255) NOT NULL,
  `notelp` varchar(255) NOT NULL,
  `namapenggunaananggaran` varchar(255) NOT NULL,
  `nippenggunaananggaran` varchar(255) NOT NULL,
  `namabendahara` varchar(255) NOT NULL,
  `nipbendahara` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `skpd`
--

INSERT INTO `skpd` (`kodeskpd`, `namaskpd`, `alamatskpd`, `notelp`, `namapenggunaananggaran`, `nippenggunaananggaran`, `namabendahara`, `nipbendahara`) VALUES
('0102001', 'Dinas Damkar', 'Jl. Banyuwangi', '081212345678', 'Budiman, SE, MM', '12345671234561123', 'Sutarno, SE', '12345671234561123'),
('0102002', 'Dinas Perindustrian dan Perdagangan', 'Kabupaten Banyuwangi', '081200001111', 'Rohmat', '12345671234551123', 'Rommi', '12345671234551321'),
('0102003', 'Dinas Kesehatan', 'Jl. Banyuwangi', '081200003333', 'Waluyo', '12345671234561123', 'Wira', '12345671234561123');

-- --------------------------------------------------------

--
-- Table structure for table `uraian`
--

CREATE TABLE `uraian` (
  `kodeuraian` varchar(255) NOT NULL,
  `namauraian` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `uraian`
--

INSERT INTO `uraian` (`kodeuraian`, `namauraian`) VALUES
('111', 'Kas Di Bendahara'),
('112', 'Piutang'),
('113', 'Modal'),
('114', 'Pendapatan Pajak dan Retribusi Daerah'),
('115', 'Pendapatan semua kendaraan'),
('116', 'Belanja');

-- --------------------------------------------------------

--
-- Table structure for table `user_access`
--

CREATE TABLE `user_access` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_access`
--

INSERT INTO `user_access` (`id`, `menu_id`, `role_id`) VALUES
(15, 1, 1),
(28, 5, 3),
(34, 6, 2),
(35, 6, 1),
(45, 5, 1),
(47, 4, 3),
(56, 5, 2),
(57, 2, 2),
(58, 2, 1),
(59, 4, 1),
(60, 7, 1),
(61, 8, 1),
(62, 5, 10),
(63, 9, 10),
(64, 5, 11),
(65, 10, 11),
(66, 9, 1),
(69, 10, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'Admin Super'),
(2, 'Admin'),
(4, 'Skpd'),
(5, 'User'),
(9, 'Petugas'),
(10, 'Pimpinan');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Admin Super'),
(2, 'Admin'),
(3, 'Skpd'),
(10, 'Petugas'),
(11, 'Pimpinan');

-- --------------------------------------------------------

--
-- Table structure for table `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `icon` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`) VALUES
(1, 1, 'Menu', 'menu', 'nav-icon far fa-list-alt'),
(2, 1, 'Sub Menu', 'submenu', 'nav-icon far fa-list-alt'),
(4, 1, 'Access', 'access', 'nav-icon fas fa-user-tie'),
(6, 2, 'User', 'user', 'nav-icon fas  fa-user-secret'),
(7, 5, 'Profile', 'profile', 'nav-icon far fa-user'),
(8, 5, 'Edit Password', 'profile/editpassword', 'nav-icon fas fa-lock'),
(11, 4, 'Data SKPD', 'skpd', 'nav-icon far fa-building'),
(12, 4, 'Data Program', 'program', 'nav-icon fas fa-desktop'),
(13, 4, 'Data Kegiatan', 'kegiatan', 'nav-icon fas fa-tasks'),
(15, 4, 'Data Uraian', 'uraian', 'nav-icon fas fa-book'),
(16, 9, 'Data RKA', 'rka', 'nav-icon fas fa-dollar-sign'),
(17, 10, 'Laporan RKA', 'laporan', 'nav-icon far fa-file'),
(18, 9, 'Data Realisasi', 'realisasi', 'nav-icon fas fa-link'),
(19, 10, 'Laporan Realisasi', 'laporan/realisasi', 'nav-icon fas fa-print');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `background`
--
ALTER TABLE `background`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD PRIMARY KEY (`id_kegiatan`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- Indexes for table `program`
--
ALTER TABLE `program`
  ADD PRIMARY KEY (`kodeprogram`);

--
-- Indexes for table `realisasi`
--
ALTER TABLE `realisasi`
  ADD PRIMARY KEY (`id_realisasi`);

--
-- Indexes for table `rka`
--
ALTER TABLE `rka`
  ADD PRIMARY KEY (`koderka`);

--
-- Indexes for table `rkadetail`
--
ALTER TABLE `rkadetail`
  ADD PRIMARY KEY (`koderkadetail`);

--
-- Indexes for table `skpd`
--
ALTER TABLE `skpd`
  ADD PRIMARY KEY (`kodeskpd`);

--
-- Indexes for table `uraian`
--
ALTER TABLE `uraian`
  ADD PRIMARY KEY (`kodeuraian`);

--
-- Indexes for table `user_access`
--
ALTER TABLE `user_access`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `background`
--
ALTER TABLE `background`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id_pengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `rkadetail`
--
ALTER TABLE `rkadetail`
  MODIFY `koderkadetail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user_access`
--
ALTER TABLE `user_access`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
