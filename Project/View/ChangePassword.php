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
        <link rel="stylesheet" href="GuestStyle.css"/>
    </head>
<body class="b1">
<table border="1" cellspacing="0" width="650" id="b2">
<?php for($i=0; $i<count($name); $i++){?>
        <tr>
            <td colspan=2><table><tr><td width="474">Click & Stay</td><td align=right>  Logged in as<a  class="c1" href="<?php echo $name[$i]['name']; ?>"><?php echo $name[$i]['name']; ?></a>
</td></tr></table></td>
        </tr>

        <tr  style="height:200;">
            <td align="Left" style="width:250" id="b5">
        <b>Dashboard</b><hr>
 
                    <span align="left">
                        <ul>
                        <li><a class="c1" href="home.php">Home</a></li>
                            <li><a  class="c1" href="Profile.php">View Profile</a></li>
                            <li><a  class="c1"   href="EditProfile.php">Edit Profile</a></li>
                            <li><a  class="c1" href="profilePicture.php">Change Profile Picture</a></li>
                            <li><a  class="c1" href="ChangePassword.php">Change Password</a></li>
                        </ul>
</span>
     
                </td><td align=top><span align=top>
                <p></p>
                <form method="post" action="../Controller/ChangepassCheck.php" enctype="">
                    <fieldset>
                        <legend>CHANGE PASSWORD</legend>
                        <table>
                            <tr>
                       <td align=left> Current Password </td>   <td align=right> :<input type="password" id="currentPassword" name="cpassword" value="" onkeyup="validatePassword()"/></td>
</tr>
<tr>
                       <td align=left> New Password </td>   <td align=right> :<input type="password" id="newPassword" name="npassword" value="" onkeyup="validatePassword()"/></td>
</tr>
<tr>
                       <td align=left> Re-Type Password </td>   <td align=right> :<input type="password" id="confirmPassword" name="rpassword" value="" onkeyup="validatePassword()"/></td>
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
                <script>
    function validatePassword() {
      let obj = document.getElementsByTagName('p')[0];
      obj.innerHTML = "";
      obj.style.color = '';

      let newPassword = document.getElementById('newPassword').value;
      let confirmPassword = document.getElementById('confirmPassword').value;
      let currentPassword = document.getElementById('currentPassword').value;
      if (newPassword === "" || confirmPassword === "" || currentPassword === "") {
        obj.innerHTML = "Password field is empty";
        obj.style.color = 'red';
        return false;
      }
      if (newPassword !== confirmPassword) {
        obj.innerHTML = "Password doesn't match with your new password";
        obj.style.color = 'red';
        return false;
      }
      if (newPassword.length < 8) {
        obj.innerHTML = "Password must be at least 8 characters long";
        obj.style.color = 'red';
        return false;
      }
      let validChars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789_@#*";
        let hasValidChar = true;

        for (let i = 0; i <newPassword.length; i++) {
          let char = passwordnewPassword[i];
          if (validChars.indexOf(char) === -1) {
            hasValidChar = false;
            obj.innerHTML = "Password can only contain letters, numbers, and underscores";
            obj.style.color = 'red';
            return false;
            break;
          }
        }

        if (hasValidChar) {
          obj.innerHTML = "Password Valid";
          obj.style.color = 'green';
          return true;
        } else {
          obj.innerHTML = "Invalid Password";
          obj.style.color = 'red';
          return false;
        }
      }
  </script>
</body>
</html>
