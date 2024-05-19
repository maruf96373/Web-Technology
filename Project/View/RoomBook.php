<?php
Session_start();

if(!isset($_COOKIE['flag'])){
    header('location: login.php');
}


require_once('../Model/bookings.php');
$RoomNumber= $_SESSION['roomNumber'];


$room = getRoom($RoomNumber);

   ?>

<html>
<head>
    <title> View Room</title>
    <link rel="stylesheet" href="../Assets/customerStyle.css"/>
</head>
<body id="b8">
<fieldset id="b9">
<img src="../Assets/logo.png" id="logo-image">
    
    <h3 id="b1"><u>Click&Stay</u></h3>
    
    <h4 id="b10">Find your next stay</h4>
    <a id="b4" href="BookingCustomer.php">Back</a>
    <a id="b11" href="home.php">home</a>
</fieldset>

   
    <form method="post" action="FacilityCustomer.php" enctype="">
    <div class="room-container">
<?php for($i=0; $i<count($room); $i++){?>
        <div class="room-item"style="text-align: left;">
            <img src="<?php echo $room[$i]['proPic'] ?>"  id="room-picture">
             Room Number: <?php echo $room[$i]['roomNumber']; ?><br>
            Room Type: <?php echo $room[$i]['roomType']; ?><br>
            Capacity: <?php echo $room[$i]['capacity']; ?><br>
            Price: <?php echo $room[$i]['price']; ?> tk<br>
            Check in Date:<?php echo $room[$i]['checkinDate']; ?> <br>
           
           Check out Date:<?php echo $room[$i]['checkoutDate']; ?><br>
                      
              
              
               
               
            
            <?php } ?>
            </div>
        

        </body>
        </html>
        