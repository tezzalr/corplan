-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 29, 2014 at 03:23 AM
-- Server version: 5.6.14
-- PHP Version: 5.5.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `corplan`
--

-- --------------------------------------------------------

--
-- Table structure for table `dependency`
--

CREATE TABLE IF NOT EXISTS `dependency` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `initiative_1` int(11) NOT NULL,
  `initiative_2` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `initiative`
--

CREATE TABLE IF NOT EXISTS `initiative` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(600) NOT NULL,
  `program_id` int(11) NOT NULL,
  `code` varchar(200) NOT NULL,
  `tier` int(11) NOT NULL,
  `start` date DEFAULT NULL,
  `end` date DEFAULT NULL,
  `dependencies` varchar(600) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=35 ;

--
-- Dumping data for table `initiative`
--

INSERT INTO `initiative` (`id`, `title`, `program_id`, `code`, `tier`, `start`, `end`, `dependencies`) VALUES
(2, 'Align and Map (existing) Client Tiering', 1, '1.1.A', 1, '2014-07-01', '2014-12-01', ''),
(3, 'Define Service Point; Formalize and Unify SLAs', 1, '1.1.B', 1, '2014-08-01', '2015-05-01', ''),
(4, 'Build Out Sector Branding', 3, '1.3.A', 2, '2015-01-14', '2016-05-31', ''),
(5, 'Upgrade Capital Markets Offering', 4, '1.4.E', 3, '2014-04-01', '2015-12-01', ''),
(6, 'Upgrade SCF', 4, '1.4.A', 1, '2014-03-21', '2016-11-01', ''),
(10, 'Enhance Service Levels', 1, '1.1.C', 0, '2015-05-01', '2015-11-01', ''),
(11, 'Implement Full CST Service Model', 1, '1.1.E', 0, '2014-11-01', '2016-11-01', ''),
(12, 'Establish Credit Analyst Team', 1, '1.1.D', 0, '2014-06-01', '2014-12-01', ''),
(13, 'Upgrade CRM', 5, '1.5.B', 0, '2014-09-17', '2015-07-01', ''),
(14, 'Design and roll out integrated customer portal', 1, '1.1.F', 0, '2016-07-01', '2017-03-01', ''),
(15, 'Wholesale portfolio segmentation', 2, '1.2.A', 0, '2014-06-01', '2014-07-01', ''),
(16, 'Complete pilots for healthcare & ports and full roll out', 2, '1.2.B', 0, '2014-08-01', '2015-08-01', ''),
(17, 'Formalize & launch proposition of the 4 remaining sectors', 2, '1.2.C', 0, '2014-11-01', '2016-05-01', ''),
(18, 'Upgrade RM competency', 3, '1.3.B', 0, '2014-07-01', '2015-12-01', ''),
(19, 'Enhance information support', 3, '1.3.C', 0, '2015-01-01', '2015-07-01', ''),
(20, 'Upgrade MCM', 4, '1.4.B', 0, '2014-03-14', NULL, ''),
(21, 'Upgrade trade finance', 4, '1.4.C', 0, '2014-09-01', '2015-11-01', ''),
(22, 'Build out structured finance', 4, '1.4.D', 0, '2014-07-01', '2015-12-01', ''),
(23, 'Uparade Cross Border Offering', 4, '1.4.F', 0, '2014-04-01', '2015-12-01', ''),
(24, 'Upgrade FICS offering', 4, '1.4.G', 0, '2014-04-01', '2015-12-01', ''),
(25, 'Quick Fix for MCM (& SCF)', 4, '1.4.H', 0, '2014-09-01', '2014-11-01', ''),
(26, 'Priority client value chain solutions', 4, '1.4.I', 0, NULL, NULL, ''),
(27, 'Improve data management, capture and access', 5, '1.5.A', 0, '2015-01-01', '2015-07-01', ''),
(28, 'Upgrade MIS', 5, '1.5.C', 0, NULL, NULL, ''),
(29, 'Establish pricing strategy, map clients, formalize pricing policies', 7, '1.6.A', 0, '2016-11-01', '2017-04-01', ''),
(30, 'Establish pricing intelligence function', 7, '1.6.B', 0, NULL, NULL, ''),
(31, 'Pricing tool review and upgrade', 7, '1.6.C', 0, '2016-02-01', NULL, ''),
(32, '0', 0, '0', 0, NULL, NULL, '0'),
(33, '0', 0, '0', 0, NULL, NULL, '0'),
(34, '0', 0, '0', 0, NULL, NULL, '0');

-- --------------------------------------------------------

--
-- Table structure for table `milestone`
--

CREATE TABLE IF NOT EXISTS `milestone` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(600) NOT NULL,
  `start` date DEFAULT NULL,
  `end` date NOT NULL,
  `status` varchar(600) NOT NULL,
  `workblock_id` int(11) NOT NULL,
  `revised` date DEFAULT NULL,
  `reason` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=35 ;

--
-- Dumping data for table `milestone`
--

INSERT INTO `milestone` (`id`, `title`, `start`, `end`, `status`, `workblock_id`, `revised`, `reason`) VALUES
(25, 'Define the nature of the credit analyst function', NULL, '2014-07-03', 'Delay', 17, NULL, ''),
(26, 'Develop operating procedure related to credit analyst function', NULL, '2014-07-03', 'Delay', 17, NULL, ''),
(27, 'Pilot Project CA Function Implementation', NULL, '2015-01-14', 'In Progress', 17, NULL, ''),
(28, 'Interim evaluation', NULL, '2014-10-15', 'Not Started Yet', 17, NULL, ''),
(29, 'Mapping headcount CA within all organization', NULL, '2014-12-31', 'In Progress', 18, NULL, ''),
(30, 'Define source of manning fulfillment', NULL, '2014-12-31', 'Not Started Yet', 18, NULL, ''),
(31, 'Manning fulfillment CA', NULL, '2015-10-15', 'Not Started Yet', 18, NULL, ''),
(32, 'Detailing lending product team organization', NULL, '2015-03-31', 'Not Started Yet', 19, NULL, ''),
(33, 'Inventarisir CA dan RM berikut debitur yang dikelola', NULL, '2015-03-31', 'Not Started Yet', 19, NULL, ''),
(34, ' Block move CA to lending product team', NULL, '2015-10-15', 'Not Started Yet', 19, NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `program`
--

CREATE TABLE IF NOT EXISTS `program` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(600) NOT NULL,
  `code` varchar(600) NOT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `segment` varchar(600) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `program`
--

INSERT INTO `program` (`id`, `title`, `code`, `start_date`, `end_date`, `segment`) VALUES
(1, 'Enhance Service Excellence', '1.1', NULL, NULL, 'Wholesale'),
(2, 'Develop Sector Solutions', '1.2', NULL, NULL, 'Wholesale'),
(3, 'Build Out Sector Expertise', '1.3', NULL, NULL, 'Wholesale'),
(4, 'Enhance Product Suite', '1.4', NULL, NULL, 'Wholesale'),
(5, 'Upgrade CRM and MIS Tools', '1.5', NULL, NULL, 'Wholesale'),
(7, 'Develop Relationship Pricing', '1.6', NULL, NULL, 'Wholesale');

-- --------------------------------------------------------

--
-- Table structure for table `revised`
--

CREATE TABLE IF NOT EXISTS `revised` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `milestone_id` int(11) NOT NULL,
  `revised_date` date NOT NULL,
  `reason` text NOT NULL,
  `action` text NOT NULL,
  `aprv_PMO` date DEFAULT NULL,
  `aprv_GH` date DEFAULT NULL,
  `PMO_id` varchar(600) NOT NULL,
  `GH_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `PMO_cmnt` text NOT NULL,
  `GH_cmnt` text NOT NULL,
  `date_update` datetime NOT NULL,
  `desc_GH` varchar(600) DEFAULT NULL,
  `desc_PMO` varchar(600) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(600) NOT NULL,
  `password` varchar(600) NOT NULL,
  `name` varchar(600) NOT NULL,
  `role` varchar(600) NOT NULL,
  `segment` varchar(600) DEFAULT NULL,
  `jabatan` varchar(600) DEFAULT NULL,
  `initiative` varchar(600) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `name`, `role`, `segment`, `jabatan`, `initiative`) VALUES
(4, 'tezzalr', 'a6313405d7d34459bca505ebc6cebd93', 'Tezza Lantika Riyanto', 'admin', '0', NULL, NULL),
(5, 'nixon', '93be821e64ce643fd708112c77531da8', 'Nixon', 'PIC', NULL, 'GH', '1.3.A'),
(6, 'marita', '4aed0aa3acc1d77dd569aac8029bb84b', 'Marita', 'PIC', NULL, 'DH', '1.3.A'),
(12, 'gaby', '5f4dcc3b5aa765d61d8327deb882cf99', 'Gaby Valeria', 'PIC', 'Wholesale', 'GH', '1.1.A;1.1.B;1.1.C;1.1.E;1.3.C;1.5.A;1.6.A;1.6.B;1.6.C'),
(13, 'putu', '5f4dcc3b5aa765d61d8327deb882cf99', 'Putu Anandika', 'PIC', NULL, 'DH', '1.1.A;1.1.B;1.1.C;1.1.E;1.3.C;1.5.A;1.6.A;1.6.B;1.6.C'),
(14, 'ferry', '5f4dcc3b5aa765d61d8327deb882cf99', 'Ferry M Robbani', 'PIC', NULL, 'GH', '1.4.F;1.4.G'),
(15, 'henni', '5f4dcc3b5aa765d61d8327deb882cf99', 'Henni', 'PIC', NULL, 'DH', '1.4.G'),
(16, 'erwanza', '5f4dcc3b5aa765d61d8327deb882cf99', 'Erwanza', 'PIC', NULL, 'DH', '1.4.F'),
(17, 'mahesh', '5f4dcc3b5aa765d61d8327deb882cf99', 'Mahesh', 'PIC', NULL, 'GH', '1.1.F;1.5.B;1.5.C'),
(18, 'anita', '5f4dcc3b5aa765d61d8327deb882cf99', 'Anita Widjaja', 'PIC', NULL, 'GH', '1.3.B'),
(19, 'tommy', '5f4dcc3b5aa765d61d8327deb882cf99', 'Tommy', 'PIC', NULL, 'DH', '1.3.B'),
(20, 'setyowati', '5f4dcc3b5aa765d61d8327deb882cf99', 'Setyowati', 'PIC', NULL, 'GH', '1.1.D'),
(21, 'kepas', '5f4dcc3b5aa765d61d8327deb882cf99', 'Kepas', 'PIC', NULL, 'DH', '1.1.D'),
(22, 'andri', '5f4dcc3b5aa765d61d8327deb882cf99', 'Andri', 'PIC', NULL, 'GH', '1.2.B;1.4.A;1.4.B;1.4.C;1.4.H'),
(23, 'donny', '5f4dcc3b5aa765d61d8327deb882cf99', 'Donny Arsal', 'PIC', NULL, 'GH', '1.4.E'),
(24, 'andreas', '5f4dcc3b5aa765d61d8327deb882cf99', 'Andreas', 'PIC', NULL, 'DH', '1.4.E'),
(25, 'cera', '5f4dcc3b5aa765d61d8327deb882cf99', 'Cera', 'PIC', NULL, 'DH', '1.2.B;1.4.A'),
(26, 'prita', '5f4dcc3b5aa765d61d8327deb882cf99', 'Prita', 'PIC', NULL, 'DH', '1.4.B'),
(27, 'rustam', '5f4dcc3b5aa765d61d8327deb882cf99', 'Rustam', 'PIC', NULL, 'GH', '1.2.C'),
(28, 'tongki', '5f4dcc3b5aa765d61d8327deb882cf99', 'Tongki Lentari', 'PIC', NULL, 'DH', '1.2.C'),
(29, 'didiek', '5f4dcc3b5aa765d61d8327deb882cf99', 'Didiek H', 'PIC', NULL, 'GH', '1.4.D'),
(30, 'oktav', '5f4dcc3b5aa765d61d8327deb882cf99', 'Oktav', 'PIC', NULL, 'DH', '1.4.D'),
(31, 'yoyok', '804da344974611d34d496565f15376f4', 'Hermawan Soebagio', 'admin', NULL, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `workblock`
--

CREATE TABLE IF NOT EXISTS `workblock` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(600) NOT NULL,
  `start` date DEFAULT NULL,
  `end` date DEFAULT NULL,
  `objective` text,
  `initiative_id` int(11) NOT NULL,
  `pic` varchar(600) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=38 ;

--
-- Dumping data for table `workblock`
--

INSERT INTO `workblock` (`id`, `title`, `start`, `end`, `objective`, `initiative_id`, `pic`) VALUES
(17, 'Define the nature of the credit analyst', NULL, NULL, '', 12, ''),
(18, 'Develop staffing / recruiting model', NULL, NULL, '', 12, ''),
(19, 'Develop “migration” strategy', NULL, NULL, '', 12, ''),
(20, 'Determine product proposition', NULL, NULL, '', 23, ''),
(21, 'Business requirements including licensing and platforms', NULL, NULL, '', 23, ''),
(23, 'Investment requirements', NULL, NULL, '', 23, ''),
(24, 'Strategic planning (build strategy)', NULL, NULL, '', 23, ''),
(25, 'Business build', NULL, NULL, '', 23, ''),
(26, 'Peningkatan ijin Usaha Mandiri Sekuritas Singapore', NULL, NULL, '', 5, ''),
(27, 'Develop RFP', NULL, NULL, '', 6, ''),
(28, 'Vendor Selection', NULL, NULL, '', 6, ''),
(29, 'Business Requirement Design', NULL, NULL, '', 6, ''),
(30, 'System Development', NULL, NULL, '', 6, ''),
(31, 'Platform Migration (Phase 1)', NULL, NULL, '', 6, ''),
(32, 'SWOT analysis', NULL, NULL, '', 4, ''),
(33, ' Consumers Insight analysis', NULL, NULL, '', 4, ''),
(34, 'Bundling Build Branding strategy', NULL, NULL, '', 4, ''),
(35, 'Post Survey Branding Analysis and Review', NULL, NULL, '', 4, ''),
(36, 'Socialization New Branding', NULL, NULL, '', 4, ''),
(37, 'Upgrade MCM', NULL, NULL, '', 20, '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
