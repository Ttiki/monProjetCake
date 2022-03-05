-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Sam 24 Février 2018 à 11:18
-- Version du serveur :  5.6.20-log
-- Version de PHP :  7.0.3

SET
SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET
time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `bdcakephp`
--

--
-- Vider la table avant d'insérer `articles`
--

-- Vider la table avant d'insérer `articles_fournisseurs`
--
-- Vider la table avant d'insérer `fournisseurs`
--

TRUNCATE TABLE `fournisseurs`;
--
-- Contenu de la table `fournisseurs`
--

INSERT INTO `fournisseurs` (`id`, `name`, `created`, `adresse`, `cp`, `ville`)
VALUES (1, 'Toys Rus', '2018-02-22 17:52:25', 'rue de la gare', 64000, 'PAU'),
       (2, 'Jouets clubs', '2018-02-22 17:52:25', 'rue de gascogne', 64000, 'Pau'),
       (3, 'Père Noel', '2018-02-22 17:52:47', 'rue de laponie', 64000, 'PAU');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

TRUNCATE TABLE `articles_fournisseurs`;
--
-- Contenu de la table `articles_fournisseurs`
--

INSERT INTO `articles_fournisseurs` (`id`, `article_id`, `fournisseur_id`)
VALUES (1, 1, 2),
       (2, 2, 2),
       (3, 2, 3),
       (4, 33, 1),
       (5, 32, 2),
       (6, 1, 3),
       (7, 1, 2);


--

--

