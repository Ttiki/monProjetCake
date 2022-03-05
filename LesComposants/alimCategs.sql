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

TRUNCATE TABLE `articles`;
--
-- Contenu de la table `articles`
--

INSERT INTO `articles` (`id`, `name`, `slug`, `created`, `categ_id`, `emplacement_id`)
VALUES (1, 'Jeu de piste ', 'Jeu-de-piste ', '2017-07-31 13:11:57', 1, 1),
       (3, 'Jeu de Molki', 'Jeu-de-Molki', '2017-07-31 17:32:48', 1, 2),
       (32, 'Jeu de tarots', 'Jeu-de-tarots', '2017-08-04 13:33:31', 1, 1),
       (33, 'balle de tennis decoration nuage', 'Balle-de-tennis-decoration-nuage', '2017-08-26 12:04:39', 2, 1);



--
-- Vider la table avant d'insérer `categs`
--

TRUNCATE TABLE `categs`;
--
-- Contenu de la table `categs`
--

INSERT INTO `categs` (`id`, `name`, `created`)
VALUES (1, 'Jeu', '2018-02-22 10:58:22'),
       (2, 'Décoration', '2018-02-22 10:58:22'),
       (3, 'Habillement', '2018-02-22 10:58:43');

--
-- Vider la table avant d'insérer `emplacements`
--

TRUNCATE TABLE `emplacements`;
--
-- Contenu de la table `emplacements`
--

INSERT INTO `emplacements` (`id`, `name`, `created`)
VALUES (1, 'Etage 1', '2018-02-22 14:48:57'),
       (2, 'RDC', '2018-02-22 14:48:57');

--
-- Vider la table avant d'insérer `fournisseurs`

