-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 20, 2023 at 03:16 PM
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
-- Database: `student_portal`
--

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE `dosen` (
  `id_dosen` int NOT NULL,
  `nama_dosen` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `soft_delete` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`id_dosen`, `nama_dosen`, `soft_delete`) VALUES
(1, 'lorem', 0),
(2, 'ipsum', 0),
(3, 'Dolors', 0),
(4, 'soft delete', 1);

-- --------------------------------------------------------

--
-- Table structure for table `informasi_perkuliahan`
--

CREATE TABLE `informasi_perkuliahan` (
  `id_informasi` int NOT NULL,
  `judul` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `isiPengumuman` varchar(255) NOT NULL,
  `informasi_delete` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `informasi_perkuliahan`
--

INSERT INTO `informasi_perkuliahan` (`id_informasi`, `judul`, `tanggal`, `isiPengumuman`, `informasi_delete`) VALUES
(1, 'dipindahh', '2023-06-07', 'lalalala', 0),
(2, 'Berisi', '2023-06-06', 'Bahkan', 1);

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
  `lokasi` varchar(255) NOT NULL,
  `periode_akademik` varchar(255) NOT NULL,
  `jadwal_delete` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`id_jadwal`, `fk_matakuliah`, `fk_dosen`, `shift_kelas`, `hari`, `jam`, `lokasi`, `periode_akademik`, `jadwal_delete`) VALUES
(1, 1, 1, 'A1', 'senin', '11:11:11', 'J301', 'Genap 2022', 0),
(2, 2, 1, 'B3', 'Senin', '19:00:00', 'Bandung', 'Ganjil 2023', 1);

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
  `username` varchar(255) NOT NULL,
  `superuser` int NOT NULL DEFAULT '0',
  `mahasiswa_delete` int NOT NULL DEFAULT '0',
  `photo` varchar(200) NOT NULL DEFAULT 'default.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`id_mahasiswa`, `nama`, `role`, `ipk`, `sks_lulus`, `password`, `username`, `superuser`, `mahasiswa_delete`, `photo`) VALUES
(1, 'Doe', 'A1', 4, 144, '$2y$10$6Td36/72GdlKKOhBkjJkLOaSxO1dxlZ/YkePR70Nz2POML4Oon.na', 'doe', 0, 0, 'default.png'),
(2, 'john', 'A2', 2, 22, '$2y$10$4A2Z5yV4ij8iovUYOVY12.vNj/BSBRjvI/IejhQyAeFJ0uoCs5lfy', 'john', 0, 0, 'default.png'),
(3, 'admin', 'admin', 5, 999, '$2y$10$.dd129YzHQyeBnVeKGCJKuL4v.trqTI6HBBgM0G5LfaFnwRRM47sa', 'admin', 1, 0, 'man.png'),
(5, 'h', 'h', 1, 1, '$2y$10$jZFzc5W2gdyQyf9024bmmuQPRJZU5JNgG3T1PPqbU2KrwUo6fhG9q', 's', 0, 1, 'default.png'),
(6, 'Kuro Kazuki', 'A1', 3, 144, '$2y$10$AqHQXCBnxxNrW.67ITK4ouiC5u/jFLDegrLZrVtlxJt35FDEm6lkW', 'kuro', 0, 0, 'user_(2)2.png');

-- --------------------------------------------------------

--
-- Table structure for table `matakuliah`
--

CREATE TABLE `matakuliah` (
  `id_matakuliah` int NOT NULL,
  `nama_kuliah` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `sks` int NOT NULL,
  `fk_dosen` int NOT NULL DEFAULT '0',
  `matakuliah_delete` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `matakuliah`
--

INSERT INTO `matakuliah` (`id_matakuliah`, `nama_kuliah`, `sks`, `fk_dosen`, `matakuliah_delete`) VALUES
(1, 'pbo', 18, 1, 0),
(2, 'strukdat', 6, 2, 0),
(3, 'Jaringan Komedi', 6, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_matakuliah`
--

CREATE TABLE `transaksi_matakuliah` (
  `id_transaksi` int NOT NULL,
  `fk_mahasiswa` int NOT NULL,
  `fk_jadwal` int NOT NULL,
  `transaksi_delete` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `transaksi_matakuliah`
--

INSERT INTO `transaksi_matakuliah` (`id_transaksi`, `fk_mahasiswa`, `fk_jadwal`, `transaksi_delete`) VALUES
(1, 1, 1, 0),
(2, 2, 0, 0),
(5, 0, 0, 0),
(6, 2, 0, 0),
(7, 0, 0, 0),
(8, 2, 0, 0),
(9, 0, 0, 0),
(10, 2, 0, 0),
(11, 0, 0, 0),
(12, 1, 0, 0),
(13, 1, 0, 0),
(14, 2, 0, 0),
(15, 1, 0, 0),
(16, 3, 0, 0),
(17, 1, 0, 0),
(18, 2, 0, 0),
(19, 2, 0, 0),
(20, 2, 1, 1);

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
  MODIFY `id_dosen` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `informasi_perkuliahan`
--
ALTER TABLE `informasi_perkuliahan`
  MODIFY `id_informasi` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id_jadwal` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id_mahasiswa` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `matakuliah`
--
ALTER TABLE `matakuliah`
  MODIFY `id_matakuliah` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `transaksi_matakuliah`
--
ALTER TABLE `transaksi_matakuliah`
  MODIFY `id_transaksi` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
