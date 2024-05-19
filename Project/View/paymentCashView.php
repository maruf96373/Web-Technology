<?php
    session_start(); 
    require_once('../Model/payment.php');

    if (!isset($_COOKIE['flag'])) {
        header('location: login.php');
        exit; 
    }

    
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
    <h2> payment Type: Cash </h2>
    <form method="post" action="logOut.php" enctype="">
        <table align="center" class="c1">
        
            <tr class="c1">
                <td>
                    <div class="facility-container">
                        <div class="facility-item" style="text-align: left;">
                            <img src="../Assets/Cash.jpeg" alt="Cash" id="payment-image"> 
                       
                </td>
            </tr>
                               
        </table>
        </div>
                    </div>
    </form>
</body>
</html>
