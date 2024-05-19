<?php
session_start(); 
require_once('../Model/guestdb.php');
if (!isset($_SESSION['username'])) {
    header('location: login.php');
    exit();
}

if(!isset($_COOKIE['flag'])){
    header('location: Login.php');
}
$user = $_SESSION['username'];

?>
<html>
    <head>
        <title>Home</title>
        <link rel="stylesheet" href="../Assets/Admin.css"/>
    </head>
<body id="b8">
        <fieldset id="b9">
<img src="../Assets/logo.png" id="logo-image">
<div align=right><b>Welcome <?php echo $user; ?></div>
    <h3 id="b1"><u>Click & Stay</u></h3>
    
    <h4 id="b10">Find your next stay</h4>
      
</fieldset>
<b>Menu</b><hr>
<span align="left">
                        <ul>
                            <li><a class="c1" href="Dashboard.php">Dashboard</a></li>
                            <li><a class="c1" href="RoomAdmin.php">Room</a></li>
                            <li><a class="c1" href="BookingAdmin.php">Booking</a></li>
                            <li><a class="c1" href="GuestAdmin.php">Guest</a></li>
                            <li><a class="c1" href="StaffAdmin.php">Staff</a></li>
                            <li> <a class="c1" href="FacilityAdmin.php">Facility</a></li>
                            <li> <a class="c1" href="FoodAdmin.php">Food</a></li>
                            <li> <a class="c1" href="TransportAdmin.php">Transport</a></li>
                            <li> <a class="c1" href="PackageAdmin.php">Package</a></li>
                            <li> <a class="c1" href="PaymentAdmin.php">Payment</a></li>
                            <li> <a class="c1" href="ReviewAdmin.php">Review</a></li>
                            <li> <a class="c1" href="NotificationAdmin.php">Notification</a></li>
                            <li> <a class="c1" href="CalenderAdmin.php">Calender</a></li>
                            <li> <a class="c1" href="ReportAdmin.php">Report</a></li>
                            <li><a  class="c1" href="../Controller/LogOut.php">Logout </a></li>
                        </ul>
               
</body>
</html>