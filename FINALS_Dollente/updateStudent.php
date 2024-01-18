<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "Dollente";

$connection = new mysqli($servername, $username, $password, $database);

$StudentID="";
$Firstname="";
$Lastname="";
$DateOfBirth="";
$Email="";
$Phone="";

$errorMessage="";
$successMessage="";

if($_SERVER['REQUEST_METHOD']=='GET'){
    if(!isset($_GET["StudentID"])){
        header("location:/WIS_Dollente/FINALS_Dollente/dashboard.php");
        exit;
    }

    $StudentID=$_GET["StudentID"];

    $sql="SELECT * FROM Student WHERE StudentID=$StudentID";
    $result=$connection->query($sql);
    $row=$result->fetch_assoc();

    if (!$row){
        header("location:/WIS_Dollente/FINALS_Dollente/dashboard.php");
        exit;
    }


    $Firstname=$row["Firstname"];
    $Lastname=$row["Lastname"];
    $DateOfBirth=$row["DateOfBirth"];
    $Email=$row["Email"];
    $Phone=$row["Phone"];

}
else{

    $StudentID=$_POST["StudentID"];
    $Firstname=$_POST["Firstname"];
    $Lastname=$_POST["Lastname"];
    $DateOfBirth=$_POST["DateOfBirth"];
    $Email=$_POST["Email"];
    $Phone=$_POST["Phone"];

    do{
        if(empty($StudentID)||empty($Firstname)||empty($Lastname)||empty($DateOfBirth)||empty($Email)||empty($Phone)){
            $errorMessage="All the fields are required";
            break;
        }

        $sql = "UPDATE Student " . 
    "SET Firstname='$Firstname', Lastname='$Lastname', DateOfBirth='$DateOfBirth', Email='$Email', Phone='$Phone' " .
    "WHERE StudentID=$StudentID";

        
        $result=$connection->query($sql);

        if(!$result){
            $errorMessage="Invalid query:".$connection->error;
            break;
         }

         $successMessage="Student Account updated successfully";
         header("location:/WIS_Dollente/FINALS_Dollente/dashboard.php");
        exit;

    }while(false);

}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Student Account</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .card {
            margin-top: 50px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h2 class="text-center">Update Student Account</h2>
                    </div>
                    <div class="card-body">
                        <?php if(!empty($errorMessage)): ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong><?php echo $errorMessage; ?></strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php endif; ?>

                        <form method="post">
                            <input type="hidden" name="StudentID" value="<?php echo $StudentID; ?>">
                            <div class="row mb-3">
                                <label for="Firstname" class="form-label">First Name</label>
                                <input type="text" class="form-control" id="Firstname" name="Firstname" value="<?php echo $Firstname; ?>">
                            </div>
                            <div class="row mb-3">
                                <label for="Lastname" class="form-label">Last Name</label>
                                <input type="text" class="form-control" id="Lastname" name="Lastname" value="<?php echo $Lastname; ?>">  
                            </div>
                            <div class="row mb-3">
                                <label for="DateOfBirth" class="form-label">Birthdate</label>
                                <input type="text" class="form-control" id="DateOfBirth" name="DateOfBirth" value="<?php echo $DateOfBirth; ?>">  
                            </div>
                            <div class="row mb-3">
                                <label for="Email" class="form-label">Email</label>
                                <input type="text" class="form-control" name="Email" value="<?php echo $Email; ?>">  
                            </div>
                            <div class="row mb-3">
                                <label for="Phone" class="form-label">Phone</label>
                                <input type="text" class="form-control" name="Phone" value="<?php echo $Phone; ?>">  
                            </div>
                            

                                <?php if(!empty($successMessage)): ?>
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <strong><?php echo $successMessage; ?></strong>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                <?php endif; ?>

                            <div class="row mb-3">
                                <div class="col">
                                    <button type="submit" class="btn btn-primary w-100">Update</button>
                                </div>
                                <div class="col">
                                    <a class="btn btn-outline-secondary w-100" href="/WIS_Dollente/FINALS_Dollente/dashboard.php" role="button">Cancel</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
