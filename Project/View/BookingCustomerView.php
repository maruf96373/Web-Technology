<?php


if(!isset($_COOKIE['flag'])){
    header('location: login.php');
}


require_once('../Model/bookings.php');
$roomType = isset($_REQUEST['roomType']) ? $_REQUEST['roomType'] : '';
$Price = isset($_REQUEST['price']) ? $_REQUEST['price'] : '';
$GuestNumber = isset($_REQUEST['capacity']) ? $_REQUEST['capacity'] : '';
$CheckinDate = isset($_REQUEST['checkinDate']) ? $_REQUEST['checkinDate'] : '';
$CheckoutDate = isset($_REQUEST['checkoutDate']) ? $_REQUEST['checkoutDate'] : '';



$room=search($GuestNumber,$roomType, $Price,$CheckinDate,$CheckoutDate);


   ?>

<html>
<head>
    <title> View Room</title>
    <link rel="stylesheet" href="../Assets/customerStyle.css"/>
    
</head>
<body id="b8">
<form method="post" action="BookCustomer.php" enctype="">
<fieldset id="b9">
<img src="../Assets/logo.png" id="logo-image">
    <h3 id="b1"><u>Click&Stay</u></h3>
    
    <h4 id="b10">Find your next stay</h4>
   <a id="b4" href="BookingCustomer.php">Back<a>
        <a id="b11" href="FacilityCustomer.php">Next</a> 
      
</fieldset>


<div class="room-container">
<?php for($i=0; $i<count($room); $i++){?>
        <div class="room-item" style="text-align: left;">
            <img src="<?php echo $room[$i]['proPic'] ?>" id="room-picture">
            
            Room Type: <?php echo $room[$i]['roomType']; ?><br>
            Capacity: <?php echo $room[$i]['capacity']; ?><br>
            Price: <?php echo $room[$i]['price']; ?> tk<br>
           Check in Date:<?php echo $room[$i]['checkinDate']; ?> <br>
           
            Check out Date:<?php echo $room[$i]['checkoutDate']; ?><br>
           
           
              
              
               <p> <a id="b12" href="BookCustomer.php?roomNumber=<?=$room[$i]['roomNumber']?>"> Book </a></p>
               
                </div>
    <?php } ?>
</div>


        
        </body>
        </html>
        