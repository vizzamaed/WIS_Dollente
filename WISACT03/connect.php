<?php
$servername= "localhost";
$username="root";
$password="";
$dbname="studentinfo";

//Create connection
$conn= new mysqli($servername,$username,$password,$dbname);

//Check connection
if ($conn->connect_error){
    die("Connection failed: ".$conn->connect_error);
}
echo "Connected Successfully";

//Insert Data
$id =1;
$username="JohnDoe";
$email="john@example.com";

$sql="INSERT INTO users(id, username,email)VALUES ('$id','$username','$email')";

if ($conn->query($sql)===TRUE){
    echo "Record created successfully";
    $id +=1;
}else{
    echo "Error: ".$sql."<br>".$conn->error;
}

//Select data
$sql="SELECT id,username,email FROM users";
$result=$conn->query($sql);

//Check if the query was successful
if ($result->num_rows>0){
    while($row=$result->fetch_assoc()){
        echo "<br> ID: ".$row["id"]."- Username: ".$row["username"]."- Email: ".$row["email"]."<br>";
    }
} else {
        echo "0 results";
    }





// Update data
$newUsername = "JohnDoeUpdated";
$idToUpdate=1;

$sql = "UPDATE users SET username='$newUsername' WHERE id=$idToUpdate";

if ($conn->query($sql)===TRUE){
    echo "Record updated successfully";
}else{
    echo "Error updating record: ".$conn->error;
}

//Select Updated data
$sql= "SELECT id, username, email FROM users";
$result=$conn->query($sql);

if ($result->num_rows>0){
    while($row=$result->fetch_assoc()){
        echo "<br> ID: ".$row["id"]."- Username: ".$row["username"]."- Email: ".$row["email"]."<br>";
    }
} else {
    echo "0 results";
}


//Delete data
$idToDelete=1;

$sql="DELETE FROM users WHERE id=$idToDelete";

if ($conn->query($sql)===TRUE){
    echo "Record deleted successfully";
}else{
    echo "Error deleting record: ". $conn->error;
}

//Select Updated Deleted data
$sql = "SELECT id, username, email FROM users";
$result = $conn->query($sql);

if ($result->num_rows>0){
    while($row=$result->fetch_assoc()){
        echo "<br> ID: ".$row["id"]."- Username: ".$row["username"]."- Email: ".$row["email"]."<br>";
    }
}else{
    echo "<br> 0 results";
}

//Close connection
$conn->close();

?>
