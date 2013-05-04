-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Client: 127.0.0.1
-- Généré le: Dim 07 Avril 2013 à 11:21
-- Version du serveur: 5.5.27-log
-- Version de PHP: 5.4.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `projetiti`
--

-- --------------------------------------------------------

--
-- Structure de la table `annonce`
--

CREATE TABLE IF NOT EXISTS `annonce` (
  `id_annonce` bigint(20) NOT NULL AUTO_INCREMENT,
  `titre` varchar(50) NOT NULL,
  `description` varchar(500) NOT NULL,
  `type_annonce` varchar(7) NOT NULL,
  `photo` blob DEFAULT NULL,
  PRIMARY KEY (`id_annonce`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Contenu de la table `annonce`
--

INSERT INTO `annonce` (`id_annonce`, `description`) VALUES
(1, 'Golf GTI','Golf GTI avec 230 000 Km. ','type1'),
(2, 'Renault Clio - Diesel - 150 Km','Renault Clio - Diesel - 150 Km','type1');

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE IF NOT EXISTS `categorie` (
  `id_categorie` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(50) NOT NULL,
  PRIMARY KEY (`id_categorie`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Contenu de la table `categorie`
--

INSERT INTO `categorie` (`id_categorie`, `type`) VALUES
(1, 'VEHICULES'),
(2, 'IMMOBILIER'),
(3, 'MULTIMEDIA'),
(4, 'MAISON'),
(5, 'SERVICES'),
(6, 'voitures'),
(7, 'motos'),
(8, 'equipements_auto'),
(9, 'equipements_moto'),
(10, 'ventes'),
(11, 'locations'),
(12, 'colocations'),
(13, 'informatique'),
(14, 'jeux_video'),
(15, 'image & son'),
(16, 'telephonie'),
(17, 'ameublement'),
(18, 'electromenager'),
(19, 'stages'),
(20, 'services'),
(21, 'billeterie');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id_utilisateur` bigint(20) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `date_naissance` date DEFAULT NULL,
  `num_voie` varchar(5) DEFAULT NULL,
  `nom_voie` varchar(50) DEFAULT NULL,
  `code_postal` varchar(5) DEFAULT NULL,
  `ville` varchar(50) DEFAULT NULL,
  `login` varchar(50) NOT NULL,
  `mot_passe` varchar(50) NOT NULL,
  `montrer_photo` tinyint(1) DEFAULT NULL,
  `montrer_infos` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id_utilisateur`),
  UNIQUE KEY `login` (`login`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id_utilisateur`, `nom`, `prenom`, `date_naissance`, `num_voie`, `nom_voie`, `code_postal`, `ville`, `login`, `mot_passe`, `montrer_photo`, `montrer_infos`) VALUES
(1, 'MARTOS', 'JÃ©rÃ©my', '1991-04-26', '75 ', 'Rue des Stations', '59000', 'LILLE', 'jeremy.martos@gmail.com', 'jeremym26', 0, 0),
(2, 'SUC', 'Olivier', '2013-03-03', '75b', 'Rue des stations', '59000', 'LILLE', 'olivier.suc@hei.fr', 'suco', NULL, NULL),
(3, '', '', NULL, NULL, NULL, NULL, NULL, 'test', 'test', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `vente`
--

CREATE TABLE IF NOT EXISTS `vente` (
  `id_vente` bigint(20) NOT NULL AUTO_INCREMENT,
  `prix_vente` float NOT NULL,
  `id_utilisateur` bigint(20) NOT NULL,
  `id_annonce` bigint(20) NOT NULL,
  `id_categorie` int(11) NOT NULL,
  PRIMARY KEY (`id_vente`),
  KEY `id_utilisateur` (`id_utilisateur`),
  KEY `id_annonce` (`id_annonce`),
  KEY `id_annonce_2` (`id_annonce`),
  KEY `id_categorie` (`id_categorie`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Contenu de la table `vente`
--

INSERT INTO `vente` (`id_vente`, `prix_vente`, `id_utilisateur`, `id_annonce`, `id_categorie`) VALUES
(5, 3500, 1, 1, 1),
(6, 3100, 2, 2, 1);

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `vente`
--
ALTER TABLE `vente`
  ADD CONSTRAINT `vente_ibfk_1` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id_utilisateur`),
  ADD CONSTRAINT `vente_ibfk_3` FOREIGN KEY (`id_annonce`) REFERENCES `annonce` (`id_annonce`),
  ADD CONSTRAINT `vente_ibfk_4` FOREIGN KEY (`id_categorie`) REFERENCES `categorie` (`id_categorie`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
