/*
SQLyog Ultimate v12.5.0 (64 bit)
MySQL - 10.4.27-MariaDB : Database - online_blogging_application
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`online_blogging_application` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;

USE `online_blogging_application`;

/*Table structure for table `blog` */

DROP TABLE IF EXISTS `blog`;

CREATE TABLE `blog` (
  `blog_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `blog_title` varchar(11) DEFAULT NULL,
  `post_per_page` int(11) DEFAULT NULL,
  `blog_background_image` text DEFAULT NULL,
  `blog_status` enum('Active','InActive') DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`blog_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `blog_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `blog` */

insert  into `blog`(`blog_id`,`user_id`,`blog_title`,`post_per_page`,`blog_background_image`,`blog_status`,`created_at`,`updated_at`) values 
(3,7,'my 3 change',10,'/admin/updated_images/1684383415_1683782313_image_9.jpg','Active','2023-05-21 16:34:34','2023-05-21 16:34:34'),
(4,7,'my page 2',1,'/admin/images/1683782313_image_9.jpg','Active','2023-05-20 15:51:43','2023-05-11 10:18:33'),
(5,7,'my page 3',10,'/admin/images/1683782339_image_10.jpg','Active','2023-05-14 12:09:46','2023-05-11 10:18:59'),
(6,7,'my page 4',10,'/admin/images/1683782384_image_8.jpg','Active','2023-05-12 17:35:00','2023-05-11 10:19:44'),
(7,7,'my page 5',10,'/admin/images/1683782448_image_10.jpg','Active','2023-05-22 12:45:49','2023-05-11 10:20:48'),
(10,7,'page by aja',7,'/admin/images/1683824354_blog1.jpg','Active','2023-05-11 21:59:14','2023-05-11 21:59:14'),
(11,7,'my ajax sec',10,'/admin/images/1683825110_blog3.jpg','Active','2023-05-11 22:11:50','2023-05-11 22:11:50'),
(12,7,'3rd check a',10,'/admin/updated_images/1683891667_blog3.jpg','Active','2023-05-12 17:35:14','2023-05-12 16:41:07'),
(13,7,'page check5',0,'/admin/images/1683827062_blog4.jpg','Active','2023-05-11 22:44:22','2023-05-11 22:44:22'),
(14,7,'page by aja',10,'/admin/updated_images/1683830231_boy1.jpg','Active','2023-05-11 23:37:11','2023-05-11 23:37:11'),
(15,7,'page by aja',10,'/admin/images/1683828646_logo.png','Active','2023-05-11 23:10:46','2023-05-11 23:10:46'),
(16,7,'page by aja',7,'/admin/images/1683829110_blog 3.webp','Active','2023-05-11 23:18:30','2023-05-11 23:18:30'),
(17,7,'page valida',10,'/admin/images/1683830154_boy.jpg','Active','2023-05-12 17:35:30','2023-05-11 23:35:54'),
(18,8,'blog by ahm',2,'/admin/images/1684749863_blog4.jpg','Active','2023-05-22 15:04:51','2023-05-22 15:04:51');

/*Table structure for table `category` */

DROP TABLE IF EXISTS `category`;

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_title` varchar(100) DEFAULT NULL,
  `category_description` text DEFAULT NULL,
  `category_status` enum('Active','InActive') DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `category` */

insert  into `category`(`category_id`,`category_title`,`category_description`,`category_status`,`created_at`,`updated_at`) values 
(1,'entertainment ','this is the catagory in which you find all types of entertainment posts','Active','2023-05-23 11:05:49','2023-05-23 11:05:49'),
(2,'news','this is the catagory in which you find all types of  politcs news posts','Active','2023-05-13 01:13:05','2023-05-13 01:13:05'),
(3,'new catagory chdck','this is the catagory in which you find all types of entertainment posts','Active','2023-05-14 12:36:04','2023-05-14 12:36:04');

/*Table structure for table `following_blog` */

DROP TABLE IF EXISTS `following_blog`;

CREATE TABLE `following_blog` (
  `follow_id` int(11) NOT NULL AUTO_INCREMENT,
  `follower_id` int(11) DEFAULT NULL,
  `blog_following_id` int(11) DEFAULT NULL,
  `status` enum('Followed','Unfollowed') DEFAULT 'Followed',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`follow_id`),
  KEY `blog_following_id` (`blog_following_id`),
  KEY `follower_id` (`follower_id`),
  CONSTRAINT `following_blog_ibfk_1` FOREIGN KEY (`blog_following_id`) REFERENCES `blog` (`blog_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `following_blog_ibfk_2` FOREIGN KEY (`follower_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `following_blog` */

insert  into `following_blog`(`follow_id`,`follower_id`,`blog_following_id`,`status`,`created_at`,`updated_at`) values 
(1,9,4,'Unfollowed','2023-05-21 13:49:53','2023-05-21 13:49:53'),
(2,7,4,'Followed','2023-05-21 13:49:59','2023-05-21 13:49:59'),
(3,7,12,'Unfollowed','2023-05-21 14:21:40','2023-05-21 14:21:40');

/*Table structure for table `post` */

DROP TABLE IF EXISTS `post`;

CREATE TABLE `post` (
  `post_id` int(11) NOT NULL AUTO_INCREMENT,
  `blog_id` int(11) DEFAULT NULL,
  `post_title` varchar(200) NOT NULL,
  `post_summary` text NOT NULL,
  `post_description` longtext NOT NULL,
  `featured_image` text DEFAULT NULL,
  `post_status` enum('Active','InActive') DEFAULT NULL,
  `is_comment_allowed` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`post_id`),
  KEY `blog_id` (`blog_id`),
  CONSTRAINT `post_ibfk_1` FOREIGN KEY (`blog_id`) REFERENCES `blog` (`blog_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `post` */

insert  into `post`(`post_id`,`blog_id`,`post_title`,`post_summary`,`post_description`,`featured_image`,`post_status`,`is_comment_allowed`,`created_at`,`updated_at`) values 
(40,6,'anything   90lll','xyz very short 90llll','\r\n                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\n                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\n                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\n                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\n                cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\n                proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\n                tempor incididunt ut labore et d\\\r\n                proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n\r\n\r\n                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\n                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\n                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\n                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\n                cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\n                proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\n                tempor incididunt ut labore et d\\\r\n                proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n                                                                     ','/admin/images/1684306389_1683824263_logo.png','Active',2,'2023-05-23 11:30:16','2023-05-21 16:38:52'),
(42,4,'0900078601','dsfsdfsd','\r\n                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\n                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\n                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\n                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\n                cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\n                proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\n                tempor incididunt ut labore et d\\\r\n                proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n\r\n\r\n                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\n                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\n                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\n                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\n                cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\n                proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\n                tempor incididunt ut labore et d\\\r\n                proident, sunt in culpa qui officia deserunt mollit anim id est laborum.','/admin/images/1684262114_blog2.jpg','Active',1,'2023-05-23 11:30:23','2023-05-20 11:07:50'),
(43,5,'sadasdasdasd','sadasdasd','\r\n                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\n                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\n                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\n                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\n                cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\n                proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\n                tempor incididunt ut labore et d\\\r\n                proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n\r\n\r\n                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\n                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\n                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\n                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\n                cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\n                proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\n                tempor incididunt ut labore et d\\\r\n                proident, sunt in culpa qui officia deserunt mollit anim id est laborum.','/admin/images/1684262164_blog1.jpg','Active',1,'2023-05-23 11:30:31','2023-05-16 23:36:04'),
(44,4,'PAKISTAN ECONOMY','very down','\r\n                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\n                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\n                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\n                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\n                cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\n                proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\n                tempor incididunt ut labore et d\\\r\n                proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n\r\n\r\n                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\n                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\n                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\n                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\n                cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\n                proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\n                tempor incididunt ut labore et d\\\r\n                proident, sunt in culpa qui officia deserunt mollit anim id est laborum.','/admin/images/1684307197_ec.jpg','Active',1,'2023-05-23 11:30:40','2023-05-17 12:06:37'),
(45,3,'new post ','working post','\r\n                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\n                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\n                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\n                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\n                cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\n                proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\n                tempor incididunt ut labore et d\\\r\n                proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n\r\n\r\n                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\n                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\n                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\n                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\n                cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\n                proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\n                tempor incididunt ut labore et d\\\r\n                proident, sunt in culpa qui officia deserunt mollit anim id est laborum.','/admin/images/1684734277_blog3.jpg','Active',1,'2023-05-23 11:30:48','2023-05-22 10:44:37'),
(46,18,'new admin','not again','\r\n                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\n                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\n                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\n                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\n                cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\n                proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\n                tempor incididunt ut labore et d\\\r\n                proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n\r\n\r\n                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\n                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\n                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\n                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\n                cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\n                proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\n                tempor incididunt ut labore et d\\\r\n                proident, sunt in culpa qui officia deserunt mollit anim id est laborum.','/admin/images/1684749960_blog3.jpg','Active',2,'2023-05-23 11:30:55','2023-05-22 15:06:19');

/*Table structure for table `post_atachment` */

DROP TABLE IF EXISTS `post_atachment`;

CREATE TABLE `post_atachment` (
  `post_atachment_id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` int(11) DEFAULT NULL,
  `post_attachment_title` varchar(200) DEFAULT NULL,
  `post_attachment_path` text DEFAULT NULL,
  `is_active` enum('Active','InActive') DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`post_atachment_id`),
  KEY `fk1` (`post_id`),
  CONSTRAINT `fk1` FOREIGN KEY (`post_id`) REFERENCES `post` (`post_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `post_atachment` */

insert  into `post_atachment`(`post_atachment_id`,`post_id`,`post_attachment_title`,`post_attachment_path`,`is_active`,`created_at`,`updated_at`) values 
(44,40,'1684089364_blog3.jpg','/admin/post_attchement/1684307864_1684089364_blog3.jpg','Active','2023-05-23 11:28:50','2023-05-23 11:28:50'),
(45,40,'1684092164_blog5.jpg','/admin/post_attchement/1684307864_1684092164_blog5.jpg','Active','2023-05-23 11:35:46','2023-05-23 11:35:46');

/*Table structure for table `post_category` */

DROP TABLE IF EXISTS `post_category`;

CREATE TABLE `post_category` (
  `post_category_id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`post_category_id`),
  KEY `post_id` (`post_id`),
  KEY `category_id` (`category_id`),
  CONSTRAINT `post_category_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `post` (`post_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `post_category_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `post_category` */

insert  into `post_category`(`post_category_id`,`post_id`,`category_id`,`created_at`,`updated_at`) values 
(7,40,2,'2023-05-21 16:38:52','2023-05-21 16:38:52'),
(9,42,1,'2023-05-20 11:07:50','2023-05-20 11:07:50'),
(10,43,3,'2023-05-16 23:36:04','2023-05-16 23:36:04'),
(11,44,1,'2023-05-17 12:06:37','2023-05-17 12:06:37'),
(12,45,1,'2023-05-22 10:44:37','2023-05-22 10:44:37'),
(13,46,3,'2023-05-22 15:06:19','2023-05-22 15:06:19');

/*Table structure for table `post_comment` */

DROP TABLE IF EXISTS `post_comment`;

CREATE TABLE `post_comment` (
  `post_comment_id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `comment` text DEFAULT NULL,
  `is_active` enum('Active','InActive') DEFAULT 'InActive',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`post_comment_id`),
  KEY `user_id` (`user_id`),
  KEY `post_id` (`post_id`),
  CONSTRAINT `post_comment_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `post_comment_ibfk_2` FOREIGN KEY (`post_id`) REFERENCES `post` (`post_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `post_comment` */

insert  into `post_comment`(`post_comment_id`,`post_id`,`user_id`,`comment`,`is_active`,`created_at`) values 
(11,44,7,'new comment','Active','2023-05-23 09:17:34'),
(12,44,7,'other comment','Active','2023-05-23 09:17:31'),
(13,44,7,'another ','Active','2023-05-22 11:01:08'),
(14,44,7,'check','Active','2023-05-22 11:00:03'),
(15,42,7,'this very usefull post','Active','2023-05-23 09:17:18'),
(16,42,9,'i want to comment','Active','2023-05-22 10:43:11'),
(17,40,9,'new comment','Active','2023-05-23 11:28:41'),
(18,44,7,'again check','Active','2023-05-22 11:00:20'),
(19,44,9,'hi again checking','Active','2023-05-21 13:51:14'),
(20,44,7,'iam also checking','Active','2023-05-21 13:52:27'),
(21,44,12,'hi this is new comment','Active','2023-05-23 09:17:28');

/*Table structure for table `role` */

DROP TABLE IF EXISTS `role`;

CREATE TABLE `role` (
  `role_id` int(11) NOT NULL AUTO_INCREMENT,
  `role_type` varchar(50) NOT NULL,
  `is_active` enum('Active','InActive') DEFAULT 'Active',
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `role` */

insert  into `role`(`role_id`,`role_type`,`is_active`) values 
(1,'admin','Active'),
(2,'user','Active');

/*Table structure for table `setting` */

DROP TABLE IF EXISTS `setting`;

CREATE TABLE `setting` (
  `setting_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `setting_key` varchar(100) DEFAULT NULL,
  `setting_value` varchar(100) DEFAULT NULL,
  `setting_status` enum('Active','InActive') DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`setting_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `setting_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `setting` */

insert  into `setting`(`setting_id`,`user_id`,`setting_key`,`setting_value`,`setting_status`,`created_at`,`updated_at`) values 
(13,12,'user_font_color','#f5dd66','Active','2023-05-23 23:16:45','0000-00-00 00:00:00'),
(14,12,'user_font_size','20px','Active','2023-05-23 22:33:52','0000-00-00 00:00:00'),
(15,12,'user_background_color','#ff0000','Active','2023-05-23 23:16:45','2023-05-23 15:55:13'),
(16,7,'admin_font_color','#000000','Active','2023-05-23 22:41:54','0000-00-00 00:00:00'),
(17,7,'admin_font_size','20px','Active','2023-05-23 22:42:09','0000-00-00 00:00:00'),
(18,7,'admin_background_color','#ffd700','Active','2023-05-23 22:41:24','0000-00-00 00:00:00');

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(11) DEFAULT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` text NOT NULL,
  `gender` enum('Male','Female') DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `user_image` text DEFAULT NULL,
  `address` text DEFAULT NULL,
  `is_approved` enum('Pending','Approved','Rejected') DEFAULT 'Pending',
  `is_active` enum('Active','InActive') DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  KEY `role_id` (`role_id`),
  CONSTRAINT `user_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `role` (`role_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `user` */

insert  into `user`(`user_id`,`role_id`,`first_name`,`last_name`,`email`,`password`,`gender`,`date_of_birth`,`user_image`,`address`,`is_approved`,`is_active`,`created_at`,`updated_at`) values 
(7,1,'Arslan ','Nisar','malanaarsal@gmail.com','9017f6de','Male','2000-08-04','user_profiles/1683522173_boy.jpg','house 2740 muhala nangoline kotri distirct jamshoro sindh ','Approved','Active','2023-05-18 11:43:45','2023-05-18 11:43:45'),
(8,1,'Ahmed khan','Ali','ahmedali@gmail.com','hello12345','Male','2023-05-17','user_profiles/1683528683_boy.jpg','aljbkdjasbdkjlabsdklas','Approved','Active','2023-05-22 15:03:40','2023-05-08 11:51:23'),
(9,2,'Asif abbass','Ali ahmed ','asif@gmail.com','12345678','Male','2023-05-04','/user_profiles/1684320827_1683782384_image_8.jpg','house99  kotri  sindh jamshoro pakistan','Approved','Active','2023-05-23 23:35:11','2023-05-17 15:54:11'),
(10,2,'azeem ali','khan','ubaid@gmail.com','dfgdfggg','Male','2023-05-17','/user_profiles/1684320235_1683782384_image_8.jpg','new jery america','Approved','InActive','2023-05-23 23:37:22','2023-05-17 15:43:55'),
(11,2,'Aqib ','Jawed','aqib@gmail.com','12345678','Male','2023-05-31','user_profiles/1683564309_boy.jpg','house2740muhalanangoline kotrihouse2740muhalanangoline kotri','Approved','Active','2023-05-22 12:28:36','2023-05-08 21:45:09'),
(12,2,'Adeel  raza ','Qazi','adeel@gmail.com','12345678','Male','2023-05-26','/user_profiles/1684687070_boy.jpg','                   house2740muhalanangoline kotrihouse2740muhalanangoline kotri\r\n    \r\n    \r\n    \r\n    \r\n    \r\n    \r\n    ','Approved','Active','2023-05-22 00:07:34','2023-05-22 00:07:34'),
(13,2,'Ahsan ','Ali','dummyacc19233@gmail.com','12345678','Male','2023-05-20','user_profiles/1683564456_boy.jpg','house2740muhalanangoline kotri 0007','Approved','Active','2023-05-10 17:47:18','2023-05-08 21:47:36'),
(14,2,'arsalali','khan','malanaarsal21@gmail.com','12345678','Male','2023-05-09','user_profiles/1683564518_boy1.jpg','house2740muhalanangoline kotrihouse2740muhalanangoline kotri','Approved','Active','2023-05-10 20:24:51','2023-05-08 21:48:38'),
(15,2,'Arsal','Khan','arsalk@gmail.com','12345678','Male','2023-05-22','user_profiles/1683564744_boy1.jpg','house2740muhalanangoline kotri\r\nhouse2740muhalanangoline kotri','Pending',NULL,'2023-05-10 23:11:57','2023-05-08 21:52:24'),
(16,2,'Zamin','Ali','zaminl21@gmail.com','12345678','Male','2023-05-09','user_profiles/1683564843_boy1.jpg','house2740muhalanangoline kotri\r\nhouse2740muhalanangoline kotri','Pending',NULL,'2023-05-10 23:13:10','2023-05-08 21:54:03'),
(17,2,'Tahir','Ali','tahirali@gmail.com','12345678','Male','2023-05-31','user_profiles/1683564952_boy.jpg','house2740muhalanangoline kotri\r\nhouse2740muhalanangoline kotri','Pending',NULL,'2023-05-10 19:33:36','2023-05-08 21:55:52'),
(18,2,'Shahrukh','Amin','skamin@gmail.com','12345678','Male','2023-05-17','user_profiles/1683565004_boy.jpg','house2740muhalanangoline kotri\r\nhouse2740muhalanangoline kotri','Pending',NULL,'2023-05-10 17:41:20','2023-05-08 21:56:44'),
(21,2,'anees','hassan','aneesak@gmail.com','12345678','Male','2023-05-09','/user_profiles/1684694894_boy1.jpg','house2740muhalanangoline kotri','Approved','Active','2023-05-21 23:49:04','2023-05-21 23:48:14');

/*Table structure for table `user_feedback` */

DROP TABLE IF EXISTS `user_feedback`;

CREATE TABLE `user_feedback` (
  `feedback_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `user_name` varchar(100) DEFAULT NULL,
  `user_email` varchar(100) DEFAULT NULL,
  `feedback` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`feedback_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `user_feedback_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `user_feedback` */

insert  into `user_feedback`(`feedback_id`,`user_id`,`user_name`,`user_email`,`feedback`,`created_at`,`updated_at`) values 
(2,12,'adeel raza qazi','adeel@gmail.com','jxnzclknaslkalk','2005-12-29 00:00:00','2005-12-29 00:00:00'),
(3,12,'Adeel  raza  Qazi','adeel@gmail.com','any thing new','2023-05-22 10:26:13','2023-05-22 10:26:13'),
(4,12,'Adeel  raza  Qazi','adeel@gmail.com','again anything','2023-05-22 10:28:15','2023-05-22 10:28:15'),
(9,NULL,'shoaib','shoaib@gmal.com','asdsdasdasdasdasd','2023-05-23 00:01:08','2023-05-23 00:01:08');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
