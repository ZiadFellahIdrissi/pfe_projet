-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 18, 2020 at 03:01 PM
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
  `username` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  PRIMARY KEY (`username`,`password`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `administrateur`
--

INSERT INTO `administrateur` (`username`, `password`) VALUES
('admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `assiste`
--

DROP TABLE IF EXISTS `assiste`;
CREATE TABLE IF NOT EXISTS `assiste` (
  `id_seance` int(11) NOT NULL,
  `id_etudiant` varchar(11) NOT NULL,
  `absent` tinyint(1) NOT NULL,
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
  `type` varchar(10) NOT NULL,
  `date` date NOT NULL,
  `h_debut` time NOT NULL,
  `h_fin` time NOT NULL,
  `id_module` int(11) NOT NULL,
  PRIMARY KEY (`id_controle`),
  KEY `id_module` (`id_module`)
) ENGINE=InnoDB AUTO_INCREMENT=104 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `controle`
--

INSERT INTO `controle` (`id_controle`, `type`, `date`, `h_debut`, `h_fin`, `id_module`) VALUES
(97, 'controle', '2020-06-10', '06:00:00', '10:00:00', 13),
(99, 'controle', '2020-06-18', '08:00:00', '10:00:00', 13),
(102, 'controle', '2020-06-17', '08:00:00', '10:00:00', 16),
(103, 'controle', '2020-06-26', '08:00:00', '09:00:00', 17);

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

--
-- Dumping data for table `dispose_de`
--

INSERT INTO `dispose_de` (`id_filiere`, `id_module`, `coeff_examen`, `coeff_controle`) VALUES
(1, 12, 0.4, 0.6),
(1, 13, 0.6, 0.04),
(1, 17, 0.4, 0.6),
(1, 18, 0.3, 0.7),
(1, 20, 0.7, 0.3),
(3, 14, 0.55, 0.2),
(3, 19, 0.4, 0.1),
(4, 15, 0.6, 0.2),
(4, 16, 0.7, 0.3);

-- --------------------------------------------------------

--
-- Table structure for table `etudiant`
--

DROP TABLE IF EXISTS `etudiant`;
CREATE TABLE IF NOT EXISTS `etudiant` (
  `id` varchar(11) NOT NULL,
  `somme` int(11) DEFAULT NULL,
  `cne` varchar(12) NOT NULL,
  `id_filiere` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `Etudiant_Idx` (`cne`),
  KEY `Etudiant_Filiere0_FK` (`id_filiere`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `etudiant`
--

INSERT INTO `etudiant` (`id`, `somme`, `cne`, `id_filiere`) VALUES
('1', NULL, 'R00000000', 1),
('12003', NULL, 'K131238000', 3),
('124', NULL, 'C154441030', 1),
('12555', NULL, 'F131547880', 1),
('14523', NULL, 'R151700203', 1),
('55', NULL, 'R131238116', 1),
('69420', NULL, 'K661518440', 3),
('770159', NULL, 'R100174009', 4),
('9785', NULL, 'M007600088', 3),
('BB150048', NULL, 'M128527110', 4),
('BC053048', NULL, 'L139638111', 3),
('BK153548', NULL, 'L152851111', 4),
('BL153500', NULL, 'T117416111', 4),
('BL153548', NULL, 'S106390110', 4),
('BM150008', NULL, 'L141749110', 4),
('WA15556666', NULL, 'F132554444', 4);

-- --------------------------------------------------------

--
-- Table structure for table `filiere`
--

DROP TABLE IF EXISTS `filiere`;
CREATE TABLE IF NOT EXISTS `filiere` (
  `id_filiere` int(11) NOT NULL AUTO_INCREMENT,
  `prix_formation` int(11) NOT NULL,
  `nom_filiere` varchar(100) NOT NULL,
  `id_responsable` varchar(11) NOT NULL,
  PRIMARY KEY (`id_filiere`),
  UNIQUE KEY `Filiere_Idx` (`nom_filiere`),
  KEY `Filiere_Personnel_FK` (`id_responsable`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `filiere`
--

INSERT INTO `filiere` (`id_filiere`, `prix_formation`, `nom_filiere`, `id_responsable`) VALUES
(1, 30000, 'Développement & Admin des BD (DAB)', '69'),
(3, 69420, 'Développement Mobile & Multimédia (DMM)', '2'),
(4, 521552, 'Administration Réseaux & Systémes (ARS)', '50');

-- --------------------------------------------------------

--
-- Table structure for table `module`
--

DROP TABLE IF EXISTS `module`;
CREATE TABLE IF NOT EXISTS `module` (
  `id_module` int(11) NOT NULL AUTO_INCREMENT,
  `heures_sem` int(11) NOT NULL,
  `intitule` varchar(100) NOT NULL,
  `id_enseignant` varchar(11) NOT NULL,
  `id_semestre` int(11) NOT NULL,
  PRIMARY KEY (`id_module`),
  UNIQUE KEY `Module_Idx` (`intitule`),
  KEY `Module_Personnel_FK` (`id_enseignant`),
  KEY `Module_Semestre0_FK` (`id_semestre`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `module`
--

INSERT INTO `module` (`id_module`, `heures_sem`, `intitule`, `id_enseignant`, `id_semestre`) VALUES
(12, 69, 'Methodologie de conception des SI', '1', 1),
(13, 68, 'Developpement BD (Forms& reports)', '18236', 2),
(14, 69, 'HTML5/CSS3', '152340', 1),
(15, 54, 'CCNP Route', '50', 1),
(16, 60, 'Architecture des ordinateurs', '18236', 1),
(17, 58, 'Ateliers Genie Logiciel', '18236', 1),
(18, 36, 'Administration de bases de données (DBA)', '50', 2),
(19, 30, 'Android Application Development', '152340', 2),
(20, 70, 'Techniques de communication', '50', 1);

-- --------------------------------------------------------

--
-- Table structure for table `passe`
--

DROP TABLE IF EXISTS `passe`;
CREATE TABLE IF NOT EXISTS `passe` (
  `id_etudiant` varchar(11) NOT NULL,
  `id_controle` int(11) NOT NULL,
  `note` float NOT NULL,
  PRIMARY KEY (`id_etudiant`,`id_controle`),
  KEY `id_controle` (`id_controle`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `personnel`
--

DROP TABLE IF EXISTS `personnel`;
CREATE TABLE IF NOT EXISTS `personnel` (
  `id` varchar(11) NOT NULL,
  `role` varchar(12) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `personnel`
--

INSERT INTO `personnel` (`id`, `role`) VALUES
('1', 'enseignant'),
('152340', 'enseignant'),
('18236', 'enseignant'),
('2', 'responsable'),
('50', 'responsable'),
('69', 'responsable');

-- --------------------------------------------------------

--
-- Table structure for table `seance`
--

DROP TABLE IF EXISTS `seance`;
CREATE TABLE IF NOT EXISTS `seance` (
  `id_seance` int(11) NOT NULL,
  `h_debut` time NOT NULL,
  `h_fin` time NOT NULL,
  `type` varchar(2) NOT NULL,
  `date_seance` date NOT NULL,
  `salle` varchar(30) NOT NULL,
  `id_module` int(11) NOT NULL,
  PRIMARY KEY (`id_seance`),
  UNIQUE KEY `Seance_Idx` (`date_seance`,`salle`),
  KEY `id_module` (`id_module`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(1, '1ère semestre', '2019-09-01', '2019-12-25'),
(2, '2ème semestre', '2020-01-15', '2020-05-01');

-- --------------------------------------------------------

--
-- Table structure for table `suit`
--

DROP TABLE IF EXISTS `suit`;
CREATE TABLE IF NOT EXISTS `suit` (
  `id_module` int(11) NOT NULL,
  `id_etudiant` varchar(11) NOT NULL,
  `note` float NOT NULL,
  `type` varchar(8) NOT NULL,
  PRIMARY KEY (`id_module`,`id_etudiant`),
  KEY `suit_Etudiant0_FK` (`id_etudiant`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id` varchar(11) NOT NULL,
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
-- Dumping data for table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `nom`, `prenom`, `date_naissance`, `password`, `telephone`, `email`, `username`, `imagepath`) VALUES
('1', 'Motazee', 'Nadori', '1968-05-17', '1234', '0614445100', 'Motazee_nadori@fsac.ma', 'ens0', ''),
('12003', 'El fathi', 'Safaa', '1999-12-19', 'ziad', '0731254090', 'saffa_elfathi@gmail.com', 'Safaa.El fathi-etu', 'avatar.svg'),
('124', 'Reda', 'Ahmed', '1999-12-15', NULL, '0790002010', '', NULL, ''),
('12555', 'Khalid', 'Yahya', '2020-05-21', 'yahya012', '0554100105', 'yahya_khalid@gmail.com', 'Yahya.Khalid-etu', '5ed8cabb3a4512.05077058.jpg'),
('14523', 'Gouchgache', 'Hajar', '1999-09-08', 'ziad', '0645874120', 'hajar01@gmail.com', 'Hajar.Gouchgache-etu', 'avatar.svg'),
('152340', 'Chakouri', 'Safaa', '1968-05-07', '1234', '0600154199', 'Chakouri_safaa_01@fsac.ac.ma', 'ens2', ''),
('18236', 'Marwani', 'Nourdine', '1960-05-06', '1234', '0781006419', 'Mar_Nourdine@fsac.ac.ma', 'ens1', ''),
('2', 'Azize', 'Raiss', '1976-05-11', '1234', '0154899710', 'aziz_raiss@fsac.ma', 'res0', ''),
('50', 'Meriem', 'El mandouri', '2020-05-07', '1234', '0654112100', 'meriem_elmandouri@fsaccom', 'res1', ''),
('55', 'Fellah-idrissi', 'Ziad', '1999-05-06', '123400', '0693986210', 'ziad.fe.zf@gmail.com', 'ziad.fellah-idrissi-etu', 'avatar.svg'),
('69', 'Mohamed', 'Abghoure', '2020-05-18', '1234', '0698521410', 'mohamed@fsac.ma', 'res2', ''),
('69420', 'Karim', 'Sinbati', '2020-05-14', 'karim147852', '0622224015', 'sinbati_01_karim@gmail.com', 'Sinbati.Karim-etu', 'avatar.svg'),
('770159', 'leyla', 'marin', '1999-06-09', 'ziad', '0685412500', 'marina_leyla@gmail.com', 'marin.leyla-etu', '5ee585f3687317.07377185.jpg'),
('9785', 'Choroq', 'Houda', '1999-12-15', 'houda12358', '0687595410', 'Houda@gmail.com', 'Houda.Choroq-etu', 'avatar.svg'),
('BB150048', 'Sanouri', 'Oussama', '1998-03-10', 'ziad', '0540051800', 'oussama_sanouri@gmail.com', 'oussama.sanouri-etu', 'avatar.svg'),
('BC053048', 'Zarwali', 'Haytem', '1999-08-25', 'ziad', '0749110000', 'haytem_zarwli@gmail.com', 'haytem.zarwali-etu', 'avatar.svg'),
('BK153548', 'Hamiry', 'Marouan', '2000-11-07', NULL, '0701010101', '', NULL, ''),
('BL153500', 'Safrioui', 'Jawad', '1998-06-18', 'ziad', '0545111801', 'jawad_safrioui@gmail.com', 'jawad.safrioui-etu', 'avatar.svg'),
('BL153548', 'Charkaoui', 'Meriem', '1999-06-18', 'ziad', '0645111800', 'meriem_charkaoui@gmail.com', 'meriem.charkaoui-etu', 'avatar.svg'),
('BM150008', 'Narchaqi', 'Soukaina', '1999-10-05', 'ziad', '0745101801', 'soukaina_ner@gmail.com', 'soukaina.narchaqi-etu', '5eeb7a10273cf4.08681162.jpg'),
('WA111510', 'rabii', 'sissi', '1999-12-02', 'ziad', '0645109800', 'sisi@rabi.com', 'sisi.rabi3-etu', 'avatar.svg'),
('WA15556666', 'Sanouri', 'Samir', '1999-06-25', '1234', '0611151871', 'samir@gmail.com', 'samir.sanouri-etu', '5eeb6d378da400.27717735.jpg');

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
  ADD CONSTRAINT `Controle_ibfk_1` FOREIGN KEY (`id_module`) REFERENCES `module` (`id_module`);

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
-- Constraints for table `personnel`
--
ALTER TABLE `personnel`
  ADD CONSTRAINT `Personnel_Utilisateur_FK` FOREIGN KEY (`id`) REFERENCES `utilisateur` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
