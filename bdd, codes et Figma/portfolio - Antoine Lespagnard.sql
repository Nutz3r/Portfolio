-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 09 juin 2023 à 10:09
-- Version du serveur : 8.0.31
-- Version de PHP : 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `portfolio`
--

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `nom`) VALUES
(0, 'Non classé'),
(28, 'Photographie'),
(27, 'InDesign'),
(26, 'PremierPro'),
(25, 'Web'),
(23, 'Illustrator'),
(24, 'Photoshop'),
(29, 'Blender'),
(30, 'Figma');

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

DROP TABLE IF EXISTS `contact`;
CREATE TABLE IF NOT EXISTS `contact` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `galerie`
--

DROP TABLE IF EXISTS `galerie`;
CREATE TABLE IF NOT EXISTS `galerie` (
  `id` int NOT NULL AUTO_INCREMENT,
  `frontPage` tinyint(1) NOT NULL,
  `id_categorie` int NOT NULL,
  `nom` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `galerie`
--

INSERT INTO `galerie` (`id`, `frontPage`, `id_categorie`, `nom`, `description`, `image`) VALUES
(17, 0, 23, 'Maman et moi Pâtisserie', 'Menu d\'Halloween pour la pâtisserie &quot;Maman et moi&quot; ', '1597842295Maman-et-moi-Py-tisserie-Affiche-Halloween-2.png'),
(18, 0, 23, 'Ombre inventée', 'Travail réalisé au cours de Photoshop', '2022765614T6-Ombres-inventy-es-Antoine-Lespagnard.jpg'),
(19, 0, 23, 'Morphing', 'Travail réalisé au cours de Photoshop', '1386273704T8-Morphing-Antoine-Lespagnard.jpg'),
(20, 0, 23, 'Nike Air Max', 'Maquette réalisée au cours de Web Design/UX', '224695869NikeAirMax.png'),
(21, 0, 23, 'e', 'zae', '1566612189NikeAirMax.png'),
(22, 1, 23, 'eazeaze', 'azea', '708451558NikeAirMax.png');

-- --------------------------------------------------------

--
-- Structure de la table `identifiants`
--

DROP TABLE IF EXISTS `identifiants`;
CREATE TABLE IF NOT EXISTS `identifiants` (
  `id` int NOT NULL AUTO_INCREMENT,
  `login` varchar(60) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `identifiants`
--

INSERT INTO `identifiants` (`id`, `login`, `password`, `email`) VALUES
(1, 'admin', '$2y$10$AyMVw6AcOyn8ifq/rS5XQuEauzTOmBtVEDLTSospCfatsMOs9Nq8S', 'admin@epse.be');

-- --------------------------------------------------------

--
-- Structure de la table `skills`
--

DROP TABLE IF EXISTS `skills`;
CREATE TABLE IF NOT EXISTS `skills` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(70) NOT NULL,
  `fichier` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `skills`
--

INSERT INTO `skills` (`id`, `nom`, `fichier`) VALUES
(6, 'Premiere Pro', '7220177111640093594Premiere-Pro.png'),
(14, 'Illustrator', '437414111068335931illustrator.png'),
(15, 'After Effect', '1602784272112576778aftereffect.png'),
(16, 'Figma', '1239163389pngegg.png'),
(17, 'Photography', '1989864587photographyicon.png'),
(18, 'InDesign', '1607392536Adobe-InDesign-CC-icon.svg.png'),
(19, 'PHP', '121772851pngegg-5-.png'),
(20, 'HTML5', '1797789049pngegg-3-.png'),
(21, 'CSS', '355736861pngegg-4-.png'),
(22, 'Blender', '502058241pngegg-1-.png');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
