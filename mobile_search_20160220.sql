# ************************************************************
# Sequel Pro SQL dump
# Version 4529
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: localhost (MySQL 5.7.9)
# Database: mobile_search
# Generation Time: 2016-02-20 14:53:29 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table brands
# ------------------------------------------------------------

CREATE TABLE IF NOT EXISTS `brands` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `brands` WRITE;
/*!40000 ALTER TABLE `brands` DISABLE KEYS */;

INSERT INTO `brands` (`id`, `name`, `created_at`, `updated_at`)
VALUES
	(1,'Apple','2016-02-20 22:51:25',NULL),
	(2,'Sony','2016-02-20 22:51:25',NULL),
	(3,'HTC','2016-02-20 22:51:25',NULL),
	(4,'LG','2016-02-20 22:51:25',NULL);

/*!40000 ALTER TABLE `brands` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table migrations
# ------------------------------------------------------------

CREATE TABLE IF NOT EXISTS  `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;

INSERT INTO `migrations` (`migration`, `batch`)
VALUES
	('2014_10_12_000000_create_users_table',1),
	('2014_10_12_100000_create_password_resets_table',2),
	('2016_02_20_141453_create_mobiles_table',3),
	('2016_02_20_142119_create_brands_table',4),
	('2016_02_20_142426_add_mobile_fk_on_brand_id',5);

/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table mobiles
# ------------------------------------------------------------

CREATE TABLE IF NOT EXISTS `mobiles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `monitor_size` double(8,2) NOT NULL,
  `weight` int(10) unsigned NOT NULL,
  `rom` int(10) unsigned NOT NULL,
  `camera_pixel` int(10) unsigned NOT NULL,
  `has_memory_slot` tinyint(1) NOT NULL,
  `pic` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `brand_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `mobiles_brand_id_foreign` (`brand_id`),
  CONSTRAINT `mobiles_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `mobiles` WRITE;
/*!40000 ALTER TABLE `mobiles` DISABLE KEYS */;

INSERT INTO `mobiles` (`id`, `name`, `monitor_size`, `weight`, `rom`, `camera_pixel`, `has_memory_slot`, `pic`, `brand_id`, `created_at`, `updated_at`)
VALUES
	(1,'Apple iPhone 6s Plus',5.50,192,16,1200,0,'http://cdn2.gsmarena.com/vv/bigpic/apple-iphone-6s-plus.jpg',1,'2016-02-20 22:51:41',NULL),
	(2,'Apple iPhone 6s Plus',5.50,192,64,1200,0,'http://cdn2.gsmarena.com/vv/bigpic/apple-iphone-6s-plus.jpg',1,'2016-02-20 22:51:41',NULL),
	(3,'Apple iPhone 6s Plus',5.50,192,128,1200,0,'http://cdn2.gsmarena.com/vv/bigpic/apple-iphone-6s-plus.jpg',1,'2016-02-20 22:51:41',NULL),
	(4,'Apple iPhone 6s',4.70,143,16,1200,0,'http://cdn2.gsmarena.com/vv/bigpic/apple-iphone-6s1.jpg',1,'2016-02-20 22:51:41',NULL),
	(5,'Apple iPhone 6s',4.70,143,64,1200,0,'http://cdn2.gsmarena.com/vv/bigpic/apple-iphone-6s1.jpg',1,'2016-02-20 22:51:41',NULL),
	(6,'Apple iPhone 6s',4.70,143,128,1200,0,'http://cdn2.gsmarena.com/vv/bigpic/apple-iphone-6s1.jpg',1,'2016-02-20 22:51:41',NULL),
	(7,'Apple iPhone 5s',4.00,112,16,800,0,'http://cdn2.gsmarena.com/vv/bigpic/apple-iphone-5s-ofic.jpg',1,'2016-02-20 22:51:41',NULL),
	(8,'Apple iPhone 5s',4.00,112,32,800,0,'http://cdn2.gsmarena.com/vv/bigpic/apple-iphone-5s-ofic.jpg',1,'2016-02-20 22:51:41',NULL),
	(9,'Apple iPhone 5s',4.00,112,64,800,0,'http://cdn2.gsmarena.com/vv/bigpic/apple-iphone-5s-ofic.jpg',1,'2016-02-20 22:51:41',NULL),
	(10,'Apple iPhone 5c',4.00,132,8,800,0,'http://cdn2.gsmarena.com/vv/bigpic/apple-iphone-5c-new2.jpg',1,'2016-02-20 22:51:41',NULL),
	(11,'Apple iPhone 5c',4.00,132,16,800,0,'http://cdn2.gsmarena.com/vv/bigpic/apple-iphone-5c-new2.jpg',1,'2016-02-20 22:51:41',NULL),
	(12,'Apple iPhone 5c',4.00,132,32,800,0,'http://cdn2.gsmarena.com/vv/bigpic/apple-iphone-5c-new2.jpg',1,'2016-02-20 22:51:41',NULL),
	(13,'Apple iPhone 4s',3.50,140,8,800,0,'http://cdn2.gsmarena.com/vv/bigpic/apple-iphone-4s-new.jpg',1,'2016-02-20 22:51:41',NULL),
	(14,'Apple iPhone 4s',3.50,140,16,800,0,'http://cdn2.gsmarena.com/vv/bigpic/apple-iphone-4s-new.jpg',1,'2016-02-20 22:51:41',NULL),
	(15,'Apple iPhone 4s',3.50,140,32,800,0,'http://cdn2.gsmarena.com/vv/bigpic/apple-iphone-4s-new.jpg',1,'2016-02-20 22:51:41',NULL),
	(16,'Apple iPhone 4s',3.50,140,64,800,0,'http://cdn2.gsmarena.com/vv/bigpic/apple-iphone-4s-new.jpg',1,'2016-02-20 22:51:41',NULL),
	(17,'Apple iPhone 4',3.50,137,8,500,0,'http://cdn2.gsmarena.com/vv/bigpic/apple-iphone-4-ofic-final.jpg',1,'2016-02-20 22:51:41',NULL),
	(18,'Apple iPhone 4',3.50,137,16,500,0,'http://cdn2.gsmarena.com/vv/bigpic/apple-iphone-4-ofic-final.jpg',1,'2016-02-20 22:51:41',NULL),
	(19,'Apple iPhone 4',3.50,137,32,500,0,'http://cdn2.gsmarena.com/vv/bigpic/apple-iphone-4-ofic-final.jpg',1,'2016-02-20 22:51:41',NULL),
	(20,'Sony Xperia Z5 Premium',5.50,180,32,2300,1,'http://cdn2.gsmarena.com/vv/bigpic/sony-z5-premium-.jpg',2,'2016-02-20 22:51:41',NULL),
	(21,'Sony Xperia Z5 Compact',4.60,138,32,2300,1,'http://cdn2.gsmarena.com/vv/bigpic/sony-z5-compact-.jpg',2,'2016-02-20 22:51:41',NULL),
	(22,'Sony Xperia M5 Dual',5.00,142,16,2100,1,'http://cdn2.gsmarena.com/vv/bigpic/sony-xperia-m5.jpg',2,'2016-02-20 22:51:41',NULL),
	(23,'Sony Xperia C4',5.50,147,16,1300,1,'http://cdn2.gsmarena.com/vv/bigpic/sony-xperia-c4-new.jpg',2,'2016-02-20 22:51:41',NULL),
	(24,'Sony Xperia Z3+',5.20,144,32,2000,1,'http://cdn2.gsmarena.com/vv/bigpic/sony-xperia-z4.jpg',2,'2016-02-20 22:51:41',NULL),
	(25,'Sony Xperia T3',5.30,148,8,800,1,'http://cdn2.gsmarena.com/vv/bigpic/sony-xperia-t3.jpg',2,'2016-02-20 22:51:41',NULL),
	(26,'Sony Xperia E1',4.00,120,4,300,1,'http://cdn2.gsmarena.com/vv/bigpic/sony-xperia-e1.jpg',2,'2016-02-20 22:51:41',NULL),
	(27,'Sony Xperia Z2',5.20,163,16,2000,1,'http://cdn2.gsmarena.com/vv/bigpic/sony-xperia-z2-new.jpg',2,'2016-02-20 22:51:41',NULL),
	(28,'HTC One X9',5.50,170,32,1300,1,'http://cdn2.gsmarena.com/vv/bigpic/htc-one-x9-.jpg',3,'2016-02-20 22:51:41',NULL),
	(29,'HTC One X9',5.50,170,64,1300,1,'http://cdn2.gsmarena.com/vv/bigpic/htc-one-x9-.jpg',3,'2016-02-20 22:51:41',NULL),
	(30,'HTC One M9s',5.00,158,16,1300,1,'http://cdn2.gsmarena.com/vv/bigpic/htc-one-m9s-.jpg',3,'2016-02-20 22:51:41',NULL),
	(31,'HTC One M9s',5.00,158,32,1300,1,'http://cdn2.gsmarena.com/vv/bigpic/htc-one-m9s-.jpg',3,'2016-02-20 22:51:41',NULL),
	(32,'HTC One ME',5.20,155,32,2000,1,'http://cdn2.gsmarena.com/vv/bigpic/htc-one-me.jpg',3,'2016-02-20 22:51:41',NULL),
	(33,'HTC Desire 620 dual sim',5.00,160,8,800,1,'http://cdn2.gsmarena.com/vv/bigpic/htc-desire-620.jpg',3,'2016-02-20 22:51:41',NULL),
	(34,'HTC Butterfly 2',5.00,151,16,1300,1,'http://cdn2.gsmarena.com/vv/bigpic/htc-butterfly-2-new.jpg',3,'2016-02-20 22:51:41',NULL),
	(35,'HTC Butterfly 2',5.00,151,32,1300,1,'http://cdn2.gsmarena.com/vv/bigpic/htc-butterfly-2-new.jpg',3,'2016-02-20 22:51:41',NULL),
	(36,'HTC One (M8)',5.00,160,16,400,1,'http://cdn2.gsmarena.com/vv/bigpic/htc-one-m8.jpg',3,'2016-02-20 22:51:41',NULL),
	(37,'HTC One (M8)',5.00,160,32,400,1,'http://cdn2.gsmarena.com/vv/bigpic/htc-one-m8.jpg',3,'2016-02-20 22:51:41',NULL),
	(38,'HTC Desire L',4.30,118,4,500,1,'http://cdn2.gsmarena.com/vv/bigpic/htc-desire-l.jpg',3,'2016-02-20 22:51:41',NULL),
	(39,'HTC DROID DNA',5.00,141,16,800,0,'http://cdn2.gsmarena.com/vv/bigpic/htc-droid-dna-new.jpg',3,'2016-02-20 22:51:41',NULL),
	(40,'LG K8',5.00,157,8,800,1,'http://cdn2.gsmarena.com/vv/bigpic/lg-k8.jpg',4,'2016-02-20 22:51:41',NULL),
	(41,'LG Stylus 2',5.70,145,16,1300,1,'http://cdn2.gsmarena.com/vv/bigpic/lg-stylus-2.jpg',4,'2016-02-20 22:51:41',NULL),
	(42,'LG K4',4.50,120,8,500,1,'http://cdn2.gsmarena.com/vv/bigpic/lg-k4-.jpg',4,'2016-02-20 22:51:41',NULL),
	(43,'LG G4',5.50,155,32,1600,1,'http://cdn2.gsmarena.com/vv/bigpic/lg-g4-.jpg',4,'2016-02-20 22:51:41',NULL),
	(44,'LG G Flex2',5.50,152,16,1300,1,'http://cdn2.gsmarena.com/vv/bigpic/lg-g-flex2.jpg',4,'2016-02-20 22:51:41',NULL),
	(45,'LG G2 Lite',4.50,153,4,800,1,'http://cdn2.gsmarena.com/vv/bigpic/lg-g2-lite-d295.jpg',4,'2016-02-20 22:51:41',NULL),
	(46,'LG Spirit',4.70,124,8,800,1,'http://cdn2.gsmarena.com/vv/bigpic/lg-spirit1.jpg',4,'2016-02-20 22:51:41',NULL),
	(47,'LG G3 Stylus',5.50,163,8,1300,1,'http://cdn2.gsmarena.com/vv/bigpic/lg-g3-stylus.jpg',4,'2016-02-20 22:51:41',NULL),
	(48,'LG G3',5.50,149,16,1300,1,'http://cdn2.gsmarena.com/vv/bigpic/lg-g3-1.jpg',4,'2016-02-20 22:51:41',NULL),
	(49,'LG G3 S Dual',5.00,134,8,800,1,'http://cdn2.gsmarena.com/vv/bigpic/lg-g3-s.jpg',4,'2016-02-20 22:51:41',NULL);

/*!40000 ALTER TABLE `mobiles` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table password_resets
# ------------------------------------------------------------

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



# Dump of table users
# ------------------------------------------------------------

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;




/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
