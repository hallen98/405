-- MySQL Script generated by MySQL Workbench
-- Fri Mar 20 16:37:36 2020
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema attendencemadeeasy
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `attendencemadeeasy` ;

-- -----------------------------------------------------
-- Schema attendencemadeeasy
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `attendencemadeeasy` DEFAULT CHARACTER SET utf8 ;
USE `attendencemadeeasy` ;

-- -----------------------------------------------------
-- Table `attendencemadeeasy`.`class`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `attendencemadeeasy`.`class` ;

CREATE TABLE IF NOT EXISTS `attendencemadeeasy`.`class` (
  `idclasses` INT NOT NULL,
  `tid_class` INT NOT NULL,
  `location` VARCHAR(255) NULL DEFAULT NULL,
  `className` VARCHAR(45) NULL DEFAULT NULL,
  `classTime` TIME NULL DEFAULT NULL,
  `dataarchived` DATETIME NULL DEFAULT NULL,
  `archived` BINARY(1) NULL DEFAULT NULL,
  `weekday` INT(1) NULL,
  PRIMARY KEY (`idclasses`, `tid_class`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `attendencemadeeasy`.`student`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `attendencemadeeasy`.`student` ;

CREATE TABLE IF NOT EXISTS `attendencemadeeasy`.`student` (
  `sid` INT(8) NOT NULL,
  `User_uid` INT(8) NOT NULL,
  PRIMARY KEY (`sid`, `User_uid`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `attendencemadeeasy`.`student_has_classes`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `attendencemadeeasy`.`student_has_classes` ;

CREATE TABLE IF NOT EXISTS `attendencemadeeasy`.`student_has_classes` (
  `sid` INT NOT NULL,
  `classes_idclasses` INT NOT NULL,
  `classes_teacher_idteacher` INT NOT NULL,
  PRIMARY KEY (`sid`, `classes_idclasses`, `classes_teacher_idteacher`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `attendencemadeeasy`.`teacher`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `attendencemadeeasy`.`teacher` ;

CREATE TABLE IF NOT EXISTS `attendencemadeeasy`.`teacher` (
  `tid` INT(8) NOT NULL,
  `User_uid` INT(8) NOT NULL,
  PRIMARY KEY (`tid`, `User_uid`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `attendencemadeeasy`.`student_inclass`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `attendencemadeeasy`.`student_inclass` ;

CREATE TABLE IF NOT EXISTS `attendencemadeeasy`.`student_inclass` (
  `sid` INT(8) NOT NULL,
  `classes_idclasses` INT(6) NULL,
  `classes_teacher_idteacher` INT(8) NULL,
  PRIMARY KEY (`sid`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `attendencemadeeasy`.`student_attended`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `attendencemadeeasy`.`student_attended` ;

CREATE TABLE IF NOT EXISTS `attendencemadeeasy`.`student_attended` (
  `idStudent` INT(8) NOT NULL,
  `classes_id` INT(6) NULL,
  `tid_class` INT(8) NULL,
  `location` BINARY(1) NULL,
  `time` TIME NULL,
  `date` DATE NULL,
  PRIMARY KEY (`idStudent`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `attendencemadeeasy`.`usertable`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `attendencemadeeasy`.`usertable` ;

CREATE TABLE IF NOT EXISTS `attendencemadeeasy`.`usertable` (
  `uid` INT(8) NOT NULL,
  `fname` VARCHAR(45) NULL,
  `lname` VARCHAR(45) NULL,
  `email` VARCHAR(255) NULL,
  `role` INT(1) NULL,
  `passHash` VARCHAR(56) NULL,
  PRIMARY KEY (`uid`))
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;