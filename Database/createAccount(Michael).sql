use attendencemadeasy;
INSERT INTO uid(uid, fname, lname, email, role, passHash)# if Role != 0 then the role is teacher
VALUES(NEW.uid,NEW.fname, NEW.lname, NEW.email, NEW.role, NEW.passHash); #insert the values in the order listed above as order matters here