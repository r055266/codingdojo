SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `prayise` DEFAULT CHARACTER SET utf8 ;
USE `prayise` ;

-- -----------------------------------------------------
-- Table `prayise`.`users`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `prayise`.`users` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `email_address` VARCHAR(255) NULL DEFAULT NULL ,
  `password` VARCHAR(255) NULL DEFAULT NULL ,
  `first_name` VARCHAR(255) NULL DEFAULT NULL COMMENT '	' ,
  `last_name` VARCHAR(255) NULL DEFAULT NULL ,
  `description` TINYTEXT NULL DEFAULT NULL ,
  `created_at` DATETIME NULL DEFAULT NULL ,
  `modified_at` DATETIME NULL DEFAULT NULL ,
  `birth_date` DATE NULL DEFAULT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
AUTO_INCREMENT = 7
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `prayise`.`messages`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `prayise`.`messages` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `user_sent_id` INT(11) NOT NULL ,
  `user_reciever_id` INT(11) NOT NULL ,
  `content` TINYTEXT NULL DEFAULT NULL ,
  `display_flag` TINYINT(4) NULL DEFAULT '1' ,
  `created_at` DATETIME NULL DEFAULT NULL ,
  `modified_at` DATETIME NULL DEFAULT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_messages_users1_idx` (`user_sent_id` ASC) ,
  INDEX `fk_messages_users2_idx` (`user_reciever_id` ASC) ,
  CONSTRAINT `fk_messages_users1`
    FOREIGN KEY (`user_sent_id` )
    REFERENCES `prayise`.`users` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_messages_users2`
    FOREIGN KEY (`user_reciever_id` )
    REFERENCES `prayise`.`users` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 11
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `prayise`.`comments`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `prayise`.`comments` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `messages_id` INT(11) NOT NULL ,
  `users_id` INT(11) NOT NULL ,
  `content` TINYTEXT NULL DEFAULT NULL ,
  `display_flag` TINYINT(4) NULL DEFAULT '1' ,
  `created_at` DATETIME NULL DEFAULT NULL ,
  `modified_at` DATETIME NULL DEFAULT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_comments_messages1_idx` (`messages_id` ASC) ,
  INDEX `fk_comments_users1_idx` (`users_id` ASC) ,
  CONSTRAINT `fk_comments_messages1`
    FOREIGN KEY (`messages_id` )
    REFERENCES `prayise`.`messages` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_comments_users1`
    FOREIGN KEY (`users_id` )
    REFERENCES `prayise`.`users` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 12
DEFAULT CHARACTER SET = utf8;

USE `prayise` ;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
