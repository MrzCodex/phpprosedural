-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 28, 2022 at 09:08 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `econter`
--

-- --------------------------------------------------------

--
-- Table structure for table `hutang`
--

CREATE TABLE `hutang` (
  `id` int(11) NOT NULL,
  `nama_hutang` varchar(255) NOT NULL,
  `nominal` int(25) NOT NULL,
  `nohp` varchar(12) NOT NULL,
  `user_id` int(25) NOT NULL,
  `date` int(255) NOT NULL,
  `status_hutang` varchar(255) NOT NULL,
  `gambar_hutang` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hutang`
--

INSERT INTO `hutang` (`id`, `nama_hutang`, `nominal`, `nohp`, `user_id`, `date`, `status_hutang`, `gambar_hutang`) VALUES
(1, 'Black red', 822112, '0822112', 1, 1648358704, 'Lunas', '623ff530b2a4e.struktur.png'),
(3, 'Mirza', 2147483647, '082215514446', 1, 1648450921, 'Lunas', '623fe77cf2c85.struktur (2).png');

-- --------------------------------------------------------

--
-- Table structure for table `kas`
--

CREATE TABLE `kas` (
  `id` int(11) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `harga` int(13) NOT NULL,
  `qty` int(25) NOT NULL,
  `id_user` int(25) NOT NULL,
  `date` int(25) NOT NULL,
  `gambar_kas` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kas`
--

INSERT INTO `kas` (`id`, `nama_barang`, `keterangan`, `harga`, `qty`, `id_user`, `date`, `gambar_kas`) VALUES
(8, 'Hp Pavilion bf-002-tx', 'Baru', 1000000, 1, 1, 1648379524, '6240468402a4c.hp pavilion bf-002-tx.jpg'),
(9, 'Rokok surya', 'Beroperasi', 10000000, 1, 1, 1648380243, '624049533f061.hp pavilion bf-002-tx.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `id` int(11) NOT NULL,
  `menu` varchar(255) NOT NULL,
  `icon` varchar(255) NOT NULL,
  `status_menu` int(11) NOT NULL,
  `link` varchar(25) NOT NULL,
  `id_role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`id`, `menu`, `icon`, `status_menu`, `link`, `id_role`) VALUES
(1, 'kas', 'dripicons-box', 1, 'kas.php', '2'),
(2, 'user', 'dripicons-box', 1, 'user.php', '1'),
(3, 'hutang', 'dripicons-paperclip', 1, 'hutang.php', '2');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `status_user` int(11) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date_created` int(25) NOT NULL,
  `date_login` int(25) NOT NULL,
  `cookie` varchar(255) NOT NULL,
  `id_role` int(11) NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `email`, `status_user`, `password`, `date_created`, `date_login`, `cookie`, `id_role`, `gambar`) VALUES
(1, 'Muhammad Mirza', 'muhammad.mirza3107@gmail.com', 1, '$2y$10$0FwWHijpXFfBxWYZkdDcm.dICVv.9UiWDzlemdJ1k.2hjhPF0Pejq', 1648040150, 1648450494, '62415bbe96115', 1, '623fe64ad5308.photo2312249370003744683.jpg'),
(2, 'Muhammad Alfian ilya', 'q@q.com', 1, '$2y$10$0FwWHijpXFfBxWYZkdDcm.dICVv.9UiWDzlemdJ1k.2hjhPF0Pejq', 1648044561, 1648240894, '623e28feb0f75', 2, '623b2ac3ce60d._uduk lele.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hutang`
--
ALTER TABLE `hutang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kas`
--
ALTER TABLE `kas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hutang`
--
ALTER TABLE `hutang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `kas`
--
ALTER TABLE `kas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
