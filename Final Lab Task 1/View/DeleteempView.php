<?php
require_once('../Model/empdb.php');

$user=$_REQUEST['uname'];
?>
<html>
    <head>
        <title>Update View</title>
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
                            <li><a href=" emp.php">View  Employee</a></li>
                            <li><a href="Deleteemp.php">Delete Id</a></li>
                        </ul>
</span>
     
                </td><td align=top width="400"><span align=top>
                <form method="post" action="../Controller/DeleteempCheck.php" enctype="">
                    <fieldset width="200">
                        <legend>Guest</legend>
                        <table>
                           
                           
                
                <tr>
                <td>USERNAME </td>    <td> :<input type="text" name="uname" value="<?php echo $emp ?>"></td>  
</tr>
</tr>
               <tr><td><input type="submit" name="Submit" value="Delete"/> </td></tr>
</fieldset>
               </form>

</table>
           
               
</body>
</html>