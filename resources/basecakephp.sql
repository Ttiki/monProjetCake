-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Lun 28 Février 2022 à 16:38
-- Version du serveur :  5.7.11
-- Version de PHP :  7.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `basecakephp`
--

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `categ_id` int(11) NOT NULL,
  `emplacement_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `articles`
--

INSERT INTO `articles` (`id`, `name`, `slug`, `created`, `categ_id`, `emplacement_id`) VALUES
(1, 'Jeu de piste ', 'Jeu-de-piste ', '2017-07-31 13:11:57', 1, 1),
(3, 'Jeu de Molki', 'Jeu-de-Molki', '2017-07-31 17:32:48', 1, 2),
(32, 'Jeu de tarots', 'Jeu-de-tarots', '2017-08-04 13:33:31', 1, 1),
(33, 'balle de tennis decoration nuage', 'Balle-de-tennis-decoration-nuage', '2017-08-26 12:04:39', 2, 1);

-- --------------------------------------------------------

--
-- Structure de la table `articles_fournisseurs`
--

CREATE TABLE `articles_fournisseurs` (
  `id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `fournisseur_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `articles_fournisseurs`
--

INSERT INTO `articles_fournisseurs` (`id`, `article_id`, `fournisseur_id`) VALUES
(1, 1, 2),
(4, 33, 1),
(5, 32, 2),
(6, 1, 3),
(7, 1, 2);

-- --------------------------------------------------------

--
-- Structure de la table `categs`
--

CREATE TABLE `categs` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `categs`
--

INSERT INTO `categs` (`id`, `name`, `created`) VALUES
(1, 'Jeu', '2018-02-22 10:58:22'),
(2, 'DÃ©coration', '2018-02-22 10:58:22'),
(3, 'Habillement', '2018-02-22 10:58:43');

-- --------------------------------------------------------

--
-- Structure de la table `emplacements`
--

CREATE TABLE `emplacements` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `emplacements`
--

INSERT INTO `emplacements` (`id`, `name`, `created`) VALUES
(1, 'Etage 1', '2018-02-22 14:48:57'),
(2, 'RDC', '2018-02-22 14:48:57');

-- --------------------------------------------------------

--
-- Structure de la table `fournisseurs`
--

CREATE TABLE `fournisseurs` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `created` datetime NOT NULL,
  `adresse` varchar(50) NOT NULL,
  `cp` int(11) NOT NULL,
  `ville` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `fournisseurs`
--

INSERT INTO `fournisseurs` (`id`, `name`, `created`, `adresse`, `cp`, `ville`) VALUES
(1, 'Toys Rus', '2018-02-22 17:52:25', 'rue de la gare', 64000, 'PAU'),
(2, 'Jouets clubs', '2018-02-22 17:52:25', 'rue de gascogne', 64000, 'Pau'),
(3, 'PÃ¨re Noel', '2018-02-22 17:52:47', 'rue de laponie', 64000, 'PAU');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categ_id` (`categ_id`),
  ADD KEY `emplacement_id` (`emplacement_id`);

--
-- Index pour la table `articles_fournisseurs`
--
ALTER TABLE `articles_fournisseurs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `article_id` (`article_id`),
  ADD KEY `fournisseur_id` (`fournisseur_id`);

--
-- Index pour la table `categs`
--
ALTER TABLE `categs`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `emplacements`
--
ALTER TABLE `emplacements`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `fournisseurs`
--
ALTER TABLE `fournisseurs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT pour la table `articles_fournisseurs`
--
ALTER TABLE `articles_fournisseurs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT pour la table `categs`
--
ALTER TABLE `categs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `emplacements`
--
ALTER TABLE `emplacements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `fournisseurs`
--
ALTER TABLE `fournisseurs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `articles_ibfk_1` FOREIGN KEY (`categ_id`) REFERENCES `categs` (`id`),
  ADD CONSTRAINT `articles_ibfk_2` FOREIGN KEY (`emplacement_id`) REFERENCES `emplacements` (`id`);

--
-- Contraintes pour la table `articles_fournisseurs`
--
ALTER TABLE `articles_fournisseurs`
  ADD CONSTRAINT `articles_fournisseurs_ibfk_1` FOREIGN KEY (`article_id`) REFERENCES `articles` (`id`),
  ADD CONSTRAINT `articles_fournisseurs_ibfk_2` FOREIGN KEY (`fournisseur_id`) REFERENCES `fournisseurs` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
