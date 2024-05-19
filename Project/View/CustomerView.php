<?php
session_start();
if(!isset($_COOKIE['flag'])){
    header('location: login.php');
}

require_once('../Model/bookings.php');
$GuestId = isset($_REQUEST['guestd']) ? $_REQUEST['guestId'] : '';
    


$guest=viewCustomer();
$_SESSION['guest'] = $guest;



    ?>

<html>
<head>
    <title> View Room</title>
    <link rel="stylesheet" href="../Assets/Admin.css"/>
</head>
<body id="b8">
<fieldset id="b9">
<img src="../Assets/logo.png" id="logo-image">
    <h3 id="b1"><u>Click & Stay</u></h3>
    
    <h4 id="b10">Find your next stay</h4>
  
    <a  id="b11"  href="AdminHome.php">Home</a>
         <a  id="b4" href="BookingAdmin.php">Back</a>
</fieldset>

    

<table border=1  cellspacing=0 align="center" class="c4">

           
                <tr class="c3">
            <td>Guest Id</td>
                <td>Capacity</td>
                <td>Room Type</td>
                <td>Check in Date</td>
                <td>Check out Date</td>
                <td> price</td>  
                 <td>Action</td>
                <td>Action</td>
            </tr> 
            <?php for($i=0; $i<count($guest); $i++){?>
            <tr>
              <td> <?php echo $guest[$i]['guestId']; ?></td>
              <td> <?php echo $guest[$i]['capacity']; ?></td>
              <td>  <?php echo $guest[$i]['roomType']; ?></td>
              <td> <?php echo $guest[$i]['checkinDate']; ?></td>
              <td> <?php echo $guest[$i]['checkoutDate']; ?></td>
              <td> <?php echo $guest[$i]['price']; ?></td>
                
             <td><b> <a href="CustomerEdit.php?guestId=<?=$guest[$i]['guestId']?>"> Edit </a></b> </td>
             <td><b> <a  href="CustomerDelete.php?guestId=<?=$guest[$i]['guestId']?>">Delete </a> </b></td>
            </tr>
            <?php } ?>
            </table>
        
           
        </body>
        </html>
        