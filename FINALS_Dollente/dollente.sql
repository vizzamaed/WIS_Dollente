create database Dollente;
use Dollente;
create table Users(
    UsersID int Primary Key,
    Username varchar(255),
    Email varchar(255),
    Password varchar(255)
);

create table Student(
    StudentID int Primary Key,
    Firstname varchar(255),
    Lastname varchar(255),
    DateOFBirth DATE,
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