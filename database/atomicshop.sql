-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 28, 2016 at 08:48 AM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `atomicshop`
--
CREATE DATABASE IF NOT EXISTS `atomicshop` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `atomicshop`;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=59 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `user_id`, `title`, `description`, `status`, `image_path`, `created_on`, `updated_on`, `is_deleted`) VALUES
(21, 9, 'Sports3', '<p>sdafsdafsdaf3</p>', 1, 'a91debf78bcf2e7a74959212b2e517e5.jpg', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(22, 9, 'Fashion', '', 1, 'b69bff0c3ca1525fbacc1e427bb60bfe.jpg', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(23, 9, 'Decor', '', 1, '47476215aa3dc28ef739ea907b4742fe.jpg', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(24, 9, 'outdoors', '<p>description</p>', 1, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(25, 9, 'out', '<p>sdafds</p>', 1, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(26, 9, 'out', '<p>sdafds</p>', 1, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(27, 9, 'dddd', '<p>ddd</p>', 1, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(28, 9, 'sadfdsaf', '<p>sdafsdaf</p>', 1, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(29, 9, 'ffff', '<p>ffff</p>', 1, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(30, 9, 'ggggg', '<p>gggg</p>', 1, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(31, 9, 'dfgdsfg', '<p>dsfgdfsg</p>', 1, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(32, 9, 'gggrerr', '<p>dfsgvfdsg</p>', 1, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(33, 9, 'dfgdfsg', '<p>dsfsgdfg</p>', 1, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(34, 9, 'hi1', '<p>sfsdafsdaf</p>', 1, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(35, 9, 'teste', '<p>sadfsd</p>', 1, '6af5b3ccfb82b239d07fef1492774fdb.jpg', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(36, 9, 'gete', '<p>sadfdsaf</p>', 1, '5442bc42a01086fc1a07937d359055b7.jpg', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(37, 9, 'hicat', '<p>sdafdasf</p>', 1, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(38, 9, 'ghy', '<p>asdfsdafsdaf</p>', 1, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(39, 9, 'dsafsdf', '<p>sdafsdf</p>', 1, '5dd474992354195d16a385f10a299631.jpg', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(40, 9, 'sdafdsaf', '<p>adsfsadf</p>', 1, '1134b200696943e34ed3883787469088.jpg', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(41, 9, 'gerre', '<p>dasfgadsf</p>', 1, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(42, 9, 'sadfsadf', '<p>sadfsdaf</p>', 1, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(43, 9, 'sadfsdaf', '<p>sadfdsafsdaf</p>', 1, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(44, 9, 'sdafdsf', '<p>dsafsdaf</p>', 1, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(45, 9, 'jitu1', '<p>sdafdsaf</p>', 1, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(46, 9, 'sdfff', '<p>sdfsdf</p>', 1, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(47, 9, 'gfgf', '<p>dsfads</p>', 1, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(48, 9, 'ghu', '<p>dfsgdfs</p>', 1, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(49, 9, 'fghrt', '<p>sdafdsf</p>', 1, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(50, 9, 'ghrt', '<p>sdafsdaf</p>', 1, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(51, 9, 'getd', '<p>sdafsadf</p>', 1, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(52, 9, '', '', 1, '', '2016-03-10 14:14:05', '0000-00-00 00:00:00', 1),
(53, 9, '', '', 1, '', '2016-03-10 14:15:02', '0000-00-00 00:00:00', 1),
(54, 9, 'my new cate', '<p>sdaf sdafsdaf</p>', 1, '0a69e195aa54a5bb036c751cfc7f706a.jpg', '2016-03-10 15:30:48', '0000-00-00 00:00:00', 0),
(55, 9, 'cat 4', '<p>sdaf dsafsdf</p>', 1, '593d2b45b22b5314a2a1c83757f923ee.jpg', '2016-03-10 15:57:41', '0000-00-00 00:00:00', 0),
(56, 9, 'my cat 5', '<p>sdafsdafds</p>', 1, '3f347c00e2a9dd5b9d5c4c81320863c9.jpg', '2016-03-10 16:02:54', '0000-00-00 00:00:00', 0),
(57, 9, 'my cat 6', '<p>sdafdsa</p>', 1, '', '2016-03-10 16:03:46', '0000-00-00 00:00:00', 0),
(58, 9, 'my cat 7', '<p>sdafdsafd</p>', 1, '', '2016-03-10 16:05:14', '0000-00-00 00:00:00', 0);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `customer_post_image_map`
--

INSERT INTO `customer_post_image_map` (`map_id`, `customer_id`, `post_id`, `gallery_id`, `liked`, `fb_shared`, `twitter_shared`, `pinterest_shared`, `google_shared`, `tellme`) VALUES
(1, 2147483647, 0, 51, 1, 0, 0, 0, 0, 0),
(2, 2147483647, 0, 51, 1, 0, 0, 0, 0, 0);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `customer_post_mapping`
--

INSERT INTO `customer_post_mapping` (`mapping_id`, `customer_id`, `post_id`, `liked`, `fb_shared`, `twitter_shared`, `pinterest_shared`, `google_shared`, `tellme`) VALUES
(1, 6, 1, 1, 0, 0, 0, 0, 0),
(2, 6, 2, 0, 0, 0, 0, 0, 0),
(3, 6, 14, 0, 0, 0, 0, 0, 0),
(4, 6, 13, 0, 0, 0, 0, 0, 0),
(5, 2147483647, 16, 1, 0, 0, 0, 0, 0),
(6, 2147483647, 15, 1, 0, 0, 0, 0, 0);

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
  `img_title` varchar(256) NOT NULL,
  `path` text NOT NULL,
  `status` int(2) NOT NULL DEFAULT '1',
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `gallery_like_counter` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`gallery_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=52 ;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`gallery_id`, `post_id`, `img_title`, `path`, `status`, `created_on`, `gallery_like_counter`) VALUES
(24, 4, '', 'ae41a84752aed204582fa2ae20c33bfd.jpg', 1, '2016-03-02 08:47:37', 0),
(25, 4, '', 'bfb7f9542558f5d4c2890ad780e3245b.jpg', 1, '2016-03-02 08:47:37', 0),
(26, 5, '', '4d72fb990c3ca29cc4c12dc9e4adb498.jpg', 1, '2016-03-02 08:49:04', 0),
(27, 5, '', '9e5cdd5d97345b909ab59639af6627c2.jpg', 1, '2016-03-02 08:49:04', 0),
(28, 5, '', 'b649cf8ee15edccd2f1a2e1161069556.jpg', 1, '2016-03-02 08:49:05', 0),
(29, 5, '', '96138fca59bb4275ef5c2cdc4eff0270.jpg', 1, '2016-03-02 08:49:05', 0),
(30, 5, '', 'd388cc8ccb147a0a380b3faa30b6a3fb.jpg', 1, '2016-03-02 08:49:05', 0),
(31, 5, '', 'd7221fa56437396c11bcdecf39ab8ca0.jpg', 1, '2016-03-02 08:49:05', 0),
(32, 6, 'Image Title1', 'db1cd053d07a2af165ad2af1fcbe5a6e.jpg', 1, '2016-03-02 08:50:50', 0),
(33, 7, '', 'ac91507531b2e37ade78c64548a75136.jpg', 1, '2016-03-02 08:52:01', 0),
(34, 7, '', '0332ae9967345435d97bae503a322c41.jpg', 1, '2016-03-02 08:52:01', 0),
(35, 8, '', '2360ecc6e4ee448afb9e62e7e882e683.jpg', 1, '2016-03-02 08:53:30', 0),
(36, 9, 'Image Title1', '09f22743899bd9eed9738e4d23f76fae.jpg', 1, '2016-03-02 08:54:31', 0),
(37, 10, 'Image Title1', '01de3a15b6e1707d17bac3f248d33a91.jpg', 1, '2016-03-02 08:56:07', 0),
(38, 10, 'Image Title2', 'd60862e8859d507c67fe9e78237dc415.jpg', 1, '2016-03-02 08:56:07', 0),
(39, 10, 'Image Title3', '1eb09f914145057038a5d6de5d4aced3.jpg', 1, '2016-03-02 08:56:07', 0),
(40, 11, 'title1', 'b85db7ae66d68addbd3d40d8a9abb522.jpg', 1, '2016-03-02 08:57:12', 0),
(41, 12, '', '926fc095d2fe1be3e73e5a32ce47df22.jpg', 1, '2016-03-02 08:58:30', 0),
(44, 2, 'AA', '0e6df094ac0c2e5261b17d048b59e8d1.jpg', 1, '2016-03-03 13:32:44', 0),
(45, 2, 'hi how are BA', 'add6111bfd435bef5041757cb4243680.jpg', 1, '2016-03-03 13:33:19', 0),
(46, 2, 'hhhC', 'd6e4a71bb31e978aaec829aeec9ab169.jpg', 1, '2016-03-03 13:57:21', 0),
(47, 13, '', 'c5c18e068a64c31f6985c557c36717ca.jpg', 1, '2016-03-04 12:03:57', 0),
(48, 14, '', '3d33a800e2ee65d9844c46dd6c8586c2.jpg', 1, '2016-03-04 12:06:09', 0),
(49, 15, '', '9c85d1518bdcfa7dee6f3593b9db4be6.jpg', 1, '2016-03-04 12:06:41', 0),
(50, 3, '', 'c7575a93169e5deb30a07884a6e720b3.jpg', 1, '2016-03-04 15:50:23', 0),
(51, 16, '', 'c968a6423cd9a3eaf13f58035eaee880.png', 1, '2016-03-14 10:47:15', 2);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`post_id`, `user_id`, `category_id`, `title`, `description`, `hyperlink`, `status`, `like_counter`, `share_counter`, `created_on`, `modified_on`, `is_deleted`) VALUES
(1, 9, 21, 'test2', '<p><span style="color: #191919; font-family: ''PT Serif'', Helvetica, Arial, sans-serif; font-size: 16px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 26.4px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; display: inline !important; float: none; background-color: #ffffff;">Thus, Fulks entrusted the &rsquo;77 to Justin Brunner, owner of Bent Metal Customs in Lansdale, Pennsylvania. Justin performed what is best described as a frame off restoration on Kip&rsquo;s Ford. The truck, &ldquo;Was in absolute pieces when it showed up at the shop,&rdquo; says Brunner. While it was done over a few years, Brunner estimates it took roughly a year of solid work to get all the extensive body work, frame work, paint and so much more that turned Fulks&rsquo; F-250 into the gem you see here.</span></p>', '3455', 1, 2, 0, '0000-00-00 00:00:00', '2016-03-02 08:35:51', 0),
(2, 9, 21, 'test1', '<p><span style="color: #191919; font-family: ''PT Serif'', Helvetica, Arial, sans-serif; font-size: 16px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 26.4px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; display: inline !important; float: none; background-color: #ffffff;">Thus, Fulks entrusted the &rsquo;77 to Justin Brunner, owner of Bent Metal Customs in Lansdale, Pennsylvania. Justin performed what is best described as a frame off restoration on Kip&rsquo;s Ford. The truck, &ldquo;Was in absolute pieces when it showed up at the shop,&rdquo; says Brunner. While it was done over a few years, Brunner estimates it took roughly a year of solid work to get all the extensive body work, frame work, paint and so much more that turned Fulks&rsquo; F-250 into the gem you see here.</span></p>', 'http://www.google.com', 1, 1, 0, '0000-00-00 00:00:00', '2016-03-02 08:37:30', 0),
(3, 9, 22, 'test3', '<p><span style="color: #191919; font-family: ''PT Serif'', Helvetica, Arial, sans-serif; font-size: 16px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 26.4px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; display: inline !important; float: none; background-color: #ffffff;">The 5.9L Cummins 12-valve under the hood has been kept mainly stock for reliability reasons but did reap the benefits of a few &ldquo;go fast&rdquo; upgrades. A set of Stage 3, 90-hp injectors from Dynamite Diesel Products were installed. Fuel supply to the DDP injectors comes in the form of a FASS Titanium Series, 125-gph pump that feeds a reworked 500cc P-Pump from Northeast Diesel Injection capable of reving the engine to 5,000 rpm. To provide the air to match the added fuel, Fulks chose to use a turbo from Stainless Diesel. It&rsquo;s a 63mm, T3 mount unit with a tight 0.80 AR for quick spool and great street manners. The Stainless Diesel turbo pushed compressed charge air through a 3-inch intake manifold from Trex Tech into the stock Cummins head that&rsquo;s been upgraded with stiffer valve springs from Hamilton Diesel to contain the boost. Spent air then exits the engine through a Silverline Exhaust kit. The Cummins also received an AFE intercooler from a 1996 Ram (which Brunner says was one of the more difficult things to modify to fit in the Ford) as well as an upgraded harmonic damper from Fluidamper. While it hasn&rsquo;t seen a dyno yet, power output is estimated to be around 650 rwhp. Helping the power get to the ground is done with a ZF5 transmission complete with custom shift knobs sporting the Under Armor logo.</span></p>', 'http://www.google.com', 1, 0, 0, '0000-00-00 00:00:00', '2016-03-02 08:46:28', 0),
(4, 9, 23, 'title4', '<p><span style="color: #191919; font-family: ''PT Serif'', Helvetica, Arial, sans-serif; font-size: 16px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 26.4px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; display: inline !important; float: none; background-color: #ffffff;">The addition of a lift kit from BDS Suspension complete with Fox Racing Shocks at all corners soak up the bumps nicely and also allow clearance for the 37-inch tall Mickey Thompson Baja MTZ tires. Keeping the truck looking as close to what it looked like in 1977 was still very high on Fulks&rsquo; list, so using new wheels would not cut it, and stock wheels were not an option, as they would not fit with the new disc brakes. So, Fulks had a new, custom set of wheels cut by Wheel Smith Wheels made to look exactly like the smaller 1977 versions but large enough to clear the brakes.</span></p>', 'http://www.google.com', 1, 0, 0, '0000-00-00 00:00:00', '2016-03-02 08:47:36', 0),
(5, 9, 21, 'title5', '<p><span style="color: #191919; font-family: ''PT Serif'', Helvetica, Arial, sans-serif; font-size: 16px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 26.4px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; display: inline !important; float: none; background-color: #ffffff;">Since most of Fulks&rsquo; time would be spent inside the &rsquo;77, the original interior wouldn&rsquo;t even come close to cutting it. So Bent metal Customs sourced a complete interior from a 2012 King Ranch Super Duty to be transplanted. After modifying the interior, the body panels were Dynamated to reduce noise and help keep temperatures in check. Brunner then fit all the pieces. The seats , however, were not that easy and required extensive modification to fit them in. Once he&rsquo;d made all the necessary modifications and everything was fitting the way it should, the stereo was installed (featuring multiple parts from JL Audio, Kenwood, and Memphis Audio). Before sending it off to Gillin Design, a ton of work was done: the headliner was made from scratch, complete with a built-in, drop-down TV screen. High-end Mercedes English Wall carpet was laid down; door panels were built from scratch and installed; multiple select parts were wrapped in leather, and the rear seats were reupholstered. The truck then made it back to Bent Metal Customs where final touches were made before it could be returned to Kip Fulks.</span></p>', 'http://www.google.com', 1, 0, 0, '0000-00-00 00:00:00', '2016-03-02 08:49:04', 0),
(6, 9, 21, 'title6', '<p><span style="color: #191919; font-family: ''PT Serif'', Helvetica, Arial, sans-serif; font-size: 16px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 26.4px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; display: inline !important; float: none; background-color: #ffffff;">That&rsquo;s why we compiled this article. With practicality and bang-for-the-buck in mind, we&rsquo;re spelling out seven dyno-proven power combos from real-world, street-driven trucks that can point you in the right direction to get your truck putting down some heftier numbers. Sure, there were higher horsepower trucks in attendance at this particular event&mdash;the annual Randall&rsquo;s Performance Dyno Day &amp; Open House held in Gladstone, Illinois&mdash;but the rigs featured here are driven daily, hooked to trailers, only used during winter,</span><em style="box-sizing: border-box; color: #191919; font-family: ''PT Serif'', Helvetica, Arial, sans-serif; font-size: 16px; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 26.4px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: #ffffff;">and</em><span style="color: #191919; font-family: ''PT Serif'', Helvetica, Arial, sans-serif; font-size: 16px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 26.4px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; display: inline !important; float: none; background-color: #ffffff;"><span class="Apple-converted-space">&nbsp;</span>they still make respectable power. The best part is&mdash;the following parts combinations can be duplicated without breaking the bank.</span></p>', 'http://www.google.com', 1, 0, 0, '0000-00-00 00:00:00', '2016-03-02 08:50:50', 0),
(7, 9, 21, 'title7', '<p style="box-sizing: border-box; margin: 0px 0px 1.3em; color: #191919; font-family: ''PT Serif'', Helvetica, Arial, sans-serif; font-size: 16px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 26.4px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: #ffffff;"><strong style="box-sizing: border-box; font-weight: bold;">Hometown:</strong><span class="Apple-converted-space">&nbsp;</span>Milledgeville, Illinois</p>\r\n<p style="box-sizing: border-box; margin: 0px 0px 1.3em; color: #191919; font-family: ''PT Serif'', Helvetica, Arial, sans-serif; font-size: 16px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 26.4px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: #ffffff;"><strong style="box-sizing: border-box; font-weight: bold;">Truck:</strong><span class="Apple-converted-space">&nbsp;</span>&rsquo;04 Ford F-250</p>\r\n<p style="box-sizing: border-box; margin: 0px 0px 1.3em; color: #191919; font-family: ''PT Serif'', Helvetica, Arial, sans-serif; font-size: 16px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 26.4px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: #ffffff;"><strong style="box-sizing: border-box; font-weight: bold;">Engine:</strong><span class="Apple-converted-space">&nbsp;</span>6.0L Power Stroke with ported heads, hardened valve seats, and ARP 2000 head studs</p>\r\n<p style="box-sizing: border-box; margin: 0px 0px 1.3em; color: #191919; font-family: ''PT Serif'', Helvetica, Arial, sans-serif; font-size: 16px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 26.4px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: #ffffff;"><strong style="box-sizing: border-box; font-weight: bold;">Fuel:</strong><span class="Apple-converted-space">&nbsp;</span>215/75 conventional-style injectors, 165-gph AirDog II fuel system, Driven Diesel regulated return</p>\r\n<p style="box-sizing: border-box; margin: 0px 0px 1.3em; color: #191919; font-family: ''PT Serif'', Helvetica, Arial, sans-serif; font-size: 16px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 26.4px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: #ffffff;"><strong style="box-sizing: border-box; font-weight: bold;">Oil:</strong><span class="Apple-converted-space">&nbsp;</span>Factory high-pressure oil pump</p>\r\n<p style="box-sizing: border-box; margin: 0px 0px 1.3em; color: #191919; font-family: ''PT Serif'', Helvetica, Arial, sans-serif; font-size: 16px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 26.4px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: #ffffff;"><strong style="box-sizing: border-box; font-weight: bold;">Air:</strong><span class="Apple-converted-space">&nbsp;</span>Billet S467 turbo from High Tech Turbo, Irate Diesel Performance T4 mount, ported intake manifold, Banks techni-cooler intercooler, Banks intake elbow, Holderdown Performance hot-side intercooler pipe</p>\r\n<p style="box-sizing: border-box; margin: 0px 0px 1.3em; color: #191919; font-family: ''PT Serif'', Helvetica, Arial, sans-serif; font-size: 16px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 26.4px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: #ffffff;"><strong style="box-sizing: border-box; font-weight: bold;">Injectable:</strong><span class="Apple-converted-space">&nbsp;</span>Banks water-methanol injection system</p>\r\n<p style="box-sizing: border-box; margin: 0px 0px 1.3em; color: #191919; font-family: ''PT Serif'', Helvetica, Arial, sans-serif; font-size: 16px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 26.4px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: #ffffff;"><strong style="box-sizing: border-box; font-weight: bold;">Transmission:</strong><span class="Apple-converted-space">&nbsp;</span>5R110 TorqShift built by Bud Tegeler with Precision triple disc billet torque converter, TransGo shift kit, Sun Coast clutches, billet input shaft</p>\r\n<p style="box-sizing: border-box; margin: 0px 0px 1.3em; color: #191919; font-family: ''PT Serif'', Helvetica, Arial, sans-serif; font-size: 16px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 26.4px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: #ffffff;"><strong style="box-sizing: border-box; font-weight: bold;">Tuning:</strong><span class="Apple-converted-space">&nbsp;</span>Innovative Diesel via SCT programmer</p>', 'http://www.google.com', 1, 0, 0, '0000-00-00 00:00:00', '2016-03-02 08:52:01', 0),
(8, 9, 23, 'Title8', '<p><strong style="box-sizing: border-box; font-weight: bold; color: #191919; font-family: ''PT Serif'', Helvetica, Arial, sans-serif; font-size: 16px; font-style: normal; font-variant: normal; letter-spacing: normal; line-height: 26.4px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: #ffffff;">Quick Fact:</strong><span style="color: #191919; font-family: ''PT Serif'', Helvetica, Arial, sans-serif; font-size: 16px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 26.4px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; display: inline !important; float: none; background-color: #ffffff;"><span class="Apple-converted-space">&nbsp;</span>This truck is a real head turner, and we guarantee it&rsquo;s one of the cleanest second gens you&rsquo;ll find. Justen told us that his low-mile (94,000) Dodge is garage kept and only sees salt when he needs four wheel drive in the winter. Justen has used the same dyno since he started modifying the truck, and claimed that after making 535hp at his last visit, the addition of Flex-a-lite fans and a Spearco intercooler gained him 12 more hp and a whopping 80 lb-ft.</span></p>', 'http://www.google.com', 1, 0, 0, '0000-00-00 00:00:00', '2016-03-02 08:53:30', 0),
(9, 9, 21, 'title9', '<p style="box-sizing: border-box; margin: 0px 0px 1.3em; color: #191919; font-family: ''PT Serif'', Helvetica, Arial, sans-serif; font-size: 16px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 26.4px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: #ffffff;"><strong style="box-sizing: border-box; font-weight: bold;">Owner:</strong><span class="Apple-converted-space">&nbsp;</span>Zach Meyers</p>\r\n<p style="box-sizing: border-box; margin: 0px 0px 1.3em; color: #191919; font-family: ''PT Serif'', Helvetica, Arial, sans-serif; font-size: 16px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 26.4px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: #ffffff;"><strong style="box-sizing: border-box; font-weight: bold;">Hometown:</strong><span class="Apple-converted-space">&nbsp;</span>Pekin, Illinois</p>\r\n<p style="box-sizing: border-box; margin: 0px 0px 1.3em; color: #191919; font-family: ''PT Serif'', Helvetica, Arial, sans-serif; font-size: 16px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 26.4px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: #ffffff;"><strong style="box-sizing: border-box; font-weight: bold;">Truck:</strong><span class="Apple-converted-space">&nbsp;</span>&rsquo;08 Chevy Silverado 2500HD</p>\r\n<p style="box-sizing: border-box; margin: 0px 0px 1.3em; color: #191919; font-family: ''PT Serif'', Helvetica, Arial, sans-serif; font-size: 16px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 26.4px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: #ffffff;"><strong style="box-sizing: border-box; font-weight: bold;">Engine:</strong><span class="Apple-converted-space">&nbsp;</span>6.6L LMM Duramax</p>\r\n<p style="box-sizing: border-box; margin: 0px 0px 1.3em; color: #191919; font-family: ''PT Serif'', Helvetica, Arial, sans-serif; font-size: 16px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 26.4px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: #ffffff;"><strong style="box-sizing: border-box; font-weight: bold;">Fuel:</strong><span class="Apple-converted-space">&nbsp;</span>FASS Titanium 150-gph fuel system, stock injectors and CP3</p>\r\n<p style="box-sizing: border-box; margin: 0px 0px 1.3em; color: #191919; font-family: ''PT Serif'', Helvetica, Arial, sans-serif; font-size: 16px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 26.4px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: #ffffff;"><strong style="box-sizing: border-box; font-weight: bold;">Air:</strong><span class="Apple-converted-space">&nbsp;</span>Stock turbo, Wehrli Custom Fabrication 3-inch Y-bridge and 3-inch passenger side intercooler pipe, MBRP 3-inch driver side intercooler pipe, S&amp;B Filters cold air intake</p>\r\n<p style="box-sizing: border-box; margin: 0px 0px 1.3em; color: #191919; font-family: ''PT Serif'', Helvetica, Arial, sans-serif; font-size: 16px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 26.4px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: #ffffff;"><strong style="box-sizing: border-box; font-weight: bold;">Transmission:</strong><span class="Apple-converted-space">&nbsp;</span>Allison 1000 with TransGo shift kit</p>\r\n<p style="box-sizing: border-box; margin: 0px 0px 1.3em; color: #191919; font-family: ''PT Serif'', Helvetica, Arial, sans-serif; font-size: 16px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 26.4px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: #ffffff;"><strong style="box-sizing: border-box; font-weight: bold;">Tuning:</strong><span class="Apple-converted-space">&nbsp;</span>EFILive by Duramax Tuner with DSP5 switch and built transmission tuning</p>\r\n<p style="box-sizing: border-box; margin: 0px 0px 1.3em; color: #191919; font-family: ''PT Serif'', Helvetica, Arial, sans-serif; font-size: 16px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 26.4px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: #ffffff;"><strong style="box-sizing: border-box; font-weight: bold;">Horsepower:</strong><span class="Apple-converted-space">&nbsp;</span>452 hp</p>\r\n<p style="box-sizing: border-box; margin: 0px 0px 1.3em; color: #191919; font-family: ''PT Serif'', Helvetica, Arial, sans-serif; font-size: 16px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 26.4px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: #ffffff;"><strong style="box-sizing: border-box; font-weight: bold;">Torque:</strong><span class="Apple-converted-space">&nbsp;</span>741 lb-ft</p>\r\n<p style="box-sizing: border-box; margin: 0px 0px 1.3em; color: #191919; font-family: ''PT Serif'', Helvetica, Arial, sans-serif; font-size: 16px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 26.4px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: #ffffff;"><strong style="box-sizing: border-box; font-weight: bold;">Suspension:</strong><span class="Apple-converted-space">&nbsp;</span>Rare Parts Gen2 tie rods, Kryptonite upper control arms, Cognito Motorsports pitman and idler arm braces</p>\r\n<p style="box-sizing: border-box; margin: 0px 0px 1.3em; color: #191919; font-family: ''PT Serif'', Helvetica, Arial, sans-serif; font-size: 16px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 26.4px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: #ffffff;"><strong style="box-sizing: border-box; font-weight: bold;">Quick Fact:</strong><span class="Apple-converted-space">&nbsp;</span>Zach is living on the edge of what the factory Allison can handle, but he knows that, hence the built transmission tuning from DuramaxTuner. While some slippage could be seen on his dyno graphs, these are still pretty impressive numbers for an A1000 still sporting the factory torque converter and clutches.</p>\r\n<p>&nbsp;</p>', 'http://www.google.com', 1, 0, 0, '0000-00-00 00:00:00', '2016-03-02 08:54:31', 0),
(10, 9, 21, 'Title10', '<h2 style="box-sizing: border-box; font-family: ''PT Sans'', Helvetica, Arial, sans-serif; font-weight: bold; line-height: 1.1; color: #191919; margin-top: 20px; margin-bottom: 15px; font-size: 30px; border-bottom-width: 3px; border-bottom-style: solid; border-bottom-color: #dddddd; padding-bottom: 0.3em; font-style: normal; font-variant: normal; letter-spacing: normal; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: #ffffff;"><strong style="box-sizing: border-box; font-weight: bold;">VOLKSWAGEN</strong></h2>\r\n<p style="box-sizing: border-box; margin: 0px 0px 1.3em; color: #191919; font-family: ''PT Serif'', Helvetica, Arial, sans-serif; font-size: 16px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 26.4px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: #ffffff;">Volkswagen cheated. It&rsquo;s as simple as that. At the end of the day, however, the consequences of Volkswagen&rsquo;s decisions will have a great and problematic impact on the company, the environment, and in one way or another, the entire diesel industry in the United States.<span class="Apple-converted-space">&nbsp;</span><em style="box-sizing: border-box;">Diesel World</em><span class="Apple-converted-space">&nbsp;</span>readers (especially those who drive Volkswagen) deserve a swift and comprehensive explanation of recent events, and quite frankly, so does<span class="Apple-converted-space">&nbsp;</span><em style="box-sizing: border-box;">anyone</em><span class="Apple-converted-space">&nbsp;</span>who drives diesel. If you haven&rsquo;t digested the story in whole, here&rsquo;s the latest rundown.</p>\r\n<p style="box-sizing: border-box; margin: 0px 0px 1.3em; color: #191919; font-family: ''PT Serif'', Helvetica, Arial, sans-serif; font-size: 16px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 26.4px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: #ffffff;"><strong style="box-sizing: border-box; font-weight: bold;">WHY DID VOLKSWAGEN CHEAT?</strong></p>\r\n<p style="box-sizing: border-box; margin: 0px 0px 1.3em; color: #191919; font-family: ''PT Serif'', Helvetica, Arial, sans-serif; font-size: 16px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 26.4px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; padding-left: 30px; background-color: #ffffff;">We don&rsquo;t know. Either the company couldn&rsquo;t figure out how to pass EPA regulations the proper way, or they didn&rsquo;t care to. What we do know is that TDI engines as far back as 2009 until present have been rigged to pass EPA inspections despite the fact that they emit 40x the legal levels of NOx and other pollutants into the air.</p>\r\n<p style="box-sizing: border-box; margin: 0px 0px 1.3em; color: #191919; font-family: ''PT Serif'', Helvetica, Arial, sans-serif; font-size: 16px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 26.4px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: #ffffff;"><strong style="box-sizing: border-box; font-weight: bold;">HOW DID VW PULL THIS OFF?</strong></p>\r\n<p style="box-sizing: border-box; margin: 0px 0px 1.3em; color: #191919; font-family: ''PT Serif'', Helvetica, Arial, sans-serif; font-size: 16px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 26.4px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; padding-left: 30px; background-color: #ffffff;">Defeat devices. VW fitted complex, illegal software into its engines that recognizes when the vehicle is under inspection so that it can activate full emissions control, significantly reducing emissions and allowing for the vehicle to achieve a passing test. VW called them &ldquo;defeat devices.&rdquo; However, back on the road, the vehicle is unrestrained, as emissions control is discharged or greatly reduced. The result then is higher fuel economy at the cost of the environment.</p>', 'http://www.google.com', 1, 0, 0, '0000-00-00 00:00:00', '2016-03-02 08:56:07', 0),
(11, 9, 21, 'Title11', '<p style="box-sizing: border-box; margin: 0px 0px 1.3em; color: #191919; font-family: ''PT Serif'', Helvetica, Arial, sans-serif; font-size: 16px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 26.4px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: #ffffff;"><strong style="box-sizing: border-box; font-weight: bold;">WHAT&rsquo;S THE DAMAGE TO THE ENVIRONMENT?</strong></p>\r\n<p style="box-sizing: border-box; margin: 0px 0px 1.3em; color: #191919; font-family: ''PT Serif'', Helvetica, Arial, sans-serif; font-size: 16px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 26.4px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; padding-left: 30px; background-color: #ffffff;">As of last, the EPA states that in the U.S. alone, between 10,392 and 482,000 tons of NOx were released into the air by the unrestrained vehicles. Worldwide, between 237,161 and 948,691 tons of NOx were emitted. NOx can cause both environmental damage and create health risks, such as severe asthma. Experts agree that the damage to the environment is difficult to estimate and is certainly irrevocable.</p>\r\n<p style="box-sizing: border-box; margin: 0px 0px 1.3em; color: #191919; font-family: ''PT Serif'', Helvetica, Arial, sans-serif; font-size: 16px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 26.4px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: #ffffff;"><strong style="box-sizing: border-box; font-weight: bold;">WILL VOLKSWAGEN PAY FOR THE DAMAGES?</strong></p>\r\n<p style="box-sizing: border-box; margin: 0px 0px 1.3em; color: #191919; font-family: ''PT Serif'', Helvetica, Arial, sans-serif; font-size: 16px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 26.4px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; padding-left: 30px; background-color: #ffffff;">Absolutely<strong style="box-sizing: border-box; font-weight: bold;">.<span class="Apple-converted-space">&nbsp;</span></strong>So far, the company has set aside 7.3 billion to compensate for recalls, lawsuits and fines issued by different parties and nations affected by the 11 million illegally rigged vehicles sold by VW. However, when it&rsquo;s all said and done, VW is going to look at much heftier reparations than 7.3 billion. In the United States alone, the EPA can possibly slap the company with 18 billion worth of fines, or nearly $40,000 for each VW diesel sold.</p>\r\n<p style="box-sizing: border-box; margin: 0px 0px 1.3em; color: #191919; font-family: ''PT Serif'', Helvetica, Arial, sans-serif; font-size: 16px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 26.4px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: #ffffff;"><strong style="box-sizing: border-box; font-weight: bold;">CAN VW AFFORD TO PAY?</strong></p>\r\n<p style="box-sizing: border-box; margin: 0px 0px 1.3em; color: #191919; font-family: ''PT Serif'', Helvetica, Arial, sans-serif; font-size: 16px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 26.4px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; padding-left: 30px; background-color: #ffffff;">That&rsquo;s not certain. When we went to press, VW&rsquo;s market share had plummeted by 50%. However, the company is the largest manufacturer of vehicles in the world and has a reserve of 31 billion in case things get real hairy. Considering the current climate, it looks like VW is going to have to dip deep into the reserve tank.</p>', 'http://www.google.com', 1, 0, 0, '0000-00-00 00:00:00', '2016-03-02 08:57:12', 0),
(12, 9, 21, 'Title12', '<p style="box-sizing: border-box; margin: 0px 0px 1.3em; color: #191919; font-family: ''PT Serif'', Helvetica, Arial, sans-serif; font-size: 16px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 26.4px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: #ffffff;"><strong style="box-sizing: border-box; font-weight: bold;">WHAT ABOUT VW&rsquo;S LEADERSHIP? WHO&rsquo;S RESPONSIBLE, AND CAN THEY FACE JAIL TIME?</strong></p>\r\n<p style="box-sizing: border-box; margin: 0px 0px 1.3em; color: #191919; font-family: ''PT Serif'', Helvetica, Arial, sans-serif; font-size: 16px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 26.4px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; padding-left: 30px; background-color: #ffffff;">CEO of Volkswagen Martin Winterkom has stepped down, turning in his resignation with an admission of, &ldquo;Volkswagen needs a fresh start.&rdquo; Winterkom has accepted full responsibility for the company&rsquo;s present situation but has denied knowledge of the manufacturer&rsquo;s willingness to cheat. Yet, it&rsquo;s highly unlikely that Winterkom did not know about the defeat devices. Deciding to deceive consumers and officials on a global scale was not a low level call.</p>\r\n<p style="box-sizing: border-box; margin: 0px 0px 1.3em; color: #191919; font-family: ''PT Serif'', Helvetica, Arial, sans-serif; font-size: 16px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 26.4px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; padding-left: 30px; background-color: #ffffff;">In the meantime, Matthias Muller, 62, has succeeded Winterkom as CEO and has vowed to make the company as transparent as possible. The likelihood that Winterkom and or the VW executives held responsible for the fraudulent activities will face jail time is not high. History shows that executive officials have a way of slipping out of all the legal powers&rsquo; grip at the most opportune times. Winterkom&rsquo;s decision to step down before investigations deepen was a savvy move.</p>\r\n<p style="box-sizing: border-box; margin: 0px 0px 1.3em; color: #191919; font-family: ''PT Serif'', Helvetica, Arial, sans-serif; font-size: 16px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 26.4px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: #ffffff;"><strong style="box-sizing: border-box; font-weight: bold;">WHAT IF I OWN A TDI? WHAT MODELS WERE AFFECTED AND WHAT SHOULD I DO?</strong></p>\r\n<p style="box-sizing: border-box; margin: 0px 0px 1.3em; color: #191919; font-family: ''PT Serif'', Helvetica, Arial, sans-serif; font-size: 16px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 26.4px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; padding-left: 30px; background-color: #ffffff;">Nothing. At least until the EPA releases another statement, the agency&rsquo;s order for now was not to alter anything, in any way. Trying to remove the defeat devices or tampering with exhaust can only worsen the situation and release even more NOx into the atmosphere. The EPA is aware of the nearly 500,000 VW diesels in the U.S. and need to implement sound and thorough procedures for testing before the recall is issued. The models affected were the Jetta, Beetle, Golf, Passat and Audi A3.</p>', 'http://www.google.com', 1, 0, 0, '0000-00-00 00:00:00', '2016-03-02 08:58:30', 0),
(13, 9, 21, 'my title', '<p>sdaf asdfas dfsad fdasf</p>', 'http://www.google.co.in', 1, 0, 0, '0000-00-00 00:00:00', '2016-03-04 12:03:56', 0),
(14, 9, 21, 'mytest3', '<p>dsaf dsf sdaffsda</p>', 'http://google.com', 1, 0, 0, '0000-00-00 00:00:00', '2016-03-04 12:06:09', 0),
(15, 9, 22, 'mytest4', '<p>dsaf dsaf sdaf</p>', 'sadfds', 1, 1, 0, '0000-00-00 00:00:00', '2016-03-04 12:06:40', 0),
(16, 9, 22, 'addone', '<p>sadfsdaf</p>', 'http://www.gmail.com', 1, 1, 0, '0000-00-00 00:00:00', '2016-03-14 10:47:15', 0);

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
