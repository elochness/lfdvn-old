-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mar 10 Juillet 2018 à 22:28
-- Version du serveur :  10.1.19-MariaDB
-- Version de PHP :  7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `fromagerie`
--

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

CREATE TABLE `article` (
  `id` int(11) NOT NULL,
  `article_category_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `contains` longtext COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `enabled` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `article`
--

INSERT INTO `article` (`id`, `article_category_id`, `title`, `contains`, `created_at`, `updated_at`, `enabled`) VALUES
(9, 3, 'Présentation', '<p>Le site Internet de <em>la Fromagerie du Vignoble Nantais</em> est en ligne, et &ccedil;a tombe bien, le magasin est am&eacute;nag&eacute; et vous est ouvert depuis le d&eacute;but du mois d&rsquo;ao&ucirc;t.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Vous pouvez d&rsquo;ores et d&eacute;j&agrave; venir acheter en direct&nbsp;:</p>\r\n\r\n<ul>\r\n	<li>vos <strong>produits laitiers</strong> &eacute;labor&eacute;s sur place,</li>\r\n	<li>compl&eacute;t&eacute;s par les fromages de Ch&egrave;vre de la Ferme des Cabrioles (Le BIGNON)&nbsp;</li>\r\n	<li>le <strong>pain </strong>fa&ccedil;onn&eacute; par <u>Laurence CHATELLIER</u> (fournil de &laquo;&nbsp;l&rsquo;Entrechat&nbsp;&raquo; &agrave; Montbert)&nbsp;</li>\r\n	<li>les <strong>l&eacute;gumes </strong>cultiv&eacute;s par <u>Laurent BILLON</u> (La Sordais, Montbert)</li>\r\n	<li>les <strong>Pommes&nbsp;</strong>r&eacute;colt&eacute;s par <u>Geoffrey BARRAL</u>&nbsp;(Belle cour, Montbert)</li>\r\n	<li>les <strong>Infusions&nbsp;</strong>de <u>Marie</u>, venant tout droit de la Baudouini&egrave;re, au Bignon</li>\r\n	<li>les Oeufs de la ferme des 100 poules et...</li>\r\n	<li>ainsi que la Bi&egrave;re artisanale de Vincent LEFORT (Corcou&eacute;/Logne)</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Nous serons ravis de vous accueillir chaque semaine&nbsp;:</p>\r\n\r\n<p>Le Lundi de 16h30 &agrave; 19h30</p>\r\n\r\n<p>Le Mercredi de 10h30 &agrave; 12h15 et de 16h30 &agrave; 19h30</p>\r\n\r\n<p>Le Vendredi de 16h30 &agrave; 19h30</p>\r\n\r\n<p>Le Samedi de 10h &agrave; 12h30</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>A tr&egrave;s bient&ocirc;t dans notre magasin&nbsp;!</p>', '2017-07-28 21:10:24', '2017-09-29 18:10:13', 1),
(10, 1, 'Inauguration de la fromagerie du vignoble nantais', '<p>Bonjour &agrave; tous,</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Apr&egrave;s quelques mois d&rsquo;attente, nous avons le plaisir de vous convier &agrave; l&rsquo;inauguration de la fromagerie du vignoble nantais.</p>\r\n\r\n<p>Cette journ&eacute;e sera l&rsquo;occasion de d&eacute;couvrir la ferme productrice du lait, la fromagerie et son magasin mais aussi d&rsquo;&eacute;changer autour d&rsquo;un verre et de d&eacute;guster les produits de notre fabrication ainsi que ceux d&rsquo;autres producteurs avec qui nous travaillons.</p>\r\n\r\n<p>Vous pourrez &eacute;galement repartir avec vos contreparties Ulule.</p>\r\n\r\n<p>En esp&eacute;rant vous accueillir le Samedi 9 Septembre,</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>A bient&ocirc;t,</p>\r\n\r\n<p><img alt="" src="/uploads/images/article/inauguration.png" style="height:426px; width:605px" /></p>', '2017-08-06 21:10:34', '2017-10-11 20:21:49', 1),
(11, 1, 'Journée de Remerciement.', '<p>Un grand merci &agrave; toutes les personnes pr&eacute;sentes lors de la journ&eacute;e d&#39;inauguration de la fromagerie; d&#39;abord pour vos contributions au financement mais aussi pour votre pr&eacute;sence et votre enthousiasme lors de cette journ&eacute;e.</p>\r\n\r\n<p>A bient&ocirc;t j&#39;esp&egrave;re, au Magasin.</p>\r\n\r\n<p><img alt="" src="/uploads/images/article/DSCN5736.JPG" style="height:500px; width:700px" /><img alt="" src="/uploads/images/article/DSCN5742.JPG" style="height:500px; width:700px" /><img alt="" src="/uploads/images/article/DSCN5744.JPG" style="height:500px; width:700px" /></p>', '2017-09-29 19:05:57', '2017-10-11 20:48:03', 1);

-- --------------------------------------------------------

--
-- Structure de la table `article_category`
--

CREATE TABLE `article_category` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Type d''article';

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

CREATE TABLE `category` (
  `id` int(2) NOT NULL,
  `name` varchar(50) CHARACTER SET latin1 NOT NULL,
  `image` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `enabled` tinyint(1) NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Catégorie d''un produit';

--
-- Contenu de la table `category`
--

INSERT INTO `category` (`id`, `name`, `image`, `enabled`, `updated_at`) VALUES
(15, 'Fruit', '019-strawberry.svg', 1, '2017-12-03 14:52:03'),
(16, 'Légume', '012-carrot.svg', 1, '2017-12-03 14:52:21'),
(17, 'Pain', '009-food.svg', 1, '2017-12-03 14:52:40'),
(19, 'Produit laitier', '006-drink.svg', 1, '2017-12-03 14:54:24'),
(20, 'Viande', '013-steak.svg', 1, '2017-12-03 14:54:24'),
(21, 'Vin', '014-glass.svg', 1, '2017-12-03 14:54:24'),
(22, 'Bière', '011-pint.svg', 1, '2017-12-03 14:54:24');

-- --------------------------------------------------------

--
-- Structure de la table `enterprise_details`
--

CREATE TABLE `enterprise_details` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `code_postal` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(75) COLLATE utf8_unicode_ci NOT NULL,
  `telephone` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `enterprise_details`
--

INSERT INTO `enterprise_details` (`id`, `name`, `address`, `code_postal`, `city`, `telephone`, `email`) VALUES
(1, 'Mon entreprise', 'Les Moulins', '99510', 'Le village', '01 11 11 11 87', 'monentreprise@gmail.com');

-- --------------------------------------------------------

--
-- Structure de la table `product`
--

CREATE TABLE `product` (
  `id` int(4) NOT NULL,
  `name` varchar(50) CHARACTER SET latin1 NOT NULL,
  `quantity` int(11) NOT NULL,
  `description` longtext CHARACTER SET latin1 NOT NULL,
  `image` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `is_purchase` tinyint(1) NOT NULL DEFAULT '1',
  `enabled` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `subcategory_id` int(11) DEFAULT NULL,
  `packaging` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `refundable` decimal(10,2) DEFAULT NULL,
  `tax_rate_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Produit en vente';

--
-- Contenu de la table `product`
--

INSERT INTO `product` (`id`, `name`, `quantity`, `description`, `image`, `is_purchase`, `enabled`, `created_at`, `updated_at`, `category_id`, `subcategory_id`, `packaging`, `price`, `refundable`, `tax_rate_id`) VALUES
(12, 'Yaourt Nature', 10, '<p>Lait entier pasteurisé, puis réincorporation de ferments lactiques.</p>\r\n<p><acronym TITLE="Date limite de consommation/Date limite d''utilisation optimale">DLC/DLUO</acronym> : 20 jours</p>', 'yaourt-nature.jpg', 1, 1, '2017-05-28 21:32:23', '2017-05-28 21:32:24', 19, 1, '25 cl', '0.74', '0.16', 9),
(13, 'Yaourt Fraise', 10, '<p>Pr&eacute;paration de fruits sur sucre &agrave; la fraise</p>\r\n\r\n<p>DLC/DLUO : 20 jours</p>', 'yaourt-fraise.jpg', 1, 1, '2017-05-28 21:46:05', '2017-05-28 21:46:05', 19, 1, '25 cl', '0.95', '0.16', 9),
(15, 'Fromage Frais ail et fines herbes', 10, '<p>Enrobage d’épices déshydratées</p>\r\n<p><acronym TITLE="Date limite de consommation/Date limite d''utilisation optimale">DLC/DLUO</acronym> : 20 jours</p>', 'fromage-frais-ail-fines-herbes.jpg', 1, 1, '2017-06-01 20:56:19', '2017-06-01 20:56:19', 19, 1, '160g à 180g', '2.95', NULL, 9),
(16, 'Fromage Frais Estragon', 10, '<p>Enrobage d’épices déshydratées</p>\r\n<p><acronym TITLE="Date limite de consommation/Date limite d''utilisation optimale">DLC/DLUO</acronym> : 20 jours</p>', 'fromage-frais-estragon.jpg', 1, 1, '2017-06-01 21:14:59', '2017-06-01 21:15:00', 19, 1, '160g à 180g', '2.95', NULL, 9),
(17, 'Fromage Frais Cumin', 10, '<p>Enrobage d’épices déshydratées</p>\r\n<p><acronym TITLE="Date limite de consommation/Date limite d''utilisation optimale">DLC/DLUO</acronym> : 20 jours</p>', 'fromage-frais-cumin.jpg', 1, 1, '2017-06-01 21:15:46', '2017-06-01 21:15:47', 19, 1, '160g à 180g', '2.95', NULL, 9),
(18, 'Fromage Frais au cèpes', 10, '<p>Enrobage d’épices déshydratées</p>\r\n<p><acronym TITLE="Date limite de consommation/Date limite d''utilisation optimale">DLC/DLUO</acronym> : 20 jours</p>', 'fromage-frais-cepes.jpg', 1, 1, '2017-06-01 21:16:56', '2017-06-01 21:16:56', 19, 1, '160g à 180g', '3.15', NULL, 9),
(19, 'Fromage Frais au Poivre', 10, '<p>Enrobage d&rsquo;&eacute;pices d&eacute;shydrat&eacute;es</p>\r\n\r\n<p>DLC/DLUO : 20 jours</p>', 'fromage-frais-poivre.jpg', 1, 1, '2017-06-01 21:17:37', '2017-06-01 21:17:37', 19, 1, '160g à 180g', '2.95', NULL, 9),
(20, 'Tomme des Allerons', 10, '<p>Lait entier cru maturé et caillé en cuve ; moulé puis affiné durant 2 mois minimum (période durant laquelle chaque Tome est frotté avec de l’eau, du sel et des ferments d’affinage). Poids final entre 1,6 kg et 2,5 kg.</p>\r\n<p><acronym TITLE="Date limite de consommation/Date limite d''utilisation optimale">DLC/DLUO</acronym> : 2 mois</p>', 'la-tomme-des-allerons.jpg', 1, 1, '2017-06-01 21:29:21', '2017-06-01 21:29:23', 19, 1, 'Au kg', '20.60', NULL, 9),
(21, 'Petit Rebignon', 10, '<p>Lait entier cru maturé et caillé en cuve ; moulé puis affiné durant 2 mois minimum (période durant laquelle chaque fromage est frotté avec de l’eau, du sel et des ferments d’affinage). Poids final entre 800 gr et 1,2 kg.</p>\r\n<p><acronym TITLE="Date limite de consommation/Date limite d''utilisation optimale">DLC/DLUO</acronym> : 2 mois</p>', 'le-ptit-rebignon.jpg', 0, 1, '2017-06-01 21:30:15', '2017-06-01 21:30:15', 19, 1, 'Au kg', '17.60', NULL, 9),
(22, 'Fromage Blanc 20% MG', 10, '<p>Lait demi-&eacute;cr&eacute;m&eacute; cru.</p>\r\n\r\n<p>DLC/DLUO : 15 jours</p>', 'fromage-blanc-20.jpg', 1, 1, '2017-06-01 21:32:01', '2017-06-01 21:32:02', 19, 1, '400g', '3.34', '0.34', 9),
(23, 'Fromage Blanc 0% MG', 10, '<p>Lait totalement &eacute;cr&eacute;m&eacute; cru.</p>\r\n\r\n<p>DLC/DLUO : 15 jours</p>', 'fromage-blanc-0.jpg', 1, 1, '2017-06-01 21:33:17', '2017-06-01 21:33:18', 19, 1, '400g', '3.24', '0.34', 9),
(24, 'Yaourt Abricot', 10, '<p>Préparation de fruits sur sucre à l''abricot</p>\r\n<p><acronym TITLE="Date limite de consommation/Date limite d''utilisation optimale">DLC/DLUO</acronym> : 20 jours</p>', 'yaourt-abricot.jpg', 1, 1, '2017-06-01 21:34:38', '2017-06-01 21:34:38', 19, 1, '25cl', '0.95', '0.16', 9),
(25, 'Yaourt Pomme, cerise et cannelle', 10, '<p>Préparation de fruits sur sucre à la pomme, cerise et canelle</p>\r\n<p><acronym TITLE="Date limite de consommation/Date limite d''utilisation optimale">DLC/DLUO</acronym> : 20 jours</p>', 'yaourt-pomme-cerise-cannelle.jpg', 1, 1, '2017-06-01 21:36:51', '2017-06-01 21:36:51', 19, 1, '25cl', '0.95', '0.16', 9),
(26, 'Lait Cru (50 cl)', 10, '<p>Lait sans aucun traitement thermique, flore microbienne intacte&nbsp;; pas de standardisation (mati&egrave;re grasse, prot&eacute;ine et lactose)</p>\r\n\r\n<p>DLC/DLUO : 5 jours</p>', 'lait-cru-50cl.jpg', 1, 1, '2017-06-01 21:37:45', '2017-06-01 21:37:46', 19, 1, '50 cl', '0.86', '0.36', 9),
(27, 'Lait Cru (1L)', 10, '<p>Lait sans aucun traitement thermique, flore microbienne intacte&nbsp;; pas de standardisation (mati&egrave;re grasse, prot&eacute;ine et lactose)</p>\r\n\r\n<p>DLC/DLUO : 5 jours</p>', 'lait-cru-1l.jpg', 1, 1, '2017-06-01 21:38:46', '2017-06-01 21:38:47', 19, 1, '1L', '1.30', '0.45', 9),
(28, 'Crème crue', 0, '<p>Cr&egrave;me sans traitement thermique&hellip;</p>\r\n\r\n<p>DLC/DLUO : 8 jours</p>', 'creme-crue.jpg', 1, 1, '2017-06-02 16:45:04', '2017-06-02 16:45:05', 19, 1, '200g', '2.22', '0.32', 9),
(30, 'Fromage blanc 40% MG', 10, '<p>Lait entier cru, matur&eacute; et caill&eacute; (pr&eacute;sure), puis &eacute;goutt&eacute; en toile (reste un peu plus de 40% du poids de d&eacute;part : &eacute;limination de l&rsquo;eau)</p>\r\n\r\n<p>DLC/DLUO : 15 jours</p>', 'fromage-blanc-40.jpg', 1, 1, '2017-07-28 01:01:00', '2017-07-28 01:01:00', 19, 1, '400g', '3.29', '0.34', 9),
(31, 'Bière de Noël', 10, 'Ma description', NULL, 1, 0, '0000-00-00 00:00:00', NULL, 22, NULL, '75cl', '5.00', NULL, 11),
(32, 'Bière de Noël', 10, 'Ma description', NULL, 1, 0, '0000-00-00 00:00:00', NULL, 22, NULL, '75cl', '5.00', NULL, 11);

-- --------------------------------------------------------

--
-- Structure de la table `purchase`
--

CREATE TABLE `purchase` (
  `id` int(11) NOT NULL,
  `buyer_id` int(11) DEFAULT NULL,
  `delivery_date` date NOT NULL,
  `comment` text COLLATE utf8_unicode_ci,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


-- --------------------------------------------------------

--
-- Structure de la table `purchase_item`
--

CREATE TABLE `purchase_item` (
  `id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `purchase_id` int(11) DEFAULT NULL,
  `quantity` smallint(6) NOT NULL,
  `price` double NOT NULL,
  `tax_rate` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `schedule`
--

CREATE TABLE `schedule` (
  `id` int(11) NOT NULL,
  `monday` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `tuesday` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `wednesday` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `thursday` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `friday` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `saturday` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `sunday` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `alert_day` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Horaires de l''entreprise';

--
-- Contenu de la table `schedule`
--

INSERT INTO `schedule` (`id`, `monday`, `tuesday`, `wednesday`, `thursday`, `friday`, `saturday`, `sunday`, `alert_day`) VALUES
(1, '16h30 à 19h30', 'Fermé', '10h30-12h15 à 16h30-19h30', 'Fermé', '16h30 à 19h30', '10h à 12h30', 'Fermé', 'Fermeture exceptionnelle le XX.');

-- --------------------------------------------------------

--
-- Structure de la table `subcategory`
--

CREATE TABLE `subcategory` (
  `id` int(2) NOT NULL,
  `name` varchar(50) CHARACTER SET latin1 NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  `category_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Catégorie d''un produit';

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

CREATE TABLE `tax_rate` (
  `id` int(11) NOT NULL,
  `rate` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `roles` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:json_array)',
  `firstname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cellphone` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `enabled` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`),
  ADD KEY `article_category_id` (`article_category_id`);

--
-- Index pour la table `article_category`
--
ALTER TABLE `article_category`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `enterprise_details`
--
ALTER TABLE `enterprise_details`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tax_rate_id` (`tax_rate_id`),
  ADD KEY `subcategory_id` (`subcategory_id`),
  ADD KEY `IDX_D34A04AD12469DE2` (`category_id`);

--
-- Index pour la table `purchase`
--
ALTER TABLE `purchase`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_6117D13B6C755722` (`buyer_id`);

--
-- Index pour la table `purchase_item`
--
ALTER TABLE `purchase_item`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_6FA8ED7D4584665A` (`product_id`),
  ADD KEY `IDX_6FA8ED7D558FBEB9` (`purchase_id`);

--
-- Index pour la table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `subcategory`
--
ALTER TABLE `subcategory`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Index pour la table `tax_rate`
--
ALTER TABLE `tax_rate`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `article`
--
ALTER TABLE `article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT pour la table `article_category`
--
ALTER TABLE `article_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT pour la table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT pour la table `purchase`
--
ALTER TABLE `purchase`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT pour la table `purchase_item`
--
ALTER TABLE `purchase_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;
--
-- AUTO_INCREMENT pour la table `subcategory`
--
ALTER TABLE `subcategory`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `tax_rate`
--
ALTER TABLE `tax_rate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
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
