-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 04 mai 2023 à 17:28
-- Version du serveur : 8.0.27
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `yasoshop`
--

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
CREATE TABLE IF NOT EXISTS `categorie` (
  `id` int NOT NULL AUTO_INCREMENT,
  `libelle` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `date_creation` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `icone` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`id`, `libelle`, `description`, `date_creation`, `icone`) VALUES
(1, 'Parfums', 'Parfums', '0000-00-00 00:00:00', ''),
(2, 'Montres', 'Montres', '2023-04-03 16:04:08', '');

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

DROP TABLE IF EXISTS `commande`;
CREATE TABLE IF NOT EXISTS `commande` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_client` int NOT NULL,
  `total` decimal(10,0) NOT NULL,
  `valide` int NOT NULL,
  `date_creation` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `commande`
--

INSERT INTO `commande` (`id`, `id_client`, `total`, `valide`, `date_creation`) VALUES
(1, 2, '40', 0, '0000-00-00 00:00:00'),
(2, 1, '80', 0, '0000-00-00 00:00:00'),
(3, 2, '40', 0, '0000-00-00 00:00:00'),
(4, 2, '40', 0, '2023-04-03 16:03:26'),
(5, 1, '40', 0, '2023-04-05 04:41:22'),
(6, 1, '0', 0, '2023-04-05 04:41:25'),
(7, 1, '40', 0, '2023-04-05 12:48:36'),
(8, 1, '0', 0, '2023-04-05 12:48:39'),
(9, 1, '40', 0, '2023-04-05 12:48:48'),
(10, 1, '0', 0, '2023-04-05 12:49:11'),
(11, 1, '40', 0, '2023-04-05 12:49:21'),
(12, 1, '0', 0, '2023-04-05 12:49:22'),
(13, 1, '80', 0, '2023-04-05 12:49:49'),
(14, 1, '0', 0, '2023-04-05 12:50:01'),
(15, 1, '40', 0, '2023-04-05 12:52:11'),
(16, 1, '0', 0, '2023-04-05 12:52:13'),
(17, 1, '40', 0, '2023-04-05 12:53:19'),
(18, 1, '0', 0, '2023-04-05 12:53:20'),
(19, 1, '40', 0, '2023-04-05 12:57:03'),
(20, 1, '40', 0, '2023-04-05 12:59:34'),
(21, 1, '0', 0, '2023-04-05 12:59:42'),
(22, 1, '40', 0, '2023-04-05 12:59:53'),
(23, 1, '0', 0, '2023-04-05 12:59:57'),
(24, 1, '40', 0, '2023-04-05 13:03:05'),
(25, 1, '0', 0, '2023-04-05 13:03:08'),
(26, 1, '40', 0, '2023-04-05 13:03:31'),
(27, 2, '40', 0, '2023-04-05 13:27:09'),
(28, 2, '0', 0, '2023-04-05 13:27:15'),
(29, 1, '80', 0, '2023-04-05 13:30:43'),
(30, 1, '0', 0, '2023-04-05 13:30:45'),
(31, 1, '40', 0, '2023-04-05 13:36:29'),
(32, 1, '40', 0, '2023-04-05 13:56:52'),
(33, 4, '40', 0, '2023-04-05 14:00:39'),
(34, 1, '40', 0, '2023-04-30 20:43:44'),
(35, 1, '0', 0, '2023-04-30 20:43:46'),
(36, 1, '40', 0, '2023-05-04 18:43:40');

-- --------------------------------------------------------

--
-- Structure de la table `ligne_commande`
--

DROP TABLE IF EXISTS `ligne_commande`;
CREATE TABLE IF NOT EXISTS `ligne_commande` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_produit` int NOT NULL,
  `id_commande` int NOT NULL,
  `prix` decimal(10,0) NOT NULL,
  `quantite` int NOT NULL,
  `total` decimal(10,0) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `ligne_commande_ibfk_1` (`id_commande`),
  KEY `id_produit` (`id_produit`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `ligne_commande`
--

INSERT INTO `ligne_commande` (`id`, `id_produit`, `id_commande`, `prix`, `quantite`, `total`) VALUES
(1, 2, 1, '40', 1, '40'),
(2, 2, 2, '40', 2, '80'),
(3, 2, 3, '40', 1, '40'),
(4, 2, 4, '40', 1, '40'),
(5, 2, 5, '40', 1, '40'),
(6, 2, 7, '40', 1, '40'),
(7, 2, 9, '40', 1, '40'),
(8, 2, 11, '40', 1, '40'),
(9, 2, 13, '40', 2, '80'),
(10, 2, 15, '40', 1, '40'),
(11, 2, 17, '40', 1, '40'),
(12, 2, 19, '40', 1, '40'),
(13, 2, 20, '40', 1, '40'),
(14, 2, 22, '40', 1, '40'),
(15, 2, 24, '40', 1, '40'),
(16, 2, 26, '40', 1, '40'),
(17, 3, 27, '40', 1, '40'),
(18, 2, 29, '40', 2, '80'),
(19, 2, 31, '40', 1, '40'),
(20, 2, 32, '40', 1, '40'),
(21, 2, 33, '40', 1, '40'),
(22, 2, 34, '40', 1, '40'),
(23, 2, 36, '40', 1, '40');

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

DROP TABLE IF EXISTS `produit`;
CREATE TABLE IF NOT EXISTS `produit` (
  `id` int NOT NULL AUTO_INCREMENT,
  `libelle` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `prix` int NOT NULL,
  `discount` int NOT NULL,
  `id_categorie` int NOT NULL,
  `date_creation` int NOT NULL,
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `image` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_categorie_produit` (`id_categorie`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`id`, `libelle`, `prix`, `discount`, `id_categorie`, `date_creation`, `description`, `image`) VALUES
(2, 'Hugo Boss : L\'élixir de l\'aventurier moderne. Une fragrance audacieuse qui mêle la fraîcheur des agrumes à la chaleur épicée du bois de cèdre, pour une expérience olfactive unique et inoubliable.', 40, 0, 1, 2023, '20 ml.', '642d58d3f3f1923339.jpg'),
(3, 'ArmaniCare : une ligne de produits de soins de la peau haut de gamme conçue pour les hommes et les femmes qui cherchent à prendre soin de leur peau avec des ingrédients de qualité supérieure et des formules scientifiquement avancées. Des crèmes hydratante', 40, 0, 1, 2023, '20 ml.', '642d5a669960152219.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id` int NOT NULL AUTO_INCREMENT,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date_creation` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `login`, `password`, `date_creation`) VALUES
(31, 'Yassine', '$2y$10$/Ap/Q2/rE08ZFVtSVwWM4.OQVBFtg6HYFueFIIqmr9wTvLD6tm2KO', '2023-04-05'),
(33, 'sofiane', '$2y$10$Iwjd6MNnZBHpBoBg2A1cY.8.BYRnAgqNsCsCKBg1IfxiJlTN1fYRm', '2023-05-04');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `ligne_commande`
--
ALTER TABLE `ligne_commande`
  ADD CONSTRAINT `ligne_commande_ibfk_1` FOREIGN KEY (`id_commande`) REFERENCES `commande` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ligne_commande_ibfk_2` FOREIGN KEY (`id_produit`) REFERENCES `produit` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `produit`
--
ALTER TABLE `produit`
  ADD CONSTRAINT `fk_categorie_produit` FOREIGN KEY (`id_categorie`) REFERENCES `categorie` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
