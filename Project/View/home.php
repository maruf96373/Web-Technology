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
        <link rel="stylesheet" href="../Assets/customerStyle.css"/>
    </head>
<body class="b1">

<fieldset id="b9">
    <img src="../Assets/logo.png" id="logo-image">
        <h3 id="b1"><u>Click & Stay</u></h3>
        
        <h4 id="b10">Find your next stay</h4>
        <?php for($i=0; $i<count($name); $i++){?>

<a id="b4" href="<?php echo $name[$i]['name']; ?>"><?php echo $name[$i]['name']; ?></a>
<?php } ?>
        
    </fieldset>
    
<table border="1" cellspacing="0" width="550" id="b2">

        <tr>
             
</td></tr></table></td>
        </tr>

        <tr  style="height:200;">
            <td align="Left" style="width:200" id="b5">
        <b>SideBar</b><hr>
 
                    <span align="left">
                        <ul>
                            <li><a class="c1" href="Profile.php">Profile</a></li>
                            <li><a class="c1" href="BookingCustomer.php">Booking</a></li>
                            <li><a class="c1" href="RoomService.php">Room Service</a></li>
                            <li> <a class="c1" href="FacilityCustomer.php">Facility</a></li>
                            <li> <a class="c1" href="Food.php">Food</a></li>
                            <li> <a class="c1" href="Transport.php">Transport</a></li>
                            <li> <a class="c1" href="PackageViewCustomer.php">Package</a></li>
                            <li> <a class="c1" href="payment.php">Payment</a></li>
                            <li> <a class="c1" href="Review.php">Review</a></li>
                            <li> <a class="c1" href="Notification.php">Notification</a></li>
                            <li> <a class="c1" href="Report.php">Report</a></li>
                            <li><a  class="c1" href="../Controller/LogOut.php">Logout </a></li>
                        </ul>
</span>
     
                
                
            </table>
               
</body>
</html>