use attendencemadeeasy;
SET @YOUR_VARIABLE_FOR_THE_STUDENT_ID_HERE = 2;
SELECT  c1.className, c1.weekday, c1.classTime, s1.date, s1.location
FROM attendencemadeeasy.student_attended s1, attendencemadeeasy.class c1
WHERE s1.idStudent = @YOUR_VARIABLE_FOR_THE_STUDENT_ID_HERE AND c1.archived = 1;

use attendencemadeeasy;
SET @YourVAR = 1;
SELECT c1.className, c1.classTime, c1.dataarchived, c1.weekday From attendencemadeeasy.class c1 WHERE c1.tid_class = @YourVAR AND c1.archived = 1;

#Gets the roll for a specified teacher and class from the arichived section
use attendencemadeeasy;
SET @YourTeacherIDVAR = 1;
SET @YourClassIDVAR = 11111;
SELECT ut1.lname, sa1.date, sa1.location 
From attendencemadeeasy.class c1, student_attended sa1, usertable ut1 
WHERE sa1.tid_class = c1.tid_class AND sa1.idStudent = ut1.uid AND c1.tid_class = @YourTeacherIDVAR AND c1.archived = 1;

#Gets the roll for a specified student for a specified class from the archived section
use attendencemadeeasy;
SET @YOUR_VARIABLE_FOR_THE_STUDENT_ID_HERE = 2;
SET @YourClassIDVAR = 11111;
SELECT c1.weekday, c1.classTime, s1.date, s1.location
FROM attendencemadeeasy.student_attended s1, attendencemadeeasy.class c1
WHERE s1.idStudent = @YOUR_VARIABLE_FOR_THE_STUDENT_ID_HERE AND c1.archived = 1 AND @YourClassIDVAR = c1.idclasses;


