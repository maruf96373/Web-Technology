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
        <title>Edit Profile</title>
    </head>
<body>
<table border="1" cellspacing="0" width="750">
<?php for($i=0; $i<count($name); $i++){?>
        <tr>
            <td colspan=2><table><tr><td width="414">Click & Stay</td><td align=left>  Logged in as <a style="color:rgb(0, 102, 255); " href="<?php echo $name[$i]['name']; ?>"><?php echo $name[$i]['name']; ?></a>
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
                <form method="post" action="../Controller/editProfileCheck.php" enctype="">
                <fieldset>
                        <legend>Edit Profile</legend>
                        <table>
                            <tr>
                            <td align =left>   Name  </td>      <td align =left>  :<input type="text" name="name" value="<?php echo $name[$i]['name']; ?>"></td> 
                        </tr>
                        <tr><td colspan =2><hr></td></tr>

<tr>
<td align =left>Email </td>        <td align =left> :<input type="email" name="email" value="<?php echo $name[$i]['email']; ?>"></td> 
</tr>
<tr><td colspan =2><hr></td></tr>
                        <tr>
                        <td align =left>  Gender  </td>      <td align =left> :
                        <input type="radio" name="gender" value="Male" <?php if ($name[$i]['gender'] == 'Male') echo 'checked="checked"'; ?> />Male
<input type="radio" name="gender" value="Female" <?php if ($name[$i]['gender'] == 'Female') echo 'checked="checked"'; ?> />Female
<input type="radio" name="gender" value="Other" <?php if ($name[$i]['gender'] == 'Other') echo 'checked="checked"'; ?> />Other
</td> 
</tr>
<tr><td colspan =2><hr></td></tr>
                       <tr><td align =left> Date of Birth </td> <td>
                  <div style="padding: 4px;">
                    <input type="text" size="2px" name="dd" value="<?php echo $name[$i]['dd']; ?>"><b> /</b>
                    <input type="text" size="2px" name="mm" value="<?php echo $name[$i]['mm']; ?>"><b> /</b>
                    <input type="text" size="2px" name="yyyy" value="<?php echo $name[$i]['yyyy']; ?>">
                    <i>(dd/mm/yyyy)</i>
                  </div>
                </td> </tr>
                       <tr><td colspan =2><hr></td></tr>
</table>
                        <input type="submit" name="Submit" value="Submit"/>
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
