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

 Date: 11/28/2015 18:17:35 PM
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
  `album_img` varchar(255) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `public` varchar(255) DEFAULT NULL,
  `created_at` varchar(255) DEFAULT NULL,
  `updated_at` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `albums`
-- ----------------------------
BEGIN;
INSERT INTO `albums` VALUES ('23', '', '56576456cf726.jpg', '15', 'public', '2015-11-27 02:58:14', '2015-11-27 02:58:14'), ('24', '', '56576456d2ade.jpg', '15', 'public', '2015-11-27 02:58:14', '2015-11-27 02:58:14'), ('25', '', '565764867abd6.jpg', '15', 'public', '2015-11-27 02:59:02', '2015-11-27 02:59:02'), ('26', 'OK', '565764ca6e211.jpg', '15', 'private', '2015-11-27 03:00:10', '2015-11-27 03:00:10'), ('27', 'OK', '565764def3f84.jpg', '15', 'private', '2015-11-27 03:00:31', '2015-11-27 03:00:31'), ('28', 'ko đề', '56576557b0206.jpg', '15', 'public', '2015-11-27 03:02:31', '2015-11-27 03:02:31'), ('29', 'ko đề', '5657655a69a74.jpg', '15', 'public', '2015-11-27 03:02:34', '2015-11-27 03:02:34'), ('30', 'vô đề', '565769c9551f4.jpg', '14', 'friend', '2015-11-27 03:21:29', '2015-11-27 03:21:29');
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `images`
-- ----------------------------
BEGIN;
INSERT INTO `images` VALUES ('1', 'ava_default.jpg', '0', null, null, '0', null, null, null), ('27', '56576456cf726.jpg', '15', '23', null, '1262', '791', '2015-11-27 02:58:15', '2015-11-27 02:58:15'), ('28', '56576456d2ade.jpg', '15', '24', null, '1920', '1080', '2015-11-27 02:58:15', '2015-11-27 02:58:15'), ('29', '565764867abd6.jpg', '15', '25', null, '1920', '1080', '2015-11-27 02:59:02', '2015-11-27 02:59:02'), ('30', '56576486e0a02.jpg', '15', '25', null, '1262', '791', '2015-11-27 02:59:02', '2015-11-27 02:59:02'), ('31', '565764ca6e211.jpg', '15', '26', null, '1266', '792', '2015-11-27 03:00:10', '2015-11-27 03:00:10'), ('32', '565764caa656d.jpg', '15', '26', null, '1600', '899', '2015-11-27 03:00:10', '2015-11-27 03:00:10'), ('33', '565764caf09ee.jpg', '15', '26', null, '500', '313', '2015-11-27 03:00:10', '2015-11-27 03:00:10'), ('34', '565764cb121ae.jpg', '15', '26', null, '1920', '1200', '2015-11-27 03:00:11', '2015-11-27 03:00:11'), ('35', '565764cb250b0.jpg', '15', '26', null, '640', '426', '2015-11-27 03:00:11', '2015-11-27 03:00:11'), ('36', '565764cb312ad.jpg', '15', '26', null, '640', '360', '2015-11-27 03:00:11', '2015-11-27 03:00:11'), ('37', '565764cb3d58e.jpg', '15', '26', null, '640', '470', '2015-11-27 03:00:11', '2015-11-27 03:00:11'), ('38', '565764cb497a7.jpg', '15', '26', null, '948', '600', '2015-11-27 03:00:11', '2015-11-27 03:00:11'), ('39', '565764def3f84.jpg', '15', '27', null, '1920', '1080', '2015-11-27 03:00:31', '2015-11-27 03:00:31'), ('40', '56576557b0206.jpg', '15', '28', null, '1366', '768', '2015-11-27 03:02:31', '2015-11-27 03:02:31'), ('41', '5657655a69a74.jpg', '15', '29', null, '1366', '768', '2015-11-27 03:02:34', '2015-11-27 03:02:34'), ('42', '565769c9551f4.jpg', '14', '30', null, '1366', '768', '2015-11-27 03:21:29', '2015-11-27 03:21:29'), ('43', '565769c999454.jpg', '14', '30', null, '1366', '768', '2015-11-27 03:21:29', '2015-11-27 03:21:29'), ('44', '565769c9ac48a.jpg', '14', '30', null, '1366', '768', '2015-11-27 03:21:29', '2015-11-27 03:21:29'), ('45', '565769c9f16a3.jpg', '14', '30', null, '1366', '768', '2015-11-27 03:21:29', '2015-11-27 03:21:29'), ('46', '565769ca1010c.jpg', '14', '30', null, '1366', '768', '2015-11-27 03:21:30', '2015-11-27 03:21:30'), ('47', '565769ca22e46.jpg', '14', '30', null, '1366', '768', '2015-11-27 03:21:30', '2015-11-27 03:21:30'), ('48', '565769ca2f1b4.jpg', '14', '30', null, '1366', '768', '2015-11-27 03:21:30', '2015-11-27 03:21:30'), ('49', '565769ca3b385.jpg', '14', '30', null, '1366', '768', '2015-11-27 03:21:30', '2015-11-27 03:21:30');
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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `mst_privacies`
-- ----------------------------
BEGIN;
INSERT INTO `mst_privacies` VALUES ('1', 'Công khai', '2015-11-28 15:51:58', '2015-11-28 15:52:00'), ('2', 'Bạn bè', '2015-11-28 15:52:52', '2015-11-28 15:52:54'), ('3', 'Riêng tư', '2015-11-28 15:53:02', '2015-11-28 15:53:04');
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `posts`
-- ----------------------------
BEGIN;
INSERT INTO `posts` VALUES ('1', 'status 1 ', '24', '1', '2015-11-28 17:12:42', '2015-11-28 17:12:42'), ('2', 'status 2 ', '24', '1', '2015-11-28 18:04:17', '2015-11-28 18:04:17');
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
