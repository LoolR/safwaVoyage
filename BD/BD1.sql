-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 25, 2016 at 04:44 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `safwavoyagebd`
--

-- --------------------------------------------------------

--
-- Table structure for table `cat_voyage`
--

CREATE TABLE IF NOT EXISTS `cat_voyage` (
  `id_cat_voy` int(11) NOT NULL AUTO_INCREMENT,
  `nom_cat_voy` varchar(45) DEFAULT NULL,
  `desc_cat_voy` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_cat_voy`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `cat_voyage`
--

INSERT INTO `cat_voyage` (`id_cat_voy`, `nom_cat_voy`, `desc_cat_voy`) VALUES
(2, 'Omra', 'visite de mekka'),
(3, 'Voyage Culturel', 'visite des site culturel et antique'),
(4, 'Voyage Medical', 'test');

-- --------------------------------------------------------

--
-- Table structure for table `dest`
--

CREATE TABLE IF NOT EXISTS `dest` (
  `id_dest` int(11) NOT NULL AUTO_INCREMENT,
  `nom_dest` varchar(45) DEFAULT NULL,
  `id_media_dest` varchar(45) DEFAULT NULL,
  `description_dest` varchar(45) DEFAULT NULL,
  `pays_dest` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_dest`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `dest`
--

INSERT INTO `dest` (`id_dest`, `nom_dest`, `id_media_dest`, `description_dest`, `pays_dest`) VALUES
(1, 'Tanger', '1', 'une ville', 'Maroc'),
(6, 'Paris', '20', 'tour eiffel', 'France'),
(7, 'Istanbul', '25', 'Ville touristique', 'Turquie'),
(8, 'Bali', '26', 'Bali est une île d''Indonésie située entre les', 'Indonesie'),
(9, 'Rabat', '23', 'Capital du Maroc', 'Maroc'),
(12, 'Fes', '23', 'Ville touristique Marocaine', 'Maroc');

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE IF NOT EXISTS `media` (
  `id_media` int(11) NOT NULL AUTO_INCREMENT,
  `nom_media` varchar(45) DEFAULT NULL,
  `desc_media` varchar(45) DEFAULT NULL,
  `source_media` varchar(45) DEFAULT NULL,
  `id_type_media` int(11) DEFAULT NULL,
  `slider_media` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_media`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`id_media`, `nom_media`, `desc_media`, `source_media`, `id_type_media`, `slider_media`) VALUES
(19, 'Taj Mahal', 'tajmahal inde', '460484eb1f8ae994f3fb4b4f8ef6905a.jpg', 1, 1),
(20, 'tour eiffel', 'la tour eiddel', 'b130f74271392e680bee4f43509dc27f.jpg', 1, 1),
(21, 'Sahara', 'desert', '2ee0f93d17c075c0f7cc71115128aca0.jpg', 1, 1),
(22, 'plage pasifique', 'plage pasifique', '2ca3744692454c69b0519bebd00bafc0.jpg', 1, 1),
(23, 'Logo Safwa Voyage', 'logo de Safwa', 'f88912f967b12f988400357716463fff.png', 1, 1),
(25, 'Istanbul', 'Aya sufia', 'e4a6e0dc958b3b3ca178f0f0ff98acaf.jpg', 1, 1),
(26, 'Bali', 'Bali', 'ea0f56bb82a545de9e5d0aab650f78db.jpg', 1, 1),
(27, 'Omra', 'Omra', 'f017a7b44c2251545dd1d8520206c4b6.jpg', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE IF NOT EXISTS `reservation` (
  `id_reservation` int(11) NOT NULL AUTO_INCREMENT,
  `res_nom` varchar(128) NOT NULL,
  `res_prenom` varchar(128) NOT NULL,
  `res_email` varchar(128) NOT NULL,
  `res_nbr_adulte` int(11) NOT NULL,
  `res_nbr_enfants` int(11) NOT NULL,
  `res_tel` varchar(128) NOT NULL,
  `res_info` varchar(512) NOT NULL,
  `id_res_voy` int(11) NOT NULL,
  PRIMARY KEY (`id_reservation`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `type_media`
--

CREATE TABLE IF NOT EXISTS `type_media` (
  `id_type_media` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nom_type_media` varchar(45) DEFAULT NULL,
  `ext_type_media` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_type_media`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `type_media`
--

INSERT INTO `type_media` (`id_type_media`, `nom_type_media`, `ext_type_media`) VALUES
(1, 'image', 'jpeg jpg png gif');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(45) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `login`, `password`) VALUES
(2, 'admin', '21232f297a57a5a743894a0e4a801fc3'),
(3, 'hamza', '8950259507cd8ce2a99f8b94674f2b77');

-- --------------------------------------------------------

--
-- Table structure for table `voyage`
--

CREATE TABLE IF NOT EXISTS `voyage` (
  `id_voy` int(11) NOT NULL AUTO_INCREMENT,
  `titre_voy` varchar(45) DEFAULT NULL,
  `s_titre_voy` varchar(45) DEFAULT NULL,
  `prix_voy` int(11) DEFAULT NULL,
  `id_media_voy` int(11) DEFAULT NULL,
  `text_voy` varchar(255) DEFAULT NULL,
  `date_voy` varchar(45) DEFAULT NULL,
  `duree_voy` int(11) DEFAULT NULL,
  `id_dest_voy` int(11) DEFAULT NULL,
  `id_cat_voy` varchar(45) DEFAULT NULL,
  `visible_voy` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id_voy`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `voyage`
--

INSERT INTO `voyage` (`id_voy`, `titre_voy`, `s_titre_voy`, `prix_voy`, `id_media_voy`, `text_voy`, `date_voy`, `duree_voy`, `id_dest_voy`, `id_cat_voy`, `visible_voy`) VALUES
(2, 'Orma est dubai', 'passage de dubai puis Orma', 1500, 27, 'Magnifique voyage 1', '2016-05-06', 10, 1, '2', 1),
(3, 'azerty', 'azerty', 7500, 17, 'qsdfgh', '2016-05-06', 14, 1, '3', 0),
(4, 'Voyager a la ville des lumieres', 'Visite guidé a la capitale de la France', 5500, 20, 'Capitale de la France, Paris est née du fleuve qui déroule aujourd''hui un superbe panorama sur les monuments prestigieux qui s''y mirent. Mais, outre de grands musées, de superbes monuments, des boulevards animés, des avenues bordées de commerces connus da', '2016-05-27', 14, 6, '3', 1),
(5, 'Istanbul', 'Visite de la capital cultutelle de la turquie', 6500, 25, 'Un sentiment très étrange vous envahit en contemplant les eaux du Bosphore, chenal entre deux mers qui traverse Istanbul du nord au sud, de la mer Noire à la mer de Marmara. Le seul nom d''Istanbul évoque déjà la douceur de l''atmosphère des contes des Mill', '2016-05-31', 15, 7, '3', 1),
(6, 'Visite du pasifique', 'Voyage de l''ile de Bali ', 7000, 26, 'L''île de Bali, comme la plupart des îles de l''archipel indonésien, est le résultat de la subduction tectonique de la plaque australienne sous la plaque eurasienne. Le plancher océanique tertiaire, fait d''anciens dépôts marins tels que l''accumulation de ré', '2016-06-30', 8, 8, '3', 1);
