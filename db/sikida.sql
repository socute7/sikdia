-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 23, 2024 at 06:22 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sikida`
--

-- --------------------------------------------------------

--
-- Table structure for table `anggota`
--

CREATE TABLE `anggota` (
  `id_anggota` varchar(40) NOT NULL,
  `nama_lengkap` varchar(50) DEFAULT NULL,
  `jabatan` varchar(255) DEFAULT NULL,
  `penggunaan` varchar(255) DEFAULT NULL,
  `jenis` varchar(255) DEFAULT NULL,
  `tujuan` varchar(255) DEFAULT NULL,
  `notelp` varchar(13) DEFAULT NULL,
  `divisi` varchar(255) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `foto` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `anggota`
--

INSERT INTO `anggota` (`id_anggota`, `nama_lengkap`, `jabatan`, `penggunaan`, `jenis`, `tujuan`, `notelp`, `divisi`, `alamat`, `foto`) VALUES
('A0001', 'Diaz Artha', 'Direktur', '23-25 Febuari', 'TOYOTA INOVA 2.4 GAT', 'Luar Kota', '085234578988', 'Umum', 'Semarang', 'man.png'),
('A0002', 'Aji Darma', 'Direksi', '22-24 Febuari', 'Avanza', 'Luar Kota', '089839876489', 'Umum', 'Pati', 'man.png');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` varchar(20) DEFAULT NULL,
  `kategori` varchar(255) DEFAULT NULL,
  `keterangan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `kategori`, `keterangan`) VALUES
('K0001', 'Lambo', ''),
('K0002', 'Ayla', ''),
('K0004', 'Daihatsu', ''),
('K0005', 'ALAT ANGKUTAN MULTI PURPOSE VEHICLE (MVP)-[ ]', ''),
('K0006', 'ALAT ANGKUTAN MINI BUS (PENUMPANG 14 ORANG KEBAWAH)-[ ]', '');

-- --------------------------------------------------------

--
-- Table structure for table `keluar`
--

CREATE TABLE `keluar` (
  `id_keluar` varchar(55) NOT NULL,
  `id_user` varchar(50) DEFAULT NULL,
  `id_mobil` varchar(20) NOT NULL,
  `nopol` varchar(20) NOT NULL,
  `tujuan` varchar(50) DEFAULT NULL,
  `tanggal_keluar` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `keluar`
--

INSERT INTO `keluar` (`id_keluar`, `id_user`, `id_mobil`, `nopol`, `tujuan`, `tanggal_keluar`) VALUES
('KEL0002', 'U0004', '11.01.33.74.040101.0', 'H 1805 XG', 'Service', '2024-01-23');

-- --------------------------------------------------------

--
-- Table structure for table `mobil`
--

CREATE TABLE `mobil` (
  `id_mobil` varchar(255) NOT NULL,
  `id_kategori` varchar(20) DEFAULT NULL,
  `reg` varchar(11) DEFAULT NULL,
  `merk` varchar(60) DEFAULT NULL,
  `ukuran` varchar(255) DEFAULT NULL,
  `bahan` varchar(255) DEFAULT NULL,
  `rangka` varchar(255) DEFAULT NULL,
  `mesin` varchar(255) DEFAULT NULL,
  `nopol` varchar(50) DEFAULT NULL,
  `tahun` int(5) DEFAULT NULL,
  `bpkb` varchar(225) DEFAULT NULL,
  `asal` varchar(255) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `foto` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mobil`
--

INSERT INTO `mobil` (`id_mobil`, `id_kategori`, `reg`, `merk`, `ukuran`, `bahan`, `rangka`, `mesin`, `nopol`, `tahun`, `bpkb`, `asal`, `harga`, `keterangan`, `foto`) VALUES
('11.01.33.74.040101.00003.00200.2016-1.3.2.02.01.02.003', 'K0006', '000002', 'TOYOTA INOVA 2.4 GAT', '2393 CC', 'BESI', 'MHFJB8EM3G1011723', '2GDC127923', 'H 1805 XG', 2016, 'M13933498', 'MUTASISKPD', 354068500, '', '6.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id_pinjam` varchar(10) DEFAULT NULL,
  `tgl_pinjam` date DEFAULT NULL,
  `id_anggota` varchar(5) DEFAULT NULL,
  `tempo` date DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `ket` text DEFAULT NULL,
  `usr_input` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `peminjaman`
--

INSERT INTO `peminjaman` (`id_pinjam`, `tgl_pinjam`, `id_anggota`, `tempo`, `status`, `ket`, `usr_input`) VALUES
('PJM0001', '2024-01-22', 'A0002', '2024-01-25', 'Pinjam', '', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `pengadaan`
--

CREATE TABLE `pengadaan` (
  `id_pengadaan` varchar(10) DEFAULT NULL,
  `id_mobil` varchar(60) DEFAULT NULL,
  `asal_mobil` varchar(60) DEFAULT NULL,
  `jml` int(4) DEFAULT NULL,
  `ket` text DEFAULT NULL,
  `tgl` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pengadaan`
--

INSERT INTO `pengadaan` (`id_pengadaan`, `id_mobil`, `asal_mobil`, `jml`, `ket`, `tgl`) VALUES
('PNG0001', 'B0005', 'semarang', 20, '', '2024-01-08'),
('PNG0002', 'B0004', 'Jakarta', 10, '', '2024-01-08');

-- --------------------------------------------------------

--
-- Table structure for table `pengembalian`
--

CREATE TABLE `pengembalian` (
  `id_kembali` int(10) NOT NULL,
  `tgl_kembali` varchar(20) DEFAULT NULL,
  `id_pinjam` varchar(20) DEFAULT NULL,
  `terlambat` varchar(15) DEFAULT NULL,
  `denda` varchar(15) DEFAULT NULL,
  `id_admin` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id_user` varchar(20) NOT NULL,
  `nama` varchar(60) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `pass` varchar(30) DEFAULT NULL,
  `notelp` varchar(13) DEFAULT NULL,
  `status` enum('Aktif','Tidak Aktif') DEFAULT NULL,
  `level` enum('Petugas','Kepala','Administrasi') DEFAULT NULL,
  `foto` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id_user`, `nama`, `email`, `pass`, `notelp`, `status`, `level`, `foto`) VALUES
('U0001', 'Admin', 'admin@gmail.com', 'admin123', '087892878222', 'Aktif', 'Administrasi', 'user.png'),
('U0004', 'Aji Darma Saputra', 'aji@gmail.com', 'admin123', '087817379229', 'Aktif', 'Kepala', 'aji.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `p_mobil`
--

CREATE TABLE `p_mobil` (
  `id_pmobil` int(5) NOT NULL,
  `id_pinjam` varchar(50) DEFAULT NULL,
  `id_mobil` varchar(50) DEFAULT NULL,
  `qty` varchar(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `p_mobil`
--

INSERT INTO `p_mobil` (`id_pmobil`, `id_pinjam`, `id_mobil`, `qty`) VALUES
(61, 'PJM0001', '11.01.33.74.040101.00003.00200.2016-1.3.2.02.01.02', 'und');

-- --------------------------------------------------------

--
-- Table structure for table `rusak`
--

CREATE TABLE `rusak` (
  `id_rusak` varchar(50) NOT NULL,
  `id_user` varchar(50) NOT NULL,
  `id_mobil` varchar(50) NOT NULL,
  `tanggal_rusak` date NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rusak`
--

INSERT INTO `rusak` (`id_rusak`, `id_user`, `id_mobil`, `tanggal_rusak`, `status`) VALUES
('RUS0001', 'U0004', 'B0005', '2023-12-26', 1),
('RUS0006', 'U0004', 'B0005', '2024-01-08', 1),
('RUS0007', 'U0004', '11.01.33.74.040101.00003.00200.2016-1.3.2.02.01.02', '2024-01-22', 1),
('RUS0008', 'U0004', '11.01.33.74.040101.00003.00200.2016-1.3.2.02.01.02', '2024-01-22', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`id_anggota`);

--
-- Indexes for table `keluar`
--
ALTER TABLE `keluar`
  ADD PRIMARY KEY (`id_keluar`);

--
-- Indexes for table `mobil`
--
ALTER TABLE `mobil`
  ADD PRIMARY KEY (`id_mobil`);

--
-- Indexes for table `pengembalian`
--
ALTER TABLE `pengembalian`
  ADD PRIMARY KEY (`id_kembali`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `p_mobil`
--
ALTER TABLE `p_mobil`
  ADD PRIMARY KEY (`id_pmobil`);

--
-- Indexes for table `rusak`
--
ALTER TABLE `rusak`
  ADD PRIMARY KEY (`id_rusak`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pengembalian`
--
ALTER TABLE `pengembalian`
  MODIFY `id_kembali` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `p_mobil`
--
ALTER TABLE `p_mobil`
  MODIFY `id_pmobil` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
