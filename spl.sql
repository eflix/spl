-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 27, 2021 at 07:59 AM
-- Server version: 5.5.32
-- PHP Version: 5.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `spl`
--
CREATE DATABASE IF NOT EXISTS `spl` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `spl`;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
  `cust_id` int(11) NOT NULL AUTO_INCREMENT,
  `cust_nama` varchar(50) NOT NULL,
  `cust_alamat` text NOT NULL,
  `cust_no_telp` varchar(20) NOT NULL,
  PRIMARY KEY (`cust_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cust_id`, `cust_nama`, `cust_alamat`, `cust_no_telp`) VALUES
(1, 'bunga', 'sukoharjo', '098758493'),
(2, 'andi', 'sukoharjo', '094859403');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE IF NOT EXISTS `employee` (
  `emp_id` int(11) NOT NULL AUTO_INCREMENT,
  `emp_nama` varchar(50) NOT NULL,
  `emp_no_telp` varchar(20) NOT NULL,
  `emp_alamat` text NOT NULL,
  PRIMARY KEY (`emp_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`emp_id`, `emp_nama`, `emp_no_telp`, `emp_alamat`) VALUES
(1, 'danu', '3948594', 'jakarta');

-- --------------------------------------------------------

--
-- Table structure for table `fin_invoice`
--

CREATE TABLE IF NOT EXISTS `fin_invoice` (
  `fin_inv_no` int(11) NOT NULL AUTO_INCREMENT,
  `fin_inv_dt` date NOT NULL,
  `fin_inv_locn` varchar(50) NOT NULL,
  `fin_inv_cust_id` varchar(50) NOT NULL,
  `fin_inv_city` varchar(50) NOT NULL,
  `fin_inv_status` varchar(25) NOT NULL,
  `fin_inv_type` varchar(25) NOT NULL,
  `fin_inv_total_amt` double(18,2) NOT NULL,
  `fin_inv_paid_dt` date DEFAULT NULL,
  `fin_inv_paid_amt` double(18,2) NOT NULL,
  `fin_inv_notes` text NOT NULL,
  `created_dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` varchar(50) NOT NULL,
  `last_updated_dt` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `last_updated_by` varchar(50) NOT NULL,
  PRIMARY KEY (`fin_inv_no`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `fin_invoice`
--

INSERT INTO `fin_invoice` (`fin_inv_no`, `fin_inv_dt`, `fin_inv_locn`, `fin_inv_cust_id`, `fin_inv_city`, `fin_inv_status`, `fin_inv_type`, `fin_inv_total_amt`, `fin_inv_paid_dt`, `fin_inv_paid_amt`, `fin_inv_notes`, `created_dt`, `created_by`, `last_updated_dt`, `last_updated_by`) VALUES
(1, '2021-11-24', '3', 'Budi', 'Jakarta', 'OPEN', 'TUNAI', 10000.00, '2021-11-24', 10000.00, 'lunas\r\n', '2021-11-24 09:32:21', '', '0000-00-00 00:00:00', ''),
(2, '2021-11-25', '3', 'budi', 'solo', 'OPEN', 'TUNAI', 100000.00, NULL, 0.00, 'cek', '2021-11-25 04:56:24', '', '0000-00-00 00:00:00', ''),
(3, '2021-11-25', '3', 'andi', 'skoharjo', 'OPEN', 'TUNAI', 50000.00, NULL, 50000.00, 'cek', '2021-11-25 05:47:55', '', '0000-00-00 00:00:00', ''),
(4, '2021-11-25', '4', 'bunda', 'solok', 'OPEN', 'LUNAS', 43000.00, NULL, 43000.00, '', '2021-11-25 05:48:16', '', '0000-00-00 00:00:00', ''),
(5, '2021-11-26', '4', 'Aceng', 'Sukoharjo', 'OPEN', 'TUNAI', 304000.00, NULL, 304000.00, 'cek', '2021-11-26 00:26:55', '', '0000-00-00 00:00:00', ''),
(6, '2021-12-10', '1', '1', '', 'OPEN', 'TUNAI', 20000.00, NULL, 20000.00, '', '2021-12-10 07:31:56', '', '0000-00-00 00:00:00', ''),
(7, '2021-12-10', '2', '2', '', 'OPEN', 'TUNAI', 2400.00, NULL, 2400.00, '', '2021-12-10 07:33:07', '', '0000-00-00 00:00:00', ''),
(8, '2021-12-10', '3', '1', '', 'OPEN', 'HUTANG', 30000.00, NULL, 0.00, 'janji bayar minggu depan', '2021-12-10 07:33:49', '', '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `hasil_gosok`
--

CREATE TABLE IF NOT EXISTS `hasil_gosok` (
  `hg_id` int(11) NOT NULL,
  `hg_tgl` date NOT NULL,
  `hg_ld_id` int(11) NOT NULL,
  `hg_tg_id` int(11) NOT NULL,
  `hg_hasil` decimal(18,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hasil_gosok`
--

INSERT INTO `hasil_gosok` (`hg_id`, `hg_tgl`, `hg_ld_id`, `hg_tg_id`, `hg_hasil`) VALUES
(0, '0000-00-00', 3, 1, '10.00'),
(0, '0000-00-00', 4, 1, '10.00'),
(0, '0000-00-00', 2, 2, '9.00'),
(0, '0000-00-00', 3, 2, '4.00'),
(0, '2021-12-11', 3, 2, '16.00');

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE IF NOT EXISTS `inventory` (
  `inv_tran_no` int(11) NOT NULL AUTO_INCREMENT,
  `inv_tran_locn` varchar(50) NOT NULL,
  `inv_tran_dt` date NOT NULL,
  `inv_tran_type` varchar(20) NOT NULL,
  `inv_tran_in_out` varchar(5) NOT NULL,
  `inv_tran_ref` varchar(25) NOT NULL,
  `inv_tran_item_name` varchar(100) NOT NULL,
  `inv_tran_item_uom` varchar(10) NOT NULL,
  `inv_tran_item_qty` decimal(18,2) NOT NULL,
  `inv_tran_item_price` decimal(18,2) NOT NULL,
  `inv_tran_notes` text NOT NULL,
  `created_dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_by` varchar(25) NOT NULL,
  `last_updated_dt` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `last_updated_by` varchar(25) NOT NULL,
  PRIMARY KEY (`inv_tran_no`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`inv_tran_no`, `inv_tran_locn`, `inv_tran_dt`, `inv_tran_type`, `inv_tran_in_out`, `inv_tran_ref`, `inv_tran_item_name`, `inv_tran_item_uom`, `inv_tran_item_qty`, `inv_tran_item_price`, `inv_tran_notes`, `created_dt`, `created_by`, `last_updated_dt`, `last_updated_by`) VALUES
(1, '', '2021-12-05', 'PEMBELIAN', 'IN', '', 'kain pel', 'pcs', '2.00', '20000.00', 'cek', '2021-12-05 13:18:35', '', '0000-00-00 00:00:00', ''),
(2, 'pusat', '2021-12-05', 'PEMBELIAN', 'IN', '', 'sabun', 'botol', '10.00', '15000.00', '', '2021-12-05 13:18:38', '', '0000-00-00 00:00:00', ''),
(3, '', '2021-11-30', 'PEMBELIAN', 'IN', '', 'pewangi', 'cup', '10.00', '34000.00', '', '2021-12-05 13:18:40', '', '0000-00-00 00:00:00', ''),
(4, '', '2021-12-05', 'PEMBELIAN', 'IN', '', 'pewangi', 'cup', '20.00', '20000.00', '', '2021-12-05 13:27:41', '', '0000-00-00 00:00:00', ''),
(5, '3', '2021-12-10', 'PEMBELIAN', 'IN', '', '1', 'pcs', '2000.00', '30000.00', 'cek', '2021-12-10 08:26:25', '', '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE IF NOT EXISTS `items` (
  `item_id` int(11) NOT NULL AUTO_INCREMENT,
  `item_type` varchar(10) DEFAULT NULL,
  `item_nama` varchar(50) NOT NULL,
  `item_harga` decimal(18,2) NOT NULL,
  PRIMARY KEY (`item_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`item_id`, `item_type`, `item_nama`, `item_harga`) VALUES
(1, NULL, 'kain pel', '10000.00');

-- --------------------------------------------------------

--
-- Table structure for table `loundry`
--

CREATE TABLE IF NOT EXISTS `loundry` (
  `ld_id` int(11) NOT NULL AUTO_INCREMENT,
  `ld_nama` varchar(50) NOT NULL,
  `ld_alamat` text NOT NULL,
  `ld_no_telp` varchar(20) NOT NULL,
  PRIMARY KEY (`ld_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `loundry`
--

INSERT INTO `loundry` (`ld_id`, `ld_nama`, `ld_alamat`, `ld_no_telp`) VALUES
(1, 'pusat', 'solo', '3948839'),
(2, 'pusat', 'solo', '3948839'),
(3, 'laundry abc', 'sangiran, sragen, jawa tengah\r\n', '3098549'),
(4, 'bunga', 'mojolaban, sukoharjo', '0848488');

-- --------------------------------------------------------

--
-- Table structure for table `tukang_gosok`
--

CREATE TABLE IF NOT EXISTS `tukang_gosok` (
  `tg_id` int(11) NOT NULL AUTO_INCREMENT,
  `tg_ld_id` int(11) NOT NULL,
  `tg_nama` varchar(50) NOT NULL,
  `tg_alamat` text NOT NULL,
  `tg_no_telp` varchar(20) NOT NULL,
  `tg_harga_per_kg` decimal(18,2) NOT NULL,
  PRIMARY KEY (`tg_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tukang_gosok`
--

INSERT INTO `tukang_gosok` (`tg_id`, `tg_ld_id`, `tg_nama`, `tg_alamat`, `tg_no_telp`, `tg_harga_per_kg`) VALUES
(1, 1, 'bambang', 'solo', '20987839', '20000.00'),
(2, 3, 'bani andaya', 'banjar baru', '39478384884', '24000.00');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `image`, `username`, `password`, `role_id`, `is_active`, `date_created`) VALUES
(4, 'Joko Sntoso', '', '12341234', 'admin', '$2y$10$rb.ORC9dsUwYPh95sq5VUOCeyo2iptqk/QqHo8O94/AM0cJvM67qW', 1, 1, 20211009);

-- --------------------------------------------------------

--
-- Table structure for table `user_access_menu`
--

CREATE TABLE IF NOT EXISTS `user_access_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(6, 1, 4),
(10, 1, 7),
(11, 1, 8),
(12, 1, 9),
(13, 1, 10);

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

CREATE TABLE IF NOT EXISTS `user_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `menu` varchar(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'Admin'),
(2, 'User'),
(3, 'Menu'),
(5, 'Kependudukan'),
(6, 'Surat'),
(7, 'Invoice'),
(8, 'Inventory'),
(9, 'MasterData'),
(10, 'Laporan');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE IF NOT EXISTS `user_role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role` varchar(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'administrator'),
(2, 'member');

-- --------------------------------------------------------

--
-- Table structure for table `user_sub_menu`
--

CREATE TABLE IF NOT EXISTS `user_sub_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(1, 1, 'Dashboard', 'admin', 'fas fa-fw fa-tachometer-alt', 1),
(2, 2, 'My Profile', 'user', 'fas fa-fw fa-user', 1),
(3, 2, 'Edit Profile', 'user/edit', 'fas fa-fw fa-user-edit', 1),
(4, 3, 'Menu Management', 'menu', 'fas fa-fw fa-folder', 1),
(5, 3, 'SubMenu Management', 'menu/submenu', 'fas fa-fw fa-folder-open', 1),
(7, 1, 'Role', 'admin/role', 'fas fa-fw fa-user-tie', 1),
(9, 5, 'Penduduk', 'kependudukan', 'fas fa-male', 1),
(10, 6, 'Daftar Pengajuan', 'surat', 'fas fa-envelope-open-text', 1),
(11, 6, 'Print Surat', 'surat/daftarSurat', 'fas fa-print', 1),
(12, 6, 'Riwayat Surat', 'surat/riwayatSurat', '', 1),
(14, 7, 'Penghasilan', 'invoice', '', 1),
(15, 7, 'Hutang', 'invoice/hutang', '', 1),
(16, 8, 'Manage Inventory', 'inventory', '', 1),
(17, 8, 'Edit Stock', 'inventory/editStock', '', 1),
(18, 9, 'Laundry', 'masterdata', '', 1),
(19, 9, 'Customer', 'masterdata/customer', '', 1),
(20, 9, 'Tukang Gosok', 'masterdata/tukangGosok', '', 1),
(21, 7, 'Hasil Gosok', 'invoice/hasilGosok', '', 1),
(22, 10, 'Laporan', 'laporan', '', 1),
(23, 9, 'Karyawan', 'masterdata/Employee', '', 1),
(24, 9, 'Barang', 'masterdata/items', '', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
