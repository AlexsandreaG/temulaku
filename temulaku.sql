-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 04, 2023 at 05:59 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `temulaku`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'Admin', '$2y$10$FmS8lo2Svv7zPbVTbV0pb.rP83zzMiKFZev6aYykq9kqKzVlAeR/u');

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id` int(11) NOT NULL,
  `kategori_id` int(11) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `harga` double DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `ketersediaan` enum('habis','tersedia') DEFAULT 'tersedia'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id`, `kategori_id`, `nama`, `harga`, `foto`, `deskripsi`, `ketersediaan`) VALUES
(25, 4, 'Bat Pingpong 032-40', 45000, 'B.jpg', '', 'tersedia'),
(29, 2, 'Headphone Nokia E1200', 350000, '2.jpg', '', 'tersedia'),
(31, 2, 'Proteam Bola Sepak Striker', 132000, 'j.jpg', '                                    ', 'tersedia'),
(33, 4, 'SPEEDS Bola Basket', 55000, 'W.jpg', '', 'tersedia'),
(35, 5, 'Handgrip RCB HG66', 70000, 'k.jpg', '', 'tersedia'),
(37, 5, 'Gearset SSS', 430000, '3.jpg', '', 'tersedia'),
(38, 1, 'Jam Tangan Elizabeth', 250000, '1.jpg', '', 'tersedia'),
(45, 3, 'Sofa Minimalis', 164000, 's.jpg', '', 'tersedia'),
(46, 4, 'Sepatu Futsal Specs', 335000, 'O.jpg', 'Sepatu Futsal Specs adalah sepatu dengan performa tinggi yang dirancang untuk pemain futsal yang serius. Berikut adalah fitur-fitur utamanya:\r\n\r\n1. Bahan berkualitas tinggi: Terbuat dari bahan sintetis yang tahan lama.\r\n2. Sirkulasi udara baik: Teknologi ventilasi menjaga kaki tetap kering dan nyaman.\r\n3. Traction optimal: Sol luar karet memberikan daya cengkeram yang baik di lapangan futsal.\r\n4. Damping yang baik: Teknologi damping mengurangi dampak dan risiko cedera.\r\n5. Desain stylish: Tersedia dalam berbagai warna dan desain modern.', 'tersedia'),
(47, 2, 'Speaker JBL Charge 4', 121000, 'V.jpg', '', 'tersedia'),
(48, 5, 'Mobil', 722772, 'H.jpg', '', 'tersedia');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `nama`) VALUES
(1, 'Pakaian\r\n'),
(2, 'Elektronik'),
(3, 'Rumah Tangga'),
(4, 'Hobi'),
(5, 'Otomotif'),
(6, 'Kuliner');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `alamat` varchar(200) DEFAULT NULL,
  `ttl` date DEFAULT NULL,
  `nomor_hp` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `nama`, `email`, `password`, `alamat`, `ttl`, `nomor_hp`) VALUES
(1, 'nanda_123', 'Jefrian Arya Hernanda', 'jefrian@gmail.com', 'nanda123', 'Jombor Lor No. 41, RT02/RW18, Sinduadi, Mlati, Sleman', '2003-07-07', '081327424058'),
(14, 'nanda_1234', 'Jefrian Arya Hernanda', 'jefrianarya@gmail.com', '&lt;br /&gt;&lt;b&gt;Warning&lt;/b&gt;:  Undefined variable $password in &lt;b&gt;D:XAMPPhtdocsTubesProfileindex.php&lt;/b&gt; on line &lt;b&gt;133&lt;/b&gt;&lt;br /&gt;', '', '1970-01-01', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nama` (`nama`),
  ADD KEY `kategori_barang` (`kategori_id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `kategori_barang` FOREIGN KEY (`kategori_id`) REFERENCES `kategori` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
