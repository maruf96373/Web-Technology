
<?php

    

    if(!isset($_COOKIE['flag'])){
        header('location: login.php');
    }
    require_once('../Model/bookings.php');
$RoomNumber= isset($_REQUEST['roomNumber']) ? $_REQUEST['roomNumber'] : '';


$room = getRoom($RoomNumber);




?>

<html>
<head>
    <title>Online Booking Form</title>
    <link rel="stylesheet" href="../Assets/customerStyle.css"/>
</head>
<body id="b8">
    <form method="post" action="../Controller/BookingCustomerCheck.php" enctype="">
    <fieldset id="b9">
    <img src="../Assets/logo.png" id="logo-image">
    <h3 id="b1"><u>Click & Stay</u></h3>
    
    <h4 id="b10">Find your next stay</h4>
    <a id="b4" href="BookingCustomer.php">Back</a>
        
      
</fieldset>

<h3 id="validationMessage"></h3>

<table border="0"  cellspacing="0" align="center" class="c8">
       

<?php for($i=0; $i<count($room); $i++){?>

            
            
            <tr class="c1">
            
                    <td>Guest Id:</td>    
                    <td>
                        <div style="padding: 3px;">
                            <input type="text"name="guestId" id="guestId" onkeyup=" validateId()">
                        </div>
                    </td>
                    
                </tr>
                <tr class="c1">
                    <td>Room Number:</td>    
                    <td>
                        <div style="padding: 3px;">
                            <input type="number"name="roomNumber" value="<?php echo $room[$i]['roomNumber']; ?>" readonly>
                        </div>
                    </td>
                   
                </tr>
                <tr class="c1">
                    <td>Guest Number:</td>    
                    <td>
                        <div style="padding: 3px;">
                            <input type="number"name="capacity" value="<?php echo $room[$i]['capacity']; ?>" readonly>
                        </div>
                    </td>
                   
                </tr>
                <tr class="c1">
                <td>Room Type:</td>
                <td>
                    <div style="padding: 3px;">
                        <select name="roomType" readonly >
                            <option value="single"<?php if ($room[$i]['roomType'] == 'single') echo 'selected="selected"'; ?>>Single</option>
                            <option value="double"<?php if ($room[$i]['roomType'] == 'double') echo 'selected="selected"'; ?>>Double</option>
                            <option value="suite"<?php if ($room[$i]['roomType'] == 'suite') echo 'selected="selected"'; ?>>Suite</option>
                        </select>
                    </div>
                </td>
            </tr>
                
                <tr class="c1">
                    <td>Check-in Date:</td>
                    <td>
                        <div style="padding: 3px;">
                            <input type="date" id="checkinDate" name="checkinDate"value="<?php echo $room[$i]['checkinDate']; ?>" readonly>
                        </div>
                    </td>
                   
                </tr>
                <tr class="c1">
                    <td>Check-Out Date:</td>
                    <td>
                        <div style="padding: 3px;">
                            <input type="date" id="checkoutDate" name="checkoutDate"value="<?php echo $room[$i]['checkoutDate']; ?>" readonly >
                        </div>
                    </td>
                    
                </tr>
                <tr class="c1">
                    <td>Price Range:</td>    
                    <td>
                        <div style="padding: 3px;">
                            <input type="number"name="price" value="<?php echo $room[$i]['price']; ?>" readonly>
                        </div>
                    </td>
                  
                </tr>
                <tr class="c1">
                    <td colspan="2" align="center">
                        <div style="padding: 7px;">
                            <button type="submit" id="b3" name="submit" value="submit"onclick="validateEdit()">Book Rooms</button>
                        </div>
                    </td> </tr>
                    
                    <?php } ?>
                
            </table>
            
            
    </form>
    
   <script>
    
    function validateId() {
        let roomId = document.getElementById('guestId').value;
        let obj = document.getElementById('validationMessage');
        if (roomId === "") {
        obj.innerHTML = "Id cannot be empty";
        obj.style.color = 'red';
        return false;
    } 
 
        if (roomId.length !== 5 || parseInt(roomId) <= 0) {
            obj.innerHTML = "Guest Id must be 5 digits long and greater than 0";
            obj.style.color = 'red';
        }  else{
            obj.innerHTML = " valid Id"; 
        obj.style.color = 'black';
        return true;
       
      }
         
  }
  



function validateEdit(){
    
    
       alert ( "are u sure u want to book this room");
}
    </script>
</body>
</html>