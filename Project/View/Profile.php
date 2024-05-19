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
        <link rel="stylesheet" href="../Assets/customerStyle.css"/>
    </head>
<body class="b1">
<fieldset id="b9">
    <img src="../Assets/logo.png" id="logo-image">
        <h3 id="b1"><u>Click & Stay</u></h3>
        
        <h4 id="b10">Find your next stay</h4>
        <?php for($i=0; $i<count($name); $i++){?>

<a id="b4" href="<?php echo $name[$i]['name']; ?>"><?php echo $name[$i]['name']; ?></a>
<?php } ?>
        
    </fieldset>
<table border="1" cellspacing="0" width="750" id="b2">
<?php for($i=0; $i<count($name); $i++){?>
       
        <b>Sidebar</b><hr>
 
                    <span align="left">
                        <ul>
                            <li><a  class="c1" href="home.php">Home</a></li>
                            <li><a  class="c1" href="Profile.php">View Profile</a></li>
                            <li><a  class="c1" href="EditProfile.php">Edit Profile</a></li>
                            <li><a  class="c1" href="profilePicture.php">Change Profile Picture</a></li>
                            <li><a  class="c1" href="ChangePassword.php">Change Password</a></li>
                        </ul>
</span>
     
                </td><td align=top width="400"><span align=top>
                    <fieldset width="200" align="center">
                        <legend> Profile</legend>
                        <table align="center">
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

    