<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container" style="text-align: center;">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <br><br>
                <h2>Login</h2>
                <br>
                <form action="login.php" method="POST">
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
                    <button type="submit" name="submit" class="btn btn-primary">Login</button>
                </form>

                <br><br>
                <a href="orders.php">View Orders Without Logging In</a>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<?php
include 'dbtrans.php';
$conn = connectToDB();

if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $result = getUsername($conn, $username);
    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        $storedPasswordHash = $row['Password'];

        if ($password === $storedPasswordHash) {
            $_SESSION['Username'] = $username;

            $_SESSION['UserImage'] = $row['UserProfileImg'];

            header('Location: orders.php');
            exit();
        } else {
            
            echo "<span class='alert alert-danger'>Incorrect password</span>";
        }
    } else {
        
        echo "<span class='alert alert-danger'>User not found</span>";
    }
}
?>
</body>
</html>
