-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 22, 2019 at 04:03 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sia_ft`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`) VALUES
(1, 'agustiawan', '21232f297a57a5a743894a0e4a801fc3'),
(2, 'satria', '477054c78baea7a1242f79d898a2ca46');

-- --------------------------------------------------------

--
-- Table structure for table `alumni`
--

CREATE TABLE `alumni` (
  `nim` varchar(30) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `alamat` varchar(20) NOT NULL,
  `nomor_hp` varchar(20) NOT NULL,
  `tahun_masuk` varchar(4) NOT NULL,
  `tahun_lulus` varchar(4) NOT NULL,
  `id_jurusan` int(3) NOT NULL,
  `id_admin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `alumni`
--

INSERT INTO `alumni` (`nim`, `nama`, `alamat`, `nomor_hp`, `tahun_masuk`, `tahun_lulus`, `id_jurusan`, `id_admin`) VALUES
('21020113120066', 'ANASTASIA CHANDRA LA', 'Padang Sidimpuan', '85242376058', '2013', '2018', 306, 1),
('21020113140112', 'FIRSYA DIFTINANDA', 'Pati', '85242376070', '2013', '2018', 302, 1),
('21030111120027', 'TEGAR FAUZIYYAH PERM', 'Bogor', '85242376076', '2011', '2018', 303, 1),
('21030112130084', 'MUHAMMAD DZIKRI HANI', 'Bekasi', '85242376077', '2012', '2018', 303, 1),
('21040113120014', 'GILANG RIZKI RAMADHA', 'Padang Sidimpuan', '85242376199', '2013', '2018', 304, 1),
('21040113120015', 'FANNY SIMANJUNTAK', 'Tarutung', '85242376200', '2013', '2018', 304, 1),
('21040113130079', 'MUHAMMAD AUSTIN A', 'Semarang', '85242376220', '2013', '2018', 304, 1),
('21120113130066', 'SATRIAJATI ARDHENTA', 'Probolinggo', '85242376410', '2013', '2018', 312, 1),
('21120113130068', 'DUTA ADICAHYA DARMAW', 'Surabaya', '85242376411', '2013', '2018', 312, 1),
('21120113130077', 'TRI SETYO OKDIYANTO', 'Denpasar', '85242376412', '2013', '2018', 312, 1),
('21120116120009', 'Agustiawan', 'kendal', '0896888868567', '2016', '2020', 312, 1),
('2112011718911', 'EKKI FEBRI TRIANTO', 'Aceh', '85242376008', '2012', '2018', 301, 1);

-- --------------------------------------------------------

--
-- Stand-in structure for view `dbalumni`
-- (See below for the actual view)
--
CREATE TABLE `dbalumni` (
`nim` varchar(30)
,`nama` varchar(20)
,`alamat` varchar(20)
,`nomor_hp` varchar(20)
,`tahun_masuk` varchar(4)
,`tahun_lulus` varchar(4)
,`nama_jurusan` varchar(255)
);

-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--

CREATE TABLE `jurusan` (
  `id_jurusan` int(3) NOT NULL,
  `nama_jurusan` varchar(255) NOT NULL,
  `akreditasi` varchar(20) NOT NULL,
  `no_telp` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jurusan`
--

INSERT INTO `jurusan` (`id_jurusan`, `nama_jurusan`, `akreditasi`, `no_telp`) VALUES
(301, 'Teknik Sipil', 'A', '024 - 7460067'),
(302, 'Arsitektur', 'A', '024 - 7460042'),
(303, 'Teknik Kimia', 'A', '024 - 7460897'),
(304, 'PWK', 'A', '024 - 7460074'),
(305, 'Teknik Mesin', 'A', '024 - 7460153'),
(306, 'Teknik Elektro', 'A', '024 - 7460536'),
(307, 'Teknik Industri', 'A', '024 - 7460062'),
(308, 'Teknik Lingkungan', 'A', '024 - 7460087'),
(309, 'Teknik Perkapalan', 'A', '024 - 7460008'),
(310, 'Teknik Geologi', 'A', '024 - 7460059'),
(311, 'Teknik Geodesi', 'B', '024 - 7460051'),
(312, 'Sistem Komputer', 'B', '024 - 7460100');

-- --------------------------------------------------------

--
-- Structure for view `dbalumni`
--
DROP TABLE IF EXISTS `dbalumni`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `dbalumni`  AS  select `a`.`nim` AS `nim`,`a`.`nama` AS `nama`,`a`.`alamat` AS `alamat`,`a`.`nomor_hp` AS `nomor_hp`,`a`.`tahun_masuk` AS `tahun_masuk`,`a`.`tahun_lulus` AS `tahun_lulus`,`j`.`nama_jurusan` AS `nama_jurusan` from (`alumni` `a` left join `jurusan` `j` on((`a`.`id_jurusan` = `j`.`id_jurusan`))) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `alumni`
--
ALTER TABLE `alumni`
  ADD PRIMARY KEY (`nim`),
  ADD KEY `id_jurusan` (`id_jurusan`),
  ADD KEY `id_admin` (`id_admin`);

--
-- Indexes for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id_jurusan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `id_jurusan` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=313;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `alumni`
--
ALTER TABLE `alumni`
  ADD CONSTRAINT `alumni_ibfk_1` FOREIGN KEY (`id_jurusan`) REFERENCES `jurusan` (`id_jurusan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `alumni_ibfk_2` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id_admin`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
