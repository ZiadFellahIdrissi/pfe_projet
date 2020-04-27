-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 27 avr. 2020 à 02:45
-- Version du serveur :  10.4.11-MariaDB
-- Version de PHP : 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `gestionfilieres`
--

-- --------------------------------------------------------

--
-- Structure de la table `absence`
--

CREATE TABLE `absence` (
  `id_abssence` int(5) NOT NULL,
  `id_etudiant` int(10) NOT NULL,
  `id_module` int(5) NOT NULL,
  `date_abssence` date DEFAULT NULL,
  `h_abssance` double(100,2) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `absence`
--

INSERT INTO `absence` (`id_abssence`, `id_etudiant`, `id_module`, `date_abssence`, `h_abssance`) VALUES
(1, 17006034, 1, '2019-03-18', 1.30),
(2, 17006034, 2, '2019-03-03', 1.30);

-- --------------------------------------------------------

--
-- Structure de la table `enseignant`
--

CREATE TABLE `enseignant` (
  `id_enseignant` int(5) NOT NULL,
  `nom_enseignant` varchar(50) NOT NULL,
  `prenom_enseignant` varchar(50) NOT NULL,
  `email_enseignant` varchar(50) DEFAULT NULL,
  `telephone_enseignant` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `enseignant`
--

INSERT INTO `enseignant` (`id_enseignant`, `nom_enseignant`, `prenom_enseignant`, `email_enseignant`, `telephone_enseignant`) VALUES
(2, 'amine', 'mrabte', 'amine.mrabte@gmail.com', '0619800612'),
(3, 'aymane', 'nadire', 'aymane.nadire@gmail.com', '0619800603'),
(4, 'fouad', 'khalid', 'fouad.khalid@gmail.com', '0619600403'),
(5, 'mohamed', 'shaqi', 'mohamed.shaqi@gmail.com', '0619900804'),
(6, 'azize', 'mandoure', 'azizi.mandoure@gmail.com', '0619880104'),
(7, 'brahim', 'maklofe', 'brahim.makloufe@gmail.com', '0619961215'),
(8, 'mohamed', 'daher', 'mohamed.daher@gmail.com', '0619800618'),
(10, 'mohamoud', 'abghour', 'mahmoude.abghoure@gmail.com', '0619801212'),
(11, 'karim', 'samoudi', 'karim.samoudi@gmail.com', '0619760429'),
(12, 'marouan', 'moussaid', 'marouan.moussaid@gmail.com', '0619650111'),
(13, 'aymane', 'bakire', 'aymane.bakire@gmail.com', '0619900707'),
(14, 'nordine', 'charfaoui', 'nordine.charfaoui@gmail.com', '0619771205'),
(15, 'hafid', 'nasiry', 'hafid.nasiry@gmail.com', '0619691022'),
(16, 'soufian', 'el mraoui', 'soufian.el.mraoui@gmail.com', '0619900701'),
(17, 'moustafa', 'nadouri', 'moustafa.nadouri@gmail.com', '0619720913'),
(18, 'marouan', 'charwni', 'marouan.charwni@gmail.com', '0619731127'),
(19, 'farid', 'zarwali', 'farid.zarwali@gmail.com', '0619631215'),
(20, 'abdelkrim', 'charif', 'abdelkrim.charif@gmail.com', '0619670807');

-- --------------------------------------------------------

--
-- Structure de la table `etudiant`
--

CREATE TABLE `etudiant` (
  `code_apoge` int(10) NOT NULL,
  `cen` varchar(20) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `date_naissance` date NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `id_groupe` int(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `etudiant`
--

INSERT INTO `etudiant` (`code_apoge`, `cen`, `nom`, `prenom`, `date_naissance`, `email`, `id_groupe`) VALUES
(14574586, 'R131745200', 'oussama', 'farouq', '1998-07-06', 'oussama.farouq@gmail.com', 1),
(16154875, 'R141519788', 'oussama', 'bouanane', '1998-04-16', 'oussama.ouss1@gmail.com', 3),
(17148856, 'R140019714', 'ahmed', 'reda', '2000-04-15', 'ahmed.reda_01@gmail.com', 4),
(19147554, 'R131018478', 'ayamn', 'darof', '1998-04-16', 'darof-marwan@gmail.com', 2),
(15001300, 'R001515478', 'ayman', 'nadore', '1999-04-01', 'aymane.nadore@gmail.com', 3),
(17006034, 'R161715199', 'ziad', 'fellah', '1999-12-06', 'ziad.fellah@gmail.com', 1),
(13154827, 'R145821358', 'yahya', 'khalid', '1999-08-06', 'yahya.khalid@gmail.com', 1),
(19111750, 'R231238112', 'amal', 'charoni', '1998-01-12', 'amal.charoni@gmail.com', 4),
(19504586, 'R331745111', 'safaa', 'chafiq', '1998-02-13', 'safaa.chafiq@gmail.com', 4),
(19100075, 'R441519222', 'nouhaila', 'bouanane', '1998-03-16', 'nouhaila.bouanane@gmail.com', 2),
(19112356, 'R540333714', 'amine', 'sefrioui', '2000-04-20', 'amine.sfrioui@gmail.com', 2),
(19174854, 'R631444478', 'mohamed', 'yassin', '1998-05-21', 'mohamed-yassin@gmail.com', 3),
(19001200, 'R001515400', 'taha', 'bouchikhi', '1997-04-27', 'taha.bouchikhi@gmail.com', 3),
(19753034, 'R761777199', 'akram', 'idrissi', '1999-12-05', 'akram.idrissi@gmail.com', 4),
(222222222, 'C222215', 'Yahya', 'faroq', '2020-05-01', 'lerespecsssssssstful@gmail.com', 4);

-- --------------------------------------------------------

--
-- Structure de la table `examen`
--

CREATE TABLE `examen` (
  `id_examen` int(5) NOT NULL,
  `type` varchar(20) DEFAULT NULL,
  `id_module` int(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `examen`
--

INSERT INTO `examen` (`id_examen`, `type`, `id_module`) VALUES
(1, 'controle_1', 1),
(2, 'controle_2', 1),
(3, 'controle_3', 1),
(4, 'exam_finale', 1),
(5, 'controle_1', 2),
(6, 'controle_2', 2),
(7, 'controle_3', 2),
(8, 'exam_finale', 2);

-- --------------------------------------------------------

--
-- Structure de la table `exam_pass`
--

CREATE TABLE `exam_pass` (
  `id` int(5) NOT NULL,
  `note` float(10,2) NOT NULL,
  `id_examen` int(5) NOT NULL,
  `id_etudiant` int(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `exam_pass`
--

INSERT INTO `exam_pass` (`id`, `note`, `id_examen`, `id_etudiant`) VALUES
(9, 15.20, 1, 17006034),
(10, 13.50, 2, 17006034),
(11, 10.50, 3, 17006034),
(12, 17.30, 4, 17006034),
(13, 15.20, 5, 17006034),
(14, 20.00, 6, 17006034),
(15, 10.50, 7, 17006034),
(16, 5.50, 8, 17006034),
(17, 20.00, 1, 13154827),
(18, 12.00, 2, 13154827),
(19, 11.00, 3, 13154827),
(20, 14.00, 4, 13154827),
(21, 12.00, 5, 13154827),
(22, 10.00, 6, 13154827),
(23, 11.00, 7, 13154827),
(24, 16.00, 8, 13154827);

-- --------------------------------------------------------

--
-- Structure de la table `filiere`
--

CREATE TABLE `filiere` (
  `id_filiere` int(5) NOT NULL,
  `nom_filiere` varchar(50) NOT NULL,
  `responsable_id` int(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `filiere`
--

INSERT INTO `filiere` (`id_filiere`, `nom_filiere`, `responsable_id`) VALUES
(1, 'Développement et Admin des BD', 5),
(2, 'Administration Réseaux et Systèmes', 2),
(5, 'smiF', 3);

-- --------------------------------------------------------

--
-- Structure de la table `groupe`
--

CREATE TABLE `groupe` (
  `id_groupe` int(5) NOT NULL,
  `groupe_nom` varchar(50) NOT NULL,
  `id_filiere` int(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `groupe`
--

INSERT INTO `groupe` (`id_groupe`, `groupe_nom`, `id_filiere`) VALUES
(1, 'TCD', 1),
(2, 'TDI', 1),
(3, 'SMI', 2),
(4, 'MDR', 2);

-- --------------------------------------------------------

--
-- Structure de la table `module`
--

CREATE TABLE `module` (
  `id_module` int(5) NOT NULL,
  `intitule` varchar(80) DEFAULT NULL,
  `id_enseignant` int(11) NOT NULL,
  `horaire` int(10) DEFAULT NULL,
  `id_filiere` int(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `module`
--

INSERT INTO `module` (`id_module`, `intitule`, `id_enseignant`, `horaire`, `id_filiere`) VALUES
(1, 'Administration de bases de données', 2, 64, 2),
(2, 'Développement BD', 3, 62, 1),
(3, 'Langage d’interrogation des Bases de Données SQL', 4, 60, 2),
(4, 'Méthodologie de conception des SI', 5, 60, 2),
(5, 'Administration Linux & Virtualisation', 6, 52, 1),
(6, 'CCNP Switch et Tshoot', 7, 55, 1),
(7, 'Architecture des ordinateurs', 10, 50, 5),
(8, 'Configuration d’une infrastructure réseau', 11, 60, 5),
(9, 'Yahya', 6, 1, 5);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `absence`
--
ALTER TABLE `absence`
  ADD PRIMARY KEY (`id_abssence`),
  ADD KEY `id_module` (`id_module`),
  ADD KEY `id_etudiant` (`id_etudiant`);

--
-- Index pour la table `enseignant`
--
ALTER TABLE `enseignant`
  ADD PRIMARY KEY (`id_enseignant`),
  ADD UNIQUE KEY `email_enseignant` (`email_enseignant`);

--
-- Index pour la table `etudiant`
--
ALTER TABLE `etudiant`
  ADD PRIMARY KEY (`code_apoge`),
  ADD UNIQUE KEY `cen` (`cen`),
  ADD KEY `id_groupe` (`id_groupe`);

--
-- Index pour la table `examen`
--
ALTER TABLE `examen`
  ADD PRIMARY KEY (`id_examen`),
  ADD KEY `id_module` (`id_module`);

--
-- Index pour la table `exam_pass`
--
ALTER TABLE `exam_pass`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_examen` (`id_examen`),
  ADD KEY `id_etudiant` (`id_etudiant`);

--
-- Index pour la table `filiere`
--
ALTER TABLE `filiere`
  ADD PRIMARY KEY (`id_filiere`),
  ADD KEY `responsable_id` (`responsable_id`);

--
-- Index pour la table `groupe`
--
ALTER TABLE `groupe`
  ADD PRIMARY KEY (`id_groupe`),
  ADD KEY `id_filiere` (`id_filiere`);

--
-- Index pour la table `module`
--
ALTER TABLE `module`
  ADD PRIMARY KEY (`id_module`),
  ADD KEY `fk_filiere` (`id_filiere`),
  ADD KEY `fk_enseignant` (`id_enseignant`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `absence`
--
ALTER TABLE `absence`
  MODIFY `id_abssence` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `enseignant`
--
ALTER TABLE `enseignant`
  MODIFY `id_enseignant` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT pour la table `examen`
--
ALTER TABLE `examen`
  MODIFY `id_examen` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `exam_pass`
--
ALTER TABLE `exam_pass`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT pour la table `filiere`
--
ALTER TABLE `filiere`
  MODIFY `id_filiere` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `groupe`
--
ALTER TABLE `groupe`
  MODIFY `id_groupe` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `module`
--
ALTER TABLE `module`
  MODIFY `id_module` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
