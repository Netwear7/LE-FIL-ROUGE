-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  mar. 12 mai 2020 à 18:09
-- Version du serveur :  10.4.11-MariaDB
-- Version de PHP :  7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `bddanimaux`
--

-- --------------------------------------------------------

--
-- Structure de la table `adresse`
--

CREATE TABLE `adresse` (
  `ID_ADRESSE` int(11) NOT NULL,
  `NUMERO` int(11) NOT NULL,
  `RUE` varchar(50) NOT NULL,
  `VILLE` varchar(50) NOT NULL,
  `CODE_POSTAL` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `adresse`
--

INSERT INTO `adresse` (`ID_ADRESSE`, `NUMERO`, `RUE`, `VILLE`, `CODE_POSTAL`) VALUES
(1, 15, 'rue lesage senault', 'Lille', '50000'),
(3, 75, 'rue du Luxembourg', 'Lille', '59000'),
(4, 48, 'avenue du vélodrome', 'Marseille', '13000'),
(5, 1512, 'fsefsefsef', 'roubaix', '59100'),
(14, 20, 'testrue', 'testville', '99999'),
(90001, 100, 'rue', 'rue', '08000'),
(90002, 8000, 'vfdfdsqfsdqf', 'fdsfdsqfdsqfdsq', '08000'),
(90003, 0, '', '', ''),
(90004, 0, '', '', ''),
(90005, 78, 'tgtg', 'tgtg', '77877'),
(90006, 50, 'fdsfdsfdsfdsfds', 'fdsfdsfdsfds', '99999'),
(90007, 0, '', '', ''),
(90008, 454, 'cdsqcdsq', 'vdsqvds', '07000');

-- --------------------------------------------------------

--
-- Structure de la table `animaux`
--

CREATE TABLE `animaux` (
  `ID_ANIMAL` int(11) NOT NULL,
  `NOM` char(20) NOT NULL,
  `DATE_NAISSANCE` date NOT NULL,
  `POIDS` float NOT NULL,
  `NO_PUCE` varchar(20) NOT NULL,
  `CARACTERE` text NOT NULL,
  `SPECIFICITE` text NOT NULL,
  `TAILLE` int(11) DEFAULT NULL,
  `ROBE` varchar(50) DEFAULT NULL,
  `DATE_ARRIVEE_ANIMAL` date DEFAULT NULL,
  `DATE_SORTIE_ANIMAL` date DEFAULT NULL,
  `ID_RACE` int(11) NOT NULL,
  `ID_UTILISATEUR` int(11) DEFAULT NULL,
  `ID_REFUGE` int(11) DEFAULT NULL,
  `SEXE` varchar(20) DEFAULT 'Mâle'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `animaux`
--

INSERT INTO `animaux` (`ID_ANIMAL`, `NOM`, `DATE_NAISSANCE`, `POIDS`, `NO_PUCE`, `CARACTERE`, `SPECIFICITE`, `TAILLE`, `ROBE`, `DATE_ARRIVEE_ANIMAL`, `DATE_SORTIE_ANIMAL`, `ID_RACE`, `ID_UTILISATEUR`, `ID_REFUGE`, `SEXE`) VALUES
(55, 'Hermione', '0000-00-00', 0, 'h5f4h5dfh4', 'cool', '', 0, 'Courts', NULL, NULL, 7, NULL, 1, 'Mâle');

-- --------------------------------------------------------

--
-- Structure de la table `appartenir_espece`
--

CREATE TABLE `appartenir_espece` (
  `ID_RACE` int(11) NOT NULL,
  `ID_ESPECE` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `appartenir_espece`
--

INSERT INTO `appartenir_espece` (`ID_RACE`, `ID_ESPECE`) VALUES
(7, 2),
(8, 2),
(9, 2),
(10, 2),
(11, 2),
(12, 2),
(13, 2),
(14, 2),
(15, 2),
(16, 2),
(17, 2),
(18, 2),
(19, 2),
(20, 2),
(21, 2),
(22, 2),
(23, 2),
(24, 2),
(25, 2),
(26, 2),
(27, 2),
(28, 2),
(29, 2),
(30, 2),
(31, 2),
(32, 2),
(33, 2),
(34, 2),
(35, 2),
(36, 2),
(37, 2),
(38, 2),
(39, 2),
(40, 2),
(41, 2),
(42, 2),
(43, 2),
(44, 2),
(45, 2),
(46, 2),
(47, 2),
(48, 2),
(49, 2),
(50, 2),
(51, 2),
(52, 2),
(53, 2),
(54, 2),
(55, 2),
(56, 2),
(57, 2),
(58, 2),
(59, 2),
(60, 2),
(61, 2),
(62, 2),
(64, 1),
(65, 1),
(66, 1),
(67, 1),
(68, 1),
(69, 1),
(70, 1),
(71, 1),
(72, 1),
(73, 1),
(74, 1),
(75, 1),
(76, 1),
(77, 1),
(78, 1),
(79, 1),
(80, 1),
(81, 1),
(82, 1),
(83, 1),
(84, 1),
(85, 1),
(86, 1),
(87, 1),
(88, 1),
(89, 1),
(90, 1),
(91, 1),
(92, 1),
(93, 1),
(94, 1),
(95, 1),
(96, 1),
(97, 1),
(98, 1),
(99, 1),
(100, 1),
(101, 1),
(102, 1),
(103, 1),
(104, 1),
(105, 1),
(106, 1),
(107, 1),
(108, 1),
(109, 1),
(110, 1),
(111, 1),
(112, 1),
(113, 1),
(114, 1),
(115, 1),
(116, 1),
(117, 1),
(118, 1),
(119, 1),
(120, 1),
(121, 1),
(122, 1),
(123, 1),
(124, 1),
(125, 1),
(126, 1),
(127, 1),
(128, 1),
(129, 1),
(130, 1),
(131, 1),
(132, 1),
(133, 1),
(134, 1),
(135, 1),
(136, 1),
(137, 1),
(138, 1),
(139, 1),
(140, 1),
(141, 1),
(142, 1),
(143, 1),
(144, 1),
(145, 1),
(146, 1),
(147, 1),
(148, 1),
(149, 1),
(150, 1),
(151, 1),
(152, 1),
(153, 1),
(154, 1),
(155, 1),
(156, 1),
(157, 1),
(158, 1),
(159, 1),
(160, 1),
(161, 1),
(162, 1),
(163, 1),
(164, 1),
(165, 1),
(166, 1),
(167, 1),
(168, 1),
(169, 1),
(170, 1),
(171, 1),
(172, 1),
(173, 1),
(174, 1),
(175, 1),
(176, 1),
(177, 1),
(178, 1),
(179, 1),
(180, 1),
(181, 1),
(182, 1),
(183, 1),
(184, 1),
(185, 1),
(186, 1),
(187, 1),
(188, 1),
(189, 1),
(190, 1),
(191, 1),
(192, 1),
(193, 1),
(194, 1),
(195, 1),
(196, 1),
(197, 1),
(198, 1),
(199, 1),
(200, 1),
(201, 1),
(202, 1),
(203, 1),
(204, 1),
(205, 1),
(206, 1),
(207, 1),
(208, 1),
(209, 1),
(210, 1),
(211, 1),
(212, 1),
(213, 1),
(214, 1),
(215, 1),
(216, 1),
(217, 1),
(218, 1),
(219, 1),
(220, 1),
(221, 1),
(222, 1),
(223, 1),
(224, 1),
(225, 1),
(226, 1),
(227, 1),
(228, 1),
(229, 1),
(230, 1),
(231, 1),
(232, 1),
(233, 1),
(234, 1),
(235, 1),
(236, 1),
(237, 1),
(238, 1),
(239, 1),
(240, 1),
(241, 1),
(242, 1),
(243, 1),
(244, 1),
(245, 1),
(246, 1),
(247, 1),
(248, 1),
(249, 1),
(250, 1),
(251, 1),
(252, 1),
(253, 1),
(254, 1),
(255, 1),
(256, 1),
(257, 1),
(258, 1),
(259, 1),
(260, 1),
(261, 1),
(262, 1),
(263, 1),
(264, 1),
(265, 1),
(266, 1),
(267, 1),
(268, 1),
(269, 1),
(270, 1),
(271, 1),
(272, 1),
(273, 1),
(274, 1),
(275, 1),
(276, 1),
(277, 1),
(278, 1),
(279, 1),
(280, 1),
(281, 1),
(282, 1),
(283, 1),
(284, 1),
(285, 1),
(286, 1),
(287, 1),
(288, 1),
(289, 1),
(290, 1),
(291, 1),
(292, 1),
(293, 1),
(294, 1),
(295, 1),
(296, 1),
(297, 1),
(298, 1),
(299, 1),
(300, 1),
(301, 1),
(302, 1),
(303, 1),
(304, 1),
(305, 1),
(306, 1),
(307, 1),
(308, 1),
(309, 1),
(310, 1),
(311, 1),
(312, 1),
(313, 1),
(314, 1),
(315, 1),
(316, 1),
(317, 1),
(318, 1),
(319, 1),
(320, 1),
(321, 1),
(322, 1),
(323, 1),
(324, 1),
(325, 1),
(326, 1),
(327, 1),
(328, 1),
(329, 1),
(330, 1),
(331, 1),
(332, 1),
(333, 1),
(334, 1),
(335, 1),
(336, 1),
(337, 1),
(338, 1),
(339, 1),
(340, 1),
(341, 1),
(342, 1),
(343, 1),
(344, 1),
(345, 1),
(346, 1),
(347, 1),
(348, 1),
(349, 1),
(350, 1),
(351, 1),
(352, 1),
(353, 1),
(354, 1),
(355, 1),
(356, 1),
(357, 1),
(358, 1),
(359, 1),
(360, 1),
(361, 1),
(362, 1),
(363, 1),
(364, 1),
(365, 1),
(366, 1),
(367, 1),
(368, 1),
(369, 1),
(370, 1),
(371, 1),
(372, 1),
(373, 1),
(374, 1),
(375, 1),
(376, 1),
(377, 1),
(378, 1),
(379, 1),
(380, 1),
(381, 1),
(382, 1),
(383, 1),
(384, 1),
(385, 1),
(386, 1),
(387, 1),
(388, 1),
(389, 1),
(390, 1),
(391, 1),
(392, 1),
(393, 1),
(394, 1),
(395, 1),
(396, 1),
(397, 1),
(398, 1),
(399, 1),
(400, 1),
(401, 1),
(402, 1),
(403, 1),
(404, 1),
(405, 1),
(406, 1),
(407, 1),
(408, 1),
(409, 1),
(410, 1),
(411, 1),
(412, 1),
(413, 1),
(414, 1),
(415, 1),
(416, 1),
(417, 1),
(418, 1),
(419, 1),
(420, 1),
(421, 1),
(422, 1),
(423, 1),
(424, 1),
(425, 1),
(426, 1),
(427, 1),
(428, 1),
(429, 1),
(430, 1),
(431, 1),
(432, 1);

-- --------------------------------------------------------

--
-- Structure de la table `avoir_couleur`
--

CREATE TABLE `avoir_couleur` (
  `ID_COULEUR` int(11) NOT NULL,
  `ID_ANIMAL` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `avoir_couleur`
--

INSERT INTO `avoir_couleur` (`ID_COULEUR`, `ID_ANIMAL`) VALUES
(8, 55);

-- --------------------------------------------------------

--
-- Structure de la table `contactez_nous`
--

CREATE TABLE `contactez_nous` (
  `ID_MESSAGE` int(11) NOT NULL,
  `MESSAGE` text NOT NULL,
  `MOTIF` varchar(50) NOT NULL,
  `ID_UTILISATEUR` int(11) DEFAULT NULL,
  `NOM` varchar(50) NOT NULL,
  `PRENOM` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `contactez_nous`
--

INSERT INTO `contactez_nous` (`ID_MESSAGE`, `MESSAGE`, `MOTIF`, `ID_UTILISATEUR`, `NOM`, `PRENOM`) VALUES
(1, 'yoyoyoyoyo', 'yoyoyoyo', 1, 'yoyoyoyoyo', 'yoyoyoyoyo'),
(2, 'yayayayayayayaya', 'yayayayayayayaya', 1, 'yayayayayayayaya', 'yayayayayayayaya'),
(3, 'yuyuyyu', 'yuyuyyu', 1, 'yuyuyyu', 'yuyuyyu'),
(4, '', '', 1, '', ''),
(5, 'xxxxx', '', 1, '', ''),
(6, 'xxxxxxx', '', 1, '', ''),
(7, 'lulu', '', 1, '', ''),
(8, 'allo', '', 1, '', ''),
(9, 'allu', '', 1, '', ''),
(10, 'allu', '', 1, '', ''),
(11, 'alloin', '', 1, '', ''),
(12, 'allou', '', 1, '', ''),
(13, 'anou', '', 1, '', ''),
(14, 'agt', '', 1, '', ''),
(15, 'lulu', '', 1, '', ''),
(16, 'allorefdzs', 'll', 1, '', ''),
(17, 'frfr', '', 1, '', ''),
(18, '555', '', 1, '', ''),
(19, 'flute', '', 1, '', ''),
(20, 'trtrtr', '', 1, '', ''),
(21, 'flant', '', 1, '', ''),
(22, '50', '', 1, '', ''),
(23, 'dzzedezeez', '', 1, '', ''),
(24, 'reanard', '', 1, '', '');

-- --------------------------------------------------------

--
-- Structure de la table `couleur_animal`
--

CREATE TABLE `couleur_animal` (
  `ID_COULEUR` int(11) NOT NULL,
  `COULEUR` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `couleur_animal`
--

INSERT INTO `couleur_animal` (`ID_COULEUR`, `COULEUR`) VALUES
(8, 'Acajou'),
(9, 'Blanc'),
(10, 'Bleu'),
(11, 'Cerf'),
(12, 'Châtain'),
(13, 'Chevreuil'),
(14, 'Chocolat'),
(15, 'Citron'),
(16, 'Fauve'),
(17, 'Foie'),
(18, 'Isabelle'),
(19, 'Lilas'),
(20, 'Louvet'),
(21, 'Marron'),
(22, 'Puce'),
(23, 'Rouge'),
(24, 'Roux'),
(25, 'Rubis'),
(26, 'Sable'),
(27, 'Sésame'),
(28, 'Sésame noir'),
(29, 'Sésame rouge'),
(30, 'Noir'),
(31, 'Crème'),
(32, 'Cinnamon'),
(33, 'dsfdsds'),
(34, 'ROMAIN');

-- --------------------------------------------------------

--
-- Structure de la table `donation`
--

CREATE TABLE `donation` (
  `ID_DONATION` int(11) NOT NULL,
  `DATE_DONATION` date NOT NULL,
  `ID_UTILISATEUR` int(11) NOT NULL,
  `montant` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `espece`
--

CREATE TABLE `espece` (
  `ID_ESPECE` int(11) NOT NULL,
  `NOM_ESPECE` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `espece`
--

INSERT INTO `espece` (`ID_ESPECE`, `NOM_ESPECE`) VALUES
(1, 'Chien'),
(2, 'Chat'),
(3, 'grenouille');

-- --------------------------------------------------------

--
-- Structure de la table `espece_avoir_maladie`
--

CREATE TABLE `espece_avoir_maladie` (
  `ID_ESPECE` int(11) NOT NULL,
  `ID_MALADIE` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `espece_avoir_maladie`
--

INSERT INTO `espece_avoir_maladie` (`ID_ESPECE`, `ID_MALADIE`) VALUES
(1, 40),
(1, 41),
(1, 42),
(1, 43),
(1, 44),
(1, 45),
(1, 46),
(1, 47),
(1, 48),
(1, 49),
(1, 50),
(1, 51),
(1, 52),
(1, 53),
(1, 54),
(1, 55),
(1, 56),
(1, 57),
(1, 58),
(1, 59),
(1, 60),
(2, 1),
(2, 2),
(2, 3),
(2, 4),
(2, 5),
(2, 6),
(2, 7),
(2, 8),
(2, 9),
(2, 10),
(2, 11),
(2, 12),
(2, 13),
(2, 14),
(2, 15),
(2, 16),
(2, 17),
(2, 18),
(2, 19),
(2, 20),
(2, 21),
(2, 22),
(2, 23),
(2, 24),
(2, 25),
(2, 26),
(2, 27),
(2, 28),
(2, 29),
(2, 30),
(2, 31),
(2, 32),
(2, 33),
(2, 34),
(2, 35),
(2, 36),
(2, 37),
(2, 38),
(2, 39);

-- --------------------------------------------------------

--
-- Structure de la table `est_infecte_par`
--

CREATE TABLE `est_infecte_par` (
  `ID_MALADIE` int(11) NOT NULL,
  `ID_ANIMAL` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `etre_favoris`
--

CREATE TABLE `etre_favoris` (
  `ID_UTILISATEUR` int(11) NOT NULL,
  `ID_ANIMAL` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `garderie`
--

CREATE TABLE `garderie` (
  `ID_GARDERIE` int(11) NOT NULL,
  `DATE_ENTREE` date NOT NULL,
  `DATE_SORTIE` date NOT NULL,
  `ID_REFUGE` int(11) NOT NULL,
  `ID_ANIMAL` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `img_site`
--

CREATE TABLE `img_site` (
  `ID_IMG_SITE` int(11) NOT NULL,
  `IMG_BLOB` longblob NOT NULL,
  `IMG_NOM` varchar(25) NOT NULL,
  `IMG_TAILLE` varchar(25) NOT NULL,
  `IMG_TYPE` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `maladie`
--

CREATE TABLE `maladie` (
  `ID_MALADIE` int(11) NOT NULL,
  `MALADIE` varchar(50) NOT NULL,
  `URGENCE` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `maladie`
--

INSERT INTO `maladie` (`ID_MALADIE`, `MALADIE`, `URGENCE`) VALUES
(1, 'Acné féline', 1),
(2, 'Amylose', 0),
(3, 'Anaplasmose', 0),
(4, 'Asthme félin', 1),
(5, 'Borréliose féline', 1),
(6, 'Calculs urinaires du chat', 1),
(7, 'Calicivirose féline', 1),
(8, 'Cardiomyopathie hypertrophique féline (CMH)', 1),
(9, 'Conjonctivite du chat', 1),
(10, 'Chlamydiose du chat', 0),
(11, 'Coronavirus félin', 1),
(12, 'Diabète sucré félin', 1),
(13, 'Échinococcose', 1),
(14, 'Encéphalite', 1),
(15, 'Érythrolyse néonatale', 1),
(16, 'Fibrosarcome félin', 1),
(17, 'Gingivite féline', 0),
(18, 'Herpès virose du chat', 0),
(19, 'Hyperthyroïdie féline', 1),
(20, 'Hémobartonellose féline', 1),
(21, 'Otacariose', 1),
(22, 'Insuffisance rénale du chat', 1),
(23, 'Glycogénose type IV (GSD IV)', 1),
(24, 'Granulome éosinophilique', 1),
(25, 'Leucémie féline', 1),
(26, 'Leucose féline', 1),
(27, 'Occlusion intestinale chez le chat', 1),
(28, 'Ostéofibrose', 1),
(29, 'Péritonite Infectieuse Féline PIF)', 1),
(30, 'Piroplasmose', 1),
(31, 'Rage féline', 1),
(32, 'Rhinotrachéite virale féline (RVF)', 1),
(33, 'Rickettsiose', 1),
(34, 'Sida du chat', 1),
(35, 'Syndrome urologique félin (SUF)', 1),
(36, 'Teigne', 1),
(37, 'Toxoplasmose féline', 1),
(38, 'Tuberculose féline', 1),
(39, 'Typhus du chat', 1),
(40, 'Allergies du chien', 1),
(41, 'Arthrose du chien', 1),
(42, 'Cystite du chien', 0),
(43, 'Démodécie', 1),
(44, 'Diabète sucré du chien', 1),
(45, 'Dirofilariose du chien', 1),
(46, 'Dysplasie de la hanche du chien', 0),
(47, 'Ehrlichiose du chien', 1),
(48, 'Hépatite de Rubarth', 1),
(49, 'Herpès virose du chien', 1),
(50, 'Insuffisance cardiaque', 1),
(51, 'Insuffisance rénale du chien', 1),
(52, 'Leptospirose du chien', 1),
(53, 'Maladie de Carré', 1),
(54, 'Maladie de Lyme du chien', 1),
(55, 'Parvovirose', 1),
(56, 'Piroplasmose', 1),
(57, 'Pyomètre', 1),
(58, 'Rage', 1),
(59, 'Tétanos du chien', 1),
(60, 'Toux de chenil', 1),
(61, 'rgrrrrrrrrrrrrrrrrrrrr', 1);

-- --------------------------------------------------------

--
-- Structure de la table `perte`
--

CREATE TABLE `perte` (
  `ID_PERTE` int(11) NOT NULL,
  `DATE_PERTE` date NOT NULL,
  `DESC_PERTE` text NOT NULL,
  `ID_ANIMAL` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `photo_animal`
--

CREATE TABLE `photo_animal` (
  `ID_PHOTO_ANIMAL` int(11) NOT NULL,
  `PHOTO` longblob NOT NULL,
  `PHOTO_PROFIL` tinyint(1) DEFAULT NULL,
  `PHOTO_NOM` varchar(50) NOT NULL,
  `PHOTO_TAILLE` varchar(25) NOT NULL,
  `PHOTO_TYPE` varchar(50) NOT NULL,
  `ID_ANIMAL` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `photo_animal`
--

INSERT INTO `photo_animal` (`ID_PHOTO_ANIMAL`, `PHOTO`, `PHOTO_PROFIL`, `PHOTO_NOM`, `PHOTO_TAILLE`, `PHOTO_TYPE`, `ID_ANIMAL`) VALUES
(13, 0xffd8ffe000104a46494600010100000100010000ffdb008400090607131212131312131516151718181b181817171b1f1b181a1818191a1f1a1d17181f28201b1a251b1a1821312125292b2e2e2e181f3338332d37282d2e2b010a0a0a0e0d0e1b10101a2d26201f2d2d2d2b2d2d2d2d2d2d2d2e2d2d2d2d2d2d2d2d2d2d2d2d2d2d2d2d2d2d2d2d2d2d2d2d2d2d2d2d2d2d2d2d2d2d2d2d2d2dffc000110800bc010c03012200021101031101ffc4001c0001000301010101010000000000000000000405060307020108ffc4003e100001020306030506040602020300000001021100032104051231415161718106132291a13242b1c1d1f0526282f10714237292e11533a2d243b2c2ffc400190100030101010000000000000000000000000203010405ffc40027110002020300010304020300000000000000010211032131120441511322326171a12391f0ffda000c03010002110311003f00f718421000842100106f5b789297cc9c8441b3dfce06348aec62afb573cf7c13a048f5a9f488766b291ef0afe2739572c879f94465377a2f1c69ad9b89338283831d231e8b6772078d206b421bff00cfc07c634977db93340621d865f11c21a33bd13941a2642108a082108400210840021084002108400210840021084002108fc26003f639cd9e94fb4a039968a7bdafc0874cb75283e4323b39a3faf03189bc67da17e299847f72896e82afcc44a592b85638efa7a559ed6898f808206a2244799f64ef1c1694271a958cb1a51ce557f947a643425e4859c7c5884210e2084210008421000842100084210018aed6e1168054a6f08238e7ae90b232db09a3681b8ebf0f3788dfc4297fd5964d1384578851c9f789775a5d030e1c2c1fecfdf28e593fbda3b62bfc699d674a7748248d87cd4338af33fb850520611a8a0c54cc39fac5d2c280a0481cf3f23102d9644cdd40570f17a1af940d7c197f268eeabc93392e34cf9fd7eb1611e6f2a64eb3cc79694a929670970a606b9d559be12fd237176de299a907eff68ac277a643242b68b08421152421084002108400210840021084002108e736684873001f4b5801c968c95f9da1c4552e587d1c2825aba9341c8d6aec4470ed176854714b94b420e454482520bb10ce038f13a98b352282cd3960b03383b3925c13bba9b17403803109cfd91d18f1fbb3bd9ec7314a2d812faa2aa036562f1b393ab6c98eebb34d46204029d5c11d0d3d93bb98f81214a149c7929448ff0024923ce262eceb48a2c3b73f857a7ac4d17664ec8705a659428d262287315199f7a947d847b488f2454b332d92431ffb11a533a904d7d4fa47ae08ae1f721ea3a842108b1ce2108400210840021084002108400627f8869aca3cc74711dac070cb1f88e8f51d22676de43ca4af549d330ffb4515d2127c6b39d6b9003e65bd0f18e49eb21df895e15fa2d5614761c5ebf18f9125dc05f4ab758e2bb78229ece806678c719b3a62d2c9f0834a7fafde905a0f1671bc2561185413848a92e7c836714d77db26c998129c6e2a14520829a929386aa61514715dda2ebb9033c4fc8f8959e8cc3ac464ddfdf83842410e53a7886f5a034a8a8a1739463159acb9efd4ce496f692485275059fd5241e4445822f04610a34a070743470793c656cb2136705466b38751590f990093c0967e99347ecebc56b20270b14e27d3105b3374206f0eb2b441c133493af4487604b007ef947e26fa9388a3100a01c8d83b46105e6cea25855007e6090c78d40f5883d95b7898b9b3a6abdaa3004e124b84bb66caa8eb0df5187d347a7ccbc101eb5ab0dda3f05e48761195b55f289690cd894964bb1a14a9435fc21fcb788b68b728e259070b258a76292acab9d535a5457286592c57036c8bc259f787d968fb996c425dce5f56f8c64e514f87c654a0901c37883e7be495726310a6de2950525d20860056a4a0b02362a06918f21bf4cd79bd90e7501ea356ce2422de83ef0fb2df28f2aecb5f2a5ce9989f02fc69a13852925206c49cc8cea234122da525228c92c5fdec438717f230bf55a37e9a35d3ef44a52a51a0059f7ae805493f38c8dfb7ccc98a29421452950601481894355a974605884a6ae9e827623350c0e1a3b8a610c2afa13bed196b622689850000860ebeee8031719824b36633a54a982bc8d8d182477b25908538415387c2a510b3c5409c4a73a846d5dad6cf892009a1281f85dd679b70dcbc51a5496c329490903c4b562c7d585139fb27cf4996248018a92aa66edf13f185b2d45bc91281708ae84d4f951be110af6b794e5840fc3807a92e73689089c06c4ed47f326b116d7694a817292dc0edb8c8f3f48d6f43456f8547662d0b9b78cb4962029fd8402308259c076a47aec7977602ca156d52c39090a3e8df38f518a7a7fc6c87aaaf3a4210845ce6108420010842001084200108420020df566ef24cc4b3d1c73158f3a44f20251a3fad07a47a918f37bcd095ad4a41f092411aa4bb1fde397d4e9a6777a37d4cf8956c6532439d4b0603afcf531622529603151e2d97177fbd63f2c764094f880615248f90773e916ea4cc60518169d9f0d1b43bf3f284487c9357a2a26a022849d1d4465a532a6e7d72895785a11659466a8d521cec40ccd377af9ee63ec5a4070bf0a854853d092d4203287d6bb453df2aef477448718549c0a0482e525806533915a865111a4590af0b509a5381458175a5cd524bb784fb4149a70553378f9b1489a9400a751001207bc43381917252efa37189561b942124b82b5a96a6722a1443ff00890767ab449bb6d7dda25785cf768494bb90a08c46bef3053408c3826ea6254c970aa240f6711517e9897cf10dab9a9975290152d2014e39a71127c4524baa85b0fb09cdfc4ae51aa55b4cb52f1fb21d4972e169487776a2711f21153da09a6d2a54943a19452082d88294974eefbd3f0c6dd01fb2ee954d4f7814404a545b6383c29072c2cfe51637610a4a50b2e438241a818c38fd2ac23a08eb7228aa48b3e8120f06585611951b001e5bc55227cc294a8a409a192b1a138c050a7ba484d5b581b3122eeecb2a1490a96a51c05482ead44c2cedb7c12d94505f96048b6a13de610c161b705784e2c80f681e0dbd275d5695a650984555dda9c6aa2a5825b8852127af08a5bde52d6a33427c529218e8a13308002b80528b72de30d45bdcf76096896a4b05240c41cb544b0cc4d196843eedce39cfb2ad0a055ec8c2a516fc225d12743a7ea19318e963bc92949058e23331529e112ce5933a945e272ada9fe9e30158ca4bbe630b24f1cc1fd5c233a6f0a2937e91310c03a90c0fba8c01d4e47b20048039708d1d8e7a664b2100a8abda529c3be6427372030ca8d5a18896eb02169c2805ca9c8ad407181f7d4b6a1f4788b7659c59c87551294b241642000a2ee2a544014a00d9e705184c9f748c690412af725a06401dda81f35532a36aff008f4870b4a41077c8f1238ea6bf18ef6ebce619494c841529401213460681c8ccd0e5cf9f0936656105691de1a00331fdca141fec40522da224c32c3a317fe2a0de94e63d62baf15321f1254db51f9857dfac5a5b25a8382ea3564e273eb91f38cea25f7935855cb0849f0e9c6fdcdf7f0d2c3864ae691559614d057d4c6ce20dc96712e44a4a59b0834dcd4fc627476e38f8c523cccb3f39b62108439310842001084200108420010842003f0c79fd8ece44e9a69802963917a0f87988f40319bbdec699699c52309517e655ab738e6f518fca9fc1d3e9b2f85af932d61bd4a6700b70e49074229af2620e543ce352663e220328f85c6a5a9e7bf21a465a5d826e1757f5115f6078c316748392d34dc1c2db18996eb5ac4ac725482b4b634e260451fc39a4e4746259c562514ea8ae56aed116f0b4af190b23000a4939815201567e1230adce584ed5eb32c4262caa6d02a5aa51232f1a0554342ee4286fa471b1296a9853352e0a68b008500a7c9b25821f262762ef6132ccfe009c4e90c599f3272a313b1cde9bba5448acb7da14129f0aa61978711700a6843b9f74b679333c5cd86c8e80a3ed835f0b62009d9f3074a55e91592acd3a4cc0093846a4877512002e6819b205f8eba9bb100cb23a0a5406a020b8d7883ca1a2648c076ba70090f4613102bec85786b8781c3c036af165d8c95dea92a29344e20a566e482fb5555e862bfb59623327a65938524a49525ea2acc0d313827a08dd5cb2132e5259b534caa5fca17dc67a451cab39976e5a5fc2b920048c93dda945c731319bf288aeb74b02693ee801ceeb51d3721497fd6627cd51fe7264c24b775833a395027d12221db24051964104856301cb3900821b33ecf9c23632476bfca91644040c2d312e7509131de80d1d2cfc418b5b5ddc3ba2139774d4d404301f7bc535ba5a97248252186556051329b6c09f9c696c5302a580c5f0d01e9eb411b17b324b479b5e004a9e893888052ce49cbbcaabfc41a6e2b16b6eb0cc9980cb5252c964a99db190a002698804a5b46df58aeedb4869b2e84d464689480972694afc0716dc7679015292a5a5880c01cc6ef99723d39d5a3d325c33d67b1194a426505325d2684b2826a4a85284a000cc30aa395be6cd494fb208255894c1c0494a68c69896a2d560cef57bfbf84c2c25e16a51c8a6830a720377c44c554ab0a810a5cb75e4194c493ae17621dce1e7bd598a895655a912daace75ae101c3f3000afe2153ac9936a2a0492cc1a81d9f404860a6ce8f10a7a485a83cc521aac1c9a951484e27c47c22a72d9e2419c4c904a020502429614496d082cece1c51dceaf0ad0c995d7adaa562c2a210fb1a9ddc730dd0ecd15579d9fbb0c904a96c311342ff00840e11d6dd7409444e9ca0a2a23080eced936a0007ca2decd762ad089428e161b80c40b712d11c9172d1d78e718efd8f44b04ac12e5a3f0a523c8011223f047ec7a08f2842108d01084200108420010842001084200119eed4cc500129cd54c89f856340a3197bca499ab750a02e06669b55c793c4b2bd514c7d2a916654b410ea0a3529009f10f790ce5f83f5019a22a5199353314e95a73225d159d4a880a0a62d849a12cc4677aa96924add8a5ea72c8f111cacd20938806dc94804be85c953e75e8f118a2add9224c8c941f8870ffe297a44c2708cc273a1d77212c1f9c7d59c1604e12db38039b9ac643b79dba4d8c04cb4899315eca74d9d5ef674a343685e97b69b5b1709a0d58861b0770df1f51f88bc53ee2c3edc388fa7efe0d7ddaad13d5dedb6d0525554a038007e540d3cf9c7e58aef9e077f679d386ca2e1f8b2b31d0c239aff009336d1ec57da314f93351c974a9497f265317fcb1682f549480281b6e1fbf9c623b17da255a5e44f0133d0017192c7e24fcc69d635168b36105866fe8df5109be9554d1c2d16b4a96b4114141cd89a6e457ca21dad4c40cb0918407a6125813b10d9d0d23e512996a677f7817dc9d352e3ce3b776544a924312e73cfc02bca83a414cd3a2ad389094b00952b0e5bbb9e5424fd989972da9494252acc04835d581310e64a4b52ae4b31abb2829b925f57a16d216392a70ae0c78b067a53307ce0a021f698aa6ad09490124b921aa2835caa067f8634b226b2025f0801b3661cf373bf58ce5fb6a459e5aa72e81201fa01c5ce51e677cdfb69b41c53271912fdd4254c7772454aa05a7b164d247b4c9b5a5f0a49da87c3afea273a9a1dce96964974d0eee73f5f8c7f3fdd761b4a819b669d68feec4aaf99afac6abb11db79b2270b3db893888c13080c1ce458644eba43a92e13bb3d1ef3b005b1480920eaa53796dcb68ad5d8400e65a8848f68a9b16740a1502b551ad78d3578b1a7c3b50d7e514b6a9a0100a496c8a828b75cc9e1c21cc215e777e21e3292c1d80cb2a048a8141e41f2116dd9201d29fc20d07967be7c622c99690cb000045593871664695a1dfa458dc8704c6c01214000065fbc647f21a4feda34b08423a8e610842001084200108420010842001084200235b5640fbf9453db16127100e68332fe99c5ade2694ce3136db424ce202958c6a139063c29e9eb1cf95ecb635a2fec32dd26812eee49255e672e46234c992c1c2953949afbc7c93f758a5be2f4522504212ac6bc80f68f3e5d22c2e8b0ba463c495509673d48ad7a9113bf8295eec5e778a84b381f100586bf503ca3c885abbe9b69b54f0146424b274c66891d0d23dbad3664e12454f3c8f231e0e6c8b41bc2cc478db1b6a7029cfa0f510b2d2dfe8c93d68c9dbad2a5a94b59752aa4fde43847ac59bb5963fe440c490421b0ea0b64d9bc7914e8f99498e9e13ab365735bca449b564a933197fd8582bff12fd23dd25c9c401dfe6d1fcfb664e0b04d2aff00e451c3c7248f573d23de3b056aef2c52145589425a428be6a48627cde3930f64bd9374345e8afb548c2a553fd3d7cddbe111d6ed4609a6474070848e400aead1a2b6200c469b0af97ad621aac99021cd18f0fb61d219ba2bd2b64cb2ac5a317a0ad0920368c0a762efc0c5e5df64f039e7f0f9c4795280593aa9ba3071ea0faf08bdb38181e196d8af48f25fe255a02a74a90fe1427bd58f4483c1c28fe98f25b7da8ad588f4e023d23b4d33bfbcedb2b52808471641a7993e71e676841198622846c47fb8cc6ef2cbf55fd92974f5cec9f6b6c69b0a52b5a52a4259493992db6af19233136bb3da1594c92a2b41d4a09703c9fc84632588d6767060b2db66914284a07151c4e3c88f386cefedbf8e02d1e9dd80bdad136403314700663c1b882e73ac68ad33a593ff00680789ebf6dbc547f0aeca5161978c0ad43eda7cfce3456fb0a141f1ad3c12c5faa9d8794155c2b77d3f6c96748428e20afc340c29938f918fab228a8853b119303ebf58adb129425ad154a9a84d5fd1bca39dd569f1b395106adf36a7461059946eaceb711d622d81430b65c2254752e1cefa21084698210840021084002108400210840055df6b64edd630d66b72125454412ef917e65f36dda3757e21d1566e558f25ed15824a963c402cd02466fb960e35ce39f27e45f1fe273b7dee9996b400404825d8138ab9669c272f17c63d02c3384b4821386828143d19fe318bba2e1320e373cd20a699d4a8b7a45ba2dca2545b137e66f3047ad6232745946cbd936f0b5786b5e479107edb53190ede7652777e8b7d89056b4526ca1ed2c644a46b4d226aedb3311748c0400ee0e94f09663d748b1b05e6a40400b6703c052c347627c599d5318a49aa62ca0790de7d9e44e2a99662c5fc725408521474293e2472239188d64ecce123bf5815ff00ad0e56be0037c1e3df264e4cc231ca44d23f2e223a1496f9c4ebb674803c12d08767c290337e10aa33fc7cf5fc6ffd9270678b4fecaceb4196672156790288410d3144067c2a07006a070e6b48def6507f2e812527c20135a354b3b73cf945876914262d39803ef2eb14ea98a4a800921ddd54a001bcc903cfca4df85463c475638251fe4d34c9c0172797ed1ced968240c3cf2db5a18aab0cc2b24e609ddf63f7c62e7b938683e34f5a4327e48d71f1645fe6c2a99167a71e2d5ac779b78b20e1ad18f0fbce2b6da92972687e4fcbebac545a6f12915c85140edcb5afa3c2b9d686f04f667ed9d919932d026ca9c3bd72a016080b5678090ec08d74e3155da4ec82a628cc424cb9a6b325282bdade80e7f88383c35f40bb98cc41ce80a5abc89e91b09d3a44c40ef402db8c8eb5394328b9b524ea4bfb5f0ce7cb0dda3f9d6c7d8e9b55cf5264ca4fb4b3a0e0ec3a98d0dd172aaf254b9165965161947c5354ff00d420d485378947d3a47a94cbbac2e0ff002d296742a4a4b7205fd23e977b160841424b3600c18707cf4a011449b773775cae135067ece299294c9949385200156701851ea7cbce39aed61994c92331b7ea7201e914f6bbccb9c4a480337f694cfa053e11b0fde02adc160600417a0cdf57d3ca8619c8aa89f16cbc91679e164aca574aa890fccd37ce2d6cb69412568624e80d5f7743d629efcbb95343a54a4ad2055bc25b71e2a457dc6b9a899826cc06944e20727a00ce32f586f633dcf5cb8a7952438d22de283b283c05db937c1f48bf8ea870e6974421086144210800421080042108004210800897a8796adda3cc2cf73a0cd332712eec02f270deca5813cda3d5ad09749a034d631abba86324109ad5854f5390e511ca8ae3645b658ce1a2c907477cbe1ad1a39cab3a908fc408a259c8f33e9174a9400d397cce51c68ccc9e3ca399ad9d09e8a296a429d448490eee4061cd597fa315f2c094a51d371e20741500393d346778babc6e04ac152484bfcb86d1433ac8252bfaad3487c214a0cc740309c5c7e70af5d196cb7b35b12b294b2710a8c2a657ea189f6cbf7b694400494b103da0d5a5469a9d06cf14574a40c657852a0ec8412407ad52e2bc4b45da252d4c5585297f670b06399201a11bc6a159cacf63130952cf8588d69c2adc6205ee65a4d490ce58357ebfb6d1a7401870929e0daf205e28af8ec9ff003292319964bb1492e4eed4a7ad612706f48a42496d94b64bd3bb00ac554e40fcbf56f945a0ed5a404832c9aa412326673a39abc795768e4de564c489a1c21549d87da48667d086eb16166bc54a9525669de2525b8905fa38314a78e2a90d8e11cd276f66eef3ed124a6a90372d90e7afded5aa953095105b32c73d722c1b38f3dbdaf19e6d0254a495b00e90eeac41f31a3111e93d90ec55b034fb5ccc20a5912124b2139b12733a37384c989ce2a54629471c9c6cd14bbb814786adc7ee9e51d24074b906944d4b8e19b80db9de26c9b37775c54e54fb7a4709e415129290767a94ee2b5e4d0d1548949df0acb64cc04b2a84914208d3560715720f967102d3396ec0920b0600a7cc357913a076ce2da75a539778c599c135e869f2e5197bc952940a71286e4252a2452a519aa8d5a81b433044fb3ca4adce1234c4e01507d6a4e6f470223844b96b7188eec2bb6b46ce8fc6384ab2cd28c41630b824e446843170c46849e913ecf604939952b3a80fd1433f285189b265296c52540915a31f37f808a5bcae942660519cb0a7155924124d681e9f41b46becd2e8cc49e398f48893ec0718514ebccf911e914489b66c6e790944a484b642a1eb4e351ca27c44bb434b48ca9b44b8eb472b1084234c10842001084200108420010842003f088cf5f084a4b90fbd4023cc37ac68a2a2ff00b19988a66dd3ac24d5a1e0e998ebc7b412d2e3fa8fc3093cb40f5e51447b4543ddff0030f9d25cbf89999f487fc0a84d257303d68958a55fdd4b79a845b58ac894519238b1539e436e71c2eeced55457d9976898a0b563403eee323cfc26bf6e62da5dc2e71b12b25f17784976dd436a651d49193ac8e4123ff6f589f61b34b146c40e84950f25131b1a325641b4ac484b28278e25a5cf2a54f08eb26e9b4cc5a1d1ddcb624ab13173978053cc33c5e49b1ca15294848ae1000079b443b55ed32704ff002cca0fe353f8007a8c6cc4d1983b3d5a1e913f26439374ae424e3b62ca42ca8a963dd7a21f209e403c5ed8272407ef318f768030e9a738a5b459d0a54c4cc5ba4a0382a2d9e6c323a072e74c8c77bbd12109052cc4040a31207bb8741cf7d21a3d325c24f682c12ed2852169c4154fb3a7c63c16ff00b1da2cb353216924215fd32359750970323ce3dbaf3bcd8284b4a4914abb36b975a3e9c6311da39e153e485a415e3cf2c49d01d3da29e60f38aea5d322e51e171fc32ece196936a9e9066cc6603dc400c03efa9ff51e813ed884a5ca801b9e1af21195bb2f82909059aa4e1a803420fdbc5eaa6cb9a19584be54f972f9c6daaa423b6ed902f4b309aa4ac4f29c0092949df5219c86fac54afb26542519535534a55e2ef5552920bb61003e598eb1dad374489a16028ec70ad49525b30140d033fac779760b44a5204a9893240ae3aacfea4b30cab58e6f7e16e7195a664a42fbb9870196722589a68e5ba8ce3ade7764b9d2d41385493f8487aff6d0fac5eccb42660f178569c8e4eda3870a0760498a2bee55012948ddd09247567f8c352315b322a96ab2e2fea2d8d28016eaff0023964f1fb62ed126989955a29247a86041e043f08b79b670a199e61472df0d527934565b3b3f2d5e37c477a03d406f507844f454b74768659200517dcbb5388aea331d634d730ef1414960753983c0c79c4ab965d077aa04fb2e0b54e589092fc8c7a8f63aeb54a961d4f4f3eb4f8457126d91cad2469258a47d4211d6728842100084210008421000842100084210008e369f64c7688d6e5b24c0c1191bcac45c94b03c07d69f1881212a05d44fdf945fa80af8abcbefce2bd52544b25c931c3286cec8cb47c19c0edd73f2d3ac4bb3d98918f21b96af28e132cf2e556600b58ae0f747f71d4f0882abc66ad6eb2e1f200d1f2094ee720338dd2e9bb7c2e0ddc99a419ea2b4a72962887fcc335f5a7011c67daa6cd182427ba46495300eda81a276a57c9fad8ed892e904123daa82cfeed33569d0ec4c58cea272ab57e0de7f387ab44ee994aab221184a958a607256a21eb4a0c9feeb98873d72c96634a8676df389ff00f1e0abc44924d49fcdf41f188178d9d92a2054bd07139728d48db225ae70c3e2601874abfd3cb58f32bdaf9c73f126acb2a04f37a0f48d9cebb274ec7ded127d948c86bd5b2ca29ad1d9ec94cc5ea064012f90e0043f0cab341d99b789b2525c62c2cda8661e5a57468d14a9c9a1228033e79edf1f38c4cbba56938a5f84b69ae956cf6e822fee19eb7099998db22283a170fca32ecdaa2ea7ddf2e6337b407848242b6297eae3896d62bec46dd217857304d4e84a4074e4ec28f9b8d0f3ad8aec692c6a0872e0d5d39b11f90c4fb3b10a4385149f0feac9b81040ea226e366a91f4561692e195b8fa1cc70315489885f854b08e0aacb3f341e20b7011c6f1bcd291567d1e95d9c65c0c67ad56fefaa8a9e0a017d143c2aea1cf0d55ca8d51b2f6f0b199542921f2043a4ff6a867f18a828255901f7e60f58b1b8ef35a53dda949988d513030fa24f107a6b162bb9d2bf1c87e32d55206e9564b4f27e7a4678a96d0de4e3a670b82480bc452f5d63d024a4001834646ee09490e9a88d7ca5b80778e9c4a91cd95db3ee10845490842100084210008421000842100084210008a4bce6ba9829db48b95e519e528e30016c4a00d0650931a3d224b42d533c2001ef1a5386b5e0e2265a97843228f9ab6ff007f7c638deb34a59a801200d291f00e24a41d59fa87893d68a958b4b96d1d86a49d86ea31f3680de14b0555cbfb035008d77574112e61c28c4332a29e430bd3627788cb940f749d1643ff00911e8d1368a2672b0c91280989a54897c4fbd34819e1190ddb678b0b15f0954ceed5422abab804249297fca187378e46b3d4f9212ac23401346e4cfe662ae525913d7ef009aff729c9e74f531a9d70d6afa6b93352a2327627cfec47354905c9fbac666c1354261626a9ff00ea80df08b0b05b96a153f79c514ac9b8d132658c111593eef00e54d46ef1a24e51c672043342a6529b00032cb28e92ac40071168531576fb4a90c13bc651b677968003ab4525fa8afca21de76d1299403b3a14376cb8870e01d30bc44b7da9402ebee24fac2d431cb5957e196afd4e12fe44f9c2c9fc0d15f256df7623314269f1217c29880776d312485732a1eec45458522a1a2faeaf159e724d4242887d30ba85781c5fe462926cd2c1a9cb4ce2128ae968b7c25cb4b67d0835f8477b1da54920a0eaec77dc36510e4aca92093b65c62c0a7c2f1a85668ec56d4cd20960b4ea353f7fb88d0d9974ac61ae89a4a949397def1a7ba669729d99ba9cb947442473cd17508422c48421080042108004210800ffd9, 1, 'chattest.jpg', '8467', 'image/jpeg', 55);

-- --------------------------------------------------------

--
-- Structure de la table `race`
--

CREATE TABLE `race` (
  `ID_RACE` int(11) NOT NULL,
  `NOM_RACE` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `race`
--

INSERT INTO `race` (`ID_RACE`, `NOM_RACE`) VALUES
(7, 'Main Coon'),
(8, 'ABYSSIN'),
(9, 'Americain Bobtail'),
(10, 'Americain Curl'),
(11, 'Americain Shortair'),
(12, 'American Wirehair'),
(13, 'Angora Turc'),
(14, 'Balinais'),
(15, 'Bengal'),
(16, 'Bleu Russe'),
(17, 'Bombay'),
(18, 'British Shorthair'),
(19, 'Burmese'),
(20, 'Burmilla'),
(21, 'Ceylan'),
(22, 'Chartreux'),
(23, 'Chausie'),
(24, 'Cornish Rex'),
(25, 'Devon Rex'),
(26, 'Donskoy'),
(27, 'Européen'),
(28, 'Exotic'),
(29, 'German Rex'),
(30, 'Havana Brown'),
(31, 'Highland Lynx'),
(32, 'Japanese Bobtail'),
(33, 'Javanais'),
(34, 'Korat'),
(35, 'Kurilian Bobtail'),
(36, 'LaPerm'),
(37, 'Manx'),
(38, 'Mau Egyptien'),
(39, 'Munchkin'),
(40, 'Norvégien'),
(41, 'Ocicat'),
(42, 'Oriental'),
(43, 'Persan'),
(44, 'Peterbald'),
(45, 'Pixie-bob'),
(46, 'Ragdoll'),
(47, 'Sacré de Birmanie'),
(48, 'Savannah'),
(49, 'Scottish & Highland'),
(50, 'Scottish Fold'),
(51, 'Siamois'),
(52, 'Sibérien'),
(53, 'Singapura'),
(54, 'Skogcatt'),
(55, 'Snowshoe'),
(56, 'Somali'),
(57, 'Sphynx'),
(58, 'Thaï'),
(59, 'Tiffany'),
(60, 'Tonkinois'),
(61, 'Toyger'),
(62, 'Turc de Van'),
(63, 'AFFENPINSCHER'),
(64, 'Airedale Terrier'),
(65, 'Akita Américain'),
(66, 'Akita Inu'),
(67, 'Alaskan Klee Kai'),
(68, 'Americain Bully'),
(69, 'American Staffordshi'),
(70, 'Ariégeois'),
(71, 'Azawakh'),
(72, 'Barbet'),
(73, 'Barbu Tchèque'),
(74, 'Barzoï'),
(75, 'Basenji'),
(76, 'Basset artésien norm'),
(77, 'Basset de Westphalie'),
(78, 'Basset des Alpes'),
(79, 'Basset fauve de Bret'),
(80, 'Basset hound'),
(81, 'Beagle'),
(82, 'Beagle-harrier'),
(83, 'Bearded Collie'),
(84, 'Beauceron'),
(85, 'Bedlington terrier'),
(86, 'Berger Allemand'),
(87, 'Berger Australien'),
(88, 'Berger Australien Mi'),
(89, 'Berger Belge Groenen'),
(90, 'Berger Belge Laekeno'),
(91, 'Berger Belge Malinoi'),
(92, 'Berger Bekge Tervuer'),
(93, 'Berger Blanc Suisse'),
(94, 'Berger Catalan'),
(95, 'Berger Créole'),
(96, 'Berger de Marenne et'),
(97, 'Berger de Russie'),
(98, 'Berger des Pyrénées'),
(99, 'Berger des Shetland'),
(100, 'Berger du Karst'),
(101, 'Berger Finnois de La'),
(102, 'Berger Hollandais'),
(103, 'Berger Picard'),
(104, 'Berger Polonais de p'),
(105, 'Berger polonais de P'),
(106, 'Berger portugais'),
(107, 'Berger Yougoslave'),
(108, 'Bichon à poil frisé'),
(109, 'Bichon bolonais'),
(110, 'Bichon Havanais'),
(111, 'Bichon Maltais'),
(112, 'Billy'),
(113, 'Airedale Terrier'),
(114, 'Akita Américain'),
(115, 'Akita Inu'),
(116, 'Alaskan Klee Kai'),
(117, 'Americain Bully'),
(118, 'American Staffordshi'),
(119, 'Ariégeois'),
(120, 'Azawakh'),
(121, 'Barbet'),
(122, 'Barbu Tchèque'),
(123, 'Barzoï'),
(124, 'Basenji'),
(125, 'Basset artésien norm'),
(126, 'Basset de Westphalie'),
(127, 'Basset des Alpes'),
(128, 'Basset fauve de Bret'),
(129, 'Basset hound'),
(130, 'Beagle'),
(131, 'Beagle-harrier'),
(132, 'Bearded Collie'),
(133, 'Beauceron'),
(134, 'Bedlington terrier'),
(135, 'Berger Allemand'),
(136, 'Berger Australien'),
(137, 'Berger Australien Mi'),
(138, 'Berger Belge Groenen'),
(139, 'Berger Belge Laekeno'),
(140, 'Berger Belge Malinoi'),
(141, 'Berger Bekge Tervuer'),
(142, 'Berger Blanc Suisse'),
(143, 'Berger Catalan'),
(144, 'Berger Créole'),
(145, 'Berger D Anatolie'),
(146, 'Berger d Asie centra'),
(147, 'Berger d Islande'),
(148, 'Berger de Bergame'),
(149, 'Berger de Brie'),
(150, 'Berger de l Atlas'),
(151, 'Berger de Marenne et'),
(152, 'Berger de Russie'),
(153, 'Berger des Pyrénées'),
(154, 'Berger des Shetland'),
(155, 'Berger du Karst'),
(156, 'Berger Finnois de La'),
(157, 'Berger Hollandais'),
(158, 'Berger Picard'),
(159, 'Berger Polonais de p'),
(160, 'Berger polonais de P'),
(161, 'Berger portugais'),
(162, 'Berger Yougoslave'),
(163, 'Bichon à poil frisé'),
(164, 'Bichon bolonais'),
(165, 'Bichon Havanais'),
(166, 'Bichon Maltais'),
(167, 'Billy'),
(168, 'Black and tan coonho'),
(169, 'Bobtail'),
(170, 'Boerbull'),
(171, 'Border collie'),
(172, 'Border terrier'),
(173, 'Boston Terrier'),
(174, 'Bouledogue Américain'),
(175, 'Bouledogue Français'),
(176, 'Bouvier Australien'),
(177, 'Bouvier bernois'),
(178, 'Bouvier d Appenzell'),
(179, 'Bouvier de l Entlebu'),
(180, 'Bouvier des Ardennes'),
(181, 'Bouvier des Flandres'),
(182, 'Boxer'),
(183, 'Brachet allemand'),
(184, 'Brachet Autrichien'),
(185, 'Brachet de Styrie'),
(186, 'Brachet Polonais'),
(187, 'Brachet Tyrolien'),
(188, 'Braque Allemand'),
(189, 'Braque d Auvergne'),
(190, 'Braque de Burgos'),
(191, 'Braque de l Ariège'),
(192, 'Braque de Weimar'),
(193, 'Braque du Bourbonnai'),
(194, 'Braque Français'),
(195, 'Braque Hongrois'),
(196, 'Braque Italien'),
(197, 'Braque Saint-Germain'),
(198, 'Braque slovaque'),
(199, 'Briquer griffon vend'),
(200, 'Broholmer'),
(201, 'Buhund norvégien'),
(202, 'Bull terrier'),
(203, 'Bulldog anglais'),
(204, 'Bullmastiff'),
(205, 'Cairn terrier'),
(206, 'Cane corso'),
(207, 'Caniche'),
(208, 'Caniche Moyen'),
(209, 'Caniche nain'),
(210, 'Caniche Royal'),
(211, 'Caniche Toy'),
(212, 'Carlin ou Pug'),
(213, 'Cavalier King Charle'),
(214, 'Chesapeake Bay Retri'),
(215, 'Chien Chinois'),
(216, 'Chien Courant Bernoi'),
(217, 'Chien Courant de Bos'),
(218, 'Chien Courant de Hal'),
(219, 'Chien Courant de Hyg'),
(220, 'Chien Courant de Pos'),
(221, 'Chien Courant de Shw'),
(222, 'Chien Courant de Tra'),
(223, 'Chien Courant D istr'),
(224, 'Chien Courant espagn'),
(225, 'Chien Courant Finlan'),
(226, 'Chien Courant Grec'),
(227, 'Chien Courant Italie'),
(228, 'Chien Courant Serbe'),
(229, 'Chien Courant Slovaq'),
(230, 'Chien Courant Suisse'),
(231, 'Chien Courant Yougos'),
(232, 'Chien d arrêt Allema'),
(233, 'Chien d arrêt Portug'),
(234, 'Chien d Artois'),
(235, 'Chien d eau Américai'),
(236, 'Chien d eau Espagnol'),
(237, 'Chien d eau frison'),
(238, 'Chien d eau Irlandai'),
(239, 'Chien d eau Portugai'),
(240, 'Chien d eau Romagnol'),
(241, 'Chien d élan Norvégi'),
(242, 'Chien de berger Croa'),
(243, 'Chien de berger Majo'),
(244, 'Chien de Canaan'),
(245, 'Chien de Castro Labo'),
(246, 'Chien de montagne de'),
(247, 'Chien de Montagne Po'),
(248, 'Chien de Saint-Huber'),
(249, 'Chien de Taiwan'),
(250, 'Chien du Groenland'),
(251, 'Chien du Pharaon'),
(252, 'Chien élan Suédois'),
(253, 'Chien ours de Caréli'),
(254, 'Chien Oysel'),
(255, 'Chien Finnois'),
(256, 'Chien Norvégien'),
(257, 'Chien nu du Pérou'),
(258, 'Chien nu mexicain'),
(259, 'Chien Rouge de Baviè'),
(260, 'Chien rouge de Hanov'),
(261, 'Chien suédois de Lap'),
(262, 'Chien Thaïlandais'),
(263, 'Chien-loup de Saarlo'),
(264, 'Chien-loup Tchèque'),
(265, 'Chihuahua'),
(266, 'Chihuahua à Poil Lon'),
(267, 'Chow-chow'),
(268, 'Cirneco de L Etna'),
(269, 'Clumber Spaniel'),
(270, 'Cocker Américain'),
(271, 'Cocker Anglais'),
(272, 'Cocker Anglais'),
(273, 'Colley à poil Court'),
(274, 'Colley à poil Long'),
(275, 'Coton de Tuléar'),
(276, 'Dalmatien'),
(277, 'Dandie'),
(278, 'Dobermann'),
(279, 'Dogo Canario'),
(280, 'Dogue Allemand'),
(281, 'Dogue Argentin'),
(282, 'Dogue de Bordeaux'),
(283, 'Dogue de Majorque'),
(284, 'Dogue du Tibet'),
(285, 'Drever'),
(286, 'Dunker'),
(287, 'Epagneul à perdrix'),
(288, 'Epagneul Bleu'),
(289, 'Epagneul Breton'),
(290, 'Epagneul Français'),
(291, 'Epagneul Japonais'),
(292, 'Epagneul Nain'),
(293, 'Epagneul picard'),
(294, 'Epagneul Tibétain'),
(295, 'Eurasier'),
(296, 'Field Splaniel'),
(297, 'Fila brasileiro'),
(298, 'Flat-Coated Retrieve'),
(299, 'Fox Terrier'),
(300, 'Foxhound Américain'),
(301, 'Foxhound Anglais'),
(302, 'Français Blanc et No'),
(303, 'Français Tricolore'),
(304, 'Gascon Saintongeois'),
(305, 'Golden Retriever'),
(306, 'Goldendoodle'),
(307, 'Grand Bleu de Gascog'),
(308, 'Grand Bouvier Suisse'),
(309, 'Grand Epagneul'),
(310, 'Grand Griffon'),
(311, 'Greyhound'),
(312, 'Griffon belge'),
(313, 'Griffon de Bretagne'),
(314, 'Griffon Korthals'),
(315, 'Griffon Nivernais'),
(316, 'Hamilton Stovare'),
(317, 'Harrier'),
(318, 'Hokkaido Ken'),
(319, 'Hovawart'),
(320, 'Husky Sibérien'),
(321, 'Jack Russel'),
(322, 'Jadgterrier'),
(323, 'Jindo Coréen'),
(324, 'Kai'),
(325, 'Kelpie Australien'),
(326, 'Kerry Blue Terrier'),
(327, 'Kishu'),
(328, 'Komondor'),
(329, 'Kromfohrlânder'),
(330, 'Kuvasz'),
(331, 'Labradoodle'),
(332, 'Labrador'),
(333, 'Laïka de Sibérie Occ'),
(334, 'Laïka de Sibérie Ori'),
(335, 'Lakeland Terrier'),
(336, 'Landseer'),
(337, 'Léonberg'),
(338, 'Lévrier Afghan'),
(339, 'Lévrier Ecossais'),
(340, 'Lévrier Espagnol'),
(341, 'Lévrier Irlandais'),
(342, 'Lévrier Polonais'),
(343, 'Lhassa Apso'),
(344, 'Malamute de l Alaska'),
(345, 'Manchester terrier'),
(346, 'Mastiff'),
(347, 'Matin de Naples'),
(348, 'Matin Espagnol'),
(349, 'Morkie'),
(350, 'Mudi'),
(351, 'Norfolk Terrier'),
(352, 'Norwich Terrier'),
(353, 'Old english Bulldog'),
(354, 'Otterhound'),
(355, 'Parson Russel Terrie'),
(356, 'Pékinois'),
(357, 'Petit Basset Griffon'),
(358, 'Petit bleu'),
(359, 'Petit brabançon'),
(360, 'Petit chien courant '),
(361, 'Petit chien Hollanda'),
(362, 'Petit chien Lion'),
(363, 'Petit Lévrier Italie'),
(364, 'Petit Münsterländer'),
(365, 'Pinscher'),
(366, 'Pinscher autrichien '),
(367, 'Pinscher nain'),
(368, 'Pitbull'),
(369, 'Podenco Ibicenco'),
(370, 'Podenco Portugais'),
(371, 'Pointer anglais'),
(372, 'Poitevin'),
(373, 'Pomsky'),
(374, 'Porcelaine'),
(375, 'Pudelpointer'),
(376, 'Puli'),
(377, 'Pumi'),
(378, 'Rafeiro'),
(379, 'Ratier de Prague'),
(380, 'Retriever'),
(381, 'Rhodesian Ridgeback'),
(382, 'Rottweiler'),
(383, 'Russkiy Toy'),
(384, 'Saint-bernard'),
(385, 'Saluki'),
(386, 'Samoyède'),
(387, 'Schnauzer'),
(388, 'Schnauzer Géant'),
(389, 'Schnauzer Moyen'),
(390, 'Schnauzer nain'),
(391, 'Scottish Terrier'),
(392, 'Setter anglais'),
(393, 'Setter Gordon'),
(394, 'Setter Irlandais'),
(395, 'Shar Pei'),
(396, 'Shiba Inu'),
(397, 'Shih tzu'),
(398, 'Shikoku Ken'),
(399, 'Silky Terrier'),
(400, 'Skye Terrier'),
(401, 'Sloughi'),
(402, 'Slovensky Cuvac'),
(403, 'Smous des Pays Bas'),
(404, 'Spinone'),
(405, 'Spiz Allemand'),
(406, 'Spitz de Norrbotten'),
(407, 'Spitz des Wisigoths'),
(408, 'Spitz Finlandais'),
(409, 'Spitz Japonais'),
(410, 'Spitz Nain'),
(411, 'Spitz-loup'),
(412, 'Springer Anglais'),
(413, 'Stabyhoun'),
(414, 'Staffordshire'),
(415, 'Sussez Spaniel'),
(416, 'Tamaskan'),
(417, 'Teckel'),
(418, 'Teckel à poil Dur'),
(419, 'Teckel Poils Long'),
(420, 'Teckel poils Ras'),
(421, 'Teckel Nain'),
(422, 'Terre-neuve'),
(423, 'Terrier Irlandais'),
(424, 'Terrier Japonais'),
(425, 'Terrier Noir Russe'),
(426, 'Terrier Tibétain'),
(427, 'Tosa'),
(428, 'Welsh Corgi'),
(429, 'Welsh Springer Spani'),
(430, 'Welsh Terrier'),
(431, 'Westie'),
(432, 'Whippet'),
(433, 'Yorshire Terrier'),
(434, 'yolo');

-- --------------------------------------------------------

--
-- Structure de la table `refuge`
--

CREATE TABLE `refuge` (
  `ID_REFUGE` int(11) NOT NULL,
  `REGION` varchar(250) NOT NULL,
  `DEPARTEMENT` varchar(50) NOT NULL,
  `ID_ADRESSE` int(11) NOT NULL,
  `EMAIL` varchar(30) NOT NULL,
  `TELEPHONE` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `refuge`
--

INSERT INTO `refuge` (`ID_REFUGE`, `REGION`, `DEPARTEMENT`, `ID_ADRESSE`, `EMAIL`, `TELEPHONE`) VALUES
(1, 'Hauts-de-France', 'Nord', 3, 'anitopia-lille@refuge.fr', '0320593535'),
(2, 'Provence-Alpes-Côte d\'Azur', 'Bouches-du-Rhône', 4, 'anitopia-marseille@refuge.fr', '0491844545'),
(3, 'fdssffds', 'fdsqfdsfdsq', 90001, '', '0'),
(4, '', '', 90003, '', '0'),
(6, 'tgtg', 'tgtg', 90005, '', '0'),
(7, 'fsddsfdsf', 'sfdsfdfffdsfdsds', 14, '', '0'),
(9, 'paris', 'paris', 90008, 'paris@paris.fr', '0680804575');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `ID_UTILISATEUR` int(11) NOT NULL,
  `NOM` varchar(100) NOT NULL,
  `PRENOM` varchar(100) NOT NULL,
  `PSEUDO` varchar(100) NOT NULL,
  `MDP` varchar(100) NOT NULL,
  `ADRESSE_EMAIL` varchar(100) NOT NULL,
  `NUM` varchar(50) NOT NULL,
  `ROLE` varchar(50) NOT NULL,
  `ID_ADRESSE` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`ID_UTILISATEUR`, `NOM`, `PRENOM`, `PSEUDO`, `MDP`, `ADRESSE_EMAIL`, `NUM`, `ROLE`, `ID_ADRESSE`) VALUES
(1, 'JO', 'stoev', 'SHAKKA', '$2y$10$nQSMAHozojfl4erlotsh7eKZSJdOSOS01.RHLYybM6H7ser7IShZW', 'test@test.fr', '0621630429', '[user]', 1),
(2, 'pierre', 'pentier', 'chef2chantier', '$2y$10$myL.toY8aW3zI/Fgku/.V.gq.rZH/ka7TyXpEN3RRyHCm2SDRQskK', 'pentier.pierre@yahoo.fr', '0615151515', '[user]', 3),
(3, 'TESTNOM', 'TESTPRENOM', 'TESTPSEUDO', '$2y$10$nQSMAHozojfl4erlotsh7eKZSJdOSOS01.RHLYybM6H7ser7IShZW', 'test2@test.fr', '0101', '[user]', 14),
(4, 'Pentier', 'Pierre', 'fsefsefsef', '$2y$10$nQSMAHozojfl4erlotsh7eKZSJdOSOS01.RHLYybM6H7ser7IShZW', 'g@g.com', '0781391574', '[user]', 5),
(5, 'VD', 'Jean', 'JCVD', '$2y$10$UDAz/dQ85qFGL.fIWOD.c.f1Eef8M.Th9/k1k6./bflYvdKHmMRzC', 'test@test.com', '0606060606', '[user]', 28);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `adresse`
--
ALTER TABLE `adresse`
  ADD PRIMARY KEY (`ID_ADRESSE`);

--
-- Index pour la table `animaux`
--
ALTER TABLE `animaux`
  ADD PRIMARY KEY (`ID_ANIMAL`),
  ADD KEY `animaux_race0_FK` (`ID_RACE`);

--
-- Index pour la table `appartenir_espece`
--
ALTER TABLE `appartenir_espece`
  ADD PRIMARY KEY (`ID_RACE`,`ID_ESPECE`),
  ADD KEY `appartenir_espece_espece1_FK` (`ID_ESPECE`);

--
-- Index pour la table `avoir_couleur`
--
ALTER TABLE `avoir_couleur`
  ADD PRIMARY KEY (`ID_COULEUR`,`ID_ANIMAL`),
  ADD KEY `avoir_couleur_animaux1_FK` (`ID_ANIMAL`);

--
-- Index pour la table `contactez_nous`
--
ALTER TABLE `contactez_nous`
  ADD PRIMARY KEY (`ID_MESSAGE`),
  ADD KEY `contactez_nous_utilisateur0_FK` (`ID_UTILISATEUR`);

--
-- Index pour la table `couleur_animal`
--
ALTER TABLE `couleur_animal`
  ADD PRIMARY KEY (`ID_COULEUR`);

--
-- Index pour la table `donation`
--
ALTER TABLE `donation`
  ADD KEY `donation_utilisateur0_FK` (`ID_UTILISATEUR`);

--
-- Index pour la table `espece`
--
ALTER TABLE `espece`
  ADD PRIMARY KEY (`ID_ESPECE`);

--
-- Index pour la table `espece_avoir_maladie`
--
ALTER TABLE `espece_avoir_maladie`
  ADD PRIMARY KEY (`ID_ESPECE`,`ID_MALADIE`),
  ADD KEY `espece_avoir_maladie_maladie1_FK` (`ID_MALADIE`);

--
-- Index pour la table `est_infecte_par`
--
ALTER TABLE `est_infecte_par`
  ADD PRIMARY KEY (`ID_MALADIE`,`ID_ANIMAL`),
  ADD KEY `est_infecte_par_animaux1_FK` (`ID_ANIMAL`);

--
-- Index pour la table `etre_favoris`
--
ALTER TABLE `etre_favoris`
  ADD PRIMARY KEY (`ID_UTILISATEUR`,`ID_ANIMAL`),
  ADD KEY `etre_favoris_id_animal1_FK` (`ID_ANIMAL`);

--
-- Index pour la table `garderie`
--
ALTER TABLE `garderie`
  ADD PRIMARY KEY (`ID_GARDERIE`),
  ADD KEY `garderie_id_refuge1_FK` (`ID_REFUGE`),
  ADD KEY `garderie_id_animal0_FK` (`ID_ANIMAL`);

--
-- Index pour la table `img_site`
--
ALTER TABLE `img_site`
  ADD PRIMARY KEY (`ID_IMG_SITE`);

--
-- Index pour la table `maladie`
--
ALTER TABLE `maladie`
  ADD PRIMARY KEY (`ID_MALADIE`);

--
-- Index pour la table `perte`
--
ALTER TABLE `perte`
  ADD PRIMARY KEY (`ID_PERTE`),
  ADD UNIQUE KEY `perte_animaux0_AK` (`ID_ANIMAL`);

--
-- Index pour la table `photo_animal`
--
ALTER TABLE `photo_animal`
  ADD PRIMARY KEY (`ID_PHOTO_ANIMAL`),
  ADD KEY `photo_animal_animaux0_FK` (`ID_ANIMAL`);

--
-- Index pour la table `race`
--
ALTER TABLE `race`
  ADD PRIMARY KEY (`ID_RACE`);

--
-- Index pour la table `refuge`
--
ALTER TABLE `refuge`
  ADD PRIMARY KEY (`ID_REFUGE`),
  ADD UNIQUE KEY `refuge_adresse0_AK` (`ID_ADRESSE`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`ID_UTILISATEUR`),
  ADD UNIQUE KEY `utilisateur_adresse0_AK` (`ID_ADRESSE`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `adresse`
--
ALTER TABLE `adresse`
  MODIFY `ID_ADRESSE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90009;

--
-- AUTO_INCREMENT pour la table `animaux`
--
ALTER TABLE `animaux`
  MODIFY `ID_ANIMAL` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT pour la table `contactez_nous`
--
ALTER TABLE `contactez_nous`
  MODIFY `ID_MESSAGE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT pour la table `couleur_animal`
--
ALTER TABLE `couleur_animal`
  MODIFY `ID_COULEUR` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT pour la table `espece`
--
ALTER TABLE `espece`
  MODIFY `ID_ESPECE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `garderie`
--
ALTER TABLE `garderie`
  MODIFY `ID_GARDERIE` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `img_site`
--
ALTER TABLE `img_site`
  MODIFY `ID_IMG_SITE` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `maladie`
--
ALTER TABLE `maladie`
  MODIFY `ID_MALADIE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT pour la table `perte`
--
ALTER TABLE `perte`
  MODIFY `ID_PERTE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT pour la table `photo_animal`
--
ALTER TABLE `photo_animal`
  MODIFY `ID_PHOTO_ANIMAL` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT pour la table `race`
--
ALTER TABLE `race`
  MODIFY `ID_RACE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=435;

--
-- AUTO_INCREMENT pour la table `refuge`
--
ALTER TABLE `refuge`
  MODIFY `ID_REFUGE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `ID_UTILISATEUR` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `animaux`
--
ALTER TABLE `animaux`
  ADD CONSTRAINT `animaux_race0_FK` FOREIGN KEY (`ID_RACE`) REFERENCES `race` (`ID_RACE`);

--
-- Contraintes pour la table `appartenir_espece`
--
ALTER TABLE `appartenir_espece`
  ADD CONSTRAINT `appartenir_espece_espece1_FK` FOREIGN KEY (`ID_ESPECE`) REFERENCES `espece` (`ID_ESPECE`),
  ADD CONSTRAINT `appartenir_espece_race0_FK` FOREIGN KEY (`ID_RACE`) REFERENCES `race` (`ID_RACE`);

--
-- Contraintes pour la table `avoir_couleur`
--
ALTER TABLE `avoir_couleur`
  ADD CONSTRAINT `avoir_couleur_animaux1_FK` FOREIGN KEY (`ID_ANIMAL`) REFERENCES `animaux` (`ID_ANIMAL`),
  ADD CONSTRAINT `avoir_couleur_couleur_animal0_FK` FOREIGN KEY (`ID_COULEUR`) REFERENCES `couleur_animal` (`ID_COULEUR`);

--
-- Contraintes pour la table `contactez_nous`
--
ALTER TABLE `contactez_nous`
  ADD CONSTRAINT `contactez_nous_utilisateur0_FK` FOREIGN KEY (`ID_UTILISATEUR`) REFERENCES `utilisateur` (`ID_UTILISATEUR`);

--
-- Contraintes pour la table `donation`
--
ALTER TABLE `donation`
  ADD CONSTRAINT `donation_utilisateur0_FK` FOREIGN KEY (`ID_UTILISATEUR`) REFERENCES `utilisateur` (`ID_UTILISATEUR`);

--
-- Contraintes pour la table `espece_avoir_maladie`
--
ALTER TABLE `espece_avoir_maladie`
  ADD CONSTRAINT `espece_avoir_maladie_espece0_FK` FOREIGN KEY (`ID_ESPECE`) REFERENCES `espece` (`ID_ESPECE`),
  ADD CONSTRAINT `espece_avoir_maladie_maladie1_FK` FOREIGN KEY (`ID_MALADIE`) REFERENCES `maladie` (`ID_MALADIE`);

--
-- Contraintes pour la table `est_infecte_par`
--
ALTER TABLE `est_infecte_par`
  ADD CONSTRAINT `est_infecte_par_animaux1_FK` FOREIGN KEY (`ID_ANIMAL`) REFERENCES `animaux` (`ID_ANIMAL`),
  ADD CONSTRAINT `est_infecte_par_maladie0_FK` FOREIGN KEY (`ID_MALADIE`) REFERENCES `maladie` (`ID_MALADIE`);

--
-- Contraintes pour la table `etre_favoris`
--
ALTER TABLE `etre_favoris`
  ADD CONSTRAINT `etre_favoris_id_animal1_FK` FOREIGN KEY (`ID_ANIMAL`) REFERENCES `animaux` (`ID_ANIMAL`),
  ADD CONSTRAINT `etre_favoris_id_utilisateur0_FK` FOREIGN KEY (`ID_UTILISATEUR`) REFERENCES `utilisateur` (`ID_UTILISATEUR`);

--
-- Contraintes pour la table `garderie`
--
ALTER TABLE `garderie`
  ADD CONSTRAINT `garderie_id_animal0_FK` FOREIGN KEY (`ID_ANIMAL`) REFERENCES `animaux` (`ID_ANIMAL`),
  ADD CONSTRAINT `garderie_id_refuge1_FK` FOREIGN KEY (`ID_REFUGE`) REFERENCES `refuge` (`ID_REFUGE`);

--
-- Contraintes pour la table `perte`
--
ALTER TABLE `perte`
  ADD CONSTRAINT `perte_animaux0_FK` FOREIGN KEY (`ID_ANIMAL`) REFERENCES `animaux` (`ID_ANIMAL`);

--
-- Contraintes pour la table `photo_animal`
--
ALTER TABLE `photo_animal`
  ADD CONSTRAINT `photo_animal_animaux0_FK` FOREIGN KEY (`ID_ANIMAL`) REFERENCES `animaux` (`ID_ANIMAL`);

--
-- Contraintes pour la table `refuge`
--
ALTER TABLE `refuge`
  ADD CONSTRAINT `refuge_adresse0_FK` FOREIGN KEY (`ID_ADRESSE`) REFERENCES `adresse` (`ID_ADRESSE`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
