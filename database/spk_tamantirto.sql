-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 18, 2024 at 12:09 AM
-- Server version: 5.7.33
-- PHP Version: 8.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spk_tamantirto`
--

-- --------------------------------------------------------

--
-- Table structure for table `hasil_perhitungan`
--

CREATE TABLE `hasil_perhitungan` (
  `id_perhitungan` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `id_indikator` int(11) NOT NULL,
  `tahun` varchar(4) NOT NULL,
  `hasil_keputusan` varchar(128) NOT NULL,
  `date_create` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `indikator`
--

CREATE TABLE `indikator` (
  `id_indikator` int(11) NOT NULL,
  `nama_indikator` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `indikator`
--

INSERT INTO `indikator` (`id_indikator`, `nama_indikator`) VALUES
(7, 'Sumber Daya Manusia (SDM)'),
(8, 'Potensi Kelembagaan (KL)'),
(9, 'Sarana dan Prasarana (PSR)'),
(10, 'Sumber Daya Alam (SDA)');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(8, 'Persawahan'),
(9, 'Perladangan'),
(10, 'Peternakan'),
(11, 'Perkebunan'),
(12, 'Pertambangan'),
(13, 'Kerajinan'),
(14, 'Industri Sedang/ Besar'),
(15, 'Perikanan'),
(16, 'Jasa/ Perdagangan');

-- --------------------------------------------------------

--
-- Table structure for table `padukuhan`
--

CREATE TABLE `padukuhan` (
  `id_padukuhan` int(11) NOT NULL,
  `nama_padukuhan` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `padukuhan`
--

INSERT INTO `padukuhan` (`id_padukuhan`, `nama_padukuhan`) VALUES
(7, 'Geblagan'),
(8, 'Gatak'),
(9, 'Ngebel'),
(10, 'Ngrame'),
(11, 'Jetis'),
(12, 'Jadan'),
(13, 'Brajan'),
(14, 'Gonjen'),
(15, 'Kasihan'),
(16, 'Kembaran');

-- --------------------------------------------------------

--
-- Table structure for table `pertanyaan`
--

CREATE TABLE `pertanyaan` (
  `id_pertanyaan` int(11) NOT NULL,
  `tanggal_survey` date NOT NULL,
  `id_surveyor` int(11) NOT NULL,
  `pertanyaan` varchar(512) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `id_indikator` int(11) NOT NULL,
  `id_padukuhan` int(11) NOT NULL,
  `skor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pertanyaan`
--

INSERT INTO `pertanyaan` (`id_pertanyaan`, `tanggal_survey`, `id_surveyor`, `pertanyaan`, `id_kategori`, `id_indikator`, `id_padukuhan`, `skor`) VALUES
(0, '2024-05-22', 2, 'Berapa persen dari pendduduk usia muda yang berminat jadi petani muda?', 9, 8, 7, 20),
(18, '2024-05-24', 3, 'Apakah rutin diadakan penyuluhan tentang tanaman ladan di desa ini?', 9, 9, 9, 50);

-- --------------------------------------------------------

--
-- Table structure for table `survey`
--

CREATE TABLE `survey` (
  `id_survey` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_pertanyaan` int(11) NOT NULL,
  `tanggal_survey` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role` enum('super_user','admin','user') NOT NULL,
  `is_active` int(11) NOT NULL,
  `date_create` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `image`, `password`, `role`, `is_active`, `date_create`) VALUES
(1, 'Admin', 'admin@mail.com', 'default.jpg', '$2y$10$vkRpX1y/U2YcCyGAgjGgM.MhEFKiKuFB6YywCW5Xdm/6cNNLHat9u', 'admin', 1, 1710131674),
(2, 'User', 'user@mail.com', 'default.jpg', '$2y$10$UfJOorvl1Qaq4n2L/drCZ.9vn.nVY4Z4SS4JGPVBZeJmw03wxvlKS', 'user', 1, 1710132125),
(3, 'Super User', 'su@mail.com', 'default.jpg', '$2y$10$TsnmU5oVrG8WpiKc2NcnUOU/tvI1Gjb0AROomlo9mx5YH0zW.VFKm', 'super_user', 1, 1710132254),
(4, 'yas', '123@mail.c', 'default.jpg', '$2y$10$W7Yo56NxHP2JrzkiigzQj.RkGnca58u9julBLDXvG0BV6suWTh4dm', 'user', 0, 1712651773),
(5, 'Oke', '123@mail.c', 'default.jpg', '$2y$10$qca7RVWadvmH6UUPAG4MG.NbMk7K72uYI7/WBk6zK/SaemrfEmq1q', 'user', 0, 1712651931),
(9, 'andy', 'andy@mail.com', 'default.jpg', '$2y$10$5NviRXf97idhcXV90gj4ZeQhOrEZyT0rH1AwFNP3fZ/PWS.WLyVN2', 'user', 1, 1713434480),
(11, 'Bagas Saputra', 'paribadi@mail.com', 'default.jpg', '$2y$10$SFKBrH6eLuMpzNaKrkNAKOwkrwBsr9AghK.FX03NsK5yJOw/aPMiq', 'admin', 1, 1713435283);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hasil_perhitungan`
--
ALTER TABLE `hasil_perhitungan`
  ADD PRIMARY KEY (`id_perhitungan`),
  ADD KEY `id_kategori` (`id_kategori`),
  ADD KEY `id_indikator` (`id_indikator`);

--
-- Indexes for table `indikator`
--
ALTER TABLE `indikator`
  ADD PRIMARY KEY (`id_indikator`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `padukuhan`
--
ALTER TABLE `padukuhan`
  ADD PRIMARY KEY (`id_padukuhan`);

--
-- Indexes for table `pertanyaan`
--
ALTER TABLE `pertanyaan`
  ADD PRIMARY KEY (`id_pertanyaan`),
  ADD KEY `pertanyaan_ibfk_1` (`id_kategori`),
  ADD KEY `pertanyaan_ibfk_2` (`id_padukuhan`),
  ADD KEY `id_surveyor` (`id_surveyor`),
  ADD KEY `id_indikator` (`id_indikator`);

--
-- Indexes for table `survey`
--
ALTER TABLE `survey`
  ADD PRIMARY KEY (`id_survey`),
  ADD KEY `id_pertanyaan` (`id_pertanyaan`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hasil_perhitungan`
--
ALTER TABLE `hasil_perhitungan`
  MODIFY `id_perhitungan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `indikator`
--
ALTER TABLE `indikator`
  MODIFY `id_indikator` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `padukuhan`
--
ALTER TABLE `padukuhan`
  MODIFY `id_padukuhan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `pertanyaan`
--
ALTER TABLE `pertanyaan`
  MODIFY `id_pertanyaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `survey`
--
ALTER TABLE `survey`
  MODIFY `id_survey` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `hasil_perhitungan`
--
ALTER TABLE `hasil_perhitungan`
  ADD CONSTRAINT `hasil_perhitungan_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `hasil_perhitungan_ibfk_2` FOREIGN KEY (`id_indikator`) REFERENCES `indikator` (`id_indikator`);

--
-- Constraints for table `pertanyaan`
--
ALTER TABLE `pertanyaan`
  ADD CONSTRAINT `pertanyaan_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pertanyaan_ibfk_2` FOREIGN KEY (`id_padukuhan`) REFERENCES `padukuhan` (`id_padukuhan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pertanyaan_ibfk_3` FOREIGN KEY (`id_surveyor`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pertanyaan_ibfk_4` FOREIGN KEY (`id_indikator`) REFERENCES `indikator` (`id_indikator`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `survey`
--
ALTER TABLE `survey`
  ADD CONSTRAINT `survey_ibfk_1` FOREIGN KEY (`id_pertanyaan`) REFERENCES `pertanyaan` (`id_pertanyaan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `survey_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
