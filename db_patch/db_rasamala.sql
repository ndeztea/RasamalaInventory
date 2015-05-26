-- phpMyAdmin SQL Dump
-- version 4.1.8
-- http://www.phpmyadmin.net
--
-- Host: localhost:8889
-- Generation Time: May 26, 2015 at 03:42 PM
-- Server version: 5.5.34
-- PHP Version: 5.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_rasamala`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang_beli`
--

CREATE TABLE `barang_beli` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode_beli` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `hp` varchar(100) NOT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `total_diskon` float NOT NULL,
  `total_ongkoskirim` float NOT NULL,
  `total_upah` float NOT NULL,
  `total` float NOT NULL,
  `status` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `kode_beli` (`kode_beli`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `barang_beli_detail`
--

CREATE TABLE `barang_beli_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_barang_beli` int(11) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `kode_barang` varchar(100) NOT NULL,
  `jumlah` float NOT NULL,
  `id_satuan` int(11) NOT NULL,
  `harga` float NOT NULL,
  `total_harga` float NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_barang_beli` (`id_barang_beli`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `barang_jual`
--

CREATE TABLE `barang_jual` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode_jual` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `hp` varchar(100) NOT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `total_diskon` float NOT NULL,
  `total_ongkoskirim` float NOT NULL,
  `total_upah` float NOT NULL,
  `total` float NOT NULL,
  `status` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `kode_jual` (`kode_jual`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `barang_jual_detail`
--

CREATE TABLE `barang_jual_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_barang_jual` int(11) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `kode_barang` varchar(100) NOT NULL,
  `jumlah` float NOT NULL,
  `id_satuan` int(11) NOT NULL,
  `harga` float NOT NULL,
  `total_harga` float NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_barang_jual` (`id_barang_jual`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `barang_stock`
--

CREATE TABLE `barang_stock` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_barang` varchar(255) NOT NULL,
  `kode_barang` varchar(50) NOT NULL,
  `id_category` int(11) NOT NULL,
  `jumlah_stocks` int(11) NOT NULL,
  `id_satuan` int(11) NOT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `id_parent` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `id_parent`) VALUES
(1, 'Paku', 0),
(2, 'Genteng', 0);

-- --------------------------------------------------------

--
-- Table structure for table `hutang`
--

CREATE TABLE `hutang` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `jenis_hutang` varchar(255) NOT NULL,
  `total` float NOT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `status` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `piutang`
--

CREATE TABLE `piutang` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `jenis_piutang` varchar(255) NOT NULL,
  `total` float NOT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `status` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `satuan`
--

CREATE TABLE `satuan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `satuan` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `satuan`
--

INSERT INTO `satuan` (`id`, `satuan`) VALUES
(1, 'Kg'),
(2, 'm'),
(3, 'm2'),
(4, 'm3'),
(5, 'Buah');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `status` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id`, `status`) VALUES
(1, 'Lunas'),
(2, 'Belum Lunas');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `hp` varchar(100) NOT NULL,
  `tanggal_login` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `id_akses` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `nama`, `alamat`, `hp`, `tanggal_login`, `id_akses`) VALUES
(1, 'admin', 'admin', 'Admin', 'TKK', '098765431', '0000-00-00 00:00:00', 1),
(2, 'gudang', 'password', 'Gudang Akses', 'CCi', '24234', '0000-00-00 00:00:00', 3);

-- --------------------------------------------------------

--
-- Table structure for table `users_akses`
--

CREATE TABLE `users_akses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `akses` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `users_akses`
--

INSERT INTO `users_akses` (`id`, `akses`) VALUES
(1, 'Admin'),
(2, 'Sales'),
(3, 'Gudang');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
