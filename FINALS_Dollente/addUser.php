<?php
    $servername="localhost";
    $username="root";
    $password="";
    $database="Dollente";

    $connection = new mysqli($servername, $username, $password, $database);
    
    if($connection->connect_error){
        die("Connection failed: " . $connection->connect_error);
    }

    $UsersID="";
    $Username="";
    $Email="";
    $Password="";

    $errorMessage="";
    $successMessage="";

    if($_SERVER['REQUEST_METHOD']=='POST'){
        $UsersID=$_POST["UsersID"];
        $Username=$_POST["Username"];
        $Email=$_POST["Email"];
        $Password=$_POST["Password"];
        
        

        do{
            if(empty($UsersID)||empty($Username)||empty($Email)||empty($Password)){
                $errorMessage="All the fields are required";
                break;
            }
           
            $sql="INSERT INTO Users(UsersID,Username,Email,Password)".
            "VALUES ('$UsersID','$Username','$Email','$Password')";
            $result=$connection->query($sql);

            if(!$result){
                $errorMessage="Invalid query:".$connection->error;
                break;
            }

            $UsersID="";
            $Username="";
            $Email="";
            $Password="";

            $successMessage ="User added successfully";

            header("location:/WIS_Dollente/FINALS_Dollente/dashboard.php");
            
            exit;

        }while (false);

    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add User</title>
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
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h2 class="text-center mb-4">New User Account</h2>
                        <?php
                        if(!empty($errorMessage)){
                            echo "
                            <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                                <strong>$errorMessage</strong>
                                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                            </div>
                            ";
                        }
                        ?>

                            <form method="post">
                                <div class="row mb-3">
                                    <label class="col-sm-3 col-form-label">Users ID</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" name="UsersID" value="<?php echo $UsersID; ?>">  
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-3 col-form-label">User Name</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" name="Username" value="<?php echo $Username; ?>">  
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-3 col-form-label">Email</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" name="Email" value="<?php echo $Email; ?>">  
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-3 col-form-label">Password</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" name="Password" value="<?php echo $Password; ?>">  
                                    </div>
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




                
                                <div class="row mb-3">
                                <div class="col">
                                    <button type="submit" class="btn btn-primary w-100">Submit</button>
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


</body>
</html>