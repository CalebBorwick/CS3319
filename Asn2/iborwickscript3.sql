-- open the database
USE iborwickassign2db;

-- 1
SELECT coursename FROM westerncourse;

-- 2
SELECT DISTINCT(coursecode) FROM outsidecourse;

-- 3
SELECT * FROM westerncourse ORDER BY coursename;

-- 4
SELECT coursenum, coursename FROM westerncourse WHERE weight='0.5';

-- 5
SELECT outsidecourse.coursecode, outsidecourse.name FROM outsidecourse INNER JOIN universities ON outsidecourse.uninumber = universities.uninumber WHERE officialname = 'University Of Toronto';

-- 6
SELECT name FROM outsidecourse WHERE name LIKE '%Introduction%';

-- 7
SELECT eqivalent.coursecode, universities.officialname, eqivalent.coursenum, eqivalent.dateapproved FROM eqivalent INNER JOIN universities ON eqivalent.uninumber = universities.uninumber WHERE eqivalent.dateapproved >=(SELECT(DATE_SUB(CURDATE(), INTERVAL 5 YEAR)));

-- 8
SELECT eqivalent.coursecode, universities.nickname FROM eqivalent INNER JOIN universities ON eqivalent.uninumber = universities.uninumber WHERE coursenum = 'cs1026';

-- 9 
SELECT COUNT(coursecode) FROM eqivalent WHERE coursenum = 'cs1026';

-- 10
SELECT eqivalent.coursenum, eqivalent.coursecode, universities.nickname FROM eqivalent INNER JOIN universities ON eqivalent.uninumber = universities.uninumber WHERE universities.city = 'Waterloo' AND universities.provincecode='ON';

-- 11
SELECT officialname FROM universities where uninumber NOT IN (SELECT uninumber FROM eqivalent);

-- 12
SELECT DISTINCT westerncourse.coursename, westerncourse.coursenum FROM westerncourse INNER JOIN eqivalent ON eqivalent.coursenum = westerncourse.coursenum INNER JOIN outsidecourse ON eqivalent.coursecode = outsidecourse.coursecode WHERE outsidecourse.yearofstudy = 3 OR 4;

-- 13 
SELECT westerncourse.coursename FROM westerncourse INNER JOIN eqivalent ON eqivalent.coursenum = westerncourse.coursenum GROUP BY westerncourse.coursename HAVING COUNT(westerncourse.coursename) > 1;

-- 14
SELECT 
    westerncourse.coursenum AS 'Western Course Number', 
    westerncourse.coursename AS 'Western Course Name', 
    westerncourse.weight AS 'Course Weight', 
    outsidecourse.name AS 'Other University Course Name',
    universities.officialname AS 'University Name',
    outsidecourse.weight AS 'Other Course Weight'
FROM westerncourse
INNER JOIN eqivalent ON eqivalent.coursenum = westerncourse.coursenum 
INNER JOIN outsidecourse ON eqivalent.coursecode = outsidecourse.coursecode
INNER JOIN universities ON universities.uninumber = outsidecourse.uninumber
WHERE NOT westerncourse.weight = outsidecourse.weight;
    