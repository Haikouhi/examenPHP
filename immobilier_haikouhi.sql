-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3308
-- Généré le :  mar. 22 jan. 2019 à 16:37
-- Version du serveur :  5.7.23
-- Version de PHP :  7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `immobilier_haikouhi`
--
CREATE DATABASE IF NOT EXISTS `immobilier_haikouhi` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `immobilier_haikouhi`;

-- --------------------------------------------------------

--
-- Structure de la table `logement`
--

DROP TABLE IF EXISTS `logement`;
CREATE TABLE IF NOT EXISTS `logement` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adresse` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ville` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cp` char(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `surface` int(11) NOT NULL,
  `prix` int(11) NOT NULL,
  `photo` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` enum('location','vente') COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `logement`
--

INSERT INTO `logement` (`id`, `titre`, `adresse`, `ville`, `cp`, `surface`, `prix`, `photo`, `type`, `description`) VALUES
(1, 'farts', 'farts', 'farts', '25255', 2, 50001, NULL, 'location', NULL),
(2, 'hogwarts', 'somewhere magique', 'london maybe', '25255', 28, 50018, NULL, 'location', NULL),
(3, 'disneyland', 'somewhere warm', 'orlando', '85987', 19, 50020, NULL, 'vente', NULL),
(4, 'justin biebers house', 'this joke is lame', 'dunno', '58556', 18, 50016, NULL, 'vente', NULL),
(23, 'hermiones house', 'londons', 'lodnon', '88888', 25, 50023, 'pic_5c4736ad31597.jpg', 'location', NULL),
(7, 'haik', 'oh hai', 'tehhee', '55555', 2, 50005, NULL, 'location', NULL),
(13, 'sdfdf', 'sdfdsf', 'sdfdsf', '77777', 3, 50004, 'pic_5c472b29a1522.jpg', 'location', NULL),
(10, 'gotham city', 'gotham', 'new york', '11111', 2, 50003, NULL, 'vente', NULL),
(11, 'gotham city', 'gotham', 'new york', '11111', 2, 50003, NULL, 'vente', NULL),
(12, 'house of horrors', 'dnno', 'dunno', '44444', 2, 50002, 'pic_5c4728a008051.png', 'location', NULL),
(15, 'farts', 'farts', 'farts', '25255', 42, 50004, NULL, 'location', NULL),
(22, 'heelp', 'heeelppp', 'heeelpp', '66666', 2, 50004, 'pic_5c473646c7833.jpg', 'location', NULL),
(21, 'imoverit', 'imoverit', 'thisisnotworking', '66666', 666666, 666666, 'pic_5c4733b67f0bd.jpg', 'location', NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
