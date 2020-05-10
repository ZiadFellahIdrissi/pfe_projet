-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : Dim 10 mai 2020 à 19:33
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
  `id_absence` int(5) NOT NULL,
  `id_etudiant` int(10) NOT NULL,
  `id_module` int(5) NOT NULL,
  `date_absence` date DEFAULT NULL,
  `h_absence` double(100,2) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `absence`
--

INSERT INTO `absence` (`id_absence`, `id_etudiant`, `id_module`, `date_absence`, `h_absence`) VALUES
(6, 14574586, 19, '2020-04-15', 1.30),
(4, 13154827, 3, '2020-04-15', 1.50),
(14, 14574586, 19, '2020-05-22', 1.35),
(13, 17006034, 19, '2020-05-31', 1.56),
(12, 13154822, 2, '2020-05-30', 99.00),
(11, 19147554, 5, '2020-05-30', 1.53),
(15, 13154822, 2, '2020-05-28', 1.51),
(16, 19504586, 27, '2020-05-31', 2.54);

-- --------------------------------------------------------

--
-- Structure de la table `avoir_note`
--

CREATE TABLE `avoir_note` (
  `id` int(5) NOT NULL,
  `note` float(10,2) NOT NULL,
  `id_examen` int(5) NOT NULL,
  `id_etudiant` int(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `avoir_note`
--

INSERT INTO `avoir_note` (`id`, `note`, `id_examen`, `id_etudiant`) VALUES
(32, 11.00, 25, 17148856),
(31, 15.00, 19, 17148856),
(33, 13.00, 19, 19111750),
(35, 8.00, 19, 19753034),
(36, 14.50, 25, 19753034),
(34, 16.00, 25, 19111750),
(37, 15.00, 19, 19504586),
(46, 20.00, 30, 19001200),
(40, 16.00, 25, 19504586),
(47, 10.00, 30, 17106043),
(45, 15.00, 30, 19174854),
(48, 8.30, 30, 16154875),
(49, 15.00, 24, 19174854),
(50, 17.00, 24, 16154875),
(51, 10.00, 24, 19001200),
(52, 11.00, 24, 17106043),
(53, 20.00, 17, 16154875),
(54, 10.00, 17, 19174854),
(55, 12.00, 17, 19001200),
(56, 17.00, 17, 17106043),
(57, 15.00, 37, 14574586),
(58, 10.00, 37, 13154827),
(61, 11.00, 37, 17006034),
(62, 10.00, 45, 14574586);

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
  `cne` varchar(20) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `date_naissance` date NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `id_filiere` int(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `etudiant`
--

INSERT INTO `etudiant` (`code_apoge`, `cne`, `nom`, `prenom`, `date_naissance`, `email`, `id_filiere`) VALUES
(14574586, 'R131745200', 'oussama', 'farouq', '1998-07-06', 'oussama.farouq@gmail.com', 1),
(16154875, 'R141519788', 'oussama', 'bouanane', '1998-04-16', 'oussama.ouss1@gmail.com', 3),
(17148856, 'R140019714', 'ahmed', 'reda', '2000-04-15', 'ahmed.reda_01@gmail.com', 4),
(19147554, 'R131018478', 'ayamn', 'darof', '1998-04-16', 'darof-marwan@gmail.com', 2),
(17006034, 'R161715199', 'ziad', 'fellah', '1999-12-06', 'ziad.fellah@gmail.com', 1),
(13154822, 'R145821358', 'yahya', 'khalid', '1999-08-06', 'yahya.khalid@gmail.com', 1),
(19111750, 'R231238112', 'amal', 'charoni', '1998-01-12', 'amal.charoni@gmail.com', 4),
(19504586, 'R331745111', 'safaa', 'chafiq', '1998-02-13', 'safaa.chafiq@gmail.com', 4),
(19100075, 'R441519222', 'nouhaila', 'bouanane', '1998-03-16', 'nouhaila.bouanane@gmail.com', 2),
(19112356, 'R540333714', 'amine', 'sefrioui', '2000-04-20', 'amine.sfrioui@gmail.com', 2),
(19174854, 'R631444478', 'mohamed', 'yassin', '1998-05-21', 'mohamed-yassin@gmail.com', 3),
(19001200, 'R001515400', 'taha', 'bouchikhi', '1997-04-27', 'taha.bouchikhi@gmail.com', 3),
(19753034, 'R761777199', 'akram', 'idrissi', '1999-12-05', 'akram.idrissi@gmail.com', 4),
(17106043, 'R1458213582', 'Yahya', 'faroqi', '2020-04-16', 'lerespectful@gmail.comf', 3);

-- --------------------------------------------------------

--
-- Structure de la table `examen`
--

CREATE TABLE `examen` (
  `id_examen` int(5) NOT NULL,
  `date_exame` date NOT NULL,
  `heur_debut` time NOT NULL,
  `heur_fin` time NOT NULL,
  `salle` varchar(50) NOT NULL,
  `id_module` int(5) NOT NULL,
  `letype` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `examen`
--

INSERT INTO `examen` (`id_examen`, `date_exame`, `heur_debut`, `heur_fin`, `salle`, `id_module`, `letype`) VALUES
(19, '2020-05-19', '08:30:00', '10:00:00', 'salle_E', 27, 'Controle'),
(44, '2020-05-04', '04:00:00', '06:00:00', 'salle_A', 19, 'Controle'),
(37, '2020-05-09', '07:00:00', '08:30:00', 'salle_A', 4, 'Controle'),
(24, '2020-04-22', '10:00:00', '11:00:00', 'salle_A', 25, 'Controle'),
(45, '2020-04-28', '00:00:00', '00:00:00', 'salle_A', 19, 'Exam Final'),
(30, '2020-05-08', '10:00:00', '13:00:00', 'salle_A', 22, 'Controle');

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
(1, 'Developpement et Admin des BD', 5),
(2, 'Administration Reseaux et Systemes', 4),
(3, 'Developpement Mobile et Multimedia', 3),
(4, 'SI Appliques A la Gestion des Affaires', 8);

-- --------------------------------------------------------

--
-- Structure de la table `module`
--

CREATE TABLE `module` (
  `id_module` int(5) NOT NULL,
  `intitule` varchar(80) DEFAULT NULL,
  `id_enseignant` int(11) NOT NULL,
  `horaire` int(10) DEFAULT NULL,
  `id_filiere` int(5) NOT NULL,
  `semester` int(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `module`
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
(31, 'Gestion des projets', 2, 50, 2, 200);

-- --------------------------------------------------------

--
-- Structure de la table `semester`
--

CREATE TABLE `semester` (
  `id_sem` int(5) NOT NULL,
  `nom_sem` varchar(15) NOT NULL,
  `date_debut` date DEFAULT NULL,
  `date_fin` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `semester`
--

INSERT INTO `semester` (`id_sem`, `nom_sem`, `date_debut`, `date_fin`) VALUES
(100, '1er Semester', '2020-09-12', '2021-01-01'),
(200, '2eme Semester', '2021-02-01', '2021-06-01');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(5) NOT NULL,
  `username` varchar(32) NOT NULL,
  `email` varchar(50) NOT NULL,
  `pasword` varchar(32) NOT NULL,
  `letype` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `pasword`, `letype`) VALUES
(1, 'admin', 'admin@admin.fsac.ma', 'admin', 'admin'),
(3, 'admin2', 'admin2@admin.fsac.ma', '123456789', 'admin'),
(4, 'admin3', 'admin3@fsac.ma', 'ziadfellah', 'etudiant');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `absence`
--
ALTER TABLE `absence`
  ADD PRIMARY KEY (`id_absence`),
  ADD KEY `id_module` (`id_module`),
  ADD KEY `id_etudiant` (`id_etudiant`);

--
-- Index pour la table `avoir_note`
--
ALTER TABLE `avoir_note`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_etudiant` (`id_etudiant`),
  ADD KEY `id_examen` (`id_examen`);

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
  ADD UNIQUE KEY `cen` (`cne`);

--
-- Index pour la table `examen`
--
ALTER TABLE `examen`
  ADD PRIMARY KEY (`id_examen`),
  ADD KEY `id_module` (`id_module`);

--
-- Index pour la table `filiere`
--
ALTER TABLE `filiere`
  ADD PRIMARY KEY (`id_filiere`),
  ADD KEY `responsable_id` (`responsable_id`);

--
-- Index pour la table `module`
--
ALTER TABLE `module`
  ADD PRIMARY KEY (`id_module`),
  ADD KEY `fk_filiere` (`id_filiere`),
  ADD KEY `fk_enseignant` (`id_enseignant`),
  ADD KEY `semester` (`semester`);

--
-- Index pour la table `semester`
--
ALTER TABLE `semester`
  ADD PRIMARY KEY (`id_sem`),
  ADD UNIQUE KEY `nom_sem` (`nom_sem`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `absence`
--
ALTER TABLE `absence`
  MODIFY `id_absence` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `avoir_note`
--
ALTER TABLE `avoir_note`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT pour la table `enseignant`
--
ALTER TABLE `enseignant`
  MODIFY `id_enseignant` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT pour la table `examen`
--
ALTER TABLE `examen`
  MODIFY `id_examen` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT pour la table `filiere`
--
ALTER TABLE `filiere`
  MODIFY `id_filiere` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `module`
--
ALTER TABLE `module`
  MODIFY `id_module` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
