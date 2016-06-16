-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 16, 2016 at 02:27 PM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `denbeerp`
--

-- --------------------------------------------------------

--
-- Table structure for table `cuti`
--

CREATE TABLE `cuti` (
  `nik` varchar(6) DEFAULT NULL,
  `tanggal_awal` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `nik` int(6) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `password` varchar(12) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `tempat_lahir` varchar(20) NOT NULL,
  `no_identitas` varchar(20) NOT NULL,
  `jenis_kelamin` char(1) NOT NULL,
  `email` varchar(50) NOT NULL,
  `status_pernikahan` varchar(50) NOT NULL,
  `tanggal_masuk` date NOT NULL,
  `file_ktp` varchar(255) NOT NULL,
  `file_npwp` varchar(255) NOT NULL,
  `file_bpjs` varchar(255) NOT NULL,
  `file_cv` varchar(255) NOT NULL,
  `file_ijazah` varchar(255) NOT NULL,
  `file_transkrip` varchar(255) NOT NULL,
  `status_karyawan` varchar(50) NOT NULL,
  `sisa_cuti` int(11) NOT NULL,
  `jabatan` varchar(20) NOT NULL,
  `nominal_gaji` int(11) NOT NULL,
  `no_lokasi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `rekening_karyawan`
--

CREATE TABLE `rekening_karyawan` (
  `nik` varchar(6) DEFAULT NULL,
  `no_rek` int(11) DEFAULT NULL,
  `nama_bank` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `surat_peringatan`
--

CREATE TABLE `surat_peringatan` (
  `nik` varchar(6) DEFAULT NULL,
  `nomor_surat` varchar(20) DEFAULT NULL,
  `keterangan_surat` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `training_karyawan`
--

CREATE TABLE `training_karyawan` (
  `nik` varchar(6) DEFAULT NULL,
  `nama_training` varchar(20) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `penyelenggara` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `update_karyawan`
--

CREATE TABLE `update_karyawan` (
  `nik` varchar(6) DEFAULT NULL,
  `tanggal_update` date DEFAULT NULL,
  `tipe_update` varchar(50) DEFAULT NULL,
  `keterangan` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`nik`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
