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

 Date: 12/04/2015 23:43:37 PM
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
  `privacy` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `albums`
-- ----------------------------
BEGIN;
INSERT INTO `albums` VALUES ('1', 'pl', '565ee7651e57a.jpg', '18', '1', '2015-12-02 19:43:17', '2015-12-02 19:43:17'), ('2', 'private', '565ee775e9baf.jpg', '18', '3', '2015-12-02 19:43:33', '2015-12-02 19:43:33'), ('3', 'album 2 ', '565eec0c642ba.jpg', '18', '1', '2015-12-02 20:03:08', '2015-12-02 20:03:08'), ('4', 'album private ', '565eecbda9d3b.jpg', '24', '3', '2015-12-02 20:06:05', '2015-12-02 20:06:05');
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
  `title` varchar(255) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `blogs`
-- ----------------------------
BEGIN;
INSERT INTO `blogs` VALUES ('1', '<p>đói</p>', '19', '1', '2015-12-04 02:27:11', '2015-12-04 02:27:11', 'đói');
COMMIT;

-- ----------------------------
--  Table structure for `conversations`
-- ----------------------------
DROP TABLE IF EXISTS `conversations`;
CREATE TABLE `conversations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user1_id` int(11) DEFAULT NULL,
  `user2_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `conversations`
-- ----------------------------
BEGIN;
INSERT INTO `conversations` VALUES ('1', '24', '18', '2015-12-03 23:04:41', '2015-12-03 23:04:41'), ('3', '19', '18', '2015-12-04 00:02:54', '2015-12-04 01:12:39');
COMMIT;

-- ----------------------------
--  Table structure for `entries`
-- ----------------------------
DROP TABLE IF EXISTS `entries`;
CREATE TABLE `entries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `entry_id` int(11) DEFAULT NULL,
  `type` tinyint(4) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `privacy` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `entries`
-- ----------------------------
BEGIN;
INSERT INTO `entries` VALUES ('1', '1', '3', '18', '1', '2015-12-02 19:43:17', '2015-12-02 19:43:17'), ('2', '2', '3', '18', '3', '2015-12-02 19:43:33', '2015-12-02 19:43:33'), ('3', '1', '1', '18', '1', '2015-12-02 20:01:20', '2015-12-02 20:01:20'), ('4', '3', '3', '18', '1', '2015-12-02 20:03:08', '2015-12-02 20:03:08'), ('5', '4', '3', '24', '3', '2015-12-02 20:06:05', '2015-12-02 20:06:05'), ('6', '2', '1', '24', '1', '2015-12-02 22:04:18', '2015-12-02 22:04:18'), ('7', '3', '1', '19', '1', '2015-12-04 02:26:47', '2015-12-04 02:26:47'), ('8', '1', '2', '19', '1', '2015-12-04 02:27:11', '2015-12-04 02:27:11');
COMMIT;

-- ----------------------------
--  Table structure for `follows`
-- ----------------------------
DROP TABLE IF EXISTS `follows`;
CREATE TABLE `follows` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `follower_id` int(11) DEFAULT NULL,
  `followed_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_deleted` tinyint(4) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `follows`
-- ----------------------------
BEGIN;
INSERT INTO `follows` VALUES ('1', '24', '18', '2015-12-02 19:44:22', '2015-12-03 10:44:36', '1'), ('2', '18', '19', '2015-12-02 20:09:45', '2015-12-02 20:09:45', '0'), ('3', '24', '19', '2015-12-03 10:44:31', '2015-12-03 10:44:32', '1'), ('4', '24', '18', '2015-12-03 10:44:37', '2015-12-03 10:44:38', '1'), ('5', '24', '18', '2015-12-03 10:44:41', '2015-12-03 10:44:45', '1'), ('6', '19', '18', '2015-12-04 01:29:45', '2015-12-04 01:29:45', '0'), ('7', '19', '24', '2015-12-04 02:02:12', '2015-12-04 02:02:12', '0'), ('8', '24', '20', '2015-12-04 02:02:45', '2015-12-04 02:02:45', '0');
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
  `width` int(11) DEFAULT NULL,
  `height` int(11) DEFAULT NULL,
  `created_at` varchar(255) DEFAULT NULL,
  `updated_at` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `images`
-- ----------------------------
BEGIN;
INSERT INTO `images` VALUES ('14', '565ee7651e57a.jpg', '18', '1', '672', '672', '2015-12-02 19:43:17', '2015-12-02 19:43:17'), ('15', '565ee76538f53.jpg', '18', '1', '360', '360', '2015-12-02 19:43:17', '2015-12-02 19:43:17'), ('16', '565ee775e9baf.jpg', '18', '2', '766', '1026', '2015-12-02 19:43:33', '2015-12-02 19:43:33'), ('17', '565ee775f1efe.jpg', '18', '2', '269', '361', '2015-12-02 19:43:33', '2015-12-02 19:43:33'), ('18', '565eec0c642ba.jpg', '18', '3', '716', '960', '2015-12-02 20:03:08', '2015-12-02 20:03:08'), ('19', '565eec0c83eb7.jpg', '18', '3', '269', '361', '2015-12-02 20:03:08', '2015-12-02 20:03:08'), ('20', '565eecbda9d3b.jpg', '24', '4', '275', '183', '2015-12-02 20:06:05', '2015-12-02 20:06:05'), ('21', '565eecbdc46d4.jpg', '24', '4', '194', '259', '2015-12-02 20:06:05', '2015-12-02 20:06:05');
COMMIT;

-- ----------------------------
--  Table structure for `messages`
-- ----------------------------
DROP TABLE IF EXISTS `messages`;
CREATE TABLE `messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `s_user_id` int(11) DEFAULT NULL,
  `conversation_id` int(11) DEFAULT NULL,
  `content` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `messages`
-- ----------------------------
BEGIN;
INSERT INTO `messages` VALUES ('1', '24', '1', 'min to 1', '2015-12-03 23:04:41', '2015-12-03 23:04:41'), ('2', '18', '1', '1 to min', '2015-12-03 23:05:04', '2015-12-03 23:05:04'), ('6', '19', '3', '2 to 1', '2015-12-04 00:02:54', '2015-12-04 00:02:54'), ('9', '19', '3', '2 to 1', '2015-12-04 00:19:16', '2015-12-04 00:19:16'), ('12', '19', '3', 'etsatta etsatta etsatta etsatta etsatta etsatta etsatta etsatta etsatta etsatta etsatta etsatta ', '2015-12-04 01:27:39', '2015-12-04 01:27:39');
COMMIT;

-- ----------------------------
--  Table structure for `mst_entry_types`
-- ----------------------------
DROP TABLE IF EXISTS `mst_entry_types`;
CREATE TABLE `mst_entry_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `mst_entry_types`
-- ----------------------------
BEGIN;
INSERT INTO `mst_entry_types` VALUES ('1', 'Post', '2015-11-30 23:09:04', '2015-11-30 23:09:08'), ('2', 'Blog', '2015-11-30 23:09:20', '2015-11-30 23:09:23'), ('3', 'Album', '2015-11-30 23:09:35', '2015-11-30 23:09:40');
COMMIT;

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `posts`
-- ----------------------------
BEGIN;
INSERT INTO `posts` VALUES ('1', 'post test . Ngao', '18', '1', '2015-12-02 20:01:20', '2015-12-02 20:01:20'), ('2', 'tesst ', '24', '1', '2015-12-02 22:04:18', '2015-12-02 22:04:18'), ('3', 'đói ', '19', '1', '2015-12-04 02:26:47', '2015-12-04 02:26:47');
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
  `is_admin` tinyint(4) DEFAULT '0',
  `about` text,
  `address` varchar(255) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `users`
-- ----------------------------
BEGIN;
INSERT INTO `users` VALUES ('13', 'HeHeBiBi', 'HeHeBiBi', '3808426542afae4bc36849754a633c39', 'hehehehe@yahoo.com', 'public/assets/images/ava_default.jpg', '', '2015-11-24 02:46:25', '2015-11-24 02:46:25', '0', '', ''), ('14', 'Nguyễn Chí Tâm', 'Tamsake', '3808426542afae4bc36849754a633c39', 'Tamsake@gmail.com', 'public/assets/images/ava_default.jpg', '25251325', '2015-11-24 16:12:43', '2015-11-25 02:54:07', '0', '', ''), ('15', 'Trần Bảo Huy', 'huy23121994', '3808426542afae4bc36849754a633c39', 'huy23121994@gmail.com', 'public/assets/images/ava_default.jpg', '01687017199', '2015-11-24 17:59:19', '2015-11-26 13:35:54', '0', '', ''), ('16', 'shikanoji', 'shikanoji', 'e10adc3949ba59abbe56e057f20f883e', 'shikanoji@gmai.com', 'public/assets/images/ava_default.jpg', '03210312314', '2015-11-25 14:34:06', '2015-11-25 14:35:04', '0', '', ''), ('17', 'Linh đần độn', 'lynh94', 'e10adc3949ba59abbe56e057f20f883e', 'linh@gmail.com', 'public/assets/images/ava_default.jpg', '123456789', '2015-11-25 15:51:10', '2015-11-25 16:01:24', '0', '', ''), ('18', 'User Test 1', 'usertest1', 'e10adc3949ba59abbe56e057f20f883e', 'usertest1@gmail.com', 'public/assets/images/ava_default.jpg', '12321', '2015-11-28 00:03:27', '2015-11-28 15:27:23', '0', '', ''), ('19', 'User Test 2', 'usertest2', 'e10adc3949ba59abbe56e057f20f883e', 'usertest2@gmail.com', 'public/assets/images/ava_default.jpg', '312456', '2015-11-28 12:24:58', '2015-11-28 12:24:58', '0', '', ''), ('20', 'UserTest 3', 'usertest3', 'e10adc3949ba59abbe56e057f20f883e', 'usertest3@gmail.com', 'public/assets/images/ava_default.jpg', '123456', '2015-11-28 12:37:00', '2015-11-28 12:37:00', '0', '', ''), ('21', 'UserTest 4', 'usertest4', 'e10adc3949ba59abbe56e057f20f883e', 'usertest4@gmail.com', 'public/assets/images/ava_default.jpg', '123456', '2015-11-28 12:48:04', '2015-11-28 12:48:04', '0', '', ''), ('22', 'UserTest 10', 'usertest10', 'e10adc3949ba59abbe56e057f20f883e', 'usertest2@gmail.com', 'public/assets/images/ava_default.jpg', '1234567', '2015-11-28 12:54:25', '2015-11-28 12:54:25', '0', '', ''), ('23', 'User Test 11', 'usertest11', 'e10adc3949ba59abbe56e057f20f883e', 'usertest11@gmail.com', 'public/assets/images/ava_default.jpg', '123435', '2015-11-28 13:09:01', '2015-11-28 13:09:01', '0', '', ''), ('24', 'Admin', 'admin123', 'e10adc3949ba59abbe56e057f20f883e', 'usertest6@gmail.com', 'public/avatar/admin123/phpJCB7lu565d309d8c6ca.jpg', '123456', '2015-11-28 16:07:50', '2015-12-01 12:51:26', '1', '', 'Cau Giay HN '), ('25', 'Huu Son', 'huuson', 'e10adc3949ba59abbe56e057f20f883e', 'huuson1994@gmail.com', 'public/assets/images/ava_default.jpg', '1234567', '2015-12-01 18:51:49', '2015-12-01 18:51:49', '0', '', ''), ('26', 'Test 123', 'test123', 'e10adc3949ba59abbe56e057f20f883e', 'test@gmail.com', 'public/assets/images/ava_default.jpg', '12345678', '2015-12-01 21:52:03', '2015-12-01 21:52:03', '0', ' ', '');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
