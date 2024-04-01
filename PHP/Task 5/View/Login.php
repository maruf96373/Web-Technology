<html>
    <head>
        <title>Login</title>
    </head>
<body>
    
        <table border="1" cellspacing="0" width="500">
        <tr>
            <td><table><tr><td width="404">xCompany</td><td align=right>  <a style="color:rgb(0, 102, 255);" href="Registration.php">Registration</a>
</td></tr></table></td>
        </tr>
        <tr  style="height:250;">
            <td align="center">
            <form method="post" action="../Controller/LoginCheck.php" enctype="">
        <fieldset style="width: 300;">
           <legend><b>LOGIN</b></legend>
            <table>
                <tr>
            <td align="left">Email </td><td><span style="padding: 3px;">:<input type="email" name="email" value=""></span></td>
</tr>
<tr>
<td align="left"> Password</td><td> <span style="padding: 3px;">:<input type="password" name="password" value=""/></span></td>
</tr>
<tr><td colspan=2><hr></td></tr>
<tr><td colspan=2><input type="CheckBox" name="CheckBox" value="">Remember Me</td></tr>
<tr><td colspan=2><input type="submit" name="Submit" value="Submit"/>
                 
          <a style="color:rgb(0, 102, 255);margin-top: 10px; padding:10px;" href="ForgotPassword.php">Forgot Password?</a>
</td>
        </table>
        </fieldset>
        </form>
                </td>
                </tr>
                <tr>
                    <td align=center> <p>Copyright © 2017</p>
</td>
</tr>
                </table>
                
</body>
</html>