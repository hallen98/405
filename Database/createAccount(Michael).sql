use attendencemadeasy;
SET @YOUR_VARIABLE_FOR_THE_STUDENT_ID_HERE = 2; #The Format for setting variables in sql is as follows {SET @Variablename = SOMETHING;} remove brackets
INSERT INTO usertable(uid, fname, lname, email, role, passHash)# if Role != 0 then the role is teacher
VALUES(NEW.uid,NEW.fname, NEW.lname, NEW.email, NEW.role, NEW.passHash); #insert the values in the order listed above as order matters here