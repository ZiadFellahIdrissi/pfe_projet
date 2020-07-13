-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 12, 2020 at 02:35 PM
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
  `nom` varchar(11) NOT NULL,
  `prenom` varchar(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `imagepath` varchar(50) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  PRIMARY KEY (`username`,`password`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `administrateur`
--

INSERT INTO `administrateur` (`nom`, `prenom`, `email`, `imagepath`, `username`, `password`) VALUES
('abghoure', 'mohamed', 'abghoure.mohamed@fsac.ma', '5f088ee8d838f6.61955024.jpg', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `assiste`
--

DROP TABLE IF EXISTS `assiste`;
CREATE TABLE IF NOT EXISTS `assiste` (
  `id_seance` int(11) NOT NULL,
  `id_etudiant` varchar(8) NOT NULL,
  PRIMARY KEY (`id_seance`,`id_etudiant`),
  KEY `assiste_Etudiant0_FK` (`id_etudiant`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `controle`
--

DROP TABLE IF EXISTS `controle`;
CREATE TABLE IF NOT EXISTS `controle` (
  `id_controle` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(20) NOT NULL,
  `date` date NOT NULL,
  `h_debut` time NOT NULL,
  `h_fin` time NOT NULL,
  `salle` int(11) DEFAULT NULL,
  `id_module` int(11) NOT NULL,
  PRIMARY KEY (`id_controle`),
  KEY `id_module` (`id_module`),
  KEY `Controle_ibfk_2` (`salle`)
) ENGINE=InnoDB AUTO_INCREMENT=186 DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `demandes`
--

DROP TABLE IF EXISTS `demandes`;
CREATE TABLE IF NOT EXISTS `demandes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_etudiant` varchar(8) NOT NULL,
  `type` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `etat` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_id_etudiant` (`id_etudiant`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `dispose_de`
--

DROP TABLE IF EXISTS `dispose_de`;
CREATE TABLE IF NOT EXISTS `dispose_de` (
  `id_filiere` int(11) NOT NULL,
  `id_module` int(11) NOT NULL,
  `coeff_examen` float NOT NULL,
  `coeff_controle` float NOT NULL,
  PRIMARY KEY (`id_filiere`,`id_module`),
  KEY `dispose_de_Module0_FK` (`id_module`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `etudiant`
--

DROP TABLE IF EXISTS `etudiant`;
CREATE TABLE IF NOT EXISTS `etudiant` (
  `id` varchar(8) NOT NULL,
  `somme` int(11) DEFAULT NULL,
  `cne` varchar(10) NOT NULL,
  `id_filiere` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `Etudiant_Idx` (`cne`),
  KEY `Etudiant_Filiere0_FK` (`id_filiere`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `filiere`
--

DROP TABLE IF EXISTS `filiere`;
CREATE TABLE IF NOT EXISTS `filiere` (
  `id_filiere` int(11) NOT NULL AUTO_INCREMENT,
  `prix_formation` int(11) NOT NULL,
  `nom_filiere` varchar(100) NOT NULL,
  `id_responsable` varchar(8) NOT NULL,
  `etat` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_filiere`),
  UNIQUE KEY `Filiere_Idx` (`nom_filiere`),
  KEY `Filiere_Personnel_FK` (`id_responsable`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `module`
--

DROP TABLE IF EXISTS `module`;
CREATE TABLE IF NOT EXISTS `module` (
  `id_module` int(11) NOT NULL AUTO_INCREMENT,
  `heures_sem` int(11) NOT NULL,
  `intitule` varchar(100) NOT NULL,
  `id_enseignant` varchar(8) NOT NULL,
  `id_semestre` int(11) NOT NULL,
  `etat` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_module`),
  KEY `Module_Personnel_FK` (`id_enseignant`),
  KEY `Module_Semestre0_FK` (`id_semestre`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `passe`
--

DROP TABLE IF EXISTS `passe`;
CREATE TABLE IF NOT EXISTS `passe` (
  `id_etudiant` varchar(8) NOT NULL,
  `id_controle` int(11) NOT NULL,
  `note` float NOT NULL,
  PRIMARY KEY (`id_etudiant`,`id_controle`),
  KEY `pass_ibfk_1` (`id_controle`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `personnel`
--

DROP TABLE IF EXISTS `personnel`;
CREATE TABLE IF NOT EXISTS `personnel` (
  `id` varchar(8) NOT NULL,
  `som` varchar(10) DEFAULT NULL,
  `role` varchar(12) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `salle`
--

DROP TABLE IF EXISTS `salle`;
CREATE TABLE IF NOT EXISTS `salle` (
  `id_salle` int(5) NOT NULL AUTO_INCREMENT,
  `salle` varchar(20) NOT NULL,
  PRIMARY KEY (`id_salle`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `salle`
--

INSERT INTO `salle` (`id_salle`, `salle`) VALUES
(1, 'Amphi_B'),
(2, 'Amphi_D'),
(3, 'Amphi_A'),
(4, 'Amphi_C'),
(5, 'Amphi_E'),
(6, 'Amphi_K'),
(7, 'Salle 11');

-- --------------------------------------------------------

--
-- Table structure for table `seance`
--

DROP TABLE IF EXISTS `seance`;
CREATE TABLE IF NOT EXISTS `seance` (
  `id_seance` int(11) NOT NULL AUTO_INCREMENT,
  `h_debut` time NOT NULL,
  `h_fin` time NOT NULL,
  `date_seance` date NOT NULL,
  `salle` int(5) NOT NULL,
  `id_module` int(11) NOT NULL,
  PRIMARY KEY (`id_seance`),
  KEY `id_module` (`id_module`),
  KEY `Seance_ibfk_2` (`salle`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `semestre`
--

DROP TABLE IF EXISTS `semestre`;
CREATE TABLE IF NOT EXISTS `semestre` (
  `id_semestre` int(11) NOT NULL AUTO_INCREMENT,
  `semestre` varchar(13) NOT NULL,
  `date_debut` date NOT NULL,
  `date_fin` date NOT NULL,
  PRIMARY KEY (`id_semestre`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `semestre`
--

INSERT INTO `semestre` (`id_semestre`, `semestre`, `date_debut`, `date_fin`) VALUES
(1, '1ère semestre', '2019-09-01', '2019-12-20'),
(2, '2ème semestre', '2020-02-01', '2020-07-15');

-- --------------------------------------------------------

--
-- Table structure for table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id` varchar(8) NOT NULL,
  `nom` varchar(32) NOT NULL,
  `prenom` varchar(32) NOT NULL,
  `date_naissance` date NOT NULL,
  `password` varchar(40) DEFAULT NULL,
  `telephone` char(10) NOT NULL,
  `email` varchar(40) DEFAULT NULL,
  `username` varchar(40) DEFAULT NULL,
  `imagepath` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `Utilisateur_Idx` (`telephone`,`email`,`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `assiste`
--
ALTER TABLE `assiste`
  ADD CONSTRAINT `assiste_Etudiant0_FK` FOREIGN KEY (`id_etudiant`) REFERENCES `etudiant` (`id`),
  ADD CONSTRAINT `assiste_Seance_FK` FOREIGN KEY (`id_seance`) REFERENCES `seance` (`id_seance`);

--
-- Constraints for table `controle`
--
ALTER TABLE `controle`
  ADD CONSTRAINT `Controle_ibfk_1` FOREIGN KEY (`id_module`) REFERENCES `module` (`id_module`),
  ADD CONSTRAINT `Controle_ibfk_2` FOREIGN KEY (`salle`) REFERENCES `salle` (`id_salle`);

--
-- Constraints for table `demandes`
--
ALTER TABLE `demandes`
  ADD CONSTRAINT `FK_id_etudiant` FOREIGN KEY (`id_etudiant`) REFERENCES `etudiant` (`id`);

--
-- Constraints for table `dispose_de`
--
ALTER TABLE `dispose_de`
  ADD CONSTRAINT `dispose_de_Filiere_FK` FOREIGN KEY (`id_filiere`) REFERENCES `filiere` (`id_filiere`),
  ADD CONSTRAINT `dispose_de_Module0_FK` FOREIGN KEY (`id_module`) REFERENCES `module` (`id_module`);

--
-- Constraints for table `etudiant`
--
ALTER TABLE `etudiant`
  ADD CONSTRAINT `Etudiant_Filiere0_FK` FOREIGN KEY (`id_filiere`) REFERENCES `filiere` (`id_filiere`),
  ADD CONSTRAINT `Etudiant_Utilisateur_FK` FOREIGN KEY (`id`) REFERENCES `utilisateur` (`id`);

--
-- Constraints for table `filiere`
--
ALTER TABLE `filiere`
  ADD CONSTRAINT `Filiere_Personnel_FK` FOREIGN KEY (`id_responsable`) REFERENCES `personnel` (`id`);

--
-- Constraints for table `module`
--
ALTER TABLE `module`
  ADD CONSTRAINT `Module_Personnel_FK` FOREIGN KEY (`id_enseignant`) REFERENCES `personnel` (`id`),
  ADD CONSTRAINT `Module_Semestre0_FK` FOREIGN KEY (`id_semestre`) REFERENCES `semestre` (`id_semestre`);

--
-- Constraints for table `passe`
--
ALTER TABLE `passe`
  ADD CONSTRAINT `pass_ibfk_1` FOREIGN KEY (`id_controle`) REFERENCES `controle` (`id_controle`),
  ADD CONSTRAINT `passe_ibfk_2` FOREIGN KEY (`id_etudiant`) REFERENCES `etudiant` (`id`);

--
-- Constraints for table `personnel`
--
ALTER TABLE `personnel`
  ADD CONSTRAINT `personnel_ibfk_1` FOREIGN KEY (`id`) REFERENCES `utilisateur` (`id`);

--
-- Constraints for table `seance`
--
ALTER TABLE `seance`
  ADD CONSTRAINT `Seance_ibfk_1` FOREIGN KEY (`id_module`) REFERENCES `module` (`id_module`),
  ADD CONSTRAINT `Seance_ibfk_2` FOREIGN KEY (`salle`) REFERENCES `salle` (`id_salle`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
