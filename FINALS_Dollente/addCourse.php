<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "Dollente";
    
    $connection = new mysqli($servername, $username, $password, $database);
    
    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }

    $CourseID = "";
    $CourseName = "";
    $Credits = "";

    $errorMessage = "";
    $successMessage = "";

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $CourseID = $_POST["CourseID"];
        $CourseName = $_POST["CourseName"];
        $Credits = $_POST["Credits"];

        do {
            if (empty($CourseID) || empty($CourseName) || empty($Credits)) {
                $errorMessage = "All the fields are required";
                break;
            }

            $sql = "INSERT INTO Course(CourseID, CourseName, Credits)" .
                "VALUES ('$CourseID', '$CourseName', '$Credits')";
            $result = $connection->query($sql);

            if (!$result) {
                $errorMessage = "Invalid query:" . $connection->error;
                break;
            }

            $CourseID = "";
            $CourseName = "";
            $Credits = "";

            $successMessage = "Course added successfully";

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
    <title>Add Course</title>
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
                        <h2 class="text-center mb-4">Add Course</h2>
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
                                <label class="form-label">Course ID</label>
                                <input type="text" class="form-control" name="CourseID" value="<?php echo $CourseID; ?>">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Course Name</label>
                                <input type="text" class="form-control" name="CourseName" value="<?php echo $CourseName; ?>">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Credits</label>
                                <input type="text" class="form-control" name="Credits" value="<?php echo $Credits; ?>">
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
