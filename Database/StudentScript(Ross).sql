use attendencemadeeasy;
SET sid = YOUR_VARIABLE_FOR_THE_STUDENT_ID_HERE;
SELECT  c1.className, c1.weekday, c1.classTime, s1.date
FROM attendencemadeeasy.student_attended s1, attendencemadeeasy.class c1
WHERE s1.classes_id = c1.idclasses AND s1.tid_class = c1.tid_class AND s1.idStudent = YOUR_VARIABLE_FOR_THE_STUDENT_ID_HERE;
