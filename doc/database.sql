SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';

CREATE SCHEMA IF NOT EXISTS `book_control` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ;
USE `book_control` ;

-- -----------------------------------------------------
-- Table `book_control`.`groups`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `book_control`.`groups` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(60) NOT NULL ,
  `created` DATETIME NULL ,
  `modified` DATETIME NULL ,
  PRIMARY KEY (`id`) )
ENGINE = MyISAM
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `book_control`.`users`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `book_control`.`users` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `group_id` INT UNSIGNED NOT NULL ,
  `name` VARCHAR(100) NOT NULL ,
  `surname` VARCHAR(100) NOT NULL ,
  `email` VARCHAR(255) NOT NULL ,
  `username` VARCHAR(255) NOT NULL ,
  `password` VARCHAR(60) NOT NULL ,
  `address` VARCHAR(255) NOT NULL ,
  `addr_number` INT NOT NULL ,
  `addr_complement` VARCHAR(50) NULL ,
  `addr_district` VARCHAR(100) NOT NULL ,
  `addr_city` VARCHAR(100) NOT NULL ,
  `addr_state` VARCHAR(2) NOT NULL DEFAULT 'PR' ,
  `addr_country` VARCHAR(45) NOT NULL ,
  `addr_zip_code` VARCHAR(10) NOT NULL ,
  `phone` VARCHAR(14) NOT NULL ,
  `celphone` VARCHAR(15) NULL ,
  `created` DATETIME NULL ,
  `modified` DATETIME NULL ,
  PRIMARY KEY (`id`) )
ENGINE = MyISAM
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `book_control`.`books`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `book_control`.`books` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(255) NOT NULL ,
  `resume` TEXT NULL ,
  `isbn` VARCHAR(45) NULL ,
  `acquired_form` VARCHAR(45) NULL ,
  `buyer` VARCHAR(255) NULL ,
  `purchase_point` TEXT NULL ,
  `price` DOUBLE(10,2) NULL ,
  `attachment` TEXT NULL ,
  `created` DATETIME NULL ,
  `modified` DATETIME NULL ,
  PRIMARY KEY (`id`) )
ENGINE = MyISAM
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `book_control`.`books_log`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `book_control`.`books_log` (
  `id` INT NOT NULL ,
  `book_id` INT UNSIGNED NOT NULL ,
  `meta_key` TEXT NULL ,
  `meta_value` TEXT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = MyISAM
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
