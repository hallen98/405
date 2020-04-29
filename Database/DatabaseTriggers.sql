

DROP TRIGGER  IF EXISTS  attendencemadeeasy.PassWordNotHashedError; 
#trigger checks for passHash size on update#
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


DROP TRIGGER  IF EXISTS  attendencemadeeasy.nullemail;
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


DROP TRIGGER  IF EXISTS  attendencemadeeasy.roleassign;
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
		INSERT INTO student(sid, User_uid)
        VALUES(NEW.uid,NEW.uid);
	END IF;
    IF (NEW.role > 1) THEN
		SET msg = 'Warning,Role assign has an unknown value';
        SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = msg;
	END IF;
END$$
DELIMITER ;


DROP TRIGGER  IF EXISTS  attendencemadeeasy.userchecks;
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


DROP TRIGGER  IF EXISTS  attendencemadeeasy.InsertPassWordNotHashedError;
#trigger checks for passHash size on insert#
DELIMITER $$
USE `attendencemadeeasy`$$
CREATE
DEFINER=`root`@`localhost`
TRIGGER attendencemadeeasy.InsertPassWordNotHashedError
BEFORE INSERT ON attendencemadeeasy.usertable
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

#BEGIN STUDENT DELETE TRIGGERS
DROP TRIGGER  IF EXISTS  attendencemadeeasy.deletestudent;
#trigger checks for passHash size on insert#
DELIMITER $$
USE `attendencemadeeasy`$$
CREATE
DEFINER=`root`@`localhost`
TRIGGER attendencemadeeasy.deletestudent
BEFORE DELETE ON attendencemadeeasy.student
FOR EACH ROW
BEGIN
	DELETE FROM attendencemadeeasy.student_attended USING attendencemadeeasy.student_attended WHERE OLD.User_uid = idStudent;
END$$
DELIMITER ;

DROP TRIGGER  IF EXISTS  attendencemadeeasy.deletestudentattend;
DELIMITER $$
USE `attendencemadeeasy`$$
CREATE
DEFINER=`root`@`localhost`
TRIGGER attendencemadeeasy.deletestudentattended
BEFORE DELETE ON attendencemadeeasy.student_attended
FOR EACH ROW
BEGIN
	DELETE FROM attendencemadeeasy.student_has_classes USING attendencemadeeasy.student_has_classes WHERE OLD.idStudent = sid;
END$$
DELIMITER ;

DROP TRIGGER  IF EXISTS  attendencemadeeasy.deletestudentclass;
DELIMITER $$
USE `attendencemadeeasy`$$
CREATE
DEFINER=`root`@`localhost`
TRIGGER attendencemadeeasy.deletestudentclass
BEFORE DELETE ON attendencemadeeasy.student
FOR EACH ROW
BEGIN
	DELETE FROM student_inclass USING attendencemadeeasy.student_inclass WHERE OLD.User_uid = sid;
END$$
DELIMITER ;

#BEGIN STUDENTCLASS INSERT TRIGGERS
DROP TRIGGER  IF EXISTS  attendencemadeeasy.insertstudentclass;
DELIMITER $$
USE `attendencemadeeasy`$$
CREATE
DEFINER=`root`@`localhost`
TRIGGER attendencemadeeasy.insertstudentclass
AFTER INSERT ON attendencemadeeasy.student_inclass
FOR EACH ROW
BEGIN
	INSERT INTO student_has_classes(sid,classes_idclasses, classes_teacher_idteacher) VALUES(NEW.sid,NEW.classes_idclasses,NEW.classes_teacher_idteacher);
END$$
DELIMITER ;

#BEGIN CLASS DELETE TRIGGERS
DROP TRIGGER  IF EXISTS  attendencemadeeasy.classdelete;
DELIMITER $$
USE `attendencemadeeasy`$$
CREATE
DEFINER=`root`@`localhost`
TRIGGER attendencemadeeasy.classdelete
BEFORE DELETE ON attendencemadeeasy.class
FOR EACH ROW
BEGIN
	DELETE FROM student_inclass USING attendencemadeeasy.student_inclass WHERE OLD.idclasses = classes_idclasses AND OLD.tid_class = classes_teacher_idteacher;
END$$
DELIMITER ;
