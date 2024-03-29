<?php
require_once('../Model/guestdb.php');

if(!isset($_COOKIE['flag'])){
    header('location: login.php');
}
$schedule=$_REQUEST['sid'];
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
                            <li><a href=" AdminHome.php">Home</a></li>
                            <li><a href="DeleteCalender.php">Update Id</a></li>
                        </ul>
</span>
     
                </td><td align=top width="400"><span align=top>
                <form method="post" action="../Controller/DeleteCalCheck.php" enctype="">
                    <fieldset width="200">
                        <legend>Guest</legend>
                        <table>
                           
                           
                
                <tr>
                <td>Schedule ID </td>    <td> :<input type="text" name="sid" value="<?php echo $schedule ?>"></td>  
</tr><input type="submit" name="Submit" value="Delete"/>
</tr>
               <tr><td> </td></tr>
</fieldset>
               </form>

</table>
           
               
</body>
</html>