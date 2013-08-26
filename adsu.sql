/*
Navicat MySQL Data Transfer

Source Server         : My Connection
Source Server Version : 50524
Source Host           : localhost:3306
Source Database       : adsu

Target Server Type    : MYSQL
Target Server Version : 50524
File Encoding         : 65001

Date: 2013-08-22 12:19:07
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `admin_users`
-- ----------------------------
DROP TABLE IF EXISTS `admin_users`;
CREATE TABLE `admin_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `position` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of admin_users
-- ----------------------------
INSERT INTO `admin_users` VALUES ('1', 'admin');
INSERT INTO `admin_users` VALUES ('2', 'user');

-- ----------------------------
-- Table structure for `candidates`
-- ----------------------------
DROP TABLE IF EXISTS `candidates`;
CREATE TABLE `candidates` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `surname` varchar(45) DEFAULT NULL,
  `first_name` varchar(45) DEFAULT NULL,
  `state_of_origin` varchar(45) DEFAULT NULL,
  `CGPA` varchar(45) DEFAULT NULL,
  `passport` varchar(45) DEFAULT NULL,
  `post_id` int(11) NOT NULL,
  PRIMARY KEY (`id`,`post_id`),
  KEY `fk_candidates_posts_idx` (`post_id`),
  CONSTRAINT `fk_candidates_posts` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of candidates
-- ----------------------------
INSERT INTO `candidates` VALUES ('15', 'Jane', 'Doe', 'Cross river', '3.00', '15_passport.jpg', '1');
INSERT INTO `candidates` VALUES ('17', 'John', 'Doe', 'A state', '4.50', '17_passport.jpg', '1');
INSERT INTO `candidates` VALUES ('19', 'Sample', 'Candidate', 'State', '4.00', '19_passport.jpg', '3');
INSERT INTO `candidates` VALUES ('20', 'Onen', 'Eno', 'My state', '4.05', '20_passport.jpg', '3');

-- ----------------------------
-- Table structure for `pins`
-- ----------------------------
DROP TABLE IF EXISTS `pins`;
CREATE TABLE `pins` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pin` varchar(45) DEFAULT NULL,
  `usage_status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of pins
-- ----------------------------
INSERT INTO `pins` VALUES ('1', '167558', '1');
INSERT INTO `pins` VALUES ('2', '453569', '1');
INSERT INTO `pins` VALUES ('3', '111669', '1');
INSERT INTO `pins` VALUES ('4', '156301', '1');
INSERT INTO `pins` VALUES ('5', '240142', '1');
INSERT INTO `pins` VALUES ('6', '745566', '1');
INSERT INTO `pins` VALUES ('7', '123456', '1');

-- ----------------------------
-- Table structure for `posts`
-- ----------------------------
DROP TABLE IF EXISTS `posts`;
CREATE TABLE `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post_name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of posts
-- ----------------------------
INSERT INTO `posts` VALUES ('1', 'President');
INSERT INTO `posts` VALUES ('3', 'Secretary General');

-- ----------------------------
-- Table structure for `users`
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `matric_no` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `admin_users_id` int(11) NOT NULL,
  PRIMARY KEY (`id`,`admin_users_id`),
  KEY `fk_users_admin_users1_idx` (`admin_users_id`),
  CONSTRAINT `fk_users_admin_users1` FOREIGN KEY (`admin_users_id`) REFERENCES `admin_users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'admin', 'd56b699830e77ba53855679cb1d252da', '1');
INSERT INTO `users` VALUES ('2', '10/341004', 'd56b699830e77ba53855679cb1d252da', '2');
INSERT INTO `users` VALUES ('3', '10/341005', 'login', '2');
INSERT INTO `users` VALUES ('4', '10/341005', 'login', '1');
INSERT INTO `users` VALUES ('5', '10/341006', 'd56b699830e77ba53855679cb1d252da', '2');

-- ----------------------------
-- Table structure for `vote`
-- ----------------------------
DROP TABLE IF EXISTS `vote`;
CREATE TABLE `vote` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `used_pins` int(11) DEFAULT NULL,
  `post_id` int(11) NOT NULL,
  `candidate_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_vote_posts1_idx` (`post_id`),
  KEY `fk_vote_candidates1_idx` (`candidate_id`),
  CONSTRAINT `fk_vote_candidates1` FOREIGN KEY (`candidate_id`) REFERENCES `candidates` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_vote_posts1` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of vote
-- ----------------------------
