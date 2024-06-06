<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="main.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Order Tracker</title>
</head>
<body>
    <header class="headerCSS">
        <br>
        <div class="container">
            <div class="row justify-content-between align-items-center" style="background-color: lightblue; border-radius: 10px; width: 100%;">
                <div class="col-md-6">
                    <h1>Order Tracker</h1>
                </div>
                <div class="col-md-6 text-end" >
                    <?php if(isset($_SESSION['Username'])) { ?>
                        <a href="logout.php" class="btn btn-danger">Logout</a>
                        <img class="rounded-img" src="<?php echo $_SESSION['UserImage']; ?>" alt="Profile Image" style = "width: 10%; margin: 5px; border-radius: 5px;"/>
                        <a href="changeProfile.php" class="btn btn-info">Change Profile Picture</a>
                    <?php } else { ?>
                        <a href="login.php" class="btn btn-primary">Login</a>
                        <a href="register.php" class="btn btn-success">Register</a>
                    <?php } ?>
                </div>
            </div>
        </div>
    </header> <br/>
</body>
</html>
