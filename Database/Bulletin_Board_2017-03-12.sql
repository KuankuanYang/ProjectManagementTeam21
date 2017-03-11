# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.7.17)
# Database: Bulletin_Board
# Generation Time: 2017-03-11 23:16:37 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table article
# ------------------------------------------------------------

DROP TABLE IF EXISTS `article`;

CREATE TABLE `article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `categoryId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `title` text NOT NULL,
  `content` text NOT NULL,
  `cTime` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `post_topic` (`categoryId`),
  KEY `post_user` (`userId`),
  CONSTRAINT `post_topic` FOREIGN KEY (`categoryId`) REFERENCES `category` (`id`),
  CONSTRAINT `post_user` FOREIGN KEY (`userId`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table category
# ------------------------------------------------------------

DROP TABLE IF EXISTS `category`;

CREATE TABLE `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `catName` varchar(255) NOT NULL DEFAULT '' COMMENT 'The name of category',
  `catTime` datetime DEFAULT NULL COMMENT 'The time of creation',
  `catSet` int(11) NOT NULL DEFAULT '0',
  `catDesc` text COMMENT 'The description of category',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `category` WRITE;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;

INSERT INTO `category` (`id`, `catName`, `catTime`, `catSet`, `catDesc`)
VALUES
	(1,'Events',NULL,0,NULL),
	(2,'Shopping',NULL,0,NULL),
	(3,'Education',NULL,0,NULL),
	(4,'Health',NULL,0,NULL),
	(5,'Accommodation',NULL,0,NULL);

/*!40000 ALTER TABLE `category` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table comment
# ------------------------------------------------------------

DROP TABLE IF EXISTS `comment`;

CREATE TABLE `comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `articleId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `content` text NOT NULL,
  `cTime` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `comment_post` (`articleId`),
  KEY `comment_user` (`userId`),
  CONSTRAINT `comment_post` FOREIGN KEY (`articleId`) REFERENCES `article` (`id`),
  CONSTRAINT `comment_user` FOREIGN KEY (`userId`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table user
# ------------------------------------------------------------

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;

INSERT INTO `user` (`id`, `name`, `username`, `password`, `email`, `gender`, `isAdmin`, `site`, `about`, `isBlock`, `cTime`)
VALUES
	(7,'Yuhao','yuhao','123456','yuhao@kb.com','male',0,NULL,NULL,0,'2017-03-11 22:19:11');

/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
