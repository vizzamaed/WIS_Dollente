<?php
if(isset($_GET["UsersID"])){
    $UsersID=$_GET["UsersID"];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "Dollente";

    $connection = new mysqli($servername, $username, $password, $database);

    $sql="DELETE FROM Users WHERE UsersID=$UsersID";
    $connection->query($sql);
}

header("location:/WIS_Dollente/FINALS_Dollente/dashboard.php");
exit;
?>