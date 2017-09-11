-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mer 14 Juin 2017 à 17:16
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `fromagerie`
--

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

CREATE TABLE IF NOT EXISTS `article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `article_category_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `contains` longtext COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL ON UPDATE CURRENT_TIMESTAMP,
  `enabled` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `article_category_id` (`article_category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Vider la table avant d'insérer `article`
--

TRUNCATE TABLE `article`;
--
-- Contenu de la table `article`
--

-- --------------------------------------------------------

--
-- Structure de la table `article_category`
--

CREATE TABLE IF NOT EXISTS `article_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Type d''article' AUTO_INCREMENT=4 ;

--
-- Contenu de la table `article_category`
--

INSERT INTO `article_category` (`id`, `name`) VALUES
(1, 'Article de présentation'),
(2, 'Article sur l''entreprise'),
(3, 'Article sur le bandeau droit'),
(4, 'Article de recette');

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET latin1 NOT NULL,
  `image` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `enabled` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Catégorie d''un produit' AUTO_INCREMENT=23 ;

--
-- Vider la table avant d'insérer `category`
--

TRUNCATE TABLE `category`;
--
-- Contenu de la table `category`
--

INSERT INTO `category` (`id`, `name`, `image`, `enabled`) VALUES
(15, 'Fruit', NULL, 1),
(16, 'Légume', NULL, 1),
(17, 'Pain', NULL, 1),
(19, 'Produit laitier', NULL, 1),
(20, 'Viande', NULL, 1),
(21, 'Vin', NULL, 1),
(22, 'Bière', NULL, 1);

-- --------------------------------------------------------

--
-- Structure de la table `enterprise_details`
--

CREATE TABLE IF NOT EXISTS `enterprise_details` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `code_postal` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(75) COLLATE utf8_unicode_ci NOT NULL,
  `telephone` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Vider la table avant d'insérer `enterprise_details`
--

TRUNCATE TABLE `enterprise_details`;
--
-- Contenu de la table `enterprise_details`
--

INSERT INTO `enterprise_details` (`id`, `name`, `address`, `code_postal`, `city`, `telephone`, `email`) VALUES
(1, 'Entreprise du XXXXX', 'Les XXX', '01234', 'Paris', '01 02 03 04 05', 'mon-entreprise@gmail.com');

-- --------------------------------------------------------

--
-- Structure de la table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET latin1 NOT NULL,
  `quantity` int(11) NOT NULL,
  `description` longtext CHARACTER SET latin1 NOT NULL,
  `image` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `enabled` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `subcategory_id` int(11) DEFAULT NULL,
  `packaging` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `refundable` decimal(10,2) DEFAULT NULL,
  `tax_rate_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tax_rate_id` (`tax_rate_id`),
  KEY `subcategory_id` (`subcategory_id`),
  KEY `IDX_D34A04AD12469DE2` (`category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Produit en vente' AUTO_INCREMENT=31 ;

--
-- Vider la table avant d'insérer `product`
--

TRUNCATE TABLE `product`;
--
-- Contenu de la table `product`
--

INSERT INTO `product` (`id`, `name`, `quantity`, `description`, `image`, `enabled`, `created_at`, `updated_at`, `category_id`, `subcategory_id`, `packaging`, `price`, `refundable`, `tax_rate_id`) VALUES
(12, 'Yaourt Nature', 10, '<p>Lait entier pasteurisé, puis réincorporation de ferments lactiques.</p>\r\n<p><acronym TITLE="Date limite de consommation/Date limite d''utilisation optimale">DLC/DLUO</acronym> : 20 jours</p>', 'yaourt-nature.jpg', 1, '2017-05-28 21:32:23', '2017-05-28 21:32:24', 19, 1, '25 cl', '0.74', '0.16', 9),
(13, 'Yaourt Fraise', 10, '<p>Pr&eacute;paration de fruits sur sucre &agrave; la fraise</p>\r\n\r\n<p>DLC/DLUO : 20 jours</p>', 'yaourt-fraise.jpg', 1, '2017-05-28 21:46:05', '2017-05-28 21:46:05', 19, 1, '25 cl', '0.95', '0.16', 9),

-- --------------------------------------------------------

--
-- Structure de la table `purchase`
--

CREATE TABLE IF NOT EXISTS `purchase` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `buyer_id` int(11) DEFAULT NULL,
  `delivery_date` date NOT NULL,
  `delivery_hour` time DEFAULT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_6117D13B6C755722` (`buyer_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Vider la table avant d'insérer `purchase`
--

TRUNCATE TABLE `purchase`;
--
-- Contenu de la table `purchase`
--

-- --------------------------------------------------------

--
-- Structure de la table `purchase_item`
--

CREATE TABLE IF NOT EXISTS `purchase_item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) DEFAULT NULL,
  `purchase_id` int(11) DEFAULT NULL,
  `quantity` smallint(6) NOT NULL,
  `price` double NOT NULL,
  `tax_rate` double NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_6FA8ED7D4584665A` (`product_id`),
  KEY `IDX_6FA8ED7D558FBEB9` (`purchase_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Vider la table avant d'insérer `purchase_item`
--

TRUNCATE TABLE `purchase_item`;
-- --------------------------------------------------------

--
-- Structure de la table `schedule`
--

CREATE TABLE IF NOT EXISTS `schedule` (
  `id` int(11) NOT NULL,
  `monday` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `tuesday` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `wednesday` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `thursday` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `friday` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `saturday` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `sunday` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `alert_day` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Horaires de l''entreprise';

--
-- Vider la table avant d'insérer `schedule`
--

TRUNCATE TABLE `schedule`;
--
-- Contenu de la table `schedule`
--

INSERT INTO `schedule` (`id`, `monday`, `tuesday`, `wednesday`, `thursday`, `friday`, `saturday`, `sunday`, `alert_day`) VALUES
(1, 'De 16h30 à 19h30', 'Fermé', 'De 10h30-12h15 à 16h30-19', 'Fermé', 'De 16h30 à 19h30', 'De 10h à 12h30', 'Fermé', 'Fermeture exceptionnelle le XX.');

-- --------------------------------------------------------

--
-- Structure de la table `subcategory`
--

CREATE TABLE IF NOT EXISTS `subcategory` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET latin1 NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `category_id` (`category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Catégorie d''un produit' AUTO_INCREMENT=7 ;

--
-- Vider la table avant d'insérer `subcategory`
--

TRUNCATE TABLE `subcategory`;
--
-- Contenu de la table `subcategory`
--

INSERT INTO `subcategory` (`id`, `name`, `enabled`, `category_id`) VALUES
(1, 'lait de vache', 1, 19),
(2, 'lait de chèvre', 1, 19),
(3, 'Ovin', 1, 20),
(4, 'Bovin', 1, 20),
(5, 'Volaille', 1, 20),
(6, 'Charcuterie', 1, 20);

-- --------------------------------------------------------

--
-- Structure de la table `tax_rate`
--

CREATE TABLE IF NOT EXISTS `tax_rate` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rate` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=12 ;

--
-- Vider la table avant d'insérer `tax_rate`
--

TRUNCATE TABLE `tax_rate`;
--
-- Contenu de la table `tax_rate`
--

INSERT INTO `tax_rate` (`id`, `rate`) VALUES
(9, 5.5),
(10, 10),
(11, 20);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `roles` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:json_array)',
  `firstname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cellphone` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `enabled` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_8D93D649F85E0677` (`username`),
  UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Vider la table avant d'insérer `user`
--

TRUNCATE TABLE `user`;
--
-- Contenu de la table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password`, `roles`, `firstname`, `lastname`, `cellphone`, `enabled`) VALUES
(1, 'john_user', 'john_user@symfony.com', '$2y$13$/seCIMLkFABd.6Ve2ofvkeBJO13hsm2MVvd45kRappPjs9eNLPAa6', '[]', 'john', 'user', NULL, 1),
(2, 'anna_admin', 'anna_admin@symfony.com', '$2y$13$A5NEbsa/6p7QV.luP8U3K.9hbLTx.MralUS/PfKt6H1NfSHReGQeC', '["ROLE_ADMIN"]', 'anna', 'admin', NULL, 1);

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `article_ibfk_1` FOREIGN KEY (`article_category_id`) REFERENCES `article_category` (`id`);

--
-- Contraintes pour la table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_category_fk` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`),
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`subcategory_id`) REFERENCES `subcategory` (`id`),
  ADD CONSTRAINT `product_tax_rate_fk` FOREIGN KEY (`tax_rate_id`) REFERENCES `tax_rate` (`id`);

--
-- Contraintes pour la table `purchase`
--
ALTER TABLE `purchase`
  ADD CONSTRAINT `FK_6117D13B6C755722` FOREIGN KEY (`buyer_id`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `purchase_item`
--
ALTER TABLE `purchase_item`
  ADD CONSTRAINT `FK_6FA8ED7D4584665A` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`),
  ADD CONSTRAINT `FK_6FA8ED7D558FBEB9` FOREIGN KEY (`purchase_id`) REFERENCES `purchase` (`id`);

--
-- Contraintes pour la table `subcategory`
--
ALTER TABLE `subcategory`
  ADD CONSTRAINT `subcategory_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
