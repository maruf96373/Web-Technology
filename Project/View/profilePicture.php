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
        <link rel="stylesheet" href="GuestStyle.css"/>
    </head>
<body class="b1">
<table border="1" cellspacing="0" width="600" id="b2">
<?php for($i=0; $i<count($name); $i++){?>
        <tr>
            <td colspan=2><table><tr><td width="364">Click & Stay</td><td align=right>  Logged in as <a class="c1" href="<?php echo $name[$i]['name']; ?>"><?php echo $name[$i]['name']; ?></a>
</td></tr></table></td>
        </tr>

        <tr  style="height:200;">
            <td align="Left" style="width:250" id="b5">
        <b>Dashboard</b><hr>
 
                    <span align="left">
                        <ul>
                        <li><a class="c1" href="home.php">Home</a></li>
                            <li><a class="c1" href="Profile.php">View Profile</a></li>
                            <li><a class="c1" href="EditProfile.php">Edit Profile</a></li>
                            <li><a class="c1" href="profilePicture.php">Change Profile Picture</a></li>
                            <li><a class="c1" href="ChangePassword.php">Change Password</a></li>
                        </ul>
</span>
     
                </td><td align=top><span align=top>
                <p></p>
                <form action="../Controller/profilePicCheck.php" method="post" enctype="multipart/form-data">
                <fieldset>
                        <legend>PROFILE PICTURE</legend>
                        
<img src="<?php echo $name[$i]['proPic']?>" width="200" height="150"><hr>
                        <input type="file" id="profilePic" name="profilePic" accept="image/*"><hr>
                        <input type="submit" value="upload" onclick="validatePic()"/>
                    </fieldset>
                    </form></td>
                </tr>
                <tr>
                    <td colspan=2 align=center>Copyright © 2017
</td>
</tr><?php } ?>
                </table>
                <script>
    function validatePic() {
      let obj = document.getElementsByTagName('p')[0];
      obj.innerHTML = "";
      obj.style.color = '';

      let fileInput = document.getElementById('profilePic');
      let file = fileInput.files[0];
      let fileSize = file ? file.size : 0;
      let fileType = file ? file.type : '';

      let validExtensions = ['image/jpeg', 'image/png', 'image/gif'];
      let maxFileSize = 500000; 
      if (!file) {
        obj.innerHTML = "*Picture cannot be empty";
        obj.style.color = 'red';
        return false;
      }
      if (fileSize > maxFileSize) {
        obj.innerHTML = "Sorry, your file is too large. Maximum size allowed is 500KB.";
        obj.style.color = 'red';
        return false;
      }
      if (validExtensions.indexOf(fileType) === -1) {
        obj.innerHTML = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        obj.style.color = 'red';
        return false;
      }
      obj.innerHTML = "Valid Picture";
      obj.style.color = 'green';
      return true; 
    }
  </script>
               
</body>
</html>
