-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 03, 2018 at 10:45 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hobby_app`
--

-- --------------------------------------------------------

--
-- Table structure for table `archive-images`
--

CREATE TABLE `archive-images` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `attachment_id` int(11) NOT NULL,
  `caption` text NOT NULL,
  `description` longtext NOT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `created` tinyint(4) NOT NULL,
  `modified` datetime NOT NULL,
  `deleted` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `attachments`
--

CREATE TABLE `attachments` (
  `id` int(11) NOT NULL,
  `thumb_url` varchar(500) NOT NULL,
  `full_url` varchar(500) NOT NULL,
  `path` varchar(500) NOT NULL,
  `user_id` int(11) NOT NULL,
  `label` varchar(355) NOT NULL,
  `description` int(11) NOT NULL,
  `associated` tinyint(4) NOT NULL DEFAULT '0',
  `type` varchar(150) NOT NULL,
  `deleted` tinyint(4) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `size` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `forum_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(500) NOT NULL,
  `description` longtext NOT NULL,
  `deleted` tinyint(4) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `forums`
--

CREATE TABLE `forums` (
  `id` int(11) NOT NULL,
  `uniue_str` varchar(255) NOT NULL,
  `title` varchar(500) NOT NULL,
  `excerpt` text NOT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `content` longtext NOT NULL,
  `user_id` int(11) NOT NULL,
  `deleted` tinyint(4) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `comment_status` enum('open','close') NOT NULL DEFAULT 'open'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `memberships`
--

CREATE TABLE `memberships` (
  `id` int(11) NOT NULL,
  `name` varchar(300) NOT NULL,
  `description` longtext NOT NULL,
  `validity` int(11) NOT NULL,
  `status` enum('active','inactive') NOT NULL,
  `price` float(34,2) NOT NULL DEFAULT '0.00',
  `validity_type` enum('days','months','years','') NOT NULL DEFAULT 'days',
  `deleted` tinyint(4) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `memberships`
--

INSERT INTO `memberships` (`id`, `name`, `description`, `validity`, `status`, `price`, `validity_type`, `deleted`, `created`, `modified`) VALUES
(0, 'First Test', 'This package is valid for three months', 0, 'active', 10.00, 'months', 0, '2018-01-01 22:08:43', '2018-01-01 22:08:43');

-- --------------------------------------------------------

--
-- Table structure for table `newsletters`
--

CREATE TABLE `newsletters` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `attachment_id` int(11) NOT NULL,
  `title` varchar(500) NOT NULL,
  `excerpt` text NOT NULL,
  `description` longtext NOT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `deleted` tinyint(4) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(11) NOT NULL,
  `order` int(11) NOT NULL,
  `unique_str` varchar(11) NOT NULL,
  `title` varchar(300) NOT NULL,
  `show_title` enum('yes','no') NOT NULL DEFAULT 'yes',
  `sub_title` text NOT NULL,
  `show_sub_title` enum('yes','no') NOT NULL DEFAULT 'yes',
  `excerpt` text NOT NULL,
  `content` longtext NOT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `menu_title` varchar(255) NOT NULL,
  `is_menu` enum('yes','no') NOT NULL DEFAULT 'yes',
  `is_home` enum('yes','no') NOT NULL,
  `is_static` enum('yes','no') NOT NULL DEFAULT 'yes',
  `controller` varchar(255) DEFAULT NULL,
  `action` varchar(255) DEFAULT NULL,
  `deleted` tinyint(4) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `order`, `unique_str`, `title`, `show_title`, `sub_title`, `show_sub_title`, `excerpt`, `content`, `status`, `menu_title`, `is_menu`, `is_home`, `is_static`, `controller`, `action`, `deleted`, `created`, `modified`, `user_id`, `role_id`) VALUES
(1, 10, 'home', 'Welcome to our Hobby Club!', 'yes', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>', 'yes', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>', '\r\n<h5>What is Lorem Ipsum?</h5>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<h5>Why do we use it?</h5>\r\n<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>\r\n\r\n<h5>Where does it come from?</h5>\r\n<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</p>\r\n<p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>\r\n\r\n<h5>Where can I get some?</h5>\r\n<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p>', 'active', 'Home', 'yes', 'yes', 'yes', NULL, NULL, 0, '2018-01-02 00:00:00', '0000-00-00 00:00:00', 1, 1),
(2, 20, 'about-us', 'About Hobby Club!', 'yes', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>', 'yes', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>', '\r\n<h5>What is Lorem Ipsum?</h5>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<h5>Why do we use it?</h5>\r\n<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>\r\n\r\n<h5>Where does it come from?</h5>\r\n<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</p>\r\n<p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>\r\n\r\n<h5>Where can I get some?</h5>\r\n<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p>', 'active', 'About Us', 'yes', 'no', 'yes', NULL, NULL, 0, '2018-01-02 00:00:00', '0000-00-00 00:00:00', 1, 1),
(3, 30, 'gallery', 'Gallery', 'yes', '', 'yes', '', '', 'active', 'Gallery', 'yes', 'no', 'no', 'Gallery', 'index', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 1),
(4, 40, 'forum', 'Forum', 'yes', '', 'yes', '', '', 'active', 'Forum', 'yes', 'no', 'no', 'Forum', 'index', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 1),
(5, 50, 'messaging', 'Messaging', 'yes', '', 'yes', '', '', 'active', 'Messaging', 'yes', 'no', 'no', 'Messages', 'index', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 1),
(6, 60, 'Faqs', 'Faqs', 'yes', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>', 'yes', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>', '\r\n<h5>What is Lorem Ipsum?</h5>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<h5>Why do we use it?</h5>\r\n<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>\r\n\r\n<h5>Where does it come from?</h5>\r\n<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</p>\r\n<p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>\r\n\r\n<h5>Where can I get some?</h5>\r\n<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p>', 'active', 'Faqs', 'yes', 'no', 'yes', NULL, NULL, 0, '2018-01-02 00:00:00', '0000-00-00 00:00:00', 1, 1),
(7, 70, 'contact-us', 'Contacts', 'yes', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>', 'yes', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>', '\r\n<h5>What is Lorem Ipsum?</h5>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<h5>Why do we use it?</h5>\r\n<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>\r\n\r\n<h5>Where does it come from?</h5>\r\n<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</p>\r\n<p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>\r\n\r\n<h5>Where can I get some?</h5>\r\n<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p>', 'active', 'Contact Us', 'yes', 'no', 'yes', NULL, NULL, 0, '2018-01-02 00:00:00', '0000-00-00 00:00:00', 1, 1),
(8, 35, 'newsletters', 'Newsletters', 'yes', '', 'yes', '', '', 'active', 'Newsletters', 'yes', 'no', 'no', 'Newsletters', 'index', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `transaction_id` varchar(100) NOT NULL,
  `amount` float(35,2) NOT NULL,
  `status` enum('pending','success','fail') NOT NULL DEFAULT 'pending',
  `date` datetime NOT NULL,
  `type` enum('paypal','bank') NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `name` varchar(500) NOT NULL,
  `description` text NOT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `deleted` tinyint(4) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `description`, `status`, `deleted`, `created`, `modified`) VALUES
(1, 'Paid User', '', 'active', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'Free Member', '', 'active', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `setting_key` varchar(244) NOT NULL,
  `setting_text` varchar(500) NOT NULL,
  `value` text NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `setting_key`, `setting_text`, `value`, `created`, `modified`) VALUES
(3, 'show_cache_attempts', 'Show Captcha After', '3', '2016-09-19 20:21:06', '2016-09-19 20:21:06'),
(4, 'block_login_attempts', 'Allowed Attempt Before Blocking', '5', '2016-09-19 20:21:42', '2016-09-19 20:21:42'),
(5, 'date_format', 'Date Format', 'm/d/Y h:i a', '2016-09-20 00:00:00', '0000-00-00 00:00:00'),
(6, 'block_hours', 'Block Login Hours', '24', '2016-09-21 07:00:00', '0000-00-00 00:00:00'),
(7, 'captcha_client_key', 'Google Captcha Client Key', '', '2016-09-21 00:00:00', '2016-09-22 00:00:00'),
(8, 'captcha_server_key', 'Google Captcha Server Key', '', '2016-09-21 00:00:00', '0000-00-00 00:00:00'),
(9, 'user_pic_path', 'User Profile Image Upload Path(Please create folder manually.)', 'files/user_images', '2016-09-26 00:00:00', '2016-09-26 00:00:00'),
(10, 'user_pic_max_size', 'User Profile Pic Max size(mb)', '5', '2016-09-26 00:00:00', '2016-09-26 00:00:00'),
(11, 'pagination_limit', '50', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, 'notification_email', 'Email Address for Website Notifications', 'munish.kumar.mca@gmail.com', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(13, 'forgot_password_block_hours', 'Block Forgot Password Hours', '1', '2016-12-04 00:00:00', '2016-12-04 00:00:00'),
(14, 'forgot_password_block_attempts', 'Forgot Password Block Attempts', '4', '2016-12-12 00:00:00', '2016-12-12 00:00:00'),
(15, 'reset_token_expiry_hours', 'Reset Token Expiry Hours', '4', '2016-12-12 00:00:00', '2016-12-12 00:00:00'),
(16, 'date_only_format', 'Date Only Format', 'm/d/Y', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(17, 'placeholder_image', 'Placeholder Image', 'files/user_images/placeholder.jpeg', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(18, 'local_datetime_format', 'Local Datetime Format', 'MM/dd/yyyy hh:mm aa', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `first_name` varchar(250) NOT NULL,
  `last_name` varchar(250) DEFAULT NULL,
  `display_name` varchar(250) DEFAULT NULL,
  `image` varchar(250) DEFAULT NULL,
  `last_logged_in` datetime DEFAULT NULL,
  `role_id` int(11) DEFAULT '1' COMMENT 'active - non paid',
  `membership_id` int(11) NOT NULL DEFAULT '0',
  `status` enum('active','inactive','paid') NOT NULL DEFAULT 'active',
  `end_date` datetime DEFAULT NULL,
  `dob` datetime DEFAULT NULL,
  `deleted` tinyint(4) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `login`, `email`, `password`, `first_name`, `last_name`, `display_name`, `image`, `last_logged_in`, `role_id`, `membership_id`, `status`, `end_date`, `dob`, `deleted`, `created`, `modified`) VALUES
(1, 'munish_k', 'munish.kumar.mca@gmail.com', '123456', 'Munish', 'Kumar', 'Munish', NULL, NULL, 2, 0, 'active', NULL, NULL, 0, '2018-01-01 19:51:35', '2018-01-01 20:05:45'),
(2, 'munish2', 'munish2@admin.com', '123', 'Munish', 'Kumar', 'munish', NULL, NULL, 2, 0, 'active', NULL, NULL, 1, '2018-01-01 20:30:22', '2018-01-01 20:32:04'),
(3, 'dsadasd@mailinator.com', 'admin@admin.com', '$2y$10$Y7k.Ip7Ru/0PMSkVAeGV6ejXZjQ1GmOiGz0CoIb11L4fhz.iXzVm.', 'Munish', 'Kumar', 'Muneesh', NULL, NULL, 1, 0, 'active', NULL, NULL, 0, '2018-01-03 10:52:23', '2018-01-03 10:52:23'),
(4, 'dsadassd@mailinator.com', 'adsmin@admin.com', '$2y$10$Qbe/Dz4r/LDlNMs5Vm.4VuP6.Y7a0We3bSCNUKcOFsG5fWORysmLm', 'Munishs', 'Kumar', 'Muneesh', NULL, NULL, 1, 0, 'active', NULL, NULL, 0, '2018-01-03 10:54:07', '2018-01-03 10:54:07'),
(5, 'dsadasssd@mailinator.com', 'adssmin@admin.com', '$2y$10$AVTSVwym5YPPrNdE5OIwJOjNkD/PC82Vl9KXi9WUHkagJWGF5ZGDi', 'Munishss', 'Kumar', 'Muneesh', NULL, NULL, 1, 0, 'active', NULL, NULL, 0, '2018-01-03 10:55:45', '2018-01-03 10:55:45'),
(6, 'dsadassssd@mailinator.com', 'adsssmin@mailinator.com', '$2y$10$qAdikt8LGMMb.c3zw4jSm.GC8.J/2I/nSnUhsdINFEC2dM6OySHpC', 'Munishsss', 'Kumar', 'Muneesh', NULL, NULL, 1, 0, 'active', NULL, NULL, 0, '2018-01-03 10:57:24', '2018-01-03 10:57:24'),
(7, 'dsaddsasd@mailinator.com', 'adddssdmin@admin.com', '$2y$10$UzXzdrzJoC7IPHR9mH2kW.l9XayMo2t2WE7HYY.z2NkhLmbhpWy/G', 'pawna', 'Test Business', 'sdfsdf', NULL, NULL, 1, 0, 'active', NULL, NULL, 0, '2018-01-03 12:43:03', '2018-01-03 12:43:03'),
(8, 'dasdasdasdasd', 'asdasdasdsa@tete.ol', '$2y$10$kEnqCGm.U5r6dh43zDhVp.jkcQ.VaVCXgGN5jkDyGKGPRyQaEBgue', 'dasdd', 'sdasdasd', 'dasdada', NULL, NULL, 1, 0, 'active', NULL, NULL, 0, '2018-01-03 13:09:04', '2018-01-03 13:09:04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `archive-images`
--
ALTER TABLE `archive-images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attachments`
--
ALTER TABLE `attachments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `forums`
--
ALTER TABLE `forums`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `memberships`
--
ALTER TABLE `memberships`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
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
-- AUTO_INCREMENT for table `archive-images`
--
ALTER TABLE `archive-images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `attachments`
--
ALTER TABLE `attachments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `forums`
--
ALTER TABLE `forums`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
