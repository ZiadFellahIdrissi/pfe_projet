-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 30, 2020 at 09:07 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gestion_filieres_formation`
--

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

DROP TABLE IF EXISTS `department`;
CREATE TABLE IF NOT EXISTS `department` (
  `id_department` int(5) NOT NULL,
  `nom_department` varchar(50) NOT NULL,
  `chefDepatment_id` int(5) NOT NULL,
  PRIMARY KEY (`id_department`),
  KEY `chefDepatment_id` (`chefDepatment_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id_department`, `nom_department`, `chefDepatment_id`) VALUES
(1, 'departement physique chimique', 2),
(2, 'departement mathematique informatique', 6),
(3, 'department biologie ', 5);

-- --------------------------------------------------------

--
-- Table structure for table `enseignant`
--

DROP TABLE IF EXISTS `enseignant`;
CREATE TABLE IF NOT EXISTS `enseignant` (
  `id_enseignant` int(5) NOT NULL,
  `nom_enseignant` varchar(50) NOT NULL,
  `prenom_enseignant` varchar(50) NOT NULL,
  `email_enseignant` varchar(50) DEFAULT NULL,
  `date_naissance_enseignant` date NOT NULL,
  PRIMARY KEY (`id_enseignant`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `enseignant`
--

INSERT INTO `enseignant` (`id_enseignant`, `nom_enseignant`, `prenom_enseignant`, `email_enseignant`, `date_naissance_enseignant`) VALUES
(1, 'azize', 'maktabe', 'azizi.maktabe@gmail.com', '1980-06-12'),
(2, 'amine', 'mrabte', 'amine.mrabte@gmail.com', '1980-06-12'),
(3, 'aymane', 'nadire', 'aymane.nadire@gmail.com', '1980-06-03'),
(4, 'fouad', 'khalid', 'fouad.khalid@gmail.com', '1960-04-03'),
(5, 'mohamed', 'shaqi', 'mohamed.shaqi@gmail.com', '1990-08-04'),
(6, 'azize', 'mandoure', 'azizi.mandoure@gmail.com', '1988-01-04'),
(7, 'brahim', 'maklofe', 'brahim.makloufe@gmail.com', '1996-12-15');

-- --------------------------------------------------------

--
-- Table structure for table `etudiant`
--

DROP TABLE IF EXISTS `etudiant`;
CREATE TABLE IF NOT EXISTS `etudiant` (
  `code_apoge` int(10) NOT NULL,
  `cin` varchar(20) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `date_naissance` date NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `id_filiere` int(5) NOT NULL,
  PRIMARY KEY (`code_apoge`),
  UNIQUE KEY `cin` (`cin`),
  KEY `id_filiere` (`id_filiere`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `etudiant`
--

INSERT INTO `etudiant` (`code_apoge`, `cin`, `nom`, `prenom`, `date_naissance`, `email`, `id_filiere`) VALUES
(1748242, 'bl154785', 'ziad', 'fellah', '1999-06-18', 'ziad.fe.zf@gmail.com', 6),
(1741742, 'bl134185', 'yahya', 'khalid', '1999-12-10', 'yahya.khalid@gmail.com', 6),
(1947000, 'bc158111', 'aymane', 'fatihe', '1999-12-12', 'aymanefatihe@gmail.com', 1),
(1940002, 'bb702701', 'hajar', 'gouchgache', '1999-08-09', 'hajar.gouchgache@gmail.com', 6);

-- --------------------------------------------------------

--
-- Table structure for table `filiere`
--

DROP TABLE IF EXISTS `filiere`;
CREATE TABLE IF NOT EXISTS `filiere` (
  `id_filiere` int(5) NOT NULL AUTO_INCREMENT,
  `nom_filiere` varchar(50) NOT NULL,
  `responsable_id` int(5) NOT NULL,
  `departement_id` int(5) NOT NULL,
  PRIMARY KEY (`id_filiere`),
  KEY `responsable_id` (`responsable_id`),
  KEY `departement_id` (`departement_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `filiere`
--

INSERT INTO `filiere` (`id_filiere`, `nom_filiere`, `responsable_id`, `departement_id`) VALUES
(1, 'smp', 1, 1),
(5, 'sma', 7, 2),
(4, 'smc', 3, 1),
(6, 'smi', 4, 2);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
