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

$name=name($user);

?>
<html>
    <head>
        <title>Change Password</title>
    </head>
<body>
<table border="1" cellspacing="0" width="600">
<?php for($i=0; $i<count($name); $i++){?>
        <tr>
            <td colspan=2><table><tr><td width="474">Click & Stay</td><td align=right>  Logged in as<a style="color:rgb(0, 102, 255); " href="<?php echo $name[$i]['name']; ?>"><?php echo $name[$i]['name']; ?></a>
</td></tr></table></td>
        </tr>

        <tr  style="height:200;">
            <td align="Left" style="width:200">
        <b>Account</b><hr>
 
                    <span align="left">
                        <ul>
                        <li><a href="home.php">Home</a></li>
                            <li><a href="Profile.php">View Profile</a></li>
                            <li><a href="EditProfile.php">Edit Profile</a></li>
                            <li><a href="profilePicture.php">Change Profile Picture</a></li>
                            <li><a href="ChangePassword.php">Change Password</a></li>
                        </ul>
</span>
     
                </td><td align=top><span align=top>
                <form method="post" action="../Controller/ChangepassCheck.php" enctype="">
                    <fieldset>
                        <legend>CHANGE PASSWORD</legend>
                        <table>
                            <tr>
                       <td align=left> Current Password </td>   <td align=right> :<input type="password" name="cpassword" value=""/></td>
</tr>
<tr>
                       <td align=left> New Password </td>   <td align=right> :<input type="password" name="npassword" value=""/></td>
</tr>
<tr>
                       <td align=left> Re-Type Password </td>   <td align=right> :<input type="password" name="rpassword" value=""/></td>
</tr></table>
                        <hr>
                        <input type="submit" name="btn" value="update"/>
                    </fieldset>
</form>
</td>
                </tr>
                <tr>
                    <td colspan=2 align=center>Copyright © 2017
</td>
</tr>
<?php } ?>
                </table>
               
</body>
</html>
