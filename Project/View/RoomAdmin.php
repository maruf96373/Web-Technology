<?php

if(!isset($_COOKIE['flag'])){
    header('location: login.php');
}
?>
<html>

<head>
    <title>Room Management Form</title>
    <link rel="stylesheet" href="../Assets/Admin.css"/>
</head>
<body id="b8">

  
    <fieldset id="b9">
    <img src="../Assets/logo.png" id="logo-image">
    
    <h3 id="b1"><u>Click & Stay</u></h3>
    
    <h4 id="b10">Find your next stay</h4>
    <a id="b11" href="roomView.php">See All Rooms</a>
    <a id="b4" href="AdminHome.php">Back</a>
    
      
</fieldset>

   
    <h3 id="validationMessage"></h3> 
        <form method="post" action="../Controller/RoomAddCheck.php" enctype="multipart/form-data">
          
                <table align="center"class="c1" >
                    <tr class="c1">
                        <td>Room ID:</td>
                        <td>
                            <div style="padding: 3px;">
                            <input type="text" name="roomId" id="roomId" onkeyup="validateId()" />

                            </div>
                        </td>
                        
                    </tr> 
                   
</tr>
                   
                    
                    <tr class="c1">
                        <td>Room Type:</td>
                        <td>
                            <div style="padding: 3px;">
                                <select name="roomType" id="roomType" onchange="validateRoomType()">
                                    <option value="">select</option>
                                    <option value="single">Single</option>
                                    <option value="double">Double</option>
                                    <option value="suite">Suite</option>
                                </select>
                            </div>
                        </td>
                    </tr>

                    <tr class="c1">
                        <td>Room Number:</td>
                        <td>
                            <div style="padding: 3px;">
                                <input type="text" name="roomNumber" id="roomNumber" onkeyup="validateNumber()"/>
                            </div>
                        </td>
                      
                    </tr>
                    <tr class="c1">
                        <td>Capacity:</td>    
                        <td>
                            <div style="padding: 3px;">
                                <input type="number" name="capacity" id="capacity" onkeyup="validateCapacity()"/>
                            </div>
                        </td>
                      
                    </tr>
                    <tr class="c1">
                        <td>Price Per Night:</td>
                        <td>
                            <div style="padding: 3px;">
                                <input type="number" name="price" id="price" onkeyup="validatePrice()"/>
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
                <tr class="c1">
          
            <td> Status:</td>
            <td>
                <div style="padding: 3px;">
                    <select name="roomStatus" id="roomStatus" onchange="validateStatus()"  >
                        <option value="">Select</option>
                        <option value="available">Available</option>
                     
                    </select>
                </div>
                </td>
        </tr>
                   
                    <tr class="c1">
    <td>Room Pic:</td>    
    <td>
        <div style="padding: 3px;">
            <input type="file" id="proPic" name="proPic" accept="image/*" onchange="validateFilename()" />
        </div>
        <div id="picValidationMessage"></div>
    </td>
</tr>

                    <tr>
                        <td colspan="2" style="text-align: center;">
                        <b><button type="submit" id="b7" >Add</button></b>
                           
                        </td>
                    </tr>
                
             </table>   
        </form>
        <script>
  


  function validateId() {
    let roomId = document.getElementById('roomId').value;
    let obj = document.getElementById('validationMessage');
    
    if (roomId === "") {
        obj.innerHTML = "Id cannot be empty";
        obj.style.color = 'red';
        return false;
    }
    if (roomId.length !== 4 || parseInt(roomId) <= 0 || isNaN(parseInt(roomId))) {
        obj.innerHTML = "Room ID must be a 4-digit positive number";
        obj.style.color = 'red';
        return false;
    }
    
   else{
    let xhttp = new XMLHttpRequest();
      xhttp.open('POST', '../Controller/RoomAddCheck.php', true);
      xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      xhttp.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
        xhttp.onreadystatechange = function() {
          if (xhttp.readyState === 4 && xhttp.status === 200) {
            const response = JSON.parse(xhttp.responseText);   
            if (response.roomId === "valid") {
              obj.innerHTML = "Id Valid";
              obj.style.color = 'black';
              return true;
            } else {
              obj.innerHTML = "This Id is already taken. Please choose a different Id";
              obj.style.color = 'red';
              return false;
            }
          }
        };
     
        xhttp.send('roomId='+roomId);
      }

  }
  


function validateStatus() {
     
        let selectedAc = document.getElementById('status').value;
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
    
function validateFilename() {
    let fileInput = document.getElementById('proPic');
    let obj = document.getElementById('validationMessage');

    if (!fileInput.files || !fileInput.files.length) {
        obj.innerHTML = "Please select a picture";
        obj.style.color = 'red';
        return false;
    } else {
        obj.innerHTML = " valid pic";
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
    if (checkinDate === ""|| checkoutDate=="") {
        obj.innerHTML = "Check in Date Or Check out Date cannot be empty";
        obj.style.color = 'red';
        return false;
    }
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

function validateNumber() {
    let roomNumber = document.getElementById('roomNumber').value;
    let obj = document.getElementById('validationMessage');
    if (roomNumber === "") {
        obj.innerHTML = "Room Number cannot be empty";
        obj.style.color = 'red';
        return false;
    } 
    if (roomNumber.length !== 3 || parseInt(roomNumber) <= 0) {
        obj.innerHTML = "Room number must be 3 digits long and greater than 0";
        obj.style.color = 'red';
        return false;
    }
    else{
        let xhttp = new XMLHttpRequest();
      xhttp.open('POST', '../Controller/RoomAddCheck.php', true);
      xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      xhttp.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
        xhttp.onreadystatechange = function() {
          if (xhttp.readyState === 4 && xhttp.status === 200) {
            const response = JSON.parse(xhttp.responseText);   
            if (response.roomNumber === "valid") {
              obj.innerHTML = " Valid Number";
              obj.style.color = 'black';
            } else {
              obj.innerHTML = "This Number is already taken. Please choose a different Number";
              obj.style.color = 'red';
            }
          }
        };
     
        xhttp.send('roomNumber='+roomNumber);
  }
  
}



    function validateCapacity() {
    let capacity = document.getElementById('capacity').value;
    let obj = document.getElementById('validationMessage'); 
    if (capacity === "") {
        obj.innerHTML = "Capacity cannot be empty";
        obj.style.color = 'red';
        return false;
    } 
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

    if (price=== "") {
        obj.innerHTML = "Price cannot be empty";
        obj.style.color = 'red';
        return false;
    } 
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
        if (roomType === "") {
        obj.innerHTML = "Room Type cannot be empty";
        obj.style.color = 'red';
        return false;
    } 
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
