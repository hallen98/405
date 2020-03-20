# Shows the Id Class, ClassTime, Location#
CREATE VIEW studentView AS
	SELECT c.idclasses, c.className , c.classTime, s.location
    FROM student_attended s, class c
    WHERE s.classes_id = c.idclasses AND c.tid_class = s.classes_id AND c.archived = 0;
    
# You should call this as a function #
CREATE VIEW archivedView AS
	SELECT c.className, c.classTime, c.Archived
    FROM class c, teacher t
    WHERE c.Archived = 1 AND t.tid = c.tid_class;

CREATE VIEW currentClassesView AS
	SELECT c.className, c.weekday, c.classTime, c.idclasses
	FROM class c
    WHERE c.Archived = 0
