-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 21 juin 2021 à 15:21
-- Version du serveur :  5.7.24
-- Version de PHP :  7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `testdb`
--

-- --------------------------------------------------------

--
-- Structure de la table `fonds_photos`
--

DROP TABLE IF EXISTS `fonds_photos`;
CREATE TABLE IF NOT EXISTS `fonds_photos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `photo` varchar(50) NOT NULL,
  `libel` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `fonds_photos`
--

INSERT INTO `fonds_photos` (`id`, `photo`, `libel`) VALUES
(1, 'fonds_photos/fond-6.jpg', 'testfond');

-- --------------------------------------------------------

--
-- Structure de la table `inscription`
--

DROP TABLE IF EXISTS `inscription`;
CREATE TABLE IF NOT EXISTS `inscription` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Nom` varchar(30) NOT NULL,
  `Prenom` varchar(30) NOT NULL,
  `Age` varchar(30) NOT NULL,
  `Password` varchar(40) NOT NULL,
  `Email` varchar(40) NOT NULL,
  `adresse` varchar(60) NOT NULL,
  `Date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `inscription`
--

INSERT INTO `inscription` (`id`, `Nom`, `Prenom`, `Age`, `Password`, `Email`, `adresse`, `Date`) VALUES
(1, '1', '2', '3', '4', '5', '6', '2021-03-08'),
(2, '', '', '', '', '', '', '2021-03-10'),
(3, 'Bes', 'Jula2', '181', 'lepass', 'test@test.com', '4 hameau ', '2021-04-27');

-- --------------------------------------------------------

--
-- Structure de la table `photosproduits`
--

DROP TABLE IF EXISTS `photosproduits`;
CREATE TABLE IF NOT EXISTS `photosproduits` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `LienPhoto1` varchar(255) DEFAULT NULL,
  `LienPhoto2` varchar(255) DEFAULT NULL,
  `LienPhoto3` varchar(255) DEFAULT NULL,
  `LienPhoto4` varchar(255) DEFAULT NULL,
  `LienPhoto5` varchar(255) DEFAULT NULL,
  `LienPhoto6` varchar(255) DEFAULT NULL,
  `LienPhoto7` varchar(255) DEFAULT NULL,
  `LienPhoto8` varchar(255) DEFAULT NULL,
  `id_FondImg` int(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `photosproduits`
--

INSERT INTO `photosproduits` (`id`, `LienPhoto1`, `LienPhoto2`, `LienPhoto3`, `LienPhoto4`, `LienPhoto5`, `LienPhoto6`, `LienPhoto7`, `LienPhoto8`, `id_FondImg`) VALUES
(1, 'product/product-1.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1),
(2, 'product/product-2.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2),
(3, 'product/product-3.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2),
(4, 'produits/product-4.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1),
(5, 'produits/product-5.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1),
(6, 'produits/product-6.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

DROP TABLE IF EXISTS `produits`;
CREATE TABLE IF NOT EXISTS `produits` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `id_sous_categ` varchar(255) DEFAULT NULL,
  `prix` int(11) DEFAULT NULL,
  `nbAchat` int(11) DEFAULT NULL,
  `Date` date DEFAULT NULL,
  `id_photo` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `sous_categorie`
--

DROP TABLE IF EXISTS `sous_categorie`;
CREATE TABLE IF NOT EXISTS `sous_categorie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(255) DEFAULT NULL,
  `categorie` varchar(255) DEFAULT NULL,
  `Date` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
