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
        <title>Profile Picture</title>
    </head>
<body>
<table border="1" cellspacing="0" width="600">
<?php for($i=0; $i<count($name); $i++){?>
        <tr>
            <td colspan=2><table><tr><td width="364">Click & Stay</td><td align=right>  Logged in as <a style="color:rgb(0, 102, 255); " href="<?php echo $name[$i]['name']; ?>"><?php echo $name[$i]['name']; ?></a>
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
                <form action="../Controller/profilePicCheck.php" method="post" enctype="multipart/form-data">
                <fieldset>
                        <legend>PROFILE PICTURE</legend>
                        
<img src="<?php echo $name[$i]['proPic']?>" width="200" height="150"><hr>
                        <input type="file" name="profilePic" accept="image/*"><hr>
                        <input type="submit" value="upload"/>
                    </fieldset>
                    </form></td>
                </tr>
                <tr>
                    <td colspan=2 align=center>Copyright © 2017
</td>
</tr><?php } ?>
                </table>
               
</body>
</html>
