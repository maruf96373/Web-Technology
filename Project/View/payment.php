<?php
    if (!isset($_COOKIE['flag'])) {
        header('location: login.php');
    }
?>

<html>
<head>
    <title>View Room</title>
    <link rel="stylesheet" href="../Assets/customerStyle.css"/>
</head>
<body id="b8">
    <form method="post" enctype="multipart/form-data" onsubmit="return validateOptions()">
        <fieldset id="b9">
            <img src="../Assets/logo.png" id="logo-image">
            <h3 id="b1"><u>Click & Stay</u></h3>
            <h4 id="b10">Find your next stay</h4>
            <a id="b4" href="home.php">home</a>
        </fieldset>
        <h3></h3>

        <fieldset id="b17">
            <div class="payment-option">
                <img src="../Assets/PayOnline.jpeg" id="bikash-image">
                <input type="radio" name="payment_option" id="payOnline" value="PayOnline" onclick="validateOptions()">
                <label for="payOnline"> Online Payment</label>
            </div>
            
            <div class="payment-option">
                <img src="../Assets/Cash.jpeg" id="nogod-image">
                <input type="radio" name="payment_option" id="cash" value="Cash" onclick="validateOptions()">
                <label for="cash">Cash</label>
            </div>

            <div style="padding: 3px; text-align: center;">
                <input type="submit" name="submit" id="b3" value="Submit">
            </div>
        </fieldset>
    </form>

    <script>
        function validateOptions() {
            let onlineChecked = document.getElementById('payOnline').checked;
            let cashChecked = document.getElementById('cash').checked;
            let obj = document.getElementsByTagName('h3')[1];
            
            if (onlineChecked && cashChecked) {
                alert("You can only choose one payment option.");
                document.getElementById('payOnline').checked = false;
                document.getElementById('cash').checked = false;
            }
            
            if (!onlineChecked && !cashChecked) {
                obj.innerHTML = "Please select at least one option.";
                obj.style.color = 'red';
                return false;
            }
            
            obj.innerHTML = "Selected option: ";
            if (onlineChecked) {
                obj.innerHTML += "Online Payment";
                document.querySelector('form').action = "../View/paymentAdd.php";
            } else if (cashChecked) {
                obj.innerHTML += "Cash";
                document.querySelector('form').action = "../View/paymentCashView.php";
            }
           
            obj.style.color = 'green';
            return true;
        }
    </script>
</body>
</html>
