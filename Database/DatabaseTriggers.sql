
DROP TRIGGER  IF EXISTS  attendencemadeeasy.PassWordNotHashedError; 
DROP TRIGGER  IF EXISTS  attendencemadeeasy.roleassign;
DROP TRIGGER  IF EXISTS  attendencemadeeasy.usercheck;

 #trigger checks for passHash size#
DELIMITER $$
USE `attendencemadeeasy`$$
CREATE
DEFINER=`root`@`localhost`
TRIGGER attendencemadeeasy.PassWordNotHashedError
BEFORE UPDATE ON attendencemadeeasy.usertable
FOR EACH ROW
BEGIN
	DECLARE MSG VARCHAR(255);
    #Replace the 4 with Hash length size#
	IF (char_length(NEW.passHash) < 4 ) THEN
		SET msg = 'Unable to set password, Not Hashed';
        SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = msg;
	END IF;
END$$
DELIMITER ;

#trigger checks for role #
DELIMITER $$
USE `attendencemadeeasy`$$
CREATE
DEFINER=`root`@`localhost`
TRIGGER attendencemadeeasy.roleassign
AFTER INSERT ON attendencemadeeasy.usertable
FOR EACH ROW
BEGIN
	DECLARE MSG VARCHAR(255);
	IF (NEW.role = 1 ) THEN
		SET teacher.tid = NEW.uid;
        SET teacher.User_uid = NEW.uid;
	END IF;
	IF (NEW.role = 0 ) THEN
		SET student.sid = NEW.uid;
        SET student.User_uid = NEW.uid;
	END IF;
END$$
DELIMITER ;

#trigger checks for role #
DELIMITER $$
USE `attendencemadeeasy`$$
CREATE
DEFINER=`root`@`localhost`
TRIGGER attendencemadeeasy.userchecks
BEFORE INSERT ON attendencemadeeasy.usertable
FOR EACH ROW
BEGIN
	DECLARE MSG VARCHAR(255);
	IF (NEW.uid = null OR NEW.fname = null OR NEW.lname = null OR NEW.email = null OR NEW.role = null OR NEW.passwordhash = null) THEN
		SET msg = 'Warning, All fields must be filled';
        SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = msg;
	END IF;
END$$
DELIMITER ;



