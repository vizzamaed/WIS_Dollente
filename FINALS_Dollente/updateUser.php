<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "Dollente";

$connection = new mysqli($servername, $username, $password, $database);

$UsersID="";
$Username="";
$Email="";
$Password="";

$errorMessage="";
$successMessage="";

if($_SERVER['REQUEST_METHOD']=='GET'){
    if(!isset($_GET["UsersID"])){
        header("location:/WIS_Dollente/FINALS_Dollente/dashboard.php");
        exit;
    }

    $UsersID=$_GET["UsersID"];

    $sql="SELECT * FROM Users WHERE UsersID=$UsersID";
    $result=$connection->query($sql);
    $row=$result->fetch_assoc();

    if (!$row){
        header("location:/WIS_Dollente/FINALS_Dollente/dashboard.php");
        exit;
    }
  
    $Username=$row["Username"];
    $Email=$row["Email"];
    $Password=$row["Password"];

}
else{
    
    $UsersID=$_POST["UsersID"];
    $Username=$_POST["Username"];
    $Email=$_POST["Email"];
    $Password=$_POST["Password"];

    do{
        if(empty($UsersID)||empty($Username)||empty($Email)||empty($Password)){
            $errorMessage="All the fields are required";
            break;
        }

        $sql = "UPDATE Users " . 
    "SET Username='$Username', Email='$Email', Password='$Password' " .
    "WHERE UsersID=$UsersID";

        
        $result=$connection->query($sql);

        if(!$result){
            $errorMessage="Invalid query:".$connection->error;
            break;
         }

         $successMessage="User Account updated successfully";
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
    <title>Users Registration</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
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
                            <h2 class="text-center">Update Users Account</h2>
                        </div>
                        <div class="card-body">
                            <?php if(!empty($errorMessage)): ?>
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <strong><?php echo $errorMessage; ?></strong>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            <?php endif; ?>

                            <form method="post">
                                
                                <input type="hidden" name="UsersID" value="<?php echo $UsersID; ?>">


                                <div class="row mb-3">
                                    <label for="Username" class="form-label">User Name</label>
                                    <input type="text" class="form-control" id="Username" name="Username" value="<?php echo $Username; ?>">
                                </div>
                                <div class="row mb-3">
                                    <label for="Email" class="form-label">Email</label>
                                    <input type="text" class="form-control" name="Email" value="<?php echo $Email; ?>">  
                                </div>
                                <div class="row mb-3">
                                    <label for="Password" class="form-label">Password</label>
                                    <input type="text" class="form-control" name="Password" value="<?php echo $Password; ?>">  
                                </div>

                                <?php
                                if(!empty($successMessage)){
                                    echo "
                                    <div class='row mb-3'>
                                        <div class='offset-sm-3 col-sm-6'>
                                            <div class='alert alert-success alert-dismissible fade show' role='alert'>
                                                <strong>$successMessage</strong>
                                                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                            </div>
                                        </div>
                                    </div>
                                    ";
                                }
                                ?>

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


</body>
</html>