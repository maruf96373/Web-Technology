<?php
if (!isset($_COOKIE['flag'])) {
    header('location: login.php');
}
require_once('../Model/bookings.php');
$GuestId = isset($_REQUEST['guestId']) ? $_REQUEST['guestId'] : '';
$guest = SearchCustomer($GuestId);
?>


<html >
<head>
  
   
    <title>Booking Management</title>
    <link rel="stylesheet" href="../Assets/Admin.css"/>
</head>

    
<body id="b8">

<fieldset id="b9">
<img src="../Assets/logo.png" id="logo-image">
    <h3 id="b1"><u>Click & Stay</u></h3>
    
    <h4 id="b10">Find your next stay</h4>
    <a id="b11" href="AdminHome.php">Home</a>
    <a id="b4" href="CustomerView.php">See customer Details</a>
      
</fieldset>
<h3 id="validationMessage"></h3> 
<form>

  
        <table cellspacing="0" align="center" >
            <tr class="c3">
                <td>Guest Id:</td>
                <td>
                    <div style="padding: 3px;">
                        <input type="text" name="guestId" id="guestId" onkeyup=" validateId()">
                    </div>
                </td>
            </tr>
            <tr class="c3">
                <td colspan="4" align="center">
                    <div style="padding: 3px;">
                        <button type="submit">Search</button>
                       
                    </div>
                </td>
            </tr>
            </table>  
       
        
        <table cellspacing="0" border="1"  align="center" >
            <tr class="c3">
                <td>Guest Id</td>
                <td>Guest Number</td>
                <td>Room Type</td>
                <td>Check-in Date</td>
                <td>Check-Out Date</td>
                <td>Price Range</td>
            </tr>
            <?php for ($i = 0; $i < count($guest); $i++) { ?>
            <tr>
                <td><?php echo $guest[$i]['guestId']; ?></td>
                <td><?php echo $guest[$i]['capacity']; ?></td>
                <td><?php echo $guest[$i]['roomType']; ?></td>
                <td><?php echo $guest[$i]['checkinDate']; ?></td>
                <td><?php echo $guest[$i]['checkoutDate']; ?></td>
                <td><?php echo $guest[$i]['price']; ?></td>
            </tr> 
            <?php } ?>
        </table>
       
    </form>
    <script>
    function validateId() {
        let roomId = document.getElementById('guestId').value;
        let obj = document.getElementById('validationMessage'); 
        if (roomId.length !== 5 || parseInt(roomId) <= 0) {
            obj.innerHTML = "Guest Id must be 5 digits long and greater than 0";
            obj.style.color = 'red';
        } else {
            obj.innerHTML = "Valid Id";
        obj.style.color = 'black';
        return true;
        }
    }
   </script> 
</body>
</html>
