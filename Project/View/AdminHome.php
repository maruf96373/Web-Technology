<?php
session_start(); 
require_once('../Model/guestdb.php');
if (!isset($_SESSION['username'])) {
    header('location: login.php');
    exit();
}

if(!isset($_COOKIE['flag'])){
    header('location: login.php');
}
$user = $_SESSION['username'];

?>
<html>
    <head>
        <title>Home</title>
    </head>
<body>
<table border="1" cellspacing="0" width="550">
        <tr>
            <td colspan=2><table><tr><td width="324">Click & Stay</td><td align=right>  Logged in as <a style="color:rgb(0, 102, 255); " href="<?php echo $user; ?>"><?php  echo $user; ?></a>
</td></tr></table></td>
        </tr>

        <tr  style="height:200;">
            <td align="Left" style="width:200">
        <b>Account</b><hr>
 
                    <span align="left">
                        <ul>
                            <li><a style="color:rgb(0, 102, 255);margin-top: 10px; padding:10px;" href="Dashboard.php">Dashboard</a></li>
                            <li><a style="color:rgb(0, 102, 255);margin-top: 10px; padding:10px;" href="RoomAdmin.php">Room</a></li>
                            <li><a style="color:rgb(0, 102, 255);margin-top: 10px; padding:10px;" href="BookingAdmin.php">Booking</a></li>
                            <li><a style="color:rgb(0, 102, 255);margin-top: 10px; padding:10px;" href="GuestAdmin.php">Guest</a></li>
                            <li><a style="color:rgb(0, 102, 255);margin-top: 10px; padding:10px;" href="StaffAdmin.php">Staff</a></li>
                            <li> <a style="color:rgb(0, 102, 255);margin-top: 10px; padding:10px;" href="FacilityAdmin.php">Facility</a></li>
                            <li> <a style="color:rgb(0, 102, 255);margin-top: 10px; padding:10px;" href="FoodAdmin.php">Food</a></li>
                            <li> <a style="color:rgb(0, 102, 255);margin-top: 10px; padding:10px;" href="TransportAdmin.php">Transport</a></li>
                            <li> <a style="color:rgb(0, 102, 255);margin-top: 10px; padding:10px;" href="PackageAdmin.php">Package</a></li>
                            <li> <a style="color:rgb(0, 102, 255);margin-top: 10px; padding:10px;" href="PaymentAdmin.php">Payment</a></li>
                            <li> <a style="color:rgb(0, 102, 255);margin-top: 10px; padding:10px;" href="ReviewAdmin.php">Review</a></li>
                            <li> <a style="color:rgb(0, 102, 255);margin-top: 10px; padding:10px;" href="NotificationAdmin.php">Notiication</a></li>
                            <li> <a style="color:rgb(0, 102, 255);margin-top: 10px; padding:10px;" href="CalenderAdmin.php">Calender</a></li>
                            <li> <a style="color:rgb(0, 102, 255);margin-top: 10px; padding:10px;" href="ReportAdmin.php">Report</a></li>
                            <li><a  style="color:rgb(0, 102, 255);margin-top: 10px; padding:10px;" href="../Controller/LogOut.php">Logout </a></li>
                        </ul>
</span>
     
                </td><td align=top><span align=top><b>Welcome <?php echo $user; ?></b></td>
                </tr>
                <tr>
                    <td colspan=2 align=center>Copyright © 2017
</td>
</tr>
            </table>
               
</body>
</html>