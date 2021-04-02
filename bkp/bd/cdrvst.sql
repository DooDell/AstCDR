-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 27, 2015 at 04:15 PM
-- Server version: 5.5.41
-- PHP Version: 5.3.10-1ubuntu3.18

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cdrvst`
--

-- --------------------------------------------------------

--
-- Table structure for table `automatic_records`
--

CREATE TABLE IF NOT EXISTS `automatic_records` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(25) COLLATE latin1_general_cs NOT NULL,
  `initialdate` datetime NOT NULL,
  `finaldate` datetime NOT NULL,
  `web_audiopath` varchar(255) COLLATE latin1_general_cs NOT NULL,
  `asterisk_audiopath` varchar(255) COLLATE latin1_general_cs NOT NULL,
  `downloaded` int(1) DEFAULT '0',
  `type` int(8) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `type` (`type`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `pbxip_blacklist`
--

CREATE TABLE IF NOT EXISTS `pbxip_blacklist` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `telefone` varchar(20) NOT NULL,
  `data_cadastro` datetime NOT NULL,
  `obs` text,
  `id_usuario` int(11) DEFAULT NULL,
  `fg_recebimento` char(1) NOT NULL DEFAULT 'N',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

-- --------------------------------------------------------

--
-- Table structure for table `pbxip_cdr`
--

CREATE TABLE IF NOT EXISTS `pbxip_cdr` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `calldate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `clid` varchar(80) NOT NULL DEFAULT '',
  `src` varchar(80) NOT NULL DEFAULT '',
  `dst` varchar(80) NOT NULL DEFAULT '',
  `dcontext` varchar(80) NOT NULL DEFAULT '',
  `channel` varchar(80) NOT NULL DEFAULT '',
  `dstchannel` varchar(80) NOT NULL DEFAULT '',
  `lastapp` varchar(80) NOT NULL DEFAULT '',
  `lastdata` varchar(80) NOT NULL DEFAULT '',
  `duration` int(11) NOT NULL DEFAULT '0',
  `billsec` int(11) NOT NULL DEFAULT '0',
  `disposition` varchar(45) NOT NULL DEFAULT '',
  `amaflags` int(11) NOT NULL DEFAULT '0',
  `accountcode` varchar(20) NOT NULL DEFAULT '',
  `userfield` varchar(255) NOT NULL DEFAULT '',
  `enviado` char(1) NOT NULL DEFAULT 'N',
  `uniqueid` varchar(32) NOT NULL DEFAULT '',
  `fluxo` varchar(100) DEFAULT NULL,
  `custo` double(10,2) DEFAULT '0.00',
  `id_tlmkt` int(9) DEFAULT NULL,
  `nif` varchar(20) DEFAULT NULL,
  `audiofile` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `calldate` (`calldate`),
  KEY `dst` (`dst`),
  KEY `accountcode` (`accountcode`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=258 ;

-- --------------------------------------------------------

--
-- Table structure for table `pbxip_psa`
--

CREATE TABLE IF NOT EXISTS `pbxip_psa` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_chamada` varchar(150) DEFAULT NULL,
  `calldate` datetime DEFAULT '0000-00-00 00:00:00',
  `ramal` varchar(80) DEFAULT '',
  `nota1` varchar(80) DEFAULT '',
  `servico` varchar(80) DEFAULT '',
  `nota2` varchar(80) DEFAULT '',
  `agent_code` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `calldate` (`calldate`),
  KEY `ramal` (`ramal`),
  KEY `servico` (`servico`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=105 ;

-- --------------------------------------------------------

--
-- Table structure for table `pbxip_tarifas`
--

CREATE TABLE IF NOT EXISTS `pbxip_tarifas` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `fluxo` varchar(20) DEFAULT NULL,
  `valor` double(10,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

-- --------------------------------------------------------

--
-- Table structure for table `record_types`
--

CREATE TABLE IF NOT EXISTS `record_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(25) COLLATE latin1_general_cs NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tab_callinfo`
--

CREATE TABLE IF NOT EXISTS `tab_callinfo` (
  `uniqueid` varchar(100) NOT NULL DEFAULT '',
  `server` varchar(50) DEFAULT NULL,
  `state` varchar(20) DEFAULT NULL,
  `calldate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `clid` varchar(50) DEFAULT NULL,
  `link` varchar(200) DEFAULT NULL,
  `tipo_ura` int(11) DEFAULT NULL,
  `enddate` datetime DEFAULT NULL,
  `transferred` tinyint(1) DEFAULT NULL,
  `typing` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`uniqueid`,`calldate`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tab_interaction`
--

CREATE TABLE IF NOT EXISTS `tab_interaction` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniqueid` varchar(100) DEFAULT NULL,
  `cd_menu` int(11) DEFAULT NULL,
  `palavra` varchar(200) NOT NULL DEFAULT '',
  `score` int(11) DEFAULT NULL,
  `threshold` int(11) DEFAULT NULL,
  `dt_acesso` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `grammar` varchar(260) DEFAULT NULL,
  `utterance` varchar(260) DEFAULT NULL,
  `event` varchar(10) DEFAULT NULL,
  `confirmation` tinyint(1) DEFAULT NULL,
  `confirmation_palavra` varchar(10) DEFAULT NULL,
  `confirmation_score` int(11) DEFAULT NULL,
  `confirmation_event` varchar(10) DEFAULT NULL,
  `confirmation_threshold` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`,`dt_acesso`),
  KEY `uniqueid` (`uniqueid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
