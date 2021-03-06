-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 30, 2020 at 07:37 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_sppd`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_golongan`
--

CREATE TABLE `tb_golongan` (
  `id_golongan` int(11) NOT NULL,
  `golongan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_golongan`
--

INSERT INTO `tb_golongan` (`id_golongan`, `golongan`) VALUES
(1, 'Pembina Tk. I (IV/b)'),
(2, 'Pembina (IV/a)'),
(3, 'Penata Tk. I (III/d)'),
(4, 'Penata (III/c)'),
(5, 'Penata Muda Tk.I (III/b)'),
(6, 'Penata Muda (III/a)'),
(7, 'Pengatur Tk.I (II/d)'),
(8, 'Pengatur (II/c)'),
(9, 'Pengatur Muda Tk.I (II/b)'),
(10, 'Pengatur Muda (II/a)');

-- --------------------------------------------------------

--
-- Table structure for table `tb_jabatan`
--

CREATE TABLE `tb_jabatan` (
  `id_jabatan` int(11) NOT NULL,
  `jabatan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_jabatan`
--

INSERT INTO `tb_jabatan` (`id_jabatan`, `jabatan`) VALUES
(1, 'Camat'),
(2, 'Sekcam'),
(3, 'Kasi Tata Pemerintah'),
(4, 'Kasi Pemberdayaan Masyarakat'),
(5, 'Kasi Kesejahteraan Rakyat'),
(6, 'Kasi Trantib & Pelayanan Umum'),
(7, 'Kasubbag Umpeg'),
(8, 'Kasubbag Perencanaan & Keuangan'),
(9, 'Staf'),
(10, 'Tenaga Honorer');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pegawai`
--

CREATE TABLE `tb_pegawai` (
  `id_pegawai` int(11) NOT NULL,
  `nip` varchar(30) NOT NULL,
  `nama_pegawai` varchar(50) NOT NULL,
  `id_jabatan` int(11) NOT NULL,
  `id_golongan` int(11) NOT NULL,
  `id_tingkat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pegawai`
--

INSERT INTO `tb_pegawai` (`id_pegawai`, `nip`, `nama_pegawai`, `id_jabatan`, `id_golongan`, `id_tingkat`) VALUES
(1, '19720401 199203 1 005', 'Drs. AGUNG WIDODO, MM', 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_sppd`
--

CREATE TABLE `tb_sppd` (
  `id_sppd` int(11) NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `surat` varchar(100) NOT NULL,
  `nomor` varchar(50) NOT NULL,
  `tgl_surat` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `perihal` varchar(100) NOT NULL,
  `kegiatan` varchar(100) NOT NULL,
  `tujuan` varchar(100) NOT NULL,
  `lama` int(11) NOT NULL,
  `tgl_berangkat` date NOT NULL,
  `tgl_pulang` date NOT NULL,
  `pengikut1` int(11) NOT NULL,
  `pengikut2` int(11) NOT NULL,
  `pengikut3` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_sppd`
--

INSERT INTO `tb_sppd` (`id_sppd`, `id_pegawai`, `surat`, `nomor`, `tgl_surat`, `perihal`, `kegiatan`, `tujuan`, `lama`, `tgl_berangkat`, `tgl_pulang`, `pengikut1`, `pengikut2`, `pengikut3`) VALUES
(1, 1, 'Bappeda Kab. Demak', '005/205/I/2021', '2020-12-28 17:00:00', 'Undangan', 'Rapat Teknis Penyusunan LPPD', 'Hotel Lor In Solo', 1, '2020-12-29', '2020-12-30', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_tingkat`
--

CREATE TABLE `tb_tingkat` (
  `id_tingkat` int(11) NOT NULL,
  `tingkat` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_tingkat`
--

INSERT INTO `tb_tingkat` (`id_tingkat`, `tingkat`) VALUES
(1, 'Tingkat C'),
(2, 'Tingkat D'),
(3, 'Tingkat E');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `nip` varchar(30) NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` enum('admin','pegawai') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `nip`, `id_pegawai`, `password`, `level`) VALUES
(1, 'admin', 0, '$2y$10$tVrX0FTJb3kVB4fzmYTyeeAfuZgt9F9L5fJAhLQyyJUzpQ.C9a9Sy', 'admin'),
(2, '197204011992031005', 1, '$2y$10$k4Bs31mMImYHOHYlQG2MTe4lHcra29MhnOkZjP27ohWxwSGbOr.vK', 'pegawai');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_golongan`
--
ALTER TABLE `tb_golongan`
  ADD PRIMARY KEY (`id_golongan`);

--
-- Indexes for table `tb_jabatan`
--
ALTER TABLE `tb_jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indexes for table `tb_pegawai`
--
ALTER TABLE `tb_pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- Indexes for table `tb_sppd`
--
ALTER TABLE `tb_sppd`
  ADD PRIMARY KEY (`id_sppd`);

--
-- Indexes for table `tb_tingkat`
--
ALTER TABLE `tb_tingkat`
  ADD PRIMARY KEY (`id_tingkat`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_golongan`
--
ALTER TABLE `tb_golongan`
  MODIFY `id_golongan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tb_jabatan`
--
ALTER TABLE `tb_jabatan`
  MODIFY `id_jabatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tb_pegawai`
--
ALTER TABLE `tb_pegawai`
  MODIFY `id_pegawai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_sppd`
--
ALTER TABLE `tb_sppd`
  MODIFY `id_sppd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_tingkat`
--
ALTER TABLE `tb_tingkat`
  MODIFY `id_tingkat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
