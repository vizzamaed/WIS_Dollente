<?php
if(isset($_GET["InstructorID"])){
    $InstructorID=$_GET["InstructorID"];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "Dollente";

    $connection = new mysqli($servername, $username, $password, $database);

    $sql="DELETE FROM Instructor WHERE InstructorID=$InstructorID";
    $connection->query($sql);
}

header("location:/WIS_Dollente/FINALS_Dollente/dashboard.php");
exit;
?>