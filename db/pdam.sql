-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 22 Mar 2018 pada 13.02
-- Versi Server: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pdam`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `waktu` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `username` varchar(11) NOT NULL,
  `email` text NOT NULL,
  `password` varchar(80) NOT NULL,
  `jabatan` text NOT NULL,
  `foto` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`waktu`, `username`, `email`, `password`, `jabatan`, `foto`) VALUES
('2018-02-25 15:04:44', 'Amir', 'amir@gmail.com', '202cb962ac59075b964b07152d234b70', 'Kepala Cabang', 'Screenshot (1).png'),
('2018-02-25 05:53:58', 'Budi Pribad', '', '202cb962ac59075b964b07152d234b70', '', '0'),
('2018-02-25 06:03:35', 'Farizal', 'febri@gmail.com', '202cb962ac59075b964b07152d234b70', 'Admin', 'banner.jpg'),
('2018-02-25 07:27:05', 'Imron', 'koba@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'Divisi LAB', 'banner.jpg'),
('2018-02-25 15:32:09', 'T.M Fikri', 'fikri@gmail.com', '202cb962ac59075b964b07152d234b70', 'Divisi IT', 'IMG_20180223_191834.jpg'),
('2018-03-22 08:50:09', 'Tami', 'tami', '202cb962ac59075b964b07152d234b70', 'Sekretaris', 'depo.PNG');

-- --------------------------------------------------------

--
-- Struktur dari tabel `monitoring`
--

CREATE TABLE `monitoring` (
  `id` int(11) NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ntu` float NOT NULL,
  `adc` int(30) NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `monitoring`
--

INSERT INTO `monitoring` (`id`, `waktu`, `ntu`, `adc`, `status`) VALUES
(1, '2018-03-22 03:53:38', 7, 4, '1'),
(2, '2018-03-22 04:22:49', 3, 890, '1'),
(3, '2018-03-22 08:45:52', 632.3, 234, '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `realtime`
--

CREATE TABLE `realtime` (
  `id` int(10) NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ntu` float NOT NULL,
  `adc` int(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `realtime`
--

INSERT INTO `realtime` (`id`, `waktu`, `ntu`, `adc`) VALUES
(0, '2018-03-22 04:27:30', 543, 32);

-- --------------------------------------------------------

--
-- Struktur dari tabel `reservoir`
--

CREATE TABLE `reservoir` (
  `id` int(11) NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `nturesv` float NOT NULL,
  `adc` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `reservoir`
--

INSERT INTO `reservoir` (`id`, `waktu`, `nturesv`, `adc`) VALUES
(1, '2018-03-22 03:23:20', 840.6, '0'),
(2, '2018-03-22 03:56:42', 840.6, '0'),
(3, '2018-03-22 04:30:14', 840.6, '0'),
(4, '2018-03-22 05:02:55', 839.54, '1'),
(5, '2018-03-22 05:36:08', 840.6, '0'),
(6, '2018-03-22 07:27:20', 840.6, '0'),
(7, '2018-03-22 07:59:59', 840.6, '0'),
(8, '2018-03-22 08:35:47', 839.54, '1'),
(9, '2018-03-22 09:09:45', 840.6, '0'),
(10, '2018-03-22 09:43:13', 836.38, '4'),
(11, '2018-03-22 10:16:26', 834.27, '6'),
(12, '2018-03-22 11:29:31', 840.6, '0'),
(13, '2018-03-22 11:31:07', 840.6, '0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `reservoir_realtime`
--

CREATE TABLE `reservoir_realtime` (
  `id` int(10) NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ntu` float NOT NULL,
  `adc` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `reservoir_realtime`
--

INSERT INTO `reservoir_realtime` (`id`, `waktu`, `ntu`, `adc`) VALUES
(0, '2018-03-22 11:29:34', 839.54, 1),
(0, '2018-03-22 11:29:38', 839.54, 1),
(0, '2018-03-22 11:29:42', 840.6, 0),
(0, '2018-03-22 11:29:46', 840.6, 0),
(0, '2018-03-22 11:29:49', 840.6, 0),
(0, '2018-03-22 11:29:53', 840.6, 0),
(0, '2018-03-22 11:29:57', 840.6, 0),
(0, '2018-03-22 11:30:00', 840.6, 0),
(0, '2018-03-22 11:30:04', 839.54, 1),
(0, '2018-03-22 11:30:08', 840.6, 0),
(0, '2018-03-22 11:30:12', 840.6, 0),
(0, '2018-03-22 11:30:16', 838.49, 2),
(0, '2018-03-22 11:30:20', 839.54, 1),
(0, '2018-03-22 11:30:24', 840.6, 0),
(0, '2018-03-22 11:30:28', 838.49, 2),
(0, '2018-03-22 11:30:31', 840.6, 0),
(0, '2018-03-22 11:30:35', 840.6, 0),
(0, '2018-03-22 11:31:10', 839.54, 1),
(0, '2018-03-22 11:31:14', 840.6, 0),
(0, '2018-03-22 11:31:18', 840.6, 0),
(0, '2018-03-22 11:31:22', 839.54, 1),
(0, '2018-03-22 11:31:26', 840.6, 0),
(0, '2018-03-22 11:31:30', 840.6, 0),
(0, '2018-03-22 11:31:34', 840.6, 0),
(0, '2018-03-22 11:31:37', 840.6, 0),
(0, '2018-03-22 11:31:41', 840.6, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `monitoring`
--
ALTER TABLE `monitoring`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `realtime`
--
ALTER TABLE `realtime`
  ADD PRIMARY KEY (`waktu`);

--
-- Indexes for table `reservoir`
--
ALTER TABLE `reservoir`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reservoir_realtime`
--
ALTER TABLE `reservoir_realtime`
  ADD PRIMARY KEY (`waktu`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `monitoring`
--
ALTER TABLE `monitoring`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `reservoir`
--
ALTER TABLE `reservoir`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
