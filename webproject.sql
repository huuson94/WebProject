-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 26, 2015 at 09:34 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `webproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `albums`
--

CREATE TABLE IF NOT EXISTS `albums` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `album_img` varchar(255) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `public` varchar(255) DEFAULT NULL,
  `created_at` varchar(255) DEFAULT NULL,
  `updated_at` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `albums`
--

INSERT INTO `albums` (`id`, `title`, `album_img`, `user_id`, `public`, `created_at`, `updated_at`) VALUES
(23, '', '56576456cf726.jpg', 15, 'public', '2015-11-27 02:58:14', '2015-11-27 02:58:14'),
(24, '', '56576456d2ade.jpg', 15, 'public', '2015-11-27 02:58:14', '2015-11-27 02:58:14'),
(25, '', '565764867abd6.jpg', 15, 'public', '2015-11-27 02:59:02', '2015-11-27 02:59:02'),
(26, 'OK', '565764ca6e211.jpg', 15, 'private', '2015-11-27 03:00:10', '2015-11-27 03:00:10'),
(27, 'OK', '565764def3f84.jpg', 15, 'private', '2015-11-27 03:00:31', '2015-11-27 03:00:31'),
(28, 'ko đề', '56576557b0206.jpg', 15, 'public', '2015-11-27 03:02:31', '2015-11-27 03:02:31'),
(29, 'ko đề', '5657655a69a74.jpg', 15, 'public', '2015-11-27 03:02:34', '2015-11-27 03:02:34'),
(30, 'vô đề', '565769c9551f4.jpg', 14, 'friend', '2015-11-27 03:21:29', '2015-11-27 03:21:29');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE IF NOT EXISTS `images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `path` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `album_id` varchar(255) DEFAULT NULL,
  `post_id` varchar(255) DEFAULT NULL,
  `width` int(11) DEFAULT NULL,
  `height` int(11) DEFAULT NULL,
  `created_at` varchar(255) DEFAULT NULL,
  `updated_at` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=50 ;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `path`, `user_id`, `album_id`, `post_id`, `width`, `height`, `created_at`, `updated_at`) VALUES
(1, 'ava_default.jpg', 0, NULL, NULL, 0, NULL, NULL, NULL),
(27, '56576456cf726.jpg', 15, '23', NULL, 1262, 791, '2015-11-27 02:58:15', '2015-11-27 02:58:15'),
(28, '56576456d2ade.jpg', 15, '24', NULL, 1920, 1080, '2015-11-27 02:58:15', '2015-11-27 02:58:15'),
(29, '565764867abd6.jpg', 15, '25', NULL, 1920, 1080, '2015-11-27 02:59:02', '2015-11-27 02:59:02'),
(30, '56576486e0a02.jpg', 15, '25', NULL, 1262, 791, '2015-11-27 02:59:02', '2015-11-27 02:59:02'),
(31, '565764ca6e211.jpg', 15, '26', NULL, 1266, 792, '2015-11-27 03:00:10', '2015-11-27 03:00:10'),
(32, '565764caa656d.jpg', 15, '26', NULL, 1600, 899, '2015-11-27 03:00:10', '2015-11-27 03:00:10'),
(33, '565764caf09ee.jpg', 15, '26', NULL, 500, 313, '2015-11-27 03:00:10', '2015-11-27 03:00:10'),
(34, '565764cb121ae.jpg', 15, '26', NULL, 1920, 1200, '2015-11-27 03:00:11', '2015-11-27 03:00:11'),
(35, '565764cb250b0.jpg', 15, '26', NULL, 640, 426, '2015-11-27 03:00:11', '2015-11-27 03:00:11'),
(36, '565764cb312ad.jpg', 15, '26', NULL, 640, 360, '2015-11-27 03:00:11', '2015-11-27 03:00:11'),
(37, '565764cb3d58e.jpg', 15, '26', NULL, 640, 470, '2015-11-27 03:00:11', '2015-11-27 03:00:11'),
(38, '565764cb497a7.jpg', 15, '26', NULL, 948, 600, '2015-11-27 03:00:11', '2015-11-27 03:00:11'),
(39, '565764def3f84.jpg', 15, '27', NULL, 1920, 1080, '2015-11-27 03:00:31', '2015-11-27 03:00:31'),
(40, '56576557b0206.jpg', 15, '28', NULL, 1366, 768, '2015-11-27 03:02:31', '2015-11-27 03:02:31'),
(41, '5657655a69a74.jpg', 15, '29', NULL, 1366, 768, '2015-11-27 03:02:34', '2015-11-27 03:02:34'),
(42, '565769c9551f4.jpg', 14, '30', NULL, 1366, 768, '2015-11-27 03:21:29', '2015-11-27 03:21:29'),
(43, '565769c999454.jpg', 14, '30', NULL, 1366, 768, '2015-11-27 03:21:29', '2015-11-27 03:21:29'),
(44, '565769c9ac48a.jpg', 14, '30', NULL, 1366, 768, '2015-11-27 03:21:29', '2015-11-27 03:21:29'),
(45, '565769c9f16a3.jpg', 14, '30', NULL, 1366, 768, '2015-11-27 03:21:29', '2015-11-27 03:21:29'),
(46, '565769ca1010c.jpg', 14, '30', NULL, 1366, 768, '2015-11-27 03:21:30', '2015-11-27 03:21:30'),
(47, '565769ca22e46.jpg', 14, '30', NULL, 1366, 768, '2015-11-27 03:21:30', '2015-11-27 03:21:30'),
(48, '565769ca2f1b4.jpg', 14, '30', NULL, 1366, 768, '2015-11-27 03:21:30', '2015-11-27 03:21:30'),
(49, '565769ca3b385.jpg', 14, '30', NULL, 1366, 768, '2015-11-27 03:21:30', '2015-11-27 03:21:30');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` varchar(255) NOT NULL,
  `user_id` varchar(255) DEFAULT NULL,
  `public` varchar(255) DEFAULT NULL,
  `created_at` varchar(255) NOT NULL,
  `updated_at` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(255) DEFAULT NULL,
  `account` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `created_at` varchar(255) DEFAULT NULL,
  `updated_at` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullname`, `account`, `password`, `email`, `avatar`, `phone`, `created_at`, `updated_at`) VALUES
(13, 'HeHeBiBi', 'HeHeBiBi', '3808426542afae4bc36849754a633c39', 'hehehehe@yahoo.com', 'assets/images/ava_default.jpg', '', '2015-11-24 02:46:25', '2015-11-24 02:46:25'),
(14, 'Nguyễn Chí Tâm', 'Tamsake', '3808426542afae4bc36849754a633c39', 'Tamsake@gmail.com', 'assets/images/ava_default.jpg', '25251325', '2015-11-24 16:12:43', '2015-11-25 02:54:07'),
(15, 'Trần Bảo Huy', 'huy23121994', '3808426542afae4bc36849754a633c39', 'huy23121994@gmail.com', 'assets/images/ava_default.jpg', '01687017199', '2015-11-24 17:59:19', '2015-11-26 13:35:54'),
(16, 'shikanoji', 'shikanoji', 'e10adc3949ba59abbe56e057f20f883e', 'shikanoji@gmai.com', 'assets/images/ava_default.jpg', '03210312314', '2015-11-25 14:34:06', '2015-11-25 14:35:04'),
(17, 'Linh đần độn', 'lynh94', 'e10adc3949ba59abbe56e057f20f883e', 'linh@gmail.com', 'assets/images/ava_default.jpg', '123456789', '2015-11-25 15:51:10', '2015-11-25 16:01:24');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
