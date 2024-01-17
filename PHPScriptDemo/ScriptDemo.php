<?php
$servername="localhost";
$username="root";
$password="";
$dbname="PHPScriptDemo";

//Create connection
$conn = new mysqli ($servername, $username, $password, $dbname);

//Check connection
if ($conn->connect_error){
    die("Connection failed:" . $conn->connect_error);
}
echo "Connected successfully", "<br>";

$sql="SELECT * FROM Student";
$result=$conn->query($sql);

if($result){
    //Process the results
    while ($row = $result->fetch_assoc()){
        echo "Student ID: " . $row["StudentID"]." - Firstname: " . $row["Firstname"].
        " - Lastname: " . $row["Lastname"]. " - Date of Birth: " . $row["DateOfBirth"].
        " - Email: " . $row["Email"]. " - Phone: " . $row["Phone"]."<br>";
    }
}else{
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$sql = "SELECT * FROM Course";
$result=$conn->query($sql);

if ($result){
    //Process the results
    while ($row=$result->fetch_assoc()){
        echo "Course ID: " . $row["CourseID"]. " - CourseName: " . $row["CourseName"]."",
        " - Credits: ". $row["Credits"]. "<br>";
    }
}else{
    echo "Error: ".$sql."<br>".$conn->error;
}

$sql = "SELECT * FROM Enrollment";
$result=$conn->query($sql);

if ($result){
    //Process the results
    while ($row=$result->fetch_assoc()){
        echo "Enrollment ID: ".$row["EnrollmentID"]." - StudentID: ".$row["StudentID"]. 
        " - CourseID: " .$row["CourseID"]." - Enrollment Date: " .$row["EnrollmentDate"]. 
        " - Grade: " .$row["Grade"]."<br>";
    }
}else{
    echo "Error: ".$sql."<br>".$conn->error;
}
?>