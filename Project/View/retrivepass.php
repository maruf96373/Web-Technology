<?php
require_once('../Model/guestdb.php');
$email=$_REQUEST['email'];
$pass=retrive($email);
?>
<html>
    <head>
        <title>Forgot Password</title>
    </head>
<body>
<table border="1" cellspacing="0" width="550">
        <tr>
            <td><table><tr><td width="374">Click & Stay</td><td align=right>  
            <a style="color:rgb(0, 102, 255); " href="Login.php">Login</a>|
            <a style="color:rgb(0, 102, 255); " href="ForgotPassword.php">Forgot Password</a>
</td></tr></table></td>
        </tr>
        <tr  style="height:200;">
            <td align="center">
            <form method="" action="" enctype="">
        <fieldset style="width: 300;">
           <legend><b>RETRIVE PASSWORD</b></legend>
            <table>
                <tr>
            <td align="left">Your Password is </td>
            <?php for($i=0; $i<count($pass); $i++){?>
               
                <td><span style="padding: 3px;">: <?php echo $pass[$i]['password']; ?></span></td>
</tr>
<?php } ?>
        </table>
        </fieldset>
        </form>
                </td>
                </tr>
                <tr>
                    <td align=center>Copyright © 2017
</td>
</tr>
                </table>
                
</body>
</html>