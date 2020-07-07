-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 07, 2020 at 09:00 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
-- Table structure for table `Administrateur`
--

CREATE TABLE `Administrateur` (
  `username` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Administrateur`
--

INSERT INTO `Administrateur` (`username`, `password`) VALUES
('admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `assiste`
--

CREATE TABLE `assiste` (
  `id_seance` int(11) NOT NULL,
  `id_etudiant` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `assiste`
--

INSERT INTO `assiste` (`id_seance`, `id_etudiant`) VALUES
(13, 'AB629501'),
(13, 'AC639502');

-- --------------------------------------------------------

--
-- Table structure for table `Controle`
--

CREATE TABLE `Controle` (
  `id_controle` int(11) NOT NULL,
  `type` varchar(10) NOT NULL,
  `date` date NOT NULL,
  `h_debut` time NOT NULL,
  `h_fin` time NOT NULL,
  `id_module` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Controle`
--

INSERT INTO `Controle` (`id_controle`, `type`, `date`, `h_debut`, `h_fin`, `id_module`) VALUES
(1, 'finale', '2020-07-01', '02:02:11', '03:02:11', 14),
(109, 'controle', '2020-07-06', '00:00:00', '01:00:00', 14),
(110, 'controle', '2020-07-07', '13:00:00', '14:00:00', 14);

-- --------------------------------------------------------

--
-- Table structure for table `Demandes`
--

CREATE TABLE `Demandes` (
  `id` int(11) NOT NULL,
  `id_etudiant` varchar(8) NOT NULL,
  `type` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `etat` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Demandes`
--

INSERT INTO `Demandes` (`id`, `id_etudiant`, `type`, `date`, `etat`) VALUES
(1, 'AA555555', 'une attestation scolaire', '2020-07-08', -1),
(25, 'AA555555', 'un relevé de notes', '2020-07-07', 0),
(26, 'AA555555', 'un relevé de notes', '2020-07-07', 1);

-- --------------------------------------------------------

--
-- Table structure for table `dispose_de`
--

CREATE TABLE `dispose_de` (
  `id_filiere` int(11) NOT NULL,
  `id_module` int(11) NOT NULL,
  `coeff_examen` float NOT NULL,
  `coeff_controle` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dispose_de`
--

INSERT INTO `dispose_de` (`id_filiere`, `id_module`, `coeff_examen`, `coeff_controle`) VALUES
(1, 10, 0.6, 0.4),
(1, 11, 0.5, 0.5),
(1, 12, 0.6, 0.4),
(1, 13, 0.6, 0.4),
(1, 14, 0.8, 0.2),
(1, 15, 0.6, 0.4),
(1, 16, 0.6, 0.4),
(1, 17, 0.7, 0.3),
(1, 18, 0.9, 0.1),
(2, 20, 0.7, 0.3),
(2, 21, 0.6, 0.4),
(2, 22, 0.6, 0.4),
(2, 24, 0.6, 0.4),
(2, 25, 0.8, 0.2),
(3, 1, 0.7, 0.3),
(3, 2, 0.6, 0.4),
(3, 3, 0.8, 0.2),
(3, 4, 0.7, 0.3),
(3, 5, 0.6, 0.4),
(3, 6, 0.6, 0.4),
(3, 7, 0.5, 0.5),
(3, 8, 0.8, 0.2),
(3, 9, 0.5, 0.5),
(4, 42, 0.7, 0.3),
(4, 43, 0.6, 0.4);

-- --------------------------------------------------------

--
-- Table structure for table `Etudiant`
--

CREATE TABLE `Etudiant` (
  `id` varchar(8) NOT NULL,
  `somme` int(11) DEFAULT NULL,
  `cne` varchar(10) NOT NULL,
  `id_filiere` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Etudiant`
--

INSERT INTO `Etudiant` (`id`, `somme`, `cne`, `id_filiere`) VALUES
('AA555555', NULL, 'R131238116', 1),
('AB629501', NULL, 'R131238119', 1),
('AC639502', NULL, 'R131238117', 1),
('AD649503', NULL, 'R131238118', 1),
('AE659504', NULL, 'R131238000', 2),
('AF669505', NULL, 'R131238011', 2),
('AG679566', NULL, 'R130038111', 2),
('AH689567', NULL, 'R001238555', 2),
('AI121218', NULL, 'B131238999', 3),
('AJ111519', NULL, 'B131200911', 3),
('AK111510', NULL, 'B131138008', 3),
('AL156511', NULL, 'B112338456', 3);

-- --------------------------------------------------------

--
-- Table structure for table `Filiere`
--

CREATE TABLE `Filiere` (
  `id_filiere` int(11) NOT NULL,
  `prix_formation` int(11) NOT NULL,
  `nom_filiere` varchar(100) NOT NULL,
  `id_responsable` varchar(8) NOT NULL,
  `etat` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Filiere`
--

INSERT INTO `Filiere` (`id_filiere`, `prix_formation`, `nom_filiere`, `id_responsable`, `etat`) VALUES
(1, 30000, 'Developpement & Admin des BD (DAB)', 'CC101524', 1),
(2, 35000, 'Administration Reseaux & Systemes (ARS)\r\n', 'WA111588', 1),
(3, 40000, 'Developpement Mobile & Multimedia (DMM)', 'CD699525', 1),
(4, 25000, 'filiere pour test', 'BJ121221', 1);

-- --------------------------------------------------------

--
-- Table structure for table `Module`
--

CREATE TABLE `Module` (
  `id_module` int(11) NOT NULL,
  `heures_sem` int(11) NOT NULL,
  `intitule` varchar(100) NOT NULL,
  `id_enseignant` varchar(8) NOT NULL,
  `id_semestre` int(11) NOT NULL,
  `etat` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Module`
--

INSERT INTO `Module` (`id_module`, `heures_sem`, `intitule`, `id_enseignant`, `id_semestre`, `etat`) VALUES
(1, 65, 'HTML5/CSS3', 'BA699512', 1, 1),
(2, 68, 'Traitement des elements 2D et 3D', 'BA699512', 1, 1),
(3, 70, 'Techniques de traitement d images et de la video', 'BB699513', 1, 1),
(4, 59, 'Methode de conception et d analyse', 'BB699513', 1, 1),
(5, 68, 'Programmation Objet', 'CD699525', 1, 1),
(6, 72, 'Android Application Development', 'CD699525', 2, 1),
(7, 67, 'Developpement de sites web dynamiques (PHP5)', 'BA699512', 2, 1),
(8, 70, 'Fondamentaux de creation de jeux', 'BB699513', 2, 1),
(9, 68, 'Techniques de communication', 'BB699513', 2, 1),
(10, 72, 'Methodologie de conception des SI', 'BC699514', 1, 1),
(11, 68, 'Techniques de communication', 'BC699514', 1, 1),
(12, 56, 'Ateliers Genie Logiciel', 'BD699515', 1, 1),
(13, 67, 'Implementation des bases de donnees relationnelles', 'BD699515', 1, 1),
(14, 72, 'Langage dinterrogation des Bases de Donnees (SQL Oracle)', 'CC101524', 1, 1),
(15, 60, 'Infrastructure Windows', 'BD699515', 1, 1),
(16, 50, 'Developpement BD (Forms & reports)', 'BC699514', 2, 1),
(17, 59, 'Gestion de projets', 'BD699515', 2, 1),
(18, 70, 'Administration de bases de donnees (DBA)', 'CC101524', 2, 1),
(19, 73, 'Programmation Objet', 'BF699517', 1, 1),
(20, 78, 'Architecture des ordinateurs', 'BF699517', 1, 1),
(21, 69, 'CCNP Route', 'BE699516', 1, 1),
(22, 70, 'Configuration dune infrastructure Active Directory avec Windows Server', 'WA111588', 1, 1),
(24, 68, 'CCNP Switch&Tshoot', 'BE699516', 2, 1),
(25, 50, 'Administration Linux & Virtualisation', 'BF699517', 2, 1),
(42, 70, 'module test_0', '', 1, 0),
(43, 68, 'module test_1', '', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `passe`
--

CREATE TABLE `passe` (
  `id_etudiant` varchar(8) NOT NULL,
  `id_controle` int(11) NOT NULL,
  `note` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `passe`
--

INSERT INTO `passe` (`id_etudiant`, `id_controle`, `note`) VALUES
('AA555555', 109, 5),
('AB629501', 109, 6);

-- --------------------------------------------------------

--
-- Table structure for table `Personnel`
--

CREATE TABLE `Personnel` (
  `id` varchar(8) NOT NULL,
  `som` varchar(10) DEFAULT NULL,
  `role` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Personnel`
--

INSERT INTO `Personnel` (`id`, `som`, `role`) VALUES
('BA699512', 'P331010101', 'enseignant'),
('BB699513', 'S331010101', 'enseignant'),
('BC699514', 'L331055501', 'enseignant'),
('BD699515', 'M331015555', 'enseignant'),
('BE699516', 'A331077010', 'enseignant'),
('BF699517', 'V337770101', 'enseignant'),
('BG009518', 'Y771110101', 'enseignant'),
('BH019519', 'O001019875', 'enseignant'),
('BI079520', 'D015412589', 'enseignant'),
('BJ121221', 'S556699101', 'responsable'),
('BK121212', 'P141010101', 'enseignant'),
('CC101524', 'K547511011', 'responsable'),
('CD699525', 'H141123002', 'responsable'),
('WA111588', 'Z141010199', 'responsable');

-- --------------------------------------------------------

--
-- Table structure for table `salle`
--

CREATE TABLE `salle` (
  `id_salle` int(5) NOT NULL,
  `salle` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `salle`
--

INSERT INTO `salle` (`id_salle`, `salle`) VALUES
(1, 'ziad');

-- --------------------------------------------------------

--
-- Table structure for table `Seance`
--

CREATE TABLE `Seance` (
  `id_seance` int(11) NOT NULL,
  `h_debut` time NOT NULL,
  `h_fin` time NOT NULL,
  `date_seance` date NOT NULL,
  `salle` varchar(15) NOT NULL,
  `id_module` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Seance`
--

INSERT INTO `Seance` (`id_seance`, `h_debut`, `h_fin`, `date_seance`, `salle`, `id_module`) VALUES
(3, '08:00:00', '09:30:00', '2020-07-06', 'amphi 1', 12),
(4, '09:30:00', '11:00:00', '2020-07-07', 'amphi 1', 12),
(5, '12:30:00', '14:30:00', '2020-07-06', 'amphi 1', 13),
(6, '15:30:00', '17:00:00', '2020-07-06', 'amphi 1', 16),
(7, '13:30:00', '15:00:00', '2020-07-08', 'amphi 1', 17),
(8, '08:30:00', '09:00:00', '2020-07-08', 'amphi 1', 10),
(9, '08:30:00', '09:00:00', '2020-07-09', 'amphi 1', 10),
(10, '09:30:00', '10:30:00', '2020-07-09', '', 16),
(11, '10:30:00', '11:30:00', '2020-07-10', 'amphi 3', 10),
(12, '11:30:00', '12:30:00', '2020-07-08', 'amphi 4', 16),
(13, '11:00:00', '12:30:00', '2020-07-11', 'amphi 3', 18);

-- --------------------------------------------------------

--
-- Table structure for table `Semestre`
--

CREATE TABLE `Semestre` (
  `id_semestre` int(11) NOT NULL,
  `semestre` varchar(13) NOT NULL,
  `date_debut` date NOT NULL,
  `date_fin` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Semestre`
--

INSERT INTO `Semestre` (`id_semestre`, `semestre`, `date_debut`, `date_fin`) VALUES
(1, '1ère semestre', '2019-09-01', '2019-12-25'),
(2, '2ème semestre', '2020-01-15', '2020-05-01');

-- --------------------------------------------------------

--
-- Table structure for table `Utilisateur`
--

CREATE TABLE `Utilisateur` (
  `id` varchar(8) NOT NULL,
  `nom` varchar(32) NOT NULL,
  `prenom` varchar(32) NOT NULL,
  `date_naissance` date NOT NULL,
  `password` varchar(40) DEFAULT NULL,
  `telephone` char(10) NOT NULL,
  `email` varchar(40) DEFAULT NULL,
  `username` varchar(40) DEFAULT NULL,
  `imagepath` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Utilisateur`
--

INSERT INTO `Utilisateur` (`id`, `nom`, `prenom`, `date_naissance`, `password`, `telephone`, `email`, `username`, `imagepath`) VALUES
('AA555555', 'Fellah-Idrissi', 'Ziad', '1999-06-18', '1234', '0610111000', 'ziad.fe1999@gmail.fa', 'etu', '5f04c32761a404.28876641.jpg'),
('AB629501', 'Khalid', 'Yhaya', '1999-03-03', NULL, '0610012301', '', NULL, ''),
('AC639502', 'Gouchgache', 'Hajar', '1999-08-09', NULL, '0610985002', '', NULL, ''),
('AD649503', 'Reda', 'Ahmed', '1999-03-03', NULL, '0610452003', '', NULL, ''),
('AE659504', 'Bouanane', 'Oussama', '1999-03-19', NULL, '0610741004', '', NULL, ''),
('AF669505', 'Narine', 'Soukaina', '1999-05-05', NULL, '0610195005', '', NULL, ''),
('AG679566', 'Azhar', 'Asmaa', '1999-07-07', NULL, '0617740006', '', NULL, ''),
('AH689567', 'Ait Fakir', 'Soufian', '1999-12-12', NULL, '0617740007', '', NULL, ''),
('AI121218', 'Essaadi', 'Yassin', '1999-01-01', NULL, '0617740008', '', NULL, ''),
('AJ111519', 'Tiane', 'Rajaa', '1999-02-02', NULL, '0617107009', '', NULL, ''),
('AK111510', 'Draidar', 'Nouhaila', '1999-03-01', NULL, '0717788001', '', NULL, ''),
('AL156511', 'Bhaita', 'Soukiana', '1999-04-05', NULL, '0717745502', '', NULL, ''),
('BA699512', 'Khayoussef', 'Mohamed', '1968-05-17', '1234', '0717749903', 'mohamed.khayoussef@fsac.ma', 'ens1', 'avatar.svg'),
('BB699513', 'Sahel', 'Hassna', '1970-05-18', NULL, '0717741114', '', NULL, ''),
('BC699514', 'Lamnoir', 'Imane', '1985-05-20', NULL, '0707000105', '', NULL, ''),
('BD699515', 'Chabbi', 'Abderrahmane', '1978-05-17', NULL, '0717741236', '', NULL, ''),
('BE699516', 'Abouamrane', 'Mouad', '1990-05-17', NULL, '0710105167', '', NULL, ''),
('BF699517', 'Aboulkhair', 'Zineb', '1992-05-17', NULL, '0711475168', '', NULL, ''),
('BG009518', 'Abidi', 'Sanaa', '1989-12-03', NULL, '0711475169', '', NULL, ''),
('BH019519', 'Amhil', 'Younes', '1968-09-17', NULL, '0514445161', '', NULL, ''),
('BI079520', 'Kouam', 'Issa', '1968-05-17', NULL, '0511235162', '', NULL, ''),
('BJ121221', 'Elkhettabi', 'Yassin', '1980-05-17', '1234', '0514565163', '', 'res', ''),
('BK121212', 'Chakouri', 'Safaa', '1968-05-07', '1234', '0600154199', 'safaa.chakouri@fsac.ma', 'ens', 'avatar.svg'),
('CA108522', 'Tallal', 'Adnane', '1999-05-17', NULL, '0517895164', '', NULL, ''),
('CB111523', 'Bourich', 'Ikrame', '1999-05-17', NULL, '0511475165', '', NULL, ''),
('CC101524', 'Jemmi', 'Muhsin', '1985-05-17', '1234', '0512585166', 'muhsin.jemmi@fsac.ma', 'res1', 'avatar.svg'),
('CD699525', 'Rehmi', 'Youssef', '1968-05-17', NULL, '0513695167', '', NULL, ''),
('WA111588', 'Azize', 'Raiss', '1976-05-11', '1234', '0154899710', 'raiss.azize@fsac.ma', 'res2', '5ef15873361741.94909092.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Administrateur`
--
ALTER TABLE `Administrateur`
  ADD PRIMARY KEY (`username`,`password`);

--
-- Indexes for table `assiste`
--
ALTER TABLE `assiste`
  ADD PRIMARY KEY (`id_seance`,`id_etudiant`),
  ADD KEY `assiste_Etudiant0_FK` (`id_etudiant`);

--
-- Indexes for table `Controle`
--
ALTER TABLE `Controle`
  ADD PRIMARY KEY (`id_controle`),
  ADD KEY `id_module` (`id_module`);

--
-- Indexes for table `Demandes`
--
ALTER TABLE `Demandes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_id_etudiant` (`id_etudiant`);

--
-- Indexes for table `dispose_de`
--
ALTER TABLE `dispose_de`
  ADD PRIMARY KEY (`id_filiere`,`id_module`),
  ADD KEY `dispose_de_Module0_FK` (`id_module`);

--
-- Indexes for table `Etudiant`
--
ALTER TABLE `Etudiant`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `Etudiant_Idx` (`cne`),
  ADD KEY `Etudiant_Filiere0_FK` (`id_filiere`);

--
-- Indexes for table `Filiere`
--
ALTER TABLE `Filiere`
  ADD PRIMARY KEY (`id_filiere`),
  ADD UNIQUE KEY `Filiere_Idx` (`nom_filiere`),
  ADD KEY `Filiere_Personnel_FK` (`id_responsable`);

--
-- Indexes for table `Module`
--
ALTER TABLE `Module`
  ADD PRIMARY KEY (`id_module`),
  ADD KEY `Module_Personnel_FK` (`id_enseignant`),
  ADD KEY `Module_Semestre0_FK` (`id_semestre`);

--
-- Indexes for table `passe`
--
ALTER TABLE `passe`
  ADD PRIMARY KEY (`id_etudiant`,`id_controle`),
  ADD KEY `pass_ibfk_1` (`id_controle`);

--
-- Indexes for table `Personnel`
--
ALTER TABLE `Personnel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `salle`
--
ALTER TABLE `salle`
  ADD PRIMARY KEY (`id_salle`);

--
-- Indexes for table `Seance`
--
ALTER TABLE `Seance`
  ADD PRIMARY KEY (`id_seance`),
  ADD KEY `id_module` (`id_module`);

--
-- Indexes for table `Semestre`
--
ALTER TABLE `Semestre`
  ADD PRIMARY KEY (`id_semestre`);

--
-- Indexes for table `Utilisateur`
--
ALTER TABLE `Utilisateur`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `Utilisateur_Idx` (`telephone`,`email`,`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Controle`
--
ALTER TABLE `Controle`
  MODIFY `id_controle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT for table `Demandes`
--
ALTER TABLE `Demandes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `Filiere`
--
ALTER TABLE `Filiere`
  MODIFY `id_filiere` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `Module`
--
ALTER TABLE `Module`
  MODIFY `id_module` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `salle`
--
ALTER TABLE `salle`
  MODIFY `id_salle` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `Seance`
--
ALTER TABLE `Seance`
  MODIFY `id_seance` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `Semestre`
--
ALTER TABLE `Semestre`
  MODIFY `id_semestre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `assiste`
--
ALTER TABLE `assiste`
  ADD CONSTRAINT `assiste_Etudiant0_FK` FOREIGN KEY (`id_etudiant`) REFERENCES `Etudiant` (`id`),
  ADD CONSTRAINT `assiste_Seance_FK` FOREIGN KEY (`id_seance`) REFERENCES `Seance` (`id_seance`);

--
-- Constraints for table `Controle`
--
ALTER TABLE `Controle`
  ADD CONSTRAINT `Controle_ibfk_1` FOREIGN KEY (`id_module`) REFERENCES `Module` (`id_module`);

--
-- Constraints for table `Demandes`
--
ALTER TABLE `Demandes`
  ADD CONSTRAINT `FK_id_etudiant` FOREIGN KEY (`id_etudiant`) REFERENCES `Etudiant` (`id`);

--
-- Constraints for table `dispose_de`
--
ALTER TABLE `dispose_de`
  ADD CONSTRAINT `dispose_de_Filiere_FK` FOREIGN KEY (`id_filiere`) REFERENCES `Filiere` (`id_filiere`),
  ADD CONSTRAINT `dispose_de_Module0_FK` FOREIGN KEY (`id_module`) REFERENCES `Module` (`id_module`);

--
-- Constraints for table `Etudiant`
--
ALTER TABLE `Etudiant`
  ADD CONSTRAINT `Etudiant_Filiere0_FK` FOREIGN KEY (`id_filiere`) REFERENCES `Filiere` (`id_filiere`),
  ADD CONSTRAINT `Etudiant_Utilisateur_FK` FOREIGN KEY (`id`) REFERENCES `Utilisateur` (`id`);

--
-- Constraints for table `Filiere`
--
ALTER TABLE `Filiere`
  ADD CONSTRAINT `Filiere_Personnel_FK` FOREIGN KEY (`id_responsable`) REFERENCES `Personnel` (`id`);

--
-- Constraints for table `Module`
--
ALTER TABLE `Module`
  ADD CONSTRAINT `Module_Personnel_FK` FOREIGN KEY (`id_enseignant`) REFERENCES `Personnel` (`id`),
  ADD CONSTRAINT `Module_Semestre0_FK` FOREIGN KEY (`id_semestre`) REFERENCES `Semestre` (`id_semestre`);

--
-- Constraints for table `passe`
--
ALTER TABLE `passe`
  ADD CONSTRAINT `pass_ibfk_1` FOREIGN KEY (`id_controle`) REFERENCES `Controle` (`id_controle`),
  ADD CONSTRAINT `passe_ibfk_2` FOREIGN KEY (`id_etudiant`) REFERENCES `Etudiant` (`id`);

--
-- Constraints for table `Personnel`
--
ALTER TABLE `Personnel`
  ADD CONSTRAINT `Personnel_ibfk_1` FOREIGN KEY (`id`) REFERENCES `Utilisateur` (`id`);

--
-- Constraints for table `Seance`
--
ALTER TABLE `Seance`
  ADD CONSTRAINT `Seance_ibfk_1` FOREIGN KEY (`id_module`) REFERENCES `Module` (`id_module`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
