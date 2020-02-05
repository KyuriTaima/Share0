-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mer. 21 fév. 2018 à 12:40
-- Version du serveur :  5.7.19
-- Version de PHP :  5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `test`
--

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

DROP TABLE IF EXISTS `articles`;
CREATE TABLE IF NOT EXISTS `articles` (
  `id_article` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `contenu` text NOT NULL,
  PRIMARY KEY (`id_article`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `articles`
--

INSERT INTO `articles` (`id_article`, `titre`, `pseudo`, `date`, `contenu`) VALUES
(1, 'Les chats !', 'homny', '2018-02-05 23:33:09', 'J\'adore les chats, ils sont trop mignons surtout quand ils se trémoussent sur le ventre d\'un gros monsieur canadien !'),
(2, 'La pétanque.', 'marquinitos', '2018-02-05 23:34:21', 'La pétanque, plus qu\'un sport, c\'est une passion, j\'adore ça surtout quand il y a du jaune et des bons copains ! Vive la France !'),
(8, 'Melia, mon chat adoré !', 'luludelac', '2018-02-06 21:12:21', 'Mélia, je l\'aime car elle ne miaule pas !'),
(5, 'Les petits biscuits dorés', 'KyuriTaima', '2018-02-06 19:41:18', '													Moi et les biscuits, plus qu\'un amour impossible, c\'est une passion oxymorique. Et j\'aime bien les beignets au pommes aussi										'),
(13, 'Soutenance EPF Projets', 'KyuriTaima', '2018-02-07 02:14:33', 'La soutenance pour EPF Projets c\'est vraiment un moment privilégié dans ma vie associative ainsi que ma vie professionnelle.\r\nJe suis extrêmement content de m\'y rendre pour présenter mon projet.');

-- --------------------------------------------------------

--
-- Structure de la table `share`
--

DROP TABLE IF EXISTS `share`;
CREATE TABLE IF NOT EXISTS `share` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `interets` text NOT NULL,
  `mdp` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `share`
--

INSERT INTO `share` (`id`, `nom`, `prenom`, `email`, `pseudo`, `interets`, `mdp`) VALUES
(20, 'de la Croix', 'Sulwen', 'sulwen.delacroix@gmail.com', 'KyuriTaima', 'Le CSS en majorité', 'darkoda1'),
(19, 'Serfaty', 'Matthieu', 'matt.serf@hotmail.fr', 'Homny', 'LE FOOT !', 'sulwen12'),
(21, 'Lhopiteau', 'Marc', 'm.lhopiteau@gmail.com', 'marquinitos', 'le hand', 'google2'),
(22, 'Bielak', 'Alexandre', 'alex@gmail.com', 'castorjaune', 'league of legends et les animés', 'castor12'),
(23, 'de la Croix', 'Lucile', 'luludelac@hotmail.fr', 'luludelac', 'Les chats', 'sulwenjr26'),
(24, 'Monchat', 'Murielle', 'm.monchat@gmail.com', 'Joujou', 'Le tricot, la pétanque et le travail en entreprise du CAC 40', 'joujou12'),
(27, 'Boulard', 'Germain', 'gb@gmail.com', 'germaindu88', 'La chasse à cour', 'gergerlafougere'),
(28, 'Dupont', 'Valentin', 'v.vassas@gmail.com', 'val', 'EPF Projets', 'valentin00');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
