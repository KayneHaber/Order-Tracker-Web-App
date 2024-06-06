<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="main.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
   
    <title>Edit Order</title>
</head>
<body>
    <?php include 'header.php'; ?>
 
    <?php
    include 'dbtrans.php';
 
    $orderID = $_GET['OrderID'];
    $conn = connectToDB();
    $result = getOrderInfo($conn, $orderID);
 
    if ($result) {
        $row = mysqli_fetch_assoc($result);
        // Store order data in session variables
        $_SESSION['orderID'] = $row['OrderID'];
        $_SESSION['clientName'] = $row['ClientName'];
        $_SESSION['clientSurname'] = $row['ClientSurname'];
        $_SESSION['clientAddress'] = $row['ClientAddress'];
        $_SESSION['clientEmail'] = $row['ClientEmail'];
        $_SESSION['mobileNumber'] = $row['MobileNumber'];
        $_SESSION['dateOfOrder'] = $row['DateOfOrder'];
        $_SESSION['orderCode'] = $row['OrderCode'];
        $_SESSION['orderDesc'] = $row['OrderDescription'];
        $_SESSION['quantity'] = $row['Quantity'];
        $_SESSION['unitRetailPrice'] = $row['UnitRetailPrice'];
        $_SESSION['totalRetail'] = $row['TotalRetail'];
        $_SESSION['vat'] = $row['VAT'];
        $_SESSION['totalIncVat'] = $row['TotalIncVAT'];
        $_SESSION['depositAmount'] = $row['DepositAmount'];
        $_SESSION['balanceLeft'] = $row['BalanceLeft'];
    } else {
        echo "<div class='alert alert-danger'>Order not found</div>";
    }
 
    if (isset($_POST['change'])) {
        $orderID = $_SESSION['orderID'];
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
 
        $result = updateOrder($conn, $orderID, $cName, $cSurname, $cAddress, $cEmail, $cMobileNumber, $dateOfOrder, $orderCode, $orderDesc, $quantity, $unitRetailPrice, $totalRetail, $vat, $totalIncVat, $depositAmount, $balanceLeft);
 
        if ($result) {
            echo "<div class='alert alert-success'>Order updated successfully</div>";
            header("Location: orders.php");
        } else {
            echo "<div class='alert alert-danger'>Error updating order</div>";
        }
    }
 
    closeDB($conn);
    ?>
 
    <div class="container" style="text-align: center;">
        <h3>Edit Order</h3>
        <form method="POST" action="editOrder.php">
            <div class="mb-3">
                <label for="clientName" class="form-label">Client Name</label>
                <input type="text" class="form-control" id="clientName" name="clientName" value="<?php echo $_SESSION['clientName']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="clientSurname" class="form-label">Client Surname</label>
                <input type="text" class="form-control" id="clientSurname" name="clientSurname" value="<?php echo $_SESSION['clientSurname']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="clientAddress" class="form-label">Client Address</label>
                <input type="text" class="form-control" id="clientAddress" name="clientAddress" value="<?php echo $_SESSION['clientAddress']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="clientEmail" class="form-label">Client Email</label>
                <input type="email" class="form-control" id="clientEmail" name="clientEmail" value="<?php echo $_SESSION['clientEmail']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="mobileNumber" class="form-label">Mobile Number</label>
                <input type="number" class="form-control" id="mobileNumber" name="mobileNumber" value="<?php echo $_SESSION['mobileNumber']; ?>" required step="0.01">
            </div>
            <div class="mb-3">
                <label for="dateOfOrder" class="form-label">Date Of Order</label>
                <input type="date" class="form-control" id="dateOfOrder" name="dateOfOrder" value="<?php echo $_SESSION['dateOfOrder']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="orderCode" class="form-label">Order Code</label>
                <input type="number" class="form-control" id="orderCode" name="orderCode" value="<?php echo $_SESSION['orderCode']; ?>" required step="0.01">
            </div>
            <div class="mb-3">
                <label for="orderDesc" class="form-label">Order Description</label>
                <input type="text" class="form-control" id="orderDesc" name="orderDesc" value="<?php echo $_SESSION['orderDesc']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="quantity" class="form-label">Quantity</label>
                <input type="number" class="form-control" id="quantity" name="quantity" value="<?php echo $_SESSION['quantity']; ?>" required step="0.01">
            </div>
            <div class="mb-3">
                <label for="unitRetailPrice" class="form-label">Unit Retail Price</label>
                <input type="number" class="form-control" id="unitRetailPrice" name="unitRetailPrice" value="<?php echo $_SESSION['unitRetailPrice']; ?>" required step="0.01">
            </div>
            <div class="mb-3">
                <label for="totalRetail" class="form-label">Total Retail</label>
                <input type="number" class="form-control" id="totalRetail" name="totalRetail" value="<?php echo $_SESSION['totalRetail']; ?>" required step="0.01">
            </div>
            <div class="mb-3">
                <label for="VAT" class="form-label">VAT</label>
                <input type="number" class="form-control" id="VAT" name="VAT" value="<?php echo $_SESSION['vat']; ?>" required step="0.01">
            </div>
            <div class="mb-3">
                <label for="totalIncVAT" class="form-label">Total Including VAT</label>
                <input type="number" class="form-control" id="totalIncVAT" name="totalIncVAT" value="<?php echo $_SESSION['totalIncVat']; ?>" readonly step="0.01">
            </div>
            <div class="mb-3">
                <button type="button" id="calculateButton" class="btn btn-secondary">Calculate Total</button>
            </div>
            <div class="mb-3">
                <label for="depositAmount" class="form-label">Deposit Amount</label>
                <input type="number" class="form-control" id="depositAmount" name="depositAmount" value="<?php echo $_SESSION['depositAmount']; ?>" required step="0.01">
            </div>
            <div class="mb-3">
                <label for="balanceLeft" class="form-label">Balance Left</label>
                <input type="number" class="form-control" id="balanceLeft" name="balanceLeft" value="<?php echo $_SESSION['balanceLeft']; ?>" required step="0.01">
            </div>
            <button type="submit" name="change" class="btn btn-primary mb-2" style="width: 100%;">Submit Changes</button>
        </form>
    </div>
    <?php include 'footer.php'; ?>
    <script src="script.js"></script>
</body>
</html>