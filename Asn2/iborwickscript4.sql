-- open the database
USE iborwickassign2db;

-- Create a view and show it
CREATE OR REPLACE VIEW otherUniCourseInfo AS SELECT DISTINCT 
    outsidecourse.coursecode, 
    universities.officialname, 
    universities.nickname, 
    universities.city, 
    eqivalent.coursenum 
FROM eqivalent
INNER JOIN outsidecourse ON eqivalent.coursecode = outsidecourse.coursecode
INNER JOIN universities ON universities.uninumber = eqivalent.uninumber
WHERE yearofstudy = 1;

-- show all rows
SELECT * from otherUniCourseInfo;

-- show only nickname UofT ordered by UWO course code
SELECT * from otherUniCourseInfo WHERE nickname = 'UofT' ORDER BY coursenum;

-- show all universities table info
SELECT * FROM universities; 


-- delete any row with nickname containing cord
DELETE FROM universities WHERE nickname LIKE '%cord%';

-- show all universities table info
SELECT * FROM universities; 

-- delete any university from ontario
DELETE FROM universities WHERE provincecode = 'ON';

-- when you try to delete a university it can cause an error to occur if it has any courses offered by it in the outside courses table and it wont let the university to be deleted. YOu would need to delete the coruses firs or have an ON DELETE function such as CASCADE 

-- show all universities table info
SELECT * FROM universities; 

-- Show all info from the outsidecourse table and the university its asscociatted with 
SELECT * FROM outsidecourse INNER JOIN universities ON outsidecourse.uninumber = universities.uninumber;

-- delete all courses from the city waterloo 
DELETE outsidecourse FROM outsidecourse INNER JOIN universities ON universities.uninumber = outsidecourse.uninumber WHERE city = 'Waterloo';

-- Show all info from the outsidecourse table and the university its asscociatted with and the affected tables 
SELECT * FROM outsidecourse INNER JOIN universities ON outsidecourse.uninumber = universities.uninumber;
SELECT * FROM outsidecourse; 
SELECT * FROM eqivalent;

-- show all rows
SELECT * from otherUniCourseInfo;