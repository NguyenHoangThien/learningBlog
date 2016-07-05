# Host: localhost  (Version: 5.5.27)
# Date: 2015-12-21 21:01:36
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

#
# Data for table "articles"
#

INSERT INTO `articles` VALUES (1,'Install and configuration Laravel','This chapter will teach you how to install and configuration framework laravel.','This chapter will teach you how to install and configuration framework laravel.','<p><strong>Installing Laravel</strong></p>\r\n\r\n<p>Laravel utilizes&nbsp;<a href=\"http://getcomposer.org/\">Composer</a>&nbsp;to manage its dependencies. so,&nbsp;before using Laravel, you have to install&nbsp;Composer&nbsp;on your machine.</p>\r\n\r\n<p>After you installes Composer on your machine, you use the comand below to download laravel&nbsp;</p>\r\n\r\n<pre>\r\n<code class=\"language-nginx\">composer global require \"laravel/installer=~1.1\"</code></pre>\r\n\r\n<p>Make sure to place the&nbsp;<code>~/.composer/vendor/bin</code>&nbsp;directory in your PATH so the&nbsp;<code>laravel</code>&nbsp;executable can be located by your system. &nbsp;</p>\r\n\r\n<p>When you finished installing&nbsp;laravel on your machine. You can you some command below to create laravel project&nbsp;<br />\r\n&nbsp;</p>\r\n\r\n<pre>\r\n<code class=\"language-java\">example to create project sample :\r\n\r\nlaravel new sample \r\n\r\nor \r\n\r\ncomposer create-project laravel/laravel sample --prefer-dist </code></pre>\r\n\r\n<p>Now, let&#39;s start run start the serve by command</p>\r\n\r\n<pre>\r\n<code class=\"language-nginx\">cd sample\r\n\r\nphp artisan serve\r\n\r\nThe port default on laravel is 8000. You can change the port with :\r\n\r\nphp artisan serve --port 3000\r\n\r\nyes, it will be change to port 3000. let start with success install by access url :\r\nlocalhost:8000 or localhost:8000/public</code></pre>\r\n','2015-10-07 13:53:19','2015-12-13 15:47:13','Laravel_logo (1)5099.png','PHP,Laravel',1,3,1,1),(3,'Simple hello world with Laravel','This article will help you say hello with laravel framework','Laravel framework, hello world , sample code','<p><strong>Hello world&nbsp;Laravel !</strong></p>\r\n\r\n<p>What should you need to do to say hello world with laravel frameword is :</p>\r\n\r\n<p>Firstly, You open app\\http\\routes.php</p>\r\n\r\n<pre>\r\n<code class=\"language-php\">Route::get(\'/hello\', function () {\r\n    return view(\'welcome\');\r\n});</code></pre>\r\n\r\n<p>Secondly, you create file hello.blade.php in view and add this line below :</p>\r\n\r\n<pre>\r\n<code>{{ \'hello\' }}</code></pre>\r\n\r\n<p>Open server by command :</p>\r\n\r\n<pre>\r\n<code class=\"language-bash\">php artisan serve</code></pre>\r\n\r\n<p>It will set default port is 8888 so you can access url&nbsp;</p>\r\n\r\n<pre>\r\n<code class=\"language-bash\">http://localhost:8888/hello</code></pre>\r\n\r\n<p>&nbsp;</p>\r\n','2015-12-13 15:44:19','2015-12-13 15:44:19',NULL,'PHP,Laravel',1,3,1,0);

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
# Data for table "categories"
#

INSERT INTO `categories` VALUES (1,'This is root category','Root',NULL,1,1,NULL),(2,'PHP language','PHP','download6996.png',1,1,1),(3,'Framework of PHP','Laravel','Laravel_logo1694.png',1,1,2);

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
# Data for table "comments"
#


#
# Structure for table "migrations"
#

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

#
# Data for table "migrations"
#

INSERT INTO `migrations` VALUES ('2015_08_31_140202_create_users_table',1),('2015_08_31_140216_create_articles_table',1),('2015_08_31_140227_create_tags_table',1),('2015_08_31_140241_create_categories_table',1),('2015_08_31_140303_create_comments_table',1),('2015_08_31_140642_create_roles_table',1),('2015_12_06_144933_navigator',2);

#
# Structure for table "navigator"
#

DROP TABLE IF EXISTS `navigator`;
CREATE TABLE `navigator` (
  `navID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `navName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `navUrl` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `navActive` tinyint(4) DEFAULT NULL,
  `navSortCode` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`navID`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

#
# Data for table "navigator"
#

INSERT INTO `navigator` VALUES (1,'Home','/',1,1),(2,'About Me','/about-me',1,2),(7,'Contact','/contact',1,3);

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
# Data for table "roles"
#

INSERT INTO `roles` VALUES (1,'admin','',1),(2,'moderate','',1);

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
# Data for table "tags"
#

INSERT INTO `tags` VALUES (1,'PHP',NULL,1),(2,'Laravel',NULL,1);

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

#
# Data for table "users"
#

INSERT INTO `users` VALUES (1,'admin','hoang_thien1410@yahoo.com','1991-10-14','7FDDC3C405988EA9E37ADF19E36EB22B',NULL,NULL,NULL,'0000-00-00',1,1,1);
