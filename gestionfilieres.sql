-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 18, 2020 at 03:50 AM
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
  `id_etudiant` varchar(11) NOT NULL,
  `absent` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(89, 'controle', '2020-06-19', '08:00:00', '10:00:00', 13),
(90, 'controle', '2020-06-20', '08:00:00', '09:00:00', 13),
(91, 'controle', '2020-06-17', '05:00:00', '06:00:00', 17),
(92, 'controle', '2020-06-16', '04:00:00', '05:00:00', 17),
(93, 'controle', '2020-06-21', '06:00:00', '08:00:00', 17),
(94, 'controle', '2020-06-15', '08:00:00', '09:00:00', 13);

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
-- Table structure for table `Etudiant`
--

CREATE TABLE `Etudiant` (
  `id` varchar(11) NOT NULL,
  `somme` int(11) DEFAULT NULL,
  `cne` varchar(12) NOT NULL,
  `id_filiere` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Etudiant`
--

INSERT INTO `Etudiant` (`id`, `somme`, `cne`, `id_filiere`) VALUES
('1', NULL, 'R00000000', 1),
('12003', NULL, 'K131238000', 3),
('124', NULL, 'C154441030', 1),
('12555', NULL, 'F131547880', 1),
('14523', NULL, 'R151700203', 1),
('55', NULL, 'R131238116', 1),
('69420', NULL, 'K661518440', 3),
('770159', NULL, 'R100174009', 4),
('9785', NULL, 'M007600088', 3),
('WA111510', NULL, 'F130000116', 1),
('WA15556666', NULL, 'F13255444444', 4);

-- --------------------------------------------------------

--
-- Table structure for table `Filiere`
--

CREATE TABLE `Filiere` (
  `id_filiere` int(11) NOT NULL,
  `prix_formation` int(11) NOT NULL,
  `nom_filiere` varchar(100) NOT NULL,
  `id_responsable` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Filiere`
--

INSERT INTO `Filiere` (`id_filiere`, `prix_formation`, `nom_filiere`, `id_responsable`) VALUES
(1, 30000, 'Développement & Admin des BD (DAB)', '69'),
(3, 69420, 'Développement Mobile & Multimédia (DMM)', '2'),
(4, 521552, 'Administration Réseaux & Systémes (ARS)', '50');

-- --------------------------------------------------------

--
-- Table structure for table `Module`
--

CREATE TABLE `Module` (
  `id_module` int(11) NOT NULL,
  `heures_sem` int(11) NOT NULL,
  `intitule` varchar(100) NOT NULL,
  `id_enseignant` varchar(11) NOT NULL,
  `id_semestre` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Module`
--

INSERT INTO `Module` (`id_module`, `heures_sem`, `intitule`, `id_enseignant`, `id_semestre`) VALUES
(12, 69, 'MÃ©thodologie de conception des SI', '1', 1),
(13, 68, 'Développement BD (Forms& reports)', '18236', 2),
(14, 69, 'HTML5/CSS3', '152340', 1),
(15, 54, 'CCNP Route', '50', 1),
(16, 60, 'Architecture des ordinateurs', '18236', 1),
(17, 58, 'Ateliers Génie Logiciel', '18236', 1),
(18, 36, 'Administration de bases de données (DBA)', '50', 2),
(19, 30, 'Android Application Development', '152340', 2),
(20, 70, 'Techniques de communication', '50', 1);

-- --------------------------------------------------------

--
-- Table structure for table `passe`
--

CREATE TABLE `passe` (
  `id_etudiant` varchar(11) NOT NULL,
  `id_controle` int(11) NOT NULL,
  `note` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `passe`
--

INSERT INTO `passe` (`id_etudiant`, `id_controle`, `note`) VALUES
('1', 91, 5),
('1', 92, 15),
('1', 94, 4),
('124', 91, 5),
('124', 92, 18),
('124', 94, 5),
('12555', 91, 6),
('12555', 92, 1),
('12555', 94, 5),
('14523', 91, 1),
('14523', 94, 6),
('55', 91, 8),
('55', 92, 2),
('55', 94, 1),
('WA111510', 91, 2),
('WA111510', 94, 8);

-- --------------------------------------------------------

--
-- Table structure for table `Personnel`
--

CREATE TABLE `Personnel` (
  `id` varchar(11) NOT NULL,
  `role` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Personnel`
--

INSERT INTO `Personnel` (`id`, `role`) VALUES
('1', 'enseignant'),
('152340', 'enseignant'),
('18236', 'enseignant'),
('2', 'responsable'),
('50', 'responsable'),
('69', 'responsable');

-- --------------------------------------------------------

--
-- Table structure for table `Seance`
--

CREATE TABLE `Seance` (
  `id_seance` int(11) NOT NULL,
  `h_debut` time NOT NULL,
  `h_fin` time NOT NULL,
  `type` varchar(2) NOT NULL,
  `date_seance` date NOT NULL,
  `salle` varchar(30) NOT NULL,
  `id_module` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
-- Table structure for table `suit`
--

CREATE TABLE `suit` (
  `id_module` int(11) NOT NULL,
  `id_etudiant` varchar(11) NOT NULL,
  `note` float NOT NULL,
  `type` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `Utilisateur`
--

CREATE TABLE `Utilisateur` (
  `id` varchar(11) NOT NULL,
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
('1', 'Motazee', 'Nadori', '1968-05-17', '1234', '0614445100', 'Motazee_nadori@fsac.ma', 'ens0', ''),
('12003', 'El fathi', 'Safaa', '1999-12-19', 'ziad', '0731254090', 'saffa_elfathi@gmail.com', 'Safaa.El fathi-etu', 'avatar.svg'),
('124', 'Reda', 'Ahmed', '1999-12-15', NULL, '0790002010', '', NULL, ''),
('12555', 'Khalid', 'Yahya', '2020-05-21', 'yahya012', '0554100105', 'yahya_khalid@gmail.com', 'Yahya.Khalid-etu', '5ed8cabb3a4512.05077058.jpg'),
('14523', 'Gouchgache', 'Hajar', '1999-09-08', 'ziad', '0645874120', 'hajar01@gmail.com', 'Hajar.Gouchgache-etu', 'avatar.svg'),
('152340', 'Chakouri', 'Safaa', '1968-05-07', '1234', '0600154199', 'Chakouri_safaa_01@fsac.ac.ma', 'ens2', ''),
('18236', 'Marwani', 'Nourdine', '1960-05-06', '1234', '0781006419', 'Mar_Nourdine@fsac.ac.ma', 'ens1', ''),
('2', 'Azize', 'Raiss', '1976-05-11', '1234', '0154899710', 'aziz_raiss@fsac.ma', 'res0', ''),
('50', 'Meriem', 'El mandouri', '2020-05-07', '1234', '0654112100', 'meriem_elmandouri@fsaccom', 'res1', ''),
('55', 'Fellah-idrissi', 'Ziad', '1999-05-06', '1234', '0693986210', 'ziad.fe.zf@gmail.com', 'ziad.fellah-idrissi-etu', '5ee9464fa4b880.43999751.png'),
('69', 'Mohamed', 'Abghoure', '2020-05-18', '1234', '0698521410', 'mohamed@fsac.ma', 'res2', ''),
('69420', 'Karim', 'Sinbati', '2020-05-14', 'karim147852', '0622224015', 'sinbati_01_karim@gmail.com', 'Sinbati.Karim-etu', 'avatar.svg'),
('770159', 'leyla', 'marin', '1999-06-09', 'ziad', '0685412500', 'marina_leyla@gmail.com', 'marin.leyla-etu', '5ee585f3687317.07377185.jpg'),
('9785', 'Choroq', 'Houda', '1999-12-15', 'houda12358', '0687595410', 'Houda@gmail.com', 'Houda.Choroq-etu', 'avatar.svg'),
('WA111510', 'rabii', 'sissi', '1999-12-02', 'ziad', '06451098', 'sisi@rabi.com', 'sisi.rabi3-etu', 'avatar.svg'),
('WA15556666', 'Yahya', 'Khalid', '2020-06-25', NULL, '061115', NULL, NULL, 'avatar.svg');

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
  ADD UNIQUE KEY `Module_Idx` (`intitule`),
  ADD KEY `Module_Personnel_FK` (`id_enseignant`),
  ADD KEY `Module_Semestre0_FK` (`id_semestre`);

--
-- Indexes for table `passe`
--
ALTER TABLE `passe`
  ADD PRIMARY KEY (`id_etudiant`,`id_controle`),
  ADD KEY `id_controle` (`id_controle`);

--
-- Indexes for table `Personnel`
--
ALTER TABLE `Personnel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Seance`
--
ALTER TABLE `Seance`
  ADD PRIMARY KEY (`id_seance`),
  ADD UNIQUE KEY `Seance_Idx` (`date_seance`,`salle`),
  ADD KEY `id_module` (`id_module`);

--
-- Indexes for table `Semestre`
--
ALTER TABLE `Semestre`
  ADD PRIMARY KEY (`id_semestre`);

--
-- Indexes for table `suit`
--
ALTER TABLE `suit`
  ADD PRIMARY KEY (`id_module`,`id_etudiant`),
  ADD KEY `suit_Etudiant0_FK` (`id_etudiant`);

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
  MODIFY `id_controle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT for table `Filiere`
--
ALTER TABLE `Filiere`
  MODIFY `id_filiere` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `Module`
--
ALTER TABLE `Module`
  MODIFY `id_module` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

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
  ADD CONSTRAINT `passe_ibfk_1` FOREIGN KEY (`id_controle`) REFERENCES `Controle` (`id_controle`),
  ADD CONSTRAINT `passe_ibfk_5` FOREIGN KEY (`id_etudiant`) REFERENCES `Etudiant` (`id`);

--
-- Constraints for table `Personnel`
--
ALTER TABLE `Personnel`
  ADD CONSTRAINT `Personnel_Utilisateur_FK` FOREIGN KEY (`id`) REFERENCES `Utilisateur` (`id`);

--
-- Constraints for table `Seance`
--
ALTER TABLE `Seance`
  ADD CONSTRAINT `Seance_ibfk_1` FOREIGN KEY (`id_module`) REFERENCES `Module` (`id_module`);

--
-- Constraints for table `suit`
--
ALTER TABLE `suit`
  ADD CONSTRAINT `suit_Etudiant0_FK` FOREIGN KEY (`id_etudiant`) REFERENCES `Etudiant` (`id`),
  ADD CONSTRAINT `suit_Module_FK` FOREIGN KEY (`id_module`) REFERENCES `Module` (`id_module`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
