CREATE VIEW studentView AS
	SELECT c.idclasses, c.classTime, s.location
    FROM student_attended s, class c
    WHERE s.classes_id = c.idclasses AND c.tid_class = s.classes_id;
    
