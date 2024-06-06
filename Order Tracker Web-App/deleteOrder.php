<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Delete Order</title>
    </head>
    <body>
        <?php include 'header.php'; ?>
        <div class="container" style="text-align: center;">
            <?php
                include 'dbtrans.php';

                if(isset($_GET['OrderID'])) {
                    $OrderID = $_GET['OrderID'];

                    $conn = connectToDB();

                    $sql = "DELETE FROM orders WHERE OrderID = $OrderID";

                    if(mysqli_query($conn, $sql)) {
                        echo "Order removed successfully.";
                        ?>
                    <br><br>
                    <a href="orders.php">Return to Orders Page</a>
                    <br><br>
                    <?php
                    } else {
                        echo "Error: " . mysqli_error($conn);
                    }

                    mysqli_close($conn);
                } else {
                    header("Location: orders.php");
                    exit;
                }
            ?>
        </div>
        <?php include 'footer.php'; ?>
    </body>
</html>


