-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema attendencemadeeasy
-- -----------------------------------------------------

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
  `idclasses` INT(5) NOT NULL,
  `tid_class` INT(11) NOT NULL,
  `location` VARCHAR(255) NULL DEFAULT NULL,
  `className` VARCHAR(45) NULL DEFAULT NULL,
  `classTime` TIME NULL DEFAULT NULL,
  `dataarchived` DATETIME NULL DEFAULT NULL,
  `archived` INT(11) NULL DEFAULT NULL,
  `weekday` VARCHAR(7) NULL DEFAULT NULL,
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
-- Table `attendencemadeeasy`.`student_attended`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `attendencemadeeasy`.`student_attended` ;

CREATE TABLE IF NOT EXISTS `attendencemadeeasy`.`student_attended` (
  `idStudent` INT(8) NOT NULL,
  `classes_id` INT(6) NULL DEFAULT NULL,
  `tid_class` INT(8) NULL DEFAULT NULL,
  `location` INT(1) NULL DEFAULT NULL,
  `time` TIME NULL DEFAULT NULL,
  `date` DATE NOT NULL,
  PRIMARY KEY (`idStudent`, `date`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `attendencemadeeasy`.`student_has_classes`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `attendencemadeeasy`.`student_has_classes` ;

CREATE TABLE IF NOT EXISTS `attendencemadeeasy`.`student_has_classes` (
  `sid` INT(8) NOT NULL,
  `classes_idclasses` INT(5) NOT NULL,
  `classes_teacher_idteacher` INT(8) NOT NULL,
  PRIMARY KEY (`sid`, `classes_idclasses`, `classes_teacher_idteacher`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `attendencemadeeasy`.`student_inclass`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `attendencemadeeasy`.`student_inclass` ;

CREATE TABLE IF NOT EXISTS `attendencemadeeasy`.`student_inclass` (
  `sid` INT(8) NOT NULL,
  `classes_idclasses` INT(6) NULL DEFAULT NULL,
  `classes_teacher_idteacher` INT(8) NULL DEFAULT NULL,
  PRIMARY KEY (`sid`))
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
-- Table `attendencemadeeasy`.`usertable`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `attendencemadeeasy`.`usertable` ;

CREATE TABLE IF NOT EXISTS `attendencemadeeasy`.`usertable` (
  `uid` INT(8) NOT NULL,
  `fname` VARCHAR(45) NULL DEFAULT NULL,
  `lname` VARCHAR(45) NULL DEFAULT NULL,
  `email` VARCHAR(255) NULL DEFAULT NULL,
  `role` INT(1) NULL DEFAULT NULL,
  `passHash` VARCHAR(56) NULL DEFAULT NULL,
  PRIMARY KEY (`uid`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

USE `attendencemadeeasy` ;

-- -----------------------------------------------------
-- Placeholder table for view `attendencemadeeasy`.`archivedView`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `attendencemadeeasy`.`archivedView` (`className` INT, `classTime` INT, `Archived` INT);

-- -----------------------------------------------------
-- Placeholder table for view `attendencemadeeasy`.`currentClassesView`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `attendencemadeeasy`.`currentClassesView` (`className` INT, `weekday` INT, `classTime` INT, `idclasses` INT);

-- -----------------------------------------------------
-- Placeholder table for view `attendencemadeeasy`.`studentView`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `attendencemadeeasy`.`studentView` (`idclasses` INT, `className` INT, `classTime` INT, `location` INT);

-- -----------------------------------------------------
-- View `attendencemadeeasy`.`archivedView`
-- -----------------------------------------------------
DROP VIEW IF EXISTS `attendencemadeeasy`.`archivedView` ;
DROP TABLE IF EXISTS `attendencemadeeasy`.`archivedView`;
USE `attendencemadeeasy`;
CREATE  OR REPLACE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `attendencemadeeasy`.`archivedView` AS select `c`.`className` AS `className`,`c`.`classTime` AS `classTime`,`c`.`archived` AS `Archived` from (`attendencemadeeasy`.`class` `c` join `attendencemadeeasy`.`teacher` `t`) where ((`c`.`archived` = 1) and (`t`.`tid` = `c`.`tid_class`));

-- -----------------------------------------------------
-- View `attendencemadeeasy`.`currentClassesView`
-- -----------------------------------------------------
DROP VIEW IF EXISTS `attendencemadeeasy`.`currentClassesView` ;
DROP TABLE IF EXISTS `attendencemadeeasy`.`currentClassesView`;
USE `attendencemadeeasy`;
CREATE  OR REPLACE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `attendencemadeeasy`.`currentClassesView` AS select `c`.`className` AS `className`,`c`.`weekday` AS `weekday`,`c`.`classTime` AS `classTime`,`c`.`idclasses` AS `idclasses` from `attendencemadeeasy`.`class` `c` where (`c`.`archived` = 0);

-- -----------------------------------------------------
-- View `attendencemadeeasy`.`studentView`
-- -----------------------------------------------------
DROP VIEW IF EXISTS `attendencemadeeasy`.`studentView` ;
DROP TABLE IF EXISTS `attendencemadeeasy`.`studentView`;
USE `attendencemadeeasy`;
CREATE  OR REPLACE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `attendencemadeeasy`.`studentView` AS select `c`.`idclasses` AS `idclasses`,`c`.`className` AS `className`,`c`.`classTime` AS `classTime`,`s`.`location` AS `location` from (`attendencemadeeasy`.`student_attended` `s` join `attendencemadeeasy`.`class` `c`) where ((`s`.`classes_id` = `c`.`idclasses`) and (`c`.`tid_class` = `s`.`classes_id`) and (`c`.`archived` = 0));

SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
USE `attendencemadeeasy`;

DELIMITER $$

USE `attendencemadeeasy`$$
DROP TRIGGER IF EXISTS `attendencemadeeasy`.`PassWordNotHashedError` $$
USE `attendencemadeeasy`$$
CREATE
DEFINER=`root`@`localhost`
TRIGGER `attendencemadeeasy`.`PassWordNotHashedError`
BEFORE UPDATE ON `attendencemadeeasy`.`usertable`
FOR EACH ROW
BEGIN
    DECLARE MSG VARCHAR(255);
    #Replace the 4 with Hash length size#
    IF (char_length(NEW.passHash) < 4 ) THEN
        SET msg = 'Unable to set password, Not Hashed';
        SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = msg;
    END IF;
END$$


USE `attendencemadeeasy`$$
DROP TRIGGER IF EXISTS `attendencemadeeasy`.`nullemail` $$
USE `attendencemadeeasy`$$
CREATE
DEFINER=`root`@`localhost`
TRIGGER `attendencemadeeasy`.`nullemail`
BEFORE UPDATE ON `attendencemadeeasy`.`usertable`
FOR EACH ROW
BEGIN
    DECLARE MSG VARCHAR(255);
    #Replace the 4 with Hash length size#
    IF (char_length(NEW.email) = null ) THEN
        SET msg = 'Unable to set email, No email found';
        SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = msg;
    END IF;
END$$


USE `attendencemadeeasy`$$
DROP TRIGGER IF EXISTS `attendencemadeeasy`.`roleassign` $$
USE `attendencemadeeasy`$$
CREATE
DEFINER=`root`@`localhost`
TRIGGER `attendencemadeeasy`.`roleassign`
AFTER INSERT ON `attendencemadeeasy`.`usertable`
FOR EACH ROW
BEGIN
    DECLARE MSG VARCHAR(255);
    IF (NEW.role = 1 ) THEN
        INSERT INTO teacher(tid, User_uid)
        VALUES(NEW.uid,NEW.uid);
    END IF;
    IF (NEW.role = 0 ) THEN
        INSERT INTO studennt(sid, User_uid)
        VALUES(NEW.uid,NEW.uid);
    END IF;
    IF (NEW.role > 1) THEN
        SET msg = 'Warning,Role assign has an unknown value';
        SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = msg;
    END IF;
END$$


USE `attendencemadeeasy`$$
DROP TRIGGER IF EXISTS `attendencemadeeasy`.`userchecks` $$
USE `attendencemadeeasy`$$
CREATE
DEFINER=`root`@`localhost`
TRIGGER `attendencemadeeasy`.`userchecks`
BEFORE INSERT ON `attendencemadeeasy`.`usertable`
FOR EACH ROW
BEGIN
    DECLARE MSG VARCHAR(255);
    IF (NEW.uid = null OR NEW.fname = null OR NEW.lname = null OR NEW.email = null OR NEW.role = null OR NEW.passHash = null) THEN
        SET msg = 'Warning, All fields must be filled';
        SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = msg;
    END IF;
END$$


DELIMITER ;


