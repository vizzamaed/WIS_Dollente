<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "Dollente";
    
    $connection = new mysqli($servername, $username, $password, $database);
    
    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }

    $InstructorID = "";
    $Firstname = "";
    $Lastname = "";
    $Email = "";
    $Phone = "";

    $errorMessage = "";
    $successMessage = "";

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $InstructorID = $_POST["InstructorID"];
        $Firstname = $_POST["Firstname"];
        $Lastname = $_POST["Lastname"];
        $Email = $_POST["Email"];
        $Phone = $_POST["Phone"];

        do {
            if (empty($InstructorID) || empty($Firstname) || empty($Lastname) || empty($Email) || empty($Phone)) {
                $errorMessage = "All the fields are required";
                break;
            }

            $sql = "INSERT INTO Instructor(InstructorID, Firstname, Lastname, Email, Phone)" .
                "VALUES ('$InstructorID', '$Firstname', '$Lastname', '$Email', '$Phone')";
            $result = $connection->query($sql);

            if (!$result) {
                $errorMessage = "Invalid query:" . $connection->error;
                break;
            }

            $InstructorID = "";
            $Firstname = "";
            $Lastname = "";
            $Email = "";
            $Phone = "";

            $successMessage = "Instructor added successfully";

            header("location:/WIS_Dollente/FINALS_Dollente/dashboard.php");
            exit;

        } while (false);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Instructor</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            margin-top: 50px;
        }
        .card {
            border: 1px solid #dee2e6;
            border-radius: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h2 class="text-center mb-4">Add Instructor</h2>
                        <?php
                        if (!empty($errorMessage)) {
                            echo "
                            <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                                <strong>$errorMessage</strong>
                                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                            </div>
                            ";
                        }
                        ?>

                        <form method="post">
                            <div class="mb-3">
                                <label class="form-label">Instructor ID</label>
                                <input type="text" class="form-control" name="InstructorID" value="<?php echo $InstructorID; ?>">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">First Name</label>
                                <input type="text" class="form-control" name="Firstname" value="<?php echo $Firstname; ?>">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Last Name</label>
                                <input type="text" class="form-control" name="Lastname" value="<?php echo $Lastname; ?>">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input type="text" class="form-control" name="Email" value="<?php echo $Email; ?>">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Phone</label>
                                <input type="text" class="form-control" name="Phone" value="<?php echo $Phone; ?>">
                            </div>

                            <?php
                            if (!empty($successMessage)) {
                                echo "
                                <div class='alert alert-success alert-dismissible fade show' role='alert'>
                                    <strong>$successMessage</strong>
                                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                </div>
                                ";
                            }
                            ?>

                            <div class="row">
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
