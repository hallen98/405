DELIMITER $$
USE `attendencemadeeasy`$$
CREATE
DEFINER=`root`@`localhost`
TRIGGER `attendencemadeeasy`.`PassWordNotHashedError`
BEFORE UPDATE ON `attendencemadeeasy`.`user`
FOR EACH ROW
BEGIN
	DECLARE MSG VARCHAR(255);
	IF (CHAR_LENGTH(user.password) <= 56 ) THEN
		SET msg = 'Unable to set password, Not Hashed';
        SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = msg;
	END IF;
END$$


DELIMITER ;