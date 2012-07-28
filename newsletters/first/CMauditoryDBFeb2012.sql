-- phpMyAdmin SQL Dump
-- version 3.4.10.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 02, 2012 at 07:49 PM
-- Server version: 5.1.60
-- PHP Version: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `doctorj4_viewer`
--

DELIMITER $$
--
-- Procedures
--
DROP PROCEDURE IF EXISTS `not2closeProc`$$
CREATE DEFINER=`doctorj4`@`localhost` PROCEDURE `not2closeProc`( newdate DATETIME, newmail varchar(30), newuser varchar(30), newnews int(20), newcamp varchar(20), newcomp int(11),
newmsg varchar(200)  )
BEGIN
         DECLARE olddate DATETIME;
         SELECT max(i1.date) INTO olddate
         FROM image_click as i1
         WHERE i1.user = newuser
         AND i1.mail = newmail 
         AND i1.newsletter = newnews
         AND i1.campaign = newcamp
         AND i1.company = newcomp
	   AND i1.message = newmsg;
         IF (newdate - olddate < 60) THEN
               CALL pRaiseError("too close");
         END IF;
  
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `click_type`
--

DROP TABLE IF EXISTS `click_type`;
CREATE TABLE IF NOT EXISTS `click_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

DROP TABLE IF EXISTS `companies`;
CREATE TABLE IF NOT EXISTS `companies` (
  `id` int(11) NOT NULL,
  `nombre` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `image_click`
--

DROP TABLE IF EXISTS `image_click`;
CREATE TABLE IF NOT EXISTS `image_click` (
  `user` varchar(30) NOT NULL,
  `mail` varchar(30) NOT NULL,
  `date` datetime NOT NULL,
  `newsletter` int(20) NOT NULL,
  `campaign` varchar(20) NOT NULL,
  `country` varchar(30) NOT NULL,
  `company` int(11) DEFAULT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` int(11) NOT NULL DEFAULT '1',
  `message` varchar(200) NOT NULL DEFAULT 'none',
  PRIMARY KEY (`id`),
  KEY `newsletter` (`newsletter`),
  KEY `fk1` (`company`),
  KEY `type` (`type`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2601 ;

--
-- Triggers `image_click`
--
DROP TRIGGER IF EXISTS `not2Close`;
DELIMITER //
CREATE TRIGGER `not2Close` BEFORE INSERT ON `image_click`
 FOR EACH ROW BEGIN
CALL not2closeProc(new.date, new.mail , new.user, new.newsletter, new.campaign, new.company, new.message );
END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `newsletters`
--

DROP TABLE IF EXISTS `newsletters`;
CREATE TABLE IF NOT EXISTS `newsletters` (
  `newsletter_id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `company` int(11) DEFAULT NULL,
  PRIMARY KEY (`newsletter_id`),
  KEY `f2_k` (`company`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
