use attendencemadeeasy;
insert into user(uid,fname,lname,email,role,password)
values('00000001','John', 'Snow', 'JS@gmail.com', 1,'youknownothing');

INSERT INTO student(sid,User_uid)
SELECT user.uid,user.uid
FROM user
WHERE user.role = 1;