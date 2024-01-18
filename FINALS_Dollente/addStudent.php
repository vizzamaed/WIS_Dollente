<?php
    $servername="localhost";
    $username="root";
    $password="";
    $database="Dollente";

    $connection = new mysqli($servername, $username, $password, $database);
    
    if($connection->connect_error){
        die("Connection failed: " . $connection->connect_error);
    }

    $StudentID="";
    $Firstname="";
    $Lastname="";
    $DateOfBirth="";
    $Email="";
    $Phone="";

    $errorMessage="";
    $successMessage="";

    if($_SERVER['REQUEST_METHOD']=='POST'){
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
           
            $sql="INSERT INTO Student(StudentID,Firstname,Lastname,DateOfBirth,Email,Phone)".
            "VALUES ('$StudentID','$Firstname','$Lastname','$DateOfBirth','$Email','$Phone')";
            $result=$connection->query($sql);

            if(!$result){
                $errorMessage="Invalid query:".$connection->error;
                break;
            }

            $StudentID="";
            $Firstname="";
            $Lastname="";
            $DateOfBirth="";
            $Email="";
            $Phone="";

            $successMessage ="Student added successfully";

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
    <title>Student Registration</title>
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
                        <h2 class="text-center mb-4">New Student Account</h2>
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
                                    <label class="col-sm-3 col-form-label">Student ID</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" name="StudentID" value="<?php echo $StudentID; ?>">  
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-3 col-form-label">First Name</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" name="Firstname" value="<?php echo $Firstname; ?>">  
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-3 col-form-label">Last Name</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" name="Lastname" value="<?php echo $Lastname; ?>">  
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-3 col-form-label">Birthdate</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" name="DateOfBirth" value="<?php echo $DateOfBirth; ?>">  
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-3 col-form-label">Email</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" name="Email" value="<?php echo $Email; ?>">  
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-3 col-form-label">Phone</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" name="Phone" value="<?php echo $Phone; ?>">  
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