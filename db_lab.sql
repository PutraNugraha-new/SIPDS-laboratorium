-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 13, 2024 at 06:50 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_lab`
--

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int NOT NULL,
  `site_title` varchar(50) NOT NULL,
  `timezone` varchar(100) NOT NULL,
  `recaptcha` varchar(5) NOT NULL,
  `theme` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `site_title`, `timezone`, `recaptcha`, `theme`) VALUES
(1, 'Dnato System Login', 'Asia/Makassar', 'no', 'https://maxcdn.bootstrapcdn.com/bootswatch/3.3.7/cosmo/bootstrap.min.css');

-- --------------------------------------------------------

--
-- Table structure for table `tb_lhu`
--

CREATE TABLE `tb_lhu` (
  `no_lhu` varchar(30) NOT NULL,
  `no_sampel` varchar(20) NOT NULL,
  `nama_perusahaan` varchar(30) DEFAULT NULL,
  `tgl_selesai` date DEFAULT NULL,
  `file_lhu` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_sampel`
--

CREATE TABLE `tb_sampel` (
  `no_sampel` varchar(20) NOT NULL,
  `jenis_sampel` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `parameter_diuji` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `nama_perusahaan` varchar(35) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `nama_pengantar` varchar(35) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `alamat` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `no_handphone` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `tgl_masuk` date DEFAULT NULL,
  `tgl_selesai` date DEFAULT NULL,
  `no_lhu` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `keterangan` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_sampel`
--

INSERT INTO `tb_sampel` (`no_sampel`, `jenis_sampel`, `parameter_diuji`, `nama_perusahaan`, `nama_pengantar`, `alamat`, `no_handphone`, `tgl_masuk`, `tgl_selesai`, `no_lhu`, `keterangan`) VALUES
('AL.23.003.R.P', 'Air Limbah', 'TSS, PH, BOD, COD, ML, AMONIAK', 'SILOAM HOSPITALS', 'ANGGA A. PRATAMA', 'Jl. RTA . MILONO P.Raya', '081228381547', '2024-01-16', '0000-00-00', 'Pilih No LHU', 'Belum Selesai'),
('AL.23.004.R.P', 'Air Limbah', 'TSS, COD, ML, BOD, PH, AMONIAK', 'NASCAR FAMILY HOTEL', 'AGUS SISWANTO', 'Jl. Nyai Udang, Seth Adji No.0', '085249124444', '2024-01-10', '0000-00-00', 'Pilih No LHU', 'Belum Selesai'),
('Ap.23.002.R.P', 'Air Permukaan', 'Kekeruhan, COD, BOD, PH, Amonia', 'PT. TRISULA KENCANA SAKTI', 'Tondi', 'Jl. Barito Selatan', '081297153052', '2024-01-05', '0000-00-00', 'Pilih No LHU', 'Belum Selesai'),
('AP23.001.R.P', 'Air Permukaan', 'Kekeruhan, COD, BOD, PH, Amonia', 'PT. TRISULA KENCANA SAKTI', 'Tondi', 'Jl. Barito Selatan', '081297153052', '2024-01-05', '0000-00-00', 'Pilih No LHU', 'Belum Selesai');

-- --------------------------------------------------------

--
-- Table structure for table `tokens`
--

CREATE TABLE `tokens` (
  `id` int NOT NULL,
  `token` varchar(255) NOT NULL,
  `user_id` int NOT NULL,
  `created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `email` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `role` varchar(10) NOT NULL,
  `password` text NOT NULL,
  `last_login` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `banned_users` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `first_name`, `last_name`, `role`, `password`, `last_login`, `status`, `banned_users`) VALUES
(1, 'admin@gmail.com', 'Admin', 'Admin', '1', 'sha256:1000:UJxHaaFpM44Bj1ka7U58GiSHUx3zRWid:Hq86/PHYj0utJLz2ciHzSehsidHAZX+A', '2024-01-12 02:25:31 PM', 'approved', 'unban'),
(4, 'putranugraha', 'putra', 'nugraha', '2', 'sha256:1000:f2YrYnpBDWGi11Pon5nJNAyc0tgsZlRT:ewjJJ4LfVIXGwd6d1xL97buHPKWEXpQb', '2024-01-12 01:43:37 PM', 'approved', 'unban');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_lhu`
--
ALTER TABLE `tb_lhu`
  ADD PRIMARY KEY (`no_lhu`),
  ADD KEY `tb_lhu_ibfk_1` (`no_sampel`);

--
-- Indexes for table `tb_sampel`
--
ALTER TABLE `tb_sampel`
  ADD PRIMARY KEY (`no_sampel`);

--
-- Indexes for table `tokens`
--
ALTER TABLE `tokens`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tokens`
--
ALTER TABLE `tokens`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_lhu`
--
ALTER TABLE `tb_lhu`
  ADD CONSTRAINT `tb_lhu_ibfk_1` FOREIGN KEY (`no_sampel`) REFERENCES `tb_sampel` (`no_sampel`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
