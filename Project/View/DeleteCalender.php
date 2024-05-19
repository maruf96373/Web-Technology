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
        <link rel="stylesheet" href="../Assets/Admin.css"/>
    </head>
    <body id="b8">
        <fieldset id="b9">
<img src="../Assets/logo.png" id="logo-image">
<div align=right><b>Admin</b></div>
    <h3 id="b1"><u>Click & Stay</u></h3>
    
    <h4 id="b10">Find your next stay</h4>
      
</fieldset>
<div align="left" id="b20">
        <b>Menu</b><hr>
 
                   
                        <ul>
                            <li><a href="AdminHome.php">Home</a></li>
                            <li><a href="CalenderAdmin.php">View Schedule</a></li>
                            <li><a href="AddCalender.php">Add Schedule</a></li>
                            <li><a href="UpdateCalender.php">Update Schedule</a></li>
                            <li><a href="DeleteCalender.php">Delete Schedule</a></li>
                        </ul>
</div>
     
                </td><td align=top width="400"><span align=top>
                    <fieldset width="200">
                        <table border=1; cellspacing='0' id="a20">
                            <tr>
                           
                <td>ID</td>
                <td>DATE</td>
                <td>SCHEDULE</td>
                <td>TIME</td>
                <td>DEPARTMENT</td>
                <td>ACTION</td>
            </tr><?php for($i=0; $i<count($schedule); $i++){?>
                            <tr>
                            <td> <?php echo $schedule[$i]['sid']; ?></td>  
                            <td> <?php echo $schedule[$i]['dd']; ?>/<?php echo $schedule[$i]['mm']; ?>/<?php echo $schedule[$i]['yyyy']; ?></td>  
                            <td> <?php echo $schedule[$i]['schedule']; ?></td>  
                            <td> <?php echo $schedule[$i]['hh']; ?>/<?php echo $schedule[$i]['min']; ?>/<?php echo $schedule[$i]['meridiun']; ?></td>  
                            <td> <?php echo $schedule[$i]['department']; ?></td>  
                            <td><a href="deleteCalView.php?sid=<?=$schedule[$i]['sid']?>"> Delete </a> </td>
                        </tr>
                        <?php } ?>
        </table>
                        
               
</body>
</html>

    