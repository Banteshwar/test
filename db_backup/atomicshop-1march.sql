-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 01, 2016 at 02:27 PM
-- Server version: 5.5.36
-- PHP Version: 5.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `atomicshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `image_path` varchar(200) NOT NULL,
  `created_on` datetime NOT NULL,
  `updated_on` datetime NOT NULL,
  `is_deleted` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `user_id`, `title`, `description`, `status`, `image_path`, `created_on`, `updated_on`, `is_deleted`) VALUES
(21, 9, 'Sports', '', 1, '4debea1b243e54ddfcd514fd46dde384.jpg', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(22, 9, 'Fashion', '', 1, '5de7faf59aaa35c9d7131d7a07cbe608.jpg', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(23, 9, 'Decor', '', 1, '55c31772f524b8ce4fe984dadb8b70a2.jpg', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `session_id` varchar(40) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `ip_address` varchar(16) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `user_agent` varchar(120) COLLATE utf8_unicode_ci NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`session_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
  `user_id` int(10) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(100) NOT NULL,
  `mobile` int(20) NOT NULL,
  `verified` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '1',
  `selected_categories` varchar(100) NOT NULL,
  `fb_login` varchar(100) NOT NULL,
  `google_login` varchar(100) NOT NULL,
  `created_on` datetime NOT NULL,
  `updated_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `profile_image` varchar(200) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`user_id`, `first_name`, `last_name`, `email`, `password`, `mobile`, `verified`, `status`, `selected_categories`, `fb_login`, `google_login`, `created_on`, `updated_on`, `profile_image`) VALUES
(3, 'ankita', 'alung', 'ankita@gmail.com', '202cb962ac59075b964b07152d234b70', 0, 1, 1, '', '', '', '2016-02-29 12:43:55', '2016-02-29 11:43:55', ''),
(4, 'hohhi', 'ijioii', 'ankitaa@engagedmediainc.com', '202cb962ac59075b964b07152d234b70', 0, 1, 1, '', '', '', '2016-02-29 12:56:25', '2016-02-29 11:56:25', ''),
(5, 'aaa', 'qqqq', 'aa@ee.io', '202cb962ac59075b964b07152d234b70', 0, 1, 1, '', '', '', '2016-02-29 01:17:52', '2016-02-29 12:17:52', '');

-- --------------------------------------------------------

--
-- Table structure for table `customer_post_image_map`
--

CREATE TABLE IF NOT EXISTS `customer_post_image_map` (
  `map_id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `gallery_id` int(11) NOT NULL,
  `liked` int(11) NOT NULL DEFAULT '0',
  `fb_shared` int(11) NOT NULL DEFAULT '0',
  `twitter_shared` int(11) NOT NULL DEFAULT '0',
  `pinterest_shared` int(11) NOT NULL DEFAULT '0',
  `google_shared` int(11) NOT NULL DEFAULT '0',
  `tellme` int(11) DEFAULT '0',
  PRIMARY KEY (`map_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `customer_post_mapping`
--

CREATE TABLE IF NOT EXISTS `customer_post_mapping` (
  `mapping_id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `liked` int(11) NOT NULL DEFAULT '0',
  `fb_shared` int(11) NOT NULL DEFAULT '0',
  `twitter_shared` int(11) NOT NULL DEFAULT '0',
  `pinterest_shared` int(11) NOT NULL DEFAULT '0',
  `google_shared` int(11) NOT NULL DEFAULT '0',
  `tellme` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`mapping_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE IF NOT EXISTS `files` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `filename` varchar(255) NOT NULL,
  `title` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE IF NOT EXISTS `gallery` (
  `gallery_id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` int(11) NOT NULL,
  `path` text NOT NULL,
  `status` int(2) NOT NULL DEFAULT '1',
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`gallery_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE IF NOT EXISTS `post` (
  `post_id` int(5) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `category_id` int(5) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` longtext NOT NULL,
  `hyperlink` varchar(500) NOT NULL,
  `status` int(2) NOT NULL DEFAULT '0',
  `like_counter` int(10) NOT NULL,
  `share_counter` int(10) NOT NULL,
  `created_on` datetime NOT NULL,
  `modified_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_deleted` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`post_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin_users`
--

CREATE TABLE IF NOT EXISTS `tbl_admin_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `username` varchar(150) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `user_image` varchar(250) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `user_type` enum('SA','A') DEFAULT 'SA' COMMENT 'SA: Super Admin,A: Admin',
  `role` varchar(50) NOT NULL,
  `created_on` datetime NOT NULL,
  `updated_on` datetime NOT NULL,
  `is_deleted` int(1) NOT NULL DEFAULT '0',
  `last_login` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `tbl_admin_users`
--

INSERT INTO `tbl_admin_users` (`id`, `fname`, `lname`, `username`, `email`, `password`, `user_image`, `status`, `user_type`, `role`, `created_on`, `updated_on`, `is_deleted`, `last_login`) VALUES
(1, 'Jitender', 'Nagar', 'admin1', 'jitendern@engagedmediainc.com', '21232f297a57a5a743894a0e4a801fc3', '', 1, 'SA', '', '0000-00-00 00:00:00', '2016-02-15 17:35:10', 0, '0000-00-00 00:00:00'),
(8, 'Jitender', 'Nagar', 'admin', 'jitender@gmail.com', 'e59f0ecafe93af28392f97ed9d28bfd3', '', 1, 'SA', '', '0000-00-00 00:00:00', '2016-02-16 19:05:13', 0, '0000-00-00 00:00:00'),
(9, 'asdasd', 'asdsad', 'admin11', 'admin@aEDSAD.COM', 'b59c67bf196a4758191e42f76670ceba', '', 1, 'SA', '', '0000-00-00 00:00:00', '2016-02-16 19:14:29', 0, '0000-00-00 00:00:00'),
(10, 'rrrrr', 'dddd', 'dddfff', 'sdfdddd@asdsad.com', 'b59c67bf196a4758191e42f76670ceba', '', 0, 'SA', '', '0000-00-00 00:00:00', '2016-02-16 19:18:35', 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cms`
--

CREATE TABLE IF NOT EXISTS `tbl_cms` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `label` varchar(100) DEFAULT NULL,
  `content` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tbl_cms`
--

INSERT INTO `tbl_cms` (`id`, `label`, `content`) VALUES
(1, 'About Us', '<p style="padding-left: 30px; text-align: left;"><img src="/ark_admin_v2/uploads/images/Water_lilies.jpg" alt="" width="179" height="134" />Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.<br /><br />Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo.<br /><br />Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus.<br /><br />Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus.<br /><br />Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. Donec sodales sagittis magna. Sed consequat, leo eget bibendum sodales, augue velit cursus nunc,</p>\r\n<p>&nbsp;</p>'),
(2, 'What We do', '<p>This is the new text.</p>\r\n<p>&nbsp;</p>\r\n<p>ggg</p>\r\n<p>&nbsp;</p>'),
(3, 'Services', '<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.<br /><br />Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo.<br /><br />Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus.<br /><br />Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus.<br /><br />Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. Donec sodales sagittis magna. Sed consequat, leo eget bibendum sodales, augue velit cursus nunc,</p>'),
(4, 'Contact Us', '<p>294, Street Name,</p>\r\n<p>Area- Zip Code,</p>\r\n<p>City, State, Country</p>\r\n<p>&nbsp;</p>\r\n<p>phone: 999-999-9999</p>\r\n<p>Email: abc@xyz.com</p>');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(60) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `first_name` varchar(30) DEFAULT NULL,
  `last_name` varchar(30) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `signup_date` datetime DEFAULT NULL,
  `phone_mobile` varchar(50) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `address_street` varchar(150) DEFAULT NULL,
  `address_city` varchar(100) DEFAULT NULL,
  `address_state` varchar(100) DEFAULT NULL,
  `address_country` varchar(100) DEFAULT NULL,
  `address_postalcode` varchar(20) DEFAULT NULL,
  `deleted` enum('Y','N') DEFAULT 'N',
  `user_status` enum('A','B') DEFAULT 'A' COMMENT 'A: Active; B: Blocked',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=649 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
