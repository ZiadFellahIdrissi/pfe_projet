-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 23, 2020 at 06:52 PM
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
-- Database: `gestionfilieres`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrateur`
--

DROP TABLE IF EXISTS `administrateur`;
CREATE TABLE IF NOT EXISTS `administrateur` (
  `id` int(10) NOT NULL,
  `nom` varchar(40) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `pasword` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `administrateur`
--

INSERT INTO `administrateur` (`id`, `nom`, `prenom`, `username`, `pasword`) VALUES
(1, 'brahim', 'manwari', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `etudiant`
--

DROP TABLE IF EXISTS `etudiant`;
CREATE TABLE IF NOT EXISTS `etudiant` (
  `cin` varchar(20) NOT NULL,
  `cne` varchar(20) NOT NULL,
  `date_insc` date NOT NULL,
  `sommePaye` float NOT NULL,
  `infos` int(5) NOT NULL,
  `filiere` int(5) NOT NULL,
  PRIMARY KEY (`cin`),
  KEY `filiere` (`filiere`),
  KEY `infos` (`infos`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `etudiant`
--

INSERT INTO `etudiant` (`cin`, `cne`, `date_insc`, `sommePaye`, `infos`, `filiere`) VALUES
('bl153548', 'R131238116', '2020-09-19', 500, 1, 1);

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
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `filiere`
--

INSERT INTO `filiere` (`id_filiere`, `nom_filiere`, `responsable_id`) VALUES
(1, 'Developpement et Admin des BD', 2),
(2, 'Administration Reseaux et Systemes', 4),
(3, 'Developpement Mobile et Multimedia', 3),
(4, 'SI Appliques A la Gestion des Affaires', 6);

-- --------------------------------------------------------

--
-- Table structure for table `module`
--

DROP TABLE IF EXISTS `module`;
CREATE TABLE IF NOT EXISTS `module` (
  `id_module` int(5) NOT NULL AUTO_INCREMENT,
  `intitule` varchar(80) DEFAULT NULL,
  `id_enseignant` int(11) NOT NULL,
  `horaire` int(10) DEFAULT NULL,
  `id_filiere` int(5) NOT NULL,
  `semester` int(5) NOT NULL,
  PRIMARY KEY (`id_module`),
  KEY `fk_filiere` (`id_filiere`),
  KEY `semester` (`semester`),
  KEY `id_enseignant` (`id_enseignant`)
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `module`
--

INSERT INTO `module` (`id_module`, `intitule`, `id_enseignant`, `horaire`, `id_filiere`, `semester`) VALUES
(19, 'Administration de bases de donnees ', 4, 40, 1, 200),
(2, 'Developpement BD', 3, 62, 1, 200),
(3, 'Langage d interrogation des Bases de Donnees SQL', 4, 60, 1, 100),
(4, 'Methodologie de conception des SI', 18, 66, 1, 100),
(5, 'Administration Linux & Virtualisation', 6, 52, 2, 200),
(6, 'CCNP Switch et Tshoot', 12, 55, 2, 200),
(7, 'Architecture des ordinateurs', 10, 50, 2, 100),
(21, 'Programmation Objet', 12, 65, 2, 100),
(22, 'HTML5/CSS3', 7, 42, 3, 100),
(23, 'Android Application Development', 19, 50, 3, 200),
(24, 'Fondamentaux de creation de jeux', 12, 75, 3, 200),
(25, 'Traitement des elements 2D et 3D', 13, 56, 3, 100),
(26, 'Creations des sites marchands', 14, 70, 4, 100),
(27, 'Marketing et management des organisations', 20, 68, 4, 100),
(28, 'Droit des societes', 6, 66, 4, 200),
(29, 'Outils informatiques pour la gestion et statistiques', 10, 60, 4, 200),
(31, 'Gestion de projets', 2, 50, 2, 200);

-- --------------------------------------------------------

--
-- Table structure for table `personnel`
--

DROP TABLE IF EXISTS `personnel`;
CREATE TABLE IF NOT EXISTS `personnel` (
  `cin` varchar(20) NOT NULL,
  `role` varchar(20) NOT NULL,
  `infos` int(5) NOT NULL,
  PRIMARY KEY (`cin`),
  KEY `infos` (`infos`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `personnel`
--

INSERT INTO `personnel` (`cin`, `role`, `infos`) VALUES
('bl151219', 'responsable', 2),
('bk160017', 'responsable', 3),
('ct152106', 'responsable', 4),
('bb154710', 'responsable', 5),
('bs120013', 'enseignant', 6);

-- --------------------------------------------------------

--
-- Table structure for table `semester`
--

DROP TABLE IF EXISTS `semester`;
CREATE TABLE IF NOT EXISTS `semester` (
  `id_sem` int(5) NOT NULL,
  `nom_sem` varchar(15) NOT NULL,
  `date_debut` date DEFAULT NULL,
  `date_fin` date DEFAULT NULL,
  PRIMARY KEY (`id_sem`),
  UNIQUE KEY `nom_sem` (`nom_sem`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `semester`
--

INSERT INTO `semester` (`id_sem`, `nom_sem`, `date_debut`, `date_fin`) VALUES
(100, '1er Semester', '2020-09-12', '2021-01-01'),
(200, '2eme Semester', '2021-02-01', '2021-06-01');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `prenom` varchar(70) NOT NULL,
  `nom` varchar(70) NOT NULL,
  `date_naissence` date NOT NULL,
  `telephone` varchar(50) NOT NULL,
  `adresse` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `pasword` varchar(50) NOT NULL,
  `imagePath` varchar(100) NOT NULL,
  `etat_image` int(2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `prenom`, `nom`, `date_naissence`, `telephone`, `adresse`, `email`, `username`, `pasword`, `imagePath`, `etat_image`) VALUES
(1, 'ziad', 'fellah-idrissi', '1999-05-19', '0666589724', '', 'ziad.fe@gmail.com', 'ziad.fellahidrissi.etu', 'ziadfellahidrissi', '', 0),
(2, 'mohamed', 'abghoure', '1974-05-19', '0514295874', '', 'mohamed.abghoure@gmail.com', 'mohamed_abghoure', 'respo123456', '', 0),
(3, 'amine', 'mrabte', '1982-05-19', '0666041240', '', 'amine_mrabte@gmail.com', 'amine_mrabte', 'respo123456', '', 0),
(4, 'nourdine', 'sakire', '1973-05-12', '0698521410', '', 'nourdine.sakire@gmail.com', 'nourdine_sakire@gmail.com', 'respo123456', '', 0),
(5, 'kaltoum', 'darqaoui', '1969-05-18', '0641158730', '', 'kaltoum.darqaoui@gmail.com', 'kamtoum_darqaoui', 'respo123456', '', 0),
(6, 'samira', 'banghazi', '1987-05-18', '0600290670', '', 'samira.banghazi@gmail.com', 'samira_banghazi', 'prof123456', '', 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
