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

 Date: 12/05/2015 20:48:44 PM
*/

SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;

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

SET FOREIGN_KEY_CHECKS = 1;
