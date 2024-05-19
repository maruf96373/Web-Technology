<?php
require_once('../Model/payment.php');

if (!isset($_COOKIE['flag'])) {
    header('location: login.php');
}

$selectedPayment = isset($_POST['payment_option']) ? $_POST['payment_option'] : '';
?>


<html>
<head>
    <title>View Room</title>
    <link rel="stylesheet" href="../Assets/customerStyle.css"/>
    
</head>
<body id="b8">

    <fieldset id="b9">
        <img src="../Assets/logo.png" id="logo-image">
        <h3 id="b1"><u>Click & Stay</u></h3>
        <h4 id="b10">Find your next stay</h4>
        <a id="b4" href="home.php">home</a>
    </fieldset>

    <form method="post" action="../Controller/paymentCheck.php" enctype="">
    <h3 id="validation-message" padding: 10px;></h3>
        <table align="center" class="c1">
            <tr class="c1">
                <td>
                    <div class="payment-option">
                        <img src="../Assets/bikash.jpeg" id="bikash-image">
                        <input type="radio" name="payment_option" id="bikash" value="Bikash" onclick="validateOption()" <?php if ($selectedPayment === 'Bikash') echo 'checked'; ?>>
                        <label for="bikash">Bikash</label>
                    </div>
                    
                    <div class="payment-option">
                        <img src="../Assets/nogod.png" id="nogod-image">
                        <input type="radio" name="payment_option" id="nogod" value="Nogod" onclick="validateOption()" <?php if ($selectedPayment === 'Nogod') echo 'checked'; ?>>
                        <label for="nogod">Nogod</label>
                    </div>
                    
                </td>
            </tr>
            <tr class="c1">
                <td>Phone Number:</td>    
                <td>
                    <div style="padding: 3px;"><input type="text" name="phone" id="phone" onkeyup="validateContact()" disabled>
                    </div>
                </td>
            </tr>
            <tr class="c1">
                <td>Amount:</td>    
                <td>
                    <div style="padding: 3px;"><input type="number" name="amount" id="amount" onkeyup="validateAmount()" disabled>
                    </div>
                </td>
            </tr>
            <tr class="c1">
                <td>Pin Number:</td>
                <td>
                    <div style="padding: 3px;"><input type="Number" name="pin" id="pin" onkeyup="validatePin()" disabled>
                    </div>
                </td>
            </tr>
            <tr class="c1">
                <td colspan="2" align="center">
                    <div style="padding: 7px;">
                        <button type="submit" id="b3" name="submit" value="submit" onclick="validateEdit()">Confirm</button>
                    </div>
                </td>
            </tr>
        </table>
    </form>

    

<script>
   function validateOption() {
        let bikashChecked = document.getElementById('bikash').checked;
        let nogodChecked = document.getElementById('nogod').checked;
        let obj = document.getElementById('validation-message');

        if (!bikashChecked && !nogodChecked) {
            obj.innerHTML = "Please select a payment option (Bikash or Nogod)";
            document.getElementById('phone').disabled = true;
            document.getElementById('amount').disabled = true;
            document.getElementById('pin').disabled = true;
            return false;
        } else {
            obj.innerHTML = "";
            document.getElementById('phone').disabled = false;
            document.getElementById('amount').disabled = false;
            document.getElementById('pin').disabled = false;
            return true;
        }
    }
   
   function validateAmount() {
        let amount = document.getElementById('amount').value;
        let obj = document.getElementById('validation-message');

        if (isNaN(amount) || amount <= 0 || amount > 50000) {
            obj.innerHTML = "Amount must be a number greater than 0 and less than or equal to 50,000";
            obj.style.color = 'red';
            return false;
        } else {
            obj.innerHTML = "Valid Amount";
            obj.style.color = 'black';
            return true;
        }
    }

    function validatePin() {
        let pin = document.getElementById('pin').value;
        let obj = document.getElementById('validation-message');

        if (pin.length !== 8 || isNaN(pin)) {
            obj.innerHTML = "PIN must be an 8-digit number";
            obj.style.color = 'red';
            return false;
        } else {
            obj.innerHTML = "Vaid Pin";
            obj.style.color = 'black';
            return true;
        }
    }

    function validateContact() {
        let contact = document.getElementById('phone').value;
        let obj = document.getElementById('validation-message');

        if (contact.length !== 14) {
            obj.innerHTML = "Contact must be 14 digits long";
            obj.style.color = 'red';
            return false;
        }
        
        let num = ["+88017", "+88019", "+88018", "+88015", "+88016", "+88013"];
        if (!num.includes(contact.substring(0, 6))) {
            obj.innerHTML = "Contact must start with +88017, +88019, +88018, +88015, +88016, or +88013";
            obj.style.color = 'red';
            return false;
        }
        
        obj.innerHTML = "Valid Contact";
        obj.style.color = 'black';
        return true;
    }

    function validateEdit() {
        if (validateOption()  && validateContact()&& validateAmount() && validatePin()) {
            alert("Are you sure you want to confirm it?");
            return true;
        } else {
            return false;
        }
    }
</script>

</body>
</html>
