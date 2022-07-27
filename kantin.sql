-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 25, 2022 at 06:23 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kantin`
--

-- --------------------------------------------------------

--
-- Table structure for table `antrian`
--

CREATE TABLE `antrian` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `notelp` varchar(13) NOT NULL,
  `harga_bayar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `detail_transaksi`
--

CREATE TABLE `detail_transaksi` (
  `id` int(11) NOT NULL,
  `id_header` int(11) NOT NULL,
  `tanggal_pemesanan` date NOT NULL,
  `waktu_pembelian` time NOT NULL,
  `username` varchar(100) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `no_telp` varchar(12) NOT NULL,
  `total_harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detail_transaksi`
--

INSERT INTO `detail_transaksi` (`id`, `id_header`, `tanggal_pemesanan`, `waktu_pembelian`, `username`, `id_menu`, `no_telp`, `total_harga`) VALUES
(1, 34, '2022-07-25', '22:57:29', 'testing', 1, '8928371283', 15000);

-- --------------------------------------------------------

--
-- Table structure for table `header_transaksi`
--

CREATE TABLE `header_transaksi` (
  `id` int(11) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `header_transaksi`
--

INSERT INTO `header_transaksi` (`id`, `tanggal`) VALUES
(1, '2022-07-24'),
(2, '2022-07-24'),
(3, '2022-07-24'),
(4, '2022-07-24'),
(5, '2022-07-24'),
(6, '2022-07-24'),
(7, '2022-07-24'),
(8, '2022-07-24'),
(9, '2022-07-24'),
(10, '2022-07-24'),
(11, '2022-07-24'),
(12, '2022-07-24'),
(13, '2022-07-24'),
(14, '2022-07-24'),
(15, '2022-07-24'),
(16, '2022-07-24'),
(17, '2022-07-24'),
(18, '2022-07-24'),
(19, '2022-07-24'),
(20, '2022-07-25'),
(21, '2022-07-25'),
(22, '2022-07-25'),
(23, '2022-07-25'),
(24, '2022-07-25'),
(25, '2022-07-25'),
(26, '2022-07-25'),
(27, '2022-07-25'),
(28, '2022-07-25'),
(29, '2022-07-25'),
(30, '2022-07-25'),
(31, '2022-07-25'),
(32, '2022-07-25'),
(33, '2022-07-25'),
(34, '2022-07-25');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `id_menu_type` int(11) NOT NULL,
  `image` varchar(50) NOT NULL,
  `menu_name` varchar(100) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `id_menu_type`, `image`, `menu_name`, `price`) VALUES
(1, 1, 'nasgor.jpg', 'Nasi Goreng', 15000),
(2, 2, '62dc0c723bd2a.png', 'Es Teh Manis', 3000),
(3, 3, '62dc0cf014a4a.png', 'Momogi', 1000),
(14, 1, '62dc0ee548436.png', 'Mie Goreng', 15000),
(15, 2, '62dc0e62d4e12.png', 'Es Jeruk', 5000),
(16, 3, '62dc528880720.png', 'Chiki Taro', 1500),
(17, 2, '62de03de8e191.png', 'Es Teh Tarik', 12000),
(21, 1, '62deb596062b8.png', 'Nasi Ayam Kremes', 12000),
(22, 1, '62deb5cab2e50.png', 'Mie Ayam', 15000),
(23, 1, '62deb84ee08f7.png', 'Nasi Kuning', 12000),
(24, 2, '62deb6335d808.png', 'Teh Tawar Hangat', 3000),
(25, 3, '62deb65bb4154.png', 'Richeese Nabati Keju', 6000),
(26, 2, '62deb7e897ca3.png', 'Jus Mangga', 10000),
(27, 1, '62debd178b92d.png', 'Nasi Uduk', 12000);

-- --------------------------------------------------------

--
-- Table structure for table `menu_type`
--

CREATE TABLE `menu_type` (
  `id` int(11) NOT NULL,
  `menu_type_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menu_type`
--

INSERT INTO `menu_type` (`id`, `menu_type_name`) VALUES
(1, 'Makanan'),
(2, 'Minuman'),
(3, 'Snack');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `id_user_level` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `notelp` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `id_user_level`, `username`, `password`, `notelp`) VALUES
(11, 1, 'admin', '$2y$10$MLXk5QMbl0j6A4hxbRO0z.RyyR.Oi7sZAhxuu25mhW1.lJV..lcxK', ''),
(14, 2, 'diba', '$2y$10$2rzqpMvr4IngUv9m0l2Z9./71rq652BZu2m5efZC6/qe3hhusDvt6', '081356108992'),
(18, 2, 'bayu', '$2y$10$nGBx3DLeqn9tt792p5mfoe5AiMVGi7mtVI1DN3fVuRuqje4wWW1Ee', '892902010'),
(19, 2, 'dimas', '$2y$10$xr0TSVT.k8y31VDs/8lrlucTpUbmdIpAiR5Ipta9qUTwQE5thUywG', '8120284729'),
(20, 2, 'testing', '$2y$10$0dxfKzZbCrJsaJ6x5LuWZONOxOPZo3o4p9Gp8bKe764ewcGDhovP.', '8928371283');

-- --------------------------------------------------------

--
-- Table structure for table `user_level`
--

CREATE TABLE `user_level` (
  `id` int(11) NOT NULL,
  `level` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_level`
--

INSERT INTO `user_level` (`id`, `level`) VALUES
(1, 'admin'),
(2, 'customer');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `antrian`
--
ALTER TABLE `antrian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_menu` (`id_menu`),
  ADD KEY `id_header` (`id_header`);

--
-- Indexes for table `header_transaksi`
--
ALTER TABLE `header_transaksi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_menu_type` (`id_menu_type`);

--
-- Indexes for table `menu_type`
--
ALTER TABLE `menu_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user_level` (`id_user_level`);

--
-- Indexes for table `user_level`
--
ALTER TABLE `user_level`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `antrian`
--
ALTER TABLE `antrian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `header_transaksi`
--
ALTER TABLE `header_transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `menu_type`
--
ALTER TABLE `menu_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `user_level`
--
ALTER TABLE `user_level`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `menu_ibfk_1` FOREIGN KEY (`id_menu_type`) REFERENCES `menu_type` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`id_user_level`) REFERENCES `user_level` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
