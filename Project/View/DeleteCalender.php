<?php
require_once('../Model/Schedledb.php');

if(!isset($_COOKIE['flag'])){
    header('location: login.php');
}


$schedule=getAllSchedule();


?>
<html>
    <head>
        <title>Profile</title>
    </head>
<body>
<table border="1" cellspacing="0" width="750">

        <tr>
            <td colspan=2><table><tr><td width="334">Click & Stay</td><td align=right>  Logged in as Admin
</td></tr></table></td>
        </tr>

        <tr  style="height:200;">
            <td align="Left" style="width:200">
        <b>Account</b><hr>
 
                    <span align="left">
                        <ul>
                            <li><a href="AdminHome.php">Home</a></li>
                            <li><a href="CalenderAdmin.php">View Schedule</a></li>
                            <li><a href="AddCalender.php">Add Schedule</a></li>
                            <li><a href="UpdateCalender.php">Update Schedule</a></li>
                            <li><a href="DeleteCalender.php">Delete Schedule</a></li>
                        </ul>
</span>
     
                </td><td align=top width="400"><span align=top>
                    <fieldset width="200">
                        <legend>Guest</legend>
                        <table border=1; cellspacing='0'>
                            <tr>
                           
                <td>ID</td>
                <td>DATE</td>
                <td>SCHEDULE</td>
                <td>TIME</td>
                <td>DEPARTMENT</td>
                <td>ACTION></td>
            </tr><?php for($i=0; $i<count($schedule); $i++){?>
                            <tr>
                            <td> <?php echo $schedule[$i]['sid']; ?></td>  
                            <td> <?php echo $schedule[$i]['dd']; ?>/<?php echo $schedule[$i]['mm']; ?>/<?php echo $schedule[$i]['yyyy']; ?></td>  
                            <td> <?php echo $schedule[$i]['schedule']; ?></td>  
                            <td> <?php echo $schedule[$i]['time']; ?></td>  
                            <td> <?php echo $schedule[$i]['department']; ?></td>  
                            <td><a href="deleteCalView.php?sid=<?=$schedule[$i]['sid']?>"> Delete </a> </td>
                        </tr>
                        <?php } ?>
        </table>
                        
               
</body>
</html>

    