<?php
if(isset($_GET["CourseID"])){
    $CourseID=$_GET["CourseID"];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "Dollente";

    $connection = new mysqli($servername, $username, $password, $database);

    $sql="DELETE FROM Course WHERE CourseID=$CourseID";
    $connection->query($sql);
}

header("location:/WIS_Dollente/FINALS_Dollente/dashboard.php");
exit;
?>