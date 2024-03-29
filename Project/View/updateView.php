<?php
require_once('../Model/guestdb.php');

if(!isset($_COOKIE['flag'])){
    header('location: login.php');
}
$name=$_REQUEST['username'];
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
                            <li><a href="Update.php">Update Id</a></li>
                        </ul>
</span>
     
                </td><td align=top width="400"><span align=top>
                <form method="post" action="../Controller/updateCheck.php" enctype="">
                    <fieldset width="200">
                        <legend>Guest</legend>
                        <table>
                           
                           
                
                <tr>
                <td>Username </td>    <td> :<input type="text" name="username" value="<?php echo $name ?>"></td>  
</tr>
<tr><td>ID</td>     <td>:<input type="text" name="gid" value=""></td>
</tr>
               <tr><td> <input type="submit" name="Submit" value="Update"/></td></tr>


</table>
            </form>
               
</body>
</html>