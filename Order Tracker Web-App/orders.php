<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orders Page</title>
    <link href="main.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <?php include 'header.php'; ?>
    <div class="container">
        <h1>Orders</h1>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Client Name</th>
                    <th scope="col">Client Surname</th>
                    <th scope="col">Client Address</th>
                    <th scope="col">Client Email</th>
                    <th scope="col">Mobile Number</th>
                    <th scope="col">Date of Order</th>
                    <th scope="col">Order Code</th>
                    <th scope="col">Order Description</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Unit Retail Price</th>
                    <th scope="col">Total Retail</th>
                    <th scope="col">VAT</th>
                    <th scope="col">Total Including VAT</th>
                    <th scope="col">Deposit Amount</th>
                    <th scope="col">Balance Left</th>
                    <?php if (isset($_SESSION['Username'])) { ?>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                    <?php } ?>
                </tr>
            </thead>
            <tbody>

                <?php
                    include 'dbtrans.php';
                    $conn = connectToDB();

                    $result = getAllOrders($conn);


                    if ($result && mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td>{$row['OrderID']}</td>";
                            echo "<td>{$row['ClientName']}</td>";
                            echo "<td>{$row['ClientSurname']}</td>";
                            echo "<td>{$row['ClientAddress']}</td>";
                            echo "<td>{$row['ClientEmail']}</td>";
                            echo "<td>{$row['MobileNumber']}</td>";
                            echo "<td>{$row['DateOfOrder']}</td>";
                            echo "<td>{$row['OrderCode']}</td>";
                            echo "<td>{$row['OrderDescription']}</td>";
                            echo "<td>{$row['Quantity']}</td>";
                            echo "<td>{$row['UnitRetailPrice']}</td>";
                            echo "<td>{$row['TotalRetail']}</td>";
                            echo "<td>{$row['VAT']}</td>";
                            echo "<td>{$row['TotalIncVAT']}</td>";
                            echo "<td>{$row['DepositAmount']}</td>";
                            echo "<td>{$row['BalanceLeft']}</td>";
                            if (isset($_SESSION['Username'])) {
                                echo "<td><a href='editOrder.php?OrderID={$row['OrderID']}'>Edit</a></td>";
                                echo "<td><a href='deleteOrder.php?OrderID={$row['OrderID']}'>Delete</a></td>";
                            }
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='16'>No orders found</td></tr>";
                    }


                    mysqli_close($conn);
                ?>
            </tbody>
        </table>

        <?php if (isset($_SESSION['Username'])) { ?>
            <a href="insertOrder.php" class="btn btn-primary" style="width: 100%;">Insert Order</a>
        <?php } ?>
    </div>
    <br><br>
    <?php include 'footer.php'; ?>
</body>
</html>
