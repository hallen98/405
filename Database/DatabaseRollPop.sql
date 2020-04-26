#DROP EVENT IF EXISTS studentroll;
DELIMITER $$
CREATE EVENT studentroll 
ON SCHEDULE 
EVERY 1 day_hour  
DO 
BEGIN
	SET @curr = weekday(curdate());
	INSERT INTO `attendencemadeeasy`.`student_attended` (`idStudent`, `classes_id`, `tid_class`, `date`) 
	SELECT shc.sid, c.idclasses,c.tid_class,CURDATE()
	FROM attendencemadeeasy.class c, attendencemadeeasy.student_has_classes shc 
	WHERE c.archived = 0 AND shc.classes_idclasses = c.idclasses AND((c.weekday IN ("MWF","W","M","F") AND @curr IN (0,2,4)) XOR (c.weekday IN ("TR","T","R") AND @curr IN (1,3)) XOR (c.weekday IN ("S") AND @curr IN (6)));
END;
DELIMITER;
