-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 16, 2022 at 01:47 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pojok_umkm`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_ads`
--

CREATE TABLE `tb_ads` (
  `idads` int(11) NOT NULL,
  `ads_name` varchar(50) NOT NULL,
  `ads_description` varchar(50) NOT NULL,
  `ads_duration` int(11) NOT NULL,
  `ads_price` int(11) NOT NULL,
  `ads_status` enum('on','off') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `idkategori` int(11) NOT NULL,
  `category_name` varchar(50) NOT NULL,
  `category_description` varchar(50) NOT NULL,
  `category_status` enum('on','off') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_kategori`
--

INSERT INTO `tb_kategori` (`idkategori`, `category_name`, `category_description`, `category_status`) VALUES
(1, 'Kosmetik', 'Peralatan Kosmetik', 'on'),
(2, 'Mainan Anak', 'Mainan anak-anak dibawah 10 tahun', 'off'),
(3, 'Elektronik Arts', 'Peralatan Elektronik secara keseluruhan', 'on');

-- --------------------------------------------------------

--
-- Table structure for table `tb_order`
--

CREATE TABLE `tb_order` (
  `idorder` int(11) NOT NULL,
  `idads` int(11) DEFAULT NULL,
  `idumkm` int(11) DEFAULT NULL,
  `item_amount` int(11) NOT NULL,
  `date_ordered` datetime NOT NULL,
  `payment_amount` int(11) NOT NULL,
  `status` enum('Menunggu Bukti Transfer','Dalam Proses','Terverifikasi') NOT NULL,
  `payment_proof` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengelola`
--

CREATE TABLE `tb_pengelola` (
  `idpengelola` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `address` varchar(32) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `whatsapp` varchar(15) NOT NULL,
  `iduser` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pengelola`
--

INSERT INTO `tb_pengelola` (`idpengelola`, `name`, `address`, `phone`, `whatsapp`, `iduser`) VALUES
(1, 'Muhammad Yusuf Ramadhan', 'bojongswan 1', '082299013978', '082299013969', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_produk`
--

CREATE TABLE `tb_produk` (
  `idproduk` int(11) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `product_main_pic` text NOT NULL,
  `product_extra_pic1` text DEFAULT NULL,
  `product_extra_pic2` text DEFAULT NULL,
  `product_extra_pic3` text DEFAULT NULL,
  `product_status` enum('on','off') NOT NULL,
  `idumkm` int(11) DEFAULT NULL,
  `idkategori` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_produk`
--

INSERT INTO `tb_produk` (`idproduk`, `product_name`, `description`, `product_main_pic`, `product_extra_pic1`, `product_extra_pic2`, `product_extra_pic3`, `product_status`, `idumkm`, `idkategori`) VALUES
(1, 'Kaset Bluray mini game house', '<p>dijual murah di tokopedia</p>', 'prd_main_2_1652063004_c56560c246ce6721895b.jpg', NULL, NULL, NULL, 'on', 1, 3),
(4, 'sampel 2', '', 'prd_main_2_1652066826_4e45f8b8c9cdba1f7278.jpg', NULL, NULL, NULL, 'on', 1, 1),
(5, 'sampel 3', '', 'prd_main_2_1652066855_b37cc74c236fb62af17f.jpg', 'prd_ex1_2_1652066855_5d610fd04401d14e9346.jpg', 'prd_ex2_2_1652066855_8d0642ab90543f58d007.jpg', NULL, 'on', 1, 3),
(6, 'RJ598177 - Rice Cooker Mengo Ultra Boost', '<p>rice cooker terbaru lorem ipsum dolor sit amet</p>', 'prd_main_2_1652678039_d5c4780914d64de0278d.jpg', NULL, 'prd_ex2_2_1652698098_57dbfb629a0e65984c17.jpg', NULL, 'on', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_produk_link`
--

CREATE TABLE `tb_produk_link` (
  `idprodlink` int(11) NOT NULL,
  `link_name` text NOT NULL,
  `link_address` text NOT NULL,
  `idproduk` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_produk_link`
--

INSERT INTO `tb_produk_link` (`idprodlink`, `link_name`, `link_address`, `idproduk`) VALUES
(1, 'tokopedia', 'www.example.com', 1),
(2, '', '', 4),
(5, 'OLX', 'olx.com/rice-cooker-mengo', 6);

-- --------------------------------------------------------

--
-- Table structure for table `tb_umkm`
--

CREATE TABLE `tb_umkm` (
  `idumkm` int(11) NOT NULL,
  `umkm_name` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `address` varchar(32) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `umkm_pic` text DEFAULT NULL,
  `iduser` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_umkm`
--

INSERT INTO `tb_umkm` (`idumkm`, `umkm_name`, `description`, `address`, `phone`, `umkm_pic`, `iduser`) VALUES
(1, 'Egan Kusmaya Putra', 'Penjual Handal', 'bojongswan 2', '082215204919', '1650612372_86f32a8d8711443ee1bc.jpg', 2),
(2, 'GAN Ltd.', '<p>this is new project by me, HELLO WORLD</p>', 'Bumi Parahyangan Kencana', '02214000420', '1650688819_f9f5ead12c4d540222f2.jpg', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tb_umkm_link`
--

CREATE TABLE `tb_umkm_link` (
  `idumkmlink` int(11) NOT NULL,
  `umkm_link_name` text NOT NULL,
  `umkm_link_address` text NOT NULL,
  `idumkm` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_umkm_link`
--

INSERT INTO `tb_umkm_link` (`idumkmlink`, `umkm_link_name`, `umkm_link_address`, `idumkm`) VALUES
(2, 'Twitter', 't.co/egn234', 2),
(3, 'Facebook', 'fb.me/egn234', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `iduser` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `pass` text NOT NULL,
  `email` text NOT NULL,
  `flag` int(1) NOT NULL,
  `idgroup` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`iduser`, `username`, `pass`, `email`, `flag`, `idgroup`) VALUES
(1, 'pengelola1', 'c20c8984f3db849ad612d2c40f0672ae', 'pengelola1@gmail.com', 1, 1),
(2, 'umkm1', '25d55ad283aa400af464c76d713c07ad', 'umkm1@gmail.com', 1, 2),
(3, 'egankusmaya', '25d55ad283aa400af464c76d713c07ad', 'egankusmaya@gmail.com', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tr_group`
--

CREATE TABLE `tr_group` (
  `idgroup` int(11) NOT NULL,
  `keterangan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tr_group`
--

INSERT INTO `tr_group` (`idgroup`, `keterangan`) VALUES
(1, 'pengelola'),
(2, 'UMKM');

-- --------------------------------------------------------

--
-- Table structure for table `tr_umkm_ads_owned`
--

CREATE TABLE `tr_umkm_ads_owned` (
  `idumkm` int(11) DEFAULT NULL,
  `idads` int(11) DEFAULT NULL,
  `ads_amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tr_umkm_ads_used`
--

CREATE TABLE `tr_umkm_ads_used` (
  `idumkm` int(11) DEFAULT NULL,
  `idads` int(11) DEFAULT NULL,
  `idproduk` int(11) DEFAULT NULL,
  `ads_date_start` datetime NOT NULL,
  `ads_date_finished` datetime NOT NULL,
  `ads_date_used` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_ads`
--
ALTER TABLE `tb_ads`
  ADD PRIMARY KEY (`idads`);

--
-- Indexes for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`idkategori`);

--
-- Indexes for table `tb_order`
--
ALTER TABLE `tb_order`
  ADD PRIMARY KEY (`idorder`),
  ADD KEY `idads` (`idads`),
  ADD KEY `idumkm` (`idumkm`);

--
-- Indexes for table `tb_pengelola`
--
ALTER TABLE `tb_pengelola`
  ADD PRIMARY KEY (`idpengelola`),
  ADD KEY `iduser` (`iduser`);

--
-- Indexes for table `tb_produk`
--
ALTER TABLE `tb_produk`
  ADD PRIMARY KEY (`idproduk`),
  ADD KEY `idumkm` (`idumkm`);

--
-- Indexes for table `tb_produk_link`
--
ALTER TABLE `tb_produk_link`
  ADD PRIMARY KEY (`idprodlink`),
  ADD KEY `idproduk` (`idproduk`);

--
-- Indexes for table `tb_umkm`
--
ALTER TABLE `tb_umkm`
  ADD PRIMARY KEY (`idumkm`),
  ADD KEY `iduser` (`iduser`);

--
-- Indexes for table `tb_umkm_link`
--
ALTER TABLE `tb_umkm_link`
  ADD PRIMARY KEY (`idumkmlink`),
  ADD KEY `idumkm` (`idumkm`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`iduser`),
  ADD KEY `idgroup` (`idgroup`);

--
-- Indexes for table `tr_group`
--
ALTER TABLE `tr_group`
  ADD PRIMARY KEY (`idgroup`);

--
-- Indexes for table `tr_umkm_ads_owned`
--
ALTER TABLE `tr_umkm_ads_owned`
  ADD KEY `idads` (`idads`),
  ADD KEY `idumkm` (`idumkm`);

--
-- Indexes for table `tr_umkm_ads_used`
--
ALTER TABLE `tr_umkm_ads_used`
  ADD KEY `idads` (`idads`),
  ADD KEY `idproduk` (`idproduk`),
  ADD KEY `idumkm` (`idumkm`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_ads`
--
ALTER TABLE `tb_ads`
  MODIFY `idads` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  MODIFY `idkategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_order`
--
ALTER TABLE `tb_order`
  MODIFY `idorder` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_pengelola`
--
ALTER TABLE `tb_pengelola`
  MODIFY `idpengelola` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_produk`
--
ALTER TABLE `tb_produk`
  MODIFY `idproduk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_produk_link`
--
ALTER TABLE `tb_produk_link`
  MODIFY `idprodlink` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_umkm`
--
ALTER TABLE `tb_umkm`
  MODIFY `idumkm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_umkm_link`
--
ALTER TABLE `tb_umkm_link`
  MODIFY `idumkmlink` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tr_group`
--
ALTER TABLE `tr_group`
  MODIFY `idgroup` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_order`
--
ALTER TABLE `tb_order`
  ADD CONSTRAINT `tb_order_ibfk_1` FOREIGN KEY (`idads`) REFERENCES `tb_ads` (`idads`),
  ADD CONSTRAINT `tb_order_ibfk_2` FOREIGN KEY (`idumkm`) REFERENCES `tb_umkm` (`idumkm`);

--
-- Constraints for table `tb_pengelola`
--
ALTER TABLE `tb_pengelola`
  ADD CONSTRAINT `tb_pengelola_ibfk_1` FOREIGN KEY (`iduser`) REFERENCES `tb_user` (`iduser`);

--
-- Constraints for table `tb_produk`
--
ALTER TABLE `tb_produk`
  ADD CONSTRAINT `tb_produk_ibfk_1` FOREIGN KEY (`idumkm`) REFERENCES `tb_umkm` (`idumkm`);

--
-- Constraints for table `tb_produk_link`
--
ALTER TABLE `tb_produk_link`
  ADD CONSTRAINT `tb_produk_link_ibfk_1` FOREIGN KEY (`idproduk`) REFERENCES `tb_produk` (`idproduk`);

--
-- Constraints for table `tb_umkm`
--
ALTER TABLE `tb_umkm`
  ADD CONSTRAINT `tb_umkm_ibfk_1` FOREIGN KEY (`iduser`) REFERENCES `tb_user` (`iduser`);

--
-- Constraints for table `tb_umkm_link`
--
ALTER TABLE `tb_umkm_link`
  ADD CONSTRAINT `tb_umkm_link_ibfk_1` FOREIGN KEY (`idumkm`) REFERENCES `tb_umkm` (`idumkm`);

--
-- Constraints for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD CONSTRAINT `tb_user_ibfk_1` FOREIGN KEY (`idgroup`) REFERENCES `tr_group` (`idgroup`);

--
-- Constraints for table `tr_umkm_ads_owned`
--
ALTER TABLE `tr_umkm_ads_owned`
  ADD CONSTRAINT `tr_umkm_ads_owned_ibfk_1` FOREIGN KEY (`idads`) REFERENCES `tb_ads` (`idads`),
  ADD CONSTRAINT `tr_umkm_ads_owned_ibfk_2` FOREIGN KEY (`idumkm`) REFERENCES `tb_umkm` (`idumkm`);

--
-- Constraints for table `tr_umkm_ads_used`
--
ALTER TABLE `tr_umkm_ads_used`
  ADD CONSTRAINT `tr_umkm_ads_used_ibfk_1` FOREIGN KEY (`idads`) REFERENCES `tb_ads` (`idads`),
  ADD CONSTRAINT `tr_umkm_ads_used_ibfk_2` FOREIGN KEY (`idproduk`) REFERENCES `tb_produk` (`idproduk`),
  ADD CONSTRAINT `tr_umkm_ads_used_ibfk_3` FOREIGN KEY (`idumkm`) REFERENCES `tb_umkm` (`idumkm`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
