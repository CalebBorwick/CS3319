-- iborwick script 

-- build the database
SHOW databases;
DROP DATABASE IF EXISTS iborwickassign2db;
CREATE DATABASE iborwickassign2db;
USE iborwickassign2db;

-- grant access 
GRANT USAGE ON *.* TO 'ta'@'localhost';
DROP USER 'ta'@'localhost';
CREATE USER 'ta'@'localhost' IDENTIFIED BY 'cs3319';
GRANT ALL PRIVILEGES ON yourwesternuseridassign2db.* TO 'ta'@'localhost';
FLUSH PRIVILEGES;

-- create tables
SHOW TABLES;
CREATE TABLE universities(uninumber int NOT NULL,
                          officialname VARCHAR(50) NOT NULL,
                          city VARCHAR(20) NOT NULL, 
                          provincecode VARCHAR(20) NOT NULL,
                          nickname VARCHAR(20) NOT NULL,
                          PRIMARY KEY (uninumber));
                            
CREATE TABLE westerncourse(coursenum VARCHAR(6) NOT NULL, 
                           coursename VARCHAR(50) NOT NULL, 
                           weight decimal(3,2) NOT NULL, 
                           suffix VARCHAR(20), 
                           PRIMARY KEY (coursenum));
                            
CREATE TABLE outsidecourse(coursecode VARCHAR(10) NOT NULL, 
                           name VARCHAR(50) NOT NULL, 
                           yearofstudy int NOT NULL, 
                           weight decimal(3,2) NOT NULL, 
                           uninumber int NOT NULL,
                           PRIMARY KEY(coursecode, uninumber), 
                           FOREIGN KEY (uninumber) REFERENCES universities (uninumber));
                            
CREATE TABLE eqivalent(coursenum VARCHAR(6) NOT NULL,
                       coursecode VARCHAR(10) NOT NULL, 
                       uninumber int NOT NULL,
                       dateapproved date NOT NULL,
                       FOREIGN KEY (coursenum) REFERENCES westerncourse (coursenum) 
                       ON DELETE CASCADE,  
                       FOREIGN KEY (coursecode) REFERENCES outsidecourse (coursecode) 
                       ON DELETE CASCADE, 
                       FOREIGN KEY (uninumber) REFERENCES universities (uninumber));
SHOW TABLES;
