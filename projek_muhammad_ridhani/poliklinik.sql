-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 07, 2022 at 12:56 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `poliklinik`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id` varchar(50) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`id`, `username`, `password`) VALUES
('4a4b02a3-8713-11ec-96db-502f9b819e11', 'admin', '$2y$10$8NZiQ3PAfQZmHXVrEbRijuEiblh4NfAvv64l3gia0BnGeiXNkVaNi');

-- --------------------------------------------------------

--
-- Table structure for table `tb_dokter`
--

CREATE TABLE `tb_dokter` (
  `id_dokter` varchar(50) NOT NULL,
  `nik` bigint(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` text DEFAULT NULL,
  `jenis_kelamin` varchar(20) NOT NULL,
  `password` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_dokter`
--

INSERT INTO `tb_dokter` (`id_dokter`, `nik`, `nama`, `alamat`, `jenis_kelamin`, `password`) VALUES
('5de29160-871a-11ec-96db-502f9b819e11', 1610131310013, 'Dr. Masmudin', 'Jalan Istirahat RT.01', 'Laki-laki', '$2y$10$sRPtPa/BsZVOowR6nbQxAuHIWBHX5NtuaewRBXxoBPyZs319V5Agq');

-- --------------------------------------------------------

--
-- Table structure for table `tb_obat`
--

CREATE TABLE `tb_obat` (
  `id_obat` varchar(50) NOT NULL,
  `nama_obat` varchar(250) NOT NULL,
  `keterangan` text NOT NULL,
  `harga` bigint(200) NOT NULL,
  `stok` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_obat`
--

INSERT INTO `tb_obat` (`id_obat`, `nama_obat`, `keterangan`, `harga`, `stok`) VALUES
('004b6701-6d8f-4fc1-ba6a-860170e956c9', 'Glucagon', 'Glukagon adalah hormon sintetis yang digunakan untuk mengatasi kadar gula darah yang sangat rendah pada penderita diabetes yang menggunakan insulin', 3000, 50),
('1b652f4e-1059-4553-942b-a895d1597320', 'Zanamivir', 'Obat antivirus yang digunakan untuk menangani dan mencegah infeksi virus influenza tipe A dan B.', 2000, 10),
('93fa3a8d-8770-11ec-96db-502f9b819e11', 'Paclitaxel', 'Obat untuk menangani beberapa jenis kanker, seperti kanker payudara, kanker pankreas, atau kanker paru-paru', 10000, 10),
('b2698d09-8770-11ec-96db-502f9b819e11', 'Panadol ', 'Obat untuk meredakan gejala dan keluhan, seperti demam, flu, sakit kepala, hidung tersumbat, batuk tidak berdahak, dan bersin-bersin', 1500, 100),
('dd1e34fd-8770-11ec-96db-502f9b819e11', 'Paramex', 'Obat yang bermanfaat untuk meredakan demam dan nyeri', 2500, 50);

-- --------------------------------------------------------

--
-- Table structure for table `tb_obat_rm`
--

CREATE TABLE `tb_obat_rm` (
  `id` int(50) NOT NULL,
  `id_rm` varchar(100) NOT NULL,
  `id_obat` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_obat_rm`
--

INSERT INTO `tb_obat_rm` (`id`, `id_rm`, `id_obat`) VALUES
(15, 'adfd168c-ef33-4585-9840-62864b70689a', '93fa3a8d-8770-11ec-96db-502f9b819e11'),
(16, 'adfd168c-ef33-4585-9840-62864b70689a', 'b2698d09-8770-11ec-96db-502f9b819e11'),
(17, 'b0035a4a-d63d-4dc0-b884-83b2f5a78551', '93fa3a8d-8770-11ec-96db-502f9b819e11'),
(18, 'bb53f89b-bc79-45fa-a69b-0d7ea901b07b', '93fa3a8d-8770-11ec-96db-502f9b819e11'),
(19, '643693b2-cafe-47ad-a249-75e32ef76b53', 'b2698d09-8770-11ec-96db-502f9b819e11');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pasein`
--

CREATE TABLE `tb_pasein` (
  `id_pasien` varchar(50) NOT NULL,
  `nik` bigint(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` text DEFAULT NULL,
  `jenis_kelamin` varchar(20) NOT NULL,
  `password` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pasein`
--

INSERT INTO `tb_pasein` (`id_pasien`, `nik`, `nama`, `alamat`, `jenis_kelamin`, `password`) VALUES
('0453fcef-871c-11ec-96db-502f9b819e11', 1610131310012, 'Zaki malik', NULL, 'Laki-laki', '$2y$10$sWhJ43zjec4oZBvBECjlbOFEXypomfJ2KiR0txVexrv9chIDMFjhG'),
('525ab035-82ad-41a6-bfe6-f0e59ae25468', 1610131310010, 'Laila', NULL, 'perempuan', '$2y$10$oRJagKr.F6gttgLCjGpqLeC7BAUdSWT7u7rWitiH.9MNfWM4noQa.'),
('655508e5-d669-4ede-a6bc-d24e4c3cdc47', 1610131310011, 'Malik', 'Jalan Kesatuan', 'Laki-laki', '$2y$10$iX2dgBa.RLhhMV0XsY7xqOH1YMQ.SO33qDqYQgNGnGJzMhzqlo2Ue'),
('683e4749-bef2-400b-b024-19e597f90d2b', 1610131310016, 'Zulfi Bahri', 'Jl kenangan ', 'Laki-laki', '$2y$10$4TXMvVbLPxAb3IFW5PNFROGX9FiSS588eh0Xl7xy5FKMn8FECFVAK');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pembayaran`
--

CREATE TABLE `tb_pembayaran` (
  `id` int(11) NOT NULL,
  `id_rm` varchar(250) NOT NULL,
  `harga` bigint(100) NOT NULL,
  `status` varchar(20) NOT NULL,
  `penbayaran` bigint(100) DEFAULT NULL,
  `kembalian` bigint(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pembayaran`
--

INSERT INTO `tb_pembayaran` (`id`, `id_rm`, `harga`, `status`, `penbayaran`, `kembalian`) VALUES
(2, 'adfd168c-ef33-4585-9840-62864b70689a', 11500, 'Belum dibayar', NULL, NULL),
(3, 'b0035a4a-d63d-4dc0-b884-83b2f5a78551', 10000, 'Belum dibayar', NULL, NULL),
(4, 'bb53f89b-bc79-45fa-a69b-0d7ea901b07b', 10000, 'Sudah Dibayar', 12000, 2000),
(5, '643693b2-cafe-47ad-a249-75e32ef76b53', 1500, 'Belum dibayar', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_rekammedis`
--

CREATE TABLE `tb_rekammedis` (
  `id_rm` varchar(100) NOT NULL,
  `id_pasien` varchar(100) NOT NULL,
  `id_dokter` varchar(100) NOT NULL,
  `keluhan` text NOT NULL,
  `diagnosa` varchar(250) NOT NULL,
  `tanggal` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_rekammedis`
--

INSERT INTO `tb_rekammedis` (`id_rm`, `id_pasien`, `id_dokter`, `keluhan`, `diagnosa`, `tanggal`) VALUES
('643693b2-cafe-47ad-a249-75e32ef76b53', '655508e5-d669-4ede-a6bc-d24e4c3cdc47', '5de29160-871a-11ec-96db-502f9b819e11', 'Flu', 'Flu', '2022-02-06'),
('adfd168c-ef33-4585-9840-62864b70689a', '683e4749-bef2-400b-b024-19e597f90d2b', '5de29160-871a-11ec-96db-502f9b819e11', 'Flu', 'Flu', '2022-02-06'),
('b0035a4a-d63d-4dc0-b884-83b2f5a78551', '525ab035-82ad-41a6-bfe6-f0e59ae25468', '5de29160-871a-11ec-96db-502f9b819e11', 'Meriam', 'Meriam', '2022-02-06'),
('bb53f89b-bc79-45fa-a69b-0d7ea901b07b', '525ab035-82ad-41a6-bfe6-f0e59ae25468', '5de29160-871a-11ec-96db-502f9b819e11', 'Sakit Gigi', 'Sakit Gigi', '2022-02-01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_dokter`
--
ALTER TABLE `tb_dokter`
  ADD PRIMARY KEY (`id_dokter`);

--
-- Indexes for table `tb_obat`
--
ALTER TABLE `tb_obat`
  ADD PRIMARY KEY (`id_obat`);

--
-- Indexes for table `tb_obat_rm`
--
ALTER TABLE `tb_obat_rm`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_obat` (`id_obat`),
  ADD KEY `tb_obat_rm_ibfk_1` (`id_rm`);

--
-- Indexes for table `tb_pasein`
--
ALTER TABLE `tb_pasein`
  ADD PRIMARY KEY (`id_pasien`);

--
-- Indexes for table `tb_pembayaran`
--
ALTER TABLE `tb_pembayaran`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_rm` (`id_rm`);

--
-- Indexes for table `tb_rekammedis`
--
ALTER TABLE `tb_rekammedis`
  ADD PRIMARY KEY (`id_rm`),
  ADD KEY `id_pasien` (`id_pasien`),
  ADD KEY `id_dokter` (`id_dokter`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_obat_rm`
--
ALTER TABLE `tb_obat_rm`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tb_pembayaran`
--
ALTER TABLE `tb_pembayaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_obat_rm`
--
ALTER TABLE `tb_obat_rm`
  ADD CONSTRAINT `tb_obat_rm_ibfk_1` FOREIGN KEY (`id_rm`) REFERENCES `tb_rekammedis` (`id_rm`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_obat_rm_ibfk_2` FOREIGN KEY (`id_obat`) REFERENCES `tb_obat` (`id_obat`);

--
-- Constraints for table `tb_pembayaran`
--
ALTER TABLE `tb_pembayaran`
  ADD CONSTRAINT `tb_pembayaran_ibfk_1` FOREIGN KEY (`id_rm`) REFERENCES `tb_rekammedis` (`id_rm`);

--
-- Constraints for table `tb_rekammedis`
--
ALTER TABLE `tb_rekammedis`
  ADD CONSTRAINT `tb_rekammedis_ibfk_1` FOREIGN KEY (`id_pasien`) REFERENCES `tb_pasein` (`id_pasien`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_rekammedis_ibfk_2` FOREIGN KEY (`id_dokter`) REFERENCES `tb_dokter` (`id_dokter`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
