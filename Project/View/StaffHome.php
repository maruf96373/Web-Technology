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
                            <li> <a style="color:rgb(0, 102, 255);margin-top: 10px; padding:10px;" href="TaskStaff.php">Task</a></li>
                            <li><a style="color:rgb(0, 102, 255);margin-top: 10px; padding:10px;"href=" NotificationStaff.php">Notification</a></li>
                            <li> <a style="color:rgb(0, 102, 255);margin-top: 10px; padding:10px;" href="FoodStaff.php">Food</a></li>
                            <li> <a style="color:rgb(0, 102, 255);margin-top: 10px; padding:10px;" href="RoomService.php">RoomService</a></li>
                            <li> <a style="color:rgb(0, 102, 255);margin-top: 10px; padding:10px;" href="StaffCal.php">Calender</a></li>
                            <li> <a style="color:rgb(0, 102, 255);margin-top: 10px; padding:10px;" href="ReportStaff.php">Report</a></li>
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