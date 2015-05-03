-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 03, 2015 at 12:22 PM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_rf`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_areas_sms`
--

CREATE TABLE IF NOT EXISTS `tbl_areas_sms` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(100) NOT NULL,
  `name` varchar(255) NOT NULL,
  `district` varchar(255) NOT NULL,
  `vdc_mun_id` int(11) NOT NULL,
  `ward` int(11) NOT NULL,
  `address` text NOT NULL,
  `location_category` int(11) NOT NULL,
  `population_male` int(11) NOT NULL,
  `population_female` int(11) NOT NULL,
  `population_children` int(11) NOT NULL,
  `population_adult` int(11) NOT NULL,
  `population_old` int(11) NOT NULL,
  `household` int(11) NOT NULL,
  `houses` int(11) NOT NULL,
  `schools` int(11) NOT NULL,
  `effected_male` int(11) NOT NULL,
  `effected_female` int(11) NOT NULL,
  `effected_children` int(11) NOT NULL,
  `effected_adult` int(11) NOT NULL,
  `effected_old` int(11) NOT NULL,
  `effected_household` int(11) NOT NULL,
  `houses_collapsed` int(11) NOT NULL,
  `houses_damaged` int(11) NOT NULL,
  `houses_cracked` int(11) NOT NULL,
  `death` int(11) NOT NULL,
  `trapped` int(11) NOT NULL,
  `sick` int(11) NOT NULL,
  `accessibility_id` int(11) DEFAULT NULL,
  `distance_ktm` int(11) NOT NULL,
  `area_type` varchar(255) NOT NULL COMMENT 'hill/mountain/valley',
  `road_obstructed` tinyint(1) NOT NULL,
  `road_obstruct_detail` text NOT NULL COMMENT 'landslide/cracks',
  `created_by` int(11) NOT NULL,
  `modified_by` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `reported_date` datetime NOT NULL,
  `first_followup` datetime NOT NULL,
  `priority` varchar(255) NOT NULL COMMENT 'critical/urgent/normal',
  `contact_detail` text NOT NULL,
  `internal_contact` text NOT NULL,
  `security_contact` text NOT NULL,
  `nearest_hospital_distance` varchar(255) NOT NULL,
  `nearest_hospital_name` varchar(255) NOT NULL,
  `nearest_hospital_contact` text NOT NULL,
  `longitude` varchar(255) NOT NULL,
  `latitude` varchar(255) NOT NULL,
  `sync_date` datetime NOT NULL,
  `status` char(1) NOT NULL DEFAULT 'p' COMMENT 'p:pending, d:done, i:invalid',
  `delete_flag` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
