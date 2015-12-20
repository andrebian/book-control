SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';

CREATE SCHEMA IF NOT EXISTS `book_control` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ;
USE `book_control` ;

-- -----------------------------------------------------
-- Table `groups`
-- -----------------------------------------------------
CREATE TABLE `groups` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- -----------------------------------------------------
-- Table `users`
-- -----------------------------------------------------
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `group_id` int(10) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `surname` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `addr_number` int(11) NOT NULL,
  `addr_complement` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `addr_district` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `addr_city` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `addr_state` varchar(2) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'PR',
  `addr_country` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `addr_zip_code` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(14) COLLATE utf8_unicode_ci NOT NULL,
  `celphone` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- -----------------------------------------------------
-- Table `books`
-- -----------------------------------------------------
CREATE TABLE `books` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `author` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `resume` text COLLATE utf8_unicode_ci,
  `isbn` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `acquired_form` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `buyer` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `purchase_point` text COLLATE utf8_unicode_ci,
  `price` double(10,2) DEFAULT NULL,
  `attachment` text COLLATE utf8_unicode_ci,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `publishing_house` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date_buy` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- -----------------------------------------------------
-- Table `books_logs`
-- -----------------------------------------------------
CREATE TABLE `books_logs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `book_id` int(10) unsigned NOT NULL,
  `meta_key` text COLLATE utf8_unicode_ci,
  `meta_value` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
