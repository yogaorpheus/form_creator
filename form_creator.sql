/*
SQLyog Ultimate v12.09 (32 bit)
MySQL - 10.1.13-MariaDB : Database - form_creator
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`form_creator` /*!40100 DEFAULT CHARACTER SET latin1 */;

/*Table structure for table `attribute` */

DROP TABLE IF EXISTS `attribute`;

CREATE TABLE `attribute` (
  `id_attribute` int(11) NOT NULL AUTO_INCREMENT,
  `code_attribute` varchar(32) NOT NULL,
  `show_attribute` varchar(64) NOT NULL,
  PRIMARY KEY (`id_attribute`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `attribute` */

/*Table structure for table `input_type` */

DROP TABLE IF EXISTS `input_type`;

CREATE TABLE `input_type` (
  `id_input_type` int(11) NOT NULL AUTO_INCREMENT,
  `id_tag` int(11) NOT NULL,
  `code_input_type` varchar(32) NOT NULL,
  `show_input_type` varchar(64) NOT NULL,
  PRIMARY KEY (`id_input_type`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `input_type` */

insert  into `input_type`(`id_input_type`,`id_tag`,`code_input_type`,`show_input_type`) values (1,1,'text','Plain Text'),(2,1,'password','Password'),(3,1,'radio','Radio Button'),(4,1,'file','File'),(5,1,'checkbox','Checkbox'),(6,1,'number','Number'),(7,2,'','Text Area'),(8,3,'','Select Option');

/*Table structure for table `tag` */

DROP TABLE IF EXISTS `tag`;

CREATE TABLE `tag` (
  `id_tag` int(11) NOT NULL AUTO_INCREMENT,
  `code_tag` varchar(32) NOT NULL,
  `show_tag` varchar(64) NOT NULL,
  `closing_tag` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`id_tag`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `tag` */

insert  into `tag`(`id_tag`,`code_tag`,`show_tag`,`closing_tag`) values (1,'input','Input',NULL),(2,'textarea','Text Area','</textarea>'),(3,'select','Option','</select>');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
