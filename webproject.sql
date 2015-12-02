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

 Date: 12/02/2015 10:18:59 AM
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
INSERT INTO `albums` VALUES ('1', 'test photo ', '565c773b3a80b.jpg', '19', '1', '2015-11-30 23:20:11', '2015-11-30 23:20:11'), ('2', 'test photo private ', '565c775681421.jpg', '19', '3', '2015-11-30 23:20:38', '2015-11-30 23:20:38'), ('3', '', '565d341c39934.jpg', '24', '1', '2015-12-01 12:46:04', '2015-12-01 12:46:04'), ('4', '', '565d38719f24e.jpg', '18', '1', '2015-12-01 13:04:33', '2015-12-01 13:04:33');
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
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `blogs`
-- ----------------------------
BEGIN;
INSERT INTO `blogs` VALUES ('4', '<p>adfasdf&nbsp;</p>', '24', '1', '2015-12-01 13:17:10', '2015-12-01 13:17:10', 'Blogs 2 '), ('5', '<p>Blog 3 test&nbsp;</p>', '24', '3', '2015-12-01 13:17:53', '2015-12-01 20:29:11', 'Blog 3 private '), ('7', '<p>Blog 1 public&nbsp;</p>', '25', '1', '2015-12-01 18:55:18', '2015-12-01 18:55:18', 'Blog 1 '), ('9', '<p>Blog 2</p>', '25', '3', '2015-12-01 19:00:00', '2015-12-01 19:00:00', 'Blog 2 private '), ('11', '<p>ádfja ádfasdf&nbsp;</p><p><br></p><p><br></p><p><br></p><p><br></p><p>ádfja ádfasdf&nbsp;</p><p>ádfja ádfasdf&nbsp;</p><p><br></p><p>ádfja ádfasdf&nbsp;</p><p>ádfja ádfasdf&nbsp;</p><p>ádfja ádfasdf&nbsp;</p><p>ádfja ádfasdf&nbsp;</p><p>ádfja ádfasdf&nbsp;</p>', '18', '1', '2015-12-01 21:13:34', '2015-12-01 23:38:20', '1');
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
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `entries`
-- ----------------------------
BEGIN;
INSERT INTO `entries` VALUES ('1', '2', '1', '19', '1', '2015-11-30 23:18:08', '2015-11-30 23:18:08'), ('2', '3', '1', '19', '3', '2015-11-30 23:18:24', '2015-11-30 23:18:24'), ('3', '1', '2', '19', '1', '2015-11-30 23:19:06', '2015-11-30 23:19:06'), ('4', '2', '2', '19', '1', '2015-11-30 23:19:14', '2015-11-30 23:19:14'), ('5', '1', '3', '19', '1', '2015-11-30 23:20:11', '2015-11-30 23:20:11'), ('6', '2', '3', '19', '3', '2015-11-30 23:20:38', '2015-11-30 23:20:38'), ('7', '5', '1', '20', '1', '2015-12-01 02:02:30', '2015-12-01 02:02:30'), ('8', '6', '1', '20', '3', '2015-12-01 02:02:50', '2015-12-01 02:02:50'), ('9', '3', '3', '24', '1', '2015-12-01 12:46:04', '2015-12-01 12:46:04'), ('10', '7', '1', '24', '1', '2015-12-01 12:46:18', '2015-12-01 12:46:18'), ('11', '4', '3', '18', '1', '2015-12-01 13:04:33', '2015-12-01 13:04:33'), ('12', '3', '2', '24', '1', '2015-12-01 13:15:37', '2015-12-01 13:15:37'), ('13', '4', '2', '24', '1', '2015-12-01 13:17:10', '2015-12-01 13:17:10'), ('14', '5', '2', '24', '1', '2015-12-01 13:17:54', '2015-12-01 13:17:54'), ('15', '6', '2', '24', '1', '2015-12-01 13:41:46', '2015-12-01 13:41:46'), ('16', '8', '1', '25', '1', '2015-12-01 18:52:22', '2015-12-01 18:52:22'), ('17', '9', '1', '25', '3', '2015-12-01 18:52:29', '2015-12-01 18:52:29'), ('18', '10', '1', '25', '1', '2015-12-01 18:52:36', '2015-12-01 18:52:36'), ('19', '11', '1', '25', '3', '2015-12-01 18:52:59', '2015-12-01 18:52:59'), ('20', '7', '2', '25', '1', '2015-12-01 18:55:18', '2015-12-01 18:55:18'), ('21', '8', '2', '25', '1', '2015-12-01 18:55:31', '2015-12-01 18:55:31'), ('22', '9', '2', '25', '3', '2015-12-01 19:00:00', '2015-12-01 19:00:00'), ('23', '10', '2', '24', '1', '2015-12-01 19:48:22', '2015-12-01 19:48:22'), ('24', '12', '1', '24', '1', '2015-12-01 20:48:14', '2015-12-01 20:48:14'), ('25', '13', '1', '24', '1', '2015-12-01 20:48:57', '2015-12-01 20:48:57'), ('26', '14', '1', '24', '1', '2015-12-01 20:50:00', '2015-12-01 20:50:00'), ('27', '15', '1', '24', '1', '2015-12-01 20:50:32', '2015-12-01 20:50:32'), ('28', '11', '2', '18', '1', '2015-12-01 21:13:34', '2015-12-01 21:13:34');
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
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `follows`
-- ----------------------------
BEGIN;
INSERT INTO `follows` VALUES ('1', '18', '24', '2015-11-30 15:28:40', '2015-12-01 12:40:37', '1'), ('2', '18', '19', '2015-11-30 18:51:46', '2015-12-02 01:29:16', '1'), ('3', '18', '21', '2015-11-30 19:09:41', '2015-11-30 19:59:01', '1'), ('4', '18', '23', '2015-11-30 19:13:45', '2015-11-30 19:59:03', '0'), ('5', '18', '20', '2015-11-30 19:19:31', '2015-11-30 19:19:31', '0'), ('6', '18', '22', '2015-11-30 19:50:36', '2015-11-30 20:04:43', '1'), ('7', '20', '19', '2015-12-01 02:03:00', '2015-12-01 02:03:00', '0'), ('8', '18', '24', '2015-12-01 12:41:32', '2015-12-01 12:41:32', '0'), ('9', '24', '19', '2015-12-01 12:44:48', '2015-12-01 12:44:48', '0'), ('10', '24', '18', '2015-12-01 13:04:05', '2015-12-01 13:04:05', '0'), ('11', '18', '19', '2015-12-02 01:29:19', '2015-12-02 01:29:22', '1'), ('12', '18', '19', '2015-12-02 01:29:28', '2015-12-02 01:29:41', '1'), ('13', '24', '26', '2015-12-02 01:36:53', '2015-12-02 01:36:53', '0'), ('14', '24', '22', '2015-12-02 01:42:57', '2015-12-02 01:42:57', '0'), ('15', '24', '20', '2015-12-02 01:42:57', '2015-12-02 01:42:57', '0'), ('16', '24', '21', '2015-12-02 01:42:58', '2015-12-02 01:42:58', '0'), ('17', '24', '23', '2015-12-02 01:42:59', '2015-12-02 01:42:59', '0');
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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `images`
-- ----------------------------
BEGIN;
INSERT INTO `images` VALUES ('1', '565c773b3a80b.jpg', '19', '1', null, '194', '259', '2015-11-30 23:20:11', '2015-11-30 23:20:11'), ('2', '565c773b5d83d.jpg', '19', '1', null, '275', '183', '2015-11-30 23:20:11', '2015-11-30 23:20:11'), ('3', '565c775681421.jpg', '19', '2', null, '52', '70', '2015-11-30 23:20:38', '2015-11-30 23:20:38'), ('4', '565c7756881ef.jpg', '19', '2', null, '640', '384', '2015-11-30 23:20:38', '2015-11-30 23:20:38'), ('5', '565d341c39934.jpg', '24', '3', null, '3264', '2448', '2015-12-01 12:46:04', '2015-12-01 12:46:04'), ('6', '565d341c6c797.jpg', '24', '3', null, '3264', '2448', '2015-12-01 12:46:04', '2015-12-01 12:46:04'), ('7', '565d38719f24e.jpg', '18', '4', null, '52', '70', '2015-12-01 13:04:33', '2015-12-01 13:04:33'), ('8', '565d3871c9737.jpg', '18', '4', null, '39', '70', '2015-12-01 13:04:33', '2015-12-01 13:04:33'), ('9', '565d3871cde84.jpg', '18', '4', null, '52', '70', '2015-12-01 13:04:33', '2015-12-01 13:04:33');
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
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `posts`
-- ----------------------------
BEGIN;
INSERT INTO `posts` VALUES ('2', 'test post ', '19', '1', '2015-11-30 23:18:07', '2015-11-30 23:18:07'), ('3', 'test post private ', '19', '3', '2015-11-30 23:18:24', '2015-11-30 23:18:24'), ('4', '3: public post', '20', '1', '2015-12-01 02:01:29', '2015-12-01 02:01:29'), ('5', '3: public post', '20', '1', '2015-12-01 02:02:30', '2015-12-01 02:02:30'), ('6', '3: private post', '20', '3', '2015-12-01 02:02:50', '2015-12-01 02:02:50'), ('8', 'post 1 public ', '25', '1', '2015-12-01 18:52:22', '2015-12-01 18:52:22'), ('9', 'post 1 private ', '25', '3', '2015-12-01 18:52:29', '2015-12-01 18:52:29'), ('10', '', '25', '1', '2015-12-01 18:52:36', '2015-12-01 18:52:36'), ('11', '', '25', '3', '2015-12-01 18:52:59', '2015-12-01 18:52:59');
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
