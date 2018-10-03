-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 24, 2018 at 12:33 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `curier`
--

-- --------------------------------------------------------

--
-- Table structure for table `angajati`
--

CREATE TABLE `angajati` (
  `coda` int(5) NOT NULL,
  `nume` varchar(15) DEFAULT NULL,
  `prenume` varchar(15) DEFAULT NULL,
  `cnp` bigint(14) DEFAULT NULL,
  `adresa` varchar(30) DEFAULT NULL,
  `salariu` int(10) DEFAULT NULL,
  `codf` int(5) DEFAULT NULL,
  `username` varchar(15) DEFAULT NULL,
  `password` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `angajati`
--

INSERT INTO `angajati` (`coda`, `nume`, `prenume`, `cnp`, `adresa`, `salariu`, `codf`, `username`, `password`) VALUES
(3, 'Vasiliu', 'Valentin', 1970222170049, 'Galati', 5000, 1, 'admin', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `clienti`
--

CREATE TABLE `clienti` (
  `codcli` int(5) NOT NULL,
  `nume` varchar(15) DEFAULT NULL,
  `prenume` varchar(15) DEFAULT NULL,
  `cnp` int(14) DEFAULT NULL,
  `adresa` varchar(30) DEFAULT NULL,
  `telefon` int(10) DEFAULT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clienti`
--

INSERT INTO `clienti` (`codcli`, `nume`, `prenume`, `cnp`, `adresa`, `telefon`, `username`, `password`) VALUES
(11, 'sa', 'Val', 12355555, 'Galati', 7222648, 'vali1', 'vasa');

-- --------------------------------------------------------

--
-- Table structure for table `colet`
--

CREATE TABLE `colet` (
  `codc` int(10) NOT NULL,
  `codcli` int(6) DEFAULT NULL,
  `destinatar` varchar(30) DEFAULT NULL,
  `adr_dest` varchar(30) DEFAULT NULL,
  `preluare` date DEFAULT NULL,
  `predare` date DEFAULT NULL,
  `greutate` int(4) DEFAULT NULL,
  `suma` int(10) DEFAULT NULL,
  `coda` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `colet`
--

INSERT INTO `colet` (`codc`, `codcli`, `destinatar`, `adr_dest`, `preluare`, `predare`, `greutate`, `suma`, `coda`) VALUES
(4, 11, 'Popa', 'Galati', '2018-05-02', '2018-05-30', 12, 22, 3);

-- --------------------------------------------------------

--
-- Table structure for table `functie`
--

CREATE TABLE `functie` (
  `codf` int(5) NOT NULL,
  `denumire` varchar(30) DEFAULT NULL,
  `sal_min` int(10) DEFAULT NULL,
  `sal_max` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `functie`
--

INSERT INTO `functie` (`codf`, `denumire`, `sal_min`, `sal_max`) VALUES
(1, 'CEO', 4000, 10000),
(2, 'Curier', 1200, 5000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `angajati`
--
ALTER TABLE `angajati`
  ADD PRIMARY KEY (`coda`),
  ADD UNIQUE KEY `cnp` (`cnp`),
  ADD KEY `angajati_ibfk_1` (`codf`);

--
-- Indexes for table `clienti`
--
ALTER TABLE `clienti`
  ADD PRIMARY KEY (`codcli`),
  ADD UNIQUE KEY `cnp` (`cnp`);

--
-- Indexes for table `colet`
--
ALTER TABLE `colet`
  ADD PRIMARY KEY (`codc`),
  ADD KEY `codcli` (`codcli`) USING BTREE,
  ADD KEY `colet_ibfk_2` (`coda`);

--
-- Indexes for table `functie`
--
ALTER TABLE `functie`
  ADD PRIMARY KEY (`codf`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `angajati`
--
ALTER TABLE `angajati`
  MODIFY `coda` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `clienti`
--
ALTER TABLE `clienti`
  MODIFY `codcli` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `colet`
--
ALTER TABLE `colet`
  MODIFY `codc` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `angajati`
--
ALTER TABLE `angajati`
  ADD CONSTRAINT `angajati_ibfk_1` FOREIGN KEY (`codf`) REFERENCES `functie` (`codf`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Constraints for table `colet`
--
ALTER TABLE `colet`
  ADD CONSTRAINT `colet_ibfk_1` FOREIGN KEY (`codcli`) REFERENCES `clienti` (`codcli`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `colet_ibfk_2` FOREIGN KEY (`coda`) REFERENCES `angajati` (`coda`) ON DELETE SET NULL ON UPDATE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
