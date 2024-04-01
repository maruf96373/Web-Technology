<?php
require_once('../Model/empdb.php');

$user=$_REQUEST['uname'];
$emp=uemp($user);
?>

<html>
    <head>
        <title>Update</title>
    </head>
<body>
<table border="1" cellspacing="0" width="750">

        <tr>
            <td colspan=2><table><tr><td width="334">Online Shop</td><td align=right>  Logged in as Admin
</td></tr></table></td>
        </tr>

        <tr  style="height:200;">
            <td align="Left" style="width:200">
        <b>Account</b><hr>
 
                    <span align="left">
                        <ul>
                        <li><a href="emp.php">View Employee</a></li>
                            <li><a href="Updateemp.php">Update Employee</a></li>
                        </ul>
</span>
     
                </td><td align=top width="400"><span align=top>
                <form method="post" action="../Controller/UpdateempCheck.php" enctype="">
                    <fieldset width="200">
                        <legend>Update Employee</legend>
                        <table>
                        <?php for($i=0; $i<count($emp); $i++){?>
                            <tr>
                            <td>Name</td> <td>:<input type="text" name="name" value="<?php echo $emp[$i]['name']; ?>"></td>
                            </tr>
                            <tr>
                            <td>Contact No.</td> <td>:<input type="text" name="contact" value="<?php echo $emp[$i]['contact']; ?>"></td>
                            </tr>
                            <tr>
                            <td>UserName</td> <td>:<input type="text" name="uname" value="<?php echo $emp[$i]['uname']; ?>"></td>
                            </tr>
                            <tr>
                            <td>Password</td> <td>:<input type="password" name="password" value="<?php echo $emp[$i]['password']; ?>"></td>
                            </tr>
                <tr>
                    <td>
                    <input type="submit" name="Submit" value="Update"/>
</td>
</tr>
                            </fieldset>
               </form>
               <?php } ?>
</table>
           
               
</body>
</html>