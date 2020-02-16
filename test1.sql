use attendencemadeeasy;
insert into user(uid,fname,lname,email,role,password)
values('00000001','John', 'Snow', 'JS@gmail.com', 1,'youknownothing'),
('00000002','Hunter', 'Allen', 'HA@gmail', 0,'youknowsomething');
insert into class(idclasses,tid_class,location,className,classTime,dataarchived,archived)
values('626','00000002', 'Soviet Russia', 'Gulag 101', '1:00' ,NULL,0);

/* This function pushes the user.uid to the student.sid if the user role is 1[student]*/
INSERT INTO student(sid,User_uid)
SELECT user.uid,user.uid
FROM user
WHERE user.role = 1;

/* This function pushes the user.uid to the teacher.sid if the user role is 0[teacher]*/
INSERT INTO teacher(tid,User_uid)
SELECT user.uid,user.uid
FROM user
WHERE user.role = 0;

/*This function pushes a student to have a class where the class ID = 626*/
INSERT INTO student_has_classes(sid,classes_idclasses,classes_teacher_idteacher)
SELECT s.sid,c.idclasses,c.tid_class
FROM student s, class c
WHERE c.idclasses = 626;
