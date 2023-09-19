-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 30, 2023 at 12:03 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `resume_builder`
--

-- --------------------------------------------------------

--
-- Table structure for table `area`
--

CREATE TABLE `area` (
  `id` int(3) NOT NULL,
  `code` int(2) NOT NULL,
  `name` varchar(250) COLLATE utf8_persian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `area`
--

INSERT INTO `area` (`id`, `code`, `name`) VALUES
(1, 41, 'آذربايجان شرقي'),
(2, 44, 'آذربايجان غربي'),
(3, 45, 'اردبيل'),
(4, 31, 'اصفهان'),
(5, 26, 'البرز'),
(6, 84, 'ايلام'),
(7, 77, 'بوشهر'),
(8, 21, 'تهران'),
(9, 38, 'چهارمحال بختياري'),
(10, 56, 'خراسان جنوبي'),
(11, 51, 'خراسان رضوي'),
(12, 58, 'خراسان شمالي'),
(13, 61, 'خوزستان'),
(14, 24, 'زنجان'),
(15, 23, 'سمنان'),
(16, 54, 'سيستان و بلوچستان'),
(17, 71, 'فارس'),
(18, 28, 'قزوين'),
(19, 25, 'قم'),
(20, 87, 'كردستان'),
(21, 34, 'كرمان'),
(22, 83, 'كرمانشاه'),
(23, 74, 'كهكيلويه و بويراحمد'),
(24, 17, 'گلستان'),
(25, 13, 'گيلان'),
(26, 66, 'لرستان'),
(27, 15, 'مازندران'),
(28, 86, 'مركزي'),
(29, 76, 'هرمزگان'),
(30, 81, 'همدان'),
(31, 35, 'يزد');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(200) COLLATE utf8_persian_ci NOT NULL,
  `img` varchar(255) COLLATE utf8_persian_ci DEFAULT NULL,
  `category_parent` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `id` int(5) NOT NULL,
  `osid` int(3) NOT NULL,
  `name` varchar(250) COLLATE utf8_persian_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`id`, `osid`, `name`) VALUES
(1, 41, 'آذر شهر'),
(2, 41, 'اسكو'),
(3, 41, 'اهر'),
(4, 41, 'بستان آباد'),
(5, 41, 'بناب'),
(6, 41, 'بندر شرفخانه'),
(7, 41, 'تبريز'),
(8, 41, 'تسوج'),
(9, 41, 'جلفا'),
(10, 41, 'سراب'),
(11, 41, 'شبستر'),
(12, 41, 'صوفیان'),
(13, 41, 'عجبشير'),
(14, 41, 'قره آغاج'),
(15, 41, 'كليبر'),
(16, 41, 'كندوان'),
(17, 41, 'مراغه'),
(18, 41, 'مرند'),
(19, 41, 'ملكان'),
(20, 41, 'ميانه'),
(21, 41, 'ورزقان'),
(22, 41, 'هاديشهر'),
(23, 41, 'هريس'),
(24, 41, 'هشترود'),
(25, 41, 'ممقان'),
(26, 44, 'اروميه'),
(27, 44, 'اشنويه'),
(28, 44, 'بازرگان'),
(29, 44, 'بوكان'),
(30, 44, 'پيرانشهر'),
(31, 44, 'تكاب'),
(32, 44, 'چالدران'),
(33, 44, 'خوي'),
(34, 44, 'سر دشت'),
(35, 44, 'سلماس'),
(36, 44, 'سيه چشمه'),
(37, 44, 'شاهين دژ'),
(38, 44, 'ماكو'),
(39, 44, 'مهاباد'),
(40, 44, 'مياندوآب'),
(41, 44, 'نقده'),
(42, 45, 'اردبيل'),
(43, 45, 'بيله سوار'),
(44, 45, 'پارس آباد'),
(45, 45, 'خلخال'),
(46, 45, 'سرعين'),
(47, 45, 'گیوی(کوثر)'),
(48, 45, 'گرمي'),
(49, 45, 'مشگين شهر'),
(50, 45, 'نمين'),
(51, 45, 'نير'),
(52, 31, 'آران و بيدگل'),
(53, 31, 'اردستان'),
(54, 31, 'اصفهان'),
(55, 31, 'باغ بهادران'),
(56, 31, 'تيران'),
(57, 31, 'چادگان'),
(58, 31, 'خميني شهر'),
(59, 31, 'خوانسار'),
(60, 31, 'دولت آباد'),
(61, 31, 'دهاقان'),
(62, 31, 'زرين شهر'),
(63, 31, 'زیبا شهر'),
(64, 31, 'سميرم'),
(65, 31, 'سپاهان شهر'),
(66, 31, 'شاهين شهر'),
(67, 31, 'شهرضا'),
(68, 31, 'فريدن'),
(69, 31, 'فريدون شهر'),
(70, 31, 'فلاورجان'),
(71, 31, 'فولاد شهر'),
(72, 31, 'قهدریجان'),
(73, 31, 'كاشان'),
(74, 31, 'گلدشت'),
(75, 31, 'گلپايگان'),
(76, 31, 'مباركه'),
(77, 31, 'ملک شهر'),
(78, 31, 'نايين'),
(79, 31, 'نجف آباد'),
(80, 31, 'نطنز'),
(81, 31, 'هرند'),
(82, 26, 'آسارا'),
(83, 26, 'اشتهارد'),
(84, 26, 'چهار باغ'),
(85, 26, 'صفادشت'),
(86, 26, 'طالقان'),
(87, 26, 'کرج'),
(88, 26, 'کوهسار'),
(89, 26, 'نظر آباد'),
(90, 26, 'هشتگرد'),
(91, 84, 'آبدانان'),
(92, 84, 'ايلام'),
(93, 84, 'ايوان'),
(94, 84, 'دره شهر'),
(95, 84, 'دهلران'),
(96, 84, 'سرابله'),
(97, 84, 'مهران'),
(98, 77, 'اهرم'),
(99, 77, 'برازجان'),
(100, 77, 'آبپخش'),
(101, 77, 'بوشهر'),
(102, 77, 'تنگستان'),
(103, 77, 'جم'),
(104, 77, 'خارك'),
(105, 77, 'خورموج'),
(106, 77, 'دشتستان'),
(107, 77, 'دشتي'),
(108, 77, 'دلوار'),
(109, 77, 'دير'),
(110, 77, 'ديلم'),
(111, 77, 'عسلویه'),
(112, 77, 'كنگان'),
(113, 77, 'گناوه'),
(114, 21, 'اسلامشهر'),
(115, 21, 'اندیشه'),
(116, 21, 'بومهن'),
(117, 21, 'پاكدشت'),
(118, 21, 'تجريش'),
(119, 21, 'تهران'),
(120, 21, 'چهاردانگه'),
(121, 21, 'دماوند'),
(122, 21, 'رباط كريم'),
(123, 21, 'رودهن'),
(124, 21, 'ري'),
(125, 21, 'شريف آباد'),
(126, 21, 'شهريار'),
(127, 21, 'فشم'),
(128, 21, 'فيروزكوه'),
(129, 21, 'قدس'),
(130, 21, 'قرچك'),
(131, 21, 'كن'),
(132, 21, 'كهريزك'),
(133, 21, 'گلستان'),
(134, 21, 'لواسان'),
(135, 21, 'ملارد'),
(136, 21, 'ورامين'),
(137, 38, 'اردل'),
(138, 38, 'بروجن'),
(139, 38, 'چلگرد'),
(140, 38, 'سامان'),
(141, 38, 'شهركرد'),
(142, 38, 'فارسان'),
(143, 38, 'فرخ شهر'),
(144, 38, 'لردگان'),
(145, 38, 'هفشجان'),
(146, 56, 'بشرویه'),
(147, 56, 'بيرجند'),
(148, 56, 'خضری'),
(149, 56, 'سرایان'),
(150, 56, 'سربيشه'),
(151, 56, 'فردوس'),
(152, 56, 'قائن'),
(153, 56, 'نهبندان'),
(154, 51, 'بردسكن'),
(155, 51, 'بجستان'),
(156, 51, 'تايباد'),
(157, 51, 'تربت جام'),
(158, 51, 'تربت حيدريه'),
(159, 51, 'جغتای'),
(160, 51, 'جوین'),
(161, 51, 'چناران'),
(162, 51, 'خواف'),
(163, 51, 'خلیل آباد'),
(164, 51, 'درگز'),
(165, 51, 'رشتخوار'),
(166, 51, 'سبزوار'),
(167, 51, 'سرخس'),
(168, 51, 'طوس'),
(169, 51, 'طرقبه'),
(170, 51, 'فريمان'),
(171, 51, 'قوچان'),
(172, 51, 'كاشمر'),
(173, 51, 'كلات'),
(174, 51, 'گناباد'),
(175, 51, 'مشهد'),
(176, 51, 'نيشابور'),
(177, 58, 'آشخانه'),
(178, 58, 'اسفراين'),
(179, 58, 'بجنورد'),
(180, 58, 'جاجرم'),
(181, 58, 'شيروان'),
(182, 58, 'فاروج'),
(183, 61, 'آبادان'),
(184, 61, 'اميديه'),
(185, 61, 'انديمشك'),
(186, 61, 'اهواز'),
(187, 61, 'ايذه'),
(188, 61, 'گتوند'),
(189, 61, 'باغ ملك'),
(190, 61, 'بندرامام خميني'),
(191, 61, 'بندر ماهشهر'),
(192, 61, 'بهبهان'),
(193, 61, 'خرمشهر'),
(194, 61, 'دزفول'),
(195, 61, 'رامهرمز'),
(196, 61, 'رامشیر'),
(197, 61, 'سوسنگرد'),
(198, 61, 'شادگان'),
(199, 61, 'شوشتر'),
(200, 61, 'شوش'),
(201, 61, 'لالي'),
(202, 61, 'مسجد سليمان'),
(203, 61, 'هنديجان'),
(204, 61, 'هويزه'),
(205, 24, 'آب بر'),
(206, 24, 'ابهر'),
(207, 24, 'ايجرود'),
(208, 24, 'خرمدره'),
(209, 24, 'زرين آباد'),
(210, 24, 'زنجان'),
(211, 24, 'قيدار'),
(212, 24, 'ماهنشان'),
(213, 23, 'ايوانكي'),
(214, 23, 'بسطام'),
(215, 23, 'دامغان'),
(216, 23, 'سمنان'),
(217, 23, 'سرخه'),
(218, 23, 'شاهرود'),
(219, 23, 'شهمیرزاد'),
(220, 23, 'گرمسار'),
(221, 23, 'مهدیشهر'),
(222, 54, 'ايرانشهر'),
(223, 54, 'چابهار'),
(224, 54, 'خاش'),
(225, 54, 'راسك'),
(226, 54, 'زابل'),
(227, 54, 'زاهدان'),
(228, 54, 'سراوان'),
(229, 54, 'سرباز'),
(230, 54, 'فنوج'),
(231, 54, 'کنارک'),
(232, 54, 'ميرجاوه'),
(233, 54, 'نيكشهر'),
(234, 71, 'آباده'),
(235, 71, 'اردكان'),
(236, 71, 'ارسنجان'),
(237, 71, 'استهبان'),
(238, 71, 'اقليد'),
(239, 71, 'ایزد خواست'),
(240, 71, 'بوانات'),
(241, 71, 'پاسارگاد'),
(242, 71, 'جهرم'),
(243, 71, 'حاجي آباد'),
(244, 71, 'خرم بید'),
(245, 71, 'خنج'),
(246, 71, 'خشت'),
(247, 71, 'داراب'),
(248, 71, 'شيراز'),
(249, 71, 'فراشبند'),
(250, 71, 'فسا'),
(251, 71, 'فيروز آباد'),
(252, 71, 'قایمیه'),
(253, 71, 'قيرو کارزین'),
(254, 71, 'كازرون'),
(255, 71, 'گراش'),
(256, 71, 'لار'),
(257, 71, 'لامرد'),
(258, 71, 'مرودشت'),
(259, 71, 'مصیری(رستم)'),
(260, 71, 'مهر'),
(261, 71, 'نورآباد'),
(262, 71, 'ني ريز'),
(263, 28, 'آبيك'),
(264, 28, 'شهرک البرز'),
(265, 28, 'بوئين زهرا'),
(266, 28, 'تاكستان'),
(267, 28, 'قزوين'),
(268, 28, 'محمود آباد نمونه'),
(269, 25, 'قم'),
(270, 87, 'بانه'),
(271, 87, 'بيجار'),
(272, 87, 'ديواندره'),
(273, 87, 'دهگلان'),
(274, 87, 'سقز'),
(275, 87, 'سنندج'),
(276, 87, 'قروه'),
(277, 87, 'كامياران'),
(278, 87, 'مريوان'),
(279, 34, 'شهر بابك'),
(280, 34, 'بافت'),
(281, 34, 'بردسير'),
(282, 34, 'بم'),
(283, 34, 'جيرفت'),
(284, 34, 'سرچشمه'),
(285, 34, 'راور'),
(286, 34, 'رفسنجان'),
(287, 34, 'زرند'),
(288, 34, 'سيرجان'),
(289, 34, 'كرمان'),
(290, 34, 'كهنوج'),
(291, 83, 'اسلام آباد غرب'),
(292, 83, 'پاوه'),
(293, 83, 'ثلاث باباجانی'),
(294, 83, 'جوانرود'),
(295, 83, 'خسروی'),
(296, 83, 'سر پل ذهاب'),
(297, 83, 'سنقر'),
(298, 83, 'صحنه'),
(299, 83, 'قصر شيرين'),
(300, 83, 'كرمانشاه'),
(301, 83, 'كنگاور'),
(302, 83, 'گيلان غرب'),
(303, 83, 'هرسين'),
(304, 74, 'دنا'),
(305, 74, 'دوگنبدان'),
(306, 74, 'دهدشت'),
(307, 74, 'سي سخت'),
(308, 74, 'گچساران'),
(309, 74, 'لیکک'),
(310, 74, 'ياسوج'),
(311, 17, 'آزاد شهر'),
(312, 17, 'آق قلا'),
(313, 17, 'بندر گز'),
(314, 17, 'تركمن'),
(315, 17, 'جلین'),
(316, 17, 'راميان'),
(317, 17, 'علي آباد كتول'),
(318, 17, 'كردكوي'),
(319, 17, 'كلاله'),
(320, 17, 'گالیکش'),
(321, 17, 'گرگان'),
(322, 17, 'گنبد كاووس'),
(323, 17, 'مراوه تپه'),
(324, 17, 'مينو دشت'),
(325, 13, 'آستارا'),
(326, 13, 'آستانه اشرفيه'),
(327, 13, 'املش'),
(328, 13, 'بندرانزلي'),
(329, 13, 'تالش'),
(330, 13, 'خمام'),
(331, 13, 'رودبار'),
(332, 13, 'رود سر'),
(333, 13, 'رستم آباد'),
(334, 13, 'رشت'),
(335, 13, 'رضوان شهر'),
(336, 13, 'سياهكل'),
(337, 13, 'شفت'),
(338, 13, 'صومعه سرا'),
(339, 13, 'فومن'),
(340, 13, 'كلاچاي'),
(341, 13, 'لاهيجان'),
(342, 13, 'لنگرود'),
(343, 13, 'لوشان'),
(344, 13, 'ماسال'),
(345, 13, 'ماسوله'),
(346, 13, 'منجيل'),
(347, 66, 'ازنا'),
(348, 66, 'الشتر'),
(349, 66, 'اليگودرز'),
(350, 66, 'بروجرد'),
(351, 66, 'پلدختر'),
(352, 66, 'خرم آباد'),
(353, 66, 'دورود'),
(354, 66, 'سراب دوره'),
(355, 66, 'سپید دشت'),
(356, 66, 'شول آباد'),
(357, 66, 'كوهدشت'),
(358, 66, 'نور آباد'),
(359, 15, 'آمل'),
(360, 15, 'بلده'),
(361, 15, 'بهشهر'),
(362, 15, 'بابل'),
(363, 15, 'بابلسر'),
(364, 15, 'پل سفيد'),
(365, 15, 'تنكابن'),
(366, 15, 'جويبار'),
(367, 15, 'چالوس'),
(368, 15, 'رامسر'),
(369, 15, 'ساري'),
(370, 15, 'سلمانشهر'),
(371, 15, 'سواد كوه'),
(372, 15, 'فريدون كنار'),
(373, 15, 'کلاردشت'),
(374, 15, 'قائم شهر'),
(375, 15, 'گلوگاه'),
(376, 15, 'محمود آباد'),
(377, 15, 'مرزن آباد'),
(378, 15, 'نكا'),
(379, 15, 'نور'),
(380, 15, 'نوشهر'),
(381, 86, 'آشتيان'),
(382, 86, 'اراك'),
(383, 86, 'تفرش'),
(384, 86, 'خمين'),
(385, 86, 'خنداب'),
(386, 86, 'دليجان'),
(387, 86, 'زرندیه'),
(388, 86, 'ساوه'),
(389, 86, 'شازند'),
(390, 86, 'کمیجان'),
(391, 86, 'محلات'),
(392, 76, 'ابوموسي'),
(393, 76, 'انگهران'),
(394, 76, 'بندر جاسك'),
(395, 76, 'بندر خمیر'),
(396, 76, 'بندرعباس'),
(397, 76, 'بندر لنگه'),
(398, 76, 'بستك'),
(399, 76, 'پارسیان'),
(400, 76, 'تنب بزرگ'),
(401, 76, 'حاجي آباد'),
(402, 76, 'دهبارز'),
(403, 76, 'قشم'),
(404, 76, 'كيش'),
(405, 76, 'ميناب'),
(406, 81, 'اسدآباد'),
(407, 81, 'بهار'),
(408, 81, 'تويسركان'),
(409, 81, 'رزن'),
(410, 81, 'كبودر اهنگ'),
(411, 81, 'ملاير'),
(412, 81, 'نهاوند'),
(413, 81, 'همدان'),
(414, 35, 'ابركوه'),
(415, 35, 'اردكان'),
(416, 35, 'اشكذر'),
(417, 35, 'بافق'),
(418, 35, 'تفت'),
(419, 35, 'طبس'),
(420, 35, 'مهريز'),
(421, 35, 'ميبد'),
(422, 35, 'هرات'),
(423, 35, 'يزد');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `restorant_id` int(11) NOT NULL,
  `comments_text` text COLLATE utf8_persian_ci,
  `star` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_persian_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_persian_ci DEFAULT NULL,
  `phone` varchar(20) COLLATE utf8_persian_ci DEFAULT NULL,
  `content` text COLLATE utf8_persian_ci,
  `created_at` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `education`
--

CREATE TABLE `education` (
  `id` int(10) UNSIGNED NOT NULL,
  `userid` int(11) NOT NULL,
  `ed_field` text
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `education`
--

INSERT INTO `education` (`id`, `userid`, `ed_field`) VALUES
(1, 2, '[\n    {\n        "edu_section": "دیپلم",\n        "edu_field": "ریاضی",\n        "edu_name": "مصطفی خمینی",\n        "edu_orination": "یه چیزی",\n        "edu_type": "دولتی",\n        "edu_avrage": "19",\n        "edu_country": "ایران",\n        "edu_area": "گلستان",\n        "edu_city": "گرگان",\n        "edu_start": "73",\n        "edu_end": "81"\n    },\n    {\n        "edu_section": "کارشناسی",\n        "edu_field": "کامپیوتر",\n        "edu_name": "شریف",\n        "edu_orination": "یه چیزی",\n        "edu_type": "غیرانتفاعی",\n        "edu_avrage": "15",\n        "edu_country": "ایران",\n        "edu_area": "تهران",\n        "edu_city": "گرگان",\n        "edu_start": "82",\n        "edu_end": "85"\n    }\n]'),
(3, 1, '[\n    {\n        "edu_section": "دیپلم",\n        "edu_field": "ریاضی",\n        "edu_name": "مصطفی خمینی",\n        "edu_orination": "یه چیزی",\n        "edu_type": "دولتی",\n        "edu_avrage": "15",\n        "edu_country": "ایران",\n        "edu_area": "گلستان",\n        "edu_city": "گرگان",\n        "edu_start": "73",\n        "edu_end": "85"\n    },\n    {\n        "edu_section": "کاردانی",\n        "edu_field": "کامپیوتر",\n        "edu_name": "شریف",\n        "edu_orination": "یه چیزی",\n        "edu_type": "غیرانتفاعی",\n        "edu_avrage": "19",\n        "edu_country": "ایران",\n        "edu_area": "گلستان",\n        "edu_city": "گرگان",\n        "edu_start": "73",\n        "edu_end": "81"\n    }\n]');

-- --------------------------------------------------------

--
-- Table structure for table `evidence`
--

CREATE TABLE `evidence` (
  `evid` int(10) UNSIGNED NOT NULL,
  `evidence_data` text,
  `userid` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `evidence`
--

INSERT INTO `evidence` (`evid`, `evidence_data`, `userid`) VALUES
(1, '[\n    {\n        "evidence_name": "مدرک ICDL",\n        "evidence_institute": "یه جایی",\n        "evidence_month": "5",\n        "evidence_year": "1380"\n    }\n]', 2),
(3, '[\n    {\n        "evidence_name": "مدرک ICDL",\n        "evidence_institute": "یه جایی",\n        "evidence_month": "4",\n        "evidence_year": "1398"\n    }\n]', 1);

-- --------------------------------------------------------

--
-- Table structure for table `expertise`
--

CREATE TABLE `expertise` (
  `id` int(10) UNSIGNED NOT NULL,
  `userid` int(11) NOT NULL,
  `ex_data` text
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `expertise`
--

INSERT INTO `expertise` (`id`, `userid`, `ex_data`) VALUES
(2, 1, '[\n    {\n        "ex_name": "php",\n        "ex_level": "4"\n    },\n    {\n        "ex_name": "mysql",\n        "ex_level": "3"\n    },\n    {\n        "ex_name": "html",\n        "ex_level": "4"\n    },\n    {\n        "ex_name": "css",\n        "ex_level": "4"\n    },\n    {\n        "ex_name": "javascript",\n        "ex_level": "2"\n    },\n    {\n        "ex_name": "jquery",\n        "ex_level": "2"\n    },\n    {\n        "ex_name": "bootstrap",\n        "ex_level": "3"\n    }\n]'),
(3, 2, '[\n    {\n        "ex_name": "css",\n        "ex_level": "4"\n    },\n    {\n        "ex_name": "html",\n        "ex_level": "5"\n    },\n    {\n        "ex_name": "javascript",\n        "ex_level": "3"\n    },\n    {\n        "ex_name": "jquery",\n        "ex_level": "3"\n    },\n    {\n        "ex_name": "mysql",\n        "ex_level": "4"\n    },\n    {\n        "ex_name": "php",\n        "ex_level": "5"\n    }\n]');

-- --------------------------------------------------------

--
-- Table structure for table `honors`
--

CREATE TABLE `honors` (
  `hid` int(10) UNSIGNED NOT NULL,
  `honor_data` text,
  `userid` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `honors`
--

INSERT INTO `honors` (`hid`, `honor_data`, `userid`) VALUES
(1, '[\n    {\n        "honor_name": "افتخارات",\n        "honor_month": "7",\n        "honor_year": "1400",\n        "honor_link": ""\n    },\n    {\n        "honor_name": "افتخارات 2",\n        "honor_month": "",\n        "honor_year": "1395",\n        "honor_link": ""\n    }\n]', 2),
(3, '[\n    {\n        "honor_name": "افتخارات",\n        "honor_month": "4",\n        "honor_year": "1",\n        "honor_link": "http:\\/\\/www.yahoo.com"\n    }\n]', 1);

-- --------------------------------------------------------

--
-- Table structure for table `information`
--

CREATE TABLE `information` (
  `id` int(10) UNSIGNED NOT NULL,
  `tel` varchar(255) COLLATE utf8_persian_ci DEFAULT NULL,
  `mobile` varchar(255) COLLATE utf8_persian_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_persian_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8_persian_ci DEFAULT NULL,
  `whatsapp` varchar(255) COLLATE utf8_persian_ci DEFAULT NULL,
  `instagram` varchar(255) COLLATE utf8_persian_ci DEFAULT NULL,
  `telegram` varchar(255) COLLATE utf8_persian_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `information`
--

INSERT INTO `information` (`id`, `tel`, `mobile`, `email`, `address`, `whatsapp`, `instagram`, `telegram`) VALUES
(1, '021', '0912', 'info@resume.com', 'همدان، خیابان باباطاهر، کوچه 12، ساختمان آستان قدس، طبق اول، واحد غربی', 'whatsapp', 'instagram', 'telegram');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` int(10) UNSIGNED NOT NULL,
  `userid` int(11) NOT NULL,
  `j_data` text
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `userid`, `j_data`) VALUES
(1, 2, '[\r\n    {\r\n        "job_title": "مدیرفنی",\r\n        "job_place": "دنیای رایانه",\r\n        "job_country": "ایران",\r\n        "job_area": "",\r\n        "job_city": "گرگان",\r\n        "job_smonth": "1",\r\n        "job_syear": "1390",\r\n        "job_emonth": "2",\r\n        "job_eyear": "1395",\r\n        "job_now": 0\r\n    },\r\n    {\r\n        "job_title": "مدیرعامل",\r\n        "job_place": "پارتیاوب",\r\n        "job_country": "ایران",\r\n        "job_area": "",\r\n        "job_city": "گرگان",\r\n        "job_smonth": "1",\r\n        "job_syear": "1395",\r\n        "job_emonth": "",\r\n        "job_eyear": "",\r\n        "job_now": 1\r\n    }\r\n]'),
(3, 1, '[\n    {\n        "job_title": "مدیرفنی",\n        "job_place": "دنیای رایانه",\n        "job_country": "ایران",\n        "job_area": "آذربایجان غربی",\n        "job_city": "گرگان",\n        "job_smonth": "8",\n        "job_syear": "1390",\n        "job_emonth": "8",\n        "job_eyear": "1395",\n        "job_now": 1\n    },\n    {\n        "job_title": "مدیرعامل",\n        "job_place": "دنیای رایانه",\n        "job_country": "ایران",\n        "job_area": null,\n        "job_city": "گرگان",\n        "job_smonth": "10",\n        "job_syear": "1395",\n        "job_emonth": "",\n        "job_eyear": "",\n        "job_now": 0\n    }\n]');

-- --------------------------------------------------------

--
-- Table structure for table `language`
--

CREATE TABLE `language` (
  `id` int(10) UNSIGNED NOT NULL,
  `userid` int(11) NOT NULL,
  `l_data` text
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `language`
--

INSERT INTO `language` (`id`, `userid`, `l_data`) VALUES
(1, 2, '[\n    {\n        "lang_title": "انگلیسی",\n        "lang_level": "3"\n    },\n    {\n        "lang_title": "Turkish",\n        "lang_level": "1"\n    }\n]'),
(3, 1, '[\n    {\n        "lang_title": "انگلیسی",\n        "lang_level": "2"\n    },\n    {\n        "lang_title": "ترکی استانبولی",\n        "lang_level": "1"\n    }\n]');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `prid` int(10) UNSIGNED NOT NULL,
  `project_data` text,
  `userid` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`prid`, `project_data`, `userid`) VALUES
(1, '[\n    {\n        "project_name": "سایت داروخانه آنلاین",\n        "project_employer": "زهرا",\n        "project_link": "https:\\/\\/uprozhe.com",\n        "project_month": "6",\n        "project_year": "1402",\n        "project_desc": "توضیحات داروخانه"\n    },\n    {\n        "project_name": "سایت رزومه ساز آنلاین",\n        "project_employer": "ثمانه",\n        "project_link": "https:\\/\\/uprozhe.com",\n        "project_month": "6",\n        "project_year": "1402",\n        "project_desc": "توضیحات رزومه ساز آنلاین"\n    }\n]', 2),
(3, '[\n    {\n        "project_name": "سایت داروخانه آنلاین",\n        "project_employer": "سمانه",\n        "project_link": "https:\\/\\/uprozhe.com",\n        "project_month": "6",\n        "project_year": "1402",\n        "project_desc": "توضیحات سایت"\n    },\n    {\n        "project_name": "سایت رزومه ساز آنلاین",\n        "project_employer": "زهرا",\n        "project_link": "https:\\/\\/uprozhe.com",\n        "project_month": "7",\n        "project_year": "1402",\n        "project_desc": "توضیحات پروژه"\n    }\n]', 1);

-- --------------------------------------------------------

--
-- Table structure for table `representative`
--

CREATE TABLE `representative` (
  `repid` int(10) UNSIGNED NOT NULL,
  `rep_data` text,
  `userid` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `representative`
--

INSERT INTO `representative` (`repid`, `rep_data`, `userid`) VALUES
(1, '[\n    {\n        "rep_name": "یاسین",\n        "rep_org": "مدیر مجتمع دنیای رایانه",\n        "rep_email": "a@a.com",\n        "rep_tel": "22222"\n    }\n]', 2),
(3, '[\n    {\n        "rep_name": "یاسین",\n        "rep_org": "مدیر مجتمع دنیای رایانه",\n        "rep_email": "a@a.com",\n        "rep_tel": "22222"\n    }\n]', 1);

-- --------------------------------------------------------

--
-- Table structure for table `researches`
--

CREATE TABLE `researches` (
  `rid` int(10) UNSIGNED NOT NULL,
  `research_data` text,
  `userid` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `researches`
--

INSERT INTO `researches` (`rid`, `research_data`, `userid`) VALUES
(1, '[\n    {\n        "research_name": "عنوان تحقیق",\n        "research_publisher": "ناشر1",\n        "research_link": "https:\\/\\/p1.com",\n        "research_month": "6",\n        "research_year": "1402",\n        "research_desc": "توضیح تحقیقات"\n    }\n]', 2),
(3, '[\n    {\n        "research_name": "عنوان تحقیق",\n        "research_publisher": "ناشر1",\n        "research_link": "https:\\/\\/p1.com",\n        "research_month": "9",\n        "research_year": "1402",\n        "research_desc": "توضیح"\n    }\n]', 1);

-- --------------------------------------------------------

--
-- Table structure for table `socialmedia`
--

CREATE TABLE `socialmedia` (
  `id` int(10) UNSIGNED NOT NULL,
  `userid` int(11) NOT NULL,
  `s_data` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `socialmedia`
--

INSERT INTO `socialmedia` (`id`, `userid`, `s_data`) VALUES
(1, 2, '[\n    {\n        "social_name": "Github",\n        "social_id": "uprozhe"\n    },\n    {\n        "social_name": "Twitter",\n        "social_id": "uprozhe"\n    },\n    {\n        "social_name": "Instagram",\n        "social_id": "uprozhe"\n    },\n    {\n        "social_name": "Facebook",\n        "social_id": "uprozhe"\n    }\n]'),
(3, 1, '[\n    {\n        "social_name": "LinkedIn",\n        "social_id": "uprozhe"\n    },\n    {\n        "social_name": "Facebook",\n        "social_id": "uprozhe"\n    },\n    {\n        "social_name": "Twitter",\n        "social_id": "uprozhe"\n    }\n]');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `user_temp` int(11) DEFAULT NULL,
  `user_name` varchar(255) COLLATE utf8_persian_ci DEFAULT NULL,
  `user_family` varchar(255) COLLATE utf8_persian_ci DEFAULT NULL,
  `user_sex` varchar(20) COLLATE utf8_persian_ci DEFAULT NULL,
  `user_marital` varchar(20) COLLATE utf8_persian_ci DEFAULT NULL,
  `user_birthday` varchar(255) COLLATE utf8_persian_ci DEFAULT NULL,
  `user_job` varchar(255) COLLATE utf8_persian_ci DEFAULT NULL,
  `user_military` varchar(255) COLLATE utf8_persian_ci DEFAULT NULL,
  `user_country` varchar(255) COLLATE utf8_persian_ci DEFAULT NULL,
  `user_area` varchar(50) COLLATE utf8_persian_ci DEFAULT NULL,
  `user_city` varchar(50) COLLATE utf8_persian_ci DEFAULT NULL,
  `user_email` varchar(200) COLLATE utf8_persian_ci DEFAULT NULL,
  `user_mobile` varchar(20) COLLATE utf8_persian_ci DEFAULT NULL,
  `user_phone` varchar(20) COLLATE utf8_persian_ci DEFAULT NULL,
  `user_site` varchar(255) COLLATE utf8_persian_ci DEFAULT NULL,
  `user_resume` text COLLATE utf8_persian_ci NOT NULL,
  `user_password` varchar(255) COLLATE utf8_persian_ci DEFAULT NULL,
  `user_address` varchar(255) COLLATE utf8_persian_ci DEFAULT NULL,
  `user_permission` varchar(11) COLLATE utf8_persian_ci DEFAULT NULL,
  `user_pic` varchar(255) COLLATE utf8_persian_ci DEFAULT NULL,
  `news` int(11) NOT NULL,
  `type` int(11) DEFAULT NULL,
  `user_date` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_temp`, `user_name`, `user_family`, `user_sex`, `user_marital`, `user_birthday`, `user_job`, `user_military`, `user_country`, `user_area`, `user_city`, `user_email`, `user_mobile`, `user_phone`, `user_site`, `user_resume`, `user_password`, `user_address`, `user_permission`, `user_pic`, `news`, `type`, `user_date`) VALUES
(1, NULL, 'بیتا', 'عرب', 'زن', 'متاهل', '1361/6/13', 'برنامه نویس', '', 'ایران', '17', 'کرج', 'bita@gmail.com', '099', '021', 'https://www.uprozhe.com', 'طراح و برنامه نویس تحت وب\r\nمدیر کانال پروژه های دانشجویی', 'e10adc3949ba59abbe56e057f20f883e', 'الهیه', 'admin', '64ee0dabb82111.jpg', 0, 1, NULL),
(2, NULL, 'سارا', 'پارسایی', 'زن', 'متاهل', '1364/1/1', 'برنامه نویس', '', 'ایران', '17', 'گرگان', 'sara@yahoo.com', '0911', '021', 'https://www.yahoo.com', 'سلام! من سارا پارسایی هستم. من علاقه زیادی به طراحی UI/UX و طراحی وب دارم. من یک برنامه نویس ماهر Front-end، تسلط کامل بر برنامه های ادوبی XD , ادوبی illustrator و فیگما همچنین استاد ابزارهای طراحی گرافیک مانند Photoshop و Sketch هستم.', 'e10adc3949ba59abbe56e057f20f883e', 'ملاقاتی', NULL, '64ec511bab0362.jpg', 0, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `area`
--
ALTER TABLE `area`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `education`
--
ALTER TABLE `education`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `evidence`
--
ALTER TABLE `evidence`
  ADD PRIMARY KEY (`evid`);

--
-- Indexes for table `expertise`
--
ALTER TABLE `expertise`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `honors`
--
ALTER TABLE `honors`
  ADD PRIMARY KEY (`hid`);

--
-- Indexes for table `information`
--
ALTER TABLE `information`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `language`
--
ALTER TABLE `language`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`prid`);

--
-- Indexes for table `representative`
--
ALTER TABLE `representative`
  ADD PRIMARY KEY (`repid`);

--
-- Indexes for table `researches`
--
ALTER TABLE `researches`
  ADD PRIMARY KEY (`rid`);

--
-- Indexes for table `socialmedia`
--
ALTER TABLE `socialmedia`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `area`
--
ALTER TABLE `area`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=424;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `education`
--
ALTER TABLE `education`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `evidence`
--
ALTER TABLE `evidence`
  MODIFY `evid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `expertise`
--
ALTER TABLE `expertise`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `honors`
--
ALTER TABLE `honors`
  MODIFY `hid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `information`
--
ALTER TABLE `information`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `language`
--
ALTER TABLE `language`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `prid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `representative`
--
ALTER TABLE `representative`
  MODIFY `repid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `researches`
--
ALTER TABLE `researches`
  MODIFY `rid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `socialmedia`
--
ALTER TABLE `socialmedia`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
