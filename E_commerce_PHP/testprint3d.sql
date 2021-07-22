-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 22 oct. 2018 à 14:03
-- Version du serveur :  5.7.19
-- Version de PHP :  7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `testprint3d`
--

-- --------------------------------------------------------

--
-- Structure de la table `demandes`
--

DROP TABLE IF EXISTS `demandes`;
CREATE TABLE IF NOT EXISTS `demandes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date DEFAULT NULL,
  `dateRDV` date DEFAULT NULL,
  `horaire` varchar(10) DEFAULT NULL,
  `membreID` int(11) DEFAULT NULL,
  `typePanne` varchar(50) DEFAULT NULL,
  `mdpTV` varchar(10) DEFAULT NULL,
  `PC` varchar(20) DEFAULT NULL,
  `Commentaire` text,
  `paye` varchar(10) DEFAULT NULL,
  `confirmation` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=40 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `demandes`
--

INSERT INTO `demandes` (`id`, `date`, `dateRDV`, `horaire`, `membreID`, `typePanne`, `mdpTV`, `PC`, `Commentaire`, `paye`, `confirmation`) VALUES
(39, '2018-10-17', '2018-10-17', '8h-9h', 5, 'Ordinateur trop lent', '2155', 'windows', 'Compro po', 'payé', 1);

-- --------------------------------------------------------

--
-- Structure de la table `membres`
--

DROP TABLE IF EXISTS `membres`;
CREATE TABLE IF NOT EXISTS `membres` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `DateInscr` date DEFAULT NULL,
  `AddIP` varchar(14) DEFAULT NULL,
  `Pseudo` varchar(10) DEFAULT NULL,
  `Nom` varchar(10) DEFAULT NULL,
  `Prenom` varchar(10) DEFAULT NULL,
  `Email` varchar(30) DEFAULT NULL,
  `TeamViewer` varchar(9) DEFAULT NULL,
  `mdpTV` varchar(6) DEFAULT NULL,
  `MDPUser` varchar(45) DEFAULT NULL,
  `Adresse` varchar(70) DEFAULT NULL,
  `Tel` varchar(10) DEFAULT NULL,
  `statut` int(11) DEFAULT NULL,
  `idCustom` text,
  `last4` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `membres`
--

INSERT INTO `membres` (`id`, `DateInscr`, `AddIP`, `Pseudo`, `Nom`, `Prenom`, `Email`, `TeamViewer`, `mdpTV`, `MDPUser`, `Adresse`, `Tel`, `statut`, `idCustom`, `last4`) VALUES
(2, NULL, '', 'tzqst', 'dzeh', 'uhuh', 'jidfh@frf.fr', 'md8787', '5454', 'jujuhty', '4 hameau des fdp, hotmazs, 77456', '0612458798', NULL, NULL, NULL),
(3, '2018-09-18', '12.32.569.21', 'uhhuhuhu', 'ijijij', ':pren', 'email@jtjt.rr', NULL, NULL, ':passHache', ':adresse', ':tel', NULL, NULL, NULL),
(4, '2018-09-18', '::1', 'pirimaru', 'bes', 'pierre', 'julian@yolo.fr', NULL, NULL, 'c6c0727fe6c60272fa7bdd6b9aae158582c6b4f7', '4 hammme juju', '0612547852', NULL, NULL, NULL),
(5, '2018-09-19', '::1', 'jurams77', 'Jean', 'pierre', 'jeanTest@test.fr', NULL, NULL, '09d4edb1eac29cae6a386a98f2a46df70d009fcf', '4 rue des coquines, 69696, Moncul', '0612547852', 1, 'cus_DnBON8Ld6Tf4Ag', '4242'),
(6, '2018-09-21', '::1', 'nat', 'Cas', 'Natha', 'nath12@hotmail.fr', NULL, NULL, '0331776ec11d98c285b710da27a13fc099528040', 'feufheu fheufhehuh logn', '0625879569', 0, NULL, NULL),
(7, '2018-10-22', '::1', 'jeany', 'Jean', 'Louis', 'jeanlouis@hotmail.fr', NULL, NULL, '09d4edb1eac29cae6a386a98f2a46df70d009fcf', '4 rue de ta race', '0654879562', NULL, NULL, NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
