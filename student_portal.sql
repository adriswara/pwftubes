-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 11, 2023 at 05:04 AM
-- Server version: 8.0.30
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `student_portal`
--

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE `dosen` (
  `id_dosen` int NOT NULL,
  `nama_dosen` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`id_dosen`, `nama_dosen`) VALUES
(1, 'lorem'),
(2, 'ipsum'),
(3, 'Dolors');

-- --------------------------------------------------------

--
-- Table structure for table `informasi_perkuliahan`
--

CREATE TABLE `informasi_perkuliahan` (
  `id_informasi` int NOT NULL,
  `judul` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `isiPengumuman` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `informasi_perkuliahan`
--

INSERT INTO `informasi_perkuliahan` (`id_informasi`, `judul`, `tanggal`, `isiPengumuman`) VALUES
(1, 'dipindahh', '2023-06-07', 'lalalala');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `id_jadwal` int NOT NULL,
  `fk_matakuliah` int NOT NULL,
  `fk_dosen` int NOT NULL,
  `shift_kelas` varchar(255) NOT NULL,
  `hari` varchar(255) NOT NULL,
  `jam` time NOT NULL,
  `lokasi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`id_jadwal`, `fk_matakuliah`, `fk_dosen`, `shift_kelas`, `hari`, `jam`, `lokasi`) VALUES
(1, 1, 1, 'A1', 'senin', '11:11:11', 'J301');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id_mahasiswa` int NOT NULL,
  `nama` varchar(255) NOT NULL,
  `role` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `ipk` double NOT NULL,
  `sks_lulus` int NOT NULL,
  `password` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`id_mahasiswa`, `nama`, `role`, `ipk`, `sks_lulus`, `password`, `username`) VALUES
(1, 'Doe', 'A1', 4, 144, '$2y$10$6Td36/72GdlKKOhBkjJkLOaSxO1dxlZ/YkePR70Nz2POML4Oon.na', 'doe'),
(2, 'john', '4', 2, 22, '$2y$10$4A2Z5yV4ij8iovUYOVY12.vNj/BSBRjvI/IejhQyAeFJ0uoCs5lfy', 'john'),
(3, 'admin', 'admin', 5, 999, '$2y$10$.dd129YzHQyeBnVeKGCJKuL4v.trqTI6HBBgM0G5LfaFnwRRM47sa', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `matakuliah`
--

CREATE TABLE `matakuliah` (
  `id_matakuliah` int NOT NULL,
  `nama_kuliah` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `sks` int NOT NULL,
  `fk_dosen` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `matakuliah`
--

INSERT INTO `matakuliah` (`id_matakuliah`, `nama_kuliah`, `sks`, `fk_dosen`) VALUES
(1, 'pbo', 18, 1),
(2, 'strukdat', 6, 2);

-- --------------------------------------------------------

--
-- Table structure for table `pengumuman`
--

CREATE TABLE `pengumuman` (
  `id_pengumuman` int NOT NULL,
  `judul` varchar(200) NOT NULL,
  `tanggal` date NOT NULL,
  `isi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_matakuliah`
--

CREATE TABLE `transaksi_matakuliah` (
  `id_transaksi` int NOT NULL,
  `fk_mahasiswa` int NOT NULL,
  `fk_perkuliahan` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `transaksi_matakuliah`
--

INSERT INTO `transaksi_matakuliah` (`id_transaksi`, `fk_mahasiswa`, `fk_perkuliahan`) VALUES
(1, 1, 1),
(2, 2, 1),
(5, 0, 0),
(6, 2, 0),
(7, 0, 0),
(8, 2, 0),
(9, 0, 0),
(10, 2, 0),
(11, 0, 0),
(12, 1, 2),
(13, 1, 2),
(14, 2, 2),
(15, 1, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`id_dosen`);

--
-- Indexes for table `informasi_perkuliahan`
--
ALTER TABLE `informasi_perkuliahan`
  ADD PRIMARY KEY (`id_informasi`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id_jadwal`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id_mahasiswa`);

--
-- Indexes for table `matakuliah`
--
ALTER TABLE `matakuliah`
  ADD PRIMARY KEY (`id_matakuliah`);

--
-- Indexes for table `pengumuman`
--
ALTER TABLE `pengumuman`
  ADD PRIMARY KEY (`id_pengumuman`);

--
-- Indexes for table `transaksi_matakuliah`
--
ALTER TABLE `transaksi_matakuliah`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dosen`
--
ALTER TABLE `dosen`
  MODIFY `id_dosen` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `informasi_perkuliahan`
--
ALTER TABLE `informasi_perkuliahan`
  MODIFY `id_informasi` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id_jadwal` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id_mahasiswa` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `matakuliah`
--
ALTER TABLE `matakuliah`
  MODIFY `id_matakuliah` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pengumuman`
--
ALTER TABLE `pengumuman`
  MODIFY `id_pengumuman` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transaksi_matakuliah`
--
ALTER TABLE `transaksi_matakuliah`
  MODIFY `id_transaksi` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
