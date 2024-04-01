<?php



    if(!isset($_COOKIE['flag'])){
        header('location: login.php');
    }


?>
<html>
    <head>
        <title>Login</title>
    </head>
<body>
    
<table border="1" cellspacing="0" width="550">
        <tr>
            <td><table><tr><td width="364">xCompany</td><td align=right>   <a style="color:rgb(0, 102, 255); " href="Home.php">Home</a>|
            <a style="color:rgb(0, 102, 255); " href="Login.php">Login</a>| <a style="color:rgb(0, 102, 255);" href="Registration.php">Registration</a>
</td></tr></table></td>
        </tr>
        <tr  style="height:100;">
            <td align="left">
           Welcome to xCompany
                </td>
                </tr>
                <tr>
                    <td align=center>Copyright © 2017
</td>
</tr>
                </table>
                
</body>
</html>