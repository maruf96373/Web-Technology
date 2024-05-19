<?php
session_start();
if (!isset($_COOKIE['flag'])) {
    header('location: login.php');
    exit;
}
require_once('../Model/crudadmin.php');
$rooms = viewRoom();
?>

<html>
<head>
    <title>View Room</title>
    <link rel="stylesheet" href="../Assets/Admin.css"/>
</head>
<body id="b8">
<fieldset id="b9">
    <img src="../Assets/logo.png" id="logo-image">
    <h3 id="b1"><u>Click & Stay</u></h3>
    <h4 id="b10">Find your next stay</h4>
    <a id="b11" href="AdminHome.php">Home</a>
    <a id="b4" href="RoomAdmin.php">Back</a>
</fieldset>

<div class="room-container">
    <?php foreach ($rooms as $room) { ?>
        <div class="room-item" style="text-align: left;">
            <img src="<?php echo $room['proPic'] ?>"  id="room-picture">
            Room ID:<?php echo $room['roomId']; ?><br>
            Room Type:<?php echo $room['roomType']; ?><br>
            Room Number:<?php echo $room['roomNumber']; ?><br>
            Capacity:<?php echo $room['capacity']; ?><br>
            Price:<?php echo $room['price']; ?> tk<br>
            Check-in Date:<?php echo $room['checkinDate'];?><br>
            Check-out Date:<?php echo $room['checkoutDate']; ?><br>
            Status:<?php echo $room['roomStatus']; ?><br> 
            <p>
                <b><a href="roomEdit.php?roomId=<?php echo $room['roomId'] ?>">Edit</a>
                <span style="padding:7px">
                <a href="roomDelete.php?roomId=<?php echo $room['roomId'] ?>">Delete</a>
                </span></b>
            </p>
        </div>
    <?php } ?>
</div>

</body>
</html>
