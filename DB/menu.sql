-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 27, 2014 at 12:22 PM
-- Server version: 5.5.24
-- PHP Version: 5.3.10-1ubuntu3.11

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `label` varchar(128) NOT NULL,
  `view` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `linkOption` text NOT NULL,
  `visibility` int(11) NOT NULL,
  `role` varchar(77) NOT NULL,
  `position` int(11) NOT NULL,
  `menu_group_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=50 ;




INSERT INTO `menu` (`id`, `label`, `view`, `url`, `linkOption`, `visibility`, `role`, `position`, `menu_group_id`) VALUES
(0, 'Home', '/site/index', '/site/index', 'js:alert();', 1, 'domain_users', 1, 1),
(46, 'Menus', '', '#', '', 1, 'domain_users', 1, 2),
(48, 'Home', '#', '/site/index', 'js:alert($(''#username'').val());', 1, 'domain_users', 0, 2);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
