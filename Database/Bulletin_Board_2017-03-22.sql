# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.7.17)
# Database: Bulletin_Board
# Generation Time: 2017-03-20 20:08:34 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table user
# ------------------------------------------------------------

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL DEFAULT '',
  `username` varchar(255) NOT NULL DEFAULT '',
  `password` varchar(255) NOT NULL DEFAULT '',
  `email` varchar(255) NOT NULL DEFAULT '',
  `gender` varchar(255) DEFAULT '',
  `isAdmin` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0=not admin, 1=admin',
  `site` varchar(255) DEFAULT NULL,
  `about` varchar(255) DEFAULT NULL,
  `isBlock` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0=not block, 1=block',
  `cTime` datetime NOT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table category
# ------------------------------------------------------------

DROP TABLE IF EXISTS `category`;

CREATE TABLE `category` (
  `catid` int(11) NOT NULL AUTO_INCREMENT,
  `catName` varchar(255) NOT NULL COMMENT 'The name of category',
  `catTime` datetime DEFAULT CURRENT_TIMESTAMP COMMENT 'The time of creation',
  `catSet` int(11) NOT NULL DEFAULT '0',
  `catDesc` varchar(255) DEFAULT NULL COMMENT 'The description of category',
  PRIMARY KEY (`catid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table topic
# ------------------------------------------------------------

DROP TABLE IF EXISTS `topic`;

CREATE TABLE `topic` (
  `tid` int(11) NOT NULL AUTO_INCREMENT,
  `categoryId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` varchar(255) NOT NULL,
  `topTime` datetime NOT NULL,
  PRIMARY KEY (`tid`),
  KEY `post_topic` (`categoryId`),
  KEY `post_user` (`userId`),
  CONSTRAINT `post_topic` FOREIGN KEY (`categoryId`) REFERENCES `category` (`catid`),
  CONSTRAINT `post_user` FOREIGN KEY (`userId`) REFERENCES `user` (`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table comment
# ------------------------------------------------------------

DROP TABLE IF EXISTS `comment`;

CREATE TABLE `comment` (
  `comid` int(11) NOT NULL AUTO_INCREMENT,
  `topicId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `content` varchar(255) NOT NULL,
  `comTime` datetime NOT NULL,
  PRIMARY KEY (`comid`),
  KEY `comment_post` (`topicId`),
  KEY `comment_user` (`userId`),
  CONSTRAINT `comment_post` FOREIGN KEY (`topicId`) REFERENCES `topic` (`tid`),
  CONSTRAINT `comment_user` FOREIGN KEY (`userId`) REFERENCES `user` (`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;






/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
