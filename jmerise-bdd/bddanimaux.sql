-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  mer. 29 avr. 2020 à 21:39
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
  `CODE_POSTAL` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `adresse`
--

INSERT INTO `adresse` (`ID_ADRESSE`, `NUMERO`, `RUE`, `VILLE`, `CODE_POSTAL`) VALUES
(1, 15, 'rue lesage senault', 'Lille', 50000),
(3, 75, 'rue du Luxembourg', 'Lille', 59000),
(4, 48, 'avenue du vélodrome', 'Marseille', 13000),
(5, 1512, 'fsefsefsef', 'roubaix', 59100),
(14, 20, 'testrue', 'testville', 99999);

-- --------------------------------------------------------

--
-- Structure de la table `animaux`
--

CREATE TABLE `animaux` (
  `ID_ANIMAL` int(11) NOT NULL,
  `NOM` char(20) NOT NULL,
  `DATE_NAISSANCE` date NOT NULL,
  `POIDS` int(11) NOT NULL,
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
  `ID_GARDERIE` int(11) DEFAULT NULL,
  `SEXE` varchar(20) DEFAULT 'Mâle'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(1, 'Blanc'),
(2, 'Noir'),
(3, 'Gris'),
(4, 'Roux'),
(5, 'Chatain'),
(6, 'Bleu'),
(7, 'Cerf');

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
(2, 'Chat');

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
  `NBR_PLACE` int(11) NOT NULL,
  `DATE_ENTREE` date NOT NULL,
  `DATE_SORTIE` date NOT NULL,
  `ID_REFUGE` int(11) NOT NULL
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
(60, 'Toux de chenil', 1);

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
(1, 'Labrador'),
(2, 'Berger Allemand'),
(3, 'Epagneul Breton'),
(4, 'Caniche'),
(5, 'Shiba'),
(6, 'Carlin'),
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
(433, 'Yorshire Terrier');

-- --------------------------------------------------------

--
-- Structure de la table `refuge`
--

CREATE TABLE `refuge` (
  `ID_REFUGE` int(11) NOT NULL,
  `REGION` varchar(250) NOT NULL,
  `DEPARTEMENT` varchar(50) NOT NULL,
  `ID_ADRESSE` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `refuge`
--

INSERT INTO `refuge` (`ID_REFUGE`, `REGION`, `DEPARTEMENT`, `ID_ADRESSE`) VALUES
(1, 'Hauts-de-France', 'Nord', 3),
(2, 'Provence-Alpes-Côte d\'Azur', 'Bouches-du-Rhône', 4);

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
  `ID_ADRESSE` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`ID_UTILISATEUR`, `NOM`, `PRENOM`, `PSEUDO`, `MDP`, `ADRESSE_EMAIL`, `NUM`, `ID_ADRESSE`) VALUES
(1, 'JO', 'stoev', 'SHAKKA', '$2y$10$nQSMAHozojfl4erlotsh7eKZSJdOSOS01.RHLYybM6H7ser7IShZW', 'test@test.fr', '0621630429', 1),
(2, 'pierre', 'pentier', 'chef2chantier', '$2y$10$myL.toY8aW3zI/Fgku/.V.gq.rZH/ka7TyXpEN3RRyHCm2SDRQskK', 'pentier.pierre@yahoo.fr', '0615151515', 3),
(3, 'TESTNOM', 'TESTPRENOM', 'TESTPSEUDO', '$2y$10$nQSMAHozojfl4erlotsh7eKZSJdOSOS01.RHLYybM6H7ser7IShZW', 'test2@test.fr', '0101', 14),
(4, 'Pentier', 'Pierre', 'fsefsefsef', '$2y$10$nQSMAHozojfl4erlotsh7eKZSJdOSOS01.RHLYybM6H7ser7IShZW', 'g@g.com', '0781391574', 5),
(5, 'VD', 'Jean', 'JCVD', '$2y$10$UDAz/dQ85qFGL.fIWOD.c.f1Eef8M.Th9/k1k6./bflYvdKHmMRzC', 'test@test.com', '0606060606', 28);

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
  ADD UNIQUE KEY `garderie_refuge0_AK` (`ID_REFUGE`);

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
  MODIFY `ID_ADRESSE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90001;

--
-- AUTO_INCREMENT pour la table `animaux`
--
ALTER TABLE `animaux`
  MODIFY `ID_ANIMAL` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT pour la table `contactez_nous`
--
ALTER TABLE `contactez_nous`
  MODIFY `ID_MESSAGE` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `couleur_animal`
--
ALTER TABLE `couleur_animal`
  MODIFY `ID_COULEUR` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `espece`
--
ALTER TABLE `espece`
  MODIFY `ID_ESPECE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
  MODIFY `ID_MALADIE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT pour la table `perte`
--
ALTER TABLE `perte`
  MODIFY `ID_PERTE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT pour la table `photo_animal`
--
ALTER TABLE `photo_animal`
  MODIFY `ID_PHOTO_ANIMAL` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `race`
--
ALTER TABLE `race`
  MODIFY `ID_RACE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=434;

--
-- AUTO_INCREMENT pour la table `refuge`
--
ALTER TABLE `refuge`
  MODIFY `ID_REFUGE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
  ADD CONSTRAINT `garderie_refuge0_FK` FOREIGN KEY (`ID_REFUGE`) REFERENCES `refuge` (`ID_REFUGE`);

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
