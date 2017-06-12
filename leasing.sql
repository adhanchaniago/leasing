-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 26, 2017 at 02:25 PM
-- Server version: 5.6.25
-- PHP Version: 5.5.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `leasing`
--

-- --------------------------------------------------------

--
-- Table structure for table `approval`
--

CREATE TABLE IF NOT EXISTS `approval` (
  `id` int(10) unsigned NOT NULL,
  `customer` int(10) unsigned NOT NULL DEFAULT '0',
  `user` int(10) unsigned NOT NULL DEFAULT '0',
  `status` int(10) unsigned NOT NULL DEFAULT '0',
  `comment` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `approval`
--

INSERT INTO `approval` (`id`, `customer`, `user`, `status`, `comment`) VALUES
(1, 2, 1, 1, 'test');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
  `id` int(10) unsigned NOT NULL,
  `nama` varchar(45) NOT NULL DEFAULT '',
  `kota` varchar(45) NOT NULL DEFAULT '',
  `negara` varchar(45) NOT NULL DEFAULT '',
  `email` varchar(45) NOT NULL DEFAULT '',
  `telepon` varchar(45) NOT NULL DEFAULT '',
  `penghasilan` varchar(45) NOT NULL DEFAULT '',
  `username` varchar(45) NOT NULL DEFAULT ''
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `nama`, `kota`, `negara`, `email`, `telepon`, `penghasilan`, `username`) VALUES
(2, 'Alfreds Futterkiste', 'Berlin', 'Germany', 'alfreds@gmail.com', '1234571234', '3000000', 'alfreds'),
(14, 'Ana Trujillo Emparedados y helados', 'México D.F', 'Mexico', 'ana@gmail.com', '2134325235121', '25000000', 'ana'),
(17, 'Antonio Moreno Taquería', 'México D.F', 'Mexico', 'antonio@gmail.com', '0222007891', '2500000', 'antonio'),
(18, 'Around the Horn', 'London', 'UK', 'around@gmail.com', '08133456', '1500000', 'around'),
(19, 'B''s Beverages', 'London', 'UK', 'beverages@gmail.com', '012345', '3000000', 'beverages'),
(20, 'Berglunds snabbköp', 'Luleå', 'Sweden', 'berglunds@gmail.com', '098765432', '12345', 'berglunds'),
(21, 'Blauer See Delikatessen', 'Mannheim', 'Germany', 'blauer@gmail.com', '09876543', '2000000', 'blauer'),
(22, 'Blondel père et fils', 'Strasbourg', 'France', 'blondel@gmail.com', '012345', '2000000', 'blondel'),
(23, 'Bólido Comidas preparadas', 'Madrid', 'Spain', 'bolido@gmail.com', '0987654', '3000000', 'bolido'),
(24, 'Bon app', 'Marseille', 'France', 'bon@gmail.com', '03456789', '10000000', 'bon'),
(25, 'Bottom-Dollar Marketse', 'Tsawassen', 'Canada', 'bottom@gmail.com', '0987654', '3400000', 'bottom'),
(26, 'Cactus Comidas para llevar', 'Buenos Aires', 'Argentina', 'cactus@gmail.com', '094567', '1200000', 'cactus'),
(27, 'Centro comercial Moctezuma', 'México D.F.', 'Mexico', 'centro@gmail.com', '0965432', '2300000', 'centro'),
(28, 'Chop-suey Chinese', 'Bern', 'Switzerland', 'chop@outlook.com', '0123456', '2600000', 'chop'),
(29, 'Comércio Mineiro', 'São Paulo', 'Brazil', 'comercio@gmail.com', '0945678', '3100000', 'comercio'),
(30, 'Ferio Andrean', 'Blitar', 'Indonesia', 'ferioandrean@gmail.com', '012345678', '2400000', 'ferioand'),
(31, 'monyong', 'denpasar', 'bali', 'septian@gmail.com', '01345678', '2000000', 'septian');

-- --------------------------------------------------------

--
-- Table structure for table `kendaraan`
--

CREATE TABLE IF NOT EXISTS `kendaraan` (
  `id` int(10) unsigned NOT NULL,
  `kendaraan` varchar(45) NOT NULL DEFAULT ''
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kendaraan`
--

INSERT INTO `kendaraan` (`id`, `kendaraan`) VALUES
(1, 'TOYOTA INOVA'),
(2, 'ISUZU PANTHER'),
(3, 'LAMBORGHINI AVENTADOR'),
(4, 'COLT DIESEL'),
(5, 'BUGGATI VERON');

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE IF NOT EXISTS `level` (
  `id` int(10) unsigned NOT NULL,
  `level` varchar(45) NOT NULL DEFAULT ''
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`id`, `level`) VALUES
(1, 'PEMERIKSA 1'),
(2, 'PEMERIKSA 2'),
(3, 'MANAGER'),
(4, 'ADMINISTRATOR'),
(5, 'CUSTOMER');

-- --------------------------------------------------------

--
-- Table structure for table `pemeriksa`
--

CREATE TABLE IF NOT EXISTS `pemeriksa` (
  `id` int(10) unsigned NOT NULL,
  `nama` varchar(45) NOT NULL DEFAULT '',
  `kota` varchar(45) NOT NULL DEFAULT '',
  `negara` varchar(45) NOT NULL DEFAULT '',
  `email` varchar(45) NOT NULL DEFAULT '',
  `telepon` varchar(45) NOT NULL DEFAULT '',
  `level` int(10) unsigned NOT NULL DEFAULT '0',
  `username` varchar(45) NOT NULL DEFAULT ''
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pemeriksa`
--

INSERT INTO `pemeriksa` (`id`, `nama`, `kota`, `negara`, `email`, `telepon`, `level`, `username`) VALUES
(5, 'Janur', 'bandung', 'Syria', 'janur@gmail.com', '0221234', 1, 'pemeriksa1'),
(6, 'Gene', 'jakarta', 'Iran', 'gene@gmail.com', '02134567', 2, 'pemeriksa2'),
(7, 'sinyo', 'london', 'suriah', 'sinyo@gmail.com', '03421234', 3, 'manager');

-- --------------------------------------------------------

--
-- Table structure for table `proposal`
--

CREATE TABLE IF NOT EXISTS `proposal` (
  `id` int(10) unsigned NOT NULL,
  `customer_id` int(10) unsigned NOT NULL DEFAULT '0',
  `kendaraan_id` int(10) unsigned NOT NULL DEFAULT '0',
  `judul_pengajuan` varchar(45) NOT NULL DEFAULT '',
  `jangka_waktu` varchar(45) NOT NULL DEFAULT '',
  `status_id` varchar(45) NOT NULL DEFAULT '',
  `created_date` date NOT NULL DEFAULT '0000-00-00'
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `proposal`
--

INSERT INTO `proposal` (`id`, `customer_id`, `kendaraan_id`, `judul_pengajuan`, `jangka_waktu`, `status_id`, `created_date`) VALUES
(1, 17, 1, 'tes', '1', '2', '2017-02-26'),
(2, 17, 3, 'NGIMPI', '3', '6', '2017-02-26'),
(3, 17, 5, 'yang ini juga dong', '2', '3', '2017-02-26'),
(4, 30, 5, 'MAU', '3', '2', '2017-02-26'),
(5, 30, 1, 'mobil', '2', '2', '2017-02-26'),
(6, 30, 3, 'PENGEN BALAP', '3', '2', '2017-02-26'),
(8, 30, 4, 'jualan tahu bulat', '2', '6', '2017-02-26'),
(9, 31, 5, 'kebut kebutan', '3', '6', '2017-02-26');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE IF NOT EXISTS `status` (
  `id` int(10) unsigned NOT NULL,
  `status` varchar(45) NOT NULL DEFAULT ''
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id`, `status`) VALUES
(1, 'Approve Pemeriksa 1'),
(2, 'Reject Pemeriksa 1'),
(3, 'Waiting'),
(4, 'Approve Pemeriksa 2'),
(5, 'Reject Pemeriksa 2 '),
(6, 'Approve Manager'),
(7, 'Reject Manager ');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(10) unsigned NOT NULL,
  `nama` varchar(45) NOT NULL DEFAULT '',
  `username` varchar(45) NOT NULL DEFAULT '',
  `password` varchar(45) NOT NULL DEFAULT '',
  `level` int(10) unsigned NOT NULL DEFAULT '0',
  `email` varchar(45) NOT NULL DEFAULT ''
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `username`, `password`, `level`, `email`) VALUES
(1, 'Ferio Andrean', 'ferio', 'telkom', 4, 'ferioandrean@gmail.com'),
(2, 'Muhammad Ilham', 'ilhamdjavu2', 'telkom', 5, 'ilhamsuhendra28@gmail.com'),
(3, 'sadasds', 'asdasdsa', 'telkom', 5, 'ilhamsuhendra28@gmail.com'),
(9, 'Janur', 'pemeriksa1', 'telkom', 1, 'janur@gmail.com'),
(10, 'Gene', 'pemeriksa2', 'telkom', 2, 'gene@gmail.com'),
(11, 'sinyo', 'manager', 'telkom', 3, 'sinyo@gmail.com'),
(12, 'Antonio Moreno Taquería', 'antonio', 'telkom', 5, 'antonio@gmail.com'),
(13, 'Alfreds Futterkiste', 'alfreds', 'telkom', 5, 'alfreds@gmail.com'),
(14, 'Ana Trujillo Emparedados y helados', 'ana', 'telkom', 5, 'ana@gmail.com'),
(15, 'Around the Horn', 'around', 'telkom', 5, 'around@gmail.com'),
(16, 'B''s Beverages', 'beverages', 'telkom', 5, 'beverages@gmail.com'),
(17, 'Berglunds snabbköp', 'berglunds', 'telkom', 5, 'berglunds@gmail.com'),
(18, 'Blauer See Delikatessen', 'blauer', 'telkom', 5, 'blauer@gmail.com'),
(19, 'Blondel père et fils', 'blondel', 'telkom', 5, 'blondel@gmail.com'),
(20, 'Bólido Comidas preparadas', 'bolido', 'telkom', 5, 'bolido@gmail.com'),
(21, 'Bon app', 'bon', 'telkom', 5, 'bon@gmail.com'),
(22, 'Bottom-Dollar Marketse', 'bottom', 'telkom', 5, 'bottom@gmail.com'),
(23, 'Cactus Comidas para llevar', 'cactus', 'telkom', 5, 'cactus@gmail.com'),
(24, 'Centro comercial Moctezuma', 'centro', 'telkom', 5, 'centro@gmail.com'),
(25, 'Chop-suey Chinese', 'chop', 'telkom', 5, 'chop@outlook.com'),
(26, 'Comércio Mineiro', 'comercio', 'telkom', 5, 'comercio@gmail.com'),
(27, 'Ferio Andrean', 'ferioand', 'telkom', 5, 'ferioandrean@gmail.com'),
(28, 'monyong', 'septian', 'telkom', 5, 'septian@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `approval`
--
ALTER TABLE `approval`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_customer_pk1` (`customer`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kendaraan`
--
ALTER TABLE `kendaraan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pemeriksa`
--
ALTER TABLE `pemeriksa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `proposal`
--
ALTER TABLE `proposal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_level` (`level`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `approval`
--
ALTER TABLE `approval`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `kendaraan`
--
ALTER TABLE `kendaraan`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `level`
--
ALTER TABLE `level`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `pemeriksa`
--
ALTER TABLE `pemeriksa`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `proposal`
--
ALTER TABLE `proposal`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=29;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `FK_level` FOREIGN KEY (`level`) REFERENCES `level` (`id`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
