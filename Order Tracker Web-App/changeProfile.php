<?php
session_start();


include 'dbtrans.php';


if (!isset($_SESSION['Username'])) {
    header('Location: login.php');
    exit();
}


if (isset($_POST['submit'])) {
    $uploaded_file = $_FILES['new_profile_picture'];

    $target_dir = "images/";
    $target_file = $target_dir . basename($uploaded_file['name']);
    if (move_uploaded_file($uploaded_file['tmp_name'], $target_file)) {

        $username = $_SESSION['Username'];
        $profilePicturePath = $target_file;
        $conn = connectToDB();
        $result = updateProfilePicture($conn, $username, $profilePicturePath);
        closeDB($conn);
        if ($result) {
            $_SESSION['UserImage'] = $profilePicturePath;
            header('Location: orders.php');
            exit();
        } else {
            echo "Failed to update profile picture.";
        }
    } else {
        echo "Failed to upload the file.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Change Profile Picture</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    </head>
    <body>
        <div class="container" style = "text-align: center;">
            <h2>Change Profile Picture</h2>
            <form action="changeProfile.php" method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="new_profile_picture" class="form-label">Upload New Profile Picture</label>
                    <input type="file" class="form-control" id="new_profile_picture" name="new_profile_picture" required>
                </div>
                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
        <?php include "footer.php"; ?>
    </body>
</html>
