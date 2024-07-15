-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 15, 2024 at 05:13 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpus`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(1) NOT NULL,
  `nama_admin` varchar(255) NOT NULL,
  `password` varchar(25) NOT NULL,
  `kode_admin` varchar(25) NOT NULL,
  `no_tlp` varchar(14) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `nama_admin`, `password`, `kode_admin`, `no_tlp`) VALUES
(1, 'Admin Kominfo', '123', 'admin1', '085729550111'),
(2, 'dika', '123', 'admin2', '085729550222'),
(3, 'cahirul iman kanaeru', '123', 'admin3', '085729550333'),
(4, 'rehan wangsaf', '123', 'admin4', '085729550444'),
(5, 'al', '123', 'admin5', '085729550555'),
(6, 'nanda', '123', 'admin6', '086729550666'),
(7, 'ellie', '123', 'admin7', '085729550777'),
(8, 'arin', '123', 'admin8', '085729550888'),
(9, 'nindi', '123', 'admin9', '085729550999');

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `id` int(11) NOT NULL,
  `id_buku` varchar(50) NOT NULL,
  `kode_buku` varchar(50) NOT NULL,
  `nama_buku` varchar(255) NOT NULL,
  `pelajaran` varchar(100) NOT NULL,
  `kelas` varchar(10) NOT NULL,
  `penerbit` varchar(255) NOT NULL,
  `kurikulum` varchar(50) NOT NULL,
  `penulis` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id`, `id_buku`, `kode_buku`, `nama_buku`, `pelajaran`, `kelas`, `penerbit`, `kurikulum`, `penulis`) VALUES
(8, 'Book001', 'B001', 'Mewing', 'Sigma', 'X', 'Erlangga', 'K13', 'Bambang'),
(10, 'Book003', 'B003', 'Belajar memasak', 'Tataboga', 'X', 'Erlangga', 'K13', 'Dika');

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id` int(2) NOT NULL,
  `kode_peminjaman` varchar(50) NOT NULL,
  `nama_peminjam` varchar(255) NOT NULL,
  `kelas` varchar(10) NOT NULL,
  `tanggal_pinjam` date NOT NULL,
  `tanggal_kembali` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `peminjaman`
--

INSERT INTO `peminjaman` (`id`, `kode_peminjaman`, `nama_peminjam`, `kelas`, `tanggal_pinjam`, `tanggal_kembali`) VALUES
(9, 'P001', 'Dika', 'X', '2024-07-08', '2024-07-15'),
(12, 'P003', 'Lia', 'X', '2024-07-10', '2024-07-10');

-- --------------------------------------------------------

--
-- Table structure for table `pengembalian`
--

CREATE TABLE `pengembalian` (
  `id` int(2) NOT NULL,
  `kode_peminjaman` varchar(50) NOT NULL,
  `kode_pengembalian` varchar(50) NOT NULL,
  `nama_pinjam` varchar(255) NOT NULL,
  `kelas` varchar(10) NOT NULL,
  `tanggal_pinjam` date NOT NULL,
  `rencana_kembali` date NOT NULL,
  `hari_pengembalian` date NOT NULL,
  `denda` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pengembalian`
--

INSERT INTO `pengembalian` (`id`, `kode_peminjaman`, `kode_pengembalian`, `nama_pinjam`, `kelas`, `tanggal_pinjam`, `rencana_kembali`, `hari_pengembalian`, `denda`) VALUES
(12, 'P001', 'PB001', 'Dika', 'X', '2024-07-08', '2024-07-15', '0000-00-00', 0.00),
(15, 'P003', 'PB003', 'Lia', 'X', '2024-07-10', '2024-07-10', '2024-07-10', 0.00);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kode_admin` (`kode_admin`);

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kode_buku` (`kode_buku`),
  ADD UNIQUE KEY `id_buku` (`id_buku`);

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kode_peminjaman` (`kode_peminjaman`),
  ADD UNIQUE KEY `nama_peminjam` (`nama_peminjam`);

--
-- Indexes for table `pengembalian`
--
ALTER TABLE `pengembalian`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kode_peminjaman` (`kode_peminjaman`),
  ADD UNIQUE KEY `kode_pengembalian` (`kode_pengembalian`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `pengembalian`
--
ALTER TABLE `pengembalian`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
