# ************************************************************
# Sequel Pro SQL dump
# Version 4004
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: 127.0.0.1 (MySQL 5.5.25)
# Database: mdd1303
# Generation Time: 2013-03-29 18:33:38 -0500
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `userId` int(11) NOT NULL AUTO_INCREMENT,
  `userName` varchar(25) NOT NULL DEFAULT '',
  `userPass` char(32) NOT NULL,
  `userFullName` varchar(40) NOT NULL,
  `userSalt` char(8) DEFAULT NULL,
  `userEmail` varchar(40) NOT NULL DEFAULT '',
  PRIMARY KEY (`userId`),
  UNIQUE KEY `UX_name` (`userName`),
  UNIQUE KEY `UX_name_pass` (`userName`,`userPass`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`userId`, `userName`, `userPass`, `userFullName`, `userSalt`, `userEmail`)
VALUES
	(1,'direwolf','94fe648734e13df333c6a173b15682f6','Ned Stark','Gdjia73k','stark@north.com'),
	(2,'stag','62c51635864c9c8b18ef305c7e06eb50','Robert Baratheon','ru47OISg','rbar@stormsend.com'),
	(3,'dragon','cc507dfc09b0327f09665f1398fa1ab6','Rhaegar Targaryan','75qoWiet','rhatar@kingslanding.com'),
	(4,'lion','18fc52309fd55e20b479e6e052327739','Tywin Lannister','AgGoa84t','tyWIN@casterlyrock.com'),
	(5,'lightningbolt','677545f5624e3183a3d83ee9fc5da631','Beric Dondarrion','tcZPgLNM','lightninglord@blackhaven.com');

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
