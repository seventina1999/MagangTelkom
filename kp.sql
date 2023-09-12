-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 07, 2022 at 03:03 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kp`
--

-- --------------------------------------------------------

--
-- Table structure for table `absensi`
--

CREATE TABLE `absensi` (
  `id_absen` int(11) NOT NULL,
  `tgl` date NOT NULL,
  `waktu` time NOT NULL,
  `keterangan` enum('Masuk','Pulang') CHARACTER SET latin1 NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `absensi`
--

INSERT INTO `absensi` (`id_absen`, `tgl`, `waktu`, `keterangan`, `id_user`) VALUES
(7, '2022-06-19', '20:05:35', 'Masuk', 10),
(8, '2022-06-19', '21:45:00', 'Pulang', 10),
(9, '2022-06-19', '20:10:58', 'Masuk', 24),
(10, '2022-06-19', '21:45:05', 'Pulang', 24),
(11, '2022-06-20', '08:41:33', 'Masuk', 24),
(12, '2022-06-20', '08:42:55', 'Pulang', 24),
(13, '2022-06-20', '22:54:04', 'Masuk', 26),
(14, '2022-06-20', '22:54:14', 'Pulang', 26),
(15, '2022-06-21', '09:38:27', 'Masuk', 6),
(16, '2022-06-21', '14:31:11', 'Masuk', 25),
(17, '2022-06-21', '14:31:18', 'Pulang', 25),
(18, '2022-06-22', '10:28:34', 'Masuk', 24),
(19, '2022-06-22', '10:29:07', 'Pulang', 24);

-- --------------------------------------------------------

--
-- Table structure for table `cutiijin`
--

CREATE TABLE `cutiijin` (
  `id` int(11) NOT NULL,
  `id_nama` int(11) NOT NULL,
  `id_divisi` int(11) NOT NULL,
  `tipe` varchar(100) NOT NULL,
  `keterangan` varchar(200) NOT NULL,
  `awl_tgl` date NOT NULL,
  `akhir_tgl` date NOT NULL,
  `lama_waktu` int(11) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cutiijin`
--

INSERT INTO `cutiijin` (`id`, `id_nama`, `id_divisi`, `tipe`, `keterangan`, `awl_tgl`, `akhir_tgl`, `lama_waktu`, `status`) VALUES
(6, 10, 3, 'Ijin', 'Pulang Kampung', '2022-06-02', '2022-06-03', 1, 'Diterima'),
(7, 8, 4, 'Cuti', 'Sakit', '2022-06-08', '2022-06-09', 1, 'Diterima'),
(8, 6, 6, 'Ijin', 'dgdg', '2022-06-01', '2022-06-02', 1, 'Diterima'),
(9, 6, 6, 'Ijin', 'Pulang Kampung', '2022-06-14', '2022-06-15', 1, 'Diterima'),
(10, 24, 6, 'Ijin', 'Sakit', '2022-06-12', '2022-06-14', 3, 'Diterima'),
(11, 25, 8, 'Cuti', 'Nikahan', '2022-06-19', '2022-06-20', 2, 'Diterima'),
(12, 6, 6, 'Cuti', 'Sakit', '2022-07-04', '2022-07-05', 1, 'Diterima');

-- --------------------------------------------------------

--
-- Table structure for table `divisi`
--

CREATE TABLE `divisi` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `pembimbing` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `divisi`
--

INSERT INTO `divisi` (`id`, `nama`, `pembimbing`) VALUES
(3, 'WHOLESALE ACCESS NETWORK & WIFI', 17),
(4, 'GOVERNMENT SERVICE', 4),
(5, 'SHARED SERVICE HC & FINANCE', 5),
(6, 'CONSUMER SERVICE', 6),
(7, 'ENTERPRISE SERVICE', 7),
(8, 'ACCESS & SERVICE OPERATION', 8),
(9, 'ACCESS OPTIMA & CONSTRUCTION SPV', 9),
(10, 'CUSTOMER CARE', 10),
(11, 'BUSINESS SERVICE', 11),
(12, 'LOGISTIK & GENERAL SUPPORT', 12),
(13, 'ACCESS DATA MANAGEMENT', 13),
(14, 'NETWORK AREA & IS OPERATION', 14),
(15, 'DIGITAL SERVICE & WIFI', 15),
(99, 'User Baru', 0);

-- --------------------------------------------------------

--
-- Table structure for table `jam`
--

CREATE TABLE `jam` (
  `id_jam` tinyint(1) NOT NULL,
  `masuk` time NOT NULL,
  `pulang` time NOT NULL,
  `keterangan` enum('Masuk','Pulang') CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jam`
--

INSERT INTO `jam` (`id_jam`, `masuk`, `pulang`, `keterangan`) VALUES
(1, '07:45:00', '08:05:00', 'Masuk'),
(2, '16:55:00', '17:10:00', 'Pulang');

-- --------------------------------------------------------

--
-- Table structure for table `tanpaketerangan`
--

CREATE TABLE `tanpaketerangan` (
  `id` int(11) NOT NULL,
  `id_nama` int(11) NOT NULL,
  `jmlh_hari` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tanpaketerangan`
--

INSERT INTO `tanpaketerangan` (`id`, `id_nama`, `jmlh_hari`) VALUES
(3, 6, 2),
(4, 7, 2);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `role` varchar(100) NOT NULL,
  `date_created` int(11) NOT NULL,
  `id_divisi` int(11) NOT NULL,
  `status_pendidikan` varchar(100) NOT NULL,
  `sekolah` varchar(100) NOT NULL,
  `jurusan` varchar(100) NOT NULL,
  `awal_magang` date NOT NULL,
  `akhir_magang` date NOT NULL,
  `no_hp` varchar(100) NOT NULL,
  `status` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password`, `gambar`, `role`, `date_created`, `id_divisi`, `status_pendidikan`, `sekolah`, `jurusan`, `awal_magang`, `akhir_magang`, `no_hp`, `status`) VALUES
(5, 'admin', 'admin@gmail.com', '$2y$10$kF7mMx5KadFsQ2tIPFgP2eKlm6/k14U4SQA525REmYmO0/Amg.FKi', 'a.jpg', 'Admin', 1654151307, 99, '', '', '', '0000-00-00', '0000-00-00', '', 'Active'),
(6, 'Cindy Seventina Agustini Naibaho', 'cindy@gmail.com', '$2y$10$zLf3aZ1cqUn4GEiUrnUpUeda97vTCnrH2dFmVRfnDc5wz5dT9bWwO', '1655779618.jpg', 'User', 1654151382, 6, 'Kuliah', 'pcr', 'Teknik Informatika', '2022-03-07', '2022-07-07', '12345667', 'Active'),
(7, 'tasya', 'tasya@gmail.com', '$2y$10$Dx1kogfY9psWwmPPaPIdl.SGyE8XDaTyU0uh2oMjdQ9JCCSqgvKyW', 'abc2.jpg', 'User', 1654151591, 6, 'SMA', 'SMAN 2 BANDUNG', 'Teknik Informatika', '2022-06-01', '2022-06-17', '12345667', 'Active'),
(8, 'widya', 'widya@gmail.com', '$2y$10$MbvVCdvZcNlh7rOYZQHmNeJIrlqAiRIwmetnPR1ao7HnaCD2FA3Fq', 'default.jpg', 'User', 1654153420, 4, '', '', '', '0000-00-00', '0000-00-00', '', 'Active'),
(10, 'coba', 'coba@gmail.com', '$2y$10$CRB3.UFsqkXgUBPUSe6ZBObnSoq5iyGr/.CVB5/FG9h/58RDs/GG.', 'sdsad.jpg', 'User', 1654223752, 10, 'Kuliah', 'PCR', 'Teknik Informatika', '2022-06-01', '2022-06-17', '12345667', 'Active'),
(11, 'WHOLESALE ACCESS NETWORK & WIFI', 'A001@gmail.com', '$2y$10$wgmJy/Qvq8ve.aIBioBR4.9JlVIL5xQIzN8R68D05QFyypsq9o/f2', 'default.jpg', 'WHOLESALE ACCESS NETWORK & WIFI', 1654700560, 3, '', '', '', '0000-00-00', '0000-00-00', '', 'Active'),
(12, 'GOVERNMENT SERVICE', 'A002@gmail.com', '$2y$10$Itr9S4jmybV7s8garmsREeptuiT/avIpJt1dn6Xw0c6Az3lLHPAj6', 'default.jpg', 'GOVERNMENT SERVICE', 1654700693, 4, '', '', '', '0000-00-00', '0000-00-00', '', 'Active'),
(13, 'SHARED SERVICE HC & FINANCE', 'A003@gmail.com', '$2y$10$1Q5HoeJNIBKS1ZUfwc8S9e6bpMvPdftDc604CznFrGuJ07ZTE.lb.', 'default.jpg', 'SHARED SERVICE HC & FINANCE', 1654701796, 5, '', '', '', '0000-00-00', '0000-00-00', '', 'Active'),
(14, 'CONSUMER SERVICE', 'A004@gmail.com', '$2y$10$7SDkfDd4ac81YKZzX4D8JeaqNMICNEgo0rTgG6YsSgOgqJQ4sWBe2', 'default.jpg', 'CONSUMER SERVICE', 1654701820, 6, '', '', '', '0000-00-00', '0000-00-00', '', 'Active'),
(15, 'ENTERPRISE SERVICE', 'A005@gmail.com', '$2y$10$b4pip7glwBltmBXa5gZNzONk8zhgxm9guNqJ1dtJvNsks6AoteYby', 'default.jpg', 'ENTERPRISE SERVICE', 1654701844, 7, '', '', '', '0000-00-00', '0000-00-00', '', 'Active'),
(16, 'ACCESS & SERVICE OPERATION', 'A006@gmail.com', '$2y$10$s9Zb0Jf2rgmVwInYs3FB/OEFMH3vuOlWpTVJ/7Y/z33uXqeakEm2u', 'default.jpg', 'ACCESS & SERVICE OPERATION', 1654701880, 8, '', '', '', '0000-00-00', '0000-00-00', '', 'Active'),
(17, 'ACCESS OPTIMA & CONSTRUCTION SPV', 'A007@gmail.com', '$2y$10$V7/y/NsBGm8yVgRDpAwx2uahxw7jUqQtLlIAzHeexpLqbfff2WaWa', 'default.jpg', 'ACCESS OPTIMA & CONSTRUCTION SPV', 1654701909, 9, '', '', '', '0000-00-00', '0000-00-00', '', 'Active'),
(18, 'CUSTOMER CARE', 'A008@gmail.com', '$2y$10$qpr/2Q0kRmhcHIRigNoEsOcJnOBxMzl8sOKf6sFCbaoN5Md.YdeSm', 'default.jpg', 'CUSTOMER CARE', 1654701960, 10, '', '', '', '0000-00-00', '0000-00-00', '', 'Active'),
(19, 'BUSINESS SERVICE', 'A009@gmail.com', '$2y$10$XLRD0t/9AvnUM6qMPJ8jpu0a.EVk19gP3.2GysQR4MOCsKKO1d1Jm', 'default.jpg', 'BUSINESS SERVICE', 1654701988, 11, '', '', '', '0000-00-00', '0000-00-00', '', 'Active'),
(20, 'LOGISTIK  GENERAL SUPPORT', 'A010@gmail.com', '$2y$10$Rfu2ggmOPGo5PGHyRYCQEeItjiiD171S0by4EEq.7UFAnvA.fRmTa', 'default.jpg', 'LOGISTIK  GENERAL SUPPORT', 1654702017, 12, '', '', '', '0000-00-00', '0000-00-00', '', 'Active'),
(21, 'ACCESS DATA MANAGEMENT', 'A011@gmail.com', '$2y$10$ZR2LHOH05zWBRlWRjKHS5u2W13kEZKKriJOlhxCTBY6Xep4i5aTAW', 'default.jpg', 'ACCESS DATA MANAGEMENT', 1654702040, 13, '', '', '', '0000-00-00', '0000-00-00', '', 'Active'),
(22, 'NETWORK AREA IS OPERATION', 'A012@gmail.com', '$2y$10$jjSAkcdG4fs8lLB5VPuM9u79A3h2JCCDl5jCgLc/C2tmhi1fXzzfi', 'default.jpg', 'NETWORK AREA IS OPERATION', 1654702060, 14, '', '', '', '0000-00-00', '0000-00-00', '', 'Active'),
(23, 'DIGITAL SERVICE WIFI', 'A013@gmail.com', '$2y$10$G5dy8i2XHOUQOofZV.Epc.fIXlOTxleQVMbDMxlr/HRF4/p6bpRCa', 'default.jpg', 'DIGITAL SERVICE WIFI', 1654702092, 15, '', '', '', '0000-00-00', '0000-00-00', '', 'Active'),
(24, 'vuan', 'vuan@gmail.com', '$2y$10$7pMvId9wCuprL1.2gxUpKOrQyIx3cqkg2QiZl3gbbQQoswtJQ1592', 'default.jpg', 'User', 1655194881, 6, '', '', '', '0000-00-00', '0000-00-00', '', 'Active'),
(25, 'reza', 'reza@gmail.com', '$2y$10$Pfer0ucpAfbA2Hqud6liI./RHFHYQsVkDXE4ehkV4eX8gR66oOO6O', 'BG_Zoom_Kuliah_Umum_BMKG.jpg', 'User', 1655448383, 8, 'TK', 'Annamiroh ', 'TataBoga', '2022-06-01', '2022-06-30', '123456789', 'Active'),
(26, 'yudha', 'yudha@gmail.com', '$2y$10$U8ZQKPk8lPTqXv2HdNkSJuOdOEvXQEDdgq4DolLFKeyXSbrP/JUxm', 'default.jpg', 'User', 1655706854, 3, '', '', '', '0000-00-00', '0000-00-00', '', 'Active'),
(27, 'hadi', 'hadi@gmail.com', '$2y$10$3ct8S2IhPyj5DOTDvZ6I7eJHVgjrXr7tQFu1qYXbOKj7FY5H8SP.y', '1655868793.jpg', 'User', 1655868758, 3, 'TK', 'Annamiroh ', 'TataBoga', '0000-00-00', '0000-00-00', '123456', 'Active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absensi`
--
ALTER TABLE `absensi`
  ADD PRIMARY KEY (`id_absen`);

--
-- Indexes for table `cutiijin`
--
ALTER TABLE `cutiijin`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_cuti_divisi` (`id_divisi`),
  ADD KEY `fk_user_cuti` (`id_nama`);

--
-- Indexes for table `divisi`
--
ALTER TABLE `divisi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_userdivisi` (`pembimbing`);

--
-- Indexes for table `jam`
--
ALTER TABLE `jam`
  ADD PRIMARY KEY (`id_jam`);

--
-- Indexes for table `tanpaketerangan`
--
ALTER TABLE `tanpaketerangan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_tanpa_user` (`id_nama`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_divisi` (`id_divisi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absensi`
--
ALTER TABLE `absensi`
  MODIFY `id_absen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `cutiijin`
--
ALTER TABLE `cutiijin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `divisi`
--
ALTER TABLE `divisi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT for table `jam`
--
ALTER TABLE `jam`
  MODIFY `id_jam` tinyint(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tanpaketerangan`
--
ALTER TABLE `tanpaketerangan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cutiijin`
--
ALTER TABLE `cutiijin`
  ADD CONSTRAINT `fk_cuti_divisi` FOREIGN KEY (`id_divisi`) REFERENCES `divisi` (`id`),
  ADD CONSTRAINT `fk_user_cuti` FOREIGN KEY (`id_nama`) REFERENCES `user` (`id`);

--
-- Constraints for table `tanpaketerangan`
--
ALTER TABLE `tanpaketerangan`
  ADD CONSTRAINT `fk_tanpa_user` FOREIGN KEY (`id_nama`) REFERENCES `user` (`id`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `fk_user_divisi` FOREIGN KEY (`id_divisi`) REFERENCES `divisi` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
