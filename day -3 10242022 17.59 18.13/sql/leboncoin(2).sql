-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : dim. 23 oct. 2022 à 14:33
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
-- Base de données : `leboncoin`
--

-- --------------------------------------------------------

--
-- Structure de la table `annonce`
--

DROP TABLE IF EXISTS `annonce`;
CREATE TABLE IF NOT EXISTS `annonce` (
  `id_Annonce` int NOT NULL AUTO_INCREMENT,
  `nom_annonce` varchar(45) DEFAULT NULL,
  `prix` float DEFAULT NULL,
  `detail` varchar(45) DEFAULT NULL,
  `date_ajout` date DEFAULT NULL,
  `USER_id_user` int NOT NULL,
  `categorie_id_categorie` int NOT NULL,
  `Media` varchar(2000) DEFAULT NULL,
  PRIMARY KEY (`id_Annonce`,`USER_id_user`,`categorie_id_categorie`),
  UNIQUE KEY `id_Annonce_UNIQUE` (`id_Annonce`),
  KEY `fk_Annonce_USER1_idx` (`USER_id_user`),
  KEY `fk_Annonce_categorie1_idx` (`categorie_id_categorie`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `annonce`
--

INSERT INTO `annonce` (`id_Annonce`, `nom_annonce`, `prix`, `detail`, `date_ajout`, `USER_id_user`, `categorie_id_categorie`, `Media`) VALUES
(1, 'acer nitro', 999, 'acer nitro core i5', '2022-10-10', 9, 2, 'https://m.media-amazon.com/images/I/81kBKMPObLL._AC_SX679_.jpg'),
(2, 'Mercedes Classe c', 75000, 'Mercedes c', '2022-10-23', 6, 1, 'https://www.viinz.com/wp-content/uploads/2021/07/essai-mercedes-amg-g-63-exterieur-71-1170x780.jpg'),
(3, 'iphone 14', 1300, 'iphone 14 pro max', '2022-10-23', 6, 1, 'https://store.storeimages.cdn-apple.com/4668/as-images.apple.com/is/iphone-14-pro-model-unselect-gallery-1-202209?wid=5120&hei=2880&fmt=p-jpg&qlt=80&.v=1660753619946'),
(4, 'samsung', 999, 'Samsung z flip', '2022-10-23', 9, 3, 'https://www.01net.com/app/uploads/2022/09/test-samsung-galaxy-z-flip-4.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
CREATE TABLE IF NOT EXISTS `categorie` (
  `id_categorie` int NOT NULL AUTO_INCREMENT,
  `nom_categorie` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_categorie`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`id_categorie`, `nom_categorie`) VALUES
(1, 'Voiture'),
(2, 'ordinateur'),
(3, 'telephone');

-- --------------------------------------------------------

--
-- Structure de la table `like`
--

DROP TABLE IF EXISTS `like`;
CREATE TABLE IF NOT EXISTS `like` (
  `like` int DEFAULT '1',
  `Annonce_id_Annonce` int NOT NULL,
  `USER_id_user` int NOT NULL,
  PRIMARY KEY (`Annonce_id_Annonce`,`USER_id_user`),
  KEY `fk_Like_USER1_idx` (`USER_id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `like`
--

INSERT INTO `like` (`like`, `Annonce_id_Annonce`, `USER_id_user`) VALUES
(1, 1, 9);

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

DROP TABLE IF EXISTS `message`;
CREATE TABLE IF NOT EXISTS `message` (
  `id_message` int NOT NULL AUTO_INCREMENT,
  `detail` varchar(45) DEFAULT NULL,
  `reponse` int NOT NULL DEFAULT '0',
  `USER_id_user` int NOT NULL,
  `Annonce_id_Annonce` int NOT NULL,
  `Annonce_USER_id_user` int NOT NULL,
  `date_creation` datetime NOT NULL,
  PRIMARY KEY (`id_message`,`USER_id_user`,`Annonce_id_Annonce`,`Annonce_USER_id_user`),
  KEY `fk_message_USER1_idx` (`USER_id_user`),
  KEY `fk_message_Annonce1_idx` (`Annonce_id_Annonce`,`Annonce_USER_id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `message`
--

INSERT INTO `message` (`id_message`, `detail`, `reponse`, `USER_id_user`, `Annonce_id_Annonce`, `Annonce_USER_id_user`, `date_creation`) VALUES
(1, 'hi', 0, 6, 1, 9, '2022-10-12 10:37:18'),
(2, 'Bonjour monsieur Jordan', 1, 9, 1, 9, '2022-10-18 07:37:36'),
(3, 'je voudrais des renseignements sur les acers ', 0, 6, 1, 9, '2022-10-18 10:37:50'),
(4, 'okay je viens avec les details dans quelques ', 1, 9, 1, 9, '2022-10-22 16:38:03');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int NOT NULL AUTO_INCREMENT,
  `nom_user` varchar(45) DEFAULT NULL,
  `prenom_user` varchar(45) DEFAULT NULL,
  `mail_user` varchar(45) DEFAULT NULL,
  `mot_de_passe` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_user`),
  UNIQUE KEY `id_user_UNIQUE` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id_user`, `nom_user`, `prenom_user`, `mail_user`, `mot_de_passe`) VALUES
(6, 'montigiani', 'jordan', 'jordan@gmail.com', 'e9dd8698f46ee082688b195ea4676152'),
(9, 'Adams', 'Phillipe', 'adams@gmail.com', 'e10adc3949ba59abbe56e057f20f883e');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `annonce`
--
ALTER TABLE `annonce`
  ADD CONSTRAINT `fk_Annonce_categorie1` FOREIGN KEY (`categorie_id_categorie`) REFERENCES `categorie` (`id_categorie`),
  ADD CONSTRAINT `fk_Annonce_USER1` FOREIGN KEY (`USER_id_user`) REFERENCES `user` (`id_user`);

--
-- Contraintes pour la table `like`
--
ALTER TABLE `like`
  ADD CONSTRAINT `fk_Like_Annonce1` FOREIGN KEY (`Annonce_id_Annonce`) REFERENCES `annonce` (`id_Annonce`),
  ADD CONSTRAINT `fk_Like_USER1` FOREIGN KEY (`USER_id_user`) REFERENCES `user` (`id_user`);

--
-- Contraintes pour la table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `fk_message_Annonce1` FOREIGN KEY (`Annonce_id_Annonce`,`Annonce_USER_id_user`) REFERENCES `annonce` (`id_Annonce`, `USER_id_user`),
  ADD CONSTRAINT `fk_message_USER1` FOREIGN KEY (`USER_id_user`) REFERENCES `user` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
