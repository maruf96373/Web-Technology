<?php
require_once('db.php');

function Add($user) {
    $conn = dbconnection();
    // Updated SQL query to include the payment option
    $sql = "INSERT INTO payment (phone, pin, amount, payment_option) VALUES ('{$user['phone']}', '{$user['pin']}', '{$user['amount']}', '{$user['payment_option']}')";
    if (mysqli_query($conn, $sql)) {
        return true;
    } else {
        return false;
    }
}

function getPayment($contact, $amount,$PaymentOption) {
    $conn = dbconnection();
    $sql = "SELECT * FROM payment WHERE phone='$contact' AND amount='$amount' AND payment_option='$PaymentOption'";
    $result = mysqli_query($conn, $sql);
    $payment = [];
  
    while($row = mysqli_fetch_assoc($result)){
        $payment[] = $row;
    }
    return $payment;
}
?>
