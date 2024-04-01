<?php
require_once('../Model/empdb.php');
$emp=getAllemp();


?>
<html>
    <head>
        <title>Profile</title>
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
                            <li><a href="Addemp.php">Add Employee</a></li>
                            <li><a href="Updateemp.php">Update Employee</a></li>
                            <li><a href="Deleteemp.php">Delete Employee</a></li>
                        </ul>
</span>
     
                </td><td align=top width="400"><span align=top>
                    <fieldset width="200">
                        <legend>Employee</legend>
                        <table border=1; cellspacing='0'>
                            <tr>
                           
                <td>NAME</td>
                <td>CONTACT</td>
                <td>USERNAME</td>
                <td>PASSWORD</td>
                <td>ACTION</td>
            </tr><?php for($i=0; $i<count($emp); $i++){?>
                            <tr>
                            <td> <?php echo $emp[$i]['name']; ?></td>  
                            <td> <?php echo $emp[$i]['contact']; ?></td>  
                            <td> <?php echo $emp[$i]['uname']; ?></td>  
                            <td> <?php echo $emp[$i]['password']; ?></td>  
                            <td><a href="DeleteempView.php?uname=<?=$emp[$i]['uname']?>"> Delete </a> </td>
                        </tr>
                        <?php } ?>
        </table>
                        
               
</body>
</html>

    