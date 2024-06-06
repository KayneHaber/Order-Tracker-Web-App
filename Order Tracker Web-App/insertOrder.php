<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <title>Insert Order</title>
</head>
<body>
    <?php include 'header.php'; ?>
    <div class="container" style="text-align: center;">
        <br>
        <h3>Insert a New Order</h3>
        <br>
        <form method="POST" action="insertOrder.php" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="clientName" class="form-label">Client Name</label>
                <input type="text" class="form-control" id="clientName" name="clientName" required>
            </div>
            <div class="mb-3">
                <label for="clientSurname" class="form-label">Client Surname</label>
                <input type="text" class="form-control" id="clientSurname" name="clientSurname" required>
            </div>
            <div class="mb-3">
                <label for="clientAddress" class="form-label">Client Address</label>
                <input type="text" class="form-control" id="clientAddress" name="clientAddress" required>
            </div>
            <div class="mb-3">
                <label for="clientEmail" class="form-label">Client Email</label>
                <input type="email" class="form-control" id="clientEmail" name="clientEmail" required>
            </div>
            <div class="mb-3">
                <label for="mobileNumber" class="form-label">Mobile Number</label>
                <input type="number" class="form-control" id="mobileNumber" name="mobileNumber" required step="0.01">
            </div>
            <div class="mb-3">
                <label for="dateOfOrder" class="form-label">Date Of Order</label>
                <input type="date" class="form-control" id="dateOfOrder" name="dateOfOrder" required>
            </div>
            <div class="mb-3">
                <label for="orderCode" class="form-label">Order Code</label>
                <input type="number" class="form-control" id="orderCode" name="orderCode" required step="0.01">
            </div>
            <div class="mb-3">
                <label for="orderDesc" class="form-label">Order Description</label>
                <input type="text" class="form-control" id="orderDesc" name="orderDesc" required>
            </div>
            <div class="mb-3">
                <label for="quantity" class="form-label">Quantity</label>
                <input type="number" class="form-control" id="quantity" name="quantity" required step="0.01">
            </div>
            <div class="mb-3">
                <label for="unitRetailPrice" class="form-label">Unit Retail Price</label>
                <input type="number" class="form-control" id="unitRetailPrice" name="unitRetailPrice" required step="0.01">
            </div>
            <div class="mb-3">
                <label for="totalRetail" class="form-label">Total Retail</label>
                <input type="number" class="form-control" id="totalRetail" name="totalRetail" required step="0.01">
            </div>
            <div class="mb-3">
                <label for="VAT" class="form-label">VAT</label>
                <input type="number" class="form-control" id="VAT" name="VAT" required step="0.01">
            </div>
            <div class="mb-3">
                <label for="totalIncVAT" class="form-label">Total Including VAT</label>
                <input type="number" class="form-control" id="totalIncVAT" name="totalIncVAT" readonly step="0.01">
            </div>
            <div class="mb-3">
                <button type="button" id="calculateButton" class="btn btn-secondary">Calculate Total</button>
            </div>
            <div class="mb-3">
                <label for="depositAmount" class="form-label">Deposit Amount</label>
                <input type="number" class="form-control" id="depositAmount" name="depositAmount" required step="0.01">
            </div>
            <div class="mb-3">
                <label for="balanceLeft" class="form-label">Balance Left</label>
                <input type="number" class="form-control" id="balanceLeft" name="balanceLeft" required step="0.01">
            </div>
            <br>
            <button type="submit" name="submit" class="btn btn-primary mb-2" style="width: 100%;">Submit Order</button>
        </form>
        <?php
            include 'dbtrans.php';
            $conn = connectToDB();
 
            if (isset($_POST["submit"])) {
                $cName = $_POST['clientName'];
                $cSurname = $_POST['clientSurname'];
                $cAddress = $_POST['clientAddress'];
                $cEmail = $_POST['clientEmail'];
                $cMobileNumber = $_POST['mobileNumber'];
                $dateOfOrder = $_POST['dateOfOrder'];
                $orderCode = $_POST['orderCode'];
                $orderDesc = $_POST['orderDesc'];
                $quantity = $_POST['quantity'];
                $unitRetailPrice = $_POST['unitRetailPrice'];
                $totalRetail = $_POST['totalRetail'];
                $vat = $_POST['VAT'];
                $totalIncVat = $_POST['totalIncVAT'];
                $depositAmount = $_POST['depositAmount'];
                $balanceLeft = $_POST['balanceLeft'];
 
                if (empty($cName) || empty($cSurname) || empty($cAddress) || empty($cEmail) || empty($cMobileNumber) || empty($dateOfOrder) || empty($orderCode) || empty($orderDesc) || empty($quantity) || empty($unitRetailPrice) || empty($totalRetail) || empty($vat) || empty($totalIncVat) || empty($depositAmount) || empty($balanceLeft)) {
                    echo "<div class='alert alert-danger'>All fields are required</div>";
                    return;
                }
 
                $result = insertOrder($conn, $cName, $cSurname, $cAddress, $cEmail, $cMobileNumber, $dateOfOrder, $orderCode, $orderDesc, $quantity, $unitRetailPrice, $totalRetail, $vat, $totalIncVat, $depositAmount, $balanceLeft);
                $newOrderID = mysqli_insert_id($conn);
 
                if ($result) {
                    echo "<div class='alert alert-success'>Order with id '$newOrderID' inserted successfully</div>";
                    ?>
                    <br>
                    <a href="orders.php">Return to Orders Page</a>
                    <?php
                }
            }
        ?>
    </div>
    <br>
    <?php include 'footer.php'; ?>
    <script src="script.js"></script>
</body>
</html>