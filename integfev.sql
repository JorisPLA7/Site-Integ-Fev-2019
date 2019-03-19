-- phpMyAdmin SQL Dump
-- version 4.4.14.1
-- http://www.phpmyadmin.net
--
-- Client :  sql.mde.utc:3306
-- Généré le :  Mar 19 Mars 2019 à 12:32
-- Version du serveur :  10.1.37-MariaDB-0+deb9u1
-- Version de PHP :  5.3.29-1~dotdeb.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `integfev`
--

-- --------------------------------------------------------

--
-- Structure de la table `clan`
--

CREATE TABLE IF NOT EXISTS `clan` (
  `NOM_CLAN` varchar(15) NOT NULL,
  `Description` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `defi`
--

CREATE TABLE IF NOT EXISTS `defi` (
  `ID_DEFI` int(5) NOT NULL,
  `Intitule` varchar(50) NOT NULL,
  `Description` varchar(250) NOT NULL,
  `Points` int(6) NOT NULL,
  `nombreDagul` int(5) DEFAULT NULL,
  `nombreDuri` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `epreuve`
--

CREATE TABLE IF NOT EXISTS `epreuve` (
  `ID_EPREUVE` int(5) NOT NULL,
  `Intitule` varchar(70) NOT NULL,
  `Description` varchar(250) NOT NULL,
  `Heure` time NOT NULL,
  `Points` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `jour`
--

CREATE TABLE IF NOT EXISTS `jour` (
  `ID_JOUR` int(11) NOT NULL,
  `Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `ID_NEWS` int(5) NOT NULL,
  `Intitule` varchar(50) NOT NULL,
  `Description` varchar(250) NOT NULL,
  `Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `planning`
--

CREATE TABLE IF NOT EXISTS `planning` (
  `ID_JOUR` int(11) NOT NULL,
  `ID_EPREUVE` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `username` varchar(30) NOT NULL,
  `password` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `win_epreuve`
--

CREATE TABLE IF NOT EXISTS `win_epreuve` (
  `NOM_CLAN` varchar(15) NOT NULL,
  `ID_JOUR` int(11) NOT NULL,
  `ID_EPREUVE` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `clan`
--
ALTER TABLE `clan`
  ADD PRIMARY KEY (`NOM_CLAN`);

--
-- Index pour la table `defi`
--
ALTER TABLE `defi`
  ADD PRIMARY KEY (`ID_DEFI`);

--
-- Index pour la table `epreuve`
--
ALTER TABLE `epreuve`
  ADD PRIMARY KEY (`ID_EPREUVE`);

--
-- Index pour la table `jour`
--
ALTER TABLE `jour`
  ADD PRIMARY KEY (`ID_JOUR`);

--
-- Index pour la table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`ID_NEWS`);

--
-- Index pour la table `planning`
--
ALTER TABLE `planning`
  ADD PRIMARY KEY (`ID_JOUR`,`ID_EPREUVE`);

--
-- Index pour la table `win_epreuve`
--
ALTER TABLE `win_epreuve`
  ADD PRIMARY KEY (`ID_JOUR`,`ID_EPREUVE`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `defi`
--
ALTER TABLE `defi`
  MODIFY `ID_DEFI` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `epreuve`
--
ALTER TABLE `epreuve`
  MODIFY `ID_EPREUVE` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `jour`
--
ALTER TABLE `jour`
  MODIFY `ID_JOUR` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `news`
--
ALTER TABLE `news`
  MODIFY `ID_NEWS` int(5) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
