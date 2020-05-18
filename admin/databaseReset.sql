-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: May 18, 2020 at 07:15 AM
-- Server version: 5.7.26
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `Sql958586_5`
--

-- --------------------------------------------------------

--
-- Table structure for table `cronologia`
--

CREATE TABLE `cronologia` (
  `id` int(11) NOT NULL,
  `data` date DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `gita_definitiva`
--

CREATE TABLE `gita_definitiva` (
  `id` int(8) NOT NULL,
  `data_odierna` varchar(10) NOT NULL,
  `meta` varchar(32) NOT NULL,
  `data_gita` varchar(10) NOT NULL,
  `ora_partenza` varchar(8) NOT NULL,
  `ora_arrivo` varchar(8) NOT NULL,
  `mezzi` varchar(32) NOT NULL,
  `doc_resp` varchar(32) NOT NULL,
  `classe` varchar(16) NOT NULL,
  `n_alunni_freq` int(16) NOT NULL,
  `dueterzi` int(16) NOT NULL,
  `n_alunni_part` int(16) NOT NULL,
  `totale_studenti_part` int(16) NOT NULL,
  `doc_accom` varchar(256) NOT NULL,
  `insegnante` varchar(64) NOT NULL,
  `doc_sost` varchar(64) NOT NULL,
  `programma` varchar(2048) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `proposte`
--

CREATE TABLE `proposte` (
  `id` int(8) NOT NULL,
  `classe_name` varchar(8) NOT NULL,
  `istituto` varchar(6) NOT NULL,
  `meta` varchar(246) NOT NULL,
  `docenti_acc` varchar(256) NOT NULL,
  `docenti_sost` varchar(256) NOT NULL,
  `obbiettivi` varchar(1024) NOT NULL,
  `periodo_data` varchar(64) NOT NULL,
  `data_cdc` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `class_name` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `Email` varchar(35) NOT NULL,
  `Num_studenti` int(3) NOT NULL,
  `tipo` int(1) NOT NULL,
  `Indirizzo` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `class_name`, `password`, `Email`, `Num_studenti`, `tipo`, `Indirizzo`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'elisa.zinnamosca@gmail.com', 0, 1, ''),
(2, '1ALSSA', '8e07dafd13495561db9063ebe4db4b27', '', 0, 0, 'LSSA'),
(3, '1BLSSA', '8e07dafd13495561db9063ebe4db4b27', '', 0, 0, 'LSSA'),
(4, '2ALSSA', '8e07dafd13495561db9063ebe4db4b27', '', 0, 0, 'LSSA'),
(5, '2BLSSA', '8e07dafd13495561db9063ebe4db4b27', '', 0, 0, 'LSSA'),
(6, '3ALSSA', '8e07dafd13495561db9063ebe4db4b27', '', 0, 0, 'LSSA'),
(7, '3BLSSA', '8e07dafd13495561db9063ebe4db4b27', '', 0, 0, 'LSSA'),
(8, '4ALSSA', '8e07dafd13495561db9063ebe4db4b27', '', 0, 0, 'LSSA'),
(9, '4BLSSA', '8e07dafd13495561db9063ebe4db4b27', '', 0, 0, 'LSSA'),
(10, '1AITT', '8e07dafd13495561db9063ebe4db4b27', '', 0, 0, 'ITT'),
(11, '1BITT', '8e07dafd13495561db9063ebe4db4b27', '', 0, 0, 'ITT'),
(12, '1CITT', '8e07dafd13495561db9063ebe4db4b27', '', 0, 0, 'ITT'),
(13, '1DITT', '8e07dafd13495561db9063ebe4db4b27', '', 0, 0, 'ITT'),
(14, '1LITT', '8e07dafd13495561db9063ebe4db4b27', '', 0, 0, 'ITT'),
(15, '1SITT', '8e07dafd13495561db9063ebe4db4b27', '', 0, 0, 'ITT'),
(16, '1TITT', '8e07dafd13495561db9063ebe4db4b27', '', 0, 0, 'ITT'),
(17, '2AITT', '8e07dafd13495561db9063ebe4db4b27', '', 0, 0, 'ITT'),
(18, '2BITT', '8e07dafd13495561db9063ebe4db4b27', '', 0, 0, 'ITT'),
(19, '2CITT', '8e07dafd13495561db9063ebe4db4b27', '', 0, 0, 'ITT'),
(20, '2SITT', '8e07dafd13495561db9063ebe4db4b27', '', 0, 0, 'ITT'),
(21, '2TITT', '8e07dafd13495561db9063ebe4db4b27', '', 0, 0, 'ITT'),
(22, '3AITT', '8e07dafd13495561db9063ebe4db4b27', '', 0, 0, 'ITT'),
(23, '3BITT', 'e64b78fc3bc91bcbc7dc232ba8ec59e0', '', 0, 0, 'ITT'),
(24, '3CITT', '8e07dafd13495561db9063ebe4db4b27', '', 0, 0, 'ITT'),
(25, '4AITT', '8e07dafd13495561db9063ebe4db4b27', '', 0, 0, 'ITT'),
(26, '4BITT', '8e07dafd13495561db9063ebe4db4b27', '', 0, 0, 'ITT'),
(27, '4CITT', '8e07dafd13495561db9063ebe4db4b27', '', 0, 0, 'ITT'),
(28, '5AITT', '8e07dafd13495561db9063ebe4db4b27', '', 0, 0, 'ITT'),
(29, '5BITT', '8e07dafd13495561db9063ebe4db4b27', '', 0, 0, 'ITT'),
(30, '5CITT', '8e07dafd13495561db9063ebe4db4b27', '', 0, 0, 'ITT'),
(31, '1EIPSC', '8e07dafd13495561db9063ebe4db4b27', '', 0, 0, 'IPSC'),
(32, '1FIPSC', '8e07dafd13495561db9063ebe4db4b27', '', 0, 0, 'IPSC'),
(33, '2EIPSC', '8e07dafd13495561db9063ebe4db4b27', '', 0, 0, 'IPSC'),
(34, '2FIPSC', '8e07dafd13495561db9063ebe4db4b27', '', 0, 0, 'IPSC'),
(35, '3EIPSC', '8e07dafd13495561db9063ebe4db4b27', '', 0, 0, 'IPSC'),
(36, '3FIPSC', '8e07dafd13495561db9063ebe4db4b27', '', 0, 0, 'IPSC'),
(37, '4EIPSC', '8e07dafd13495561db9063ebe4db4b27', '', 0, 0, 'IPSC'),
(38, '4FIPSC', '8e07dafd13495561db9063ebe4db4b27', '', 0, 0, 'IPSC'),
(39, '5EIPSC', '8e07dafd13495561db9063ebe4db4b27', '', 0, 0, 'IPSC'),
(40, '5FIPSC', '44bdbb129cfa4d0c3e1032605f3f82cc', '', 0, 0, 'IPSC'),
(41, '5GIPSC', '8e07dafd13495561db9063ebe4db4b27', '', 0, 0, 'IPSC'),
(42, '1MIPIA', '8e07dafd13495561db9063ebe4db4b27', '', 0, 0, 'IPIA'),
(43, '1PIPIA', '8e07dafd13495561db9063ebe4db4b27', '', 0, 0, 'IPIA'),
(44, '2MIPIA', '8e07dafd13495561db9063ebe4db4b27', '', 0, 0, 'IPIA'),
(45, '2PIPIA', '8e07dafd13495561db9063ebe4db4b27', '', 0, 0, 'IPIA'),
(46, '3MIPIA', '8e07dafd13495561db9063ebe4db4b27', '', 0, 0, 'IPIA'),
(47, '3PIPIA', '8e07dafd13495561db9063ebe4db4b27', '', 0, 0, 'IPIA'),
(48, '4MIPIA', '8e07dafd13495561db9063ebe4db4b27', '', 0, 0, 'IPIA'),
(49, '5MIPIA', '8e07dafd13495561db9063ebe4db4b27', '', 0, 0, 'IPIA'),
(50, '5ALSSA', '8e07dafd13495561db9063ebe4db4b27', 'PROVVISORIA', 0, 0, 'LSSA'),
(51, '5BLSSA', '8e07dafd13495561db9063ebe4db4b27', 'PROVVISORIA', 0, 0, 'LSSA'),
(52, '3SITT', '8e07dafd13495561db9063ebe4db4b27', 'PROVVISORIA', 0, 0, 'ITT'),
(53, '5PIPIA', '8e07dafd13495561db9063ebe4db4b27', 'PROVVISORIA', 0, 0, 'IPIA'),
(54, '4CLSSA', '8e07dafd13495561db9063ebe4db4b27', '', 0, 0, 'LSSA'),
(55, '4LITT', '8e07dafd13495561db9063ebe4db4b27', '', 0, 0, 'ITT'),
(56, '4SITT', '8e07dafd13495561db9063ebe4db4b27', '', 0, 0, 'ITT'),
(57, '1RIPIA', '8e07dafd13495561db9063ebe4db4b27', '', 0, 0, 'IPIA'),
(58, '4PIPIA', '8e07dafd13495561db9063ebe4db4b27', '', 0, 0, 'IPIA'),
(59, '1GIPSC', '8e07dafd13495561db9063ebe4db4b27', '', 0, 0, 'IPSC'),
(60, '1CLSSA', '8e07dafd13495561db9063ebe4db4b27', '', 0, 0, 'LSSA'),
(61, '5CLSSA', '8e07dafd13495561db9063ebe4db4b27', '', 0, 0, 'LSSA'),
(62, '2GIPSC', '8e07dafd13495561db9063ebe4db4b27', '', 0, 0, 'IPSC'),
(63, '3DITT', '8e07dafd13495561db9063ebe4db4b27', '', 0, 0, 'ITT'),
(64, '2LITT', '8e07dafd13495561db9063ebe4db4b27', '', 0, 0, 'ITT'),
(65, '5LITT', '8e07dafd13495561db9063ebe4db4b27', '', 0, 0, 'ITT'),
(66, '5SITT', '8e07dafd13495561db9063ebe4db4b27', '', 0, 0, 'ITT');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cronologia`
--
ALTER TABLE `cronologia`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gita_definitiva`
--
ALTER TABLE `gita_definitiva`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `proposte`
--
ALTER TABLE `proposte`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cronologia`
--
ALTER TABLE `cronologia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `gita_definitiva`
--
ALTER TABLE `gita_definitiva`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `proposte`
--
ALTER TABLE `proposte`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=282;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;
