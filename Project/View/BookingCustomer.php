
<?php

    

    if(!isset($_COOKIE['flag'])){
        header('location: login.php');
    }
    


?>


<html>
<head>
    

    <title>Online Booking Form</title>
    <link rel="stylesheet" href="../Assets/customerStyle.css"/>
</head>
<body  id="b8" >
    <form method="post" action="BookingCustomerView.php" enctype="">
    
    <fieldset id="b9">
    <img src="../Assets/logo.png" id="logo-image">
        <h3 id="b1"><u>Click & Stay</u></h3>
        
        <h4 id="b10">Find your next stay</h4>
        <a id="b11" href="roomCustomerView.php">See All Rooms</a>
          <a id="b4" href="home.php">home</a>
    </fieldset>
    <h3 id="validationMessage"></h3> 
    <fieldset id="b14" >
   

         <table   align="center" class="c1">
                   <tr class="c1">
                    <td>Guest Number:</td>    
                    <td>
                        <div style="padding: 3px;">
                            <input type="number"name="capacity" id="capacity" onkeyup="validateCapacity()">
                        </div>
                    </td>
                   
</tr>
<tr class="c1">
               
                    <td>Room Type:</td>
                    <td>
                        <div style="padding: 3px;">
                            <select name="roomType" id="roomType" onchange="validateRoomType()">
                            <option value="">Select</option>
                                <option value="single">Single</option>
                                <option value="double">Double</option>
                                <option value="suite">Suite</option>
                            </select>
                        </div>
                    </td> 
</tr>
               
<tr class="c1">
                    <td>Check-in Date:</td>
                    <td>
                        <div style="padding: 3px;">
                            <input type="date" id="checkinDate" name="checkinDate" onchange="validateDates()">
                        </div>
                    </td>
                   
                </tr>
                <tr class="c1">
                    <td>Check-Out Date:</td>
                    <td>
                        <div style="padding: 3px;">
                            <input type="date" id="checkoutDate" name="checkoutDate" onchange="validateDates()">
                        </div>
                    </td>
                    
                </tr>
                <tr class="c1" align ="center">
                    <td>  Price Range:     </td>    
                    <td>
                        <div style="padding: 3px;">
                            <input type="number"name="price"id="price" onkeyup="validatePrice()">
                        </div>
                    </td>
</tr>

                    </table>
                
                    
                    <td  align="center">
                        <div style="padding: 15px;">
                            <button type="submit" id="b3">Search Rooms</button>
                        </div>
                    </td> 
                    

                    </fieldset>   
           
            

    </form>
    <script>
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
    
</script>
</body>
</html>
   