-- phpMyAdmin SQL Dump
-- version 4.0.10.7
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Време на генериране: 14 ное 2015 в 10:33
-- Версия на сървъра: 5.5.42-cll
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
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- Схема на данните от таблица `mails`
--

INSERT INTO `mails` (`id`, `receiver`, `sender`, `title`, `message`, `readed`, `date_added`, `deleted_receiver`, `delete_sender`) VALUES
(9, 'iveto89', 'ipetrovbg', 'Hello :)', ';)', '2015-11-09', '2015-11-09', NULL, NULL),
(10, 'Ipetrovbg', 'p', 'Some message', 'Content of message', '2015-11-10', '2015-11-10', '2015-11-13', '2015-11-10'),
(11, 'p', 'ipetrovbg', 'liuyiuy pui', 'lu hliu hoiu yoiuy iluyoiu', '2015-11-10', '2015-11-10', '2015-11-10', '2015-11-13'),
(13, 'p', 'Rateit Sistem', 'Thank you p !', 'Thank you p for signing up to our site!<br />This is an automatically generated welcome message to new users of the site', '2015-11-10', '2015-11-10', NULL, NULL),
(14, 'customer', 'Rateit Sistem', 'Thank you customer !', 'Thank you customer for signing up to our site!<br />This is an automatically generated welcome message to new users of the site', '2015-11-10', '2015-11-10', NULL, NULL),
(15, 'ipetrovbg', 'peter', 'asgsdf', 'sfvsdfvfv', '2015-11-10', '2015-11-10', '2015-11-13', NULL),
(16, 'natalia', 'ipetrovbg', 'rgser', 'sergrt', '2015-11-10', '2015-11-10', NULL, '2015-11-13');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=87 ;

--
-- Схема на данните от таблица `members`
--

INSERT INTO `members` (`id`, `username`, `password`, `full_name`, `email`, `pic`, `rights`, `date`) VALUES
(77, 'ipetrovbg', '516b9783fca517eecbd1d064da2d165310b19759', 'Петър Петров', 'ipetrovbg@gmail.com', 'assets/profile/new_11586120221.png', 2, '2015-11-09 22:21'),
(79, 'iveto89', '66c8d1d406805bc93cead86dac5f4f3cfeb44fe0', 'Iva ', 'ivetoo89@gmail.com', 'assets/images/default_pic.png', 0, '2015-11-09 22:33'),
(80, 'peter', '516b9783fca517eecbd1d064da2d165310b19759', 'Petar Petrov', 'peter@abv.bg', 'assets/profile/new_7.jpg', 0, '2015-11-10 09:46'),
(81, 'natalia', 'd1854cae891ec7b29161ccaf79a24b00c274bdaa', 'natalia', 'natalia@abv.bg', 'assets/profile/new_6.jpg', 0, '2015-11-10 09:50'),
(85, 'p', '516b9783fca517eecbd1d064da2d165310b19759', 'p', 'peeeewwwwter_ml@abv.bg', 'assets/images/default_pic.png', 0, '2015-11-10 22:02'),
(86, 'customer', '84a516841ba77a5b4648de2cd0dfcb30ea46dbb4', 'common customer', 'carinkavr@abv.bg', 'assets/images/default_pic.png', 0, '2015-11-10 22:04');

-- --------------------------------------------------------

--
-- Структура на таблица `pubs`
--

CREATE TABLE IF NOT EXISTS `pubs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `id_member` int(11) NOT NULL,
  `picture` int(255) NOT NULL,
  `thumb_picture` int(255) NOT NULL,
  `id_category` int(11) NOT NULL,
  `date_added` varchar(200) NOT NULL,
  `date_deleted` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=44 ;

--
-- Схема на данните от таблица `rating`
--

INSERT INTO `rating` (`id`, `id_pub`, `id_member`, `stars`, `date_added`) VALUES
(43, 111, 77, 5, '2015-11-14'),
(42, 222, 77, 5, '2015-11-14'),
(41, 111, 85, 5, '2015-11-14'),
(40, 222, 85, 2, '2015-11-14'),
(39, 111, 81, 5, '2015-11-14'),
(38, 222, 81, 5, '2015-11-14');

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
