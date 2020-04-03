-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 03, 2020 at 10:52 PM
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
(7, 'brahim', 'maklofe', 'brahim.makloufe@gmail.com', '1996-12-15'),
(8, 'mohamed', 'daher', 'mohamed.daher@gmail.com', '1980-06-18'),
(10, 'mohamoud', 'abghour', 'mahmoude.abghoure@gmail.com', '1980-12-12'),
(11, 'karim', 'samoudi', 'karim.samoudi@gmail.com', '1976-04-29'),
(12, 'marouan', 'moussaid', 'marouan.moussaid@gmail.com', '1965-01-11'),
(13, 'aymane', 'bakire', 'aymane.bakire@gmail.com', '1990-07-07');

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
(1914575, 'R131238112', 'hajarr', 'gouchgache', '1999-09-08', 'hajar.gouchgache@gmail.com', 31),
(14574586, 'R131745200', 'oussama', 'faroq', '1998-07-06', 'oussama.farouq@gmail.com', 36),
(16154875, 'R141519788', 'oussama', 'bouanane', '1998-04-16', 'oussama.ouss1@gmail.com', 38),
(17148856, 'R140019714', 'ahmed', 'reda', '2000-04-15', 'ahmed.reda_01@gmail.com', 37),
(19147554, 'R1312184785', 'ayamn', 'darof-marwan', '1998-04-16', 'darof-marwan@gmail.com', 32),
(150013, 'R001515478', 'ayman', 'nadore', '1999-04-01', 'aymane.nadore@gmail.com', 31),
(17006034, 'R161715199', 'ziad', 'fellah', '1999-12-06', 'ziad.fellah@gmail.com', 35),
(1715482, 'R145821358', 'yahya', 'khalid', '1999-08-06', 'yahya.khalid@gmail.com', 35);

-- --------------------------------------------------------

--
-- Table structure for table `filiere`
--

DROP TABLE IF EXISTS `filiere`;
CREATE TABLE IF NOT EXISTS `filiere` (
  `id_filiere` int(5) NOT NULL AUTO_INCREMENT,
  `nom_filiere` varchar(50) NOT NULL,
  `responsable_id` int(5) NOT NULL,
  PRIMARY KEY (`id_filiere`),
  KEY `responsable_id` (`responsable_id`)
) ENGINE=MyISAM AUTO_INCREMENT=58 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `filiere`
--

INSERT INTO `filiere` (`id_filiere`, `nom_filiere`, `responsable_id`) VALUES
(31, 'sma', 7),
(32, 'smb', 11),
(35, 'smi', 10),
(36, 'smp', 12),
(37, 'smc', 3),
(38, 'smg', 8);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
