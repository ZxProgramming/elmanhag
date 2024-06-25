-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 24, 2024 at 03:28 PM
-- Server version: 10.3.39-MariaDB-0ubuntu0.20.04.2
-- PHP Version: 8.2.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `elmanhag_`
--

-- --------------------------------------------------------

--
-- Table structure for table `add_slides`
--

CREATE TABLE `add_slides` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `slides` int(11) NOT NULL,
  `date` date NOT NULL,
  `lesson_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `add_slides`
--

INSERT INTO `add_slides` (`id`, `user_id`, `slides`, `date`, `lesson_id`) VALUES
(1, 1, 1, '2023-11-23', 68),
(2, 1, 1, '2023-11-27', 0),
(3, 1, 1, '2023-11-27', 0),
(4, 1, 1, '2023-11-27', 0),
(5, 1, 2, '2023-11-27', 0);

-- --------------------------------------------------------

--
-- Table structure for table `bundle`
--

CREATE TABLE `bundle` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `category_id` int(11) NOT NULL,
  `Active` enum('0','1') NOT NULL DEFAULT '1',
  `status` enum('0','1') NOT NULL DEFAULT '0',
  `discount` float DEFAULT NULL,
  `teacher_precentage` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bundle`
--

INSERT INTO `bundle` (`id`, `name`, `price`, `category_id`, `Active`, `status`, `discount`, `teacher_precentage`) VALUES
(19, 'newwwwwwwwwwwwwwwwwwwwwwwwwwwwwww bundle', 1000000, 4, '1', '1', NULL, 10),
(20, 'Ibrahem', 250, 7, '1', '', NULL, 22),
(21, 'مواد علمية', 500, 9, '1', '1', NULL, 20),
(22, 'languages', 100, 12, '0', '0', NULL, 22),
(23, 'Online Courses', 333, 15, '1', '1', NULL, 22),
(24, 'just Arabic', 225, 6, '1', '1', NULL, 22),
(25, 'programmer', 500, 11, '0', '1', NULL, 22),
(26, 'hamada', 250, 12, '0', '0', NULL, 22),
(27, 'tishrt cut', 250, 11, '0', '0', NULL, 22),
(28, 'programmer', 333, 6, '1', '0', NULL, 22),
(29, 'Wego Station', 250, 10, '0', '', NULL, 22),
(30, 'weg', 250, 14, '1', '0', NULL, 22),
(31, 'Ahmed Yehia', 333, 14, '1', '0', NULL, 22),
(32, 'tishrt cut', 250, 4, '1', '1', NULL, 22),
(33, 'tishrt cut', 250, 4, '1', '0', NULL, 22),
(34, 'Start Lessons King', 250, 4, '1', '1', NULL, 22),
(35, 'bundle 1', 222, 4, '1', '0', NULL, 33),
(36, 'vd1', 222, 4, '1', '0', NULL, 33),
(37, 'programmer', 333, 11, '1', '1', NULL, 22),
(38, 'programmer', 333, 11, '1', '1', NULL, 22),
(39, 'programmer', 250, 11, '1', '1', NULL, 22),
(40, 'programmer', 250, 11, '1', '1', NULL, 22),
(41, 'programmer', 250, 11, '1', '1', NULL, 22),
(42, 'programmer', 250, 11, '1', '1', NULL, 22),
(61, 'programmer', 250, 11, '1', '1', NULL, 22),
(62, 'programmer', 250, 11, '1', '1', NULL, 22),
(63, 'ddasdasd', 333, 11, '1', '0', NULL, 231),
(64, 'programmer', 333, 14, '1', '1', NULL, 22),
(65, 'رياضةةةةة', 0, 4, '1', '0', NULL, 10);

-- --------------------------------------------------------

--
-- Table structure for table `bundle_subjects`
--

CREATE TABLE `bundle_subjects` (
  `id` int(11) NOT NULL,
  `bundle_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bundle_subjects`
--

INSERT INTO `bundle_subjects` (`id`, `bundle_id`, `subject_id`) VALUES
(4, 22, 6),
(11, 25, 6),
(15, 26, 6),
(17, 25, 9),
(19, 25, 9),
(31, 12, 5),
(38, 18, 7),
(39, 18, 9),
(43, 19, 5),
(45, 20, 6),
(46, 20, 8),
(48, 21, 5),
(49, 21, 6),
(50, 22, 9),
(51, 23, 6),
(52, 23, 7),
(54, 24, 8),
(55, 25, 8),
(56, 0, 1),
(57, 0, 2),
(58, 0, 6),
(59, 0, 8),
(60, 0, 9),
(61, 0, 1),
(62, 0, 2),
(63, 0, 6),
(64, 0, 8),
(65, 0, 9),
(66, 0, 3),
(67, 0, 8),
(68, 0, 9),
(69, 0, 20),
(70, 0, 21),
(71, 0, 22),
(72, 0, 3),
(73, 0, 8),
(74, 0, 9),
(75, 0, 20),
(76, 0, 21),
(77, 0, 22),
(78, 0, 3),
(79, 0, 8),
(80, 0, 9),
(81, 0, 20),
(82, 0, 21),
(83, 0, 22),
(84, 0, 3),
(85, 0, 8),
(86, 0, 9),
(87, 0, 20),
(88, 0, 21),
(89, 0, 22),
(90, 61, 3),
(91, 61, 8),
(92, 61, 9),
(93, 61, 20),
(94, 61, 21),
(95, 61, 22),
(114, 62, 1),
(115, 62, 2),
(116, 62, 3),
(117, 62, 6),
(118, 62, 7),
(119, 62, 8),
(120, 62, 9),
(121, 63, 2),
(122, 63, 3),
(123, 63, 7),
(124, 64, 1),
(125, 64, 2),
(126, 65, 1),
(127, 65, 3);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `category` varchar(150) DEFAULT NULL,
  `status` enum('0','1','2','3') NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `parent` enum('1','2','3') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `state_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `id` int(11) NOT NULL,
  `country` varchar(255) NOT NULL,
  `city_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`id`, `country`, `city_name`) VALUES
(2, '5', 'Karachi'),
(8, '61', 'Alexandria'),
(9, '61', 'Aswan'),
(10, '61', 'Asyut'),
(11, '61', 'Damanhur'),
(12, '61', 'Marsa Matruh'),
(13, '10', 'Port Said'),
(14, '61', 'Luxor'),
(15, '61', 'Faiyum'),
(16, '61', 'Giza'),
(17, '61', 'Cairo'),
(18, '61', 'Hurghada'),
(19, '61', 'Sharm El Sheikh'),
(20, '7', 'Abha'),
(21, '7', 'Ad-Dilam'),
(22, '7', 'Al-Abwa'),
(23, '7', 'Al Artaweeiyah'),
(25, '7', 'Al Bukayriyah'),
(26, '7', 'Badr'),
(27, '7', 'Baljurashi'),
(28, '7', 'Bisha'),
(29, '7', 'Bareq'),
(30, '7', 'Buraydah'),
(31, '7', 'Buraydah'),
(32, '7', 'Al Bahah'),
(33, '7', 'Buqaa'),
(34, '7', 'Dammam'),
(35, '7', 'Dhahran'),
(36, '7', 'Dhurma'),
(37, '7', 'Dahaban'),
(38, '7', 'Diriyah'),
(39, '7', 'Duba'),
(40, '7', 'Dumat Al-Jandal'),
(41, '7', 'Dawadmi'),
(42, '7', 'Farasan'),
(43, '7', 'Gatgat'),
(44, '7', 'Gerrha'),
(45, '7', 'Ghawiyah'),
(46, '7', 'Al-Gwei\'iyyah'),
(47, '7', 'Hautat Sudair'),
(48, '7', 'Habaala'),
(49, '7', 'Hajrah'),
(50, '7', 'Haql'),
(51, '7', 'Al-Hareeq'),
(52, '7', 'Harmah'),
(53, '7', 'Ha\'il'),
(54, '7', 'Hotat Bani Tamim'),
(55, '7', 'Hofuf'),
(56, '7', 'Huraymila'),
(57, '7', 'Hafr Al-Batin'),
(58, '7', 'Jabal Umm al Ru\'us'),
(59, '7', 'Jalajil'),
(60, '7', 'Jeddah'),
(61, '7', 'Jizan'),
(62, '7', 'Jizan Economic City'),
(63, '7', 'Jubail'),
(64, '7', 'Al Jafr'),
(65, '7', 'Khafji'),
(66, '7', 'Khaybar'),
(67, '7', 'King Abdullah Economic City'),
(68, '7', 'Khamis Mushait'),
(69, '7', 'Al-Saih'),
(70, '7', 'Knowledge Economic City, Medina'),
(71, '7', 'Khobar'),
(72, '7', 'Al-Khutt'),
(73, '7', 'Layla'),
(74, '7', 'Lihyan'),
(75, '7', 'Al Lith'),
(76, '7', 'Al Majma\'ah'),
(77, '7', 'Mastoorah'),
(78, '7', 'Al Mikhwah'),
(79, '7', 'Al-Mubarraz'),
(80, '7', 'Al Mawain'),
(81, '7', 'Medina'),
(82, '7', 'Mecca'),
(83, '7', 'Muzahmiyya'),
(84, '7', 'Najran'),
(85, '7', 'Al-Namas'),
(86, '7', 'Umluj'),
(87, '7', 'Al-Omran'),
(88, '7', 'Al-Oyoon'),
(89, '7', 'Qadeimah'),
(90, '7', 'Qatif'),
(91, '7', 'Qaisumah'),
(92, '7', 'Al Qunfudhah'),
(93, '7', 'Qurayyat'),
(94, '7', 'Rabigh'),
(96, '7', 'Rafha'),
(97, '7', 'Ar Rass'),
(98, '7', 'Ras Tanura'),
(99, '7', 'Ranyah'),
(100, '7', 'Riyadh'),
(101, '7', 'Riyadh Al-Khabra'),
(102, '7', 'Rumailah'),
(103, '7', 'Sabt Al Alaya'),
(104, '7', 'Sarat Abidah'),
(105, '7', 'Saihat'),
(106, '7', 'Safwa city'),
(107, '7', 'Sakakah'),
(108, '7', 'Sharurah'),
(109, '7', 'Shaqraa'),
(110, '7', 'Shaybah'),
(111, '7', 'As Sulayyil'),
(112, '7', 'Taif'),
(113, '7', 'Tabuk'),
(114, '7', 'Tanomah'),
(115, '7', 'Tarout'),
(116, '7', 'Tayma'),
(117, '7', 'Thadiq'),
(118, '7', 'Thuwal'),
(119, '7', 'Thuqbah'),
(120, '7', 'Turaif'),
(121, '7', 'Tabarjal'),
(122, '7', 'Udhailiyah'),
(123, '7', 'Al-\'Ula'),
(124, '7', 'Um Al-Sahek'),
(125, '7', 'Unaizah'),
(126, '7', 'Uqair'),
(127, '7', '\'Uyayna'),
(128, '7', 'Uyun AlJiwa'),
(129, '7', 'Wadi Al-Dawasir'),
(130, '7', 'Al Wajh'),
(131, '7', 'Yanbu'),
(132, '7', 'Az Zaimah'),
(133, '7', 'Zulfi'),
(134, '195', 'Dubai'),
(135, '195', 'Abu Dhabi'),
(136, '195', 'Sharjah'),
(137, '195', 'Al Ain'),
(138, '195', 'Ajman'),
(139, '195', 'Ras Al Khaimah'),
(140, '195', 'Fujairah'),
(141, '195', 'Umm al-Quwain'),
(142, '190', 'Istanbul'),
(143, '190', 'Ankara'),
(144, '190', 'Izmir'),
(145, '190', 'Bursa'),
(146, '103', 'Beirut'),
(147, '103', 'Tripoli'),
(148, '103', 'Sidon'),
(149, '103', 'Tyre'),
(150, '103', 'Nabatîyé et Tahta'),
(151, '103', 'Habboûch'),
(152, '103', 'Jounieh'),
(153, '103', 'Zahle'),
(154, '103', 'Ghazieh'),
(155, '103', 'Baalbek'),
(156, '103', 'En Nâqoûra'),
(157, '103', 'Byblos'),
(158, '151', 'Doha'),
(159, '151', 'Abu az Zuluf'),
(160, '151', 'Abu Thaylah'),
(161, '151', 'Ad Dawhah al Jadidah'),
(162, '151', 'Al `Arish'),
(163, '151', 'Al Bida` ash Sharqiyah'),
(164, '151', 'Al Ghanim'),
(165, '151', 'Al Ghuwariyah'),
(166, '151', 'Al Hilal al Gharbiyah'),
(167, '151', 'Al Hilal ash Sharqiyah'),
(168, '151', 'Al Hitmi'),
(169, '151', 'Al Jasrah'),
(170, '151', 'Al Jumaliyah'),
(171, '151', 'Al Ka`biyah'),
(172, '151', 'Al Khalifat'),
(173, '151', 'Al Khor'),
(174, '151', 'Al Khawr'),
(175, '151', 'Al Khuwayr'),
(176, '151', 'Al Mafjar'),
(177, '151', 'Al Qa`abiyah'),
(178, '151', 'Al Wakrah'),
(179, '151', 'Al `Adhbah'),
(180, '151', 'An Najmah'),
(181, '151', 'Ar Rakiyat'),
(182, '151', 'Al Rayyan'),
(183, '151', 'Ar Ru\'ays'),
(184, '151', 'As Salatah'),
(185, '151', 'As Salatah al Jadidah'),
(186, '151', 'As Sani`'),
(187, '151', 'As Sawq'),
(188, '151', 'Ath Thaqab'),
(189, '151', 'Blaré'),
(190, '151', 'Dukhan'),
(191, '151', 'Ras Laffan Industrial City'),
(192, '151', 'Umm Bab'),
(193, '151', 'Umm Sa\'id'),
(194, '151', 'Umm Salal Ali'),
(195, '151', 'Umm Salal Mohammed'),
(196, '22', 'Manama'),
(197, '22', 'Riffa'),
(198, '22', 'Muharraq'),
(199, '22', 'Hamad Town'),
(200, '22', 'A\'ali'),
(201, '22', 'Isa Town'),
(202, '22', 'Sitra'),
(203, '22', 'Budaiya'),
(204, '22', 'Jidhafs'),
(205, '22', 'Al-Malikiyah'),
(206, '114', 'Malé'),
(207, '114', 'Fuvahmulah'),
(208, '114', 'Hithadhoo'),
(209, '114', 'Kulhudhuffushi'),
(210, '114', 'Thinadhoo'),
(211, '114', 'Naifaru'),
(212, '114', 'Hulhumale'),
(213, '114', 'Dhihdhoo'),
(214, '114', 'Maafushi'),
(215, '114', 'Maafushi'),
(216, '114', 'Viligili'),
(217, '114', 'Funadhoo'),
(218, '114', 'Eydhafushi'),
(219, '190', 'Adana'),
(220, '190', 'Gaziantep'),
(221, '190', 'Konya'),
(222, '190', 'Konya'),
(223, '190', 'Kayseri'),
(224, '190', 'Mersin'),
(225, '190', 'Eskisehir'),
(226, '190', 'Diyarbakir'),
(227, '190', 'Samsun'),
(228, '190', 'Denizli'),
(229, '190', 'Sanliurfa'),
(230, '190', 'Adapazari'),
(231, '190', 'Malatya'),
(232, '190', 'Kahramanmaras'),
(233, '190', 'Erzurum'),
(234, '190', 'Van'),
(235, '190', 'Batman'),
(236, '190', 'Elazig'),
(237, '190', 'Izmit'),
(238, '190', 'Manisa'),
(239, '190', 'Sivas'),
(240, '190', 'Sivas'),
(241, '190', 'Sivas'),
(242, '190', 'Gebze'),
(243, '190', 'Balikesir'),
(244, '190', 'Tarsus'),
(246, '190', 'Kutahya'),
(247, '190', 'Trabzon'),
(248, '190', 'Corum'),
(249, '190', 'Corlu'),
(250, '190', 'Adiyaman'),
(252, '190', 'Osmaniye'),
(253, '190', 'Kirikkale'),
(254, '190', 'Antakya'),
(255, '190', 'Aydin'),
(256, '190', 'Iskenderun'),
(257, '190', 'Usak'),
(258, '190', 'Aksaray'),
(259, '197', 'New York'),
(260, '197', 'Los Angeles'),
(261, '197', 'Chicago'),
(262, '197', 'Houston'),
(263, '197', 'Phoenix'),
(264, '197', 'Philadelphia'),
(265, '197', 'San Antonio'),
(266, '197', 'San Diego'),
(267, '197', 'Dallas'),
(268, '197', 'San Jose'),
(269, '197', 'Austin'),
(270, '197', 'Jacksonville'),
(271, '197', 'Fort Worth'),
(272, '197', 'Columbus'),
(273, '197', 'Indianapolis'),
(274, '197', 'Charlotte'),
(275, '197', 'San Francisco'),
(276, '197', 'Seattle'),
(277, '197', 'Denver'),
(278, '197', 'Oklahoma City'),
(279, '197', 'Nashville'),
(280, '197', 'El Paso'),
(281, '197', 'Washington'),
(282, '197', 'Boston'),
(283, '197', 'Las Vegas'),
(284, '197', 'Portland'),
(285, '197', 'Detroit'),
(286, '197', 'Louisville'),
(287, '197', 'Memphis'),
(288, '197', 'Baltimore'),
(289, '197', 'Milwaukee'),
(290, '197', 'Albuquerque'),
(291, '197', 'Sacramento'),
(292, '197', 'Kansas City'),
(293, '197', 'Atlanta'),
(294, '197', 'Georgia'),
(295, '197', 'California'),
(296, '197', 'Omaha'),
(297, '197', 'Raleigh'),
(298, '197', 'Virginia Beach'),
(299, '197', 'Virginia'),
(300, '197', 'Miami'),
(301, '197', 'Minneapolis'),
(302, '197', 'Minnesota'),
(303, '197', 'Wichita'),
(304, '197', 'New Orleans'),
(305, '197', 'Florida'),
(306, '197', 'Hawaii'),
(307, '197', 'Honolulu'),
(308, '197', 'Texas'),
(309, '197', 'Santa Ana'),
(310, '197', 'New Jersey'),
(311, '197', 'Newark'),
(312, '197', 'Saint Paul'),
(313, '197', 'Saint Paul'),
(314, '197', 'Saint Paul'),
(315, '197', 'Lincoln'),
(316, '197', 'Anchorage'),
(317, '197', 'Frisco'),
(318, '197', 'Columbus'),
(319, '197', 'Little Rock'),
(320, '197', 'Mississippi'),
(321, '197', 'Columbia'),
(322, '197', 'Victorville'),
(323, '197', 'Elizabeth'),
(324, '197', 'Cambridge'),
(325, '197', 'Manchester'),
(326, '70', 'Paris'),
(327, '70', 'Marseille'),
(328, '70', 'Lyon'),
(330, '70', 'Toulouse'),
(331, '70', 'Nice'),
(332, '70', 'Nantes'),
(333, '70', 'Montpellier'),
(334, '70', 'Strasbourg'),
(335, '70', 'Bordeaux'),
(336, '70', 'Lille'),
(338, '70', 'Rennes'),
(339, '70', 'Grenoble'),
(340, '70', 'Rouen'),
(341, '70', 'Avignon'),
(342, '70', 'Saint Etienne'),
(343, '70', 'Tours'),
(344, '70', 'Clermont-Ferrand'),
(345, '70', 'Nancy'),
(346, '70', 'Orléans'),
(347, '70', 'Caen'),
(348, '70', 'Angers'),
(349, '70', 'Metz'),
(350, '70', 'Dijon'),
(351, '70', 'Béthune'),
(352, '70', 'Valenciennes'),
(353, '70', 'Le Mans'),
(354, '70', 'Reims'),
(355, '70', 'Brest'),
(356, '70', 'Perpignan'),
(357, '70', 'Nîmes'),
(358, '70', 'Nîmes'),
(359, '70', 'Poitiers'),
(360, '70', 'Besançon'),
(361, '70', 'Annecy'),
(362, '70', 'La Rochelle'),
(363, '70', 'Chambéry'),
(364, '70', '(Geneva) Annemasse'),
(365, '70', 'Saint-Nazaire'),
(366, '70', 'Valence'),
(367, '70', 'Angoulême'),
(368, '70', 'Maubeuge'),
(369, '70', 'Montbéliard'),
(370, '92', 'Rome'),
(371, '92', 'Milan'),
(372, '92', 'Naples'),
(373, '92', 'Turin'),
(374, '92', 'Palermo'),
(375, '92', 'Genoa'),
(376, '92', 'Bologna'),
(377, '92', 'Florence'),
(378, '92', 'Bari'),
(379, '92', 'Catania'),
(380, '92', 'Verona'),
(381, '92', 'Venice'),
(382, '92', 'Messina'),
(383, '92', 'Padua'),
(384, '92', 'Prato'),
(385, '92', 'Trieste'),
(386, '92', 'Brescia'),
(387, '92', 'Parma'),
(388, '92', 'Taranto'),
(389, '92', 'Modena'),
(390, '92', 'Perugia'),
(391, '92', 'Ravenna'),
(392, '92', 'Cagliari'),
(393, '92', 'Foggia'),
(394, '92', 'Trento'),
(395, '92', 'Ancona'),
(396, '92', 'Catanzaro'),
(397, '92', 'Treviso'),
(398, '92', 'L’Aquila'),
(399, '92', 'Potenza'),
(400, '92', 'Turin'),
(401, '92', 'Piedmont'),
(402, '92', 'Sicily'),
(403, '92', 'Palermo'),
(404, '92', 'Genoa'),
(405, '92', 'Liguria'),
(406, '92', 'Bologna'),
(407, '92', 'Emilia-Romagna'),
(408, '92', 'Florence'),
(409, '92', 'Tuscany'),
(410, '92', 'Bari'),
(411, '92', 'Apulia'),
(412, '92', 'Catania'),
(413, '92', 'Verona'),
(414, '92', 'Veneto'),
(415, '92', 'Venice'),
(416, '92', 'Messina'),
(418, '92', 'Modena'),
(419, '74', 'Berlin'),
(420, '74', 'Hamburg'),
(421, '74', 'Munich'),
(422, '74', 'Stuttgart'),
(423, '74', 'Frankfurt am Main'),
(424, '74', 'Düsseldorf'),
(425, '74', 'Leipzig'),
(426, '74', 'Dresden'),
(427, '74', 'Dortmund'),
(428, '74', 'Bonn'),
(429, '74', 'Essen'),
(430, '74', 'Cologne'),
(431, '74', 'Nuremberg'),
(432, '74', 'Chemnitz'),
(433, '74', 'Mannheim'),
(434, '74', 'Mainz'),
(435, '74', 'Braunschweig'),
(436, '74', 'Osnabrück'),
(437, '74', 'Frankfurt'),
(438, '74', 'Kiel'),
(439, '74', 'Magdeburg'),
(440, '74', 'Mainz'),
(441, '74', 'Erfurt'),
(442, '74', 'Potsdam'),
(443, '74', 'Saarbrücken'),
(444, '74', 'Düsseldorf'),
(445, '74', 'Leipzig'),
(446, '74', 'Dortmund'),
(447, '74', 'Bremen'),
(448, '74', 'Duisburg'),
(449, '74', 'Nuremberg'),
(450, '74', 'Hanover'),
(451, '174', 'Madrid'),
(452, '174', 'Barcelona'),
(453, '174', 'Valencia'),
(454, '174', 'Seville'),
(455, '174', 'Zaragoza'),
(456, '174', 'Bilbao'),
(457, '174', 'Córdoba'),
(458, '174', 'Granada'),
(459, '174', 'Málaga'),
(460, '174', 'Alicante'),
(461, '174', 'Palma'),
(462, '174', 'Murcia'),
(463, '174', 'Toledo'),
(464, '174', 'Cádiz'),
(465, '174', 'San Sebastian'),
(466, '174', 'Salamanca'),
(467, '174', 'Las Palmas'),
(468, '174', 'Oviedo'),
(469, '174', 'Valladolid'),
(470, '174', 'Pamplona'),
(471, '174', 'Santiago de Compostela'),
(472, '174', 'Almería'),
(473, '174', 'Girona'),
(474, '174', 'Jerez de la Frontera'),
(475, '132', 'Rotterdam'),
(476, '132', 'The Hague'),
(477, '132', 'Amsterdam'),
(478, '132', 'Utrecht'),
(479, '132', 'Eindhoven'),
(480, '132', 'Groningen'),
(481, '132', 'Haarlem'),
(482, '132', 'Arnhem'),
(483, '132', 'Breda'),
(484, '132', '\'s-Hertogenbosch'),
(485, '132', 'Nijmegen'),
(486, '132', 'Zwolle'),
(487, '132', 'Apeldoorn'),
(488, '132', 'Zaanstad'),
(489, '132', 'Den Helder'),
(490, '113', 'Kuala Lumpur'),
(491, '113', 'Ipoh'),
(492, '113', 'George Town'),
(493, '113', 'Kuching'),
(494, '113', 'Malacca City'),
(495, '113', 'Petaling Jaya'),
(496, '113', 'Sandakan'),
(497, '113', 'Kuala Terengganu'),
(498, '113', 'Kota Bharu'),
(499, '113', 'Kota Bharu'),
(500, '113', 'Tawau'),
(501, '113', 'Johor Bahru'),
(502, '113', 'Kota Kinabalu'),
(503, '113', 'Klang'),
(504, '184', 'Bangkok'),
(505, '184', 'Nonthaburi'),
(506, '184', 'Pak Kret'),
(507, '184', 'Hat Yai'),
(508, '184', 'Chaophraya Surasak'),
(509, '184', 'Surat Thani'),
(510, '184', 'Nakhon Ratchasima'),
(511, '184', 'Chiang Mai'),
(512, '184', 'Udon Thani'),
(513, '184', 'Pattaya'),
(514, '184', 'Khon Kaen'),
(515, '184', 'Nakhon Si Thammarat'),
(516, '184', 'Laem Chabang'),
(517, '184', 'Rangsit'),
(518, '184', 'Nakhon Sawan'),
(519, '184', 'Phuket'),
(520, '184', 'Chiang Rai'),
(521, '184', 'Ubon Ratchathani'),
(522, '184', 'Nakhon Pathom'),
(523, '184', 'Ko Samui'),
(524, '184', 'Samut Sakhon'),
(525, '184', 'Phitsanulok'),
(526, '184', 'Rayong'),
(527, '184', 'Songkhla'),
(528, '184', 'Yala'),
(529, '184', 'Trang'),
(530, '184', 'Om Noi'),
(531, '184', 'Sakon Nakhon'),
(532, '184', 'Lampang'),
(533, '184', 'Samut Prakan'),
(534, '184', 'Phra Nakhon Si Ayutthaya'),
(535, '184', 'Mae Sot'),
(536, '61', 'Alexandria'),
(538, '161', 'madina');

-- --------------------------------------------------------

--
-- Table structure for table `contents`
--

CREATE TABLE `contents` (
  `id` int(11) NOT NULL,
  `section_id` int(11) NOT NULL,
  `lesson` varchar(250) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `month` date NOT NULL,
  `week` varchar(50) NOT NULL,
  `due_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contents`
--

INSERT INTO `contents` (`id`, `section_id`, `lesson`, `month`, `week`, `due_date`, `created_at`, `updated_at`) VALUES
(52, 50, 'الدرس الاول', '2023-11-03', '', '2023-11-03 11:47:21', '2023-11-03 11:47:21', '2023-11-03 11:47:21'),
(53, 51, 'الدرس الثالث', '2023-11-03', '', '2023-11-03 18:24:48', '2023-11-03 18:24:48', '2023-11-03 18:24:48'),
(54, 50, 'asdasd', '2023-11-03', '', '2023-11-03 18:27:28', '2023-11-03 18:27:28', '2023-11-03 18:27:28'),
(55, 51, 'الدرس الاول', '2023-11-03', '', '2023-11-03 18:27:36', '2023-11-03 18:27:36', '2023-11-03 18:27:36'),
(56, 54, 'asdasd', '2023-11-03', '', '2023-11-03 19:34:56', '2023-11-03 19:34:56', '2023-11-03 19:34:56'),
(57, 56, 'الدرس الثاني', '2023-11-03', '', '2023-11-03 19:41:53', '2023-11-03 19:41:53', '2023-11-03 19:41:53'),
(58, 56, 'الدرس الخامس', '2023-11-03', '', '2023-11-03 19:41:57', '2023-11-03 19:41:57', '2023-11-03 19:41:57'),
(59, 56, 'asdasd', '2023-11-03', '', '2023-11-03 19:42:01', '2023-11-03 19:42:01', '2023-11-03 19:42:01'),
(62, 64, 'First Lesson', '2023-10-30', '6', '2023-12-03 22:00:00', '2023-11-03 20:22:02', '2023-11-03 20:22:02'),
(66, 70, 'الدرس الاول', '2023-11-04', '', '2023-11-04 07:34:27', '2023-11-04 07:34:27', '2023-11-04 07:34:27'),
(67, 72, 'الدرس الاول', '2023-11-04', '', '2023-11-04 07:38:39', '2023-11-04 07:38:39', '2023-11-04 07:38:39'),
(68, 73, 'الدرس الاول', '2023-11-04', '', '2023-11-04 07:41:52', '2023-11-04 07:41:52', '2023-11-04 07:41:52'),
(69, 74, 'الدرس الثالث', '2023-11-04', '', '2023-11-04 07:48:54', '2023-11-04 07:48:54', '2023-11-04 07:48:54'),
(70, 75, 'الدرس الثالث', '2023-11-04', '', '2023-11-04 07:52:27', '2023-11-04 07:52:27', '2023-11-04 07:52:27'),
(71, 64, 'الدرس الرابع', '2023-11-04', '', '2023-11-04 08:27:15', '2023-11-04 08:27:15', '2023-11-04 08:27:15'),
(72, 76, 'الدرس الرابعziad', '2023-11-04', '6', '2023-10-31 22:00:00', '2023-11-04 08:46:27', '2023-11-04 08:46:27');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `datta`
--

CREATE TABLE `datta` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `follow`
--

CREATE TABLE `follow` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `country` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `salary` double NOT NULL,
  `free_target` double DEFAULT NULL,
  `free_above` int(11) DEFAULT NULL,
  `free_bonus` double DEFAULT NULL,
  `sales` double DEFAULT NULL,
  `paid_target` double DEFAULT NULL,
  `above_1` int(11) DEFAULT NULL,
  `bonus_1` double DEFAULT NULL,
  `above_2` int(11) DEFAULT NULL,
  `bonus_2` double DEFAULT NULL,
  `follow_leader_id` int(11) DEFAULT NULL,
  `follow_position` enum('follow_up','leader') NOT NULL DEFAULT 'follow_up'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `follow`
--

INSERT INTO `follow` (`id`, `user_id`, `country`, `city`, `salary`, `free_target`, `free_above`, `free_bonus`, `sales`, `paid_target`, `above_1`, `bonus_1`, `above_2`, `bonus_2`, `follow_leader_id`, `follow_position`) VALUES
(8, 1, '61', '8', 222, 22, 2, 22, 22, 33, 34, 23, 33, 33, NULL, 'leader'),
(9, 3, '61', '8', 1222, 4343, 234, 33, 12, 33, 4, 23, 33, 33, 8, 'follow_up'),
(11, 4, '61', '9', 1222, 4343, 234, 33, 33, 234, 4, 23, 4, 234, 8, 'follow_up'),
(12, 9, '61', '8', 2222, 22, 22, 223, 23, 23, 23, 23, 32, 23, NULL, 'follow_up'),
(13, 17, '1', '25', 1222, 312141, 341341341, 341341341, 34134313, 4314134, 134134, 41341, 141413, 4134, NULL, 'follow_up'),
(16, 62, '1', '2', 12, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, 'follow_up');

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `id` int(11) NOT NULL,
  `country_name` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`id`, `country_name`, `created_at`, `updated_at`) VALUES
(1, 'Egypt', '2023-12-31 14:38:36', '2023-12-31 14:38:36');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_02_04_000000_create_country_state_city_table', 1),
(2, '2014_10_12_000000_create_users_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2023_12_22_181646_create_datta_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `created_at`, `updated_at`) VALUES
(167, 'App\\Models\\User', 15, 'personal access tokens', 'aac95db29b362ead280cc6afd08f0da87b2f5d511e8b714c3020128d59851a63', '[\"*\"]', '2024-01-27 06:34:58', '2024-01-27 06:29:42', '2024-01-27 06:34:58'),
(175, 'App\\Models\\User', 13, 'personal access tokens', 'd73d3a8d239e9ee0b820db5840effeba884608f6e9e6029a6cfa5d32fbb467b2', '[\"*\"]', '2024-01-27 07:30:27', '2024-01-27 07:26:07', '2024-01-27 07:30:27'),
(397, 'App\\Models\\User', 14, 'personal access tokens', '0fa58a58b1af669bdb2d787123b0f1324f6eba9a643171df3828d80562f38f9e', '[\"*\"]', '2024-02-05 07:34:15', '2024-02-05 07:30:49', '2024-02-05 07:34:15'),
(400, 'App\\Models\\User', 14, 'personal access tokens', '936245c6eaeb4c0308ac29192c701dbe911e0d6304450a611af8d6e6b11ce86f', '[\"*\"]', '2024-02-05 07:37:29', '2024-02-05 07:37:11', '2024-02-05 07:37:29'),
(401, 'App\\Models\\User', 14, 'personal access tokens', 'a601f9d1d68a6d21caadc58bf92ef9a0a571b569f2bf602702588494a3242234', '[\"*\"]', '2024-02-05 07:46:48', '2024-02-05 07:45:03', '2024-02-05 07:46:48'),
(402, 'App\\Models\\User', 14, 'personal access tokens', '102b92ea1375ad856a6072b1abf2df09028c41d548cf2ddc9ea5a904f1c47000', '[\"*\"]', '2024-02-05 07:57:33', '2024-02-05 07:56:29', '2024-02-05 07:57:33'),
(403, 'App\\Models\\User', 14, 'personal access tokens', 'a9343d8f609d447033457a645c967ac75586a3570a7d81220bc0b12d7a74e5b7', '[\"*\"]', '2024-02-05 07:58:41', '2024-02-05 07:58:07', '2024-02-05 07:58:41'),
(404, 'App\\Models\\User', 14, 'personal access tokens', '0d37a84d4c015422ffab92f09788818508281cc2c98cb27cc4811defe841daf2', '[\"*\"]', NULL, '2024-02-05 07:58:07', '2024-02-05 07:58:07'),
(405, 'App\\Models\\User', 14, 'personal access tokens', '6e39b469bf7b5e1d9659ace361f9a9c50d62880f01313eab2eea5f45bce38e04', '[\"*\"]', '2024-02-05 08:05:45', '2024-02-05 08:04:20', '2024-02-05 08:05:45'),
(406, 'App\\Models\\User', 14, 'personal access tokens', '6a957f85cbfa2121618b3faaa072f87267612e198bcc58153ec1faf5a592da2a', '[\"*\"]', '2024-02-05 10:41:51', '2024-02-05 08:15:52', '2024-02-05 10:41:51'),
(410, 'App\\Models\\User', 14, 'personal access tokens', '1719bb80a5e705214b2db2b39a0919c837f41f3f9e3b467c15f233abefebacb9', '[\"*\"]', '2024-02-05 10:51:21', '2024-02-05 10:51:20', '2024-02-05 10:51:21'),
(411, 'App\\Models\\User', 14, 'personal access tokens', '6f2dbe8a2c0afda042c6228e3c690d516abc34f8b0c36db4449d9c9a4383e3a1', '[\"*\"]', '2024-02-05 11:00:29', '2024-02-05 10:53:10', '2024-02-05 11:00:29'),
(412, 'App\\Models\\User', 14, 'personal access tokens', '133bf26f0c356a8f3083d48ba2e51509cf1ac745bbe0baae2891ca79ba93d011', '[\"*\"]', '2024-02-05 11:10:35', '2024-02-05 11:02:43', '2024-02-05 11:10:35'),
(413, 'App\\Models\\User', 14, 'personal access tokens', '2b55fc47e8f5abcc36cbc866d2542c0e84307b2650c227c34a2f0a755e34d76a', '[\"*\"]', NULL, '2024-02-06 05:55:53', '2024-02-06 05:55:53'),
(414, 'App\\Models\\User', 14, 'personal access tokens', 'd6d8cff320e2ea393084394535c343b4d01ab4dbee2d0240ad9d64b9edfdcd1f', '[\"*\"]', '2024-02-06 05:56:38', '2024-02-06 05:55:53', '2024-02-06 05:56:38'),
(417, 'App\\Models\\User', 14, 'personal access tokens', '998e27df4d54fd8fd2efb8f505a643be8a6c4926a27aff5268ebf0bc095eedc4', '[\"*\"]', '2024-02-06 06:39:57', '2024-02-06 06:24:26', '2024-02-06 06:39:57'),
(420, 'App\\Models\\User', 14, 'personal access tokens', 'dd965571e6400fe191718a9bfb999ded43816473cfafc3765fa1b3710cc2bd9e', '[\"*\"]', '2024-02-06 06:40:45', '2024-02-06 06:40:23', '2024-02-06 06:40:45'),
(422, 'App\\Models\\User', 14, 'personal access tokens', 'da5f1b2d1851b9170b6ed95d773e75b32972eff832ffe3b5fb7f1d52c0fa7c5a', '[\"*\"]', '2024-02-06 06:56:15', '2024-02-06 06:51:56', '2024-02-06 06:56:15'),
(425, 'App\\Models\\User', 14, 'personal access tokens', 'd0aaf39da819537fad5b73c5910fb2fa6b78ad319244cbac0a2332efe63fc587', '[\"*\"]', '2024-02-06 07:09:33', '2024-02-06 06:56:31', '2024-02-06 07:09:33'),
(427, 'App\\Models\\User', 14, 'personal access tokens', 'c1a33702f47d2ab2806bf8d7d7a9d7cf996a3076a2879eab7b6f44ad4b4ad2f8', '[\"*\"]', '2024-02-06 07:18:29', '2024-02-06 07:17:25', '2024-02-06 07:18:29'),
(428, 'App\\Models\\User', 14, 'personal access tokens', '5ad4e96370bc67f13446791c594086567237e9f487268a77510f6d123533da5b', '[\"*\"]', '2024-02-06 07:21:31', '2024-02-06 07:21:27', '2024-02-06 07:21:31'),
(429, 'App\\Models\\User', 14, 'personal access tokens', 'a3fccdfc08c2f47976dc657b096393738d7321863bb2b20779c673eaa32c78a9', '[\"*\"]', '2024-02-06 07:46:23', '2024-02-06 07:22:20', '2024-02-06 07:46:23'),
(434, 'App\\Models\\User', 14, 'personal access tokens', 'bef7bfb1d3203020e87cf5b6ba595263d9bb0e7a9bea63c1b3a552ac510e1707', '[\"*\"]', '2024-02-07 06:10:30', '2024-02-07 06:10:28', '2024-02-07 06:10:30'),
(437, 'App\\Models\\User', 14, 'personal access tokens', 'f534733adf9c3515df0fffd261f685b4b07d88f71ee610ae28dacdd4d88ea73b', '[\"*\"]', '2024-02-07 06:28:51', '2024-02-07 06:28:07', '2024-02-07 06:28:51'),
(438, 'App\\Models\\User', 14, 'personal access tokens', 'ddf274027739f49a6711f36585b1e3b85b4ff9d763427317b2e9532681b140fb', '[\"*\"]', '2024-02-07 06:31:46', '2024-02-07 06:30:00', '2024-02-07 06:31:46'),
(439, 'App\\Models\\User', 14, 'personal access tokens', '7b7c66c91719554bf769a3c501f71771f13f77b6bf03340eed28dce4e7a6d696', '[\"*\"]', '2024-02-07 06:32:16', '2024-02-07 06:32:16', '2024-02-07 06:32:16'),
(440, 'App\\Models\\User', 14, 'personal access tokens', '5546d206e151f38208d1bbf3c1f14896c88d592adfbb03242d03ab7d18e0072b', '[\"*\"]', '2024-02-07 06:32:31', '2024-02-07 06:32:16', '2024-02-07 06:32:31'),
(441, 'App\\Models\\User', 14, 'personal access tokens', '2a595021a0153bd0441e8ebd88a41675d8229f732bb823375c12999c167ba7c3', '[\"*\"]', '2024-02-07 06:37:10', '2024-02-07 06:37:09', '2024-02-07 06:37:10'),
(442, 'App\\Models\\User', 14, 'personal access tokens', '381d456eb2c4f8a5655f3b9aa773b4d304b1df1052146e8f855e8fd958d87030', '[\"*\"]', '2024-02-07 06:43:29', '2024-02-07 06:43:29', '2024-02-07 06:43:29'),
(443, 'App\\Models\\User', 14, 'personal access tokens', '12cf55dcbfd76d3c973579a0709247d0ce46241dc35ace60bfeb65b5efab9902', '[\"*\"]', '2024-02-07 06:44:43', '2024-02-07 06:44:42', '2024-02-07 06:44:43'),
(444, 'App\\Models\\User', 14, 'personal access tokens', '79b9de9cd969d1d8a1ff6a0ec1528e8cf5895aa1443524406adbfcbed1db2573', '[\"*\"]', '2024-02-07 06:46:33', '2024-02-07 06:46:32', '2024-02-07 06:46:33'),
(445, 'App\\Models\\User', 14, 'personal access tokens', 'bf07357a6ac8faeb71341feeb4c2375297542d3a9a535e3afd84760c7dfb445b', '[\"*\"]', '2024-02-07 06:55:18', '2024-02-07 06:53:51', '2024-02-07 06:55:18'),
(447, 'App\\Models\\User', 14, 'personal access tokens', '74428c2cd69338761f25d408cc8d1f10b97d5833b0880ab0d1821887b4289ebe', '[\"*\"]', '2024-02-07 06:59:09', '2024-02-07 06:58:54', '2024-02-07 06:59:09'),
(448, 'App\\Models\\User', 14, 'personal access tokens', '158d0d203bf1a6df690a2298fe7de8909508845680d018be85ac90e394003d31', '[\"*\"]', '2024-02-07 07:00:25', '2024-02-07 07:00:25', '2024-02-07 07:00:25'),
(449, 'App\\Models\\User', 14, 'personal access tokens', '9f25e3a83b471ac4993628f0e1512b68224d280fd5cb6284c41593eac0968065', '[\"*\"]', '2024-02-07 07:02:03', '2024-02-07 07:02:02', '2024-02-07 07:02:03'),
(450, 'App\\Models\\User', 14, 'personal access tokens', 'a2d5d9bce66b142c9316a5d4333c0455436271dcc5e9497207dc868439b005c7', '[\"*\"]', '2024-02-07 07:06:01', '2024-02-07 07:06:01', '2024-02-07 07:06:01'),
(451, 'App\\Models\\User', 14, 'personal access tokens', '812dea6291ba3fa218f87a16326ae72af301057c0dae3db4098e95ec7ff0b153', '[\"*\"]', '2024-02-07 07:06:38', '2024-02-07 07:06:37', '2024-02-07 07:06:38'),
(452, 'App\\Models\\User', 14, 'personal access tokens', 'e2150d8f0a0d937a27b09d0b8af5a9ef02b88e7e3956c918386d2ec20f75b7c4', '[\"*\"]', '2024-02-07 07:12:36', '2024-02-07 07:12:36', '2024-02-07 07:12:36'),
(453, 'App\\Models\\User', 14, 'personal access tokens', '0d7b078f4a765324949166bc19bdc157f5e71de7921ad7e373abde1b771190a0', '[\"*\"]', '2024-02-07 07:20:13', '2024-02-07 07:15:29', '2024-02-07 07:20:13'),
(455, 'App\\Models\\User', 14, 'personal access tokens', 'ad9ed773abd83b5c87da192cb8f6153a1ea1044716a6812999408d6e3158a7c4', '[\"*\"]', '2024-02-07 07:22:16', '2024-02-07 07:22:13', '2024-02-07 07:22:16'),
(456, 'App\\Models\\User', 14, 'personal access tokens', 'a353365f9915ff044325d459d6639927bdb5ce2f781db10c2e7c93fc855a487a', '[\"*\"]', '2024-02-07 07:59:39', '2024-02-07 07:40:05', '2024-02-07 07:59:39'),
(460, 'App\\Models\\User', 11, 'personal access tokens', 'd4ff52a1e4f9f1fa386ed018e3c67d223a48c4ac5816cb301f1b25923099498e', '[\"*\"]', '2024-02-07 07:54:39', '2024-02-07 07:54:17', '2024-02-07 07:54:39'),
(461, 'App\\Models\\User', 11, 'personal access tokens', '3d575cf2f304cdae91a2a05cda9745f5cdb06d484d6aa9addb8fc263f76dfed1', '[\"*\"]', '2024-02-07 11:10:54', '2024-02-07 08:04:20', '2024-02-07 11:10:54'),
(462, 'App\\Models\\User', 14, 'personal access tokens', '4212b2a3dfe8100235a8ed3f1f81a79365364430414672e262492e84bae20080', '[\"*\"]', '2024-02-07 08:07:14', '2024-02-07 08:05:18', '2024-02-07 08:07:14'),
(463, 'App\\Models\\User', 14, 'personal access tokens', 'c9a0deac90f880417f1195eafc56a97c1fede149f39f3edd408c9efc35d1dde2', '[\"*\"]', '2024-02-07 08:09:05', '2024-02-07 08:08:26', '2024-02-07 08:09:05'),
(464, 'App\\Models\\User', 11, 'personal access tokens', '72912892f6252e920904639c7d50dbc83f7e673e32b3b7baae7c7c95ea71e423', '[\"*\"]', '2024-02-07 08:16:18', '2024-02-07 08:15:16', '2024-02-07 08:16:18'),
(465, 'App\\Models\\User', 14, 'personal access tokens', '82b1680f25a063fa1e231ae4507c729adb3272bbb8a439fd71e0903d4eb37347', '[\"*\"]', '2024-02-07 09:48:57', '2024-02-07 09:37:45', '2024-02-07 09:48:57'),
(466, 'App\\Models\\User', 14, 'personal access tokens', 'd7b08d022e0168ce70ac22095adfe67df1e6bd7140b67928c783df180e0a006e', '[\"*\"]', '2024-02-07 09:56:03', '2024-02-07 09:56:01', '2024-02-07 09:56:03'),
(467, 'App\\Models\\User', 14, 'personal access tokens', 'b74d7d0d522b072c8af4f91067c0feed76523aa13af19af00f3b0d0dee7841e6', '[\"*\"]', '2024-02-07 09:57:15', '2024-02-07 09:57:13', '2024-02-07 09:57:15'),
(468, 'App\\Models\\User', 14, 'personal access tokens', 'a4556a4c5c4aa740e0c490b1228c8a9512ff806f1933637e34f33c167d53bc0a', '[\"*\"]', '2024-02-07 10:08:29', '2024-02-07 10:06:09', '2024-02-07 10:08:29'),
(469, 'App\\Models\\User', 11, 'personal access tokens', '5ea5e96a665d6edfb93e9d58fd09b997e244700fe2d542d6df38750d72553d6f', '[\"*\"]', '2024-02-07 10:19:39', '2024-02-07 10:14:52', '2024-02-07 10:19:39'),
(470, 'App\\Models\\User', 14, 'personal access tokens', '8e040abed6d67f86e522ab80aafd6ba8b7a31a7bc52f1cf0e966ff73482d4e2c', '[\"*\"]', '2024-02-07 10:17:01', '2024-02-07 10:15:57', '2024-02-07 10:17:01'),
(471, 'App\\Models\\User', 14, 'personal access tokens', 'f15f697ebade934896fed30bfec5def0b4e38876b48931dfda36c7338b1f84fd', '[\"*\"]', '2024-02-07 10:19:36', '2024-02-07 10:19:29', '2024-02-07 10:19:36'),
(472, 'App\\Models\\User', 14, 'personal access tokens', '8fa5b91f351131d7df068fcd523b8db47bc2643df2aa55ff5303c6646d87f3ff', '[\"*\"]', '2024-02-07 10:21:31', '2024-02-07 10:21:19', '2024-02-07 10:21:31'),
(473, 'App\\Models\\User', 11, 'personal access tokens', 'b71178d81556d555cc5c5084e16b80232267aaaa96615fadebbd55dbaa638885', '[\"*\"]', '2024-02-07 10:24:52', '2024-02-07 10:21:36', '2024-02-07 10:24:52'),
(474, 'App\\Models\\User', 14, 'personal access tokens', '879e8d9aeaae1dbc58e70750a2acda524dca2ce8567d79852a11a8f7a3029298', '[\"*\"]', '2024-02-07 10:29:59', '2024-02-07 10:29:15', '2024-02-07 10:29:59'),
(475, 'App\\Models\\User', 14, 'personal access tokens', '05c6a7a37d828e23437af4444d56f252b66e1f1312f7834ed1fbf1aecb2f6bf1', '[\"*\"]', '2024-02-07 10:31:16', '2024-02-07 10:30:37', '2024-02-07 10:31:16'),
(476, 'App\\Models\\User', 14, 'personal access tokens', '753351adb58a609f4b5e24b28a9548591c88da22d8a47d191a73fc76d8ce6f7c', '[\"*\"]', '2024-02-07 10:31:43', '2024-02-07 10:31:41', '2024-02-07 10:31:43'),
(477, 'App\\Models\\User', 14, 'personal access tokens', '8db59e2a91b7f67c74838d14f63b23ac51975709467673f114564ea2b048f192', '[\"*\"]', '2024-02-07 10:36:33', '2024-02-07 10:34:29', '2024-02-07 10:36:33'),
(478, 'App\\Models\\User', 14, 'personal access tokens', 'b27c2234e75980d76db59299bb32748de55adcc72076358d6b7213d3ce8cc401', '[\"*\"]', '2024-02-07 10:36:59', '2024-02-07 10:36:57', '2024-02-07 10:36:59'),
(479, 'App\\Models\\User', 14, 'personal access tokens', '64961011b6890034c73ea08a184ed9536f8658c63a7d10694efca111aa23cde9', '[\"*\"]', '2024-02-07 11:05:59', '2024-02-07 10:38:27', '2024-02-07 11:05:59'),
(480, 'App\\Models\\User', 11, 'personal access tokens', '441e9cb3e2be0ff74b44bb60282973d06e975da9726fd7e18f8f1575a6fcc047', '[\"*\"]', '2024-02-07 11:06:52', '2024-02-07 11:04:32', '2024-02-07 11:06:52'),
(481, 'App\\Models\\User', 14, 'personal access tokens', 'a9b127e973f10d6afc367c82fd195e98fd638e336eea0a4d3ca65f9c088d59dc', '[\"*\"]', '2024-02-07 11:09:51', '2024-02-07 11:09:48', '2024-02-07 11:09:51'),
(482, 'App\\Models\\User', 14, 'personal access tokens', 'c4063d2de75c097883851f42cc9b12fb6637e40bb3dee267f1bbd128437b6696', '[\"*\"]', '2024-02-07 11:12:49', '2024-02-07 11:12:47', '2024-02-07 11:12:49'),
(483, 'App\\Models\\User', 14, 'personal access tokens', '1b4d09e0134d94b22f1cbb9e8d0d3c2f7d0fb658b5044426f3eebcb9a15815a2', '[\"*\"]', '2024-02-07 11:18:49', '2024-02-07 11:15:14', '2024-02-07 11:18:49'),
(484, 'App\\Models\\User', 11, 'personal access tokens', 'e361393c01529a3774fa7ffd15e66a619b11c4d893a4d86c91ea0947de94d7c4', '[\"*\"]', '2024-02-07 11:16:56', '2024-02-07 11:16:01', '2024-02-07 11:16:56'),
(485, 'App\\Models\\User', 11, 'personal access tokens', '718bfb467b2a6f60e28dba62532be6873bdfc46dda93726ea2a96ee72bc3fa06', '[\"*\"]', '2024-02-07 12:48:30', '2024-02-07 11:18:32', '2024-02-07 12:48:30'),
(486, 'App\\Models\\User', 14, 'personal access tokens', '11889d6274584814e01790d4e374f8d8e4fa97f0ae9c72a3c1d8388a838bceb8', '[\"*\"]', '2024-02-07 11:21:26', '2024-02-07 11:19:45', '2024-02-07 11:21:26'),
(487, 'App\\Models\\User', 11, 'personal access tokens', '8d9bd410c7130bff485270dca519471678b52728fc511fcba506690e93bbbcc5', '[\"*\"]', NULL, '2024-02-08 08:49:10', '2024-02-08 08:49:10');

-- --------------------------------------------------------

--
-- Table structure for table `proccessing_duration`
--

CREATE TABLE `proccessing_duration` (
  `id` int(11) NOT NULL,
  `progress_date` date DEFAULT NULL,
  `progress_duration` varchar(255) DEFAULT NULL,
  `done_date` date DEFAULT NULL,
  `done_duration` varchar(255) DEFAULT NULL,
  `video_freelancer` tinyint(1) DEFAULT NULL,
  `lesson_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `teacher_id` int(11) DEFAULT NULL,
  `material` enum('material','voice','powerpoint','video edit','video final','compress','upload','assign') DEFAULT NULL,
  `m_Type` varchar(255) DEFAULT NULL,
  `slides` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `proccessing_duration`
--

INSERT INTO `proccessing_duration` (`id`, `progress_date`, `progress_duration`, `done_date`, `done_duration`, `video_freelancer`, `lesson_id`, `user_id`, `teacher_id`, `material`, `m_Type`, `slides`) VALUES
(37, '2222-02-22', NULL, '2023-11-08', NULL, NULL, 54, 2, NULL, 'material', NULL, NULL),
(39, NULL, '0', NULL, NULL, NULL, 68, NULL, NULL, 'video edit', NULL, NULL),
(47, NULL, NULL, NULL, NULL, NULL, 68, NULL, NULL, 'upload', 'PDF', 12),
(54, '2222-02-22', NULL, '1111-11-11', NULL, NULL, 68, 9, NULL, 'material', 'PDF', NULL),
(71, '2222-02-22', NULL, NULL, '3 dayes', NULL, 68, 2, NULL, 'voice', NULL, NULL),
(72, '2023-11-20', NULL, '2023-11-09', NULL, NULL, 68, 2, NULL, 'powerpoint', NULL, 3),
(73, '2023-12-04', NULL, '2023-12-04', NULL, NULL, 71, 9, NULL, NULL, NULL, NULL),
(74, '2024-01-11', NULL, '2024-01-15', NULL, NULL, 57, 1, NULL, 'material', 'PDF', NULL),
(75, '2024-01-17', NULL, '2024-01-09', '6 dayes', NULL, 57, 1, NULL, 'voice', NULL, NULL),
(76, '2024-01-11', NULL, '2024-01-10', NULL, NULL, 57, 12, NULL, 'material', 'PDF', NULL),
(77, '2024-01-11', NULL, '2024-01-09', '7 dayes', NULL, 57, 12, NULL, 'voice', NULL, NULL),
(78, '2024-01-12', NULL, '2024-01-16', NULL, NULL, 57, 14, NULL, 'material', 'PDF', NULL),
(79, '2024-01-25', NULL, '2024-01-17', '7 dayes', NULL, 57, 14, NULL, 'voice', NULL, NULL),
(87, '2024-01-16', NULL, '2024-01-09', NULL, NULL, 71, 14, NULL, 'material', 'Editor', NULL),
(88, '2024-01-11', NULL, '2024-01-18', 'null', NULL, 71, 14, NULL, 'voice', NULL, NULL),
(89, '2024-02-21', NULL, '2024-02-13', NULL, NULL, 57, 11, NULL, 'material', 'Power Point', NULL),
(90, '2024-02-14', NULL, NULL, NULL, NULL, 57, 11, NULL, 'voice', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE `sections` (
  `id` int(11) NOT NULL,
  `section` varchar(150) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`id`, `section`, `subject_id`, `created_at`, `updated_at`) VALUES
(50, 'الوحدة الثالثة', 7, '2023-11-03 17:38:30', '2023-11-03 19:38:30'),
(56, 'الثاني', 6, '2023-11-03 17:41:41', '2023-11-03 17:42:13'),
(57, 'الوحدة الثالثة', 6, '2023-11-03 17:53:17', '2023-11-03 19:53:17'),
(63, 'الثاني', 2, '2023-11-03 18:21:34', '2023-11-03 18:23:32'),
(64, 'الوحدة الاولي', 2, '2023-11-03 18:21:56', '2023-11-03 20:21:56'),
(66, 'الوحدة الاولي', 3, '2023-11-04 05:10:30', '2023-11-04 07:10:30'),
(73, 'الوحدة الاولي', 1, '2023-11-04 05:41:44', '2023-11-04 07:41:44'),
(74, 'الوحدة الثالثة', 5, '2023-11-04 05:48:47', '2023-11-04 07:48:47'),
(75, 'الوحدة الثالثة', 5, '2023-11-04 05:50:56', '2023-11-04 05:51:03');

-- --------------------------------------------------------

--
-- Table structure for table `sign_up`
--

CREATE TABLE `sign_up` (
  `id` int(11) NOT NULL,
  `type` enum('Free','Paid') NOT NULL,
  `country_id` int(11) NOT NULL,
  `city_id` int(11) NOT NULL,
  `purchase_date` date NOT NULL,
  `category_id` int(11) NOT NULL,
  `bundle_id` int(11) DEFAULT NULL,
  `subject_id` int(11) DEFAULT NULL,
  `follow_id` int(11) NOT NULL,
  `status` enum('approve','reject','waiting') NOT NULL DEFAULT 'waiting',
  `reject_reasons` text DEFAULT NULL,
  `status_date` date DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `studentPhone` varchar(20) NOT NULL,
  `parentPhone` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `sign_up`
--

INSERT INTO `sign_up` (`id`, `type`, `country_id`, `city_id`, `purchase_date`, `category_id`, `bundle_id`, `subject_id`, `follow_id`, `status`, `reject_reasons`, `status_date`, `username`, `email`, `studentPhone`, `parentPhone`) VALUES
(1, 'Paid', 4, 2, '2023-10-29', 2, 3, 4, 14, 'approve', NULL, '2023-12-31', 'Ziad', 'ziad@gmail.com', '13134134', '14134134'),
(2, 'Paid', 4, 2, '2023-10-29', 2, 3, 4, 14, 'reject', 'cause i need this', '2023-12-31', 'Ziad', 'ziad@gmail.com', '13134134', '14134134'),
(3, 'Paid', 4, 2, '2023-10-29', 2, 3, 4, 14, 'reject', NULL, '2024-05-23', 'Ziad', 'ziad@gmail.com', '13134134', '14134134'),
(4, 'Paid', 4, 2, '2023-10-29', 2, 3, 4, 14, 'reject', NULL, '2024-05-23', 'Ziad', 'ziad@gmail.com', '13134134', '14134134'),
(5, 'Paid', 4, 2, '2023-12-31', 2, 3, 4, 14, 'reject', NULL, '2024-05-23', 'Ziad', 'ziad@gmail.com', '13134134', '14134134'),
(6, 'Paid', 1, 2, '2001-03-03', 4, 28, NULL, 17, 'reject', NULL, '2024-05-23', 'ziadm57@yahoo.com', 'zoz@yahoo.com', '01099475854', '2342345'),
(7, 'Paid', 1, 8, '2024-01-02', 5, 21, 6, 17, 'approve', NULL, NULL, 'student2@yahoo.com', 'ziadm57@yahoo.com', '01099475854', '01099475854'),
(8, 'Paid', 2, 2, '2024-01-27', 1, 4, 2, 15, 'reject', NULL, '2024-05-23', 'joo', 'joo@student.com', '0101258746', '4'),
(9, 'Paid', 1, 2, '2024-01-17', 4, 21, 5, 17, 'approve', NULL, NULL, 'ahmed', 'moaz@yahoo.com', '01099475854', '01099475854'),
(10, 'Paid', 1, 2, '2024-01-11', 4, 23, 3, 17, 'approve', NULL, NULL, 'ahmed', 'ziadm57@yahoo.com', '01099475854', '01099475854');

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `country_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `price` varchar(50) NOT NULL,
  `category_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `name`, `price`, `category_id`, `created_at`, `updated_at`) VALUES
(1, 'عربي', '200', 4, '2023-10-29 12:17:19', '2023-10-29 12:17:19'),
(3, 'math', '350', 4, '2023-10-30 07:26:30', '2023-10-30 07:26:30'),
(7, 'English', '250', 5, '2023-11-02 19:57:49', '2023-11-02 19:57:49'),
(24, 'رياضة', '220', 4, '2024-02-08 10:45:07', '2024-02-08 10:45:07'),
(25, 'English', '220', 4, '2024-02-08 10:45:30', '2024-02-08 10:45:30'),
(26, 'عربي', '220', 5, '2024-02-08 10:46:34', '2024-02-08 10:46:34'),
(27, 'math', '220', 5, '2024-02-08 10:46:59', '2024-02-08 10:46:59'),
(28, 'رياضة', '220', 5, '2024-02-08 10:47:19', '2024-02-08 10:47:19'),
(29, 'عربي', '220', 6, '2024-02-08 10:47:46', '2024-02-08 10:47:46'),
(30, 'math', '220', 6, '2024-02-08 10:48:10', '2024-02-08 10:48:10'),
(31, 'English', '220', 6, '2024-02-08 10:48:30', '2024-02-08 10:48:30'),
(32, 'رياضة', '220', 6, '2024-02-08 10:48:48', '2024-02-08 10:48:48'),
(33, 'عربي', '220', 7, '2024-02-08 10:49:19', '2024-02-08 10:49:19'),
(34, 'math', '220', 7, '2024-02-08 10:49:49', '2024-02-08 10:49:49'),
(35, 'رياضة', '220', 7, '2024-02-08 10:50:08', '2024-02-08 10:50:08'),
(36, 'science', '220', 7, '2024-02-08 10:50:41', '2024-02-08 10:50:41'),
(37, 'علوم', '220', 7, '2024-02-08 10:51:02', '2024-02-08 10:51:02'),
(38, 'English', '220', 7, '2024-02-08 10:51:41', '2024-02-08 10:51:41'),
(39, 'دراسات', '220', 7, '2024-02-08 10:52:07', '2024-02-08 10:52:07'),
(40, 'عربي', '220', 8, '2024-02-08 10:52:49', '2024-02-08 10:52:49'),
(41, 'math', '220', 8, '2024-02-08 10:53:17', '2024-02-08 10:53:17'),
(42, 'رياضة', '220', 8, '2024-02-08 10:53:45', '2024-02-08 10:53:45'),
(43, 'science', '220', 8, '2024-02-08 10:54:06', '2024-02-08 10:54:06'),
(44, 'علوم', '220', 8, '2024-02-08 10:54:24', '2024-02-08 10:54:24'),
(45, 'English', '220', 8, '2024-02-08 10:54:41', '2024-02-08 10:54:41'),
(46, 'دراسات', '220', 8, '2024-02-08 10:54:59', '2024-02-08 10:54:59'),
(47, 'عربي', '220', 9, '2024-02-08 10:55:32', '2024-02-08 10:55:32'),
(48, 'math', '220', 9, '2024-02-08 10:55:56', '2024-02-08 10:55:56'),
(49, 'رياضة', '220', 9, '2024-02-08 10:56:16', '2024-02-08 10:56:16'),
(50, 'science', '220', 9, '2024-02-08 10:56:37', '2024-02-08 10:56:37'),
(51, 'علوم', '220', 9, '2024-02-08 10:56:59', '2024-02-08 10:56:59'),
(52, 'English', '220', 9, '2024-02-08 10:58:42', '2024-02-08 10:58:42'),
(53, 'دراسات', '220', 9, '2024-02-08 10:59:01', '2024-02-08 10:59:01');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `ID` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `phone` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `sales` double NOT NULL,
  `images` varchar(255) NOT NULL DEFAULT 'default.png',
  `year` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`ID`, `name`, `phone`, `email`, `password`, `sales`, `images`, `year`) VALUES
(1, 'programmer', '01099475854', 'ziadm57@yahoo.com', '0101257469', 0, '9142023X11X13X07X22X56images.jpg', '11'),
(54, 'programmer', '01099475854', 'ziadm57@yahoo.com', '0101257546', 0, '2482023X11X13X08X51X58ScreenshotX2023X11X06X200856.png', '11');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_subjects`
--

CREATE TABLE `teacher_subjects` (
  `id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teacher_subjects`
--

INSERT INTO `teacher_subjects` (`id`, `subject_id`, `teacher_id`, `category_id`, `created_at`) VALUES
(1019, 2, 53, 2, '2023-11-12'),
(1020, 3, 53, 2, '2023-11-12'),
(1021, 7, 53, 2, '2023-11-12'),
(1022, 2, 54, 2, '2023-11-12'),
(1023, 3, 54, 2, '2023-11-12'),
(1024, 8, 54, 2, '2023-11-12'),
(1025, 7, 10, 2, '2023-12-28'),
(1037, 3, 13, 1, '2023-12-28'),
(1038, 5, 13, 1, '2023-12-28'),
(1039, 6, 13, 1, '2023-12-28'),
(1040, 8, 13, 1, '2023-12-28'),
(1041, 10, 13, 1, '2023-12-28'),
(1049, 1, 15, 1, '2023-12-28'),
(1050, 2, 15, 1, '2023-12-28'),
(1051, 3, 16, 1, '2023-12-28'),
(1052, 5, 16, 1, '2023-12-28'),
(1053, 6, 16, 1, '2023-12-28');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `amount` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `parent_phone` varchar(255) NOT NULL,
  `identity` varchar(255) NOT NULL,
  `position` enum('admin','powerpoint','teacher','student','video editor','video editor leader','user','follow_up') NOT NULL,
  `sales` varchar(255) NOT NULL,
  `sales_id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `phone`, `parent_phone`, `identity`, `position`, `sales`, `sales_id`, `image`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(15, 'programmer', '01099475854', '', '', 'follow_up', '23', 0, 'default.png', 'data2@yahoo.com', '$2y$10$88jzXjsglJgxQhfmlY8NDOSI5Hv7idU/M2kAzw8TM.LqROFlTOctO', NULL, NULL, NULL),
(23, 'programmer', '01099475854', '', '23141342', '', '', 0, '', 'zozzaaaa@yahoo.com', '$2y$10$rkCDUNTl4DZCMggne96Y8e/Wf6mKtTE1Xnen3xCPzFW/sKlajjKFe', NULL, NULL, NULL),
(25, 'programmer', '01099475854', '', '23141342', '', '', 0, '', 'zozzdddaaaa@yahoo.com', '$2y$10$0JOI4wnpIaoKFaYbL20ji.uYb1PeB6IAxTePyzFPpSUalViUEv76i', NULL, NULL, NULL),
(27, 'programmer', '01099475854', '', '23141342', '', '', 0, '', 'Ahmeddddd@yahoo.com', '$2y$10$FBo7mICwWSbh2u1t9Pi.y.BMOO35wjuFP9ZFvSQts3qiwT1MWv/ie', NULL, NULL, NULL),
(28, 'programmerrr', '01099475854', '', '123', '', '', 0, '', 'zzzddasdiadm57@yahoo.com', '$2y$10$F1cvkbAJ7Sues2bCy9gDNOB712Zbo3GPjne952KqR6uhrUcFRfou6', NULL, NULL, NULL),
(29, 'admin', '01099475854', '', '212314125135135', 'admin', '', 0, '', 'admin@elmanhag.com', '$2y$10$O4cCba9gbDYHJ9DDmbxgO.LT4.RJqq0Rp1UONblJ3tRmOLaSvv/3K', NULL, NULL, NULL),
(62, 'mazennnnn', '0145214523', '', '12', 'follow_up', '', 0, 'default.png', 'admin@elmanhag.comm', '$2y$10$T23g8nRTv4PLXl3j7vx5xuxf3HRstL0Z7aK07z3G6wnWvETevuKW6', NULL, NULL, NULL),
(64, 'math', '0145214523', '', '', '', '', 0, '', 'admin@elmanhag.con', '$2y$10$DT5NlMh2F3EXhD2SZcw8uuw0xYtwKzAajWFMp4YrZDU.k5hPoQA9C', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_admin_permitions`
--

CREATE TABLE `user_admin_permitions` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `premition` enum('material','voice','powerpoint','compress','upload','assign') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `user_admin_permitions`
--

INSERT INTO `user_admin_permitions` (`id`, `user_id`, `premition`) VALUES
(1, 27, 'material'),
(2, 27, 'voice'),
(3, 27, 'powerpoint'),
(4, 27, 'compress'),
(5, 27, 'upload'),
(6, 27, 'assign'),
(7, 29, 'material'),
(8, 29, 'voice'),
(9, 29, 'powerpoint'),
(10, 29, 'compress'),
(11, 30, 'voice'),
(12, 30, 'upload'),
(13, 30, 'assign'),
(14, 64, 'upload');

-- --------------------------------------------------------

--
-- Table structure for table `user_category`
--

CREATE TABLE `user_category` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `user_category`
--

INSERT INTO `user_category` (`id`, `user_id`, `category_id`) VALUES
(0, 57, 4),
(0, 57, 5),
(0, 57, 6),
(0, 57, 7),
(0, 57, 8),
(0, 57, 9),
(0, 58, 4),
(0, 58, 5),
(0, 58, 6),
(0, 58, 7),
(0, 58, 8),
(0, 58, 9),
(0, 59, 4),
(0, 59, 5),
(0, 59, 6),
(0, 59, 7),
(0, 59, 8),
(0, 59, 9),
(0, 60, 4),
(0, 60, 5),
(0, 60, 6),
(0, 60, 7),
(0, 60, 8),
(0, 60, 9),
(0, 61, 8);

-- --------------------------------------------------------

--
-- Table structure for table `user_subjects`
--

CREATE TABLE `user_subjects` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `user_subjects`
--

INSERT INTO `user_subjects` (`id`, `user_id`, `subject_id`) VALUES
(0, 57, 29),
(0, 58, 3),
(0, 59, 7),
(0, 60, 36),
(0, 60, 37),
(0, 61, 28);

-- --------------------------------------------------------

--
-- Table structure for table `user_withdraw`
--

CREATE TABLE `user_withdraw` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `money` double NOT NULL,
  `date` date NOT NULL,
  `status` enum('rejected','pending','acceptting') NOT NULL DEFAULT 'pending',
  `rejected_reason` text DEFAULT NULL,
  `method` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `user_withdraw`
--

INSERT INTO `user_withdraw` (`id`, `user_id`, `money`, `date`, `status`, `rejected_reason`, `method`) VALUES
(1, 14, 242134, '2023-12-30', 'rejected', NULL, NULL),
(2, 14, 134134, '2023-12-30', 'rejected', NULL, 0),
(3, 14, 1341341, '2023-12-31', 'rejected', NULL, 0),
(4, 0, 2, '0000-00-00', 'pending', NULL, 3),
(5, 0, 300, '0000-00-00', 'pending', NULL, 3),
(6, 11, 300, '2024-01-31', 'pending', NULL, 3),
(7, 11, 100, '2024-01-31', 'pending', NULL, 2),
(8, 14, 200, '2024-01-31', 'pending', NULL, NULL),
(9, 14, 300, '2024-01-31', 'pending', NULL, NULL),
(10, 14, 100, '2024-01-31', 'pending', NULL, NULL),
(11, 11, 2222, '2024-01-31', 'pending', NULL, 2),
(12, 11, 2222, '2024-01-31', 'pending', NULL, 2),
(13, 11, 2222, '2024-01-31', 'pending', NULL, 2),
(14, 11, 2222, '2024-01-31', 'pending', NULL, 2),
(15, 11, 2222, '2024-01-31', 'pending', NULL, 2),
(16, 11, 2222, '2024-01-31', 'rejected', NULL, 2),
(17, 11, -2222, '2024-01-31', 'pending', NULL, 2),
(18, 11, -2222, '2024-01-31', 'pending', NULL, 2),
(19, 11, -2222, '2024-01-31', 'pending', NULL, 2),
(20, 11, -2222, '2024-01-31', 'pending', NULL, 2),
(21, 11, -2222, '2024-01-31', 'pending', NULL, 2),
(22, 11, -2222, '2024-01-31', 'pending', NULL, 2),
(23, 11, -2222, '2024-01-31', 'pending', NULL, 2),
(24, 11, -2222, '2024-01-31', 'pending', NULL, 2),
(25, 11, 1, '2024-01-31', 'pending', NULL, 2),
(26, 11, 2, '2024-01-31', 'pending', NULL, 2),
(27, 11, 482, '2024-01-31', 'pending', NULL, 2),
(28, 11, 1, '2024-01-31', 'pending', NULL, 2),
(29, 11, 343, '2024-01-31', 'pending', NULL, 2),
(30, 11, 343, '2024-01-31', 'pending', NULL, 2),
(31, 11, 999, '2024-01-31', 'pending', NULL, 2),
(32, 11, 57.7984615385, '2024-01-31', 'pending', NULL, 2),
(33, 11, 1, '2024-01-31', 'pending', NULL, 2),
(34, 11, 3, '2024-01-31', 'pending', NULL, 2),
(35, 11, 3, '2024-01-31', 'pending', NULL, 2),
(36, 11, 3.4, '2024-01-31', 'pending', NULL, 2),
(37, 11, 3.4, '2024-01-31', 'pending', NULL, 2),
(38, 11, 3.4, '2024-01-31', 'pending', NULL, 2),
(39, 11, 3.4, '2024-01-31', 'pending', NULL, 2),
(40, 14, 100, '2024-01-31', 'pending', NULL, NULL),
(41, 14, 100, '2024-01-31', 'pending', NULL, NULL),
(42, 14, 100, '2024-01-31', 'pending', NULL, NULL),
(43, 14, -1717530, '2024-02-05', 'pending', NULL, NULL),
(44, 11, 120, '2024-02-05', 'pending', NULL, NULL),
(45, 14, -22, '2024-02-05', 'pending', NULL, NULL),
(46, 14, 10, '2024-02-05', 'pending', NULL, NULL),
(47, 14, 1, '2024-02-05', 'pending', NULL, NULL),
(48, 14, 1, '2024-02-05', 'pending', NULL, NULL),
(49, 11, 129, '2024-02-05', 'pending', NULL, NULL),
(50, 14, 1, '2024-02-05', 'pending', NULL, NULL),
(51, 14, 1, '2024-02-05', 'pending', NULL, NULL),
(52, 14, 1, '2024-02-05', 'pending', NULL, NULL),
(53, 14, 1, '2024-02-05', 'pending', NULL, NULL),
(54, 14, 1, '2024-02-05', 'pending', NULL, NULL),
(55, 14, 1, '2024-02-05', 'pending', NULL, NULL),
(56, 14, 1, '2024-02-05', 'pending', NULL, NULL),
(57, 14, 1, '2024-02-05', 'pending', NULL, NULL),
(58, 14, 1, '2024-02-05', 'pending', NULL, NULL),
(59, 14, 1, '2024-02-05', 'pending', NULL, NULL),
(60, 14, 2, '2024-02-05', 'pending', NULL, NULL),
(61, 14, 1, '2024-02-05', 'pending', NULL, NULL),
(62, 14, 1, '2024-02-05', 'pending', NULL, NULL),
(63, 14, -2, '2024-02-05', 'pending', NULL, NULL),
(64, 14, 2, '2024-02-05', 'pending', NULL, NULL),
(65, 14, 1, '2024-02-05', 'pending', NULL, NULL),
(66, 14, -4, '2024-02-05', 'pending', NULL, NULL),
(67, 14, 1, '2024-02-05', 'pending', NULL, NULL),
(68, 14, 1, '2024-02-05', 'pending', NULL, NULL),
(69, 14, 1, '2024-02-05', 'pending', NULL, NULL),
(70, 11, 330.4, '2024-02-05', 'pending', NULL, NULL),
(71, 11, 200, '2024-02-05', 'pending', NULL, NULL),
(72, 11, 100, '2024-02-05', 'pending', NULL, NULL),
(73, 11, 250, '2024-02-06', 'pending', NULL, NULL),
(74, 14, 0.7984615384615, '2024-02-06', 'pending', NULL, NULL),
(75, 14, 999, '2024-02-06', 'pending', NULL, NULL),
(76, 14, -1999, '2024-02-06', 'pending', NULL, NULL),
(77, 14, 1, '2024-02-06', 'pending', NULL, NULL),
(78, 11, 50, '2024-02-06', 'pending', NULL, NULL),
(79, 14, 500, '2024-02-06', 'pending', NULL, NULL),
(80, 14, 200, '2024-02-06', 'pending', NULL, NULL),
(81, 14, 50, '2024-02-06', 'pending', NULL, NULL),
(82, 14, 50, '2024-02-06', 'pending', NULL, NULL),
(83, 14, 50, '2024-02-06', 'pending', NULL, NULL),
(84, 14, 20, '2024-02-06', 'pending', NULL, NULL),
(85, 11, 100, '2024-02-07', 'pending', NULL, NULL),
(86, 11, 100, '2024-02-07', 'pending', NULL, NULL),
(87, 14, 30, '2024-02-07', 'pending', NULL, NULL),
(88, 14, 20, '2024-02-07', 'pending', NULL, NULL),
(89, 11, 100, '2024-02-07', 'pending', NULL, NULL),
(90, 11, 100, '2024-02-07', 'pending', NULL, NULL),
(91, 11, 99.96, '2024-02-07', 'pending', NULL, NULL),
(92, 11, 35, '2024-02-07', 'pending', NULL, NULL),
(93, 11, 22, '2024-02-08', 'pending', NULL, 0),
(94, 11, 22, '2024-02-08', 'pending', NULL, 0),
(95, 11, 1, '2024-02-08', 'pending', NULL, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `add_slides`
--
ALTER TABLE `add_slides`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bundle`
--
ALTER TABLE `bundle`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bundle_subjects`
--
ALTER TABLE `bundle_subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cities_state_id_foreign` (`state_id`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contents`
--
ALTER TABLE `contents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `datta`
--
ALTER TABLE `datta`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `follow`
--
ALTER TABLE `follow`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `proccessing_duration`
--
ALTER TABLE `proccessing_duration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sign_up`
--
ALTER TABLE `sign_up`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`),
  ADD KEY `states_country_id_foreign` (`country_id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `teacher_subjects`
--
ALTER TABLE `teacher_subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_sales_type_sales_id_index` (`sales`,`sales_id`);

--
-- Indexes for table `user_admin_permitions`
--
ALTER TABLE `user_admin_permitions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_withdraw`
--
ALTER TABLE `user_withdraw`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `add_slides`
--
ALTER TABLE `add_slides`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `bundle`
--
ALTER TABLE `bundle`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `bundle_subjects`
--
ALTER TABLE `bundle_subjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=539;

--
-- AUTO_INCREMENT for table `contents`
--
ALTER TABLE `contents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `datta`
--
ALTER TABLE `datta`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `follow`
--
ALTER TABLE `follow`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=488;

--
-- AUTO_INCREMENT for table `proccessing_duration`
--
ALTER TABLE `proccessing_duration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `sign_up`
--
ALTER TABLE `sign_up`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3930;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `teacher_subjects`
--
ALTER TABLE `teacher_subjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1143;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `user_admin_permitions`
--
ALTER TABLE `user_admin_permitions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `user_withdraw`
--
ALTER TABLE `user_withdraw`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cities`
--
ALTER TABLE `cities`
  ADD CONSTRAINT `cities_state_id_foreign` FOREIGN KEY (`state_id`) REFERENCES `states` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `states`
--
ALTER TABLE `states`
  ADD CONSTRAINT `states_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
