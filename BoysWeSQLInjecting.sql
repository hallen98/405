-- MySQL Script generated by MySQL Workbench
-- Sat Feb 15 16:08:26 2020
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema AttendenceMadeEasy
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `AttendenceMadeEasy` ;

-- -----------------------------------------------------
-- Schema AttendenceMadeEasy
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `AttendenceMadeEasy` DEFAULT CHARACTER SET utf8 ;
USE `AttendenceMadeEasy` ;

-- -----------------------------------------------------
-- Table `AttendenceMadeEasy`.`Student`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `AttendenceMadeEasy`.`Student` ;

CREATE TABLE IF NOT EXISTS `AttendenceMadeEasy`.`Student` (
  `sid` INT GENERATED ALWAYS AS () VIRTUAL,
  PRIMARY KEY (`sid`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `AttendenceMadeEasy`.`Student_has_classes`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `AttendenceMadeEasy`.`Student_has_classes` ;

CREATE TABLE IF NOT EXISTS `AttendenceMadeEasy`.`Student_has_classes` (
  `sid` INT NOT NULL,
  `classes_idclasses` INT NOT NULL,
  `classes_teacher_idteacher` INT NOT NULL,
  PRIMARY KEY (`sid`, `classes_idclasses`, `classes_teacher_idteacher`),
  INDEX `fk_Student_has_classes_classes1_idx` (`classes_idclasses` ASC, `classes_teacher_idteacher` ASC) VISIBLE,
  INDEX `fk_Student_has_classes_Student1_idx` (`sid` ASC) VISIBLE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `AttendenceMadeEasy`.`User`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `AttendenceMadeEasy`.`User` ;

CREATE TABLE IF NOT EXISTS `AttendenceMadeEasy`.`User` (
  `uid` INT GENERATED ALWAYS AS () VIRTUAL,
  `fname` VARCHAR(45) NULL,
  `lname` VARCHAR(45) NULL,
  `email` VARCHAR(255) NOT NULL,
  `role` VARCHAR(45) NOT NULL,
  `Student_idstudent` INT GENERATED ALWAYS AS (),
  `teacher_idteacher` INT GENERATED ALWAYS AS (),
  `password` CHAR(32) NOT NULL,
  PRIMARY KEY (`uid`),
  UNIQUE INDEX `email_UNIQUE` (`email` ASC) VISIBLE,
  INDEX `fk_user_Student_idx` (`Student_idstudent` ASC) VISIBLE,
  INDEX `fk_user_teacher1_idx` (`teacher_idteacher` ASC) VISIBLE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `AttendenceMadeEasy`.`classes`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `AttendenceMadeEasy`.`classes` ;

CREATE TABLE IF NOT EXISTS `AttendenceMadeEasy`.`classes` (
  `idclasses` INT NOT NULL,
  `tid_class` INT NOT NULL,
  `location` VARCHAR(255) NULL,
  `className` VARCHAR(45) NULL,
  `classTime` TIME NULL,
  `dataarchived` DATETIME NULL,
  `archived` BINARY(1) NULL,
  PRIMARY KEY (`idclasses`, `tid_class`),
  INDEX `fk_classes_teacher1_idx` (`tid_class` ASC) VISIBLE,
  UNIQUE INDEX `archclasses_idarchclasses_UNIQUE` (`archclasses_idarchclasses` ASC) VISIBLE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `AttendenceMadeEasy`.`teacher`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `AttendenceMadeEasy`.`teacher` ;

CREATE TABLE IF NOT EXISTS `AttendenceMadeEasy`.`teacher` (
  `tid` INT NOT NULL,
  PRIMARY KEY (`tid`))
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
