-- phpMyAdmin SQL Dump
-- version 4.0.10.7
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Време на генериране: 26 ное 2015 в 23:00
-- Версия на сървъра: 5.5.45-cll
-- Версия на PHP: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- БД: `prinkkpb_rateit`
--

-- --------------------------------------------------------

--
-- Структура на таблица `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `id_user` int(11) NOT NULL,
  `date_added` varchar(100) NOT NULL,
  `date_deleted` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Схема на данните от таблица `categories`
--

INSERT INTO `categories` (`id`, `name`, `id_user`, `date_added`, `date_deleted`) VALUES
(8, 'Pubs', 77, '2015-11-17', ''),
(7, 'Hotels', 77, '2015-11-17', ''),
(6, 'afasdvsdvasdv asef asdfasd', 77, '2015-11-17', ''),
(5, 'ppp', 77, '2015-11-15', ''),
(9, 'Bars', 77, '2015-11-17', ''),
(10, 'asdfsdsdvsavd asfs d', 77, '2015-11-19', ''),
(11, 'Restaurants', 77, '2015-11-23', '');

-- --------------------------------------------------------

--
-- Структура на таблица `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_member` int(11) NOT NULL,
  `id_pub` int(11) NOT NULL,
  `comment` text NOT NULL,
  `date_added` varchar(100) NOT NULL,
  `date_deleted` int(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура на таблица `counter`
--

CREATE TABLE IF NOT EXISTS `counter` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_pub` int(11) NOT NULL,
  `ip` varchar(255) NOT NULL,
  `date_added` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура на таблица `mails`
--

CREATE TABLE IF NOT EXISTS `mails` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `receiver` varchar(200) NOT NULL COMMENT 'email',
  `sender` varchar(200) NOT NULL COMMENT 'email',
  `title` varchar(255) NOT NULL,
  `message` text NOT NULL COMMENT 'text of message',
  `readed` date DEFAULT NULL,
  `date_added` date NOT NULL,
  `deleted_receiver` date DEFAULT NULL,
  `delete_sender` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `receiver` (`receiver`),
  KEY `sender` (`sender`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=34 ;

--
-- Схема на данните от таблица `mails`
--

INSERT INTO `mails` (`id`, `receiver`, `sender`, `title`, `message`, `readed`, `date_added`, `deleted_receiver`, `delete_sender`) VALUES
(28, 'peter', 'ipetrovbg', 'ersgfsefg', 'asgdfv', '2015-11-18', '2015-11-18', NULL, NULL),
(29, 'peter', 'ipetrovbg', '"Водоснабдяване и канализация"ООД - Враца', 'sgfsdfvsdfvsdf', '2015-11-18', '2015-11-18', NULL, '2015-11-22'),
(30, 'new', 'Rateit Sistem', 'Thank you <strong> new </strong> !', 'Thank you <strong> new </strong> for signing up to our site!<br />This is an automatically generated welcome message to new users of the site', '2015-11-18', '2015-11-18', NULL, NULL),
(31, 'Rateit Sistem', 'Rateit Sistem', 'Thank you <strong> Rateit Sistem </strong> !', 'Thank you <strong> Rateit Sistem </strong> for signing up to our site!<br />This is an automatically generated welcome message to new users of the site', '2015-11-18', '2015-11-18', NULL, NULL),
(32, 'peter', 'ipetrovbg', 'sdfads', 'advadf', '2015-11-22', '2015-11-22', NULL, NULL),
(33, 'pppp', 'Rateit Sistem', 'Thank you <strong> pppp </strong> !', 'Thank you <strong> pppp </strong> for signing up to our site!<br />This is an automatically generated welcome message to new users of the site', '2015-11-22', '2015-11-22', NULL, NULL);

-- --------------------------------------------------------

--
-- Структура на таблица `members`
--

CREATE TABLE IF NOT EXISTS `members` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `full_name` varchar(150) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pic` varchar(255) DEFAULT 'null',
  `rights` smallint(6) NOT NULL DEFAULT '0',
  `date` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=89 ;

--
-- Схема на данните от таблица `members`
--

INSERT INTO `members` (`id`, `username`, `password`, `full_name`, `email`, `pic`, `rights`, `date`) VALUES
(77, 'ipetrovbg', '516b9783fca517eecbd1d064da2d165310b19759', 'Петър Петров', 'ipetrovbg@gmail.com', 'assets/profile/new_me.jpg', 2, '2015-11-09 22:21'),
(79, 'iveto89', '66c8d1d406805bc93cead86dac5f4f3cfeb44fe0', 'Iva ', 'ivetoo89@gmail.com', 'assets/images/default_pic.png', 0, '2015-11-09 22:33'),
(80, 'peter', '516b9783fca517eecbd1d064da2d165310b19759', 'Petar Petrov', 'peter@abv.bg', 'assets/profile/new_pic7.jpg', 1, '2015-11-10 09:46'),
(81, 'natalia', 'd1854cae891ec7b29161ccaf79a24b00c274bdaa', 'natalia', 'natalia@abv.bg', 'assets/profile/new_6.jpg', 0, '2015-11-10 09:50'),
(85, 'p', '516b9783fca517eecbd1d064da2d165310b19759', 'p', 'peeeewwwwter_ml@abv.bg', 'assets/images/default_pic.png', 1, '2015-11-10 22:02'),
(86, 'new', 'd1854cae891ec7b29161ccaf79a24b00c274bdaa', 'jhgkjhgkjg', 'new@gfmreail.com', 'assets/images/default_pic.png', 0, '2015-11-18 21:46'),
(87, 'Rateit Sistem', '4dc7c9ec434ed06502767136789763ec11d2c4b7', 'Rateit Sistem', 'rateit@rateit.com', 'assets/images/default_pic.png', 2, '2015-11-18 21:48'),
(88, 'pppp', '516b9783fca517eecbd1d064da2d165310b19759', 'wergwtr', 'ipetrdsfsdvsdvdfvddsfovbg@gmsdfvail.com', 'assets/images/default_pic.png', 0, '2015-11-22 12:14');

-- --------------------------------------------------------

--
-- Структура на таблица `pubs`
--

CREATE TABLE IF NOT EXISTS `pubs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `id_member` int(11) NOT NULL,
  `id_category` int(11) NOT NULL,
  `date_added` varchar(200) NOT NULL,
  `date_deleted` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Схема на данните от таблица `pubs`
--

INSERT INTO `pubs` (`id`, `title`, `description`, `id_member`, `id_category`, `date_added`, `date_deleted`) VALUES
(1, 'ersgsdf', 'asgrvzdx', 77, 8, '2015-11-26', NULL),
(2, 'afsdzdxc', 'sdvxc', 77, 8, '2015-11-26', NULL),
(3, 'aregarf', 'sgvd', 77, 8, '2015-11-26', NULL),
(4, 'argfs', 'aref', 77, 8, '2015-11-26', NULL),
(5, 'asrgs', 'aerfd', 77, 8, '2015-11-26', NULL),
(6, 'ergfd', 'wARSD', 77, 8, '2015-11-26', NULL),
(7, 'RTHBXF', 'AREF', 77, 8, '2015-11-26', NULL),
(8, 'ERGHSFG', 'AREFD', 77, 8, '2015-11-26', NULL),
(9, 'RESG', 'EARZFD', 77, 8, '2015-11-26', NULL),
(10, 'ESRDFVSEDF', 'ARWSDF', 77, 8, '2015-11-26', NULL);

-- --------------------------------------------------------

--
-- Структура на таблица `pubs_pictures`
--

CREATE TABLE IF NOT EXISTS `pubs_pictures` (
  `id_file` int(11) NOT NULL AUTO_INCREMENT,
  `id_pub` int(11) NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 NOT NULL,
  `id_user` int(11) NOT NULL,
  `file_key` varchar(255) CHARACTER SET utf8 NOT NULL,
  `img_path` varchar(255) CHARACTER SET utf8 NOT NULL,
  `date_added` date NOT NULL,
  `date_deleted` date NOT NULL,
  PRIMARY KEY (`id_file`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf32 AUTO_INCREMENT=91 ;

--
-- Схема на данните от таблица `pubs_pictures`
--

INSERT INTO `pubs_pictures` (`id_file`, `id_pub`, `title`, `id_user`, `file_key`, `img_path`, `date_added`, `date_deleted`) VALUES
(1, 0, 'ersgsdf', 77, 'origin_size', '00-Pejzazh1.jpg', '2015-11-26', '0000-00-00'),
(2, 0, 'ersgsdf', 77, 'crop451x145', 'crop451x145_height300_00-Pejzazh1.jpg', '2015-11-26', '0000-00-00'),
(3, 0, 'ersgsdf', 77, 'crop300x400', 'crop300x400_height400_00-Pejzazh1.jpg', '2015-11-26', '0000-00-00'),
(4, 0, 'ersgsdf', 77, 'crop200x250', 'crop200x250_height250_00-Pejzazh1.jpg', '2015-11-26', '0000-00-00'),
(5, 0, 'ersgsdf', 77, 'crop1200x497', 'crop1200x497_width1200_00-Pejzazh1.jpg', '2015-11-26', '0000-00-00'),
(6, 0, 'ersgsdf', 77, 'crop195x195', 'crop195x195_height229_00-Pejzazh1.jpg', '2015-11-26', '0000-00-00'),
(7, 0, 'ersgsdf', 77, 'crop200', 'crop200_height229_00-Pejzazh1.jpg', '2015-11-26', '0000-00-00'),
(8, 0, 'ersgsdf', 77, 'height497', 'height300_00-Pejzazh1.jpg', '2015-11-26', '0000-00-00'),
(9, 0, 'ersgsdf', 77, 'height229', 'height229_00-Pejzazh1.jpg', '2015-11-26', '0000-00-00'),
(10, 0, 'afsdzdxc', 77, 'origin_size', '07.jpg', '2015-11-26', '0000-00-00'),
(11, 0, 'afsdzdxc', 77, 'crop451x145', 'crop451x145_height300_07.jpg', '2015-11-26', '0000-00-00'),
(12, 0, 'afsdzdxc', 77, 'crop300x400', 'crop300x400_height400_07.jpg', '2015-11-26', '0000-00-00'),
(13, 0, 'afsdzdxc', 77, 'crop200x250', 'crop200x250_height250_07.jpg', '2015-11-26', '0000-00-00'),
(14, 0, 'afsdzdxc', 77, 'crop1200x497', 'crop1200x497_width1200_07.jpg', '2015-11-26', '0000-00-00'),
(15, 0, 'afsdzdxc', 77, 'crop195x195', 'crop195x195_height229_07.jpg', '2015-11-26', '0000-00-00'),
(16, 0, 'afsdzdxc', 77, 'crop200', 'crop200_height229_07.jpg', '2015-11-26', '0000-00-00'),
(17, 0, 'afsdzdxc', 77, 'height497', 'height300_07.jpg', '2015-11-26', '0000-00-00'),
(18, 0, 'afsdzdxc', 77, 'height229', 'height229_07.jpg', '2015-11-26', '0000-00-00'),
(19, 0, 'aregarf', 77, 'origin_size', '9012d7cad56c8efe4fac5bd7ea2.jpg', '2015-11-26', '0000-00-00'),
(20, 0, 'aregarf', 77, 'crop451x145', 'crop451x145_height300_9012d7cad56c8efe4fac5bd7ea2.jpg', '2015-11-26', '0000-00-00'),
(21, 0, 'aregarf', 77, 'crop300x400', 'crop300x400_height400_9012d7cad56c8efe4fac5bd7ea2.jpg', '2015-11-26', '0000-00-00'),
(22, 0, 'aregarf', 77, 'crop200x250', 'crop200x250_height250_9012d7cad56c8efe4fac5bd7ea2.jpg', '2015-11-26', '0000-00-00'),
(23, 0, 'aregarf', 77, 'crop1200x497', 'crop1200x497_width1200_9012d7cad56c8efe4fac5bd7ea2.jpg', '2015-11-26', '0000-00-00'),
(24, 0, 'aregarf', 77, 'crop195x195', 'crop195x195_height229_9012d7cad56c8efe4fac5bd7ea2.jpg', '2015-11-26', '0000-00-00'),
(25, 0, 'aregarf', 77, 'crop200', 'crop200_height229_9012d7cad56c8efe4fac5bd7ea2.jpg', '2015-11-26', '0000-00-00'),
(26, 0, 'aregarf', 77, 'height497', 'height300_9012d7cad56c8efe4fac5bd7ea2.jpg', '2015-11-26', '0000-00-00'),
(27, 0, 'aregarf', 77, 'height229', 'height229_9012d7cad56c8efe4fac5bd7ea2.jpg', '2015-11-26', '0000-00-00'),
(28, 0, 'argfs', 77, 'origin_size', '2767298.jpg', '2015-11-26', '0000-00-00'),
(29, 0, 'argfs', 77, 'crop451x145', 'crop451x145_height300_2767298.jpg', '2015-11-26', '0000-00-00'),
(30, 0, 'argfs', 77, 'crop300x400', 'crop300x400_height400_2767298.jpg', '2015-11-26', '0000-00-00'),
(31, 0, 'argfs', 77, 'crop200x250', 'crop200x250_height250_2767298.jpg', '2015-11-26', '0000-00-00'),
(32, 0, 'argfs', 77, 'crop1200x497', 'crop1200x497_width1200_2767298.jpg', '2015-11-26', '0000-00-00'),
(33, 0, 'argfs', 77, 'crop195x195', 'crop195x195_height229_2767298.jpg', '2015-11-26', '0000-00-00'),
(34, 0, 'argfs', 77, 'crop200', 'crop200_height229_2767298.jpg', '2015-11-26', '0000-00-00'),
(35, 0, 'argfs', 77, 'height497', 'height300_2767298.jpg', '2015-11-26', '0000-00-00'),
(36, 0, 'argfs', 77, 'height229', 'height229_2767298.jpg', '2015-11-26', '0000-00-00'),
(37, 0, 'asrgs', 77, 'origin_size', 'fototapet-morski-pejzash.jpg', '2015-11-26', '0000-00-00'),
(38, 0, 'asrgs', 77, 'crop451x145', 'crop451x145_height300_fototapet-morski-pejzash.jpg', '2015-11-26', '0000-00-00'),
(39, 0, 'asrgs', 77, 'crop300x400', 'crop300x400_height400_fototapet-morski-pejzash.jpg', '2015-11-26', '0000-00-00'),
(40, 0, 'asrgs', 77, 'crop200x250', 'crop200x250_height250_fototapet-morski-pejzash.jpg', '2015-11-26', '0000-00-00'),
(41, 0, 'asrgs', 77, 'crop1200x497', 'crop1200x497_width1200_fototapet-morski-pejzash.jpg', '2015-11-26', '0000-00-00'),
(42, 0, 'asrgs', 77, 'crop195x195', 'crop195x195_height229_fototapet-morski-pejzash.jpg', '2015-11-26', '0000-00-00'),
(43, 0, 'asrgs', 77, 'crop200', 'crop200_height229_fototapet-morski-pejzash.jpg', '2015-11-26', '0000-00-00'),
(44, 0, 'asrgs', 77, 'height497', 'height300_fototapet-morski-pejzash.jpg', '2015-11-26', '0000-00-00'),
(45, 0, 'asrgs', 77, 'height229', 'height229_fototapet-morski-pejzash.jpg', '2015-11-26', '0000-00-00'),
(46, 0, 'ergfd', 77, 'origin_size', 'i_1316288259_IMG_5510.jpg', '2015-11-26', '0000-00-00'),
(47, 0, 'ergfd', 77, 'crop451x145', 'crop451x145_height300_i_1316288259_IMG_5510.jpg', '2015-11-26', '0000-00-00'),
(48, 0, 'ergfd', 77, 'crop300x400', 'crop300x400_height400_i_1316288259_IMG_5510.jpg', '2015-11-26', '0000-00-00'),
(49, 0, 'ergfd', 77, 'crop200x250', 'crop200x250_height250_i_1316288259_IMG_5510.jpg', '2015-11-26', '0000-00-00'),
(50, 0, 'ergfd', 77, 'crop1200x497', 'crop1200x497_width1200_i_1316288259_IMG_5510.jpg', '2015-11-26', '0000-00-00'),
(51, 0, 'ergfd', 77, 'crop195x195', 'crop195x195_height229_i_1316288259_IMG_5510.jpg', '2015-11-26', '0000-00-00'),
(52, 0, 'ergfd', 77, 'crop200', 'crop200_height229_i_1316288259_IMG_5510.jpg', '2015-11-26', '0000-00-00'),
(53, 0, 'ergfd', 77, 'height497', 'height300_i_1316288259_IMG_5510.jpg', '2015-11-26', '0000-00-00'),
(54, 0, 'ergfd', 77, 'height229', 'height229_i_1316288259_IMG_5510.jpg', '2015-11-26', '0000-00-00'),
(55, 0, 'RTHBXF', 77, 'origin_size', 'oboi-na_ru_20110305_005.jpg', '2015-11-26', '0000-00-00'),
(56, 0, 'RTHBXF', 77, 'crop451x145', 'crop451x145_height300_oboi-na_ru_20110305_005.jpg', '2015-11-26', '0000-00-00'),
(57, 0, 'RTHBXF', 77, 'crop300x400', 'crop300x400_height400_oboi-na_ru_20110305_005.jpg', '2015-11-26', '0000-00-00'),
(58, 0, 'RTHBXF', 77, 'crop200x250', 'crop200x250_height250_oboi-na_ru_20110305_005.jpg', '2015-11-26', '0000-00-00'),
(59, 0, 'RTHBXF', 77, 'crop1200x497', 'crop1200x497_width1200_oboi-na_ru_20110305_005.jpg', '2015-11-26', '0000-00-00'),
(60, 0, 'RTHBXF', 77, 'crop195x195', 'crop195x195_height229_oboi-na_ru_20110305_005.jpg', '2015-11-26', '0000-00-00'),
(61, 0, 'RTHBXF', 77, 'crop200', 'crop200_height229_oboi-na_ru_20110305_005.jpg', '2015-11-26', '0000-00-00'),
(62, 0, 'RTHBXF', 77, 'height497', 'height300_oboi-na_ru_20110305_005.jpg', '2015-11-26', '0000-00-00'),
(63, 0, 'RTHBXF', 77, 'height229', 'height229_oboi-na_ru_20110305_005.jpg', '2015-11-26', '0000-00-00'),
(64, 0, 'ERGHSFG', 77, 'origin_size', 'p.jpg', '2015-11-26', '0000-00-00'),
(65, 0, 'ERGHSFG', 77, 'crop451x145', 'crop451x145_height300_p.jpg', '2015-11-26', '0000-00-00'),
(66, 0, 'ERGHSFG', 77, 'crop300x400', 'crop300x400_height400_p.jpg', '2015-11-26', '0000-00-00'),
(67, 0, 'ERGHSFG', 77, 'crop200x250', 'crop200x250_height250_p.jpg', '2015-11-26', '0000-00-00'),
(68, 0, 'ERGHSFG', 77, 'crop1200x497', 'crop1200x497_width1200_p.jpg', '2015-11-26', '0000-00-00'),
(69, 0, 'ERGHSFG', 77, 'crop195x195', 'crop195x195_height229_p.jpg', '2015-11-26', '0000-00-00'),
(70, 0, 'ERGHSFG', 77, 'crop200', 'crop200_height229_p.jpg', '2015-11-26', '0000-00-00'),
(71, 0, 'ERGHSFG', 77, 'height497', 'height300_p.jpg', '2015-11-26', '0000-00-00'),
(72, 0, 'ERGHSFG', 77, 'height229', 'height229_p.jpg', '2015-11-26', '0000-00-00'),
(73, 0, 'RESG', 77, 'origin_size', 'sdvdf.jpg', '2015-11-26', '0000-00-00'),
(74, 0, 'RESG', 77, 'crop451x145', 'crop451x145_height300_sdvdf.jpg', '2015-11-26', '0000-00-00'),
(75, 0, 'RESG', 77, 'crop300x400', 'crop300x400_height400_sdvdf.jpg', '2015-11-26', '0000-00-00'),
(76, 0, 'RESG', 77, 'crop200x250', 'crop200x250_height250_sdvdf.jpg', '2015-11-26', '0000-00-00'),
(77, 0, 'RESG', 77, 'crop1200x497', 'crop1200x497_width1200_sdvdf.jpg', '2015-11-26', '0000-00-00'),
(78, 0, 'RESG', 77, 'crop195x195', 'crop195x195_height229_sdvdf.jpg', '2015-11-26', '0000-00-00'),
(79, 0, 'RESG', 77, 'crop200', 'crop200_height229_sdvdf.jpg', '2015-11-26', '0000-00-00'),
(80, 0, 'RESG', 77, 'height497', 'height300_sdvdf.jpg', '2015-11-26', '0000-00-00'),
(81, 0, 'RESG', 77, 'height229', 'height229_sdvdf.jpg', '2015-11-26', '0000-00-00'),
(82, 0, 'ESRDFVSEDF', 77, 'origin_size', 'the_lost_lagoon.jpg', '2015-11-26', '0000-00-00'),
(83, 0, 'ESRDFVSEDF', 77, 'crop451x145', 'crop451x145_height300_the_lost_lagoon.jpg', '2015-11-26', '0000-00-00'),
(84, 0, 'ESRDFVSEDF', 77, 'crop300x400', 'crop300x400_height400_the_lost_lagoon.jpg', '2015-11-26', '0000-00-00'),
(85, 0, 'ESRDFVSEDF', 77, 'crop200x250', 'crop200x250_height250_the_lost_lagoon.jpg', '2015-11-26', '0000-00-00'),
(86, 0, 'ESRDFVSEDF', 77, 'crop1200x497', 'crop1200x497_width1200_the_lost_lagoon.jpg', '2015-11-26', '0000-00-00'),
(87, 0, 'ESRDFVSEDF', 77, 'crop195x195', 'crop195x195_height229_the_lost_lagoon.jpg', '2015-11-26', '0000-00-00'),
(88, 0, 'ESRDFVSEDF', 77, 'crop200', 'crop200_height229_the_lost_lagoon.jpg', '2015-11-26', '0000-00-00'),
(89, 0, 'ESRDFVSEDF', 77, 'height497', 'height300_the_lost_lagoon.jpg', '2015-11-26', '0000-00-00'),
(90, 0, 'ESRDFVSEDF', 77, 'height229', 'height229_the_lost_lagoon.jpg', '2015-11-26', '0000-00-00');

-- --------------------------------------------------------

--
-- Структура на таблица `rating`
--

CREATE TABLE IF NOT EXISTS `rating` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_pub` int(11) NOT NULL,
  `id_member` int(11) NOT NULL,
  `stars` int(11) NOT NULL,
  `date_added` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;

--
-- Схема на данните от таблица `rating`
--

INSERT INTO `rating` (`id`, `id_pub`, `id_member`, `stars`, `date_added`) VALUES
(1, 333, 87, 5, '2015-11-18'),
(2, 555, 87, 5, '2015-11-18'),
(3, 555, 77, 5, '2015-11-19'),
(4, 333, 77, 4, '2015-11-19'),
(5, 222, 77, 5, '2015-11-19'),
(6, 555, 85, 5, '2015-11-22'),
(7, 555, 86, 5, '2015-11-22'),
(8, 111, 77, 5, '2015-11-22'),
(9, 0, 77, 5, '2015-11-23'),
(10, 33, 77, 5, '2015-11-23'),
(11, 34, 77, 5, '2015-11-23'),
(12, 8, 77, 5, '2015-11-26'),
(13, 10, 77, 5, '2015-11-26'),
(14, 1, 77, 5, '2015-11-26'),
(15, 2, 77, 5, '2015-11-26'),
(16, 3, 77, 5, '2015-11-26'),
(17, 4, 77, 5, '2015-11-26');

-- --------------------------------------------------------

--
-- Структура на таблица `user_agent`
--

CREATE TABLE IF NOT EXISTS `user_agent` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_member` int(11) NOT NULL,
  `page` varchar(300) NOT NULL,
  `ip` varchar(255) NOT NULL,
  `date_added` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_member` (`id_member`),
  KEY `id_member_2` (`id_member`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
