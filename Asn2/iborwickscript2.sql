-- open the database and prove all are empty
USE iborwickassign2db;

SELECT * FROM universities; 
SELECT * FROM westerncourse;
SELECT * FROM outsidecourse;
SELECT * FROM eqivalent;

-- load data into univerity table 
SELECT * FROM universities;

LOAD DATA LOCAL INFILE 'UniInputFile.csv' INTO TABLE universities
    FIELDS TERMINATED BY ',';
SELECT * FROM universities;

-- load data into westerncourses table
SELECT * FROM westerncourse;

INSERT INTO westerncourse (coursenum, coursename, weight, suffix) VALUES("cs1026", "Computer Science Fundamentals I", 0.5, "A/B");
INSERT INTO westerncourse (coursenum, coursename, weight, suffix) VALUES("cs1027", "Computer Science Fundamentals II", 0.5, "A/B");
INSERT INTO westerncourse (coursenum, coursename, weight, suffix) VALUES("cs2210", "Algorithms and Data Structures", 1.0, "A/B");
INSERT INTO westerncourse (coursenum, coursename, weight, suffix) VALUES("cs3319", "Databases I", 0.5, "A/B");
INSERT INTO westerncourse(coursenum, coursename, weight, suffix) VALUES ("cs2120", "Modern Survival Skills I: Coding Essentials", 0.5, "A/B");
INSERT INTO westerncourse (coursenum, coursename, weight, suffix) VALUES("cs4490", "Thesis", 0.5, "Z");
INSERT INTO westerncourse(coursenum, coursename, weight, suffix) VALUES("cs0020", "Intro to Coding using Pascal and Fortran", 1.0, "");
INSERT INTO westerncourse(coursenum, coursename, weight, suffix) VALUES("cs4412", "AI Categorization Modeling", 0.5, "A/B");

SELECT * FROM westerncourse;

-- load data into univerity table 
SELECT * FROM universities;
INSERT INTO universities (uninumber, officialname, city, provincecode, nickname) VALUES (12, "Hogwarts School of WitchCraft and Wizardry", "Calgary", "AB", "Hogwarts");
SELECT * FROM universities;

-- load data into outsidecourse table 
SELECT * FROM outsidecourse;

-- UofT
SELECT * FROM outsidecourse;
INSERT INTO outsidecourse(coursecode, name, yearofstudy, weight, uninumber) VALUES ("CompSci022", "Introduction to Programming", 1, 0.5, 2);
INSERT INTO outsidecourse(coursecode, name, yearofstudy, weight, uninumber) VALUES ("CompSci033", "Intro to Programming for Med students", 3, 0.5, 2);
INSERT INTO outsidecourse (coursecode, name, yearofstudy, weight, uninumber) VALUES ("CompSci021", "Packages", 1, 0.5, 2);
INSERT INTO outsidecourse (coursecode, name, yearofstudy, weight, uninumber) VALUES ("CompSci222", "Introduction to Databases", 2, 1.0, 2);
INSERT INTO outsidecourse (coursecode, name, yearofstudy, weight, uninumber) VALUES ("CompSci023", "Advanced Programming", 1, 0.5, 2);
SELECT * FROM outsidecourse;

-- Waterloo
SELECT * FROM outsidecourse;
INSERT INTO outsidecourse (coursecode, name, yearofstudy, weight, uninumber) VALUES ("CompSci011", "Intro to Computer Science", 2, 0.5,4);
INSERT INTO outsidecourse (coursecode, name, yearofstudy, weight, uninumber) VALUES ("CompSci123", "Using UNIX", 2, 0.5,4);
SELECT * FROM outsidecourse;

-- UBC
SELECT * FROM outsidecourse;
INSERT INTO outsidecourse (coursecode, name, yearofstudy, weight, uninumber) VALUES ("CompSci021", "Intro Programming", 1, 1.0, 66);
INSERT INTO outsidecourse (coursecode, name, yearofstudy, weight, uninumber) VALUES ("CompSci022", "Advanced Programming", 1, 0.5,66);
INSERT INTO outsidecourse (coursecode, name, yearofstudy, weight, uninumber) VALUES ("CompSci319", "Using Databases", 3, 0.5,66);
SELECT * FROM outsidecourse;

-- MAC
SELECT * FROM outsidecourse;
INSERT INTO outsidecourse (coursecode, name, yearofstudy, weight, uninumber) VALUES ("CompSci333", "Graphics", 3, 0.5,55);
INSERT INTO outsidecourse (coursecode, name, yearofstudy, weight, uninumber) VALUES ("CompSci444", "Networks", 4, 0.5, 55);
SELECT * FROM outsidecourse;

-- Laurier
SELECT * FROM outsidecourse;
INSERT INTO outsidecourse (coursecode, name, yearofstudy, weight, uninumber) VALUES ("CompSci022", "Using Packages", 1, 0.5, 77);
INSERT INTO outsidecourse (coursecode, name, yearofstudy, weight, uninumber) VALUES ("CompSci101", "Introduction to Using Data Structures", 2, 0.5,77);
SELECT * FROM outsidecourse;


-- Hogwarts 
SELECT * FROM outsidecourse;
INSERT INTO outsidecourse (coursecode, name, yearofstudy, weight, uninumber) VALUES ("CompSci121", "Computer Potions", 4, 0.5,12);
INSERT INTO outsidecourse (coursecode, name, yearofstudy, weight, uninumber) VALUES ("CompSci212", "Defense Against Dark Web", 3, 1.0,12);

SELECT * FROM outsidecourse;


-- loading data into eqivalent table 
SELECT * FROM eqivalent;

INSERT INTO eqivalent (coursenum, coursecode, uninumber, dateapproved) VALUES ("cs1026", "CompSci022", 2, '2015-05-12');
INSERT INTO eqivalent (coursenum, coursecode, uninumber, dateapproved) VALUES ("cs1026", "CompSci033", 2, '2013-01-02');
INSERT INTO eqivalent (coursenum, coursecode, uninumber, dateapproved) VALUES ("cs1026", "CompSci011", 4, '1997-02-09');
INSERT INTO eqivalent (coursenum, coursecode, uninumber, dateapproved) VALUES ("cs1026", "CompSci021", 66, '2010-01-12');
INSERT INTO eqivalent (coursenum, coursecode, uninumber, dateapproved) VALUES ("cs1027", "CompSci023", 2, '2017-06-22');
INSERT INTO eqivalent (coursenum, coursecode, uninumber, dateapproved) VALUES ("cs1027", "CompSci022", 66, '2019-09-01');
INSERT INTO eqivalent (coursenum, coursecode, uninumber, dateapproved) VALUES ("cs2210", "CompSci101", 77, '1998-07-12');
INSERT INTO eqivalent (coursenum, coursecode, uninumber, dateapproved) VALUES ("cs3319", "CompSci222", 2, '1990-09-13');
INSERT INTO eqivalent (coursenum, coursecode, uninumber, dateapproved) VALUES ("cs3319", "CompSci319", 66, '1987-09-21');
INSERT INTO eqivalent (coursenum, coursecode, uninumber, dateapproved) VALUES ("cs2120", "CompSci022", 2, '2018-12-10');
INSERT INTO eqivalent (coursenum, coursecode, uninumber, dateapproved) VALUES ("cs0020", "CompSci022", 2, '1999-09-17');

SELECT * FROM eqivalent;

-- Updating scripts
SELECT * FROM eqivalent;
UPDATE eqivalent SET dateapproved = '2018-09-19' WHERE coursenum = "cs0020";
SELECT * FROM eqivalent;

SELECT * FROM outsidecourse;
UPDATE outsidecourse SET yearofstudy=1 WHERE name LIKE '%Intro%';
SELECT * FROM outsidecourse;

SELECT * FROM universities; 
SELECT * FROM westerncourse;
SELECT * FROM outsidecourse;
SELECT * FROM eqivalent;