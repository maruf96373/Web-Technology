<?php
require_once('../Model/schedledb.php');

if(!isset($_COOKIE['flag'])){
    header('location: login.php');
}
$sid=$_REQUEST['sid'];
$schedule=scdl($sid);
?>
<html>
    <head>
        <title>Update View</title>
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
                            <li><a href="UpdateCalender.php">Update Calender</a></li>
                        </ul>
</span>
     
                </td><td align=top width="400"><span align=top>
                <form method="post" action="../Controller/UpdateCalCheck.php" enctype="">
                    <fieldset width="200">
                        <legend>Update Schedule</legend>
                        <table>
                        <?php for($i=0; $i<count($schedule); $i++){?>
                            <tr>
                            <td>Schedule Id</td> <td>:<input type="number" name="sid" value="<?php echo $schedule[$i]['sid']; ?>"></td>
                            </tr>
                            <tr>
                            <td>Schedule Date</td> <td>
                  <div style="padding: 4px;">
                    <input type="text" size="2px" name="dd" value="<?php echo $schedule[$i]['dd']; ?>"><b> /</b>
                    <input type="text" size="2px" name="mm" value="<?php echo $schedule[$i]['mm']; ?>"><b> /</b>
                    <input type="text" size="2px" name="yyyy" value="<?php echo $schedule[$i]['yyyy']; ?>">
                    <i>(dd/mm/yyyy)</i>
                  </div>
                </td>
                </tr>
                </tr>
                <td>Schedule Details</td> <td>:<input type="text" name="schedule" value=" <?php echo $schedule[$i]['schedule']; ?>"></td>
                </tr>
                <tr>
    <td>Schedule Time</td> 
    <td>
        <div style="padding: 4px;">
            <input type="text" size="2px" name="hh" value="<?php echo $schedule[$i]['hh']; ?>"><b> :</b>
            <input type="text" size="2px" name="min" value="<?php echo $schedule[$i]['min']; ?>">
            <select name="meridiun">
    <option value="AM" <?php if ($schedule[$i]['meridiun'] == 'AM') echo 'selected'; ?>>AM</option>
    <option value="PM" <?php if ($schedule[$i]['meridiun'] == 'PM') echo 'selected'; ?>>PM</option>
</select>
            <i>(hh/min/meridiun)</i>
        </div>
    </td>
</tr>

  <tr>
                <td>Department</td> <td>:<input type="text" name="department" value="<?php echo $schedule[$i]['department']; ?>"></td>
                </tr>
                <tr>
                    <td>
                    <input type="submit" name="Submit" value="Update"/>
</td>
</tr>
                <?php } ?>
                        </table>
                            </fieldset>
               </form>
               
</body>
</html>