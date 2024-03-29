<?php


if(!isset($_COOKIE['flag'])){
    header('location: login.php');
}





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
                            <li><a AddCalCheck.phphref="AdminHome">Home</a></li>
                            <li><a href="CalenderAdmin.php">View Schedule</a></li>
                            <li><a href="AddCalender.php">Add Schedule</a></li>
                            <li><a href="UpdateCalender.php">Update Schedule</a></li>
                            <li><a href="DeleteCalender.php">Delete Schedule</a></li>
                        </ul>
</span>
     
                </td><td align=top width="400"><span align=top>
                <form method="post" action="../Controller/AddCalCheck.php" enctype="">
                    <fieldset width="200">
                        <legend>Add Schedule</legend>
                        <table>
                            <tr>
                            <td>Schedule Id</td> <td>:<input type="number" name="sid" value=""></td>
                            </tr>
                            <tr>
                            <td>Schedule Date</td> <td>
                  <div style="padding: 4px;">
                    <input type="text" size="2px" name="dd" value=""><b> /</b>
                    <input type="text" size="2px" name="mm" value=""><b> /</b>
                    <input type="text" size="2px" name="yyyy" value="">
                    <i>(dd/mm/yyyy)</i>
                  </div>
                </td>
                </tr>
                <tr>
                <td>Schedule Details</td> <td>:<input type="text" name="schedule" value=""></td>
                </tr>
                <tr>
                            <td>Schedule Time</td> <td>
                  <div style="padding: 4px;">
                    <input type="text" size="2px" name="hh" value=""><b> :</b>
                    <input type="text" size="2px" name="min" value="">
                    <select name="meridiun">
        <option value="AM">AM</option>
        <option value="PM">PM</option>
    </select>
                    <i>(hh/min)</i>
                  </div>
                </td>
                </tr>
                <tr>
                <td>Department</td> <td>:<input type="text" name="department" value=""></td>
                </tr>
                <tr>
                    <td>
                    <input type="submit" name="Submit" value="Add"/>
</td>
</tr>
                            </fieldset>
               </form>

</table>
           
               
</body>
</html>