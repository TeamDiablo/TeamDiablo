-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 11, 2012 at 05:13 AM
-- Server version: 5.5.25a-log
-- PHP Version: 5.4.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `pickupgame`
--

-- --------------------------------------------------------

--
-- Table structure for table `friends`
--

DROP TABLE IF EXISTS `acos`;
CREATE TABLE IF NOT EXISTS `acos` (
  `id` int(10) NOT NULL auto_increment,
  `parent_id` int(10) default NULL,
  `model` varchar(255) default NULL,
  `foreign_key` int(10) default NULL,
  `alias` varchar(255) default NULL,
  `lft` int(10) default NULL,
  `rght` int(10) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=253 ;


--
-- Table structure for table `aros`
--

DROP TABLE IF EXISTS `aros`;
CREATE TABLE IF NOT EXISTS `aros` (
  `id` int(10) NOT NULL auto_increment,
  `parent_id` int(10) default NULL,
  `model` varchar(255) default NULL,
  `foreign_key` int(10) default NULL,
  `alias` varchar(255) default NULL,
  `lft` int(10) default NULL,
  `rght` int(10) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;


CREATE TABLE IF NOT EXISTS `friends` (
  `pid1` int(11) NOT NULL,
  `pid2` int(11) NOT NULL,
  PRIMARY KEY (`pid1`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `game`
--


-- --------------------------------------------------------

--
-- Table structure for table `played`
--

CREATE TABLE IF NOT EXISTS `playeds` (
  `pid` int(11) NOT NULL,
  `gid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `player`
--

CREATE TABLE IF NOT EXISTS `players` (
  `pid` int(11) NOT NULL,
  `oid` int(11) NOT NULL,
  `location` varchar(40) NOT NULL,
  `skill` varchar(40) NOT NULL,
  `position` varchar(40) NOT NULL,
  `pref_sid` int(11) NOT NULL,
  PRIMARY KEY (`pid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE IF NOT EXISTS `ratings` (
  `pid` int(11) NOT NULL,
  `orate` int(11) NOT NULL,
  `prate` int(11) NOT NULL,
  PRIMARY KEY (`pid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sport`
--

CREATE TABLE IF NOT EXISTS `sports` (
  `sid` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  PRIMARY KEY (`sid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='sport types';

CREATE TABLE IF NOT EXISTS `games` (
  `gid` int(11) NOT NULL,
  `oid` int(11) NOT NULL,
  `sid` int(11) NOT NULL,
  `location` varchar(40) NOT NULL,
  `skill` varchar(40) NOT NULL,
  `numpeople` int(11) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  PRIMARY KEY (`gid`),
    FOREIGN KEY (`sid`) REFERENCES sports(sid)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
