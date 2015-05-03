-- phpMyAdmin SQL Dump
-- version 4.2.13
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 02, 2015 at 11:03 AM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
-- Table structure for table `be_acl_actions`
--

CREATE TABLE IF NOT EXISTS `be_acl_actions` (
`id` int(10) unsigned NOT NULL,
  `aco_id` int(10) unsigned DEFAULT NULL,
  `name` varchar(254) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `be_acl_groups`
--

CREATE TABLE IF NOT EXISTS `be_acl_groups` (
`id` int(10) unsigned NOT NULL,
  `lft` int(10) unsigned NOT NULL DEFAULT '0',
  `rgt` int(10) unsigned NOT NULL DEFAULT '0',
  `name` varchar(254) NOT NULL,
  `link` int(10) unsigned DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `be_acl_groups`
--

INSERT INTO `be_acl_groups` (`id`, `lft`, `rgt`, `name`, `link`) VALUES
(1, 1, 8, 'User', NULL),
(2, 4, 7, 'Administrator', NULL),
(3, 5, 6, 'Organization Administrator', 0),
(4, 2, 3, 'Data Entry Users', 0);

-- --------------------------------------------------------

--
-- Table structure for table `be_acl_permissions`
--

CREATE TABLE IF NOT EXISTS `be_acl_permissions` (
`id` int(10) unsigned NOT NULL,
  `aro_id` int(10) unsigned NOT NULL DEFAULT '0',
  `aco_id` int(10) unsigned NOT NULL DEFAULT '0',
  `allow` char(1) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `be_acl_permissions`
--

INSERT INTO `be_acl_permissions` (`id`, `aro_id`, `aco_id`, `allow`) VALUES
(1, 2, 1, 'Y'),
(2, 4, 2, 'Y'),
(3, 3, 5, 'N'),
(4, 3, 6, 'N'),
(6, 4, 3, 'N');

-- --------------------------------------------------------

--
-- Table structure for table `be_acl_permission_actions`
--

CREATE TABLE IF NOT EXISTS `be_acl_permission_actions` (
`id` int(10) unsigned NOT NULL,
  `access_id` int(10) unsigned NOT NULL DEFAULT '0',
  `axo_id` int(10) unsigned NOT NULL DEFAULT '0',
  `allow` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `be_acl_resources`
--

CREATE TABLE IF NOT EXISTS `be_acl_resources` (
`id` int(10) unsigned NOT NULL,
  `lft` int(10) unsigned NOT NULL DEFAULT '0',
  `rgt` int(10) unsigned NOT NULL DEFAULT '0',
  `name` varchar(254) NOT NULL,
  `link` int(10) unsigned DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `be_acl_resources`
--

INSERT INTO `be_acl_resources` (`id`, `lft`, `rgt`, `name`, `link`) VALUES
(1, 1, 32, 'Site', NULL),
(2, 12, 31, 'Control Panel', NULL),
(3, 13, 30, 'System', NULL),
(4, 24, 25, 'Users', NULL),
(5, 14, 23, 'Access Control', NULL),
(6, 26, 27, 'Settings', NULL),
(7, 28, 29, 'Utilities', NULL),
(8, 21, 22, 'Permissions', NULL),
(9, 19, 20, 'Groups', NULL),
(10, 17, 18, 'Resources', NULL),
(11, 15, 16, 'Actions', NULL),
(12, 2, 11, 'Master Data', 0),
(13, 9, 10, 'Skills', 0),
(14, 7, 8, 'Units', 0),
(15, 5, 6, 'Specialization', 0),
(16, 3, 4, 'Items', 0);

-- --------------------------------------------------------

--
-- Table structure for table `be_backups`
--

CREATE TABLE IF NOT EXISTS `be_backups` (
`backup_id` int(11) NOT NULL,
  `file` varchar(100) NOT NULL,
  `backup_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `be_groups`
--

CREATE TABLE IF NOT EXISTS `be_groups` (
`id` int(10) unsigned NOT NULL,
  `locked` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `disabled` tinyint(1) unsigned NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `be_groups`
--

INSERT INTO `be_groups` (`id`, `locked`, `disabled`) VALUES
(1, 1, 0),
(2, 1, 0),
(3, 0, 0),
(4, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `be_preferences`
--

CREATE TABLE IF NOT EXISTS `be_preferences` (
  `name` varchar(254) NOT NULL,
  `value` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `be_preferences`
--

INSERT INTO `be_preferences` (`name`, `value`) VALUES
('account_activation_time', '365'),
('activate_google_analytics', '0'),
('activation_method', 'email'),
('allow_user_profiles', '1'),
('allow_user_registration', '1'),
('autologin_period', '30'),
('automated_from_email', ''),
('automated_from_name', 'Relief '),
('backup_path', 'backups'),
('bcc_batch_mode', '0'),
('bcc_batch_size', '200'),
('date_default_timezone', 'Asia/Kathmandu'),
('date_format', 'Y-m-d'),
('date_time_format', 'Y-m-d H:i:s'),
('default_user_group', '1'),
('email_charset', 'utf-8'),
('email_mailpath', '/usr/sbin/sendmail'),
('email_mailtype', 'html'),
('email_protocol', 'sendmail'),
('email_wordwrap', '1'),
('email_wrapchars', '76'),
('facebook_fan_page_link', ''),
('google_analytics_tracking_code', ''),
('google_plus_page_link', ''),
('keep_error_logs_for', '30'),
('linkedin_page_link', ''),
('login_field', '0'),
('meta_description', 'Relief System'),
('meta_keywords', 'Relief System'),
('min_password_length', '8'),
('offline_message', 'Relief System'),
('page_debug', '0'),
('site_name', 'Relief System'),
('site_status', '1'),
('smtp_host', ''),
('smtp_pass', ''),
('smtp_port', '25'),
('smtp_timeout', '5'),
('smtp_user', ''),
('theme', 'default'),
('twitter_page_link', ''),
('use_login_captcha', '0'),
('use_registration_captcha', '0');

-- --------------------------------------------------------

--
-- Table structure for table `be_resources`
--

CREATE TABLE IF NOT EXISTS `be_resources` (
`id` int(10) unsigned NOT NULL,
  `locked` tinyint(1) unsigned NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `be_resources`
--

INSERT INTO `be_resources` (`id`, `locked`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 0),
(13, 0),
(14, 0),
(15, 0),
(16, 0);

-- --------------------------------------------------------

--
-- Table structure for table `be_shortcuts`
--

CREATE TABLE IF NOT EXISTS `be_shortcuts` (
`shortcut_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `link` text NOT NULL,
  `new_window` tinyint(4) NOT NULL,
  `display_order` int(11) NOT NULL,
  `added_date` datetime NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `be_users`
--

CREATE TABLE IF NOT EXISTS `be_users` (
`id` int(10) unsigned NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(40) NOT NULL,
  `email` varchar(254) NOT NULL,
  `active` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `group` int(10) unsigned DEFAULT NULL,
  `activation_key` varchar(32) DEFAULT NULL,
  `last_visit` datetime DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `be_users`
--

INSERT INTO `be_users` (`id`, `username`, `password`, `email`, `active`, `group`, `activation_key`, `last_visit`, `created`, `modified`) VALUES
(1, 'admin', '612ed3bfdadfc1b1d5dfb0a59d48e83986513a9a', 'shrestharubim@gmail.com', 1, 2, NULL, '2015-05-02 14:09:00', '2015-04-30 05:48:54', '2015-05-02 14:08:57');

-- --------------------------------------------------------

--
-- Table structure for table `be_user_profiles`
--

CREATE TABLE IF NOT EXISTS `be_user_profiles` (
  `user_id` int(10) unsigned NOT NULL,
  `organization_id` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `be_user_profiles`
--

INSERT INTO `be_user_profiles` (`user_id`, `organization_id`) VALUES
(1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(16) NOT NULL DEFAULT '0',
  `user_agent` varchar(255) NOT NULL,
  `user_data` text NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ci_sessions`
--

INSERT INTO `ci_sessions` (`session_id`, `ip_address`, `user_agent`, `user_data`, `last_activity`) VALUES
('bb27f60f1fb7db8118b2d793febb4a9e', '192.168.0.36', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/42.0.2311.135 Safari/537.36', 'a:12:{s:9:"user_data";s:0:"";s:2:"id";s:1:"1";s:8:"username";s:5:"admin";s:5:"email";s:23:"shrestharubim@gmail.com";s:8:"password";s:40:"612ed3bfdadfc1b1d5dfb0a59d48e83986513a9a";s:6:"active";s:1:"1";s:10:"last_visit";s:19:"2015-05-02 11:33:11";s:7:"created";s:19:"2015-04-30 05:48:54";s:8:"modified";s:19:"2015-05-02 14:08:57";s:5:"group";s:13:"Administrator";s:8:"group_id";s:1:"2";s:15:"organization_id";s:1:"0";}', 1430559882),
('64c2b3be917ea41750ca189727dcdd76', '::1', 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/42.0.2311.135 Safari/537.36', 'a:12:{s:9:"user_data";s:0:"";s:2:"id";s:1:"1";s:8:"username";s:5:"admin";s:5:"email";s:23:"shrestharubim@gmail.com";s:8:"password";s:40:"612ed3bfdadfc1b1d5dfb0a59d48e83986513a9a";s:6:"active";s:1:"1";s:10:"last_visit";s:19:"2015-05-02 14:08:57";s:7:"created";s:19:"2015-04-30 05:48:54";s:8:"modified";s:19:"2015-05-02 14:08:57";s:5:"group";s:13:"Administrator";s:8:"group_id";s:1:"2";s:15:"organization_id";s:1:"0";}', 1430560550);

-- --------------------------------------------------------

--
-- Table structure for table `email_templates`
--

CREATE TABLE IF NOT EXISTS `email_templates` (
`email_template_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug_name` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `layouts`
--

CREATE TABLE IF NOT EXISTS `layouts` (
`layout_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE IF NOT EXISTS `pages` (
`page_id` int(11) NOT NULL,
  `page_title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `meta_keywords` text NOT NULL,
  `meta_description` text NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_date` datetime NOT NULL,
  `slug_id` int(11) NOT NULL,
  `slug_name` varchar(250) NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE IF NOT EXISTS `settings` (
`setting_id` int(11) NOT NULL,
  `code` varchar(100) NOT NULL,
  `key` varchar(100) NOT NULL,
  `value` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `slugs`
--

CREATE TABLE IF NOT EXISTS `slugs` (
`slug_id` int(11) NOT NULL,
  `slug_name` varchar(250) NOT NULL,
  `route` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_accessibilities`
--

CREATE TABLE IF NOT EXISTS `tbl_accessibilities` (
`id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified_by` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `delete_flag` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_areas`
--

CREATE TABLE IF NOT EXISTS `tbl_areas` (
`id` int(11) NOT NULL,
  `code` varchar(100) NOT NULL,
  `name` varchar(255) NOT NULL,
  `district` varchar(255) NOT NULL,
  `ward` int(11) NOT NULL,
  `address` text NOT NULL,
  `location_category` varchar(255) NOT NULL,
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
  `delete_flag` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_area_req_items`
--

CREATE TABLE IF NOT EXISTS `tbl_area_req_items` (
`id` int(11) NOT NULL,
  `area_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified_by` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `delete_flag` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_area_types`
--

CREATE TABLE IF NOT EXISTS `tbl_area_types` (
`id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified_by` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `delete_flag` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_available_items`
--

CREATE TABLE IF NOT EXISTS `tbl_available_items` (
`id` int(11) NOT NULL,
  `volunteer_id` int(11) NOT NULL,
  `organization_id` int(11) DEFAULT NULL,
  `item_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `is_recurring` tinyint(1) NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `created_date` datetime NOT NULL,
  `modified_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `delete_flag` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_delivered_items`
--

CREATE TABLE IF NOT EXISTS `tbl_delivered_items` (
`id` int(11) NOT NULL,
  `area_id` int(11) NOT NULL,
  `organization_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `delivered_date` date NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified_by` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_district_vdcs`
--

CREATE TABLE IF NOT EXISTS `tbl_district_vdcs` (
  `id` int(11) NOT NULL,
  `code` varchar(255) DEFAULT NULL,
  `name_en` varchar(255) DEFAULT NULL,
  `name_np` varchar(255) DEFAULT NULL,
  `parent_location_id` int(11) DEFAULT NULL,
  `hierarchy_level` varchar(255) DEFAULT NULL,
  `location_type` varchar(255) DEFAULT NULL,
  `hierarchy_name` varchar(255) DEFAULT NULL,
  `display_order` varchar(255) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `modified_date` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `delete_flag` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_district_vdcs_copy`
--

CREATE TABLE IF NOT EXISTS `tbl_district_vdcs_copy` (
  `id` int(11) NOT NULL,
  `code` varchar(255) DEFAULT NULL,
  `name_en` varchar(255) DEFAULT NULL,
  `name_np` varchar(255) DEFAULT NULL,
  `parent_location_id` int(11) DEFAULT NULL,
  `hierarchy_level` varchar(255) DEFAULT NULL,
  `location_type` varchar(255) DEFAULT NULL,
  `hierarchy_name` varchar(255) DEFAULT NULL,
  `display_order` varchar(255) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `modified_date` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `delete_flag` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_items`
--

CREATE TABLE IF NOT EXISTS `tbl_items` (
`id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `unit_id` int(11) NOT NULL,
  `is_recurring` int(11) NOT NULL,
  `expected_till` date NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `created_date` datetime NOT NULL,
  `modified_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `delete_flag` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_next_delivery`
--

CREATE TABLE `tbl_next_delivery` (
  `id` int(11) NOT NULL,
  `organization_id` int(11) NOT NULL,
  `area_id` int(11) DEFAULT NULL,
  `vehicle_id` int(11) DEFAULT NULL,
  `district_vdc_id` int(11) NOT NULL,
  `street` varchar(255) NOT NULL,
  `contact_name` text NOT NULL,
  `contact_phone` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `reporting_time` datetime DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `modified_by` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_obstruction_types`
--

CREATE TABLE IF NOT EXISTS `tbl_obstruction_types` (
`id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified_by` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `delete_flag` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_organizations`
--

CREATE TABLE IF NOT EXISTS `tbl_organizations` (
`id` int(11) NOT NULL,
  `code` varchar(50) DEFAULT NULL,
  `organization_name` text,
  `specialization` text,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `total_volunteer` int(11) DEFAULT NULL,
  `contact_details` text,
  `country` varchar(255) DEFAULT NULL,
  `contact_name` varchar(1000) DEFAULT NULL,
  `contact_phone` varchar(1000) DEFAULT NULL,
  `contact_email` varchar(1000) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `modified_date` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `delete_flag` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_organization_available_items`
--

CREATE TABLE IF NOT EXISTS `tbl_organization_available_items` (
`id` int(11) NOT NULL,
  `area_id` int(11) NOT NULL,
  `organization_id` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified_by` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `item_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `deliver_quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_organization_interestareas`
--

CREATE TABLE IF NOT EXISTS `tbl_organization_interestareas` (
`id` int(11) NOT NULL,
  `area_id` int(11) NOT NULL,
  `organization_id` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified_by` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_organization_workareas`
--

CREATE TABLE IF NOT EXISTS `tbl_organization_workareas` (
`id` int(11) NOT NULL,
  `area_id` int(11) NOT NULL,
  `organization_id` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified_by` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_skills`
--

CREATE TABLE IF NOT EXISTS `tbl_skills` (
`id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified_by` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `delete_flag` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_specializations`
--

CREATE TABLE IF NOT EXISTS `tbl_specializations` (
`id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified_by` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `delete_flag` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_units`
--

CREATE TABLE IF NOT EXISTS `tbl_units` (
`id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `created_date` datetime NOT NULL,
  `modified_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `delete_flag` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_vehicles`
--

CREATE TABLE IF NOT EXISTS `tbl_vehicles` (
`id` int(11) NOT NULL,
  `organization_id` int(11) DEFAULT NULL,
  `registration_number` varchar(100) NOT NULL,
  `capacity` varchar(255) NOT NULL,
  `distance_coverage` varchar(255) NOT NULL,
  `vehicle_type_id` int(11) NOT NULL,
  `current_location` text NOT NULL,
  `delete_flag` tinyint(1) NOT NULL DEFAULT '0',
  `created_by` int(11) NOT NULL,
  `modified_by` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_vehicle_types`
--

CREATE TABLE IF NOT EXISTS `tbl_vehicle_types` (
`id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified_by` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `delete_flag` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_volunteers`
--

CREATE TABLE IF NOT EXISTS `tbl_volunteers` (
`id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `gender` enum('male','female','other') NOT NULL,
  `dob` varchar(255) NOT NULL,
  `district` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `total_days` tinyint(5) NOT NULL,
  `organization_id` int(11) DEFAULT NULL,
  `skills` text NOT NULL,
  `can_travel` tinyint(1) NOT NULL,
  `created_date` int(11) NOT NULL,
  `modified_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `delete_flag` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `be_acl_actions`
--
ALTER TABLE `be_acl_actions`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `name` (`name`), ADD KEY `be_acl_actions_ibfk_1` (`aco_id`);

--
-- Indexes for table `be_acl_groups`
--
ALTER TABLE `be_acl_groups`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `name` (`name`), ADD KEY `lft` (`lft`), ADD KEY `rgt` (`rgt`);

--
-- Indexes for table `be_acl_permissions`
--
ALTER TABLE `be_acl_permissions`
 ADD PRIMARY KEY (`id`), ADD KEY `aro_id` (`aro_id`), ADD KEY `aco_id` (`aco_id`);

--
-- Indexes for table `be_acl_permission_actions`
--
ALTER TABLE `be_acl_permission_actions`
 ADD PRIMARY KEY (`id`), ADD KEY `access_id` (`access_id`), ADD KEY `axo_id` (`axo_id`);

--
-- Indexes for table `be_acl_resources`
--
ALTER TABLE `be_acl_resources`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `name` (`name`), ADD KEY `lft` (`lft`), ADD KEY `rgt` (`rgt`);

--
-- Indexes for table `be_backups`
--
ALTER TABLE `be_backups`
 ADD PRIMARY KEY (`backup_id`);

--
-- Indexes for table `be_groups`
--
ALTER TABLE `be_groups`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `be_preferences`
--
ALTER TABLE `be_preferences`
 ADD KEY `name` (`name`);

--
-- Indexes for table `be_resources`
--
ALTER TABLE `be_resources`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `be_shortcuts`
--
ALTER TABLE `be_shortcuts`
 ADD PRIMARY KEY (`shortcut_id`);

--
-- Indexes for table `be_users`
--
ALTER TABLE `be_users`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `username` (`username`), ADD UNIQUE KEY `email` (`email`), ADD KEY `password` (`password`), ADD KEY `group` (`group`);

--
-- Indexes for table `be_user_profiles`
--
ALTER TABLE `be_user_profiles`
 ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `ci_sessions`
--
ALTER TABLE `ci_sessions`
 ADD PRIMARY KEY (`session_id`);

--
-- Indexes for table `email_templates`
--
ALTER TABLE `email_templates`
 ADD PRIMARY KEY (`email_template_id`);

--
-- Indexes for table `layouts`
--
ALTER TABLE `layouts`
 ADD PRIMARY KEY (`layout_id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
 ADD PRIMARY KEY (`page_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
 ADD PRIMARY KEY (`setting_id`);

--
-- Indexes for table `slugs`
--
ALTER TABLE `slugs`
 ADD PRIMARY KEY (`slug_id`);

--
-- Indexes for table `tbl_accessibilities`
--
ALTER TABLE `tbl_accessibilities`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_areas`
--
ALTER TABLE `tbl_areas`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_area_req_items`
--
ALTER TABLE `tbl_area_req_items`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_area_types`
--
ALTER TABLE `tbl_area_types`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_available_items`
--
ALTER TABLE `tbl_available_items`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_delivered_items`
--
ALTER TABLE `tbl_delivered_items`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_district_vdcs`
--
ALTER TABLE `tbl_district_vdcs`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_district_vdcs_copy`
--
ALTER TABLE `tbl_district_vdcs_copy`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_items`
--
ALTER TABLE `tbl_items`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_next_delivery`
--
ALTER TABLE `tbl_next_delivery`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_obstruction_types`
--
ALTER TABLE `tbl_obstruction_types`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_organizations`
--
ALTER TABLE `tbl_organizations`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_organization_available_items`
--
ALTER TABLE `tbl_organization_available_items`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_organization_interestareas`
--
ALTER TABLE `tbl_organization_interestareas`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_organization_workareas`
--
ALTER TABLE `tbl_organization_workareas`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_skills`
--
ALTER TABLE `tbl_skills`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_specializations`
--
ALTER TABLE `tbl_specializations`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_units`
--
ALTER TABLE `tbl_units`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_vehicles`
--
ALTER TABLE `tbl_vehicles`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_vehicle_types`
--
ALTER TABLE `tbl_vehicle_types`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_volunteers`
--
ALTER TABLE `tbl_volunteers`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `be_acl_actions`
--
ALTER TABLE `be_acl_actions`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `be_acl_groups`
--
ALTER TABLE `be_acl_groups`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `be_acl_permissions`
--
ALTER TABLE `be_acl_permissions`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `be_acl_permission_actions`
--
ALTER TABLE `be_acl_permission_actions`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `be_acl_resources`
--
ALTER TABLE `be_acl_resources`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `be_backups`
--
ALTER TABLE `be_backups`
MODIFY `backup_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `be_groups`
--
ALTER TABLE `be_groups`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `be_resources`
--
ALTER TABLE `be_resources`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `be_shortcuts`
--
ALTER TABLE `be_shortcuts`
MODIFY `shortcut_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `be_users`
--
ALTER TABLE `be_users`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `email_templates`
--
ALTER TABLE `email_templates`
MODIFY `email_template_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `layouts`
--
ALTER TABLE `layouts`
MODIFY `layout_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
MODIFY `page_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
MODIFY `setting_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `slugs`
--
ALTER TABLE `slugs`
MODIFY `slug_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_accessibilities`
--
ALTER TABLE `tbl_accessibilities`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_areas`
--
ALTER TABLE `tbl_areas`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_area_req_items`
--
ALTER TABLE `tbl_area_req_items`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_area_types`
--
ALTER TABLE `tbl_area_types`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_available_items`
--
ALTER TABLE `tbl_available_items`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_delivered_items`
--
ALTER TABLE `tbl_delivered_items`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_items`
--
ALTER TABLE `tbl_items`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_next_delivery`
--
ALTER TABLE `tbl_next_delivery`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_obstruction_types`
--
ALTER TABLE `tbl_obstruction_types`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_organizations`
--
ALTER TABLE `tbl_organizations`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_organization_available_items`
--
ALTER TABLE `tbl_organization_available_items`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_organization_interestareas`
--
ALTER TABLE `tbl_organization_interestareas`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_organization_workareas`
--
ALTER TABLE `tbl_organization_workareas`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_skills`
--
ALTER TABLE `tbl_skills`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_specializations`
--
ALTER TABLE `tbl_specializations`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_units`
--
ALTER TABLE `tbl_units`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_vehicles`
--
ALTER TABLE `tbl_vehicles`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_vehicle_types`
--
ALTER TABLE `tbl_vehicle_types`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_volunteers`
--
ALTER TABLE `tbl_volunteers`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `be_acl_actions`
--
ALTER TABLE `be_acl_actions`
ADD CONSTRAINT `be_acl_actions_ibfk_1` FOREIGN KEY (`aco_id`) REFERENCES `be_acl_resources` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `be_acl_permissions`
--
ALTER TABLE `be_acl_permissions`
ADD CONSTRAINT `be_acl_permissions_ibfk_1` FOREIGN KEY (`aro_id`) REFERENCES `be_acl_groups` (`id`) ON DELETE CASCADE,
ADD CONSTRAINT `be_acl_permissions_ibfk_2` FOREIGN KEY (`aco_id`) REFERENCES `be_acl_resources` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `be_acl_permission_actions`
--
ALTER TABLE `be_acl_permission_actions`
ADD CONSTRAINT `be_acl_permission_actions_ibfk_1` FOREIGN KEY (`access_id`) REFERENCES `be_acl_permissions` (`id`) ON DELETE CASCADE,
ADD CONSTRAINT `be_acl_permission_actions_ibfk_2` FOREIGN KEY (`axo_id`) REFERENCES `be_acl_actions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `be_groups`
--
ALTER TABLE `be_groups`
ADD CONSTRAINT `be_groups_ibfk_1` FOREIGN KEY (`id`) REFERENCES `be_acl_groups` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `be_resources`
--
ALTER TABLE `be_resources`
ADD CONSTRAINT `be_resources_ibfk_1` FOREIGN KEY (`id`) REFERENCES `be_acl_resources` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `be_users`
--
ALTER TABLE `be_users`
ADD CONSTRAINT `be_users_ibfk_1` FOREIGN KEY (`group`) REFERENCES `be_acl_groups` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `be_user_profiles`
--
ALTER TABLE `be_user_profiles`
ADD CONSTRAINT `be_user_profiles_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `be_users` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
