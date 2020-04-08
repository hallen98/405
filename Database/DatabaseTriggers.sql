
DROP TRIGGER  IF EXISTS  attendencemadeeasy.PassWordNotHashedError; 
DROP TRIGGER  IF EXISTS  attendencemadeeasy.roleassign;
DROP TRIGGER  IF EXISTS  attendencemadeeasy.usercheck;
DROP TRIGGER  IF EXISTS  attendencemadeeasy.nullemail;

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

#trigger checks for new email not null#
DELIMITER $$
USE `attendencemadeeasy`$$
CREATE
DEFINER=`root`@`localhost`
TRIGGER attendencemadeeasy.nullemail
BEFORE UPDATE ON attendencemadeeasy.usertable
FOR EACH ROW
BEGIN
	DECLARE MSG VARCHAR(255);
    #Replace the 4 with Hash length size#
	IF (char_length(NEW.email) = null ) THEN
		SET msg = 'Unable to set email, No email found';
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
DELIMITER ;

#trigger checks for userchecks #
DELIMITER $$
USE `attendencemadeeasy`$$
CREATE
DEFINER=`root`@`localhost`
TRIGGER attendencemadeeasy.userchecks
BEFORE INSERT ON attendencemadeeasy.usertable
FOR EACH ROW
BEGIN
	DECLARE MSG VARCHAR(255);
	IF (NEW.uid = null OR NEW.fname = null OR NEW.lname = null OR NEW.email = null OR NEW.role = null OR NEW.passHash = null) THEN
		SET msg = 'Warning, All fields must be filled';
        SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = msg;
	END IF;
END$$
DELIMITER ;



