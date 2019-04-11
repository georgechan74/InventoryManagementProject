# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.7.23)
# Database: acwm2
# Generation Time: 2019-03-27 03:15:15 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table APPLICATION_INFORMATION
# ------------------------------------------------------------

DROP TABLE IF EXISTS `APPLICATION_INFORMATION`;

CREATE TABLE `APPLICATION_INFORMATION` (
  `UID` varchar(256) NOT NULL,
  `NAME` varchar(256) NOT NULL,
  `ACRONYMN` varchar(16) DEFAULT NULL,
  `BUREAU_CODE` varchar(5) NOT NULL,
  `DIVISION_CODE` varchar(5) NOT NULL,
  `STATUS` varchar(1) NOT NULL DEFAULT 'A',
  PRIMARY KEY (`UID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `APPLICATION_INFORMATION` WRITE;
/*!40000 ALTER TABLE `APPLICATION_INFORMATION` DISABLE KEYS */;

INSERT INTO `APPLICATION_INFORMATION` (`UID`, `NAME`, `ACRONYMN`, `BUREAU_CODE`, `DIVISION_CODE`, `STATUS`)
VALUES
	('13347394-82b3-11e7-b36c-005056a5b2f3','INVENTORY','INVENTORY_DA','','','A'),
	('a83d9728-82c1-11e7-b36c-005056a5b2f3','ICS','ICS_APPLICATION','','','A'),
	('ea88d656-82c1-11e7-b36c-005056a5b2f3','ICS BUD','ICS_APPLICATIONB','','','A');

/*!40000 ALTER TABLE `APPLICATION_INFORMATION` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table APPLICATION_INFORMATION_LISTS
# ------------------------------------------------------------

DROP TABLE IF EXISTS `APPLICATION_INFORMATION_LISTS`;

CREATE TABLE `APPLICATION_INFORMATION_LISTS` (
  `APP_UID` varchar(255) DEFAULT NULL,
  `UID` varchar(255) DEFAULT NULL,
  `NAME` varchar(128) DEFAULT NULL,
  `KLAVEM` varchar(64) DEFAULT NULL,
  `VALUE` varchar(64) DEFAULT NULL,
  `STATUS` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='KLAVEM column = KEY, taken from the latin CLAVEN meaning key';

LOCK TABLES `APPLICATION_INFORMATION_LISTS` WRITE;
/*!40000 ALTER TABLE `APPLICATION_INFORMATION_LISTS` DISABLE KEYS */;

INSERT INTO `APPLICATION_INFORMATION_LISTS` (`APP_UID`, `UID`, `NAME`, `KLAVEM`, `VALUE`, `STATUS`)
VALUES
	('ca7c0c7a-82c1-11e7-b36c-005056a5b2f3','cbbfb894-1c1c-11e8-92d4-005056a5b2f3','FISCAL_YEAR',NULL,'2018','A'),
	('ca7c0c7a-82c1-11e7-b36c-005056a5b2f3','ca7c0c7a-82c1-11e7-b36c-005056a5b2f3','FISCAL_YEAR',NULL,'2017','A'),
	('ca7c0c7a-82c1-11e7-b36c-005056a5b2f3','cbbfbb8c-1c1c-11e8-92d4-005056a5b2f3','FISCAL_YEAR',NULL,'2016','A'),
	('ca7c0c7a-82c1-11e7-b36c-005056a5b2f3','ca7c0c7a-82c1-11e7-b36c-005056a5b2f3','FISCAL_YEAR',NULL,'2015','A');

/*!40000 ALTER TABLE `APPLICATION_INFORMATION_LISTS` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table APPLICATION_ROLES
# ------------------------------------------------------------

DROP TABLE IF EXISTS `APPLICATION_ROLES`;

CREATE TABLE `APPLICATION_ROLES` (
  `UID` varchar(256) DEFAULT NULL,
  `APPLICATION_UID` varchar(256) DEFAULT NULL,
  `ROLE_UID` varchar(256) DEFAULT NULL,
  `STATUS` varchar(1) DEFAULT 'A'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `APPLICATION_ROLES` WRITE;
/*!40000 ALTER TABLE `APPLICATION_ROLES` DISABLE KEYS */;

INSERT INTO `APPLICATION_ROLES` (`UID`, `APPLICATION_UID`, `ROLE_UID`, `STATUS`)
VALUES
	('8a6ffeb4-82c3-11e7-b36c-005056a5b2f3','13347394-82b3-11e7-b36c-005056a5b2f3','59a6ceaa-7d1b-11e7-b36c-005056a5b2f3','A'),
	('8a70063e-82c3-11e7-b36c-005056a5b2f3','13347394-82b3-11e7-b36c-005056a5b2f3','43cdc4c6-7d1b-11e7-b36c-005056a5b2f3','A'),
	('8a700d28-82c3-11e7-b36c-005056a5b2f3','13347394-82b3-11e7-b36c-005056a5b2f3','43cdc4c6-7d1b-11e7-b36c-005056a5b2f3',''),
	('8a6ffc8e-82c3-11e7-b36c-005056a5b2f3','13347394-82b3-11e7-b36c-005056a5b2f3','43cdc4c6-7d1b-11e7-b36c-005056a5b2f3','A');

/*!40000 ALTER TABLE `APPLICATION_ROLES` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table asset
# ------------------------------------------------------------

DROP TABLE IF EXISTS `asset`;

CREATE TABLE `asset` (
  `GUID` int(11) NOT NULL,
  `LOCATION` varchar(255) NOT NULL,
  `ASSIGNEE` varchar(255) NOT NULL,
  `DESCRIPTION` varchar(255) NOT NULL,
  `MAKE` varchar(255) NOT NULL,
  `MODEL` varchar(255) NOT NULL,
  `SERIALNO` varchar(255) NOT NULL,
  `COUNTYNO` int(11) NOT NULL,
  `ACDATE` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `COST` varchar(255) NOT NULL,
  `COMMENTS` varchar(255) NOT NULL,
  `STATUS` varchar(1) NOT NULL,
  `CATEGORY` varchar(255) NOT NULL,
  `BINVENT` int(11) NOT NULL,
  `SUBLOCATION` varchar(255) NOT NULL,
  `BUREAU` varchar(255) NOT NULL,
  PRIMARY KEY (`GUID`),
  UNIQUE KEY `SERIALNO` (`SERIALNO`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `asset` WRITE;
/*!40000 ALTER TABLE `asset` DISABLE KEYS */;

INSERT INTO `asset` (`GUID`, `LOCATION`, `ASSIGNEE`, `DESCRIPTION`, `MAKE`, `MODEL`, `SERIALNO`, `COUNTYNO`, `ACDATE`, `COST`, `COMMENTS`, `STATUS`, `CATEGORY`, `BINVENT`, `SUBLOCATION`, `BUREAU`)
VALUES
	(1,'Arcadia','Unassigned','black','Chevy','Silverado','123456',65432,'2019-01-29 03:34:50','111456','N/A','F','Trailer',18740,'N/A','Admin'),
	(2,'Arcadia','Unassigned','Blue','Nissan','GTR','HN3456XV',65432,'2019-01-29 11:34:50','$221,456.00','N/A','F','Trailer',18740,'N/A','Admin'),
	(3,'South Gate','Unassigned','Red','Ford','F150','1JNK456',65432,'2019-01-29 11:34:50','$32,456.00','N/A','F','Trailer',18740,'N/A','Admin'),
	(6,'Arcadia','Unassigned','Blue','Nissan','GTR','HWER456XV',65432,'2019-01-29 11:34:50','$221,456.00','N/A','F','Trailer',18740,'N/A','Admin'),
	(7,'South Gate','Unassigned','Red','Ford','F150','1JIJH56',65432,'2019-01-29 11:34:50','$32,456.00','N/A','F','Trailer',18740,'N/A','Admin'),
	(8,'Arcadia','Unassigned','black','Chevy','Silverado','12BHJ56',65432,'2019-01-29 11:34:50','$233,456.00','Small Conf Rm','F','Audio Visual',18740,'Small Conf Rm','Admin'),
	(30,'Arcadia','Unassigned','Blue','Nissan','GTR','HCVBN6XV',65432,'2019-01-29 11:34:50','$221,456.00','N/A','F','Trailer',18740,'N/A','Admin'),
	(40,'South Gate','Unassigned','Red','Ford','F150','1V45456',65432,'2019-01-29 11:34:50','$32,456.00','N/A','F','Trailer',18740,'N/A','Admin'),
	(50,'Arcadia','Unassigned','black','Chevy','Silverado','VGH7654',65432,'2019-01-29 11:34:50','$233,456.00','Small Conf Rm','F','Audio Visual',18740,'Small Conf Rm','Admin');

/*!40000 ALTER TABLE `asset` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table b_invent_unitcodes
# ------------------------------------------------------------

DROP TABLE IF EXISTS `b_invent_unitcodes`;

CREATE TABLE `b_invent_unitcodes` (
  `B_INVENT_UNITCODE` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `b_invent_unitcodes` WRITE;
/*!40000 ALTER TABLE `b_invent_unitcodes` DISABLE KEYS */;

INSERT INTO `b_invent_unitcodes` (`B_INVENT_UNITCODE`)
VALUES
	(18732),
	(18740),
	(18742),
	(18743);

/*!40000 ALTER TABLE `b_invent_unitcodes` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table bureaus
# ------------------------------------------------------------

DROP TABLE IF EXISTS `bureaus`;

CREATE TABLE `bureaus` (
  `BUREAU` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `bureaus` WRITE;
/*!40000 ALTER TABLE `bureaus` DISABLE KEYS */;

INSERT INTO `bureaus` (`BUREAU`)
VALUES
	('ADMIN');

/*!40000 ALTER TABLE `bureaus` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table funding_orgs
# ------------------------------------------------------------

DROP TABLE IF EXISTS `funding_orgs`;

CREATE TABLE `funding_orgs` (
  `FUNDING_ORG_NO` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `funding_orgs` WRITE;
/*!40000 ALTER TABLE `funding_orgs` DISABLE KEYS */;

INSERT INTO `funding_orgs` (`FUNDING_ORG_NO`)
VALUES
	(18743);

/*!40000 ALTER TABLE `funding_orgs` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table items
# ------------------------------------------------------------

DROP TABLE IF EXISTS `items`;

CREATE TABLE `items` (
  `GUID` varchar(255) NOT NULL,
  `VNO` int(11) NOT NULL,
  `LOCATION` varchar(255) NOT NULL,
  `ASSIGNEE` varchar(255) DEFAULT NULL,
  `DESCRIPTION` varchar(255) DEFAULT NULL,
  `MAKE` varchar(255) NOT NULL,
  `MODEL` varchar(255) DEFAULT NULL,
  `SERIAL_NO` varchar(255) DEFAULT NULL,
  `COUNTY_NO` varchar(255) DEFAULT NULL,
  `ACQ_DATE` date DEFAULT NULL,
  `COST` decimal(10,0) DEFAULT NULL,
  `COMMENTS` varchar(255) DEFAULT NULL,
  `STATUS_` varchar(255) NOT NULL,
  `CATEGORY` varchar(255) NOT NULL,
  `B_INVENT_CODE` int(11) NOT NULL,
  `SUBLOCATION` varchar(255) DEFAULT NULL,
  `BUREAU` varchar(255) NOT NULL,
  `ASSIGNED_TO` varchar(255) DEFAULT NULL,
  `LICENSE` varchar(255) NOT NULL,
  `YEAR_NO` int(11) NOT NULL,
  `VIN` varchar(255) NOT NULL,
  `UNIT` int(11) NOT NULL,
  `FUNDING_ORG` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table locations
# ------------------------------------------------------------

DROP TABLE IF EXISTS `locations`;

CREATE TABLE `locations` (
  `LOCATION` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `locations` WRITE;
/*!40000 ALTER TABLE `locations` DISABLE KEYS */;

INSERT INTO `locations` (`LOCATION`)
VALUES
	('Arcadia'),
	('Arcadia Hq'),
	('Metro Office'),
	('Olive View'),
	('South Gate');

/*!40000 ALTER TABLE `locations` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table makes
# ------------------------------------------------------------

DROP TABLE IF EXISTS `makes`;

CREATE TABLE `makes` (
  `MAKE` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `makes` WRITE;
/*!40000 ALTER TABLE `makes` DISABLE KEYS */;

INSERT INTO `makes` (`MAKE`)
VALUES
	('Ford'),
	('Infiniti'),
	('Toyota');

/*!40000 ALTER TABLE `makes` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table ROLES
# ------------------------------------------------------------

DROP TABLE IF EXISTS `ROLES`;

CREATE TABLE `ROLES` (
  `UID` varchar(2000) DEFAULT NULL,
  `ROLE` varchar(2000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `ROLES` WRITE;
/*!40000 ALTER TABLE `ROLES` DISABLE KEYS */;

INSERT INTO `ROLES` (`UID`, `ROLE`)
VALUES
	('43cdc4c6-7d1b-11e7-b36c-005056a5b2f3','USER'),
	('59a6ceaa-7d1b-11e7-b36c-005056a5b2f3','MANAGER'),
	('5e72c1dc-7d1b-11e7-b36c-005056a5b2f3','ADMIN'),
	('5e72c1dc-7d1b-11e7-b36c-005056a5b2f3','ASUser'),
	('5e72c1dc-7d1b-11e7-b36c-005056a5b2f3','EPUser'),
	('5e72c1dc-7d1b-11e7-b36c-005056a5b2f3','PEPQUser'),
	('5e72c1dc-7d1b-11e7-b36c-005056a5b2f3','WHPMUser'),
	('5e72c1dc-7d1b-11e7-b36c-005056a5b2f3','WMUser'),
	('5e72c1dc-7d1b-11e7-b36c-005056a5b2f3','BFUser'),
	('43cdc4c6-7d1b-11e7-b36c-005056a5b2f3','MANAGER'),
	('43cdc4c6-7d1b-11e7-b36c-005056a5b2f3','ADMIN');

/*!40000 ALTER TABLE `ROLES` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table ROLES2
# ------------------------------------------------------------

DROP TABLE IF EXISTS `ROLES2`;

CREATE TABLE `ROLES2` (
  `username` varchar(256) NOT NULL DEFAULT '',
  `role` varchar(128) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `ROLES2` WRITE;
/*!40000 ALTER TABLE `ROLES2` DISABLE KEYS */;

INSERT INTO `ROLES2` (`username`, `role`)
VALUES
	('asiri','user'),
	('bdebilzan','user'),
	('george','admin'),
	('mario','user'),
	('moises','manager'),
	('bdebilzan','admin'),
	('bdebilzan','manager'),
	('john','manger'),
	('polo','user'),
	('george1','admin'),
	('bdebilz','manager'),
	('asiri','user'),
	('asiri','user'),
	('george1','manager'),
	('check','manager'),
	('check','user'),
	('check','admin'),
	('check1','admin'),
	('john','manager'),
	('john2','manager'),
	('john2','user'),
	('john2','user'),
	('asiri','user'),
	('john2','user'),
	('john3','user'),
	('43cdc4c6-7d1b-11e7-b36c-005056a5b2f3','user');

/*!40000 ALTER TABLE `ROLES2` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table statuses
# ------------------------------------------------------------

DROP TABLE IF EXISTS `statuses`;

CREATE TABLE `statuses` (
  `STATUS_` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `statuses` WRITE;
/*!40000 ALTER TABLE `statuses` DISABLE KEYS */;

INSERT INTO `statuses` (`STATUS_`)
VALUES
	('F'),
	('P');

/*!40000 ALTER TABLE `statuses` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table units
# ------------------------------------------------------------

DROP TABLE IF EXISTS `units`;

CREATE TABLE `units` (
  `UNIT_NO` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `units` WRITE;
/*!40000 ALTER TABLE `units` DISABLE KEYS */;

INSERT INTO `units` (`UNIT_NO`)
VALUES
	(18743);

/*!40000 ALTER TABLE `units` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table USER_ROLES
# ------------------------------------------------------------

DROP TABLE IF EXISTS `USER_ROLES`;

CREATE TABLE `USER_ROLES` (
  `EMPLOYEE_ID` varchar(12) NOT NULL,
  `ROLE_UID` varchar(256) NOT NULL,
  `GRANTABLE` varchar(1) DEFAULT 'N',
  `STATUS` varchar(1) DEFAULT 'A'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `USER_ROLES` WRITE;
/*!40000 ALTER TABLE `USER_ROLES` DISABLE KEYS */;

INSERT INTO `USER_ROLES` (`EMPLOYEE_ID`, `ROLE_UID`, `GRANTABLE`, `STATUS`)
VALUES
	('415506','8a6ffc8e-82c3-11e7-b36c-005056a5b2f3','Y','A'),
	('634774','8a70063e-82c3-11e7-b36c-005056a5b2f3','N','A'),
	('123456','43cdc4c6-7d1b-11e7-b36c-005056a5b2f3','N','A'),
	('537954','8a6ffeb4-82c3-11e7-b36c-005056a5b2f3','Y','A');

/*!40000 ALTER TABLE `USER_ROLES` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table vehicle
# ------------------------------------------------------------

DROP TABLE IF EXISTS `vehicle`;

CREATE TABLE `vehicle` (
  `GUID` varchar(255) NOT NULL,
  `VNO` int(11) NOT NULL,
  `ASSIGNEDTO` varchar(255) NOT NULL,
  `LICENSE` varchar(255) NOT NULL,
  `MAKE` varchar(255) NOT NULL,
  `MODEL` varchar(255) NOT NULL,
  `YEAR` int(4) NOT NULL,
  `HOUSED` varchar(255) NOT NULL,
  `VIN` varchar(255) NOT NULL,
  `UNIT` varchar(255) NOT NULL,
  `DESCRIPTION` varchar(255) NOT NULL,
  `BUREAU` varchar(255) NOT NULL,
  `FUNDINGORG` varchar(255) NOT NULL,
  PRIMARY KEY (`GUID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `vehicle` WRITE;
/*!40000 ALTER TABLE `vehicle` DISABLE KEYS */;

INSERT INTO `vehicle` (`GUID`, `VNO`, `ASSIGNEDTO`, `LICENSE`, `MAKE`, `MODEL`, `YEAR`, `HOUSED`, `VIN`, `UNIT`, `DESCRIPTION`, `BUREAU`, `FUNDINGORG`)
VALUES
	('1',1,'Unassigned ','1234ABR','Honda','Accord',2019,'South Gate','456789VGHJKLON','46576','Black','Admin','18456'),
	('10',7812,'Unassigned','681BHN1','Nissan','Titans',2011,'South Gate','BGUIKJH12345','11111','Blue','Admin','11111'),
	('11',7831,'Unassigned ','098HJK12','Dodge','Ram',2010,'Arcadia ','BVGYUK12345','11111','Red','Admin','11111'),
	('12',1226,'Unassigned ','FGBN123','Toyota','Tundra',2013,'Acardia','VGH987654BVG','22222','White','Admin','22222'),
	('2',3,'Unassigned ','543GHJM','Ford','F150',2010,'HQ','123456DCVGHRS','18456','Red','Admin','46943'),
	('3',465,'Unassigned','137GJK2','Chevy','Silverado ',2009,'Arcadia','98765FGHJA','18542','Blue','Admin','18542'),
	('4',4,'Unassigned ','543GHJM','BMW','M6',2016,'HQ','456789VGHJKLON','18456','Black','Admin','46943'),
	('5',520,'Moises','TOOFAST','Nissan','R-35',2016,'Arcadia','1234567NHGDSXCV','16782','Blue','Admin','16782'),
	('6',235,'Unassigned ','543BHJ2','BMW ','M5',2010,'South Gate','NJHNI123987WX','16723','White','Admin','16723'),
	('7',190,'Unassigned ','FY232IK','Tesla','Model S',2014,'HQ','56789VFTYUKM','14522','Red','Admin','14522'),
	('8',1234,'Unassigned','610JHB2','Ford','F250',2011,'South Gate','BVGHJL12345678','18452','Black','Admin','18452'),
	('9',525,'Unassigned','78NJIB2','Chevy','Malibu',2013,'Arcadia','GYJKOIU234567','18451','White','Admin ','18021');

/*!40000 ALTER TABLE `vehicle` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table years
# ------------------------------------------------------------

DROP TABLE IF EXISTS `years`;

CREATE TABLE `years` (
  `YEAR_NO` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `years` WRITE;
/*!40000 ALTER TABLE `years` DISABLE KEYS */;

INSERT INTO `years` (`YEAR_NO`)
VALUES
	(2018),
	(2019);

/*!40000 ALTER TABLE `years` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
