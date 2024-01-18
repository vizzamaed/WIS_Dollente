<?php
$servername="localhost";
$username="root";
$password="";
$dbname="Dollente";

//Create connection
$conn=new mysqli($servername,$username,$password,$dbname);

//Check connection
if ($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}

//Create database
$sql = "CREATE DATABASE IF NOT EXISTS $dbname ";
if ($conn->query($sql)===TRUE){
    echo "Database created successfully <br>";
}else{
    echo "Error creating database: " . $conn->error;
}

//Select Database
$retval=mysqli_select_db($conn, 'Dollente');
//Create tables
$sql= "CREATE TABLE Users(
    UsersID int Primary Key,
    Username varchar(255),
    Email varchar(255),
    Password varchar(255))";

    if ($conn->query($sql)===TRUE){
        echo "<br>Users table created successfully<br>";
    }else{
        echo "Error creating table: " . $conn->error;
    }

$sql = "CREATE TABLE IF NOT EXISTS Student(
    StudentID int Primary Key,
    Firstname varchar(255),
    Lastname varchar(255),
    DateOfBirth DATE,
    Email varchar(255),
    Phone int NOT NULL)";

    if ($conn->query($sql)===TRUE){
        echo "Student table created successfully <br>";
    }else{
        echo "Error creating table: " . $conn->error;
    }
    
$sql = "CREATE TABLE IF NOT EXISTS Course (
    CourseID INT Primary Key,
    CourseName varchar(255),
    Credits varchar(255))";

    if($conn->query($sql)===TRUE){
        echo "Course table created successfully <br>";
    }else{
        echo "Error creating table: " . $conn->error;
    }
    
$sql = "CREATE TABLE IF NOT EXISTS Instructor (
    InstructorID int Primary Key,
    Firstname varchar(255),
    Lastname varchar(255),
    Email varchar(255),
    Phone int NOT NULL)";

    if ($conn->query($sql)===TRUE) {
        echo "Instructor table created successfully <br>";
    }else{
        echo "Error creating table: " . $conn->error;
    }
    
$sql = "CREATE TABLE IF NOT EXISTS Enrollment (
    EnrollmentID int Primary Key,
    StudentID int,
    CourseID int,
    Foreign Key (StudentID) References Student(StudentID),
    Foreign Key (CourseID) References Course(CourseID),
    EnrollmentDate DATE,
    Grade int NOT NULL)";

    if ($conn->query($sql)===TRUE) {
        echo "Enrollment Table created successfully <br>";
    }else{
        echo "Error creating table: " . $conn->error;
    }

$conn->close();
?>
    