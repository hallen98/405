use attendencemadeeasy;
SET @YOUR_VARIABLE_FOR_THE_STUDENT_ID_HERE = 2;
SELECT  c1.className, c1.weekday, c1.classTime, s1.date
FROM attendencemadeeasy.student_attended s1, attendencemadeeasy.class c1
WHERE s1.classes_id = c1.idclasses AND s1.tid_class = c1.tid_class AND s1.idStudent = @YOUR_VARIABLE_FOR_THE_STUDENT_ID_HERE;

use attendencemadeeasy;
SET @YourVAR = 1;
SELECT c1.className, c1.classTime, c1.dataarchived, c1.weekday From attendencemadeeasy.class c1 WHERE c1.tid_class = @YourVAR AND c1.archived = 1;