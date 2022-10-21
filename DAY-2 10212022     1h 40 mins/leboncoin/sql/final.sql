-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 21, 2022 at 07:48 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `leboncoin`
--

-- --------------------------------------------------------

--
-- Table structure for table `annonce`
--

CREATE TABLE `annonce` (
  `id_Annonce` int(11) NOT NULL,
  `nom_annonce` varchar(45) DEFAULT NULL,
  `detail` varchar(2000) DEFAULT NULL,
  `date_ajout` date DEFAULT NULL,
  `USER_id_user` int(11) NOT NULL,
  `categorie_id_categorie` int(11) NOT NULL,
  `Media` varchar(2000) DEFAULT NULL,
  `prix` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `annonce`
--

INSERT INTO `annonce` (`id_Annonce`, `nom_annonce`, `detail`, `date_ajout`, `USER_id_user`, `categorie_id_categorie`, `Media`, `prix`) VALUES
(2, 'voiture Mercedes', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '2022-10-21', 1, 1, 'https://media.ed.edmunds-media.com/mercedes-benz/amg-gt/2020/oem/2020_mercedes-benz_amg-gt_sedan_53_fq_oem_1_1600.jpg', '4520'),
(3, 'voiture Mercedes', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '2022-10-22', 1, 1, 'https://media.ed.edmunds-media.com/mercedes-benz/amg-gt/2020/oem/2020_mercedes-benz_amg-gt_sedan_53_fq_oem_1_1600.jpg', '3000'),
(5, 'a', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '2022-10-08', 8, 1, 'https://media.ed.edmunds-media.com/mercedes-benz/amg-gt/2020/oem/2020_mercedes-benz_amg-gt_sedan_53_fq_oem_1_1600.jpg', '2500'),
(6, 'G-wagon', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '2022-10-03', 8, 1, 'https://media.ed.edmunds-media.com/mercedes-benz/amg-gt/2020/oem/2020_mercedes-benz_amg-gt_sedan_53_fq_oem_1_1600.jpg', '3500');

-- --------------------------------------------------------

--
-- Table structure for table `categorie`
--

CREATE TABLE `categorie` (
  `id_categorie` int(11) NOT NULL,
  `nom_categorie` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categorie`
--

INSERT INTO `categorie` (`id_categorie`, `nom_categorie`) VALUES
(1, 'Voiture');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id_annonce` int(11) NOT NULL,
  `detail` varchar(45) DEFAULT NULL,
  `Annonce_id_Annonce` int(11) NOT NULL,
  `USER_id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nom_user` varchar(45) DEFAULT NULL,
  `prenom_user` varchar(45) DEFAULT NULL,
  `mail_user` varchar(45) DEFAULT NULL,
  `mot_de_passe` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nom_user`, `prenom_user`, `mail_user`, `mot_de_passe`) VALUES
(5, 'Bemelingue Djossie', 'Wilfried Ryan', 'wilfriedbemelingue@gmail.com', 'ebe596017db2f8c69136e5d6e594d365'),
(6, 'montigiani', 'jordan', 'jordan@gmail.com', 'e9dd8698f46ee082688b195ea4676152'),
(7, 'Bemelingue Djossie', 'Wilfried Ryan', 'wilfriedbemelingue@wil.com', 'ebe596017db2f8c69136e5d6e594d365'),
(8, 'Bemelingue Djossie', 'Wilfried Ryan', 'wil@gmail.com', '781e5e245d69b566979b86e28d23f2c7');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `annonce`
--
ALTER TABLE `annonce`
  ADD PRIMARY KEY (`id_Annonce`,`USER_id_user`,`categorie_id_categorie`),
  ADD UNIQUE KEY `id_Annonce_UNIQUE` (`id_Annonce`),
  ADD KEY `fk_Annonce_USER1_idx` (`USER_id_user`),
  ADD KEY `fk_Annonce_categorie1_idx` (`categorie_id_categorie`);

--
-- Indexes for table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id_categorie`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id_annonce`,`Annonce_id_Annonce`,`USER_id_user`),
  ADD UNIQUE KEY `Annonce_id_Annonce_UNIQUE` (`Annonce_id_Annonce`),
  ADD KEY `fk_message_Annonce_idx` (`Annonce_id_Annonce`),
  ADD KEY `fk_message_USER1_idx` (`USER_id_user`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `id_user_UNIQUE` (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `annonce`
--
ALTER TABLE `annonce`
  MODIFY `id_Annonce` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `id_categorie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id_annonce` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `annonce`
--
ALTER TABLE `annonce`
  ADD CONSTRAINT `fk_Annonce_USER1` FOREIGN KEY (`USER_id_user`) REFERENCES `user` (`id_user`),
  ADD CONSTRAINT `fk_Annonce_categorie1` FOREIGN KEY (`categorie_id_categorie`) REFERENCES `categorie` (`id_categorie`);

--
-- Constraints for table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `fk_message_Annonce` FOREIGN KEY (`Annonce_id_Annonce`) REFERENCES `annonce` (`id_Annonce`),
  ADD CONSTRAINT `fk_message_USER1` FOREIGN KEY (`USER_id_user`) REFERENCES `user` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
