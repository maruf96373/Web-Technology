<?php
require_once('../Model/guestdb.php');

if(!isset($_COOKIE['flag'])){
    header('location: login.php');
}


$name=getAllGuest();

?>
<html>
    <head>
        <title>Update</title>
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
                            <li><a href="GuestAdmin.php">View Guest</a></li>
                            <li><a href="Update.php">Update Id</a></li>
                            <li><a href="Delete.php">Delete Guest</a></li>
                        </ul>
</span>
     
                </td><td align=top width="400"><span align=top>
                    <fieldset width="200">
                        <legend>Guest</legend>
                        <table border=1; cellspacing='0'>
                            <tr>
                           
                <td>ID</td>
                <td>NAME</td>
                <td>USERNAME</td>
                <td>EMAIL</td>
                <td>PICTURE</td>
                <td>GENDER</td>
                <td>DOB</td>
                <td>ACTION</td>
            </tr><?php for($i=0; $i<count($name); $i++){?>
                            <tr>
                            <td> <?php echo $name[$i]['gid']; ?></td>  
                            <td> <?php echo $name[$i]['name']; ?></td>  
                            <td> <?php echo $name[$i]['username']; ?></td>
                            <td> <?php echo $name[$i]['email']; ?></td>  
                            <td> <img src="<?php echo $name[$i]['proPic']?>"width="90" height="60"></td>  
                            <td> <?php echo $name[$i]['gender']; ?></td>  
                            <td> <?php echo $name[$i]['dd']; ?>/<?php echo $name[$i]['mm']; ?>/<?php echo $name[$i]['yyyy']; ?></td>  
                            <td><a href="DeleteView.php?username=<?=$name[$i]['username']?>"> Delete </a> </td>
                        </tr>
                        <?php } ?>
        </table>
                        
               
</body>
</html>

    