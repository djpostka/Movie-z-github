-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mar 24 Novembre 2015 à 14:35
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `db_movies`
--

-- --------------------------------------------------------

--
-- Structure de la table `moviez`
--

CREATE TABLE IF NOT EXISTS `moviez` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `imdbID` varchar(255) COLLATE utf8_bin NOT NULL,
  `Title` varchar(255) COLLATE utf8_bin NOT NULL,
  `Year` varchar(255) COLLATE utf8_bin NOT NULL,
  `Rated` varchar(255) COLLATE utf8_bin NOT NULL,
  `Poster` varchar(255) COLLATE utf8_bin NOT NULL,
  `Released` varchar(255) COLLATE utf8_bin NOT NULL,
  `Runtime` varchar(255) COLLATE utf8_bin NOT NULL,
  `Genre` varchar(255) COLLATE utf8_bin NOT NULL,
  `Director` varchar(255) COLLATE utf8_bin NOT NULL,
  `Writer` varchar(255) COLLATE utf8_bin NOT NULL,
  `Actors` varchar(255) COLLATE utf8_bin NOT NULL,
  `Plot` varchar(255) COLLATE utf8_bin NOT NULL,
  `Language` varchar(255) COLLATE utf8_bin NOT NULL,
  `Country` varchar(255) COLLATE utf8_bin NOT NULL,
  `Awards` varchar(255) COLLATE utf8_bin NOT NULL,
  `Metascore` varchar(255) COLLATE utf8_bin NOT NULL,
  `imdbRating` varchar(255) COLLATE utf8_bin NOT NULL,
  `imdbVotes` varchar(255) COLLATE utf8_bin NOT NULL,
  KEY `ID` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
