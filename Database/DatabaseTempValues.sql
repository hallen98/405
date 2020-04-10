INSERT INTO `attendencemadeeasy`.`usertable` (`uid`, `fname`, `lname`, `email`, `role`, `passHash`) VALUES ('1', 'Qin', 'Long', 'QL@gmail.com', '1', '1');
INSERT INTO `attendencemadeeasy`.`usertable` (`uid`, `fname`, `lname`, `email`, `role`, `passHash`) VALUES ('2', 'Thrax', 'Prete', 'PT@gmail.com', '0', '2');
INSERT INTO `attendencemadeeasy`.`teacher` (`tid`, `User_uid`) VALUES ('00000001', '00000001');
INSERT INTO `attendencemadeeasy`.`student` (`sid`, `User_uid`) VALUES ('00000002', '00000002');
INSERT INTO `attendencemadeeasy`.`class` (`idclasses`, `tid_class`, `location`, `className`, `classTime`, `weekday`) VALUES ('11011', '00000001', 'NETH', 'CSC 101', '11:30', '3');
INSERT INTO `attendencemadeeasy`.`class` (`idclasses`, `tid_class`, `location`, `className`, `classTime`, `dataarchived`, `archived`, `weekday`) VALUES ('11111', '00000001', 'NETH', 'CSC 102', '17:30', '2020-03-31 21:21:08', ?, '3');
INSERT INTO `attendencemadeeasy`.`student_attended` (`idStudent`, `classes_id`, `tid_class`, `time`, `date`) VALUES ('2', '11011', '1', '11:30', '2020-03-31');
INSERT INTO `attendencemadeeasy`.`student_has_classes` (`sid`, `classes_idclasses`, `classes_teacher_idteacher`) VALUES ('2', '11011', '1');
INSERT INTO `attendencemadeeasy`.`student_inclass` (`sid`, `classes_idclasses`, `classes_teacher_idteacher`) VALUES ('2', '11011', '1');