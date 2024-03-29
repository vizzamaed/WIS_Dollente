<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Information System</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8f9fa;
            padding: 20px;
        }
        .container {
            margin-top: 20px;
        }
        .heading {
            margin-bottom: 20px;
        }
        .btn-margin {
            margin-bottom: 10px;
        }
        .table th, .table td {
            text-align: center;
            vertical-align: middle;
        }
        h1 {
            margin-bottom: 20px;
            font-weight: bold;
            color: #007bff;
        }
    </style>
</head>
<body>
    <div class="container my-5">
        <h1>Student</h1>
            <a class="btn btn-primary btn-margin" href="/WIS_Dollente/FINALS_Dollente/addStudent.php" role="button">Add Student</a>
            <br>
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>StudentID</th>
                        <th>Firstname</th>
                        <th>Lastname</th>
                        <th>DateOfBirth</th>
                        <th>Email</th>
                        <th>Phone</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $database = "Dollente";
                    
                    $connection = new mysqli($servername, $username, $password, $database);
                    
                    if ($connection->connect_error) {
                        die("Connection failed: " . $connection->connect_error);
                    }
                    
                    $sql = "SELECT * FROM Student";
                    $result = $connection->query($sql);
                    
                    if (!$result) {
                        die("Invalid query: " . $connection->error);
                    }

                    while($row=$result->fetch_assoc()){
                        echo"
                        <tr>
                        <td>$row[StudentID]</td>
                        <td>$row[Firstname]</td>
                        <td>$row[Lastname]</td>
                        <td>$row[DateOfBirth]</td>
                        <td>$row[Email]</td>
                        <td>$row[Phone]</td>
                        <td>
                            <a class='btn btn-primary btn-sm' href='/WIS_Dollente/FINALS_Dollente/updateStudent.php?StudentID=$row[StudentID]'>Edit</a>
                            <a class='btn btn-danger btn-sm' href='/WIS_Dollente/FINALS_Dollente/deleteStudent.php?StudentID=$row[StudentID]'>Delete</a>
                        </td>
                    </tr>
                        ";
                    }
                    ?>
                   
                </tbody>
            </table>
           
    </div>

   
    <div class="container my-5">
        <h1>Course</h1>
            <a class="btn btn-primary btn-margin" href="/WIS_Dollente/FINALS_Dollente/addCourse.php" role="button">Add Course</a>
            <br>
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>CourseID</th>
                        <th>CourseName</th>
                        <th>Credits</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $database = "Dollente";
                    
                    $connection = new mysqli($servername, $username, $password, $database);
                    
                    if ($connection->connect_error) {
                        die("Connection failed: " . $connection->connect_error);
                    }
                    
                    $sql = "SELECT * FROM Course";
                    $result = $connection->query($sql);
                    
                    if (!$result) {
                        die("Invalid query: " . $connection->error);
                    }
                    
                    while($row=$result->fetch_assoc()){
                        echo"
                        <tr>
                        <td>$row[CourseID]</td>
                        <td>$row[CourseName]</td>
                        <td>$row[Credits]</td>
            
                        <td>
                            <a class='btn btn-primary btn-sm' href='/WIS_Dollente/FINALS_Dollente/updateCourse.php?CourseID=$row[CourseID]'>Edit</a>
                            <a class='btn btn-danger btn-sm' href='/WIS_Dollente/FINALS_Dollente/deleteCourse.php?CourseID=$row[CourseID]'>Delete</a>
                        </td>
                    </tr>
                        ";
                    }
                    ?>
                   
                </tbody>
            </table>
           
    </div>
    
    <div class="container my-5">
        <h1>Instructor</h1>
            <a class="btn btn-primary btn-margin" href="/WIS_Dollente/FINALS_Dollente/addInstructor.php" role="button">Add Instructor</a>
            <br>
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>InstructorID</th>
                        <th>Firstname</th>
                        <th>Lastname</th>
                        <th>Email</th>
                        <th>Phone</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $database = "Dollente";
                    
                    $connection = new mysqli($servername, $username, $password, $database);
                    
                    if ($connection->connect_error) {
                        die("Connection failed: " . $connection->connect_error);
                    }
                    
                    $sql = "SELECT * FROM Instructor";
                    $result = $connection->query($sql);
                    
                    if (!$result) {
                        die("Invalid query: " . $connection->error);
                    }
                    
                    while($row=$result->fetch_assoc()){
                        echo"
                        <tr>
                        <td>$row[InstructorID]</td>
                        <td>$row[Firstname]</td>
                        <td>$row[Lastname]</td>
                        <td>$row[Email]</td>
                        <td>$row[Phone]</td>
            
                        <td>
                            <a class='btn btn-primary btn-sm' href='/WIS_Dollente/FINALS_Dollente/updateInstructor.php?InstructorID=$row[InstructorID]'>Edit</a>
                            <a class='btn btn-danger btn-sm' href='/WIS_Dollente/FINALS_Dollente/deleteInstructor.php?InstructorID=$row[InstructorID]'>Delete</a>
                        </td>
                    </tr>
                        ";
                    }
                    ?>
                   
                </tbody>
            </table>
           
    </div>

    <div class="container my-5">
        <h1>Users</h1>
            <a class="btn btn-primary btn-margin" href="/WIS_Dollente/FINALS_Dollente/addUser.php" role="button">Add Users</a>
            <br>
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>UsersID</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Password</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $database = "Dollente";
                    
                    $connection = new mysqli($servername, $username, $password, $database);
                    
                    if ($connection->connect_error) {
                        die("Connection failed: " . $connection->connect_error);
                    }
                    
                    $sql = "SELECT * FROM Users";
                    $result = $connection->query($sql);
                    
                    if (!$result) {
                        die("Invalid query: " . $connection->error);
                    }
                    
                    while($row=$result->fetch_assoc()){
                        echo"
                        <tr>
                        <td>$row[UsersID]</td>
                        <td>$row[Username]</td>
                        <td>$row[Email]</td>
                        <td>$row[Password]</td>
            
                        <td>
                            <a class='btn btn-primary btn-sm' href='/WIS_Dollente/FINALS_Dollente/updateUser.php?UsersID=$row[UsersID]'>Edit</a>
                            <a class='btn btn-danger btn-sm' href='/WIS_Dollente/FINALS_Dollente/deleteUser.php?UsersID=$row[UsersID]'>Delete</a>
                        </td>
                    </tr>
                        ";
                    }
                    ?>
                   
                </tbody>
            </table>
           
    </div>
</body>
</html>
