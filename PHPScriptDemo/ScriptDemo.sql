create database PHPScriptDemo;
use PHPScriptDemo;
create table Student(
    StudentID int Primary Key,
    Firstname varchar(255),
    Lastname varchar(255),
    DateOfBirth DATE,
    Email varchar(255),
    Phone int NOT NULL
);

create table Course(
    CourseID INT Primary Key,
    CourseName varchar (255),
    Credits varchar(255)
);

create table Instructor(
    InstructorID int Primary Key,
    Firstname varchar(255),
    Lastname varchar(255),
    Email varchar(255),
    Phone int NOT NULL
);

create table Enrollment(
    EnrollmentID int Primary Key,
    StudentID int,
    Foreign Key (StudentID) References Student (StudentID),
    CourseID int,
    Foreign Key (CourseID) References Course (CourseID),
    EnrollmentDate DATE,
    Grade int NOT NULL
);

insert into Student(StudentID, Firstname, Lastname, DateOfBirth, Email, Phone)
values(2133, "Guaca", "Lou",11/30/2019,"guacalou@gmail.com",09666205950);

UPDATE student SET DateOfBirth="2002-11-30" WHERE StudentID = 2133;

insert into Course(CourseID, CourseName, Credits)
values(1, "CIT17","3.0");

insert into Instructor(InstructorID, Firstname, Lastname, Email, Phone)
values(2244, "Itang", "Babi","itangbabi@gmail.com",09888205955);

insert into Enrollment(EnrollmentID, StudentID, CourseID, EnrollmentDate, Grade)
values(13, 2133,1, 2021-05-01,80);

UPDATE enrollment SET EnrollmentDate="2021-05-01" WHERE StudentID = 2133;
