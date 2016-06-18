-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 18, 2016 at 12:17 PM
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
-- Table structure for table `angsuran`
--

CREATE TABLE `angsuran` (
  `no_angsuran` int(11) NOT NULL,
  `no_penyetujuan` int(11) DEFAULT NULL,
  `nik` varchar(6) DEFAULT NULL,
  `jumlah_angsuran` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `asset`
--

CREATE TABLE `asset` (
  `no_asset` int(11) NOT NULL,
  `nik_pic` varchar(6) DEFAULT NULL,
  `nama_asset` varchar(50) NOT NULL,
  `nilai_asset` int(11) DEFAULT NULL,
  `tanggal_pembelian` date NOT NULL,
  `no_lokasi` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `contact_person`
--

CREATE TABLE `contact_person` (
  `no_cp` int(11) NOT NULL,
  `nama_lengkap` varchar(50) DEFAULT NULL,
  `jabatan` varchar(30) DEFAULT NULL,
  `no_hp` varchar(30) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `media_sosial` varchar(30) DEFAULT NULL,
  `tipe_cp` tinyint(1) DEFAULT NULL,
  `no_pelanggan` int(11) DEFAULT NULL,
  `no_supplier` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cuti`
--

CREATE TABLE `cuti` (
  `id_cuti` bigint(11) UNSIGNED NOT NULL,
  `nik` varchar(6) DEFAULT NULL,
  `tanggal_awal` date DEFAULT NULL,
  `tanggal_akhir` date DEFAULT NULL,
  `nik_penyetuju` varchar(6) DEFAULT NULL,
  `keterangan` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `grup_pelanggan`
--

CREATE TABLE `grup_pelanggan` (
  `no_grup` int(11) NOT NULL,
  `nama_grup` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `hutang`
--

CREATE TABLE `hutang` (
  `no_penyetujuan` int(11) NOT NULL,
  `nik` varchar(6) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `tanggal_pengajuan` date DEFAULT NULL,
  `jaminan` varchar(50) DEFAULT NULL,
  `periode` int(11) DEFAULT NULL,
  `file_surat_perjanjian` varchar(50) DEFAULT NULL,
  `sisa_pokok` int(11) DEFAULT NULL,
  `sisa_bunga` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `inventaris`
--

CREATE TABLE `inventaris` (
  `no_inventaris` int(11) NOT NULL,
  `nama_inventaris` varchar(50) DEFAULT NULL,
  `spesifikasi` varchar(50) DEFAULT NULL,
  `part_number_1` int(11) DEFAULT NULL,
  `part_number_2` int(11) DEFAULT NULL,
  `tipe` varchar(50) DEFAULT NULL,
  `kuantitas` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `nik` varchar(6) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
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
  `gaji` int(11) NOT NULL,
  `no_lokasi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `lokasi`
--

CREATE TABLE `lokasi` (
  `no_lokasi` int(11) NOT NULL,
  `nama_lokasi` varchar(50) DEFAULT NULL,
  `tipe_lokasi` varchar(20) DEFAULT NULL,
  `alamat` varchar(50) DEFAULT NULL,
  `negara` varchar(20) DEFAULT NULL,
  `no_pelanggan` int(11) DEFAULT NULL,
  `no_supplier` int(11) DEFAULT NULL,
  `divisi` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `no_pelanggan` int(11) NOT NULL,
  `nama_pelanggan` varchar(50) DEFAULT NULL,
  `no_grup` int(11) DEFAULT NULL,
  `no_tlp` varchar(30) DEFAULT NULL,
  `fax` varchar(30) DEFAULT NULL,
  `website` varchar(30) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `media_sosial` varchar(30) DEFAULT NULL,
  `npwp` int(11) DEFAULT NULL,
  `file_npwp` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `perjanjian`
--

CREATE TABLE `perjanjian` (
  `no_perjanjian` int(11) NOT NULL,
  `no_pelanggan` int(11) DEFAULT NULL,
  `nama_perjanjian` varchar(50) DEFAULT NULL,
  `tanggal_perjanjian` date DEFAULT NULL,
  `periode` int(11) DEFAULT NULL,
  `nik_penandatangan_denbe` varchar(6) DEFAULT NULL,
  `penandatangan_pelanggan` varchar(50) DEFAULT NULL,
  `keterangan` varchar(50) DEFAULT NULL,
  `file_perjanjian` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `po_customer`
--

CREATE TABLE `po_customer` (
  `no_po` int(11) NOT NULL,
  `no_customer` int(11) DEFAULT NULL,
  `no_quotation` int(11) DEFAULT NULL,
  `file_po` varchar(50) DEFAULT NULL,
  `nilai_po` int(11) DEFAULT NULL,
  `tanggal_keluaran` date DEFAULT NULL,
  `tanggal_selesai` date DEFAULT NULL,
  `nik_pm_denbe` varchar(6) DEFAULT NULL,
  `no_perjanjian` int(11) DEFAULT NULL,
  `status` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `po_supplier`
--

CREATE TABLE `po_supplier` (
  `no_po` int(11) NOT NULL,
  `no_supplier` int(11) DEFAULT NULL,
  `scan_po` varchar(50) DEFAULT NULL,
  `nilai_po` int(11) DEFAULT NULL,
  `tanggal_keluaran` date DEFAULT NULL,
  `tanggal_pengiriman` date DEFAULT NULL,
  `nik_pm_denbe` varchar(6) DEFAULT NULL,
  `no_perjanjian` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `quotation`
--

CREATE TABLE `quotation` (
  `no_quotation` int(11) NOT NULL,
  `no_pelanggan` int(11) DEFAULT NULL,
  `file_quotation` varchar(50) DEFAULT NULL,
  `tanggal_keluaran` date DEFAULT NULL,
  `tanggal_selesai` date DEFAULT NULL,
  `nik_pm_denbe` varchar(6) DEFAULT NULL,
  `nilai_quotation` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `rekening`
--

CREATE TABLE `rekening` (
  `id_rekening` int(11) NOT NULL,
  `nik` varchar(6) NOT NULL,
  `no_rek` int(11) NOT NULL,
  `nama_bank` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `no_request` int(11) NOT NULL,
  `nik` varchar(6) DEFAULT NULL,
  `keperluan` varchar(50) DEFAULT NULL,
  `tanggal_dan_jam` datetime NOT NULL,
  `total_nilai` int(11) DEFAULT NULL,
  `tanggal_ekspektasi` date DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `no_pelanggan` int(11) DEFAULT NULL,
  `tanggal_pembelian` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `request_asset`
--

CREATE TABLE `request_asset` (
  `id_request_asset` int(11) NOT NULL,
  `no_request` int(11) NOT NULL,
  `no_asset` int(11) NOT NULL,
  `kuantitas` int(11) DEFAULT NULL,
  `harga_satuan` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `request_inventory`
--

CREATE TABLE `request_inventory` (
  `id_request_inventory` int(11) NOT NULL,
  `no_request` int(11) NOT NULL,
  `no_inventory` int(11) NOT NULL,
  `kuantitas` int(11) DEFAULT NULL,
  `harga_satuan` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `riwayat_supplier`
--

CREATE TABLE `riwayat_supplier` (
  `id_riwayat_supplier` int(11) NOT NULL,
  `no_po` int(11) NOT NULL,
  `no_supplier` int(11) NOT NULL,
  `tanggal_pembelian` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `stok`
--

CREATE TABLE `stok` (
  `id_stock` int(11) NOT NULL,
  `no_stok` int(11) NOT NULL,
  `lokasi` varchar(50) DEFAULT NULL,
  `tanggal_masuk` date DEFAULT NULL,
  `tanggal_keluar` date DEFAULT NULL,
  `kuantitas` int(11) DEFAULT NULL,
  `no_po_customer` int(11) DEFAULT NULL,
  `no_po_suppler` int(11) NOT NULL,
  `nik_pic_masuk` varchar(6) DEFAULT NULL,
  `nik_pic_keluar_1` varchar(6) DEFAULT NULL,
  `nik_pic_keluar_2` varchar(6) DEFAULT NULL,
  `approval` tinyint(1) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `stok_inventaris`
--

CREATE TABLE `stok_inventaris` (
  `id_stok_inventaris` int(11) NOT NULL,
  `no_stok` int(11) NOT NULL,
  `no_inventaris` int(11) NOT NULL,
  `kuantitas` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `no_supplier` int(11) NOT NULL,
  `nama_supplier` varchar(50) DEFAULT NULL,
  `no_tlp` varchar(30) DEFAULT NULL,
  `fax` varchar(30) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `media_sosial` varchar(50) DEFAULT NULL,
  `metode_pembayaran` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `surat_peringatan`
--

CREATE TABLE `surat_peringatan` (
  `nomor_surat` varchar(20) NOT NULL,
  `nik` varchar(6) DEFAULT NULL,
  `keterangan_surat` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `training`
--

CREATE TABLE `training` (
  `id_training` int(11) NOT NULL,
  `nik` varchar(6) DEFAULT NULL,
  `nama_training` varchar(20) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `penyelenggara` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `update_asset`
--

CREATE TABLE `update_asset` (
  `no_update` int(11) NOT NULL,
  `no_asset` int(11) DEFAULT NULL,
  `waktu_update` datetime DEFAULT NULL,
  `keterangan` varchar(50) DEFAULT NULL,
  `update_nilai` int(11) DEFAULT NULL,
  `update_lokasi` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `update_karyawan`
--

CREATE TABLE `update_karyawan` (
  `id_update_karyawan` int(11) NOT NULL,
  `nik` varchar(6) DEFAULT NULL,
  `waktu_dan_tanggal_update` datetime DEFAULT NULL,
  `tipe_update` varchar(50) DEFAULT NULL,
  `keterangan` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `angsuran`
--
ALTER TABLE `angsuran`
  ADD PRIMARY KEY (`no_angsuran`),
  ADD KEY `no_penyetujuan` (`no_penyetujuan`),
  ADD KEY `FK_angsuran_hutang_2` (`nik`);

--
-- Indexes for table `asset`
--
ALTER TABLE `asset`
  ADD PRIMARY KEY (`no_asset`),
  ADD KEY `nik_pic` (`nik_pic`),
  ADD KEY `no_lokasi` (`no_lokasi`);

--
-- Indexes for table `contact_person`
--
ALTER TABLE `contact_person`
  ADD PRIMARY KEY (`no_cp`),
  ADD KEY `no_pelanggan` (`no_pelanggan`),
  ADD KEY `no_supplier` (`no_supplier`);

--
-- Indexes for table `cuti`
--
ALTER TABLE `cuti`
  ADD PRIMARY KEY (`id_cuti`),
  ADD KEY `FK_cuti_karyawan` (`nik`),
  ADD KEY `FK_cuti_karyawan_2` (`nik_penyetuju`);

--
-- Indexes for table `grup_pelanggan`
--
ALTER TABLE `grup_pelanggan`
  ADD PRIMARY KEY (`no_grup`);

--
-- Indexes for table `hutang`
--
ALTER TABLE `hutang`
  ADD PRIMARY KEY (`no_penyetujuan`),
  ADD KEY `FK_hutang_karyawan` (`nik`);

--
-- Indexes for table `inventaris`
--
ALTER TABLE `inventaris`
  ADD PRIMARY KEY (`no_inventaris`),
  ADD UNIQUE KEY `nama_inventaris_spesifikasi_part_number_1_part_number_2_tipe` (`nama_inventaris`,`spesifikasi`,`part_number_1`,`part_number_2`,`tipe`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`nik`),
  ADD UNIQUE KEY `no_identitas` (`no_identitas`),
  ADD KEY `no_lokasi` (`no_lokasi`);

--
-- Indexes for table `lokasi`
--
ALTER TABLE `lokasi`
  ADD PRIMARY KEY (`no_lokasi`),
  ADD KEY `no_pelanggan` (`no_pelanggan`),
  ADD KEY `no_supplier` (`no_supplier`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`no_pelanggan`),
  ADD KEY `no_grup` (`no_grup`);

--
-- Indexes for table `perjanjian`
--
ALTER TABLE `perjanjian`
  ADD PRIMARY KEY (`no_perjanjian`),
  ADD KEY `no_pelanggan` (`no_pelanggan`),
  ADD KEY `nik_penanda_denbe` (`nik_penandatangan_denbe`);

--
-- Indexes for table `po_customer`
--
ALTER TABLE `po_customer`
  ADD PRIMARY KEY (`no_po`),
  ADD KEY `no_customer` (`no_customer`),
  ADD KEY `no_quotation` (`no_quotation`),
  ADD KEY `no_perjanjian` (`no_perjanjian`),
  ADD KEY `nik_pm_denbe` (`nik_pm_denbe`);

--
-- Indexes for table `po_supplier`
--
ALTER TABLE `po_supplier`
  ADD PRIMARY KEY (`no_po`),
  ADD KEY `nik_pm_denbe` (`nik_pm_denbe`),
  ADD KEY `no_perjanjian` (`no_perjanjian`),
  ADD KEY `no_supplier` (`no_supplier`);

--
-- Indexes for table `quotation`
--
ALTER TABLE `quotation`
  ADD PRIMARY KEY (`no_quotation`),
  ADD KEY `no_pelanggan` (`no_pelanggan`),
  ADD KEY `nik_pm_denbe` (`nik_pm_denbe`);

--
-- Indexes for table `rekening`
--
ALTER TABLE `rekening`
  ADD PRIMARY KEY (`id_rekening`),
  ADD UNIQUE KEY `nik_no_rek` (`nik`,`no_rek`);

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`no_request`),
  ADD KEY `nik` (`nik`),
  ADD KEY `no_pelanggan` (`no_pelanggan`);

--
-- Indexes for table `request_asset`
--
ALTER TABLE `request_asset`
  ADD PRIMARY KEY (`id_request_asset`),
  ADD UNIQUE KEY `no_request_no_asset` (`no_request`,`no_asset`),
  ADD KEY `FK_request_asset_asset` (`no_asset`);

--
-- Indexes for table `request_inventory`
--
ALTER TABLE `request_inventory`
  ADD PRIMARY KEY (`id_request_inventory`),
  ADD UNIQUE KEY `no_request_no_inventory` (`no_request`,`no_inventory`),
  ADD KEY `FK_request_inventory_inventaris` (`no_inventory`);

--
-- Indexes for table `riwayat_supplier`
--
ALTER TABLE `riwayat_supplier`
  ADD PRIMARY KEY (`id_riwayat_supplier`),
  ADD UNIQUE KEY `no_po_no_supplier_tanggal_pembelian` (`no_po`,`no_supplier`,`tanggal_pembelian`),
  ADD KEY `FK_riwayat_supplier_po_supplier` (`no_supplier`);

--
-- Indexes for table `stok`
--
ALTER TABLE `stok`
  ADD PRIMARY KEY (`id_stock`),
  ADD UNIQUE KEY `no_stok_lokasi` (`no_stok`,`lokasi`),
  ADD KEY `no_po_customer` (`no_po_customer`),
  ADD KEY `no_po_suppler` (`no_po_suppler`),
  ADD KEY `nik_pic_masuk` (`nik_pic_masuk`),
  ADD KEY `nik_pic_keluar_1` (`nik_pic_keluar_1`),
  ADD KEY `nik_pic_keluar_2` (`nik_pic_keluar_2`);

--
-- Indexes for table `stok_inventaris`
--
ALTER TABLE `stok_inventaris`
  ADD PRIMARY KEY (`id_stok_inventaris`),
  ADD UNIQUE KEY `no_stok_no_inventaris` (`no_stok`,`no_inventaris`),
  ADD KEY `FK_stok_inventaris_inventaris` (`no_inventaris`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`no_supplier`);

--
-- Indexes for table `surat_peringatan`
--
ALTER TABLE `surat_peringatan`
  ADD PRIMARY KEY (`nomor_surat`),
  ADD KEY `FK_surat_peringatan_karyawan` (`nik`);

--
-- Indexes for table `training`
--
ALTER TABLE `training`
  ADD PRIMARY KEY (`id_training`),
  ADD UNIQUE KEY `nik_nama_training` (`nik`,`nama_training`);

--
-- Indexes for table `update_asset`
--
ALTER TABLE `update_asset`
  ADD PRIMARY KEY (`no_update`),
  ADD UNIQUE KEY `no_asset_waktu_update` (`no_asset`,`waktu_update`),
  ADD KEY `no_asset` (`no_asset`),
  ADD KEY `update_lokasi` (`update_lokasi`);

--
-- Indexes for table `update_karyawan`
--
ALTER TABLE `update_karyawan`
  ADD PRIMARY KEY (`id_update_karyawan`),
  ADD UNIQUE KEY `nik_waktu_dan_tanggal_update` (`nik`,`waktu_dan_tanggal_update`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cuti`
--
ALTER TABLE `cuti`
  MODIFY `id_cuti` bigint(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `quotation`
--
ALTER TABLE `quotation`
  MODIFY `no_quotation` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `no_request` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `no_supplier` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `angsuran`
--
ALTER TABLE `angsuran`
  ADD CONSTRAINT `FK_angsuran_hutang` FOREIGN KEY (`no_penyetujuan`) REFERENCES `hutang` (`no_penyetujuan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_angsuran_hutang_2` FOREIGN KEY (`nik`) REFERENCES `hutang` (`nik`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `asset`
--
ALTER TABLE `asset`
  ADD CONSTRAINT `FK_asset_karyawan` FOREIGN KEY (`nik_pic`) REFERENCES `karyawan` (`nik`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_asset_lokasi` FOREIGN KEY (`no_lokasi`) REFERENCES `lokasi` (`no_lokasi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `contact_person`
--
ALTER TABLE `contact_person`
  ADD CONSTRAINT `FK_contact_person_pelanggan` FOREIGN KEY (`no_pelanggan`) REFERENCES `pelanggan` (`no_pelanggan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_contact_person_supplier` FOREIGN KEY (`no_supplier`) REFERENCES `supplier` (`no_supplier`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cuti`
--
ALTER TABLE `cuti`
  ADD CONSTRAINT `FK_cuti_karyawan` FOREIGN KEY (`nik`) REFERENCES `karyawan` (`nik`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_cuti_karyawan_2` FOREIGN KEY (`nik_penyetuju`) REFERENCES `karyawan` (`nik`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `hutang`
--
ALTER TABLE `hutang`
  ADD CONSTRAINT `FK_hutang_karyawan` FOREIGN KEY (`nik`) REFERENCES `karyawan` (`nik`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD CONSTRAINT `FK_karyawan_lokasi` FOREIGN KEY (`no_lokasi`) REFERENCES `lokasi` (`no_lokasi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `lokasi`
--
ALTER TABLE `lokasi`
  ADD CONSTRAINT `FK_lokasi_pelanggan` FOREIGN KEY (`no_pelanggan`) REFERENCES `pelanggan` (`no_pelanggan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_lokasi_supplier` FOREIGN KEY (`no_supplier`) REFERENCES `supplier` (`no_supplier`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `perjanjian`
--
ALTER TABLE `perjanjian`
  ADD CONSTRAINT `FK_perjanjian_karyawan` FOREIGN KEY (`nik_penandatangan_denbe`) REFERENCES `karyawan` (`nik`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_perjanjian_pelanggan` FOREIGN KEY (`no_pelanggan`) REFERENCES `pelanggan` (`no_pelanggan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `po_customer`
--
ALTER TABLE `po_customer`
  ADD CONSTRAINT `FK_po_customer_karyawan` FOREIGN KEY (`nik_pm_denbe`) REFERENCES `karyawan` (`nik`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_po_customer_pelanggan` FOREIGN KEY (`no_customer`) REFERENCES `pelanggan` (`no_pelanggan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_po_customer_perjanjian` FOREIGN KEY (`no_perjanjian`) REFERENCES `perjanjian` (`no_perjanjian`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_po_customer_quotation` FOREIGN KEY (`no_quotation`) REFERENCES `quotation` (`no_quotation`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `po_supplier`
--
ALTER TABLE `po_supplier`
  ADD CONSTRAINT `FK_po_supplier_karyawan` FOREIGN KEY (`nik_pm_denbe`) REFERENCES `karyawan` (`nik`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_po_supplier_perjanjian` FOREIGN KEY (`no_perjanjian`) REFERENCES `perjanjian` (`no_perjanjian`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_po_supplier_supplier` FOREIGN KEY (`no_supplier`) REFERENCES `supplier` (`no_supplier`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `quotation`
--
ALTER TABLE `quotation`
  ADD CONSTRAINT `FK_quotation_karyawan` FOREIGN KEY (`nik_pm_denbe`) REFERENCES `karyawan` (`nik`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_quotation_pelanggan` FOREIGN KEY (`no_pelanggan`) REFERENCES `pelanggan` (`no_pelanggan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rekening`
--
ALTER TABLE `rekening`
  ADD CONSTRAINT `FK_rekening_karyawan` FOREIGN KEY (`nik`) REFERENCES `karyawan` (`nik`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `request`
--
ALTER TABLE `request`
  ADD CONSTRAINT `FK_request_karyawan` FOREIGN KEY (`nik`) REFERENCES `karyawan` (`nik`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_request_pelanggan` FOREIGN KEY (`no_pelanggan`) REFERENCES `pelanggan` (`no_pelanggan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `request_asset`
--
ALTER TABLE `request_asset`
  ADD CONSTRAINT `FK_request_asset_asset` FOREIGN KEY (`no_asset`) REFERENCES `asset` (`no_asset`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_request_asset_request` FOREIGN KEY (`no_request`) REFERENCES `request` (`no_request`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `request_inventory`
--
ALTER TABLE `request_inventory`
  ADD CONSTRAINT `FK_request_inventory_inventaris` FOREIGN KEY (`no_inventory`) REFERENCES `inventaris` (`no_inventaris`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_request_inventory_request` FOREIGN KEY (`no_request`) REFERENCES `request` (`no_request`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `riwayat_supplier`
--
ALTER TABLE `riwayat_supplier`
  ADD CONSTRAINT `FK_riwayat_supplier_po_supplier` FOREIGN KEY (`no_supplier`) REFERENCES `po_supplier` (`no_supplier`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_riwayat_supplier_po_supplier_2` FOREIGN KEY (`no_po`) REFERENCES `po_supplier` (`no_supplier`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `stok`
--
ALTER TABLE `stok`
  ADD CONSTRAINT `FK_stok_karyawan` FOREIGN KEY (`nik_pic_masuk`) REFERENCES `karyawan` (`nik`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_stok_karyawan_2` FOREIGN KEY (`nik_pic_keluar_1`) REFERENCES `karyawan` (`nik`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_stok_karyawan_3` FOREIGN KEY (`nik_pic_keluar_2`) REFERENCES `karyawan` (`nik`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_stok_po_customer` FOREIGN KEY (`no_po_customer`) REFERENCES `po_customer` (`no_po`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_stok_po_supplier` FOREIGN KEY (`no_po_suppler`) REFERENCES `po_supplier` (`no_po`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `stok_inventaris`
--
ALTER TABLE `stok_inventaris`
  ADD CONSTRAINT `FK_stok_inventaris_inventaris` FOREIGN KEY (`no_inventaris`) REFERENCES `inventaris` (`no_inventaris`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_stok_inventaris_stok` FOREIGN KEY (`no_stok`) REFERENCES `stok` (`no_stok`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `surat_peringatan`
--
ALTER TABLE `surat_peringatan`
  ADD CONSTRAINT `FK_surat_peringatan_karyawan` FOREIGN KEY (`nik`) REFERENCES `karyawan` (`nik`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `training`
--
ALTER TABLE `training`
  ADD CONSTRAINT `FK_training_karyawan` FOREIGN KEY (`nik`) REFERENCES `karyawan` (`nik`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `update_asset`
--
ALTER TABLE `update_asset`
  ADD CONSTRAINT `FK_update_asset_asset` FOREIGN KEY (`no_asset`) REFERENCES `asset` (`no_asset`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `update_karyawan`
--
ALTER TABLE `update_karyawan`
  ADD CONSTRAINT `FK_update_karyawan_karyawan` FOREIGN KEY (`nik`) REFERENCES `karyawan` (`nik`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
