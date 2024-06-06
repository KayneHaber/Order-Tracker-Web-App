<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'dbtrans.php';

$conn = connectToDB();


if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}

if (isset($_POST['submit'])) {
    $fName = $_POST['fName'];
    $sName = $_POST['sName'];
    $email = $_POST['email'];
    $mobNumber = $_POST['mobNumber'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $pfp = $_POST['pfp'];


    $emailExists = checkEmailExists($conn, $email);
    $mobileExists = checkMobileExists($conn, $mobNumber);

    if ($emailExists || $mobileExists) {
        if ($emailExists) {
            echo "<span class='alert alert-danger'>Email already exists. Please choose a different email.</span>";
        }
        if ($mobileExists) {
            echo "<span class='alert alert-danger'>Mobile number already exists. Please choose a different mobile number.</span>";
        }
    } else {

        $result = insertUser($conn, $fName, $sName, $email, $mobNumber, $username, $password, $pfp);

        if ($result) {
            header('Location: login.php');
            exit();
        } else {
            echo "<span class='alert alert-danger'>User not added to DB </span>";
        }
    }
}


function checkEmailExists($conn, $email) {
    $query = "SELECT * FROM users WHERE Email = '$email'";
    $result = mysqli_query($conn, $query);
    return mysqli_num_rows($result) > 0;
}


function checkMobileExists($conn, $mobile) {
    $query = "SELECT * FROM users WHERE MobileNumber = '$mobile'";
    $result = mysqli_query($conn, $query);
    return mysqli_num_rows($result) > 0;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Page</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container" style = "text-align: center;">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <br><br>
                <h2>Register</h2>
                <br>
                <form action="register.php" method="POST">
                    <div class="mb-3">
                        <label for="fName" class="form-label">Name</label>
                        <br><br>
                        <input type="text" class="form-control" id="fName" name="fName" required>
                    </div>
                    <br>
                    <div class="mb-3">
                        <label for="sName" class="form-label">Surname</label>
                        <br><br>
                        <input type="text" class="form-control" id="sName" name="sName" required>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <br><br>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>

                    <div class="mb-3">
                        <label for="mobNumber" class="form-label">Mobile Number</label>
                        <br><br>
                        <input type="number" class="form-control" id="mobNumber" name="mobNumber" required>
                    </div>

                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <br><br>
                        <input type="text" class="form-control" id="username" name="username" required>
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <br><br>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <div class="mb-3">
                        <label for="pfp" class="form-label">Profile Image</label>
                        <input type="file" class="form-control" id="pfp" name="pfp" required>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary">Register</button>
                </form>
                <br>
                <a href="orders.php">View Orders Without Registering</a>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
