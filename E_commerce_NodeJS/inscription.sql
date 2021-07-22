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
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;



INSERT INTO `inscription` (`id`, `Nom`, `Prenom`, `Age`, `Password`, `Email`, `adresse`, `Date`) VALUES
(1, '1', '2', '3', '4', '5', '6', '2021-03-08');
COMMIT;


