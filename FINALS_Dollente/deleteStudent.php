<?php
if(isset($_GET["StudentID"])){
    $StudentID=$_GET["StudentID"];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "Dollente";

    $connection = new mysqli($servername, $username, $password, $database);

    $sql="DELETE FROM Student WHERE StudentID=$StudentID";
    $connection->query($sql);
}

header("location:/WIS_Dollente/FINALS_Dollente/dashboard.php");
exit;
?>