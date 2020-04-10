
DROP TRIGGER  IF EXISTS  attendencemadeeasy.PassWordNotHashedError; 

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
	IF (char_length(NEW.passHash) < 56 ) THEN
		SET msg = 'Unable to set password, Not Hashed';
        SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = msg;
	END IF;
END$$
DELIMITER ;


