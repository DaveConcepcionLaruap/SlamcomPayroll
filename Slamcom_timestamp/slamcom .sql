-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 16, 2017 at 09:39 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `slamcom`
--

-- --------------------------------------------------------

--
-- Table structure for table `timetable`
--

CREATE TABLE `timetable` (
  `timeIn` datetime NOT NULL,
  `timeOut` datetime NOT NULL,
  `HoursMade` int(11) NOT NULL,
  `userID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userID` int(11) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `emailadd` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userID`, `firstname`, `lastname`, `emailadd`, `password`, `active`) VALUES
(1, 'Robin Dalmy', 'Tubungbanua', 'dalmiet@gmail.com', '$2y$10$1d.SE/noFB4d643Vz/iC6./s0I1ZjZP20jxmJFwJPae9NujtuN44q', 1),
(2, 'Hanneh Jonna', 'Wang', 'hannehwang@gmail.com', '$2y$10$t8QrMS9j.aqkAgIyd/Jw9OVZeumorcX8KUIaGJGbO/DD4hxYkso9q', 1),
(3, 'Wilmar bae', 'Zaragoza', 'wilmarzara@gmail.com', '$2y$10$ijbJe6chi3JeE4p/oCVQBepRlP8zd5LpM4CdWsADMnDFuCVSBAZ9y', 1),
(4, 'Jami Brent', 'The Faggot', 'jamifagget@yahoo.com', '$2y$10$XFNTYeSs395lvfk9sP16HOShCsJIAQHVTxyJpVfonxqbh57X6IoDa', 1),
(5, 'Dave Dexter', 'Faggot', 'davefaggot@gmail.com', '$2y$10$jp2ghrlSP.rd/Gir7OkomOb/5OlB0mVKgEJIhT2xyIwrjmwOM0oPi', 1);

-- --------------------------------------------------------

--
-- Table structure for table `userschedule`
--

CREATE TABLE `userschedule` (
  `timeIn` datetime NOT NULL,
  `timeOut` datetime NOT NULL,
  `userID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `wp_commentmeta`
--

CREATE TABLE `wp_commentmeta` (
  `meta_id` bigint(20) UNSIGNED NOT NULL,
  `comment_id` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `meta_key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_value` longtext COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wp_comments`
--

CREATE TABLE `wp_comments` (
  `comment_ID` bigint(20) UNSIGNED NOT NULL,
  `comment_post_ID` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `comment_author` tinytext COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment_author_email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `comment_author_url` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `comment_author_IP` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `comment_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `comment_date_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `comment_content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment_karma` int(11) NOT NULL DEFAULT '0',
  `comment_approved` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `comment_agent` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `comment_type` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `comment_parent` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `user_id` bigint(20) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wp_comments`
--

INSERT INTO `wp_comments` (`comment_ID`, `comment_post_ID`, `comment_author`, `comment_author_email`, `comment_author_url`, `comment_author_IP`, `comment_date`, `comment_date_gmt`, `comment_content`, `comment_karma`, `comment_approved`, `comment_agent`, `comment_type`, `comment_parent`, `user_id`) VALUES
(1, 1, 'A WordPress Commenter', 'wapuu@wordpress.example', 'https://wordpress.org/', '', '2017-10-09 09:59:39', '2017-10-09 09:59:39', 'Hi, this is a comment.\nTo get started with moderating, editing, and deleting comments, please visit the Comments screen in the dashboard.\nCommenter avatars come from <a href="https://gravatar.com">Gravatar</a>.', 0, '1', '', '', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `wp_links`
--

CREATE TABLE `wp_links` (
  `link_id` bigint(20) UNSIGNED NOT NULL,
  `link_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `link_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `link_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `link_target` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `link_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `link_visible` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Y',
  `link_owner` bigint(20) UNSIGNED NOT NULL DEFAULT '1',
  `link_rating` int(11) NOT NULL DEFAULT '0',
  `link_updated` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `link_rel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `link_notes` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `link_rss` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wp_options`
--

CREATE TABLE `wp_options` (
  `option_id` bigint(20) UNSIGNED NOT NULL,
  `option_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `option_value` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `autoload` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'yes'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wp_options`
--

INSERT INTO `wp_options` (`option_id`, `option_name`, `option_value`, `autoload`) VALUES
(1, 'siteurl', 'http://localhost/wordpress', 'yes'),
(2, 'home', 'http://localhost/wordpress', 'yes'),
(3, 'blogname', 'slamcom timestamp app', 'yes'),
(4, 'blogdescription', 'A time table site for our beloved employees', 'yes'),
(5, 'users_can_register', '0', 'yes'),
(6, 'admin_email', 'dalmiet@gmail.com', 'yes'),
(7, 'start_of_week', '1', 'yes'),
(8, 'use_balanceTags', '0', 'yes'),
(9, 'use_smilies', '1', 'yes'),
(10, 'require_name_email', '1', 'yes'),
(11, 'comments_notify', '1', 'yes'),
(12, 'posts_per_rss', '10', 'yes'),
(13, 'rss_use_excerpt', '0', 'yes'),
(14, 'mailserver_url', 'mail.example.com', 'yes'),
(15, 'mailserver_login', 'login@example.com', 'yes'),
(16, 'mailserver_pass', 'password', 'yes'),
(17, 'mailserver_port', '110', 'yes'),
(18, 'default_category', '1', 'yes'),
(19, 'default_comment_status', 'open', 'yes'),
(20, 'default_ping_status', 'open', 'yes'),
(21, 'default_pingback_flag', '0', 'yes'),
(22, 'posts_per_page', '10', 'yes'),
(23, 'date_format', 'F j, Y', 'yes'),
(24, 'time_format', 'g:i a', 'yes'),
(25, 'links_updated_date_format', 'F j, Y g:i a', 'yes'),
(26, 'comment_moderation', '0', 'yes'),
(27, 'moderation_notify', '1', 'yes'),
(28, 'permalink_structure', '/%year%/%monthnum%/%day%/%postname%/', 'yes'),
(29, 'rewrite_rules', 'a:90:{s:11:"^wp-json/?$";s:22:"index.php?rest_route=/";s:14:"^wp-json/(.*)?";s:33:"index.php?rest_route=/$matches[1]";s:21:"^index.php/wp-json/?$";s:22:"index.php?rest_route=/";s:24:"^index.php/wp-json/(.*)?";s:33:"index.php?rest_route=/$matches[1]";s:47:"category/(.+?)/feed/(feed|rdf|rss|rss2|atom)/?$";s:52:"index.php?category_name=$matches[1]&feed=$matches[2]";s:42:"category/(.+?)/(feed|rdf|rss|rss2|atom)/?$";s:52:"index.php?category_name=$matches[1]&feed=$matches[2]";s:23:"category/(.+?)/embed/?$";s:46:"index.php?category_name=$matches[1]&embed=true";s:35:"category/(.+?)/page/?([0-9]{1,})/?$";s:53:"index.php?category_name=$matches[1]&paged=$matches[2]";s:17:"category/(.+?)/?$";s:35:"index.php?category_name=$matches[1]";s:44:"tag/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:42:"index.php?tag=$matches[1]&feed=$matches[2]";s:39:"tag/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:42:"index.php?tag=$matches[1]&feed=$matches[2]";s:20:"tag/([^/]+)/embed/?$";s:36:"index.php?tag=$matches[1]&embed=true";s:32:"tag/([^/]+)/page/?([0-9]{1,})/?$";s:43:"index.php?tag=$matches[1]&paged=$matches[2]";s:14:"tag/([^/]+)/?$";s:25:"index.php?tag=$matches[1]";s:45:"type/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:50:"index.php?post_format=$matches[1]&feed=$matches[2]";s:40:"type/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:50:"index.php?post_format=$matches[1]&feed=$matches[2]";s:21:"type/([^/]+)/embed/?$";s:44:"index.php?post_format=$matches[1]&embed=true";s:33:"type/([^/]+)/page/?([0-9]{1,})/?$";s:51:"index.php?post_format=$matches[1]&paged=$matches[2]";s:15:"type/([^/]+)/?$";s:33:"index.php?post_format=$matches[1]";s:48:".*wp-(atom|rdf|rss|rss2|feed|commentsrss2)\\.php$";s:18:"index.php?feed=old";s:20:".*wp-app\\.php(/.*)?$";s:19:"index.php?error=403";s:18:".*wp-register.php$";s:23:"index.php?register=true";s:32:"feed/(feed|rdf|rss|rss2|atom)/?$";s:27:"index.php?&feed=$matches[1]";s:27:"(feed|rdf|rss|rss2|atom)/?$";s:27:"index.php?&feed=$matches[1]";s:8:"embed/?$";s:21:"index.php?&embed=true";s:20:"page/?([0-9]{1,})/?$";s:28:"index.php?&paged=$matches[1]";s:27:"comment-page-([0-9]{1,})/?$";s:38:"index.php?&page_id=7&cpage=$matches[1]";s:41:"comments/feed/(feed|rdf|rss|rss2|atom)/?$";s:42:"index.php?&feed=$matches[1]&withcomments=1";s:36:"comments/(feed|rdf|rss|rss2|atom)/?$";s:42:"index.php?&feed=$matches[1]&withcomments=1";s:17:"comments/embed/?$";s:21:"index.php?&embed=true";s:44:"search/(.+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:40:"index.php?s=$matches[1]&feed=$matches[2]";s:39:"search/(.+)/(feed|rdf|rss|rss2|atom)/?$";s:40:"index.php?s=$matches[1]&feed=$matches[2]";s:20:"search/(.+)/embed/?$";s:34:"index.php?s=$matches[1]&embed=true";s:32:"search/(.+)/page/?([0-9]{1,})/?$";s:41:"index.php?s=$matches[1]&paged=$matches[2]";s:14:"search/(.+)/?$";s:23:"index.php?s=$matches[1]";s:47:"author/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:50:"index.php?author_name=$matches[1]&feed=$matches[2]";s:42:"author/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:50:"index.php?author_name=$matches[1]&feed=$matches[2]";s:23:"author/([^/]+)/embed/?$";s:44:"index.php?author_name=$matches[1]&embed=true";s:35:"author/([^/]+)/page/?([0-9]{1,})/?$";s:51:"index.php?author_name=$matches[1]&paged=$matches[2]";s:17:"author/([^/]+)/?$";s:33:"index.php?author_name=$matches[1]";s:69:"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/feed/(feed|rdf|rss|rss2|atom)/?$";s:80:"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&feed=$matches[4]";s:64:"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/(feed|rdf|rss|rss2|atom)/?$";s:80:"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&feed=$matches[4]";s:45:"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/embed/?$";s:74:"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&embed=true";s:57:"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/page/?([0-9]{1,})/?$";s:81:"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&paged=$matches[4]";s:39:"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/?$";s:63:"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]";s:56:"([0-9]{4})/([0-9]{1,2})/feed/(feed|rdf|rss|rss2|atom)/?$";s:64:"index.php?year=$matches[1]&monthnum=$matches[2]&feed=$matches[3]";s:51:"([0-9]{4})/([0-9]{1,2})/(feed|rdf|rss|rss2|atom)/?$";s:64:"index.php?year=$matches[1]&monthnum=$matches[2]&feed=$matches[3]";s:32:"([0-9]{4})/([0-9]{1,2})/embed/?$";s:58:"index.php?year=$matches[1]&monthnum=$matches[2]&embed=true";s:44:"([0-9]{4})/([0-9]{1,2})/page/?([0-9]{1,})/?$";s:65:"index.php?year=$matches[1]&monthnum=$matches[2]&paged=$matches[3]";s:26:"([0-9]{4})/([0-9]{1,2})/?$";s:47:"index.php?year=$matches[1]&monthnum=$matches[2]";s:43:"([0-9]{4})/feed/(feed|rdf|rss|rss2|atom)/?$";s:43:"index.php?year=$matches[1]&feed=$matches[2]";s:38:"([0-9]{4})/(feed|rdf|rss|rss2|atom)/?$";s:43:"index.php?year=$matches[1]&feed=$matches[2]";s:19:"([0-9]{4})/embed/?$";s:37:"index.php?year=$matches[1]&embed=true";s:31:"([0-9]{4})/page/?([0-9]{1,})/?$";s:44:"index.php?year=$matches[1]&paged=$matches[2]";s:13:"([0-9]{4})/?$";s:26:"index.php?year=$matches[1]";s:58:"[0-9]{4}/[0-9]{1,2}/[0-9]{1,2}/[^/]+/attachment/([^/]+)/?$";s:32:"index.php?attachment=$matches[1]";s:68:"[0-9]{4}/[0-9]{1,2}/[0-9]{1,2}/[^/]+/attachment/([^/]+)/trackback/?$";s:37:"index.php?attachment=$matches[1]&tb=1";s:88:"[0-9]{4}/[0-9]{1,2}/[0-9]{1,2}/[^/]+/attachment/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:83:"[0-9]{4}/[0-9]{1,2}/[0-9]{1,2}/[^/]+/attachment/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:83:"[0-9]{4}/[0-9]{1,2}/[0-9]{1,2}/[^/]+/attachment/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?attachment=$matches[1]&cpage=$matches[2]";s:64:"[0-9]{4}/[0-9]{1,2}/[0-9]{1,2}/[^/]+/attachment/([^/]+)/embed/?$";s:43:"index.php?attachment=$matches[1]&embed=true";s:53:"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/([^/]+)/embed/?$";s:91:"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&name=$matches[4]&embed=true";s:57:"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/([^/]+)/trackback/?$";s:85:"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&name=$matches[4]&tb=1";s:77:"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:97:"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&name=$matches[4]&feed=$matches[5]";s:72:"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:97:"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&name=$matches[4]&feed=$matches[5]";s:65:"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/([^/]+)/page/?([0-9]{1,})/?$";s:98:"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&name=$matches[4]&paged=$matches[5]";s:72:"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/([^/]+)/comment-page-([0-9]{1,})/?$";s:98:"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&name=$matches[4]&cpage=$matches[5]";s:61:"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/([^/]+)(?:/([0-9]+))?/?$";s:97:"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&name=$matches[4]&page=$matches[5]";s:47:"[0-9]{4}/[0-9]{1,2}/[0-9]{1,2}/[^/]+/([^/]+)/?$";s:32:"index.php?attachment=$matches[1]";s:57:"[0-9]{4}/[0-9]{1,2}/[0-9]{1,2}/[^/]+/([^/]+)/trackback/?$";s:37:"index.php?attachment=$matches[1]&tb=1";s:77:"[0-9]{4}/[0-9]{1,2}/[0-9]{1,2}/[^/]+/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:72:"[0-9]{4}/[0-9]{1,2}/[0-9]{1,2}/[^/]+/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:72:"[0-9]{4}/[0-9]{1,2}/[0-9]{1,2}/[^/]+/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?attachment=$matches[1]&cpage=$matches[2]";s:53:"[0-9]{4}/[0-9]{1,2}/[0-9]{1,2}/[^/]+/([^/]+)/embed/?$";s:43:"index.php?attachment=$matches[1]&embed=true";s:64:"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/comment-page-([0-9]{1,})/?$";s:81:"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&cpage=$matches[4]";s:51:"([0-9]{4})/([0-9]{1,2})/comment-page-([0-9]{1,})/?$";s:65:"index.php?year=$matches[1]&monthnum=$matches[2]&cpage=$matches[3]";s:38:"([0-9]{4})/comment-page-([0-9]{1,})/?$";s:44:"index.php?year=$matches[1]&cpage=$matches[2]";s:27:".?.+?/attachment/([^/]+)/?$";s:32:"index.php?attachment=$matches[1]";s:37:".?.+?/attachment/([^/]+)/trackback/?$";s:37:"index.php?attachment=$matches[1]&tb=1";s:57:".?.+?/attachment/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:52:".?.+?/attachment/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:52:".?.+?/attachment/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?attachment=$matches[1]&cpage=$matches[2]";s:33:".?.+?/attachment/([^/]+)/embed/?$";s:43:"index.php?attachment=$matches[1]&embed=true";s:16:"(.?.+?)/embed/?$";s:41:"index.php?pagename=$matches[1]&embed=true";s:20:"(.?.+?)/trackback/?$";s:35:"index.php?pagename=$matches[1]&tb=1";s:40:"(.?.+?)/feed/(feed|rdf|rss|rss2|atom)/?$";s:47:"index.php?pagename=$matches[1]&feed=$matches[2]";s:35:"(.?.+?)/(feed|rdf|rss|rss2|atom)/?$";s:47:"index.php?pagename=$matches[1]&feed=$matches[2]";s:28:"(.?.+?)/page/?([0-9]{1,})/?$";s:48:"index.php?pagename=$matches[1]&paged=$matches[2]";s:35:"(.?.+?)/comment-page-([0-9]{1,})/?$";s:48:"index.php?pagename=$matches[1]&cpage=$matches[2]";s:24:"(.?.+?)(?:/([0-9]+))?/?$";s:47:"index.php?pagename=$matches[1]&page=$matches[2]";}', 'yes'),
(30, 'hack_file', '0', 'yes'),
(31, 'blog_charset', 'UTF-8', 'yes'),
(32, 'moderation_keys', '', 'no'),
(33, 'active_plugins', 'a:1:{i:0;s:35:"shiftcontroller/shiftcontroller.php";}', 'yes'),
(34, 'category_base', '', 'yes'),
(35, 'ping_sites', 'http://rpc.pingomatic.com/', 'yes'),
(36, 'comment_max_links', '2', 'yes'),
(37, 'gmt_offset', '0', 'yes'),
(38, 'default_email_category', '1', 'yes'),
(39, 'recently_edited', '', 'no'),
(40, 'template', 'twentyseventeen', 'yes'),
(41, 'stylesheet', 'twentyseventeen', 'yes'),
(42, 'comment_whitelist', '1', 'yes'),
(43, 'blacklist_keys', '', 'no'),
(44, 'comment_registration', '0', 'yes'),
(45, 'html_type', 'text/html', 'yes'),
(46, 'use_trackback', '0', 'yes'),
(47, 'default_role', 'subscriber', 'yes'),
(48, 'db_version', '38590', 'yes'),
(49, 'uploads_use_yearmonth_folders', '1', 'yes'),
(50, 'upload_path', '', 'yes'),
(51, 'blog_public', '0', 'yes'),
(52, 'default_link_category', '2', 'yes'),
(53, 'show_on_front', 'page', 'yes'),
(54, 'tag_base', '', 'yes'),
(55, 'show_avatars', '1', 'yes'),
(56, 'avatar_rating', 'G', 'yes'),
(57, 'upload_url_path', '', 'yes'),
(58, 'thumbnail_size_w', '150', 'yes'),
(59, 'thumbnail_size_h', '150', 'yes'),
(60, 'thumbnail_crop', '1', 'yes'),
(61, 'medium_size_w', '300', 'yes'),
(62, 'medium_size_h', '300', 'yes'),
(63, 'avatar_default', 'mystery', 'yes'),
(64, 'large_size_w', '1024', 'yes'),
(65, 'large_size_h', '1024', 'yes'),
(66, 'image_default_link_type', 'none', 'yes'),
(67, 'image_default_size', '', 'yes'),
(68, 'image_default_align', '', 'yes'),
(69, 'close_comments_for_old_posts', '0', 'yes'),
(70, 'close_comments_days_old', '14', 'yes'),
(71, 'thread_comments', '1', 'yes'),
(72, 'thread_comments_depth', '5', 'yes'),
(73, 'page_comments', '0', 'yes'),
(74, 'comments_per_page', '50', 'yes'),
(75, 'default_comments_page', 'newest', 'yes'),
(76, 'comment_order', 'asc', 'yes'),
(77, 'sticky_posts', 'a:0:{}', 'yes'),
(78, 'widget_categories', 'a:2:{i:2;a:4:{s:5:"title";s:0:"";s:5:"count";i:0;s:12:"hierarchical";i:0;s:8:"dropdown";i:0;}s:12:"_multiwidget";i:1;}', 'yes'),
(79, 'widget_text', 'a:5:{i:2;a:4:{s:5:"title";s:7:"Find Us";s:4:"text";s:168:"<strong>Address</strong>\n123 Main Street\nNew York, NY 10001\n\n<strong>Hours</strong>\nMonday&mdash;Friday: 9:00AM&ndash;5:00PM\nSaturday &amp; Sunday: 11:00AM&ndash;3:00PM";s:6:"filter";b:1;s:6:"visual";b:1;}i:3;a:4:{s:5:"title";s:15:"About This Site";s:4:"text";s:85:"This may be a good place to introduce yourself and your site or include some credits.";s:6:"filter";b:1;s:6:"visual";b:1;}i:4;a:4:{s:5:"title";s:7:"Find Us";s:4:"text";s:168:"<strong>Address</strong>\n123 Main Street\nNew York, NY 10001\n\n<strong>Hours</strong>\nMonday&mdash;Friday: 9:00AM&ndash;5:00PM\nSaturday &amp; Sunday: 11:00AM&ndash;3:00PM";s:6:"filter";b:1;s:6:"visual";b:1;}i:5;a:4:{s:5:"title";s:15:"About This Site";s:4:"text";s:85:"This may be a good place to introduce yourself and your site or include some credits.";s:6:"filter";b:1;s:6:"visual";b:1;}s:12:"_multiwidget";i:1;}', 'yes'),
(80, 'widget_rss', 'a:2:{i:1;a:0:{}s:12:"_multiwidget";i:1;}', 'yes'),
(81, 'uninstall_plugins', 'a:1:{s:35:"shiftcontroller/shiftcontroller.php";a:2:{i:0;s:15:"ShiftController";i:1;s:9:"uninstall";}}', 'no'),
(82, 'timezone_string', '', 'yes'),
(83, 'page_for_posts', '10', 'yes'),
(84, 'page_on_front', '7', 'yes'),
(85, 'default_post_format', '0', 'yes'),
(86, 'link_manager_enabled', '0', 'yes'),
(87, 'finished_splitting_shared_terms', '1', 'yes'),
(88, 'site_icon', '0', 'yes'),
(89, 'medium_large_size_w', '768', 'yes'),
(90, 'medium_large_size_h', '0', 'yes'),
(91, 'initial_db_version', '38590', 'yes'),
(92, 'wp_user_roles', 'a:5:{s:13:"administrator";a:2:{s:4:"name";s:13:"Administrator";s:12:"capabilities";a:61:{s:13:"switch_themes";b:1;s:11:"edit_themes";b:1;s:16:"activate_plugins";b:1;s:12:"edit_plugins";b:1;s:10:"edit_users";b:1;s:10:"edit_files";b:1;s:14:"manage_options";b:1;s:17:"moderate_comments";b:1;s:17:"manage_categories";b:1;s:12:"manage_links";b:1;s:12:"upload_files";b:1;s:6:"import";b:1;s:15:"unfiltered_html";b:1;s:10:"edit_posts";b:1;s:17:"edit_others_posts";b:1;s:20:"edit_published_posts";b:1;s:13:"publish_posts";b:1;s:10:"edit_pages";b:1;s:4:"read";b:1;s:8:"level_10";b:1;s:7:"level_9";b:1;s:7:"level_8";b:1;s:7:"level_7";b:1;s:7:"level_6";b:1;s:7:"level_5";b:1;s:7:"level_4";b:1;s:7:"level_3";b:1;s:7:"level_2";b:1;s:7:"level_1";b:1;s:7:"level_0";b:1;s:17:"edit_others_pages";b:1;s:20:"edit_published_pages";b:1;s:13:"publish_pages";b:1;s:12:"delete_pages";b:1;s:19:"delete_others_pages";b:1;s:22:"delete_published_pages";b:1;s:12:"delete_posts";b:1;s:19:"delete_others_posts";b:1;s:22:"delete_published_posts";b:1;s:20:"delete_private_posts";b:1;s:18:"edit_private_posts";b:1;s:18:"read_private_posts";b:1;s:20:"delete_private_pages";b:1;s:18:"edit_private_pages";b:1;s:18:"read_private_pages";b:1;s:12:"delete_users";b:1;s:12:"create_users";b:1;s:17:"unfiltered_upload";b:1;s:14:"edit_dashboard";b:1;s:14:"update_plugins";b:1;s:14:"delete_plugins";b:1;s:15:"install_plugins";b:1;s:13:"update_themes";b:1;s:14:"install_themes";b:1;s:11:"update_core";b:1;s:10:"list_users";b:1;s:12:"remove_users";b:1;s:13:"promote_users";b:1;s:18:"edit_theme_options";b:1;s:13:"delete_themes";b:1;s:6:"export";b:1;}}s:6:"editor";a:2:{s:4:"name";s:6:"Editor";s:12:"capabilities";a:34:{s:17:"moderate_comments";b:1;s:17:"manage_categories";b:1;s:12:"manage_links";b:1;s:12:"upload_files";b:1;s:15:"unfiltered_html";b:1;s:10:"edit_posts";b:1;s:17:"edit_others_posts";b:1;s:20:"edit_published_posts";b:1;s:13:"publish_posts";b:1;s:10:"edit_pages";b:1;s:4:"read";b:1;s:7:"level_7";b:1;s:7:"level_6";b:1;s:7:"level_5";b:1;s:7:"level_4";b:1;s:7:"level_3";b:1;s:7:"level_2";b:1;s:7:"level_1";b:1;s:7:"level_0";b:1;s:17:"edit_others_pages";b:1;s:20:"edit_published_pages";b:1;s:13:"publish_pages";b:1;s:12:"delete_pages";b:1;s:19:"delete_others_pages";b:1;s:22:"delete_published_pages";b:1;s:12:"delete_posts";b:1;s:19:"delete_others_posts";b:1;s:22:"delete_published_posts";b:1;s:20:"delete_private_posts";b:1;s:18:"edit_private_posts";b:1;s:18:"read_private_posts";b:1;s:20:"delete_private_pages";b:1;s:18:"edit_private_pages";b:1;s:18:"read_private_pages";b:1;}}s:6:"author";a:2:{s:4:"name";s:6:"Author";s:12:"capabilities";a:10:{s:12:"upload_files";b:1;s:10:"edit_posts";b:1;s:20:"edit_published_posts";b:1;s:13:"publish_posts";b:1;s:4:"read";b:1;s:7:"level_2";b:1;s:7:"level_1";b:1;s:7:"level_0";b:1;s:12:"delete_posts";b:1;s:22:"delete_published_posts";b:1;}}s:11:"contributor";a:2:{s:4:"name";s:11:"Contributor";s:12:"capabilities";a:5:{s:10:"edit_posts";b:1;s:4:"read";b:1;s:7:"level_1";b:1;s:7:"level_0";b:1;s:12:"delete_posts";b:1;}}s:10:"subscriber";a:2:{s:4:"name";s:10:"Subscriber";s:12:"capabilities";a:2:{s:4:"read";b:1;s:7:"level_0";b:1;}}}', 'yes'),
(93, 'fresh_site', '0', 'yes'),
(94, 'widget_search', 'a:4:{i:2;a:1:{s:5:"title";s:0:"";}s:12:"_multiwidget";i:1;i:3;a:1:{s:5:"title";s:6:"Search";}i:4;a:1:{s:5:"title";s:6:"Search";}}', 'yes'),
(95, 'widget_recent-posts', 'a:2:{i:2;a:2:{s:5:"title";s:0:"";s:6:"number";i:5;}s:12:"_multiwidget";i:1;}', 'yes'),
(96, 'widget_recent-comments', 'a:2:{i:2;a:2:{s:5:"title";s:0:"";s:6:"number";i:5;}s:12:"_multiwidget";i:1;}', 'yes'),
(97, 'widget_archives', 'a:2:{i:2;a:3:{s:5:"title";s:0:"";s:5:"count";i:0;s:8:"dropdown";i:0;}s:12:"_multiwidget";i:1;}', 'yes'),
(98, 'widget_meta', 'a:2:{i:2;a:1:{s:5:"title";s:0:"";}s:12:"_multiwidget";i:1;}', 'yes'),
(99, 'sidebars_widgets', 'a:5:{s:19:"wp_inactive_widgets";a:0:{}s:9:"sidebar-1";a:3:{i:0;s:6:"text-2";i:1;s:8:"search-3";i:2;s:6:"text-3";}s:9:"sidebar-2";a:1:{i:0;s:6:"text-4";}s:9:"sidebar-3";a:2:{i:0;s:6:"text-5";i:1;s:8:"search-4";}s:13:"array_version";i:3;}', 'yes'),
(100, 'widget_pages', 'a:1:{s:12:"_multiwidget";i:1;}', 'yes'),
(101, 'widget_calendar', 'a:1:{s:12:"_multiwidget";i:1;}', 'yes'),
(102, 'widget_media_audio', 'a:1:{s:12:"_multiwidget";i:1;}', 'yes'),
(103, 'widget_media_image', 'a:1:{s:12:"_multiwidget";i:1;}', 'yes'),
(104, 'widget_media_video', 'a:1:{s:12:"_multiwidget";i:1;}', 'yes'),
(105, 'widget_tag_cloud', 'a:1:{s:12:"_multiwidget";i:1;}', 'yes'),
(106, 'widget_nav_menu', 'a:1:{s:12:"_multiwidget";i:1;}', 'yes'),
(107, 'widget_custom_html', 'a:1:{s:12:"_multiwidget";i:1;}', 'yes'),
(108, 'cron', 'a:4:{i:1507586381;a:3:{s:16:"wp_version_check";a:1:{s:32:"40cd750bba9870f18aada2478b24840a";a:3:{s:8:"schedule";s:10:"twicedaily";s:4:"args";a:0:{}s:8:"interval";i:43200;}}s:17:"wp_update_plugins";a:1:{s:32:"40cd750bba9870f18aada2478b24840a";a:3:{s:8:"schedule";s:10:"twicedaily";s:4:"args";a:0:{}s:8:"interval";i:43200;}}s:16:"wp_update_themes";a:1:{s:32:"40cd750bba9870f18aada2478b24840a";a:3:{s:8:"schedule";s:10:"twicedaily";s:4:"args";a:0:{}s:8:"interval";i:43200;}}}i:1507631421;a:1:{s:19:"wp_scheduled_delete";a:1:{s:32:"40cd750bba9870f18aada2478b24840a";a:3:{s:8:"schedule";s:5:"daily";s:4:"args";a:0:{}s:8:"interval";i:86400;}}}i:1507632310;a:1:{s:30:"wp_scheduled_auto_draft_delete";a:1:{s:32:"40cd750bba9870f18aada2478b24840a";a:3:{s:8:"schedule";s:5:"daily";s:4:"args";a:0:{}s:8:"interval";i:86400;}}}s:7:"version";i:2;}', 'yes'),
(109, 'theme_mods_twentyseventeen', 'a:6:{s:18:"custom_css_post_id";i:-1;s:18:"nav_menu_locations";a:2:{s:3:"top";i:2;s:6:"social";i:3;}s:7:"panel_1";i:11;s:7:"panel_2";i:8;s:7:"panel_3";i:10;s:7:"panel_4";i:9;}', 'yes'),
(113, '_site_transient_update_core', 'O:8:"stdClass":4:{s:7:"updates";a:1:{i:0;O:8:"stdClass":10:{s:8:"response";s:6:"latest";s:8:"download";s:59:"https://downloads.wordpress.org/release/wordpress-4.8.1.zip";s:6:"locale";s:5:"en_US";s:8:"packages";O:8:"stdClass":5:{s:4:"full";s:59:"https://downloads.wordpress.org/release/wordpress-4.8.1.zip";s:10:"no_content";s:70:"https://downloads.wordpress.org/release/wordpress-4.8.1-no-content.zip";s:11:"new_bundled";s:71:"https://downloads.wordpress.org/release/wordpress-4.8.1-new-bundled.zip";s:7:"partial";b:0;s:8:"rollback";b:0;}s:7:"current";s:5:"4.8.1";s:7:"version";s:5:"4.8.1";s:11:"php_version";s:5:"5.2.4";s:13:"mysql_version";s:3:"5.0";s:11:"new_bundled";s:3:"4.7";s:15:"partial_version";s:0:"";}}s:12:"last_checked";i:1507545879;s:15:"version_checked";s:5:"4.8.1";s:12:"translations";a:0:{}}', 'no'),
(115, '_site_transient_timeout_theme_roots', '1507546797', 'no'),
(116, '_site_transient_theme_roots', 'a:3:{s:13:"twentyfifteen";s:7:"/themes";s:15:"twentyseventeen";s:7:"/themes";s:13:"twentysixteen";s:7:"/themes";}', 'no'),
(117, '_site_transient_update_themes', 'O:8:"stdClass":4:{s:12:"last_checked";i:1507545878;s:7:"checked";a:3:{s:13:"twentyfifteen";s:3:"1.8";s:15:"twentyseventeen";s:3:"1.3";s:13:"twentysixteen";s:3:"1.3";}s:8:"response";a:0:{}s:12:"translations";a:0:{}}', 'no'),
(119, '_transient_timeout_dash_v2_88ae138922fe95674369b1cb3d215a2b', '1507588225', 'no'),
(120, '_transient_dash_v2_88ae138922fe95674369b1cb3d215a2b', '<div class="rss-widget"><p><strong>RSS Error:</strong> WP HTTP Error: cURL error 6: Could not resolve host: wordpress.org</p></div><div class="rss-widget"><p><strong>RSS Error:</strong> WP HTTP Error: cURL error 6: Could not resolve host: planet.wordpress.org</p></div>', 'no'),
(121, 'can_compress_scripts', '1', 'no'),
(131, 'nav_menu_options', 'a:1:{s:8:"auto_add";a:0:{}}', 'yes'),
(133, '_site_transient_timeout_poptags_40cd750bba9870f18aada2478b24840a', '1507556511', 'no'),
(134, '_site_transient_poptags_40cd750bba9870f18aada2478b24840a', 'O:8:"stdClass":100:{s:6:"widget";a:3:{s:4:"name";s:6:"widget";s:4:"slug";s:6:"widget";s:5:"count";i:4358;}s:4:"post";a:3:{s:4:"name";s:4:"post";s:4:"slug";s:4:"post";s:5:"count";i:2493;}s:5:"admin";a:3:{s:4:"name";s:5:"admin";s:4:"slug";s:5:"admin";s:5:"count";i:2362;}s:11:"woocommerce";a:3:{s:4:"name";s:11:"woocommerce";s:4:"slug";s:11:"woocommerce";s:5:"count";i:2239;}s:5:"posts";a:3:{s:4:"name";s:5:"posts";s:4:"slug";s:5:"posts";s:5:"count";i:1828;}s:8:"comments";a:3:{s:4:"name";s:8:"comments";s:4:"slug";s:8:"comments";s:5:"count";i:1596;}s:9:"shortcode";a:3:{s:4:"name";s:9:"shortcode";s:4:"slug";s:9:"shortcode";s:5:"count";i:1580;}s:7:"twitter";a:3:{s:4:"name";s:7:"twitter";s:4:"slug";s:7:"twitter";s:5:"count";i:1434;}s:6:"google";a:3:{s:4:"name";s:6:"google";s:4:"slug";s:6:"google";s:5:"count";i:1355;}s:6:"images";a:3:{s:4:"name";s:6:"images";s:4:"slug";s:6:"images";s:5:"count";i:1350;}s:8:"facebook";a:3:{s:4:"name";s:8:"facebook";s:4:"slug";s:8:"facebook";s:5:"count";i:1332;}s:7:"sidebar";a:3:{s:4:"name";s:7:"sidebar";s:4:"slug";s:7:"sidebar";s:5:"count";i:1272;}s:5:"image";a:3:{s:4:"name";s:5:"image";s:4:"slug";s:5:"image";s:5:"count";i:1267;}s:3:"seo";a:3:{s:4:"name";s:3:"seo";s:4:"slug";s:3:"seo";s:5:"count";i:1122;}s:7:"gallery";a:3:{s:4:"name";s:7:"gallery";s:4:"slug";s:7:"gallery";s:5:"count";i:1051;}s:4:"page";a:3:{s:4:"name";s:4:"page";s:4:"slug";s:4:"page";s:5:"count";i:1044;}s:6:"social";a:3:{s:4:"name";s:6:"social";s:4:"slug";s:6:"social";s:5:"count";i:998;}s:5:"email";a:3:{s:4:"name";s:5:"email";s:4:"slug";s:5:"email";s:5:"count";i:942;}s:5:"links";a:3:{s:4:"name";s:5:"links";s:4:"slug";s:5:"links";s:5:"count";i:814;}s:9:"ecommerce";a:3:{s:4:"name";s:9:"ecommerce";s:4:"slug";s:9:"ecommerce";s:5:"count";i:806;}s:5:"login";a:3:{s:4:"name";s:5:"login";s:4:"slug";s:5:"login";s:5:"count";i:804;}s:7:"widgets";a:3:{s:4:"name";s:7:"widgets";s:4:"slug";s:7:"widgets";s:5:"count";i:773;}s:5:"video";a:3:{s:4:"name";s:5:"video";s:4:"slug";s:5:"video";s:5:"count";i:765;}s:7:"content";a:3:{s:4:"name";s:7:"content";s:4:"slug";s:7:"content";s:5:"count";i:669;}s:3:"rss";a:3:{s:4:"name";s:3:"rss";s:4:"slug";s:3:"rss";s:5:"count";i:669;}s:10:"buddypress";a:3:{s:4:"name";s:10:"buddypress";s:4:"slug";s:10:"buddypress";s:5:"count";i:662;}s:4:"spam";a:3:{s:4:"name";s:4:"spam";s:4:"slug";s:4:"spam";s:5:"count";i:653;}s:5:"pages";a:3:{s:4:"name";s:5:"pages";s:4:"slug";s:5:"pages";s:5:"count";i:643;}s:8:"security";a:3:{s:4:"name";s:8:"security";s:4:"slug";s:8:"security";s:5:"count";i:638;}s:6:"jquery";a:3:{s:4:"name";s:6:"jquery";s:4:"slug";s:6:"jquery";s:5:"count";i:637;}s:6:"slider";a:3:{s:4:"name";s:6:"slider";s:4:"slug";s:6:"slider";s:5:"count";i:620;}s:5:"media";a:3:{s:4:"name";s:5:"media";s:4:"slug";s:5:"media";s:5:"count";i:605;}s:4:"ajax";a:3:{s:4:"name";s:4:"ajax";s:4:"slug";s:4:"ajax";s:5:"count";i:591;}s:9:"analytics";a:3:{s:4:"name";s:9:"analytics";s:4:"slug";s:9:"analytics";s:5:"count";i:591;}s:4:"feed";a:3:{s:4:"name";s:4:"feed";s:4:"slug";s:4:"feed";s:5:"count";i:589;}s:6:"search";a:3:{s:4:"name";s:6:"search";s:4:"slug";s:6:"search";s:5:"count";i:577;}s:8:"category";a:3:{s:4:"name";s:8:"category";s:4:"slug";s:8:"category";s:5:"count";i:573;}s:10:"e-commerce";a:3:{s:4:"name";s:10:"e-commerce";s:4:"slug";s:10:"e-commerce";s:5:"count";i:571;}s:4:"menu";a:3:{s:4:"name";s:4:"menu";s:4:"slug";s:4:"menu";s:5:"count";i:557;}s:4:"form";a:3:{s:4:"name";s:4:"form";s:4:"slug";s:4:"form";s:5:"count";i:546;}s:5:"embed";a:3:{s:4:"name";s:5:"embed";s:4:"slug";s:5:"embed";s:5:"count";i:541;}s:10:"javascript";a:3:{s:4:"name";s:10:"javascript";s:4:"slug";s:10:"javascript";s:5:"count";i:532;}s:4:"link";a:3:{s:4:"name";s:4:"link";s:4:"slug";s:4:"link";s:5:"count";i:521;}s:3:"css";a:3:{s:4:"name";s:3:"css";s:4:"slug";s:3:"css";s:5:"count";i:511;}s:5:"share";a:3:{s:4:"name";s:5:"share";s:4:"slug";s:5:"share";s:5:"count";i:502;}s:7:"youtube";a:3:{s:4:"name";s:7:"youtube";s:4:"slug";s:7:"youtube";s:5:"count";i:498;}s:7:"comment";a:3:{s:4:"name";s:7:"comment";s:4:"slug";s:7:"comment";s:5:"count";i:493;}s:5:"theme";a:3:{s:4:"name";s:5:"theme";s:4:"slug";s:5:"theme";s:5:"count";i:482;}s:9:"dashboard";a:3:{s:4:"name";s:9:"dashboard";s:4:"slug";s:9:"dashboard";s:5:"count";i:473;}s:6:"custom";a:3:{s:4:"name";s:6:"custom";s:4:"slug";s:6:"custom";s:5:"count";i:472;}s:10:"responsive";a:3:{s:4:"name";s:10:"responsive";s:4:"slug";s:10:"responsive";s:5:"count";i:469;}s:10:"categories";a:3:{s:4:"name";s:10:"categories";s:4:"slug";s:10:"categories";s:5:"count";i:467;}s:3:"ads";a:3:{s:4:"name";s:3:"ads";s:4:"slug";s:3:"ads";s:5:"count";i:443;}s:6:"editor";a:3:{s:4:"name";s:6:"editor";s:4:"slug";s:6:"editor";s:5:"count";i:439;}s:9:"affiliate";a:3:{s:4:"name";s:9:"affiliate";s:4:"slug";s:9:"affiliate";s:5:"count";i:439;}s:6:"button";a:3:{s:4:"name";s:6:"button";s:4:"slug";s:6:"button";s:5:"count";i:436;}s:4:"tags";a:3:{s:4:"name";s:4:"tags";s:4:"slug";s:4:"tags";s:5:"count";i:435;}s:12:"contact-form";a:3:{s:4:"name";s:12:"contact form";s:4:"slug";s:12:"contact-form";s:5:"count";i:427;}s:5:"photo";a:3:{s:4:"name";s:5:"photo";s:4:"slug";s:5:"photo";s:5:"count";i:418;}s:4:"user";a:3:{s:4:"name";s:4:"user";s:4:"slug";s:4:"user";s:5:"count";i:416;}s:9:"slideshow";a:3:{s:4:"name";s:9:"slideshow";s:4:"slug";s:9:"slideshow";s:5:"count";i:406;}s:6:"mobile";a:3:{s:4:"name";s:6:"mobile";s:4:"slug";s:6:"mobile";s:5:"count";i:405;}s:7:"contact";a:3:{s:4:"name";s:7:"contact";s:4:"slug";s:7:"contact";s:5:"count";i:403;}s:5:"users";a:3:{s:4:"name";s:5:"users";s:4:"slug";s:5:"users";s:5:"count";i:401;}s:5:"stats";a:3:{s:4:"name";s:5:"stats";s:4:"slug";s:5:"stats";s:5:"count";i:400;}s:6:"photos";a:3:{s:4:"name";s:6:"photos";s:4:"slug";s:6:"photos";s:5:"count";i:396;}s:10:"statistics";a:3:{s:4:"name";s:10:"statistics";s:4:"slug";s:10:"statistics";s:5:"count";i:381;}s:3:"api";a:3:{s:4:"name";s:3:"api";s:4:"slug";s:3:"api";s:5:"count";i:380;}s:6:"events";a:3:{s:4:"name";s:6:"events";s:4:"slug";s:6:"events";s:5:"count";i:378;}s:10:"navigation";a:3:{s:4:"name";s:10:"navigation";s:4:"slug";s:10:"navigation";s:5:"count";i:369;}s:4:"news";a:3:{s:4:"name";s:4:"news";s:4:"slug";s:4:"news";s:5:"count";i:353;}s:8:"calendar";a:3:{s:4:"name";s:8:"calendar";s:4:"slug";s:8:"calendar";s:5:"count";i:344;}s:7:"payment";a:3:{s:4:"name";s:7:"payment";s:4:"slug";s:7:"payment";s:5:"count";i:333;}s:9:"multisite";a:3:{s:4:"name";s:9:"multisite";s:4:"slug";s:9:"multisite";s:5:"count";i:332;}s:7:"plugins";a:3:{s:4:"name";s:7:"plugins";s:4:"slug";s:7:"plugins";s:5:"count";i:331;}s:10:"shortcodes";a:3:{s:4:"name";s:10:"shortcodes";s:4:"slug";s:10:"shortcodes";s:5:"count";i:330;}s:12:"social-media";a:3:{s:4:"name";s:12:"social media";s:4:"slug";s:12:"social-media";s:5:"count";i:330;}s:10:"newsletter";a:3:{s:4:"name";s:10:"newsletter";s:4:"slug";s:10:"newsletter";s:5:"count";i:327;}s:4:"code";a:3:{s:4:"name";s:4:"code";s:4:"slug";s:4:"code";s:5:"count";i:325;}s:4:"list";a:3:{s:4:"name";s:4:"list";s:4:"slug";s:4:"list";s:5:"count";i:320;}s:4:"meta";a:3:{s:4:"name";s:4:"meta";s:4:"slug";s:4:"meta";s:5:"count";i:319;}s:5:"popup";a:3:{s:4:"name";s:5:"popup";s:4:"slug";s:5:"popup";s:5:"count";i:319;}s:3:"url";a:3:{s:4:"name";s:3:"url";s:4:"slug";s:3:"url";s:5:"count";i:318;}s:9:"marketing";a:3:{s:4:"name";s:9:"marketing";s:4:"slug";s:9:"marketing";s:5:"count";i:301;}s:6:"simple";a:3:{s:4:"name";s:6:"simple";s:4:"slug";s:6:"simple";s:5:"count";i:299;}s:8:"redirect";a:3:{s:4:"name";s:8:"redirect";s:4:"slug";s:8:"redirect";s:5:"count";i:295;}s:4:"chat";a:3:{s:4:"name";s:4:"chat";s:4:"slug";s:4:"chat";s:5:"count";i:294;}s:3:"tag";a:3:{s:4:"name";s:3:"tag";s:4:"slug";s:3:"tag";s:5:"count";i:290;}s:16:"custom-post-type";a:3:{s:4:"name";s:16:"custom post type";s:4:"slug";s:16:"custom-post-type";s:5:"count";i:288;}s:11:"advertising";a:3:{s:4:"name";s:11:"advertising";s:4:"slug";s:11:"advertising";s:5:"count";i:284;}s:15:"payment-gateway";a:3:{s:4:"name";s:15:"payment gateway";s:4:"slug";s:15:"payment-gateway";s:5:"count";i:283;}s:6:"author";a:3:{s:4:"name";s:6:"author";s:4:"slug";s:6:"author";s:5:"count";i:282;}s:7:"adsense";a:3:{s:4:"name";s:7:"adsense";s:4:"slug";s:7:"adsense";s:5:"count";i:280;}s:4:"html";a:3:{s:4:"name";s:4:"html";s:4:"slug";s:4:"html";s:5:"count";i:280;}s:5:"forms";a:3:{s:4:"name";s:5:"forms";s:4:"slug";s:5:"forms";s:5:"count";i:277;}s:8:"lightbox";a:3:{s:4:"name";s:8:"lightbox";s:4:"slug";s:8:"lightbox";s:5:"count";i:275;}s:7:"tinymce";a:3:{s:4:"name";s:7:"tinyMCE";s:4:"slug";s:7:"tinymce";s:5:"count";i:269;}s:7:"captcha";a:3:{s:4:"name";s:7:"captcha";s:4:"slug";s:7:"captcha";s:5:"count";i:268;}s:8:"tracking";a:3:{s:4:"name";s:8:"tracking";s:4:"slug";s:8:"tracking";s:5:"count";i:266;}s:12:"notification";a:3:{s:4:"name";s:12:"notification";s:4:"slug";s:12:"notification";s:5:"count";i:266;}}', 'no'),
(136, '_site_transient_update_plugins', 'O:8:"stdClass":5:{s:12:"last_checked";i:1507545832;s:7:"checked";a:3:{s:19:"akismet/akismet.php";s:5:"3.3.3";s:9:"hello.php";s:3:"1.6";s:35:"shiftcontroller/shiftcontroller.php";s:5:"3.2.4";}s:8:"response";a:1:{s:19:"akismet/akismet.php";O:8:"stdClass":8:{s:2:"id";s:21:"w.org/plugins/akismet";s:4:"slug";s:7:"akismet";s:6:"plugin";s:19:"akismet/akismet.php";s:11:"new_version";s:5:"3.3.4";s:3:"url";s:38:"https://wordpress.org/plugins/akismet/";s:7:"package";s:56:"https://downloads.wordpress.org/plugin/akismet.3.3.4.zip";s:6:"tested";s:5:"4.8.1";s:13:"compatibility";O:8:"stdClass":0:{}}}s:12:"translations";a:0:{}s:9:"no_update";a:2:{s:9:"hello.php";O:8:"stdClass":6:{s:2:"id";s:25:"w.org/plugins/hello-dolly";s:4:"slug";s:11:"hello-dolly";s:6:"plugin";s:9:"hello.php";s:11:"new_version";s:3:"1.6";s:3:"url";s:42:"https://wordpress.org/plugins/hello-dolly/";s:7:"package";s:58:"https://downloads.wordpress.org/plugin/hello-dolly.1.6.zip";}s:35:"shiftcontroller/shiftcontroller.php";O:8:"stdClass":6:{s:2:"id";s:29:"w.org/plugins/shiftcontroller";s:4:"slug";s:15:"shiftcontroller";s:6:"plugin";s:35:"shiftcontroller/shiftcontroller.php";s:11:"new_version";s:5:"3.2.4";s:3:"url";s:46:"https://wordpress.org/plugins/shiftcontroller/";s:7:"package";s:58:"https://downloads.wordpress.org/plugin/shiftcontroller.zip";}}}', 'no'),
(137, 'recently_activated', 'a:0:{}', 'yes'),
(138, '_transient_timeout_plugin_slugs', '1507632234', 'no'),
(139, '_transient_plugin_slugs', 'a:3:{i:0;s:19:"akismet/akismet.php";i:1;s:9:"hello.php";i:2;s:35:"shiftcontroller/shiftcontroller.php";}', 'no'),
(141, '_transient_is_multi_author', '0', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `wp_postmeta`
--

CREATE TABLE `wp_postmeta` (
  `meta_id` bigint(20) UNSIGNED NOT NULL,
  `post_id` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `meta_key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_value` longtext COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wp_postmeta`
--

INSERT INTO `wp_postmeta` (`meta_id`, `post_id`, `meta_key`, `meta_value`) VALUES
(1, 2, '_wp_page_template', 'default'),
(2, 4, '_wp_attached_file', '2017/10/espresso.jpg'),
(3, 4, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:2000;s:6:"height";i:1200;s:4:"file";s:20:"2017/10/espresso.jpg";s:5:"sizes";a:5:{s:9:"thumbnail";a:4:{s:4:"file";s:20:"espresso-150x150.jpg";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:10:"image/jpeg";}s:6:"medium";a:4:{s:4:"file";s:20:"espresso-300x180.jpg";s:5:"width";i:300;s:6:"height";i:180;s:9:"mime-type";s:10:"image/jpeg";}s:12:"medium_large";a:4:{s:4:"file";s:20:"espresso-768x461.jpg";s:5:"width";i:768;s:6:"height";i:461;s:9:"mime-type";s:10:"image/jpeg";}s:5:"large";a:4:{s:4:"file";s:21:"espresso-1024x614.jpg";s:5:"width";i:1024;s:6:"height";i:614;s:9:"mime-type";s:10:"image/jpeg";}s:32:"twentyseventeen-thumbnail-avatar";a:4:{s:4:"file";s:20:"espresso-100x100.jpg";s:5:"width";i:100;s:6:"height";i:100;s:9:"mime-type";s:10:"image/jpeg";}}s:10:"image_meta";a:12:{s:8:"aperture";s:1:"0";s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";s:1:"0";s:9:"copyright";s:0:"";s:12:"focal_length";s:1:"0";s:3:"iso";s:1:"0";s:13:"shutter_speed";s:1:"0";s:5:"title";s:0:"";s:11:"orientation";s:1:"0";s:8:"keywords";a:0:{}}}'),
(4, 4, '_starter_content_theme', 'twentyseventeen'),
(6, 5, '_wp_attached_file', '2017/10/sandwich.jpg'),
(7, 5, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:2000;s:6:"height";i:1200;s:4:"file";s:20:"2017/10/sandwich.jpg";s:5:"sizes";a:5:{s:9:"thumbnail";a:4:{s:4:"file";s:20:"sandwich-150x150.jpg";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:10:"image/jpeg";}s:6:"medium";a:4:{s:4:"file";s:20:"sandwich-300x180.jpg";s:5:"width";i:300;s:6:"height";i:180;s:9:"mime-type";s:10:"image/jpeg";}s:12:"medium_large";a:4:{s:4:"file";s:20:"sandwich-768x461.jpg";s:5:"width";i:768;s:6:"height";i:461;s:9:"mime-type";s:10:"image/jpeg";}s:5:"large";a:4:{s:4:"file";s:21:"sandwich-1024x614.jpg";s:5:"width";i:1024;s:6:"height";i:614;s:9:"mime-type";s:10:"image/jpeg";}s:32:"twentyseventeen-thumbnail-avatar";a:4:{s:4:"file";s:20:"sandwich-100x100.jpg";s:5:"width";i:100;s:6:"height";i:100;s:9:"mime-type";s:10:"image/jpeg";}}s:10:"image_meta";a:12:{s:8:"aperture";s:1:"0";s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";s:1:"0";s:9:"copyright";s:0:"";s:12:"focal_length";s:1:"0";s:3:"iso";s:1:"0";s:13:"shutter_speed";s:1:"0";s:5:"title";s:0:"";s:11:"orientation";s:1:"0";s:8:"keywords";a:0:{}}}'),
(8, 5, '_starter_content_theme', 'twentyseventeen'),
(10, 6, '_wp_attached_file', '2017/10/coffee.jpg'),
(11, 6, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:2000;s:6:"height";i:1200;s:4:"file";s:18:"2017/10/coffee.jpg";s:5:"sizes";a:5:{s:9:"thumbnail";a:4:{s:4:"file";s:18:"coffee-150x150.jpg";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:10:"image/jpeg";}s:6:"medium";a:4:{s:4:"file";s:18:"coffee-300x180.jpg";s:5:"width";i:300;s:6:"height";i:180;s:9:"mime-type";s:10:"image/jpeg";}s:12:"medium_large";a:4:{s:4:"file";s:18:"coffee-768x461.jpg";s:5:"width";i:768;s:6:"height";i:461;s:9:"mime-type";s:10:"image/jpeg";}s:5:"large";a:4:{s:4:"file";s:19:"coffee-1024x614.jpg";s:5:"width";i:1024;s:6:"height";i:614;s:9:"mime-type";s:10:"image/jpeg";}s:32:"twentyseventeen-thumbnail-avatar";a:4:{s:4:"file";s:18:"coffee-100x100.jpg";s:5:"width";i:100;s:6:"height";i:100;s:9:"mime-type";s:10:"image/jpeg";}}s:10:"image_meta";a:12:{s:8:"aperture";s:1:"0";s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";s:1:"0";s:9:"copyright";s:0:"";s:12:"focal_length";s:1:"0";s:3:"iso";s:1:"0";s:13:"shutter_speed";s:1:"0";s:5:"title";s:0:"";s:11:"orientation";s:1:"0";s:8:"keywords";a:0:{}}}'),
(12, 6, '_starter_content_theme', 'twentyseventeen'),
(15, 8, '_thumbnail_id', '5'),
(17, 9, '_thumbnail_id', '4'),
(19, 10, '_thumbnail_id', '6'),
(21, 11, '_thumbnail_id', '4'),
(23, 18, '_menu_item_type', 'custom'),
(24, 18, '_menu_item_menu_item_parent', '0'),
(25, 18, '_menu_item_object_id', '18'),
(26, 18, '_menu_item_object', 'custom'),
(27, 18, '_menu_item_target', ''),
(28, 18, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(29, 18, '_menu_item_xfn', ''),
(30, 18, '_menu_item_url', 'http://localhost/wordpress/'),
(31, 19, '_menu_item_type', 'post_type'),
(32, 19, '_menu_item_menu_item_parent', '0'),
(33, 19, '_menu_item_object_id', '8'),
(34, 19, '_menu_item_object', 'page'),
(35, 19, '_menu_item_target', ''),
(36, 19, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(37, 19, '_menu_item_xfn', ''),
(38, 19, '_menu_item_url', ''),
(39, 20, '_menu_item_type', 'post_type'),
(40, 20, '_menu_item_menu_item_parent', '0'),
(41, 20, '_menu_item_object_id', '10'),
(42, 20, '_menu_item_object', 'page'),
(43, 20, '_menu_item_target', ''),
(44, 20, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(45, 20, '_menu_item_xfn', ''),
(46, 20, '_menu_item_url', ''),
(47, 21, '_menu_item_type', 'post_type'),
(48, 21, '_menu_item_menu_item_parent', '0'),
(49, 21, '_menu_item_object_id', '9'),
(50, 21, '_menu_item_object', 'page'),
(51, 21, '_menu_item_target', ''),
(52, 21, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(53, 21, '_menu_item_xfn', ''),
(54, 21, '_menu_item_url', ''),
(55, 22, '_menu_item_type', 'custom'),
(56, 22, '_menu_item_menu_item_parent', '0'),
(57, 22, '_menu_item_object_id', '22'),
(58, 22, '_menu_item_object', 'custom'),
(59, 22, '_menu_item_target', ''),
(60, 22, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(61, 22, '_menu_item_xfn', ''),
(62, 22, '_menu_item_url', 'https://www.yelp.com'),
(63, 23, '_menu_item_type', 'custom'),
(64, 23, '_menu_item_menu_item_parent', '0'),
(65, 23, '_menu_item_object_id', '23'),
(66, 23, '_menu_item_object', 'custom'),
(67, 23, '_menu_item_target', ''),
(68, 23, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(69, 23, '_menu_item_xfn', ''),
(70, 23, '_menu_item_url', 'https://www.facebook.com/wordpress'),
(71, 24, '_menu_item_type', 'custom'),
(72, 24, '_menu_item_menu_item_parent', '0'),
(73, 24, '_menu_item_object_id', '24'),
(74, 24, '_menu_item_object', 'custom'),
(75, 24, '_menu_item_target', ''),
(76, 24, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(77, 24, '_menu_item_xfn', ''),
(78, 24, '_menu_item_url', 'https://twitter.com/wordpress'),
(79, 25, '_menu_item_type', 'custom'),
(80, 25, '_menu_item_menu_item_parent', '0'),
(81, 25, '_menu_item_object_id', '25'),
(82, 25, '_menu_item_object', 'custom'),
(83, 25, '_menu_item_target', ''),
(84, 25, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(85, 25, '_menu_item_xfn', ''),
(86, 25, '_menu_item_url', 'https://www.instagram.com/explore/tags/wordcamp/'),
(87, 26, '_menu_item_type', 'custom'),
(88, 26, '_menu_item_menu_item_parent', '0'),
(89, 26, '_menu_item_object_id', '26'),
(90, 26, '_menu_item_object', 'custom'),
(91, 26, '_menu_item_target', ''),
(92, 26, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(93, 26, '_menu_item_xfn', ''),
(94, 26, '_menu_item_url', 'mailto:wordpress@example.com'),
(95, 12, '_wp_trash_meta_status', 'publish'),
(96, 12, '_wp_trash_meta_time', '1507545542'),
(97, 27, '_edit_last', '1'),
(98, 27, '_edit_lock', '1507546016:1');

-- --------------------------------------------------------

--
-- Table structure for table `wp_posts`
--

CREATE TABLE `wp_posts` (
  `ID` bigint(20) UNSIGNED NOT NULL,
  `post_author` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `post_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_date_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_excerpt` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'publish',
  `comment_status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'open',
  `ping_status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'open',
  `post_password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `post_name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `to_ping` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `pinged` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_modified_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_content_filtered` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_parent` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `guid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `menu_order` int(11) NOT NULL DEFAULT '0',
  `post_type` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'post',
  `post_mime_type` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `comment_count` bigint(20) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wp_posts`
--

INSERT INTO `wp_posts` (`ID`, `post_author`, `post_date`, `post_date_gmt`, `post_content`, `post_title`, `post_excerpt`, `post_status`, `comment_status`, `ping_status`, `post_password`, `post_name`, `to_ping`, `pinged`, `post_modified`, `post_modified_gmt`, `post_content_filtered`, `post_parent`, `guid`, `menu_order`, `post_type`, `post_mime_type`, `comment_count`) VALUES
(1, 1, '2017-10-09 09:59:39', '2017-10-09 09:59:39', 'Welcome to WordPress. This is your first post. Edit or delete it, then start writing!', 'Hello world!', '', 'publish', 'open', 'open', '', 'hello-world', '', '', '2017-10-09 09:59:39', '2017-10-09 09:59:39', '', 0, 'http://localhost/wordpress/?p=1', 0, 'post', '', 1),
(2, 1, '2017-10-09 09:59:39', '2017-10-09 09:59:39', 'This is an example page. It''s different from a blog post because it will stay in one place and will show up in your site navigation (in most themes). Most people start with an About page that introduces them to potential site visitors. It might say something like this:\n\n<blockquote>Hi there! I''m a bike messenger by day, aspiring actor by night, and this is my website. I live in Los Angeles, have a great dog named Jack, and I like pi&#241;a coladas. (And gettin'' caught in the rain.)</blockquote>\n\n...or something like this:\n\n<blockquote>The XYZ Doohickey Company was founded in 1971, and has been providing quality doohickeys to the public ever since. Located in Gotham City, XYZ employs over 2,000 people and does all kinds of awesome things for the Gotham community.</blockquote>\n\nAs a new WordPress user, you should go to <a href="http://localhost/wordpress/wp-admin/">your dashboard</a> to delete this page and create new pages for your content. Have fun!', 'Sample Page', '', 'publish', 'closed', 'open', '', 'sample-page', '', '', '2017-10-09 09:59:39', '2017-10-09 09:59:39', '', 0, 'http://localhost/wordpress/?page_id=2', 0, 'page', '', 0),
(3, 1, '2017-10-09 10:30:22', '0000-00-00 00:00:00', '', 'Auto Draft', '', 'auto-draft', 'open', 'open', '', '', '', '', '2017-10-09 10:30:22', '0000-00-00 00:00:00', '', 0, 'http://localhost/wordpress/?p=3', 0, 'post', '', 0),
(4, 1, '2017-10-09 10:38:42', '2017-10-09 10:38:42', '', 'Espresso', '', 'inherit', 'open', 'closed', '', 'espresso', '', '', '2017-10-09 10:38:42', '2017-10-09 10:38:42', '', 0, 'http://localhost/wordpress/wp-content/uploads/2017/10/espresso.jpg', 0, 'attachment', 'image/jpeg', 0),
(5, 1, '2017-10-09 10:38:43', '2017-10-09 10:38:43', '', 'Sandwich', '', 'inherit', 'open', 'closed', '', 'sandwich', '', '', '2017-10-09 10:38:43', '2017-10-09 10:38:43', '', 0, 'http://localhost/wordpress/wp-content/uploads/2017/10/sandwich.jpg', 0, 'attachment', 'image/jpeg', 0),
(6, 1, '2017-10-09 10:38:43', '2017-10-09 10:38:43', '', 'Coffee', '', 'inherit', 'open', 'closed', '', 'coffee', '', '', '2017-10-09 10:38:43', '2017-10-09 10:38:43', '', 0, 'http://localhost/wordpress/wp-content/uploads/2017/10/coffee.jpg', 0, 'attachment', 'image/jpeg', 0),
(7, 1, '2017-10-09 10:38:43', '2017-10-09 10:38:43', 'Welcome to your site! This is your homepage, which is what most visitors will see when they come to your site for the first time.', 'Home', '', 'publish', 'closed', 'closed', '', 'home', '', '', '2017-10-09 10:38:43', '2017-10-09 10:38:43', '', 0, 'http://localhost/wordpress/?page_id=7', 0, 'page', '', 0),
(8, 1, '2017-10-09 10:38:44', '2017-10-09 10:38:44', 'You might be an artist who would like to introduce yourself and your work here or maybe you&rsquo;re a business with a mission to describe.', 'About', '', 'publish', 'closed', 'closed', '', 'about', '', '', '2017-10-09 10:38:44', '2017-10-09 10:38:44', '', 0, 'http://localhost/wordpress/?page_id=8', 0, 'page', '', 0),
(9, 1, '2017-10-09 10:38:45', '2017-10-09 10:38:45', 'This is a page with some basic contact information, such as an address and phone number. You might also try a plugin to add a contact form.', 'Contact', '', 'publish', 'closed', 'closed', '', 'contact', '', '', '2017-10-09 10:38:45', '2017-10-09 10:38:45', '', 0, 'http://localhost/wordpress/?page_id=9', 0, 'page', '', 0),
(10, 1, '2017-10-09 10:38:45', '2017-10-09 10:38:45', '', 'Blog', '', 'publish', 'closed', 'closed', '', 'blog', '', '', '2017-10-09 10:38:45', '2017-10-09 10:38:45', '', 0, 'http://localhost/wordpress/?page_id=10', 0, 'page', '', 0),
(11, 1, '2017-10-09 10:38:45', '2017-10-09 10:38:45', 'This is an example of a homepage section. Homepage sections can be any page other than the homepage itself, including the page that shows your latest blog posts.', 'A homepage section', '', 'publish', 'closed', 'closed', '', 'a-homepage-section', '', '', '2017-10-09 10:38:45', '2017-10-09 10:38:45', '', 0, 'http://localhost/wordpress/?page_id=11', 0, 'page', '', 0),
(12, 1, '2017-10-09 10:38:42', '2017-10-09 10:38:42', '{\n    "widget_text[2]": {\n        "starter_content": true,\n        "value": {\n            "encoded_serialized_instance": "YTo0OntzOjU6InRpdGxlIjtzOjc6IkZpbmQgVXMiO3M6NDoidGV4dCI7czoxNjg6IjxzdHJvbmc+QWRkcmVzczwvc3Ryb25nPgoxMjMgTWFpbiBTdHJlZXQKTmV3IFlvcmssIE5ZIDEwMDAxCgo8c3Ryb25nPkhvdXJzPC9zdHJvbmc+Ck1vbmRheSZtZGFzaDtGcmlkYXk6IDk6MDBBTSZuZGFzaDs1OjAwUE0KU2F0dXJkYXkgJmFtcDsgU3VuZGF5OiAxMTowMEFNJm5kYXNoOzM6MDBQTSI7czo2OiJmaWx0ZXIiO2I6MTtzOjY6InZpc3VhbCI7YjoxO30=",\n            "title": "Find Us",\n            "is_widget_customizer_js_value": true,\n            "instance_hash_key": "7e949eb79e3be5b9f147af2911225891"\n        },\n        "type": "option",\n        "user_id": 1\n    },\n    "widget_search[3]": {\n        "starter_content": true,\n        "value": {\n            "encoded_serialized_instance": "YToxOntzOjU6InRpdGxlIjtzOjY6IlNlYXJjaCI7fQ==",\n            "title": "Search",\n            "is_widget_customizer_js_value": true,\n            "instance_hash_key": "db395575418339e83a572bdeccb0a35e"\n        },\n        "type": "option",\n        "user_id": 1\n    },\n    "widget_text[3]": {\n        "starter_content": true,\n        "value": {\n            "encoded_serialized_instance": "YTo0OntzOjU6InRpdGxlIjtzOjE1OiJBYm91dCBUaGlzIFNpdGUiO3M6NDoidGV4dCI7czo4NToiVGhpcyBtYXkgYmUgYSBnb29kIHBsYWNlIHRvIGludHJvZHVjZSB5b3Vyc2VsZiBhbmQgeW91ciBzaXRlIG9yIGluY2x1ZGUgc29tZSBjcmVkaXRzLiI7czo2OiJmaWx0ZXIiO2I6MTtzOjY6InZpc3VhbCI7YjoxO30=",\n            "title": "About This Site",\n            "is_widget_customizer_js_value": true,\n            "instance_hash_key": "0df6f0c278c75d433e329d624cbcfd10"\n        },\n        "type": "option",\n        "user_id": 1\n    },\n    "sidebars_widgets[sidebar-1]": {\n        "starter_content": true,\n        "value": [\n            "text-2",\n            "search-3",\n            "text-3"\n        ],\n        "type": "option",\n        "user_id": 1\n    },\n    "widget_text[4]": {\n        "starter_content": true,\n        "value": {\n            "encoded_serialized_instance": "YTo0OntzOjU6InRpdGxlIjtzOjc6IkZpbmQgVXMiO3M6NDoidGV4dCI7czoxNjg6IjxzdHJvbmc+QWRkcmVzczwvc3Ryb25nPgoxMjMgTWFpbiBTdHJlZXQKTmV3IFlvcmssIE5ZIDEwMDAxCgo8c3Ryb25nPkhvdXJzPC9zdHJvbmc+Ck1vbmRheSZtZGFzaDtGcmlkYXk6IDk6MDBBTSZuZGFzaDs1OjAwUE0KU2F0dXJkYXkgJmFtcDsgU3VuZGF5OiAxMTowMEFNJm5kYXNoOzM6MDBQTSI7czo2OiJmaWx0ZXIiO2I6MTtzOjY6InZpc3VhbCI7YjoxO30=",\n            "title": "Find Us",\n            "is_widget_customizer_js_value": true,\n            "instance_hash_key": "7e949eb79e3be5b9f147af2911225891"\n        },\n        "type": "option",\n        "user_id": 1\n    },\n    "sidebars_widgets[sidebar-2]": {\n        "starter_content": true,\n        "value": [\n            "text-4"\n        ],\n        "type": "option",\n        "user_id": 1\n    },\n    "widget_text[5]": {\n        "starter_content": true,\n        "value": {\n            "encoded_serialized_instance": "YTo0OntzOjU6InRpdGxlIjtzOjE1OiJBYm91dCBUaGlzIFNpdGUiO3M6NDoidGV4dCI7czo4NToiVGhpcyBtYXkgYmUgYSBnb29kIHBsYWNlIHRvIGludHJvZHVjZSB5b3Vyc2VsZiBhbmQgeW91ciBzaXRlIG9yIGluY2x1ZGUgc29tZSBjcmVkaXRzLiI7czo2OiJmaWx0ZXIiO2I6MTtzOjY6InZpc3VhbCI7YjoxO30=",\n            "title": "About This Site",\n            "is_widget_customizer_js_value": true,\n            "instance_hash_key": "0df6f0c278c75d433e329d624cbcfd10"\n        },\n        "type": "option",\n        "user_id": 1\n    },\n    "widget_search[4]": {\n        "starter_content": true,\n        "value": {\n            "encoded_serialized_instance": "YToxOntzOjU6InRpdGxlIjtzOjY6IlNlYXJjaCI7fQ==",\n            "title": "Search",\n            "is_widget_customizer_js_value": true,\n            "instance_hash_key": "db395575418339e83a572bdeccb0a35e"\n        },\n        "type": "option",\n        "user_id": 1\n    },\n    "sidebars_widgets[sidebar-3]": {\n        "starter_content": true,\n        "value": [\n            "text-5",\n            "search-4"\n        ],\n        "type": "option",\n        "user_id": 1\n    },\n    "nav_menus_created_posts": {\n        "starter_content": true,\n        "value": [\n            4,\n            5,\n            6,\n            7,\n            8,\n            9,\n            10,\n            11\n        ],\n        "type": "option",\n        "user_id": 1\n    },\n    "nav_menu[-1]": {\n        "value": {\n            "name": "Top Menu",\n            "description": "",\n            "parent": 0,\n            "auto_add": false\n        },\n        "type": "nav_menu",\n        "user_id": 1\n    },\n    "nav_menu_item[-1]": {\n        "value": {\n            "object_id": 0,\n            "object": "",\n            "menu_item_parent": 0,\n            "position": 0,\n            "type": "custom",\n            "title": "Home",\n            "url": "http://localhost/wordpress/",\n            "target": "",\n            "attr_title": "",\n            "description": "",\n            "classes": "",\n            "xfn": "",\n            "status": "publish",\n            "original_title": "",\n            "nav_menu_term_id": -1,\n            "_invalid": false,\n            "type_label": "Custom Link"\n        },\n        "type": "nav_menu_item",\n        "user_id": 1\n    },\n    "nav_menu_item[-2]": {\n        "value": {\n            "object_id": 8,\n            "object": "page",\n            "menu_item_parent": 0,\n            "position": 1,\n            "type": "post_type",\n            "title": "About",\n            "url": "",\n            "target": "",\n            "attr_title": "",\n            "description": "",\n            "classes": "",\n            "xfn": "",\n            "status": "publish",\n            "original_title": "About",\n            "nav_menu_term_id": -1,\n            "_invalid": false,\n            "type_label": "Page"\n        },\n        "type": "nav_menu_item",\n        "user_id": 1\n    },\n    "nav_menu_item[-3]": {\n        "value": {\n            "object_id": 10,\n            "object": "page",\n            "menu_item_parent": 0,\n            "position": 2,\n            "type": "post_type",\n            "title": "Blog",\n            "url": "",\n            "target": "",\n            "attr_title": "",\n            "description": "",\n            "classes": "",\n            "xfn": "",\n            "status": "publish",\n            "original_title": "Blog",\n            "nav_menu_term_id": -1,\n            "_invalid": false,\n            "type_label": "Page"\n        },\n        "type": "nav_menu_item",\n        "user_id": 1\n    },\n    "nav_menu_item[-4]": {\n        "value": {\n            "object_id": 9,\n            "object": "page",\n            "menu_item_parent": 0,\n            "position": 3,\n            "type": "post_type",\n            "title": "Contact",\n            "url": "",\n            "target": "",\n            "attr_title": "",\n            "description": "",\n            "classes": "",\n            "xfn": "",\n            "status": "publish",\n            "original_title": "Contact",\n            "nav_menu_term_id": -1,\n            "_invalid": false,\n            "type_label": "Page"\n        },\n        "type": "nav_menu_item",\n        "user_id": 1\n    },\n    "twentyseventeen::nav_menu_locations[top]": {\n        "starter_content": true,\n        "value": -1,\n        "type": "theme_mod",\n        "user_id": 1\n    },\n    "nav_menu[-5]": {\n        "value": {\n            "name": "Social Links Menu",\n            "description": "",\n            "parent": 0,\n            "auto_add": false\n        },\n        "type": "nav_menu",\n        "user_id": 1\n    },\n    "nav_menu_item[-5]": {\n        "value": {\n            "object_id": 0,\n            "object": "",\n            "menu_item_parent": 0,\n            "position": 0,\n            "type": "custom",\n            "title": "Yelp",\n            "url": "https://www.yelp.com",\n            "target": "",\n            "attr_title": "",\n            "description": "",\n            "classes": "",\n            "xfn": "",\n            "status": "publish",\n            "original_title": "",\n            "nav_menu_term_id": -5,\n            "_invalid": false,\n            "type_label": "Custom Link"\n        },\n        "type": "nav_menu_item",\n        "user_id": 1\n    },\n    "nav_menu_item[-6]": {\n        "value": {\n            "object_id": 0,\n            "object": "",\n            "menu_item_parent": 0,\n            "position": 1,\n            "type": "custom",\n            "title": "Facebook",\n            "url": "https://www.facebook.com/wordpress",\n            "target": "",\n            "attr_title": "",\n            "description": "",\n            "classes": "",\n            "xfn": "",\n            "status": "publish",\n            "original_title": "",\n            "nav_menu_term_id": -5,\n            "_invalid": false,\n            "type_label": "Custom Link"\n        },\n        "type": "nav_menu_item",\n        "user_id": 1\n    },\n    "nav_menu_item[-7]": {\n        "value": {\n            "object_id": 0,\n            "object": "",\n            "menu_item_parent": 0,\n            "position": 2,\n            "type": "custom",\n            "title": "Twitter",\n            "url": "https://twitter.com/wordpress",\n            "target": "",\n            "attr_title": "",\n            "description": "",\n            "classes": "",\n            "xfn": "",\n            "status": "publish",\n            "original_title": "",\n            "nav_menu_term_id": -5,\n            "_invalid": false,\n            "type_label": "Custom Link"\n        },\n        "type": "nav_menu_item",\n        "user_id": 1\n    },\n    "nav_menu_item[-8]": {\n        "value": {\n            "object_id": 0,\n            "object": "",\n            "menu_item_parent": 0,\n            "position": 3,\n            "type": "custom",\n            "title": "Instagram",\n            "url": "https://www.instagram.com/explore/tags/wordcamp/",\n            "target": "",\n            "attr_title": "",\n            "description": "",\n            "classes": "",\n            "xfn": "",\n            "status": "publish",\n            "original_title": "",\n            "nav_menu_term_id": -5,\n            "_invalid": false,\n            "type_label": "Custom Link"\n        },\n        "type": "nav_menu_item",\n        "user_id": 1\n    },\n    "nav_menu_item[-9]": {\n        "value": {\n            "object_id": 0,\n            "object": "",\n            "menu_item_parent": 0,\n            "position": 4,\n            "type": "custom",\n            "title": "Email",\n            "url": "mailto:wordpress@example.com",\n            "target": "",\n            "attr_title": "",\n            "description": "",\n            "classes": "",\n            "xfn": "",\n            "status": "publish",\n            "original_title": "",\n            "nav_menu_term_id": -5,\n            "_invalid": false,\n            "type_label": "Custom Link"\n        },\n        "type": "nav_menu_item",\n        "user_id": 1\n    },\n    "twentyseventeen::nav_menu_locations[social]": {\n        "starter_content": true,\n        "value": -5,\n        "type": "theme_mod",\n        "user_id": 1\n    },\n    "show_on_front": {\n        "starter_content": true,\n        "value": "page",\n        "type": "option",\n        "user_id": 1\n    },\n    "page_on_front": {\n        "starter_content": true,\n        "value": 7,\n        "type": "option",\n        "user_id": 1\n    },\n    "page_for_posts": {\n        "starter_content": true,\n        "value": 10,\n        "type": "option",\n        "user_id": 1\n    },\n    "twentyseventeen::panel_1": {\n        "starter_content": true,\n        "value": 11,\n        "type": "theme_mod",\n        "user_id": 1\n    },\n    "twentyseventeen::panel_2": {\n        "starter_content": true,\n        "value": 8,\n        "type": "theme_mod",\n        "user_id": 1\n    },\n    "twentyseventeen::panel_3": {\n        "starter_content": true,\n        "value": 10,\n        "type": "theme_mod",\n        "user_id": 1\n    },\n    "twentyseventeen::panel_4": {\n        "starter_content": true,\n        "value": 9,\n        "type": "theme_mod",\n        "user_id": 1\n    },\n    "blogdescription": {\n        "value": "A time table site for our beloved employees",\n        "type": "option",\n        "user_id": 1\n    }\n}', '', '', 'trash', 'closed', 'closed', '', 'bfce823d-c8c6-43ab-9482-fc9bb2ca8506', '', '', '2017-10-09 10:38:42', '2017-10-09 10:38:42', '', 0, 'http://localhost/wordpress/?p=12', 0, 'customize_changeset', '', 0),
(13, 1, '2017-10-09 10:38:43', '2017-10-09 10:38:43', 'Welcome to your site! This is your homepage, which is what most visitors will see when they come to your site for the first time.', 'Home', '', 'inherit', 'closed', 'closed', '', '7-revision-v1', '', '', '2017-10-09 10:38:43', '2017-10-09 10:38:43', '', 7, 'http://localhost/wordpress/2017/10/09/7-revision-v1/', 0, 'revision', '', 0),
(14, 1, '2017-10-09 10:38:44', '2017-10-09 10:38:44', 'You might be an artist who would like to introduce yourself and your work here or maybe you&rsquo;re a business with a mission to describe.', 'About', '', 'inherit', 'closed', 'closed', '', '8-revision-v1', '', '', '2017-10-09 10:38:44', '2017-10-09 10:38:44', '', 8, 'http://localhost/wordpress/2017/10/09/8-revision-v1/', 0, 'revision', '', 0),
(15, 1, '2017-10-09 10:38:45', '2017-10-09 10:38:45', 'This is a page with some basic contact information, such as an address and phone number. You might also try a plugin to add a contact form.', 'Contact', '', 'inherit', 'closed', 'closed', '', '9-revision-v1', '', '', '2017-10-09 10:38:45', '2017-10-09 10:38:45', '', 9, 'http://localhost/wordpress/2017/10/09/9-revision-v1/', 0, 'revision', '', 0),
(16, 1, '2017-10-09 10:38:45', '2017-10-09 10:38:45', '', 'Blog', '', 'inherit', 'closed', 'closed', '', '10-revision-v1', '', '', '2017-10-09 10:38:45', '2017-10-09 10:38:45', '', 10, 'http://localhost/wordpress/2017/10/09/10-revision-v1/', 0, 'revision', '', 0),
(17, 1, '2017-10-09 10:38:45', '2017-10-09 10:38:45', 'This is an example of a homepage section. Homepage sections can be any page other than the homepage itself, including the page that shows your latest blog posts.', 'A homepage section', '', 'inherit', 'closed', 'closed', '', '11-revision-v1', '', '', '2017-10-09 10:38:45', '2017-10-09 10:38:45', '', 11, 'http://localhost/wordpress/2017/10/09/11-revision-v1/', 0, 'revision', '', 0),
(18, 1, '2017-10-09 10:38:46', '2017-10-09 10:38:46', '', 'Home', '', 'publish', 'closed', 'closed', '', 'home', '', '', '2017-10-09 10:38:46', '2017-10-09 10:38:46', '', 0, 'http://localhost/wordpress/2017/10/09/home/', 0, 'nav_menu_item', '', 0),
(19, 1, '2017-10-09 10:38:48', '2017-10-09 10:38:48', ' ', '', '', 'publish', 'closed', 'closed', '', '19', '', '', '2017-10-09 10:38:48', '2017-10-09 10:38:48', '', 0, 'http://localhost/wordpress/2017/10/09/19/', 1, 'nav_menu_item', '', 0),
(20, 1, '2017-10-09 10:38:49', '2017-10-09 10:38:49', ' ', '', '', 'publish', 'closed', 'closed', '', '20', '', '', '2017-10-09 10:38:49', '2017-10-09 10:38:49', '', 0, 'http://localhost/wordpress/2017/10/09/20/', 2, 'nav_menu_item', '', 0),
(21, 1, '2017-10-09 10:38:51', '2017-10-09 10:38:51', ' ', '', '', 'publish', 'closed', 'closed', '', '21', '', '', '2017-10-09 10:38:51', '2017-10-09 10:38:51', '', 0, 'http://localhost/wordpress/2017/10/09/21/', 3, 'nav_menu_item', '', 0),
(22, 1, '2017-10-09 10:38:57', '2017-10-09 10:38:57', '', 'Yelp', '', 'publish', 'closed', 'closed', '', 'yelp', '', '', '2017-10-09 10:38:57', '2017-10-09 10:38:57', '', 0, 'http://localhost/wordpress/2017/10/09/yelp/', 0, 'nav_menu_item', '', 0),
(23, 1, '2017-10-09 10:38:57', '2017-10-09 10:38:57', '', 'Facebook', '', 'publish', 'closed', 'closed', '', 'facebook', '', '', '2017-10-09 10:38:57', '2017-10-09 10:38:57', '', 0, 'http://localhost/wordpress/2017/10/09/facebook/', 1, 'nav_menu_item', '', 0),
(24, 1, '2017-10-09 10:38:58', '2017-10-09 10:38:58', '', 'Twitter', '', 'publish', 'closed', 'closed', '', 'twitter', '', '', '2017-10-09 10:38:58', '2017-10-09 10:38:58', '', 0, 'http://localhost/wordpress/2017/10/09/twitter/', 2, 'nav_menu_item', '', 0),
(25, 1, '2017-10-09 10:38:59', '2017-10-09 10:38:59', '', 'Instagram', '', 'publish', 'closed', 'closed', '', 'instagram', '', '', '2017-10-09 10:38:59', '2017-10-09 10:38:59', '', 0, 'http://localhost/wordpress/2017/10/09/instagram/', 3, 'nav_menu_item', '', 0),
(26, 1, '2017-10-09 10:39:00', '2017-10-09 10:39:00', '', 'Email', '', 'publish', 'closed', 'closed', '', 'email', '', '', '2017-10-09 10:39:00', '2017-10-09 10:39:00', '', 0, 'http://localhost/wordpress/2017/10/09/email/', 4, 'nav_menu_item', '', 0),
(27, 1, '2017-10-09 10:49:12', '2017-10-09 10:49:12', 'This page is for employees and admin to sign up or log in', 'Login/SignUp', '', 'publish', 'closed', 'closed', '', 'loginsignup', '', '', '2017-10-09 10:49:12', '2017-10-09 10:49:12', '', 0, 'http://localhost/wordpress/?page_id=27', 0, 'page', '', 0),
(28, 1, '2017-10-09 10:49:12', '2017-10-09 10:49:12', 'This page is for employees and admin to sign up or log in', 'Login/SignUp', '', 'inherit', 'closed', 'closed', '', '27-revision-v1', '', '', '2017-10-09 10:49:12', '2017-10-09 10:49:12', '', 27, 'http://localhost/wordpress/2017/10/09/27-revision-v1/', 0, 'revision', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `wp_termmeta`
--

CREATE TABLE `wp_termmeta` (
  `meta_id` bigint(20) UNSIGNED NOT NULL,
  `term_id` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `meta_key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_value` longtext COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wp_terms`
--

CREATE TABLE `wp_terms` (
  `term_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `slug` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `term_group` bigint(10) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wp_terms`
--

INSERT INTO `wp_terms` (`term_id`, `name`, `slug`, `term_group`) VALUES
(1, 'Uncategorized', 'uncategorized', 0),
(2, 'Top Menu', 'top-menu', 0),
(3, 'Social Links Menu', 'social-links-menu', 0);

-- --------------------------------------------------------

--
-- Table structure for table `wp_term_relationships`
--

CREATE TABLE `wp_term_relationships` (
  `object_id` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `term_taxonomy_id` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `term_order` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wp_term_relationships`
--

INSERT INTO `wp_term_relationships` (`object_id`, `term_taxonomy_id`, `term_order`) VALUES
(1, 1, 0),
(18, 2, 0),
(19, 2, 0),
(20, 2, 0),
(21, 2, 0),
(22, 3, 0),
(23, 3, 0),
(24, 3, 0),
(25, 3, 0),
(26, 3, 0);

-- --------------------------------------------------------

--
-- Table structure for table `wp_term_taxonomy`
--

CREATE TABLE `wp_term_taxonomy` (
  `term_taxonomy_id` bigint(20) UNSIGNED NOT NULL,
  `term_id` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `taxonomy` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `count` bigint(20) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wp_term_taxonomy`
--

INSERT INTO `wp_term_taxonomy` (`term_taxonomy_id`, `term_id`, `taxonomy`, `description`, `parent`, `count`) VALUES
(1, 1, 'category', '', 0, 1),
(2, 2, 'nav_menu', '', 0, 4),
(3, 3, 'nav_menu', '', 0, 5);

-- --------------------------------------------------------

--
-- Table structure for table `wp_usermeta`
--

CREATE TABLE `wp_usermeta` (
  `umeta_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `meta_key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_value` longtext COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wp_usermeta`
--

INSERT INTO `wp_usermeta` (`umeta_id`, `user_id`, `meta_key`, `meta_value`) VALUES
(1, 1, 'nickname', 'munchkin'),
(2, 1, 'first_name', ''),
(3, 1, 'last_name', ''),
(4, 1, 'description', ''),
(5, 1, 'rich_editing', 'true'),
(6, 1, 'comment_shortcuts', 'false'),
(7, 1, 'admin_color', 'fresh'),
(8, 1, 'use_ssl', '0'),
(9, 1, 'show_admin_bar_front', 'true'),
(10, 1, 'locale', ''),
(11, 1, 'wp_capabilities', 'a:1:{s:13:"administrator";b:1;}'),
(12, 1, 'wp_user_level', '10'),
(13, 1, 'dismissed_wp_pointers', ''),
(14, 1, 'show_welcome_panel', '1'),
(15, 1, 'session_tokens', 'a:1:{s:64:"081b0b6c448590180a88f6c8e7c1d221e33069d0219013358f692678d7857d28";a:4:{s:10:"expiration";i:1508754620;s:2:"ip";s:3:"::1";s:2:"ua";s:115:"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36";s:5:"login";i:1507545020;}}'),
(16, 1, 'wp_dashboard_quick_press_last_post_id', '3');

-- --------------------------------------------------------

--
-- Table structure for table `wp_users`
--

CREATE TABLE `wp_users` (
  `ID` bigint(20) UNSIGNED NOT NULL,
  `user_login` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `user_pass` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `user_nicename` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `user_email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `user_url` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `user_registered` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `user_activation_key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `user_status` int(11) NOT NULL DEFAULT '0',
  `display_name` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wp_users`
--

INSERT INTO `wp_users` (`ID`, `user_login`, `user_pass`, `user_nicename`, `user_email`, `user_url`, `user_registered`, `user_activation_key`, `user_status`, `display_name`) VALUES
(1, 'munchkin', '$P$Be0VZcbncMpmsiIc48JcNTbNPUpyeS.', 'munchkin', 'dalmiet@gmail.com', '', '2017-10-09 09:59:37', '', 0, 'munchkin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `timetable`
--
ALTER TABLE `timetable`
  ADD KEY `fk_timetable` (`userID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userID`);

--
-- Indexes for table `userschedule`
--
ALTER TABLE `userschedule`
  ADD KEY `fk_userSchedule` (`userID`);

--
-- Indexes for table `wp_commentmeta`
--
ALTER TABLE `wp_commentmeta`
  ADD PRIMARY KEY (`meta_id`),
  ADD KEY `comment_id` (`comment_id`),
  ADD KEY `meta_key` (`meta_key`(191));

--
-- Indexes for table `wp_comments`
--
ALTER TABLE `wp_comments`
  ADD PRIMARY KEY (`comment_ID`),
  ADD KEY `comment_post_ID` (`comment_post_ID`),
  ADD KEY `comment_approved_date_gmt` (`comment_approved`,`comment_date_gmt`),
  ADD KEY `comment_date_gmt` (`comment_date_gmt`),
  ADD KEY `comment_parent` (`comment_parent`),
  ADD KEY `comment_author_email` (`comment_author_email`(10));

--
-- Indexes for table `wp_links`
--
ALTER TABLE `wp_links`
  ADD PRIMARY KEY (`link_id`),
  ADD KEY `link_visible` (`link_visible`);

--
-- Indexes for table `wp_options`
--
ALTER TABLE `wp_options`
  ADD PRIMARY KEY (`option_id`),
  ADD UNIQUE KEY `option_name` (`option_name`);

--
-- Indexes for table `wp_postmeta`
--
ALTER TABLE `wp_postmeta`
  ADD PRIMARY KEY (`meta_id`),
  ADD KEY `post_id` (`post_id`),
  ADD KEY `meta_key` (`meta_key`(191));

--
-- Indexes for table `wp_posts`
--
ALTER TABLE `wp_posts`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `post_name` (`post_name`(191)),
  ADD KEY `type_status_date` (`post_type`,`post_status`,`post_date`,`ID`),
  ADD KEY `post_parent` (`post_parent`),
  ADD KEY `post_author` (`post_author`);

--
-- Indexes for table `wp_termmeta`
--
ALTER TABLE `wp_termmeta`
  ADD PRIMARY KEY (`meta_id`),
  ADD KEY `term_id` (`term_id`),
  ADD KEY `meta_key` (`meta_key`(191));

--
-- Indexes for table `wp_terms`
--
ALTER TABLE `wp_terms`
  ADD PRIMARY KEY (`term_id`),
  ADD KEY `slug` (`slug`(191)),
  ADD KEY `name` (`name`(191));

--
-- Indexes for table `wp_term_relationships`
--
ALTER TABLE `wp_term_relationships`
  ADD PRIMARY KEY (`object_id`,`term_taxonomy_id`),
  ADD KEY `term_taxonomy_id` (`term_taxonomy_id`);

--
-- Indexes for table `wp_term_taxonomy`
--
ALTER TABLE `wp_term_taxonomy`
  ADD PRIMARY KEY (`term_taxonomy_id`),
  ADD UNIQUE KEY `term_id_taxonomy` (`term_id`,`taxonomy`),
  ADD KEY `taxonomy` (`taxonomy`);

--
-- Indexes for table `wp_usermeta`
--
ALTER TABLE `wp_usermeta`
  ADD PRIMARY KEY (`umeta_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `meta_key` (`meta_key`(191));

--
-- Indexes for table `wp_users`
--
ALTER TABLE `wp_users`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `user_login_key` (`user_login`),
  ADD KEY `user_nicename` (`user_nicename`),
  ADD KEY `user_email` (`user_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `wp_commentmeta`
--
ALTER TABLE `wp_commentmeta`
  MODIFY `meta_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `wp_comments`
--
ALTER TABLE `wp_comments`
  MODIFY `comment_ID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `wp_links`
--
ALTER TABLE `wp_links`
  MODIFY `link_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `wp_options`
--
ALTER TABLE `wp_options`
  MODIFY `option_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=142;
--
-- AUTO_INCREMENT for table `wp_postmeta`
--
ALTER TABLE `wp_postmeta`
  MODIFY `meta_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;
--
-- AUTO_INCREMENT for table `wp_posts`
--
ALTER TABLE `wp_posts`
  MODIFY `ID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `wp_termmeta`
--
ALTER TABLE `wp_termmeta`
  MODIFY `meta_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `wp_terms`
--
ALTER TABLE `wp_terms`
  MODIFY `term_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `wp_term_taxonomy`
--
ALTER TABLE `wp_term_taxonomy`
  MODIFY `term_taxonomy_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `wp_usermeta`
--
ALTER TABLE `wp_usermeta`
  MODIFY `umeta_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `wp_users`
--
ALTER TABLE `wp_users`
  MODIFY `ID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `timetable`
--
ALTER TABLE `timetable`
  ADD CONSTRAINT `fk_timetable` FOREIGN KEY (`userID`) REFERENCES `user` (`userID`);

--
-- Constraints for table `userschedule`
--
ALTER TABLE `userschedule`
  ADD CONSTRAINT `fk_userSchedule` FOREIGN KEY (`userID`) REFERENCES `user` (`userID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
