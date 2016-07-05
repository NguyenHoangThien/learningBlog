# Host: localhost  (Version: 5.5.27)
# Date: 2015-12-06 21:47:51
# Generator: MySQL-Front 5.3  (Build 4.89)

/*!40101 SET NAMES utf8 */;

#
# Structure for table "articles"
#

DROP TABLE IF EXISTS `articles`;
CREATE TABLE `articles` (
  `aID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `aTitle` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `aDescription` text COLLATE utf8_unicode_ci,
  `aMeta` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `aContent` text COLLATE utf8_unicode_ci NOT NULL,
  `aCreatedDate` datetime NOT NULL,
  `aUpdatedDate` datetime NOT NULL,
  `aImage` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `aTag` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `uID` int(11) NOT NULL,
  `cID` int(11) NOT NULL,
  `aIsActive` tinyint(4) NOT NULL,
  `sortCode` int(11) DEFAULT NULL,
  PRIMARY KEY (`aID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

#
# Structure for table "categories"
#

DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `cID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cDescription` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cIcon` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cIsActive` tinyint(4) NOT NULL,
  `cLevel` int(11) NOT NULL DEFAULT '1',
  `cParentID` int(11) DEFAULT NULL,
  PRIMARY KEY (`cID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

#
# Structure for table "comments"
#

DROP TABLE IF EXISTS `comments`;
CREATE TABLE `comments` (
  `comID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `comTitle` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `comContent` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `aID` int(11) NOT NULL,
  `uID` int(11) NOT NULL,
  `dateComment` datetime NOT NULL,
  PRIMARY KEY (`comID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

#
# Structure for table "migrations"
#

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

#
# Structure for table "roles"
#

DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles` (
  `rID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `rName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `rDescription` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `rIsActive` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`rID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

#
# Structure for table "tags"
#

DROP TABLE IF EXISTS `tags`;
CREATE TABLE `tags` (
  `tID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tDescription` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tIsActive` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`tID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

#
# Structure for table "users"
#

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `uID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uUsername` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `uEmail` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `uBirthday` date DEFAULT NULL,
  `uPassword` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `uAvatar` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `uAddress` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `uPhone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `uRegisteredDate` date NOT NULL,
  `uIsActive` tinyint(4) NOT NULL,
  `uGender` tinyint(4) DEFAULT NULL,
  `uRole` int(11) NOT NULL,
  PRIMARY KEY (`uID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
