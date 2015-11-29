/*
 Navicat Premium Data Transfer

 Source Server         : MySQL
 Source Server Type    : MySQL
 Source Server Version : 50624
 Source Host           : localhost
 Source Database       : webproject

 Target Server Type    : MySQL
 Target Server Version : 50624
 File Encoding         : utf-8

 Date: 11/29/2015 15:11:49 PM
*/

SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `albums`
-- ----------------------------
DROP TABLE IF EXISTS `albums`;
CREATE TABLE `albums` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `album_img` varchar(255) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `privacy_id` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `albums`
-- ----------------------------
BEGIN;
INSERT INTO `albums` VALUES ('1', '', '565a989aed132.jpg', '18', '1', '2015-11-29 13:18:03', '2015-11-29 13:18:03'), ('2', '1', '565aa06f42f3b.jpg', '18', '1', '2015-11-29 13:51:27', '2015-11-29 13:51:27'), ('3', '2', '565aa08a4e133.jpg', '18', '3', '2015-11-29 13:51:54', '2015-11-29 13:51:54'), ('4', '', '565ab04574b5b.jpg', '19', '1', '2015-11-29 14:59:01', '2015-11-29 14:59:01');
COMMIT;

-- ----------------------------
--  Table structure for `blogs`
-- ----------------------------
DROP TABLE IF EXISTS `blogs`;
CREATE TABLE `blogs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` text,
  `user_id` int(11) DEFAULT NULL,
  `privacy` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `blogs`
-- ----------------------------
BEGIN;
INSERT INTO `blogs` VALUES ('1', '<p>This is test blog</p><p><br></p><p>This is test blog</p><p>This is test blog</p><p>This is test blog</p><p>This is test blog</p><p>This is test blog</p><p>This is test blog</p><p>This is test blog</p><p>This is test blog</p>', '24', '1', '2015-11-28 18:20:03', '2015-11-28 18:20:03'), ('2', '<p style=\"text-align: center;\"><strong>This is styled blog</strong></p><p style=\"text-align: left;\"><span style=\"font-family: Georgia,serif;\"><u>Hà nội, ngày 28/11/2015. Năm 4, bài tập lớn web.</u></span><br><br></p>', '24', '1', '2015-11-28 18:58:19', '2015-11-28 18:58:19'), ('3', '<p style=\"text-align: center;\"><strong>Test image</strong></p><p>&nbsp;<img class=\"fr-dib\" src=\"http://i.froala.com/download/7817244f5c49ee82c57d93a428d2a650f90ca2a3.jpg?1448718555\" style=\"width: 300px;\"></p>', '24', '1', '2015-11-28 20:49:51', '2015-11-28 20:49:51'), ('4', '<p>Test&nbsp;</p>', '24', '1', '2015-11-28 22:13:43', '2015-11-28 22:13:43'), ('5', '<p>asdfds</p>', '24', '1', '2015-11-28 22:32:37', '2015-11-28 22:32:37'), ('6', '<p>adsf</p>', '24', '1', '2015-11-28 22:55:08', '2015-11-28 22:55:08'), ('7', '<p>Đi ngủ. Buồn ngủ voãi <span class=\"fr-emoticon\">&#x1f602;</span></p>', '24', '1', '2015-11-28 23:40:07', '2015-11-28 23:40:07');
COMMIT;

-- ----------------------------
--  Table structure for `images`
-- ----------------------------
DROP TABLE IF EXISTS `images`;
CREATE TABLE `images` (
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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `images`
-- ----------------------------
BEGIN;
INSERT INTO `images` VALUES ('1', '565a989aed132.jpg', '18', '1', null, '238', '238', '2015-11-29 13:18:03', '2015-11-29 13:18:03'), ('2', '565a989b2346e.jpg', '18', '1', null, '266', '147', '2015-11-29 13:18:03', '2015-11-29 13:18:03'), ('3', '565aa06f42f3b.jpg', '18', '2', null, '500', '333', '2015-11-29 13:51:27', '2015-11-29 13:51:27'), ('4', '565aa06f5ea51.jpg', '18', '2', null, '194', '259', '2015-11-29 13:51:27', '2015-11-29 13:51:27'), ('5', '565aa08a4e133.jpg', '18', '3', null, '238', '238', '2015-11-29 13:51:54', '2015-11-29 13:51:54'), ('6', '565aa08a59c05.jpg', '18', '3', null, '266', '147', '2015-11-29 13:51:54', '2015-11-29 13:51:54'), ('7', '565ab04574b5b.jpg', '19', '4', null, '1364', '584', '2015-11-29 14:59:01', '2015-11-29 14:59:01'), ('8', '565ab045a40ca.jpg', '19', '4', null, '238', '238', '2015-11-29 14:59:01', '2015-11-29 14:59:01');
COMMIT;

-- ----------------------------
--  Table structure for `messages`
-- ----------------------------
DROP TABLE IF EXISTS `messages`;
CREATE TABLE `messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `s_user_id` int(11) DEFAULT NULL,
  `r_user_id` int(11) DEFAULT NULL,
  `content` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `mst_privacies`
-- ----------------------------
DROP TABLE IF EXISTS `mst_privacies`;
CREATE TABLE `mst_privacies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_deleted` tinyint(4) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `mst_privacies`
-- ----------------------------
BEGIN;
INSERT INTO `mst_privacies` VALUES ('1', 'Công khai', '2015-11-28 15:51:58', '2015-11-28 15:52:00', '0'), ('2', 'Bạn bè', '2015-11-28 15:52:52', '2015-11-28 15:52:54', '1'), ('3', 'Riêng tư', '2015-11-28 15:53:02', '2015-11-28 15:53:04', '0');
COMMIT;

-- ----------------------------
--  Table structure for `posts`
-- ----------------------------
DROP TABLE IF EXISTS `posts`;
CREATE TABLE `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` varchar(255) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `privacy` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `posts`
-- ----------------------------
BEGIN;
INSERT INTO `posts` VALUES ('1', 'status 1 ', '24', '1', '2015-11-28 17:12:42', '2015-11-28 17:12:42'), ('2', 'status 2 ', '24', '1', '2015-11-28 18:04:17', '2015-11-28 18:04:17'), ('3', 'asd', '24', '1', '2015-11-28 22:11:22', '2015-11-28 22:11:22'), ('4', 'test ', '24', '1', '2015-11-28 22:11:31', '2015-11-28 22:11:31'), ('5', 'asdf', '24', '1', '2015-11-28 22:32:29', '2015-11-28 22:32:29'), ('6', 'adsf', '24', '1', '2015-11-28 22:55:16', '2015-11-28 22:55:16'), ('7', 'ádf', '24', '1', '2015-11-28 23:39:48', '2015-11-28 23:39:48'), ('8', 'fdsdf', '18', '1', '2015-11-29 12:09:45', '2015-11-29 12:09:45');
COMMIT;

-- ----------------------------
--  Table structure for `users`
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(255) DEFAULT NULL,
  `account` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `users`
-- ----------------------------
BEGIN;
INSERT INTO `users` VALUES ('13', 'HeHeBiBi', 'HeHeBiBi', '3808426542afae4bc36849754a633c39', 'hehehehe@yahoo.com', 'public/assets/images/ava_default.jpg', '', '2015-11-24 02:46:25', '2015-11-24 02:46:25'), ('14', 'Nguyễn Chí Tâm', 'Tamsake', '3808426542afae4bc36849754a633c39', 'Tamsake@gmail.com', 'public/assets/images/ava_default.jpg', '25251325', '2015-11-24 16:12:43', '2015-11-25 02:54:07'), ('15', 'Trần Bảo Huy', 'huy23121994', '3808426542afae4bc36849754a633c39', 'huy23121994@gmail.com', 'public/assets/images/ava_default.jpg', '01687017199', '2015-11-24 17:59:19', '2015-11-26 13:35:54'), ('16', 'shikanoji', 'shikanoji', 'e10adc3949ba59abbe56e057f20f883e', 'shikanoji@gmai.com', 'public/assets/images/ava_default.jpg', '03210312314', '2015-11-25 14:34:06', '2015-11-25 14:35:04'), ('17', 'Linh đần độn', 'lynh94', 'e10adc3949ba59abbe56e057f20f883e', 'linh@gmail.com', 'public/assets/images/ava_default.jpg', '123456789', '2015-11-25 15:51:10', '2015-11-25 16:01:24'), ('18', 'User Test 1', 'usertest1', 'e10adc3949ba59abbe56e057f20f883e', 'usertest1@gmail.com', 'public/assets/images/ava_default.jpg', '12321', '2015-11-28 00:03:27', '2015-11-28 15:27:23'), ('19', 'User Test 2', 'usertest2', 'e10adc3949ba59abbe56e057f20f883e', 'usertest2@gmail.com', 'public/assets/images/ava_default.jpg', '312456', '2015-11-28 12:24:58', '2015-11-28 12:24:58'), ('20', 'UserTest 3', 'usertest3', 'e10adc3949ba59abbe56e057f20f883e', 'usertest3@gmail.com', 'public/assets/images/ava_default.jpg', '123456', '2015-11-28 12:37:00', '2015-11-28 12:37:00'), ('21', 'UserTest 4', 'usertest4', 'e10adc3949ba59abbe56e057f20f883e', 'usertest4@gmail.com', 'public/assets/images/ava_default.jpg', '123456', '2015-11-28 12:48:04', '2015-11-28 12:48:04'), ('22', 'UserTest 10', 'usertest10', 'e10adc3949ba59abbe56e057f20f883e', 'usertest2@gmail.com', 'public/assets/images/ava_default.jpg', '1234567', '2015-11-28 12:54:25', '2015-11-28 12:54:25'), ('23', 'User Test 10', 'usertest11', 'e10adc3949ba59abbe56e057f20f883e', 'usertest11@gmail.com', 'public/assets/images/ava_default.jpg', '123435', '2015-11-28 13:09:01', '2015-11-28 13:09:01'), ('24', 'HuuSon', 'usertest6', 'e10adc3949ba59abbe56e057f20f883e', 'usertest6@gmail.com', 'public/assets/images/ava_default.jpg', '123456', '2015-11-28 16:07:50', '2015-11-28 18:09:00');
COMMIT;

-- ----------------------------
--  View structure for `index_view`
-- ----------------------------
DROP VIEW IF EXISTS `index_view`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `index_view` AS select `posts`.`id` AS `post_id`,`blogs`.`id` AS `blog_id`,`albums`.`id` AS `album_id` from ((`posts` join `blogs`) join `albums`);

SET FOREIGN_KEY_CHECKS = 1;
