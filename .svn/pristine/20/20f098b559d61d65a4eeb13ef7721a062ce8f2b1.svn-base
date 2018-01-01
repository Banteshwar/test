-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 22, 2016 at 09:41 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

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
`category_id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `image_path` varchar(200) NOT NULL,
  `created_on` datetime NOT NULL,
  `updated_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_deleted` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `title`, `description`, `status`, `image_path`, `created_on`, `updated_on`, `is_deleted`) VALUES
(6, 'fsdfsdf', '', 1, '', '0000-00-00 00:00:00', '2016-02-17 14:47:26', 1),
(8, 'asdfasdas', '', 1, '', '0000-00-00 00:00:00', '2016-02-17 14:56:41', 0),
(9, 'asdfafdsaf', '', 1, '', '0000-00-00 00:00:00', '2016-02-17 14:56:44', 0),
(10, 'dddddddddd', '', 1, '', '0000-00-00 00:00:00', '2016-02-17 14:56:48', 0),
(11, 'dfsafasf', '', 1, '', '0000-00-00 00:00:00', '2016-02-17 14:57:34', 0),
(12, 'sdfsdfsdf', '', 1, '', '0000-00-00 00:00:00', '2016-02-17 14:57:40', 0),
(13, 'sdfsdfsdf', '', 1, '', '0000-00-00 00:00:00', '2016-02-17 14:57:42', 0),
(14, 'sdfsdfsdfsdf', '', 1, '', '0000-00-00 00:00:00', '2016-02-17 14:57:44', 0),
(15, 'sdfsdfsdfsdfsdf', '', 1, '', '0000-00-00 00:00:00', '2016-02-17 14:57:47', 0),
(16, 'dfgdfgdfgggn', '', 1, '', '0000-00-00 00:00:00', '2016-02-17 14:57:52', 0),
(17, 'sdfasdsaf', '', 1, '', '0000-00-00 00:00:00', '2016-02-17 14:57:55', 0),
(18, 'asdsad', '', 1, 'Chrysanthemum.jpg', '0000-00-00 00:00:00', '2016-02-18 11:47:02', 0);

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `session_id` varchar(40) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `ip_address` varchar(16) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `user_agent` varchar(120) COLLATE utf8_unicode_ci NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text COLLATE utf8_unicode_ci
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ci_sessions`
--

INSERT INTO `ci_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('0578c48d95f9ae814722bbfb945d19b0', '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:44.0) Gecko/20100101 Firefox/44.0', 1455530870, ''),
('6e2cecab36c93fccec771a8d1d6799f8', '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:44.0) Gecko/20100101 Firefox/44.0', 1455536022, ''),
('b49e2e6297a59f4be9551e1cc8181ece', '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:44.0) Gecko/20100101 Firefox/44.0', 1455529694, '');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
`user_id` int(10) NOT NULL,
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
  `profile_image` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`user_id`, `first_name`, `last_name`, `email`, `password`, `mobile`, `verified`, `status`, `selected_categories`, `fb_login`, `google_login`, `created_on`, `updated_on`, `profile_image`) VALUES
(1, '', '', '', '', 0, 0, 1, '', '', '', '2016-02-17 11:33:33', '2016-02-17 10:33:33', '');

-- --------------------------------------------------------

--
-- Table structure for table `customer_post_mapping`
--

CREATE TABLE IF NOT EXISTS `customer_post_mapping` (
  `mapping_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `liked` int(11) NOT NULL DEFAULT '0',
  `fb_shared` int(11) NOT NULL DEFAULT '0',
  `twitter_shared` int(11) NOT NULL DEFAULT '0',
  `pinterest_shared` int(11) NOT NULL DEFAULT '0',
  `google_shared` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE IF NOT EXISTS `files` (
`id` int(11) NOT NULL,
  `filename` varchar(255) NOT NULL,
  `title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE IF NOT EXISTS `gallery` (
`gallery_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `path` text NOT NULL,
  `status` int(2) NOT NULL DEFAULT '1',
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE IF NOT EXISTS `post` (
`post_id` int(5) NOT NULL,
  `category_id` int(5) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` longtext NOT NULL,
  `hyperlink` varchar(500) NOT NULL,
  `status` int(2) NOT NULL DEFAULT '0',
  `like_counter` int(10) NOT NULL,
  `share_counter` int(10) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_deleted` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`post_id`, `category_id`, `title`, `description`, `hyperlink`, `status`, `like_counter`, `share_counter`, `created_on`, `modified_on`, `is_deleted`) VALUES
(1, 0, 'test', '<p>ddddddddddd</p>', '', 1, 0, 0, '2016-02-19 13:58:05', '0000-00-00 00:00:00', 0),
(2, 0, 'dfgdfgdfg', '', '', 1, 0, 0, '2016-02-19 13:59:12', '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin_users`
--

CREATE TABLE IF NOT EXISTS `tbl_admin_users` (
`id` int(11) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `username` varchar(150) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `user_type` enum('SA','A') DEFAULT 'SA' COMMENT 'SA: Super Admin,A: Admin',
  `role` varchar(50) NOT NULL,
  `created_on` datetime NOT NULL,
  `updated_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_admin_users`
--

INSERT INTO `tbl_admin_users` (`id`, `fname`, `lname`, `username`, `email`, `password`, `status`, `user_type`, `role`, `created_on`, `updated_on`) VALUES
(1, 'Jitender', 'Nagar', 'admin1', 'jitendern@engagedmediainc.com', '21232f297a57a5a743894a0e4a801fc3', 1, 'SA', '', '0000-00-00 00:00:00', '2016-02-15 12:05:10'),
(8, 'Jitender', 'Nagar', 'admin', 'jitender@gmail.com', 'e59f0ecafe93af28392f97ed9d28bfd3', 1, 'SA', '', '0000-00-00 00:00:00', '2016-02-16 13:35:13'),
(9, 'asdasd', 'asdsad', 'admin11', 'admin@aEDSAD.COM', 'b59c67bf196a4758191e42f76670ceba', 1, 'SA', '', '0000-00-00 00:00:00', '2016-02-16 13:44:29'),
(10, 'rrrrr', 'dddd', 'dddfff', 'sdfdddd@asdsad.com', 'b59c67bf196a4758191e42f76670ceba', 0, 'SA', '', '0000-00-00 00:00:00', '2016-02-16 13:48:35');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cms`
--

CREATE TABLE IF NOT EXISTS `tbl_cms` (
`id` int(11) NOT NULL,
  `label` varchar(100) DEFAULT NULL,
  `content` text
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

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
`id` int(11) NOT NULL,
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
  `user_status` enum('A','B') DEFAULT 'A' COMMENT 'A: Active; B: Blocked'
) ENGINE=MyISAM AUTO_INCREMENT=649 DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
 ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `ci_sessions`
--
ALTER TABLE `ci_sessions`
 ADD PRIMARY KEY (`session_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
 ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
 ADD PRIMARY KEY (`gallery_id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
 ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `tbl_admin_users`
--
ALTER TABLE `tbl_admin_users`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_cms`
--
ALTER TABLE `tbl_cms`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
MODIFY `gallery_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
MODIFY `post_id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_admin_users`
--
ALTER TABLE `tbl_admin_users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `tbl_cms`
--
ALTER TABLE `tbl_cms`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=649;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
