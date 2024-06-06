<?php
function connectToDB() {
    $myConn = mysqli_connect('localhost', 'root', '', 'ceramicscompanydb');
    if (!$myConn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    return $myConn;
}


function getAllOrders($conn) {
    $query = "SELECT * FROM orders";
    $result = mysqli_query($conn, $query);
    return $result;
}

function insertOrder($conn, $cName, $cSurname, $cAddress, $cEmail, $cMobileNumber, $dateOfOrder, $orderCode, $orderDesc, $quantity, $unitRetailPrice, $totalRetail, $vat, $totalIncVat, $depositAmount, $balanceLeft) {
    $sql = "INSERT INTO orders (ClientName, ClientSurname, ClientAddress, ClientEmail, MobileNumber, DateOfOrder, OrderCode, OrderDescription, Quantity, UnitRetailPrice, TotalRetail, VAT, TotalIncVAT, DepositAmount, BalanceLeft) VALUES ('$cName', '$cSurname', '$cAddress', '$cEmail', '$cMobileNumber', '$dateOfOrder', '$orderCode', '$orderDesc', '$quantity', '$unitRetailPrice', '$totalRetail', '$vat', '$totalIncVat', '$depositAmount', '$balanceLeft')";
    $result = mysqli_query($conn, $sql);
    if (!$result) {
        echo "Error: " . mysqli_error($conn);
    }
    return $result;
}

function getOrderInfo($conn, $OrderID) {
    $sql = "SELECT * FROM orders WHERE OrderID = $OrderID";
    $result = mysqli_query($conn, $sql);
    return $result;
}

function updateOrder($conn, $OrderID, $cName, $cSurname, $cAddress, $cEmail, $cMobileNumber, $dateOfOrder, $orderCode, $orderDesc, $quantity, $unitRetailPrice, $totalRetail, $vat, $totalIncVat, $depositAmount, $balanceLeft) {
    $sql = "UPDATE orders SET ClientName = '$cName', ClientSurname = '$cSurname', ClientAddress = '$cAddress', ClientEmail = '$cEmail', MobileNumber = '$cMobileNumber', DateOfOrder = '$dateOfOrder', OrderCode = '$orderCode', OrderDescription = '$orderDesc', Quantity = '$quantity', UnitRetailPrice = '$unitRetailPrice', TotalRetail = '$totalRetail', VAT = '$vat', TotalIncVAT = '$totalIncVat', DepositAmount = '$depositAmount', BalanceLeft = '$balanceLeft' WHERE OrderID = '$OrderID'";
    $result = mysqli_query($conn, $sql);
    return $result;
}

function removeOrder($conn, $OrderID) {
    $sql = "DELETE FROM orders WHERE OrderID = $OrderID";
    $result = mysqli_query($conn, $sql);
    return $result;
}

function freeResult($result) {
    mysqli_free_result($result);
}

function closeDB($conn) {
    mysqli_close($conn);
}

function getUsername($conn, $user) {
    $query = "SELECT * FROM users WHERE Username = '$user'";
    $result = mysqli_query($conn, $query);
    return $result;
}

function insertUser($conn, $fName, $sName, $email, $mobNumber, $user, $hash, $pfp) {
    $query = "INSERT INTO users (FirstName, Surname, Email, MobileNumber, Username, Password, UserProfileImg) VALUES ('$fName', '$sName', '$email', '$mobNumber', '$user', '$hash', '$pfp')";
    $result = mysqli_query($conn, $query);
    return $result;
}

function updateProfilePicture($conn, $username, $profilePicturePath) {
    $query = "UPDATE users SET UserProfileImg = '$profilePicturePath' WHERE Username = '$username'";
    $result = mysqli_query($conn, $query);
    return $result;
}
?>