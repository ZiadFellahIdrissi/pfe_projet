-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 28, 2020 at 12:29 AM
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
  `id_etudiant` int(11) NOT NULL,
  `absent` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `associe_a`
--

CREATE TABLE `associe_a` (
  `id_module` int(11) NOT NULL,
  `id_seance` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(1, 12, 0.01, 0.01),
(1, 13, 0.6, 0.04),
(3, 14, 0.55, 0.2);

-- --------------------------------------------------------

--
-- Table structure for table `Etudiant`
--

CREATE TABLE `Etudiant` (
  `id` int(11) NOT NULL,
  `somme` int(11) DEFAULT NULL,
  `cne` varchar(8) NOT NULL,
  `id_filiere` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Etudiant`
--

INSERT INTO `Etudiant` (`id`, `somme`, `cne`, `id_filiere`) VALUES
(55, NULL, 'F14454', 1),
(12555, NULL, 'F1354433', 1),
(69420, NULL, 'F1354421', 3);

-- --------------------------------------------------------

--
-- Table structure for table `Filiere`
--

CREATE TABLE `Filiere` (
  `id_filiere` int(11) NOT NULL,
  `prix_formation` int(11) NOT NULL,
  `nom_filiere` varchar(100) NOT NULL,
  `id_responsable` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Filiere`
--

INSERT INTO `Filiere` (`id_filiere`, `prix_formation`, `nom_filiere`, `id_responsable`) VALUES
(1, 30000, 'DBA DYL 2 DRAHM', 2),
(3, 69420, 'PL/SQL dyl 3DH', 1);

-- --------------------------------------------------------

--
-- Table structure for table `Module`
--

CREATE TABLE `Module` (
  `id_module` int(11) NOT NULL,
  `heures_sem` int(11) NOT NULL,
  `intitule` varchar(100) NOT NULL,
  `id_enseignant` int(11) NOT NULL,
  `id_semestre` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Module`
--

INSERT INTO `Module` (`id_module`, `heures_sem`, `intitule`, `id_enseignant`, `id_semestre`) VALUES
(12, 69, 'FFFFFFFF', 1, 1),
(13, 68, 'ffDSQF', 2, 2),
(14, 69, 'FFFFFFFFQQQ', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `Personnel`
--

CREATE TABLE `Personnel` (
  `id` int(11) NOT NULL,
  `role` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Personnel`
--

INSERT INTO `Personnel` (`id`, `role`) VALUES
(1, 'enseignant'),
(2, 'responsable'),
(69, 'enseignant');

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
  `salle` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `Semestre`
--

CREATE TABLE `Semestre` (
  `id_semestre` int(11) NOT NULL,
  `semestre` varchar(12) NOT NULL,
  `date_debut` date NOT NULL,
  `date_fin` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Semestre`
--

INSERT INTO `Semestre` (`id_semestre`, `semestre`, `date_debut`, `date_fin`) VALUES
(1, 'Semestre 1', '2020-05-04', '2020-05-29'),
(2, 'Semestre 2', '2020-05-20', '2020-06-25');

-- --------------------------------------------------------

--
-- Table structure for table `suit`
--

CREATE TABLE `suit` (
  `id_module` int(11) NOT NULL,
  `id_etudiant` int(11) NOT NULL,
  `note` float NOT NULL,
  `type` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `Utilisateur`
--

CREATE TABLE `Utilisateur` (
  `id` int(11) NOT NULL,
  `nom` varchar(32) NOT NULL,
  `prenom` varchar(32) NOT NULL,
  `date_naissance` date NOT NULL,
  `password` varchar(40) DEFAULT NULL,
  `telephone` char(10) NOT NULL,
  `email` varchar(40) NOT NULL,
  `username` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Utilisateur`
--

INSERT INTO `Utilisateur` (`id`, `nom`, `prenom`, `date_naissance`, `password`, `telephone`, `email`, `username`) VALUES
(1, 'Motazee', 'Mohammed', '2020-05-17', '1234', '0614445', 'enseignant@fsac.ma', 'ens'),
(2, 'Lmohami', 'Rass', '2020-05-11', '1234', '01548997', 'res@fsac.ma', 'res'),
(55, 'fela7', 'sdaych9a', '2020-05-06', '', '066541', 'fff@sqdqsdqs', ''),
(69, 'lfate7', 'bofet7a', '2020-05-18', 'azerty', '066541', 'bb@gf.com', '1234'),
(12555, 'Khalide', 'Khalide', '2020-05-21', 'qsq', '05541', 'fela7@fsac.madd', 'fff'),
(69420, 'rabi3', 'sissi', '2020-05-14', '', '0622', 'ad@ff.com', '');

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
-- Indexes for table `associe_a`
--
ALTER TABLE `associe_a`
  ADD KEY `associe_a_Module_FK` (`id_module`),
  ADD KEY `associe_a_Seance0_FK` (`id_seance`);

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
-- Indexes for table `Personnel`
--
ALTER TABLE `Personnel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Seance`
--
ALTER TABLE `Seance`
  ADD PRIMARY KEY (`id_seance`),
  ADD UNIQUE KEY `Seance_Idx` (`date_seance`,`salle`);

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
-- AUTO_INCREMENT for table `Filiere`
--
ALTER TABLE `Filiere`
  MODIFY `id_filiere` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `Module`
--
ALTER TABLE `Module`
  MODIFY `id_module` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `Semestre`
--
ALTER TABLE `Semestre`
  MODIFY `id_semestre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `Utilisateur`
--
ALTER TABLE `Utilisateur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69421;

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
-- Constraints for table `associe_a`
--
ALTER TABLE `associe_a`
  ADD CONSTRAINT `associe_a_Module_FK` FOREIGN KEY (`id_module`) REFERENCES `Module` (`id_module`),
  ADD CONSTRAINT `associe_a_Seance0_FK` FOREIGN KEY (`id_seance`) REFERENCES `Seance` (`id_seance`);

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
-- Constraints for table `Personnel`
--
ALTER TABLE `Personnel`
  ADD CONSTRAINT `Personnel_Utilisateur_FK` FOREIGN KEY (`id`) REFERENCES `Utilisateur` (`id`);

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
