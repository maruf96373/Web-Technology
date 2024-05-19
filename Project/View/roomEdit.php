<?php


 if(!isset($_COOKIE['flag'])){
    header('location: login.php');
}
require_once('../Model/crudadmin.php');
$roomId = isset($_GET['roomId']) ? $_GET['roomId'] : '';
   
    
  $RoomEdit=roomEdit($roomId);
    
    
    
 
?>
 
<html>
<head>
    <title>Edit Room</title>
    <link rel="stylesheet" href="../Assets/Admin.css"/>
</head>

<body id="b8">
<fieldset id="b9">
<img src="../Assets/logo.png" id="logo-image">
    
    <h3 id="b1"><u>Click & Stay</u></h3>
    
    <h4 id="b10">Find your next stay</h4>
    <b> <a id="b4" href="RoomView.php">Back</a></b>
</fieldset>
<h3 id="validationMessage"></h3> 
    <form method="post" action="../Controller/roomEditCheck.php" enctype="multipart/form-data">
        <table align="center"  class="c1">
        <?php for($i=0; $i<count($RoomEdit); $i++){?>
            <tr class="c1">
                <td>Room Id:</td>
                <td>
                    <div style="padding: 3px;">
                        <input type="number" name="roomId" value="<?php echo $RoomEdit[$i]['roomId']; ?>" id="roomId"  readonly /> 
                    </div>
                </td>
            </tr>
           
              <tr class="c1">
                <td>Room Type:</td>
                <td>
                    <div style="padding: 3px;">
                        <select name="roomType" id="roomType" onchange="validateRoomType()" >
                            <option value="single"<?php if ($RoomEdit[$i]['roomType'] == 'single') echo 'selected="selected"'; ?>>Single</option>
                            <option value="double"<?php if ($RoomEdit[$i]['roomType'] == 'double') echo 'selected="selected"'; ?>>Double</option>
                            <option value="suite"<?php if ($RoomEdit[$i]['roomType'] == 'suite') echo 'selected="selected"'; ?>>Suite</option>
                        </select>
                    </div>
                </td>
            </tr>
            <tr class="c1">
                <td>Room Number:</td>
                <td>
                    <div style="padding: 3px;">
                        <input type="number" name="roomNumber" value="<?php echo $RoomEdit[$i]['roomNumber']; ?>" id="roomNumber" onkeyup="validateNumber()" /> 
                    </div>
                </td>
            </tr>
            <tr class="c1">
                <td>Capacity:</td>
                <td>
                    <div style="padding: 3px;">
                        <input type="number" name="capacity" value="<?php echo $RoomEdit[$i]['capacity']; ?>"id="capacity" onkeyup="validateCapacity()" /> <br>
                    </div>
                </td>
            </tr>
            <tr class="c1">
                <td>Price:</td>
                <td>
                    <div style="padding: 3px;">
                        <input type="number" name="price" value="<?php echo $RoomEdit[$i]['price']; ?>"id="price" onkeyup="validatePrice()" /> <br>
                    </div>
                </td>
            </tr>
            <tr class="c1">
                    <td>Check-in Date:</td>
                    <td>
                        <div style="padding: 3px;">
                            <input type="date" id="checkinDate" name="checkinDate"value="<?php echo $RoomEdit[$i]['checkinDate']; ?>" onchange="validateDates()">
                        </div>
                    </td>
                   
                </tr>
                <tr class="c1">
                    <td>Check-Out Date:</td>
                    <td>
                        <div style="padding: 3px;">
                            <input type="date" id="checkoutDate" name="checkoutDate"value="<?php echo $RoomEdit[$i]['checkoutDate']; ?>" onchange="validateDates()">
                        </div>
                    </td>
                    
                </tr>
                

            <tr class="c1">
    <td>Room Pic:</td><td>
    <input type="file" name="proPic" accept="image/*" id="proPic"value="<?php echo $RoomEdit[$i]['proPic']; ?>" onchange="validateFilename()"  /></td>

             
           
                <img src="<?php echo $RoomEdit[$i]['proPic']; ?>" alt="Room Picture" class="room-pic-img">
           
       
    
</tr>
             
            <tr class="c1">
                <td colspan="2" style="text-align: center;">
                    <div style="padding: 15px;">
                        <b><button type="submit" name="update" id="b7"value="update" onclick="validateEdit()">Update</button><b>
                    </div>
                </td>
            </tr>
            
        </table>
     
      <?php } ?>
    </form>
    <script>
        
    
    function validateStatus() {
        let selectedAc = document.getElementById('roomStatus').value;
        let obj = document.getElementById('validationMessage');

        if (selectedAc === "") {
            obj.innerHTML = "Please select a status.";
            obj.style.color = 'red';
            return false;
        } else {
            obj.innerHTML = "Selected status: " + selectedAc;
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
    function validateFilename() {
    let fileInput = document.getElementById('proPic');
    let obj = document.getElementById('validationMessage');

    if (!fileInput.files || !fileInput.files.length) {
        obj.innerHTML = "Please select a picture";
        obj.style.color = 'red';
        return false;
    } else {
        obj.innerHTML = " valid picture"; 
    }
}

    function validateNumber() {
        let roomNumber = document.getElementById('roomNumber').value;
        let obj = document.getElementById('validationMessage'); 

        if (roomNumber.length !== 3 || parseInt(roomNumber) <= 0) {
            obj.innerHTML = "Room number must be 3 digits long and greater than 0";
            obj.style.color = 'red';
        } else {
            obj.innerHTML = "Valid Number";
        obj.style.color = 'black';
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
    
    
       alert ( "are u sure u want to update it?");
}

</script>
</body>

</html> 