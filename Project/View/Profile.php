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
        <title>Profile</title>
    </head>
<body>
<table border="1" cellspacing="0" width="750">
<?php for($i=0; $i<count($name); $i++){?>
        <tr>
            <td colspan=2><table><tr><td align=left> Guest ID: <?php echo $name[$i]['gid']; ?></td><td width="334" align=center>Click & Stay</td><td align=right>  Logged in as <a style="color:rgb(0, 102, 255); " href="<?php echo $name[$i]['name']; ?>"><?php echo $name[$i]['name']; ?></a>
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
     
                </td><td align=top width="400"><span align=top>
                    <fieldset width="200">
                        <legend> Profile</legend>
                        <table>
                            <tr>
                                <td>
                        <table>
                            <tr>
                            <td align =left>   Name  </td>      <td align =left>  :<?php echo $name[$i]['name']; ?></td>  
                        </tr>
                        <tr><td colspan =2><hr></td></tr>

<tr>
<td align =left>Email </td>        <td align =left> :<?php echo $name[$i]['email']; ?></td>
</tr>
<tr><td colspan =2><hr></td></tr>
                        <tr>
                        <td align =left>  Gender  </td>      <td align =left> 
                        :<?php echo $name[$i]['gender']; ?></td> 
</tr>
<tr><td colspan =2><hr></td></tr>
                       <tr><td align =left> Date of Birth </td> <td align =left>:<?php echo $name[$i]['dd']; ?>/<?php echo $name[$i]['mm']; ?>/<?php echo $name[$i]['yyyy']; ?>  </td> </tr>
                       <tr><td colspan =2><hr></td></tr>
</table>
</td>
<td><img src="<?php echo $name[$i]['proPic']?>"width="200" height="150"></td>
</tr>
</table>                         
                    </fieldset></td>
                </tr>
                <tr>
                    <td colspan=2 align=center>Copyright © 2017
</td>
</tr>
<?php } ?>
                </table>
               
</body>
</html>

    