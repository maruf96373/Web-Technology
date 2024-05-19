<?php
session_start();
$guest = $_SESSION['guest'];

 
 
if(!isset($_COOKIE['flag'])){
    header('location: login.php');
}
require_once('../Model/bookings.php');
$GuestId = isset($_GET['guestId']) ? $_GET['guestId'] : '';
   
    
  $GuestEdit=guestEdit($GuestId);
   
   
   
    
 
?>
 
<html>
<head>
    <title>Edit Customer Details</title>
    <link rel="stylesheet" href="../Assets/Admin.css"/>
</head>
<body id="b8">

<fieldset id="b9">
<img src="../Assets/logo.png" id="logo-image">
    <h3 id="b1"><u>Click & Stay</u></h3>
    
    <h4 id="b10">Find your next stay</h4>
  
    <a id="b4"  href="CustomerView.php">Back</a>
               
              <a id="b11" href="RoomAdmin.php">Next</a>
</fieldset>
<h3 id="validationMessage"></h3> 
    <form method="post" action="../Controller/CustomerEditCheck.php">

        <table align="center"  class="c1">
        <?php for($i=0; $i<count($GuestEdit); $i++){?>
        <tr class="c1">
                <td>Guest Id:</td>
                <td>
                    <div style="padding: 3px;">
                        <input type="text"name="guestId" value="<?php echo $GuestEdit[$i]['guestId']; ?>"/>
                    </div>
                </td>
            </tr> 
            
            <tr class="c1">
    <td>Guest Number</td>    
    <td>
        <div style="padding: 3px;">
            <input type="number" name="capacity" value="<?php echo $GuestEdit[$i]['capacity']; ?>"id="capacity" onkeyup="validateCapacity()"/>
        </div>
    </td>
</tr>

            <tr class="c1">
                <td>Room Type:</td>
                <td>
                    <div style="padding: 3px;">
                        <select name="roomType"id="roomType" onchange="validateRoomType()">
                            <option value="single" <?php if ($GuestEdit[$i]['roomType'] == 'single') echo 'selected="selected"'; ?>>Single</option>
                            <option value="double"<?php if ($GuestEdit[$i]['roomType'] == 'double') echo 'selected="selected"'; ?>>Double</option>
                            <option value="suite"<?php if ($GuestEdit[$i]['roomType'] == 'suite') echo 'selected="selected"'; ?>>Suite</option>
                        </select>
                    </div>
                </td> 
            </tr>
           
            <tr class="c1">
                <td>Check-in Date:</td>
                <td>
                    <div style="padding: 3px;">
                      
                        <input type="date"  name="checkinDate" value="<?php echo $GuestEdit[$i]['checkinDate']; ?>"id="checkinDate" onchange="validateDates()" />
                    </div>
                </td>
            </tr>
            <tr class="c1">
                <td>Check-Out Date:</td>
                <td>
                    <div style="padding: 3px;">
                      
                        <input type="date"  name="checkoutDate" value="<?php echo $GuestEdit[$i]['checkoutDate']; ?>"id="checkoutDate"onchange="validateDates()"/>
                    </div>
                </td>
            </tr>
            <tr class="c1">
                <td>Price Range:</td>
                <td>
                    <div style="padding: 3px;">
                      
                        <input type="number" name="price" value="<?php echo $GuestEdit[$i]['price']; ?>"id="price" onkeyup="validatePrice()"/>
                    </div>
                </td>
            </tr>
           
            <tr class="c1">
        <td colspan="2" style="text-align: center;">
        <div style="padding: 7px;">
        <button id="b7"value="update"onclick="validateEdit()" >Update</button></div>
    </td></tr>
            </table>
   
   
        
         
              
        
    <?php } ?>
 

    
    
</form>
<script>
   
    function validateDates() {
    let checkinDate = document.getElementById('checkinDate').value;
    let checkoutDate = document.getElementById('checkoutDate').value;
    let obj = document.getElementById('validationMessage');
 
    let currentDate = new Date();
    let checkin = new Date(checkinDate);
    let checkout = new Date(checkoutDate);
 
    if (checkin < currentDate) {
        obj.innerHTML = "Check-in date must be a future date.";
        obj.style.color = 'red';
        return false;
    } else if (checkout <= checkin) {
        obj.innerHTML = "Check-out date must be after the check-in date.";
        obj.style.color = 'red';
        return false;
    } else if (checkout <= currentDate) {
        obj.innerHTML = "Check-out date must be in the future.";
        obj.style.color = 'red';
        return false;
    } else {
        obj.innerHTML = "Dates are valid.";
        obj.style.color = 'green';
        return true;
    }
}

    function validateCapacity() {
    let capacity = document.getElementById('capacity').value;
    let obj = document.getElementById('validationMessage'); 

    if (!Number.isInteger(Number(capacity)) || capacity <= 0 || capacity >= 6) {
        obj.innerHTML = "Capacity must be a positive integer between 1 and 5";
        obj.style.color = 'red';
        return false;
    } else {
        obj.innerHTML = "Valid capacity";
        obj.style.color = 'black';
        return true;
    }
}

function validatePrice() {
    let price = parseFloat(document.getElementById('price').value);
    let obj = document.getElementById('validationMessage'); 

  
    if (isNaN(price) || price <= 2000 || price >= 10000) {
        obj.innerHTML = "Price must be a number greater than 2000 and less than 10000.";
        obj.style.color = 'red';
        return false; 
    } 

   
    if (price <= 0) {
        obj.innerHTML = "Price must be a positive number.";
        obj.style.color = 'red';
        return false; 
    }

   
    obj.innerHTML = "Valid price";
    obj.style.color = 'black';
    return true; 
}


    function validateRoomType() {
        let roomType = document.getElementById('roomType').value;
        let obj = document.getElementById('validationMessage'); 

        if (roomType === "single" || roomType === "double" || roomType === "suite") {
            obj.innerHTML = " room type: " + roomType;
            obj.style.color = 'black';
        } else {
            obj.innerHTML = "Please select a valid room type.";
            obj.style.color = 'red';
        }
    }
   

function validateEdit(){
    
    
       alert ( "are u sure u want to update it");
}

</script>

</body>
</html>

        