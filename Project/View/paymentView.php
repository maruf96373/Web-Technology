<?php
session_start(); 
require_once('../Model/payment.php');

if (!isset($_SESSION['phone'])) {
    header('location: paymentAdd.php');
    exit; 
}

if (!isset($_COOKIE['flag'])) {
    header('location: login.php');
    exit; 
}

$amount = $_SESSION['amount'];
$contact = $_SESSION['phone'];
$PaymentOption = $_SESSION['payment_option'];

$payment = getPayment($contact, $amount, $PaymentOption);

?>

<html>
<head>
    <title>Room Management Form</title>
    <link rel="stylesheet" href="../Assets/customerStyle.css"/>
</head>
<body id="b8"> 
    <fieldset id="b9">
        <img src="../Assets/logo.png" id="logo-image">
        <h3 id="b1"><u>Click&Stay</u></h3>
        <h4 id="b10">Find your next stay</h4>
        <a id="b4" href="home.php">home</a>
    </fieldset>
    
    <form method="post" action="paymentAdd.php" enctype="">         
    <div class="facility-container">
            <?php foreach ($payment as $paymentItem) { ?>
                <div class="facility-item"style="text-align: left;">
               
                <?php if ($paymentItem['payment_option'] == 'Bikash') { ?>
                    <img src="../Assets/bikash.jpeg" alt="Bikash" id="payment-image">
                <?php } else if ($paymentItem['payment_option'] == 'Nogod') { ?>
                    <img src="../Assets/nogod.png" alt="Nogod" id="payment-image">
                <?php  } ?>

              
                Payment Option: <?php echo $paymentItem['payment_option']; ?> <br>
                Contact: <?php echo $paymentItem['phone']; ?><br>
                Amount: <?php echo $paymentItem['amount']; ?> tk<br>
            <?php } ?>
                </div>
                </div>
    </form>
   
</body>
</html>
