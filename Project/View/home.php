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

$name=name($user);
?>
<html>
    <head>
        <title>Home</title>
    </head>
<body>
<table border="1" cellspacing="0" width="550">
<?php for($i=0; $i<count($name); $i++){?>
        <tr>
            <td colspan=2><table><tr><td width="324">Click & Stay</td><td align=right>  Logged in as <a style="color:rgb(0, 102, 255); " href="<?php echo $name[$i]['name']; ?>"><?php echo $name[$i]['name']; ?></a>
</td></tr></table></td>
        </tr>

        <tr  style="height:200;">
            <td align="Left" style="width:200">
        <b>Account</b><hr>
 
                    <span align="left">
                        <ul>
                            <li><a style="color:rgb(0, 102, 255);margin-top: 10px; padding:10px;" href="Profile.php">Profile</a></li>
                            <li><a style="color:rgb(0, 102, 255);margin-top: 10px; padding:10px;" href="BookingCustomer.php">Booking</a></li>
                            <li><a style="color:rgb(0, 102, 255);margin-top: 10px; padding:10px;" href="RoomService.php">Room Service</a></li>
                            <li> <a style="color:rgb(0, 102, 255);margin-top: 10px; padding:10px;" href="Facility.php">Facility</a></li>
                            <li> <a style="color:rgb(0, 102, 255);margin-top: 10px; padding:10px;" href="Food.php">Food</a></li>
                            <li> <a style="color:rgb(0, 102, 255);margin-top: 10px; padding:10px;" href="Transport.php">Transport</a></li>
                            <li> <a style="color:rgb(0, 102, 255);margin-top: 10px; padding:10px;" href="Package.php">Package</a></li>
                            <li> <a style="color:rgb(0, 102, 255);margin-top: 10px; padding:10px;" href="Payment.php">Payment</a></li>
                            <li> <a style="color:rgb(0, 102, 255);margin-top: 10px; padding:10px;" href="Review.php">Review</a></li>
                            <li> <a style="color:rgb(0, 102, 255);margin-top: 10px; padding:10px;" href="Notification.php">Notification</a></li>
                            <li> <a style="color:rgb(0, 102, 255);margin-top: 10px; padding:10px;" href="Report.php">Report</a></li>
                            <li><a  style="color:rgb(0, 102, 255);margin-top: 10px; padding:10px;" href="../Controller/LogOut.php">Logout </a></li>
                        </ul>
</span>
     
                </td><td align=top><span align=top><b>Welcome <?php echo $name[$i]['name']; ?></b></td>
                </tr>
                <tr>
                    <td colspan=2 align=center>Copyright © 2017
</td>
</tr>
<?php } ?>
            </table>
               
</body>
</html>